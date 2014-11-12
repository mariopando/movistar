var tbl1;
var comunas = new Object();
var ciudades = new Object();
var regiones = new Object();

var array_registers = new Array();

var request_url = 'dashboard';
var records;
var status;
var geolocalization;

$(document).ready(function(){
    /* ---------- Data Objects ---------- */
    $.get(request_url+'/getInfoCountries', function(data){
        var obj = $.parseJSON(data);
        comunas = obj.comuna;
        ciudades = obj.ciudades;
        regiones = obj.regiones;
    });     
    
    $.post('dispatch_mobile/getStatusDataRecording', function(data){
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
	//sparkline_charts();
	//charts();
	//calendars();
	growlLikeNotifications();
	widthFunctions();
	//circle_progess();
	
	
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
	
	/* ---------- Disable moving to top ---------- */
	$('a[href="#"][data-top!=true]').click(function(e){
		e.preventDefault();
	});
	
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

        /* ---------- Geolocation ---------- */
        
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(savePosition, onError);
        } else {
          onError();
        }
        
        function savePosition(position){
//            console.log(position);
            geolocalization = position.coords.latitude + ',' + position.coords.longitude;
        }
        
        function onError(){
            
        };        
        /* ---------- Inner table content ---------- */
        
        dispatchmobile_select = '';
        $.get('dispatch_mobile/getStatusValues', function(data){
            dispatchs = $.parseJSON(data);
            for(i = 0; dispatchs.length > i;i++){                
                dispatchmobile_select = dispatchmobile_select + '<option value="'+dispatchs[i].id+'">'+dispatchs[i].value+'</option>';
            }
        }); 
        
        dispatchmobilerejected_select = '';
        $.get('dispatch_mobile/getStatusRejectedValues', function(data){
            dispatchs_r = $.parseJSON(data);
            for(i = 0; dispatchs_r.length > i;i++){                
                dispatchmobilerejected_select = dispatchmobilerejected_select + '<option value="'+dispatchs_r[i].id+'">'+dispatchs_r[i].value+'</option>';
            }
        }); 
        
        $('#input_dispatchmobile').focus();
        $('#input_dispatchmobile').bind('change',function(e){
            e.preventDefault();
            ola = $(this).val();
            is = false;
            if(ola.length > 0){
                $.grep(records,function(data){
                    if(data.id === ola && typeof data.isSee === 'undefined'){
                        data.isSee = true;
                        input_ola_id = '<input type="hidden" value="'+ola+'" />';
//                        $('#input_dispatchmobile_content > table > tbody').prepend('<tr data-ola="'+ola+'"><td><input type="checkbox" selected="selected" class="row_selected" /></td><td>'+ola+'</td><td><select name="dispatchmobile_status" class="dispatchmobile_status" data-ola="'+ola+'">'+dispatchmobile_select+'</select></td><td><select name="dispatchmobilerejected_status" class="dispatchmobilerejected_status" data-ola="'+ola+'" disabled="disabled">'+dispatchmobilerejected_select+'</select></td><td><input id="file-input" type="file" name="image" accept="image/*" capture="camera" class="btn btn-small" value="Tomar foto" /></td>'+input_ola_id+'</tr>');
                        $('#input_dispatchmobile_content > table > tbody').prepend('<tr data-ola="'+ola+'"><td data-title="OLA">'+ola+'</td><td data-title="Estado"><select name="dispatchmobile_status" class="dispatchmobile_status" data-ola="'+ola+'">'+dispatchmobile_select+'</select></td><td data-title="Motivo de rechazo"><select name="dispatchmobilerejected_status" class="dispatchmobilerejected_status" data-ola="'+ola+'" disabled="disabled">'+dispatchmobilerejected_select+'</select></td><td data-title="Agregar imagen"><div class="input-content btn btn-success btn-primary" type="button">Agregar imagen<input id="file-input" type="file" name="image" accept="image/*" capture="camera" class="" value="Tomar foto" data-ola="'+ola+'" /></div></td>'+input_ola_id+'</tr>');
                        $('#input_dispatchmobile').val('');
                        $('#input_dispatchmobile').focus();
                        
                        $('#input_dispatchmobile_content').find('select:eq(0) > option').each(function(){
                            if(data.status_id === $(this).attr('value'))
                                $(this).attr('selected','selected');
                        });
                        $('#input_dispatchmobile_content').find('select:eq(1) > option').each(function(){
                            if(data.rejected_id === $(this).attr('value'))
                                $(this).attr('selected','selected');
                        });
                               
                        $('#input_dispatchmobile_content select:eq(0)').bind('change',function(e){
                            $(this).parent().append('<img class="preloader" src="../img/loader1.gif"/>');
                            //Block next select fields
                            if(parseInt($(this).val()) === 1 || parseInt($(this).val()) === 0){
                                
                                $(this).parent().next().find('select.dispatchmobilerejected_status').attr('disabled','disabled');
                            }else{
                                $(this).parent().next().find('select.dispatchmobilerejected_status').removeAttr('disabled');
                            }
                            $.post('dispatch_mobile/setStatus',{sale_id:$(this).attr('data-ola'),status_value:$(this).val(), rejected_value:$(this).parent().next().find('select.dispatchmobilerejected_status').val(), geolocalization: geolocalization}, function(data){
                                obj = $.parseJSON(data);
                                if(! obj.success){
                                    alert('Error: setDispatcher');
                                    $('img.preloader').remove();
                                }else{
                                    $('img.preloader').remove();
                                }
                            });
                            
                        }); 
                        
                        $('#input_dispatchmobile_content select:eq(1)').bind('change',function(e){
                            $(this).parent().append('<img class="preloader" src="../img/loader1.gif"/>');
                            $.post('dispatch_mobile/setStatus',{ sale_id:$(this).attr('data-ola'),status_value:$(this).parent().prev().find('select.dispatchmobile_status').val(), rejected_value:$(this).val(), geolocalization: geolocalization}, function(data){
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
                        $('#input_dispatchmobile').val('');
                        $('#input_dispatchmobile').focus();                         
                    }
                });    
                
                if(!is){
//                    $('#input_assign').next().html('<h3>Registro no existe o ya esta en la lista.</h3>').show(200,function(){
//                        $(this).hide(3000,function(){
//                            $(this).html('');
//                            $('#input_assign').focus();                              
//                        });
//                        $('#input_assign').val('');
//                    });
                }
            }
            else{
                $('#input_dispatchmobile').val('');
                $('#input_dispatchmobile').focus();                
            }
        });
        
        $('#selectall_chk').bind('change',function(){
            ref = $(this);
            if(ref.is(':checked')){
                $('#input_dispatchmobile_content > table > tbody').find('input[type=checkbox]').each(function(){
                   $(this).attr('checked', true); 
                });
            }else{
                $('#input_dispatchmobile_content > table > tbody').find('input[type=checkbox]').each(function(){
                   $(this).attr('checked', false); 
                });
            }
        });
        
        $('#change_status').bind('change',function(e){
            e.preventDefault();
            ref = $(this);
            $('#input_dispatchmobile_content > table > tbody').find('tr').each(function(){
                if($('input.row_selected',$(this)).is(':checked')){
                    $('select[name=dispatchmobile_status]',$(this)).val(ref.val());
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
              
function growlLikeNotifications() {
	
	$('#add-sticky').click(function(){

		var unique_id = $.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'This is a sticky notice!',
			// (string | mandatory) the text inside the notification
			text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
			// (string | optional) the image to display on the left
			image: 'img/avatar.jpg',
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: true,
			// (int | optional) the time you want it to be alive for before fading out
			time: '',
			// (string | optional) the class name you want to apply to that specific message
			class_name: 'my-sticky-class'
		});

		// You can have it return a unique id, this can be used to manually remove it later using
		/* ----------
		setTimeout(function(){

			$.gritter.remove(unique_id, {
				fade: true,
				speed: 'slow'
			});

		}, 6000)
		*/

		return false;

	});

	$('#add-regular').click(function(){

		$.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'This is a regular notice!',
			// (string | mandatory) the text inside the notification
			text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
			// (string | optional) the image to display on the left
			image: 'img/avatar.jpg',
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: false,
			// (int | optional) the time you want it to be alive for before fading out
			time: ''
		});

		return false;

	});

    $('#add-max').click(function(){

        $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'This is a notice with a max of 3 on screen at one time!',
            // (string | mandatory) the text inside the notification
            text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
            // (string | optional) the image to display on the left
            image: 'img/avatar.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (function) before the gritter notice is opened
            before_open: function(){
                if($('.gritter-item-wrapper').length == 3)
                {
                    // Returning false prevents a new gritter from opening
                    return false;
                }
            }
        });

        return false;

    });

	$('#add-without-image').click(function(){

		$.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'This is a notice without an image!',
			// (string | mandatory) the text inside the notification
			text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.'
		});

		return false;
	});

    $('#add-gritter-light').click(function(){

        $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'This is a light notification',
            // (string | mandatory) the text inside the notification
            text: 'Just add a "gritter-light" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
            class_name: 'gritter-light'
        });

        return false;
    });

	$('#add-with-callbacks').click(function(){

		$.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'This is a notice with callbacks!',
			// (string | mandatory) the text inside the notification
			text: 'The callback is...',
			// (function | optional) function called before it opens
			before_open: function(){
				alert('I am called before it opens');
			},
			// (function | optional) function called after it opens
			after_open: function(e){
				alert("I am called after it opens: \nI am passed the jQuery object for the created Gritter element...\n" + e);
			},
			// (function | optional) function called before it closes
			before_close: function(e, manual_close){
                var manually = (manual_close) ? 'The "X" was clicked to close me!' : '';
				alert("I am called before it closes: I am passed the jQuery object for the Gritter element... \n" + manually);
			},
			// (function | optional) function called after it closes
			after_close: function(e, manual_close){
                var manually = (manual_close) ? 'The "X" was clicked to close me!' : '';
				alert('I am called after it closes. ' + manually);
			}
		});

		return false;
	});

	$('#add-sticky-with-callbacks').click(function(){

		$.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'This is a sticky notice with callbacks!',
			// (string | mandatory) the text inside the notification
			text: 'Sticky sticky notice.. sticky sticky notice...',
			// Stickeh!
			sticky: true,
			// (function | optional) function called before it opens
			before_open: function(){
				alert('I am a sticky called before it opens');
			},
			// (function | optional) function called after it opens
			after_open: function(e){
				alert("I am a sticky called after it opens: \nI am passed the jQuery object for the created Gritter element...\n" + e);
			},
			// (function | optional) function called before it closes
			before_close: function(e){
				alert("I am a sticky called before it closes: I am passed the jQuery object for the Gritter element... \n" + e);
			},
			// (function | optional) function called after it closes
			after_close: function(){
				alert('I am a sticky called after it closes');
			}
		});

		return false;

	});

	$("#remove-all").click(function(){

		$.gritter.removeAll();
		return false;

	});

	$("#remove-all-with-callbacks").click(function(){

		$.gritter.removeAll({
			before_close: function(e){
				alert("I am called before all notifications are closed.  I am passed the jQuery object containing all  of Gritter notifications.\n" + e);
			},
			after_close: function(){
				alert('I am called after everything has been closed.');
			}
		});
		return false;

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