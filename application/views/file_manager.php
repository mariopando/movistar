<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Perfectum Dashboard - Perfect Bootstrap Admin Template</title>
	<meta name="description" content="Perfectum Dashboard Bootstrap Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
        <link id="bootstrap-style" rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>"/>  
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-responsive.css'); ?>"/> 
        <link id="base-style" rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>"/> 
        <link id="base-style-responsive" rel="stylesheet" href="<?php echo base_url('css/style-responsive.css'); ?>"/> 
	
	<!--[if lt IE 7 ]>
        <link id="ie-style" rel="stylesheet" href="<?php echo base_url('css/style-ie.css'); ?>"/>
	<![endif]-->
	<!--[if IE 8 ]>
        <link id="ie-style" rel="stylesheet" href="<?php echo base_url('css/style-ie.css'); ?>"/>
	<![endif]-->
	<!--[if IE 9 ]>
	<![endif]-->
	
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
	<?php $this->load->view('header'); ?>
	
		<div class="container-fluid">
		<div class="row-fluid">
				
			<?php $this->load->view('sidebar'); ?>
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- start: Content -->
			
			<div>
				<hr>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">File Manager</a>
					</li>
				</ul>
				<hr>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i><span class="break"></span>File Manager</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<i class="icon-info-sign"></i> As its a demo, you currently have read-only permission, in your server you may do everything like, upload or delete. It will work on a server only.
						</div>
						<div class="file-manager"></div>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

		
					<hr>
			<!-- end: Content -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>
		
		<div class="clearfix"></div>
		
		<footer>
			<p>
				<span style="text-align:left;float:left">&copy; <a href="http://clabs.co" target="_blank">creativeLabs</a> 2012</span>
				<span style="text-align:right;float:right">Powered by: <a href="#">Perfectum Dashboard</a></span>
			</p>

		</footer>
				
	</div><!--/.fluid-container-->

	<!-- start: JavaScript-->
                
                <script src="<?php echo base_url('js/jquery-1.7.2.min.js'); ?>"></script>
                
                <script src="<?php echo base_url('js/jquery-ui-1.8.21.custom.min.js'); ?>"></script>
                
                <script src="<?php echo base_url('js/bootstrap.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.cookie.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/fullcalendar.min.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.dataTables.min.js'); ?>"></script>

                <script src="<?php echo base_url('js/excanvas.js'); ?>"></script>
                
                <script src="<?php echo base_url('js/jquery.flot.min.js'); ?>"></script>
                
                <script src="<?php echo base_url('js/jquery.flot.pie.min.js'); ?>"></script>
                
                <script src="<?php echo base_url('js/jquery.flot.stack.js'); ?>"></script>
                
                <script src="<?php echo base_url('js/jquery.flot.resize.min.js'); ?>"></script>
                
                <script src="<?php echo base_url('js/jquery.chosen.min.js'); ?>"></script>
                
		<script src="<?php echo base_url('js/jquery.uniform.min.js'); ?>"></script>
		
                <script src="<?php echo base_url('js/jquery.cleditor.min.js'); ?>"></script>
                
                <script src="<?php echo base_url('js/jquery.noty.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.elfinder.min.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.raty.min.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.iphone.toggle.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.uploadify-3.1.min.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.gritter.min.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.imagesloaded.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.masonry.min.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.knob.js'); ?>"></script>
	
                <script src="<?php echo base_url('js/jquery.sparkline.min.js'); ?>"></script>

                <script src="<?php echo base_url('js/custom.js'); ?>"></script>                
		<!-- end: JavaScript-->
	
</body>
</html>
