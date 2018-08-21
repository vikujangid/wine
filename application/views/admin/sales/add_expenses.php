
<div class="row">
  <div class="col-md-12">
   <div class="portlet box grey-cascade">
    <div class="portlet-title">
     <div class="caption">Add Expense</div>
     </div>
       <div class="portlet-body">
        <div class="table-toolbar">
         
          <form class="ajax_form" action="<?php echo current_url(); ?>" method="post" >
            
              <div class="form-group">
               
                <div class="col-sm-3" >
                  <label for="title">Title</label>
                </div>
                  <div class="col-sm-9" >
                    <input type="text" name="title"  placeholder="Enter title" value="<?php echo $title; ?>"  class="form-control "/>
                  </div>
                </div>
              <div class="form-group">
                  <div class="col-sm-3" >
                    <label for="amount">Amount</label>
                  </div>
                  <div class="col-sm-9" >
                      <input type="text" name="amount"  placeholder="Enter Amount" value="<?php echo $amount; ?>"  class="form-control "/>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-3" >
                    <label for="amount">Type</label>
                  </div>
                  <div class="col-sm-9" >
                      <select name="transaction_type" class="form-control" id="transaction_type">
                          <option value="Debit" <?php if($transaction_type == "Debit") { ?> selected <?php } ?> >Debit</option>
                          <option value="Credit" <?php if($transaction_type == "Credit") { ?> selected <?php } ?>>Credit</option>
                      </select>
                  </div>
              </div>
                <div class="form-group">
                <div class="col-sm-9" >
                        <input type="hidden" name="date" value="<?php echo $date; ?>">
                        <input type="hidden" name="shop_id" value="<?php echo $shop_id; ?>">
                       <center><input type="submit" class="btn btn-primary" value="Submit"/></center>   
                 </div>
                 
              </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

