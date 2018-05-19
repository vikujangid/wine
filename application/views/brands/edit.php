<?php echo form_open('brands/update'); ?>
    <div class="brand-lable modal-dialog">
      <div class="loginmodal-container">
      
     
      <h1>Update Wine Brand</h1><br>


     


   <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="brand_name">Brand Name:</label>
        </div>
        <div class="col-sm-8">
        <input type="hidden" class="form-control" name="brand_id" value="<?php echo $brand_id; ?>">
        <input type="hidden" class="form-control" name="brand_category_id" value="<?php echo $brand_category_id; ?>">
        <span class="login-help"><?php echo form_error('brand_name'); ?></span>
        <input type="text" class="form-control" name="brand_name" value="<?php echo $brand_name; ?>" placeholder="Brand Name">
        </div>
       
        </div>

        

        <div class="row">
          <div class="col-sm-4">
            <label class="brand-lable" for="brand_name">Status:</label>
          </div>
          <div class="col-sm-8">
            <label class="radio-inline"><input type="radio" name="status"  value="Active" <?php if($status == 'Active') { ?> checked="checked" <?php } ?>>Active</label>
            <label class="radio-inline"><input type="radio" name="status" value="Inactive" <?php if($status == 'Inactive') { ?> checked="checked" <?php } ?>>Inactive</label>        
          </div>
        </div>






        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="size">Size:</label>
        </div>
        <div class="col-sm-4">
        <label class="brand-lable" for="quantity">Quantity:</label>
        </div>
        <div class="col-sm-4">
        <label class="brand-lable" for="price">Price:</label>
        </div>
        </div>

     

        <div class="row">
        <div class="col-sm-4">
        <div class="form-check">
          <label class="form-check-label">
          <span class="login-help"><?php echo form_error('size_type'); ?></span>
          <input class="form-check-input" name="size_type" type="checkbox" <?php if($size_type) { ?> checked="checked" <?php } ?> value='<?php echo $size_type; ?>'>
            <?php echo $size_type; ?>
          </label>
        </div>
        </div>
        <div class="col-sm-4">
        <span class="login-help"><?php echo form_error('size_in_ml'); ?></span>
        <input type="text" class="form-control" name="size_in_ml" value="<?php echo $size_in_ml; ?>" placeholder="in ml.">
        </div>
        <div class="col-sm-4">
        <span class="login-help"><?php echo form_error('price'); ?></span>
        <input type="text" class="form-control" name="price" value="<?php echo $price; ?>"  placeholder="in Rs.">
        </div>
        </div>


        <input type="submit" name="login" class="login loginmodal-submit" value="Update">
         <div class="login-help">
          <a href="<?php echo base_url('brands'); ?>">show All Brands</a>
          </div>
        
      </div>
    </div>
    <?php echo form_close(); ?>
   