

<?php echo form_open(); ?>
    <div class="brand-lable modal-dialog">
      <div class="loginmodal-container">
        <h1>Available Wine Brand</h1><br>
         <div class="row">
           <div class="col-sm-2"></div> 
--         <div class="col-sm-4">
              <label class="brand-lable" for="size">Brands on <?php echo $shop_name; ?></label>
           </div>
           <div class="col-sm-4">
              <label class="brand-lable" for="quantity">Availablity</label>
           </div>
           <div class="col-sm-2"></div> 
         </div>
      <?php foreach($all_brands as $key => $value) { ?>
         <div class="row">
           <div class="col-sm-2"></div>
           <div class="col-sm-4">
              <span class="login-help"><?php echo $value->brand_name; ?></span>
           </div> 
           <div class="col-sm-4">
             <div class="form-check">
             <label class="form-check-label">
              <input class="form-check-input" name="<?php echo $value->id; ?>" type="checkbox" <?php if($value->status !== 0) { ?> checked="checked" <?php } ?> value='<?php echo $value->id; ?>'>
             </label>
             </div>
           </div>
          <div class="col-sm-2"></div>
        </div>
     <?php } ?>
     <input type="submit" name="login" class="login loginmodal-submit" value="Update">
      <div class="login-help">
        <a href="<?php echo base_url('brands'); ?>">show All Brands</a>
      </div>
    </div>
  </div>
<?php echo form_close(); ?>