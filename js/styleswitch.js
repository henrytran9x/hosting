/**
* Styleswitch stylesheet switcher built on jQuery
* Under an Attribution, Share Alike License
* By Kelvin Luck ( http://www.kelvinluck.com/ )
**/

(function($)
{
	$(document).ready(function() {

		if(Drupal.settings.style_switch != 'undefined')
		{
			switchStylestyle('style-'+Drupal.settings.style_switch);
		}
		$switcher = $('#switcher')
		$('#button-switch').on('click',function(){
			if ($switcher.hasClass("show-switcher")) {
	            $switcher.addClass('hide-switcher');
	      		$switcher.removeClass('show-switcher');
	        }
	        else {
	        	$switcher.addClass('show-switcher');
	      		$switcher.removeClass('hide-switcher');
	        };
		});
		$item = $('#wrapper')
		$('.themestyle a').each(function(){
			var el = $(this);
			el.on('click',function(){
				 var class_old = this.getAttribute("data-value");
				$('.themestyle a').removeClass('active');

				el.addClass('active');
				switch(this.getAttribute("data-value"))
				{
					case 'boxed':
							$item.removeClass('framed rounded');
							break;
					case 'framed':
							$item.removeClass('boxed rounded');
							break;
					case 'rounded':
						$item.removeClass('boxed framed');
							break;
					default:
							$item.removeClass('boxed framed rounded');
							break;
				}
				$item.addClass(this.getAttribute("data-value"));


			});
		});

		$body = $('body')
		$('.themebg a').each(function(){
			var el = $(this);
			el.on('click',function(){
				$('.themebg a').removeClass('active');
				el.addClass('active');
				$body.removeClass('bg-1 bg-2 bg-3 bg-4 bg-5 bg-6');
				$body.addClass(this.getAttribute("data-value"));
			});
		});

		$('#f-head').each(function(){
			var el = $(this);
			el.change(function(){
				$body.removeClass('f-head-1 f-head-2 f-head-3 f-head-4 f-head-5 f-head-6 f-head-7 f-head-8');
				$body.addClass('f-head-'+el.val());
			});
		});

		$('#f-body').each(function(){
			var el = $(this);
			el.change(function(){
				$body.removeClass('f-body-1 f-body-2 f-body-3 f-body-4 f-body-5 f-body-6 f-body-7 f-body-8');
				$body.addClass('f-body-'+el.val());
			});
		});

		$('#f-menu').each(function(){
			var el = $(this);
			el.change(function(){
				$body.removeClass('f-menu-1 f-menu-2 f-menu-3 f-menu-4 f-menu-5 f-menu-6 f-menu-7 f-menu-8');
				$body.addClass('f-menu-'+el.val());
			});
		});

		$('.themecolor a').click(function()
		{
			switchStylestyle(this.getAttribute("data-rel"));
			return false;
		});
		var c = readCookie('style');
		if (c) switchStylestyle(c);
	});
	function switchStylestyle(styleName)
	{

		$('link[rel*=style][title]').each(function(i)
		{
			this.disabled = true;

			if (this.getAttribute('title') == styleName) this.disabled = false;

		});
		createCookie('style', styleName, 365);
	}

})(jQuery);

// cookie functions http://www.quirksmode.org/js/cookies.html
function createCookie(name,value,days)
{
	if (days)
	{
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name)
{
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
function eraseCookie(name)
{
	createCookie(name,"",-1);
}
// /cookie functions
