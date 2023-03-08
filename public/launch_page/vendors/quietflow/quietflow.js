function randCol(a,o,e,r){return"rgba("+Math.floor(Math.random()*a).toString()+","+Math.floor(Math.random()*o).toString()+","+Math.floor(Math.random()*e).toString()+","+r+")"}$.fn.quietflow=function(a){function o(a){void 0!==c.speed?setTimeout((function(){requestAnimationFrame(a)}),c.speed):requestAnimationFrame(a)}var e=$(this),r=e.width(),t=e.height(),l=r/2,i=t/2;$("#Quietflow").remove();var n="starfield",s=document.createElement("canvas"),d=s.getContext("2d");s.id="Quietflow",s.width=r,s.height=t,s.style.zIndex=-1e3,s.style.position="absolute",s.style.top=0;var h=e.attr("id");null!=h?document.getElementById(h).appendChild(s):document.body.appendChild(s);$.inArray(a.theme,["squareFlash","vortex","bouncingBalls","shootingLines","simpleGradient","starfield","layeredTriangles","cornerSpikes","floatingBoxes"])>-1&&(n=a.theme);var c={};switch(c=$.extend({squareFlash:{squareSize:10,maxRed:255,maxGreen:255,maxBlue:255,speed:100},vortex:{mainRadius:20,miniRadii:30,backgroundCol:"#3498DB",circleCol:"#34495E",speed:10},bouncingBalls:{specificColors:[],backgroundCol:"#ECF0F1",maxRadius:40,bounceSpeed:50,bounceBallCount:50,transparent:!0},shootingLines:{backgroundCol:"#000",lineColor:"#FFF",speed:150,lineGlow:"#FFF",lines:50},simpleGradient:{primary:"#D4145A",accent:"#FBB03B"},starfield:{starColor:"#FFF",starSize:3,speed:100},layeredTriangles:{backgroundCol:"#D6D6D6",transparent:!0,specificColors:[],triangles:50},cornerSpikes:{specificColors:[],backgroundCol:"#FFF",lineColor:"#000",speed:100,lineGlow:"#FFF"},floatingBoxes:{specificColors:[],boxCount:400,maxBoxSize:80,backgroundCol:"#D6D6D6",transparent:!1,speed:100}}[n],a),$(window).resize((function(){r=e.width(),t=e.height();var a=$("#Quietflow").css("width").replace("px",""),o=$("#Quietflow").css("height").replace("px","");$("#Quietflow").css({width:window.innerWidth,height:window.innerHeight});var l=a/window.innerWidth,i=o/window.innerHeight;d.scale(l,i)})),n){case"squareFlash":!function a(){for(var e=0;r>e;e+=c.squareSize+1)for(var l=0;t>l;l+=c.squareSize+1)d.fillStyle=randCol(c.maxRed,c.maxGreen,c.maxBlue,1),d.fillRect(e,l,c.squareSize,c.squareSize);o(a)}();break;case"vortex":var f=2,m=4,u=r/2,M=t/2;!function a(){(u+f>r||0>u+f)&&(f=-f),(M+m>t||0>M+m)&&(m=-m),u+=f,M+=m,d.fillStyle=c.backgroundCol,d.fillRect(0,0,r,t);for(var e=0;e<c.miniRadii;e++)for(var l=0;l<c.miniRadii;l++){var i=e/c.miniRadii*r,n=l/c.miniRadii*t,s=Math.sqrt(Math.pow(u-i,2)+Math.pow(M-n,2))/c.mainRadius;d.beginPath(),d.fillStyle=c.circleCol,d.arc(i,n,s,0,2*Math.PI,!0),d.closePath(),d.fill()}o(a)}();break;case"bouncingBalls":circleData=[];for(var p=0;p<c.bounceBallCount;p++)0==c.specificColors.length?circleData.push([Math.random()*r,Math.random()*t,Math.random()*c.maxRadius,2*Math.random(),4*Math.random(),randCol(255,255,255,c.transparent?.5:1)]):circleData.push([Math.random()*r,Math.random()*t,Math.random()*c.maxRadius,2*Math.random(),4*Math.random(),c.specificColors[Math.floor(Math.random()*c.specificColors.length)]]);!function a(){d.fillStyle=c.backgroundCol,d.fillRect(0,0,r,t);for(var e=0;e<c.bounceBallCount;e++){var l=circleData[e];(l[0]+l[3]>r||l[0]+l[3]<0)&&(l[3]=-l[3]),(l[1]+l[4]>t||l[1]+l[4]<0)&&(l[4]=-l[4]),l[0]+=l[3],l[1]+=l[4],d.beginPath(),d.fillStyle=l[5],d.arc(l[0],l[1],l[2],0,2*Math.PI,!0),d.closePath(),d.fill()}o(a)}();break;case"shootingLines":!function a(){d.fillStyle=c.backgroundCol,d.fillRect(0,0,r,t),d.beginPath(),d.fillStyle=c.lineColor,d.arc(l,i,2,0,2*Math.PI,!0),d.closePath(),d.fill();for(var e=0;e<c.lines;e++)d.beginPath(),d.moveTo(l,i),d.lineTo(Math.random()*r,Math.random()*t),d.strokeStyle=c.lineColor,d.shadowColor=c.lineGlow,d.shadowBlur=20,d.stroke();o(a)}();break;case"simpleGradient":var C=d.createLinearGradient(0,0,r/2,t);C.addColorStop(0,c.primary),C.addColorStop(1,c.accent),d.fillStyle=C,d.fillRect(0,0,r,t);break;case"starfield":var g=[];for(p=0;700>p;p++)g.push([Math.random()*r*2-r,Math.random()*t,Math.random()*c.starSize,Math.ceil(5*Math.random())]);!function a(){var e=d.createLinearGradient(0,0,r/2,t);e.addColorStop(0,"#333333"),e.addColorStop(1,"#000"),d.fillStyle=e,d.fillRect(0,0,r,t);for(var l=0;l<g.length;l++){var i=g[l];i[0]+=i[3],d.beginPath(),d.fillStyle=c.starColor,d.arc(i[0],i[1],i[2],0,2*Math.PI,!0),d.shadowColor="#FFF",d.shadowBlur=20,d.closePath(),d.fill(),i[0]>r&&(g.splice(l,1),g.unshift([Math.random()*r/4-r/4,Math.random()*t,Math.random()*c.starSize,Math.ceil(5*Math.random())]))}o(a)}();break;case"layeredTriangles":d.fillStyle=c.backgroundCol,d.fillRect(0,0,r,t);for(p=0;p<c.triangles;p++)d.beginPath(),d.moveTo(Math.random()*r,Math.random()*t),d.lineTo(Math.random()*r,Math.random()*t),d.lineTo(Math.random()*r,Math.random()*t),c.specificColors.length>0?d.fillStyle=c.specificColors[Math.floor(Math.random()*c.specificColors.length)]:d.fillStyle=randCol(255,255,255,.5),d.closePath(),d.fill();break;case"cornerSpikes":d.fillStyle=c.backgroundCol,d.fillRect(0,0,r,t),function a(){d.beginPath();for(var e=[[0,0],[r,0],[0,t],[r,t]],l=0;4>l;l++){var i=Math.floor(Math.random()*c.specificColors.length);d.strokeStyle=c.specificColors.length>0?c.specificColors[i]:randCol(255,255,255),d.moveTo(e[l][0],e[l][1]),d.lineTo(Math.random()*r,Math.random()*t)}d.shadowColor=c.lineGlow,d.shadowBlur=20,d.stroke(),o(a)}();break;case"floatingBoxes":var S=[];for(p=0;p<c.boxCount;p++)0==c.specificColors.length?S.push([Math.random()*r*2-r,Math.random()*t,Math.random()*c.maxBoxSize+1,randCol(255,255,255,c.transparent?.5:1),5*Math.random()]):S.push([Math.random()*r*2-r,Math.random()*t,Math.random()*c.maxBoxSize+1,c.specificColors[Math.floor(Math.random()*c.specificColors.length)],5*Math.random()]);!function a(){d.fillStyle=c.backgroundCol,d.fillRect(0,0,r,t);for(var e=0;e<S.length;e++){var l=S[e];d.fillStyle=l[3],d.fillRect(l[0],l[1],l[2],l[2]),l[0]+=l[4],l[1]-=l[4],(l[0]>r+c.maxBoxSize||l[1]<-c.maxBoxSize)&&(S.splice(e,1),0==c.specificColors.length?S.push([Math.random()*r*2-r,Math.random()*t*2+t,Math.random()*c.maxBoxSize+1,randCol(255,255,255,c.transparent?.5:1),5*Math.random()]):S.push([Math.random()*r*2-r,Math.random()*t*2+t,Math.random()*c.maxBoxSize+1,c.specificColors[Math.floor(Math.random()*c.specificColors.length)],5*Math.random()]))}o(a)}()}};
