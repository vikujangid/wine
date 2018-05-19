
<script type="text/javascript">

$(function(){
	submitSearchData();
});
</script>
<div class="row">
  <div class="col-md-12">
   <div class="portlet box grey-cascade">
    <div class="portlet-title">
     <div class="caption"><i class="fa fa-building-o"></i>Select Shop</div>
	 </div>
	   <div class="portlet-body">
		<div class="table-toolbar">
		 <div id="alert_area"></div>
		  <form action="<?php echo current_url(); ?>" method="post" >
            <div class="row">
		      <div class="col-md-12">
			   <div class="btn-group tooltips"  ></div>
			  </div>
			</div><br>
			  <div class="ajax_content">
               <div class="row">
                <div class="col-sm-3" >
                </div>
                 <div class="col-sm-6" >
                 	 <label for="title">Title</label>
                      <input type="text" name="title"  placeholder="Enter title" value="<?php echo $title; ?>"  class="form-control "/><br/>
                      <label for="amount">Amount</label>
                      <input type="text" name="amount"  placeholder="Enter Amount" value="<?php echo $amount; ?>"  class="form-control "/><br/>
                      <label for="date">Date</label>
                      <input type="text" name="date"  placeholder="Enter date" id="datepicker" value="<?php echo $date; ?>" class="form-control datepicker"/><br/>
                      <?php echo validation_errors(); ?>
                       <center><input type="submit" class="btn btn-primary" value="Submit"/></center>	
                 </div>
                 <div class="col-sm-3"></div>
                </div>
              </div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
             $(document).ready(function() {
            var currentDate = new Date(); 
            $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'} );
            $('#datepicker').datepicker('setDate', 'today');});
</script>
