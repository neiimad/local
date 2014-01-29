/*----------------------------------
	ADDCLASSOFFSETTOP
----------------------------------*/

(function($){ $.fn.addClassOffsetTop = function (o)
{
	o = $.extend(
	{
		itemsParent: 'body',
		after: function(){}
	}, o);

	var itemsParent = $(o.itemsParent);
	var items = $(this, itemsParent);
	var offsetTop = null;

	items.each(function(){
		var _item = $(this);
		var _itemRemoveOffsetTopClass = function(){
			var _itemClasses = _item.attr('class').split(' ');
			for (i=0; i<_itemClasses.length; i++){
				if (/offsetTop/.test(_itemClasses[i])){
					_item.removeClass(_itemClasses[i]);
				}
			}
		};
		if (_item.css('display') != 'none')
		{
			if (offsetTop == null){ offsetTop = _item.offset().top; }
			else { if (_item.offset().top != offsetTop){ offsetTop = _item.offset().top; } }
			_itemRemoveOffsetTopClass();
			_item.addClass('offsetTop' + offsetTop);
			o.after($('.offsetTop' + offsetTop), itemsParent);
		}
		else {
			_itemRemoveOffsetTopClass();
		}
	});

}; })(jQuery);

/*----------------------------------
	ANCHOR
----------------------------------*/

(function($){ $.fn.anchor = function(){
	var anchor = $(this);

	anchor.click(function(){
		var anchorHref = anchor.attr('href');
		if (typeof anchorHref !== 'undefined' && anchorHref !== false){

			if (anchorHref == '#'){ return false; }
			else if (!anchor.attr('target') || anchor.attr('target') != '_blank'){
				if (anchorHref
						.replace('.gif', '')
						.replace('.png', '')
						.replace('.jpg', '')
					!= anchorHref){

					$(document).layer({
						content: '<img class="zoom" />',
						before: function(_layer){

							var anchorItems = anchor.parents('.items').eq(0);
							if (anchorItems.length > 0 && anchorItems.hasClass('gallery')){

								var anchorItem = anchor.parents('.item').eq(0);
								var anchorPrev = $('.img > .anchor', anchorItem.prevAll('.item:not(.hidden):first'));
								var anchorNext = $('.img > .anchor', anchorItem.nextAll('.item:not(.hidden):first'));

								_layer.append('<a class="link btn btn2 prev" style="display: none;"><span class="wrap"><span class="icon"></span></span></a>');
								_layer.append('<a class="link btn btn2 next" style="display: none;"><span class="wrap"><span class="icon"></span></span></a>');
								var _layerPrev = $('> .prev', _layer);
								var _layerNext = $('> .next', _layer);
								if (anchorPrev.length > 0){ _layerPrev.show(); }
								if (anchorNext.length > 0){ _layerNext.show(); }

								var _anchorMAJ = function(_anchor){
									$('#canvasLoader').show();

									$('.front-inner', _layer).html('<img class="zoom" src="' + _anchor.attr('href') + '" />');

									var _img = $('.zoom', _layer);
									_img.imgMaxSize({
										after: function(_img){
											_img.zoom(450);
											$('#canvasLoader').hide();
										}
									});

									anchorItem = _anchor.parents('.item').eq(0);
									anchorPrev = $('.img > .anchor', anchorItem.prevAll('.item:not(.hidden):first'));
									anchorNext = $('.img > .anchor', anchorItem.nextAll('.item:not(.hidden):first'));
									if (anchorPrev.length < 1){ _layerPrev.hide(); } else { _layerPrev.show(); }
									if (anchorNext.length < 1){ _layerNext.hide(); } else { _layerNext.show(); }
								};

								_layerPrev.click(function(){ _anchorMAJ(anchorPrev); });
								_layerNext.click(function(){ _anchorMAJ(anchorNext); });
							}

						},
						after: function(_layer){

							var _img = $('.zoom', _layer);
							_img.imgMaxSize({
								after: function(_layerImg){
									_img.zoom(450);
									$('#canvasLoader').hide();
								}
							});

							_img.attr('src', anchorHref);
						}
					});

					return false;
				}
				else if (anchor.hasClass('link_load')){

					$(document).layer();

					$.ajax({
						type: 'GET',
						url: anchorHref,
						data: '',
						success: function(bloc){
							$(document).layer({content: bloc});
						}
					});

					return false;
				}
			}
		}
	});

}; })(jQuery);

