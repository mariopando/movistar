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
	<link rel="stylesheet" href="<?php echo base_url('css/table-rules.css'); ?>"/> 
        
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
	
		
		
        <style>
            .input-content input {
               filter: alpha(opacity=0);
               opacity: 0;
               width: 100%;
               height: 100%;
            }            
        </style>		
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
						<a href="#">Home</a> <span class="divider">/</span> Status
					</li>
				</ul>
				<hr>
			</div>
			
			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-align-justify"></i><span class="break"></span>Modificar status</h2>
					</div>
					<div class="box-content" id="no-more-tables">
                                            <input type="number" id="input_dispatchmobile" placeholder="Ingresar"/>
                                            <div id="input_dispatchmobile_content">
                                                <table class="table table-striped">
                                                    <thead class="table-bordered">
                                                        <tr>
                                                            <th>OLA</th>
                                                            <th>Estado</th>
                                                            <th>Motivos de rechazo</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                                      
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>

					</div>
<!--                                        <div class="box-footer">
                                            <div class="span6">
                                                <input type="checkbox" id="selectall_chk" />Seleccionar todos
                                            </div>
                                            <div class="span5">
                                                Cambiar estado
                                                <select name="change_status" id="change_status">
                                                    <option selected="selected" value="1">Entregado</option>
                                                    <option value="1">Rechazado</option>
                                                </select>
                                            </div>                                            
                                        </div>-->
                                                                                
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
                <script src="<?php echo base_url('js/date.js'); ?>"></script>
                <script src="<?php echo base_url('js/dispatch_mobile.js'); ?>"></script>
                
		<!-- end: JavaScript-->
<script>
    $('#file-input').live('change',function(){
        var file = this.files[0];
        reader = new FileReader();
        
        ola = $(this).attr('data-ola');
        
        ref = $(this);
        reader.onload = function(event){
            var img = new Image();
            img.width = 300;
            img.src = event.target.result

            var images = JSON.parse(localStorage.getItem('images'))
//            window.localStorage.clear();
            if(images){ // If there is image localstorage object
                ref.parent().append('<img class="preloader" src="../img/loader1.gif"/>');
                $.ajax({ type: "POST", url: "dispatch_mobile/saveImage", data: {ola:ola, src: img.src, date: formatDate(new Date(),"yyyy-MM-d hh:mm:ss")}
                }).done(function( data ) {
                    obj = $.parseJSON(data);
                    if(! obj.success){
                        alert('Error: saveImage->'+obj.msg);
                        $('img.preloader').remove();
                    }else{
                        alert('Imagen correctamente guardada');
                        $('img.preloader').remove();
                    }
                }).error(function(){
                    images.date[images.date.length] = formatDate(new Date(),"yyyy-MM-d hh:mm:ss");
                    images.src[images.src.length] = img.src;
                    images.ola[images.ola.length] = ola;
                    localStorage['images'] = JSON.stringify(images);     
                    $('img.preloader').remove();
                    alert('Problemas subiendo la imagen al servidor, favor reintentar en la vista: Imagenes pendientes');
                });                                      
            }
            else{
                ref.parent().append('<img class="preloader" src="../img/loader1.gif"/>');
                $.ajax({ type: "POST", url: "dispatch_mobile/saveImage", data: {ola:ola, src: img.src, date: formatDate(new Date(),"yyyy-MM-d hh:mm:ss")}
                }).done(function( data ) {
                    obj = $.parseJSON(data);
                    if(! obj.success){
                        alert('Error: saveImage->'+obj.msg);
                        $('img.preloader').remove();
                    }else{
                        alert('Imagen correctamente guardada');
                        $('img.preloader').remove();
                    }
                }).error(function(){
                    var image = {
                        date: [formatDate(new Date(),"yyyy-MM-d hh:mm:ss")],
                        src: [img.src],
                        ola: [ola]
                        };

                    localStorage['images'] = JSON.stringify(image);   
                    alert('Problemas subiendo la imagen al servidor, favor reintentar en la vista: Imagenes pendientes');
                    $('img.preloader').remove();
                });     
            }
        };
        reader.readAsDataURL(file);                            
    });
   
</script>	
</body>
</html>
