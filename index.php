<!DOCTYPE html>
<html>
<head>
	<title>Trading Analytics</title>
	<!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
       <script src="https://code.jquery.com/jquery-3.1.0.js"></script> 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
	
      <!--chart.js annotation plugin-->
      <script>
			!function e(t,n,i){function a(r,l){if(!n[r]){if(!t[r]){var s="function"==typeof require&&require;if(!l&&s)return s(r,!0);if(o)return o(r,!0);var c=new Error("Cannot find module '"+r+"'");throw c.code="MODULE_NOT_FOUND",c}var u=n[r]={exports:{}};t[r][0].call(u.exports,function(e){var n=t[r][1][e];return a(n?n:e)},u,u.exports,e,t,n,i)}return n[r].exports}for(var o="function"==typeof require&&require,r=0;r<i.length;r++)a(i[r]);return a}({1:[function(e,t,n){},{}],2:[function(e,t,n){t.exports=function(t){function n(e){o.decorate(e,"afterDataLimits",function(e,t){e&&e(t),o.adjustScaleRange(t)})}function i(e){return function(t,n){var i=t.annotation.options.drawTime;o.elements(t).filter(function(t){return e===(t.options.drawTime||i)}).forEach(function(e){e.transition(n).draw()})}}var a=t.helpers,o=e("./helpers.js")(t),r=e("./events.js")(t),l=t.Annotation.types;return{beforeInit:function(e){var t=e.options,i=e.annotation={elements:{},options:o.initConfig(t.annotation||{}),onDestroy:[],firstRun:!0,supported:!1};e.ensureScalesHaveIDs(),t.scales&&(i.supported=!0,a.each(t.scales.xAxes,n),a.each(t.scales.yAxes,n))},beforeUpdate:function(e){var t=e.annotation;if(t.supported){t.firstRun?t.firstRun=!1:t.options=o.initConfig(e.options.annotation||{});var n=[];t.options.annotations.forEach(function(i){var a=i.id||o.objectId();if(!t.elements[a]&&l[i.type]){var r=l[i.type],s=new r({id:a,options:i,chartInstance:e});s.initialize(),t.elements[a]=s,i.id=a,n.push(a)}else t.elements[a]&&n.push(a)}),Object.keys(t.elements).forEach(function(e){n.indexOf(e)===-1&&(t.elements[e].destroy(),delete t.elements[e])})}},afterScaleUpdate:function(e){o.elements(e).forEach(function(e){e.configure()})},beforeDatasetsDraw:i("beforeDatasetsDraw"),afterDatasetsDraw:i("afterDatasetsDraw"),afterDraw:i("afterDraw"),afterInit:function(e){var t=e.annotation.options.events;if(a.isArray(t)&&t.length>0){var n=e.chart.canvas,i=r.dispatcher.bind(e);r.collapseHoverEvents(t).forEach(function(t){a.addEvent(n,t,i),e.annotation.onDestroy.push(function(){a.removeEvent(n,t,i)})})}},destroy:function(e){for(var t=e.annotation.onDestroy;t.length>0;)t.pop()()}}}},{"./events.js":4,"./helpers.js":5}],3:[function(e,t,n){t.exports=function(e){var t=e.helpers,n=e.Element.extend({initialize:function(){this.hidden=!1,this.hovering=!1,this._model=t.clone(this._model)||{},this.setDataLimits()},destroy:function(){},setDataLimits:function(){},configure:function(){},inRange:function(){},getCenterPoint:function(){},getWidth:function(){},getHeight:function(){},getArea:function(){},draw:function(){}});return n}},{}],4:[function(e,t,n){t.exports=function(t){function n(e){var t=!1,n=e.filter(function(e){switch(e){case"mouseenter":case"mouseover":case"mouseout":case"mouseleave":return t=!0,!1;default:return!0}});return t&&n.indexOf("mousemove")===-1&&n.push("mousemove"),n}function i(e){var t=this.annotation,i=o.elements(this),r=a.getRelativePosition(e,this.chart),l=o.getNearestItems(i,r),s=n(t.options.events),c=t.options.dblClickSpeed,u=[],f=o.getEventHandlerName(e.type),d=(l||{}).options;if("mousemove"===e.type&&(l&&!l.hovering?["mouseenter","mouseover"].forEach(function(t){var n=o.getEventHandlerName(t),i=o.createMouseEvent(t,e);l.hovering=!0,"function"==typeof d[n]&&u.push([d[n],i,l])}):l||i.forEach(function(t){if(t.hovering){t.hovering=!1;var n=t.options;["mouseout","mouseleave"].forEach(function(i){var a=o.getEventHandlerName(i),r=o.createMouseEvent(i,e);"function"==typeof n[a]&&u.push([n[a],r,t])})}})),l&&s.indexOf("dblclick")>-1&&"function"==typeof d.onDblclick){if("click"===e.type&&"function"==typeof d.onClick)return clearTimeout(l.clickTimeout),l.clickTimeout=setTimeout(function(){delete l.clickTimeout,d.onClick.call(l,e)},c),e.stopImmediatePropagation(),void e.preventDefault();"dblclick"===e.type&&l.clickTimeout&&(clearTimeout(l.clickTimeout),delete l.clickTimeout)}l&&"function"==typeof d[f]&&0===u.length&&u.push([d[f],e,l]),u.length>0&&(e.stopImmediatePropagation(),e.preventDefault(),u.forEach(function(e){e[0].call(e[2],e[1])}))}var a=t.helpers,o=e("./helpers.js")(t);return{dispatcher:i,collapseHoverEvents:n}}},{"./helpers.js":5}],5:[function(e,t,n){function i(){}function a(e){var t=e.annotation.elements;return Object.keys(t).map(function(e){return t[e]})}function o(){return Math.random().toString(36).substr(2,6)}function r(e){return null!==e&&"undefined"!=typeof e&&("number"==typeof e?isFinite(e):!!e)}function l(e,t,n){var i="$";e[i+t]||(e[t]?(e[i+t]=e[t].bind(e),e[t]=function(){var a=[e[i+t]].concat(Array.prototype.slice.call(arguments));return n.apply(e,a)}):e[t]=function(){var t=[void 0].concat(Array.prototype.slice.call(arguments));return n.apply(e,t)})}function s(e,t){e.forEach(function(e){(t?e[t]:e)()})}function c(e){return"on"+e[0].toUpperCase()+e.substring(1)}function u(e,t){try{return new MouseEvent(e,t)}catch(n){try{var i=document.createEvent("MouseEvent");return i.initMouseEvent(e,t.canBubble,t.cancelable,t.view,t.detail,t.screenX,t.screenY,t.clientX,t.clientY,t.ctrlKey,t.altKey,t.shiftKey,t.metaKey,t.button,t.relatedTarget),i}catch(a){var o=document.createEvent("Event");return o.initEvent(e,t.canBubble,t.cancelable),o}}}t.exports=function(e){function t(t){return t=h.configMerge(e.Annotation.defaults,t),h.isArray(t.annotations)&&t.annotations.forEach(function(t){t.label=h.configMerge(e.Annotation.labelDefaults,t.label)}),t}function n(e,t,n,i){var a=t.filter(function(t){return!!t._model.ranges[e]}).map(function(t){return t._model.ranges[e]}),o=a.map(function(e){return Number(e.min)}).reduce(function(e,t){return isFinite(t)&&!isNaN(t)&&t<e?t:e},n),r=a.map(function(e){return Number(e.max)}).reduce(function(e,t){return isFinite(t)&&!isNaN(t)&&t>e?t:e},i);return{min:o,max:r}}function f(e){var t=n(e.id,a(e.chart),e.min,e.max);"undefined"==typeof e.options.ticks.min&&"undefined"==typeof e.options.ticks.suggestedMin&&(e.min=t.min),"undefined"==typeof e.options.ticks.max&&"undefined"==typeof e.options.ticks.suggestedMax&&(e.max=t.max),e.handleTickRangeOptions&&e.handleTickRangeOptions()}function d(e,t){var n=Number.POSITIVE_INFINITY;return e.filter(function(e){return e.inRange(t.x,t.y)}).reduce(function(e,i){var a=i.getCenterPoint(),o=h.distanceBetweenPoints(t,a);return o<n?(e=[i],n=o):o===n&&e.push(i),e},[]).sort(function(e,t){var n=e.getArea(),i=t.getArea();return n>i||n<i?n-i:e._index-t._index}).slice(0,1)[0]}var h=e.helpers;return{initConfig:t,elements:a,callEach:s,noop:i,objectId:o,isValid:r,decorate:l,adjustScaleRange:f,getNearestItems:d,getEventHandlerName:c,createMouseEvent:u}}},{}],6:[function(e,t,n){var i=e("chart.js");i="function"==typeof i?i:window.Chart,i.Annotation=i.Annotation||{},i.Annotation.drawTimeOptions={afterDraw:"afterDraw",afterDatasetsDraw:"afterDatasetsDraw",beforeDatasetsDraw:"beforeDatasetsDraw"},i.Annotation.defaults={drawTime:"afterDatasetsDraw",dblClickSpeed:350,events:[],annotations:[]},i.Annotation.labelDefaults={backgroundColor:"rgba(0,0,0,0.8)",fontFamily:i.defaults.global.defaultFontFamily,fontSize:i.defaults.global.defaultFontSize,fontStyle:"bold",fontColor:"#fff",xPadding:6,yPadding:6,cornerRadius:6,position:"center",xAdjust:0,yAdjust:0,enabled:!1,content:null},i.Annotation.Element=e("./element.js")(i),i.Annotation.types={line:e("./types/line.js")(i),box:e("./types/box.js")(i)};var a=e("./annotation.js")(i);t.exports=a,i.pluginService.register(a)},{"./annotation.js":2,"./element.js":3,"./types/box.js":7,"./types/line.js":8,"chart.js":1}],7:[function(e,t,n){t.exports=function(t){var n=e("../helpers.js")(t),i=t.Annotation.Element.extend({setDataLimits:function(){var e=this._model,t=this.options,i=this.chartInstance,a=i.scales[t.xScaleID],o=i.scales[t.yScaleID],r=i.chartArea;e.ranges={},a&&(min=n.isValid(t.xMin)?t.xMin:a.getPixelForValue(r.left),max=n.isValid(t.xMax)?t.xMax:a.getPixelForValue(r.right),e.ranges[t.xScaleID]={min:Math.min(min,max),max:Math.max(min,max)}),o&&(min=n.isValid(t.yMin)?t.yMin:o.getPixelForValue(r.bottom),max=n.isValid(t.yMax)?t.yMax:o.getPixelForValue(r.top),e.ranges[t.yScaleID]={min:Math.min(min,max),max:Math.max(min,max)})},configure:function(){var e=this._model,t=this.options,i=this.chartInstance,a=i.scales[t.xScaleID],o=i.scales[t.yScaleID],r=i.chartArea;e.clip={x1:r.left,x2:r.right,y1:r.top,y2:r.bottom};var l,s,c=r.left,u=r.top,f=r.right,d=r.bottom;a&&(l=n.isValid(t.xMin)?a.getPixelForValue(t.xMin):r.left,s=n.isValid(t.xMax)?a.getPixelForValue(t.xMax):r.right,c=Math.min(l,s),f=Math.max(l,s)),o&&(l=n.isValid(t.yMin)?o.getPixelForValue(t.yMin):r.bottom,s=n.isValid(t.yMax)?o.getPixelForValue(t.yMax):r.top,u=Math.min(l,s),d=Math.max(l,s)),e.left=c,e.top=u,e.right=f,e.bottom=d,e.borderColor=t.borderColor,e.borderWidth=t.borderWidth,e.backgroundColor=t.backgroundColor},inRange:function(e,t){var n=this._model;return n&&e>=n.left&&e<=n.right&&t>=n.top&&t<=n.bottom},getCenterPoint:function(){var e=this._model;return{x:(e.right+e.left)/2,y:(e.bottom+e.top)/2}},getWidth:function(){var e=this._model;return Math.abs(e.right-e.left)},getHeight:function(){var e=this._model;return Math.abs(e.bottom-e.top)},getArea:function(){return this.getWidth()*this.getHeight()},draw:function(){var e=this._view,t=this.chartInstance.chart.ctx;t.save(),t.beginPath(),t.rect(e.clip.x1,e.clip.y1,e.clip.x2-e.clip.x1,e.clip.y2-e.clip.y1),t.clip(),t.lineWidth=e.borderWidth,t.strokeStyle=e.borderColor,t.fillStyle=e.backgroundColor;var n=e.right-e.left,i=e.bottom-e.top;t.fillRect(e.left,e.top,n,i),t.strokeRect(e.left,e.top,n,i),t.restore()}});return i}},{"../helpers.js":5}],8:[function(e,t,n){t.exports=function(t){function n(e){var t=(e.x2-e.x1)/(e.y2-e.y1),n=e.x1||0;this.m=t,this.b=n,this.getX=function(i){return t*(i-e.y1)+n},this.getY=function(i){return(i-n)/t+e.y1},this.intersects=function(e,t,n){n=n||.001;var i=this.getY(e),a=this.getX(t);return(!isFinite(i)||Math.abs(t-i)<n)&&(!isFinite(a)||Math.abs(e-a)<n)}}function i(e,t,n,i,a){var o=e.line,s={},c=0,u=0;switch(!0){case e.mode==l&&"top"==e.labelPosition:u=a+e.labelYAdjust,c=t/2+e.labelXAdjust,s.y=e.y1+u,s.x=(isFinite(o.m)?o.getX(s.y):e.x1)-c;break;case e.mode==l&&"bottom"==e.labelPosition:u=n+a+e.labelYAdjust,c=t/2+e.labelXAdjust,s.y=e.y2-u,s.x=(isFinite(o.m)?o.getX(s.y):e.x1)-c;break;case e.mode==r&&"left"==e.labelPosition:c=i+e.labelXAdjust,u=-(n/2)+e.labelYAdjust,s.x=e.x1+c,s.y=o.getY(s.x)+u;break;case e.mode==r&&"right"==e.labelPosition:c=t+i+e.labelXAdjust,u=-(n/2)+e.labelYAdjust,s.x=e.x2-c,s.y=o.getY(s.x)+u;break;default:s.x=(e.x1+e.x2-t)/2+e.labelXAdjust,s.y=(e.y1+e.y2-n)/2+e.labelYAdjust}return s}var a=t.helpers,o=e("../helpers.js")(t),r="horizontal",l="vertical",s=t.Annotation.Element.extend({setDataLimits:function(){var e=this._model,t=this.options;e.ranges={},e.ranges[t.scaleID]={min:t.value,max:t.endValue||t.value}},configure:function(){var e,t,l=this._model,s=this.options,c=this.chartInstance,u=c.chart.ctx,f=c.scales[s.scaleID];if(f&&(e=o.isValid(s.value)?f.getPixelForValue(s.value):NaN,t=o.isValid(s.endValue)?f.getPixelForValue(s.endValue):e),!isNaN(e)){var d=c.chartArea;l.clip={x1:d.left,x2:d.right,y1:d.top,y2:d.bottom},this.options.mode==r?(l.x1=d.left,l.x2=d.right,l.y1=e,l.y2=t):(l.y1=d.top,l.y2=d.bottom,l.x1=e,l.x2=t),l.line=new n(l),l.mode=s.mode,l.labelBackgroundColor=s.label.backgroundColor,l.labelFontFamily=s.label.fontFamily,l.labelFontSize=s.label.fontSize,l.labelFontStyle=s.label.fontStyle,l.labelFontColor=s.label.fontColor,l.labelXPadding=s.label.xPadding,l.labelYPadding=s.label.yPadding,l.labelCornerRadius=s.label.cornerRadius,l.labelPosition=s.label.position,l.labelXAdjust=s.label.xAdjust,l.labelYAdjust=s.label.yAdjust,l.labelEnabled=s.label.enabled,l.labelContent=s.label.content,u.font=a.fontString(l.labelFontSize,l.labelFontStyle,l.labelFontFamily);var h=u.measureText(l.labelContent).width,b=u.measureText("M").width,m=i(l,h,b,l.labelXPadding,l.labelYPadding);l.labelX=m.x-l.labelXPadding,l.labelY=m.y-l.labelYPadding,l.labelWidth=h+2*l.labelXPadding,l.labelHeight=b+2*l.labelYPadding,l.borderColor=s.borderColor,l.borderWidth=s.borderWidth,l.borderDash=s.borderDash||[],l.borderDashOffset=s.borderDashOffset||0}},inRange:function(e,t){var n=this._model;return n.line&&n.line.intersects(e,t,this.getHeight())||n.labelEnabled&&n.labelContent&&e>=n.labelX&&e<=n.labelX+n.labelWidth&&t>=n.labelY&&t<=n.labelY+n.labelHeight},getCenterPoint:function(){return{x:(this._model.x2+this._model.x1)/2,y:(this._model.y2+this._model.y1)/2}},getWidth:function(){return Math.abs(this._model.right-this._model.left)},getHeight:function(){return this._model.borderWidth||1},getArea:function(){return Math.sqrt(Math.pow(this.getWidth(),2)+Math.pow(this.getHeight(),2))},draw:function(){var e=this._view,t=this.chartInstance.chart.ctx;e.clip&&(t.save(),t.beginPath(),t.rect(e.clip.x1,e.clip.y1,e.clip.x2-e.clip.x1,e.clip.y2-e.clip.y1),t.clip(),t.lineWidth=e.borderWidth,t.strokeStyle=e.borderColor,t.setLineDash&&t.setLineDash(e.borderDash),t.lineDashOffset=e.borderDashOffset,t.beginPath(),t.moveTo(e.x1,e.y1),t.lineTo(e.x2,e.y2),t.stroke(),e.labelEnabled&&e.labelContent&&(t.beginPath(),t.rect(e.clip.x1,e.clip.y1,e.clip.x2-e.clip.x1,e.clip.y2-e.clip.y1),t.clip(),t.fillStyle=e.labelBackgroundColor,a.drawRoundedRectangle(t,e.labelX,e.labelY,e.labelWidth,e.labelHeight,e.labelCornerRadius),t.fill(),t.font=a.fontString(e.labelFontSize,e.labelFontStyle,e.labelFontFamily),t.fillStyle=e.labelFontColor,t.textAlign="center",t.textBaseline="middle",t.fillText(e.labelContent,e.labelX+e.labelWidth/2,e.labelY+e.labelHeight/2)),t.restore())}});return s}},{"../helpers.js":5}]},{},[6]);
      </script>
	
	<style>
	table, th, td {
  	border: 1px solid black;
	}
	</style>
