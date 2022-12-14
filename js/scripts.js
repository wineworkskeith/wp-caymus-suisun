// If Intersection Observer is not supported
if (!'IntersectionObserver' in window && !'IntersectionObserverEntry' in window && !'intersectionRatio' in window.IntersectionObserverEntry.prototype) {
	$('[data-animation]').addClass('is-visible');
}

// If Internet Explorer Intersection Observer
if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.appVersion.indexOf('Trident/') > -1) {
	$('[data-animation]').addClass('is-visible');
}

// Intersection Observer
setTimeout(function () {
	if ($('[data-animation]').length) {
		var elements = document.querySelectorAll('[data-animation]');

		var options = {
		threshold: 0
		};

		var observer = new IntersectionObserver(function (entries) {
		for (var i = 0; i < entries.length; i++) {
			if (entries[i].isIntersecting) {
			entries[i].target.classList.add('is-visible');
			}
		}
		}, options);

		for (var i = 0; i < elements.length; i++) {
		observer.observe(elements[i]);
		}
	}
}, 50);



//Add class to li to show submenu on click
var menuItem = document.getElementsByClassName("menu-item-has-children");
for (var i = 0; i < menuItem.length; i++) {
    menuItem[i].addEventListener('touchend click', function () {

		if (this.classList.contains('menu-item-has-children--visible')) {
			this.classList.remove('menu-item-has-children--visible');
		} else {
			this.classList.add('menu-item-has-children--visible');
		}
	});
}

