
<div class="portlet light" style="height:45px">
	<div class="row">
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="<?php echo site_url()?>" class="tooltips" data-original-title="home" data-placement="top" data-container="body">Home</a>
				
			</li>
						
		</ul>			
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="row">
					<div class="col-md-6">
						<div class="caption font-red-sunglo">
							<i class="fa fa-file-image"></i>
							<span class="caption-subject bold uppercase"><?php echo $page_title; ?></span>
						</div>
					</div>					
				</div>				
			</div>
			<div class="portlet-body form">
				<?php echo form_open('brands/update'); ?>
				<input type="hidden" class="form-control" name="brand_id" value="<?php echo $brand_id; ?>">
				<input type="hidden" class="form-control" name="brand_category_id" value="<?php echo $brand_category_id; ?>">
					<div class="form-body">                               
                    	<div class="form-group form-md-line-input">
							<label for="form_control_question" class="control-label col-md-2">Brand <span style="color:red">*</span></label>
							<div class="col-md-10">					
								<?php echo form_input(array('placeholder' => "Enter brand",  'name'=>"brand_name",'class' => "form-control", 'value' => " $brand_name ")); ?>
                                 
								<div class="form-control-focus"> </div>
								 <?php echo form_error('brand_name'); ?>			
							</div>
						</div>                                	
						<div class="form-group form-md-line-input">
							<label for="form_control_title" class="control-label col-md-2">Size Type</label>
                               <div class="col-md-10">								
								 <div class="md-checkbox-inline">
									<div class="md-checkbox">
										<input id="radio25" name="size_type", class="md-checkbox" type="checkbox" <?php if($size_type) { ?> checked="checked" <?php } ?> value="<?php echo $size_type;?>">
										   <?php echo form_error('size_type'); ?>
										  <?php echo $size_type; ?>
										  <label for="radio25">
											<span class="inc"></span>
											<span class="check"></span>
											<span class="box"></span>
											</label>
										
									</div>
								</div>
                          </div> 
                          <div class="form-group form-md-line-input">
							<label for="form_control_question" class="control-label col-md-2">Quantity <span style="color:red">*</span></label>
							<div class="col-md-10">					
								<?php echo form_input(array('placeholder' => "Enter Quantity", 'name'=>"size_in_ml", 'class' => "form-control", 'value' => "$size_in_ml")); ?>
								<?php echo form_error('size_in_ml'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div> 
						<div class="form-group form-md-line-input">
							<label for="form_control_question"  class="control-label col-md-2">Price <span style="color:red">*</span></label>
							<div class="col-md-10">					
								<?php echo form_input(array('placeholder' => "Enter Price", 'name'=>"price", 'class' => "form-control", 'value' => "$price")); ?>
								<?php echo form_error('price'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div> 
                         </div> 
						<div class="form-group form-md-line-input">
							<label for="form_control_title" class="control-label col-md-2">Status</label>
							<div class="col-md-10">								
								<div class="md-radio-inline">
									<div class="md-radio">
										<input id="radio19" class="md-radiobtn" type="radio" name="status" value="Active" <?php echo ($status == 'Active')?'checked':''; ?>>
										<label for="radio19">
											<span class="inc"></span>
											<span class="check"></span>
											<span class="box"></span>
										Active</label>
									</div>
									<div class="md-radio has-error">
									<input id="radio20" class="md-radiobtn" type="radio" name="status" value="Inactive" <?php echo ($status == 'Inactive')?'checked':''; ?>>
										<label for="radio20">
											<span class="inc"></span>
											<span class="check"></span>
											<span class="box"></span>
										Inactive</label>
									</div>
								</div>
							</div>
						</div>




					</div>
					<div class="form-actions noborder">
						<div class="row">
							<div class="col-md-offset-2 col-md-10">
							<button type="submit" class="btn green">Submit</button>
							<a href="<?php echo base_url('brands'); ?>" class="btn default">Cancel</a>
						</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

