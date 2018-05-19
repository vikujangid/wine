<?php echo form_open_multipart('brands/add'); ?>
    <div class="brand-lable modal-dialog">
      <div class="loginmodal-container">
       <?php 
        if($this->session->flashdata('add_more_brand'))
        echo $this->session->flashdata('add_more_brand'); 
      ?>
     
      <h1>Add Wine Brand</h1><br>


     


        <div class="row">
        <div class="col-sm-4">
        <label class="brand-lable" for="email">Brand Name:</label>
        </div>
        <div class="col-sm-8">
        <span class="login-help"><?php echo form_error('brand_name'); ?></span>
        <input type="text" class="form-control" name="brand_name" value="<?php echo $brand_name; ?>" placeholder="Brand Name">
        </div>
       
        </div>

        <br/><br/>


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
          <input class="form-check-input" name="size_type_of_full" type="checkbox" <?php if($size_type_of_full) { ?> checked="checked" <?php } ?> value='Full'>
            Full
          </label>
        </div>
        </div>
        <div class="col-sm-4">
        <span class="login-help"><?php echo form_error('size_in_ml_of_full'); ?></span>
        <input type="text" class="form-control" name="size_in_ml_of_full" value="<?php echo $size_in_ml_of_full; ?>" placeholder="in ml.">
        </div>
        <div class="col-sm-4">
        <span class="login-help"><?php echo form_error('price_of_full'); ?></span>
        <input type="text" class="form-control" name="price_of_full" value="<?php echo $price_of_full; ?>"  placeholder="in Rs.">
        </div>
        </div>

          <div class="row">
        <div class="col-sm-4">
        <div class="form-check">
          <label class="form-check-label">
          <input class="form-check-input" name="size_type_of_half"  type="checkbox"  <?php if($size_type_of_half) { ?> checked="checked" <?php } ?> value='Half'>
            Half
          </label>
        </div>
        </div>
        <div class="col-sm-4">
        <span class="login-help"><?php echo form_error('size_in_ml_of_half'); ?></span>
        <input type="text" class="form-control" name="size_in_ml_of_half" value="<?php echo $size_in_ml_of_half; ?>" 
         placeholder="in ml.">
        </div>
        <div class="col-sm-4">
        <span class="login-help"><?php echo form_error('price_of_half'); ?></span>
        <input type="text" class="form-control" name="price_of_half" value="<?php echo $price_of_half; ?>"   placeholder="in Rs.">
        </div>
        </div>



           <div class="row">
        <div class="col-sm-4">
        <div class="form-check">
          <label class="form-check-label">
          <input class="form-check-input" name="size_type_of_quarter"  type="checkbox"  <?php if($size_type_of_quarter) { ?> checked="checked" <?php } ?> value='quarter'>
           quarter
          </label>
        </div>
        </div>
        <div class="col-sm-4">
        <span class="login-help"><?php echo form_error('size_in_ml_of_quarter'); ?></span>
        <input type="text" class="form-control" name="size_in_ml_of_quarter" value="<?php echo $size_in_ml_of_quarter; ?>" 
         placeholder="in ml.">
        </div>
        <div class="col-sm-4">
        <span class="login-help"><?php echo form_error('price_of_quarter'); ?></span>
        <input type="text" class="form-control" name="price_of_quarter" value="<?php echo $price_of_quarter; ?>"   placeholder="in Rs.">
        </div>
        </div>
        
       
        <div class="row">
          <div class="col-sm-12">
            <input type="file" name="product_photo"/>
          </div>
 <br/><br/>

        <input type="submit" name="login" class="login loginmodal-submit" value="Add New Brand">
         <div class="login-help">
          <a href="<?php echo base_url('brands/show'); ?>">show All Brands</a>
          </div>
        
      </div>
    </div>
    <?php echo form_close(); ?>
