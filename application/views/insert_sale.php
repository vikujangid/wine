<html>
  <head>
	    <title>Insert Product </title>
	           <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
             <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
             <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
             <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
             <script>
                  $(document).ready(function() {
                  $("#datepicker").datepicker();
                                                 });
             </script>

  </head>
<body>

         <div class="row">
               <div class="alert alert-info"><center><h1>Add sale Quantity<h1></center></div>
         </div>
           <?php echo form_open('product_sale'); ?>
        <div class="row">
                    <div class="col-sm-3" >
                              <select class="form-control" id="shop_id">
                              <?php foreach ($product as $key) {?>
                              <option class="form-control" value="<?php  echo $key->id;?>"><?php echo $key->shop_name;?></option>
                              <?php }?>
                              </select><br/> 
                                    <div class="price_list"></div>
                        </div>
                    <div class="col-sm-6" >
                              <input type="text"  name="date" placeholder="Enter date"id="datepicker" class="form-control"/>
                              <?php echo form_error('date', '<div class="error" style="color:red;">', '</div>'); ?>
                              <div class="size_list"></div>
                              <br/><center><input type="submit" value="submit" name="submit" class="btn btn-info"/>&nbsp;&nbsp;<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-danger']);?></center>
                        </div>
                    <div class="col-sm-3">
	                            <select class="form-control"  id="brand_id">
                              <?php foreach ($brand as $key) {?>
                              <option class="form-control" value="<?php  echo $key->id;?>"><?php echo $key->brand_name;?></option>
                              <?php }?>
                              </select><br/> 
                        </div>
        </div>
             <?php echo form_close(); ?>

      <script>
      $(document).ready(function(){
            var siteurl = '<?php echo site_url() ?>';
            
            //var brand_id = ("#brand_id").val();
            var shop_id = ("#shop_id").val();
            var datepicker = ("#datepicker").val();
            if(shop_id )
              {
                
                 
                  
                      }
                  })
                }
          
              });
      </script>
</body>
</html>