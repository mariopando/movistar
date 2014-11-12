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
						<a href="#">Home</a><span class="divider">/</span> Envio a log&iacute;stica externa
					</li>
				</ul>
				<hr>
			</div>
			
			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
                                            <h2><i class="icon-align-justify"></i><span class="break"></span>Envio a log&iacute;stica externa</h2>
					</div>
					<div class="box-content">
                                            <input type="text" id="input_externlogistic" placeholder="Ingresar"/><p class="text-warning red hide"></p>
                                            <div id="input_externlogistic_content">
                                                <table class="table table-striped">
                                                    <thead class="table-bordered">
                                                        <tr>
                                                            <th></th>
                                                            <th>OLA</th>
                                                            <th>Franquiciado</th>
                                                            <th>Rut del cliente</th>
                                                            <th>Regi&oacute;n de destino</th>
                                                            <th>Asignar a</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                                      
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>

					</div>
                                        <div class="box-footer">
                                            <div class="span6">
                                                <input type="checkbox" id="selectall_chk" />Seleccionar todos
                                            </div>
                                            <div class="span5">
                                                Cambiar logistica externa <select name="change_status" id="change_status">
                                                <?php 
                                                if(isset($logistics)):
                                                    foreach ($logistics as $key => $logistic) {
                                                ?>
                                                    <option value="<?php echo $logistic->id; ?>"><?php echo $logistic->name; ?></option>
                                                <?php
                                                    }
                                                endif;
                                                ?>
                                                </select>
                                                
                                            </div>                                            
                                        </div>
                                                                                
				</div><!--/span-->
                        
			
			</div><!--/row-->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
<!--		<div class="modal hide fade" id="myModal">
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
		</div>-->
		
		<div class="clearfix"></div>
		
                <?php $this->load->view('footer'); ?>
				
	</div><!--/.fluid-container-->

	<!-- start: JavaScript-->

                <script src="<?php echo base_url('js/jquery-1.7.2.min.js'); ?>"></script>              
                <script src="<?php echo base_url('js/jquery-ui-1.8.21.custom.min.js'); ?>"></script>
                <script src="<?php echo base_url('js/bootstrap.js'); ?>"></script>
                <script src="<?php echo base_url('js/jquery.cookie.js'); ?>"></script>	
                <script src="<?php echo base_url('js/fullcalendar.min.js'); ?>"></script>	
                <script src="<?php echo base_url('js/jquery.dataTables.min.js'); ?>"></script>                
                <script src="<?php echo base_url('js/jquery.fn.reloadAjax.js'); ?>"></script>
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
                <script src="<?php echo base_url('js/send_externlogistic.js'); ?>"></script>
		<!-- end: JavaScript-->
</body>
</html>
