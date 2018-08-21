
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
				<div class="caption"><i class="fa fa-building-o"></i>Brands</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div id="alert_area"></div>
					<div class="row">
						<div class="col-md-12">
							<div class="btn-group tooltips" data-original-title="">
								<a href="<?php echo base_url('brands/add'); ?>" class="btn green add_link"><?php echo $this->lang->line('Add_New'); ?>  Add Brand<i class="fa fa-plus"></i></a>
							</div>
                     </div>
				</div>
				<br>
				<div class="ajax_content">
					<table class="table table-striped table-bordered table-hover" id="sample_3">
												<thead>
						      <tr>
						        <th>Brand Name</th>
						     
						        
						        
						        <th>Options</th>
						      </tr>
						    </thead>
						<tbody>
							<?php
							 foreach ($brands as $key => $value) { ?>
								<tr>
								
								<td>
									<?php echo $value->brand_name; ?>
								</td>

								
								
								<td class="text-center">
                                    <a href="<?php echo base_url('brands/update/'.$value->id); ?>" class="btn purple tooltips" data-original-title="Click to update this record" data-placement="top" data-container="body"><i class="fa fa-pencil"></i></a>
									<a data-toggle="modal" data-id="<?php echo $value->id; ?>" data-url="<?php echo base_url('brands/delete/'.$value->id); ?>" class="btn btn-danger tooltips" onClick="deleteRecord(this);" data-original-title="Click to delete this shop" data-placement="top" data-container="body"><i class="fa fa-remove"></i></a>
								</td>							
							</tr>	
							<?php }  ?>
											
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
