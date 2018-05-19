<?php
	if (isset($message) && $message) {
		$alert = ($success)? 'alert-success':'alert-danger';
		echo '<div class="alert ' . $alert . '">' . $message . '</div>';
	}
?>
<div class="portlet light" style="height:45px">
	<div class="row">
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="<?php echo site_url('admin')?>" class="tooltips" data-original-title="Home" data-placement="top" data-container="body">Home</a>
				<i class="fa fa-arrow-right"></i>
			</li>
			<li>
				<a href="<?php echo site_url('admin/user')?>" class="tooltips" data-original-title="Brands" data-placement="top" data-container="body">Brands</a>
				<i class="fa fa-arrow-right"></i>
			</li>
			<li>
				<?php if($id != '')
				 	{?>Update Brand <?php }
				  else 
				  	{?>Add Brand <?php }
				  ?>			
			</li>	
			<li style="float:right;">
				<a class="btn red tooltips" href="<?php echo base_url('brands'); ?>" style="float:right;margin-right:3px;margin-top: -7px;" data-original-title="Go Back" data-placement="top" data-container="body">Go Back<i class="m-icon-swapleft m-icon-white"></i>
				</a>
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
				<?php echo form_open_multipart('brands/update/'.$brand_id); ?>

				
					<div class="form-body">                               
                    	<div class="form-group form-md-line-input">
							<label for="form_control_question" class="control-label col-md-2">Brand <span style="color:red">*</span></label>
							<div class="col-md-10">	
									<input type="hidden" class="form-control" name="brand_id" value="<?php echo $brand_id; ?>">				
								<?php echo form_input(array('placeholder' => "Enter your brand",  'name'=>"brand_name",'class' => "form-control", 'value' => $brand_name)); ?>
                                  <?php echo form_error('brand_name'); ?>
								<div class="form-control-focus"> </div>			
							</div>
						</div>                                	
						

                            <div class="form-group form-md-line-input">
							    <div class="col-md-2">
							    <input class="form-check-input" name="size_type_of_full" type="checkbox" <?php if(@$size_type['Full']) { ?> checked="checked" <?php } ?> value='Full'><label for="form_control_question" class="control-label ">Full</label>
								</div>	
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter your  Quantity !!!",  'name'=>"size_in_ml_of_full",'class' => "form-control", 'value' => @$size_in_ml['Full'])); ?>
			                   <?php echo form_error('size_in_ml_of_full'); ?>
			                  <div class="form-control-focus"> </div>

							</div>
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter your Price !!!",  'name'=>"price_of_full",'class' => "form-control", 'value' => @$price['Full'])); ?>
			                  <?php echo form_error('price_of_full'); ?>
			                  <div class="form-control-focus"> </div>
			                  			
							</div>
						</div>  
                           <div class="form-group form-md-line-input">
						 	<div class="col-md-2">
							 <input class="form-check-input" name="size_type_of_half"  type="checkbox"  <?php if(@$size_type['Half']) { ?> checked="checked" <?php } ?> value='Half'><label for="form_control_question" class="control-label ">Half</label>
							 
							</div>
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter your  Quantity !!!",  'name'=>"size_in_ml_of_half",'class' => "form-control", 'value' => @$size_in_ml['Half'])); ?>
			                   <?php echo form_error('size_in_ml_of_half'); ?>
			                  <div class="form-control-focus"> </div>

							</div>
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter your Price !!!",  'name'=>"price_of_half",'class' => "form-control", 'value' => @$price['Half'])); ?>
			                   <?php echo form_error('price_of_half'); ?>
			                  <div class="form-control-focus"> </div>
			                  			
							</div>
						</div>  
                           <div class="form-group form-md-line-input">
                           	<div class="col-md-2">
							<input class="form-check-input" name="size_type_of_quarter"  type="checkbox"  <?php if(@$size_type['Quarter']) { ?> checked="checked" <?php } ?> value='quarter'>
                            <label for="form_control_question" class="control-label" >Quarter</label>
							</div> 
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter your  Quantity !!!",  'name'=>"size_in_ml_of_quarter",'class' => "form-control", 'value' => @$size_in_ml['Quarter'])); ?>
			                  <?php echo form_error('size_in_ml_of_quarter'); ?>
			                  <div class="form-control-focus"> </div>

							</div>
							<div class="col-md-5">					
								<?php echo form_input(array('placeholder' => "Enter your Price !!!",  'name'=>"price_of_quarter",'class' => "form-control", 'value' => @$price['Quarter'])); ?>
			                  <?php echo form_error('price_of_quarter'); ?>
			                  <div class="form-control-focus"> </div>
			                  			
							</div>
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

<?php 
        if($this->session->flashdata('add_more_brand'))
        echo $this->session->flashdata('add_more_brand'); 
      ?>
<script>
$(document).ready(function () {
$('#brith_date').datepicker(
{
format: 'yyyy-mm-dd',
startDate:'now', 
autoclose:true
}
);
});

</script>
