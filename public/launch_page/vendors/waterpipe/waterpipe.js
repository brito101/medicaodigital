!function(t,s,e,o){var a,n,h="waterpipe",l={gradientStart:"#000000",gradientEnd:"#222222",smokeOpacity:.1,numCircles:1,maxMaxRad:"auto",minMaxRad:"auto",minRadFactor:0,iterations:8,drawsPerFrame:10,lineWidth:2,speed:1,bgColorInner:"#ffffff",bgColorOuter:"#666666"},p=2*Math.PI;function c(i,s){this.element=i,this.$element=t(i),n=this,this.settings=t.extend({},l,s),this._defaults=l,this._name=h,this.init()}function d(t,i,s,e,o,a){this.x0=t,this.y0=i,this.x1=e,this.y1=o,this.rad0=s,this.rad1=a,this.colorStops=[]}c.prototype={init:function(){this.initSettings(),this.initCanvas(),this.generate()},initSettings:function(){var t=.8*this.$element.height()/2;"auto"===this.settings.maxMaxRad&&(this.settings.maxMaxRad=t),"auto"===this.settings.minMaxRad&&(this.settings.minMaxRad=t)},initCanvas:function(){this.displayCanvas=this.$element.find("canvas"),this.displayWidth=this.$element[0].clientWidth,this.displayHeight=this.$element[0].clientHeight,this.displayCanvas[0].width=this.displayWidth,this.displayCanvas[0].height=this.displayHeight,this.context=this.displayCanvas[0].getContext("2d"),this.exportCanvas=e.createElement("canvas"),this.exportCanvas.width=this.displayWidth,this.exportCanvas.height=this.displayHeight,this.exportContext=this.exportCanvas.getContext("2d")},generate:function(){this.drawCount=0,this.context.setTransform(1,0,0,1,0,0),this.context.clearRect(0,0,this.displayWidth,this.displayHeight),this.fillBackground(),this.setCircles(),a&&clearInterval(a),a=setInterval((function(){n.onTimer()}),n.settings.speed)},fillBackground:function(){var t=Math.sqrt(this.displayWidth*this.displayWidth+this.displayHeight*this.displayHeight)/2;this.niceGradient=new d(.75*this.displayWidth,this.displayHeight/2*.75,0,this.displayWidth/2,this.displayHeight/4,t);var i=this.settings.bgColorInner.replace("#",""),s=parseInt(i.substring(0,2),16),e=parseInt(i.substring(2,4),16),o=parseInt(i.substring(4,6),16);i=this.settings.bgColorOuter.replace("#","");var a=parseInt(i.substring(0,2),16),n=parseInt(i.substring(2,4),16),h=parseInt(i.substring(4,6),16);this.niceGradient.addColorStop(0,s,e,o),this.niceGradient.addColorStop(1,a,n,h),this.niceGradient.fillRect(this.context,0,0,this.displayWidth,this.displayHeight)},setCircles:function(){var t,i,s,e;for(this.circles=[],t=0;t<this.settings.numCircles;t++){i=this.settings.minMaxRad+Math.random()*(this.settings.maxMaxRad-this.settings.minMaxRad),s=this.settings.minRadFactor*i,e=this.context.createRadialGradient(0,0,s,0,0,i);var o=this.hexToRGBA(this.settings.gradientStart,this.settings.smokeOpacity),a=this.hexToRGBA(this.settings.gradientEnd,this.settings.smokeOpacity);e.addColorStop(1,o),e.addColorStop(0,a);var n={centerX:-i,centerY:this.displayHeight/2-50,maxRad:i,minRad:s,color:e,param:0,changeSpeed:.004,phase:Math.random()*p,globalPhase:Math.random()*p};this.circles.push(n),n.pointList1=this.setLinePoints(this.settings.iterations),n.pointList2=this.setLinePoints(this.settings.iterations)}},onTimer:function(){var t,i,s,e,o,n,h,r,l,c,d=.75;for(i=0;i<this.settings.drawsPerFrame;i++)for(this.drawCount++,t=0;t<this.settings.numCircles;t++){for((s=this.circles[t]).param+=s.changeSpeed,s.param>=1&&(s.param=0,s.pointList1=s.pointList2,s.pointList2=this.setLinePoints(this.settings.iterations)),l=.5-.5*Math.cos(Math.PI*s.param),this.context.strokeStyle=s.color,this.context.lineWidth=this.settings.lineWidth,this.context.beginPath(),o=s.pointList1.first,n=s.pointList2.first,s.phase+=2e-4,theta=s.phase,e=s.minRad+(o.y+l*(n.y-o.y))*(s.maxRad-s.minRad),s.centerX+=.5,s.centerY+=.04,c=40*Math.sin(s.globalPhase+this.drawCount/1e3*p),s.centerX>this.displayWidth+this.settings.maxMaxRad&&(clearInterval(a),a=null),this.context.setTransform(d,0,0,1,s.centerX,s.centerY+c),h=d*e*Math.cos(theta),r=e*Math.sin(theta),this.context.lineTo(h,r);null!=o.next;)o=o.next,n=n.next,theta=p*(o.x+l*(n.x-o.x))+s.phase,h=d*(e=s.minRad+(o.y+l*(n.y-o.y))*(s.maxRad-s.minRad))*Math.cos(theta),r=e*Math.sin(theta),this.context.lineTo(h,r);this.context.closePath(),this.context.stroke()}},setLinePoints:function(t){var i,s,e,o,a,n={first:{x:0,y:1}},h=1,r=1;n.first.next={x:1,y:1};for(var l=0;l<t;l++)for(i=n.first;null!=i.next;){e=(s=i.next).x-i.x,o=.5*(i.x+s.x),a=.5*(i.y+s.y);var p={x:o,y:a+=e*(2*Math.random()-1)};a<h?h=a:a>r&&(r=a),p.next=s,i.next=p,i=s}if(r!=h){var c=1/(r-h);for(i=n.first;null!=i;)i.y=c*(i.y-h),i=i.next}else for(i=n.first;null!=i;)i.y=1,i=i.next;return n},setOption:function(t,i){this.settings[t]=i},hexToRGBA:function(t,i){return t=t.replace("#",""),r=parseInt(t.substring(0,2),16),g=parseInt(t.substring(2,4),16),b=parseInt(t.substring(4,6),16),result="rgba("+r+","+g+","+b+","+i+")",result},download:function(t,i){this.exportContext.drawImage(this.displayCanvas[0],0,0,t,i,0,0,t,i);var e=this.exportCanvas.toDataURL("image/png"),o=s.open("","fractalLineImage","left=0,top=0,width="+t+",height="+i+",toolbar=0,resizable=0");o.document.write("<title>Export Image</title>"),o.document.write("<img id='exportImage' alt='' height='"+i+"' width='"+t+"' style='position:absolute;left:0;top:0'/>"),o.document.close(),o.document.getElementById("exportImage").src=e}},d.prototype.addColorStop=function(t,i,s,e){if(!(t<0||t>1)){var o={ratio:t,r:i,g:s,b:e};if(t>=0&&t<=1)if(0==this.colorStops.length)this.colorStops.push(o);else{for(var a=0,n=!1,h=this.colorStops.length;!n&&a<h;)(n=t<=this.colorStops[a].ratio)||a++;n?t==this.colorStops[a].ratio?this.colorStops.splice(a,1,o):this.colorStops.splice(a,0,o):this.colorStops.push(o)}}},d.prototype.fillRect=function(t,s,e,o,a){if(0!=this.colorStops.length){var n,h,r,l,p,c,d,g,x,u,f,m,y,S,v,C,b,R,M,I,w,W,L,P=t.getImageData(s,e,o,a),H=P.data,T=H.length,G=(this.x1,this.x0,this.y1,this.y0,[]),k=[],B=[],O=this.x1-this.x0,E=this.y1-this.y0,$=this.rad1-this.rad0;M=$*$-O*O-E*E;var F=2*this.rad0*(this.rad1-this.rad0),X=this.rad0*this.rad0;if(0!=this.colorStops[0].ratio){var A={ratio:0,r:this.colorStops[0].r,g:this.colorStops[0].g,b:this.colorStops[0].b};this.colorStops.splice(0,0,A)}if(1!=this.colorStops[this.colorStops.length-1].ratio){A={ratio:1,r:this.colorStops[this.colorStops.length-1].r,g:this.colorStops[this.colorStops.length-1].g,b:this.colorStops[this.colorStops.length-1].b};this.colorStops.push(A)}for(i=0;i<T/4;i++){if(r=s+i%o,l=e+Math.floor(i/o),(w=(I=F+2*((W=r-this.x0)*O+(L=l-this.y0)*E))*I-4*M*(X-W*W-L*L))>=0){if((p=(-I+Math.sqrt(w))/(2*M))<0?p=0:p>1&&(p=1),1==p)C=this.colorStops.length-1;else for(C=0,b=!1;!b;)(b=p<this.colorStops[C].ratio)||C++;g=this.colorStops[C-1].r,x=this.colorStops[C-1].g,u=this.colorStops[C-1].b,f=this.colorStops[C].r,m=this.colorStops[C].g,y=this.colorStops[C].b,c=g+(f-g)*(v=(p-(S=this.colorStops[C-1].ratio))/(this.colorStops[C].ratio-S)),d=x+(m-x)*v,I=u+(y-u)*v}else c=g,d=x,I=u;G.push(c),k.push(d),B.push(I)}for(i=0;i<T/4;i++)n=~~G[i],h=G[i]-n,G[i+1]+=7/16*h,G[i-1+o]+=3/16*h,G[i+o]+=5/16*h,G[i+1+o]+=1/16*h,n=~~k[i],h=k[i]-n,k[i+1]+=7/16*h,k[i-1+o]+=3/16*h,k[i+o]+=5/16*h,k[i+1+o]+=1/16*h,n=~~B[i],h=B[i]-n,B[i+1]+=7/16*h,B[i-1+o]+=3/16*h,B[i+o]+=5/16*h,B[i+1+o]+=1/16*h;for(i=0;i<T;i+=4)R=i/4,H[i]=~~G[R],H[i+1]=~~k[R],H[i+2]=~~B[R],H[i+3]=255;t.putImageData(P,s,e)}},t.fn[h]=function(i){return this.each((function(){t.data(this,h)||t.data(this,h,new c(this,i))})),this}}(jQuery,window,document);
