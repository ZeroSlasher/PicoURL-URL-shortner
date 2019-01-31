/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Dropdown
5. Init SVG
6. Init Magic


******************************/
$(document).ready(function()
{
	"use strict";

	/*

	1. Vars and Inits

	*/

	var header = $('.header');
	var ctrl = new ScrollMagic.Controller();

	setHeader();

	$(window).on('resize', function()
	{
		setHeader();

		setTimeout(function()
		{
			$(window).trigger('resize.px.parallax');
		}, 375);
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	initMenu();
	initDropdown();
	initSvg();
	initMagic();

	/*

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 91)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/*

	3. Init Menu

	*/

	function initMenu()
	{
		var hamb = $('.hamburger');
		var menu = $('.menu');
		var menuOverlay = $('.menu_overlay');
		var menuClose = $('.menu_close_container');

		hamb.on('click', function()
		{
			menu.toggleClass('active');
			menuOverlay.toggleClass('active');
		});

		menuOverlay.on('click', function()
		{
			menuOverlay.toggleClass('active');
			menu.toggleClass('active');
		});

		menuClose.on('click', function()
		{
			menuOverlay.toggleClass('active');
			menu.toggleClass('active');
		});
	}

	/*

	4. Init Dropdown

	*/

	function initDropdown()
	{
		if($('.domain_search_dropdown').length)
		{
			var dd = $('.domain_search_dropdown');
			var ddItems = $('.domain_search_dropdown ul li');
			var ddSelected = $('.domain_search_selected');
			dd.on('click', function()
			{
				dd.toggleClass('active');
			});
			ddItems.on('click', function()
			{
				var selectedDomain = $(this).text();
				ddSelected.text(selectedDomain);
			});
		}
	}

	/*

	5. Init SVG

	*/

	function initSvg()
	{
		jQuery('img.svg').each(function()
		{
			var $img = jQuery(this);
			var imgID = $img.attr('id');
			var imgClass = $img.attr('class');
			var imgURL = $img.attr('src');

			jQuery.get(imgURL, function(data)
			{
				// Get the SVG tag, ignore the rest
				var $svg = jQuery(data).find('svg');

				// Add replaced image's ID to the new SVG
				if(typeof imgID !== 'undefined') {
					$svg = $svg.attr('id', imgID);
				}
				// Add replaced image's classes to the new SVG
				if(typeof imgClass !== 'undefined') {
					$svg = $svg.attr('class', imgClass+' replaced-svg');
				}

				// Remove any invalid XML tags as per http://validator.w3.org
				$svg = $svg.removeAttr('xmlns:a');

				// Replace image with new SVG
				$img.replaceWith($svg);
			}, 'xml');
		});
	}

	/*

	6. Init Magic

	*/

	function initMagic()
	{
		if($('.magic_fade_in').length)
		{
			var magic = $('.magic_fade_in');
			magic.each(function()
			{
				var ele = this;
				var smScene = new ScrollMagic.Scene(
					{
						triggerElement:ele,
						triggerHook:'onEnter',
						offset: 130,
						reverse:false
					})
					.setTween(TweenMax.from(ele, 0.5, {autoAlpha:0, ease: Power1.easeIn}))
					.addTo(ctrl);
				});
			}
		}


		$("#form").on("submit", function(e)
		{
			e.preventDefault();
			var url = $("#url").val();
			var alt = $("#alt").val();
			if(alt==""){
				alt = 'err';
			}
			if(url == '')
			{
				$("#head").show().delay(1000).fadeOut();
			}
			else
			{
				var alphaExp = /[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*$)/;
				if(alphaExp.test(url) )
				{
					$.ajax({
						url:'shortner.php',
						type:'POST',
						data:{'url':url,'alt':alt},
						success:function(data)
						{
							$("#surl").html(data).fadeIn();
							console.log(data);
						}
					});
				}
				else
				{
					$("#p1").show().delay(1000).fadeOut();
				}
			}
		});

		$("#chngpwd").on("submit", function(e)
		{
			e.preventDefault();
			var curpass = $("#curpass").val();
			var npass = $("#npass").val();
			var cpass = $("#cpass").val();

			if(curpass.length == 0 || npass.length == 0 || cpass.length == 0){
				$("#head1").show().delay(1000).fadeOut();
			}
			else if(npass==cpass){
					$.ajax({
						url:'chngpwd.php',
						type:'POST',
						data:{'curpass':curpass,'npass':npass},
						success:function(data)
						{
							if(data=="001"){
								$("#right").show().delay(1000).fadeOut();

							}
							else if(data=="err")
							{
								$("#wrong").show().delay(1000).fadeOut();
							}
							else {

							}
						}
					});
				}

			});

		$(".urlupdate").on("click", function(){
				var urlid = $(this).data("urlid"); //why this?
				var url = $("#url"+urlid).val();
				var token = $("#token"+urlid).val();

				//ajax call
	$.ajax({
		url:'updateurl.php',
		type:'POST',
		data:{'url':url,'token':token, 'urlid':urlid},
		success:function(data)
		{
			if(data=="1"){
				$("#success").show().delay(1000).fadeOut();

			}
			else if(data=="2")
			{
				$("#exist").show().delay(1000).fadeOut();
			}
			else if(data=="0"){
				$("#fail").show().delay(1000).fadeOut();
			}
			else{
				//no code
			}
		}
		});
	});

//document ready event handler
});

// $("#registrationForm").on("submit", function(e)
// {
// 	e.preventDefault();
// 	var first_name = $("#first_name").val();
// 	var last_name = $("#last_name").val();
// 	var mobile = $("#mobile").val();
// 	// var photo = $("#photo").val();
//
// 			$.ajax({
// 				url:'prof_update.php',
// 				type:'POST',
// 				data:{'first_name':first_name,'last_name':last_name,'mobile':mobile},
// 				success:function(data)
// 				{
// 					if(data=="001"){
// 						$("#rightp").show().delay(1000).fadeOut();
//
// 					}
// 					else if(data=="err")
// 					{
// 						$("#wrongp").show().delay(1000).fadeOut();
// 					}
// 					else {
//
// 					}
// 				}
// 			});
//
// 	});