</head>
<style type="text/css">
.bg{
	background-image: linear-gradient(to top left,black,blue);
}
nav{
	background-image: linear-gradient(to top right,red,yellow); 
	padding-left: 200px;
	padding-right: -200px;
}
.content{
	padding-left: 200px;
	padding-right: -200px;
	height:100%;
}
.card-bg{
	background: rgba(0,0,0,0);
}
@media only screen and (max-width: 992px){
	.content,nav{
		padding-left: 0;
	}
}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('.sidenav').sidenav();
	});
</script>
<body>
	

<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/annotations.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	
	<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper">
			<a href="#" class="brand-logo center">Trading Results: 1</a>
			<a href="" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>		
		</div>
	</nav>
	</div>
	<ul class="sidenav sidenav-fixed bg" id="slide-out">
		<li>
			<div class="user-view">
				<div class="background">
					<img src="Backgrd.jpg" width="100%">
				</div>
				<a href="#"><img src="Untitled-1.jpg" class="circle"></a>
				<a href="#" class="white-text name">Andy Li</a>
				<a href="#" class="white-text email">and.app28@gmail.com</a>
				<a href="#" class="white-text email">sli015@e.ntu.edu.sg</a>
			</div>	
		</li>
		<li><a href="" class="white-text"><i class="material-icons">home</i>Dashboard</a></li>
		<!--<li><a href="" class="white-text"><i class="material-icons">mail</i>Data Member</a></li>-->
	</ul>
	<div class="content bg">
		<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="white-text">DashBoard</h1>
			</div>
			<div class="col s12 m6 l3">
				<div class="card card-bg white-text">
					<div class="card-content center">
						<p>Total Equity</p>
						<h5>$12,476.00</h5>
						<i class="material-icons small green-text">keyboard_arrow_up</i><br>
						<b class="green-text">24.76%</b>
					</div>
				</div>
			</div>
			<div class="col s12 m6 l3">
				<div class="card card-bg white-text">
					<div class="card-content center">
						<p>Net Gain/Loss</p>
						<h5>2,476.00</h5>
						<!--<i class="material-icons small red-text">keyboard_arrow_down</i><br>-->
						<!--<b class="red-text">%10</b>-->
						<i class="material-icons small green-text">keyboard_arrow_up</i><br>
						<b class="green-text">100%</b>
					</div>
				</div>
			</div>
			<div class="col s12 l3 m6">
				<div class="card card-bg white-text">
					<div class="card-content center">
						<p>Total Trades</p>
						<h5>12</h5>
						<i class="material-icons small green-text">keyboard_arrow_up</i><br>
						<b class="green-text">100%</b>
					</div>
				</div>
			</div>
			<div class="col s12 l3 m6">
				<div class="card card-bg white-text">
					<div class="card-content center">
						<p>ROI</p>
						<h5>24.76%</h5>
						<i class="material-icons small green-text">keyboard_arrow_up</i><br>
						<b class="green-text">100%</b>
					</div>
				</div>
			</div>
			<div class="col l12 m6 s12">
				<div class="card card-bg">
					<div class="card-content">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
			<div class="col l12 m6 s12">
				<div class="card card-bg">
					<div class="card-content">
						<canvas id="myChart2"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	
	<!--get data from mysql-->
	<?php
	/* Database connection settings */
	$host = 'us-cdbr-east-03.cleardb.com';
	$user = 'b8a00bf633cf68';
	$pass = '1a8113a0';
	$db = 'heroku_69459908ed082cc';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$data1 = '';
	$data2 = '';
	$date = '';
	$data3 = '';
	$data4 = '';
	$data5 = '';
	$data6 = '';
	

	//query to get data from the table
	$sql = "SELECT * FROM `backtest`;";
    	$result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$data1 = $data1 . '"'. $row['Price'].'",';
		$date = $date . '"'. $row['PriceDate'] .'",';
		$data6 = $data6 . '"'. $row['UnixTime'].'",';
	}

	$data1 = trim($data1,",");
	//$data2 = trim($data2,",");
	$date = trim($date,",");
	$data6 = trim($data6,",");
	
	$sql = "select Ticker from `heroku_69459908ed082cc`.`backtest` order by Ticker desc limit 1;";
    	$result = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($result);
	$data2 = $data2 . $row['Ticker'];
	
	$sql = "select * from `heroku_69459908ed082cc`.`buy_sell`;";
    	$result = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($result)) {

		$data3 = $data3 . '"'. $row['TradeDate'].'",';
		$data4 = $data4 . '"'. $row['Remarks'].'",';
		$data5 = $data5 . '"'. $row['BuySell'].'",';
		$data7 = $data7 . '"'. $row['UnixTime'].'",';
		$data8 = $data8 . '"'. $row['Price'].'",';
		
	}

	$data3 = trim($data3,",");
	$data4 = trim($data4,",");
	$data5 = trim($data5,",");
	$data7 = trim($data7,",");
	$data8 = trim($data8,",");
	
	
	?>
	<!--end of mysql-->
	
	<div class="content bg">
	<div class="container">
	<div class="row">
		<!--<div class="col-sm-6 col-md-6">-->
		<div class="col s12">
			<div class="col l12 m6 s12">
				<div class="card card-bg">
					<div class="card-content">
						<div id="container1"></div>
					</div>
				</div>
			</div>
		</div>
		<!--<div class="col-sm-6 col-md-6"></div>-->
		<!--<div class="col-sm-6 col-md-6"></div>-->
		<!--<div class="col-sm-6 col-md-6"></div>-->
	</div>
	</div>
	</div>
	<!--<div class="content bg">
		<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="white-text">DashBoard</h1>
			</div>
			<div class="col l12 m6 s12">
				<div class="card card-bg">
					<div class="card-content">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>-->
	
			
		<!--<h1><?php echo $data2; ?> Share Price</h1>-->	   
		<!--<canvas id="ctx" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>-->
	
	<script type="text/javascript">
		var chr=document.getElementById("myChart").getContext("2d");
		var chr2=document.getElementById("myChart2").getContext("2d");
		
