
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
				<?php echo form_open('shops/update'); ?>
				
					<div class="form-body">                               
                    	<div class="form-group form-md-line-input">
							<label  class="control-label col-md-2">Shop Name <span style="color:red">*</span></label>
							 <input type="hidden" class="form-control" name="shop_id" value="<?php echo $shop_id; ?>">
							 <div class="col-md-10">

								<?php echo form_input(array('placeholder' => "Enter your Shop Name ",'name'=>"shop_name",'class' => "form-control", 'value' => "$shop_name")); ?>
                               <div class="form-control-focus"> </div>			
							</div>
						</div>                                	
						 

                        <div class="form-group form-md-line-input">
							<label  class="control-label col-md-2">Owner name <span style="color:red">*</span></label>
							 <div class="col-md-10">					
								<?php echo form_input(array('placeholder' => "Enter your Owner name ",'name'=>"shop_owner_name",'class' => "form-control", 'value' => "$shop_owner_name")); ?>

								<div class="form-control-focus"> </div>			
							</div>
						</div>



						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-2">Address<span style="color:red">*</span></label>
							 <div class="col-md-10">					
								<?php echo form_input(array('placeholder' => "Enter your shop Address ",'name'=>"shop_address",'class' => "form-control", 'value' => "$shop_address")); ?>

								<div class="form-control-focus"> </div>			
							</div>
						</div>



						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-2">city <span style="color:red">*</span></label>
							 <div class="col-md-10">					
								<?php echo form_input(array('placeholder' => "Enter your City ",'name'=>"shop_address_city",'class' => "form-control", 'value' => "$shop_address_city")); ?>

								<div class="form-control-focus"> </div>			
							</div>
						</div>




						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-2">Zip Code <span style="color:red">*</span></label>
							 <div class="col-md-10">					
								<?php echo form_input(array('placeholder' => " ",'name'=>"shop_address_zip_code",'class' => "form-control", 'value' => "$shop_address_zip_code")); ?>

								<div class="form-control-focus"> </div>			
							</div>
						</div>

                           <div class="form-group form-md-line-input">
							<label  class="control-label col-md-2">Primary Contact Number <span style="color:red">*</span></label>
							 <div class="col-md-10">					
								<?php echo form_input(array('placeholder' => "Enter your City ",'name'=>"shop_primary_contact_number",'class' => "form-control", 'value' => "$shop_primary_contact_number")); ?>

								<div class="form-control-focus"> </div>			
							</div>
						</div>



						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-2">Owner Mobile Number <span style="color:red">*</span></label>
							 <div class="col-md-10">					
								<?php echo form_input(array('placeholder' => "Owner Mobile Number",'name'=>"shop_owner_mobile_number",'class' => "form-control", 'value' => "$shop_owner_mobile_number")); ?>

								<div class="form-control-focus"> </div>			
							</div>
						</div>



						<div class="form-group form-md-line-input">
							<label  class="control-label col-md-2">Email Address <span style="color:red">*</span></label>
							 <div class="col-md-10">					
								<?php echo form_input(array('placeholder' => "Email Address",'name'=>"shop_email_address",'class' => "form-control", 'value' => "$shop_email_address")); ?>

								<div class="form-control-focus"> </div>			
							</div>
						</div>
                      <center><button type="submit" style="margin-top:20px;" class="btn green">Submit</button></center>
					<div class="form-actions noborder">
						<div class="row">
							<div class="col-md-offset-2 col-md-10">
							
						</div>
					   </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

