(function($) { $.fn.scroller = function (o)
{
	o = $.extend({
		direction: 'vertical',	// vertical ou horizontal
		decal: 1,				// px de défilement
		decalHover: 1,			// px de défilement au survol des boutons
		slow: 30,				// interval
		auto: true,				// defilement automatique
		btnsDisplay: 'block'	// reaffiche les boutons avec le bon display
	}, o);

	var direction = o.direction;
	var decal = o.decal;
	var decalNormal = o.decal;
	var decalHover = o.decalHover;
	var slow = o.slow; if (slow < 0){ slow = 30; }
	var auto = o.auto;

	// obtenir la taille reelle d'un elt
	var scrollerItemSize = function(elt){
		var eltSize = 0;
		if (direction == 'vertical'){ eltSize = elt.outerHeight(true); }
		else { eltSize = elt.outerWidth(true); }
		return eltSize;
	};

	// pour chaque scroller
	$(this).each(function(){
		var scroller = $(this);

		// mask
		var mask = $('.mask', scroller).eq(0);
		var maskSize = 0;
		if (direction == 'vertical'){ maskSize = mask.height(); }
		else { maskSize = mask.width(); }

		// liste
		var list = $('.list', mask).eq(0);
		var items = $('> *', list);
		var listSize = 0;
		if (direction == 'vertical'){
			items.each(function(){
				listSize += scrollerItemSize($(this));
				list.height(listSize);
			});
		}
		else {
			items.css('float', 'left').each(function(){
				listSize += scrollerItemSize($(this));
				list.width(listSize);
			});
		}

		// boutons
		var prev = null;
		var next = null;
		if (o.btnsDisplay != 'none')
		{
			$('a', scroller).each(function(){
				if ($(this).attr('rel') == 'prev'){
					prev = $(this);
					prev.mouseenter(function(){ decal = decalHover * (-1); }).mouseleave(function(){ decal = decalNormal; });
				}
				if ($(this).attr('rel') == 'next'){
					next = $(this);
					next.mouseenter(function(){ decal = decalHover; }).mouseleave(function(){ decal = decalNormal; });
				}
			});
		}
		// masquage des boutons si parametre ou si la liste nest pas plus grande que le mask
		if (listSize <= maskSize || o.btnsDisplay == 'none'){
			if (prev != null){ prev.css('display', 'none'); }
			if (next != null){ next.css('display', 'none'); }
		}

		// si la liste est plus grande que le mask
		if (listSize > maskSize){

			// margin à mesurer en fonction du sens de defilement
			var listOffset = null;
			if (direction == 'vertical'){ listOffset = 'marginTop'; }
			else { listOffset = 'marginLeft'; }

			// taille du premier elt
			var itemFirstSize = scrollerItemSize(items.eq(0));

			// fonction de deplacement
			var scrollerDecal = function(){

				// deplacement de la liste
				var listOffsetVal = getNumber(parseInt(list.css(listOffset))); // thx ie7 for NaN
				list.css(listOffset, listOffsetVal - decal);

				// recuperation des elements
				var items = $('> *', list);

				// deplacement d'un element en fin de chaine
				if ((decal >= 0) && (listOffsetVal <= -itemFirstSize)){
					var itemFirst = items.eq(0);
					list.css(listOffset, 0).append(itemFirst);
					itemFirstSize = scrollerItemSize(itemFirst);
				}

				// deplacement d'un element en debut de chaine
				else if ((decal < 0) && (listOffsetVal >= -10)){
					var itemLast = items.eq(items.length -1);
					list.css(listOffset, parseInt(list.css(listOffset)) - scrollerItemSize(itemLast)).prepend(itemLast);
				}

			};

			// defilement
			var autoInterval = null;
			var autoFunc = function(){ autoInterval = setInterval(scrollerDecal, slow); };

			// defilement automatique
			if (auto == true){
				autoFunc();
				// arret/reprise en fonction du survol de la liste
				list.mouseenter(function(){ clearInterval(autoInterval); });
				list.mouseleave(function(){ autoFunc(); });
			}
			// defilement via les boutons
			else{
				if (prev != null){ prev.mouseenter(function(){ autoFunc(); }).mouseleave(function(){ clearInterval(autoInterval); }); }
				if (next != null){ next.mouseenter(function(){ autoFunc(); }).mouseleave(function(){ clearInterval(autoInterval); }); }
			}
		}
	});

}; })(jQuery);