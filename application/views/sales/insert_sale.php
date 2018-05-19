<html>
  <head>
	    <title>Insert Product </title>
	           <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
             <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
             <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
             <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
             <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

             <script>
                  $(document).ready(function() {
                    var currentDate = new Date(); 
                  $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'} );
                  $('#datepicker').datepicker('setDate', 'today');
                                                 });
             </script>

  </head>
<body>
  <div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-left" style="display:none" id="mySidebar" style="width:70px">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="sales" class="w3-bar-item w3-button" ><i class="fa fa-home"></i></a>
  <a href="<?php echo base_url('shops/show');?>" class="w3-bar-item w3-button">shops</a>
  <a href="<?php echo base_url('brands');?>" class="w3-bar-item w3-button">brands</a>
  <a href="<?php echo base_url('register/logout');?>" class="w3-bar-item w3-button">logout</a>
</div>
<div zclass="w3-main" id="main">

<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container w3-animate-fading">
    <center><h1>Add sale Quantity</h1></center>
  </div>
</div>
      <div class="row" style="margin-top:50px;">
               
           <?php echo form_open('sales'); ?>
        <div class="row">
           <div class="col-sm-1" ></div>
                    <div class="col-sm-3" >
                     
                              <select class="form-control" name="shop_id" onchange="getsize()" id="shop_id">
                              <?php foreach ($product as $key) {?>

                              <option class="form-control" value="<?php  echo $key->id;?>"><?php echo $key->shop_name;?></option>
                              <?php }?>
                              </select><br/> 
                                    <div class="img"></div>
                        </div>
                    <div class="col-sm-4 "  style="background-color: #2fab93 ; border-radius:3%; ">
                      <br/>
                              <input type="text" onchange="getsize()" name="date"  placeholder="Enter date"id="datepicker"  class="form-control"/>
                              <?php echo form_error('date', '<div class="error" style="color:red;">', '</div>'); ?>
                              <div class="size_list"></div>
                              <br/><center><input type="submit" value="submit" name="submit" class="btn btn-primary"/>&nbsp;&nbsp;<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-danger']);?></center>
                        <br/></div>
                    
                    <div class="col-md-3 col-sm-3">
                      <div class="list-group ">
                        <?php foreach ($brand as $key) {?>
                        <a data-value="<?php  echo $key->id;?>" onclick="selectBrandOnClick(this)" class="list-group-item "><?php echo $key->brand_name;?></a>
                        <?php } ?>
                      </div>
                    </div>
        </div>
          <input type="hidden" class="form-control" name="brand_id" id= "brand_id" onchange="getsize()">
             <?php echo form_close(); ?>
           </div>
           <div class="col-sm-1" ></div>
         </div>

      <script>
      function selectBrandOnClick($this)
      {
        var brand_id = $($this).attr('data-value');
        $($this).siblings().removeClass('active');
        $($this).addClass('active');

        $("#brand_id").val(brand_id);
        getsize();
      }
            var siteurl = '<?php echo site_url() ?>';

            function getsize()
            { 
              var brand_id = $('#brand_id').val();
              var shop_id = $('#shop_id').val();
              var datepicker = $('#datepicker').val();
              var dateString = 'brand_id='+brand_id+'&date='+datepicker+'&shop_id='+shop_id;
              if(brand_id && shop_id &&  datepicker )
                {
                   $(".size_list").html("");
                   $(".img").html("");
                   $.getJSON(siteurl+'sales/get_brand_sizes?'+dateString,function(data,success){
                      $.each(data.sizes,function(){ 
                              var quantity=(this.quantity=="0" || this.quantity==undefined)?'':this.quantity;
                              var html = '<div class="form-group"><label >'+this.size_type+':</label><input type="text" class="form-control" name="size['+this.size_type+']" value="'+quantity+'"></div>';                        
                          $(".size_list").append(html);

                        });

                        var img =$.each(data.product_photo ,function(data,success){
                         var product_img = '<center><img style="height:200px;width:200px; margin-top:20px;" src="uploads/'+this.brand_img+'"/></center>';                         
                         $(".img").append(product_img);
                     });

                    });

                }
              }
      </script>
     
</body>
</html>