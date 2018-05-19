

<!--BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start <?php echo isset($left_menu) && $left_menu == 'Sales'?'active':''; ?> ">
					<a href="<?php echo site_url('sales'); ?>">
					<i class="icon-home"></i>
					<span class="title">Home</span>
					</a>
				</li>
				<li class="start <?php echo isset($left_menu) && $left_menu == 'Brands'?'active':''; ?>">
					<a href="<?php echo site_url('brands'); ?>">
					<i class="icon-home"></i>
					<span class="title">Brands</span>
					</a>
				</li>
				<li class="start <?php echo isset($left_menu) && $left_menu == 'Expenses'?'active':''; ?> ">
					<a href="<?php echo site_url('expenses'); ?>">
					<i class="icon-home"></i>
					<span class="title">Expenses</span>
					</a>
				</li>
				<li class="start <?php echo isset($left_menu) && $left_menu == 'Shops'?'active':''; ?>">
					<a href="<?php echo site_url('shops'); ?>">
					<i class="icon-home"></i>
					<span class="title">Shops</span>
					</a>
				</li>
				<li class="start <?php echo isset($left_menu) && $left_menu == 'sales table'?'active':''; ?>">
					<a href="<?php echo site_url('sales/table'); ?>">
					<i class="icon-home"></i>
					<span class="title">Table</span>
					</a>
				</li>
				<li class="start ">
					<a href="<?php echo site_url('register/logout'); ?>">
					<i class="icon-home"></i>
					<span class="title">Logout</span>
					</a>
				</li>
				
				
				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->