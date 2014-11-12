var tbl1;
var comunas = new Object();
var ciudades = new Object();
var regiones = new Object();

var array_registers = new Array();

var request_url = 'dashboard';

var records;
var logistics;
$(document).ready(function(){
    
    /* ---------- Data Objects ---------- */
    $.get(request_url+'/getInfoCountries', function(data){
        var obj = $.parseJSON(data);
        comunas = obj.comuna;
        ciudades = obj.ciudades;
        regiones = obj.regiones;
    });     
    
    $.post(request_url+'/getExternalLogisticDataRecording', function(data){
        var records_ = $.parseJSON(data);
        if(records_.success){
            records = records_.data;
        }
        else{
           alert('Registros del usuario no cargados, favor contactarse con el administrador del sitio.')
        }
    });     
    
    
    /* ---------- Login Box Styles ---------- */
    if($(".login-box")) {
		$("#username").focus(function() {
			$(this).parent(".input-prepend").addClass("input-prepend-focus");
		});
		$("#username").focusout(function() {
			$(this).parent(".input-prepend").removeClass("input-prepend-focus");
		});
		$("#password").focus(function() {
			$(this).parent(".input-prepend").addClass("input-prepend-focus");
		});
		$("#password").focusout(function() {
			$(this).parent(".input-prepend").removeClass("input-prepend-focus");
		});
	
	}
					
	/* ---------- Add class .active to current link  ---------- */
	$('ul.main-menu li a').each(function(){
		if($($(this))[0].href==String(window.location))
			$(this).parent().addClass('active');
	});
			
	/* ---------- Acivate Functions ---------- */
	$("#overlay").delay(1250).fadeOut(500);
	template_functions();
	init_masonry();
//	sparkline_charts();
//	charts();
//	calendars();
//	growlLikeNotifications();
	widthFunctions();
//	circle_progess();
	
	
});

/* ---------- Masonry Gallery ---------- */

function init_masonry(){
	
	if($('.masonry-gallery')){  
	
    	var $container = $('.masonry-gallery');

	    var gutter = 6;
	    var min_width = 250;
	    $container.imagesLoaded( function(){
	        $container.masonry({
	            itemSelector : '.masonry-thumb',
	            gutterWidth: gutter,
	            isAnimated: true,
	              columnWidth: function( containerWidth ) {
	                var num_of_boxes = (containerWidth/min_width | 0);

	                var box_width = (((containerWidth - (num_of_boxes-1)*gutter)/num_of_boxes) | 0) ;

	                if (containerWidth < min_width) {
	                    box_width = containerWidth;
	                }

	                $('.masonry-thumb').width(box_width);

	                return box_width;
	              }
	        });
	    });
	
	}
}

/* ---------- Numbers Sepparator ---------- */

function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1.$2");
    return x;
}

/* ---------- Template Functions ---------- */		
		
