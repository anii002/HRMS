/**
* jQuery wizard v0.4.4
* https://github.com/amazingSurge/jquery-wizard
*
* Copyright (c) amazingSurge
* Released under the LGPL-3.0 license
*/
!function(t,e){if("function"==typeof define&&define.amd)define(["jquery"],e);else if("undefined"!=typeof exports)e(require("jquery"));else{var i={exports:{}};e(t.jQuery),t.jqueryWizardEs=i.exports}}(this,function(t){"use strict";function e(t){if(Array.isArray(t)){for(var e=0,i=Array(t.length);e<t.length;e++)i[e]=t[e];return i}return Array.from(t)}function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function n(t,e){var i=!1;t.one(u.transition.end,function(){i=!0});setTimeout(function(){i||t.trigger(u.transition.end)},e)}var a=function(t){return t&&t.__esModule?t:{default:t}}(t),s="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},r=function(){function t(t,e){for(var i=0;i<e.length;i++){var n=e[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,i,n){return i&&t(e.prototype,i),n&&t(e,n),e}}(),o={step:".wizard-steps > li",getPane:function(t,e){return this.$element.find(".wizard-content").children().eq(t)},buttonsAppendTo:"this",templates:{buttons:function(){var t=this.options;return'<div class="wizard-buttons"><a class="wizard-back" href="#'+this.id+'" data-wizard="back" role="button">'+t.buttonLabels.back+'</a><a class="wizard-next" href="#'+this.id+'" data-wizard="next" role="button">'+t.buttonLabels.next+'</a><a class="wizard-finish" href="#'+this.id+'" data-wizard="finish" role="button">'+t.buttonLabels.finish+"</a></div>"}},classes:{step:{done:"done",error:"error",active:"current",disabled:"disabled",activing:"activing",loading:"loading"},pane:{active:"active",activing:"activing"},button:{hide:"hide",disabled:"disabled"}},autoFocus:!0,keyboard:!0,enableWhenVisited:!1,buttonLabels:{next:"Next",back:"Back",finish:"Finish"},loading:{show:function(t){},hide:function(t){},fail:function(t){}},cacheContent:!1,validator:function(t){return!0},onInit:null,onNext:null,onBack:null,onReset:null,onBeforeShow:null,onAfterShow:null,onBeforeHide:null,onAfterHide:null,onBeforeLoad:null,onAfterLoad:null,onBeforeChange:null,onAfterChange:null,onStateChange:null,onFinish:null},u={};!function(t){var e={transition:{end:{WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",transition:"transitionend"}},animation:{end:{WebkitAnimation:"webkitAnimationEnd",MozAnimation:"animationend",OAnimation:"oAnimationEnd",animation:"animationend"}}},i=["webkit","Moz","O","ms"],n=(0,a.default)("<support>").get(0).style,s={csstransitions:function(){return Boolean(r("transition"))},cssanimations:function(){return Boolean(r("animation"))}},r=function(t,e){var s=!1,r=t.charAt(0).toUpperCase()+t.slice(1);return void 0!==n[t]&&(s=t),s||a.default.each(i,function(t,e){return void 0===n[e+r]||(s="-"+e.toLowerCase()+"-"+r,!1)}),e?s:!!s},o=function(t){return r(t,!0)};s.csstransitions()&&(t.transition=new String(o("transition")),t.transition.end=e.transition.end[t.transition]),s.cssanimations()&&(t.animation=new String(o("animation")),t.animation.end=e.animation.end[t.animation])}(u);var l=function(){function t(e,n,a){i(this,t),this.TRANSITION_DURATION=200,this.initialize(e,n,a)}return r(t,[{key:"initialize",value:function(t,e,i){this.$element=(0,a.default)(t),this.wizard=e,this.events={},this.loader=null,this.loaded=!1,this.validator=this.wizard.options.validator,this.states={done:!1,error:!1,active:!1,disabled:!1,activing:!1},this.index=i,this.$element.data("wizard-index",i),this.$pane=this.getPaneFromTarget(),this.$pane||(this.$pane=this.wizard.options.getPane.call(this.wizard,i,t)),this.setValidatorFromData(),this.setLoaderFromData()}},{key:"getPaneFromTarget",value:function(){var t=this.$element.data("target");return t||(t=(t=this.$element.attr("href"))&&t.replace(/.*(?=#[^\s]*$)/,"")),t?(0,a.default)(t):null}},{key:"setup",value:function(){var t=this.wizard.currentIndex();this.index===t?(this.enter("active"),this.loader&&this.load()):this.index>t&&this.enter("disabled"),this.$element.attr("aria-expanded",this.is("active")),this.$pane.attr("aria-expanded",this.is("active"));var e=this.wizard.options.classes;this.is("active")?this.$pane.addClass(e.pane.active):this.$pane.removeClass(e.pane.active)}},{key:"show",value:function(t){if(!this.is("activing")&&!this.is("active")){this.trigger("beforeShow"),this.enter("activing");var e=this.wizard.options.classes;this.$element.attr("aria-expanded",!0),this.$pane.addClass(e.pane.activing).addClass(e.pane.active).attr("aria-expanded",!0);var i=function(){this.$pane.removeClass(e.pane.activing),this.leave("activing"),this.enter("active"),this.trigger("afterShow"),a.default.isFunction(t)&&t.call(this)};u.transition?(this.$pane.one(u.transition.end,a.default.proxy(i,this)),n(this.$pane,this.TRANSITION_DURATION)):i.call(this)}}},{key:"hide",value:function(t){if(!this.is("activing")&&this.is("active")){this.trigger("beforeHide"),this.enter("activing");var e=this.wizard.options.classes;this.$element.attr("aria-expanded",!1),this.$pane.addClass(e.pane.activing).removeClass(e.pane.active).attr("aria-expanded",!1);var i=function(){this.$pane.removeClass(e.pane.activing),this.leave("activing"),this.leave("active"),this.trigger("afterHide"),a.default.isFunction(t)&&t.call(this)};u.transition?(this.$pane.one(u.transition.end,a.default.proxy(i,this)),n(this.$pane,this.TRANSITION_DURATION)):i.call(this)}}},{key:"empty",value:function(){this.$pane.empty()}},{key:"load",value:function(t){function e(e){i.$pane.html(e),i.leave("loading"),i.loaded=!0,i.trigger("afterLoad"),a.default.isFunction(t)&&t.call(i)}var i=this,n=this.loader;a.default.isFunction(n)&&(n=n.call(this.wizard,this)),this.wizard.options.cacheContent&&this.loaded?a.default.isFunction(t)&&t.call(this):(this.trigger("beforeLoad"),this.enter("loading"),"string"==typeof n?e(n):"object"===(void 0===n?"undefined":s(n))&&n.hasOwnProperty("url")?(i.wizard.options.loading.show.call(i.wizard,i),a.default.ajax(n.url,n.settings||{}).done(function(t){e(t),i.wizard.options.loading.hide.call(i.wizard,i)}).fail(function(){i.wizard.options.loading.fail.call(i.wizard,i)})):e(""))}},{key:"trigger",value:function(t){for(var i,n=arguments.length,s=Array(n>1?n-1:0),r=1;r<n;r++)s[r-1]=arguments[r];if(a.default.isArray(this.events[t]))for(var o in this.events[t])if({}.hasOwnProperty.call(this.events[t],o)){var u;(u=this.events[t])[o].apply(u,s)}(i=this.wizard).trigger.apply(i,e([t,this].concat(s)))}},{key:"enter",value:function(t){this.states[t]=!0;var e=this.wizard.options.classes;this.$element.addClass(e.step[t]),this.trigger("stateChange",!0,t)}},{key:"leave",value:function(t){if(this.states[t]){this.states[t]=!1;var e=this.wizard.options.classes;this.$element.removeClass(e.step[t]),this.trigger("stateChange",!1,t)}}},{key:"setValidatorFromData",value:function(){var t=this.$pane.data("validator");t&&a.default.isFunction(window[t])&&(this.validator=window[t])}},{key:"setLoaderFromData",value:function(){var t=this.$pane.data("loader");if(t)a.default.isFunction(window[t])&&(this.loader=window[t]);else{var e=this.$pane.data("loader-url");e&&(this.loader={url:e,settings:this.$pane.data("settings")||{}})}}},{key:"active",value:function(){return this.wizard.goTo(this.index)}},{key:"on",value:function(t,e){return a.default.isFunction(e)&&(a.default.isArray(this.events[t])?this.events[t].push(e):this.events[t]=[e]),this}},{key:"off",value:function(t,e){return a.default.isFunction(e)&&a.default.isArray(this.events[t])&&a.default.each(this.events[t],function(i,n){if(n===e)return delete this.events[t][i],!1}),this}},{key:"is",value:function(t){return this.states[t]&&!0===this.states[t]}},{key:"reset",value:function(){for(var t in this.states)({}).hasOwnProperty.call(this.states,t)&&this.leave(t);return this.setup(),this}},{key:"setLoader",value:function(t){return this.loader=t,this.is("active")&&this.load(),this}},{key:"setValidator",value:function(t){return a.default.isFunction(t)&&(this.validator=t),this}},{key:"validate",value:function(){return this.validator.call(this.$pane.get(0),this)}}]),t}(),d=0,h=function(){function t(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};i(this,t),this.$element=(0,a.default)(e),this.options=a.default.extend(!0,{},o,n),this.$steps=this.$element.find(this.options.step),this.id=this.$element.attr("id"),this.id||(this.id="wizard-"+ ++d,this.$element.attr("id",this.id)),this.trigger("init"),this.initialize()}return r(t,[{key:"initialize",value:function(){this.steps=[];var t=this;this.$steps.each(function(e){t.steps.push(new l(this,t,e))}),this._current=0,this.transitioning=null,a.default.each(this.steps,function(t,e){e.setup()}),this.setup(),this.$element.on("click",this.options.step,function(e){var i=(0,a.default)(this).data("wizard-index");t.get(i).is("disabled")||t.goTo(i),e.preventDefault(),e.stopPropagation()}),this.options.keyboard&&(0,a.default)(document).on("keyup",a.default.proxy(this.keydown,this)),this.trigger("ready")}},{key:"setup",value:function(){this.$buttons=(0,a.default)(this.options.templates.buttons.call(this)),this.updateButtons();var t=this.options.buttonsAppendTo,e=void 0;e="this"===t?this.$element:a.default.isFunction(t)?t.call(this):this.$element.find(t),this.$buttons=this.$buttons.appendTo(e)}},{key:"updateButtons",value:function(){var t=this.options.classes.button,e=this.$buttons.find('[data-wizard="back"]'),i=this.$buttons.find('[data-wizard="next"]'),n=this.$buttons.find('[data-wizard="finish"]');0===this._current?e.addClass(t.disabled):e.removeClass(t.disabled),this._current===this.lastIndex()?(i.addClass(t.hide),n.removeClass(t.hide)):(i.removeClass(t.hide),n.addClass(t.hide))}},{key:"updateSteps",value:function(){var t=this;a.default.each(this.steps,function(e,i){e>t._current&&(i.leave("error"),i.leave("active"),i.leave("done"),t.options.enableWhenVisited||i.enter("disabled"))})}},{key:"keydown",value:function(t){if(!/input|textarea/i.test(t.target.tagName)){switch(t.which){case 37:this.back();break;case 39:this.next();break;default:return}t.preventDefault()}}},{key:"trigger",value:function(t){for(var e=arguments.length,i=Array(e>1?e-1:0),n=1;n<e;n++)i[n-1]=arguments[n];var a=[this].concat(i);this.$element.trigger("wizard::"+t,a);var s="on"+(t=t.replace(/\b\w+\b/g,function(t){return t.substring(0,1).toUpperCase()+t.substring(1)}));"function"==typeof this.options[s]&&this.options[s].apply(this,i)}},{key:"get",value:function(t){if("string"==typeof t&&"#"===t.substring(0,1)){var e=t.substring(1);for(var i in this.steps)if(this.steps[i].$pane.attr("id")===e)return this.steps[i]}return t<this.length()&&this.steps[t]?this.steps[t]:null}},{key:"goTo",value:function(t,e){if(t===this._current||!0===this.transitioning)return!1;var i=this.current(),n=this.get(t);if(t>this._current){if(!i.validate())return i.leave("done"),i.enter("error"),-1;i.leave("error"),t>this._current&&i.enter("done")}var s=this,r=function(){s.trigger("beforeChange",i,n),s.transitioning=!0,i.hide(),n.show(function(){if(s._current=t,s.transitioning=!1,this.leave("disabled"),s.updateButtons(),s.updateSteps(),s.options.autoFocus){var r=this.$pane.find(":input");r.length>0?r.eq(0).focus():this.$pane.focus()}a.default.isFunction(e)&&e.call(s),s.trigger("afterChange",i,n)})};return n.loader?n.load(function(){r()}):r(),!0}},{key:"length",value:function(){return this.steps.length}},{key:"current",value:function(){return this.get(this._current)}},{key:"currentIndex",value:function(){return this._current}},{key:"lastIndex",value:function(){return this.length()-1}},{key:"next",value:function(){if(this._current<this.lastIndex()){var t=this._current,e=this._current+1;this.goTo(e,function(){this.trigger("next",this.get(t),this.get(e))})}return!1}},{key:"back",value:function(){if(this._current>0){var t=this._current,e=this._current-1;this.goTo(e,function(){this.trigger("back",this.get(t),this.get(e))})}return!1}},{key:"first",value:function(){return this.goTo(0)}},{key:"finish",value:function(){if(this._current===this.lastIndex()){var t=this.current();t.validate()?(this.trigger("finish"),t.leave("error"),t.enter("done")):t.enter("error")}}},{key:"reset",value:function(){this._current=0,a.default.each(this.steps,function(t,e){e.reset()}),this.trigger("reset")}}],[{key:"setDefaults",value:function(t){a.default.extend(!0,o,a.default.isPlainObject(t)&&t)}}]),t}();(0,a.default)(document).on("click","[data-wizard]",function(t){var e=void 0,i=(0,a.default)(this),n=(0,a.default)(i.attr("data-target")||(e=i.attr("href"))&&e.replace(/.*(?=#[^\s]+$)/,"")).data("wizard");if(n){var s=i.data("wizard");/^(back|next|first|finish|reset)$/.test(s)&&n[s](),t.preventDefault()}});var c={version:"0.4.4"},f=a.default.fn.wizard,v=function(t){for(var e=arguments.length,i=Array(e>1?e-1:0),n=1;n<e;n++)i[n-1]=arguments[n];if("string"==typeof t){var s=t;if(/^_/.test(s))return!1;if(!/^(get)/.test(s))return this.each(function(){var t=a.default.data(this,"wizard");t&&"function"==typeof t[s]&&t[s].apply(t,i)});var r=this.first().data("wizard");if(r&&"function"==typeof r[s])return r[s].apply(r,i)}return this.each(function(){(0,a.default)(this).data("wizard")||(0,a.default)(this).data("wizard",new h(this,t))})};a.default.fn.wizard=v,a.default.wizard=a.default.extend({setDefaults:h.setDefaults,noConflict:function(){return a.default.fn.wizard=f,v}},c)});
//# sourceMappingURL=jquery-wizard.min.js.map
;;