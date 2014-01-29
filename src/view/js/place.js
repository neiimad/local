/*** PLACE needs getNumber */

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