function template_functions(){
	
	/* ---------- ToDo List Action Buttons ---------- */
	
	if($(".todo-list")) {
		
		$(".todo-remove").click(function(){

			$(this).parent().parent().fadeTo("slow", 0.00, function(){ //fade
				$(this).slideUp("slow", function() { //slide up
			    	$(this).remove(); //then remove from the DOM
			    });
			});


			return false;
		});
		
	}
	
	/* ---------- Skill Bars ---------- */
	
	if($(".skill-bar")){
		
		$(".meter > span").each(function() {
			$(this)
			.data("origWidth", $(this).width())
			.width(0)
			.animate({
				width: $(this).data("origWidth")
			}, 3000);
		});
		
	}
	
	/* ---------- Disable moving to top ---------- */
	$('a[href="#"][data-top!=true]').click(function(e){
		e.preventDefault();
	});
	
	/* ---------- Text editor ---------- */
	if($('.cleditor')) {
		
		$('.cleditor').cleditor();
		
	}

	/* ---------- Datapicker ---------- */
	if($('.datepicker')) {
		
		$('.datepicker').datepicker();
		
	}
	
	
	/* ---------- Notifications ---------- */
	$('.noty').click(function(e){
		e.preventDefault();
		var options = $.parseJSON($(this).attr('data-noty-options'));
		noty(options);
	});

	/* ---------- Uniform ---------- */
	$("input:checkbox, input:radio, input:file").not('[data-no-uniform="true"],#uniform-is-ajax').uniform();

	/* ---------- Choosen ---------- */
	$('[data-rel="chosen"],[rel="chosen"]').chosen();

	/* ---------- Tabs ---------- */
	$('#myTab a:first').tab('show');
	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

	/* ---------- Makes elements soratble, elements that sort need to have id attribute to save the result ---------- */
	$('.sortable').sortable({
		revert:true,
		cancel:'.btn,.box-content,.nav-header',
		update:function(event,ui){
			//line below gives the ids of elements, you can make ajax call here to save it to the database
			//console.log($(this).sortable('toArray'));
		}
	});

	/* ---------- Tooltip ---------- */
	$('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 400, hide: 200 }});

	/* ---------- Popover ---------- */
	$('[rel="popover"],[data-rel="popover"]').popover();

	/* ---------- File Manager ---------- */
	var elf = $('.file-manager').elfinder({
		url : 'misc/elfinder-connector/connector.php'  // connector URL (REQUIRED)
	}).elfinder('instance');

	/* ---------- Star Rating ---------- */
	$('.raty').raty({
		score : 4 //default stars
	});

	/* ---------- Uploadify ---------- */
	$('#file_upload').uploadify({
		'swf'      : 'misc/uploadify.swf',
		'uploader' : 'misc/uploadify.php'
		// Put your options here
	});

	/* ---------- Fullscreen ---------- */
	$('#toggle-fullscreen').button().click(function () {
		var button = $(this), root = document.documentElement;
		if (!button.hasClass('active')) {
			$('#thumbnails').addClass('modal-fullscreen');
			if (root.webkitRequestFullScreen) {
				root.webkitRequestFullScreen(
					window.Element.ALLOW_KEYBOARD_INPUT
				);
			} else if (root.mozRequestFullScreen) {
				root.mozRequestFullScreen();
			}
		} else {
			$('#thumbnails').removeClass('modal-fullscreen');
			(document.webkitCancelFullScreen ||
				document.mozCancelFullScreen ||
				$.noop).apply(document);
		}
	});

	/* ---------- Inner table content ---------- */
        
        logistic_select = '';
        $.get('Send_externlogistic/getLogistics', function(data){
            logistics = $.parseJSON(data);
            for(i = 0; logistics.length > i;i++){                
                logistic_select = logistic_select + '<option value="'+logistics[i].id+'">'+logistics[i].name+'</option>';
            }
        }); 
        
        $('#input_externlogistic').focus();
        $('#input_externlogistic').bind('change',function(e){
            e.preventDefault();
            ola = $(this).val();
            is = false;
            if(ola.length > 0){
                $.grep(records,function(data){
                    if(data.id === ola && typeof data.isSee === 'undefined'){
                        data.isSee = true;
                        input_ola_id = '<input type="hidden" value="'+ola+'" />';
                        $('#input_externlogistic_content > table > tbody').prepend('<tr><td><input type="checkbox" selected="selected" class="row_selected" /></td><td>'+ola+'</td><td>'+data.Franquiciado+'</td><td>'+data.Rut_Cliente+'</td><td>'+data.region_envio+'</td><td><select name="externlogistic_status dynamic" data-ola="'+ola+'">'+logistic_select+'</select></td>'+input_ola_id+'</tr>');
                        $('#input_externlogistic').val('');
                        $('#input_externlogistic').focus();      
                        $('#input_externlogistic_content').find('select:eq(0) > option').each(function(){
                            if(data.logistic_id === $(this).attr('value'))
                                $(this).attr('selected','selected');
                        });
                        
                        $('#input_externlogistic_content select:eq(0)').bind('change',function(e){
                            $(this).parent().append('<img class="preloader" src="../img/loader1.gif"/>');
                            $.post('Send_externlogistic/setLogistics',{sale_id:$(this).attr('data-ola'),value:$(this).val()}, function(data){
                                obj = $.parseJSON(data);
                                if(! obj.success){
                                    alert('Error: setDispatcher');
                                    $('img.preloader').remove();
                                }else{
                                    $('img.preloader').remove();
                                }
                            });             
                        });            
                        
                        is = true;
                    }
                    else{
                        $('#input_externlogistic').val('');
                        $('#input_externlogistic').focus();                         
                    }
                });    
                
                if(!is){
                    $('#input_externlogistic').next().html('<h3>Registro no existe o ya esta en la lista.</h3>').show(200,function(){
                        $(this).hide(3000,function(){
                            $(this).html('');
                            $('#input_externlogistic').focus();                              
                        });
                        $('#input_externlogistic').val('');
                    });
                }
            }
            else{
                $('#input_externlogistic').val('');
                $('#input_externlogistic').focus();                
            }
        });
        
        $('#selectall_chk').bind('change',function(){
            ref = $(this);
            if(ref.is(':checked')){
                $('#input_externlogistic_content > table > tbody').find('input[type=checkbox]').each(function(){
                   $(this).attr('checked', true); 
                });
            }else{
                $('#input_externlogistic_content > table > tbody').find('input[type=checkbox]').each(function(){
                   $(this).attr('checked', false); 
                });
            }
        });
        
        $('#change_status').bind('change',function(e){
            e.preventDefault();
            ref = $(this);
            $('#input_externlogistic_content > table > tbody').find('tr').each(function(){
                if($('input.row_selected',$(this)).is(':checked')){
                    //console.log('---------------->'+ref.val())
                    $('select',$(this)).val(ref.val());
                    $(this).parent().append('<img class="preloader" src="../img/loader1.gif"/>');
                    $.post('Send_externlogistic/setLogistics',{sale_id:$('select',$(this)).attr('data-ola'),value:ref.val()}, function(data){
                        obj = $.parseJSON(data);
                        if(! obj.success){
                            alert('Error: setLogistic');
                            $('img.preloader').remove();
                        }else{
                            $('img.preloader').remove();
                        }
                    });                     
                }
             });            
        });
        
	$('.btn-close').click(function(e){
		e.preventDefault();
		$(this).parent().parent().parent().fadeOut();
	});
	$('.btn-minimize').click(function(e){
		e.preventDefault();
		var $target = $(this).parent().parent().next('.box-content');
		if($target.is(':visible')) $('i',$(this)).removeClass('icon-chevron-up').addClass('icon-chevron-down');
		else 					   $('i',$(this)).removeClass('icon-chevron-down').addClass('icon-chevron-up');
		$target.slideToggle();
	});
	$('.btn-setting').click(function(e){
		e.preventDefault();
		$('#myModal').modal('show');
	});
	
	
	/* ---------- Progress  ---------- */

		$(".simpleProgress").progressbar({
			value: 89
		});

		$(".progressAnimate").progressbar({
			value: 1,
			create: function() {
				$(".progressAnimate .ui-progressbar-value").animate({"width":"100%"},{
					duration: 10000,
					step: function(now){
						$(".progressAnimateValue").html(parseInt(now)+"%");
					},
					easing: "linear"
				})
			}
		});

		$(".progressUploadAnimate").progressbar({
			value: 1,
			create: function() {
				$(".progressUploadAnimate .ui-progressbar-value").animate({"width":"100%"},{
					duration: 20000,
					easing: 'linear',
					step: function(now){
						$(".progressUploadAnimateValue").html(parseInt(now*40.96)+" Gb");
					},
					complete: function(){
						$(".progressUploadAnimate + .field_notice").html("<span class='must'>Upload Finished</span>");
					} 
				})
			}
		});
		
		if($(".taskProgress")) {
		
			$(".taskProgress").each(function(){
				
				var endValue = parseInt($(this).html());
												
				$(this).progressbar({
					value: endValue
				});
				
				$(this).parent().find(".percent").html(endValue + "%");
				
			});
		
		}
		
		if($(".progressBarValue")) {
		
			$(".progressBarValue").each(function(){
				
				var endValueHTML = $(this).find(".progressCustomValueVal").html();
				
				var endValue = parseInt(endValueHTML);
												
				$(this).find(".progressCustomValue").progressbar({
					
					value: 1,
					create: function() {
						$(this).find(".ui-progressbar-value").animate({"width": endValue + "%"},{
							duration: 5000,
							step: function(now){
																
								$(this).parent().parent().find(".progressCustomValueVal").html(parseInt(now)+"%");
							},
							easing: "linear"
						})
					}
				});
				
			});
		
		}
	
	
	/* ---------- Custom Slider ---------- */
		$(".sliderSimple").slider();

		$(".sliderMin").slider({
			range: "min",
			value: 180,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( ".sliderMinLabel" ).html( "$" + ui.value );
			}
		});

		$(".sliderMin-1").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( ".sliderMin1Label" ).html( "$" + ui.value );
			}
		});

		$(".sliderMin-2").slider({
			range: "min",
			value: 100,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( ".sliderMin2Label" ).html( "$" + ui.value );
			}
		});

		$(".sliderMin-3").slider({
			range: "min",
			value: 150,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( ".sliderMin3Label" ).html( "$" + ui.value );
			}
		});

		$(".sliderMin-4").slider({
			range: "min",
			value: 250,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( ".sliderMin4Label" ).html( "$" + ui.value );
			}
		});

		$(".sliderMin-5").slider({
			range: "min",
			value: 350,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( ".sliderLabel" ).html( "$" + ui.value );
			}
		});
		
		$(".sliderMin-6").slider({
			range: "min",
			value: 450,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( ".sliderLabel" ).html( "$" + ui.value );
			}
		});
		
		$(".sliderMin-7").slider({
			range: "min",
			value: 550,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( ".sliderLabel" ).html( "$" + ui.value );
			}
		});
		
		$(".sliderMin-8").slider({
			range: "min",
			value: 650,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( ".sliderLabel" ).html( "$" + ui.value );
			}
		});
		
		
		$(".sliderMax").slider({
			range: "max",
			value: 280,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( ".sliderMaxLabel" ).html( "$" + ui.value );
			}
		});

		$( ".sliderRange" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 192, 470 ],
			slide: function( event, ui ) {
				$( ".sliderRangeLabel" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});

		$( "#sliderVertical-1" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 60,
		});

		$( "#sliderVertical-2" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 40,
		});

		$( "#sliderVertical-3" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 30,
		});

		$( "#sliderVertical-4" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 15,
		});

		$( "#sliderVertical-5" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 40,
		});

		$( "#sliderVertical-6" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 80,
		});
		
		$( "#sliderVertical-7" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 60,
		});

		$( "#sliderVertical-8" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 40,
		});

		$( "#sliderVertical-9" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 30,
		});

		$( "#sliderVertical-10" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 15,
		});

		$( "#sliderVertical-11" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 40,
		});

		$( "#sliderVertical-12" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 80,
		});
			
}
 
