<?php echo form_open('settings/settings'); ?>
    <div class="brand-lable modal-dialog">
      <div class="loginmodal-container">
      
     
      <h1>Website Settings</h1><br>



      <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="website_title">Website Title :</label>
        </div>
        <div class="col-sm-8"><?php echo $website_title; ?></div>
       
        </div>

        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="contect_email_address">Email Address :</label>
        </div>
        <div class="col-sm-8"><?php echo $contect_email_address; ?></div>
       
        </div>

        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="smtp_host">SMTP Host :</label>
        </div>
        <div class="col-sm-8"><?php echo $smtp_host; ?></div>
       
        </div>

        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="smtp_port">SMTP Port :</label>
        </div>
        <div class="col-sm-8"><?php echo $smtp_port; ?></div>
       
        </div>

        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="smtp_username">SMTP Username :</label>
        </div>
        <div class="col-sm-8"><?php echo $smtp_username; ?></div>
       
        </div>

        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="smtp_password">SMTP password :</label>
        </div>
        <div class="col-sm-8"><?php echo $smtp_password; ?></div>
       
        </div>



     
        <br/><br/>

         


        <input type="submit" name="login" class="login loginmodal-submit" value="Change Settings">
         <div class="login-help">
          
          </div>
        
      </div>
    </div>
    <?php echo form_close(); ?>