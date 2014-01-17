/**
 * jQuery slide it
 * @name slideit.jquery.js
 * @description simple slider
 * @author Christian Dave Bunales
 * @license Dual licensed under the MIT or GPL Version 2 licenses
 */
(function($){

	$.slideit = function(element,options){
		this.options = $.extend({}, $.slideit.defaultOptions, options); 
		element.data("rx",this.options.rx);
		element.data("ry",this.options.ry);
		element.data("ox",element.position().left);
		element.data("oy",element.position().top);
		element.data("dly",this.options.delay);
		element.css("left",element.position().left);
		element.css("top",element.position().top);
		
		element.mouseenter(
			function(event){
				var el = $(this);
				var xd = el.data("ox")+el.data("rx");
				var yd = el.data("oy")+el.data("ry");
				el.animate({
					"top": yd,
					"left": xd
				},el.data("dly"));
				
			}
		);
		element.mouseleave(
			function(event){
				var el = $(this);
				var xd = el.data("ox");
				var yd = el.data("oy");
				el.animate({
					"top": yd,
					"left": xd
				},el.data("dly"));
			}
		);
	}
	
	$.fn.slideit = function(options){
		return this.each(function(){
			(new $.slideit($(this),options));
		});
	}

	$.slideit.defaultOptions = {
		delay:1000,
		rx:0,
		ry:50
	};
})(jQuery);