/* ---------- Page width functions ---------- */

$(window).bind("resize", widthFunctions);

function widthFunctions( e ) {
    var winHeight = $(window).height();
    var winWidth = $(window).width();

	if (winHeight) {
		
		$("#content").css("min-height",winHeight);
		
	}
    
	if (winWidth < 980 && winWidth > 767) {
		
		if($(".main-menu-span").hasClass("span2")) {
			
			$(".main-menu-span").removeClass("span2");
			$(".main-menu-span").addClass("span1");
			
		}
		
		if($("#content").hasClass("span10")) {
			
			$("#content").removeClass("span10");
			$("#content").addClass("span11");
			
		}
		
		
		$("a").each(function(){
			
			if($(this).hasClass("quick-button-small span1")) {

				$(this).removeClass("quick-button-small span1");
				$(this).addClass("quick-button span2 changed");
			
			}
			
		});
		
		$(".circleStatsItem").each(function() {
			
			var getOnTablet = $(this).parent().attr('onTablet');
			var getOnDesktop = $(this).parent().attr('onDesktop');
			
			if (getOnTablet) {
			
				$(this).parent().removeClass(getOnDesktop);
				$(this).parent().addClass(getOnTablet);
			
			}
			  			
		});
		
		$(".box").each(function(){
			
			var getOnTablet = $(this).attr('onTablet');
			var getOnDesktop = $(this).attr('onDesktop');
			
			if (getOnTablet) {
			
				$(this).removeClass(getOnDesktop);
				$(this).addClass(getOnTablet);
			
			}
			  			
		});
							
	} else {
		
		if($(".main-menu-span").hasClass("span1")) {
			
			$(".main-menu-span").removeClass("span1");
			$(".main-menu-span").addClass("span2");
			
		}
		
		if($("#content").hasClass("span11")) {
			
			$("#content").removeClass("span11");
			$("#content").addClass("span10");
			
		}
		
		$("a").each(function(){
			
			if($(this).hasClass("quick-button span2 changed")) {

				$(this).removeClass("quick-button span2 changed");
				$(this).addClass("quick-button-small span1");
			
			}
			
		});
		
		$(".circleStatsItem").each(function() {
			
			var getOnTablet = $(this).parent().attr('onTablet');
			var getOnDesktop = $(this).parent().attr('onDesktop');
			
			if (getOnTablet) {
			
				$(this).parent().removeClass(getOnTablet);
				$(this).parent().addClass(getOnDesktop);
			
			}
			  			
		});
		
		$(".box").each(function(){
			
			var getOnTablet = $(this).attr('onTablet');
			var getOnDesktop = $(this).attr('onDesktop');
			
			if (getOnTablet) {
			
				$(this).removeClass(getOnTablet);
				$(this).addClass(getOnDesktop);
			
			}
			  			
		});
		
	}
} 

function removeDataTest() {
    // **** //
    tbl1.fnReloadAjax(tbl1.oSettings());    
}