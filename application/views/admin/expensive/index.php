<?php
	if ($this->session->flashdata('message')) {
		echo '<div class="alert alert-success">' . $this->session->flashdata('message') . '</div>';
	}
?>
<div class="row">
   <div class="col-md-12">
	<div class="portlet box grey-cascade">
	  <div class="portlet-title">
	   <div class="caption"><i class="fa fa-building-o"></i>Select Shop</div>
	  </div>
	    <div class="portlet-body">
		 <div class="table-toolbar">
		  <div id="alert_area"></div>
		   <div class="row">
		    <div class="col-md-12">
		     <div class="btn-group tooltips" data-original-title="<?php echo $this->lang->line('Add_New_Industry'); ?>">
		     </div>
            </div>
		   </div><br>
		<div class="ajax_content">
         <div class="row">
          <div class="col-sm-3" ></div>
            <div class="col-sm-6" >
              <form action="<?php echo site_url('expenses/show'); ?>" method="get" >
                 <select class="form-control shop_id" name="shop_id">
	                  <?php foreach ($shops as $key) {?>
	                  <option class="form-control" value="<?php  echo $key->id;?>"><?php echo $key->shop_name;?></option>
	                  <?php }?>
                 </select><br/>
                 <center><input type="button" onclick="goToPage(this)" class="btn btn-primary" value="Go"/></center>	
               </form>
            </div>
           <div class="col-sm-3"></div>
         </div>
	   </div>
	</div>
  </div>
</div>
<script type="text/javascript">
function goToPage($this)
{
	var site_url = '<?php echo site_url() ?>';
	var shop_id = $($this).closest('form').find('.shop_id').val();
	window.location.href = site_url+'expenses/show/'+shop_id;

}
</script>