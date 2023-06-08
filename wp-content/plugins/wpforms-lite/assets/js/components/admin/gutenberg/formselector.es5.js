(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
/* global wpforms_gutenberg_form_selector, Choices */
/* jshint es3: false, esversion: 6 */

'use strict';

/**
 * Gutenberg editor block.
 *
 * @since 1.8.1
 */
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(arr, i) { var _i = null == arr ? null : "undefined" != typeof Symbol && arr[Symbol.iterator] || arr["@@iterator"]; if (null != _i) { var _s, _e, _x, _r, _arr = [], _n = !0, _d = !1; try { if (_x = (_i = _i.call(arr)).next, 0 === i) { if (Object(_i) !== _i) return; _n = !1; } else for (; !(_n = (_s = _x.call(_i)).done) && (_arr.push(_s.value), _arr.length !== i); _n = !0); } catch (err) { _d = !0, _e = err; } finally { try { if (!_n && null != _i.return && (_r = _i.return(), Object(_r) !== _r)) return; } finally { if (_d) throw _e; } } return _arr; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
var WPForms = window.WPForms || {};
WPForms.FormSelector = WPForms.FormSelector || function (document, window, $) {
  var _wp = wp,
    _wp$serverSideRender = _wp.serverSideRender,
    ServerSideRender = _wp$serverSideRender === void 0 ? wp.components.ServerSideRender : _wp$serverSideRender;
  var _wp$element = wp.element,
    createElement = _wp$element.createElement,
    Fragment = _wp$element.Fragment,
    useState = _wp$element.useState;
  var registerBlockType = wp.blocks.registerBlockType;
  var _ref = wp.blockEditor || wp.editor,
    InspectorControls = _ref.InspectorControls,
    InspectorAdvancedControls = _ref.InspectorAdvancedControls,
    PanelColorSettings = _ref.PanelColorSettings;
  var _wp$components = wp.components,
    SelectControl = _wp$components.SelectControl,
    ToggleControl = _wp$components.ToggleControl,
    PanelBody = _wp$components.PanelBody,
    Placeholder = _wp$components.Placeholder,
    Flex = _wp$components.Flex,
    FlexBlock = _wp$components.FlexBlock,
    __experimentalUnitControl = _wp$components.__experimentalUnitControl,
    TextareaControl = _wp$components.TextareaControl,
    Button = _wp$components.Button,
    Modal = _wp$components.Modal;
  var _wpforms_gutenberg_fo = wpforms_gutenberg_form_selector,
    strings = _wpforms_gutenberg_fo.strings,
    defaults = _wpforms_gutenberg_fo.defaults,
    sizes = _wpforms_gutenberg_fo.sizes;
  var defaultStyleSettings = defaults;

  /**
   * Blocks runtime data.
   *
   * @since 1.8.1
   *
   * @type {object}
   */
  var blocks = {};

  /**
   * Whether it is needed to trigger server rendering.
   *
   * @since 1.8.1
   *
   * @type {boolean}
   */
  var triggerServerRender = true;

  /**
   * Public functions and properties.
   *
   * @since 1.8.1
   *
   * @type {object}
   */
  var app = {
    /**
     * Start the engine.
     *
     * @since 1.8.1
     */
    init: function init() {
      app.initDefaults();
      app.registerBlock();
      $(app.ready);
    },
    /**
     * Document ready.
     *
     * @since 1.8.1
     */
    ready: function ready() {
      app.events();
    },
    /**
     * Events.
     *
     * @since 1.8.1
     */
    events: function events() {
      $(window).on('wpformsFormSelectorEdit', _.debounce(app.blockEdit, 250)).on('wpformsFormSelectorFormLoaded', _.debounce(app.formLoaded, 250));
    },
    /**
     * Register block.
     *
     * @since 1.8.1
     */
    registerBlock: function registerBlock() {
      registerBlockType('wpforms/form-selector', {
        title: strings.title,
        description: strings.description,
        icon: app.getIcon(),
        keywords: strings.form_keywords,
        category: 'widgets',
        attributes: app.getBlockAttributes(),
        example: {
          attributes: {
            preview: true
          }
        },
        edit: function edit(props) {
          var attributes = props.attributes;
          var formOptions = app.getFormOptions();
          var sizeOptions = app.getSizeOptions();
          var handlers = app.getSettingsFieldsHandlers(props);

          // Store block clientId in attributes.
          props.setAttributes({
            clientId: props.clientId
          });

          // Main block settings.
          var jsx = [app.jsxParts.getMainSettings(attributes, handlers, formOptions)];

          // Form style settings & block content.
          if (attributes.formId) {
            jsx.push(app.jsxParts.getStyleSettings(attributes, handlers, sizeOptions), app.jsxParts.getAdvancedSettings(attributes, handlers), app.jsxParts.getBlockFormContent(props));
            handlers.updateCopyPasteContent();
            $(window).trigger('wpformsFormSelectorEdit', [props]);
            return jsx;
          }

          // Block preview picture.
          if (attributes.preview) {
            jsx.push(app.jsxParts.getBlockPreview());
            return jsx;
          }

          // Block placeholder (form selector).
          jsx.push(app.jsxParts.getBlockPlaceholder(props.attributes, handlers, formOptions));
          return jsx;
        },
        save: function save() {
          return null;
        }
      });
    },
    /**
     * Init default style settings.
     *
     * @since 1.8.1
     */
    initDefaults: function initDefaults() {
      ['formId', 'copyPasteValue'].forEach(function (key) {
        return delete defaultStyleSettings[key];
      });
    },
    /**
     * Block JSX parts.
     *
     * @since 1.8.1
     *
     * @type {object}
     */
    jsxParts: {
      /**
       * Get main settings JSX code.
       *
       * @since 1.8.1
       *
       * @param {object} attributes  Block attributes.
       * @param {object} handlers    Block event handlers.
       * @param {object} formOptions Form selector options.
       *
       * @returns {JSX.Element} Main setting JSX code.
       */
      getMainSettings: function getMainSettings(attributes, handlers, formOptions) {
        return /*#__PURE__*/React.createElement(InspectorControls, {
          key: "wpforms-gutenberg-form-selector-inspector-main-settings"
        }, /*#__PURE__*/React.createElement(PanelBody, {
          className: "wpforms-gutenberg-panel",
          title: strings.form_settings
        }, /*#__PURE__*/React.createElement(SelectControl, {
          label: strings.form_selected,
          value: attributes.formId,
          options: formOptions,
          onChange: function onChange(value) {
            return handlers.attrChange('formId', value);
          }
        }), /*#__PURE__*/React.createElement(ToggleControl, {
          label: strings.show_title,
          checked: attributes.displayTitle,
          onChange: function onChange(value) {
            return handlers.attrChange('displayTitle', value);
          }
        }), /*#__PURE__*/React.createElement(ToggleControl, {
          label: strings.show_description,
          checked: attributes.displayDesc,
          onChange: function onChange(value) {
            return handlers.attrChange('displayDesc', value);
          }
        }), /*#__PURE__*/React.createElement("p", {
          className: "wpforms-gutenberg-panel-notice"
        }, /*#__PURE__*/React.createElement("strong", null, strings.panel_notice_head), strings.panel_notice_text, /*#__PURE__*/React.createElement("a", {
          href: strings.panel_notice_link,
          rel: "noreferrer",
          target: "_blank"
        }, strings.panel_notice_link_text))));
      },
      /**
       * Get Field styles JSX code.
       *
       * @since 1.8.1
       *
       * @param {object} attributes  Block attributes.
       * @param {object} handlers    Block event handlers.
       * @param {object} sizeOptions Size selector options.
       *
       * @returns {JSX.Element} Field styles JSX code.
       */
      getFieldStyles: function getFieldStyles(attributes, handlers, sizeOptions) {
        // eslint-disable-line max-lines-per-function

        return /*#__PURE__*/React.createElement(PanelBody, {
          className: app.getPanelClass(attributes),
          title: strings.field_styles
        }, /*#__PURE__*/React.createElement("p", {
          className: "wpforms-gutenberg-panel-notice wpforms-use-modern-notice"
        }, /*#__PURE__*/React.createElement("strong", null, strings.use_modern_notice_head), strings.use_modern_notice_text, " ", /*#__PURE__*/React.createElement("a", {
          href: strings.use_modern_notice_link,
          rel: "noreferrer",
          target: "_blank"
        }, strings.learn_more)), /*#__PURE__*/React.createElement("p", {
          className: "wpforms-gutenberg-panel-notice wpforms-warning wpforms-lead-form-notice",
          style: {
            display: 'none'
          }
        }, /*#__PURE__*/React.createElement("strong", null, strings.lead_forms_panel_notice_head), strings.lead_forms_panel_notice_text), /*#__PURE__*/React.createElement(Flex, {
          gap: 4,
          align: "flex-start",
          className: 'wpforms-gutenberg-form-selector-flex',
          justify: "space-between"
        }, /*#__PURE__*/React.createElement(FlexBlock, null, /*#__PURE__*/React.createElement(SelectControl, {
          label: strings.size,
          value: attributes.fieldSize,
          options: sizeOptions,
          onChange: function onChange(value) {
            return handlers.styleAttrChange('fieldSize', value);
          }
        })), /*#__PURE__*/React.createElement(FlexBlock, null, /*#__PURE__*/React.createElement(__experimentalUnitControl, {
          label: strings.border_radius,
          value: attributes.fieldBorderRadius,
          isUnitSelectTabbable: true,
          onChange: function onChange(value) {
            return handlers.styleAttrChange('fieldBorderRadius', value);
          }
        }))), /*#__PURE__*/React.createElement("div", {
          className: "wpforms-gutenberg-form-selector-color-picker"
        }, /*#__PURE__*/React.createElement("div", {
          className: "wpforms-gutenberg-form-selector-control-label"
        }, strings.colors), /*#__PURE__*/React.createElement(PanelColorSettings, {
          __experimentalIsRenderedInSidebar: true,
          enableAlpha: true,
          showTitle: false,
          className: "wpforms-gutenberg-form-selector-color-panel",
          colorSettings: [{
            value: attributes.fieldBackgroundColor,
            onChange: function onChange(value) {
              return handlers.styleAttrChange('fieldBackgroundColor', value);
            },
            label: strings.background
          }, {
            value: attributes.fieldBorderColor,
            onChange: function onChange(value) {
              return handlers.styleAttrChange('fieldBorderColor', value);
            },
            label: strings.border
          }, {
            value: attributes.fieldTextColor,
            onChange: function onChange(value) {
              return handlers.styleAttrChange('fieldTextColor', value);
            },
            label: strings.text
          }]
        })));
      },
      /**
       * Get Label styles JSX code.
       *
       * @since 1.8.1
       *
       * @param {object} attributes  Block attributes.
       * @param {object} handlers    Block event handlers.
       * @param {object} sizeOptions Size selector options.
       *
       * @returns {JSX.Element} Label styles JSX code.
       */
      getLabelStyles: function getLabelStyles(attributes, handlers, sizeOptions) {
        return /*#__PURE__*/React.createElement(PanelBody, {
          className: app.getPanelClass(attributes),
          title: strings.label_styles
        }, /*#__PURE__*/React.createElement(SelectControl, {
          label: strings.size,
          value: attributes.labelSize,
          className: "wpforms-gutenberg-form-selector-fix-bottom-margin",
          options: sizeOptions,
          onChange: function onChange(value) {
            return handlers.styleAttrChange('labelSize', value);
          }
        }), /*#__PURE__*/React.createElement("div", {
          className: "wpforms-gutenberg-form-selector-color-picker"
        }, /*#__PURE__*/React.createElement("div", {
          className: "wpforms-gutenberg-form-selector-control-label"
        }, strings.colors), /*#__PURE__*/React.createElement(PanelColorSettings, {
          __experimentalIsRenderedInSidebar: true,
          enableAlpha: true,
          showTitle: false,
          className: "wpforms-gutenberg-form-selector-color-panel",
          colorSettings: [{
            value: attributes.labelColor,
            onChange: function onChange(value) {
              return handlers.styleAttrChange('labelColor', value);
            },
            label: strings.label
          }, {
            value: attributes.labelSublabelColor,
            onChange: function onChange(value) {
              return handlers.styleAttrChange('labelSublabelColor', value);
            },
            label: strings.sublabel_hints.replace('&amp;', '&')
          }, {
            value: attributes.labelErrorColor,
            onChange: function onChange(value) {
              return handlers.styleAttrChange('labelErrorColor', value);
            },
            label: strings.error_message
          }]
        })));
      },
      /**
       * Get Button styles JSX code.
       *
       * @since 1.8.1
       *
       * @param {object} attributes  Block attributes.
       * @param {object} handlers    Block event handlers.
       * @param {object} sizeOptions Size selector options.
       *
       * @returns {JSX.Element}  Button styles JSX code.
       */
      getButtonStyles: function getButtonStyles(attributes, handlers, sizeOptions) {
        return /*#__PURE__*/React.createElement(PanelBody, {
          className: app.getPanelClass(attributes),
          title: strings.button_styles
        }, /*#__PURE__*/React.createElement(Flex, {
          gap: 4,
          align: "flex-start",
          className: 'wpforms-gutenberg-form-selector-flex',
          justify: "space-between"
        }, /*#__PURE__*/React.createElement(FlexBlock, null, /*#__PURE__*/React.createElement(SelectControl, {
          label: strings.size,
          value: attributes.buttonSize,
          options: sizeOptions,
          onChange: function onChange(value) {
            return handlers.styleAttrChange('buttonSize', value);
          }
        })), /*#__PURE__*/React.createElement(FlexBlock, null, /*#__PURE__*/React.createElement(__experimentalUnitControl, {
          onChange: function onChange(value) {
            return handlers.styleAttrChange('buttonBorderRadius', value);
          },
          label: strings.border_radius,
          isUnitSelectTabbable: true,
          value: attributes.buttonBorderRadius
        }))), /*#__PURE__*/React.createElement("div", {
          className: "wpforms-gutenberg-form-selector-color-picker"
        }, /*#__PURE__*/React.createElement("div", {
          className: "wpforms-gutenberg-form-selector-control-label"
        }, strings.colors), /*#__PURE__*/React.createElement(PanelColorSettings, {
          __experimentalIsRenderedInSidebar: true,
          enableAlpha: true,
          showTitle: false,
          className: "wpforms-gutenberg-form-selector-color-panel",
          colorSettings: [{
            value: attributes.buttonBackgroundColor,
            onChange: function onChange(value) {
              return handlers.styleAttrChange('buttonBackgroundColor', value);
            },
            label: strings.background
          }, {
            value: attributes.buttonTextColor,
            onChange: function onChange(value) {
              return handlers.styleAttrChange('buttonTextColor', value);
            },
            label: strings.text
          }]
        }), /*#__PURE__*/React.createElement("div", {
          className: "wpforms-gutenberg-form-selector-legend wpforms-button-color-notice"
        }, strings.button_color_notice)));
      },
      /**
       * Get style settings JSX code.
       *
       * @since 1.8.1
       *
       * @param {object} attributes  Block attributes.
       * @param {object} handlers    Block event handlers.
       * @param {object} sizeOptions Size selector options.
       *
       * @returns {JSX.Element} Inspector controls JSX code.
       */
      getStyleSettings: function getStyleSettings(attributes, handlers, sizeOptions) {
        return /*#__PURE__*/React.createElement(InspectorControls, {
          key: "wpforms-gutenberg-form-selector-style-settings"
        }, app.jsxParts.getFieldStyles(attributes, handlers, sizeOptions), app.jsxParts.getLabelStyles(attributes, handlers, sizeOptions), app.jsxParts.getButtonStyles(attributes, handlers, sizeOptions));
      },
      /**
       * Get advanced settings JSX code.
       *
       * @since 1.8.1
       *
       * @param {object} attributes Block attributes.
       * @param {object} handlers   Block event handlers.
       *
       * @returns {JSX.Element} Inspector advanced controls JSX code.
       */
      getAdvancedSettings: function getAdvancedSettings(attributes, handlers) {
        var _useState = useState(false),
          _useState2 = _slicedToArray(_useState, 2),
          isOpen = _useState2[0],
          setOpen = _useState2[1];
        var openModal = function openModal() {
          return setOpen(true);
        };
        var closeModal = function closeModal() {
          return setOpen(false);
        };
        return /*#__PURE__*/React.createElement(InspectorAdvancedControls, null, /*#__PURE__*/React.createElement("div", {
          className: app.getPanelClass(attributes)
        }, /*#__PURE__*/React.createElement(TextareaControl, {
          label: strings.copy_paste_settings,
          rows: "4",
          spellCheck: "false",
          value: attributes.copyPasteValue,
          onChange: function onChange(value) {
            return handlers.pasteSettings(value);
          }
        }), /*#__PURE__*/React.createElement("div", {
          className: "wpforms-gutenberg-form-selector-legend",
          dangerouslySetInnerHTML: {
            __html: strings.copy_paste_notice
          }
        }), /*#__PURE__*/React.createElement(Button, {
          className: "wpforms-gutenberg-form-selector-reset-button",
          onClick: openModal
        }, strings.reset_style_settings)), isOpen && /*#__PURE__*/React.createElement(Modal, {
          className: "wpforms-gutenberg-modal",
          title: strings.reset_style_settings,
          onRequestClose: closeModal
        }, /*#__PURE__*/React.createElement("p", null, strings.reset_settings_confirm_text), /*#__PURE__*/React.createElement(Flex, {
          gap: 3,
          align: "center",
          justify: "flex-end"
        }, /*#__PURE__*/React.createElement(Button, {
          isSecondary: true,
          onClick: closeModal
        }, strings.btn_no), /*#__PURE__*/React.createElement(Button, {
          isPrimary: true,
          onClick: function onClick() {
            closeModal();
            handlers.resetSettings();
          }
        }, strings.btn_yes_reset))));
      },
      /**
       * Get block content JSX code.
       *
       * @since 1.8.1
       *
       * @param {object} props Block properties.
       *
       * @returns {JSX.Element} Block content JSX code.
       */
      getBlockFormContent: function getBlockFormContent(props) {
        if (triggerServerRender) {
          return /*#__PURE__*/React.createElement(ServerSideRender, {
            key: "wpforms-gutenberg-form-selector-server-side-renderer",
            block: "wpforms/form-selector",
            attributes: props.attributes
          });
        }
        var clientId = props.clientId;
        var block = app.getBlockContainer(props);

        // In the case of empty content, use server side renderer.
        // This happens when the block is duplicated or converted to a reusable block.
        if (!block || !block.innerHTML) {
          triggerServerRender = true;
          return app.jsxParts.getBlockFormContent(props);
        }
        blocks[clientId] = blocks[clientId] || {};
        blocks[clientId].blockHTML = block.innerHTML;
        blocks[clientId].loadedFormId = props.attributes.formId;
        return /*#__PURE__*/React.createElement(Fragment, {
          key: "wpforms-gutenberg-form-selector-fragment-form-html"
        }, /*#__PURE__*/React.createElement("div", {
          dangerouslySetInnerHTML: {
            __html: blocks[clientId].blockHTML
          }
        }));
      },
      /**
       * Get block preview JSX code.
       *
       * @since 1.8.1
       *
       * @returns {JSX.Element} Block preview JSX code.
       */
      getBlockPreview: function getBlockPreview() {
        return /*#__PURE__*/React.createElement(Fragment, {
          key: "wpforms-gutenberg-form-selector-fragment-block-preview"
        }, /*#__PURE__*/React.createElement("img", {
          src: wpforms_gutenberg_form_selector.block_preview_url,
          style: {
            width: '100%'
          }
        }));
      },
      /**
       * Get block placeholder (form selector) JSX code.
       *
       * @since 1.8.1
       *
       * @param {object} attributes  Block attributes.
       * @param {object} handlers    Block event handlers.
       * @param {object} formOptions Form selector options.
       *
       * @returns {JSX.Element} Block placeholder JSX code.
       */
      getBlockPlaceholder: function getBlockPlaceholder(attributes, handlers, formOptions) {
        return /*#__PURE__*/React.createElement(Placeholder, {
          key: "wpforms-gutenberg-form-selector-wrap",
          className: "wpforms-gutenberg-form-selector-wrap"
        }, /*#__PURE__*/React.createElement("img", {
          src: wpforms_gutenberg_form_selector.logo_url
        }), /*#__PURE__*/React.createElement("h3", null, strings.title), /*#__PURE__*/React.createElement(SelectControl, {
          key: "wpforms-gutenberg-form-selector-select-control",
          value: attributes.formId,
          options: formOptions,
          onChange: function onChange(value) {
            return handlers.attrChange('formId', value);
          }
        }));
      }
    },
    /**
     * Get Style Settings panel class.
     *
     * @since 1.8.1
     *
     * @param {object} attributes Block attributes.
     *
     * @returns {string} Style Settings panel class.
     */
    getPanelClass: function getPanelClass(attributes) {
      var cssClass = 'wpforms-gutenberg-panel wpforms-block-settings-' + attributes.clientId;
      if (!app.isFullStylingEnabled()) {
        cssClass += ' disabled_panel';
      }
      return cssClass;
    },
    /**
     * Determine whether the full styling is enabled.
     *
     * @since 1.8.1
     *
     * @returns {boolean} Whether the full styling is enabled.
     */
    isFullStylingEnabled: function isFullStylingEnabled() {
      return wpforms_gutenberg_form_selector.is_modern_markup && wpforms_gutenberg_form_selector.is_full_styling;
    },
    /**
     * Get block container DOM element.
     *
     * @since 1.8.1
     *
     * @param {object} props Block properties.
     *
     * @returns {Element} Block container.
     */
    getBlockContainer: function getBlockContainer(props) {
      var blockSelector = "#block-".concat(props.clientId, " > div");
      var block = document.querySelector(blockSelector);

      // For FSE / Gutenberg plugin we need to take a look inside the iframe.
      if (!block) {
        var editorCanvas = document.querySelector('iframe[name="editor-canvas"]');
        block = editorCanvas && editorCanvas.contentWindow.document.querySelector(blockSelector);
      }
      return block;
    },
    /**
     * Get settings fields event handlers.
     *
     * @since 1.8.1
     *
     * @param {object} props Block properties.
     *
     * @returns {object} Object that contains event handlers for the settings fields.
     */
    getSettingsFieldsHandlers: function getSettingsFieldsHandlers(props) {
      // eslint-disable-line max-lines-per-function

      return {
        /**
         * Field style attribute change event handler.
         *
         * @since 1.8.1
         *
         * @param {string} attribute Attribute name.
         * @param {string} value     New attribute value.
         */
        styleAttrChange: function styleAttrChange(attribute, value) {
          var block = app.getBlockContainer(props),
            container = block.querySelector("#wpforms-".concat(props.attributes.formId)),
            property = attribute.replace(/[A-Z]/g, function (letter) {
              return "-".concat(letter.toLowerCase());
            }),
            setAttr = {};
          if (container) {
            switch (property) {
              case 'field-size':
              case 'label-size':
              case 'button-size':
                for (var key in sizes[property][value]) {
                  container.style.setProperty("--wpforms-".concat(property, "-").concat(key), sizes[property][value][key]);
                }
                break;
              default:
                container.style.setProperty("--wpforms-".concat(property), value);
            }
          }
          setAttr[attribute] = value;
          props.setAttributes(setAttr);
          triggerServerRender = false;
          this.updateCopyPasteContent();
          $(window).trigger('wpformsFormSelectorStyleAttrChange', [block, props, attribute, value]);
        },
        /**
         * Field regular attribute change event handler.
         *
         * @since 1.8.1
         *
         * @param {string} attribute Attribute name.
         * @param {string} value     New attribute value.
         */
        attrChange: function attrChange(attribute, value) {
          var setAttr = {};
          setAttr[attribute] = value;
          props.setAttributes(setAttr);
          triggerServerRender = true;
          this.updateCopyPasteContent();
        },
        /**
         * Reset Form Styles settings to defaults.
         *
         * @since 1.8.1
         */
        resetSettings: function resetSettings() {
          for (var key in defaultStyleSettings) {
            this.styleAttrChange(key, defaultStyleSettings[key]);
          }
        },
        /**
         * Update content of the "Copy/Paste" fields.
         *
         * @since 1.8.1
         */
        updateCopyPasteContent: function updateCopyPasteContent() {
          var content = {};
          var atts = wp.data.select('core/block-editor').getBlockAttributes(props.clientId);
          for (var key in defaultStyleSettings) {
            content[key] = atts[key];
          }
          props.setAttributes({
            'copyPasteValue': JSON.stringify(content)
          });
        },
        /**
         * Paste settings handler.
         *
         * @since 1.8.1
         *
         * @param {string} value New attribute value.
         */
        pasteSettings: function pasteSettings(value) {
          var pasteAttributes = app.parseValidateJson(value);
          if (!pasteAttributes) {
            wp.data.dispatch('core/notices').createErrorNotice(strings.copy_paste_error, {
              id: 'wpforms-json-parse-error'
            });
            this.updateCopyPasteContent();
            return;
          }
          pasteAttributes.copyPasteValue = value;
          props.setAttributes(pasteAttributes);
          triggerServerRender = true;
        }
      };
    },
    /**
     * Parse and validate JSON string.
     *
     * @since 1.8.1
     *
     * @param {string} value JSON string.
     *
     * @returns {boolean|object} Parsed JSON object OR false on error.
     */
    parseValidateJson: function parseValidateJson(value) {
      if (typeof value !== 'string') {
        return false;
      }
      var atts;
      try {
        atts = JSON.parse(value);
      } catch (error) {
        atts = false;
      }
      return atts;
    },
    /**
     * Get WPForms icon DOM element.
     *
     * @since 1.8.1
     *
     * @returns {DOM.element} WPForms icon DOM element.
     */
    getIcon: function getIcon() {
      return createElement('svg', {
        width: 20,
        height: 20,
        viewBox: '0 0 612 612',
        className: 'dashicon'
      }, createElement('path', {
        fill: 'currentColor',
        d: 'M544,0H68C30.445,0,0,30.445,0,68v476c0,37.556,30.445,68,68,68h476c37.556,0,68-30.444,68-68V68 C612,30.445,581.556,0,544,0z M464.44,68L387.6,120.02L323.34,68H464.44z M288.66,68l-64.26,52.02L147.56,68H288.66z M544,544H68 V68h22.1l136,92.14l79.9-64.6l79.56,64.6l136-92.14H544V544z M114.24,263.16h95.88v-48.28h-95.88V263.16z M114.24,360.4h95.88 v-48.62h-95.88V360.4z M242.76,360.4h255v-48.62h-255V360.4L242.76,360.4z M242.76,263.16h255v-48.28h-255V263.16L242.76,263.16z M368.22,457.3h129.54V408H368.22V457.3z'
      }));
    },
    /**
     * Get block attributes.
     *
     * @since 1.8.1
     *
     * @returns {object} Block attributes.
     */
    getBlockAttributes: function getBlockAttributes() {
      // eslint-disable-line max-lines-per-function

      return {
        clientId: {
          type: 'string',
          default: ''
        },
        formId: {
          type: 'string',
          default: defaults.formId
        },
        displayTitle: {
          type: 'boolean',
          default: defaults.displayTitle
        },
        displayDesc: {
          type: 'boolean',
          default: defaults.displayDesc
        },
        preview: {
          type: 'boolean'
        },
        fieldSize: {
          type: 'string',
          default: defaults.fieldSize
        },
        fieldBorderRadius: {
          type: 'string',
          default: defaults.fieldBorderRadius
        },
        fieldBackgroundColor: {
          type: 'string',
          default: defaults.fieldBackgroundColor
        },
        fieldBorderColor: {
          type: 'string',
          default: defaults.fieldBorderColor
        },
        fieldTextColor: {
          type: 'string',
          default: defaults.fieldTextColor
        },
        labelSize: {
          type: 'string',
          default: defaults.labelSize
        },
        labelColor: {
          type: 'string',
          default: defaults.labelColor
        },
        labelSublabelColor: {
          type: 'string',
          default: defaults.labelSublabelColor
        },
        labelErrorColor: {
          type: 'string',
          default: defaults.labelErrorColor
        },
        buttonSize: {
          type: 'string',
          default: defaults.buttonSize
        },
        buttonBorderRadius: {
          type: 'string',
          default: defaults.buttonBorderRadius
        },
        buttonBackgroundColor: {
          type: 'string',
          default: defaults.buttonBackgroundColor
        },
        buttonTextColor: {
          type: 'string',
          default: defaults.buttonTextColor
        },
        copyPasteValue: {
          type: 'string',
          default: defaults.copyPasteValue
        }
      };
    },
    /**
     * Get form selector options.
     *
     * @since 1.8.1
     *
     * @returns {Array} Form options.
     */
    getFormOptions: function getFormOptions() {
      var formOptions = wpforms_gutenberg_form_selector.forms.map(function (value) {
        return {
          value: value.ID,
          label: value.post_title
        };
      });
      formOptions.unshift({
        value: '',
        label: strings.form_select
      });
      return formOptions;
    },
    /**
     * Get size selector options.
     *
     * @since 1.8.1
     *
     * @returns {Array} Size options.
     */
    getSizeOptions: function getSizeOptions() {
      return [{
        label: strings.small,
        value: 'small'
      }, {
        label: strings.medium,
        value: 'medium'
      }, {
        label: strings.large,
        value: 'large'
      }];
    },
    /**
     * Event `wpformsFormSelectorEdit` handler.
     *
     * @since 1.8.1
     *
     * @param {object} e     Event object.
     * @param {object} props Block properties.
     */
    blockEdit: function blockEdit(e, props) {
      var block = app.getBlockContainer(props);
      if (!block || !block.dataset) {
        return;
      }
      app.initLeadFormSettings(block.parentElement);
    },
    /**
     * Init Lead Form Settings panels.
     *
     * @since 1.8.1
     *
     * @param {Element} block Block element.
     */
    initLeadFormSettings: function initLeadFormSettings(block) {
      if (!block || !block.dataset) {
        return;
      }
      if (!app.isFullStylingEnabled()) {
        return;
      }
      var clientId = block.dataset.block;
      var $form = $(block.querySelector('.wpforms-container'));
      var $panel = $(".wpforms-block-settings-".concat(clientId));
      if ($form.hasClass('wpforms-lead-forms-container')) {
        $panel.addClass('disabled_panel').find('.wpforms-gutenberg-panel-notice.wpforms-lead-form-notice').css('display', 'block');
        $panel.find('.wpforms-gutenberg-panel-notice.wpforms-use-modern-notice').css('display', 'none');
        return;
      }
      $panel.removeClass('disabled_panel').find('.wpforms-gutenberg-panel-notice.wpforms-lead-form-notice').css('display', 'none');
      $panel.find('.wpforms-gutenberg-panel-notice.wpforms-use-modern-notice').css('display', null);
    },
    /**
     * Event `wpformsFormSelectorFormLoaded` handler.
     *
     * @since 1.8.1
     *
     * @param {object} e Event object.
     */
    formLoaded: function formLoaded(e) {
      app.initLeadFormSettings(e.detail.block);
      app.updateAccentColors(e.detail);
      app.loadChoicesJS(e.detail);
      app.initRichTextField(e.detail.formId);
      $(e.detail.block).off('click').on('click', app.blockClick);
    },
    /**
     * Click on the block event handler.
     *
     * @since 1.8.1
     *
     * @param {object} e Event object.
     */
    blockClick: function blockClick(e) {
      app.initLeadFormSettings(e.currentTarget);
    },
    /**
     * Update accent colors of some fields in GB block in Modern Markup mode.
     *
     * @since 1.8.1
     *
     * @param {object} detail Event details object.
     */
    updateAccentColors: function updateAccentColors(detail) {
      if (!wpforms_gutenberg_form_selector.is_modern_markup || !window.WPForms || !window.WPForms.FrontendModern || !detail.block) {
        return;
      }
      var $form = $(detail.block.querySelector("#wpforms-".concat(detail.formId))),
        FrontendModern = window.WPForms.FrontendModern;
      FrontendModern.updateGBBlockPageIndicatorColor($form);
      FrontendModern.updateGBBlockIconChoicesColor($form);
      FrontendModern.updateGBBlockRatingColor($form);
    },
    /**
     * Init Modern style Dropdown fields (<select>).
     *
     * @since 1.8.1
     *
     * @param {object} detail Event details object.
     */
    loadChoicesJS: function loadChoicesJS(detail) {
      if (typeof window.Choices !== 'function') {
        return;
      }
      var $form = $(detail.block.querySelector("#wpforms-".concat(detail.formId)));
      $form.find('.choicesjs-select').each(function (idx, el) {
        var $el = $(el);
        if ($el.data('choice') === 'active') {
          return;
        }
        var args = window.wpforms_choicesjs_config || {},
          searchEnabled = $el.data('search-enabled'),
          $field = $el.closest('.wpforms-field');
        args.searchEnabled = 'undefined' !== typeof searchEnabled ? searchEnabled : true;
        args.callbackOnInit = function () {
          var self = this,
            $element = $(self.passedElement.element),
            $input = $(self.input.element),
            sizeClass = $element.data('size-class');

          // Add CSS-class for size.
          if (sizeClass) {
            $(self.containerOuter.element).addClass(sizeClass);
          }

          /**
           * If a multiple select has selected choices - hide a placeholder text.
           * In case if select is empty - we return placeholder text back.
           */
          if ($element.prop('multiple')) {
            // On init event.
            $input.data('placeholder', $input.attr('placeholder'));
            if (self.getValue(true).length) {
              $input.removeAttr('placeholder');
            }
          }
          this.disable();
          $field.find('.is-disabled').removeClass('is-disabled');
        };
        try {
          var choicesInstance = new Choices(el, args);

          // Save Choices.js instance for future access.
          $el.data('choicesjs', choicesInstance);
        } catch (e) {} // eslint-disable-line no-empty
      });
    },

    /**
     * Initialize RichText field.
     *
     * @since 1.8.1
     *
     * @param {int} formId Form ID.
     */
    initRichTextField: function initRichTextField(formId) {
      // Set default tab to `Visual`.
      $("#wpforms-".concat(formId, " .wp-editor-wrap")).removeClass('html-active').addClass('tmce-active');
    }
  };

  // Provide access to public functions/properties.
  return app;
}(document, window, jQuery);

// Initialize.
WPForms.FormSelector.init();
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJXUEZvcm1zIiwid2luZG93IiwiRm9ybVNlbGVjdG9yIiwiZG9jdW1lbnQiLCIkIiwid3AiLCJzZXJ2ZXJTaWRlUmVuZGVyIiwiU2VydmVyU2lkZVJlbmRlciIsImNvbXBvbmVudHMiLCJlbGVtZW50IiwiY3JlYXRlRWxlbWVudCIsIkZyYWdtZW50IiwidXNlU3RhdGUiLCJyZWdpc3RlckJsb2NrVHlwZSIsImJsb2NrcyIsImJsb2NrRWRpdG9yIiwiZWRpdG9yIiwiSW5zcGVjdG9yQ29udHJvbHMiLCJJbnNwZWN0b3JBZHZhbmNlZENvbnRyb2xzIiwiUGFuZWxDb2xvclNldHRpbmdzIiwiU2VsZWN0Q29udHJvbCIsIlRvZ2dsZUNvbnRyb2wiLCJQYW5lbEJvZHkiLCJQbGFjZWhvbGRlciIsIkZsZXgiLCJGbGV4QmxvY2siLCJfX2V4cGVyaW1lbnRhbFVuaXRDb250cm9sIiwiVGV4dGFyZWFDb250cm9sIiwiQnV0dG9uIiwiTW9kYWwiLCJ3cGZvcm1zX2d1dGVuYmVyZ19mb3JtX3NlbGVjdG9yIiwic3RyaW5ncyIsImRlZmF1bHRzIiwic2l6ZXMiLCJkZWZhdWx0U3R5bGVTZXR0aW5ncyIsInRyaWdnZXJTZXJ2ZXJSZW5kZXIiLCJhcHAiLCJpbml0IiwiaW5pdERlZmF1bHRzIiwicmVnaXN0ZXJCbG9jayIsInJlYWR5IiwiZXZlbnRzIiwib24iLCJfIiwiZGVib3VuY2UiLCJibG9ja0VkaXQiLCJmb3JtTG9hZGVkIiwidGl0bGUiLCJkZXNjcmlwdGlvbiIsImljb24iLCJnZXRJY29uIiwia2V5d29yZHMiLCJmb3JtX2tleXdvcmRzIiwiY2F0ZWdvcnkiLCJhdHRyaWJ1dGVzIiwiZ2V0QmxvY2tBdHRyaWJ1dGVzIiwiZXhhbXBsZSIsInByZXZpZXciLCJlZGl0IiwicHJvcHMiLCJmb3JtT3B0aW9ucyIsImdldEZvcm1PcHRpb25zIiwic2l6ZU9wdGlvbnMiLCJnZXRTaXplT3B0aW9ucyIsImhhbmRsZXJzIiwiZ2V0U2V0dGluZ3NGaWVsZHNIYW5kbGVycyIsInNldEF0dHJpYnV0ZXMiLCJjbGllbnRJZCIsImpzeCIsImpzeFBhcnRzIiwiZ2V0TWFpblNldHRpbmdzIiwiZm9ybUlkIiwicHVzaCIsImdldFN0eWxlU2V0dGluZ3MiLCJnZXRBZHZhbmNlZFNldHRpbmdzIiwiZ2V0QmxvY2tGb3JtQ29udGVudCIsInVwZGF0ZUNvcHlQYXN0ZUNvbnRlbnQiLCJ0cmlnZ2VyIiwiZ2V0QmxvY2tQcmV2aWV3IiwiZ2V0QmxvY2tQbGFjZWhvbGRlciIsInNhdmUiLCJmb3JFYWNoIiwia2V5IiwiZm9ybV9zZXR0aW5ncyIsImZvcm1fc2VsZWN0ZWQiLCJ2YWx1ZSIsImF0dHJDaGFuZ2UiLCJzaG93X3RpdGxlIiwiZGlzcGxheVRpdGxlIiwic2hvd19kZXNjcmlwdGlvbiIsImRpc3BsYXlEZXNjIiwicGFuZWxfbm90aWNlX2hlYWQiLCJwYW5lbF9ub3RpY2VfdGV4dCIsInBhbmVsX25vdGljZV9saW5rIiwicGFuZWxfbm90aWNlX2xpbmtfdGV4dCIsImdldEZpZWxkU3R5bGVzIiwiZ2V0UGFuZWxDbGFzcyIsImZpZWxkX3N0eWxlcyIsInVzZV9tb2Rlcm5fbm90aWNlX2hlYWQiLCJ1c2VfbW9kZXJuX25vdGljZV90ZXh0IiwidXNlX21vZGVybl9ub3RpY2VfbGluayIsImxlYXJuX21vcmUiLCJkaXNwbGF5IiwibGVhZF9mb3Jtc19wYW5lbF9ub3RpY2VfaGVhZCIsImxlYWRfZm9ybXNfcGFuZWxfbm90aWNlX3RleHQiLCJzaXplIiwiZmllbGRTaXplIiwic3R5bGVBdHRyQ2hhbmdlIiwiYm9yZGVyX3JhZGl1cyIsImZpZWxkQm9yZGVyUmFkaXVzIiwiY29sb3JzIiwiZmllbGRCYWNrZ3JvdW5kQ29sb3IiLCJvbkNoYW5nZSIsImxhYmVsIiwiYmFja2dyb3VuZCIsImZpZWxkQm9yZGVyQ29sb3IiLCJib3JkZXIiLCJmaWVsZFRleHRDb2xvciIsInRleHQiLCJnZXRMYWJlbFN0eWxlcyIsImxhYmVsX3N0eWxlcyIsImxhYmVsU2l6ZSIsImxhYmVsQ29sb3IiLCJsYWJlbFN1YmxhYmVsQ29sb3IiLCJzdWJsYWJlbF9oaW50cyIsInJlcGxhY2UiLCJsYWJlbEVycm9yQ29sb3IiLCJlcnJvcl9tZXNzYWdlIiwiZ2V0QnV0dG9uU3R5bGVzIiwiYnV0dG9uX3N0eWxlcyIsImJ1dHRvblNpemUiLCJidXR0b25Cb3JkZXJSYWRpdXMiLCJidXR0b25CYWNrZ3JvdW5kQ29sb3IiLCJidXR0b25UZXh0Q29sb3IiLCJidXR0b25fY29sb3Jfbm90aWNlIiwiaXNPcGVuIiwic2V0T3BlbiIsIm9wZW5Nb2RhbCIsImNsb3NlTW9kYWwiLCJjb3B5X3Bhc3RlX3NldHRpbmdzIiwiY29weVBhc3RlVmFsdWUiLCJwYXN0ZVNldHRpbmdzIiwiX19odG1sIiwiY29weV9wYXN0ZV9ub3RpY2UiLCJyZXNldF9zdHlsZV9zZXR0aW5ncyIsInJlc2V0X3NldHRpbmdzX2NvbmZpcm1fdGV4dCIsImJ0bl9ubyIsInJlc2V0U2V0dGluZ3MiLCJidG5feWVzX3Jlc2V0IiwiYmxvY2siLCJnZXRCbG9ja0NvbnRhaW5lciIsImlubmVySFRNTCIsImJsb2NrSFRNTCIsImxvYWRlZEZvcm1JZCIsImJsb2NrX3ByZXZpZXdfdXJsIiwid2lkdGgiLCJsb2dvX3VybCIsImNzc0NsYXNzIiwiaXNGdWxsU3R5bGluZ0VuYWJsZWQiLCJpc19tb2Rlcm5fbWFya3VwIiwiaXNfZnVsbF9zdHlsaW5nIiwiYmxvY2tTZWxlY3RvciIsInF1ZXJ5U2VsZWN0b3IiLCJlZGl0b3JDYW52YXMiLCJjb250ZW50V2luZG93IiwiYXR0cmlidXRlIiwiY29udGFpbmVyIiwicHJvcGVydHkiLCJsZXR0ZXIiLCJ0b0xvd2VyQ2FzZSIsInNldEF0dHIiLCJzdHlsZSIsInNldFByb3BlcnR5IiwiY29udGVudCIsImF0dHMiLCJkYXRhIiwic2VsZWN0IiwiSlNPTiIsInN0cmluZ2lmeSIsInBhc3RlQXR0cmlidXRlcyIsInBhcnNlVmFsaWRhdGVKc29uIiwiZGlzcGF0Y2giLCJjcmVhdGVFcnJvck5vdGljZSIsImNvcHlfcGFzdGVfZXJyb3IiLCJpZCIsInBhcnNlIiwiZXJyb3IiLCJoZWlnaHQiLCJ2aWV3Qm94IiwiY2xhc3NOYW1lIiwiZmlsbCIsImQiLCJ0eXBlIiwiZGVmYXVsdCIsImZvcm1zIiwibWFwIiwiSUQiLCJwb3N0X3RpdGxlIiwidW5zaGlmdCIsImZvcm1fc2VsZWN0Iiwic21hbGwiLCJtZWRpdW0iLCJsYXJnZSIsImUiLCJkYXRhc2V0IiwiaW5pdExlYWRGb3JtU2V0dGluZ3MiLCJwYXJlbnRFbGVtZW50IiwiJGZvcm0iLCIkcGFuZWwiLCJoYXNDbGFzcyIsImFkZENsYXNzIiwiZmluZCIsImNzcyIsInJlbW92ZUNsYXNzIiwiZGV0YWlsIiwidXBkYXRlQWNjZW50Q29sb3JzIiwibG9hZENob2ljZXNKUyIsImluaXRSaWNoVGV4dEZpZWxkIiwib2ZmIiwiYmxvY2tDbGljayIsImN1cnJlbnRUYXJnZXQiLCJGcm9udGVuZE1vZGVybiIsInVwZGF0ZUdCQmxvY2tQYWdlSW5kaWNhdG9yQ29sb3IiLCJ1cGRhdGVHQkJsb2NrSWNvbkNob2ljZXNDb2xvciIsInVwZGF0ZUdCQmxvY2tSYXRpbmdDb2xvciIsIkNob2ljZXMiLCJlYWNoIiwiaWR4IiwiZWwiLCIkZWwiLCJhcmdzIiwid3Bmb3Jtc19jaG9pY2VzanNfY29uZmlnIiwic2VhcmNoRW5hYmxlZCIsIiRmaWVsZCIsImNsb3Nlc3QiLCJjYWxsYmFja09uSW5pdCIsInNlbGYiLCIkZWxlbWVudCIsInBhc3NlZEVsZW1lbnQiLCIkaW5wdXQiLCJpbnB1dCIsInNpemVDbGFzcyIsImNvbnRhaW5lck91dGVyIiwicHJvcCIsImF0dHIiLCJnZXRWYWx1ZSIsImxlbmd0aCIsInJlbW92ZUF0dHIiLCJkaXNhYmxlIiwiY2hvaWNlc0luc3RhbmNlIiwialF1ZXJ5Il0sInNvdXJjZXMiOlsiZmFrZV9mOWNmNmY2ZC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKiBnbG9iYWwgd3Bmb3Jtc19ndXRlbmJlcmdfZm9ybV9zZWxlY3RvciwgQ2hvaWNlcyAqL1xuLyoganNoaW50IGVzMzogZmFsc2UsIGVzdmVyc2lvbjogNiAqL1xuXG4ndXNlIHN0cmljdCc7XG5cbi8qKlxuICogR3V0ZW5iZXJnIGVkaXRvciBibG9jay5cbiAqXG4gKiBAc2luY2UgMS44LjFcbiAqL1xudmFyIFdQRm9ybXMgPSB3aW5kb3cuV1BGb3JtcyB8fCB7fTtcblxuV1BGb3Jtcy5Gb3JtU2VsZWN0b3IgPSBXUEZvcm1zLkZvcm1TZWxlY3RvciB8fCAoIGZ1bmN0aW9uKCBkb2N1bWVudCwgd2luZG93LCAkICkge1xuXG5cdGNvbnN0IHsgc2VydmVyU2lkZVJlbmRlcjogU2VydmVyU2lkZVJlbmRlciA9IHdwLmNvbXBvbmVudHMuU2VydmVyU2lkZVJlbmRlciB9ID0gd3A7XG5cdGNvbnN0IHsgY3JlYXRlRWxlbWVudCwgRnJhZ21lbnQsIHVzZVN0YXRlIH0gPSB3cC5lbGVtZW50O1xuXHRjb25zdCB7IHJlZ2lzdGVyQmxvY2tUeXBlIH0gPSB3cC5ibG9ja3M7XG5cdGNvbnN0IHsgSW5zcGVjdG9yQ29udHJvbHMsIEluc3BlY3RvckFkdmFuY2VkQ29udHJvbHMsIFBhbmVsQ29sb3JTZXR0aW5ncyB9ID0gd3AuYmxvY2tFZGl0b3IgfHwgd3AuZWRpdG9yO1xuXHRjb25zdCB7IFNlbGVjdENvbnRyb2wsIFRvZ2dsZUNvbnRyb2wsIFBhbmVsQm9keSwgUGxhY2Vob2xkZXIsIEZsZXgsIEZsZXhCbG9jaywgX19leHBlcmltZW50YWxVbml0Q29udHJvbCwgVGV4dGFyZWFDb250cm9sLCBCdXR0b24sIE1vZGFsIH0gPSB3cC5jb21wb25lbnRzO1xuXHRjb25zdCB7IHN0cmluZ3MsIGRlZmF1bHRzLCBzaXplcyB9ID0gd3Bmb3Jtc19ndXRlbmJlcmdfZm9ybV9zZWxlY3Rvcjtcblx0Y29uc3QgZGVmYXVsdFN0eWxlU2V0dGluZ3MgPSBkZWZhdWx0cztcblxuXHQvKipcblx0ICogQmxvY2tzIHJ1bnRpbWUgZGF0YS5cblx0ICpcblx0ICogQHNpbmNlIDEuOC4xXG5cdCAqXG5cdCAqIEB0eXBlIHtvYmplY3R9XG5cdCAqL1xuXHRsZXQgYmxvY2tzID0ge307XG5cblx0LyoqXG5cdCAqIFdoZXRoZXIgaXQgaXMgbmVlZGVkIHRvIHRyaWdnZXIgc2VydmVyIHJlbmRlcmluZy5cblx0ICpcblx0ICogQHNpbmNlIDEuOC4xXG5cdCAqXG5cdCAqIEB0eXBlIHtib29sZWFufVxuXHQgKi9cblx0bGV0IHRyaWdnZXJTZXJ2ZXJSZW5kZXIgPSB0cnVlO1xuXG5cdC8qKlxuXHQgKiBQdWJsaWMgZnVuY3Rpb25zIGFuZCBwcm9wZXJ0aWVzLlxuXHQgKlxuXHQgKiBAc2luY2UgMS44LjFcblx0ICpcblx0ICogQHR5cGUge29iamVjdH1cblx0ICovXG5cdGNvbnN0IGFwcCA9IHtcblxuXHRcdC8qKlxuXHRcdCAqIFN0YXJ0IHRoZSBlbmdpbmUuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKi9cblx0XHRpbml0OiBmdW5jdGlvbigpIHtcblxuXHRcdFx0YXBwLmluaXREZWZhdWx0cygpO1xuXHRcdFx0YXBwLnJlZ2lzdGVyQmxvY2soKTtcblxuXHRcdFx0JCggYXBwLnJlYWR5ICk7XG5cdFx0fSxcblxuXHRcdC8qKlxuXHRcdCAqIERvY3VtZW50IHJlYWR5LlxuXHRcdCAqXG5cdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0ICovXG5cdFx0cmVhZHk6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRhcHAuZXZlbnRzKCk7XG5cdFx0fSxcblxuXHRcdC8qKlxuXHRcdCAqIEV2ZW50cy5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqL1xuXHRcdGV2ZW50czogZnVuY3Rpb24oKSB7XG5cblx0XHRcdCQoIHdpbmRvdyApXG5cdFx0XHRcdC5vbiggJ3dwZm9ybXNGb3JtU2VsZWN0b3JFZGl0JywgXy5kZWJvdW5jZSggYXBwLmJsb2NrRWRpdCwgMjUwICkgKVxuXHRcdFx0XHQub24oICd3cGZvcm1zRm9ybVNlbGVjdG9yRm9ybUxvYWRlZCcsIF8uZGVib3VuY2UoIGFwcC5mb3JtTG9hZGVkLCAyNTAgKSApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBSZWdpc3RlciBibG9jay5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqL1xuXHRcdHJlZ2lzdGVyQmxvY2s6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRyZWdpc3RlckJsb2NrVHlwZSggJ3dwZm9ybXMvZm9ybS1zZWxlY3RvcicsIHtcblx0XHRcdFx0dGl0bGU6IHN0cmluZ3MudGl0bGUsXG5cdFx0XHRcdGRlc2NyaXB0aW9uOiBzdHJpbmdzLmRlc2NyaXB0aW9uLFxuXHRcdFx0XHRpY29uOiBhcHAuZ2V0SWNvbigpLFxuXHRcdFx0XHRrZXl3b3Jkczogc3RyaW5ncy5mb3JtX2tleXdvcmRzLFxuXHRcdFx0XHRjYXRlZ29yeTogJ3dpZGdldHMnLFxuXHRcdFx0XHRhdHRyaWJ1dGVzOiBhcHAuZ2V0QmxvY2tBdHRyaWJ1dGVzKCksXG5cdFx0XHRcdGV4YW1wbGU6IHtcblx0XHRcdFx0XHRhdHRyaWJ1dGVzOiB7XG5cdFx0XHRcdFx0XHRwcmV2aWV3OiB0cnVlLFxuXHRcdFx0XHRcdH0sXG5cdFx0XHRcdH0sXG5cdFx0XHRcdGVkaXQ6IGZ1bmN0aW9uKCBwcm9wcyApIHtcblxuXHRcdFx0XHRcdGNvbnN0IHsgYXR0cmlidXRlcyB9ID0gcHJvcHM7XG5cdFx0XHRcdFx0Y29uc3QgZm9ybU9wdGlvbnMgPSBhcHAuZ2V0Rm9ybU9wdGlvbnMoKTtcblx0XHRcdFx0XHRjb25zdCBzaXplT3B0aW9ucyA9IGFwcC5nZXRTaXplT3B0aW9ucygpO1xuXHRcdFx0XHRcdGNvbnN0IGhhbmRsZXJzID0gYXBwLmdldFNldHRpbmdzRmllbGRzSGFuZGxlcnMoIHByb3BzICk7XG5cblx0XHRcdFx0XHQvLyBTdG9yZSBibG9jayBjbGllbnRJZCBpbiBhdHRyaWJ1dGVzLlxuXHRcdFx0XHRcdHByb3BzLnNldEF0dHJpYnV0ZXMoIHtcblx0XHRcdFx0XHRcdGNsaWVudElkOiBwcm9wcy5jbGllbnRJZCxcblx0XHRcdFx0XHR9ICk7XG5cblx0XHRcdFx0XHQvLyBNYWluIGJsb2NrIHNldHRpbmdzLlxuXHRcdFx0XHRcdGxldCBqc3ggPSBbXG5cdFx0XHRcdFx0XHRhcHAuanN4UGFydHMuZ2V0TWFpblNldHRpbmdzKCBhdHRyaWJ1dGVzLCBoYW5kbGVycywgZm9ybU9wdGlvbnMgKSxcblx0XHRcdFx0XHRdO1xuXG5cdFx0XHRcdFx0Ly8gRm9ybSBzdHlsZSBzZXR0aW5ncyAmIGJsb2NrIGNvbnRlbnQuXG5cdFx0XHRcdFx0aWYgKCBhdHRyaWJ1dGVzLmZvcm1JZCApIHtcblx0XHRcdFx0XHRcdGpzeC5wdXNoKFxuXHRcdFx0XHRcdFx0XHRhcHAuanN4UGFydHMuZ2V0U3R5bGVTZXR0aW5ncyggYXR0cmlidXRlcywgaGFuZGxlcnMsIHNpemVPcHRpb25zICksXG5cdFx0XHRcdFx0XHRcdGFwcC5qc3hQYXJ0cy5nZXRBZHZhbmNlZFNldHRpbmdzKCBhdHRyaWJ1dGVzLCBoYW5kbGVycyApLFxuXHRcdFx0XHRcdFx0XHRhcHAuanN4UGFydHMuZ2V0QmxvY2tGb3JtQ29udGVudCggcHJvcHMgKSxcblx0XHRcdFx0XHRcdCk7XG5cblx0XHRcdFx0XHRcdGhhbmRsZXJzLnVwZGF0ZUNvcHlQYXN0ZUNvbnRlbnQoKTtcblxuXHRcdFx0XHRcdFx0JCggd2luZG93ICkudHJpZ2dlciggJ3dwZm9ybXNGb3JtU2VsZWN0b3JFZGl0JywgWyBwcm9wcyBdICk7XG5cblx0XHRcdFx0XHRcdHJldHVybiBqc3g7XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0Ly8gQmxvY2sgcHJldmlldyBwaWN0dXJlLlxuXHRcdFx0XHRcdGlmICggYXR0cmlidXRlcy5wcmV2aWV3ICkge1xuXHRcdFx0XHRcdFx0anN4LnB1c2goXG5cdFx0XHRcdFx0XHRcdGFwcC5qc3hQYXJ0cy5nZXRCbG9ja1ByZXZpZXcoKSxcblx0XHRcdFx0XHRcdCk7XG5cblx0XHRcdFx0XHRcdHJldHVybiBqc3g7XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0Ly8gQmxvY2sgcGxhY2Vob2xkZXIgKGZvcm0gc2VsZWN0b3IpLlxuXHRcdFx0XHRcdGpzeC5wdXNoKFxuXHRcdFx0XHRcdFx0YXBwLmpzeFBhcnRzLmdldEJsb2NrUGxhY2Vob2xkZXIoIHByb3BzLmF0dHJpYnV0ZXMsIGhhbmRsZXJzLCBmb3JtT3B0aW9ucyApLFxuXHRcdFx0XHRcdCk7XG5cblx0XHRcdFx0XHRyZXR1cm4ganN4O1xuXHRcdFx0XHR9LFxuXHRcdFx0XHRzYXZlOiAoKSA9PiBudWxsLFxuXHRcdFx0fSApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBJbml0IGRlZmF1bHQgc3R5bGUgc2V0dGluZ3MuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKi9cblx0XHRpbml0RGVmYXVsdHM6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRbICdmb3JtSWQnLCAnY29weVBhc3RlVmFsdWUnIF0uZm9yRWFjaCgga2V5ID0+IGRlbGV0ZSBkZWZhdWx0U3R5bGVTZXR0aW5nc1sga2V5IF0gKTtcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogQmxvY2sgSlNYIHBhcnRzLlxuXHRcdCAqXG5cdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0ICpcblx0XHQgKiBAdHlwZSB7b2JqZWN0fVxuXHRcdCAqL1xuXHRcdGpzeFBhcnRzOiB7XG5cblx0XHRcdC8qKlxuXHRcdFx0ICogR2V0IG1haW4gc2V0dGluZ3MgSlNYIGNvZGUuXG5cdFx0XHQgKlxuXHRcdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0XHQgKlxuXHRcdFx0ICogQHBhcmFtIHtvYmplY3R9IGF0dHJpYnV0ZXMgIEJsb2NrIGF0dHJpYnV0ZXMuXG5cdFx0XHQgKiBAcGFyYW0ge29iamVjdH0gaGFuZGxlcnMgICAgQmxvY2sgZXZlbnQgaGFuZGxlcnMuXG5cdFx0XHQgKiBAcGFyYW0ge29iamVjdH0gZm9ybU9wdGlvbnMgRm9ybSBzZWxlY3RvciBvcHRpb25zLlxuXHRcdFx0ICpcblx0XHRcdCAqIEByZXR1cm5zIHtKU1guRWxlbWVudH0gTWFpbiBzZXR0aW5nIEpTWCBjb2RlLlxuXHRcdFx0ICovXG5cdFx0XHRnZXRNYWluU2V0dGluZ3M6IGZ1bmN0aW9uKCBhdHRyaWJ1dGVzLCBoYW5kbGVycywgZm9ybU9wdGlvbnMgKSB7XG5cblx0XHRcdFx0cmV0dXJuIChcblx0XHRcdFx0XHQ8SW5zcGVjdG9yQ29udHJvbHMga2V5PVwid3Bmb3Jtcy1ndXRlbmJlcmctZm9ybS1zZWxlY3Rvci1pbnNwZWN0b3ItbWFpbi1zZXR0aW5nc1wiPlxuXHRcdFx0XHRcdFx0PFBhbmVsQm9keSBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1wYW5lbFwiIHRpdGxlPXsgc3RyaW5ncy5mb3JtX3NldHRpbmdzIH0+XG5cdFx0XHRcdFx0XHRcdDxTZWxlY3RDb250cm9sXG5cdFx0XHRcdFx0XHRcdFx0bGFiZWw9eyBzdHJpbmdzLmZvcm1fc2VsZWN0ZWQgfVxuXHRcdFx0XHRcdFx0XHRcdHZhbHVlPXsgYXR0cmlidXRlcy5mb3JtSWQgfVxuXHRcdFx0XHRcdFx0XHRcdG9wdGlvbnM9eyBmb3JtT3B0aW9ucyB9XG5cdFx0XHRcdFx0XHRcdFx0b25DaGFuZ2U9eyB2YWx1ZSA9PiBoYW5kbGVycy5hdHRyQ2hhbmdlKCAnZm9ybUlkJywgdmFsdWUgKSB9XG5cdFx0XHRcdFx0XHRcdC8+XG5cdFx0XHRcdFx0XHRcdDxUb2dnbGVDb250cm9sXG5cdFx0XHRcdFx0XHRcdFx0bGFiZWw9eyBzdHJpbmdzLnNob3dfdGl0bGUgfVxuXHRcdFx0XHRcdFx0XHRcdGNoZWNrZWQ9eyBhdHRyaWJ1dGVzLmRpc3BsYXlUaXRsZSB9XG5cdFx0XHRcdFx0XHRcdFx0b25DaGFuZ2U9eyB2YWx1ZSA9PiBoYW5kbGVycy5hdHRyQ2hhbmdlKCAnZGlzcGxheVRpdGxlJywgdmFsdWUgKSB9XG5cdFx0XHRcdFx0XHRcdC8+XG5cdFx0XHRcdFx0XHRcdDxUb2dnbGVDb250cm9sXG5cdFx0XHRcdFx0XHRcdFx0bGFiZWw9eyBzdHJpbmdzLnNob3dfZGVzY3JpcHRpb24gfVxuXHRcdFx0XHRcdFx0XHRcdGNoZWNrZWQ9eyBhdHRyaWJ1dGVzLmRpc3BsYXlEZXNjIH1cblx0XHRcdFx0XHRcdFx0XHRvbkNoYW5nZT17IHZhbHVlID0+IGhhbmRsZXJzLmF0dHJDaGFuZ2UoICdkaXNwbGF5RGVzYycsIHZhbHVlICkgfVxuXHRcdFx0XHRcdFx0XHQvPlxuXHRcdFx0XHRcdFx0XHQ8cCBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1wYW5lbC1ub3RpY2VcIj5cblx0XHRcdFx0XHRcdFx0XHQ8c3Ryb25nPnsgc3RyaW5ncy5wYW5lbF9ub3RpY2VfaGVhZCB9PC9zdHJvbmc+XG5cdFx0XHRcdFx0XHRcdFx0eyBzdHJpbmdzLnBhbmVsX25vdGljZV90ZXh0IH1cblx0XHRcdFx0XHRcdFx0XHQ8YSBocmVmPXtzdHJpbmdzLnBhbmVsX25vdGljZV9saW5rfSByZWw9XCJub3JlZmVycmVyXCIgdGFyZ2V0PVwiX2JsYW5rXCI+eyBzdHJpbmdzLnBhbmVsX25vdGljZV9saW5rX3RleHQgfTwvYT5cblx0XHRcdFx0XHRcdFx0PC9wPlxuXHRcdFx0XHRcdFx0PC9QYW5lbEJvZHk+XG5cdFx0XHRcdFx0PC9JbnNwZWN0b3JDb250cm9scz5cblx0XHRcdFx0KTtcblx0XHRcdH0sXG5cblx0XHRcdC8qKlxuXHRcdFx0ICogR2V0IEZpZWxkIHN0eWxlcyBKU1ggY29kZS5cblx0XHRcdCAqXG5cdFx0XHQgKiBAc2luY2UgMS44LjFcblx0XHRcdCAqXG5cdFx0XHQgKiBAcGFyYW0ge29iamVjdH0gYXR0cmlidXRlcyAgQmxvY2sgYXR0cmlidXRlcy5cblx0XHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBoYW5kbGVycyAgICBCbG9jayBldmVudCBoYW5kbGVycy5cblx0XHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBzaXplT3B0aW9ucyBTaXplIHNlbGVjdG9yIG9wdGlvbnMuXG5cdFx0XHQgKlxuXHRcdFx0ICogQHJldHVybnMge0pTWC5FbGVtZW50fSBGaWVsZCBzdHlsZXMgSlNYIGNvZGUuXG5cdFx0XHQgKi9cblx0XHRcdGdldEZpZWxkU3R5bGVzOiBmdW5jdGlvbiggYXR0cmlidXRlcywgaGFuZGxlcnMsIHNpemVPcHRpb25zICkgeyAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIG1heC1saW5lcy1wZXItZnVuY3Rpb25cblxuXHRcdFx0XHRyZXR1cm4gKFxuXHRcdFx0XHRcdDxQYW5lbEJvZHkgY2xhc3NOYW1lPXsgYXBwLmdldFBhbmVsQ2xhc3MoIGF0dHJpYnV0ZXMgKSB9IHRpdGxlPXsgc3RyaW5ncy5maWVsZF9zdHlsZXMgfT5cblx0XHRcdFx0XHRcdDxwIGNsYXNzTmFtZT1cIndwZm9ybXMtZ3V0ZW5iZXJnLXBhbmVsLW5vdGljZSB3cGZvcm1zLXVzZS1tb2Rlcm4tbm90aWNlXCI+XG5cdFx0XHRcdFx0XHRcdDxzdHJvbmc+eyBzdHJpbmdzLnVzZV9tb2Rlcm5fbm90aWNlX2hlYWQgfTwvc3Ryb25nPlxuXHRcdFx0XHRcdFx0XHR7IHN0cmluZ3MudXNlX21vZGVybl9ub3RpY2VfdGV4dCB9IDxhIGhyZWY9e3N0cmluZ3MudXNlX21vZGVybl9ub3RpY2VfbGlua30gcmVsPVwibm9yZWZlcnJlclwiIHRhcmdldD1cIl9ibGFua1wiPnsgc3RyaW5ncy5sZWFybl9tb3JlIH08L2E+XG5cdFx0XHRcdFx0XHQ8L3A+XG5cblx0XHRcdFx0XHRcdDxwIGNsYXNzTmFtZT1cIndwZm9ybXMtZ3V0ZW5iZXJnLXBhbmVsLW5vdGljZSB3cGZvcm1zLXdhcm5pbmcgd3Bmb3Jtcy1sZWFkLWZvcm0tbm90aWNlXCIgc3R5bGU9e3sgZGlzcGxheTogJ25vbmUnIH19PlxuXHRcdFx0XHRcdFx0XHQ8c3Ryb25nPnsgc3RyaW5ncy5sZWFkX2Zvcm1zX3BhbmVsX25vdGljZV9oZWFkIH08L3N0cm9uZz5cblx0XHRcdFx0XHRcdFx0eyBzdHJpbmdzLmxlYWRfZm9ybXNfcGFuZWxfbm90aWNlX3RleHQgfVxuXHRcdFx0XHRcdFx0PC9wPlxuXG5cdFx0XHRcdFx0XHQ8RmxleCBnYXA9ezR9IGFsaWduPVwiZmxleC1zdGFydFwiIGNsYXNzTmFtZT17J3dwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3ItZmxleCd9IGp1c3RpZnk9XCJzcGFjZS1iZXR3ZWVuXCI+XG5cdFx0XHRcdFx0XHRcdDxGbGV4QmxvY2s+XG5cdFx0XHRcdFx0XHRcdFx0PFNlbGVjdENvbnRyb2xcblx0XHRcdFx0XHRcdFx0XHRcdGxhYmVsPXsgc3RyaW5ncy5zaXplIH1cblx0XHRcdFx0XHRcdFx0XHRcdHZhbHVlPXsgYXR0cmlidXRlcy5maWVsZFNpemUgfVxuXHRcdFx0XHRcdFx0XHRcdFx0b3B0aW9ucz17IHNpemVPcHRpb25zIH1cblx0XHRcdFx0XHRcdFx0XHRcdG9uQ2hhbmdlPXsgdmFsdWUgPT4gaGFuZGxlcnMuc3R5bGVBdHRyQ2hhbmdlKCAnZmllbGRTaXplJywgdmFsdWUgKSB9XG5cdFx0XHRcdFx0XHRcdFx0Lz5cblx0XHRcdFx0XHRcdFx0PC9GbGV4QmxvY2s+XG5cdFx0XHRcdFx0XHRcdDxGbGV4QmxvY2s+XG5cdFx0XHRcdFx0XHRcdFx0PF9fZXhwZXJpbWVudGFsVW5pdENvbnRyb2xcblx0XHRcdFx0XHRcdFx0XHRcdGxhYmVsPXsgc3RyaW5ncy5ib3JkZXJfcmFkaXVzIH1cblx0XHRcdFx0XHRcdFx0XHRcdHZhbHVlPXsgYXR0cmlidXRlcy5maWVsZEJvcmRlclJhZGl1cyB9XG5cdFx0XHRcdFx0XHRcdFx0XHRpc1VuaXRTZWxlY3RUYWJiYWJsZVxuXHRcdFx0XHRcdFx0XHRcdFx0b25DaGFuZ2U9eyB2YWx1ZSA9PiBoYW5kbGVycy5zdHlsZUF0dHJDaGFuZ2UoICdmaWVsZEJvcmRlclJhZGl1cycsIHZhbHVlICkgfVxuXHRcdFx0XHRcdFx0XHRcdC8+XG5cdFx0XHRcdFx0XHRcdDwvRmxleEJsb2NrPlxuXHRcdFx0XHRcdFx0PC9GbGV4PlxuXG5cdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3ItY29sb3ItcGlja2VyXCI+XG5cdFx0XHRcdFx0XHRcdDxkaXYgY2xhc3NOYW1lPVwid3Bmb3Jtcy1ndXRlbmJlcmctZm9ybS1zZWxlY3Rvci1jb250cm9sLWxhYmVsXCI+eyBzdHJpbmdzLmNvbG9ycyB9PC9kaXY+XG5cdFx0XHRcdFx0XHRcdDxQYW5lbENvbG9yU2V0dGluZ3Ncblx0XHRcdFx0XHRcdFx0XHRfX2V4cGVyaW1lbnRhbElzUmVuZGVyZWRJblNpZGViYXJcblx0XHRcdFx0XHRcdFx0XHRlbmFibGVBbHBoYVxuXHRcdFx0XHRcdFx0XHRcdHNob3dUaXRsZT17IGZhbHNlIH1cblx0XHRcdFx0XHRcdFx0XHRjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1mb3JtLXNlbGVjdG9yLWNvbG9yLXBhbmVsXCJcblx0XHRcdFx0XHRcdFx0XHRjb2xvclNldHRpbmdzPXtbXG5cdFx0XHRcdFx0XHRcdFx0XHR7XG5cdFx0XHRcdFx0XHRcdFx0XHRcdHZhbHVlOiBhdHRyaWJ1dGVzLmZpZWxkQmFja2dyb3VuZENvbG9yLFxuXHRcdFx0XHRcdFx0XHRcdFx0XHRvbkNoYW5nZTogdmFsdWUgPT4gaGFuZGxlcnMuc3R5bGVBdHRyQ2hhbmdlKCAnZmllbGRCYWNrZ3JvdW5kQ29sb3InLCB2YWx1ZSApLFxuXHRcdFx0XHRcdFx0XHRcdFx0XHRsYWJlbDogc3RyaW5ncy5iYWNrZ3JvdW5kLFxuXHRcdFx0XHRcdFx0XHRcdFx0fSxcblx0XHRcdFx0XHRcdFx0XHRcdHtcblx0XHRcdFx0XHRcdFx0XHRcdFx0dmFsdWU6IGF0dHJpYnV0ZXMuZmllbGRCb3JkZXJDb2xvcixcblx0XHRcdFx0XHRcdFx0XHRcdFx0b25DaGFuZ2U6IHZhbHVlID0+IGhhbmRsZXJzLnN0eWxlQXR0ckNoYW5nZSggJ2ZpZWxkQm9yZGVyQ29sb3InLCB2YWx1ZSApLFxuXHRcdFx0XHRcdFx0XHRcdFx0XHRsYWJlbDogc3RyaW5ncy5ib3JkZXIsXG5cdFx0XHRcdFx0XHRcdFx0XHR9LFxuXHRcdFx0XHRcdFx0XHRcdFx0e1xuXHRcdFx0XHRcdFx0XHRcdFx0XHR2YWx1ZTogYXR0cmlidXRlcy5maWVsZFRleHRDb2xvcixcblx0XHRcdFx0XHRcdFx0XHRcdFx0b25DaGFuZ2U6IHZhbHVlID0+IGhhbmRsZXJzLnN0eWxlQXR0ckNoYW5nZSggJ2ZpZWxkVGV4dENvbG9yJywgdmFsdWUgKSxcblx0XHRcdFx0XHRcdFx0XHRcdFx0bGFiZWw6IHN0cmluZ3MudGV4dCxcblx0XHRcdFx0XHRcdFx0XHRcdH0sXG5cdFx0XHRcdFx0XHRcdFx0XX1cblx0XHRcdFx0XHRcdFx0Lz5cblx0XHRcdFx0XHRcdDwvZGl2PlxuXHRcdFx0XHRcdDwvUGFuZWxCb2R5PlxuXHRcdFx0XHQpO1xuXHRcdFx0fSxcblxuXHRcdFx0LyoqXG5cdFx0XHQgKiBHZXQgTGFiZWwgc3R5bGVzIEpTWCBjb2RlLlxuXHRcdFx0ICpcblx0XHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdFx0ICpcblx0XHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBhdHRyaWJ1dGVzICBCbG9jayBhdHRyaWJ1dGVzLlxuXHRcdFx0ICogQHBhcmFtIHtvYmplY3R9IGhhbmRsZXJzICAgIEJsb2NrIGV2ZW50IGhhbmRsZXJzLlxuXHRcdFx0ICogQHBhcmFtIHtvYmplY3R9IHNpemVPcHRpb25zIFNpemUgc2VsZWN0b3Igb3B0aW9ucy5cblx0XHRcdCAqXG5cdFx0XHQgKiBAcmV0dXJucyB7SlNYLkVsZW1lbnR9IExhYmVsIHN0eWxlcyBKU1ggY29kZS5cblx0XHRcdCAqL1xuXHRcdFx0Z2V0TGFiZWxTdHlsZXM6IGZ1bmN0aW9uKCBhdHRyaWJ1dGVzLCBoYW5kbGVycywgc2l6ZU9wdGlvbnMgKSB7XG5cblx0XHRcdFx0cmV0dXJuIChcblx0XHRcdFx0XHQ8UGFuZWxCb2R5IGNsYXNzTmFtZT17IGFwcC5nZXRQYW5lbENsYXNzKCBhdHRyaWJ1dGVzICkgfSB0aXRsZT17IHN0cmluZ3MubGFiZWxfc3R5bGVzIH0+XG5cdFx0XHRcdFx0XHQ8U2VsZWN0Q29udHJvbFxuXHRcdFx0XHRcdFx0XHRsYWJlbD17IHN0cmluZ3Muc2l6ZSB9XG5cdFx0XHRcdFx0XHRcdHZhbHVlPXsgYXR0cmlidXRlcy5sYWJlbFNpemUgfVxuXHRcdFx0XHRcdFx0XHRjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1mb3JtLXNlbGVjdG9yLWZpeC1ib3R0b20tbWFyZ2luXCJcblx0XHRcdFx0XHRcdFx0b3B0aW9ucz17IHNpemVPcHRpb25zfVxuXHRcdFx0XHRcdFx0XHRvbkNoYW5nZT17IHZhbHVlID0+IGhhbmRsZXJzLnN0eWxlQXR0ckNoYW5nZSggJ2xhYmVsU2l6ZScsIHZhbHVlICkgfVxuXHRcdFx0XHRcdFx0Lz5cblxuXHRcdFx0XHRcdFx0PGRpdiBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1mb3JtLXNlbGVjdG9yLWNvbG9yLXBpY2tlclwiPlxuXHRcdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3ItY29udHJvbC1sYWJlbFwiPnsgc3RyaW5ncy5jb2xvcnMgfTwvZGl2PlxuXHRcdFx0XHRcdFx0XHQ8UGFuZWxDb2xvclNldHRpbmdzXG5cdFx0XHRcdFx0XHRcdFx0X19leHBlcmltZW50YWxJc1JlbmRlcmVkSW5TaWRlYmFyXG5cdFx0XHRcdFx0XHRcdFx0ZW5hYmxlQWxwaGFcblx0XHRcdFx0XHRcdFx0XHRzaG93VGl0bGU9eyBmYWxzZSB9XG5cdFx0XHRcdFx0XHRcdFx0Y2xhc3NOYW1lPVwid3Bmb3Jtcy1ndXRlbmJlcmctZm9ybS1zZWxlY3Rvci1jb2xvci1wYW5lbFwiXG5cdFx0XHRcdFx0XHRcdFx0Y29sb3JTZXR0aW5ncz17W1xuXHRcdFx0XHRcdFx0XHRcdFx0e1xuXHRcdFx0XHRcdFx0XHRcdFx0XHR2YWx1ZTogYXR0cmlidXRlcy5sYWJlbENvbG9yLFxuXHRcdFx0XHRcdFx0XHRcdFx0XHRvbkNoYW5nZTogdmFsdWUgPT4gaGFuZGxlcnMuc3R5bGVBdHRyQ2hhbmdlKCAnbGFiZWxDb2xvcicsIHZhbHVlICksXG5cdFx0XHRcdFx0XHRcdFx0XHRcdGxhYmVsOiBzdHJpbmdzLmxhYmVsLFxuXHRcdFx0XHRcdFx0XHRcdFx0fSxcblx0XHRcdFx0XHRcdFx0XHRcdHtcblx0XHRcdFx0XHRcdFx0XHRcdFx0dmFsdWU6IGF0dHJpYnV0ZXMubGFiZWxTdWJsYWJlbENvbG9yLFxuXHRcdFx0XHRcdFx0XHRcdFx0XHRvbkNoYW5nZTogdmFsdWUgPT4gaGFuZGxlcnMuc3R5bGVBdHRyQ2hhbmdlKCAnbGFiZWxTdWJsYWJlbENvbG9yJywgdmFsdWUgKSxcblx0XHRcdFx0XHRcdFx0XHRcdFx0bGFiZWw6IHN0cmluZ3Muc3VibGFiZWxfaGludHMucmVwbGFjZSggJyZhbXA7JywgJyYnICksXG5cdFx0XHRcdFx0XHRcdFx0XHR9LFxuXHRcdFx0XHRcdFx0XHRcdFx0e1xuXHRcdFx0XHRcdFx0XHRcdFx0XHR2YWx1ZTogYXR0cmlidXRlcy5sYWJlbEVycm9yQ29sb3IsXG5cdFx0XHRcdFx0XHRcdFx0XHRcdG9uQ2hhbmdlOiB2YWx1ZSA9PiBoYW5kbGVycy5zdHlsZUF0dHJDaGFuZ2UoICdsYWJlbEVycm9yQ29sb3InLCB2YWx1ZSApLFxuXHRcdFx0XHRcdFx0XHRcdFx0XHRsYWJlbDogc3RyaW5ncy5lcnJvcl9tZXNzYWdlLFxuXHRcdFx0XHRcdFx0XHRcdFx0fSxcblx0XHRcdFx0XHRcdFx0XHRdfVxuXHRcdFx0XHRcdFx0XHQvPlxuXHRcdFx0XHRcdFx0PC9kaXY+XG5cdFx0XHRcdFx0PC9QYW5lbEJvZHk+XG5cdFx0XHRcdCk7XG5cdFx0XHR9LFxuXG5cdFx0XHQvKipcblx0XHRcdCAqIEdldCBCdXR0b24gc3R5bGVzIEpTWCBjb2RlLlxuXHRcdFx0ICpcblx0XHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdFx0ICpcblx0XHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBhdHRyaWJ1dGVzICBCbG9jayBhdHRyaWJ1dGVzLlxuXHRcdFx0ICogQHBhcmFtIHtvYmplY3R9IGhhbmRsZXJzICAgIEJsb2NrIGV2ZW50IGhhbmRsZXJzLlxuXHRcdFx0ICogQHBhcmFtIHtvYmplY3R9IHNpemVPcHRpb25zIFNpemUgc2VsZWN0b3Igb3B0aW9ucy5cblx0XHRcdCAqXG5cdFx0XHQgKiBAcmV0dXJucyB7SlNYLkVsZW1lbnR9ICBCdXR0b24gc3R5bGVzIEpTWCBjb2RlLlxuXHRcdFx0ICovXG5cdFx0XHRnZXRCdXR0b25TdHlsZXM6IGZ1bmN0aW9uKCBhdHRyaWJ1dGVzLCBoYW5kbGVycywgc2l6ZU9wdGlvbnMgKSB7XG5cblx0XHRcdFx0cmV0dXJuIChcblx0XHRcdFx0XHQ8UGFuZWxCb2R5IGNsYXNzTmFtZT17IGFwcC5nZXRQYW5lbENsYXNzKCBhdHRyaWJ1dGVzICkgfSB0aXRsZT17IHN0cmluZ3MuYnV0dG9uX3N0eWxlcyB9PlxuXHRcdFx0XHRcdFx0PEZsZXggZ2FwPXs0fSBhbGlnbj1cImZsZXgtc3RhcnRcIiBjbGFzc05hbWU9eyd3cGZvcm1zLWd1dGVuYmVyZy1mb3JtLXNlbGVjdG9yLWZsZXgnfSBqdXN0aWZ5PVwic3BhY2UtYmV0d2VlblwiPlxuXHRcdFx0XHRcdFx0XHQ8RmxleEJsb2NrPlxuXHRcdFx0XHRcdFx0XHRcdDxTZWxlY3RDb250cm9sXG5cdFx0XHRcdFx0XHRcdFx0XHRsYWJlbD17IHN0cmluZ3Muc2l6ZSB9XG5cdFx0XHRcdFx0XHRcdFx0XHR2YWx1ZT17IGF0dHJpYnV0ZXMuYnV0dG9uU2l6ZSB9XG5cdFx0XHRcdFx0XHRcdFx0XHRvcHRpb25zPXsgc2l6ZU9wdGlvbnMgfVxuXHRcdFx0XHRcdFx0XHRcdFx0b25DaGFuZ2U9eyB2YWx1ZSA9PiBoYW5kbGVycy5zdHlsZUF0dHJDaGFuZ2UoICdidXR0b25TaXplJywgdmFsdWUgKSB9XG5cdFx0XHRcdFx0XHRcdFx0Lz5cblx0XHRcdFx0XHRcdFx0PC9GbGV4QmxvY2s+XG5cdFx0XHRcdFx0XHRcdDxGbGV4QmxvY2s+XG5cdFx0XHRcdFx0XHRcdFx0PF9fZXhwZXJpbWVudGFsVW5pdENvbnRyb2xcblx0XHRcdFx0XHRcdFx0XHRcdG9uQ2hhbmdlPXsgdmFsdWUgPT4gaGFuZGxlcnMuc3R5bGVBdHRyQ2hhbmdlKCAnYnV0dG9uQm9yZGVyUmFkaXVzJywgdmFsdWUgKSB9XG5cdFx0XHRcdFx0XHRcdFx0XHRsYWJlbD17IHN0cmluZ3MuYm9yZGVyX3JhZGl1cyB9XG5cdFx0XHRcdFx0XHRcdFx0XHRpc1VuaXRTZWxlY3RUYWJiYWJsZVxuXHRcdFx0XHRcdFx0XHRcdFx0dmFsdWU9eyBhdHRyaWJ1dGVzLmJ1dHRvbkJvcmRlclJhZGl1cyB9IC8+XG5cdFx0XHRcdFx0XHRcdDwvRmxleEJsb2NrPlxuXHRcdFx0XHRcdFx0PC9GbGV4PlxuXG5cdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3ItY29sb3ItcGlja2VyXCI+XG5cdFx0XHRcdFx0XHRcdDxkaXYgY2xhc3NOYW1lPVwid3Bmb3Jtcy1ndXRlbmJlcmctZm9ybS1zZWxlY3Rvci1jb250cm9sLWxhYmVsXCI+eyBzdHJpbmdzLmNvbG9ycyB9PC9kaXY+XG5cdFx0XHRcdFx0XHRcdDxQYW5lbENvbG9yU2V0dGluZ3Ncblx0XHRcdFx0XHRcdFx0XHRfX2V4cGVyaW1lbnRhbElzUmVuZGVyZWRJblNpZGViYXJcblx0XHRcdFx0XHRcdFx0XHRlbmFibGVBbHBoYVxuXHRcdFx0XHRcdFx0XHRcdHNob3dUaXRsZT17IGZhbHNlIH1cblx0XHRcdFx0XHRcdFx0XHRjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1mb3JtLXNlbGVjdG9yLWNvbG9yLXBhbmVsXCJcblx0XHRcdFx0XHRcdFx0XHRjb2xvclNldHRpbmdzPXtbXG5cdFx0XHRcdFx0XHRcdFx0XHR7XG5cdFx0XHRcdFx0XHRcdFx0XHRcdHZhbHVlOiBhdHRyaWJ1dGVzLmJ1dHRvbkJhY2tncm91bmRDb2xvcixcblx0XHRcdFx0XHRcdFx0XHRcdFx0b25DaGFuZ2U6IHZhbHVlID0+IGhhbmRsZXJzLnN0eWxlQXR0ckNoYW5nZSggJ2J1dHRvbkJhY2tncm91bmRDb2xvcicsIHZhbHVlICksXG5cdFx0XHRcdFx0XHRcdFx0XHRcdGxhYmVsOiBzdHJpbmdzLmJhY2tncm91bmQsXG5cdFx0XHRcdFx0XHRcdFx0XHR9LFxuXHRcdFx0XHRcdFx0XHRcdFx0e1xuXHRcdFx0XHRcdFx0XHRcdFx0XHR2YWx1ZTogYXR0cmlidXRlcy5idXR0b25UZXh0Q29sb3IsXG5cdFx0XHRcdFx0XHRcdFx0XHRcdG9uQ2hhbmdlOiB2YWx1ZSA9PiBoYW5kbGVycy5zdHlsZUF0dHJDaGFuZ2UoICdidXR0b25UZXh0Q29sb3InLCB2YWx1ZSApLFxuXHRcdFx0XHRcdFx0XHRcdFx0XHRsYWJlbDogc3RyaW5ncy50ZXh0LFxuXHRcdFx0XHRcdFx0XHRcdFx0fSxcblx0XHRcdFx0XHRcdFx0XHRdfSAvPlxuXHRcdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3ItbGVnZW5kIHdwZm9ybXMtYnV0dG9uLWNvbG9yLW5vdGljZVwiPlxuXHRcdFx0XHRcdFx0XHRcdHsgc3RyaW5ncy5idXR0b25fY29sb3Jfbm90aWNlIH1cblx0XHRcdFx0XHRcdFx0PC9kaXY+XG5cdFx0XHRcdFx0XHQ8L2Rpdj5cblx0XHRcdFx0XHQ8L1BhbmVsQm9keT5cblx0XHRcdFx0KTtcblx0XHRcdH0sXG5cblx0XHRcdC8qKlxuXHRcdFx0ICogR2V0IHN0eWxlIHNldHRpbmdzIEpTWCBjb2RlLlxuXHRcdFx0ICpcblx0XHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdFx0ICpcblx0XHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBhdHRyaWJ1dGVzICBCbG9jayBhdHRyaWJ1dGVzLlxuXHRcdFx0ICogQHBhcmFtIHtvYmplY3R9IGhhbmRsZXJzICAgIEJsb2NrIGV2ZW50IGhhbmRsZXJzLlxuXHRcdFx0ICogQHBhcmFtIHtvYmplY3R9IHNpemVPcHRpb25zIFNpemUgc2VsZWN0b3Igb3B0aW9ucy5cblx0XHRcdCAqXG5cdFx0XHQgKiBAcmV0dXJucyB7SlNYLkVsZW1lbnR9IEluc3BlY3RvciBjb250cm9scyBKU1ggY29kZS5cblx0XHRcdCAqL1xuXHRcdFx0Z2V0U3R5bGVTZXR0aW5nczogZnVuY3Rpb24oIGF0dHJpYnV0ZXMsIGhhbmRsZXJzLCBzaXplT3B0aW9ucyApIHtcblxuXHRcdFx0XHRyZXR1cm4gKFxuXHRcdFx0XHRcdDxJbnNwZWN0b3JDb250cm9scyBrZXk9XCJ3cGZvcm1zLWd1dGVuYmVyZy1mb3JtLXNlbGVjdG9yLXN0eWxlLXNldHRpbmdzXCI+XG5cdFx0XHRcdFx0XHR7IGFwcC5qc3hQYXJ0cy5nZXRGaWVsZFN0eWxlcyggYXR0cmlidXRlcywgaGFuZGxlcnMsIHNpemVPcHRpb25zICkgfVxuXHRcdFx0XHRcdFx0eyBhcHAuanN4UGFydHMuZ2V0TGFiZWxTdHlsZXMoIGF0dHJpYnV0ZXMsIGhhbmRsZXJzLCBzaXplT3B0aW9ucyApIH1cblx0XHRcdFx0XHRcdHsgYXBwLmpzeFBhcnRzLmdldEJ1dHRvblN0eWxlcyggYXR0cmlidXRlcywgaGFuZGxlcnMsIHNpemVPcHRpb25zICkgfVxuXHRcdFx0XHRcdDwvSW5zcGVjdG9yQ29udHJvbHM+XG5cdFx0XHRcdCk7XG5cdFx0XHR9LFxuXG5cdFx0XHQvKipcblx0XHRcdCAqIEdldCBhZHZhbmNlZCBzZXR0aW5ncyBKU1ggY29kZS5cblx0XHRcdCAqXG5cdFx0XHQgKiBAc2luY2UgMS44LjFcblx0XHRcdCAqXG5cdFx0XHQgKiBAcGFyYW0ge29iamVjdH0gYXR0cmlidXRlcyBCbG9jayBhdHRyaWJ1dGVzLlxuXHRcdFx0ICogQHBhcmFtIHtvYmplY3R9IGhhbmRsZXJzICAgQmxvY2sgZXZlbnQgaGFuZGxlcnMuXG5cdFx0XHQgKlxuXHRcdFx0ICogQHJldHVybnMge0pTWC5FbGVtZW50fSBJbnNwZWN0b3IgYWR2YW5jZWQgY29udHJvbHMgSlNYIGNvZGUuXG5cdFx0XHQgKi9cblx0XHRcdGdldEFkdmFuY2VkU2V0dGluZ3M6IGZ1bmN0aW9uKCBhdHRyaWJ1dGVzLCBoYW5kbGVycyApIHtcblxuXHRcdFx0XHRjb25zdCBbIGlzT3Blbiwgc2V0T3BlbiBdID0gdXNlU3RhdGUoIGZhbHNlICk7XG5cdFx0XHRcdGNvbnN0IG9wZW5Nb2RhbCA9ICgpID0+IHNldE9wZW4oIHRydWUgKTtcblx0XHRcdFx0Y29uc3QgY2xvc2VNb2RhbCA9ICgpID0+IHNldE9wZW4oIGZhbHNlICk7XG5cblx0XHRcdFx0cmV0dXJuIChcblx0XHRcdFx0XHQ8SW5zcGVjdG9yQWR2YW5jZWRDb250cm9scz5cblx0XHRcdFx0XHRcdDxkaXYgY2xhc3NOYW1lPXsgYXBwLmdldFBhbmVsQ2xhc3MoIGF0dHJpYnV0ZXMgKSB9PlxuXHRcdFx0XHRcdFx0XHQ8VGV4dGFyZWFDb250cm9sXG5cdFx0XHRcdFx0XHRcdFx0bGFiZWw9eyBzdHJpbmdzLmNvcHlfcGFzdGVfc2V0dGluZ3MgfVxuXHRcdFx0XHRcdFx0XHRcdHJvd3M9XCI0XCJcblx0XHRcdFx0XHRcdFx0XHRzcGVsbENoZWNrPVwiZmFsc2VcIlxuXHRcdFx0XHRcdFx0XHRcdHZhbHVlPXsgYXR0cmlidXRlcy5jb3B5UGFzdGVWYWx1ZSB9XG5cdFx0XHRcdFx0XHRcdFx0b25DaGFuZ2U9eyB2YWx1ZSA9PiBoYW5kbGVycy5wYXN0ZVNldHRpbmdzKCB2YWx1ZSApIH1cblx0XHRcdFx0XHRcdFx0Lz5cblx0XHRcdFx0XHRcdFx0PGRpdiBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1mb3JtLXNlbGVjdG9yLWxlZ2VuZFwiIGRhbmdlcm91c2x5U2V0SW5uZXJIVE1MPXt7IF9faHRtbDogc3RyaW5ncy5jb3B5X3Bhc3RlX25vdGljZSB9fT48L2Rpdj5cblxuXHRcdFx0XHRcdFx0XHQ8QnV0dG9uIGNsYXNzTmFtZT0nd3Bmb3Jtcy1ndXRlbmJlcmctZm9ybS1zZWxlY3Rvci1yZXNldC1idXR0b24nIG9uQ2xpY2s9eyBvcGVuTW9kYWwgfT57IHN0cmluZ3MucmVzZXRfc3R5bGVfc2V0dGluZ3MgfTwvQnV0dG9uPlxuXHRcdFx0XHRcdFx0PC9kaXY+XG5cblx0XHRcdFx0XHRcdHsgaXNPcGVuICYmIChcblx0XHRcdFx0XHRcdFx0PE1vZGFsICBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1tb2RhbFwiXG5cdFx0XHRcdFx0XHRcdFx0dGl0bGU9eyBzdHJpbmdzLnJlc2V0X3N0eWxlX3NldHRpbmdzfVxuXHRcdFx0XHRcdFx0XHRcdG9uUmVxdWVzdENsb3NlPXsgY2xvc2VNb2RhbCB9PlxuXG5cdFx0XHRcdFx0XHRcdFx0PHA+eyBzdHJpbmdzLnJlc2V0X3NldHRpbmdzX2NvbmZpcm1fdGV4dCB9PC9wPlxuXG5cdFx0XHRcdFx0XHRcdFx0PEZsZXggZ2FwPXszfSBhbGlnbj1cImNlbnRlclwiIGp1c3RpZnk9XCJmbGV4LWVuZFwiPlxuXHRcdFx0XHRcdFx0XHRcdFx0PEJ1dHRvbiBpc1NlY29uZGFyeSBvbkNsaWNrPXsgY2xvc2VNb2RhbCB9PlxuXHRcdFx0XHRcdFx0XHRcdFx0XHR7c3RyaW5ncy5idG5fbm99XG5cdFx0XHRcdFx0XHRcdFx0XHQ8L0J1dHRvbj5cblxuXHRcdFx0XHRcdFx0XHRcdFx0PEJ1dHRvbiBpc1ByaW1hcnkgb25DbGljaz17ICgpID0+IHtcblx0XHRcdFx0XHRcdFx0XHRcdFx0Y2xvc2VNb2RhbCgpO1xuXHRcdFx0XHRcdFx0XHRcdFx0XHRoYW5kbGVycy5yZXNldFNldHRpbmdzKCk7XG5cdFx0XHRcdFx0XHRcdFx0XHR9IH0+XG5cdFx0XHRcdFx0XHRcdFx0XHRcdHsgc3RyaW5ncy5idG5feWVzX3Jlc2V0IH1cblx0XHRcdFx0XHRcdFx0XHRcdDwvQnV0dG9uPlxuXHRcdFx0XHRcdFx0XHRcdDwvRmxleD5cblx0XHRcdFx0XHRcdFx0PC9Nb2RhbD5cblx0XHRcdFx0XHRcdCkgfVxuXHRcdFx0XHRcdDwvSW5zcGVjdG9yQWR2YW5jZWRDb250cm9scz5cblx0XHRcdFx0KTtcblx0XHRcdH0sXG5cblx0XHRcdC8qKlxuXHRcdFx0ICogR2V0IGJsb2NrIGNvbnRlbnQgSlNYIGNvZGUuXG5cdFx0XHQgKlxuXHRcdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0XHQgKlxuXHRcdFx0ICogQHBhcmFtIHtvYmplY3R9IHByb3BzIEJsb2NrIHByb3BlcnRpZXMuXG5cdFx0XHQgKlxuXHRcdFx0ICogQHJldHVybnMge0pTWC5FbGVtZW50fSBCbG9jayBjb250ZW50IEpTWCBjb2RlLlxuXHRcdFx0ICovXG5cdFx0XHRnZXRCbG9ja0Zvcm1Db250ZW50OiBmdW5jdGlvbiggcHJvcHMgKSB7XG5cblx0XHRcdFx0aWYgKCB0cmlnZ2VyU2VydmVyUmVuZGVyICkge1xuXG5cdFx0XHRcdFx0cmV0dXJuIChcblx0XHRcdFx0XHRcdDxTZXJ2ZXJTaWRlUmVuZGVyXG5cdFx0XHRcdFx0XHRcdGtleT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3Itc2VydmVyLXNpZGUtcmVuZGVyZXJcIlxuXHRcdFx0XHRcdFx0XHRibG9jaz1cIndwZm9ybXMvZm9ybS1zZWxlY3RvclwiXG5cdFx0XHRcdFx0XHRcdGF0dHJpYnV0ZXM9eyBwcm9wcy5hdHRyaWJ1dGVzIH1cblx0XHRcdFx0XHRcdC8+XG5cdFx0XHRcdFx0KTtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGNvbnN0IGNsaWVudElkID0gcHJvcHMuY2xpZW50SWQ7XG5cdFx0XHRcdGNvbnN0IGJsb2NrID0gYXBwLmdldEJsb2NrQ29udGFpbmVyKCBwcm9wcyApO1xuXG5cdFx0XHRcdC8vIEluIHRoZSBjYXNlIG9mIGVtcHR5IGNvbnRlbnQsIHVzZSBzZXJ2ZXIgc2lkZSByZW5kZXJlci5cblx0XHRcdFx0Ly8gVGhpcyBoYXBwZW5zIHdoZW4gdGhlIGJsb2NrIGlzIGR1cGxpY2F0ZWQgb3IgY29udmVydGVkIHRvIGEgcmV1c2FibGUgYmxvY2suXG5cdFx0XHRcdGlmICggISBibG9jayB8fCAhIGJsb2NrLmlubmVySFRNTCApIHtcblx0XHRcdFx0XHR0cmlnZ2VyU2VydmVyUmVuZGVyID0gdHJ1ZTtcblxuXHRcdFx0XHRcdHJldHVybiBhcHAuanN4UGFydHMuZ2V0QmxvY2tGb3JtQ29udGVudCggcHJvcHMgKTtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGJsb2Nrc1sgY2xpZW50SWQgXSA9IGJsb2Nrc1sgY2xpZW50SWQgXSB8fCB7fTtcblx0XHRcdFx0YmxvY2tzWyBjbGllbnRJZCBdLmJsb2NrSFRNTCA9IGJsb2NrLmlubmVySFRNTDtcblx0XHRcdFx0YmxvY2tzWyBjbGllbnRJZCBdLmxvYWRlZEZvcm1JZCA9IHByb3BzLmF0dHJpYnV0ZXMuZm9ybUlkO1xuXG5cdFx0XHRcdHJldHVybiAoXG5cdFx0XHRcdFx0PEZyYWdtZW50IGtleT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3ItZnJhZ21lbnQtZm9ybS1odG1sXCI+XG5cdFx0XHRcdFx0XHQ8ZGl2IGRhbmdlcm91c2x5U2V0SW5uZXJIVE1MPXt7IF9faHRtbDogYmxvY2tzWyBjbGllbnRJZCBdLmJsb2NrSFRNTCB9fSAvPlxuXHRcdFx0XHRcdDwvRnJhZ21lbnQ+XG5cdFx0XHRcdCk7XG5cdFx0XHR9LFxuXG5cdFx0XHQvKipcblx0XHRcdCAqIEdldCBibG9jayBwcmV2aWV3IEpTWCBjb2RlLlxuXHRcdFx0ICpcblx0XHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdFx0ICpcblx0XHRcdCAqIEByZXR1cm5zIHtKU1guRWxlbWVudH0gQmxvY2sgcHJldmlldyBKU1ggY29kZS5cblx0XHRcdCAqL1xuXHRcdFx0Z2V0QmxvY2tQcmV2aWV3OiBmdW5jdGlvbigpIHtcblxuXHRcdFx0XHRyZXR1cm4gKFxuXHRcdFx0XHRcdDxGcmFnbWVudFxuXHRcdFx0XHRcdFx0a2V5PVwid3Bmb3Jtcy1ndXRlbmJlcmctZm9ybS1zZWxlY3Rvci1mcmFnbWVudC1ibG9jay1wcmV2aWV3XCI+XG5cdFx0XHRcdFx0XHQ8aW1nIHNyYz17IHdwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3IuYmxvY2tfcHJldmlld191cmwgfSBzdHlsZT17eyB3aWR0aDogJzEwMCUnIH19IC8+XG5cdFx0XHRcdFx0PC9GcmFnbWVudD5cblx0XHRcdFx0KTtcblx0XHRcdH0sXG5cblx0XHRcdC8qKlxuXHRcdFx0ICogR2V0IGJsb2NrIHBsYWNlaG9sZGVyIChmb3JtIHNlbGVjdG9yKSBKU1ggY29kZS5cblx0XHRcdCAqXG5cdFx0XHQgKiBAc2luY2UgMS44LjFcblx0XHRcdCAqXG5cdFx0XHQgKiBAcGFyYW0ge29iamVjdH0gYXR0cmlidXRlcyAgQmxvY2sgYXR0cmlidXRlcy5cblx0XHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBoYW5kbGVycyAgICBCbG9jayBldmVudCBoYW5kbGVycy5cblx0XHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBmb3JtT3B0aW9ucyBGb3JtIHNlbGVjdG9yIG9wdGlvbnMuXG5cdFx0XHQgKlxuXHRcdFx0ICogQHJldHVybnMge0pTWC5FbGVtZW50fSBCbG9jayBwbGFjZWhvbGRlciBKU1ggY29kZS5cblx0XHRcdCAqL1xuXHRcdFx0Z2V0QmxvY2tQbGFjZWhvbGRlcjogZnVuY3Rpb24oIGF0dHJpYnV0ZXMsIGhhbmRsZXJzLCBmb3JtT3B0aW9ucyApIHtcblxuXHRcdFx0XHRyZXR1cm4gKFxuXHRcdFx0XHRcdDxQbGFjZWhvbGRlclxuXHRcdFx0XHRcdFx0a2V5PVwid3Bmb3Jtcy1ndXRlbmJlcmctZm9ybS1zZWxlY3Rvci13cmFwXCJcblx0XHRcdFx0XHRcdGNsYXNzTmFtZT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3Itd3JhcFwiPlxuXHRcdFx0XHRcdFx0PGltZyBzcmM9e3dwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3IubG9nb191cmx9IC8+XG5cdFx0XHRcdFx0XHQ8aDM+eyBzdHJpbmdzLnRpdGxlIH08L2gzPlxuXHRcdFx0XHRcdFx0PFNlbGVjdENvbnRyb2xcblx0XHRcdFx0XHRcdFx0a2V5PVwid3Bmb3Jtcy1ndXRlbmJlcmctZm9ybS1zZWxlY3Rvci1zZWxlY3QtY29udHJvbFwiXG5cdFx0XHRcdFx0XHRcdHZhbHVlPXsgYXR0cmlidXRlcy5mb3JtSWQgfVxuXHRcdFx0XHRcdFx0XHRvcHRpb25zPXsgZm9ybU9wdGlvbnMgfVxuXHRcdFx0XHRcdFx0XHRvbkNoYW5nZT17IHZhbHVlID0+IGhhbmRsZXJzLmF0dHJDaGFuZ2UoICdmb3JtSWQnLCB2YWx1ZSApIH1cblx0XHRcdFx0XHRcdC8+XG5cdFx0XHRcdFx0PC9QbGFjZWhvbGRlcj5cblx0XHRcdFx0KTtcblx0XHRcdH0sXG5cdFx0fSxcblxuXHRcdC8qKlxuXHRcdCAqIEdldCBTdHlsZSBTZXR0aW5ncyBwYW5lbCBjbGFzcy5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHBhcmFtIHtvYmplY3R9IGF0dHJpYnV0ZXMgQmxvY2sgYXR0cmlidXRlcy5cblx0XHQgKlxuXHRcdCAqIEByZXR1cm5zIHtzdHJpbmd9IFN0eWxlIFNldHRpbmdzIHBhbmVsIGNsYXNzLlxuXHRcdCAqL1xuXHRcdGdldFBhbmVsQ2xhc3M6IGZ1bmN0aW9uKCBhdHRyaWJ1dGVzICkge1xuXG5cdFx0XHRsZXQgY3NzQ2xhc3MgPSAnd3Bmb3Jtcy1ndXRlbmJlcmctcGFuZWwgd3Bmb3Jtcy1ibG9jay1zZXR0aW5ncy0nICsgYXR0cmlidXRlcy5jbGllbnRJZDtcblxuXHRcdFx0aWYgKCAhIGFwcC5pc0Z1bGxTdHlsaW5nRW5hYmxlZCgpICkge1xuXHRcdFx0XHRjc3NDbGFzcyArPSAnIGRpc2FibGVkX3BhbmVsJztcblx0XHRcdH1cblxuXHRcdFx0cmV0dXJuIGNzc0NsYXNzO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBEZXRlcm1pbmUgd2hldGhlciB0aGUgZnVsbCBzdHlsaW5nIGlzIGVuYWJsZWQuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKlxuXHRcdCAqIEByZXR1cm5zIHtib29sZWFufSBXaGV0aGVyIHRoZSBmdWxsIHN0eWxpbmcgaXMgZW5hYmxlZC5cblx0XHQgKi9cblx0XHRpc0Z1bGxTdHlsaW5nRW5hYmxlZDogZnVuY3Rpb24oKSB7XG5cblx0XHRcdHJldHVybiB3cGZvcm1zX2d1dGVuYmVyZ19mb3JtX3NlbGVjdG9yLmlzX21vZGVybl9tYXJrdXAgJiYgd3Bmb3Jtc19ndXRlbmJlcmdfZm9ybV9zZWxlY3Rvci5pc19mdWxsX3N0eWxpbmc7XG5cdFx0fSxcblxuXHRcdC8qKlxuXHRcdCAqIEdldCBibG9jayBjb250YWluZXIgRE9NIGVsZW1lbnQuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKlxuXHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBwcm9wcyBCbG9jayBwcm9wZXJ0aWVzLlxuXHRcdCAqXG5cdFx0ICogQHJldHVybnMge0VsZW1lbnR9IEJsb2NrIGNvbnRhaW5lci5cblx0XHQgKi9cblx0XHRnZXRCbG9ja0NvbnRhaW5lcjogZnVuY3Rpb24oIHByb3BzICkge1xuXG5cdFx0XHRjb25zdCBibG9ja1NlbGVjdG9yID0gYCNibG9jay0ke3Byb3BzLmNsaWVudElkfSA+IGRpdmA7XG5cdFx0XHRsZXQgYmxvY2sgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCBibG9ja1NlbGVjdG9yICk7XG5cblx0XHRcdC8vIEZvciBGU0UgLyBHdXRlbmJlcmcgcGx1Z2luIHdlIG5lZWQgdG8gdGFrZSBhIGxvb2sgaW5zaWRlIHRoZSBpZnJhbWUuXG5cdFx0XHRpZiAoICEgYmxvY2sgKSB7XG5cdFx0XHRcdGNvbnN0IGVkaXRvckNhbnZhcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoICdpZnJhbWVbbmFtZT1cImVkaXRvci1jYW52YXNcIl0nICk7XG5cblx0XHRcdFx0YmxvY2sgPSBlZGl0b3JDYW52YXMgJiYgZWRpdG9yQ2FudmFzLmNvbnRlbnRXaW5kb3cuZG9jdW1lbnQucXVlcnlTZWxlY3RvciggYmxvY2tTZWxlY3RvciApO1xuXHRcdFx0fVxuXG5cdFx0XHRyZXR1cm4gYmxvY2s7XG5cdFx0fSxcblxuXHRcdC8qKlxuXHRcdCAqIEdldCBzZXR0aW5ncyBmaWVsZHMgZXZlbnQgaGFuZGxlcnMuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKlxuXHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBwcm9wcyBCbG9jayBwcm9wZXJ0aWVzLlxuXHRcdCAqXG5cdFx0ICogQHJldHVybnMge29iamVjdH0gT2JqZWN0IHRoYXQgY29udGFpbnMgZXZlbnQgaGFuZGxlcnMgZm9yIHRoZSBzZXR0aW5ncyBmaWVsZHMuXG5cdFx0ICovXG5cdFx0Z2V0U2V0dGluZ3NGaWVsZHNIYW5kbGVyczogZnVuY3Rpb24oIHByb3BzICkgeyAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIG1heC1saW5lcy1wZXItZnVuY3Rpb25cblxuXHRcdFx0cmV0dXJuIHtcblxuXHRcdFx0XHQvKipcblx0XHRcdFx0ICogRmllbGQgc3R5bGUgYXR0cmlidXRlIGNoYW5nZSBldmVudCBoYW5kbGVyLlxuXHRcdFx0XHQgKlxuXHRcdFx0XHQgKiBAc2luY2UgMS44LjFcblx0XHRcdFx0ICpcblx0XHRcdFx0ICogQHBhcmFtIHtzdHJpbmd9IGF0dHJpYnV0ZSBBdHRyaWJ1dGUgbmFtZS5cblx0XHRcdFx0ICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlICAgICBOZXcgYXR0cmlidXRlIHZhbHVlLlxuXHRcdFx0XHQgKi9cblx0XHRcdFx0c3R5bGVBdHRyQ2hhbmdlOiBmdW5jdGlvbiggYXR0cmlidXRlLCB2YWx1ZSApIHtcblxuXHRcdFx0XHRcdGNvbnN0IGJsb2NrID0gYXBwLmdldEJsb2NrQ29udGFpbmVyKCBwcm9wcyApLFxuXHRcdFx0XHRcdFx0Y29udGFpbmVyID0gYmxvY2sucXVlcnlTZWxlY3RvciggYCN3cGZvcm1zLSR7cHJvcHMuYXR0cmlidXRlcy5mb3JtSWR9YCApLFxuXHRcdFx0XHRcdFx0cHJvcGVydHkgPSBhdHRyaWJ1dGUucmVwbGFjZSggL1tBLVpdL2csIGxldHRlciA9PiBgLSR7bGV0dGVyLnRvTG93ZXJDYXNlKCl9YCApLFxuXHRcdFx0XHRcdFx0c2V0QXR0ciA9IHt9O1xuXG5cdFx0XHRcdFx0aWYgKCBjb250YWluZXIgKSB7XG5cdFx0XHRcdFx0XHRzd2l0Y2ggKCBwcm9wZXJ0eSApIHtcblx0XHRcdFx0XHRcdFx0Y2FzZSAnZmllbGQtc2l6ZSc6XG5cdFx0XHRcdFx0XHRcdGNhc2UgJ2xhYmVsLXNpemUnOlxuXHRcdFx0XHRcdFx0XHRjYXNlICdidXR0b24tc2l6ZSc6XG5cdFx0XHRcdFx0XHRcdFx0Zm9yICggY29uc3Qga2V5IGluIHNpemVzWyBwcm9wZXJ0eSBdWyB2YWx1ZSBdICkge1xuXHRcdFx0XHRcdFx0XHRcdFx0Y29udGFpbmVyLnN0eWxlLnNldFByb3BlcnR5KFxuXHRcdFx0XHRcdFx0XHRcdFx0XHRgLS13cGZvcm1zLSR7cHJvcGVydHl9LSR7a2V5fWAsXG5cdFx0XHRcdFx0XHRcdFx0XHRcdHNpemVzWyBwcm9wZXJ0eSBdWyB2YWx1ZSBdWyBrZXkgXSxcblx0XHRcdFx0XHRcdFx0XHRcdCk7XG5cdFx0XHRcdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0XHRcdFx0YnJlYWs7XG5cblx0XHRcdFx0XHRcdFx0ZGVmYXVsdDpcblx0XHRcdFx0XHRcdFx0XHRjb250YWluZXIuc3R5bGUuc2V0UHJvcGVydHkoIGAtLXdwZm9ybXMtJHtwcm9wZXJ0eX1gLCB2YWx1ZSApO1xuXHRcdFx0XHRcdFx0fVxuXHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdHNldEF0dHJbIGF0dHJpYnV0ZSBdID0gdmFsdWU7XG5cblx0XHRcdFx0XHRwcm9wcy5zZXRBdHRyaWJ1dGVzKCBzZXRBdHRyICk7XG5cblx0XHRcdFx0XHR0cmlnZ2VyU2VydmVyUmVuZGVyID0gZmFsc2U7XG5cblx0XHRcdFx0XHR0aGlzLnVwZGF0ZUNvcHlQYXN0ZUNvbnRlbnQoKTtcblxuXHRcdFx0XHRcdCQoIHdpbmRvdyApLnRyaWdnZXIoICd3cGZvcm1zRm9ybVNlbGVjdG9yU3R5bGVBdHRyQ2hhbmdlJywgWyBibG9jaywgcHJvcHMsIGF0dHJpYnV0ZSwgdmFsdWUgXSApO1xuXHRcdFx0XHR9LFxuXG5cdFx0XHRcdC8qKlxuXHRcdFx0XHQgKiBGaWVsZCByZWd1bGFyIGF0dHJpYnV0ZSBjaGFuZ2UgZXZlbnQgaGFuZGxlci5cblx0XHRcdFx0ICpcblx0XHRcdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0XHRcdCAqXG5cdFx0XHRcdCAqIEBwYXJhbSB7c3RyaW5nfSBhdHRyaWJ1dGUgQXR0cmlidXRlIG5hbWUuXG5cdFx0XHRcdCAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSAgICAgTmV3IGF0dHJpYnV0ZSB2YWx1ZS5cblx0XHRcdFx0ICovXG5cdFx0XHRcdGF0dHJDaGFuZ2U6IGZ1bmN0aW9uKCBhdHRyaWJ1dGUsIHZhbHVlICkge1xuXG5cdFx0XHRcdFx0Y29uc3Qgc2V0QXR0ciA9IHt9O1xuXG5cdFx0XHRcdFx0c2V0QXR0clsgYXR0cmlidXRlIF0gPSB2YWx1ZTtcblxuXHRcdFx0XHRcdHByb3BzLnNldEF0dHJpYnV0ZXMoIHNldEF0dHIgKTtcblxuXHRcdFx0XHRcdHRyaWdnZXJTZXJ2ZXJSZW5kZXIgPSB0cnVlO1xuXG5cdFx0XHRcdFx0dGhpcy51cGRhdGVDb3B5UGFzdGVDb250ZW50KCk7XG5cdFx0XHRcdH0sXG5cblx0XHRcdFx0LyoqXG5cdFx0XHRcdCAqIFJlc2V0IEZvcm0gU3R5bGVzIHNldHRpbmdzIHRvIGRlZmF1bHRzLlxuXHRcdFx0XHQgKlxuXHRcdFx0XHQgKiBAc2luY2UgMS44LjFcblx0XHRcdFx0ICovXG5cdFx0XHRcdHJlc2V0U2V0dGluZ3M6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRcdFx0Zm9yICggbGV0IGtleSBpbiBkZWZhdWx0U3R5bGVTZXR0aW5ncyApIHtcblx0XHRcdFx0XHRcdHRoaXMuc3R5bGVBdHRyQ2hhbmdlKCBrZXksIGRlZmF1bHRTdHlsZVNldHRpbmdzWyBrZXkgXSApO1xuXHRcdFx0XHRcdH1cblx0XHRcdFx0fSxcblxuXHRcdFx0XHQvKipcblx0XHRcdFx0ICogVXBkYXRlIGNvbnRlbnQgb2YgdGhlIFwiQ29weS9QYXN0ZVwiIGZpZWxkcy5cblx0XHRcdFx0ICpcblx0XHRcdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0XHRcdCAqL1xuXHRcdFx0XHR1cGRhdGVDb3B5UGFzdGVDb250ZW50OiBmdW5jdGlvbigpIHtcblxuXHRcdFx0XHRcdGxldCBjb250ZW50ID0ge307XG5cdFx0XHRcdFx0bGV0IGF0dHMgPSB3cC5kYXRhLnNlbGVjdCggJ2NvcmUvYmxvY2stZWRpdG9yJyApLmdldEJsb2NrQXR0cmlidXRlcyggcHJvcHMuY2xpZW50SWQgKTtcblxuXHRcdFx0XHRcdGZvciAoIGxldCBrZXkgaW4gZGVmYXVsdFN0eWxlU2V0dGluZ3MgKSB7XG5cdFx0XHRcdFx0XHRjb250ZW50W2tleV0gPSBhdHRzWyBrZXkgXTtcblx0XHRcdFx0XHR9XG5cblx0XHRcdFx0XHRwcm9wcy5zZXRBdHRyaWJ1dGVzKCB7ICdjb3B5UGFzdGVWYWx1ZSc6IEpTT04uc3RyaW5naWZ5KCBjb250ZW50ICkgfSApO1xuXHRcdFx0XHR9LFxuXG5cdFx0XHRcdC8qKlxuXHRcdFx0XHQgKiBQYXN0ZSBzZXR0aW5ncyBoYW5kbGVyLlxuXHRcdFx0XHQgKlxuXHRcdFx0XHQgKiBAc2luY2UgMS44LjFcblx0XHRcdFx0ICpcblx0XHRcdFx0ICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE5ldyBhdHRyaWJ1dGUgdmFsdWUuXG5cdFx0XHRcdCAqL1xuXHRcdFx0XHRwYXN0ZVNldHRpbmdzOiBmdW5jdGlvbiggdmFsdWUgKSB7XG5cblx0XHRcdFx0XHRsZXQgcGFzdGVBdHRyaWJ1dGVzID0gYXBwLnBhcnNlVmFsaWRhdGVKc29uKCB2YWx1ZSApO1xuXG5cdFx0XHRcdFx0aWYgKCAhIHBhc3RlQXR0cmlidXRlcyApIHtcblxuXHRcdFx0XHRcdFx0d3AuZGF0YS5kaXNwYXRjaCggJ2NvcmUvbm90aWNlcycgKS5jcmVhdGVFcnJvck5vdGljZShcblx0XHRcdFx0XHRcdFx0c3RyaW5ncy5jb3B5X3Bhc3RlX2Vycm9yLFxuXHRcdFx0XHRcdFx0XHR7IGlkOiAnd3Bmb3Jtcy1qc29uLXBhcnNlLWVycm9yJyB9XG5cdFx0XHRcdFx0XHQpO1xuXG5cdFx0XHRcdFx0XHR0aGlzLnVwZGF0ZUNvcHlQYXN0ZUNvbnRlbnQoKTtcblxuXHRcdFx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdHBhc3RlQXR0cmlidXRlcy5jb3B5UGFzdGVWYWx1ZSA9IHZhbHVlO1xuXG5cdFx0XHRcdFx0cHJvcHMuc2V0QXR0cmlidXRlcyggcGFzdGVBdHRyaWJ1dGVzICk7XG5cblx0XHRcdFx0XHR0cmlnZ2VyU2VydmVyUmVuZGVyID0gdHJ1ZTtcblx0XHRcdFx0fSxcblx0XHRcdH07XG5cdFx0fSxcblxuXHRcdC8qKlxuXHRcdCAqIFBhcnNlIGFuZCB2YWxpZGF0ZSBKU09OIHN0cmluZy5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIEpTT04gc3RyaW5nLlxuXHRcdCAqXG5cdFx0ICogQHJldHVybnMge2Jvb2xlYW58b2JqZWN0fSBQYXJzZWQgSlNPTiBvYmplY3QgT1IgZmFsc2Ugb24gZXJyb3IuXG5cdFx0ICovXG5cdFx0cGFyc2VWYWxpZGF0ZUpzb246IGZ1bmN0aW9uKCB2YWx1ZSApIHtcblxuXHRcdFx0aWYgKCB0eXBlb2YgdmFsdWUgIT09ICdzdHJpbmcnICkge1xuXHRcdFx0XHRyZXR1cm4gZmFsc2U7XG5cdFx0XHR9XG5cblx0XHRcdGxldCBhdHRzO1xuXG5cdFx0XHR0cnkge1xuXHRcdFx0XHRhdHRzID0gSlNPTi5wYXJzZSggdmFsdWUgKTtcblx0XHRcdH0gY2F0Y2ggKCBlcnJvciApIHtcblx0XHRcdFx0YXR0cyA9IGZhbHNlO1xuXHRcdFx0fVxuXG5cdFx0XHRyZXR1cm4gYXR0cztcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogR2V0IFdQRm9ybXMgaWNvbiBET00gZWxlbWVudC5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHJldHVybnMge0RPTS5lbGVtZW50fSBXUEZvcm1zIGljb24gRE9NIGVsZW1lbnQuXG5cdFx0ICovXG5cdFx0Z2V0SWNvbjogZnVuY3Rpb24oKSB7XG5cblx0XHRcdHJldHVybiBjcmVhdGVFbGVtZW50KFxuXHRcdFx0XHQnc3ZnJyxcblx0XHRcdFx0eyB3aWR0aDogMjAsIGhlaWdodDogMjAsIHZpZXdCb3g6ICcwIDAgNjEyIDYxMicsIGNsYXNzTmFtZTogJ2Rhc2hpY29uJyB9LFxuXHRcdFx0XHRjcmVhdGVFbGVtZW50KFxuXHRcdFx0XHRcdCdwYXRoJyxcblx0XHRcdFx0XHR7XG5cdFx0XHRcdFx0XHRmaWxsOiAnY3VycmVudENvbG9yJyxcblx0XHRcdFx0XHRcdGQ6ICdNNTQ0LDBINjhDMzAuNDQ1LDAsMCwzMC40NDUsMCw2OHY0NzZjMCwzNy41NTYsMzAuNDQ1LDY4LDY4LDY4aDQ3NmMzNy41NTYsMCw2OC0zMC40NDQsNjgtNjhWNjggQzYxMiwzMC40NDUsNTgxLjU1NiwwLDU0NCwweiBNNDY0LjQ0LDY4TDM4Ny42LDEyMC4wMkwzMjMuMzQsNjhINDY0LjQ0eiBNMjg4LjY2LDY4bC02NC4yNiw1Mi4wMkwxNDcuNTYsNjhIMjg4LjY2eiBNNTQ0LDU0NEg2OCBWNjhoMjIuMWwxMzYsOTIuMTRsNzkuOS02NC42bDc5LjU2LDY0LjZsMTM2LTkyLjE0SDU0NFY1NDR6IE0xMTQuMjQsMjYzLjE2aDk1Ljg4di00OC4yOGgtOTUuODhWMjYzLjE2eiBNMTE0LjI0LDM2MC40aDk1Ljg4IHYtNDguNjJoLTk1Ljg4VjM2MC40eiBNMjQyLjc2LDM2MC40aDI1NXYtNDguNjJoLTI1NVYzNjAuNEwyNDIuNzYsMzYwLjR6IE0yNDIuNzYsMjYzLjE2aDI1NXYtNDguMjhoLTI1NVYyNjMuMTZMMjQyLjc2LDI2My4xNnogTTM2OC4yMiw0NTcuM2gxMjkuNTRWNDA4SDM2OC4yMlY0NTcuM3onLFxuXHRcdFx0XHRcdH0sXG5cdFx0XHRcdCksXG5cdFx0XHQpO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBHZXQgYmxvY2sgYXR0cmlidXRlcy5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHJldHVybnMge29iamVjdH0gQmxvY2sgYXR0cmlidXRlcy5cblx0XHQgKi9cblx0XHRnZXRCbG9ja0F0dHJpYnV0ZXM6IGZ1bmN0aW9uKCkgeyAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIG1heC1saW5lcy1wZXItZnVuY3Rpb25cblxuXHRcdFx0cmV0dXJuIHtcblx0XHRcdFx0Y2xpZW50SWQ6IHtcblx0XHRcdFx0XHR0eXBlOiAnc3RyaW5nJyxcblx0XHRcdFx0XHRkZWZhdWx0OiAnJyxcblx0XHRcdFx0fSxcblx0XHRcdFx0Zm9ybUlkOiB7XG5cdFx0XHRcdFx0dHlwZTogJ3N0cmluZycsXG5cdFx0XHRcdFx0ZGVmYXVsdDogZGVmYXVsdHMuZm9ybUlkLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHRkaXNwbGF5VGl0bGU6IHtcblx0XHRcdFx0XHR0eXBlOiAnYm9vbGVhbicsXG5cdFx0XHRcdFx0ZGVmYXVsdDogZGVmYXVsdHMuZGlzcGxheVRpdGxlLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHRkaXNwbGF5RGVzYzoge1xuXHRcdFx0XHRcdHR5cGU6ICdib29sZWFuJyxcblx0XHRcdFx0XHRkZWZhdWx0OiBkZWZhdWx0cy5kaXNwbGF5RGVzYyxcblx0XHRcdFx0fSxcblx0XHRcdFx0cHJldmlldzoge1xuXHRcdFx0XHRcdHR5cGU6ICdib29sZWFuJyxcblx0XHRcdFx0fSxcblx0XHRcdFx0ZmllbGRTaXplOiB7XG5cdFx0XHRcdFx0dHlwZTogJ3N0cmluZycsXG5cdFx0XHRcdFx0ZGVmYXVsdDogZGVmYXVsdHMuZmllbGRTaXplLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHRmaWVsZEJvcmRlclJhZGl1czoge1xuXHRcdFx0XHRcdHR5cGU6ICdzdHJpbmcnLFxuXHRcdFx0XHRcdGRlZmF1bHQ6IGRlZmF1bHRzLmZpZWxkQm9yZGVyUmFkaXVzLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHRmaWVsZEJhY2tncm91bmRDb2xvcjoge1xuXHRcdFx0XHRcdHR5cGU6ICdzdHJpbmcnLFxuXHRcdFx0XHRcdGRlZmF1bHQ6IGRlZmF1bHRzLmZpZWxkQmFja2dyb3VuZENvbG9yLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHRmaWVsZEJvcmRlckNvbG9yOiB7XG5cdFx0XHRcdFx0dHlwZTogJ3N0cmluZycsXG5cdFx0XHRcdFx0ZGVmYXVsdDogZGVmYXVsdHMuZmllbGRCb3JkZXJDb2xvcixcblx0XHRcdFx0fSxcblx0XHRcdFx0ZmllbGRUZXh0Q29sb3I6IHtcblx0XHRcdFx0XHR0eXBlOiAnc3RyaW5nJyxcblx0XHRcdFx0XHRkZWZhdWx0OiBkZWZhdWx0cy5maWVsZFRleHRDb2xvcixcblx0XHRcdFx0fSxcblx0XHRcdFx0bGFiZWxTaXplOiB7XG5cdFx0XHRcdFx0dHlwZTogJ3N0cmluZycsXG5cdFx0XHRcdFx0ZGVmYXVsdDogZGVmYXVsdHMubGFiZWxTaXplLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHRsYWJlbENvbG9yOiB7XG5cdFx0XHRcdFx0dHlwZTogJ3N0cmluZycsXG5cdFx0XHRcdFx0ZGVmYXVsdDogZGVmYXVsdHMubGFiZWxDb2xvcixcblx0XHRcdFx0fSxcblx0XHRcdFx0bGFiZWxTdWJsYWJlbENvbG9yOiB7XG5cdFx0XHRcdFx0dHlwZTogJ3N0cmluZycsXG5cdFx0XHRcdFx0ZGVmYXVsdDogZGVmYXVsdHMubGFiZWxTdWJsYWJlbENvbG9yLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHRsYWJlbEVycm9yQ29sb3I6IHtcblx0XHRcdFx0XHR0eXBlOiAnc3RyaW5nJyxcblx0XHRcdFx0XHRkZWZhdWx0OiBkZWZhdWx0cy5sYWJlbEVycm9yQ29sb3IsXG5cdFx0XHRcdH0sXG5cdFx0XHRcdGJ1dHRvblNpemU6IHtcblx0XHRcdFx0XHR0eXBlOiAnc3RyaW5nJyxcblx0XHRcdFx0XHRkZWZhdWx0OiBkZWZhdWx0cy5idXR0b25TaXplLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHRidXR0b25Cb3JkZXJSYWRpdXM6IHtcblx0XHRcdFx0XHR0eXBlOiAnc3RyaW5nJyxcblx0XHRcdFx0XHRkZWZhdWx0OiBkZWZhdWx0cy5idXR0b25Cb3JkZXJSYWRpdXMsXG5cdFx0XHRcdH0sXG5cdFx0XHRcdGJ1dHRvbkJhY2tncm91bmRDb2xvcjoge1xuXHRcdFx0XHRcdHR5cGU6ICdzdHJpbmcnLFxuXHRcdFx0XHRcdGRlZmF1bHQ6IGRlZmF1bHRzLmJ1dHRvbkJhY2tncm91bmRDb2xvcixcblx0XHRcdFx0fSxcblx0XHRcdFx0YnV0dG9uVGV4dENvbG9yOiB7XG5cdFx0XHRcdFx0dHlwZTogJ3N0cmluZycsXG5cdFx0XHRcdFx0ZGVmYXVsdDogZGVmYXVsdHMuYnV0dG9uVGV4dENvbG9yLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHRjb3B5UGFzdGVWYWx1ZToge1xuXHRcdFx0XHRcdHR5cGU6ICdzdHJpbmcnLFxuXHRcdFx0XHRcdGRlZmF1bHQ6IGRlZmF1bHRzLmNvcHlQYXN0ZVZhbHVlLFxuXHRcdFx0XHR9LFxuXHRcdFx0fTtcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogR2V0IGZvcm0gc2VsZWN0b3Igb3B0aW9ucy5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHJldHVybnMge0FycmF5fSBGb3JtIG9wdGlvbnMuXG5cdFx0ICovXG5cdFx0Z2V0Rm9ybU9wdGlvbnM6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRjb25zdCBmb3JtT3B0aW9ucyA9IHdwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3IuZm9ybXMubWFwKCB2YWx1ZSA9PiAoXG5cdFx0XHRcdHsgdmFsdWU6IHZhbHVlLklELCBsYWJlbDogdmFsdWUucG9zdF90aXRsZSB9XG5cdFx0XHQpICk7XG5cblx0XHRcdGZvcm1PcHRpb25zLnVuc2hpZnQoIHsgdmFsdWU6ICcnLCBsYWJlbDogc3RyaW5ncy5mb3JtX3NlbGVjdCB9ICk7XG5cblx0XHRcdHJldHVybiBmb3JtT3B0aW9ucztcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogR2V0IHNpemUgc2VsZWN0b3Igb3B0aW9ucy5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHJldHVybnMge0FycmF5fSBTaXplIG9wdGlvbnMuXG5cdFx0ICovXG5cdFx0Z2V0U2l6ZU9wdGlvbnM6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRyZXR1cm4gW1xuXHRcdFx0XHR7XG5cdFx0XHRcdFx0bGFiZWw6IHN0cmluZ3Muc21hbGwsXG5cdFx0XHRcdFx0dmFsdWU6ICdzbWFsbCcsXG5cdFx0XHRcdH0sXG5cdFx0XHRcdHtcblx0XHRcdFx0XHRsYWJlbDogc3RyaW5ncy5tZWRpdW0sXG5cdFx0XHRcdFx0dmFsdWU6ICdtZWRpdW0nLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHR7XG5cdFx0XHRcdFx0bGFiZWw6IHN0cmluZ3MubGFyZ2UsXG5cdFx0XHRcdFx0dmFsdWU6ICdsYXJnZScsXG5cdFx0XHRcdH0sXG5cdFx0XHRdO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBFdmVudCBgd3Bmb3Jtc0Zvcm1TZWxlY3RvckVkaXRgIGhhbmRsZXIuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKlxuXHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBlICAgICBFdmVudCBvYmplY3QuXG5cdFx0ICogQHBhcmFtIHtvYmplY3R9IHByb3BzIEJsb2NrIHByb3BlcnRpZXMuXG5cdFx0ICovXG5cdFx0YmxvY2tFZGl0OiBmdW5jdGlvbiggZSwgcHJvcHMgKSB7XG5cblx0XHRcdGNvbnN0IGJsb2NrID0gYXBwLmdldEJsb2NrQ29udGFpbmVyKCBwcm9wcyApO1xuXG5cdFx0XHRpZiAoICEgYmxvY2sgfHwgISBibG9jay5kYXRhc2V0ICkge1xuXHRcdFx0XHRyZXR1cm47XG5cdFx0XHR9XG5cblx0XHRcdGFwcC5pbml0TGVhZEZvcm1TZXR0aW5ncyggYmxvY2sucGFyZW50RWxlbWVudCApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBJbml0IExlYWQgRm9ybSBTZXR0aW5ncyBwYW5lbHMuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKlxuXHRcdCAqIEBwYXJhbSB7RWxlbWVudH0gYmxvY2sgQmxvY2sgZWxlbWVudC5cblx0XHQgKi9cblx0XHRpbml0TGVhZEZvcm1TZXR0aW5nczogZnVuY3Rpb24oIGJsb2NrICkge1xuXG5cdFx0XHRpZiAoICEgYmxvY2sgfHwgISBibG9jay5kYXRhc2V0ICkge1xuXHRcdFx0XHRyZXR1cm47XG5cdFx0XHR9XG5cblx0XHRcdGlmICggISBhcHAuaXNGdWxsU3R5bGluZ0VuYWJsZWQoKSApIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHRjb25zdCBjbGllbnRJZCA9IGJsb2NrLmRhdGFzZXQuYmxvY2s7XG5cdFx0XHRjb25zdCAkZm9ybSA9ICQoIGJsb2NrLnF1ZXJ5U2VsZWN0b3IoICcud3Bmb3Jtcy1jb250YWluZXInICkgKTtcblx0XHRcdGNvbnN0ICRwYW5lbCA9ICQoIGAud3Bmb3Jtcy1ibG9jay1zZXR0aW5ncy0ke2NsaWVudElkfWAgKTtcblxuXHRcdFx0aWYgKCAkZm9ybS5oYXNDbGFzcyggJ3dwZm9ybXMtbGVhZC1mb3Jtcy1jb250YWluZXInICkgKSB7XG5cblx0XHRcdFx0JHBhbmVsXG5cdFx0XHRcdFx0LmFkZENsYXNzKCAnZGlzYWJsZWRfcGFuZWwnIClcblx0XHRcdFx0XHQuZmluZCggJy53cGZvcm1zLWd1dGVuYmVyZy1wYW5lbC1ub3RpY2Uud3Bmb3Jtcy1sZWFkLWZvcm0tbm90aWNlJyApXG5cdFx0XHRcdFx0LmNzcyggJ2Rpc3BsYXknLCAnYmxvY2snICk7XG5cblx0XHRcdFx0JHBhbmVsXG5cdFx0XHRcdFx0LmZpbmQoICcud3Bmb3Jtcy1ndXRlbmJlcmctcGFuZWwtbm90aWNlLndwZm9ybXMtdXNlLW1vZGVybi1ub3RpY2UnIClcblx0XHRcdFx0XHQuY3NzKCAnZGlzcGxheScsICdub25lJyApO1xuXG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblxuXHRcdFx0JHBhbmVsXG5cdFx0XHRcdC5yZW1vdmVDbGFzcyggJ2Rpc2FibGVkX3BhbmVsJyApXG5cdFx0XHRcdC5maW5kKCAnLndwZm9ybXMtZ3V0ZW5iZXJnLXBhbmVsLW5vdGljZS53cGZvcm1zLWxlYWQtZm9ybS1ub3RpY2UnIClcblx0XHRcdFx0LmNzcyggJ2Rpc3BsYXknLCAnbm9uZScgKTtcblxuXHRcdFx0JHBhbmVsXG5cdFx0XHRcdC5maW5kKCAnLndwZm9ybXMtZ3V0ZW5iZXJnLXBhbmVsLW5vdGljZS53cGZvcm1zLXVzZS1tb2Rlcm4tbm90aWNlJyApXG5cdFx0XHRcdC5jc3MoICdkaXNwbGF5JywgbnVsbCApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBFdmVudCBgd3Bmb3Jtc0Zvcm1TZWxlY3RvckZvcm1Mb2FkZWRgIGhhbmRsZXIuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKlxuXHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBlIEV2ZW50IG9iamVjdC5cblx0XHQgKi9cblx0XHRmb3JtTG9hZGVkOiBmdW5jdGlvbiggZSApIHtcblxuXHRcdFx0YXBwLmluaXRMZWFkRm9ybVNldHRpbmdzKCBlLmRldGFpbC5ibG9jayApO1xuXHRcdFx0YXBwLnVwZGF0ZUFjY2VudENvbG9ycyggZS5kZXRhaWwgKTtcblx0XHRcdGFwcC5sb2FkQ2hvaWNlc0pTKCBlLmRldGFpbCApO1xuXHRcdFx0YXBwLmluaXRSaWNoVGV4dEZpZWxkKCBlLmRldGFpbC5mb3JtSWQgKTtcblxuXHRcdFx0JCggZS5kZXRhaWwuYmxvY2sgKVxuXHRcdFx0XHQub2ZmKCAnY2xpY2snIClcblx0XHRcdFx0Lm9uKCAnY2xpY2snLCBhcHAuYmxvY2tDbGljayApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBDbGljayBvbiB0aGUgYmxvY2sgZXZlbnQgaGFuZGxlci5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHBhcmFtIHtvYmplY3R9IGUgRXZlbnQgb2JqZWN0LlxuXHRcdCAqL1xuXHRcdGJsb2NrQ2xpY2s6IGZ1bmN0aW9uKCBlICkge1xuXG5cdFx0XHRhcHAuaW5pdExlYWRGb3JtU2V0dGluZ3MoIGUuY3VycmVudFRhcmdldCApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBVcGRhdGUgYWNjZW50IGNvbG9ycyBvZiBzb21lIGZpZWxkcyBpbiBHQiBibG9jayBpbiBNb2Rlcm4gTWFya3VwIG1vZGUuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKlxuXHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBkZXRhaWwgRXZlbnQgZGV0YWlscyBvYmplY3QuXG5cdFx0ICovXG5cdFx0dXBkYXRlQWNjZW50Q29sb3JzOiBmdW5jdGlvbiggZGV0YWlsICkge1xuXG5cdFx0XHRpZiAoXG5cdFx0XHRcdCEgd3Bmb3Jtc19ndXRlbmJlcmdfZm9ybV9zZWxlY3Rvci5pc19tb2Rlcm5fbWFya3VwIHx8XG5cdFx0XHRcdCEgd2luZG93LldQRm9ybXMgfHxcblx0XHRcdFx0ISB3aW5kb3cuV1BGb3Jtcy5Gcm9udGVuZE1vZGVybiB8fFxuXHRcdFx0XHQhIGRldGFpbC5ibG9ja1xuXHRcdFx0KSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblxuXHRcdFx0Y29uc3QgJGZvcm0gPSAkKCBkZXRhaWwuYmxvY2sucXVlcnlTZWxlY3RvciggYCN3cGZvcm1zLSR7ZGV0YWlsLmZvcm1JZH1gICkgKSxcblx0XHRcdFx0RnJvbnRlbmRNb2Rlcm4gPSB3aW5kb3cuV1BGb3Jtcy5Gcm9udGVuZE1vZGVybjtcblxuXHRcdFx0RnJvbnRlbmRNb2Rlcm4udXBkYXRlR0JCbG9ja1BhZ2VJbmRpY2F0b3JDb2xvciggJGZvcm0gKTtcblx0XHRcdEZyb250ZW5kTW9kZXJuLnVwZGF0ZUdCQmxvY2tJY29uQ2hvaWNlc0NvbG9yKCAkZm9ybSApO1xuXHRcdFx0RnJvbnRlbmRNb2Rlcm4udXBkYXRlR0JCbG9ja1JhdGluZ0NvbG9yKCAkZm9ybSApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBJbml0IE1vZGVybiBzdHlsZSBEcm9wZG93biBmaWVsZHMgKDxzZWxlY3Q+KS5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHBhcmFtIHtvYmplY3R9IGRldGFpbCBFdmVudCBkZXRhaWxzIG9iamVjdC5cblx0XHQgKi9cblx0XHRsb2FkQ2hvaWNlc0pTOiBmdW5jdGlvbiggZGV0YWlsICkge1xuXG5cdFx0XHRpZiAoIHR5cGVvZiB3aW5kb3cuQ2hvaWNlcyAhPT0gJ2Z1bmN0aW9uJyApIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHRjb25zdCAkZm9ybSA9ICQoIGRldGFpbC5ibG9jay5xdWVyeVNlbGVjdG9yKCBgI3dwZm9ybXMtJHtkZXRhaWwuZm9ybUlkfWAgKSApO1xuXG5cdFx0XHQkZm9ybS5maW5kKCAnLmNob2ljZXNqcy1zZWxlY3QnICkuZWFjaCggZnVuY3Rpb24oIGlkeCwgZWwgKSB7XG5cblx0XHRcdFx0Y29uc3QgJGVsID0gJCggZWwgKTtcblxuXHRcdFx0XHRpZiAoICRlbC5kYXRhKCAnY2hvaWNlJyApID09PSAnYWN0aXZlJyApIHtcblx0XHRcdFx0XHRyZXR1cm47XG5cdFx0XHRcdH1cblxuXHRcdFx0XHR2YXIgYXJncyA9IHdpbmRvdy53cGZvcm1zX2Nob2ljZXNqc19jb25maWcgfHwge30sXG5cdFx0XHRcdFx0c2VhcmNoRW5hYmxlZCA9ICRlbC5kYXRhKCAnc2VhcmNoLWVuYWJsZWQnICksXG5cdFx0XHRcdFx0JGZpZWxkID0gJGVsLmNsb3Nlc3QoICcud3Bmb3Jtcy1maWVsZCcgKTtcblxuXHRcdFx0XHRhcmdzLnNlYXJjaEVuYWJsZWQgPSAndW5kZWZpbmVkJyAhPT0gdHlwZW9mIHNlYXJjaEVuYWJsZWQgPyBzZWFyY2hFbmFibGVkIDogdHJ1ZTtcblx0XHRcdFx0YXJncy5jYWxsYmFja09uSW5pdCA9IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRcdFx0dmFyIHNlbGYgPSB0aGlzLFxuXHRcdFx0XHRcdFx0JGVsZW1lbnQgPSAkKCBzZWxmLnBhc3NlZEVsZW1lbnQuZWxlbWVudCApLFxuXHRcdFx0XHRcdFx0JGlucHV0ID0gJCggc2VsZi5pbnB1dC5lbGVtZW50ICksXG5cdFx0XHRcdFx0XHRzaXplQ2xhc3MgPSAkZWxlbWVudC5kYXRhKCAnc2l6ZS1jbGFzcycgKTtcblxuXHRcdFx0XHRcdC8vIEFkZCBDU1MtY2xhc3MgZm9yIHNpemUuXG5cdFx0XHRcdFx0aWYgKCBzaXplQ2xhc3MgKSB7XG5cdFx0XHRcdFx0XHQkKCBzZWxmLmNvbnRhaW5lck91dGVyLmVsZW1lbnQgKS5hZGRDbGFzcyggc2l6ZUNsYXNzICk7XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0LyoqXG5cdFx0XHRcdFx0ICogSWYgYSBtdWx0aXBsZSBzZWxlY3QgaGFzIHNlbGVjdGVkIGNob2ljZXMgLSBoaWRlIGEgcGxhY2Vob2xkZXIgdGV4dC5cblx0XHRcdFx0XHQgKiBJbiBjYXNlIGlmIHNlbGVjdCBpcyBlbXB0eSAtIHdlIHJldHVybiBwbGFjZWhvbGRlciB0ZXh0IGJhY2suXG5cdFx0XHRcdFx0ICovXG5cdFx0XHRcdFx0aWYgKCAkZWxlbWVudC5wcm9wKCAnbXVsdGlwbGUnICkgKSB7XG5cblx0XHRcdFx0XHRcdC8vIE9uIGluaXQgZXZlbnQuXG5cdFx0XHRcdFx0XHQkaW5wdXQuZGF0YSggJ3BsYWNlaG9sZGVyJywgJGlucHV0LmF0dHIoICdwbGFjZWhvbGRlcicgKSApO1xuXG5cdFx0XHRcdFx0XHRpZiAoIHNlbGYuZ2V0VmFsdWUoIHRydWUgKS5sZW5ndGggKSB7XG5cdFx0XHRcdFx0XHRcdCRpbnB1dC5yZW1vdmVBdHRyKCAncGxhY2Vob2xkZXInICk7XG5cdFx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0dGhpcy5kaXNhYmxlKCk7XG5cdFx0XHRcdFx0JGZpZWxkLmZpbmQoICcuaXMtZGlzYWJsZWQnICkucmVtb3ZlQ2xhc3MoICdpcy1kaXNhYmxlZCcgKTtcblx0XHRcdFx0fTtcblxuXHRcdFx0XHR0cnkge1xuXHRcdFx0XHRcdGNvbnN0IGNob2ljZXNJbnN0YW5jZSA9ICBuZXcgQ2hvaWNlcyggZWwsIGFyZ3MgKTtcblxuXHRcdFx0XHRcdC8vIFNhdmUgQ2hvaWNlcy5qcyBpbnN0YW5jZSBmb3IgZnV0dXJlIGFjY2Vzcy5cblx0XHRcdFx0XHQkZWwuZGF0YSggJ2Nob2ljZXNqcycsIGNob2ljZXNJbnN0YW5jZSApO1xuXG5cdFx0XHRcdH0gY2F0Y2ggKCBlICkge30gLy8gZXNsaW50LWRpc2FibGUtbGluZSBuby1lbXB0eVxuXHRcdFx0fSApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBJbml0aWFsaXplIFJpY2hUZXh0IGZpZWxkLlxuXHRcdCAqXG5cdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0ICpcblx0XHQgKiBAcGFyYW0ge2ludH0gZm9ybUlkIEZvcm0gSUQuXG5cdFx0ICovXG5cdFx0aW5pdFJpY2hUZXh0RmllbGQ6IGZ1bmN0aW9uKCBmb3JtSWQgKSB7XG5cblx0XHRcdC8vIFNldCBkZWZhdWx0IHRhYiB0byBgVmlzdWFsYC5cblx0XHRcdCQoIGAjd3Bmb3Jtcy0ke2Zvcm1JZH0gLndwLWVkaXRvci13cmFwYCApLnJlbW92ZUNsYXNzKCAnaHRtbC1hY3RpdmUnICkuYWRkQ2xhc3MoICd0bWNlLWFjdGl2ZScgKTtcblx0XHR9LFxuXHR9O1xuXG5cdC8vIFByb3ZpZGUgYWNjZXNzIHRvIHB1YmxpYyBmdW5jdGlvbnMvcHJvcGVydGllcy5cblx0cmV0dXJuIGFwcDtcblxufSggZG9jdW1lbnQsIHdpbmRvdywgalF1ZXJ5ICkgKTtcblxuLy8gSW5pdGlhbGl6ZS5cbldQRm9ybXMuRm9ybVNlbGVjdG9yLmluaXQoKTtcbiJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTs7QUFFQSxZQUFZOztBQUVaO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFKQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFLQSxJQUFJQSxPQUFPLEdBQUdDLE1BQU0sQ0FBQ0QsT0FBTyxJQUFJLENBQUMsQ0FBQztBQUVsQ0EsT0FBTyxDQUFDRSxZQUFZLEdBQUdGLE9BQU8sQ0FBQ0UsWUFBWSxJQUFNLFVBQVVDLFFBQVEsRUFBRUYsTUFBTSxFQUFFRyxDQUFDLEVBQUc7RUFFaEYsVUFBZ0ZDLEVBQUU7SUFBQSwyQkFBMUVDLGdCQUFnQjtJQUFFQyxnQkFBZ0IscUNBQUdGLEVBQUUsQ0FBQ0csVUFBVSxDQUFDRCxnQkFBZ0I7RUFDM0Usa0JBQThDRixFQUFFLENBQUNJLE9BQU87SUFBaERDLGFBQWEsZUFBYkEsYUFBYTtJQUFFQyxRQUFRLGVBQVJBLFFBQVE7SUFBRUMsUUFBUSxlQUFSQSxRQUFRO0VBQ3pDLElBQVFDLGlCQUFpQixHQUFLUixFQUFFLENBQUNTLE1BQU0s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
},{}]},{},[1])