!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){var b="waitForImages";a.waitForImages={hasImageProperties:["backgroundImage","listStyleImage","borderImage","borderCornerImage","cursor"],hasImageAttributes:["srcset"]},a.expr[":"]["has-src"]=function(b){return a(b).is('img[src][src!=""]')},a.expr[":"].uncached=function(b){return a(b).is(":has-src")?!b.complete:!1},a.fn.waitForImages=function(){var c,d,e,f=0,g=0,h=a.Deferred();if(a.isPlainObject(arguments[0])?(e=arguments[0].waitForAll,d=arguments[0].each,c=arguments[0].finished):1===arguments.length&&"boolean"===a.type(arguments[0])?e=arguments[0]:(c=arguments[0],d=arguments[1],e=arguments[2]),c=c||a.noop,d=d||a.noop,e=!!e,!a.isFunction(c)||!a.isFunction(d))throw new TypeError("An invalid callback was supplied.");return this.each(function(){var i=a(this),j=[],k=a.waitForImages.hasImageProperties||[],l=a.waitForImages.hasImageAttributes||[],m=/url\(\s*(['"]?)(.*?)\1\s*\)/g;e?i.find("*").addBack().each(function(){var b=a(this);b.is("img:has-src")&&!b.is("[srcset]")&&j.push({src:b.attr("src"),element:b[0]}),a.each(k,function(a,c){var d,e=b.css(c);if(!e)return!0;for(;d=m.exec(e);)j.push({src:d[2],element:b[0]})}),a.each(l,function(a,c){var d=b.attr(c);return d?void j.push({src:b.attr("src"),srcset:b.attr("srcset"),element:b[0]}):!0})}):i.find("img:has-src").each(function(){j.push({src:this.src,element:this})}),f=j.length,g=0,0===f&&(c.call(i[0]),h.resolveWith(i[0])),a.each(j,function(e,j){var k=new Image,l="load."+b+" error."+b;a(k).one(l,function m(b){var e=[g,f,"load"==b.type];return g++,d.apply(j.element,e),h.notifyWith(j.element,e),a(this).off(l,m),g==f?(c.call(i[0]),h.resolveWith(i[0]),!1):void 0}),j.srcset&&(k.srcset=j.srcset),k.src=j.src})}),h.promise()}});


					$.fn.isOnScreen = function(){

    var win = $(window);

    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height() - (win.height() / 3);

    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

};

$('html').click(function() {
 		$('.hamburger').removeClass('is-active');
		$('.nav-bar').removeClass('is-active');
});

$('.nav-bar').click(function(event){
    event.stopPropagation();
});


	function loadArticle(pageNumber) {
    $.ajax({
        url: "http://gdufour.twkmedia.eu//wp-admin/admin-ajax.php",
        type:'POST',
          beforeSend: function (request) {
          request.setRequestHeader("Authorization", "Negotiate");
        },
        data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=loop',
        success: function(html){
						console.info('success');
						$("#infinite-scroll").append(html);    // This will be the div where our content will be loaded
						$( '.off-screen' ).each(function( index ) {
						if ($(this).isOnScreen()) {
            $(this).removeClass('off-screen');
        }

});
        },
		error: function(error){
			console.info(error);
		}
    });
    return false;
}

// $(window).scroll(function(){
// 	if  ($(window).scrollTop() >= $(document).height() - $(window).height() - 400){
// 		loadArticle(count);
// 		count++;
// 	}
// });


function view_more_projects(){
	loadArticle($count);
	console.info("COUNT: " + $count);
	$count++;
};




// LOAD PAGES WITH AJAX
// Barba.Pjax.start();

var FadeTransition = Barba.BaseTransition.extend({
  start: function() {
    /**
     * This function is automatically called as soon the Transition starts
     * this.newContainerLoading is a Promise for the loading of the new container
     * (Barba.js also comes with an handy Promise polyfill!)
     */

    // As soon the loading is finished and the old page is faded out, let's fade the new page
    Promise
      .all([this.newContainerLoading, this.fadeOut()])
      .then(this.fadeIn.bind(this));
  },

  fadeOut: function() {
    /**
     * this.oldContainer is the HTMLElement of the old Container
     */
	  // get distance from top of .next-project
//	  var distNext = $('.next-project').offset().top;
//	  distNext -= 115;
//	  $('.next-project').css('transform', 'translateY(-' +distNext+ 'px)');
//	   $('html, body').animate({
//          scrollTop: 0
//        }, 600);
	  //transform to top
//	  setTimeout(function(){ return $(this.oldContainer).animate({ opacity: 0 }).promise(); }, 800);
return $(this.oldContainer).animate({ opacity: 0 }).promise();
  },

  fadeIn: function() {
    /**
     * this.newContainer is the HTMLElement of the new Container
     * At this stage newContainer is on the DOM (inside our #barba-container and with visibility: hidden)
     * Please note, newContainer is available just after newContainerLoading is resolved!
     */

    var _this = this;
    var $el = $(this.newContainer);
$(this.oldContainer).hide();
	   $('html, body').animate({
          scrollTop: 0
        }, 200);

    $el.css({
      visibility : 'visible',
      opacity : 0
    });

    $el.animate({ opacity: 1 }, 600, function() {
      /**
       * Do not forget to call .done() as soon your transition is finished!
       * .done() will automatically remove from the DOM the old Container
       */

      _this.done();
    });
  }
});

/**
 * Next step, you have to tell Barba to use the new Transition
 */

Barba.Pjax.getTransition = function() {
  /**
   * Here you can use your own logic!
   * For example you can use different Transition based on the current page or link...
   */

  return FadeTransition;
};

	Barba.Dispatcher.on('newPageReady' , function() {

on_load_functions();
		console.info('new page loaded');
		$('.hamburger').removeClass('is-active');
		$('.nav-bar').removeClass('is-active');
		$( '.off-screen' ).each(function( index ) {
     if ($(this).isOnScreen()) {
            $(this).removeClass('off-screen');
        }

});
	});



function on_load_functions(){


 $count = 2;


	$('.fade-in').waitForImages({
    finished:function(){$('.fade-in').css('opacity',1);},
    waitForAll:true
});

$( '.off-screen' ).each(function( index ) {
     if ($(this).isOnScreen()) {
            $(this).removeClass('off-screen');
        }

});


	$('.fade-in').waitForImages({
    finished:function(){$('.fade-in').css('opacity',1);},
    waitForAll:true
});



	  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		var offset = 60;
		if($(window).width() < 1100){
			offset = 70;
		}
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top - offset
        }, 1000);
        return false;
      }
    }
  });

	if($('.twitter-carousel .tweets').length){
	$('.twitter-carousel .tweets').slick({
	arrows: false,
		dots: true
	});
	}

	if(typeof google !== 'undefined' && $(".map-contain")[0]){
		function initialize() {

		var image = '../wp-content/themes/Loop/assets/img/pin.svg';
		var myLatlng = new google.maps.LatLng(44.414637, 8.947088);

		var draggable = true;
		if($(window).width() < 1100){
			draggable = false;
		}
		var zoom = 15;
		var mapOptions = {
			zoom: zoom,
			center: myLatlng,
			scrollwheel: false,
			draggable: draggable,
			styles: [{"featureType":"all","elementType":"labels","stylers":[{"lightness":63},{"hue":"#ccc"}]},{"featureType":"administrative","elementType":"all","stylers":[{"hue":"#000bff"},{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"labels","stylers":[{"color":"#4a4a4a"},{"visibility":"on"}]},{"featureType":"administrative","elementType":"labels.text","stylers":[{"weight":"0.01"},{"color":"#727272"},{"visibility":"on"}]},{"featureType":"administrative.country","elementType":"labels","stylers":[{"color":"#ccc"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"color":"#ccc"}]},{"featureType":"administrative.province","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"color":"#545454"}]},{"featureType":"administrative.locality","elementType":"labels.text","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text","stylers":[{"color":"#7c7c7c"},{"weight":"0.01"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text","stylers":[{"color":"#404040"}]},{"featureType":"landscape","elementType":"all","stylers":[{"lightness":16},{"hue":"#ccc"},{"saturation":-61}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"color":"#828282"},{"weight":"0.01"}]},{"featureType":"poi.government","elementType":"labels.text","stylers":[{"color":"#4c4c4c"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"hue":"#00ff91"}]},{"featureType":"poi.park","elementType":"labels.text","stylers":[{"color":"#7b7b7b"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"color":"#999999"},{"visibility":"on"},{"weight":"0.01"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"hue":"#ccc"},{"lightness":53}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"color":"#626262"}]},{"featureType":"transit","elementType":"labels.text","stylers":[{"color":"#676767"},{"weight":"0.01"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#0055ff"}]}]
		}
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			icon: image,
		});
	}
//	google.maps.event.addDomListener(window, 'load', initialize);
		initialize();
	}
}



on_load_functions();



$('.hamburger').on('click',function(){
	$(this).toggleClass('is-active');
		$('.nav-bar').toggleClass('is-active');

});

//$('.next-project').on('click',function(){
//		  var distNext = $('.next-project').offset().top;
////	  distNext -= 115;
////	  $('.next-project').css('transform', 'translateY(-' +distNext+ 'px)');
//	   $('html, body').animate({
//          scrollTop: distNext - 110
//        }, 600);
//	  //transform to top
//	  setTimeout(function(){ $('.next-project').addClass('fixed').promise(); $('html, body').animate({
//          scrollTop: 0
//        }, 0);}, 600);
//	  setTimeout(function(){ return $('.next-project').removeClass('fixed').promise(); }, 1200);
//
//});


	$(window).scroll(function() {
		$( '.off-screen' ).each(function( index ) {
		if ($(this).isOnScreen()) {
		  $(this).removeClass('off-screen');
		}

});

		//if home page and you scrolled past 100vh add grey else remove
		if ( $( ".home .main-logo" ).length ) {
		if($(window).scrollTop() > window.innerHeight - 100){
			console.info('below banner');
			$('.home .main-logo').addClass('grey');
		}else{
			$('.home .main-logo').removeClass('grey');
		}
		}

		if ( $( ".single-case-studies .main-logo" ).length ) {
		if($(window).scrollTop() > (window.innerWidth / 3)  - 100){
			console.info('below banner');
			$('.single-case-studies .main-logo').addClass('grey');
		}else{
			$('.single-case-studies .main-logo').removeClass('grey');
		}
		}
});


window.onload = function () {
	setTimeout(function(){
		hideOverlay();
	}, 1000);
}
function hideOverlay(){
	console.log('hiding');
	$('.loading-overlay').addClass('fade-loading-overlay');
	setTimeout(function(){
		$('.loading-overlay').addClass('hide-loading-overlay');
	},300);
}
