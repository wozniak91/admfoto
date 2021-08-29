(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/babel-loader/lib??ref--5-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'OrderConfirmation',
  data: function data() {
    return {
      order: false,
      error: false
    };
  },
  created: function created() {
    this.getOrder();
  },
  methods: {
    getOrder: function getOrder() {
      var _this = this;

      axios.get("/api/order/".concat(this.$route.params.token)).then(function (resp) {
        _this.order = resp.data;
      }).catch(function (err) {
        _this.error = err.response.data.errors;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=template&id=7e883006&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=template&id=7e883006& ***!
  \***********************************************************************************************************************************************************************************************************************************/
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
  return _c("section", { staticClass: "section confirmation" }, [
    _vm.order
      ? _c("div", { staticClass: "container mb-5" }, [
          _c("h1", { staticClass: "heading" }, [
            _c("span", { staticClass: "heading-text" }, [
              _vm._v("Zamówienie nr: # " + _vm._s(_vm.order.id))
            ])
          ]),
          _vm._v(" "),
          _c("p", { staticClass: "lead text-center" }, [
            _vm._v(
              "\n\t\t\tDziękujemy! Twoje zamówienie zostało złożone. Wkrótce otrzymasz mailową informację o aktualnym statusie zlecenia.\n\t\t"
            )
          ]),
          _vm._v(" "),
          _vm.order.payment_id == 2
            ? _c("div", [
                _c("p", { staticClass: "lead text-center" }, [
                  _vm._v("\n\t\t\t\tDane do przelewu:\n\t\t\t")
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "lead text-center" }, [
                  _vm._v("Sklep i Zakład Fotograficzny Michał Adamski")
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "lead text-center" }, [
                  _vm._v("ul. Poniatowskiego 22")
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "lead text-center" }, [
                  _vm._v("63-600 - Kępno")
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "lead text-center" }, [
                  _vm._v("Numer rachunku: 13 1020 2241 0000 2502 0033 8434")
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "lead text-center" }, [
                  _vm._v("Kwota: " + _vm._s(_vm.order.total_price / 100) + "zł")
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "lead text-center" }, [
                  _vm._v("Zapłata za zamówienie nr: # " + _vm._s(_vm.order.id))
                ])
              ])
            : _vm._e()
        ])
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Order/OrderConfirmationComponent.vue":
/*!**********************************************************************!*\
  !*** ./resources/js/components/Order/OrderConfirmationComponent.vue ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _OrderConfirmationComponent_vue_vue_type_template_id_7e883006___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OrderConfirmationComponent.vue?vue&type=template&id=7e883006& */ "./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=template&id=7e883006&");
/* harmony import */ var _OrderConfirmationComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OrderConfirmationComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _OrderConfirmationComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _OrderConfirmationComponent_vue_vue_type_template_id_7e883006___WEBPACK_IMPORTED_MODULE_0__["render"],
  _OrderConfirmationComponent_vue_vue_type_template_id_7e883006___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Order/OrderConfirmationComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_babel_loader_lib_index_js_ref_5_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderConfirmationComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/babel-loader/lib??ref--5-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./OrderConfirmationComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_babel_loader_lib_index_js_ref_5_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderConfirmationComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=template&id=7e883006&":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=template&id=7e883006& ***!
  \*****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderConfirmationComponent_vue_vue_type_template_id_7e883006___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./OrderConfirmationComponent.vue?vue&type=template&id=7e883006& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Order/OrderConfirmationComponent.vue?vue&type=template&id=7e883006&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderConfirmationComponent_vue_vue_type_template_id_7e883006___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderConfirmationComponent_vue_vue_type_template_id_7e883006___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);