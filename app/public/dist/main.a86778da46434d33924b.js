(()=>{"use strict";var r,e={75:(r,e,o)=>{var n=o(755);n((function(){const r=()=>n(".expression").val();function e(){n.ajax({url:"/api/calc/logs"}).done((function(r){let e="";for(let o of r)e+="Expression: "+o.expression+", Result: <strong>"+o.result+"</strong><br>";n(".logs").html(e)}))}function o(r){n.ajax({url:"/api/calc",type:"PUT",data:{data:r}}).fail((function(r){n(".errors").html(r.responseJSON.data)})).done((function(r){var o;o=r.result,n(".expression").val(o),n(".errors").html(""),e()}))}e(),n(document).on("keypress",(function(e){13==e.which&&o(r())})),n(document).on("click",".btn",(function(){let e=n(this).attr("a");var t;"="===e?o(r()):"Clear"===e?n(".expression").val(""):(t=e,n(".expression").val(r()+t))}))}))}},o={};function n(r){var t=o[r];if(void 0!==t)return t.exports;var a=o[r]={exports:{}};return e[r].call(a.exports,a,a.exports,n),a.exports}n.m=e,r=[],n.O=(e,o,t,a)=>{if(!o){var s=1/0;for(c=0;c<r.length;c++){for(var[o,t,a]=r[c],l=!0,i=0;i<o.length;i++)(!1&a||s>=a)&&Object.keys(n.O).every((r=>n.O[r](o[i])))?o.splice(i--,1):(l=!1,a<s&&(s=a));if(l){r.splice(c--,1);var u=t();void 0!==u&&(e=u)}}return e}a=a||0;for(var c=r.length;c>0&&r[c-1][2]>a;c--)r[c]=r[c-1];r[c]=[o,t,a]},n.n=r=>{var e=r&&r.__esModule?()=>r.default:()=>r;return n.d(e,{a:e}),e},n.d=(r,e)=>{for(var o in e)n.o(e,o)&&!n.o(r,o)&&Object.defineProperty(r,o,{enumerable:!0,get:e[o]})},n.o=(r,e)=>Object.prototype.hasOwnProperty.call(r,e),(()=>{var r={179:0};n.O.j=e=>0===r[e];var e=(e,o)=>{var t,a,[s,l,i]=o,u=0;if(s.some((e=>0!==r[e]))){for(t in l)n.o(l,t)&&(n.m[t]=l[t]);if(i)var c=i(n)}for(e&&e(o);u<s.length;u++)a=s[u],n.o(r,a)&&r[a]&&r[a][0](),r[s[u]]=0;return n.O(c)},o=self.webpackChunkhomework=self.webpackChunkhomework||[];o.forEach(e.bind(null,0)),o.push=e.bind(null,o.push.bind(o))})();var t=n.O(void 0,[755],(()=>n(75)));t=n.O(t)})();
//# sourceMappingURL=main.a86778da46434d33924b.js.map