
<script type="text/javascript">
$(function(){
    $(".brand_list:first").trigger('click');
    //submitSearchData();
});
</script>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">Sales</div>
            </div>
            <div class="portlet-body form">
                <div class="table-toolbar">
                    <div class="ajax_content">
                        <?php echo form_open(site_url('sales'), array('class' => 'form-horizontal ajax_form')); ?>
          

          <div class="form-body">
            <div class="col-md-2">
              <div class="img"></div>
            </div>
            <div class="col-md-8">
              <div class="">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Select Shop</label>
                    <select class="form-control" name="shop_id" onchange="getsize()" id="shop_id">
                    <?php foreach ($shops as $key => $value) {?>
                      <option class="form-control" value="<?php echo $value->id;?>"><?php echo $value->shop_name;?></option>
                    <?php } ?>
                    </select> 
                    
                </div>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Select Date</label>
                    <input type="text" onchange="getsize()" name="date"  placeholder="Enter date" id="datepicker"  class="form-control datepicker"/>
                  </div>
                </div>
                <div class="col-md-3">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="ajax_content_inner"></div>
                </div>
              
              
              </div>
            </div>
            <div class="col-md-2">
            <div class="form-group">
            <label>Select Brand</label>
                  
            <div class="list-group ">
              <?php foreach ($brand as $key) {?>
                <a data-value="<?php  echo $key->id;?>" onclick="selectBrandOnClick(this)" class="list-group-item brand_list"><?php echo $key->brand_name;?></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" class="form-control" name="brand_id" id= "brand_id" onchange="getsize()">
      <?php echo form_close(); ?>
    </div>
  </div>
<script>
  var siteurl = '<?php echo site_url() ?>';
  function selectBrandOnClick($this)
  {
    var brand_id = $($this).attr('data-value');
    $($this).siblings().removeClass('active');
    $($this).addClass('active');

    $("#brand_id").val(brand_id);
    getsize();
  }
    function getsize()
    { 
      var brand_id = $('#brand_id').val();
      var shop_id = $('#shop_id').val();
      var datepicker = $('#datepicker').val();
      var dateString = 'brand_id='+brand_id+'&date='+datepicker+'&shop_id='+shop_id;
      if(brand_id && shop_id &&  datepicker )
        {
         $(".full_size_list").html("");
         $(".half_size_list").html("");
         $(".Quarter_size_list").html("");
         $(".img").html("");
           $.getJSON(siteurl+'sales/get_product_sale_quantity_for_daily_report?'+dateString,function(data){
                if(data.html)
                {
                  $(".ajax_content_inner").html(data.html);
                }
                  var img =$.each(data.product_photo ,function(data,success){
                     var product_img = '<center><img style="height:200px;max-width:150px; margin-top:20px;" alt="BRAND IMG" src="uploads/'+this.brand_img+'"/></center>';                         
                     $(".img").append(product_img);
                  });
            });
          }
    }
    $(document).ready(function() {
      var currentDate = new Date(); 
      $(".datepicker").datepicker({
      	format: 'yyyy-mm-dd'
      });
      $('#datepicker').datepicker('setDate', 'today');
    });
</script>

       </div>
			</div>
		</div>
	</div>
</div>
