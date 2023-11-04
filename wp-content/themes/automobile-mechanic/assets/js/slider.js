/**
 * Creating a slider
 * 
 **/
var $ = jQuery.noConflict();
$(function(){
	var pos = 0;
	var prev = 0;
	var next = 0;
	var hidden = 0;
	$('.slide-prev').on('click', function(){
		// console.log($(this).parent().find('.slide'));
		slide($(this).parent().find('.slides'), 0);
	});

	$('.slide-next').on('click', function(){
		// console.log($(this).parent().find('.slide'));
		slide($(this).parent().find('.slides'), 1);
	});

	var getClilds = function(parent){
		// console.log(parent.children());
		// console.log(parent.children().length);
		return parent.children().length;
	}

	var slide = function (parent, step){
		var totalItms = getClilds(parent);
		var parentWidth = parent.parent().outerWidth();
		var sliderWidth = parent.width();
		var itemWidth = parseInt(parent.children().first().width());
		itemWidth = itemWidth + parseInt(parent.children().first().css('margin-left')) + parseInt(parent.children().first().css('margin-right')) + parseInt(parent.children().first().css('padding-left')) + parseInt(parent.children().first().css('padding-right'));
		pos = parseInt(parent.css('left'));

		if(pos == 0 || isNaN(pos)){
			prev = 0 ;
		}else{
			prev = Math.abs(Math.round(pos / itemWidth));
		}
		var showing = Math.round(parentWidth / itemWidth);
		hidden = (totalItms - showing);

console.log(itemWidth);
console.log(prev);
		// if(sliderWidth > ((pos*-1) + (itemWidth*showing)) && pos <= 0){
		if(prev <= hidden-1 && step == 1){
			++prev;
			// pos = pos - itemWid
		}else if(prev > 0 &&  0===step){
			--prev;
			// pos = pos + itemWidth;
		}
		pos = prev * itemWidth;
		pos = pos * -1;
console.log(pos);
		parent.css('left', pos+'px');
	}
});






// slider script

$(document).ready(function() {
	var bigimage = $("#big");
	var thumbs = $("#thumbs");
	//var totalslides = 10;
	var syncedSecondary = true;

	bigimage
	.owlCarousel({
	items: 1,
	slideSpeed: 4000,
	nav: true,
	autoplay: true,
	dots: false,
	loop: true,
	responsiveRefreshRate: 200,
	navText: [
		'<i class="fa fa-arrow-left" aria-hidden="true"></i>',
		'<i class="fa fa-arrow-right" aria-hidden="true"></i>'
	]
	})
	.on("changed.owl.carousel", syncPosition);

	thumbs
	.on("initialized.owl.carousel", function() {
	thumbs
		.find(".owl-item")
		.eq(0)
		.addClass("current");
	})
	.owlCarousel({
	items: 5,
	dots: false,
	nav: true,
	navText: [
		'<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
		'<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
	],
	smartSpeed: 200,
	slideSpeed: 500,
	slideBy: 5,
	responsiveRefreshRate: 100
	})
	.on("changed.owl.carousel", syncPosition2);

	function syncPosition(el) {

	//to disable loop, comment this block
	var count = el.item.count - 1;
	var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

	if (current < 0) {
		current = count;
	}
	if (current > count) {
		current = 0;
	}
	//to this
	thumbs
		.find(".owl-item")
		.removeClass("current")
		.eq(current)
		.addClass("current");
	var onscreen = thumbs.find(".owl-item.active").length - 1;
	var start = thumbs
	.find(".owl-item.active")
	.first()
	.index();
	var end = thumbs
	.find(".owl-item.active")
	.last()
	.index();

	if (current > end) {
		thumbs.data("owl.carousel").to(current, 100, true);
	}
	if (current < start) {
		thumbs.data("owl.carousel").to(current - onscreen, 100, true);
	}
	}

	function syncPosition2(el) {
	if (syncedSecondary) {
		var number = el.item.index;
		bigimage.data("owl.carousel").to(number, 100, true);
	}
	}

	thumbs.on("click", ".owl-item", function(e) {
	e.preventDefault();
	var number = $(this).index();
	bigimage.data("owl.carousel").to(number, 300, true);
	});
});
