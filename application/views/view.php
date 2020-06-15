  <div class="container " > 


<div class="row content" style="text-align: center;">

       
          
           
    <a  href="<?php echo site_url(); ?>"  class="button button-purple mt-12 pull-right">View Employee List</a> 
     
 <h4>View Employee Expected Earning Info ||    <?php  if(isset($employee_info['name'])){echo $employee_info['name']; }?></h4>
       
    
     <hr/>
   <div id="info">
   
 
      
    <label >Name:</label>
   <?php  if(isset($employee_info['name'])){echo $employee_info['name']; }?>

<br/>
    <label>Email address:</label>
  <?php  if(isset($employee_info['email_address'])){echo $employee_info['email_address'];} ?>
    
    <br/>
    <label >Contact:</label>
      <?php  if(isset($employee_info['contact'])){echo $employee_info['contact'];} ?>
    <br/>

  <label >Gender:</label>
   <?php  if(isset($employee_info['gender'])){echo $employee_info['gender'];} ?>
  <br/>
    <label >Country:</label>
      <?php  if(isset($employee_info['country'])){echo $employee_info['country'];} ?>
    <br/>
    <label >Salary:</label>
      <?php  echo $earning_info['basic']; ?>
    

    
</div>
    <div id="breakdown" >
    

    <table>
    <h4>Monthly Salary</h4>
    
  <tr>
    <th>Item [Per Hour Rate (30 days) = <?php  echo $earning_info['rate']; ?>]</th>
    <th>Amount</th>
  </tr>
  <tr>
    <td>Salary(Inclusion)</td>
    <td><?php  echo $earning_info['basic']; ?></td>
  
  </tr>
  <tr>
    <td>For 9hours per day 23 Hours(Inclusion)</td>
    <td><?php  echo $earning_info['include']; ?></td>
  
  </tr>
  <tr>
    <td>3 Extra Holidays are not paid (Deduction )</td>
    <td><?php  echo $earning_info['deduct']; ?></td>
  
  </tr>
 
  <tr>
    <td>PF(Deduction)</td>
    <td><?php  echo $earning_info['pf']; ?></td>
  
  </tr>
  <tr>
    <td>Insurance(Deduction)</td>
    <td><?php  echo $earning_info['insurance']; ?></td>
  
  </tr>
  <tr style="background: greenyellow;">
    <td>Total Payable</td>
    <td><?php  echo $earning_info['payable']; ?></td>
  
  </tr>
 
  <tr style="background: greenyellow;">
    <td>Expected Earning (per month)</td>
    <td><?php  echo $earning_info['expected_earning']; ?></td>
  
  </tr>


</table>
    
   
  
   
    
  </div>

   
  
     
   
  </div>
  </div>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>