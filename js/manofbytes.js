$( document ).ready(function() {
	// Move menu items according to display width
	function handleMobileMenu(){
		if( $( window ).outerWidth() <= 992 ){
			$('.menu').children().prependTo('.mobile-menu-items');
		}
		if( $( window ).outerWidth() > 992 ){
			$('.mobile-menu-items').children().prependTo('.menu');
		}
	}

	handleMobileMenu();

	// Adapt menu on resize
	$( window ).resize(function() {
		handleMobileMenu(); 
	});

	// Activate mobile menu
	$('.hamburger').click(function(e){
		e.preventDefault();
		if( $(this).hasClass('is-active') ){
			$(this).removeClass('is-active');
			$('.mobile-menu').removeClass('is-active');
		}else{
			$(this).addClass('is-active');
			$('.mobile-menu').addClass('is-active');
		}
	});


	// Open / close subscription modal
	$('.j-open-sub').click(function(e){
		e.preventDefault();
		$('.ebook-modal').addClass('opened');
	});

	$('.ebook-modal_close').click(function(e){
		e.preventDefault();
		$('.ebook-modal').find('.errors').html('');
		$('.ebook-modal').removeClass('opened');
	});
	

	// Handle share buttons
	$('.j-social-btn').on('click', function(e){
		e.preventDefault();
		var $btn 	= $(this);
		var href	= $btn.attr('href');
		var network	= $btn.attr('data-network');

		var winWidth  = $(window).width();
		var winHeight = $(window).height();

		var networks = {
			facebook : { width : 600, height : 300 },
			twitter  : { width : 600, height : 500 },
			linkedin : { width : 600, height : 473 }
		};

		var popup = function(network){
			var options 	= 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,';
			var leftOffset 	= (winWidth-networks[network].width)/2;
			var topOffset 	= (winHeight-networks[network].height)/2;
			window.open(href, '', options+'height='+networks[network].height+',left='+leftOffset+',top='+topOffset+',width='+networks[network].width);
		};

		popup(network);
	});


	// Handle subscriptions
	$('#mob-subscribe').submit(function(e){
		e.preventDefault();
		
		// Clear previous errors
		$(this).find('.errors').html('');

		var email = $(this).find('input[type="email"]').val();

		if( !email ){
			$(this).find('.errors').prepend('<p>Please add your email address first!</p>');
			return;
		}

		$(this).find('button[type="submit"]').html('<span class="icon icon-spin icon-spinner-circle"></span>');

		$.ajax({
			url: mob_subscribe.ajax,
			type: 'POST',
			data: {
				action: 'mob_subscribe',
				email: email,
			},
			// error: function (responose) {
			// 	console.log(responose);
			// },
			success: function(responose){
				$('#mob-subscribe').find('button[type="submit"]').html('Download the ebook');

				var result = JSON.parse(responose);
				
				if( result.error ){
					$('.ebook-modal').find('.errors').prepend(result.error);
				}

				if( result.success ){
					createCookie('mobEbook', '1', 30);

					$('.ebook-modal').find('input[type="email"]').val('');

					// Animation stuff
					$('.ebook-modal_content').addClass('trasintioning');

					$( '.ebook-img_wrapper, .ebook-conten_inside' ).fadeOut( 300, function(){
						$('.ebook-modal_content').removeClass('trasintioning');
						$('.ebook-modal_content').addClass('success');
						$('.ebook-modal_success').fadeIn( 300 );
					});
				}
			}
		});
		
	});
});

// Scroll magic stuff
$(window).on('load', function () {
	$.ready.then(function(){
		
		if( typeof ScrollMagic !== 'undefined' ){
			// Init scroll magic
			var controller = new ScrollMagic.Controller();

			if( $(window).width() > 1200 ){
				// Sidebar
				var scene = new ScrollMagic.Scene({
					triggerElement: '.featured-img', // point of execution
					offset: -50,
					duration: $('.featured-img').outerHeight(true) + $('.article-body').height() - $('.sidebar').height(),
					triggerHook: 0, // trigger at the top of viewport
					reverse: true // allows the effect to trigger when scrolled in the reverse direction
					})
					.setPin('.sidebar') // the element we want to pin
					.addTo(controller);
			}

			if( $(window).width() > 700 ){
				// Social menu
				var scene1 = new ScrollMagic.Scene({
					triggerElement: 'body', // point of execution
					offset: ( $(window).height() - $('.article-social-menu').height() ) / 2, // so that social menu remains around middle of the screen where people read
					duration: $('.article-body').height() - $('.article-social-menu').height(),
					triggerHook: 0, // trigger at the top of viewport
					reverse: true // allows the effect to trigger when scrolled in the reverse direction
					})
					.setPin('.article-social-menu') // the element we want to pin
					.addTo(controller);
			}
		}
	});
});


// Help cookies
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}