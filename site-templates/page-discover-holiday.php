<?php get_header(); ?>

<!--[if IE]>
    <script type="text/javascript">
    	 var console = { log: function() {} };
    </script>
<![endif]-->


<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

<script type="text/javascript">

/**
 * fullPage 1.4.6
 * https://github.com/alvarotrigo/fullPage.js
 * MIT licensed
 *
 * Copyright (C) 2013 alvarotrigo.com - A project by Alvaro Trigo
 */
(function(b){b.fn.fullpage=function(c){function h(a){if(c.autoScrolling){a=window.event||a;a=Math.max(-1,Math.min(1,a.wheelDelta||-a.detail));var e;e=b(".section.active");if(!l)if(e=e.find(".slides").length?e.find(".slide.active").find(".scrollable"):e.find(".scrollable"),0>a)if(0<e.length)if(s("bottom",e))b.fn.fullpage.moveSlideDown();else return!0;else b.fn.fullpage.moveSlideDown();else if(0<e.length)if(s("top",e))b.fn.fullpage.moveSlideUp();else return!0;else b.fn.fullpage.moveSlideUp();return!1}}
function D(){document.addEventListener?(document.addEventListener("mousewheel",h,!1),document.addEventListener("DOMMouseScroll",h,!1)):document.attachEvent("onmousewheel",h)}function k(a,e){var d={},f;f=a.position();var x=null!==f?f.top:null,n=E(a),m=a.data("anchor"),g=a.index(".section"),h=b(".section.active").index(".section")+1;a.addClass("active").siblings().removeClass("active");l=!0;b.isFunction(e)||(location.hash="undefined"!==typeof m?m:"");c.autoScrolling?(d.top=-x,f="#superContainer"):(d.scrollTop=
x,f="html, body");c.css3&&c.autoScrolling?(b.isFunction(c.onLeave)&&c.onLeave.call(this,h,n),y("translate3d(0px, -"+x+"px, 0px)",!0),setTimeout(function(){b.isFunction(c.afterLoad)&&c.afterLoad.call(this,m,g+1);setTimeout(function(){l=!1;b.isFunction(e)&&e.call(this)},F)},c.scrollingSpeed)):(b.isFunction(c.onLeave)&&c.onLeave.call(this,h,n),b(f).animate(d,c.scrollingSpeed,c.easing,function(){b.isFunction(c.afterLoad)&&c.afterLoad.call(this,m,g+1);setTimeout(function(){l=!1;b.isFunction(e)&&e.call(this)},
F)}));t=m;c.autoScrolling&&(G(m),H(m,g))}function q(a,e){var d=e.position(),f=a.find(".slidesContainer").parent(),g=e.index(),n=a.closest(".section"),m=n.index(),h=n.data("anchor"),l=n.find(".fullPage-slidesNav"),k=e.data("anchor");e.addClass("active").siblings().removeClass("active");"undefined"===typeof k&&(k=g);n.hasClass("active")&&(c.loopHorizontal||(n.find(".controlArrow.prev").toggle(0!=g),n.find(".controlArrow.next").toggle(!e.is(":last-child"))),location.hash=g?("undefined"!==typeof h?h:
"")+"/"+k:location.hash.split("/")[0]);c.css3?(d="translate3d(-"+d.left+"px, 0px, 0px)",a.find(".slidesContainer").addClass("easing").css({"-webkit-transform":d,"-moz-transform":d,"-ms-transform":d,transform:d}),setTimeout(function(){b.isFunction(c.afterSlideLoad)&&c.afterSlideLoad.call(this,h,m+1,k,g);r=!1},c.scrollingSpeed)):f.animate({scrollLeft:d.left},c.scrollingSpeed,function(){b.isFunction(c.afterSlideLoad)&&c.afterSlideLoad.call(this,h,m+1,k,g);r=!1});l.find(".active").removeClass("active");
l.find("li").eq(g).find("a").addClass("active")}function I(){var a=b(window).width();g=b(window).height();c.resize&&O(g,a);b(".section").each(function(){parseInt(b(this).css("padding-bottom"));parseInt(b(this).css("padding-top"));if(c.scrollOverflow){var a=b(this).find(".slide");a.length?a.each(function(){u(b(this))}):u(b(this))}c.verticalCentered&&b(this).find(".tableCell").css("height",g+"px");b(this).css("height",g+"px");a=b(this).find(".slides");a.length&&q(a,a.find(".slide.active"))});b(".section.active").position();
a=b(".section.active");a.index(".section")&&k(a)}function O(a,e){var c=825,f=a;825>a||900>e?(900>e&&(f=e,c=900),c=(100*f/c).toFixed(2),b("body").css("font-size",c+"%")):b("body").css("font-size","100%")}function H(a,e){c.navigation&&(b("#fullPage-nav").find(".active").removeClass("active"),a?b("#fullPage-nav").find('a[href="#'+a+'"]').addClass("active"):b("#fullPage-nav").find("li").eq(e).find("a").addClass("active"))}function G(a){c.menu&&(b(c.menu).find(".active").removeClass("active"),b(c.menu).find('[data-menuanchor="'+
a+'"]').addClass("active"))}function s(a,b){if("top"===a)return!b.scrollTop();if("bottom"===a)return b.scrollTop()+b.innerHeight()>=b[0].scrollHeight}function E(a){var c=b(".section.active").index(".section");a=a.index(".section");return c>a?"up":"down"}function u(a){a.css("overflow","hidden");var b=a.closest(".section"),d=a.find(".scrollable");(d.length?a.find(".scrollable").get(0).scrollHeight-parseInt(b.css("padding-bottom"))-parseInt(b.css("padding-top")):a.get(0).scrollHeight-parseInt(b.css("padding-bottom"))-
parseInt(b.css("padding-top")))>g?(b=g-parseInt(b.css("padding-bottom"))-parseInt(b.css("padding-top")),d.length?d.css("height",b+"px").parent().css("height",b+"px"):(c.verticalCentered?a.find(".tableCell").wrapInner('<div class="scrollable" />'):a.wrapInner('<div class="scrollable" />'),a.find(".scrollable").slimScroll({height:b+"px",size:"10px",alwaysVisible:!0}))):(a.find(".scrollable").children().first().unwrap().unwrap(),a.find(".slimScrollBar").remove(),a.find(".slimScrollRail").remove());a.css("overflow",
"")}function J(a){a.addClass("table").wrapInner('<div class="tableCell" style="height:'+g+'px;" />')}function y(a,c){b("#superContainer").toggleClass("easing",c);b("#superContainer").css({"-webkit-transform":a,"-moz-transform":a,"-ms-transform":a,transform:a})}function K(a,c){var d=b('[data-anchor="'+a+'"]');a!==t?k(d,function(){L(d,c)}):L(d,c)}function L(a,b){if("undefined"!=typeof b){var c=a.find(".slides"),f=c.find('[data-anchor="'+b+'"]');f.length||(f=c.find(".slide").eq(b));q(c,f)}}function P(a,
b){a.append('<div class="fullPage-slidesNav"><ul></ul></div>');var d=a.find(".fullPage-slidesNav");d.addClass(c.slidesNavPosition);for(var f=0;f<b;f++)d.find("ul").append('<li><a href="#"><span></span></a></li>');d.css("margin-left","-"+d.width()/2+"px");d.find("li").first().find("a").addClass("active")}function Q(){var a=document.createElement("p"),b,c={webkitTransform:"-webkit-transform",OTransform:"-o-transform",msTransform:"-ms-transform",MozTransform:"-moz-transform",transform:"transform"};document.body.insertBefore(a,
null);for(var f in c)void 0!==a.style[f]&&(a.style[f]="translate3d(1px,1px,1px)",b=window.getComputedStyle(a).getPropertyValue(c[f]));document.body.removeChild(a);return void 0!==b&&0<b.length&&"none"!==b}c=b.extend({verticalCentered:!0,resize:!0,slidesColor:[],anchors:[],scrollingSpeed:700,easing:"easeInQuart",menu:!1,navigation:!1,navigationPosition:"right",navigationColor:"#000",navigationTooltips:[],slidesNavigation:!1,slidesNavPosition:"bottom",controlArrowColor:"#fff",loopBottom:!1,loopTop:!1,
loopHorizontal:!0,autoScrolling:!0,scrollOverflow:!1,css3:!1,paddingTop:0,paddingBottom:0,fixedElements:null,normalScrollElements:null,afterLoad:null,onLeave:null,afterRender:null,afterSlideLoad:null},c);var F=700;b.fn.fullpage.setAutoScrolling=function(a){c.autoScrolling=a;a=b(".section.active");c.autoScrolling?(b("html, body").css({overflow:"hidden",height:"100%"}),a.length&&(c.css3?(a="translate3d(0px, -"+a.position().top+"px, 0px)",y(a,!1)):b("#superContainer").css("top","-"+a.position().top+
"px"))):(b("html, body").css({overflow:"auto",height:"auto"}),c.css3?y("translate3d(0px, 0px, 0px)",!1):b("#superContainer").css("top","0px"),b("html, body").scrollTop(a.position().top))};var r=!1,z=navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|Windows Phone)/),g=b(window).height(),l=!1,t;D();c.css3&&(c.css3=Q());b("body").wrapInner('<div id="superContainer" />');if(c.navigation){b("body").append('<div id="fullPage-nav"><ul></ul></div>');var p=b("#fullPage-nav");p.css("color",c.navigationColor);
p.addClass(c.navigationPosition)}b(".section").each(function(a){var e=b(this).find(".slide"),d=e.length;a||b(this).addClass("active");b(this).css("height",g+"px");(c.paddingTop||c.paddingBottom)&&b(this).css("padding",c.paddingTop+" 0 "+c.paddingBottom+" 0");"undefined"!==typeof c.slidesColor[a]&&b(this).css("background-color",c.slidesColor[a]);"undefined"!==typeof c.anchors[a]&&b(this).attr("data-anchor",c.anchors[a]);if(c.navigation){var f="";c.anchors.length&&(f=c.anchors[a]);a=c.navigationTooltips[a];
"undefined"===typeof a&&(a="");p.find("ul").append('<li data-tooltip="'+a+'"><a href="#'+f+'"><span></span></a></li>')}if(0<d){var f=100*d,h=100/d;e.wrapAll('<div class="slidesContainer" />');e.parent().wrap('<div class="slides" />');b(this).find(".slidesContainer").css("width",f+"%");b(this).find(".slides").after('<div class="controlArrow prev"></div><div class="controlArrow next"></div>');b(this).find(".controlArrow.next").css("border-color","transparent transparent transparent "+c.controlArrowColor);
b(this).find(".controlArrow.prev").css("border-color","transparent "+c.controlArrowColor+" transparent transparent");c.loopHorizontal||b(this).find(".controlArrow.prev").hide();c.slidesNavigation&&P(b(this),d);e.each(function(a){a||b(this).addClass("active");b(this).css("width",h+"%");c.verticalCentered&&J(b(this))})}else c.verticalCentered&&J(b(this))}).promise().done(function(){b.fn.fullpage.setAutoScrolling(c.autoScrolling);b.isFunction(c.afterRender)&&c.afterRender.call(this);c.fixedElements&&
c.css3&&b(c.fixedElements).appendTo("body");c.navigation&&(p.css("margin-top","-"+p.height()/2+"px"),p.find("li").first().find("a").addClass("active"));c.menu&&c.css3&&b(c.menu).appendTo("body");if(c.scrollOverflow)b(window).on("load",function(){b(".section").each(function(){var a=b(this).find(".slide");a.length?a.each(function(){u(b(this))}):u(b(this))})});b(window).on("load",function(){var a=window.location.hash.replace("#","").split("/"),b=a[0],a=a[1];b&&K(b,a)})});var M,A=!1;b(window).scroll(function(a){if(!c.autoScrolling){var e=
b(window).scrollTop();a=b(".section").map(function(){if(b(this).offset().top<e+100)return b(this)});a=a[a.length-1];if(!a.hasClass("active")){A=!0;var d=E(a);b(".section.active").removeClass("active");a.addClass("active");var f=a.data("anchor");b.isFunction(c.onLeave)&&c.onLeave.call(this,a.index(".section"),d);b.isFunction(c.afterLoad)&&c.afterLoad.call(this,f,a.index(".section")+1);G(f);H(f,0);c.anchors.length&&!l&&(t=f,location.hash=f);clearTimeout(M);M=setTimeout(function(){A=!1},100)}}});var B=
0,v=0,C=0,w=0;b(document).on("touchmove",function(a){if(c.autoScrolling&&z&&(a.preventDefault(),a=a.originalEvent,!l))if(C=a.touches[0].pageY,w=a.touches[0].pageX,b(".section.active").find(".slides").length&&Math.abs(v-w)>Math.abs(B-C))v>w?b(".section.active").find(".controlArrow.next").trigger("click"):v<w&&b(".section.active").find(".controlArrow.prev").trigger("click");else if(a=b(".section.active").find(".scrollable"),B>C)if(0<a.length)if(s("bottom",a))b.fn.fullpage.moveSlideDown();else return!0;
else b.fn.fullpage.moveSlideDown();else if(0<a.length)if(s("top",a))b.fn.fullpage.moveSlideUp();else return!0;else b.fn.fullpage.moveSlideUp()});b(document).on("touchstart",function(a){c.autoScrolling&&z&&(a=a.originalEvent,B=a.touches[0].pageY,v=a.touches[0].pageX)});b.fn.fullpage.moveSlideUp=function(){var a=b(".section.active").prev(".section");c.loopTop&&!a.length&&(a=b(".section").last());(0<a.length||!a.length&&c.loopTop)&&k(a)};b.fn.fullpage.moveSlideDown=function(){var a=b(".section.active").next(".section");
c.loopBottom&&!a.length&&(a=b(".section").first());(0<a.length||!a.length&&c.loopBottom)&&k(a)};b.fn.fullpage.moveToSlide=function(a){var c="",c=isNaN(a)?b('[data-anchor="'+a+'"]'):b(".section").eq(a-1);0<c.length&&k(c)};b(window).on("hashchange",function(){if(!A){var a=window.location.hash.replace("#","").split("/"),b=a[0],a=a[1];(b&&b!==t||"undefined"!=typeof a&&!r)&&K(b,a)}});b(document).keydown(function(a){if(!l)switch(a.which){case 38:case 33:b.fn.fullpage.moveSlideUp();break;case 40:case 34:b.fn.fullpage.moveSlideDown();
break;case 37:b(".section.active").find(".controlArrow.prev").trigger("click");break;case 39:b(".section.active").find(".controlArrow.next").trigger("click")}});b(document).on("click","#fullPage-nav a",function(a){a.preventDefault();a=b(this).parent().index();k(b(".section").eq(a))});b(document).on({mouseenter:function(){var a=b(this).data("tooltip");b('<div class="fullPage-tooltip '+c.navigationPosition+'">'+a+"</div>").hide().appendTo(b(this)).fadeIn(200)},mouseleave:function(){b(this).find(".fullPage-tooltip").fadeOut().remove()}},
"#fullPage-nav li");c.normalScrollElements&&(b(document).on("mouseover",c.normalScrollElements,function(){document.addEventListener?(document.removeEventListener("mousewheel",h,!1),document.removeEventListener("DOMMouseScroll",h,!1)):document.detachEvent("onmousewheel",h)}),b(document).on("mouseout",c.normalScrollElements,function(){D()}));b(".section").on("click",".controlArrow",function(){if(!r){r=!0;var a=b(this).closest(".section").find(".slides"),c=a.find(".slide.active"),d=null,d=b(this).hasClass("prev")?
c.prev(".slide"):c.next(".slide");d.length||(d=b(this).hasClass("prev")?c.siblings(":last"):c.siblings(":first"));q(a,d)}});b(".section").on("click",".toSlide",function(a){a.preventDefault();a=b(this).closest(".section").find(".slides");a.find(".slide.active");var c=null,c=a.find(".slide").eq(b(this).data("index")-1);0<c.length&&q(a,c)});if(!z){var N;b(window).resize(function(){clearTimeout(N);N=setTimeout(I,500)})}b(window).bind("orientationchange",function(){I()});b(document).on("click",".fullPage-slidesNav a",
function(a){a.preventDefault();a=b(this).closest(".section").find(".slides");var c=a.find(".slide").eq(b(this).closest("li").index());q(a,c)})}})(jQuery);

