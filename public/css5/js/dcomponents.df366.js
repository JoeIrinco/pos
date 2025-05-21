(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[83],{

/***/ "/c0A":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IPreloader_vue_vue_type_style_index_0_id_dd35dc38_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("2Dj6");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IPreloader_vue_vue_type_style_index_0_id_dd35dc38_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IPreloader_vue_vue_type_style_index_0_id_dd35dc38_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IPreloader_vue_vue_type_style_index_0_id_dd35dc38_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "2Dj6":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("kVBm");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "MvM5":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IDropdown_vue_vue_type_style_index_0_id_5d570593_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("mqVK");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IDropdown_vue_vue_type_style_index_0_id_5d570593_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IDropdown_vue_vue_type_style_index_0_id_5d570593_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IDropdown_vue_vue_type_style_index_0_id_5d570593_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "dNr9":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IDropdown.vue?vue&type=template&id=5d570593&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "transition",
    {
      attrs: {
        "enter-active-class": "fast animated fadeInUp",
        "leave-active-class": "fast animated fadeOutDown"
      }
    },
    [
      _c(
        "ul",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.isOpen,
              expression: "isOpen"
            }
          ],
          ref: "dropdownContainer",
          staticClass: "i-dropdown dropdown-content",
          style: {
            left: _vm.coordinates.left,
            top: _vm.coordinates.top,
            right: _vm.coordinates.right,
            bottom: _vm.coordinates.bottom,
            position: _vm.position
          },
          attrs: { id: "i-dropdown-" + _vm._uid },
          on: { click: _vm.onDropdownClick }
        },
        [_vm._t("default")],
        2
      )
    ]
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/IDropdown.vue?vue&type=template&id=5d570593&scoped=true&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IDropdown.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
window.dropDowns = window.dropDowns || {};

function getPathFromEvent(e) {
  if (e.path) {
    return e.path;
  }

  if (e.composedPath) {
    return e.composedPath();
  }

  var el = e.target || e.srcElement;
  var path = [];

  while (el) {
    path.push(el);

    if (el.tagName === 'HTML') {
      path.push(document);
      path.push(window);
      return path;
    }

    el = el.parentElement;
  }
}

