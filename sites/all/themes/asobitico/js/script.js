(function( $ ){
	$(document).ready(function(){

		if($('.accordion').length > 0){
			$('.accordion').accordion({
				event: "click",
		        active: false,
		        collapsible: true,
		        autoHeight: false
			});
		}

		var flexs = $('.flexslider');
		if(flexs.length > 0){
			$('.flexslider').flexslider({
			    animation: "fade",
			    animationLoop: true,
			    pauseOnHover: true,
			    controlsContainer: ".container-nav",
			    directionNav: true,
				controlNav: false
		  });
		}


		var menuLateral = $('#menu-lateral');
		if(menuLateral.length > 0){
			$('#menu-lateral a[href^="http://'+location.hostname+'/' + location.pathname.split("/")[1] + '"]').addClass('active');
		}

		$('a.label-idiom').on('click', function(){
			console.log('test');
			$("#lang-dropdown-select-language").trigger('click');
		});

		/* Script efecto scroll a las anclas */
		$('a[href^="#"]').on('click',function (e) {
			e.preventDefault();
			var target = this.hash,
			$target = $(target);
		
			$('html, body').stop().animate({
				'scrollTop': $target.offset().top
			}, 900, 'swing', function () {
				window.location.hash = target;
			});
		});

		$('.menu-anclas li a').on('click', function(){
			$('.menu-anclas li a').removeClass("activ");
			$(this).addClass("activ");
		});

		$('.pin.clic').live('click', function(){
			$('.pin').addClass('clic').find('.popup').hide();
			var divpopup = $(this).find('.popup');
			//if(!divpopup.hasClass('act')){
				$(this).removeClass('clic').find('.popup').addClass('act').show();
			//}
		});
		$('.cerrar-popup').live('click', function(){
			$('.pin').addClass('clic').find('.popup').removeClass('act').hide();
		});

		var id_listado = "#block-views-colegios-block-listado-colegios";

		//var view_mapa = "#views-exposed-form-colegios-block-pin-mapa";
		$(id_listado + ' #edit-field-colegio-tid').live('change', function(){
			cambiar_clase($(this));
			//$(view_mapa + ' #edit-submit-colegios').trigger('click');
		});

		$('#edit-field-colegio-tid').live('change', function(){
			cambiar_clase($(this));
			//$(view_mapa + ' #edit-submit-colegios').trigger('click');
		});

		$('#edit-field-colegio-tid--2').live('change', function(){
			cambiar_clase($(this));
			//$(view_mapa + ' #edit-submit-colegios').trigger('click');
		});

		$('#quicktabs-mapa ul li a').addClass('tab-azul');
		$('#quicktabs-mapa').attr('data-view-comunidad', 4);

		/*var view_listado = "#views-exposed-form-colegios-block-listado-colegios";
		var selector_colegio = view_listado + ' #edit-field-colegio-tid';
		var selector_colegio2 = view_listado + ' #edit-field-colegio-tid--2';

		var boton_colegio = view_listado + ' #edit-submit-colegios';
		var boton_colegio2 = view_listado + ' #edit-submit-colegios--2';*/

		/*$(selector_colegio).live('change', function(){
			cambiar_clase($(this), view_mapa);
			$(boton_colegio).trigger('click');
		});

		$(selector_colegio2).live('change', function(){
			cambiar_clase($(this), view_listado);
			$(boton_colegio2).trigger('click');
		});*/
	});

	$( document ).ajaxComplete(function() {
	  	verificar_estado_mapa();
	});

	$('#quicktabs-mapa ul li a').click(function(){
		var height_qicktab = '40px';
		if($(this).attr("id") == 'quicktabs-tab-mapa-1'){
			height_qicktab = '50px';
		}
		console.log(height_qicktab);
		$('#quicktabs-mapa .item-list').css("height",height_qicktab);
	  	//verificar_estado_mapa();
	});

	function cambiar_clase(object){
		var valor_select_pin = $(object).val();
		var class_tab = 'tab-azul';
		var class_to_remove = 'tab-rojo';
		if(valor_select_pin == 5){
			class_to_remove = 'tab-azul';
			class_tab = 'tab-rojo';
		}

		$('#quicktabs-mapa').attr('data-view-comunidad', valor_select_pin);

		$('#quicktabs-mapa ul li a').removeClass(class_to_remove);
		$('#quicktabs-mapa ul li a').addClass(class_tab);
	}

	function verificar_estado_mapa(){
		  var valor = $('#quicktabs-mapa').attr('data-view-comunidad');
		  var id_listado = "#block-views-colegios-block-listado-colegios";

		  $(".view-id-colegios.view-display-id-block_listado_colegios h3").removeClass("hidden");
		  if(valor == 4){
		  	$(".titulo-colegios-proceso-acreditacion").addClass('hidden');
		  } else {
		  	$(".titulo-colegios-asociados").addClass('hidden');
		  }

		  if ($(id_listado + ' #edit-field-colegio-tid').val() != valor){
			  $(id_listado + ' #edit-field-colegio-tid option').each(function(){
			  	$(this).removeAttr('selected');
			  });
				$(id_listado + ' #edit-field-colegio-tid option[value="'+ valor +'"]').attr('selected','selected');
				$(id_listado + ' #edit-field-colegio-tid').trigger('change');
		  }

		  if ($('#edit-field-colegio-tid--2').val() != valor){
			  $('#edit-field-colegio-tid--2 option').each(function(){
			  	$(this).removeAttr('selected');
			  });
				$('#edit-field-colegio-tid--2 option[value="'+ valor +'"]').attr('selected','selected');
				$('#edit-field-colegio-tid--2').trigger('change');
		  }

		if ($('#edit-field-colegio-tid').val() != valor){
		   $('#edit-field-colegio-tid option').each(function(){
		  	$(this).removeAttr('selected');
		  });
			$('#edit-field-colegio-tid option[value="'+ valor +'"]').attr('selected','selected');
			$('#edit-field-colegio-tid').trigger('change');

		}
	}

})(jQuery);