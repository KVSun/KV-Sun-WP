/*

    File Name: tpcrn_scripts.js

    Author : Raja CRN

	by ThemePacific

 */

 jQuery(document).ready(function () { 

 /*Create the dropdown bases thanks to @chriscoyier*/

jQuery(".mobile-nav").append('<select class="resp-nav container">');

	/* Create default option "Go to..."*/

	jQuery("<option />", {

	"selected": "selected",

	"value"   : "",

	"text"    : "Select Menu"

	}).appendTo(".mobile-nav select");

/* Populate dropdowns with the first menu items*/

jQuery(".mobile-nav li ").each(function() {

	var href = jQuery(this).children('a').attr('href');

	var text = jQuery(this).children('a').html();

	var depth = jQuery(this).parents('ul').length;

	text = (depth > 1) ?   ' &nbsp;&mdash; ' + text : text;

	text = (depth > 2) ?   '&nbsp;&nbsp;'+ text : text;

	text = (depth > 3) ?   '&nbsp;&nbsp;&nbsp;&mdash;'+ text : text;

	 jQuery(".mobile-nav select").append('<option value="' + href + '">' + text + '</option>');

});

/*make responsive dropdown menu actually work			*/

jQuery(".mobile-nav select").change(function() {

	window.location = jQuery(this).find("option:selected").val();

});



/*cat nav menu*/

 

jQuery(".mobile-nav ul li:has(ul)").addClass("parent"); 

 jQuery(".catnav li").hover(function () {

 jQuery(this).has('ul').addClass("dropme");

 jQuery(this).find('ul:first').css({display: "none"}).stop(true, true).slideDown(500);}, function () {

 jQuery(this).removeClass("dropme");

 jQuery(this).find('ul:first').css({display: "block"}).stop(true, true).slideUp(1000);

 });

});

