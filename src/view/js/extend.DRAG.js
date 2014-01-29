/*** zIndexTop */

var zIndexMin = 10; (function($){ $.fn.zIndexTop = function (o){ $(this).each(function(){ zIndexMin++; $(this).css('zIndex', zIndexMin); }); return $(this); }; })(jQuery);

/*** drag */

var scrollFromX = 0, scrollFromY = 0;
(function($){ $.fn.drag = function (o){
	o = $.extend({
		dragDirection: true,
		beforeDrag: function(){},
		whileDrag: function(){},
		afterDrag: function(){}
	}, o);
	if (!$(this).length){ return false; }
	$(this).each(function(){
		var dragged = $(this);
		o.beforeDrag(dragged);
		var posX = 0, posY = 0;
		if (dragged.parent().css('position') == 'relative'){
			posX = getNumber(dragged.css('left'));
			posY = getNumber(dragged.css('top'));
		}
		else {
			posX = dragged.offset().left;
			posY = dragged.offset().top;
		}
		dragged.addClass('dragging').css({'left': posX, 'top': posY});
		var decalX = curX - posX, decalY = curY - posY, dragInterval = false, scrollFromX = scrollX, scrollFromY = scrollY;
		var dragging = function(){
			if(o.dragDirection != 'vertical'){ dragged.css('left', curX - decalX + scrollX - scrollFromX); }
			if(o.dragDirection != 'horizontal'){ dragged.css('top', curY - decalY + scrollY - scrollFromY); }
			o.whileDrag(dragged);
		};
		dragInterval = setInterval(dragging, 10);
		var afterDragFunc = function(){
				clearInterval(dragInterval);
				if (dragged.hasClass('dragging')){
					o.afterDrag(dragged);
				}
				dragged.removeClass('dragging');
		};
		$(document).mouseup(function(){ afterDragFunc(); });
		$(document).mouseleave(function(){ afterDragFunc(); });
	});
}; })(jQuery);