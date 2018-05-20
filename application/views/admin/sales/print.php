<!DOCTYPE html>

<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8"/>
<title>Wine </title>
<link rel="icon" href="<?php echo base_url('assets/front'); ?>/img/favicon.ico" sizes="192x192" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<?php 
$this->load->view('admin/includes/common'); ?>
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo $this->config->item('admin_assets'); ?>global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->config->item('admin_assets'); ?>global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>

<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?php echo $this->config->item('admin_assets'); ?>admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?php echo $this->config->item('admin_assets'); ?>global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->config->item('admin_assets'); ?>global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->config->item('admin_assets'); ?>admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->config->item('admin_assets'); ?>admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo $this->config->item('admin_assets'); ?>admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo base_url('assets/front'); ?>/img/favicon.ico" type="image/x-icon"> 
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body>
<!-- BEGIN HEADER -->

<div class="page-container">
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="">
      



<div class="row">
	<div class="col-md-12">
		<div class="portlet box grey-cascade">
			<div class="portlet-title">
				<div class="caption"><i class="fa"></i>Sales Report</div>
			 </div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div id="alert_area"></div>
					<div class="row">
						<div class="col-md-12"></div>
				  </div>
				<br>
				<div class="ajax_content">
          
            <div class="row">
            <div class="col-sm-12">    
            <table class="table table-hover" border="1">
             <tbody>
            <th style="padding-bottom:40px;"><center>BRAND NAME</center></th>
            <th>
            <center>
                <table  style="width:100%; text-align:center;">
                    <tr>Initial<hr></tr>
                    <tr>
                        <td>Full</td>
                        <td>Half</td>
                        <td>Quarter</td>
                    </tr>
                </table>
            </center>
            </th>
             <th>
            <center>
                <table  style="width:100%; text-align:center;">
                    <tr>CREDIT <hr></tr>
                    <tr>
                        <td>Full</td>
                        <td>Half</td>
                        <td>Quarter</td>
                    </tr>
                </table>
            </center>
            </th>
            <th>
            <center>
                <table  style="width:100%; text-align:center;">
                    <tr>SHIPPED <hr></tr>
                    <tr>
                        <td>Full</td>
                        <td>Half</td>
                        <td>Quarter</td>
                    </tr>
                </table>
            </center>
            </th>
            <th>
            <center>
                <table  style="width:100%; text-align:center;">
                    <tr>SOLD <hr></tr>
                    <tr>
                        <td>Full</td>
                        <td>Half</td>
                        <td>Quarter</td>
                    </tr>
                </table>
            </center>
            </th>
            <th>
            <center>
                <table  style="width:100%; text-align:center;">
                    <tr>RATES <hr></tr>
                    <tr>
                        <td>Full</td>
                        <td>Half</td>
                        <td>Quarter</td>
                    </tr>
                </table>
            </center>
            </th>
            <th>
            <center>
                Total Price
            </center>
            </th>
            
            
                    <?php $daily_total = 0; ?>
            
                  
                    <?php foreach ($product_sale as $key => $value) { ?>
                      <tr>
                        <td style="width:18%;"><?php echo @$key;?></td>
                        <?php foreach ($value['loop'] as $keys => $sale_value) {  ?>
                              <td>
                                <table border="1"  class="" style="width:100%; text-align:center;">
                                    <td style="width:6.8%;"><?php echo @$sale_value['Full']?@$sale_value['Full']: 0 ;?></td>
                                    <td style="width:6.8%;"><?php echo @$sale_value['Half']?@$sale_value['Half']: 0 ;?></td>
                                    <td style="width:6.8%;"><?php echo @$sale_value['Quarter']?@$sale_value['Quarter']: 0 ;?></td>
                                </table>
                              </td>
                        <?php  } ?>
                        <td style="width:18%;"><?php $daily_total = $daily_total + $value['total_price'];  echo $value['total_price']; ?></td>
                          
                      </tr>
                    <?php } ?>

                    <tr><td>Extra Expenses</td><td colspan="5" width=""><?php echo $total_expenses; ?></td><td><strong><?php echo $daily_total + $total_expenses; ?></strong></td></tr>
                  
             
           
            
            </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>


       </div>
			</div>
		</div>
	</div>
</div>
