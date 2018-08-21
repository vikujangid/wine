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
        <div class="caption"><i class="fa fa-building-o"></i>Available Wine Brand</div>
      </div>
        <div class="portlet-body">
         <div class="table-toolbar">
          <div id="alert_area"></div>
           <div class="row">
             <div class="col-md-12">
                </div>
        </div>
        <br>
        <div class="ajax_content">
          <?php echo form_open(); ?>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-4">
    <label class="brand-lable" for="size">Brands on <?php echo $shop_name; ?></label>
    </div>
    <div class="col-sm-2">
    <label class="brand-lable" for="quantity">Availability</label>
    </div>
    <div class="col-sm-4">
    <label class="brand-lable" for="quantity">price(Full/Half/Quarter)</label>
    </div> 
    <div class="col-sm-1"></div>
    </div>
<script type="text/javascript">
  $(function(){
    $(".sortable").sortable();
  })
</script>
<table class="table">     
  <tbody class="sortable">

<?php foreach($all_brands as $key => $value) { ?>
  <tr>
    <td>
      <?php echo $value->brand_name; ?>
    </td>
    <td>
      <input class="form-check-input" name="prices[<?php echo $value->id; ?>][brand_id]" type="checkbox" <?php if($value->checked) { ?> checked="checked" <?php } ?> value='<?php echo $value->id; ?>'>
    </td>
    <td>      
      <input type="text" class="form-control" size="10" name="prices[<?php echo $value->id; ?>][Full]" placeholder="Full"  value="<?php echo $value->price_full; ?>"/>
    </td>
    <td>
      <input type="text" class="form-control" size="10" name="prices[<?php echo $value->id; ?>][Half]" placeholder="Half"  value="<?php echo $value->price_half; ?>"/>
    </td>
    <td>
      <input type="text" class="form-control" size="10" name="prices[<?php echo $value->id; ?>][Quarter]" placeholder="Quarter"  value="<?php echo $value->price_quarter; ?>"/>
    </td>
         
  </tr>
 <?php } ?>
</tbody>
</table>
  <br>
     <input type="submit" style="margin-left:400px;" name="login" class="btn btn-primary" value="Update">
      </div>
    </div>
<?php echo form_close(); ?>
  </div>
  