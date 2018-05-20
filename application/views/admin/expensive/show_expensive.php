
<script type="text/javascript">

$(function(){
	submitSearchData();
});
</script>
<div class="row">
  <div class="col-md-12">
	<div class="portlet box grey-cascade">
	  <div class="portlet-title">
		<div class="caption"><i class="fa fa-building-o"></i>Expenses - <?php echo $shop_name; ?></div>
	  </div>
		<div class="portlet-body">
		   <div class="table-toolbar">
			 <div id="alert_area"></div>
			   <div class="row">
				 <div class="col-md-12">
				  <div class="btn-group tooltips">
				         <a href="<?php echo site_url('expenses/add/'.$shop_id); ?>" class="btn green add_link"> Add <i class="fa fa-plus"></i></a>
				   </div>
                  </div>
				</div><br>
	<div class="ajax_content">
       <div class="row">
          <div class="col-sm-12">    
            <table class="table table-hover">
          	<thead> 
            <th>TITLE</th>  
            <th>DATE</th>
            <th>AMOUNT</th>
            <th>OPTION</th>
            </thead>
          	<tbody>
            <?php foreach ($records as $key => $value) {?>
                <tr>
                    <td><?php echo $value->title; ?></td>
                    <td><?php echo $value->date; ?></td>
                    <td><?php echo $value->amount; ?></td>
                    <td>
                       <a href="<?php echo base_url('expenses/edit/'.$value->id); ?>" class="btn btn-info">Edit</a>
                       <a href="<?php echo base_url('expenses/delete/'.$value->id); ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
          </div>
        </div>
	  </div>
	</div>
  </div>
</div>