jQuery(document).ready(function($) {

    //anchor smooth scroll
    $('a[href*="#"]')
      // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event) {
        // On-page links
        if(location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname){
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
              // Only prevent default if animation is actually gonna happen
			  event.preventDefault();

			  if (document.body.classList.contains('show-mobile-nav')) {
				document.body.classList.remove('show-mobile-nav');
				MicroModal.close('modal-menu');
				bodyScrollLock.clearAllBodyScrollLocks();
			}

			  var width = $(window).width();
			  if(width > 991){
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 1000, function() {
						// Callback after animation
						// Must change focus!						
						var $target = $(target);
						$target.focus();
						if ($target.is(":focus")) { // Checking if the target was focused
							return false;
						}else{
							$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
							$target.focus(); // Set focus again
						};
						$('body').css('overflow','auto');
						
					});
				}else{
	
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 1000, function() {
						// Callback after animation
						// Must change focus!
						var $target = $(target);
						$target.focus();
						if ($target.is(":focus")) { // Checking if the target was focused
							return false;
						}else{
							$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
							$target.focus(); // Set focus again
						};
					});
				}
          }
		}
	});


	$('#mobile-menu-toggle').on('click',function(event){
		event.preventDefault();	
		$('body').toggleClass('show-mobile-nav');
		MicroModal.show('modal-menu');
	});

	// Fade in the Suisun landing page:
	setTimeout(function(){ 
		$('body.page-template-page-suisun').addClass('loaded');
	},1000);
	

	//Add class to li to show submenu on click
	var menuItem = document.getElementsByClassName("menu-item-has-children");
	for (var i = 0; i < menuItem.length; i++) {
		menuItem[i].addEventListener('touchend click', function () {

			if (this.classList.contains('menu-item-has-children--visible')) {
				this.classList.remove('menu-item-has-children--visible');
			} else {
				this.classList.add('menu-item-has-children--visible');
			}
		});
	}

	// Menu ADA
	$('li.menu-item-has-children').each(function(){
		var name = $(this).find('a').first().text();
		name = name + '-Menu-Toggle';
		$(this).prepend('<label for="'+name+'">'+name+'</label><input type="checkbox" name="'+name+'" id="'+name+'" class="toggle-sub-menu">');

		if ($(this).hasClass('current-menu-item') || $(this).hasClass('current_page_item') || $(this).hasClass('current-menu-ancestor') || $(this).hasClass('current-menu-parent')  ){
			$(this).children('.toggle-sub-menu').prop( "checked", true );
		}
	});

	// Slick Slider - Regular Image Gallery
	$('.content-block__image-gallery-mobile').slick({
        dots: true,
		infinite: true,
		speed: 1300,
		fade: true,
		arrows: true,
		autoplay: true,
  		autoplaySpeed: 3500,
	});

	// Slick Slider - B&W Image Gallery
	$('.content-block__image-gallery-black-and-white-gallery-mobile').slick({
        dots: true,
		infinite: true,
		speed: 1300,
		fade: true,
		arrows: true,
		autoplay: true,
  		autoplaySpeed: 3500,
	});

	// Slick Slider - Full-Width Slider
	$('.content-block__full-width-slider .content-wrapper > div').slick({
        dots: false,
		infinite: true,
		speed: 1300,
		fade: true,
		arrows: true,
		autoplay: true,
  		autoplaySpeed: 3500,
		responsive: [
			{
				breakpoint: 640, // small only
				settings: {
					dots: true
				}
			}
		]
	});

	// footer menu credits
	$('footer .menu-item a:contains("Site Credits")').on('click', function(e){
		e.preventDefault();
		MicroModal.show('modal-1');
		$('body').removeClass('show-mobile-nav');
		MicroModal.close('modal-menu');
	});

	$('.footer-credits button').on('click', function(e){
		// e.preventDefault();
		MicroModal.close('modal-1');
	});


	// $(".banner-split__half").hover(function(){
	// 	$('.banner-split__half--active').removeClass('banner-split__half--active');
	// 	$('.banner-split__half').addClass('banner-split__half--hidden');
	// 	$(this).addClass('banner-split__half--active');
	// });

	// $(".banner-split__half").mouseout(function(){
	// 	$('.banner-split__half--active').removeClass('banner-split__half--active');
	// 	$('.banner-split__half--hidden').removeClass('banner-split__half--hidden');
	// });

	// $('.content-block__image-gallery-black-and-white-gallery-single').mouseenter(function(event){
	// 	let thisPhoto = $(this).attr('data-gallery-item-bw');
	// 	let nextPhoto = parseInt(thisPhoto) + 1;
	// 	let prevPhoto = parseInt(thisPhoto) - 1;

	// 	// remove active class from all gallery items
	// 	$('.content-block__image-gallery-black-and-white-gallery-single--active').removeClass('content-block__image-gallery-black-and-white-gallery-single--active');
	// 	// remove hidden class from all gallery items
	// 	$('.content-block__image-gallery-black-and-white-gallery-single--hidden').removeClass('content-block__image-gallery-black-and-white-gallery-single--hidden');
	// 	// make this one active
	// 	$(this).addClass('content-block__image-gallery-black-and-white-gallery-single--active');	

	// 	if(thisPhoto == 1 || thisPhoto == 4){
	// 		$('[data-gallery-item-bw="'+ nextPhoto +'"]').addClass('content-block__image-gallery-black-and-white-gallery-single--hidden');
	// 	}else{
	// 		$('[data-gallery-item-bw="'+ prevPhoto +'"]').addClass('content-block__image-gallery-black-and-white-gallery-single--hidden');
	// 	}
	// }); // mouseenter

	// $('.content-block__image-gallery-black-and-white-gallery-single').mouseout(function(event){
	// 	// remove active class from all gallery items
	// 	$('.content-block__image-gallery-black-and-white-gallery-single--active').removeClass('content-block__image-gallery-black-and-white-gallery-single--active');
	// 	// remove hidden class from all gallery items
	// 	$('.content-block__image-gallery-black-and-white-gallery-single--hidden').removeClass('content-block__image-gallery-black-and-white-gallery-single--hidden');
	// }); // mouseleave
	
	$('.content-block__image-gallery-black-and-white-gallery-single').on('click',function(event){
		let thisPhoto = $(this).attr('data-gallery-item-bw');
		let nextPhoto = parseInt(thisPhoto) + 1;
		let prevPhoto = parseInt(thisPhoto) - 1;
		
		if($(this).hasClass('content-block__image-gallery-black-and-white-gallery-single--active')){ // if the tile that is clicked on is already active:
			// remove the "active" state from this item
			$(this).removeClass('content-block__image-gallery-black-and-white-gallery-single--active');
			// remove hidden class from all gallery items
			$(".content-block__image-gallery-black-and-white-gallery-single--hidden").each(function(){
				$(this).removeClass('content-block__image-gallery-black-and-white-gallery-single--hidden');
			});
		}else{  // if the tile that is clicked on not already already active:
			// remove hidden class from all gallery items
			$(".content-block__image-gallery-black-and-white-gallery-single--hidden").each(function(){
				$(this).removeClass('content-block__image-gallery-black-and-white-gallery-single--hidden');
			});
			// remove active class from all gallery items
			$(".content-block__image-gallery-black-and-white-gallery-single--active").each(function(){
				$(this).removeClass('content-block__image-gallery-black-and-white-gallery-single--active');
			});
			// make this one "active"
			$(this).addClass('content-block__image-gallery-black-and-white-gallery-single--active');
			// Hide the next or previous item depending on which one we clicked on
			if(thisPhoto == 1 || thisPhoto == 4){
				$('[data-gallery-item-bw="'+ nextPhoto +'"]').addClass('content-block__image-gallery-black-and-white-gallery-single--hidden');
			}else{
				$('[data-gallery-item-bw="'+ prevPhoto +'"]').addClass('content-block__image-gallery-black-and-white-gallery-single--hidden');
			}
		} // end if/else
	}); // on click

	// $('.content-block__image-gallery-black-and-white-gallery-single a').on('click',function(event){
	// 	event.preventDefault();
	// 	// remove active class from all gallery items
	// 	$('.content-block__image-gallery-black-and-white-gallery-single--active').removeClass('content-block__image-gallery-black-and-white-gallery-single--active');
	// 	// remove hidden class from all gallery items
	// 	$('.content-block__image-gallery-black-and-white-gallery-single--hidden').removeClass('content-block__image-gallery-black-and-white-gallery-single--hidden');
	// });

	// VIDEO MODAL 
	$('.content-block__two-images-and-video-and-text-top-video > a').on('click',function(event){
		event.preventDefault();
		var video_to_show = $(this).attr('data-player-linked-id');
		$('div[data-player-id="'+video_to_show+'"]').addClass('two-images-and-video-and-text__player--active');	
		$('div[data-player-id="'+video_to_show+'"]').find('a').focus(); // set focus to the modal's close link
		$('div[data-player-id="'+video_to_show+'"] a').focusout(function(){
			$('div[data-player-id="'+video_to_show+'"] a').focus(); // lock the focus to only the close link
		});
		$('body,html').addClass('no-scroll'); // stop the body from scrolling
		const targetElement = document.querySelector('.two-images-and-video-and-text__player > div');
		bodyScrollLock.disableBodyScroll(targetElement); // add a listener event that allows the modal content to scroll
		var iframe_id = 'video_' + video_to_show;
		const video_to_play = document.getElementById(iframe_id);
    	const player = new Vimeo.Player(video_to_play);	
		player.play();	
	});

	
	// VIDEO MODAL "X" CLICKED:
	$('.two-images-and-video-and-text__player a').on('click',function(event){
		event.preventDefault();
		var video_to_close = $(this).attr('data-player-to-close');
		$('.two-images-and-video-and-text__player--active').removeClass('two-images-and-video-and-text__player--active');
		var iframe_id = 'video_' + video_to_close;
		const video_to_pause = document.getElementById(iframe_id);
    	const player = new Vimeo.Player(video_to_pause);	
		player.pause();
		$('body,html').removeClass('no-scroll'); // allow the body to scroll again
		$('[data-player-linked-id="'+video_to_close+'"]').focus(); // set the focus back to the player's "open" button/
		bodyScrollLock.clearAllBodyScrollLocks(); // remove the listener event that allows the modal content to scroll
	});

	//////////////////////////////////////////////////////
	// GREENSOCK (GSAP)
	//////////////////////////////////////////////////////
	const blockquote_bottom_p = gsap.utils.toArray('.content-block__blockquote-without-image blockquote.bottom p');
	blockquote_bottom_p.forEach(item => {
		gsap.to(item, { 
			opacity: 1,
			ease: 'power4',
			duration: 4,
			scrollTrigger: {
				trigger: item,
			}
		})
	});

	const blockquote_bottom_cite = gsap.utils.toArray('.content-block__blockquote-without-image blockquote.bottom cite');
	blockquote_bottom_cite.forEach(item => {
		gsap.to(item, { 
			opacity: 1,
			ease: 'power4',
			duration: 6,
			delay: 1,
			scrollTrigger: {
				trigger: item,
			}
		})
	});

	const blockquote_top_p = gsap.utils.toArray('.content-block__blockquote-without-image blockquote.top p');
	blockquote_top_p.forEach(item => {
		gsap.to(item, { 
			opacity: 1,
			ease: 'power4',
			duration: 4,
			delay: 1,
			scrollTrigger: {
				trigger: item,
			}
		})
	});

	const blockquote_top_cite = gsap.utils.toArray('.content-block__blockquote-without-image blockquote.top cite');
	blockquote_top_cite.forEach(item => {
		gsap.to(item, { 
			opacity: 1,
			ease: 'power4',
			duration: 6,
			scrollTrigger: {
				trigger: item,
			}
		})
	});

	gsap.to(".banner-split__half-content", {
		opacity: 1,
		ease: 'power4',
		duration: 4,
		scrollTrigger: {
			trigger: ".banner-split__half-content"
		}
	});

	const full_width_images = gsap.utils.toArray('.content-block__full-width-image');
	full_width_images.forEach(item => {
		gsap.to(item, { 
			opacity: 1,
			ease: 'power4',
			duration: 4,
			scrollTrigger: {
				trigger: item,
				start: 'top 40%',
			}
		})
	});

	gsap.to(".visit-section .col:first-of-type", {
		opacity: 1,
		x: 0,
		ease: 'power2',
		duration: 2,
		scrollTrigger: {
			trigger: ".visit-section",
			start: 'top 40%',
		}
	});

	gsap.to(".visit-section .col:last-of-type .col__text", {
		opacity: 1,
		x: 0,
		ease: 'power2',
		duration: 2,
		scrollTrigger: {
			trigger: ".visit-section",
			start: 'top 40%',
		}
	});

	gsap.to(".visit-section .col:last-of-type img", {
		opacity: 1,
		y: 0,
		ease: 'power2',
		duration: 2,
		scrollTrigger: {
			trigger: ".visit-section .col:last-of-type",
			start: 'top 10%'
		}
	});

	gsap.to(".wines-section .content-block__two-images-and-video-and-text-top-image img", {
		opacity: 1,
		x: 0,
		ease: 'power2',
		duration: 2,
		scrollTrigger: {
			trigger: ".wines-section",
			start: 'top 40%'
		}
	});

	gsap.to(".wines-section .content-block__two-images-and-video-and-text-bottom-image img", {
		opacity: 1,
		x: 0,
		ease: 'power2',
		duration: 2,
		scrollTrigger: {
			trigger: ".wines-section",
			start: 'top 40%'
		}
	});

	gsap.to(".wines-section .content-block__two-images-and-video-and-text-bottom-text > div", {
		opacity: 1,
		y: 0,
		ease: 'power2',
		duration: 2,
		scrollTrigger: {
			trigger: ".wines-section",
			start: 'top 10%'
		}
	});

	gsap.to(".before-people-gallery > div", {
		opacity: 1,
		ease: 'power3',
		duration: 4,
		scrollTrigger: {
			trigger: ".before-people-gallery",
		}
	});


	gsap.to(".footer .footer__column:first-of-type", {
		opacity: 1,
		y: 0,
		ease: 'power3',
		duration: 1.25,
		scrollTrigger: {
			trigger: ".footer",
		}
	});

	gsap.to(".footer .footer__column:nth-of-type(2)", {
		opacity: 1,
		y: 0,
		delay: 0.4,
		ease: 'power3',
		duration: 1.25,
		scrollTrigger: {
			trigger: ".footer",
		}
	});

	gsap.to(".footer .footer__column:nth-of-type(3)", {
		opacity: 1,
		y: 0,
		delay: 0.8,
		ease: 'power3',
		duration: 1.25,
		scrollTrigger: {
			trigger: ".footer",
		}
	});

	gsap.to(".visit-reservations .col:first-of-type", {
		opacity: 1,
		y: 0,
		ease: 'power3',
		duration: 2,
		delay: 1,
		scrollTrigger: {
			trigger: ".visit-reservations",
			start: "top 60%",
		}
	});

	gsap.to(".visit-reservations .col:last-of-type img", {
		opacity: 1,
		x: 0,
		ease: 'power3',
		duration: 2,
		delay: 0.5,
		scrollTrigger: {
			trigger: ".visit-reservations",
			start: "top 60%",
		}
	});

	const cs_blockquote_bottom_img = gsap.utils.toArray('.content-block__blockquote--with-image img');
	cs_blockquote_bottom_img.forEach(item => {
		gsap.to(item, { 
			opacity: 1,
			ease: 'power4',
			duration: 4,
			x: 0,
			delay: 1,
			scrollTrigger: {
				trigger: item,
			}
		})
	});

	const cs_blockquote_bottom_p = gsap.utils.toArray('.content-block__blockquote--with-image blockquote.bottom p');
	cs_blockquote_bottom_p.forEach(item => {
		gsap.to(item, { 
			opacity: 1,
			ease: 'power4',
			duration: 4,
			y: 0,
			delay: 1.35,
			scrollTrigger: {
				trigger: item,
			}
		})
	});

	const cs_blockquote_bottom_cite = gsap.utils.toArray('.content-block__blockquote--with-image blockquote.bottom cite');
	cs_blockquote_bottom_cite.forEach(item => {
		gsap.to(item, { 
			opacity: 1,
			ease: 'power4',
			duration: 4,
			delay: 2.75,
			y: 0,
			scrollTrigger: {
				trigger: item,
			}
		})
	});

	gsap.to(".explore-suisun .col:first-of-type div:first-of-type", {
		opacity: 1,
		x: 0,
		ease: 'power3',
		duration: 2,
		delay: 0.5,
		scrollTrigger: {
			trigger: ".explore-suisun",
			start: "top 60%",
		}
	});

	gsap.to(".explore-suisun .col:first-of-type div:last-of-type", {
		opacity: 1,
		y: 0,
		ease: 'power3',
		duration: 2,
		delay: 0.5,
		scrollTrigger: {
			trigger: ".explore-suisun",
			start: "top 60%",
		}
	});

	gsap.to(".explore-suisun .col:last-of-type img", {
		opacity: 1,
		ease: 'power3',
		duration: 2,
		delay: 0.5,
		scrollTrigger: {
			trigger: ".explore-suisun",
			start: "top 60%",
		}
	});

	gsap.to(".suisun-wines .col:first-of-type", {
		opacity: 1,
		x: 0,
		ease: 'power3',
		duration: 2,
		delay: 0.5,
		scrollTrigger: {
			trigger: ".suisun-wines",
			start: "top 60%",
		}
	});

	gsap.to(".suisun-wines .col:last-of-type", {
		opacity: 1,
		x: 0,
		ease: 'power3',
		duration: 2,
		delay: 0.5,
		scrollTrigger: {
			trigger: ".suisun-wines",
			start: "top 60%",
		}
	});

	gsap.to(".suisun-family .col:first-of-type", {
		opacity: 1,
		x: 0,
		ease: 'power3',
		duration: 2,
		delay: 0.5,
		scrollTrigger: {
			trigger: ".suisun-family",
			start: "top 60%",
		}
	});

	gsap.to(".suisun-family .col:last-of-type", {
		opacity: 1,
		x: 0,
		ease: 'power3',
		duration: 2,
		delay: 0.5,
		scrollTrigger: {
			trigger: ".suisun-family",
			start: "top 60%",
		}
	});
	
	
	

	// Initilize all modals
	MicroModal.init();

}); // end ready


