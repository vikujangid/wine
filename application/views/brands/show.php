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
  <div class="w3-container ">
    <h1>All Brands</h1>
  </div>
</div>


 <br/><br/>
       <div data-original-title="Ajouter une nouvelle langue" class="btn-group tooltips">
<a class="btn btn-primary add_link" href="<?php echo base_url('brands/add'); ?>">Add <i class="fa fa-plus"></i></a>
</div>       
  <table class="table">
    <tbody>
      <?php 

      foreach($all_brands as $key => $value) { ?>
      <tr>

      <td><?php echo $value->brand_name; ?></td>
      <td><?php echo $value->size_type; ?></td>
      <td><?php echo $value->size_in_ml; ?></td>
      <td><?php echo $value->price; ?></td>
      <td><?php echo $value->add_date; ?></td>
      <td><?php echo $value->status; ?></td>

      <td>
      <a data-container="body" data-placement="top" data-original-title="" class="btn btn-primary tooltips" href="<?php echo base_url('brands/edit/'.$value->id); ?>"><i class="fa fa-pencil"></i>Edit</a>

      <a data-container="body" data-placement="top" data-original-title="" onclick="" class="btn btn-danger tooltips" data-url="" data-id="1" data-toggle="modal" href="<?php echo base_url('brands/delete/'.$value->id); ?>"><i class="fa fa-remove"></i>Delete</a>
      </td>


      </tr>
      <?php 
      }     ?>
        
      
    </tbody>
  </table>
</div>
