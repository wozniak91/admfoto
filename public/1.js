(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Order/OrderComponent.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/babel-loader/lib??ref--5-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Order/OrderComponent.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) {
  try {
    var info = gen[key](arg);
    var value = info.value;
  } catch (error) {
    reject(error);
    return;
  }

  if (info.done) {
    resolve(value);
  } else {
    Promise.resolve(value).then(_next, _throw);
  }
}

function _asyncToGenerator(fn) {
  return function () {
    var self = this,
        args = arguments;
    return new Promise(function (resolve, reject) {
      var gen = fn.apply(self, args);

      function _next(value) {
        asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value);
      }

      function _throw(err) {
        asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err);
      }

      _next(undefined);
    });
  };
} //
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
  data: function data() {
    return {
      errors: false,
      isSending: false,
      selectImages: false,
      options: false,
      default_combination: false,
      combinations: false,
      imagesIds: 0,
      imageToLarge: false,
      attributes: [],
      fields: {
        images: [],
        firstname: '',
        lastname: '',
        email: '',
        phone_number: '',
        street: '',
        home_number: '',
        flat_number: '',
        postcode: '',
        city: '',
        newsletter: false,
        cgv: false,
        payment_id: 1
      },
      showToolbar: false,
      toolbarError: false
    };
  },
  metaInfo: function metaInfo() {
    return {
      titleTemplate: "%s | Zam\xF3w zdj\u0119cia"
    };
  },
  created: function created() {
    this.getOptions();
    this.getCombinations();
  },
  methods: {
    getOptions: function getOptions() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_1___default()('/api/options').then(function (resp) {
        return resp.data;
      }).then(function (resp) {
        _this.options = resp;
      });
    },
    getCombinations: function getCombinations() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_1___default()('/api/combinations').then(function (resp) {
        return resp.data;
      }).then(function (resp) {
        _this2.combinations = resp;
        _this2.default_combination = Object.assign({}, _this2.getDefaultCombination());
        _this2.attributes = Object.assign([], _this2.default_combination.attributes);
      });
    },
    getTotalPrice: function getTotalPrice() {
      var tax = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
      var totalPrice = 0;
      this.fields.images.map(function (image) {
        if (!image.error) totalPrice += tax ? image.price * image.qty : image.price * 0.77 * image.qty;
      });
      return totalPrice;
    },
    getImagesQty: function getImagesQty() {
      var totalQty = 0;
      this.fields.images.map(function (image) {
        totalQty += parseInt(image.qty);
      });
      return totalQty;
    },
    addImage: function addImage(e) {
      var _this3 = this;

      var files = e.target.files;
      Array.from(files).forEach(function (file) {
        if (file.size < 15000000) {
          _this3.errors = false;

          _this3.getImageRender(file);
        } else {
          _this3.errors = {
            image: ['Podane zdjęcie przekracza rozmiar 15Mb']
          };
        }
      });
    },
    getImageRender: function () {
      var _getImageRender = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(file) {
        var _this4 = this;

        var reader, image;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                reader = new FileReader();
                reader.readAsDataURL(file);
                image = {
                  id: this.imagesIds += 1,
                  dataImage: false,
                  selected: false,
                  id_combination: this.default_combination.id,
                  attributes: Object.assign([], this.default_combination.attributes),
                  price: this.default_combination.price,
                  qty: 1,
                  file: file,
                  name: false
                };
                this.imageUpload(image);

                reader.onloadend = function () {
                  image.dataImage = reader.result;

                  _this4.fields.images.push(image);

                  _this4.checkCombinations();
                };

              case 5:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function getImageRender(_x) {
        return _getImageRender.apply(this, arguments);
      }

      return getImageRender;
    }(),
    imageUpload: function () {
      var _imageUpload = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(image) {
        var _this5 = this;

        var formData;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                if (!image.name) {
                  formData = new FormData();
                  formData.append("image", image.file);
                  axios__WEBPACK_IMPORTED_MODULE_1___default.a.post("/api/order/image", formData).then(function (resp) {
                    image.name = resp.data;
                  }).catch(function (err) {
                    _this5.removeImage(image.id);

                    _this5.errors = err.response.data.errors;
                  });
                }

              case 1:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this);
      }));

      function imageUpload(_x2) {
        return _imageUpload.apply(this, arguments);
      }

      return imageUpload;
    }(),
    getImageIndexById: function getImageIndexById(id_image) {
      var id = false;
      this.fields.images.map(function (image, index) {
        if (image.id == id_image) {
          return id = index;
        }
      });
      return id;
    },
    removeImage: function removeImage(id_image) {
      this.fields.images = this.fields.images.filter(function (image) {
        return image.id != id_image;
      });
      this.checkCombinations();
    },
    duplicateImage: function duplicateImage(index) {
      var old_image = this.fields.images[index];
      var new_image = {
        id: this.imagesIds += 1,
        dataImage: old_image.dataImage,
        selected: old_image.selected,
        id_combination: old_image.id_combination,
        attributes: Object.assign([], old_image.attributes),
        price: old_image.price,
        qty: old_image.qty,
        file: old_image.file,
        name: old_image.name
      };
      this.fields.images.push(new_image);
    },
    selectImage: function selectImage(index) {
      var image = this.fields.images[index];
      image.selected = image.selected ? false : true;
    },
    toggleSelectImages: function toggleSelectImages() {
      var select = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
      if (!select) this.showToolbar = false;
      this.fields.images.map(function (image) {
        image.selected = select;
      });
      if (select) this.showToolbar = true;
    },
    duplicateSelectedImages: function duplicateSelectedImages() {
      var _this6 = this;

      this.fields.images.map(function (image, index) {
        return image.selected ? _this6.duplicateImage(index) : false;
      });
      this.checkCombinations();
    },
    removeSelectedImages: function removeSelectedImages() {
      var _this7 = this;

      this.fields.images.map(function (image) {
        return image.selected ? _this7.removeImage(image.id) : false;
      });
      this.checkCombinations();
    },
    changeCombination: function changeCombination(image) {
      var check_combinations = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
      var combination = this.findCombination(image.attributes);

      if (combination) {
        image.error = false;
        image.id_combination = combination.id;
        if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEqual"])(combination.attributes, image.attributes)) image.attributes = Object.assign([], combination.attributes);

        if (combination.price_rules) {
          var combinationQty = this.getImagesCountByIdCombination(image.id_combination);
          var rule = combination.price_rules.find(function (rule) {
            return rule.min_images_count <= combinationQty && rule.max_images_count >= combinationQty;
          });

          if (rule) {
            image.price = rule.price;
          } else {
            image.price = combination.price;
          }
        } else {
          image.price = combination.price;
        }
      } else {
        image.error = 'Wariant niedostępny';
      }

      if (check_combinations) this.checkCombinations();
    },
    checkCombinations: function checkCombinations() {
      var _this8 = this;

      this.fields.images.map(function (image) {
        Object(lodash__WEBPACK_IMPORTED_MODULE_2__["delay"])(function () {
          _this8.changeCombination(image, false);
        }, 0);
      });
    },
    findCombination: function findCombination(attributes) {
      var result = false;
      this.combinations.map(function (combination) {
        if (Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEqual"])(combination.attributes, attributes)) {
          result = Object.assign([], combination);
        }
      });
      return result;
    },
    getImagesCountByIdCombination: function getImagesCountByIdCombination(id_combination) {
      var combinationQty = 0;
      this.fields.images.map(function (image) {
        if (image.id_combination == id_combination) {
          combinationQty += parseInt(image.qty);
        }
      });
      return combinationQty;
    },
    displayPrice: function displayPrice(price) {
      var qty = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      var unit = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;
      return "".concat((qty ? price / 100 * qty : price / 100).toFixed(2)).concat(unit ? ' zł' : '');
    },
    setSelectedCombination: function setSelectedCombination() {
      var combination = this.findCombination(this.attributes);

      if (!combination) {
        this.toolbarError = "Wariant niedostępny. Wybierz inną opcję";
      }

      if (combination) {
        this.toolbarError = false;
        this.fields.images.map(function (image) {
          if (image.selected) {
            image.attributes = Object.assign([], combination.attributes);
          }
        });
        this.checkCombinations();
      }
    },
    getDefaultCombination: function getDefaultCombination() {
      var default_combination = false;
      this.combinations.map(function (combination) {
        if (combination.default) {
          default_combination = Object.assign({}, combination);
        }
      });
      return default_combination;
    },
    getDefaultAttributes: function getDefaultAttributes() {
      var default_combination = getDefaultCombination();
      return default_combination.attributes;
    },
    submitOrder: function submitOrder(e) {
      var _this9 = this;

      var formData = new FormData();
      formData.append('firstname', this.fields.firstname);
      formData.append('lastname', this.fields.lastname);
      formData.append('email', this.fields.email);
      formData.append('phone_number', this.fields.phone_number);
      formData.append('cgv', this.fields.cgv);
      formData.append('newsletter', this.fields.newsletter);
      formData.append('remember_token', token.content);
      formData.append('payment_id', this.fields.payment_id);
      formData.append('street', this.fields.street);
      formData.append('home_number', this.fields.home_number);
      formData.append('flat_number', this.fields.flat_number);
      formData.append('city', this.fields.city);
      formData.append('postcode', this.fields.postcode);
      this.fields.images.map(function (image, key) {
        // formData.append(`image[${key}]`, image.file);
        formData.append("image[".concat(key, "]"), image.name);
        formData.append("combination_id[".concat(key, "]"), parseInt(image.id_combination));
        formData.append("qty[".concat(key, "]"), parseInt(image.qty));
      });

      if (!this.isSending) {
        this.isSending = true;
        axios__WEBPACK_IMPORTED_MODULE_1___default.a.post("/api/order/new", formData).then(function (resp) {
          _this9.isSending = false;

          _this9.$router.push("/potwierdzenie/".concat(resp.data.token));
        }).catch(function (err) {
          console.log(err);
          _this9.isSending = false;

          if (err.response.status == 422) {
            _this9.errors = err.response.data.errors;
          }
        });
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Order/OrderComponent.vue?vue&type=template&id=f8a9518a&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Order/OrderComponent.vue?vue&type=template&id=f8a9518a& ***!
  \***********************************************************************************************************************************************************************************************************************/
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
  return _c("section", { staticClass: "section order" }, [
    _c("div", { staticClass: "container" }, [
      _vm._m(0),
      _vm._v(" "),
      _c(
        "form",
        {
          attrs: { method: "post", enctype: "multipart/form-data" },
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.submitOrder($event)
            }
          }
        },
        [
          _c(
            "fieldset",
            { staticClass: "images" },
            [
              _c("h3", { staticClass: "heading-small" }, [
                _vm._v(
                  "\n\t\t\t\t\t\t\t1. Wybierz zdjęcia, rozmiar oraz rodzaj papieru (" +
                    _vm._s(_vm.fields.images.length) +
                    ")\n\t\t\t\t\t\t"
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "image-select" }, [
                _c("span", { staticClass: "image-select__text" }, [
                  _vm._v("Przeciągnij i upuść zdjęcia")
                ]),
                _vm._v(" "),
                _c("input", {
                  staticClass: "form-images-control",
                  attrs: {
                    type: "file",
                    accept: "image/x-png,image/png,image/jpeg,image/jpg",
                    multiple: ""
                  },
                  on: { change: _vm.addImage }
                })
              ]),
              _vm._v(" "),
              _c("transition", { attrs: { name: "fade" } }, [
                _vm.errors.image
                  ? _c("aside", { staticClass: "alert alert-danger" }, [
                      _c(
                        "ul",
                        { staticClass: "m-0 pl-3" },
                        _vm._l(_vm.errors.image, function(error) {
                          return _c("li", {
                            domProps: { textContent: _vm._s(error) }
                          })
                        }),
                        0
                      )
                    ])
                  : _vm._e()
              ]),
              _vm._v(" "),
              _vm.options
                ? _c(
                    "transition-group",
                    {
                      staticClass: "images-group row",
                      attrs: { name: "image", tag: "div" }
                    },
                    _vm._l(_vm.fields.images, function(image, key) {
                      return _c(
                        "article",
                        {
                          key: image.id,
                          staticClass: "col-12 col-lg-3 col-md-4 mb-3 image"
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "image-container",
                              class: { selected: image.selected }
                            },
                            [
                              _c("transition", { attrs: { name: "fade" } }, [
                                !image.name
                                  ? _c("div", { staticClass: "image-loader" }, [
                                      _c(
                                        "svg",
                                        {
                                          staticClass: "lds-infinity",
                                          staticStyle: { background: "none" },
                                          attrs: {
                                            width: "100",
                                            height: "100",
                                            xmlns: "http://www.w3.org/2000/svg",
                                            viewBox: "0 0 100 100",
                                            preserveAspectRatio: "xMidYMid"
                                          }
                                        },
                                        [
                                          _c(
                                            "path",
                                            {
                                              attrs: {
                                                fill: "none",
                                                d:
                                                  "M24.3,30C11.4,30,5,43.3,5,50s6.4,20,19.3,20c19.3,0,32.1-40,51.4-40 C88.6,30,95,43.3,95,50s-6.4,20-19.3,20C56.4,70,43.6,30,24.3,30z",
                                                stroke: "#000000",
                                                "stroke-width": "2",
                                                "stroke-dasharray":
                                                  "2.5658892822265624 2.5658892822265624"
                                              }
                                            },
                                            [
                                              _c("animate", {
                                                attrs: {
                                                  attributeName:
                                                    "stroke-dashoffset",
                                                  calcMode: "linear",
                                                  values:
                                                    "0;256.58892822265625",
                                                  keyTimes: "0;1",
                                                  dur: "6.7",
                                                  begin: "0s",
                                                  repeatCount: "indefinite"
                                                }
                                              })
                                            ]
                                          )
                                        ]
                                      )
                                    ])
                                  : _vm._e()
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "image-actions",
                                  attrs: { role: "group" }
                                },
                                [
                                  _c(
                                    "a",
                                    {
                                      staticClass:
                                        "btn btn-light btn-sm image-btn",
                                      attrs: { title: "Duplikuj" },
                                      on: {
                                        click: function($event) {
                                          $event.preventDefault()
                                          _vm.duplicateImage(key)
                                        }
                                      }
                                    },
                                    [_c("i", { staticClass: "icon-docs" })]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "a",
                                    {
                                      staticClass:
                                        "btn btn-light btn-sm image-btn",
                                      attrs: { title: "Usuń" },
                                      on: {
                                        click: function($event) {
                                          $event.preventDefault()
                                          _vm.removeImage(image.id)
                                        }
                                      }
                                    },
                                    [
                                      _c("i", {
                                        staticClass: "icon-trash-empty"
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "a",
                                    {
                                      staticClass:
                                        "btn btn-light btn-sm image-btn",
                                      attrs: { title: "Zaznacz" },
                                      on: {
                                        click: function($event) {
                                          $event.preventDefault()
                                          _vm.selectImage(key)
                                        }
                                      }
                                    },
                                    [_c("i", { staticClass: "icon-select" })]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("figure", { staticClass: "image-content" }, [
                                _c("img", {
                                  staticClass: "img-fluid image-source",
                                  attrs: {
                                    src: image.dataImage,
                                    width: "128",
                                    height: "128"
                                  }
                                })
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "image-actions text-left py-2",
                                  attrs: { role: "group" }
                                },
                                [
                                  _vm._l(_vm.options, function(option, k) {
                                    return _c(
                                      "div",
                                      {
                                        key: option.id,
                                        staticClass:
                                          "form-group image-group px-2"
                                      },
                                      [
                                        _c("label", {
                                          staticClass: "label-sm",
                                          attrs: { for: option.name },
                                          domProps: {
                                            textContent: _vm._s(option.name)
                                          }
                                        }),
                                        _vm._v(" "),
                                        _c(
                                          "select",
                                          {
                                            directives: [
                                              {
                                                name: "model",
                                                rawName: "v-model.lazy",
                                                value: image.attributes[k],
                                                expression:
                                                  "image.attributes[k]",
                                                modifiers: { lazy: true }
                                              }
                                            ],
                                            staticClass:
                                              "form-control form-control-sm",
                                            attrs: { name: option.name },
                                            on: {
                                              change: [
                                                function($event) {
                                                  var $$selectedVal = Array.prototype.filter
                                                    .call(
                                                      $event.target.options,
                                                      function(o) {
                                                        return o.selected
                                                      }
                                                    )
                                                    .map(function(o) {
                                                      var val =
                                                        "_value" in o
                                                          ? o._value
                                                          : o.value
                                                      return val
                                                    })
                                                  _vm.$set(
                                                    image.attributes,
                                                    k,
                                                    $event.target.multiple
                                                      ? $$selectedVal
                                                      : $$selectedVal[0]
                                                  )
                                                },
                                                function($event) {
                                                  if (
                                                    !("button" in $event) &&
                                                    _vm._k(
                                                      $event.keyCode,
                                                      "prevet",
                                                      undefined,
                                                      $event.key,
                                                      undefined
                                                    )
                                                  ) {
                                                    return null
                                                  }
                                                  _vm.changeCombination(image)
                                                }
                                              ]
                                            }
                                          },
                                          _vm._l(option.attributes, function(
                                            attribute
                                          ) {
                                            return _c("option", {
                                              domProps: {
                                                value: attribute.id,
                                                textContent: _vm._s(
                                                  attribute.value
                                                )
                                              }
                                            })
                                          }),
                                          0
                                        )
                                      ]
                                    )
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "form-group image-group px-2"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass: "label-sm",
                                          attrs: { for: "qty" }
                                        },
                                        [_vm._v("Ilość")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: image.qty,
                                            expression: "image.qty"
                                          }
                                        ],
                                        staticClass:
                                          "form-control form-control-sm",
                                        attrs: {
                                          name: "qty",
                                          type: "number",
                                          step: "1",
                                          min: "1",
                                          value: "1"
                                        },
                                        domProps: { value: image.qty },
                                        on: {
                                          change: function($event) {
                                            if (
                                              !("button" in $event) &&
                                              _vm._k(
                                                $event.keyCode,
                                                "prevet",
                                                undefined,
                                                $event.key,
                                                undefined
                                              )
                                            ) {
                                              return null
                                            }
                                            _vm.changeCombination(image)
                                          },
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              image,
                                              "qty",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  )
                                ],
                                2
                              ),
                              _vm._v(" "),
                              !image.error
                                ? _c("p", { staticClass: "image-price" }, [
                                    _vm._v(
                                      _vm._s(
                                        _vm.displayPrice(image.price, image.qty)
                                      )
                                    )
                                  ])
                                : _vm._e(),
                              _vm._v(" "),
                              image.error
                                ? _c("p", {
                                    staticClass: "image-alert",
                                    domProps: {
                                      textContent: _vm._s(image.error)
                                    }
                                  })
                                : _vm._e()
                            ],
                            1
                          )
                        ]
                      )
                    }),
                    0
                  )
                : _vm._e(),
              _vm._v(" "),
              _c("transition", { attrs: { name: "fade" } }, [
                _vm.fields.images.length > 0
                  ? _c("nav", { staticClass: "image-toolbar" }, [
                      _c(
                        "div",
                        { staticClass: "row d-flex justify-content-center" },
                        [
                          _c("div", { staticClass: "col-md-3 col-6" }, [
                            _c(
                              "a",
                              {
                                staticClass: "btn btn-secondary btn-sm",
                                on: {
                                  click: function($event) {
                                    $event.preventDefault()
                                    _vm.toggleSelectImages()
                                  }
                                }
                              },
                              [_vm._v("Zaznacz wszystkie")]
                            )
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-3 col-6" }, [
                            _c(
                              "a",
                              {
                                staticClass: "btn btn-secondary btn-sm",
                                on: {
                                  click: function($event) {
                                    $event.preventDefault()
                                    _vm.toggleSelectImages(false)
                                  }
                                }
                              },
                              [_vm._v("Odznacz wszystkie")]
                            )
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-3 col-6" }, [
                            _c(
                              "a",
                              {
                                staticClass: "btn btn-secondary btn-sm",
                                on: {
                                  click: function($event) {
                                    $event.preventDefault()
                                    _vm.removeSelectedImages()
                                  }
                                }
                              },
                              [_vm._v("Usuń zaznaczone")]
                            )
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-3 col-6" }, [
                            _c(
                              "a",
                              {
                                staticClass: "btn btn-secondary btn-sm",
                                on: {
                                  click: function($event) {
                                    $event.preventDefault()
                                    _vm.duplicateSelectedImages()
                                  }
                                }
                              },
                              [_vm._v("Duplikuj zaznaczone")]
                            )
                          ])
                        ]
                      )
                    ])
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c("transition", { attrs: { name: "move" } }, [
                _vm.showToolbar
                  ? _c("nav", { staticClass: "toolbar" }, [
                      _c(
                        "div",
                        { staticClass: "container" },
                        [
                          _c(
                            "div",
                            { staticClass: "row align-items-center" },
                            [
                              _vm._l(_vm.options, function(option, k) {
                                return _c(
                                  "div",
                                  {
                                    key: option.id,
                                    staticClass: "col-12 col-md-3"
                                  },
                                  [
                                    _c("div", { staticClass: "form-group" }, [
                                      _c("label", {
                                        staticClass: "label-sm",
                                        attrs: { for: option.name },
                                        domProps: {
                                          textContent: _vm._s(option.name)
                                        }
                                      }),
                                      _vm._v(" "),
                                      _c(
                                        "select",
                                        {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.attributes[k],
                                              expression: "attributes[k]"
                                            }
                                          ],
                                          staticClass:
                                            "form-control form-control-sm",
                                          class: {
                                            "is-invalid": _vm.toolbarError
                                          },
                                          attrs: { name: option.name },
                                          on: {
                                            change: function($event) {
                                              var $$selectedVal = Array.prototype.filter
                                                .call(
                                                  $event.target.options,
                                                  function(o) {
                                                    return o.selected
                                                  }
                                                )
                                                .map(function(o) {
                                                  var val =
                                                    "_value" in o
                                                      ? o._value
                                                      : o.value
                                                  return val
                                                })
                                              _vm.$set(
                                                _vm.attributes,
                                                k,
                                                $event.target.multiple
                                                  ? $$selectedVal
                                                  : $$selectedVal[0]
                                              )
                                            }
                                          }
                                        },
                                        _vm._l(option.attributes, function(
                                          attribute
                                        ) {
                                          return _c("option", {
                                            domProps: {
                                              value: attribute.id,
                                              textContent: _vm._s(
                                                attribute.value
                                              )
                                            }
                                          })
                                        }),
                                        0
                                      )
                                    ])
                                  ]
                                )
                              }),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-12 col-md-3" }, [
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn btn-secondary",
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        _vm.setSelectedCombination()
                                      }
                                    }
                                  },
                                  [_vm._v("Zastosuj do zaznaczonych")]
                                )
                              ])
                            ],
                            2
                          ),
                          _vm._v(" "),
                          _c("transition", { attrs: { name: "fade" } }, [
                            _vm.toolbarError
                              ? _c("p", { staticClass: "lead image-alert" }, [
                                  _vm._v(_vm._s(_vm.toolbarError))
                                ])
                              : _vm._e()
                          ])
                        ],
                        1
                      )
                    ])
                  : _vm._e()
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c("section", { staticClass: "summary my-4" }, [
            _c("div", { staticClass: "row" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-6" }, [
                _c("div", { staticClass: "card" }, [
                  _c("div", { staticClass: "card-body" }, [
                    _c("h4", { staticClass: "card-title" }, [
                      _vm._v("Podsumowanie")
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "table-fluid" }, [
                      _c("table", { staticClass: "table table-hover" }, [
                        _c("tbody", [
                          _c("tr", [
                            _c("td", [_vm._v("Ilość zdjęć")]),
                            _vm._v(" "),
                            _c("td", [_vm._v(" " + _vm._s(_vm.getImagesQty()))])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("Cena (z VAT)")]),
                            _vm._v(" "),
                            _c("td", [
                              _vm._v(
                                _vm._s(_vm.displayPrice(_vm.getTotalPrice()))
                              )
                            ])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("Cena (bez VAT)")]),
                            _vm._v(" "),
                            _c("td", [
                              _vm._v(
                                _vm._s(
                                  _vm.displayPrice(_vm.getTotalPrice(false))
                                )
                              )
                            ])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("Do zapłaty")]),
                            _vm._v(" "),
                            _c("td", [
                              _vm._v(
                                _vm._s(_vm.displayPrice(_vm.getTotalPrice()))
                              )
                            ])
                          ])
                        ])
                      ])
                    ])
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("fieldset", { staticClass: "address mt-5" }, [
            _c("h3", { staticClass: "heading-small" }, [
              _vm._v(
                "\n\t\t\t\t\t\t\t2. Uzupłnij formularz adresowy\n\t\t\t\t\t\t"
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "form-group col-md-6 col-sm-12" },
                [
                  _c("label", { attrs: { for: "firstname" } }, [
                    _vm._v("Imię:")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.fields.firstname,
                        expression: "fields.firstname"
                      }
                    ],
                    staticClass: "form-control",
                    class: { "is-invalid": _vm.errors.firstname },
                    attrs: {
                      type: "text",
                      name: "firstname",
                      placeholder: "np. Jan",
                      required: ""
                    },
                    domProps: { value: _vm.fields.firstname },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.fields, "firstname", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "transition",
                    { attrs: { name: "fade" } },
                    _vm._l(_vm.errors.firstname, function(error) {
                      return _c(
                        "div",
                        { staticClass: "invalid-feedback d-block" },
                        [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t\t\t" +
                              _vm._s(error) +
                              "\n\t\t\t\t\t\t\t\t\t"
                          )
                        ]
                      )
                    }),
                    0
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "form-group col-md-6 col-sm-12" },
                [
                  _c("label", { attrs: { for: "lastname" } }, [
                    _vm._v("Nazwisko:")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.fields.lastname,
                        expression: "fields.lastname"
                      }
                    ],
                    staticClass: "form-control",
                    class: { "is-invalid": _vm.errors.lastname },
                    attrs: {
                      type: "text",
                      name: "lastname",
                      placeholder: "np. Kowalski",
                      required: ""
                    },
                    domProps: { value: _vm.fields.lastname },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.fields, "lastname", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "transition",
                    { attrs: { name: "fade" } },
                    _vm._l(_vm.errors.lastname, function(error) {
                      return _c(
                        "div",
                        { staticClass: "invalid-feedback d-block" },
                        [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t\t\t" +
                              _vm._s(error) +
                              "\n\t\t\t\t\t\t\t\t\t"
                          )
                        ]
                      )
                    }),
                    0
                  )
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "form-group col-md-6 col-sm-12" },
                [
                  _c("label", { attrs: { for: "email" } }, [_vm._v("Email:")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.fields.email,
                        expression: "fields.email"
                      }
                    ],
                    staticClass: "form-control",
                    class: { "is-invalid": _vm.errors.email },
                    attrs: {
                      type: "email",
                      name: "email",
                      placeholder: "np. jan.kowalski@gmail.com",
                      required: ""
                    },
                    domProps: { value: _vm.fields.email },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.fields, "email", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "transition",
                    { attrs: { name: "fade" } },
                    _vm._l(_vm.errors.email, function(error) {
                      return _c(
                        "div",
                        { staticClass: "invalid-feedback d-block" },
                        [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t\t\t" +
                              _vm._s(error) +
                              "\n\t\t\t\t\t\t\t\t\t"
                          )
                        ]
                      )
                    }),
                    0
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "form-group col-md-6 col-sm-12" },
                [
                  _c("label", { attrs: { for: "phone_number" } }, [
                    _vm._v("Numer telefonu:")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.fields.phone_number,
                        expression: "fields.phone_number"
                      }
                    ],
                    staticClass: "form-control",
                    class: { "is-invalid": _vm.errors.phone_number },
                    attrs: {
                      type: "tel",
                      name: "phone_number",
                      placeholder: "np. 77 410 00 00",
                      required: ""
                    },
                    domProps: { value: _vm.fields.phone_number },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(
                          _vm.fields,
                          "phone_number",
                          $event.target.value
                        )
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "transition",
                    { attrs: { name: "fade" } },
                    _vm._l(_vm.errors.phone_number, function(error) {
                      return _c(
                        "div",
                        { staticClass: "invalid-feedback d-block" },
                        [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t\t\t" +
                              _vm._s(error) +
                              "\n\t\t\t\t\t\t\t\t\t"
                          )
                        ]
                      )
                    }),
                    0
                  )
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "form-group col-md-6 col-sm-12" },
                [
                  _c("label", { attrs: { for: "email" } }, [_vm._v("Ulica:")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.fields.street,
                        expression: "fields.street"
                      }
                    ],
                    staticClass: "form-control",
                    class: { "is-invalid": _vm.errors.street },
                    attrs: {
                      type: "text",
                      name: "street",
                      placeholder: "np. ul. Jana Pawła 3",
                      required: ""
                    },
                    domProps: { value: _vm.fields.street },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.fields, "street", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "transition",
                    { attrs: { name: "fade" } },
                    _vm._l(_vm.errors.street, function(error) {
                      return _c(
                        "div",
                        { staticClass: "invalid-feedback d-block" },
                        [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t\t\t" +
                              _vm._s(error) +
                              "\n\t\t\t\t\t\t\t\t\t"
                          )
                        ]
                      )
                    }),
                    0
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c("div", { staticClass: "form-group col-md-6 col-sm-12" }, [
                _c("div", { staticClass: "row" }, [
                  _c(
                    "div",
                    { staticClass: "form-group col-md-6 col-sm-12" },
                    [
                      _c("label", { attrs: { for: "home_number" } }, [
                        _vm._v("Numer domu:")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.fields.home_number,
                            expression: "fields.home_number"
                          }
                        ],
                        staticClass: "form-control",
                        class: { "is-invalid": _vm.errors.home_number },
                        attrs: {
                          type: "text",
                          name: "home_number",
                          placeholder: "np. 7b",
                          required: ""
                        },
                        domProps: { value: _vm.fields.home_number },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.fields,
                              "home_number",
                              $event.target.value
                            )
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c(
                        "transition",
                        { attrs: { name: "fade" } },
                        _vm._l(_vm.errors.home_number, function(error) {
                          return _c(
                            "div",
                            { staticClass: "invalid-feedback d-block" },
                            [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t\t\t\t\t" +
                                  _vm._s(error) +
                                  "\n\t\t\t\t\t\t\t\t\t\t\t"
                              )
                            ]
                          )
                        }),
                        0
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "form-group col-md-6 col-sm-12" },
                    [
                      _c("label", { attrs: { for: "flat_number" } }, [
                        _vm._v("Numer mieszkania:")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.fields.flat_number,
                            expression: "fields.flat_number"
                          }
                        ],
                        staticClass: "form-control",
                        class: { "is-invalid": _vm.errors.flat_number },
                        attrs: {
                          type: "number",
                          name: "flat_number",
                          placeholder: "np. 7"
                        },
                        domProps: { value: _vm.fields.flat_number },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.fields,
                              "flat_number",
                              $event.target.value
                            )
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c(
                        "transition",
                        { attrs: { name: "fade" } },
                        _vm._l(_vm.errors.flat_number, function(error) {
                          return _c(
                            "div",
                            { staticClass: "invalid-feedback d-block" },
                            [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t\t\t\t\t" +
                                  _vm._s(error) +
                                  "\n\t\t\t\t\t\t\t\t\t\t\t"
                              )
                            ]
                          )
                        }),
                        0
                      )
                    ],
                    1
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "form-group col-md-6 col-sm-12" },
                [
                  _c("label", { attrs: { for: "postcode" } }, [
                    _vm._v("Kod pocztowy:")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.fields.postcode,
                        expression: "fields.postcode"
                      }
                    ],
                    staticClass: "form-control",
                    class: { "is-invalid": _vm.errors.postcode },
                    attrs: {
                      type: "text",
                      name: "postcode",
                      placeholder: "np. 55-219",
                      required: ""
                    },
                    domProps: { value: _vm.fields.postcode },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.fields, "postcode", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "transition",
                    { attrs: { name: "fade" } },
                    _vm._l(_vm.errors.postcode, function(error) {
                      return _c(
                        "div",
                        { staticClass: "invalid-feedback d-block" },
                        [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t\t" +
                              _vm._s(error) +
                              "\n\t\t\t\t\t\t\t\t"
                          )
                        ]
                      )
                    }),
                    0
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "form-group col-md-6 col-sm-12" },
                [
                  _c("label", { attrs: { for: "city" } }, [_vm._v("Miasto:")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.fields.city,
                        expression: "fields.city"
                      }
                    ],
                    staticClass: "form-control",
                    class: { "is-invalid": _vm.errors.city },
                    attrs: {
                      type: "text",
                      name: "city",
                      placeholder: "np. Warszawa",
                      required: ""
                    },
                    domProps: { value: _vm.fields.city },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.fields, "city", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "transition",
                    { attrs: { name: "fade" } },
                    _vm._l(_vm.errors.city, function(error) {
                      return _c(
                        "div",
                        { staticClass: "invalid-feedback d-block" },
                        [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t\t" +
                              _vm._s(error) +
                              "\n\t\t\t\t\t\t\t\t"
                          )
                        ]
                      )
                    }),
                    0
                  )
                ],
                1
              )
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "form-group mt-3 d-flex align-items-center" },
            [
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.fields.cgv,
                    expression: "fields.cgv"
                  }
                ],
                staticClass: "form-control-checkbox",
                attrs: { type: "checkbox", name: "cgv", id: "cgv" },
                domProps: {
                  checked: Array.isArray(_vm.fields.cgv)
                    ? _vm._i(_vm.fields.cgv, null) > -1
                    : _vm.fields.cgv
                },
                on: {
                  change: function($event) {
                    var $$a = _vm.fields.cgv,
                      $$el = $event.target,
                      $$c = $$el.checked ? true : false
                    if (Array.isArray($$a)) {
                      var $$v = null,
                        $$i = _vm._i($$a, $$v)
                      if ($$el.checked) {
                        $$i < 0 &&
                          _vm.$set(_vm.fields, "cgv", $$a.concat([$$v]))
                      } else {
                        $$i > -1 &&
                          _vm.$set(
                            _vm.fields,
                            "cgv",
                            $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                          )
                      }
                    } else {
                      _vm.$set(_vm.fields, "cgv", $$c)
                    }
                  }
                }
              }),
              _vm._v(" "),
              _c("span", {
                staticClass: "form-checkbox",
                class: { "checkbox-error": _vm.errors.cgv }
              }),
              _vm._v(" "),
              _c(
                "label",
                {
                  class: { "checkbox-error": _vm.errors.cgv },
                  attrs: { for: "cgv" }
                },
                [_vm._v("Akceptuje regulamin oraz warunki korzystania z usług")]
              )
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "form-group d-flex align-items-center" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.fields.newsletter,
                  expression: "fields.newsletter"
                }
              ],
              staticClass: "form-control-checkbox",
              attrs: { type: "checkbox", name: "newsletter", id: "newsletter" },
              domProps: {
                checked: Array.isArray(_vm.fields.newsletter)
                  ? _vm._i(_vm.fields.newsletter, null) > -1
                  : _vm.fields.newsletter
              },
              on: {
                change: function($event) {
                  var $$a = _vm.fields.newsletter,
                    $$el = $event.target,
                    $$c = $$el.checked ? true : false
                  if (Array.isArray($$a)) {
                    var $$v = null,
                      $$i = _vm._i($$a, $$v)
                    if ($$el.checked) {
                      $$i < 0 &&
                        _vm.$set(_vm.fields, "newsletter", $$a.concat([$$v]))
                    } else {
                      $$i > -1 &&
                        _vm.$set(
                          _vm.fields,
                          "newsletter",
                          $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                        )
                    }
                  } else {
                    _vm.$set(_vm.fields, "newsletter", $$c)
                  }
                }
              }
            }),
            _vm._v(" "),
            _c("span", { staticClass: "form-checkbox" }),
            _vm._v(" "),
            _c("label", { attrs: { for: "newsletter" } }, [
              _vm._v("Zapisz mnie do subskrybcji newslettera")
            ])
          ]),
          _vm._v(" "),
          _c(
            "fieldset",
            { staticClass: "payments mt-5" },
            [
              _c("h3", { staticClass: "heading-small" }, [
                _vm._v(
                  "\n\t\t\t\t\t\t\t3. Wybierz metodę płatności\n\t\t\t\t\t\t"
                )
              ]),
              _vm._v(" "),
              _c("transition", { attrs: { name: "fade" } }, [
                _vm.displayPrice(_vm.getTotalPrice(), false, false) <= 1000
                  ? _c(
                      "div",
                      { staticClass: "form-group d-flex align-items-center" },
                      [
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.fields.payment_id,
                              expression: "fields.payment_id"
                            }
                          ],
                          staticClass: "form-control-radio",
                          attrs: {
                            type: "radio",
                            name: "payment",
                            id: "payment_1"
                          },
                          domProps: {
                            value: 1,
                            checked: _vm._q(_vm.fields.payment_id, 1)
                          },
                          on: {
                            change: function($event) {
                              _vm.$set(_vm.fields, "payment_id", 1)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("span", { staticClass: "form-radio" }),
                        _vm._v(" "),
                        _c("label", { attrs: { for: "payment_1" } }, [
                          _vm._v("W punkcie sprzedaży")
                        ])
                      ]
                    )
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "form-group d-flex align-items-center" },
                [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.fields.payment_id,
                        expression: "fields.payment_id"
                      }
                    ],
                    staticClass: "form-control-radio",
                    attrs: { type: "radio", name: "payment", id: "payment_2" },
                    domProps: {
                      value: 2,
                      checked: _vm._q(_vm.fields.payment_id, 2)
                    },
                    on: {
                      change: function($event) {
                        _vm.$set(_vm.fields, "payment_id", 2)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c("span", { staticClass: "form-radio" }),
                  _vm._v(" "),
                  _c("label", { attrs: { for: "payment_2" } }, [
                    _vm._v("Przedpłata na konto")
                  ])
                ]
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "d-flex justify-content-end mb-5 mt-3" },
            [
              _c("transition", { attrs: { name: "fade" } }, [
                _vm.isSending
                  ? _c(
                      "svg",
                      {
                        staticClass: "lds-rolling mr-2",
                        attrs: {
                          width: "50px",
                          height: "50px",
                          xmlns: "http://www.w3.org/2000/svg",
                          viewBox: "0 0 100 100",
                          preserveAspectRatio: "xMidYMid"
                        }
                      },
                      [
                        _c(
                          "circle",
                          {
                            attrs: {
                              cx: "50",
                              cy: "50",
                              fill: "none",
                              stroke: "#000",
                              "stroke-width": "4",
                              r: "35",
                              "stroke-dasharray":
                                "164.93361431346415 56.97787143782138",
                              transform: "rotate(41.7316 50 50)"
                            }
                          },
                          [
                            _c("animateTransform", {
                              attrs: {
                                attributeName: "transform",
                                type: "rotate",
                                calcMode: "linear",
                                values: "0 50 50;360 50 50",
                                keyTimes: "0;1",
                                dur: "1s",
                                begin: "0s",
                                repeatCount: "indefinite"
                              }
                            })
                          ],
                          1
                        )
                      ]
                    )
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-primary btn-lg",
                  class: { sending: _vm.isSending },
                  attrs: { type: "submit", disabled: _vm.isSending }
                },
                [_vm._v("\n\t\t\t\t\t\t\tZłóż zamówienie\n\t\t\t\t\t\t")]
              )
            ],
            1
          )
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("h1", { staticClass: "heading" }, [
      _c("span", { staticClass: "heading-text" }, [_vm._v("Zamów zdjęcia")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-6" }, [
      _c("h3", [_vm._v("Kadrowanie")]),
      _vm._v(" "),
      _c("p", { staticClass: "lead" }, [
        _c("sup", [_vm._v("*")]),
        _vm._v(
          "Bez ramki - jeśli proporcje Twojego zdjęcia są inne niż proporcje odbitki, część obrazu zostanie przycięta."
        )
      ]),
      _vm._v(" "),
      _c("p", { staticClass: "lead" }, [
        _c("sup", [_vm._v("*")]),
        _vm._v(
          "Z ramką - Twoje zdjęcie zostanie skadrowane jak w opcji Bez ramki, przy czym wokół zostanie dodane białe obramowanie o szerokości ok. 4 mm."
        )
      ]),
      _vm._v(" "),
      _c("p", { staticClass: "lead" }, [
        _c("sup", [_vm._v("*")]),
        _vm._v(
          "Pełny kadr - jeśli proporcje Twojego zdjęcia są inne niż proporcje odbitki, z dwóch stron pojawią się białe paski."
        )
      ]),
      _vm._v(" "),
      _c("h3", [_vm._v("Rodzaje papieru")]),
      _vm._v(" "),
      _c("p", { staticClass: "lead" }, [
        _c("sup", [_vm._v("*")]),
        _vm._v(
          "Matowy -  papier matowy charakteryzuje się chropowatą, nieregularną strukturą, która idealnie niweluje odbicia światła. Papier matowy jest odporny na zarysowania i nie pozostają na nim odciski palców. Gramatura 215 g/m2."
        )
      ]),
      _vm._v(" "),
      _c("p", { staticClass: "lead" }, [
        _c("sup", [_vm._v("*")]),
        _vm._v(
          "Błyszczący - papier błyszczący wyróżnia charakterystyczna dla niego powierzchnia z połyskiem, która sprawia, że barwy zdjęcia wydają się żywe i czyste. Papier ten posiada nieznacznie większe maksymalne nasycenie barw i głębokość czerni. Gramatura 215 g/m2."
        )
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Order/OrderComponent.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/Order/OrderComponent.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _OrderComponent_vue_vue_type_template_id_f8a9518a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OrderComponent.vue?vue&type=template&id=f8a9518a& */ "./resources/js/components/Order/OrderComponent.vue?vue&type=template&id=f8a9518a&");
/* harmony import */ var _OrderComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OrderComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/Order/OrderComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _OrderComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _OrderComponent_vue_vue_type_template_id_f8a9518a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _OrderComponent_vue_vue_type_template_id_f8a9518a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Order/OrderComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Order/OrderComponent.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/Order/OrderComponent.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_babel_loader_lib_index_js_ref_5_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/babel-loader/lib??ref--5-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./OrderComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Order/OrderComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_babel_loader_lib_index_js_ref_5_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Order/OrderComponent.vue?vue&type=template&id=f8a9518a&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/Order/OrderComponent.vue?vue&type=template&id=f8a9518a& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderComponent_vue_vue_type_template_id_f8a9518a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./OrderComponent.vue?vue&type=template&id=f8a9518a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Order/OrderComponent.vue?vue&type=template&id=f8a9518a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderComponent_vue_vue_type_template_id_f8a9518a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderComponent_vue_vue_type_template_id_f8a9518a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);