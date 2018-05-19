<?php echo form_open('register/generate_validation_link'); ?>
    <div class="modal-dialog">
      <div class="loginmodal-container">
      <?php 
        if($this->session->flashdata('login_failed_msg'))
        echo $this->session->flashdata('login_failed_msg'); 
      ?>
      <h1>Enter your registerd email address</h1><br>
        <?php echo form_error('email'); ?>
        <input type="text" class="form-control" name="email" placeholder="Email Id">
        
        <input type="submit" name="login" class="login loginmodal-submit" value="Send">
        <div class="login-help"><br/>
         
          <h5>Check your email inbox to reset your password<h5/>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>