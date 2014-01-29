(function($){ $.fn.slide = function (o)
{
	o = $.extend(
	{
		mask: '.mask',
		list: '.list',
		items: '.item',
		btns: '.btn', // must have prev or next class too
		btn_prev_title : 'Previous',
		btn_next_title : 'Next',
		
		auto: false,
		sens: -1,
		speed: 400,
		pause: 3000,

		beforeSlide: function(){},
		afterSlide: function(){}
	}, o);

	$(this).each(function(){
		var slider = $(this);
		var mask = $(o.mask, slider);//.css('overflow','hidden');
		var list = $(o.list, slider);
		var items = $(o.items, slider);
		var btns = $(o.btns, slider);

		var mesure = null;
		var sens = o.sens;
		var slideAuto = false;

		var listMarginDir = '';
		var listMargin = 0;

		var getNumeric = function(nb){ nb = parseInt(nb); if (!isNaN(parseFloat(nb)) && isFinite(nb)){ return nb; } else { return 0; } }

		if ((items.eq(0).css('float') != '') && (items.eq(0).css('float') != 'none')){
			listMarginDir = 'marginLeft';
			mesure = items.eq(0).outerWidth(true);
			list.width(items.length * mesure);
		}
		else {
			listMarginDir = 'marginTop';
			mesure = items.eq(0).outerHeight(true);
			list.css({
				'height': 'auto',
				'overflow': 'hidden',
				'zoom': '1'
			});
		}

		if ( ( listMarginDir == 'marginLeft' && list.width() > mask.width() ) || ( listMarginDir == 'marginTop' && list.height() > mask.height() ) ){

			btns.show();

			btns.unselectable();

			var slided = function(){
				o.afterSlide(slider, sens);
				sens = o.sens;
				list.removeClass('sliding');
			};

			var sliding = function(){
				if (!list.hasClass('sliding') && !list.hasClass('pause')){
					list.addClass('sliding');

					var listMargin = getNumeric(list.css(listMarginDir));

					if ((listMargin == 0) && (sens == 1)){
						list.css(listMarginDir, -mesure).prepend($(o.items + ':last', list));
					}
					if ((listMargin == -mesure) && (sens == -1)){
						list.css(listMarginDir, 0).append($(o.items + ':first', list));
					}

					o.beforeSlide(slider, sens);

					var listMarginNext = getNumeric(list.css(listMarginDir)) + (mesure * sens);

					if (listMarginDir == 'marginLeft'){
						list.stop().animate({'marginLeft': listMarginNext}, o.speed, function(){ slided(); });
					}
					else {
						list.stop().animate({'marginTop': listMarginNext}, o.speed, function(){ slided(); });
					}

				}
			};

			if (o.auto){
				slideAuto = setInterval(sliding, o.pause);
				mask.mouseenter(function(){ clearInterval(slideAuto); }).mouseleave(function(){ slideAuto = setInterval(sliding, o.pause); });
			}

			btns.mousedown(function(){
				if (!list.hasClass('sliding')){

					if ( $(this).hasClass('prev') ){ sens = 1; }
					else { sens = -1; }

					if (o.auto){
						clearInterval(slideAuto);
						slideAuto = setInterval(sliding, o.pause);
					}

					sliding();
				}
			});
		}
		else { btns.hide(); }
	});
}; })(jQuery);