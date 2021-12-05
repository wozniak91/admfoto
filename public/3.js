(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PageComponent.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/babel-loader/lib??ref--5-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/PageComponent.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "page",
  data: function data() {
    return {
      page: null,
      error: null,
      loading: null,
      meta_title: false,
      meta_description: false
    };
  },
  metaInfo: function metaInfo() {
    var _this = this;

    return {
      titleTemplate: "%s | ".concat(_this.meta_title),
      meta: [{
        charset: 'utf-8'
      }, {
        name: 'og:title',
        content: _this.meta_title
      }, {
        name: 'description',
        content: _this.meta_description
      }, {
        name: 'og:description',
        content: _this.meta_description
      }]
    };
  },
  beforeRouteEnter: function beforeRouteEnter(to, from, next) {
    axios("/api/page/".concat(to.params.id)).then(function (resp) {
      return resp.data;
    }).then(function (resp) {
      next(function (vm) {
        vm.page = resp;
        vm.meta_title = resp.meta_title;
        vm.meta_description = resp.meta_description;
      });
    });
  },
  beforeRouteUpdate: function beforeRouteUpdate(to, from, next) {
    var _this2 = this;

    this.page = null;
    axios("/api/page/".concat(to.params.id)).then(function (resp) {
      return resp.data;
    }).then(function (resp) {
      _this2.page = resp;
      _this2.meta_title = resp.meta_title;
      _this2.meta_description = resp.meta_description;
      next();
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PageComponent.vue?vue&type=template&id=e743c05a&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/PageComponent.vue?vue&type=template&id=e743c05a& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "main",
    { staticClass: "section page" },
    [
      _vm.loading
        ? _c("div", { staticClass: "loading" }, [_vm._v("Loading...")])
        : _vm._e(),
      _vm._v(" "),
      _vm.error
        ? _c("div", { staticClass: "error" }, [
            _vm._v("\n    " + _vm._s(_vm.error) + "\n  ")
          ])
        : _vm._e(),
      _vm._v(" "),
      _c("transition", { attrs: { name: "fade", mode: "out-in" } }, [
        _vm.page
          ? _c("div", { key: _vm.page.id, staticClass: "page-content" }, [
              _c("div", { staticClass: "container mb-5" }, [
                _c("h1", { staticClass: "heading" }, [
                  _c("span", {
                    staticClass: "heading-text",
                    domProps: { textContent: _vm._s(_vm.page.title) }
                  })
                ]),
                _vm._v(" "),
                _c("div", {
                  staticClass: "text-center",
                  domProps: { innerHTML: _vm._s(_vm.page.content) }
                })
              ]),
              _vm._v(" "),
              _vm.page.id == 1 ? _c("div", { staticClass: "maps" }) : _vm._e()
            ])
          : _vm._e()
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/PageComponent.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/PageComponent.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PageComponent_vue_vue_type_template_id_e743c05a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PageComponent.vue?vue&type=template&id=e743c05a& */ "./resources/js/components/PageComponent.vue?vue&type=template&id=e743c05a&");
/* harmony import */ var _PageComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PageComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/PageComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PageComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PageComponent_vue_vue_type_template_id_e743c05a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PageComponent_vue_vue_type_template_id_e743c05a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/PageComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/PageComponent.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/PageComponent.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_babel_loader_lib_index_js_ref_5_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PageComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/babel-loader/lib??ref--5-0!../../../node_modules/vue-loader/lib??vue-loader-options!./PageComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PageComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_babel_loader_lib_index_js_ref_5_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PageComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/PageComponent.vue?vue&type=template&id=e743c05a&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/PageComponent.vue?vue&type=template&id=e743c05a& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PageComponent_vue_vue_type_template_id_e743c05a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./PageComponent.vue?vue&type=template&id=e743c05a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PageComponent.vue?vue&type=template&id=e743c05a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PageComponent_vue_vue_type_template_id_e743c05a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PageComponent_vue_vue_type_template_id_e743c05a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);