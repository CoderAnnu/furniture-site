(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
/* global wpforms_edit_post_education */

/**
 * WPForms Edit Post Education function.
 *
 * @since 1.8.1
 */

'use strict';

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(arr, i) { var _i = null == arr ? null : "undefined" != typeof Symbol && arr[Symbol.iterator] || arr["@@iterator"]; if (null != _i) { var _s, _e, _x, _r, _arr = [], _n = !0, _d = !1; try { if (_x = (_i = _i.call(arr)).next, 0 === i) { if (Object(_i) !== _i) return; _n = !1; } else for (; !(_n = (_s = _x.call(_i)).done) && (_arr.push(_s.value), _arr.length !== i); _n = !0); } catch (err) { _d = !0, _e = err; } finally { try { if (!_n && null != _i.return && (_r = _i.return(), Object(_r) !== _r)) return; } finally { if (_d) throw _e; } } return _arr; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
var WPFormsEditPostEducation = window.WPFormsEditPostEducation || function (document, window, $) {
  /**
   * Public functions and properties.
   *
   * @since 1.8.1
   *
   * @type {object}
   */
  var app = {
    /**
     * Determine if the notice was showed before.
     *
     * @since 1.8.1
     */
    isNoticeVisible: false,
    /**
     * Start the engine.
     *
     * @since 1.8.1
     */
    init: function init() {
      $(window).on('load', function () {
        // In the case of jQuery 3.+, we need to wait for a ready event first.
        if (typeof $.ready.then === 'function') {
          $.ready.then(app.load);
        } else {
          app.load();
        }
      });
    },
    /**
     * Page load.
     *
     * @since 1.8.1
     */
    load: function load() {
      if (!app.isGutenbergEditor()) {
        app.maybeShowClassicNotice();
        app.bindClassicEvents();
        return;
      }
      var blockLoadedInterval = setInterval(function () {
        if (!document.querySelector('.editor-post-title__input, iframe[name="editor-canvas"]')) {
          return;
        }
        clearInterval(blockLoadedInterval);
        if (!app.isFse()) {
          app.maybeShowGutenbergNotice();
          app.bindGutenbergEvents();
          return;
        }
        var iframe = document.querySelector('iframe[name="editor-canvas"]');
        var observer = new MutationObserver(function () {
          var iframeDocument = iframe.contentDocument || iframe.contentWindow.document || {};
          if (iframeDocument.readyState === 'complete' && iframeDocument.querySelector('.editor-post-title__input')) {
            app.maybeShowGutenbergNotice();
            app.bindFseEvents();
            observer.disconnect();
          }
        });
        observer.observe(document.body, {
          subtree: true,
          childList: true
        });
      }, 200);
    },
    /**
     * Bind events for Classic Editor.
     *
     * @since 1.8.1
     */
    bindClassicEvents: function bindClassicEvents() {
      var $document = $(document);
      if (!app.isNoticeVisible) {
        $document.on('input', '#title', app.maybeShowClassicNotice);
      }
      $document.on('click', '.wpforms-edit-post-education-notice-close', app.closeNotice);
    },
    /**
     * Bind events for Gutenberg Editor.
     *
     * @since 1.8.1
     */
    bindGutenbergEvents: function bindGutenbergEvents() {
      var $document = $(document);
      $document.on('DOMSubtreeModified', '.edit-post-layout', app.distractionFreeModeToggle);
      if (app.isNoticeVisible) {
        return;
      }
      $document.on('input', '.editor-post-title__input', app.maybeShowGutenbergNotice).on('DOMSubtreeModified', '.editor-post-title__input', app.maybeShowGutenbergNotice);
    },
    /**
     * Bind events for Gutenberg Editor in FSE mode.
     *
     * @since 1.8.1
     */
    bindFseEvents: function bindFseEvents() {
      var $iframe = $('iframe[name="editor-canvas"]');
      $(document).on('DOMSubtreeModified', '.edit-post-layout', app.distractionFreeModeToggle);
      $iframe.contents().on('DOMSubtreeModified', '.editor-post-title__input', app.maybeShowGutenbergNotice);
    },
    /**
     * Determine if the editor is Gutenberg.
     *
     * @since 1.8.1
     *
     * @returns {boolean} True if the editor is Gutenberg.
     */
    isGutenbergEditor: function isGutenbergEditor() {
      return typeof wp !== 'undefined' && typeof wp.blocks !== 'undefined';
    },
    /**
     * Determine if the editor is Gutenberg in FSE mode.
     *
     * @since 1.8.1
     *
     * @returns {boolean} True if the Gutenberg editor in FSE mode.
     */
    isFse: function isFse() {
      return Boolean($('iframe[name="editor-canvas"]').length);
    },
    /**
     * Create a notice for Gutenberg.
     *
     * @since 1.8.1
     */
    showGutenbergNotice: function showGutenbergNotice() {
      wp.data.dispatch('core/notices').createInfoNotice(wpforms_edit_post_education.gutenberg_notice.template, app.getGutenbergNoticeSettings());

      // The notice component doesn't have a way to add HTML id or class to the notice.
      // Also, the notice became visible with a delay on old Gutenberg versions.
      var hasNotice = setInterval(function () {
        var noticeBody = $('.wpforms-edit-post-education-notice-body');
        if (!noticeBody.length) {
          return;
        }
        var $notice = noticeBody.closest('.components-notice');
        $notice.addClass('wpforms-edit-post-education-notice');
        $notice.find('.is-secondary, .is-link').removeClass('is-secondary').removeClass('is-link').addClass('is-primary');
        clearInterval(hasNotice);
      }, 100);
    },
    /**
     * Get settings for the Gutenberg notice.
     *
     * @since 1.8.1
     *
     * @returns {object} Notice settings.
     */
    getGutenbergNoticeSettings: function getGutenbergNoticeSettings() {
      var pluginName = 'wpforms-edit-post-product-education-guide';
      var noticeSettings = {
        id: pluginName,
        isDismissible: true,
        HTML: true,
        __unstableHTML: true,
        actions: [{
          className: 'wpforms-edit-post-education-notice-guide-button',
          variant: 'primary',
          label: wpforms_edit_post_education.gutenberg_notice.button
        }]
      };
      if (!wpforms_edit_post_education.gutenberg_guide) {
        noticeSettings.actions[0].url = wpforms_edit_post_education.gutenberg_notice.url;
        return noticeSettings;
      }
      var Guide = wp.components.Guide;
      var useState = wp.element.useState;
      var registerPlugin = wp.plugins.registerPlugin;
      var unregisterPlugin = wp.plugins.unregisterPlugin;
      var GutenbergTutorial = function GutenbergTutorial() {
        var _useState = useState(true),
          _useState2 = _slicedToArray(_useState, 2),
          isOpen = _useState2[0],
          setIsOpen = _useState2[1];
        if (!isOpen) {
          return null;
        }
        return (
          /*#__PURE__*/
          // eslint-disable-next-line react/react-in-jsx-scope
          React.createElement(Guide, {
            className: "edit-post-welcome-guide",
            onFinish: function onFinish() {
              unregisterPlugin(pluginName);
              setIsOpen(false);
            },
            pages: app.getGuidePages()
          })
        );
      };
      noticeSettings.onDismiss = app.updateUserMeta;
      noticeSettings.actions[0].onClick = function () {
        return registerPlugin(pluginName, {
          render: GutenbergTutorial
        });
      };
      return noticeSettings;
    },
    /**
     * Get Guide pages in proper format.
     *
     * @since 1.8.1
     *
     * @returns {Array} Guide Pages.
     */
    getGuidePages: function getGuidePages() {
      var pages = [];
      wpforms_edit_post_education.gutenberg_guide.forEach(function (page) {
        pages.push({
          /* eslint-disable react/react-in-jsx-scope */
          content: /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("h1", {
            className: "edit-post-welcome-guide__heading"
          }, page.title), /*#__PURE__*/React.createElement("p", {
            className: "edit-post-welcome-guide__text"
          }, page.content)),
          image: /*#__PURE__*/React.createElement("img", {
            className: "edit-post-welcome-guide__image",
            src: page.image,
            alt: page.title
          })
          /* eslint-enable react/react-in-jsx-scope */
        });
      });

      return pages;
    },
    /**
     * Show notice if the page title matches some keywords for Classic Editor.
     *
     * @since 1.8.1
     */
    maybeShowClassicNotice: function maybeShowClassicNotice() {
      if (app.isNoticeVisible) {
        return;
      }
      if (app.isTitleMatchKeywords($('#title').val())) {
        app.isNoticeVisible = true;
        $('.wpforms-edit-post-education-notice').removeClass('wpforms-hidden');
      }
    },
    /**
     * Show notice if the page title matches some keywords for Gutenberg Editor.
     *
     * @since 1.8.1
     */
    maybeShowGutenbergNotice: function maybeShowGutenbergNotice() {
      if (app.isNoticeVisible) {
        return;
      }
      var $postTitle = app.isFse() ? $('iframe[name="editor-canvas"]').contents().find('.editor-post-title__input') : $('.editor-post-title__input');
      var tagName = $postTitle.prop('tagName');
      var title = tagName === 'TEXTAREA' ? $postTitle.val() : $postTitle.text();
      if (app.isTitleMatchKeywords(title)) {
        app.isNoticeVisible = true;
        app.showGutenbergNotice();
      }
    },
    /**
     * Add notice class when the distraction mode is enabled.
     *
     * @since 1.8.1.2
     */
    distractionFreeModeToggle: function distractionFreeModeToggle() {
      if (!app.isNoticeVisible) {
        return;
      }
      var $document = $(document);
      var isDistractionFreeMode = Boolean($document.find('.is-distraction-free').length);
      if (!isDistractionFreeMode) {
        return;
      }
      var isNoticeHasClass = Boolean($('.wpforms-edit-post-education-notice').length);
      if (isNoticeHasClass) {
        return;
      }
      var $noticeBody = $document.find('.wpforms-edit-post-education-notice-body');
      var $notice = $noticeBody.closest('.components-notice');
      $notice.addClass('wpforms-edit-post-education-notice');
    },
    /**
     * Determine if the title matches keywords.
     *
     * @since 1.8.1
     *
     * @param {string} titleValue Page title value.
     *
     * @returns {boolean} True if the title matches some keywords.
     */
    isTitleMatchKeywords: function isTitleMatchKeywords(titleValue) {
      var expectedTitleRegex = new RegExp(/\b(contact|form)\b/i);
      return expectedTitleRegex.test(titleValue);
    },
    /**
     * Close a notice.
     *
     * @since 1.8.1
     */
    closeNotice: function closeNotice() {
      $(this).closest('.wpforms-edit-post-education-notice').remove();
      app.updateUserMeta();
    },
    /**
     * Update user meta and don't show the notice next time.
     *
     * @since 1.8.1
     */
    updateUserMeta: function updateUserMeta() {
      $.post(wpforms_edit_post_education.ajax_url, {
        action: 'wpforms_education_dismiss',
        nonce: wpforms_edit_post_education.education_nonce,
        section: 'edit-post-notice'
      });
    }
  };
  return app;
}(document, window, jQuery);
WPFormsEditPostEducation.init();
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJXUEZvcm1zRWRpdFBvc3RFZHVjYXRpb24iLCJ3aW5kb3ciLCJkb2N1bWVudCIsIiQiLCJhcHAiLCJpc05vdGljZVZpc2libGUiLCJpbml0Iiwib24iLCJyZWFkeSIsInRoZW4iLCJsb2FkIiwiaXNHdXRlbmJlcmdFZGl0b3IiLCJtYXliZVNob3dDbGFzc2ljTm90aWNlIiwiYmluZENsYXNzaWNFdmVudHMiLCJibG9ja0xvYWRlZEludGVydmFsIiwic2V0SW50ZXJ2YWwiLCJxdWVyeVNlbGVjdG9yIiwiY2xlYXJJbnRlcnZhbCIsImlzRnNlIiwibWF5YmVTaG93R3V0ZW5iZXJnTm90aWNlIiwiYmluZEd1dGVuYmVyZ0V2ZW50cyIsImlmcmFtZSIsIm9ic2VydmVyIiwiTXV0YXRpb25PYnNlcnZlciIsImlmcmFtZURvY3VtZW50IiwiY29udGVudERvY3VtZW50IiwiY29udGVudFdpbmRvdyIsInJlYWR5U3RhdGUiLCJiaW5kRnNlRXZlbnRzIiwiZGlzY29ubmVjdCIsIm9ic2VydmUiLCJib2R5Iiwic3VidHJlZSIsImNoaWxkTGlzdCIsIiRkb2N1bWVudCIsImNsb3NlTm90aWNlIiwiZGlzdHJhY3Rpb25GcmVlTW9kZVRvZ2dsZSIsIiRpZnJhbWUiLCJjb250ZW50cyIsIndwIiwiYmxvY2tzIiwiQm9vbGVhbiIsImxlbmd0aCIsInNob3dHdXRlbmJlcmdOb3RpY2UiLCJkYXRhIiwiZGlzcGF0Y2giLCJjcmVhdGVJbmZvTm90aWNlIiwid3Bmb3Jtc19lZGl0X3Bvc3RfZWR1Y2F0aW9uIiwiZ3V0ZW5iZXJnX25vdGljZSIsInRlbXBsYXRlIiwiZ2V0R3V0ZW5iZXJnTm90aWNlU2V0dGluZ3MiLCJoYXNOb3RpY2UiLCJub3RpY2VCb2R5IiwiJG5vdGljZSIsImNsb3Nlc3QiLCJhZGRDbGFzcyIsImZpbmQiLCJyZW1vdmVDbGFzcyIsInBsdWdpbk5hbWUiLCJub3RpY2VTZXR0aW5ncyIsImlkIiwiaXNEaXNtaXNzaWJsZSIsIkhUTUwiLCJfX3Vuc3RhYmxlSFRNTCIsImFjdGlvbnMiLCJjbGFzc05hbWUiLCJ2YXJpYW50IiwibGFiZWwiLCJidXR0b24iLCJndXRlbmJlcmdfZ3VpZGUiLCJ1cmwiLCJHdWlkZSIsImNvbXBvbmVudHMiLCJ1c2VTdGF0ZSIsImVsZW1lbnQiLCJyZWdpc3RlclBsdWdpbiIsInBsdWdpbnMiLCJ1bnJlZ2lzdGVyUGx1Z2luIiwiR3V0ZW5iZXJnVHV0b3JpYWwiLCJpc09wZW4iLCJzZXRJc09wZW4iLCJnZXRHdWlkZVBhZ2VzIiwib25EaXNtaXNzIiwidXBkYXRlVXNlck1ldGEiLCJvbkNsaWNrIiwicmVuZGVyIiwicGFnZXMiLCJmb3JFYWNoIiwicGFnZSIsInB1c2giLCJjb250ZW50IiwidGl0bGUiLCJpbWFnZSIsImlzVGl0bGVNYXRjaEtleXdvcmRzIiwidmFsIiwiJHBvc3RUaXRsZSIsInRhZ05hbWUiLCJwcm9wIiwidGV4dCIsImlzRGlzdHJhY3Rpb25GcmVlTW9kZSIsImlzTm90aWNlSGFzQ2xhc3MiLCIkbm90aWNlQm9keSIsInRpdGxlVmFsdWUiLCJleHBlY3RlZFRpdGxlUmVnZXgiLCJSZWdFeHAiLCJ0ZXN0IiwicmVtb3ZlIiwicG9zdCIsImFqYXhfdXJsIiwiYWN0aW9uIiwibm9uY2UiLCJlZHVjYXRpb25fbm9uY2UiLCJzZWN0aW9uIiwialF1ZXJ5Il0sInNvdXJjZXMiOlsiZmFrZV8zNDk3NjAyNi5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKiBnbG9iYWwgd3Bmb3Jtc19lZGl0X3Bvc3RfZWR1Y2F0aW9uICovXG5cbi8qKlxuICogV1BGb3JtcyBFZGl0IFBvc3QgRWR1Y2F0aW9uIGZ1bmN0aW9uLlxuICpcbiAqIEBzaW5jZSAxLjguMVxuICovXG5cbid1c2Ugc3RyaWN0JztcblxuY29uc3QgV1BGb3Jtc0VkaXRQb3N0RWR1Y2F0aW9uID0gd2luZG93LldQRm9ybXNFZGl0UG9zdEVkdWNhdGlvbiB8fCAoIGZ1bmN0aW9uKCBkb2N1bWVudCwgd2luZG93LCAkICkge1xuXG5cdC8qKlxuXHQgKiBQdWJsaWMgZnVuY3Rpb25zIGFuZCBwcm9wZXJ0aWVzLlxuXHQgKlxuXHQgKiBAc2luY2UgMS44LjFcblx0ICpcblx0ICogQHR5cGUge29iamVjdH1cblx0ICovXG5cdGNvbnN0IGFwcCA9IHtcblxuXHRcdC8qKlxuXHRcdCAqIERldGVybWluZSBpZiB0aGUgbm90aWNlIHdhcyBzaG93ZWQgYmVmb3JlLlxuXHRcdCAqXG5cdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0ICovXG5cdFx0aXNOb3RpY2VWaXNpYmxlOiBmYWxzZSxcblxuXHRcdC8qKlxuXHRcdCAqIFN0YXJ0IHRoZSBlbmdpbmUuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKi9cblx0XHRpbml0OiBmdW5jdGlvbigpIHtcblxuXHRcdFx0JCggd2luZG93ICkub24oICdsb2FkJywgZnVuY3Rpb24oKSB7XG5cblx0XHRcdFx0Ly8gSW4gdGhlIGNhc2Ugb2YgalF1ZXJ5IDMuKywgd2UgbmVlZCB0byB3YWl0IGZvciBhIHJlYWR5IGV2ZW50IGZpcnN0LlxuXHRcdFx0XHRpZiAoIHR5cGVvZiAkLnJlYWR5LnRoZW4gPT09ICdmdW5jdGlvbicgKSB7XG5cdFx0XHRcdFx0JC5yZWFkeS50aGVuKCBhcHAubG9hZCApO1xuXHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdGFwcC5sb2FkKCk7XG5cdFx0XHRcdH1cblx0XHRcdH0gKTtcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogUGFnZSBsb2FkLlxuXHRcdCAqXG5cdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0ICovXG5cdFx0bG9hZDogZnVuY3Rpb24oKSB7XG5cblx0XHRcdGlmICggISBhcHAuaXNHdXRlbmJlcmdFZGl0b3IoKSApIHtcblx0XHRcdFx0YXBwLm1heWJlU2hvd0NsYXNzaWNOb3RpY2UoKTtcblx0XHRcdFx0YXBwLmJpbmRDbGFzc2ljRXZlbnRzKCk7XG5cblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHRjb25zdCBibG9ja0xvYWRlZEludGVydmFsID0gc2V0SW50ZXJ2YWwoIGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRcdGlmICggISBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCAnLmVkaXRvci1wb3N0LXRpdGxlX19pbnB1dCwgaWZyYW1lW25hbWU9XCJlZGl0b3ItY2FudmFzXCJdJyApICkge1xuXHRcdFx0XHRcdHJldHVybjtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGNsZWFySW50ZXJ2YWwoIGJsb2NrTG9hZGVkSW50ZXJ2YWwgKTtcblxuXHRcdFx0XHRpZiAoICEgYXBwLmlzRnNlKCkgKSB7XG5cblx0XHRcdFx0XHRhcHAubWF5YmVTaG93R3V0ZW5iZXJnTm90aWNlKCk7XG5cdFx0XHRcdFx0YXBwLmJpbmRHdXRlbmJlcmdFdmVudHMoKTtcblxuXHRcdFx0XHRcdHJldHVybjtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGNvbnN0IGlmcmFtZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoICdpZnJhbWVbbmFtZT1cImVkaXRvci1jYW52YXNcIl0nICk7XG5cdFx0XHRcdGNvbnN0IG9ic2VydmVyID0gbmV3IE11dGF0aW9uT2JzZXJ2ZXIoIGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRcdFx0Y29uc3QgaWZyYW1lRG9jdW1lbnQgPSBpZnJhbWUuY29udGVudERvY3VtZW50IHx8IGlmcmFtZS5jb250ZW50V2luZG93LmRvY3VtZW50IHx8IHt9O1xuXG5cdFx0XHRcdFx0aWYgKCBpZnJhbWVEb2N1bWVudC5yZWFkeVN0YXRlID09PSAnY29tcGxldGUnICYmIGlmcmFtZURvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoICcuZWRpdG9yLXBvc3QtdGl0bGVfX2lucHV0JyApICkge1xuXHRcdFx0XHRcdFx0YXBwLm1heWJlU2hvd0d1dGVuYmVyZ05vdGljZSgpO1xuXHRcdFx0XHRcdFx0YXBwLmJpbmRGc2VFdmVudHMoKTtcblxuXHRcdFx0XHRcdFx0b2JzZXJ2ZXIuZGlzY29ubmVjdCgpO1xuXHRcdFx0XHRcdH1cblx0XHRcdFx0fSApO1xuXHRcdFx0XHRvYnNlcnZlci5vYnNlcnZlKCBkb2N1bWVudC5ib2R5LCB7IHN1YnRyZWU6IHRydWUsIGNoaWxkTGlzdDogdHJ1ZSB9ICk7XG5cdFx0XHR9LCAyMDAgKTtcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogQmluZCBldmVudHMgZm9yIENsYXNzaWMgRWRpdG9yLlxuXHRcdCAqXG5cdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0ICovXG5cdFx0YmluZENsYXNzaWNFdmVudHM6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRjb25zdCAkZG9jdW1lbnQgPSAkKCBkb2N1bWVudCApO1xuXG5cdFx0XHRpZiAoICEgYXBwLmlzTm90aWNlVmlzaWJsZSApIHtcblx0XHRcdFx0JGRvY3VtZW50Lm9uKCAnaW5wdXQnLCAnI3RpdGxlJywgYXBwLm1heWJlU2hvd0NsYXNzaWNOb3RpY2UgKTtcblx0XHRcdH1cblxuXHRcdFx0JGRvY3VtZW50Lm9uKCAnY2xpY2snLCAnLndwZm9ybXMtZWRpdC1wb3N0LWVkdWNhdGlvbi1ub3RpY2UtY2xvc2UnLCBhcHAuY2xvc2VOb3RpY2UgKTtcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogQmluZCBldmVudHMgZm9yIEd1dGVuYmVyZyBFZGl0b3IuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKi9cblx0XHRiaW5kR3V0ZW5iZXJnRXZlbnRzOiBmdW5jdGlvbigpIHtcblxuXHRcdFx0Y29uc3QgJGRvY3VtZW50ID0gJCggZG9jdW1lbnQgKTtcblxuXHRcdFx0JGRvY3VtZW50XG5cdFx0XHRcdC5vbiggJ0RPTVN1YnRyZWVNb2RpZmllZCcsICcuZWRpdC1wb3N0LWxheW91dCcsIGFwcC5kaXN0cmFjdGlvbkZyZWVNb2RlVG9nZ2xlICk7XG5cblx0XHRcdGlmICggYXBwLmlzTm90aWNlVmlzaWJsZSApIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHQkZG9jdW1lbnRcblx0XHRcdFx0Lm9uKCAnaW5wdXQnLCAnLmVkaXRvci1wb3N0LXRpdGxlX19pbnB1dCcsIGFwcC5tYXliZVNob3dHdXRlbmJlcmdOb3RpY2UgKVxuXHRcdFx0XHQub24oICdET01TdWJ0cmVlTW9kaWZpZWQnLCAnLmVkaXRvci1wb3N0LXRpdGxlX19pbnB1dCcsIGFwcC5tYXliZVNob3dHdXRlbmJlcmdOb3RpY2UgKTtcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogQmluZCBldmVudHMgZm9yIEd1dGVuYmVyZyBFZGl0b3IgaW4gRlNFIG1vZGUuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKi9cblx0XHRiaW5kRnNlRXZlbnRzOiBmdW5jdGlvbigpIHtcblxuXHRcdFx0Y29uc3QgJGlmcmFtZSA9ICQoICdpZnJhbWVbbmFtZT1cImVkaXRvci1jYW52YXNcIl0nICk7XG5cblx0XHRcdCQoIGRvY3VtZW50IClcblx0XHRcdFx0Lm9uKCAnRE9NU3VidHJlZU1vZGlmaWVkJywgJy5lZGl0LXBvc3QtbGF5b3V0JywgYXBwLmRpc3RyYWN0aW9uRnJlZU1vZGVUb2dnbGUgKTtcblxuXHRcdFx0JGlmcmFtZS5jb250ZW50cygpXG5cdFx0XHRcdC5vbiggJ0RPTVN1YnRyZWVNb2RpZmllZCcsICcuZWRpdG9yLXBvc3QtdGl0bGVfX2lucHV0JywgYXBwLm1heWJlU2hvd0d1dGVuYmVyZ05vdGljZSApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBEZXRlcm1pbmUgaWYgdGhlIGVkaXRvciBpcyBHdXRlbmJlcmcuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKlxuXHRcdCAqIEByZXR1cm5zIHtib29sZWFufSBUcnVlIGlmIHRoZSBlZGl0b3IgaXMgR3V0ZW5iZXJnLlxuXHRcdCAqL1xuXHRcdGlzR3V0ZW5iZXJnRWRpdG9yOiBmdW5jdGlvbigpIHtcblxuXHRcdFx0cmV0dXJuIHR5cGVvZiB3cCAhPT0gJ3VuZGVmaW5lZCcgJiYgdHlwZW9mIHdwLmJsb2NrcyAhPT0gJ3VuZGVmaW5lZCc7XG5cdFx0fSxcblxuXHRcdC8qKlxuXHRcdCAqIERldGVybWluZSBpZiB0aGUgZWRpdG9yIGlzIEd1dGVuYmVyZyBpbiBGU0UgbW9kZS5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHJldHVybnMge2Jvb2xlYW59IFRydWUgaWYgdGhlIEd1dGVuYmVyZyBlZGl0b3IgaW4gRlNFIG1vZGUuXG5cdFx0ICovXG5cdFx0aXNGc2U6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRyZXR1cm4gQm9vbGVhbiggJCggJ2lmcmFtZVtuYW1lPVwiZWRpdG9yLWNhbnZhc1wiXScgKS5sZW5ndGggKTtcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogQ3JlYXRlIGEgbm90aWNlIGZvciBHdXRlbmJlcmcuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKi9cblx0XHRzaG93R3V0ZW5iZXJnTm90aWNlOiBmdW5jdGlvbigpIHtcblxuXHRcdFx0d3AuZGF0YS5kaXNwYXRjaCggJ2NvcmUvbm90aWNlcycgKS5jcmVhdGVJbmZvTm90aWNlKFxuXHRcdFx0XHR3cGZvcm1zX2VkaXRfcG9zdF9lZHVjYXRpb24uZ3V0ZW5iZXJnX25vdGljZS50ZW1wbGF0ZSxcblx0XHRcdFx0YXBwLmdldEd1dGVuYmVyZ05vdGljZVNldHRpbmdzKClcblx0XHRcdCk7XG5cblx0XHRcdC8vIFRoZSBub3RpY2UgY29tcG9uZW50IGRvZXNuJ3QgaGF2ZSBhIHdheSB0byBhZGQgSFRNTCBpZCBvciBjbGFzcyB0byB0aGUgbm90aWNlLlxuXHRcdFx0Ly8gQWxzbywgdGhlIG5vdGljZSBiZWNhbWUgdmlzaWJsZSB3aXRoIGEgZGVsYXkgb24gb2xkIEd1dGVuYmVyZyB2ZXJzaW9ucy5cblx0XHRcdGNvbnN0IGhhc05vdGljZSA9IHNldEludGVydmFsKCBmdW5jdGlvbigpIHtcblxuXHRcdFx0XHRjb25zdCBub3RpY2VCb2R5ID0gJCggJy53cGZvcm1zLWVkaXQtcG9zdC1lZHVjYXRpb24tbm90aWNlLWJvZHknICk7XG5cdFx0XHRcdGlmICggISBub3RpY2VCb2R5Lmxlbmd0aCApIHtcblx0XHRcdFx0XHRyZXR1cm47XG5cdFx0XHRcdH1cblxuXHRcdFx0XHRjb25zdCAkbm90aWNlID0gbm90aWNlQm9keS5jbG9zZXN0KCAnLmNvbXBvbmVudHMtbm90aWNlJyApO1xuXHRcdFx0XHQkbm90aWNlLmFkZENsYXNzKCAnd3Bmb3Jtcy1lZGl0LXBvc3QtZWR1Y2F0aW9uLW5vdGljZScgKTtcblx0XHRcdFx0JG5vdGljZS5maW5kKCAnLmlzLXNlY29uZGFyeSwgLmlzLWxpbmsnICkucmVtb3ZlQ2xhc3MoICdpcy1zZWNvbmRhcnknICkucmVtb3ZlQ2xhc3MoICdpcy1saW5rJyApLmFkZENsYXNzKCAnaXMtcHJpbWFyeScgKTtcblxuXHRcdFx0XHRjbGVhckludGVydmFsKCBoYXNOb3RpY2UgKTtcblx0XHRcdH0sIDEwMCApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBHZXQgc2V0dGluZ3MgZm9yIHRoZSBHdXRlbmJlcmcgbm90aWNlLlxuXHRcdCAqXG5cdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0ICpcblx0XHQgKiBAcmV0dXJucyB7b2JqZWN0fSBOb3RpY2Ugc2V0dGluZ3MuXG5cdFx0ICovXG5cdFx0Z2V0R3V0ZW5iZXJnTm90aWNlU2V0dGluZ3M6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRjb25zdCBwbHVnaW5OYW1lID0gJ3dwZm9ybXMtZWRpdC1wb3N0LXByb2R1Y3QtZWR1Y2F0aW9uLWd1aWRlJztcblx0XHRcdGNvbnN0IG5vdGljZVNldHRpbmdzID0ge1xuXHRcdFx0XHRpZDogcGx1Z2luTmFtZSxcblx0XHRcdFx0aXNEaXNtaXNzaWJsZTogdHJ1ZSxcblx0XHRcdFx0SFRNTDogdHJ1ZSxcblx0XHRcdFx0X191bnN0YWJsZUhUTUw6IHRydWUsXG5cdFx0XHRcdGFjdGlvbnM6IFtcblx0XHRcdFx0XHR7XG5cdFx0XHRcdFx0XHRjbGFzc05hbWU6ICd3cGZvcm1zLWVkaXQtcG9zdC1lZHVjYXRpb24tbm90aWNlLWd1aWRlLWJ1dHRvbicsXG5cdFx0XHRcdFx0XHR2YXJpYW50OiAncHJpbWFyeScsXG5cdFx0XHRcdFx0XHRsYWJlbDogd3Bmb3Jtc19lZGl0X3Bvc3RfZWR1Y2F0aW9uLmd1dGVuYmVyZ19ub3RpY2UuYnV0dG9uLFxuXHRcdFx0XHRcdH0sXG5cdFx0XHRcdF0sXG5cdFx0XHR9O1xuXG5cdFx0XHRpZiAoICEgd3Bmb3Jtc19lZGl0X3Bvc3RfZWR1Y2F0aW9uLmd1dGVuYmVyZ19ndWlkZSApIHtcblxuXHRcdFx0XHRub3RpY2VTZXR0aW5ncy5hY3Rpb25zWzBdLnVybCA9IHdwZm9ybXNfZWRpdF9wb3N0X2VkdWNhdGlvbi5ndXRlbmJlcmdfbm90aWNlLnVybDtcblxuXHRcdFx0XHRyZXR1cm4gbm90aWNlU2V0dGluZ3M7XG5cdFx0XHR9XG5cblx0XHRcdGNvbnN0IEd1aWRlID0gd3AuY29tcG9uZW50cy5HdWlkZTtcblx0XHRcdGNvbnN0IHVzZVN0YXRlID0gd3AuZWxlbWVudC51c2VTdGF0ZTtcblx0XHRcdGNvbnN0IHJlZ2lzdGVyUGx1Z2luID0gd3AucGx1Z2lucy5yZWdpc3RlclBsdWdpbjtcblx0XHRcdGNvbnN0IHVucmVnaXN0ZXJQbHVnaW4gPSB3cC5wbHVnaW5zLnVucmVnaXN0ZXJQbHVnaW47XG5cdFx0XHRjb25zdCBHdXRlbmJlcmdUdXRvcmlhbCA9IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRcdGNvbnN0IFsgaXNPcGVuLCBzZXRJc09wZW4gXSA9IHVzZVN0YXRlKCB0cnVlICk7XG5cblx0XHRcdFx0aWYgKCAhIGlzT3BlbiApIHtcblx0XHRcdFx0XHRyZXR1cm4gbnVsbDtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdHJldHVybiAoXG5cdFx0XHRcdFx0Ly8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIHJlYWN0L3JlYWN0LWluLWpzeC1zY29wZVxuXHRcdFx0XHRcdDxHdWlkZVxuXHRcdFx0XHRcdFx0Y2xhc3NOYW1lPVwiZWRpdC1wb3N0LXdlbGNvbWUtZ3VpZGVcIlxuXHRcdFx0XHRcdFx0b25GaW5pc2g9eyAoKSA9PiB7XG5cdFx0XHRcdFx0XHRcdHVucmVnaXN0ZXJQbHVnaW4oIHBsdWdpbk5hbWUgKTtcblx0XHRcdFx0XHRcdFx0c2V0SXNPcGVuKCBmYWxzZSApO1xuXHRcdFx0XHRcdFx0fSB9XG5cdFx0XHRcdFx0XHRwYWdlcz17IGFwcC5nZXRHdWlkZVBhZ2VzKCkgfVxuXHRcdFx0XHRcdC8+XG5cdFx0XHRcdCk7XG5cdFx0XHR9O1xuXG5cdFx0XHRub3RpY2VTZXR0aW5ncy5vbkRpc21pc3MgPSBhcHAudXBkYXRlVXNlck1ldGE7XG5cdFx0XHRub3RpY2VTZXR0aW5ncy5hY3Rpb25zWzBdLm9uQ2xpY2sgPSAoKSA9PiByZWdpc3RlclBsdWdpbiggcGx1Z2luTmFtZSwgeyByZW5kZXI6IEd1dGVuYmVyZ1R1dG9yaWFsIH0gKTtcblxuXHRcdFx0cmV0dXJuIG5vdGljZVNldHRpbmdzO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBHZXQgR3VpZGUgcGFnZXMgaW4gcHJvcGVyIGZvcm1hdC5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHJldHVybnMge0FycmF5fSBHdWlkZSBQYWdlcy5cblx0XHQgKi9cblx0XHRnZXRHdWlkZVBhZ2VzOiBmdW5jdGlvbigpIHtcblxuXHRcdFx0Y29uc3QgcGFnZXMgPSBbXTtcblxuXHRcdFx0d3Bmb3Jtc19lZGl0X3Bvc3RfZWR1Y2F0aW9uLmd1dGVuYmVyZ19ndWlkZS5mb3JFYWNoKCBmdW5jdGlvbiggcGFnZSApIHtcblx0XHRcdFx0cGFnZXMucHVzaChcblx0XHRcdFx0XHR7XG5cdFx0XHRcdFx0XHQvKiBlc2xpbnQtZGlzYWJsZSByZWFjdC9yZWFjdC1pbi1qc3gtc2NvcGUgKi9cblx0XHRcdFx0XHRcdGNvbnRlbnQ6IChcblx0XHRcdFx0XHRcdFx0PD5cblx0XHRcdFx0XHRcdFx0XHQ8aDEgY2xhc3NOYW1lPVwiZWRpdC1wb3N0LXdlbGNvbWUtZ3VpZGVfX2hlYWRpbmdcIj57IHBhZ2UudGl0bGUgfTwvaDE+XG5cdFx0XHRcdFx0XHRcdFx0PHAgY2xhc3NOYW1lPVwiZWRpdC1wb3N0LXdlbGNvbWUtZ3VpZGVfX3RleHRcIj57IHBhZ2UuY29udGVudCB9PC9wPlxuXHRcdFx0XHRcdFx0XHQ8Lz5cblx0XHRcdFx0XHRcdCksXG5cdFx0XHRcdFx0XHRpbWFnZTogPGltZyBjbGFzc05hbWU9XCJlZGl0LXBvc3Qtd2VsY29tZS1ndWlkZV9faW1hZ2VcIiBzcmM9eyBwYWdlLmltYWdlIH0gYWx0PXsgcGFnZS50aXRsZSB9IC8+LFxuXHRcdFx0XHRcdFx0LyogZXNsaW50LWVuYWJsZSByZWFjdC9yZWFjdC1pbi1qc3gtc2NvcGUgKi9cblx0XHRcdFx0XHR9XG5cdFx0XHRcdCk7XG5cdFx0XHR9ICk7XG5cblx0XHRcdHJldHVybiBwYWdlcztcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogU2hvdyBub3RpY2UgaWYgdGhlIHBhZ2UgdGl0bGUgbWF0Y2hlcyBzb21lIGtleXdvcmRzIGZvciBDbGFzc2ljIEVkaXRvci5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqL1xuXHRcdG1heWJlU2hvd0NsYXNzaWNOb3RpY2U6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRpZiAoIGFwcC5pc05vdGljZVZpc2libGUgKSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblxuXHRcdFx0aWYgKCBhcHAuaXNUaXRsZU1hdGNoS2V5d29yZHMoICQoICcjdGl0bGUnICkudmFsKCkgKSApIHtcblx0XHRcdFx0YXBwLmlzTm90aWNlVmlzaWJsZSA9IHRydWU7XG5cblx0XHRcdFx0JCggJy53cGZvcm1zLWVkaXQtcG9zdC1lZHVjYXRpb24tbm90aWNlJyApLnJlbW92ZUNsYXNzKCAnd3Bmb3Jtcy1oaWRkZW4nICk7XG5cdFx0XHR9XG5cdFx0fSxcblxuXHRcdC8qKlxuXHRcdCAqIFNob3cgbm90aWNlIGlmIHRoZSBwYWdlIHRpdGxlIG1hdGNoZXMgc29tZSBrZXl3b3JkcyBmb3IgR3V0ZW5iZXJnIEVkaXRvci5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqL1xuXHRcdG1heWJlU2hvd0d1dGVuYmVyZ05vdGljZTogZnVuY3Rpb24oKSB7XG5cblx0XHRcdGlmICggYXBwLmlzTm90aWNlVmlzaWJsZSApIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHRjb25zdCAkcG9zdFRpdGxlID0gYXBwLmlzRnNlKCkgP1xuXHRcdFx0XHQkKCAnaWZyYW1lW25hbWU9XCJlZGl0b3ItY2FudmFzXCJdJyApLmNvbnRlbnRzKCkuZmluZCggJy5lZGl0b3ItcG9zdC10aXRsZV9faW5wdXQnICkgOlxuXHRcdFx0XHQkKCAnLmVkaXRvci1wb3N0LXRpdGxlX19pbnB1dCcgKTtcblx0XHRcdGNvbnN0IHRhZ05hbWUgPSAkcG9zdFRpdGxlLnByb3AoICd0YWdOYW1lJyApO1xuXHRcdFx0Y29uc3QgdGl0bGUgPSB0YWdOYW1lID09PSAnVEVYVEFSRUEnID8gJHBvc3RUaXRsZS52YWwoKSA6ICRwb3N0VGl0bGUudGV4dCgpO1xuXG5cdFx0XHRpZiAoIGFwcC5pc1RpdGxlTWF0Y2hLZXl3b3JkcyggdGl0bGUgKSApIHtcblx0XHRcdFx0YXBwLmlzTm90aWNlVmlzaWJsZSA9IHRydWU7XG5cblx0XHRcdFx0YXBwLnNob3dHdXRlbmJlcmdOb3RpY2UoKTtcblx0XHRcdH1cblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogQWRkIG5vdGljZSBjbGFzcyB3aGVuIHRoZSBkaXN0cmFjdGlvbiBtb2RlIGlzIGVuYWJsZWQuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjEuMlxuXHRcdCAqL1xuXHRcdGRpc3RyYWN0aW9uRnJlZU1vZGVUb2dnbGU6IGZ1bmN0aW9uKCkge1xuXG5cdFx0XHRpZiAoICEgYXBwLmlzTm90aWNlVmlzaWJsZSApIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHRjb25zdCAkZG9jdW1lbnQgPSAkKCBkb2N1bWVudCApO1xuXHRcdFx0Y29uc3QgaXNEaXN0cmFjdGlvbkZyZWVNb2RlID0gQm9vbGVhbiggJGRvY3VtZW50LmZpbmQoICcuaXMtZGlzdHJhY3Rpb24tZnJlZScgKS5sZW5ndGggKTtcblxuXHRcdFx0aWYgKCAhIGlzRGlzdHJhY3Rpb25GcmVlTW9kZSApIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHRjb25zdCBpc05vdGljZUhhc0NsYXNzID0gQm9vbGVhbiggJCggJy53cGZvcm1zLWVkaXQtcG9zdC1lZHVjYXRpb24tbm90aWNlJyApLmxlbmd0aCApO1xuXG5cdFx0XHRpZiAoIGlzTm90aWNlSGFzQ2xhc3MgKSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblxuXHRcdFx0Y29uc3QgJG5vdGljZUJvZHkgPSAkZG9jdW1lbnQuZmluZCggJy53cGZvcm1zLWVkaXQtcG9zdC1lZHVjYXRpb24tbm90aWNlLWJvZHknICk7XG5cdFx0XHRjb25zdCAkbm90aWNlID0gJG5vdGljZUJvZHkuY2xvc2VzdCggJy5jb21wb25lbnRzLW5vdGljZScgKTtcblxuXHRcdFx0JG5vdGljZS5hZGRDbGFzcyggJ3dwZm9ybXMtZWRpdC1wb3N0LWVkdWNhdGlvbi1ub3RpY2UnICk7XG5cdFx0fSxcblxuXHRcdC8qKlxuXHRcdCAqIERldGVybWluZSBpZiB0aGUgdGl0bGUgbWF0Y2hlcyBrZXl3b3Jkcy5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguMVxuXHRcdCAqXG5cdFx0ICogQHBhcmFtIHtzdHJpbmd9IHRpdGxlVmFsdWUgUGFnZSB0aXRsZSB2YWx1ZS5cblx0XHQgKlxuXHRcdCAqIEByZXR1cm5zIHtib29sZWFufSBUcnVlIGlmIHRoZSB0aXRsZSBtYXRjaGVzIHNvbWUga2V5d29yZHMuXG5cdFx0ICovXG5cdFx0aXNUaXRsZU1hdGNoS2V5d29yZHM6IGZ1bmN0aW9uKCB0aXRsZVZhbHVlICkge1xuXG5cdFx0XHRjb25zdCBleHBlY3RlZFRpdGxlUmVnZXggPSBuZXcgUmVnRXhwKCAvXFxiKGNvbnRhY3R8Zm9ybSlcXGIvaSApO1xuXG5cdFx0XHRyZXR1cm4gZXhwZWN0ZWRUaXRsZVJlZ2V4LnRlc3QoIHRpdGxlVmFsdWUgKTtcblx0XHR9LFxuXG5cdFx0LyoqXG5cdFx0ICogQ2xvc2UgYSBub3RpY2UuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjFcblx0XHQgKi9cblx0XHRjbG9zZU5vdGljZTogZnVuY3Rpb24oKSB7XG5cblx0XHRcdCQoIHRoaXMgKS5jbG9zZXN0KCAnLndwZm9ybXMtZWRpdC1wb3N0LWVkdWNhdGlvbi1ub3RpY2UnICkucmVtb3ZlKCk7XG5cblx0XHRcdGFwcC51cGRhdGVVc2VyTWV0YSgpO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBVcGRhdGUgdXNlciBtZXRhIGFuZCBkb24ndCBzaG93IHRoZSBub3RpY2UgbmV4dCB0aW1lLlxuXHRcdCAqXG5cdFx0ICogQHNpbmNlIDEuOC4xXG5cdFx0ICovXG5cdFx0dXBkYXRlVXNlck1ldGEoKSB7XG5cblx0XHRcdCQucG9zdChcblx0XHRcdFx0d3Bmb3Jtc19lZGl0X3Bvc3RfZWR1Y2F0aW9uLmFqYXhfdXJsLFxuXHRcdFx0XHR7XG5cdFx0XHRcdFx0YWN0aW9uOiAnd3Bmb3Jtc19lZHVjYXRpb25fZGlzbWlzcycsXG5cdFx0XHRcdFx0bm9uY2U6IHdwZm9ybXNfZWRpdF9wb3N0X2VkdWNhdGlvbi5lZHVjYXRpb25fbm9uY2UsXG5cdFx0XHRcdFx0c2VjdGlvbjogJ2VkaXQtcG9zdC1ub3RpY2UnLFxuXHRcdFx0XHR9XG5cdFx0XHQpO1xuXHRcdH0sXG5cdH07XG5cblx0cmV0dXJuIGFwcDtcblxufSggZG9jdW1lbnQsIHdpbmRvdywgalF1ZXJ5ICkgKTtcblxuV1BGb3Jtc0VkaXRQb3N0RWR1Y2F0aW9uLmluaXQoKTtcbiJdLCJtYXBwaW5ncyI6IkFBQUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxZQUFZOztBQUFDO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUViLElBQU1BLHdCQUF3QixHQUFHQyxNQUFNLENBQUNELHdCQUF3QixJQUFNLFVBQVVFLFFBQVEsRUFBRUQsTUFBTSxFQUFFRSxDQUFDLEVBQUc7RUFFckc7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7RUFDQyxJQUFNQyxHQUFHLEdBQUc7SUFFWDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0lBQ0VDLGVBQWUsRUFBRSxLQUFLO0lBRXRCO0FBQ0Y7QUFDQTtBQUNBO0FBQ0E7SUFDRUMsSUFBSSxFQUFFLGdCQUFXO01BRWhCSCxDQUFDLENBQUVGLE1BQU0sQ0FBRSxDQUFDTSxFQUFFLENBQUUsTUFBTSxFQUFFLFlBQVc7UUFFbEM7UUFDQSxJQUFLLE9BQU9KLENBQUMsQ0FBQ0ssS0FBSyxDQUFDQyxJQUFJLEtBQUssVUFBVSxFQUFHO1VBQ3pDTixDQUFDLENBQUNLLEtBQUssQ0FBQ0MsSUFBSSxDQUFFTCxHQUFHLENBQUNNLElBQUksQ0FBRTtRQUN6QixDQUFDLE1BQU07VUFDTk4sR0FBRyxDQUFDTSxJQUFJLEVBQUU7UUFDWDtNQUNELENBQUMsQ0FBRTtJQUNKLENBQUM7SUFFRDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0lBQ0VBLElBQUksRUFBRSxnQkFBVztNQUVoQixJQUFLLENBQUVOLEdBQUcsQ0FBQ08saUJBQWlCLEVBQUUsRUFBRztRQUNoQ1AsR0FBRyxDQUFDUSxzQkFBc0IsRUFBRTtRQUM1QlIsR0FBRyxDQUFDUyxpQkFBaUIsRUFBRTtRQUV2QjtNQUNEO01BRUEsSUFBTUMsbUJBQW1CLEdBQUdDLFdBQVcsQ0FBRSxZQUFXO1FBRW5ELElBQUssQ0FBRWIsUUFBUSxDQUFDYyxhQUFhLENBQUUseURBQXlELENBQUUsRUFBRztVQUM1RjtRQUNEO1FBRUFDLGFBQWEsQ0FBRUgsbUJBQW1CLENBQUU7UUFFcEMsSUFBSyxDQUFFVixHQUFHLENBQUNjLEtBQUssRUFBRSxFQUFHO1VBRXBCZCxHQUFHLENBQUNlLHdCQUF3QixFQUFFO1VBQzlCZixHQUFHLENBQUNnQixtQkFBbUIsRUFBRTtVQUV6QjtRQUNEO1FBRUEsSUFBTUMsTUFBTSxHQUFHbkIsUUFBUSxDQUFDYyxhQUFhLENBQUUsOEJBQThCLENBQUU7UUFDdkUsSUFBTU0sUUFBUSxHQUFHLElBQUlDLGdCQUFnQixDQUFFLFlBQVc7VUFFakQsSUFBTUMsY0FBYyxHQUFHSCxNQUFNLENBQUNJLGVBQWUsSUFBSUosTUFBTSxDQUFDSyxhQUFhLENBQUN4QixRQUFRLElBQUksQ0FBQyxDQUFDO1VBRXBGLElBQUtzQixjQUFjLENBQUNHLFVBQVUsS0FBSyxVQUFVLElBQUlILGNBQWMsQ0FBQ1IsYUFBYSxDQUFFLDJCQUEyQixDQUFFLEVBQUc7WUFDOUdaLEdBQUcsQ0FBQ2Usd0JBQXdCLEVBQUU7WUFDOUJmLEdBQUcsQ0FBQ3dCLGFBQWEsRUFBRTtZQUVuQk4sUUFBUSxDQUFDTyxVQUFVLEVBQUU7VUFDdEI7UUFDRCxDQUFDLENBQUU7UUFDSFAsUUFBUSxDQUFDUSxPQUFPLENBQUU1QixRQUFRLENBQUM2QixJQUFJLEVBQUU7VUFBRUMsT0FBTyxFQUFFLElBQUk7VUFBRUMsU0FBUyxFQUFFO1FBQUssQ0FBQyxDQUFFO01BQ3RFLENBQUMsRUFBRSxHQUFHLENBQUU7SUFDVCxDQUFDO0lBRUQ7QUFDRjtBQUNBO0FBQ0E7QUFDQTtJQUNFcEIsaUJBQWlCLEVBQUUsNkJBQVc7TUFFN0IsSUFBTXFCLFNBQVMsR0FBRy9CLENBQUMsQ0FBRUQsUUFBUSxDQUFFO01BRS9CLElBQUssQ0FBRUUsR0FBRyxDQUFDQyxlQUFlLEVBQUc7UUFDNUI2QixTQUFTLENBQUMzQixFQUFFLENBQUUsT0FBTyxFQUFFLFFBQVEsRUFBRUgsR0FBRyxDQUFDUSxzQkFBc0IsQ0FBRTtNQUM5RDtNQUVBc0IsU0FBUyxDQUFDM0IsRUFBRSxDQUFFLE9BQU8sRUFBRSwyQ0FBMkMsRUFBRUgsR0FBRyxDQUFDK0IsV0FBVyxDQUFFO0lBQ3RGLENBQUM7SUFFRDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0lBQ0VmLG1CQUFtQixFQUFFLCtCQUFXO01BRS9CLElBQU1jLFNBQVMsR0FBRy9CLENBQUMsQ0FBRUQsUUFBUSxDQUFFO01BRS9CZ0MsU0FBUyxDQUNQM0IsRUFBRSxDQUFFLG9CQUFvQixFQUFFLG1CQUFtQixFQUFFSCxHQUFHLENBQUNnQyx5QkFBeUIsQ0FBRTtNQUVoRixJQUFLaEMsR0FBRyxDQUFDQyxlQUFlLEVBQUc7UUFDMUI7TUFDRDtNQUVBNkIsU0FBUyxDQUNQM0IsRUFBRSxDQUFFLE9BQU8sRUFBRSwyQkFBMkIsRUFBRUgsR0FBRyxDQUFDZSx3QkFBd0IsQ0FBRSxDQUN4RVosRUFBRSxDQUFFLG9CQUFvQixFQUFFLDJCQUEyQixFQUFFSCxHQUFHLENBQUNlLHdCQUF3QixDQUFFO0lBQ3hGLENBQUM7SUFFRDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0lBQ0VTLGFBQWEsRUFBRSx5QkFBVztNQUV6QixJQUFNUyxPQUFPLEdBQUdsQyxDQUFDLENBQUUsOEJBQThCLENBQUU7TUFFbkRBLENBQUMsQ0FBRUQsUUFBUSxDQUFFLENBQ1hLLEVBQUUsQ0FBRSxvQkFBb0IsRUFBRSxtQkFBbUIsRUFBRUgsR0FBRyxDQUFDZ0MseUJBQXlCLENBQUU7TUFFaEZDLE9BQU8sQ0FBQ0MsUUFBUSxFQUFFLENBQ2hCL0IsRUFBRSxDQUFFLG9CQUFvQixFQUFFLDJCQUEyQixFQUFFSCxHQUFHLENBQUNlLHdCQUF3QixDQUFFO0lBQ3hGLENBQUM7SUFFRDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtJQUNFUixpQkFBaUIsRUFBRSw2QkFBVztNQUU3QixPQUFPLE9BQU80QixFQUFFLEtBQUssV0FBVyxJQUFJLE9BQU9BLEVBQUUsQ0FBQ0MsTUFBTSxLQUFLLFdBQVc7SUFDckUsQ0FBQztJQUVEO0FBQ0Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0lBQ0V0QixLQUFLLEVBQUUsaUJBQVc7TUFFakIsT0FBT3VCLE9BQU8sQ0FBRXRDLENBQUMsQ0FBRSw4QkFBOEIsQ0FBRSxDQUFDdUMsTUFBTSxDQUFFO0lBQzdELENBQUM7SUFFRDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0lBQ0VDLG1CQUFtQixFQUFFLCtCQUFXO01BRS9CSixFQUFFLENBQUNLLElBQUksQ0FBQ0MsUUFBUSxDQUFFLGNBQWMsQ0FBRSxDQUFDQyxnQkFBZ0IsQ0FDbERDLDJCQUEyQixDQUFDQyxnQkFBZ0IsQ0FBQ0MsUUFBUSxFQUNyRDdDLEdBQUcsQ0FBQzhDLDBCQUEwQixFQUFFLENBQ2hDOztNQUVEO01BQ0E7TUFDQSxJQUFNQyxTQUFTLEdBQUdwQyxXQUFXLENBQUUsWUFBVztRQUV6QyxJQUFNcUMsVUFBVSxHQUFHakQsQ0FBQyxDQUFFLDBDQUEwQyxDQUFFO1FBQ2xFLElBQUssQ0FBRWlELFVBQVUsQ0FBQ1YsTUFBTSxFQUFHO1VBQzFCO1FBQ0Q7UUFFQSxJQUFNVyxPQUFPLEdBQUdELFVBQVUsQ0FBQ0UsT0FBTyxDQUFFLG9CQUFvQixDQUFFO1FBQzFERCxPQUFPLENBQUNFLFFBQVEsQ0FBRSxvQ0FBb0MsQ0FBRTtRQUN4REYsT0FBTyxDQUFDRyxJQUFJLENBQUUseUJBQXlCLENBQUUsQ0FBQ0MsV0FBVyxDQUFFLGNBQWMsQ0FBRSxDQUFDQSxXQUFXLENBQUUsU0FBUyxDQUFFLENBQUNGLFFBQVEsQ0FBRSxZQUFZLENBQUU7UUFFekh0QyxhQUFhLENBQUVrQyxTQUFTLENBQUU7TUFDM0IsQ0FBQyxFQUFFLEdBQUcsQ0FBRTtJQUNULENBQUM7SUFFRDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtJQUNFRCwwQkFBMEIsRUFBRSxzQ0FBVztNQUV0QyxJQUFNUSxVQUFVLEdBQUcsMkNBQTJDO01BQzlELElBQU1DLGNBQWMsR0FBRztRQUN0QkMsRUFBRSxFQUFFRixVQUFVO1FBQ2RHLGFBQWEsRUFBRSxJQUFJO1FBQ25CQyxJQUFJLEVBQUUsSUFBSTtRQUNWQyxjQUFjLEVBQUUsSUFBSTtRQUNwQkMsT0FBTyxFQUFFLENBQ1I7VUFDQ0MsU0FBUyxFQUFFLGlEQUFpRDtVQUM1REMsT0FBTyxFQUFFLFNBQVM7VUFDbEJDLEtBQUssRUFBRXBCLDJCQUEyQixDQUFDQyxnQkFBZ0IsQ0FBQ29CO1FBQ3JELENBQUM7TUFFSCxDQUFDO01BRUQsSUFBSyxDQUFFckIsMkJBQTJCLENBQUNzQixlQUFlLEVBQUc7UUFFcERWLGNBQWMsQ0FBQ0ssT0FBTyxDQUFDLENBQUMsQ0FBQyxDQUFDTSxHQUFHLEdBQUd2QiwyQkFBMkIsQ0FBQ0MsZ0JBQWdCLENBQUNzQixHQUFHO1FBRWhGLE9BQU9YLGNBQWM7TUFDdEI7TUFFQSxJQUFNWSxLQUFLLEdBQUdoQyxFQUFFLENBQUNpQyxVQUFVLENBQUNELEtBQUs7TUFDakMsSUFBTUUsUUFBUSxHQUFHbEMsRUFBRSxDQUFDbUMsT0FBTyxDQUFDRCxRQUFRO01BQ3BDLElBQU1FLGNBQWMsR0FBR3BDLEVBQUUsQ0FBQ3FDLE9BQU8sQ0FBQ0QsY0FBYztNQUNoRCxJQUFNRSxnQkFBZ0IsR0FBR3RDLEVBQUUsQ0FBQ3FDLE9BQU8sQ0FBQ0MsZ0JBQWdCO01BQ3BELElBQU1DLGlCQUFpQixHQUFHLFNBQXBCQSxpQkFBaUIsR0FBYztRQUVwQyxnQkFBOEJMLFFBQVEsQ0FBRSxJQUFJLENBQUU7VUFBQTtVQUF0Q00sTUFBTTtVQUFFQyxTQUFTO1FBRXpCLElBQUssQ0FBRUQsTUFBTSxFQUFHO1VBQ2YsT0FBTyxJQUFJO1FBQ1o7UUFFQTtVQUFBO1VBQ0M7VUFDQSxvQkFBQyxLQUFLO1lBQ0wsU0FBUyxFQUFDLHlCQUF5QjtZQUNuQyxRQUFRLEVBQUcsb0JBQU07Y0FDaEJGLGdCQUFnQixDQUFFbkIsVUFBVSxDQUFFO2NBQzlCc0IsU0FBUyxDQUFFLEtBQUssQ0FBRTtZQUNuQixDQUFHO1lBQ0gsS0FBSyxFQUFHNUUsR0FBRyxDQUFDNkUsYUFBYTtVQUFJO1FBQzVCO01BRUosQ0FBQztNQUVEdEIsY0FBYyxDQUFDdUIsU0FBUyxHQUFHOUUsR0FBRyxDQUFDK0UsY0FBYztNQUM3Q3hCLGNBQWMsQ0FBQ0ssT0FBTyxDQUFDLENBQUMsQ0FBQyxDQUFDb0IsT0FBTyxHQUFHO1FBQUEsT0FBTVQsY0FBYyxDQUFFakIsVUFBVSxFQUFFO1VBQUUyQixNQUFNLEVBQUVQO1FBQWtCLENBQUMsQ0FBRTtNQUFBO01BRXJHLE9BQU9uQixjQUFjO0lBQ3RCLENBQUM7SUFFRDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtJQUNFc0IsYUFBYSxFQUFFLHlCQUFXO01BRXpCLElBQU1LLEtBQUssR0FBRyxFQUFFO01BRWhCdkMsMkJBQTJCLENBQUNzQixlQUFlLENBQUNrQixPQUFPLENBQUUsVUFBVUMsSUFBSSxFQUFHO1FBQ3JFRixLQUFLLENBQUNHLElBQUksQ0FDVDtVQUNDO1VBQ0FDLE9BQU8sZUFDTix1REFDQztZQUFJLFNBQVMsRUFBQztVQUFrQyxHQUFHRixJQUFJLENBQUNHLEtBQUssQ0FBTyxlQUNwRTtZQUFHLFNBQVMsRUFBQztVQUErQixHQUFHSCxJQUFJLENBQUNFLE9BQU8sQ0FBTSxDQUVsRTtVQUNERSxLQUFLLGVBQUU7WUFBSyxTQUFTLEVBQUMsZ0NBQWdDO1lBQUMsR0FBRyxFQUFHSixJQUFJLENBQUNJLEtBQU87WUFBQyxHQUFHLEVBQUdKLElBQUksQ0FBQ0c7VUFBTztVQUM1RjtRQUNELENBQUMsQ0FDRDtNQUNGLENBQUMsQ0FBRTs7TUFFSCxPQUFPTCxLQUFLO0lBQ2IsQ0FBQztJQUVEO0FBQ0Y7QUFDQTtBQUNBO0FBQ0E7SUFDRTFFLHNCQUFzQixFQUFFLGtDQUFXO01BRWxDLElBQUtSLEdBQUcsQ0FBQ0MsZUFBZSxFQUFHO1FBQzFCO01BQ0Q7TUFFQSxJQUFLRCxHQUFHLENBQUN5RixvQkFBb0IsQ0FBRTFGLENBQUMsQ0FBRSxRQUFRLENBQUUsQ0FBQzJGLEdBQUcsRUFBRSxDQUFFLEVBQUc7UUFDdEQxRixHQUFHLENBQUNDLGVBQWUsR0FBRyxJQUFJO1FBRTFCRixDQUFDLENBQUUscUNBQXFDLENBQUUsQ0FBQ3NELFdBQVcsQ0FBRSxnQkFBZ0IsQ0FBRTtNQUMzRTtJQUNELENBQUM7SUFFRDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0lBQ0V0Qyx3QkFBd0IsRUFBRSxvQ0FBVztNQUVwQyxJQUFLZixHQUFHLENBQUNDLGVBQWUsRUFBRztRQUMxQjtNQUNEO01BRUEsSUFBTTBGLFVBQVUsR0FBRzNGLEdBQUcsQ0FBQ2MsS0FBSyxFQUFFLEdBQzdCZixDQUFDLENBQUUsOEJBQThCLENBQUUsQ0FBQ21DLFFBQVEsRUFBRSxDQUFDa0IsSUFBSSxDQUFFLDJCQUEyQixDQUFFLEdBQ2xGckQsQ0FBQyxDQUFFLDJCQUEyQixDQUFFO01BQ2pDLElBQU02RixPQUFPLEdBQUdELFVBQVUsQ0FBQ0UsSUFBSSxDQUFFLFNBQVMsQ0FBRTtNQUM1QyxJQUFNTixLQUFLLEdBQUdLLE9BQU8sS0FBSyxVQUFVLEdBQUdELFVBQVUsQ0FBQ0QsR0FBRyxFQUFFLEdBQUdDLFVBQVUsQ0FBQ0csSUFBSSxFQUFFO01BRTNFLElBQUs5RixHQUFHLENBQUN5RixvQkFBb0IsQ0FBRUYsS0FBSyxDQUFFLEVBQUc7UUFDeEN2RixHQUFHLENBQUNDLGVBQWUsR0FBRyxJQUFJO1FBRTFCRCxHQUFHLENBQUN1QyxtQkFBbUIsRUFBRTtNQUMxQjtJQUNELENBQUM7SUFFRDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0lBQ0VQLHlCQUF5QixFQUFFLHFDQUFXO01BRXJDLElBQUssQ0FBRWhDLEdBQUcsQ0FBQ0MsZUFBZSxFQUFHO1FBQzVCO01BQ0Q7TUFFQSxJQUFNNkIsU0FBUyxHQUFHL0IsQ0FBQyxDQUFFRCxRQUFRLENBQUU7TUFDL0IsSUFBTWlHLHFCQUFxQixHQUFHMUQsT0FBTyxDQUFFUCxTQUFTLENBQUNzQixJQUFJLENBQUUsc0JBQXNCLENBQUUsQ0FBQ2QsTUFBTSxDQUFFO01BRXhGLElBQUssQ0FBRXlELHFCQUFxQixFQUFHO1FBQzlCO01BQ0Q7TUFFQSxJQUFNQyxnQkFBZ0IsR0FBRzNELE9BQU8sQ0FBRXRDLENBQUMsQ0FBRSxxQ0FBcUMsQ0FBRSxDQUFDdUMsTUFBTSxDQUFFO01BRXJGLElBQUswRCxnQkFBZ0IsRUFBRztRQUN2QjtNQUNEO01BRUEsSUFBTUMsV0FBVyxHQUFHbkUsU0FBUyxDQUFDc0IsSUFBSSxDQUFFLDBDQUEwQyxDQUFFO01BQ2hGLElBQU1ILE9BQU8sR0FBR2dELFdBQVcsQ0FBQy9DLE9BQU8sQ0FBRSxvQkFBb0IsQ0FBRTtNQUUzREQsT0FBTyxDQUFDRSxRQUFRLENBQUUsb0NBQW9DLENBQUU7SUFDekQsQ0FBQztJQUVEO0FBQ0Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtJQUNFc0Msb0JBQW9CLEVBQUUsOEJBQVVTLFVBQVUsRUFBRztNQUU1QyxJQUFNQyxrQkFBa0IsR0FBRyxJQUFJQyxNQUFNLENBQUUscUJBQXFCLENBQUU7TUFFOUQsT0FBT0Qsa0JBQWtCLENBQUNFLElBQUksQ0FBRUgsVUFBVSxDQUFFO0lBQzdDLENBQUM7SUFFRDtBQUNGO0FBQ0E7QUFDQTtBQUNBO0lBQ0VuRSxXQUFXLEVBQUUsdUJBQVc7TUFFdkJoQyxDQUFDLENBQUUsSUFBSSxDQUFFLENBQUNtRCxPQUFPLENBQUUscUNBQXFDLENBQUUsQ0FBQ29ELE1BQU0sRUFBRTtNQUVuRXRHLEdBQUcsQ0FBQytFLGNBQWMsRUFBRTtJQUNyQixDQUFDO0lBRUQ7QUFDRjtBQUNBO0FBQ0E7QUFDQTtJQUNFQSxjQUFjLDRCQUFHO01BRWhCaEYsQ0FBQyxDQUFDd0csSUFBSSxDQUNMNUQsMkJBQTJCLENBQUM2RCxRQUFRLEVBQ3BDO1FBQ0NDLE1BQU0sRUFBRSwyQkFBMkI7UUFDbkNDLEtBQUssRUFBRS9ELDJCQUEyQixDQUFDZ0UsZUFBZTtRQUNsREMsT0FBTyxFQUFFO01BQ1YsQ0FBQyxDQUNEO0lBQ0Y7RUFDRCxDQUFDO0VBRUQsT0FBTzVHLEdBQUc7QUFFWCxDQUFDLENBQUVGLFFBQVEsRUFBRUQsTUFBTSxFQUFFZ0gsTUFBTSxDQUFJO0FBRS9Cakgsd0JBQXdCLENBQUNNLElBQUksRUFBRSJ9
},{}]},{},[1])