if(!Array.indexOf){Array.prototype.indexOf=function(e){for(var t=0;t<this.length;t++){if(this[t]==e){return t}}return-1}}(function(e){e.fn.quizyMemoryGame=function(t){var n=e.extend({},e.fn.quizyMemoryGame.defaults,t);var r=e(this).children("ul").children("li").length;var i=new Array;var s=new Array;var o="quizy-mg-item";var u="";var a=-1;var f=0;var l=0;var c=0;var h=0;var p;var d=n.openDelay;var v=n.itemWidth;var m=n.itemHeight;var g=n.itemsMargin;var y=Math.ceil(r/n.colCount);var b=function(){if(l==0)p=setInterval(N,1e3);l++;w(e(this));S(e(this));var t=e(this).attr("id");var v=parseInt(t.substring(o.length,t.length));var m=s[v];if(f==0){f++;u=m;a=t}else if(f==1){f=0;if(m==u){T("correct");w(e("."+m));i.push(t);i.push(a);c++;if(c==r/2){clearInterval(p);if(n.gameSummary){e("div#quizy-game-summary").children("div#gs-column2").html(h+"<br>"+n.textSummaryTime);e("div#quizy-game-summary").children("div#gs-column3").html(l+"<br>"+n.textSummaryClicks);e("div#quizy-game-summary").children("div#gs-column4").html(l/2+"<br>"+n.textSummaryRounds);e("div#quizy-game-summary").delay(2e3).fadeIn(1e3)}if(n.onFinishCall!=""){n.onFinishCall({clicks:l,time:h})}}}else{T("wrong");w(e("div."+o));x(e("div#"+a));x(e(this));setTimeout(function(){e("."+o).each(function(){var t=e(this).attr("id");if(i.indexOf(t)==-1){E(e(this))}})},d+n.animSpeed+250)}}};var w=function(e){e.unbind("click");e.css("cursor","default")};var E=function(e){e.bind("click",b);e.css("cursor","pointer")};var S=function(t){var r=t.children("div.quizy-mg-item-top").attr("id");switch(n.animType){default:case"fade":e("#"+r).fadeOut(n.animSpeed);break;case"flip":t.flip({direction:n.flipAnim,speed:n.animSpeed,content:t.children("div.quizy-mg-item-bottom"),color:"#777"});break;case"scroll":e("#"+r).animate({height:"toggle",opacity:.3},n.animSpeed);break}};var x=function(t){var r=t.children("div.quizy-mg-item-top").attr("id");switch(n.animType){default:case"fade":e("#"+r).delay(d).fadeIn(n.animSpeed);break;case"flip":setTimeout(function(){t.revertFlip()},d);break;case"scroll":e("#"+r).delay(d).animate({height:"toggle",opacity:1},n.animSpeed);break}};var T=function(t){if(n.resultIcons){var r;var i=Math.round(d/3);if(t=="wrong"){r=e("div#quizy-mg-msgwrong")}else if(t=="correct"){r=e("div#quizy-mg-msgcorrect")}r.delay(i).fadeIn(i/2).delay(i/2).hide("fade",i/2)}};var N=function(){h++};e(this).children("ul").hide();e(this).css({height:y*(m+g)+"px"});var C=Array();for(var k=0;k<r;k++){C.push(k)}var L=0;while(L<r){var A=Math.floor(Math.random()*C.length);var k=C[A];C.splice(A,1);var O=e(this).children("ul").children("li").eq(k);var M=(L+n.colCount)%n.colCount;var _=Math.floor(L/n.colCount);var D=M*(v+g);var P=_*(m+g);e(this).append('<div id="'+o+k+'" class="'+o+'" style="width:'+v+"px; height:"+m+"px; left:"+D+"px; top:"+P+'px">'+'<div class="quizy-mg-item-bottom"><div class="mgcard-show">'+O.html()+'</div></div><div id="quizy-mg-item-top'+k+'" class="quizy-mg-item-top" style="width:'+v+"px; height:"+m+'px;"></div></div>');L++;s[k]=O.attr("class")}e(this).children("ul").remove();if(n.resultIcons){e(this).append('<div id="quizy-mg-msgwrong"'+' class="quizy-mg-notification-fly quizy-mg-notification-fly-neg"></div>'+'<div id="quizy-mg-msgcorrect" class="quizy-mg-notification-fly '+' quizy-mg-notification-fly-pos"></div>');var H=e(this).width()/2-e("div.quizy-mg-notification-fly").width()/2;var B=e(this).height()/2-e("div.quizy-mg-notification-fly").height()/2-n.itemsMargin/2;e("div.quizy-mg-notification-fly").css({top:B+"px",left:H+"px"})}if(n.gameSummary){e(this).append('<div id="quizy-game-summary"><div id="gs-column1">'+n.textSummaryTitle+'</div><div id="gs-column2"></div>'+'<div id="gs-column3"></div></div>');var H=e(this).width()/2-e("div#quizy-game-summary").width()/2;var B=e(this).height()/2-e("div#quizy-game-summary").height()/2-n.itemsMargin/2;e("div#quizy-game-summary").css({top:B+"px",left:H+"px"});e("div#quizy-game-summary").click(function(){e(this).remove();e.ajax({type:"POST",url:"write/writer.php",data:{email:n.subID,clicks:l,time:h,game:n.gameType,grid:n.gridSize},error:function(e,t,n){alert("Crap")}})})}e(".quizy-mg-item").click(b)};e.fn.quizyMemoryGame.defaults={itemWidth:156,itemHeight:156,itemsMargin:10,colCount:4,animType:"scroll",animSpeed:250,openDelay:2500,flipAnim:"rl",resultIcons:true,gridSize:"34",gameType:"icon",gameSummary:true,textSummaryTitle:"Summary\nClick to\nContinue",textSummaryClicks:"Clicks",textSummaryTime:"Seconds",onFinishCall:""}})(jQuery)