<?php echo form_open('register/update_password'); ?>
    <div class="modal-dialog">
      <div class="loginmodal-container">
      
      <h1>Enter your new password</h1><br>
        <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
        <?php echo form_error('password'); ?>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <?php echo form_error('confirm_password'); ?>
        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
        <input type="submit" name="login" class="login loginmodal-submit" value="Submit">
        <div class="login-help">
         
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>