(window.webpackJsonp=window.webpackJsonp||[]).push([[5],{68:function(t,e,a){"use strict";a.r(e);var n={name:"page",data:function(){return{page:null,error:null,loading:null,meta_title:!1,meta_description:!1}},metaInfo:function(){return{titleTemplate:"%s | ".concat(this.meta_title),meta:[{charset:"utf-8"},{name:"og:title",content:this.meta_title},{name:"description",content:this.meta_description},{name:"og:description",content:this.meta_description}]}},beforeRouteEnter:function(t,e,a){axios("/api/page/".concat(t.params.id)).then(function(t){return t.data}).then(function(t){a(function(e){e.page=t,e.meta_title=t.meta_title,e.meta_description=t.meta_description})})},beforeRouteUpdate:function(t,e,a){var n=this;this.page=null,axios("/api/page/".concat(t.params.id)).then(function(t){return t.data}).then(function(t){n.page=t,n.meta_title=t.meta_title,n.meta_description=t.meta_description,a()})}},i=a(1),s=Object(i.a)(n,function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("main",{staticClass:"section page"},[t.loading?a("div",{staticClass:"loading"},[t._v("Loading...")]):t._e(),t._v(" "),t.error?a("div",{staticClass:"error"},[t._v("\n    "+t._s(t.error)+"\n  ")]):t._e(),t._v(" "),a("transition",{attrs:{name:"fade",mode:"out-in"}},[t.page?a("div",{key:t.page.id,staticClass:"page-content"},[a("div",{staticClass:"container mb-5"},[a("h1",{staticClass:"heading"},[a("span",{staticClass:"heading-text",domProps:{textContent:t._s(t.page.title)}})]),t._v(" "),a("div",{staticClass:"text-center",domProps:{innerHTML:t._s(t.page.content)}})]),t._v(" "),1==t.page.id?a("div",{staticClass:"maps"}):t._e()]):t._e()])],1)},[],!1,null,null,null);e.default=s.exports}}]);