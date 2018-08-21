
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
							<span class="caption-subject bold uppercase"></span>
						</div>
					</div>					
				</div>				
			</div>
			<div class="portlet-body form">
				<form action="<?php echo current_url(); ?>" method="POST" id="add-form" class="ajax_form">
				
					<div class="form-body">                               
                    	<div class="form-group form-md-line-input">
							<label  class="control-label col-md-3">Shop Name <span style="color:red">*</span></label>
							 <div class="col-md-9">					
								<?php echo form_input(array('placeholder' => "Enter Shop Name ",'name'=>"shop_name",'class' => "form-control", 'value' => $shop_name)); ?>
                                 <?php echo form_error('shop_name'); ?>
								<div class="form-control-focus"> </div>		

							</div>
						</div>    

						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-3">Its a Branch of <span style="color:red"></span></label>
							 <div class="col-md-9">					
								<select name="parent_shop_id" class="form-control">
									<option value="">This shop is not A Branch</option>
									<?php foreach ($parent_shops as $key => $value) { ?>
										
										<option <?php if($value->id == $parent_shop_id) { ?> selected <?php } ?> value="<?php echo $value->id; ?>"><?php echo $value->shop_name; ?></option>
									<?php } ?>
								</select>
								<div class="form-control-focus"> </div>		

							</div>
						</div>                                	
						 

                        <div class="form-group form-md-line-input">
							<label  class="control-label col-md-3">Owner name <span style="color:red"></span></label>
							 <div class="col-md-9">					
								<?php echo form_input(array('placeholder' => "Enter Owner name ",'name'=>"shop_owner_name",'class' => "form-control", 'value' => $shop_owner_name)); ?>
                                <?php echo form_error('shop_owner_name'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div>



						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-3">Address<span style="color:red"></span></label>
							 <div class="col-md-9">					
								<?php echo form_input(array('placeholder' => "Enter Shop Address ",'name'=>"shop_address",'class' => "form-control", 'value' => $shop_address)); ?>
                                <?php echo form_error('shop_address'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div>



						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-3">City <span style="color:red"></span></label>
							 <div class="col-md-9">					
								<?php echo form_input(array('placeholder' => "Enter City ",'name'=>"shop_address_city",'class' => "form-control", 'value' => $shop_address_city)); ?>
                                 <?php echo form_error('shop_address_city'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div>




						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-3">Zip Code <span style="color:red"></span></label>
							 <div class="col-md-9">					
								<?php echo form_input(array('placeholder' => "Enter Zip Code",'name'=>"shop_address_zip_code",'class' => "form-control", 'value' => $shop_address_zip_code)); ?>
                                 <?php echo form_error('shop_address_zip_code'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div>

                           <div class="form-group form-md-line-input">
							<label  class="control-label col-md-3">Shop Contact Number <span style="color:red"></span></label>
							 <div class="col-md-9">					
								<?php echo form_input(array('placeholder' => "Enter Shop Contact Number ",'name'=>"shop_primary_contact_number",'class' => "form-control", 'value' => $shop_primary_contact_number)); ?>
                                 <?php echo form_error('shop_primary_contact_number'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div>



						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-3">Owner Mobile Number <span style="color:red"></span></label>
							 <div class="col-md-9">					
								<?php echo form_input(array('placeholder' => "Owner Mobile Number",'name'=>"shop_owner_mobile_number",'class' => "form-control", 'value' => $shop_owner_mobile_number)); ?>
                                <?php echo form_error('shop_owner_mobile_number'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div>



						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-3">Email Address <span style="color:red"></span></label>
							 <div class="col-md-9">					
								<?php echo form_input(array('placeholder' => "Email Address",'name'=>"shop_email_address",'class' => "form-control", 'value' => $shop_email_address)); ?>
                                <?php echo form_error('shop_email_address'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div>

					<div class="form-actions noborder">
						<div class="row">
							<div class="col-md-offset-2 col-md-10">

							<button type="submit" class="btn green">Submit</button>
						</div>
					   </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

