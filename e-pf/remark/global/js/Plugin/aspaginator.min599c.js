/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/aspaginator",["exports","jquery","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("jquery"),require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.jQuery,global.Plugin),global.PluginAspaginator=mod.exports}}(this,function(exports,_jquery,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _jquery2=babelHelpers.interopRequireDefault(_jquery),_Plugin3=babelHelpers.interopRequireDefault(_Plugin2),Paginator=function(_Plugin){function Paginator(){return babelHelpers.classCallCheck(this,Paginator),babelHelpers.possibleConstructorReturn(this,(Paginator.__proto__||Object.getPrototypeOf(Paginator)).apply(this,arguments))}return babelHelpers.inherits(Paginator,_Plugin),babelHelpers.createClass(Paginator,[{key:"getName",value:function(){return"paginator"}},{key:"render",value:function(){if(_jquery2.default.fn.asPaginator){var $el=this.$el,total=$el.data("total");$el.asPaginator(total,this.options)}}}],[{key:"getDefaults",value:function(){return{namespace:"pagination",currentPage:1,itemsPerPage:10,disabledClass:"disabled",activeClass:"active",visibleNum:{0:3,480:5},tpl:function(){return"{{prev}}{{lists}}{{next}}"},components:{prev:{tpl:function(){return'<li class="'+this.namespace+'-prev page-item"><a class="page-link" href="javascript:void(0)" aria-label="Prev"><span class="icon wb-chevron-left-mini"></span></a></li>'}},next:{tpl:function(){return'<li class="'+this.namespace+'-next page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next"><span class="icon wb-chevron-right-mini"></span></a></li>'}},lists:{tpl:function(){var lists="",remainder=this.currentPage>=this.visible?this.currentPage%this.visible:this.currentPage;remainder=0===remainder?this.visible:remainder;for(var k=1;k<remainder;k++)lists+='<li class="'+this.namespace+'-items page-item" data-value="'+(this.currentPage-remainder+k)+'"><a class="page-link" href="javascript:void(0)">'+(this.currentPage-remainder+k)+"</a></li>";lists+='<li class="'+this.namespace+"-items page-item "+this.classes.active+'" data-value="'+this.currentPage+'"><a class="page-link" href="javascript:void(0)">'+this.currentPage+"</a></li>";for(var i=this.currentPage+1,limit=i+this.visible-remainder-1>this.totalPages?this.totalPages:i+this.visible-remainder-1;i<=limit;i++)lists+='<li class="'+this.namespace+'-items page-item" data-value="'+i+'"><a class="page-link" href="javascript:void(0)">'+i+"</a></li>";return lists}}}}}}]),Paginator}(_Plugin3.default);_Plugin3.default.register("paginator",Paginator),exports.default=Paginator});;;