/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w = window, d = document, e = d.documentElement, g = d.getElementsByTagName('body')[0], x = w.innerWidth || e.clientWidth || g.clientWidth, y = w.innerHeight || e.clientHeight || g.clientHeight;
	return { width: x, height: y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {
    
    //open and close header nav
	function toggleNav() {
		$(".menu-toggle").click(function(e){
                    
			if ($(".primary-navigation").hasClass("open")){
				$(".site-header").removeClass("open");
				$(".primary-navigation").removeClass("open");
				$(".eo-navigation").removeClass("open");
				$(".menu-toggle").removeClass("up");
                        } else {
				$(".site-header").removeClass("smaller");
				$(".site-header").addClass("open");
				$(".primary-navigation").addClass("open");
				$(".eo-navigation").addClass("open");
				$(".menu-toggle").addClass("up");
                        }
			
		});
	}
	toggleNav();
    
    // open search bar in mobile
	function toggleSearch() {
		$(".search-toggle").click(function(e){
                    
			if ($(".primary-navigation").hasClass("search")){
				$(".site-header").removeClass("search");
				$(".primary-navigation").removeClass("search");
                        } else {
				$(".site-header").addClass("search");
				$(".primary-navigation").addClass("search");
                        }
			
		});
	}
	toggleSearch();
    
    //open and close header nav - REPLACED BY ARIA SCRIPT FOR KEYBOARD ACCESSIBILITY
	/*function toggleSubmenu() {
        $("ul.nav-menu > li").click(function() {
            if ($(this).children('.sub-menu').length > 0)
                if ($(this).children('.sub-menu').hasClass('open')) {
                    $(this).children('.sub-menu').removeClass('open');
                    $(this).removeClass('open');
                } else {
                    $(this).children('.sub-menu').addClass('open');
                    $(this).addClass('open');
                }
        });
	}
    window.onload = toggleSubmenu();*/
    
    // function to close all .sub-menu when user clicks anywhere else on page
    function closeallmenu() {
        $('body').click(function() {
          $('.sub-menu').removeClass('open');
            $('ul.nav-menu > li').removeClass('open');
            $( '.main-menu ul.nav-menu > li[aria-expanded="true"]' ).attr( 'aria-expanded', false );
        });

        $('#menu-main-menu').click(function(event){
            event.stopPropagation();
        });
    }
    closeallmenu();

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();
    
// popup windows (add class .popup to html container ) from http://stackoverflow.com/questions/1328723/how-to-generate-a-simple-popup-using-jquery
	function deselect(e) {
			$('.popup').slideFadeToggle(function() {
			  e.removeClass('selected');
			});    
		}
	      
		$(function() {
			$('.poptrigger').on('click', function() {
			  if($(this).hasClass('selected')) {
				deselect($(this));               
			  } else {
				$(this).addClass('selected');
				$('.popup').slideFadeToggle();
			  }
			  return false;
			});
			  
			$('.close').on('click', function() {
			  deselect($('.poptrigger'));
			  return false;
			});
		});
	      
	    $.fn.slideFadeToggle = function(easing, callback) {
			return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
	    };
    
    // MENU ARIA
    // Properly update the ARIA states on focus (keyboard) and mouse over events
      $( '[role="menubar"]' ).on( 'focus.aria click.aria', '[aria-haspopup="true"]', function ( ev ) {
          $( 'li' ).attr( 'aria-expanded', false );
          $( 'li' ).removeClass('open');
          $( 'li' ).children('.sub-menu').removeClass('open');
          
          $( ev.currentTarget ).attr( 'aria-expanded', true );
          $( ev.currentTarget ).addClass('open');
          $( ev.currentTarget ).children('.sub-menu').addClass('open');
      } );

      // Properly update the ARIA states on blur (keyboard) and mouse out events
      $( '[role="menubar"]' ).on( 'blur.aria', '[aria-haspopup="true"]', function ( ev ) {
          $( ev.currentTarget ).attr( 'aria-expanded', false );
          $( ev.currentTarget ).removeClass('open');
          $( ev.currentTarget ).children('.sub-menu').removeClass('open');
              $( ev.currentTarget ).keydown(function(e){
                 // Listen for the up, down, left and right arrow keys, otherwise, end here
                if ([37,38,39,40].indexOf(e.keyCode) == -1) {
                    return;
                } else {
                    if(e.keyCode == 37) {
                        alert('left');
                    }
                    else if(e.keyCode == 38) {
                        alert('up');
                    }
                    else if(e.keyCode == 39) {
                        alert('right');
                    }
                    else if(e.keyCode == 40) {
                        alert('down');
                    }
                }
              })

      } );
    
    function accordion() {
		$(".accordion-toggle").click(function(){
			if ($(this).hasClass("open")){
                $(this).parent('.accordion').removeClass("open");
				$(this).parent('.accordion').children(".accordion-box").removeClass("open");
				$(this).removeClass("open");
                
            } else {
                $(this).parent('.accordion').addClass("open");
				$(this).parent('.accordion').children(".accordion-box").addClass("open");
				$(this).addClass("open");
            }
		});
	}
	$(".accordion-box").onload = accordion();
   
}); /* end of as page load scripts */