<?php
	if ($this->session->flashdata('message')) {
		echo '<div class="alert alert-success">' . $this->session->flashdata('message') . '</div>';
	}
?>
<script type="text/javascript">

$(function(){
	submitSearchData();
});
</script>
<div class="row">
	<div class="col-md-12">
		
		
		<div class="portlet box grey-cascade">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-building-o"></i>All Shops</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div id="alert_area"></div>
					<div class="row">
						<div class="col-md-12">
							<div class="btn-group tooltips" data-original-title="<?php echo $this->lang->line('Add_New_Industry'); ?>">
								<a href="<?php echo base_url('shops/add'); ?>" class="btn green add_link"><?php echo $this->lang->line('Add_New'); ?>  Add Shop<i class="fa fa-plus"></i></a>
							</div>

							
												
					</div>
				</div>
				<br>
				<div class="ajax_content">
					
					<table class="table table-striped table-bordered table-hover" id="sample_3">
						<thead>
							<tr>
								
					    		</th>
								<th>Shop Name</th>
								<th>Owner</th>
								<th>Address</th>
							    <th>Contact Number</th>
							    
							    
						
							    <th>Status</th>
							    <th>Options</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							if(sizeof($records)>0) {
							 foreach ($records as $key => $value) { ?>
								<tr>
								
								<td>
									<?php echo $value->shop_name; ?>
								</td>

								<td>
									<?php echo $value->shop_owner_name;?>
									<br><?php echo $value->shop_email_address;?>
									<br><label class="label label-default"><?php echo $value->shop_owner_mobile_number;?></label> 
								</td>
								<td>
									<?php echo $value->shop_address;?>, <?php echo $value->shop_address_city;?>, <?php echo $value->shop_address_zip_code;?>
								</td>
								
								<td>
									<label class="label label-info"><?php echo $value->shop_primary_contact_number;?></label>
								</td>

								
								<td>
									<?php if($value->status == "Active") { ?>
										<label class="label label-success">Active</label>
									<?php } else { ?>
										<label class="label label-success">Inactive</label>
									<?php } ?>
								</td>
								
								<td class="text-center">

									<a href="<?php echo base_url('shop_brands/show/'.$value->id); ?>" class="btn green tooltips" data-original-title="Aviailable brands" data-placement="top" data-container="body"><i class="fa fa-file"></i></a>
									<a href="<?php echo base_url('shops/edit/'.$value->id); ?>" class="btn purple tooltips" data-original-title="Click to update this record" data-placement="top" data-container="body"><i class="fa fa-pencil"></i></a>
									<a data-toggle="modal" data-id="<?php echo $value->id; ?>" data-url="<?php echo base_url('shops/delete/'.$value->id); ?>" class="btn btn-danger tooltips" onClick="deleteRecord(this);" data-original-title="Click to delete this shop" data-placement="top" data-container="body"><i class="fa fa-remove"></i></a>
								</td>							
							</tr>	
							<?php } 
							} else { ?>
								<tr>
								<td colspan="10"><div class="no-record"><?php echo $this->lang->line('No_record_found'); ?></div></td>
								</tr>

							<?php } ?>					
						</tbody>
					</table>
					<!-- <div class="row">
						<div class="col-md-5 col-sm-12"></div>
						<div class="col-md-7 col-sm-12">
							<div class="pull-right">
								<?php echo $paging; ?>
							</div>
						</div>
					</div> -->
					
				</div>
			</div>
		</div>
	</div>
</div>
