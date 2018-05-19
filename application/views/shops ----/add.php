<form action="<?php echo current_url(); ?>" method="POST" id="add-form" class="ajax_form">
    <div class="brand-lable modal-dialog">
      <div class="loginmodal-container">

      
      
     
      <h1>Add New Shop</h1><br>


        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="shop_name">Shop Name</label>
          </div>
          <div class="col-sm-8">
             
            <span class="login-help"><?php echo form_error('shop_name'); ?></span>
            <input type="text" class="form-control" name="shop_name" value="<?php echo $shop_name; ?>" placeholder="Shop Name">
          </div>       
        </div>


        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="shop_owner_name">Owner Name</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('shop_owner_name'); ?></span>
            <input type="text" class="form-control" name="shop_owner_name" value="<?php echo $shop_owner_name; ?>" placeholder="Owner Name">
          </div>       
        </div>


        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="shopname">Address Line 1</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('shop_address_line_1'); ?></span>
            <input type="text" class="form-control" name="shop_address_line_1" value="<?php echo $shop_address_line_1; ?>" placeholder="Address line 1">
          </div>       
        </div>


        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="shop_address_line_2">Address Line 2</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('shop_address_line_2'); ?></span>
            <input type="text" class="form-control" name="shop_address_line_2" value="<?php echo $shop_address_line_2; ?>" placeholder="Address line 2">
          </div>       
        </div>



        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="shop_address_city">City</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('shop_address_city'); ?></span>
            <input type="text" class="form-control" name="shop_address_city" value="<?php echo $shop_address_city; ?>" placeholder="City">
          </div>       
        </div>






        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="shop_address_state">State</label>
          </div>
          <div class="col-sm-8">
            <span class="login-help"><?php echo form_error('shop_address_state'); ?></span>
            <select class="selectpicker" name="shop_address_state" >
              <option <?php if($shop_address_state=='Rajasthan') echo 'selected="selected"' ; ?> >Rajasthan</option>
              <option <?php if($shop_address_state=='Haryana') echo 'selected="selected"' ; ?> >Haryana</option>
              <option <?php if($shop_address_state=='Punjab') echo 'selected="selected"' ; ?> >Punjab</option>
              <option <?php if($shop_address_state=='Delhi') echo 'selected="selected"' ; ?> >Delhi</option>
            </select>
          </div>       
        </div>



        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="shop_address_zip_code">Zip Code</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('shop_address_zip_code'); ?></span>
            <input type="text" class="form-control" name="shop_address_zip_code" value="<?php echo $shop_address_zip_code; ?>" placeholder="Zip Code">
          </div>       
        </div>



        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="shop_primary_contact_number">Primary Contact Number</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('shop_primary_contact_number'); ?></span>
            <input type="text" class="form-control" name="shop_primary_contact_number" value="<?php echo $shop_primary_contact_number; ?>" placeholder="Primary Contact Number">
          </div>       
        </div>


        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="shop_owner_mobile_number">Owner Mobile Number</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('shop_owner_mobile_number'); ?></span>
            <input type="text" class="form-control" name="shop_owner_mobile_number" value="<?php echo $shop_owner_mobile_number; ?>" placeholder="Owner Mobile Number">
          </div>       
        </div>


         <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="shop_email_address">Email Address</label>
          </div>
          <div class="col-sm-8">
            
            <span class="login-help"><?php echo form_error('shop_email_address'); ?></span>
            <input type="text" class="form-control" name="shop_email_address" value="<?php echo $shop_email_address; ?>" placeholder="Email Address">
          </div>       
        </div><br/><br/>

        


        <input type="submit" name="login" class="login loginmodal-submit" value="Add Shop">
         <div class="login-help">
          <a href="<?php echo base_url('shops/show'); ?>">show All Shops</a>
          </div><br/>
        
      </div>
    </div>
</form>
  