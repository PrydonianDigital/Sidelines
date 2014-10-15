$(function() {

	var width = $('.orbit-slides-container').width(),
		height = $('.orbit-slides-container').height();
	$('.youtube-player').wrap('<div class="flex-video"></div>');
	$('.newsStory .content').hide();
	$('.whatWeDoContent').hide();
	$('.whatWeDoContent:first-child').show();
	$('#whatWeDo .quote[data-quote="casting"]').show();
	$('.whatWeDo:first-child .title').addClass('active');
	$('.newsStory').on('click', '.closed a', function(e){
		e.preventDefault();
		var thisID = $(this).attr('id'),
			thisLink = $(this).attr('href');
		//alert(thisID);
		$('div#'+thisID).load(thisLink+' #newsContent' )
		var $title = $(this).parent();
		if($title.hasClass('active')){
			$title.removeClass('active').addClass('closed');
		} else {
			$title.addClass('active').removeClass('closed');
		}
		$title.siblings().slideDown('slow');
		var sharecount = 'http://social-count.eu01.aws.af.cm/';
		$.each($('.sharing'), function(i,a) {
	    	var pageURL = $(this).attr('data-url');
	    	$.getJSON(sharecount+pageURL+'&callback=side', function(data){
	       		$('.tweetcount').html(data.tweets);
	       		$('.sharecount').html(data.shares);
	       		$('.onecount').html(data.plusones);
	    	});
	    });
	});
	$('.newsStory').on('click', '.active a', function(e){
		e.preventDefault();
		var thisID = $(this).attr('id'),
			thisLink = $(this).attr('href');
		var $title = $(this).parent();
		if($title.hasClass('active')){
			$title.removeClass('active').addClass('closed');
		} else {
			$title.addClass('active').removeClass('closed');
		}
		$title.siblings().slideUp('slow');
		$('div#'+thisID).empty();
	});
	$('.whatWeDo').on('click', 'a', function(e){
		e.preventDefault();
		$('.title').removeClass('active');
		var $title = $(this).parent(),
			$content = $(this).attr('id');
		//alert($content);
		if($title.hasClass('active')){
			$title.removeClass('active');
		} else {
			$title.addClass('active');
		}
		$('.whatWeDoContent').hide();
		$('.whatWeDoContent').hide();
		$('.whatWeDoContent[data-slug='+$content+']').slideDown('slow');
	});
	$('.orbit-prev').fadeOut("medium");
	$('.orbit-next').fadeOut("medium");
$('.orbit-container').hover(function() {
	$('.orbit-prev').fadeIn("medium");
	$('.orbit-next').fadeIn("medium");
	}, function() {			
	$('.orbit-prev').fadeOut("medium");
	$('.orbit-next').fadeOut("medium");
});
	$('.category-localisation-projects #menu-item-612').addClass('active');
	$('.what-we-do li:first-child').addClass('active');

	var what_first = $('.what-we-do li:first-child').data('slug');
	if(element_exists('#what')) {
		what_we_do(what_first);
	}
	$('.what-we-do').on('click', 'li', function(){
		var slug = $(this).data('slug');
		$('#what').empty();
		what_we_do(slug);
		$('.what-we-do li').removeClass('active');
		$(this).addClass('active');
	});
	if(element_exists('.single-projects')) {
		$('#menu-item-612').addClass('active');
	}
	$('.section.active .content').fadeIn('slow');
	if(element_exists('.quote')) {
		$( '#cbp-qtrotator' ).cbpQTRotator();
	}
	if(element_exists('.category-english-language-projects')) {
		$( '#back a' ).attr('href', '/work/english-language-projects');
	}
	if(element_exists('.category-localisation-projects')) {
		$( '#back a' ).attr('href', '/work/localisation-projects');
	}
	var sharecount = 'http://social-count.eu01.aws.af.cm/';
	$.each($('.sharing'), function(i,a) {
    	var pageURL = $(this).attr('data-url');
    	$.getJSON(sharecount+pageURL+'&callback=side', function(data){
       		$('.tweetcount').html(data.tweets);
       		$('.sharecount').html(data.shares);
       		$('.onecount').html(data.plusones);
    	});
    });
});

function what_we_do(slug) {
	var qu = '/api/get_post/?post_type=what-we-do&slug='+slug;
    $.getJSON(qu, function(data){
    	var what = '';
		$('#what').html('<h2>'+data.post.title_plain+'</h2><p><img src="'+data.post.thumbnail+'" /></p><h3>'+data.post.title_plain+'</h3>'+data.post.content);
    });	
}
function element_exists(id){
	if($(id).length > 0){
		return true;
	}
	return false;
}

(function(c,b,e){var d=b.Modernizr;c.CBPQTRotator=function(f,g){this.$el=c(g);this._init(f)};c.CBPQTRotator.defaults={speed:700,easing:"ease",interval:8000};c.CBPQTRotator.prototype={_init:function(f){this.options=c.extend(true,{},c.CBPQTRotator.defaults,f);this._config();this.$items.eq(this.current).addClass("cbp-qtcurrent");if(this.support){this._setTransition()}this._startRotator()},_config:function(){this.$items=this.$el.children("div.cbp-qtcontent");this.itemsCount=this.$items.length;this.current=0;this.support=d.csstransitions;if(this.support){this.$progress=c('<span class="cbp-qtprogress"></span>').appendTo(this.$el)}},_setTransition:function(){setTimeout(c.proxy(function(){this.$items.css("transition","opacity "+this.options.speed+"ms "+this.options.easing)},this),25)},_startRotator:function(){if(this.support){this._startProgress()}setTimeout(c.proxy(function(){if(this.support){this._resetProgress()}this._next();this._startRotator()},this),this.options.interval)},_next:function(){this.$items.eq(this.current).removeClass("cbp-qtcurrent");this.current=this.current<this.itemsCount-1?this.current+1:0;this.$items.eq(this.current).addClass("cbp-qtcurrent")},_startProgress:function(){setTimeout(c.proxy(function(){this.$progress.css({transition:"width "+this.options.interval+"ms linear",width:"100%"})},this),25)},_resetProgress:function(){this.$progress.css({transition:"none",width:"0%"})},destroy:function(){if(this.support){this.$items.css("transition","none");this.$progress.remove()}this.$items.removeClass("cbp-qtcurrent").css({position:"relative","z-index":100,"pointer-events":"auto",opacity:1})}};var a=function(f){if(b.console){b.console.error(f)}};c.fn.cbpQTRotator=function(g){if(typeof g==="string"){var f=Array.prototype.slice.call(arguments,1);this.each(function(){var h=c.data(this,"cbpQTRotator");if(!h){a("cannot call methods on cbpQTRotator prior to initialization; attempted to call method '"+g+"'");return}if(!c.isFunction(h[g])||g.charAt(0)==="_"){a("no such method '"+g+"' for cbpQTRotator instance");return}h[g].apply(h,f)})}else{this.each(function(){var h=c.data(this,"cbpQTRotator");if(h){h._init()}else{h=c.data(this,"cbpQTRotator",new c.CBPQTRotator(g,this))}})}return this}})(jQuery,window);