</script>

<script type="text/javascript">
    $(document).ready(function() {
    	$.fn.fullpage({
    		slidesColor: ['#f2f2f2', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
    		anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage']
    	});
    });
</script>

<style>

/**
 * fullPage 1.4.5
 * https://github.com/alvarotrigo/fullPage.js
 * MIT licensed
 *
 * Copyright (C) 2013 alvarotrigo.com - A project by Alvaro Trigo
 */
body, html {
    margin:0;
    padding:0;
}
#superContainer {
    height:100%;
    position:relative;
}
.section{
    position: relative;
	-webkit-box-sizing: border-box; 
    -moz-box-sizing: border-box; 
         box-sizing: border-box; 
}
.slide {
    float: left;
}
.slide, .slidesContainer {
    height: 100%;
    display: block;
}
.slides {
	height: 100%;
    overflow: hidden;
    position: relative;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
}
.section.table,
.slide.table{
	display:table;
	width:100%;
}
.tableCell{
	display:table-cell;
	vertical-align: middle;
	width:100%;
	height: 100%;
}
.slidesContainer {
    float: left;
    position: relative;
}
.controlArrow{
    position:absolute;
    top:50%;
    cursor:pointer;
	width: 0px;
	height: 0px;
	border-style: solid;
	margin-top: -38px;
}

