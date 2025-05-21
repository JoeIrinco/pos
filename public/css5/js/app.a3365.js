(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[79],{

/***/ "+FQH":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_array_index_of__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXV3");
/* harmony import */ var core_js_modules_es_array_index_of__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_index_of__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("UxlC");
/* harmony import */ var core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("EnZy");
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("YiV1");
/* harmony import */ var _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("ttAG");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__("mSNy");
/* harmony import */ var config__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__("NRfZ");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__("RuLz");









function isRange(number, min, max) {
  if (_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(number)) {
    return true;
  } else {
    return !(number < min || number > max);
  }
}

function isGreater(number, min) {
  if (_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(number)) {
    return true;
  } else {
    return !(number < min);
  }
}

function isSmaller(number, max) {
  if (_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(number)) {
    return true;
  } else {
    return !(number > max);
  }
}

function getRedirectUrls() {
  return {
    successUrl: config__WEBPACK_IMPORTED_MODULE_6__[/* default */ "a"].baseUrl + window.location.pathname + '?resultaction=paymentsuccess',
    cancelUrl: config__WEBPACK_IMPORTED_MODULE_6__[/* default */ "a"].baseUrl + window.location.pathname + '?resultaction=paymentcancel'
  };
}

/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'payment',
  displayName: 'Payment',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'money-bill',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].salesOrder,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.payment.name'),
      isRequired: true,
      questionType: 'payment',
      displayOrder: 0,
      isDeleted: false,
      payment: {
        currency: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].locale === 'tr' ? 'TRY' : 'USD',
        amount: 5,
        testmode: false,
        gateways: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].locale === 'tr' ? {
          wirecard: true
        } : {
          stripe: true
        },
        defaultGateway: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].locale === 'tr' ? 'wirecard' : 'stripe'
      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question, allQuestions) {
    var amount = question.answer.amount;
    var currency = question.answer.currency;

    if (question.payment.relatedQuestionId) {
      var formRelatedQuestion = allQuestions.find(x => x._id === question.payment.relatedQuestionId);

      if (formRelatedQuestion) {
        currency = formRelatedQuestion.productbasket.currency;
        amount = 0;
        var formRelatedQuestionAnswer = formRelatedQuestion.answer;

        if (formRelatedQuestionAnswer && formRelatedQuestionAnswer.p && formRelatedQuestionAnswer.t) {
          amount = formRelatedQuestionAnswer.t;
        }
      }
    }

    var returnObj = {
      q: question._id,
      py: {
        pid: question.answer.paymentId,
        a: amount,
        c: currency,
        gw: question.answer.gateway
      }
    };

    if (question.answer.paymentId && question.answer.gatewayResult) {
      returnObj.py.gr = {}; // gatewayResult

      if (question.answer.gatewayResult.payerId) {
        returnObj.py.gr.prid = question.answer.gatewayResult.payerId;
      }

      if (question.answer.gatewayResult.paymentId) {
        returnObj.py.gr.pid = question.answer.gatewayResult.paymentId;
      }
    } else {
      returnObj.py.r = {
        // redirectUrls
        s: question.answer.redirectUrls.successUrl,
        c: question.answer.redirectUrls.cancelUrl
      };
    }

    if (question.answer.buyer) {
      var arrCardExpireDate = (question.answer.buyer.cardExpireDate + '').split('/');
      var expireMonth = '';
      var expireYear = '';

      if (arrCardExpireDate.length > 1) {
        expireMonth = arrCardExpireDate[0];
        expireYear = arrCardExpireDate[1];
      }

      var ccNumber = question.answer.buyer.cardNumber;

      if (ccNumber) {
        ccNumber = ccNumber.replace(/ /g, '');
      }

      returnObj.py.b = {
        n: question.answer.buyer.name,
        sn: question.answer.buyer.surname,
        e: question.answer.buyer.email,
        i: question.answer.buyer.identityNumber,
        a: question.answer.buyer.address,
        ci: question.answer.buyer.city,
        co: question.answer.buyer.country,
        ccHn: question.answer.buyer.cardHolderName,
        ccN: ccNumber,
        ccEm: expireMonth,
        ccEy: expireYear,
        ccCvc: question.answer.buyer.cardCvc
      };
    }

    return returnObj;
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers, formPaymentAnswersParams) {
    if (questionAnswers && formPaymentAnswersParams.resultaction === 'paymentsuccess') {
      question.payment.defaultValue = {
        paymentId: formPaymentAnswersParams.pid,
        amount: questionAnswers.py.a,
        currency: questionAnswers.py.c,
        gateway: questionAnswers.py.gw,
        gatewayResult: {
          payerId: formPaymentAnswersParams.PayerID ? formPaymentAnswersParams.PayerID : '',
          paymentId: formPaymentAnswersParams.paymentId ? formPaymentAnswersParams.paymentId : ''
        }
      };
    } else {
      question.payment.defaultValue = {
        amount: questionAnswers.py.a,
        currency: questionAnswers.py.c,
        gateway: questionAnswers.py.gw,
        redirectUrls: {
          successUrl: questionAnswers.py.r.s,
          cancelUrl: questionAnswers.py.r.c
        }
      };
    }

    if (questionAnswers.py.b) {
      question.payment.defaultValue.buyer = {
        name: questionAnswers.py.b.n,
        surname: questionAnswers.py.b.sn,
        email: questionAnswers.py.b.e,
        identityNumber: questionAnswers.py.b.i,
        address: questionAnswers.py.b.a,
        city: questionAnswers.py.b.ci,
        country: questionAnswers.py.b.co
      };
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    var answerText = '';

    if (answer && answer.py && answer.py.a && answer.py.c) {
      answerText = answer.py.a + answer.py.c + ', ' + answer.py.gw;

      if (answer.py.b) {
        answerText += ', ' + answer.py.b.n + ' ' + answer.py.b.sn + ' ' + answer.py.b.e + ' ' + answer.py.b.i + ' ' + answer.py.b.a + ' ' + answer.py.b.ci + ' ' + answer.py.b.co;
      }
    }

    return {
      questionId: question._id,
      question: question.question,
      answer: answerText,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    return {
      _: [],
      amount: [function (v) {
        if (questionModel.payment.canAmountBeEnter) {
          if (!v) {
            return _helpers_bbcode__WEBPACK_IMPORTED_MODULE_7__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired'));
          }

          if (!questionModel.payment.minAmount || questionModel.payment.minAmount && questionModel.payment.minAmount < 1) {
            questionModel.payment.minAmount = 1;
          }

          if (questionModel.payment.minAmount && questionModel.payment.maxAmount) {
            return isRange(v, questionModel.payment.minAmount, questionModel.payment.maxAmount) || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.validationErrors.notInRange', {
              field: questionModel.question,
              min: questionModel.payment.minAmount,
              max: questionModel.payment.maxAmount
            });
          } else if (questionModel.payment.minAmount) {
            return isGreater(v, questionModel.payment.minAmount) || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.validationErrors.isGreaterThan', {
              field: questionModel.question,
              min: questionModel.payment.minAmount
            });
          } else if (questionModel.payment.maxAmount) {
            return isSmaller(v, questionModel.payment.maxAmount) || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.validationErrors.isSmallerThan', {
              field: questionModel.question,
              max: questionModel.payment.maxAmount
            });
          }
        }

        return true;
      }],
      iyn: [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired')],
      // iyzico information name
      iysn: [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired')],
      // iyzico information surname
      iye: [v => _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmail(v) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_7__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.validationErrors.notValidEmail'), {
        email: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('email')
      })],
      // iyzico information email
      iyi: [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired')],
      // iyzico information identityNumber
      iyci: [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired')],
      // iyzico information city
      iyco: [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired')],
      // iyzico information country
      iya: [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired')],
      // iyzico information address
      iycchn: [function (v) {
        if (!(questionModel.answer.gatewayResult && questionModel.answer.gatewayResult.paymentId)) {
          if (_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(v)) {
            return _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired');
          }
        }

        return true;
      }],
      // iyzico cardHolderName
      iyccn: [function (v) {
        if (!(questionModel.answer.gatewayResult && questionModel.answer.gatewayResult.paymentId)) {
          if (_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(v)) {
            return _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired');
          }

          if (!_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isMaskedValueValid(v, '#### #### #### ####')) {
            return _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('wrongValue');
          }
        }

        return true;
      }],
      // iyzico cardNumber
      iycced: [function (v) {
        if (!(questionModel.answer.gatewayResult && questionModel.answer.gatewayResult.paymentId)) {
          if (_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(v)) {
            return _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired');
          }

          if (!v.length === 5) {
            return _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('wrongValue');
          }

          if (v.indexOf('/') === -1) {
            return _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('wrongValue');
          }

          var arrExpDate = v.split('/');

          if (!(_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isMaskedValueValid(arrExpDate[0], '##') && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isMaskedValueValid(arrExpDate[1], '##'))) {
            return _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('wrongValue');
          }
        }

        return true;
      }],
      // iyzico expireDate
      iycccvc: [function (v) {
        if (!(questionModel.answer.gatewayResult && questionModel.answer.gatewayResult.paymentId)) {
          if (_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(v)) {
            return _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired');
          }

          if (!_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isMaskedValueValid(v, '###')) {
            return _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('wrongValue');
          }
        }

        return true;
      }] // iyzico cvc

    };
  },
  checkCanBeAdded: function checkCanBeAdded(questions) {
    var QUESTIONTYPE_MAX_QUESTION_COUNT = 1;

    if (questions) {
      var formQuestionTypeQuestions = questions.filter(q => q.questionType === 'payment');
      return formQuestionTypeQuestions.length < QUESTIONTYPE_MAX_QUESTION_COUNT;
    }

    return true;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    var answerModel = questionModel.payment.defaultValue ? questionModel.payment.defaultValue : {
      amount: questionModel.payment.amount,
      currency: questionModel.payment.currency,
      redirectUrls: getRedirectUrls()
    };

    if (questionModel.payment.defaultValue) {
      answerModel = questionModel.payment.defaultValue;
    } else {
      answerModel = {
        amount: questionModel.payment.amount,
        currency: questionModel.payment.currency,
        redirectUrls: getRedirectUrls()
      };
    }

    if (!answerModel.gateway) {
      answerModel.gateway = questionModel.payment.defaultGateway;
    }

    return answerModel;
  }
});

/***/ }),

/***/ "+Ndi":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("P0qE");


/* harmony default export */ __webpack_exports__["a"] = ({
  authorizeCheck(oAuth2AuthorizeModel) {
    var _this = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('oauth2/authorize-check', oAuth2AuthorizeModel);
      return _this.createReturnObject(apiResult);
    })();
  },

  authorize(oAuth2AuthorizeModel) {
    var _this2 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('oauth2/authorize', oAuth2AuthorizeModel);
      return _this2.createReturnObject(apiResult);
    })();
  },

  getPermissions() {
    var _this3 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('oauth2/permission');
      return _this3.createReturnObject(apiResult);
    })();
  },

  delPermission(clientId) {
    var _this4 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].delete('oauth2/permission/' + clientId);
      return _this4.createReturnObject(apiResult);
    })();
  },

  createReturnObject(apiResult) {
    var withAccessToken = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
    var result = {
      success: false
    };

    if (apiResult.status === 200 || apiResult.status === 201 || apiResult.status === 204) {
      result.success = true;
      result.data = apiResult.data;
    } else {
      result.errors = apiResult.response ? apiResult.response.data : apiResult.data;
    }

    return result;
  }

});

/***/ }),

/***/ "+ZKO":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("ttAG");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("mSNy");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("RuLz");





function isNumber(number, isRequired) {
  if (!isRequired && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(number)) {
    return true;
  } else {
    return _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isNumber(number);
  }
}

function isDecimal(number, isRequired) {
  if (!isRequired && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(number)) {
    return true;
  } else {
    return _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isDecimalNumber(number);
  }
}

function onlyPositive(number, isRequired) {
  if (!isRequired && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(number)) {
    return true;
  } else {
    return number > 0;
  }
}

function isRange(number, isRequired, min, max) {
  if (!isRequired && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(number)) {
    return true;
  } else {
    return !(number < min || number > max);
  }
}

function isGreater(number, isRequired, min) {
  if (!isRequired && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(number)) {
    return true;
  } else {
    return !(number < min);
  }
}

function isSmaller(number, isRequired, max) {
  if (!isRequired && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(number)) {
    return true;
  } else {
    return !(number > max);
  }
}

/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'number',
  displayName: 'Number',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'sort-numeric-up-alt',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].number,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: false,
      questionType: 'number',
      displayOrder: 0,
      isDeleted: false,
      number: {
        onlypositive: true,
        decimals: 0,
        min: 0,
        defaultValue: null // max: 255

      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    var rtn = {
      q: question._id
    };

    if (question.answer && question.answer !== null) {
      rtn.n = Number(question.answer);
    }

    return rtn;
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.n) {
      question.number.defaultValue = questionAnswers.n;
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    return {
      questionId: question._id,
      question: question.question,
      answer: answer.n,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var rules = [];

    if (questionModel.isRequired) {
      rules.push(v => !!v || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('isRequired')));
    }

    if (questionModel.number.decimals && questionModel.number.decimals > 0) {
      rules.push(v => isDecimal(v, questionModel.isRequired) || _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.validationErrors.notValidNumber', {
        field: questionModel.question
      }));
    }

    if (!questionModel.number.decimals || questionModel.number.decimals && questionModel.number.decimals === 0) {
      rules.push(v => isNumber(v, questionModel.isRequired) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.validationErrors.onlyNumber'), {
        field: questionModel.question
      }));
    }

    if (questionModel.number.onlypositive) {
      rules.push(v => onlyPositive(v, questionModel.isRequired) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.validationErrors.onlyPositive'), {
        field: questionModel.question
      }));
    }

    if (!questionModel.number.max) {
      questionModel.number.max = Number.MAX_VALUE;
    }

    if (questionModel.number.min && questionModel.number.max) {
      rules.push(v => isRange(v, questionModel.isRequired, questionModel.number.min, questionModel.number.max) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.validationErrors.notInRange'), {
        field: questionModel.question,
        min: questionModel.number.min,
        max: questionModel.number.max
      }));
    } else if (questionModel.number.min) {
      rules.push(v => isGreater(v, questionModel.isRequired, questionModel.number.min) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.validationErrors.isGreaterThan'), {
        field: questionModel.question,
        min: questionModel.number.min
      }));
    } else if (questionModel.number.max) {
      rules.push(v => isSmaller(v, questionModel.isRequired, questionModel.number.max) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.validationErrors.isSmallerThan'), {
        field: questionModel.question,
        max: questionModel.number.max
      }));
    }

    return rules;
  },
  generateConditionsCode: function generateConditionsCode(trigger) {
    switch (trigger.case) {
      case 'is':
        return "_['".concat(trigger.questionId, "'].answer === '").concat(trigger.answer, "'");

      case 'is not':
        return "_['".concat(trigger.questionId, "'].answer !== '").concat(trigger.answer, "'");

      case 'startsWith':
        return "(_['".concat(trigger.questionId, "'].answer + '').startsWith('").concat(trigger.answer, "')");

      case 'endsWith':
        return "(_['".concat(trigger.questionId, "'].answer + '').endsWith('").concat(trigger.answer, "')");

      case 'lesserThan':
        return "!!_['".concat(trigger.questionId, "'].answer && Number(_['").concat(trigger.questionId, "'].answer) < Number('").concat(trigger.answer, "')");

      case 'greaterThan':
        return "!!_['".concat(trigger.questionId, "'].answer && Number(_['").concat(trigger.questionId, "'].answer) > Number('").concat(trigger.answer, "')");

      case 'includes':
        return "(_['".concat(trigger.questionId, "'].answer + '').includes('").concat(trigger.answer, "')");
    }
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.number.defaultValue ? questionModel.number.defaultValue : null;
  }
});

/***/ }),

/***/ "+uhQ":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("P0qE");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("oCYn");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("mSNy");




/* harmony default export */ __webpack_exports__["a"] = ({
  getFormReports(formId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var url = 'report/' + formId;

      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(url, null, callback);
      } else {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(url)).data;
      }
    })();
  },

  getFormReportForShare(formId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var url = 'report/' + formId + '/forshare';

      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(url, null, callback);
      } else {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(url)).data;
      }
    })();
  },

  getReportByUsernameAndFormUrl(username, formUrl) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('report/' + username + '/' + formUrl)).data;
    })();
  },

  getShared(id, username, formUrl, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var url = id ? 'report/' + id + '/statistics' : 'report/' + username + '/' + formUrl;

      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(url, null, callback);
      } else {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(url);
      }
    })();
  },

  getSharedByFormId(formId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var url = 'report/byformid/' + formId;

      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(url, null, callback);
      } else {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(url);
      }
    })();
  },

  getAllShared(userId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('report/' + userId + '/getallshared', null, callback);
      } else {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('report/' + userId + '/getallshared')).data;
      }
    })();
  },

  changePrivacy(id, updateModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_2__["default"].prototype.$auth.isAuthenticated()) {
        var status = (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].put('report/' + id + '/updateprivacy', updateModel)).status;
        return status === 200 || status === 204;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_2__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  updateActive(id, isShared) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_2__["default"].prototype.$auth.isAuthenticated()) {
        var status = (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].put('report/' + id + '/UpdateActive', {
          value: isShared
        })).status;
        return status === 200 || status === 204;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_2__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  updateShareRecordsStatus(id, value) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_2__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].put('report/' + id + '/updatesharerecordsstatus', {
          value: value
        })).status === 204;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_2__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  getSharedReportCount(userId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('report/' + userId + '/reportCount', null, callback);
      } else {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('report/' + userId + '/reportCount')).data;
      }
    })();
  },

  getSharedAnswers(reportId) {
    var _arguments = arguments;
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var pageNumber = _arguments.length > 1 && _arguments[1] !== undefined ? _arguments[1] : 1;
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('report/reportdata/' + reportId + '/' + pageNumber);
      var result = {
        success: false,
        statusCode: apiResult.status
      };

      if (apiResult.constructor.name === 'Error') {
        // 200 dönmedi..
        result.error = apiResult.response.data;
      } else if (apiResult.status === 200) {
        result.success = true;
        result.data = apiResult.data;
      } else if (apiResult.status === 403) {
        result.data = apiResult.data;
      }

      return result;
    })();
  },

  getSharedWithMe(callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (typeof callback === 'function') {
        if (vue__WEBPACK_IMPORTED_MODULE_2__["default"].prototype.$auth.isAuthenticated()) {
          _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('report/sharedwithme', null, function (result) {
            callback(result.data);
          });
        } else {// alert('register');
        }
      } else {
        if (vue__WEBPACK_IMPORTED_MODULE_2__["default"].prototype.$auth.isAuthenticated()) {
          return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('report/sharedwithme')).data;
        } else {// alert('register');
        }
      }
    })();
  },

  removeSharedWithMe(reportId, formId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_2__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('report/' + reportId + '/' + formId + '/removesharedwithme')).status === 204;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_2__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  }

});

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("Vtdi");


/***/ }),

/***/ "0WgH":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("mSNy");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("RuLz");



/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'imageupload',
  displayName: 'Image Upload',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'cloud-upload',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].imageFile,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.imageupload.yourPhoto'),
      isRequired: false,
      questionType: 'imageupload',
      displayOrder: 0,
      isDeleted: false
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    return {
      q: question._id,
      f: question.answer
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.f) {
      if (question.imageupload) {
        question.imageupload.defaultValue = questionAnswers.f;
      } else {
        question.imageupload = {
          defaultValue: questionAnswers.f
        };
      }
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question, culture, timezone, answerId) {
    var answerObj;

    if (answer && answer.f && answer.f !== null && answer.f.length > 0 && answer.f[0].fid) {
      if (answerId) {
        answerObj = {
          type: 'url',
          icon: 'image',
          // title: answer.f[0].fid, // Bu değer gönderilmezse dil dosyasından link textini alır
          url: '/recordimage/' + answerId + '/' + answer.f[0].fid
        };
      } else {
        answerObj = answer.f[0].fid;
      }
    }

    return {
      questionId: question._id,
      question: question.question,
      answer: answerObj,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var rules = [];

    if (questionModel.isRequired) {
      rules.push(v => v && v !== null && v.length > 0 || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('isRequired')));
    } else {
      rules.push(true);
    }

    return rules;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.imageupload && questionModel.imageupload.defaultValue ? questionModel.imageupload.defaultValue : [];
  }
});

/***/ }),

/***/ "0d3v":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("P0qE");
/* harmony import */ var config__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("NRfZ");



/* harmony default export */ __webpack_exports__["a"] = ({
  getExternalLoginProviders() {
    /* var result = [];
    var apiResult = await Api.get('auth/externallogins');
    if (apiResult.status === 200) {
    	result = apiResult.data;
    } */
    return config__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].externalAuth;
  },

  externalAccessTokenRegister(externalRegisterModel) {
    var _this = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('auth/externalaccesstokenregister', externalRegisterModel);
      return _this.createReturnObject(apiResult);
    })();
  },

  login(loginModel) {
    var _this2 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('auth/login', loginModel);
      return _this2.createReturnObject(apiResult);
    })();
  },

  register(registerModel) {
    var _this3 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('auth/register', registerModel);
      return _this3.createReturnObject(apiResult);
    })();
  },

  changePassword(changePasswordModel) {
    var _this4 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('auth/changepassword', changePasswordModel);
      return _this4.createReturnObject(apiResult);
    })();
  },

  forgotPassword(forgotPasswordModel) {
    var _this5 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('auth/forgotpassword', forgotPasswordModel);
      return _this5.createReturnObject(apiResult, false);
    })();
  },

  resetPasswordConfirmation(resetPasswordConfirmationModel) {
    var _this6 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('auth/resetpasswordconfirmation', resetPasswordConfirmationModel);
      return _this6.createReturnObject(apiResult, false);
    })();
  },

  emailConfirmation(emailConfirmationModel) {
    var _this7 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('auth/emailconfirmation', emailConfirmationModel);
      return _this7.createReturnObject(apiResult);
    })();
  },

  resendEmailConfirmMail() {
    var _this8 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('auth/resendemailconfirmmail');
      return _this8.createReturnObject(apiResult, false);
    })();
  },

  changeEmail(changeEmailModel) {
    var _this9 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('auth/changeemail', changeEmailModel);
      return _this9.createReturnObject(apiResult);
    })();
  },

  changeUserInfo(infoName, infoModel) {
    var _this10 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('auth/' + infoName, infoModel);
      return _this10.createReturnObject(apiResult);
    })();
  },

  createReturnObject(apiResult) {
    var withAccessToken = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
    var result = {
      success: false
    };

    if (apiResult.status === 200 || apiResult.status === 201 || apiResult.status === 204) {
      result.success = true;
      result.createDate = apiResult.data.createDate;

      if (withAccessToken) {
        result.access_token = apiResult.data.access_token;
      }
    } else {
      result.errors = apiResult.response ? apiResult.response.data : apiResult.data;
    }

    return result;
  }

});

/***/ }),

/***/ "12B7":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var config__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("NRfZ");
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("P0qE");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("oCYn");




/* harmony default export */ __webpack_exports__["a"] = ({
  add(formModel) {
    var _arguments = arguments,
        _this = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var token = _arguments.length > 1 && _arguments[1] !== undefined ? _arguments[1] : null;

      if (token === null) {
        token = yield window.grecaptcha.execute(config__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].reChaptcha.v3.siteKey, {
          action: "".concat(formModel.formId, "_submission")
        });
      }

      formModel.v3Token = token;
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('answer', formModel); // console.log('add apiResult', apiResult);

      return _this.createReturnObject(apiResult);
    })();
  },

  update(formModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].put('answer', formModel)).data;
      }
    })();
  },

  get(id) {
    var _arguments2 = arguments;
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var pageNumber = _arguments2.length > 1 && _arguments2[1] !== undefined ? _arguments2[1] : 1;

      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        var response = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('answer/' + id + '/' + pageNumber);

        if (response.status === 200) {
          return response.data;
        }

        return null;
      }
    })();
  },

  getTrash(id) {
    var _arguments3 = arguments;
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var pageNumber = _arguments3.length > 1 && _arguments3[1] !== undefined ? _arguments3[1] : 1;

      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('answer/' + id + '/' + pageNumber + '/answersTrash')).data;
      }
    })();
  },

  trash(formId, answerId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].delete('answer/' + answerId + '/' + formId)).status === 204;
      }
    })();
  },

  delete(formId, answerId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].delete('answer/' + answerId + '/' + formId + '/delete')).status === 204;
      }
    })();
  },

  undoAnswerTrash(formId, answerId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].put('answer/' + answerId + '/' + formId + '/undoAnswerTrash')).status === 204;
      }
    })();
  },

  downloadAnswers(formId, userInfo) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('answer/' + formId + '/downloadAnswer', {
          language: userInfo.language || 'en',
          culture: userInfo.culture && userInfo.culture.name || 'en',
          timezone: userInfo.timezone && userInfo.timezone.value || 'GMT Standard Time',
          timezoneoffset: userInfo.timezone && userInfo.timezone.offset || 0
        });
      }
    })();
  },

  createReturnObject(apiResult) {
    var result = {
      success: false
    };

    if (apiResult) {
      if (apiResult.status === 200 || apiResult.status === 201) {
        result.success = true;

        if (apiResult.response) {
          result.payload = apiResult.response.data;
        }

        if (apiResult.data) {
          result.payload = apiResult.data;
        }
      } else {
        // result.errors = apiResult.response.data;
        result.errors = apiResult.response ? apiResult.response.data : apiResult.data;
      }
    } // console.log('createReturnObject result', result);


    return result;
  },

  markAsRead(formId, answerId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('answer/' + formId + '/markasread/' + answerId + '');
      }
    })();
  },

  getRecordsFileInfo(formId, fileType) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('answer/' + formId + '/getRecordsFileInfo/' + fileType + '');
      }
    })();
  },

  getRecordsFile(formId, file) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('/downloadrecords/' + file, {
          responseType: 'blob'
        }, undefined, 'file'); // return (await Api.get('answer/' + formId + '/getRecordsFile'));
      }
    })();
  },

  isFormHasAnswer(formId, callback) {
    if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
      _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('answer/' + formId + '/isFormHasAnswer', null, callback);
    }
  },

  addAndUpdateAnswerNote(answerId, note) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].put('/answer/addAndUpdateAnswerNote/' + answerId, {
          note: note
        });
      }
    })();
  }

});

/***/ }),

/***/ "1yfr":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("mSNy");
/* harmony import */ var _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("ttAG");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("RuLz");




/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'date',
  displayName: 'Date',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'calendar',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].dateTime,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: false,
      questionType: 'date',
      displayOrder: 0,
      isDeleted: false
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    var rtn = {
      q: question._id
    };

    if (question.answer && question.answer !== null) {
      rtn.d = question.answer;
    }

    return rtn;
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.d) {
      if (question.date) {
        question.date.defaultValue = questionAnswers.d;
      } else {
        question.date = {
          defaultValue: questionAnswers.d
        };
      }
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question, culture) {
    var answerText = '';

    if (answer && answer.d && answer.d !== null) {
      var options = {
        // weekday: 'short',
        year: 'numeric',
        month: 'numeric',
        day: 'numeric',
        timeZone: 'UTC' // Burası UTC olmak zorunda. Kullanıcının timezone'u dikkate alınmayacak.

      };
      var dateAnswer = new Date(answer.d);
      answerText = dateAnswer.toLocaleString(culture.name, options);
    }

    return {
      questionId: question._id,
      question: question.question,
      answer: answerText,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var rules = [];
    rules.push(v => {
      if (questionModel.isRequired && !v) {
        return _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('isRequired'));
      }

      if (!_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_2__["default"].isDateString(v) && v) {
        return _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('errorEnums.dateIsNotValid');
      }

      return true;
    });
    return rules;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.date && questionModel.date.defaultValue ? questionModel.date.defaultValue : null;
  }
});

/***/ }),

/***/ "416N":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./src/questiontypes/text/index.js
var questiontypes_text = __webpack_require__("Tned");

// EXTERNAL MODULE: ./src/questiontypes/questiontypesgroups.js
var questiontypesgroups = __webpack_require__("YiV1");

// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/shorttext/index.js

/* harmony default export */ var shorttext = ({
  name: 'shorttext',
  displayName: 'Short Text',
  parentType: 'text',
  displayOnToolbox: true,
  displayIconHTML: 'text',
  active: true,
  group: questiontypesgroups["a" /* default */].text
});
// EXTERNAL MODULE: ./src/lang/index.js
var lang = __webpack_require__("mSNy");

// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/longtext/index.js


/* harmony default export */ var longtext = ({
  name: 'longtext',
  displayName: 'Long Text',
  parentType: 'text',
  displayOnToolbox: true,
  displayIconHTML: 'align-left',
  active: true,
  group: questiontypesgroups["a" /* default */].text,
  componentDefaults: function componentDefaults() {
    return {
      question: lang["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: false,
      questionType: 'text',
      displayOrder: 0,
      isDeleted: false,
      text: {
        subType: 'longtext'
      }
    };
  }
});
// CONCATENATED MODULE: ./src/questiontypes/text/subtypes/maskedtext/index.js


/* harmony default export */ var maskedtext = ({
  name: 'maskedtext',
  displayName: 'Masked Text',
  parentType: 'text',
  displayOnToolbox: true,
  displayIconHTML: 'mask',
  active: true,
  group: questiontypesgroups["a" /* default */].text,
  componentDefaults: function componentDefaults() {
    return {
      question: lang["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: false,
      questionType: 'text',
      displayOrder: 0,
      isDeleted: false,
      text: {
        subType: 'maskedtext'
      }
    };
  }
});
// EXTERNAL MODULE: ./src/questiontypes/fullname/index.js
var fullname = __webpack_require__("Msdk");

// EXTERNAL MODULE: ./src/questiontypes/email/index.js
var email = __webpack_require__("9Vbv");

// EXTERNAL MODULE: ./src/questiontypes/phone/index.js
var phone = __webpack_require__("NPEM");

// EXTERNAL MODULE: ./src/questiontypes/address/index.js
var address = __webpack_require__("A541");

// EXTERNAL MODULE: ./src/questiontypes/date/index.js
var date = __webpack_require__("1yfr");

// EXTERNAL MODULE: ./src/questiontypes/time/index.js
var time = __webpack_require__("ga8e");

// CONCATENATED MODULE: ./src/questiontypes/submitbutton/index.js

/* harmony default export */ var submitbutton = ({
  name: 'submitbutton',
  displayName: 'Submit Button',
  displayOnToolbox: false,
  active: true,
  displayOnPreview: false,
  displayIconHTML: 'map-marker',
  answerable: false,
  group: questiontypesgroups["a" /* default */].designElements,
  componentAttributes: function componentAttributes() {
    return {
      question: {
        type: 'text',
        title: 'Submit Button Text'
      },
      isFullWidth: {
        type: 'boolean',
        title: 'is this button full width'
      }
    };
  },
  componentDefaults: function componentDefaults() {
    return {
      question: 'Submit',
      displayOrder: 0,
      isDeleted: false,
      questionType: 'submitbutton'
    };
  }
});
// EXTERNAL MODULE: ./src/helpers/jsHelpers.js + 1 modules
var jsHelpers = __webpack_require__("ttAG");

// EXTERNAL MODULE: ./src/helpers/bbcode.js
var bbcode = __webpack_require__("RuLz");

// CONCATENATED MODULE: ./src/questiontypes/choice/index.js

 // const ObjectId = require('bson-objectid');



/* harmony default export */ var choice = ({
  name: 'choice',
  displayName: 'Choice',
  displayOnToolbox: false,
  answerable: true,
  active: true,
  group: questiontypesgroups["a" /* default */].commonComponent,
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    var optionValueCollection = {};
    question.choice.options.forEach(option => {
      optionValueCollection[option._id] = option;
    });
    var choices = [];
    var questionAnswer = question.answer;

    if (questionAnswer) {
      var otherAnswer;

      if (Array.isArray(questionAnswer)) {
        for (var i = 0; i < questionAnswer.length; i++) {
          var answer = questionAnswer[i];

          if (!jsHelpers["default"].isEmpty(answer)) {
            var answeredOption = optionValueCollection[answer];

            if (answeredOption) {
              choices.push({
                t: answeredOption.text,
                v: answeredOption._id
              });
            } else {
              otherAnswer = answer;
            }
          } else {
            otherAnswer = 'other';
          }
        }
      } else {
        var _answeredOption = optionValueCollection[questionAnswer];

        if (_answeredOption) {
          choices.push({
            t: _answeredOption.text,
            v: _answeredOption._id
          });
        } else {
          otherAnswer = questionAnswer;
        }
      }

      if (question.choice.other && otherAnswer) {
        choices.push({
          o: otherAnswer === 'other' ? jsHelpers["default"].clearHtmlTags(lang["default"].t('questionTypes.choice.other')) : jsHelpers["default"].clearHtmlTags(otherAnswer)
        });
      }
    }

    return {
      q: question._id,
      c: choices
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.c && questionAnswers.c.length > 0) {
      question.choice.defaultValue = [];
      questionAnswers.c.forEach(c => {
        if (c.v) {
          question.choice.defaultValue.push(c.v);
        } else if (c.o) {
          question.choice.defaultValue.push(c.o);
        }
      });
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    var answerText = '';

    if (!answer.c) {
      return answerText;
    }

    answer.c.forEach(choice => {
      if (choice.o) {
        answerText += choice.o + ', ';
      } else {
        answerText += choice.t + ', ';
      }
    });
    answerText = answerText.substr(0, answerText.length - 2);
    return {
      questionId: question._id,
      question: question.question,
      answer: answerText,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var rules = [];

    if (questionModel.isRequired) {
      // var reqMsg = questionModel.question + ' is required';
      rules.push(v => {
        var error = bbcode["a" /* default */].bbcodeToHtml(lang["default"].t('isRequired'));

        if (!!v && v.length > 0 && v !== questionModel.choice.emptyOption) {
          // multiple choice
          if (Array.isArray(v)) {
            if (v.length === 1) {
              if (v[0] !== questionModel.choice.emptyOption) {
                return true;
              }
            } else {
              return true;
            }
          } else {
            return true;
          }
        }

        return error;
      });
      /* rules.push(v => {
      	console.log('CheckBox createValidationRules this', this);
      	return v.length > 0 || questionModel.question + ' is required';
      }); */

      /* rules.push(function (v) {
      	console.log('CheckBox createValidationRules v', v);
      	return v.length > 0 || questionModel.question + ' is required';
      }); */
    }

    if (questionModel.choice.subType === 'picturechoice' && questionModel.choice.multipleSelection || questionModel.choice.subType === 'multiplechoice') {
      if (questionModel.choice.min > 1) {
        rules.push(v => {
          if (v.length >= questionModel.choice.min || v.length === 0) {
            return true;
          }

          return lang["default"].t('questionTypes.validationErrors.minSelectedOption', {
            min: questionModel.choice.min
          });
        });
      }
    }

    return rules;
  },
  generateConditionsCode: function generateConditionsCode(trigger) {
    switch (trigger.case) {
      case 'is':
        return "_['".concat(trigger.questionId, "'].answer === '").concat(trigger.answer, "'");

      case 'is not':
        return "_['".concat(trigger.questionId, "'].answer !== '").concat(trigger.answer, "'");
    }
  },
  getFileIds: function getFileIds(question) {
    var fileIds = [];

    for (var i = 0; i < question.choice.options.length; i++) {
      if (question.choice.options[i].fileId) {
        fileIds.push(question.choice.options[i].fileId);
      }
    }

    return fileIds;
  }
  /* textareaOnKeyUpCallback: function (value, model) {
  	var newLineArray = value.split('\n');
  	if (newLineArray.length < model.options.length) {
  		model.options.splice(0, model.options.length - newLineArray.length);
  	} else if (newLineArray.length > model.options.length) {
  		model.options.push({
  			_id: ObjectId().str,
  			text: ''
  		});
  	}
  		for (let i = 0; i < newLineArray.length; i++) {
  		model.options[i].text = newLineArray[i];
  	}
  },
  onUpdatedSet: function (value, model) {
  } */

});
// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/dropdown/index.js
var dropdown = __webpack_require__("aXTv");

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/singlechoice/index.js
var singlechoice = __webpack_require__("F/bx");

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/multiplechoice/index.js
var multiplechoice = __webpack_require__("R3Ei");

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/picturechoice/index.js
var picturechoice = __webpack_require__("dAjO");

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/opinionscale/index.js
var opinionscale = __webpack_require__("n3VK");

// EXTERNAL MODULE: ./src/questiontypes/number/index.js
var number = __webpack_require__("+ZKO");

// EXTERNAL MODULE: ./src/questiontypes/imageupload/index.js
var imageupload = __webpack_require__("0WgH");

// EXTERNAL MODULE: ./src/questiontypes/choice/subtypes/rating/index.js
var rating = __webpack_require__("DoXk");

// EXTERNAL MODULE: ./src/questiontypes/termsandconditions/index.js
var termsandconditions = __webpack_require__("wYly");

// EXTERNAL MODULE: ./src/questiontypes/productbasket/index.js
var productbasket = __webpack_require__("bNzB");

// EXTERNAL MODULE: ./src/questiontypes/payment/index.js
var payment = __webpack_require__("+FQH");

// CONCATENATED MODULE: ./src/questiontypes/imagecontent/index.js

/* harmony default export */ var imagecontent = ({
  name: 'imagecontent',
  displayName: 'Image Content',
  displayOnToolbox: true,
  answerable: false,
  displayIconHTML: 'image',
  active: true,
  group: questiontypesgroups["a" /* default */].designElements,
  componentDefaults: function componentDefaults() {
    return {
      questionType: 'imagecontent',
      displayOrder: 0,
      imageContent: {}
    };
  },
  fixQuestionNumber: function fixQuestionNumber(questionNumber) {
    return questionNumber;
  }
});
// CONCATENATED MODULE: ./src/questiontypes/pagebreak/index.js

/* harmony default export */ var pagebreak = ({
  name: 'pagebreak',
  displayName: 'Page Break',
  displayOnToolbox: "production" === 'development',
  answerable: false,
  displayIconHTML: 'page-break',
  active: false,
  group: questiontypesgroups["a" /* default */].designElements
});
// CONCATENATED MODULE: ./src/questiontypes/seperator/index.js

/* harmony default export */ var seperator = ({
  name: 'seperator',
  displayName: 'Seperator',
  answerable: false,
  displayOnToolbox: true,
  displayIconHTML: 'horizontal-rule',
  active: true,
  group: questiontypesgroups["a" /* default */].designElements,
  hideCardDesign: true,
  componentDefaults: function componentDefaults() {
    return {
      isplayOrder: 0,
      questionType: 'seperator'
    };
  },
  fixQuestionNumber: function fixQuestionNumber(questionNumber) {
    return questionNumber;
  }
});
// CONCATENATED MODULE: ./src/questiontypes/header/index.js

/* harmony default export */ var header = ({
  name: 'header',
  displayName: 'Header',
  displayOnToolbox: "production" === 'development',
  answerable: false,
  displayIconHTML: 'info',
  active: false,
  group: questiontypesgroups["a" /* default */].designElements
});
// CONCATENATED MODULE: ./src/questiontypes/wysiwyg/index.js

/* harmony default export */ var wysiwyg = ({
  name: 'wysiwyg',
  displayName: 'Explanation',
  displayOnToolbox: true,
  answerable: false,
  displayIconHTML: 'font-case',
  active: true,
  group: questiontypesgroups["a" /* default */].designElements,
  componentDefaults: function componentDefaults() {
    return {
      isplayOrder: 0,
      questionType: 'wysiwyg',
      wysiwyg: {
        content: ''
      }
    };
  },
  fixQuestionNumber: function fixQuestionNumber(questionNumber) {
    return questionNumber;
  }
});
// EXTERNAL MODULE: ./src/questiontypes/selectionmatrix/index.js
var selectionmatrix = __webpack_require__("RQlP");

// EXTERNAL MODULE: ./src/questiontypes/grid/index.js
var grid = __webpack_require__("ewUQ");

// EXTERNAL MODULE: ./src/questiontypes/fileupload/index.js
var fileupload = __webpack_require__("PgN2");

// CONCATENATED MODULE: ./src/questiontypes/questiontypes.js































/* harmony default export */ var questiontypes = __webpack_exports__["a"] = ({
  // BOF Common Components
  text: questiontypes_text["a" /* default */],
  shorttext: shorttext,
  longtext: longtext,
  maskedtext: maskedtext,
  fullname: fullname["a" /* default */],
  email: email["a" /* default */],
  phone: phone["a" /* default */],
  address: address["default"],
  date: date["a" /* default */],
  time: time["a" /* default */],
  submitbutton: submitbutton,
  choice: choice,
  dropdown: dropdown["a" /* default */],
  singlechoice: singlechoice["a" /* default */],
  multiplechoice: multiplechoice["a" /* default */],
  picturechoice: picturechoice["a" /* default */],
  opinionscale: opinionscale["a" /* default */],
  number: number["a" /* default */],
  imageupload: imageupload["a" /* default */],
  fileupload: fileupload["a" /* default */],
  rating: rating["a" /* default */],
  termsandconditions: termsandconditions["a" /* default */],
  productbasket: productbasket["a" /* default */],
  payment: payment["a" /* default */],
  // EOF Common Components
  // BOF Design Elements
  imagecontent: imagecontent,
  pagebreak: pagebreak,
  seperator: seperator,
  header: header,
  wysiwyg: wysiwyg,
  selectionmatrix: selectionmatrix["a" /* default */],
  grid: grid["a" /* default */] // BOF Design Elements
  // BOF Paid Components
  // *******
  // EOF Paid Components

});

/***/ }),

/***/ "6T0p":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("y/pk");

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

/***/ "7MdJ":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("HadA");

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

/***/ "8/nC":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  'AF': 'Afghanistan',
  'AX': '\u00c5land Islands',
  'AL': 'Albania',
  'DZ': 'Algeria',
  'AS': 'American Samoa',
  'AD': 'Andorra',
  'AO': 'Angola',
  'AI': 'Anguilla',
  'AQ': 'Antarctica',
  'AG': 'Antigua & Barbuda',
  'AR': 'Argentina',
  'AM': 'Armenia',
  'AW': 'Aruba',
  'AC': 'Ascension Island',
  'AU': 'Australia',
  'AT': 'Austria',
  'AZ': 'Azerbaijan',
  'BS': 'Bahamas',
  'BH': 'Bahrain',
  'BD': 'Bangladesh',
  'BB': 'Barbados',
  'BY': 'Belarus',
  'BE': 'Belgium',
  'BZ': 'Belize',
  'BJ': 'Benin',
  'BM': 'Bermuda',
  'BT': 'Bhutan',
  'BO': 'Bolivia',
  'BA': 'Bosnia & Herzegovina',
  'BW': 'Botswana',
  'BR': 'Brazil',
  'IO': 'British Indian Ocean Territory',
  'VG': 'British Virgin Islands',
  'BN': 'Brunei',
  'BG': 'Bulgaria',
  'BF': 'Burkina Faso',
  'BI': 'Burundi',
  'KH': 'Cambodia',
  'CM': 'Cameroon',
  'CA': 'Canada',
  'IC': 'Canary Islands',
  'CV': 'Cape Verde',
  'BQ': 'Caribbean Netherlands',
  'KY': 'Cayman Islands',
  'CF': 'Central African Republic',
  'EA': 'Ceuta & Melilla',
  'TD': 'Chad',
  'CL': 'Chile',
  'CN': 'China',
  'CX': 'Christmas Island',
  'CC': 'Cocos (Keeling) Islands',
  'CO': 'Colombia',
  'KM': 'Comoros',
  'CG': 'Congo - Brazzaville',
  'CD': 'Congo - Kinshasa',
  'CK': 'Cook Islands',
  'CR': 'Costa Rica',
  'CI': 'C\u00f4te d\u2019Ivoire',
  'HR': 'Croatia',
  'CU': 'Cuba',
  'CW': 'Cura\u00e7ao',
  'CY': 'Cyprus',
  'CZ': 'Czechia',
  'DK': 'Denmark',
  'DG': 'Diego Garcia',
  'DJ': 'Djibouti',
  'DM': 'Dominica',
  'DO': 'Dominican Republic',
  'EC': 'Ecuador',
  'EG': 'Egypt',
  'SV': 'El Salvador',
  'GQ': 'Equatorial Guinea',
  'ER': 'Eritrea',
  'EE': 'Estonia',
  'SZ': 'Eswatini',
  'ET': 'Ethiopia',
  'FK': 'Falkland Islands',
  'FO': 'Faroe Islands',
  'FJ': 'Fiji',
  'FI': 'Finland',
  'FR': 'France',
  'GF': 'French Guiana',
  'PF': 'French Polynesia',
  'TF': 'French Southern Territories',
  'GA': 'Gabon',
  'GM': 'Gambia',
  'GE': 'Georgia',
  'DE': 'Germany',
  'GH': 'Ghana',
  'GI': 'Gibraltar',
  'GR': 'Greece',
  'GL': 'Greenland',
  'GD': 'Grenada',
  'GP': 'Guadeloupe',
  'GU': 'Guam',
  'GT': 'Guatemala',
  'GG': 'Guernsey',
  'GN': 'Guinea',
  'GW': 'Guinea-Bissau',
  'GY': 'Guyana',
  'HT': 'Haiti',
  'HN': 'Honduras',
  'HK': 'Hong Kong SAR China',
  'HU': 'Hungary',
  'IS': 'Iceland',
  'IN': 'India',
  'ID': 'Indonesia',
  'IR': 'Iran',
  'IQ': 'Iraq',
  'IE': 'Ireland',
  'IM': 'Isle of Man',
  'IL': 'Israel',
  'IT': 'Italy',
  'JM': 'Jamaica',
  'JP': 'Japan',
  'JE': 'Jersey',
  'JO': 'Jordan',
  'KZ': 'Kazakhstan',
  'KE': 'Kenya',
  'KI': 'Kiribati',
  'XK': 'Kosovo',
  'KW': 'Kuwait',
  'KG': 'Kyrgyzstan',
  'LA': 'Laos',
  'LV': 'Latvia',
  'LB': 'Lebanon',
  'LS': 'Lesotho',
  'LR': 'Liberia',
  'LY': 'Libya',
  'LI': 'Liechtenstein',
  'LT': 'Lithuania',
  'LU': 'Luxembourg',
  'MO': 'Macao SAR China',
  'MG': 'Madagascar',
  'MW': 'Malawi',
  'MY': 'Malaysia',
  'MV': 'Maldives',
  'ML': 'Mali',
  'MT': 'Malta',
  'MH': 'Marshall Islands',
  'MQ': 'Martinique',
  'MR': 'Mauritania',
  'MU': 'Mauritius',
  'YT': 'Mayotte',
  'MX': 'Mexico',
  'FM': 'Micronesia',
  'MD': 'Moldova',
  'MC': 'Monaco',
  'MN': 'Mongolia',
  'ME': 'Montenegro',
  'MS': 'Montserrat',
  'MA': 'Morocco',
  'MZ': 'Mozambique',
  'MM': 'Myanmar (Burma)',
  'NA': 'Namibia',
  'NR': 'Nauru',
  'NP': 'Nepal',
  'NL': 'Netherlands',
  'NC': 'New Caledonia',
  'NZ': 'New Zealand',
  'NI': 'Nicaragua',
  'NE': 'Niger',
  'NG': 'Nigeria',
  'NU': 'Niue',
  'NF': 'Norfolk Island',
  'KP': 'North Korea',
  'MK': 'North Macedonia',
  'MP': 'Northern Mariana Islands',
  'NO': 'Norway',
  'OM': 'Oman',
  'PK': 'Pakistan',
  'PW': 'Palau',
  'PS': 'Palestinian Territories',
  'PA': 'Panama',
  'PG': 'Papua New Guinea',
  'PY': 'Paraguay',
  'PE': 'Peru',
  'PH': 'Philippines',
  'PN': 'Pitcairn Islands',
  'PL': 'Poland',
  'PT': 'Portugal',
  'XA': 'Pseudo-Accents',
  'XB': 'Pseudo-Bidi',
  'PR': 'Puerto Rico',
  'QA': 'Qatar',
  'RE': 'R\u00e9union',
  'RO': 'Romania',
  'RU': 'Russia',
  'RW': 'Rwanda',
  'WS': 'Samoa',
  'SM': 'San Marino',
  'ST': 'S\u00e3o Tom\u00e9 & Pr\u00edncipe',
  'SA': 'Saudi Arabia',
  'SN': 'Senegal',
  'RS': 'Serbia',
  'SC': 'Seychelles',
  'SL': 'Sierra Leone',
  'SG': 'Singapore',
  'SX': 'Sint Maarten',
  'SK': 'Slovakia',
  'SI': 'Slovenia',
  'SB': 'Solomon Islands',
  'SO': 'Somalia',
  'ZA': 'South Africa',
  'GS': 'South Georgia & South Sandwich Islands',
  'KR': 'South Korea',
  'SS': 'South Sudan',
  'ES': 'Spain',
  'LK': 'Sri Lanka',
  'BL': 'St. Barth\u00e9lemy',
  'SH': 'St. Helena',
  'KN': 'St. Kitts & Nevis',
  'LC': 'St. Lucia',
  'MF': 'St. Martin',
  'PM': 'St. Pierre & Miquelon',
  'VC': 'St. Vincent & Grenadines',
  'SD': 'Sudan',
  'SR': 'Suriname',
  'SJ': 'Svalbard & Jan Mayen',
  'SE': 'Sweden',
  'CH': 'Switzerland',
  'SY': 'Syria',
  'TW': 'Taiwan',
  'TJ': 'Tajikistan',
  'TZ': 'Tanzania',
  'TH': 'Thailand',
  'TL': 'Timor-Leste',
  'TG': 'Togo',
  'TK': 'Tokelau',
  'TO': 'Tonga',
  'TT': 'Trinidad & Tobago',
  'TA': 'Tristan da Cunha',
  'TN': 'Tunisia',
  'TR': 'Turkey',
  'TM': 'Turkmenistan',
  'TC': 'Turks & Caicos Islands',
  'TV': 'Tuvalu',
  'UM': 'U.S. Outlying Islands',
  'VI': 'U.S. Virgin Islands',
  'UG': 'Uganda',
  'UA': 'Ukraine',
  'AE': 'United Arab Emirates',
  'GB': 'United Kingdom',
  'US': 'United States',
  'UY': 'Uruguay',
  'UZ': 'Uzbekistan',
  'VU': 'Vanuatu',
  'VA': 'Vatican City',
  'VE': 'Venezuela',
  'VN': 'Vietnam',
  'WF': 'Wallis & Futuna',
  'EH': 'Western Sahara',
  'YE': 'Yemen',
  'ZM': 'Zambia',
  'ZW': 'Zimbabwe'
});

/***/ }),

/***/ "9Vbv":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("ttAG");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("mSNy");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("RuLz");





function isEmailInputValid(email, isRequired) {
  if (!isRequired && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(email)) {
    return true;
  } else {
    return _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmail(email);
  }
}

function ConfirmEmail(v, email, isRequired) {
  if (!isRequired && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(email)) {
    return true;
  } else {
    return v === email;
  }
}

/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'email',
  displayName: 'Email',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'envelope',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].text,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.email.emailText'),
      isRequired: false,
      maxLength: 50,
      mask: '',
      questionType: 'email',
      displayOrder: 0,
      isDeleted: false,
      email: {
        isShowConfirmation: false,
        labels: {
          confirmation: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.email.confirmationEmail')
        }
      },
      value: {
        confirmation: ''
      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    return {
      q: question._id,
      t: question.answer
    };
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    return {
      questionId: question._id,
      question: question.question,
      answer: answer.t,
      createDate: answer.createDate
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.t) {
      question.email.defaultValue = questionAnswers.t;
      question.email.confirmationDefaultValue = questionAnswers.t;
    }
  },
  createValidationRules: function createValidationRules(questionModel) {
    // var rules = [];
    var componentDefaults = this.componentDefaults();
    var labels = componentDefaults.email.labels;

    if (questionModel.email.labels) {
      if (questionModel.email.labels.confirmation) {
        labels.confirmation = questionModel.email.labels.confirmation;
      }
    }

    var result = {
      email: []
    };

    if (questionModel.isRequired) {
      result.email.push(v => !!v || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('isRequired')));
    }

    result.email.push(v => isEmailInputValid(v, questionModel.isRequired) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.validationErrors.notValidEmail', {
      email: questionModel.question
    })));
    result.email.push(v => v.length < 51 || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.validationErrors.maxCharacters'), {
      field: questionModel.question,
      max: '50'
    }));

    if (questionModel.email.isShowConfirmation) {
      result.emailConfirm = function (email) {
        return [v => ConfirmEmail(v, email, questionModel.isRequired) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.validationErrors.emailsMustMatch'))];
      };
    }

    return result;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.email.defaultValue ? questionModel.email.defaultValue : '';
  }
});

/***/ }),

/***/ "A541":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _enums_countryenums__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("WQdS");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("mSNy");



/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'address',
  displayName: 'Address',
  displayOnToolbox: true,
  active: true,
  answerable: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].text,
  displayIconHTML: 'map-marker',
  componentDefaults: function componentDefaults() {
    return {
      questionType: 'address',
      question: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.address.whatIsYourAddress'),
      displayOrder: 0,
      isRequired: false,
      isDeleted: false,
      isActive: false,
      address: {
        labels: {
          addressLine1: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.address.name'),
          addressLine2: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.address.streetaddressLine2'),
          country: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('country'),
          city: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('city'),
          state: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.address.state'),
          pcode: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.address.postalCode')
        },
        defaultCountry: ['']
      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    var model = {
      q: question._id,
      a: {
        a1: question.answer.addressLine1,
        a2: question.answer.addressLine2,
        c: question.answer.city,
        s: question.answer.state,
        p: question.answer.pcode,
        l: question.answer.location,
        co: {
          c: question.answer.country,
          n: (Object(_enums_countryenums__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"])().find(x => x.code === question.answer.country) || {}).text
        }
      }
    };
    model.a.co.c = model.a.co.c === '' ? undefined : model.a.co.c;
    model.a.co.n = model.a.co.n === '' ? undefined : model.a.co.n;
    return model;
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.a) {
      question.address.defaultValue = {
        addressLine1: questionAnswers.a.a1,
        addressLine2: questionAnswers.a.a2,
        city: questionAnswers.a.c,
        state: questionAnswers.a.s,
        pcode: questionAnswers.a.p
      };

      if (questionAnswers.a.co) {
        question.address.defaultValue.country = questionAnswers.a.co.c;
        question.address.defaultValue.countryFullname = questionAnswers.a.co.n;
      }
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    var address = '';
    var map = null;

    if (answer.a) {
      if (!answer.a.a1) {
        answer.a.a1 = ' ';
      }

      if (!answer.a.a2) {
        answer.a.a2 = ' ';
      }

      if (!answer.a.c) {
        answer.a.c = ' ';
      }

      if (!answer.a.s) {
        answer.a.s = ' ';
      }

      if (!answer.a.p) {
        answer.a.p = ' ';
      }

      if (!answer.a.co) {
        answer.a.co = {
          n: ' '
        };
      }

      if (!answer.a.co.n) {
        answer.a.co.n = ' ';
      }

      if (answer.a.l && (answer.a.l.lat !== 0 || answer.a.l.lng !== 0)) {
        map = {
          title: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.address.openMaps'),
          url: "https://www.google.com/maps?q=".concat(answer.a.l.lat, ",").concat(answer.a.l.lng, "&ll=").concat(answer.a.l.lat, ",").concat(answer.a.l.lng, "&z=").concat(answer.a.l.z)
        };
      }

      address = answer.a.a1 + ' ' + answer.a.a2 + ' ' + answer.a.c + ' ' + answer.a.s + ' ' + answer.a.p + ' -' + answer.a.co.n;
    }

    var answerModel = {
      model: {
        address: address,
        map: map
      },
      type: 'component',
      questionType: 'address'
    };
    return {
      questionId: question._id,
      question: question.question,
      answer: answerModel,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var rules = {};

    if (questionModel.isRequired) {
      rules.addressLine1 = [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('isRequired')];

      if (questionModel.address.isShowAddressLine2) {
        rules.addressLine2 = [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('isRequired')];
      }

      if (questionModel.address.isShowCity) {
        rules.city = [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('isRequired')];
      }

      if (questionModel.address.isShowState) {
        rules.state = [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('isRequired')];
      }

      if (questionModel.address.isShowPcode) {
        rules.pcode = [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('isRequired')];
      }

      if (questionModel.address.isShowCountry) {
        rules.country = [v => !!v || _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('isRequired')];
      }
    }

    return rules;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel, formModel) {
    var defaultValue = questionModel.address.defaultValue || {};

    if (questionModel.address.isShowCountry) {
      if (!defaultValue.country && Array.isArray(questionModel.address.defaultCountry)) {
        defaultValue.country = (Object(_enums_countryenums__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"])().find(x => x.code === questionModel.address.defaultCountry[0]) || {}).code;
      } else {
        defaultValue.country = defaultValue.country || '';
      }
    }

    if (!formModel.googleMapApiKey && !defaultValue.location) {
      defaultValue.location = {
        lat: 0,
        lng: 0,
        z: 11
      };
    }

    return defaultValue;
  }
});

/***/ }),

/***/ "BMJk":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_PathErrorComponent_vue_vue_type_style_index_0_id_30bcf6ec_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("qkxg");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_PathErrorComponent_vue_vue_type_style_index_0_id_30bcf6ec_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_PathErrorComponent_vue_vue_type_style_index_0_id_30bcf6ec_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_PathErrorComponent_vue_vue_type_style_index_0_id_30bcf6ec_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "DH3W":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("bHM2");

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

/***/ "DZ0e":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("Lcxr");

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

/***/ "DmUZ":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeader_vue_vue_type_style_index_0_id_0f820dd0_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("6T0p");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeader_vue_vue_type_style_index_0_id_0f820dd0_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeader_vue_vue_type_style_index_0_id_0f820dd0_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeader_vue_vue_type_style_index_0_id_0f820dd0_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "DoXk":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_array_index_of__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXV3");
/* harmony import */ var core_js_modules_es_array_index_of__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_index_of__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("mSNy");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("Gppw");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(bson_objectid__WEBPACK_IMPORTED_MODULE_3__);




/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'rating',
  displayName: 'Rating',
  parentType: 'choice',
  displayOnToolbox: true,
  displayIconHTML: 'star',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].choice,
  componentDefaults: function componentDefaults() {
    return {
      questionType: 'choice',
      question: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.typeYourQuestionHere'),
      displayOrder: 0,
      isRequired: false,
      isDeleted: false,
      isActive: false,
      choice: {
        subType: 'rating',
        other: false,
        optionText: '',
        options: [{
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_3___default()().str,
          text: '1'
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_3___default()().str,
          text: '2'
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_3___default()().str,
          text: '3'
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_3___default()().str,
          text: '4'
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_3___default()().str,
          text: '5'
        }],
        defaultValue: [''],
        rateStyle: 'star'
      }
    };
  },
  data: function data() {
    return {
      rType: [{
        text: 'icon-star'
      }, {
        text: 'icon-heart'
      }]
    };
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel, formModel) {
    var answer = {};

    if (questionModel.answer) {
      answer = questionModel.answer;
    } else if (questionModel.defaultValue) {
      answer = questionModel.defaultValue[0];
    } else if (questionModel.choice.defaultValue) {
      answer = questionModel.choice.defaultValue[0];
    }

    var defaultVal = questionModel.choice.options.find(x => x._id === answer);

    if (defaultVal) {
      var position = questionModel.choice.options.indexOf(defaultVal);
      return questionModel.choice.options[position]._id;
    }

    return null;
  }
});

/***/ }),

/***/ "ExhV":
/***/ (function(module, exports) {

var conf = {
  env: 'dev',
  webVersion: '1.36.1',
  facebookPixelId: '175163836725648',
  googleFontsApiKey: 'AIzaSyD5lgwePf4J374qs_NwVt5MdxWz8xR3iKw',
  externalAuth: {
    google: {
      // dev@forms.app
      displayName: 'Google',
      providerName: 'google',
      clientId: '217206971805-365a4q8t8h1iqkp3tmtefoo6hruatg9b.apps.googleusercontent.com',
      apiGatewayCallbackUrl: '/auth/externallogin/google',
      webCallbackUrl: '/auth/google/callback'
    },
    facebook: {
      // social@forms.app
      displayName: 'Facebook',
      providerName: 'facebook',
      clientId: '2145744282377800',
      apiGatewayCallbackUrl: '/auth/externallogin/facebook',
      webCallbackUrl: '/auth/facebook/callback'
    },
    apple: {
      displayName: 'Apple',
      providerName: 'apple',
      clientId: 'web.form.app.singin',
      apiGatewayCallbackUrl: '/auth/externallogin/apple',
      webCallbackUrl: '/auth/apple/callback'
    },
    stackoverflow: {
      displayName: 'Stack Overflow',
      providerName: 'stackoverflow',
      clientId: 18702,
      apiGatewayCallbackUrl: '/auth/externallogin/stackoverflow',
      webCallbackUrl: '/auth/stackoverflow/callback'
    }
  },
  formPaymentGatewayOAuth: {
    stripe: {
      // FOR Local And DevServer
      live: {
        name: 'formpaymentstripelive',
        clientId: 'ca_GCYZgV6QqdRnaqVJYeqQ48G8HRd9n3hw',
        webCallbackUrl: '/auth/formpaymentstripelive/callback'
      },
      sandbox: {
        name: 'formpaymentstripesandbox',
        clientId: 'ca_GCYZgV6QqdRnaqVJYeqQ48G8HRd9n3hw',
        webCallbackUrl: '/auth/formpaymentstripesandbox/callback'
      }
    }
  },
  pushNotification: {
    services: {
      oneSignal: {
        appID: '38c85cb8-e758-4652-8b26-f01b5e80f7f2' // forms.local

      }
    }
  },
  conversionCodeLimit: 3,
  localStorageFormQuota: 5,
  googleMapsAPIKeys: {
    heatmap: 'AIzaSyAePmy4Lb2ZOc2b93b1vj9NpAaZMREFGYQ',
    locationSettings: 'AIzaSyAePmy4Lb2ZOc2b93b1vj9NpAaZMREFGYQ'
  },
  googleAnalyticsId: 'UA-116142152-2',
  questionLimit: 500,
  optionLimit: 300,
  productLimit: 200,
  productVariantLimit: 5,
  productVariantOptionLimit: 35,
  productTagLimit: 5,
  productPhotoLimit: 4,
  productDefinedCategoryLimit: 20,
  // toplamda kaç tane kategori tanımlanabiliyor
  productDefinedSubCategoryLimit: 10,
  // toplamda kaç tane alt kategori tanımlanabiliyor
  productCategoryLimit: 11,
  // bir product'a kaç tane kategori eklenebiliyor
  productDefinedNestedCategoryLimit: 2,
  // alt alta giren kategori sayısı (örn: kadın -> üst giyim -> tshirt -> kolsuz tshirt. 4 alt kategori oldu)
  explorerText: '<p class="center">Use chrome for a while for a better experience!</p>',
  feedbackFormId: '5b72b04a7be9d61aefedace7',
  // BOF Local Storage Key Names

  /**
   * yaratılacak form ilk form olacak, bunu kayıt olurken
   * google ads için tutuyoruz.
   */
  willCreateFirstForm: 'willCreateFirstForm',
  // EOF Local Storage Key Names
  reChaptcha: {
    v2: {
      siteKey: '6LflH8cZAAAAAE6_lR-FAWIbmEZTu4zjQnBQi1MF'
    },
    v3: {
      siteKey: '6LeAHscZAAAAAD46n6zcxflMqYYeUBPFbh75bf8f'
    }
  },
  getLangs: function getLangs() {
    return [{
      text: 'English',
      value: 'en'
    }, {
      text: 'Deutsch',
      value: 'de'
    }, {
      text: 'Français',
      value: 'fr'
    }, {
      text: 'Español',
      value: 'es'
    }, {
      text: '中文',
      value: 'zh'
    }, {
      text: 'Pусский',
      value: 'ru'
    }, {
      text: 'Türkçe',
      value: 'tr'
    }, {
      text: 'Português',
      value: 'pt'
    }, {
      text: 'Indonesia',
      value: 'id'
    }, {
      text: 'हिन्दी',
      value: 'hi'
    } // { text: 'Italiano', value: 'it' },
    // { text: 'Portuguese', value: 'pt' }
    ];
  },
  allowedFileTypes: [{
    name: 'PDF',
    ext: 'pdf',
    mime: 'application/pdf'
  }, {
    name: 'DOC',
    ext: 'doc',
    mime: 'application/msword'
  }, {
    name: 'DOCX',
    ext: 'docx',
    mime: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
  }, {
    name: 'XLS',
    ext: 'xls',
    mime: 'application/vnd.ms-excel'
  }, {
    name: 'XLSX',
    ext: 'xlsx',
    mime: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
  }, {
    name: 'PPT',
    ext: 'ppt',
    mime: 'application/vnd.ms-powerpoint'
  }, {
    name: 'PPTX',
    ext: 'pptx',
    mime: 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
  }, {
    name: 'ZIP',
    ext: 'zip',
    mime: 'application/zip'
  }, {
    name: 'RAR',
    ext: 'rar',
    mime: 'application/vnd.rar'
  }, {
    name: 'MP3',
    ext: 'mp3',
    mime: 'audio/mpeg'
  }, {
    name: 'WAV',
    ext: 'wav',
    mime: 'audio/x-wav'
  }, {
    name: 'MP4',
    ext: 'mp4',
    mime: 'video/mp4'
  }, {
    name: 'WMV',
    ext: 'wmv',
    mime: 'video/x-ms-wmv'
  }, {
    name: 'MOV',
    ext: 'mov',
    mime: 'video/quicktime'
  }, {
    name: 'JPG',
    ext: 'jpg',
    mime: 'image/jpg'
  }, {
    name: 'JPEG',
    ext: 'jpeg',
    mime: 'image/jpeg'
  }, {
    name: 'GIF',
    ext: 'gif',
    mime: 'image/gif'
  }, {
    name: 'PNG',
    ext: 'png',
    mime: 'image/png'
  }, {
    name: 'TIFF',
    ext: 'tiff',
    mime: 'image/tiff'
  }, {
    name: 'TIF',
    ext: 'tif',
    mime: 'image/tiff'
  }, {
    name: 'PSD',
    ext: 'psd',
    mime: 'image/vnd.adobe.photoshop'
  }]
};
module.exports = conf;

/***/ }),

/***/ "F/bx":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("mSNy");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("Gppw");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(bson_objectid__WEBPACK_IMPORTED_MODULE_2__);



/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'singlechoice',
  displayName: 'Single Selection',
  parentType: 'choice',
  displayOnToolbox: true,
  displayIconHTML: 'check-circle',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].choice,
  componentDefaults: function componentDefaults() {
    return {
      questionType: 'choice',
      question: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.typeYourQuestionHere'),
      displayOrder: 0,
      isRequired: false,
      isDeleted: false,
      isActive: false,
      choice: {
        subType: 'singlechoice',
        optionText: '',
        options: [{
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('option', {
            number: '1'
          })
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('option', {
            number: '2'
          })
        }],
        defaultValue: []
      }
    };
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.choice.defaultValue[0] || '';
  }
});

/***/ }),

/***/ "F6QW":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IButton_vue_vue_type_style_index_0_id_0b6e42b4_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("m4OE");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IButton_vue_vue_type_style_index_0_id_0b6e42b4_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IButton_vue_vue_type_style_index_0_id_0b6e42b4_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IButton_vue_vue_type_style_index_0_id_0b6e42b4_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "G8Jt":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("P0qE");


/* harmony default export */ __webpack_exports__["a"] = ({
  pay(payModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('payment/pay', payModel);
      var result = {
        success: false
      };

      if (apiResult.status === 200 || apiResult.status === 201 || apiResult.status === 204) {
        result.success = true;
        result.data = apiResult.response ? apiResult.response.data : apiResult.data;
      } else {
        result.errors = apiResult.response ? apiResult.response.data : apiResult.data;
      }

      return result;
    })();
  },

  externalServicePay(payModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('payment/externalservicepay', payModel);
      var result = {
        success: false
      };

      if (apiResult.status === 200 || apiResult.status === 201 || apiResult.status === 204) {
        result.success = true;
        result.data = apiResult.response ? apiResult.response.data : apiResult.data;
      } else {
        result.errors = apiResult.response ? apiResult.response.data : apiResult.data;
      }

      return result;
    })();
  },

  cancelSubscription(callback) {
    _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('payment/cancelsubscription', null, function (apiResult) {
      callback(apiResult.status === 204);
    });
  },

  getPayments(limit, skip) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('payment?skip=' + skip + '&limit=' + limit);
      var result = {
        success: false
      };

      if (apiResult.status === 200) {
        result.success = true;
        result.data = apiResult.response ? apiResult.response.data : apiResult.data;
      } else {
        result.errors = apiResult.response ? apiResult.response.data : apiResult.data;
      }

      return result;
    })();
  },

  getPayment(id) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('payment/' + id);
      var result = {
        success: false
      };

      if (apiResult.status === 200) {
        result.success = true;
        result.data = apiResult.response ? apiResult.response.data : apiResult.data;
      } else {
        result.errors = apiResult.response ? apiResult.response.data : apiResult.data;
      }

      return result;
    })();
  },

  getLastBillingAddress() {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('payment/lastbillingaddress');
      var result = {
        success: false
      };

      if (apiResult.status === 200) {
        result.success = true;
        result.data = apiResult.response ? apiResult.response.data : apiResult.data;
      } else {
        result.errors = apiResult.response ? apiResult.response.data : apiResult.data;
      }

      return result;
    })();
  },

  checkCcBin(checkBinModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('payment/checkccbin', checkBinModel);

      if (apiResult.status === 200) {
        return apiResult.data;
      }
    })();
  }

});

/***/ }),

/***/ "GLes":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "HadA":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "I6HT":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IText_vue_vue_type_style_index_0_id_7b1c5daf_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("dF6o");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IText_vue_vue_type_style_index_0_id_7b1c5daf_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IText_vue_vue_type_style_index_0_id_7b1c5daf_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IText_vue_vue_type_style_index_0_id_7b1c5daf_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "K/kh":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("416N");
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("YiV1");


/* harmony default export */ __webpack_exports__["a"] = ({
  questionTypes: null,
  questionTypesComponents: null,
  questionTypesMainComponents: null,
  // setQuestionTypesComponents: function () {
  // 	if (this.questionTypesComponents === null) {
  // 		this.questionTypesComponents = createNewComponentsObject();
  // 		this.questionTypesMainComponents = createNewComponentsObject();
  // 		// var questionTypes = this.getAllQuestionTypes();
  // 		// for (var questionTypeName in questionTypes) {
  // 		// 	var questionType = questionTypes[questionTypeName];
  // 		// 	if (questionType.parentType) {
  // 		// 		var parentType = questionTypes[questionType.parentType];
  // 		// 		var parentComponentPath = './' + parentType.name.toLowerCase() + '/components/';
  // 		// 		SetCompanentItems(this.questionTypesComponents, parentComponentPath, parentType);
  // 		// 		var subComponentPath = './' + questionType.parentType.toLowerCase() + '/subtypes/' + questionTypeName.toLowerCase() + '/components/';
  // 		// 		SetCompanentItems(this.questionTypesComponents, subComponentPath, questionType);
  // 		// 	} else {
  // 		// 		var questionTypeComponentPath = './' + questionTypeName.toLowerCase() + '/components/';
  // 		// 		SetCompanentItems(this.questionTypesComponents, questionTypeComponentPath, questionType);
  // 		// 		SetCompanentItems(this.questionTypesMainComponents, questionTypeComponentPath, questionType);
  // 		// 	}
  // 		// }
  // 	}
  // },
  getAllQuestionTypes: function getAllQuestionTypes() {
    return _questiontypes__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"];
  },
  getQuestionTypesComponents: function getQuestionTypesComponents() {
    this.setQuestionTypesComponents();
    return this.questionTypesComponents;
  },
  getQuestionTypesMainComponents: function getQuestionTypesMainComponents() {
    this.setQuestionTypesComponents();
    return this.questionTypesMainComponents;
  },
  getQuestionTypesSubComponents: function getQuestionTypesSubComponents(parentType) {
    var subQuestionTypesComponents = createNewComponentsObject();
    var questionTypes = this.getAllQuestionTypes();

    for (var questionTypeName in questionTypes) {
      var questionType = questionTypes[questionTypeName];

      if (questionType.parentType === parentType) {// var componentPath = './' + questionType.parentType.toLowerCase() + '/subtypes/' + questionTypeName.toLowerCase() + '/components/';
        // SetCompanentItems(subQuestionTypesComponents, componentPath, questionType);
      }
    }

    return subQuestionTypesComponents;
  },
  getComponentDefaults: function getComponentDefaults(questionTypeName, subTypeName) {
    var componentDefaults;

    if (subTypeName) {
      var subType = this.getQuestionTypeByTypeName(subTypeName.toLowerCase());

      if (subType.active && subType.componentDefaults) {
        componentDefaults = subType.componentDefaults();
      }
    }

    if (!componentDefaults) {
      var questionType = this.getQuestionTypeByTypeName(questionTypeName.toLowerCase());
      componentDefaults = questionType.active ? questionType.componentDefaults() : undefined;
    }

    return componentDefaults;
  },
  getComponentAttributes: function getComponentAttributes(questionTypeName, subTypeName) {
    var componentAttributes;

    if (subTypeName) {
      var subType = this.getQuestionTypeByTypeName(subTypeName);

      if (subType.active && subType.componentAttributes) {
        componentAttributes = subType.componentAttributes();
      }
    }

    if (!componentAttributes) {
      var questionType = this.getQuestionTypeByTypeName(questionTypeName);
      componentAttributes = questionType.active ? questionType.componentAttributes() : undefined;
    }

    return componentAttributes;
  },
  getQuestionTypeByTypeName: function getQuestionTypeByTypeName(questionName) {
    return this.getAllQuestionTypes()[questionName];
  },
  getQuestionTypesGroups: function getQuestionTypesGroups() {
    return _questiontypesgroups__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"];
  },
  getQuestionTypesByGroup: function getQuestionTypesByGroup(groupType) {
    var returnObject = {};
    var questionTypes = this.getAllQuestionTypes();

    for (var questionTypeName in questionTypes) {
      var questionType = questionTypes[questionTypeName];

      if (questionType.group === groupType) {
        returnObject[questionTypeName] = questionType;
      }
    }

    return returnObject;
  } // getQuestionTypeComponent: function (type, name, cb = null) {
  // 	let compName = `component${type}${name.toLowerCase()}`;
  // 	if (typeof cb !== 'function') {
  // 		return import(/* webpackChunkName: "[request]" */ compName);
  // 	}
  // 	import(/* webpackChunkName: "[request]" */ compName).then(cb);
  // }

});

function createNewComponentsObject() {
  return {
    InputComponents: {},
    DesignComponents: {},
    DesignAttributesComponents: {},
    ToolboxItemComponents: {}
  };
} // function SetCompanentItems (companentContainer, componentPath, questionType, isFormView = false) {
// 	if (questionType.active) {
// 		companentContainer.InputComponents['componentinput' + questionType.name.toLowerCase()] = require(componentPath + 'Input').default;
// 		if (!isFormView) {
// 			companentContainer.DesignComponents['componentdesign' + questionType.name.toLowerCase()] = require(componentPath + 'Design').default;
// 			companentContainer.DesignAttributesComponents['componentdesignattributes' + questionType.name.toLowerCase()] = require(componentPath + 'DesignAttributes').default;
// 		}
// 	}
// 	if (questionType.displayOnToolbox && !isFormView) {
// 		companentContainer.ToolboxItemComponents['componenttoolboxitem' + questionType.name.toLowerCase()] = require(componentPath + 'ToolboxItem').default;
// 	}
// }

/***/ }),

/***/ "Lcxr":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "MKyv":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ISelect_vue_vue_type_style_index_0_id_d9494904_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("VGI5");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ISelect_vue_vue_type_style_index_0_id_d9494904_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ISelect_vue_vue_type_style_index_0_id_d9494904_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ISelect_vue_vue_type_style_index_0_id_d9494904_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "Msdk":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("mSNy");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("RuLz");



/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'fullname',
  displayName: 'Full Name',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'user',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].text,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: false,
      displayOrder: 0,
      isDeleted: false,
      questionType: 'fullname',
      fullname: {
        middle: false,
        labels: {
          firstName: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('firstName'),
          lastName: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('lastName'),
          prefix: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('prefix'),
          middle: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('middleName'),
          suffix: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('suffix')
        }
      },
      value: {
        firstName: '',
        lastName: '',
        prefix: '',
        middle: '',
        suffix: ''
      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    return {
      q: question._id,
      fn: {
        f: question.answer.firstName,
        l: question.answer.lastName,
        m: question.answer.middle,
        p: question.answer.prefix,
        s: question.answer.suffix
      }
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.fn) {
      question.fullname.defaultValue = {
        firstName: questionAnswers.fn.f,
        lastName: questionAnswers.fn.l,
        middle: questionAnswers.fn.m,
        prefix: questionAnswers.fn.p,
        suffix: questionAnswers.fn.s
      };
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    var answerText = '';

    if (answer.fn) {
      answer.fn.p = !answer.fn.p ? ' ' : answer.fn.p + ' ';
      answer.fn.f = !answer.fn.f ? ' ' : answer.fn.f + ' ';
      answer.fn.l = !answer.fn.l ? ' ' : answer.fn.l + ' ';
      answer.fn.m = !answer.fn.m ? ' ' : answer.fn.m + ' ';
      answer.fn.s = !answer.fn.s ? ' ' : answer.fn.s;
      answerText = answer.fn.p + answer.fn.f + answer.fn.m + answer.fn.l + answer.fn.s;
    }

    return {
      questionId: question._id,
      question: 'Full Name',
      answer: answerText,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var componentDefaults = this.componentDefaults();
    var labels = componentDefaults.fullname.labels;

    if (questionModel.fullname.labels) {
      if (questionModel.fullname.labels.firstName) {
        labels.firstName = questionModel.fullname.labels.firstName;
      }

      if (questionModel.fullname.labels.lastName) {
        labels.lastName = questionModel.fullname.labels.lastName;
      }
    }

    var rules = {};

    if (questionModel.isRequired) {
      rules.fn = [v => !!v || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('isRequired'))];
      rules.ln = [v => !!v || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('isRequired'))];
    }

    return rules;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.fullname.defaultValue ? questionModel.fullname.defaultValue : {};
  }
});

/***/ }),

/***/ "N7iS":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  'AF': 'Afganistan',
  'ZA': 'Afrika Selatan',
  'XA': 'Aksen Asing',
  'AL': 'Albania',
  'DZ': 'Aljazair',
  'US': 'Amerika Serikat',
  'AD': 'Andorra',
  'AO': 'Angola',
  'AI': 'Anguilla',
  'AQ': 'Antartika',
  'AG': 'Antigua dan Barbuda',
  'SA': 'Arab Saudi',
  'AR': 'Argentina',
  'AM': 'Armenia',
  'AW': 'Aruba',
  'AU': 'Australia',
  'AT': 'Austria',
  'AZ': 'Azerbaijan',
  'BS': 'Bahama',
  'BH': 'Bahrain',
  'BD': 'Bangladesh',
  'BB': 'Barbados',
  'NL': 'Belanda',
  'BQ': 'Belanda Karibia',
  'BY': 'Belarus',
  'BE': 'Belgia',
  'BZ': 'Belize',
  'BJ': 'Benin',
  'BM': 'Bermuda',
  'BT': 'Bhutan',
  'BO': 'Bolivia',
  'BA': 'Bosnia dan Herzegovina',
  'BW': 'Botswana',
  'BR': 'Brasil',
  'BN': 'Brunei',
  'BG': 'Bulgaria',
  'BF': 'Burkina Faso',
  'BI': 'Burundi',
  'TD': 'Cad',
  'CZ': 'Ceko',
  'EA': 'Ceuta dan Melilla',
  'CL': 'Cile',
  'CW': 'Cura\u00e7ao',
  'DK': 'Denmark',
  'DG': 'Diego Garcia',
  'DM': 'Dominika',
  'EC': 'Ekuador',
  'SV': 'El Salvador',
  'ER': 'Eritrea',
  'EE': 'Estonia',
  'SZ': 'eSwatini',
  'ET': 'Etiopia',
  'FJ': 'Fiji',
  'PH': 'Filipina',
  'FI': 'Finlandia',
  'GA': 'Gabon',
  'GM': 'Gambia',
  'GE': 'Georgia',
  'GS': 'Georgia Selatan & Kep. Sandwich Selatan',
  'GH': 'Ghana',
  'GI': 'Gibraltar',
  'GD': 'Grenada',
  'GL': 'Grinlandia',
  'GP': 'Guadeloupe',
  'GU': 'Guam',
  'GT': 'Guatemala',
  'GG': 'Guernsey',
  'GN': 'Guinea',
  'GQ': 'Guinea Ekuatorial',
  'GW': 'Guinea-Bissau',
  'GY': 'Guyana',
  'GF': 'Guyana Prancis',
  'HT': 'Haiti',
  'HN': 'Honduras',
  'HK': 'Hong Kong SAR Tiongkok',
  'HU': 'Hungaria',
  'IN': 'India',
  'ID': 'Indonesia',
  'GB': 'Inggris Raya',
  'IQ': 'Irak',
  'IR': 'Iran',
  'IE': 'Irlandia',
  'IS': 'Islandia',
  'IL': 'Israel',
  'IT': 'Italia',
  'JM': 'Jamaika',
  'JP': 'Jepang',
  'DE': 'Jerman',
  'JE': 'Jersey',
  'DJ': 'Jibuti',
  'NC': 'Kaledonia Baru',
  'KH': 'Kamboja',
  'CM': 'Kamerun',
  'CA': 'Kanada',
  'KZ': 'Kazakstan',
  'KE': 'Kenya',
  'AX': 'Kepulauan Aland',
  'IC': 'Kepulauan Canary',
  'KY': 'Kepulauan Cayman',
  'CC': 'Kepulauan Cocos (Keeling)',
  'CK': 'Kepulauan Cook',
  'FO': 'Kepulauan Faroe',
  'FK': 'Kepulauan Malvinas',
  'MP': 'Kepulauan Mariana Utara',
  'MH': 'Kepulauan Marshall',
  'NF': 'Kepulauan Norfolk',
  'PN': 'Kepulauan Pitcairn',
  'SB': 'Kepulauan Solomon',
  'SJ': 'Kepulauan Svalbard dan Jan Mayen',
  'UM': 'Kepulauan Terluar A.S.',
  'TC': 'Kepulauan Turks dan Caicos',
  'VI': 'Kepulauan Virgin A.S.',
  'VG': 'Kepulauan Virgin Inggris',
  'WF': 'Kepulauan Wallis dan Futuna',
  'KG': 'Kirgistan',
  'KI': 'Kiribati',
  'CO': 'Kolombia',
  'KM': 'Komoro',
  'CG': 'Kongo - Brazzaville',
  'CD': 'Kongo - Kinshasa',
  'KR': 'Korea Selatan',
  'KP': 'Korea Utara',
  'XK': 'Kosovo',
  'CR': 'Kosta Rika',
  'HR': 'Kroasia',
  'CU': 'Kuba',
  'KW': 'Kuwait',
  'LA': 'Laos',
  'LV': 'Latvia',
  'LB': 'Lebanon',
  'LS': 'Lesotho',
  'LR': 'Liberia',
  'LY': 'Libia',
  'LI': 'Liechtenstein',
  'LT': 'Lituania',
  'LU': 'Luksemburg',
  'MG': 'Madagaskar',
  'MO': 'Makau SAR Tiongkok',
  'MK': 'Makedonia Utara',
  'MV': 'Maladewa',
  'MW': 'Malawi',
  'MY': 'Malaysia',
  'ML': 'Mali',
  'MT': 'Malta',
  'MA': 'Maroko',
  'MQ': 'Martinik',
  'MR': 'Mauritania',
  'MU': 'Mauritius',
  'YT': 'Mayotte',
  'MX': 'Meksiko',
  'EG': 'Mesir',
  'FM': 'Mikronesia',
  'MD': 'Moldova',
  'MC': 'Monako',
  'MN': 'Mongolia',
  'ME': 'Montenegro',
  'MS': 'Montserrat',
  'MZ': 'Mozambik',
  'MM': 'Myanmar (Burma)',
  'NA': 'Namibia',
  'NR': 'Nauru',
  'NP': 'Nepal',
  'NE': 'Niger',
  'NG': 'Nigeria',
  'NI': 'Nikaragua',
  'NU': 'Niue',
  'NO': 'Norwegia',
  'OM': 'Oman',
  'PK': 'Pakistan',
  'PW': 'Palau',
  'PA': 'Panama',
  'CI': 'Pantai Gading',
  'PG': 'Papua Nugini',
  'PY': 'Paraguay',
  'PE': 'Peru',
  'PL': 'Polandia',
  'PF': 'Polinesia Prancis',
  'PT': 'Portugal',
  'FR': 'Prancis',
  'XB': 'Pseudo-Bidi',
  'PR': 'Puerto Riko',
  'AC': 'Pulau Ascension',
  'CX': 'Pulau Christmas',
  'IM': 'Pulau Man',
  'QA': 'Qatar',
  'CF': 'Republik Afrika Tengah',
  'DO': 'Republik Dominika',
  'RE': 'R\u00e9union',
  'RO': 'Rumania',
  'RU': 'Rusia',
  'RW': 'Rwanda',
  'EH': 'Sahara Barat',
  'BL': 'Saint Barth\u00e9lemy',
  'SH': 'Saint Helena',
  'KN': 'Saint Kitts dan Nevis',
  'LC': 'Saint Lucia',
  'MF': 'Saint Martin',
  'PM': 'Saint Pierre dan Miquelon',
  'VC': 'Saint Vincent dan Grenadines',
  'WS': 'Samoa',
  'AS': 'Samoa Amerika',
  'SM': 'San Marino',
  'ST': 'Sao Tome dan Principe',
  'NZ': 'Selandia Baru',
  'SN': 'Senegal',
  'RS': 'Serbia',
  'SC': 'Seychelles',
  'SL': 'Sierra Leone',
  'SG': 'Singapura',
  'SX': 'Sint Maarten',
  'CY': 'Siprus',
  'SK': 'Slovakia',
  'SI': 'Slovenia',
  'SO': 'Somalia',
  'ES': 'Spanyol',
  'LK': 'Sri Lanka',
  'SD': 'Sudan',
  'SS': 'Sudan Selatan',
  'SY': 'Suriah',
  'SR': 'Suriname',
  'SE': 'Swedia',
  'CH': 'Swiss',
  'TW': 'Taiwan',
  'TJ': 'Tajikistan',
  'CV': 'Tanjung Verde',
  'TZ': 'Tanzania',
  'TH': 'Thailand',
  'TL': 'Timor Leste',
  'CN': 'Tiongkok',
  'TG': 'Togo',
  'TK': 'Tokelau',
  'TO': 'Tonga',
  'TT': 'Trinidad dan Tobago',
  'TA': 'Tristan da Cunha',
  'TN': 'Tunisia',
  'TR': 'Turki',
  'TM': 'Turkimenistan',
  'TV': 'Tuvalu',
  'UG': 'Uganda',
  'UA': 'Ukraina',
  'AE': 'Uni Emirat Arab',
  'UY': 'Uruguay',
  'UZ': 'Uzbekistan',
  'VU': 'Vanuatu',
  'VA': 'Vatikan',
  'VE': 'Venezuela',
  'VN': 'Vietnam',
  'IO': 'Wilayah Inggris di Samudra Hindia',
  'TF': 'Wilayah Kutub Selatan Prancis',
  'PS': 'Wilayah Palestina',
  'YE': 'Yaman',
  'JO': 'Yordania',
  'GR': 'Yunani',
  'ZM': 'Zambia',
  'ZW': 'Zimbabwe'
});

/***/ }),

/***/ "NPEM":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_string_trim__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("SYor");
/* harmony import */ var core_js_modules_es_string_trim__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_trim__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("YiV1");
/* harmony import */ var _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("ttAG");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("mSNy");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("RuLz");





/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'phone',
  displayName: 'Phone',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'phone',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].text,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: false,
      maxLength: 0,
      questionType: 'phone',
      displayOrder: 0,
      isDeleted: false,
      phone: {
        mask: false,
        maskPattern: null,
        isShowCountrycode: false,
        isShowAreacode: false,
        isShowExtension: false,
        labels: {
          countrycode: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('questionTypes.phone.countryCode'),
          areacode: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('questionTypes.phone.areaCode'),
          extension: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('questionTypes.phone.extension')
        }
      },
      value: {
        countrycode: '',
        areacode: '',
        extension: ''
      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    return {
      q: question._id,
      p: {
        c: question.answer.countrycode,
        a: question.answer.areacode,
        p: question.answer.phone,
        e: question.answer.extension
      }
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.p) {
      question.phone.defaultValue = {
        countrycode: questionAnswers.p.c,
        lastName: questionAnswers.p.l,
        areacode: questionAnswers.p.a,
        phone: questionAnswers.p.p,
        extension: questionAnswers.p.e
      };
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    var answerText = '';

    if (answer.p) {
      !answer.p.c ? answer.p.c = ' ' : answer.p.c = ' ' + answer.p.c + ' ';
      !answer.p.e ? answer.p.e = ' ' : answer.p.e = ' Ext:' + answer.p.e + ' ';
      !answer.p.a ? answer.p.a = ' ' : answer.p.a = ' ' + answer.p.a + ' ';
      !answer.p.p ? answer.p.p = ' ' : answer.p.p = ' ' + answer.p.p + ' ';
      answerText = answer.p.c + answer.p.a + answer.p.p + answer.p.e;
    } else {
      answerText = '';
    }

    return {
      questionId: question._id,
      question: question.question,
      answer: answerText,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var rules = [];

    if (questionModel.phone.mask && questionModel.phone.maskPattern && questionModel.phone.maskPattern.trim() !== '') {
      rules.push(v => _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_2__["default"].isEmpty(v.phone) || !_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_2__["default"].isEmpty(v.phone) && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_2__["default"].isMaskedValueValid(v.phone, questionModel.phone.maskPattern) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_4__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('fieldIsNotValid', {
        field: questionModel.question
      })));
    }

    if (questionModel.isRequired) {
      rules.push(v => {
        if (!v) {
          return _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('isRequired');
        } else if (questionModel.phone.isShowCountrycode && !v.countrycode) {
          return _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('isRequired');
        } else if (questionModel.phone.isShowExtension && !v.extension) {
          return _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('isRequired');
        } else if (questionModel.phone.isShowAreacode && !v.areacode) {
          return _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('isRequired');
        } else if (!v.phone) {
          return _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('isRequired');
        }

        return true;
      });
    }

    return rules;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    var defaultVal = questionModel.phone.defaultValue ? questionModel.phone.defaultValue : {};

    if (questionModel.phone.mask) {
      defaultVal.phone = '';
    }

    return defaultVal;
  }
});

/***/ }),

/***/ "NRfZ":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var config = __webpack_require__("ExhV");

config.env = 'prod';
config.baseUrl = 'https://forms.app';
config.apiGateway = 'https://api.forms.app';
config.fileApi = 'https://file.forms.app';
config.formPaymentGatewayOAuth.stripe.sandbox.clientId = 'ca_GEY5H5YN4KBeMnMzITqLwpvcaDxp8zTN'; // FOR Production

config.formPaymentGatewayOAuth.stripe.live.clientId = 'ca_GEY5wJXhatdOlE7XN9IjnXXYvr4eV3ik'; // FOR Production

config.pushNotification.services.oneSignal.appID = '9c3e5b13-58d9-4000-b0e7-02455e922e10';
config.googleMapsAPIKeys = {
  heatmap: 'AIzaSyClYkrwHL5Yos3OGpQ3ZedPW3rAvhLUhZA',
  locationSettings: 'AIzaSyDKXUc3h1xoLa1oKdCOhb_Q6pz_soTitGg'
};
config.sentry = false;
/* harmony default export */ __webpack_exports__["a"] = (config);

/***/ }),

/***/ "NcpN":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("P0qE");


/* harmony default export */ __webpack_exports__["a"] = ({
  getByUsername(username, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var getUrl = 'user/infobyname/' + username;

      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(getUrl, null, callback);
      } else {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(getUrl)).data;
      }
    })();
  },

  getByUserId(userId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var getUrl = 'user/infobyid/' + userId;

      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(getUrl, null, callback);
      } else {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(getUrl)).data;
      }
    })();
  },

  getUserDetail(callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      // console.log('getUserDetail called!');
      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('user/detail', null, callback);
      } else {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('user/detail')).data;
      }
    })();
  },

  getUserActivePackage() {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('user/activepackage');
      return apiResult;
    })();
  },

  changeUserDetail(infoName, infoModel, callback) {
    var _this = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('user/' + infoName, infoModel, callback);
      } else {
        var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('user/' + infoName, infoModel);
        return _this.createReturnObject(apiResult);
      }
    })();
  },

  createReturnObject(apiResult) {
    var withAccessToken = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
    var result = {
      success: false
    };

    if (apiResult.status === 200 || apiResult.status === 201 || apiResult.status === 204) {
      result.success = true; // result.createDate = apiResult.data.createDate;

      if (withAccessToken) {
        result.access_token = apiResult.data.access_token;
      }
    } else {
      result.errors = apiResult.response.data;
    }

    return result;
  },

  getLabelSet(labelSetId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var getUrl = 'user/labelset/' + labelSetId;

      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(getUrl, null, callback);
      } else {
        var response = (yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get(getUrl)).data;
        response.labels = JSON.parse(response.labels);
        return response;
      }
    })();
  }

});

/***/ }),

/***/ "P0qE":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("vDqi");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var config__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("NRfZ");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("oCYn");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("mSNy");





var apis = {
  gateway: function gateway() {
    return apiRequest(config__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].apiGateway);
  },
  file: function file() {
    return apiRequest(config__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].fileApi);
  }
};

function returnServerError(error) {
  var res;
  var resData;

  if (error.response) {
    res = error.response;
    resData = res;
  } else if (error.message) {
    resData = error.message;
  }

  if (resData) {
    // formların end pointlerinden de 404 döndürdüğümüzden buraya kesinlikle 404 eklemiyoruz. Daha önce eklenen 404 kaldırıldı.
    if (resData.status === 500 || resData.status === 503 || resData === 'Network Error') {
      vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$swal({
        allowOutsideClick: false,
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonText: _lang__WEBPACK_IMPORTED_MODULE_4__["default"].t('ok'),
        title: _lang__WEBPACK_IMPORTED_MODULE_4__["default"].t('warning'),
        text: _lang__WEBPACK_IMPORTED_MODULE_4__["default"].t('notification.anErrorOccurred'),
        icon: 'error'
      }).then(() => {
        if (resData === 'Network Error') {
          // maintenance mode
          location.reload(true);
        }
      });
      throw _lang__WEBPACK_IMPORTED_MODULE_4__["default"].t('notification.anErrorOccurred');
    } // Token kontrolü için eklenen bu kod login gerekli formları da etkilediğinden kaldırıldı, başka çözüm üretilecek

    /* else if (resData.status === 401) { // token geçersizse
    	Vue.prototype.$root.logout(location.pathname);
    	throw i18n.t('notification.anErrorOccurred');
    } */

  }

  return res;
}

function apiRequest(baseURL) {
  var axiosCreateOptions = {
    baseURL: baseURL
  };
  var bearer = 'none';

  if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
    bearer = 'Bearer ' + vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.getToken();
  }

  axiosCreateOptions.headers = {
    'Authorization': bearer
  };
  return axios__WEBPACK_IMPORTED_MODULE_1___default.a.create(axiosCreateOptions);
}

function runRequest(_x, _x2, _x3, _x4) {
  return _runRequest.apply(this, arguments);
}

function _runRequest() {
  _runRequest = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* (method, url, params, callback) {
    var api = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 'gateway';

    if (typeof callback === 'function') {
      apis[api]()[method](url, params).then(callback).catch(function (error) {
        callback(returnServerError(error));
      });
    } else {
      var apiResult = yield apis[api]()[method](url, params).then(function (result) {
        return result;
      }).catch(function (error) {
        return returnServerError(error);
      });
      return apiResult;
    }
  });
  return _runRequest.apply(this, arguments);
}

/* harmony default export */ __webpack_exports__["a"] = ({
  get: function () {
    var _get = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* (url, params, callback, api) {
      return yield runRequest('get', url, params, callback, api);
    });

    function get(_x5, _x6, _x7, _x8) {
      return _get.apply(this, arguments);
    }

    return get;
  }(),
  post: function () {
    var _post = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* (url, params, callback, api) {
      return yield runRequest('post', url, params, callback, api);
    });

    function post(_x9, _x10, _x11, _x12) {
      return _post.apply(this, arguments);
    }

    return post;
  }(),
  put: function () {
    var _put = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* (url, params, callback, api) {
      return yield runRequest('put', url, params, callback, api);
    });

    function put(_x13, _x14, _x15, _x16) {
      return _put.apply(this, arguments);
    }

    return put;
  }(),
  delete: function () {
    var _delete2 = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* (url, params, callback, api) {
      return yield runRequest('delete', url, params, callback, api);
    });

    function _delete(_x17, _x18, _x19, _x20) {
      return _delete2.apply(this, arguments);
    }

    return _delete;
  }()
});

/***/ }),

/***/ "P4uP":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  'AF': 'Afeganist\u00e3o',
  'ZA': '\u00c1frica do Sul',
  'AL': 'Alb\u00e2nia',
  'DE': 'Alemanha',
  'AD': 'Andorra',
  'AO': 'Angola',
  'AI': 'Anguila',
  'AQ': 'Ant\u00e1rtida',
  'AG': 'Ant\u00edgua e Barbuda',
  'SA': 'Ar\u00e1bia Saudita',
  'DZ': 'Arg\u00e9lia',
  'AR': 'Argentina',
  'AM': 'Arm\u00eania',
  'AW': 'Aruba',
  'AU': 'Austr\u00e1lia',
  'AT': '\u00c1ustria',
  'AZ': 'Azerbaij\u00e3o',
  'BS': 'Bahamas',
  'BH': 'Bahrein',
  'BD': 'Bangladesh',
  'BB': 'Barbados',
  'BE': 'B\u00e9lgica',
  'BZ': 'Belize',
  'BJ': 'Benin',
  'BM': 'Bermudas',
  'BY': 'Bielorr\u00fassia',
  'BO': 'Bol\u00edvia',
  'BA': 'B\u00f3snia e Herzegovina',
  'BW': 'Botsuana',
  'BR': 'Brasil',
  'BN': 'Brunei',
  'BG': 'Bulg\u00e1ria',
  'BF': 'Burquina Faso',
  'BI': 'Burundi',
  'BT': 'But\u00e3o',
  'CV': 'Cabo Verde',
  'CM': 'Camar\u00f5es',
  'KH': 'Camboja',
  'CA': 'Canad\u00e1',
  'QA': 'Catar',
  'KZ': 'Cazaquist\u00e3o',
  'EA': 'Ceuta e Melilla',
  'TD': 'Chade',
  'CL': 'Chile',
  'CN': 'China',
  'CY': 'Chipre',
  'VA': 'Cidade do Vaticano',
  'CO': 'Col\u00f4mbia',
  'KM': 'Comores',
  'CD': 'Congo - Kinshasa',
  'KP': 'Coreia do Norte',
  'KR': 'Coreia do Sul',
  'CI': 'Costa do Marfim',
  'CR': 'Costa Rica',
  'HR': 'Cro\u00e1cia',
  'CU': 'Cuba',
  'CW': 'Cura\u00e7ao',
  'DG': 'Diego Garcia',
  'DK': 'Dinamarca',
  'DJ': 'Djibuti',
  'DM': 'Dominica',
  'EG': 'Egito',
  'SV': 'El Salvador',
  'AE': 'Emirados \u00c1rabes Unidos',
  'EC': 'Equador',
  'ER': 'Eritreia',
  'SK': 'Eslov\u00e1quia',
  'SI': 'Eslov\u00eania',
  'ES': 'Espanha',
  'US': 'Estados Unidos',
  'EE': 'Est\u00f4nia',
  'ET': 'Eti\u00f3pia',
  'FJ': 'Fiji',
  'PH': 'Filipinas',
  'FI': 'Finl\u00e2ndia',
  'FR': 'Fran\u00e7a',
  'GA': 'Gab\u00e3o',
  'GM': 'G\u00e2mbia',
  'GH': 'Gana',
  'GE': 'Ge\u00f3rgia',
  'GI': 'Gibraltar',
  'GD': 'Granada',
  'GR': 'Gr\u00e9cia',
  'GL': 'Groenl\u00e2ndia',
  'GP': 'Guadalupe',
  'GU': 'Guam',
  'GT': 'Guatemala',
  'GG': 'Guernsey',
  'GY': 'Guiana',
  'GF': 'Guiana Francesa',
  'GN': 'Guin\u00e9',
  'GQ': 'Guin\u00e9 Equatorial',
  'GW': 'Guin\u00e9-Bissau',
  'HT': 'Haiti',
  'HN': 'Honduras',
  'HK': 'Hong Kong, RAE da China',
  'HU': 'Hungria',
  'YE': 'I\u00eamen',
  'CX': 'Ilha Christmas',
  'AC': 'Ilha de Ascens\u00e3o',
  'IM': 'Ilha de Man',
  'NF': 'Ilha Norfolk',
  'AX': 'Ilhas Aland',
  'IC': 'Ilhas Can\u00e1rias',
  'KY': 'Ilhas Cayman',
  'CC': 'Ilhas Cocos (Keeling)',
  'CK': 'Ilhas Cook',
  'FO': 'Ilhas Faroe',
  'GS': 'Ilhas Ge\u00f3rgia do Sul e Sandwich do Sul',
  'FK': 'Ilhas Malvinas',
  'MP': 'Ilhas Marianas do Norte',
  'MH': 'Ilhas Marshall',
  'UM': 'Ilhas Menores Distantes dos EUA',
  'PN': 'Ilhas Pitcairn',
  'SB': 'Ilhas Salom\u00e3o',
  'TC': 'Ilhas Turcas e Caicos',
  'VI': 'Ilhas Virgens Americanas',
  'VG': 'Ilhas Virgens Brit\u00e2nicas',
  'IN': '\u00cdndia',
  'ID': 'Indon\u00e9sia',
  'IR': 'Ir\u00e3',
  'IQ': 'Iraque',
  'IE': 'Irlanda',
  'IS': 'Isl\u00e2ndia',
  'IL': 'Israel',
  'IT': 'It\u00e1lia',
  'JM': 'Jamaica',
  'JP': 'Jap\u00e3o',
  'JE': 'Jersey',
  'JO': 'Jord\u00e2nia',
  'XK': 'Kosovo',
  'KW': 'Kuwait',
  'LA': 'Laos',
  'LS': 'Lesoto',
  'LV': 'Let\u00f4nia',
  'LB': 'L\u00edbano',
  'LR': 'Lib\u00e9ria',
  'LY': 'L\u00edbia',
  'LI': 'Liechtenstein',
  'LT': 'Litu\u00e2nia',
  'LU': 'Luxemburgo',
  'MO': 'Macau, RAE da China',
  'MK': 'Maced\u00f4nia do Norte',
  'MG': 'Madagascar',
  'MY': 'Mal\u00e1sia',
  'MW': 'Malaui',
  'MV': 'Maldivas',
  'ML': 'Mali',
  'MT': 'Malta',
  'MA': 'Marrocos',
  'MQ': 'Martinica',
  'MU': 'Maur\u00edcio',
  'MR': 'Maurit\u00e2nia',
  'YT': 'Mayotte',
  'MX': 'M\u00e9xico',
  'MM': 'Mianmar (Birm\u00e2nia)',
  'FM': 'Micron\u00e9sia',
  'MZ': 'Mo\u00e7ambique',
  'MD': 'Moldova',
  'MC': 'M\u00f4naco',
  'MN': 'Mong\u00f3lia',
  'ME': 'Montenegro',
  'MS': 'Montserrat',
  'NA': 'Nam\u00edbia',
  'NR': 'Nauru',
  'NP': 'Nepal',
  'NI': 'Nicar\u00e1gua',
  'NE': 'N\u00edger',
  'NG': 'Nig\u00e9ria',
  'NU': 'Niue',
  'NO': 'Noruega',
  'NC': 'Nova Caled\u00f4nia',
  'NZ': 'Nova Zel\u00e2ndia',
  'OM': 'Om\u00e3',
  'NL': 'Pa\u00edses Baixos',
  'BQ': 'Pa\u00edses Baixos Caribenhos',
  'PW': 'Palau',
  'PA': 'Panam\u00e1',
  'PG': 'Papua-Nova Guin\u00e9',
  'PK': 'Paquist\u00e3o',
  'PY': 'Paraguai',
  'PE': 'Peru',
  'PF': 'Polin\u00e9sia Francesa',
  'PL': 'Pol\u00f4nia',
  'PR': 'Porto Rico',
  'PT': 'Portugal',
  'XB': 'Pseudobidi',
  'XA': 'Pseudossotaques',
  'KE': 'Qu\u00eania',
  'KG': 'Quirguist\u00e3o',
  'KI': 'Quiribati',
  'GB': 'Reino Unido',
  'CF': 'Rep\u00fablica Centro-Africana',
  'CG': 'Rep\u00fablica do Congo',
  'DO': 'Rep\u00fablica Dominicana',
  'RE': 'Reuni\u00e3o',
  'RO': 'Rom\u00eania',
  'RW': 'Ruanda',
  'RU': 'R\u00fassia',
  'EH': 'Saara Ocidental',
  'WS': 'Samoa',
  'AS': 'Samoa Americana',
  'SM': 'San Marino',
  'SH': 'Santa Helena',
  'LC': 'Santa L\u00facia',
  'BL': 'S\u00e3o Bartolomeu',
  'KN': 'S\u00e3o Crist\u00f3v\u00e3o e N\u00e9vis',
  'MF': 'S\u00e3o Martinho',
  'PM': 'S\u00e3o Pedro e Miquel\u00e3o',
  'ST': 'S\u00e3o Tom\u00e9 e Pr\u00edncipe',
  'VC': 'S\u00e3o Vicente e Granadinas',
  'SC': 'Seicheles',
  'SN': 'Senegal',
  'SL': 'Serra Leoa',
  'RS': 'S\u00e9rvia',
  'SG': 'Singapura',
  'SX': 'Sint Maarten',
  'SY': 'S\u00edria',
  'SO': 'Som\u00e1lia',
  'LK': 'Sri Lanka',
  'SZ': 'Suazil\u00e2ndia',
  'SD': 'Sud\u00e3o',
  'SS': 'Sud\u00e3o do Sul',
  'SE': 'Su\u00e9cia',
  'CH': 'Su\u00ed\u00e7a',
  'SR': 'Suriname',
  'SJ': 'Svalbard e Jan Mayen',
  'TJ': 'Tadjiquist\u00e3o',
  'TH': 'Tail\u00e2ndia',
  'TW': 'Taiwan',
  'TZ': 'Tanz\u00e2nia',
  'CZ': 'Tch\u00e9quia',
  'IO': 'Territ\u00f3rio Brit\u00e2nico do Oceano \u00cdndico',
  'TF': 'Territ\u00f3rios Franceses do Sul',
  'PS': 'Territ\u00f3rios palestinos',
  'TL': 'Timor-Leste',
  'TG': 'Togo',
  'TK': 'Tokelau',
  'TO': 'Tonga',
  'TT': 'Trinidad e Tobago',
  'TA': 'Trist\u00e3o da Cunha',
  'TN': 'Tun\u00edsia',
  'TM': 'Turcomenist\u00e3o',
  'TR': 'Turquia',
  'TV': 'Tuvalu',
  'UA': 'Ucr\u00e2nia',
  'UG': 'Uganda',
  'UY': 'Uruguai',
  'UZ': 'Uzbequist\u00e3o',
  'VU': 'Vanuatu',
  'VE': 'Venezuela',
  'VN': 'Vietn\u00e3',
  'WF': 'Wallis e Futuna',
  'ZM': 'Z\u00e2mbia',
  'ZW': 'Zimb\u00e1bue'
});

/***/ }),

/***/ "PgN2":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("mSNy");
/* harmony import */ var config__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("NRfZ");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("RuLz");




/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'fileupload',
  displayName: 'File Upload',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'cloud-upload',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].imageFile,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.fileupload.yourFile'),
      isRequired: false,
      fileUpload: {
        allowedFileTypes: config__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].allowedFileTypes.map(type => type.ext)
      },
      questionType: 'fileupload',
      displayOrder: 0,
      isDeleted: false
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    return {
      q: question._id,
      f: question.answer
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.f) {
      if (question.fileupload) {
        question.fileupload.defaultValue = questionAnswers.f;
      } else {
        question.fileupload = {
          defaultValue: questionAnswers.f
        };
      }
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question, culture, timezone, answerId) {
    var answerObj;

    if (answer && answer.f && answer.f !== null && answer.f.length > 0 && answer.f[0].fid) {
      if (answerId) {
        answerObj = {
          type: 'url',
          icon: 'file-alt',
          // title: answer.f[0].fid, // Bu değer gönderilmezse dil dosyasından link textini alır
          url: '/answerfile/' + answerId + '/' + answer.f[0].fid
        };
      } else {
        answerObj = answer.f[0].fid;
      }
    }

    return {
      questionId: question._id,
      question: question.question,
      answer: answerObj,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var rules = [];

    if (questionModel.isRequired) {
      rules.push(v => v && v !== null && v.length > 0 || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('isRequired')));
    } else {
      rules.push(true);
    }

    return rules;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.fileupload && questionModel.fileupload.defaultValue ? questionModel.fileupload.defaultValue : [];
  }
});

/***/ }),

/***/ "QCF4":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var getFirstIForm = comp => {
  if (!comp.$parent) {
    return null;
  }

  if (comp.$options._componentTag === 'i-form') {
    return comp;
  }

  return getFirstIForm(comp.$parent);
};

/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'validatable',
  data: function data() {
    return {
      isValidatable: true,
      errorMessage: null,
      validateOnSubmit: false,
      iForm: null
    };
  },
  props: {
    noValidationElement: Boolean,
    rules: {
      type: Array,
      default: () => []
    }
  },
  mounted: function mounted() {
    this.iForm = getFirstIForm(this);

    if (this.iForm) {
      this.iForm.validatables[this._uid] = this;
    }

    if (this.input) {
      var onInput = () => {
        if (this.beforeOnSubmit()) {
          if (this.isItext) {
            this.input.removeEventListener('input', onInput, false);
          } else if (this.isMasked) {
            this.input.removeEventListener('keyup', onInput, false);
          }
        }
      };

      var onFocus = () => {
        // console.log(this.isValid, this.validateOnSubmit, this.beforeOnSubmit());
        if (!this.isValid && (!this.validateOnSubmit || !this.beforeOnSubmit())) {
          if (this.isItext) {
            this.input.addEventListener('input', onInput, false);
          } else if (this.isMasked) {
            this.input.addEventListener('keyup', onInput, false);
          }
        }
      };

      if (this.isItext || this.isMasked) {
        this.input.addEventListener('blur', () => {
          if (!this.isValid && !this.validateOnSubmit) {
            this.beforeOnSubmit();
          }

          if (this.isItext) {
            this.input.removeEventListener('input', onInput, false);
          } else if (this.isMasked) {
            this.input.removeEventListener('keyup', onInput, false);
          }
        }, false);
        this.input.addEventListener('focus', onFocus, false);
      }
    }
  },
  methods: {
    validate: function validate() {
      var value = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : this.inputValue;

      for (var i = 0; i < this.rules.length; i++) {
        var rule = this.rules[i];
        var valid = typeof rule === 'function' ? rule(value) : rule;

        if (typeof valid === 'string') {
          this.errorMessage = valid;
          this.$emit('validation', false, valid, this);
          return false;
        }
      }

      this.errorMessage = null;
      this.$emit('validation', true, null, this);
      return true;
    },
    beforeOnSubmit: function beforeOnSubmit() {
      if (Array.isArray(this.rules) && this.rules.length > 0) {
        return this.validate();
      }

      return true;
    }
  },
  beforeDestroy: function beforeDestroy() {
    if (this.iForm) {
      this.iForm.validatables[this._uid] = undefined;
      delete this.iForm.validatables[this._uid];
    }
  },
  computed: {
    isItext() {
      return this.$options._componentTag === 'i-text';
    },

    isMasked() {
      return this.$options._componentTag === 'i-masked-text' || this.$options._componentTag === 'IMaskedText';
    },

    isValid() {
      return this.errorMessage === null || this.errorMessage === undefined;
    }

  },
  watch: {
    rules: {
      handler: function handler(newVal, oldVal) {
        if (newVal && oldVal && newVal.length === oldVal.length) {
          return;
        }

        this.validate();
      },
      deep: true
    }
  }
});

/***/ }),

/***/ "QgSb":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IRadio_vue_vue_type_style_index_0_id_21d9cc2e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("7MdJ");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IRadio_vue_vue_type_style_index_0_id_21d9cc2e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IRadio_vue_vue_type_style_index_0_id_21d9cc2e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IRadio_vue_vue_type_style_index_0_id_21d9cc2e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "Qqpc":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  'AF': 'Afganist\u00e1n',
  'AL': 'Albania',
  'DE': 'Alemania',
  'AD': 'Andorra',
  'AO': 'Angola',
  'AI': 'Anguila',
  'AQ': 'Ant\u00e1rtida',
  'AG': 'Antigua y Barbuda',
  'SA': 'Arabia Saud\u00ed',
  'DZ': 'Argelia',
  'AR': 'Argentina',
  'AM': 'Armenia',
  'AW': 'Aruba',
  'AU': 'Australia',
  'AT': 'Austria',
  'AZ': 'Azerbaiy\u00e1n',
  'BS': 'Bahamas',
  'BD': 'Banglad\u00e9s',
  'BB': 'Barbados',
  'BH': 'Bar\u00e9in',
  'BE': 'B\u00e9lgica',
  'BZ': 'Belice',
  'BJ': 'Ben\u00edn',
  'BM': 'Bermudas',
  'BY': 'Bielorrusia',
  'BO': 'Bolivia',
  'BA': 'Bosnia y Herzegovina',
  'BW': 'Botsuana',
  'BR': 'Brasil',
  'BN': 'Brun\u00e9i',
  'BG': 'Bulgaria',
  'BF': 'Burkina Faso',
  'BI': 'Burundi',
  'BT': 'But\u00e1n',
  'CV': 'Cabo Verde',
  'KH': 'Camboya',
  'CM': 'Camer\u00fan',
  'CA': 'Canad\u00e1',
  'IC': 'Canarias',
  'BQ': 'Caribe neerland\u00e9s',
  'QA': 'Catar',
  'EA': 'Ceuta y Melilla',
  'TD': 'Chad',
  'CZ': 'Chequia',
  'CL': 'Chile',
  'CN': 'China',
  'CY': 'Chipre',
  'VA': 'Ciudad del Vaticano',
  'CO': 'Colombia',
  'KM': 'Comoras',
  'CG': 'Congo',
  'KP': 'Corea del Norte',
  'KR': 'Corea del Sur',
  'CR': 'Costa Rica',
  'CI': 'C\u00f4te d\u2019Ivoire',
  'HR': 'Croacia',
  'CU': 'Cuba',
  'CW': 'Curazao',
  'DG': 'Diego Garc\u00eda',
  'DK': 'Dinamarca',
  'DM': 'Dominica',
  'EC': 'Ecuador',
  'EG': 'Egipto',
  'SV': 'El Salvador',
  'AE': 'Emiratos \u00c1rabes Unidos',
  'ER': 'Eritrea',
  'SK': 'Eslovaquia',
  'SI': 'Eslovenia',
  'ES': 'Espa\u00f1a',
  'US': 'Estados Unidos',
  'EE': 'Estonia',
  'SZ': 'Esuatini',
  'ET': 'Etiop\u00eda',
  'PH': 'Filipinas',
  'FI': 'Finlandia',
  'FJ': 'Fiyi',
  'FR': 'Francia',
  'GA': 'Gab\u00f3n',
  'GM': 'Gambia',
  'GE': 'Georgia',
  'GH': 'Ghana',
  'GI': 'Gibraltar',
  'GD': 'Granada',
  'GR': 'Grecia',
  'GL': 'Groenlandia',
  'GP': 'Guadalupe',
  'GU': 'Guam',
  'GT': 'Guatemala',
  'GF': 'Guayana Francesa',
  'GG': 'Guernsey',
  'GN': 'Guinea',
  'GQ': 'Guinea Ecuatorial',
  'GW': 'Guinea-Bis\u00e1u',
  'GY': 'Guyana',
  'HT': 'Hait\u00ed',
  'HN': 'Honduras',
  'HU': 'Hungr\u00eda',
  'IN': 'India',
  'ID': 'Indonesia',
  'IQ': 'Irak',
  'IR': 'Ir\u00e1n',
  'IE': 'Irlanda',
  'AC': 'Isla de la Ascensi\u00f3n',
  'IM': 'Isla de Man',
  'CX': 'Isla de Navidad',
  'NF': 'Isla Norfolk',
  'IS': 'Islandia',
  'AX': 'Islas \u00c5land',
  'KY': 'Islas Caim\u00e1n',
  'CC': 'Islas Cocos',
  'CK': 'Islas Cook',
  'FO': 'Islas Feroe',
  'GS': 'Islas Georgia del Sur y Sandwich del Sur',
  'FK': 'Islas Malvinas',
  'MP': 'Islas Marianas del Norte',
  'MH': 'Islas Marshall',
  'UM': 'Islas menores alejadas de EE. UU.',
  'PN': 'Islas Pitcairn',
  'SB': 'Islas Salom\u00f3n',
  'TC': 'Islas Turcas y Caicos',
  'VG': 'Islas V\u00edrgenes Brit\u00e1nicas',
  'VI': 'Islas V\u00edrgenes de EE. UU.',
  'IL': 'Israel',
  'IT': 'Italia',
  'JM': 'Jamaica',
  'JP': 'Jap\u00f3n',
  'JE': 'Jersey',
  'JO': 'Jordania',
  'KZ': 'Kazajist\u00e1n',
  'KE': 'Kenia',
  'KG': 'Kirguist\u00e1n',
  'KI': 'Kiribati',
  'XK': 'Kosovo',
  'KW': 'Kuwait',
  'LA': 'Laos',
  'LS': 'Lesoto',
  'LV': 'Letonia',
  'LB': 'L\u00edbano',
  'LR': 'Liberia',
  'LY': 'Libia',
  'LI': 'Liechtenstein',
  'LT': 'Lituania',
  'LU': 'Luxemburgo',
  'MK': 'Macedonia',
  'MG': 'Madagascar',
  'MY': 'Malasia',
  'MW': 'Malaui',
  'MV': 'Maldivas',
  'ML': 'Mali',
  'MT': 'Malta',
  'MA': 'Marruecos',
  'MQ': 'Martinica',
  'MU': 'Mauricio',
  'MR': 'Mauritania',
  'YT': 'Mayotte',
  'MX': 'M\u00e9xico',
  'FM': 'Micronesia',
  'MD': 'Moldavia',
  'MC': 'M\u00f3naco',
  'MN': 'Mongolia',
  'ME': 'Montenegro',
  'MS': 'Montserrat',
  'MZ': 'Mozambique',
  'MM': 'Myanmar (Birmania)',
  'NA': 'Namibia',
  'NR': 'Nauru',
  'NP': 'Nepal',
  'NI': 'Nicaragua',
  'NE': 'N\u00edger',
  'NG': 'Nigeria',
  'NU': 'Niue',
  'NO': 'Noruega',
  'NC': 'Nueva Caledonia',
  'NZ': 'Nueva Zelanda',
  'OM': 'Om\u00e1n',
  'NL': 'Pa\u00edses Bajos',
  'PK': 'Pakist\u00e1n',
  'PW': 'Palaos',
  'PA': 'Panam\u00e1',
  'PG': 'Pap\u00faa Nueva Guinea',
  'PY': 'Paraguay',
  'PE': 'Per\u00fa',
  'PF': 'Polinesia Francesa',
  'PL': 'Polonia',
  'PT': 'Portugal',
  'XA': 'Pseudo-Accents',
  'XB': 'Pseudo-Bidi',
  'PR': 'Puerto Rico',
  'HK': 'RAE de Hong Kong (China)',
  'MO': 'RAE de Macao (China)',
  'GB': 'Reino Unido',
  'CF': 'Rep\u00fablica Centroafricana',
  'CD': 'Rep\u00fablica Democr\u00e1tica del Congo',
  'DO': 'Rep\u00fablica Dominicana',
  'RE': 'Reuni\u00f3n',
  'RW': 'Ruanda',
  'RO': 'Ruman\u00eda',
  'RU': 'Rusia',
  'EH': 'S\u00e1hara Occidental',
  'WS': 'Samoa',
  'AS': 'Samoa Americana',
  'BL': 'San Bartolom\u00e9',
  'KN': 'San Crist\u00f3bal y Nieves',
  'SM': 'San Marino',
  'MF': 'San Mart\u00edn',
  'PM': 'San Pedro y Miquel\u00f3n',
  'VC': 'San Vicente y las Granadinas',
  'SH': 'Santa Elena',
  'LC': 'Santa Luc\u00eda',
  'ST': 'Santo Tom\u00e9 y Pr\u00edncipe',
  'SN': 'Senegal',
  'RS': 'Serbia',
  'SC': 'Seychelles',
  'SL': 'Sierra Leona',
  'SG': 'Singapur',
  'SX': 'Sint Maarten',
  'SY': 'Siria',
  'SO': 'Somalia',
  'LK': 'Sri Lanka',
  'ZA': 'Sud\u00e1frica',
  'SD': 'Sud\u00e1n',
  'SS': 'Sud\u00e1n del Sur',
  'SE': 'Suecia',
  'CH': 'Suiza',
  'SR': 'Surinam',
  'SJ': 'Svalbard y Jan Mayen',
  'TH': 'Tailandia',
  'TW': 'Taiw\u00e1n',
  'TZ': 'Tanzania',
  'TJ': 'Tayikist\u00e1n',
  'IO': 'Territorio Brit\u00e1nico del Oc\u00e9ano \u00cdndico',
  'TF': 'Territorios Australes Franceses',
  'PS': 'Territorios Palestinos',
  'TL': 'Timor-Leste',
  'TG': 'Togo',
  'TK': 'Tokelau',
  'TO': 'Tonga',
  'TT': 'Trinidad y Tobago',
  'TA': 'Trist\u00e1n de Acu\u00f1a',
  'TN': 'T\u00fanez',
  'TM': 'Turkmenist\u00e1n',
  'TR': 'Turqu\u00eda',
  'TV': 'Tuvalu',
  'UA': 'Ucrania',
  'UG': 'Uganda',
  'UY': 'Uruguay',
  'UZ': 'Uzbekist\u00e1n',
  'VU': 'Vanuatu',
  'VE': 'Venezuela',
  'VN': 'Vietnam',
  'WF': 'Wallis y Futuna',
  'YE': 'Yemen',
  'DJ': 'Yibuti',
  'ZM': 'Zambia',
  'ZW': 'Zimbabue'
});

/***/ }),

/***/ "R3Ei":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_array_sort__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("ToJy");
/* harmony import */ var core_js_modules_es_array_sort__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_sort__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("YiV1");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("Gppw");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(bson_objectid__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("mSNy");




/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'multiplechoice',
  displayName: 'Multiple Selection',
  parentType: 'choice',
  displayOnToolbox: true,
  displayIconHTML: 'check',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].choice,
  componentDefaults: function componentDefaults() {
    return {
      questionType: 'choice',
      question: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('questionTypes.typeYourQuestionHere'),
      displayOrder: 0,
      isRequired: false,
      isDeleted: false,
      isActive: false,
      choice: {
        subType: 'multiplechoice',
        other: false,
        optionText: '',
        options: [{
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('option', {
            number: '1'
          })
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: _lang__WEBPACK_IMPORTED_MODULE_3__["default"].t('option', {
            number: '2'
          })
        }],
        defaultValue: []
      }
    };
  },
  generateConditionsCode: function generateConditionsCode(trigger) {
    var triggerAnswer = trigger.answer ? trigger.answer.sort().join(',') : '';

    switch (trigger.case) {
      case 'is':
        return "(_['".concat(trigger.questionId, "'].answer || []).sort().join(',') === '").concat(triggerAnswer, "'");

      case 'is not':
        return "(_['".concat(trigger.questionId, "'].answer || []).sort().join(',') !== '").concat(triggerAnswer, "'");
    }
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    var defVal = questionModel.choice.defaultValue || [];

    if (!Array.isArray(defVal)) {
      defVal = [];
    } else {
      defVal = defVal.filter(x => x.toLowerCase() !== 'please select' && x.toLowerCase() !== '');
    }

    return defVal;
  }
});

/***/ }),

/***/ "RQlP":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_array_iterator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("4mDm");
/* harmony import */ var core_js_modules_es_array_iterator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("JfAA");
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("EnZy");
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("3bBZ");
/* harmony import */ var core_js_modules_web_dom_collections_iterator__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__("mSNy");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__("RuLz");








var ObjectId = __webpack_require__("Gppw");

/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'selectionmatrix',
  displayName: 'Selection Matrix',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'table',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_4__[/* default */ "a"].choice,
  componentDefaults: function componentDefaults() {
    return {
      questionType: 'selectionmatrix',
      question: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.typeYourQuestionHere'),
      displayOrder: 0,
      isRequired: false,
      isDeleted: false,
      isActive: false,
      selectionmatrix: {
        rows: [{
          text: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.selectionmatrix.defaultRowText'),
          type: 'checkbox',
          _id: ObjectId().str
        }, {
          text: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.selectionmatrix.defaultRowText'),
          type: 'checkbox',
          _id: ObjectId().str
        }],
        columns: [{
          text: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.column'),
          _id: ObjectId().str
        }, {
          text: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.column'),
          _id: ObjectId().str
        }],
        defaultValue: {},
        columnsText: ''
      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    var answerModel = [];
    var objKeys = Object.keys(question.answer);

    for (var i = 0; i < objKeys.length; i++) {
      if (question.answer[objKeys[i]]) {
        (function () {
          var choises = [];
          var rowId = '';
          var colId = '';

          if (objKeys[i].split('-').length <= 1) {
            rowId = objKeys[i];
            colId = question.answer[rowId];
          } else {
            var spl = objKeys[i].split('-');
            rowId = spl[0];
            colId = spl[1];
          }

          var row = question.selectionmatrix.rows.find(x => x._id === rowId);

          if (row) {
            var rowText = row.text;
            var rowType = row.type;
            var col = question.selectionmatrix.columns.find(x => x._id === colId);

            if (col) {
              choises.push({
                cid: colId,
                cn: col.text
              });
              answerModel.push({
                rid: rowId,
                rn: rowText,
                rt: rowType,
                c: choises
              });
            }
          }
        })();
      }
    }

    this.fixQuestionDefaultValueByAnswers(question, {
      sm: answerModel
    });
    return {
      q: question._id,
      sm: answerModel
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.sm) {
      question.selectionmatrix.defaultValue = {};

      for (var i = 0; i < questionAnswers.sm.length; i++) {
        for (var j = 0; j < questionAnswers.sm[i].c.length; j++) {
          if (questionAnswers.sm[i].rt === 'checkbox') {
            question.selectionmatrix.defaultValue[questionAnswers.sm[i].rid + '-' + questionAnswers.sm[i].c[j].cid] = true;
          } else if (questionAnswers.sm[i].rt === 'radio') {
            question.selectionmatrix.defaultValue[questionAnswers.sm[i].rid] = questionAnswers.sm[i].c[j].cid;
          }
        }
      }
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    var answerClone = [...answer.sm];
    var answers = {
      cols: [],
      rows: []
    };

    for (var i = 0; i < question.selectionmatrix.columns.length; i++) {
      answers.cols.push({
        cn: question.selectionmatrix.columns[i].text.toString(),
        cid: question.selectionmatrix.columns[i]._id
      });
    }

    for (var _i = 0; _i < question.selectionmatrix.rows.length; _i++) {
      var row = {
        text: question.selectionmatrix.rows[_i].text,
        c: [],
        rid: question.selectionmatrix.rows[_i]._id
      };
      answers.rows.push(row);
    }

    var rowGroup = answerClone.reduce((r, a) => {
      r[a.rid] = [...(r[a.rid] || []), a];
      return r;
    }, {});

    var _loop = function _loop(key) {
      var element = rowGroup[key];
      var currentRow = answers.rows.find(x => x.rid === key);

      if (currentRow) {
        var _loop2 = function _loop2(_i2) {
          var cTmp = {
            text: '',
            id: ''
          };
          cTmp.text = element[_i2].c[0].cn;
          cTmp.id = element[_i2].c[0].cid;
          currentRow.c.push(cTmp);

          if (!answers.cols.find(x => x.cn.toString() === cTmp.text.toString())) {
            answers.cols.push({
              cn: cTmp.text,
              cid: cTmp.id
            });
          }
        };

        for (var _i2 = 0; _i2 < element.length; _i2++) {
          _loop2(_i2);
        }
      } else {
        var _row = {
          text: element[0].rn,
          c: [],
          rid: element[0].rid
        };

        var _loop3 = function _loop3(_i3) {
          var cTmp = {
            text: '',
            id: ''
          };
          cTmp.text = element[_i3].c[0].cn;
          cTmp.id = element[_i3].c[0].cid;

          _row.c.push(cTmp);

          if (!answers.cols.find(x => x.cn.toString() === cTmp.text.toString())) {
            answers.cols.push({
              cn: cTmp.text,
              cid: cTmp.id
            });
          }
        };

        for (var _i3 = 0; _i3 < element.length; _i3++) {
          _loop3(_i3);
        }

        answers.rows.push(_row);
      }
    };

    for (var key in rowGroup) {
      _loop(key);
    }

    var answerModel = {
      model: answers,
      type: 'component',
      questionType: 'selectionmatrix'
    };
    return {
      questionId: question._id,
      question: question.question,
      answer: answerModel
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var result = [];

    if (questionModel.isRequired) {
      result.push(v => !v || hasAnyValue(v) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_6__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired')));
    }

    return result;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.selectionmatrix.defaultValue ? questionModel.selectionmatrix.defaultValue : {};
  }
});

function hasAnyValue(obj) {
  for (var prop in obj) {
    if (obj[prop]) {
      return true;
    }
  }

  return false;
}

/***/ }),

/***/ "RUml":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ICheckbox_vue_vue_type_style_index_0_id_e6889776_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("s5rb");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ICheckbox_vue_vue_type_style_index_0_id_e6889776_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ICheckbox_vue_vue_type_style_index_0_id_e6889776_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ICheckbox_vue_vue_type_style_index_0_id_e6889776_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "RuLz":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_array_index_of__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXV3");
/* harmony import */ var core_js_modules_es_array_index_of__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_index_of__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_regexp_constructor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("TWNs");
/* harmony import */ var core_js_modules_es_regexp_constructor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_constructor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("JfAA");
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_string_match__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("Rm1S");
/* harmony import */ var core_js_modules_es_string_match__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_match__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("UxlC");
/* harmony import */ var core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_string_trim__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__("SYor");
/* harmony import */ var core_js_modules_es_string_trim__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_trim__WEBPACK_IMPORTED_MODULE_5__);







/* eslint-disable */
var config = __webpack_require__("ExhV");

var jsHelpers = __webpack_require__("ttAG").default;

var bbcodeParser = {};
var tokenMatch = /{[A-Z_]+[0-9]*}/g;
bbcodeParser.bbcode_matches = [];
bbcodeParser.html_tpls = [];
bbcodeParser.html_matches = [];
bbcodeParser.bbcode_tpls = [];
bbcodeParser.tokens = {
  'URL': '((?:(?:[a-z][a-z\\d+\\-.]*:\\/{2}(?:(?:[a-z0-9\\-._~\\!$&\'*+,;=:@|]+|%[\\dA-F]{2})+|[0-9.]+|\\[[a-z0-9.]+:[a-z0-9.]+:[a-z0-9.:]+\\])(?::\\d*)?(?:\\/(?:[a-z0-9\\-._~\\!$&\'*+,;=:@|]+|%[\\dA-F]{2})*)*(?:\\?(?:[a-z0-9\\-._~\\!$&\'*+,;=:@\\/?|]+|%[\\dA-F]{2})*)?(?:#(?:[a-z0-9\\-._~\\!$&\'*+,;=:@\\/?|]+|%[\\dA-F]{2})*)?)|(?:www\\.(?:[a-z0-9\\-._~\\!$&\'*+,;=:@|]+|%[\\dA-F]{2})+(?::\\d*)?(?:\\/(?:[a-z0-9\\-._~\\!$&\'*+,;=:@|]+|%[\\dA-F]{2})*)*(?:\\?(?:[a-z0-9\\-._~\\!$&\'*+,;=:@\\/?|]+|%[\\dA-F]{2})*)?(?:#(?:[a-z0-9\\-._~\\!$&\'*+,;=:@\\/?|]+|%[\\dA-F]{2})*)?)))',
  'LOCAL_URL': '((?:[a-z0-9\-._~\!$&\'()*+,;=:@|]+|%[\dA-F]{2})*(?:\/(?:[a-z0-9\-._~\!$&\'()*+,;=:@|]+|%[\dA-F]{2})*)*(?:\?(?:[a-z0-9\-._~\!$&\'()*+,;=:@\/?|]+|%[\dA-F]{2})*)?(?:#(?:[a-z0-9\-._~\!$&\'()*+,;=:@\/?|]+|%[\dA-F]{2})*)?)',
  'EMAIL': '((?:[\\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*(?:[\\w\!\#$\%\'\*\+\-\/\=\?\^\`{\|\}\~]|&)+@(?:(?:(?:(?:(?:[a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(?:\\d{1,3}\.){3}\\d{1,3}(?:\:\\d{1,5})?))',
  'COLOR': '([a-z]+|#[0-9abcdef]+)',
  'TEXT': '(.*?)',
  'SIMPLETEXT': '([a-zA-Z0-9-+.,_ ]+)',
  'INTTEXT': '([a-zA-Z0-9-+,_. ]+)',
  'IDENTIFIER': '([a-zA-Z0-9-_]+)',
  'NUMBER': '([0-9]+)',
  'GUID': '([0-9a-f]{8}-?[0-9a-f]{4}-?[1-5][0-9a-f]{3}-?[89ab][0-9a-f]{3}-?[0-9a-f]{12})'
};
var bbCodeHelper = {
  getRegEx: function getRegEx(bbcodeStr, isFirstReplace) {
    var matches = bbcodeStr.match(tokenMatch);
    var replacement = '';

    if (!matches || matches.length <= 0) {
      return new RegExp(this.preg_quote(bbcodeStr), 'g');
    }

    for (var i = 0; i < matches.length; i += 1) {
      var token = matches[i].replace(/[{}0-9]/g, '');

      if (token && bbcodeParser.tokens[token]) {
        replacement += this.preg_quote(bbcodeStr.substr(0, bbcodeStr.indexOf(matches[i]))) + bbcodeParser.tokens[token];
        bbcodeStr = bbcodeStr.substr(bbcodeStr.indexOf(matches[i]) + matches[i].length);
      }
    }

    replacement += this.preg_quote(bbcodeStr);

    if (!isFirstReplace) {
      return new RegExp(replacement, 'gi');
    } else {
      return new RegExp(replacement);
    }
  },
  getTpls: function getTpls(str) {
    if (!str) {
      return '';
    }

    var matches = str.match(tokenMatch);
    var replacement = '';
    var positions = {};
    var next_position = 0;

    if (!matches || matches.length <= 0) {
      return str;
    }

    for (var i = 0; i < matches.length; i += 1) {
      var token = matches[i].replace(/[{}0-9]/g, '');
      var position;

      if (positions[matches[i]]) {
        position = positions[matches[i]];
      } else {
        next_position += 1;
        position = next_position;
        positions[matches[i]] = position;
      }

      if (bbcodeParser.tokens[token]) {
        replacement += str.substr(0, str.indexOf(matches[i])) + '$' + position;
        str = str.substr(str.indexOf(matches[i]) + matches[i].length);
      }
    }

    replacement += str;
    return replacement;
  },
  addBBCode: function addBBCode(bbcode_match, bbcode_tpl) {
    bbcodeParser.bbcode_matches.push(this.getRegEx(bbcode_match));
    bbcodeParser.html_tpls.push(this.getTpls(bbcode_tpl));
    bbcodeParser.html_matches.push(this.getRegEx(bbcode_tpl));
    bbcodeParser.bbcode_tpls.push(this.getTpls(bbcode_match));
  },
  preg_quote: function preg_quote(str, delimiter) {
    if (!str) {
      return '';
    }

    return str.replace(new RegExp('[.\\\\+*?\\[\\^\\]$(){}=!<>|:\\' + (delimiter || '') + '-]', 'g'), '\\$&');
  }
};
bbCodeHelper.addBBCode('[color={COLOR}]{TEXT}[/color]', '<span style="color: {COLOR}">{TEXT}</span>');
bbCodeHelper.addBBCode('[b]{TEXT}[/b]', '<strong>{TEXT}</strong>');
bbCodeHelper.addBBCode('[p]{TEXT}[/p]', '<p>{TEXT}</p>');
bbCodeHelper.addBBCode('[h1]{TEXT}[/h1]', '<h1>{TEXT}</h1>');
bbCodeHelper.addBBCode('[h2]{TEXT}[/h2]', '<h2>{TEXT}</h2>');
bbCodeHelper.addBBCode('[h3]{TEXT}[/h3]', '<h3>{TEXT}</h3>');
bbCodeHelper.addBBCode('[i]{TEXT}[/i]', '<em>{TEXT}</em>');
bbCodeHelper.addBBCode('[ol]', '<ol>');
bbCodeHelper.addBBCode('[/ol]', '</ol>');
bbCodeHelper.addBBCode('[ul]', '<ul>');
bbCodeHelper.addBBCode('[/ul]', '</ul>');
bbCodeHelper.addBBCode('[li]', '<li>');
bbCodeHelper.addBBCode('[/li]', '</li>');
bbCodeHelper.addBBCode('[hr]', '<hr>');
bbCodeHelper.addBBCode('[br]', '<br>'); // bbCodeHelper.addBBCode('[ul]{TEXT}[/ul]', '<ul>{TEXT}</ul>');
// bbCodeHelper.addBBCode('[li]{TEXT}[/li]', '<li>{TEXT}</li>');

bbCodeHelper.addBBCode('[u]{TEXT}[/u]', '<u>{TEXT}</u>');
bbCodeHelper.addBBCode('[s]{TEXT}[/s]', '<s>{TEXT}</s>');
bbCodeHelper.addBBCode('[blockquote]{TEXT}[/blockquote]', '<blockquote>{TEXT}</blockquote>');
bbCodeHelper.addBBCode('[formfile]$2[/formfile]', '<img src="{TEXT}" alt="{GUID}">');
bbCodeHelper.addBBCode('[img]{TEXT}[/img]', '<img src="{TEXT}">'); // bbCodeHelper.addBBCode('[iframe]{TEXT}[/iframe]', '<iframe src="{TEXT}"></iframe>');

bbCodeHelper.addBBCode('[iframe]{TEXT}[/iframe]', '<iframe {TEXT}></iframe>'); // bbCodeHelper.addBBCode('[u]{TEXT}[/u]', '<span style="text-decoration:underline;">{TEXT}</span>');
// bbCodeHelper.addBBCode('[s]{TEXT}[/s]', '<span style="text-decoration:line-through;">{TEXT}</span>');
// bbCodeHelper.addBBCode('[url={URL}]{TEXT}[/url]', '<a href="{URL}" title="link" target="_blank">{TEXT}</a>');
// bbCodeHelper.addBBCode('[url]{URL}[/url]', '<a href="{URL}" title="link" target="_blank">{URL}</a>');
// bbCodeHelper.addBBCode('[url={LINK}]{TEXT}[/url]', '<a href="{LINK}" title="link" target="_blank">{TEXT}</a>');
// bbCodeHelper.addBBCode('[url]{LINK}[/url]', '<a href="{LINK}" title="link" target="_blank">{LINK}</a>');
// bbCodeHelper.addBBCode('[img={URL} width={NUMBER1} height={NUMBER2}]{TEXT}[/img]', '<img src="{URL}" width="{NUMBER1}" height="{NUMBER2}" alt="{TEXT}" />');
// bbCodeHelper.addBBCode('[img]{URL}[/img]', '<img src="{URL}" alt="{URL}" />');
// bbCodeHelper.addBBCode('[img={LINK} width={NUMBER1} height={NUMBER2}]{TEXT}[/img]', '<img src="{LINK}" width="{NUMBER1}" height="{NUMBER2}" alt="{TEXT}" />');
// bbCodeHelper.addBBCode('[img]{LINK}[/img]', '<img src="{LINK}" alt="{LINK}" />');
//
// bbCodeHelper.addBBCode('[highlight={COLOR}]{TEXT}[/highlight]', '<span style="background-color:{COLOR}">{TEXT}</span>');
// bbCodeHelper.addBBCode('[quote="{TEXT1}"]{TEXT2}[/quote]', '<div class="quote"><cite>{TEXT1}</cite><p>{TEXT2}</p></div>');
// bbCodeHelper.addBBCode('[quote]{TEXT}[/quote]', '<cite>{TEXT}</cite>');

/* harmony default export */ __webpack_exports__["a"] = ({
  bbcodeToHtml: function bbcodeToHtml(str, formId, tempfiles) {
    if (!str) {
      return '';
    }

    str = jsHelpers.clearHtmlTags(str);

    for (var i = 0; i < bbcodeParser.bbcode_matches.length; i += 1) {
      if (bbcodeParser.bbcode_matches[i].toString() === bbCodeHelper.getRegEx('[formfile]$2[/formfile]').toString()) {
        var fileIds = matchAll(str, bbcodeParser.tokens.GUID);

        if (fileIds) {
          fileIds = fileIds.filter(distinc);

          for (var j = 0; j < fileIds.length; j++) {
            var fileId = fileIds[j];
            var fileSource = tempfiles && tempfiles[fileId] ? 'tempfile' : 'formfile';
            var replacedToken = bbCodeHelper.getRegEx('[formfile]{GUID}[/formfile]', true);
            str = str.replace(replacedToken, '<img src="' + config.fileApi + '/' + fileSource + '/' + formId + '/' + fileId + '" alt="' + fileId + '"></img>');
          }
        }
      } else {
        str = str.replace(bbcodeParser.bbcode_matches[i], bbcodeParser.html_tpls[i]);
      }
    } // str = str.replace("<p></p>", "<br><br>")


    return str;
  },
  htmlToBBCode: function name(str) {
    if (!str) {
      return '';
    } // str = str.replace("<p></p>", "<br><br>")


    for (var i = 0; i < bbcodeParser.html_matches.length; i += 1) {
      str = str.replace(bbcodeParser.html_matches[i], bbcodeParser.bbcode_tpls[i]);
    }

    str = str.replace(/<([^>]+?)([X"^>]*?)>(.*?)<\/\1>/ig, "");
    str = jsHelpers.clearHtmlTags(str); // str = str.replace(/(<\/?(?:span|br)[^>]*>)|<[^>]+>/ig, '$1');

    return str;
  },

  cleanTextFromBBCode(bbcode) {
    if (!bbcode) {
      return '';
    }

    var bbrx = /\[(\w+)*?](.*?)\[\/\1]/gi;
    var uuidrx = /\b[0-9a-f]{8}\b-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-\b[0-9a-f]{12}\b/gi;
    var whiteSpacerx = /\s\s+/g;

    while (bbcode.match(bbrx)) {
      bbcode = bbcode.replace(bbrx, '$2 ');
    }

    return bbcode.replace(uuidrx, '').replace(whiteSpacerx, ' ').trim();
  }

});

var distinc = function makedistinc(value, index, self) {
  return self.indexOf(value) === index;
};

var matchAll = function matchAll(str, regex) {
  regex = new RegExp(regex, 'g');
  var res = [];
  var m;

  if (regex.global) {
    while (m = regex.exec(str)) {
      res.push(m[1]);
    }
  } else {
    if (m = regex.exec(str)) {
      res.push(m[1]);
    }
  }

  return res;
};

/***/ }),

/***/ "SSqv":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  'AF': 'Afghanistan',
  'ZA': 'Afrique du Sud',
  'AL': 'Albanie',
  'DZ': 'Alg\u00e9rie',
  'DE': 'Allemagne',
  'AD': 'Andorre',
  'AO': 'Angola',
  'AI': 'Anguilla',
  'AQ': 'Antarctique',
  'AG': 'Antigua-et-Barbuda',
  'SA': 'Arabie saoudite',
  'AR': 'Argentine',
  'AM': 'Arm\u00e9nie',
  'AW': 'Aruba',
  'AU': 'Australie',
  'AT': 'Autriche',
  'AZ': 'Azerba\u00efdjan',
  'BS': 'Bahamas',
  'BH': 'Bahre\u00efn',
  'BD': 'Bangladesh',
  'BB': 'Barbade',
  'BE': 'Belgique',
  'BZ': 'Belize',
  'BJ': 'B\u00e9nin',
  'BM': 'Bermudes',
  'BT': 'Bhoutan',
  'BY': 'Bi\u00e9lorussie',
  'BO': 'Bolivie',
  'BA': 'Bosnie-Herz\u00e9govine',
  'BW': 'Botswana',
  'BR': 'Br\u00e9sil',
  'BN': 'Brun\u00e9i Darussalam',
  'BG': 'Bulgarie',
  'BF': 'Burkina Faso',
  'BI': 'Burundi',
  'KH': 'Cambodge',
  'CM': 'Cameroun',
  'CA': 'Canada',
  'CV': 'Cap-Vert',
  'EA': 'Ceuta et Melilla',
  'CL': 'Chili',
  'CN': 'Chine',
  'CY': 'Chypre',
  'CO': 'Colombie',
  'KM': 'Comores',
  'CG': 'Congo-Brazzaville',
  'CD': 'Congo-Kinshasa',
  'KP': 'Cor\u00e9e du Nord',
  'KR': 'Cor\u00e9e du Sud',
  'CR': 'Costa Rica',
  'CI': 'C\u00f4te d\u2019Ivoire',
  'HR': 'Croatie',
  'CU': 'Cuba',
  'CW': 'Cura\u00e7ao',
  'DK': 'Danemark',
  'DG': 'Diego Garcia',
  'DJ': 'Djibouti',
  'DM': 'Dominique',
  'EG': '\u00c9gypte',
  'AE': '\u00c9mirats arabes unis',
  'EC': '\u00c9quateur',
  'ER': '\u00c9rythr\u00e9e',
  'ES': 'Espagne',
  'EE': 'Estonie',
  'SZ': 'Eswatini',
  'VA': '\u00c9tat de la Cit\u00e9 du Vatican',
  'FM': '\u00c9tats f\u00e9d\u00e9r\u00e9s de Micron\u00e9sie',
  'US': '\u00c9tats-Unis',
  'ET': '\u00c9thiopie',
  'FJ': 'Fidji',
  'FI': 'Finlande',
  'FR': 'France',
  'GA': 'Gabon',
  'GM': 'Gambie',
  'GE': 'G\u00e9orgie',
  'GS': 'G\u00e9orgie du Sud et \u00eeles Sandwich du Sud',
  'GH': 'Ghana',
  'GI': 'Gibraltar',
  'GR': 'Gr\u00e8ce',
  'GD': 'Grenade',
  'GL': 'Groenland',
  'GP': 'Guadeloupe',
  'GU': 'Guam',
  'GT': 'Guatemala',
  'GG': 'Guernesey',
  'GN': 'Guin\u00e9e',
  'GQ': 'Guin\u00e9e \u00e9quatoriale',
  'GW': 'Guin\u00e9e-Bissau',
  'GY': 'Guyana',
  'GF': 'Guyane fran\u00e7aise',
  'HT': 'Ha\u00efti',
  'HN': 'Honduras',
  'HU': 'Hongrie',
  'CX': '\u00cele Christmas',
  'AC': '\u00cele de l\u2019Ascension',
  'IM': '\u00cele de Man',
  'NF': '\u00cele Norfolk',
  'AX': '\u00celes \u00c5land',
  'KY': '\u00celes Ca\u00efmans',
  'IC': '\u00celes Canaries',
  'CC': '\u00celes Cocos',
  'CK': '\u00celes Cook',
  'FO': '\u00celes F\u00e9ro\u00e9',
  'FK': '\u00celes Malouines',
  'MP': '\u00celes Mariannes du Nord',
  'MH': '\u00celes Marshall',
  'UM': '\u00celes mineures \u00e9loign\u00e9es des \u00c9tats-Unis',
  'PN': '\u00celes Pitcairn',
  'SB': '\u00celes Salomon',
  'TC': '\u00celes Turques-et-Ca\u00efques',
  'VG': '\u00celes Vierges britanniques',
  'VI': '\u00celes Vierges des \u00c9tats-Unis',
  'IN': 'Inde',
  'ID': 'Indon\u00e9sie',
  'IQ': 'Irak',
  'IR': 'Iran',
  'IE': 'Irlande',
  'IS': 'Islande',
  'IL': 'Isra\u00ebl',
  'IT': 'Italie',
  'JM': 'Jama\u00efque',
  'JP': 'Japon',
  'JE': 'Jersey',
  'JO': 'Jordanie',
  'KZ': 'Kazakhstan',
  'KE': 'Kenya',
  'KG': 'Kirghizistan',
  'KI': 'Kiribati',
  'XK': 'Kosovo',
  'KW': 'Kowe\u00eft',
  'RE': 'La R\u00e9union',
  'LA': 'Laos',
  'LS': 'Lesotho',
  'LV': 'Lettonie',
  'LB': 'Liban',
  'LR': 'Lib\u00e9ria',
  'LY': 'Libye',
  'LI': 'Liechtenstein',
  'LT': 'Lituanie',
  'LU': 'Luxembourg',
  'MK': 'Mac\u00e9doine',
  'MG': 'Madagascar',
  'MY': 'Malaisie',
  'MW': 'Malawi',
  'MV': 'Maldives',
  'ML': 'Mali',
  'MT': 'Malte',
  'MA': 'Maroc',
  'MQ': 'Martinique',
  'MU': 'Maurice',
  'MR': 'Mauritanie',
  'YT': 'Mayotte',
  'MX': 'Mexique',
  'MD': 'Moldavie',
  'MC': 'Monaco',
  'MN': 'Mongolie',
  'ME': 'Mont\u00e9n\u00e9gro',
  'MS': 'Montserrat',
  'MZ': 'Mozambique',
  'MM': 'Myanmar (Birmanie)',
  'NA': 'Namibie',
  'NR': 'Nauru',
  'NP': 'N\u00e9pal',
  'NI': 'Nicaragua',
  'NE': 'Niger',
  'NG': 'Nig\u00e9ria',
  'NU': 'Niue',
  'NO': 'Norv\u00e8ge',
  'NC': 'Nouvelle-Cal\u00e9donie',
  'NZ': 'Nouvelle-Z\u00e9lande',
  'OM': 'Oman',
  'UG': 'Ouganda',
  'UZ': 'Ouzb\u00e9kistan',
  'PK': 'Pakistan',
  'PW': 'Palaos',
  'PA': 'Panama',
  'PG': 'Papouasie-Nouvelle-Guin\u00e9e',
  'PY': 'Paraguay',
  'NL': 'Pays-Bas',
  'BQ': 'Pays-Bas carib\u00e9ens',
  'PE': 'P\u00e9rou',
  'PH': 'Philippines',
  'PL': 'Pologne',
  'PF': 'Polyn\u00e9sie fran\u00e7aise',
  'PR': 'Porto Rico',
  'PT': 'Portugal',
  'XA': 'pseudo-accents',
  'XB': 'pseudo-bidi',
  'QA': 'Qatar',
  'HK': 'R.A.S. chinoise de Hong Kong',
  'MO': 'R.A.S. chinoise de Macao',
  'CF': 'R\u00e9publique centrafricaine',
  'DO': 'R\u00e9publique dominicaine',
  'RO': 'Roumanie',
  'GB': 'Royaume-Uni',
  'RU': 'Russie',
  'RW': 'Rwanda',
  'EH': 'Sahara occidental',
  'BL': 'Saint-Barth\u00e9lemy',
  'KN': 'Saint-Christophe-et-Ni\u00e9v\u00e8s',
  'SM': 'Saint-Marin',
  'MF': 'Saint-Martin',
  'SX': 'Saint-Martin (partie n\u00e9erlandaise)',
  'PM': 'Saint-Pierre-et-Miquelon',
  'VC': 'Saint-Vincent-et-les-Grenadines',
  'SH': 'Sainte-H\u00e9l\u00e8ne',
  'LC': 'Sainte-Lucie',
  'SV': 'Salvador',
  'WS': 'Samoa',
  'AS': 'Samoa am\u00e9ricaines',
  'ST': 'Sao Tom\u00e9-et-Principe',
  'SN': 'S\u00e9n\u00e9gal',
  'RS': 'Serbie',
  'SC': 'Seychelles',
  'SL': 'Sierra Leone',
  'SG': 'Singapour',
  'SK': 'Slovaquie',
  'SI': 'Slov\u00e9nie',
  'SO': 'Somalie',
  'SD': 'Soudan',
  'SS': 'Soudan du Sud',
  'LK': 'Sri Lanka',
  'SE': 'Su\u00e8de',
  'CH': 'Suisse',
  'SR': 'Suriname',
  'SJ': 'Svalbard et Jan Mayen',
  'SY': 'Syrie',
  'TJ': 'Tadjikistan',
  'TW': 'Ta\u00efwan',
  'TZ': 'Tanzanie',
  'TD': 'Tchad',
  'CZ': 'Tch\u00e9quie',
  'TF': 'Terres australes fran\u00e7aises',
  'IO': 'Territoire britannique de l\u2019oc\u00e9an Indien',
  'PS': 'Territoires palestiniens',
  'TH': 'Tha\u00eflande',
  'TL': 'Timor oriental',
  'TG': 'Togo',
  'TK': 'Tokelau',
  'TO': 'Tonga',
  'TT': 'Trinit\u00e9-et-Tobago',
  'TA': 'Tristan da Cunha',
  'TN': 'Tunisie',
  'TM': 'Turkm\u00e9nistan',
  'TR': 'Turquie',
  'TV': 'Tuvalu',
  'UA': 'Ukraine',
  'UY': 'Uruguay',
  'VU': 'Vanuatu',
  'VE': 'Venezuela',
  'VN': 'Vietnam',
  'WF': 'Wallis-et-Futuna',
  'YE': 'Y\u00e9men',
  'ZM': 'Zambie',
  'ZW': 'Zimbabwe'
});

/***/ }),

/***/ "Sk9r":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("Gppw");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(bson_objectid__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _helpers_localStorageHelper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("kdFr");


var excludeArray = {
  '_id': true,
  'updateDate': true,
  'createDate': true,
  'url': true
};

function LocalStorageToApiResult(returnObject, responseStatus) {
  var responseObject = {
    status: responseStatus || 200,
    data: returnObject
  };
  return responseObject;
}

;

function fixQuestionIds(formModel) {
  if (Array.isArray(formModel.questions)) {
    for (var i = 0; i < formModel.questions.length; i++) {
      if (!formModel.questions[i]._id) {
        formModel.questions[i]._id = bson_objectid__WEBPACK_IMPORTED_MODULE_0___default()().str;
      }
    }
  }

  return formModel;
}

class formLocalStorageService {
  readForms() {
    return JSON.parse(_helpers_localStorageHelper__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].getItem('forms')) || [];
  }

  getForms() {
    // TODO: get forms from local storage localStorage forms
    return LocalStorageToApiResult(this.readForms()).data;
  }

  getForm(formId) {
    return LocalStorageToApiResult(this.readForms().find(x => x._id === formId));
  }

  saveForm(formModel) {
    var forms = this.readForms();
    formModel = fixQuestionIds(formModel);
    forms.push(formModel);
    _helpers_localStorageHelper__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].setItem('forms', JSON.stringify(forms));
    return LocalStorageToApiResult(formModel, 204).data;
  }

  update(formId, changes) {
    var forms = this.readForms();
    var formToBeEditted = forms.find(x => x._id === formId);
    changes = fixQuestionIds(changes);

    var setRecursively = function setRecursively(body, result) {
      for (var item in body) {
        if (excludeArray[item] === true) {
          continue;
        }

        var typeOfItem = typeof body[item];

        if (typeOfItem === 'string' || typeOfItem === 'boolean' || typeOfItem === 'number') {
          result[item] = body[item];
        } else if (typeOfItem === 'object') {
          if (body[item] && body[item].constructor && body[item].constructor.name === 'Array') {
            result[item] = body[item];
          } else {
            if (result[item] === undefined) {
              result[item] = {};
            }

            setRecursively(body[item], result[item]);
          }
        }
      }
    };

    setRecursively(changes, formToBeEditted);
    forms = forms.filter(x => x._id !== formId);
    forms.push(formToBeEditted);
    _helpers_localStorageHelper__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].setItem('forms', JSON.stringify(forms));
    return LocalStorageToApiResult(formToBeEditted);
  }

  updateForm(formModel) {
    var forms = this.readForms();
    var formToBeEditted = forms.find(x => x._id === formModel._id);
    formToBeEditted = formModel;
    forms = forms.filter(x => x._id !== formModel._id);
    formToBeEditted = fixQuestionIds(formToBeEditted);
    forms.push(formToBeEditted);
    _helpers_localStorageHelper__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].setItem('forms', JSON.stringify(forms));
    return LocalStorageToApiResult(formToBeEditted);
  }

  deleteForm(formId) {
    var forms = this.readForms().filter(x => x._id !== formId);
    _helpers_localStorageHelper__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].setItem('forms', JSON.stringify(forms));
    return LocalStorageToApiResult(true, 204);
  }

}

/* harmony default export */ __webpack_exports__["a"] = (formLocalStorageService);

/***/ }),

/***/ "Tned":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_regexp_constructor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("TWNs");
/* harmony import */ var core_js_modules_es_regexp_constructor__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_constructor__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("JfAA");
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_string_trim__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("SYor");
/* harmony import */ var core_js_modules_es_string_trim__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_trim__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("YiV1");
/* harmony import */ var _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("ttAG");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__("mSNy");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__("RuLz");







/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'text',
  displayName: 'Text',
  displayOnToolbox: false,
  answerable: true,
  // displayIconHTML: '<i aria-hidden="true" class="icon toolbox-element-icon material-icons">title</i>',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].text,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: false,
      questionType: 'text',
      displayOrder: 0,
      isDeleted: false,
      text: {
        subType: 'shorttext'
      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    return {
      q: question._id,
      t: question.answer
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.t) {
      question.text.defaultValue = questionAnswers.t;
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    return {
      questionId: question._id,
      question: question.question,
      answer: answer.t,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var rules = [];

    if (questionModel.isRequired) {
      rules.push(v => !!v || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired'));
    }

    if (questionModel.text.maxLength && questionModel.text.maxLength > 0) {
      rules.push(v => v.length <= questionModel.text.maxLength || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.validationErrors.maxLength', {
        field: questionModel.question,
        max: questionModel.text.maxLength
      }));
    }

    if (questionModel.text.minLength && questionModel.text.minLength > 0) {
      rules.push(v => v.length >= questionModel.text.minLength || _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.validationErrors.minLength', {
        field: questionModel.question,
        min: questionModel.text.minLength
      }));
    }

    if (questionModel.text.maskPattern && !questionModel.text.regexValidation && questionModel.text.maskPattern.trim() !== '') {
      rules.push(v => _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(v) || !_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(v) && _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isMaskedValueValid(v, questionModel.text.maskPattern) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_6__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('fieldIsNotValid'), {
        field: questionModel.question
      }));
    } else if (questionModel.text.regex && questionModel.text.regex.trim() !== '') {
      rules.push(v => _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(v) || !_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isEmpty(v) && new RegExp(questionModel.text.regex, 'i').test(v) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_6__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('fieldIsNotValid'), {
        field: questionModel.question
      }));
    }

    return rules;
  },
  generateConditionsCode: function generateConditionsCode(trigger) {
    switch (trigger.case) {
      case 'is':
        return "_['".concat(trigger.questionId, "'].answer === '").concat(trigger.answer, "'");

      case 'is not':
        return "_['".concat(trigger.questionId, "'].answer !== '").concat(trigger.answer, "'");

      case 'startsWith':
        return "(_['".concat(trigger.questionId, "'].answer + '').startsWith('").concat(trigger.answer, "')");

      case 'endsWith':
        return "(_['".concat(trigger.questionId, "'].answer + '').endsWith('").concat(trigger.answer, "')");

      case 'includes':
        return "(_['".concat(trigger.questionId, "'].answer + '').includes('").concat(trigger.answer, "')");
    }
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel, formModel) {
    return questionModel.text.defaultValue ? questionModel.text.defaultValue : '';
  }
});

/***/ }),

/***/ "VGI5":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("bxzC");

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

/***/ "Vtdi":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.index-of.js
var es_array_index_of = __webpack_require__("yXV3");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.promise.js
var es_promise = __webpack_require__("5s+n");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.includes.js
var es_string_includes = __webpack_require__("JTJg");

// EXTERNAL MODULE: ./config/prod.js
var prod = __webpack_require__("NRfZ");

// EXTERNAL MODULE: ./node_modules/vue/dist/vue.esm.js
var vue_esm = __webpack_require__("oCYn");

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/App.vue?vue&type=template&id=7ba5bd90&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "app" } },
    [
      _c("ISvg"),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "fixed-container" },
        [
          _c(
            "transition",
            { attrs: { name: "stripe", appear: "" } },
            [
              _vm.$root.stripes[0]
                ? _c("i-stripe", { attrs: { stripe: _vm.$root.stripes[0] } })
                : _vm._e()
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "transition",
        { attrs: { name: "fade" } },
        [
          _vm.$root.layout === _vm.layouts.naked && !_vm.$root.isIframe
            ? _c(
                "div",
                { staticClass: "back-to-left" },
                [
                  _c("i-icon", {
                    attrs: { icon: "arrow-left" },
                    on: { click: _vm.onHistoryBack }
                  })
                ],
                1
              )
            : _vm.$root.layout !== _vm.layouts.formbuilder &&
              _vm.$root.layout !== _vm.layouts.formview &&
              !_vm.isIframe &&
              !_vm.$route.query.preview
            ? _c("MainHeader")
            : _vm._e()
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "transition",
        { attrs: { mode: "out-in", name: "fade" } },
        [
          _vm.$root.pageNotFoundMessage
            ? _c("PathErrorComponent")
            : _c("router-view", {
                attrs: { setAppVueVariable: _vm.setAppVueVariable }
              })
        ],
        1
      ),
      _vm._v(" "),
      _c("transition", { attrs: { name: "fade" } }, [
        _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.showMainLoader,
                expression: "showMainLoader"
              }
            ],
            staticClass: "main-loader"
          },
          [_c("i-preloader")],
          1
        )
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/App.vue?vue&type=template&id=7ba5bd90&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.splice.js
var es_array_splice = __webpack_require__("pDQq");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.starts-with.js
var es_string_starts_with = __webpack_require__("LKBx");

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/asyncToGenerator.js
var asyncToGenerator = __webpack_require__("yXPU");
var asyncToGenerator_default = /*#__PURE__*/__webpack_require__.n(asyncToGenerator);

// CONCATENATED MODULE: ./src/enums/layoutenums.js
/* harmony default export */ var layoutenums = ({
  naked: 'naked',
  formbuilder: 'formbuilder',
  formview: 'formview'
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/components/shared/MainHeader.vue?vue&type=template&id=0f820dd0&scoped=true&
var MainHeadervue_type_template_id_0f820dd0_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("header", [
    _c("div", { staticClass: "container" }, [
      _c(
        "div",
        { staticClass: "navbar" },
        [
          _c(
            "div",
            { staticClass: "navbar-left" },
            [
              _c("router-link", { attrs: { to: { name: "MyForms" } } }, [
                _c("img", { attrs: { src: "/static/img/logo-mobile.svg" } })
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: !_vm.$root.isMobileKeyboardOpen,
                  expression: "!$root.isMobileKeyboardOpen"
                }
              ],
              staticClass: "navbar-middle visible-xs"
            },
            [
              _c(
                "i-menu",
                { attrs: { enabled: !_vm.$root.isMobile } },
                [
                  _c(
                    "router-link",
                    { attrs: { to: { name: "MyForms" } } },
                    [
                      _c("i-icon", {
                        attrs: { solid: _vm.isInMyForms, icon: "clipboard" }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "hidden-xs" }, [
                        _vm._v(_vm._s(_vm.$t("forms")))
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "a",
                    {
                      staticClass: "visible-xs question-mark-activator",
                      on: {
                        click: function($event) {
                          return _vm.$refs.questionDropdown.open($event)
                        }
                      }
                    },
                    [
                      _c("i-icon", {
                        attrs: {
                          solid: _vm.userDropdownIsOpen,
                          icon: "ellipsis-h-alt"
                        }
                      })
                    ],
                    1
                  )
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "navbar-right" },
            [
              _vm.$auth.isAuthenticated() &&
              _vm.$root.user &&
              _vm.$root.user.info &&
              _vm.$root.user.info.package &&
              _vm.$root.user.info.package.name !== "premium"
                ? _c(
                    "i-button",
                    {
                      staticClass: "upgrade",
                      attrs: { naked: "" },
                      on: { click: _vm.onUpgradeButtonClick }
                    },
                    [_vm._v(_vm._s(_vm.$t("upgrade")))]
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.$auth.isAuthenticated()
                ? _c(
                    "div",
                    { staticClass: "user-menu cursor-p" },
                    [
                      _c("vue-avatar", {
                        staticClass: "user-img user-name",
                        attrs: {
                          username: _vm.$root.user.info.username || "",
                          src: _vm.$root.user.info.profileImgSrc || "",
                          color: "white",
                          rounded: true
                        }
                      })
                    ],
                    1
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.$auth.isAuthenticated()
                ? _c(
                    "i-dropdown",
                    {
                      staticClass: "user-dropdown",
                      attrs: { activator: ".user-menu" },
                      model: {
                        value: _vm.userDropdownIsOpen,
                        callback: function($$v) {
                          _vm.userDropdownIsOpen = $$v
                        },
                        expression: "userDropdownIsOpen"
                      }
                    },
                    [
                      _c(
                        "li",
                        [
                          _c(
                            "router-link",
                            { attrs: { to: { name: "ProfilePackageQuotas" } } },
                            [
                              _c("i-icon", { attrs: { icon: "info" } }),
                              _vm._v(" "),
                              _c("span", [_vm._v(_vm._s(_vm.packageName))])
                            ],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "li",
                        [
                          _c(
                            "router-link",
                            {
                              attrs: {
                                to: {
                                  name: "UserForms",
                                  params: {
                                    username: _vm.$root.user.info.username
                                  }
                                }
                              }
                            },
                            [
                              _c("i-icon", { attrs: { icon: "user" } }),
                              _vm._v(" "),
                              _c("span", [_vm._v(_vm._s(_vm.$t("profile")))])
                            ],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "li",
                        [
                          _c(
                            "router-link",
                            { attrs: { to: { name: "Profile" } } },
                            [
                              _c("i-icon", { attrs: { icon: "cog" } }),
                              _vm._v(" "),
                              _c("span", [_vm._v(_vm._s(_vm.$t("settings")))])
                            ],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "li",
                        [
                          _vm.$auth.isAuthenticated() &&
                          _vm.$root.user &&
                          _vm.$root.user.info &&
                          _vm.$root.user.info.package &&
                          _vm.$root.user.info.package.name !== "premium"
                            ? _c(
                                "router-link",
                                { attrs: { to: { name: "Packages" } } },
                                [
                                  _c("i-icon", { attrs: { icon: "rocket" } }),
                                  _vm._v(" "),
                                  _c("span", [
                                    _vm._v(_vm._s(_vm.$t("upgrade")))
                                  ])
                                ],
                                1
                              )
                            : _vm._e()
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c("li", [
                        _c(
                          "a",
                          {
                            on: {
                              click: function($event) {
                                return _vm.$root.logout()
                              }
                            }
                          },
                          [
                            _c("i-icon", { attrs: { icon: "sign-out" } }),
                            _vm._v(" "),
                            _c("span", [_vm._v(_vm._s(_vm.$t("logout")))])
                          ],
                          1
                        )
                      ])
                    ]
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.$auth.isAuthenticated() === false
                ? _c(
                    "router-link",
                    {
                      staticClass: "login-button-header",
                      style: !(
                        _vm.$route.name &&
                        !(
                          ["signin"].indexOf(_vm.$route.name.toLowerCase()) > -1
                        )
                      )
                        ? "visibility:hidden;z-index:-1;"
                        : "",
                      attrs: { to: _vm.signInRoute }
                    },
                    [
                      _vm._v(
                        "\n\t\t\t\t\t" + _vm._s(_vm.$t("login")) + "\n\t\t\t\t"
                      )
                    ]
                  )
                : _vm._e()
            ],
            1
          ),
          _vm._v(" "),
          _c("keep-alive", [
            !_vm.$root.isMobile
              ? _c(
                  "div",
                  {
                    directives: [
                      {
                        name: "tooltip",
                        rawName: "v-tooltip.left",
                        modifiers: { left: true }
                      }
                    ],
                    staticClass: "question-mark",
                    attrs: { title: _vm.$t("help") }
                  },
                  [
                    _c(
                      "a",
                      {
                        staticClass: "f-focus question-mark-activator",
                        attrs: { tabindex: "0" },
                        on: {
                          click: function($event) {
                            return _vm.$refs.questionDropdown.open($event)
                          }
                        }
                      },
                      [_c("i-icon", { attrs: { icon: "question-circle" } })],
                      1
                    )
                  ]
                )
              : _vm._e()
          ]),
          _vm._v(" "),
          !_vm.$root.isMobile && _vm.$root.onPage === "FormCreate"
            ? _c(
                "div",
                {
                  directives: [
                    {
                      name: "tooltip",
                      rawName: "v-tooltip.left",
                      modifiers: { left: true }
                    }
                  ],
                  staticClass: "question-mark keyboard",
                  attrs: { title: _vm.$t("keyboardHelp.keyboardShortCuts") }
                },
                [
                  _c(
                    "a",
                    {
                      staticClass: "f-focus",
                      attrs: {
                        tabindex: "0",
                        id: "keyboard-shortcut-activator"
                      }
                    },
                    [_c("i-icon", { attrs: { icon: "keyboard" } })],
                    1
                  )
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          _c(
            "keep-alive",
            [
              _c(
                "i-dropdown",
                {
                  ref: "questionDropdown",
                  staticClass: "question-mark-dropdown top-menu",
                  attrs: {
                    position: "fixed",
                    activator: ".question-mark-activator",
                    "open-manually": ""
                  }
                },
                [
                  _c(
                    "li",
                    [
                      _c(
                        "router-link",
                        { attrs: { to: { name: "Discover" } } },
                        [
                          _c("i-icon", {
                            attrs: { solid: _vm.isInDiscover, icon: "compass" }
                          }),
                          _vm._v(" "),
                          _c("span", [_vm._v(_vm._s(_vm.$t("discoverText")))])
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _vm.$root.tutorial.basic
                    ? _c("li", [
                        _c(
                          "a",
                          { on: { click: _vm.$root.tutorial.onBasicClick } },
                          [
                            _c("i-icon", { attrs: { icon: "star" } }),
                            _vm._v(
                              "\n\t\t\t\t\t\t\t" +
                                _vm._s(_vm.$t("takeATour")) +
                                "\n\t\t\t\t\t\t"
                            )
                          ],
                          1
                        )
                      ])
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.$root.tutorial.advanced
                    ? _c("li", [
                        _c(
                          "a",
                          { on: { click: _vm.$root.tutorial.onAdvancedClick } },
                          [
                            _c(
                              "i",
                              { staticClass: "material-icons notranslate" },
                              [_vm._v("search")]
                            ),
                            _vm._v(
                              "\n\t\t\t\t\t\t\t" +
                                _vm._s(_vm.$t("takeAnAdvancedTour")) +
                                "\n\t\t\t\t\t\t"
                            )
                          ]
                        )
                      ])
                    : _vm._e(),
                  _vm._v(" "),
                  _c("li", [
                    _c(
                      "a",
                      {
                        on: {
                          click: function($event) {
                            _vm.isOpenHintsPopup = true
                          }
                        }
                      },
                      [
                        _c("i-icon", { attrs: { icon: "lightbulb-on" } }),
                        _vm._v(
                          "\n\t\t\t\t\t\t\t" +
                            _vm._s(_vm.$t("handyTips")) +
                            "\n\t\t\t\t\t\t"
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c(
                      "a",
                      {
                        on: {
                          click: function($event) {
                            _vm.questionMarkMenu.feedbackPopupShow = true
                          }
                        }
                      },
                      [
                        _c("i-icon", { attrs: { icon: "comment-dots" } }),
                        _vm._v(
                          "\n\t\t\t\t\t\t\t" +
                            _vm._s(_vm.$t("feedback")) +
                            "\n\t\t\t\t\t\t"
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c(
                    "li",
                    [
                      _c(
                        "router-link",
                        { attrs: { to: { name: "Profile" } } },
                        [
                          _c("i-icon", { attrs: { icon: "globe" } }),
                          _vm._v(
                            "\n\t\t\t\t\t\t\t" +
                              _vm._s(_vm.$t("language")) +
                              "\n\t\t\t\t\t\t"
                          )
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c("li", [
                    _c(
                      "a",
                      {
                        attrs: {
                          href: "/" + _vm.$i18n.locale + "/templates",
                          target: "_blank"
                        }
                      },
                      [
                        _c("i-icon", { attrs: { icon: "info" } }),
                        _vm._v(
                          "\n\t\t\t\t\t\t\t" +
                            _vm._s(_vm.$t("useCases")) +
                            "\n\t\t\t\t\t\t"
                        )
                      ],
                      1
                    )
                  ])
                ]
              )
            ],
            1
          ),
          _vm._v(" "),
          !_vm.$root.isMobile && _vm.$root.onPage === "FormCreate"
            ? _c(
                "i-dropdown",
                {
                  staticClass: "top-menu",
                  attrs: {
                    position: "fixed",
                    activator: "#keyboard-shortcut-activator"
                  }
                },
                [
                  _c("div", { staticClass: "keyboard-help" }, [
                    _c("div", { staticClass: "keyboard-help-title" }, [
                      _c("h4", [
                        _vm._v(_vm._s(_vm.$t("keyboardHelp.keyboardShortCuts")))
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "keyboard-help-content" }, [
                      _c("div", { staticClass: "keyboard-help-item" }, [
                        _c("div", { staticClass: "keyboard-btn" }, [
                          _c("span", [_vm._v("ENTER")])
                        ]),
                        _vm._v(" "),
                        _c("p", [
                          _vm._v(_vm._s(_vm.$t("keyboardHelp.keyboardEnter")))
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "keyboard-help-item" }, [
                        _c("div", { staticClass: "keyboard-btn" }, [
                          _c("span", [_vm._v("CTRL")]),
                          _vm._v(" + "),
                          _c("span", [_vm._v("ENTER")])
                        ]),
                        _vm._v(" "),
                        _c("p", [
                          _vm._v(
                            _vm._s(_vm.$t("keyboardHelp.keyboardCtrlEnter"))
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "keyboard-help-item" }, [
                        _c("div", { staticClass: "keyboard-btn" }, [
                          _c("span", [_vm._v("ENTER")])
                        ]),
                        _vm._v(" "),
                        _c("p", [
                          _vm._v(_vm._s(_vm.$t("keyboardHelp.keyboardMoveUp")))
                        ])
                      ])
                    ])
                  ])
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          _c(
            "i-popup",
            {
              staticClass: "feedback-popup",
              attrs: { "close-button": "" },
              model: {
                value: _vm.questionMarkMenu.feedbackPopupShow,
                callback: function($$v) {
                  _vm.$set(_vm.questionMarkMenu, "feedbackPopupShow", $$v)
                },
                expression: "questionMarkMenu.feedbackPopupShow"
              }
            },
            [
              _c("iframe", {
                staticStyle: {
                  "max-width": "100%",
                  width: "500px",
                  height: "700px",
                  border: "none"
                },
                attrs: {
                  id: "",
                  onload: "window.parent.scrollTo(0,0)",
                  scrolling: "yes",
                  allowtransparency: "true",
                  allowfullscreen: "true",
                  allow: "geolocation; microphone; camera",
                  src: _vm.feedbackFormIframeSrc,
                  frameborder: "0"
                }
              })
            ]
          ),
          _vm._v(" "),
          _c(
            "i-popup",
            {
              staticClass: "hints-popup",
              attrs: { "close-button": "", fullscreen: "" },
              model: {
                value: _vm.isOpenHintsPopup,
                callback: function($$v) {
                  _vm.isOpenHintsPopup = $$v
                },
                expression: "isOpenHintsPopup"
              }
            },
            [
              _c(
                "carousel",
                {
                  attrs: {
                    perPage: 1,
                    paginationActiveColor: "#11c4e0",
                    navigationEnabled: _vm.$root.isMobile,
                    paginationEnabled: !_vm.$root.isMobile,
                    paginationColor: "#d1d1d1",
                    paginationSize: 12,
                    paginationPadding: 7
                  }
                },
                _vm._l(_vm.$t("hints"), function(hint, index) {
                  return _c("slide", { key: index }, [
                    _c("div", { staticClass: "popup-hint-image" }, [
                      _c("img", {
                        directives: [
                          {
                            name: "lazy",
                            rawName: "v-lazy",
                            value: "/static/icons/hints/" + index + ".svg",
                            expression: "`/static/icons/hints/${index}.svg`"
                          }
                        ]
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "popup-hint" }, [
                      _vm._v(
                        "\n\t\t\t\t\t\t\t" + _vm._s(hint) + "\n\t\t\t\t\t\t"
                      )
                    ])
                  ])
                }),
                1
              )
            ],
            1
          )
        ],
        1
      )
    ])
  ])
}
var MainHeadervue_type_template_id_0f820dd0_scoped_true_staticRenderFns = []
MainHeadervue_type_template_id_0f820dd0_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/components/shared/MainHeader.vue?vue&type=template&id=0f820dd0&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.slice.js
var es_array_slice = __webpack_require__("+2oP");

// EXTERNAL MODULE: ./src/helpers/jsHelpers.js + 1 modules
var jsHelpers = __webpack_require__("ttAG");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/components/shared/MainHeader.vue?vue&type=script&lang=js&



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var MainHeadervue_type_script_lang_js_ = ({
  components: {
    Carousel: () => __webpack_require__.e(/* import() | carousel */ 28).then(__webpack_require__.bind(null, "i9ID")),
    Slide: () => __webpack_require__.e(/* import() | carousel */ 28).then(__webpack_require__.bind(null, "/Roa"))
  },
  data: function data() {
    return {
      userDropdownIsOpen: false,
      questionMarkMenu: {
        feedbackPopupShow: false
      },
      signInRoute: {
        name: 'SignIn',
        query: {
          redirect: this.$route.query.redirect
        }
      },
      hints: [],
      isOpenHintsPopup: false
    };
  },
  methods: {
    onUpgradeButtonClick: function onUpgradeButtonClick() {
      jsHelpers["default"].fireGenericAnalyticEvent({
        'category': 'Upgrade',
        'action': 'click',
        'label': 'Clicked upgrade button from ' + window.location.pathname
      });
      this.$router.push({
        name: 'Packages'
      });
    }
  },
  computed: {
    isInMyForms: function isInMyForms() {
      return this.$route.name === 'MyForms';
    },
    isInFormBuilder: function isInFormBuilder() {
      return this.$route.path.includes('formbuilder');
    },
    isInDiscover: function isInDiscover() {
      return this.$route.name === 'Discover';
    },
    feedbackFormIframeSrc: function feedbackFormIframeSrc() {
      return "https://forms.app/form/".concat(prod["a" /* default */].feedbackFormId);
    },
    packageName: function packageName() {
      if (this.$root.user.info.package) {
        var packagename = this.$root.user.info.package.displayName || this.$root.user.info.package.name;
        return packagename.charAt(0).toUpperCase() + packagename.slice(1);
      } else {
        return '';
      }
    }
  }
});
// CONCATENATED MODULE: ./src/components/shared/MainHeader.vue?vue&type=script&lang=js&
 /* harmony default export */ var shared_MainHeadervue_type_script_lang_js_ = (MainHeadervue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/shared/MainHeader.vue?vue&type=style&index=0&id=0f820dd0&lang=scss&scoped=true&
var MainHeadervue_type_style_index_0_id_0f820dd0_lang_scss_scoped_true_ = __webpack_require__("DmUZ");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/components/shared/MainHeader.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  shared_MainHeadervue_type_script_lang_js_,
  MainHeadervue_type_template_id_0f820dd0_scoped_true_render,
  MainHeadervue_type_template_id_0f820dd0_scoped_true_staticRenderFns,
  false,
  null,
  "0f820dd0",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/components/shared/MainHeader.vue"
/* harmony default export */ var MainHeader = (component.exports);
// EXTERNAL MODULE: ./src/components/PathErrorComponent.vue + 4 modules
var PathErrorComponent = __webpack_require__("lnx7");

// EXTERNAL MODULE: ./src/services/UserService.js
var UserService = __webpack_require__("NcpN");

// EXTERNAL MODULE: ./src/services/QuotaService.js
var QuotaService = __webpack_require__("VwwM");

// EXTERNAL MODULE: ./src/helpers/localStorageHelper.js
var localStorageHelper = __webpack_require__("kdFr");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/App.vue?vue&type=script&lang=js&




//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//









/* harmony default export */ var Appvue_type_script_lang_js_ = ({
  name: 'app',
  components: {
    MainHeader: MainHeader,
    PathErrorComponent: PathErrorComponent["default"],
    ISvg: () => __webpack_require__.e(/* import() | isvg */ 152).then(__webpack_require__.bind(null, "UkPB"))
  },
  data: function data() {
    return {
      layouts: layoutenums,
      layout: layoutenums.naked,
      // dont render main header at first
      user: {
        info: {}
      },
      showMainLoader: false,
      isUserLoaded: false,
      isIframe: false
    };
  },
  methods: {
    onHistoryBack() {
      if (this.$root.prevFullPath === '/') {
        if (document.referrer) {
          window.location.href = document.referrer;
        } else {
          this.$router.push({
            path: '/myforms'
          });
        }
      } else {
        this.$router.push({
          path: this.$root.prevFullPath
        });
      }
    },

    pushNotification(html, timeout) {
      this.$toast(html);
    },

    setUserCulture: function () {
      var _setUserCulture = asyncToGenerator_default()(function* (userDetailResult) {
        var cultureEnums = (yield __webpack_require__.e(/* import() | cultureenums */ 169).then(__webpack_require__.bind(null, "R/i8"))).default;
        var userCultureStr;

        if (userDetailResult && userDetailResult.culture) {
          userCultureStr = userDetailResult.culture;
        } else {
          userCultureStr = navigator.language || navigator.userLanguage;
        }

        var userCultureNativeName;

        if (userCultureStr) {
          userCultureNativeName = cultureEnums[userCultureStr];
        }

        if (userCultureNativeName) {
          this.user.info.culture = {
            name: userCultureStr,
            nativeName: userCultureNativeName
          };
        } else {
          this.user.info.culture = jsHelpers["default"].getBrowserCulture(cultureEnums);
        }
      });

      function setUserCulture(_x) {
        return _setUserCulture.apply(this, arguments);
      }

      return setUserCulture;
    }(),
    setUserTimezone: function () {
      var _setUserTimezone = asyncToGenerator_default()(function* (userDetailResult) {
        var timeZoneEnums = (yield __webpack_require__.e(/* import() | timezoneenums */ 170).then(__webpack_require__.bind(null, "k7ZY"))).default;

        if (userDetailResult && userDetailResult.timezone) {
          this.user.info.timezone = timeZoneEnums[userDetailResult.timezone];
          localStorageHelper["a" /* default */].setItem('timezone', userDetailResult.timezone);
        }

        if (!this.user.info.timezone) {
          this.user.info.timezone = jsHelpers["default"].getBrowserTimeZone(timeZoneEnums);
        }

        if (!this.user.info.timezone) {
          this.user.info.timezone = timeZoneEnums['GMT Standard Time'];
        }

        if (this.user.info.timezone.utc && this.user.info.timezone.utc.length > 0) {
          this.user.info.timezone.offset = jsHelpers["default"].getTimeZoneOfset(this.user.info.timezone.utc[0]);
        }
      });

      function setUserTimezone(_x2) {
        return _setUserTimezone.apply(this, arguments);
      }

      return setUserTimezone;
    }(),
    setUser: function () {
      var _setUser = asyncToGenerator_default()(function* () {
        var cb = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : () => {};
        var force = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

        if (!force && this.isUserLoaded) {
          return cb(this.user);
        }

        var userInfo = this.$auth.getPayload(); // sadece username, userId, hasPassword

        var result = null;

        if (userInfo) {
          // is user authenticaed and not in an iframe
          if (this.$auth.isAuthenticated() && !this.isIframe) {
            if (userInfo.hasPassword !== undefined) {
              userInfo.hasPassword = userInfo.hasPassword === 'true';
            }

            result = yield UserService["a" /* default */].getUserDetail();

            if (result) {
              this.$auth.options.cookieStorage.expires = new Date(userInfo.exp * 1000);

              if (userInfo.hasPassword === undefined) {
                userInfo.hasPassword = result.hasPassword === 'true';
              }

              userInfo.language = !result.language ? 'en' : result.language;
              this.$root.loadLanguageAsync(userInfo.language);
              userInfo.isEmailConfirmed = result.isEmailConfirmed;
              userInfo.gravatarHash = result.gravatarHash && result.gravatarHash !== '' ? result.gravatarHash : 'a';
              userInfo.photo = result.photo;
              userInfo.aboutme = result.aboutme;
              userInfo.fullname = result.fullname;
              userInfo.email = result.email;

              if (result.photo) {
                userInfo.profileImgSrc = prod["a" /* default */].fileApi + '/photo/' + result.photo;
              } // BOF Get User Package


              var resultUserPackage = yield UserService["a" /* default */].getUserActivePackage();

              if (resultUserPackage) {
                if (resultUserPackage.status === 200) {
                  userInfo.package = resultUserPackage.data; // BOF BANLI USER KONTROLU
                } else if (resultUserPackage.status === 403 && resultUserPackage.data === 'banned') {
                  this.$root.logout();
                }
              } // EOF BANLI USER KONTROLU
              // EOF Get User Package


              this.$set(this.user, 'info', userInfo);

              if (!this.user.info.isEmailConfirmed) {
                // var userCreateDate = new Date(this.user.info.createDate).getTime();
                // var today = +new Date();
                // var dayDifference = Math.abs(today - userCreateDate) / (1000 * 3600 * 24);
                // if (dayDifference > 7) { // bir haftadan fazladır üye ise
                this.$root.stripes.push({
                  text: this.$t('emailConfirmedWarningStripe.text'),
                  bgColor: this.$theme.orange,
                  buttonText: this.$t('emailConfirmedWarningStripe.buttonText'),
                  to: {
                    name: 'Profile'
                  },
                  id: 'emailConfirmation'
                }); // }
              }

              QuotaService["a" /* default */].getQuotaUsages(quotasResult => {
                if (quotasResult && quotasResult.data && quotasResult.data.quotaUsages) {
                  this.$set(this.user.info, 'isSuspend', quotasResult.data.is);
                  this.$set(this.user.info, 'quotas', quotasResult.data.quotaUsages);
                  this.checkQuotasAlert();
                }
              });
            } else {
              // Token sunucudaki modelle uyuşmuyor, yeniden oturum açmak üzere logine yönlendir
              this.$root.logout();
            }
          }
        }

        if (!this.$auth.isAuthenticated()) {
          this.user.info = {
            language: this.$i18n.locale.substring(0, 2)
          };
        }

        yield this.setUserCulture(result);
        yield this.setUserTimezone(result);
        this.$root.user = this.user;
        this.isUserLoaded = true; // Discount Bant
        // if (!localStorageHelper.getItem('discountBand-seen')) {
        // 	this.$root.stripes.push({
        // 		text: this.$t('campaignBold') + ' ' + this.$t('campaignContent'),
        // 		color: 'black',
        // 		bgColor: '#ffd62b',
        // 		buttonText: this.$t('packages.buy'),
        // 		to: { name: 'Packages' },
        // 		id: 'discountBand',
        // 		closeCallback: function () {
        // 			localStorageHelper.setItem('discountBand-seen', true);
        // 		}
        // 	});
        // }

        return cb(this.user);
      });

      function setUser() {
        return _setUser.apply(this, arguments);
      }

      return setUser;
    }(),

    setUserBasicInfos() {
      var _this = this;

      return asyncToGenerator_default()(function* () {
        var userLang = 'en';

        if (_this.$i18n && _this.$i18n.locale) {
          userLang = _this.$i18n.locale.substring(0, 2);
        }

        _this.user.info = {
          language: userLang
        };
        var objForUserTimezone;

        if (!_this.isIframe) {
          var timezone = localStorageHelper["a" /* default */].getItem('timezone');

          if (timezone) {
            objForUserTimezone = {
              timezone: timezone
            };
          }
        }

        yield _this.setUserTimezone(objForUserTimezone);
        yield _this.setUserCulture();
        _this.$root.user = _this.user;
      })();
    },

    goTo(elementY) {
      var callback = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : () => {};
      var duration = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 500;
      // if (window.scrollY >= elementY) {
      // 	alert('içerdema ' + elementY + ' ' + window.scrollY);
      // 	if (callback) {
      // 		callback();
      // 	}
      // 	return;
      // }
      var startingY = window.pageYOffset;
      var diff = elementY - startingY;
      var start; // Bootstrap our animation - it will get called right before next frame shall be rendered.

      window.requestAnimationFrame(function step(timestamp) {
        if (!start) {
          start = timestamp;
        } // Elapsed milliseconds since start of scrolling.


        var time = timestamp - start; // Get percent of completion in range [0, 1].

        var percent = Math.min(time / duration, 1);
        window.scrollTo(0, startingY + diff * percent); // Proceed with animation as long as we wanted it to.

        if (time < duration) {
          window.requestAnimationFrame(step);
        } else {
          callback();
        }
      });
    },

    setAppVueVariable(variableName, value) {
      this[variableName] = value;
    },

    toShortDateTime: function toShortDateTime(datetime) {
      var culture = 'tr-TR';

      if (this.user && this.user.info && this.user.info.culture && this.user.info.culture.name) {
        culture = this.user.info.culture.name;
      }

      return new Date(datetime).toLocaleDateString(culture);
    },
    setQuotaUsage: function setQuotaUsage(incrementCount, quotaName) {
      if (this.$root.user && this.$root.user.info && this.$root.user.info.quotas && this.$root.user.info.quotas[quotaName]) {
        this.$root.user.info.quotas[quotaName].used += incrementCount;
        this.checkQuotasAlert();
      }
    },
    checkQuotasAlert: function checkQuotasAlert() {
      var _this2 = this;

      if (this.user.info.isSuspend === true) {
        var stripeId = 'userIsSuspend';
        var foundedIndex = this.$root.stripes.findIndex(x => x.id === stripeId);

        if (foundedIndex >= 0) {
          this.$root.stripes.splice(foundedIndex, 1);
        }

        this.$root.stripes.push({
          text: this.$t('notification.exceededYourQuota'),
          bgColor: jsHelpers["default"].getColorFromNumber(100),
          buttonText: this.$t('upgrade'),
          to: {
            name: 'Packages'
          },
          id: stripeId
        });
      } else {
        var quotasResult = this.user.info.quotas;

        if (quotasResult) {
          var _loop = function _loop(item) {
            if (quotasResult[item].quota === 0) {
              return "continue";
            }

            quotasResult[item].percent = Math.ceil(quotasResult[item].used / quotasResult[item].quota * 100);

            if (quotasResult[item].percent >= 70) {
              var _foundedIndex = _this2.$root.stripes.findIndex(x => x.id === item);

              if (_foundedIndex >= 0) {
                _this2.$root.stripes.splice(_foundedIndex, 1);
              }

              _this2.$root.stripes.push({
                text: "".concat(_this2.$t("quotaWarningStripe.".concat(quotasResult[item].percent >= 100 ? 'reached' : 'nearly'), {
                  quotaName: _this2.$t("quotas.".concat(item))
                }), " (").concat(quotasResult[item].used, "/").concat(quotasResult[item].quota, ") ").concat(quotasResult[item].percent, "%"),
                bgColor: jsHelpers["default"].getColorFromNumber(Math.min(quotasResult[item].percent / 100, 1)),
                buttonText: _this2.$t('upgrade'),
                to: {
                  name: 'Packages'
                },
                id: item
              });
            } else {
              var quotaWarningStripeIndex = _this2.$root.stripes.findIndex(x => x.id === item);

              if (quotaWarningStripeIndex >= 0) {
                _this2.$root.stripes.splice(quotaWarningStripeIndex, 1);
              }
            }
          };

          for (var item in quotasResult) {
            var _ret = _loop(item);

            if (_ret === "continue") continue;
          }
        }
      }
    }
  },
  created: function () {
    var _created = asyncToGenerator_default()(function* () {
      // bypass auto scrolling.
      if ('scrollRestoration' in window.history) {
        window.history.scrollRestoration = 'manual';
      }

      var isIframe = false;

      try {
        isIframe = window.self !== window.top;
      } catch (e) {
        isIframe = true;
      }

      this.isIframe = isIframe;
      this.$root.isIframe = this.isIframe;
      this.$root.goTo = this.goTo;
      this.$root.pushNotification = this.pushNotification;
      this.$root.setUser = this.setUser;
      this.$root.setQuotaUsage = this.setQuotaUsage;
      this.$root.toShortDateTime = this.toShortDateTime;
      this.$root.layout = this.layout;
      vue_esm["default"].prototype.$setAppVueVariable = this.setAppVueVariable;
      vue_esm["default"].prototype.$root = this.$root;
    });

    function created() {
      return _created.apply(this, arguments);
    }

    return created;
  }(),
  mounted: function mounted() {
    this.$root.user = this.user;
  },
  computed: {
    feedbackFormIframeSrc: () => "https://forms.app/form/".concat(prod["a" /* default */].feedbackFormId)
  },
  watch: {
    $route: function () {
      var _$route = asyncToGenerator_default()(function* (to, from) {
        this.$root.layout = this.$route.meta.layout;
        this.$root.pageNotFoundMessage = null;
        var isPageFormView = to.name.startsWith('FormView');

        if (!isPageFormView && !(this.user && this.user.info && this.user.info.language)) {
          yield this.setUser();
        } else if (!(this.user && this.user.info && this.user.info.language)) {
          yield this.setUserBasicInfos();
        }

        if (to.name !== 'FormCreate' && !isPageFormView && to.name !== 'FormDesign') {
          setTimeout(() => {
            jsHelpers["default"].removeCss();
          }, 1);
        }
      });

      function $route(_x3, _x4) {
        return _$route.apply(this, arguments);
      }

      return $route;
    }()
  }
});
// CONCATENATED MODULE: ./src/App.vue?vue&type=script&lang=js&
 /* harmony default export */ var src_Appvue_type_script_lang_js_ = (Appvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/App.vue?vue&type=style&index=0&lang=scss&
var Appvue_type_style_index_0_lang_scss_ = __webpack_require__("XAuw");

// CONCATENATED MODULE: ./src/App.vue






/* normalize component */

var App_component = Object(componentNormalizer["a" /* default */])(
  src_Appvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var App_api; }
App_component.options.__file = "src/App.vue"
/* harmony default export */ var App = (App_component.exports);
// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.split.js
var es_string_split = __webpack_require__("EnZy");

// EXTERNAL MODULE: ./node_modules/vue-router/dist/vue-router.esm.js
var vue_router_esm = __webpack_require__("jE9Z");

// EXTERNAL MODULE: ./src/lang/index.js
var lang = __webpack_require__("mSNy");

// EXTERNAL MODULE: ./node_modules/nprogress/nprogress.js
var nprogress = __webpack_require__("Mj6V");
var nprogress_default = /*#__PURE__*/__webpack_require__.n(nprogress);

// CONCATENATED MODULE: ./src/routes.js








 // import FormView from '@/form/components/FormView.vue';


nprogress_default.a.configure({
  showSpinner: false
});
window.loadedRoutes = {};
vue_esm["default"].use(vue_router_esm["a" /* default */]);
var router = new vue_router_esm["a" /* default */]({
  mode: 'history',
  linkActiveClass: 'active',
  linkExactActiveClass: 'exact-active',
  routes: [{
    // TODO: Productionda ngnix ayarları düzeltildikten sonra bu bölüm kaldırılacak
    path: '/',
    beforeEnter: function beforeEnter() {
      // TODO: Refactor here later
      var lang = getCookie('language');
      var supportedLanguages = ['en', 'tr', 'de', 'ru', 'fr', 'es', 'hi', 'pt', 'zh', 'id'];
      var browserLang = (window.navigator.userLanguage || window.navigator.language).substring(0, 2);

      if (lang && window.location.pathname === '/') {
        window.location.href = '/' + lang;
      } else {
        if (!lang && supportedLanguages.includes(browserLang)) {
          window.location.href = '/' + browserLang;
        }
      }

      function getCookie(cname) {
        var name = cname + '=';
        var ca = document.cookie.split(';');

        for (var i = 0; i < ca.length; i++) {
          var c = ca[i];

          while (c.charAt(0) === ' ') {
            c = c.substring(1);
          }

          if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
          }
        }

        return '';
      }
    }
  }, {
    path: '/how-to-get-paypal-client-id-and-secret-key',
    name: 'HowToGetPayPalClientIdSecretKey',
    component: () => __webpack_require__.e(/* import() | HowToGetPayPalClientIdSecretKey */ 64).then(__webpack_require__.bind(null, "hTsr"))
  }, {
    path: '/what-is-iyzico-easy-payment-system',
    name: 'WhatIsIyzicoEasyPaymentSystem',
    component: () => __webpack_require__.e(/* import() | WhatIsIyzicoEasyPaymentSystem */ 77).then(__webpack_require__.bind(null, "BYpq"))
  }, {
    path: '/what-is-wirecard-easy-payment-system',
    name: 'WhatIsWirecardEasyPaymentSystem',
    component: () => __webpack_require__.e(/* import() | WhatIsWirecardEasyPaymentSystem */ 78).then(__webpack_require__.bind(null, "a+/I"))
  }, // BOF FORM
  {
    path: '/myforms',
    name: 'MyForms',
    component: () => Promise.all(/* import() | MyForms */[__webpack_require__.e(21), __webpack_require__.e(18), __webpack_require__.e(67)]).then(__webpack_require__.bind(null, "vZcW")),
    meta: {
      gtm: 'MyForms'
    }
  }, {
    path: '/formtemplate',
    name: 'FormTemplate',
    component: () => Promise.all(/* import() | FormTemplate */[__webpack_require__.e(108), __webpack_require__.e(69), __webpack_require__.e(45), __webpack_require__.e(25), __webpack_require__.e(62)]).then(__webpack_require__.bind(null, "2T2W")),
    meta: {
      gtm: 'FormTemplate'
    }
  }, {
    path: '/discover',
    name: 'Discover',
    component: () => Promise.all(/* import() | Discover */[__webpack_require__.e(21), __webpack_require__.e(22), __webpack_require__.e(23), __webpack_require__.e(48)]).then(__webpack_require__.bind(null, "GZ5n")),
    meta: {
      gtm: 'Discover'
    },
    children: [{
      path: '/discover/user/:searchTerm',
      name: 'DiscoverUser',
      component: () => Promise.all(/* import() | DiscoverUser */[__webpack_require__.e(21), __webpack_require__.e(23)]).then(__webpack_require__.bind(null, "qyOM"))
    }, {
      path: '/discover/form/:searchTerm',
      name: 'DiscoverForm',
      component: () => Promise.all(/* import() | DiscoverForm */[__webpack_require__.e(21), __webpack_require__.e(22)]).then(__webpack_require__.bind(null, "4OaZ"))
    }]
  }, {
    path: '/formbuilder/:id',
    component: () => Promise.all(/* import() | FormBuilder */[__webpack_require__.e(108), __webpack_require__.e(47), __webpack_require__.e(69), __webpack_require__.e(3), __webpack_require__.e(45), __webpack_require__.e(103), __webpack_require__.e(6), __webpack_require__.e(15), __webpack_require__.e(106), __webpack_require__.e(128), __webpack_require__.e(105), __webpack_require__.e(18), __webpack_require__.e(122), __webpack_require__.e(56)]).then(__webpack_require__.bind(null, "+XM/")),
    meta: {
      layout: layoutenums.formbuilder
    },
    children: [{
      path: 'create',
      name: 'FormCreate',
      component: () => Promise.all(/* import() | FormBuilder */[__webpack_require__.e(108), __webpack_require__.e(47), __webpack_require__.e(69), __webpack_require__.e(3), __webpack_require__.e(45), __webpack_require__.e(103), __webpack_require__.e(6), __webpack_require__.e(15), __webpack_require__.e(106), __webpack_require__.e(128), __webpack_require__.e(105), __webpack_require__.e(18), __webpack_require__.e(122), __webpack_require__.e(56)]).then(__webpack_require__.bind(null, "+xb0")),
      meta: {
        layout: layoutenums.formbuilder,
        gtm: 'Form Create'
      }
    }, {
      path: 'design',
      name: 'FormDesign',
      component: () => Promise.all(/* import() | FormDesign */[__webpack_require__.e(69), __webpack_require__.e(3), __webpack_require__.e(10), __webpack_require__.e(15), __webpack_require__.e(122), __webpack_require__.e(57)]).then(__webpack_require__.bind(null, "Qa9z")),
      meta: {
        layout: layoutenums.formbuilder,
        gtm: 'Form Design'
      }
    }, {
      path: 'settings',
      name: 'FormSettings',
      component: () => Promise.all(/* import() | FormBuilder */[__webpack_require__.e(108), __webpack_require__.e(47), __webpack_require__.e(69), __webpack_require__.e(3), __webpack_require__.e(45), __webpack_require__.e(103), __webpack_require__.e(6), __webpack_require__.e(15), __webpack_require__.e(106), __webpack_require__.e(128), __webpack_require__.e(105), __webpack_require__.e(18), __webpack_require__.e(122), __webpack_require__.e(56)]).then(__webpack_require__.bind(null, "SfuA")),
      meta: {
        layout: layoutenums.formbuilder,
        gtm: 'Form Settings'
      }
    }, {
      path: 'share',
      name: 'FormShare',
      component: () => __webpack_require__.e(/* import() | FormShare */ 156).then(__webpack_require__.bind(null, "R9px")),
      meta: {
        layout: layoutenums.formbuilder,
        gtm: 'Form Share'
      }
    }]
  }, {
    path: '/formresult/:id',
    component: () => Promise.all(/* import() | FormResult */[__webpack_require__.e(126), __webpack_require__.e(135), __webpack_require__.e(9), __webpack_require__.e(11), __webpack_require__.e(120), __webpack_require__.e(6), __webpack_require__.e(117), __webpack_require__.e(105), __webpack_require__.e(61)]).then(__webpack_require__.bind(null, "/1va")),
    children: [{
      path: 'result',
      name: 'FormResult',
      component: () => Promise.all(/* import() | FormResult */[__webpack_require__.e(126), __webpack_require__.e(135), __webpack_require__.e(9), __webpack_require__.e(11), __webpack_require__.e(120), __webpack_require__.e(6), __webpack_require__.e(117), __webpack_require__.e(105), __webpack_require__.e(61)]).then(__webpack_require__.bind(null, "nNd7")),
      meta: {
        layout: layoutenums.formbuilder,
        gtm: 'Form Result'
      }
    }, {
      path: 'records',
      name: 'FormRecord',
      component: () => Promise.all(/* import() | FormResult */[__webpack_require__.e(126), __webpack_require__.e(135), __webpack_require__.e(9), __webpack_require__.e(11), __webpack_require__.e(120), __webpack_require__.e(6), __webpack_require__.e(117), __webpack_require__.e(105), __webpack_require__.e(61)]).then(__webpack_require__.bind(null, "8/xd")),
      meta: {
        layout: layoutenums.formbuilder,
        gtm: 'Form Record'
      }
    }, {
      path: 'trash',
      name: 'FormRecordTrash',
      component: () => Promise.all(/* import() | FormResult */[__webpack_require__.e(126), __webpack_require__.e(135), __webpack_require__.e(9), __webpack_require__.e(11), __webpack_require__.e(120), __webpack_require__.e(6), __webpack_require__.e(117), __webpack_require__.e(105), __webpack_require__.e(61)]).then(__webpack_require__.bind(null, "iOah")),
      meta: {
        layout: layoutenums.formbuilder,
        gtm: 'Trash'
      }
    }, {
      path: 'resultshare',
      name: 'FormResultShare',
      component: () => Promise.all(/* import() | FormResult */[__webpack_require__.e(126), __webpack_require__.e(135), __webpack_require__.e(9), __webpack_require__.e(11), __webpack_require__.e(120), __webpack_require__.e(6), __webpack_require__.e(117), __webpack_require__.e(105), __webpack_require__.e(61)]).then(__webpack_require__.bind(null, "1crX")),
      meta: {
        layout: layoutenums.formbuilder,
        gtm: 'Result Share'
      }
    }]
  }, {
    path: '/formnotificationapproval',
    name: 'FormNotificationApproval',
    component: () => __webpack_require__.e(/* import() | FormNotificationApproval */ 58).then(__webpack_require__.bind(null, "wODq"))
  }, {
    path: '/formnotificationunsubscribe',
    name: 'FormNotificationUnsubscribe',
    component: () => __webpack_require__.e(/* import() | FormNotificationUnsubscribe */ 60).then(__webpack_require__.bind(null, "Ofj9"))
  }, {
    path: '/formnotificationreportuser',
    name: 'FormNotificationReportUser',
    component: () => __webpack_require__.e(/* import() | FormNotificationReportUser */ 59).then(__webpack_require__.bind(null, "TuEW"))
  }, // EOF FORM
  // BOF AUTH
  // BOF AUTHENTICATION
  {
    path: '/auth/:provider/callback',
    name: 'ExternalLoginCallback',
    component: () => __webpack_require__.e(/* import() | ExternalLoginCallback */ 52).then(__webpack_require__.bind(null, "6Fi+"))
  }, {
    path: '/auth/applenativeredirect',
    name: 'ExternalLoginAppleNativeRedirect',
    component: () => __webpack_require__.e(/* import() | ExternalLoginAppleNativeRedirect */ 134).then(__webpack_require__.bind(null, "FjT8"))
  }, {
    path: '/auth/resetpasswordconfirmation',
    name: 'ResetPasswordConfirmation',
    component: () => __webpack_require__.e(/* import() | ResetPasswordConfirmation */ 71).then(__webpack_require__.bind(null, "9Nwa"))
  }, {
    path: '/auth/emailconfirmation',
    name: 'EmailConfirmation',
    component: () => __webpack_require__.e(/* import() | EmailConfirmation */ 51).then(__webpack_require__.bind(null, "EAoT"))
  }, {
    path: '/auth',
    name: 'NakedAuthLayout',
    component: () => Promise.all(/* import() | AuthLayout */[__webpack_require__.e(7), __webpack_require__.e(76), __webpack_require__.e(25), __webpack_require__.e(46)]).then(__webpack_require__.bind(null, "PAHY")),
    children: [{
      path: '/auth/signin',
      name: 'SignIn',
      component: () => Promise.all(/* import() | SignIn */[__webpack_require__.e(14), __webpack_require__.e(7), __webpack_require__.e(30), __webpack_require__.e(73)]).then(__webpack_require__.bind(null, "Q1cm")),
      meta: {
        layout: layoutenums.naked,
        gtm: 'SignIn'
      }
    }, {
      path: '/auth/signup',
      name: 'SignUp',
      component: () => Promise.all(/* import() | SignUp */[__webpack_require__.e(14), __webpack_require__.e(7), __webpack_require__.e(24), __webpack_require__.e(30), __webpack_require__.e(74)]).then(__webpack_require__.bind(null, "vLmc")),
      meta: {
        layout: layoutenums.naked,
        gtm: 'SignUp'
      }
    }, {
      path: '/auth/:provider/confirmation',
      name: 'ExternalLoginConfirmation',
      component: () => Promise.all(/* import() | ExternalLoginConfirmation */[__webpack_require__.e(7), __webpack_require__.e(24), __webpack_require__.e(53)]).then(__webpack_require__.bind(null, "TE7H")),
      meta: {
        layout: layoutenums.naked,
        gtm: 'ExternalLoginConfirmation'
      }
    }, {
      path: '/auth/forgotpassword',
      name: 'ForgotPassword',
      component: () => Promise.all(/* import() | ForgotPassword */[__webpack_require__.e(14), __webpack_require__.e(7), __webpack_require__.e(55)]).then(__webpack_require__.bind(null, "2iz/")),
      meta: {
        layout: layoutenums.naked,
        gtm: 'ForgotPassword'
      }
    }]
  }, {
    path: '/auth',
    name: 'AuthLayout',
    component: () => Promise.all(/* import() | AuthLayout */[__webpack_require__.e(7), __webpack_require__.e(76), __webpack_require__.e(25), __webpack_require__.e(46)]).then(__webpack_require__.bind(null, "zy0q")),
    children: [{
      path: 'changeemail',
      name: 'ChangeEmail',
      component: () => Promise.all(/* import() | AuthLayout */[__webpack_require__.e(7), __webpack_require__.e(76), __webpack_require__.e(25), __webpack_require__.e(46)]).then(__webpack_require__.bind(null, "rZxc")),
      meta: {
        requireAuth: true
      }
    }, {
      path: 'resendemailconfirmmail',
      name: 'ReSendEmailConfirmMail',
      component: () => Promise.all(/* import() | AuthLayout */[__webpack_require__.e(7), __webpack_require__.e(76), __webpack_require__.e(25), __webpack_require__.e(46)]).then(__webpack_require__.bind(null, "XO+f")),
      meta: {
        requireAuth: true
      }
    }, {
      path: 'changepassword',
      name: 'ChangePassword',
      component: () => Promise.all(/* import() | AuthLayout */[__webpack_require__.e(7), __webpack_require__.e(76), __webpack_require__.e(25), __webpack_require__.e(46)]).then(__webpack_require__.bind(null, "E074")),
      meta: {
        requireAuth: true
      }
    }]
  }, // BOF OAUTH2
  {
    path: '/oauth2/authorize',
    name: 'OAuth2Authorize',
    component: () => __webpack_require__.e(/* import() | OAuth2Authorize */ 68).then(__webpack_require__.bind(null, "X+FC")),
    meta: {
      requireAuth: true
    }
  }, // EOF OAUTH2
  // EOF AUTHENTICATION
  {
    path: '/quotaexceeded',
    name: 'QuotaExceeded',
    component: () => __webpack_require__.e(/* import() | QuotaExceeded */ 29).then(__webpack_require__.bind(null, "vBFI"))
  }, {
    path: '/quotaexceeded/:resourceType',
    name: 'QuotaExceededResourceType',
    component: () => __webpack_require__.e(/* import() | QuotaExceededResourceType */ 29).then(__webpack_require__.bind(null, "vBFI"))
  }, {
    path: '/account',
    component: () => __webpack_require__.e(/* import() | Account */ 13).then(__webpack_require__.bind(null, "D8Jt")),
    meta: {
      requireAuth: true
    },
    children: [{
      path: 'profile',
      name: 'Profile',
      component: () => Promise.all(/* import() | Account-Profile */[__webpack_require__.e(109), __webpack_require__.e(159), __webpack_require__.e(7), __webpack_require__.e(76), __webpack_require__.e(166)]).then(__webpack_require__.bind(null, "g0w1")),
      meta: {
        gtm: 'Profile'
      }
    }, {
      path: 'packagequotas',
      name: 'ProfilePackageQuotas',
      component: () => __webpack_require__.e(/* import() | Account-PackageQuotas */ 162).then(__webpack_require__.bind(null, "mfAK")),
      meta: {
        gtm: 'Package Quotas'
      }
    }, {
      path: 'quotausagehistory',
      name: 'ProfileQuotaUsageHistory',
      component: () => Promise.all(/* import() | Account-QuotaUsageHistory */[__webpack_require__.e(116), __webpack_require__.e(160), __webpack_require__.e(33), __webpack_require__.e(167)]).then(__webpack_require__.bind(null, "Rm5d")),
      meta: {
        gtm: 'Usage History'
      }
    }, {
      path: 'paymenthistory',
      name: 'PaymentHistory',
      component: () => Promise.all(/* import() | Account-PaymentHistory */[__webpack_require__.e(135), __webpack_require__.e(34)]).then(__webpack_require__.bind(null, "LfHv")),
      meta: {
        gtm: 'Payment History'
      }
    }, {
      path: 'paymentdetails/:id',
      name: 'PaymentDetails',
      component: () => __webpack_require__.e(/* import() | Account-PaymentDetails */ 163).then(__webpack_require__.bind(null, "zujh")),
      meta: {
        gtm: 'Payment Details'
      }
    }, {
      path: 'paymentreceipt/:id',
      name: 'PaymentReceipt',
      component: () => __webpack_require__.e(/* import() | Account-PaymentReceipt */ 164).then(__webpack_require__.bind(null, "g7Bv")),
      meta: {
        gtm: 'Payment Receipt'
      }
    }, // BOF OAUTH2
    {
      path: '/oauth2/permissions',
      name: 'OAuth2Permissions',
      component: () => __webpack_require__.e(/* import() | Account-Permissions */ 165).then(__webpack_require__.bind(null, "aAHB")),
      meta: {
        requireAuth: true,
        gtm: 'Permissions'
      }
    }, // EOF OAUTH2
    {
      path: 'formspayments',
      name: 'FormsPayments',
      component: () => Promise.all(/* import() | Account-FormsPayments */[__webpack_require__.e(126), __webpack_require__.e(135), __webpack_require__.e(133), __webpack_require__.e(161)]).then(__webpack_require__.bind(null, "T2nJ")),
      meta: {
        gtm: 'Collected Payments'
      }
    }, {
      path: 'formspaymentdetails/:id',
      name: 'FormsPaymentDetails',
      component: () => Promise.all(/* import() | Account-FormsPaymentDetails */[__webpack_require__.e(126), __webpack_require__.e(9), __webpack_require__.e(11), __webpack_require__.e(133), __webpack_require__.e(2)]).then(__webpack_require__.bind(null, "Fl8F")),
      meta: {
        gtm: 'Forms Payment Details'
      }
    }]
  }, // OFFLINE
  {
    path: '/localform/:id',
    name: 'LocalForm',
    component: () => Promise.all(/* import() | LocalForm */[__webpack_require__.e(69), __webpack_require__.e(3), __webpack_require__.e(10), __webpack_require__.e(124), __webpack_require__.e(26)]).then(__webpack_require__.bind(null, "vbfY")),
    meta: {
      layout: layoutenums.formview,
      gtm: 'Local Form'
    }
  }, // OFFLINE
  // BOF PAYMENT
  {
    path: '/packages',
    name: 'Packages',
    component: () => __webpack_require__.e(/* import() | Packages */ 27).then(__webpack_require__.bind(null, "2WlF")),
    meta: {
      gtm: 'Packages'
    }
  }, {
    path: '/buypackage',
    name: 'BuyPackage',
    component: () => __webpack_require__.e(/* import() | BuyPackage */ 17).then(__webpack_require__.bind(null, "IItN")),
    meta: {
      requireAuth: true,
      gtm: 'Buy Package'
    }
  }, {
    path: '/downgradepackage',
    name: 'DowngradePackage',
    component: () => __webpack_require__.e(/* import() | DowngradePackage */ 123).then(__webpack_require__.bind(null, "A1nR")),
    meta: {
      requireAuth: true
    }
  }, {
    path: '/stripe/redirecttocheckout',
    name: 'StripeRedirectToCheckout',
    component: () => __webpack_require__.e(/* import() | PaymentGateways */ 4).then(__webpack_require__.bind(null, "rKsc"))
  }, // EOF PAYMENT
  {
    path: '/report/:id',
    name: 'PrivateReport',
    component: () => Promise.all(/* import() | PrivateReport */[__webpack_require__.e(126), __webpack_require__.e(47), __webpack_require__.e(66), __webpack_require__.e(5), __webpack_require__.e(6), __webpack_require__.e(117), __webpack_require__.e(12), __webpack_require__.e(19)]).then(__webpack_require__.bind(null, "J2Bl")),
    meta: {
      layout: layoutenums.formview
    }
  }, {
    path: '/formreport/:formId',
    name: 'FormPrivateReport',
    component: () => Promise.all(/* import() | FormPrivateReport */[__webpack_require__.e(126), __webpack_require__.e(47), __webpack_require__.e(66), __webpack_require__.e(5), __webpack_require__.e(6), __webpack_require__.e(117), __webpack_require__.e(12), __webpack_require__.e(19)]).then(__webpack_require__.bind(null, "J2Bl")),
    meta: {
      layout: layoutenums.formview
    }
  }, {
    path: '/report/reportdata/:id/:page',
    name: 'SharedReportRecords',
    component: () => Promise.all(/* import() | SharedReportRecords */[__webpack_require__.e(126), __webpack_require__.e(135), __webpack_require__.e(9), __webpack_require__.e(11), __webpack_require__.e(120), __webpack_require__.e(5), __webpack_require__.e(12), __webpack_require__.e(72)]).then(__webpack_require__.bind(null, "lIdu")),
    meta: {
      layout: layoutenums.formview
    }
  }, {
    path: '/downloadrecords/:id/:fileType',
    name: 'DownloadRecords',
    component: () => Promise.all(/* import() | DownloadRecords */[__webpack_require__.e(109), __webpack_require__.e(50)]).then(__webpack_require__.bind(null, "tOFE")),
    meta: {
      layout: layoutenums.formview,
      requireAuth: true,
      gtm: 'Download Records'
    }
  }, {
    path: '/form/:id',
    name: 'FormView',
    component: () => Promise.all(/* import() | FormView */[__webpack_require__.e(47), __webpack_require__.e(69), __webpack_require__.e(3), __webpack_require__.e(10), __webpack_require__.e(15), __webpack_require__.e(63)]).then(__webpack_require__.bind(null, "6X/N")),
    meta: {
      layout: layoutenums.formview
    }
  }, {
    path: '/recordimage/:answerId/:fileId',
    name: 'RecordImageRead',
    component: () => __webpack_require__.e(/* import() | RecordImageRead */ 70).then(__webpack_require__.bind(null, "iLZ4")),
    meta: {
      layout: layoutenums.formview
    }
  }, {
    path: '/answerfile/:answerId/:fileId',
    name: 'Answerfile',
    component: () => Promise.all(/* import() | DownloadRecordFile */[__webpack_require__.e(109), __webpack_require__.e(49)]).then(__webpack_require__.bind(null, "YyOC")),
    meta: {
      layout: layoutenums.formview
    }
  }, {
    path: '/externalurlredirect',
    name: 'ExternalUrlRedirect',
    component: () => __webpack_require__.e(/* import() | ExternalUrlRedirect */ 54).then(__webpack_require__.bind(null, "8G0D")),
    meta: {
      layout: layoutenums.formview
    }
  }, {
    path: '/:username/:formUrl/report',
    name: 'SharedReport',
    component: () => Promise.all(/* import() | SharedReport */[__webpack_require__.e(126), __webpack_require__.e(47), __webpack_require__.e(66), __webpack_require__.e(5), __webpack_require__.e(6), __webpack_require__.e(117), __webpack_require__.e(12), __webpack_require__.e(19)]).then(__webpack_require__.bind(null, "J2Bl")),
    meta: {
      layout: layoutenums.formview
    }
  }, {
    path: '/:username/:formUrl',
    name: 'FormViewUrl',
    component: () => Promise.all(/* import() | FormView */[__webpack_require__.e(47), __webpack_require__.e(69), __webpack_require__.e(3), __webpack_require__.e(10), __webpack_require__.e(15), __webpack_require__.e(63)]).then(__webpack_require__.bind(null, "6X/N")),
    meta: {
      layout: layoutenums.formview
    }
  }, {
    path: '/404',
    name: '404page',
    component: () => Promise.resolve(/* import() */).then(__webpack_require__.bind(null, "lnx7")),
    meta: {
      gtm: '404'
    }
  }, {
    path: '/:username',
    name: 'UserForms',
    component: () => __webpack_require__.e(/* import() | UserForms */ 75).then(__webpack_require__.bind(null, "sPbr"))
  }, {
    path: '*',
    redirect: '/404'
  }],

  scrollBehavior(to, from, savedPosition) {
    if (to.hash || from.hash) {
      return {
        selector: to.hash || from.hash // , offset: { x: 0, y: 10 }

      };
    } else {
      return {
        x: 0,
        y: 0
      };
    }
  }

});
router.afterEach((to, from) => {
  nprogress_default.a.done();
  document.body.classList.remove('route-loading');
  window.loadedRoutes[to.path] = true;
});
router.beforeEach((to, from, next) => {
  router.app.prevFullPath = from.fullPath;

  if (window.firstTimeFlag && window.fbq) {
    window.fbq('trackSingle', prod["a" /* default */].facebookPixelId, 'PageView', {
      path: to.fullPath
    });
  }

  window.firstTimeFlag = true;

  if (to.name && !window.loadedRoutes[to.path]) {
    document.body.classList.add('route-loading');
    nprogress_default.a.start();
  }

  if (to.query.lang && to.query.lang !== lang["default"].locale && Object(lang["getSupportedLanguages"])().includes(to.query.lang)) {
    Object(lang["loadLanguageAsync"])(to.query.lang);
  } // meta.gtm is for vue-gtm https://github.com/mib200/vue-gtm#sync-gtm-with-your-router


  if (to.meta && to.meta.gtm) {
    document.title = "".concat(to.meta.gtm, " | forms.app");
  } // document.head.querySelector('meta[name=description]').content = 'FormBuilder - ' + to.name;


  if (to.matched.some(record => record.meta.requireAuth)) {
    if (!router.app.$auth.isAuthenticated()) {
      // this.$auth.logout();
      // this.setUser();
      next({
        name: 'SignIn',
        query: {
          redirect: to.fullPath
        }
      });
    } else {
      next();
    }
  } else {
    next(); // make sure to always call next()!
  }
});
/* harmony default export */ var routes = (router);
// EXTERNAL MODULE: ./node_modules/vue-authenticate/dist/vue-authenticate.es2015.js
var vue_authenticate_es2015 = __webpack_require__("ujiD");

// EXTERNAL MODULE: ./node_modules/vue-axios/dist/vue-axios.min.js
var vue_axios_min = __webpack_require__("p/7L");
var vue_axios_min_default = /*#__PURE__*/__webpack_require__.n(vue_axios_min);

// EXTERNAL MODULE: ./node_modules/axios/index.js
var axios = __webpack_require__("vDqi");
var axios_default = /*#__PURE__*/__webpack_require__.n(axios);

// EXTERNAL MODULE: ./node_modules/vue-gtm/dist/vue-gtm.min.js
var vue_gtm_min = __webpack_require__("GtLO");
var vue_gtm_min_default = /*#__PURE__*/__webpack_require__.n(vue_gtm_min);

// EXTERNAL MODULE: ./node_modules/vue-lazyload/vue-lazyload.esm.js
var vue_lazyload_esm = __webpack_require__("yvkt");

// EXTERNAL MODULE: ./node_modules/webfontloader/webfontloader.js
var webfontloader = __webpack_require__("J9Y1");
var webfontloader_default = /*#__PURE__*/__webpack_require__.n(webfontloader);

// CONCATENATED MODULE: ./src/designcomponents/plugins/Theme.js
'use-strict';

var Theme = function Theme() {};
/* eslint-disable */


Theme.install = function (Vue) {
  if (!Vue.prototype.hasOwnProperty('$theme')) {
    Object.defineProperty(Vue.prototype, '$theme', {
      get: function get() {
        return Object.freeze({
          transitionMS: 300,
          transitionSlowMS: 600,
          transitionFastMS: 150,
          blue: '#11c4e0',
          orange: '#ff9e24',
          red: '#ef5350',
          green: '#40d07a',
          black: '#2d2d2d',
          backgroundGray: '#f5f5f5',
          disabled: '#cecece',
          disabledBackgroundColor: '#e7e7e7',
          placeholderColor: '#2d2d2d4d',
          borderColor: '#ececec',
          infiniteRadius: '999px',
          borderRadius: '8px',
          loaderGrey: '#e6e6e6',
          mobileMaxWidth: '767px'
        });
      }
    });
  }
};

/* harmony default export */ var plugins_Theme = (Theme);
// CONCATENATED MODULE: ./src/designcomponents/plugins/SmoothScroll.js
'use-strict';
/* eslint-disable */



var SmoothScroll = function SmoothScroll() {}; // https://coderwall.com/p/hujlhg/smooth-scrolling-without-jquery

/**
    Smoothly scroll element to the given target (element.scrollTop)
    for the given duration

    Returns a promise that's fulfilled when done, or rejected if
    interrupted
 */


function isElement(element) {
  return element instanceof Element || element instanceof HTMLDocument;
}

var goTo = function goTo(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 500;
  var element = document.documentElement;
  var targetPos = target;

  if (isElement(target)) {
    targetPos = target.getBoundingClientRect().top;
  }

  if (isNaN(Number(targetPos))) {
    return Promise.reject("bad target or position");
  }

  targetPos = Math.round(targetPos);
  duration = Math.round(duration);

  if (duration < 0) {
    return Promise.reject("bad duration");
  }

  if (duration === 0) {
    element.scrollTop = targetPos;
    return Promise.resolve();
  }

  var start_time = Date.now();
  var end_time = start_time + duration;
  var start_top = element.scrollTop;
  var distance = targetPos - start_top; // based on http://en.wikipedia.org/wiki/Smoothstep

  var smooth_step = function smooth_step(start, end, point) {
    if (point <= start) {
      return 0;
    }

    if (point >= end) {
      return 1;
    }

    var x = (point - start) / (end - start); // interpolation

    return x * x * (3 - 2 * x);
  };

  return new Promise(function (resolve, reject) {
    // This is to keep track of where the element's scrollTop is
    // supposed to be, based on what we're doing
    var previous_top = element.scrollTop; // This is like a think function from a game loop

    var scroll_frame = function scroll_frame() {
      if (element.scrollTop != previous_top) {
        reject("interrupted");
        return;
      } // set the scrollTop for this frame


      var now = Date.now();
      var point = smooth_step(start_time, end_time, now);
      var frameTop = Math.round(start_top + distance * point);
      element.scrollTop = frameTop; // check if we're done!

      if (now >= end_time) {
        resolve();
        return;
      } // If we were supposed to scroll but didn't, then we
      // probably hit the limit, so consider it done; not
      // interrupted.


      if (element.scrollTop === previous_top && element.scrollTop !== frameTop) {
        resolve();
        return;
      }

      previous_top = element.scrollTop; // schedule next frame for execution

      setTimeout(scroll_frame, 0);
    }; // boostrap the animation process


    setTimeout(scroll_frame, 0);
  });
};

SmoothScroll.install = function (Vue) {
  Vue.goTo = goTo;

  if (!Vue.prototype.hasOwnProperty('$goTo')) {
    Object.defineProperty(Vue.prototype, '$goTo', {
      get: function get() {
        return goTo;
      }
    });
  }
};

/* harmony default export */ var plugins_SmoothScroll = (SmoothScroll);
// EXTERNAL MODULE: ./src/questiontypes/questiontypesmanager.js
var questiontypesmanager = __webpack_require__("K/kh");

// EXTERNAL MODULE: ./src/services/AnswerService.js
var AnswerService = __webpack_require__("12B7");

// EXTERNAL MODULE: ./src/services/Auth.js
var Auth = __webpack_require__("0d3v");

// EXTERNAL MODULE: ./src/services/FileService.js
var FileService = __webpack_require__("iAnd");

// EXTERNAL MODULE: ./src/services/FormPaymentService.js
var FormPaymentService = __webpack_require__("lhJi");

// EXTERNAL MODULE: ./src/services/FormService.js
var FormService = __webpack_require__("tL2h");

// EXTERNAL MODULE: ./src/services/FormLocalStorageService.js
var FormLocalStorageService = __webpack_require__("Sk9r");

// EXTERNAL MODULE: ./src/services/OAuth2Service.js
var OAuth2Service = __webpack_require__("+Ndi");

// EXTERNAL MODULE: ./src/services/PackagesService.js
var PackagesService = __webpack_require__("jvRO");

// EXTERNAL MODULE: ./src/services/PaymentService.js
var PaymentService = __webpack_require__("G8Jt");

// EXTERNAL MODULE: ./src/services/Api.js
var Api = __webpack_require__("P0qE");

// CONCATENATED MODULE: ./src/services/PostsService.js

/* harmony default export */ var PostsService = ({
  fetchPosts() {
    return Api["a" /* default */].get('posts');
  },

  addPost(params) {
    return Api["a" /* default */].post('add_post', params);
  },

  updatePost(params) {
    return Api["a" /* default */].put('posts/' + params.id, params);
  },

  getPost(params) {
    return Api["a" /* default */].get('post/' + params.id);
  },

  deletePost(id) {
    return Api["a" /* default */].delete('posts/' + id);
  }

});
// EXTERNAL MODULE: ./src/services/ReportService.js
var ReportService = __webpack_require__("+uhQ");

// EXTERNAL MODULE: ./src/services/SearchService.js
var SearchService = __webpack_require__("sUze");

// CONCATENATED MODULE: ./src/services/index.js














/* harmony default export */ var services = ({
  AnswerService: AnswerService["a" /* default */],
  Auth: Auth["a" /* default */],
  FileService: FileService["a" /* default */],
  FormPaymentService: FormPaymentService["a" /* default */],
  FormService: FormService["a" /* default */],
  FormLocalStorageService: FormLocalStorageService["a" /* default */],
  OAuth2Service: OAuth2Service["a" /* default */],
  PackagesService: PackagesService["a" /* default */],
  PaymentService: PaymentService["a" /* default */],
  PostsService: PostsService,
  QuotaService: QuotaService["a" /* default */],
  ReportService: ReportService["a" /* default */],
  SearchService: SearchService["a" /* default */],
  UserService: UserService["a" /* default */]
});
// EXTERNAL MODULE: ./node_modules/normalize.css/normalize.css
var normalize = __webpack_require__("9d8Q");

// EXTERNAL MODULE: ./src/assets/css/critical.scss
var critical = __webpack_require__("x0pa");

// EXTERNAL MODULE: ./node_modules/nprogress/nprogress.css
var nprogress_nprogress = __webpack_require__("pdi6");

// CONCATENATED MODULE: ./src/designcomponents/directives/index.js


__webpack_require__("t/QJ")(vue_esm["default"]); // require('./autofillDetect')(Vue);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/ISelect.vue?vue&type=template&id=d9494904&scoped=true&
var ISelectvue_type_template_id_d9494904_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "i-select-wrapper", attrs: { tabindex: _vm.tabindex } },
    [
      _c(
        "div",
        { staticClass: "select-fancy", class: _vm.classes },
        [
          _c(
            "div",
            {
              staticClass: "input-wrapper",
              on: {
                click: function($event) {
                  $event.stopPropagation()
                  return _vm.onInputClick($event)
                }
              }
            },
            [
              _vm.searchable === false
                ? _c("div", {
                    staticClass: "click-layer do-not-lose-focus",
                    class: {
                      "hidden-layer": _vm.$root.onSubPage === "FormDesign"
                    }
                  })
                : _vm._e(),
              _vm._v(" "),
              _c(
                "input",
                _vm._g(
                  {
                    directives: [
                      {
                        name: "show",
                        rawName: "v-show",
                        value: !_vm.isInputSlotFilled,
                        expression: "!isInputSlotFilled"
                      }
                    ],
                    ref: "input",
                    staticClass: "f-select",
                    class: _vm.inputClasses,
                    attrs: {
                      type: "text",
                      disabled: _vm.disabled,
                      readonly: _vm.readonly,
                      placeholder: _vm.placeholder,
                      tabindex: _vm.disabled ? "-1" : _vm.tabindex,
                      name: _vm.name,
                      autocomplete: _vm.autocomplete
                    },
                    domProps: {
                      value:
                        _vm.isOpen && _vm.searchable
                          ? _vm.inputValue
                          : !_vm.inputValue || _vm.inputValue.length < 1
                          ? _vm.emptyOption
                          : _vm.inputValue
                    }
                  },
                  _vm.events
                )
              ),
              _vm._v(" "),
              _vm._t("input", null, { item: _vm.value }),
              _vm._v(" "),
              _vm.isClearable
                ? _c(
                    "div",
                    {
                      staticClass: "clear-button",
                      on: {
                        click: function($event) {
                          $event.stopPropagation()
                          return _vm.clearSelection($event)
                        }
                      }
                    },
                    [_c("i-icon", { attrs: { icon: "times" } })],
                    1
                  )
                : _c("i-icon", { attrs: { icon: "caret-down" } })
            ],
            2
          ),
          _vm._v(" "),
          _c(
            "transition",
            {
              attrs: {
                "enter-active-class": "fast animated fadeInDown",
                "leave-active-class": "fast animated fadeOutUp"
              }
            },
            [
              _vm.isOpen
                ? _c(
                    "ul",
                    {
                      ref: "opitonWrapper",
                      staticClass: "option-wrapper",
                      attrs: { tabindex: "-1" },
                      on: { scroll: _vm.onScroll }
                    },
                    [
                      _c(
                        "div",
                        { staticClass: "option-wrapper-layout" },
                        _vm._l(_vm.optionModel, function(item, index) {
                          return _c(
                            "li",
                            {
                              key: index,
                              ref: "spanOptions",
                              refInFor: true,
                              staticClass: "option",
                              class: {
                                selected: _vm.selectedOptionIndex === index
                              },
                              attrs: {
                                tabindex: "-1",
                                set: (_vm.itemText = _vm.getOptionText(item))
                              },
                              on: {
                                click: function($event) {
                                  $event.stopPropagation()
                                  return _vm.select(item)
                                }
                              }
                            },
                            [
                              _vm._t("default", null, {
                                item: item,
                                index: index
                              }),
                              _vm._v(" "),
                              !_vm.isDefaultSlotFilled
                                ? _c(
                                    "span",
                                    [
                                      _vm.itemText.strong
                                        ? [
                                            _c("b", [
                                              _vm._v(
                                                _vm._s(_vm.itemText.value[0])
                                              )
                                            ]),
                                            _vm._v(
                                              _vm._s(_vm.itemText.value[1]) +
                                                "\n\t\t\t\t\t\t\t"
                                            )
                                          ]
                                        : [
                                            _vm._v(
                                              "\n\t\t\t\t\t\t\t\t" +
                                                _vm._s(_vm.itemText.value) +
                                                "\n\t\t\t\t\t\t\t"
                                            )
                                          ]
                                    ],
                                    2
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.multiple &&
                              _vm.isObjectSelected(item) === true
                                ? _c("i-icon", { attrs: { icon: "check" } })
                                : _vm._e()
                            ],
                            2
                          )
                        }),
                        0
                      )
                    ]
                  )
                : _vm._e()
            ]
          ),
          _vm._v(" "),
          !_vm.noValidationElement && _vm.errorMessage
            ? _c(
                "span",
                {
                  staticClass: "helper-text",
                  domProps: { innerHTML: _vm._s(_vm.errorMessage) }
                },
                [_c("span", { staticClass: "arrow" })]
              )
            : _vm._e()
        ],
        1
      )
    ]
  )
}
var ISelectvue_type_template_id_d9494904_scoped_true_staticRenderFns = []
ISelectvue_type_template_id_d9494904_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/ISelect.vue?vue&type=template&id=d9494904&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.regexp.to-string.js
var es_regexp_to_string = __webpack_require__("JfAA");

// EXTERNAL MODULE: ./src/designcomponents/mixins/validatable.js
var validatable = __webpack_require__("QCF4");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/ISelect.vue?vue&type=script&lang=js&






//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
// import component from '../mixins/component';

window.selects = window.selects || []; // https://stackoverflow.com/questions/35939886/find-first-scrollable-parent

function getFirstScrollableParent(element) {
  var includeHidden = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  var style = getComputedStyle(element);
  var excludeStaticParent = style.position === 'absolute';
  var overflowRegex = includeHidden ? /(auto|scroll|hidden)/ : /(auto|scroll)/;

  if (style.position === 'fixed') {
    return window;
  }

  for (var parent = element; parent = parent.parentElement;) {
    style = getComputedStyle(parent);

    if (excludeStaticParent && style.position === 'static') {
      continue;
    }

    if (parent.tagName === document.body.tagName) {
      return window;
    }

    if (overflowRegex.test(style.overflow + style.overflowY + style.overflowX)) {
      return parent;
    }
  }

  return window;
}

/* harmony default export */ var ISelectvue_type_script_lang_js_ = ({
  name: 'ISelect',
  extends: validatable["a" /* default */],
  // mixins: [component],
  props: {
    name: String,
    autocomplete: String,
    clearable: Boolean,
    tabindex: String,
    placeholder: String,
    items: Array,
    optionText: String,
    optionValue: String,
    value: [String, Number, Array, Object],
    searchable: Boolean,
    required: Boolean,
    emptyOption: String,
    disabled: Boolean,
    customClass: String,
    multiple: Boolean,
    readonly: Boolean,
    contains: Boolean,
    infiniteScroll: [Boolean, Number]
  },
  data: function data() {
    return {
      isOpen: false,
      inputValue: null,
      searchText: '',
      inputValueCache: null,
      searchArray: [],
      selectedOptionIndex: -1,
      isSelectedObject: {},
      direction: null,
      scrollTimeout: null,
      page: 1,
      firstScrollableParent: null,
      isFocused: false,
      rawSelectedArray: []
    };
  },
  created: function created() {
    if (this.multiple && !Array.isArray(this.value)) {
      this.$emit('input', []);
    }
  },
  mounted: function mounted() {
    this.setValue();

    if (this.infiniteScroll) {
      var itemPerPageCount = 10;

      if (!isNaN(this.infiniteScroll)) {
        itemPerPageCount = this.infiniteScroll;
      }

      this.page = this.selectedOptionIndex / itemPerPageCount + 1;
    }

    setTimeout(() => {
      this.firstScrollableParent = getFirstScrollableParent(this.$el);

      if (!window.selects.find(x => x._uid === this._uid)) {
        window.selects.push(this);
      }
    }, 1);
  },
  methods: {
    focus: function focus() {
      if (this.searchable) {
        this.$refs.input.focus();
        this.$refs.input.select();
      }
    },
    isObjectSelected: function isObjectSelected(item) {
      return this.isSelectedObject[JSON.stringify(this.optionValue ? item[this.optionValue] : item)];
    },
    clearSelection: function clearSelection() {
      var val = null;

      if (typeof this.value === 'string') {
        val = '';
      } else if (Array.isArray(this.value)) {
        val = [];
      } else if (typeof this.value === 'object') {
        val = {};
      }

      this.$emit('input', val);
      this.$emit('change', val);
      this.inputValue = '';
      this.selectedOptionIndex = -1;
      this.isSelectedObject = {};
    },
    onScroll: function onScroll(e) {
      if (this.infiniteScroll) {
        var ow = this.$refs.opitonWrapper || this.$el.querySelector('.option-wrapper');

        if (ow && ow.scrollHeight - (ow.scrollTop + ow.clientHeight) < 50) {
          this.$emit('nextPage', ++this.page);
        }
      }

      this.$emit('onScroll', e);
    },
    onParentScroll: function onParentScroll(e) {
      clearTimeout(this.scrollTimeout);
      this.scrollTimeout = setTimeout(() => {
        this.calculateOptionsWrapperPosition();
      }, 100);
    },
    getOptionText: function getOptionText(item) {
      var str = this.optionText ? item[this.optionText] : item;

      if (str && this.inputValue && this.searchable && !this.contains) {
        var len = this.inputValue.length;
        return {
          value: [str.substring(0, len), str.substring(len, str.length)],
          strong: true
        };
      }

      return {
        value: str,
        strong: false
      };
    },
    setValue: function setValue() {
      if (this.value) {
        this.isSelectedObject = {};

        if (this.multiple) {
          // let inputValue = this.emptyOption ? this.emptyOption + '  ' : '';
          var inputValue = '';

          for (var i = 0; i < this.items.length; i++) {
            var item = this.items[i];

            for (var j = 0; j < this.value.length; j++) {
              var value = this.value[j];
              var itemStr = JSON.stringify(this.optionValue ? item[this.optionValue] : item);

              if (itemStr === JSON.stringify(value)) {
                inputValue += (this.optionText ? item[this.optionText] : item) + ', ';
                this.isSelectedObject[itemStr] = true;
                this.rawSelectedArray.push(item);
              }
            }
          }

          inputValue = inputValue.substring(0, inputValue.length - 2);
          this.inputValue = inputValue;
        } else {
          var _value = this.value;

          if (Array.isArray(_value) && _value.length > 0) {
            _value = this.value[0];
          }

          var found = this.items.find(x => JSON.stringify(this.optionValue ? x[this.optionValue] : x) === JSON.stringify(_value));

          if (found) {
            this.inputValue = this.optionText ? found[this.optionText] : found;
            this.selectedOptionIndex = this.items.indexOf(found);
          } else {
            this.inputValue = '';
            this.selectedOptionIndex = -1;
          }
        }
      }
    },
    onBodyClick: function onBodyClick(e) {
      this.close();
    },
    select: function select(item) {
      this.searchText = ''; // if (this.emptyOption === item) {
      // 	// this.$emit('input', this.multiple ? [] : null);
      // 	// this.$emit('change', this.multiple ? [] : null);
      // 	// this.inputValue = item;
      // 	// this.isSelectedObject = {};
      // 	this.clearSelection();
      // 	this.close();
      // 	return;
      // }

      if (this.multiple) {
        var value = this.value;
        var found = this.rawSelectedArray.findIndex(x => JSON.stringify(x) === JSON.stringify(item));

        if (found > -1) {
          this.rawSelectedArray.splice(found, 1);
          value.splice(found, 1);
        } else {
          value.push(this.optionValue ? item[this.optionValue] : item);
          this.rawSelectedArray.push(item);
        }

        this.isSelectedObject[JSON.stringify(this.optionValue ? item[this.optionValue] : item)] = found === -1;
        this.$emit('input', value);
        this.$emit('change', value);

        if (this.optionText) {
          var inputValue = '';

          for (var i = 0; i < this.rawSelectedArray.length; i++) {
            inputValue += this.rawSelectedArray[i][this.optionText] + ', ';
          }

          inputValue = inputValue.substring(0, inputValue.length - 2);
          this.inputValue = inputValue;
        } else {
          this.inputValue = this.rawSelectedArray.join(', ');
        }
      } else {
        if (this.optionText) {
          this.inputValue = item[this.optionText];
        } else {
          this.inputValue = item;
        }

        if (this.optionValue) {
          this.$emit('input', item[this.optionValue]);
          this.$emit('change', item[this.optionValue]);
        } else {
          this.$emit('input', item);
          this.$emit('change', item);
        }

        this.close();
      }

      this.validate();
    },
    onKeyPress: function onKeyPress(e) {
      switch (e.keyCode) {
        case 38:
          // arrow up
          if (this.selectedOptionIndex > 0) {
            this.selectedOptionIndex--;
          }

          break;

        case 40:
          // arrow down
          if (this.selectedOptionIndex < this.optionModel.length) {
            this.selectedOptionIndex++;
          }

          break;

        case 13:
          // enter
          this.select(this.optionModel[this.selectedOptionIndex]);
          this.$refs.input.blur();
          break;
      }

      this.$emit('keydown', e);
    },
    calculateOptionsWrapperPosition: function calculateOptionsWrapperPosition() {
      var wrapperBottom = 0;
      var optionRect = this.$refs.opitonWrapper.getBoundingClientRect();
      var inputRect = this.$refs.input.getBoundingClientRect();

      if (this.firstScrollableParent.innerHeight) {
        wrapperBottom = window.innerHeight;
      } else {
        wrapperBottom = this.firstScrollableParent.getBoundingClientRect().bottom;
      }

      if (optionRect.height + inputRect.bottom > wrapperBottom) {
        this.direction = 'up';
      } else {
        this.direction = 'down';
      }
    },
    onInputClick: function onInputClick(e) {
      if (this.readonly || this.disabled) {
        return;
      }

      if (this.searchable && this.isOpen === true) {
        return;
      }

      if (this.searchable) {
        this.open();
      } else {
        this.isOpen ? this.close() : this.open();
      }

      if (this.isOpen) {
        this.$nextTick(() => {
          if (this.$refs.spanOptions) {
            this.$refs.opitonWrapper.scrollTop = this.$refs.spanOptions[this.selectedOptionIndex === -1 ? 0 : this.selectedOptionIndex].offsetTop;
          }
        });
      }

      this.$emit('click', e);
    },
    onInputFocus: function onInputFocus(e) {
      if (this.disabled && this.readonly) {
        return;
      }

      if (this.searchable) {
        if (this.value) {
          this.inputValueCache = this.inputValue;
        } else {
          this.inputValueCache = null;
        }

        this.inputValue = '';
        this.searchText = '';

        if (this.$root.isMobile) {
          var headerElement = document.querySelector('.touch-bar-nav');

          if (headerElement) {
            headerElement.style.display = 'none';
          }

          var navElement = document.querySelector('.navbar-middle');

          if (navElement) {
            navElement.style.display = 'none';
          }
        }
      }

      this.isFocused = true;
      this.$emit('focus', e);
    },
    onInputBlur: function onInputBlur(e) {
      if (this.disabled && this.readonly) {
        return;
      }

      if (this.searchable) {
        if (!!this.value && this.searchText.length === 0) {
          this.inputValue = this.inputValueCache;
        }

        if (this.$root.isMobile) {
          var headerElement = document.querySelector('.touch-bar-nav');

          if (headerElement) {
            headerElement.style.display = null;
          }

          var navElement = document.querySelector('.navbar-middle');

          if (navElement) {
            navElement.style.display = null;
          }
        }
      }

      this.isFocused = false;
      this.$emit('blur', e);
    },
    onInput: function onInput(e) {
      if (this.searchable) {
        if (!this.isOpen) {
          this.open();
        }

        this.selectedOptionIndex = 0;
        this.inputValue = this.$refs.input.value;
        this.searchText = this.inputValue;

        if (this.searchText.length > 0) {
          if (this.optionText) {
            if (this.contains) {
              this.searchArray = this.items.filter(x => (x[this.optionText] || '').toLowerCase().includes(this.searchText.toLowerCase()));
            } else {
              this.searchArray = this.items.filter(x => (x[this.optionText] || '').toLowerCase().startsWith(this.searchText.toLowerCase()));
            }
          } else {
            if (this.contains) {
              this.searchArray = this.items.filter(x => (x || '').toLowerCase().includes(this.searchText.toLowerCase()));
            } else {
              this.searchArray = this.items.filter(x => (x || '').toLowerCase().startsWith(this.searchText.toLowerCase()));
            }
          }

          this.$emit('onSearch', this.searchArray);
        } else {
          this.searchArray = [];
        }
      } // this.$emit('input', e);

    },
    isSelected: function isSelected(item, index) {
      if (this.multiple) {
        return this.items.find(x => x.value === this.value[index]) === undefined;
      }

      if (this.optionValue) {
        return item[this.optionValue] === this.value;
      }

      return item === this.value;
    },
    open: function open() {
      this.closeAll(true);
      document.body.classList.add('dropdown-opened');
      document.body.addEventListener('click', this.onBodyClick, false);

      if (this.firstScrollableParent) {
        this.firstScrollableParent.addEventListener('scroll', this.onParentScroll, false);
      }

      this.isOpen = true;
      this.$nextTick(() => {
        this.calculateOptionsWrapperPosition();
      });
    },
    close: function close() {
      document.body.classList.remove('dropdown-opened');
      document.body.removeEventListener('click', this.onBodyClick);

      if (this.firstScrollableParent) {
        this.firstScrollableParent.removeEventListener('scroll', this.onParentScroll);
      }

      this.isOpen = false;
    },
    closeAll: function closeAll() {
      var closeAllButThis = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

      if (closeAllButThis === true) {
        for (var i = 0; i < window.selects.length; i++) {
          if (this._uid !== window.selects[i]._uid) {
            window.selects[i].close();
          }
        }
      } else {
        for (var _i = 0; _i < window.selects.length; _i++) {
          window.selects[_i].close();
        }
      }
    }
  },
  computed: {
    isClearable: function isClearable() {
      return this.clearable && !this.isSelectionEmpty;
    },
    isSelectionEmpty: function isSelectionEmpty() {
      if (this.value === null || this.value === undefined) {
        return true;
      }

      if (typeof this.value === 'string') {
        return this.value.length === 0;
      }

      if (typeof this.value === 'number') {
        return this.value.toString().length === 0;
      }

      if (Array.isArray(this.value)) {
        return this.value.length === 0;
      }

      if (typeof this.value === 'object') {
        return Object.keys(this.value).length === 0;
      }
    },
    input: function input() {
      return this.$refs.input;
    },
    events: function events() {
      var events = {};

      for (var key in this.$listeners) {
        events[key] = this.$listeners[key];
      }

      events.focus = this.onInputFocus;
      events.blur = this.onInputBlur;
      events.input = this.onInput; // events.change = this.onInput;

      events.keydown = this.onKeyPress;
      return events;
    },
    inputClasses: function inputClasses() {
      return {
        'disabled': this.disabled,
        'searchable': this.searchable,
        'invalid': this.errorMessage
      };
    },
    classes: function classes() {
      var classes = {
        'invalid-input-wrapper': this.errorMessage,
        'open': this.isOpen
      };
      classes[this.direction] = true;
      return classes;
    },
    optionModel: function optionModel() {
      var items = this.searchText.length > 0 ? this.searchArray : this.items;

      if (this.infiniteScroll) {
        var multiplier = 10;

        if (!isNaN(this.infiniteScroll)) {
          multiplier = this.infiniteScroll;
        }

        return items.slice(0, this.page * multiplier);
      }

      return items;
    },
    isDefaultSlotFilled: function isDefaultSlotFilled() {
      return !!this.$slots.default || !!this.$scopedSlots.default;
    },
    isInputSlotFilled: function isInputSlotFilled() {
      return !!this.$slots.input || !!this.$scopedSlots.input;
    }
  },
  beforeDestroy: function beforeDestroy() {
    window.selects = window.selects.filter(x => x._uid !== this._uid);
  },
  watch: {
    value: function value(to, from) {
      if (this.value === null || this.value === undefined) {
        this.inputValue = null;
      }

      if (this.value !== this.$refs.input.value && !this.multiple) {
        this.$nextTick(() => {
          this.setValue();
        });
      }
    },
    items: function items() {
      this.$nextTick(() => {
        this.setValue();
      });
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/ISelect.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_ISelectvue_type_script_lang_js_ = (ISelectvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/ISelect.vue?vue&type=style&index=0&id=d9494904&lang=scss&scoped=true&
var ISelectvue_type_style_index_0_id_d9494904_lang_scss_scoped_true_ = __webpack_require__("MKyv");

// CONCATENATED MODULE: ./src/designcomponents/components/ISelect.vue






/* normalize component */

var ISelect_component = Object(componentNormalizer["a" /* default */])(
  components_ISelectvue_type_script_lang_js_,
  ISelectvue_type_template_id_d9494904_scoped_true_render,
  ISelectvue_type_template_id_d9494904_scoped_true_staticRenderFns,
  false,
  null,
  "d9494904",
  null
  
)

/* hot reload */
if (false) { var ISelect_api; }
ISelect_component.options.__file = "src/designcomponents/components/ISelect.vue"
/* harmony default export */ var ISelect = (ISelect_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/ISwitch.vue?vue&type=template&id=3d47fc94&scoped=true&
var ISwitchvue_type_template_id_3d47fc94_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "switch-content",
      class: { "with-label": _vm.label, "with-title": _vm.title }
    },
    [
      _c(
        "label",
        {
          ref: "label",
          staticClass: "switch-label",
          attrs: { tabindex: _vm.tabindex || _vm.localTabindex, for: _vm.guid }
        },
        [
          _vm.title ? _c("h4", [_vm._v(_vm._s(_vm.title))]) : _vm._e(),
          _vm._v(" "),
          _c("div", { staticClass: "switch" }, [
            _c(
              "input",
              _vm._g(
                {
                  ref: "input",
                  attrs: { type: "checkbox", id: _vm.guid },
                  domProps: { checked: _vm.value }
                },
                _vm.events
              )
            ),
            _vm._v(" "),
            _c("span", { staticClass: "pin round" })
          ]),
          _vm._v(" "),
          _vm.label ? _c("p", [_vm._v(_vm._s(_vm.label))]) : _vm._e()
        ]
      )
    ]
  )
}
var ISwitchvue_type_template_id_3d47fc94_scoped_true_staticRenderFns = []
ISwitchvue_type_template_id_3d47fc94_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/ISwitch.vue?vue&type=template&id=3d47fc94&scoped=true&

// EXTERNAL MODULE: ./src/designcomponents/mixins/component.js
var mixins_component = __webpack_require__("pbPK");

// EXTERNAL MODULE: ./node_modules/bson-objectid/objectid.js
var objectid = __webpack_require__("Gppw");
var objectid_default = /*#__PURE__*/__webpack_require__.n(objectid);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/ISwitch.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var ISwitchvue_type_script_lang_js_ = ({
  name: 'ISwitch',
  mixins: [mixins_component["a" /* default */]],
  props: {
    tabindex: {
      type: String,
      default: '0'
    },
    label: String,
    title: String,
    value: Boolean
  },
  model: {
    prop: 'value',
    event: 'change'
  },
  methods: {
    onChange: function onChange(e) {
      this.$emit('change', this.$refs.input.checked);
    },
    onInput: function onInput() {
      this.$emit('input', this.$refs.input.checked);
    },
    onClick: function onClick(e) {
      if (this.$listeners.click) {
        this.$listeners.click(e);
      }

      this.$emit('change', !(this.value === true));
    }
  },
  computed: {
    guid: () => objectid_default()().str,
    events: function events() {
      var events = {};

      for (var key in this.$listeners) {
        events[key] = this.$listeners[key];
      }

      events.change = this.onChange;
      events.input = this.onInput;
      return events;
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/ISwitch.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_ISwitchvue_type_script_lang_js_ = (ISwitchvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/ISwitch.vue?vue&type=style&index=0&id=3d47fc94&lang=scss&scoped=true&
var ISwitchvue_type_style_index_0_id_3d47fc94_lang_scss_scoped_true_ = __webpack_require__("v/zc");

// CONCATENATED MODULE: ./src/designcomponents/components/ISwitch.vue






/* normalize component */

var ISwitch_component = Object(componentNormalizer["a" /* default */])(
  components_ISwitchvue_type_script_lang_js_,
  ISwitchvue_type_template_id_3d47fc94_scoped_true_render,
  ISwitchvue_type_template_id_3d47fc94_scoped_true_staticRenderFns,
  false,
  null,
  "3d47fc94",
  null
  
)

/* hot reload */
if (false) { var ISwitch_api; }
ISwitch_component.options.__file = "src/designcomponents/components/ISwitch.vue"
/* harmony default export */ var ISwitch = (ISwitch_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IText.vue?vue&type=template&id=7b1c5daf&scoped=true&
var ITextvue_type_template_id_7b1c5daf_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.useEditor
    ? _c(
        "div",
        { staticClass: "editor" },
        [
          _c("editor-menu-bubble", {
            attrs: { editor: _vm.editor, "keep-in-bounds": true },
            scopedSlots: _vm._u(
              [
                {
                  key: "default",
                  fn: function(ref) {
                    var commands = ref.commands
                    var isActive = ref.isActive
                    var menu = ref.menu
                    return [
                      _c(
                        "div",
                        {
                          staticClass: "menububble",
                          class: { "is-active": menu.isActive },
                          style:
                            "left: " +
                            menu.left +
                            "px; bottom: " +
                            menu.bottom +
                            "px;"
                        },
                        [
                          _c(
                            "button",
                            {
                              staticClass: "menububble__button",
                              class: { "is-active": isActive.bold() },
                              on: { click: commands.bold }
                            },
                            [_c("icon", { attrs: { name: "bold" } })],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass: "menububble__button",
                              class: { "is-active": isActive.italic() },
                              on: { click: commands.italic }
                            },
                            [_c("icon", { attrs: { name: "italic" } })],
                            1
                          )
                        ]
                      )
                    ]
                  }
                }
              ],
              null,
              false,
              3360694113
            )
          }),
          _vm._v(" "),
          _c("editor-content", {
            staticClass: "editor__content",
            attrs: { editor: _vm.editor }
          })
        ],
        1
      )
    : _c(
        "div",
        {
          ref: "inputWrapper",
          staticClass: "input-field i-text",
          class: _vm.classes
        },
        [
          _c(
            "div",
            [
              _vm.prependIcon
                ? _c("i-icon", {
                    staticClass: "icon-left",
                    attrs: { icon: _vm.prependIcon }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.isInput
                ? _c(
                    "input",
                    _vm._g(
                      {
                        ref: "input",
                        staticClass: "f-input",
                        attrs: {
                          id: _vm.id,
                          tabindex: _vm.localTabIndex,
                          maxlength: _vm.characterCounter,
                          required: _vm.required,
                          readonly: _vm.readonly,
                          disabled: _vm.disabled,
                          placeholder: _vm.placeholder,
                          step: _vm.type === "number" ? _vm.step : null,
                          min: _vm.type === "number" ? _vm.min : null,
                          max: _vm.type === "number" ? _vm.max : null,
                          type: _vm.type,
                          autocapitalize: _vm.autocapitalize,
                          autocomplete: _vm.autocompleteAttribute,
                          name: _vm.name
                        },
                        domProps: { value: _vm.value }
                      },
                      _vm.events
                    )
                  )
                : _vm.textarea
                ? _c(
                    "textarea",
                    _vm._g(
                      {
                        ref: "input",
                        staticClass: "f-input",
                        attrs: {
                          id: _vm.id,
                          tabindex: _vm.localTabIndex,
                          maxlength: _vm.characterCounter,
                          required: _vm.required,
                          readonly: _vm.readonly,
                          disabled: _vm.disabled,
                          placeholder: _vm.placeholder,
                          autocapitalize: _vm.autocapitalize,
                          autocomplete: _vm.autocompleteAttribute,
                          name: _vm.name
                        },
                        domProps: { value: _vm.value }
                      },
                      _vm.events
                    )
                  )
                : _vm.contenteditable
                ? _c(
                    _vm.tag || "p",
                    _vm._g(
                      {
                        ref: "input",
                        tag: "tag",
                        staticClass: "f-input",
                        attrs: {
                          id: _vm.id,
                          "data-placeholder":
                            !_vm.value || _vm.value.length === 0
                              ? _vm.placeholder
                              : null,
                          contenteditable: "",
                          tabindex: _vm.localTabIndex,
                          maxlength: _vm.characterCounter,
                          required: _vm.required,
                          readonly: _vm.readonly,
                          disabled: _vm.disabled,
                          autocapitalize: _vm.autocapitalize,
                          autocomplete: _vm.autocompleteAttribute,
                          name: _vm.name
                        }
                      },
                      _vm.events
                    )
                  )
                : _vm._e(),
              _vm._v(" "),
              !_vm.noValidationElement && _vm.errorMessage
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
                : _vm._e(),
              _vm._v(" "),
              _vm.characterCounter
                ? _c("span", { staticClass: "character-counter" }, [
                    _vm._v(
                      "\n\t\t\t" +
                        _vm._s(_vm.value.length) +
                        "/" +
                        _vm._s(_vm.characterCounter) +
                        "\n\t\t"
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.appendIcon
                ? _c("i-icon", {
                    staticClass: "icon-right",
                    attrs: { icon: _vm.appendIcon }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.isClearable
                ? _c(
                    "div",
                    { staticClass: "cross", on: { click: _vm.clearValue } },
                    [_c("i-icon", { attrs: { icon: "times" } })],
                    1
                  )
                : _vm._e()
            ],
            1
          )
        ]
      )
}
var ITextvue_type_template_id_7b1c5daf_scoped_true_staticRenderFns = []
ITextvue_type_template_id_7b1c5daf_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/IText.vue?vue&type=template&id=7b1c5daf&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.object.assign.js
var es_object_assign = __webpack_require__("zKZe");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.regexp.constructor.js
var es_regexp_constructor = __webpack_require__("TWNs");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.match.js
var es_string_match = __webpack_require__("Rm1S");

// EXTERNAL MODULE: ./src/designcomponents/components/ITextEditorIcon.vue + 4 modules
var ITextEditorIcon = __webpack_require__("qGYk");

// EXTERNAL MODULE: ./node_modules/tiptap/dist/tiptap.esm.js + 2 modules
var tiptap_esm = __webpack_require__("zUJn");

// EXTERNAL MODULE: ./node_modules/tiptap-extensions/dist/extensions.esm.js + 4 modules
var extensions_esm = __webpack_require__("8j27");

// EXTERNAL MODULE: ./src/helpers/bbcode.js
var bbcode = __webpack_require__("RuLz");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IText.vue?vue&type=script&lang=js&





//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






window.ITextCount = window.ITextCount || 0;
/* harmony default export */ var ITextvue_type_script_lang_js_ = ({
  name: 'IText',
  extends: validatable["a" /* default */],
  mixins: [mixins_component["a" /* default */]],
  props: {
    name: String,
    autocapitalize: String,
    autocomplete: String,
    numeric: Boolean,
    tag: String,
    naked: Boolean,
    maxCharacter: Number,
    disabled: Boolean,
    readonly: Boolean,
    hidden: Boolean,
    required: Boolean,
    textarea: Boolean,
    contenteditable: Boolean,
    appendIcon: String,
    prependIcon: String,
    placeholder: String,
    min: [Number, String],
    max: [Number, String],
    step: [Number, String],
    value: {
      type: [String, Number],
      default: ''
    },
    type: {
      type: String,
      default: 'text'
    },
    characterCounter: {
      type: [Boolean, Number],
      default: false
    },
    isClearable: Boolean,
    useEditor: Boolean,
    autoFocus: Boolean
  },
  components: {
    EditorContent: tiptap_esm["b" /* EditorContent */],
    EditorMenuBubble: tiptap_esm["d" /* EditorMenuBubble */],
    Icon: ITextEditorIcon["a" /* default */]
  },
  data: function data() {
    return {
      id: "i-text-".concat(++window.ITextCount),
      contentEditableCaretPosition: 0,
      isFocused: false,
      cache: null,
      keepIinputnBounds: true,
      editor: null,
      showTextColorPicker: false,
      editorOptions: null,
      BbCode: bbcode["a" /* default */]
    };
  },

  beforeDestroy() {
    if (this.editor) {
      this.editor.destroy();
    }
  },

  mounted: function () {
    var _mounted = asyncToGenerator_default()(function* () {
      if (this.useEditor) {
        this.editorOptions = {
          onUpdate: this.editorUpdate,
          extensions: [new extensions_esm["b" /* Bold */](), new extensions_esm["j" /* Italic */](), new extensions_esm["e" /* Focus */]({
            className: 'has-focus',
            nested: true
          })],
          autoFocus: false
        };
        this.editor = new tiptap_esm["a" /* Editor */](this.editorOptions);
        this.$nextTick(() => {
          if (typeof this.value !== 'undefined') {
            this.editor.setContent(this.value);
          }
        });
      }

      this.updateContentEditableContent();

      if (this.autoFocus && this.$refs.input) {
        this.$refs.input.focus();
      }
    });

    function mounted() {
      return _mounted.apply(this, arguments);
    }

    return mounted;
  }(),
  destroyed: function destroyed() {
    window.ITextCount--;
  },
  beforeUpdate: function beforeUpdate() {
    if (!this.isFocused || this.value.length === 0) {
      return;
    }

    if (this.contenteditable) {
      try {
        // get last cursor position
        var _range = document.getSelection().getRangeAt(0);

        var range = _range.cloneRange();

        range.selectNodeContents(this.input);
        range.setEnd(_range.endContainer, _range.endOffset);
        this.contentEditableCaretPosition = range.toString().length;
      } catch (e) {}
    }
  },
  // updated: function () {
  // 	if (!this.isFocused || this.value.length === 0) { return }
  // 	if ((this.contenteditable || this.textarea) && this.input) {
  // 		this.input.innerHTML = this.value;
  // 		if (!this.textarea) { // contenteditable only
  // 			this.$nextTick(() => {
  // 				try {
  // 					// set last cursor position
  // 					var range = document.createRange();
  // 					var sel = window.getSelection();
  // 					range.setStart(this.input.childNodes[0], this.contentEditableCaretPosition);
  // 					range.collapse(true);
  // 					sel.removeAllRanges();
  // 					sel.addRange(range);
  // 				} catch (e) { }
  // 			});
  // 		}
  // 	}
  // },
  methods: {
    editorUpdate: function editorUpdate(e) {
      var html = e.getHTML();

      if (e.getHTML() === '<p></p>') {
        html = '';
      }

      this.$emit('input', html);
    },
    onPasteEvent: function onPasteEvent(e) {
      e.preventDefault();
      var text = e.clipboardData.getData('text/plain');
      document.execCommand('insertText', false, text);
    },
    updateContentEditableContent: function updateContentEditableContent() {
      if (this.contenteditable && this.input && !this.isFocused) {
        this.$nextTick(() => {
          this.input.innerText = this.value;
        });
      }
    },
    focus: function focus() {
      this.input.focus();
    },
    focusOut: function focusOut() {
      this.input.focusOut();
    },
    onFocus: function onFocus(e) {
      if (this.$root.isMobile) {
        ['.touch-bar-nav', '.navbar-middle'].forEach(q => {
          var el = document.querySelector(q);

          if (el) {
            el.style.display = 'none';
          }
        });
      }

      this.isFocused = true;
      this.$emit('focus', e);
    },
    onFocusOut: function onFocusOut(e) {
      this.$emit('focusOut', e);
    },
    onBlur: function onBlur(e) {
      if (this.$root.isMobile) {
        ['.touch-bar-nav', '.navbar-middle'].forEach(q => {
          var el = document.querySelector(q);

          if (el) {
            el.style.display = null;
          }
        });
      }

      this.isFocused = false;
      this.$emit('blur', e);
    },
    updateValue: function updateValue(e) {
      this.$emit('input', e.target.value || e.target.textContent);
    },
    updateValueNumber: function updateValueNumber(e) {
      /* eslint-disable */
      var numberRegexp = new RegExp(/^-?(\d*)?(\.|\,)?(\d*)/);
      var v = e.target.value || e.target.textContent;
      var newVal = v.match(numberRegexp);

      if (newVal && newVal[0] !== v) {
        var isDeletedTooMuch = v.length - newVal[0].length > 1;

        if (this.contenteditable) {
          e.target.textContent = isDeletedTooMuch ? this.cache : newVal[0];
        } else {
          e.target.value = isDeletedTooMuch ? this.cache : newVal[0];
        }

        this.$refs.inputWrapper.classList.add('shake');
        setTimeout(() => {
          this.$refs.inputWrapper.classList.remove('shake');
        }, this.$theme.transitionMS);
      }

      this.updateValue(e);
    },
    clearValue: function clearValue() {
      this.$emit('input', null);
      this.$emit('change', null);
    }
  },
  computed: {
    autocompleteAttribute: function autocompleteAttribute() {
      if (this.autocomplete) {
        return this.autocomplete;
      }

      if (this.numeric || this.type === 'number') {
        return 'off';
      }

      return null;
    },

    isInput() {
      return !this.contenteditable && !this.textarea;
    },

    input() {
      return this.$refs.input;
    },

    inputValue: {
      get() {
        return this.input.value || this.input.textContent;
      },

      cache: false
    },

    events() {
      var events = Object.assign({}, this.$listeners);
      events.focus = this.onFocus;
      events.blur = this.onBlur;
      events.focusOut = this.onFocusOut;
      events.input = this.numeric ? this.updateValueNumber : this.updateValue;

      if (this.contenteditable) {
        events.paste = this.onPasteEvent;
      }

      return events;
    },

    classes: function classes() {
      return {
        'character-counter': this.characterCounter > 0,
        'textarea': this.textarea,
        'contenteditable': this.contenteditable,
        'prepend-icon': this.prependIcon,
        'append-icon': this.appendIcon,
        'invalid-input-wrapper': this.errorMessage,
        'success-input-wrapper': !this.errorMessage,
        'naked': this.naked
      };
    },
    inputClasses: function inputClasses() {
      return {
        'invalid': this.errorMessage,
        'success': !this.errorMessage
      };
    },
    htmlTag: function htmlTag() {
      if (this.contenteditable) {
        return 'p';
      }

      if (this.textarea) {
        return 'textarea';
      }

      return 'input';
    }
  },
  watch: {
    value: function value(to) {
      this.cache = to;
      this.updateContentEditableContent();
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/IText.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_ITextvue_type_script_lang_js_ = (ITextvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/IText.vue?vue&type=style&index=0&id=7b1c5daf&lang=scss&scoped=true&
var ITextvue_type_style_index_0_id_7b1c5daf_lang_scss_scoped_true_ = __webpack_require__("I6HT");

// CONCATENATED MODULE: ./src/designcomponents/components/IText.vue






/* normalize component */

var IText_component = Object(componentNormalizer["a" /* default */])(
  components_ITextvue_type_script_lang_js_,
  ITextvue_type_template_id_7b1c5daf_scoped_true_render,
  ITextvue_type_template_id_7b1c5daf_scoped_true_staticRenderFns,
  false,
  null,
  "7b1c5daf",
  null
  
)

/* hot reload */
if (false) { var IText_api; }
IText_component.options.__file = "src/designcomponents/components/IText.vue"
/* harmony default export */ var IText = (IText_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IForm.vue?vue&type=template&id=59aafc74&
var IFormvue_type_template_id_59aafc74_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    _vm._g(
      {
        ref: "form",
        staticClass: "i-form",
        on: {
          submit: function($event) {
            $event.preventDefault()
          }
        }
      },
      _vm.$listeners
    ),
    [_vm._t("default")],
    2
  )
}
var IFormvue_type_template_id_59aafc74_staticRenderFns = []
IFormvue_type_template_id_59aafc74_render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/IForm.vue?vue&type=template&id=59aafc74&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IForm.vue?vue&type=script&lang=js&


//
//
//
//
//
//
//
//
//
var r = el => {
  if (!el) {
    return;
  }

  if (el.classList && el.classList.contains && el.classList.contains('question')) {
    return el;
  }

  return r(el.parentNode);
};

var getInput = component => {
  var input = component.$refs.input;

  while (input && input.$refs) {
    input = input.$refs.input;
  }

  return input;
};

/* harmony default export */ var IFormvue_type_script_lang_js_ = ({
  name: 'IForm',
  props: {
    validateOnSubmit: Boolean,
    formModel: Object,
    scrollToQuestionId: Function,
    invalidQuestions: Array
  },
  data: function data() {
    return {
      validatables: {}
    };
  },
  mounted: function mounted() {
    if (this.invalidQuestions && this.invalidQuestions.length > 0) {
      this.invalidQuestions.splice(0, this.invalidQuestions.length);
    }

    if (this.validateOnSubmit) {
      for (var id in this.validatables) {
        this.validatables[id].validateOnSubmit = true;
      }
    }
  },
  methods: {
    validate: function validate() {
      var _this = this;

      var erroredInput = null;

      for (var id in this.validatables) {
        var validateComponent = {
          isValid: this.validatables[id].beforeOnSubmit(),
          component: this.validatables[id]
        };

        if (!validateComponent.isValid) {
          (function () {
            var component = r(validateComponent.component.$el);

            if (component) {
              var question = validateComponent.component.iForm.formModel.questions.find(x => x._id === component.id);

              if (question) {
                _this.invalidQuestions.push(question);

                if (!erroredInput || erroredInput.displayOrder > question.displayOrder) {
                  erroredInput = validateComponent;
                  erroredInput.displayOrder = question.displayOrder;
                }
              }
            } else {
              erroredInput = validateComponent;
            }
          })();
        }
      }

      if (erroredInput && !this.validateOnSubmit) {
        var el = r(erroredInput.component.$el);

        if (this.formModel && this.formModel.baseSettings && this.formModel.baseSettings.cardDesign) {
          // if step view
          if (el) {
            this.scrollToQuestionId(el.id);
            el.classList.add('shake');
            setTimeout(() => {
              el.classList.remove('shake');
            }, this.$theme.transitionMS);
          }
        } else {
          // if list view
          var top = (el || erroredInput.component.$el).getBoundingClientRect().top;
          this.$root.goTo(top + window.scrollY, () => {
            if (!this.$root.isMobile) {
              getInput(erroredInput.component).focus();
            }

            if (el) {
              el.classList.add('shake');
              setTimeout(() => {
                el.classList.remove('shake');
              }, this.$theme.transitionMS);
            }
          });
        }
      }

      return erroredInput === null;
    },
    reset: function reset() {
      this.$refs.form.reset();
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/IForm.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_IFormvue_type_script_lang_js_ = (IFormvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/designcomponents/components/IForm.vue





/* normalize component */

var IForm_component = Object(componentNormalizer["a" /* default */])(
  components_IFormvue_type_script_lang_js_,
  IFormvue_type_template_id_59aafc74_render,
  IFormvue_type_template_id_59aafc74_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var IForm_api; }
IForm_component.options.__file = "src/designcomponents/components/IForm.vue"
/* harmony default export */ var IForm = (IForm_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/ICheckbox.vue?vue&type=template&id=e6889776&scoped=true&
var ICheckboxvue_type_template_id_e6889776_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "label",
    {
      staticClass: "i-checkbox",
      class: {
        disabled: _vm.disabled,
        custom: _vm.isDefaultSlotFilled && !_vm.showControl,
        checked: _vm.isChecked
      }
    },
    [
      _c(
        "input",
        _vm._g(
          {
            ref: "input",
            attrs: {
              type: "checkbox",
              hidden: "",
              tabindex: "-1",
              disabled: _vm.disabled || _vm.readonly,
              readonly: _vm.readonly
            },
            domProps: { checked: _vm.isChecked, value: _vm.value }
          },
          _vm.events
        )
      ),
      _vm._v(" "),
      !_vm.isDefaultSlotFilled || _vm.showControl
        ? _c(
            "span",
            { attrs: { tabindex: _vm.tabindex || _vm.localTabIndex } },
            [
              _c("i", { staticClass: "before-checkbox" }),
              _vm._v(" "),
              _vm.label && !_vm.isHtmlLabel
                ? _c("p", { staticClass: "label-text" }, [
                    _vm._v(_vm._s(_vm.label))
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.label && _vm.isHtmlLabel
                ? _c("p", {
                    staticClass: "label-text",
                    domProps: { innerHTML: _vm._s(_vm.label) }
                  })
                : _vm._e()
            ]
          )
        : _vm._e(),
      _vm._v(" "),
      _vm._t("default", null, { isChecked: _vm.isChecked })
    ],
    2
  )
}
var ICheckboxvue_type_template_id_e6889776_scoped_true_staticRenderFns = []
ICheckboxvue_type_template_id_e6889776_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/ICheckbox.vue?vue&type=template&id=e6889776&scoped=true&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/ICheckbox.vue?vue&type=script&lang=js&



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var ICheckboxvue_type_script_lang_js_ = ({
  name: 'ICheckbox',
  mixins: [mixins_component["a" /* default */]],
  props: {
    checked: [Array, Boolean],
    value: [String, Number, Boolean],
    label: String,
    disabled: Boolean,
    readonly: Boolean,
    tabindex: String,
    showControl: Boolean,
    isHtmlLabel: Boolean
  },
  model: {
    prop: 'checked',
    event: 'change'
  },
  methods: {
    updateValue() {
      if (Array.isArray(this.checked)) {
        var index = this.checked.indexOf(this.value);

        if (index > -1) {
          this.checked.splice(index, 1);
        } else {
          this.checked.push(this.value);
        }
      } else {
        this.$emit('change', !this.checked);
      }
    }

  },
  computed: {
    events: function events() {
      if (this.readonly) {
        return;
      }

      var events = {};

      for (var key in this.$listeners) {
        events[key] = this.$listeners[key];
      }

      events.change = this.updateValue; // events.input = this.updateValue;

      return events;
    },
    isDefaultSlotFilled: function isDefaultSlotFilled() {
      return !!this.$scopedSlots.default;
    },
    isChecked: function isChecked() {
      if (Array.isArray(this.checked)) {
        return this.checked.includes(this.value);
      } else {
        return this.checked;
      }
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/ICheckbox.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_ICheckboxvue_type_script_lang_js_ = (ICheckboxvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/ICheckbox.vue?vue&type=style&index=0&id=e6889776&lang=scss&scoped=true&
var ICheckboxvue_type_style_index_0_id_e6889776_lang_scss_scoped_true_ = __webpack_require__("RUml");

// CONCATENATED MODULE: ./src/designcomponents/components/ICheckbox.vue






/* normalize component */

var ICheckbox_component = Object(componentNormalizer["a" /* default */])(
  components_ICheckboxvue_type_script_lang_js_,
  ICheckboxvue_type_template_id_e6889776_scoped_true_render,
  ICheckboxvue_type_template_id_e6889776_scoped_true_staticRenderFns,
  false,
  null,
  "e6889776",
  null
  
)

/* hot reload */
if (false) { var ICheckbox_api; }
ICheckbox_component.options.__file = "src/designcomponents/components/ICheckbox.vue"
/* harmony default export */ var ICheckbox = (ICheckbox_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IRadio.vue?vue&type=template&id=21d9cc2e&scoped=true&
var IRadiovue_type_template_id_21d9cc2e_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "label",
    {
      staticClass: "i-radio",
      class: {
        checked: _vm.isChecked,
        custom: _vm.isDefaultSlotFilled && !_vm.showControl
      }
    },
    [
      _c(
        "input",
        _vm._g(
          {
            ref: "input",
            attrs: {
              type: "radio",
              tabindex: "-1",
              hidden: "",
              disabled: _vm.disabled,
              readonly: _vm.readonly
            },
            domProps: { checked: _vm.isChecked, value: _vm.value }
          },
          _vm.events
        )
      ),
      _vm._v(" "),
      !_vm.isDefaultSlotFilled | _vm.showControl
        ? _c(
            "span",
            {
              staticClass: "radio-button",
              attrs: { tabindex: _vm.tabindex || _vm.localTabIndex }
            },
            [_c("i", { staticClass: "before-radio" })]
          )
        : _vm._e(),
      _vm._v(" "),
      _vm.label && !_vm.isDefaultSlotFilled && !_vm.isHtmlLabel
        ? _c("p", { staticClass: "label-item" }, [_vm._v(_vm._s(_vm.label))])
        : _vm._e(),
      _vm._v(" "),
      _vm.label && !_vm.isDefaultSlotFilled && _vm.isHtmlLabel
        ? _c("p", {
            staticClass: "label-item",
            domProps: { innerHTML: _vm._s(_vm.label) }
          })
        : _vm._e(),
      _vm._v(" "),
      _vm._t("default", null, { isChecked: _vm.isChecked })
    ],
    2
  )
}
var IRadiovue_type_template_id_21d9cc2e_scoped_true_staticRenderFns = []
IRadiovue_type_template_id_21d9cc2e_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/IRadio.vue?vue&type=template&id=21d9cc2e&scoped=true&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IRadio.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var IRadiovue_type_script_lang_js_ = ({
  name: 'IRadio',
  mixins: [mixins_component["a" /* default */]],
  props: {
    value: [Boolean, String, Number],
    label: String,
    checked: [String, Boolean, Array],
    tabindex: String,
    disabled: Boolean,
    readonly: Boolean,
    showControl: Boolean,
    uncheckable: Boolean,
    isHtmlLabel: Boolean
  },
  model: {
    prop: 'checked',
    event: 'change'
  },
  methods: {
    updateValue: function updateValue() {
      if (this.value === this.checked && this.uncheckable) {
        this.$emit('change', null);
      } else {
        this.$emit('change', this.$refs.input.value);
      }
    }
  },
  computed: {
    events: function events() {
      if (this.readonly) {
        return;
      }

      var events = {};

      for (var key in this.$listeners) {
        if (key !== 'click' && key !== 'change') {
          events[key] = this.$listeners[key];
        }
      }

      if (this.uncheckable) {
        events.click = this.updateValue;
      } else {
        events.change = this.updateValue;
      }

      return events;
    },
    isDefaultSlotFilled: function isDefaultSlotFilled() {
      return !!this.$scopedSlots.default;
    },
    isChecked: function isChecked() {
      if (typeof this.checked === 'string') {
        return this.value === this.checked;
      }

      if (Array.isArray(this.checked)) {
        return this.value === this.checked[0];
      }

      return this.checked;
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/IRadio.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_IRadiovue_type_script_lang_js_ = (IRadiovue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/IRadio.vue?vue&type=style&index=0&id=21d9cc2e&lang=scss&scoped=true&
var IRadiovue_type_style_index_0_id_21d9cc2e_lang_scss_scoped_true_ = __webpack_require__("QgSb");

// CONCATENATED MODULE: ./src/designcomponents/components/IRadio.vue






/* normalize component */

var IRadio_component = Object(componentNormalizer["a" /* default */])(
  components_IRadiovue_type_script_lang_js_,
  IRadiovue_type_template_id_21d9cc2e_scoped_true_render,
  IRadiovue_type_template_id_21d9cc2e_scoped_true_staticRenderFns,
  false,
  null,
  "21d9cc2e",
  null
  
)

/* hot reload */
if (false) { var IRadio_api; }
IRadio_component.options.__file = "src/designcomponents/components/IRadio.vue"
/* harmony default export */ var IRadio = (IRadio_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IButton.vue?vue&type=template&id=0b6e42b4&scoped=true&
var IButtonvue_type_template_id_0b6e42b4_scoped_true_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    _vm.tagName,
    _vm._g(
      {
        tag: "tag",
        staticClass: "i-button",
        class: _vm.classes,
        attrs: { tabindex: _vm.tabindex, href: _vm.href }
      },
      _vm.events
    ),
    [
      _vm.prependIcon
        ? _c("i-icon", {
            attrs: {
              brands: _vm.brands,
              solid: _vm.solid,
              color: _vm.iconColor,
              icon: _vm.prependIcon
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _vm.isDefaultSlotFilled
        ? _c("div", { staticClass: "text-wrapper" }, [_vm._t("default")], 2)
        : _vm._e(),
      _vm._v(" "),
      _vm.loading
        ? _c("i-preloader", { staticClass: "button-loading" })
        : _vm.appendIcon
        ? _c("i-icon", {
            attrs: {
              brands: _vm.brands,
              solid: _vm.solid,
              color: _vm.iconColor,
              icon: _vm.appendIcon
            }
          })
        : _vm._e()
    ],
    1
  )
}
var IButtonvue_type_template_id_0b6e42b4_scoped_true_staticRenderFns = []
IButtonvue_type_template_id_0b6e42b4_scoped_true_render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/IButton.vue?vue&type=template&id=0b6e42b4&scoped=true&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IButton.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ var IButtonvue_type_script_lang_js_ = ({
  name: 'IButton',
  props: {
    solid: Boolean,
    href: String,
    prependIcon: String,
    appendIcon: String,
    tabindex: {
      type: [String, Number],
      default: '0'
    },
    loading: Boolean,
    disabled: Boolean,
    naked: Boolean,
    focusable: Boolean,
    iconColor: String,
    brands: Boolean,
    rounded: Boolean,
    outline: Boolean
  },
  methods: {
    onClick: function onClick(e) {
      if (this.disabled || this.loading) {
        e.preventDefault();
        e.stopImmediatePropagation();
        e.stopPropagation();
        return false;
      }

      this.$emit('click', e);
    }
  },
  computed: {
    isDefaultSlotFilled() {
      return !!this.$slots.default;
    },

    classes: function classes() {
      return {
        'disabled': this.loading || this.disabled,
        'prepend-icon': this.prependIcon,
        'append-icon': this.appendIcon,
        'with-icon': this.prependIcon || this.appendIcon,
        'naked': this.naked,
        'i-focus': this.focusable,
        'rounded': this.rounded,
        'no-margin': !this.isDefaultSlotFilled,
        'outline': this.outline
      };
    },
    events: function events() {
      var events = Object.assign({}, this.$listeners);
      events.click = this.onClick;
      return events;
    },
    tagName: function tagName() {
      if (this.href) {
        return 'a';
      }

      return 'div';
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/IButton.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_IButtonvue_type_script_lang_js_ = (IButtonvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/IButton.vue?vue&type=style&index=0&id=0b6e42b4&lang=scss&scoped=true&
var IButtonvue_type_style_index_0_id_0b6e42b4_lang_scss_scoped_true_ = __webpack_require__("F6QW");

// CONCATENATED MODULE: ./src/designcomponents/components/IButton.vue






/* normalize component */

var IButton_component = Object(componentNormalizer["a" /* default */])(
  components_IButtonvue_type_script_lang_js_,
  IButtonvue_type_template_id_0b6e42b4_scoped_true_render,
  IButtonvue_type_template_id_0b6e42b4_scoped_true_staticRenderFns,
  false,
  null,
  "0b6e42b4",
  null
  
)

/* hot reload */
if (false) { var IButton_api; }
IButton_component.options.__file = "src/designcomponents/components/IButton.vue"
/* harmony default export */ var IButton = (IButton_component.exports);
// CONCATENATED MODULE: ./src/designcomponents/index.js









 // import IMaskedText from '@/designcomponents/components/IMaskedText';
// import IAvatar from '@/designcomponents/components/IAvatar';
// import IQuestionValidation from '@/designcomponents/components/IQuestionValidation';

vue_esm["default"].component('i-select', ISelect);
vue_esm["default"].component('i-switch', ISwitch);
vue_esm["default"].component('i-text', IText);
vue_esm["default"].component('i-form', IForm);
vue_esm["default"].component('i-checkbox', ICheckbox);
vue_esm["default"].component('i-radio', IRadio);
vue_esm["default"].component('i-button', IButton); // Vue.component('i-masked-text', IMaskedText);
// Vue.component('vue-avatar', IAvatar);
// Vue.component('i-question-validation', IQuestionValidation);

vue_esm["default"].component('i-popup', () => __webpack_require__.e(/* import() | dcomponents */ 83).then(__webpack_require__.bind(null, "mwz+")));
vue_esm["default"].component('i-dropdown', () => __webpack_require__.e(/* import() | dcomponents */ 83).then(__webpack_require__.bind(null, "dNr9")));
vue_esm["default"].component('vue-avatar', () => Promise.all(/* import() | iavatar */[__webpack_require__.e(21), __webpack_require__.e(145)]).then(__webpack_require__.bind(null, "t8Yh")));
vue_esm["default"].component('i-question-validation', () => __webpack_require__.e(/* import() | questionvalidation */ 154).then(__webpack_require__.bind(null, "N/tT")));
vue_esm["default"].component('i-fine-uploader', () => __webpack_require__.e(/* import() | fineuploaderwrappers */ 110).then(__webpack_require__.bind(null, "QB1m")));
vue_esm["default"].component('i-sidebar', () => __webpack_require__.e(/* import() | isidebar */ 150).then(__webpack_require__.bind(null, "cFcc")));
vue_esm["default"].component('i-stripe', () => __webpack_require__.e(/* import() | istripe */ 151).then(__webpack_require__.bind(null, "Hps5")));
vue_esm["default"].component('i-menu', () => __webpack_require__.e(/* import() | imenu */ 111).then(__webpack_require__.bind(null, "7Wo2")));
vue_esm["default"].component('i-icon', () => __webpack_require__.e(/* import() | iicon */ 121).then(__webpack_require__.bind(null, "QwbN")));
vue_esm["default"].component('i-alert', () => __webpack_require__.e(/* import() | ialert */ 143).then(__webpack_require__.bind(null, "WC7Z")));
vue_esm["default"].component('i-preloader', () => __webpack_require__.e(/* import() | dcomponents */ 83).then(__webpack_require__.bind(null, "iWJo"))); // Vue.component('i-tooltip', () => import(/* webpackChunkName: "dcomponents" */ '@/designcomponents/components/ITooltip'));
// Vue.component('i-tour', () => import(/* webpackChunkName: "dcomponents" */ '@/designcomponents/components/ITour'));
// Vue.component('i-time-picker', () => import(/* webpackChunkName: "dcomponents" */ '@/designcomponents/components/ITimePicker'));
// Vue.component('i-date-picker', () => import(/* webpackChunkName: "dcomponents" */ '@/designcomponents/components/IDatePicker'));
// Vue.component('i-tags', () => import(/* webpackChunkName: "dcomponents" */ '@/designcomponents/components/ITags'));
// Vue.component('i-svg', () => import(/* webpackChunkName: "dcomponents" */ '@/designcomponents/components/ISvg'));
// Vue.component('i-color-picker', () => import(/* webpackChunkName: "colorpicker" */ '@/designcomponents/components/IColorPicker'));
// Vue.component('i-rating', () => import(/* webpackChunkName: "dcomponents" */ '@/designcomponents/components/IRating'));
// Vue.component('i-answer-popup', () => import(/* webpackChunkName: "dcomponents" */ '@/designcomponents/components/IAnswerPopup'));
// CONCATENATED MODULE: ./src/main.js

















 // app.js chunk içerisine alsın diye





 // BOF IMPORT CUSTOM DESIGN COMPONENTS

 // EOF IMPORT CUSTOM DESIGN COMPONENTS

var isIE = false;
isIE = navigator.userAgent.indexOf('MSIE ') > -1 || navigator.userAgent.indexOf('Trident/') > -1;
webfontloader_default.a.load({
  google: {
    families: ['Open Sans:ital,wght@0,300;0,400;0,600;0,700;1,400&;devanagari,latin-ext']
  }
});
var baseUrl = jsHelpers["default"].getBaseUrl();
var exipreDate = new Date();
exipreDate.setFullYear(exipreDate.getFullYear() + 1); // add one year to expire from today

var isMobile = window.innerWidth < 768;
var isTablet = window.innerWidth < 991 && !isMobile;
__webpack_require__.e(/* import() | asyncstyles */ 80).then(__webpack_require__.t.bind(null, "l7/k", 7));
__webpack_require__.e(/* import() | swal */ 118).then(__webpack_require__.bind(null, "iyI2")).then(function (VueSweetalert2) {
  vue_esm["default"].use(VueSweetalert2.default, {
    confirmButtonColor: '#ef5350',
    // red
    cancelButtonColor: '#11c4e0',
    // blue
    customClass: 'do-not-lose-focus',
    showClass: {
      popup: 'animated fadeInUp'
    },
    hideClass: {
      popup: 'animated fadeOutDown'
    }
  });
});
var stripeAuthenticateBaseConfig = {
  authorizationEndpoint: 'https://connect.stripe.com/oauth/authorize',
  requiredUrlParams: ['scope'],
  scope: ['read_write'],
  display: 'popup',
  oauthType: '2.0',
  popupOptions: {
    width: 850,
    height: 633
  }
};
vue_esm["default"].use(plugins_Theme).use(plugins_SmoothScroll).use(vue_axios_min_default.a, axios_default.a).use(vue_authenticate_es2015["a" /* default */], {
  baseUrl: prod["a" /* default */].apiGateway,
  providers: {
    facebook: {
      clientId: prod["a" /* default */].externalAuth.facebook.clientId,
      url: prod["a" /* default */].externalAuth.facebook.apiGatewayCallbackUrl,
      redirectUri: baseUrl + prod["a" /* default */].externalAuth.facebook.webCallbackUrl
    },
    google: {
      clientId: prod["a" /* default */].externalAuth.google.clientId,
      url: prod["a" /* default */].externalAuth.google.apiGatewayCallbackUrl,
      redirectUri: baseUrl + prod["a" /* default */].externalAuth.google.webCallbackUrl
    },
    apple: {
      clientId: prod["a" /* default */].externalAuth.apple.clientId,
      url: prod["a" /* default */].externalAuth.apple.apiGatewayCallbackUrl,
      redirectUri: baseUrl + prod["a" /* default */].externalAuth.apple.webCallbackUrl,
      name: 'apple',
      display: 'popup',
      popupOptions: {
        width: 650,
        height: 645
      },
      authorizationEndpoint: 'https://appleid.apple.com/auth/authorize',
      oauthType: '2.0',
      defaultUrlParams: ['client_id', 'redirect_uri'],
      optionalUrlParams: ['response_type', 'state'],
      responseType: 'code',
      state: 'state'
    },
    stackoverflow: {
      clientId: prod["a" /* default */].externalAuth.stackoverflow.clientId,
      url: prod["a" /* default */].externalAuth.stackoverflow.apiGatewayCallbackUrl,
      redirectUri: baseUrl + prod["a" /* default */].externalAuth.stackoverflow.webCallbackUrl,
      name: 'stackoverflow',
      display: 'popup',
      popupOptions: {
        width: 650,
        height: 650
      },
      authorizationEndpoint: 'https://stackoverflow.com/oauth',
      oauthType: '2.0',
      scope: ['private_info'],
      defaultUrlParams: ['client_id', 'redirect_uri'],
      optionalUrlParams: ['response_type', 'state'],
      responseType: 'code',
      state: 'state'
    },
    // BOF FORM PAYMENT
    formpaymentstripelive: {
      clientId: prod["a" /* default */].formPaymentGatewayOAuth.stripe.live.clientId,
      redirectUri: baseUrl + prod["a" /* default */].formPaymentGatewayOAuth.stripe.live.webCallbackUrl,
      name: prod["a" /* default */].formPaymentGatewayOAuth.stripe.live.name,
      authorizationEndpoint: stripeAuthenticateBaseConfig.authorizationEndpoint,
      requiredUrlParams: stripeAuthenticateBaseConfig.requiredUrlParams,
      scope: stripeAuthenticateBaseConfig.scope,
      display: stripeAuthenticateBaseConfig.display,
      oauthType: stripeAuthenticateBaseConfig.oauthType,
      popupOptions: stripeAuthenticateBaseConfig.popupOptions
    },
    formpaymentstripesandbox: {
      clientId: prod["a" /* default */].formPaymentGatewayOAuth.stripe.sandbox.clientId,
      redirectUri: baseUrl + prod["a" /* default */].formPaymentGatewayOAuth.stripe.sandbox.webCallbackUrl,
      name: prod["a" /* default */].formPaymentGatewayOAuth.stripe.sandbox.name,
      authorizationEndpoint: stripeAuthenticateBaseConfig.authorizationEndpoint,
      requiredUrlParams: stripeAuthenticateBaseConfig.requiredUrlParams,
      scope: stripeAuthenticateBaseConfig.scope,
      display: stripeAuthenticateBaseConfig.display,
      oauthType: stripeAuthenticateBaseConfig.oauthType,
      popupOptions: stripeAuthenticateBaseConfig.popupOptions
    } // EOF FORM PAYMENT

  },
  tokenName: 'authToken',
  storageType: 'localStorage',
  cookieStorage: {
    expires: exipreDate
  },
  tokenPrefix: '',
  storageNamespace: ''
}).use(vue_gtm_min_default.a, {
  debug: prod["a" /* default */].env === 'dev',
  // Whether or not display console logs debugs (optional)
  vueRouter: routes,
  // Pass the router instance to automatically sync with router (optional)
  trackOnNextTick: true
}).use(vue_lazyload_esm["a" /* default */], {
  preLoad: 1.3,
  error: '/static/img/no-image.png',
  loading: '/static/img/img-loader.svg',
  attempt: 1,
  adapter: {
    error(listender) {
      if (window.onErrorImageLoad) {
        window.onErrorImageLoad(listender);
      }
    }

  }
});
vue_esm["default"].config.productionTip = prod["a" /* default */].env === 'prod';

if (prod["a" /* default */].env !== 'dev') {
  vue_esm["default"].config.errorHandler = (err, vm) => {
    console.error(err);
    var errObj = err || vm;

    if (errObj) {
      // BOF Google Tag Manager
      jsHelpers["default"].fireGenericAnalyticEvent({
        'category': 'Client-Side JS Error',
        'action': (err && err.message || 'vmError') + ' ' + location.href,
        'label': JSON.stringify(errObj, ['name', 'message', 'stack'], 2).substring(0, 500)
      }); // EOF Google Tag Manager
      // BOF Slack Notification

      var protocol = location.protocol;
      var host = location.hostname;
      axios_default.a.post("".concat(protocol, "//api.").concat(host, "/notify/clienterror/jserror"), {
        url: location.href,
        errMessage: JSON.stringify(errObj, ['name', 'message', 'stack'], 2)
      }); // EOF Slack Notification
    }
  };
} // if ('serviceWorker' in navigator) {
// 	window.addEventListener('load', () => {
// 		navigator.serviceWorker.register('/sw.js').then(registration => {
// 			if (Config.env !== 'prod') {
// 				// console.log('SW registered: ', registration);
// 			}
// 		}).catch(registrationError => {
// 			if (Config.env !== 'prod') {
// 				// console.log('SW registration failed: ', registrationError);
// 			}
// 		});
// 	});
// }


window.openSidebarCount = 0;
window.conversionCodeCount = 0;
window.conversionCodes = {};
window.offlineStripeIndex = null;

if (isIE) {
  document.body.style.display = 'block';
  document.body.innerHTML = prod["a" /* default */].explorerText;
} else {
  /* eslint-disable */
  new vue_esm["default"]({
    el: '#app',
    router: routes,
    i18n: lang["default"],
    template: '<App/>',
    components: {
      App: App
    },
    data: function data() {
      return {
        layout: null,
        isMobile: isMobile,
        isTablet: isTablet,
        isMobileKeyboardOpen: false,
        save: {
          isSaving: false,
          timeout: null,
          isAuto: true,
          isDirty: false,
          hasError: false,
          autoSaveTimeoutMS: 1000
        },
        toShortDateTime: null,
        setUser: null,
        pushNotification: null,
        user: {
          info: {}
        },
        formbuilderComponent: null,
        setForm: () => {},
        stripes: [],
        tooltip: {
          text: null,
          isOpen: false,
          defaultElement: null,
          buffer: {}
        },
        tutorial: {
          advanced: false,
          basic: false,
          name: null,
          onBasicClick: () => {},
          onAdvancedClick: () => {},
          tour: null
        },
        loadLanguageAsync: lang["loadLanguageAsync"],
        isOnline: true,
        pageNotFoundMessage: null,
        resizeTimeout: null,
        openPopupCount: 0
      };
    },
    beforeCreate: function beforeCreate() {
      if (isMobile) {
        window.initialHeight = window.innerHeight;
        window.addEventListener('resize', event => {
          if (window.orientation === 0 || window.orientation === 180 || window.orientation === undefined) {
            this.isMobileKeyboardOpen = window.initialHeight - window.innerHeight > 150;
          }
        });
      }
    },
    mounted: function mounted() {
      try {
        this.isOnline = window.navigator.onLine;
      } catch (error) {}

      window.addEventListener('online', () => {
        this.stripes = this.stripes.filter(x => x.id !== 'online');
        this.isOnline = true;
      });
      window.addEventListener('resize', () => {
        clearTimeout(this.resizeTimeout);
        this.resizeTimeout = setTimeout(() => {
          this.isMobile = window.innerWidth < 768;
          this.isTablet = window.innerWidth < 991 && !this.isMobile;
        }, 1000);
      });
      window.addEventListener('offline', () => {
        this.stripes.push({
          text: "You are offline",
          bgColor: this.$theme.red,
          id: 'online'
        });
        this.isOnline = false;
      });
      document.body.classList.add('app-loaded');
      setTimeout(() => {
        document.querySelector('#preloader-spinner').remove();
      }, 600);
    },
    methods: {
      removeBrandingPackageAlert: function removeBrandingPackageAlert() {
        this.$swal({
          title: this.$t('popups.removeBrandingPopup.title'),
          text: this.$t('popups.removeBrandingPopup.text'),
          icon: 'error',
          confirmButtonText: this.$t('upgrade')
        }).then(v => {
          if (v.value === true) {
            this.$router.push({
              name: 'Packages'
            });
          }
        });
      },
      logout: function logout(redirect) {
        jsHelpers["default"].rnPostMessage('logout');
        localStorageHelper["a" /* default */].removeItem('oneSignalRegister');
        this.$auth.logout();
        jsHelpers["default"].setDeviceForOneSignal();
        this.$root.setUser(() => {
          this.$set(this.$root, 'stripes', []);
          var navigationModel = {
            name: 'SignIn'
          };

          if (redirect) {
            navigationModel.query = {
              redirect
            };
          }

          this.$router.push(navigationModel);
        }, true);
      }
    },
    computed: {
      onSubPage: function onSubPage() {
        if (this.$route.path.includes('records')) {
          return 'FormRecord';
        } else if (this.$route.path.includes('trash')) {
          return 'FormRecordTrash';
        } else if (this.$route.path.includes('design')) {
          return 'FormDesign';
        } else if (this.$route.path.includes('settings')) {
          return 'FormSettings';
        } else if (this.$route.path.includes('record')) {
          return 'FormRecord';
        } else if (this.$route.path.includes('resultshare')) {
          return 'FormResultShare';
        } else {
          return null;
        }
      },
      onPage: function onPage() {
        if (this.$route.path.includes('create')) {
          return 'FormCreate';
        } else if (this.$route.path.includes('result') || this.onSubPage === 'FormRecord' || this.onSubPage === 'FormRecordTrash') {
          return 'FormResult';
        } else {
          return null;
        }
      }
    } // watch: {
    // 	stripes: function (to) {
    // 		if (to.length > 0) {
    // 			let stripe = to[to.length - 1]; // son eklenen stripe
    // 			if (stripe && stripe.id) {
    // 				let stripeDate = localStorageHelper.getItem(stripe.id);
    // 				if (stripeDate) {
    // 					this.stripes.splice(to.length - 1, 1);
    // 				} else {
    // 					localStorageHelper.setItem(stripe.id, new Date().toString());
    // 				}
    // 			}
    // 		}
    // 	}
    // }

  });
}

/***/ }),

/***/ "VwwM":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var config__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("NRfZ");
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("P0qE");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("oCYn");
/* harmony import */ var _helpers_localStorageHelper__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("kdFr");





/* harmony default export */ __webpack_exports__["a"] = ({
  addFormViewCount(formId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('quota/' + formId + '/addFormViewCount');
    })();
  },

  addUnreadCount() {
    _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/addunreadcount');
  },

  getUnreadsAnswerCountReportViewQuotaUsages(callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return createApiGetResult('/quotausages/unreadanswersviewreport', callback);
    })();
  },

  getUnreadsAnswerCountReportViewQuotaUsagesByFormId(formId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return createApiGetResult('/quotausages/unreadanswersviewreport/' + formId, callback);
    })();
  },

  getQuotaUsages(callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return yield createApiGetResult('quotausages', callback);
    })();
  },

  getQuotaUsagesHistory(year) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return yield createApiGetResult('quotausageshistory?year=' + year);
    })();
  },

  getQuotas() {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return yield createApiGetResult('quotas');
    })();
  },

  getResourceTypeQuota(type, cb) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return yield createApiGetResult('quotas/' + type, cb);
    })();
  },

  getFormQuotaUsages(formId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var url = 'quota/' + formId + '/getFormQuotaUsages';
      _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get(url, null, function (apiResult) {
        callback(apiResult.data);
      });
    })();
  },

  checkFormCreateQuota() {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
        var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('quota/formCount/check');
        return apiResult.status === 204;
      } else {
        var forms = JSON.parse(_helpers_localStorageHelper__WEBPACK_IMPORTED_MODULE_4__[/* default */ "a"].getItem('forms'));
        return !forms || forms && forms.length < config__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].localStorageFormQuota;
      }
    })();
  }

});

function createApiGetResult(_x, _x2) {
  return _createApiGetResult.apply(this, arguments);
}

function _createApiGetResult() {
  _createApiGetResult = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* (url, callback) {
    if (vue__WEBPACK_IMPORTED_MODULE_3__["default"].prototype.$auth.isAuthenticated()) {
      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get(url, null, callback);
      } else {
        var result;
        var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get(url);

        if (apiResult.status === 200) {
          result = apiResult.data;
        }

        return result;
      }
    }
  });
  return _createApiGetResult.apply(this, arguments);
}

/***/ }),

/***/ "WJJf":
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./": [
		"mSNy"
	],
	"./countries/de": [
		"s0AU"
	],
	"./countries/de.js": [
		"s0AU"
	],
	"./countries/en": [
		"8/nC"
	],
	"./countries/en.js": [
		"8/nC"
	],
	"./countries/es": [
		"Qqpc"
	],
	"./countries/es.js": [
		"Qqpc"
	],
	"./countries/fr": [
		"SSqv"
	],
	"./countries/fr.js": [
		"SSqv"
	],
	"./countries/hi": [
		"l8Q2"
	],
	"./countries/hi.js": [
		"l8Q2"
	],
	"./countries/id": [
		"N7iS"
	],
	"./countries/id.js": [
		"N7iS"
	],
	"./countries/pt": [
		"P4uP"
	],
	"./countries/pt.js": [
		"P4uP"
	],
	"./countries/ru": [
		"q4hb"
	],
	"./countries/ru.js": [
		"q4hb"
	],
	"./countries/tr": [
		"WqO3"
	],
	"./countries/tr.js": [
		"WqO3"
	],
	"./countries/zh": [
		"ZB89"
	],
	"./countries/zh.js": [
		"ZB89"
	],
	"./de": [
		"eZ64",
		35
	],
	"./de.js": [
		"eZ64",
		35
	],
	"./en": [
		"P6u4",
		36
	],
	"./en.js": [
		"P6u4",
		36
	],
	"./es": [
		"NMFo",
		37
	],
	"./es.js": [
		"NMFo",
		37
	],
	"./fr": [
		"bYDR",
		38
	],
	"./fr.js": [
		"bYDR",
		38
	],
	"./hi": [
		"4+QQ",
		39
	],
	"./hi.js": [
		"4+QQ",
		39
	],
	"./id": [
		"/NPa",
		40
	],
	"./id.js": [
		"/NPa",
		40
	],
	"./index": [
		"mSNy"
	],
	"./index.js": [
		"mSNy"
	],
	"./pt": [
		"U/0O",
		41
	],
	"./pt.js": [
		"U/0O",
		41
	],
	"./ru": [
		"zfL3",
		42
	],
	"./ru.js": [
		"zfL3",
		42
	],
	"./tr": [
		"rCKv",
		43
	],
	"./tr.js": [
		"rCKv",
		43
	],
	"./zh": [
		"nfZ2",
		44
	],
	"./zh.js": [
		"nfZ2",
		44
	]
};
function webpackAsyncContext(req) {
	if(!__webpack_require__.o(map, req)) {
		return Promise.resolve().then(function() {
			var e = new Error("Cannot find module '" + req + "'");
			e.code = 'MODULE_NOT_FOUND';
			throw e;
		});
	}

	var ids = map[req], id = ids[0];
	return Promise.all(ids.slice(1).map(__webpack_require__.e)).then(function() {
		return __webpack_require__(id);
	});
}
webpackAsyncContext.keys = function webpackAsyncContextKeys() {
	return Object.keys(map);
};
webpackAsyncContext.id = "WJJf";
module.exports = webpackAsyncContext;

/***/ }),

/***/ "WQdS":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("mSNy");

var countries = [{
  text: '',
  code: ''
}, {
  code: 'AF'
}, {
  code: 'AX'
}, {
  code: 'AL'
}, {
  code: 'DZ'
}, {
  code: 'AS'
}, {
  code: 'AD'
}, {
  code: 'AO'
}, {
  code: 'AI'
}, {
  code: 'AQ'
}, {
  code: 'AG'
}, {
  code: 'AR'
}, {
  code: 'AM'
}, {
  code: 'AW'
}, {
  code: 'AU'
}, {
  code: 'AT'
}, {
  code: 'AZ'
}, {
  code: 'BS'
}, {
  code: 'BH'
}, {
  code: 'BD'
}, {
  code: 'BB'
}, {
  code: 'BY'
}, {
  code: 'BE'
}, {
  code: 'BZ'
}, {
  code: 'BJ'
}, {
  code: 'BM'
}, {
  code: 'BT'
}, {
  code: 'BO'
}, {
  code: 'BA'
}, {
  code: 'BW'
}, {
  code: 'BR'
}, {
  code: 'IO'
}, {
  code: 'BN'
}, {
  code: 'BG'
}, {
  code: 'BF'
}, {
  code: 'BI'
}, {
  code: 'KH'
}, {
  code: 'CM'
}, {
  code: 'CA'
}, {
  code: 'CV'
}, {
  code: 'KY'
}, {
  code: 'CF'
}, {
  code: 'TD'
}, {
  code: 'CL'
}, {
  code: 'CN'
}, {
  code: 'CX'
}, {
  code: 'CC'
}, {
  code: 'CO'
}, {
  code: 'KM'
}, {
  code: 'CG'
}, {
  code: 'CD'
}, {
  code: 'CK'
}, {
  code: 'CR'
}, {
  code: 'CI'
}, {
  code: 'HR'
}, {
  code: 'CU'
}, {
  code: 'CY'
}, {
  code: 'CZ'
}, {
  code: 'DK'
}, {
  code: 'DJ'
}, {
  code: 'DM'
}, {
  code: 'DO'
}, {
  code: 'EC'
}, {
  code: 'EG'
}, {
  code: 'SV'
}, {
  code: 'GQ'
}, {
  code: 'ER'
}, {
  code: 'EE'
}, {
  code: 'ET'
}, {
  code: 'FK'
}, {
  code: 'FO'
}, {
  code: 'FJ'
}, {
  code: 'FI'
}, {
  code: 'FR'
}, {
  code: 'GF'
}, {
  code: 'PF'
}, {
  code: 'TF'
}, {
  code: 'GA'
}, {
  code: 'GM'
}, {
  code: 'GE'
}, {
  code: 'DE'
}, {
  code: 'GH'
}, {
  code: 'GI'
}, {
  code: 'GR'
}, {
  code: 'GL'
}, {
  code: 'GD'
}, {
  code: 'GP'
}, {
  code: 'GU'
}, {
  code: 'GT'
}, {
  code: 'GG'
}, {
  code: 'GN'
}, {
  code: 'GW'
}, {
  code: 'GY'
}, {
  code: 'HT'
}, {
  code: 'VA'
}, {
  code: 'HN'
}, {
  code: 'HK'
}, {
  code: 'HU'
}, {
  code: 'IS'
}, {
  code: 'IN'
}, {
  code: 'ID'
}, {
  code: 'IR'
}, {
  code: 'IQ'
}, {
  code: 'IE'
}, {
  code: 'IM'
}, {
  code: 'IL'
}, {
  code: 'IT'
}, {
  code: 'JM'
}, {
  code: 'JP'
}, {
  code: 'JE'
}, {
  code: 'JO'
}, {
  code: 'KZ'
}, {
  code: 'KE'
}, {
  code: 'KI'
}, {
  code: 'KP'
}, {
  code: 'KR'
}, {
  code: 'XK'
}, {
  code: 'KW'
}, {
  code: 'KG'
}, {
  code: 'LA'
}, {
  code: 'LV'
}, {
  code: 'LB'
}, {
  code: 'LS'
}, {
  code: 'LR'
}, {
  code: 'LY'
}, {
  code: 'LI'
}, {
  code: 'LT'
}, {
  code: 'LU'
}, {
  code: 'MO'
}, {
  code: 'MK'
}, {
  code: 'MG'
}, {
  code: 'MW'
}, {
  code: 'MY'
}, {
  code: 'MV'
}, {
  code: 'ML'
}, {
  code: 'MT'
}, {
  code: 'MH'
}, {
  code: 'MQ'
}, {
  code: 'MR'
}, {
  code: 'MU'
}, {
  code: 'YT'
}, {
  code: 'MX'
}, {
  code: 'FM'
}, {
  code: 'MD'
}, {
  code: 'MC'
}, {
  code: 'MN'
}, {
  code: 'ME'
}, {
  code: 'MS'
}, {
  code: 'MA'
}, {
  code: 'MZ'
}, {
  code: 'MM'
}, {
  code: 'NA'
}, {
  code: 'NR'
}, {
  code: 'NP'
}, {
  code: 'NL'
}, {
  code: 'NC'
}, {
  code: 'NZ'
}, {
  code: 'NI'
}, {
  code: 'NE'
}, {
  code: 'NG'
}, {
  code: 'NU'
}, {
  code: 'NF'
}, {
  code: 'MP'
}, {
  code: 'NO'
}, {
  code: 'OM'
}, {
  code: 'PK'
}, {
  code: 'PW'
}, {
  code: 'PS'
}, {
  code: 'PA'
}, {
  code: 'PG'
}, {
  code: 'PY'
}, {
  code: 'PE'
}, {
  code: 'PH'
}, {
  code: 'PN'
}, {
  code: 'PL'
}, {
  code: 'PT'
}, {
  code: 'PR'
}, {
  code: 'QA'
}, {
  code: 'RE'
}, {
  code: 'RO'
}, {
  code: 'RU'
}, {
  code: 'RW'
}, {
  code: 'SH'
}, {
  code: 'KN'
}, {
  code: 'LC'
}, {
  code: 'PM'
}, {
  code: 'VC'
}, {
  code: 'WS'
}, {
  code: 'SM'
}, {
  code: 'ST'
}, {
  code: 'SA'
}, {
  code: 'SN'
}, {
  code: 'RS'
}, {
  code: 'SC'
}, {
  code: 'SL'
}, {
  code: 'SG'
}, {
  code: 'SK'
}, {
  code: 'SI'
}, {
  code: 'SB'
}, {
  code: 'SO'
}, {
  code: 'ZA'
}, {
  code: 'GS'
}, {
  code: 'ES'
}, {
  code: 'LK'
}, {
  code: 'SD'
}, {
  code: 'SR'
}, {
  code: 'SJ'
}, {
  code: 'SZ'
}, {
  code: 'SE'
}, {
  code: 'CH'
}, {
  code: 'SY'
}, {
  code: 'TW'
}, {
  code: 'TJ'
}, {
  code: 'TZ'
}, {
  code: 'TH'
}, {
  code: 'TL'
}, {
  code: 'TG'
}, {
  code: 'TK'
}, {
  code: 'TO'
}, {
  code: 'TT'
}, {
  code: 'TN'
}, {
  code: 'TR'
}, {
  code: 'TM'
}, {
  code: 'TC'
}, {
  code: 'TV'
}, {
  code: 'UG'
}, {
  code: 'UA'
}, {
  code: 'AE'
}, {
  code: 'GB'
}, {
  code: 'US'
}, {
  code: 'UM'
}, {
  code: 'UY'
}, {
  code: 'UZ'
}, {
  code: 'VU'
}, {
  code: 'VE'
}, {
  code: 'VN'
}, {
  code: 'VG'
}, {
  code: 'VI'
}, {
  code: 'WF'
}, {
  code: 'EH'
}, {
  code: 'YE'
}, {
  code: 'ZM'
}, {
  code: 'ZW'
}];

var countryEnums = () => {
  var countryLangs = __webpack_require__("dcGo")("./" + _lang__WEBPACK_IMPORTED_MODULE_0__["default"].locale).default;

  for (var i = 1; i < countries.length; i++) {
    var country = countries[i];
    country.text = countryLangs[country.code];
  }

  return countries;
};

/* harmony default export */ __webpack_exports__["a"] = (countryEnums);

/***/ }),

/***/ "WqO3":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  'UM': 'ABD K\u00fc\u00e7\u00fck Harici Adalar\u0131',
  'VI': 'ABD Virjin Adalar\u0131',
  'AF': 'Afganistan',
  'AX': '\u00c5land Adalar\u0131',
  'DE': 'Almanya',
  'US': 'Amerika Birle\u015fik Devletleri',
  'AS': 'Amerikan Samoas\u0131',
  'AD': 'Andorra',
  'AO': 'Angola',
  'AI': 'Anguilla',
  'AQ': 'Antarktika',
  'AG': 'Antigua ve Barbuda',
  'AR': 'Arjantin',
  'AL': 'Arnavutluk',
  'AW': 'Aruba',
  'AC': 'Ascension Adas\u0131',
  'AU': 'Avustralya',
  'AT': 'Avusturya',
  'AZ': 'Azerbaycan',
  'BS': 'Bahamalar',
  'BH': 'Bahreyn',
  'BD': 'Banglade\u015f',
  'BB': 'Barbados',
  'EH': 'Bat\u0131 Sahra',
  'BY': 'Belarus',
  'BE': 'Bel\u00e7ika',
  'BZ': 'Belize',
  'BJ': 'Benin',
  'BM': 'Bermuda',
  'AE': 'Birle\u015fik Arap Emirlikleri',
  'GB': 'Birle\u015fik Krall\u0131k',
  'BO': 'Bolivya',
  'BA': 'Bosna-Hersek',
  'BW': 'Botsvana',
  'BR': 'Brezilya',
  'IO': 'Britanya Hint Okyanusu Topraklar\u0131',
  'VG': 'Britanya Virjin Adalar\u0131',
  'BN': 'Brunei',
  'BG': 'Bulgaristan',
  'BF': 'Burkina Faso',
  'BI': 'Burundi',
  'BT': 'Butan',
  'CV': 'Cape Verde',
  'KY': 'Cayman Adalar\u0131',
  'GI': 'Cebelitar\u0131k',
  'EA': 'Ceuta ve Melilla',
  'DZ': 'Cezayir',
  'CX': 'Christmas Adas\u0131',
  'DJ': 'Cibuti',
  'CC': 'Cocos (Keeling) Adalar\u0131',
  'CK': 'Cook Adalar\u0131',
  'CW': 'Cura\u00e7ao',
  'TD': '\u00c7ad',
  'CZ': '\u00c7ekya',
  'CN': '\u00c7in',
  'HK': '\u00c7in Hong Kong \u00d6\u0130B',
  'MO': '\u00c7in Makao \u00d6\u0130B',
  'DK': 'Danimarka',
  'DG': 'Diego Garcia',
  'DO': 'Dominik Cumhuriyeti',
  'DM': 'Dominika',
  'EC': 'Ekvador',
  'GQ': 'Ekvator Ginesi',
  'SV': 'El Salvador',
  'ID': 'Endonezya',
  'ER': 'Eritre',
  'AM': 'Ermenistan',
  'EE': 'Estonya',
  'SZ': 'Esvatini',
  'ET': 'Etiyopya',
  'FK': 'Falkland Adalar\u0131',
  'FO': 'Faroe Adalar\u0131',
  'MA': 'Fas',
  'FJ': 'Fiji',
  'CI': 'Fildi\u015fi Sahili',
  'PH': 'Filipinler',
  'PS': 'Filistin B\u00f6lgeleri',
  'FI': 'Finlandiya',
  'FR': 'Fransa',
  'GF': 'Frans\u0131z Guyanas\u0131',
  'TF': 'Frans\u0131z G\u00fcney Topraklar\u0131',
  'PF': 'Frans\u0131z Polinezyas\u0131',
  'GA': 'Gabon',
  'GM': 'Gambiya',
  'GH': 'Gana',
  'GN': 'Gine',
  'GW': 'Gine-Bissau',
  'GD': 'Grenada',
  'GL': 'Gr\u00f6nland',
  'GP': 'Guadeloupe',
  'GU': 'Guam',
  'GT': 'Guatemala',
  'GG': 'Guernsey',
  'GY': 'Guyana',
  'ZA': 'G\u00fcney Afrika',
  'GS': 'G\u00fcney Georgia ve G\u00fcney Sandwich Adalar\u0131',
  'KR': 'G\u00fcney Kore',
  'SS': 'G\u00fcney Sudan',
  'GE': 'G\u00fcrcistan',
  'HT': 'Haiti',
  'HR': 'H\u0131rvatistan',
  'IN': 'Hindistan',
  'NL': 'Hollanda',
  'HN': 'Honduras',
  'IQ': 'Irak',
  'IR': '\u0130ran',
  'IE': '\u0130rlanda',
  'ES': '\u0130spanya',
  'IL': '\u0130srail',
  'SE': '\u0130sve\u00e7',
  'CH': '\u0130svi\u00e7re',
  'IT': '\u0130talya',
  'IS': '\u0130zlanda',
  'JM': 'Jamaika',
  'JP': 'Japonya',
  'JE': 'Jersey',
  'KH': 'Kambo\u00e7ya',
  'CM': 'Kamerun',
  'CA': 'Kanada',
  'IC': 'Kanarya Adalar\u0131',
  'ME': 'Karada\u011f',
  'BQ': 'Karayip Hollandas\u0131',
  'QA': 'Katar',
  'KZ': 'Kazakistan',
  'KE': 'Kenya',
  'CY': 'K\u0131br\u0131s',
  'KG': 'K\u0131rg\u0131zistan',
  'KI': 'Kiribati',
  'CO': 'Kolombiya',
  'KM': 'Komorlar',
  'CG': 'Kongo - Brazavil',
  'CD': 'Kongo - Kin\u015fasa',
  'XK': 'Kosova',
  'CR': 'Kosta Rika',
  'KW': 'Kuveyt',
  'KP': 'Kuzey Kore',
  'MK': 'Kuzey Makedonya',
  'MP': 'Kuzey Mariana Adalar\u0131',
  'CU': 'K\u00fcba',
  'LA': 'Laos',
  'LS': 'Lesotho',
  'LV': 'Letonya',
  'LR': 'Liberya',
  'LY': 'Libya',
  'LI': 'Liechtenstein',
  'LT': 'Litvanya',
  'LB': 'L\u00fcbnan',
  'LU': 'L\u00fcksemburg',
  'HU': 'Macaristan',
  'MG': 'Madagaskar',
  'MW': 'Malavi',
  'MV': 'Maldivler',
  'MY': 'Malezya',
  'ML': 'Mali',
  'MT': 'Malta',
  'IM': 'Man Adas\u0131',
  'MH': 'Marshall Adalar\u0131',
  'MQ': 'Martinik',
  'MU': 'Mauritius',
  'YT': 'Mayotte',
  'MX': 'Meksika',
  'EG': 'M\u0131s\u0131r',
  'FM': 'Mikronezya',
  'MN': 'Mo\u011folistan',
  'MD': 'Moldova',
  'MC': 'Monako',
  'MS': 'Montserrat',
  'MR': 'Moritanya',
  'MZ': 'Mozambik',
  'MM': 'Myanmar (Burma)',
  'NA': 'Namibya',
  'NR': 'Nauru',
  'NP': 'Nepal',
  'NE': 'Nijer',
  'NG': 'Nijerya',
  'NI': 'Nikaragua',
  'NU': 'Niue',
  'NF': 'Norfolk Adas\u0131',
  'NO': 'Norve\u00e7',
  'CF': 'Orta Afrika Cumhuriyeti',
  'UZ': '\u00d6zbekistan',
  'PK': 'Pakistan',
  'PW': 'Palau',
  'PA': 'Panama',
  'PG': 'Papua Yeni Gine',
  'PY': 'Paraguay',
  'PE': 'Peru',
  'PN': 'Pitcairn Adalar\u0131',
  'PL': 'Polonya',
  'PT': 'Portekiz',
  'PR': 'Porto Riko',
  'XA': 'Pseudo-Accents',
  'XB': 'Pseudo-Bidi',
  'RE': 'R\u00e9union',
  'RO': 'Romanya',
  'RW': 'Ruanda',
  'RU': 'Rusya',
  'BL': 'Saint Barthelemy',
  'SH': 'Saint Helena',
  'KN': 'Saint Kitts ve Nevis',
  'LC': 'Saint Lucia',
  'MF': 'Saint Martin',
  'PM': 'Saint Pierre ve Miquelon',
  'VC': 'Saint Vincent ve Grenadinler',
  'WS': 'Samoa',
  'SM': 'San Marino',
  'ST': 'S\u00e3o Tom\u00e9 ve Pr\u00edncipe',
  'SN': 'Senegal',
  'SC': 'Sey\u015feller',
  'RS': 'S\u0131rbistan',
  'SL': 'Sierra Leone',
  'SG': 'Singapur',
  'SX': 'Sint Maarten',
  'SK': 'Slovakya',
  'SI': 'Slovenya',
  'SB': 'Solomon Adalar\u0131',
  'SO': 'Somali',
  'LK': 'Sri Lanka',
  'SD': 'Sudan',
  'SR': 'Surinam',
  'SY': 'Suriye',
  'SA': 'Suudi Arabistan',
  'SJ': 'Svalbard ve Jan Mayen',
  'CL': '\u015eili',
  'TJ': 'Tacikistan',
  'TZ': 'Tanzanya',
  'TH': 'Tayland',
  'TW': 'Tayvan',
  'TL': 'Timor-Leste',
  'TG': 'Togo',
  'TK': 'Tokelau',
  'TO': 'Tonga',
  'TT': 'Trinidad ve Tobago',
  'TA': 'Tristan da Cunha',
  'TN': 'Tunus',
  'TC': 'Turks ve Caicos Adalar\u0131',
  'TV': 'Tuvalu',
  'TR': 'T\u00fcrkiye',
  'TM': 'T\u00fcrkmenistan',
  'UG': 'Uganda',
  'UA': 'Ukrayna',
  'OM': 'Umman',
  'UY': 'Uruguay',
  'JO': '\u00dcrd\u00fcn',
  'VU': 'Vanuatu',
  'VA': 'Vatikan',
  'VE': 'Venezuela',
  'VN': 'Vietnam',
  'WF': 'Wallis ve Futuna',
  'YE': 'Yemen',
  'NC': 'Yeni Kaledonya',
  'NZ': 'Yeni Zelanda',
  'GR': 'Yunanistan',
  'ZM': 'Zambiya',
  'ZW': 'Zimbabve'
});

/***/ }),

/***/ "XAuw":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("DH3W");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "YiV1":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony default export */ __webpack_exports__["a"] = ({
  text: {
    name: 'text',
    displayName: 'Text',
    displayIconHTML: 'text'
  },
  choice: {
    name: 'choice',
    displayName: 'Choice',
    displayIconHTML: 'check'
  },
  dateTime: {
    name: 'dateTime',
    displayName: 'DateTime',
    displayIconHTML: 'calendar'
  },
  number: {
    name: 'number',
    displayName: 'Number',
    displayIconHTML: 'sort-numeric-up-alt'
  },
  salesOrder: {
    name: 'salesOrder',
    displayName: 'SalesOrder',
    displayIconHTML: 'shopping-basket'
  },
  imageFile: {
    name: 'imageFile',
    displayName: 'Image/File',
    displayIconHTML: 'cloud-upload'
  },
  designElements: {
    name: 'designElements',
    displayName: 'Design Elements',
    displayIconHTML: 'tint'
  },
  other: {
    name: 'other',
    displayName: 'More',
    displayIconHTML: 'ellipsis-h-alt'
  }
});

/***/ }),

/***/ "ZB89":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  'AL': '\u963f\u5c14\u5df4\u5c3c\u4e9a',
  'DZ': '\u963f\u5c14\u53ca\u5229\u4e9a',
  'AF': '\u963f\u5bcc\u6c57',
  'AR': '\u963f\u6839\u5ef7',
  'AE': '\u963f\u62c9\u4f2f\u8054\u5408\u914b\u957f\u56fd',
  'AW': '\u963f\u9c81\u5df4',
  'OM': '\u963f\u66fc',
  'AZ': '\u963f\u585e\u62dc\u7586',
  'AC': '\u963f\u68ee\u677e\u5c9b',
  'EG': '\u57c3\u53ca',
  'ET': '\u57c3\u585e\u4fc4\u6bd4\u4e9a',
  'IE': '\u7231\u5c14\u5170',
  'EE': '\u7231\u6c99\u5c3c\u4e9a',
  'AD': '\u5b89\u9053\u5c14',
  'AO': '\u5b89\u54e5\u62c9',
  'AI': '\u5b89\u572d\u62c9',
  'AG': '\u5b89\u63d0\u74dc\u548c\u5df4\u5e03\u8fbe',
  'AT': '\u5965\u5730\u5229',
  'AX': '\u5965\u5170\u7fa4\u5c9b',
  'AU': '\u6fb3\u5927\u5229\u4e9a',
  'BB': '\u5df4\u5df4\u591a\u65af',
  'PG': '\u5df4\u5e03\u4e9a\u65b0\u51e0\u5185\u4e9a',
  'BS': '\u5df4\u54c8\u9a6c',
  'PK': '\u5df4\u57fa\u65af\u5766',
  'PY': '\u5df4\u62c9\u572d',
  'PS': '\u5df4\u52d2\u65af\u5766\u9886\u571f',
  'BH': '\u5df4\u6797',
  'PA': '\u5df4\u62ff\u9a6c',
  'BR': '\u5df4\u897f',
  'BY': '\u767d\u4fc4\u7f57\u65af',
  'BM': '\u767e\u6155\u5927',
  'BG': '\u4fdd\u52a0\u5229\u4e9a',
  'MP': '\u5317\u9a6c\u91cc\u4e9a\u7eb3\u7fa4\u5c9b',
  'MK': '\u5317\u9a6c\u5176\u987f',
  'BJ': '\u8d1d\u5b81',
  'BE': '\u6bd4\u5229\u65f6',
  'IS': '\u51b0\u5c9b',
  'PR': '\u6ce2\u591a\u9ece\u5404',
  'PL': '\u6ce2\u5170',
  'BA': '\u6ce2\u65af\u5c3c\u4e9a\u548c\u9ed1\u585e\u54e5\u7ef4\u90a3',
  'BO': '\u73bb\u5229\u7ef4\u4e9a',
  'BZ': '\u4f2f\u5229\u5179',
  'BW': '\u535a\u8328\u74e6\u7eb3',
  'BT': '\u4e0d\u4e39',
  'BF': '\u5e03\u57fa\u7eb3\u6cd5\u7d22',
  'BI': '\u5e03\u9686\u8fea',
  'KP': '\u671d\u9c9c',
  'GQ': '\u8d64\u9053\u51e0\u5185\u4e9a',
  'DK': '\u4e39\u9ea6',
  'DE': '\u5fb7\u56fd',
  'DG': '\u8fea\u6208\u52a0\u897f\u4e9a\u5c9b',
  'TL': '\u4e1c\u5e1d\u6c76',
  'TG': '\u591a\u54e5',
  'DO': '\u591a\u7c73\u5c3c\u52a0\u5171\u548c\u56fd',
  'DM': '\u591a\u7c73\u5c3c\u514b',
  'RU': '\u4fc4\u7f57\u65af',
  'EC': '\u5384\u74dc\u591a\u5c14',
  'ER': '\u5384\u7acb\u7279\u91cc\u4e9a',
  'FR': '\u6cd5\u56fd',
  'FO': '\u6cd5\u7f57\u7fa4\u5c9b',
  'PF': '\u6cd5\u5c5e\u6ce2\u5229\u5c3c\u897f\u4e9a',
  'GF': '\u6cd5\u5c5e\u572d\u4e9a\u90a3',
  'TF': '\u6cd5\u5c5e\u5357\u90e8\u9886\u5730',
  'MF': '\u6cd5\u5c5e\u5723\u9a6c\u4e01',
  'VA': '\u68b5\u8482\u5188',
  'PH': '\u83f2\u5f8b\u5bbe',
  'FJ': '\u6590\u6d4e',
  'FI': '\u82ac\u5170',
  'CV': '\u4f5b\u5f97\u89d2',
  'FK': '\u798f\u514b\u5170\u7fa4\u5c9b',
  'GM': '\u5188\u6bd4\u4e9a',
  'CG': '\u521a\u679c\uff08\u5e03\uff09',
  'CD': '\u521a\u679c\uff08\u91d1\uff09',
  'CO': '\u54e5\u4f26\u6bd4\u4e9a',
  'CR': '\u54e5\u65af\u8fbe\u9ece\u52a0',
  'GD': '\u683c\u6797\u7eb3\u8fbe',
  'GL': '\u683c\u9675\u5170',
  'GE': '\u683c\u9c81\u5409\u4e9a',
  'GG': '\u6839\u897f\u5c9b',
  'CU': '\u53e4\u5df4',
  'GP': '\u74dc\u5fb7\u7f57\u666e',
  'GU': '\u5173\u5c9b',
  'GY': '\u572d\u4e9a\u90a3',
  'KZ': '\u54c8\u8428\u514b\u65af\u5766',
  'HT': '\u6d77\u5730',
  'KR': '\u97e9\u56fd',
  'NL': '\u8377\u5170',
  'BQ': '\u8377\u5c5e\u52a0\u52d2\u6bd4\u533a',
  'SX': '\u8377\u5c5e\u5723\u9a6c\u4e01',
  'ME': '\u9ed1\u5c71',
  'HN': '\u6d2a\u90fd\u62c9\u65af',
  'KI': '\u57fa\u91cc\u5df4\u65af',
  'DJ': '\u5409\u5e03\u63d0',
  'KG': '\u5409\u5c14\u5409\u65af\u65af\u5766',
  'GN': '\u51e0\u5185\u4e9a',
  'GW': '\u51e0\u5185\u4e9a\u6bd4\u7ecd',
  'CA': '\u52a0\u62ff\u5927',
  'GH': '\u52a0\u7eb3',
  'IC': '\u52a0\u7eb3\u5229\u7fa4\u5c9b',
  'GA': '\u52a0\u84ec',
  'KH': '\u67ec\u57d4\u5be8',
  'CZ': '\u6377\u514b',
  'ZW': '\u6d25\u5df4\u5e03\u97e6',
  'CM': '\u5580\u9ea6\u9686',
  'QA': '\u5361\u5854\u5c14',
  'KY': '\u5f00\u66fc\u7fa4\u5c9b',
  'CC': '\u79d1\u79d1\u65af\uff08\u57fa\u6797\uff09\u7fa4\u5c9b',
  'KM': '\u79d1\u6469\u7f57',
  'XK': '\u79d1\u7d22\u6c83',
  'CI': '\u79d1\u7279\u8fea\u74e6',
  'KW': '\u79d1\u5a01\u7279',
  'HR': '\u514b\u7f57\u5730\u4e9a',
  'KE': '\u80af\u5c3c\u4e9a',
  'CK': '\u5e93\u514b\u7fa4\u5c9b',
  'CW': '\u5e93\u62c9\u7d22',
  'LV': '\u62c9\u8131\u7ef4\u4e9a',
  'LS': '\u83b1\u7d22\u6258',
  'LA': '\u8001\u631d',
  'LB': '\u9ece\u5df4\u5ae9',
  'LT': '\u7acb\u9676\u5b9b',
  'LR': '\u5229\u6bd4\u91cc\u4e9a',
  'LY': '\u5229\u6bd4\u4e9a',
  'LI': '\u5217\u652f\u6566\u58eb\u767b',
  'RE': '\u7559\u5c3c\u6c6a',
  'LU': '\u5362\u68ee\u5821',
  'RW': '\u5362\u65fa\u8fbe',
  'RO': '\u7f57\u9a6c\u5c3c\u4e9a',
  'MG': '\u9a6c\u8fbe\u52a0\u65af\u52a0',
  'IM': '\u9a6c\u6069\u5c9b',
  'MV': '\u9a6c\u5c14\u4ee3\u592b',
  'MT': '\u9a6c\u8033\u4ed6',
  'MW': '\u9a6c\u62c9\u7ef4',
  'MY': '\u9a6c\u6765\u897f\u4e9a',
  'ML': '\u9a6c\u91cc',
  'MH': '\u9a6c\u7ecd\u5c14\u7fa4\u5c9b',
  'MQ': '\u9a6c\u63d0\u5c3c\u514b',
  'YT': '\u9a6c\u7ea6\u7279',
  'MU': '\u6bdb\u91cc\u6c42\u65af',
  'MR': '\u6bdb\u91cc\u5854\u5c3c\u4e9a',
  'US': '\u7f8e\u56fd',
  'UM': '\u7f8e\u56fd\u672c\u571f\u5916\u5c0f\u5c9b\u5c7f',
  'AS': '\u7f8e\u5c5e\u8428\u6469\u4e9a',
  'VI': '\u7f8e\u5c5e\u7ef4\u5c14\u4eac\u7fa4\u5c9b',
  'MN': '\u8499\u53e4',
  'MS': '\u8499\u7279\u585e\u62c9\u7279',
  'BD': '\u5b5f\u52a0\u62c9\u56fd',
  'PE': '\u79d8\u9c81',
  'FM': '\u5bc6\u514b\u7f57\u5c3c\u897f\u4e9a',
  'MM': '\u7f05\u7538',
  'MD': '\u6469\u5c14\u591a\u74e6',
  'MA': '\u6469\u6d1b\u54e5',
  'MC': '\u6469\u7eb3\u54e5',
  'MZ': '\u83ab\u6851\u6bd4\u514b',
  'MX': '\u58a8\u897f\u54e5',
  'NA': '\u7eb3\u7c73\u6bd4\u4e9a',
  'ZA': '\u5357\u975e',
  'AQ': '\u5357\u6781\u6d32',
  'GS': '\u5357\u4e54\u6cbb\u4e9a\u548c\u5357\u6851\u5a01\u5947\u7fa4\u5c9b',
  'SS': '\u5357\u82cf\u4e39',
  'NR': '\u7459\u9c81',
  'NI': '\u5c3c\u52a0\u62c9\u74dc',
  'NP': '\u5c3c\u6cca\u5c14',
  'NE': '\u5c3c\u65e5\u5c14',
  'NG': '\u5c3c\u65e5\u5229\u4e9a',
  'NU': '\u7ebd\u57c3',
  'NO': '\u632a\u5a01',
  'NF': '\u8bfa\u798f\u514b\u5c9b',
  'PW': '\u5e15\u52b3',
  'PN': '\u76ae\u7279\u51ef\u6069\u7fa4\u5c9b',
  'PT': '\u8461\u8404\u7259',
  'JP': '\u65e5\u672c',
  'SE': '\u745e\u5178',
  'CH': '\u745e\u58eb',
  'SV': '\u8428\u5c14\u74e6\u591a',
  'WS': '\u8428\u6469\u4e9a',
  'RS': '\u585e\u5c14\u7ef4\u4e9a',
  'SL': '\u585e\u62c9\u5229\u6602',
  'SN': '\u585e\u5185\u52a0\u5c14',
  'CY': '\u585e\u6d66\u8def\u65af',
  'SC': '\u585e\u820c\u5c14',
  'SA': '\u6c99\u7279\u963f\u62c9\u4f2f',
  'BL': '\u5723\u5df4\u6cf0\u52d2\u7c73',
  'CX': '\u5723\u8bde\u5c9b',
  'ST': '\u5723\u591a\u7f8e\u548c\u666e\u6797\u897f\u6bd4',
  'SH': '\u5723\u8d6b\u52d2\u62ff',
  'KN': '\u5723\u57fa\u8328\u548c\u5c3c\u7ef4\u65af',
  'LC': '\u5723\u5362\u897f\u4e9a',
  'SM': '\u5723\u9a6c\u529b\u8bfa',
  'PM': '\u5723\u76ae\u57c3\u5c14\u548c\u5bc6\u514b\u9686\u7fa4\u5c9b',
  'VC': '\u5723\u6587\u68ee\u7279\u548c\u683c\u6797\u7eb3\u4e01\u65af',
  'LK': '\u65af\u91cc\u5170\u5361',
  'SK': '\u65af\u6d1b\u4f10\u514b',
  'SI': '\u65af\u6d1b\u6587\u5c3c\u4e9a',
  'SJ': '\u65af\u74e6\u5c14\u5df4\u548c\u626c\u9a6c\u5ef6',
  'SZ': '\u65af\u5a01\u58eb\u5170',
  'SD': '\u82cf\u4e39',
  'SR': '\u82cf\u91cc\u5357',
  'SB': '\u6240\u7f57\u95e8\u7fa4\u5c9b',
  'SO': '\u7d22\u9a6c\u91cc',
  'TJ': '\u5854\u5409\u514b\u65af\u5766',
  'TW': '\u53f0\u6e7e',
  'TH': '\u6cf0\u56fd',
  'TZ': '\u5766\u6851\u5c3c\u4e9a',
  'TO': '\u6c64\u52a0',
  'TC': '\u7279\u514b\u65af\u548c\u51ef\u79d1\u65af\u7fa4\u5c9b',
  'TA': '\u7279\u91cc\u65af\u5766-\u8fbe\u5e93\u5c3c\u4e9a\u7fa4\u5c9b',
  'TT': '\u7279\u7acb\u5c3c\u8fbe\u548c\u591a\u5df4\u54e5',
  'TN': '\u7a81\u5c3c\u65af',
  'TV': '\u56fe\u74e6\u5362',
  'TR': '\u571f\u8033\u5176',
  'TM': '\u571f\u5e93\u66fc\u65af\u5766',
  'TK': '\u6258\u514b\u52b3',
  'WF': '\u74e6\u5229\u65af\u548c\u5bcc\u56fe\u7eb3',
  'VU': '\u74e6\u52aa\u963f\u56fe',
  'GT': '\u5371\u5730\u9a6c\u62c9',
  'XA': '\u4f2a\u5730\u533a',
  'XB': '\u4f2a\u53cc\u5411\u8bed\u8a00\u5730\u533a',
  'VE': '\u59d4\u5185\u745e\u62c9',
  'BN': '\u6587\u83b1',
  'UG': '\u4e4c\u5e72\u8fbe',
  'UA': '\u4e4c\u514b\u5170',
  'UY': '\u4e4c\u62c9\u572d',
  'UZ': '\u4e4c\u5179\u522b\u514b\u65af\u5766',
  'GR': '\u5e0c\u814a',
  'ES': '\u897f\u73ed\u7259',
  'EH': '\u897f\u6492\u54c8\u62c9',
  'SG': '\u65b0\u52a0\u5761',
  'NC': '\u65b0\u5580\u91cc\u591a\u5c3c\u4e9a',
  'NZ': '\u65b0\u897f\u5170',
  'HU': '\u5308\u7259\u5229',
  'EA': '\u4f11\u8fbe\u53ca\u6885\u5229\u5229\u4e9a',
  'SY': '\u53d9\u5229\u4e9a',
  'JM': '\u7259\u4e70\u52a0',
  'AM': '\u4e9a\u7f8e\u5c3c\u4e9a',
  'YE': '\u4e5f\u95e8',
  'IQ': '\u4f0a\u62c9\u514b',
  'IR': '\u4f0a\u6717',
  'IL': '\u4ee5\u8272\u5217',
  'IT': '\u610f\u5927\u5229',
  'IN': '\u5370\u5ea6',
  'ID': '\u5370\u5ea6\u5c3c\u897f\u4e9a',
  'GB': '\u82f1\u56fd',
  'VG': '\u82f1\u5c5e\u7ef4\u5c14\u4eac\u7fa4\u5c9b',
  'IO': '\u82f1\u5c5e\u5370\u5ea6\u6d0b\u9886\u5730',
  'JO': '\u7ea6\u65e6',
  'VN': '\u8d8a\u5357',
  'ZM': '\u8d5e\u6bd4\u4e9a',
  'JE': '\u6cfd\u897f\u5c9b',
  'TD': '\u4e4d\u5f97',
  'GI': '\u76f4\u5e03\u7f57\u9640',
  'CL': '\u667a\u5229',
  'CF': '\u4e2d\u975e\u5171\u548c\u56fd',
  'CN': '\u4e2d\u56fd',
  'MO': '\u4e2d\u56fd\u6fb3\u95e8\u7279\u522b\u884c\u653f\u533a',
  'HK': '\u4e2d\u56fd\u9999\u6e2f\u7279\u522b\u884c\u653f\u533a'
});

/***/ }),

/***/ "a2dD":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "aXTv":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("mSNy");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("Gppw");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(bson_objectid__WEBPACK_IMPORTED_MODULE_2__);



/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'dropdown',
  displayName: 'Dropdown',
  parentType: 'choice',
  displayOnToolbox: true,
  displayIconHTML: 'caret-down',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].choice,
  componentDefaults: function componentDefaults() {
    return {
      questionType: 'choice',
      question: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.typeYourQuestionHere'),
      displayOrder: 0,
      isRequired: false,
      isDeleted: false,
      isActive: false,
      choice: {
        subType: 'dropdown',
        isShowEmptyoption: true,
        emptyOption: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.pleaseSelect'),
        optionText: '',
        options: [{
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('option', {
            number: '1'
          })
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('option', {
            number: '2'
          })
        }],
        defaultValue: []
      }
    };
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    var defaultVal = questionModel.choice.options.find(x => x.text === questionModel.choice.defaultValue[0] || x._id === questionModel.choice.defaultValue[0]);

    if (defaultVal) {
      return defaultVal._id;
    }

    return '';
  }
});

/***/ }),

/***/ "bHM2":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "bNzB":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("ttAG");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("mSNy");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("RuLz");





var ObjectId = __webpack_require__("Gppw");

/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'productbasket',
  displayName: 'Product Basket',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'shopping-basket',
  isChangeQuestionTypeShow: false,
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].salesOrder,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: true,
      questionType: 'productbasket',
      displayOrder: 0,
      isDeleted: false,
      productbasket: {
        currency: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].locale === 'tr' ? 'TRY' : 'USD',
        viewType: {
          viewTypes: this.getAvailableViewTypes().map(x => x.value),
          defaultViewType: 'grid'
        },
        products: [{
          _id: ObjectId(),
          name: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('title'),
          price: 5,
          unit: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.productbasket.unit'),
          detailUrl: '',
          hidden: false,
          variants: [],
          fileIds: [],

          /* variants: [
          	{
          		name: 'size',
          		options: ['S', 'M', 'L']
          	},
          	{
          		name: 'color',
          		options: ['yellow', 'red', 'black']
          	}
          ] */
          stock: {
            isEnable: false,
            whenOutOfStock: 'hide'
          },
          variantPrice: {
            isEnable: false
          }
        }]
      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    var productsCollection = {};
    question.productbasket.products.forEach(product => {
      var variantCollection = {};
      product.variants.forEach(variant => {
        var optionsCollection = {};
        variant.options.forEach(option => {
          optionsCollection[option] = option;
        });
        variant.optionsCollection = optionsCollection;
        variantCollection[variant.name] = variant;
      });
      product.variantCollection = variantCollection;
      productsCollection[product._id] = product;
    });
    var questionAnswer = question.answer;

    if (questionAnswer && questionAnswer.p && questionAnswer.t >= 0) {
      var pb = {
        t: questionAnswer.t,
        c: question.productbasket.currency,
        p: []
      };

      if (questionAnswer.k) {
        pb.k = questionAnswer.k;
      }

      if (questionAnswer && questionAnswer.p && Array.isArray(questionAnswer.p)) {
        questionAnswer.p.forEach(answerProduct => {
          var p = productsCollection[answerProduct.pid] || {};

          if (!_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(p)) {
            var pItem = {
              pid: p._id,
              n: p.name,
              ta: p.tags,
              p: answerProduct.p && Number(answerProduct.p) || p.price,
              u: p.unit,
              a: answerProduct.a,
              t: answerProduct.t,
              v: []
            };

            if (answerProduct.v) {
              answerProduct.v.forEach(answerProductVariant => {
                var v = p.variantCollection[answerProductVariant.n] || {};

                if (!_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(v)) {
                  var o = v.optionsCollection[answerProductVariant.v] || {};

                  if (!_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_1__["default"].isEmpty(o)) {
                    pItem.v.push({
                      n: v.name,
                      v: o
                    });
                  }
                }
              });
            }

            pb.p.push(pItem);
          }
        });
      }

      if (pb.p.length > 0) {
        return {
          q: question._id,
          pb: pb
        };
      }
    }

    return {
      q: question._id
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers, extraParams) {
    if (questionAnswers.pb) {
      question.productbasket.defaultValue = questionAnswers.pb;

      if (extraParams && extraParams.reduceFromStockKey) {
        question.productbasket.defaultValue.k = extraParams && extraParams.reduceFromStockKey;
      }
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    return {
      questionId: question._id,
      question: question.question,
      answer: {
        type: 'component',
        questionType: this.name,
        model: answer.pb
      },
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var result = {
      _: []
    };

    if (questionModel.isRequired) {
      result._.push(v => !!v && v.p && v.p.length > 0 || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('isRequired')));
    }

    if (questionModel.productbasket.products) {
      for (var i = 0; i < questionModel.productbasket.products.length; i++) {
        result[questionModel.productbasket.products[i]._id] = [];
      }
    }

    return result;
  },
  checkCanBeAdded: function checkCanBeAdded(questions) {
    var QUESTIONTYPE_MAX_QUESTION_COUNT = 1;

    if (questions) {
      var formQuestionTypeQuestions = questions.filter(q => q.questionType === 'productbasket');
      return formQuestionTypeQuestions.length < QUESTIONTYPE_MAX_QUESTION_COUNT;
    }

    return true;
  },
  fixFormModelForLocalDbAdd: function fixFormModelForLocalDbAdd(question) {
    for (var j = 0; j < question.productbasket.products.length; j++) {
      if (!question.productbasket.products[j]._id) {
        question.productbasket.products[j]._id = ObjectId().str;
      }
    }
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    var defaultValue = {
      t: 0
    };

    if (questionModel.productbasket.defaultValue) {
      defaultValue = questionModel.productbasket.defaultValue;
    } else if (questionModel.answer) {
      defaultValue = questionModel.answer;
    }

    return defaultValue;
  },
  getFileIds: function getFileIds(question) {
    var fileIds = [];

    for (var i = 0; i < question.productbasket.products.length; i++) {
      if (question.productbasket.products[i].fileId) {
        fileIds.push(question.productbasket.products[i].fileId);
      }

      fileIds = fileIds.concat(question.productbasket.products[i].fileIds);
    }

    return fileIds;
  },
  fixUndefinedViewTypes: function fixUndefinedViewTypes(questionModel) {
    if (questionModel.productbasket && !questionModel.productbasket.viewType) {
      questionModel.productbasket.viewType.viewTypes = this.getAvailableViewTypes().map(x => x.value);
      questionModel.productbasket.viewType.defaultViewType = 'grid';
    }
  },
  getAvailableViewTypes: function getAvailableViewTypes() {
    return [{
      text: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.productbasket.viewTypes.grid'),
      value: 'grid'
    }, {
      text: _lang__WEBPACK_IMPORTED_MODULE_2__["default"].t('questionTypes.productbasket.viewTypes.list'),
      value: 'list'
    }];
  }
});

/***/ }),

/***/ "bxzC":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "dAjO":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("mSNy");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("Gppw");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(bson_objectid__WEBPACK_IMPORTED_MODULE_2__);



/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'picturechoice',
  displayName: 'Picture Selection',
  parentType: 'choice',
  displayOnToolbox: true,
  displayIconHTML: 'file-check',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].choice,
  componentDefaults: function componentDefaults() {
    return {
      questionType: 'choice',
      question: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: false,
      isDeleted: false,
      isActive: false,
      choice: {
        subType: 'picturechoice',
        optionText: '',
        options: [{
          fileId: '',
          text: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('option', {
            number: '1'
          }),
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str
        }],
        defaultValue: ['']
      }
    };
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    var defVal = questionModel.choice.defaultValue || [];

    if (!Array.isArray(defVal)) {
      defVal = [];
    } else {
      defVal = defVal.filter(x => x.toLowerCase() !== 'please select' && x.toLowerCase() !== '');
    }

    return defVal;
  }
});

/***/ }),

/***/ "dF6o":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("GLes");

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

/***/ "dcGo":
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./de": "s0AU",
	"./de.js": "s0AU",
	"./en": "8/nC",
	"./en.js": "8/nC",
	"./es": "Qqpc",
	"./es.js": "Qqpc",
	"./fr": "SSqv",
	"./fr.js": "SSqv",
	"./hi": "l8Q2",
	"./hi.js": "l8Q2",
	"./id": "N7iS",
	"./id.js": "N7iS",
	"./pt": "P4uP",
	"./pt.js": "P4uP",
	"./ru": "q4hb",
	"./ru.js": "q4hb",
	"./tr": "WqO3",
	"./tr.js": "WqO3",
	"./zh": "ZB89",
	"./zh.js": "ZB89"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "dcGo";

/***/ }),

/***/ "eUdF":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "ewUQ":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_array_reverse__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("Junv");
/* harmony import */ var core_js_modules_es_array_reverse__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_reverse__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("JfAA");
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("EnZy");
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("YiV1");
/* harmony import */ var _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("ttAG");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__("mSNy");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__("Gppw");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(bson_objectid__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__("RuLz");








/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'grid',
  displayName: 'Grid',
  displayOnToolbox: true,
  answerable: true,
  active: true,
  displayIconHTML: 'th-large',
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].other,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: false,
      questionType: 'grid',
      displayOrder: 0,
      isDeleted: false,
      grid: {
        columns: [{
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_6___default()().str,
          name: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.column') + ' 1',
          type: 'text'
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_6___default()().str,
          name: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.column') + ' 2',
          type: 'number'
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_6___default()().str,
          name: _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('questionTypes.column') + ' 3',
          type: 'date'
        }]
      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    var answers = [];

    for (var r = 0; r < question.answer.length; r++) {
      var questionRowAnswer = question.answer[r];
      var rowAnswer = [];

      for (var i = 0; i < question.grid.columns.length; i++) {
        var column = question.grid.columns[i];
        var answer = {
          cid: column._id,
          cn: column.name
        };
        var questionColumnAnswer = questionRowAnswer[column._id];

        switch (column.type) {
          case 'text':
            answer.t = questionColumnAnswer;
            break;

          case 'date':
            var dateValue = questionColumnAnswer;
            dateValue = dateValue.split('/').reverse().join('-');
            answer.d = new Date(dateValue);
            break;

          default:
            answer.n = questionColumnAnswer;
            break;
        }

        rowAnswer.push(answer);
      }

      answers.push({
        c: rowAnswer
      });
    }

    return {
      q: question._id,
      g: answers
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    var answers = [];

    if (questionAnswers.g) {
      for (var r = 0; r < questionAnswers.g.length; r++) {
        var rowAnswer = questionAnswers.g[r];

        for (var i = 0; i < questionAnswers.g[r].c.length; i++) {
          var column = questionAnswers.g[r].c[i];

          if (column.t) {
            rowAnswer[column.cid] = column.t;
          }

          if (column.d) {
            var date = new Date(column.d);
            var day = date.getDate().toString();
            var month = (date.getMonth() + 1).toString();
            var year = date.getFullYear().toString();

            if (day.length === 1) {
              day = '0' + day;
            }

            if (month.length === 1) {
              month = '0' + month;
            }

            rowAnswer[column.cid] = day + '/' + month + '/' + year;
          }

          if (column.n) {
            rowAnswer[column.cid] = column.n;
          }
        }

        answers.push(rowAnswer);
      }

      question.grid.defaultValue = answers;
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question, culture, timezone) {
    var columns = [];

    for (var i = 0; i < question.grid.columns.length; i++) {
      var column = question.grid.columns[i];
      columns.push({
        id: column._id,
        n: column.name,
        t: column.type === 'text' ? 't' : column.type === 'date' ? 'd' : 'n',
        so: column.sumOption
      });
    }

    if (answer.g) {
      answer.g.forEach((row, rIndex) => {
        row.c.forEach((ans, index) => {
          if (ans.d) {
            var options = {
              // weekday: 'short',
              year: 'numeric',
              month: 'numeric',
              day: 'numeric'
            };

            if (timezone && timezone.utc && timezone.utc[0]) {
              options.timeZone = timezone && timezone.utc && timezone.utc[0];
            }

            var dateAnswer = new Date(ans.d);
            answer.g[rIndex].c[index].d = dateAnswer.toLocaleString(culture.name, options);
          }
        });
      });
    }

    var answerModel = {
      model: {
        c: columns,
        a: answer.g
      },
      type: 'component',
      questionType: 'grid'
    };
    return {
      questionId: question._id,
      question: question.question,
      answer: answerModel,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var result = {
      _: []
    };

    var _loop = function _loop() {
      var column = questionModel.grid.columns[j];

      if (!result[column._id]) {
        result[column._id] = [];
      }

      if (column.required && column.type !== 'date') {
        result[column._id].push(function (v) {
          if (!v) {
            return _helpers_bbcode__WEBPACK_IMPORTED_MODULE_7__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired'));
          } else {
            return true;
          }
        });
      }

      if (column.type === 'date') {
        result[column._id].push(function (v) {
          if (!v) {
            if (column.required) {
              return _helpers_bbcode__WEBPACK_IMPORTED_MODULE_7__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('isRequired'));
            } else {
              return true;
            }
          }

          var strDate = v.split('/').reverse().join('-');

          if (!_helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_4__["default"].isDateString(strDate)) {
            return _lang__WEBPACK_IMPORTED_MODULE_5__["default"].t('dateIsNotValid', {
              field: column._id
            });
          }

          return true;
        });
      }
    };

    for (var j = 0; j < questionModel.grid.columns.length; j++) {
      _loop();
    }

    return result;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.grid.defaultValue ? questionModel.grid.defaultValue : [];
  }
});

/***/ }),

/***/ "frYQ":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "gNIQ":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "ga8e":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("JfAA");
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("EnZy");
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("YiV1");
/* harmony import */ var _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("ttAG");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("mSNy");
/* harmony import */ var _helpers_bbcode__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__("RuLz");






/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'time',
  displayName: 'Time',
  displayOnToolbox: true,
  answerable: true,
  displayIconHTML: 'clock',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].dateTime,
  componentDefaults: function componentDefaults() {
    return {
      question: _lang__WEBPACK_IMPORTED_MODULE_4__["default"].t('questionTypes.typeYourQuestionHere'),
      isRequired: false,
      questionType: 'time',
      displayOrder: 0,
      isDeleted: false
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    var returnObj = {
      q: question._id
    };

    if (question.answer !== null && question.answer !== undefined) {
      var arrTi = question.answer.split(':');

      if (arrTi.length > 1) {
        returnObj.ti = {
          h: arrTi[0],
          m: arrTi[1]
        };
      }
    }

    return returnObj;
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    if (questionAnswers.ti && questionAnswers.ti.h && questionAnswers.ti.m) {
      var strH = questionAnswers.ti.h.toString();
      var strM = questionAnswers.ti.m.toString();

      if (strH.length === 1) {
        strH = '0' + strH;
      }

      if (strM.length === 1) {
        strM = '0' + strM;
      }

      var v = strH + strM;

      if (question.time) {
        question.time.defaultValue = v;
      } else {
        question.time = {
          defaultValue: v
        };
      }
    }
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    var answerText = '';

    if (answer && answer.ti && answer.ti.h !== undefined && answer.ti.m !== undefined) {
      if (answer.ti.h > 23) {
        answer.ti.h = 23;
      }

      if (answer.ti.m > 59) {
        answer.ti.m = 59;
      }

      var strH = answer.ti.h < 10 ? '0' + answer.ti.h : answer.ti.h + '';
      var strM = answer.ti.m < 10 ? '0' + answer.ti.m : answer.ti.m + '';
      answerText = strH + ':' + strM;
    }

    return {
      questionId: question._id,
      question: question.question,
      answer: answerText,
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var rules = [];
    rules.push(v => _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_3__["default"].isTime(v) || _helpers_jsHelpers__WEBPACK_IMPORTED_MODULE_3__["default"].isEmpty(v) || _helpers_bbcode__WEBPACK_IMPORTED_MODULE_5__[/* default */ "a"].bbcodeToHtml(_lang__WEBPACK_IMPORTED_MODULE_4__["default"].t('questionTypes.validationErrors.wrongValue'), {
      field: questionModel.question
    }));

    if (questionModel.isRequired) {
      rules.push(v => !!v || _lang__WEBPACK_IMPORTED_MODULE_4__["default"].t('isRequired'));
    }

    return rules;
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel, formModel) {
    return questionModel.time && questionModel.time.defaultValue ? questionModel.time.defaultValue : '';
  }
});

/***/ }),

/***/ "iAnd":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("JfAA");
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("P0qE");
/* harmony import */ var config__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("NRfZ");
/* harmony import */ var buffer__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("tjlA");
/* harmony import */ var buffer__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(buffer__WEBPACK_IMPORTED_MODULE_4__);





/* harmony default export */ __webpack_exports__["a"] = ({
  readFile(url) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get(url, {
        responseType: 'arraybuffer'
      }, undefined, 'file');

      if (apiResult.status === 200) {
        var mimeType = apiResult.headers['content-type'].toLowerCase();
        /* eslint-disable-next-line */

        var imgBase64 = new buffer__WEBPACK_IMPORTED_MODULE_4__["Buffer"](apiResult.data, 'binary').toString('base64');
        var src = 'data:' + mimeType + ';base64,' + imgBase64;
        return src;
      } else {
        return '/static/img/no-image.png';
      }
    })();
  },

  readStreamFile(url, onDownloadProgress) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get(url, {
        responseType: 'blob',
        onDownloadProgress: onDownloadProgress
      }, undefined, 'file');

      if (apiResult.status === 200) {
        return new Blob([apiResult.data]);
      } else {
        return null;
      }
    })();
  },

  getFormSession(formId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('/auth/formsession/' + formId, undefined, undefined, 'file');
      return apiResult.data; // return undefined;
    })();
  },

  createUser() {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('file/createUser');
      return createBoolenResult(apiResult);
    })();
  },

  CreateUserByForm(formId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('file/createUser/' + formId);
      return createBoolenResult(apiResult);
    })();
  },

  deleteFormTempFile(formSession, formId, fileId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].delete('/auth/deleteformtempfile/' + formSession + '/' + formId + '/' + fileId, undefined, undefined, 'file');
      return createBoolenResult(apiResult);
    })();
  },

  deleteFormFile(formSession, formId, fileId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].delete('/auth/deleteformfile/' + formSession + '/' + formId + '/' + fileId, undefined, undefined, 'file');
      return createBoolenResult(apiResult);
    })();
  },

  userProfilePhotoUpload(uploadModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('/auth/uploadprofilephoto', uploadModel, undefined, 'file');

      if (apiResult && apiResult.status === 200) {
        return apiResult.data;
      }

      return undefined;
    })();
  },

  formFileUpload(uploadModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('/auth/uploadformfile', uploadModel, undefined, 'file');
      return apiResult.data;
    })();
  },

  formTempFileUpload(uploadModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('/auth/uploadformtempfile', uploadModel, undefined, 'file');
      return apiResult.data;
    })();
  },

  userProfilePhotoDelete(fileId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].delete('/auth/deleteprofilephoto/' + fileId, undefined, undefined, 'file');
      return createBoolenResult(apiResult);
    })();
  },

  downloadRecords(body) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('/auth/records/download', body, undefined, 'file');
    })();
  },

  getDownloadReadyState(formId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('records/' + formId + '/downloadstatus', undefined, undefined, 'file');
    })();
  },

  recordsDownload(exportId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      window.open(config__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"].fileApi + "/downloadrecords/".concat(exportId), '_blank'); // return (await Api.get(`/auth/records/${formId}/download`, undefined, undefined, 'file'));
    })();
  },

  deleteFormFiles(formId, fileId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].delete('/auth/deleteformfiles/' + formId + '/' + fileId, undefined, undefined, 'file');
    })();
  },

  duplicateQuestion(formId, question) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()(function* () {
      return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('/auth/duplicatequestion/' + formId, question, undefined, 'file');
    })();
  },

  notifyImageError(formId, formFileIds) {
    _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('/notify/clienterror/casperimages/' + formId, formFileIds);
  }

});

function createBoolenResult(apiResult) {
  return apiResult.status === 200 || apiResult.status === 201 || apiResult.status === 204;
}

/***/ }),

/***/ "jvRO":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("P0qE");


/* harmony default export */ __webpack_exports__["a"] = ({
  getPackages() {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('packages');
    })();
  },

  getPackageByName(packageName) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('packages/' + packageName);
    })();
  }

});

/***/ }),

/***/ "kdFr":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var isAvailable;

try {
  if (localStorage.getItem) {
    isAvailable = true;
  }
} catch (exception) {
  isAvailable = false;
  console.error('Local Storage Inaccessible');
}

/* harmony default export */ __webpack_exports__["a"] = ({
  isAvailable: isAvailable,
  setItem: function setItem(param1, param2) {
    if (isAvailable) {
      localStorage.setItem(param1, param2);
    }
  },
  getItem: function getItem(param1) {
    if (isAvailable) {
      return localStorage.getItem(param1);
    }

    return null;
  },
  removeItem: function removeItem(param1) {
    if (isAvailable) {
      localStorage.removeItem(param1);
    }
  }
});

/***/ }),

/***/ "l8Q2":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  'AO': '\u0905\u0902\u0917\u094b\u0932\u093e',
  'AQ': '\u0905\u0902\u091f\u093e\u0930\u094d\u0915\u091f\u093f\u0915\u093e',
  'AZ': '\u0905\u091c\u093c\u0930\u092c\u0948\u091c\u093e\u0928',
  'AF': '\u0905\u092b\u093c\u0917\u093e\u0928\u093f\u0938\u094d\u0924\u093e\u0928',
  'AS': '\u0905\u092e\u0947\u0930\u093f\u0915\u0940 \u0938\u092e\u094b\u0906',
  'AW': '\u0905\u0930\u0942\u092c\u093e',
  'AR': '\u0905\u0930\u094d\u091c\u0947\u0902\u091f\u0940\u0928\u093e',
  'SV': '\u0905\u0932 \u0938\u0932\u094d\u0935\u093e\u0921\u094b\u0930',
  'DZ': '\u0905\u0932\u094d\u091c\u0940\u0930\u093f\u092f\u093e',
  'AL': '\u0905\u0932\u094d\u092c\u093e\u0928\u093f\u092f\u093e',
  'AC': '\u0905\u0938\u0947\u0902\u0936\u0928 \u0926\u094d\u0935\u0940\u092a',
  'IM': '\u0906\u0907\u0932 \u0911\u092b\u093c \u092e\u0948\u0928',
  'IS': '\u0906\u0907\u0938\u0932\u0948\u0902\u0921',
  'IE': '\u0906\u092f\u0930\u0932\u0948\u0902\u0921',
  'AM': '\u0906\u0930\u094d\u092e\u0947\u0928\u093f\u092f\u093e',
  'ID': '\u0907\u0902\u0921\u094b\u0928\u0947\u0936\u093f\u092f\u093e',
  'EC': '\u0907\u0915\u094d\u0935\u093e\u0921\u094b\u0930',
  'GQ': '\u0907\u0915\u094d\u0935\u0947\u091f\u094b\u0930\u093f\u092f\u0932 \u0917\u093f\u0928\u0940',
  'IL': '\u0907\u091c\u093c\u0930\u093e\u0907\u0932',
  'IT': '\u0907\u091f\u0932\u0940',
  'ET': '\u0907\u0925\u093f\u092f\u094b\u092a\u093f\u092f\u093e',
  'IQ': '\u0907\u0930\u093e\u0915',
  'ER': '\u0907\u0930\u093f\u091f\u094d\u0930\u093f\u092f\u093e',
  'IR': '\u0908\u0930\u093e\u0928',
  'UZ': '\u0909\u091c\u093c\u094d\u092c\u0947\u0915\u093f\u0938\u094d\u0924\u093e\u0928',
  'KP': '\u0909\u0924\u094d\u0924\u0930 \u0915\u094b\u0930\u093f\u092f\u093e',
  'MP': '\u0909\u0924\u094d\u0924\u0930\u0940 \u092e\u093e\u0930\u093f\u092f\u093e\u0928\u093e \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'UY': '\u0909\u0930\u0942\u0917\u094d\u0935\u0947',
  'AI': '\u090f\u0902\u0917\u094d\u0935\u093f\u0932\u093e',
  'AG': '\u090f\u0902\u091f\u093f\u0917\u0941\u0906 \u0914\u0930 \u092c\u0930\u092c\u0941\u0921\u093e',
  'AD': '\u090f\u0902\u0921\u094b\u0930\u093e',
  'AX': '\u090f\u0932\u0948\u0902\u0921 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'EE': '\u090f\u0938\u094d\u091f\u094b\u0928\u093f\u092f\u093e',
  'AT': '\u0911\u0938\u094d\u091f\u094d\u0930\u093f\u092f\u093e',
  'AU': '\u0911\u0938\u094d\u091f\u094d\u0930\u0947\u0932\u093f\u092f\u093e',
  'OM': '\u0913\u092e\u093e\u0928',
  'KH': '\u0915\u0902\u092c\u094b\u0921\u093f\u092f\u093e',
  'KZ': '\u0915\u091c\u093c\u093e\u0916\u0938\u094d\u0924\u093e\u0928',
  'QA': '\u0915\u093c\u0924\u0930',
  'CA': '\u0915\u0928\u093e\u0921\u093e',
  'CD': '\u0915\u093e\u0902\u0917\u094b - \u0915\u093f\u0902\u0936\u093e\u0938\u093e',
  'CG': '\u0915\u093e\u0902\u0917\u094b \u2013 \u092c\u094d\u0930\u093e\u091c\u093c\u093e\u0935\u093f\u0932',
  'KI': '\u0915\u093f\u0930\u093f\u092c\u093e\u0924\u0940',
  'KG': '\u0915\u093f\u0930\u094d\u0917\u093f\u091c\u093c\u0938\u094d\u0924\u093e\u0928',
  'CK': '\u0915\u0941\u0915 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'KW': '\u0915\u0941\u0935\u0948\u0924',
  'KE': '\u0915\u0947\u0928\u094d\u092f\u093e',
  'CV': '\u0915\u0947\u092a \u0935\u0930\u094d\u0921',
  'IC': '\u0915\u0948\u0928\u0947\u0930\u0940 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'CM': '\u0915\u0948\u092e\u0930\u0942\u0928',
  'KY': '\u0915\u0948\u092e\u0947\u0928 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'BQ': '\u0915\u0948\u0930\u093f\u092c\u093f\u092f\u0928 \u0928\u0940\u0926\u0930\u0932\u0948\u0902\u0921',
  'CC': '\u0915\u094b\u0915\u094b\u0938 (\u0915\u0940\u0932\u093f\u0902\u0917) \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'CI': '\u0915\u094b\u091f \u0921\u0940 \u0906\u0907\u0935\u0930',
  'KM': '\u0915\u094b\u092e\u094b\u0930\u094b\u0938',
  'CO': '\u0915\u094b\u0932\u0902\u092c\u093f\u092f\u093e',
  'XK': '\u0915\u094b\u0938\u094b\u0935\u094b',
  'CR': '\u0915\u094b\u0938\u094d\u091f\u093e\u0930\u093f\u0915\u093e',
  'CU': '\u0915\u094d\u092f\u0942\u092c\u093e',
  'CW': '\u0915\u094d\u092f\u0942\u0930\u093e\u0938\u093e\u0913',
  'CX': '\u0915\u094d\u0930\u093f\u0938\u092e\u0938 \u0926\u094d\u0935\u0940\u092a',
  'HR': '\u0915\u094d\u0930\u094b\u090f\u0936\u093f\u092f\u093e',
  'GG': '\u0917\u0930\u094d\u0928\u0938\u0940',
  'GM': '\u0917\u093e\u092e\u094d\u092c\u093f\u092f\u093e',
  'GN': '\u0917\u093f\u0928\u0940',
  'GW': '\u0917\u093f\u0928\u0940-\u092c\u093f\u0938\u093e\u0909',
  'GU': '\u0917\u0941\u0906\u092e',
  'GY': '\u0917\u0941\u092f\u093e\u0928\u093e',
  'GA': '\u0917\u0948\u092c\u0949\u0928',
  'GL': '\u0917\u094d\u0930\u0940\u0928\u0932\u0948\u0902\u0921',
  'GD': '\u0917\u094d\u0930\u0947\u0928\u093e\u0921\u093e',
  'GT': '\u0917\u094d\u0935\u093e\u091f\u0947\u092e\u093e\u0932\u093e',
  'GP': '\u0917\u094d\u0935\u093e\u0921\u0947\u0932\u0942\u092a',
  'GH': '\u0918\u093e\u0928\u093e',
  'TD': '\u091a\u093e\u0921',
  'CL': '\u091a\u093f\u0932\u0940',
  'CN': '\u091a\u0940\u0928',
  'CZ': '\u091a\u0947\u0915\u093f\u092f\u093e',
  'JM': '\u091c\u092e\u0948\u0915\u093e',
  'DE': '\u091c\u0930\u094d\u092e\u0928\u0940',
  'JE': '\u091c\u0930\u094d\u0938\u0940',
  'JP': '\u091c\u093e\u092a\u093e\u0928',
  'ZM': '\u091c\u093c\u093e\u092e\u094d\u092c\u093f\u092f\u093e',
  'DJ': '\u091c\u093f\u092c\u0942\u0924\u0940',
  'GI': '\u091c\u093f\u092c\u094d\u0930\u093e\u0932\u094d\u091f\u0930',
  'ZW': '\u091c\u093c\u093f\u092e\u094d\u092c\u093e\u092c\u094d\u0935\u0947',
  'GE': '\u091c\u0949\u0930\u094d\u091c\u093f\u092f\u093e',
  'JO': '\u091c\u0949\u0930\u094d\u0921\u0928',
  'TO': '\u091f\u094b\u0902\u0917\u093e',
  'TG': '\u091f\u094b\u0917\u094b',
  'TN': '\u091f\u094d\u092f\u0942\u0928\u0940\u0936\u093f\u092f\u093e',
  'TA': '\u091f\u094d\u0930\u093f\u0938\u094d\u091f\u0928 \u0926\u093e \u0915\u0941\u0928\u093e',
  'DG': '\u0921\u093f\u090f\u0917\u094b \u0917\u093e\u0930\u094d\u0938\u093f\u092f\u093e',
  'DK': '\u0921\u0947\u0928\u092e\u093e\u0930\u094d\u0915',
  'DO': '\u0921\u094b\u092e\u093f\u0928\u093f\u0915\u0928 \u0917\u0923\u0930\u093e\u091c\u094d\u092f',
  'DM': '\u0921\u094b\u092e\u093f\u0928\u093f\u0915\u093e',
  'TZ': '\u0924\u0902\u091c\u093c\u093e\u0928\u093f\u092f\u093e',
  'TW': '\u0924\u093e\u0907\u0935\u093e\u0928',
  'TJ': '\u0924\u093e\u091c\u093c\u093f\u0915\u093f\u0938\u094d\u0924\u093e\u0928',
  'TL': '\u0924\u093f\u092e\u094b\u0930-\u0932\u0947\u0938\u094d\u0924',
  'TC': '\u0924\u0941\u0930\u094d\u0915 \u0914\u0930 \u0915\u0948\u0915\u094b\u091c\u093c \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'TM': '\u0924\u0941\u0930\u094d\u0915\u092e\u0947\u0928\u093f\u0938\u094d\u0924\u093e\u0928',
  'TR': '\u0924\u0941\u0930\u094d\u0915\u0940',
  'TV': '\u0924\u0941\u0935\u093e\u0932\u0942',
  'TK': '\u0924\u094b\u0915\u0947\u0932\u093e\u0909',
  'TT': '\u0924\u094d\u0930\u093f\u0928\u093f\u0926\u093e\u0926 \u0914\u0930 \u091f\u094b\u092c\u0948\u0917\u094b',
  'TH': '\u0925\u093e\u0908\u0932\u0948\u0902\u0921',
  'ZA': '\u0926\u0915\u094d\u0937\u093f\u0923 \u0905\u092b\u093c\u094d\u0930\u0940\u0915\u093e',
  'KR': '\u0926\u0915\u094d\u0937\u093f\u0923 \u0915\u094b\u0930\u093f\u092f\u093e',
  'GS': '\u0926\u0915\u094d\u0937\u093f\u0923 \u091c\u0949\u0930\u094d\u091c\u093f\u092f\u093e \u0914\u0930 \u0926\u0915\u094d\u0937\u093f\u0923 \u0938\u0948\u0902\u0921\u0935\u093f\u091a \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'SS': '\u0926\u0915\u094d\u0937\u093f\u0923 \u0938\u0942\u0921\u093e\u0928',
  'NE': '\u0928\u093e\u0907\u091c\u0930',
  'NG': '\u0928\u093e\u0907\u091c\u0940\u0930\u093f\u092f\u093e',
  'NR': '\u0928\u093e\u0909\u0930\u0941',
  'NA': '\u0928\u093e\u092e\u0940\u092c\u093f\u092f\u093e',
  'NI': '\u0928\u093f\u0915\u093e\u0930\u093e\u0917\u0941\u0906',
  'NL': '\u0928\u0940\u0926\u0930\u0932\u0948\u0902\u0921',
  'NU': '\u0928\u0940\u092f\u0942',
  'NP': '\u0928\u0947\u092a\u093e\u0932',
  'NF': '\u0928\u0949\u0930\u092b\u093c\u0949\u0915 \u0926\u094d\u0935\u0940\u092a',
  'NO': '\u0928\u0949\u0930\u094d\u0935\u0947',
  'NC': '\u0928\u094d\u092f\u0942 \u0915\u0948\u0932\u0947\u0921\u094b\u0928\u093f\u092f\u093e',
  'NZ': '\u0928\u094d\u092f\u0942\u091c\u093c\u0940\u0932\u0948\u0902\u0921',
  'PA': '\u092a\u0928\u093e\u092e\u093e',
  'PY': '\u092a\u0930\u093e\u0917\u094d\u0935\u0947',
  'PW': '\u092a\u0932\u093e\u090a',
  'EH': '\u092a\u0936\u094d\u091a\u093f\u092e\u0940 \u0938\u0939\u093e\u0930\u093e',
  'PK': '\u092a\u093e\u0915\u093f\u0938\u094d\u0924\u093e\u0928',
  'PG': '\u092a\u093e\u092a\u0941\u0906 \u0928\u094d\u092f\u0942 \u0917\u093f\u0928\u0940',
  'PN': '\u092a\u093f\u091f\u0915\u0948\u0930\u094d\u0928 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'PT': '\u092a\u0941\u0930\u094d\u0924\u0917\u093e\u0932',
  'PE': '\u092a\u0947\u0930\u0942',
  'PR': '\u092a\u094b\u0930\u094d\u091f\u094b \u0930\u093f\u0915\u094b',
  'PL': '\u092a\u094b\u0932\u0948\u0902\u0921',
  'FJ': '\u092b\u093c\u093f\u091c\u0940',
  'FI': '\u092b\u093c\u093f\u0928\u0932\u0948\u0902\u0921',
  'PH': '\u092b\u093c\u093f\u0932\u093f\u092a\u0940\u0902\u0938',
  'PS': '\u092b\u093c\u093f\u0932\u093f\u0938\u094d\u0924\u0940\u0928\u0940 \u0915\u094d\u0937\u0947\u0924\u094d\u0930',
  'FO': '\u092b\u093c\u0947\u0930\u094b \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'FK': '\u092b\u093c\u0949\u0915\u0932\u0948\u0902\u0921 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'FR': '\u092b\u093c\u094d\u0930\u093e\u0902\u0938',
  'TF': '\u092b\u093c\u094d\u0930\u093e\u0902\u0938\u0940\u0938\u0940 \u0926\u0915\u094d\u0937\u093f\u0923\u0940 \u0915\u094d\u0937\u0947\u0924\u094d\u0930',
  'GF': '\u092b\u093c\u094d\u0930\u0947\u0902\u091a \u0917\u0941\u092f\u093e\u0928\u093e',
  'PF': '\u092b\u093c\u094d\u0930\u0947\u0902\u091a \u092a\u094b\u0932\u093f\u0928\u0947\u0936\u093f\u092f\u093e',
  'BM': '\u092c\u0930\u092e\u0942\u0921\u093e',
  'BH': '\u092c\u0939\u0930\u0940\u0928',
  'BS': '\u092c\u0939\u093e\u092e\u093e\u0938',
  'BD': '\u092c\u093e\u0902\u0917\u094d\u0932\u093e\u0926\u0947\u0936',
  'BB': '\u092c\u093e\u0930\u092c\u093e\u0921\u094b\u0938',
  'BI': '\u092c\u0941\u0930\u0941\u0902\u0921\u0940',
  'BF': '\u092c\u0941\u0930\u094d\u0915\u093f\u0928\u093e \u092b\u093c\u093e\u0938\u094b',
  'BG': '\u092c\u0941\u0932\u094d\u0917\u093e\u0930\u093f\u092f\u093e',
  'BJ': '\u092c\u0947\u0928\u093f\u0928',
  'BY': '\u092c\u0947\u0932\u093e\u0930\u0942\u0938',
  'BZ': '\u092c\u0947\u0932\u0940\u091c\u093c',
  'BE': '\u092c\u0947\u0932\u094d\u091c\u093f\u092f\u092e',
  'BW': '\u092c\u094b\u0924\u094d\u0938\u094d\u0935\u093e\u0928\u093e',
  'BO': '\u092c\u094b\u0932\u0940\u0935\u093f\u092f\u093e',
  'BA': '\u092c\u094b\u0938\u094d\u0928\u093f\u092f\u093e \u0914\u0930 \u0939\u0930\u094d\u091c\u093c\u0947\u0917\u094b\u0935\u093f\u0928\u093e',
  'BR': '\u092c\u094d\u0930\u093e\u091c\u093c\u0940\u0932',
  'VG': '\u092c\u094d\u0930\u093f\u091f\u093f\u0936 \u0935\u0930\u094d\u091c\u093f\u0928 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'IO': '\u092c\u094d\u0930\u093f\u091f\u093f\u0936 \u0939\u093f\u0902\u0926 \u092e\u0939\u093e\u0938\u093e\u0917\u0930\u0940\u092f \u0915\u094d\u0937\u0947\u0924\u094d\u0930',
  'BN': '\u092c\u094d\u0930\u0942\u0928\u0947\u0908',
  'IN': '\u092d\u093e\u0930\u0924',
  'BT': '\u092d\u0942\u091f\u093e\u0928',
  'MN': '\u092e\u0902\u0917\u094b\u0932\u093f\u092f\u093e',
  'MK': '\u092e\u0915\u0926\u0942\u0928\u093f\u092f\u093e',
  'MO': '\u092e\u0915\u093e\u090a (\u0935\u093f\u0936\u0947\u0937 \u092a\u094d\u0930\u0936\u093e\u0938\u0928\u093f\u0915 \u0915\u094d\u0937\u0947\u0924\u094d\u0930 \u091a\u0940\u0928)',
  'CF': '\u092e\u0927\u094d\u092f \u0905\u092b\u093c\u094d\u0930\u0940\u0915\u0940 \u0917\u0923\u0930\u093e\u091c\u094d\u092f',
  'MW': '\u092e\u0932\u093e\u0935\u0940',
  'MY': '\u092e\u0932\u0947\u0936\u093f\u092f\u093e',
  'FM': '\u092e\u093e\u0907\u0915\u094d\u0930\u094b\u0928\u0947\u0936\u093f\u092f\u093e',
  'YT': '\u092e\u093e\u092f\u094b\u0924\u0947',
  'MQ': '\u092e\u093e\u0930\u094d\u091f\u0940\u0928\u093f\u0915',
  'MH': '\u092e\u093e\u0930\u094d\u0936\u0932 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'MV': '\u092e\u093e\u0932\u0926\u0940\u0935',
  'ML': '\u092e\u093e\u0932\u0940',
  'MT': '\u092e\u093e\u0932\u094d\u091f\u093e',
  'EG': '\u092e\u093f\u0938\u094d\u0930',
  'MG': '\u092e\u0947\u0921\u093e\u0917\u093e\u0938\u094d\u0915\u0930',
  'MX': '\u092e\u0948\u0915\u094d\u0938\u093f\u0915\u094b',
  'MR': '\u092e\u0949\u0930\u093f\u091f\u093e\u0928\u093f\u092f\u093e',
  'MU': '\u092e\u0949\u0930\u0940\u0936\u0938',
  'MD': '\u092e\u0949\u0932\u094d\u0921\u094b\u0935\u093e',
  'MS': '\u092e\u094b\u0902\u091f\u0938\u0947\u0930\u093e\u0924',
  'ME': '\u092e\u094b\u0902\u091f\u0947\u0928\u0947\u0917\u094d\u0930\u094b',
  'MZ': '\u092e\u094b\u091c\u093c\u093e\u0902\u092c\u093f\u0915',
  'MC': '\u092e\u094b\u0928\u093e\u0915\u094b',
  'MA': '\u092e\u094b\u0930\u0915\u094d\u0915\u094b',
  'MM': '\u092e\u094d\u092f\u093e\u0902\u092e\u093e\u0930 (\u092c\u0930\u094d\u092e\u093e)',
  'YE': '\u092f\u092e\u0928',
  'UG': '\u092f\u0941\u0917\u093e\u0902\u0921\u093e',
  'UM': '\u092f\u0942\u0970\u090f\u0938\u0970 \u0906\u0909\u091f\u0932\u093e\u0907\u0902\u0917 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'VI': '\u092f\u0942\u0970\u090f\u0938\u0970 \u0935\u0930\u094d\u091c\u093f\u0928 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'UA': '\u092f\u0942\u0915\u094d\u0930\u0947\u0928',
  'GB': '\u092f\u0942\u0928\u093e\u0907\u091f\u0947\u0921 \u0915\u093f\u0902\u0917\u0921\u092e',
  'GR': '\u092f\u0942\u0928\u093e\u0928',
  'RW': '\u0930\u0935\u093e\u0902\u0921\u093e',
  'RE': '\u0930\u093f\u092f\u0942\u0928\u093f\u092f\u0928',
  'RU': '\u0930\u0942\u0938',
  'RO': '\u0930\u094b\u092e\u093e\u0928\u093f\u092f\u093e',
  'LU': '\u0932\u0917\u094d\u091c\u093c\u092e\u092c\u0930\u094d\u0917',
  'LR': '\u0932\u093e\u0907\u092c\u0947\u0930\u093f\u092f\u093e',
  'LA': '\u0932\u093e\u0913\u0938',
  'LV': '\u0932\u093e\u0924\u0935\u093f\u092f\u093e',
  'LI': '\u0932\u093f\u091a\u0947\u0902\u0938\u094d\u091f\u0940\u0928',
  'LT': '\u0932\u093f\u0925\u0941\u0906\u0928\u093f\u092f\u093e',
  'LY': '\u0932\u0940\u092c\u093f\u092f\u093e',
  'LB': '\u0932\u0947\u092c\u0928\u093e\u0928',
  'LS': '\u0932\u0947\u0938\u094b\u0925\u094b',
  'VU': '\u0935\u0928\u0941\u0906\u0924\u0942',
  'WF': '\u0935\u093e\u0932\u093f\u0938 \u0914\u0930 \u092b\u093c\u094d\u092f\u0942\u091a\u0942\u0928\u093e',
  'VN': '\u0935\u093f\u092f\u0924\u0928\u093e\u092e',
  'VA': '\u0935\u0947\u091f\u093f\u0915\u0928 \u0938\u093f\u091f\u0940',
  'VE': '\u0935\u0947\u0928\u0947\u091c\u093c\u0941\u090f\u0932\u093e',
  'LK': '\u0936\u094d\u0930\u0940\u0932\u0902\u0915\u093e',
  'AE': '\u0938\u0902\u092f\u0941\u0915\u094d\u0924 \u0905\u0930\u092c \u0905\u092e\u0940\u0930\u093e\u0924',
  'US': '\u0938\u0902\u092f\u0941\u0915\u094d\u0924 \u0930\u093e\u091c\u094d\u092f',
  'SA': '\u0938\u090a\u0926\u0940 \u0905\u0930\u092c',
  'WS': '\u0938\u092e\u094b\u0906',
  'RS': '\u0938\u0930\u094d\u092c\u093f\u092f\u093e',
  'CY': '\u0938\u093e\u0907\u092a\u094d\u0930\u0938',
  'ST': '\u0938\u093e\u0913 \u091f\u094b\u092e \u0914\u0930 \u092a\u094d\u0930\u093f\u0902\u0938\u093f\u092a\u0947',
  'SG': '\u0938\u093f\u0902\u0917\u093e\u092a\u0941\u0930',
  'SX': '\u0938\u093f\u0902\u091f \u092e\u093e\u0930\u094d\u091f\u093f\u0928',
  'SL': '\u0938\u093f\u090f\u0930\u093e \u0932\u093f\u092f\u094b\u0928',
  'SY': '\u0938\u0940\u0930\u093f\u092f\u093e',
  'SD': '\u0938\u0942\u0921\u093e\u0928',
  'SR': '\u0938\u0942\u0930\u0940\u0928\u093e\u092e',
  'KN': '\u0938\u0947\u0902\u091f \u0915\u093f\u091f\u094d\u0938 \u0914\u0930 \u0928\u0947\u0935\u093f\u0938',
  'PM': '\u0938\u0947\u0902\u091f \u092a\u093f\u090f\u0930\u0947 \u0914\u0930 \u092e\u093f\u0915\u094d\u0935\u0947\u0932\u093e\u0928',
  'BL': '\u0938\u0947\u0902\u091f \u092c\u093e\u0930\u094d\u0925\u0947\u0932\u0947\u092e\u0940',
  'MF': '\u0938\u0947\u0902\u091f \u092e\u093e\u0930\u094d\u091f\u093f\u0928',
  'LC': '\u0938\u0947\u0902\u091f \u0932\u0942\u0938\u093f\u092f\u093e',
  'VC': '\u0938\u0947\u0902\u091f \u0935\u093f\u0902\u0938\u0947\u0902\u091f \u0914\u0930 \u0917\u094d\u0930\u0947\u0928\u093e\u0921\u093e\u0907\u0902\u0938',
  'SH': '\u0938\u0947\u0902\u091f \u0939\u0947\u0932\u0947\u0928\u093e',
  'EA': '\u0938\u0947\u0909\u091f\u093e \u0914\u0930 \u092e\u0947\u0932\u093f\u0932\u093e',
  'SN': '\u0938\u0947\u0928\u0947\u0917\u0932',
  'SC': '\u0938\u0947\u0936\u0947\u0932\u094d\u0938',
  'SM': '\u0938\u0948\u0928 \u092e\u0947\u0930\u0940\u0928\u094b',
  'SO': '\u0938\u094b\u092e\u093e\u0932\u093f\u092f\u093e',
  'SB': '\u0938\u094b\u0932\u094b\u092e\u0928 \u0926\u094d\u0935\u0940\u092a\u0938\u092e\u0942\u0939',
  'ES': '\u0938\u094d\u092a\u0947\u0928',
  'SK': '\u0938\u094d\u0932\u094b\u0935\u093e\u0915\u093f\u092f\u093e',
  'SI': '\u0938\u094d\u0932\u094b\u0935\u0947\u0928\u093f\u092f\u093e',
  'SZ': '\u0938\u094d\u0935\u093e\u091c\u093c\u0940\u0932\u0948\u0902\u0921',
  'SJ': '\u0938\u094d\u0935\u093e\u0932\u092c\u093e\u0930\u094d\u0921 \u0914\u0930 \u091c\u093e\u0928 \u092e\u093e\u092f\u0947\u0928',
  'CH': '\u0938\u094d\u0935\u093f\u091f\u094d\u091c\u093c\u0930\u0932\u0948\u0902\u0921',
  'SE': '\u0938\u094d\u0935\u0940\u0921\u0928',
  'HU': '\u0939\u0902\u0917\u0930\u0940',
  'HK': '\u0939\u093e\u0901\u0917 \u0915\u093e\u0901\u0917 (\u091a\u0940\u0928 \u0935\u093f\u0936\u0947\u0937 \u092a\u094d\u0930\u0936\u093e\u0938\u0928\u093f\u0915 \u0915\u094d\u0937\u0947\u0924\u094d\u0930)',
  'HT': '\u0939\u0948\u0924\u0940',
  'HN': '\u0939\u094b\u0902\u0921\u0942\u0930\u093e\u0938',
  'XA': 'Pseudo-Accents',
  'XB': 'Pseudo-Bidi'
});

/***/ }),

/***/ "lbSo":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ITextEditorIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("xXl2");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ITextEditorIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ITextEditorIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ITextEditorIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "lhJi":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("P0qE");


/* harmony default export */ __webpack_exports__["a"] = ({
  getFormPaymentAnswers(formId, paymentId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var result = {
        success: false
      };
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('formpayment/answers/' + formId + '/' + paymentId);

      if (apiResult) {
        if (apiResult.status === 200) {
          result.success = true;

          if (apiResult.data) {
            result.data = apiResult.data;
          }
        }
      }

      return result;
    })();
  },

  getPayments(limit, skip) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('formpayment?skip=' + skip + '&limit=' + limit);
      var result = {
        success: false
      };

      if (apiResult.status === 200) {
        result.success = true;
        result.data = apiResult.response ? apiResult.response.data : apiResult.data;
      } else {
        result.errors = apiResult.response ? apiResult.response.data : apiResult.data;
      }

      return result;
    })();
  },

  getPayment(id) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('formpayment/detail/' + id);
      var result = {
        success: false
      };

      if (apiResult.status === 200) {
        result.success = true;
        result.data = apiResult.response ? apiResult.response.data : apiResult.data;
      } else {
        result.errors = apiResult.response ? apiResult.response.data : apiResult.data;
      }

      return result;
    })();
  },

  checkQuestionsHasGatewayOptions(formId, questionId, gatewayType, callback) {
    _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('formpayment/checkquestionshasgatewayoptions/' + gatewayType + '/' + formId + '/' + questionId, null, function (apiResult) {
      callback(apiResult.status === 200 && apiResult.data && apiResult.data.has);
    });
  },

  setQuestionGatewayOptions(formId, questionId, gatewayOptions, gatewayType) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('formpayment/gatewayoptions/' + gatewayType + '/' + formId + '/' + questionId, gatewayOptions);
      var result = {
        success: false
      };

      if (apiResult.status === 204) {
        result.success = true;
      }

      return result;
    })();
  },

  addUserMerchant(saveModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('formpayment/usermerchant', saveModel);
      var result = {
        success: false
      };

      if (apiResult.status === 200) {
        result.success = true;
        result.payload = apiResult.data;
      } else {
        result.errors = apiResult.data;
      }

      return result;
    })();
  },

  getUserMerchant(gateway) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].get('formpayment/usermerchant/' + gateway);
      var result;

      if (apiResult.status === 200) {
        result = apiResult.data;
      }

      return result;
    })();
  },

  formPaymentFaild(formId, paymentId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].put('formpayment/faild/' + formId + '/' + paymentId);
    })();
  }

});

/***/ }),

/***/ "lnx7":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/components/PathErrorComponent.vue?vue&type=template&id=30bcf6ec&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("section", { attrs: { id: "general-content" } }, [
    _c("div", { staticClass: "intermediate-page not-founds" }, [
      _c("div", { staticClass: "intermediate-elements" }, [
        _c("img", { attrs: { src: "/static/img/404.png", alt: "" } }),
        _vm._v(" "),
        _c("h3", [
          _vm._v(
            _vm._s(_vm.$root.pageNotFoundMessage || _vm.$t("howDidYouComeHere"))
          )
        ])
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/components/PathErrorComponent.vue?vue&type=template&id=30bcf6ec&scoped=true&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/components/PathErrorComponent.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ var PathErrorComponentvue_type_script_lang_js_ = ({
  name: 'PathErrorComponent'
});
// CONCATENATED MODULE: ./src/components/PathErrorComponent.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_PathErrorComponentvue_type_script_lang_js_ = (PathErrorComponentvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/PathErrorComponent.vue?vue&type=style&index=0&id=30bcf6ec&lang=scss&scoped=true&
var PathErrorComponentvue_type_style_index_0_id_30bcf6ec_lang_scss_scoped_true_ = __webpack_require__("BMJk");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/components/PathErrorComponent.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_PathErrorComponentvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "30bcf6ec",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/components/PathErrorComponent.vue"
/* harmony default export */ var PathErrorComponent = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "luLf":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("mSNy");

var errorEnumsLangLabelKeys = {
  // BOF AUTH
  'auth.1': 'errorEnums.anErrorOccurred',
  'auth.2': 'errorEnums.IDIsWrong',
  'auth.101': 'errorEnums.validationFailed',
  'auth.103': 'errorEnums.invalidModel',
  'auth.104': 'errorEnums.emptyModel',
  'auth.107': 'wrongValue',
  'auth.201': 'errorEnums.fieldIsRequired',
  'auth.205': 'errorEnums.userIDIsWrong',
  'auth.206': 'errorEnums.userNotFound',
  'auth.301': 'errorEnums.invalidCredentials',
  'auth.302': 'errorEnums.emailIsNotValid',
  'auth.303': 'errorEnums.passwordMustBeMinCharacters',
  'auth.304': 'errorEnums.emailAlreadyExists',
  'auth.305': 'errorEnums.unknownAuthanticationProvider',
  'auth.306': 'errorEnums.invalidAuthanticationProviderAccessToken',
  'auth.307': 'errorEnums.currentPasswordIsWrong',
  'auth.308': 'errorEnums.pleaseRequestNewPasswordAgain',
  'auth.309': 'errorEnums.emailIsAlreadyConfirmed',
  'auth.310': 'errorEnums.currentEmailIsSameAsNewEmailAddress',
  'auth.311': 'errorEnums.usernameMustBeOnlyNumbersOr',
  'auth.312': 'errorEnums.theUsernameMustBeMinMaxCharactersLong',
  'auth.313': 'errorEnums.usernameAlreadyExists',
  'auth.314': 'errorEnums.theEmailMustBeMinMaxCharactersLong',
  'auth.315': 'errorEnums.theFullnameMustBeMinMaxCharactersLong',
  'auth.316': 'errorEnums.genericWrong',
  'auth.401': 'errorEnums.couldNotBeSavedPleaseTryAgain',
  // EOF AUTH
  // BOF USER
  'user.101': 'errorEnums.validationFailed',
  'user.103': 'errorEnums.invalidModel',
  'user.104': 'errorEnums.emptyModel',
  'user.201': 'errorEnums.fieldIsRequired',
  'user.205': 'errorEnums.userIDIsWrong',
  'user.206': 'errorEnums.userNotFound',
  // EOF USER
  // BOF QUOTA
  'quota.2': 'errorEnums.IDIsWrong',
  'quota.103': 'errorEnums.invalidModel',
  'quota.105': 'wrongValue',
  'quota.107': 'errorEnums.packageIsAlreadySelected',
  'quota.201': 'errorEnums.fieldIsRequired',
  'quota.301': 'errorEnums.youReachedFormViewLimit',
  'quota.302': 'errorEnums.youReachedRecordLimit',
  'quota.401': 'errorEnums.couldNotBeSavedPleaseTryAgain',
  // EOF QUOTA
  // BOF ANSWER
  'answer.101': 'errorEnums.downloadRecordsYouCanRequestNewEmailMinutes',
  // EOF ANSWER
  // BOF PAYMENT
  'payment.1': 'errorEnums.anErrorOccurred',
  'payment.101': 'errorEnums.unknownGatewayType',
  'payment.102': 'errorEnums.thisGatewayTypeIsNotAvailable',
  'payment.103': 'errorEnums.invalidData',
  'payment.201': 'errorEnums.thePaymentCouldNotBeSaved',
  'payment.202': 'errorEnums.thePaymentCouldNotBeUpdated',
  'payment.203': 'errorEnums.paymetGatewaySystemError',
  // EOF PAYMENT
  // BOF FORMBUILDER
  'formbuilder.500': 'errorEnums.validationFailed',
  'formbuilder.510': 'errorEnums.formTitleMustBeMinCharacters',
  'formbuilder.511': 'errorEnums.eachFormCanHaveMaxQuestions',
  'formbuilder.513': 'errorEnums.anErrorOccurred',
  // EOF FORM BUILDER
  // BOF QUESTIONTYPES
  'questionTypes.1': 'errorEnums.validationFailed',
  'questionTypes.101': 'errorEnums.youCanNotPostEmptyFormId',
  'questionTypes.102': 'errorEnums.wrongFormId',
  'questionTypes.103': 'errorEnums.wrongQuestionId',
  'questionTypes.104': 'errorEnums.youCanNotPostEmptyFormQuestions',
  'questionTypes.105': 'errorEnums.wrongFormQuestions',
  'questionTypes.106': 'errorEnums.eachFormMaxQuestionPB',
  'questionTypes.107': 'errorEnums.eachFormMaxQuestionPayment',
  'questionTypes.201': 'errorEnums.youCannotPostEmptyModel',
  'questionTypes.202': 'errorEnums.youCannotPostEmptyAnswer',
  'questionTypes.203': 'errorEnums.wrongAnswer',
  'questionTypes.301': 'errorEnums.fieldIsRequired',
  'questionTypes.302': 'errorEnums.questionNotMatchFormsQuestions',
  'questionTypes.303': 'errorEnums.unknownQuestionType',
  'questionTypes.304': 'errorEnums.textIsTooLong',
  'questionTypes.305': 'errorEnums.textIsTooShort',
  'questionTypes.306': 'errorEnums.emailIsNotValid',
  'questionTypes.307': 'errorEnums.dateIsNotValid',
  'questionTypes.308': 'wrongValue',
  'questionTypes.309': 'errorEnums.repeatedChoice',
  'questionTypes.310': 'errorEnums.numberIsNotInRange',
  'questionTypes.311': 'errorEnums.numberIsSmallerThanMinimumValue',
  'questionTypes.312': 'errorEnums.numberIsGreaterThanMaximumValue',
  'questionTypes.313': 'errorEnums.numberIsSmallerThanZero',
  'questionTypes.314': 'errorEnums.questionCanHaveMaxOptions',
  'questionTypes.315': 'errorEnums.questionCanHaveMaxProducts',
  'questionTypes.316': 'errorEnums.questionCanHaveMaxProductVariants',
  'questionTypes.317': 'errorEnums.questionCanHaveMaxProductVariantOptions',
  'questionTypes.318': 'errorEnums.optionForVariationIsRequired',
  'questionTypes.319': 'errorEnums.questionCanHaveMaxTags',
  'questionTypes.320': 'errorEnums.productUnitIsRequired',
  'questionTypes.321': 'errorEnums.youCannotOrderThisProductNow',
  'questionTypes.322': 'errorEnums.youCanOrderMaximumProduct',
  'questionTypes.323': 'errorEnums.youCanDefineMaximumCategoriesPB',
  'questionTypes.324': 'errorEnums.youCanDefineMaximumSubCategorie',
  'questionTypes.325': 'errorEnums.youCanAssignMaximumCategories',
  'questionTypes.326': 'errorEnums.youCanOnlyDefineSubCategories',
  'questionTypes.330': 'errorEnums.pleaseFillAllTheFields',
  'questionTypes.331': 'errorEnums.youCanAddMaximumImageProduct',
  'questionTypes.351': 'errorEnums.questionMaxRow',
  'questionTypes.352': 'errorEnums.questionMaxCloumn',
  'questionTypes.10105': 'creditCardNotCharged',
  // EOF QUESTIONTYPES
  // BOF MAIL
  'mail.1': 'wrongModel' // EOF MAIL

};
/* harmony default export */ __webpack_exports__["a"] = (function (key, params) {
  return _lang__WEBPACK_IMPORTED_MODULE_0__["default"].t(errorEnumsLangLabelKeys[key], params);
});
;

/***/ }),

/***/ "m4OE":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("gNIQ");

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

/***/ "mSNy":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getLanguages", function() { return getLanguages; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "loadLanguageAsync", function() { return loadLanguageAsync; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getSupportedLanguages", function() { return getSupportedLanguages; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getActiveLanguage", function() { return getActiveLanguage; });
/* harmony import */ var core_js_modules_es_promise__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("5s+n");
/* harmony import */ var core_js_modules_es_promise__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_promise__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_string_includes__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("JTJg");
/* harmony import */ var core_js_modules_es_string_includes__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_includes__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var config__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("NRfZ");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("oCYn");
/* harmony import */ var vue_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("qSUR");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__("vDqi");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _helpers_cookieHelper__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__("x/hz");







vue__WEBPACK_IMPORTED_MODULE_3__["default"].use(vue_i18n__WEBPACK_IMPORTED_MODULE_4__[/* default */ "a"]);
var supportedLanguages = config__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].getLangs().map(x => x.value);
var browserLang = (window.navigator.userLanguage || window.navigator.language).substring(0, 2);
var lang = (_helpers_cookieHelper__WEBPACK_IMPORTED_MODULE_6__[/* default */ "a"].readOne('language') && supportedLanguages.includes(_helpers_cookieHelper__WEBPACK_IMPORTED_MODULE_6__[/* default */ "a"].readOne('language')) ? _helpers_cookieHelper__WEBPACK_IMPORTED_MODULE_6__[/* default */ "a"].readOne('language') : '') || (supportedLanguages.includes(browserLang) ? browserLang : 'en');
var loadedLanguages = [];
var i18n = new vue_i18n__WEBPACK_IMPORTED_MODULE_4__[/* default */ "a"]({
  silentTranslationWarn: true
});
function getLanguages() {
  return config__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].getLangs();
} // async function setDefaultLanguage (lang) {
// 	if (!loadedLanguages.includes(lang)) {
// 		const messages = await import(/* webp ackChunkName: "lang-[request]" */ `@/lang/${lang}`);
// 		i18n.setLocaleMessage(lang, messages);
// 		loadedLanguages.push(lang);
// 		return setI18nLanguage(lang);
// 	}
// };

function setDefaultLanguage(lang) {
  if (!loadedLanguages.includes(lang)) {
    __webpack_require__("WJJf")("./".concat(lang)).then(msgs => {
      i18n.setLocaleMessage(lang, msgs.default);
      loadedLanguages.push(lang);
      setI18nLanguage(lang);
    });
  }
}

;

function setI18nLanguage(lang) {
  i18n.locale = lang;
  axios__WEBPACK_IMPORTED_MODULE_5___default.a.defaults.headers.common['Accept-Language'] = lang;
  document.querySelector('html').setAttribute('lang', lang);
  _helpers_cookieHelper__WEBPACK_IMPORTED_MODULE_6__[/* default */ "a"].createCookie('language', lang, 365);
  return lang;
}

;
setDefaultLanguage(lang);
function loadLanguageAsync(lang) {
  if (i18n.locale !== lang) {
    if (!loadedLanguages.includes(lang)) {
      return __webpack_require__("WJJf")("./".concat(lang)).then(msgs => {
        i18n.setLocaleMessage(lang, msgs.default);
        loadedLanguages.push(lang);
        return setI18nLanguage(lang);
      });
    }

    return Promise.resolve(setI18nLanguage(lang));
  }

  return Promise.resolve(lang);
}
function getSupportedLanguages() {
  return supportedLanguages;
}
function getActiveLanguage() {
  return lang;
}
/* harmony default export */ __webpack_exports__["default"] = (i18n);

/***/ }),

/***/ "n3VK":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("mSNy");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("Gppw");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(bson_objectid__WEBPACK_IMPORTED_MODULE_2__);



/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'opinionscale',
  displayName: 'OpinionScale',
  parentType: 'choice',
  displayOnToolbox: true,
  displayIconHTML: 'steps',
  active: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].choice,
  componentDefaults: function componentDefaults() {
    return {
      questionType: 'choice',
      question: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.typeYourQuestionHere'),
      displayOrder: 0,
      isRequired: false,
      isDeleted: false,
      isActive: false,
      choice: {
        subType: 'opinionscale',
        other: false,
        optionText: '',
        options: [{
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: '1'
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: '2'
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: '3'
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: '4'
        }, {
          _id: bson_objectid__WEBPACK_IMPORTED_MODULE_2___default()().str,
          text: '5'
        }],
        defaultValue: []
      }
    };
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.choice.defaultValue[0] || '';
  }
});

/***/ }),

/***/ "pbPK":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'component',
  data: function data() {
    return {
      localTabIndex: 0
    };
  },
  created: function created() {
    this.localTabIndex = 0;
  }
});

/***/ }),

/***/ "q4hb":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  'AU': '\u0410\u0432\u0441\u0442\u0440\u0430\u043b\u0438\u044f',
  'AT': '\u0410\u0432\u0441\u0442\u0440\u0438\u044f',
  'AZ': '\u0410\u0437\u0435\u0440\u0431\u0430\u0439\u0434\u0436\u0430\u043d',
  'AX': '\u0410\u043b\u0430\u043d\u0434\u0441\u043a\u0438\u0435 \u043e-\u0432\u0430',
  'AL': '\u0410\u043b\u0431\u0430\u043d\u0438\u044f',
  'DZ': '\u0410\u043b\u0436\u0438\u0440',
  'AS': '\u0410\u043c\u0435\u0440\u0438\u043a\u0430\u043d\u0441\u043a\u043e\u0435 \u0421\u0430\u043c\u043e\u0430',
  'AI': '\u0410\u043d\u0433\u0438\u043b\u044c\u044f',
  'AO': '\u0410\u043d\u0433\u043e\u043b\u0430',
  'AD': '\u0410\u043d\u0434\u043e\u0440\u0440\u0430',
  'AQ': '\u0410\u043d\u0442\u0430\u0440\u043a\u0442\u0438\u0434\u0430',
  'AG': '\u0410\u043d\u0442\u0438\u0433\u0443\u0430 \u0438 \u0411\u0430\u0440\u0431\u0443\u0434\u0430',
  'AR': '\u0410\u0440\u0433\u0435\u043d\u0442\u0438\u043d\u0430',
  'AM': '\u0410\u0440\u043c\u0435\u043d\u0438\u044f',
  'AW': '\u0410\u0440\u0443\u0431\u0430',
  'AF': '\u0410\u0444\u0433\u0430\u043d\u0438\u0441\u0442\u0430\u043d',
  'BS': '\u0411\u0430\u0433\u0430\u043c\u044b',
  'BD': '\u0411\u0430\u043d\u0433\u043b\u0430\u0434\u0435\u0448',
  'BB': '\u0411\u0430\u0440\u0431\u0430\u0434\u043e\u0441',
  'BH': '\u0411\u0430\u0445\u0440\u0435\u0439\u043d',
  'BY': '\u0411\u0435\u043b\u0430\u0440\u0443\u0441\u044c',
  'BZ': '\u0411\u0435\u043b\u0438\u0437',
  'BE': '\u0411\u0435\u043b\u044c\u0433\u0438\u044f',
  'BJ': '\u0411\u0435\u043d\u0438\u043d',
  'BM': '\u0411\u0435\u0440\u043c\u0443\u0434\u0441\u043a\u0438\u0435 \u043e-\u0432\u0430',
  'BG': '\u0411\u043e\u043b\u0433\u0430\u0440\u0438\u044f',
  'BO': '\u0411\u043e\u043b\u0438\u0432\u0438\u044f',
  'BQ': '\u0411\u043e\u043d\u044d\u0439\u0440, \u0421\u0438\u043d\u0442-\u042d\u0441\u0442\u0430\u0442\u0438\u0443\u0441 \u0438 \u0421\u0430\u0431\u0430',
  'BA': '\u0411\u043e\u0441\u043d\u0438\u044f \u0438 \u0413\u0435\u0440\u0446\u0435\u0433\u043e\u0432\u0438\u043d\u0430',
  'BW': '\u0411\u043e\u0442\u0441\u0432\u0430\u043d\u0430',
  'BR': '\u0411\u0440\u0430\u0437\u0438\u043b\u0438\u044f',
  'IO': '\u0411\u0440\u0438\u0442\u0430\u043d\u0441\u043a\u0430\u044f \u0442\u0435\u0440\u0440\u0438\u0442\u043e\u0440\u0438\u044f \u0432 \u0418\u043d\u0434\u0438\u0439\u0441\u043a\u043e\u043c \u043e\u043a\u0435\u0430\u043d\u0435',
  'BN': '\u0411\u0440\u0443\u043d\u0435\u0439-\u0414\u0430\u0440\u0443\u0441\u0441\u0430\u043b\u0430\u043c',
  'BF': '\u0411\u0443\u0440\u043a\u0438\u043d\u0430-\u0424\u0430\u0441\u043e',
  'BI': '\u0411\u0443\u0440\u0443\u043d\u0434\u0438',
  'BT': '\u0411\u0443\u0442\u0430\u043d',
  'VU': '\u0412\u0430\u043d\u0443\u0430\u0442\u0443',
  'VA': '\u0412\u0430\u0442\u0438\u043a\u0430\u043d',
  'GB': '\u0412\u0435\u043b\u0438\u043a\u043e\u0431\u0440\u0438\u0442\u0430\u043d\u0438\u044f',
  'HU': '\u0412\u0435\u043d\u0433\u0440\u0438\u044f',
  'VE': '\u0412\u0435\u043d\u0435\u0441\u0443\u044d\u043b\u0430',
  'VG': '\u0412\u0438\u0440\u0433\u0438\u043d\u0441\u043a\u0438\u0435 \u043e-\u0432\u0430 (\u0412\u0435\u043b\u0438\u043a\u043e\u0431\u0440\u0438\u0442\u0430\u043d\u0438\u044f)',
  'VI': '\u0412\u0438\u0440\u0433\u0438\u043d\u0441\u043a\u0438\u0435 \u043e-\u0432\u0430 (\u0421\u0428\u0410)',
  'UM': '\u0412\u043d\u0435\u0448\u043d\u0438\u0435 \u043c\u0430\u043b\u044b\u0435 \u043e-\u0432\u0430 (\u0421\u0428\u0410)',
  'TL': '\u0412\u043e\u0441\u0442\u043e\u0447\u043d\u044b\u0439 \u0422\u0438\u043c\u043e\u0440',
  'VN': '\u0412\u044c\u0435\u0442\u043d\u0430\u043c',
  'GA': '\u0413\u0430\u0431\u043e\u043d',
  'HT': '\u0413\u0430\u0438\u0442\u0438',
  'GY': '\u0413\u0430\u0439\u0430\u043d\u0430',
  'GM': '\u0413\u0430\u043c\u0431\u0438\u044f',
  'GH': '\u0413\u0430\u043d\u0430',
  'GP': '\u0413\u0432\u0430\u0434\u0435\u043b\u0443\u043f\u0430',
  'GT': '\u0413\u0432\u0430\u0442\u0435\u043c\u0430\u043b\u0430',
  'GN': '\u0413\u0432\u0438\u043d\u0435\u044f',
  'GW': '\u0413\u0432\u0438\u043d\u0435\u044f-\u0411\u0438\u0441\u0430\u0443',
  'DE': '\u0413\u0435\u0440\u043c\u0430\u043d\u0438\u044f',
  'GG': '\u0413\u0435\u0440\u043d\u0441\u0438',
  'GI': '\u0413\u0438\u0431\u0440\u0430\u043b\u0442\u0430\u0440',
  'HN': '\u0413\u043e\u043d\u0434\u0443\u0440\u0430\u0441',
  'HK': '\u0413\u043e\u043d\u043a\u043e\u043d\u0433 (\u0421\u0410\u0420)',
  'GD': '\u0413\u0440\u0435\u043d\u0430\u0434\u0430',
  'GL': '\u0413\u0440\u0435\u043d\u043b\u0430\u043d\u0434\u0438\u044f',
  'GR': '\u0413\u0440\u0435\u0446\u0438\u044f',
  'GE': '\u0413\u0440\u0443\u0437\u0438\u044f',
  'GU': '\u0413\u0443\u0430\u043c',
  'DK': '\u0414\u0430\u043d\u0438\u044f',
  'JE': '\u0414\u0436\u0435\u0440\u0441\u0438',
  'DJ': '\u0414\u0436\u0438\u0431\u0443\u0442\u0438',
  'DG': '\u0414\u0438\u0435\u0433\u043e-\u0413\u0430\u0440\u0441\u0438\u044f',
  'DM': '\u0414\u043e\u043c\u0438\u043d\u0438\u043a\u0430',
  'DO': '\u0414\u043e\u043c\u0438\u043d\u0438\u043a\u0430\u043d\u0441\u043a\u0430\u044f \u0420\u0435\u0441\u043f\u0443\u0431\u043b\u0438\u043a\u0430',
  'EG': '\u0415\u0433\u0438\u043f\u0435\u0442',
  'ZM': '\u0417\u0430\u043c\u0431\u0438\u044f',
  'EH': '\u0417\u0430\u043f\u0430\u0434\u043d\u0430\u044f \u0421\u0430\u0445\u0430\u0440\u0430',
  'ZW': '\u0417\u0438\u043c\u0431\u0430\u0431\u0432\u0435',
  'IL': '\u0418\u0437\u0440\u0430\u0438\u043b\u044c',
  'IN': '\u0418\u043d\u0434\u0438\u044f',
  'ID': '\u0418\u043d\u0434\u043e\u043d\u0435\u0437\u0438\u044f',
  'JO': '\u0418\u043e\u0440\u0434\u0430\u043d\u0438\u044f',
  'IQ': '\u0418\u0440\u0430\u043a',
  'IR': '\u0418\u0440\u0430\u043d',
  'IE': '\u0418\u0440\u043b\u0430\u043d\u0434\u0438\u044f',
  'IS': '\u0418\u0441\u043b\u0430\u043d\u0434\u0438\u044f',
  'ES': '\u0418\u0441\u043f\u0430\u043d\u0438\u044f',
  'IT': '\u0418\u0442\u0430\u043b\u0438\u044f',
  'YE': '\u0419\u0435\u043c\u0435\u043d',
  'CV': '\u041a\u0430\u0431\u043e-\u0412\u0435\u0440\u0434\u0435',
  'KZ': '\u041a\u0430\u0437\u0430\u0445\u0441\u0442\u0430\u043d',
  'KH': '\u041a\u0430\u043c\u0431\u043e\u0434\u0436\u0430',
  'CM': '\u041a\u0430\u043c\u0435\u0440\u0443\u043d',
  'CA': '\u041a\u0430\u043d\u0430\u0434\u0430',
  'IC': '\u041a\u0430\u043d\u0430\u0440\u0441\u043a\u0438\u0435 \u043e-\u0432\u0430',
  'QA': '\u041a\u0430\u0442\u0430\u0440',
  'KE': '\u041a\u0435\u043d\u0438\u044f',
  'CY': '\u041a\u0438\u043f\u0440',
  'KG': '\u041a\u0438\u0440\u0433\u0438\u0437\u0438\u044f',
  'KI': '\u041a\u0438\u0440\u0438\u0431\u0430\u0442\u0438',
  'CN': '\u041a\u0438\u0442\u0430\u0439',
  'KP': '\u041a\u041d\u0414\u0420',
  'CC': '\u041a\u043e\u043a\u043e\u0441\u043e\u0432\u044b\u0435 \u043e-\u0432\u0430',
  'CO': '\u041a\u043e\u043b\u0443\u043c\u0431\u0438\u044f',
  'KM': '\u041a\u043e\u043c\u043e\u0440\u044b',
  'CG': '\u041a\u043e\u043d\u0433\u043e - \u0411\u0440\u0430\u0437\u0437\u0430\u0432\u0438\u043b\u044c',
  'CD': '\u041a\u043e\u043d\u0433\u043e - \u041a\u0438\u043d\u0448\u0430\u0441\u0430',
  'XK': '\u041a\u043e\u0441\u043e\u0432\u043e',
  'CR': '\u041a\u043e\u0441\u0442\u0430-\u0420\u0438\u043a\u0430',
  'CI': '\u041a\u043e\u0442-\u0434\u2019\u0418\u0432\u0443\u0430\u0440',
  'CU': '\u041a\u0443\u0431\u0430',
  'KW': '\u041a\u0443\u0432\u0435\u0439\u0442',
  'CW': '\u041a\u044e\u0440\u0430\u0441\u0430\u043e',
  'LA': '\u041b\u0430\u043e\u0441',
  'LV': '\u041b\u0430\u0442\u0432\u0438\u044f',
  'LS': '\u041b\u0435\u0441\u043e\u0442\u043e',
  'LR': '\u041b\u0438\u0431\u0435\u0440\u0438\u044f',
  'LB': '\u041b\u0438\u0432\u0430\u043d',
  'LY': '\u041b\u0438\u0432\u0438\u044f',
  'LT': '\u041b\u0438\u0442\u0432\u0430',
  'LI': '\u041b\u0438\u0445\u0442\u0435\u043d\u0448\u0442\u0435\u0439\u043d',
  'LU': '\u041b\u044e\u043a\u0441\u0435\u043c\u0431\u0443\u0440\u0433',
  'MU': '\u041c\u0430\u0432\u0440\u0438\u043a\u0438\u0439',
  'MR': '\u041c\u0430\u0432\u0440\u0438\u0442\u0430\u043d\u0438\u044f',
  'MG': '\u041c\u0430\u0434\u0430\u0433\u0430\u0441\u043a\u0430\u0440',
  'YT': '\u041c\u0430\u0439\u043e\u0442\u0442\u0430',
  'MO': '\u041c\u0430\u043a\u0430\u043e (\u0421\u0410\u0420)',
  'MW': '\u041c\u0430\u043b\u0430\u0432\u0438',
  'MY': '\u041c\u0430\u043b\u0430\u0439\u0437\u0438\u044f',
  'ML': '\u041c\u0430\u043b\u0438',
  'MV': '\u041c\u0430\u043b\u044c\u0434\u0438\u0432\u044b',
  'MT': '\u041c\u0430\u043b\u044c\u0442\u0430',
  'MA': '\u041c\u0430\u0440\u043e\u043a\u043a\u043e',
  'MQ': '\u041c\u0430\u0440\u0442\u0438\u043d\u0438\u043a\u0430',
  'MH': '\u041c\u0430\u0440\u0448\u0430\u043b\u043b\u043e\u0432\u044b \u041e\u0441\u0442\u0440\u043e\u0432\u0430',
  'MX': '\u041c\u0435\u043a\u0441\u0438\u043a\u0430',
  'MZ': '\u041c\u043e\u0437\u0430\u043c\u0431\u0438\u043a',
  'MD': '\u041c\u043e\u043b\u0434\u043e\u0432\u0430',
  'MC': '\u041c\u043e\u043d\u0430\u043a\u043e',
  'MN': '\u041c\u043e\u043d\u0433\u043e\u043b\u0438\u044f',
  'MS': '\u041c\u043e\u043d\u0442\u0441\u0435\u0440\u0440\u0430\u0442',
  'MM': '\u041c\u044c\u044f\u043d\u043c\u0430 (\u0411\u0438\u0440\u043c\u0430)',
  'NA': '\u041d\u0430\u043c\u0438\u0431\u0438\u044f',
  'NR': '\u041d\u0430\u0443\u0440\u0443',
  'NP': '\u041d\u0435\u043f\u0430\u043b',
  'NE': '\u041d\u0438\u0433\u0435\u0440',
  'NG': '\u041d\u0438\u0433\u0435\u0440\u0438\u044f',
  'NL': '\u041d\u0438\u0434\u0435\u0440\u043b\u0430\u043d\u0434\u044b',
  'NI': '\u041d\u0438\u043a\u0430\u0440\u0430\u0433\u0443\u0430',
  'NU': '\u041d\u0438\u0443\u044d',
  'NZ': '\u041d\u043e\u0432\u0430\u044f \u0417\u0435\u043b\u0430\u043d\u0434\u0438\u044f',
  'NC': '\u041d\u043e\u0432\u0430\u044f \u041a\u0430\u043b\u0435\u0434\u043e\u043d\u0438\u044f',
  'NO': '\u041d\u043e\u0440\u0432\u0435\u0433\u0438\u044f',
  'AC': '\u043e-\u0432 \u0412\u043e\u0437\u043d\u0435\u0441\u0435\u043d\u0438\u044f',
  'IM': '\u043e-\u0432 \u041c\u044d\u043d',
  'NF': '\u043e-\u0432 \u041d\u043e\u0440\u0444\u043e\u043b\u043a',
  'CX': '\u043e-\u0432 \u0420\u043e\u0436\u0434\u0435\u0441\u0442\u0432\u0430',
  'SH': '\u043e-\u0432 \u0421\u0432. \u0415\u043b\u0435\u043d\u044b',
  'PN': '\u043e-\u0432\u0430 \u041f\u0438\u0442\u043a\u044d\u0440\u043d',
  'TC': '\u043e-\u0432\u0430 \u0422\u0451\u0440\u043a\u0441 \u0438 \u041a\u0430\u0439\u043a\u043e\u0441',
  'AE': '\u041e\u0410\u042d',
  'OM': '\u041e\u043c\u0430\u043d',
  'KY': '\u041e\u0441\u0442\u0440\u043e\u0432\u0430 \u041a\u0430\u0439\u043c\u0430\u043d',
  'CK': '\u041e\u0441\u0442\u0440\u043e\u0432\u0430 \u041a\u0443\u043a\u0430',
  'PK': '\u041f\u0430\u043a\u0438\u0441\u0442\u0430\u043d',
  'PW': '\u041f\u0430\u043b\u0430\u0443',
  'PS': '\u041f\u0430\u043b\u0435\u0441\u0442\u0438\u043d\u0441\u043a\u0438\u0435 \u0442\u0435\u0440\u0440\u0438\u0442\u043e\u0440\u0438\u0438',
  'PA': '\u041f\u0430\u043d\u0430\u043c\u0430',
  'PG': '\u041f\u0430\u043f\u0443\u0430 \u2014 \u041d\u043e\u0432\u0430\u044f \u0413\u0432\u0438\u043d\u0435\u044f',
  'PY': '\u041f\u0430\u0440\u0430\u0433\u0432\u0430\u0439',
  'PE': '\u041f\u0435\u0440\u0443',
  'PL': '\u041f\u043e\u043b\u044c\u0448\u0430',
  'PT': '\u041f\u043e\u0440\u0442\u0443\u0433\u0430\u043b\u0438\u044f',
  'XB': '\u043f\u0441\u0435\u0432\u0434\u043e-Bidi',
  'XA': '\u043f\u0441\u0435\u0432\u0434\u043e\u0430\u043a\u0446\u0435\u043d\u0442\u044b',
  'PR': '\u041f\u0443\u044d\u0440\u0442\u043e-\u0420\u0438\u043a\u043e',
  'KR': '\u0420\u0435\u0441\u043f\u0443\u0431\u043b\u0438\u043a\u0430 \u041a\u043e\u0440\u0435\u044f',
  'RE': '\u0420\u0435\u044e\u043d\u044c\u043e\u043d',
  'RU': '\u0420\u043e\u0441\u0441\u0438\u044f',
  'RW': '\u0420\u0443\u0430\u043d\u0434\u0430',
  'RO': '\u0420\u0443\u043c\u044b\u043d\u0438\u044f',
  'SV': '\u0421\u0430\u043b\u044c\u0432\u0430\u0434\u043e\u0440',
  'WS': '\u0421\u0430\u043c\u043e\u0430',
  'SM': '\u0421\u0430\u043d-\u041c\u0430\u0440\u0438\u043d\u043e',
  'ST': '\u0421\u0430\u043d-\u0422\u043e\u043c\u0435 \u0438 \u041f\u0440\u0438\u043d\u0441\u0438\u043f\u0438',
  'SA': '\u0421\u0430\u0443\u0434\u043e\u0432\u0441\u043a\u0430\u044f \u0410\u0440\u0430\u0432\u0438\u044f',
  'MK': '\u0421\u0435\u0432\u0435\u0440\u043d\u0430\u044f \u041c\u0430\u043a\u0435\u0434\u043e\u043d\u0438\u044f',
  'MP': '\u0421\u0435\u0432\u0435\u0440\u043d\u044b\u0435 \u041c\u0430\u0440\u0438\u0430\u043d\u0441\u043a\u0438\u0435 \u043e-\u0432\u0430',
  'SC': '\u0421\u0435\u0439\u0448\u0435\u043b\u044c\u0441\u043a\u0438\u0435 \u041e\u0441\u0442\u0440\u043e\u0432\u0430',
  'BL': '\u0421\u0435\u043d-\u0411\u0430\u0440\u0442\u0435\u043b\u0435\u043c\u0438',
  'MF': '\u0421\u0435\u043d-\u041c\u0430\u0440\u0442\u0435\u043d',
  'PM': '\u0421\u0435\u043d-\u041f\u044c\u0435\u0440 \u0438 \u041c\u0438\u043a\u0435\u043b\u043e\u043d',
  'SN': '\u0421\u0435\u043d\u0435\u0433\u0430\u043b',
  'VC': '\u0421\u0435\u043d\u0442-\u0412\u0438\u043d\u0441\u0435\u043d\u0442 \u0438 \u0413\u0440\u0435\u043d\u0430\u0434\u0438\u043d\u044b',
  'KN': '\u0421\u0435\u043d\u0442-\u041a\u0438\u0442\u0441 \u0438 \u041d\u0435\u0432\u0438\u0441',
  'LC': '\u0421\u0435\u043d\u0442-\u041b\u044e\u0441\u0438\u044f',
  'RS': '\u0421\u0435\u0440\u0431\u0438\u044f',
  'EA': '\u0421\u0435\u0443\u0442\u0430 \u0438 \u041c\u0435\u043b\u0438\u043b\u044c\u044f',
  'SG': '\u0421\u0438\u043d\u0433\u0430\u043f\u0443\u0440',
  'SX': '\u0421\u0438\u043d\u0442-\u041c\u0430\u0440\u0442\u0435\u043d',
  'SY': '\u0421\u0438\u0440\u0438\u044f',
  'SK': '\u0421\u043b\u043e\u0432\u0430\u043a\u0438\u044f',
  'SI': '\u0421\u043b\u043e\u0432\u0435\u043d\u0438\u044f',
  'US': '\u0421\u043e\u0435\u0434\u0438\u043d\u0435\u043d\u043d\u044b\u0435 \u0428\u0442\u0430\u0442\u044b',
  'SB': '\u0421\u043e\u043b\u043e\u043c\u043e\u043d\u043e\u0432\u044b \u041e\u0441\u0442\u0440\u043e\u0432\u0430',
  'SO': '\u0421\u043e\u043c\u0430\u043b\u0438',
  'SD': '\u0421\u0443\u0434\u0430\u043d',
  'SR': '\u0421\u0443\u0440\u0438\u043d\u0430\u043c',
  'SL': '\u0421\u044c\u0435\u0440\u0440\u0430-\u041b\u0435\u043e\u043d\u0435',
  'TJ': '\u0422\u0430\u0434\u0436\u0438\u043a\u0438\u0441\u0442\u0430\u043d',
  'TH': '\u0422\u0430\u0438\u043b\u0430\u043d\u0434',
  'TW': '\u0422\u0430\u0439\u0432\u0430\u043d\u044c',
  'TZ': '\u0422\u0430\u043d\u0437\u0430\u043d\u0438\u044f',
  'TG': '\u0422\u043e\u0433\u043e',
  'TK': '\u0422\u043e\u043a\u0435\u043b\u0430\u0443',
  'TO': '\u0422\u043e\u043d\u0433\u0430',
  'TT': '\u0422\u0440\u0438\u043d\u0438\u0434\u0430\u0434 \u0438 \u0422\u043e\u0431\u0430\u0433\u043e',
  'TA': '\u0422\u0440\u0438\u0441\u0442\u0430\u043d-\u0434\u0430-\u041a\u0443\u043d\u044c\u044f',
  'TV': '\u0422\u0443\u0432\u0430\u043b\u0443',
  'TN': '\u0422\u0443\u043d\u0438\u0441',
  'TM': '\u0422\u0443\u0440\u043a\u043c\u0435\u043d\u0438\u0441\u0442\u0430\u043d',
  'TR': '\u0422\u0443\u0440\u0446\u0438\u044f',
  'UG': '\u0423\u0433\u0430\u043d\u0434\u0430',
  'UZ': '\u0423\u0437\u0431\u0435\u043a\u0438\u0441\u0442\u0430\u043d',
  'UA': '\u0423\u043a\u0440\u0430\u0438\u043d\u0430',
  'WF': '\u0423\u043e\u043b\u043b\u0438\u0441 \u0438 \u0424\u0443\u0442\u0443\u043d\u0430',
  'UY': '\u0423\u0440\u0443\u0433\u0432\u0430\u0439',
  'FO': '\u0424\u0430\u0440\u0435\u0440\u0441\u043a\u0438\u0435 \u043e-\u0432\u0430',
  'FM': '\u0424\u0435\u0434\u0435\u0440\u0430\u0442\u0438\u0432\u043d\u044b\u0435 \u0428\u0442\u0430\u0442\u044b \u041c\u0438\u043a\u0440\u043e\u043d\u0435\u0437\u0438\u0438',
  'FJ': '\u0424\u0438\u0434\u0436\u0438',
  'PH': '\u0424\u0438\u043b\u0438\u043f\u043f\u0438\u043d\u044b',
  'FI': '\u0424\u0438\u043d\u043b\u044f\u043d\u0434\u0438\u044f',
  'FK': '\u0424\u043e\u043b\u043a\u043b\u0435\u043d\u0434\u0441\u043a\u0438\u0435 \u043e-\u0432\u0430',
  'FR': '\u0424\u0440\u0430\u043d\u0446\u0438\u044f',
  'GF': '\u0424\u0440\u0430\u043d\u0446\u0443\u0437\u0441\u043a\u0430\u044f \u0413\u0432\u0438\u0430\u043d\u0430',
  'PF': '\u0424\u0440\u0430\u043d\u0446\u0443\u0437\u0441\u043a\u0430\u044f \u041f\u043e\u043b\u0438\u043d\u0435\u0437\u0438\u044f',
  'TF': '\u0424\u0440\u0430\u043d\u0446\u0443\u0437\u0441\u043a\u0438\u0435 \u042e\u0436\u043d\u044b\u0435 \u0442\u0435\u0440\u0440\u0438\u0442\u043e\u0440\u0438\u0438',
  'HR': '\u0425\u043e\u0440\u0432\u0430\u0442\u0438\u044f',
  'CF': '\u0426\u0435\u043d\u0442\u0440\u0430\u043b\u044c\u043d\u043e-\u0410\u0444\u0440\u0438\u043a\u0430\u043d\u0441\u043a\u0430\u044f \u0420\u0435\u0441\u043f\u0443\u0431\u043b\u0438\u043a\u0430',
  'TD': '\u0427\u0430\u0434',
  'ME': '\u0427\u0435\u0440\u043d\u043e\u0433\u043e\u0440\u0438\u044f',
  'CZ': '\u0427\u0435\u0445\u0438\u044f',
  'CL': '\u0427\u0438\u043b\u0438',
  'CH': '\u0428\u0432\u0435\u0439\u0446\u0430\u0440\u0438\u044f',
  'SE': '\u0428\u0432\u0435\u0446\u0438\u044f',
  'SJ': '\u0428\u043f\u0438\u0446\u0431\u0435\u0440\u0433\u0435\u043d \u0438 \u042f\u043d-\u041c\u0430\u0439\u0435\u043d',
  'LK': '\u0428\u0440\u0438-\u041b\u0430\u043d\u043a\u0430',
  'EC': '\u042d\u043a\u0432\u0430\u0434\u043e\u0440',
  'GQ': '\u042d\u043a\u0432\u0430\u0442\u043e\u0440\u0438\u0430\u043b\u044c\u043d\u0430\u044f \u0413\u0432\u0438\u043d\u0435\u044f',
  'ER': '\u042d\u0440\u0438\u0442\u0440\u0435\u044f',
  'SZ': '\u042d\u0441\u0432\u0430\u0442\u0438\u043d\u0438',
  'EE': '\u042d\u0441\u0442\u043e\u043d\u0438\u044f',
  'ET': '\u042d\u0444\u0438\u043e\u043f\u0438\u044f',
  'GS': '\u042e\u0436\u043d\u0430\u044f \u0413\u0435\u043e\u0440\u0433\u0438\u044f \u0438 \u042e\u0436\u043d\u044b\u0435 \u0421\u0430\u043d\u0434\u0432\u0438\u0447\u0435\u0432\u044b \u043e-\u0432\u0430',
  'ZA': '\u042e\u0436\u043d\u043e-\u0410\u0444\u0440\u0438\u043a\u0430\u043d\u0441\u043a\u0430\u044f \u0420\u0435\u0441\u043f\u0443\u0431\u043b\u0438\u043a\u0430',
  'SS': '\u042e\u0436\u043d\u044b\u0439 \u0421\u0443\u0434\u0430\u043d',
  'JM': '\u042f\u043c\u0430\u0439\u043a\u0430',
  'JP': '\u042f\u043f\u043e\u043d\u0438\u044f'
});

/***/ }),

/***/ "qGYk":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/ITextEditorIcon.vue?vue&type=template&id=5b6accd6&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "wygwys-icon",
      class: [
        "itexteditor-icon-" + _vm.name,
        "itexteditor-icon-" + _vm.size,
        { "has-align-fix": _vm.fixAlign }
      ]
    },
    [
      _c("svg", { staticClass: "wygwys-icon__svg" }, [
        _c("use", {
          attrs: {
            "xmlns:xlink": "http://www.w3.org/1999/xlink",
            "xlink:href": "#itexteditor-icon-" + _vm.name
          }
        })
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/ITextEditorIcon.vue?vue&type=template&id=5b6accd6&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/ITextEditorIcon.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ var ITextEditorIconvue_type_script_lang_js_ = ({
  props: {
    name: {},
    size: {
      default: 'normal'
    },
    modifier: {
      default: null
    },
    fixAlign: {
      default: true
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/ITextEditorIcon.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_ITextEditorIconvue_type_script_lang_js_ = (ITextEditorIconvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/ITextEditorIcon.vue?vue&type=style&index=0&lang=scss&
var ITextEditorIconvue_type_style_index_0_lang_scss_ = __webpack_require__("lbSo");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/designcomponents/components/ITextEditorIcon.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_ITextEditorIconvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/designcomponents/components/ITextEditorIcon.vue"
/* harmony default export */ var ITextEditorIcon = __webpack_exports__["a"] = (component.exports);

/***/ }),

/***/ "qkxg":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("rlTz");

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

/***/ "rlTz":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "s0AU":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  'AF': 'Afghanistan',
  'EG': '\u00c4gypten',
  'AX': '\u00c5landinseln',
  'AL': 'Albanien',
  'DZ': 'Algerien',
  'AS': 'Amerikanisch-Samoa',
  'VI': 'Amerikanische Jungferninseln',
  'UM': 'Amerikanische \u00dcberseeinseln',
  'AD': 'Andorra',
  'AO': 'Angola',
  'AI': 'Anguilla',
  'AQ': 'Antarktis',
  'AG': 'Antigua und Barbuda',
  'GQ': '\u00c4quatorialguinea',
  'AR': 'Argentinien',
  'AM': 'Armenien',
  'AW': 'Aruba',
  'AC': 'Ascension',
  'AZ': 'Aserbaidschan',
  'ET': '\u00c4thiopien',
  'AU': 'Australien',
  'BS': 'Bahamas',
  'BH': 'Bahrain',
  'BD': 'Bangladesch',
  'BB': 'Barbados',
  'BY': 'Belarus',
  'BE': 'Belgien',
  'BZ': 'Belize',
  'BJ': 'Benin',
  'BM': 'Bermuda',
  'BT': 'Bhutan',
  'BO': 'Bolivien',
  'BQ': 'Bonaire, Sint Eustatius und Saba',
  'BA': 'Bosnien und Herzegowina',
  'BW': 'Botsuana',
  'BR': 'Brasilien',
  'VG': 'Britische Jungferninseln',
  'IO': 'Britisches Territorium im Indischen Ozean',
  'BN': 'Brunei Darussalam',
  'BG': 'Bulgarien',
  'BF': 'Burkina Faso',
  'BI': 'Burundi',
  'CV': 'Cabo Verde',
  'EA': 'Ceuta und Melilla',
  'CL': 'Chile',
  'CN': 'China',
  'CK': 'Cookinseln',
  'CR': 'Costa Rica',
  'CI': 'C\u00f4te d\u2019Ivoire',
  'CW': 'Cura\u00e7ao',
  'DK': 'D\u00e4nemark',
  'DE': 'Deutschland',
  'DG': 'Diego Garcia',
  'DM': 'Dominica',
  'DO': 'Dominikanische Republik',
  'DJ': 'Dschibuti',
  'EC': 'Ecuador',
  'SV': 'El Salvador',
  'ER': 'Eritrea',
  'EE': 'Estland',
  'FK': 'Falklandinseln',
  'FO': 'F\u00e4r\u00f6er',
  'FJ': 'Fidschi',
  'FI': 'Finnland',
  'FR': 'Frankreich',
  'GF': 'Franz\u00f6sisch-Guayana',
  'PF': 'Franz\u00f6sisch-Polynesien',
  'TF': 'Franz\u00f6sische S\u00fcd- und Antarktisgebiete',
  'GA': 'Gabun',
  'GM': 'Gambia',
  'GE': 'Georgien',
  'GH': 'Ghana',
  'GI': 'Gibraltar',
  'GD': 'Grenada',
  'GR': 'Griechenland',
  'GL': 'Gr\u00f6nland',
  'GP': 'Guadeloupe',
  'GU': 'Guam',
  'GT': 'Guatemala',
  'GG': 'Guernsey',
  'GN': 'Guinea',
  'GW': 'Guinea-Bissau',
  'GY': 'Guyana',
  'HT': 'Haiti',
  'HN': 'Honduras',
  'IN': 'Indien',
  'ID': 'Indonesien',
  'IQ': 'Irak',
  'IR': 'Iran',
  'IE': 'Irland',
  'IS': 'Island',
  'IM': 'Isle of Man',
  'IL': 'Israel',
  'IT': 'Italien',
  'JM': 'Jamaika',
  'JP': 'Japan',
  'YE': 'Jemen',
  'JE': 'Jersey',
  'JO': 'Jordanien',
  'KY': 'Kaimaninseln',
  'KH': 'Kambodscha',
  'CM': 'Kamerun',
  'CA': 'Kanada',
  'IC': 'Kanarische Inseln',
  'KZ': 'Kasachstan',
  'QA': 'Katar',
  'KE': 'Kenia',
  'KG': 'Kirgisistan',
  'KI': 'Kiribati',
  'CC': 'Kokosinseln',
  'CO': 'Kolumbien',
  'KM': 'Komoren',
  'CG': 'Kongo-Brazzaville',
  'CD': 'Kongo-Kinshasa',
  'XK': 'Kosovo',
  'HR': 'Kroatien',
  'CU': 'Kuba',
  'KW': 'Kuwait',
  'LA': 'Laos',
  'LS': 'Lesotho',
  'LV': 'Lettland',
  'LB': 'Libanon',
  'LR': 'Liberia',
  'LY': 'Libyen',
  'LI': 'Liechtenstein',
  'LT': 'Litauen',
  'LU': 'Luxemburg',
  'MG': 'Madagaskar',
  'MW': 'Malawi',
  'MY': 'Malaysia',
  'MV': 'Malediven',
  'ML': 'Mali',
  'MT': 'Malta',
  'MA': 'Marokko',
  'MH': 'Marshallinseln',
  'MQ': 'Martinique',
  'MR': 'Mauretanien',
  'MU': 'Mauritius',
  'YT': 'Mayotte',
  'MX': 'Mexiko',
  'FM': 'Mikronesien',
  'MC': 'Monaco',
  'MN': 'Mongolei',
  'ME': 'Montenegro',
  'MS': 'Montserrat',
  'MZ': 'Mosambik',
  'MM': 'Myanmar',
  'NA': 'Namibia',
  'NR': 'Nauru',
  'NP': 'Nepal',
  'NC': 'Neukaledonien',
  'NZ': 'Neuseeland',
  'NI': 'Nicaragua',
  'NL': 'Niederlande',
  'NE': 'Niger',
  'NG': 'Nigeria',
  'NU': 'Niue',
  'KP': 'Nordkorea',
  'MP': 'N\u00f6rdliche Marianen',
  'MK': 'Nordmazedonien',
  'NF': 'Norfolkinsel',
  'NO': 'Norwegen',
  'OM': 'Oman',
  'AT': '\u00d6sterreich',
  'PK': 'Pakistan',
  'PS': 'Pal\u00e4stinensische Autonomiegebiete',
  'PW': 'Palau',
  'PA': 'Panama',
  'PG': 'Papua-Neuguinea',
  'PY': 'Paraguay',
  'PE': 'Peru',
  'PH': 'Philippinen',
  'PN': 'Pitcairninseln',
  'PL': 'Polen',
  'PT': 'Portugal',
  'XA': 'Pseudo-Accents',
  'XB': 'Pseudo-Bidi',
  'PR': 'Puerto Rico',
  'MD': 'Republik Moldau',
  'RE': 'R\u00e9union',
  'RW': 'Ruanda',
  'RO': 'Rum\u00e4nien',
  'RU': 'Russland',
  'SB': 'Salomonen',
  'ZM': 'Sambia',
  'WS': 'Samoa',
  'SM': 'San Marino',
  'ST': 'S\u00e3o Tom\u00e9 und Pr\u00edncipe',
  'SA': 'Saudi-Arabien',
  'SE': 'Schweden',
  'CH': 'Schweiz',
  'SN': 'Senegal',
  'RS': 'Serbien',
  'SC': 'Seychellen',
  'SL': 'Sierra Leone',
  'ZW': 'Simbabwe',
  'SG': 'Singapur',
  'SX': 'Sint Maarten',
  'SK': 'Slowakei',
  'SI': 'Slowenien',
  'SO': 'Somalia',
  'HK': 'Sonderverwaltungsregion Hongkong',
  'MO': 'Sonderverwaltungsregion Macau',
  'ES': 'Spanien',
  'SJ': 'Spitzbergen und Jan Mayen',
  'LK': 'Sri Lanka',
  'BL': 'St. Barth\u00e9lemy',
  'SH': 'St. Helena',
  'KN': 'St. Kitts und Nevis',
  'LC': 'St. Lucia',
  'MF': 'St. Martin',
  'PM': 'St. Pierre und Miquelon',
  'VC': 'St. Vincent und die Grenadinen',
  'ZA': 'S\u00fcdafrika',
  'SD': 'Sudan',
  'GS': 'S\u00fcdgeorgien und die S\u00fcdlichen Sandwichinseln',
  'KR': 'S\u00fcdkorea',
  'SS': 'S\u00fcdsudan',
  'SR': 'Suriname',
  'SZ': 'Swasiland',
  'SY': 'Syrien',
  'TJ': 'Tadschikistan',
  'TW': 'Taiwan',
  'TZ': 'Tansania',
  'TH': 'Thailand',
  'TL': 'Timor-Leste',
  'TG': 'Togo',
  'TK': 'Tokelau',
  'TO': 'Tonga',
  'TT': 'Trinidad und Tobago',
  'TA': 'Tristan da Cunha',
  'TD': 'Tschad',
  'CZ': 'Tschechien',
  'TN': 'Tunesien',
  'TR': 'T\u00fcrkei',
  'TM': 'Turkmenistan',
  'TC': 'Turks- und Caicosinseln',
  'TV': 'Tuvalu',
  'UG': 'Uganda',
  'UA': 'Ukraine',
  'HU': 'Ungarn',
  'UY': 'Uruguay',
  'UZ': 'Usbekistan',
  'VU': 'Vanuatu',
  'VA': 'Vatikanstadt',
  'VE': 'Venezuela',
  'AE': 'Vereinigte Arabische Emirate',
  'US': 'Vereinigte Staaten',
  'GB': 'Vereinigtes K\u00f6nigreich',
  'VN': 'Vietnam',
  'WF': 'Wallis und Futuna',
  'CX': 'Weihnachtsinsel',
  'EH': 'Westsahara',
  'CF': 'Zentralafrikanische Republik',
  'CY': 'Zypern'
});

/***/ }),

/***/ "s5rb":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("a2dD");

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

/***/ "sUze":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("P0qE");


/* harmony default export */ __webpack_exports__["a"] = ({
  getUsers(params, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('search/user', params, callback);
      } else {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('search/user', params);
      }
    })();
  },

  getForms(params, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('search/form', params, callback);
      } else {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].post('search/form', params);
      }
    })();
  }

});

/***/ }),

/***/ "t/QJ":
/***/ (function(module, exports) {

// import Vue from 'vue';

/*

USE CASES:

Using with title:
	<div v-tooltip title="Im a tooltip now!"></div>

Using solo:
	<div v-tooltip="'Im a tooltip now!"></div>

Using with options:
	<div v-tooltip="{ text: 'Im a tooltip now!', buffer: 30, closeOnClick: true }"></div>

OPTIONS:
	text: <<String>> 'Text of the tooltip'
	closeOnClick: <<Boolean>> Wheter the tooltip closes at clicking on the target element
	buffer: <<Number>> Tooltip distance from the target element

MODIFIERS:
	default: makes tooltip appear from top
	left: makes tooltip appear from left
	right: makes tooltip appear from right
	bottom: makes tooltip appear from bottom
	top: makes tooltip appear from top

EXAMPLE MODIFIER:
	<div v-tooltip.left="'Im a tooltip now!"></div>

*/
module.exports = function (Vue) {
  Vue.directive('tooltip', {
    inserted: function inserted(el, bindings, vnode) {// if (!vnode.context.$root.isMobile) {
      // 	bindings.value = bindings.value || {};
      // 	let buffer = bindings.value.buffer || 0;
      // 	el.addEventListener('mouseenter', (e) => {
      // 		let tooltipText = '';
      // 		if (bindings.value.constructor.name === 'String') {
      // 			tooltipText = bindings.value;
      // 		} else if (bindings.value.disabled === true || el.getAttribute('tooltip-disabled') !== null) {
      // 			vnode.context.$root.tooltip.isOpen = false;
      // 			vnode.context.$root.tooltip.coordinates = null;
      // 			vnode.context.$root.tooltip.modifiers = null;
      // 			el.isTooltipOpen = false;
      // 			return;
      // 		} else if (bindings.value.text) {
      // 			tooltipText = bindings.value.text;
      // 		} else {
      // 			tooltipText = el.getAttribute('title');
      // 			if (tooltipText) {
      // 				el.setAttribute('v-title', tooltipText);
      // 				el.removeAttribute('title');
      // 			}
      // 		}
      // 		let coordinates = el.getBoundingClientRect();
      // 		// var styles = window.getComputedStyle(el);
      // 		let x = coordinates.x;
      // 		let y = coordinates.y;
      // 		// var bufferHeight = parseFloat(styles['paddingBottom']) +
      // 		// 	parseFloat(styles['paddingTop']);
      // 		// var bufferWidth = parseFloat(styles['paddingRight']) +
      // 		// 	parseFloat(styles['paddingLeft']);
      // 		vnode.context.$root.tooltip.text = tooltipText;
      // 		// vnode.context.$root.tooltip.buffer = {
      // 		// 	width: bufferWidth,
      // 		// 	height: bufferHeight
      // 		// };
      // 		vnode.context.$root.tooltip.isOpen = true;
      // 		vnode.context.$root.tooltip.modifiers = bindings.modifiers;
      // 		if (bindings.modifiers.left === true) {
      // 			// x -= coordinates.width + buffer;
      // 			y += coordinates.height / 2;
      // 		} else if (bindings.modifiers.right === true) {
      // 			x += coordinates.width + buffer;
      // 			y += coordinates.height / 2;
      // 		} else if (bindings.modifiers.bottom === true) {
      // 			x += coordinates.width / 2;
      // 			y += coordinates.height + buffer;
      // 		} else { // top
      // 			x += coordinates.width / 2;
      // 			y -= coordinates.height + buffer;
      // 		}
      // 		vnode.context.$root.tooltip.coordinates = {
      // 			x: x + window.scrollX,
      // 			y: y + window.scrollY
      // 		};
      // 		el.isTooltipOpen = true;
      // 	});
      // 	el.addEventListener('mouseleave', (e) => {
      // 		if (bindings.value.disabled === true || el.getAttribute('tooltip-disabled') !== null) {
      // 			vnode.context.$root.tooltip.isOpen = false;
      // 			vnode.context.$root.tooltip.coordinates = null;
      // 			vnode.context.$root.tooltip.modifiers = null;
      // 			el.isTooltipOpen = false;
      // 			return;
      // 		}
      // 		let tooltipText = vnode.context.$root.tooltip.text;
      // 		let vTitle = el.getAttribute('v-title');
      // 		let title = el.getAttribute('title');
      // 		if (title) {
      // 			tooltipText = title;
      // 			el.setAttribute('title', tooltipText);
      // 		} else if (vTitle) {
      // 			tooltipText = vTitle;
      // 			el.setAttribute('title', tooltipText);
      // 		}
      // 		el.removeAttribute('v-title');
      // 		vnode.context.$root.tooltip.text = tooltipText;
      // 		vnode.context.$root.tooltip.isOpen = false;
      // 		vnode.context.$root.tooltip.coordinates = null;
      // 		vnode.context.$root.tooltip.modifiers = null;
      // 		el.isTooltipOpen = false;
      // 	});
      // 	if (bindings.value.constructor.name !== 'String' && bindings.value.closeOnClick === true) {
      // 		el.addEventListener('click', (e) => {
      // 			let tooltipText = vnode.context.$root.tooltip.text;
      // 			let vTitle = el.getAttribute('v-title');
      // 			let title = el.getAttribute('title');
      // 			if (title) {
      // 				tooltipText = title;
      // 				el.setAttribute('title', tooltipText);
      // 			} else if (vTitle) {
      // 				tooltipText = vTitle;
      // 				el.setAttribute('title', tooltipText);
      // 			}
      // 			el.removeAttribute('v-title');
      // 			vnode.context.$root.tooltip.text = tooltipText;
      // 			vnode.context.$root.tooltip.isOpen = false;
      // 			vnode.context.$root.tooltip.coordinates = null;
      // 			vnode.context.$root.tooltip.modifiers = null;
      // 			el.isTooltipOpen = false;
      // 		});
      // 	}
      // }
    },
    update: function update(el, bindings, vnode) {// 	bindings.value = bindings.value || {};
      // 	let buffer = bindings.value.buffer || 0;
      // 	if (bindings.value.disabled === true || el.getAttribute('tooltip-disabled') !== null) {
      // 		el.setAttribute('tooltip-disabled', '');
      // 		vnode.context.$root.tooltip.isOpen = false;
      // 		vnode.context.$root.tooltip.coordinates = null;
      // 		vnode.context.$root.tooltip.modifiers = null;
      // 		el.isTooltipOpen = false;
      // 		return;
      // 	}
      // 	if (!vnode.context.$root.isMobile && el.isTooltipOpen) {
      // 		let tooltipText = '';
      // 		if (bindings.value.constructor.name === 'String') {
      // 			tooltipText = bindings.value;
      // 		} else if (bindings.value.text) {
      // 			tooltipText = bindings.value.text;
      // 		} else {
      // 			tooltipText = el.getAttribute('title');
      // 		}
      // 		if (tooltipText) {
      // 			vnode.context.$root.tooltip.text = tooltipText;
      // 			vnode.context.$root.tooltip.modifiers = bindings.modifiers;
      // 			let coordinates = el.getBoundingClientRect();
      // 			let x = coordinates.x;
      // 			let y = coordinates.y;
      // 			if (bindings.modifiers.left === true) {
      // 				x -= coordinates.width + buffer;
      // 				y += coordinates.height / 2;
      // 			} else if (bindings.modifiers.right === true) {
      // 				y += coordinates.height / 2 + buffer;
      // 				x += coordinates.width;
      // 			} else if (bindings.modifiers.bottom === true) {
      // 				x += coordinates.width / 2;
      // 				y += coordinates.height + buffer;
      // 			} else { // top
      // 				x += coordinates.width / 2;
      // 				y -= coordinates.height + buffer;
      // 			}
      // 			vnode.context.$root.tooltip.coordinates = {
      // 				x: x,
      // 				y: y
      // 			};
      // 		}
      // 	}
    }
  });
};

/***/ }),

/***/ "tL2h":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("yXPU");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var config__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("NRfZ");
/* harmony import */ var _services_Api__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("P0qE");
/* harmony import */ var _services_FormLocalStorageService__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("Sk9r");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("Gppw");
/* harmony import */ var bson_objectid__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(bson_objectid__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__("oCYn");
/* harmony import */ var _questiontypes_questiontypesmanager__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__("K/kh");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__("mSNy");








var formLocalStorageService = new _services_FormLocalStorageService__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"]();
/* harmony default export */ __webpack_exports__["a"] = ({
  changePrivacy(id, updateModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        var status = (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].put('form/' + id + '/updateprivacy', updateModel)).status;
        return status === 200 || status === 204;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  saveFriendlyUrl(formModel, newUrl) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        var postData = {
          oldUrl: formModel.url,
          newUrl: newUrl
        };
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].put('form/' + formModel._id + '/url', postData);
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  duplicate(formModel) {
    var _this = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].put('form/' + formModel._id + '/duplicate');
      } else {
        formModel._id = bson_objectid__WEBPACK_IMPORTED_MODULE_4___default()().str;
        return yield _this.add(formModel);
      }
    })();
  },

  getAll(callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (typeof callback === 'function') {
        if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
          _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form', null, function (result) {
            callback(result.data);
          });
        } else {
          callback(formLocalStorageService.getForms());
        }
      } else {
        if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
          return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form')).data;
        } else {
          return formLocalStorageService.getForms();
        }
      }
    })();
  },

  getSharedWithMe(callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (typeof callback === 'function') {
        if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
          _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/sharedwithme', null, function (result) {
            callback(result.data);
          });
        } else {// alert('register');
        }
      } else {
        if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
          return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/sharedwithme')).data;
        } else {// alert('register');
        }
      }
    })();
  },

  add(formModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('form', formModel);
      } else {
        var forms = formLocalStorageService.getForms();

        if (!forms || forms && forms.length < config__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"].localStorageFormQuota) {
          if (!formModel._id) {
            formModel._id = bson_objectid__WEBPACK_IMPORTED_MODULE_4___default()().str;
          }

          formModel.createDate = new Date();
          fixFormModelForLocalDbAdd(formModel);
          formLocalStorageService.saveForm(formModel);
          return formModel;
        } else {
          return null;
        }
      }
    })();
  },

  update(formModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        // return (await Api.put('form', formModel)).data;
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].put('form', formModel)).data;
      } else {
        return formLocalStorageService.updateForm(formModel);
      }
    })();
  },

  updateForm(formId, formModel) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        delete formModel.formTempFiles;
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].put('form/' + formId + '/update', formModel);
      } else {
        return formLocalStorageService.update(formId, formModel);
      }
    })();
  },

  updateActive(id, enabledState) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].put('form/' + id + '/UpdateActive', {
          value: !enabledState
        })).status === 204;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  getNotificationSettings(formId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + formId + '/notificationsettings')).data;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  updateNotificationSettings(formId, model) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].put('form/' + formId + '/updatenotificationsettings', model);
        return CreateUpdateFormCustomizeSettingsApiResult(apiResult);
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  formNotificationApproval(formId, rowId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + formId + '/notificationapproval/' + rowId);
      return CreateUpdateFormCustomizeSettingsApiResult(apiResult);
    })();
  },

  formNotificationUnsubscribe(formId, rowId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + formId + '/notificationunsubscribe/' + rowId);
      return CreateUpdateFormCustomizeSettingsApiResult(apiResult);
    })();
  },

  formNotificationReportUser(formId, rowId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + formId + '/notificationreportuser/' + rowId);
      return CreateUpdateFormCustomizeSettingsApiResult(apiResult);
    })();
  },

  getAllShared(userId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + userId + '/getallshared', null, callback);
      } else {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + userId + '/getallshared')).data;
      }
    })();
  },

  getAllSharedByUsername(username) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var apiResult = yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + username + '/getAllSharedByUsername');

      if (apiResult && apiResult.status === 200) {
        return apiResult.data;
      }
    })();
  },

  getShared(id, username, formUrl, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var url = id ? 'form/' + id + '/view' : 'form/' + username + '/' + formUrl;

      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get(url, null, callback);
      } else {
        return yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get(url);
      }
    })();
  },

  get(id, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        if (typeof callback === 'function') {
          _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + id, null, callback);
        } else {
          return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + id)).data;
        }
      } else {
        return formLocalStorageService.getForm(id).data;
      }
    })();
  },

  delete(id) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].delete('form/' + id)).status === 204;
      } else {
        return formLocalStorageService.deleteForm(id);
      }
    })();
  },

  migrate() {
    var _this2 = this;

    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var forms = formLocalStorageService.getForms();

      for (var i = 0; i < forms.length; i++) {
        var form = forms[i];

        if (form && form._id) {
          formLocalStorageService.deleteForm(form._id);
          delete form._id;
          yield _this2.add(form);
        }
      }
    })();
  },

  getSharedFormCount(userId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + userId + '/formCount', null, callback);
      } else {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + userId + '/formCount')).data;
      }
    })();
  },

  removeSharedWithMe(formId) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + formId + '/removesharedwithme')).status === 204;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  getFormViewCount(formId, callback) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      var url = 'form/' + formId + '/viewCount';

      if (typeof callback === 'function') {
        _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get(url, null, function (apiResult) {
          callback(fixGetResult(apiResult));
        });
      } else {
        return fixGetResult(yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get(url));
      }
    })();
  },

  getFormProductStocksPublic(formId, callback) {
    _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + formId + '/public/productstock', null, function (apiResult) {
      callback(apiResult.data);
    });
  },

  getFormProductStocks(formId, callback) {
    _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/' + formId + '/productstock', null, function (apiResult) {
      callback(apiResult.data);
    });
  },

  getNounProjectResults(keyword, page, perPage) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/nounproject/' + keyword + '/' + page + '/' + perPage)).data;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  getUnsplashResults(keyword, page, perPage, orientation) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/unsplash/' + keyword + '/' + page + '/' + perPage + '/' + orientation)).data;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  getUnsplashRandomPhotos(orientation) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/unsplash/randomPhotos/' + orientation)).data;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  downloadUnsplashPhoto(photo) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('form/unsplash/download', photo)).data;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  getPexelsVideo(keyword, page, perPage) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/pexels/' + keyword + '/' + page + '/' + perPage)).data;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  getPopularPexelsVideo(page, perPage) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      if (vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$auth.isAuthenticated()) {
        return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].get('form/pexels/popularVideos/' + page + '/' + perPage)).data;
      } else {
        vue__WEBPACK_IMPORTED_MODULE_5__["default"].prototype.$swal({
          title: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustLogin.title'),
          text: _lang__WEBPACK_IMPORTED_MODULE_7__["default"].t('popups.mustRegisterOrLOginPopup.text'),
          type: 'warning'
        });
      }
    })();
  },

  checkLocation(locationSettings) {
    return _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()(function* () {
      return (yield _services_Api__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"].post('form/checkLocation', locationSettings)).data;
    })();
  }

});

function CreateUpdateFormCustomizeSettingsApiResult(apiResult) {
  var result = {
    success: false,
    approvedEmail: apiResult.data.approvedEmail
  };

  if (apiResult) {
    if (apiResult.status === 200 || apiResult.status === 204) {
      result.success = true;
    }
    /* else {
    console.log('apiResult', apiResult);
    result.errors = apiResult.response.data;
    } */

  }

  return result;
}

function fixGetResult(apiResult) {
  var result;

  if (apiResult.status === 200) {
    result = apiResult.data;
  }

  return result;
}

function fixFormModelForLocalDbAdd(form) {
  for (var i = 0; i < form.questions.length; i++) {
    var question = form.questions[i];
    var questionType = _questiontypes_questiontypesmanager__WEBPACK_IMPORTED_MODULE_6__[/* default */ "a"].getQuestionTypeByTypeName(question.questionType);

    if (questionType.fixFormModelForLocalDbAdd) {
      questionType.fixFormModelForLocalDbAdd(question);
    }
  }
} // function editModelToFormModel (form) {
// 	let formModel = JSON.parse(JSON.stringify(form));
// 	formModel.questions.forEach((question) => {
// 		var questionType = questionTypeManager.getQuestionTypeByTypeName(question.questionType);
// 		if (questionType.questionViewModelToDatabaseModel && questionType.questionViewModelToDatabaseModel.constructor.name === 'Function') {
// 			question = questionType.questionViewModelToDatabaseModel(question);
// 		}
// 	});
// 	return formModel;
// }

/***/ }),

/***/ "ttAG":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.index-of.js
var es_array_index_of = __webpack_require__("yXV3");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.sort.js
var es_array_sort = __webpack_require__("ToJy");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.splice.js
var es_array_splice = __webpack_require__("pDQq");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.number.to-fixed.js
var es_number_to_fixed = __webpack_require__("toAj");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.regexp.constructor.js
var es_regexp_constructor = __webpack_require__("TWNs");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.regexp.to-string.js
var es_regexp_to_string = __webpack_require__("JfAA");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.match.js
var es_string_match = __webpack_require__("Rm1S");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.replace.js
var es_string_replace = __webpack_require__("UxlC");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.split.js
var es_string_split = __webpack_require__("EnZy");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.trim.js
var es_string_trim = __webpack_require__("SYor");

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/defineProperty.js
var defineProperty = __webpack_require__("lSNA");
var defineProperty_default = /*#__PURE__*/__webpack_require__.n(defineProperty);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/asyncToGenerator.js
var asyncToGenerator = __webpack_require__("yXPU");
var asyncToGenerator_default = /*#__PURE__*/__webpack_require__.n(asyncToGenerator);

// EXTERNAL MODULE: ./node_modules/is-empty/lib/index.js
var lib = __webpack_require__("C4UN");
var lib_default = /*#__PURE__*/__webpack_require__.n(lib);

// EXTERNAL MODULE: ./config/prod.js
var prod = __webpack_require__("NRfZ");

// EXTERNAL MODULE: ./src/services/Api.js
var Api = __webpack_require__("P0qE");

// CONCATENATED MODULE: ./src/services/DeviceService.js


/* harmony default export */ var DeviceService = ({
  post: function () {
    var _post = asyncToGenerator_default()(function* (deviceId, oneSignalUserId, language) {
      yield Api["a" /* default */].post('device', {
        deviceId: deviceId,
        senderId: oneSignalUserId,
        refApp: 'webapp',
        deviceLanguage: language
      });
    });

    function post(_x, _x2, _x3) {
      return _post.apply(this, arguments);
    }

    return post;
  }()
});
// EXTERNAL MODULE: ./src/helpers/cookieHelper.js
var cookieHelper = __webpack_require__("x/hz");

// EXTERNAL MODULE: ./src/helpers/localStorageHelper.js
var localStorageHelper = __webpack_require__("kdFr");

// EXTERNAL MODULE: ./src/enums/errorenums.js
var errorenums = __webpack_require__("luLf");

// CONCATENATED MODULE: ./src/helpers/jsHelpers.js













function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { defineProperty_default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }







var guidPattern = /^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i;
var urlPattern = /^(?:(?:https?):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
var emailPattern = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
var numberPattern = /^-?[0-9]*$/; // include negative

var numberPatternWithDecimal = /^-?[\d.]+$/; // include negative with decimal

var maxSelectionMatrixColumnValue = 20;
var maxSelectionMatrixRowValue = 25;
var timePattern = /^([0-1]?[0-9]|2[0-3]):([0-5][0-9])(:[0-5][0-9])?$/;
/* eslint-disable */

var createSocialShareUrl = function createSocialShareUrl(provider, url) {
  var pageTitle = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';

  switch (provider) {
    case 'facebook':
      return "https://www.facebook.com/sharer/sharer.php?u=".concat(encodeURIComponent(url));

    case 'twitter':
      return "https://twitter.com/share?url=".concat(encodeURIComponent(url), "&text=").concat(encodeURIComponent(pageTitle));

    case 'whatsapp':
      return "https://api.whatsapp.com/send?text=".concat(encodeURIComponent(url));
  }
};

var isUrl = v => urlPattern.test(v);

var isTime = v => timePattern.test(v);

var isEmpty = v => v === null || v === undefined || lib_default()(v);

var isEmail = v => emailPattern.test(v);

var isString = v => typeof v === 'string';

var isObject = v => !!v && v.constructor === Object;

var isNumber = v => numberPattern.test(v);

var isDateString = v => {
  if (isEmpty(v) || isObject(v) || isString(v) && isEmpty(v.trim())) {
    return false;
  }

  return !isNaN(Date.parse(v));
};

var isDecimalNumber = v => numberPatternWithDecimal.test(v);

var isGuid = v => guidPattern.test(v);

String.prototype.turkishToLower = function () {
  var string = this;
  var letters = {
    "İ": "i",
    "I": "ı",
    "Ş": "ş",
    "Ğ": "ğ",
    "Ü": "ü",
    "Ö": "ö",
    "Ç": "ç"
  };
  string = string.replace(/(([İIŞĞÜÇÖ]))/g, function (letter) {
    return letters[letter];
  });
  return string.toLowerCase();
};

/* harmony default export */ var jsHelpers = __webpack_exports__["default"] = ({
  isUrl: isUrl,
  isTime: isTime,
  isEmpty: isEmpty,
  isEmail: isEmail,
  isString: isString,
  isObject: isObject,
  isNumber: isNumber,
  isDateString: isDateString,
  isDecimalNumber: isDecimalNumber,
  isGuid: isGuid,
  getBaseUrl: () => "".concat(window.location.protocol, "//").concat(window.location.host),
  getColorFromNumber: v => ["hsl(", ((1 - v) * 120).toString(10), ",95%,57%)"].join(""),
  copyToClipboard: function copyToClipboard(text) {
    var textArea = document.createElement('textArea');
    textArea.readOnly = true;
    textArea.contentEditable = true;
    textArea.value = text;
    document.body.appendChild(textArea);

    if (window.navigator.userAgent.match(/ipad|iphone/i)) {
      var range = document.createRange();
      range.selectNodeContents(textArea);
      var selection = window.getSelection();
      selection.removeAllRanges();
      selection.addRange(range);
      textArea.setSelectionRange(0, 999999);
    } else {
      textArea.select();
    }

    try {
      return document.execCommand('copy');
    } catch (err) {
      console.warn(err);
      return false;
    } finally {
      document.body.removeChild(textArea);
    }
  },
  getBrowserTimeZone: function getBrowserTimeZone(timeZoneEnums) {
    var tz = Intl.DateTimeFormat().resolvedOptions().timeZone;

    for (var timezone in timeZoneEnums) {
      if (timeZoneEnums[timezone].utc.indexOf(tz) > -1) {
        return timeZoneEnums[timezone];
      }
    }

    return undefined;
  },
  getBrowserCulture: function getBrowserCulture(cultureEnums) {
    var cultureName = Intl.DateTimeFormat().resolvedOptions().locale;
    var arrCultureName = cultureName.split('-');

    if (arrCultureName.length > 1) {
      cultureName = arrCultureName[0].toLowerCase() + '-' + arrCultureName[1].toUpperCase();
    } else {
      cultureName = cultureName.toLowerCase();
    }

    return {
      name: cultureName,
      nativeName: cultureEnums[cultureName]
    };
  },
  applyMask: function applyMask(value, pattern) {
    // https://www.jotform.com/help/381-Getting-Started-with-the-Basics-of-Input-Masking
    var v = value.toString();
    var matchedCharsCount = 0;
    var maskedValue = '';
    var index = 0;

    for (var i = 0; i < pattern.length; i++) {
      var char = pattern[i];
      var newChar = char;
      var valueChar = v[index];

      if (char === '#') {
        // Numeric
        newChar = '';

        if (!this.isEmpty(valueChar) && /^[0-9]+$/.test(valueChar)) {
          newChar = valueChar;
          matchedCharsCount++;
        }

        index++;
      }

      if (char === '@') {
        // Letter
        newChar = '';

        if (!this.isEmpty(valueChar) && !/^[0-9]+$/.test(valueChar) && /^[A-Za-zА-Яа-яğüşöçİĞÜŞÖÇ]$/.test(valueChar)) {
          newChar = valueChar;
          matchedCharsCount++;
        }

        index++;
      }

      if (char === '*') {
        // Any
        newChar = '';

        if (!this.isEmpty(valueChar)) {
          newChar = valueChar;
          matchedCharsCount++;
        }

        index++;
      }

      maskedValue += newChar;
    }

    return pattern.length === maskedValue.length && value.length === matchedCharsCount ? maskedValue : '';
  },
  isMaskedValueValid: function isMaskedValueValid(maskedValue, pattern) {
    // https://www.jotform.com/help/381-Getting-Started-with-the-Basics-of-Input-Masking
    if (!this.isEmpty(maskedValue) && this.isEmpty(pattern)) {
      return true;
    }

    if (!this.isEmpty(maskedValue) && !this.isEmpty(pattern)) {
      var i = 0;
      var v = pattern.toString();
      var m = maskedValue.toString();

      if (maskedValue.length !== pattern.length) {
        return false;
      }
      /* eslint-disable */


      var baseValue = m.replace(/[^\/]/g, _ => {
        var rtn = '';
        var x = i++;
        var patternChar = v[x];
        var maskedValueChar = m[x];

        if (!this.isEmpty(patternChar) && !this.isEmpty(maskedValueChar) && (patternChar === '@' || patternChar === '#' || patternChar === '*')) {
          rtn = maskedValueChar;
        }

        return rtn;
      });
      /* eslint-enable */

      baseValue = baseValue.replace(new RegExp('_', 'g'), '');
      var newMaskedValue = this.applyMask(baseValue, pattern);
      return maskedValue === newMaskedValue;
    }

    return false;
  },
  getTimeZoneOfset: function getTimeZoneOfset(timeZoneUTCValue) {
    if (!timeZoneUTCValue) {
      return 0;
    }

    var utcDate = new Date(Date.UTC(2018, 6, 14, 0, 0));
    var timezoneDateString = utcDate.toLocaleString('en-GB', {
      timeZone: timeZoneUTCValue,
      year: 'numeric',
      month: 'numeric',
      day: 'numeric',
      hour: 'numeric',
      minute: 'numeric',
      hour12: false
    });
    var arrTimezoneDateString = timezoneDateString.split(',');
    var onlyDate = arrTimezoneDateString[0].trim();
    var arrDate = onlyDate.split('/');
    var day = parseInt(arrDate[0]);
    var month = parseInt(arrDate[1]) - 1;
    var year = parseInt(arrDate[2]);
    var onlyTime = arrTimezoneDateString[1].trim();
    var arrTime = onlyTime.split(':');
    var hour = parseInt(arrTime[0]);
    var minute = parseInt(arrTime[1]);
    var newDate = new Date(Date.UTC(year, month, day, hour, minute));
    var ofset = Math.abs(utcDate - newDate) / 36e5;
    ofset = Math.round(ofset * 10) / 10;

    if (utcDate > newDate) {
      ofset = 0 - ofset;
    }

    return ofset;
  },
  checkMaxSelectionMatrixColumnValue: function checkMaxSelectionMatrixColumnValue(columnLength) {
    if (columnLength < maxSelectionMatrixColumnValue) {
      return true;
    }
  },
  checkMaxSelectionMatrixRowValue: function checkMaxSelectionMatrixRowValue(rowLength) {
    if (rowLength < maxSelectionMatrixRowValue) {
      return true;
    }
  },
  checkMaxOptions: c => c < prod["a" /* default */].optionLimit,
  removeCss: function removeCss(incomingId) {
    var ids = ['design-style', 'custom-css', 'bg-wrapper'];

    if (incomingId) {
      ids = [incomingId];
    }

    ids.forEach(id => {
      var style = document.getElementById(id);

      if (style) {
        style.parentElement.removeChild(style);
      }
    }); // animated background

    var bgWrapper = document.querySelectorAll('.anim-bg-wrapper');

    if (bgWrapper) {
      bgWrapper.forEach(el => {
        el.remove();
      });
    }
  },
  injectCss: function injectCss(rules) {
    var styleId = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'design-style';
    var styleElement = document.getElementById(styleId);

    if (styleElement) {
      styleElement.parentElement.removeChild(styleElement);
    }

    if (!rules) {
      return;
    }

    var style = document.createElement('style');
    style.id = styleId;
    style.innerHTML = rules;
    document.body.appendChild(style);
  },
  forcePositiveNumberInput: function forcePositiveNumberInput(evt, commaCheck) {
    evt = evt || window.event;
    var charCode = evt.which || evt.keyCode;

    if (charCode > 31 && (charCode < 48 || charCode > 57) && commaCheck && charCode === 44 && charCode !== 46) {
      evt.preventDefault();
      return;
    }

    return true;
  },
  keypressIntegerInput: function keypressIntegerInput(evt) {
    evt = evt || window.event;
    var charCode = evt.which || evt.keyCode;

    if (charCode >= 48 && charCode <= 57) {
      return true;
    }

    evt.preventDefault();
  },
  fixLocalRedirectUrl: function fixLocalRedirectUrl(localUrl) {
    var defaultUrl = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '/myforms';

    if (this.isEmpty(localUrl) || this.isUrl(localUrl)) {
      return defaultUrl;
    }

    return localUrl;
  },
  loadRecaptchaVersion: function loadRecaptchaVersion(version) {
    var queryString = '';

    switch (version) {
      case 2:
        queryString = 'onload=vueRecaptchaApiLoaded&render=explicit';
        break;

      case 3:
        queryString = 'render=' + prod["a" /* default */].reChaptcha.v3.siteKey;
        break;

      default:
        return;
    }

    if (document.getElementById("recaptcha-v".concat(version))) {
      return;
    }

    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.src = 'https://www.google.com/recaptcha/api.js?' + queryString;
    script.async = true;
    script.defer = true;
    script.id = "recaptcha-v".concat(version);

    if (!document.getElementById("recaptchacss-v".concat(version))) {
      var style = document.createElement('style');
      style.innerHTML = '.grecaptcha-badge{display:none!important}';
      style.id = "recaptchacss-v".concat(version);
      head.appendChild(style);
    }

    document.body.appendChild(script);
  },
  getPathFromEvent: function getPathFromEvent(e) {
    if (e.path) {
      return e.path;
    }

    if (e.composedPath) {
      return e.composedPath();
    }

    var el = e.target;
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
  },
  readableBytes: function readableBytes(Kbytes) {
    var i = Math.floor(Math.log(Kbytes) / Math.log(1024));
    var sizes = ['KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    return (Kbytes / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + sizes[i];
  },
  fixedUrl: function fixedUrl(url) {
    if (!/^(f|ht)tps?:\/\//i.test(url)) {
      url = 'http://' + url;
    }

    return url;
  },
  rnPostMessage: function rnPostMessage(message) {
    var device = localStorageHelper["a" /* default */].getItem('formsapp');

    if ((device === 'iosbasic' || device === 'androidbasic') && window.ReactNativeWebView) {
      window.ReactNativeWebView.postMessage(message);
      return true;
    }

    return false;
  },
  setDeviceForOneSignal: function setDeviceForOneSignal(showPrompt) {
    this.getOneSignal(OneSignal => {
      var language = cookieHelper["a" /* default */].readOne('language');
      OneSignal.getUserId( /*#__PURE__*/function () {
        var _ref = asyncToGenerator_default()(function* (oneSignalUserId) {
          if (oneSignalUserId) {
            if (showPrompt) {
              localStorageHelper["a" /* default */].setItem('oneSignalRegister', true);

              if (Notification.permission === 'default') {
                OneSignal.showNativePrompt();
              }
            }

            var deviceId = oneSignalUserId; // Şimdilik oneSignalUserId gelecek daha sonradan kullanıcıya özgü daha belirgin bir değer olması gerekiyor.

            yield DeviceService.post(deviceId, oneSignalUserId, language);
          }
        });

        return function (_x) {
          return _ref.apply(this, arguments);
        };
      }());
    });
  },
  getOneSignal: function getOneSignal(callback) {
    var OneSignal = [];

    if (!window.OneSignal) {
      var script = document.createElement('script');
      script.src = 'https://cdn.onesignal.com/sdks/OneSignalSDK.js';
      script.async = true;

      script.onload = function () {
        OneSignal = window.OneSignal;
        OneSignal.push(function () {
          OneSignal.SERVICE_WORKER_PARAM = {
            scope: '/static/'
          };
          OneSignal.SERVICE_WORKER_PATH = 'static/OneSignalSDKWorker.js';
          OneSignal.SERVICE_WORKER_UPDATER_PATH = 'static/OneSignalSDKUpdaterWorker.js';
          OneSignal.init({
            appId: prod["a" /* default */].pushNotification.services.oneSignal.appID,
            autoResubscribe: true,
            autoRegister: true,
            notifyButton: {
              enable: false
            }
          });

          if (navigator.serviceWorker) {
            navigator.serviceWorker.register('/OneSignalSDKWorker.js?appId=' + prod["a" /* default */].pushNotification.services.oneSignal.appID);
          }
        });
        callback(OneSignal);
      };

      document.getElementsByTagName('head')[0].appendChild(script);
    } else {
      callback(window.OneSignal);
    }
  },
  createSocialShareUrl: createSocialShareUrl,
  showShareWindow: function showShareWindow(provider, url) {
    var pageTitle = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
    // Variables
    var width = 640;
    var height = 640;
    var left = screen.width / 2 - width / 2;
    var top = screen.height / 2 - height / 2;
    return window.open(createSocialShareUrl(provider, url, pageTitle), 'Share this', "width=".concat(width, ",height=").concat(height, ",left=").concat(left, ",top=").concat(top, ",toolbar=no,menubar=no,scrollbars=no"));
  },
  fireGenericAnalyticEvent: function fireGenericAnalyticEvent(options) {
    this.fireAnalyticEvent('genericEvent', options);
  },
  fireAnalyticEvent: function fireAnalyticEvent(eventName, options) {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push(_objectSpread({
      'event': eventName
    }, options));
  },
  selectAllText: function selectAllText(input) {
    setTimeout(() => {
      var sel;
      var range;

      if (window.getSelection && document.createRange) {
        range = document.createRange();
        range.selectNodeContents(input);
        sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
      } else if (document.body.createTextRange) {
        range = document.body.createTextRange();
        range.moveToElementText(input);
        range.select();
      }
    }, 1);
  },
  getFormattedTime: function getFormattedTime() {
    var date = new Date();
    return date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
  },
  getLocationDistance: function getLocationDistance(location1, location2) {
    var unit = 'K';
    var rlat1 = Math.PI * location1.lat / 180;
    var rlat2 = Math.PI * location2.lat / 180;
    var theta = location1.lng - location2.lng;
    var rtheta = Math.PI * theta / 180;
    var dist = Math.sin(rlat1) * Math.sin(rlat2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.cos(rtheta);
    dist = Math.acos(dist);
    dist = dist * 180 / Math.PI;
    dist = dist * 60 * 1.1515;

    if (unit === 'K') {
      dist = dist * 1.609344;
    }

    if (unit === 'N') {
      dist = dist * 0.8684;
    }

    return dist; // km
  },
  sortArrayOfObject: function sortArrayOfObject(arraysort, key) {
    arraysort.sort(compare);
    return arraysort;

    function compare(a, b) {
      var A = a[key].turkishToLower();
      var B = b[key].turkishToLower();
      return A.localeCompare(B, 'tr', {
        sensitivity: 'base'
      });
    }
  },
  generateConditionCode: function generateConditionCode(triggers, questionsMap, questionTypes) {
    var code = 'return (';

    if (triggers) {
      for (var i = 0; i < triggers.length; i++) {
        var trigger = triggers[i];
        var prevTrigger = triggers[i - 1] || {};

        if (prevTrigger.operator === 'or') {
          code += ') || (';
        } else if (prevTrigger.operator === 'and') {
          code += ' && ';
        }

        var q = trigger.questionId;
        var question = questionsMap[q]; // cant find assigned question, so abort mission

        if (!question) {
          return false;
        }

        var subType = question.questionType;

        if (question[question.questionType] && question[question.questionType].subType) {
          subType = question[question.questionType].subType;
        } // sub type conditions destekliyor mu?


        var generateConditionsCode = questionTypes[subType].generateConditionsCode;

        if (!generateConditionsCode) {
          // subtype içinde yoksa parent'a bak
          generateConditionsCode = questionTypes[question.questionType].generateConditionsCode;

          if (!generateConditionsCode) {
            continue;
          }
        }

        code += generateConditionsCode(trigger, question);
      }
    }

    code += ')';
    return code;
  },
  removeConditionsByQuestionId: function removeConditionsByQuestionId(form, questionId) {
    if (Array.isArray(form.conditions)) {
      (form.conditionsMap[questionId] || []).forEach(condition => {
        var i = form.conditions.findIndex(x => x._id === condition._id);
        form.conditions.splice(i, 1);
      });
      delete form.conditionsMap[questionId];
    }
  },
  removeConditionById: function removeConditionById(form, id) {
    var i = form.conditions.findIndex(x => x._id === id);
    form.conditions.splice(i, 1);
  },
  getQuestionSubType: function getQuestionSubType(q) {
    var qType = q.questionType;

    if (q[q.questionType] && q[q.questionType].subType) {
      qType = q[q.questionType].subType;
    }

    return qType;
  },
  randomNumberGenerate: function randomNumberGenerate(min, max, numberCount) {
    var randomNumbers = [];
    var i = 0;

    while (i < numberCount) {
      var rndNumber = Math.floor(Math.random() * (max - min) + min);

      if (randomNumbers.indexOf(rndNumber) < 0) {
        randomNumbers.push(rndNumber);
        i++;
      }
    }

    return randomNumbers;
  },
  brightnessByColor: function brightnessByColor(color) {
    var r = 0;
    var g = 0;
    var b = 0;
    color = '' + color;
    var isHEX = color.indexOf('#') === 0;
    var isRGB = color.indexOf('rgb') === 0;

    if (isHEX) {
      var hasFullSpec = color.length === 7;
      var m = color.substr(1).match(hasFullSpec ? /(\S{2})/g : /(\S{1})/g);

      if (m) {
        r = parseInt(m[0] + (hasFullSpec ? '' : m[0]), 16);
        g = parseInt(m[1] + (hasFullSpec ? '' : m[1]), 16);
        b = parseInt(m[2] + (hasFullSpec ? '' : m[2]), 16);
      }
    }

    if (isRGB) {
      var _m = color.match(/(\d+){3}/g);

      if (_m) {
        r = _m[0];
        g = _m[1];
        b = _m[2];
      }
    }

    if (typeof r !== 'undefined') {
      return (r * 299 + g * 587 + b * 114) / 1000;
    }
  },
  priceCommaFix: function priceCommaFix(price, decimal) {
    price = price.toString().replace(',', '.');
    price = Number(price).toFixed(decimal);
    return price;
    /* if (!isNaN(price)) {
    	return price;
    } else {
    	return Number(0.00);
    } */
  },
  getValueFromPath: function getValueFromPath(obj, path) {
    var i;
    path = path.split('.');

    for (i = 0; i < path.length - 1; i++) {
      obj = obj[path[i]];
    }

    return obj[path[i]];
  },
  setValueFromPath: function setValueFromPath(obj, value, path) {
    var i;
    path = path.split('.');

    for (i = 0; i < path.length - 1; i++) {
      obj = obj[path[i]];
    }

    obj[path[i]] = value;
  },
  serverSideErrorLocalization: function serverSideErrorLocalization(errorType, errorObject) {
    var langLabelKey = errorType + '.' + errorObject.errorCode; // questionTypes.505

    var langLabelParams = {};

    for (var propertyName in errorObject) {
      if (propertyName !== 'errorMessage' || propertyName !== 'errorCode') {
        langLabelParams[propertyName] = errorObject[propertyName];
      }
    }

    var langLabel = Object(errorenums["a" /* default */])(langLabelKey, langLabelParams);
    return langLabel && langLabel !== langLabelKey ? langLabel : errorObject.errorMessage.toString();
  },
  clearHtmlTags: function clearHtmlTags(htmlString) {
    if (!htmlString) {
      return '';
    }

    if (typeof htmlString !== 'string') {
      return '';
    }

    return htmlString.replace(/(<([^>]+)>)/ig, '');
  }
});

/***/ }),

/***/ "v/zc":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ISwitch_vue_vue_type_style_index_0_id_3d47fc94_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("DZ0e");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ISwitch_vue_vue_type_style_index_0_id_3d47fc94_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ISwitch_vue_vue_type_style_index_0_id_3d47fc94_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ISwitch_vue_vue_type_style_index_0_id_3d47fc94_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "wYly":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("YiV1");
/* harmony import */ var _lang__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("mSNy");


/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'termsandconditions',
  displayName: 'Terms & Conditions',
  displayOnToolbox: true,
  active: true,
  answerable: true,
  group: _questiontypesgroups__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"].other,
  displayIconHTML: 'check',
  componentDefaults: function componentDefaults() {
    return {
      questionType: 'termsandconditions',
      question: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.termsandconditions.termsConditionsApproval'),
      displayOrder: 0,
      isRequired: true,
      isDeleted: false,
      hardDefaultQuestionTitle: true,
      termsandconditions: {
        showQuestionTitle: false,
        label: {
          beforeLinkedText: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.termsandconditions.iAgreeTo') + ' ',
          linkedText: _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('questionTypes.termsandconditions.termsAndCondifitons'),
          afterLinkedText: '.'
        },
        content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam est turpis, fringilla at justo sit amet, faucibus elementum dolor. Proin eros tortor, consectetur ut erat quis, sollicitudin finibus nisl. Integer eleifend gravida urna id dictum. Quisque sollicitudin enim ac ligula tempor auctor. Donec sed mi suscipit, placerat mi at, cursus enim. Cras sit amet eros bibendum, vulputate dolor ut, blandit nisl. In ut ligula a est ultrices laoreet facilisis a ipsum. Sed vitae arcu non quam hendrerit pretium. Praesent suscipit leo lacus. Nam consectetur ac elit nec ornare. Curabitur dui augue, fringilla in ante hendrerit, suscipit pretium sapien.',
        url: ''
      }
    };
  },
  questionInputToAnswerModel: function questionInputToAnswerModel(question) {
    return {
      q: question._id,
      b: question.answer
    };
  },
  fixQuestionDefaultValueByAnswers: function fixQuestionDefaultValueByAnswers(question, questionAnswers) {
    question.defaultValue = questionAnswers.b;
  },
  createAnswerViewModel: function createAnswerViewModel(answer, question) {
    return {
      questionId: question._id,
      question: question.question,
      answer: {
        b: answer.b,
        type: 'component',
        questionType: 'termsandconditions'
      },
      createDate: answer.createDate
    };
  },
  createValidationRules: function createValidationRules(questionModel) {
    var rules = [];
    rules.push(v => !!v || _lang__WEBPACK_IMPORTED_MODULE_1__["default"].t('isRequired'));
    return rules;
  },
  fixQuestionNumber: function fixQuestionNumber(number, questionModel) {
    if (questionModel.termsandconditions.showQuestionTitle === false) {
      return number;
    } else {
      return number + 1;
    }
  },
  getDefaultAnswer: function getDefaultAnswer(questionModel) {
    return questionModel.defaultValue ? questionModel.defaultValue : false;
  }
});

/***/ }),

/***/ "x/hz":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var core_js_modules_es_array_slice__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("+2oP");
/* harmony import */ var core_js_modules_es_array_slice__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_slice__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("EnZy");
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_1__);


var init = {
  readAll: function readAll() {
    var cookies = document.cookie ? document.cookie.split('; ') : [];
    var jar = {};

    for (var i = 0; i < cookies.length; i++) {
      var parts = cookies[i].split('=');
      var cookie = parts.slice(1).join('=');
      jar[parts[0]] = cookie;
    }

    return jar;
  },
  readOne: function readOne(name) {
    return this.readAll()[name];
  },
  createCookie: function createCookie(name, value, days) {
    var expires = '';

    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = '; expires=' + date.toGMTString();
    }

    document.cookie = name + '=' + value + expires + '; path=/';
  },
  eraseCookie: function eraseCookie(name) {
    this.createCookie(name, '', -1);
  }
};
window.cookie = init;
/* harmony default export */ __webpack_exports__["a"] = (init);

/***/ }),

/***/ "x0pa":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("frYQ");

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

/***/ "xXl2":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("eUdF");

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

/***/ "y/pk":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

},[[0,115,129]],[21,145,83,110,143,121,111,150,151,154]]);