//chart 1		
		var marketing = [<?php echo $data6; ?>];
		var amount = [<?php echo $data1; ?>];
		var marketing3 = [<?php echo $data7; ?>];
		var amount4 = [<?php echo $data4; ?>];
		var px4 = [<?php echo $data8; ?>];
		var B_S = [<?php echo $data5; ?>];
		var marketing4 = [<?php echo $data3; ?>];
		var txt = "";
		
		var test3 = marketing.map(function(date1, index1) {
		
			
			return [
			Number(marketing[index1]), Number(amount[index1])
			];
		
		});
		
		//annotations	
		var test4 = marketing3.map(function(date2, px2) {
		
			if (B_S[px2]=='Buy'){
			return {
			//type: 'line', borderColor: 'green', id: 'vline' + index2, mode: 'vertical', scaleID: 'x-axis-0', value: date2, borderWidth: 1, label: {enabled: true, position: "bottom", content: amount4[index2]}}
			labelOptions: {backgroundColor: 'rgba(255,255,255,0.5)',verticalAlign: 'top',y: 15},labels: [{point: {xAxis: 0,yAxis: 0,x: date2,y: px4[px2]},text: amount4[px2]}]}
			} else {
			return{
			//type: 'line', borderColor: 'red', id: 'vline' + index2, mode: 'vertical', scaleID: 'x-axis-0', value: date2, borderWidth: 1, label: {enabled: true, position: "top", content: amount4[index2]}}
			labels: [{point: {xAxis: 0,yAxis: 0,x: date2,y: px4[px2]},x: -30,text: amount4[px2]}]}
			};
		
		});	
		
		var test5 = marketing4.map(function(date3, index3) {
		
			if (B_S[index3]=='Buy'){
			return {
			type: 'line', borderColor: 'green', id: 'vline' + index3, mode: 'vertical', scaleID: 'x-axis-0', value: date3, borderWidth: 1, label: {enabled: true, position: "bottom", content: amount[index3]}}
			} else {
			return{
			type: 'line', borderColor: 'red', id: 'vline' + index3, mode: 'vertical', scaleID: 'x-axis-0', value: date3, borderWidth: 1, label: {enabled: true, position: "top", content: amount[index3]}}
			};
		
		});		
		</script>
	
	
