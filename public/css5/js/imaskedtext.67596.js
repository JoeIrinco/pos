(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[148],{

/***/ "C8wv":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IMaskedText.vue?vue&type=template&id=90d4d04c&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c(
      "div",
      {
        ref: "inputWrapper",
        staticClass: "input-field input",
        class: _vm.classes
      },
      [
        _vm.prependIcon
          ? _c("i-icon", {
              staticClass: "icon-left",
              attrs: { icon: _vm.prependIcon }
            })
          : _vm._e(),
        _vm._v(" "),
        _c(
          "masked-input",
          _vm._g(
            {
              ref: "input",
              attrs: {
                placeholder: _vm.placeholder,
                value: _vm.value,
                mask: _vm.maskText || _vm.mask,
                disabled: _vm.readonly
              },
              on: { input: _vm.updateValue }
            },
            _vm.events
          )
        ),
        _vm._v(" "),
        _vm.label
          ? _c(
              "label",
              {
                class: {
                  active: (_vm.value && _vm.value.length > 0) || _vm.isFocused
                },
                attrs: { for: _vm.id }
              },
              [_vm._v(_vm._s(_vm.label))]
            )
          : _vm._e()
      ],
      1
    ),
    _vm._v(" "),
    _c("div", [
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
  ])
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/designcomponents/components/IMaskedText.vue?vue&type=template&id=90d4d04c&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.object.assign.js
var es_object_assign = __webpack_require__("zKZe");

// EXTERNAL MODULE: ./src/designcomponents/mixins/validatable.js
var validatable = __webpack_require__("QCF4");

// EXTERNAL MODULE: ./src/designcomponents/mixins/component.js
var component = __webpack_require__("pbPK");

// EXTERNAL MODULE: ./node_modules/bson-objectid/objectid.js
var objectid = __webpack_require__("Gppw");
var objectid_default = /*#__PURE__*/__webpack_require__.n(objectid);

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.iterator.js
var es_array_iterator = __webpack_require__("4mDm");

// EXTERNAL MODULE: ./node_modules/core-js/modules/web.dom-collections.iterator.js
var web_dom_collections_iterator = __webpack_require__("3bBZ");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.slice.js
var es_array_slice = __webpack_require__("+2oP");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.splice.js
var es_array_splice = __webpack_require__("pDQq");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.regexp.to-string.js
var es_regexp_to_string = __webpack_require__("JfAA");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.split.js
var es_string_split = __webpack_require__("EnZy");

// CONCATENATED MODULE: ./src/designcomponents/components/MaskedText/inputmask-core.js





function extend(dest, src) {
  if (src) {
    var props = Object.keys(src);

    for (var i = 0, l = props.length; i < l; i++) {
      dest[props[i]] = src[props[i]];
    }
  }

  return dest;
}

function copy(obj) {
  return extend({}, obj);
}
/**
 * Merge an object defining format characters into the defaults.
 * Passing null/undefined for en existing format character removes it.
 * Passing a definition for an existing format character overrides it.
 * @param {?Object} formatCharacters.
 */


function mergeFormatCharacters(formatCharacters) {
  var merged = copy(DEFAULT_FORMAT_CHARACTERS);

  if (formatCharacters) {
    var chars = Object.keys(formatCharacters);

    for (var i = 0, l = chars.length; i < l; i++) {
      var char = chars[i];

      if (formatCharacters[char] == null) {
        delete merged[char];
      } else {
        merged[char] = formatCharacters[char];
      }
    }
  }

  return merged;
}

var ESCAPE_CHAR = '\\';
var DIGIT_RE = /^\d$/;
var LETTER_RE = /^[A-Za-z]$/;
var ALPHANNUMERIC_RE = /^[\dA-Za-z]$/;
var DEFAULT_PLACEHOLDER_CHAR = '_';
var DEFAULT_FORMAT_CHARACTERS = {
  '*': {
    validate: function validate(char) {
      return ALPHANNUMERIC_RE.test(char);
    }
  },
  '1': {
    validate: function validate(char) {
      return DIGIT_RE.test(char);
    }
  },
  'a': {
    validate: function validate(char) {
      return LETTER_RE.test(char);
    }
  },
  'A': {
    validate: function validate(char) {
      return LETTER_RE.test(char);
    },
    transform: function transform(char) {
      return char.toUpperCase();
    }
  },
  '#': {
    validate: function validate(char) {
      return ALPHANNUMERIC_RE.test(char);
    },
    transform: function transform(char) {
      return char.toUpperCase();
    }
  }
};
/**
 * @param {string} source
 * @patam {?Object} formatCharacters
 */

function Pattern(source, formatCharacters, placeholderChar, isRevealingMask) {
  if (!(this instanceof Pattern)) {
    return new Pattern(source, formatCharacters, placeholderChar);
  }
  /** Placeholder character */


  this.placeholderChar = placeholderChar || DEFAULT_PLACEHOLDER_CHAR;
  /** Format character definitions. */

  this.formatCharacters = formatCharacters || DEFAULT_FORMAT_CHARACTERS;
  /** Pattern definition string with escape characters. */

  this.source = source;
  /** Pattern characters after escape characters have been processed. */

  this.pattern = [];
  /** Length of the pattern after escape characters have been processed. */

  this.length = 0;
  /** Index of the first editable character. */

  this.firstEditableIndex = null;
  /** Index of the last editable character. */

  this.lastEditableIndex = null;
  /** Lookup for indices of editable characters in the pattern. */

  this._editableIndices = {};
  /** If true, only the pattern before the last valid value character shows. */

  this.isRevealingMask = isRevealingMask || false;

  this._parse();
}

Pattern.prototype._parse = function parse() {
  var sourceChars = this.source.split('');
  var patternIndex = 0;
  var pattern = [];

  for (var i = 0, l = sourceChars.length; i < l; i++) {
    var char = sourceChars[i];

    if (char === ESCAPE_CHAR) {
      if (i === l - 1) {
        throw new Error('InputMask: pattern ends with a raw ' + ESCAPE_CHAR);
      }

      char = sourceChars[++i];
    } else if (char in this.formatCharacters) {
      if (this.firstEditableIndex === null) {
        this.firstEditableIndex = patternIndex;
      }

      this.lastEditableIndex = patternIndex;
      this._editableIndices[patternIndex] = true;
    }

    pattern.push(char);
    patternIndex++;
  }

  if (this.firstEditableIndex === null) {
    throw new Error('InputMask: pattern "' + this.source + '" does not contain any editable characters.');
  }

  this.pattern = pattern;
  this.length = pattern.length;
};
/**
 * @param {Array<string>} value
 * @return {Array<string>}
 */


Pattern.prototype.formatValue = function format(value) {
  var valueBuffer = new Array(this.length);
  var valueIndex = 0;

  for (var i = 0, l = this.length; i < l; i++) {
    if (this.isEditableIndex(i)) {
      if (this.isRevealingMask && value.length <= valueIndex && !this.isValidAtIndex(value[valueIndex], i)) {
        break;
      }

      valueBuffer[i] = value.length > valueIndex && this.isValidAtIndex(value[valueIndex], i) ? this.transform(value[valueIndex], i) : this.placeholderChar;
      valueIndex++;
    } else {
      valueBuffer[i] = this.pattern[i]; // Also allow the value to contain static values from the pattern by
      // advancing its index.

      if (value.length > valueIndex && value[valueIndex] === this.pattern[i]) {
        valueIndex++;
      }
    }
  }

  return valueBuffer;
};
/**
 * @param {number} index
 * @return {boolean}
 */


Pattern.prototype.isEditableIndex = function isEditableIndex(index) {
  return !!this._editableIndices[index];
};
/**
 * @param {string} char
 * @param {number} index
 * @return {boolean}
 */


Pattern.prototype.isValidAtIndex = function isValidAtIndex(char, index) {
  return this.formatCharacters[this.pattern[index]].validate(char);
};

Pattern.prototype.transform = function transform(char, index) {
  var format = this.formatCharacters[this.pattern[index]];
  return typeof format.transform === 'function' ? format.transform(char) : char;
};

function InputMask(options) {
  if (!(this instanceof InputMask)) {
    return new InputMask(options);
  }

  options = extend({
    formatCharacters: null,
    pattern: null,
    isRevealingMask: false,
    placeholderChar: DEFAULT_PLACEHOLDER_CHAR,
    selection: {
      start: 0,
      end: 0
    },
    value: ''
  }, options);

  if (options.pattern == null) {
    throw new Error('InputMask: you must provide a pattern.');
  }

  if (typeof options.placeholderChar !== 'string' || options.placeholderChar.length > 1) {
    throw new Error('InputMask: placeholderChar should be a single character or an empty string.');
  }

  this.placeholderChar = options.placeholderChar;
  this.formatCharacters = mergeFormatCharacters(options.formatCharacters);
  this.setPattern(options.pattern, {
    value: options.value,
    selection: options.selection,
    isRevealingMask: options.isRevealingMask
  });
} // Editing

/**
 * Applies a single character of input based on the current selection.
 * @param {string} char
 * @return {boolean} true if a change has been made to value or selection as a
 *   result of the input, false otherwise.
 */


InputMask.prototype.input = function input(char) {
  // Ignore additional input if the cursor's at the end of the pattern
  if (this.selection.start === this.selection.end && this.selection.start === this.pattern.length) {
    return false;
  }

  var selectionBefore = copy(this.selection);
  var valueBefore = this.getValue();
  var inputIndex = this.selection.start; // If the cursor or selection is prior to the first editable character, make
  // sure any input given is applied to it.

  if (inputIndex < this.pattern.firstEditableIndex) {
    inputIndex = this.pattern.firstEditableIndex;
  } // Bail out or add the character to input


  if (this.pattern.isEditableIndex(inputIndex)) {
    if (!this.pattern.isValidAtIndex(char, inputIndex)) {
      return false;
    }

    this.value[inputIndex] = this.pattern.transform(char, inputIndex);
  } // If multiple characters were selected, blank the remainder out based on the
  // pattern.


  var end = this.selection.end - 1;

  while (end > inputIndex) {
    if (this.pattern.isEditableIndex(end)) {
      this.value[end] = this.placeholderChar;
    }

    end--;
  } // Advance the cursor to the next character


  this.selection.start = this.selection.end = inputIndex + 1; // Skip over any subsequent static characters

  while (this.pattern.length > this.selection.start && !this.pattern.isEditableIndex(this.selection.start)) {
    this.selection.start++;
    this.selection.end++;
  } // History


  if (this._historyIndex != null) {
    // Took more input after undoing, so blow any subsequent history away
    this._history.splice(this._historyIndex, this._history.length - this._historyIndex);

    this._historyIndex = null;
  }

  if ((this._lastOp !== 'input' || selectionBefore.start !== selectionBefore.end || this._lastSelection !== null) && selectionBefore.start !== this._lastSelection.start) {
    this._history.push({
      value: valueBefore,
      selection: selectionBefore,
      lastOp: this._lastOp
    });
  }

  this._lastOp = 'input';
  this._lastSelection = copy(this.selection);
  return true;
};
/**
 * Attempts to delete from the value based on the current cursor position or
 * selection.
 * @return {boolean} true if the value or selection changed as the result of
 *   backspacing, false otherwise.
 */


InputMask.prototype.backspace = function backspace() {
  // If the cursor is at the start there's nothing to do
  if (this.selection.start === 0 && this.selection.end === 0) {
    return false;
  }

  var selectionBefore = copy(this.selection);
  var valueBefore = this.getValue(); // No range selected - work on the character preceding the cursor

  if (this.selection.start === this.selection.end) {
    if (this.pattern.isEditableIndex(this.selection.start - 1)) {
      this.value[this.selection.start - 1] = this.placeholderChar;
    }

    this.selection.start--;
    this.selection.end--;
  } else {
    // Range selected - delete characters and leave the cursor at the start of the selection
    var end = this.selection.end - 1;

    while (end >= this.selection.start) {
      if (this.pattern.isEditableIndex(end)) {
        this.value[end] = this.placeholderChar;
      }

      end--;
    }

    this.selection.end = this.selection.start;
  } // History


  if (this._historyIndex != null) {
    // Took more input after undoing, so blow any subsequent history away
    this._history.splice(this._historyIndex, this._history.length - this._historyIndex);
  }

  if ((this._lastOp !== 'backspace' || selectionBefore.start !== selectionBefore.end || this._lastSelection !== null) && selectionBefore.start !== this._lastSelection.start) {
    this._history.push({
      value: valueBefore,
      selection: selectionBefore,
      lastOp: this._lastOp
    });
  }

  this._lastOp = 'backspace';
  this._lastSelection = copy(this.selection);
  return true;
};
/**
 * Attempts to paste a string of input at the current cursor position or over
 * the top of the current selection.
 * Invalid content at any position will cause the paste to be rejected, and it
 * may contain static parts of the mask's pattern.
 * @param {string} input
 * @return {boolean} true if the paste was successful, false otherwise.
 */


InputMask.prototype.paste = function paste(input) {
  // This is necessary because we're just calling input() with each character
  // and rolling back if any were invalid, rather than checking up-front.
  var initialState = {
    value: this.value.slice(),
    selection: copy(this.selection),
    _lastOp: this._lastOp,
    _history: this._history.slice(),
    _historyIndex: this._historyIndex,
    _lastSelection: copy(this._lastSelection)
  }; // If there are static characters at the start of the pattern and the cursor
  // or selection is within them, the static characters must match for a valid
  // paste.

  if (this.selection.start < this.pattern.firstEditableIndex) {
    for (var i = 0, l = this.pattern.firstEditableIndex - this.selection.start; i < l; i++) {
      if (input.charAt(i) !== this.pattern.pattern[i]) {
        return false;
      }
    } // Continue as if the selection and input started from the editable part of
    // the pattern.


    input = input.substring(this.pattern.firstEditableIndex - this.selection.start);
    this.selection.start = this.pattern.firstEditableIndex;
  }

  for (i = 0, l = input.length; i < l && this.selection.start <= this.pattern.lastEditableIndex; i++) {
    var valid = this.input(input.charAt(i)); // Allow static parts of the pattern to appear in pasted input - they will
    // already have been stepped over by input(), so verify that the value
    // deemed invalid by input() was the expected static character.

    if (!valid) {
      if (this.selection.start > 0) {
        // XXX This only allows for one static character to be skipped
        var patternIndex = this.selection.start - 1;

        if (!this.pattern.isEditableIndex(patternIndex) && input.charAt(i) === this.pattern.pattern[patternIndex]) {
          continue;
        }
      }

      extend(this, initialState);
      return false;
    }
  }

  return true;
}; // History


InputMask.prototype.undo = function undo() {
  // If there is no history, or nothing more on the history stack, we can't undo
  if (this._history.length === 0 || this._historyIndex === 0) {
    return false;
  }

  var historyItem;

  if (this._historyIndex == null) {
    // Not currently undoing, set up the initial history index
    this._historyIndex = this._history.length - 1;
    historyItem = this._history[this._historyIndex]; // Add a new history entry if anything has changed since the last one, so we
    // can redo back to the initial state we started undoing from.

    var value = this.getValue();

    if (historyItem.value !== value || historyItem.selection.start !== this.selection.start || historyItem.selection.end !== this.selection.end) {
      this._history.push({
        value: value,
        selection: copy(this.selection),
        lastOp: this._lastOp,
        startUndo: true
      });
    }
  } else {
    historyItem = this._history[--this._historyIndex];
  }

  this.value = historyItem.value.split('');
  this.selection = historyItem.selection;
  this._lastOp = historyItem.lastOp;
  return true;
};

InputMask.prototype.redo = function redo() {
  if (this._history.length === 0 || this._historyIndex == null) {
    return false;
  }

  var historyItem = this._history[++this._historyIndex]; // If this is the last history item, we're done redoing

  if (this._historyIndex === this._history.length - 1) {
    this._historyIndex = null; // If the last history item was only added to start undoing, remove it

    if (historyItem.startUndo) {
      this._history.pop();
    }
  }

  this.value = historyItem.value.split('');
  this.selection = historyItem.selection;
  this._lastOp = historyItem.lastOp;
  return true;
}; // Getters & setters


InputMask.prototype.setPattern = function setPattern(pattern, options) {
  options = extend({
    selection: {
      start: 0,
      end: 0
    },
    value: ''
  }, options);
  this.pattern = new Pattern(pattern, this.formatCharacters, this.placeholderChar, options.isRevealingMask);
  this.setValue(options.value);
  this.emptyValue = this.pattern.formatValue([]).join('');
  this.selection = options.selection;

  this._resetHistory();
};

InputMask.prototype.setSelection = function setSelection(selection) {
  this.selection = copy(selection);

  if (this.selection.start === this.selection.end) {
    if (this.selection.start < this.pattern.firstEditableIndex) {
      this.selection.start = this.selection.end = this.pattern.firstEditableIndex;
      return true;
    } // Set selection to the first editable, non-placeholder character before the selection
    // OR to the beginning of the pattern


    var index = this.selection.start;

    while (index >= this.pattern.firstEditableIndex) {
      if (this.pattern.isEditableIndex(index - 1) && (this.value[index - 1] !== this.placeholderChar || index === this.pattern.firstEditableIndex)) {
        this.selection.start = this.selection.end = index;
        break;
      }

      index--;
    }

    return true;
  }

  return false;
};

InputMask.prototype.setValue = function setValue(value) {
  if (!value) {
    value = '';
  }

  value = value.toString();
  this.value = this.pattern.formatValue(value.split(''));
};

InputMask.prototype.getValue = function getValue() {
  return this.value.join('');
};

InputMask.prototype.getRawValue = function getRawValue() {
  var rawValue = [];

  for (var i = 0; i < this.value.length; i++) {
    if (this.pattern._editableIndices[i] === true) {
      rawValue.push(this.value[i]);
    }
  }

  return rawValue.join('');
};

InputMask.prototype._resetHistory = function _resetHistory() {
  this._history = [];
  this._historyIndex = null;
  this._lastOp = null;
  this._lastSelection = copy(this.selection);
};

InputMask.Pattern = Pattern;
/* harmony default export */ var inputmask_core = (InputMask);
// CONCATENATED MODULE: ./src/designcomponents/components/MaskedText/ff-polyfill.js
// Copy paste from https://gist.github.com/nuxodin/9250e56a3ce6c0446efa
/* harmony default export */ var ff_polyfill = (function () {
  var w = window;
  var d = w.document;

  if (w.onfocusin === undefined) {
    d.addEventListener('focus', addPolyfill, true);
    d.addEventListener('blur', addPolyfill, true);
    d.addEventListener('focusin', removePolyfill, true);
    d.addEventListener('focusout', removePolyfill, true);
  }

  function addPolyfill(e) {
    var type = e.type === 'focus' ? 'focusin' : 'focusout';
    var event = new CustomEvent(type, {
      bubbles: true,
      cancelable: false
    });
    event.c1Generated = true;
    e.target.dispatchEvent(event);
  }

  function removePolyfill(e) {
    if (!e.c1Generated) {
      // focus after focusin, so chrome will the first time trigger tow times focusin
      d.removeEventListener('focus', addPolyfill, true);
      d.removeEventListener('blur', addPolyfill, true);
      d.removeEventListener('focusin', removePolyfill, true);
      d.removeEventListener('focusout', removePolyfill, true);
    }

    setTimeout(function () {
      d.removeEventListener('focusin', removePolyfill, true);
      d.removeEventListener('focusout', removePolyfill, true);
    });
  }
});
;
// CONCATENATED MODULE: ./src/designcomponents/components/MaskedText/MaskedInput.js


// https://github.com/niksmr/vue-masked-input

 // Firefox Polyfill for focus events

ff_polyfill();
/* harmony default export */ var MaskedInput = ({
  name: 'MaskedInput',

  render(h) {
    return h('input', {
      ref: 'input',
      attrs: {
        disabled: this.maskCore === null || this.disabled
      },
      domProps: {
        value: this.value
      },
      on: {
        keydown: this.keyDown,
        keypress: this.keyPress,
        keyup: this.keyUp,
        textInput: this.textInput,
        mouseup: this.mouseUp,
        focusout: this.focusOut,
        cut: this.cut,
        copy: this.copy,
        paste: this.paste
      }
    });
  },

  data: () => ({
    marginLeft: 0,
    maskCore: null,
    updateAfterAll: false
  }),
  props: {
    value: {
      type: String
    },
    mask: {
      required: true,
      validator: value => !!(value && value.length >= 1 || value instanceof Object)
    },
    placeholderChar: {
      type: String,
      default: '_',
      validator: value => !!(value && value.length === 1)
    },
    disabled: {
      type: Boolean,
      default: false
    }
  },
  watch: {
    mask(newValue, oldValue) {
      if (JSON.stringify(newValue) !== JSON.stringify(oldValue)) {
        this.initMask();
      }
    },

    value(newValue) {
      if (this.maskCore) {
        this.maskCore.setValue(newValue); // For multiple inputs support

        this.updateToCoreState();
      }
    }

  },

  mounted() {
    this.initMask();
  },

  methods: {
    initMask() {
      try {
        if (this.mask instanceof Object) {
          this.maskCore = new inputmask_core(this.mask);
        } else {
          this.maskCore = new inputmask_core({
            pattern: this.mask,
            value: '',
            placeholderChar: this.placeholderChar,
            formatCharacters: {
              'a': {
                validate: char => /^[A-Za-zА-Яа-я]$/.test(char)
              },
              'A': {
                validate: char => /^[A-Za-zА-Яа-я]$/.test(char),
                transform: char => char.toUpperCase()
              },
              '*': {
                validate: char => /^[\dA-Za-zА-Яа-я]$/.test(char)
              },
              '#': {
                validate: char => /^[\dA-Za-zА-Яа-я]$/.test(char),
                transform: char => char.toUpperCase()
              },
              '+': {
                validate: () => true
              }
            }
          });
        }

        [...this.$refs.input.value].reduce((memo, item) => this.maskCore.input(item), null);
        this.maskCore.setSelection({
          start: 0,
          end: 0
        });

        if (this.$refs.input.value === '') {
          this.$emit('input', '', '');
        } else {
          this.updateToCoreState();
        }
      } catch (e) {
        this.maskCore = null;
        this.$refs.input.value = 'Error';
        this.$emit('input', this.$refs.input.value, '');
      }
    },

    getValue() {
      return this.maskCore ? this.maskCore.getValue() : '';
    },

    keyDown(e) {
      // Always
      if (this.maskCore === null) {
        e.preventDefault();
        return;
      }

      this.setNativeSelection();

      switch (e.keyCode) {
        // backspace
        case 8:
          e.preventDefault();

          if (this.maskCore.selection.start > this.marginLeft || this.maskCore.selection.start !== this.maskCore.selection.end) {
            this.maskCore.backspace();
            this.updateToCoreState();
          }

          break;
        // left arrow

        case 37:
          e.preventDefault();

          if (this.$refs.input.selectionStart === this.$refs.input.selectionEnd) {
            // this.$refs.input.selectionEnd = this.$refs.input.selectionStart - 1; @TODO
            this.$refs.input.selectionStart -= 1;
          }

          this.maskCore.selection = {
            start: this.$refs.input.selectionStart,
            end: this.$refs.input.selectionStart
          };
          this.updateToCoreState();
          break;
        // right arrow

        case 39:
          e.preventDefault();

          if (this.$refs.input.selectionStart === this.$refs.input.selectionEnd) {
            this.$refs.input.selectionEnd += 1;
          }

          this.maskCore.selection = {
            start: this.$refs.input.selectionEnd,
            end: this.$refs.input.selectionEnd
          };
          this.updateToCoreState();
          break;
        // end

        case 35:
          e.preventDefault();
          this.$refs.input.selectionStart = this.$refs.input.value.length;
          this.$refs.input.selectionEnd = this.$refs.input.value.length;
          this.maskCore.selection = {
            start: this.$refs.input.selectionEnd,
            end: this.$refs.input.selectionEnd
          };
          this.updateToCoreState();
          break;
        // home

        case 36:
          e.preventDefault();
          this.$refs.input.selectionStart = 0;
          this.$refs.input.selectionEnd = 0;
          this.maskCore.selection = {
            start: this.$refs.input.selectionStart,
            end: this.$refs.input.selectionStart
          };
          this.updateToCoreState();
          break;
        // delete

        case 46:
          e.preventDefault();

          if (this.$refs.input.selectionStart === this.$refs.input.selectionEnd) {
            this.maskCore.setValue('');
            this.maskCore.setSelection({
              start: 0,
              end: 0
            });
            this.$refs.input.selectionStart = this.maskCore.selection.start;
            this.$refs.input.selectionEnd = this.maskCore.selection.start;
          } else {
            this.maskCore.backspace();
          }

          this.updateToCoreState();
          break;

        default:
          break;
      }
    },

    keyPress(e) {
      // works only on Desktop
      if (e.ctrlKey) {
        return;
      } // Fix FF copy/paste issue
      // IE & FF are not trigger textInput event, so we have to force it

      /* eslint-disable */


      var isIE =
      /*@cc_on!@*/
       false || !!document.documentMode; //by http://stackoverflow.com/questions/9847580/how-to-detect-safari-chrome-ie-firefox-and-opera-browser

      /* eslint-enable */

      var isFirefox = typeof InstallTrigger !== 'undefined';

      if (isIE || isFirefox) {
        e.preventDefault();
        e.data = e.key;
        this.textInput(e);
      }
    },

    textInput(e) {
      if (e.preventDefault) {
        e.preventDefault();
      }

      if (this.maskCore.input(e.data)) {
        this.updateAfterAll = true;
      }

      this.updateToCoreState();
    },

    keyUp(e) {
      if (e.keyCode === 9) {
        // Preven change selection for Tab in
        return;
      }

      this.updateToCoreState();
      this.updateAfterAll = false;
    },

    cut(e) {
      e.preventDefault();

      if (this.$refs.input.selectionStart !== this.$refs.input.selectionEnd) {
        try {
          document.execCommand('copy');
        } catch (err) {} // eslint-disable-line no-empty


        this.maskCore.backspace();
        this.updateToCoreState();
      }
    },

    copy() {},

    paste(e) {
      e.preventDefault();
      var text = e.clipboardData.getData('text');
      [...text].reduce((memo, item) => this.maskCore.input(item), null);
      this.updateToCoreState();
    },

    updateToCoreState() {
      if (this.maskCore === null) {
        return;
      }

      if (this.$refs.input.value !== this.maskCore.getValue()) {
        this.$refs.input.value = this.maskCore.getValue();
        this.$emit('input', this.$refs.input.value, this.maskCore.getRawValue());
      }

      this.$refs.input.selectionStart = this.maskCore.selection.start;
      this.$refs.input.selectionEnd = this.maskCore.selection.end;
    },

    isEmpty() {
      if (this.maskCore === null) {
        return true;
      }

      return this.maskCore.getValue() === this.maskCore.emptyValue;
    },

    focusOut() {
      if (this.isEmpty()) {
        this.$refs.input.value = '';
        this.maskCore.setSelection({
          start: 0,
          end: 0
        });
        this.$emit('input', '', '');
      }
    },

    setNativeSelection() {
      this.maskCore.selection = {
        start: this.$refs.input.selectionStart,
        end: this.$refs.input.selectionEnd
      };
    },

    mouseUp() {
      if (this.isEmpty() && this.$refs.input.selectionStart === this.$refs.input.selectionEnd) {
        this.maskCore.setSelection({
          start: 0,
          end: 0
        });
        this.$refs.input.selectionStart = this.maskCore.selection.start;
        this.$refs.input.selectionEnd = this.maskCore.selection.start;
        this.marginLeft = this.maskCore.selection.start;
        this.updateToCoreState();
      } else {
        this.setNativeSelection();
      }
    }

  }
});
// CONCATENATED MODULE: ./node_modules/babel-loader/lib?cacheDirectory!./node_modules/vue-loader/lib??vue-loader-options!./src/designcomponents/components/IMaskedText.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ var IMaskedTextvue_type_script_lang_js_ = ({
  name: 'IMaskedText',
  extends: validatable["a" /* default */],
  mixins: [component["a" /* default */]],
  components: {
    MaskedInput: MaskedInput
  },
  props: {
    appendIcon: String,
    prependIcon: String,
    label: String,
    mask: Object,
    maskText: String,
    value: [String, Number, Array],
    required: Boolean,
    placeholder: String,
    disabled: Boolean,
    hidden: Boolean,
    readonly: Boolean
  },
  data: function data() {
    return {
      id: objectid_default()().str,
      isFocused: false
    };
  },
  mounted: function mounted() {
    this.inputInit();
  },
  methods: {
    focus: function focus() {
      this.input.focus();
    },
    onFocus: function onFocus(e) {
      this.isFocused = true;
      this.$emit('focus', e);
    },
    onBlur: function onBlur(e) {
      this.isFocused = false;
      this.$emit('blur', e);
    },
    updateValue: function updateValue(e) {
      this.$emit('input', e);
      this.$emit('onChange', e);
    },
    setInputClasses: function setInputClasses() {
      this.input.classList.add('f-input');

      if (this.disabled) {
        this.input.classList.add('disabled');
      }

      if (this.hidden) {
        this.input.classList.add('hidden');
      }
    },
    inputInit: function inputInit() {
      this.setInputClasses();

      for (var name in this.events) {
        this.input.addEventListener(name, this.events[name], false);
      }

      this.input.setAttribute('id', this.id);
      this.input.setAttribute('tabindex', this.localTabIndex);
      this.input.setAttribute('required', this.required);
      this.input.setAttribute('disabled', this.disabled);
    }
  },
  computed: {
    input() {
      return this.$refs.input.$refs.input;
    },

    inputValue: {
      get() {
        return this.input.value;
      },

      cache: false
    },
    classes: function classes() {
      var classes = {
        'invalid-input-wrapper': this.errorMessage,
        'success-input-wrapper': !this.errorMessage
      };

      if (this.prependIcon) {
        classes['prepend-icon'] = true;
      }

      if (this.appendIcon) {
        classes['append-icon'] = true;
      }

      return classes;
    },
    events: function events() {
      var events = Object.assign({}, this.$listeners);
      events.input = this.updateValue;
      events.focus = this.onFocus;
      events.blur = this.onBlur;
      return events;
    }
  }
});
// CONCATENATED MODULE: ./src/designcomponents/components/IMaskedText.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_IMaskedTextvue_type_script_lang_js_ = (IMaskedTextvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/designcomponents/components/IMaskedText.vue?vue&type=style&index=0&id=90d4d04c&scoped=true&lang=scss&
var IMaskedTextvue_type_style_index_0_id_90d4d04c_scoped_true_lang_scss_ = __webpack_require__("SaTZ");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("KHd+");

// CONCATENATED MODULE: ./src/designcomponents/components/IMaskedText.vue






/* normalize component */

var IMaskedText_component = Object(componentNormalizer["a" /* default */])(
  components_IMaskedTextvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "90d4d04c",
  null
  
)

/* hot reload */
if (false) { var api; }
IMaskedText_component.options.__file = "src/designcomponents/components/IMaskedText.vue"
/* harmony default export */ var IMaskedText = __webpack_exports__["default"] = (IMaskedText_component.exports);

/***/ }),

/***/ "SaTZ":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IMaskedText_vue_vue_type_style_index_0_id_90d4d04c_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("nSTa");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IMaskedText_vue_vue_type_style_index_0_id_90d4d04c_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IMaskedText_vue_vue_type_style_index_0_id_90d4d04c_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_style_loader_dist_cjs_js_node_modules_mini_css_extract_plugin_dist_loader_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_sass_loader_dist_cjs_js_ref_1_3_node_modules_vue_loader_lib_index_js_vue_loader_options_IMaskedText_vue_vue_type_style_index_0_id_90d4d04c_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "nSTa":
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__("LboF");
            var content = __webpack_require__("pWRh");

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

/***/ "pWRh":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

}]);