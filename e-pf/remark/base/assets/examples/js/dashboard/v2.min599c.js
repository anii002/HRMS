/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/dashboard/v2",["jquery","Site"],factory);else if("undefined"!=typeof exports)factory(require("jquery"),require("Site"));else{var mod={exports:{}};factory(global.jQuery,global.Site),global.dashboardV2=mod.exports}}(this,function(_jquery,_Site){"use strict";var _jquery2=babelHelpers.interopRequireDefault(_jquery),Site=babelHelpers.interopRequireWildcard(_Site);(0,_jquery2.default)(document).ready(function($){Site.run(),new Chartist.Line("#widgetLinearea .ct-chart",{labels:["SUN","MON","TUE","WED","THU","FRI","SAT"],series:[[0,2.5,2,2.8,2.6,3.8,0],[0,1.4,.5,2,1.2,.9,0]]},{low:0,showArea:!0,showPoint:!1,showLine:!1,fullWidth:!0,chartPadding:{top:0,right:10,bottom:0,left:0},axisX:{showGrid:!1,labelOffset:{x:-14,y:0}},axisY:{labelOffset:{x:-10,y:0},labelInterpolationFnc:function(num){return num%1==0&&num}}}),function(){var map=new GMaps({el:"#gmap",lat:-12.043333,lng:-77.028333,zoomControl:!0,zoomControlOpt:{style:"SMALL",position:"TOP_LEFT"},panControl:!0,streetViewControl:!1,mapTypeControl:!1,overviewMapControl:!1});map.addStyle({styledMapName:"Styled Map",styles:Plugin.getDefaults("gmaps").styles,mapTypeId:"map_style"}),map.setStyle("map_style")}()})});;;