<script type="text/javascript">
	
	var elevationData = test3;

//chart JS
var myChart=new Chart(chr, {
		//var chart = new Chart(ctx, {
		   type: 'line',
		   data: {
			labels: [<?php echo $date; ?>],
		      datasets: [{
			 label: 'Close Price',
			 data: [<?php echo $data1; ?>],
			 backgroundColor: 'rgba(0, 119, 290, 0.2)',
			 borderColor: 'rgba(0, 119, 290, 0.6)'
		      }]
		   },
		   options: {
		      scales: {
			 yAxes: [{
			    ticks: {
			       beginAtZero: true
			    }
			 }]
		      },
		      annotation: {
			 //drawTime: 'afterDatasetsDraw',
			 drawTime: 'afterDraw',
			 annotations: test5
		      }
		   }
		});
//end of chart JS
	
// Now create the chart
	Highcharts.chart('container1', {

    chart: {
        type: 'area',
        zoomType: 'x',
        panning: true,
        panKey: 'shift',
        scrollablePlotArea: {
            minWidth: 600
        }
    },

    caption: {
        text: 'This chart uses the Highcharts Annotations feature to place labels at various points of interest. The labels are responsive and will be hidden to avoid overlap on small screens.'
    },

    title: {
        text: 'Strategy Backtest Result'
    },

    accessibility: {
        description: 'Image description: An annotated line graph illustrates the 8th stage of the 2017 Tour de France cycling race from the start point in Dole to the finish line at Station des Rousses. Altitude is plotted on the Y-axis at increments of 500m and distance is plotted on the X-axis in increments of 25 kilometers. The line graph is interactive, and the user can trace the altitude level at every 100-meter point along the stage. The graph is shaded below the data line to visualize the mountainous altitudes encountered on the 187.5-kilometre stage. The three largest climbs are highlighted at Col de la Joux, Côte de Viry and the final 11.7-kilometer, 6.4% gradient climb to Montée de la Combe de Laisia Les Molunes which peaks at 1200 meters above sea level. The stage passes through the villages of Arbois, Montrond, Bonlieu, Chassal and Saint-Claude along the route.'
    },

    credits: {
        enabled: false
    },
	
	
    annotations: test4
	/*[
	    {labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 1583798400000,
                y: 57.970001
            },
            text: 'Arbois'
        }]}, 
	{labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 1613692800000,
                y: 227.270004
            },
            x: -30,
            text: 'Col de la Joux'
        }]}
		 ]*/,	

    xAxis: {
	    labels: {
      format: "{value:%b %e}"
    },
    //tickInterval: 604800000,
    type: "datetime"//,
    //min: 1569888000000
	    /*,
      labels: {
        formatter: function() {
          return Highcharts.dateFormat('%b/%e/%Y', this.value);
        }
      }*/
        /*labels: {
            format: '{value}'
        },
        minRange: 5,
        title: {
            text: 'Distance'
        },
        accessibility: {
            rangeDescription: 'Range: 0 to 187.8km.'
        }*/
    },

    yAxis: {
        startOnTick: true,
        endOnTick: false,
        maxPadding: 0.35,
        title: {
            text: null
        },
        labels: {
            format: '{value}'
        }
    },

    tooltip: {
        formatter: function() {
                return  '<b>' + this.series.name +'</b><br/>' +
                    Highcharts.dateFormat('%e - %b - %Y',
                                          new Date(this.x))
                + ' date, ' + this.y ;
            }//,headerFormat: 'Date: {point.x}<br>',
        //pointFormat: '{point.y}',
        //shared: true
    },

    legend: {
        enabled: false
    },

    series: [{
        accessibility: {
            keyboardNavigation: {
                enabled: false
            }
        },
        data: elevationData,
        lineColor: Highcharts.getOptions().colors[1],
        color: Highcharts.getOptions().colors[2],
        fillOpacity: 0.5,
        name: 'Elevation',
        marker: {
            enabled: false
        },
        threshold: null
    }]

});		
//end of chart 1		
		var myChart2=new Chart(chr2,{
			type:'line',
			data:{
				labels:['Monday','Tuesday','Wednesday','Thursday','fiday'],
				datasets:[{
					label:'Data Users',
					data:[100,512,150,120,190],
					backgroundColor:'rgba(0,0,0,0)',
					borderColor:'#fff',
					borderWidth:1,
				}]
			},
			options:{
				legend:{
					labels:{
						fontColor:'#fff',
					}
				}
			}
		});
	</script>
	<!--</div>-->


