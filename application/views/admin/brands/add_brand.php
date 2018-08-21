
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
				<?php echo form_open_multipart('brands/add', array('class' => 'ajax_form')); ?>
				
					<div class="form-body">                               
                    	<div class="form-group form-md-line-input">
							<label for="form_control_question" class="control-label col-md-2">Brand <span style="color:red">*</span></label>
							<div class="col-md-10">					
								<?php echo form_input(array('placeholder' => "Enter your brand",  'name'=>"brand_name",'class' => "form-control", 'value' => "")); ?>
                                  <?php echo form_error('brand_name'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div>                                	
						

                            <div class="form-group form-md-line-input">
							    <div class="col-md-2">
							    <input class="form-check-input" name="size_type_of_full" type="checkbox" <?php if($size_type_of_full) { ?> checked="checked" <?php } ?> value='Full'><label for="form_control_question" class="control-label ">Full</label>
								</div>	
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter Quantity",  'name'=>"size_in_ml_of_full",'class' => "form-control", 'value' => $size_in_ml_of_full)); ?>
			                   <?php echo form_error('size_in_ml_of_full'); ?>
			                  <div class="form-control-focus"> </div>

							</div>
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter MRP Price",  'name'=>"price_of_full",'class' => "form-control", 'value' => "")); ?>
			                  <?php echo form_error('price_of_full'); ?>
			                  <div class="form-control-focus"> </div>
			                  			
							</div>
						</div>  
                           <div class="form-group form-md-line-input">
						 	<div class="col-md-2">
							 <input class="form-check-input" name="size_type_of_half"  type="checkbox"  <?php if($size_type_of_half) { ?> checked="checked" <?php } ?> value='Half'><label for="form_control_question" class="control-label ">Half</label>
							 
							</div>
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter Quantity",  'name'=>"size_in_ml_of_half",'class' => "form-control", 'value' => $size_in_ml_of_half)); ?>
			                   <?php echo form_error('size_in_ml_of_half'); ?>
			                  <div class="form-control-focus"> </div>

							</div>
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter MRP Price",  'name'=>"price_of_half",'class' => "form-control", 'value' => "")); ?>
			                   <?php echo form_error('price_of_half'); ?>
			                  <div class="form-control-focus"> </div>
			                  			
							</div>
						</div>  
                           <div class="form-group form-md-line-input">
                           	<div class="col-md-2">
							<input class="form-check-input" name="size_type_of_quarter"  type="checkbox"  <?php if($size_type_of_quarter) { ?> checked="checked" <?php } ?> value='quarter'>
                            <label for="form_control_question" class="control-label" >Quarter</label>
							</div> 
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter Quantity",  'name'=>"size_in_ml_of_quarter",'class' => "form-control", 'value' => $size_in_ml_of_quarter)); ?>
			                  <?php echo form_error('size_in_ml_of_quarter'); ?>
			                  <div class="form-control-focus"> </div>

							</div>
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter MRP Price",  'name'=>"price_of_quarter",'class' => "form-control", 'value' => "")); ?>
			                  <?php echo form_error('price_of_quarter'); ?>
			                  <div class="form-control-focus"> </div>
			                  			
							</div>
						</div>  

						
                       <br>
                       <input style="margin-left:175px;" type="file" name="product_photo" />


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

<?php 
        if($this->session->flashdata('add_more_brand'))
        echo $this->session->flashdata('add_more_brand'); 
      ?>