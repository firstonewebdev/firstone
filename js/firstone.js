///////////////////////////////////////////////////////////////////////////
// cookie handling
// from http://www.quirksmode.org/js/cookies.html
///////////////////////////////////////////////////////////////////////////
function createCookie ( name, value, days ) 
{
	var expires;

	if (days) 
	{
		var date = new Date();
		date.setTime(date.getTime() + (days*24*60*60*1000));
		expires = "; expires=" + date.toGMTString();
	} 
	else
	{
		expires = "";
	}
	document.cookie = encodeURIComponent(name) + "=" + 
					  encodeURIComponent(value) + expires + 
					  "; path=/";
}

function readCookie ( name ) 
{
	var nameEQ = encodeURIComponent(name) + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) 
	{
		var c = ca[i];
		while (c.charAt(0) === ' ') 
		{
			c = c.substring(1, c.length);
		}
		if (c.indexOf(nameEQ) === 0)
		{
			return decodeURIComponent(c.substring(nameEQ.length, c.length));
		} 
	}
	return null;
}

function eraseCookie ( name ) 
{
    createCookie ( name, "", -1 );
}

function handleLanguageCookies()
{
	// read cookie
	var lang = readCookie('firstone-lang');

	// check if cookie already exist
	if ( lang == null )
	{
		// create cookie if not
		createCookie ( 'firstone-lang', 'de', 30 );
		// read cookie again
		lang = readCookie('firstone-lang');
	}
	// set language
	if ( lang != 'de' )
	{
		$lang_de.css('display','none');
		$lang_en.css('display','initial');
		$tooltip_de.css('display','none');
		$tooltip_en.css('display','block');
	}
	else
	{
		$lang_de.css('display','initial');
		$lang_en.css('display','none');
		$tooltip_de.css('display','block');
		$tooltip_en.css('display','none');
	}
}