<br>
	
	
<style>
table, th, td {
  border: 1px solid black;
}
</style>

<?php
//echo "FINALLY!!! AUNTY IS STAYING!!!!";
  
$servername = "us-cdbr-east-03.cleardb.com";
$username = "b8a00bf633cf68";
$password = "1a8113a0";
$dbname = "heroku_69459908ed082cc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT * FROM heroku_69459908ed082cc.`s&p500_returns`;";
	$sql = "SELECT * FROM heroku_69459908ed082cc.`rtd`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<div class='content bg'><div class='container'><div class='row'><div class='col s12'><div class='col l12 m6 s12'><div class='card card-bg'><div class='card-content'><table border=1 bgcolor='#000066'><tr><th><font color='#ff9900'>#</font></th><th><font color='#ff9900'>Ticker</font></th><th><font color='#ff9900'>Desc</font></th><th><font color='#ff9900'>Close Price</font></th><th><font color='#ff9900'>Returns</font></th><th><font color='#ff9900'>Sector</font></th><th><font color='#ff9900'>Industry</font></th><th><font color='#ff9900'>Volume</font></th><th><font color='#ff9900'>Index</font></th></tr>";
	
    while($row = $result->fetch_assoc()) {
        //echo ++$row_num . ") Ticker: " . $row["Ticker"]. " - Value Date: " . $row["ValueDate"]. " - Close Price: " . $row["ClosePx"]. " Returns: " . $row["Returns_Percent"]. " - Volume: " . $row["Volume"]. " - Uploaded: " . $row["UploadTime"]. " " . "<br>";
	
	echo "<tr><td><font color='#ff9900'>" . ++$row_num . ")</font></td><td><font color='#ff9900'>" . $row["Ticker"]. "</font></td><td><font color='#ff9900'>" . $row["Desc_"]. "</font></td><td><font color='#ff9900'>" . $row["LastPx"]. "</font></td><td><font color='#ff9900'>" . $row["RtnPercent"]. "</font></td><td><font color='#ff9900'>" . $row["Sector"]. "</font></td><td><font color='#ff9900'>" . $row["Industry"]. "</font></td><td><font color='#ff9900'>" . $row["Volume"]. "</font></td><td><font color='#ff9900'>" . $row["Index_"]. "</font></td></tr>";
	
    }	echo "</font></table></div></div></div></div></div></div></div>";
} else {
    echo "0 results";
}
	
	$sql = "select uploadtime from `heroku_69459908ed082cc`.`rtd` order by uploadtime desc limit 1;";
$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	echo "Table updated on: " . $row["uploadtime"] . "<br><br>";
	
$conn->close();
	
	//echo "TGIF";
	
?>
	<p>
<script> document.write(new Date().toLocaleDateString()); </script>
</p>

	 		
</body>
</html>
