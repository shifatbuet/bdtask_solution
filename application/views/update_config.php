<div class="container " > 
    

    <div class="row content">

     
           
        <a type="button" href="<?php echo site_url(); ?>"  class="button button-purple mt-12 pull-right">View Employee List</a> 
     
 <h3>Update Configuration</h3>
                  <?php 
        
        if(isset($_SESSION['message'])){
               echo "<p class='custom-alert'>".$_SESSION['message']."</p>";
         unset($_SESSION['message']);
        }
    
        
        ?>
     
          <hr/>
           
           
           
           
    <form method="post" action="">
        <input type="hidden" name="id" value="1" id=""  >
 
   <div class="form-group">
       
    <label for="student_name">Revenue Amount:</label>
    
    <input type="text" name="revenue_amount" placeholder="200000000"
     value="<?php  if(isset($settings['revenue_amount'])){echo $settings['revenue_amount']; }?>" id="student_name" class="form-control" required="true" 
     maxlength="50">
 
   </div>
  <div class="form-group">
    <label for="email_address">Revenue Percentage:</label>
    <input  class="form-control" placeholder="5"
    value="<?php  if(isset($settings['revenue_percentage'])){echo $settings['revenue_percentage']; }?>"
     name="revenue_percentage" required="true" maxlength="50">
  </div>
  <div class="form-group">
    <label for="team_member">Team member:</label>
    <input  class="form-control" placeholder="12" value="<?php  if(isset($settings['team_member'])){echo $settings['team_member']; }?>" name="team_member"  required="true" maxlength="50">
  </div>
     <div class="form-group">
    <label for="contact">PF Percentage:</label>
    <input type="text" placeholder="3"  class="form-control" value="<?php  if(isset($settings['pf'])){echo $settings['pf']; }?>" name="pf"  maxlength="50" required="true">
  </div>
  
            
  <div class="form-group">
    <label for="country">Insurance Amount:</label>
    <input type="text" required="true" placeholder="5000"  name="insurance" value="<?php  if(isset($settings['insurance']))
    {echo $settings['insurance']; }?>" id="insurance" class="form-control"  maxlength="50">
  </div>
              
  
  
              <input type="submit" class="button button-green  pull-right"  value="Update"/>
</form> 
   
  
     
   
  </div>
     
</div>