///////////////////////////////////////////////////////////////////////////
// DOM handling
///////////////////////////////////////////////////////////////////////////
jQuery(document).ready(function()
{
	$window 		= jQuery(window); 
	$navbar			= jQuery('#navbar');
	$arrow_up 		= jQuery('#arrow-up');
	$header_image 	= jQuery('#header-image');
	$container 		= jQuery('#container'); 
	$myCarousel		= jQuery('#myCarousel');	
	$slider_info	= jQuery('#slider-info');
	$carousel_inner	= jQuery('#carousel-inner');
	$info_icon		= jQuery('#slider-info-icon');
	$stop_icon		= jQuery('#slider-stop-icon');
	$lang_switcher	= jQuery('#lang-switcher');
	$logo 			= jQuery('.custom-logo');
	$lang_de 		= jQuery('.lang-de');
	$lang_en 		= jQuery('.lang-en');
	$tooltip_de		= jQuery('#lang-tooltip-de');
	$tooltip_en		= jQuery('#lang-tooltip-en');

	var logoWidth	= $logo.css('width');
	var logoHeight	= $logo.css('height');
	var hiding 		= false;
	var showing 	= false;
	var imageHeight = $header_image.height(); 
	var arrowTrig	= 50;
	var logoTrig	= 5;

	// update image height on window resize
	$window.on('resize',function () 
	{    
		imageHeight = $header_image.height(); 
	});

	//
	handleLanguageCookies();

//console.log ( 'imageHeight' + imageHeight );

	///////////////////////////////////////////////////////////////////////////
	// navbar fade in/out
	// header image fade out on scroll down
	///////////////////////////////////////////////////////////////////////////
	$window.scroll(function () 
	{    
		var scrollTop	= $window.scrollTop(); 
		var winHeight	= $window.height();
		var offsetTop	= $container.offset().top; 
		var elemTop	= imageHeight - scrollTop;
		var fade = 1-(scrollTop/imageHeight);
		if ( fade < 0 )
		{
			fade = 0;
		}

		// arrow icon visibility trigger
		if ( scrollTop > arrowTrig ) 
		{
			$arrow_up.fadeIn(500);
		}
		else
		{
			$arrow_up.fadeOut(500);
		}

		// logo trigger
		if ( scrollTop > logoTrig ) 
		{
			//$logo.css({'width':'30%','height':'30%'});
		}
		else
		{
			//$logo.css({'width':logoWidth,'height':logoHeight});
		}

		// navbar and header image -fading
		if (elemTop < 0) 
		{
			if ( showing )
			{
				$navbar.finish();	
			}

			hiding = true;
			$navbar.hide(1000, function()
			{
				hiding = false;
			});
		} 
		else
		{
			$header_image.css(
			{
				'-webkit-filter': 'brightness('+fade+')',
				   '-moz-filter': 'brightness('+fade+')',
					'-ms-filter': 'brightness('+fade+')',
					 '-o-filter': 'brightness('+fade+')',
						'filter': 'brightness('+fade+')'

			});

			if ( hiding )
			{
				$navbar.finish();	
			}
			
			showing = true;
			$navbar.show(1000,function()
			{
				showing=false;
			});
		}
	});

	///////////////////////////////////////////////////////////////////////////
	// smooth scrolling
	///////////////////////////////////////////////////////////////////////////
	jQuery('a[href*="#"]:not([href="#"])').click(function() 
	{
		// check for bootstrap carousel
		if ( jQuery('.carousel').length || 
			 jQuery('.panel-group').length )
		{
			//console.log( 'return' );
			return true;
		}
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && 
			location.hostname == this.hostname) 
		{
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			if (target.length) 
			{
				jQuery('html, body').animate(
				{
			  		scrollTop: target.offset().top-30
				}, 1000);
				return false;
			}
		}
	});
	
	///////////////////////////////////////////////////////////////////////////
	// general scroll up function
	///////////////////////////////////////////////////////////////////////////
	jQuery('a[href="#"]').click(function() 
	{
		if ( jQuery(this).hasClass('.dropdown-toggle') )
		{
			return true;
		}
		jQuery('html, body').animate(
		{
			scrollTop: 0
		}, 500);
		return true;//false;
	});

	///////////////////////////////////////////////////////////////////////////
	// bootstrap slider functions
	///////////////////////////////////////////////////////////////////////////
	$stop_icon.mouseenter(function() 
	{
		$myCarousel.carousel('pause');	
	});

	$stop_icon.mouseleave(function() 
	{
		$myCarousel.carousel('cycle');	
	});

	$info_icon.mouseenter(function() 
	{
		$myCarousel.carousel('pause');	
		$info_icon.removeClass('jello');
		$slider_info.finish();
		$slider_info.fadeIn(500);
		$carousel_inner.css(
		{
			'-webkit-filter': 'blur(2px) brightness(0.5)',
			   '-moz-filter': 'blur(2px) brightness(0.5)',
				'-ms-filter': 'blur(2px) brightness(0.5)',
				 '-o-filter': 'blur(2px) brightness(0.5)',
					'filter': 'blur(2px) brightness(0.5)'

		});
	});

	$info_icon.mouseleave(function() 
	{
		$myCarousel.carousel('cycle');	
		$info_icon.addClass('jello');
		$slider_info.finish();
		$slider_info.fadeOut(500);
		$carousel_inner.css(
		{
			'-webkit-filter': 'blur(0) brightness(1)',
			   '-moz-filter': 'blur(0) brightness(1)',
				'-ms-filter': 'blur(0) brightness(1)',
				 '-o-filter': 'blur(0) brightness(1)',
					'filter': 'blur(0) brightness(1)'

		});
	});

	$lang_switcher.click(function() 
	{
		if ( $lang_en.css('display') == 'none' )
		{
			$lang_de.css('display','none');
			$lang_en.css('display','initial');
			$tooltip_de.css('display','none');
			$tooltip_en.css('display','block');
			createCookie ( 'firstone-lang', 'en', 30 );
		}
		else
		{
			$lang_de.css('display','initial');
			$lang_en.css('display','none');
			$tooltip_de.css('display','block');
			$tooltip_en.css('display','none');
			createCookie ( 'firstone-lang', 'de', 30 );
		}
	});	
});		
