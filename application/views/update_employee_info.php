<div class="container " > 
    

    <div class="row content">

     
           
        <a type="button" href="<?php echo site_url(); ?>"  class="button button-purple mt-12 pull-right">View Employee List</a> 
     
 <h3>Update Employee Info||<?php echo $employee_info['name']; ?></h3>
                  <?php 
        
        if(isset($_SESSION['message'])){
               echo "<p class='custom-alert'>".$_SESSION['message']."</p>";
         unset($_SESSION['message']);
        }
    
        
        ?>
     
          <hr/>
           
           
           
           
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php  if(isset($employee_info['id'])){echo $employee_info['id']; }?>" id=""  >
 
   <div class="form-group">
       
    <label for="student_name">Name:</label>
    
    <input type="text" name="name" value="<?php  if(isset($employee_info['name'])){echo $employee_info['name']; }?>" id="student_name" class="form-control" required="" maxlength="50">
 
   </div>
  <div class="form-group">
    <label for="email_address">Email address:</label>
    <input type="email" class="form-control" value="<?php  if(isset($employee_info['email_address'])){echo $employee_info['email_address']; }?>" name="email_address" id="email_address" required="" maxlength="50">
  </div>
     <div class="form-group">
    <label for="contact">Contact:</label>
    <input type="text" class="form-control" value="<?php  if(isset($employee_info['contact'])){echo $employee_info['contact']; }?>" name="contact" id="contact"  maxlength="50">
  </div>
   <div class="form-group">
  <label for="gender">Gender:</label>
  <select class="form-control" name="gender" id="gender">
   <option value="">Select</option>
   <option value="Male" <?php  if(isset($employee_info['gender'])&&$employee_info['gender']=='Male'){echo 'selected'; }?>>Male</option>
    <option value="Female" <?php  if(isset($employee_info['gender'])&&$employee_info['gender']=='Female'){echo 'selected'; }?>>Female</option>
   
  </select>
   
</div> 
              <div class="form-group">
    <label for="country">Country:</label>
    <input type="text" name="country" value="<?php  if(isset($employee_info['country'])){echo $employee_info['country']; }?>" id="country" class="form-control"  maxlength="50">
  </div>
  <div class="form-group">
    <label for="country">Salary:</label>
    <input type="text" name="salary" value="<?php  if(isset($employee_info['salary']))
    {echo $employee_info['salary']; }?>" id="salary" class="form-control"  maxlength="50">
  </div>
              
  
  
              <input type="submit" class="button button-green  pull-right"  value="Update"/>
</form> 
   
  
     
   
  </div>
     
</div>
