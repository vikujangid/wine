
<script type="text/javascript">
$(function(){
  setTimeout(function(){
    $(".brand_list:first").trigger('click');
    
  },500)
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
              <div class="form-group">
                <label><input type="text" onchange="getsize()" name="date"  placeholder="Enter date" value="<?php echo $date; ?>" id="datepicker"  class="form-control datepicker"/></label>
                      
                <div class="list-group ">
                  <?php foreach ($brands as $key => $value) {?>
                    <a data-value="<?php  echo $value->id;?>" onclick="selectBrandOnClick(this)" class="list-group-item brand_list"><?php echo $value->brand_name;?></a>
                  <?php } ?>
                </div>
              </div>
            </div>
            
            <div class="col-md-7">
              
              <div class="row" style="padding-bottom: 20px;">
                <div class="col-md-12">
                  <div class="ajax_content_inner">
                    
                  </div>
                  <div class="ajax_content_direct_solds">
                    
                  </div>
                  <div class="ajax_content_expenses">
                    
                  </div>

                  
                </div>
              
              
              </div>
            </div>
            <div class="col-md-3">
              <div class="img"></div>
              <div class="ajax_total_chart"></div>
            </div>
      </div>
      <input type="hidden" class="form-control" name="brand_id" id= "brand_id" onchange="getsize()">
      <?php echo form_close(); ?>
    </div>
  </div>

<div class="modal fade" id="add_expense_modal" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Modal Title</h4>
      </div>
      <div class="modal-body">
         Modal body goes here
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
        <button type="button" class="btn blue">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
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
    setTimeout(function(){

      get_expenses();
      get_direct_solds();
    },0)
  }
  function open_expense_add_form(shop_id, date)
  {
       $.getJSON(siteurl+'sales/add_expense/'+shop_id, {shop_id:shop_id, date:date}, function(data) {
          if(data.html) {
            $("#add_expense_modal .modal-content").html(data.html);
            $("#add_expense_modal").modal('show');
          }
       })
  }
  function open_direct_sold_add_form()
  {
       $.getJSON(siteurl+'sales/add_direct_sale/', function(data) {
          if(data.html) {
            $("#add_expense_modal .modal-content").html(data.html);
            $("#add_expense_modal").modal('show');
          }
       })
  }
  function get_expenses()
  {
      var datepicker = $('#datepicker').val();

      $.getJSON(siteurl+'sales/get_expenses', {date:datepicker}, function(data) {
          if(data.html) {
              $(".ajax_content_expenses").html(data.html);
          }
      });
  }
  function get_direct_solds()
  {
      $.getJSON(siteurl+'sales/get_direct_solds', function(data) {
          if(data.html) {
              $(".ajax_content_direct_solds").html(data.html);
          }
      });
  }
  function callback_direct_sale_added(data)
  {
      get_expenses();
      get_direct_solds();
      $("#add_expense_modal").modal('hide');
  }
  function callback_sale_added(data)
  {
      getsize();
      get_expenses();
      get_direct_solds();
  }
  function delete_expense($this)
  {
    var con = confirm("Are you sure want to delete it?");
    if(!con)
      return false;
    var url = $($this).attr('data-url');
    $.getJSON(url, function(data){
      get_expenses();
    })
  }
  function delete_direct_sale($this)
  {
    var con = confirm("Are you sure want to delete it?");
    if(!con)
      return false;
    var url = $($this).attr('data-url');
    $.getJSON(url, function(data){
      get_direct_solds();
    })
  }
  function callback_expense_added()
  {
    $("#add_expense_modal").modal('hide');
    get_expenses();
  }
    function getsize()
    {
      var brand_id = $('#brand_id').val();
      var datepicker = $('#datepicker').val();
      var dateString = 'brand_id='+brand_id+'&date='+datepicker;
      if(brand_id &&  datepicker )
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
                if(data.html2)
                {
                  $(".ajax_total_chart").html(data.html2);
                }
                  var img =$.each(data.product_photo ,function(data,success){
                     var product_img = '<center><img style="height:200px;max-width:150px; margin-top:20px;" alt="BRAND IMG" src="uploads/'+this.brand_img+'"/></center>';                         
                     $(".img").append(product_img);
                  });

                if(data.daily_total)
                {
                  var daily_total = data.daily_total;
                  $(".date_value").html(daily_total.date_text);
                  $(".total_sale_value").html(daily_total.total_sale);
                  $(".total_expenses_value").html(daily_total.total_expenses);
                  $(".total_sale_wine_value").html(daily_total.total_sale_wine);
                  $(".total_sale_beer_value").html(daily_total.total_sale_beer);
                  $(".total_sale_wine_beer_value").html(daily_total.total_sale_wine_beer);
                  $(".total_sale_desi_value").html(daily_total.total_sale_desi);
                  $(".quantity_sold_quarter_value").html(daily_total.quantity_sold_quarter);
                  $(".total_amount_value").html(daily_total.total_amount);
                  
                }
            });
          }
          get_expenses();
          get_direct_solds();
    }
    $(document).ready(function() {
      var currentDate = new Date(); 
      $(".datepicker").datepicker({
      	format: 'yyyy-mm-dd'
      });
      //$('#datepicker').datepicker('setDate', 'today');
    });
</script>
<script type="text/javascript">
  $(function(){
    $(document).on("keypress",'body',function(e){
      
    //$(document).keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 40) {
          e.preventDefault();
            $(".brand_list.active").next().trigger('click');
            return false;
        } else if (code == 38) {
          e.preventDefault();
            $(".brand_list.active").prev().trigger('click');
            return false;
        }
        
    });
  })
</script>

       </div>
			</div>
		</div>
	</div>
</div>

<!-- bootom fixed bar --->
<div class="bottom_fix_bar">
  <table class="table"><tbody class="bottom_summary">
    <th><span class="value date_value"> -- </span></th><th>English:<span class="value total_sale_wine_value"> -- </span></th><th>Beer:<span class="value total_sale_beer_value"> -- </span></th><th>Eng + Beer:<span class="total_sale_wine_beer_value value"> -- </span></th><th>Desi:<span class="total_sale_desi_value value">0</span></th><th>Sale:<span class="value total_sale_value"> -- </span></th><th>Expenses:<span class="value total_expenses_value"> -- </span></th><th><span class="value total total_amount_value"> -- </span></th>
  </tbody></table>
</div>
<style type="text/css">
  .bottom_fix_bar{
    background-color: gray;
    height: 35px;
    width: 100%;
    position: fixed;
    bottom: 0;
    right: 0;
    opacity: 1;
  }
  .bottom_fix_bar tbody{
    color: white;
    font-size: 13px;
    text-transform: uppercase;
  }
  .bottom_fix_bar .value{
    color: yellow;
    font-size: 15px;
    line-height: -moz-block-height;
    margin-left: 8px;
  }
  .bottom_fix_bar .value.total{
    color: springgreen;
    font-size: 22px;
    line-height: -moz-block-height;
  }
</style>