.controlArrow.prev{
	left:15px;
	width: 0px;
	border-width: 38.5px 34px 38.5px 0;
	border-color: transparent #fff transparent transparent;
}
.controlArrow.next{  
	right:15px;
	border-width: 38.5px 0 38.5px 34px;
	border-color: transparent transparent transparent #fff;
}
.scrollable{
	overflow:scroll;
}
.easing{
    -webkit-transition: all 0.7s ease-out;
    -moz-transition: all 0.7s ease-out;
    -o-transition: all 0.7s ease-out;
    transition: all 0.7s ease-out;
}
#fullPage-nav{
	position: fixed;
	z-index: 100;
	margin-top: -32px;
	top: 50%;
	opacity: 1;
}
#fullPage-nav.right{
	right: 17px;
}
#fullPage-nav.left{
	left: 17px;
}
.fullPage-slidesNav{
	position: absolute;
	z-index: 4;
	left: 50%;
	opacity: 1;
}
.fullPage-slidesNav.bottom{
	bottom: 17px;
}
.fullPage-slidesNav.top{
	top: 17px;
}
#fullPage-nav ul,
.fullPage-slidesNav ul{
	margin:0;
	padding:0;
}
#fullPage-nav li,
.fullPage-slidesNav li{
	display: block;
	width: 14px;
	height: 13px;
	margin: 7px;
	position:relative;
}
.fullPage-slidesNav li{
	display: inline-block;
}
#fullPage-nav li a,
.fullPage-slidesNav li a{
	display: block;
	position: relative;
	z-index: 1;
	width: 100%;
	height: 100%;
	cursor: pointer;
	text-decoration: none;
}
#fullPage-nav li .active span,
.fullPage-slidesNav .active span{
	background: #333;
}
#fullPage-nav span,
.fullPage-slidesNav span{
	top: 2px;
	left: 2px;
	width: 8px;
	height: 8px;
	border: 1px solid #000;
	background: rgba(0, 0, 0, 0);
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
	position: absolute;
	z-index: 1;
}
.fullPage-tooltip{
	position: absolute;
	color: #fff;
	font-size: 14px;
	font-family: arial, helvetica, sans-serif;
	top: -2px;
}
.fullPage-tooltip.right{
	right: 20px;
}
.fullPage-tooltip.left{
	left: 20px;
}

</style>

<div class="section active" id="section0"><h1>Section</h1></div>
<div class="section" id="section1">
    <div class="slide active"><div class="wrap"><h1>Hello fullPage.js</h1></div></div>
    <div class="slide"><h1>This is an awesome plugin</h1></div>
    <div class="slide"><h1>Which enables you to create awesome websites</h1></div>
    <div class="slide"><h1>In the most simple way ever</h1></div>
</div>
<div class="section" id="section2"><h1>Just testing it</h1></div>
<div class="section" id="section3"><h1>Looks good</h1></div>

<?php get_template_part('templates', 'underscore'); ?>


<?php get_footer(); ?>