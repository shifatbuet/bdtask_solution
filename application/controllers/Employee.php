<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller
{

    public function index() {

        $this->load->library('pagination');
        $config['per_page'] = 10;

        $page = $this->input->get('page', true);
        $search_data = $this->input->get('search_data', true);

        if ($search_data != '') {

            $this->db->like('name', $search_data);
            $this->db->or_like('email_address', $search_data);
            $this->db->or_like('contact', $search_data);
            $this->db->or_like('gender', $search_data);
            $this->db->or_like('country', $search_data);
        }
        $tempdb = clone $this->db;
        $total_row = $tempdb->from('employees')->count_all_results();
        
        $this->db->limit($config['per_page'], $page);
        $this->db->order_by("id", "desc");
        $result['employee_list'] = $this->db->get('employees')->result_array();
        
        $config['base_url'] = "http://localhost/ci_crud/student?search_data=$search_data";
        $config['total_rows'] = $total_row;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';


        //Optional (Pagination Design)
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &gt;</i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';


        $this->pagination->initialize($config);
        $result['pagination'] = $this->pagination->create_links();


        $data['content'] = $this->load->view('employee_list', $result, true);
        $this->load->view('master', $data);
    }

    

  

    public function create() {


        if (isset($_POST['name'])) {
            $post_data = $_POST;
            unset($post_data['salary']);
            $result = $this->db->insert('employees', $post_data);
            $salary= $_POST['salary'];
            $employee_id= $this->db->insert_id();
            $salary_data = array("salary"=>$salary,"employee_id"=>$employee_id); 
            $result = $this->db->insert('salaries', $salary_data);
            
            if ($result) {
                $this->session->set_flashdata('message', 'Succefully Created Employee Info.');
            } else {
                $this->session->set_flashdata('message', "An error occurred while inserting data.");
            }
            redirect('employee');
        }
    }

    public function view($id) {
        if ($id != '') {
            $this->db->where('employees.id', $id);
            $this->db->join('salaries', 'employees.id = salaries.employee_id','left');
            $row['employee_info'] = $this->db->get('employees')->row_array();
            
        }
        $row['earning_info'] =$this->calculate_earning($row['employee_info']);
        $data['content'] = $this->load->view('view', $row, true);
        $this->load->view('master', $data);
    }

    

    public function update($id) {


        if (isset($_POST['id'])) {
            $update_data = $_POST;
            unset($update_data['salary']);
            unset($update_data['id']);
            $this->db->where('id', $id);
            $result = $this->db->update('employees', $update_data);
            $update_salary= array("modified"=>date("Y-m-d h:i:s"),"salary"=>$_POST["salary"]);
            $this->db->where('employee_id', $id);
            $result = $this->db->update('salaries', $update_salary);

            if ($result) {

                $this->session->set_flashdata('message', 'Succefully Updated Employee Info.');
               
            } else {
                $this->session->set_flashdata('message', 'An error occurred while inserting data');
            }
            redirect('employee');
    
        }
        
        if ($id != '') {
            $this->db->where('employees.id', $id);
            $this->db->join('salaries', 'employees.id = salaries.employee_id','left');
            $row['employee_info'] = $this->db->get('employees')->row_array();
        }
        $data['content'] = $this->load->view('update_employee_info', $row, true);
        $this->load->view('master', $data);
    }


    public function delete($id) {

        if ($id != '') {
            $this->db->where('id', $id);
            $result = $this->db->delete('employees');
            if ($result) {
                $this->session->set_flashdata('message', 'Succefully Deleted Empployee Info.');
            } else {
                $this->session->set_flashdata('message', "An error occurred while inserting data.");
            }
            redirect('employee');
        }
    }

    private function calculate_earning($info){
        $salary = round($info['salary']);
        $deduct = round(($salary/240)*24);
        $include = round(($salary/240)*23);     
        $settings = $this->db->get('settings')->row_array();   
        $pf= round(($salary*$settings['pf']/100));
       
       
        $insurance=round($settings['insurance']/12);
        $payable = $salary +$include  -  $deduct-$pf-$insurance;
        $revenue = ($settings['revenue_amount']*$settings['revenue_percentage'])/(100*$settings['team_member']);
        
        $expected_earning = round((($payable*12)+ $revenue)/12);
        
        
        $hourly_rate= round($salary/240);
        return array("basic"=>$salary,"deduct"=>$deduct,"include"=>$include,"payable"=>$payable,
        "expected_earning"=>$expected_earning,"pf"=>$pf,"insurance"=>$insurance,"rate"=>$hourly_rate);
    }


    public function config() {


        if (isset($_POST['id'])) {
            $update_data = $_POST;
            $this->db->where('id', 1);
            $result = $this->db->update('settings', $update_data);

            if ($result) {

                $this->session->set_flashdata('message', 'Succefully Updated Config .');
               
            } else {
                $this->session->set_flashdata('message', 'An error occurred while inserting data');
            }
            redirect('employee');
    
        }
        $row['settings'] = $this->db->get('settings')->row_array();
       
        $data['content'] = $this->load->view('update_config', $row, true);
        $this->load->view('master', $data);
    }

}
