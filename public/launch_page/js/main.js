"use strict";(function($){if(window.isMobile={Android:function(){return navigator.userAgent.match(/Android/i)},BlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i)},iOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i)},Opera:function(){return navigator.userAgent.match(/Opera Mini/i)},Windows:function(){return navigator.userAgent.match(/IEMobile/i)},any:function(){return isMobile.Android()||isMobile.BlackBerry()||isMobile.iOS()||isMobile.Opera()||isMobile.Windows()}},window.isIE=/(MSIE|Trident\/|Edge\/)/i.test(navigator.userAgent),window.windowHeight=window.innerHeight,window.windowWidth=window.innerWidth,$("#fss-bg").length){var initialise=function(){scene.add(mesh),scene.add(light),container.appendChild(renderer.element),window.addEventListener("resize",resize)},resize=function(){renderer.setSize(container.offsetWidth,container.offsetHeight)},animate=function e(){now=Date.now()-start,light.setPosition(300*Math.sin(.001*now),200*Math.cos(5e-4*now),60),renderer.render(scene),requestAnimationFrame(e)},container=$("#fss-bg")[0],renderer=new FSS.CanvasRenderer,scene=new FSS.Scene,light=new FSS.Light("#111122","#FF0022"),geometry=new FSS.Plane(window.innerWidth,window.innerHeight,6,4),material=new FSS.Material("#FFFFFF","#FFFFFF"),mesh=new FSS.Mesh(geometry,material),now,start=Date.now();initialise(),resize(),animate()}var default_effect={particles:{number:{value:80,density:{enable:!0,value_area:800}},color:{value:"#ffffff"},shape:{type:"circle",stroke:{width:0,color:"#000000"},polygon:{nb_sides:5}},opacity:{value:.5,random:!1,anim:{enable:!1,speed:1,opacity_min:.1,sync:!1}},size:{value:3,random:!0,anim:{enable:!1,speed:40,size_min:.1,sync:!1}},line_linked:{enable:!0,distance:150,color:"#ffffff",opacity:.4,width:1},move:{enable:!0,speed:6,direction:"none",random:!1,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!0,mode:"repulse"},onclick:{enable:!0,mode:"push"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:400,size:40,duration:2,opacity:8,speed:3},repulse:{distance:200,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0},star_effect={particles:{number:{value:250,density:{enable:!0,value_area:800}},color:{value:"#ffffff"},shape:{type:"circle",stroke:{width:0,color:"#000000"},polygon:{nb_sides:5},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:.5,random:!1,anim:{enable:!1,speed:1,opacity_min:.1,sync:!1}},size:{value:1,random:!0,anim:{enable:!0,speed:7.192807192807193,size_min:.1,sync:!1}},line_linked:{enable:!1,distance:1,color:"#ffffff",opacity:.25,width:1},move:{enable:!0,speed:1,direction:"none",random:!1,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!1,mode:"grab"},onclick:{enable:!1,mode:"push"},resize:!0},modes:{grab:{distance:150,line_linked:{opacity:.5}},bubble:{distance:400,size:40,duration:2,opacity:8,speed:3},repulse:{distance:200,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0},snow_effect={particles:{number:{value:400,density:{enable:!0,value_area:800}},color:{value:"#fff"},shape:{type:"circle",stroke:{width:0,color:"#000000"},polygon:{nb_sides:5},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:.5,random:!0,anim:{enable:!1,speed:1,opacity_min:.1,sync:!1}},size:{value:10,random:!0,anim:{enable:!1,speed:40,size_min:.1,sync:!1}},line_linked:{enable:!1,distance:500,color:"#ffffff",opacity:.4,width:2},move:{enable:!0,speed:6,direction:"bottom",random:!1,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!0,mode:"bubble"},onclick:{enable:!0,mode:"repulse"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:.5}},bubble:{distance:400,size:4,duration:.3,opacity:1,speed:3},repulse:{distance:200,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0},bubble_effect={particles:{number:{value:6,density:{enable:!0,value_area:800}},color:{value:"#1b1e34"},shape:{type:"polygon",stroke:{width:0,color:"#000"},polygon:{nb_sides:12},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:.3,random:!0,anim:{enable:!1,speed:1,opacity_min:.1,sync:!1}},size:{value:160,random:!1,anim:{enable:!0,speed:10,size_min:40,sync:!1}},line_linked:{enable:!1,distance:200,color:"#ffffff",opacity:1,width:2},move:{enable:!0,speed:8,direction:"none",random:!1,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!1,mode:"grab"},onclick:{enable:!1,mode:"push"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:400,size:40,duration:2,opacity:8,speed:3},repulse:{distance:200,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0},nasa_effect={particles:{number:{value:160,density:{enable:!0,value_area:800}},color:{value:"#ffffff"},shape:{type:"circle",stroke:{width:0,color:"#000000"},polygon:{nb_sides:5},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:1,random:!0,anim:{enable:!0,speed:1,opacity_min:0,sync:!1}},size:{value:3,random:!0,anim:{enable:!1,speed:4,size_min:.3,sync:!1}},line_linked:{enable:!1,distance:150,color:"#ffffff",opacity:.4,width:1},move:{enable:!0,speed:1,direction:"none",random:!0,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:600}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!0,mode:"bubble"},onclick:{enable:!0,mode:"repulse"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:250,size:0,duration:2,opacity:0,speed:3},repulse:{distance:400,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0};if($("#particles-js").length){var _particles_effect=default_effect,_effect_data=$("#particles-js").data("effect");switch(_effect_data){case"star":_particles_effect=star_effect;break;case"nasa":_particles_effect=nasa_effect;break;case"bubble":_particles_effect=bubble_effect;break;case"snow":_particles_effect=snow_effect;break;default:_particles_effect=default_effect}particlesJS("particles-js",_particles_effect)}if($(".quietflow").length){var optData=eval("("+$(".quietflow").attr("data-options")+")"),optDefault={theme:"bouncingBalls",specificColors:["rgba(255, 214, 108, .5)","rgba(192, 55, 23, .5)","rgba(255, 153, 53, .5)","rgba(141, 16, 12, .5)","rgba(53, 71, 45, .5)"],backgroundCol:"#333"},options=$.extend(optDefault,optData);$("body").quietflow(options)}$(".ribbons-bg").length&&new Ribbons({colorSaturation:"60%",colorBrightness:"50%",colorAlpha:.5,colorCycleSpeed:5,verticalPosition:"random",horizontalSpeed:200,ribbonCount:3,strokeSize:0,parallaxAmount:-.2,animateSections:!0});var smokyBG=$("#smoky-bg").waterpipe({gradientStart:"#51ff00",gradientEnd:"#001eff",smokeOpacity:.1,numCircles:1,maxMaxRad:"auto",minMaxRad:"auto",minRadFactor:0,iterations:8,drawsPerFrame:10,lineWidth:2,speed:10,bgColorInner:"#292929",bgColorOuter:"#111"});$(".vegas-container").each((function(){var self=$(this),optData=eval("("+self.attr("data-options")+")"),optDefault={overlay:!0,transition:"fade",transitionDuration:4e3,delay:1e4,animation:"random",animationDuration:2e4,slides:[{src:"https://picsum.photos/1000/800"},{src:"https://picsum.photos/1000/801"},{src:"https://picsum.photos/1000/802"}]},options=$.extend(optDefault,optData);self.vegas(options)})),$(".player").mb_YTPlayer({showControls:!1,ratio:"auto",loop:!0,autoPlay:!0,mute:!0}),$(".countdown__module").each((function(){var e=$(this),t=e.attr("data-date"),a=e.html();e.countdown(t,(function(t){e.html(t.strftime(a))})).removeClass("hide")}))})(jQuery);