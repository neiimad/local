/*-----------------
	FORMULATE
-----------------*/

(function($){ $.fn.formulate = function(o)
{
	o = $.extend({
		after: function(){}
	}, o);
	
	$(this).each(function(){
		var _this = $(this);

		// form-elt
		$('.form-elt', _this).hover(
			function(){ $(this).addClass('active'); },
			function(){ $(this).removeClass('active'); }
		);

		// text
		$('.form-elt .text', _this).each(function(){
			var _text = $(this);
			if (_text.attr("maxlength")){
				_text.after($(document.createElement('span')).addClass('maxlength').append(0 + ' / ' + _text.attr("maxlength")));
				var _cpt = _text.next('.maxlength').eq(0);

				var messageCheck = function(){
		  			var message = _text.val();
		  			var messageLength = message.length;
					if(messageLength > _text.attr("maxlength")){ _text.val(message.substr(0, 500)); }
					_cpt.html(messageLength + ' / ' + _text.attr("maxlength"));
				}; messageCheck();

				_text.bind('change, keyup', function(){ messageCheck(); });
			}
			_text
				.click(function(){
					//$(this).val('');
				})
				.not('input[type=password]')
				.bind('change, keyup, mouseleave', function(){
			        if ($(this).hasClass('maj')){
			        	//$(this).val(maj_str($(this).val()));
			        }
				})
			;
		});

		// choix
		$('.choix', _this).each(function(){
			var _choix = $(this);

			$('input[type="radio"]', _choix).each(function(){
				var _input = $(this);
				$('.wrap', _choix).addClass('radio');
				if (_input.attr('checked') == 'checked'){
					_input.parent().addClass('radio-checked');
				}
			});

			$('input[type="checkbox"]', _choix).each(function(){
				var _input = $(this);
				$('.wrap', _choix).addClass('checkbox');
				if (_input.attr('checked') == 'checked'){
					_input.parent().addClass('checkbox-checked');
				}
			});

			$('label', _choix).each(function(){
				var _label = $(this).click(function(){
					var _wrap = $('.wrap', this);

					// checkbox
					var _checkbox = $('input[type=checkbox]', _wrap).not('[disabled=disabled]');
					if (_checkbox.length > 0){
						_wrap.toggleClass('checkbox-checked');
						if (_checkbox.attr('checked') == 'checked'){ _checkbox.attr('checked', false); }
						else { _checkbox.attr('checked', 'checked'); }
					}

					// radios
					var _radio = $('input[type=radio]', _wrap).not('[disabled=disabled]');
					if (_radio.length > 0){
						$('.wrap', _choix).removeClass('radio-checked')
						_wrap.addClass('radio-checked');
						$('input[type=radio][name=' + _radio.attr('name') + ']', _choix).attr('checked', false);
						_radio.attr('checked', 'checked');
					}

					return false;
				});
			});
		});

		// form-submit
		$('input[type=submit]', _this).click(function(){

			// XHR
			if (_this.hasClass('xhr')){

				var askData = '';

				// hidden
				$('input[type=hidden]', _this).not('input[value=""]').each(function(){
					if (askData != ''){ askData += '&'; }
					askData += $(this).attr('name') + '=' + $(this).val();//.replace(' ', '%20');
				});

				// texts
				$('input[type=text], input[type=password], textarea', _this).not('input[value=""]').each(function(){
					if (askData != ''){ askData += '&'; }
					askData += $(this).attr('name') + '=' + $(this).val();//.replace(' ', '%20');
				});

				// checkboxes
				$('input[type=checkbox]', _this).each(function(){
					if (askData != ''){ askData += '&'; }
					if ($(this).attr('checked') == 'checked'){
						askData += $(this).attr('id') + '=' + $(this).val();
					}
				});

				// radios
				$('input[type=radio]:checked', _this).each(function(){
					if (askData != ''){ askData += '&'; }
					askData += $(this).attr('name') + '=' + $(this).val();
				});

				// screen
				$(document).layer();

				// call-
				$.ajax({
					type: 'POST',
					url: _this.attr('action'),
					data: askData,
					success: function(bloc){
						$('body #' + $(bloc).attr('id')).remove();

						// back
						$(document).layer({content: $(bloc)});
					}
				});

				return false;
			}
		});

	});
}; })(jQuery);