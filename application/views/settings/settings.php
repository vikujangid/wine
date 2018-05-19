<?php echo form_open(); ?>
    <div class="brand-lable modal-dialog">
      <div class="loginmodal-container">
      
     
      <h1>Website Settings</h1><br>

        <?php 
        if($this->session->flashdata('settings_flesh_message'))
        echo $this->session->flashdata('settings_flesh_message'); 
      ?><br/>

      <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="website_title">Website Title</label>
        </div>
        <div class="col-sm-8">
        <span class="login-help"><?php echo form_error('website_title'); ?></span>
        <input type="text" class="form-control" name="website_title" value="<?php echo $website_title; ?>" placeholder="Website Title">
        </div>
       
        </div>

        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="contect_email_address">Email Address</label>
        </div>
        <div class="col-sm-8">
        <span class="login-help"><?php echo form_error('contect_email_address'); ?></span>
        <input type="text" class="form-control" name="contect_email_address" value="<?php echo $contect_email_address; ?>" placeholder="Email Address">
        </div>
       
        </div>

        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="smtp_host">SMTP Host</label>
        </div>
        <div class="col-sm-8">
        <span class="login-help"><?php echo form_error('smtp_host'); ?></span>
        <input type="text" class="form-control" name="smtp_host" value="<?php echo $smtp_host; ?>" placeholder="SMTP Host">
        </div>
       
        </div>

        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="smtp_port">SMTP Port</label>
        </div>
        <div class="col-sm-8">
        <span class="login-help"><?php echo form_error('smtp_port'); ?></span>
        <input type="text" class="form-control" name="smtp_port" value="<?php echo $smtp_port; ?>" placeholder="SMTP Port">
        </div>
       
        </div>

        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="smtp_username">SMTP Username</label>
        </div>
        <div class="col-sm-8">
        <span class="login-help"><?php echo form_error('smtp_username'); ?></span>
        <input type="text" class="form-control" name="smtp_username" value="<?php echo $smtp_username; ?>" placeholder="SMTP Username">
        </div>
       
        </div>

        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="smtp_password">SMTP password</label>
        </div>
        <div class="col-sm-8">
        <span class="login-help"><?php echo form_error('smtp_password'); ?></span>
        <input type="password" class="form-control" name="smtp_password" value="<?php echo $smtp_password; ?>" placeholder="SMTP Password">
        </div>
       
        </div>



     
        <br/><br/>

         


        <input type="submit" name="login" class="login loginmodal-submit" value="<?php echo $button_value; ?>">
         <div class="login-help">
          
          </div>
        
      </div>
    </div>
    <?php echo form_close(); ?>