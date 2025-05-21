(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[112],{

/***/ "+7pe":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("ymrX");

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

/***/ "/V8r":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_ba743404_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("83dD");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_ba743404_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_ba743404_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_ba743404_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "/aSU":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("DGov");

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

/***/ "/zpt":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/components/Input.vue?vue&type=template&id=5654b24c&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "question-body",
      class: { full: _vm.questionModel.choice.subType === "picturechoice" }
    },
    [
      _c("componentinput" + _vm.questionModel.choice.subType, {
        ref: "component",
        tag: "component",
        attrs: {
          questionModel: _vm.questionModel,
          formModel: _vm.formModel,
          readonly: _vm.readonly
        },
        on: {
          onInput: _vm.onInput,
          onFocus: function($event) {
            return _vm.$emit("onFocus", _vm.questionModel)
          }
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/choice/components/Input.vue?vue&type=template&id=5654b24c&scoped=true&

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/dropdown/components/Input.vue?vue&type=template&id=65ae2282&
var Inputvue_type_template_id_65ae2282_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "input-choice",
      class: { "invalid-input-wrapper": !_vm.isValid }
    },
    [
      _c("i-select", {
        ref: "input",
        attrs: {
          items: _vm.options,
          clearable: "",
          value: _vm.otherAnswerValue ? "other" : "",
          contains: "",
          "empty-option": _vm.questionModel.choice.emptyOption,
          readonly: _vm.readonly,
          "option-text": "text",
          searchable: _vm.questionModel.choice.options.length > 5,
          "option-value": "_id"
        },
        on: {
          input: function($event) {
            return _vm.$emit("onInput", _vm.questionModel)
          },
          focus: function($event) {
            return _vm.$emit("onFocus", _vm.questionModel)
          },
          change: function($event) {
            return _vm.answerChange($event)
          }
        },
        model: {
          value: _vm.selectedAnswer,
          callback: function($$v) {
            _vm.selectedAnswer = $$v
          },
          expression: "selectedAnswer"
        }
      }),
      _vm._v(" "),
      _vm.selectedIsOther
        ? [
            _c(
              "div",
              { staticClass: "other-text-box" },
              [
                _c("i-text", {
                  attrs: { type: "text" },
                  on: { input: _vm.updateAnswer },
                  model: {
                    value: _vm.otherAnswerValue,
                    callback: function($$v) {
                      _vm.otherAnswerValue = $$v
                    },
                    expression: "otherAnswerValue"
                  }
                })
              ],
              1
            )
          ]
        : _vm._e(),
      _vm._v(" "),
      _c("i-question-validation", {
        attrs: {
          required: _vm.questionModel.isRequired,
          rules: _vm.formModel.validationRules[_vm.questionModel._id]
        },
        on: {
          validation: function($event) {
            _vm.isValid = $event
          }
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
    ],
    2
  )
}
var Inputvue_type_template_id_65ae2282_staticRenderFns = []
Inputvue_type_template_id_65ae2282_render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/dropdown/components/Input.vue?vue&type=template&id=65ae2282&

// EXTERNAL MODULE: ./src/helpers/jsHelpers.js + 1 modules
var jsHelpers = __webpack_require__("ttAG");

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/dropdown/index.js
var dropdown = __webpack_require__("aXTv");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/dropdown/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'dropdownInput',
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  data: function data() {
    return {
      options: [],
      errorMessages: [],
      isValid: true,
      otherAnswerValue: '',
      selectedIsOther: false,
      selectedAnswer: null
    };
  },
  created: function created() {
    if (!this.questionModel.choice.isShowEmptyoption) {
      this.questionModel.choice.emptyOption = null;
    }

    if (this.questionModel.answer) {
      return;
    }

    var defaultValue;

    if (this.questionModel.choice.defaultValue[0] === 'other') {
      defaultValue = this.questionModel.choice.defaultValue[0];
    } else {
      defaultValue = dropdown["a" /* default */].getDefaultAnswer(this.questionModel);
    }

    this.$set(this.questionModel, 'answer', defaultValue);
    this.questionModel.choice.options.forEach(option => {
      this.options.push({
        _id: option._id,
        text: option.text
      });
    });

    if (this.questionModel.choice.isOrder) {
      jsHelpers["default"].sortArrayOfObject(this.options, 'text');
    }

    if (this.questionModel.choice.other) {
      this.options.push({
        text: jsHelpers["default"].clearHtmlTags(this.$t('questionTypes.choice.other')),
        _id: 'other'
      });
    }

    this.selectedAnswer = this.questionModel.answer;

    if (this.questionModel.answer === 'other') {
      this.selectedIsOther = true;
    }
  },
  methods: {
    answerChange: function answerChange() {
      if (this.selectedAnswer === 'other') {
        this.selectedIsOther = true;
      } else {
        this.selectedIsOther = false;
      }

      this.questionModel.answer = this.selectedAnswer;
    },
    updateAnswer: function updateAnswer() {
      this.selectedIsOther = true;

      if (!this.otherAnswerValue) {
        return;
      }

      this.selectedAnswer = 'other';
      this.questionModel.answer = this.otherAnswerValue;
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/dropdown/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/dropdown/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  Inputvue_type_template_id_65ae2282_render,
  Inputvue_type_template_id_65ae2282_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/choice/subtypes/dropdown/components/Input.vue"
/* harmony default export */ var Input = (component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/multiplechoice/components/Input.vue?vue&type=template&id=33878abc&scoped=true&
var Inputvue_type_template_id_33878abc_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "div",
        {
          staticClass: "input-choice",
          class: { "invalid-input-wrapper": !_vm.isValid }
        },
        [
          _vm._l(_vm.questionModel.choice.options, function(option) {
            return _c("i-checkbox", {
              key: option._id,
              ref: option._id,
              refInFor: true,
              staticClass: "checkbox form-input-choice",
              attrs: {
                tabindex: "-1",
                label: option.text,
                value: option._id,
                disabled: _vm.disableds[option._id],
                required: _vm.questionModel.isRequired,
                readonly: _vm.readonly
              },
              on: {
                input: function($event) {
                  return _vm.$emit("onInput", _vm.questionModel)
                }
              },
              model: {
                value: _vm.questionModel.answer,
                callback: function($$v) {
                  _vm.$set(_vm.questionModel, "answer", $$v)
                },
                expression: "questionModel.answer"
              }
            })
          }),
          _vm._v(" "),
          _vm.questionModel.choice.other
            ? _c("i-checkbox", {
                staticClass: "checkbox form-input-choice",
                attrs: {
                  disabled: _vm.disableds["other"],
                  tabindex: "-1",
                  isHtmlLabel: "",
                  label: _vm.$t("questionTypes.choice.other"),
                  readonly: _vm.readonly
                },
                on: { click: _vm.changeOtherMultipleAnswerValue },
                model: {
                  value: _vm.otherMultipleAnswerValue,
                  callback: function($$v) {
                    _vm.otherMultipleAnswerValue = $$v
                  },
                  expression: "otherMultipleAnswerValue"
                }
              })
            : _vm._e()
        ],
        2
      ),
      _vm._v(" "),
      _vm.otherMultipleAnswerValue
        ? _c(
            "div",
            { staticClass: "other-text-box" },
            [
              _c("i-text", {
                attrs: { type: "text", value: _vm.otherAnswerValue },
                model: {
                  value: _vm.otherAnswerValue,
                  callback: function($$v) {
                    _vm.otherAnswerValue = $$v
                  },
                  expression: "otherAnswerValue"
                }
              })
            ],
            1
          )
        : _vm._e(),
      _vm._v(" "),
      _vm.checkValid
        ? _c("i-question-validation", {
            ref: "input",
            attrs: {
              rules: _vm.formModel.validationRules[_vm.questionModel._id]
            },
            on: {
              validation: function($event) {
                _vm.isValid = $event
              }
            },
            model: {
              value: _vm.questionModel.answer,
              callback: function($$v) {
                _vm.$set(_vm.questionModel, "answer", $$v)
              },
              expression: "questionModel.answer"
            }
          })
        : _vm._e()
    ],
    1
  )
}
var Inputvue_type_template_id_33878abc_scoped_true_staticRenderFns = []
Inputvue_type_template_id_33878abc_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/multiplechoice/components/Input.vue?vue&type=template&id=33878abc&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.splice.js
var es_array_splice = __webpack_require__("pDQq");

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/multiplechoice/index.js
var multiplechoice = __webpack_require__("R3Ei");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/multiplechoice/components/Input.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var multiplechoice_components_Inputvue_type_script_lang_js_ = ({
  name: 'multiplechoiceInput',
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },

  data() {
    return {
      isValid: true,
      otherMultipleAnswerValue: false,
      otherAnswerValue: '',
      checkValid: false
    };
  },

  methods: {
    changeOtherMultipleAnswerValue: function changeOtherMultipleAnswerValue() {
      if (!this.otherMultipleAnswerValue) {
        if (!this.otherAnswerValue) {
          this.setOtherAnswer('other');
        } else {
          this.setOtherAnswer(this.otherAnswerValue);
        }
      } else {
        this.setOtherAnswer();
      }
    },
    setOtherAnswer: function setOtherAnswer(otherAnswer) {
      if (this.questionModel.answer) {
        var otherAnswerIndex;

        for (var i = 0; i < this.questionModel.answer.length; i++) {
          var answer = this.questionModel.answer[i];
          var answerIndex = this.questionModel.choice.options.findIndex(x => x._id === answer);

          if (answerIndex === -1) {
            otherAnswerIndex = i;
          }
        }

        if (otherAnswerIndex === undefined && otherAnswer) {
          this.questionModel.answer.push(otherAnswer);
        } else {
          if (otherAnswer) {
            this.questionModel.answer[otherAnswerIndex] = otherAnswer;
          } else {
            this.questionModel.answer.splice(otherAnswerIndex, 1);
          }
        }
      } else if (otherAnswer) {
        this.questionModel.answer.push(otherAnswer);
      }
    } // beforeOnSubmit: function () {
    // 	this.isValid = !this.$refs.validationobject.valid;
    // }

  },
  mounted: function mounted() {
    this.checkValid = true;
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    if (this.questionModel.choice.isOrder) {
      jsHelpers["default"].sortArrayOfObject(this.questionModel.choice.options, 'text');
    }

    this.$set(this.questionModel, 'answer', multiplechoice["a" /* default */].getDefaultAnswer(this.questionModel));

    if (this.questionModel.choice.other && this.questionModel.answer) {
      for (var i = 0; i < this.questionModel.answer.length; i++) {
        var answer = this.questionModel.answer[i];

        if (this.questionModel.choice.options.findIndex(x => x._id === answer) === -1) {
          this.otherAnswerValue = answer !== 'other' ? answer : '';
          this.otherMultipleAnswerValue = true;
        }
      }
    }
  },
  computed: {
    disableds: function disableds() {
      var disableds = {};

      if (this.questionModel.choice.max && this.questionModel.answer.length >= this.questionModel.choice.max && this.questionModel.choice.max <= this.questionModel.choice.options.length) {
        this.questionModel.choice.options.map(x => {
          if (!this.questionModel.answer.find(id => id === x._id)) {
            disableds[x._id] = true;
          }
        });

        if (!this.questionModel.answer.find(x => x === 'other')) {
          disableds.other = true;
        }
      }

      return disableds;
    }
  },
  watch: {
    otherAnswerValue: function otherAnswerValue() {
      if (this.otherAnswerValue) {
        this.setOtherAnswer(this.otherAnswerValue);
      } else {
        this.setOtherAnswer('other');
      }
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/multiplechoice/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var subtypes_multiplechoice_components_Inputvue_type_script_lang_js_ = (multiplechoice_components_Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/multiplechoice/components/Input.vue?vue&type=style&index=0&id=33878abc&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_33878abc_lang_scss_scoped_true_ = __webpack_require__("DURk");

// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/multiplechoice/components/Input.vue






/* normalize component */

var Input_component = Object(componentNormalizer["a" /* default */])(
  subtypes_multiplechoice_components_Inputvue_type_script_lang_js_,
  Inputvue_type_template_id_33878abc_scoped_true_render,
  Inputvue_type_template_id_33878abc_scoped_true_staticRenderFns,
  false,
  null,
  "33878abc",
  null
  
)

/* hot reload */
if (false) { var Input_api; }
Input_component.options.__file = "src/questiontypes/choice/subtypes/multiplechoice/components/Input.vue"
/* harmony default export */ var components_Input = (Input_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/picturechoice/components/Input.vue?vue&type=template&id=30fac89e&scoped=true&
var Inputvue_type_template_id_30fac89e_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "picture-choice-layout" },
    [
      _c(
        "div",
        { staticClass: "picture-choice-wrapper" },
        [
          _vm._l(_vm.questionModel.choice.options, function(option, index) {
            return _c(
              _vm.questionModel.choice.multipleSelection
                ? "i-checkbox"
                : "i-radio",
              {
                key: option._id,
                tag: "component",
                staticClass: "picture-choice",
                attrs: {
                  readonly: _vm.readonly,
                  value: option._id,
                  disabled: _vm.disableds[option._id]
                },
                on: {
                  change: function($event) {
                    return _vm.$emit("onInput", _vm.questionModel)
                  }
                },
                scopedSlots: _vm._u(
                  [
                    {
                      key: "default",
                      fn: function(props) {
                        return [
                          _c("div", { staticClass: "photo" }, [
                            _c("img", {
                              directives: [
                                {
                                  name: "lazy",
                                  rawName: "v-lazy",
                                  value: _vm.getfileSrc(option.fileId),
                                  expression: "getfileSrc(option.fileId)"
                                }
                              ]
                            })
                          ]),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "input" },
                            [
                              _c("p", [_vm._v(_vm._s(option.text))]),
                              _vm._v(" "),
                              !props.isChecked
                                ? _c("span", { staticClass: "number" }, [
                                    _vm._v(_vm._s(index + 1))
                                  ])
                                : _c("i-icon", { attrs: { icon: "check" } })
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "i-button",
                            {
                              staticClass: "zoom",
                              attrs: { naked: "" },
                              on: {
                                click: function($event) {
                                  $event.preventDefault()
                                  $event.stopPropagation()
                                  return _vm.onZoomClick(index)
                                }
                              }
                            },
                            [_c("i-icon", { attrs: { icon: "search-plus" } })],
                            1
                          )
                        ]
                      }
                    }
                  ],
                  null,
                  true
                ),
                model: {
                  value: _vm.questionModel.answer,
                  callback: function($$v) {
                    _vm.$set(_vm.questionModel, "answer", $$v)
                  },
                  expression: "questionModel.answer"
                }
              }
            )
          }),
          _vm._v(" "),
          _c(
            "i-popup",
            {
              attrs: { "close-button": "" },
              model: {
                value: _vm.pictureSelectionPopup,
                callback: function($$v) {
                  _vm.pictureSelectionPopup = $$v
                },
                expression: "pictureSelectionPopup"
              }
            },
            [
              _c(
                "div",
                { staticClass: "picturechoice-big-picture" },
                [
                  _vm.questionModel.choice.options.length > 1
                    ? _c("i-icon", {
                        staticClass: "nav-arrow nav-left",
                        attrs: { icon: "chevron-left" },
                        on: {
                          click: function($event) {
                            _vm.bigImgIndex--
                          }
                        }
                      })
                    : _vm._e(),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      ref: "bigChoiceWrapper",
                      staticClass: "big-picture-wrapper",
                      class: { "big-img-checked": _vm.bigImageIsChecked }
                    },
                    [
                      _c("img", {
                        directives: [
                          {
                            name: "lazy",
                            rawName: "v-lazy",
                            value: _vm.currentImage,
                            expression: "currentImage"
                          }
                        ],
                        on: { click: _vm.onBigImageClick }
                      })
                    ]
                  ),
                  _vm._v(" "),
                  _vm.questionModel.choice.options.length > 1
                    ? _c("i-icon", {
                        staticClass: "nav-arrow nav-right",
                        attrs: { icon: "chevron-right" },
                        on: {
                          click: function($event) {
                            _vm.bigImgIndex++
                          }
                        }
                      })
                    : _vm._e(),
                  _vm._v(" "),
                  _c(
                    "ul",
                    { staticClass: "bullets" },
                    _vm._l(_vm.questionModel.choice.options.length, function(
                      i
                    ) {
                      return _c("li", {
                        key: i,
                        class: { selected: i === _vm.bigImgIndex + 1 },
                        on: {
                          click: function($event) {
                            return _vm.onZoomClick(i === 0 ? 0 : i - 1)
                          }
                        }
                      })
                    }),
                    0
                  )
                ],
                1
              )
            ]
          )
        ],
        2
      ),
      _vm._v(" "),
      _c("i-question-validation", {
        ref: "input",
        attrs: { rules: _vm.formModel.validationRules[_vm.questionModel._id] },
        on: {
          validation: function($event) {
            _vm.isValid = $event
          }
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
    ],
    1
  )
}
var Inputvue_type_template_id_30fac89e_scoped_true_staticRenderFns = []
Inputvue_type_template_id_30fac89e_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/picturechoice/components/Input.vue?vue&type=template&id=30fac89e&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.includes.js
var es_string_includes = __webpack_require__("JTJg");

// EXTERNAL MODULE: ./config/prod.js
var prod = __webpack_require__("NRfZ");

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/picturechoice/index.js
var picturechoice = __webpack_require__("dAjO");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/picturechoice/components/Input.vue?vue&type=script&lang=js&


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ var picturechoice_components_Inputvue_type_script_lang_js_ = ({
  name: 'picturechoiceInput',
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },

  data() {
    return {
      hasValidationError: false,
      baseUrl: prod["a" /* default */].fileApi,
      pictureSelectionPopup: false,
      bigImg: null,
      privateBigImgIndex: 0,
      isValid: true
    };
  },

  methods: {
    getfileSrc: function getfileSrc(fileId) {
      if (fileId && this.formModel.formTempFiles && this.formModel.formTempFiles[fileId]) {
        return this.baseUrl + '/tempfile/' + this.formModel._id + '/' + fileId;
      } else if (fileId) {
        return this.baseUrl + '/formfile/' + this.formModel._id + '/' + fileId;
      }

      return '/static/img/no-image.png';
    },
    onZoomClick: function onZoomClick(itemIndex) {
      if (this.readonly) {
        return;
      }

      this.bigImgIndex = itemIndex; // this.setBigImage(imageSrc, itemIndex);

      this.pictureSelectionPopup = true;
      this.$nextTick(() => {
        if ('ontouchstart' in window) {
          var slide = this.$refs.bigChoiceWrapper;

          var touchStart = evt => {
            var startX = evt.changedTouches[0].pageX;

            var touchEnd = evt => {
              var diffX = evt.changedTouches[0].pageX - startX;

              if (Math.abs(diffX) > 50) {
                diffX < 0 ? this.bigImgIndex++ : this.bigImgIndex--;
              }

              document.removeEventListener('touchend', touchEnd);
            };

            document.addEventListener('touchend', touchEnd);
          };

          slide.addEventListener('touchstart', touchStart);
        }
      });
    },
    onBigImageClick: function onBigImageClick() {
      var answer = this.questionModel.answer;

      if (this.questionModel.choice.multipleSelection) {
        var selectedOptionId = this.questionModel.choice.options[this.bigImgIndex]._id;

        if (selectedOptionId) {
          var selectedOptionIndex = answer.findIndex(a => a === selectedOptionId);

          if (selectedOptionIndex > -1) {
            answer.splice(selectedOptionIndex, 1);
          } else {
            answer.push(selectedOptionId);
          }
        }
      } else {
        answer = this.questionModel.choice.options[this.bigImgIndex]._id;
      }

      this.$set(this.questionModel, 'answer', answer);
    }
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    if (this.questionModel.choice.isOrder) {
      jsHelpers["default"].sortArrayOfObject(this.questionModel.choice.options, 'text');
    }

    this.$set(this.questionModel, 'answer', picturechoice["a" /* default */].getDefaultAnswer(this.questionModel));
  },
  computed: {
    bigImgIndex: {
      get: function get() {
        return this.privateBigImgIndex || 0;
      },
      set: function set(v) {
        if (this.privateBigImgIndex > v) {
          if (v >= 0) {
            this.privateBigImgIndex = v;
          } else {
            this.privateBigImgIndex = this.questionModel.choice.options.length - 1;
          }
        } else {
          if (v < this.questionModel.choice.options.length) {
            this.privateBigImgIndex = v;
          } else {
            this.privateBigImgIndex = 0;
          }
        }
      }
    },
    currentImage: function currentImage() {
      if (this.bigImageOption.fileId) {
        return this.baseUrl + '/formfile/' + this.formModel._id + '/' + this.bigImageOption.fileId;
      }

      return '/static/img/no-image.png';
    },
    bigImageIsChecked: function bigImageIsChecked() {
      if (this.questionModel.choice.options.length > 0) {
        if (this.questionModel.choice.multipleSelection) {
          return this.questionModel.answer.includes(this.bigImageOption._id);
        } else {
          return this.questionModel.answer === this.bigImageOption._id;
        }
      }
    },
    bigImageOption: function bigImageOption() {
      return this.questionModel.choice.options[this.bigImgIndex];
    },
    disableds: function disableds() {
      var disableds = {};

      if (this.questionModel.choice.multipleSelection && this.questionModel.choice.max && this.questionModel.answer.length >= this.questionModel.choice.max) {
        this.questionModel.choice.options.map(x => {
          if (!this.questionModel.answer.find(id => id === x._id)) {
            disableds[x._id] = true;
          }
        });
      }

      return disableds;
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/picturechoice/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var subtypes_picturechoice_components_Inputvue_type_script_lang_js_ = (picturechoice_components_Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/picturechoice/components/Input.vue?vue&type=style&index=0&id=30fac89e&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_30fac89e_lang_scss_scoped_true_ = __webpack_require__("3GD6");

// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/picturechoice/components/Input.vue






/* normalize component */

var components_Input_component = Object(componentNormalizer["a" /* default */])(
  subtypes_picturechoice_components_Inputvue_type_script_lang_js_,
  Inputvue_type_template_id_30fac89e_scoped_true_render,
  Inputvue_type_template_id_30fac89e_scoped_true_staticRenderFns,
  false,
  null,
  "30fac89e",
  null
  
)

/* hot reload */
if (false) { var components_Input_api; }
components_Input_component.options.__file = "src/questiontypes/choice/subtypes/picturechoice/components/Input.vue"
/* harmony default export */ var picturechoice_components_Input = (components_Input_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/rating/components/Input.vue?vue&type=template&id=c31fd194&
var Inputvue_type_template_id_c31fd194_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("IRating", {
    ref: "input",
    attrs: {
      icon: _vm.questionModel.choice.rateStyle,
      items: _vm.questionModel.choice.options,
      disabled: _vm.disabled,
      "option-text": "text",
      "option-value": "_id",
      rules: _vm.formModel.validationRules[_vm.questionModel._id],
      readonly: _vm.readonly
    },
    on: {
      input: function($event) {
        return _vm.$emit("onInput", _vm.questionModel)
      }
    },
    model: {
      value: _vm.questionModel.answer,
      callback: function($$v) {
        _vm.$set(_vm.questionModel, "answer", $$v)
      },
      expression: "questionModel.answer"
    }
  })
}
var Inputvue_type_template_id_c31fd194_staticRenderFns = []
Inputvue_type_template_id_c31fd194_render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/rating/components/Input.vue?vue&type=template&id=c31fd194&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.promise.js
var es_promise = __webpack_require__("5s+n");

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/rating/index.js
var rating = __webpack_require__("DoXk");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/rating/components/Input.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var rating_components_Inputvue_type_script_lang_js_ = ({
  name: 'ratingchoice',
  props: {
    questionModel: Object,
    formModel: Object,
    disabled: Boolean,
    readonly: Boolean
  },
  components: {
    IRating: () => __webpack_require__.e(/* import() | irating */ 149).then(__webpack_require__.bind(null, "mCRP"))
  },
  created: function created() {
    this.$set(this.questionModel, 'answer', rating["a" /* default */].getDefaultAnswer(this.questionModel));
  }
});
// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/rating/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var subtypes_rating_components_Inputvue_type_script_lang_js_ = (rating_components_Inputvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/rating/components/Input.vue





/* normalize component */

var rating_components_Input_component = Object(componentNormalizer["a" /* default */])(
  subtypes_rating_components_Inputvue_type_script_lang_js_,
  Inputvue_type_template_id_c31fd194_render,
  Inputvue_type_template_id_c31fd194_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var rating_components_Input_api; }
rating_components_Input_component.options.__file = "src/questiontypes/choice/subtypes/rating/components/Input.vue"
/* harmony default export */ var rating_components_Input = (rating_components_Input_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/singlechoice/components/Input.vue?vue&type=template&id=513a5c2a&scoped=true&
var Inputvue_type_template_id_513a5c2a_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "input-choice",
      class: { "invalid-input-wrapper": !_vm.isValid }
    },
    [
      _vm._l(_vm.questionModel.choice.options, function(option) {
        return _c("i-radio", {
          key: option._id,
          staticClass: "radio form-input-choice",
          attrs: {
            tabindex: "-1",
            uncheckable: "",
            label: option.text,
            value: option._id,
            readonly: _vm.readonly,
            required: _vm.questionModel.isRequired
          },
          on: {
            change: function($event) {
              return _vm.$emit("onInput", _vm.questionModel)
            }
          },
          model: {
            value: _vm.questionModel.answer,
            callback: function($$v) {
              _vm.$set(_vm.questionModel, "answer", $$v)
            },
            expression: "questionModel.answer"
          }
        })
      }),
      _vm._v(" "),
      _vm.questionModel.choice.other
        ? [
            _c("i-radio", {
              staticClass: "radio form-input-choice",
              attrs: {
                tabindex: "-1",
                uncheckable: "",
                isHtmlLabel: "",
                value: _vm.otherAnswer,
                readonly: _vm.readonly,
                label: _vm.$t("questionTypes.choice.other")
              },
              model: {
                value: _vm.questionModel.answer,
                callback: function($$v) {
                  _vm.$set(_vm.questionModel, "answer", $$v)
                },
                expression: "questionModel.answer"
              }
            }),
            _vm._v(" "),
            _vm.questionModel.answer === _vm.otherAnswer
              ? _c(
                  "div",
                  { staticClass: "other-text-box" },
                  [
                    _c("i-text", {
                      attrs: { type: "text", value: _vm.otherAnswerValue },
                      model: {
                        value: _vm.otherAnswerValue,
                        callback: function($$v) {
                          _vm.otherAnswerValue = $$v
                        },
                        expression: "otherAnswerValue"
                      }
                    })
                  ],
                  1
                )
              : _vm._e()
          ]
        : _vm._e(),
      _vm._v(" "),
      _c("i-question-validation", {
        ref: "input",
        attrs: {
          required: _vm.questionModel.isRequired,
          rules: _vm.formModel.validationRules[_vm.questionModel._id]
        },
        on: {
          validation: function($event) {
            _vm.isValid = $event
          }
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
    ],
    2
  )
}
var Inputvue_type_template_id_513a5c2a_scoped_true_staticRenderFns = []
Inputvue_type_template_id_513a5c2a_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/singlechoice/components/Input.vue?vue&type=template&id=513a5c2a&scoped=true&

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/singlechoice/index.js
var singlechoice = __webpack_require__("F/bx");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/singlechoice/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var singlechoice_components_Inputvue_type_script_lang_js_ = ({
  name: 'singlechoiceInput',
  data: function data() {
    return {
      isValid: true,
      otherAnswer: this.$t('questionTypes.choice.other'),
      otherAnswerValue: ''
    };
  },
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    if (this.questionModel.choice.isOrder) {
      jsHelpers["default"].sortArrayOfObject(this.questionModel.choice.options, 'text');
    }

    this.$set(this.questionModel, 'answer', singlechoice["a" /* default */].getDefaultAnswer(this.questionModel));

    if (this.questionModel.choice.other && this.questionModel.answer) {
      if (this.questionModel.choice.options.findIndex(x => x._id === this.questionModel.answer) === -1) {
        this.otherAnswer = this.questionModel.answer;
        this.otherAnswerValue = this.questionModel.answer !== 'other' ? this.questionModel.answer : '';
      }
    }
  },
  watch: {
    otherAnswerValue: function otherAnswerValue() {
      if (this.otherAnswerValue) {
        this.otherAnswer = this.otherAnswerValue;
      } else {
        this.otherAnswer = this.$t('questionTypes.choice.other');
      }

      this.questionModel.answer = this.otherAnswer;
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/singlechoice/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var subtypes_singlechoice_components_Inputvue_type_script_lang_js_ = (singlechoice_components_Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/singlechoice/components/Input.vue?vue&type=style&index=0&id=513a5c2a&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_513a5c2a_lang_scss_scoped_true_ = __webpack_require__("B/ZW");

// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/singlechoice/components/Input.vue






/* normalize component */

var singlechoice_components_Input_component = Object(componentNormalizer["a" /* default */])(
  subtypes_singlechoice_components_Inputvue_type_script_lang_js_,
  Inputvue_type_template_id_513a5c2a_scoped_true_render,
  Inputvue_type_template_id_513a5c2a_scoped_true_staticRenderFns,
  false,
  null,
  "513a5c2a",
  null
  
)

/* hot reload */
if (false) { var singlechoice_components_Input_api; }
singlechoice_components_Input_component.options.__file = "src/questiontypes/choice/subtypes/singlechoice/components/Input.vue"
/* harmony default export */ var singlechoice_components_Input = (singlechoice_components_Input_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/opinionscale/components/Input.vue?vue&type=template&id=a055ab2a&scoped=true&
var Inputvue_type_template_id_a055ab2a_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("div", { staticClass: "opinion-scale-wrapper" }, [
        _c(
          "div",
          {
            staticClass: "opinion-scale-wrapper-grid",
            class: { "invalid-input-wrapper": !_vm.isValid }
          },
          _vm._l(_vm.questionModel.choice.options, function(option) {
            return _c(
              "div",
              {
                key: option._id,
                staticClass: "opinion-scale-button",
                class: { checked: option._id === _vm.questionModel.answer },
                attrs: { disabled: _vm.disabled },
                on: {
                  click: function($event) {
                    return _vm.setScale(option._id)
                  }
                }
              },
              [_vm._v("\n\t\t\t\t" + _vm._s(option.text) + "\n\t\t\t")]
            )
          }),
          0
        ),
        _vm._v(" "),
        _c("div", { staticClass: "opinion-scale-wrapper-labels" }, [
          _vm.questionModel.choice.showLabel
            ? _c(
                "span",
                { staticClass: "opinion-scale-wrapper-labels-label left" },
                [_vm._v(_vm._s(_vm.questionModel.choice.labelLeft))]
              )
            : _vm._e(),
          _vm._v(" "),
          _vm.questionModel.choice.showLabel
            ? _c(
                "span",
                { staticClass: "opinion-scale-wrapper-labels-label center" },
                [_vm._v(_vm._s(_vm.questionModel.choice.labelCenter))]
              )
            : _vm._e(),
          _vm._v(" "),
          _vm.questionModel.choice.showLabel
            ? _c(
                "span",
                { staticClass: "opinion-scale-wrapper-labels-label right" },
                [_vm._v(_vm._s(_vm.questionModel.choice.labelRight))]
              )
            : _vm._e()
        ])
      ]),
      _vm._v(" "),
      _c("i-question-validation", {
        ref: "input",
        style: _vm.questionModel.choice.showLabel ? "margin-top: 20px;" : "",
        attrs: {
          required: _vm.questionModel.isRequired,
          rules: _vm.formModel.validationRules[_vm.questionModel._id]
        },
        on: {
          validation: function($event) {
            _vm.isValid = $event
          }
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
    ],
    1
  )
}
var Inputvue_type_template_id_a055ab2a_scoped_true_staticRenderFns = []
Inputvue_type_template_id_a055ab2a_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/opinionscale/components/Input.vue?vue&type=template&id=a055ab2a&scoped=true&

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/opinionscale/index.js
var opinionscale = __webpack_require__("n3VK");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/subtypes/opinionscale/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var opinionscale_components_Inputvue_type_script_lang_js_ = ({
  name: 'opinionscaleInput',
  props: {
    questionModel: Object,
    formModel: Object,
    disabled: Boolean,
    readonly: Boolean
  },
  data: function data() {
    return {
      isValid: true
    };
  },
  methods: {
    setScale(val) {
      if (this.readonly) {
        return;
      }

      if (this.questionModel.answer === val) {
        this.questionModel.answer = null;
      } else {
        this.questionModel.answer = val;
      }

      this.$emit('onInput', this.questionModel);
    }

  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', opinionscale["a" /* default */].getDefaultAnswer(this.questionModel));
  }
});
// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/opinionscale/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var subtypes_opinionscale_components_Inputvue_type_script_lang_js_ = (opinionscale_components_Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/opinionscale/components/Input.vue?vue&type=style&index=0&id=a055ab2a&scoped=true&lang=scss&
var Inputvue_type_style_index_0_id_a055ab2a_scoped_true_lang_scss_ = __webpack_require__("jKjR");

// CONCATENATED MODULE: ./src/questiontypes/choice/subtypes/opinionscale/components/Input.vue






/* normalize component */

var opinionscale_components_Input_component = Object(componentNormalizer["a" /* default */])(
  subtypes_opinionscale_components_Inputvue_type_script_lang_js_,
  Inputvue_type_template_id_a055ab2a_scoped_true_render,
  Inputvue_type_template_id_a055ab2a_scoped_true_staticRenderFns,
  false,
  null,
  "a055ab2a",
  null
  
)

/* hot reload */
if (false) { var opinionscale_components_Input_api; }
opinionscale_components_Input_component.options.__file = "src/questiontypes/choice/subtypes/opinionscale/components/Input.vue"
/* harmony default export */ var opinionscale_components_Input = (opinionscale_components_Input_component.exports);
// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/choice/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//







/* harmony default export */ var choice_components_Inputvue_type_script_lang_js_ = ({
  name: 'choiceInput',
  components: {
    componentinputdropdown: Input,
    componentinputmultiplechoice: components_Input,
    componentinputpicturechoice: picturechoice_components_Input,
    componentinputrating: rating_components_Input,
    componentinputsinglechoice: singlechoice_components_Input,
    componentinputopinionscale: opinionscale_components_Input
  },
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  methods: {
    onInput: function onInput() {
      this.$emit('onInput', this.questionModel);
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/choice/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var questiontypes_choice_components_Inputvue_type_script_lang_js_ = (choice_components_Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/choice/components/Input.vue?vue&type=style&index=0&id=5654b24c&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_5654b24c_lang_scss_scoped_true_ = __webpack_require__("iL1J");

// CONCATENATED MODULE: ./src/questiontypes/choice/components/Input.vue






/* normalize component */

var choice_components_Input_component = Object(componentNormalizer["a" /* default */])(
  questiontypes_choice_components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "5654b24c",
  null
  
)

/* hot reload */
if (false) { var choice_components_Input_api; }
choice_components_Input_component.options.__file = "src/questiontypes/choice/components/Input.vue"
/* harmony default export */ var choice_components_Input = __webpack_exports__["default"] = (choice_components_Input_component.exports);

/***/ }),

/***/ "1gVi":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("Rs0G");

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

/***/ "3GD6":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_30fac89e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("+7pe");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_30fac89e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_30fac89e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_30fac89e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "3PPr":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_e637a8fe_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("1gVi");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_e637a8fe_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_e637a8fe_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_e637a8fe_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "4bSx":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/address/components/Input.vue?vue&type=template&id=e637a8fe&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "question-body" }, [
    _c(
      "div",
      { staticClass: "full wrap" },
      [
        _c("i-text", {
          ref: "inputA",
          staticClass: "long-input",
          attrs: {
            "prepend-icon": "map-marker",
            placeholder: _vm.labels.addressLine1,
            rules: _vm.validationRules.addressLine1,
            readonly: _vm.readonly,
            name: "address-line1",
            autocomplete: "address-line1",
            noValidationElement: "",
            required: _vm.questionModel.isRequired
          },
          on: {
            input: function($event) {
              return _vm.$emit("onInput", _vm.questionModel)
            },
            focus: function($event) {
              return _vm.$emit("onFocus", _vm.questionModel)
            },
            validation: _vm.onValidation
          },
          model: {
            value: _vm.questionModel.answer.addressLine1,
            callback: function($$v) {
              _vm.$set(_vm.questionModel.answer, "addressLine1", $$v)
            },
            expression: "questionModel.answer.addressLine1"
          }
        }),
        _vm._v(" "),
        _vm.questionModel.address.isShowAddressLine2
          ? _c("i-text", {
              staticClass: "long-input",
              attrs: {
                placeholder: _vm.labels.addressLine2,
                rules: _vm.validationRules.addressLine2,
                readonly: _vm.readonly,
                name: "address-line2",
                autocomplete: "address-line2",
                noValidationElement: "",
                required: _vm.questionModel.isRequired
              },
              on: {
                input: function($event) {
                  return _vm.$emit("onInput", _vm.questionModel)
                },
                validation: _vm.onValidation
              },
              model: {
                value: _vm.questionModel.answer.addressLine2,
                callback: function($$v) {
                  _vm.$set(_vm.questionModel.answer, "addressLine2", $$v)
                },
                expression: "questionModel.answer.addressLine2"
              }
            })
          : _vm._e(),
        _vm._v(" "),
        _vm.questionModel.address.isShowCity
          ? _c("i-text", {
              staticClass: "short-input",
              attrs: {
                placeholder: _vm.labels.city,
                rules: _vm.validationRules.city,
                readonly: _vm.readonly,
                name: "address-city",
                autocomplete: "on",
                noValidationElement: "",
                required: _vm.questionModel.isRequired
              },
              on: {
                input: function($event) {
                  return _vm.$emit("onInput", _vm.questionModel)
                },
                validation: _vm.onValidation
              },
              model: {
                value: _vm.questionModel.answer.city,
                callback: function($$v) {
                  _vm.$set(_vm.questionModel.answer, "city", $$v)
                },
                expression: "questionModel.answer.city"
              }
            })
          : _vm._e(),
        _vm._v(" "),
        _vm.questionModel.address.isShowState
          ? _c("i-text", {
              staticClass: "short-input",
              attrs: {
                placeholder: _vm.labels.state,
                rules: _vm.validationRules.state,
                readonly: _vm.readonly,
                name: "address-state",
                autocomplete: "on",
                noValidationElement: "",
                required: _vm.questionModel.isRequired
              },
              on: {
                input: function($event) {
                  return _vm.$emit("onInput", _vm.questionModel)
                },
                validation: _vm.onValidation
              },
              model: {
                value: _vm.questionModel.answer.state,
                callback: function($$v) {
                  _vm.$set(_vm.questionModel.answer, "state", $$v)
                },
                expression: "questionModel.answer.state"
              }
            })
          : _vm._e(),
        _vm._v(" "),
        _vm.questionModel.address.isShowPcode
          ? _c("i-text", {
              staticClass: "short-input",
              attrs: {
                placeholder: _vm.labels.pcode,
                rules: _vm.validationRules.pcode,
                readonly: _vm.readonly,
                name: "address-pcode",
                autocomplete: "postal-code",
                noValidationElement: "",
                required: _vm.questionModel.isRequired
              },
              on: {
                input: function($event) {
                  return _vm.$emit("onInput", _vm.questionModel)
                },
                validation: _vm.onValidation
              },
              model: {
                value: _vm.questionModel.answer.pcode,
                callback: function($$v) {
                  _vm.$set(_vm.questionModel.answer, "pcode", $$v)
                },
                expression: "questionModel.answer.pcode"
              }
            })
          : _vm._e(),
        _vm._v(" "),
        _vm.questionModel.address.isShowCountry
          ? _c("i-select", {
              staticClass: "short-input",
              attrs: {
                items: _vm.countries,
                searchable: "",
                noValidationElement: "",
                required: _vm.questionModel.isRequired,
                placeholder: _vm.labels.country,
                rules: _vm.validationRules.country,
                "option-text": "text",
                "option-value": "code",
                autocomplete: "chrome-off",
                readonly: _vm.readonly
              },
              on: {
                input: function($event) {
                  return _vm.$emit("onInput", _vm.questionModel)
                },
                validation: _vm.onValidation
              },
              model: {
                value: _vm.questionModel.answer.country,
                callback: function($$v) {
                  _vm.$set(_vm.questionModel.answer, "country", $$v)
                },
                expression: "questionModel.answer.country"
              }
            })
          : _vm._e(),
        _vm._v(" "),
        _vm.questionModel.address.isShowMap && _vm.formModel.googleMapApiKey
          ? _c(
              "div",
              { staticClass: "map-wrapper long-input" },
              [
                _c("IGoogleMap", {
                  ref: "map",
                  attrs: {
                    useGPS: _vm.useGPS,
                    apiKey: _vm.formModel.googleMapApiKey,
                    defaultLocation: _vm.location,
                    readonly: _vm.readonly
                  },
                  model: {
                    value: _vm.questionModel.answer.location,
                    callback: function($$v) {
                      _vm.$set(_vm.questionModel.answer, "location", $$v)
                    },
                    expression: "questionModel.answer.location"
                  }
                }),
                _vm._v(" "),
                _c("i-question-validation", {
                  attrs: {
                    rules:
                      _vm.formModel.validationRules[_vm.questionModel._id].l
                  },
                  model: {
                    value: _vm.questionModel.answer,
                    callback: function($$v) {
                      _vm.$set(_vm.questionModel, "answer", $$v)
                    },
                    expression: "questionModel.answer"
                  }
                }),
                _vm._v(" "),
                _c(
                  "i-button",
                  {
                    staticClass: "map-btn",
                    on: {
                      click: function($event) {
                        !_vm.readonly && _vm.onGPS()
                      }
                    }
                  },
                  [_c("i-icon", { attrs: { icon: "map-marker" } })],
                  1
                ),
                _vm._v(" "),
                _c(
                  "i-button",
                  {
                    staticClass: "map-btn",
                    on: {
                      click: function($event) {
                        !_vm.readonly && _vm.removeLocation()
                      }
                    }
                  },
                  [_c("i-icon", { attrs: { icon: "trash" } })],
                  1
                )
              ],
              1
            )
          : _vm._e()
      ],
      1
    ),
    _vm._v(" "),
    _vm.errorMessage
      ? _c(
          "span",
          {
            staticClass: "helper-text",
            domProps: {
              innerHTML: _vm._s(
                _vm.BbCode.cleanTextFromBBCode(_vm.errorMessage)
              )
            }
          },
          [_c("span", { staticClass: "arrow" })]
        )
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/address/components/Input.vue?vue&type=template&id=e637a8fe&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.promise.js
var es_promise = __webpack_require__("5s+n");

// EXTERNAL MODULE: ./src/enums/countryenums.js
var countryenums = __webpack_require__("WQdS");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/address/index.js
var address = __webpack_require__("A541");

// EXTERNAL MODULE: ./src/helpers/bbcode.js
var bbcode = __webpack_require__("RuLz");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/address/components/Input.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'addressInput',
  components: {
    IGoogleMap: () => __webpack_require__.e(/* import() | igooglemap */ 147).then(__webpack_require__.bind(null, "p0Sx"))
  },
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: {
      type: Boolean,
      default: false
    }
  },
  mixins: [questionTypeInputMixin["a" /* default */]],

  data() {
    return {
      countries: Object(countryenums["a" /* default */])(),
      useGPS: false,
      location: this.questionModel.address.defaultLocation,
      errorMessage: null,
      erroredVmObject: {},
      BbCode: bbcode["a" /* default */]
    };
  },

  methods: {
    onGPS: function onGPS() {
      this.useGPS = true;
    },
    removeLocation: function removeLocation() {
      this.$refs.map.resetLocation(this.questionModel.address.defaultLocation);
    },
    onValidation: function onValidation(isValid, errorMessage, vm) {
      this.erroredVmObject[vm._uid] = errorMessage;

      if (!errorMessage) {
        delete this.erroredVmObject[vm._uid];
      }

      clearTimeout(window.addressValidationTimeout);
      window.addressValidationTimeout = setTimeout(() => {
        for (var key in this.erroredVmObject) {
          if (this.erroredVmObject[key]) {
            this.errorMessage = this.erroredVmObject[key];
            return;
          }
        }

        this.errorMessage = null;
      }, 10);
    }
  },
  created: function created() {
    if (this.questionModel.answer) {
      if (this.questionModel.answer.country) {
        this.questionModel.answer.countryFullname = this.countries.find(x => x.code === this.questionModel.answer.country).text;
      }

      return;
    }

    this.$set(this.questionModel, 'answer', address["default"].getDefaultAnswer(this.questionModel, this.formModel));
  },
  computed: {
    labels: function labels() {
      if (this.questionModel.address.labels) {
        return this.questionModel.address.labels;
      }

      return __webpack_require__("A541").default.componentDefaults().address.labels;
    },
    inputs: function inputs() {
      return [this.$refs.inputA, this.$refs.input];
    },
    validationRules: function validationRules() {
      return this.formModel.validationRules[this.questionModel._id];
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/address/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/address/components/Input.vue?vue&type=style&index=0&id=e637a8fe&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_e637a8fe_lang_scss_scoped_true_ = __webpack_require__("3PPr");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/address/components/Input.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "e637a8fe",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/address/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "7LDq":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "83dD":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("tGPU");

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

/***/ "8aGY":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("qoa9");

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

/***/ "9psa":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_e0e989f0_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("b40O");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_e0e989f0_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_e0e989f0_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_e0e989f0_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "9yKF":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("aG8o");

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

/***/ "AkO0":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "B/ZW":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_513a5c2a_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("8aGY");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_513a5c2a_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_513a5c2a_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_513a5c2a_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "Cjzc":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var getQuestionElementRecursively = el => {
  if (!el) {
    return;
  }

  if (el.classList && el.classList.contains && el.classList.contains('question')) {
    return el;
  }

  return getQuestionElementRecursively(el.parentNode);
};

/* harmony default export */ __webpack_exports__["a"] = ({
  mounted: function mounted() {
    this.$emit('onMounted', this.questionModel);
  },
  methods: {
    getFirstElementByProp: function getFirstElementByProp(comp, prop) {
      if (Array.isArray(comp) && comp.length > 0) {
        comp = comp[0];
      }

      var focusing = comp;

      if (!focusing) {
        return true;
      }

      while (focusing && !focusing[prop]) {
        if (!focusing.$refs) {
          break;
        }

        focusing = focusing.$refs.component || focusing.$refs.input;
      }

      return focusing || true;
    },
    validate: function validate(c, component) {
      var shakeIt = comp => {
        var el = getQuestionElementRecursively(comp.$el);

        if (!this.$root.isMobile) {
          var focusable = this.getFirstElementByProp(comp, 'focus');

          if (focusable && focusable.focus) {
            focusable.focus();
          }
        }

        if (el) {
          el.classList.add('shake');
          setTimeout(() => {
            el.classList.remove('shake');
          }, this.$theme.transitionMS);
        }
      };

      var isValid = !c.beforeOnSubmit || c.beforeOnSubmit();

      if (isValid === false) {
        shakeIt(component);
      }

      return isValid;
    },
    nextInput: function nextInput(comps) {
      if (!comps) {
        comps = this.comps;
      }

      var i = comps.findIndex(x => x.isFocused === true);

      if (i === comps.length - 1) {
        return this.nextQuestion(comps);
      }

      var nextC = this.getFirstElementByProp(comps[i + 1], 'focus');
      var c = this.getFirstElementByProp(comps[i], 'beforeOnSubmit');

      if (nextC.beforeOnSubmit && !nextC.beforeOnSubmit()) {
        if (!this.validate(c, comps[i])) {
          return false;
        }
      }

      if (nextC) {
        nextC.focus();
      }
    },
    nextQuestion: function nextQuestion(components, validateCB) {
      if (!components) {
        components = this.comps;
      }

      this.$nextTick(() => {
        if (Array.isArray(components)) {
          for (var i = 0; i < components.length; i++) {
            var component = components[i];
            var c = this.getFirstElementByProp(component, 'beforeOnSubmit');

            if (!c) {
              validateCB && validateCB(false);
              return false;
            }

            if (Array.isArray(c)) {
              for (var j = 0; j < c.length; j++) {
                if (!this.validate(c[j], component)) {
                  validateCB && validateCB(false);
                  return false;
                }
              }
            } else {
              if (!this.validate(c, components[0])) {
                validateCB && validateCB(false);
                return false;
              }
            }
          }
        } else {
          var _c = this.getFirstElementByProp(components, 'beforeOnSubmit');

          if (!_c) {
            validateCB && validateCB(false);
            return false;
          }

          if (!this.validate(_c, components)) {
            validateCB && validateCB(false);
            return false;
          }
        }

        validateCB && validateCB(true); // this.$emit('nextQuestion', this.questionModel);
      });
    }
  },
  computed: {
    comps: function comps() {
      return this.inputs || this.$refs.component || this.$refs.input;
    }
  }
});

/***/ }),

/***/ "Ck9U":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/email/components/Input.vue?vue&type=template&id=42d0e019&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "question-body" }, [
    _c(
      "div",
      { staticClass: "full" },
      [
        _c("i-text", {
          ref: "input",
          attrs: {
            "prepend-icon": "envelope",
            type: "email",
            placeholder: _vm.questionModel.placeholder,
            required: _vm.questionModel.isRequired,
            rules: _vm.validEmail,
            name: "email",
            autocomplete: "email",
            readonly: _vm.readonly
          },
          on: {
            input: function($event) {
              return _vm.$emit("onInput", _vm.questionModel)
            },
            focus: function($event) {
              return _vm.$emit("onFocus", _vm.questionModel)
            }
          },
          model: {
            value: _vm.questionModel.answer,
            callback: function($$v) {
              _vm.$set(_vm.questionModel, "answer", $$v)
            },
            expression: "questionModel.answer"
          }
        }),
        _vm._v(" "),
        _vm.questionModel.email.isShowConfirmation
          ? _c("i-text", {
              ref: "inputC",
              attrs: {
                type: "email",
                required: _vm.questionModel.isRequired,
                rules: _vm.emailConfirmation,
                readonly: _vm.readonly,
                name: "confirm-email",
                autocomplete: "email",
                placeholder: _vm.questionModel.email.labels.confirmation
              },
              on: {
                input: function($event) {
                  return _vm.$emit("onInput", _vm.questionModel)
                }
              },
              model: {
                value: _vm.confirmationModel,
                callback: function($$v) {
                  _vm.confirmationModel = $$v
                },
                expression: "confirmationModel"
              }
            })
          : _vm._e()
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/email/components/Input.vue?vue&type=template&id=42d0e019&

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/email/index.js
var email = __webpack_require__("9Vbv");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/email/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'emailInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  data: function data() {
    return {
      confirmationModel: null
    };
  },
  created: function created() {
    if (this.questionModel.answer) {
      this.confirmationModel = this.questionModel.answer;
      return;
    }

    this.$set(this.questionModel, 'answer', email["a" /* default */].getDefaultAnswer(this.questionModel));

    if (this.questionModel.email.confirmationDefaultValue) {
      this.confirmationModel = this.questionModel.email.confirmationDefaultValue;
    }
  },
  computed: {
    emailConfirmation: function emailConfirmation() {
      if (this.formModel.validationRules[this.questionModel._id].emailConfirm) {
        return this.formModel.validationRules[this.questionModel._id].emailConfirm(this.questionModel.answer);
      } else {
        return [];
      }
    },
    validEmail: function validEmail() {
      if (this.formModel.validationRules[this.questionModel._id]) {
        return this.formModel.validationRules[this.questionModel._id].email;
      } else {
        return [];
      }
    },
    inputs: function inputs() {
      var arr = [];
      arr.push(this.$refs.input);

      if (this.questionModel.email.isShowConfirmation) {
        arr.push(this.$refs.inputC);
      }

      return arr;
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/email/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/email/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/email/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "DGov":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "DURk":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_33878abc_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("pnFF");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_33878abc_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_33878abc_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_33878abc_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "ElYF":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("7LDq");

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

/***/ "HYZu":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/submitbutton/components/Input.vue?vue&type=template&id=25dc9c91&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "question submitbutton",
      class: [
        { visible: _vm.visibleForCardDesign },
        _vm.formModel.submitButton.align
      ]
    },
    [
      _c(
        "div",
        {
          staticClass: "question-body",
          class: [_vm.formModel.submitButton.align]
        },
        [
          _vm.formModel.baseSettings && _vm.formModel.baseSettings.captchaChoice
            ? _c("vue-recaptcha", {
                ref: "recaptcha",
                staticClass: "recaptcha",
                attrs: { sitekey: _vm.sitekey },
                on: { verify: _vm.onVerify, expired: _vm.onExpired }
              })
            : _vm._e(),
          _vm._v(" "),
          _vm.reCaptcha.isOk !== null && !_vm.reCaptcha.isOk
            ? _c("i-alert", { attrs: { type: "error" } }, [
                _vm._v("\n\t\t\t" + _vm._s(_vm.$t("notARobot")) + "\n\t\t")
              ])
            : _vm._e(),
          _vm._v(" "),
          !_vm.$root.isOnline
            ? _c(
                "i-alert",
                {
                  staticClass: "reload-alert",
                  attrs: { type: "warning" },
                  on: { click: _vm.onReloadClick }
                },
                [
                  _c("span", {
                    domProps: {
                      innerHTML: _vm._s(_vm.$t("noInternetConnection"))
                    }
                  })
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          _vm.formModel.submitButton.isShow !== false
            ? _c(
                "div",
                {
                  staticClass: "submit-button",
                  class: _vm.formModel.submitButton.align
                },
                [
                  _c(
                    "i-button",
                    {
                      directives: [
                        {
                          name: "tooltip",
                          rawName: "v-tooltip",
                          value: {
                            text: _vm.disabled,
                            disabled: _vm.disabled === null
                          },
                          expression:
                            "{ text: disabled, disabled: disabled === null }"
                        }
                      ],
                      class: { "load-button": _vm.isLoading },
                      attrs: {
                        loading: _vm.isLoading,
                        tabindex: _vm.tabindex,
                        disabled: _vm.disabled !== null
                      },
                      on: {
                        click: _vm.onClick,
                        keydown: [
                          function($event) {
                            if (
                              !$event.type.indexOf("key") &&
                              _vm._k($event.keyCode, "space", 32, $event.key, [
                                " ",
                                "Spacebar"
                              ])
                            ) {
                              return null
                            }
                            return _vm.onClick($event)
                          },
                          function($event) {
                            if (
                              !$event.type.indexOf("key") &&
                              _vm._k(
                                $event.keyCode,
                                "enter",
                                13,
                                $event.key,
                                "Enter"
                              )
                            ) {
                              return null
                            }
                            return _vm.onClick($event)
                          }
                        ]
                      }
                    },
                    [
                      _vm._v(
                        "\n\t\t\t\t" +
                          _vm._s(_vm.formModel.submitButton.text) +
                          "\n\t\t\t"
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _vm.disabled === null &&
                  _vm.formModel.baseSettings.cardDesign &&
                  !_vm.$root.isMobile
                    ? _c("span", {
                        domProps: {
                          innerHTML: _vm._s(
                            _vm.$t("formbuilder.viewType.pressEnter")
                          )
                        }
                      })
                    : _vm._e()
                ],
                1
              )
            : _vm._e()
        ],
        1
      )
    ]
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/submitbutton/components/Input.vue?vue&type=template&id=25dc9c91&scoped=true&

// EXTERNAL MODULE: ./src/helpers/jsHelpers.js + 1 modules
var jsHelpers = __webpack_require__("ttAG");

// EXTERNAL MODULE: ./config/prod.js
var prod = __webpack_require__("NRfZ");

// EXTERNAL MODULE: ./node_modules/vue-recaptcha/dist/vue-recaptcha.es.js
var vue_recaptcha_es = __webpack_require__("4JY7");

// EXTERNAL MODULE: ./src/helpers/bbcode.js
var bbcode = __webpack_require__("RuLz");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/submitbutton/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

 // TODO: make this async if possible



/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'submitbutton',
  components: {
    VueRecaptcha: vue_recaptcha_es["a" /* default */]
  },

  data() {
    return {
      sitekey: prod["a" /* default */].reChaptcha.v2.siteKey,
      captchaChoice: false,
      BbCode: bbcode["a" /* default */]
    };
  },

  props: {
    isLoading: Boolean,
    disabled: {
      type: String,
      default: null
    },
    formModel: Object,
    onVerify: Function,
    onExpired: Function,
    tabindex: {
      type: Number,
      default: 0
    },
    reCaptcha: {
      type: Object,
      default: () => {
        return {
          isOk: null
        };
      }
    },
    visibleForCardDesign: Boolean
  },
  created: function created() {
    this.formModel.submitButton = this.formModel.submitButton ? this.formModel.submitButton : {
      text: 'Submit'
    };
  },
  mounted: function mounted() {
    jsHelpers["default"].loadRecaptchaVersion(2);
  },
  methods: {
    onReloadClick: function onReloadClick() {
      window.location.reload();
    },
    onClick: function onClick(e) {
      if (this.disabled !== null) {
        return;
      }

      this.$emit('onSubmit', e);
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/submitbutton/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/submitbutton/components/Input.vue?vue&type=style&index=0&id=25dc9c91&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_25dc9c91_lang_scss_scoped_true_ = __webpack_require__("RrnJ");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/submitbutton/components/Input.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "25dc9c91",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/submitbutton/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "Hm2W":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/productbasket/components/Input.vue?vue&type=template&id=585bce40&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "product" },
    [
      _c(
        "div",
        {
          staticClass: "question-basket text-left",
          on: {
            click: function($event) {
              _vm.readonly ? (_vm.showBasket = false) : (_vm.showBasket = true)
            }
          }
        },
        [
          _vm.totalAmount === 0
            ? _c("div", {
                staticClass: "basket-text",
                domProps: {
                  innerHTML: _vm._s(
                    _vm.$t("questionTypes.productbasket.noProductInBasket")
                  )
                }
              })
            : _c(
                "i18n",
                {
                  staticClass: "basket-text-total",
                  attrs: {
                    path: "questionTypes.productbasket.grandTotalInTheBasket",
                    tag: "div"
                  }
                },
                [
                  _c("span", { attrs: { place: "total" } }, [
                    _vm._v(_vm._s(_vm.viewPrice(_vm.questionModel.answer.t)))
                  ]),
                  _vm._v(" "),
                  _c("span", { attrs: { place: "currency" } }, [
                    _vm._v(_vm._s(_vm.currency))
                  ])
                ]
              ),
          _vm._v(" "),
          _c("div", { staticClass: "question-basket-icon" }, [
            _c(
              "div",
              { staticClass: "pre-icons" },
              [
                _c(
                  "span",
                  { class: { "active-basket": _vm.totalAmount > 0 } },
                  [
                    _vm.totalAmount > 0
                      ? _c("b", [_vm._v(_vm._s(_vm.totalAmount))])
                      : _c("b", [_vm._v("0")])
                  ]
                ),
                _vm._v(" "),
                _c("i-icon", { attrs: { icon: "shopping-basket" } })
              ],
              1
            )
          ])
        ],
        1
      ),
      _vm._v(" "),
      _vm.questionModel.productbasket.categories &&
      _vm.questionModel.productbasket.categories.length > 0
        ? _c(
            "div",
            {
              staticClass: "product-category-wrapper",
              class: { opened: _vm.selectedCategorySubCategories.length > 0 }
            },
            [
              _c(
                "ul",
                { staticClass: "product-category" },
                [
                  _c(
                    "li",
                    {
                      on: {
                        click: function($event) {
                          _vm.selectedMainCategory = null
                        }
                      }
                    },
                    [_vm._v(_vm._s(_vm.$t("questionTypes.productbasket.all")))]
                  ),
                  _vm._v(" "),
                  _vm._l(_vm.mainCategories, function(category, index) {
                    return _c(
                      "li",
                      {
                        key: "clist-" + index,
                        class: {
                          selected:
                            _vm.selectedMainCategory &&
                            _vm.selectedMainCategory._id === category._id
                        },
                        on: {
                          click: function($event) {
                            _vm.selectedMainCategory = category
                          }
                        }
                      },
                      [_vm._v(_vm._s(category.name))]
                    )
                  })
                ],
                2
              ),
              _vm._v(" "),
              _vm.selectedCategorySubCategories.length > 0
                ? _c(
                    "ul",
                    { staticClass: "product-subcategory" },
                    _vm._l(_vm.selectedCategorySubCategories, function(
                      subCategory,
                      index
                    ) {
                      return _c(
                        "li",
                        {
                          key: "sclist-" + index,
                          class: {
                            selected: _vm.selectedSubCategories[subCategory._id]
                          },
                          on: {
                            click: function($event) {
                              return _vm.selectCategory(subCategory)
                            }
                          }
                        },
                        [_vm._v(_vm._s(subCategory.name))]
                      )
                    }),
                    0
                  )
                : _vm._e()
            ]
          )
        : _vm._e(),
      _vm._v(" "),
      _c("div", { staticClass: "product-misc" }, [
        _c("div", { staticClass: "product-misc-item" }, [
          _c("div", {
            staticClass: "product-count",
            domProps: {
              innerHTML: _vm._s(
                _vm.$tc(
                  "questionTypes.productbasket.listingProducts",
                  _vm.filteredProducts.length,
                  { count: _vm.filteredProducts.length }
                )
              )
            }
          }),
          _vm._v(" "),
          _vm.questionModel.productbasket.viewType.viewTypes.length > 1
            ? _c(
                "div",
                { staticClass: "viewtype-icons" },
                [
                  _c("i-icon", {
                    staticClass: "change-view-icon",
                    class: { selected: _vm.selectedViewType === "list" },
                    attrs: { icon: "list-ul" },
                    on: {
                      click: function($event) {
                        return _vm.changeViewType("list")
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c("i-icon", {
                    staticClass: "change-view-icon",
                    class: { selected: _vm.selectedViewType === "grid" },
                    attrs: { icon: "th-large" },
                    on: {
                      click: function($event) {
                        return _vm.changeViewType("grid")
                      }
                    }
                  })
                ],
                1
              )
            : _vm._e()
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "product-searh" },
          [
            _c("i-text", {
              attrs: {
                prependIcon: "search",
                placeholder: _vm.$t("questionTypes.productbasket.searchProduct")
              },
              model: {
                value: _vm.searchKeyword,
                callback: function($$v) {
                  _vm.searchKeyword = $$v
                },
                expression: "searchKeyword"
              }
            })
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "question-body product" }, [
        _c(
          "div",
          {
            staticClass: "full wrap",
            class: { "product-list-view": _vm.selectedViewType === "list" }
          },
          _vm._l(_vm.filteredProducts, function(product, index) {
            return _c(
              "div",
              {
                key: index,
                ref: "" + product._id,
                refInFor: true,
                staticClass: "product-item",
                class: {
                  disabled: _vm.productsStatus[product._id] === "disable"
                },
                attrs: { title: product.name },
                on: {
                  click: function($event) {
                    return _vm.openVariantPopup(index)
                  }
                }
              },
              [
                ((product.fileIds && product.fileIds.length > 0) ||
                  product.fileId) &&
                _vm.selectedViewType === "grid"
                  ? _c(
                      "div",
                      {
                        staticClass: "product-colomn product-image",
                        on: {
                          click: function($event) {
                            _vm.showBigImage(
                              _vm.getProductFirstFileSrc(product)
                            )
                          }
                        }
                      },
                      [
                        _c(
                          "div",
                          {
                            staticClass: "zoom-prd",
                            on: {
                              click: function($event) {
                                _vm.showBigImage(
                                  _vm.getProductFirstFileSrc(product)
                                )
                              }
                            }
                          },
                          [
                            _c(
                              "i",
                              { staticClass: "material-icons notranslate" },
                              [_vm._v("zoom_in")]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", {
                          directives: [
                            {
                              name: "lazy",
                              rawName: "v-lazy:background-image",
                              value: _vm.getProductFirstFileSrc(product),
                              expression: "getProductFirstFileSrc(product)",
                              arg: "background-image"
                            }
                          ],
                          staticClass: "product-colomn-img"
                        })
                      ]
                    )
                  : _vm.selectedViewType === "grid"
                  ? _c("div", { staticClass: "product-colomn product-image" }, [
                      _c("div", {
                        staticClass: "product-colomn-img",
                        staticStyle: {
                          background: "url(/static/img/no-product-img.jpg)"
                        }
                      })
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _c("div", { staticClass: "product-colomn product-detail" }, [
                  _c("div", { staticClass: "product-top-section" }, [
                    _c("div", { staticClass: "product-colomn-title" }, [
                      _c("h2", {}, [_vm._v(_vm._s(product.name))])
                    ]),
                    _vm._v(" "),
                    product.desc
                      ? _c("div", { staticClass: "product-desc" }, [
                          _c("p", [_vm._v(_vm._s(product.desc))])
                        ])
                      : _vm._e()
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "product-bottom-section" }, [
                    _c("b", { staticClass: "product-unit" }, [
                      _vm._v(_vm._s(product.unit + ":"))
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "product-price text-right" }, [
                      _c("p", [_vm._v(_vm._s(_vm.productListPrice(product)))])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "product-basket-button" })
                  ])
                ]),
                _vm._v(" "),
                _c("i-question-validation", {
                  staticClass: "product-basket-inlvalid",
                  attrs: {
                    rules:
                      _vm.formModel.validationRules[_vm.questionModel._id][
                        product._id
                      ]
                  },
                  model: {
                    value: product.amount,
                    callback: function($$v) {
                      _vm.$set(product, "amount", $$v)
                    },
                    expression: "product.amount"
                  }
                })
              ],
              1
            )
          }),
          0
        )
      ]),
      _vm._v(" "),
      _c("i-question-validation", {
        ref: "input",
        attrs: {
          required: _vm.questionModel.isRequired,
          notFocusInput: _vm.formModel.baseSettings.cardDesign,
          rules: _vm.formModel.validationRules[_vm.questionModel._id]._
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      }),
      _vm._v(" "),
      _c(
        "i-popup",
        {
          staticClass: "product-detail-popup",
          attrs: { "close-button": "", fullscreen: "" },
          model: {
            value: _vm.variantPopup.isOpen,
            callback: function($$v) {
              _vm.$set(_vm.variantPopup, "isOpen", $$v)
            },
            expression: "variantPopup.isOpen"
          }
        },
        [
          _vm.variantPopup.isOpen
            ? _c("div", { staticClass: "product-popup" }, [
                _c(
                  "div",
                  {
                    staticClass: "product-popup-colomn",
                    attrs: { id: "product-slide" }
                  },
                  [
                    _c("div", { staticClass: "product-colomn-img" }, [
                      _c(
                        "div",
                        {
                          staticClass: "zoom",
                          style:
                            "background-image: url(" +
                            _vm.currentImage(
                              _vm.variantPopup.pIndex,
                              _vm.currentNumber
                            ) +
                            ")",
                          on: { mousemove: _vm.zoom }
                        },
                        [
                          _c("img", {
                            directives: [
                              {
                                name: "lazy",
                                rawName: "v-lazy",
                                value: _vm.currentImage(
                                  _vm.variantPopup.pIndex,
                                  _vm.currentNumber
                                ),
                                expression:
                                  "currentImage(variantPopup.pIndex, currentNumber)"
                              }
                            ]
                          })
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _vm.selectedProduct.fileIds &&
                    _vm.selectedProduct.fileIds.length > 1
                      ? _c("div", { staticClass: "slider-navigation" }, [
                          _c(
                            "a",
                            { on: { click: _vm.prev } },
                            [_c("i-icon", { attrs: { icon: "angle-left" } })],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "a",
                            { on: { click: _vm.next } },
                            [
                              _c("i-icon", { attrs: { icon: "angle-right" } }),
                              _vm._v(" "),
                              _c("div")
                            ],
                            1
                          )
                        ])
                      : _vm._e()
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "product-popup-colomn popup-add-variant" },
                  [
                    _vm.selectedProduct
                      ? _c("div", { staticClass: "product-colomn-title" }, [
                          _c("h2", { staticClass: "product-title" }, [
                            _vm._v(_vm._s(_vm.selectedProduct.name))
                          ])
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.selectedProduct
                      ? _c("div", { staticClass: "product-desc popup-desc" }, [
                          _c("p", [_vm._v(_vm._s(_vm.selectedProduct.desc))])
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c("div", { staticClass: "add-variant-section" }, [
                      _c(
                        "div",
                        { staticClass: "product-option" },
                        _vm._l(_vm.visibleVariants, function(variant, vindex) {
                          return _c(
                            "div",
                            { key: vindex, staticClass: "product-option-item" },
                            [
                              _c("label", { staticClass: "label" }, [
                                _vm._v(
                                  "\n\t\t\t\t\t\t\t\t" +
                                    _vm._s(variant.name) +
                                    " "
                                ),
                                _vm.variantPopup.showAlert && !variant.value
                                  ? _c(
                                      "span",
                                      { staticClass: "error" },
                                      [
                                        _c("i-icon", {
                                          attrs: { icon: "exclamation-circle" }
                                        }),
                                        _vm._v(" "),
                                        _c("span", {
                                          domProps: {
                                            innerHTML: _vm._s(
                                              _vm.$t(
                                                "questionTypes.productbasket.youMustSelectVariant",
                                                { variantname: variant.name }
                                              )
                                            )
                                          }
                                        })
                                      ],
                                      1
                                    )
                                  : _vm._e()
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                { staticClass: "product-option-content" },
                                _vm._l(variant.options, function(option) {
                                  return _c(
                                    "div",
                                    {
                                      key: option,
                                      staticClass: "product-radio"
                                    },
                                    [
                                      !variant.disableOptions ||
                                      !variant.disableOptions.find(function(x) {
                                        return x === option
                                      })
                                        ? _c(
                                            "div",
                                            {
                                              ref: variant._id + "-" + option,
                                              refInFor: true
                                            },
                                            [
                                              _c("input", {
                                                staticClass: "f-input",
                                                attrs: {
                                                  type: "checkbox",
                                                  name: variant._id
                                                },
                                                domProps: { value: option },
                                                on: {
                                                  click: function($event) {
                                                    return _vm.selectVariant(
                                                      variant._id,
                                                      option
                                                    )
                                                  }
                                                }
                                              }),
                                              _vm._v(" "),
                                              _c("label", [
                                                _vm._v(_vm._s(option))
                                              ])
                                            ]
                                          )
                                        : _vm._e()
                                    ]
                                  )
                                }),
                                0
                              )
                            ]
                          )
                        }),
                        0
                      )
                    ]),
                    _vm._v(" "),
                    _vm.selectedProduct.detailUrl &&
                    _vm.selectedProduct.detailUrl.trim() !== ""
                      ? _c("div", [
                          _c(
                            "a",
                            {
                              staticClass: "product-detail-url",
                              attrs: {
                                href: _vm.fixedUrl(
                                  _vm.selectedProduct.detailUrl
                                ),
                                target: "_blank"
                              }
                            },
                            [
                              _vm._v(
                                _vm._s(_vm.$t("details")) + "\n\t\t\t\t\t\t"
                              ),
                              _c("i-icon", { attrs: { icon: "external-link" } })
                            ],
                            1
                          )
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "product-basket-detail-bottom-column" },
                      [
                        _c("div", { staticClass: "product-price text-right" }, [
                          _c("p", [_vm._v(_vm._s(_vm.productLastPrice))])
                        ]),
                        _vm._v(" "),
                        _c(
                          "div",
                          { staticClass: "product-basket-detail-bottom" },
                          [
                            _c(
                              "div",
                              { staticClass: "product-basket-button" },
                              [
                                _c(
                                  "div",
                                  { staticClass: "product-number" },
                                  [
                                    _c("b", [
                                      _vm._v(_vm._s(_vm.selectedProduct.unit))
                                    ]),
                                    _vm._v(" "),
                                    _c("i-text", {
                                      attrs: { type: "number", min: "0" },
                                      on: {
                                        change: _vm.selectVariant,
                                        input: function($event) {
                                          return _vm.roundNumber(
                                            _vm.variantPopup.pIndex
                                          )
                                        }
                                      },
                                      model: {
                                        value: _vm.selectedProduct.amount,
                                        callback: function($$v) {
                                          _vm.$set(
                                            _vm.selectedProduct,
                                            "amount",
                                            $$v
                                          )
                                        },
                                        expression: "selectedProduct.amount"
                                      }
                                    })
                                  ],
                                  1
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c("i-button", {
                              staticClass: "product-popup-button",
                              attrs: { "prepend-icon": "shopping-basket" },
                              domProps: {
                                innerHTML: _vm._s(
                                  _vm.$t(
                                    "questionTypes.productbasket.addToBasket"
                                  )
                                )
                              },
                              on: {
                                click: function($event) {
                                  return _vm.addBasket(_vm.variantPopup.pIndex)
                                }
                              }
                            })
                          ],
                          1
                        )
                      ]
                    )
                  ]
                )
              ])
            : _vm._e()
        ]
      ),
      _vm._v(" "),
      _c(
        "i-popup",
        {
          attrs: { "close-button": "" },
          model: {
            value: _vm.showBasket,
            callback: function($$v) {
              _vm.showBasket = $$v
            },
            expression: "showBasket"
          }
        },
        [
          _c("div", { staticClass: "result" }, [
            _c(
              "div",
              { staticClass: "result-view records basket-content" },
              [
                _vm.questionModel.answer &&
                _vm.questionModel.answer.p &&
                _vm.questionModel.answer.p.length > 0
                  ? _c("div", { staticClass: "table-wrapper" }, [
                      _c("div", { staticClass: "table-overflow-wrapper" }, [
                        _c("table", [
                          _c("thead", [
                            _c("tr", [
                              _c("th", [
                                _vm._v(
                                  _vm._s(
                                    _vm.$t(
                                      "questionTypes.productbasket.product"
                                    )
                                  )
                                )
                              ]),
                              _vm._v(" "),
                              _c("th", [
                                _vm._v(
                                  _vm._s(
                                    _vm.$t(
                                      "questionTypes.productbasket.preferences"
                                    )
                                  )
                                )
                              ]),
                              _vm._v(" "),
                              _c("th", [
                                _vm._v(
                                  _vm._s(
                                    _vm.$t(
                                      "questionTypes.productbasket.unitprice"
                                    )
                                  )
                                )
                              ]),
                              _vm._v(" "),
                              _c("th", [_vm._v(_vm._s(_vm.$t("amount")))]),
                              _vm._v(" "),
                              _c("th", [_vm._v(_vm._s(_vm.$t("total")))]),
                              _vm._v(" "),
                              _c("th")
                            ])
                          ]),
                          _vm._v(" "),
                          _c(
                            "tbody",
                            _vm._l(_vm.questionModel.answer.p, function(
                              product,
                              pIndex
                            ) {
                              return _c("tr", { key: pIndex }, [
                                _c("td", [_vm._v(_vm._s(product.n))]),
                                _vm._v(" "),
                                _c("td", [
                                  _c(
                                    "ul",
                                    _vm._l(product.v, function(v, vIndex) {
                                      return _c("li", { key: vIndex }, [
                                        _vm._v(_vm._s(v.n) + ": " + _vm._s(v.v))
                                      ])
                                    }),
                                    0
                                  )
                                ]),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  {
                                    staticClass: "text-right",
                                    attrs: { nowrap: "" }
                                  },
                                  [
                                    _vm._v(
                                      _vm._s(_vm.viewPrice(product.p)) +
                                        " " +
                                        _vm._s(_vm.currency)
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  {
                                    staticClass: "unit-detail",
                                    attrs: { nowrap: "" }
                                  },
                                  [
                                    _c("i-text", {
                                      staticClass: "basket-inner-unit",
                                      attrs: { type: "number", min: "0" },
                                      on: {
                                        input: function($event) {
                                          return _vm.changeAmount(pIndex)
                                        }
                                      },
                                      model: {
                                        value: _vm.basketItemAmounts[pIndex],
                                        callback: function($$v) {
                                          _vm.$set(
                                            _vm.basketItemAmounts,
                                            pIndex,
                                            $$v
                                          )
                                        },
                                        expression: "basketItemAmounts[pIndex]"
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("span", { staticClass: "units" }, [
                                      _vm._v(_vm._s(product.u))
                                    ])
                                  ],
                                  1
                                ),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  {
                                    staticClass: "text-right",
                                    attrs: { nowrap: "" }
                                  },
                                  [
                                    _c("b", [
                                      _vm._v(
                                        _vm._s(_vm.viewPrice(product.t)) +
                                          " " +
                                          _vm._s(_vm.currency)
                                      )
                                    ])
                                  ]
                                ),
                                _vm._v(" "),
                                _c("td", [
                                  _c(
                                    "a",
                                    {
                                      staticClass: "record-delete",
                                      on: {
                                        click: function($event) {
                                          return _vm.removeBasket(pIndex)
                                        }
                                      }
                                    },
                                    [
                                      _c("i-icon", { attrs: { icon: "trash" } })
                                    ],
                                    1
                                  )
                                ])
                              ])
                            }),
                            0
                          ),
                          _vm._v(" "),
                          _c("tfoot", [
                            _c("tr", [
                              _c(
                                "td",
                                {
                                  staticClass: "text-right",
                                  attrs: { colspan: "4" }
                                },
                                [
                                  _c("span", [
                                    _vm._v(_vm._s(_vm.$t("total")) + ":")
                                  ])
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "td",
                                {
                                  staticClass: "text-right",
                                  attrs: { nowrap: "" }
                                },
                                [
                                  _c("b", [
                                    _vm._v(
                                      _vm._s(
                                        _vm.viewPrice(
                                          _vm.questionModel.answer.t
                                        )
                                      ) +
                                        " " +
                                        _vm._s(_vm.currency)
                                    )
                                  ])
                                ]
                              ),
                              _vm._v(" "),
                              _c("td", [_c("span")])
                            ])
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "product-basket-sales-button" },
                        [
                          _c("i-button", {
                            staticClass: "product-sales-popup-btn outline",
                            attrs: { outline: "" },
                            domProps: {
                              innerHTML: _vm._s(
                                _vm.$t(
                                  "questionTypes.productbasket.continueShopping"
                                )
                              )
                            },
                            on: {
                              click: function($event) {
                                _vm.showBasket = false
                              }
                            }
                          }),
                          _vm._v(" "),
                          _c("i-button", {
                            staticClass: "product-sales-popup-btn",
                            attrs: { "prepend-icon": "money-bill", solid: "" },
                            domProps: {
                              innerHTML: _vm._s(
                                _vm.$t(
                                  "questionTypes.productbasket.completeShopping"
                                )
                              )
                            },
                            on: { click: _vm.checkout }
                          })
                        ],
                        1
                      )
                    ])
                  : _c("i-alert", {
                      attrs: { type: "info" },
                      domProps: {
                        innerHTML: _vm._s(
                          _vm.$t(
                            "questionTypes.productbasket.noProductInBasket"
                          )
                        )
                      }
                    })
              ],
              1
            )
          ])
        ]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/productbasket/components/Input.vue?vue&type=template&id=585bce40&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.index-of.js
var es_array_index_of = __webpack_require__("yXV3");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.splice.js
var es_array_splice = __webpack_require__("pDQq");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.number.to-fixed.js
var es_number_to_fixed = __webpack_require__("toAj");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.includes.js
var es_string_includes = __webpack_require__("JTJg");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.replace.js
var es_string_replace = __webpack_require__("UxlC");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.split.js
var es_string_split = __webpack_require__("EnZy");

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/defineProperty.js
var defineProperty = __webpack_require__("lSNA");
var defineProperty_default = /*#__PURE__*/__webpack_require__.n(defineProperty);

// EXTERNAL MODULE: ./config/prod.js
var prod = __webpack_require__("NRfZ");

// EXTERNAL MODULE: ./src/enums/currencyenums.js
var currencyenums = __webpack_require__("4B8W");
var currencyenums_default = /*#__PURE__*/__webpack_require__.n(currencyenums);

// EXTERNAL MODULE: ./src/services/FormService.js
var FormService = __webpack_require__("tL2h");

// EXTERNAL MODULE: ./src/helpers/jsHelpers.js + 1 modules
var jsHelpers = __webpack_require__("ttAG");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/productbasket/index.js
var productbasket = __webpack_require__("bNzB");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/productbasket/components/Input.vue?vue&type=script&lang=js&








function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { defineProperty_default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'productbasketInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  data: function data() {
    return {
      currentNumber: 0,
      showBasket: false,
      totalAmount: 0,
      showImg: false,
      basketItemAmounts: [],
      baseUrl: prod["a" /* default */].fileApi,
      bigImageSrc: null,
      variantPopup: {
        isOpen: false,
        pIndex: null,
        showAlert: false
      },
      productStocks: null,
      productsStatus: {},
      selectedMainCategory: null,
      selectedSubCategories: {},
      visibleVariants: [],
      selectedVariants: {},
      searchKeyword: '',
      selectedProductLastPrice: ''
    };
  },
  methods: {
    changeViewType: function changeViewType(viewType) {
      this.questionModel.productbasket.viewType.defaultViewType = viewType;
    },
    checkout: function checkout() {
      this.showBasket = false;
      this.$nextTick(() => {
        this.$goTo((this.$el.parentNode.nextSibling || document.querySelector('.question.submitbutton')).offsetTop).then(() => {
          // bu kod seperator vb. cevap verilemeyen soruları yakalamıyor.
          // bu nedenle eğer productbasket cevap verilebilen son soruysa ancak ondan
          // sonra seperator vb. cevap verilemez bir soru geliyorsa submit edemiyor.
          if (this.formModel.questions.length === this.questionModel.viewHelpers.questionNumber) {
            this.$emit('onSubmit');
          }
        });
      });
    },
    selectCategory: function selectCategory(category) {
      var found = this.selectedSubCategories[category._id];

      if (found) {
        this.$set(this.selectedSubCategories, category._id, null);
        delete this.selectedSubCategories[category._id];
      } else {
        this.$set(this.selectedSubCategories, category._id, category);
      }
    },
    currentImage: function currentImage(index) {
      var currentNumber = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
      var product = this.selectedProduct;

      if (product && product.fileIds && product.fileIds.length > 0) {
        var fileId = product.fileIds[Math.abs(currentNumber) % product.fileIds.length];

        if (this.formModel.formTempFiles && this.formModel.formTempFiles[fileId]) {
          return this.baseUrl + '/tempfile/' + this.formModel._id + '/' + fileId;
        }

        return this.baseUrl + '/formfile/' + this.formModel._id + '/' + fileId;
      } else {
        return '/static/img/no-product-img.jpg';
      }
    },
    openVariantPopup: function openVariantPopup(pIndex) {
      if (this.readonly) {
        return;
      }

      this.currentNumber = 0;
      this.variantPopup.showAlert = false; // let product = this.selectedProduct;

      this.variantPopup.pIndex = pIndex; // if (product && product.variants && product.variants.length > 0) {
      // 	this.variantPopup.isOpen = true;
      // } else {
      // 	this.addBasket(pIndex);
      // }

      var product = this.selectedProduct;
      this.variantPopup.isOpen = true;
      this.visibleVariants = product.variants;

      for (var i = 0; i < this.visibleVariants.length; i++) {
        this.visibleVariants[i].value = undefined;
      }

      this.selectedVariants = {};
      this.$router.push(this.$route.path + '#' + this.fixProductNameForUrl(product.name) + '-' + pIndex);
      this.$nextTick(() => {
        var slide = document.getElementById('product-slide');
        var self = this;

        if ('ontouchstart' in window) {
          var touchStart = function touchStart(evt) {
            var startTime = new Date().getTime();
            var startX = evt.changedTouches[0].pageX;

            var touchEnd = function touchEnd(evt) {
              document.removeEventListener('touchend', touchEnd);
              var diffX = evt.changedTouches[0].pageX - startX;
              var elapsed = new Date().getTime() - startTime;

              if (elapsed < 400 && Math.abs(diffX) > 50) {
                diffX < 0 ? self.next() : self.prev();
              }
            };

            document.addEventListener('touchend', touchEnd);
          };

          slide.addEventListener('touchstart', touchStart);
        }

        this.selectVariant();
      });
    },
    roundNumber: function roundNumber(index) {
      this.selectedProduct.amount = Math.floor(this.selectedProduct.amount);
    },
    getAnswerProductIndex: function getAnswerProductIndex(questionProduct, variants) {
      if (this.questionModel.answer.p) {
        for (var productIndex = 0; productIndex < this.questionModel.answer.p.length; productIndex++) {
          var answerProduct = this.questionModel.answer.p[productIndex];

          if (answerProduct.pid === questionProduct._id) {
            if (answerProduct.v) {
              if (variants) {
                var foundCount = 0;

                for (var x = 0; x < answerProduct.v.length; x++) {
                  var variant = answerProduct.v[x];

                  for (var y = 0; y < variants.length; y++) {
                    var v = variants[y];

                    if (v.n === variant.n && v.v === variant.v) {
                      foundCount++;
                    }
                  }
                }

                if (foundCount === questionProduct.variants.length) {
                  return productIndex;
                }
              }
            } else if (!questionProduct.variants || questionProduct.variants && questionProduct.variants.length === 0) {
              return productIndex;
            }
          }
        }
      }

      return null;
    },
    fixPrice: function fixPrice(price) {
      return Number(price.toFixed(2));
    },
    viewPrice: function viewPrice(price) {
      return Number(price).toFixed(2);
    },
    addBasket: function addBasket(index) {
      var product = this.selectedProduct;
      var amount = Number(product.amount);

      if (!amount || amount && amount < 1) {
        return;
      }

      var productVariant = this.lastProductPrice(product, true);

      if (!productVariant) {
        return;
      }

      var variants = productVariant.variants;
      var productPrice = productVariant.price;
      var total = this.fixPrice(amount * productPrice);
      var pIndex = this.getAnswerProductIndex(product, variants);
      var newProduct = {
        pid: product._id,
        // product id
        n: product.name,
        // product name
        ta: product.tags,
        p: productPrice,
        u: product.unit,
        a: amount,
        // amount
        t: total,
        // total price
        v: variants
      };

      if (this.questionModel.answer.p) {
        if (pIndex !== null) {
          this.questionModel.answer.p[pIndex].t += total;
          this.questionModel.answer.p[pIndex].t = this.fixPrice(this.questionModel.answer.p[pIndex].t);
          this.questionModel.answer.p[pIndex].a += amount;
          this.basketItemAmounts[pIndex] = this.questionModel.answer.p[pIndex].a;
        } else {
          this.basketItemAmounts.push(newProduct.a);
          this.questionModel.answer.p.push(newProduct);
        }
      } else {
        this.basketItemAmounts = [newProduct.a];
        this.questionModel.answer.p = [newProduct];
      }

      if (!this.questionModel.answer.t) {
        this.questionModel.answer.t = 0;
      }

      this.questionModel.answer.t += total;
      this.questionModel.answer.t = this.fixPrice(this.questionModel.answer.t);

      if (!this.questionModel.answer.c) {
        this.questionModel.answer.c = this.questionModel.productbasket.currency;
      }

      this.totalAmount += amount;
      this.$root.pushNotification(this.$t('questionTypes.productbasket.productsAddedYourBasket', {
        amountandunit: amount + ' ' + product.unit
      }));
      this.$emit('runFormValidation');
      this.$emit('onInput', this.questionModel);
      this.variantPopup.isOpen = false;
    },
    removeBasket: function removeBasket(index) {
      var product = this.questionModel.answer.p[index];
      this.questionModel.answer.t -= product.t;
      this.questionModel.answer.t = this.fixPrice(this.questionModel.answer.t);
      this.totalAmount -= product.a;
      this.questionModel.answer.p.splice(index, 1);
      this.basketItemAmounts.splice(index, 1);
      this.$emit('runFormValidation');
    },
    changeAmount: function changeAmount(index) {
      this.basketItemAmounts[index] = Math.floor(this.basketItemAmounts[index]);
      var newAmount = this.basketItemAmounts[index];
      var answerProduct = this.questionModel.answer.p[index];
      var oldAmount = answerProduct.a;

      if (newAmount && newAmount > 0) {
        var oldTotal = answerProduct.t;
        var newTotal = this.fixPrice(Number(newAmount) * answerProduct.p);
        this.questionModel.answer.t += newTotal - oldTotal;
        this.questionModel.answer.t = this.fixPrice(this.questionModel.answer.t);
        this.totalAmount += Number(newAmount) - oldAmount;
        answerProduct.t = this.fixPrice(newTotal);
        answerProduct.a = Number(newAmount);
      } else {
        this.basketItemAmounts[index] = oldAmount;
      }

      this.$emit('runFormValidation');
    },
    getProductFirstFileSrc: function getProductFirstFileSrc(product) {
      if (!product.fileIds && product.fileId) {
        product.fileIds = [product.fileId];
      }

      var fileId = product.fileIds[0];

      if (fileId && fileId !== '' && this.formModel.formTempFiles && this.formModel.formTempFiles[fileId]) {
        return this.baseUrl + '/tempfile/' + this.formModel._id + '/' + fileId;
      } else if (fileId && fileId !== '') {
        return this.baseUrl + '/formfile/' + this.formModel._id + '/' + fileId;
      } else {
        return '/static/img/no-product-img.jpg';
      }
    },
    showBigImage: function showBigImage(src) {
      this.bigImageSrc = src;
      this.showImg = true;
    },
    currencySymbol: function currencySymbol(currency) {
      var currencyEnum = currencyenums_default.a[currency];

      if (!currencyEnum) {
        return currency;
      }

      return currencyEnum.symbol;
    },
    fixProducts: function fixProducts() {
      if (this.questionModel.productbasket.products) {
        this.questionModel.productbasket.products.forEach(product => {
          if (!product.amount) {
            product.amount = 1;
          }

          if (product.stock && product.stock.isEnable) {
            this.$set(this.productsStatus, product._id, product.stock.whenOutOfStock);

            if (this.productStocks) {
              var stock = this.productStocks[product._id];

              if (stock) {
                if (stock > 0) {
                  this.$set(this.productsStatus, product._id, 'show');
                } else if (stock.length > 0) {
                  for (var i = 0; i < stock.length; i++) {
                    if (stock[i] && stock[i].a > 0) {
                      this.$set(this.productsStatus, product._id, 'show');
                    }
                  }
                }
              } else if (stock === undefined) {
                this.$set(this.productsStatus, product._id, 'show');
              }
            }
          }
        });
      }
    },
    fixedUrl: function fixedUrl(url) {
      return jsHelpers["default"].fixedUrl(url);
    },
    prev: function prev() {
      this.currentNumber -= 1;
    },
    next: function next() {
      this.currentNumber += 1;
    },
    checkStock: function checkStock(pStock, product) {
      var addedBasketAmount = product.amount;

      if (this.questionModel.answer.p) {
        var addedBasketProducts = this.questionModel.answer.p.filter(x => x.pid === product._id);

        for (var j = 0; j < addedBasketProducts.length; j++) {
          var k = 0;

          for (var item in pStock.v) {
            if (pStock.v[item] === addedBasketProducts[j].v[k].v) {
              k++;
            }
          }

          if (k === addedBasketProducts[j].v.length) {
            addedBasketAmount += addedBasketProducts[j].a;
          }
        }
      }

      return pStock.a >= addedBasketAmount;
    },
    selectVariant: function selectVariant(variantId, selectedOption) {
      var _this = this;

      var product = this.selectedProduct;
      this.variantPopup.showAlert = false;
      var selectedVariantOptions = document.getElementsByName(variantId);

      for (var i = 0; i < selectedVariantOptions.length; i++) {
        if (selectedOption !== selectedVariantOptions[i].value) {
          selectedVariantOptions[i].checked = false;
        }
      }

      var sVariant = this.visibleVariants.find(x => x._id === variantId);

      if (sVariant) {
        if (this.selectedVariants[variantId] !== selectedOption) {
          this.selectedVariants[variantId] = selectedOption;
          sVariant.value = selectedOption;
        } else {
          delete this.selectedVariants[variantId];
          sVariant.value = undefined;
        }

        this.$set(this, 'visibleVariants', this.visibleVariants);
      }

      this.lastProductPrice(product);

      if (product.stock.whenOutOfStock === 'continue') {
        return;
      }

      if (product && product.stock && product.stock.isEnable && this.productStocks[product._id]) {
        var pStocks = this.productStocks[product._id];
        var visibleOptions = {};
        var selectedVariantCount = Object.keys(this.selectedVariants).length;

        for (var _i = 0; _i < pStocks.length; _i++) {
          var pStock = pStocks[_i];
          /* pstock: {
          			p: 13, // price
          			a: 0, // amount
          			v: {
          				vId1: 'Siyah',
          				vId2: 'XL',
          				vId3: 'Batman'
          			}
          } */
          // option: 'Siyah'

          if (this.checkStock(pStock, product)) {
            var foundCount = 0;

            for (var selectedVariantId in this.selectedVariants) {
              var selectedVariantOption = this.selectedVariants[selectedVariantId];
              var pStockVariantOption = pStock.v[selectedVariantId];

              if (pStockVariantOption && pStockVariantOption === selectedVariantOption) {
                foundCount++;
              }
            }

            if (foundCount === selectedVariantCount) {
              for (var pStockVariantId in pStock.v) {
                pStockVariantOption = pStock.v[pStockVariantId];
                visibleOptions[pStockVariantId] = visibleOptions[pStockVariantId] || [];

                if (visibleOptions[pStockVariantId].indexOf(pStockVariantOption) === -1) {
                  visibleOptions[pStockVariantId].push(pStockVariantOption);
                }
              }
            }
          }
        }

        var _loop = function _loop(_i2) {
          var variant = product.variants[_i2];
          var options = variant.options;
          visibleVariant = visibleOptions[variant._id];

          for (var j = 0; j < options.length; j++) {
            option = options[j];
            htmlObjectId = variant._id + '-' + option;

            if (visibleVariant && visibleVariant.indexOf(option) > -1) {
              _this.$refs[htmlObjectId][0].classList.remove('variant-disable');
            } else {
              _this.$refs[htmlObjectId][0].classList.add('variant-disable');

              if (_this.selectedVariants[variant._id] === option) {
                _this.visibleVariants.find(x => x._id === variant._id).value = undefined;
                _this.$refs[htmlObjectId][0].firstElementChild.checked = false;
                delete _this.selectedVariants[variant._id];
              }
            }
          }
        };

        for (var _i2 = 0; _i2 < product.variants.length; _i2++) {
          var visibleVariant;
          var option;
          var htmlObjectId;

          _loop(_i2);
        }
      }
    },
    fixProductNameForUrl: function fixProductNameForUrl(phrase) {
      var returnString = phrase.toLowerCase();
      returnString = returnString.replace(/ö/g, 'o');
      returnString = returnString.replace(/ç/g, 'c');
      returnString = returnString.replace(/ş/g, 's');
      returnString = returnString.replace(/ı/g, 'i');
      returnString = returnString.replace(/ğ/g, 'g');
      returnString = returnString.replace(/ü/g, 'u');
      returnString = returnString.replace(/[^a-z0-9\s-]/g, '');
      returnString = returnString.replace(/[\s-]+/g, ' ');
      returnString = returnString.replace(/^\s+|\s+$/g, '');
      returnString = returnString.replace(/\s/g, '-');
      return returnString;
    },
    zoom: function zoom(event) {
      var zoomer = event.currentTarget;
      event.offsetX ? this.offsetX = event.offsetX : this.offsetX = event.clientX;
      event.offsetY ? this.offsetY = event.offsetY : this.offsetY = event.clientY;
      var x = this.offsetX / zoomer.offsetWidth * 100;
      var y = this.offsetY / zoomer.offsetHeight * 100;
      zoomer.style.backgroundPosition = x + '% ' + y + '%';
    },
    lastProductPrice: function lastProductPrice(product) {
      var alert = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

      if (product.variants && product.variants.length > 0) {
        var variants = [];

        for (var i = 0; i < product.variants.length; i++) {
          var variant = product.variants[i];

          if (variant.value) {
            variants.push({
              n: variant.name,
              v: variant.value
            });
          } else {
            this.selectedProductLastPrice = null;

            if (alert) {
              this.variantPopup.showAlert = true;
            }

            return;
          }
        }

        var productStock = this.productStocks[product._id];
        var variantPrice = -1;

        if (productStock && product.variantPrice && product.variantPrice.isEnable) {
          for (var _i3 = 0; _i3 < productStock.length; _i3++) {
            var vIndex = 0;

            for (var v in productStock[_i3].v) {
              if (productStock[_i3].v[v] === variants[vIndex].v) {
                if (vIndex + 1 === variants.length) {
                  variantPrice = productStock[_i3].p;
                  break;
                }
              } else {
                break;
              }

              vIndex++;
            }

            if (variantPrice !== -1) {
              break;
            }
          }
        }

        this.selectedProductLastPrice = variantPrice === -1 ? product.price : variantPrice;
        return {
          variants: variants,
          price: this.selectedProductLastPrice
        };
      }

      return {
        variants: [],
        price: product.price
      };
    },
    productListPrice: function productListPrice(product) {
      if (product.variantPrice && product.variantPrice.isEnable) {
        return "".concat(this.viewPrice(product.variantPrice.minPrice), " ").concat(this.currency, " - ").concat(this.viewPrice(product.variantPrice.maxPrice), " ").concat(this.currency);
      }

      return this.viewPrice(product.price) + ' ' + this.currency;
    }
  },
  created: function created() {
    FormService["a" /* default */].getFormProductStocksPublic(this.formModel._id, result => {
      if (!result) {
        result = {};
      }

      this.$set(this, 'productStocks', result);
      this.fixProducts();
    });
    this.fixProducts();
    this.$set(this.questionModel, 'answer', productbasket["a" /* default */].getDefaultAnswer(this.questionModel));
    setTimeout(() => {
      if (this.questionModel.answer && this.questionModel.answer.p) {
        this.basketItemAmounts = this.questionModel.answer.p.map(p => p.a);
        this.totalAmount = this.basketItemAmounts.reduce((sum, val) => sum + val);
      }

      if (this.$route.hash) {
        var productNameParameter = this.$route.hash.replace('#', '');
        var productIndex = parseInt(productNameParameter.split('-')[productNameParameter.split('-').length - 1]);
        this.openVariantPopup(productIndex);
      }
    }, 100);
    productbasket["a" /* default */].fixUndefinedViewTypes(this.questionModel);
  },
  computed: {
    selectedViewType: function selectedViewType() {
      if (this.questionModel.productbasket.viewType.viewTypes.length < 2 && this.questionModel.productbasket.viewType.viewTypes[0] !== this.questionModel.productbasket.viewType.viewTypes.defaultViewType) {
        return this.questionModel.productbasket.viewType.viewTypes[0];
      } else {
        return this.questionModel.productbasket.viewType.defaultViewType;
      }
    },
    selectedCategorySubCategories: function selectedCategorySubCategories() {
      var categories = [];

      if (!this.selectedMainCategory) {
        return categories;
      }

      var filtered = this.questionModel.productbasket.categories.filter(x => x.parentId === this.selectedMainCategory._id);

      for (var j = 0; j < filtered.length; j++) {
        categories.push(filtered[j]);
      }

      return categories;
    },
    mainCategories: function mainCategories() {
      return (this.questionModel.productbasket.categories || []).filter(x => !x.parentId);
    },
    filteredProducts: function filteredProducts() {
      var returnArray = [];
      var products = this.questionModel.productbasket.products.filter(x => this.productsStatus[x._id] !== 'hide');

      var filterObject = _objectSpread({}, this.selectedSubCategories);

      if (Object.keys(filterObject).length === 0) {
        if (this.selectedMainCategory) {
          filterObject[this.selectedMainCategory._id] = this.selectedMainCategory;
        }
      }

      if (Object.keys(filterObject).length > 0) {
        for (var i = 0; i < products.length; i++) {
          var product = products[i];

          if (product.categories) {
            for (var j = 0; j < product.categories.length; j++) {
              var category = product.categories[j];

              if (filterObject[category._id] && !returnArray.includes(product)) {
                returnArray.push(product);
              }
            }
          }
        }
      } else {
        returnArray = products;
      }

      if (this.searchKeyword) {
        returnArray = returnArray.filter(x => x.name.toLowerCase().includes(this.searchKeyword.toLowerCase()));
      }

      return returnArray;
    },
    selectedProduct: function selectedProduct() {
      return this.filteredProducts[this.variantPopup.pIndex];
    },
    productLastPrice: function productLastPrice() {
      if (this.selectedProduct.variantPrice && this.selectedProduct.variantPrice.isEnable) {
        return this.selectedProductLastPrice && this.selectedProductLastPrice + ' ' + this.currency || "".concat(this.viewPrice(this.selectedProduct.variantPrice.minPrice), " ").concat(this.currency, " - ").concat(this.viewPrice(this.selectedProduct.variantPrice.maxPrice), " ").concat(this.currency);
      }

      return this.viewPrice(this.selectedProduct.price) + ' ' + this.currency;
    },
    currency: function currency() {
      return this.currencySymbol(this.questionModel.productbasket.currency);
    }
  },
  watch: {
    selectedMainCategory: function selectedMainCategory() {
      this.$set(this, 'selectedSubCategories', {});
    },
    'variantPopup.isOpen': function variantPopupIsOpen() {
      if (!this.variantPopup.isOpen) {
        this.$router.push(this.$route.path);
      }
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/productbasket/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/productbasket/components/Input.vue?vue&type=style&index=0&id=585bce40&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_585bce40_lang_scss_scoped_true_ = __webpack_require__("Sg/Y");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/productbasket/components/Input.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "585bce40",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/productbasket/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "HwR2":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("ndxV");

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

/***/ "IEG2":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_32dd639d_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("/aSU");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_32dd639d_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_32dd639d_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_32dd639d_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "JGYg":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("dXNZ");

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

/***/ "Jd3p":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("AkO0");

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

/***/ "KDOO":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_00046bc8_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("Jd3p");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_00046bc8_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_00046bc8_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_00046bc8_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "Lkdo":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/phone/components/Input.vue?vue&type=template&id=4f9ba587&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "question-body" },
    [
      _c(
        "div",
        {
          class: {
            full: !_vm.questionModel.phone.mask && _vm.maskPattern === "",
            "invalid-input-wrapper": !_vm.isValid
          }
        },
        [
          !_vm.questionModel.phone.mask &&
          _vm.questionModel.phone.isShowCountrycode
            ? _c("i-text", {
                ref: "inputC",
                staticClass: "short-input",
                attrs: {
                  type: "tel",
                  placeholder: _vm.questionModel.phone.labels.countrycode,
                  name: "phone-country-code",
                  autocomplete: "tel-country-code",
                  readonly: _vm.readonly
                },
                on: {
                  input: function($event) {
                    return _vm.$emit("onInput", _vm.questionModel)
                  },
                  focus: function($event) {
                    return _vm.$emit("onFocus", _vm.questionModel)
                  }
                },
                model: {
                  value: _vm.questionModel.answer.countrycode,
                  callback: function($$v) {
                    _vm.$set(_vm.questionModel.answer, "countrycode", $$v)
                  },
                  expression: "questionModel.answer.countrycode"
                }
              })
            : _vm._e(),
          _vm._v(" "),
          !_vm.questionModel.phone.mask &&
          _vm.questionModel.phone.isShowAreacode
            ? _c("i-text", {
                ref: "inputA",
                staticClass: "short-input",
                attrs: {
                  type: "tel",
                  placeholder: _vm.questionModel.phone.labels.areacode,
                  name: "phone-area-code",
                  autocomplete: "tel-area-code",
                  readonly: _vm.readonly
                },
                on: {
                  input: function($event) {
                    return _vm.$emit("onInput", _vm.questionModel)
                  },
                  focus: function($event) {
                    return _vm.$emit("onFocus", _vm.questionModel)
                  }
                },
                model: {
                  value: _vm.questionModel.answer.areacode,
                  callback: function($$v) {
                    _vm.$set(_vm.questionModel.answer, "areacode", $$v)
                  },
                  expression: "questionModel.answer.areacode"
                }
              })
            : _vm._e(),
          _vm._v(" "),
          _vm.questionModel.phone.mask && _vm.maskPattern !== ""
            ? _c("IMaskedText", {
                ref: "inputP",
                attrs: {
                  mask: _vm.maskPattern,
                  type: "number",
                  required: _vm.questionModel.isRequired,
                  placeholder:
                    _vm.questionModel.placeholder &&
                    _vm.questionModel.placeholder !== "" &&
                    _vm.questionModel.placeholder !== _vm.questionModel.question
                      ? _vm.questionModel.placeholder
                      : _vm.questionModel.phone.maskPattern,
                  "prepend-icon": "phone",
                  readonly: _vm.readonly,
                  name: "phone",
                  autocomplete: "off"
                },
                on: {
                  input: function($event) {
                    return _vm.$emit("onInput", _vm.questionModel)
                  },
                  focus: function($event) {
                    return _vm.$emit("onFocus", _vm.questionModel)
                  }
                },
                model: {
                  value: _vm.questionModel.answer.phone,
                  callback: function($$v) {
                    _vm.$set(_vm.questionModel.answer, "phone", $$v)
                  },
                  expression: "questionModel.answer.phone"
                }
              })
            : _vm._e(),
          _vm._v(" "),
          !(_vm.questionModel.phone.mask && _vm.maskPattern !== "")
            ? _c("i-text", {
                ref: "inputP",
                attrs: {
                  "prepend-icon": "phone",
                  type: "tel",
                  placeholder: _vm.questionModel.placeholder,
                  name: "phone",
                  autocomplete:
                    !_vm.questionModel.phone.isShowCountrycode &&
                    !_vm.questionModel.phone.isShowAreacode
                      ? "tel"
                      : "tel-national",
                  readonly: _vm.readonly
                },
                on: {
                  input: function($event) {
                    return _vm.$emit("onInput", _vm.questionModel)
                  }
                },
                model: {
                  value: _vm.questionModel.answer.phone,
                  callback: function($$v) {
                    _vm.$set(_vm.questionModel.answer, "phone", $$v)
                  },
                  expression: "questionModel.answer.phone"
                }
              })
            : _vm._e(),
          _vm._v(" "),
          _vm.questionModel.phone.isShowExtension &&
          !_vm.questionModel.phone.mask
            ? _c("i-text", {
                staticClass: "short-input",
                attrs: {
                  placeholder: _vm.questionModel.phone.labels.extension,
                  type: "tel",
                  name: "phone-extension",
                  autocomplete: "tel-extension",
                  readonly: _vm.readonly
                },
                on: {
                  input: function($event) {
                    return _vm.$emit("onInput", _vm.questionModel)
                  }
                },
                model: {
                  value: _vm.questionModel.answer.extension,
                  callback: function($$v) {
                    _vm.$set(_vm.questionModel.answer, "extension", $$v)
                  },
                  expression: "questionModel.answer.extension"
                }
              })
            : _vm._e()
        ],
        1
      ),
      _vm._v(" "),
      _c("i-question-validation", {
        ref: "input",
        attrs: {
          required: _vm.questionModel.isRequired,
          rules: _vm.formModel.validationRules[_vm.questionModel._id]
        },
        on: {
          validation: function($event) {
            _vm.isValid = $event
          }
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/phone/components/Input.vue?vue&type=template&id=4f9ba587&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.promise.js
var es_promise = __webpack_require__("5s+n");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.replace.js
var es_string_replace = __webpack_require__("UxlC");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.trim.js
var es_string_trim = __webpack_require__("SYor");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/phone/index.js
var phone = __webpack_require__("NPEM");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/phone/components/Input.vue?vue&type=script&lang=js&



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'phoneInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  components: {
    IMaskedText: () => __webpack_require__.e(/* import() | imaskedtext */ 148).then(__webpack_require__.bind(null, "C8wv"))
  },
  data: function data() {
    var maskPattern = '';

    if (this.questionModel.phone.mask && this.questionModel.phone.maskPattern && this.questionModel.phone.maskPattern.trim() !== '') {
      maskPattern = {
        pattern: this.questionModel.phone.maskPattern ? this.questionModel.phone.maskPattern.replace(/1/g, '\\1') : undefined,
        formatCharacters: {
          '@': {
            validate: char => /^[A-Za-zА-Яа-яğüşöçİĞÜŞÖÇ]$/.test(char)
          },
          '#': {
            validate: char => /^[0-9]$/.test(char),
            transform: char => char.toUpperCase()
          },
          '*': {
            validate: () => true
          }
        }
      };
    }

    return {
      maskPattern: maskPattern,
      isValid: true
    };
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', phone["a" /* default */].getDefaultAnswer(this.questionModel));
  },
  computed: {
    inputs: function inputs() {
      var arr = [this.$refs.inputP, this.$refs.input];

      if (!this.questionModel.phone.mask && this.questionModel.phone.isShowAreacode) {
        arr.unshift(this.$refs.inputA);
      }

      if (!this.questionModel.phone.mask && this.questionModel.phone.isShowCountrycode) {
        arr.unshift(this.$refs.inputC);
      }

      return arr;
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/phone/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/phone/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/phone/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "MQZj":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("jkly");

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

/***/ "OARV":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/selectionmatrix/components/Input.vue?vue&type=template&id=00046bc8&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "question-body question-body-scroll",
      class: { "invalid-input-wrapper": !_vm.isValid }
    },
    [
      _c(
        "div",
        { staticClass: "selection-matrix-table" },
        [
          _c(
            "div",
            { staticClass: "selection-matrix-table-top" },
            [
              _c("div", {
                staticClass: "matrix-table-title left-value-buffer"
              }),
              _vm._v(" "),
              _vm._l(_vm.questionModel.selectionmatrix.columns, function(
                column
              ) {
                return _c(
                  "div",
                  { key: column._id, staticClass: "matrix-table-title" },
                  [_vm._v("\n\t\t\t\t" + _vm._s(column.text) + "\n\t\t\t")]
                )
              })
            ],
            2
          ),
          _vm._v(" "),
          _vm._l(_vm.questionModel.selectionmatrix.rows, function(row) {
            return _c(
              "div",
              { key: row._id, staticClass: "selection-matrix-body" },
              [
                _c("div", { staticClass: "selection-matrix-left-value" }, [
                  _vm._v(_vm._s(row.text))
                ]),
                _vm._v(" "),
                _vm._l(_vm.questionModel.selectionmatrix.columns, function(
                  col
                ) {
                  return _c(
                    "div",
                    { key: col._id, staticClass: "selection-matrix-checkbox" },
                    [
                      row.type === "radio"
                        ? _c(
                            "div",
                            [
                              _c("i-radio", {
                                staticClass: "radio form-input-choice",
                                attrs: {
                                  value: col._id,
                                  uncheckable: "",
                                  readonly: _vm.readonly
                                },
                                on: {
                                  change: function($event) {
                                    return _vm.$emit(
                                      "onInput",
                                      _vm.questionModel
                                    )
                                  }
                                },
                                model: {
                                  value: _vm.questionModel.answer[row._id],
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.questionModel.answer,
                                      row._id,
                                      $$v
                                    )
                                  },
                                  expression: "questionModel.answer[row._id]"
                                }
                              })
                            ],
                            1
                          )
                        : _c(
                            "div",
                            [
                              _c("i-checkbox", {
                                staticClass: "checkbox form-input-choice",
                                attrs: { readonly: _vm.readonly },
                                on: {
                                  change: function($event) {
                                    return _vm.$emit(
                                      "onInput",
                                      _vm.questionModel
                                    )
                                  }
                                },
                                model: {
                                  value:
                                    _vm.questionModel.answer[
                                      row._id + "-" + col._id
                                    ],
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.questionModel.answer,
                                      row._id + "-" + col._id,
                                      $$v
                                    )
                                  },
                                  expression:
                                    "questionModel.answer[row._id + '-' + col._id]"
                                }
                              })
                            ],
                            1
                          )
                    ]
                  )
                })
              ],
              2
            )
          })
        ],
        2
      ),
      _vm._v(" "),
      _c("i-question-validation", {
        ref: "input",
        attrs: {
          required: _vm.questionModel.isRequired,
          rules: _vm.formModel.validationRules[_vm.questionModel._id]
        },
        on: {
          validation: function($event) {
            _vm.isValid = $event
          }
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/selectionmatrix/components/Input.vue?vue&type=template&id=00046bc8&scoped=true&

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/selectionmatrix/index.js
var selectionmatrix = __webpack_require__("RQlP");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/selectionmatrix/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'selectionmatrixInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    onChange: Function,
    readonly: Boolean
  },
  data: function data() {
    return {
      isValid: true
    };
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', selectionmatrix["a" /* default */].getDefaultAnswer(this.questionModel));
  }
});
// CONCATENATED MODULE: ./src/questiontypes/selectionmatrix/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/selectionmatrix/components/Input.vue?vue&type=style&index=0&id=00046bc8&scoped=true&lang=scss&
var Inputvue_type_style_index_0_id_00046bc8_scoped_true_lang_scss_ = __webpack_require__("KDOO");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/selectionmatrix/components/Input.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "00046bc8",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/selectionmatrix/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "P+k4":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/fullname/components/Input.vue?vue&type=template&id=66754fc1&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "question-body" }, [
    _c(
      "div",
      { staticClass: "full" },
      [
        _vm.questionModel.fullname.prefix
          ? _c("i-text", {
              ref: "inputP",
              staticClass: "short-input",
              attrs: {
                placeholder: _vm.questionModel.fullname.labels.prefix,
                name: "name-prefix",
                autocomplete: "honorific-prefix",
                noValidationElement: "",
                readonly: _vm.readonly
              },
              on: {
                input: function($event) {
                  return _vm.$emit("onInput", _vm.questionModel)
                },
                focus: function($event) {
                  return _vm.$emit("onFocus", _vm.questionModel)
                },
                validation: _vm.onValidation
              },
              model: {
                value: _vm.questionModel.answer.prefix,
                callback: function($$v) {
                  _vm.$set(_vm.questionModel.answer, "prefix", $$v)
                },
                expression: "questionModel.answer.prefix"
              }
            })
          : _vm._e(),
        _vm._v(" "),
        _c("i-text", {
          ref: "inputN",
          attrs: {
            placeholder: _vm.questionModel.fullname.labels.firstName,
            rules: _vm.validationRules.fn,
            name: "name",
            autocomplete: "given-name",
            noValidationElement: "",
            readonly: _vm.readonly
          },
          on: {
            input: function($event) {
              return _vm.$emit("onInput", _vm.questionModel)
            },
            focus: function($event) {
              return _vm.$emit("onFocus", _vm.questionModel)
            },
            validation: _vm.onValidation
          },
          model: {
            value: _vm.questionModel.answer.firstName,
            callback: function($$v) {
              _vm.$set(_vm.questionModel.answer, "firstName", $$v)
            },
            expression: "questionModel.answer.firstName"
          }
        }),
        _vm._v(" "),
        _vm.questionModel.fullname.middle
          ? _c("i-text", {
              attrs: {
                placeholder: _vm.questionModel.fullname.labels.middle,
                name: "middle-name",
                autocomplete: "additional-name",
                noValidationElement: "",
                readonly: _vm.readonly
              },
              on: {
                input: function($event) {
                  return _vm.$emit("onInput", _vm.questionModel)
                },
                validation: _vm.onValidation
              },
              model: {
                value: _vm.questionModel.answer.middle,
                callback: function($$v) {
                  _vm.$set(_vm.questionModel.answer, "middle", $$v)
                },
                expression: "questionModel.answer.middle"
              }
            })
          : _vm._e(),
        _vm._v(" "),
        _c("i-text", {
          attrs: {
            placeholder: _vm.questionModel.fullname.labels.lastName,
            rules: _vm.validationRules.ln,
            name: "last-name",
            autocomplete: "family-name",
            noValidationElement: "",
            readonly: _vm.readonly
          },
          on: {
            input: function($event) {
              return _vm.$emit("onInput", _vm.questionModel)
            },
            validation: _vm.onValidation
          },
          model: {
            value: _vm.questionModel.answer.lastName,
            callback: function($$v) {
              _vm.$set(_vm.questionModel.answer, "lastName", $$v)
            },
            expression: "questionModel.answer.lastName"
          }
        }),
        _vm._v(" "),
        _vm.questionModel.fullname.suffix
          ? _c("i-text", {
              staticClass: "short-input",
              attrs: {
                placeholder: _vm.questionModel.fullname.labels.suffix,
                name: "name-suffix",
                autocomplete: "honorific-suffix",
                noValidationElement: "",
                readonly: _vm.readonly
              },
              on: {
                input: function($event) {
                  return _vm.$emit("onInput", _vm.questionModel)
                },
                validation: _vm.onValidation
              },
              model: {
                value: _vm.questionModel.answer.suffix,
                callback: function($$v) {
                  _vm.$set(_vm.questionModel.answer, "suffix", $$v)
                },
                expression: "questionModel.answer.suffix"
              }
            })
          : _vm._e()
      ],
      1
    ),
    _vm._v(" "),
    _vm.errorMessage
      ? _c(
          "span",
          {
            staticClass: "helper-text",
            domProps: { innerHTML: _vm._s(_vm.errorMessage) }
          },
          [_c("span", { staticClass: "arrow" })]
        )
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/fullname/components/Input.vue?vue&type=template&id=66754fc1&

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/fullname/index.js
var fullname = __webpack_require__("Msdk");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/fullname/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'fullnameInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    rnd: String,
    readonly: Boolean
  },

  data() {
    return {
      errorMessage: null,
      erroredVmObject: {}
    };
  },

  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', fullname["a" /* default */].getDefaultAnswer(this.questionModel));
  },
  methods: {
    onValidation: function onValidation(isValid, errorMessage, vm) {
      this.erroredVmObject[vm._uid] = errorMessage;

      if (!errorMessage) {
        delete this.erroredVmObject[vm._uid];
      }

      clearTimeout(window.fullnameValidationTimeout);
      window.fullnameValidationTimeout = setTimeout(() => {
        for (var key in this.erroredVmObject) {
          if (this.erroredVmObject[key]) {
            this.errorMessage = this.erroredVmObject[key];
            return;
          }
        }

        this.errorMessage = null;
      }, 10);
    }
  },
  computed: {
    inputs: function inputs() {
      var arr = [this.$refs.inputN, this.$refs.input];

      if (this.questionModel.fullname.prefix) {
        arr.unshift(this.$refs.inputP);
      }

      return arr;
    },
    validationRules: function validationRules() {
      return this.formModel.validationRules[this.questionModel._id];
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/fullname/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/fullname/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/fullname/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "RMwg":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_0a7608b3_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("HwR2");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_0a7608b3_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_0a7608b3_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_0a7608b3_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "Rgzu":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/wysiwyg/components/Input.vue?vue&type=template&id=e0e989f0&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "question-body" }, [
    _c("div", {
      staticClass: "wysiwyg break-word",
      domProps: { innerHTML: _vm._s(_vm.wysiwyg) }
    })
  ])
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/wysiwyg/components/Input.vue?vue&type=template&id=e0e989f0&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.replace.js
var es_string_replace = __webpack_require__("UxlC");

// EXTERNAL MODULE: ./src/helpers/bbcode.js
var bbcode = __webpack_require__("RuLz");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/wysiwyg/components/Input.vue?vue&type=script&lang=js&

//
//
//
//
//
//


/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'seperatorInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object
  },
  computed: {
    wysiwyg: function wysiwyg() {
      // return this.questionModel.wysiwyg.content.split('\n').join('<br />');
      var content = bbcode["a" /* default */].bbcodeToHtml(this.questionModel.wysiwyg.content);
      return content.replace(/<p><\/p>/g, '<br><br>');
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/wysiwyg/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/wysiwyg/components/Input.vue?vue&type=style&index=0&id=e0e989f0&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_e0e989f0_lang_scss_scoped_true_ = __webpack_require__("9psa");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/wysiwyg/components/Input.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "e0e989f0",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/wysiwyg/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "RrnJ":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_25dc9c91_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("ElYF");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_25dc9c91_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_25dc9c91_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_25dc9c91_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "Rs0G":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "Sg/Y":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_585bce40_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("qwAf");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_585bce40_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_585bce40_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_585bce40_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "UAUo":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "VfWq":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/number/components/Input.vue?vue&type=template&id=3fc67b9c&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "question-body" },
    [
      _c("i-text", {
        ref: "input",
        attrs: {
          type: "tel",
          numeric: "",
          "prepend-icon": "sort-numeric-up-alt",
          readonly: _vm.readonly,
          placeholder: _vm.questionModel.placeholder,
          rules: _vm.formModel.validationRules[_vm.questionModel._id]
        },
        on: {
          focusout: _vm.onFocusOut,
          focus: function($event) {
            return _vm.$emit("onFocus", _vm.questionModel)
          },
          input: _vm.onInput
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/number/components/Input.vue?vue&type=template&id=3fc67b9c&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.number.to-fixed.js
var es_number_to_fixed = __webpack_require__("toAj");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.replace.js
var es_string_replace = __webpack_require__("UxlC");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/number/index.js
var number = __webpack_require__("+ZKO");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/number/components/Input.vue?vue&type=script&lang=js&


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'numberInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  methods: {
    onInput: function onInput() {
      this.$emit('onInput', this.questionModel);
    },
    onFocusOut: function onFocusOut() {
      if (this.questionModel.answer) {
        if (this.questionModel.number.decimals && this.questionModel.number.decimals > 0) {
          this.questionModel.answer = this.questionModel.answer.replace(',', '.');
          this.questionModel.answer = Number(this.questionModel.answer).toFixed(this.questionModel.number.decimals);
        }
      }
    }
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', number["a" /* default */].getDefaultAnswer(this.questionModel));
  }
});
// CONCATENATED MODULE: ./src/questiontypes/number/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/number/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/number/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "XSYl":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/fileupload/components/Input.vue?vue&type=template&id=ba743404&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "question-body" },
    [
      _vm.lock ? _c("i-preloader") : _vm._e(),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "fineuploader-wrapper" },
        [
          _c("i-fine-uploader", {
            ref: "fineUploader",
            attrs: {
              options: _vm.options,
              isShowThumbnail: false,
              isShowFileName: true,
              lock: _vm.lock,
              readonly: _vm.readonly,
              submittedFiles: _vm.state.submittedFiles
            },
            on: {
              input: function($event) {
                return _vm.$emit("onInput", _vm.questionModel)
              },
              onInit: _vm.onInit,
              submitted: _vm.submitted,
              onError: _vm.onError,
              remove: _vm.remove,
              complete: _vm.complete
            },
            model: {
              value: _vm.questionModel.answer,
              callback: function($$v) {
                _vm.$set(_vm.questionModel, "answer", $$v)
              },
              expression: "questionModel.answer"
            }
          })
        ],
        1
      ),
      _vm._v(" "),
      _vm.state.submittedFiles.length === 0 &&
      _vm.questionModel &&
      _vm.questionModel.answer &&
      _vm.questionModel.answer.length > 0
        ? _c("i-alert", { attrs: { type: "success" } }, [
            _vm._v(
              "\n\t\t" +
                _vm._s(_vm.questionModel.answer[0].fid) +
                " (" +
                _vm._s(_vm.questionModel.answer[0].t) +
                ")\n\t"
            )
          ])
        : _vm._e(),
      _vm._v(" "),
      !_vm.lock && _vm.errMsg !== null
        ? _c("i-alert", { attrs: { type: "error" } }, [
            _vm._v("\n\t\t" + _vm._s(_vm.errMsg) + "\n\t")
          ])
        : _vm._e(),
      _vm._v(" "),
      _c("i-question-validation", {
        ref: "input",
        attrs: {
          required: _vm.questionModel.isRequired,
          rules: _vm.formModel.validationRules[_vm.questionModel._id]
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/fileupload/components/Input.vue?vue&type=template&id=ba743404&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.index-of.js
var es_array_index_of = __webpack_require__("yXV3");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.splice.js
var es_array_splice = __webpack_require__("pDQq");

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/asyncToGenerator.js
var asyncToGenerator = __webpack_require__("yXPU");
var asyncToGenerator_default = /*#__PURE__*/__webpack_require__.n(asyncToGenerator);

// EXTERNAL MODULE: ./config/prod.js
var prod = __webpack_require__("NRfZ");

// EXTERNAL MODULE: ./src/services/FileService.js
var FileService = __webpack_require__("iAnd");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/fileupload/index.js
var fileupload = __webpack_require__("PgN2");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/fileupload/components/Input.vue?vue&type=script&lang=js&



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'ImageUploadInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    setAppVueVariable: Function,
    readonly: Boolean
  },

  data() {
    var options = {
      request: {
        endpoint: prod["a" /* default */].fileApi + '/uploadanswerfile',
        method: 'POST',
        params: {
          formId: this.formModel._id,
          formSession: this.formModel.uploadSession
        },
        inputName: 'file',
        stopOnFirstInvalidFile: true
      },
      validation: {
        allowedExtensions: this.questionModel.fileUpload.allowedFileTypes
      },
      multiple: false,
      base64: null
    };

    if (this.formModel.state === 'private') {
      options.request.customHeaders = {
        'Authorization': "Bearer ".concat(this.$auth.getToken())
      };
    }

    return {
      options,
      state: {
        submittedFiles: []
      },
      uploader: null,
      errMsg: null,
      createUserCalled: false,
      lock: false
    };
  },

  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', fileupload["a" /* default */].getDefaultAnswer(this.questionModel));
  },
  methods: {
    chooseFile: function chooseFile() {
      this.$refs.fineUploader.chooseFile();
    },
    onInit: function onInit(uploader) {
      this.uploader = uploader;
      this.uploader.on('onValidateBatch', file => {
        if (this.questionModel.fileUpload.allowedFileTypes.length === 0) {
          this.errMsg = this.$t('invalidFileType');
          return false;
        }
      });
    },
    submitted: function submitted(id) {
      this.setAppVueVariable('showMainLoader', true);
      this.lock = true;
      this.errMsg = null;
      this.state.submittedFiles = [id];
      this.$set(this.state, 'submittedFiles', [id]);
    },
    onError: function onError(id, name, errorReason, xhr) {
      if (!xhr) {
        this.errMsg = errorReason;
      }
    },
    complete: function () {
      var _complete = asyncToGenerator_default()(function* (id, name, response) {
        var canvas = this.$refs.fineUploader.$el.querySelector('canvas');

        if (canvas) {
          this.base64 = canvas.toDataURL('image/png');
        }

        var afterProcessUnlock = true;

        if (response) {
          if (this.questionModel.fileupload && this.questionModel.fileupload.defaultValue) {
            this.questionModel.fileupload.defaultValue = [];
          }

          var hasError = true;

          if (response.fileId) {
            if (this.formModel.answerFiles === null || this.formModel.answerFiles === undefined) {
              this.formModel.answerFiles = [];
            } // console.log(response.fileSize);
            // console.log('this.questionModel.answer', this.questionModel.answer);


            if (this.questionModel.answer && this.questionModel.answer.length > 0 && this.questionModel.answer[0].fid !== '') {
              var fileIndex = this.formModel.answerFiles.indexOf(this.questionModel.answer[0].fid);

              if (fileIndex > -1) {
                this.formModel.answerFiles.splice(fileIndex, 1);
              }
            }

            this.questionModel.answer = [{
              fid: response.fileId,
              t: response.fileType,
              s: response.fileSize
            }];
            this.formModel.answerFiles.push(response.fileId);
            this.formModel.uploadSession = response.formSession;
            this.uploader.methods._options.request.params.formSession = this.formModel.uploadSession;
            hasError = false;
            this.$emit('onInput', this.questionModel);
          } else if (response.errorCode && response.errorCode === 2) {
            // user Not Found
            if (!this.createUserCalled) {
              var userCreated = yield FileService["a" /* default */].CreateUserByForm(this.formModel._id);

              if (userCreated) {
                this.uploader.methods.retry(id);
                afterProcessUnlock = false;
                hasError = false;
              }
            }

            this.createUserCalled = true;
          } else if (response.error) {
            this.errMsg = response.error;
          } else {
            this.errMsg = this.$root.$t('notification.anErrorOccurred');
          }

          if (hasError) {
            this.state.submittedFiles = [];
            this.$set(this.state, 'submittedFiles', []);
          }

          if (afterProcessUnlock) {
            this.lock = false;
            this.setAppVueVariable('showMainLoader', false);
          }
        }
      });

      function complete(_x, _x2, _x3) {
        return _complete.apply(this, arguments);
      }

      return complete;
    }(),
    remove: function remove(fileIndex) {
      this.formModel.answerFiles.splice(fileIndex, 1);
      this.questionModel.answer = [];
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/fileupload/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/fileupload/components/Input.vue?vue&type=style&index=0&id=ba743404&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_ba743404_lang_scss_scoped_true_ = __webpack_require__("/V8r");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/fileupload/components/Input.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "ba743404",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/fileupload/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "Xdr2":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/grid/components/Input.vue?vue&type=template&id=7be1ef15&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "question-body" }, [
    _c(
      "div",
      { staticClass: "full grid-scroll" },
      [
        _vm._l(_vm.questionModel.answer, function(rowAnswer, rowIndex) {
          return _c(
            "div",
            { key: rowIndex, staticClass: "grid-table" },
            [
              _c("i-button", {
                staticClass: "remove-grid",
                style: rowIndex > 0 ? "margin-top: -15px" : "",
                attrs: {
                  disabled:
                    rowIndex == 0 && _vm.questionModel.answer.length == 1,
                  "prepend-icon": "trash"
                },
                on: {
                  click: function($event) {
                    rowIndex != 0 || _vm.questionModel.answer.length != 1
                      ? _vm.onClickRemoveRow(rowIndex)
                      : null
                  }
                }
              }),
              _vm._v(" "),
              _vm._l(_vm.questionModel.grid.columns, function(column, key) {
                return _c("div", { key: key }, [
                  column.type === "text"
                    ? _c(
                        "div",
                        { staticClass: "grid-column" },
                        [
                          rowIndex == 0
                            ? _c("h4", { staticClass: "grid-column-title" }, [
                                _vm._v(_vm._s(column.name)),
                                column.required
                                  ? _c(
                                      "span",
                                      {
                                        staticClass:
                                          "grid-column-title-required"
                                      },
                                      [_vm._v(" *")]
                                    )
                                  : _vm._e()
                              ])
                            : _vm._e(),
                          _vm._v(" "),
                          _c("i-text", {
                            staticClass: "input grid-type",
                            attrs: {
                              "prepend-icon": "text",
                              readonly: _vm.readonly,
                              rules:
                                _vm.formModel.validationRules[
                                  _vm.questionModel._id
                                ][column._id]
                            },
                            on: {
                              input: function($event) {
                                return _vm.$emit("onInput", _vm.questionModel)
                              },
                              focus: function($event) {
                                return _vm.$emit("onFocus", _vm.questionModel)
                              }
                            },
                            model: {
                              value: rowAnswer[column._id],
                              callback: function($$v) {
                                _vm.$set(rowAnswer, column._id, $$v)
                              },
                              expression: "rowAnswer[column._id]"
                            }
                          })
                        ],
                        1
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  column.type === "date"
                    ? _c(
                        "div",
                        { staticClass: "grid-column" },
                        [
                          rowIndex == 0
                            ? _c("h4", { staticClass: "grid-column-title" }, [
                                _vm._v(_vm._s(column.name)),
                                column.required
                                  ? _c(
                                      "span",
                                      {
                                        staticClass:
                                          "grid-column-title-required"
                                      },
                                      [_vm._v(" *")]
                                    )
                                  : _vm._e()
                              ])
                            : _vm._e(),
                          _vm._v(" "),
                          _c("IMaskedText", {
                            attrs: {
                              mask: _vm.maskPattern,
                              "prepend-icon": "calendar",
                              placeholder: "dd/mm/yyyy",
                              required: column.required,
                              readonly: _vm.readonly,
                              rules:
                                _vm.formModel.validationRules[
                                  _vm.questionModel._id
                                ][column._id]
                            },
                            on: {
                              input: function($event) {
                                return _vm.$emit("onInput", _vm.questionModel)
                              },
                              focus: function($event) {
                                return _vm.$emit("onFocus", _vm.questionModel)
                              }
                            },
                            model: {
                              value: rowAnswer[column._id],
                              callback: function($$v) {
                                _vm.$set(rowAnswer, column._id, $$v)
                              },
                              expression: "rowAnswer[column._id]"
                            }
                          })
                        ],
                        1
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  column.type === "number"
                    ? _c(
                        "div",
                        { staticClass: "grid-column" },
                        [
                          rowIndex == 0
                            ? _c("h4", { staticClass: "grid-column-title" }, [
                                _vm._v(_vm._s(column.name)),
                                column.required
                                  ? _c(
                                      "span",
                                      {
                                        staticClass:
                                          "grid-column-title-required"
                                      },
                                      [_vm._v(" *")]
                                    )
                                  : _vm._e()
                              ])
                            : _vm._e(),
                          _vm._v(" "),
                          _c("i-text", {
                            staticClass: "grid-type",
                            attrs: {
                              type: "number",
                              "prepend-icon": "sort-numeric-up-alt",
                              "data-column": column._id,
                              readonly: _vm.readonly,
                              rules:
                                _vm.formModel.validationRules[
                                  _vm.questionModel._id
                                ][column._id]
                            },
                            on: {
                              input: function($event) {
                                return _vm.$emit("onInput", _vm.questionModel)
                              },
                              focus: function($event) {
                                return _vm.$emit("onFocus", _vm.questionModel)
                              },
                              change: function($event) {
                                return _vm.onNumberColumnChange(
                                  rowIndex,
                                  column._id
                                )
                              }
                            },
                            model: {
                              value: rowAnswer[column._id],
                              callback: function($$v) {
                                _vm.$set(rowAnswer, column._id, $$v)
                              },
                              expression: "rowAnswer[column._id]"
                            }
                          })
                        ],
                        1
                      )
                    : _vm._e()
                ])
              })
            ],
            2
          )
        }),
        _vm._v(" "),
        _c("div", { staticClass: "grid-footer" }, [
          _c(
            "div",
            { staticClass: "grid-footer-container input" },
            _vm._l(_vm.questionModel.grid.columns, function(column, key) {
              return _c("div", { key: key }, [
                column.type === "text" || column.type === "date"
                  ? _c("div", { staticClass: "grid-column grid-type" })
                  : _vm._e(),
                _vm._v(" "),
                column.type === "number" && column.sumOption
                  ? _c("div", { staticClass: "grid-column grid-type" }, [
                      _c(
                        "h4",
                        {
                          staticClass: "grid-column-title",
                          attrs: { id: column._id }
                        },
                        [_vm._v(_vm._s(_vm.$t("total")) + ": 0")]
                      )
                    ])
                  : _vm._e()
              ])
            }),
            0
          )
        ])
      ],
      2
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "add-grid-content" },
      [
        _c(
          "i-button",
          {
            staticClass: "grid-add-button",
            on: {
              click: function($event) {
                !_vm.readonly && _vm.onClickAddRow()
              }
            }
          },
          [_c("i-icon", { attrs: { icon: "plus" } })],
          1
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/grid/components/Input.vue?vue&type=template&id=7be1ef15&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.splice.js
var es_array_splice = __webpack_require__("pDQq");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.promise.js
var es_promise = __webpack_require__("5s+n");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/grid/index.js
var grid = __webpack_require__("ewUQ");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/grid/components/Input.vue?vue&type=script&lang=js&


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'gridInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  components: {
    IMaskedText: () => __webpack_require__.e(/* import() | imaskedtext */ 148).then(__webpack_require__.bind(null, "C8wv"))
  },
  data: function data() {
    var timePattern = '##/##/####';
    var maskPattern = {
      pattern: timePattern,
      formatCharacters: {
        '#': {
          validate: char => /^[0-9]$/.test(char)
        }
      }
    };
    return {
      maskPattern: maskPattern
    };
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    var defaultValue = grid["a" /* default */].getDefaultAnswer(this.questionModel);
    this.$set(this.questionModel, 'answer', defaultValue);

    if (defaultValue.length === 0) {
      this.addRowToAnswer();
    } else {
      this.refreshColumnsSum();
    }
  },
  methods: {
    onClickRemoveRow: function onClickRemoveRow(index) {
      this.questionModel.answer.splice(index, 1);
      this.refreshColumnsSum();
    },
    addRowToAnswer: function addRowToAnswer() {
      var answer = {};
      this.questionModel.grid.columns.forEach(column => {
        answer[column._id] = '';
      });
      this.questionModel.answer.push(answer);
    },
    onClickAddRow: function onClickAddRow() {
      this.addRowToAnswer();
    },
    onNumberColumnChange: function onNumberColumnChange(rowId, columnId) {
      var column = this.questionModel.grid.columns.find(x => x._id === columnId);

      if (column && column.sumOption) {
        this.calculateColumn(columnId);
      }
    },
    refreshColumnsSum: function refreshColumnsSum() {
      setTimeout(() => {
        this.questionModel.grid.columns.forEach(column => {
          if (column.type === 'number' && column.sumOption) {
            this.calculateColumn(column._id);
          }
        });
      }, 10);
    },
    calculateColumn: function calculateColumn(columnId) {
      var sum = 0;
      var columns = document.querySelectorAll('[data-column="' + columnId + '"]');

      for (var i = 0; i < columns.length; i++) {
        var input = columns[i].getElementsByTagName('input')[0];

        if (input.value) {
          sum += parseFloat(input.value);
        }
      }

      document.getElementById(columnId).innerHTML = this.$t('total') + ': ' + sum;
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/grid/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/grid/components/Input.vue?vue&type=style&index=0&lang=scss&
var Inputvue_type_style_index_0_lang_scss_ = __webpack_require__("Z4o4");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/grid/components/Input.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/grid/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "Y28m":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/payment/components/Input.vue?vue&type=template&id=babf16a2&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "question-body" }, [
    _c(
      "div",
      { staticClass: "full wrap" },
      [
        !_vm.formRelatedQuestion
          ? [
              _c("div", { staticClass: "payment-total" }, [
                !_vm.questionModel.payment.canAmountBeEnter
                  ? _c("h4", [
                      _vm._v(
                        "\n\t\t\t\t\t" +
                          _vm._s(_vm.$t("questionTypes.payment.paymentTotal")) +
                          ": " +
                          _vm._s(_vm.questionModel.answer.amount) +
                          _vm._s(
                            _vm.currencySymbol(
                              _vm.questionModel.answer.currency
                            )
                          ) +
                          "\n\t\t\t\t"
                      )
                    ])
                  : _c(
                      "div",
                      [
                        _c("h4", [
                          _vm._v(
                            "\n\t\t\t\t\t\t" +
                              _vm._s(
                                _vm.$t("questionTypes.payment.paymentTotal")
                              ) +
                              " (" +
                              _vm._s(
                                _vm.currencySymbol(
                                  _vm.questionModel.payment.currency
                                )
                              ) +
                              ")\n\t\t\t\t\t"
                          )
                        ]),
                        _vm._v(" "),
                        _c("i-text", {
                          attrs: {
                            "prepend-icon": "money-bill",
                            rules:
                              _vm.formModel.validationRules[
                                _vm.questionModel._id
                              ].amount,
                            required: true
                          },
                          model: {
                            value: _vm.questionModel.answer.amount,
                            callback: function($$v) {
                              _vm.$set(_vm.questionModel.answer, "amount", $$v)
                            },
                            expression: "questionModel.answer.amount"
                          }
                        })
                      ],
                      1
                    )
              ])
            ]
          : _vm._e(),
        _vm._v(" "),
        _vm.questionModel.payment.testmode &&
        _vm.questionModel.answer.gateway !== "wirecard"
          ? _c(
              "div",
              { staticClass: "payment-gateway-select-item-wrapper" },
              [
                _c("i-alert", { attrs: { type: "warning" } }, [
                  _c("span", [
                    _vm._v(_vm._s(_vm.$t("questionTypes.payment.testmode")))
                  ])
                ])
              ],
              1
            )
          : _vm._e(),
        _vm._v(" "),
        _c("div", { staticClass: "payment-gateway-wrapper" }, [
          _vm.activeGateways.length > 1
            ? _c(
                "div",
                { staticClass: "payment-gateway-select-items" },
                _vm._l(_vm.activeGateways, function(activeGateway) {
                  return _c("componentselectitem" + activeGateway, {
                    key: activeGateway,
                    ref: "component",
                    refInFor: true,
                    tag: "component",
                    class: {
                      activegateway:
                        _vm.questionModel.answer.gateway === activeGateway
                    },
                    attrs: {
                      questionModel: _vm.questionModel,
                      readonly: _vm.readonly
                    },
                    on: { click: _vm.gatewayItemClick }
                  })
                }),
                1
              )
            : _vm._e()
        ]),
        _vm._v(" "),
        _vm.activeGateways.length > 0 && _vm.questionModel.answer.gateway
          ? _c(
              "div",
              { staticClass: "payment-gateway-select-item-wrapper" },
              [
                _c("componentinput" + _vm.questionModel.answer.gateway, {
                  ref: "component",
                  tag: "component",
                  staticClass: "activegateway single",
                  attrs: {
                    questionModel: _vm.questionModel,
                    readonly: _vm.readonly,
                    formModel: _vm.formModel,
                    singleGateway: _vm.activeGateways.length === 1
                  }
                })
              ],
              1
            )
          : _vm._e()
      ],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/payment/components/Input.vue?vue&type=template&id=babf16a2&

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/defineProperty.js
var defineProperty = __webpack_require__("lSNA");
var defineProperty_default = /*#__PURE__*/__webpack_require__.n(defineProperty);

// EXTERNAL MODULE: ./src/questiontypes/payment/paymentgatewaytypes/index.js
var paymentgatewaytypes = __webpack_require__("ywtq");
var paymentgatewaytypes_default = /*#__PURE__*/__webpack_require__.n(paymentgatewaytypes);

// EXTERNAL MODULE: ./config/prod.js
var prod = __webpack_require__("NRfZ");

// EXTERNAL MODULE: ./src/enums/currencyenums.js
var currencyenums = __webpack_require__("4B8W");
var currencyenums_default = /*#__PURE__*/__webpack_require__.n(currencyenums);

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/payment/index.js
var payment = __webpack_require__("+FQH");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/payment/components/Input.vue?vue&type=script&lang=js&


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { defineProperty_default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






var components = _objectSpread({}, paymentgatewaytypes_default.a.SelectItemComponents, {}, paymentgatewaytypes_default.a.InputComponents);

/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'paymentInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  components: components,
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  methods: {
    getRedirectUrls: function getRedirectUrls() {
      return {
        successUrl: prod["a" /* default */].baseUrl + window.location.pathname + '?resultaction=paymentsuccess',
        cancelUrl: prod["a" /* default */].baseUrl + window.location.pathname + '?resultaction=paymentcancel'
      };
    },
    currencySymbol: function currencySymbol(currency) {
      var currencyEnum = currencyenums_default.a[currency];

      if (!currencyEnum) {
        return currency;
      }

      return currencyEnum.symbol;
    },
    gatewayItemClick: function gatewayItemClick(gateway) {
      if (this.readonly) {
        return;
      }

      this.questionModel.answer.gateway = gateway;
      this.$emit('onInput', this.questionModel);
    }
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', payment["a" /* default */].getDefaultAnswer(this.questionModel));
    this.$emit('onInput', this.questionModel);
  },
  computed: {
    activeGateways: function activeGateways() {
      var rtnObj = [];

      for (var gateway in this.questionModel.payment.gateways) {
        var val = this.questionModel.payment.gateways[gateway];

        if (val) {
          rtnObj.push(gateway);
        }
      }

      var found = rtnObj.find(g => g === this.questionModel.payment.defaultGateway);

      if (!found) {
        this.questionModel.payment.defaultGateway = rtnObj[0];
      }

      return rtnObj;
    },
    formRelatedQuestion: function formRelatedQuestion() {
      var rtnObj;

      if (this.questionModel.payment.relatedQuestionId) {
        rtnObj = this.formModel.questions.find(x => x._id === this.questionModel.payment.relatedQuestionId);
      }

      return rtnObj;
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/payment/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/payment/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/payment/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "Z4o4":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("MQZj");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "Zkex":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/termsandconditions/components/Input.vue?vue&type=template&id=0a7608b3&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _vm.questionModel.termsandconditions.showQuestionTitle
      ? _c("div", { staticClass: "question-info" }, [
          _vm.questionModel.viewHelpers &&
          !_vm.formModel.baseSettings.hideQuestionNumber
            ? _c("span", { staticClass: "question-order" }, [
                _vm._v(
                  _vm._s(_vm.questionModel.viewHelpers.questionNumber) + "."
                )
              ])
            : _vm._e(),
          _vm._v(" "),
          _c("div", { staticClass: "question-title-wrapper" }, [
            _c(
              "p",
              {
                ref: "questionInput",
                staticClass: "question-title editable-input view"
              },
              [
                _vm._v(
                  "\n\t\t\t\t" + _vm._s(_vm.questionModel.question) + "\n\t\t\t"
                )
              ]
            ),
            _vm._v(" "),
            _vm.questionModel.description
              ? _c(
                  "p",
                  {
                    staticClass: "question-description editable-input view",
                    attrs: { placeholder: _vm.$t("description") }
                  },
                  [
                    _vm._v(
                      "\n\t\t\t\t" +
                        _vm._s(_vm.questionModel.description) +
                        "\n\t\t\t"
                    )
                  ]
                )
              : _vm._e()
          ])
        ])
      : _vm._e(),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "question-body",
        class: { "invalid-input-wrapper": !_vm.isValid }
      },
      [
        _c(
          "i-checkbox",
          {
            staticClass: "terms-checkbox",
            attrs: { "show-control": "", readonly: _vm.readonly },
            on: {
              change: function($event) {
                return _vm.$emit("onInput", _vm.questionModel)
              }
            },
            model: {
              value: _vm.questionModel.answer,
              callback: function($$v) {
                _vm.$set(_vm.questionModel, "answer", $$v)
              },
              expression: "questionModel.answer"
            }
          },
          [
            _c(
              "div",
              { staticClass: "t-and-c-label" },
              [
                _vm._v(
                  _vm._s(
                    _vm.questionModel.termsandconditions.label.beforeLinkedText
                  ) + "\n\t\t\t\t"
                ),
                _c(
                  "i-button",
                  { attrs: { naked: "" }, on: { click: _vm.openTerms } },
                  [
                    _vm._v(
                      "\n\t\t\t\t\t" +
                        _vm._s(
                          _vm.questionModel.termsandconditions.label.linkedText
                        ) +
                        "\n\t\t\t\t"
                    )
                  ]
                ),
                _vm._v(
                  "\n\t\t\t\t" +
                    _vm._s(
                      _vm.questionModel.termsandconditions.label.afterLinkedText
                    ) +
                    "\n\t\t\t"
                )
              ],
              1
            )
          ]
        ),
        _vm._v(" "),
        _c("i-question-validation", {
          ref: "input",
          attrs: {
            required: _vm.questionModel.isRequired,
            rules: _vm.formModel.validationRules[_vm.questionModel._id]
          },
          on: {
            validation: function($event) {
              _vm.isValid = $event
            }
          },
          model: {
            value: _vm.questionModel.answer,
            callback: function($$v) {
              _vm.$set(_vm.questionModel, "answer", $$v)
            },
            expression: "questionModel.answer"
          }
        })
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/termsandconditions/components/Input.vue?vue&type=template&id=0a7608b3&scoped=true&

// EXTERNAL MODULE: ./src/questiontypes/termsandconditions/TermsAndConditionsMixin.js
var TermsAndConditionsMixin = __webpack_require__("+e7p");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/termsandconditions/index.js
var termsandconditions = __webpack_require__("wYly");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/termsandconditions/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'termsAndConditionsInput',
  mixins: [TermsAndConditionsMixin["a" /* default */], questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  data: function data() {
    return {
      isValid: true
    };
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', termsandconditions["a" /* default */].getDefaultAnswer(this.questionModel));
  }
});
// CONCATENATED MODULE: ./src/questiontypes/termsandconditions/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/termsandconditions/components/Input.vue?vue&type=style&index=0&id=0a7608b3&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_0a7608b3_lang_scss_scoped_true_ = __webpack_require__("RMwg");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/termsandconditions/components/Input.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "0a7608b3",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/termsandconditions/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "aG8o":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "b3Fc":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/text/components/Input.vue?vue&type=template&id=27853b8e&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "question-body" },
    [
      _c("componentinput" + _vm.questionModel.text.subType, {
        ref: "component",
        tag: "component",
        attrs: {
          questionModel: _vm.questionModel,
          readonly: _vm.readonly,
          formModel: _vm.formModel
        },
        on: {
          onInput: function($event) {
            return _vm.$emit("onInput", _vm.questionModel)
          },
          onFocus: function($event) {
            return _vm.$emit("onFocus", _vm.questionModel)
          }
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/text/components/Input.vue?vue&type=template&id=27853b8e&

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/text/subtypes/longtext/components/Input.vue?vue&type=template&id=314db79e&
var Inputvue_type_template_id_314db79e_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("i-text", {
    ref: "input",
    attrs: {
      textarea: "",
      required: _vm.questionModel.isRequired,
      "prepend-icon": "align-left",
      readonly: _vm.readonly,
      placeholder: _vm.questionModel.placeholder,
      characterCounter: _vm.characterCounter,
      rules: _vm.formModel.validationRules[_vm.questionModel._id]
    },
    on: {
      input: function($event) {
        return _vm.$emit("onInput", _vm.questionModel)
      },
      focus: function($event) {
        return _vm.$emit("onFocus", _vm.questionModel)
      },
      keydown: function($event) {
        if (
          !$event.type.indexOf("key") &&
          _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
        ) {
          return null
        }
        if (
          $event.ctrlKey ||
          $event.shiftKey ||
          $event.altKey ||
          $event.metaKey
        ) {
          return null
        }
        return _vm.pressEnter($event)
      }
    },
    model: {
      value: _vm.questionModel.answer,
      callback: function($$v) {
        _vm.$set(_vm.questionModel, "answer", $$v)
      },
      expression: "questionModel.answer"
    }
  })
}
var Inputvue_type_template_id_314db79e_staticRenderFns = []
Inputvue_type_template_id_314db79e_render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/longtext/components/Input.vue?vue&type=template&id=314db79e&

// EXTERNAL MODULE: ./src/questiontypes/text/index.js
var questiontypes_text = __webpack_require__("Tned");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/text/subtypes/longtext/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'longtextInput',
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },

  data() {
    return {
      characterCounter: false,
      errorMessages: []
    };
  },

  created: function created() {
    if (this.questionModel.text.maxLength && this.questionModel.text.maxLength > 0) {
      this.characterCounter = this.questionModel.text.maxLength;
    }

    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', questiontypes_text["a" /* default */].getDefaultAnswer(this.questionModel));
  },
  methods: {
    validate: function validate() {
      var validations = this.formModel.validationRules[this.questionModel._id];
      this.errorMessages = [];

      for (var i = 0; i < validations.length; i++) {
        var result = validations[i](this.$refs.input.value);

        if (result !== true) {
          this.errorMessages.push(result);
          break;
        }
      }
    },
    pressEnter: function pressEnter(e) {
      e.preventDefault();
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/longtext/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/longtext/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  Inputvue_type_template_id_314db79e_render,
  Inputvue_type_template_id_314db79e_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/text/subtypes/longtext/components/Input.vue"
/* harmony default export */ var Input = (component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/text/subtypes/maskedtext/components/Input.vue?vue&type=template&id=33c9f4af&
var Inputvue_type_template_id_33c9f4af_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return !_vm.questionModel.text.regexValidation &&
    _vm.questionModel.text.maskPattern &&
    _vm.questionModel.text.maskPattern.trim() !== ""
    ? _c("IMaskedText", {
        ref: "input",
        attrs: {
          mask: _vm.maskPattern,
          placeholder:
            _vm.questionModel.placeholder &&
            _vm.questionModel.placeholder !== "" &&
            _vm.questionModel.placeholder !== _vm.questionModel.question
              ? _vm.questionModel.placeholder
              : _vm.questionModel.text.maskPattern,
          "prepend-icon": "mask",
          readonly: _vm.readonly,
          rules: _vm.formModel.validationRules[_vm.questionModel._id],
          required: _vm.questionModel.isRequired
        },
        on: {
          input: function($event) {
            return _vm.$emit("onInput", _vm.questionModel)
          },
          focus: function($event) {
            return _vm.$emit("onFocus", _vm.questionModel)
          }
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
    : _c("i-text", {
        ref: "input",
        attrs: {
          "prepend-icon": "mask",
          readonly: _vm.readonly,
          placeholder: _vm.questionModel.placeholder,
          rules: _vm.formModel.validationRules[_vm.questionModel._id],
          required: _vm.questionModel.isRequired
        },
        on: {
          input: function($event) {
            return _vm.$emit("onInput", _vm.questionModel)
          },
          focus: function($event) {
            return _vm.$emit("onFocus", _vm.questionModel)
          }
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
}
var Inputvue_type_template_id_33c9f4af_staticRenderFns = []
Inputvue_type_template_id_33c9f4af_render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/maskedtext/components/Input.vue?vue&type=template&id=33c9f4af&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.promise.js
var es_promise = __webpack_require__("5s+n");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.replace.js
var es_string_replace = __webpack_require__("UxlC");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/text/subtypes/maskedtext/components/Input.vue?vue&type=script&lang=js&


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var maskedtext_components_Inputvue_type_script_lang_js_ = ({
  name: 'maskedtextInput',
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  components: {
    IMaskedText: () => __webpack_require__.e(/* import() | imaskedtext */ 148).then(__webpack_require__.bind(null, "C8wv"))
  },
  data: function data() {
    var maskPattern = {
      pattern: this.questionModel.text.maskPattern ? this.questionModel.text.maskPattern.replace(/1/g, '\\1') : undefined,
      formatCharacters: {
        '@': {
          validate: char => /^[A-Za-zА-Яа-яğüşöçİĞÜŞÖÇ]$/.test(char)
        },
        '#': {
          validate: char => /^[0-9]$/.test(char),
          transform: char => char.toUpperCase()
        },
        '*': {
          validate: () => true
        }
      }
    };
    return {
      maskPattern: maskPattern
    };
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', questiontypes_text["a" /* default */].getDefaultAnswer(this.questionModel));
  }
});
// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/maskedtext/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var subtypes_maskedtext_components_Inputvue_type_script_lang_js_ = (maskedtext_components_Inputvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/maskedtext/components/Input.vue





/* normalize component */

var Input_component = Object(componentNormalizer["a" /* default */])(
  subtypes_maskedtext_components_Inputvue_type_script_lang_js_,
  Inputvue_type_template_id_33c9f4af_render,
  Inputvue_type_template_id_33c9f4af_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var Input_api; }
Input_component.options.__file = "src/questiontypes/text/subtypes/maskedtext/components/Input.vue"
/* harmony default export */ var components_Input = (Input_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/text/subtypes/shorttext/components/Input.vue?vue&type=template&id=19cfc6c0&
var Inputvue_type_template_id_19cfc6c0_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("i-text", {
    ref: "input",
    staticClass: "input",
    attrs: {
      "prepend-icon": "text",
      readonly: _vm.readonly,
      required: _vm.questionModel.isRequired,
      placeholder: _vm.questionModel.placeholder,
      characterCounter: _vm.characterCounter,
      rules: _vm.formModel.validationRules[_vm.questionModel._id]
    },
    on: {
      input: function($event) {
        return _vm.$emit("onInput", _vm.questionModel)
      },
      focus: function($event) {
        return _vm.$emit("onFocus", _vm.questionModel)
      }
    },
    model: {
      value: _vm.questionModel.answer,
      callback: function($$v) {
        _vm.$set(_vm.questionModel, "answer", $$v)
      },
      expression: "questionModel.answer"
    }
  })
}
var Inputvue_type_template_id_19cfc6c0_staticRenderFns = []
Inputvue_type_template_id_19cfc6c0_render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/shorttext/components/Input.vue?vue&type=template&id=19cfc6c0&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/text/subtypes/shorttext/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var shorttext_components_Inputvue_type_script_lang_js_ = ({
  name: 'shorttextInput',
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },

  data() {
    return {
      characterCounter: false
    };
  },

  created: function created() {
    if (this.questionModel.text.maxLength && this.questionModel.text.maxLength > 0) {
      this.characterCounter = this.questionModel.text.maxLength;
    }

    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', questiontypes_text["a" /* default */].getDefaultAnswer(this.questionModel));
  }
});
// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/shorttext/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var subtypes_shorttext_components_Inputvue_type_script_lang_js_ = (shorttext_components_Inputvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/shorttext/components/Input.vue





/* normalize component */

var components_Input_component = Object(componentNormalizer["a" /* default */])(
  subtypes_shorttext_components_Inputvue_type_script_lang_js_,
  Inputvue_type_template_id_19cfc6c0_render,
  Inputvue_type_template_id_19cfc6c0_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var components_Input_api; }
components_Input_component.options.__file = "src/questiontypes/text/subtypes/shorttext/components/Input.vue"
/* harmony default export */ var shorttext_components_Input = (components_Input_component.exports);
// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/text/components/Input.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ var text_components_Inputvue_type_script_lang_js_ = ({
  name: 'textInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  components: {
    componentinputlongtext: Input,
    componentinputmaskedtext: components_Input,
    componentinputshorttext: shorttext_components_Input
  },
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  }
});
// CONCATENATED MODULE: ./src/questiontypes/text/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var questiontypes_text_components_Inputvue_type_script_lang_js_ = (text_components_Inputvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/questiontypes/text/components/Input.vue





/* normalize component */

var text_components_Input_component = Object(componentNormalizer["a" /* default */])(
  questiontypes_text_components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var text_components_Input_api; }
text_components_Input_component.options.__file = "src/questiontypes/text/components/Input.vue"
/* harmony default export */ var text_components_Input = __webpack_exports__["default"] = (text_components_Input_component.exports);

/***/ }),

/***/ "b40O":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("oWv1");

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

/***/ "dXNZ":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "g/Hh":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/imagecontent/components/Input.vue?vue&type=template&id=32dd639d&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "question-body",
      class: _vm.questionModel.media ? _vm.questionModel.media.align : ""
    },
    [
      _c("img", {
        directives: [
          {
            name: "lazy",
            rawName: "v-lazy",
            value: _vm.image,
            expression: "image"
          }
        ],
        staticClass: "cc-image-content",
        style: { width: _vm.size },
        attrs: { alt: "formbuilder" },
        on: { load: _vm.load }
      })
    ]
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/imagecontent/components/Input.vue?vue&type=template&id=32dd639d&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.index-of.js
var es_array_index_of = __webpack_require__("yXV3");

// EXTERNAL MODULE: ./config/prod.js
var prod = __webpack_require__("NRfZ");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/imagecontent/components/Input.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//


var noImage = '/static/img/no-image.png';
/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'imagecontentInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object
  },
  data: function data() {
    return {
      size: ''
    };
  },
  methods: {
    load: function load(e) {
      if (e && e.target && e.target.src) {
        if (e.target.src.indexOf('img-loader.svg') === -1) {
          this.size = this.questionModel.media ? Number(this.questionModel.media.size) + '%' : '';
        }
      }
    }
  },
  computed: {
    image: function image() {
      if (this.questionModel.media) {
        if (this.formModel.formTempFiles && this.formModel.formTempFiles[this.questionModel.media.fileId]) {
          return prod["a" /* default */].fileApi + '/tempfile/' + this.formModel._id + '/' + this.questionModel.media.fileId;
        }

        return this.questionModel.media.imageUrl || prod["a" /* default */].fileApi + '/formfile/' + this.formModel._id + '/' + this.questionModel.media.fileId;
      } else if (this.questionModel.imageContent) {
        if (this.questionModel.imageContent.externalFileUrl) {
          return this.questionModel.imageContent.externalFileUrl;
        } else if (this.questionModel.imageContent.fileId) {
          return prod["a" /* default */].fileApi + '/formfile/' + this.formModel._id + '/' + this.questionModel.imageContent.fileId;
        }
      }

      return noImage;
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/imagecontent/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/questiontypes/imagecontent/components/Input.vue?vue&type=style&index=0&id=32dd639d&lang=scss&scoped=true&
var Inputvue_type_style_index_0_id_32dd639d_lang_scss_scoped_true_ = __webpack_require__("IEG2");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/imagecontent/components/Input.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "32dd639d",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/imagecontent/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "hI29":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "iL1J":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_5654b24c_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("9yKF");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_5654b24c_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_5654b24c_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_5654b24c_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "jKjR":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_a055ab2a_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("JGYg");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_a055ab2a_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_a055ab2a_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Input_vue_vue_type_style_index_0_id_a055ab2a_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "jalr":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/time/components/Input.vue?vue&type=template&id=0593f1ee&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "question-body" },
    [
      _c("IMaskedText", {
        ref: "input",
        attrs: {
          mask: _vm.maskPattern,
          placeholder: _vm.placeholder,
          readonly: _vm.readonly,
          "prepend-icon": "clock",
          rules: _vm.formModel.validationRules[_vm.questionModel._id],
          required: _vm.questionModel.isRequired
        },
        on: {
          input: function($event) {
            return _vm.$emit("onInput", _vm.questionModel)
          },
          focus: function($event) {
            return _vm.$emit("onFocus", _vm.questionModel)
          }
        },
        model: {
          value: _vm.questionModel.answer,
          callback: function($$v) {
            _vm.$set(_vm.questionModel, "answer", $$v)
          },
          expression: "questionModel.answer"
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/time/components/Input.vue?vue&type=template&id=0593f1ee&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.promise.js
var es_promise = __webpack_require__("5s+n");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.replace.js
var es_string_replace = __webpack_require__("UxlC");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/time/index.js
var time = __webpack_require__("ga8e");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/time/components/Input.vue?vue&type=script&lang=js&


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'timeInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  components: {
    IMaskedText: () => __webpack_require__.e(/* import() | imaskedtext */ 148).then(__webpack_require__.bind(null, "C8wv"))
  },
  data: function data() {
    var timePattern = '##:##';
    var maskPattern = {
      pattern: timePattern.replace(/1/g, '\\1'),
      formatCharacters: {
        '@': {
          validate: char => /^[A-Za-zА-Яа-яğüşöçİĞÜŞÖÇ]$/.test(char)
        },
        '#': {
          validate: char => /^[0-9]$/.test(char),
          transform: char => char.toUpperCase()
        },
        '*': {
          validate: () => true
        }
      }
    };
    return {
      maskPattern: maskPattern,
      placeholder: this.questionModel.placeholder || 'HH:MM'
    };
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', time["a" /* default */].getDefaultAnswer(this.questionModel));
  }
});
// CONCATENATED MODULE: ./src/questiontypes/time/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/time/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/time/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "jkly":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "mMVR":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/date/components/Input.vue?vue&type=template&id=2c4448a6&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "question-body" },
    [
      _c("IDatePicker", {
        ref: "input",
        attrs: {
          readonly: _vm.readonly,
          firstDayOfWeek: 2,
          culture: _vm.culture,
          "prepend-icon": "calendar",
          required: _vm.questionModel.isRequired,
          rules: _vm.formModel.validationRules[_vm.questionModel._id]
        },
        on: {
          pick: function($event) {
            return _vm.$emit("onInput", _vm.questionModel)
          },
          onFocus: function($event) {
            return _vm.$emit("onFocus", _vm.questionModel)
          }
        },
        model: {
          value: _vm.date,
          callback: function($$v) {
            _vm.date = $$v
          },
          expression: "date"
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/date/components/Input.vue?vue&type=template&id=2c4448a6&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.slice.js
var es_array_slice = __webpack_require__("+2oP");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.promise.js
var es_promise = __webpack_require__("5s+n");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.split.js
var es_string_split = __webpack_require__("EnZy");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/date/index.js
var date = __webpack_require__("1yfr");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/date/components/Input.vue?vue&type=script&lang=js&



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'dateInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  components: {
    'IDatePicker': () => __webpack_require__.e(/* import() | idatepicker */ 146).then(__webpack_require__.bind(null, "hdTy"))
  },
  props: {
    questionModel: Object,
    formModel: Object,
    readonly: Boolean
  },
  data: function data() {
    return {
      dateFormatted: null,
      culture: 'en',
      date: null,
      moment: null
    };
  },
  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    if (this.$auth.isAuthenticated()) {
      if (this.$root.user && this.$root.user.info && this.$root.user.info.culture) {
        this.culture = this.$root.user.info.culture.name;
      }
    } else {
      this.culture = window.navigator.language.split('-')[0];
    }

    this.$set(this.questionModel, 'answer', date["a" /* default */].getDefaultAnswer(this.questionModel));
  },
  methods: {
    toISODate: function toISODate(date) {
      return date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
    }
  },
  watch: {
    'date': function date(_date) {
      if (_date) {
        var dateUtc;
        dateUtc = this.toISODate(_date);

        if (dateUtc) {
          this.questionModel.answer = dateUtc;
        }
      }
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/date/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/date/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/date/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "nKMB":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/seperator/components/Input.vue?vue&type=template&id=4eb7dcf4&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "divider" })
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/seperator/components/Input.vue?vue&type=template&id=4eb7dcf4&

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/seperator/components/Input.vue?vue&type=script&lang=js&
//
//
//

/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'seperatorInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: ['formModel', 'questionModel']
});
// CONCATENATED MODULE: ./src/questiontypes/seperator/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/seperator/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/seperator/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "ndxV":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "oWv1":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "pnFF":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("hI29");

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

/***/ "qoa9":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "qwAf":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("UAUo");

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

/***/ "tGPU":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "yWGJ":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/imageupload/components/Input.vue?vue&type=template&id=773922d9&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "question-body" },
    [
      _vm.lock ? _c("i-preloader") : _vm._e(),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "fineuploader-wrapper" },
        [
          _c("i-fine-uploader", {
            ref: "input",
            attrs: {
              options: _vm.options,
              accept: "image/*",
              rules: _vm.formModel.validationRules[_vm.questionModel._id],
              lock: _vm.lock,
              readonly: _vm.readonly,
              submittedFiles: _vm.state.submittedFiles
            },
            on: {
              onInit: _vm.onInit,
              submitted: _vm.submitted,
              onError: _vm.onError,
              complete: _vm.complete,
              remove: _vm.remove
            },
            model: {
              value: _vm.questionModel.answer,
              callback: function($$v) {
                _vm.$set(_vm.questionModel, "answer", $$v)
              },
              expression: "questionModel.answer"
            }
          })
        ],
        1
      ),
      _vm._v(" "),
      _vm.questionModel.answer[0] &&
      _vm.state.submittedFiles.length === 0 &&
      _vm.options.base64
        ? _c("img", { attrs: { src: _vm.options.base64 } })
        : _vm._e(),
      _vm._v(" "),
      _vm.state.submittedFiles.length === 0 &&
      _vm.questionModel &&
      _vm.questionModel.answer &&
      _vm.questionModel.answer.length > 0
        ? _c("i-alert", { attrs: { type: "success" } }, [
            _vm._v(
              "\n\t\t" +
                _vm._s(_vm.questionModel.answer[0].fid) +
                " (" +
                _vm._s(_vm.questionModel.answer[0].t) +
                ")\n\t"
            )
          ])
        : _vm._e(),
      _vm._v(" "),
      !_vm.lock && _vm.errMsg !== null
        ? _c("i-alert", {
            attrs: { type: "error" },
            domProps: { innerHTML: _vm._s(_vm.errMsg) }
          })
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/questiontypes/imageupload/components/Input.vue?vue&type=template&id=773922d9&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.index-of.js
var es_array_index_of = __webpack_require__("yXV3");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.splice.js
var es_array_splice = __webpack_require__("pDQq");

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/asyncToGenerator.js
var asyncToGenerator = __webpack_require__("yXPU");
var asyncToGenerator_default = /*#__PURE__*/__webpack_require__.n(asyncToGenerator);

// EXTERNAL MODULE: ./config/prod.js
var prod = __webpack_require__("NRfZ");

// EXTERNAL MODULE: ./src/services/FileService.js
var FileService = __webpack_require__("iAnd");

// EXTERNAL MODULE: ./src/questiontypes/questionTypeInputMixin.js
var questionTypeInputMixin = __webpack_require__("Cjzc");

// EXTERNAL MODULE: ./src/questiontypes/imageupload/index.js
var imageupload = __webpack_require__("0WgH");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/questiontypes/imageupload/components/Input.vue?vue&type=script&lang=js&



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ var Inputvue_type_script_lang_js_ = ({
  name: 'ImageUploadInput',
  mixins: [questionTypeInputMixin["a" /* default */]],
  props: {
    questionModel: Object,
    formModel: Object,
    setAppVueVariable: Function,
    readonly: Boolean
  },

  data() {
    var options = {
      request: {
        endpoint: prod["a" /* default */].fileApi + '/uploadanswerfile',
        method: 'POST',
        params: {
          formId: this.formModel._id,
          formSession: this.formModel.uploadSession
        },
        inputName: 'file'
      },
      validation: {
        allowedExtensions: ['jpg', 'jpeg', 'png']
      },
      scaling: {
        includeExif: false,
        sendOriginal: false,
        orient: false,
        sizes: [{
          name: 'medium',
          maxSize: 1920
        }]
      },
      multiple: false,
      base64: null
    };

    if (this.formModel.state === 'private') {
      options.request.customHeaders = {
        'Authorization': "Bearer ".concat(this.$auth.getToken())
      };
    }

    return {
      options,
      state: {
        submittedFiles: []
      },
      uploader: null,
      errMsg: null,
      createUserCalled: false,
      lock: false
    };
  },

  created: function created() {
    if (this.questionModel.answer) {
      return;
    }

    this.$set(this.questionModel, 'answer', imageupload["a" /* default */].getDefaultAnswer(this.questionModel));
  },
  methods: {
    onInit: function onInit(uploader) {
      this.uploader = uploader;
    },
    submitted: function submitted(id) {
      this.setAppVueVariable('showMainLoader', true);
      this.lock = true;
      this.errMsg = null;
      this.state.submittedFiles = [id];
      this.$set(this.state, 'submittedFiles', [id]);
    },
    onError: function onError(id, name, errorReason, xhr) {
      if (!xhr) {
        this.errMsg = errorReason;
      }
    },
    complete: function () {
      var _complete = asyncToGenerator_default()(function* (id, name, response) {
        var canvas = this.$refs.input.$el.querySelector('canvas');

        if (canvas) {
          this.options.base64 = canvas.toDataURL('image/png');
        }

        var afterProcessUnlock = true;

        if (response) {
          if (this.questionModel.imageupload && this.questionModel.imageupload.defaultValue) {
            this.questionModel.imageupload.defaultValue = [];
          }

          var hasError = true;

          if (response.fileId) {
            if (this.formModel.answerFiles === null || this.formModel.answerFiles === undefined) {
              this.formModel.answerFiles = [];
            } // console.log(response.fileSize);
            // console.log('this.questionModel.answer', this.questionModel.answer);


            if (this.questionModel.answer && this.questionModel.answer.length > 0 && this.questionModel.answer[0].fid !== '') {
              var fileIndex = this.formModel.answerFiles.indexOf(this.questionModel.answer[0].fid);

              if (fileIndex > -1) {
                this.formModel.answerFiles.splice(fileIndex, 1);
              }
            }

            this.questionModel.answer = [{
              fid: response.fileId,
              t: response.fileType,
              s: response.fileSize
            }];
            this.formModel.answerFiles.push(response.fileId);
            this.formModel.uploadSession = response.formSession;
            this.uploader.methods._options.request.params.formSession = this.formModel.uploadSession;
            hasError = false;
            this.$emit('onInput', this.questionModel);
          } else if (response.errorCode && response.errorCode === 2) {
            // user Not Found
            if (!this.createUserCalled) {
              var userCreated = yield FileService["a" /* default */].CreateUserByForm(this.formModel._id);

              if (userCreated) {
                this.uploader.methods.retry(id);
                afterProcessUnlock = false;
                hasError = false;
              }
            }

            this.createUserCalled = true;
          } else if (response.error) {
            this.errMsg = response.error;
          } else {
            this.errMsg = this.$root.$t('notification.anErrorOccurred');
          }

          if (hasError) {
            this.state.submittedFiles = [];
            this.$set(this.state, 'submittedFiles', []);
          }

          if (afterProcessUnlock) {
            this.lock = false;
            this.setAppVueVariable('showMainLoader', false);
          }
        }
      });

      function complete(_x, _x2, _x3) {
        return _complete.apply(this, arguments);
      }

      return complete;
    }(),
    remove: function remove(fileIndex) {
      this.formModel.answerFiles.splice(fileIndex, 1);
      this.questionModel.answer = [];
    }
  }
});
// CONCATENATED MODULE: ./src/questiontypes/imageupload/components/Input.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Inputvue_type_script_lang_js_ = (Inputvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/questiontypes/imageupload/components/Input.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Inputvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/questiontypes/imageupload/components/Input.vue"
/* harmony default export */ var Input = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "ymrX":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

}]);