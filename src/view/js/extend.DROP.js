/*** PLACE needs getNumber in Drag */

(function($) { $.fn.place = function () {
	var elt = $(this);

	// marginRight : Webkit
	var eltMarginRight = 0;
	if ($.browser.webkit && elt.css('display') == 'block' && elt.css('float') == 'none' && elt.css('position') == 'static'){
		elt.css('display', 'inline-block');
		eltMarginRight = getNumber(elt.css('marginRight'));
	}
	// marginRight : others
	else { eltMarginRight = getNumber(elt.css('marginRight')); }

	return { width: getNumber(elt.outerWidth()) + getNumber(elt.css('marginLeft')) + eltMarginRight, height: getNumber(elt.outerHeight()) + getNumber(elt.css('marginTop')) + getNumber(elt.css('marginBottom')) };
}; })(jQuery);

/*** UNDERCURSOR (needs Place & Cursor Coords) */

(function($) { $.fn.underCursor = function (){ var iuc_val = $([]); $(this).each(function(){ var iuc = $(this); if (((curX + scrollX) >= iuc.offset().left) && ((curX + scrollX) < (iuc.offset().left + iuc.outerWidth(true))) && ((curY + scrollY) >= iuc.offset().top) && ((curY + scrollY) < (iuc.offset().top + iuc.outerHeight(true)))) { iuc_val = iuc_val.add(iuc); } }); return iuc_val; }; })(jQuery);

/*** DROP (needs underCursor & Place & EqualHeights) */

(function($) { $.fn.dragandrop = function (o) {
	o = $.extend({
		eltEvent: '',
		dropBlocs: '',
		dragDirection: true,
		whileDrag: function(){},
		afterDrop: function(){}
	}, o);

	var dragBlocs = $(this), dropBlocs = $(o.dropBlocs);
	var dadTmp = false;

	// même hauteur des zones dropables si spec
	if (o.dropBlocsEqualHeights == true){ dropBlocs.equalHeights(); }

	// pour chaque bloc draggable
	dragBlocs.each(function(){

		//---------------------------------------
		// init du drag

		var blocEvent = $(this);
		var eltEvent = $(o.eltEvent, blocEvent);

		eltEvent.bind('mousedown', function(btn){
			if (btn.which == 1){
				blocEvent.drag({

					// direction du drag
					dragDirection: o.dragDirection,

					// avant le drag
					beforeDrag: function(dragged){

						// retrait des scripts pour eviter une reexecution
						$('script', dragged).remove();

						// creation div temp
						dadTmp = $(document.createElement('DIV')).addClass('drag-location');

						if (!dadTmp.css('width'))
						{
							dadTmp.width(dragged.outerWidth(true));
							dadTmp.height(dragged.outerHeight(true));
						}

						// positionnement au-dessus
						dragged.zIndexTop().after(dadTmp);
					},

					// pendant le drag
					whileDrag: function(dragged){

						// si cursor hors de la div temp
						if (dadTmp.underCursor().length < 1){

							// si curseur au dessus d'un elt droppable
							var dropBlocDepend = dropBlocs.underCursor();
							if (dropBlocDepend.length >0){

								var dropDir = false;
								var draggedTop = dragged.offset().top +30;
								var draggedLeft = dragged.offset().left + (dragged.outerWidth(true)/2);
								var dropBlocDependChildren = dropBlocDepend.last().children();
								var dropBlocsCurrent = dragBlocs;
								var dragBlocDepend = $([]);
								dropBlocsCurrent.not('.dragging').each(function(){
									var dragBloc = $(this);
									if (dropBlocDependChildren.index(dragBloc) != -1 && dragBloc.underCursor().length >0){ dragBlocDepend = dragBlocDepend.add(dragBloc); }
								});
								if (dragBlocDepend.length > 0){
									dragBlocDepend = dragBlocDepend.last()
									if (draggedTop > (dragBlocDepend.offset().top + dragBlocDepend.outerHeight(true)/2)){ dropDir = 'bottom'; }
									else { dropDir = 'top'; }
									if (dropDir == 'top'){ if (!dragBlocDepend.prev('DIV').hasClass('drag-location')){ dragBlocDepend.before(dadTmp); } }
									else if (dropDir == 'bottom'){ if (!dragBlocDepend.next('DIV').hasClass('drag-location')){ dragBlocDepend.after(dadTmp); } }
								}
								else if ($('DIV.drag-location', dropBlocDepend).length <1){ dropBlocDepend.append(dadTmp); }

							}

						}
					},

					afterDrag: function(dragged){

						// suppression div temp après avoir succéder l'elt draggé
						dadTmp.hide().after(dragged).remove();

						// après le drop
						o.afterDrop(dragged);
					}

				});
			}

			// éviter la selection de texte
			this.unselectable = 'on';
			return false;
		});
	});
}; })(jQuery);