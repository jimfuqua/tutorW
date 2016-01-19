/*! jQuery v1.9.1 | (c) 2005, 2012 jQuery Foundation, Inc. | jquery.org/license
*/(function(e,t){var n,r,i=typeof t,o=e.document,a=e.location,s=e.jQuery,u=e.$,l={},c=[],p="1.9.1",f=c.concat,d=c.push,h=c.slice,g=c.indexOf,m=l.toString,y=l.hasOwnProperty,v=p.trim,b=function(e,t){return new b.fn.init(e,t,r)},x=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,w=/\S+/g,T=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,N=/^(?:(<[\w\W]+>)[^>]*|#([\w-]*))$/,C=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,k=/^[\],:{}\s]*$/,E=/(?:^|:|,)(?:\s*\[)+/g,S=/\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,A=/"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,j=/^-ms-/,D=/-([\da-z])/gi,L=function(e,t){return t.toUpperCase()},H=function(e){(o.addEventListener||"load"===e.type||"complete"===o.readyState)&&(q(),b.ready())},q=function(){o.addEventListener?(o.removeEventListener("DOMContentLoaded",H,!1),e.removeEventListener("load",H,!1)):(o.detachEvent("onreadystatechange",H),e.detachEvent("onload",H))};b.fn=b.prototype={jquery:p,constructor:b,init:function(e,n,r){var i,a;if(!e)return this;if("string"==typeof e){if(i="<"===e.charAt(0)&&">"===e.charAt(e.length-1)&&e.length>=3?[null,e,null]:N.exec(e),!i||!i[1]&&n)return!n||n.jquery?(n||r).find(e):this.constructor(n).find(e);if(i[1]){if(n=n instanceof b?n[0]:n,b.merge(this,b.parseHTML(i[1],n&&n.nodeType?n.ownerDocument||n:o,!0)),C.test(i[1])&&b.isPlainObject(n))for(i in n)b.isFunction(this[i])?this[i](n[i]):this.attr(i,n[i]);return this}if(a=o.getElementById(i[2]),a&&a.parentNode){if(a.id!==i[2])return r.find(e);this.length=1,this[0]=a}return this.context=o,this.selector=e,this}return e.nodeType?(this.context=this[0]=e,this.length=1,this):b.isFunction(e)?r.ready(e):(e.selector!==t&&(this.selector=e.selector,this.context=e.context),b.makeArray(e,this))},selector:"",length:0,size:function(){return this.length},toArray:function(){return h.call(this)},get:function(e){return null==e?this.toArray():0>e?this[this.length+e]:this[e]},pushStack:function(e){var t=b.merge(this.constructor(),e);return t.prevObject=this,t.context=this.context,t},each:function(e,t){return b.each(this,e,t)},ready:function(e){return b.ready.promise().done(e),this},slice:function(){return this.pushStack(h.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(e){var t=this.length,n=+e+(0>e?t:0);return this.pushStack(n>=0&&t>n?[this[n]]:[])},map:function(e){return this.pushStack(b.map(this,function(t,n){return e.call(t,n,t)}))},end:function(){return this.prevObject||this.constructor(null)},push:d,sort:[].sort,splice:[].splice},b.fn.init.prototype=b.fn,b.extend=b.fn.extend=function(){var e,n,r,i,o,a,s=arguments[0]||{},u=1,l=arguments.length,c=!1;for("boolean"==typeof s&&(c=s,s=arguments[1]||{},u=2),"object"==typeof s||b.isFunction(s)||(s={}),l===u&&(s=this,--u);l>u;u++)if(null!=(o=arguments[u]))for(i in o)e=s[i],r=o[i],s!==r&&(c&&r&&(b.isPlainObject(r)||(n=b.isArray(r)))?(n?(n=!1,a=e&&b.isArray(e)?e:[]):a=e&&b.isPlainObject(e)?e:{},s[i]=b.extend(c,a,r)):r!==t&&(s[i]=r));return s},b.extend({noConflict:function(t){return e.$===b&&(e.$=u),t&&e.jQuery===b&&(e.jQuery=s),b},isReady:!1,readyWait:1,holdReady:function(e){e?b.readyWait++:b.ready(!0)},ready:function(e){if(e===!0?!--b.readyWait:!b.isReady){if(!o.body)return setTimeout(b.ready);b.isReady=!0,e!==!0&&--b.readyWait>0||(n.resolveWith(o,[b]),b.fn.trigger&&b(o).trigger("ready").off("ready"))}},isFunction:function(e){return"function"===b.type(e)},isArray:Array.isArray||function(e){return"array"===b.type(e)},isWindow:function(e){return null!=e&&e==e.window},isNumeric:function(e){return!isNaN(parseFloat(e))&&isFinite(e)},type:function(e){return null==e?e+"":"object"==typeof e||"function"==typeof e?l[m.call(e)]||"object":typeof e},isPlainObject:function(e){if(!e||"object"!==b.type(e)||e.nodeType||b.isWindow(e))return!1;try{if(e.constructor&&!y.call(e,"constructor")&&!y.call(e.constructor.prototype,"isPrototypeOf"))return!1}catch(n){return!1}var r;for(r in e);return r===t||y.call(e,r)},isEmptyObject:function(e){var t;for(t in e)return!1;return!0},error:function(e){throw Error(e)},parseHTML:function(e,t,n){if(!e||"string"!=typeof e)return null;"boolean"==typeof t&&(n=t,t=!1),t=t||o;var r=C.exec(e),i=!n&&[];return r?[t.createElement(r[1])]:(r=b.buildFragment([e],t,i),i&&b(i).remove(),b.merge([],r.childNodes))},parseJSON:function(n){return e.JSON&&e.JSON.parse?e.JSON.parse(n):null===n?n:"string"==typeof n&&(n=b.trim(n),n&&k.test(n.replace(S,"@").replace(A,"]").replace(E,"")))?Function("return "+n)():(b.error("Invalid JSON: "+n),t)},parseXML:function(n){var r,i;if(!n||"string"!=typeof n)return null;try{e.DOMParser?(i=new DOMParser,r=i.parseFromString(n,"text/xml")):(r=new ActiveXObject("Microsoft.XMLDOM"),r.async="false",r.loadXML(n))}catch(o){r=t}return r&&r.documentElement&&!r.getElementsByTagName("parsererror").length||b.error("Invalid XML: "+n),r},noop:function(){},globalEval:function(t){t&&b.trim(t)&&(e.execScript||function(t){e.eval.call(e,t)})(t)},camelCase:function(e){return e.replace(j,"ms-").replace(D,L)},nodeName:function(e,t){return e.nodeName&&e.nodeName.toLowerCase()===t.toLowerCase()},each:function(e,t,n){var r,i=0,o=e.length,a=M(e);if(n){if(a){for(;o>i;i++)if(r=t.apply(e[i],n),r===!1)break}else for(i in e)if(r=t.apply(e[i],n),r===!1)break}else if(a){for(;o>i;i++)if(r=t.call(e[i],i,e[i]),r===!1)break}else for(i in e)if(r=t.call(e[i],i,e[i]),r===!1)break;return e},trim:v&&!v.call("\ufeff\u00a0")?function(e){return null==e?"":v.call(e)}:function(e){return null==e?"":(e+"").replace(T,"")},makeArray:function(e,t){var n=t||[];return null!=e&&(M(Object(e))?b.merge(n,"string"==typeof e?[e]:e):d.call(n,e)),n},inArray:function(e,t,n){var r;if(t){if(g)return g.call(t,e,n);for(r=t.length,n=n?0>n?Math.max(0,r+n):n:0;r>n;n++)if(n in t&&t[n]===e)return n}return-1},merge:function(e,n){var r=n.length,i=e.length,o=0;if("number"==typeof r)for(;r>o;o++)e[i++]=n[o];else while(n[o]!==t)e[i++]=n[o++];return e.length=i,e},grep:function(e,t,n){var r,i=[],o=0,a=e.length;for(n=!!n;a>o;o++)r=!!t(e[o],o),n!==r&&i.push(e[o]);return i},map:function(e,t,n){var r,i=0,o=e.length,a=M(e),s=[];if(a)for(;o>i;i++)r=t(e[i],i,n),null!=r&&(s[s.length]=r);else for(i in e)r=t(e[i],i,n),null!=r&&(s[s.length]=r);return f.apply([],s)},guid:1,proxy:function(e,n){var r,i,o;return"string"==typeof n&&(o=e[n],n=e,e=o),b.isFunction(e)?(r=h.call(arguments,2),i=function(){return e.apply(n||this,r.concat(h.call(arguments)))},i.guid=e.guid=e.guid||b.guid++,i):t},access:function(e,n,r,i,o,a,s){var u=0,l=e.length,c=null==r;if("object"===b.type(r)){o=!0;for(u in r)b.access(e,n,u,r[u],!0,a,s)}else if(i!==t&&(o=!0,b.isFunction(i)||(s=!0),c&&(s?(n.call(e,i),n=null):(c=n,n=function(e,t,n){return c.call(b(e),n)})),n))for(;l>u;u++)n(e[u],r,s?i:i.call(e[u],u,n(e[u],r)));return o?e:c?n.call(e):l?n(e[0],r):a},now:function(){return(new Date).getTime()}}),b.ready.promise=function(t){if(!n)if(n=b.Deferred(),"complete"===o.readyState)setTimeout(b.ready);else if(o.addEventListener)o.addEventListener("DOMContentLoaded",H,!1),e.addEventListener("load",H,!1);else{o.attachEvent("onreadystatechange",H),e.attachEvent("onload",H);var r=!1;try{r=null==e.frameElement&&o.documentElement}catch(i){}r&&r.doScroll&&function a(){if(!b.isReady){try{r.doScroll("left")}catch(e){return setTimeout(a,50)}q(),b.ready()}}()}return n.promise(t)},b.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),function(e,t){l["[object "+t+"]"]=t.toLowerCase()});function M(e){var t=e.length,n=b.type(e);return b.isWindow(e)?!1:1===e.nodeType&&t?!0:"array"===n||"function"!==n&&(0===t||"number"==typeof t&&t>0&&t-1 in e)}r=b(o);var _={};function F(e){var t=_[e]={};return b.each(e.match(w)||[],function(e,n){t[n]=!0}),t}b.Callbacks=function(e){e="string"==typeof e?_[e]||F(e):b.extend({},e);var n,r,i,o,a,s,u=[],l=!e.once&&[],c=function(t){for(r=e.memory&&t,i=!0,a=s||0,s=0,o=u.length,n=!0;u&&o>a;a++)if(u[a].apply(t[0],t[1])===!1&&e.stopOnFalse){r=!1;break}n=!1,u&&(l?l.length&&c(l.shift()):r?u=[]:p.disable())},p={add:function(){if(u){var t=u.length;(function i(t){b.each(t,function(t,n){var r=b.type(n);"function"===r?e.unique&&p.has(n)||u.push(n):n&&n.length&&"string"!==r&&i(n)})})(arguments),n?o=u.length:r&&(s=t,c(r))}return this},remove:function(){return u&&b.each(arguments,function(e,t){var r;while((r=b.inArray(t,u,r))>-1)u.splice(r,1),n&&(o>=r&&o--,a>=r&&a--)}),this},has:function(e){return e?b.inArray(e,u)>-1:!(!u||!u.length)},empty:function(){return u=[],this},disable:function(){return u=l=r=t,this},disabled:function(){return!u},lock:function(){return l=t,r||p.disable(),this},locked:function(){return!l},fireWith:function(e,t){return t=t||[],t=[e,t.slice?t.slice():t],!u||i&&!l||(n?l.push(t):c(t)),this},fire:function(){return p.fireWith(this,arguments),this},fired:function(){return!!i}};return p},b.extend({Deferred:function(e){var t=[["resolve","done",b.Callbacks("once memory"),"resolved"],["reject","fail",b.Callbacks("once memory"),"rejected"],["notify","progress",b.Callbacks("memory")]],n="pending",r={state:function(){return n},always:function(){return i.done(arguments).fail(arguments),this},then:function(){var e=arguments;return b.Deferred(function(n){b.each(t,function(t,o){var a=o[0],s=b.isFunction(e[t])&&e[t];i[o[1]](function(){var e=s&&s.apply(this,arguments);e&&b.isFunction(e.promise)?e.promise().done(n.resolve).fail(n.reject).progress(n.notify):n[a+"With"](this===r?n.promise():this,s?[e]:arguments)})}),e=null}).promise()},promise:function(e){return null!=e?b.extend(e,r):r}},i={};return r.pipe=r.then,b.each(t,function(e,o){var a=o[2],s=o[3];r[o[1]]=a.add,s&&a.add(function(){n=s},t[1^e][2].disable,t[2][2].lock),i[o[0]]=function(){return i[o[0]+"With"](this===i?r:this,arguments),this},i[o[0]+"With"]=a.fireWith}),r.promise(i),e&&e.call(i,i),i},when:function(e){var t=0,n=h.call(arguments),r=n.length,i=1!==r||e&&b.isFunction(e.promise)?r:0,o=1===i?e:b.Deferred(),a=function(e,t,n){return function(r){t[e]=this,n[e]=arguments.length>1?h.call(arguments):r,n===s?o.notifyWith(t,n):--i||o.resolveWith(t,n)}},s,u,l;if(r>1)for(s=Array(r),u=Array(r),l=Array(r);r>t;t++)n[t]&&b.isFunction(n[t].promise)?n[t].promise().done(a(t,l,n)).fail(o.reject).progress(a(t,u,s)):--i;return i||o.resolveWith(l,n),o.promise()}}),b.support=function(){var t,n,r,a,s,u,l,c,p,f,d=o.createElement("div");if(d.setAttribute("className","t"),d.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",n=d.getElementsByTagName("*"),r=d.getElementsByTagName("a")[0],!n||!r||!n.length)return{};s=o.createElement("select"),l=s.appendChild(o.createElement("option")),a=d.getElementsByTagName("input")[0],r.style.cssText="top:1px;float:left;opacity:.5",t={getSetAttribute:"t"!==d.className,leadingWhitespace:3===d.firstChild.nodeType,tbody:!d.getElementsByTagName("tbody").length,htmlSerialize:!!d.getElementsByTagName("link").length,style:/top/.test(r.getAttribute("style")),hrefNormalized:"/a"===r.getAttribute("href"),opacity:/^0.5/.test(r.style.opacity),cssFloat:!!r.style.cssFloat,checkOn:!!a.value,optSelected:l.selected,enctype:!!o.createElement("form").enctype,html5Clone:"<:nav></:nav>"!==o.createElement("nav").cloneNode(!0).outerHTML,boxModel:"CSS1Compat"===o.compatMode,deleteExpando:!0,noCloneEvent:!0,inlineBlockNeedsLayout:!1,shrinkWrapBlocks:!1,reliableMarginRight:!0,boxSizingReliable:!0,pixelPosition:!1},a.checked=!0,t.noCloneChecked=a.cloneNode(!0).checked,s.disabled=!0,t.optDisabled=!l.disabled;try{delete d.test}catch(h){t.deleteExpando=!1}a=o.createElement("input"),a.setAttribute("value",""),t.input=""===a.getAttribute("value"),a.value="t",a.setAttribute("type","radio"),t.radioValue="t"===a.value,a.setAttribute("checked","t"),a.setAttribute("name","t"),u=o.createDocumentFragment(),u.appendChild(a),t.appendChecked=a.checked,t.checkClone=u.cloneNode(!0).cloneNode(!0).lastChild.checked,d.attachEvent&&(d.attachEvent("onclick",function(){t.noCloneEvent=!1}),d.cloneNode(!0).click());for(f in{submit:!0,change:!0,focusin:!0})d.setAttribute(c="on"+f,"t"),t[f+"Bubbles"]=c in e||d.attributes[c].expando===!1;return d.style.backgroundClip="content-box",d.cloneNode(!0).style.backgroundClip="",t.clearCloneStyle="content-box"===d.style.backgroundClip,b(function(){var n,r,a,s="padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",u=o.getElementsByTagName("body")[0];u&&(n=o.createElement("div"),n.style.cssText="border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px",u.appendChild(n).appendChild(d),d.innerHTML="<table><tr><td></td><td>t</td></tr></table>",a=d.getElementsByTagName("td"),a[0].style.cssText="padding:0;margin:0;border:0;display:none",p=0===a[0].offsetHeight,a[0].style.display="",a[1].style.display="none",t.reliableHiddenOffsets=p&&0===a[0].offsetHeight,d.innerHTML="",d.style.cssText="box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;",t.boxSizing=4===d.offsetWidth,t.doesNotIncludeMarginInBodyOffset=1!==u.offsetTop,e.getComputedStyle&&(t.pixelPosition="1%"!==(e.getComputedStyle(d,null)||{}).top,t.boxSizingReliable="4px"===(e.getComputedStyle(d,null)||{width:"4px"}).width,r=d.appendChild(o.createElement("div")),r.style.cssText=d.style.cssText=s,r.style.marginRight=r.style.width="0",d.style.width="1px",t.reliableMarginRight=!parseFloat((e.getComputedStyle(r,null)||{}).marginRight)),typeof d.style.zoom!==i&&(d.innerHTML="",d.style.cssText=s+"width:1px;padding:1px;display:inline;zoom:1",t.inlineBlockNeedsLayout=3===d.offsetWidth,d.style.display="block",d.innerHTML="<div></div>",d.firstChild.style.width="5px",t.shrinkWrapBlocks=3!==d.offsetWidth,t.inlineBlockNeedsLayout&&(u.style.zoom=1)),u.removeChild(n),n=d=a=r=null)}),n=s=u=l=r=a=null,t}();var O=/(?:\{[\s\S]*\}|\[[\s\S]*\])$/,B=/([A-Z])/g;function P(e,n,r,i){if(b.acceptData(e)){var o,a,s=b.expando,u="string"==typeof n,l=e.nodeType,p=l?b.cache:e,f=l?e[s]:e[s]&&s;if(f&&p[f]&&(i||p[f].data)||!u||r!==t)return f||(l?e[s]=f=c.pop()||b.guid++:f=s),p[f]||(p[f]={},l||(p[f].toJSON=b.noop)),("object"==typeof n||"function"==typeof n)&&(i?p[f]=b.extend(p[f],n):p[f].data=b.extend(p[f].data,n)),o=p[f],i||(o.data||(o.data={}),o=o.data),r!==t&&(o[b.camelCase(n)]=r),u?(a=o[n],null==a&&(a=o[b.camelCase(n)])):a=o,a}}function R(e,t,n){if(b.acceptData(e)){var r,i,o,a=e.nodeType,s=a?b.cache:e,u=a?e[b.expando]:b.expando;if(s[u]){if(t&&(o=n?s[u]:s[u].data)){b.isArray(t)?t=t.concat(b.map(t,b.camelCase)):t in o?t=[t]:(t=b.camelCase(t),t=t in o?[t]:t.split(" "));for(r=0,i=t.length;i>r;r++)delete o[t[r]];if(!(n?$:b.isEmptyObject)(o))return}(n||(delete s[u].data,$(s[u])))&&(a?b.cleanData([e],!0):b.support.deleteExpando||s!=s.window?delete s[u]:s[u]=null)}}}b.extend({cache:{},expando:"jQuery"+(p+Math.random()).replace(/\D/g,""),noData:{embed:!0,object:"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",applet:!0},hasData:function(e){return e=e.nodeType?b.cache[e[b.expando]]:e[b.expando],!!e&&!$(e)},data:function(e,t,n){return P(e,t,n)},removeData:function(e,t){return R(e,t)},_data:function(e,t,n){return P(e,t,n,!0)},_removeData:function(e,t){return R(e,t,!0)},acceptData:function(e){if(e.nodeType&&1!==e.nodeType&&9!==e.nodeType)return!1;var t=e.nodeName&&b.noData[e.nodeName.toLowerCase()];return!t||t!==!0&&e.getAttribute("classid")===t}}),b.fn.extend({data:function(e,n){var r,i,o=this[0],a=0,s=null;if(e===t){if(this.length&&(s=b.data(o),1===o.nodeType&&!b._data(o,"parsedAttrs"))){for(r=o.attributes;r.length>a;a++)i=r[a].name,i.indexOf("data-")||(i=b.camelCase(i.slice(5)),W(o,i,s[i]));b._data(o,"parsedAttrs",!0)}return s}return"object"==typeof e?this.each(function(){b.data(this,e)}):b.access(this,function(n){return n===t?o?W(o,e,b.data(o,e)):null:(this.each(function(){b.data(this,e,n)}),t)},null,n,arguments.length>1,null,!0)},removeData:function(e){return this.each(function(){b.removeData(this,e)})}});function W(e,n,r){if(r===t&&1===e.nodeType){var i="data-"+n.replace(B,"-$1").toLowerCase();if(r=e.getAttribute(i),"string"==typeof r){try{r="true"===r?!0:"false"===r?!1:"null"===r?null:+r+""===r?+r:O.test(r)?b.parseJSON(r):r}catch(o){}b.data(e,n,r)}else r=t}return r}function $(e){var t;for(t in e)if(("data"!==t||!b.isEmptyObject(e[t]))&&"toJSON"!==t)return!1;return!0}b.extend({queue:function(e,n,r){var i;return e?(n=(n||"fx")+"queue",i=b._data(e,n),r&&(!i||b.isArray(r)?i=b._data(e,n,b.makeArray(r)):i.push(r)),i||[]):t},dequeue:function(e,t){t=t||"fx";var n=b.queue(e,t),r=n.length,i=n.shift(),o=b._queueHooks(e,t),a=function(){b.dequeue(e,t)};"inprogress"===i&&(i=n.shift(),r--),o.cur=i,i&&("fx"===t&&n.unshift("inprogress"),delete o.stop,i.call(e,a,o)),!r&&o&&o.empty.fire()},_queueHooks:function(e,t){var n=t+"queueHooks";return b._data(e,n)||b._data(e,n,{empty:b.Callbacks("once memory").add(function(){b._removeData(e,t+"queue"),b._removeData(e,n)})})}}),b.fn.extend({queue:function(e,n){var r=2;return"string"!=typeof e&&(n=e,e="fx",r--),r>arguments.length?b.queue(this[0],e):n===t?this:this.each(function(){var t=b.queue(this,e,n);b._queueHooks(this,e),"fx"===e&&"inprogress"!==t[0]&&b.dequeue(this,e)})},dequeue:function(e){return this.each(function(){b.dequeue(this,e)})},delay:function(e,t){return e=b.fx?b.fx.speeds[e]||e:e,t=t||"fx",this.queue(t,function(t,n){var r=setTimeout(t,e);n.stop=function(){clearTimeout(r)}})},clearQueue:function(e){return this.queue(e||"fx",[])},promise:function(e,n){var r,i=1,o=b.Deferred(),a=this,s=this.length,u=function(){--i||o.resolveWith(a,[a])};"string"!=typeof e&&(n=e,e=t),e=e||"fx";while(s--)r=b._data(a[s],e+"queueHooks"),r&&r.empty&&(i++,r.empty.add(u));return u(),o.promise(n)}});var I,z,X=/[\t\r\n]/g,U=/\r/g,V=/^(?:input|select|textarea|button|object)$/i,Y=/^(?:a|area)$/i,J=/^(?:checked|selected|autofocus|autoplay|async|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped)$/i,G=/^(?:checked|selected)$/i,Q=b.support.getSetAttribute,K=b.support.input;b.fn.extend({attr:function(e,t){return b.access(this,b.attr,e,t,arguments.length>1)},removeAttr:function(e){return this.each(function(){b.removeAttr(this,e)})},prop:function(e,t){return b.access(this,b.prop,e,t,arguments.length>1)},removeProp:function(e){return e=b.propFix[e]||e,this.each(function(){try{this[e]=t,delete this[e]}catch(n){}})},addClass:function(e){var t,n,r,i,o,a=0,s=this.length,u="string"==typeof e&&e;if(b.isFunction(e))return this.each(function(t){b(this).addClass(e.call(this,t,this.className))});if(u)for(t=(e||"").match(w)||[];s>a;a++)if(n=this[a],r=1===n.nodeType&&(n.className?(" "+n.className+" ").replace(X," "):" ")){o=0;while(i=t[o++])0>r.indexOf(" "+i+" ")&&(r+=i+" ");n.className=b.trim(r)}return this},removeClass:function(e){var t,n,r,i,o,a=0,s=this.length,u=0===arguments.length||"string"==typeof e&&e;if(b.isFunction(e))return this.each(function(t){b(this).removeClass(e.call(this,t,this.className))});if(u)for(t=(e||"").match(w)||[];s>a;a++)if(n=this[a],r=1===n.nodeType&&(n.className?(" "+n.className+" ").replace(X," "):"")){o=0;while(i=t[o++])while(r.indexOf(" "+i+" ")>=0)r=r.replace(" "+i+" "," ");n.className=e?b.trim(r):""}return this},toggleClass:function(e,t){var n=typeof e,r="boolean"==typeof t;return b.isFunction(e)?this.each(function(n){b(this).toggleClass(e.call(this,n,this.className,t),t)}):this.each(function(){if("string"===n){var o,a=0,s=b(this),u=t,l=e.match(w)||[];while(o=l[a++])u=r?u:!s.hasClass(o),s[u?"addClass":"removeClass"](o)}else(n===i||"boolean"===n)&&(this.className&&b._data(this,"__className__",this.className),this.className=this.className||e===!1?"":b._data(this,"__className__")||"")})},hasClass:function(e){var t=" "+e+" ",n=0,r=this.length;for(;r>n;n++)if(1===this[n].nodeType&&(" "+this[n].className+" ").replace(X," ").indexOf(t)>=0)return!0;return!1},val:function(e){var n,r,i,o=this[0];{if(arguments.length)return i=b.isFunction(e),this.each(function(n){var o,a=b(this);1===this.nodeType&&(o=i?e.call(this,n,a.val()):e,null==o?o="":"number"==typeof o?o+="":b.isArray(o)&&(o=b.map(o,function(e){return null==e?"":e+""})),r=b.valHooks[this.type]||b.valHooks[this.nodeName.toLowerCase()],r&&"set"in r&&r.set(this,o,"value")!==t||(this.value=o))});if(o)return r=b.valHooks[o.type]||b.valHooks[o.nodeName.toLowerCase()],r&&"get"in r&&(n=r.get(o,"value"))!==t?n:(n=o.value,"string"==typeof n?n.replace(U,""):null==n?"":n)}}}),b.extend({valHooks:{option:{get:function(e){var t=e.attributes.value;return!t||t.specified?e.value:e.text}},select:{get:function(e){var t,n,r=e.options,i=e.selectedIndex,o="select-one"===e.type||0>i,a=o?null:[],s=o?i+1:r.length,u=0>i?s:o?i:0;for(;s>u;u++)if(n=r[u],!(!n.selected&&u!==i||(b.support.optDisabled?n.disabled:null!==n.getAttribute("disabled"))||n.parentNode.disabled&&b.nodeName(n.parentNode,"optgroup"))){if(t=b(n).val(),o)return t;a.push(t)}return a},set:function(e,t){var n=b.makeArray(t);return b(e).find("option").each(function(){this.selected=b.inArray(b(this).val(),n)>=0}),n.length||(e.selectedIndex=-1),n}}},attr:function(e,n,r){var o,a,s,u=e.nodeType;if(e&&3!==u&&8!==u&&2!==u)return typeof e.getAttribute===i?b.prop(e,n,r):(a=1!==u||!b.isXMLDoc(e),a&&(n=n.toLowerCase(),o=b.attrHooks[n]||(J.test(n)?z:I)),r===t?o&&a&&"get"in o&&null!==(s=o.get(e,n))?s:(typeof e.getAttribute!==i&&(s=e.getAttribute(n)),null==s?t:s):null!==r?o&&a&&"set"in o&&(s=o.set(e,r,n))!==t?s:(e.setAttribute(n,r+""),r):(b.removeAttr(e,n),t))},removeAttr:function(e,t){var n,r,i=0,o=t&&t.match(w);if(o&&1===e.nodeType)while(n=o[i++])r=b.propFix[n]||n,J.test(n)?!Q&&G.test(n)?e[b.camelCase("default-"+n)]=e[r]=!1:e[r]=!1:b.attr(e,n,""),e.removeAttribute(Q?n:r)},attrHooks:{type:{set:function(e,t){if(!b.support.radioValue&&"radio"===t&&b.nodeName(e,"input")){var n=e.value;return e.setAttribute("type",t),n&&(e.value=n),t}}}},propFix:{tabindex:"tabIndex",readonly:"readOnly","for":"htmlFor","class":"className",maxlength:"maxLength",cellspacing:"cellSpacing",cellpadding:"cellPadding",rowspan:"rowSpan",colspan:"colSpan",usemap:"useMap",frameborder:"frameBorder",contenteditable:"contentEditable"},prop:function(e,n,r){var i,o,a,s=e.nodeType;if(e&&3!==s&&8!==s&&2!==s)return a=1!==s||!b.isXMLDoc(e),a&&(n=b.propFix[n]||n,o=b.propHooks[n]),r!==t?o&&"set"in o&&(i=o.set(e,r,n))!==t?i:e[n]=r:o&&"get"in o&&null!==(i=o.get(e,n))?i:e[n]},propHooks:{tabIndex:{get:function(e){var n=e.getAttributeNode("tabindex");return n&&n.specified?parseInt(n.value,10):V.test(e.nodeName)||Y.test(e.nodeName)&&e.href?0:t}}}}),z={get:function(e,n){var r=b.prop(e,n),i="boolean"==typeof r&&e.getAttribute(n),o="boolean"==typeof r?K&&Q?null!=i:G.test(n)?e[b.camelCase("default-"+n)]:!!i:e.getAttributeNode(n);return o&&o.value!==!1?n.toLowerCase():t},set:function(e,t,n){return t===!1?b.removeAttr(e,n):K&&Q||!G.test(n)?e.setAttribute(!Q&&b.propFix[n]||n,n):e[b.camelCase("default-"+n)]=e[n]=!0,n}},K&&Q||(b.attrHooks.value={get:function(e,n){var r=e.getAttributeNode(n);return b.nodeName(e,"input")?e.defaultValue:r&&r.specified?r.value:t},set:function(e,n,r){return b.nodeName(e,"input")?(e.defaultValue=n,t):I&&I.set(e,n,r)}}),Q||(I=b.valHooks.button={get:function(e,n){var r=e.getAttributeNode(n);return r&&("id"===n||"name"===n||"coords"===n?""!==r.value:r.specified)?r.value:t},set:function(e,n,r){var i=e.getAttributeNode(r);return i||e.setAttributeNode(i=e.ownerDocument.createAttribute(r)),i.value=n+="","value"===r||n===e.getAttribute(r)?n:t}},b.attrHooks.contenteditable={get:I.get,set:function(e,t,n){I.set(e,""===t?!1:t,n)}},b.each(["width","height"],function(e,n){b.attrHooks[n]=b.extend(b.attrHooks[n],{set:function(e,r){return""===r?(e.setAttribute(n,"auto"),r):t}})})),b.support.hrefNormalized||(b.each(["href","src","width","height"],function(e,n){b.attrHooks[n]=b.extend(b.attrHooks[n],{get:function(e){var r=e.getAttribute(n,2);return null==r?t:r}})}),b.each(["href","src"],function(e,t){b.propHooks[t]={get:function(e){return e.getAttribute(t,4)}}})),b.support.style||(b.attrHooks.style={get:function(e){return e.style.cssText||t},set:function(e,t){return e.style.cssText=t+""}}),b.support.optSelected||(b.propHooks.selected=b.extend(b.propHooks.selected,{get:function(e){var t=e.parentNode;return t&&(t.selectedIndex,t.parentNode&&t.parentNode.selectedIndex),null}})),b.support.enctype||(b.propFix.enctype="encoding"),b.support.checkOn||b.each(["radio","checkbox"],function(){b.valHooks[this]={get:function(e){return null===e.getAttribute("value")?"on":e.value}}}),b.each(["radio","checkbox"],function(){b.valHooks[this]=b.extend(b.valHooks[this],{set:function(e,n){return b.isArray(n)?e.checked=b.inArray(b(e).val(),n)>=0:t}})});var Z=/^(?:input|select|textarea)$/i,et=/^key/,tt=/^(?:mouse|contextmenu)|click/,nt=/^(?:focusinfocus|focusoutblur)$/,rt=/^([^.]*)(?:\.(.+)|)$/;function it(){return!0}function ot(){return!1}b.event={global:{},add:function(e,n,r,o,a){var s,u,l,c,p,f,d,h,g,m,y,v=b._data(e);if(v){r.handler&&(c=r,r=c.handler,a=c.selector),r.guid||(r.guid=b.guid++),(u=v.events)||(u=v.events={}),(f=v.handle)||(f=v.handle=function(e){return typeof b===i||e&&b.event.triggered===e.type?t:b.event.dispatch.apply(f.elem,arguments)},f.elem=e),n=(n||"").match(w)||[""],l=n.length;while(l--)s=rt.exec(n[l])||[],g=y=s[1],m=(s[2]||"").split(".").sort(),p=b.event.special[g]||{},g=(a?p.delegateType:p.bindType)||g,p=b.event.special[g]||{},d=b.extend({type:g,origType:y,data:o,handler:r,guid:r.guid,selector:a,needsContext:a&&b.expr.match.needsContext.test(a),namespace:m.join(".")},c),(h=u[g])||(h=u[g]=[],h.delegateCount=0,p.setup&&p.setup.call(e,o,m,f)!==!1||(e.addEventListener?e.addEventListener(g,f,!1):e.attachEvent&&e.attachEvent("on"+g,f))),p.add&&(p.add.call(e,d),d.handler.guid||(d.handler.guid=r.guid)),a?h.splice(h.delegateCount++,0,d):h.push(d),b.event.global[g]=!0;e=null}},remove:function(e,t,n,r,i){var o,a,s,u,l,c,p,f,d,h,g,m=b.hasData(e)&&b._data(e);if(m&&(c=m.events)){t=(t||"").match(w)||[""],l=t.length;while(l--)if(s=rt.exec(t[l])||[],d=g=s[1],h=(s[2]||"").split(".").sort(),d){p=b.event.special[d]||{},d=(r?p.delegateType:p.bindType)||d,f=c[d]||[],s=s[2]&&RegExp("(^|\\.)"+h.join("\\.(?:.*\\.|)")+"(\\.|$)"),u=o=f.length;while(o--)a=f[o],!i&&g!==a.origType||n&&n.guid!==a.guid||s&&!s.test(a.namespace)||r&&r!==a.selector&&("**"!==r||!a.selector)||(f.splice(o,1),a.selector&&f.delegateCount--,p.remove&&p.remove.call(e,a));u&&!f.length&&(p.teardown&&p.teardown.call(e,h,m.handle)!==!1||b.removeEvent(e,d,m.handle),delete c[d])}else for(d in c)b.event.remove(e,d+t[l],n,r,!0);b.isEmptyObject(c)&&(delete m.handle,b._removeData(e,"events"))}},trigger:function(n,r,i,a){var s,u,l,c,p,f,d,h=[i||o],g=y.call(n,"type")?n.type:n,m=y.call(n,"namespace")?n.namespace.split("."):[];if(l=f=i=i||o,3!==i.nodeType&&8!==i.nodeType&&!nt.test(g+b.event.triggered)&&(g.indexOf(".")>=0&&(m=g.split("."),g=m.shift(),m.sort()),u=0>g.indexOf(":")&&"on"+g,n=n[b.expando]?n:new b.Event(g,"object"==typeof n&&n),n.isTrigger=!0,n.namespace=m.join("."),n.namespace_re=n.namespace?RegExp("(^|\\.)"+m.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,n.result=t,n.target||(n.target=i),r=null==r?[n]:b.makeArray(r,[n]),p=b.event.special[g]||{},a||!p.trigger||p.trigger.apply(i,r)!==!1)){if(!a&&!p.noBubble&&!b.isWindow(i)){for(c=p.delegateType||g,nt.test(c+g)||(l=l.parentNode);l;l=l.parentNode)h.push(l),f=l;f===(i.ownerDocument||o)&&h.push(f.defaultView||f.parentWindow||e)}d=0;while((l=h[d++])&&!n.isPropagationStopped())n.type=d>1?c:p.bindType||g,s=(b._data(l,"events")||{})[n.type]&&b._data(l,"handle"),s&&s.apply(l,r),s=u&&l[u],s&&b.acceptData(l)&&s.apply&&s.apply(l,r)===!1&&n.preventDefault();if(n.type=g,!(a||n.isDefaultPrevented()||p._default&&p._default.apply(i.ownerDocument,r)!==!1||"click"===g&&b.nodeName(i,"a")||!b.acceptData(i)||!u||!i[g]||b.isWindow(i))){f=i[u],f&&(i[u]=null),b.event.triggered=g;try{i[g]()}catch(v){}b.event.triggered=t,f&&(i[u]=f)}return n.result}},dispatch:function(e){e=b.event.fix(e);var n,r,i,o,a,s=[],u=h.call(arguments),l=(b._data(this,"events")||{})[e.type]||[],c=b.event.special[e.type]||{};if(u[0]=e,e.delegateTarget=this,!c.preDispatch||c.preDispatch.call(this,e)!==!1){s=b.event.handlers.call(this,e,l),n=0;while((o=s[n++])&&!e.isPropagationStopped()){e.currentTarget=o.elem,a=0;while((i=o.handlers[a++])&&!e.isImmediatePropagationStopped())(!e.namespace_re||e.namespace_re.test(i.namespace))&&(e.handleObj=i,e.data=i.data,r=((b.event.special[i.origType]||{}).handle||i.handler).apply(o.elem,u),r!==t&&(e.result=r)===!1&&(e.preventDefault(),e.stopPropagation()))}return c.postDispatch&&c.postDispatch.call(this,e),e.result}},handlers:function(e,n){var r,i,o,a,s=[],u=n.delegateCount,l=e.target;if(u&&l.nodeType&&(!e.button||"click"!==e.type))for(;l!=this;l=l.parentNode||this)if(1===l.nodeType&&(l.disabled!==!0||"click"!==e.type)){for(o=[],a=0;u>a;a++)i=n[a],r=i.selector+" ",o[r]===t&&(o[r]=i.needsContext?b(r,this).index(l)>=0:b.find(r,this,null,[l]).length),o[r]&&o.push(i);o.length&&s.push({elem:l,handlers:o})}return n.length>u&&s.push({elem:this,handlers:n.slice(u)}),s},fix:function(e){if(e[b.expando])return e;var t,n,r,i=e.type,a=e,s=this.fixHooks[i];s||(this.fixHooks[i]=s=tt.test(i)?this.mouseHooks:et.test(i)?this.keyHooks:{}),r=s.props?this.props.concat(s.props):this.props,e=new b.Event(a),t=r.length;while(t--)n=r[t],e[n]=a[n];return e.target||(e.target=a.srcElement||o),3===e.target.nodeType&&(e.target=e.target.parentNode),e.metaKey=!!e.metaKey,s.filter?s.filter(e,a):e},props:"altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(e,t){return null==e.which&&(e.which=null!=t.charCode?t.charCode:t.keyCode),e}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(e,n){var r,i,a,s=n.button,u=n.fromElement;return null==e.pageX&&null!=n.clientX&&(i=e.target.ownerDocument||o,a=i.documentElement,r=i.body,e.pageX=n.clientX+(a&&a.scrollLeft||r&&r.scrollLeft||0)-(a&&a.clientLeft||r&&r.clientLeft||0),e.pageY=n.clientY+(a&&a.scrollTop||r&&r.scrollTop||0)-(a&&a.clientTop||r&&r.clientTop||0)),!e.relatedTarget&&u&&(e.relatedTarget=u===e.target?n.toElement:u),e.which||s===t||(e.which=1&s?1:2&s?3:4&s?2:0),e}},special:{load:{noBubble:!0},click:{trigger:function(){return b.nodeName(this,"input")&&"checkbox"===this.type&&this.click?(this.click(),!1):t}},focus:{trigger:function(){if(this!==o.activeElement&&this.focus)try{return this.focus(),!1}catch(e){}},delegateType:"focusin"},blur:{trigger:function(){return this===o.activeElement&&this.blur?(this.blur(),!1):t},delegateType:"focusout"},beforeunload:{postDispatch:function(e){e.result!==t&&(e.originalEvent.returnValue=e.result)}}},simulate:function(e,t,n,r){var i=b.extend(new b.Event,n,{type:e,isSimulated:!0,originalEvent:{}});r?b.event.trigger(i,null,t):b.event.dispatch.call(t,i),i.isDefaultPrevented()&&n.preventDefault()}},b.removeEvent=o.removeEventListener?function(e,t,n){e.removeEventListener&&e.removeEventListener(t,n,!1)}:function(e,t,n){var r="on"+t;e.detachEvent&&(typeof e[r]===i&&(e[r]=null),e.detachEvent(r,n))},b.Event=function(e,n){return this instanceof b.Event?(e&&e.type?(this.originalEvent=e,this.type=e.type,this.isDefaultPrevented=e.defaultPrevented||e.returnValue===!1||e.getPreventDefault&&e.getPreventDefault()?it:ot):this.type=e,n&&b.extend(this,n),this.timeStamp=e&&e.timeStamp||b.now(),this[b.expando]=!0,t):new b.Event(e,n)},b.Event.prototype={isDefaultPrevented:ot,isPropagationStopped:ot,isImmediatePropagationStopped:ot,preventDefault:function(){var e=this.originalEvent;this.isDefaultPrevented=it,e&&(e.preventDefault?e.preventDefault():e.returnValue=!1)},stopPropagation:function(){var e=this.originalEvent;this.isPropagationStopped=it,e&&(e.stopPropagation&&e.stopPropagation(),e.cancelBubble=!0)},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=it,this.stopPropagation()}},b.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(e,t){b.event.special[e]={delegateType:t,bindType:t,handle:function(e){var n,r=this,i=e.relatedTarget,o=e.handleObj;
return(!i||i!==r&&!b.contains(r,i))&&(e.type=o.origType,n=o.handler.apply(this,arguments),e.type=t),n}}}),b.support.submitBubbles||(b.event.special.submit={setup:function(){return b.nodeName(this,"form")?!1:(b.event.add(this,"click._submit keypress._submit",function(e){var n=e.target,r=b.nodeName(n,"input")||b.nodeName(n,"button")?n.form:t;r&&!b._data(r,"submitBubbles")&&(b.event.add(r,"submit._submit",function(e){e._submit_bubble=!0}),b._data(r,"submitBubbles",!0))}),t)},postDispatch:function(e){e._submit_bubble&&(delete e._submit_bubble,this.parentNode&&!e.isTrigger&&b.event.simulate("submit",this.parentNode,e,!0))},teardown:function(){return b.nodeName(this,"form")?!1:(b.event.remove(this,"._submit"),t)}}),b.support.changeBubbles||(b.event.special.change={setup:function(){return Z.test(this.nodeName)?(("checkbox"===this.type||"radio"===this.type)&&(b.event.add(this,"propertychange._change",function(e){"checked"===e.originalEvent.propertyName&&(this._just_changed=!0)}),b.event.add(this,"click._change",function(e){this._just_changed&&!e.isTrigger&&(this._just_changed=!1),b.event.simulate("change",this,e,!0)})),!1):(b.event.add(this,"beforeactivate._change",function(e){var t=e.target;Z.test(t.nodeName)&&!b._data(t,"changeBubbles")&&(b.event.add(t,"change._change",function(e){!this.parentNode||e.isSimulated||e.isTrigger||b.event.simulate("change",this.parentNode,e,!0)}),b._data(t,"changeBubbles",!0))}),t)},handle:function(e){var n=e.target;return this!==n||e.isSimulated||e.isTrigger||"radio"!==n.type&&"checkbox"!==n.type?e.handleObj.handler.apply(this,arguments):t},teardown:function(){return b.event.remove(this,"._change"),!Z.test(this.nodeName)}}),b.support.focusinBubbles||b.each({focus:"focusin",blur:"focusout"},function(e,t){var n=0,r=function(e){b.event.simulate(t,e.target,b.event.fix(e),!0)};b.event.special[t]={setup:function(){0===n++&&o.addEventListener(e,r,!0)},teardown:function(){0===--n&&o.removeEventListener(e,r,!0)}}}),b.fn.extend({on:function(e,n,r,i,o){var a,s;if("object"==typeof e){"string"!=typeof n&&(r=r||n,n=t);for(a in e)this.on(a,n,r,e[a],o);return this}if(null==r&&null==i?(i=n,r=n=t):null==i&&("string"==typeof n?(i=r,r=t):(i=r,r=n,n=t)),i===!1)i=ot;else if(!i)return this;return 1===o&&(s=i,i=function(e){return b().off(e),s.apply(this,arguments)},i.guid=s.guid||(s.guid=b.guid++)),this.each(function(){b.event.add(this,e,i,r,n)})},one:function(e,t,n,r){return this.on(e,t,n,r,1)},off:function(e,n,r){var i,o;if(e&&e.preventDefault&&e.handleObj)return i=e.handleObj,b(e.delegateTarget).off(i.namespace?i.origType+"."+i.namespace:i.origType,i.selector,i.handler),this;if("object"==typeof e){for(o in e)this.off(o,n,e[o]);return this}return(n===!1||"function"==typeof n)&&(r=n,n=t),r===!1&&(r=ot),this.each(function(){b.event.remove(this,e,r,n)})},bind:function(e,t,n){return this.on(e,null,t,n)},unbind:function(e,t){return this.off(e,null,t)},delegate:function(e,t,n,r){return this.on(t,e,n,r)},undelegate:function(e,t,n){return 1===arguments.length?this.off(e,"**"):this.off(t,e||"**",n)},trigger:function(e,t){return this.each(function(){b.event.trigger(e,t,this)})},triggerHandler:function(e,n){var r=this[0];return r?b.event.trigger(e,n,r,!0):t}}),function(e,t){var n,r,i,o,a,s,u,l,c,p,f,d,h,g,m,y,v,x="sizzle"+-new Date,w=e.document,T={},N=0,C=0,k=it(),E=it(),S=it(),A=typeof t,j=1<<31,D=[],L=D.pop,H=D.push,q=D.slice,M=D.indexOf||function(e){var t=0,n=this.length;for(;n>t;t++)if(this[t]===e)return t;return-1},_="[\\x20\\t\\r\\n\\f]",F="(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",O=F.replace("w","w#"),B="([*^$|!~]?=)",P="\\["+_+"*("+F+")"+_+"*(?:"+B+_+"*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|("+O+")|)|)"+_+"*\\]",R=":("+F+")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|"+P.replace(3,8)+")*)|.*)\\)|)",W=RegExp("^"+_+"+|((?:^|[^\\\\])(?:\\\\.)*)"+_+"+$","g"),$=RegExp("^"+_+"*,"+_+"*"),I=RegExp("^"+_+"*([\\x20\\t\\r\\n\\f>+~])"+_+"*"),z=RegExp(R),X=RegExp("^"+O+"$"),U={ID:RegExp("^#("+F+")"),CLASS:RegExp("^\\.("+F+")"),NAME:RegExp("^\\[name=['\"]?("+F+")['\"]?\\]"),TAG:RegExp("^("+F.replace("w","w*")+")"),ATTR:RegExp("^"+P),PSEUDO:RegExp("^"+R),CHILD:RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+_+"*(even|odd|(([+-]|)(\\d*)n|)"+_+"*(?:([+-]|)"+_+"*(\\d+)|))"+_+"*\\)|)","i"),needsContext:RegExp("^"+_+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+_+"*((?:-\\d)?\\d*)"+_+"*\\)|)(?=[^-]|$)","i")},V=/[\x20\t\r\n\f]*[+~]/,Y=/^[^{]+\{\s*\[native code/,J=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,G=/^(?:input|select|textarea|button)$/i,Q=/^h\d$/i,K=/'|\\/g,Z=/\=[\x20\t\r\n\f]*([^'"\]]*)[\x20\t\r\n\f]*\]/g,et=/\\([\da-fA-F]{1,6}[\x20\t\r\n\f]?|.)/g,tt=function(e,t){var n="0x"+t-65536;return n!==n?t:0>n?String.fromCharCode(n+65536):String.fromCharCode(55296|n>>10,56320|1023&n)};try{q.call(w.documentElement.childNodes,0)[0].nodeType}catch(nt){q=function(e){var t,n=[];while(t=this[e++])n.push(t);return n}}function rt(e){return Y.test(e+"")}function it(){var e,t=[];return e=function(n,r){return t.push(n+=" ")>i.cacheLength&&delete e[t.shift()],e[n]=r}}function ot(e){return e[x]=!0,e}function at(e){var t=p.createElement("div");try{return e(t)}catch(n){return!1}finally{t=null}}function st(e,t,n,r){var i,o,a,s,u,l,f,g,m,v;if((t?t.ownerDocument||t:w)!==p&&c(t),t=t||p,n=n||[],!e||"string"!=typeof e)return n;if(1!==(s=t.nodeType)&&9!==s)return[];if(!d&&!r){if(i=J.exec(e))if(a=i[1]){if(9===s){if(o=t.getElementById(a),!o||!o.parentNode)return n;if(o.id===a)return n.push(o),n}else if(t.ownerDocument&&(o=t.ownerDocument.getElementById(a))&&y(t,o)&&o.id===a)return n.push(o),n}else{if(i[2])return H.apply(n,q.call(t.getElementsByTagName(e),0)),n;if((a=i[3])&&T.getByClassName&&t.getElementsByClassName)return H.apply(n,q.call(t.getElementsByClassName(a),0)),n}if(T.qsa&&!h.test(e)){if(f=!0,g=x,m=t,v=9===s&&e,1===s&&"object"!==t.nodeName.toLowerCase()){l=ft(e),(f=t.getAttribute("id"))?g=f.replace(K,"\\$&"):t.setAttribute("id",g),g="[id='"+g+"'] ",u=l.length;while(u--)l[u]=g+dt(l[u]);m=V.test(e)&&t.parentNode||t,v=l.join(",")}if(v)try{return H.apply(n,q.call(m.querySelectorAll(v),0)),n}catch(b){}finally{f||t.removeAttribute("id")}}}return wt(e.replace(W,"$1"),t,n,r)}a=st.isXML=function(e){var t=e&&(e.ownerDocument||e).documentElement;return t?"HTML"!==t.nodeName:!1},c=st.setDocument=function(e){var n=e?e.ownerDocument||e:w;return n!==p&&9===n.nodeType&&n.documentElement?(p=n,f=n.documentElement,d=a(n),T.tagNameNoComments=at(function(e){return e.appendChild(n.createComment("")),!e.getElementsByTagName("*").length}),T.attributes=at(function(e){e.innerHTML="<select></select>";var t=typeof e.lastChild.getAttribute("multiple");return"boolean"!==t&&"string"!==t}),T.getByClassName=at(function(e){return e.innerHTML="<div class='hidden e'></div><div class='hidden'></div>",e.getElementsByClassName&&e.getElementsByClassName("e").length?(e.lastChild.className="e",2===e.getElementsByClassName("e").length):!1}),T.getByName=at(function(e){e.id=x+0,e.innerHTML="<a name='"+x+"'></a><div name='"+x+"'></div>",f.insertBefore(e,f.firstChild);var t=n.getElementsByName&&n.getElementsByName(x).length===2+n.getElementsByName(x+0).length;return T.getIdNotName=!n.getElementById(x),f.removeChild(e),t}),i.attrHandle=at(function(e){return e.innerHTML="<a href='#'></a>",e.firstChild&&typeof e.firstChild.getAttribute!==A&&"#"===e.firstChild.getAttribute("href")})?{}:{href:function(e){return e.getAttribute("href",2)},type:function(e){return e.getAttribute("type")}},T.getIdNotName?(i.find.ID=function(e,t){if(typeof t.getElementById!==A&&!d){var n=t.getElementById(e);return n&&n.parentNode?[n]:[]}},i.filter.ID=function(e){var t=e.replace(et,tt);return function(e){return e.getAttribute("id")===t}}):(i.find.ID=function(e,n){if(typeof n.getElementById!==A&&!d){var r=n.getElementById(e);return r?r.id===e||typeof r.getAttributeNode!==A&&r.getAttributeNode("id").value===e?[r]:t:[]}},i.filter.ID=function(e){var t=e.replace(et,tt);return function(e){var n=typeof e.getAttributeNode!==A&&e.getAttributeNode("id");return n&&n.value===t}}),i.find.TAG=T.tagNameNoComments?function(e,n){return typeof n.getElementsByTagName!==A?n.getElementsByTagName(e):t}:function(e,t){var n,r=[],i=0,o=t.getElementsByTagName(e);if("*"===e){while(n=o[i++])1===n.nodeType&&r.push(n);return r}return o},i.find.NAME=T.getByName&&function(e,n){return typeof n.getElementsByName!==A?n.getElementsByName(name):t},i.find.CLASS=T.getByClassName&&function(e,n){return typeof n.getElementsByClassName===A||d?t:n.getElementsByClassName(e)},g=[],h=[":focus"],(T.qsa=rt(n.querySelectorAll))&&(at(function(e){e.innerHTML="<select><option selected=''></option></select>",e.querySelectorAll("[selected]").length||h.push("\\["+_+"*(?:checked|disabled|ismap|multiple|readonly|selected|value)"),e.querySelectorAll(":checked").length||h.push(":checked")}),at(function(e){e.innerHTML="<input type='hidden' i=''/>",e.querySelectorAll("[i^='']").length&&h.push("[*^$]="+_+"*(?:\"\"|'')"),e.querySelectorAll(":enabled").length||h.push(":enabled",":disabled"),e.querySelectorAll("*,:x"),h.push(",.*:")})),(T.matchesSelector=rt(m=f.matchesSelector||f.mozMatchesSelector||f.webkitMatchesSelector||f.oMatchesSelector||f.msMatchesSelector))&&at(function(e){T.disconnectedMatch=m.call(e,"div"),m.call(e,"[s!='']:x"),g.push("!=",R)}),h=RegExp(h.join("|")),g=RegExp(g.join("|")),y=rt(f.contains)||f.compareDocumentPosition?function(e,t){var n=9===e.nodeType?e.documentElement:e,r=t&&t.parentNode;return e===r||!(!r||1!==r.nodeType||!(n.contains?n.contains(r):e.compareDocumentPosition&&16&e.compareDocumentPosition(r)))}:function(e,t){if(t)while(t=t.parentNode)if(t===e)return!0;return!1},v=f.compareDocumentPosition?function(e,t){var r;return e===t?(u=!0,0):(r=t.compareDocumentPosition&&e.compareDocumentPosition&&e.compareDocumentPosition(t))?1&r||e.parentNode&&11===e.parentNode.nodeType?e===n||y(w,e)?-1:t===n||y(w,t)?1:0:4&r?-1:1:e.compareDocumentPosition?-1:1}:function(e,t){var r,i=0,o=e.parentNode,a=t.parentNode,s=[e],l=[t];if(e===t)return u=!0,0;if(!o||!a)return e===n?-1:t===n?1:o?-1:a?1:0;if(o===a)return ut(e,t);r=e;while(r=r.parentNode)s.unshift(r);r=t;while(r=r.parentNode)l.unshift(r);while(s[i]===l[i])i++;return i?ut(s[i],l[i]):s[i]===w?-1:l[i]===w?1:0},u=!1,[0,0].sort(v),T.detectDuplicates=u,p):p},st.matches=function(e,t){return st(e,null,null,t)},st.matchesSelector=function(e,t){if((e.ownerDocument||e)!==p&&c(e),t=t.replace(Z,"='$1']"),!(!T.matchesSelector||d||g&&g.test(t)||h.test(t)))try{var n=m.call(e,t);if(n||T.disconnectedMatch||e.document&&11!==e.document.nodeType)return n}catch(r){}return st(t,p,null,[e]).length>0},st.contains=function(e,t){return(e.ownerDocument||e)!==p&&c(e),y(e,t)},st.attr=function(e,t){var n;return(e.ownerDocument||e)!==p&&c(e),d||(t=t.toLowerCase()),(n=i.attrHandle[t])?n(e):d||T.attributes?e.getAttribute(t):((n=e.getAttributeNode(t))||e.getAttribute(t))&&e[t]===!0?t:n&&n.specified?n.value:null},st.error=function(e){throw Error("Syntax error, unrecognized expression: "+e)},st.uniqueSort=function(e){var t,n=[],r=1,i=0;if(u=!T.detectDuplicates,e.sort(v),u){for(;t=e[r];r++)t===e[r-1]&&(i=n.push(r));while(i--)e.splice(n[i],1)}return e};function ut(e,t){var n=t&&e,r=n&&(~t.sourceIndex||j)-(~e.sourceIndex||j);if(r)return r;if(n)while(n=n.nextSibling)if(n===t)return-1;return e?1:-1}function lt(e){return function(t){var n=t.nodeName.toLowerCase();return"input"===n&&t.type===e}}function ct(e){return function(t){var n=t.nodeName.toLowerCase();return("input"===n||"button"===n)&&t.type===e}}function pt(e){return ot(function(t){return t=+t,ot(function(n,r){var i,o=e([],n.length,t),a=o.length;while(a--)n[i=o[a]]&&(n[i]=!(r[i]=n[i]))})})}o=st.getText=function(e){var t,n="",r=0,i=e.nodeType;if(i){if(1===i||9===i||11===i){if("string"==typeof e.textContent)return e.textContent;for(e=e.firstChild;e;e=e.nextSibling)n+=o(e)}else if(3===i||4===i)return e.nodeValue}else for(;t=e[r];r++)n+=o(t);return n},i=st.selectors={cacheLength:50,createPseudo:ot,match:U,find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(e){return e[1]=e[1].replace(et,tt),e[3]=(e[4]||e[5]||"").replace(et,tt),"~="===e[2]&&(e[3]=" "+e[3]+" "),e.slice(0,4)},CHILD:function(e){return e[1]=e[1].toLowerCase(),"nth"===e[1].slice(0,3)?(e[3]||st.error(e[0]),e[4]=+(e[4]?e[5]+(e[6]||1):2*("even"===e[3]||"odd"===e[3])),e[5]=+(e[7]+e[8]||"odd"===e[3])):e[3]&&st.error(e[0]),e},PSEUDO:function(e){var t,n=!e[5]&&e[2];return U.CHILD.test(e[0])?null:(e[4]?e[2]=e[4]:n&&z.test(n)&&(t=ft(n,!0))&&(t=n.indexOf(")",n.length-t)-n.length)&&(e[0]=e[0].slice(0,t),e[2]=n.slice(0,t)),e.slice(0,3))}},filter:{TAG:function(e){return"*"===e?function(){return!0}:(e=e.replace(et,tt).toLowerCase(),function(t){return t.nodeName&&t.nodeName.toLowerCase()===e})},CLASS:function(e){var t=k[e+" "];return t||(t=RegExp("(^|"+_+")"+e+"("+_+"|$)"))&&k(e,function(e){return t.test(e.className||typeof e.getAttribute!==A&&e.getAttribute("class")||"")})},ATTR:function(e,t,n){return function(r){var i=st.attr(r,e);return null==i?"!="===t:t?(i+="","="===t?i===n:"!="===t?i!==n:"^="===t?n&&0===i.indexOf(n):"*="===t?n&&i.indexOf(n)>-1:"$="===t?n&&i.slice(-n.length)===n:"~="===t?(" "+i+" ").indexOf(n)>-1:"|="===t?i===n||i.slice(0,n.length+1)===n+"-":!1):!0}},CHILD:function(e,t,n,r,i){var o="nth"!==e.slice(0,3),a="last"!==e.slice(-4),s="of-type"===t;return 1===r&&0===i?function(e){return!!e.parentNode}:function(t,n,u){var l,c,p,f,d,h,g=o!==a?"nextSibling":"previousSibling",m=t.parentNode,y=s&&t.nodeName.toLowerCase(),v=!u&&!s;if(m){if(o){while(g){p=t;while(p=p[g])if(s?p.nodeName.toLowerCase()===y:1===p.nodeType)return!1;h=g="only"===e&&!h&&"nextSibling"}return!0}if(h=[a?m.firstChild:m.lastChild],a&&v){c=m[x]||(m[x]={}),l=c[e]||[],d=l[0]===N&&l[1],f=l[0]===N&&l[2],p=d&&m.childNodes[d];while(p=++d&&p&&p[g]||(f=d=0)||h.pop())if(1===p.nodeType&&++f&&p===t){c[e]=[N,d,f];break}}else if(v&&(l=(t[x]||(t[x]={}))[e])&&l[0]===N)f=l[1];else while(p=++d&&p&&p[g]||(f=d=0)||h.pop())if((s?p.nodeName.toLowerCase()===y:1===p.nodeType)&&++f&&(v&&((p[x]||(p[x]={}))[e]=[N,f]),p===t))break;return f-=i,f===r||0===f%r&&f/r>=0}}},PSEUDO:function(e,t){var n,r=i.pseudos[e]||i.setFilters[e.toLowerCase()]||st.error("unsupported pseudo: "+e);return r[x]?r(t):r.length>1?(n=[e,e,"",t],i.setFilters.hasOwnProperty(e.toLowerCase())?ot(function(e,n){var i,o=r(e,t),a=o.length;while(a--)i=M.call(e,o[a]),e[i]=!(n[i]=o[a])}):function(e){return r(e,0,n)}):r}},pseudos:{not:ot(function(e){var t=[],n=[],r=s(e.replace(W,"$1"));return r[x]?ot(function(e,t,n,i){var o,a=r(e,null,i,[]),s=e.length;while(s--)(o=a[s])&&(e[s]=!(t[s]=o))}):function(e,i,o){return t[0]=e,r(t,null,o,n),!n.pop()}}),has:ot(function(e){return function(t){return st(e,t).length>0}}),contains:ot(function(e){return function(t){return(t.textContent||t.innerText||o(t)).indexOf(e)>-1}}),lang:ot(function(e){return X.test(e||"")||st.error("unsupported lang: "+e),e=e.replace(et,tt).toLowerCase(),function(t){var n;do if(n=d?t.getAttribute("xml:lang")||t.getAttribute("lang"):t.lang)return n=n.toLowerCase(),n===e||0===n.indexOf(e+"-");while((t=t.parentNode)&&1===t.nodeType);return!1}}),target:function(t){var n=e.location&&e.location.hash;return n&&n.slice(1)===t.id},root:function(e){return e===f},focus:function(e){return e===p.activeElement&&(!p.hasFocus||p.hasFocus())&&!!(e.type||e.href||~e.tabIndex)},enabled:function(e){return e.disabled===!1},disabled:function(e){return e.disabled===!0},checked:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&!!e.checked||"option"===t&&!!e.selected},selected:function(e){return e.parentNode&&e.parentNode.selectedIndex,e.selected===!0},empty:function(e){for(e=e.firstChild;e;e=e.nextSibling)if(e.nodeName>"@"||3===e.nodeType||4===e.nodeType)return!1;return!0},parent:function(e){return!i.pseudos.empty(e)},header:function(e){return Q.test(e.nodeName)},input:function(e){return G.test(e.nodeName)},button:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&"button"===e.type||"button"===t},text:function(e){var t;return"input"===e.nodeName.toLowerCase()&&"text"===e.type&&(null==(t=e.getAttribute("type"))||t.toLowerCase()===e.type)},first:pt(function(){return[0]}),last:pt(function(e,t){return[t-1]}),eq:pt(function(e,t,n){return[0>n?n+t:n]}),even:pt(function(e,t){var n=0;for(;t>n;n+=2)e.push(n);return e}),odd:pt(function(e,t){var n=1;for(;t>n;n+=2)e.push(n);return e}),lt:pt(function(e,t,n){var r=0>n?n+t:n;for(;--r>=0;)e.push(r);return e}),gt:pt(function(e,t,n){var r=0>n?n+t:n;for(;t>++r;)e.push(r);return e})}};for(n in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})i.pseudos[n]=lt(n);for(n in{submit:!0,reset:!0})i.pseudos[n]=ct(n);function ft(e,t){var n,r,o,a,s,u,l,c=E[e+" "];if(c)return t?0:c.slice(0);s=e,u=[],l=i.preFilter;while(s){(!n||(r=$.exec(s)))&&(r&&(s=s.slice(r[0].length)||s),u.push(o=[])),n=!1,(r=I.exec(s))&&(n=r.shift(),o.push({value:n,type:r[0].replace(W," ")}),s=s.slice(n.length));for(a in i.filter)!(r=U[a].exec(s))||l[a]&&!(r=l[a](r))||(n=r.shift(),o.push({value:n,type:a,matches:r}),s=s.slice(n.length));if(!n)break}return t?s.length:s?st.error(e):E(e,u).slice(0)}function dt(e){var t=0,n=e.length,r="";for(;n>t;t++)r+=e[t].value;return r}function ht(e,t,n){var i=t.dir,o=n&&"parentNode"===i,a=C++;return t.first?function(t,n,r){while(t=t[i])if(1===t.nodeType||o)return e(t,n,r)}:function(t,n,s){var u,l,c,p=N+" "+a;if(s){while(t=t[i])if((1===t.nodeType||o)&&e(t,n,s))return!0}else while(t=t[i])if(1===t.nodeType||o)if(c=t[x]||(t[x]={}),(l=c[i])&&l[0]===p){if((u=l[1])===!0||u===r)return u===!0}else if(l=c[i]=[p],l[1]=e(t,n,s)||r,l[1]===!0)return!0}}function gt(e){return e.length>1?function(t,n,r){var i=e.length;while(i--)if(!e[i](t,n,r))return!1;return!0}:e[0]}function mt(e,t,n,r,i){var o,a=[],s=0,u=e.length,l=null!=t;for(;u>s;s++)(o=e[s])&&(!n||n(o,r,i))&&(a.push(o),l&&t.push(s));return a}function yt(e,t,n,r,i,o){return r&&!r[x]&&(r=yt(r)),i&&!i[x]&&(i=yt(i,o)),ot(function(o,a,s,u){var l,c,p,f=[],d=[],h=a.length,g=o||xt(t||"*",s.nodeType?[s]:s,[]),m=!e||!o&&t?g:mt(g,f,e,s,u),y=n?i||(o?e:h||r)?[]:a:m;if(n&&n(m,y,s,u),r){l=mt(y,d),r(l,[],s,u),c=l.length;while(c--)(p=l[c])&&(y[d[c]]=!(m[d[c]]=p))}if(o){if(i||e){if(i){l=[],c=y.length;while(c--)(p=y[c])&&l.push(m[c]=p);i(null,y=[],l,u)}c=y.length;while(c--)(p=y[c])&&(l=i?M.call(o,p):f[c])>-1&&(o[l]=!(a[l]=p))}}else y=mt(y===a?y.splice(h,y.length):y),i?i(null,a,y,u):H.apply(a,y)})}function vt(e){var t,n,r,o=e.length,a=i.relative[e[0].type],s=a||i.relative[" "],u=a?1:0,c=ht(function(e){return e===t},s,!0),p=ht(function(e){return M.call(t,e)>-1},s,!0),f=[function(e,n,r){return!a&&(r||n!==l)||((t=n).nodeType?c(e,n,r):p(e,n,r))}];for(;o>u;u++)if(n=i.relative[e[u].type])f=[ht(gt(f),n)];else{if(n=i.filter[e[u].type].apply(null,e[u].matches),n[x]){for(r=++u;o>r;r++)if(i.relative[e[r].type])break;return yt(u>1&&gt(f),u>1&&dt(e.slice(0,u-1)).replace(W,"$1"),n,r>u&&vt(e.slice(u,r)),o>r&&vt(e=e.slice(r)),o>r&&dt(e))}f.push(n)}return gt(f)}function bt(e,t){var n=0,o=t.length>0,a=e.length>0,s=function(s,u,c,f,d){var h,g,m,y=[],v=0,b="0",x=s&&[],w=null!=d,T=l,C=s||a&&i.find.TAG("*",d&&u.parentNode||u),k=N+=null==T?1:Math.random()||.1;for(w&&(l=u!==p&&u,r=n);null!=(h=C[b]);b++){if(a&&h){g=0;while(m=e[g++])if(m(h,u,c)){f.push(h);break}w&&(N=k,r=++n)}o&&((h=!m&&h)&&v--,s&&x.push(h))}if(v+=b,o&&b!==v){g=0;while(m=t[g++])m(x,y,u,c);if(s){if(v>0)while(b--)x[b]||y[b]||(y[b]=L.call(f));y=mt(y)}H.apply(f,y),w&&!s&&y.length>0&&v+t.length>1&&st.uniqueSort(f)}return w&&(N=k,l=T),x};return o?ot(s):s}s=st.compile=function(e,t){var n,r=[],i=[],o=S[e+" "];if(!o){t||(t=ft(e)),n=t.length;while(n--)o=vt(t[n]),o[x]?r.push(o):i.push(o);o=S(e,bt(i,r))}return o};function xt(e,t,n){var r=0,i=t.length;for(;i>r;r++)st(e,t[r],n);return n}function wt(e,t,n,r){var o,a,u,l,c,p=ft(e);if(!r&&1===p.length){if(a=p[0]=p[0].slice(0),a.length>2&&"ID"===(u=a[0]).type&&9===t.nodeType&&!d&&i.relative[a[1].type]){if(t=i.find.ID(u.matches[0].replace(et,tt),t)[0],!t)return n;e=e.slice(a.shift().value.length)}o=U.needsContext.test(e)?0:a.length;while(o--){if(u=a[o],i.relative[l=u.type])break;if((c=i.find[l])&&(r=c(u.matches[0].replace(et,tt),V.test(a[0].type)&&t.parentNode||t))){if(a.splice(o,1),e=r.length&&dt(a),!e)return H.apply(n,q.call(r,0)),n;break}}}return s(e,p)(r,t,d,n,V.test(e)),n}i.pseudos.nth=i.pseudos.eq;function Tt(){}i.filters=Tt.prototype=i.pseudos,i.setFilters=new Tt,c(),st.attr=b.attr,b.find=st,b.expr=st.selectors,b.expr[":"]=b.expr.pseudos,b.unique=st.uniqueSort,b.text=st.getText,b.isXMLDoc=st.isXML,b.contains=st.contains}(e);var at=/Until$/,st=/^(?:parents|prev(?:Until|All))/,ut=/^.[^:#\[\.,]*$/,lt=b.expr.match.needsContext,ct={children:!0,contents:!0,next:!0,prev:!0};b.fn.extend({find:function(e){var t,n,r,i=this.length;if("string"!=typeof e)return r=this,this.pushStack(b(e).filter(function(){for(t=0;i>t;t++)if(b.contains(r[t],this))return!0}));for(n=[],t=0;i>t;t++)b.find(e,this[t],n);return n=this.pushStack(i>1?b.unique(n):n),n.selector=(this.selector?this.selector+" ":"")+e,n},has:function(e){var t,n=b(e,this),r=n.length;return this.filter(function(){for(t=0;r>t;t++)if(b.contains(this,n[t]))return!0})},not:function(e){return this.pushStack(ft(this,e,!1))},filter:function(e){return this.pushStack(ft(this,e,!0))},is:function(e){return!!e&&("string"==typeof e?lt.test(e)?b(e,this.context).index(this[0])>=0:b.filter(e,this).length>0:this.filter(e).length>0)},closest:function(e,t){var n,r=0,i=this.length,o=[],a=lt.test(e)||"string"!=typeof e?b(e,t||this.context):0;for(;i>r;r++){n=this[r];while(n&&n.ownerDocument&&n!==t&&11!==n.nodeType){if(a?a.index(n)>-1:b.find.matchesSelector(n,e)){o.push(n);break}n=n.parentNode}}return this.pushStack(o.length>1?b.unique(o):o)},index:function(e){return e?"string"==typeof e?b.inArray(this[0],b(e)):b.inArray(e.jquery?e[0]:e,this):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(e,t){var n="string"==typeof e?b(e,t):b.makeArray(e&&e.nodeType?[e]:e),r=b.merge(this.get(),n);return this.pushStack(b.unique(r))},addBack:function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}}),b.fn.andSelf=b.fn.addBack;function pt(e,t){do e=e[t];while(e&&1!==e.nodeType);return e}b.each({parent:function(e){var t=e.parentNode;return t&&11!==t.nodeType?t:null},parents:function(e){return b.dir(e,"parentNode")},parentsUntil:function(e,t,n){return b.dir(e,"parentNode",n)},next:function(e){return pt(e,"nextSibling")},prev:function(e){return pt(e,"previousSibling")},nextAll:function(e){return b.dir(e,"nextSibling")},prevAll:function(e){return b.dir(e,"previousSibling")},nextUntil:function(e,t,n){return b.dir(e,"nextSibling",n)},prevUntil:function(e,t,n){return b.dir(e,"previousSibling",n)},siblings:function(e){return b.sibling((e.parentNode||{}).firstChild,e)},children:function(e){return b.sibling(e.firstChild)},contents:function(e){return b.nodeName(e,"iframe")?e.contentDocument||e.contentWindow.document:b.merge([],e.childNodes)}},function(e,t){b.fn[e]=function(n,r){var i=b.map(this,t,n);return at.test(e)||(r=n),r&&"string"==typeof r&&(i=b.filter(r,i)),i=this.length>1&&!ct[e]?b.unique(i):i,this.length>1&&st.test(e)&&(i=i.reverse()),this.pushStack(i)}}),b.extend({filter:function(e,t,n){return n&&(e=":not("+e+")"),1===t.length?b.find.matchesSelector(t[0],e)?[t[0]]:[]:b.find.matches(e,t)},dir:function(e,n,r){var i=[],o=e[n];while(o&&9!==o.nodeType&&(r===t||1!==o.nodeType||!b(o).is(r)))1===o.nodeType&&i.push(o),o=o[n];return i},sibling:function(e,t){var n=[];for(;e;e=e.nextSibling)1===e.nodeType&&e!==t&&n.push(e);return n}});function ft(e,t,n){if(t=t||0,b.isFunction(t))return b.grep(e,function(e,r){var i=!!t.call(e,r,e);return i===n});if(t.nodeType)return b.grep(e,function(e){return e===t===n});if("string"==typeof t){var r=b.grep(e,function(e){return 1===e.nodeType});if(ut.test(t))return b.filter(t,r,!n);t=b.filter(t,r)}return b.grep(e,function(e){return b.inArray(e,t)>=0===n})}function dt(e){var t=ht.split("|"),n=e.createDocumentFragment();if(n.createElement)while(t.length)n.createElement(t.pop());return n}var ht="abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",gt=/ jQuery\d+="(?:null|\d+)"/g,mt=RegExp("<(?:"+ht+")[\\s/>]","i"),yt=/^\s+/,vt=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,bt=/<([\w:]+)/,xt=/<tbody/i,wt=/<|&#?\w+;/,Tt=/<(?:script|style|link)/i,Nt=/^(?:checkbox|radio)$/i,Ct=/checked\s*(?:[^=]|=\s*.checked.)/i,kt=/^$|\/(?:java|ecma)script/i,Et=/^true\/(.*)/,St=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,At={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],area:[1,"<map>","</map>"],param:[1,"<object>","</object>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:b.support.htmlSerialize?[0,"",""]:[1,"X<div>","</div>"]},jt=dt(o),Dt=jt.appendChild(o.createElement("div"));At.optgroup=At.option,At.tbody=At.tfoot=At.colgroup=At.caption=At.thead,At.th=At.td,b.fn.extend({text:function(e){return b.access(this,function(e){return e===t?b.text(this):this.empty().append((this[0]&&this[0].ownerDocument||o).createTextNode(e))},null,e,arguments.length)},wrapAll:function(e){if(b.isFunction(e))return this.each(function(t){b(this).wrapAll(e.call(this,t))});if(this[0]){var t=b(e,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&t.insertBefore(this[0]),t.map(function(){var e=this;while(e.firstChild&&1===e.firstChild.nodeType)e=e.firstChild;return e}).append(this)}return this},wrapInner:function(e){return b.isFunction(e)?this.each(function(t){b(this).wrapInner(e.call(this,t))}):this.each(function(){var t=b(this),n=t.contents();n.length?n.wrapAll(e):t.append(e)})},wrap:function(e){var t=b.isFunction(e);return this.each(function(n){b(this).wrapAll(t?e.call(this,n):e)})},unwrap:function(){return this.parent().each(function(){b.nodeName(this,"body")||b(this).replaceWith(this.childNodes)}).end()},append:function(){return this.domManip(arguments,!0,function(e){(1===this.nodeType||11===this.nodeType||9===this.nodeType)&&this.appendChild(e)})},prepend:function(){return this.domManip(arguments,!0,function(e){(1===this.nodeType||11===this.nodeType||9===this.nodeType)&&this.insertBefore(e,this.firstChild)})},before:function(){return this.domManip(arguments,!1,function(e){this.parentNode&&this.parentNode.insertBefore(e,this)})},after:function(){return this.domManip(arguments,!1,function(e){this.parentNode&&this.parentNode.insertBefore(e,this.nextSibling)})},remove:function(e,t){var n,r=0;for(;null!=(n=this[r]);r++)(!e||b.filter(e,[n]).length>0)&&(t||1!==n.nodeType||b.cleanData(Ot(n)),n.parentNode&&(t&&b.contains(n.ownerDocument,n)&&Mt(Ot(n,"script")),n.parentNode.removeChild(n)));return this},empty:function(){var e,t=0;for(;null!=(e=this[t]);t++){1===e.nodeType&&b.cleanData(Ot(e,!1));while(e.firstChild)e.removeChild(e.firstChild);e.options&&b.nodeName(e,"select")&&(e.options.length=0)}return this},clone:function(e,t){return e=null==e?!1:e,t=null==t?e:t,this.map(function(){return b.clone(this,e,t)})},html:function(e){return b.access(this,function(e){var n=this[0]||{},r=0,i=this.length;if(e===t)return 1===n.nodeType?n.innerHTML.replace(gt,""):t;if(!("string"!=typeof e||Tt.test(e)||!b.support.htmlSerialize&&mt.test(e)||!b.support.leadingWhitespace&&yt.test(e)||At[(bt.exec(e)||["",""])[1].toLowerCase()])){e=e.replace(vt,"<$1></$2>");try{for(;i>r;r++)n=this[r]||{},1===n.nodeType&&(b.cleanData(Ot(n,!1)),n.innerHTML=e);n=0}catch(o){}}n&&this.empty().append(e)},null,e,arguments.length)},replaceWith:function(e){var t=b.isFunction(e);return t||"string"==typeof e||(e=b(e).not(this).detach()),this.domManip([e],!0,function(e){var t=this.nextSibling,n=this.parentNode;n&&(b(this).remove(),n.insertBefore(e,t))})},detach:function(e){return this.remove(e,!0)},domManip:function(e,n,r){e=f.apply([],e);var i,o,a,s,u,l,c=0,p=this.length,d=this,h=p-1,g=e[0],m=b.isFunction(g);if(m||!(1>=p||"string"!=typeof g||b.support.checkClone)&&Ct.test(g))return this.each(function(i){var o=d.eq(i);m&&(e[0]=g.call(this,i,n?o.html():t)),o.domManip(e,n,r)});if(p&&(l=b.buildFragment(e,this[0].ownerDocument,!1,this),i=l.firstChild,1===l.childNodes.length&&(l=i),i)){for(n=n&&b.nodeName(i,"tr"),s=b.map(Ot(l,"script"),Ht),a=s.length;p>c;c++)o=l,c!==h&&(o=b.clone(o,!0,!0),a&&b.merge(s,Ot(o,"script"))),r.call(n&&b.nodeName(this[c],"table")?Lt(this[c],"tbody"):this[c],o,c);if(a)for(u=s[s.length-1].ownerDocument,b.map(s,qt),c=0;a>c;c++)o=s[c],kt.test(o.type||"")&&!b._data(o,"globalEval")&&b.contains(u,o)&&(o.src?b.ajax({url:o.src,type:"GET",dataType:"script",async:!1,global:!1,"throws":!0}):b.globalEval((o.text||o.textContent||o.innerHTML||"").replace(St,"")));l=i=null}return this}});function Lt(e,t){return e.getElementsByTagName(t)[0]||e.appendChild(e.ownerDocument.createElement(t))}function Ht(e){var t=e.getAttributeNode("type");return e.type=(t&&t.specified)+"/"+e.type,e}function qt(e){var t=Et.exec(e.type);return t?e.type=t[1]:e.removeAttribute("type"),e}function Mt(e,t){var n,r=0;for(;null!=(n=e[r]);r++)b._data(n,"globalEval",!t||b._data(t[r],"globalEval"))}function _t(e,t){if(1===t.nodeType&&b.hasData(e)){var n,r,i,o=b._data(e),a=b._data(t,o),s=o.events;if(s){delete a.handle,a.events={};for(n in s)for(r=0,i=s[n].length;i>r;r++)b.event.add(t,n,s[n][r])}a.data&&(a.data=b.extend({},a.data))}}function Ft(e,t){var n,r,i;if(1===t.nodeType){if(n=t.nodeName.toLowerCase(),!b.support.noCloneEvent&&t[b.expando]){i=b._data(t);for(r in i.events)b.removeEvent(t,r,i.handle);t.removeAttribute(b.expando)}"script"===n&&t.text!==e.text?(Ht(t).text=e.text,qt(t)):"object"===n?(t.parentNode&&(t.outerHTML=e.outerHTML),b.support.html5Clone&&e.innerHTML&&!b.trim(t.innerHTML)&&(t.innerHTML=e.innerHTML)):"input"===n&&Nt.test(e.type)?(t.defaultChecked=t.checked=e.checked,t.value!==e.value&&(t.value=e.value)):"option"===n?t.defaultSelected=t.selected=e.defaultSelected:("input"===n||"textarea"===n)&&(t.defaultValue=e.defaultValue)}}b.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(e,t){b.fn[e]=function(e){var n,r=0,i=[],o=b(e),a=o.length-1;for(;a>=r;r++)n=r===a?this:this.clone(!0),b(o[r])[t](n),d.apply(i,n.get());return this.pushStack(i)}});function Ot(e,n){var r,o,a=0,s=typeof e.getElementsByTagName!==i?e.getElementsByTagName(n||"*"):typeof e.querySelectorAll!==i?e.querySelectorAll(n||"*"):t;if(!s)for(s=[],r=e.childNodes||e;null!=(o=r[a]);a++)!n||b.nodeName(o,n)?s.push(o):b.merge(s,Ot(o,n));return n===t||n&&b.nodeName(e,n)?b.merge([e],s):s}function Bt(e){Nt.test(e.type)&&(e.defaultChecked=e.checked)}b.extend({clone:function(e,t,n){var r,i,o,a,s,u=b.contains(e.ownerDocument,e);if(b.support.html5Clone||b.isXMLDoc(e)||!mt.test("<"+e.nodeName+">")?o=e.cloneNode(!0):(Dt.innerHTML=e.outerHTML,Dt.removeChild(o=Dt.firstChild)),!(b.support.noCloneEvent&&b.support.noCloneChecked||1!==e.nodeType&&11!==e.nodeType||b.isXMLDoc(e)))for(r=Ot(o),s=Ot(e),a=0;null!=(i=s[a]);++a)r[a]&&Ft(i,r[a]);if(t)if(n)for(s=s||Ot(e),r=r||Ot(o),a=0;null!=(i=s[a]);a++)_t(i,r[a]);else _t(e,o);return r=Ot(o,"script"),r.length>0&&Mt(r,!u&&Ot(e,"script")),r=s=i=null,o},buildFragment:function(e,t,n,r){var i,o,a,s,u,l,c,p=e.length,f=dt(t),d=[],h=0;for(;p>h;h++)if(o=e[h],o||0===o)if("object"===b.type(o))b.merge(d,o.nodeType?[o]:o);else if(wt.test(o)){s=s||f.appendChild(t.createElement("div")),u=(bt.exec(o)||["",""])[1].toLowerCase(),c=At[u]||At._default,s.innerHTML=c[1]+o.replace(vt,"<$1></$2>")+c[2],i=c[0];while(i--)s=s.lastChild;if(!b.support.leadingWhitespace&&yt.test(o)&&d.push(t.createTextNode(yt.exec(o)[0])),!b.support.tbody){o="table"!==u||xt.test(o)?"<table>"!==c[1]||xt.test(o)?0:s:s.firstChild,i=o&&o.childNodes.length;while(i--)b.nodeName(l=o.childNodes[i],"tbody")&&!l.childNodes.length&&o.removeChild(l)
}b.merge(d,s.childNodes),s.textContent="";while(s.firstChild)s.removeChild(s.firstChild);s=f.lastChild}else d.push(t.createTextNode(o));s&&f.removeChild(s),b.support.appendChecked||b.grep(Ot(d,"input"),Bt),h=0;while(o=d[h++])if((!r||-1===b.inArray(o,r))&&(a=b.contains(o.ownerDocument,o),s=Ot(f.appendChild(o),"script"),a&&Mt(s),n)){i=0;while(o=s[i++])kt.test(o.type||"")&&n.push(o)}return s=null,f},cleanData:function(e,t){var n,r,o,a,s=0,u=b.expando,l=b.cache,p=b.support.deleteExpando,f=b.event.special;for(;null!=(n=e[s]);s++)if((t||b.acceptData(n))&&(o=n[u],a=o&&l[o])){if(a.events)for(r in a.events)f[r]?b.event.remove(n,r):b.removeEvent(n,r,a.handle);l[o]&&(delete l[o],p?delete n[u]:typeof n.removeAttribute!==i?n.removeAttribute(u):n[u]=null,c.push(o))}}});var Pt,Rt,Wt,$t=/alpha\([^)]*\)/i,It=/opacity\s*=\s*([^)]*)/,zt=/^(top|right|bottom|left)$/,Xt=/^(none|table(?!-c[ea]).+)/,Ut=/^margin/,Vt=RegExp("^("+x+")(.*)$","i"),Yt=RegExp("^("+x+")(?!px)[a-z%]+$","i"),Jt=RegExp("^([+-])=("+x+")","i"),Gt={BODY:"block"},Qt={position:"absolute",visibility:"hidden",display:"block"},Kt={letterSpacing:0,fontWeight:400},Zt=["Top","Right","Bottom","Left"],en=["Webkit","O","Moz","ms"];function tn(e,t){if(t in e)return t;var n=t.charAt(0).toUpperCase()+t.slice(1),r=t,i=en.length;while(i--)if(t=en[i]+n,t in e)return t;return r}function nn(e,t){return e=t||e,"none"===b.css(e,"display")||!b.contains(e.ownerDocument,e)}function rn(e,t){var n,r,i,o=[],a=0,s=e.length;for(;s>a;a++)r=e[a],r.style&&(o[a]=b._data(r,"olddisplay"),n=r.style.display,t?(o[a]||"none"!==n||(r.style.display=""),""===r.style.display&&nn(r)&&(o[a]=b._data(r,"olddisplay",un(r.nodeName)))):o[a]||(i=nn(r),(n&&"none"!==n||!i)&&b._data(r,"olddisplay",i?n:b.css(r,"display"))));for(a=0;s>a;a++)r=e[a],r.style&&(t&&"none"!==r.style.display&&""!==r.style.display||(r.style.display=t?o[a]||"":"none"));return e}b.fn.extend({css:function(e,n){return b.access(this,function(e,n,r){var i,o,a={},s=0;if(b.isArray(n)){for(o=Rt(e),i=n.length;i>s;s++)a[n[s]]=b.css(e,n[s],!1,o);return a}return r!==t?b.style(e,n,r):b.css(e,n)},e,n,arguments.length>1)},show:function(){return rn(this,!0)},hide:function(){return rn(this)},toggle:function(e){var t="boolean"==typeof e;return this.each(function(){(t?e:nn(this))?b(this).show():b(this).hide()})}}),b.extend({cssHooks:{opacity:{get:function(e,t){if(t){var n=Wt(e,"opacity");return""===n?"1":n}}}},cssNumber:{columnCount:!0,fillOpacity:!0,fontWeight:!0,lineHeight:!0,opacity:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":b.support.cssFloat?"cssFloat":"styleFloat"},style:function(e,n,r,i){if(e&&3!==e.nodeType&&8!==e.nodeType&&e.style){var o,a,s,u=b.camelCase(n),l=e.style;if(n=b.cssProps[u]||(b.cssProps[u]=tn(l,u)),s=b.cssHooks[n]||b.cssHooks[u],r===t)return s&&"get"in s&&(o=s.get(e,!1,i))!==t?o:l[n];if(a=typeof r,"string"===a&&(o=Jt.exec(r))&&(r=(o[1]+1)*o[2]+parseFloat(b.css(e,n)),a="number"),!(null==r||"number"===a&&isNaN(r)||("number"!==a||b.cssNumber[u]||(r+="px"),b.support.clearCloneStyle||""!==r||0!==n.indexOf("background")||(l[n]="inherit"),s&&"set"in s&&(r=s.set(e,r,i))===t)))try{l[n]=r}catch(c){}}},css:function(e,n,r,i){var o,a,s,u=b.camelCase(n);return n=b.cssProps[u]||(b.cssProps[u]=tn(e.style,u)),s=b.cssHooks[n]||b.cssHooks[u],s&&"get"in s&&(a=s.get(e,!0,r)),a===t&&(a=Wt(e,n,i)),"normal"===a&&n in Kt&&(a=Kt[n]),""===r||r?(o=parseFloat(a),r===!0||b.isNumeric(o)?o||0:a):a},swap:function(e,t,n,r){var i,o,a={};for(o in t)a[o]=e.style[o],e.style[o]=t[o];i=n.apply(e,r||[]);for(o in t)e.style[o]=a[o];return i}}),e.getComputedStyle?(Rt=function(t){return e.getComputedStyle(t,null)},Wt=function(e,n,r){var i,o,a,s=r||Rt(e),u=s?s.getPropertyValue(n)||s[n]:t,l=e.style;return s&&(""!==u||b.contains(e.ownerDocument,e)||(u=b.style(e,n)),Yt.test(u)&&Ut.test(n)&&(i=l.width,o=l.minWidth,a=l.maxWidth,l.minWidth=l.maxWidth=l.width=u,u=s.width,l.width=i,l.minWidth=o,l.maxWidth=a)),u}):o.documentElement.currentStyle&&(Rt=function(e){return e.currentStyle},Wt=function(e,n,r){var i,o,a,s=r||Rt(e),u=s?s[n]:t,l=e.style;return null==u&&l&&l[n]&&(u=l[n]),Yt.test(u)&&!zt.test(n)&&(i=l.left,o=e.runtimeStyle,a=o&&o.left,a&&(o.left=e.currentStyle.left),l.left="fontSize"===n?"1em":u,u=l.pixelLeft+"px",l.left=i,a&&(o.left=a)),""===u?"auto":u});function on(e,t,n){var r=Vt.exec(t);return r?Math.max(0,r[1]-(n||0))+(r[2]||"px"):t}function an(e,t,n,r,i){var o=n===(r?"border":"content")?4:"width"===t?1:0,a=0;for(;4>o;o+=2)"margin"===n&&(a+=b.css(e,n+Zt[o],!0,i)),r?("content"===n&&(a-=b.css(e,"padding"+Zt[o],!0,i)),"margin"!==n&&(a-=b.css(e,"border"+Zt[o]+"Width",!0,i))):(a+=b.css(e,"padding"+Zt[o],!0,i),"padding"!==n&&(a+=b.css(e,"border"+Zt[o]+"Width",!0,i)));return a}function sn(e,t,n){var r=!0,i="width"===t?e.offsetWidth:e.offsetHeight,o=Rt(e),a=b.support.boxSizing&&"border-box"===b.css(e,"boxSizing",!1,o);if(0>=i||null==i){if(i=Wt(e,t,o),(0>i||null==i)&&(i=e.style[t]),Yt.test(i))return i;r=a&&(b.support.boxSizingReliable||i===e.style[t]),i=parseFloat(i)||0}return i+an(e,t,n||(a?"border":"content"),r,o)+"px"}function un(e){var t=o,n=Gt[e];return n||(n=ln(e,t),"none"!==n&&n||(Pt=(Pt||b("<iframe frameborder='0' width='0' height='0'/>").css("cssText","display:block !important")).appendTo(t.documentElement),t=(Pt[0].contentWindow||Pt[0].contentDocument).document,t.write("<!doctype html><html><body>"),t.close(),n=ln(e,t),Pt.detach()),Gt[e]=n),n}function ln(e,t){var n=b(t.createElement(e)).appendTo(t.body),r=b.css(n[0],"display");return n.remove(),r}b.each(["height","width"],function(e,n){b.cssHooks[n]={get:function(e,r,i){return r?0===e.offsetWidth&&Xt.test(b.css(e,"display"))?b.swap(e,Qt,function(){return sn(e,n,i)}):sn(e,n,i):t},set:function(e,t,r){var i=r&&Rt(e);return on(e,t,r?an(e,n,r,b.support.boxSizing&&"border-box"===b.css(e,"boxSizing",!1,i),i):0)}}}),b.support.opacity||(b.cssHooks.opacity={get:function(e,t){return It.test((t&&e.currentStyle?e.currentStyle.filter:e.style.filter)||"")?.01*parseFloat(RegExp.$1)+"":t?"1":""},set:function(e,t){var n=e.style,r=e.currentStyle,i=b.isNumeric(t)?"alpha(opacity="+100*t+")":"",o=r&&r.filter||n.filter||"";n.zoom=1,(t>=1||""===t)&&""===b.trim(o.replace($t,""))&&n.removeAttribute&&(n.removeAttribute("filter"),""===t||r&&!r.filter)||(n.filter=$t.test(o)?o.replace($t,i):o+" "+i)}}),b(function(){b.support.reliableMarginRight||(b.cssHooks.marginRight={get:function(e,n){return n?b.swap(e,{display:"inline-block"},Wt,[e,"marginRight"]):t}}),!b.support.pixelPosition&&b.fn.position&&b.each(["top","left"],function(e,n){b.cssHooks[n]={get:function(e,r){return r?(r=Wt(e,n),Yt.test(r)?b(e).position()[n]+"px":r):t}}})}),b.expr&&b.expr.filters&&(b.expr.filters.hidden=function(e){return 0>=e.offsetWidth&&0>=e.offsetHeight||!b.support.reliableHiddenOffsets&&"none"===(e.style&&e.style.display||b.css(e,"display"))},b.expr.filters.visible=function(e){return!b.expr.filters.hidden(e)}),b.each({margin:"",padding:"",border:"Width"},function(e,t){b.cssHooks[e+t]={expand:function(n){var r=0,i={},o="string"==typeof n?n.split(" "):[n];for(;4>r;r++)i[e+Zt[r]+t]=o[r]||o[r-2]||o[0];return i}},Ut.test(e)||(b.cssHooks[e+t].set=on)});var cn=/%20/g,pn=/\[\]$/,fn=/\r?\n/g,dn=/^(?:submit|button|image|reset|file)$/i,hn=/^(?:input|select|textarea|keygen)/i;b.fn.extend({serialize:function(){return b.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var e=b.prop(this,"elements");return e?b.makeArray(e):this}).filter(function(){var e=this.type;return this.name&&!b(this).is(":disabled")&&hn.test(this.nodeName)&&!dn.test(e)&&(this.checked||!Nt.test(e))}).map(function(e,t){var n=b(this).val();return null==n?null:b.isArray(n)?b.map(n,function(e){return{name:t.name,value:e.replace(fn,"\r\n")}}):{name:t.name,value:n.replace(fn,"\r\n")}}).get()}}),b.param=function(e,n){var r,i=[],o=function(e,t){t=b.isFunction(t)?t():null==t?"":t,i[i.length]=encodeURIComponent(e)+"="+encodeURIComponent(t)};if(n===t&&(n=b.ajaxSettings&&b.ajaxSettings.traditional),b.isArray(e)||e.jquery&&!b.isPlainObject(e))b.each(e,function(){o(this.name,this.value)});else for(r in e)gn(r,e[r],n,o);return i.join("&").replace(cn,"+")};function gn(e,t,n,r){var i;if(b.isArray(t))b.each(t,function(t,i){n||pn.test(e)?r(e,i):gn(e+"["+("object"==typeof i?t:"")+"]",i,n,r)});else if(n||"object"!==b.type(t))r(e,t);else for(i in t)gn(e+"["+i+"]",t[i],n,r)}b.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(e,t){b.fn[t]=function(e,n){return arguments.length>0?this.on(t,null,e,n):this.trigger(t)}}),b.fn.hover=function(e,t){return this.mouseenter(e).mouseleave(t||e)};var mn,yn,vn=b.now(),bn=/\?/,xn=/#.*$/,wn=/([?&])_=[^&]*/,Tn=/^(.*?):[ \t]*([^\r\n]*)\r?$/gm,Nn=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Cn=/^(?:GET|HEAD)$/,kn=/^\/\//,En=/^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,Sn=b.fn.load,An={},jn={},Dn="*/".concat("*");try{yn=a.href}catch(Ln){yn=o.createElement("a"),yn.href="",yn=yn.href}mn=En.exec(yn.toLowerCase())||[];function Hn(e){return function(t,n){"string"!=typeof t&&(n=t,t="*");var r,i=0,o=t.toLowerCase().match(w)||[];if(b.isFunction(n))while(r=o[i++])"+"===r[0]?(r=r.slice(1)||"*",(e[r]=e[r]||[]).unshift(n)):(e[r]=e[r]||[]).push(n)}}function qn(e,n,r,i){var o={},a=e===jn;function s(u){var l;return o[u]=!0,b.each(e[u]||[],function(e,u){var c=u(n,r,i);return"string"!=typeof c||a||o[c]?a?!(l=c):t:(n.dataTypes.unshift(c),s(c),!1)}),l}return s(n.dataTypes[0])||!o["*"]&&s("*")}function Mn(e,n){var r,i,o=b.ajaxSettings.flatOptions||{};for(i in n)n[i]!==t&&((o[i]?e:r||(r={}))[i]=n[i]);return r&&b.extend(!0,e,r),e}b.fn.load=function(e,n,r){if("string"!=typeof e&&Sn)return Sn.apply(this,arguments);var i,o,a,s=this,u=e.indexOf(" ");return u>=0&&(i=e.slice(u,e.length),e=e.slice(0,u)),b.isFunction(n)?(r=n,n=t):n&&"object"==typeof n&&(a="POST"),s.length>0&&b.ajax({url:e,type:a,dataType:"html",data:n}).done(function(e){o=arguments,s.html(i?b("<div>").append(b.parseHTML(e)).find(i):e)}).complete(r&&function(e,t){s.each(r,o||[e.responseText,t,e])}),this},b.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(e,t){b.fn[t]=function(e){return this.on(t,e)}}),b.each(["get","post"],function(e,n){b[n]=function(e,r,i,o){return b.isFunction(r)&&(o=o||i,i=r,r=t),b.ajax({url:e,type:n,dataType:o,data:r,success:i})}}),b.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:yn,type:"GET",isLocal:Nn.test(mn[1]),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Dn,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText"},converters:{"* text":e.String,"text html":!0,"text json":b.parseJSON,"text xml":b.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(e,t){return t?Mn(Mn(e,b.ajaxSettings),t):Mn(b.ajaxSettings,e)},ajaxPrefilter:Hn(An),ajaxTransport:Hn(jn),ajax:function(e,n){"object"==typeof e&&(n=e,e=t),n=n||{};var r,i,o,a,s,u,l,c,p=b.ajaxSetup({},n),f=p.context||p,d=p.context&&(f.nodeType||f.jquery)?b(f):b.event,h=b.Deferred(),g=b.Callbacks("once memory"),m=p.statusCode||{},y={},v={},x=0,T="canceled",N={readyState:0,getResponseHeader:function(e){var t;if(2===x){if(!c){c={};while(t=Tn.exec(a))c[t[1].toLowerCase()]=t[2]}t=c[e.toLowerCase()]}return null==t?null:t},getAllResponseHeaders:function(){return 2===x?a:null},setRequestHeader:function(e,t){var n=e.toLowerCase();return x||(e=v[n]=v[n]||e,y[e]=t),this},overrideMimeType:function(e){return x||(p.mimeType=e),this},statusCode:function(e){var t;if(e)if(2>x)for(t in e)m[t]=[m[t],e[t]];else N.always(e[N.status]);return this},abort:function(e){var t=e||T;return l&&l.abort(t),k(0,t),this}};if(h.promise(N).complete=g.add,N.success=N.done,N.error=N.fail,p.url=((e||p.url||yn)+"").replace(xn,"").replace(kn,mn[1]+"//"),p.type=n.method||n.type||p.method||p.type,p.dataTypes=b.trim(p.dataType||"*").toLowerCase().match(w)||[""],null==p.crossDomain&&(r=En.exec(p.url.toLowerCase()),p.crossDomain=!(!r||r[1]===mn[1]&&r[2]===mn[2]&&(r[3]||("http:"===r[1]?80:443))==(mn[3]||("http:"===mn[1]?80:443)))),p.data&&p.processData&&"string"!=typeof p.data&&(p.data=b.param(p.data,p.traditional)),qn(An,p,n,N),2===x)return N;u=p.global,u&&0===b.active++&&b.event.trigger("ajaxStart"),p.type=p.type.toUpperCase(),p.hasContent=!Cn.test(p.type),o=p.url,p.hasContent||(p.data&&(o=p.url+=(bn.test(o)?"&":"?")+p.data,delete p.data),p.cache===!1&&(p.url=wn.test(o)?o.replace(wn,"$1_="+vn++):o+(bn.test(o)?"&":"?")+"_="+vn++)),p.ifModified&&(b.lastModified[o]&&N.setRequestHeader("If-Modified-Since",b.lastModified[o]),b.etag[o]&&N.setRequestHeader("If-None-Match",b.etag[o])),(p.data&&p.hasContent&&p.contentType!==!1||n.contentType)&&N.setRequestHeader("Content-Type",p.contentType),N.setRequestHeader("Accept",p.dataTypes[0]&&p.accepts[p.dataTypes[0]]?p.accepts[p.dataTypes[0]]+("*"!==p.dataTypes[0]?", "+Dn+"; q=0.01":""):p.accepts["*"]);for(i in p.headers)N.setRequestHeader(i,p.headers[i]);if(p.beforeSend&&(p.beforeSend.call(f,N,p)===!1||2===x))return N.abort();T="abort";for(i in{success:1,error:1,complete:1})N[i](p[i]);if(l=qn(jn,p,n,N)){N.readyState=1,u&&d.trigger("ajaxSend",[N,p]),p.async&&p.timeout>0&&(s=setTimeout(function(){N.abort("timeout")},p.timeout));try{x=1,l.send(y,k)}catch(C){if(!(2>x))throw C;k(-1,C)}}else k(-1,"No Transport");function k(e,n,r,i){var c,y,v,w,T,C=n;2!==x&&(x=2,s&&clearTimeout(s),l=t,a=i||"",N.readyState=e>0?4:0,r&&(w=_n(p,N,r)),e>=200&&300>e||304===e?(p.ifModified&&(T=N.getResponseHeader("Last-Modified"),T&&(b.lastModified[o]=T),T=N.getResponseHeader("etag"),T&&(b.etag[o]=T)),204===e?(c=!0,C="nocontent"):304===e?(c=!0,C="notmodified"):(c=Fn(p,w),C=c.state,y=c.data,v=c.error,c=!v)):(v=C,(e||!C)&&(C="error",0>e&&(e=0))),N.status=e,N.statusText=(n||C)+"",c?h.resolveWith(f,[y,C,N]):h.rejectWith(f,[N,C,v]),N.statusCode(m),m=t,u&&d.trigger(c?"ajaxSuccess":"ajaxError",[N,p,c?y:v]),g.fireWith(f,[N,C]),u&&(d.trigger("ajaxComplete",[N,p]),--b.active||b.event.trigger("ajaxStop")))}return N},getScript:function(e,n){return b.get(e,t,n,"script")},getJSON:function(e,t,n){return b.get(e,t,n,"json")}});function _n(e,n,r){var i,o,a,s,u=e.contents,l=e.dataTypes,c=e.responseFields;for(s in c)s in r&&(n[c[s]]=r[s]);while("*"===l[0])l.shift(),o===t&&(o=e.mimeType||n.getResponseHeader("Content-Type"));if(o)for(s in u)if(u[s]&&u[s].test(o)){l.unshift(s);break}if(l[0]in r)a=l[0];else{for(s in r){if(!l[0]||e.converters[s+" "+l[0]]){a=s;break}i||(i=s)}a=a||i}return a?(a!==l[0]&&l.unshift(a),r[a]):t}function Fn(e,t){var n,r,i,o,a={},s=0,u=e.dataTypes.slice(),l=u[0];if(e.dataFilter&&(t=e.dataFilter(t,e.dataType)),u[1])for(i in e.converters)a[i.toLowerCase()]=e.converters[i];for(;r=u[++s];)if("*"!==r){if("*"!==l&&l!==r){if(i=a[l+" "+r]||a["* "+r],!i)for(n in a)if(o=n.split(" "),o[1]===r&&(i=a[l+" "+o[0]]||a["* "+o[0]])){i===!0?i=a[n]:a[n]!==!0&&(r=o[0],u.splice(s--,0,r));break}if(i!==!0)if(i&&e["throws"])t=i(t);else try{t=i(t)}catch(c){return{state:"parsererror",error:i?c:"No conversion from "+l+" to "+r}}}l=r}return{state:"success",data:t}}b.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/(?:java|ecma)script/},converters:{"text script":function(e){return b.globalEval(e),e}}}),b.ajaxPrefilter("script",function(e){e.cache===t&&(e.cache=!1),e.crossDomain&&(e.type="GET",e.global=!1)}),b.ajaxTransport("script",function(e){if(e.crossDomain){var n,r=o.head||b("head")[0]||o.documentElement;return{send:function(t,i){n=o.createElement("script"),n.async=!0,e.scriptCharset&&(n.charset=e.scriptCharset),n.src=e.url,n.onload=n.onreadystatechange=function(e,t){(t||!n.readyState||/loaded|complete/.test(n.readyState))&&(n.onload=n.onreadystatechange=null,n.parentNode&&n.parentNode.removeChild(n),n=null,t||i(200,"success"))},r.insertBefore(n,r.firstChild)},abort:function(){n&&n.onload(t,!0)}}}});var On=[],Bn=/(=)\?(?=&|$)|\?\?/;b.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var e=On.pop()||b.expando+"_"+vn++;return this[e]=!0,e}}),b.ajaxPrefilter("json jsonp",function(n,r,i){var o,a,s,u=n.jsonp!==!1&&(Bn.test(n.url)?"url":"string"==typeof n.data&&!(n.contentType||"").indexOf("application/x-www-form-urlencoded")&&Bn.test(n.data)&&"data");return u||"jsonp"===n.dataTypes[0]?(o=n.jsonpCallback=b.isFunction(n.jsonpCallback)?n.jsonpCallback():n.jsonpCallback,u?n[u]=n[u].replace(Bn,"$1"+o):n.jsonp!==!1&&(n.url+=(bn.test(n.url)?"&":"?")+n.jsonp+"="+o),n.converters["script json"]=function(){return s||b.error(o+" was not called"),s[0]},n.dataTypes[0]="json",a=e[o],e[o]=function(){s=arguments},i.always(function(){e[o]=a,n[o]&&(n.jsonpCallback=r.jsonpCallback,On.push(o)),s&&b.isFunction(a)&&a(s[0]),s=a=t}),"script"):t});var Pn,Rn,Wn=0,$n=e.ActiveXObject&&function(){var e;for(e in Pn)Pn[e](t,!0)};function In(){try{return new e.XMLHttpRequest}catch(t){}}function zn(){try{return new e.ActiveXObject("Microsoft.XMLHTTP")}catch(t){}}b.ajaxSettings.xhr=e.ActiveXObject?function(){return!this.isLocal&&In()||zn()}:In,Rn=b.ajaxSettings.xhr(),b.support.cors=!!Rn&&"withCredentials"in Rn,Rn=b.support.ajax=!!Rn,Rn&&b.ajaxTransport(function(n){if(!n.crossDomain||b.support.cors){var r;return{send:function(i,o){var a,s,u=n.xhr();if(n.username?u.open(n.type,n.url,n.async,n.username,n.password):u.open(n.type,n.url,n.async),n.xhrFields)for(s in n.xhrFields)u[s]=n.xhrFields[s];n.mimeType&&u.overrideMimeType&&u.overrideMimeType(n.mimeType),n.crossDomain||i["X-Requested-With"]||(i["X-Requested-With"]="XMLHttpRequest");try{for(s in i)u.setRequestHeader(s,i[s])}catch(l){}u.send(n.hasContent&&n.data||null),r=function(e,i){var s,l,c,p;try{if(r&&(i||4===u.readyState))if(r=t,a&&(u.onreadystatechange=b.noop,$n&&delete Pn[a]),i)4!==u.readyState&&u.abort();else{p={},s=u.status,l=u.getAllResponseHeaders(),"string"==typeof u.responseText&&(p.text=u.responseText);try{c=u.statusText}catch(f){c=""}s||!n.isLocal||n.crossDomain?1223===s&&(s=204):s=p.text?200:404}}catch(d){i||o(-1,d)}p&&o(s,c,p,l)},n.async?4===u.readyState?setTimeout(r):(a=++Wn,$n&&(Pn||(Pn={},b(e).unload($n)),Pn[a]=r),u.onreadystatechange=r):r()},abort:function(){r&&r(t,!0)}}}});var Xn,Un,Vn=/^(?:toggle|show|hide)$/,Yn=RegExp("^(?:([+-])=|)("+x+")([a-z%]*)$","i"),Jn=/queueHooks$/,Gn=[nr],Qn={"*":[function(e,t){var n,r,i=this.createTween(e,t),o=Yn.exec(t),a=i.cur(),s=+a||0,u=1,l=20;if(o){if(n=+o[2],r=o[3]||(b.cssNumber[e]?"":"px"),"px"!==r&&s){s=b.css(i.elem,e,!0)||n||1;do u=u||".5",s/=u,b.style(i.elem,e,s+r);while(u!==(u=i.cur()/a)&&1!==u&&--l)}i.unit=r,i.start=s,i.end=o[1]?s+(o[1]+1)*n:n}return i}]};function Kn(){return setTimeout(function(){Xn=t}),Xn=b.now()}function Zn(e,t){b.each(t,function(t,n){var r=(Qn[t]||[]).concat(Qn["*"]),i=0,o=r.length;for(;o>i;i++)if(r[i].call(e,t,n))return})}function er(e,t,n){var r,i,o=0,a=Gn.length,s=b.Deferred().always(function(){delete u.elem}),u=function(){if(i)return!1;var t=Xn||Kn(),n=Math.max(0,l.startTime+l.duration-t),r=n/l.duration||0,o=1-r,a=0,u=l.tweens.length;for(;u>a;a++)l.tweens[a].run(o);return s.notifyWith(e,[l,o,n]),1>o&&u?n:(s.resolveWith(e,[l]),!1)},l=s.promise({elem:e,props:b.extend({},t),opts:b.extend(!0,{specialEasing:{}},n),originalProperties:t,originalOptions:n,startTime:Xn||Kn(),duration:n.duration,tweens:[],createTween:function(t,n){var r=b.Tween(e,l.opts,t,n,l.opts.specialEasing[t]||l.opts.easing);return l.tweens.push(r),r},stop:function(t){var n=0,r=t?l.tweens.length:0;if(i)return this;for(i=!0;r>n;n++)l.tweens[n].run(1);return t?s.resolveWith(e,[l,t]):s.rejectWith(e,[l,t]),this}}),c=l.props;for(tr(c,l.opts.specialEasing);a>o;o++)if(r=Gn[o].call(l,e,c,l.opts))return r;return Zn(l,c),b.isFunction(l.opts.start)&&l.opts.start.call(e,l),b.fx.timer(b.extend(u,{elem:e,anim:l,queue:l.opts.queue})),l.progress(l.opts.progress).done(l.opts.done,l.opts.complete).fail(l.opts.fail).always(l.opts.always)}function tr(e,t){var n,r,i,o,a;for(i in e)if(r=b.camelCase(i),o=t[r],n=e[i],b.isArray(n)&&(o=n[1],n=e[i]=n[0]),i!==r&&(e[r]=n,delete e[i]),a=b.cssHooks[r],a&&"expand"in a){n=a.expand(n),delete e[r];for(i in n)i in e||(e[i]=n[i],t[i]=o)}else t[r]=o}b.Animation=b.extend(er,{tweener:function(e,t){b.isFunction(e)?(t=e,e=["*"]):e=e.split(" ");var n,r=0,i=e.length;for(;i>r;r++)n=e[r],Qn[n]=Qn[n]||[],Qn[n].unshift(t)},prefilter:function(e,t){t?Gn.unshift(e):Gn.push(e)}});function nr(e,t,n){var r,i,o,a,s,u,l,c,p,f=this,d=e.style,h={},g=[],m=e.nodeType&&nn(e);n.queue||(c=b._queueHooks(e,"fx"),null==c.unqueued&&(c.unqueued=0,p=c.empty.fire,c.empty.fire=function(){c.unqueued||p()}),c.unqueued++,f.always(function(){f.always(function(){c.unqueued--,b.queue(e,"fx").length||c.empty.fire()})})),1===e.nodeType&&("height"in t||"width"in t)&&(n.overflow=[d.overflow,d.overflowX,d.overflowY],"inline"===b.css(e,"display")&&"none"===b.css(e,"float")&&(b.support.inlineBlockNeedsLayout&&"inline"!==un(e.nodeName)?d.zoom=1:d.display="inline-block")),n.overflow&&(d.overflow="hidden",b.support.shrinkWrapBlocks||f.always(function(){d.overflow=n.overflow[0],d.overflowX=n.overflow[1],d.overflowY=n.overflow[2]}));for(i in t)if(a=t[i],Vn.exec(a)){if(delete t[i],u=u||"toggle"===a,a===(m?"hide":"show"))continue;g.push(i)}if(o=g.length){s=b._data(e,"fxshow")||b._data(e,"fxshow",{}),"hidden"in s&&(m=s.hidden),u&&(s.hidden=!m),m?b(e).show():f.done(function(){b(e).hide()}),f.done(function(){var t;b._removeData(e,"fxshow");for(t in h)b.style(e,t,h[t])});for(i=0;o>i;i++)r=g[i],l=f.createTween(r,m?s[r]:0),h[r]=s[r]||b.style(e,r),r in s||(s[r]=l.start,m&&(l.end=l.start,l.start="width"===r||"height"===r?1:0))}}function rr(e,t,n,r,i){return new rr.prototype.init(e,t,n,r,i)}b.Tween=rr,rr.prototype={constructor:rr,init:function(e,t,n,r,i,o){this.elem=e,this.prop=n,this.easing=i||"swing",this.options=t,this.start=this.now=this.cur(),this.end=r,this.unit=o||(b.cssNumber[n]?"":"px")},cur:function(){var e=rr.propHooks[this.prop];return e&&e.get?e.get(this):rr.propHooks._default.get(this)},run:function(e){var t,n=rr.propHooks[this.prop];return this.pos=t=this.options.duration?b.easing[this.easing](e,this.options.duration*e,0,1,this.options.duration):e,this.now=(this.end-this.start)*t+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),n&&n.set?n.set(this):rr.propHooks._default.set(this),this}},rr.prototype.init.prototype=rr.prototype,rr.propHooks={_default:{get:function(e){var t;return null==e.elem[e.prop]||e.elem.style&&null!=e.elem.style[e.prop]?(t=b.css(e.elem,e.prop,""),t&&"auto"!==t?t:0):e.elem[e.prop]},set:function(e){b.fx.step[e.prop]?b.fx.step[e.prop](e):e.elem.style&&(null!=e.elem.style[b.cssProps[e.prop]]||b.cssHooks[e.prop])?b.style(e.elem,e.prop,e.now+e.unit):e.elem[e.prop]=e.now}}},rr.propHooks.scrollTop=rr.propHooks.scrollLeft={set:function(e){e.elem.nodeType&&e.elem.parentNode&&(e.elem[e.prop]=e.now)}},b.each(["toggle","show","hide"],function(e,t){var n=b.fn[t];b.fn[t]=function(e,r,i){return null==e||"boolean"==typeof e?n.apply(this,arguments):this.animate(ir(t,!0),e,r,i)}}),b.fn.extend({fadeTo:function(e,t,n,r){return this.filter(nn).css("opacity",0).show().end().animate({opacity:t},e,n,r)},animate:function(e,t,n,r){var i=b.isEmptyObject(e),o=b.speed(t,n,r),a=function(){var t=er(this,b.extend({},e),o);a.finish=function(){t.stop(!0)},(i||b._data(this,"finish"))&&t.stop(!0)};return a.finish=a,i||o.queue===!1?this.each(a):this.queue(o.queue,a)},stop:function(e,n,r){var i=function(e){var t=e.stop;delete e.stop,t(r)};return"string"!=typeof e&&(r=n,n=e,e=t),n&&e!==!1&&this.queue(e||"fx",[]),this.each(function(){var t=!0,n=null!=e&&e+"queueHooks",o=b.timers,a=b._data(this);if(n)a[n]&&a[n].stop&&i(a[n]);else for(n in a)a[n]&&a[n].stop&&Jn.test(n)&&i(a[n]);for(n=o.length;n--;)o[n].elem!==this||null!=e&&o[n].queue!==e||(o[n].anim.stop(r),t=!1,o.splice(n,1));(t||!r)&&b.dequeue(this,e)})},finish:function(e){return e!==!1&&(e=e||"fx"),this.each(function(){var t,n=b._data(this),r=n[e+"queue"],i=n[e+"queueHooks"],o=b.timers,a=r?r.length:0;for(n.finish=!0,b.queue(this,e,[]),i&&i.cur&&i.cur.finish&&i.cur.finish.call(this),t=o.length;t--;)o[t].elem===this&&o[t].queue===e&&(o[t].anim.stop(!0),o.splice(t,1));for(t=0;a>t;t++)r[t]&&r[t].finish&&r[t].finish.call(this);delete n.finish})}});function ir(e,t){var n,r={height:e},i=0;for(t=t?1:0;4>i;i+=2-t)n=Zt[i],r["margin"+n]=r["padding"+n]=e;return t&&(r.opacity=r.width=e),r}b.each({slideDown:ir("show"),slideUp:ir("hide"),slideToggle:ir("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(e,t){b.fn[e]=function(e,n,r){return this.animate(t,e,n,r)}}),b.speed=function(e,t,n){var r=e&&"object"==typeof e?b.extend({},e):{complete:n||!n&&t||b.isFunction(e)&&e,duration:e,easing:n&&t||t&&!b.isFunction(t)&&t};return r.duration=b.fx.off?0:"number"==typeof r.duration?r.duration:r.duration in b.fx.speeds?b.fx.speeds[r.duration]:b.fx.speeds._default,(null==r.queue||r.queue===!0)&&(r.queue="fx"),r.old=r.complete,r.complete=function(){b.isFunction(r.old)&&r.old.call(this),r.queue&&b.dequeue(this,r.queue)},r},b.easing={linear:function(e){return e},swing:function(e){return.5-Math.cos(e*Math.PI)/2}},b.timers=[],b.fx=rr.prototype.init,b.fx.tick=function(){var e,n=b.timers,r=0;for(Xn=b.now();n.length>r;r++)e=n[r],e()||n[r]!==e||n.splice(r--,1);n.length||b.fx.stop(),Xn=t},b.fx.timer=function(e){e()&&b.timers.push(e)&&b.fx.start()},b.fx.interval=13,b.fx.start=function(){Un||(Un=setInterval(b.fx.tick,b.fx.interval))},b.fx.stop=function(){clearInterval(Un),Un=null},b.fx.speeds={slow:600,fast:200,_default:400},b.fx.step={},b.expr&&b.expr.filters&&(b.expr.filters.animated=function(e){return b.grep(b.timers,function(t){return e===t.elem}).length}),b.fn.offset=function(e){if(arguments.length)return e===t?this:this.each(function(t){b.offset.setOffset(this,e,t)});var n,r,o={top:0,left:0},a=this[0],s=a&&a.ownerDocument;if(s)return n=s.documentElement,b.contains(n,a)?(typeof a.getBoundingClientRect!==i&&(o=a.getBoundingClientRect()),r=or(s),{top:o.top+(r.pageYOffset||n.scrollTop)-(n.clientTop||0),left:o.left+(r.pageXOffset||n.scrollLeft)-(n.clientLeft||0)}):o},b.offset={setOffset:function(e,t,n){var r=b.css(e,"position");"static"===r&&(e.style.position="relative");var i=b(e),o=i.offset(),a=b.css(e,"top"),s=b.css(e,"left"),u=("absolute"===r||"fixed"===r)&&b.inArray("auto",[a,s])>-1,l={},c={},p,f;u?(c=i.position(),p=c.top,f=c.left):(p=parseFloat(a)||0,f=parseFloat(s)||0),b.isFunction(t)&&(t=t.call(e,n,o)),null!=t.top&&(l.top=t.top-o.top+p),null!=t.left&&(l.left=t.left-o.left+f),"using"in t?t.using.call(e,l):i.css(l)}},b.fn.extend({position:function(){if(this[0]){var e,t,n={top:0,left:0},r=this[0];return"fixed"===b.css(r,"position")?t=r.getBoundingClientRect():(e=this.offsetParent(),t=this.offset(),b.nodeName(e[0],"html")||(n=e.offset()),n.top+=b.css(e[0],"borderTopWidth",!0),n.left+=b.css(e[0],"borderLeftWidth",!0)),{top:t.top-n.top-b.css(r,"marginTop",!0),left:t.left-n.left-b.css(r,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var e=this.offsetParent||o.documentElement;while(e&&!b.nodeName(e,"html")&&"static"===b.css(e,"position"))e=e.offsetParent;return e||o.documentElement})}}),b.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(e,n){var r=/Y/.test(n);b.fn[e]=function(i){return b.access(this,function(e,i,o){var a=or(e);return o===t?a?n in a?a[n]:a.document.documentElement[i]:e[i]:(a?a.scrollTo(r?b(a).scrollLeft():o,r?o:b(a).scrollTop()):e[i]=o,t)},e,i,arguments.length,null)}});function or(e){return b.isWindow(e)?e:9===e.nodeType?e.defaultView||e.parentWindow:!1}b.each({Height:"height",Width:"width"},function(e,n){b.each({padding:"inner"+e,content:n,"":"outer"+e},function(r,i){b.fn[i]=function(i,o){var a=arguments.length&&(r||"boolean"!=typeof i),s=r||(i===!0||o===!0?"margin":"border");return b.access(this,function(n,r,i){var o;return b.isWindow(n)?n.document.documentElement["client"+e]:9===n.nodeType?(o=n.documentElement,Math.max(n.body["scroll"+e],o["scroll"+e],n.body["offset"+e],o["offset"+e],o["client"+e])):i===t?b.css(n,r,s):b.style(n,r,i,s)},n,a?i:t,a,null)}})}),e.jQuery=e.$=b,"function"==typeof define&&define.amd&&define.amd.jQuery&&define("jquery",[],function(){return b})})(window);

// Snap this specific version of jQuery into H5P. jQuery.noConflict will
// revert the globals to what they were before this file was loaded.
var H5P = H5P || {};
H5P.jQuery = jQuery.noConflict(true);
;
/*jshint multistr: true */
// TODO: Should we split up the generic parts needed by the editor(and others), and the parts needed to "run" H5Ps?
var H5P = H5P || {};

// Determine if we're inside an iframe.
H5P.isFramed = (window.self !== window.top);

// Useful jQuery object.
H5P.$window = H5P.jQuery(window);

H5P.instances = [];

// Detect if we support fullscreen, and what prefix to use.
if (document.documentElement.requestFullScreen) {
  H5P.fullScreenBrowserPrefix = '';
}
else if (document.documentElement.webkitRequestFullScreen) {
  H5P.safariBrowser = navigator.userAgent.match(/Version\/(\d)/);
  H5P.safariBrowser = (H5P.safariBrowser === null ? 0 : parseInt(H5P.safariBrowser[1]));

  // Do not allow fullscreen for safari < 7.
  if (H5P.safariBrowser === 0 || H5P.safariBrowser > 6) {
    H5P.fullScreenBrowserPrefix = 'webkit';
  }
}
else if (document.documentElement.mozRequestFullScreen) {
  H5P.fullScreenBrowserPrefix = 'moz';
}
else if (document.documentElement.msRequestFullscreen) {
  H5P.fullScreenBrowserPrefix = 'ms';
}

/** @const {Number} */
H5P.DISABLE_NONE = 0;

/** @const {Number} */
H5P.DISABLE_FRAME = 1;

/** @const {Number} */
H5P.DISABLE_DOWNLOAD = 2;

/** @const {Number} */
H5P.DISABLE_EMBED = 4;

/** @const {Number} */
H5P.DISABLE_COPYRIGHT = 8;

/** @const {Number} */
H5P.DISABLE_ABOUT = 16;

/**
 * Keep track of when the H5Ps where started.
 *
 * @type {Array}
 */
H5P.opened = {};

/**
 * Initialize H5P content.
 * Scans for ".h5p-content" in the document and initializes H5P instances where found.
 */
H5P.init = function (target) {
  // Useful jQuery object.
  if (H5P.$body === undefined) {
    H5P.$body = H5P.jQuery(document.body);
  }

  // Determine if we can use full screen
  if (H5P.canHasFullScreen === undefined) {
    // Restricts fullscreen when embedded.
    // (embedded doesn't support semi-fullscreen solution)
    H5P.canHasFullScreen = (H5P.isFramed && H5P.externalEmbed !== false) ? ((document.fullscreenEnabled || document.webkitFullscreenEnabled || document.mozFullScreenEnabled) ? true : false) : true;
    // We should consider document.msFullscreenEnabled when they get their
    // element sizing corrected. Ref. https://connect.microsoft.com/IE/feedback/details/838286/ie-11-incorrectly-reports-dom-element-sizes-in-fullscreen-mode-when-fullscreened-element-is-within-an-iframe
  }

  // H5Ps added in normal DIV.
  var $containers = H5P.jQuery('.h5p-content:not(.h5p-initialized)', target).each(function () {
    var $element = H5P.jQuery(this).addClass('h5p-initialized');
    var $container = H5P.jQuery('<div class="h5p-container"></div>').appendTo($element);
    var contentId = $element.data('content-id');
    var contentData = H5PIntegration.contents['cid-' + contentId];
    if (contentData === undefined) {
      return H5P.error('No data for content id ' + contentId + '. Perhaps the library is gone?');
    }
    var library = {
      library: contentData.library,
      params: JSON.parse(contentData.jsonContent)
    };

    H5P.getUserData(contentId, 'state', function (err, previousState) {
      if (previousState) {
        library.userDatas = {
          state: previousState
        };
      }
      else if (previousState === null && H5PIntegration.saveFreq) {
        // Content has been reset. Display dialog.
        delete contentData.contentUserData;
        var dialog = new H5P.Dialog('content-user-data-reset', 'Data Reset', '<p>' + H5P.t('contentChanged') + '</p><p>' + H5P.t('startingOver') + '</p><div class="h5p-dialog-ok-button" tabIndex="0" role="button">OK</div>', $container);
        H5P.jQuery(dialog).on('dialog-opened', function (event, $dialog) {
          $dialog.find('.h5p-dialog-ok-button').click(function () {
            dialog.close();
          }).keypress(function (event) {
            if (event.which === 32) {
              dialog.close();
            }
          });
        });
        dialog.open();
      }
    });

    // Create new instance.
    var instance = H5P.newRunnable(library, contentId, $container, true);

    // Check if we should add and display a fullscreen button for this H5P.
    if (contentData.fullScreen == 1 && H5P.canHasFullScreen) {
      H5P.jQuery('<div class="h5p-content-controls"><div role="button" tabindex="1" class="h5p-enable-fullscreen" title="' + H5P.t('fullscreen') + '"></div></div>').prependTo($container).children().click(function () {
        H5P.fullScreen($container, instance);
      });
    }

    // Create action bar
    var $actions = H5P.jQuery('<ul class="h5p-actions"></ul>');

    if (!(contentData.disable & H5P.DISABLE_DOWNLOAD)) {
      // Add export button
      H5P.jQuery('<li class="h5p-button h5p-export" role="button" tabindex="1" title="' + H5P.t('downloadDescription') + '">' + H5P.t('download') + '</li>').appendTo($actions).click(function () {
        window.location.href = contentData.exportUrl;
      });
    }
    if (!(contentData.disable & H5P.DISABLE_COPYRIGHT) && instance.getCopyrights !== undefined) {
      // Add copyrights button
      H5P.jQuery('<li class="h5p-button h5p-copyrights" role="button" tabindex="1" title="' + H5P.t('copyrightsDescription') + '">' + H5P.t('copyrights') + '</li>').appendTo($actions).click(function () {
        H5P.openCopyrightsDialog($actions, instance, library.params, contentId);
      });
    }
    if (!(contentData.disable & H5P.DISABLE_EMBED)) {
      // Add embed button
      H5P.jQuery('<li class="h5p-button h5p-embed" role="button" tabindex="1" title="' + H5P.t('embedDescription') + '">' + H5P.t('embed') + '</li>').appendTo($actions).click(function () {
        H5P.openEmbedDialog($actions, contentData.embedCode, contentData.resizeCode, {
          width: $container.width(),
          height: $container.height()
        });
      });
    }

    if (!(contentData.disable & H5P.DISABLE_ABOUT)) {
      // Add about H5P button icon
      H5P.jQuery('<li><a class="h5p-link" href="http://h5p.org" target="_blank" title="' + H5P.t('h5pDescription') + '"></a></li>').appendTo($actions);
    }

    // Insert action bar if it has any content
    if ($actions.children().length) {
      $actions.insertAfter($container);
    }
    else {
      $element.addClass('h5p-no-frame');
    }

    // Keep track of when we started
    H5P.opened[contentId] = new Date();

    // Handle events when the user finishes the content. Useful for logging exercise results.
    H5P.on(instance, 'finish', function (event) {
      if (event.data !== undefined) {
        H5P.setFinished(contentId, event.data.score, event.data.maxScore, event.data.time);
      }
    });

    // Listen for xAPI events.
    H5P.on(instance, 'xAPI', H5P.xAPICompletedListener);

    // Auto save current state if supported
    if (H5PIntegration.saveFreq !== false && (
        instance.getCurrentState instanceof Function ||
        typeof instance.getCurrentState === 'function')) {

      var saveTimer, save = function () {
        var state = instance.getCurrentState();
        if (state !== undefined) {
          H5P.setUserData(contentId, 'state', state, {deleteOnChange: true});
        }
        if (H5PIntegration.saveFreq) {
          // Continue autosave
          saveTimer = setTimeout(save, H5PIntegration.saveFreq * 1000);
        }
      };

      if (H5PIntegration.saveFreq) {
        // Start autosave
        saveTimer = setTimeout(save, H5PIntegration.saveFreq * 1000);
      }

      // xAPI events will schedule a save in three seconds.
      H5P.on(instance, 'xAPI', function (event) {
        var verb = event.getVerb();
        if (verb === 'completed' || verb === 'progressed') {
          clearTimeout(saveTimer);
          saveTimer = setTimeout(save, 3000);
        }
      });
    }

    if (H5P.isFramed) {
      var resizeDelay;
      if (H5P.externalEmbed === false) {
        // Internal embed
        // Make it possible to resize the iframe when the content changes size. This way we get no scrollbars.
        var iframe = window.parent.document.getElementById('h5p-iframe-' + contentId);
        var resizeIframe = function () {
          if (window.parent.H5P.isFullscreen) {
            return; // Skip if full screen.
          }

          // Retain parent size to avoid jumping/scrolling
          var parentHeight = iframe.parentElement.style.height;
          iframe.parentElement.style.height = iframe.parentElement.clientHeight + 'px';

          // Reset iframe height, in case content has shrinked.
          iframe.style.height = '1px';

          // Resize iframe so all content is visible.
          iframe.style.height = (iframe.contentDocument.body.scrollHeight) + 'px';

          // Free parent
          iframe.parentElement.style.height = parentHeight;
        };

        H5P.on(instance, 'resize', function () {
          // Use a delay to make sure iframe is resized to the correct size.
          clearTimeout(resizeDelay);
          resizeDelay = setTimeout(function () {
            resizeIframe();
          }, 1);
        });
      }
      else if (H5P.communicator) {
        // External embed
        var parentIsFriendly = false;

        // Handle that the resizer is loaded after the iframe
        H5P.communicator.on('ready', function () {
          H5P.communicator.send('hello');
        });

        // Handle hello message from our parent window
        H5P.communicator.on('hello', function () {
          // Initial setup/handshake is done
          parentIsFriendly = true;

          // Hide scrollbars for correct size
          document.body.style.overflow = 'hidden';

          // Content need to be resized to fit the new iframe size
          H5P.trigger(instance, 'resize');
        });

        // When resize has been prepared tell parent window to resize
        H5P.communicator.on('resizePrepared', function (data) {
          H5P.communicator.send('resize', {
            height: document.body.scrollHeight
          });
        });

        H5P.communicator.on('resize', function () {
          H5P.trigger(instance, 'resize');
        });

        H5P.on(instance, 'resize', function () {
          if (H5P.isFullscreen) {
            return; // Skip iframe resize
          }

          // Use a delay to make sure iframe is resized to the correct size.
          clearTimeout(resizeDelay);
          resizeDelay = setTimeout(function () {
            // Only resize if the iframe can be resized
            if (parentIsFriendly) {
              H5P.communicator.send('prepareResize');
            }
            else {
              H5P.communicator.send('hello');
            }
          }, 0);
        });
      }
    }

    if (!H5P.isFramed || H5P.externalEmbed === false) {
      // Resize everything when window is resized.
      H5P.jQuery(window.top).resize(function () {
        if (window.parent.H5P.isFullscreen) {
          // Use timeout to avoid bug in certain browsers when exiting fullscreen. Some browser will trigger resize before the fullscreenchange event.
          H5P.trigger(instance, 'resize');
        }
        else {
          H5P.trigger(instance, 'resize');
        }
      });
    }

    H5P.instances.push(instance);

    // Resize content.
    H5P.trigger(instance, 'resize');
  });

  // Insert H5Ps that should be in iframes.
  H5P.jQuery('iframe.h5p-iframe:not(.h5p-initialized)', target).each(function () {
    var contentId = H5P.jQuery(this).addClass('h5p-initialized').data('content-id');
    this.contentDocument.open();
    this.contentDocument.write('<!doctype html><html class="h5p-iframe"><head>' + H5P.getHeadTags(contentId) + '</head><body><div class="h5p-content" data-content-id="' + contentId + '"/></body></html>');
    this.contentDocument.close();
  });
};

/**
 * Loop through assets for iframe content and create a set of tags for head.
 *
 * @private
 * @param {number} contentId
 * @returns {string} HTML
 */
H5P.getHeadTags = function (contentId) {
  var createStyleTags = function (styles) {
    var tags = '';
    for (var i = 0; i < styles.length; i++) {
      tags += '<link rel="stylesheet" href="' + styles[i] + '">';
    }
    return tags;
  };

  var createScriptTags = function (scripts) {
    var tags = '';
    for (var i = 0; i < scripts.length; i++) {
      tags += '<script src="' + scripts[i] + '"></script>';
    }
    return tags;
  };

  return createStyleTags(H5PIntegration.core.styles) +
         createStyleTags(H5PIntegration.contents['cid-' + contentId].styles) +
         createScriptTags(H5PIntegration.core.scripts) +
         createScriptTags(H5PIntegration.contents['cid-' + contentId].scripts) +
         '<script>H5PIntegration = window.top.H5PIntegration; var H5P = H5P || {}; H5P.externalEmbed = false;</script>';
};

H5P.communicator = (function () {
  /**
   * @class
   */
  function Communicator() {
    var self = this;

    // Maps actions to functions
    var actionHandlers = {};

    // Register message listener
    window.addEventListener('message', function receiveMessage(event) {
      if (window.parent !== event.source || event.data.context !== 'h5p') {
        return; // Only handle messages from parent and in the correct context
      }

      if (actionHandlers[event.data.action] !== undefined) {
        actionHandlers[event.data.action](event.data);
      }
    } , false);


    /**
     * Register action listener.
     *
     * @public
     * @param {String} action What you are waiting for
     * @param {Function} handler What you want done
     */
    self.on = function (action, handler) {
      actionHandlers[action] = handler;
    };

    /**
     * Send a message to the all mighty father.
     *
     * @public
     * @param {String} action
     * @param {Object} [data] payload
     */
    self.send = function (action, data) {
      if (data === undefined) {
        data = {};
      }
      data.context = 'h5p';
      data.action = action;

      // Parent origin can be anything
      window.parent.postMessage(data, '*');
    };
  }

  return (window.postMessage && window.addEventListener ? new Communicator() : undefined);
})();

/**
 * Enable full screen for the given h5p.
 *
 * @param {jQuery} $element Content container.
 * @param {object} instance
 * @param {function} exitCallback Callback function called when user exits fullscreen.
 * @param {jQuery} $body For internal use. Gives the body of the iframe.
 * @returns {undefined}
 */
H5P.fullScreen = function ($element, instance, exitCallback, body) {
  if (H5P.exitFullScreen !== undefined) {
    return; // Cannot enter new fullscreen until previous is over
  }

  if (H5P.isFramed && H5P.externalEmbed === false) {
    // Trigger resize on wrapper in parent window.
    window.top.H5P.fullScreen($element, instance, exitCallback, H5P.$body.get());
    H5P.isFullscreen = true;
    H5P.exitFullScreen = function () {
      window.top.H5P.exitFullScreen();
    };
    H5P.on(instance, 'exitFullScreen', function () {
      H5P.isFullscreen = false;
      H5P.exitFullScreen = undefined;
    });
    return;
  }

  var $container = $element;
  var $classes, $iframe;
  if (body === undefined)  {
    $body = H5P.$body;
  }
  else {
    // We're called from an iframe.
    $body = H5P.jQuery(body);
    $classes = $body.add($element.get());
    var iframeSelector = '#h5p-iframe-' + $element.parent().data('content-id');
    $iframe = H5P.jQuery(iframeSelector);
    $element = $iframe.parent(); // Put iframe wrapper in fullscreen, not container.
  }

  $classes = $element.add(H5P.$body).add($classes);

  /**
   * Prepare for resize by setting the correct styles.
   *
   * @param {String} classes CSS
   */
  var before = function (classes) {
    $classes.addClass(classes);

    if ($iframe !== undefined) {
      // Set iframe to its default size(100%).
      $iframe.css('height', '');
    }
  };

  /**
   * Gets called when fullscreen mode has been entered.
   * Resizes and sets focus on content.
   */
  var entered = function () {
    // Do not rely on window resize events.
    H5P.trigger(instance, 'resize');
    H5P.trigger(instance, 'focus');
    H5P.trigger(instance, 'enterFullScreen');
  };

  /**
   * Gets called when fullscreen mode has been exited.
   * Resizes and sets focus on content.
   *
   * @param {String} classes CSS
   */
  var done = function (classes) {
    H5P.isFullscreen = false;
    $classes.removeClass(classes);

    // Do not rely on window resize events.
    H5P.trigger(instance, 'resize');
    H5P.trigger(instance, 'focus');

    H5P.exitFullScreen = undefined;
    if (exitCallback !== undefined) {
      exitCallback();
    }

    H5P.trigger(instance, 'exitFullScreen');
  };

  H5P.isFullscreen = true;
  if (H5P.fullScreenBrowserPrefix === undefined) {
    // Create semi fullscreen.

    if (H5P.isFramed) {
      return; // TODO: Should we support semi-fullscreen for IE9 & 10 ?
    }

    before('h5p-semi-fullscreen');
    var $disable = H5P.jQuery('<div role="button" tabindex="1" class="h5p-disable-fullscreen" title="' + H5P.t('disableFullscreen') + '"></div>').appendTo($container.find('.h5p-content-controls'));
    var keyup, disableSemiFullscreen = function () {
      $disable.remove();
      $body.unbind('keyup', keyup);
      done('h5p-semi-fullscreen');
    };
    keyup = function (event) {
      if (event.keyCode === 27) {
        disableSemiFullscreen();
      }
    };
    $disable.click(disableSemiFullscreen);
    $body.keyup(keyup);
    entered();
  }
  else {
    // Create real fullscreen.

    before('h5p-fullscreen');
    var first, eventName = (H5P.fullScreenBrowserPrefix === 'ms' ? 'MSFullscreenChange' : H5P.fullScreenBrowserPrefix + 'fullscreenchange');
    document.addEventListener(eventName, function () {
      if (first === undefined) {
        // We are entering fullscreen mode
        first = false;
        entered();
        return;
      }

      // We are exiting fullscreen
      done('h5p-fullscreen');
      document.removeEventListener(eventName, arguments.callee, false);
    });

    if (H5P.fullScreenBrowserPrefix === '') {
      $element[0].requestFullScreen();
    }
    else {
      var method = (H5P.fullScreenBrowserPrefix === 'ms' ? 'msRequestFullscreen' : H5P.fullScreenBrowserPrefix + 'RequestFullScreen');
      var params = (H5P.fullScreenBrowserPrefix === 'webkit' && H5P.safariBrowser === 0 ? Element.ALLOW_KEYBOARD_INPUT : undefined);
      $element[0][method](params);
    }

    // Allows everone to exit
    H5P.exitFullScreen = function () {
      if (H5P.fullScreenBrowserPrefix === '') {
        document.exitFullscreen();
      }
      else if (H5P.fullScreenBrowserPrefix === 'moz') {
        document.mozCancelFullScreen();
      }
      else {
        document[H5P.fullScreenBrowserPrefix + 'ExitFullscreen']();
      }
    };
  }
};

/**
 * Find the path to the content files based on the id of the content
 *
 * Also identifies and returns absolute paths
 *
 * @param string path
 *  Absolute path to a file, or relative path to a file in the content folder
 * @param contentId
 *  Id of the content requesting a path
 */
H5P.getPath = function (path, contentId) {
  var hasProtocol = function (path) {
    return path.match(/^[a-z0-9]+:\/\//i);
  };

  if (hasProtocol(path)) {
    return path;
  }

  if (contentId !== undefined) {
    prefix = H5PIntegration.url + '/content/' + contentId;
  }
  else if (window.H5PEditor !== undefined) {
    prefix = H5PEditor.filesPath;
  }
  else {
    return;
  }

  if (!hasProtocol(prefix)) {
    // Use absolute urls
    prefix = window.location.protocol + "//" + window.location.host + prefix;
  }

  return prefix + '/' + path;
};

/**
 * THIS FUNCTION IS DEPRECATED, USE getPath INSTEAD
 * Will be remove march 2016.
 *
 *  Find the path to the content files folder based on the id of the content
 *
 *  @param contentId
 *  Id of the content requesting a path
 */
H5P.getContentPath = function (contentId) {
  return H5PIntegration.url + '/content/' + contentId;
};

/**
 * Get library class constructor from H5P by classname.
 * Note that this class will only work for resolve "H5P.NameWithoutDot".
 * Also check out: H5P.newRunnable
 *
 * Used from libraries to construct instances of other libraries' objects by name.
 *
 * @param {string} name Name of library
 * @returns Class constructor
 */
H5P.classFromName = function (name) {
  var arr = name.split(".");
  return this[arr[arr.length-1]];
};

/**
 * A safe way of creating a new instance of a runnable H5P.
 *
 * TODO: Should we check if version matches the library?
 * TODO: Dynamically try to load libraries currently not loaded? That will require a callback.
 *
 * @param {Object} library Library/action object form params.
 * @param {Number} contentId
 * @param {jQuery} $attachTo An optional element to attach the instance to.
 * @param {Boolean} skipResize Optionally skip triggering of the resize event after attaching.
 * @param {Object} extras - extra params for the H5P content constructor
 * @return {Object} Instance.
 */
H5P.newRunnable = function (library, contentId, $attachTo, skipResize, extras) {
  var nameSplit, versionSplit, machineName;
  try {
    nameSplit = library.library.split(' ', 2);
    machineName = nameSplit[0];
    versionSplit = nameSplit[1].split('.', 2);
  }
  catch (err) {
    return H5P.error('Invalid library string: ' + library.library);
  }

  if ((library.params instanceof Object) !== true || (library.params instanceof Array) === true) {
    H5P.error('Invalid library params for: ' + library.library);
    return H5P.error(library.params);
  }

  // Find constructor function
  var constructor;
  try {
    nameSplit = nameSplit[0].split('.');
    constructor = window;
    for (var i = 0; i < nameSplit.length; i++) {
      constructor = constructor[nameSplit[i]];
    }
    if (typeof constructor !== 'function') {
      throw null;
    }
  }
  catch (err) {
    return H5P.error('Unable to find constructor for: ' + library.library);
  }

  if (extras === undefined) {
    extras = {};
  }
  if (library.subContentId) {
    extras.subContentId = library.subContentId;
  }

  if (library.userDatas && library.userDatas.state && H5PIntegration.saveFreq) {
    extras.previousState = library.userDatas.state;
  }

  var instance;
  // Some old library versions have their own custom third parameter.
  // Make sure we don't send them the extras.
  // (they will interpret it as something else)
  if (H5P.jQuery.inArray(library.library, ['H5P.CoursePresentation 1.0', 'H5P.CoursePresentation 1.1', 'H5P.CoursePresentation 1.2', 'H5P.CoursePresentation 1.3']) > -1) {
    instance = new constructor(library.params, contentId);
  }
  else {
    instance = new constructor(library.params, contentId, extras);
  }

  if (instance.$ === undefined) {
    instance.$ = H5P.jQuery(instance);
  }

  if (instance.contentId === undefined) {
    instance.contentId = contentId;
  }
  if (instance.subContentId === undefined && library.subContentId) {
    instance.subContentId = library.subContentId;
  }
  if (instance.parent === undefined && extras && extras.parent) {
    instance.parent = extras.parent;
  }

  if ($attachTo !== undefined) {
    instance.attach($attachTo);
    H5P.trigger(instance, 'domChanged', {
      '$target': $attachTo,
      'library': machineName,
      'key': 'newLibrary'
    }, {'bubbles': true, 'external': true});

    if (skipResize === undefined || !skipResize) {
      // Resize content.
      H5P.trigger(instance, 'resize');
    }
  }
  return instance;
};

/**
 * Used to print useful error messages.
 *
 * @param {mixed} err Error to print.
 * @returns {undefined}
 */
H5P.error = function (err) {
  if (window.console !== undefined && console.error !== undefined) {
    console.error(err);
  }
};

/**
 * Translate text strings.
 *
 * @param {String} key Translation identifier, may only contain a-zA-Z0-9. No spaces or special chars.
 * @param {Object} vars Data for placeholders.
 * @param {String} ns Translation namespace. Defaults to H5P.
 * @returns {String} Text
 */
H5P.t = function (key, vars, ns) {
  if (ns === undefined) {
    ns = 'H5P';
  }

  if (H5PIntegration.l10n[ns] === undefined) {
    return '[Missing translation namespace "' + ns + '"]';
  }

  if (H5PIntegration.l10n[ns][key] === undefined) {
    return '[Missing translation "' + key + '" in "' + ns + '"]';
  }

  var translation = H5PIntegration.l10n[ns][key];

  if (vars !== undefined) {
    // Replace placeholder with variables.
    for (var placeholder in vars) {
      translation = translation.replace(placeholder, vars[placeholder]);
    }
  }

  return translation;
};

H5P.Dialog = function (name, title, content, $element) {
  var self = this;
  var $dialog = H5P.jQuery('<div class="h5p-popup-dialog h5p-' + name + '-dialog">\
                              <div class="h5p-inner">\
                                <h2>' + title + '</h2>\
                                <div class="h5p-scroll-content">' + content + '</div>\
                                <div class="h5p-close" role="button" tabindex="1" title="' + H5P.t('close') + '">\
                              </div>\
                            </div>')
    .insertAfter($element)
    .click(function () {
      self.close();
    })
    .children('.h5p-inner')
      .click(function () {
        return false;
      })
      .find('.h5p-close')
        .click(function () {
          self.close();
        })
        .end()
      .end();

  this.open = function () {
    setTimeout(function () {
      $dialog.addClass('h5p-open'); // Fade in
      // Triggering an event, in case something has to be done after dialog has been opened.
      H5P.jQuery(self).trigger('dialog-opened', [$dialog]);
    }, 1);
  };

  this.close = function () {
    $dialog.removeClass('h5p-open'); // Fade out
    setTimeout(function () {
      $dialog.remove();
    }, 200);
  };
};

/**
 * Gather copyright information and display in a dialog over the content.
 *
 * @param {jQuery} $element to insert dialog after.
 * @param {object} instance to get copyright information from.
 * @returns {undefined}
 */
H5P.openCopyrightsDialog = function ($element, instance, parameters, contentId) {
  var copyrights;
  if (instance.getCopyrights !== undefined) {
    // Use the instance's own copyright generator
    copyrights = instance.getCopyrights();
  }
  else {
    // Create a generic flat copyright list
    copyrights = new H5P.ContentCopyrights();
    H5P.findCopyrights(copyrights, parameters, contentId);
  }

  if (copyrights !== undefined) {
    // Convert to string
    copyrights = copyrights.toString();
  }
  if (copyrights === undefined || copyrights === '') {
    // Use no copyrights default text
    copyrights = H5P.t('noCopyrights');
  }

  // Open dialog with copyright information
  var dialog = new H5P.Dialog('copyrights', H5P.t('copyrightInformation'), copyrights, $element);
  dialog.open();
};

/**
 * Gather a flat list of copyright information from the given parameters.
 *
 * @param {H5P.ContentCopyrights} info Used to collect all information in.
 * @param {(Object|Arrray)} parameters To search for file objects in.
 * @param {Number} contentId Used to insert thumbnails for images.
 * @returns {undefined}
 */
H5P.findCopyrights = function (info, parameters, contentId) {
  // Cycle through parameters
  for (var field in parameters) {
    if (!parameters.hasOwnProperty(field)) {
      continue; // Do not check
    }
    var value = parameters[field];

    if (value instanceof Array) {
      // Cycle through array
      H5P.findCopyrights(info, value, contentId);
    }
    else if (value instanceof Object) {
      // Check if object is a file with copyrights
      if (value.copyright === undefined ||
          value.copyright.license === undefined ||
          value.path === undefined ||
          value.mime === undefined) {

        // Nope, cycle throught object
        H5P.findCopyrights(info, value, contentId);
      }
      else {
        // Found file, add copyrights
        var copyrights = new H5P.MediaCopyright(value.copyright);
        if (value.width !== undefined && value.height !== undefined) {
          copyrights.setThumbnail(new H5P.Thumbnail(H5P.getPath(value.path, contentId), value.width, value.height));
        }
        info.addMedia(copyrights);
      }
    }
    else {
    }
  }
};


/**
 * Display a dialog containing the embed code.
 *
 * @param {jQuery} $element to insert dialog after.
 * @param {string} embed code.
 * @returns {undefined}
 */
H5P.openEmbedDialog = function ($element, embedCode, resizeCode, size) {
  var fullEmbedCode = embedCode + resizeCode;
  var dialog = new H5P.Dialog('embed', H5P.t('embed'), '<textarea class="h5p-embed-code-container" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>' + H5P.t('size') + ': <input type="text" value="' + size.width + '" class="h5p-embed-size"/> × <input type="text" value="' + size.height + '" class="h5p-embed-size"/> px<div role="button" tabindex="0" class="h5p-expander">' + H5P.t('showAdvanced') + '</div><div class="h5p-expander-content"><p>' + H5P.t('advancedHelp') + '</p><textarea class="h5p-embed-code-container" autocorrect="off" autocapitalize="off" spellcheck="false">' + resizeCode + '</textarea></div>', $element);

  // Selecting embed code when dialog is opened
  H5P.jQuery(dialog).on('dialog-opened', function (event, $dialog) {
    var $inner = $dialog.find('.h5p-inner');
    var $scroll = $inner.find('.h5p-scroll-content');
    var diff = $scroll.outerHeight() - $scroll.innerHeight();
    var positionInner = function () {
      var height = $inner.height();
      if ($scroll[0].scrollHeight + diff > height) {
        $inner.css('height', ''); // 100%
      }
      else {
        $inner.css('height', 'auto');
        height = $inner.height();
      }
      $inner.css('marginTop', '-' + (height / 2) + 'px');
    };

    // Handle changing of width/height
    var $w = $dialog.find('.h5p-embed-size:eq(0)');
    var $h = $dialog.find('.h5p-embed-size:eq(1)');
    var getNum = function ($e, d) {
      var num = parseFloat($e.val());
      if (isNaN(num)) {
        return d;
      }
      return Math.ceil(num);
    };
    var updateEmbed = function () {
      $dialog.find('.h5p-embed-code-container:first').val(fullEmbedCode.replace(':w', getNum($w, size.width)).replace(':h', getNum($h, size.height)));
    };

    $w.change(updateEmbed);
    $h.change(updateEmbed);
    updateEmbed();

    // Select text and expand textareas
    $dialog.find('.h5p-embed-code-container').each(function(index, value) {
      H5P.jQuery(this).css('height', this.scrollHeight + 'px').focus(function() {
          H5P.jQuery(this).select();
        });
    });
    $dialog.find('.h5p-embed-code-container').eq(0).select();
    positionInner();

    // Expand advanced embed
    var expand = function () {
      var $expander = H5P.jQuery(this);
      var $content = $expander.next();
      if ($content.is(':visible')) {
        $expander.removeClass('h5p-open').text(H5P.t('showAdvanced'));
        $content.hide();
      }
      else {
        $expander.addClass('h5p-open').text(H5P.t('hideAdvanced'));
        $content.show();
      }
      $dialog.find('.h5p-embed-code-container').each(function(index, value) {
        H5P.jQuery(this).css('height', this.scrollHeight + 'px');
      });
      positionInner();
    };
    $dialog.find('.h5p-expander').click(expand).keypress(function (event) {
      if (event.keyCode === 32) {
        expand.apply(this);
      }
    });
  });

  dialog.open();
};

/**
 * Copyrights for a H5P Content Library.
 */
H5P.ContentCopyrights = function () {
  var label;
  var media = [];
  var content = [];

  /**
   * Public. Set label.
   *
   * @param {String} newLabel
   */
  this.setLabel = function (newLabel) {
    label = newLabel;
  };

  /**
   * Public. Add sub content.
   *
   * @param {H5P.MediaCopyright} newMedia
   */
  this.addMedia = function (newMedia) {
    if (newMedia !== undefined) {
      media.push(newMedia);
    }
  };

  /**
   * Public. Add sub content.
   *
   * @param {H5P.ContentCopyrights} newContent
   */
  this.addContent = function (newContent) {
    if (newContent !== undefined) {
      content.push(newContent);
    }
  };

  /**
   * Public. Print content copyright.
   *
   * @returns {String} HTML.
   */
  this.toString = function () {
    var html = '';

    // Add media rights
    for (var i = 0; i < media.length; i++) {
      html += media[i];
    }

    // Add sub content rights
    for (i = 0; i < content.length; i++) {
      html += content[i];
    }


    if (html !== '') {
      // Add a label to this info
      if (label !== undefined) {
        html = '<h3>' + label + '</h3>' + html;
      }

      // Add wrapper
      html = '<div class="h5p-content-copyrights">' + html + '</div>';
    }

    return html;
  };
};

/**
 * A ordered list of copyright fields for media.
 *
 * @param {Object} copyright information fields.
 * @param {Object} labels translation.  Optional.
 * @param {Array} order of fields. Optional.
 * @param {Object} extraFields for copyright. Optional.
 */
H5P.MediaCopyright = function (copyright, labels, order, extraFields) {
  var thumbnail;
  var list = new H5P.DefinitionList();

  /**
   * Private. Get translated label for field.
   *
   * @param {String} fieldName
   * @return {String}
   */
  var getLabel = function (fieldName) {
    if (labels === undefined || labels[fieldName] === undefined) {
      return H5P.t(fieldName);
    }

    return labels[fieldName];
  };

  /**
   * Private. Get humanized value for field.
   *
   * @param {String} fieldName
   * @return {String}
   */
  var humanizeValue = function (fieldName, value) {
    if (fieldName === 'license') {
      return H5P.copyrightLicenses[value];
    }

    return value;
  };

  if (copyright !== undefined) {
    // Add the extra fields
    for (var field in extraFields) {
      if (extraFields.hasOwnProperty(field)) {
        copyright[field] = extraFields[field];
      }
    }

    if (order === undefined) {
      // Set default order
      order = ['title', 'author', 'year', 'source', 'license'];
    }

    for (var i = 0; i < order.length; i++) {
      var fieldName = order[i];
      if (copyright[fieldName] !== undefined) {
        list.add(new H5P.Field(getLabel(fieldName), humanizeValue(fieldName, copyright[fieldName])));
      }
    }
  }

  /**
   * Public. Set thumbnail.
   *
   * @param {H5P.Thumbnail} newThumbnail
   */
  this.setThumbnail = function (newThumbnail) {
    thumbnail = newThumbnail;
  };

  /**
   * Public. Checks if this copyright is undisclosed.
   * I.e. only has the license attribute set, and it's undisclosed.
   *
   * @returns {Boolean}
   */
  this.undisclosed = function () {
    if (list.size() === 1) {
      var field = list.get(0);
      if (field.getLabel() === getLabel('license') && field.getValue() === humanizeValue('license', 'U')) {
        return true;
      }
    }
    return false;
  };

  /**
   * Public. Print media copyright.
   *
   * @returns {String} HTML.
   */
  this.toString = function () {
    var html = '';

    if (this.undisclosed()) {
      return html; // No need to print a copyright with a single undisclosed license.
    }

    if (thumbnail !== undefined) {
      html += thumbnail;
    }
    html += list;

    if (html !== '') {
      html = '<div class="h5p-media-copyright">' + html + '</div>';
    }

    return html;
  };
};

// Translate table for copyright license codes.
H5P.copyrightLicenses = {
  'U': 'Undisclosed',
  'CC BY': 'Attribution',
  'CC BY-SA': 'Attribution-ShareAlike',
  'CC BY-ND': 'Attribution-NoDerivs',
  'CC BY-NC': 'Attribution-NonCommercial',
  'CC BY-NC-SA': 'Attribution-NonCommercial-ShareAlike',
  'CC BY-NC-ND': 'Attribution-NonCommercial-NoDerivs',
  'GNU GPL': 'General Public License',
  'PD': 'Public Domain',
  'ODC PDDL': 'Public Domain Dedication and Licence',
  'CC PDM': 'Public Domain Mark',
  'C': 'Copyright'
};

/**
 * Simple class for creating thumbnails for images.
 *
 * @param {String} source
 * @param {Number} width
 * @param {Number} height
 */
H5P.Thumbnail = function (source, width, height) {
  var thumbWidth, thumbHeight = 100;
  if (width !== undefined) {
    thumbWidth = Math.round(thumbHeight * (width / height));
  }

  /**
   * Public. Print thumbnail.
   *
   * @returns {String} HTML.
   */
  this.toString = function () {
    return '<img src="' + source + '" alt="' + H5P.t('thumbnail') + '" class="h5p-thumbnail" height="' + thumbHeight + '"' + (thumbWidth === undefined ? '' : ' width="' + thumbWidth + '"') + '/>';
  };
};

/**
 * Simple data class for storing a single field.
 */
H5P.Field = function (label, value) {
  /**
   * Public. Get field label.
   *
   * @returns {String}
   */
  this.getLabel = function () {
    return label;
  };

  /**
   * Public. Get field value.
   *
   * @returns {String}
   */
  this.getValue = function () {
    return value;
  };
};

/**
 * Simple class for creating a definition list.
 */
H5P.DefinitionList = function () {
  var fields = [];

  /**
   * Public. Add field to list.
   *
   * @param {H5P.Field} field
   */
  this.add = function (field) {
    fields.push(field);
  };

  /**
   * Public. Get Number of fields.
   *
   * @returns {Number}
   */
  this.size = function () {
    return fields.length;
  };

  /**
   * Public. Get field at given index.
   *
   * @param {Number} index
   * @returns {Object}
   */
  this.get = function (index) {
    return fields[index];
  };

  /**
   * Public. Print definition list.
   *
   * @returns {String} HTML.
   */
  this.toString = function () {
    var html = '';
    for (var i = 0; i < fields.length; i++) {
      var field = fields[i];
      html += '<dt>' + field.getLabel() + '</dt><dd>' + field.getValue() + '</dd>';
    }
    return (html === '' ? html : '<dl class="h5p-definition-list">' + html + '</dl>');
  };
};

/**
 * THIS FUNCTION/CLASS IS DEPRECATED AND WILL BE REMOVED.
 *
 * Helper object for keeping coordinates in the same format all over.
 */
H5P.Coords = function (x, y, w, h) {
  if ( !(this instanceof H5P.Coords) )
    return new H5P.Coords(x, y, w, h);

  this.x = 0;
  this.y = 0;
  this.w = 1;
  this.h = 1;

  if (typeof(x) === 'object') {
    this.x = x.x;
    this.y = x.y;
    this.w = x.w;
    this.h = x.h;
  } else {
    if (x !== undefined) {
      this.x = x;
    }
    if (y !== undefined) {
      this.y = y;
    }
    if (w !== undefined) {
      this.w = w;
    }
    if (h !== undefined) {
      this.h = h;
    }
  }
  return this;
};

/**
 * Parse library string into values.
 *
 * @param {string} library
 *  library in the format "machineName majorVersion.minorVersion"
 * @returns
 *  library as an object with machineName, majorVersion and minorVersion properties
 *  return false if the library parameter is invalid
 */
H5P.libraryFromString = function (library) {
  var regExp = /(.+)\s(\d)+\.(\d)$/g;
  var res = regExp.exec(library);
  if (res !== null) {
    return {
      'machineName': res[1],
      'majorVersion': res[2],
      'minorVersion': res[3]
    };
  }
  else {
    return false;
  }
};

/**
 * Get the path to the library
 *
 * @param {String} library
 *   The library identifier in the format "machineName-majorVersion.minorVersion".
 * @returns {String} The full path to the library.
 */
H5P.getLibraryPath = function (library) {
  return H5PIntegration.url + '/libraries/' + library;
};

/**
 * Recursivly clone the given object.
 * TODO: Consider if this needs to be in core. Doesn't $.extend do the same?
 *
 * @param {object} object Object to clone.
 * @param {type} recursive
 * @returns {object} A clone of object.
 */
H5P.cloneObject = function (object, recursive) {
  var clone = object instanceof Array ? [] : {};

  for (var i in object) {
    if (object.hasOwnProperty(i)) {
      if (recursive !== undefined && recursive && typeof object[i] === 'object') {
        clone[i] = H5P.cloneObject(object[i], recursive);
      }
      else {
        clone[i] = object[i];
      }
    }
  }

  return clone;
};

/**
 * Remove all empty spaces before and after the value.
 * TODO: Only include this or String.trim(). What is best?
 * I'm leaning towards implementing the missing ones: http://kangax.github.io/compat-table/es5/
 * So should we make this function deprecated?
 *
 * @param {String} value
 * @returns {@exp;value@call;replace}
 */
H5P.trim = function (value) {
  return value.replace(/^\s+|\s+$/g, '');
};

/**
 * Check if javascript path/key is loaded.
 *
 * @param {String} path
 * @returns {Boolean}
 */
H5P.jsLoaded = function (path) {
  H5PIntegration.loadedJs = H5PIntegration.loadedJs || [];
  return H5P.jQuery.inArray(path, H5PIntegration.loadedJs) !== -1;
};

/**
 * Check if styles path/key is loaded.
 *
 * @param {String} path
 * @returns {Boolean}
 */
H5P.cssLoaded = function (path) {
  H5PIntegration.loadedCss = H5PIntegration.loadedCss || [];
  return H5P.jQuery.inArray(path, H5PIntegration.loadedCss) !== -1;
};

/**
 * Shuffle an array in place.
 * TODO: Consider if this should be a part of core. I'm guessing very few libraries are going to use it.
 *
 * @param {array} array Array to shuffle
 * @returns {array} The passed array is returned for chaining.
 */
H5P.shuffleArray = function (array) {
  if (!(array instanceof Array)) {
    return;
  }

  var i = array.length, j, tempi, tempj;
  if ( i === 0 ) return false;
  while ( --i ) {
    j       = Math.floor( Math.random() * ( i + 1 ) );
    tempi   = array[i];
    tempj   = array[j];
    array[i] = tempj;
    array[j] = tempi;
  }
  return array;
};

/**
 * DEPRECATED! Do not use this function directly, trigger the finish event
 * instead.
 *
 * Post finished results for user.
 *
 * @param {Number} contentId
 * @param {Number} score achieved
 * @param {Number} maxScore that can be achieved
 * @param {Number} time optional reported time usage
 */
H5P.setFinished = function (contentId, score, maxScore, time) {
  if (H5PIntegration.postUserStatistics === true) {
    /**
     * Return unix timestamp for the given JS Date.
     *
     * @param {Date} date
     * @returns {Number}
     */
    var toUnix = function (date) {
      return Math.round(date.getTime() / 1000);
    };

    // Post the results
    // TODO: Should we use a variable with the complete path?
    H5P.jQuery.post(H5PIntegration.ajaxPath + 'setFinished', {
      contentId: contentId,
      score: score,
      maxScore: maxScore,
      opened: toUnix(H5P.opened[contentId]),
      finished: toUnix(new Date()),
      time: time
    });
  }
};

// Add indexOf to browsers that lack them. (IEs)
if (!Array.prototype.indexOf) {
  Array.prototype.indexOf = function (needle) {
    for (var i = 0; i < this.length; i++) {
      if (this[i] === needle) {
        return i;
      }
    }
    return -1;
  };
}

// Need to define trim() since this is not available on older IEs,
// and trim is used in several libs
if (String.prototype.trim === undefined) {
  String.prototype.trim = function () {
    return H5P.trim(this);
  };
}

/**
 * Trigger an event on an instance
 *
 * Helper function that triggers an event if the instance supports event handling
 *
 * @param {function} instance
 *  An H5P instance
 * @param {string} eventType
 *  The event type
 */
H5P.trigger = function(instance, eventType, data, extras) {
  // Try new event system first
  if (instance.trigger !== undefined) {
    instance.trigger(eventType, data, extras);
  }
  // Try deprecated event system
  else if (instance.$ !== undefined && instance.$.trigger !== undefined) {
    instance.$.trigger(eventType);
  }
};

/**
 * Register an event handler
 *
 * Helper function that registers an event handler for an event type if
 * the instance supports event handling
 *
 * @param {function} instance
 *  An h5p instance
 * @param {string} eventType
 *  The event type
 * @param {function} handler
 *  Callback that gets triggered for events of the specified type
 */
H5P.on = function(instance, eventType, handler) {
  // Try new event system first
  if (instance.on !== undefined) {
    instance.on(eventType, handler);
  }
  // Try deprecated event system
  else if (instance.$ !== undefined && instance.$.on !== undefined) {
    instance.$.on(eventType, handler);
  }
};

/**
 * Create UUID
 *
 * @returns {String} UUID
 */
H5P.createUUID = function() {
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(char) {
    var random = Math.random()*16|0, newChar = char === 'x' ? random : (random&0x3|0x8);
    return newChar.toString(16);
  });
};

H5P.createTitle = function(rawTitle, maxLength) {
  if (!rawTitle) {
    return '';
  }
  if (maxLength === undefined) {
    maxLength = 60;
  }
  var title = H5P.jQuery('<div></div>')
    .text(
      // Strip tags
      rawTitle.replace(/(<([^>]+)>)/ig,"")
    // Escape
    ).text();
  if (title.length > maxLength) {
    title = title.substr(0, maxLength - 3) + '...';
  }
  return title;
};

// Wrap in privates
(function ($) {

  /**
   * Creates ajax requests for inserting, updateing and deleteing
   * content user data.
   *
   * @private
   * @param {number} contentId What content to store the data for.
   * @param {string} dataType Identifies the set of data for this content.
   * @param {string} subContentId Identifies sub content
   * @param {function} [done] Callback when ajax is done.
   * @param {object} [data] To be stored for future use.
   * @param {boolean} [preload=false] Data is loaded when content is loaded.
   * @param {boolean} [invalidate=false] Data is invalidated when content changes.
   * @param {boolean} [async=true]
   */
  function contentUserDataAjax(contentId, dataType, subContentId, done, data, preload, invalidate, async) {
    var options = {
      url: H5PIntegration.ajax.contentUserData.replace(':contentId', contentId).replace(':dataType', dataType).replace(':subContentId', subContentId ? subContentId : 0),
      dataType: 'json',
      async: async === undefined ? true : async
    };
    if (data !== undefined) {
      options.type = 'POST';
      options.data = {
        data: (data === null ? 0 : data),
        preload: (preload ? 1 : 0),
        invalidate: (invalidate ? 1 : 0)
      };
    }
    else {
      options.type = 'GET';
    }
    if (done !== undefined) {
      options.error = function (xhr, error) {
        done(error);
      };
      options.success = function (response) {
        if (!response.success) {
          done(response.error);
          return;
        }

        if (response.data === false || response.data === undefined) {
          done();
          return;
        }

        done(undefined, response.data);
      };
    }

    $.ajax(options);
  }

  /**
   * Get user data for given content.
   *
   * @public
   * @param {number} contentId What content to get data for.
   * @param {string} dataId Identifies the set of data for this content.
   * @param {function} done Callback with error and data parameters.
   * @param {string} [subContentId] Identifies which data belongs to sub content.
   */
  H5P.getUserData = function (contentId, dataId, done, subContentId) {
    if (!subContentId) {
      subContentId = 0; // Default
    }

    var content = H5PIntegration.contents['cid-' + contentId];
    var preloadedData = content.contentUserData;
    if (preloadedData && preloadedData[subContentId] && preloadedData[subContentId][dataId]) {
      if (preloadedData[subContentId][dataId] === 'RESET') {
        done(undefined, null);
        return;
      }
      try {
        done(undefined, JSON.parse(preloadedData[subContentId][dataId]));
      }
      catch (err) {
        done(err);
      }
    }
    else {
      contentUserDataAjax(contentId, dataId, subContentId, function (err, data) {
        if (err || data === undefined) {
          done(err, data);
          return; // Error or no data
        }

        // Cache in preloaded
        if (content.contentUserData === undefined) {
          content.contentUserData = preloadedData = {};
        }
        if (preloadedData[subContentId] === undefined) {
          preloadedData[subContentId] = {};
        }
        preloadedData[subContentId][dataId] = data;

        // Done. Try to decode JSON
        try {
          done(undefined, JSON.parse(data));
        }
        catch (e) {
          done(e);
        }
      });
    }
  };

  /**
   * Set user data for given content.
   *
   * @public
   * @param {number} contentId What content to get data for.
   * @param {string} dataId Identifies the set of data for this content.
   * @param {object} data The data that is to be stored.
   * @param {object} extras - object holding the following properties:
   *  - {string} [subContentId] Identifies which data belongs to sub content.
   *  - {boolean} [preloaded=true] If the data should be loaded when content is loaded.
   *  - {boolean} [deleteOnChange=false] If the data should be invalidated when the content changes.
   *  - {function} [errorCallback] Callback with error as parameters.
   *  - {boolean} [async=true]
   */
  H5P.setUserData = function (contentId, dataId, data, extras) {
    var options = H5P.jQuery.extend(true, {}, {
      subContentId: 0,
      preloaded: true,
      deleteOnChange: false,
      async: true
    }, extras);

    try {
      data = JSON.stringify(data);
    }
    catch (err) {
      if (options.errorCallback) {
        options.errorCallback(err);
      }
      return; // Failed to serialize.
    }

    var content = H5PIntegration.contents['cid-' + contentId];
    if (!content.contentUserData) {
      content.contentUserData = {};
    }
    var preloadedData = content.contentUserData;
    if (preloadedData[options.subContentId] === undefined) {
      preloadedData[options.subContentId] = {};
    }
    if (data === preloadedData[options.subContentId][dataId]) {
      return; // No need to save this twice.
    }

    preloadedData[options.subContentId][dataId] = data;
    contentUserDataAjax(contentId, dataId, options.subContentId, function (error, data) {
      if (options.errorCallback && error) {
        options.errorCallback(error);
      }
    }, data, options.preloaded, options.deleteOnChange, options.async);
  };

  /**
   * Delete user data for given content.
   *
   * @public
   * @param {number} contentId What content to remove data for.
   * @param {string} dataId Identifies the set of data for this content.
   * @param {string} [subContentId] Identifies which data belongs to sub content.
   */
  H5P.deleteUserData = function (contentId, dataId, subContentId) {
    if (!subContentId) {
      subContentId = 0; // Default
    }

    // Remove from preloaded/cache
    var preloadedData = H5PIntegration.contents['cid-' + contentId].contentUserData;
    if (preloadedData && preloadedData[subContentId] && preloadedData[subContentId][dataId]) {
      delete preloadedData[subContentId][dataId];
    }

    contentUserDataAjax(contentId, dataId, subContentId, undefined, null);
  };

  // Init H5P when page is fully loadded
  $(document).ready(function () {
    if (!H5P.preventInit) {
      // Note that this start script has to be an external resource for it to
      // load in correct order in IE9.
      H5P.init(document.body);
    }

    if (H5PIntegration.saveFreq !== false) {
      // Store the current state of the H5P when leaving the page.
      H5P.$window.on('beforeunload', function () {
        for (var i = 0; i < H5P.instances.length; i++) {
          var instance = H5P.instances[i];
          if (instance.getCurrentState instanceof Function ||
              typeof instance.getCurrentState === 'function') {
            var state = instance.getCurrentState();
            if (state !== undefined) {
              // Async is not used to prevent the request from being cancelled.
              H5P.setUserData(instance.contentId, 'state', state, {deleteOnChange: true, async: false});
            }
          }
        }
      });
    }

    // Relay events to top window.
    if (H5P.isFramed && H5P.externalEmbed === false) {
      H5P.externalDispatcher.on('*', window.top.H5P.externalDispatcher.trigger);
    }
  });

})(H5P.jQuery);
;
/** @namespace H5P */
var H5P = H5P || {};

/**
 * The Event class for the EventDispatcher
 * @class
 */
H5P.Event = function(type, data, extras) {
  this.type = type;
  this.data = data;
  var bubbles = false;
  
  // Is this an external event?
  var external = false;
  
  // Is this event scheduled to be sent externally?
  var scheduledForExternal = false;
  
  if (extras === undefined) {
    extras = {};
  }
  if (extras.bubbles === true) {
    bubbles = true;
  }
  if (extras.external === true) {
    external = true;
  }
  
  /**
   * Prevent this event from bubbling up to parent
   * 
   * @returns {undefined}
   */
  this.preventBubbling = function() {
    bubbles = false;
  };
  
  /**
   * Get bubbling status
   * 
   * @returns {Boolean} - true if bubbling false otherwise
   */
  this.getBubbles = function() {
    return bubbles;
  };
  
  /**
   * Try to schedule an event for externalDispatcher
   * 
   * @returns {Boolean}
   *  - true if external and not already scheduled
   *  - false otherwise
   */
  this.scheduleForExternal = function() {
    if (external && !scheduledForExternal) {
      scheduledForExternal = true;
      return true;
    }
    return false;
  };
};

H5P.EventDispatcher = (function () {

  /**
   * The base of the event system.
   * Inherit this class if you want your H5P to dispatch events.
   * @class
   */
  function EventDispatcher() {
    var self = this;

    /**
     * Keep track of listeners for each event.
     * @private
     * @type {Object}
     */
    var triggers = {};

    /**
     * Add new event listener.
     *
     * @public
     * @throws {TypeError} listener - Must be a function
     * @param {String} type - Event type
     * @param {Function} listener - Event listener
     * @param {Function} thisArg - Optionally specify the this value when calling listener.
     */
    this.on = function (type, listener, thisArg) {
      if (thisArg === undefined) {
        thisArg = self;
      }
      if (typeof listener !== 'function') {
        throw TypeError('listener must be a function');
      }

      // Trigger event before adding to avoid recursion
      self.trigger('newListener', {'type': type, 'listener': listener});

      if (!triggers[type]) {
        // First
        triggers[type] = [{'listener': listener, 'thisArg': thisArg}];
      }
      else {
        // Append
        triggers[type].push({'listener': listener, 'thisArg': thisArg});
      }
    };

    /**
     * Add new event listener that will be fired only once.
     *
     * @public
     * @throws {TypeError} listener - must be a function
     * @param {String} type - Event type
     * @param {Function} listener - Event listener
     * @param {Function} thisArg - Optionally specify the this value when calling listener.
     */
    this.once = function (type, listener, thisArg) {
      if (thisArg === undefined) {
        thisArg = self;
      }
      if (!(listener instanceof Function)) {
        throw TypeError('listener must be a function');
      }

      var once = function (event) {
        self.off(event, once);
        listener.apply(thisArg, event);
      };

      self.on(type, once, thisArg);
    };

    /**
     * Remove event listener.
     * If no listener is specified, all listeners will be removed.
     *
     * @public
     * @throws {TypeError} listener - must be a function
     * @param {String} type - Event type
     * @param {Function} listener - Event listener
     */
    this.off = function (type, listener) {
      if (listener !== undefined && !(listener instanceof Function)) {
        throw TypeError('listener must be a function');
      }

      if (triggers[type] === undefined) {
        return;
      }

      if (listener === undefined) {
        // Remove all listeners
        delete triggers[type];
        self.trigger('removeListener', type);
        return;
      }

      // Find specific listener
      for (var i = 0; i < triggers[type].length; i++) {
        if (triggers[type][i].listener === listener) {
          triggers[type].unshift(i, 1);
          self.trigger('removeListener', type, {'listener': listener});
          break;
        }
      }

      // Clean up empty arrays
      if (!triggers[type].length) {
        delete triggers[type];
      }
    };

    /**
     * Dispatch event.
     *
     * @public
     * @param {String|Function} event - Event object or event type as string
     * @param {mixed} eventData
     *  Custom event data(used when event type as string is used as first
     *  argument
     */
    this.trigger = function (event, eventData, extras) {
      if (event === undefined) {
        return;
      }
      if (typeof event === 'string') {
        event = new H5P.Event(event, eventData, extras);
      }
      else if (eventData !== undefined) {
        event.data = eventData;
      }
     
      // Check to see if this event should go externally after all triggering and bubbling is done
      var scheduledForExternal = event.scheduleForExternal();
      
      if (triggers[event.type] !== undefined) {
        // Call all listeners
        for (var i = 0; i < triggers[event.type].length; i++) {
          triggers[event.type][i].listener.call(triggers[event.type][i].thisArg, event);
        }
      }
      
      if (triggers['*'] !== undefined) {
        // Call all * listeners
        for (var i = 0; i < triggers['*'].length; i++) {
          triggers['*'][i].listener.call(triggers['*'][i].thisArg, event);
        }
      }
      
      // Bubble
      if (event.getBubbles() && self.parent instanceof H5P.EventDispatcher && typeof self.parent.trigger === 'function') {
        self.parent.trigger(event);
      }
      
      if (scheduledForExternal) {
        H5P.externalDispatcher.trigger(event);
      }
    };
  }

  return EventDispatcher;
})();
;
var H5P = H5P || {};

/**
 * Constructor for xAPI events
 *
 * @class
 */
H5P.XAPIEvent = function() {
  H5P.Event.call(this, 'xAPI', {'statement': {}}, {bubbles: true, external: true});
};

H5P.XAPIEvent.prototype = Object.create(H5P.Event.prototype);
H5P.XAPIEvent.prototype.constructor = H5P.XAPIEvent;

/**
 * Helperfunction to set scored result statements
 *
 * @param {int} score
 * @param {int} maxScore
 */
H5P.XAPIEvent.prototype.setScoredResult = function(score, maxScore) {
  this.data.statement.result = {
    'score': {
      'min': 0,
      'max': maxScore,
      'raw': score
    }
  };
};

/**
 * Helperfunction to set a verb.
 *
 * @param {string} verb
 *  Verb in short form, one of the verbs defined at
 *  http://adlnet.gov/expapi/verbs/
 */
H5P.XAPIEvent.prototype.setVerb = function(verb) {
  if (H5P.jQuery.inArray(verb, H5P.XAPIEvent.allowedXAPIVerbs) !== -1) {
    this.data.statement.verb = {
      'id': 'http://adlnet.gov/expapi/verbs/' + verb,
      'display': {
        'en-US': verb
      }
    };
  }
  else if (verb.id !== undefined) {
    this.data.statement.verb = verb;
  }
};

/**
 * Helperfunction to get the statements verb id
 *
 * @param {boolean} full
 *  if true the full verb id prefixed by http://adlnet.gov/expapi/verbs/ will be returned
 * @returns {string} - Verb or null if no verb with an id has been defined
 */
H5P.XAPIEvent.prototype.getVerb = function(full) {
  var statement = this.data.statement;
  if ('verb' in statement) {
    if (full === true) {
      return statement.verb;
    }
    return statement.verb.id.slice(31);
  }
  else {
    return null;
  }
};

/**
 * Helperfunction to set the object part of the statement.
 *
 * The id is found automatically (the url to the content)
 *
 * @param {object} instance - the H5P instance
 */
H5P.XAPIEvent.prototype.setObject = function(instance) {
  if (instance.contentId) {
    this.data.statement.object = {
      'id': this.getContentXAPIId(instance),
      'objectType': 'Activity',
      'definition': {
        'extensions': {
          'http://h5p.org/x-api/h5p-local-content-id': instance.contentId
        }
      }
    };
    if (instance.subContentId) {
      this.data.statement.object.definition.extensions['http://h5p.org/x-api/h5p-subContentId'] = instance.subContentId;
      // Don't set titles on main content, title should come from publishing platform
      if (typeof instance.getH5PTitle === 'function') {
        this.data.statement.object.definition.name = {
          "en-US": instance.getH5PTitle()
        };
      }
    }
    else {
      if (H5PIntegration && H5PIntegration.contents && H5PIntegration.contents['cid-' + instance.contentId].title) {
        this.data.statement.object.definition.name = {
          "en-US": H5P.createTitle(H5PIntegration.contents['cid-' + instance.contentId].title)
        };
      }
    }
  }
};

/**
 * Helperfunction to set the context part of the statement.
 *
 * @param {object} instance - the H5P instance
 */
H5P.XAPIEvent.prototype.setContext = function(instance) {
  if (instance.parent && (instance.parent.contentId || instance.parent.subContentId)) {
    var parentId = instance.parent.subContentId === undefined ? instance.parent.contentId : instance.parent.subContentId;
    this.data.statement.context = {
      "contextActivities": {
        "parent": [
          {
            "id": this.getContentXAPIId(instance.parent),
            "objectType": "Activity"
          }
        ]
      }
    };
  }
};

/**
 * Helper function to set the actor, email and name will be added automatically
 */
H5P.XAPIEvent.prototype.setActor = function() {
  if (H5PIntegration.user !== undefined) {
    this.data.statement.actor = {
      'name': H5PIntegration.user.name,
      'mbox': 'mailto:' + H5PIntegration.user.mail,
      'objectType': 'Agent'
    };
  }
  else {
    var uuid;
    if (localStorage.H5PUserUUID) {
      uuid = localStorage.H5PUserUUID;
    }
    else {
      uuid = H5P.createUUID();
      localStorage.H5PUserUUID = uuid;
    }
    this.data.statement.actor = {
      'account': {
        'name': uuid,
        'homePage': H5PIntegration.siteUrl
      },
      'objectType': 'Agent'
    };
  }
};

/**
 * Get the max value of the result - score part of the statement
 *
 * @returns {int} the max score, or null if not defined
 */
H5P.XAPIEvent.prototype.getMaxScore = function() {
  return this.getVerifiedStatementValue(['result', 'score', 'max']);
};

/**
 * Get the raw value of the result - score part of the statement
 *
 * @returns {int} the max score, or null if not defined
 */
H5P.XAPIEvent.prototype.getScore = function() {
  return this.getVerifiedStatementValue(['result', 'score', 'raw']);
};

H5P.XAPIEvent.prototype.getContentXAPIId = function (instance) {
  var xAPIId;
  if (instance.contentId && H5PIntegration && H5PIntegration.contents) {
    xAPIId =  H5PIntegration.contents['cid-' + instance.contentId].url;
    if (instance.subContentId) {
      xAPIId += '?subContentId=' +  instance.subContentId;
    }
  }
  return xAPIId;
}

/**
 * Figure out if a property exists in the statement and return it
 *
 * @param {array} keys
 *  List describing the property we're looking for. For instance
 *  ['result', 'score', 'raw'] for result.score.raw
 * @returns the value of the property if it is set, null otherwise
 */
H5P.XAPIEvent.prototype.getVerifiedStatementValue = function(keys) {
  var val = this.data.statement;
  for (var i = 0; i < keys.length; i++) {
    if (val[keys[i]] === undefined) {
      return null;
    }
    val = val[keys[i]];
  }
  return val;
};

/**
 * List of verbs defined at http://adlnet.gov/expapi/verbs/
 *
 * @type Array
 */
H5P.XAPIEvent.allowedXAPIVerbs = [
  'answered',
  'asked',
  'attempted',
  'attended',
  'commented',
  'completed',
  'exited',
  'experienced',
  'failed',
  'imported',
  'initialized',
  'interacted',
  'launched',
  'mastered',
  'passed',
  'preferred',
  'progressed',
  'registered',
  'responded',
  'resumed',
  'scored',
  'shared',
  'suspended',
  'terminated',
  'voided'
];
;
var H5P = H5P || {};

// Create object where external code may register and listen for H5P Events
H5P.externalDispatcher = new H5P.EventDispatcher();

// EventDispatcher extensions

/**
 * Helper function for triggering xAPI added to the EventDispatcher
 *
 * @param {string} verb - the short id of the verb we want to trigger
 * @param {oject} extra - extra properties for the xAPI statement
 */
H5P.EventDispatcher.prototype.triggerXAPI = function(verb, extra) {
  this.trigger(this.createXAPIEventTemplate(verb, extra));
};

/**
 * Helper function to create event templates added to the EventDispatcher
 *
 * Will in the future be used to add representations of the questions to the
 * statements.
 *
 * @param {string} verb - verb id in short form
 * @param {object} extra - Extra values to be added to the statement
 * @returns {Function} - XAPIEvent object
 */
H5P.EventDispatcher.prototype.createXAPIEventTemplate = function(verb, extra) {
  var event = new H5P.XAPIEvent();

  event.setActor();
  event.setVerb(verb);
  if (extra !== undefined) {
    for (var i in extra) {
      event.data.statement[i] = extra[i];
    }
  }
  if (!('object' in event.data.statement)) {
    event.setObject(this);
  }
  if (!('context' in event.data.statement)) {
    event.setContext(this);
  }
  return event;
};

/**
 * Helper function to create xAPI completed events
 *
 * DEPRECATED - USE triggerXAPIScored instead
 *
 * @param {int} score - will be set as the 'raw' value of the score object
 * @param {int} maxScore - will be set as the "max" value of the score object
 */
H5P.EventDispatcher.prototype.triggerXAPICompleted = function(score, maxScore) {
  this.triggerXAPIScored(score, maxScore, 'completed');
};

/**
 * Helper function to create scored xAPI events
 *
 *
 * @param {int} score - will be set as the 'raw' value of the score object
 * @param {int} maxScore - will be set as the "max" value of the score object
 * @param {string} verb - short form of adl verb
 */
H5P.EventDispatcher.prototype.triggerXAPIScored = function(score, maxScore, verb) {
  var event = this.createXAPIEventTemplate(verb);
  event.setScoredResult(score, maxScore);
  this.trigger(event);
};

/**
 * Internal H5P function listening for xAPI completed events and stores scores
 *
 * @param {function} event - xAPI event
 */
H5P.xAPICompletedListener = function(event) {
  if (event.getVerb() === 'completed' && !event.getVerifiedStatementValue(['context', 'contextActivities', 'parent'])) {
    var score = event.getScore();
    var maxScore = event.getMaxScore();
    var contentId = event.getVerifiedStatementValue(['object', 'definition', 'extensions', 'http://h5p.org/x-api/h5p-local-content-id']);
    H5P.setFinished(contentId, score, maxScore);
  }
};
;
var H5P = H5P || {};

/**
 * GrepAPI module
 * @class
 * @external {jQuery} $ H5P.jQuery
 */
H5P.GrepAPI = (function ($) {
  var COMPETENCE_AIM_SET = 0;

  var ERROR_CONNECTION = 'Could not connect to the Internet.';

  var standardGrepUrl = 'http://mycurriculum.test.ndla.no/v1/users/ndla/curriculums';

  /**
   * Initialize module.
   * @param {String} targetGrepUrl Url used to get json from
   * @returns {Object} GrepAPI GrepAPI instance
   */
  function GrepAPI(targetGrepUrl) {
    this.$ = $(this);
    this.jsonData = [];
    this.isProcessingGrepCall = false;
    if (this.grepUrl === undefined) {
      this.grepUrl = standardGrepUrl;
    } else {
      this.grepUrl = targetGrepUrl;
    }
  }

  /**
   * Fetches data from url and updates the dialog view of provided grep dialog box
   * @param {H5P.GrepDialogBox} grepDialogBox Grep dialog box
   * @param {Object} selectedItem Selected item object
   * @param {Array} filterIdList Array with ids that data will be filtered on
   * @returns {H5P.GrepAPI}
   */
  GrepAPI.prototype.getGrepData = function (grepDialogBox, selectedItem, filterIdList) {
    var self = this;
    var dataUrl = selectedItem.child;
    if (dataUrl === undefined || dataUrl === '') {
      dataUrl = self.grepUrl;
    }

    // Do not process multiple calls at the same time.
    if (this.isProcessingGrepCall) {
      return this;
    }

    this.isProcessingGrepCall = true;
    this.executeGrepCall(dataUrl, grepDialogBox, selectedItem, filterIdList);

    grepDialogBox.createLoadingScreen(selectedItem);

    return this;
  };

  GrepAPI.prototype.executeGrepCall = function (dataUrl, grepDialogBox, selectedItem, filterIdList) {
    var self = this;

    // Find IE version
    function isIE() {
      var myNav = navigator.userAgent.toLowerCase();
      return (myNav.indexOf('msie') !== -1) ? parseInt(myNav.split('msie')[1], 10) : false;
    }

    // is IE version less than 9
    if (isIE() && isIE() <= 9) {
      // Use XDomainRequest
      if (window.XDomainRequest) {
        /*global XDomainRequest */
        var xdr = new XDomainRequest();

        xdr.open("get", dataUrl);

        xdr.onerror = function () {
          //Error Occured
          grepDialogBox.setErrorMessage(ERROR_CONNECTION);
          self.isProcessingGrepCall = false;
        };

        // Success
        xdr.onload = function (xdr) {
          self.jsonString = xdr.target.responseText;
          self.jsonData = JSON.parse(xdr.target.responseText);
          grepDialogBox.updateDialogView(self.getDataList(selectedItem.type, filterIdList), selectedItem.type);
          self.isProcessingGrepCall = false;
        };

        setTimeout(function () {
          xdr.send();
        }, 0);
      }
      return this;
    }

    $.support.cors = true;

    $.ajax({
      url: dataUrl,
      success: function (data) {
        self.jsonString = data;
        self.jsonData = JSON.parse(data);
        grepDialogBox.updateDialogView(self.getDataList(selectedItem.type, filterIdList), selectedItem.type);
        self.isProcessingGrepCall = false;
      },
      error: function () {
        grepDialogBox.setErrorMessage(ERROR_CONNECTION);
        self.isProcessingGrepCall = false;
      }
    });
  };

  /**
   * Get language neutral name
   * @param {Object} names Array of names in different languages
   * @returns {string} languageNeutralName Language neutral name
   */
  GrepAPI.prototype.getLanguageNeutral = function (names) {
    var languageNeutralName = '';
    names.names.forEach(function (nameInstance) {
      if (nameInstance.isLanguageNeutral) {
        // Set curriculum name to language neutral name
        languageNeutralName = nameInstance.name;
      } else if (languageNeutralName === '') {
        // If there is no language neutral name, set curriculum name to available name
        languageNeutralName = nameInstance.name;
      }
    });

    return languageNeutralName;
  };

  /**
   * Gets a list of data from jsonData depending on data type
   * @param {Number} dataType 0 = competence aim sets
   * @param {Array} filterIdList Array of ids to filter on
   * @returns {Array} dataList Proper curriculums or competence aim sets
   */
  GrepAPI.prototype.getDataList = function (dataType, filterIdList) {
    var self = this;
    var dataList = [];

    if (this.jsonData !== undefined && this.jsonData) {
      // get all curriculums
      if (dataType === COMPETENCE_AIM_SET) {
        // get specific competence aim set
        dataList = this.jsonData.curriculum.competenceAimSets[0].competenceAimSets;
      } else if (this.jsonData.curriculums !== undefined) {
        // get all curriculums
        dataList = self.getCurriculumList(filterIdList);
      }
    }

    return dataList;
  };

  /**
   * Get curriculum from jsonData with optional filter
   * @param {Array} filterIdList Array containing curriculum IDs to filter on
   * @returns {Array} dataList Array containing filtered curriculums
   */
  GrepAPI.prototype.getCurriculumList = function (filterIdList) {
    var dataList = this.jsonData.curriculums;

    if (filterIdList !== undefined && filterIdList.length) {
      var filteredDataList = [];
      filterIdList.forEach(function (filterIdInstance) {
        // If ID exists in dataList add id to filtered list
        dataList.some(function (dataListInstance) {
          if (dataListInstance.id === filterIdInstance) {
            filteredDataList.push(dataListInstance);
            return true;
          }
          return false;
        });
      });
      // Use filtered dataList if it was populated
      if (filteredDataList.length) {
        dataList = filteredDataList;
      }
    }

    return dataList;
  };

  return GrepAPI;

}(H5P.jQuery));
;
/** @namespace H5P */
var H5P = H5P || {};

/**
 * Grep Dialog Box module
 * @class
 * @external {jQuery} $ H5P.jQuery
 */
H5P.GrepDialogBox = (function ($) {
  var CURRICULUM = 0;
  var COMPETENCE_AIM_SET = 1;
  var COMPETENCE_AIM = 2;

  /**
   * Initialize module.
   * @param {Object} params Object containing parameters
   * @param {Array} filterIdList Array containing ids to filter on
   * @returns {Object} GrepDialogBox GrepDialogBox instance
   */
  function GrepDialogBox(params, filterIdList) {
    this.$ = $;
    this.isCreated = false;
    this.hasBottomBar = false;
    this.selectedCompetenceAims = [];
    this.filteredIdList = filterIdList;

    // l10n
    this.params = $.extend({}, {
      chooseGoalText: 'Choose goal from list',
      goalsAddedText: 'Number of goals added:',
      grepDialogDone: 'Done',
      filterGoalsPlaceholder: 'Filter on words...'
    }, params);
  }

  /**
   * Creates the dialog box and attaches it to wrapper
   * @param {jQuery} $wrapper
   */
  GrepDialogBox.prototype.attach = function ($wrapper) {
    this.$wrapper = $wrapper;
    if (!this.isCreated) {
      this.createDialogView();
    }

    // Get grep object
    this.grepApi = new H5P.GrepAPI();

    this.createBottomBar();
    this.updateDialogView();

    this.grepApi.getGrepData(this, '', this.filteredIdList);
  };

  /**
   * Creates the dialog
   * @returns {H5P.GoalsPage.GrepDialogBox}
   */
  GrepDialogBox.prototype.createDialogView = function () {
    this.$curriculumDialogContainer = $('<div>', {
      'class': 'h5p-curriculum-popup-container'
    });

    // Create a semi-transparent background for the popup
    $('<div>', {
      'class': 'h5p-curriculum-popup-background'
    }).appendTo(this.$curriculumDialogContainer);

    this.$curriculumDialog = $('<div>', {
      'class': 'h5p-curriculum-popup'
    }).appendTo(this.$curriculumDialogContainer);

    this.createHeader().appendTo(this.$curriculumDialog);
    this.createSearchBox().appendTo(this.$curriculumDialog);

    this.$curriculumView = $('<div>', {
      'class': 'h5p-curriculum-view'
    }).appendTo(this.$curriculumDialog);

    this.isCreated = true;

    this.$curriculumDialogContainer.appendTo(this.$wrapper);

    return this;
  };

  /**
   * Creates header
   */
  GrepDialogBox.prototype.createHeader = function () {
    var $header = $('<div>', {
      'class': 'h5p-curriculum-header'
    });

    $('<div>', {
      'class': 'h5p-curriculum-header-text',
      'html': this.params.header
    }).appendTo($header);
    this.createExit().appendTo($header);

    return $header;
  };

  /**
   * Creates an exit button for the dialog box
   */
  GrepDialogBox.prototype.createExit = function () {
    var self = this;
    return $('<div>', {
      'class': 'h5p-curriculum-popup-exit'
    }).click(function () {
      self.removeDialogBox();
    });
  };

  /**
   * Removes the dialog box
   */
  GrepDialogBox.prototype.removeDialogBox = function () {
    this.$curriculumDialogContainer.remove();
  };

  /**
   * Creates a throbber at the curriculum view.
   */
  GrepDialogBox.prototype.createLoadingScreen = function (selectedItem) {
    var self = this;
    if (!this.isCreated) {
      this.createDialogView();
    }

    var $throbberContainer = $('<div>', {
      'class': 'h5p-throbber-container'
    });

    // Append to curriculumView or to parent curriculum
    if (selectedItem !== undefined && selectedItem.type === CURRICULUM) {
      var selectedItemIndex = -1;

      // Find index of selected item
      self.$curriculumView.children().children().each(function (elementIndex) {
        if ($(this).html() === selectedItem.value) {
          selectedItemIndex = elementIndex;
        }
      });

      if (selectedItemIndex > -1 && selectedItemIndex < self.$curriculumView.children().children().length) {
        $throbberContainer.appendTo(self.$curriculumView.children().children().eq(selectedItemIndex));
      }
    } else {
      $throbberContainer.appendTo(self.$curriculumView);
    }

    // Create throbber
    var $throbber = H5P.JoubelUI.createThrobber();
    $throbber.appendTo($throbberContainer);
  };

  /**
   * Updates the dialog box view
   * @param {Array} dataList List of data for updating the dialog box
   * @param {Number} dataListType Data type in dataList, 0 = curriculum, 1 = curriculum aim sets, 2 = competence aim
   * @returns {H5P.GoalsPage.GrepDialogBox}
   */
  GrepDialogBox.prototype.updateDialogView = function (dataList, dataListType) {
    // Create view popup if it does not exist
    if (!this.isCreated) {
      this.createDialogView();
    }

    var curriculumList = [];
    var dataNamesList = [];

    if (dataList !== undefined && dataList.length) {
      curriculumList = dataList;
    } else {
      this.grepApi.getDataList();
    }

    if (dataListType === CURRICULUM) {
      // Append competence aim sets to curriculums
      curriculumList = this.addCompetenceAimSet(dataList);
      dataNamesList = curriculumList;
    } else if (dataListType === COMPETENCE_AIM_SET) {
      curriculumList = this.addCompetenceAimList(dataList);
      dataNamesList = curriculumList;
    } else {
      dataNamesList = this.getDataNames(curriculumList);
    }

    // Extract curriculum instances from curriculums array
    this.curriculumNames = dataNamesList;
    this.updateViewList(this.$curriculumView, dataNamesList, this.$searchInput.val());


    return this;
  };

  /**
   * Gets the names from provided data list
   * @param {Array} dataList Contains names of data
   * @param {Boolean} isCompetenceAimSet Competence aim sets
   * @returns {Array} dataNamesList The provided data list with updated data objects
   */
  GrepDialogBox.prototype.getDataNames = function (dataList, isCompetenceAimSet) {
    var self = this;
    // Clear curriculum names array
    var dataNamesList = [];
    var dataType = isCompetenceAimSet ? COMPETENCE_AIM_SET : CURRICULUM;

    // Populate wrapper
    dataList.forEach(function (data, dataIndex) {
      var dataName = self.grepApi.getLanguageNeutral(data);
      dataNamesList.push({idx: dataIndex, value: dataName, type: dataType, child: data.link, selected: false});
    });

    return dataNamesList;
  };

  /**
   * Adds a bottom bar to the dialog.
   */
  GrepDialogBox.prototype.createBottomBar = function () {
    var self = this;
    if (!this.hasBottomBar) {
      self.$bottomBar = $('<div>', {
        'class': 'h5p-bottom-bar'
      });

      self.$bottomBarText = $('<div>', {
        'class': 'h5p-bottom-bar-text',
        'html': self.params.goalsAddedText + ' 1'
      }).appendTo(self.$bottomBar);

      self.$bottomBarButton = H5P.JoubelUI
        .createSimpleRoundedButton(self.params.grepDialogDone)
        .addClass('h5p-bottom-bar-button')
        .click(function () {
          $(this).trigger('dialogFinished', [self.selectedCompetenceAims]);
          self.removeDialogBox();
        }).appendTo(self.$bottomBar);
    }
  };

  /**
   * Updates bottom bar, either changing the text or remove the bottom bar.
   */
  GrepDialogBox.prototype.updateBottomBar = function () {
    var self = this;

    if (!this.hasBottomBar) {
      self.$bottomBar.appendTo(self.$curriculumDialog);
      this.hasBottomBar = true;
    }

    if (self.selectedCompetenceAims.length <= 0) {
      self.$bottomBarText.html(self.params.goalsAddedText + ' 0');
    } else {
      self.$bottomBarText.html(self.params.goalsAddedText + ' ' + self.selectedCompetenceAims.length);
    }
  };

  /**
   * Clears wrapper and attaches curriculums to it
   * @param {Array} curriculums Array of curriculum names
   * @param {jQuery} $wrapper Wrapper that curriculums will be appended to.
   * @param {String} filterString A filter for which curriculums to display
   * @returns {H5P.GoalsPage.GrepDialogBox}
   */
  GrepDialogBox.prototype.updateViewList = function ($wrapper, curriculums, filterString) {
    // Clear wrapper
    $wrapper.children().remove();
    this.createViewList(curriculums, filterString).appendTo($wrapper);

    return this;
  };

  /**
   * Creates the full list to display in dialog box from provided data
   * @param {Array} dataList Array containing all dialog box list data
   * @param {String} filterString Curriculums will be filtered on this string
   */
  GrepDialogBox.prototype.createViewList = function (dataList, filterString) {
    var self = this;
    if (filterString !== undefined && filterString) {
      dataList = self.filterDataList(filterString);
    }
    var $viewListContainer = $('<div>', {
      'class': 'h5p-view-list-container'
    });

    var prevEntry = null;

    // Populate wrapper
    dataList.forEach(function (curriculumNameInstance) {
      // Do not create children of unselected ancestors
      if (!self.isAncestorSelected(curriculumNameInstance)) {
        return;
      }

      var classString = '';
      switch (curriculumNameInstance.type) {
      case CURRICULUM:
        classString = 'h5p-view-list-entry h5p-curriculum-instance';
        break;
      case COMPETENCE_AIM_SET:
        classString = 'h5p-view-list-entry h5p-competence-aim-set-instance';
        break;
      case COMPETENCE_AIM:
        classString = 'h5p-view-list-entry h5p-competence-aim-instance';

        // Check if first child
        if (prevEntry.type !== COMPETENCE_AIM) {
          classString += ' first';
        }
        break;
      default:
        classString = 'h5p-view-list-entry';
      }

      // Add/remove selected class
      if (curriculumNameInstance.selected) {
        classString += ' selected';
      }

      prevEntry = curriculumNameInstance;

      $('<div>', {
        'class': classString,
        'text': curriculumNameInstance.value
      }).click(function () {
        self.handleListClick(curriculumNameInstance, $(this));
      }).appendTo($viewListContainer);
    });

    return $viewListContainer;
  };

  /**
   * Recursive function that checks if all ancestors of a child is selected
   * @param {Object} child Object checking its' ancestors
   * @returns {boolean} Returns true if all ancestors are selected
   */
  GrepDialogBox.prototype.isAncestorSelected = function (child) {
    // A child with no parents is "selected"
    if (child.parent === undefined) {
      return true;
    }

    // A child with a selected parents must check that parents' ancestor
    if (child.parent !== undefined && child.parent.selected) {
      return this.isAncestorSelected(child.parent);
    }

    // If an ancestor is not selected return false
    return false;
  };

  /**
   * Returns the button for finishing the dialog box
   * @returns {jQuery} this.$bottomBarButton Finish button
   */
  GrepDialogBox.prototype.getFinishedButton = function () {
    return this.$bottomBarButton;
  };

  /**
   * Adds competence aim to list of selected competence aims and updates bottom bar accordingly
   * @param {Object} selectedCompetenceAim Selected competence aim
   * @param {jQuery} selectedElement Selected element corresponding to selected competence aim
   */
  GrepDialogBox.prototype.addCompetenceAim = function (selectedCompetenceAim, selectedElement) {
    var self = this;
    if (self.selectedCompetenceAims.indexOf(selectedCompetenceAim) === -1) {
      self.selectedCompetenceAims.push(selectedCompetenceAim);
      // Add selected class
      selectedElement.addClass('selected');
      selectedCompetenceAim.selected = true;
    } else {
      self.selectedCompetenceAims.splice(self.selectedCompetenceAims.indexOf(selectedCompetenceAim), 1);
      // Remove selected class
      selectedElement.removeClass('selected');
      selectedCompetenceAim.selected = false;
    }

    this.updateBottomBar();
  };

  /**
   * Removes competence aim from selected competence aims list and updates bottom bar
   * @param {Object} selectedCompetenceAim Textual representation of comeptence aim
   */
  GrepDialogBox.prototype.removeCompetenceAim = function (selectedCompetenceAim) {
    if (this.selectedCompetenceAims.indexOf(selectedCompetenceAim) > -1) {
      this.selectedCompetenceAims.splice(this.selectedCompetenceAims.indexOf(selectedCompetenceAim), 1);
    }
    selectedCompetenceAim.selected = false;
    this.updateBottomBar();
  };

  /**
   * Process selected item in dialog box
   * @param {Object} selectedItem Selected item
   * @param {jQuery} selectedElement Selected element corresponding to selected item
   */
  GrepDialogBox.prototype.processSelection = function (selectedItem, selectedElement) {
    // select item
    selectedItem.selected = true;

    // Expand children if they exist
    var parentIndex = this.curriculumNames.indexOf(selectedItem);
    var childIndex = parentIndex + 1;
    if (childIndex < this.curriculumNames.length && this.curriculumNames[childIndex].type > selectedItem.type) {
      // Update view
      this.updateViewList(this.$curriculumView, this.curriculumNames, this.$searchInput.val());
      return;
    }

    // Otherwise get children
    if (selectedItem.type === CURRICULUM) {
      this.grepApi.getGrepData(this, selectedItem);
    } else if (selectedItem.type === COMPETENCE_AIM_SET) {
      this.updateDialogView(selectedItem.competenceAims, selectedItem.type);
    } else if (selectedItem.type === COMPETENCE_AIM) {
      this.addCompetenceAim(selectedItem, selectedElement);
    }
  };

  /**
   * Handles list clicks and chooses action depending on what list element was clicked
   * @param {Object} parent List object
   * @param {jQuery} parentElement List element
   */
  GrepDialogBox.prototype.handleListClick = function (parent, parentElement) {
    var parentIndex = this.curriculumNames.indexOf(parent);
    var parentObject = parent;
    var childIndex = parentIndex + 1;
    var childObject = this.curriculumNames[childIndex];

    if (childObject !== undefined
        && parentObject.selected
        && parentObject.type < childObject.type
        && parentObject.type !== COMPETENCE_AIM) {
      this.collapseListItem(parent);
    } else if (parentObject.type === COMPETENCE_AIM
        && this.selectedCompetenceAims.indexOf(parentObject) > -1) {
      // Remove competence aim from selection
      this.removeCompetenceAim(parentObject);
      parentElement.removeClass('selected');
    } else {
      this.processSelection(parent, parentElement);
    }
  };

  /**
   * Collapses a listitem and its' children
   * @param {Object} parent List item object
   */
  GrepDialogBox.prototype.collapseListItem = function (parent) {
    parent.selected = false;
    this.updateViewList(this.$curriculumView, this.curriculumNames, this.$searchInput.val());
  };


  /**
   * Merges competence aim set into curriculum list
   * @param {Array} competenceAimSet Competence aims added to curriculum list
   * @returns {Array} mergedList Merged list
   */
  GrepDialogBox.prototype.addCompetenceAimSet = function (competenceAimSet) {
    // Appends the data provided to the corresponding parent element existing in the dialog.
    var mergedList = [];
    var self = this;

    // Match link to appropriate parent
    this.curriculumNames.forEach(function (curriculumName) {
      mergedList.push(curriculumName);
      if (curriculumName.child === competenceAimSet[0].links.parent) {
        // Append list under parent
        competenceAimSet.forEach(function (competenceAimSetInstance, instanceIndex) {
          var instanceName = self.grepApi.getLanguageNeutral(competenceAimSetInstance);
          mergedList.push({
            idx: instanceIndex,
            type: curriculumName.type + 1,
            value: instanceName,
            parent: curriculumName,
            competenceAims: competenceAimSetInstance.competenceAims,
            selected: false
          });
        });
      }
    });

    return mergedList;
  };

  GrepDialogBox.prototype.addCompetenceAimList = function (competenceAimList) {
    var mergedList = [];
    var self = this;

    this.curriculumNames.forEach(function (curriculumName) {
      mergedList.push(curriculumName);
      if (curriculumName.competenceAims !== undefined && curriculumName.competenceAims.length) {
        if (curriculumName.competenceAims[0] === competenceAimList[0]) {
          // Append list under parent
          competenceAimList.forEach(function (competenceAimInstance, instanceIndex) {
            var instanceName = self.grepApi.getLanguageNeutral(competenceAimInstance);
            mergedList.push({
              idx: instanceIndex,
              type: curriculumName.type + 1,
              value: instanceName,
              parent: curriculumName,
              curriculum: curriculumName.parent,
              selected: false
            });
          });
        }
      }
    });

    return mergedList;
  };

  /**
   * Filters curriculums on string
   * @param {String} filterString Filter string
   * @returns {Array} filteredCurriculumNames Filtered curriculum names
   */
  GrepDialogBox.prototype.filterDataList = function (filterString) {
    var filteredCurriculumNames = [];
    var prevCurriculum = null;
    this.curriculumNames.forEach(function (curriculumNameInstance) {
      // Only filter curriculums
      if (curriculumNameInstance.type === CURRICULUM) {
        var isMatching = false;

        // Check if filter string is a substring
        if (curriculumNameInstance.value.toLowerCase().indexOf(filterString.toLowerCase()) > -1) {
          filteredCurriculumNames.push(curriculumNameInstance);
          isMatching = true;
        }

        // Set curriculum as previous curriculum
        prevCurriculum = {instance: curriculumNameInstance, isMatching: isMatching};
      } else {
        // Add non curriculum data entry if previous curriculum was matching filter string
        if (prevCurriculum !== null && prevCurriculum.isMatching) {
          filteredCurriculumNames.push(curriculumNameInstance);
        }
      }
    });

    return filteredCurriculumNames;
  };

  /**
   * Creates a search box inside wrapper
   * @returns {jQuery} $searchContainer Search container
   */
  GrepDialogBox.prototype.createSearchBox = function () {
    var self = this;

    var $searchContainer = $('<div>', {
      'class': 'h5p-curriculum-search-container'
    });

    this.$searchInput = $('<input>', {
      'type': 'text',
      'class': 'h5p-curriculum-search-box',
      'placeholder': this.params.filterGoalsPlaceholder
    }).keyup(function () {
      // Filter curriculum names on key up
      var input = $(this).val();
      self.updateViewList(self.$curriculumView, self.curriculumNames, input);
    }).appendTo($searchContainer);

    return $searchContainer;
  };

  /**
   * Sets error message in grep dialog box
   * @param {String} msg String explaining the error
   */
  GrepDialogBox.prototype.setErrorMessage = function (msg) {
    this.$curriculumView.children().remove();
    this.$curriculumView.html(msg);
  };

  return GrepDialogBox;

}(H5P.jQuery));
;
/*global Blob, saveAs */
var H5P = H5P || {};

/**
 * Class responsible for creating an export page
 */
H5P.JoubelExportPage = (function ($) {

  var isMobile = {
    Android: function () {
      return (/Android/i).test(navigator.userAgent);
    },
    BlackBerry: function () {
      return (/BlackBerry/i).test(navigator.userAgent);
    },
    iOS: function () {
      return (/iPhone|iPad|iPod/i).test(navigator.userAgent);
    },
    Windows: function () {
      return (/IEMobile/i).test(navigator.userAgent);
    },
    any: function () {
      return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());
    }
  };

  /**
   * Display a pop-up containing an exportable text area with action buttons.
   *
   * @param {String} header Header message
   * @param {jQuery} $body The container which message dialog will be appended to
   * @param {String} selectAllTextLabel Select all text button label
   * @param {String} exportTextLabel Export text button label
   */
  function JoubelExportPage(header, $body, selectAllTextLabel, exportTextLabel) {
    var self = this;

    // Standard labels:
    var standardSelectAllTextLabel = 'Select all';
    var standardExportTextLabel = 'Export text';

    if (selectAllTextLabel !== undefined) {
      standardSelectAllTextLabel = selectAllTextLabel;
    }

    if (exportTextLabel !== undefined) {
      standardExportTextLabel = exportTextLabel;
    }

    var exportPageTemplate =
      '<div class="joubel-create-document">' +
      ' <div class="joubel-exportable-header">' +
      '   <div class="joubel-exportable-header-inner">' +
      '     <div class="joubel-exportable-header-text">' +
      '       <span>' + header + '</span>' +
      '     </div>' +
      '     <div class="joubel-export-page-close" title="Exit" role="button" tabindex="0"></div>' +
      '     <div class="joubel-exportable-copy-button" role="button" tabindex="0">' +
      '       <span>' + standardSelectAllTextLabel + '</span>' +
      '     </div>' +
      '     <div class="joubel-exportable-export-button" role="button" tabindex="0">' +
      '       <span>' + standardExportTextLabel + '</span>' +
      '     </div>' +
      '   </div>' +
      ' </div>' +
      ' <div class="joubel-exportable-body">' +
      '   <div class="joubel-exportable-area"></div>' +
      ' </div>' +
      '</div>';

    this.$inner = $(exportPageTemplate);

    // Replace newlines with html line breaks
    var $bodyReplacedLineBreaks = $body.replace(/(?:\r\n|\r|\n)/g, '<br />');

    // Append body to exportable area
    self.$exportableArea = $('.joubel-exportable-area', self.$inner).append($bodyReplacedLineBreaks);

    self.initExitExportPageButton();
    self.initExportButton();
    self.initSelectAllTextButton();

    // Remove buttons that are not working properly for mobiles at the moment
    if (isMobile.any()) {
      self.$exportButton.remove();
      self.$selectAllTextButton.remove();
    }

    // Initialize resize listener for responsive design
    this.initResizeFunctionality();

    return this.$inner;
  }

  /**
   * Initialize exit export page button
   */
  JoubelExportPage.prototype.initExitExportPageButton = function () {
    var self = this;
    // Exit export page event
    $('.joubel-export-page-close', self.$inner).click(function () {
      //Remove export page.
      self.$inner.remove();
      $(this).blur();
    }).keydown(function (e) {
      var keyPressed = e.which;
      // 32 - space
      if (keyPressed === 32) {
        $(this).click();
        e.preventDefault();
      }
    });
  };

  /**
   * Initialize export button interactions
   */
  JoubelExportPage.prototype.initExportButton = function () {
    var self = this;
    // Export document button event
    self.$exportButton = $('.joubel-exportable-export-button', self.$inner).click(function () {
      self.saveText(self.$exportableArea.html());
      $(this).blur();
    }).keydown(function (e) {
      var keyPressed = e.which;
      // 32 - space
      if (keyPressed === 32) {
        $(this).click();
        e.preventDefault();
      }
    });
  };


  /**
   * Initialize select all text button interactions
   */
  JoubelExportPage.prototype.initSelectAllTextButton = function () {
    var self = this;
    // Select all text button event
    self.$selectAllTextButton = $('.joubel-exportable-copy-button', self.$inner).click(function () {
      self.selectText(self.$exportableArea);
      $(this).blur();
    }).keydown(function (e) {
      var keyPressed = e.which;
      // 32 - space
      if (keyPressed === 32) {
        $(this).click();
        e.preventDefault();
      }
    });
  };

  /**
   * Initializes listener for resize and performs initial resize when rendered
   */
  JoubelExportPage.prototype.initResizeFunctionality = function () {
    var self = this;

    // Listen for window resize
    $(window).resize(function () {
      self.resize();
    });

    // Initialize responsive view when view is rendered
    setTimeout(function () {
      self.resize();
    }, 0);
  };

  /**
   * Select all text in container
   * @param {jQuery} $container Container containing selected text
   */
  JoubelExportPage.prototype.selectText = function ($container) {
    var doc = document;
    var text = $container.get(0);
    var range;
    var selection;

    if (doc.body.createTextRange) {
      range = document.body.createTextRange();
      range.moveToElementText(text);
      range.select();
    } else if (window.getSelection) {
      selection = window.getSelection();
      range = document.createRange();
      range.selectNodeContents(text);
      selection.removeAllRanges();
      selection.addRange(range);
    }
  };

  /**
   * Save html string to file
   * @param {string} html html string
   */
  JoubelExportPage.prototype.saveText = function (html) {
    // Save it as a file:
    var blob = new Blob([this.createDocContent(html)], {
      type: "application/msword;charset=utf-8"
    });
    saveAs(blob, 'exported-text.doc');
  };

  /**
   * Create doc content from html
   * @param {string} html Html content
   * @returns {string} html embedded content
   */
  JoubelExportPage.prototype.createDocContent = function (html) {
    // Create HTML:
    // me + ta and other hacks to avoid that new relic injects script...
    return '<ht' + 'ml><he' + 'ad><me' + 'ta charset="UTF-8"></me' + 'ta></he' + 'ad><bo' + 'dy>' + html + '</bo' + 'dy></ht' + 'ml>';
  };

  /**
   * Responsive resize function
   */
  JoubelExportPage.prototype.resize = function () {
    var self = this;
    var staticRemoveLabelsThreshold = 37;
    var staticRemoveTitleThreshold = 23;
    // Show responsive design when width relative to font size is less than 34
    var relativeWidthOfContainer = self.$inner.width() / parseInt(self.$inner.css('font-size'), 10);

    if (relativeWidthOfContainer < staticRemoveLabelsThreshold) {
      self.$inner.addClass('responsive');
    } else {
      self.$inner.removeClass('responsive');
    }

    if (relativeWidthOfContainer < staticRemoveTitleThreshold) {
      self.$inner.addClass('no-title');
    } else {
      self.$inner.removeClass('no-title');
    }
  };

  return JoubelExportPage;
}(H5P.jQuery));
;
var H5P = H5P || {};

/**
 * Class responsible for creating a help text dialog
 */
H5P.JoubelHelpTextDialog = (function ($) {

  /**
   * Display a pop-up containing a message.
   *
   * @param {jQuery object} $container The container which message dialog will be appended to
   * @param {string} message The message
   */
  function JoubelHelpTextDialog(header, message) {
    var $helpTextDialogBox = $('<div>', {
      'class': 'joubel-help-text-dialog-box'
    });

    var $helpTextDialogBackground = $('<div>', {
      'class': 'joubel-help-text-dialog-background'
    }).appendTo($helpTextDialogBox);

    var $helpTextDialogContainer = $('<div>', {
      'class': 'joubel-help-text-dialog-container'
    }).appendTo($helpTextDialogBox);

    $('<div>', {
      'class': 'joubel-help-text-header',
      'html': header
    }).appendTo($helpTextDialogContainer);

    $('<div>', {
      'class': 'joubel-help-text-body',
      'html': message
    }).appendTo($helpTextDialogContainer);

    $('<div>', {
      'class': 'joubel-help-text-remove',
      'tabindex': 0
    }).click(function () {
      $helpTextDialogBox.remove();
    }).keydown(function (e) {
      var keyPressed = e.which;
      // 32 - space
      if (keyPressed === 32) {
        $(this).click();
        e.preventDefault();
      }
    }).appendTo($helpTextDialogContainer);

    return $helpTextDialogBox;
  }

  return JoubelHelpTextDialog;
}(H5P.jQuery));
;
var H5P = H5P || {};

/**
 * Class responsible for creating auto-disappearing dialogs
 */
H5P.JoubelMessageDialog = (function ($) {
  
  /**
   * Display a pop-up containing a message.
   * 
   * @param {jQuery object} $container The container which message dialog will be appended to
   * @param {string} message The message 
   */
  function JoubelMessageDialog ($container, message) {
    var timeout;
    
    var removeDialog = function () {
      $warning.remove();
      clearTimeout(timeout);
      $container.off('click.messageDialog');
    };
    
    // Create warning popup:
    var $warning = $('<div/>', {
      'class': 'joubel-message-dialog',
      text: message
    }).appendTo($container);
    
    // Remove after 3 seconds or if user clicks anywhere in $container:
    timeout = setTimeout(removeDialog, 3000);
    $container.on('click.messageDialog', removeDialog);
    
    return $warning;
  }
  
  return JoubelMessageDialog;
})(H5P.jQuery);;
var H5P = H5P || {};

/**
 * Class responsible for creating a circular progress bar
 */

H5P.JoubelProgressCircle = (function ($) {

  /**
   * Constructor for the Progress Circle
   *
   * @param {Number} number The amount of progress to display
   * @param {string} progressColor Color for the progress meter
   * @param {string} backgroundColor Color behind the progress meter
   */
  function ProgressCircle(number, progressColor, backgroundColor) {
    var progressColor = progressColor || '#096bcb';
    var backgroundColor = backgroundColor || '#e0e0e0';

    //Verify number
    try {
      number = Number(number);
      if (number === '') throw 'is empty';
      if (isNaN(number)) throw 'is not a number';
    } catch (e) {
      console.log('Progress circle input '+ e);
      number = 'err';
    }
    //Draw circle
    if (number > 100) {
      number = 100;
    }

    //Wrapper
    var $wrapper = $('<div/>', {
      'class': "joubel-progress-circle-wrapper"
    });

    //Active border indicates progress
    var $activeBorder = $('<div/>', {
      'class': "joubel-progress-circle-active-border"
    }).appendTo($wrapper);

    //Background circle
    var $circle = $('<div/>', {
      'class': "joubel-progress-circle-circle"
    }).appendTo($activeBorder);

    //Progress text/number
    $('<span/>', {
      'text': number,
      'class': "joubel-progress-circle-percentage"
    }).appendTo($circle);


    var deg = number * 3.6;
    if (deg <= 180) {
      $activeBorder
        .css('background-image',
        'linear-gradient(' + (90 + deg) + 'deg, transparent 50%, ' + backgroundColor + ' 50%),' +
        'linear-gradient(90deg, ' + backgroundColor + ' 50%, transparent 50%)');
    }
    else {
      $activeBorder
        .css('background-image',
        'linear-gradient(' + (deg - 90) + 'deg, transparent 50%, ' + progressColor + ' 50%),' +
        'linear-gradient(90deg, ' + backgroundColor + ' 50%, transparent 50%)');
    }
    return $wrapper;
  }

  return ProgressCircle;

})(H5P.jQuery);
;
var H5P = H5P || {};

H5P.SimpleRoundedButton = (function ($) {

  /**
   * Creates a new tip
   */
  function SimpleRoundedButton(text) {

    var $simpleRoundedButton = $('<div>', {
      'class': 'joubel-simple-rounded-button',
      'title': text,
      'role': 'button',
      'tabindex': '0'
    }).keydown(function (e) {
      var keyPressed = e.which;
      // 32 - space
      if (keyPressed === 32) {
        $(this).click();
        e.preventDefault();
      }
      $(this).focus();
    });

    $('<span>', {
      'class': 'joubel-simple-rounded-button-text',
      'html': text
    }).appendTo($simpleRoundedButton);

    return $simpleRoundedButton;
  }

  return SimpleRoundedButton;
}(H5P.jQuery));
;
var H5P = H5P || {};

/**
 * Class responsible for creating speech bubbles
 */
H5P.JoubelSpeechBubble = (function ($) {
  
  var $currentSpeechBubble;
  
  var DEFAULT_MAX_WIDTH = 400;
  
  var iDevice = navigator.userAgent.match(/iPod|iPhone|iPad/g) ? true : false;
  
  /**
   * Creates a new speech bubble
   *
   * @param {jQuery object} $container The speaking object 
   * @param {string} text The text to display
   * @param {number} maxWidth The maximum width of the bubble
   */
  function JoubelSpeechBubble($container, text, maxWidth) {
    maxWidth = maxWidth || DEFAULT_MAX_WIDTH;
    
    this.remove = function () {
      H5P.$body.off('click.speechBubble');
      if (iDevice) {
        H5P.$body.css('cursor', '');
      }
      if ($currentSpeechBubble !== undefined) {
        $currentSpeechBubble.remove();
        $currentSpeechBubble = undefined;
      }
      // Don't return false here. If the user e.g. clicks a button when the bubble is visible,
      // we want the bubble to disapear AND the button to receive the event
    };
    
    this.isHidden = function () {
      return ($currentSpeechBubble === undefined);
    };
    
    if ($currentSpeechBubble !== undefined) {
      this.remove();
    }
    
    var $h5pContainer = $('.h5p-container');
    // Create bubble
    $currentSpeechBubble = $('<div class="joubel-speech-bubble"><div class="joubel-speech-bubble-inner"><div class="joubel-speech-bubble-text">' + text + '</div></div></div>').appendTo($h5pContainer);
  
    // Setting width to 90% of parent
    var width = $h5pContainer.width()*0.9;
    
    // If width is more than max width, use max width
    width = width > maxWidth ? maxWidth : width;
    var left = $container.offset().left - width + $container.outerWidth() - $h5pContainer.offset().left - ($container.width()/2) + 20;
    
    // If width makes element go outside of body, make it smaller.
    // TODO - This is not ideal, e.g if the $container is far to the left.
    // Improvement: support left- and right-"aligned" bubbles
    if (left < 0) {
      // 3px is hard coded here just to get some margin
      // to the left side
      width += left-3;
      left = 3;
    }
    
    // Need to set font-size, since element is appended to body.
    // Using same font-size as parent. In that way it will grow accordingly
    // when resizing
    var fontSize = 16;//parseFloat($parent.css('font-size'));
    
    // Set max-width:
    $currentSpeechBubble.css({
      width: width + 'px',
      top: ($container.offset().top + $container.outerHeight() - $h5pContainer.offset().top) + 'px',
      left: left + 'px',
      fontSize: fontSize + 'px'
    });
    
    // Handle click to close
    H5P.$body.on('click.speechBubble', this.remove);
    if (iDevice) {
      H5P.$body.css('cursor', 'pointer');
    }

    return this;
  }
  
  return JoubelSpeechBubble;
})(H5P.jQuery);
;
var H5P = H5P || {};

H5P.JoubelThrobber = (function ($) {

  /**
   * Creates a new tip
   */
  function JoubelThrobber() {

    // h5p-throbber css is described in core
    var $throbber = $('<div/>', {
      'class': 'h5p-throbber'
    });

    return $throbber;
  }

  return JoubelThrobber;
}(H5P.jQuery));
;
var H5P = H5P || {};

H5P.JoubelTip = (function ($) {

  /**
   * Creates a new tip
   *
   * @param {string} text The text to display in the popup
   * @param {object} params Additional parameters
   */
  function JoubelTip(text, params) {
    var speechBubble;

    params = $.extend({
      showSpeechBubble: true
    }, params);

    var $tip = $('<div/>', {
      'class': 'joubel-tip-container' + (params.showSpeechBubble ? '' : ' be-quiet'),
      title: text,
      click: function () {

        if (speechBubble !== undefined && !speechBubble.isHidden()) {
          speechBubble.remove();
          speechBubble = undefined;
        }
        else if (params.showSpeechBubble) {
          speechBubble = H5P.JoubelSpeechBubble($tip, text);
        }
        return false;
      }
    }).append($('<div/>', {
      'class': 'joubel-tip-icon'
    }));
    return $tip;
  }

  return JoubelTip;
})(H5P.jQuery);
;
var H5P = H5P || {};

/**
 * H5P Joubel UI library.
 *
 * This is a utility library, which does not implement attach. I.e, it has to bee actively used by
 * other libraries
 */
H5P.JoubelUI = (function ($) {

  function JoubelUI() {}

  /* Public static functions */

  /* Create tip icon */
  JoubelUI.createTip = function (text, params) {
    return new H5P.JoubelTip(text, params);
  };

  /* Create message dialog */
  JoubelUI.createMessageDialog = function ($container, message) {
    return new H5P.JoubelMessageDialog($container, message);
  };

  /* Create help text dialog */
  JoubelUI.createHelpTextDialog = function (header, message) {
    return new H5P.JoubelHelpTextDialog(header, message);
  };

  /* Create progress circle */
  JoubelUI.createProgressCircle = function (number, progressColor, backgroundColor) {
    return new H5P.JoubelProgressCircle(number, progressColor, backgroundColor);
  };

  /* Create throbber for loading */
  JoubelUI.createThrobber = function () {
    return new H5P.JoubelThrobber();
  };

  /* Create simple rounded button */
  JoubelUI.createSimpleRoundedButton = function (text) {
    return new H5P.SimpleRoundedButton(text);
  };

  JoubelUI.createExportPage = function (header, body, selectAllTextLabel, exportTextLabel) {
    return new H5P.JoubelExportPage(header, body, selectAllTextLabel, exportTextLabel);
  };

  JoubelUI.createGrepDialogBox = function (params, filterIdList) {
    return new H5P.GrepDialogBox(params, filterIdList);
  };

  /**
   * Create standard Joubel button
   *
   * @param {object} params
   *  May hold any properties allowed by jQuery. If href is set, an A tag
   *  is used, if not a button tag is used.
   */
  JoubelUI.createButton = function(params) {
    var type = 'button';
    if (params.href) {
      type = 'a';
    }
    else {
      params.type = 'button';
    }
    if (params.class) {
      params.class += ' h5p-joubelui-button';
    }
    else {
      params.class = 'h5p-joubelui-button';
    }
    return $('<' + type + '/>', params);
  };

  return JoubelUI;
})(H5P.jQuery);
;
var H5P = H5P || {};

/**
 * Blanks(cloze text) module
 *
 * @param {jQuery} $
 */
H5P.Blanks = (function ($) {
  var STATE_ONGOING = 'ongoing';
  var STATE_CHECKING = 'checking';
  var STATE_SHOWING_SOLUTION = 'showing-solution';
  var STATE_FINISHED = 'finished';

  /**
   * Initialize module.
   *
   * @param {Object} params Behavior settings
   * @param {Number} id Content identification
   * @param {Object} contentData Object containing task specific content data
   * @returns {_L8.C}
   */
  function C(params, id, contentData) {
    this.id = this.contentId = id;
    H5P.EventDispatcher.call(this);

    // Set default behavior.
    this.params = $.extend({}, {
      text: "Fill in",
      questions: [
        "2 + 2 = *4*"
      ],
      userAnswers: [],
      score: "You got @score of @total points.",
      showSolutions: "Show solutions",
      tryAgain: "Try again",
      checkAnswer: "Check",
      changeAnswer: "Change answer",
      notFilledOut: "Please fill in all blanks",
      behaviour: {
        enableRetry: true,
        enableSolutionsButton: true,
        caseSensitive: true,
        showSolutionsRequiresInput: true,
        autoCheck: false,
        separateLines: false
      }
    }, params);

    this.contentData = contentData;
    if (this.contentData !== undefined && this.contentData.previousState !== undefined) {
      this.previousState = this.contentData.previousState;
    }

    this.clozes = [];
  }

  C.prototype = Object.create(H5P.EventDispatcher.prototype);
  C.prototype.constructor = C;

  /**
   * Append field to wrapper.
   *
   * @param {jQuery} $container
   */
  C.prototype.attach = function ($container) {
    // Reset clozes in case we are re-attaching
    this.clozes = [];

    this._$inner = $container.addClass('h5p-blanks').html('<div class="h5p-inner"><div class="h5p-blanks-title">' + this.params.text + '</div></div>').children();

    // Add image to inner wrapper
    if (this.params.image) {
      $('<img/>', {
        src: H5P.getPath(this.params.image.path, this.id),
        alt: '',
        class: 'h5p-blanks-image',
        prependTo: this._$inner
      });
    }

    this.appendQuestionsTo(this._$inner);

    if (this.params.behaviour.separateLines) {
      this._$inner.addClass('h5p-separate-lines');
    }

    // Add "show solutions" button and evaluation area
    this.addFooter();

    // Set stored user state
    this.setH5PUserState();
    
    this.trigger('resize');
  };

  /**
   * Append questitons to the given container.
   *
   * @param {jQuery} $container
   */
  C.prototype.appendQuestionsTo = function ($container) {
    var self = this;

    for (var i = 0; i < self.params.questions.length; i++) {
      var question = self.params.questions[i];

      // Go through the text and replace all the asterisks with input fields
      var clozeEnd, clozeStart = question.indexOf('*');
      while (clozeStart !== -1 && clozeEnd !== -1) {
        clozeStart++;
        clozeEnd = question.indexOf('*', clozeStart);
        if (clozeEnd === -1) {
          continue; // No end
        }

        // Create new cloze
        var defaultUserAnswer = self.params.userAnswers.length > self.clozes.length
          ? self.params.userAnswers[self.clozes.length]
          : null;
        var cloze = new Cloze(question.substring(clozeStart, clozeEnd), self.params.behaviour, defaultUserAnswer);
        clozeEnd++;

        question = question.slice(0, clozeStart - 1) + cloze + question.slice(clozeEnd);
        self.clozes.push(cloze);

        // Find the next cloze
        clozeStart = question.indexOf('*', clozeEnd);
      }

      $container[0].innerHTML += '<div>' + question + '</div>';
    }

    // Set input fields.
    $container.find('input').each(function (i) {
      var afterCheck;
      if (self.params.behaviour.autoCheck) {
        afterCheck = function () {
          if (self.done || self.getAnswerGiven()) {
            // All answers has been given. Show solutions button.
            self.toggleButtonVisibility(STATE_CHECKING);
            self.showEvaluation();
            self.done = true;
            self.triggerXAPICompleted(self.getScore(), self.getMaxScore());
          }
        };
      }
      self.clozes[i].setInput($(this), afterCheck, function () {
        self.toggleButtonVisibility(STATE_ONGOING);
        self.hideEvaluation();
      });
    }).keydown(function (event) {
      if (event.keyCode === 13) {
        return false; // Prevent form submission on enter key
      }
    }).on('change', function () {
      self.triggerXAPI('attempted');
    });
  };

  /**
   * Append footer to Blanks block.
   */
  C.prototype.addFooter = function () {
    this._$footer = $('<div class="h5p-blanks-footer"><div class="h5p-blanks-evaluation-container"></div></div>').appendTo(this._$inner);
    this.addButtons();
  };

  /**
   * Add show solution button.
   */
  C.prototype.addButtons = function () {
    if (this._$solutionButton !== undefined) {
      return; // Buttons already added.
    }

    var that = this;
    var $buttonBar = $('<div/>', {'class': 'h5p-button-bar'});

    if (!that.params.behaviour.autoCheck) {
      // Check answer button
      this._$checkAnswerButton = $('<button/>', {
        'class': 'h5p-button h5p-check-answer',
        type: 'button',
        text: this.params.checkAnswer
      }).appendTo($buttonBar)
        .click(function () {
          that.toggleButtonVisibility(STATE_CHECKING);
          that.markResults();
          that.showEvaluation();
          that.triggerXAPICompleted(that.getScore(), that.getMaxScore());
        });
    }

    // Display solution button
    this._$solutionButton = $('<button/>', {
      'class': 'h5p-button h5p-show-solution',
      style: 'display:' + (this.params.behaviour.enableSolutionsButton === true ? 'block;' : 'none;'),
      type: 'button',
      text: this.params.showSolutions
    }).appendTo($buttonBar)
      .click(function () {
        if (that.allBlanksFilledOut()) {
          that.toggleButtonVisibility(STATE_SHOWING_SOLUTION);
          that.showCorrectAnswers();
        }
      });

    // Try again button
    if(this.params.behaviour.enableRetry === true) {
      this._$tryAgainButton = $('<button/>', {'class': 'h5p-button h5p-try-again', type: 'button', text: this.params.tryAgain})
        .appendTo($buttonBar)
        .click(function () {
          that.removeMarkedResults();
          that.hideSolutions();
          that.hideEvaluation();
          that.clearAnswers();
          that.done = false;
          that.toggleButtonVisibility(STATE_ONGOING);
          that._$inner.find('input:first').focus();
        }
      );
    }

    $buttonBar.appendTo(this._$footer);

    this.toggleButtonVisibility(STATE_ONGOING);
  };

  /**
   * Toggle buttons dependent of state.
   *
   * Using CSS-rules to conditionally show/hide using the data-attribute [data-state]
   */
  C.prototype.toggleButtonVisibility = function (state) {
    // The show solutions button is hidden if all answers are correct
    var allCorrect = (this.getScore() === this.getMaxScore());
    if (this.params.behaviour.autoCheck && allCorrect) {
      // We are viewing the solutions
      state = STATE_FINISHED;
    }

    var toggle = (state === STATE_CHECKING && !allCorrect);
    if (this.params.behaviour.enableSolutionsButton) {
      this._$solutionButton.toggle(toggle);
    }
    var toggleRetry = (((state === STATE_CHECKING) && !allCorrect) || (state === STATE_SHOWING_SOLUTION));
    if (this.params.behaviour.enableRetry) {
      this._$tryAgainButton.toggle(toggleRetry);
    }

    this._$footer.attr("data-state", state);

    if (!this.params.behaviour.autoCheck && state !== this.lastState ) {
      this.lastState = state;

      if (state !== STATE_ONGOING) {
        // Setting focus on first visible button!
        this._$footer.find("button:visible").eq(0).focus();
      }
    }
    this.trigger('resize');
  };

  /**
   * Check if all blanks are filled out. Warn user if not
   */
  C.prototype.allBlanksFilledOut = function () {
    var self = this;

    if (!self.getAnswerGiven()) {
      self._$evaluationScore.text(self.params.notFilledOut);
      self._$evaluation.addClass('not-filled-out');
      setTimeout(function(){
        self._$evaluation.removeClass('not-filled-out');
      }, 1000);

      return false;
    }

    return true;
  };

  /**
   * Mark which answers are correct and which are wrong and disable fields if retry is off.
   */
  C.prototype.markResults = function () {
    var self = this;
    for (var i = 0; i < self.clozes.length; i++) {
      self.clozes[i].checkAnswer();
      if (!self.params.behaviour.enableRetry) {
        self.clozes[i].disableInput();
      }
    }
    this.trigger('resize');
  };

  /**
   * Removed marked results
   */
  C.prototype.removeMarkedResults = function () {
    this._$inner.find('.h5p-input-wrapper').removeClass('h5p-correct h5p-wrong');
    this._$inner.find('.h5p-input-wrapper > input').attr('disabled', false);
    this.trigger('resize');
  };


  /**
   * Displays the correct answers
   */
  C.prototype.showCorrectAnswers = function () {
    var self = this;
    this.hideSolutions();

    for (var i = 0; i < self.clozes.length; i++) {
      self.clozes[i].showSolution();
    }
    this.trigger('resize');
  };

  /**
   * Display the correct solution for the input boxes.
   *
   * This is invoked from CP - be carefull!
   */
  C.prototype.showSolutions = function () {
    this.params.behaviour.enableSolutionsButton = true;
    this.toggleButtonVisibility(STATE_FINISHED);
    this.markResults();
    this.showCorrectAnswers();
    this.showEvaluation();
    //Hides all buttons in "show solution" mode.
    this.hideButtons();
  };

  /**
   * Resets the complete task.
   * Used in contracts.
   * @public
   */
  C.prototype.resetTask = function () {
    this.hideEvaluation();
    this.hideSolutions();
    this.clearAnswers();
    this.removeMarkedResults();
    this.toggleButtonVisibility(STATE_ONGOING);
  };

  /**
   * Hides all buttons.
   * @public
   */
  C.prototype.hideButtons = function () {
    this.toggleButtonVisibility(STATE_FINISHED);
  };

  /**
   * Show evaluation widget, i.e: 'You got x of y blanks correct'
   */
  C.prototype.showEvaluation = function () {
    this.hideEvaluation();

    this._$evaluation = this._$footer.find('.h5p-blanks-evaluation-container');
    var maxScore = this.getMaxScore();
    var score = this.getScore();
    var scoreText = this.params.score.replace('@score', score).replace('@total', maxScore);
    this._$evalutaionEmoticon = $('<div class="h5p-blanks-evaluation-score-emoticon"></div>').appendTo(this._$evaluation);
    this._$evaluationScore = $('<div class="h5p-blanks-evaluation-score">' + scoreText + '</div>').appendTo(this._$evaluation);

    if (score === maxScore) {
      this._$evaluation.addClass('max-score');
      this.toggleButtonVisibility(STATE_FINISHED);
    }
    else {
      this._$evaluation.removeClass('max-score');
    }
  };

  /**
   * Hide the evaluation widget
   */
  C.prototype.hideEvaluation = function () {
    // Clear evaluation section.
    this._$footer.find('.h5p-blanks-evaluation-container').html('');
  };

  /**
   * Hide solutions. (/try again)
   */
  C.prototype.hideSolutions = function () {
    // Clean solution from quiz
    this._$inner.find('.h5p-correct-answer').remove();
  };

  /**
   * Get maximum number of correct answers.
   *
   * @returns {Number} Max points
   */
  C.prototype.getMaxScore = function () {
    var self = this;
    return self.clozes.length;
  };

  /**
   * Count the number of correct answers.
   *
   * @returns {Number} Points
   */
  C.prototype.getScore = function () {
    var self = this;
    var correct = 0;
    for (var i = 0; i < self.clozes.length; i++) {
      if (self.clozes[i].correct()) {
        correct++;
      }
      self.params.userAnswers[i] = self.clozes[i].getUserAnswer();
    }

    return correct;
  };
  
  C.prototype.getTitle = function() {
    return H5P.createTitle(this.params.text);
  };

  /**
   * Clear the user's answers
   */
  C.prototype.clearAnswers = function () {
    this._$inner.find('.h5p-text-input').val('');
  };

  /**
   * Checks if all has been answered.
   *
   * @returns {Boolean}
   */
  C.prototype.getAnswerGiven = function () {
    var self = this;

    if (this.params.behaviour.showSolutionsRequiresInput === true) {
      for (var i = 0; i < self.clozes.length; i++) {
        if (!self.clozes[i].filledOut()) {
          return false;
        }
      }
    }

    return true;
  };

  /**
   * Helps set focus the given input field.
   * @param {jQuery} $input
   */
  C.setFocus = function ($input) {
    setTimeout(function () {
      $input.focus();
    }, 1);
  };

  /**
   * Returns an object containing content of each cloze
   * 
   * @returns {object} object containing content for each cloze
   */
  C.prototype.getCurrentState = function () {
    var clozesContent = [];

    // Get user input for every cloze
    this.clozes.forEach(function (cloze) {
      clozesContent.push(cloze.getUserInput());
    });
    return clozesContent;
  };

  /**
   * Sets answers to current user state
   */
  C.prototype.setH5PUserState = function () {
    var self = this;
    var isValidState = this.previousState !== undefined
        && this.previousState.length
        && this.previousState.length === this.clozes.length;

    // Check that stored user state is valid
    if (!isValidState) {
      return;
    }

    // Set input from user state
    var hasAllClozesFilled = true;
    this.previousState.forEach(function (clozeContent, ccIndex) {
      var cloze = self.clozes[ccIndex];
      cloze.setUserInput(clozeContent);

      // Handle instant feedback
      if (self.params.behaviour.autoCheck) {
        if (cloze.filledOut()) {
          cloze.checkAnswer();
        } else {
          hasAllClozesFilled = false;
        }
      }
    });

    if (self.params.behaviour.autoCheck && hasAllClozesFilled) {
      self.showEvaluation();
      self.toggleButtonVisibility(STATE_CHECKING);
    }
  };

  /**
   * Simple private class for keeping track of clozes.
   *
   * @param {String} answer
   * @param {Object} behaviour Behaviour for the task
   * @returns {_L8.Cloze}
   */
  function Cloze(answer, behaviour, defaultUserAnswer) {
    var self = this;
    var $input, $wrapper;
    var answers = [];
    var tip;

    var answersAndTip = answer.split(':');

    if (answersAndTip.length > 0) {
      answer = answersAndTip[0];
      answers = answer.split('/');

      // Trim answers
      for (var i = 0; i < answers.length; i++) {
        answers[i] = H5P.trim(answers[i]);
        if (behaviour.caseSensitive !== true) {
          answers[i] = answers[i].toLowerCase();
        }
      }

      if (answersAndTip.length === 2) {
        tip = answersAndTip[1];
      }
    }

    /**
     * Public
     *
     * @returns {String} Trimmed answer
     */
    this.getUserAnswer = function () {
      return H5P.trim($input.val());
    };

    /**
     * Public. Get input text.
     *
     * @returns {String} Answer
     */
    this.getUserInput = function () {
      return $input.val();
    };

    /**
     * Public. Set input text
     * @param text New input text
     */
    this.setUserInput = function (text) {
      $input.val(text);
    };

    /**
     * Private. Check if the answer is correct.
     *
     * @param {String} answered
     */
    var correct = function (answered) {
      if (behaviour.caseSensitive !== true) {
        answered = answered.toLowerCase();
      }

      for (var i = 0; i < answers.length; i++) {
        if (answered === answers[i]) {
          return true;
        }
      }
      return false;
    };

    /**
     * Public. Check if filled out.
     *
     * @param {Boolean}
     */
    this.filledOut = function () {
      var answered = this.getUserAnswer();
      // Blank can be correct and is interpreted as filled out.
      return (answered !== '' || correct(answered));
    };

    /**
     * Public. Check the cloze and mark it as wrong or correct.
     */
    this.checkAnswer = function () {
      var isCorrect = correct(this.getUserAnswer());
      if (isCorrect) {
        $wrapper.addClass('h5p-correct');
        $input.attr('disabled', true);
      }
      else {
        $wrapper.addClass('h5p-wrong');
      }
    };

    /**
     * @public
     * Disables further input from this button.
     */
    this.disableInput = function () {
      $input.attr('disabled', true);
    };

    /**
     * Public. Show the correct solution.
     */
    this.showSolution = function () {
      if (correct(this.getUserAnswer())) {
        return; // Only for the wrong ones
      }

      $('<span class="h5p-correct-answer"> ' + answer + '</span>').insertAfter($wrapper);
      $input.attr('disabled', true);
    };

    /**
     * Public.
     *
     * @returns {Boolean}
     */
    this.correct = function () {
      return correct(this.getUserAnswer());
    };

    /**
     * Public. Set input element.
     *
     * @param {jQuery} $element
     */
    this.setInput = function ($element, afterCheck, afterFocus) {
      $input = $element;
      $wrapper = $element.parent();

      // Add tip if tip is set
      if(tip !== undefined && tip.trim().length > 0) {
        $wrapper.addClass('has-tip').append(H5P.JoubelUI.createTip(tip, $wrapper.parent()));
      }

      if (afterCheck !== undefined) {
        $input.blur(function () {
          if (self.filledOut()) {
            // Check answers
            if (!behaviour.enableRetry) {
              self.disableInput();
            }
            self.checkAnswer();
            afterCheck();
          }
        });
      }
      $input.focus(function () {
        $wrapper.removeClass('h5p-wrong');
        if (afterFocus !== undefined) {
          afterFocus();
        }
      });
    };

    /**
     * Public.
     *
     * @returns {String} Cloze html
     */
    this.toString = function () {
      var extra = defaultUserAnswer ? ' value="' + defaultUserAnswer + '"' : '';
      return '<span class="h5p-input-wrapper"><input type="text" class="h5p-text-input" autocapitalize="off"' + extra + '></span>';
    };
  }

  return C;
})(H5P.jQuery);
;
(function ($) {

$(document).ready(function() {

  // Expression to check for absolute internal links.
  var isInternal = new RegExp("^(https?):\/\/" + window.location.host, "i");

  // Attach onclick event to document only and catch clicks on all elements.
  $(document.body).click(function(event) {
    // Catch the closest surrounding link of a clicked element.
    $(event.target).closest("a,area").each(function() {

      var ga = Drupal.settings.googleanalytics;
      // Expression to check for special links like gotwo.module /go/* links.
      var isInternalSpecial = new RegExp("(\/go\/.*)$", "i");
      // Expression to check for download links.
      var isDownload = new RegExp("\\.(" + ga.trackDownloadExtensions + ")$", "i");

      // Is the clicked URL internal?
      if (isInternal.test(this.href)) {
        // Skip 'click' tracking, if custom tracking events are bound.
        if ($(this).is('.colorbox')) {
          // Do nothing here. The custom event will handle all tracking.
        }
        // Is download tracking activated and the file extension configured for download tracking?
        else if (ga.trackDownload && isDownload.test(this.href)) {
          // Download link clicked.
          var extension = isDownload.exec(this.href);
          _gaq.push(["_trackEvent", "Downloads", extension[1].toUpperCase(), this.href.replace(isInternal, '')]);
        }
        else if (isInternalSpecial.test(this.href)) {
          // Keep the internal URL for Google Analytics website overlay intact.
          _gaq.push(["_trackPageview", this.href.replace(isInternal, '')]);
        }
      }
      else {
        if (ga.trackMailto && $(this).is("a[href^='mailto:'],area[href^='mailto:']")) {
          // Mailto link clicked.
          _gaq.push(["_trackEvent", "Mails", "Click", this.href.substring(7)]);
        }
        else if (ga.trackOutbound && this.href.match(/^\w+:\/\//i)) {
          if (ga.trackDomainMode == 2 && isCrossDomain(this.hostname, ga.trackCrossDomains)) {
            // Top-level cross domain clicked. document.location is handled by _link internally.
            event.preventDefault();
            _gaq.push(["_link", this.href]);
          }
          else {
            // External link clicked.
            _gaq.push(["_trackEvent", "Outbound links", "Click", this.href]);
          }
        }
      }
    });
  });

  // Colorbox: This event triggers when the transition has completed and the
  // newly loaded content has been revealed.
  $(document).bind("cbox_complete", function() {
    var href = $.colorbox.element().attr("href");
    if (href) {
      _gaq.push(["_trackPageview", href.replace(isInternal, '')]);
    }
  });

});

/**
 * Check whether the hostname is part of the cross domains or not.
 *
 * @param string hostname
 *   The hostname of the clicked URL.
 * @param array crossDomains
 *   All cross domain hostnames as JS array.
 *
 * @return boolean
 */
function isCrossDomain(hostname, crossDomains) {
  /**
   * jQuery < 1.6.3 bug: $.inArray crushes IE6 and Chrome if second argument is
   * `null` or `undefined`, http://bugs.jquery.com/ticket/10076,
   * https://github.com/jquery/jquery/commit/a839af034db2bd934e4d4fa6758a3fed8de74174
   *
   * @todo: Remove/Refactor in D8
   */
  if (!crossDomains) {
    return false;
  }
  else {
    return $.inArray(hostname, crossDomains) > -1 ? true : false;
  }
}

})(jQuery);
;