//////////////////////////////////////////////////////
// CLOSING MODAL AND MENU ON ESC PRESS
//////////////////////////////////////////////////////
$(window).keyup(function(e){
	if(e.which == 27 ){ // escape

		// close video modal
		if($('.two-images-and-video-and-text__player--active').hasClass('two-images-and-video-and-text__player--active')){
			$('.two-images-and-video-and-text__player--active').removeClass('two-images-and-video-and-text__player--active');
			$('body,html').removeClass('no-scroll');
			video_to_pause = document.getElementsByClassName('vimeo-modal');
			for (const video_player of video_to_pause){
				const player = new Vimeo.Player(video_player);	
				player.pause();
			}
			bodyScrollLock.clearAllBodyScrollLocks();
		}

		// remove active class from all gallery items
		$(".content-block__image-gallery-black-and-white-gallery-single--active").each(function(){
			$(this).removeClass('content-block__image-gallery-black-and-white-gallery-single--active');
		});
		$(".content-block__image-gallery-black-and-white-gallery-single--hidden").each(function(){
			$(this).removeClass('content-block__image-gallery-black-and-white-gallery-single--hidden');
		});

		MicroModal.close('modal-1');
	
	} // if key pressed = ESC
}); // end keyup



window.addEventListener('scroll', function() { 
    //Add class to body on scroll
    var scrollpos = window.scrollY;
    
    if (scrollpos >= 110) { 
    	if (document.body.classList.contains('scrolled')) {
    		//do nothing
		} else {
			document.body.classList.add('scrolled');
		}
    } else { 
		if (scrollpos <= 105) { 
			document.body.classList.remove('scrolled');
		}
    }
}); // end scroll

