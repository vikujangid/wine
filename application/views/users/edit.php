<?php echo form_open(); ?>
    <div class="brand-lable modal-dialog">
      <div class="loginmodal-container">

       <?php 
        if($this->session->flashdata('add_more_user'))
        echo $this->session->flashdata('add_more_user'); 
      ?><br/>
      
     
      <h1>Edit User</h1><br>


     


        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="full_name">Full Name</label>
          </div>
          
          <div class="col-sm-8">
            <span class="login-help"><?php echo form_error('first_name'); ?></span>
            <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>" placeholder="Full Name">
          </div>       
        </div>


        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="last_name">Last Name</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('last_name'); ?></span>
            <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>" placeholder="Last Name">
          </div>       
        </div>


        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="username">User Name</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('username'); ?></span>
            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="User Name">
          </div>       
        </div>


         <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="email_id">Email Id</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('email'); ?></span>
            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email Address">
          </div>       
        </div>

   


         <br/><br/>
         


        <input type="submit" name="login" class="login loginmodal-submit" value="Update">
         <div class="login-help">
          <a href="<?php echo base_url('users/show'); ?>">show All Users</a>
          </div><br/>
        
      </div>
    </div>
    <?php echo form_close(); ?>
