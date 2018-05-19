<div class="container">
  <h2>All Registerd Users</h2><br/><br/>
       <div data-original-title="Ajouter une nouvelle langue" class="btn-group tooltips">
<a class="btn btn-primary add_link" href="<?php echo base_url('users/add'); ?>">Add New User<i class="fa fa-plus"></i></a>
</div>       
  <table class="table">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>User Name</th>
        <th>Email Address</th>
        <th>Registration Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php 

      foreach($users as $key => $value) { ?>
      <tr>

      <td><?php echo $value->first_name; ?></td>
      <td><?php echo $value->last_name; ?></td>
      <td><?php echo $value->username; ?></td>
      <td><?php echo $value->email; ?></td>
      <td><?php echo $value->add_date; ?></td>
      <td><?php echo $value->status; ?></td>

      <td>
      <a data-container="body" data-placement="top" data-original-title="" class="btn btn-primary tooltips" href="<?php echo base_url('users/edit/'.$value->id); ?>"><i class="fa fa-pencil"></i>Edit</a>

      <a data-container="body" data-placement="top" data-original-title="" onclick="" class="btn btn-danger tooltips" data-url="" data-id="1" data-toggle="modal" href="<?php echo base_url('users/delete/'.$value->id); ?>"><i class="fa fa-remove"></i>Delete</a>
      </td>


      </tr>
      <?php 
      }     ?>
        
      
    </tbody>
  </table>
</div>