/*----------------------------------
	COORDS
----------------------------------*/

var curX = 0, curY = 0, scrollX = 0, scrollY = 0;
$(document).ready(function(){
	$(document).mousemove(function(e){
		curX = e.clientX;
		curY = e.clientY;
	});
	$(window).scroll(function(){
		scrollX = $(this).scrollLeft();
		scrollY = $(this).scrollTop();
	});
});

/*----------------------------------
	COOKIES
----------------------------------*/

(function($) {
	$.cookie = function(key, value, options) {
		if (arguments.length > 1 && (!/Object/.test(Object.prototype.toString.call(value)) || value === null || value === undefined)) {
			options = $.extend({}, options);
			if (value === null || value === undefined) { options.expires = -1; }
			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setDate(t.getDate() + days);
			}
			value = String(value);
			return (document.cookie = [
				encodeURIComponent(key), '=', options.raw ? value : encodeURIComponent(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}
		options = value || {};
		var decode = options.raw ? function(s) { return s; } : decodeURIComponent;
		var pairs = document.cookie.split('; ');
		for (var i = 0, pair; pair = pairs[i] && pairs[i].split('='); i++) {
			if (decode(pair[0]) === key) return decode(pair[1] || '');
			// IE saves cookies with empty string as "c; ", e.g. without "=" as opposed to EOMB, thus pair[1] may be undefined
		}
		return null;
	};
})(jQuery);

/*----------------------------------
	EQUALHEIGHTS
----------------------------------*/

(function($){ $.fn.equalHeights = function (){
	var heightMin = 0;
	$(this).each(function(){
		$(this).each(function(){
			$(this).css({'height' : 'auto'});
			if ($(this).height() > heightMin){
				heightMin = $(this).height();
			}
		});
	});
	$(this).height(heightMin);
	return(heightMin);
}; })(jQuery);

/*----------------------------------
	FORM_PREVIEW
----------------------------------*/

(function($){ $.fn.form_preview = function(o){
	o = $.extend({
		previewFields: '.field',
		previewFieldsRef: 'preview_',
		Keyblur: function(){}
	}, o);

	$(this).each(function(){
		var previewBloc = $(this);
		var previewFieldsShown = 0;

		//console.log('passe');

		$(o.previewFields, previewBloc).each(function(){
			var fieldPreview = $(this);
			var fieldToPreview = $('#' + fieldPreview.attr('id').replace(o.previewFieldsRef,''));

			//console.log(fieldToPreview);

			if (fieldToPreview.length > 0){

				var fieldMaj = function(){
					var _str = '';

					// input text
					if (fieldToPreview.attr('type') == 'text'){
						_str = fieldToPreview.val();
					}

					// select
					else if (fieldToPreview.get(0).tagName == 'SELECT' && fieldToPreview.val() != ''){
						_str = fieldToPreview.find(':selected').text();
					}

					// HTML text
					else {
						//console.log('test');
						_str = fieldToPreview.text();
					}

					fieldPreview.html(maj(_str));

					var ok = false;
					$(o.previewFields, previewBloc).each(function(){
						if ($(this).text() != '') ok = true;
					});
					if (ok){ $('.content', previewBloc).addClass('visible'); }
					else   { $('.content', previewBloc).removeClass('visible'); }

				}; fieldMaj();

				// input text
				fieldToPreview.bind('change, keyup', function(){
					fieldMaj();
					o.Keyblur();
				});

				// select
				fieldToPreview.blur(function(){
					fieldMaj();
					o.Keyblur();
				});

				previewFieldsShown++;
			}
		});

		$('.print', previewBloc).click(function(){
			var tplString = '';
			tplString  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
			tplString += '<html xmlns="http://www.w3.org/1999/xhtml">';
			tplString += '<head>';
			tplString += '<title>Impression</title>';
			tplString += '<link href="/src/view/css/default.css" rel="stylesheet" type="text/css" />';
			tplString += '</head>';
			tplString += '<body class="body_print">';
			tplString += '<table style="position: absolute; top: 0; left: 0;" border="0" width="100%" height="100%">';
			tplString += '<tr>';
			tplString += '<td valign="middle" align="center" width="100%" height="100%">';
			tplString += 'HEREISTHECONTENT';
			tplString += '</td>';
			tplString += '</tr>';
			tplString += '<!--<tr><td valign=bottom align="center"><a href="javascript:self.close();">FERMER</a></td></tr>-->';
			tplString += '</table>';
			tplString += '</body>';
			tplString += '</html>';
			//tplString = tplString.replace(/BANDEAU_URL/g,document.getElementById("logo").src);

			var styles = '';
			styles += '<style type="text/css">';
			styles += '.form_preview .print { display: none; }';
			styles += '</style>';

			var html = '<div class="'+previewBloc.attr('class')+'">'+previewBloc.html()+'</div>';

			var _width = previewBloc.width()+18;
			var _height = previewBloc.height();
			var _top = $(window).height()/2-previewBloc.outerHeight()/2;
			var _left = $(window).width()/2-previewBloc.outerWidth()/2;

			var msgWindow = window.open("","displayWindow","width="+_width+", height="+_height+", top="+_top+", left="+_left+", scrollbars=no, status=no, menubar=no");

			msgWindow.document.writeln(tplString.replace(/HEREISTHECONTENT/g, html+styles));
			msgWindow.document.close();
			msgWindow.print();
		});

		if (previewFieldsShown > 0){ previewBloc.show(); }

	});
}; })(jQuery);

/*----------------------------------
	GETCHILDNODES
----------------------------------*/

(function($){ $.fn.getChildNodes = function(){
	var nodes = '';
	$(this).each(function(){
		for (var i = 0; i < this.childNodes.length; i++){
			nodes = nodes + this.childNodes[i].nodeValue;
		}
	});
	return nodes;
}; })(jQuery);

/*----------------------------------
	GETNUMBER
----------------------------------*/

function getNumber(nb){
	nb = parseInt(nb);
	if (!isNaN(parseFloat(nb)) && isFinite(nb)){ return nb; }
	else { return 0; }
}

/*----------------------------------
	IMGLOAD
----------------------------------*/

(function($) { $.fn.imgLoad = function (o)
{
	o = $.extend({ duration: 500 }, o);

	$(this).each(function(){
		var _list = $(this);
		$('img', _list).each(function(){
			var _img = $(this);
			_list.addClass('imgLoad');
			_img.css('visibility', 'hidden')
				.load(function(){
					if (o.delay > 0){
						_img.animate({opacity: 0}, 10, function(){
							_list.removeClass('imgLoad');
							_img.css('visibility', 'visible').animate({opacity: 1}, o.duration);
						});
					}
					else { _img.css('visibility', 'visible'); }
				})
			;
		});
	});
}; })(jQuery);

/*----------------------------------
	IMGMAXSIZE
----------------------------------*/

(function($) { $.fn.imgMaxSize = function (o)
{
	o = $.extend({ parent: '', after: function(){} }, o);

	$(this).each(function(){
		var _img = $(this);
		var _parent = '';
		if (o.parent == ''){ _parent = _img.parent(); }
		else { _parent = $(o.parent).eq(0); }

		_img.css({'position':'absolute','top':'0','left':'-10000px'});
		_img.load(function(){
			var _width = _img.width();
			var _height = _img.height();

			_img.height('auto');

			if (_img.height() > _parent.height()) {
				_img.height(_parent.height());
				if (_img.width() > _parent.width()) {
					_img.height('auto');
					_img.width(_parent.width());
				}
			}
			if (_img.width() > _parent.width()) {
				_img.width(_parent.width());
				if (_img.height() > _parent.height()) {
					_img.width('auto');
					_img.height(_parent.height());
				}
			}
			_img.css('position','static');

			o.after(_img);
		});

	});
}; })(jQuery);

/*----------------------------------
	LAYER
----------------------------------*/

var layerHide = function(){};

(function($) { $.fn.layer = function (o)
{
	o = $.extend({
		layerHTML: '<div id="layer" class="layer"><div id="canvasloader-container" class="bg"></div><table class="front"><tr><td class="front-inner"></td></tr></table><span class="link btn close"><span class="wrap"><span class="icon"></span><span class="libelle">FERMER</span></span></span></div>',
		layerTimeout: 10,
		layerDelay: 250,
		content: '',
		to: 'body',
		before: function(){},
		after: function(){},
		afterHide: function(){}
	}, o);

	var _layer = $('#layer');

	var _layerFront = $('> .front td.front-inner', _layer).eq(0);
	if (_layerFront.length > 0){
		if (_layerFront.html() != ''){
			_layerFront.html('');
		}
	}
	else {
		$(o.to).append(o.layerHTML);
		_layer = $('#layer').unselectable().animate({'opacity': 0}, 10);
		_layerFront = $('td.front-inner', _layer).eq(0);

								// OPTIONAL : heartcode-canvasloader-min.js
								var cl = new CanvasLoader("canvasloader-container");

								// default is '#000000'
								// cl.setColor('');
								
								cl.setShape('spiral'); // default is 'oval'
								cl.setDiameter(120); // default is 40
								cl.setDensity(80); // default is 40
								cl.setRange(0.3); // default is 1.3
								cl.setSpeed(1); // default is 2
								cl.show(); // Hidden by default
								// This bit is only for positioning - not necessary
								var loaderObj = document.getElementById("canvasLoader");
								loaderObj.style.position = "absolute";
								loaderObj.style["top"] = "50%";
								loaderObj.style["left"] = "50%";
								loaderObj.style["margin-top"] = cl.getDiameter() * -0.5 + "px";
								loaderObj.style["margin-left"] = cl.getDiameter() * -0.5 + "px";
	}

	o.before(_layer);

	var layerTimeout = null;
	layerHide = function(){
		clearTimeout(layerTimeout);
		_layer.stop().animate({'opacity': 0}, o.layerDelay, function(){
			o.afterHide();
			_layer.hide().remove();
		});
	}

	_layer.bind('click', function(){ layerHide(); });

	var layerAnimate = function(){
		$('#canvasLoader').show();

		if (o.content != ''){ _layerFront.html('').append(o.content); }

		$('.bloc', _layer)
			.mouseenter(function(){ _layer.unbind(); })
			.mouseleave(function(){ _layer.click(function(){ layerHide(); }); })
		;

		_layer.stop().show().animate({opacity: 1}, o.layerDelay, function(){
			o.after(_layer);
		});
	};

	layerTimeout = setTimeout(layerAnimate, o.layerTimeout);

	$('> .prev, > .next', _layer)
		.mouseenter(function(){ _layer.unbind(); })
		.mouseleave(function(){ _layer.click(function(){ layerHide(); }); })
	;

}; })(jQuery);

/*----------------------------------
	MAJ
----------------------------------*/

function maj(str){
	var minus = "aàâäbcçdeéèêëfghiîïjklmnoôöpqrstuùûvwxyz";
	var majus = "AAAABCCDEEEEEFGHIIIJKLMNOOOPQRSTUUUVWXYZ";
	var str_maj = "";
	for (var i = 0 ; i < str.length ; i++)
	{
		var car = str.substr(i, 1);
		str_maj += (minus.indexOf(car) != -1) ? majus.substr(minus.indexOf(car), 1) : car;
	}
	return (str_maj);
}

/*----------------------------------
	MENU
----------------------------------*/

$(document).ready(function(){
	$('.menu li:has(span.sel)').each(function(){
		$('span.wrap', this).eq(0).addClass('active');
	})
});

/*----------------------------------
	PAGECORNER
----------------------------------*/

$(window).load(function(){
	var pageCorner = $('#pageCorner');
	if (pageCorner.length > 0){
		var pageCornerContent = $('#pageCornerContent');
		var pageCornerWidthMin = pageCorner.width();
		var pageCornerWidthMax = pageCornerContent.width();
		var pageCornerHeightMin = pageCorner.height();
		var pageCornerHeightMax = pageCornerContent.height();
		pageCorner.show().hover(
			function(){ pageCorner.stop().animate({width: pageCornerWidthMax, height: pageCornerHeightMax}, 200); },
			function(){ pageCorner.stop().animate({width: pageCornerWidthMin, height: pageCornerHeightMin}, 200); }
		);
	}
});

/*----------------------------------
	RANDOMIZE
----------------------------------*/

(function($){ $.fn.randomChildren = function (o)
{
	o = $.extend(
	{
		items: '> *',
		after: function(){}
	}, o);

	var _this = $(this);
	var _elts = $(o.items, _this);
	var _length = _elts.length;

	_this.append('<div class="random"></div>');
	var _random = $('.random', _this).eq(0);

	if (_length > 0){
		for (i=0; i < _length; i++){
			_elts = $(o.items, _this).not('.random');
			_random.append(_elts.eq(Math.ceil(_elts.length * Math.random())-1));
		}
	}

	o.after($('> *', _random));

}; })(jQuery);

/*----------------------------------
	SCROLLTO
----------------------------------*/

var scrollToId = function(to){
	if (to.length > 0){
		$('html, body').animate({scrollTop: to.offset().top});
		return to.attr('id');
	}
};

$(document).ready(function(){

	scrollToId($('#' + window.location.href.split('#')[1]));

	$('h2 a').click(function(){
		if (scrollToId($('#' + $(this).attr('href').split('#')[1]))){
			return false;
		}
	});
	$('h3 a').click(function(){
		if (scrollToId($('#' + $(this).attr('href').split('#')[1]))){
			return false;
		}
	});

});

/*----------------------------------
	TABS
----------------------------------*/

(function($){ $.fn.tabs = function (o)
{
	o = $.extend(
	{
		tabs: '',
		items: '',
		tabEvent: 'click',
		selIndex: 0,						// 1.1 : permit to activate a tab/item by its index at init (or not if false)
		desactivation: false,				// 1.1 : permit to desactivate at n+1 event, when passed to true
		auto: 0,							// 1.2 : permit to switch automatically specifying a delay
		itemEvent: false,					// 1.3 : permit to give the actions to the items
		tracker: false,						// 1.3 : permit to stock click counts
		before: function(){},
		after: function(){}
	}, o);

	var wrap = null; if ($(this).length > 0) { wrap = $(this); } else { wrap = $('body'); }

	$(wrap).each(function(){
		var wrapCurrent = $(this);
		var tabs = $(o.tabs, wrapCurrent);
		var items = $(o.items, wrapCurrent);

		tabs.mouseenter(function(){ $(this).addClass('hover'); }).mouseleave(function(){ $(this).removeClass('hover'); });
		items.mouseenter(function(){ $(this).addClass('hover'); }).mouseleave(function(){ $(this).removeClass('hover'); });

		var desactivation = o.desactivation;

		if (o.tracker){
			$('>a', tabs).attr('rel', '0');
		}

		var selIndex = o.selIndex;

		// 1.4 : selIndex change if url contains target id
		var urlId = window.location.href.split('#')[1];
		if ($('#' + urlId).length > 0){
			items.each(function(){
				var _item = $(this);
				if (_item.attr('id') == urlId){
					selIndex = items.index(_item);
				}
			});	
		}

		if (parseInt(selIndex) >= 0) {
			tabs.removeClass('active').eq(selIndex).addClass('active');
			items.removeClass('active').eq(selIndex).addClass('active');

			if (o.tracker){
				$('>a', tabs.eq(selIndex)).attr('rel', '1');
			}
		}

		var tabChange = function (tabNext) {
			var tabNextIndex = tabs.index(tabNext);

			if (o.tracker){
				if (!tabNext.hasClass('active')){
					var tabNextRel = $('>a', tabNext).attr('rel');
					tabNextRel = parseInt(tabNextRel) + 1;
					$('>a', tabNext).attr('rel', tabNextRel);
				}
			}

			if (!$(o.items + '.active', wrapCurrent).hasClass('hover') && !$(o.tabs + '.active', wrapCurrent).hasClass('hover'))
			{

				if (!tabNext.hasClass('active') || desactivation)
				{
					o.before(wrapCurrent);

					var tabInsel = false;
					if (tabNext.hasClass('active') && desactivation) { tabInsel = true; }

					tabs.removeClass('active');
					items.removeClass('active');

					if (!tabInsel) {
						tabs.eq(tabNextIndex).addClass('active');
						items.eq(tabNextIndex).addClass('active');
					}

					o.after(wrapCurrent);

					if (o.auto > 0) {
						clearInterval(tabs_interval);
						tabs_interval = setInterval(tabs_rotate, o.auto);
					}
				}
			}
		};

		if (o.auto > 0) {
			var tabs_rotate = function rotation () {
				var nextTab = tabs.eq(tabs.index($(o.tabs + '.active', wrapCurrent)) + 1);
				if(nextTab.length <= 0){ nextTab = tabs.eq(0); }
				tabChange(nextTab);
			};
			var tabs_interval = setInterval(tabs_rotate, o.auto);
		}

		tabs.bind(o.tabEvent,function(){
			tabChange($(this));
		});

		if (o.itemEvent){
			items.bind(o.itemEvent,function(){
				tabChange(tabs.eq(items.index(this)));
				return false;
			});
		}
	});
}; })(jQuery);

/*** TABS_PANELS */

//$(window).load(function(){
$(document).ready(function(){

	$('.tabs_panels').each(function(){
		var _this = $(this);
		_this.tabs({
			tabs: '.tab a',
			items: '.item',
			after: function(wrap){
				$('.item', wrap).css('overflow','hidden').height('auto');
				$('.mask', wrap).height($('.item.active', wrap).height());
			}
		});
		$('.item', _this).css('overflow','hidden').height('auto');
		$('.mask', _this).height($('.item.active', _this).height());
	});
	
});

/*----------------------------------
	TOOTLTIP
----------------------------------*/

(function($){ $.fn.tooltip = function (){
	$(this).each(function(){
		var _anchor = $(this);
		if (_anchor.attr('title') != ''){
			var _tooltip = document.createElement('span');
			_anchor.append(_tooltip);
			_tooltip = $('span:last', _anchor).addClass('tooltip');
			var _tooltipinner = document.createElement('span');
			_tooltip.append(_tooltipinner);
			_tooltipinner = $('span:last', _tooltip).addClass('tooltip-inner');
			var _tooltipinnerinfo = document.createElement('span');
			_tooltipinner.append(_tooltipinnerinfo);
			_tooltipinnerinfo = $('span:last', _tooltipinner).addClass('tooltip-info').html(_anchor.attr('title'));
			_anchor.attr('title','');
		}
	});
}; })(jQuery);

/*----------------------------------
	UNSELECTABLE
----------------------------------*/

jQuery.fn.unselectable = function () {
	$(this).attr('unselectable', 'on')
		.css({
			MozUserSelect: 'none',
			KhtmlUserSelect: 'none',
			WebkitUserSelect: 'none',
			userSelect: 'none'
		})
		.each(function() { 
			this.onselectstart = function() { return false; };
		})
	;
	return this;
};

/*----------------------------------
	ZOOM
----------------------------------*/

(function($){ $.fn.zoom = function (){
	$(this).each(function(){
		var _zoom = $(this);

		// if (console){ console.log(_zoom); }

	});
}; })(jQuery);
