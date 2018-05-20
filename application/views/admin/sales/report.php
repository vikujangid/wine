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
				<div class="caption"><i class="fa fa-building-o"></i>Find Any Sale</div>
			 </div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div id="alert_area"></div>
					<div class="row">
						<div class="col-md-12"></div>
				  </div>
				<br>
				<div class="ajax_content">
          <form method="get" action="<?php echo site_url('sales/report'); ?>">
         
          <div class="row">
             <div class="col-md-2 col-sm-2"> </div>
             <div class="col-sm-3" >
              
                 <select class="form-control" name="shop_id">
                   <?php foreach ($shops as $key => $value) {?>
                    <option class="form-control" value="<?php  echo $value->id;?>" <?php if ($shop_id == $value->id) { ?> selected="" <?php } ?> ><?php echo $value->shop_name;?></option>
                   <?php }?>
                 </select>
             </div>
             
             <div class="col-sm-3 ">
                  <input type="text" value="<?php echo $date; ?>"  name="date"  placeholder="Enter date" id="datepicker"  class="form-control"/>
                  <?php echo form_error('date', '<div class="error" style="color:red;">', '</div>'); ?>
                  <h5 style="color:red"><center><b><?php echo validation_errors(); ?></b></center></h5>
             </div> 
               
             <div class="col-md-2 col-sm-2"> 
                 <input type="submit" value="Find" name="submit" class="btn btn-primary"/>
             </div>
             <div class="col-md-2 col-sm-2"> </div>   
          
          </div>
             <?php echo form_close(); ?>
            <div class="row">
            <div class="col-sm-12">    
            <table class="table table-hover" border="1">
            <thead> 
            <th style="padding-bottom:40px;"><center>BRAND NAME</center></th>
            <th>
            <center>
                <table  style="width:100%; text-align:center;">
                    <tr>Initial<hr></tr>
                    <tr>
                        <td>Full</td>
                        <td>Half</td>
                        <td>Quarter</td>
                    </tr>
                </table>
            </center>
            </th>
             <th>
            <center>
                <table  style="width:100%; text-align:center;">
                    <tr>CREDIT <hr></tr>
                    <tr>
                        <td>Full</td>
                        <td>Half</td>
                        <td>Quarter</td>
                    </tr>
                </table>
            </center>
            </th>
            <th>
            <center>
                <table  style="width:100%; text-align:center;">
                    <tr>SHIPPED <hr></tr>
                    <tr>
                        <td>Full</td>
                        <td>Half</td>
                        <td>Quarter</td>
                    </tr>
                </table>
            </center>
            </th>
            <th>
            <center>
                <table  style="width:100%; text-align:center;">
                    <tr>SOLD <hr></tr>
                    <tr>
                        <td>Full</td>
                        <td>Half</td>
                        <td>Quarter</td>
                    </tr>
                </table>
            </center>
            </th>
            </thead>
            <tbody>

              <tr>
                  <table  style="width:100%; text-align:center; "  border="1">
                    <?php foreach ($product_sale as $key => $value) { ?>
                      <tr>
                        <td style="width:18%;"><?php echo @$key;?></td>
                          <?php foreach ($value as $keys => $sale_value) {  ?>
                          
                            <td style="width:6.8%;"><?php echo @$sale_value['Full']?@$sale_value['Full']: 0 ;?></td>
                            <td style="width:6.8%;"><?php echo @$sale_value['Half']?@$sale_value['Half']: 0 ;?></td>
                            <td style="width:6.8%;"><?php echo @$sale_value['Quarter']?@$sale_value['Quarter']: 0 ;?></td>
                          <?php  } ?>
                      <tr>
                    <?php } ?>
                  </table>
              </tr>
           
            <?php if(!$sale_list) { ?>
                <tr><td colspan="12"><div class="no-record text-center">No record</div></td></tr>
            <?php } ?>
            </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
<script>
          $(document).ready(function() {
            var currentDate = new Date(); 
            $("#datepicker").datepicker({format: 'yyyy-mm-dd'} );
            //$('#datepicker').datepicker('setDate', 'today');
          });
</script>

       </div>
			</div>
		</div>
	</div>
</div>
