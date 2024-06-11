/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/dashboard/analytics",["jquery","Site"],factory);else if("undefined"!=typeof exports)factory(require("jquery"),require("Site"));else{var mod={exports:{}};factory(global.jQuery,global.Site),global.dashboardAnalytics=mod.exports}}(this,function(_jquery,_Site){"use strict";var _jquery2=babelHelpers.interopRequireDefault(_jquery),Site=babelHelpers.interopRequireWildcard(_Site);(0,_jquery2.default)(document).ready(function($){Site.run()}),function(){var options={showArea:!0,low:0,high:8e3,height:240,fullWidth:!0,axisX:{offset:40},axisY:{offset:30,labelInterpolationFnc:function(value){return 0==value?null:value/1e3+"k"},scaleMinSpace:40},plugins:[Chartist.plugins.tooltip()]},dayLabelList=["AUG 8","SEP 15","OCT 22","NOV 29","DEC 8","JAN 15","FEB 22",""],daySeries1List={name:"series-1",data:[0,7300,6200,6833,7568,4620,4856,2998]},daySeries2List={name:"series-2",data:[0,3100,7200,5264,5866,2200,3850,1032]},weekLabelList=["W1","W2","W3","W4","W5","W6","W7",""],weekSeries1List={name:"series-1",data:[0,2400,6200,7833,5568,3620,4856,2998]},weekSeries2List={name:"series-2",data:[0,4100,6800,5264,5866,3200,2850,1032]},monthLabelList=["AUG","SEP","OCT","NOV","DEC","JAN","FEB",""],monthSeries1List={name:"series-1",data:[0,6400,5200,7833,5568,3620,5856,0]},monthSeries2List={name:"series-2",data:[0,3100,4800,5264,6866,3200,2850,1032]},newScoreLineChart=function(chartId,labelList,series1List,series2List,options){new Chartist.Line(chartId,{labels:labelList,series:[series1List,series2List]},options).on("draw",function(data){var elem;"point"===data.type&&(elem=data.element,new Chartist.Svg(elem._node.parentNode).elem("line",{x1:data.x,y1:data.y,x2:data.x+.01,y2:data.y,class:"ct-point-content"}))})},createKindChart=function(clickli){var chartId=(clickli=clickli||(0,_jquery2.default)("#productOverviewWidget .product-filters").find(".active")).attr("href");switch(chartId){case"#scoreLineToDay":newScoreLineChart(chartId,dayLabelList,daySeries1List,daySeries2List,options);break;case"#scoreLineToWeek":newScoreLineChart(chartId,weekLabelList,weekSeries1List,weekSeries2List,options);break;case"#scoreLineToMonth":newScoreLineChart(chartId,monthLabelList,monthSeries1List,monthSeries2List,options)}};createKindChart(),(0,_jquery2.default)(".product-filters li a").on("click",function(){createKindChart((0,_jquery2.default)(this))})}(),function(){var overlappingBarsDataThree={labels:["A","B","C","D","E","F","G","H"],series:[[5,2,6,7,10,8,6,5],[4,3,5,6,8,6,4,3]]},barsData=[{labels:["A","B","C","D","E","F","G","H"],series:[[3,4,6,10,8,6,3,4],[2,3,5,8,6,5,4,3]]},{labels:["A","B","C","D","E","F","G","H"],series:[[2,4,5,10,6,8,3,5],[3,5,6,5,4,6,3,3]]},overlappingBarsDataThree,overlappingBarsDataThree],overlappingBarsOptions={low:0,high:10,seriesBarDistance:6,fullWidth:!0,axisX:{showLabel:!1,showGrid:!1,offset:0},axisY:{showLabel:!1,showGrid:!1,offset:0},chartPadding:{left:30}},responsiveOptions=[["screen and (max-width: 640px)",{seriesBarDistance:6,axisX:{labelInterpolationFnc:function(value){return value[0]}}}]],createBar=function(chartId,data,options,responsiveOptions){new Chartist.Bar(chartId,data,options,responsiveOptions)};(0,_jquery2.default)("#productOptionsData .ct-chart").each(function(index){createBar(this,barsData[index],overlappingBarsOptions,responsiveOptions)})}(),new Chartist.Bar("#weekStackedBarChart",{labels:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],series:[[4,4.5,5,6,7,7.5,7],[6,5.5,5,4,3,2.5,3]]},{stackBars:!0,axisY:{offset:0},axisX:{offset:60}}).on("draw",function(data){"bar"===data.type&&data.element.attr({style:"stroke-width: 20px"})}),Morris.Donut({resize:!0,element:"browersVistsDonut",data:[{label:"Chrome",value:4625},{label:"Firfox",value:1670},{label:"Safari",value:1100}],colors:["#f96868","#62a9eb","#f3a754"]}).on("click",function(i,row){})});;;