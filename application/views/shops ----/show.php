

<div class="container">
  <h2>All Registerd Shops</h2><br/><br/>
       <div data-original-title="Ajouter une nouvelle langue" class="btn-group tooltips">
<a class="btn btn-primary add_link" href="<?php echo base_url('shops/add'); ?>">Add New Shop<i class="fa fa-plus"></i></a>
</div>       
  <table class="table">
    <thead>
      <tr>
        <th>Shop Name</th>
        <th>Owner Name</th>
      
        <th>Address</th>
        <th>City</th>
        <th>Zip Code</th>
        <th>Primary Contact Number</th>
        <th>Owner Mobile Number</th>
        <th>Email Address</th>
        <th>Registration Date</th>
        <th>Status</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
      <?php 

      foreach($shops as $key => $value) { ?>
      <tr>

      <td><?php echo $value->shop_name; ?></td>
      <td><?php echo $value->shop_owner_name; ?></td>
      <td><?php echo $value->shop_address; ?></td>
      <td><?php echo $value->shop_address_city; ?></td>
      <td><?php echo $value->shop_address_zip_code; ?></td>
      <td><?php echo $value->shop_primary_contact_number; ?></td>
      <td><?php echo $value->shop_owner_mobile_number; ?></td>
      <td><?php echo $value->shop_email_address; ?></td>
      <td><?php echo $value->add_date; ?></td>
      <td><?php echo $value->status; ?></td>

      <td>
      <a data-container="body" data-placement="top" data-original-title="" class="btn btn-warning tooltips" href="<?php echo base_url('shop_brands/show/'.$value->id); ?>"><i class="fa fa-pencil"></i>Aviailable brands</a>

      <a data-container="body" data-placement="top" data-original-title="" class="btn btn-primary tooltips" href="<?php echo base_url('shops/edit/'.$value->id); ?>"><i class="fa fa-pencil"></i>Edit</a>

      <a data-container="body" data-placement="top" data-original-title=""  class="btn btn-danger tooltips" data-url="" data-id="1" data-toggle="modal" href="<?php echo base_url('shops/delete/'.$value->id); ?>"><i class="fa fa-remove"></i>Delete</a>
      </td>


      </tr>
      <?php 
      }     ?>
        
      
    </tbody>
  </table>
</div>

  
</div>
 