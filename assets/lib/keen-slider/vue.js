"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var n=require("vue"),t=function(){return t=Object.assign||function(n){for(var t,i=1,e=arguments.length;i<e;i++)for(var r in t=arguments[i])Object.prototype.hasOwnProperty.call(t,r)&&(n[r]=t[r]);return n},t.apply(this,arguments)};function i(n,t,i){if(i||2===arguments.length)for(var e,r=0,a=t.length;r<a;r++)!e&&r in t||(e||(e=Array.prototype.slice.call(t,0,r)),e[r]=t[r]);return n.concat(e||Array.prototype.slice.call(t))}function e(n){return Array.prototype.slice.call(n)}function r(n,t){var i=Math.floor(n);return i===t||i+1===t?n:t}function a(){return Date.now()}function o(n,t,i){if(t="data-keen-slider-"+t,null===i)return n.removeAttribute(t);n.setAttribute(t,i||"")}function u(n,t){return t=t||document,"function"==typeof n&&(n=n(t)),Array.isArray(n)?n:"string"==typeof n?e(t.querySelectorAll(n)):n instanceof HTMLElement?[n]:n instanceof NodeList?e(n):[]}function s(n){n.raw&&(n=n.raw),n.cancelable&&!n.defaultPrevented&&n.preventDefault()}function c(n){n.raw&&(n=n.raw),n.stopPropagation&&n.stopPropagation()}function d(){var n=[];return{add:function(t,i,e,r){t.addListener?t.addListener(e):t.addEventListener(i,e,r),n.push([t,i,e,r])},input:function(n,t,i,e){this.add(n,t,function(n){return function(t){t.nativeEvent&&(t=t.nativeEvent);var i=t.changedTouches||[],e=t.targetTouches||[],r=t.detail&&t.detail.x?t.detail:null;return n({id:r?r.identifier?r.identifier:"i":e[0]?e[0]?e[0].identifier:"e":"d",idChanged:r?r.identifier?r.identifier:"i":i[0]?i[0]?i[0].identifier:"e":"d",raw:t,x:r&&r.x?r.x:e[0]?e[0].screenX:r?r.x:t.pageX,y:r&&r.y?r.y:e[0]?e[0].screenY:r?r.y:t.pageY})}}(i),e)},purge:function(){n.forEach((function(n){n[0].removeListener?n[0].removeListener(n[2]):n[0].removeEventListener(n[1],n[2],n[3])})),n=[]}}}function l(n,t,i){return Math.min(Math.max(n,t),i)}function f(n){return(n>0?1:0)-(n<0?1:0)||+n}function p(n){var t=n.getBoundingClientRect();return{height:r(t.height,n.offsetHeight),width:r(t.width,n.offsetWidth)}}function v(n,t,i,e){var r=n&&n[t];return null==r?i:e&&"function"==typeof r?r():r}function h(n){return Math.round(1e6*n)/1e6}function m(n){var t,i,e,r,a,o;function u(t){o||(o=t),s(!0);var a=t-o;a>e&&(a=e);var l=r[i];if(l[3]<a)return i++,u(t);var f=l[2],p=l[4],v=l[0],h=l[1]*(0,l[5])(0===p?1:(a-f)/p);if(h&&n.track.to(v+h),a<e)return d();o=null,s(!1),c(null),n.emit("animationEnded")}function s(n){t.active=n}function c(n){t.targetIdx=n}function d(){var n;n=u,a=window.requestAnimationFrame(n)}function l(){var t;t=a,window.cancelAnimationFrame(t),s(!1),c(null),o&&n.emit("animationStopped"),o=null}return t={active:!1,start:function(t){if(l(),n.track.details){var a=0,o=n.track.details.position;i=0,e=0,r=t.map((function(n){var t,i=o,r=null!==(t=n.earlyExit)&&void 0!==t?t:n.duration,u=n.easing,s=n.distance*u(r/n.duration)||0;o+=s;var c=e;return e+=r,a+=s,[i,n.distance,c,e,n.duration,u]})),c(n.track.distToIdx(a)),d(),n.emit("animationStarted")}},stop:l,targetIdx:null}}function g(n){var t,e,r,o,u,s,c,d,p,m,g,b,x,y,w=1/0,k=[],M=null,T=0;function C(n){_(T+n)}function E(n){var t=z(T+n).abs;return D(t)?t:null}function z(n){var t=Math.floor(Math.abs(h(n/e))),r=h((n%e+e)%e);r===e&&(r=0);var a=f(n),o=c.indexOf(i([],c,!0).reduce((function(n,t){return Math.abs(t-r)<Math.abs(n-r)?t:n}))),u=o;return a<0&&t++,o===s&&(u=0,t+=a>0?1:-1),{abs:u+t*s*a,origin:o,rel:u}}function I(n,t,i){var e;if(t||!S())return A(n,i);if(!D(n))return null;var r=z(null!=i?i:T),a=r.abs,o=n-r.rel,u=a+o;e=A(u);var c=A(u-s*f(o));return(null!==c&&Math.abs(c)<Math.abs(e)||null===e)&&(e=c),h(e)}function A(n,t){if(null==t&&(t=h(T)),!D(n)||null===n)return null;n=Math.round(n);var i=z(t),r=i.abs,a=i.rel,o=i.origin,u=O(n),d=(t%e+e)%e,l=c[o],f=Math.floor((n-(r-a))/s)*e;return h(l-d-l+c[u]+f+(o===s?e:0))}function D(n){return L(n)===n}function L(n){return l(n,p,m)}function S(){return o.loop}function O(n){return(n%s+s)%s}function _(t){var i;i=t-T,k.push({distance:i,timestamp:a()}),k.length>6&&(k=k.slice(-6)),T=h(t);var e=P().abs;if(e!==M){var r=null!==M;M=e,r&&n.emit("slideChanged")}}function P(i){var a=i?null:function(){if(s){var n=S(),t=n?(T%e+e)%e:T,i=(n?T%e:T)-u[0][2],a=0-(i<0&&n?e-Math.abs(i):i),c=0,d=z(T),l=d.abs,v=d.rel,h=u[v][2],w=u.map((function(t,i){var r=a+c;(r<0-t[0]||r>1)&&(r+=(Math.abs(r)>e-1&&n?e:0)*f(-r));var u=i-v,d=f(u),p=u+l;n&&(-1===d&&r>h&&(p+=s),1===d&&r<h&&(p-=s),null!==g&&p<g&&(r+=e),null!==b&&p>b&&(r-=e));var m=r+t[0]+t[1],x=Math.max(r>=0&&m<=1?1:m<0||r>1?0:r<0?Math.min(1,(t[0]+r)/t[0]):(1-r)/t[0],0);return c+=t[0]+t[1],{abs:p,distance:o.rtl?-1*r+1-t[0]:r,portion:x,size:t[0]}}));return l=L(l),v=O(l),{abs:L(l),length:r,max:y,maxIdx:m,min:x,minIdx:p,position:T,progress:n?t/e:T/r,rel:v,slides:w,slidesLength:e}}}();return t.details=a,n.emit("detailsChanged"),a}return t={absToRel:O,add:C,details:null,distToIdx:E,idxToDist:I,init:function(t){if(function(){if(o=n.options,u=(o.trackConfig||[]).map((function(n){return[v(n,"size",1),v(n,"spacing",0),v(n,"origin",0)]})),s=u.length){e=h(u.reduce((function(n,t){return n+t[0]+t[1]}),0));var t,i=s-1;r=h(e+u[0][2]-u[i][0]-u[i][2]-u[i][1]),c=u.reduce((function(n,i){if(!n)return[0];var e=u[n.length-1],r=n[n.length-1]+(e[0]+e[2])+e[1];return r-=i[2],n[n.length-1]>r&&(r=n[n.length-1]),r=h(r),n.push(r),(!t||t<r)&&(d=n.length-1),t=r,n}),null),0===r&&(d=0),c.push(h(e))}}(),!s)return P(!0);var i;!function(){var t=n.options.range,i=n.options.loop;g=p=i?v(i,"min",-1/0):0,b=m=i?v(i,"max",w):d;var e=v(t,"min",null),r=v(t,"max",null);e&&(p=e),r&&(m=r),x=p===-1/0?p:n.track.idxToDist(p||0,!0,0),y=m===w?m:I(m,!0,0),null===r&&(b=m),v(t,"align",!1)&&m!==w&&0===u[O(m)][2]&&(y-=1-u[O(m)][0],m=E(y-T)),x=h(x),y=h(y)}(),i=t,Number(i)===i?C(A(L(t))):P()},to:_,velocity:function(){var n=a(),t=k.reduce((function(t,i){var e=i.distance,r=i.timestamp;return n-r>200||(f(e)!==f(t.distance)&&t.distance&&(t={distance:0,lastTimestamp:0,time:0}),t.time&&(t.distance+=e),t.lastTimestamp&&(t.time+=r-t.lastTimestamp),t.lastTimestamp=r),t}),{distance:0,lastTimestamp:0,time:0});return t.distance/t.time||0}}}function b(n){var t,i,e,r,a,o,u;function s(n){return 2*n}function c(n){return l(n,o,u)}function d(n){return 1-Math.pow(1-n,3)}function p(){m();var t="free-snap"===n.options.mode,i=n.track,o=i.velocity();e=f(o);var u=n.track.details,l=[];if(o||!t){var p=v(o),h=p.dist,g=p.dur;if(g=s(g),h*=e,t){var b=i.idxToDist(i.distToIdx(h),!0);b&&(h=b)}l.push({distance:h,duration:g,easing:d});var x=u.position,y=x+h;if(y<r||y>a){var w=y<r?r-x:a-x,k=0,M=o;if(f(w)===e){var T=Math.min(Math.abs(w)/Math.abs(h),1),C=function(n){return 1-Math.pow(1-n,1/3)}(T)*g;l[0].earlyExit=C,M=o*(1-T)}else l[0].earlyExit=0,k+=w;var E=v(M,100),z=E.dist*e;n.options.rubberband&&(l.push({distance:z,duration:s(E.dur),easing:d}),l.push({distance:-z+k,duration:500,easing:d}))}n.animator.start(l)}else n.moveToIdx(c(u.abs),!0,{duration:500,easing:function(n){return 1+--n*n*n*n*n}})}function v(n,t){void 0===t&&(t=1e3);var i=147e-9+(n=Math.abs(n))/t;return{dist:Math.pow(n,2)/i,dur:n/i}}function h(){var t=n.track.details;t&&(r=t.min,a=t.max,o=t.minIdx,u=t.maxIdx)}function m(){n.animator.stop()}n.on("updated",h),n.on("optionsChanged",h),n.on("created",h),n.on("dragStarted",(function(){m(),t=i=n.track.details.abs})),n.on("dragEnded",(function(){var e=n.options.mode;"snap"===e&&function(){var e=n.track,o=n.track.details,u=o.position,s=f(e.velocity());(u>a||u<r)&&(s=0);var d=t+s;0===o.slides[e.absToRel(d)].portion&&(d-=s),t!==i&&(d=i),f(e.idxToDist(d,!0))!==s&&(d+=s),d=c(d);var l=e.idxToDist(d,!0);n.animator.start([{distance:l,duration:500,easing:function(n){return 1+--n*n*n*n*n}}])}(),"free"!==e&&"free-snap"!==e||p()})),n.on("dragged",(function(){i=n.track.details.abs}))}function x(n){var t,i,e,r,a,p,v,h,m,g,b,x,y,w,k,M,T,C,E=d();function z(u){if(p&&h===u.id){var d=L(u);if(m){if(!D(u))return A(u);g=d,m=!1,n.emit("dragChecked")}if(M)return g=d;s(u);var y=function(t){if(T===-1/0&&C===1/0)return t;var e=n.track.details,o=e.length,u=e.position,s=l(t,T-u,C-u);if(0===o)return 0;if(!n.options.rubberband)return s;if(u<=C&&u>=T)return t;if(u<T&&i>0||u>C&&i<0)return t;var c=(u<T?u-T:u-C)/o,d=r*o,f=Math.abs(c*d),p=Math.max(0,1-f/a*2);return p*p*t}(v(g-d)/r*e);i=f(y);var w=n.track.details.position;(w>T&&w<C||w===T&&i>0||w===C&&i<0)&&c(u),b+=y,!x&&Math.abs(b*r)>5&&(x=!0,o(t,"moves","")),n.track.add(y),g=d,n.emit("dragged")}}function I(t){!p&&n.track.details&&n.track.details.length&&(x=!1,b=0,p=!0,m=!0,h=t.id,D(t),g=L(t),n.emit("dragStarted"))}function A(i){p&&h===i.idChanged&&(o(t,"moves",null),p=!1,n.emit("dragEnded"))}function D(n){var t=S(),i=t?n.y:n.x,e=t?n.x:n.y,r=void 0!==y&&void 0!==w&&Math.abs(w-e)<=Math.abs(y-i);return y=i,w=e,r}function L(n){return S()?n.y:n.x}function S(){return n.options.vertical}function O(){r=n.size,a=S()?window.innerHeight:window.innerWidth;var t=n.track.details;t&&(T=t.min,C=t.max)}function _(){if(E.purge(),n.options.drag&&!n.options.disabled){var i;i=n.options.dragSpeed||1,v="function"==typeof i?i:function(n){return n*i},e=n.options.rtl?-1:1,O(),t=n.container,function(){var n="data-keen-slider-clickable";u("[".concat(n,"]:not([").concat(n,"=false])"),t).map((function(n){E.add(n,"mousedown",c),E.add(n,"touchstart",c)}))}(),E.add(t,"dragstart",(function(n){s(n)})),E.input(t,"ksDragStart",I),E.input(t,"ksDrag",z),E.input(t,"ksDragEnd",A),E.input(t,"mousedown",I),E.input(t,"mousemove",z),E.input(t,"mouseleave",A),E.input(t,"mouseup",A),E.input(t,"touchstart",I,{passive:!0}),E.input(t,"touchmove",z,{passive:!1}),E.input(t,"touchend",A),E.input(t,"touchcancel",A),E.add(window,"wheel",(function(n){p&&s(n)}));var r="data-keen-slider-scrollable";u("[".concat(r,"]:not([").concat(r,"=false])"),n.container).map((function(n){return function(n){var t;E.input(n,"touchstart",(function(n){t=L(n),M=!0,k=!0}),{passive:!0}),E.input(n,"touchmove",(function(i){var e=S(),r=e?n.scrollHeight-n.clientHeight:n.scrollWidth-n.clientWidth,a=t-L(i),o=e?n.scrollTop:n.scrollLeft,u=e&&"scroll"===n.style.overflowY||!e&&"scroll"===n.style.overflowX;if(t=L(i),(a<0&&o>0||a>0&&o<r)&&k&&u)return M=!0;k=!1,s(i),M=!1})),E.input(n,"touchend",(function(){M=!1}))}(n)}))}}n.on("updated",O),n.on("optionsChanged",_),n.on("created",_),n.on("destroyed",E.purge)}function y(n){var t,i,e=null;function r(t,i,e){n.animator.active?o(t,i,e):requestAnimationFrame((function(){return o(t,i,e)}))}function a(){r(!1,!1,i)}function o(i,r,a){var o=0,u=n.size,d=n.track.details;if(d&&t){var l=d.slides;t.forEach((function(n,t){if(i)!e&&r&&s(n,null,a),c(n,null,a);else{if(!l[t])return;var d=l[t].size*u;!e&&r&&s(n,d,a),c(n,l[t].distance*u-o,a),o+=d}}))}}function u(t){return"performance"===n.options.renderMode?Math.round(t):t}function s(n,t,i){var e=i?"height":"width";null!==t&&(t=u(t)+"px"),n.style["min-"+e]=t,n.style["max-"+e]=t}function c(n,t,i){if(null!==t){t=u(t);var e=i?t:0;t="translate3d(".concat(i?0:t,"px, ").concat(e,"px, 0)")}n.style.transform=t,n.style["-webkit-transform"]=t}function d(){t&&(o(!0,!0,i),t=null),n.on("detailsChanged",a,!0)}function l(){r(!1,!0,i)}function f(){d(),i=n.options.vertical,n.options.disabled||"custom"===n.options.renderMode||(e="auto"===v(n.options.slides,"perView",null),n.on("detailsChanged",a),(t=n.slides).length&&l())}n.on("created",f),n.on("optionsChanged",f),n.on("beforeOptionsChanged",(function(){d()})),n.on("updated",l),n.on("destroyed",d)}function w(n,i){return function(e){var r,a,s,c,l,f,h=d();function m(n){var t;o(e.container,"reverse","rtl"!==(t=e.container,window.getComputedStyle(t,null).getPropertyValue("direction"))||n?null:""),o(e.container,"v",e.options.vertical&&!n?"":null),o(e.container,"disabled",e.options.disabled&&!n?"":null)}function g(){b()&&M()}function b(){var n=null;if(c.forEach((function(t){t.matches&&(n=t.__media)})),n===r)return!1;r||e.emit("beforeOptionsChanged"),r=n;var i=n?s.breakpoints[n]:s;return e.options=t(t({},s),i),m(),I(),A(),C(),!0}function x(n){var t=p(n);return(e.options.vertical?t.height:t.width)/e.size||1}function y(){return e.options.trackConfig.length}function w(n){for(var o in r=!1,s=t(t({},i),n),h.purge(),a=e.size,c=[],s.breakpoints||[]){var u=window.matchMedia(o);u.__media=o,c.push(u),h.add(u,"change",g)}h.add(window,"orientationchange",z),h.add(window,"resize",E),b()}function k(n){e.animator.stop();var t=e.track.details;e.track.init(null!=n?n:t?t.abs:0)}function M(n){k(n),e.emit("optionsChanged")}function T(n,t){if(n)return w(n),void M(t);I(),A();var i=y();C(),y()!==i?M(t):k(t),e.emit("updated")}function C(){var n=e.options.slides;if("function"==typeof n)return e.options.trackConfig=n(e.size,e.slides);for(var t=e.slides,i=t.length,r="number"==typeof n?n:v(n,"number",i,!0),a=[],o=v(n,"perView",1,!0),u=v(n,"spacing",0,!0)/e.size||0,s="auto"===o?u:u/o,c=v(n,"origin","auto"),d=0,l=0;l<r;l++){var f="auto"===o?x(t[l]):1/o-u+s,p="center"===c?.5-f/2:"auto"===c?0:c;a.push({origin:p,size:f,spacing:u}),d+=f}if(d+=u*(r-1),"auto"===c&&!e.options.loop&&1!==o){var h=0;a.map((function(n){var t=d-h;return h+=n.size+u,t>=1||(n.origin=1-t-(d>1?0:1-d)),n}))}e.options.trackConfig=a}function E(){I();var n=e.size;e.options.disabled||n===a||(a=n,T())}function z(){E(),setTimeout(E,500),setTimeout(E,2e3)}function I(){var n=p(e.container);e.size=(e.options.vertical?n.height:n.width)||1}function A(){e.slides=u(e.options.selector,e.container)}e.container=(f=u(n,l||document)).length?f[0]:null,e.destroy=function(){h.purge(),e.emit("destroyed"),m(!0)},e.prev=function(){e.moveToIdx(e.track.details.abs-1,!0)},e.next=function(){e.moveToIdx(e.track.details.abs+1,!0)},e.update=T,w(e.options)}}var k=function(n,t,e){try{return function(n,t){var i,e={};return i={emit:function(n){e[n]&&e[n].forEach((function(n){n(i)}));var t=i.options&&i.options[n];t&&t(i)},moveToIdx:function(n,t,e){var r=i.track.idxToDist(n,t);if(r){var a=i.options.defaultAnimation;i.animator.start([{distance:r,duration:v(e||a,"duration",500),easing:v(e||a,"easing",(function(n){return 1+--n*n*n*n*n}))}])}},on:function(n,t,i){void 0===i&&(i=!1),e[n]||(e[n]=[]);var r=e[n].indexOf(t);r>-1?i&&delete e[n][r]:i||e[n].push(t)},options:n},function(){if(i.track=g(i),i.animator=m(i),t)for(var n=0,e=t;n<e.length;n++)(0,e[n])(i);i.track.init(i.options.initial||0),i.emit("created")}(),i}(t,i([w(n,{drag:!0,mode:"snap",renderMode:"precision",rubberband:!0,selector:".keen-slider__slide"}),y,x,b],e||[],!0))}catch(n){console.error(n)}};exports.useKeenSlider=function(t,i){var e=n.ref(),r=n.ref();return n.isRef(t)&&n.watch(t,(function(n,t){r.value&&r.value.update(n)})),n.onMounted((function(){e.value&&(r.value=new k(e.value,n.isRef(t)?t.value:t,i))})),n.onUnmounted((function(){r.value&&r.value.destroy()})),[e,r]};