/* harmony default export */ var IDropdownvue_type_script_lang_js_ = ({
  name: 'IDropdown',
  props: {
    activator: String,
    position: {
      type: String,
      default: 'absolute'
    },
    closeOnSelect: {
      type: Boolean,
      default: true
    },
    // if set to true, you should call .open on ref element
    openManually: Boolean
  },
  data: function data() {
    return {
      trigger: null,
      isOpen: false,
      triggers: [],
      coordinates: {
        left: 'auto',
        top: 'auto',
        right: 'auto',
        bottom: 'auto'
      },
      containerFirstRelativeParent: null
    };
  },
  mounted: function mounted() {
    if (!this.openManually && this.activator) {
      this.triggers = document.querySelectorAll(this.activator) || [];

      for (var i = 0; i < this.triggers.length; i++) {
        this.triggers[i].addEventListener('click', this.open);
      }
    }

    window.dropDowns[this._uid] = this; // recursive olarak dön ve ilk relative parent'ı döndür

    var getFirstRelativeParentRecursive = element => {
      if (element) {
        var position = window.getComputedStyle(element);

        if (position.position === 'relative' || element.tagName === 'BODY') {
          return element;
        }

        return getFirstRelativeParentRecursive(element.parentElement);
      }
    };

    this.containerFirstRelativeParent = getFirstRelativeParentRecursive(this.container);
  },
  beforeDestroy: function beforeDestroy() {
    delete window.dropDowns[this._uid];
  },
  methods: {
    calculateOptionsWrapperPosition: function calculateOptionsWrapperPosition(e) {
      var elemCoordinates = this.trigger.getBoundingClientRect();
      var containerHeight = this.container.scrollHeight;
      var coordinates = {
        top: elemCoordinates.bottom + window.scrollY,
        right: 'auto',
        bottom: 'auto',
        left: elemCoordinates.left
      };

      if (this.position !== 'fixed') {
        var containerParent = this.containerFirstRelativeParent.getBoundingClientRect();
        coordinates.top -= containerParent.top + window.scrollY;
        coordinates.left -= containerParent.left;
      } // ekranın hangi yönüne doğru açılmak için daha fazla yer var


      if (elemCoordinates.bottom + containerHeight > window.innerHeight && elemCoordinates.bottom > window.innerHeight / 2) {
        // yukarı
        coordinates.top -= containerHeight + this.trigger.clientHeight; // ekrana sığacak mı?

        if (elemCoordinates.top - containerHeight < 0) {
          // BURADA SIKINTI VAR
          coordinates.top = elemCoordinates.top * -1;
          coordinates.bottom = elemCoordinates.top;
        }
      } else {
        // aşağı
        // ekrana sığacak mı?
        if (elemCoordinates.bottom + containerHeight > window.innerHeight) {
          coordinates.bottom = elemCoordinates.bottom + containerHeight - window.innerHeight;
        }
      }

      if (window.innerWidth < elemCoordinates.left + this.container.clientWidth + 50) {
        // with buffer
        coordinates.left = elemCoordinates.left - this.container.clientWidth + this.trigger.clientWidth;
      }

      if (this.position === 'fixed') {
        coordinates.top -= window.scrollY;
      }

      this.coordinates.top = coordinates.top === 'auto' ? '' : coordinates.top + 'px';
      this.coordinates.right = coordinates.right === 'auto' ? '' : coordinates.right + 'px';
      this.coordinates.bottom = coordinates.bottom === 'auto' ? '' : coordinates.bottom + 'px';
      this.coordinates.left = coordinates.left === 'auto' ? '' : coordinates.left + 'px';
    },
    getActivatorElement: function getActivatorElement(e) {
      var r = (parent, selector) => {
        var e = parent.querySelector(selector);

        if (e) {
          return e;
        }

        return r(parent.parentElement, selector);
      };

      return r(e.target || e.srcElement, this.activator);
    },
    onDropdownClick: function onDropdownClick(e) {
      if (this.closeOnSelect === false) {
        e.stopImmediatePropagation();
        e.stopPropagation();
        return;
      }

      this.close();
    },
    onBodyClick: function onBodyClick(e) {
      if (this.closeOnSelect === false) {
        var path = getPathFromEvent(e);

        for (var i = 0; i < path.length; i++) {
          if (path[i].getAttribute && path[i].getAttribute('id') === "i-dropdown-".concat(this._uid)) {
            return;
          }
        }
      }

      this.closeAll();
    },
    closeAll: function closeAll() {
      var closeAllButThis = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

      if (closeAllButThis === true) {
        for (var key in window.dropDowns) {
          if (this._uid !== window.dropDowns[key]._uid) {
            window.dropDowns[key].close();
          }
        }
      } else {
        for (var _key in window.dropDowns) {
          window.dropDowns[_key].close();
        }
      }
    },
    open: function open(e) {
      this.closeAll(true);
      this.$nextTick(() => {
        if (this.isOpen === true) {
          this.close(e);
          return;
        }

        if (e) {
          e.preventDefault();
          e.stopPropagation();
          e.stopImmediatePropagation();
        }

        document.body.addEventListener('click', this.onBodyClick, false);
        this.isOpen = true;
        this.$nextTick(() => {
          this.trigger = this.getActivatorElement(e);
          this.calculateOptionsWrapperPosition();
        });
      });
    },
    close: function close(e) {
      this.isOpen = false;
      document.body.removeEventListener('click', this.onBodyClick);
      this.$emit('input', false);
    }
  },
  computed: {
    container: function container() {
      return this.$refs.dropdownContainer;
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/IDropdown.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_IDropdownvue_type_script_lang_js_ = (IDropdownvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/IDropdown.vue?vue&type=style&index=0&id=5d570593&lang=scss&scoped=true&
var IDropdownvue_type_style_index_0_id_5d570593_lang_scss_scoped_true_ = __webpack_require__("MvM5");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/designcomponents/components/IDropdown.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_IDropdownvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "5d570593",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/designcomponents/components/IDropdown.vue"
/* harmony default export */ var IDropdown = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "f7F9":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "iWJo":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IPreloader.vue?vue&type=template&id=dd35dc38&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "i-preloader ispinner-wrapper",
      class: { center: _vm.center }
    },
    [_vm._m(0)]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "ispinner" }, [
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" }),
      _vm._v(" "),
      _c("div", { staticClass: "ispinner-blade" })
    ])
  }
]
render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/IPreloader.vue?vue&type=template&id=dd35dc38&scoped=true&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IPreloader.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ var IPreloadervue_type_script_lang_js_ = ({
  name: 'IPreloader',
  props: {
    center: Boolean
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/IPreloader.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_IPreloadervue_type_script_lang_js_ = (IPreloadervue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/IPreloader.vue?vue&type=style&index=0&id=dd35dc38&lang=scss&scoped=true&
var IPreloadervue_type_style_index_0_id_dd35dc38_lang_scss_scoped_true_ = __webpack_require__("/c0A");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/designcomponents/components/IPreloader.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_IPreloadervue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "dd35dc38",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/designcomponents/components/IPreloader.vue"
/* harmony default export */ var IPreloader = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "kVBm":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "l6Y6":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "mqVK":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("l6Y6");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "mwz+":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IPopup.vue?vue&type=template&id=042db61a&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "transition",
    {
      attrs: {
        "enter-active-class": "fast animated fadeInUp",
        "leave-active-class": "fast animated fadeOutDown"
      },
      on: {
        "after-leave": _vm.onAnimationEnd,
        "before-enter": _vm.onAnimationStart
      }
    },
    [
      _vm.isOpen
        ? _c(
            "div",
            _vm._g(
              {
                ref: "popup",
                staticClass: "popup",
                class: {
                  embedded: _vm.$root.isIframe,
                  fullscreen: _vm.fullscreen
                },
                on: {
                  mousedown: function($event) {
                    if ($event.target !== $event.currentTarget) {
                      return null
                    }
                    return _vm.close($event)
                  }
                }
              },
              _vm.$listeners
            ),
            [
              _c(
                "div",
                {
                  staticClass: "popup-content",
                  class: { "keyboard-open": _vm.$root.isMobileKeyboardOpen },
                  style: { top: _vm.popupScrollHeight + "px" }
                },
                [
                  _vm.closeButton
                    ? _c(
                        "span",
                        {
                          staticClass: "close-button cursor-p",
                          on: { click: _vm.close }
                        },
                        [_c("i-icon", { attrs: { icon: "times" } })],
                        1
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm._t("default")
                ],
                2
              )
            ]
          )
        : _vm._e()
    ]
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/IPopup.vue?vue&type=template&id=042db61a&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.starts-with.js
var es_string_starts_with = __webpack_require__("LKBx");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IPopup.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
var POPUP_BODY_CLASS_NAME = 'popup-opened';
/* harmony default export */ var IPopupvue_type_script_lang_js_ = ({
  name: 'IPopup',
  props: {
    fullscreen: Boolean,
    closeButton: Boolean,
    isOpen: {
      // TODO: this is due an error, remove event type here in future
      // error: product basket için popup açıldığı zaman varyant seçildiğinde console hatası veriyor
      // ve v-model olarak Event gidiyor. productbasket/input.vue
      type: Boolean,
      default: false
    },
    animationDurationMS: {
      type: Number,
      default: 300
    },
    containerStyle: String,
    closingDisallow: Boolean,
    hash: String
  },
  model: {
    prop: 'isOpen',
    event: 'toggle'
  },
  data: function data() {
    return {
      index: 0,
      popupParentNode: null,
      popupScrollHeight: 0
    };
  },
  created: function created() {
    if (this.$root.isIframe) {
      document.addEventListener('click', this.logKey);
    }

    if (this.isOpen === true) {
      this.index = ++window.openSidebarCount;
    }
  },
  mounted: function mounted() {
    this.checkHash();
  },
  beforeDestroy: function beforeDestroy() {
    this.close();
  },
  methods: {
    logKey: function logKey(e) {
      this.popupScrollHeight = e.clientY;
    },
    checkHash: function checkHash() {
      if (!this.hash) {
        return;
      }

      var hash = this.hash;

      if (!hash.startsWith('#')) {
        hash = "#".concat(hash);
      }

      if (hash === window.location.hash) {
        this.open();
      }
    },
    onAnimationEnd: function onAnimationEnd() {
      this.removeOverlay();
    },
    onAnimationStart: function onAnimationStart() {
      this.addOverlay();
    },
    addOverlay: function addOverlay() {
      if (this.fullscreen && this.$root.isMobile) {
        return;
      }

      this.$nextTick(() => {
        this.popupParentNode = this.$refs.popup.parentNode;

        if (!this.popupParentNode) {
          return;
        }

        var div = document.createElement('div');
        div.addEventListener('mousedown', () => {
          this.close();
        });
        div.className = 'popup-overlay';
        this.popupParentNode.appendChild(div);
      });
    },
    removeOverlay: function removeOverlay() {
      if (this.fullscreen && this.$root.isMobile || !this.popupParentNode) {
        return;
      }

      var overlay = this.popupParentNode.querySelector('.popup-overlay');

      if (overlay) {
        overlay.remove();
      }
    },
    onBodyKeyUp: function onBodyKeyUp(e) {
      if (e.keyCode === 27 && this.isOpen === true) {
        this.close();
      }
    },
    open: function open() {
      this.$emit('toggle', true);
    },
    close: function close() {
      if (!this.closingDisallow) {
        this.$emit('toggle', false);
      }
    },
    stateChange: function stateChange(e) {
      // browserdan back yaparsa
      if ((!e.state || !e.state.poped) && !this.closingDisallow) {
        this.$emit('toggle', false);
      }
    }
  },
  computed: {
    isHashOn: {
      get: function get() {
        return window.history.state && window.history.state.poped === true;
      },
      cache: false
    }
  },
  watch: {
    isOpen: function isOpen(to, from) {
      if (to === true && from === false) {
        // açılıyor
        window.history.pushState({
          'poped': true
        }, null, '');
        document.body.classList.add(POPUP_BODY_CLASS_NAME);
        document.body.addEventListener('keyup', this.onBodyKeyUp);
        this.index = ++this.$root.openPopupCount;
        this.$emit('opened');
        window.addEventListener('popstate', this.stateChange);
      } else if (from === true && to === false) {
        // kapanıyor
        window.removeEventListener('popstate', this.stateChange);
        document.body.classList.remove(POPUP_BODY_CLASS_NAME);
        document.body.removeEventListener('keyup', this.onBodyKeyUp);
        this.$root.openPopupCount--; // browserdan back yapmazsa biz elle yapacağız

        this.$nextTick(() => {
          if (this.isHashOn) {
            window.history.back();
          }
        });
        this.$emit('closed');
      }
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/IPopup.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_IPopupvue_type_script_lang_js_ = (IPopupvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/IPopup.vue?vue&type=style&index=0&id=042db61a&lang=scss&scoped=true&
var IPopupvue_type_style_index_0_id_042db61a_lang_scss_scoped_true_ = __webpack_require__("vF61");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/designcomponents/components/IPopup.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_IPopupvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "042db61a",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/designcomponents/components/IPopup.vue"
/* harmony default export */ var IPopup = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "pfag":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("f7F9");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "vF61":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IPopup_vue_vue_type_style_index_0_id_042db61a_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("pfag");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IPopup_vue_vue_type_style_index_0_id_042db61a_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IPopup_vue_vue_type_style_index_0_id_042db61a_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IPopup_vue_vue_type_style_index_0_id_042db61a_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ })

}]);