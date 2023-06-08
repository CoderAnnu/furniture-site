! function (e) {
    if ("object" == typeof exports && "object" == typeof module) module.exports = e();
    else {
        if ("function" == typeof define && define.amd) return define([], e);
        (this || window).CodeMirror = e()
    }
}(function () {
    "use strict";


    function e(r, n) {
        if (!(this instanceof e)) return new e(r, n);
        this.options = n = n ? Ii(n) : {}, Ii(ea, n, !1), h(n);
        var i = n.value;
        "string" == typeof i && (i = new Sa(i, n.mode, null, n.lineSeparator)), this.doc = i;
        var o = new e.inputStyles[n.inputStyle](this),
            a = this.display = new t(r, i, o);
        a.wrapper.CodeMirror = this, c(this), l(this), n.lineWrapping && (this.display.wrapper.className += " CodeMirror-wrap"), n.autofocus && !Oo && a.input.focus(), v(this), this.state = {
            keyMaps: [],
            overlays: [],
            modeGen: 0,
            overwrite: !1,
            delayingBlurEvent: !1,
            focused: !1,
            suppressEdits: !1,
            pasteIncoming: !1,
            cutIncoming: !1,
            selectingText: !1,
            draggingText: !1,
            highlight: new Ni,
            keySeq: null,
            specialChars: null
        };
        var s = this;
        bo && 11 > wo && setTimeout(function () {
            s.display.input.reset(!0)
        }, 20), Kt(this), Xi(), wt(this), this.curOp.forceUpdate = !0, Yn(this, i), n.autofocus && !Oo || s.hasFocus() ? setTimeout(Fi(mr, this), 20) : vr(this);
        for (var u in ta) ta.hasOwnProperty(u) && ta[u](this, n[u], ra);
        k(this), n.finishInit && n.finishInit(this);
        for (var d = 0; d < aa.length; ++d) aa[d](this);
        kt(this), xo && n.lineWrapping && "optimizelegibility" == getComputedStyle(a.lineDiv).textRendering && (a.lineDiv.style.textRendering = "auto")
    }

    function t(e, t, r) {
        var n = this;
        this.input = r, n.scrollbarFiller = Ki("div", null, "CodeMirror-scrollbar-filler"), n.scrollbarFiller.setAttribute("cm-not-content", "true"), n.gutterFiller = Ki("div", null, "CodeMirror-gutter-filler"), n.gutterFiller.setAttribute("cm-not-content", "true"), n.lineDiv = Ki("div", null, "CodeMirror-code"), n.selectionDiv = Ki("div", null, null, "position: relative; z-index: 1"), n.cursorDiv = Ki("div", null, "CodeMirror-cursors"), n.measure = Ki("div", null, "CodeMirror-measure"), n.lineMeasure = Ki("div", null, "CodeMirror-measure"), n.lineSpace = Ki("div", [n.measure, n.lineMeasure, n.selectionDiv, n.cursorDiv, n.lineDiv], null, "position: relative; outline: none"), n.mover = Ki("div", [Ki("div", [n.lineSpace], "CodeMirror-lines")], null, "position: relative"), n.sizer = Ki("div", [n.mover], "CodeMirror-sizer"), n.sizerWidth = null, n.heightForcer = Ki("div", null, null, "position: absolute; height: " + Pa + "px; width: 1px;"), n.gutters = Ki("div", null, "CodeMirror-gutters"), n.lineGutter = null, n.scroller = Ki("div", [n.sizer, n.heightForcer, n.gutters], "CodeMirror-scroll"), n.scroller.setAttribute("tabIndex", "-1"), n.wrapper = Ki("div", [n.scrollbarFiller, n.gutterFiller, n.scroller], "CodeMirror"), bo && 8 > wo && (n.gutters.style.zIndex = -1, n.scroller.style.paddingRight = 0), xo || mo && Oo || (n.scroller.draggable = !0), e && (e.appendChild ? e.appendChild(n.wrapper) : e(n.wrapper)), n.viewFrom = n.viewTo = t.first, n.reportedViewFrom = n.reportedViewTo = t.first, n.view = [], n.renderedView = null, n.externalMeasured = null, n.viewOffset = 0, n.lastWrapHeight = n.lastWrapWidth = 0, n.updateLineNumbers = null, n.nativeBarWidth = n.barHeight = n.barWidth = 0, n.scrollbarsClipped = !1, n.lineNumWidth = n.lineNumInnerWidth = n.lineNumChars = null, n.alignWidgets = !1, n.cachedCharWidth = n.cachedTextHeight = n.cachedPaddingH = null, n.maxLine = null, n.maxLineLength = 0, n.maxLineChanged = !1, n.wheelDX = n.wheelDY = n.wheelStartX = n.wheelStartY = null, n.shift = !1, n.selForContextMenu = null, n.activeTouch = null, r.init(n)
    }

    function r(t) {
        t.doc.mode = e.getMode(t.options, t.doc.modeOption), n(t)
    }

    function n(e) {
        e.doc.iter(function (e) {
            e.stateAfter && (e.stateAfter = null), e.styles && (e.styles = null)
        }), e.doc.frontier = e.doc.first, Be(e, 100), e.state.modeGen++, e.curOp && Pt(e)
    }

    function i(e) {
        e.options.lineWrapping ? (Qa(e.display.wrapper, "CodeMirror-wrap"), e.display.sizer.style.minWidth = "", e.display.sizerWidth = null) : (Za(e.display.wrapper, "CodeMirror-wrap"), f(e)), a(e), Pt(e), lt(e), setTimeout(function () {
            y(e)
        }, 100)
    }

    function o(e) {
        var t = yt(e.display),
            r = e.options.lineWrapping,
            n = r && Math.max(5, e.display.scroller.clientWidth / bt(e.display) - 3);
        return function (i) {
            if (kn(e.doc, i)) return 0;
            var o = 0;
            if (i.widgets)
                for (var a = 0; a < i.widgets.length; a++) i.widgets[a].height && (o += i.widgets[a].height);
            return r ? o + (Math.ceil(i.text.length / n) || 1) * t : o + t
        }
    }

    function a(e) {
        var t = e.doc,
            r = o(e);
        t.iter(function (e) {
            var t = r(e);
            t != e.height && ei(e, t)
        })
    }

    function l(e) {
        e.display.wrapper.className = e.display.wrapper.className.replace(/\s*cm-s-\S+/g, "") + e.options.theme.replace(/(^|\s)\s*/g, " cm-s-"), lt(e)
    }

    function s(e) {
        c(e), Pt(e), setTimeout(function () {
            x(e)
        }, 20)
    }

    function c(e) {
        var t = e.display.gutters,
            r = e.options.gutters;
        Vi(t);
        for (var n = 0; n < r.length; ++n) {
            var i = r[n],
                o = t.appendChild(Ki("div", null, "CodeMirror-gutter " + i));
            "CodeMirror-linenumbers" == i && (e.display.lineGutter = o, o.style.width = (e.display.lineNumWidth || 1) + "px")
        }
        t.style.display = n ? "" : "none", u(e)
    }

    function u(e) {
        var t = e.display.gutters.offsetWidth;
        e.display.sizer.style.marginLeft = t + "px"
    }

    function d(e) {
        if (0 == e.height) return 0;
        for (var t, r = e.text.length, n = e; t = gn(n);) {
            var i = t.find(0, !0);
            n = i.from.line, r += i.from.ch - i.to.ch
        }
        for (n = e; t = mn(n);) {
            var i = t.find(0, !0);
            r -= n.text.length - i.from.ch, n = i.to.line, r += n.text.length - i.to.ch
        }
        return r
    }

    function f(e) {
        var t = e.display,
            r = e.doc;
        t.maxLine = Zn(r, r.first), t.maxLineLength = d(t.maxLine), t.maxLineChanged = !0, r.iter(function (e) {
            var r = d(e);
            r > t.maxLineLength && (t.maxLineLength = r, t.maxLine = e)
        })
    }

    function h(e) {
        var t = zi(e.gutters, "CodeMirror-linenumbers"); - 1 == t && e.lineNumbers ? e.gutters = e.gutters.concat(["CodeMirror-linenumbers"]) : t > -1 && !e.lineNumbers && (e.gutters = e.gutters.slice(0), e.gutters.splice(t, 1))
    }

    function p(e) {
        var t = e.display,
            r = t.gutters.offsetWidth,
            n = Math.round(e.doc.height + Ue(e.display));
        return {
            clientHeight: t.scroller.clientHeight,
            viewHeight: t.wrapper.clientHeight,
            scrollWidth: t.scroller.scrollWidth,
            clientWidth: t.scroller.clientWidth,
            viewWidth: t.wrapper.clientWidth,
            barLeft: e.options.fixedGutter ? r : 0,
            docHeight: n,
            scrollHeight: n + qe(e) + t.barHeight,
            nativeBarWidth: t.nativeBarWidth,
            gutterWidth: r
        }
    }

    function g(e, t, r) {
        this.cm = r;
        var n = this.vert = Ki("div", [Ki("div", null, null, "min-width: 1px")], "CodeMirror-vscrollbar"),
            i = this.horiz = Ki("div", [Ki("div", null, null, "height: 100%; min-height: 1px")], "CodeMirror-hscrollbar");
        e(n), e(i), Na(n, "scroll", function () {
            n.clientHeight && t(n.scrollTop, "vertical")
        }), Na(i, "scroll", function () {
            i.clientWidth && t(i.scrollLeft, "horizontal")
        }), this.checkedZeroWidth = !1, bo && 8 > wo && (this.horiz.style.minHeight = this.vert.style.minWidth = "18px")
    }

    function m() {}

    function v(t) {
        t.display.scrollbars && (t.display.scrollbars.clear(), t.display.scrollbars.addClass && Za(t.display.wrapper, t.display.scrollbars.addClass)), t.display.scrollbars = new e.scrollbarModel[t.options.scrollbarStyle](function (e) {
            t.display.wrapper.insertBefore(e, t.display.scrollbarFiller), Na(e, "mousedown", function () {
                t.state.focused && setTimeout(function () {
                    t.display.input.focus()
                }, 0)
            }), e.setAttribute("cm-not-content", "true")
        }, function (e, r) {
            "horizontal" == r ? ir(t, e) : nr(t, e)
        }, t), t.display.scrollbars.addClass && Qa(t.display.wrapper, t.display.scrollbars.addClass)
    }

    function y(e, t) {
        t || (t = p(e));
        var r = e.display.barWidth,
            n = e.display.barHeight;
        b(e, t);
        for (var i = 0; 4 > i && r != e.display.barWidth || n != e.display.barHeight; i++) r != e.display.barWidth && e.options.lineWrapping && W(e), b(e, p(e)), r = e.display.barWidth, n = e.display.barHeight
    }

    function b(e, t) {
        var r = e.display,
            n = r.scrollbars.update(t);
        r.sizer.style.paddingRight = (r.barWidth = n.right) + "px", r.sizer.style.paddingBottom = (r.barHeight = n.bottom) + "px", r.heightForcer.style.borderBottom = n.bottom + "px solid transparent", n.right && n.bottom ? (r.scrollbarFiller.style.display = "block", r.scrollbarFiller.style.height = n.bottom + "px", r.scrollbarFiller.style.width = n.right + "px") : r.scrollbarFiller.style.display = "", n.bottom && e.options.coverGutterNextToScrollbar && e.options.fixedGutter ? (r.gutterFiller.style.display = "block", r.gutterFiller.style.height = n.bottom + "px", r.gutterFiller.style.width = t.gutterWidth + "px") : r.gutterFiller.style.display = ""
    }

    function w(e, t, r) {
        var n = r && null != r.top ? Math.max(0, r.top) : e.scroller.scrollTop;
        n = Math.floor(n - Ve(e));
        var i = r && null != r.bottom ? r.bottom : n + e.wrapper.clientHeight,
            o = ri(t, n),
            a = ri(t, i);
        if (r && r.ensure) {
            var l = r.ensure.from.line,
                s = r.ensure.to.line;
            o > l ? (o = l, a = ri(t, ni(Zn(t, l)) + e.wrapper.clientHeight)) : Math.min(s, t.lastLine()) >= a && (o = ri(t, ni(Zn(t, s)) - e.wrapper.clientHeight), a = s)
        }
        return {
            from: o,
            to: Math.max(a, o + 1)
        }
    }

    function x(e) {
        var t = e.display,
            r = t.view;
        if (t.alignWidgets || t.gutters.firstChild && e.options.fixedGutter) {
            for (var n = S(t) - t.scroller.scrollLeft + e.doc.scrollLeft, i = t.gutters.offsetWidth, o = n + "px", a = 0; a < r.length; a++)
                if (!r[a].hidden) {
                    e.options.fixedGutter && r[a].gutter && (r[a].gutter.style.left = o);
                    var l = r[a].alignable;
                    if (l)
                        for (var s = 0; s < l.length; s++) l[s].style.left = o
                } e.options.fixedGutter && (t.gutters.style.left = n + i + "px")
        }
    }

    function k(e) {
        if (!e.options.lineNumbers) return !1;
        var t = e.doc,
            r = C(e.options, t.first + t.size - 1),
            n = e.display;
        if (r.length != n.lineNumChars) {
            var i = n.measure.appendChild(Ki("div", [Ki("div", r)], "CodeMirror-linenumber CodeMirror-gutter-elt")),
                o = i.firstChild.offsetWidth,
                a = i.offsetWidth - o;
            return n.lineGutter.style.width = "", n.lineNumInnerWidth = Math.max(o, n.lineGutter.offsetWidth - a) + 1, n.lineNumWidth = n.lineNumInnerWidth + a, n.lineNumChars = n.lineNumInnerWidth ? r.length : -1, n.lineGutter.style.width = n.lineNumWidth + "px", u(e), !0
        }
        return !1
    }

    function C(e, t) {
        return String(e.lineNumberFormatter(t + e.firstLineNumber))
    }

    function S(e) {
        return e.scroller.getBoundingClientRect().left - e.sizer.getBoundingClientRect().left
    }

    function L(e, t, r) {
        var n = e.display;
        this.viewport = t, this.visible = w(n, e.doc, t), this.editorIsHidden = !n.wrapper.offsetWidth, this.wrapperHeight = n.wrapper.clientHeight, this.wrapperWidth = n.wrapper.clientWidth, this.oldDisplayWidth = _e(e), this.force = r, this.dims = z(e), this.events = []
    }

    function M(e) {
        var t = e.display;
        !t.scrollbarsClipped && t.scroller.offsetWidth && (t.nativeBarWidth = t.scroller.offsetWidth - t.scroller.clientWidth, t.heightForcer.style.height = qe(e) + "px", t.sizer.style.marginBottom = -t.nativeBarWidth + "px", t.sizer.style.borderRightWidth = qe(e) + "px", t.scrollbarsClipped = !0)
    }

    function T(e, t) {
        var r = e.display,
            n = e.doc;
        if (t.editorIsHidden) return It(e), !1;
        if (!t.force && t.visible.from >= r.viewFrom && t.visible.to <= r.viewTo && (null == r.updateLineNumbers || r.updateLineNumbers >= r.viewTo) && r.renderedView == r.view && 0 == jt(e)) return !1;
        k(e) && (It(e), t.dims = z(e));
        var i = n.first + n.size,
            o = Math.max(t.visible.from - e.options.viewportMargin, n.first),
            a = Math.min(i, t.visible.to + e.options.viewportMargin);
        r.viewFrom < o && o - r.viewFrom < 20 && (o = Math.max(n.first, r.viewFrom)), r.viewTo > a && r.viewTo - a < 20 && (a = Math.min(i, r.viewTo)), Io && (o = wn(e.doc, o), a = xn(e.doc, a));
        var l = o != r.viewFrom || a != r.viewTo || r.lastWrapHeight != t.wrapperHeight || r.lastWrapWidth != t.wrapperWidth;
        Rt(e, o, a), r.viewOffset = ni(Zn(e.doc, r.viewFrom)), e.display.mover.style.top = r.viewOffset + "px";
        var s = jt(e);
        if (!l && 0 == s && !t.force && r.renderedView == r.view && (null == r.updateLineNumbers || r.updateLineNumbers >= r.viewTo)) return !1;
        var c = Gi();
        return s > 4 && (r.lineDiv.style.display = "none"), D(e, r.updateLineNumbers, t.dims), s > 4 && (r.lineDiv.style.display = ""), r.renderedView = r.view, c && Gi() != c && c.offsetHeight && c.focus(), Vi(r.cursorDiv), Vi(r.selectionDiv), r.gutters.style.height = r.sizer.style.minHeight = 0, l && (r.lastWrapHeight = t.wrapperHeight, r.lastWrapWidth = t.wrapperWidth, Be(e, 400)), r.updateLineNumbers = null, !0
    }

    function A(e, t) {
        for (var r = t.viewport, n = !0;
            (n && e.options.lineWrapping && t.oldDisplayWidth != _e(e) || (r && null != r.top && (r = {
                top: Math.min(e.doc.height + Ue(e.display) - $e(e), r.top)
            }), t.visible = w(e.display, e.doc, r), !(t.visible.from >= e.display.viewFrom && t.visible.to <= e.display.viewTo))) && T(e, t); n = !1) {
            W(e);
            var i = p(e);
            De(e), y(e, i), N(e, i)
        }
        t.signal(e, "update", e), (e.display.viewFrom != e.display.reportedViewFrom || e.display.viewTo != e.display.reportedViewTo) && (t.signal(e, "viewportChange", e, e.display.viewFrom, e.display.viewTo), e.display.reportedViewFrom = e.display.viewFrom, e.display.reportedViewTo = e.display.viewTo)
    }

    function O(e, t) {
        var r = new L(e, t);
        if (T(e, r)) {
            W(e), A(e, r);
            var n = p(e);
            De(e), y(e, n), N(e, n), r.finish()
        }
    }

    function N(e, t) {
        e.display.sizer.style.minHeight = t.docHeight + "px", e.display.heightForcer.style.top = t.docHeight + "px", e.display.gutters.style.height = t.docHeight + e.display.barHeight + qe(e) + "px"
    }

    function W(e) {
        for (var t = e.display, r = t.lineDiv.offsetTop, n = 0; n < t.view.length; n++) {
            var i, o = t.view[n];
            if (!o.hidden) {
                if (bo && 8 > wo) {
                    var a = o.node.offsetTop + o.node.offsetHeight;
                    i = a - r, r = a
                } else {
                    var l = o.node.getBoundingClientRect();
                    i = l.bottom - l.top
                }
                var s = o.line.height - i;
                if (2 > i && (i = yt(t)), (s > .001 || -.001 > s) && (ei(o.line, i), H(o.line), o.rest))
                    for (var c = 0; c < o.rest.length; c++) H(o.rest[c])
            }
        }
    }

    function H(e) {
        if (e.widgets)
            for (var t = 0; t < e.widgets.length; ++t) e.widgets[t].height = e.widgets[t].node.parentNode.offsetHeight
    }

    function z(e) {
        for (var t = e.display, r = {}, n = {}, i = t.gutters.clientLeft, o = t.gutters.firstChild, a = 0; o; o = o.nextSibling, ++a) r[e.options.gutters[a]] = o.offsetLeft + o.clientLeft + i, n[e.options.gutters[a]] = o.clientWidth;
        return {
            fixedPos: S(t),
            gutterTotalWidth: t.gutters.offsetWidth,
            gutterLeft: r,
            gutterWidth: n,
            wrapperWidth: t.wrapper.clientWidth
        }
    }

    function D(e, t, r) {
        function n(t) {
            var r = t.nextSibling;
            return xo && No && e.display.currentWheelTarget == t ? t.style.display = "none" : t.parentNode.removeChild(t), r
        }
        for (var i = e.display, o = e.options.lineNumbers, a = i.lineDiv, l = a.firstChild, s = i.view, c = i.viewFrom, u = 0; u < s.length; u++) {
            var d = s[u];
            if (d.hidden);
            else if (d.node && d.node.parentNode == a) {
                for (; l != d.node;) l = n(l);
                var f = o && null != t && c >= t && d.lineNumber;
                d.changes && (zi(d.changes, "gutter") > -1 && (f = !1), P(e, d, c, r)), f && (Vi(d.lineNumber), d.lineNumber.appendChild(document.createTextNode(C(e.options, c)))), l = d.node.nextSibling
            } else {
                var h = V(e, d, c, r);
                a.insertBefore(h, l)
            }
            c += d.size
        }
        for (; l;) l = n(l)
    }

    function P(e, t, r, n) {
        for (var i = 0; i < t.changes.length; i++) {
            var o = t.changes[i];
            "text" == o ? B(e, t) : "gutter" == o ? j(e, t, r, n) : "class" == o ? R(t) : "widget" == o && K(e, t, n)
        }
        t.changes = null
    }

    function E(e) {
        return e.node == e.text && (e.node = Ki("div", null, null, "position: relative"), e.text.parentNode && e.text.parentNode.replaceChild(e.node, e.text), e.node.appendChild(e.text), bo && 8 > wo && (e.node.style.zIndex = 2)), e.node
    }

    function I(e) {
        var t = e.bgClass ? e.bgClass + " " + (e.line.bgClass || "") : e.line.bgClass;
        if (t && (t += " CodeMirror-linebackground"), e.background) t ? e.background.className = t : (e.background.parentNode.removeChild(e.background), e.background = null);
        else if (t) {
            var r = E(e);
            e.background = r.insertBefore(Ki("div", null, t), r.firstChild)
        }
    }

    function F(e, t) {
        var r = e.display.externalMeasured;
        return r && r.line == t.line ? (e.display.externalMeasured = null, t.measure = r.measure, r.built) : Fn(e, t)
    }

    function B(e, t) {
        var r = t.text.className,
            n = F(e, t);
        t.text == t.node && (t.node = n.pre), t.text.parentNode.replaceChild(n.pre, t.text), t.text = n.pre, n.bgClass != t.bgClass || n.textClass != t.textClass ? (t.bgClass = n.bgClass, t.textClass = n.textClass, R(t)) : r && (t.text.className = r)
    }

    function R(e) {
        I(e), e.line.wrapClass ? E(e).className = e.line.wrapClass : e.node != e.text && (e.node.className = "");
        var t = e.textClass ? e.textClass + " " + (e.line.textClass || "") : e.line.textClass;
        e.text.className = t || ""
    }

    function j(e, t, r, n) {
        if (t.gutter && (t.node.removeChild(t.gutter), t.gutter = null), t.gutterBackground && (t.node.removeChild(t.gutterBackground), t.gutterBackground = null), t.line.gutterClass) {
            var i = E(t);
            t.gutterBackground = Ki("div", null, "CodeMirror-gutter-background " + t.line.gutterClass, "left: " + (e.options.fixedGutter ? n.fixedPos : -n.gutterTotalWidth) + "px; width: " + n.gutterTotalWidth + "px"), i.insertBefore(t.gutterBackground, t.text)
        }
        var o = t.line.gutterMarkers;
        if (e.options.lineNumbers || o) {
            var i = E(t),
                a = t.gutter = Ki("div", null, "CodeMirror-gutter-wrapper", "left: " + (e.options.fixedGutter ? n.fixedPos : -n.gutterTotalWidth) + "px");
            if (e.display.input.setUneditable(a), i.insertBefore(a, t.text), t.line.gutterClass && (a.className += " " + t.line.gutterClass), !e.options.lineNumbers || o && o["CodeMirror-linenumbers"] || (t.lineNumber = a.appendChild(Ki("div", C(e.options, r), "CodeMirror-linenumber CodeMirror-gutter-elt", "left: " + n.gutterLeft["CodeMirror-linenumbers"] + "px; width: " + e.display.lineNumInnerWidth + "px"))), o)
                for (var l = 0; l < e.options.gutters.length; ++l) {
                    var s = e.options.gutters[l],
                        c = o.hasOwnProperty(s) && o[s];
                    c && a.appendChild(Ki("div", [c], "CodeMirror-gutter-elt", "left: " + n.gutterLeft[s] + "px; width: " + n.gutterWidth[s] + "px"))
                }
        }
    }

    function K(e, t, r) {
        t.alignable && (t.alignable = null);
        for (var n, i = t.node.firstChild; i; i = n) {
            var n = i.nextSibling;
            "CodeMirror-linewidget" == i.className && t.node.removeChild(i)
        }
        U(e, t, r)
    }

    function V(e, t, r, n) {
        var i = F(e, t);
        return t.text = t.node = i.pre, i.bgClass && (t.bgClass = i.bgClass), i.textClass && (t.textClass = i.textClass), R(t), j(e, t, r, n), U(e, t, n), t.node
    }

    function U(e, t, r) {
        if (G(e, t.line, t, r, !0), t.rest)
            for (var n = 0; n < t.rest.length; n++) G(e, t.rest[n], t, r, !1)
    }

    function G(e, t, r, n, i) {
        if (t.widgets)
            for (var o = E(r), a = 0, l = t.widgets; a < l.length; ++a) {
                var s = l[a],
                    c = Ki("div", [s.node], "CodeMirror-linewidget");
                s.handleMouseEvents || c.setAttribute("cm-ignore-events", "true"), q(s, c, r, n), e.display.input.setUneditable(c), i && s.above ? o.insertBefore(c, r.gutter || r.text) : o.appendChild(c), Si(s, "redraw")
            }
    }

    function q(e, t, r, n) {
        if (e.noHScroll) {
            (r.alignable || (r.alignable = [])).push(t);
            var i = n.wrapperWidth;
            t.style.left = n.fixedPos + "px", e.coverGutter || (i -= n.gutterTotalWidth, t.style.paddingLeft = n.gutterTotalWidth + "px"), t.style.width = i + "px"
        }
        e.coverGutter && (t.style.zIndex = 5, t.style.position = "relative", e.noHScroll || (t.style.marginLeft = -n.gutterTotalWidth + "px"))
    }

    function _(e) {
        return Fo(e.line, e.ch)
    }

    function $(e, t) {
        return Bo(e, t) < 0 ? t : e
    }

    function X(e, t) {
        return Bo(e, t) < 0 ? e : t
    }

    function Y(e) {
        e.state.focused || (e.display.input.focus(), mr(e))
    }

    function Z(e, t, r, n, i) {
        var o = e.doc;
        e.display.shift = !1, n || (n = o.sel);
        var a = e.state.pasteIncoming || "paste" == i,
            l = o.splitLines(t),
            s = null;
        if (a && n.ranges.length > 1)
            if (Ro && Ro.text.join("\n") == t) {
                if (n.ranges.length % Ro.text.length == 0) {
                    s = [];
                    for (var c = 0; c < Ro.text.length; c++) s.push(o.splitLines(Ro.text[c]))
                }
            } else l.length == n.ranges.length && (s = Di(l, function (e) {
                return [e]
            }));
        for (var c = n.ranges.length - 1; c >= 0; c--) {
            var u = n.ranges[c],
                d = u.from(),
                f = u.to();
            u.empty() && (r && r > 0 ? d = Fo(d.line, d.ch - r) : e.state.overwrite && !a ? f = Fo(f.line, Math.min(Zn(o, f.line).text.length, f.ch + Hi(l).length)) : Ro && Ro.lineWise && Ro.text.join("\n") == t && (d = f = Fo(d.line, 0)));
            var h = e.curOp.updateInput,
                p = {
                    from: d,
                    to: f,
                    text: s ? s[c % s.length] : l,
                    origin: i || (a ? "paste" : e.state.cutIncoming ? "cut" : "+input")
                };
            Lr(e.doc, p), Si(e, "inputRead", e, p)
        }
        t && !a && J(e, t), Ir(e), e.curOp.updateInput = h, e.curOp.typing = !0, e.state.pasteIncoming = e.state.cutIncoming = !1
    }

    function Q(e, t) {
        var r = e.clipboardData && e.clipboardData.getData("text/plain");
        return r ? (e.preventDefault(), t.isReadOnly() || t.options.disableInput || Ot(t, function () {
            Z(t, r, 0, null, "paste")
        }), !0) : void 0
    }

    function J(e, t) {
        if (e.options.electricChars && e.options.smartIndent)
            for (var r = e.doc.sel, n = r.ranges.length - 1; n >= 0; n--) {
                var i = r.ranges[n];
                if (!(i.head.ch > 100 || n && r.ranges[n - 1].head.line == i.head.line)) {
                    var o = e.getModeAt(i.head),
                        a = !1;
                    if (o.electricChars) {
                        for (var l = 0; l < o.electricChars.length; l++)
                            if (t.indexOf(o.electricChars.charAt(l)) > -1) {
                                a = Br(e, i.head.line, "smart");
                                break
                            }
                    } else o.electricInput && o.electricInput.test(Zn(e.doc, i.head.line).text.slice(0, i.head.ch)) && (a = Br(e, i.head.line, "smart"));
                    a && Si(e, "electricInput", e, i.head.line)
                }
            }
    }

    function ee(e) {
        for (var t = [], r = [], n = 0; n < e.doc.sel.ranges.length; n++) {
            var i = e.doc.sel.ranges[n].head.line,
                o = {
                    anchor: Fo(i, 0),
                    head: Fo(i + 1, 0)
                };
            r.push(o), t.push(e.getRange(o.anchor, o.head))
        }
        return {
            text: t,
            ranges: r
        }
    }

    function te(e) {
        e.setAttribute("autocorrect", "off"), e.setAttribute("autocapitalize", "off"), e.setAttribute("spellcheck", "false")
    }

    function re(e) {
        this.cm = e, this.prevInput = "", this.pollingFast = !1, this.polling = new Ni, this.inaccurateSelection = !1, this.hasSelection = !1, this.composing = null
    }

    function ne() {
        var e = Ki("textarea", null, null, "position: absolute; padding: 0; width: 1px; height: 1em; outline: none"),
            t = Ki("div", [e], null, "overflow: hidden; position: relative; width: 3px; height: 0px;");
        return xo ? e.style.width = "1000px" : e.setAttribute("wrap", "off"), Ao && (e.style.border = "1px solid black"), te(e), t
    }

    function ie(e) {
        this.cm = e, this.lastAnchorNode = this.lastAnchorOffset = this.lastFocusNode = this.lastFocusOffset = null, this.polling = new Ni, this.gracePeriod = !1
    }

    function oe(e, t) {
        var r = Je(e, t.line);
        if (!r || r.hidden) return null;
        var n = Zn(e.doc, t.line),
            i = Ye(r, n, t.line),
            o = ii(n),
            a = "left";
        if (o) {
            var l = co(o, t.ch);
            a = l % 2 ? "right" : "left"
        }
        var s = rt(i.map, t.ch, a);
        return s.offset = "right" == s.collapse ? s.end : s.start, s
    }

    function ae(e, t) {
        return t && (e.bad = !0), e
    }

    function le(e, t, r) {
        var n;
        if (t == e.display.lineDiv) {
            if (n = e.display.lineDiv.childNodes[r], !n) return ae(e.clipPos(Fo(e.display.viewTo - 1)), !0);
            t = null, r = 0
        } else
            for (n = t;; n = n.parentNode) {
                if (!n || n == e.display.lineDiv) return null;
                if (n.parentNode && n.parentNode == e.display.lineDiv) break
            }
        for (var i = 0; i < e.display.view.length; i++) {
            var o = e.display.view[i];
            if (o.node == n) return se(o, t, r)
        }
    }

    function se(e, t, r) {
        function n(t, r, n) {
            for (var i = -1; i < (u ? u.length : 0); i++)
                for (var o = 0 > i ? c.map : u[i], a = 0; a < o.length; a += 3) {
                    var l = o[a + 2];
                    if (l == t || l == r) {
                        var s = ti(0 > i ? e.line : e.rest[i]),
                            d = o[a] + n;
                        return (0 > n || l != t) && (d = o[a + (n ? 1 : 0)]), Fo(s, d)
                    }
                }
        }
        var i = e.text.firstChild,
            o = !1;
        if (!t || !$a(i, t)) return ae(Fo(ti(e.line), 0), !0);
        if (t == i && (o = !0, t = i.childNodes[r], r = 0, !t)) {
            var a = e.rest ? Hi(e.rest) : e.line;
            return ae(Fo(ti(a), a.text.length), o)
        }
        var l = 3 == t.nodeType ? t : null,
            s = t;
        for (l || 1 != t.childNodes.length || 3 != t.firstChild.nodeType || (l = t.firstChild, r && (r = l.nodeValue.length)); s.parentNode != i;) s = s.parentNode;
        var c = e.measure,
            u = c.maps,
            d = n(l, s, r);
        if (d) return ae(d, o);
        for (var f = s.nextSibling, h = l ? l.nodeValue.length - r : 0; f; f = f.nextSibling) {
            if (d = n(f, f.firstChild, 0)) return ae(Fo(d.line, d.ch - h), o);
            h += f.textContent.length
        }
        for (var p = s.previousSibling, h = r; p; p = p.previousSibling) {
            if (d = n(p, p.firstChild, -1)) return ae(Fo(d.line, d.ch + h), o);
            h += f.textContent.length
        }
    }

    function ce(e, t, r, n, i) {
        function o(e) {
            return function (t) {
                return t.id == e
            }
        }

        function a(t) {
            if (1 == t.nodeType) {
                var r = t.getAttribute("cm-text");
                if (null != r) return "" == r && (r = t.textContent.replace(/\u200b/g, "")), void(l += r);
                var u, d = t.getAttribute("cm-marker");
                if (d) {
                    var f = e.findMarks(Fo(n, 0), Fo(i + 1, 0), o(+d));
                    return void(f.length && (u = f[0].find()) && (l += Qn(e.doc, u.from, u.to).join(c)))
                }
                if ("false" == t.getAttribute("contenteditable")) return;
                for (var h = 0; h < t.childNodes.length; h++) a(t.childNodes[h]);
                /^(pre|div|p)$/i.test(t.nodeName) && (s = !0)
            } else if (3 == t.nodeType) {
                var p = t.nodeValue;
                if (!p) return;
                s && (l += c, s = !1), l += p
            }
        }
        for (var l = "", s = !1, c = e.doc.lineSeparator(); a(t), t != r;) t = t.nextSibling;
        return l
    }

    function ue(e, t) {
        this.ranges = e, this.primIndex = t
    }

    function de(e, t) {
        this.anchor = e, this.head = t
    }

    function fe(e, t) {
        var r = e[t];
        e.sort(function (e, t) {
            return Bo(e.from(), t.from())
        }), t = zi(e, r);
        for (var n = 1; n < e.length; n++) {
            var i = e[n],
                o = e[n - 1];
            if (Bo(o.to(), i.from()) >= 0) {
                var a = X(o.from(), i.from()),
                    l = $(o.to(), i.to()),
                    s = o.empty() ? i.from() == i.head : o.from() == o.head;
                t >= n && --t, e.splice(--n, 2, new de(s ? l : a, s ? a : l))
            }
        }
        return new ue(e, t)
    }

    function he(e, t) {
        return new ue([new de(e, t || e)], 0)
    }

    function pe(e, t) {
        return Math.max(e.first, Math.min(t, e.first + e.size - 1))
    }

    function ge(e, t) {
        if (t.line < e.first) return Fo(e.first, 0);
        var r = e.first + e.size - 1;
        return t.line > r ? Fo(r, Zn(e, r).text.length) : me(t, Zn(e, t.line).text.length)
    }

    function me(e, t) {
        var r = e.ch;
        return null == r || r > t ? Fo(e.line, t) : 0 > r ? Fo(e.line, 0) : e
    }

    function ve(e, t) {
        return t >= e.first && t < e.first + e.size
    }

    function ye(e, t) {
        for (var r = [], n = 0; n < t.length; n++) r[n] = ge(e, t[n]);
        return r
    }

    function be(e, t, r, n) {
        if (e.cm && e.cm.display.shift || e.extend) {
            var i = t.anchor;
            if (n) {
                var o = Bo(r, i) < 0;
                o != Bo(n, i) < 0 ? (i = r, r = n) : o != Bo(r, n) < 0 && (r = n)
            }
            return new de(i, r)
        }
        return new de(n || r, r)
    }

    function we(e, t, r, n) {
        Me(e, new ue([be(e, e.sel.primary(), t, r)], 0), n)
    }

    function xe(e, t, r) {
        for (var n = [], i = 0; i < e.sel.ranges.length; i++) n[i] = be(e, e.sel.ranges[i], t[i], null);
        var o = fe(n, e.sel.primIndex);
        Me(e, o, r)
    }

    function ke(e, t, r, n) {
        var i = e.sel.ranges.slice(0);
        i[t] = r, Me(e, fe(i, e.sel.primIndex), n)
    }

    function Ce(e, t, r, n) {
        Me(e, he(t, r), n)
    }

    function Se(e, t, r) {
        var n = {
            ranges: t.ranges,
            update: function (t) {
                this.ranges = [];
                for (var r = 0; r < t.length; r++) this.ranges[r] = new de(ge(e, t[r].anchor), ge(e, t[r].head))
            },
            origin: r && r.origin
        };
        return za(e, "beforeSelectionChange", e, n), e.cm && za(e.cm, "beforeSelectionChange", e.cm, n), n.ranges != t.ranges ? fe(n.ranges, n.ranges.length - 1) : t
    }

    function Le(e, t, r) {
        var n = e.history.done,
            i = Hi(n);
        i && i.ranges ? (n[n.length - 1] = t, Te(e, t, r)) : Me(e, t, r)
    }

    function Me(e, t, r) {
        Te(e, t, r), di(e, e.sel, e.cm ? e.cm.curOp.id : NaN, r)
    }

    function Te(e, t, r) {
        (Ai(e, "beforeSelectionChange") || e.cm && Ai(e.cm, "beforeSelectionChange")) && (t = Se(e, t, r));
        var n = r && r.bias || (Bo(t.primary().head, e.sel.primary().head) < 0 ? -1 : 1);
        Ae(e, Ne(e, t, n, !0)), r && r.scroll === !1 || !e.cm || Ir(e.cm)
    }

    function Ae(e, t) {
        t.equals(e.sel) || (e.sel = t, e.cm && (e.cm.curOp.updateInput = e.cm.curOp.selectionChanged = !0, Ti(e.cm)), Si(e, "cursorActivity", e))
    }

    function Oe(e) {
        Ae(e, Ne(e, e.sel, null, !1), Ia)
    }

    function Ne(e, t, r, n) {
        for (var i, o = 0; o < t.ranges.length; o++) {
            var a = t.ranges[o],
                l = t.ranges.length == e.sel.ranges.length && e.sel.ranges[o],
                s = He(e, a.anchor, l && l.anchor, r, n),
                c = He(e, a.head, l && l.head, r, n);
            (i || s != a.anchor || c != a.head) && (i || (i = t.ranges.slice(0, o)), i[o] = new de(s, c))
        }
        return i ? fe(i, t.primIndex) : t
    }

    function We(e, t, r, n, i) {
        var o = Zn(e, t.line);
        if (o.markedSpans)
            for (var a = 0; a < o.markedSpans.length; ++a) {
                var l = o.markedSpans[a],
                    s = l.marker;
                if ((null == l.from || (s.inclusiveLeft ? l.from <= t.ch : l.from < t.ch)) && (null == l.to || (s.inclusiveRight ? l.to >= t.ch : l.to > t.ch))) {
                    if (i && (za(s, "beforeCursorEnter"), s.explicitlyCleared)) {
                        if (o.markedSpans) {
                            --a;
                            continue
                        }
                        break
                    }
                    if (!s.atomic) continue;
                    if (r) {
                        var c, u = s.find(0 > n ? 1 : -1);
                        if ((0 > n ? s.inclusiveRight : s.inclusiveLeft) && (u = ze(e, u, -n, u && u.line == t.line ? o : null)), u && u.line == t.line && (c = Bo(u, r)) && (0 > n ? 0 > c : c > 0)) return We(e, u, t, n, i)
                    }
                    var d = s.find(0 > n ? -1 : 1);
                    return (0 > n ? s.inclusiveLeft : s.inclusiveRight) && (d = ze(e, d, n, d.line == t.line ? o : null)), d ? We(e, d, t, n, i) : null
                }
            }
        return t
    }

    function He(e, t, r, n, i) {
        var o = n || 1,
            a = We(e, t, r, o, i) || !i && We(e, t, r, o, !0) || We(e, t, r, -o, i) || !i && We(e, t, r, -o, !0);
        return a ? a : (e.cantEdit = !0, Fo(e.first, 0))
    }

    function ze(e, t, r, n) {
        return 0 > r && 0 == t.ch ? t.line > e.first ? ge(e, Fo(t.line - 1)) : null : r > 0 && t.ch == (n || Zn(e, t.line)).text.length ? t.line < e.first + e.size - 1 ? Fo(t.line + 1, 0) : null : new Fo(t.line, t.ch + r)
    }

    function De(e) {
        e.display.input.showSelection(e.display.input.prepareSelection())
    }

    function Pe(e, t) {
        for (var r = e.doc, n = {}, i = n.cursors = document.createDocumentFragment(), o = n.selection = document.createDocumentFragment(), a = 0; a < r.sel.ranges.length; a++)
            if (t !== !1 || a != r.sel.primIndex) {
                var l = r.sel.ranges[a];
                if (!(l.from().line >= e.display.viewTo || l.to().line < e.display.viewFrom)) {
                    var s = l.empty();
                    (s || e.options.showCursorWhenSelecting) && Ee(e, l.head, i), s || Ie(e, l, o)
                }
            } return n
    }

    function Ee(e, t, r) {
        var n = ht(e, t, "div", null, null, !e.options.singleCursorHeightPerLine),
            i = r.appendChild(Ki("div", " ", "CodeMirror-cursor"));
        if (i.style.left = n.left + "px", i.style.top = n.top + "px", i.style.height = Math.max(0, n.bottom - n.top) * e.options.cursorHeight + "px", n.other) {
            var o = r.appendChild(Ki("div", " ", "CodeMirror-cursor CodeMirror-secondarycursor"));
            o.style.display = "", o.style.left = n.other.left + "px", o.style.top = n.other.top + "px", o.style.height = .85 * (n.other.bottom - n.other.top) + "px"
        }
    }

    function Ie(e, t, r) {
        function n(e, t, r, n) {
            0 > t && (t = 0), t = Math.round(t), n = Math.round(n), l.appendChild(Ki("div", null, "CodeMirror-selected", "position: absolute; left: " + e + "px; top: " + t + "px; width: " + (null == r ? u - e : r) + "px; height: " + (n - t) + "px"))
        }

        function i(t, r, i) {
            function o(r, n) {
                return ft(e, Fo(t, r), "div", d, n)
            }
            var l, s, d = Zn(a, t),
                f = d.text.length;
            return eo(ii(d), r || 0, null == i ? f : i, function (e, t, a) {
                var d, h, p, g = o(e, "left");
                if (e == t) d = g, h = p = g.left;
                else {
                    if (d = o(t - 1, "right"), "rtl" == a) {
                        var m = g;
                        g = d, d = m
                    }
                    h = g.left, p = d.right
                }
                null == r && 0 == e && (h = c), d.top - g.top > 3 && (n(h, g.top, null, g.bottom), h = c, g.bottom < d.top && n(h, g.bottom, null, d.top)), null == i && t == f && (p = u), (!l || g.top < l.top || g.top == l.top && g.left < l.left) && (l = g), (!s || d.bottom > s.bottom || d.bottom == s.bottom && d.right > s.right) && (s = d), c + 1 > h && (h = c), n(h, d.top, p - h, d.bottom)
            }), {
                start: l,
                end: s
            }
        }
        var o = e.display,
            a = e.doc,
            l = document.createDocumentFragment(),
            s = Ge(e.display),
            c = s.left,
            u = Math.max(o.sizerWidth, _e(e) - o.sizer.offsetLeft) - s.right,
            d = t.from(),
            f = t.to();
        if (d.line == f.line) i(d.line, d.ch, f.ch);
        else {
            var h = Zn(a, d.line),
                p = Zn(a, f.line),
                g = yn(h) == yn(p),
                m = i(d.line, d.ch, g ? h.text.length + 1 : null).end,
                v = i(f.line, g ? 0 : null, f.ch).start;
            g && (m.top < v.top - 2 ? (n(m.right, m.top, null, m.bottom), n(c, v.top, v.left, v.bottom)) : n(m.right, m.top, v.left - m.right, m.bottom)), m.bottom < v.top && n(c, m.bottom, null, v.top)
        }
        r.appendChild(l)
    }

    function Fe(e) {
        if (e.state.focused) {
            var t = e.display;
            clearInterval(t.blinker);
            var r = !0;
            t.cursorDiv.style.visibility = "", e.options.cursorBlinkRate > 0 ? t.blinker = setInterval(function () {
                t.cursorDiv.style.visibility = (r = !r) ? "" : "hidden"
            }, e.options.cursorBlinkRate) : e.options.cursorBlinkRate < 0 && (t.cursorDiv.style.visibility = "hidden")
        }
    }

    function Be(e, t) {
        e.doc.mode.startState && e.doc.frontier < e.display.viewTo && e.state.highlight.set(t, Fi(Re, e))
    }

    function Re(e) {
        var t = e.doc;
        if (t.frontier < t.first && (t.frontier = t.first), !(t.frontier >= e.display.viewTo)) {
            var r = +new Date + e.options.workTime,
                n = sa(t.mode, Ke(e, t.frontier)),
                i = [];
            t.iter(t.frontier, Math.min(t.first + t.size, e.display.viewTo + 500), function (o) {
                if (t.frontier >= e.display.viewFrom) {
                    var a = o.styles,
                        l = o.text.length > e.options.maxHighlightLength,
                        s = Dn(e, o, l ? sa(t.mode, n) : n, !0);
                    o.styles = s.styles;
                    var c = o.styleClasses,
                        u = s.classes;
                    u ? o.styleClasses = u : c && (o.styleClasses = null);
                    for (var d = !a || a.length != o.styles.length || c != u && (!c || !u || c.bgClass != u.bgClass || c.textClass != u.textClass), f = 0; !d && f < a.length; ++f) d = a[f] != o.styles[f];
                    d && i.push(t.frontier), o.stateAfter = l ? n : sa(t.mode, n)
                } else o.text.length <= e.options.maxHighlightLength && En(e, o.text, n), o.stateAfter = t.frontier % 5 == 0 ? sa(t.mode, n) : null;
                return ++t.frontier, +new Date > r ? (Be(e, e.options.workDelay), !0) : void 0
            }), i.length && Ot(e, function () {
                for (var t = 0; t < i.length; t++) Et(e, i[t], "text")
            })
        }
    }

    function je(e, t, r) {
        for (var n, i, o = e.doc, a = r ? -1 : t - (e.doc.mode.innerMode ? 1e3 : 100), l = t; l > a; --l) {
            if (l <= o.first) return o.first;
            var s = Zn(o, l - 1);
            if (s.stateAfter && (!r || l <= o.frontier)) return l;
            var c = Ra(s.text, null, e.options.tabSize);
            (null == i || n > c) && (i = l - 1, n = c)
        }
        return i
    }

    function Ke(e, t, r) {
        var n = e.doc,
            i = e.display;
        if (!n.mode.startState) return !0;
        var o = je(e, t, r),
            a = o > n.first && Zn(n, o - 1).stateAfter;
        return a = a ? sa(n.mode, a) : ca(n.mode), n.iter(o, t, function (r) {
            En(e, r.text, a);
            var l = o == t - 1 || o % 5 == 0 || o >= i.viewFrom && o < i.viewTo;
            r.stateAfter = l ? sa(n.mode, a) : null, ++o
        }), r && (n.frontier = o), a
    }

    function Ve(e) {
        return e.lineSpace.offsetTop
    }

    function Ue(e) {
        return e.mover.offsetHeight - e.lineSpace.offsetHeight
    }

    function Ge(e) {
        if (e.cachedPaddingH) return e.cachedPaddingH;
        var t = Ui(e.measure, Ki("pre", "x")),
            r = window.getComputedStyle ? window.getComputedStyle(t) : t.currentStyle,
            n = {
                left: parseInt(r.paddingLeft),
                right: parseInt(r.paddingRight)
            };
        return isNaN(n.left) || isNaN(n.right) || (e.cachedPaddingH = n), n
    }

    function qe(e) {
        return Pa - e.display.nativeBarWidth
    }

    function _e(e) {
        return e.display.scroller.clientWidth - qe(e) - e.display.barWidth
    }

    function $e(e) {
        return e.display.scroller.clientHeight - qe(e) - e.display.barHeight
    }

    function Xe(e, t, r) {
        var n = e.options.lineWrapping,
            i = n && _e(e);
        if (!t.measure.heights || n && t.measure.width != i) {
            var o = t.measure.heights = [];
            if (n) {
                t.measure.width = i;
                for (var a = t.text.firstChild.getClientRects(), l = 0; l < a.length - 1; l++) {
                    var s = a[l],
                        c = a[l + 1];
                    Math.abs(s.bottom - c.bottom) > 2 && o.push((s.bottom + c.top) / 2 - r.top)
                }
            }
            o.push(r.bottom - r.top)
        }
    }

    function Ye(e, t, r) {
        if (e.line == t) return {
            map: e.measure.map,
            cache: e.measure.cache
        };
        for (var n = 0; n < e.rest.length; n++)
            if (e.rest[n] == t) return {
                map: e.measure.maps[n],
                cache: e.measure.caches[n]
            };
        for (var n = 0; n < e.rest.length; n++)
            if (ti(e.rest[n]) > r) return {
                map: e.measure.maps[n],
                cache: e.measure.caches[n],
                before: !0
            }
    }

    function Ze(e, t) {
        t = yn(t);
        var r = ti(t),
            n = e.display.externalMeasured = new zt(e.doc, t, r);
        n.lineN = r;
        var i = n.built = Fn(e, n);
        return n.text = i.pre, Ui(e.display.lineMeasure, i.pre), n
    }

    function Qe(e, t, r, n) {
        return tt(e, et(e, t), r, n)
    }

    function Je(e, t) {
        if (t >= e.display.viewFrom && t < e.display.viewTo) return e.display.view[Ft(e, t)];
        var r = e.display.externalMeasured;
        return r && t >= r.lineN && t < r.lineN + r.size ? r : void 0
    }

    function et(e, t) {
        var r = ti(t),
            n = Je(e, r);
        n && !n.text ? n = null : n && n.changes && (P(e, n, r, z(e)), e.curOp.forceUpdate = !0), n || (n = Ze(e, t));
        var i = Ye(n, t, r);
        return {
            line: t,
            view: n,
            rect: null,
            map: i.map,
            cache: i.cache,
            before: i.before,
            hasHeights: !1
        }
    }

    function tt(e, t, r, n, i) {
        t.before && (r = -1);
        var o, a = r + (n || "");
        return t.cache.hasOwnProperty(a) ? o = t.cache[a] : (t.rect || (t.rect = t.view.text.getBoundingClientRect()), t.hasHeights || (Xe(e, t.view, t.rect), t.hasHeights = !0), o = nt(e, t, r, n), o.bogus || (t.cache[a] = o)), {
            left: o.left,
            right: o.right,
            top: i ? o.rtop : o.top,
            bottom: i ? o.rbottom : o.bottom
        }
    }

    function rt(e, t, r) {
        for (var n, i, o, a, l = 0; l < e.length; l += 3) {
            var s = e[l],
                c = e[l + 1];
            if (s > t ? (i = 0, o = 1, a = "left") : c > t ? (i = t - s,
                    o = i + 1) : (l == e.length - 3 || t == c && e[l + 3] > t) && (o = c - s, i = o - 1, t >= c && (a = "right")), null != i) {
                if (n = e[l + 2], s == c && r == (n.insertLeft ? "left" : "right") && (a = r), "left" == r && 0 == i)
                    for (; l && e[l - 2] == e[l - 3] && e[l - 1].insertLeft;) n = e[(l -= 3) + 2], a = "left";
                if ("right" == r && i == c - s)
                    for (; l < e.length - 3 && e[l + 3] == e[l + 4] && !e[l + 5].insertLeft;) n = e[(l += 3) + 2], a = "right";
                break
            }
        }
        return {
            node: n,
            start: i,
            end: o,
            collapse: a,
            coverStart: s,
            coverEnd: c
        }
    }

    function nt(e, t, r, n) {
        var i, o = rt(t.map, r, n),
            a = o.node,
            l = o.start,
            s = o.end,
            c = o.collapse;
        if (3 == a.nodeType) {
            for (var u = 0; 4 > u; u++) {
                for (; l && ji(t.line.text.charAt(o.coverStart + l));) --l;
                for (; o.coverStart + s < o.coverEnd && ji(t.line.text.charAt(o.coverStart + s));) ++s;
                if (bo && 9 > wo && 0 == l && s == o.coverEnd - o.coverStart) i = a.parentNode.getBoundingClientRect();
                else if (bo && e.options.lineWrapping) {
                    var d = Ua(a, l, s).getClientRects();
                    i = d.length ? d["right" == n ? d.length - 1 : 0] : Uo
                } else i = Ua(a, l, s).getBoundingClientRect() || Uo;
                if (i.left || i.right || 0 == l) break;
                s = l, l -= 1, c = "right"
            }
            bo && 11 > wo && (i = it(e.display.measure, i))
        } else {
            l > 0 && (c = n = "right");
            var d;
            i = e.options.lineWrapping && (d = a.getClientRects()).length > 1 ? d["right" == n ? d.length - 1 : 0] : a.getBoundingClientRect()
        }
        if (bo && 9 > wo && !l && (!i || !i.left && !i.right)) {
            var f = a.parentNode.getClientRects()[0];
            i = f ? {
                left: f.left,
                right: f.left + bt(e.display),
                top: f.top,
                bottom: f.bottom
            } : Uo
        }
        for (var h = i.top - t.rect.top, p = i.bottom - t.rect.top, g = (h + p) / 2, m = t.view.measure.heights, u = 0; u < m.length - 1 && !(g < m[u]); u++);
        var v = u ? m[u - 1] : 0,
            y = m[u],
            b = {
                left: ("right" == c ? i.right : i.left) - t.rect.left,
                right: ("left" == c ? i.left : i.right) - t.rect.left,
                top: v,
                bottom: y
            };
        return i.left || i.right || (b.bogus = !0), e.options.singleCursorHeightPerLine || (b.rtop = h, b.rbottom = p), b
    }

    function it(e, t) {
        if (!window.screen || null == screen.logicalXDPI || screen.logicalXDPI == screen.deviceXDPI || !Ji(e)) return t;
        var r = screen.logicalXDPI / screen.deviceXDPI,
            n = screen.logicalYDPI / screen.deviceYDPI;
        return {
            left: t.left * r,
            right: t.right * r,
            top: t.top * n,
            bottom: t.bottom * n
        }
    }

    function ot(e) {
        if (e.measure && (e.measure.cache = {}, e.measure.heights = null, e.rest))
            for (var t = 0; t < e.rest.length; t++) e.measure.caches[t] = {}
    }

    function at(e) {
        e.display.externalMeasure = null, Vi(e.display.lineMeasure);
        for (var t = 0; t < e.display.view.length; t++) ot(e.display.view[t])
    }

    function lt(e) {
        at(e), e.display.cachedCharWidth = e.display.cachedTextHeight = e.display.cachedPaddingH = null, e.options.lineWrapping || (e.display.maxLineChanged = !0), e.display.lineNumChars = null
    }

    function st() {
        return window.pageXOffset || (document.documentElement || document.body).scrollLeft
    }

    function ct() {
        return window.pageYOffset || (document.documentElement || document.body).scrollTop
    }

    function ut(e, t, r, n) {
        if (t.widgets)
            for (var i = 0; i < t.widgets.length; ++i)
                if (t.widgets[i].above) {
                    var o = Ln(t.widgets[i]);
                    r.top += o, r.bottom += o
                } if ("line" == n) return r;
        n || (n = "local");
        var a = ni(t);
        if ("local" == n ? a += Ve(e.display) : a -= e.display.viewOffset, "page" == n || "window" == n) {
            var l = e.display.lineSpace.getBoundingClientRect();
            a += l.top + ("window" == n ? 0 : ct());
            var s = l.left + ("window" == n ? 0 : st());
            r.left += s, r.right += s
        }
        return r.top += a, r.bottom += a, r
    }

    function dt(e, t, r) {
        if ("div" == r) return t;
        var n = t.left,
            i = t.top;
        if ("page" == r) n -= st(), i -= ct();
        else if ("local" == r || !r) {
            var o = e.display.sizer.getBoundingClientRect();
            n += o.left, i += o.top
        }
        var a = e.display.lineSpace.getBoundingClientRect();
        return {
            left: n - a.left,
            top: i - a.top
        }
    }

    function ft(e, t, r, n, i) {
        return n || (n = Zn(e.doc, t.line)), ut(e, n, Qe(e, n, t.ch, i), r)
    }

    function ht(e, t, r, n, i, o) {
        function a(t, a) {
            var l = tt(e, i, t, a ? "right" : "left", o);
            return a ? l.left = l.right : l.right = l.left, ut(e, n, l, r)
        }

        function l(e, t) {
            var r = s[t],
                n = r.level % 2;
            return e == to(r) && t && r.level < s[t - 1].level ? (r = s[--t], e = ro(r) - (r.level % 2 ? 0 : 1), n = !0) : e == ro(r) && t < s.length - 1 && r.level < s[t + 1].level && (r = s[++t], e = to(r) - r.level % 2, n = !1), n && e == r.to && e > r.from ? a(e - 1) : a(e, n)
        }
        n = n || Zn(e.doc, t.line), i || (i = et(e, n));
        var s = ii(n),
            c = t.ch;
        if (!s) return a(c);
        var u = co(s, c),
            d = l(c, u);
        return null != al && (d.other = l(c, al)), d
    }

    function pt(e, t) {
        var r = 0,
            t = ge(e.doc, t);
        e.options.lineWrapping || (r = bt(e.display) * t.ch);
        var n = Zn(e.doc, t.line),
            i = ni(n) + Ve(e.display);
        return {
            left: r,
            right: r,
            top: i,
            bottom: i + n.height
        }
    }

    function gt(e, t, r, n) {
        var i = Fo(e, t);
        return i.xRel = n, r && (i.outside = !0), i
    }

    function mt(e, t, r) {
        var n = e.doc;
        if (r += e.display.viewOffset, 0 > r) return gt(n.first, 0, !0, -1);
        var i = ri(n, r),
            o = n.first + n.size - 1;
        if (i > o) return gt(n.first + n.size - 1, Zn(n, o).text.length, !0, 1);
        0 > t && (t = 0);
        for (var a = Zn(n, i);;) {
            var l = vt(e, a, i, t, r),
                s = mn(a),
                c = s && s.find(0, !0);
            if (!s || !(l.ch > c.from.ch || l.ch == c.from.ch && l.xRel > 0)) return l;
            i = ti(a = c.to.line)
        }
    }

    function vt(e, t, r, n, i) {
        function o(n) {
            var i = ht(e, Fo(r, n), "line", t, c);
            return l = !0, a > i.bottom ? i.left - s : a < i.top ? i.left + s : (l = !1, i.left)
        }
        var a = i - ni(t),
            l = !1,
            s = 2 * e.display.wrapper.clientWidth,
            c = et(e, t),
            u = ii(t),
            d = t.text.length,
            f = no(t),
            h = io(t),
            p = o(f),
            g = l,
            m = o(h),
            v = l;
        if (n > m) return gt(r, h, v, 1);
        for (;;) {
            if (u ? h == f || h == fo(t, f, 1) : 1 >= h - f) {
                var y = p > n || m - n >= n - p ? f : h,
                    b = y == f ? g : v,
                    w = n - (y == f ? p : m);
                if (v && !u && !/\s/.test(t.text.charAt(y)) && w > 0 && y < t.text.length && c.view.measure.heights.length > 1) {
                    var x = tt(e, c, y, "right");
                    a <= x.bottom && a >= x.top && Math.abs(n - x.right) < w && (b = !1, y++, w = n - x.right)
                }
                for (; ji(t.text.charAt(y));) ++y;
                var k = gt(r, y, b, -1 > w ? -1 : w > 1 ? 1 : 0);
                return k
            }
            var C = Math.ceil(d / 2),
                S = f + C;
            if (u) {
                S = f;
                for (var L = 0; C > L; ++L) S = fo(t, S, 1)
            }
            var M = o(S);
            M > n ? (h = S, m = M, (v = l) && (m += 1e3), d = C) : (f = S, p = M, g = l, d -= C)
        }
    }

    function yt(e) {
        if (null != e.cachedTextHeight) return e.cachedTextHeight;
        if (null == jo) {
            jo = Ki("pre");
            for (var t = 0; 49 > t; ++t) jo.appendChild(document.createTextNode("x")), jo.appendChild(Ki("br"));
            jo.appendChild(document.createTextNode("x"))
        }
        Ui(e.measure, jo);
        var r = jo.offsetHeight / 50;
        return r > 3 && (e.cachedTextHeight = r), Vi(e.measure), r || 1
    }

    function bt(e) {
        if (null != e.cachedCharWidth) return e.cachedCharWidth;
        var t = Ki("span", "xxxxxxxxxx"),
            r = Ki("pre", [t]);
        Ui(e.measure, r);
        var n = t.getBoundingClientRect(),
            i = (n.right - n.left) / 10;
        return i > 2 && (e.cachedCharWidth = i), i || 10
    }

    function wt(e) {
        e.curOp = {
            cm: e,
            viewChanged: !1,
            startHeight: e.doc.height,
            forceUpdate: !1,
            updateInput: null,
            typing: !1,
            changeObjs: null,
            cursorActivityHandlers: null,
            cursorActivityCalled: 0,
            selectionChanged: !1,
            updateMaxLine: !1,
            scrollLeft: null,
            scrollTop: null,
            scrollToPos: null,
            focus: !1,
            id: ++qo
        }, Go ? Go.ops.push(e.curOp) : e.curOp.ownsGroup = Go = {
            ops: [e.curOp],
            delayedCallbacks: []
        }
    }

    function xt(e) {
        var t = e.delayedCallbacks,
            r = 0;
        do {
            for (; r < t.length; r++) t[r].call(null);
            for (var n = 0; n < e.ops.length; n++) {
                var i = e.ops[n];
                if (i.cursorActivityHandlers)
                    for (; i.cursorActivityCalled < i.cursorActivityHandlers.length;) i.cursorActivityHandlers[i.cursorActivityCalled++].call(null, i.cm)
            }
        } while (r < t.length)
    }

    function kt(e) {
        var t = e.curOp,
            r = t.ownsGroup;
        if (r) try {
            xt(r)
        } finally {
            Go = null;
            for (var n = 0; n < r.ops.length; n++) r.ops[n].cm.curOp = null;
            Ct(r)
        }
    }

    function Ct(e) {
        for (var t = e.ops, r = 0; r < t.length; r++) St(t[r]);
        for (var r = 0; r < t.length; r++) Lt(t[r]);
        for (var r = 0; r < t.length; r++) Mt(t[r]);
        for (var r = 0; r < t.length; r++) Tt(t[r]);
        for (var r = 0; r < t.length; r++) At(t[r])
    }

    function St(e) {
        var t = e.cm,
            r = t.display;
        M(t), e.updateMaxLine && f(t), e.mustUpdate = e.viewChanged || e.forceUpdate || null != e.scrollTop || e.scrollToPos && (e.scrollToPos.from.line < r.viewFrom || e.scrollToPos.to.line >= r.viewTo) || r.maxLineChanged && t.options.lineWrapping, e.update = e.mustUpdate && new L(t, e.mustUpdate && {
            top: e.scrollTop,
            ensure: e.scrollToPos
        }, e.forceUpdate)
    }

    function Lt(e) {
        e.updatedDisplay = e.mustUpdate && T(e.cm, e.update)
    }

    function Mt(e) {
        var t = e.cm,
            r = t.display;
        e.updatedDisplay && W(t), e.barMeasure = p(t), r.maxLineChanged && !t.options.lineWrapping && (e.adjustWidthTo = Qe(t, r.maxLine, r.maxLine.text.length).left + 3, t.display.sizerWidth = e.adjustWidthTo, e.barMeasure.scrollWidth = Math.max(r.scroller.clientWidth, r.sizer.offsetLeft + e.adjustWidthTo + qe(t) + t.display.barWidth), e.maxScrollLeft = Math.max(0, r.sizer.offsetLeft + e.adjustWidthTo - _e(t))), (e.updatedDisplay || e.selectionChanged) && (e.preparedSelection = r.input.prepareSelection(e.focus))
    }

    function Tt(e) {
        var t = e.cm;
        null != e.adjustWidthTo && (t.display.sizer.style.minWidth = e.adjustWidthTo + "px", e.maxScrollLeft < t.doc.scrollLeft && ir(t, Math.min(t.display.scroller.scrollLeft, e.maxScrollLeft), !0), t.display.maxLineChanged = !1);
        var r = e.focus && e.focus == Gi() && (!document.hasFocus || document.hasFocus());
        e.preparedSelection && t.display.input.showSelection(e.preparedSelection, r), (e.updatedDisplay || e.startHeight != t.doc.height) && y(t, e.barMeasure), e.updatedDisplay && N(t, e.barMeasure), e.selectionChanged && Fe(t), t.state.focused && e.updateInput && t.display.input.reset(e.typing), r && Y(e.cm)
    }

    function At(e) {
        var t = e.cm,
            r = t.display,
            n = t.doc;
        if (e.updatedDisplay && A(t, e.update), null == r.wheelStartX || null == e.scrollTop && null == e.scrollLeft && !e.scrollToPos || (r.wheelStartX = r.wheelStartY = null), null == e.scrollTop || r.scroller.scrollTop == e.scrollTop && !e.forceScroll || (n.scrollTop = Math.max(0, Math.min(r.scroller.scrollHeight - r.scroller.clientHeight, e.scrollTop)), r.scrollbars.setScrollTop(n.scrollTop), r.scroller.scrollTop = n.scrollTop), null == e.scrollLeft || r.scroller.scrollLeft == e.scrollLeft && !e.forceScroll || (n.scrollLeft = Math.max(0, Math.min(r.scroller.scrollWidth - r.scroller.clientWidth, e.scrollLeft)), r.scrollbars.setScrollLeft(n.scrollLeft), r.scroller.scrollLeft = n.scrollLeft, x(t)), e.scrollToPos) {
            var i = zr(t, ge(n, e.scrollToPos.from), ge(n, e.scrollToPos.to), e.scrollToPos.margin);
            e.scrollToPos.isCursor && t.state.focused && Hr(t, i)
        }
        var o = e.maybeHiddenMarkers,
            a = e.maybeUnhiddenMarkers;
        if (o)
            for (var l = 0; l < o.length; ++l) o[l].lines.length || za(o[l], "hide");
        if (a)
            for (var l = 0; l < a.length; ++l) a[l].lines.length && za(a[l], "unhide");
        r.wrapper.offsetHeight && (n.scrollTop = t.display.scroller.scrollTop), e.changeObjs && za(t, "changes", t, e.changeObjs), e.update && e.update.finish()
    }

    function Ot(e, t) {
        if (e.curOp) return t();
        wt(e);
        try {
            return t()
        } finally {
            kt(e)
        }
    }

    function Nt(e, t) {
        return function () {
            if (e.curOp) return t.apply(e, arguments);
            wt(e);
            try {
                return t.apply(e, arguments)
            } finally {
                kt(e)
            }
        }
    }

    function Wt(e) {
        return function () {
            if (this.curOp) return e.apply(this, arguments);
            wt(this);
            try {
                return e.apply(this, arguments)
            } finally {
                kt(this)
            }
        }
    }

    function Ht(e) {
        return function () {
            var t = this.cm;
            if (!t || t.curOp) return e.apply(this, arguments);
            wt(t);
            try {
                return e.apply(this, arguments)
            } finally {
                kt(t)
            }
        }
    }

    function zt(e, t, r) {
        this.line = t, this.rest = bn(t), this.size = this.rest ? ti(Hi(this.rest)) - r + 1 : 1, this.node = this.text = null, this.hidden = kn(e, t)
    }

    function Dt(e, t, r) {
        for (var n, i = [], o = t; r > o; o = n) {
            var a = new zt(e.doc, Zn(e.doc, o), o);
            n = o + a.size, i.push(a)
        }
        return i
    }

    function Pt(e, t, r, n) {
        null == t && (t = e.doc.first), null == r && (r = e.doc.first + e.doc.size), n || (n = 0);
        var i = e.display;
        if (n && r < i.viewTo && (null == i.updateLineNumbers || i.updateLineNumbers > t) && (i.updateLineNumbers = t), e.curOp.viewChanged = !0, t >= i.viewTo) Io && wn(e.doc, t) < i.viewTo && It(e);
        else if (r <= i.viewFrom) Io && xn(e.doc, r + n) > i.viewFrom ? It(e) : (i.viewFrom += n, i.viewTo += n);
        else if (t <= i.viewFrom && r >= i.viewTo) It(e);
        else if (t <= i.viewFrom) {
            var o = Bt(e, r, r + n, 1);
            o ? (i.view = i.view.slice(o.index), i.viewFrom = o.lineN, i.viewTo += n) : It(e)
        } else if (r >= i.viewTo) {
            var o = Bt(e, t, t, -1);
            o ? (i.view = i.view.slice(0, o.index), i.viewTo = o.lineN) : It(e)
        } else {
            var a = Bt(e, t, t, -1),
                l = Bt(e, r, r + n, 1);
            a && l ? (i.view = i.view.slice(0, a.index).concat(Dt(e, a.lineN, l.lineN)).concat(i.view.slice(l.index)), i.viewTo += n) : It(e)
        }
        var s = i.externalMeasured;
        s && (r < s.lineN ? s.lineN += n : t < s.lineN + s.size && (i.externalMeasured = null))
    }

    function Et(e, t, r) {
        e.curOp.viewChanged = !0;
        var n = e.display,
            i = e.display.externalMeasured;
        if (i && t >= i.lineN && t < i.lineN + i.size && (n.externalMeasured = null), !(t < n.viewFrom || t >= n.viewTo)) {
            var o = n.view[Ft(e, t)];
            if (null != o.node) {
                var a = o.changes || (o.changes = []); - 1 == zi(a, r) && a.push(r)
            }
        }
    }

    function It(e) {
        e.display.viewFrom = e.display.viewTo = e.doc.first, e.display.view = [], e.display.viewOffset = 0
    }

    function Ft(e, t) {
        if (t >= e.display.viewTo) return null;
        if (t -= e.display.viewFrom, 0 > t) return null;
        for (var r = e.display.view, n = 0; n < r.length; n++)
            if (t -= r[n].size, 0 > t) return n
    }

    function Bt(e, t, r, n) {
        var i, o = Ft(e, t),
            a = e.display.view;
        if (!Io || r == e.doc.first + e.doc.size) return {
            index: o,
            lineN: r
        };
        for (var l = 0, s = e.display.viewFrom; o > l; l++) s += a[l].size;
        if (s != t) {
            if (n > 0) {
                if (o == a.length - 1) return null;
                i = s + a[o].size - t, o++
            } else i = s - t;
            t += i, r += i
        }
        for (; wn(e.doc, r) != r;) {
            if (o == (0 > n ? 0 : a.length - 1)) return null;
            r += n * a[o - (0 > n ? 1 : 0)].size, o += n
        }
        return {
            index: o,
            lineN: r
        }
    }

    function Rt(e, t, r) {
        var n = e.display,
            i = n.view;
        0 == i.length || t >= n.viewTo || r <= n.viewFrom ? (n.view = Dt(e, t, r), n.viewFrom = t) : (n.viewFrom > t ? n.view = Dt(e, t, n.viewFrom).concat(n.view) : n.viewFrom < t && (n.view = n.view.slice(Ft(e, t))), n.viewFrom = t, n.viewTo < r ? n.view = n.view.concat(Dt(e, n.viewTo, r)) : n.viewTo > r && (n.view = n.view.slice(0, Ft(e, r)))), n.viewTo = r
    }

    function jt(e) {
        for (var t = e.display.view, r = 0, n = 0; n < t.length; n++) {
            var i = t[n];
            i.hidden || i.node && !i.changes || ++r
        }
        return r
    }

    function Kt(e) {
        function t() {
            i.activeTouch && (o = setTimeout(function () {
                i.activeTouch = null
            }, 1e3), a = i.activeTouch, a.end = +new Date)
        }

        function r(e) {
            if (1 != e.touches.length) return !1;
            var t = e.touches[0];
            return t.radiusX <= 1 && t.radiusY <= 1
        }

        function n(e, t) {
            if (null == t.left) return !0;
            var r = t.left - e.left,
                n = t.top - e.top;
            return r * r + n * n > 400
        }
        var i = e.display;
        Na(i.scroller, "mousedown", Nt(e, _t)), bo && 11 > wo ? Na(i.scroller, "dblclick", Nt(e, function (t) {
            if (!Mi(e, t)) {
                var r = qt(e, t);
                if (r && !Qt(e, t) && !Gt(e.display, t)) {
                    Ta(t);
                    var n = e.findWordAt(r);
                    we(e.doc, n.anchor, n.head)
                }
            }
        })) : Na(i.scroller, "dblclick", function (t) {
            Mi(e, t) || Ta(t)
        }), Po || Na(i.scroller, "contextmenu", function (t) {
            yr(e, t)
        });
        var o, a = {
            end: 0
        };
        Na(i.scroller, "touchstart", function (t) {
            if (!Mi(e, t) && !r(t)) {
                clearTimeout(o);
                var n = +new Date;
                i.activeTouch = {
                    start: n,
                    moved: !1,
                    prev: n - a.end <= 300 ? a : null
                }, 1 == t.touches.length && (i.activeTouch.left = t.touches[0].pageX, i.activeTouch.top = t.touches[0].pageY)
            }
        }), Na(i.scroller, "touchmove", function () {
            i.activeTouch && (i.activeTouch.moved = !0)
        }), Na(i.scroller, "touchend", function (r) {
            var o = i.activeTouch;
            if (o && !Gt(i, r) && null != o.left && !o.moved && new Date - o.start < 300) {
                var a, l = e.coordsChar(i.activeTouch, "page");
                a = !o.prev || n(o, o.prev) ? new de(l, l) : !o.prev.prev || n(o, o.prev.prev) ? e.findWordAt(l) : new de(Fo(l.line, 0), ge(e.doc, Fo(l.line + 1, 0))), e.setSelection(a.anchor, a.head), e.focus(), Ta(r)
            }
            t()
        }), Na(i.scroller, "touchcancel", t), Na(i.scroller, "scroll", function () {
            i.scroller.clientHeight && (nr(e, i.scroller.scrollTop), ir(e, i.scroller.scrollLeft, !0), za(e, "scroll", e))
        }), Na(i.scroller, "mousewheel", function (t) {
            or(e, t)
        }), Na(i.scroller, "DOMMouseScroll", function (t) {
            or(e, t)
        }), Na(i.wrapper, "scroll", function () {
            i.wrapper.scrollTop = i.wrapper.scrollLeft = 0
        }), i.dragFunctions = {
            enter: function (t) {
                Mi(e, t) || Oa(t)
            },
            over: function (t) {
                Mi(e, t) || (tr(e, t), Oa(t))
            },
            start: function (t) {
                er(e, t)
            },
            drop: Nt(e, Jt),
            leave: function (t) {
                Mi(e, t) || rr(e)
            }
        };
        var l = i.input.getField();
        Na(l, "keyup", function (t) {
            hr.call(e, t)
        }), Na(l, "keydown", Nt(e, dr)), Na(l, "keypress", Nt(e, pr)), Na(l, "focus", Fi(mr, e)), Na(l, "blur", Fi(vr, e))
    }

    function Vt(t, r, n) {
        var i = n && n != e.Init;
        if (!r != !i) {
            var o = t.display.dragFunctions,
                a = r ? Na : Ha;
            a(t.display.scroller, "dragstart", o.start), a(t.display.scroller, "dragenter", o.enter), a(t.display.scroller, "dragover", o.over), a(t.display.scroller, "dragleave", o.leave), a(t.display.scroller, "drop", o.drop)
        }
    }

    function Ut(e) {
        var t = e.display;
        (t.lastWrapHeight != t.wrapper.clientHeight || t.lastWrapWidth != t.wrapper.clientWidth) && (t.cachedCharWidth = t.cachedTextHeight = t.cachedPaddingH = null, t.scrollbarsClipped = !1, e.setSize())
    }

    function Gt(e, t) {
        for (var r = xi(t); r != e.wrapper; r = r.parentNode)
            if (!r || 1 == r.nodeType && "true" == r.getAttribute("cm-ignore-events") || r.parentNode == e.sizer && r != e.mover) return !0
    }

    function qt(e, t, r, n) {
        var i = e.display;
        if (!r && "true" == xi(t).getAttribute("cm-not-content")) return null;
        var o, a, l = i.lineSpace.getBoundingClientRect();
        try {
            o = t.clientX - l.left, a = t.clientY - l.top
        } catch (t) {
            return null
        }
        var s, c = mt(e, o, a);
        if (n && 1 == c.xRel && (s = Zn(e.doc, c.line).text).length == c.ch) {
            var u = Ra(s, s.length, e.options.tabSize) - s.length;
            c = Fo(c.line, Math.max(0, Math.round((o - Ge(e.display).left) / bt(e.display)) - u))
        }
        return c
    }

    function _t(e) {
        var t = this,
            r = t.display;
        if (!(Mi(t, e) || r.activeTouch && r.input.supportsTouch())) {
            if (r.shift = e.shiftKey, Gt(r, e)) return void(xo || (r.scroller.draggable = !1, setTimeout(function () {
                r.scroller.draggable = !0
            }, 100)));
            if (!Qt(t, e)) {
                var n = qt(t, e);
                switch (window.focus(), ki(e)) {
                    case 1:
                        t.state.selectingText ? t.state.selectingText(e) : n ? $t(t, e, n) : xi(e) == r.scroller && Ta(e);
                        break;
                    case 2:
                        xo && (t.state.lastMiddleDown = +new Date), n && we(t.doc, n), setTimeout(function () {
                            r.input.focus()
                        }, 20), Ta(e);
                        break;
                    case 3:
                        Po ? yr(t, e) : gr(t)
                }
            }
        }
    }

    function $t(e, t, r) {
        bo ? setTimeout(Fi(Y, e), 0) : e.curOp.focus = Gi();
        var n, i = +new Date;
        Vo && Vo.time > i - 400 && 0 == Bo(Vo.pos, r) ? n = "triple" : Ko && Ko.time > i - 400 && 0 == Bo(Ko.pos, r) ? (n = "double", Vo = {
            time: i,
            pos: r
        }) : (n = "single", Ko = {
            time: i,
            pos: r
        });
        var o, a = e.doc.sel,
            l = No ? t.metaKey : t.ctrlKey;
        e.options.dragDrop && el && !e.isReadOnly() && "single" == n && (o = a.contains(r)) > -1 && (Bo((o = a.ranges[o]).from(), r) < 0 || r.xRel > 0) && (Bo(o.to(), r) > 0 || r.xRel < 0) ? Xt(e, t, r, l) : Yt(e, t, r, n, l)
    }

    function Xt(e, t, r, n) {
        var i = e.display,
            o = +new Date,
            a = Nt(e, function (l) {
                xo && (i.scroller.draggable = !1), e.state.draggingText = !1, Ha(document, "mouseup", a), Ha(i.scroller, "drop", a), Math.abs(t.clientX - l.clientX) + Math.abs(t.clientY - l.clientY) < 10 && (Ta(l), !n && +new Date - 200 < o && we(e.doc, r), xo || bo && 9 == wo ? setTimeout(function () {
                    document.body.focus(), i.input.focus()
                }, 20) : i.input.focus())
            });
        xo && (i.scroller.draggable = !0), e.state.draggingText = a, a.copy = No ? t.altKey : t.ctrlKey, i.scroller.dragDrop && i.scroller.dragDrop(), Na(document, "mouseup", a), Na(i.scroller, "drop", a)
    }

    function Yt(e, t, r, n, i) {
        function o(t) {
            if (0 != Bo(m, t))
                if (m = t, "rect" == n) {
                    for (var i = [], o = e.options.tabSize, a = Ra(Zn(c, r.line).text, r.ch, o), l = Ra(Zn(c, t.line).text, t.ch, o), s = Math.min(a, l), h = Math.max(a, l), p = Math.min(r.line, t.line), g = Math.min(e.lastLine(), Math.max(r.line, t.line)); g >= p; p++) {
                        var v = Zn(c, p).text,
                            y = ja(v, s, o);
                        s == h ? i.push(new de(Fo(p, y), Fo(p, y))) : v.length > y && i.push(new de(Fo(p, y), Fo(p, ja(v, h, o))))
                    }
                    i.length || i.push(new de(r, r)), Me(c, fe(f.ranges.slice(0, d).concat(i), d), {
                        origin: "*mouse",
                        scroll: !1
                    }), e.scrollIntoView(t)
                } else {
                    var b = u,
                        w = b.anchor,
                        x = t;
                    if ("single" != n) {
                        if ("double" == n) var k = e.findWordAt(t);
                        else var k = new de(Fo(t.line, 0), ge(c, Fo(t.line + 1, 0)));
                        Bo(k.anchor, w) > 0 ? (x = k.head, w = X(b.from(), k.anchor)) : (x = k.anchor, w = $(b.to(), k.head))
                    }
                    var i = f.ranges.slice(0);
                    i[d] = new de(ge(c, w), x), Me(c, fe(i, d), Fa)
                }
        }

        function a(t) {
            var r = ++y,
                i = qt(e, t, !0, "rect" == n);
            if (i)
                if (0 != Bo(i, m)) {
                    e.curOp.focus = Gi(), o(i);
                    var l = w(s, c);
                    (i.line >= l.to || i.line < l.from) && setTimeout(Nt(e, function () {
                        y == r && a(t)
                    }), 150)
                } else {
                    var u = t.clientY < v.top ? -20 : t.clientY > v.bottom ? 20 : 0;
                    u && setTimeout(Nt(e, function () {
                        y == r && (s.scroller.scrollTop += u, a(t))
                    }), 50)
                }
        }

        function l(t) {
            e.state.selectingText = !1, y = 1 / 0, Ta(t), s.input.focus(), Ha(document, "mousemove", b), Ha(document, "mouseup", x), c.history.lastSelOrigin = null
        }
        var s = e.display,
            c = e.doc;
        Ta(t);
        var u, d, f = c.sel,
            h = f.ranges;
        if (i && !t.shiftKey ? (d = c.sel.contains(r), u = d > -1 ? h[d] : new de(r, r)) : (u = c.sel.primary(), d = c.sel.primIndex), Wo ? t.shiftKey && t.metaKey : t.altKey) n = "rect", i || (u = new de(r, r)), r = qt(e, t, !0, !0), d = -1;
        else if ("double" == n) {
            var p = e.findWordAt(r);
            u = e.display.shift || c.extend ? be(c, u, p.anchor, p.head) : p
        } else if ("triple" == n) {
            var g = new de(Fo(r.line, 0), ge(c, Fo(r.line + 1, 0)));
            u = e.display.shift || c.extend ? be(c, u, g.anchor, g.head) : g
        } else u = be(c, u, r);
        i ? -1 == d ? (d = h.length, Me(c, fe(h.concat([u]), d), {
            scroll: !1,
            origin: "*mouse"
        })) : h.length > 1 && h[d].empty() && "single" == n && !t.shiftKey ? (Me(c, fe(h.slice(0, d).concat(h.slice(d + 1)), 0), {
            scroll: !1,
            origin: "*mouse"
        }), f = c.sel) : ke(c, d, u, Fa) : (d = 0, Me(c, new ue([u], 0), Fa), f = c.sel);
        var m = r,
            v = s.wrapper.getBoundingClientRect(),
            y = 0,
            b = Nt(e, function (e) {
                ki(e) ? a(e) : l(e)
            }),
            x = Nt(e, l);
        e.state.selectingText = x, Na(document, "mousemove", b), Na(document, "mouseup", x)
    }

    function Zt(e, t, r, n) {
        try {
            var i = t.clientX,
                o = t.clientY
        } catch (t) {
            return !1
        }
        if (i >= Math.floor(e.display.gutters.getBoundingClientRect().right)) return !1;
        n && Ta(t);
        var a = e.display,
            l = a.lineDiv.getBoundingClientRect();
        if (o > l.bottom || !Ai(e, r)) return wi(t);
        o -= l.top - a.viewOffset;
        for (var s = 0; s < e.options.gutters.length; ++s) {
            var c = a.gutters.childNodes[s];
            if (c && c.getBoundingClientRect().right >= i) {
                var u = ri(e.doc, o),
                    d = e.options.gutters[s];
                return za(e, r, e, u, d, t), wi(t)
            }
        }
    }

    function Qt(e, t) {
        return Zt(e, t, "gutterClick", !0)
    }

    function Jt(e) {
        var t = this;
        if (rr(t), !Mi(t, e) && !Gt(t.display, e)) {
            Ta(e), bo && (_o = +new Date);
            var r = qt(t, e, !0),
                n = e.dataTransfer.files;
            if (r && !t.isReadOnly())
                if (n && n.length && window.FileReader && window.File)
                    for (var i = n.length, o = Array(i), a = 0, l = function (e, n) {
                            if (!t.options.allowDropFileTypes || -1 != zi(t.options.allowDropFileTypes, e.type)) {
                                var l = new FileReader;
                                l.onload = Nt(t, function () {
                                    var e = l.result;
                                    if (/[\x00-\x08\x0e-\x1f]{2}/.test(e) && (e = ""), o[n] = e, ++a == i) {
                                        r = ge(t.doc, r);
                                        var s = {
                                            from: r,
                                            to: r,
                                            text: t.doc.splitLines(o.join(t.doc.lineSeparator())),
                                            origin: "paste"
                                        };
                                        Lr(t.doc, s), Le(t.doc, he(r, Jo(s)))
                                    }
                                }), l.readAsText(e)
                            }
                        }, s = 0; i > s; ++s) l(n[s], s);
                else {
                    if (t.state.draggingText && t.doc.sel.contains(r) > -1) return t.state.draggingText(e), void setTimeout(function () {
                        t.display.input.focus()
                    }, 20);
                    try {
                        var o = e.dataTransfer.getData("Text");
                        if (o) {
                            if (t.state.draggingText && !t.state.draggingText.copy) var c = t.listSelections();
                            if (Te(t.doc, he(r, r)), c)
                                for (var s = 0; s < c.length; ++s) Wr(t.doc, "", c[s].anchor, c[s].head, "drag");
                            t.replaceSelection(o, "around", "paste"), t.display.input.focus()
                        }
                    } catch (e) {}
                }
        }
    }

    function er(e, t) {
        if (bo && (!e.state.draggingText || +new Date - _o < 100)) return void Oa(t);
        if (!Mi(e, t) && !Gt(e.display, t) && (t.dataTransfer.setData("Text", e.getSelection()), t.dataTransfer.effectAllowed = "copyMove", t.dataTransfer.setDragImage && !Lo)) {
            var r = Ki("img", null, null, "position: fixed; left: 0; top: 0;");
            r.src = "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==", So && (r.width = r.height = 1, e.display.wrapper.appendChild(r), r._top = r.offsetTop), t.dataTransfer.setDragImage(r, 0, 0), So && r.parentNode.removeChild(r)
        }
    }

    function tr(e, t) {
        var r = qt(e, t);
        if (r) {
            var n = document.createDocumentFragment();
            Ee(e, r, n), e.display.dragCursor || (e.display.dragCursor = Ki("div", null, "CodeMirror-cursors CodeMirror-dragcursors"), e.display.lineSpace.insertBefore(e.display.dragCursor, e.display.cursorDiv)), Ui(e.display.dragCursor, n)
        }
    }

    function rr(e) {
        e.display.dragCursor && (e.display.lineSpace.removeChild(e.display.dragCursor), e.display.dragCursor = null)
    }

    function nr(e, t) {
        Math.abs(e.doc.scrollTop - t) < 2 || (e.doc.scrollTop = t, mo || O(e, {
            top: t
        }), e.display.scroller.scrollTop != t && (e.display.scroller.scrollTop = t), e.display.scrollbars.setScrollTop(t), mo && O(e), Be(e, 100))
    }

    function ir(e, t, r) {
        (r ? t == e.doc.scrollLeft : Math.abs(e.doc.scrollLeft - t) < 2) || (t = Math.min(t, e.display.scroller.scrollWidth - e.display.scroller.clientWidth), e.doc.scrollLeft = t, x(e), e.display.scroller.scrollLeft != t && (e.display.scroller.scrollLeft = t), e.display.scrollbars.setScrollLeft(t))
    }

    function or(e, t) {
        var r = Yo(t),
            n = r.x,
            i = r.y,
            o = e.display,
            a = o.scroller,
            l = a.scrollWidth > a.clientWidth,
            s = a.scrollHeight > a.clientHeight;
        if (n && l || i && s) {
            if (i && No && xo) e: for (var c = t.target, u = o.view; c != a; c = c.parentNode)
                for (var d = 0; d < u.length; d++)
                    if (u[d].node == c) {
                        e.display.currentWheelTarget = c;
                        break e
                    } if (n && !mo && !So && null != Xo) return i && s && nr(e, Math.max(0, Math.min(a.scrollTop + i * Xo, a.scrollHeight - a.clientHeight))), ir(e, Math.max(0, Math.min(a.scrollLeft + n * Xo, a.scrollWidth - a.clientWidth))), (!i || i && s) && Ta(t), void(o.wheelStartX = null);
            if (i && null != Xo) {
                var f = i * Xo,
                    h = e.doc.scrollTop,
                    p = h + o.wrapper.clientHeight;
                0 > f ? h = Math.max(0, h + f - 50) : p = Math.min(e.doc.height, p + f + 50), O(e, {
                    top: h,
                    bottom: p
                })
            }
            20 > $o && (null == o.wheelStartX ? (o.wheelStartX = a.scrollLeft, o.wheelStartY = a.scrollTop, o.wheelDX = n, o.wheelDY = i, setTimeout(function () {
                if (null != o.wheelStartX) {
                    var e = a.scrollLeft - o.wheelStartX,
                        t = a.scrollTop - o.wheelStartY,
                        r = t && o.wheelDY && t / o.wheelDY || e && o.wheelDX && e / o.wheelDX;
                    o.wheelStartX = o.wheelStartY = null, r && (Xo = (Xo * $o + r) / ($o + 1), ++$o)
                }
            }, 200)) : (o.wheelDX += n, o.wheelDY += i))
        }
    }

    function ar(e, t, r) {
        if ("string" == typeof t && (t = ua[t], !t)) return !1;
        e.display.input.ensurePolled();
        var n = e.display.shift,
            i = !1;
        try {
            e.isReadOnly() && (e.state.suppressEdits = !0), r && (e.display.shift = !1), i = t(e) != Ea
        } finally {
            e.display.shift = n, e.state.suppressEdits = !1
        }
        return i
    }

    function lr(e, t, r) {
        for (var n = 0; n < e.state.keyMaps.length; n++) {
            var i = fa(t, e.state.keyMaps[n], r, e);
            if (i) return i
        }
        return e.options.extraKeys && fa(t, e.options.extraKeys, r, e) || fa(t, e.options.keyMap, r, e)
    }

    function sr(e, t, r, n) {
        var i = e.state.keySeq;
        if (i) {
            if (ha(t)) return "handled";
            Zo.set(50, function () {
                e.state.keySeq == i && (e.state.keySeq = null, e.display.input.reset())
            }), t = i + " " + t
        }
        var o = lr(e, t, n);
        return "multi" == o && (e.state.keySeq = t), "handled" == o && Si(e, "keyHandled", e, t, r), ("handled" == o || "multi" == o) && (Ta(r), Fe(e)), i && !o && /\'$/.test(t) ? (Ta(r), !0) : !!o
    }

    function cr(e, t) {
        var r = pa(t, !0);
        return r ? t.shiftKey && !e.state.keySeq ? sr(e, "Shift-" + r, t, function (t) {
            return ar(e, t, !0)
        }) || sr(e, r, t, function (t) {
            return ("string" == typeof t ? /^go[A-Z]/.test(t) : t.motion) ? ar(e, t) : void 0
        }) : sr(e, r, t, function (t) {
            return ar(e, t)
        }) : !1
    }

    function ur(e, t, r) {
        return sr(e, "'" + r + "'", t, function (t) {
            return ar(e, t, !0)
        })
    }

    function dr(e) {
        var t = this;
        if (t.curOp.focus = Gi(), !Mi(t, e)) {
            bo && 11 > wo && 27 == e.keyCode && (e.returnValue = !1);
            var r = e.keyCode;
            t.display.shift = 16 == r || e.shiftKey;
            var n = cr(t, e);
            So && (Qo = n ? r : null, !n && 88 == r && !nl && (No ? e.metaKey : e.ctrlKey) && t.replaceSelection("", null, "cut")), 18 != r || /\bCodeMirror-crosshair\b/.test(t.display.lineDiv.className) || fr(t)
        }
    }

    function fr(e) {
        function t(e) {
            18 != e.keyCode && e.altKey || (Za(r, "CodeMirror-crosshair"), Ha(document, "keyup", t), Ha(document, "mouseover", t))
        }
        var r = e.display.lineDiv;
        Qa(r, "CodeMirror-crosshair"), Na(document, "keyup", t), Na(document, "mouseover", t)
    }

    function hr(e) {
        16 == e.keyCode && (this.doc.sel.shift = !1), Mi(this, e)
    }

    function pr(e) {
        var t = this;
        if (!(Gt(t.display, e) || Mi(t, e) || e.ctrlKey && !e.altKey || No && e.metaKey)) {
            var r = e.keyCode,
                n = e.charCode;
            if (So && r == Qo) return Qo = null, void Ta(e);
            if (!So || e.which && !(e.which < 10) || !cr(t, e)) {
                var i = String.fromCharCode(null == n ? r : n);
                ur(t, e, i) || t.display.input.onKeyPress(e)
            }
        }
    }

    function gr(e) {
        e.state.delayingBlurEvent = !0, setTimeout(function () {
            e.state.delayingBlurEvent && (e.state.delayingBlurEvent = !1, vr(e))
        }, 100)
    }

    function mr(e) {
        e.state.delayingBlurEvent && (e.state.delayingBlurEvent = !1), "nocursor" != e.options.readOnly && (e.state.focused || (za(e, "focus", e), e.state.focused = !0, Qa(e.display.wrapper, "CodeMirror-focused"), e.curOp || e.display.selForContextMenu == e.doc.sel || (e.display.input.reset(), xo && setTimeout(function () {
            e.display.input.reset(!0)
        }, 20)), e.display.input.receivedFocus()), Fe(e))
    }

    function vr(e) {
        e.state.delayingBlurEvent || (e.state.focused && (za(e, "blur", e), e.state.focused = !1, Za(e.display.wrapper, "CodeMirror-focused")), clearInterval(e.display.blinker), setTimeout(function () {
            e.state.focused || (e.display.shift = !1)
        }, 150))
    }

    function yr(e, t) {
        Gt(e.display, t) || br(e, t) || Mi(e, t, "contextmenu") || e.display.input.onContextMenu(t)
    }

    function br(e, t) {
        return Ai(e, "gutterContextMenu") ? Zt(e, t, "gutterContextMenu", !1) : !1
    }

    function wr(e, t) {
        if (Bo(e, t.from) < 0) return e;
        if (Bo(e, t.to) <= 0) return Jo(t);
        var r = e.line + t.text.length - (t.to.line - t.from.line) - 1,
            n = e.ch;
        return e.line == t.to.line && (n += Jo(t).ch - t.to.ch), Fo(r, n)
    }

    function xr(e, t) {
        for (var r = [], n = 0; n < e.sel.ranges.length; n++) {
            var i = e.sel.ranges[n];
            r.push(new de(wr(i.anchor, t), wr(i.head, t)))
        }
        return fe(r, e.sel.primIndex)
    }

    function kr(e, t, r) {
        return e.line == t.line ? Fo(r.line, e.ch - t.ch + r.ch) : Fo(r.line + (e.line - t.line), e.ch)
    }

    function Cr(e, t, r) {
        for (var n = [], i = Fo(e.first, 0), o = i, a = 0; a < t.length; a++) {
            var l = t[a],
                s = kr(l.from, i, o),
                c = kr(Jo(l), i, o);
            if (i = l.to, o = c, "around" == r) {
                var u = e.sel.ranges[a],
                    d = Bo(u.head, u.anchor) < 0;
                n[a] = new de(d ? c : s, d ? s : c)
            } else n[a] = new de(s, s)
        }
        return new ue(n, e.sel.primIndex)
    }

    function Sr(e, t, r) {
        var n = {
            canceled: !1,
            from: t.from,
            to: t.to,
            text: t.text,
            origin: t.origin,
            cancel: function () {
                this.canceled = !0
            }
        };
        return r && (n.update = function (t, r, n, i) {
            t && (this.from = ge(e, t)), r && (this.to = ge(e, r)), n && (this.text = n), void 0 !== i && (this.origin = i)
        }), za(e, "beforeChange", e, n), e.cm && za(e.cm, "beforeChange", e.cm, n), n.canceled ? null : {
            from: n.from,
            to: n.to,
            text: n.text,
            origin: n.origin
        }
    }

    function Lr(e, t, r) {
        if (e.cm) {
            if (!e.cm.curOp) return Nt(e.cm, Lr)(e, t, r);
            if (e.cm.state.suppressEdits) return
        }
        if (!(Ai(e, "beforeChange") || e.cm && Ai(e.cm, "beforeChange")) || (t = Sr(e, t, !0))) {
            var n = Eo && !r && sn(e, t.from, t.to);
            if (n)
                for (var i = n.length - 1; i >= 0; --i) Mr(e, {
                    from: n[i].from,
                    to: n[i].to,
                    text: i ? [""] : t.text
                });
            else Mr(e, t)
        }
    }

    function Mr(e, t) {
        if (1 != t.text.length || "" != t.text[0] || 0 != Bo(t.from, t.to)) {
            var r = xr(e, t);
            ci(e, t, r, e.cm ? e.cm.curOp.id : NaN), Or(e, t, r, on(e, t));
            var n = [];
            Xn(e, function (e, r) {
                r || -1 != zi(n, e.history) || (bi(e.history, t), n.push(e.history)), Or(e, t, null, on(e, t))
            })
        }
    }

    function Tr(e, t, r) {
        if (!e.cm || !e.cm.state.suppressEdits) {
            for (var n, i = e.history, o = e.sel, a = "undo" == t ? i.done : i.undone, l = "undo" == t ? i.undone : i.done, s = 0; s < a.length && (n = a[s], r ? !n.ranges || n.equals(e.sel) : n.ranges); s++);
            if (s != a.length) {
                for (i.lastOrigin = i.lastSelOrigin = null; n = a.pop(), n.ranges;) {
                    if (fi(n, l), r && !n.equals(e.sel)) return void Me(e, n, {
                        clearRedo: !1
                    });
                    o = n
                }
                var c = [];
                fi(o, l), l.push({
                    changes: c,
                    generation: i.generation
                }), i.generation = n.generation || ++i.maxGeneration;
                for (var u = Ai(e, "beforeChange") || e.cm && Ai(e.cm, "beforeChange"), s = n.changes.length - 1; s >= 0; --s) {
                    var d = n.changes[s];
                    if (d.origin = t, u && !Sr(e, d, !1)) return void(a.length = 0);
                    c.push(ai(e, d));
                    var f = s ? xr(e, d) : Hi(a);
                    Or(e, d, f, ln(e, d)), !s && e.cm && e.cm.scrollIntoView({
                        from: d.from,
                        to: Jo(d)
                    });
                    var h = [];
                    Xn(e, function (e, t) {
                        t || -1 != zi(h, e.history) || (bi(e.history, d), h.push(e.history)), Or(e, d, null, ln(e, d))
                    })
                }
            }
        }
    }

    function Ar(e, t) {
        if (0 != t && (e.first += t, e.sel = new ue(Di(e.sel.ranges, function (e) {
                return new de(Fo(e.anchor.line + t, e.anchor.ch), Fo(e.head.line + t, e.head.ch))
            }), e.sel.primIndex), e.cm)) {
            Pt(e.cm, e.first, e.first - t, t);
            for (var r = e.cm.display, n = r.viewFrom; n < r.viewTo; n++) Et(e.cm, n, "gutter")
        }
    }

    function Or(e, t, r, n) {
        if (e.cm && !e.cm.curOp) return Nt(e.cm, Or)(e, t, r, n);
        if (t.to.line < e.first) return void Ar(e, t.text.length - 1 - (t.to.line - t.from.line));
        if (!(t.from.line > e.lastLine())) {
            if (t.from.line < e.first) {
                var i = t.text.length - 1 - (e.first - t.from.line);
                Ar(e, i), t = {
                    from: Fo(e.first, 0),
                    to: Fo(t.to.line + i, t.to.ch),
                    text: [Hi(t.text)],
                    origin: t.origin
                }
            }
            var o = e.lastLine();
            t.to.line > o && (t = {
                from: t.from,
                to: Fo(o, Zn(e, o).text.length),
                text: [t.text[0]],
                origin: t.origin
            }), t.removed = Qn(e, t.from, t.to), r || (r = xr(e, t)), e.cm ? Nr(e.cm, t, n) : qn(e, t, n), Te(e, r, Ia)
        }
    }

    function Nr(e, t, r) {
        var n = e.doc,
            i = e.display,
            a = t.from,
            l = t.to,
            s = !1,
            c = a.line;
        e.options.lineWrapping || (c = ti(yn(Zn(n, a.line))), n.iter(c, l.line + 1, function (e) {
            return e == i.maxLine ? (s = !0, !0) : void 0
        })), n.sel.contains(t.from, t.to) > -1 && Ti(e), qn(n, t, r, o(e)), e.options.lineWrapping || (n.iter(c, a.line + t.text.length, function (e) {
            var t = d(e);
            t > i.maxLineLength && (i.maxLine = e, i.maxLineLength = t, i.maxLineChanged = !0, s = !1)
        }), s && (e.curOp.updateMaxLine = !0)), n.frontier = Math.min(n.frontier, a.line), Be(e, 400);
        var u = t.text.length - (l.line - a.line) - 1;
        t.full ? Pt(e) : a.line != l.line || 1 != t.text.length || Gn(e.doc, t) ? Pt(e, a.line, l.line + 1, u) : Et(e, a.line, "text");
        var f = Ai(e, "changes"),
            h = Ai(e, "change");
        if (h || f) {
            var p = {
                from: a,
                to: l,
                text: t.text,
                removed: t.removed,
                origin: t.origin
            };
            h && Si(e, "change", e, p), f && (e.curOp.changeObjs || (e.curOp.changeObjs = [])).push(p)
        }
        e.display.selForContextMenu = null
    }

    function Wr(e, t, r, n, i) {
        if (n || (n = r), Bo(n, r) < 0) {
            var o = n;
            n = r, r = o
        }
        "string" == typeof t && (t = e.splitLines(t)), Lr(e, {
            from: r,
            to: n,
            text: t,
            origin: i
        })
    }

    function Hr(e, t) {
        if (!Mi(e, "scrollCursorIntoView")) {
            var r = e.display,
                n = r.sizer.getBoundingClientRect(),
                i = null;
            if (t.top + n.top < 0 ? i = !0 : t.bottom + n.top > (window.innerHeight || document.documentElement.clientHeight) && (i = !1), null != i && !To) {
                var o = Ki("div", "​", null, "position: absolute; top: " + (t.top - r.viewOffset - Ve(e.display)) + "px; height: " + (t.bottom - t.top + qe(e) + r.barHeight) + "px; left: " + t.left + "px; width: 2px;");
                e.display.lineSpace.appendChild(o), o.scrollIntoView(i), e.display.lineSpace.removeChild(o)
            }
        }
    }

    function zr(e, t, r, n) {
        null == n && (n = 0);
        for (var i = 0; 5 > i; i++) {
            var o = !1,
                a = ht(e, t),
                l = r && r != t ? ht(e, r) : a,
                s = Pr(e, Math.min(a.left, l.left), Math.min(a.top, l.top) - n, Math.max(a.left, l.left), Math.max(a.bottom, l.bottom) + n),
                c = e.doc.scrollTop,
                u = e.doc.scrollLeft;
            if (null != s.scrollTop && (nr(e, s.scrollTop), Math.abs(e.doc.scrollTop - c) > 1 && (o = !0)), null != s.scrollLeft && (ir(e, s.scrollLeft), Math.abs(e.doc.scrollLeft - u) > 1 && (o = !0)), !o) break
        }
        return a
    }

    function Dr(e, t, r, n, i) {
        var o = Pr(e, t, r, n, i);
        null != o.scrollTop && nr(e, o.scrollTop), null != o.scrollLeft && ir(e, o.scrollLeft)
    }

    function Pr(e, t, r, n, i) {
        var o = e.display,
            a = yt(e.display);
        0 > r && (r = 0);
        var l = e.curOp && null != e.curOp.scrollTop ? e.curOp.scrollTop : o.scroller.scrollTop,
            s = $e(e),
            c = {};
        i - r > s && (i = r + s);
        var u = e.doc.height + Ue(o),
            d = a > r,
            f = i > u - a;
        if (l > r) c.scrollTop = d ? 0 : r;
        else if (i > l + s) {
            var h = Math.min(r, (f ? u : i) - s);
            h != l && (c.scrollTop = h)
        }
        var p = e.curOp && null != e.curOp.scrollLeft ? e.curOp.scrollLeft : o.scroller.scrollLeft,
            g = _e(e) - (e.options.fixedGutter ? o.gutters.offsetWidth : 0),
            m = n - t > g;
        return m && (n = t + g), 10 > t ? c.scrollLeft = 0 : p > t ? c.scrollLeft = Math.max(0, t - (m ? 0 : 10)) : n > g + p - 3 && (c.scrollLeft = n + (m ? 0 : 10) - g),
            c
    }

    function Er(e, t, r) {
        (null != t || null != r) && Fr(e), null != t && (e.curOp.scrollLeft = (null == e.curOp.scrollLeft ? e.doc.scrollLeft : e.curOp.scrollLeft) + t), null != r && (e.curOp.scrollTop = (null == e.curOp.scrollTop ? e.doc.scrollTop : e.curOp.scrollTop) + r)
    }

    function Ir(e) {
        Fr(e);
        var t = e.getCursor(),
            r = t,
            n = t;
        e.options.lineWrapping || (r = t.ch ? Fo(t.line, t.ch - 1) : t, n = Fo(t.line, t.ch + 1)), e.curOp.scrollToPos = {
            from: r,
            to: n,
            margin: e.options.cursorScrollMargin,
            isCursor: !0
        }
    }

    function Fr(e) {
        var t = e.curOp.scrollToPos;
        if (t) {
            e.curOp.scrollToPos = null;
            var r = pt(e, t.from),
                n = pt(e, t.to),
                i = Pr(e, Math.min(r.left, n.left), Math.min(r.top, n.top) - t.margin, Math.max(r.right, n.right), Math.max(r.bottom, n.bottom) + t.margin);
            e.scrollTo(i.scrollLeft, i.scrollTop)
        }
    }

    function Br(e, t, r, n) {
        var i, o = e.doc;
        null == r && (r = "add"), "smart" == r && (o.mode.indent ? i = Ke(e, t) : r = "prev");
        var a = e.options.tabSize,
            l = Zn(o, t),
            s = Ra(l.text, null, a);
        l.stateAfter && (l.stateAfter = null);
        var c, u = l.text.match(/^\s*/)[0];
        if (n || /\S/.test(l.text)) {
            if ("smart" == r && (c = o.mode.indent(i, l.text.slice(u.length), l.text), c == Ea || c > 150)) {
                if (!n) return;
                r = "prev"
            }
        } else c = 0, r = "not";
        "prev" == r ? c = t > o.first ? Ra(Zn(o, t - 1).text, null, a) : 0 : "add" == r ? c = s + e.options.indentUnit : "subtract" == r ? c = s - e.options.indentUnit : "number" == typeof r && (c = s + r), c = Math.max(0, c);
        var d = "",
            f = 0;
        if (e.options.indentWithTabs)
            for (var h = Math.floor(c / a); h; --h) f += a, d += "  ";
        if (c > f && (d += Wi(c - f)), d != u) return Wr(o, d, Fo(t, 0), Fo(t, u.length), "+input"), l.stateAfter = null, !0;
        for (var h = 0; h < o.sel.ranges.length; h++) {
            var p = o.sel.ranges[h];
            if (p.head.line == t && p.head.ch < u.length) {
                var f = Fo(t, u.length);
                ke(o, h, new de(f, f));
                break
            }
        }
    }

    function Rr(e, t, r, n) {
        var i = t,
            o = t;
        return "number" == typeof t ? o = Zn(e, pe(e, t)) : i = ti(t), null == i ? null : (n(o, i) && e.cm && Et(e.cm, i, r), o)
    }

    function jr(e, t) {
        for (var r = e.doc.sel.ranges, n = [], i = 0; i < r.length; i++) {
            for (var o = t(r[i]); n.length && Bo(o.from, Hi(n).to) <= 0;) {
                var a = n.pop();
                if (Bo(a.from, o.from) < 0) {
                    o.from = a.from;
                    break
                }
            }
            n.push(o)
        }
        Ot(e, function () {
            for (var t = n.length - 1; t >= 0; t--) Wr(e.doc, "", n[t].from, n[t].to, "+delete");
            Ir(e)
        })
    }

    function Kr(e, t, r, n, i) {
        function o() {
            var t = l + r;
            return t < e.first || t >= e.first + e.size ? !1 : (l = t, u = Zn(e, t))
        }

        function a(e) {
            var t = (i ? fo : ho)(u, s, r, !0);
            if (null == t) {
                if (e || !o()) return !1;
                s = i ? (0 > r ? io : no)(u) : 0 > r ? u.text.length : 0
            } else s = t;
            return !0
        }
        var l = t.line,
            s = t.ch,
            c = r,
            u = Zn(e, l);
        if ("char" == n) a();
        else if ("column" == n) a(!0);
        else if ("word" == n || "group" == n)
            for (var d = null, f = "group" == n, h = e.cm && e.cm.getHelper(t, "wordChars"), p = !0; !(0 > r) || a(!p); p = !1) {
                var g = u.text.charAt(s) || "\n",
                    m = Bi(g, h) ? "w" : f && "\n" == g ? "n" : !f || /\s/.test(g) ? null : "p";
                if (!f || p || m || (m = "s"), d && d != m) {
                    0 > r && (r = 1, a());
                    break
                }
                if (m && (d = m), r > 0 && !a(!p)) break
            }
        var v = He(e, Fo(l, s), t, c, !0);
        return Bo(t, v) || (v.hitSide = !0), v
    }

    function Vr(e, t, r, n) {
        var i, o = e.doc,
            a = t.left;
        if ("page" == n) {
            var l = Math.min(e.display.wrapper.clientHeight, window.innerHeight || document.documentElement.clientHeight);
            i = t.top + r * (l - (0 > r ? 1.5 : .5) * yt(e.display))
        } else "line" == n && (i = r > 0 ? t.bottom + 3 : t.top - 3);
        for (;;) {
            var s = mt(e, a, i);
            if (!s.outside) break;
            if (0 > r ? 0 >= i : i >= o.height) {
                s.hitSide = !0;
                break
            }
            i += 5 * r
        }
        return s
    }

    function Ur(t, r, n, i) {
        e.defaults[t] = r, n && (ta[t] = i ? function (e, t, r) {
            r != ra && n(e, t, r)
        } : n)
    }

    function Gr(e) {
        for (var t, r, n, i, o = e.split(/-(?!$)/), e = o[o.length - 1], a = 0; a < o.length - 1; a++) {
            var l = o[a];
            if (/^(cmd|meta|m)$/i.test(l)) i = !0;
            else if (/^a(lt)?$/i.test(l)) t = !0;
            else if (/^(c|ctrl|control)$/i.test(l)) r = !0;
            else {
                if (!/^s(hift)$/i.test(l)) throw new Error("Unrecognized modifier name: " + l);
                n = !0
            }
        }
        return t && (e = "Alt-" + e), r && (e = "Ctrl-" + e), i && (e = "Cmd-" + e), n && (e = "Shift-" + e), e
    }

    function qr(e) {
        return "string" == typeof e ? da[e] : e
    }

    function _r(e, t, r, n, i) {
        if (n && n.shared) return $r(e, t, r, n, i);
        if (e.cm && !e.cm.curOp) return Nt(e.cm, _r)(e, t, r, n, i);
        var o = new va(e, i),
            a = Bo(t, r);
        if (n && Ii(n, o, !1), a > 0 || 0 == a && o.clearWhenEmpty !== !1) return o;
        if (o.replacedWith && (o.collapsed = !0, o.widgetNode = Ki("span", [o.replacedWith], "CodeMirror-widget"), n.handleMouseEvents || o.widgetNode.setAttribute("cm-ignore-events", "true"), n.insertLeft && (o.widgetNode.insertLeft = !0)), o.collapsed) {
            if (vn(e, t.line, t, r, o) || t.line != r.line && vn(e, r.line, t, r, o)) throw new Error("Inserting collapsed marker partially overlapping an existing one");
            Io = !0
        }
        o.addToHistory && ci(e, {
            from: t,
            to: r,
            origin: "markText"
        }, e.sel, NaN);
        var l, s = t.line,
            c = e.cm;
        if (e.iter(s, r.line + 1, function (e) {
                c && o.collapsed && !c.options.lineWrapping && yn(e) == c.display.maxLine && (l = !0), o.collapsed && s != t.line && ei(e, 0), tn(e, new Qr(o, s == t.line ? t.ch : null, s == r.line ? r.ch : null)), ++s
            }), o.collapsed && e.iter(t.line, r.line + 1, function (t) {
                kn(e, t) && ei(t, 0)
            }), o.clearOnEnter && Na(o, "beforeCursorEnter", function () {
                o.clear()
            }), o.readOnly && (Eo = !0, (e.history.done.length || e.history.undone.length) && e.clearHistory()), o.collapsed && (o.id = ++ma, o.atomic = !0), c) {
            if (l && (c.curOp.updateMaxLine = !0), o.collapsed) Pt(c, t.line, r.line + 1);
            else if (o.className || o.title || o.startStyle || o.endStyle || o.css)
                for (var u = t.line; u <= r.line; u++) Et(c, u, "text");
            o.atomic && Oe(c.doc), Si(c, "markerAdded", c, o)
        }
        return o
    }

    function $r(e, t, r, n, i) {
        n = Ii(n), n.shared = !1;
        var o = [_r(e, t, r, n, i)],
            a = o[0],
            l = n.widgetNode;
        return Xn(e, function (e) {
            l && (n.widgetNode = l.cloneNode(!0)), o.push(_r(e, ge(e, t), ge(e, r), n, i));
            for (var s = 0; s < e.linked.length; ++s)
                if (e.linked[s].isParent) return;
            a = Hi(o)
        }), new ya(o, a)
    }

    function Xr(e) {
        return e.findMarks(Fo(e.first, 0), e.clipPos(Fo(e.lastLine())), function (e) {
            return e.parent
        })
    }

    function Yr(e, t) {
        for (var r = 0; r < t.length; r++) {
            var n = t[r],
                i = n.find(),
                o = e.clipPos(i.from),
                a = e.clipPos(i.to);
            if (Bo(o, a)) {
                var l = _r(e, o, a, n.primary, n.primary.type);
                n.markers.push(l), l.parent = n
            }
        }
    }

    function Zr(e) {
        for (var t = 0; t < e.length; t++) {
            var r = e[t],
                n = [r.primary.doc];
            Xn(r.primary.doc, function (e) {
                n.push(e)
            });
            for (var i = 0; i < r.markers.length; i++) {
                var o = r.markers[i]; - 1 == zi(n, o.doc) && (o.parent = null, r.markers.splice(i--, 1))
            }
        }
    }

    function Qr(e, t, r) {
        this.marker = e, this.from = t, this.to = r
    }

    function Jr(e, t) {
        if (e)
            for (var r = 0; r < e.length; ++r) {
                var n = e[r];
                if (n.marker == t) return n
            }
    }

    function en(e, t) {
        for (var r, n = 0; n < e.length; ++n) e[n] != t && (r || (r = [])).push(e[n]);
        return r
    }

    function tn(e, t) {
        e.markedSpans = e.markedSpans ? e.markedSpans.concat([t]) : [t], t.marker.attachLine(e)
    }

    function rn(e, t, r) {
        if (e)
            for (var n, i = 0; i < e.length; ++i) {
                var o = e[i],
                    a = o.marker,
                    l = null == o.from || (a.inclusiveLeft ? o.from <= t : o.from < t);
                if (l || o.from == t && "bookmark" == a.type && (!r || !o.marker.insertLeft)) {
                    var s = null == o.to || (a.inclusiveRight ? o.to >= t : o.to > t);
                    (n || (n = [])).push(new Qr(a, o.from, s ? null : o.to))
                }
            }
        return n
    }

    function nn(e, t, r) {
        if (e)
            for (var n, i = 0; i < e.length; ++i) {
                var o = e[i],
                    a = o.marker,
                    l = null == o.to || (a.inclusiveRight ? o.to >= t : o.to > t);
                if (l || o.from == t && "bookmark" == a.type && (!r || o.marker.insertLeft)) {
                    var s = null == o.from || (a.inclusiveLeft ? o.from <= t : o.from < t);
                    (n || (n = [])).push(new Qr(a, s ? null : o.from - t, null == o.to ? null : o.to - t))
                }
            }
        return n
    }

    function on(e, t) {
        if (t.full) return null;
        var r = ve(e, t.from.line) && Zn(e, t.from.line).markedSpans,
            n = ve(e, t.to.line) && Zn(e, t.to.line).markedSpans;
        if (!r && !n) return null;
        var i = t.from.ch,
            o = t.to.ch,
            a = 0 == Bo(t.from, t.to),
            l = rn(r, i, a),
            s = nn(n, o, a),
            c = 1 == t.text.length,
            u = Hi(t.text).length + (c ? i : 0);
        if (l)
            for (var d = 0; d < l.length; ++d) {
                var f = l[d];
                if (null == f.to) {
                    var h = Jr(s, f.marker);
                    h ? c && (f.to = null == h.to ? null : h.to + u) : f.to = i
                }
            }
        if (s)
            for (var d = 0; d < s.length; ++d) {
                var f = s[d];
                if (null != f.to && (f.to += u), null == f.from) {
                    var h = Jr(l, f.marker);
                    h || (f.from = u, c && (l || (l = [])).push(f))
                } else f.from += u, c && (l || (l = [])).push(f)
            }
        l && (l = an(l)), s && s != l && (s = an(s));
        var p = [l];
        if (!c) {
            var g, m = t.text.length - 2;
            if (m > 0 && l)
                for (var d = 0; d < l.length; ++d) null == l[d].to && (g || (g = [])).push(new Qr(l[d].marker, null, null));
            for (var d = 0; m > d; ++d) p.push(g);
            p.push(s)
        }
        return p
    }

    function an(e) {
        for (var t = 0; t < e.length; ++t) {
            var r = e[t];
            null != r.from && r.from == r.to && r.marker.clearWhenEmpty !== !1 && e.splice(t--, 1)
        }
        return e.length ? e : null
    }

    function ln(e, t) {
        var r = gi(e, t),
            n = on(e, t);
        if (!r) return n;
        if (!n) return r;
        for (var i = 0; i < r.length; ++i) {
            var o = r[i],
                a = n[i];
            if (o && a) e: for (var l = 0; l < a.length; ++l) {
                for (var s = a[l], c = 0; c < o.length; ++c)
                    if (o[c].marker == s.marker) continue e;
                o.push(s)
            } else a && (r[i] = a)
        }
        return r
    }

    function sn(e, t, r) {
        var n = null;
        if (e.iter(t.line, r.line + 1, function (e) {
                if (e.markedSpans)
                    for (var t = 0; t < e.markedSpans.length; ++t) {
                        var r = e.markedSpans[t].marker;
                        !r.readOnly || n && -1 != zi(n, r) || (n || (n = [])).push(r)
                    }
            }), !n) return null;
        for (var i = [{
                from: t,
                to: r
            }], o = 0; o < n.length; ++o)
            for (var a = n[o], l = a.find(0), s = 0; s < i.length; ++s) {
                var c = i[s];
                if (!(Bo(c.to, l.from) < 0 || Bo(c.from, l.to) > 0)) {
                    var u = [s, 1],
                        d = Bo(c.from, l.from),
                        f = Bo(c.to, l.to);
                    (0 > d || !a.inclusiveLeft && !d) && u.push({
                        from: c.from,
                        to: l.from
                    }), (f > 0 || !a.inclusiveRight && !f) && u.push({
                        from: l.to,
                        to: c.to
                    }), i.splice.apply(i, u), s += u.length - 1
                }
            }
        return i
    }

    function cn(e) {
        var t = e.markedSpans;
        if (t) {
            for (var r = 0; r < t.length; ++r) t[r].marker.detachLine(e);
            e.markedSpans = null
        }
    }

    function un(e, t) {
        if (t) {
            for (var r = 0; r < t.length; ++r) t[r].marker.attachLine(e);
            e.markedSpans = t
        }
    }

    function dn(e) {
        return e.inclusiveLeft ? -1 : 0
    }

    function fn(e) {
        return e.inclusiveRight ? 1 : 0
    }

    function hn(e, t) {
        var r = e.lines.length - t.lines.length;
        if (0 != r) return r;
        var n = e.find(),
            i = t.find(),
            o = Bo(n.from, i.from) || dn(e) - dn(t);
        if (o) return -o;
        var a = Bo(n.to, i.to) || fn(e) - fn(t);
        return a ? a : t.id - e.id
    }

    function pn(e, t) {
        var r, n = Io && e.markedSpans;
        if (n)
            for (var i, o = 0; o < n.length; ++o) i = n[o], i.marker.collapsed && null == (t ? i.from : i.to) && (!r || hn(r, i.marker) < 0) && (r = i.marker);
        return r
    }

    function gn(e) {
        return pn(e, !0)
    }

    function mn(e) {
        return pn(e, !1)
    }

    function vn(e, t, r, n, i) {
        var o = Zn(e, t),
            a = Io && o.markedSpans;
        if (a)
            for (var l = 0; l < a.length; ++l) {
                var s = a[l];
                if (s.marker.collapsed) {
                    var c = s.marker.find(0),
                        u = Bo(c.from, r) || dn(s.marker) - dn(i),
                        d = Bo(c.to, n) || fn(s.marker) - fn(i);
                    if (!(u >= 0 && 0 >= d || 0 >= u && d >= 0) && (0 >= u && (s.marker.inclusiveRight && i.inclusiveLeft ? Bo(c.to, r) >= 0 : Bo(c.to, r) > 0) || u >= 0 && (s.marker.inclusiveRight && i.inclusiveLeft ? Bo(c.from, n) <= 0 : Bo(c.from, n) < 0))) return !0
                }
            }
    }

    function yn(e) {
        for (var t; t = gn(e);) e = t.find(-1, !0).line;
        return e
    }

    function bn(e) {
        for (var t, r; t = mn(e);) e = t.find(1, !0).line, (r || (r = [])).push(e);
        return r
    }

    function wn(e, t) {
        var r = Zn(e, t),
            n = yn(r);
        return r == n ? t : ti(n)
    }

    function xn(e, t) {
        if (t > e.lastLine()) return t;
        var r, n = Zn(e, t);
        if (!kn(e, n)) return t;
        for (; r = mn(n);) n = r.find(1, !0).line;
        return ti(n) + 1
    }

    function kn(e, t) {
        var r = Io && t.markedSpans;
        if (r)
            for (var n, i = 0; i < r.length; ++i)
                if (n = r[i], n.marker.collapsed) {
                    if (null == n.from) return !0;
                    if (!n.marker.widgetNode && 0 == n.from && n.marker.inclusiveLeft && Cn(e, t, n)) return !0
                }
    }

    function Cn(e, t, r) {
        if (null == r.to) {
            var n = r.marker.find(1, !0);
            return Cn(e, n.line, Jr(n.line.markedSpans, r.marker))
        }
        if (r.marker.inclusiveRight && r.to == t.text.length) return !0;
        for (var i, o = 0; o < t.markedSpans.length; ++o)
            if (i = t.markedSpans[o], i.marker.collapsed && !i.marker.widgetNode && i.from == r.to && (null == i.to || i.to != r.from) && (i.marker.inclusiveLeft || r.marker.inclusiveRight) && Cn(e, t, i)) return !0
    }

    function Sn(e, t, r) {
        ni(t) < (e.curOp && e.curOp.scrollTop || e.doc.scrollTop) && Er(e, null, r)
    }

    function Ln(e) {
        if (null != e.height) return e.height;
        var t = e.doc.cm;
        if (!t) return 0;
        if (!$a(document.body, e.node)) {
            var r = "position: relative;";
            e.coverGutter && (r += "margin-left: -" + t.display.gutters.offsetWidth + "px;"), e.noHScroll && (r += "width: " + t.display.wrapper.clientWidth + "px;"), Ui(t.display.measure, Ki("div", [e.node], null, r))
        }
        return e.height = e.node.parentNode.offsetHeight
    }

    function Mn(e, t, r, n) {
        var i = new ba(e, r, n),
            o = e.cm;
        return o && i.noHScroll && (o.display.alignWidgets = !0), Rr(e, t, "widget", function (t) {
            var r = t.widgets || (t.widgets = []);
            if (null == i.insertAt ? r.push(i) : r.splice(Math.min(r.length - 1, Math.max(0, i.insertAt)), 0, i), i.line = t, o && !kn(e, t)) {
                var n = ni(t) < e.scrollTop;
                ei(t, t.height + Ln(i)), n && Er(o, null, i.height), o.curOp.forceUpdate = !0
            }
            return !0
        }), i
    }

    function Tn(e, t, r, n) {
        e.text = t, e.stateAfter && (e.stateAfter = null), e.styles && (e.styles = null), null != e.order && (e.order = null), cn(e), un(e, r);
        var i = n ? n(e) : 1;
        i != e.height && ei(e, i)
    }

    function An(e) {
        e.parent = null, cn(e)
    }

    function On(e, t) {
        if (e)
            for (;;) {
                var r = e.match(/(?:^|\s+)line-(background-)?(\S+)/);
                if (!r) break;
                e = e.slice(0, r.index) + e.slice(r.index + r[0].length);
                var n = r[1] ? "bgClass" : "textClass";
                null == t[n] ? t[n] = r[2] : new RegExp("(?:^|s)" + r[2] + "(?:$|s)").test(t[n]) || (t[n] += " " + r[2])
            }
        return e
    }

    function Nn(t, r) {
        if (t.blankLine) return t.blankLine(r);
        if (t.innerMode) {
            var n = e.innerMode(t, r);
            return n.mode.blankLine ? n.mode.blankLine(n.state) : void 0
        }
    }

    function Wn(t, r, n, i) {
        for (var o = 0; 10 > o; o++) {
            i && (i[0] = e.innerMode(t, n).mode);
            var a = t.token(r, n);
            if (r.pos > r.start) return a
        }
        throw new Error("Mode " + t.name + " failed to advance stream.")
    }

    function Hn(e, t, r, n) {
        function i(e) {
            return {
                start: d.start,
                end: d.pos,
                string: d.current(),
                type: o || null,
                state: e ? sa(a.mode, u) : u
            }
        }
        var o, a = e.doc,
            l = a.mode;
        t = ge(a, t);
        var s, c = Zn(a, t.line),
            u = Ke(e, t.line, r),
            d = new ga(c.text, e.options.tabSize);
        for (n && (s = []);
            (n || d.pos < t.ch) && !d.eol();) d.start = d.pos, o = Wn(l, d, u), n && s.push(i(!0));
        return n ? s : i()
    }

    function zn(e, t, r, n, i, o, a) {
        var l = r.flattenSpans;
        null == l && (l = e.options.flattenSpans);
        var s, c = 0,
            u = null,
            d = new ga(t, e.options.tabSize),
            f = e.options.addModeClass && [null];
        for ("" == t && On(Nn(r, n), o); !d.eol();) {
            if (d.pos > e.options.maxHighlightLength ? (l = !1, a && En(e, t, n, d.pos), d.pos = t.length, s = null) : s = On(Wn(r, d, n, f), o), f) {
                var h = f[0].name;
                h && (s = "m-" + (s ? h + " " + s : h))
            }
            if (!l || u != s) {
                for (; c < d.start;) c = Math.min(d.start, c + 5e4), i(c, u);
                u = s
            }
            d.start = d.pos
        }
        for (; c < d.pos;) {
            var p = Math.min(d.pos, c + 5e4);
            i(p, u), c = p
        }
    }

    function Dn(e, t, r, n) {
        var i = [e.state.modeGen],
            o = {};
        zn(e, t.text, e.doc.mode, r, function (e, t) {
            i.push(e, t)
        }, o, n);
        for (var a = 0; a < e.state.overlays.length; ++a) {
            var l = e.state.overlays[a],
                s = 1,
                c = 0;
            zn(e, t.text, l.mode, !0, function (e, t) {
                for (var r = s; e > c;) {
                    var n = i[s];
                    n > e && i.splice(s, 1, e, i[s + 1], n), s += 2, c = Math.min(e, n)
                }
                if (t)
                    if (l.opaque) i.splice(r, s - r, e, "cm-overlay " + t), s = r + 2;
                    else
                        for (; s > r; r += 2) {
                            var o = i[r + 1];
                            i[r + 1] = (o ? o + " " : "") + "cm-overlay " + t
                        }
            }, o)
        }
        return {
            styles: i,
            classes: o.bgClass || o.textClass ? o : null
        }
    }

    function Pn(e, t, r) {
        if (!t.styles || t.styles[0] != e.state.modeGen) {
            var n = Ke(e, ti(t)),
                i = Dn(e, t, t.text.length > e.options.maxHighlightLength ? sa(e.doc.mode, n) : n);
            t.stateAfter = n, t.styles = i.styles, i.classes ? t.styleClasses = i.classes : t.styleClasses && (t.styleClasses = null), r === e.doc.frontier && e.doc.frontier++
        }
        return t.styles
    }

    function En(e, t, r, n) {
        var i = e.doc.mode,
            o = new ga(t, e.options.tabSize);
        for (o.start = o.pos = n || 0, "" == t && Nn(i, r); !o.eol();) Wn(i, o, r), o.start = o.pos
    }

    function In(e, t) {
        if (!e || /^\s*$/.test(e)) return null;
        var r = t.addModeClass ? ka : xa;
        return r[e] || (r[e] = e.replace(/\S+/g, "cm-$&"))
    }

    function Fn(e, t) {
        var r = Ki("span", null, null, xo ? "padding-right: .1px" : null),
            n = {
                pre: Ki("pre", [r], "CodeMirror-line"),
                content: r,
                col: 0,
                pos: 0,
                cm: e,
                splitSpaces: (bo || xo) && e.getOption("lineWrapping")
            };
        t.measure = {};
        for (var i = 0; i <= (t.rest ? t.rest.length : 0); i++) {
            var o, a = i ? t.rest[i - 1] : t.line;
            n.pos = 0, n.addToken = Rn, Qi(e.display.measure) && (o = ii(a)) && (n.addToken = Kn(n.addToken, o)), n.map = [];
            var l = t != e.display.externalMeasured && ti(a);
            Un(a, n, Pn(e, a, l)), a.styleClasses && (a.styleClasses.bgClass && (n.bgClass = _i(a.styleClasses.bgClass, n.bgClass || "")), a.styleClasses.textClass && (n.textClass = _i(a.styleClasses.textClass, n.textClass || ""))), 0 == n.map.length && n.map.push(0, 0, n.content.appendChild(Zi(e.display.measure))), 0 == i ? (t.measure.map = n.map, t.measure.cache = {}) : ((t.measure.maps || (t.measure.maps = [])).push(n.map), (t.measure.caches || (t.measure.caches = [])).push({}))
        }
        if (xo) {
            var s = n.content.lastChild;
            (/\bcm-tab\b/.test(s.className) || s.querySelector && s.querySelector(".cm-tab")) && (n.content.className = "cm-tab-wrap-hack")
        }
        return za(e, "renderLine", e, t.line, n.pre), n.pre.className && (n.textClass = _i(n.pre.className, n.textClass || "")), n
    }

    function Bn(e) {
        var t = Ki("span", "•", "cm-invalidchar");
        return t.title = "\\u" + e.charCodeAt(0).toString(16), t.setAttribute("aria-label", t.title), t
    }

    function Rn(e, t, r, n, i, o, a) {
        if (t) {
            var l = e.splitSpaces ? t.replace(/ {3,}/g, jn) : t,
                s = e.cm.state.specialChars,
                c = !1;
            if (s.test(t))
                for (var u = document.createDocumentFragment(), d = 0;;) {
                    s.lastIndex = d;
                    var f = s.exec(t),
                        h = f ? f.index - d : t.length - d;
                    if (h) {
                        var p = document.createTextNode(l.slice(d, d + h));
                        bo && 9 > wo ? u.appendChild(Ki("span", [p])) : u.appendChild(p), e.map.push(e.pos, e.pos + h, p), e.col += h, e.pos += h
                    }
                    if (!f) break;
                    if (d += h + 1, " " == f[0]) {
                        var g = e.cm.options.tabSize,
                            m = g - e.col % g,
                            p = u.appendChild(Ki("span", Wi(m), "cm-tab"));
                        p.setAttribute("role", "presentation"), p.setAttribute("cm-text", " "), e.col += m
                    } else if ("\r" == f[0] || "\n" == f[0]) {
                        var p = u.appendChild(Ki("span", "\r" == f[0] ? "␍" : "␤", "cm-invalidchar"));
                        p.setAttribute("cm-text", f[0]), e.col += 1
                    } else {
                        var p = e.cm.options.specialCharPlaceholder(f[0]);
                        p.setAttribute("cm-text", f[0]), bo && 9 > wo ? u.appendChild(Ki("span", [p])) : u.appendChild(p), e.col += 1
                    }
                    e.map.push(e.pos, e.pos + 1, p), e.pos++
                } else {
                    e.col += t.length;
                    var u = document.createTextNode(l);
                    e.map.push(e.pos, e.pos + t.length, u), bo && 9 > wo && (c = !0), e.pos += t.length
                }
            if (r || n || i || c || a) {
                var v = r || "";
                n && (v += n), i && (v += i);
                var y = Ki("span", [u], v, a);
                return o && (y.title = o), e.content.appendChild(y)
            }
            e.content.appendChild(u)
        }
    }

    function jn(e) {
        for (var t = " ", r = 0; r < e.length - 2; ++r) t += r % 2 ? " " : " ";
        return t += " "
    }

    function Kn(e, t) {
        return function (r, n, i, o, a, l, s) {
            i = i ? i + " cm-force-border" : "cm-force-border";
            for (var c = r.pos, u = c + n.length;;) {
                for (var d = 0; d < t.length; d++) {
                    var f = t[d];
                    if (f.to > c && f.from <= c) break
                }
                if (f.to >= u) return e(r, n, i, o, a, l, s);
                e(r, n.slice(0, f.to - c), i, o, null, l, s), o = null, n = n.slice(f.to - c), c = f.to
            }
        }
    }

    function Vn(e, t, r, n) {
        var i = !n && r.widgetNode;
        i && e.map.push(e.pos, e.pos + t, i), !n && e.cm.display.input.needsContentAttribute && (i || (i = e.content.appendChild(document.createElement("span"))), i.setAttribute("cm-marker", r.id)), i && (e.cm.display.input.setUneditable(i), e.content.appendChild(i)), e.pos += t
    }

    function Un(e, t, r) {
        var n = e.markedSpans,
            i = e.text,
            o = 0;
        if (n)
            for (var a, l, s, c, u, d, f, h = i.length, p = 0, g = 1, m = "", v = 0;;) {
                if (v == p) {
                    s = c = u = d = l = "", f = null, v = 1 / 0;
                    for (var y, b = [], w = 0; w < n.length; ++w) {
                        var x = n[w],
                            k = x.marker;
                        "bookmark" == k.type && x.from == p && k.widgetNode ? b.push(k) : x.from <= p && (null == x.to || x.to > p || k.collapsed && x.to == p && x.from == p) ? (null != x.to && x.to != p && v > x.to && (v = x.to, c = ""), k.className && (s += " " + k.className), k.css && (l = (l ? l + ";" : "") + k.css), k.startStyle && x.from == p && (u += " " + k.startStyle), k.endStyle && x.to == v && (y || (y = [])).push(k.endStyle, x.to), k.title && !d && (d = k.title), k.collapsed && (!f || hn(f.marker, k) < 0) && (f = x)) : x.from > p && v > x.from && (v = x.from)
                    }
                    if (y)
                        for (var w = 0; w < y.length; w += 2) y[w + 1] == v && (c += " " + y[w]);
                    if (!f || f.from == p)
                        for (var w = 0; w < b.length; ++w) Vn(t, 0, b[w]);
                    if (f && (f.from || 0) == p) {
                        if (Vn(t, (null == f.to ? h + 1 : f.to) - p, f.marker, null == f.from), null == f.to) return;
                        f.to == p && (f = !1)
                    }
                }
                if (p >= h) break;
                for (var C = Math.min(h, v);;) {
                    if (m) {
                        var S = p + m.length;
                        if (!f) {
                            var L = S > C ? m.slice(0, C - p) : m;
                            t.addToken(t, L, a ? a + s : s, u, p + L.length == v ? c : "", d, l)
                        }
                        if (S >= C) {
                            m = m.slice(C - p), p = C;
                            break
                        }
                        p = S, u = ""
                    }
                    m = i.slice(o, o = r[g++]), a = In(r[g++], t.cm.options)
                }
            } else
                for (var g = 1; g < r.length; g += 2) t.addToken(t, i.slice(o, o = r[g]), In(r[g + 1], t.cm.options))
    }

    function Gn(e, t) {
        return 0 == t.from.ch && 0 == t.to.ch && "" == Hi(t.text) && (!e.cm || e.cm.options.wholeLineUpdateBefore)
    }

    function qn(e, t, r, n) {
        function i(e) {
            return r ? r[e] : null
        }

        function o(e, r, i) {
            Tn(e, r, i, n), Si(e, "change", e, t)
        }

        function a(e, t) {
            for (var r = e, o = []; t > r; ++r) o.push(new wa(c[r], i(r), n));
            return o
        }
        var l = t.from,
            s = t.to,
            c = t.text,
            u = Zn(e, l.line),
            d = Zn(e, s.line),
            f = Hi(c),
            h = i(c.length - 1),
            p = s.line - l.line;
        if (t.full) e.insert(0, a(0, c.length)), e.remove(c.length, e.size - c.length);
        else if (Gn(e, t)) {
            var g = a(0, c.length - 1);
            o(d, d.text, h), p && e.remove(l.line, p), g.length && e.insert(l.line, g)
        } else if (u == d)
            if (1 == c.length) o(u, u.text.slice(0, l.ch) + f + u.text.slice(s.ch), h);
            else {
                var g = a(1, c.length - 1);
                g.push(new wa(f + u.text.slice(s.ch), h, n)), o(u, u.text.slice(0, l.ch) + c[0], i(0)), e.insert(l.line + 1, g)
            }
        else if (1 == c.length) o(u, u.text.slice(0, l.ch) + c[0] + d.text.slice(s.ch), i(0)), e.remove(l.line + 1, p);
        else {
            o(u, u.text.slice(0, l.ch) + c[0], i(0)), o(d, f + d.text.slice(s.ch), h);
            var g = a(1, c.length - 1);
            p > 1 && e.remove(l.line + 1, p - 1), e.insert(l.line + 1, g)
        }
        Si(e, "change", e, t)
    }

    function _n(e) {
        this.lines = e, this.parent = null;
        for (var t = 0, r = 0; t < e.length; ++t) e[t].parent = this, r += e[t].height;
        this.height = r
    }

    function $n(e) {
        this.children = e;
        for (var t = 0, r = 0, n = 0; n < e.length; ++n) {
            var i = e[n];
            t += i.chunkSize(), r += i.height, i.parent = this
        }
        this.size = t, this.height = r, this.parent = null
    }

    function Xn(e, t, r) {
        function n(e, i, o) {
            if (e.linked)
                for (var a = 0; a < e.linked.length; ++a) {
                    var l = e.linked[a];
                    if (l.doc != i) {
                        var s = o && l.sharedHist;
                        (!r || s) && (t(l.doc, s), n(l.doc, e, s))
                    }
                }
        }
        n(e, null, !0)
    }

    function Yn(e, t) {
        if (t.cm) throw new Error("This document is already in use.");
        e.doc = t, t.cm = e, a(e), r(e), e.options.lineWrapping || f(e), e.options.mode = t.modeOption, Pt(e)
    }

    function Zn(e, t) {
        if (t -= e.first, 0 > t || t >= e.size) throw new Error("There is no line " + (t + e.first) + " in the document.");
        for (var r = e; !r.lines;)
            for (var n = 0;; ++n) {
                var i = r.children[n],
                    o = i.chunkSize();
                if (o > t) {
                    r = i;
                    break
                }
                t -= o
            }
        return r.lines[t]
    }

    function Qn(e, t, r) {
        var n = [],
            i = t.line;
        return e.iter(t.line, r.line + 1, function (e) {
            var o = e.text;
            i == r.line && (o = o.slice(0, r.ch)), i == t.line && (o = o.slice(t.ch)), n.push(o), ++i
        }), n
    }

    function Jn(e, t, r) {
        var n = [];
        return e.iter(t, r, function (e) {
            n.push(e.text)
        }), n
    }

    function ei(e, t) {
        var r = t - e.height;
        if (r)
            for (var n = e; n; n = n.parent) n.height += r
    }

    function ti(e) {
        if (null == e.parent) return null;
        for (var t = e.parent, r = zi(t.lines, e), n = t.parent; n; t = n, n = n.parent)
            for (var i = 0; n.children[i] != t; ++i) r += n.children[i].chunkSize();
        return r + t.first
    }

    function ri(e, t) {
        var r = e.first;
        e: do {
            for (var n = 0; n < e.children.length; ++n) {
                var i = e.children[n],
                    o = i.height;
                if (o > t) {
                    e = i;
                    continue e
                }
                t -= o, r += i.chunkSize()
            }
            return r
        } while (!e.lines);
        for (var n = 0; n < e.lines.length; ++n) {
            var a = e.lines[n],
                l = a.height;
            if (l > t) break;
            t -= l
        }
        return r + n
    }

    function ni(e) {
        e = yn(e);
        for (var t = 0, r = e.parent, n = 0; n < r.lines.length; ++n) {
            var i = r.lines[n];
            if (i == e) break;
            t += i.height
        }
        for (var o = r.parent; o; r = o, o = r.parent)
            for (var n = 0; n < o.children.length; ++n) {
                var a = o.children[n];
                if (a == r) break;
                t += a.height
            }
        return t
    }

    function ii(e) {
        var t = e.order;
        return null == t && (t = e.order = ll(e.text)), t
    }

    function oi(e) {
        this.done = [], this.undone = [], this.undoDepth = 1 / 0, this.lastModTime = this.lastSelTime = 0, this.lastOp = this.lastSelOp = null, this.lastOrigin = this.lastSelOrigin = null, this.generation = this.maxGeneration = e || 1
    }

    function ai(e, t) {
        var r = {
            from: _(t.from),
            to: Jo(t),
            text: Qn(e, t.from, t.to)
        };
        return hi(e, r, t.from.line, t.to.line + 1), Xn(e, function (e) {
            hi(e, r, t.from.line, t.to.line + 1)
        }, !0), r
    }

    function li(e) {
        for (; e.length;) {
            var t = Hi(e);
            if (!t.ranges) break;
            e.pop()
        }
    }

    function si(e, t) {
        return t ? (li(e.done), Hi(e.done)) : e.done.length && !Hi(e.done).ranges ? Hi(e.done) : e.done.length > 1 && !e.done[e.done.length - 2].ranges ? (e.done.pop(), Hi(e.done)) : void 0
    }

    function ci(e, t, r, n) {
        var i = e.history;
        i.undone.length = 0;
        var o, a = +new Date;
        if ((i.lastOp == n || i.lastOrigin == t.origin && t.origin && ("+" == t.origin.charAt(0) && e.cm && i.lastModTime > a - e.cm.options.historyEventDelay || "*" == t.origin.charAt(0))) && (o = si(i, i.lastOp == n))) {
            var l = Hi(o.changes);
            0 == Bo(t.from, t.to) && 0 == Bo(t.from, l.to) ? l.to = Jo(t) : o.changes.push(ai(e, t))
        } else {
            var s = Hi(i.done);
            for (s && s.ranges || fi(e.sel, i.done), o = {
                    changes: [ai(e, t)],
                    generation: i.generation
                }, i.done.push(o); i.done.length > i.undoDepth;) i.done.shift(), i.done[0].ranges || i.done.shift()
        }
        i.done.push(r), i.generation = ++i.maxGeneration, i.lastModTime = i.lastSelTime = a, i.lastOp = i.lastSelOp = n, i.lastOrigin = i.lastSelOrigin = t.origin, l || za(e, "historyAdded")
    }

    function ui(e, t, r, n) {
        var i = t.charAt(0);
        return "*" == i || "+" == i && r.ranges.length == n.ranges.length && r.somethingSelected() == n.somethingSelected() && new Date - e.history.lastSelTime <= (e.cm ? e.cm.options.historyEventDelay : 500)
    }

    function di(e, t, r, n) {
        var i = e.history,
            o = n && n.origin;
        r == i.lastSelOp || o && i.lastSelOrigin == o && (i.lastModTime == i.lastSelTime && i.lastOrigin == o || ui(e, o, Hi(i.done), t)) ? i.done[i.done.length - 1] = t : fi(t, i.done), i.lastSelTime = +new Date, i.lastSelOrigin = o, i.lastSelOp = r, n && n.clearRedo !== !1 && li(i.undone)
    }

    function fi(e, t) {
        var r = Hi(t);
        r && r.ranges && r.equals(e) || t.push(e)
    }

    function hi(e, t, r, n) {
        var i = t["spans_" + e.id],
            o = 0;
        e.iter(Math.max(e.first, r), Math.min(e.first + e.size, n), function (r) {
            r.markedSpans && ((i || (i = t["spans_" + e.id] = {}))[o] = r.markedSpans), ++o
        })
    }

    function pi(e) {
        if (!e) return null;
        for (var t, r = 0; r < e.length; ++r) e[r].marker.explicitlyCleared ? t || (t = e.slice(0, r)) : t && t.push(e[r]);
        return t ? t.length ? t : null : e
    }

    function gi(e, t) {
        var r = t["spans_" + e.id];
        if (!r) return null;
        for (var n = 0, i = []; n < t.text.length; ++n) i.push(pi(r[n]));
        return i
    }

    function mi(e, t, r) {
        for (var n = 0, i = []; n < e.length; ++n) {
            var o = e[n];
            if (o.ranges) i.push(r ? ue.prototype.deepCopy.call(o) : o);
            else {
                var a = o.changes,
                    l = [];
                i.push({
                    changes: l
                });
                for (var s = 0; s < a.length; ++s) {
                    var c, u = a[s];
                    if (l.push({
                            from: u.from,
                            to: u.to,
                            text: u.text
                        }), t)
                        for (var d in u)(c = d.match(/^spans_(\d+)$/)) && zi(t, Number(c[1])) > -1 && (Hi(l)[d] = u[d], delete u[d])
                }
            }
        }
        return i
    }

    function vi(e, t, r, n) {
        r < e.line ? e.line += n : t < e.line && (e.line = t, e.ch = 0)
    }

    function yi(e, t, r, n) {
        for (var i = 0; i < e.length; ++i) {
            var o = e[i],
                a = !0;
            if (o.ranges) {
                o.copied || (o = e[i] = o.deepCopy(), o.copied = !0);
                for (var l = 0; l < o.ranges.length; l++) vi(o.ranges[l].anchor, t, r, n), vi(o.ranges[l].head, t, r, n)
            } else {
                for (var l = 0; l < o.changes.length; ++l) {
                    var s = o.changes[l];
                    if (r < s.from.line) s.from = Fo(s.from.line + n, s.from.ch), s.to = Fo(s.to.line + n, s.to.ch);
                    else if (t <= s.to.line) {
                        a = !1;
                        break
                    }
                }
                a || (e.splice(0, i + 1), i = 0)
            }
        }
    }

    function bi(e, t) {
        var r = t.from.line,
            n = t.to.line,
            i = t.text.length - (n - r) - 1;
        yi(e.done, r, n, i), yi(e.undone, r, n, i)
    }

    function wi(e) {
        return null != e.defaultPrevented ? e.defaultPrevented : 0 == e.returnValue
    }

    function xi(e) {
        return e.target || e.srcElement
    }

    function ki(e) {
        var t = e.which;
        return null == t && (1 & e.button ? t = 1 : 2 & e.button ? t = 3 : 4 & e.button && (t = 2)), No && e.ctrlKey && 1 == t && (t = 3), t
    }

    function Ci(e, t, r) {
        var n = e._handlers && e._handlers[t];
        return r ? n && n.length > 0 ? n.slice() : Wa : n || Wa
    }

    function Si(e, t) {
        function r(e) {
            return function () {
                e.apply(null, o)
            }
        }
        var n = Ci(e, t, !1);
        if (n.length) {
            var i, o = Array.prototype.slice.call(arguments, 2);
            Go ? i = Go.delayedCallbacks : Da ? i = Da : (i = Da = [], setTimeout(Li, 0));
            for (var a = 0; a < n.length; ++a) i.push(r(n[a]))
        }
    }

    function Li() {
        var e = Da;
        Da = null;
        for (var t = 0; t < e.length; ++t) e[t]()
    }

    function Mi(e, t, r) {
        return "string" == typeof t && (t = {
            type: t,
            preventDefault: function () {
                this.defaultPrevented = !0
            }
        }), za(e, r || t.type, e, t), wi(t) || t.codemirrorIgnore
    }

    function Ti(e) {
        var t = e._handlers && e._handlers.cursorActivity;
        if (t)
            for (var r = e.curOp.cursorActivityHandlers || (e.curOp.cursorActivityHandlers = []), n = 0; n < t.length; ++n) - 1 == zi(r, t[n]) && r.push(t[n])
    }

    function Ai(e, t) {
        return Ci(e, t).length > 0
    }

    function Oi(e) {
        e.prototype.on = function (e, t) {
            Na(this, e, t)
        }, e.prototype.off = function (e, t) {
            Ha(this, e, t)
        }
    }

    function Ni() {
        this.id = null
    }

    function Wi(e) {
        for (; Ka.length <= e;) Ka.push(Hi(Ka) + " ");
        return Ka[e]
    }

    function Hi(e) {
        return e[e.length - 1]
    }

    function zi(e, t) {
        for (var r = 0; r < e.length; ++r)
            if (e[r] == t) return r;
        return -1
    }

    function Di(e, t) {
        for (var r = [], n = 0; n < e.length; n++) r[n] = t(e[n], n);
        return r
    }

    function Pi() {}

    function Ei(e, t) {
        var r;
        return Object.create ? r = Object.create(e) : (Pi.prototype = e, r = new Pi), t && Ii(t, r), r
    }

    function Ii(e, t, r) {
        t || (t = {});
        for (var n in e) !e.hasOwnProperty(n) || r === !1 && t.hasOwnProperty(n) || (t[n] = e[n]);
        return t
    }

    function Fi(e) {
        var t = Array.prototype.slice.call(arguments, 1);
        return function () {
            return e.apply(null, t)
        }
    }

    function Bi(e, t) {
        return t ? t.source.indexOf("\\w") > -1 && qa(e) ? !0 : t.test(e) : qa(e)
    }

    function Ri(e) {
        for (var t in e)
            if (e.hasOwnProperty(t) && e[t]) return !1;
        return !0
    }

    function ji(e) {
        return e.charCodeAt(0) >= 768 && _a.test(e)
    }

    function Ki(e, t, r, n) {
        var i = document.createElement(e);
        if (r && (i.className = r), n && (i.style.cssText = n), "string" == typeof t) i.appendChild(document.createTextNode(t));
        else if (t)
            for (var o = 0; o < t.length; ++o) i.appendChild(t[o]);
        return i
    }

    function Vi(e) {
        for (var t = e.childNodes.length; t > 0; --t) e.removeChild(e.firstChild);
        return e
    }

    function Ui(e, t) {
        return Vi(e).appendChild(t)
    }

    function Gi() {
        for (var e = document.activeElement; e && e.root && e.root.activeElement;) e = e.root.activeElement;
        return e
    }

    function qi(e) {
        return new RegExp("(^|\\s)" + e + "(?:$|\\s)\\s*")
    }

    function _i(e, t) {
        for (var r = e.split(" "), n = 0; n < r.length; n++) r[n] && !qi(r[n]).test(t) && (t += " " + r[n]);
        return t
    }

    function $i(e) {
        if (document.body.getElementsByClassName)
            for (var t = document.body.getElementsByClassName("CodeMirror"), r = 0; r < t.length; r++) {
                var n = t[r].CodeMirror;
                n && e(n)
            }
    }

    function Xi() {
        Ja || (Yi(), Ja = !0)
    }

    function Yi() {
        var e;
        Na(window, "resize", function () {
            null == e && (e = setTimeout(function () {
                e = null, $i(Ut)
            }, 100))
        }), Na(window, "blur", function () {
            $i(vr)
        })
    }

    function Zi(e) {
        if (null == Xa) {
            var t = Ki("span", "​");
            Ui(e, Ki("span", [t, document.createTextNode("x")])), 0 != e.firstChild.offsetHeight && (Xa = t.offsetWidth <= 1 && t.offsetHeight > 2 && !(bo && 8 > wo))
        }
        var r = Xa ? Ki("span", "​") : Ki("span", " ", null, "display: inline-block; width: 1px; margin-right: -1px");
        return r.setAttribute("cm-text", ""), r
    }

    function Qi(e) {
        if (null != Ya) return Ya;
        var t = Ui(e, document.createTextNode("AخA")),
            r = Ua(t, 0, 1).getBoundingClientRect();
        if (!r || r.left == r.right) return !1;
        var n = Ua(t, 1, 2).getBoundingClientRect();
        return Ya = n.right - r.right < 3
    }

    function Ji(e) {
        if (null != il) return il;
        var t = Ui(e, Ki("span", "x")),
            r = t.getBoundingClientRect(),
            n = Ua(t, 0, 1).getBoundingClientRect();
        return il = Math.abs(r.left - n.left) > 1
    }

    function eo(e, t, r, n) {
        if (!e) return n(t, r, "ltr");
        for (var i = !1, o = 0; o < e.length; ++o) {
            var a = e[o];
            (a.from < r && a.to > t || t == r && a.to == t) && (n(Math.max(a.from, t), Math.min(a.to, r), 1 == a.level ? "rtl" : "ltr"), i = !0)
        }
        i || n(t, r, "ltr")
    }

    function to(e) {
        return e.level % 2 ? e.to : e.from
    }

    function ro(e) {
        return e.level % 2 ? e.from : e.to
    }

    function no(e) {
        var t = ii(e);
        return t ? to(t[0]) : 0
    }

    function io(e) {
        var t = ii(e);
        return t ? ro(Hi(t)) : e.text.length
    }

    function oo(e, t) {
        var r = Zn(e.doc, t),
            n = yn(r);
        n != r && (t = ti(n));
        var i = ii(n),
            o = i ? i[0].level % 2 ? io(n) : no(n) : 0;
        return Fo(t, o)
    }

    function ao(e, t) {
        for (var r, n = Zn(e.doc, t); r = mn(n);) n = r.find(1, !0).line, t = null;
        var i = ii(n),
            o = i ? i[0].level % 2 ? no(n) : io(n) : n.text.length;
        return Fo(null == t ? ti(n) : t, o)
    }

    function lo(e, t) {
        var r = oo(e, t.line),
            n = Zn(e.doc, r.line),
            i = ii(n);
        if (!i || 0 == i[0].level) {
            var o = Math.max(0, n.text.search(/\S/)),
                a = t.line == r.line && t.ch <= o && t.ch;
            return Fo(r.line, a ? 0 : o)
        }
        return r
    }

    function so(e, t, r) {
        var n = e[0].level;
        return t == n ? !0 : r == n ? !1 : r > t
    }

    function co(e, t) {
        al = null;
        for (var r, n = 0; n < e.length; ++n) {
            var i = e[n];
            if (i.from < t && i.to > t) return n;
            if (i.from == t || i.to == t) {
                if (null != r) return so(e, i.level, e[r].level) ? (i.from != i.to && (al = r), n) : (i.from != i.to && (al = n), r);
                r = n
            }
        }
        return r
    }

    function uo(e, t, r, n) {
        if (!n) return t + r;
        do t += r; while (t > 0 && ji(e.text.charAt(t)));
        return t
    }

    function fo(e, t, r, n) {
        var i = ii(e);
        if (!i) return ho(e, t, r, n);
        for (var o = co(i, t), a = i[o], l = uo(e, t, a.level % 2 ? -r : r, n);;) {
            if (l > a.from && l < a.to) return l;
            if (l == a.from || l == a.to) return co(i, l) == o ? l : (a = i[o += r], r > 0 == a.level % 2 ? a.to : a.from);
            if (a = i[o += r], !a) return null;
            l = r > 0 == a.level % 2 ? uo(e, a.to, -1, n) : uo(e, a.from, 1, n)
        }
    }

    function ho(e, t, r, n) {
        var i = t + r;
        if (n)
            for (; i > 0 && ji(e.text.charAt(i));) i += r;
        return 0 > i || i > e.text.length ? null : i
    }
    var po = navigator.userAgent,
        go = navigator.platform,
        mo = /gecko\/\d/i.test(po),
        vo = /MSIE \d/.test(po),
        yo = /Trident\/(?:[7-9]|\d{2,})\..*rv:(\d+)/.exec(po),
        bo = vo || yo,
        wo = bo && (vo ? document.documentMode || 6 : yo[1]),
        xo = /WebKit\//.test(po),
        ko = xo && /Qt\/\d+\.\d+/.test(po),
        Co = /Chrome\//.test(po),
        So = /Opera\//.test(po),
        Lo = /Apple Computer/.test(navigator.vendor),
        Mo = /Mac OS X 1\d\D([8-9]|\d\d)\D/.test(po),
        To = /PhantomJS/.test(po),
        Ao = /AppleWebKit/.test(po) && /Mobile\/\w+/.test(po),
        Oo = Ao || /Android|webOS|BlackBerry|Opera Mini|Opera Mobi|IEMobile/i.test(po),
        No = Ao || /Mac/.test(go),
        Wo = /\bCrOS\b/.test(po),
        Ho = /win/i.test(go),
        zo = So && po.match(/Version\/(\d*\.\d*)/);
    zo && (zo = Number(zo[1])), zo && zo >= 15 && (So = !1, xo = !0);
    var Do = No && (ko || So && (null == zo || 12.11 > zo)),
        Po = mo || bo && wo >= 9,
        Eo = !1,
        Io = !1;
    g.prototype = Ii({
        update: function (e) {
            var t = e.scrollWidth > e.clientWidth + 1,
                r = e.scrollHeight > e.clientHeight + 1,
                n = e.nativeBarWidth;
            if (r) {
                this.vert.style.display = "block", this.vert.style.bottom = t ? n + "px" : "0";
                var i = e.viewHeight - (t ? n : 0);
                this.vert.firstChild.style.height = Math.max(0, e.scrollHeight - e.clientHeight + i) + "px"
            } else this.vert.style.display = "", this.vert.firstChild.style.height = "0";
            if (t) {
                this.horiz.style.display = "block", this.horiz.style.right = r ? n + "px" : "0", this.horiz.style.left = e.barLeft + "px";
                var o = e.viewWidth - e.barLeft - (r ? n : 0);
                this.horiz.firstChild.style.width = e.scrollWidth - e.clientWidth + o + "px"
            } else this.horiz.style.display = "", this.horiz.firstChild.style.width = "0";
            return !this.checkedZeroWidth && e.clientHeight > 0 && (0 == n && this.zeroWidthHack(), this.checkedZeroWidth = !0), {
                right: r ? n : 0,
                bottom: t ? n : 0
            }
        },
        setScrollLeft: function (e) {
            this.horiz.scrollLeft != e && (this.horiz.scrollLeft = e), this.disableHoriz && this.enableZeroWidthBar(this.horiz, this.disableHoriz)
        },
        setScrollTop: function (e) {
            this.vert.scrollTop != e && (this.vert.scrollTop = e), this.disableVert && this.enableZeroWidthBar(this.vert, this.disableVert)
        },
        zeroWidthHack: function () {
            var e = No && !Mo ? "12px" : "18px";
            this.horiz.style.height = this.vert.style.width = e, this.horiz.style.pointerEvents = this.vert.style.pointerEvents = "none", this.disableHoriz = new Ni, this.disableVert = new Ni
        },
        enableZeroWidthBar: function (e, t) {
            function r() {
                var n = e.getBoundingClientRect(),
                    i = document.elementFromPoint(n.left + 1, n.bottom - 1);
                i != e ? e.style.pointerEvents = "none" : t.set(1e3, r)
            }
            e.style.pointerEvents = "auto", t.set(1e3, r)
        },
        clear: function () {
            var e = this.horiz.parentNode;
            e.removeChild(this.horiz), e.removeChild(this.vert)
        }
    }, g.prototype), m.prototype = Ii({
        update: function () {
            return {
                bottom: 0,
                right: 0
            }
        },
        setScrollLeft: function () {},
        setScrollTop: function () {},
        clear: function () {}
    }, m.prototype), e.scrollbarModel = {
        "native": g,
        "null": m
    }, L.prototype.signal = function (e, t) {
        Ai(e, t) && this.events.push(arguments)
    }, L.prototype.finish = function () {
        for (var e = 0; e < this.events.length; e++) za.apply(null, this.events[e])
    };
    var Fo = e.Pos = function (e, t) {
            return this instanceof Fo ? (this.line = e, void(this.ch = t)) : new Fo(e, t)
        },
        Bo = e.cmpPos = function (e, t) {
            return e.line - t.line || e.ch - t.ch
        },
        Ro = null;
    re.prototype = Ii({
        init: function (e) {
            function t(e) {
                if (!Mi(n, e)) {
                    if (n.somethingSelected()) Ro = {
                        lineWise: !1,
                        text: n.getSelections()
                    }, r.inaccurateSelection && (r.prevInput = "", r.inaccurateSelection = !1, o.value = Ro.text.join("\n"), Va(o));
                    else {
                        if (!n.options.lineWiseCopyCut) return;
                        var t = ee(n);
                        Ro = {
                            lineWise: !0,
                            text: t.text
                        }, "cut" == e.type ? n.setSelections(t.ranges, null, Ia) : (r.prevInput = "", o.value = t.text.join("\n"), Va(o))
                    }
                    "cut" == e.type && (n.state.cutIncoming = !0)
                }
            }
            var r = this,
                n = this.cm,
                i = this.wrapper = ne(),
                o = this.textarea = i.firstChild;
            e.wrapper.insertBefore(i, e.wrapper.firstChild), Ao && (o.style.width = "0px"), Na(o, "input", function () {
                bo && wo >= 9 && r.hasSelection && (r.hasSelection = null), r.poll()
            }), Na(o, "paste", function (e) {
                Mi(n, e) || Q(e, n) || (n.state.pasteIncoming = !0, r.fastPoll())
            }), Na(o, "cut", t), Na(o, "copy", t), Na(e.scroller, "paste", function (t) {
                Gt(e, t) || Mi(n, t) || (n.state.pasteIncoming = !0, r.focus())
            }), Na(e.lineSpace, "selectstart", function (t) {
                Gt(e, t) || Ta(t)
            }), Na(o, "compositionstart", function () {
                var e = n.getCursor("from");
                r.composing && r.composing.range.clear(), r.composing = {
                    start: e,
                    range: n.markText(e, n.getCursor("to"), {
                        className: "CodeMirror-composing"
                    })
                }
            }), Na(o, "compositionend", function () {
                r.composing && (r.poll(), r.composing.range.clear(), r.composing = null)
            })
        },
        prepareSelection: function () {
            var e = this.cm,
                t = e.display,
                r = e.doc,
                n = Pe(e);
            if (e.options.moveInputWithCursor) {
                var i = ht(e, r.sel.primary().head, "div"),
                    o = t.wrapper.getBoundingClientRect(),
                    a = t.lineDiv.getBoundingClientRect();
                n.teTop = Math.max(0, Math.min(t.wrapper.clientHeight - 10, i.top + a.top - o.top)), n.teLeft = Math.max(0, Math.min(t.wrapper.clientWidth - 10, i.left + a.left - o.left))
            }
            return n
        },
        showSelection: function (e) {
            var t = this.cm,
                r = t.display;
            Ui(r.cursorDiv, e.cursors), Ui(r.selectionDiv, e.selection), null != e.teTop && (this.wrapper.style.top = e.teTop + "px", this.wrapper.style.left = e.teLeft + "px")
        },
        reset: function (e) {
            if (!this.contextMenuPending) {
                var t, r, n = this.cm,
                    i = n.doc;
                if (n.somethingSelected()) {
                    this.prevInput = "";
                    var o = i.sel.primary();
                    t = nl && (o.to().line - o.from().line > 100 || (r = n.getSelection()).length > 1e3);
                    var a = t ? "-" : r || n.getSelection();
                    this.textarea.value = a, n.state.focused && Va(this.textarea), bo && wo >= 9 && (this.hasSelection = a)
                } else e || (this.prevInput = this.textarea.value = "", bo && wo >= 9 && (this.hasSelection = null));
                this.inaccurateSelection = t
            }
        },
        getField: function () {
            return this.textarea
        },
        supportsTouch: function () {
            return !1
        },
        focus: function () {
            if ("nocursor" != this.cm.options.readOnly && (!Oo || Gi() != this.textarea)) try {
                this.textarea.focus()
            } catch (e) {}
        },
        blur: function () {
            this.textarea.blur()
        },
        resetPosition: function () {
            this.wrapper.style.top = this.wrapper.style.left = 0
        },
        receivedFocus: function () {
            this.slowPoll()
        },
        slowPoll: function () {
            var e = this;
            e.pollingFast || e.polling.set(this.cm.options.pollInterval, function () {
                e.poll(), e.cm.state.focused && e.slowPoll()
            })
        },
        fastPoll: function () {
            function e() {
                var n = r.poll();
                n || t ? (r.pollingFast = !1, r.slowPoll()) : (t = !0, r.polling.set(60, e))
            }
            var t = !1,
                r = this;
            r.pollingFast = !0, r.polling.set(20, e)
        },
        poll: function () {
            var e = this.cm,
                t = this.textarea,
                r = this.prevInput;
            if (this.contextMenuPending || !e.state.focused || rl(t) && !r && !this.composing || e.isReadOnly() || e.options.disableInput || e.state.keySeq) return !1;
            var n = t.value;
            if (n == r && !e.somethingSelected()) return !1;
            if (bo && wo >= 9 && this.hasSelection === n || No && /[\uf700-\uf7ff]/.test(n)) return e.display.input.reset(), !1;
            if (e.doc.sel == e.display.selForContextMenu) {
                var i = n.charCodeAt(0);
                if (8203 != i || r || (r = "​"), 8666 == i) return this.reset(), this.cm.execCommand("undo")
            }
            for (var o = 0, a = Math.min(r.length, n.length); a > o && r.charCodeAt(o) == n.charCodeAt(o);) ++o;
            var l = this;
            return Ot(e, function () {
                Z(e, n.slice(o), r.length - o, null, l.composing ? "*compose" : null), n.length > 1e3 || n.indexOf("\n") > -1 ? t.value = l.prevInput = "" : l.prevInput = n, l.composing && (l.composing.range.clear(), l.composing.range = e.markText(l.composing.start, e.getCursor("to"), {
                    className: "CodeMirror-composing"
                }))
            }), !0
        },
        ensurePolled: function () {
            this.pollingFast && this.poll() && (this.pollingFast = !1)
        },
        onKeyPress: function () {
            bo && wo >= 9 && (this.hasSelection = null), this.fastPoll()
        },
        onContextMenu: function (e) {
            function t() {
                if (null != a.selectionStart) {
                    var e = i.somethingSelected(),
                        t = "​" + (e ? a.value : "");
                    a.value = "⇚", a.value = t, n.prevInput = e ? "" : "​", a.selectionStart = 1, a.selectionEnd = t.length, o.selForContextMenu = i.doc.sel
                }
            }

            function r() {
                if (n.contextMenuPending = !1, n.wrapper.style.cssText = d, a.style.cssText = u, bo && 9 > wo && o.scrollbars.setScrollTop(o.scroller.scrollTop = s), null != a.selectionStart) {
                    (!bo || bo && 9 > wo) && t();
                    var e = 0,
                        r = function () {
                            o.selForContextMenu == i.doc.sel && 0 == a.selectionStart && a.selectionEnd > 0 && "​" == n.prevInput ? Nt(i, ua.selectAll)(i) : e++ < 10 ? o.detectingSelectAll = setTimeout(r, 500) : o.input.reset()
                        };
                    o.detectingSelectAll = setTimeout(r, 200)
                }
            }
            var n = this,
                i = n.cm,
                o = i.display,
                a = n.textarea,
                l = qt(i, e),
                s = o.scroller.scrollTop;
            if (l && !So) {
                var c = i.options.resetSelectionOnContextMenu;
                c && -1 == i.doc.sel.contains(l) && Nt(i, Me)(i.doc, he(l), Ia);
                var u = a.style.cssText,
                    d = n.wrapper.style.cssText;
                n.wrapper.style.cssText = "position: absolute";
                var f = n.wrapper.getBoundingClientRect();
                if (a.style.cssText = "position: absolute; width: 30px; height: 30px; top: " + (e.clientY - f.top - 5) + "px; left: " + (e.clientX - f.left - 5) + "px; z-index: 1000; background: " + (bo ? "rgba(255, 255, 255, .05)" : "transparent") + "; outline: none; border-width: 0; outline: none; overflow: hidden; opacity: .05; filter: alpha(opacity=5);", xo) var h = window.scrollY;
                if (o.input.focus(), xo && window.scrollTo(null, h), o.input.reset(), i.somethingSelected() || (a.value = n.prevInput = " "), n.contextMenuPending = !0, o.selForContextMenu = i.doc.sel, clearTimeout(o.detectingSelectAll), bo && wo >= 9 && t(), Po) {
                    Oa(e);
                    var p = function () {
                        Ha(window, "mouseup", p), setTimeout(r, 20)
                    };
                    Na(window, "mouseup", p)
                } else setTimeout(r, 50)
            }
        },
        readOnlyChanged: function (e) {
            e || this.reset()
        },
        setUneditable: Pi,
        needsContentAttribute: !1
    }, re.prototype), ie.prototype = Ii({
        init: function (e) {
            function t(e) {
                if (!Mi(n, e)) {
                    if (n.somethingSelected()) Ro = {
                        lineWise: !1,
                        text: n.getSelections()
                    }, "cut" == e.type && n.replaceSelection("", null, "cut");
                    else {
                        if (!n.options.lineWiseCopyCut) return;
                        var t = ee(n);
                        Ro = {
                            lineWise: !0,
                            text: t.text
                        }, "cut" == e.type && n.operation(function () {
                            n.setSelections(t.ranges, 0, Ia), n.replaceSelection("", null, "cut")
                        })
                    }
                    if (e.clipboardData && !Ao) e.preventDefault(), e.clipboardData.clearData(), e.clipboardData.setData("text/plain", Ro.text.join("\n"));
                    else {
                        var r = ne(),
                            i = r.firstChild;
                        n.display.lineSpace.insertBefore(r, n.display.lineSpace.firstChild), i.value = Ro.text.join("\n");
                        var o = document.activeElement;
                        Va(i), setTimeout(function () {
                            n.display.lineSpace.removeChild(r), o.focus()
                        }, 50)
                    }
                }
            }
            var r = this,
                n = r.cm,
                i = r.div = e.lineDiv;
            te(i), Na(i, "paste", function (e) {
                Mi(n, e) || Q(e, n)
            }), Na(i, "compositionstart", function (e) {
                var t = e.data;
                if (r.composing = {
                        sel: n.doc.sel,
                        data: t,
                        startData: t
                    }, t) {
                    var i = n.doc.sel.primary(),
                        o = n.getLine(i.head.line),
                        a = o.indexOf(t, Math.max(0, i.head.ch - t.length));
                    a > -1 && a <= i.head.ch && (r.composing.sel = he(Fo(i.head.line, a), Fo(i.head.line, a + t.length)))
                }
            }), Na(i, "compositionupdate", function (e) {
                r.composing.data = e.data
            }), Na(i, "compositionend", function (e) {
                var t = r.composing;
                t && (e.data == t.startData || /\u200b/.test(e.data) || (t.data = e.data), setTimeout(function () {
                    t.handled || r.applyComposition(t), r.composing == t && (r.composing = null)
                }, 50))
            }), Na(i, "touchstart", function () {
                r.forceCompositionEnd()
            }), Na(i, "input", function () {
                r.composing || (n.isReadOnly() || !r.pollContent()) && Ot(r.cm, function () {
                    Pt(n)
                })
            }), Na(i, "copy", t), Na(i, "cut", t)
        },
        prepareSelection: function () {
            var e = Pe(this.cm, !1);
            return e.focus = this.cm.state.focused, e
        },
        showSelection: function (e, t) {
            e && this.cm.display.view.length && ((e.focus || t) && this.showPrimarySelection(), this.showMultipleSelections(e))
        },
        showPrimarySelection: function () {
            var e = window.getSelection(),
                t = this.cm.doc.sel.primary(),
                r = le(this.cm, e.anchorNode, e.anchorOffset),
                n = le(this.cm, e.focusNode, e.focusOffset);
            if (!r || r.bad || !n || n.bad || 0 != Bo(X(r, n), t.from()) || 0 != Bo($(r, n), t.to())) {
                var i = oe(this.cm, t.from()),
                    o = oe(this.cm, t.to());
                if (i || o) {
                    var a = this.cm.display.view,
                        l = e.rangeCount && e.getRangeAt(0);
                    if (i) {
                        if (!o) {
                            var s = a[a.length - 1].measure,
                                c = s.maps ? s.maps[s.maps.length - 1] : s.map;
                            o = {
                                node: c[c.length - 1],
                                offset: c[c.length - 2] - c[c.length - 3]
                            }
                        }
                    } else i = {
                        node: a[0].measure.map[2],
                        offset: 0
                    };
                    try {
                        var u = Ua(i.node, i.offset, o.offset, o.node)
                    } catch (d) {}
                    u && (!mo && this.cm.state.focused ? (e.collapse(i.node, i.offset), u.collapsed || e.addRange(u)) : (e.removeAllRanges(), e.addRange(u)), l && null == e.anchorNode ? e.addRange(l) : mo && this.startGracePeriod()), this.rememberSelection()
                }
            }
        },
        startGracePeriod: function () {
            var e = this;
            clearTimeout(this.gracePeriod), this.gracePeriod = setTimeout(function () {
                e.gracePeriod = !1, e.selectionChanged() && e.cm.operation(function () {
                    e.cm.curOp.selectionChanged = !0
                })
            }, 20)
        },
        showMultipleSelections: function (e) {
            Ui(this.cm.display.cursorDiv, e.cursors), Ui(this.cm.display.selectionDiv, e.selection)
        },
        rememberSelection: function () {
            var e = window.getSelection();
            this.lastAnchorNode = e.anchorNode, this.lastAnchorOffset = e.anchorOffset, this.lastFocusNode = e.focusNode, this.lastFocusOffset = e.focusOffset
        },
        selectionInEditor: function () {
            var e = window.getSelection();
            if (!e.rangeCount) return !1;
            var t = e.getRangeAt(0).commonAncestorContainer;
            return $a(this.div, t)
        },
        focus: function () {
            "nocursor" != this.cm.options.readOnly && this.div.focus()
        },
        blur: function () {
            this.div.blur()
        },
        getField: function () {
            return this.div
        },
        supportsTouch: function () {
            return !0
        },
        receivedFocus: function () {
            function e() {
                t.cm.state.focused && (t.pollSelection(), t.polling.set(t.cm.options.pollInterval, e))
            }
            var t = this;
            this.selectionInEditor() ? this.pollSelection() : Ot(this.cm, function () {
                t.cm.curOp.selectionChanged = !0
            }), this.polling.set(this.cm.options.pollInterval, e)
        },
        selectionChanged: function () {
            var e = window.getSelection();
            return e.anchorNode != this.lastAnchorNode || e.anchorOffset != this.lastAnchorOffset || e.focusNode != this.lastFocusNode || e.focusOffset != this.lastFocusOffset
        },
        pollSelection: function () {
            if (!this.composing && !this.gracePeriod && this.selectionChanged()) {
                var e = window.getSelection(),
                    t = this.cm;
                this.rememberSelection();
                var r = le(t, e.anchorNode, e.anchorOffset),
                    n = le(t, e.focusNode, e.focusOffset);
                r && n && Ot(t, function () {
                    Me(t.doc, he(r, n), Ia), (r.bad || n.bad) && (t.curOp.selectionChanged = !0)
                })
            }
        },
        pollContent: function () {
            var e = this.cm,
                t = e.display,
                r = e.doc.sel.primary(),
                n = r.from(),
                i = r.to();
            if (n.line < t.viewFrom || i.line > t.viewTo - 1) return !1;
            var o;
            if (n.line == t.viewFrom || 0 == (o = Ft(e, n.line))) var a = ti(t.view[0].line),
                l = t.view[0].node;
            else var a = ti(t.view[o].line),
                l = t.view[o - 1].node.nextSibling;
            var s = Ft(e, i.line);
            if (s == t.view.length - 1) var c = t.viewTo - 1,
                u = t.lineDiv.lastChild;
            else var c = ti(t.view[s + 1].line) - 1,
                u = t.view[s + 1].node.previousSibling;
            for (var d = e.doc.splitLines(ce(e, l, u, a, c)), f = Qn(e.doc, Fo(a, 0), Fo(c, Zn(e.doc, c).text.length)); d.length > 1 && f.length > 1;)
                if (Hi(d) == Hi(f)) d.pop(), f.pop(), c--;
                else {
                    if (d[0] != f[0]) break;
                    d.shift(), f.shift(), a++
                } for (var h = 0, p = 0, g = d[0], m = f[0], v = Math.min(g.length, m.length); v > h && g.charCodeAt(h) == m.charCodeAt(h);) ++h;
            for (var y = Hi(d), b = Hi(f), w = Math.min(y.length - (1 == d.length ? h : 0), b.length - (1 == f.length ? h : 0)); w > p && y.charCodeAt(y.length - p - 1) == b.charCodeAt(b.length - p - 1);) ++p;
            d[d.length - 1] = y.slice(0, y.length - p), d[0] = d[0].slice(h);
            var x = Fo(a, h),
                k = Fo(c, f.length ? Hi(f).length - p : 0);
            return d.length > 1 || d[0] || Bo(x, k) ? (Wr(e.doc, d, x, k, "+input"), !0) : void 0
        },
        ensurePolled: function () {
            this.forceCompositionEnd()
        },
        reset: function () {
            this.forceCompositionEnd()
        },
        forceCompositionEnd: function () {
            this.composing && !this.composing.handled && (this.applyComposition(this.composing), this.composing.handled = !0, this.div.blur(), this.div.focus())
        },
        applyComposition: function (e) {
            this.cm.isReadOnly() ? Nt(this.cm, Pt)(this.cm) : e.data && e.data != e.startData && Nt(this.cm, Z)(this.cm, e.data, 0, e.sel)
        },
        setUneditable: function (e) {
            e.contentEditable = "false"
        },
        onKeyPress: function (e) {
            e.preventDefault(), this.cm.isReadOnly() || Nt(this.cm, Z)(this.cm, String.fromCharCode(null == e.charCode ? e.keyCode : e.charCode), 0)
        },
        readOnlyChanged: function (e) {
            this.div.contentEditable = String("nocursor" != e)
        },
        onContextMenu: Pi,
        resetPosition: Pi,
        needsContentAttribute: !0
    }, ie.prototype), e.inputStyles = {
        textarea: re,
        contenteditable: ie
    }, ue.prototype = {
        primary: function () {
            return this.ranges[this.primIndex]
        },
        equals: function (e) {
            if (e == this) return !0;
            if (e.primIndex != this.primIndex || e.ranges.length != this.ranges.length) return !1;
            for (var t = 0; t < this.ranges.length; t++) {
                var r = this.ranges[t],
                    n = e.ranges[t];
                if (0 != Bo(r.anchor, n.anchor) || 0 != Bo(r.head, n.head)) return !1
            }
            return !0
        },
        deepCopy: function () {
            for (var e = [], t = 0; t < this.ranges.length; t++) e[t] = new de(_(this.ranges[t].anchor), _(this.ranges[t].head));
            return new ue(e, this.primIndex)
        },
        somethingSelected: function () {
            for (var e = 0; e < this.ranges.length; e++)
                if (!this.ranges[e].empty()) return !0;
            return !1
        },
        contains: function (e, t) {
            t || (t = e);
            for (var r = 0; r < this.ranges.length; r++) {
                var n = this.ranges[r];
                if (Bo(t, n.from()) >= 0 && Bo(e, n.to()) <= 0) return r
            }
            return -1
        }
    }, de.prototype = {
        from: function () {
            return X(this.anchor, this.head)
        },
        to: function () {
            return $(this.anchor, this.head)
        },
        empty: function () {
            return this.head.line == this.anchor.line && this.head.ch == this.anchor.ch
        }
    };
    var jo, Ko, Vo, Uo = {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
        },
        Go = null,
        qo = 0,
        _o = 0,
        $o = 0,
        Xo = null;
    bo ? Xo = -.53 : mo ? Xo = 15 : Co ? Xo = -.7 : Lo && (Xo = -1 / 3);
    var Yo = function (e) {
        var t = e.wheelDeltaX,
            r = e.wheelDeltaY;
        return null == t && e.detail && e.axis == e.HORIZONTAL_AXIS && (t = e.detail), null == r && e.detail && e.axis == e.VERTICAL_AXIS ? r = e.detail : null == r && (r = e.wheelDelta), {
            x: t,
            y: r
        }
    };
    e.wheelEventPixels = function (e) {
        var t = Yo(e);
        return t.x *= Xo, t.y *= Xo, t
    };
    var Zo = new Ni,
        Qo = null,
        Jo = e.changeEnd = function (e) {
            return e.text ? Fo(e.from.line + e.text.length - 1, Hi(e.text).length + (1 == e.text.length ? e.from.ch : 0)) : e.to
        };
    e.prototype = {
        constructor: e,
        focus: function () {
            window.focus(), this.display.input.focus()
        },
        setOption: function (e, t) {
            var r = this.options,
                n = r[e];
            (r[e] != t || "mode" == e) && (r[e] = t, ta.hasOwnProperty(e) && Nt(this, ta[e])(this, t, n))
        },
        getOption: function (e) {
            return this.options[e]
        },
        getDoc: function () {
            return this.doc
        },
        addKeyMap: function (e, t) {
            this.state.keyMaps[t ? "push" : "unshift"](qr(e))
        },
        removeKeyMap: function (e) {
            for (var t = this.state.keyMaps, r = 0; r < t.length; ++r)
                if (t[r] == e || t[r].name == e) return t.splice(r, 1), !0
        },
        addOverlay: Wt(function (t, r) {
            var n = t.token ? t : e.getMode(this.options, t);
            if (n.startState) throw new Error("Overlays may not be stateful.");
            this.state.overlays.push({
                mode: n,
                modeSpec: t,
                opaque: r && r.opaque
            }), this.state.modeGen++, Pt(this)
        }),
        removeOverlay: Wt(function (e) {
            for (var t = this.state.overlays, r = 0; r < t.length; ++r) {
                var n = t[r].modeSpec;
                if (n == e || "string" == typeof e && n.name == e) return t.splice(r, 1), this.state.modeGen++, void Pt(this)
            }
        }),
        indentLine: Wt(function (e, t, r) {
            "string" != typeof t && "number" != typeof t && (t = null == t ? this.options.smartIndent ? "smart" : "prev" : t ? "add" : "subtract"), ve(this.doc, e) && Br(this, e, t, r)
        }),
        indentSelection: Wt(function (e) {
            for (var t = this.doc.sel.ranges, r = -1, n = 0; n < t.length; n++) {
                var i = t[n];
                if (i.empty()) i.head.line > r && (Br(this, i.head.line, e, !0), r = i.head.line, n == this.doc.sel.primIndex && Ir(this));
                else {
                    var o = i.from(),
                        a = i.to(),
                        l = Math.max(r, o.line);
                    r = Math.min(this.lastLine(), a.line - (a.ch ? 0 : 1)) + 1;
                    for (var s = l; r > s; ++s) Br(this, s, e);
                    var c = this.doc.sel.ranges;
                    0 == o.ch && t.length == c.length && c[n].from().ch > 0 && ke(this.doc, n, new de(o, c[n].to()), Ia)
                }
            }
        }),
        getTokenAt: function (e, t) {
            return Hn(this, e, t)
        },
        getLineTokens: function (e, t) {
            return Hn(this, Fo(e), t, !0)
        },
        getTokenTypeAt: function (e) {
            e = ge(this.doc, e);
            var t, r = Pn(this, Zn(this.doc, e.line)),
                n = 0,
                i = (r.length - 1) / 2,
                o = e.ch;
            if (0 == o) t = r[2];
            else
                for (;;) {
                    var a = n + i >> 1;
                    if ((a ? r[2 * a - 1] : 0) >= o) i = a;
                    else {
                        if (!(r[2 * a + 1] < o)) {
                            t = r[2 * a + 2];
                            break
                        }
                        n = a + 1
                    }
                }
            var l = t ? t.indexOf("cm-overlay ") : -1;
            return 0 > l ? t : 0 == l ? null : t.slice(0, l - 1)
        },
        getModeAt: function (t) {
            var r = this.doc.mode;
            return r.innerMode ? e.innerMode(r, this.getTokenAt(t).state).mode : r
        },
        getHelper: function (e, t) {
            return this.getHelpers(e, t)[0]
        },
        getHelpers: function (e, t) {
            var r = [];
            if (!la.hasOwnProperty(t)) return r;
            var n = la[t],
                i = this.getModeAt(e);
            if ("string" == typeof i[t]) n[i[t]] && r.push(n[i[t]]);
            else if (i[t])
                for (var o = 0; o < i[t].length; o++) {
                    var a = n[i[t][o]];
                    a && r.push(a)
                } else i.helperType && n[i.helperType] ? r.push(n[i.helperType]) : n[i.name] && r.push(n[i.name]);
            for (var o = 0; o < n._global.length; o++) {
                var l = n._global[o];
                l.pred(i, this) && -1 == zi(r, l.val) && r.push(l.val)
            }
            return r
        },
        getStateAfter: function (e, t) {
            var r = this.doc;
            return e = pe(r, null == e ? r.first + r.size - 1 : e), Ke(this, e + 1, t)
        },
        cursorCoords: function (e, t) {
            var r, n = this.doc.sel.primary();
            return r = null == e ? n.head : "object" == typeof e ? ge(this.doc, e) : e ? n.from() : n.to(), ht(this, r, t || "page")
        },
        charCoords: function (e, t) {
            return ft(this, ge(this.doc, e), t || "page")
        },
        coordsChar: function (e, t) {
            return e = dt(this, e, t || "page"), mt(this, e.left, e.top)
        },
        lineAtHeight: function (e, t) {
            return e = dt(this, {
                top: e,
                left: 0
            }, t || "page").top, ri(this.doc, e + this.display.viewOffset)
        },
        heightAtLine: function (e, t) {
            var r, n = !1;
            if ("number" == typeof e) {
                var i = this.doc.first + this.doc.size - 1;
                e < this.doc.first ? e = this.doc.first : e > i && (e = i, n = !0), r = Zn(this.doc, e)
            } else r = e;
            return ut(this, r, {
                top: 0,
                left: 0
            }, t || "page").top + (n ? this.doc.height - ni(r) : 0)
        },
        defaultTextHeight: function () {
            return yt(this.display)
        },
        defaultCharWidth: function () {
            return bt(this.display)
        },
        setGutterMarker: Wt(function (e, t, r) {
            return Rr(this.doc, e, "gutter", function (e) {
                var n = e.gutterMarkers || (e.gutterMarkers = {});
                return n[t] = r, !r && Ri(n) && (e.gutterMarkers = null), !0
            })
        }),
        clearGutter: Wt(function (e) {
            var t = this,
                r = t.doc,
                n = r.first;
            r.iter(function (r) {
                r.gutterMarkers && r.gutterMarkers[e] && (r.gutterMarkers[e] = null, Et(t, n, "gutter"), Ri(r.gutterMarkers) && (r.gutterMarkers = null)), ++n
            })
        }),
        lineInfo: function (e) {
            if ("number" == typeof e) {
                if (!ve(this.doc, e)) return null;
                var t = e;
                if (e = Zn(this.doc, e), !e) return null
            } else {
                var t = ti(e);
                if (null == t) return null
            }
            return {
                line: t,
                handle: e,
                text: e.text,
                gutterMarkers: e.gutterMarkers,
                textClass: e.textClass,
                bgClass: e.bgClass,
                wrapClass: e.wrapClass,
                widgets: e.widgets
            }
        },
        getViewport: function () {
            return {
                from: this.display.viewFrom,
                to: this.display.viewTo
            }
        },
        addWidget: function (e, t, r, n, i) {
            var o = this.display;
            e = ht(this, ge(this.doc, e));
            var a = e.bottom,
                l = e.left;
            if (t.style.position = "absolute", t.setAttribute("cm-ignore-events", "true"), this.display.input.setUneditable(t), o.sizer.appendChild(t), "over" == n) a = e.top;
            else if ("above" == n || "near" == n) {
                var s = Math.max(o.wrapper.clientHeight, this.doc.height),
                    c = Math.max(o.sizer.clientWidth, o.lineSpace.clientWidth);
                ("above" == n || e.bottom + t.offsetHeight > s) && e.top > t.offsetHeight ? a = e.top - t.offsetHeight : e.bottom + t.offsetHeight <= s && (a = e.bottom), l + t.offsetWidth > c && (l = c - t.offsetWidth)
            }
            t.style.top = a + "px", t.style.left = t.style.right = "", "right" == i ? (l = o.sizer.clientWidth - t.offsetWidth, t.style.right = "0px") : ("left" == i ? l = 0 : "middle" == i && (l = (o.sizer.clientWidth - t.offsetWidth) / 2), t.style.left = l + "px"), r && Dr(this, l, a, l + t.offsetWidth, a + t.offsetHeight)
        },
        triggerOnKeyDown: Wt(dr),
        triggerOnKeyPress: Wt(pr),
        triggerOnKeyUp: hr,
        execCommand: function (e) {
            return ua.hasOwnProperty(e) ? ua[e].call(null, this) : void 0
        },
        triggerElectric: Wt(function (e) {
            J(this, e)
        }),
        findPosH: function (e, t, r, n) {
            var i = 1;
            0 > t && (i = -1, t = -t);
            for (var o = 0, a = ge(this.doc, e); t > o && (a = Kr(this.doc, a, i, r, n), !a.hitSide); ++o);
            return a
        },
        moveH: Wt(function (e, t) {
            var r = this;
            r.extendSelectionsBy(function (n) {
                return r.display.shift || r.doc.extend || n.empty() ? Kr(r.doc, n.head, e, t, r.options.rtlMoveVisually) : 0 > e ? n.from() : n.to()
            }, Ba)
        }),
        deleteH: Wt(function (e, t) {
            var r = this.doc.sel,
                n = this.doc;
            r.somethingSelected() ? n.replaceSelection("", null, "+delete") : jr(this, function (r) {
                var i = Kr(n, r.head, e, t, !1);
                return 0 > e ? {
                    from: i,
                    to: r.head
                } : {
                    from: r.head,
                    to: i
                }
            })
        }),
        findPosV: function (e, t, r, n) {
            var i = 1,
                o = n;
            0 > t && (i = -1, t = -t);
            for (var a = 0, l = ge(this.doc, e); t > a; ++a) {
                var s = ht(this, l, "div");
                if (null == o ? o = s.left : s.left = o, l = Vr(this, s, i, r), l.hitSide) break
            }
            return l
        },
        moveV: Wt(function (e, t) {
            var r = this,
                n = this.doc,
                i = [],
                o = !r.display.shift && !n.extend && n.sel.somethingSelected();
            if (n.extendSelectionsBy(function (a) {
                    if (o) return 0 > e ? a.from() : a.to();
                    var l = ht(r, a.head, "div");
                    null != a.goalColumn && (l.left = a.goalColumn), i.push(l.left);
                    var s = Vr(r, l, e, t);
                    return "page" == t && a == n.sel.primary() && Er(r, null, ft(r, s, "div").top - l.top), s
                }, Ba), i.length)
                for (var a = 0; a < n.sel.ranges.length; a++) n.sel.ranges[a].goalColumn = i[a]
        }),
        findWordAt: function (e) {
            var t = this.doc,
                r = Zn(t, e.line).text,
                n = e.ch,
                i = e.ch;
            if (r) {
                var o = this.getHelper(e, "wordChars");
                (e.xRel < 0 || i == r.length) && n ? --n : ++i;
                for (var a = r.charAt(n), l = Bi(a, o) ? function (e) {
                        return Bi(e, o)
                    } : /\s/.test(a) ? function (e) {
                        return /\s/.test(e)
                    } : function (e) {
                        return !/\s/.test(e) && !Bi(e)
                    }; n > 0 && l(r.charAt(n - 1));) --n;
                for (; i < r.length && l(r.charAt(i));) ++i
            }
            return new de(Fo(e.line, n), Fo(e.line, i))
        },
        toggleOverwrite: function (e) {
            (null == e || e != this.state.overwrite) && ((this.state.overwrite = !this.state.overwrite) ? Qa(this.display.cursorDiv, "CodeMirror-overwrite") : Za(this.display.cursorDiv, "CodeMirror-overwrite"), za(this, "overwriteToggle", this, this.state.overwrite))
        },
        hasFocus: function () {
            return this.display.input.getField() == Gi()
        },
        isReadOnly: function () {
            return !(!this.options.readOnly && !this.doc.cantEdit)
        },
        scrollTo: Wt(function (e, t) {
            (null != e || null != t) && Fr(this), null != e && (this.curOp.scrollLeft = e), null != t && (this.curOp.scrollTop = t)
        }),
        getScrollInfo: function () {
            var e = this.display.scroller;
            return {
                left: e.scrollLeft,
                top: e.scrollTop,
                height: e.scrollHeight - qe(this) - this.display.barHeight,
                width: e.scrollWidth - qe(this) - this.display.barWidth,
                clientHeight: $e(this),
                clientWidth: _e(this)
            }
        },
        scrollIntoView: Wt(function (e, t) {
            if (null == e ? (e = {
                    from: this.doc.sel.primary().head,
                    to: null
                }, null == t && (t = this.options.cursorScrollMargin)) : "number" == typeof e ? e = {
                    from: Fo(e, 0),
                    to: null
                } : null == e.from && (e = {
                    from: e,
                    to: null
                }), e.to || (e.to = e.from), e.margin = t || 0, null != e.from.line) Fr(this), this.curOp.scrollToPos = e;
            else {
                var r = Pr(this, Math.min(e.from.left, e.to.left), Math.min(e.from.top, e.to.top) - e.margin, Math.max(e.from.right, e.to.right), Math.max(e.from.bottom, e.to.bottom) + e.margin);
                this.scrollTo(r.scrollLeft, r.scrollTop)
            }
        }),
        setSize: Wt(function (e, t) {
            function r(e) {
                return "number" == typeof e || /^\d+$/.test(String(e)) ? e + "px" : e
            }
            var n = this;
            null != e && (n.display.wrapper.style.width = r(e)), null != t && (n.display.wrapper.style.height = r(t)), n.options.lineWrapping && at(this);
            var i = n.display.viewFrom;
            n.doc.iter(i, n.display.viewTo, function (e) {
                if (e.widgets)
                    for (var t = 0; t < e.widgets.length; t++)
                        if (e.widgets[t].noHScroll) {
                            Et(n, i, "widget");
                            break
                        }++ i
            }), n.curOp.forceUpdate = !0, za(n, "refresh", this)
        }),
        operation: function (e) {
            return Ot(this, e)
        },
        refresh: Wt(function () {
            var e = this.display.cachedTextHeight;
            Pt(this), this.curOp.forceUpdate = !0, lt(this), this.scrollTo(this.doc.scrollLeft, this.doc.scrollTop), u(this), (null == e || Math.abs(e - yt(this.display)) > .5) && a(this), za(this, "refresh", this)
        }),
        swapDoc: Wt(function (e) {
            var t = this.doc;
            return t.cm = null, Yn(this, e), lt(this), this.display.input.reset(), this.scrollTo(e.scrollLeft, e.scrollTop), this.curOp.forceScroll = !0, Si(this, "swapDoc", this, t), t
        }),
        getInputField: function () {
            return this.display.input.getField()
        },
        getWrapperElement: function () {
            return this.display.wrapper
        },
        getScrollerElement: function () {
            return this.display.scroller
        },
        getGutterElement: function () {
            return this.display.gutters
        }
    }, Oi(e);
    var ea = e.defaults = {},
        ta = e.optionHandlers = {},
        ra = e.Init = {
            toString: function () {
                return "CodeMirror.Init"
            }
        };
    Ur("value", "", function (e, t) {
        e.setValue(t)
    }, !0), Ur("mode", null, function (e, t) {
        e.doc.modeOption = t, r(e)
    }, !0), Ur("indentUnit", 2, r, !0), Ur("indentWithTabs", !1), Ur("smartIndent", !0), Ur("tabSize", 4, function (e) {
        n(e), lt(e), Pt(e)
    }, !0), Ur("lineSeparator", null, function (e, t) {
        if (e.doc.lineSep = t, t) {
            var r = [],
                n = e.doc.first;
            e.doc.iter(function (e) {
                for (var i = 0;;) {
                    var o = e.text.indexOf(t, i);
                    if (-1 == o) break;
                    i = o + t.length, r.push(Fo(n, o))
                }
                n++
            });
            for (var i = r.length - 1; i >= 0; i--) Wr(e.doc, t, r[i], Fo(r[i].line, r[i].ch + t.length))
        }
    }), Ur("specialChars", /[\u0000-\u001f\u007f\u00ad\u200b-\u200f\u2028\u2029\ufeff]/g, function (t, r, n) {
        t.state.specialChars = new RegExp(r.source + (r.test("  ") ? "" : "|  "), "g"), n != e.Init && t.refresh()
    }), Ur("specialCharPlaceholder", Bn, function (e) {
        e.refresh()
    }, !0), Ur("electricChars", !0), Ur("inputStyle", Oo ? "contenteditable" : "textarea", function () {
        throw new Error("inputStyle can not (yet) be changed in a running editor")
    }, !0), Ur("rtlMoveVisually", !Ho), Ur("wholeLineUpdateBefore", !0), Ur("theme", "default", function (e) {
        l(e), s(e)
    }, !0), Ur("keyMap", "default", function (t, r, n) {
        var i = qr(r),
            o = n != e.Init && qr(n);
        o && o.detach && o.detach(t, i), i.attach && i.attach(t, o || null)
    }), Ur("extraKeys", null), Ur("lineWrapping", !1, i, !0), Ur("gutters", [], function (e) {
        h(e.options), s(e)
    }, !0), Ur("fixedGutter", !0, function (e, t) {
        e.display.gutters.style.left = t ? S(e.display) + "px" : "0", e.refresh()
    }, !0), Ur("coverGutterNextToScrollbar", !1, function (e) {
        y(e)
    }, !0), Ur("scrollbarStyle", "native", function (e) {
        v(e), y(e), e.display.scrollbars.setScrollTop(e.doc.scrollTop), e.display.scrollbars.setScrollLeft(e.doc.scrollLeft)
    }, !0), Ur("lineNumbers", !1, function (e) {
        h(e.options), s(e)
    }, !0), Ur("firstLineNumber", 1, s, !0), Ur("lineNumberFormatter", function (e) {
        return e
    }, s, !0), Ur("showCursorWhenSelecting", !1, De, !0), Ur("resetSelectionOnContextMenu", !0), Ur("lineWiseCopyCut", !0), Ur("readOnly", !1, function (e, t) {
        "nocursor" == t ? (vr(e), e.display.input.blur(), e.display.disabled = !0) : e.display.disabled = !1, e.display.input.readOnlyChanged(t)
    }), Ur("disableInput", !1, function (e, t) {
        t || e.display.input.reset()
    }, !0), Ur("dragDrop", !0, Vt), Ur("allowDropFileTypes", null), Ur("cursorBlinkRate", 530), Ur("cursorScrollMargin", 0), Ur("cursorHeight", 1, De, !0), Ur("singleCursorHeightPerLine", !0, De, !0), Ur("workTime", 100), Ur("workDelay", 100), Ur("flattenSpans", !0, n, !0), Ur("addModeClass", !1, n, !0), Ur("pollInterval", 100), Ur("undoDepth", 200, function (e, t) {
        e.doc.history.undoDepth = t
    }), Ur("historyEventDelay", 1250), Ur("viewportMargin", 10, function (e) {
        e.refresh()
    }, !0), Ur("maxHighlightLength", 1e4, n, !0), Ur("moveInputWithCursor", !0, function (e, t) {
        t || e.display.input.resetPosition()
    }), Ur("tabindex", null, function (e, t) {
        e.display.input.getField().tabIndex = t || ""
    }), Ur("autofocus", null);
    var na = e.modes = {},
        ia = e.mimeModes = {};
    e.defineMode = function (t, r) {
        e.defaults.mode || "null" == t || (e.defaults.mode = t), arguments.length > 2 && (r.dependencies = Array.prototype.slice.call(arguments, 2)), na[t] = r
    }, e.defineMIME = function (e, t) {
        ia[e] = t
    }, e.resolveMode = function (t) {
        if ("string" == typeof t && ia.hasOwnProperty(t)) t = ia[t];
        else if (t && "string" == typeof t.name && ia.hasOwnProperty(t.name)) {
            var r = ia[t.name];
            "string" == typeof r && (r = {
                name: r
            }), t = Ei(r, t), t.name = r.name
        } else if ("string" == typeof t && /^[\w\-]+\/[\w\-]+\+xml$/.test(t)) return e.resolveMode("application/xml");
        return "string" == typeof t ? {
            name: t
        } : t || {
            name: "null"
        }
    }, e.getMode = function (t, r) {
        var r = e.resolveMode(r),
            n = na[r.name];
        if (!n) return e.getMode(t, "text/plain");
        var i = n(t, r);
        if (oa.hasOwnProperty(r.name)) {
            var o = oa[r.name];
            for (var a in o) o.hasOwnProperty(a) && (i.hasOwnProperty(a) && (i["_" + a] = i[a]), i[a] = o[a])
        }
        if (i.name = r.name, r.helperType && (i.helperType = r.helperType), r.modeProps)
            for (var a in r.modeProps) i[a] = r.modeProps[a];
        return i
    }, e.defineMode("null", function () {
        return {
            token: function (e) {
                e.skipToEnd()
            }
        }
    }), e.defineMIME("text/plain", "null");
    var oa = e.modeExtensions = {};
    e.extendMode = function (e, t) {
        var r = oa.hasOwnProperty(e) ? oa[e] : oa[e] = {};
        Ii(t, r)
    }, e.defineExtension = function (t, r) {
        e.prototype[t] = r
    }, e.defineDocExtension = function (e, t) {
        Sa.prototype[e] = t
    }, e.defineOption = Ur;
    var aa = [];
    e.defineInitHook = function (e) {
        aa.push(e)
    };
    var la = e.helpers = {};
    e.registerHelper = function (t, r, n) {
        la.hasOwnProperty(t) || (la[t] = e[t] = {
            _global: []
        }), la[t][r] = n
    }, e.registerGlobalHelper = function (t, r, n, i) {
        e.registerHelper(t, r, i), la[t]._global.push({
            pred: n,
            val: i
        })
    };
    var sa = e.copyState = function (e, t) {
            if (t === !0) return t;
            if (e.copyState) return e.copyState(t);
            var r = {};
            for (var n in t) {
                var i = t[n];
                i instanceof Array && (i = i.concat([])), r[n] = i
            }
            return r
        },
        ca = e.startState = function (e, t, r) {
            return e.startState ? e.startState(t, r) : !0
        };
    e.innerMode = function (e, t) {
        for (; e.innerMode;) {
            var r = e.innerMode(t);
            if (!r || r.mode == e) break;
            t = r.state, e = r.mode
        }
        return r || {
            mode: e,
            state: t
        }
    };
    var ua = e.commands = {
            selectAll: function (e) {
                e.setSelection(Fo(e.firstLine(), 0), Fo(e.lastLine()), Ia)
            },
            singleSelection: function (e) {
                e.setSelection(e.getCursor("anchor"), e.getCursor("head"), Ia)
            },
            killLine: function (e) {
                jr(e, function (t) {
                    if (t.empty()) {
                        var r = Zn(e.doc, t.head.line).text.length;
                        return t.head.ch == r && t.head.line < e.lastLine() ? {
                            from: t.head,
                            to: Fo(t.head.line + 1, 0)
                        } : {
                            from: t.head,
                            to: Fo(t.head.line, r)
                        }
                    }
                    return {
                        from: t.from(),
                        to: t.to()
                    }
                })
            },
            deleteLine: function (e) {
                jr(e, function (t) {
                    return {
                        from: Fo(t.from().line, 0),
                        to: ge(e.doc, Fo(t.to().line + 1, 0))
                    }
                })
            },
            delLineLeft: function (e) {
                jr(e, function (e) {
                    return {
                        from: Fo(e.from().line, 0),
                        to: e.from()
                    }
                })
            },
            delWrappedLineLeft: function (e) {
                jr(e, function (t) {
                    var r = e.charCoords(t.head, "div").top + 5,
                        n = e.coordsChar({
                            left: 0,
                            top: r
                        }, "div");
                    return {
                        from: n,
                        to: t.from()
                    }
                })
            },
            delWrappedLineRight: function (e) {
                jr(e, function (t) {
                    var r = e.charCoords(t.head, "div").top + 5,
                        n = e.coordsChar({
                            left: e.display.lineDiv.offsetWidth + 100,
                            top: r
                        }, "div");
                    return {
                        from: t.from(),
                        to: n
                    }
                })
            },
            undo: function (e) {
                e.undo()
            },
            redo: function (e) {
                e.redo()
            },
            undoSelection: function (e) {
                e.undoSelection()
            },
            redoSelection: function (e) {
                e.redoSelection()
            },
            goDocStart: function (e) {
                e.extendSelection(Fo(e.firstLine(), 0))
            },
            goDocEnd: function (e) {
                e.extendSelection(Fo(e.lastLine()))
            },
            goLineStart: function (e) {
                e.extendSelectionsBy(function (t) {
                    return oo(e, t.head.line)
                }, {
                    origin: "+move",
                    bias: 1
                })
            },
            goLineStartSmart: function (e) {
                e.extendSelectionsBy(function (t) {
                    return lo(e, t.head)
                }, {
                    origin: "+move",
                    bias: 1
                })
            },
            goLineEnd: function (e) {
                e.extendSelectionsBy(function (t) {
                    return ao(e, t.head.line)
                }, {
                    origin: "+move",
                    bias: -1
                })
            },
            goLineRight: function (e) {
                e.extendSelectionsBy(function (t) {
                    var r = e.charCoords(t.head, "div").top + 5;
                    return e.coordsChar({
                        left: e.display.lineDiv.offsetWidth + 100,
                        top: r
                    }, "div")
                }, Ba)
            },
            goLineLeft: function (e) {
                e.extendSelectionsBy(function (t) {
                    var r = e.charCoords(t.head, "div").top + 5;
                    return e.coordsChar({
                        left: 0,
                        top: r
                    }, "div")
                }, Ba)
            },
            goLineLeftSmart: function (e) {
                e.extendSelectionsBy(function (t) {
                    var r = e.charCoords(t.head, "div").top + 5,
                        n = e.coordsChar({
                            left: 0,
                            top: r
                        }, "div");
                    return n.ch < e.getLine(n.line).search(/\S/) ? lo(e, t.head) : n
                }, Ba)
            },
            goLineUp: function (e) {
                e.moveV(-1, "line")
            },
            goLineDown: function (e) {
                e.moveV(1, "line")
            },
            goPageUp: function (e) {
                e.moveV(-1, "page")
            },
            goPageDown: function (e) {
                e.moveV(1, "page")
            },
            goCharLeft: function (e) {
                e.moveH(-1, "char")
            },
            goCharRight: function (e) {
                e.moveH(1, "char")
            },
            goColumnLeft: function (e) {
                e.moveH(-1, "column")
            },
            goColumnRight: function (e) {
                e.moveH(1, "column")
            },
            goWordLeft: function (e) {
                e.moveH(-1, "word")
            },
            goGroupRight: function (e) {
                e.moveH(1, "group")
            },
            goGroupLeft: function (e) {
                e.moveH(-1, "group")
            },
            goWordRight: function (e) {
                e.moveH(1, "word")
            },
            delCharBefore: function (e) {
                e.deleteH(-1, "char")
            },
            delCharAfter: function (e) {
                e.deleteH(1, "char")
            },
            delWordBefore: function (e) {
                e.deleteH(-1, "word")
            },
            delWordAfter: function (e) {
                e.deleteH(1, "word")
            },
            delGroupBefore: function (e) {
                e.deleteH(-1, "group")
            },
            delGroupAfter: function (e) {
                e.deleteH(1, "group")
            },
            indentAuto: function (e) {
                e.indentSelection("smart")
            },
            indentMore: function (e) {
                e.indentSelection("add")
            },
            indentLess: function (e) {
                e.indentSelection("subtract")
            },
            insertTab: function (e) {
                e.replaceSelection(" ")
            },
            insertSoftTab: function (e) {
                for (var t = [], r = e.listSelections(), n = e.options.tabSize, i = 0; i < r.length; i++) {
                    var o = r[i].from(),
                        a = Ra(e.getLine(o.line), o.ch, n);
                    t.push(Wi(n - a % n))
                }
                e.replaceSelections(t)
            },
            defaultTab: function (e) {
                e.somethingSelected() ? e.indentSelection("add") : e.execCommand("insertTab")
            },
            transposeChars: function (e) {
                Ot(e, function () {
                    for (var t = e.listSelections(), r = [], n = 0; n < t.length; n++) {
                        var i = t[n].head,
                            o = Zn(e.doc, i.line).text;
                        if (o)
                            if (i.ch == o.length && (i = new Fo(i.line, i.ch - 1)), i.ch > 0) i = new Fo(i.line, i.ch + 1), e.replaceRange(o.charAt(i.ch - 1) + o.charAt(i.ch - 2), Fo(i.line, i.ch - 2), i, "+transpose");
                            else if (i.line > e.doc.first) {
                            var a = Zn(e.doc, i.line - 1).text;
                            a && e.replaceRange(o.charAt(0) + e.doc.lineSeparator() + a.charAt(a.length - 1), Fo(i.line - 1, a.length - 1), Fo(i.line, 1), "+transpose")
                        }
                        r.push(new de(i, i))
                    }
                    e.setSelections(r)
                })
            },
            newlineAndIndent: function (e) {
                Ot(e, function () {
                    for (var t = e.listSelections().length, r = 0; t > r; r++) {
                        var n = e.listSelections()[r];
                        e.replaceRange(e.doc.lineSeparator(), n.anchor, n.head, "+input"), e.indentLine(n.from().line + 1, null, !0)
                    }
                    Ir(e)
                })
            },
            openLine: function (e) {
                e.replaceSelection("\n", "start")
            },
            toggleOverwrite: function (e) {
                e.toggleOverwrite()
            }
        },
        da = e.keyMap = {};
    da.basic = {
        Left: "goCharLeft",
        Right: "goCharRight",
        Up: "goLineUp",
        Down: "goLineDown",
        End: "goLineEnd",
        Home: "goLineStartSmart",
        PageUp: "goPageUp",
        PageDown: "goPageDown",
        Delete: "delCharAfter",
        Backspace: "delCharBefore",
        "Shift-Backspace": "delCharBefore",
        Tab: "defaultTab",
        "Shift-Tab": "indentAuto",
        Enter: "newlineAndIndent",
        Insert: "toggleOverwrite",
        Esc: "singleSelection"
    }, da.pcDefault = {
        "Ctrl-A": "selectAll",
        "Ctrl-D": "deleteLine",
        "Ctrl-Z": "undo",
        "Shift-Ctrl-Z": "redo",
        "Ctrl-Y": "redo",
        "Ctrl-Home": "goDocStart",
        "Ctrl-End": "goDocEnd",
        "Ctrl-Up": "goLineUp",
        "Ctrl-Down": "goLineDown",
        "Ctrl-Left": "goGroupLeft",
        "Ctrl-Right": "goGroupRight",
        "Alt-Left": "goLineStart",
        "Alt-Right": "goLineEnd",
        "Ctrl-Backspace": "delGroupBefore",
        "Ctrl-Delete": "delGroupAfter",
        "Ctrl-S": "save",
        "Ctrl-F": "find",
        "Ctrl-G": "findNext",
        "Shift-Ctrl-G": "findPrev",
        "Shift-Ctrl-F": "replace",
        "Shift-Ctrl-R": "replaceAll",
        "Ctrl-[": "indentLess",
        "Ctrl-]": "indentMore",
        "Ctrl-U": "undoSelection",
        "Shift-Ctrl-U": "redoSelection",
        "Alt-U": "redoSelection",
        fallthrough: "basic"
    }, da.emacsy = {
        "Ctrl-F": "goCharRight",
        "Ctrl-B": "goCharLeft",
        "Ctrl-P": "goLineUp",
        "Ctrl-N": "goLineDown",
        "Alt-F": "goWordRight",
        "Alt-B": "goWordLeft",
        "Ctrl-A": "goLineStart",
        "Ctrl-E": "goLineEnd",
        "Ctrl-V": "goPageDown",
        "Shift-Ctrl-V": "goPageUp",
        "Ctrl-D": "delCharAfter",
        "Ctrl-H": "delCharBefore",
        "Alt-D": "delWordAfter",
        "Alt-Backspace": "delWordBefore",
        "Ctrl-K": "killLine",
        "Ctrl-T": "transposeChars",
        "Ctrl-O": "openLine"
    }, da.macDefault = {
        "Cmd-A": "selectAll",
        "Cmd-D": "deleteLine",
        "Cmd-Z": "undo",
        "Shift-Cmd-Z": "redo",
        "Cmd-Y": "redo",
        "Cmd-Home": "goDocStart",
        "Cmd-Up": "goDocStart",
        "Cmd-End": "goDocEnd",
        "Cmd-Down": "goDocEnd",
        "Alt-Left": "goGroupLeft",
        "Alt-Right": "goGroupRight",
        "Cmd-Left": "goLineLeft",
        "Cmd-Right": "goLineRight",
        "Alt-Backspace": "delGroupBefore",
        "Ctrl-Alt-Backspace": "delGroupAfter",
        "Alt-Delete": "delGroupAfter",
        "Cmd-S": "save",
        "Cmd-F": "find",
        "Cmd-G": "findNext",
        "Shift-Cmd-G": "findPrev",
        "Cmd-Alt-F": "replace",
        "Shift-Cmd-Alt-F": "replaceAll",
        "Cmd-[": "indentLess",
        "Cmd-]": "indentMore",
        "Cmd-Backspace": "delWrappedLineLeft",
        "Cmd-Delete": "delWrappedLineRight",
        "Cmd-U": "undoSelection",
        "Shift-Cmd-U": "redoSelection",
        "Ctrl-Up": "goDocStart",
        "Ctrl-Down": "goDocEnd",
        fallthrough: ["basic", "emacsy"]
    }, da["default"] = No ? da.macDefault : da.pcDefault, e.normalizeKeyMap = function (e) {
        var t = {};
        for (var r in e)
            if (e.hasOwnProperty(r)) {
                var n = e[r];
                if (/^(name|fallthrough|(de|at)tach)$/.test(r)) continue;
                if ("..." == n) {
                    delete e[r];
                    continue
                }
                for (var i = Di(r.split(" "), Gr), o = 0; o < i.length; o++) {
                    var a, l;
                    o == i.length - 1 ? (l = i.join(" "), a = n) : (l = i.slice(0, o + 1).join(" "), a = "...");
                    var s = t[l];
                    if (s) {
                        if (s != a) throw new Error("Inconsistent bindings for " + l)
                    } else t[l] = a
                }
                delete e[r]
            } for (var c in t) e[c] = t[c];
        return e
    };
    var fa = e.lookupKey = function (e, t, r, n) {
            t = qr(t);
            var i = t.call ? t.call(e, n) : t[e];
            if (i === !1) return "nothing";
            if ("..." === i) return "multi";
            if (null != i && r(i)) return "handled";
            if (t.fallthrough) {
                if ("[object Array]" != Object.prototype.toString.call(t.fallthrough)) return fa(e, t.fallthrough, r, n);
                for (var o = 0; o < t.fallthrough.length; o++) {
                    var a = fa(e, t.fallthrough[o], r, n);
                    if (a) return a
                }
            }
        },
        ha = e.isModifierKey = function (e) {
            var t = "string" == typeof e ? e : ol[e.keyCode];
            return "Ctrl" == t || "Alt" == t || "Shift" == t || "Mod" == t
        },
        pa = e.keyName = function (e, t) {
            if (So && 34 == e.keyCode && e["char"]) return !1;
            var r = ol[e.keyCode],
                n = r;
            return null == n || e.altGraphKey ? !1 : (e.altKey && "Alt" != r && (n = "Alt-" + n), (Do ? e.metaKey : e.ctrlKey) && "Ctrl" != r && (n = "Ctrl-" + n), (Do ? e.ctrlKey : e.metaKey) && "Cmd" != r && (n = "Cmd-" + n), !t && e.shiftKey && "Shift" != r && (n = "Shift-" + n), n)
        };
    e.fromTextArea = function (t, r) {
        function n() {
            t.value = c.getValue()
        }
        if (r = r ? Ii(r) : {}, r.value = t.value, !r.tabindex && t.tabIndex && (r.tabindex = t.tabIndex), !r.placeholder && t.placeholder && (r.placeholder = t.placeholder), null == r.autofocus) {
            var i = Gi();
            r.autofocus = i == t || null != t.getAttribute("autofocus") && i == document.body
        }
        if (t.form && (Na(t.form, "submit", n), !r.leaveSubmitMethodAlone)) {
            var o = t.form,
                a = o.submit;
            try {
                var l = o.submit = function () {
                    n(), o.submit = a, o.submit(), o.submit = l
                }
            } catch (s) {}
        }
        r.finishInit = function (e) {
            e.save = n, e.getTextArea = function () {
                return t
            }, e.toTextArea = function () {
                e.toTextArea = isNaN, n(), t.parentNode.removeChild(e.getWrapperElement()), t.style.display = "", t.form && (Ha(t.form, "submit", n), "function" == typeof t.form.submit && (t.form.submit = a))
            }
        }, t.style.display = "none";
        var c = e(function (e) {
            t.parentNode.insertBefore(e, t.nextSibling)
        }, r);
        return c
    };
    var ga = e.StringStream = function (e, t) {
        this.pos = this.start = 0, this.string = e, this.tabSize = t || 8, this.lastColumnPos = this.lastColumnValue = 0, this.lineStart = 0
    };
    ga.prototype = {
        eol: function () {
            return this.pos >= this.string.length
        },
        sol: function () {
            return this.pos == this.lineStart
        },
        peek: function () {
            return this.string.charAt(this.pos) || void 0
        },
        next: function () {
            return this.pos < this.string.length ? this.string.charAt(this.pos++) : void 0
        },
        eat: function (e) {
            var t = this.string.charAt(this.pos);
            if ("string" == typeof e) var r = t == e;
            else var r = t && (e.test ? e.test(t) : e(t));
            return r ? (++this.pos, t) : void 0
        },
        eatWhile: function (e) {
            for (var t = this.pos; this.eat(e););
            return this.pos > t
        },
        eatSpace: function () {
            for (var e = this.pos;
                /[\s\u00a0]/.test(this.string.charAt(this.pos));) ++this.pos;
            return this.pos > e
        },
        skipToEnd: function () {
            this.pos = this.string.length
        },
        skipTo: function (e) {
            var t = this.string.indexOf(e, this.pos);
            return t > -1 ? (this.pos = t, !0) : void 0
        },
        backUp: function (e) {
            this.pos -= e
        },
        column: function () {
            return this.lastColumnPos < this.start && (this.lastColumnValue = Ra(this.string, this.start, this.tabSize, this.lastColumnPos, this.lastColumnValue), this.lastColumnPos = this.start), this.lastColumnValue - (this.lineStart ? Ra(this.string, this.lineStart, this.tabSize) : 0)
        },
        indentation: function () {
            return Ra(this.string, null, this.tabSize) - (this.lineStart ? Ra(this.string, this.lineStart, this.tabSize) : 0)
        },
        match: function (e, t, r) {
            if ("string" != typeof e) {
                var n = this.string.slice(this.pos).match(e);
                return n && n.index > 0 ? null : (n && t !== !1 && (this.pos += n[0].length), n)
            }
            var i = function (e) {
                    return r ? e.toLowerCase() : e
                },
                o = this.string.substr(this.pos, e.length);
            return i(o) == i(e) ? (t !== !1 && (this.pos += e.length), !0) : void 0
        },
        current: function () {
            return this.string.slice(this.start, this.pos)
        },
        hideFirstChars: function (e, t) {
            this.lineStart += e;
            try {
                return t()
            } finally {
                this.lineStart -= e
            }
        }
    };
    var ma = 0,
        va = e.TextMarker = function (e, t) {
            this.lines = [], this.type = t, this.doc = e, this.id = ++ma
        };
    Oi(va), va.prototype.clear = function () {
        if (!this.explicitlyCleared) {
            var e = this.doc.cm,
                t = e && !e.curOp;
            if (t && wt(e), Ai(this, "clear")) {
                var r = this.find();
                r && Si(this, "clear", r.from, r.to)
            }
            for (var n = null, i = null, o = 0; o < this.lines.length; ++o) {
                var a = this.lines[o],
                    l = Jr(a.markedSpans, this);
                e && !this.collapsed ? Et(e, ti(a), "text") : e && (null != l.to && (i = ti(a)), null != l.from && (n = ti(a))), a.markedSpans = en(a.markedSpans, l), null == l.from && this.collapsed && !kn(this.doc, a) && e && ei(a, yt(e.display))
            }
            if (e && this.collapsed && !e.options.lineWrapping)
                for (var o = 0; o < this.lines.length; ++o) {
                    var s = yn(this.lines[o]),
                        c = d(s);
                    c > e.display.maxLineLength && (e.display.maxLine = s, e.display.maxLineLength = c, e.display.maxLineChanged = !0)
                }
            null != n && e && this.collapsed && Pt(e, n, i + 1), this.lines.length = 0, this.explicitlyCleared = !0, this.atomic && this.doc.cantEdit && (this.doc.cantEdit = !1, e && Oe(e.doc)), e && Si(e, "markerCleared", e, this), t && kt(e), this.parent && this.parent.clear()
        }
    }, va.prototype.find = function (e, t) {
        null == e && "bookmark" == this.type && (e = 1);
        for (var r, n, i = 0; i < this.lines.length; ++i) {
            var o = this.lines[i],
                a = Jr(o.markedSpans, this);
            if (null != a.from && (r = Fo(t ? o : ti(o), a.from), -1 == e)) return r;
            if (null != a.to && (n = Fo(t ? o : ti(o), a.to), 1 == e)) return n
        }
        return r && {
            from: r,
            to: n
        }
    }, va.prototype.changed = function () {
        var e = this.find(-1, !0),
            t = this,
            r = this.doc.cm;
        e && r && Ot(r, function () {
            var n = e.line,
                i = ti(e.line),
                o = Je(r, i);
            if (o && (ot(o), r.curOp.selectionChanged = r.curOp.forceUpdate = !0), r.curOp.updateMaxLine = !0, !kn(t.doc, n) && null != t.height) {
                var a = t.height;
                t.height = null;
                var l = Ln(t) - a;
                l && ei(n, n.height + l)
            }
        })
    }, va.prototype.attachLine = function (e) {
        if (!this.lines.length && this.doc.cm) {
            var t = this.doc.cm.curOp;
            t.maybeHiddenMarkers && -1 != zi(t.maybeHiddenMarkers, this) || (t.maybeUnhiddenMarkers || (t.maybeUnhiddenMarkers = [])).push(this)
        }
        this.lines.push(e)
    }, va.prototype.detachLine = function (e) {
        if (this.lines.splice(zi(this.lines, e), 1), !this.lines.length && this.doc.cm) {
            var t = this.doc.cm.curOp;
            (t.maybeHiddenMarkers || (t.maybeHiddenMarkers = [])).push(this)
        }
    };
    var ma = 0,
        ya = e.SharedTextMarker = function (e, t) {
            this.markers = e, this.primary = t;
            for (var r = 0; r < e.length; ++r) e[r].parent = this
        };
    Oi(ya), ya.prototype.clear = function () {
        if (!this.explicitlyCleared) {
            this.explicitlyCleared = !0;
            for (var e = 0; e < this.markers.length; ++e) this.markers[e].clear();
            Si(this, "clear")
        }
    }, ya.prototype.find = function (e, t) {
        return this.primary.find(e, t)
    };
    var ba = e.LineWidget = function (e, t, r) {
        if (r)
            for (var n in r) r.hasOwnProperty(n) && (this[n] = r[n]);
        this.doc = e, this.node = t
    };
    Oi(ba), ba.prototype.clear = function () {
        var e = this.doc.cm,
            t = this.line.widgets,
            r = this.line,
            n = ti(r);
        if (null != n && t) {
            for (var i = 0; i < t.length; ++i) t[i] == this && t.splice(i--, 1);
            t.length || (r.widgets = null);
            var o = Ln(this);
            ei(r, Math.max(0, r.height - o)), e && Ot(e, function () {
                Sn(e, r, -o), Et(e, n, "widget")
            })
        }
    }, ba.prototype.changed = function () {
        var e = this.height,
            t = this.doc.cm,
            r = this.line;
        this.height = null;
        var n = Ln(this) - e;
        n && (ei(r, r.height + n), t && Ot(t, function () {
            t.curOp.forceUpdate = !0, Sn(t, r, n)
        }))
    };
    var wa = e.Line = function (e, t, r) {
        this.text = e, un(this, t), this.height = r ? r(this) : 1
    };
    Oi(wa), wa.prototype.lineNo = function () {
        return ti(this)
    };
    var xa = {},
        ka = {};
    _n.prototype = {
        chunkSize: function () {
            return this.lines.length
        },
        removeInner: function (e, t) {
            for (var r = e, n = e + t; n > r; ++r) {
                var i = this.lines[r];
                this.height -= i.height, An(i), Si(i, "delete")
            }
            this.lines.splice(e, t)
        },
        collapse: function (e) {
            e.push.apply(e, this.lines)
        },
        insertInner: function (e, t, r) {
            this.height += r, this.lines = this.lines.slice(0, e).concat(t).concat(this.lines.slice(e));
            for (var n = 0; n < t.length; ++n) t[n].parent = this
        },
        iterN: function (e, t, r) {
            for (var n = e + t; n > e; ++e)
                if (r(this.lines[e])) return !0
        }
    }, $n.prototype = {
        chunkSize: function () {
            return this.size
        },
        removeInner: function (e, t) {
            this.size -= t;
            for (var r = 0; r < this.children.length; ++r) {
                var n = this.children[r],
                    i = n.chunkSize();
                if (i > e) {
                    var o = Math.min(t, i - e),
                        a = n.height;
                    if (n.removeInner(e, o), this.height -= a - n.height, i == o && (this.children.splice(r--, 1), n.parent = null), 0 == (t -= o)) break;
                    e = 0
                } else e -= i
            }
            if (this.size - t < 25 && (this.children.length > 1 || !(this.children[0] instanceof _n))) {
                var l = [];
                this.collapse(l), this.children = [new _n(l)], this.children[0].parent = this
            }
        },
        collapse: function (e) {
            for (var t = 0; t < this.children.length; ++t) this.children[t].collapse(e)
        },
        insertInner: function (e, t, r) {
            this.size += t.length, this.height += r;
            for (var n = 0; n < this.children.length; ++n) {
                var i = this.children[n],
                    o = i.chunkSize();
                if (o >= e) {
                    if (i.insertInner(e, t, r), i.lines && i.lines.length > 50) {
                        for (var a = i.lines.length % 25 + 25, l = a; l < i.lines.length;) {
                            var s = new _n(i.lines.slice(l, l += 25));
                            i.height -= s.height, this.children.splice(++n, 0, s), s.parent = this
                        }
                        i.lines = i.lines.slice(0, a), this.maybeSpill()
                    }
                    break
                }
                e -= o
            }
        },
        maybeSpill: function () {
            if (!(this.children.length <= 10)) {
                var e = this;
                do {
                    var t = e.children.splice(e.children.length - 5, 5),
                        r = new $n(t);
                    if (e.parent) {
                        e.size -= r.size, e.height -= r.height;
                        var n = zi(e.parent.children, e);
                        e.parent.children.splice(n + 1, 0, r)
                    } else {
                        var i = new $n(e.children);
                        i.parent = e, e.children = [i, r], e = i
                    }
                    r.parent = e.parent
                } while (e.children.length > 10);
                e.parent.maybeSpill()
            }
        },
        iterN: function (e, t, r) {
            for (var n = 0; n < this.children.length; ++n) {
                var i = this.children[n],
                    o = i.chunkSize();
                if (o > e) {
                    var a = Math.min(t, o - e);
                    if (i.iterN(e, a, r)) return !0;
                    if (0 == (t -= a)) break;
                    e = 0
                } else e -= o
            }
        }
    };
    var Ca = 0,
        Sa = e.Doc = function (e, t, r, n) {
            if (!(this instanceof Sa)) return new Sa(e, t, r, n);
            null == r && (r = 0), $n.call(this, [new _n([new wa("", null)])]), this.first = r, this.scrollTop = this.scrollLeft = 0, this.cantEdit = !1, this.cleanGeneration = 1, this.frontier = r;
            var i = Fo(r, 0);
            this.sel = he(i), this.history = new oi(null), this.id = ++Ca, this.modeOption = t, this.lineSep = n, this.extend = !1, "string" == typeof e && (e = this.splitLines(e)), qn(this, {
                from: i,
                to: i,
                text: e
            }), Me(this, he(i), Ia)
        };
    Sa.prototype = Ei($n.prototype, {
        constructor: Sa,
        iter: function (e, t, r) {
            r ? this.iterN(e - this.first, t - e, r) : this.iterN(this.first, this.first + this.size, e)
        },
        insert: function (e, t) {
            for (var r = 0, n = 0; n < t.length; ++n) r += t[n].height;
            this.insertInner(e - this.first, t, r)
        },
        remove: function (e, t) {
            this.removeInner(e - this.first, t)
        },
        getValue: function (e) {
            var t = Jn(this, this.first, this.first + this.size);
            return e === !1 ? t : t.join(e || this.lineSeparator())
        },
        setValue: Ht(function (e) {
            var t = Fo(this.first, 0),
                r = this.first + this.size - 1;
            Lr(this, {
                from: t,
                to: Fo(r, Zn(this, r).text.length),
                text: this.splitLines(e),
                origin: "setValue",
                full: !0
            }, !0), Me(this, he(t))
        }),
        replaceRange: function (e, t, r, n) {
            t = ge(this, t), r = r ? ge(this, r) : t, Wr(this, e, t, r, n)
        },
        getRange: function (e, t, r) {
            var n = Qn(this, ge(this, e), ge(this, t));
            return r === !1 ? n : n.join(r || this.lineSeparator())
        },
        getLine: function (e) {
            var t = this.getLineHandle(e);
            return t && t.text
        },
        getLineHandle: function (e) {
            return ve(this, e) ? Zn(this, e) : void 0
        },
        getLineNumber: function (e) {
            return ti(e)
        },
        getLineHandleVisualStart: function (e) {
            return "number" == typeof e && (e = Zn(this, e)), yn(e)
        },
        lineCount: function () {
            return this.size
        },
        firstLine: function () {
            return this.first
        },
        lastLine: function () {
            return this.first + this.size - 1
        },
        clipPos: function (e) {
            return ge(this, e)
        },
        getCursor: function (e) {
            var t, r = this.sel.primary();
            return t = null == e || "head" == e ? r.head : "anchor" == e ? r.anchor : "end" == e || "to" == e || e === !1 ? r.to() : r.from()
        },
        listSelections: function () {
            return this.sel.ranges
        },
        somethingSelected: function () {
            return this.sel.somethingSelected()
        },
        setCursor: Ht(function (e, t, r) {
            Ce(this, ge(this, "number" == typeof e ? Fo(e, t || 0) : e), null, r)
        }),
        setSelection: Ht(function (e, t, r) {
            Ce(this, ge(this, e), ge(this, t || e), r)
        }),
        extendSelection: Ht(function (e, t, r) {
            we(this, ge(this, e), t && ge(this, t), r)
        }),
        extendSelections: Ht(function (e, t) {
            xe(this, ye(this, e), t)
        }),
        extendSelectionsBy: Ht(function (e, t) {
            var r = Di(this.sel.ranges, e);
            xe(this, ye(this, r), t)
        }),
        setSelections: Ht(function (e, t, r) {
            if (e.length) {
                for (var n = 0, i = []; n < e.length; n++) i[n] = new de(ge(this, e[n].anchor), ge(this, e[n].head));
                null == t && (t = Math.min(e.length - 1, this.sel.primIndex)), Me(this, fe(i, t), r)
            }
        }),
        addSelection: Ht(function (e, t, r) {
            var n = this.sel.ranges.slice(0);
            n.push(new de(ge(this, e), ge(this, t || e))), Me(this, fe(n, n.length - 1), r)
        }),
        getSelection: function (e) {
            for (var t, r = this.sel.ranges, n = 0; n < r.length; n++) {
                var i = Qn(this, r[n].from(), r[n].to());
                t = t ? t.concat(i) : i
            }
            return e === !1 ? t : t.join(e || this.lineSeparator())
        },
        getSelections: function (e) {
            for (var t = [], r = this.sel.ranges, n = 0; n < r.length; n++) {
                var i = Qn(this, r[n].from(), r[n].to());
                e !== !1 && (i = i.join(e || this.lineSeparator())), t[n] = i
            }
            return t
        },
        replaceSelection: function (e, t, r) {
            for (var n = [], i = 0; i < this.sel.ranges.length; i++) n[i] = e;
            this.replaceSelections(n, t, r || "+input")
        },
        replaceSelections: Ht(function (e, t, r) {
            for (var n = [], i = this.sel, o = 0; o < i.ranges.length; o++) {
                var a = i.ranges[o];
                n[o] = {
                    from: a.from(),
                    to: a.to(),
                    text: this.splitLines(e[o]),
                    origin: r
                }
            }
            for (var l = t && "end" != t && Cr(this, n, t), o = n.length - 1; o >= 0; o--) Lr(this, n[o]);
            l ? Le(this, l) : this.cm && Ir(this.cm)
        }),
        undo: Ht(function () {
            Tr(this, "undo")
        }),
        redo: Ht(function () {
            Tr(this, "redo")
        }),
        undoSelection: Ht(function () {
            Tr(this, "undo", !0)
        }),
        redoSelection: Ht(function () {
            Tr(this, "redo", !0)
        }),
        setExtending: function (e) {
            this.extend = e
        },
        getExtending: function () {
            return this.extend
        },
        historySize: function () {
            for (var e = this.history, t = 0, r = 0, n = 0; n < e.done.length; n++) e.done[n].ranges || ++t;
            for (var n = 0; n < e.undone.length; n++) e.undone[n].ranges || ++r;
            return {
                undo: t,
                redo: r
            }
        },
        clearHistory: function () {
            this.history = new oi(this.history.maxGeneration)
        },
        markClean: function () {
            this.cleanGeneration = this.changeGeneration(!0)
        },
        changeGeneration: function (e) {
            return e && (this.history.lastOp = this.history.lastSelOp = this.history.lastOrigin = null), this.history.generation
        },
        isClean: function (e) {
            return this.history.generation == (e || this.cleanGeneration)
        },
        getHistory: function () {
            return {
                done: mi(this.history.done),
                undone: mi(this.history.undone)
            }
        },
        setHistory: function (e) {
            var t = this.history = new oi(this.history.maxGeneration);
            t.done = mi(e.done.slice(0), null, !0), t.undone = mi(e.undone.slice(0), null, !0)
        },
        addLineClass: Ht(function (e, t, r) {
            return Rr(this, e, "gutter" == t ? "gutter" : "class", function (e) {
                var n = "text" == t ? "textClass" : "background" == t ? "bgClass" : "gutter" == t ? "gutterClass" : "wrapClass";
                if (e[n]) {
                    if (qi(r).test(e[n])) return !1;
                    e[n] += " " + r
                } else e[n] = r;
                return !0
            })
        }),
        removeLineClass: Ht(function (e, t, r) {
            return Rr(this, e, "gutter" == t ? "gutter" : "class", function (e) {
                var n = "text" == t ? "textClass" : "background" == t ? "bgClass" : "gutter" == t ? "gutterClass" : "wrapClass",
                    i = e[n];
                if (!i) return !1;
                if (null == r) e[n] = null;
                else {
                    var o = i.match(qi(r));
                    if (!o) return !1;
                    var a = o.index + o[0].length;
                    e[n] = i.slice(0, o.index) + (o.index && a != i.length ? " " : "") + i.slice(a) || null
                }
                return !0
            })
        }),
        addLineWidget: Ht(function (e, t, r) {
            return Mn(this, e, t, r)
        }),
        removeLineWidget: function (e) {
            e.clear()
        },
        markText: function (e, t, r) {
            return _r(this, ge(this, e), ge(this, t), r, r && r.type || "range")
        },
        setBookmark: function (e, t) {
            var r = {
                replacedWith: t && (null == t.nodeType ? t.widget : t),
                insertLeft: t && t.insertLeft,
                clearWhenEmpty: !1,
                shared: t && t.shared,
                handleMouseEvents: t && t.handleMouseEvents
            };
            return e = ge(this, e), _r(this, e, e, r, "bookmark")
        },
        findMarksAt: function (e) {
            e = ge(this, e);
            var t = [],
                r = Zn(this, e.line).markedSpans;
            if (r)
                for (var n = 0; n < r.length; ++n) {
                    var i = r[n];
                    (null == i.from || i.from <= e.ch) && (null == i.to || i.to >= e.ch) && t.push(i.marker.parent || i.marker)
                }
            return t
        },
        findMarks: function (e, t, r) {
            e = ge(this, e), t = ge(this, t);
            var n = [],
                i = e.line;
            return this.iter(e.line, t.line + 1, function (o) {
                var a = o.markedSpans;
                if (a)
                    for (var l = 0; l < a.length; l++) {
                        var s = a[l];
                        null != s.to && i == e.line && e.ch >= s.to || null == s.from && i != e.line || null != s.from && i == t.line && s.from >= t.ch || r && !r(s.marker) || n.push(s.marker.parent || s.marker)
                    }++i
            }), n
        },
        getAllMarks: function () {
            var e = [];
            return this.iter(function (t) {
                var r = t.markedSpans;
                if (r)
                    for (var n = 0; n < r.length; ++n) null != r[n].from && e.push(r[n].marker)
            }), e
        },
        posFromIndex: function (e) {
            var t, r = this.first,
                n = this.lineSeparator().length;
            return this.iter(function (i) {
                var o = i.text.length + n;
                return o > e ? (t = e, !0) : (e -= o, void++r)
            }), ge(this, Fo(r, t))
        },
        indexFromPos: function (e) {
            e = ge(this, e);
            var t = e.ch;
            if (e.line < this.first || e.ch < 0) return 0;
            var r = this.lineSeparator().length;
            return this.iter(this.first, e.line, function (e) {
                t += e.text.length + r
            }), t
        },
        copy: function (e) {
            var t = new Sa(Jn(this, this.first, this.first + this.size), this.modeOption, this.first, this.lineSep);
            return t.scrollTop = this.scrollTop, t.scrollLeft = this.scrollLeft, t.sel = this.sel, t.extend = !1, e && (t.history.undoDepth = this.history.undoDepth, t.setHistory(this.getHistory())), t
        },
        linkedDoc: function (e) {
            e || (e = {});
            var t = this.first,
                r = this.first + this.size;
            null != e.from && e.from > t && (t = e.from), null != e.to && e.to < r && (r = e.to);
            var n = new Sa(Jn(this, t, r), e.mode || this.modeOption, t, this.lineSep);
            return e.sharedHist && (n.history = this.history), (this.linked || (this.linked = [])).push({
                doc: n,
                sharedHist: e.sharedHist
            }), n.linked = [{
                doc: this,
                isParent: !0,
                sharedHist: e.sharedHist
            }], Yr(n, Xr(this)), n
        },
        unlinkDoc: function (t) {
            if (t instanceof e && (t = t.doc), this.linked)
                for (var r = 0; r < this.linked.length; ++r) {
                    var n = this.linked[r];
                    if (n.doc == t) {
                        this.linked.splice(r, 1), t.unlinkDoc(this), Zr(Xr(this));
                        break
                    }
                }
            if (t.history == this.history) {
                var i = [t.id];
                Xn(t, function (e) {
                    i.push(e.id)
                }, !0), t.history = new oi(null), t.history.done = mi(this.history.done, i), t.history.undone = mi(this.history.undone, i)
            }
        },
        iterLinkedDocs: function (e) {
            Xn(this, e)
        },
        getMode: function () {
            return this.mode
        },
        getEditor: function () {
            return this.cm
        },
        splitLines: function (e) {
            return this.lineSep ? e.split(this.lineSep) : tl(e)
        },
        lineSeparator: function () {
            return this.lineSep || "\n"
        }
    }), Sa.prototype.eachLine = Sa.prototype.iter;
    var La = "iter insert remove copy getEditor constructor".split(" ");
    for (var Ma in Sa.prototype) Sa.prototype.hasOwnProperty(Ma) && zi(La, Ma) < 0 && (e.prototype[Ma] = function (e) {
        return function () {
            return e.apply(this.doc, arguments)
        }
    }(Sa.prototype[Ma]));
    Oi(Sa);
    var Ta = e.e_preventDefault = function (e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = !1
        },
        Aa = e.e_stopPropagation = function (e) {
            e.stopPropagation ? e.stopPropagation() : e.cancelBubble = !0
        },
        Oa = e.e_stop = function (e) {
            Ta(e), Aa(e)
        },
        Na = e.on = function (e, t, r) {
            if (e.addEventListener) e.addEventListener(t, r, !1);
            else if (e.attachEvent) e.attachEvent("on" + t, r);
            else {
                var n = e._handlers || (e._handlers = {}),
                    i = n[t] || (n[t] = []);
                i.push(r)
            }
        },
        Wa = [],
        Ha = e.off = function (e, t, r) {
            if (e.removeEventListener) e.removeEventListener(t, r, !1);
            else if (e.detachEvent) e.detachEvent("on" + t, r);
            else
                for (var n = Ci(e, t, !1), i = 0; i < n.length; ++i)
                    if (n[i] == r) {
                        n.splice(i, 1);
                        break
                    }
        },
        za = e.signal = function (e, t) {
            var r = Ci(e, t, !0);
            if (r.length)
                for (var n = Array.prototype.slice.call(arguments, 2), i = 0; i < r.length; ++i) r[i].apply(null, n)
        },
        Da = null,
        Pa = 30,
        Ea = e.Pass = {
            toString: function () {
                return "CodeMirror.Pass"
            }
        },
        Ia = {
            scroll: !1
        },
        Fa = {
            origin: "*mouse"
        },
        Ba = {
            origin: "+move"
        };
    Ni.prototype.set = function (e, t) {
        clearTimeout(this.id), this.id = setTimeout(t, e)
    };
    var Ra = e.countColumn = function (e, t, r, n, i) {
            null == t && (t = e.search(/[^\s\u00a0]/), -1 == t && (t = e.length));
            for (var o = n || 0, a = i || 0;;) {
                var l = e.indexOf(" ", o);
                if (0 > l || l >= t) return a + (t - o);
                a += l - o, a += r - a % r, o = l + 1
            }
        },
        ja = e.findColumn = function (e, t, r) {
            for (var n = 0, i = 0;;) {
                var o = e.indexOf(" ", n); - 1 == o && (o = e.length);
                var a = o - n;
                if (o == e.length || i + a >= t) return n + Math.min(a, t - i);
                if (i += o - n, i += r - i % r, n = o + 1, i >= t) return n
            }
        },
        Ka = [""],
        Va = function (e) {
            e.select()
        };
    Ao ? Va = function (e) {
        e.selectionStart = 0, e.selectionEnd = e.value.length
    } : bo && (Va = function (e) {
        try {
            e.select()
        } catch (t) {}
    });
    var Ua, Ga = /[\u00df\u0587\u0590-\u05f4\u0600-\u06ff\u3040-\u309f\u30a0-\u30ff\u3400-\u4db5\u4e00-\u9fcc\uac00-\ud7af]/,
        qa = e.isWordChar = function (e) {
            return /\w/.test(e) || e > "" && (e.toUpperCase() != e.toLowerCase() || Ga.test(e))
        },
        _a = /[\u0300-\u036f\u0483-\u0489\u0591-\u05bd\u05bf\u05c1\u05c2\u05c4\u05c5\u05c7\u0610-\u061a\u064b-\u065e\u0670\u06d6-\u06dc\u06de-\u06e4\u06e7\u06e8\u06ea-\u06ed\u0711\u0730-\u074a\u07a6-\u07b0\u07eb-\u07f3\u0816-\u0819\u081b-\u0823\u0825-\u0827\u0829-\u082d\u0900-\u0902\u093c\u0941-\u0948\u094d\u0951-\u0955\u0962\u0963\u0981\u09bc\u09be\u09c1-\u09c4\u09cd\u09d7\u09e2\u09e3\u0a01\u0a02\u0a3c\u0a41\u0a42\u0a47\u0a48\u0a4b-\u0a4d\u0a51\u0a70\u0a71\u0a75\u0a81\u0a82\u0abc\u0ac1-\u0ac5\u0ac7\u0ac8\u0acd\u0ae2\u0ae3\u0b01\u0b3c\u0b3e\u0b3f\u0b41-\u0b44\u0b4d\u0b56\u0b57\u0b62\u0b63\u0b82\u0bbe\u0bc0\u0bcd\u0bd7\u0c3e-\u0c40\u0c46-\u0c48\u0c4a-\u0c4d\u0c55\u0c56\u0c62\u0c63\u0cbc\u0cbf\u0cc2\u0cc6\u0ccc\u0ccd\u0cd5\u0cd6\u0ce2\u0ce3\u0d3e\u0d41-\u0d44\u0d4d\u0d57\u0d62\u0d63\u0dca\u0dcf\u0dd2-\u0dd4\u0dd6\u0ddf\u0e31\u0e34-\u0e3a\u0e47-\u0e4e\u0eb1\u0eb4-\u0eb9\u0ebb\u0ebc\u0ec8-\u0ecd\u0f18\u0f19\u0f35\u0f37\u0f39\u0f71-\u0f7e\u0f80-\u0f84\u0f86\u0f87\u0f90-\u0f97\u0f99-\u0fbc\u0fc6\u102d-\u1030\u1032-\u1037\u1039\u103a\u103d\u103e\u1058\u1059\u105e-\u1060\u1071-\u1074\u1082\u1085\u1086\u108d\u109d\u135f\u1712-\u1714\u1732-\u1734\u1752\u1753\u1772\u1773\u17b7-\u17bd\u17c6\u17c9-\u17d3\u17dd\u180b-\u180d\u18a9\u1920-\u1922\u1927\u1928\u1932\u1939-\u193b\u1a17\u1a18\u1a56\u1a58-\u1a5e\u1a60\u1a62\u1a65-\u1a6c\u1a73-\u1a7c\u1a7f\u1b00-\u1b03\u1b34\u1b36-\u1b3a\u1b3c\u1b42\u1b6b-\u1b73\u1b80\u1b81\u1ba2-\u1ba5\u1ba8\u1ba9\u1c2c-\u1c33\u1c36\u1c37\u1cd0-\u1cd2\u1cd4-\u1ce0\u1ce2-\u1ce8\u1ced\u1dc0-\u1de6\u1dfd-\u1dff\u200c\u200d\u20d0-\u20f0\u2cef-\u2cf1\u2de0-\u2dff\u302a-\u302f\u3099\u309a\ua66f-\ua672\ua67c\ua67d\ua6f0\ua6f1\ua802\ua806\ua80b\ua825\ua826\ua8c4\ua8e0-\ua8f1\ua926-\ua92d\ua947-\ua951\ua980-\ua982\ua9b3\ua9b6-\ua9b9\ua9bc\uaa29-\uaa2e\uaa31\uaa32\uaa35\uaa36\uaa43\uaa4c\uaab0\uaab2-\uaab4\uaab7\uaab8\uaabe\uaabf\uaac1\uabe5\uabe8\uabed\udc00-\udfff\ufb1e\ufe00-\ufe0f\ufe20-\ufe26\uff9e\uff9f]/;
    Ua = document.createRange ? function (e, t, r, n) {
        var i = document.createRange();
        return i.setEnd(n || e, r), i.setStart(e, t), i
    } : function (e, t, r) {
        var n = document.body.createTextRange();
        try {
            n.moveToElementText(e.parentNode)
        } catch (i) {
            return n
        }
        return n.collapse(!0), n.moveEnd("character", r), n.moveStart("character", t), n
    };
    var $a = e.contains = function (e, t) {
        if (3 == t.nodeType && (t = t.parentNode), e.contains) return e.contains(t);
        do
            if (11 == t.nodeType && (t = t.host), t == e) return !0; while (t = t.parentNode)
    };
    bo && 11 > wo && (Gi = function () {
        try {
            return document.activeElement
        } catch (e) {
            return document.body
        }
    });
    var Xa, Ya, Za = e.rmClass = function (e, t) {
            var r = e.className,
                n = qi(t).exec(r);
            if (n) {
                var i = r.slice(n.index + n[0].length);
                e.className = r.slice(0, n.index) + (i ? n[1] + i : "")
            }
        },
        Qa = e.addClass = function (e, t) {
            var r = e.className;
            qi(t).test(r) || (e.className += (r ? " " : "") + t)
        },
        Ja = !1,
        el = function () {
            if (bo && 9 > wo) return !1;
            var e = Ki("div");
            return "draggable" in e || "dragDrop" in e
        }(),
        tl = e.splitLines = 3 != "\n\nb".split(/\n/).length ? function (e) {
            for (var t = 0, r = [], n = e.length; n >= t;) {
                var i = e.indexOf("\n", t); - 1 == i && (i = e.length);
                var o = e.slice(t, "\r" == e.charAt(i - 1) ? i - 1 : i),
                    a = o.indexOf("\r"); - 1 != a ? (r.push(o.slice(0, a)), t += a + 1) : (r.push(o), t = i + 1)
            }
            return r
        } : function (e) {
            return e.split(/\r\n?|\n/)
        },
        rl = window.getSelection ? function (e) {
            try {
                return e.selectionStart != e.selectionEnd
            } catch (t) {
                return !1
            }
        } : function (e) {
            try {
                var t = e.ownerDocument.selection.createRange()
            } catch (r) {}
            return t && t.parentElement() == e ? 0 != t.compareEndPoints("StartToEnd", t) : !1
        },
        nl = function () {
            var e = Ki("div");
            return "oncopy" in e ? !0 : (e.setAttribute("oncopy", "return;"), "function" == typeof e.oncopy)
        }(),
        il = null,
        ol = e.keyNames = {
            3: "Enter",
            8: "Backspace",
            9: "Tab",
            13: "Enter",
            16: "Shift",
            17: "Ctrl",
            18: "Alt",
            19: "Pause",
            20: "CapsLock",
            27: "Esc",
            32: "Space",
            33: "PageUp",
            34: "PageDown",
            35: "End",
            36: "Home",
            37: "Left",
            38: "Up",
            39: "Right",
            40: "Down",
            44: "PrintScrn",
            45: "Insert",
            46: "Delete",
            59: ";",
            61: "=",
            91: "Mod",
            92: "Mod",
            93: "Mod",
            106: "*",
            107: "=",
            109: "-",
            110: ".",
            111: "/",
            127: "Delete",
            173: "-",
            186: ";",
            187: "=",
            188: ",",
            189: "-",
            190: ".",
            191: "/",
            192: "`",
            219: "[",
            220: "\\",
            221: "]",
            222: "'",
            63232: "Up",
            63233: "Down",
            63234: "Left",
            63235: "Right",
            63272: "Delete",
            63273: "Home",
            63275: "End",
            63276: "PageUp",
            63277: "PageDown",
            63302: "Insert"
        };
    ! function () {
        for (var e = 0; 10 > e; e++) ol[e + 48] = ol[e + 96] = String(e);
        for (var e = 65; 90 >= e; e++) ol[e] = String.fromCharCode(e);
        for (var e = 1; 12 >= e; e++) ol[e + 111] = ol[e + 63235] = "F" + e
    }();
    var al, ll = function () {
        function e(e) {
            return 247 >= e ? r.charAt(e) : e >= 1424 && 1524 >= e ? "R" : e >= 1536 && 1773 >= e ? n.charAt(e - 1536) : e >= 1774 && 2220 >= e ? "r" : e >= 8192 && 8203 >= e ? "w" : 8204 == e ? "b" : "L"
        }

        function t(e, t, r) {
            this.level = e, this.from = t, this.to = r
        }
        var r = "bbbbbbbbbtstwsbbbbbbbbbbbbbbssstwNN%%%NNNNNN,N,N1111111111NNNNNNNLLLLLLLLLLLLLLLLLLLLLLLLLLNNNNNNLLLLLLLLLLLLLLLLLLLLLLLLLLNNNNbbbbbbsbbbbbbbbbbbbbbbbbbbbbbbbbb,N%%%%NNNNLNNNNN%%11NLNNN1LNNNNNLLLLLLLLLLLLLLLLLLLLLLLNLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLN",
            n = "rrrrrrrrrrrr,rNNmmmmmmrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrmmmmmmmmmmmmmmrrrrrrrnnnnnnnnnn%nnrrrmrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrmmmmmmmmmmmmmmmmmmmNmmmm",
            i = /[\u0590-\u05f4\u0600-\u06ff\u0700-\u08ac]/,
            o = /[stwN]/,
            a = /[LRr]/,
            l = /[Lb1n]/,
            s = /[1n]/,
            c = "L";
        return function (r) {
            if (!i.test(r)) return !1;
            for (var n, u = r.length, d = [], f = 0; u > f; ++f) d.push(n = e(r.charCodeAt(f)));
            for (var f = 0, h = c; u > f; ++f) {
                var n = d[f];
                "m" == n ? d[f] = h : h = n
            }
            for (var f = 0, p = c; u > f; ++f) {
                var n = d[f];
                "1" == n && "r" == p ? d[f] = "n" : a.test(n) && (p = n, "r" == n && (d[f] = "R"))
            }
            for (var f = 1, h = d[0]; u - 1 > f; ++f) {
                var n = d[f];
                "+" == n && "1" == h && "1" == d[f + 1] ? d[f] = "1" : "," != n || h != d[f + 1] || "1" != h && "n" != h || (d[f] = h), h = n
            }
            for (var f = 0; u > f; ++f) {
                var n = d[f];
                if ("," == n) d[f] = "N";
                else if ("%" == n) {
                    for (var g = f + 1; u > g && "%" == d[g]; ++g);
                    for (var m = f && "!" == d[f - 1] || u > g && "1" == d[g] ? "1" : "N", v = f; g > v; ++v) d[v] = m;
                    f = g - 1
                }
            }
            for (var f = 0, p = c; u > f; ++f) {
                var n = d[f];
                "L" == p && "1" == n ? d[f] = "L" : a.test(n) && (p = n)
            }
            for (var f = 0; u > f; ++f)
                if (o.test(d[f])) {
                    for (var g = f + 1; u > g && o.test(d[g]); ++g);
                    for (var y = "L" == (f ? d[f - 1] : c), b = "L" == (u > g ? d[g] : c), m = y || b ? "L" : "R", v = f; g > v; ++v) d[v] = m;
                    f = g - 1
                } for (var w, x = [], f = 0; u > f;)
                if (l.test(d[f])) {
                    var k = f;
                    for (++f; u > f && l.test(d[f]); ++f);
                    x.push(new t(0, k, f))
                } else {
                    var C = f,
                        S = x.length;
                    for (++f; u > f && "L" != d[f]; ++f);
                    for (var v = C; f > v;)
                        if (s.test(d[v])) {
                            v > C && x.splice(S, 0, new t(1, C, v));
                            var L = v;
                            for (++v; f > v && s.test(d[v]); ++v);
                            x.splice(S, 0, new t(2, L, v)), C = v
                        } else ++v;
                    f > C && x.splice(S, 0, new t(1, C, f))
                } return 1 == x[0].level && (w = r.match(/^\s+/)) && (x[0].from = w[0].length, x.unshift(new t(0, 0, w[0].length))), 1 == Hi(x).level && (w = r.match(/\s+$/)) && (Hi(x).to -= w[0].length, x.push(new t(0, u - w[0].length, u))), 2 == x[0].level && x.unshift(new t(1, x[0].to, x[0].to)), x[0].level != Hi(x).level && x.push(new t(x[0].level, u, u)), x
        }
    }();
    return e.version = "5.16.0", e
}),
function (e) {
    "object" == typeof exports && "object" == typeof module ? e(require("../../lib/codemirror")) : "function" == typeof define && define.amd ? define(["../../lib/codemirror"], e) : e(CodeMirror)
}(function (e) {
    "use strict";

    function t(e, t) {
        this.cm = e, this.options = t, this.widget = null, this.debounce = 0, this.tick = 0, this.startPos = this.cm.getCursor("start"), this.startLen = this.cm.getLine(this.startPos.line).length - this.cm.getSelection().length;
        var r = this;
        e.on("cursorActivity", this.activityFunc = function () {
            r.cursorActivity()
        })
    }

    function r(t, r) {
        var n = e.cmpPos(r.from, t.from);
        return n > 0 && t.to.ch - t.from.ch != r.to.ch - r.from.ch
    }

    function n(e, t, r) {
        var n = e.options.hintOptions,
            i = {};
        for (var o in g) i[o] = g[o];
        if (n)
            for (var o in n) void 0 !== n[o] && (i[o] = n[o]);
        if (r)
            for (var o in r) void 0 !== r[o] && (i[o] = r[o]);
        return i.hint.resolve && (i.hint = i.hint.resolve(e, t)), i
    }

    function i(e) {
        return "string" == typeof e ? e : e.text
    }

    function o(e, t) {
        function r(e, r) {
            var i;
            i = "string" != typeof r ? function (e) {
                return r(e, t)
            } : n.hasOwnProperty(r) ? n[r] : r, o[e] = i
        }
        var n = {
                Up: function () {
                    t.moveFocus(-1)
                },
                Down: function () {
                    t.moveFocus(1)
                },
                PageUp: function () {
                    t.moveFocus(-t.menuSize() + 1, !0)
                },
                PageDown: function () {
                    t.moveFocus(t.menuSize() - 1, !0)
                },
                Home: function () {
                    t.setFocus(0)
                },
                End: function () {
                    t.setFocus(t.length - 1)
                },
                Enter: t.pick,
                Tab: t.pick,
                Esc: t.close
            },
            i = e.options.customKeys,
            o = i ? {} : n;
        if (i)
            for (var a in i) i.hasOwnProperty(a) && r(a, i[a]);
        var l = e.options.extraKeys;
        if (l)
            for (var a in l) l.hasOwnProperty(a) && r(a, l[a]);
        return o
    }

    function a(e, t) {
        for (; t && t != e;) {
            if ("LI" === t.nodeName.toUpperCase() && t.parentNode == e) return t;
            t = t.parentNode
        }
    }

    function l(t, r) {
        this.completion = t, this.data = r, this.picked = !1;
        var n = this,
            l = t.cm,
            s = this.hints = document.createElement("ul");
        s.className = "CodeMirror-hints", this.selectedHint = r.selectedHint || 0;
        for (var c = r.list, u = 0; u < c.length; ++u) {
            var h = s.appendChild(document.createElement("li")),
                p = c[u],
                g = d + (u != this.selectedHint ? "" : " " + f);
            null != p.className && (g = p.className + " " + g), h.className = g, p.render ? p.render(h, r, p) : h.appendChild(document.createTextNode(p.displayText || i(p))), h.hintId = u
        }
        var m = l.cursorCoords(t.options.alignWithWord ? r.from : null),
            v = m.left,
            y = m.bottom,
            b = !0;
        s.style.left = v + "px", s.style.top = y + "px";
        var w = window.innerWidth || Math.max(document.body.offsetWidth, document.documentElement.offsetWidth),
            x = window.innerHeight || Math.max(document.body.offsetHeight, document.documentElement.offsetHeight);
        (t.options.container || document.body).appendChild(s);
        var k = s.getBoundingClientRect(),
            C = k.bottom - x,
            S = s.scrollHeight > s.clientHeight + 1;
        if (C > 0) {
            var L = k.bottom - k.top,
                M = m.top - (m.bottom - k.top);
            if (M - L > 0) s.style.top = (y = m.top - L) + "px", b = !1;
            else if (L > x) {
                s.style.height = x - 5 + "px", s.style.top = (y = m.bottom - k.top) + "px";
                var T = l.getCursor();
                r.from.ch != T.ch && (m = l.cursorCoords(T), s.style.left = (v = m.left) + "px", k = s.getBoundingClientRect())
            }
        }
        var A = k.right - w;
        if (A > 0 && (k.right - k.left > w && (s.style.width = w - 5 + "px", A -= k.right - k.left - w), s.style.left = (v = m.left - A) + "px"), S)
            for (var O = s.firstChild; O; O = O.nextSibling) O.style.paddingRight = l.display.nativeBarWidth + "px";
        if (l.addKeyMap(this.keyMap = o(t, {
                moveFocus: function (e, t) {
                    n.changeActive(n.selectedHint + e, t)
                },
                setFocus: function (e) {
                    n.changeActive(e)
                },
                menuSize: function () {
                    return n.screenAmount()
                },
                length: c.length,
                close: function () {
                    t.close()
                },
                pick: function () {
                    n.pick()
                },
                data: r
            })), t.options.closeOnUnfocus) {
            var N;
            l.on("blur", this.onBlur = function () {
                N = setTimeout(function () {
                    t.close()
                }, 100)
            }), l.on("focus", this.onFocus = function () {
                clearTimeout(N)
            })
        }
        var W = l.getScrollInfo();
        return l.on("scroll", this.onScroll = function () {
            var e = l.getScrollInfo(),
                r = l.getWrapperElement().getBoundingClientRect(),
                n = y + W.top - e.top,
                i = n - (window.pageYOffset || (document.documentElement || document.body).scrollTop);
            return b || (i += s.offsetHeight), i <= r.top || i >= r.bottom ? t.close() : (s.style.top = n + "px", void(s.style.left = v + W.left - e.left + "px"))
        }), e.on(s, "dblclick", function (e) {
            var t = a(s, e.target || e.srcElement);
            t && null != t.hintId && (n.changeActive(t.hintId), n.pick())
        }), e.on(s, "click", function (e) {
            var r = a(s, e.target || e.srcElement);
            r && null != r.hintId && (n.changeActive(r.hintId), t.options.completeOnSingleClick && n.pick());
        }), e.on(s, "mousedown", function () {
            setTimeout(function () {
                l.focus()
            }, 20)
        }), e.signal(r, "select", c[0], s.firstChild), !0
    }

    function s(e, t) {
        if (!e.somethingSelected()) return t;
        for (var r = [], n = 0; n < t.length; n++) t[n].supportsSelection && r.push(t[n]);
        return r
    }

    function c(e, t, r, n) {
        if (e.async) e(t, n, r);
        else {
            var i = e(t, r);
            i && i.then ? i.then(n) : n(i)
        }
    }

    function u(t, r) {
        var n, i = t.getHelpers(r, "hint");
        if (i.length) {
            var o = function (e, t, r) {
                function n(i) {
                    return i == o.length ? t(null) : void c(o[i], e, r, function (e) {
                        e && e.list.length > 0 ? t(e) : n(i + 1)
                    })
                }
                var o = s(e, i);
                n(0)
            };
            return o.async = !0, o.supportsSelection = !0, o
        }
        return (n = t.getHelper(t.getCursor(), "hintWords")) ? function (t) {
            return e.hint.fromList(t, {
                words: n
            })
        } : e.hint.anyword ? function (t, r) {
            return e.hint.anyword(t, r)
        } : function () {}
    }
    var d = "CodeMirror-hint",
        f = "CodeMirror-hint-active";
    e.showHint = function (e, t, r) {
        if (!t) return e.showHint(r);
        r && r.async && (t.async = !0);
        var n = {
            hint: t
        };
        if (r)
            for (var i in r) n[i] = r[i];
        return e.showHint(n)
    }, e.defineExtension("showHint", function (r) {
        r = n(this, this.getCursor("start"), r);
        var i = this.listSelections();
        if (!(i.length > 1)) {
            if (this.somethingSelected()) {
                if (!r.hint.supportsSelection) return;
                for (var o = 0; o < i.length; o++)
                    if (i[o].head.line != i[o].anchor.line) return
            }
            this.state.completionActive && this.state.completionActive.close();
            var a = this.state.completionActive = new t(this, r);
            a.options.hint && (e.signal(this, "startCompletion", this), a.update(!0))
        }
    });
    var h = window.requestAnimationFrame || function (e) {
            return setTimeout(e, 1e3 / 60)
        },
        p = window.cancelAnimationFrame || clearTimeout;
    t.prototype = {
        close: function () {
            this.active() && (this.cm.state.completionActive = null, this.tick = null, this.cm.off("cursorActivity", this.activityFunc), this.widget && this.data && e.signal(this.data, "close"), this.widget && this.widget.close(), e.signal(this.cm, "endCompletion", this.cm))
        },
        active: function () {
            return this.cm.state.completionActive == this
        },
        pick: function (t, r) {
            var n = t.list[r];
            n.hint ? n.hint(this.cm, t, n) : this.cm.replaceRange(i(n), n.from || t.from, n.to || t.to, "complete"), e.signal(t, "pick", n), this.close()
        },
        cursorActivity: function () {
            this.debounce && (p(this.debounce), this.debounce = 0);
            var e = this.cm.getCursor(),
                t = this.cm.getLine(e.line);
            if (e.line != this.startPos.line || t.length - e.ch != this.startLen - this.startPos.ch || e.ch < this.startPos.ch || this.cm.somethingSelected() || e.ch && this.options.closeCharacters.test(t.charAt(e.ch - 1))) this.close();
            else {
                var r = this;
                this.debounce = h(function () {
                    r.update()
                }), this.widget && this.widget.disable()
            }
        },
        update: function (e) {
            if (null != this.tick) {
                var t = this,
                    r = ++this.tick;
                c(this.options.hint, this.cm, this.options, function (n) {
                    t.tick == r && t.finishUpdate(n, e)
                })
            }
        },
        finishUpdate: function (t, n) {
            this.data && e.signal(this.data, "update");
            var i = this.widget && this.widget.picked || n && this.options.completeSingle;
            this.widget && this.widget.close(), t && this.data && r(this.data, t) || (this.data = t, t && t.list.length && (i && 1 == t.list.length ? this.pick(t, 0) : (this.widget = new l(this, t), e.signal(t, "shown"))))
        }
    }, l.prototype = {
        close: function () {
            if (this.completion.widget == this) {
                this.completion.widget = null, this.hints.parentNode.removeChild(this.hints), this.completion.cm.removeKeyMap(this.keyMap);
                var e = this.completion.cm;
                this.completion.options.closeOnUnfocus && (e.off("blur", this.onBlur), e.off("focus", this.onFocus)), e.off("scroll", this.onScroll)
            }
        },
        disable: function () {
            this.completion.cm.removeKeyMap(this.keyMap);
            var e = this;
            this.keyMap = {
                Enter: function () {
                    e.picked = !0
                }
            }, this.completion.cm.addKeyMap(this.keyMap)
        },
        pick: function () {
            this.completion.pick(this.data, this.selectedHint)
        },
        changeActive: function (t, r) {
            if (t >= this.data.list.length ? t = r ? this.data.list.length - 1 : 0 : 0 > t && (t = r ? 0 : this.data.list.length - 1), this.selectedHint != t) {
                var n = this.hints.childNodes[this.selectedHint];
                n.className = n.className.replace(" " + f, ""), n = this.hints.childNodes[this.selectedHint = t], n.className += " " + f, n.offsetTop < this.hints.scrollTop ? this.hints.scrollTop = n.offsetTop - 3 : n.offsetTop + n.offsetHeight > this.hints.scrollTop + this.hints.clientHeight && (this.hints.scrollTop = n.offsetTop + n.offsetHeight - this.hints.clientHeight + 3), e.signal(this.data, "select", this.data.list[this.selectedHint], n)
            }
        },
        screenAmount: function () {
            return Math.floor(this.hints.clientHeight / this.hints.firstChild.offsetHeight) || 1
        }
    }, e.registerHelper("hint", "auto", {
        resolve: u
    }), e.registerHelper("hint", "fromList", function (t, r) {
        var n = t.getCursor(),
            i = t.getTokenAt(n),
            o = e.Pos(n.line, i.end);
        if (i.string && /\w/.test(i.string[i.string.length - 1])) var a = i.string,
            l = e.Pos(n.line, i.start);
        else var a = "",
            l = o;
        for (var s = [], c = 0; c < r.words.length; c++) {
            var u = r.words[c];
            u.slice(0, a.length) == a && s.push(u)
        }
        return s.length ? {
            list: s,
            from: l,
            to: o
        } : void 0
    }), e.commands.autocomplete = e.showHint;
    var g = {
        hint: e.hint.auto,
        completeSingle: !0,
        alignWithWord: !0,
        closeCharacters: /[\s()\[\]{};:>,]/,
        closeOnUnfocus: !0,
        completeOnSingleClick: !0,
        container: null,
        customKeys: null,
        extraKeys: null
    };
    e.defineOption("hintOptions", null)
}),
function (e) {
    "object" == typeof exports && "object" == typeof module ? e(require("../../lib/codemirror"), require("../../mode/css/css")) : "function" == typeof define && define.amd ? define(["../../lib/codemirror", "../../mode/css/css"], e) : e(CodeMirror)
}(function (e) {
    "use strict";
    var t = {
        link: 1,
        visited: 1,
        active: 1,
        hover: 1,
        focus: 1,
        "first-letter": 1,
        "first-line": 1,
        "first-child": 1,
        before: 1,
        after: 1,
        lang: 1
    };
    e.registerHelper("hint", "css", function (r) {
        function n(e) {
            for (var t in e) c && 0 != t.lastIndexOf(c, 0) || d.push(t)
        }
        var i = r.getCursor(),
            o = r.getTokenAt(i),
            a = e.innerMode(r.getMode(), o.state);
        if ("css" == a.mode.name) {
            if ("keyword" == o.type && 0 == "!important".indexOf(o.string)) return {
                list: ["!important"],
                from: e.Pos(i.line, o.start),
                to: e.Pos(i.line, o.end)
            };
            var l = o.start,
                s = i.ch,
                c = o.string.slice(0, s - l);
            /[^\w$_-]/.test(c) && (c = "", l = s = i.ch);
            var u = e.resolveMode("text/css"),
                d = [],
                f = a.state.state;
            return "pseudo" == f || "variable-3" == o.type ? n(t) : "block" == f || "maybeprop" == f ? n(u.propertyKeywords) : "prop" == f || "parens" == f || "at" == f || "params" == f ? (n(u.valueKeywords), n(u.colorKeywords)) : ("media" == f || "media_parens" == f) && (n(u.mediaTypes), n(u.mediaFeatures)), d.length ? {
                list: d,
                from: e.Pos(i.line, l),
                to: e.Pos(i.line, s)
            } : void 0
        }
    })
}),
function (e) {
    "object" == typeof exports && "object" == typeof module ? e(require("../../lib/codemirror")) : "function" == typeof define && define.amd ? define(["../../lib/codemirror"], e) : e(CodeMirror)
}(function (e) {
    function t(e, t) {
        for (var r = 0, n = e.length; n > r; ++r) t(e[r])
    }

    function r(e, t) {
        if (!Array.prototype.indexOf) {
            for (var r = e.length; r--;)
                if (e[r] === t) return !0;
            return !1
        }
        return -1 != e.indexOf(t)
    }

    function n(t, r, n, i) {
        var o = t.getCursor(),
            a = n(t, o);
        if (!/\b(?:string|comment)\b/.test(a.type)) {
            a.state = e.innerMode(t.getMode(), a.state).state, /^[\w$_]*$/.test(a.string) ? a.end > o.ch && (a.end = o.ch, a.string = a.string.slice(0, o.ch - a.start)) : a = {
                start: o.ch,
                end: o.ch,
                string: "",
                state: a.state,
                type: "." == a.string ? "property" : null
            };
            for (var c = a;
                "property" == c.type;) {
                if (c = n(t, s(o.line, c.start)), "." != c.string) return;
                if (c = n(t, s(o.line, c.start)), !u) var u = [];
                u.push(c)
            }
            return {
                list: l(a, u, r, i),
                from: s(o.line, a.start),
                to: s(o.line, a.end)
            }
        }
    }

    function i(e, t) {
        return n(e, f, function (e, t) {
            return e.getTokenAt(t)
        }, t)
    }

    function o(e, t) {
        var r = e.getTokenAt(t);
        return t.ch == r.start + 1 && "." == r.string.charAt(0) ? (r.end = r.start, r.string = ".", r.type = "property") : /^\.[\w$_]*$/.test(r.string) && (r.type = "property", r.start++, r.string = r.string.replace(/\./, "")), r
    }

    function a(e, t) {
        return n(e, h, o, t)
    }

    function l(e, n, i, o) {
        function a(e) {
            0 != e.lastIndexOf(f, 0) || r(s, e) || s.push(e)
        }

        function l(e) {
            "string" == typeof e ? t(c, a) : e instanceof Array ? t(u, a) : e instanceof Function && t(d, a);
            for (var r in e) a(r)
        }
        var s = [],
            f = e.string,
            h = o && o.globalScope || window;
        if (n && n.length) {
            var p, g = n.pop();
            for (g.type && 0 === g.type.indexOf("variable") ? (o && o.additionalContext && (p = o.additionalContext[g.string]), o && o.useGlobalScope === !1 || (p = p || h[g.string])) : "string" == g.type ? p = "" : "atom" == g.type ? p = 1 : "function" == g.type && (null == h.jQuery || "$" != g.string && "jQuery" != g.string || "function" != typeof h.jQuery ? null != h._ && "_" == g.string && "function" == typeof h._ && (p = h._()) : p = h.jQuery()); null != p && n.length;) p = p[n.pop().string];
            null != p && l(p)
        } else {
            for (var m = e.state.localVars; m; m = m.next) a(m.name);
            for (var m = e.state.globalVars; m; m = m.next) a(m.name);
            o && o.useGlobalScope === !1 || l(h), t(i, a)
        }
        return s
    }
    var s = e.Pos;
    e.registerHelper("hint", "javascript", i), e.registerHelper("hint", "coffeescript", a);
    var c = "charAt charCodeAt indexOf lastIndexOf substring substr slice trim trimLeft trimRight toUpperCase toLowerCase split concat match replace search".split(" "),
        u = "length concat join splice push pop shift unshift slice reverse sort indexOf lastIndexOf every some filter forEach map reduce reduceRight ".split(" "),
        d = "prototype apply call bind".split(" "),
        f = "break case catch continue debugger default delete do else false finally for function if in instanceof new null return switch throw true try typeof var void while with".split(" "),
        h = "and break catch class continue delete do else extends false finally for if in instanceof isnt new no not null of off on or return switch then throw true try typeof until void while with yes".split(" ")
}),
function (e) {
    "object" == typeof exports && "object" == typeof module ? e(require("../../lib/codemirror")) : "function" == typeof define && define.amd ? define(["../../lib/codemirror"], e) : e(CodeMirror)
}(function (e) {
    "use strict";

    function t(e, t, r) {
        return /^(?:operator|sof|keyword c|case|new|[\[{}\(,;:]|=>)$/.test(t.lastType) || "quasi" == t.lastType && /\{\s*$/.test(e.string.slice(0, e.pos - (r || 0)))
    }
    e.defineMode("javascript", function (r, n) {
        function i(e) {
            for (var t, r = !1, n = !1; null != (t = e.next());) {
                if (!r) {
                    if ("/" == t && !n) return;
                    "[" == t ? n = !0 : n && "]" == t && (n = !1)
                }
                r = !r && "\\" == t
            }
        }

        function o(e, t, r) {
            return xe = e, ke = r, t
        }

        function a(e, r) {
            var n = e.next();
            if ('"' == n || "'" == n) return r.tokenize = l(n), r.tokenize(e, r);
            if ("." == n && e.match(/^\d+(?:[eE][+\-]?\d+)?/)) return o("number", "number");
            if ("." == n && e.match("..")) return o("spread", "meta");
            if (/[\[\]{}\(\),;\:\.]/.test(n)) return o(n);
            if ("=" == n && e.eat(">")) return o("=>", "operator");
            if ("0" == n && e.eat(/x/i)) return e.eatWhile(/[\da-f]/i), o("number", "number");
            if ("0" == n && e.eat(/o/i)) return e.eatWhile(/[0-7]/i), o("number", "number");
            if ("0" == n && e.eat(/b/i)) return e.eatWhile(/[01]/i), o("number", "number");
            if (/\d/.test(n)) return e.match(/^\d*(?:\.\d*)?(?:[eE][+\-]?\d+)?/), o("number", "number");
            if ("/" == n) return e.eat("*") ? (r.tokenize = s, s(e, r)) : e.eat("/") ? (e.skipToEnd(), o("comment", "comment")) : t(e, r, 1) ? (i(e), e.match(/^\b(([gimyu])(?![gimyu]*\2))+\b/), o("regexp", "string-2")) : (e.eatWhile(Ne), o("operator", "operator", e.current()));
            if ("`" == n) return r.tokenize = c, c(e, r);
            if ("#" == n) return e.skipToEnd(), o("error", "error");
            if (Ne.test(n)) return e.eatWhile(Ne), o("operator", "operator", e.current());
            if (Ae.test(n)) {
                e.eatWhile(Ae);
                var a = e.current(),
                    u = Oe.propertyIsEnumerable(a) && Oe[a];
                return u && "." != r.lastType ? o(u.type, u.style, a) : o("variable", "variable", a)
            }
        }

        function l(e) {
            return function (t, r) {
                var n, i = !1;
                if (Le && "@" == t.peek() && t.match(We)) return r.tokenize = a, o("jsonld-keyword", "meta");
                for (; null != (n = t.next()) && (n != e || i);) i = !i && "\\" == n;
                return i || (r.tokenize = a), o("string", "string")
            }
        }

        function s(e, t) {
            for (var r, n = !1; r = e.next();) {
                if ("/" == r && n) {
                    t.tokenize = a;
                    break
                }
                n = "*" == r
            }
            return o("comment", "comment")
        }

        function c(e, t) {
            for (var r, n = !1; null != (r = e.next());) {
                if (!n && ("`" == r || "$" == r && e.eat("{"))) {
                    t.tokenize = a;
                    break
                }
                n = !n && "\\" == r
            }
            return o("quasi", "string-2", e.current())
        }

        function u(e, t) {
            t.fatArrowAt && (t.fatArrowAt = null);
            var r = e.string.indexOf("=>", e.start);
            if (!(0 > r)) {
                for (var n = 0, i = !1, o = r - 1; o >= 0; --o) {
                    var a = e.string.charAt(o),
                        l = He.indexOf(a);
                    if (l >= 0 && 3 > l) {
                        if (!n) {
                            ++o;
                            break
                        }
                        if (0 == --n) break
                    } else if (l >= 3 && 6 > l) ++n;
                    else if (Ae.test(a)) i = !0;
                    else {
                        if (/["'\/]/.test(a)) return;
                        if (i && !n) {
                            ++o;
                            break
                        }
                    }
                }
                i && !n && (t.fatArrowAt = o)
            }
        }

        function d(e, t, r, n, i, o) {
            this.indented = e, this.column = t, this.type = r, this.prev = i, this.info = o, null != n && (this.align = n)
        }

        function f(e, t) {
            for (var r = e.localVars; r; r = r.next)
                if (r.name == t) return !0;
            for (var n = e.context; n; n = n.prev)
                for (var r = n.vars; r; r = r.next)
                    if (r.name == t) return !0
        }

        function h(e, t, r, n, i) {
            var o = e.cc;
            for (De.state = e, De.stream = i, De.marked = null, De.cc = o, De.style = t, e.lexical.hasOwnProperty("align") || (e.lexical.align = !0);;) {
                var a = o.length ? o.pop() : Me ? C : k;
                if (a(r, n)) {
                    for (; o.length && o[o.length - 1].lex;) o.pop()();
                    return De.marked ? De.marked : "variable" == r && f(e, n) ? "variable-2" : t
                }
            }
        }

        function p() {
            for (var e = arguments.length - 1; e >= 0; e--) De.cc.push(arguments[e])
        }

        function g() {
            return p.apply(null, arguments), !0
        }

        function m(e) {
            function t(t) {
                for (var r = t; r; r = r.next)
                    if (r.name == e) return !0;
                return !1
            }
            var r = De.state;
            if (De.marked = "def", r.context) {
                if (t(r.localVars)) return;
                r.localVars = {
                    name: e,
                    next: r.localVars
                }
            } else {
                if (t(r.globalVars)) return;
                n.globalVars && (r.globalVars = {
                    name: e,
                    next: r.globalVars
                })
            }
        }

        function v() {
            De.state.context = {
                prev: De.state.context,
                vars: De.state.localVars
            }, De.state.localVars = Pe
        }

        function y() {
            De.state.localVars = De.state.context.vars, De.state.context = De.state.context.prev
        }

        function b(e, t) {
            var r = function () {
                var r = De.state,
                    n = r.indented;
                if ("stat" == r.lexical.type) n = r.lexical.indented;
                else
                    for (var i = r.lexical; i && ")" == i.type && i.align; i = i.prev) n = i.indented;
                r.lexical = new d(n, De.stream.column(), e, null, r.lexical, t)
            };
            return r.lex = !0, r
        }

        function w() {
            var e = De.state;
            e.lexical.prev && (")" == e.lexical.type && (e.indented = e.lexical.indented), e.lexical = e.lexical.prev)
        }

        function x(e) {
            function t(r) {
                return r == e ? g() : ";" == e ? p() : g(t)
            }
            return t
        }

        function k(e, t) {
            return "var" == e ? g(b("vardef", t.length), X, x(";"), w) : "keyword a" == e ? g(b("form"), C, k, w) : "keyword b" == e ? g(b("form"), k, w) : "{" == e ? g(b("}"), U, w) : ";" == e ? g() : "if" == e ? ("else" == De.state.lexical.info && De.state.cc[De.state.cc.length - 1] == w && De.state.cc.pop()(), g(b("form"), C, k, w, ee)) : "function" == e ? g(ae) : "for" == e ? g(b("form"), te, k, w) : "variable" == e ? g(b("stat"), I) : "switch" == e ? g(b("form"), C, b("}", "switch"), x("{"), U, w, w) : "case" == e ? g(C, x(":")) : "default" == e ? g(x(":")) : "catch" == e ? g(b("form"), v, x("("), le, x(")"), k, w, y) : "class" == e ? g(b("form"), se, w) : "export" == e ? g(b("stat"), fe, w) : "import" == e ? g(b("stat"), he, w) : "module" == e ? g(b("form"), Y, b("}"), x("{"), U, w, w) : "async" == e ? g(k) : p(b("stat"), C, x(";"), w)
        }

        function C(e) {
            return L(e, !1)
        }

        function S(e) {
            return L(e, !0)
        }

        function L(e, t) {
            if (De.state.fatArrowAt == De.stream.start) {
                var r = t ? z : H;
                if ("(" == e) return g(v, b(")"), K(Y, ")"), w, x("=>"), r, y);
                if ("variable" == e) return p(v, Y, x("=>"), r, y)
            }
            var n = t ? O : A;
            return ze.hasOwnProperty(e) ? g(n) : "function" == e ? g(ae, n) : "keyword c" == e ? g(t ? T : M) : "(" == e ? g(b(")"), M, be, x(")"), w, n) : "operator" == e || "spread" == e ? g(t ? S : C) : "[" == e ? g(b("]"), ve, w, n) : "{" == e ? V(B, "}", null, n) : "quasi" == e ? p(N, n) : "new" == e ? g(D(t)) : g()
        }

        function M(e) {
            return e.match(/[;\}\)\],]/) ? p() : p(C)
        }

        function T(e) {
            return e.match(/[;\}\)\],]/) ? p() : p(S)
        }

        function A(e, t) {
            return "," == e ? g(C) : O(e, t, !1)
        }

        function O(e, t, r) {
            var n = 0 == r ? A : O,
                i = 0 == r ? C : S;
            return "=>" == e ? g(v, r ? z : H, y) : "operator" == e ? /\+\+|--/.test(t) ? g(n) : "?" == t ? g(C, x(":"), i) : g(i) : "quasi" == e ? p(N, n) : ";" != e ? "(" == e ? V(S, ")", "call", n) : "." == e ? g(F, n) : "[" == e ? g(b("]"), M, x("]"), w, n) : void 0 : void 0
        }

        function N(e, t) {
            return "quasi" != e ? p() : "${" != t.slice(t.length - 2) ? g(N) : g(C, W)
        }

        function W(e) {
            return "}" == e ? (De.marked = "string-2", De.state.tokenize = c, g(N)) : void 0
        }

        function H(e) {
            return u(De.stream, De.state), p("{" == e ? k : C)
        }

        function z(e) {
            return u(De.stream, De.state), p("{" == e ? k : S)
        }

        function D(e) {
            return function (t) {
                return "." == t ? g(e ? E : P) : p(e ? S : C)
            }
        }

        function P(e, t) {
            return "target" == t ? (De.marked = "keyword", g(A)) : void 0
        }

        function E(e, t) {
            return "target" == t ? (De.marked = "keyword", g(O)) : void 0
        }

        function I(e) {
            return ":" == e ? g(w, k) : p(A, x(";"), w)
        }

        function F(e) {
            return "variable" == e ? (De.marked = "property", g()) : void 0
        }

        function B(e, t) {
            return "variable" == e || "keyword" == De.style ? (De.marked = "property", g("get" == t || "set" == t ? R : j)) : "number" == e || "string" == e ? (De.marked = Le ? "property" : De.style + " property", g(j)) : "jsonld-keyword" == e ? g(j) : "modifier" == e ? g(B) : "[" == e ? g(C, x("]"), j) : "spread" == e ? g(C) : void 0
        }

        function R(e) {
            return "variable" != e ? p(j) : (De.marked = "property", g(ae))
        }

        function j(e) {
            return ":" == e ? g(S) : "(" == e ? p(ae) : void 0
        }

        function K(e, t) {
            function r(n, i) {
                if ("," == n) {
                    var o = De.state.lexical;
                    return "call" == o.info && (o.pos = (o.pos || 0) + 1), g(e, r)
                }
                return n == t || i == t ? g() : g(x(t))
            }
            return function (n, i) {
                return n == t || i == t ? g() : p(e, r)
            }
        }

        function V(e, t, r) {
            for (var n = 3; n < arguments.length; n++) De.cc.push(arguments[n]);
            return g(b(t, r), K(e, t), w)
        }

        function U(e) {
            return "}" == e ? g() : p(k, U)
        }

        function G(e) {
            return Te && ":" == e ? g(_) : void 0
        }

        function q(e, t) {
            return "=" == t ? g(S) : void 0
        }

        function _(e) {
            return "variable" == e ? (De.marked = "variable-3", g($)) : void 0
        }

        function $(e, t) {
            return "<" == t ? g(K(_, ">"), $) : "[" == e ? g(x("]"), $) : void 0
        }

        function X() {
            return p(Y, G, Q, J)
        }

        function Y(e, t) {
            return "modifier" == e ? g(Y) : "variable" == e ? (m(t), g()) : "spread" == e ? g(Y) : "[" == e ? V(Y, "]") : "{" == e ? V(Z, "}") : void 0
        }

        function Z(e, t) {
            return "variable" != e || De.stream.match(/^\s*:/, !1) ? ("variable" == e && (De.marked = "property"), "spread" == e ? g(Y) : "}" == e ? p() : g(x(":"), Y, Q)) : (m(t), g(Q))
        }

        function Q(e, t) {
            return "=" == t ? g(S) : void 0
        }

        function J(e) {
            return "," == e ? g(X) : void 0
        }

        function ee(e, t) {
            return "keyword b" == e && "else" == t ? g(b("form", "else"), k, w) : void 0
        }

        function te(e) {
            return "(" == e ? g(b(")"), re, x(")"), w) : void 0
        }

        function re(e) {
            return "var" == e ? g(X, x(";"), ie) : ";" == e ? g(ie) : "variable" == e ? g(ne) : p(C, x(";"), ie)
        }

        function ne(e, t) {
            return "in" == t || "of" == t ? (De.marked = "keyword", g(C)) : g(A, ie)
        }

        function ie(e, t) {
            return ";" == e ? g(oe) : "in" == t || "of" == t ? (De.marked = "keyword", g(C)) : p(C, x(";"), oe)
        }

        function oe(e) {
            ")" != e && g(C)
        }

        function ae(e, t) {
            return "*" == t ? (De.marked = "keyword", g(ae)) : "variable" == e ? (m(t), g(ae)) : "(" == e ? g(v, b(")"), K(le, ")"), w, G, k, y) : void 0
        }

        function le(e) {
            return "spread" == e ? g(le) : p(Y, G, q)
        }

        function se(e, t) {
            return "variable" == e ? (m(t), g(ce)) : void 0
        }

        function ce(e, t) {
            return "extends" == t ? g(C, ce) : "{" == e ? g(b("}"), ue, w) : void 0
        }

        function ue(e, t) {
            return "variable" == e || "keyword" == De.style ? "static" == t ? (De.marked = "keyword", g(ue)) : (De.marked = "property", "get" == t || "set" == t ? g(de, ae, ue) : g(ae, ue)) : "*" == t ? (De.marked = "keyword", g(ue)) : ";" == e ? g(ue) : "}" == e ? g() : void 0
        }

        function de(e) {
            return "variable" != e ? p() : (De.marked = "property", g())
        }

        function fe(e, t) {
            return "*" == t ? (De.marked = "keyword", g(me, x(";"))) : "default" == t ? (De.marked = "keyword", g(C, x(";"))) : p(k)
        }

        function he(e) {
            return "string" == e ? g() : p(pe, me)
        }

        function pe(e, t) {
            return "{" == e ? V(pe, "}") : ("variable" == e && m(t), "*" == t && (De.marked = "keyword"), g(ge))
        }

        function ge(e, t) {
            return "as" == t ? (De.marked = "keyword", g(pe)) : void 0
        }

        function me(e, t) {
            return "from" == t ? (De.marked = "keyword", g(C)) : void 0
        }

        function ve(e) {
            return "]" == e ? g() : p(S, ye)
        }

        function ye(e) {
            return "for" == e ? p(be, x("]")) : "," == e ? g(K(T, "]")) : p(K(S, "]"))
        }

        function be(e) {
            return "for" == e ? g(te, be) : "if" == e ? g(C, be) : void 0
        }

        function we(e, t) {
            return "operator" == e.lastType || "," == e.lastType || Ne.test(t.charAt(0)) || /[,.]/.test(t.charAt(0))
        }
        var xe, ke, Ce = r.indentUnit,
            Se = n.statementIndent,
            Le = n.jsonld,
            Me = n.json || Le,
            Te = n.typescript,
            Ae = n.wordCharacters || /[\w$\xa1-\uffff]/,
            Oe = function () {
                function e(e) {
                    return {
                        type: e,
                        style: "keyword"
                    }
                }
                var t = e("keyword a"),
                    r = e("keyword b"),
                    n = e("keyword c"),
                    i = e("operator"),
                    o = {
                        type: "atom",
                        style: "atom"
                    },
                    a = {
                        "if": e("if"),
                        "while": t,
                        "with": t,
                        "else": r,
                        "do": r,
                        "try": r,
                        "finally": r,
                        "return": n,
                        "break": n,
                        "continue": n,
                        "new": e("new"),
                        "delete": n,
                        "throw": n,
                        "debugger": n,
                        "var": e("var"),
                        "const": e("var"),
                        let: e("var"),
                        "function": e("function"),
                        "catch": e("catch"),
                        "for": e("for"),
                        "switch": e("switch"),
                        "case": e("case"),
                        "default": e("default"),
                        "in": i,
                        "typeof": i,
                        "instanceof": i,
                        "true": o,
                        "false": o,
                        "null": o,
                        undefined: o,
                        NaN: o,
                        Infinity: o,
                        "this": e("this"),
                        "class": e("class"),
                        "super": e("atom"),
                        "yield": n,
                        "export": e("export"),
                        "import": e("import"),
                        "extends": n,
                        await: n,
                        async: e("async")
                    };
                if (Te) {
                    var l = {
                            type: "variable",
                            style: "variable-3"
                        },
                        s = {
                            "interface": e("class"),
                            "implements": n,
                            namespace: n,
                            module: e("module"),
                            "enum": e("module"),
                            "public": e("modifier"),
                            "private": e("modifier"),
                            "protected": e("modifier"),
                            "abstract": e("modifier"),
                            as: i,
                            string: l,
                            number: l,
                            "boolean": l,
                            any: l
                        };
                    for (var c in s) a[c] = s[c]
                }
                return a
            }(),
            Ne = /[+\-*&%=<>!?|~^]/,
            We = /^@(context|id|value|language|type|container|list|set|reverse|index|base|vocab|graph)"/,
            He = "([{}])",
            ze = {
                atom: !0,
                number: !0,
                variable: !0,
                string: !0,
                regexp: !0,
                "this": !0,
                "jsonld-keyword": !0
            },
            De = {
                state: null,
                column: null,
                marked: null,
                cc: null
            },
            Pe = {
                name: "this",
                next: {
                    name: "arguments"
                }
            };
        return w.lex = !0, {
            startState: function (e) {
                var t = {
                    tokenize: a,
                    lastType: "sof",
                    cc: [],
                    lexical: new d((e || 0) - Ce, 0, "block", !1),
                    localVars: n.localVars,
                    context: n.localVars && {
                        vars: n.localVars
                    },
                    indented: e || 0
                };
                return n.globalVars && "object" == typeof n.globalVars && (t.globalVars = n.globalVars), t
            },
            token: function (e, t) {
                if (e.sol() && (t.lexical.hasOwnProperty("align") || (t.lexical.align = !1), t.indented = e.indentation(), u(e, t)), t.tokenize != s && e.eatSpace()) return null;
                var r = t.tokenize(e, t);
                return "comment" == xe ? r : (t.lastType = "operator" != xe || "++" != ke && "--" != ke ? xe : "incdec", h(t, r, xe, ke, e))
            },
            indent: function (t, r) {
                if (t.tokenize == s) return e.Pass;
                if (t.tokenize != a) return 0;
                var i = r && r.charAt(0),
                    o = t.lexical;
                if (!/^\s*else\b/.test(r))
                    for (var l = t.cc.length - 1; l >= 0; --l) {
                        var c = t.cc[l];
                        if (c == w) o = o.prev;
                        else if (c != ee) break
                    }
                "stat" == o.type && "}" == i && (o = o.prev), Se && ")" == o.type && "stat" == o.prev.type && (o = o.prev);
                var u = o.type,
                    d = i == u;
                return "vardef" == u ? o.indented + ("operator" == t.lastType || "," == t.lastType ? o.info + 1 : 0) : "form" == u && "{" == i ? o.indented : "form" == u ? o.indented + Ce : "stat" == u ? o.indented + (we(t, r) ? Se || Ce : 0) : "switch" != o.info || d || 0 == n.doubleIndentSwitch ? o.align ? o.column + (d ? 0 : 1) : o.indented + (d ? 0 : Ce) : o.indented + (/^(?:case|default)\b/.test(r) ? Ce : 2 * Ce)
            },
            electricInput: /^\s*(?:case .*?:|default:|\{|\})$/,
            blockCommentStart: Me ? null : "/*",
            blockCommentEnd: Me ? null : "*/",
            lineComment: Me ? null : "//",
            fold: "brace",
            closeBrackets: "()[]{}''\"\"``",
            helperType: Me ? "json" : "javascript",
            jsonldMode: Le,
            jsonMode: Me,
            expressionAllowed: t,
            skipExpression: function (e) {
                var t = e.cc[e.cc.length - 1];
                (t == C || t == S) && e.cc.pop()
            }
        }
    }), e.registerHelper("wordChars", "javascript", /[\w$]/), e.defineMIME("text/javascript", "javascript"), e.defineMIME("text/ecmascript", "javascript"), e.defineMIME("application/javascript", "javascript"), e.defineMIME("application/x-javascript", "javascript"), e.defineMIME("application/ecmascript", "javascript"), e.defineMIME("application/json", {
        name: "javascript",
        json: !0
    }), e.defineMIME("application/x-json", {
        name: "javascript",
        json: !0
    }), e.defineMIME("application/ld+json", {
        name: "javascript",
        jsonld: !0
    }), e.defineMIME("text/typescript", {
        name: "javascript",
        typescript: !0
    }), e.defineMIME("application/typescript", {
        name: "javascript",
        typescript: !0
    })
}),
function (e) {
    "object" == typeof exports && "object" == typeof module ? e(require("../../lib/codemirror")) : "function" == typeof define && define.amd ? define(["../../lib/codemirror"], e) : e(CodeMirror)
}(function (e) {
    "use strict";

    function t(e) {
        for (var t = {}, r = 0; r < e.length; ++r) t[e[r]] = !0;
        return t
    }

    function r(e, t) {
        for (var r, n = !1; null != (r = e.next());) {
            if (n && "/" == r) {
                t.tokenize = null;
                break
            }
            n = "*" == r
        }
        return ["comment", "comment"]
    }
    e.defineMode("css", function (t, r) {
        function n(e, t) {
            return p = t, e
        }

        function i(e, t) {
            var r = e.next();
            if (v[r]) {
                var i = v[r](e, t);
                if (i !== !1) return i
            }
            return "@" == r ? (e.eatWhile(/[\w\\\-]/), n("def", e.current())) : "=" == r || ("~" == r || "|" == r) && e.eat("=") ? n(null, "compare") : '"' == r || "'" == r ? (t.tokenize = o(r), t.tokenize(e, t)) : "#" == r ? (e.eatWhile(/[\w\\\-]/), n("atom", "hash")) : "!" == r ? (e.match(/^\s*\w*/), n("keyword", "important")) : /\d/.test(r) || "." == r && e.eat(/\d/) ? (e.eatWhile(/[\w.%]/), n("number", "unit")) : "-" !== r ? /[,+>*\/]/.test(r) ? n(null, "select-op") : "." == r && e.match(/^-?[_a-z][_a-z0-9-]*/i) ? n("qualifier", "qualifier") : /[:;{}\[\]\(\)]/.test(r) ? n(null, r) : "u" == r && e.match(/rl(-prefix)?\(/) || "d" == r && e.match("omain(") || "r" == r && e.match("egexp(") ? (e.backUp(1), t.tokenize = a, n("property", "word")) : /[\w\\\-]/.test(r) ? (e.eatWhile(/[\w\\\-]/), n("property", "word")) : n(null, null) : /[\d.]/.test(e.peek()) ? (e.eatWhile(/[\w.%]/), n("number", "unit")) : e.match(/^-[\w\\\-]+/) ? (e.eatWhile(/[\w\\\-]/), e.match(/^\s*:/, !1) ? n("variable-2", "variable-definition") : n("variable-2", "variable")) : e.match(/^\w+-/) ? n("meta", "meta") : void 0
        }

        function o(e) {
            return function (t, r) {
                for (var i, o = !1; null != (i = t.next());) {
                    if (i == e && !o) {
                        ")" == e && t.backUp(1);
                        break
                    }
                    o = !o && "\\" == i
                }
                return (i == e || !o && ")" != e) && (r.tokenize = null), n("string", "string")
            }
        }

        function a(e, t) {
            return e.next(), e.match(/\s*[\"\')]/, !1) ? t.tokenize = null : t.tokenize = o(")"), n(null, "(")
        }

        function l(e, t, r) {
            this.type = e, this.indent = t, this.prev = r
        }

        function s(e, t, r, n) {
            return e.context = new l(r, t.indentation() + (n === !1 ? 0 : m), e.context), r
        }

        function c(e) {
            return e.context.prev && (e.context = e.context.prev), e.context.type
        }

        function u(e, t, r) {
            return N[r.context.type](e, t, r)
        }

        function d(e, t, r, n) {
            for (var i = n || 1; i > 0; i--) r.context = r.context.prev;
            return u(e, t, r)
        }

        function f(e) {
            var t = e.current().toLowerCase();
            g = T.hasOwnProperty(t) ? "atom" : M.hasOwnProperty(t) ? "keyword" : "variable"
        }
        var h = r.inline;
        r.propertyKeywords || (r = e.resolveMode("text/css"));
        var p, g, m = t.indentUnit,
            v = r.tokenHooks,
            y = r.documentTypes || {},
            b = r.mediaTypes || {},
            w = r.mediaFeatures || {},
            x = r.mediaValueKeywords || {},
            k = r.propertyKeywords || {},
            C = r.nonStandardPropertyKeywords || {},
            S = r.fontProperties || {},
            L = r.counterDescriptors || {},
            M = r.colorKeywords || {},
            T = r.valueKeywords || {},
            A = r.allowNested,
            O = r.supportsAtComponent === !0,
            N = {};
        return N.top = function (e, t, r) {
            if ("{" == e) return s(r, t, "block");
            if ("}" == e && r.context.prev) return c(r);
            if (O && /@component/.test(e)) return s(r, t, "atComponentBlock");
            if (/^@(-moz-)?document$/.test(e)) return s(r, t, "documentTypes");
            if (/^@(media|supports|(-moz-)?document|import)$/.test(e)) return s(r, t, "atBlock");
            if (/^@(font-face|counter-style)/.test(e)) return r.stateArg = e, "restricted_atBlock_before";
            if (/^@(-(moz|ms|o|webkit)-)?keyframes$/.test(e)) return "keyframes";
            if (e && "@" == e.charAt(0)) return s(r, t, "at");
            if ("hash" == e) g = "builtin";
            else if ("word" == e) g = "tag";
            else {
                if ("variable-definition" == e) return "maybeprop";
                if ("interpolation" == e) return s(r, t, "interpolation");
                if (":" == e) return "pseudo";
                if (A && "(" == e) return s(r, t, "parens")
            }
            return r.context.type
        }, N.block = function (e, t, r) {
            if ("word" == e) {
                var n = t.current().toLowerCase();
                return k.hasOwnProperty(n) ? (g = "property", "maybeprop") : C.hasOwnProperty(n) ? (g = "string-2", "maybeprop") : A ? (g = t.match(/^\s*:(?:\s|$)/, !1) ? "property" : "tag", "block") : (g += " error", "maybeprop")
            }
            return "meta" == e ? "block" : A || "hash" != e && "qualifier" != e ? N.top(e, t, r) : (g = "error", "block")
        }, N.maybeprop = function (e, t, r) {
            return ":" == e ? s(r, t, "prop") : u(e, t, r)
        }, N.prop = function (e, t, r) {
            if (";" == e) return c(r);
            if ("{" == e && A) return s(r, t, "propBlock");
            if ("}" == e || "{" == e) return d(e, t, r);
            if ("(" == e) return s(r, t, "parens");
            if ("hash" != e || /^#([0-9a-fA-f]{3,4}|[0-9a-fA-f]{6}|[0-9a-fA-f]{8})$/.test(t.current())) {
                if ("word" == e) f(t);
                else if ("interpolation" == e) return s(r, t, "interpolation")
            } else g += " error";
            return "prop"
        }, N.propBlock = function (e, t, r) {
            return "}" == e ? c(r) : "word" == e ? (g = "property", "maybeprop") : r.context.type
        }, N.parens = function (e, t, r) {
            return "{" == e || "}" == e ? d(e, t, r) : ")" == e ? c(r) : "(" == e ? s(r, t, "parens") : "interpolation" == e ? s(r, t, "interpolation") : ("word" == e && f(t), "parens")
        }, N.pseudo = function (e, t, r) {
            return "word" == e ? (g = "variable-3", r.context.type) : u(e, t, r)
        }, N.documentTypes = function (e, t, r) {
            return "word" == e && y.hasOwnProperty(t.current()) ? (g = "tag", r.context.type) : N.atBlock(e, t, r)
        }, N.atBlock = function (e, t, r) {
            if ("(" == e) return s(r, t, "atBlock_parens");
            if ("}" == e || ";" == e) return d(e, t, r);
            if ("{" == e) return c(r) && s(r, t, A ? "block" : "top");
            if ("interpolation" == e) return s(r, t, "interpolation");
            if ("word" == e) {
                var n = t.current().toLowerCase();
                g = "only" == n || "not" == n || "and" == n || "or" == n ? "keyword" : b.hasOwnProperty(n) ? "attribute" : w.hasOwnProperty(n) ? "property" : x.hasOwnProperty(n) ? "keyword" : k.hasOwnProperty(n) ? "property" : C.hasOwnProperty(n) ? "string-2" : T.hasOwnProperty(n) ? "atom" : M.hasOwnProperty(n) ? "keyword" : "error"
            }
            return r.context.type
        }, N.atComponentBlock = function (e, t, r) {
            return "}" == e ? d(e, t, r) : "{" == e ? c(r) && s(r, t, A ? "block" : "top", !1) : ("word" == e && (g = "error"), r.context.type)
        }, N.atBlock_parens = function (e, t, r) {
            return ")" == e ? c(r) : "{" == e || "}" == e ? d(e, t, r, 2) : N.atBlock(e, t, r)
        }, N.restricted_atBlock_before = function (e, t, r) {
            return "{" == e ? s(r, t, "restricted_atBlock") : "word" == e && "@counter-style" == r.stateArg ? (g = "variable", "restricted_atBlock_before") : u(e, t, r)
        }, N.restricted_atBlock = function (e, t, r) {
            return "}" == e ? (r.stateArg = null, c(r)) : "word" == e ? (g = "@font-face" == r.stateArg && !S.hasOwnProperty(t.current().toLowerCase()) || "@counter-style" == r.stateArg && !L.hasOwnProperty(t.current().toLowerCase()) ? "error" : "property", "maybeprop") : "restricted_atBlock"
        }, N.keyframes = function (e, t, r) {
            return "word" == e ? (g = "variable", "keyframes") : "{" == e ? s(r, t, "top") : u(e, t, r)
        }, N.at = function (e, t, r) {
            return ";" == e ? c(r) : "{" == e || "}" == e ? d(e, t, r) : ("word" == e ? g = "tag" : "hash" == e && (g = "builtin"), "at")
        }, N.interpolation = function (e, t, r) {
            return "}" == e ? c(r) : "{" == e || ";" == e ? d(e, t, r) : ("word" == e ? g = "variable" : "variable" != e && "(" != e && ")" != e && (g = "error"), "interpolation")
        }, {
            startState: function (e) {
                return {
                    tokenize: null,
                    state: h ? "block" : "top",
                    stateArg: null,
                    context: new l(h ? "block" : "top", e || 0, null)
                }
            },
            token: function (e, t) {
                if (!t.tokenize && e.eatSpace()) return null;
                var r = (t.tokenize || i)(e, t);
                return r && "object" == typeof r && (p = r[1], r = r[0]), g = r, t.state = N[t.state](p, e, t), g
            },
            indent: function (e, t) {
                var r = e.context,
                    n = t && t.charAt(0),
                    i = r.indent;
                return "prop" != r.type || "}" != n && ")" != n || (r = r.prev), r.prev && ("}" != n || "block" != r.type && "top" != r.type && "interpolation" != r.type && "restricted_atBlock" != r.type ? (")" == n && ("parens" == r.type || "atBlock_parens" == r.type) || "{" == n && ("at" == r.type || "atBlock" == r.type)) && (i = Math.max(0, r.indent - m), r = r.prev) : (r = r.prev, i = r.indent)), i
            },
            electricChars: "}",
            blockCommentStart: "/*",
            blockCommentEnd: "*/",
            fold: "brace"
        }
    });
    var n = ["domain", "regexp", "url", "url-prefix"],
        i = t(n),
        o = ["all", "aural", "braille", "handheld", "print", "projection", "screen", "tty", "tv", "embossed"],
        a = t(o),
        l = ["width", "min-width", "max-width", "height", "min-height", "max-height", "device-width", "min-device-width", "max-device-width", "device-height", "min-device-height", "max-device-height", "aspect-ratio", "min-aspect-ratio", "max-aspect-ratio", "device-aspect-ratio", "min-device-aspect-ratio", "max-device-aspect-ratio", "color", "min-color", "max-color", "color-index", "min-color-index", "max-color-index", "monochrome", "min-monochrome", "max-monochrome", "resolution", "min-resolution", "max-resolution", "scan", "grid", "orientation", "device-pixel-ratio", "min-device-pixel-ratio", "max-device-pixel-ratio", "pointer", "any-pointer", "hover", "any-hover"],
        s = t(l),
        c = ["landscape", "portrait", "none", "coarse", "fine", "on-demand", "hover", "interlace", "progressive"],
        u = t(c),
        d = ["align-content", "align-items", "align-self", "alignment-adjust", "alignment-baseline", "anchor-point", "animation", "animation-delay", "animation-direction", "animation-duration", "animation-fill-mode", "animation-iteration-count", "animation-name", "animation-play-state", "animation-timing-function", "appearance", "azimuth", "backface-visibility", "background", "background-attachment", "background-blend-mode", "background-clip", "background-color", "background-image", "background-origin", "background-position", "background-repeat", "background-size", "baseline-shift", "binding", "bleed", "bookmark-label", "bookmark-level", "bookmark-state", "bookmark-target", "border", "border-bottom", "border-bottom-color", "border-bottom-left-radius", "border-bottom-right-radius", "border-bottom-style", "border-bottom-width", "border-collapse", "border-color", "border-image", "border-image-outset", "border-image-repeat", "border-image-slice", "border-image-source", "border-image-width", "border-left", "border-left-color", "border-left-style", "border-left-width", "border-radius", "border-right", "border-right-color", "border-right-style", "border-right-width", "border-spacing", "border-style", "border-top", "border-top-color", "border-top-left-radius", "border-top-right-radius", "border-top-style", "border-top-width", "border-width", "bottom", "box-decoration-break", "box-shadow", "box-sizing", "break-after", "break-before", "break-inside", "caption-side", "clear", "clip", "color", "color-profile", "column-count", "column-fill", "column-gap", "column-rule", "column-rule-color", "column-rule-style", "column-rule-width", "column-span", "column-width", "columns", "content", "counter-increment", "counter-reset", "crop", "cue", "cue-after", "cue-before", "cursor", "direction", "display", "dominant-baseline", "drop-initial-after-adjust", "drop-initial-after-align", "drop-initial-before-adjust", "drop-initial-before-align", "drop-initial-size", "drop-initial-value", "elevation", "empty-cells", "fit", "fit-position", "flex", "flex-basis", "flex-direction", "flex-flow", "flex-grow", "flex-shrink", "flex-wrap", "float", "float-offset", "flow-from", "flow-into", "font", "font-feature-settings", "font-family", "font-kerning", "font-language-override", "font-size", "font-size-adjust", "font-stretch", "font-style", "font-synthesis", "font-variant", "font-variant-alternates", "font-variant-caps", "font-variant-east-asian", "font-variant-ligatures", "font-variant-numeric", "font-variant-position", "font-weight", "grid", "grid-area", "grid-auto-columns", "grid-auto-flow", "grid-auto-rows", "grid-column", "grid-column-end", "grid-column-gap", "grid-column-start", "grid-gap", "grid-row", "grid-row-end", "grid-row-gap", "grid-row-start", "grid-template", "grid-template-areas", "grid-template-columns", "grid-template-rows", "hanging-punctuation", "height", "hyphens", "icon", "image-orientation", "image-rendering", "image-resolution", "inline-box-align", "justify-content", "left", "letter-spacing", "line-break", "line-height", "line-stacking", "line-stacking-ruby", "line-stacking-shift", "line-stacking-strategy", "list-style", "list-style-image", "list-style-position", "list-style-type", "margin", "margin-bottom", "margin-left", "margin-right", "margin-top", "marker-offset", "marks", "marquee-direction", "marquee-loop", "marquee-play-count", "marquee-speed", "marquee-style", "max-height", "max-width", "min-height", "min-width", "move-to", "nav-down", "nav-index", "nav-left", "nav-right", "nav-up", "object-fit", "object-position", "opacity", "order", "orphans", "outline", "outline-color", "outline-offset", "outline-style", "outline-width", "overflow", "overflow-style", "overflow-wrap", "overflow-x", "overflow-y", "padding", "padding-bottom", "padding-left", "padding-right", "padding-top", "page", "page-break-after", "page-break-before", "page-break-inside", "page-policy", "pause", "pause-after", "pause-before", "perspective", "perspective-origin", "pitch", "pitch-range", "play-during", "position", "presentation-level", "punctuation-trim", "quotes", "region-break-after", "region-break-before", "region-break-inside", "region-fragment", "rendering-intent", "resize", "rest", "rest-after", "rest-before", "richness", "right", "rotation", "rotation-point", "ruby-align", "ruby-overhang", "ruby-position", "ruby-span", "shape-image-threshold", "shape-inside", "shape-margin", "shape-outside", "size", "speak", "speak-as", "speak-header", "speak-numeral", "speak-punctuation", "speech-rate", "stress", "string-set", "tab-size", "table-layout", "target", "target-name", "target-new", "target-position", "text-align", "text-align-last", "text-decoration", "text-decoration-color", "text-decoration-line", "text-decoration-skip", "text-decoration-style", "text-emphasis", "text-emphasis-color", "text-emphasis-position", "text-emphasis-style", "text-height", "text-indent", "text-justify", "text-outline", "text-overflow", "text-shadow", "text-size-adjust", "text-space-collapse", "text-transform", "text-underline-position", "text-wrap", "top", "transform", "transform-origin", "transform-style", "transition", "transition-delay", "transition-duration", "transition-property", "transition-timing-function", "unicode-bidi", "vertical-align", "visibility", "voice-balance", "voice-duration", "voice-family", "voice-pitch", "voice-range", "voice-rate", "voice-stress", "voice-volume", "volume", "white-space", "widows", "width", "word-break", "word-spacing", "word-wrap", "z-index", "clip-path", "clip-rule", "mask", "enable-background", "filter", "flood-color", "flood-opacity", "lighting-color", "stop-color", "stop-opacity", "pointer-events", "color-interpolation", "color-interpolation-filters", "color-rendering", "fill", "fill-opacity", "fill-rule", "image-rendering", "marker", "marker-end", "marker-mid", "marker-start", "shape-rendering", "stroke", "stroke-dasharray", "stroke-dashoffset", "stroke-linecap", "stroke-linejoin", "stroke-miterlimit", "stroke-opacity", "stroke-width", "text-rendering", "baseline-shift", "dominant-baseline", "glyph-orientation-horizontal", "glyph-orientation-vertical", "text-anchor", "writing-mode"],
        f = t(d),
        h = ["scrollbar-arrow-color", "scrollbar-base-color", "scrollbar-dark-shadow-color", "scrollbar-face-color", "scrollbar-highlight-color", "scrollbar-shadow-color", "scrollbar-3d-light-color", "scrollbar-track-color", "shape-inside", "searchfield-cancel-button", "searchfield-decoration", "searchfield-results-button", "searchfield-results-decoration", "zoom"],
        p = t(h),
        g = ["font-family", "src", "unicode-range", "font-variant", "font-feature-settings", "font-stretch", "font-weight", "font-style"],
        m = t(g),
        v = ["additive-symbols", "fallback", "negative", "pad", "prefix", "range", "speak-as", "suffix", "symbols", "system"],
        y = t(v),
        b = ["aliceblue", "antiquewhite", "aqua", "aquamarine", "azure", "beige", "bisque", "black", "blanchedalmond", "blue", "blueviolet", "brown", "burlywood", "cadetblue", "chartreuse", "chocolate", "coral", "cornflowerblue", "cornsilk", "crimson", "cyan", "darkblue", "darkcyan", "darkgoldenrod", "darkgray", "darkgreen", "darkkhaki", "darkmagenta", "darkolivegreen", "darkorange", "darkorchid", "darkred", "darksalmon", "darkseagreen", "darkslateblue", "darkslategray", "darkturquoise", "darkviolet", "deeppink", "deepskyblue", "dimgray", "dodgerblue", "firebrick", "floralwhite", "forestgreen", "fuchsia", "gainsboro", "ghostwhite", "gold", "goldenrod", "gray", "grey", "green", "greenyellow", "honeydew", "hotpink", "indianred", "indigo", "ivory", "khaki", "lavender", "lavenderblush", "lawngreen", "lemonchiffon", "lightblue", "lightcoral", "lightcyan", "lightgoldenrodyellow", "lightgray", "lightgreen", "lightpink", "lightsalmon", "lightseagreen", "lightskyblue", "lightslategray", "lightsteelblue", "lightyellow", "lime", "limegreen", "linen", "magenta", "maroon", "mediumaquamarine", "mediumblue", "mediumorchid", "mediumpurple", "mediumseagreen", "mediumslateblue", "mediumspringgreen", "mediumturquoise", "mediumvioletred", "midnightblue", "mintcream", "mistyrose", "moccasin", "navajowhite", "navy", "oldlace", "olive", "olivedrab", "orange", "orangered", "orchid", "palegoldenrod", "palegreen", "paleturquoise", "palevioletred", "papayawhip", "peachpuff", "peru", "pink", "plum", "powderblue", "purple", "rebeccapurple", "red", "rosybrown", "royalblue", "saddlebrown", "salmon", "sandybrown", "seagreen", "seashell", "sienna", "silver", "skyblue", "slateblue", "slategray", "snow", "springgreen", "steelblue", "tan", "teal", "thistle", "tomato", "turquoise", "violet", "wheat", "white", "whitesmoke", "yellow", "yellowgreen"],
        w = t(b),
        x = ["above", "absolute", "activeborder", "additive", "activecaption", "afar", "after-white-space", "ahead", "alias", "all", "all-scroll", "alphabetic", "alternate", "always", "amharic", "amharic-abegede", "antialiased", "appworkspace", "arabic-indic", "armenian", "asterisks", "attr", "auto", "avoid", "avoid-column", "avoid-page", "avoid-region", "background", "backwards", "baseline", "below", "bidi-override", "binary", "bengali", "blink", "block", "block-axis", "bold", "bolder", "border", "border-box", "both", "bottom", "break", "break-all", "break-word", "bullets", "button", "button-bevel", "buttonface", "buttonhighlight", "buttonshadow", "buttontext", "calc", "cambodian", "capitalize", "caps-lock-indicator", "caption", "captiontext", "caret", "cell", "center", "checkbox", "circle", "cjk-decimal", "cjk-earthly-branch", "cjk-heavenly-stem", "cjk-ideographic", "clear", "clip", "close-quote", "col-resize", "collapse", "color", "color-burn", "color-dodge", "column", "column-reverse", "compact", "condensed", "contain", "content", "content-box", "context-menu", "continuous", "copy", "counter", "counters", "cover", "crop", "cross", "crosshair", "currentcolor", "cursive", "cyclic", "darken", "dashed", "decimal", "decimal-leading-zero", "default", "default-button", "dense", "destination-atop", "destination-in", "destination-out", "destination-over", "devanagari", "difference", "disc", "discard", "disclosure-closed", "disclosure-open", "document", "dot-dash", "dot-dot-dash", "dotted", "double", "down", "e-resize", "ease", "ease-in", "ease-in-out", "ease-out", "element", "ellipse", "ellipsis", "embed", "end", "ethiopic", "ethiopic-abegede", "ethiopic-abegede-am-et", "ethiopic-abegede-gez", "ethiopic-abegede-ti-er", "ethiopic-abegede-ti-et", "ethiopic-halehame-aa-er", "ethiopic-halehame-aa-et", "ethiopic-halehame-am-et", "ethiopic-halehame-gez", "ethiopic-halehame-om-et", "ethiopic-halehame-sid-et", "ethiopic-halehame-so-et", "ethiopic-halehame-ti-er", "ethiopic-halehame-ti-et", "ethiopic-halehame-tig", "ethiopic-numeric", "ew-resize", "exclusion", "expanded", "extends", "extra-condensed", "extra-expanded", "fantasy", "fast", "fill", "fixed", "flat", "flex", "flex-end", "flex-start", "footnotes", "forwards", "from", "geometricPrecision", "georgian", "graytext", "grid", "groove", "gujarati", "gurmukhi", "hand", "hangul", "hangul-consonant", "hard-light", "hebrew", "help", "hidden", "hide", "higher", "highlight", "highlighttext", "hiragana", "hiragana-iroha", "horizontal", "hsl", "hsla", "hue", "icon", "ignore", "inactiveborder", "inactivecaption", "inactivecaptiontext", "infinite", "infobackground", "infotext", "inherit", "initial", "inline", "inline-axis", "inline-block", "inline-flex", "inline-grid", "inline-table", "inset", "inside", "intrinsic", "invert", "italic", "japanese-formal", "japanese-informal", "justify", "kannada", "katakana", "katakana-iroha", "keep-all", "khmer", "korean-hangul-formal", "korean-hanja-formal", "korean-hanja-informal", "landscape", "lao", "large", "larger", "left", "level", "lighter", "lighten", "line-through", "linear", "linear-gradient", "lines", "list-item", "listbox", "listitem", "local", "logical", "loud", "lower", "lower-alpha", "lower-armenian", "lower-greek", "lower-hexadecimal", "lower-latin", "lower-norwegian", "lower-roman", "lowercase", "ltr", "luminosity", "malayalam", "match", "matrix", "matrix3d", "media-controls-background", "media-current-time-display", "media-fullscreen-button", "media-mute-button", "media-play-button", "media-return-to-realtime-button", "media-rewind-button", "media-seek-back-button", "media-seek-forward-button", "media-slider", "media-sliderthumb", "media-time-remaining-display", "media-volume-slider", "media-volume-slider-container", "media-volume-sliderthumb", "medium", "menu", "menulist", "menulist-button", "menulist-text", "menulist-textfield", "menutext", "message-box", "middle", "min-intrinsic", "mix", "mongolian", "monospace", "move", "multiple", "multiply", "myanmar", "n-resize", "narrower", "ne-resize", "nesw-resize", "no-close-quote", "no-drop", "no-open-quote", "no-repeat", "none", "normal", "not-allowed", "nowrap", "ns-resize", "numbers", "numeric", "nw-resize", "nwse-resize", "oblique", "octal", "open-quote", "optimizeLegibility", "optimizeSpeed", "oriya", "oromo", "outset", "outside", "outside-shape", "overlay", "overline", "padding", "padding-box", "painted", "page", "paused", "persian", "perspective", "plus-darker", "plus-lighter", "pointer", "polygon", "portrait", "pre", "pre-line", "pre-wrap", "preserve-3d", "progress", "push-button", "radial-gradient", "radio", "read-only", "read-write", "read-write-plaintext-only", "rectangle", "region", "relative", "repeat", "repeating-linear-gradient", "repeating-radial-gradient", "repeat-x", "repeat-y", "reset", "reverse", "rgb", "rgba", "ridge", "right", "rotate", "rotate3d", "rotateX", "rotateY", "rotateZ", "round", "row", "row-resize", "row-reverse", "rtl", "run-in", "running", "s-resize", "sans-serif", "saturation", "scale", "scale3d", "scaleX", "scaleY", "scaleZ", "screen", "scroll", "scrollbar", "se-resize", "searchfield", "searchfield-cancel-button", "searchfield-decoration", "searchfield-results-button", "searchfield-results-decoration", "semi-condensed", "semi-expanded", "separate", "serif", "show", "sidama", "simp-chinese-formal", "simp-chinese-informal", "single", "skew", "skewX", "skewY", "skip-white-space", "slide", "slider-horizontal", "slider-vertical", "sliderthumb-horizontal", "sliderthumb-vertical", "slow", "small", "small-caps", "small-caption", "smaller", "soft-light", "solid", "somali", "source-atop", "source-in", "source-out", "source-over", "space", "space-around", "space-between", "spell-out", "square", "square-button", "start", "static", "status-bar", "stretch", "stroke", "sub", "subpixel-antialiased", "super", "sw-resize", "symbolic", "symbols", "table", "table-caption", "table-cell", "table-column", "table-column-group", "table-footer-group", "table-header-group", "table-row", "table-row-group", "tamil", "telugu", "text", "text-bottom", "text-top", "textarea", "textfield", "thai", "thick", "thin", "threeddarkshadow", "threedface", "threedhighlight", "threedlightshadow", "threedshadow", "tibetan", "tigre", "tigrinya-er", "tigrinya-er-abegede", "tigrinya-et", "tigrinya-et-abegede", "to", "top", "trad-chinese-formal", "trad-chinese-informal", "translate", "translate3d", "translateX", "translateY", "translateZ", "transparent", "ultra-condensed", "ultra-expanded", "underline", "up", "upper-alpha", "upper-armenian", "upper-greek", "upper-hexadecimal", "upper-latin", "upper-norwegian", "upper-roman", "uppercase", "urdu", "url", "var", "vertical", "vertical-text", "visible", "visibleFill", "visiblePainted", "visibleStroke", "visual", "w-resize", "wait", "wave", "wider", "window", "windowframe", "windowtext", "words", "wrap", "wrap-reverse", "x-large", "x-small", "xor", "xx-large", "xx-small"],
        k = t(x),
        C = n.concat(o).concat(l).concat(c).concat(d).concat(h).concat(b).concat(x);
    e.registerHelper("hintWords", "css", C), e.defineMIME("text/css", {
        documentTypes: i,
        mediaTypes: a,
        mediaFeatures: s,
        mediaValueKeywords: u,
        propertyKeywords: f,
        nonStandardPropertyKeywords: p,
        fontProperties: m,
        counterDescriptors: y,
        colorKeywords: w,
        valueKeywords: k,
        tokenHooks: {
            "/": function (e, t) {
                return e.eat("*") ? (t.tokenize = r, r(e, t)) : !1
            }
        },
        name: "css"
    }), e.defineMIME("text/x-scss", {
        mediaTypes: a,
        mediaFeatures: s,
        mediaValueKeywords: u,
        propertyKeywords: f,
        nonStandardPropertyKeywords: p,
        colorKeywords: w,
        valueKeywords: k,
        fontProperties: m,
        allowNested: !0,
        tokenHooks: {
            "/": function (e, t) {
                return e.eat("/") ? (e.skipToEnd(), ["comment", "comment"]) : e.eat("*") ? (t.tokenize = r, r(e, t)) : ["operator", "operator"]
            },
            ":": function (e) {
                return e.match(/\s*\{/) ? [null, "{"] : !1
            },
            $: function (e) {
                return e.match(/^[\w-]+/), e.match(/^\s*:/, !1) ? ["variable-2", "variable-definition"] : ["variable-2", "variable"]
            },
            "#": function (e) {
                return e.eat("{") ? [null, "interpolation"] : !1
            }
        },
        name: "css",
        helperType: "scss"
    }), e.defineMIME("text/x-less", {
        mediaTypes: a,
        mediaFeatures: s,
        mediaValueKeywords: u,
        propertyKeywords: f,
        nonStandardPropertyKeywords: p,
        colorKeywords: w,
        valueKeywords: k,
        fontProperties: m,
        allowNested: !0,
        tokenHooks: {
            "/": function (e, t) {
                return e.eat("/") ? (e.skipToEnd(), ["comment", "comment"]) : e.eat("*") ? (t.tokenize = r, r(e, t)) : ["operator", "operator"]
            },
            "@": function (e) {
                return e.eat("{") ? [null, "interpolation"] : e.match(/^(charset|document|font-face|import|(-(moz|ms|o|webkit)-)?keyframes|media|namespace|page|supports)\b/, !1) ? !1 : (e.eatWhile(/[\w\\\-]/), e.match(/^\s*:/, !1) ? ["variable-2", "variable-definition"] : ["variable-2", "variable"])
            },
            "&": function () {
                return ["atom", "atom"]
            }
        },
        name: "css",
        helperType: "less"
    }), e.defineMIME("text/x-gss", {
        documentTypes: i,
        mediaTypes: a,
        mediaFeatures: s,
        propertyKeywords: f,
        nonStandardPropertyKeywords: p,
        fontProperties: m,
        counterDescriptors: y,
        colorKeywords: w,
        valueKeywords: k,
        supportsAtComponent: !0,
        tokenHooks: {
            "/": function (e, t) {
                return e.eat("*") ? (t.tokenize = r, r(e, t)) : !1
            }
        },
        name: "css",
        helperType: "gss"
    })
}),
function (e) {
    "object" == typeof exports && "object" == typeof module ? e(require("../../lib/codemirror")) : "function" == typeof define && define.amd ? define(["../../lib/codemirror"], e) : e(CodeMirror)
}(function (e) {
    "use strict";
    var t = /[\w$]+/,
        r = 500;
    e.registerHelper("hint", "anyword", function (n, i) {
        for (var o = i && i.word || t, a = i && i.range || r, l = n.getCursor(), s = n.getLine(l.line), c = l.ch, u = c; u && o.test(s.charAt(u - 1));) --u;
        for (var d = u != c && s.slice(u, c), f = i && i.list || [], h = {}, p = new RegExp(o.source, "g"), g = -1; 1 >= g; g += 2)
            for (var m = l.line, v = Math.min(Math.max(m + g * a, n.firstLine()), n.lastLine()) + g; m != v; m += g)
                for (var y, b = n.getLine(m); y = p.exec(b);)(m != l.line || y[0] !== d) && (d && 0 != y[0].lastIndexOf(d, 0) || Object.prototype.hasOwnProperty.call(h, y[0]) || (h[y[0]] = !0, f.push(y[0])));
        return {
            list: f,
            from: e.Pos(l.line, u),
            to: e.Pos(l.line, c)
        }
    })
});
