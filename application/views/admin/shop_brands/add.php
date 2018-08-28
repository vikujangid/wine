<script type="text/javascript">
  $(function(){
    $(".sortable").sortable({
      update: function() {
          $(".sortable .display_order").each(function(key, value){
            $(this).val(parseInt(key) + 1);
          })
      }
    });
  })
</script>
<div class="row">
  <div class="col-md-12">
    
    
    <div class="portlet box grey-cascade">
      <div class="portlet-title">
        <div class="caption"><i class="fa fa-building-o"></i>Brands on <?php echo $shop_name; ?></div>
      </div>
        <div class="portlet-body">
         <div class="table-toolbar">
         
          <form class="ajax_form" method="POST" action="<?php echo current_url(); ?>">

            <table class="table">
              <thead>
                <th>Brand</th><th>Available</th><th>Full</th><th>Half</th><th>Quarter</th>
              </thead>     
              <tbody class="sortable">

            <?php foreach($my_brands as $key => $value) { ?>
              <tr>
                <td>
                  <?php echo $value->brand_name; ?>
                </td>
                <td>
                  <input class="form-check-input" name="prices[<?php echo $value->brand_id; ?>][brand_id]" type="checkbox" checked="checked" value='<?php echo $value->brand_id; ?>'>
                  <input type="hidden" class="display_order" name="prices[<?php echo $value->brand_id; ?>][display_order]" value="<?php $value->display_order; ?>">
                </td>
                <td>      
                  <input type="text" class="form-control" size="10" name="prices[<?php echo $value->brand_id; ?>][Full]" placeholder="Full"  value="<?php echo $value->price_full; ?>"/>
                </td>
                <td>
                  <input type="text" class="form-control" size="10" name="prices[<?php echo $value->brand_id; ?>][Half]" placeholder="Half"  value="<?php echo $value->price_half; ?>"/>
                </td>
                <td>
                  <input type="text" class="form-control" size="10" name="prices[<?php echo $value->brand_id; ?>][Quarter]" placeholder="Quarter"  value="<?php echo $value->price_quarter; ?>"/>
                </td>

                     
              </tr>
             <?php } ?>
             <?php foreach($all_brands as $key => $value) { ?>
              <tr>
                <td>
                  <?php echo $value->brand_name; ?>
                </td>
                <td>
                  <input class="form-check-input" name="prices[<?php echo $value->id; ?>][brand_id]" type="checkbox" value='<?php echo $value->id; ?>'>
                  <input type="hidden" class="display_order" name="prices[<?php echo $value->id; ?>][display_order]" value="100">
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
            <input type="submit" style="margin-left:400px;" name="login" class="btn btn-primary" value="Update">
        </form>
      </div>
    </div>
  </div>
  </div>
</div>