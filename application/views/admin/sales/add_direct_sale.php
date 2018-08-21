
<div class="row">
  <div class="col-md-12">
   <div class="portlet box grey-cascade">
    <div class="portlet-title">
     <div class="caption">Add Direct Sale (Desi)</div>
     </div>
       <div class="portlet-body">
        <div class="table-toolbar">
         
          <form class="ajax_form" action="<?php echo current_url(); ?>" method="post" >
            
              <div class="form-group">
               
                <div class="col-sm-3" >
                  <label for="title">Buyer</label>
                </div>
                  <div class="col-sm-9" >
                    <input type="text" name="buyer_name"  placeholder="Buyer Name" value="<?php echo $buyer_name; ?>"  class="form-control "/>
                  </div>
                </div>
              <div class="form-group">
                  <div class="col-sm-3" >
                    <label for="amount">Quantity</label>
                  </div>
                  <div class="col-sm-9" >
                      <input type="text" name="quantity"  placeholder="Enter Quantity" value="<?php echo $quantity; ?>"  class="form-control "/>
                      
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-3" >
                    <label for="amount">Price per Quantity</label>
                  </div>
                  <div class="col-sm-9" >
                      <input type="text" name="price_per_quantity"  placeholder="Enter Price of Quantity" value="<?php echo $price_per_quantity; ?>"  class="form-control "/>
                  </div>
              </div>
                <div class="form-group">
                <div class="col-sm-9" >
                        
                       <center><input type="submit" class="btn btn-primary" value="Submit"/></center>   
                 </div>
                 
              </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

