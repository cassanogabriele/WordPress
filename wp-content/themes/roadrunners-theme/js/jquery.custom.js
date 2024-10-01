/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			jquery.custom.js
 * =========================================================================================================================================
 *
 * @package roadrunners
 * @since 1.1.0
 * @changelog
 *
 * 1.1.0 - Now using "on" for click events.
 * 1.0.2 - Adjusted the scroll position.
 * 1.0.4 - Moved ScrollReveal call to jquery.scrollreveal.min.js
 */
jQuery(document).ready(function($){

	"use strict";

	/**
	 * Initiate Textillate script for the home page.
	 */
	$('.tlt').textillate({
	
		selector 		: '.texts',
		loop			: true,
		minDisplayTime	: 3000,
	
		in: {
		
			effect 		: 'bounceIn',
			delayScale	: 1,
			delay		: 60,
			sync		: false,
			shuffle		: false,
			reverse		: false
			
		},
		
		out: {
		
			effect 		: 'fadeOutLeft',
			delayScale	: 1,
			delay		: 60,
			sync		: false,
			shuffle		: false,
			reverse		: false
			
		}
		
	});
	
	/**
	 * Mobile Menu Toggle
	 */
	$('#mobile-menu').on( 'click', function(e){
	
		$('#main-navigation').slideToggle( 800, 'easeInOutCirc' );
		e.preventDefault();
	
	});
	
	$(window).resize(function(){
	
		var window_width = $(window).width();
	
		if( window_width > 1024 ) {	$('#main-navigation').css( 'display', 'block' ); }
		if( window_width < 1025 ) {	$('#main-navigation').css( 'display', 'none' ); }
	
	});
	
	/**
	 * The "Back-to-Top" Button.
	 */
	$('.back-to-top').on( 'click', function(e){
	
		$('body, html').animate( { scrollTop: 0 } , 1000 , 'easeInOutCirc' );
		e.preventDefault();
	
	});
	
	$('.back-to-top').hide();
	$(window).scroll(function(){
		
		var window_width = $(window).width();
	
		if( $(this).scrollTop() > 250 && window_width > 1024 ){
			$(".back-to-top").fadeIn();
		} else {
			$(".back-to-top").fadeOut();
		}
	
	});
	
	/**
	 * Scroll to a section on the page.
	 */
	$('.scroll a, a.scroll').on( 'click', function(e){
	
		var rel 			= $(this).attr('class');
		var destination 	= rel.split('_')[0];
		var window_width 	= $(window).width();
		var the_offset 		= 120;
		
		$('body , html').animate( { scrollTop: $( '#' + destination ).offset().top-the_offset } , 2000 , 'easeInOutCirc' );
	
		if( window_width < 1025 ) {
	
			$('#main-navigation').slideUp( 800, 'easeInOutCirc' );
		
		}
	
		e.preventDefault();
	
	});

	/**
	 * Accordions and Toggles.
	 */
	$('.accordion-content.open').css( 'display', 'block' );
	$('.accordion-header').on( 'click', function(e){
	
		if( ! $(this).hasClass('accordion-collapse') ){
		
			$(this).parents().eq(1).find('.accordion-content').removeClass('open').slideUp( 'slow' );
			$(this).parents().eq(1).find('.accordion-header').removeClass('accordion-collapse');
			$(this).parents().eq(1).find('.accordion-header .fa').removeClass('fa-minus');
			$(this).parents().eq(1).find('.accordion-header .fa').addClass('fa-plus');
		
			$(this).next().addClass('open').slideDown( 'slow' );
			$(this).addClass('accordion-collapse');
			$(this).find('.fa').removeClass('fa-plus');
			$(this).find('.fa').addClass('fa-minus');
			
		}
				
		e.preventDefault();
	
	});
	
	$('.toggle-content.open').css( 'display', 'block' );
	$('.toggle-header').on( 'click', function(e){
	
		if( $(this).hasClass('toggle-collapse') ){
		
			$(this).next().slideUp( 'slow' );
			$(this).removeClass('toggle-collapse');
			$(this).find('.fa').removeClass('fa-minus');
			$(this).find('.fa').addClass('fa-plus');
			
		} else {
		
			$(this).next().slideDown( 'slow' );
			$(this).addClass('toggle-collapse');
			$(this).find('.fa').removeClass('fa-plus');
			$(this).find('.fa').addClass('fa-minus');
			
		}
		
		e.preventDefault();
	
	});
	
	/**
	 * Call FitVids
	 */
	$(".artist-entry-content, .event-entry-content, .entry-content").fitVids({
	
		// Leave SoundCloud alone...
		ignore: 'iframe[src^="https://w.soundcloud.com"]'
	
	});
 
	
});