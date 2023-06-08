 function kswr_replica_closer() {
     jQuery(".kswr-replica-popup").fadeOut(200)
 }

 function kswr_replica_show() {
     jQuery(".kswr-replica-popup").fadeIn(200)
 }

 function kswr_replica_add_section() {
     var t = jQuery("#kswr-replica-select").val(),
         a = jQuery("#kswr-replicaposition-select").val();
     "" != jQuery.trim(t) && "none" != jQuery.trim(t) && (jQuery(".kswr-dash-loading").fadeIn(100), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             sectionid: t,
             action: "kaswaraAddReplicaSection"
         },
         success: function (t) {
             var e = t;
             vc.events.trigger("vc:backend_editor:switch"), jQuery("#content-html").trigger("click");
             var r = jQuery("#wp-content-editor-container > #content.wp-editor-area"),
                 n = r.val();
             r.attr("aria-hidden", "false"), setTimeout(function () {
                 "top" == a ? r.val(e + n) : r.val(n + e), setTimeout(function () {
                     vc.events.trigger("vc:backend_editor:switch"), jQuery(".kswr-dash-loading").fadeOut(100), kaswara_action_success()
                 }, 800)
             }, 800)
         }
     }))
 }

 function kaswara_action_success() {
     jQuery(".kswr-dash-success").attr({
         "data-situation": "shown"
     }), setTimeout(function () {
         jQuery(".kswr-dash-success").attr({
             "data-situation": "hidden"
         })
     }, 5e3)
 }

 function kswr_save_custom_code() {
     var
         e = jQuery("#kswr-gmap-api").val();
     jQuery(".kswr-custom-save-sit").attr({
         "data-situation": "loading"
     }), jQuery(".kswr-dash-loading").fadeIn(100), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {

             googleMapApi: e,
             action: "kaswaraCustomCode"
         },
         success: function (t) {
             jQuery(".kswr-dash-loading").fadeOut(100), jQuery(".kswr-custom-save-sit").attr({
                 "data-situation": "done"
             }), setTimeout(function () {
                 jQuery(".kswr-custom-save-sit").attr({
                     "data-situation": "none"
                 }), kaswara_action_success()
             }, 5e3)
         }
     })
 }

 function kswr_save_custom_settings() {
     jQuery("#kswr-gmaps-key").val()
 }

 function kmcf7m_show_input(t) {
     var t = jQuery(t);
     kmcf7m_action_hidden(), t.parent(".kmcf7m-top-act-ele").attr({
         "data-situation": "shown"
     }), jQuery(".kmcf7m-ac-btn").attr({
         onclick: "kmcf7m_show_input(this)"
     }), t.children("span").html("&#10003;");
     var a = t.attr("data-action");
     "new" == a && t.attr({
         onclick: "kmcf7m_new_style()"
     }), "edit" == a && t.attr({
         onclick: "kmcf7m_edit_style()"
     })
 }

 function kmcf7m_edit_style() {
     var t = jQuery("#kmcf7m-mystyles-select").find(":selected"),
         a = t.attr("data-stylename");
     if ("" != a && void 0 != a) {
         var e = t.attr("data-styletype"),
             r = t.attr("data-stylebutton"),
             n = t.attr("data-thestyle");
         jQuery("#kameleon-cf7-container").attr({
             "data-style-name": a,
             "data-button-style": r,
             "data-style": e,
             style: n
         }), jQuery("#kmcf7m-curentstyle").html(a), kmfc7_chooser_curent_activate(r, "button"), kmfc7_chooser_curent_activate(e, "style"), kmcf7m_go_tostep(3), kmcf7m_actual_situation("end")
     }
 }

 function kmcf7_set_default(t, a) {
     a.indexOf("px") > -1 && (a = a.replace("px", "")), a.indexOf("%") > -1 && (a = a.replace("%", "")), jQuery('.kmcf7_maker_inp[data-cssname="' + t + '"]').parent(".minicolors").find(".minicolors-swatch-color").css({
         "background-color": a
     }), jQuery('.kmcf7_maker_inp[data-cssname="' + t + '"]').val(a).change()
 }

 function kmcf7m_action_hidden() {
     jQuery(".kmcf7m-top-act-ele").attr({
         "data-situation": "hidden"
     }), jQuery(".kmcf7m-top-action-button.action").each(function () {
         jQuery(this).children("span").html(jQuery(this).attr("data-realicon"))
     })
 }

 function kmcf7m_new_style() {
     var t = jQuery("#kmcf7m-stylename").val(),
         a = jQuery("#kameleon-cf7-container");
     "" != jQuery.trim(t) && (jQuery("#kmcf7m-curentstyle").html(t), a.attr({
         style: ""
     }), a.attr({
         "data-style-name": t
     }), a.attr({
         "data-button-style": "qaswara"
     }), a.attr({
         "data-style": "qaswara"
     }), kmcf7m_go_tostep(2), kmcf7m_actual_situation("end"), kmfc7_chooser_curent_activate("qaswara", "button"), kmfc7_chooser_curent_activate("qaswara", "style"), km_cf7_form_style_loader("qaswara", "form", !0))
 }

 function kmcf7m_go_tostep(t) {
     var a = jQuery("#kameleon-cf7-container"),
         e = a.attr("data-style"),
         r = a.attr("data-style-old");
     "" != jQuery.trim(a.attr("data-style-name")) ? (jQuery(".km-builder-cr-element").attr({
         "data-situation": "hidden"
     }), jQuery(".kmcf7m-ele" + t).attr({
         "data-situation": "shown"
     }), jQuery(".kmcf7m-process-container").attr({
         "data-step": t
     }), 3 == t && e != r && km_cf7_form_style_loader(e, "form"), jQuery(".kmcf7m-process-element").attr({
         "data-situation": "noactive"
     }), jQuery(".kmcf7m-pp-step-" + t).attr({
         "data-situation": "active"
     })) : (jQuery(".km-builder-cr-element").attr({
         "data-situation": "hidden"
     }), jQuery(".kmcf7m-ele1").attr({
         "data-situation": "shown"
     }), jQuery(".kmcf7m-process-container").attr({
         "data-step": "1"
     }))
 }

 function kmcf7m_actual_situation(t) {
     jQuery(".kmcf7m-top-actions").attr({
         "data-situation": t
     }), kmcf7m_action_hidden(), "begin" == t && (jQuery("#kmcf7m-curentstyle").html(""), jQuery(".kmcf7m-ac-btn").attr({
         onclick: "kmcf7m_show_input(this)"
     }), kmcf7m_go_tostep(1), jQuery("#kameleon-cf7-container").attr({
         "data-style-name": "",
         "data-button-style": "qaswara",
         "data-style": "qaswara",
         style: ""
     }))
 }

 function km_cf7_designer_focus_plugin(t) {
     jQuery(".km_cf7-input-container").removeClass("filled"), jQuery(t).parent(".km_cf7-input-container").addClass("filled"), km_cf7_designer_checkfill_plugin()
 }

 function km_cf7_designer_blur_plugin(t) {
     jQuery(".km_cf7-input-container").removeClass("filled"), km_cf7_designer_checkfill_plugin()
 }

 function km_cf7_designer_checkfill_plugin() {
     jQuery(".km_cf7-input").each(function () {
         var t = jQuery(this);
         "" != jQuery.trim(t.val()) && t.parent(".km_cf7-input-container").addClass("filled")
     })
 }

 function km_cf7_onfield_change(t) {
     var a = (t = jQuery(t)).attr("data-cssname"),
         e = t.attr("data-csssufix"),
         r = t.attr("data-element-type");
     km_cf7_replace_style(a, t.val(), e, r)
 }

 function km_cf7_replace_style(t, a, e, r) {
     var n = jQuery(".kameleon-cf7-container"),
         s = n.attr("style").split(";"),
         o = buttonStyleResult = "",
         i = 0;
     s.forEach(function (r, n) {
         var s = r.split(":");
         t === s[0] && (r = s[0] + ":" + a + e, i = 1), "" != jQuery.trim(r) && (o += r + ";")
     }), 0 == i && (o += t + ":" + a + e), n.attr({
         style: o,
         "data-button-css": buttonStyleResult
     })
 }

 function km_cf7_button_type_chooser(t) {
     var t = jQuery(t);
     jQuery(".km-builder-style-element.buttontype").attr({
         "data-situation": "none"
     }), t.attr({
         "data-situation": "active"
     });
     var a = t.attr("data-buttonname");
     jQuery("#kameleon-cf7-container").attr({
         style: t.attr("data-defaultstyle"),
         "data-button-style": a
     }), kmcf7m_go_tostep(5), kmfc7_chooser_curent_activate(a, "button")
 }

 function km_cf7_style_type_chooser(t) {
     var t = jQuery(t),
         a = jQuery("#kameleon-cf7-container");
     a.attr("data-button-css");
     jQuery(".km-builder-style-element.styletype").attr({
         "data-situation": "none"
     }), t.attr({
         "data-situation": "active"
     });
     var e = t.attr("data-stylename");
     t.attr("data-defaultstyle");
     a.attr({
         "data-style": e,
         style: "",
         "data-button-css": ""
     }), kmcf7m_go_tostep(3), km_cf7_form_style_loader(e, "form"), kmfc7_chooser_curent_activate(e, "style")
 }

 function km_cf7_form_style_loader(t, a, e) {
     if ("" != jQuery.trim(t)) {
         jQuery("#kameleon-cf7-container");
         jQuery(".kswr-dash-logo").attr({
             "data-situation": "loading"
         }), jQuery.ajax({
             type: "POST",
             url: plugindir.ajax_handler,
             data: {
                 styleType: t,
                 actionName: a,
                 action: "kaswaraCf7FormCreator"
             },
             success: function (a) {
                 jQuery(".km-builder-cr-element").attr({
                     "data-situation": "hidden"
                 }), jQuery(".km-builder-form-styler").html(a).attr({
                     "data-situation": "shown"
                 }), kmfc7_input_default_colorpicker(), kmcf7_set_default_loader(), kmfc7_input_default_values(), kmfc7_svg_adder_plugin(), jQuery(".kswr-dash-logo").attr({
                     "data-situation": "normal"
                 }), jQuery("#kameleon-cf7-container").attr({
                     "data-style-old": t
                 }), 1 == e && (kmcf7m_go_tostep(2), kmfc7_button_form_default()), kaswara_action_success()
             }
         })
     }
 }

 function km_cf7_save_style(t, a) {
     var a = jQuery(a),
         e = jQuery("#kameleon-cf7-container"),
         r = e.attr("data-style-name"),
         n = e.attr("data-style"),
         s = e.attr("data-button-style"),
         o = e.attr("style"),
         i = e.attr("data-button-css"),
         c = r.toLowerCase();
     c = c.replace(" ", "-"), "" != jQuery.trim(r) && (jQuery("#kmcf7m-mystyles-select option[data-stylename='" + r + "']").attr({
         "data-styletype": n,
         "data-stylebutton": s,
         "data-thestyle": o
     }), 0 == jQuery("#kmcf7m-mystyles-select option[data-stylename='" + r + "']").length && jQuery("#kmcf7m-mystyles-select").append('<option value="' + c + '" data-button-css="" data-styleid="' + c + '" data-stylename="' + r + '"  data-styletype="' + n + '" \t\t\t\tdata-stylebutton="' + s + '" data-thestyle="' + o + '">' + r + "</option>"), jQuery(".kswr-dash-logo").attr({
         "data-situation": "loading"
     }), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             styleName: r,
             styleType: n,
             styleButton: s,
             theStyle: o,
             actionName: t,
             buttonCSS: i,
             action: "kaswaraCf7Designer"
         },
         success: function (t) {
             jQuery(".kswr-dash-logo").attr({
                 "data-situation": "normal"
             }), jQuery("#kmcf7m-stylename").val(""), kaswara_action_success()
         }
     })), "yes" == jQuery.trim(a.attr("data-begin")) && kmcf7m_actual_situation("begin")
 }

 function km_cf7_delete_style() {
     kaswara_dialog("Kaswara Alert", "Are you sure you want to delete this contact form 7 style?", function () {
         var t = jQuery("#kameleon-cf7-container").attr("data-style-name");
         "" != jQuery.trim(t) && (jQuery(".kswr-dash-logo").attr({
             "data-situation": "loading"
         }), kswr_back_shownhidden(".kswr-dash-loading-small", "shown"), jQuery.ajax({
             type: "POST",
             url: plugindir.ajax_handler,
             data: {
                 styleName: t,
                 actionName: "delete",
                 action: "kaswaraCf7Designer"
             },
             success: function (a) {
                 jQuery(".kswr-dash-logo").attr({
                     "data-situation": "normal"
                 }), jQuery("#kmcf7m-mystyles-select option[data-stylename='" + t + "']").remove(), jQuery("#kameleon-cf7-container").attr({
                     "data-style-name": "",
                     "data-button-style": "qaswara",
                     "data-style": "qaswara",
                     style: ""
                 }), kmcf7m_go_tostep(1), kmcf7m_actual_situation("begin"), kaswara_action_success(), kswr_sccess_small()
             }
         }))
     })
 }

 function kmcf7_set_default_loader() {
     jQuery("#kameleon-cf7-container").attr("style").split(";").forEach(function (t, a) {
         var e = t.split(":");
         "" != jQuery.trim(e) && void 0 != e && kmcf7_set_default(e[0], e[1])
     })
 }

 function kaswara_change_range(t) {
     var a = (t = jQuery(t)).val(),
         e = t.attr("data-type");
     "slider" == e && t.parent(".km-slider-range-parent").parent(".km-slider-range-container").children(".km-slider-input").val(a).change(), "number" == e && t.parent(".km-slider-range-container").children(".km-slider-range-parent").children(".km-slider-range").val(a);
     var r = t.attr("max"),
         n = t.attr("min"),
         s = 0,
         o = 100 * n / (r - n);
     n <= 0 && (o = 100 * -n / (r - n)), a <= 0 && (s = o + 100 * parseInt(a) / (r - n)), a > 0 && n <= 0 && (s = o + parseInt(100 * parseInt(a) / (r - n))), a > 0 && n > 0 && (s = parseInt(100 * parseInt(a) / (r - n)) - o), t.parents(".km-slider-range-container").find(".km-slider-range-filled").css({
         width: s + "%"
     })
 }

 function kmfc7_input_default_values() {
     jQuery(".km-slider-range").each(function (t, a) {
         kaswara_change_range(a, "slider")
     }), jQuery("body").find(".color-picker").minicolors({
         animationSpeed: 50,
         animationEasing: "swing",
         change: null,
         changeDelay: 0,
         control: "hue",
         dataUris: !0,
         defaultValue: "",
         format: "rgb",
         hide: null,
         hideSpeed: 100,
         inline: !1,
         keywords: "",
         letterCase: "lowercase",
         opacity: !0,
         position: "bottom right",
         show: null,
         showSpeed: 100,
         theme: "default",
         swatches: []
     }), jQuery(".kmcf7_maker_inp").change()
 }

 function kmfc7_input_default_colorpicker() {
     jQuery("body").find(".color-picker").minicolors({
         animationSpeed: 50,
         animationEasing: "swing",
         change: null,
         changeDelay: 0,
         control: "hue",
         dataUris: !0,
         defaultValue: "",
         format: "rgb",
         hide: null,
         hideSpeed: 100,
         inline: !1,
         keywords: "",
         letterCase: "lowercase",
         opacity: !0,
         position: "bottom right",
         show: null,
         showSpeed: 100,
         theme: "default",
         swatches: []
     })
 }

 function kmfc7_chooser_curent_activate(t, a) {
     "style" == a && (jQuery(".km-builder-style-element.styletype").attr({
         "data-situation": ""
     }), jQuery('.km-builder-style-element.styletype[data-stylename="' + t + '"]').attr({
         "data-situation": "active"
     })), "button" == a && (jQuery(".km-builder-style-element.buttontype").attr({
         "data-situation": ""
     }), jQuery('.km-builder-style-element.buttontype[data-buttonname="' + t + '"]').attr({
         "data-situation": "active"
     }))
 }

 function kmfc7_svg_adder_plugin() {
     jQuery(".km_cf7-input-container").find(".km_cf7-graphic").remove(), jQuery('.kameleon-cf7-container[data-style="shoko"]').children(".km_cf7-input-container").append('<svg class="graphic km_cf7-graphic" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">\t\t\t\t\t<path vector-effect="non-scaling-stroke" d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>\t\t\t\t\t<path vector-effect="non-scaling-stroke" d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>\t\t\t</svg>')
 }

 function kmfc7_button_form_default() {
     jQuery("#kameleon-cf7-container").attr("style", "");
     var t = "--kmcf7-btn-align: center;--kmcf7-btn-fontsize: 16px;   --kmcf7-btn-width: 50%;    --kmcf7-btn-letterspacing: 1px;    --kmcf7-btn-height: 45px;    --kmcf7-btn-mgtop: 15px;    --kmcf7-btn-mgbottom: 15px;    --kmcf7-btn-color: #ccc;    --kmcf7-btn-color-hover: #fff;   --kmcf7-btn-bg-color: #111;      --kmcf7-btn-bg-color-hover: #269AD6; --kmcf7-btn-border-radius: 0px;     --kmcf7-btn-border-width: 0px;      --kmcf7-btn-border-color: #1a1a1a;      --kmcf7-btn-border-color-hover:#2492CA;";
     t.split(";");
     jQuery("#kameleon-cf7-container").attr({
         style: t
     }), jQuery(".kswr-dash-logo").attr({
         "data-situation": "loading"
     }), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             action: "kaswaraCf7FormCreatorButton"
         },
         success: function (t) {
             jQuery(".kswr-dash-logo").attr({
                 "data-situation": "normal"
             }), jQuery("#kmcf7-button-styler-form").html(t), jQuery(".km-slider-range").each(function (t, a) {
                 kaswara_change_range(a, "slider")
             }), kmfc7_input_default_colorpicker(), kaswara_action_success()
         }
     })
 }

 function kaswara_change_bg_color(t, a) {
     var e = jQuery(t).val();
     jQuery(a).css({
         "background-color": e
     })
 }

 function kswr_change_distanceinput(t) {
     var a = (t = jQuery(t)).attr("data-posdistance"),
         e = t.attr("data-distance-name"),
         r = t.parent(".kaswara-margins").children(".kswr-" + e + "-value"),
         n = 0,
         s = "";
     r.val().split(";").forEach(function (r, o) {
         var i = r.split(":");
         e + "-" + a == i[0] && (r = e + "-" + a + ":" + t.val(), n = 1), "" != jQuery.trim(r) && (s += r + ";")
     }), 0 == n && (s += e + "-" + a + ":" + t.val()), r.val(s)
 }

 function kswr_change_fontinput(t) {
     var a = (t = jQuery(t)).attr("data-name"),
         e = t.parent(".sy-fonts-elem").parent(".sy-fonts-container").children(".kswr-fonts-value"),
         r = 0,
         n = "";
     if (e.val().split(";").forEach(function (e, s) {
             var o = e.split(":");
             a == o[0] && (e = a + ":" + t.val(), r = 1), "" != jQuery.trim(e) && (n += e + ";")
         }), 0 == r && (n += a + ":" + t.val()), "" == jQuery.trim(t.val())) {
         var s = a + ":;",
             o = new RegExp(s, "g");
         n = n.replace(o, "")
     }
     e.val(n)
 }

 function kswr_choose_icon(t) {
     (t = jQuery(t)).parent(".kswr-icon-set").children("input").val(t.attr("data-class")), t.parent(".kswr-icon-set").parent(".kswr-icon-chooser").children(".kswr-icon-search").children(".kswr-the-icon-choosed").children("i").attr("class", t.attr("data-class"))
 }

 function kswr_icon_search(t) {
     var a = jQuery(t).val();
     "" != jQuery.trim(a) ? (jQuery(".kswr-icon-set").children(".kswr-the-icon").hide(), jQuery(".kswr-icon-set .kswr-the-icon[data-name*=" + a.toLowerCase() + "]").show()) : jQuery(".kswr-icon-set").children(".kswr-the-icon").show()
 }

 function kaswaraRequiredManagment(t) {
     var a = (t = jQuery(t)).attr("data-required"),
         e = 0;
     if (void 0 === a || !1 === a) return !1;
     a = JSON.parse(a);
     for (var r = 0; r < a.length; r++) {
         var n = a[r].value.split(",");
         if (n.length > 1) {
             var s = 0;
             n.forEach(function (t, e) {
                 jQuery("#" + a[r].id).val() == jQuery.trim(t) && (s = 1)
             }), 1 == s && (e += 1), 0 == s && (e -= 1)
         } else jQuery("#" + a[r].id).val() != a[r].value && (e -= 1), jQuery("#" + a[r].id).val() == a[r].value && (e += 1)
     }
     e < a.length && t.hide(), e >= a.length && t.show()
 }

 function kswr_show_form_section(t) {
     var a = (t = jQuery(t)).parent(".kswr-shortcode-styling-tabs").parent(".kswr-shortcode-styling-bottom");
     t.parent(".kswr-shortcode-styling-tabs").children(".kswr-shortcode-styling-tab").attr("data-situation", "noactive"), a.children(".kswr-shortcode-styling-form").attr("data-situation", "noactive"), a.parent(".kswr-shortcode-styling-section").find('.kswr-shortcode-styling-form[data-tabid="' + t.attr("data-tabid") + '"]').attr("data-situation", "active"), t.attr("data-situation", "active")
 }

 function kswr_switchSySwitcher(t) {
     var a = (t = jQuery(t)).attr("data-value"),
         e = t.attr("data-on"),
         r = t.attr("data-off");
     a == e && (t.removeClass("sy-sw-controler_on").addClass("sy-sw-controler_off").attr({
         "data-value": r
     }), t.children("input").val(r).change()), a == r && (t.removeClass("sy-sw-controler_off").addClass("sy-sw-controler_on").attr({
         "data-value": e
     }), t.children("input").val(e).change()), jQuery(".kmb-elem-attr").each(function (t, a) {
         kaswaraRequiredManagment(a)
     })
 }

 function kswr_save_shortcode_styling(t) {
     var a = (t = jQuery(t)).attr("data-elements"),
         e = t.attr("data-id"),
         r = {};
     a.split(",").forEach(function (t, a) {
         r[t] = jQuery("#" + t).val()
     }), jQuery(".kswr-dash-loading").fadeIn(100), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             elementData: JSON.stringify(r),
             shortcodeID: e,
             action: "kaswaraSaveShortcodeStyle"
         },
         success: function (t) {
             jQuery(".kswr-dash-loading").fadeOut(100), kaswara_action_success()
         }
     })
 }

 function kswr_multiple_select_change(t) {
     var a = (t = jQuery(t)).val();
     "" != jQuery.trim(a) && t.parent(".sy-sitem-select-multiple").children(".kswr-multiple-select-val").val(a.toString())
 }

 function kswr_item_composer_search(t, a) {
     var e = jQuery(t),
         r = e.parent(".sy-sitem-search").children(".sy-sitem-result");
     "" != jQuery.trim(e.val()) && jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             title: e.val(),
             type: a,
             action: "kaswaraPostShorcodesSearch"
         },
         success: function (t) {
             if (r.html(""), "" != jQuery.trim(t)) {
                 var a = JSON.parse(t);
                 r.fadeIn(300), a.forEach(function (t) {
                     r.append('<div class="sy-sitem-single" data-title="' + t.title + '"  data-item="' + t.id + "/" + t.title + '"  onclick="kswr_item_chooser(this);">' + t.title + "</div>")
                 })
             } else r.fadeOut(300)
         }
     })
 }

 function kswr_item_chooser(t) {
     var a = (t = jQuery(t)).parent(".sy-sitem-result").parent(".sy-sitem-search");
     a.children(".sy-sitem-sid").val(t.attr("data-item")), a.children(".sy-sitem-sinput").val(t.attr("data-title")), a.children(".sy-sitem-result").fadeOut(300).html("")
 }

 function kswr_change_br(t) {
     var a = (t = jQuery(t)).parents(".vc-kswr-border-maker"),
         e = a.find(".kswr-bmaker-value"),
         r = t.attr("data-name"),
         n = "";
     (n = "" != jQuery.trim(e.val()) ? JSON.parse(e.val()) : JSON.parse('{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}'))[r] = t.val();
     var s = "block";
     "none" == n.bordergradientdirection && (s = "none"), a.find(".borderthecolor2").css({
         display: s
     }), e.val(JSON.stringify(n))
 }

 function kswr_change_gradient(t) {
     var a = (t = jQuery(t)).attr("data-name"),
         e = t.parents(".kswr-gradient-chooser").find(".kswr-ch-gradient-value"),
         r = "";
     (r = "" != jQuery.trim(e.val()) ? JSON.parse(e.val()) : JSON.parse('{"type":"color", "color1":"", color2:"", "direction":"to left"}'))[a] = t.val();
     var n = "block";
     "color" == r.type && (n = "none"), t.parents(".kswr-gradient-chooser").find(".kswr-ch-gradient-right").css({
         display: n
     }), e.val(JSON.stringify(r))
 }

 function kswr_change_background(t) {
     var a = (t = jQuery(t)).attr("data-name"),
         e = t.parents(".vc-kswr-background-maker").find(".kswr-backmaker-value"),
         r = "";
     (r = "" != jQuery.trim(e.val()) ? JSON.parse(e.val()) : JSON.parse('{"image":"", "repeat":"no-repeat", "position":"left top", "size":"cover", "overlay":"", "overlayopacity":"0"}'))[a] = t.val(), e.val(JSON.stringify(r))
 }

 function kswr_choose_hotspotimage(t) {
     var a = (t = jQuery(t)).parents(".syn-elem-parent"),
         e = wp.media({
             frame: "post",
             title: "Media Uploader",
             button: {
                 text: "Choose Image"
             },
             library: {
                 type: "image"
             },
             multiple: !1
         }).on("close", function () {
             var t = e.state().get("selection"),
                 r = "";
             if (0 != t.length) {
                 attachment = t.first().toJSON();
                 var n = a.find(".syn-fake-input");
                 a.find(".kswr-hotspotparam-smallpreview").html('<img src="' + attachment.url + '"/>'), a.find(".syn-hotspot-imgwrapper").show().html('<img src="' + attachment.url + '"/>'), (r = "" != jQuery.trim(n.val()) ? JSON.parse(n.val()) : JSON.parse('{"imageid":"", "data":""}')).imageid = attachment.id, n.val(JSON.stringify(r))
             }
         }).open()
 }

 function kswr_background_media_uploader(t) {
     var a = "",
         e = (t = jQuery(t)).parents(".vc-kswr-background-maker").find(".kswr-backmaker-image"),
         r = "",
         n = t.attr("data-name"),
         s = t.parents(".vc-kswr-background-maker").find(".kswr-backmaker-value"),
         o = wp.media({
             frame: "post",
             title: "Media Uploader",
             button: {
                 text: "Choose file"
             },
             library: {
                 type: "image"
             },
             multiple: !1
         }).on("close", function () {
             var t = o.state().get("selection");
             0 != t.length && (a = t.first().toJSON(), e.val(a.url), (r = "" != jQuery.trim(s.val()) ? JSON.parse(s.val()) : JSON.parse('{"image":"", "repeat":"no-repeat", "position":"left top", "size":"cover", "overlay":"", "overlayopacity":"0"}'))[n] = a.url, s.val(JSON.stringify(r)))
         }).open()
 }

 function kswr_show_shortcode_styling(t) {
     var a = (t = jQuery(t)).attr("data-id");
     jQuery(".kswr-shortcode-styling-section").attr({
         "data-situation": "hidden"
     }), jQuery(".kswr-shortcode-styling-chooser").css({
         "margin-top": "750px"
     }), setTimeout(function () {
         jQuery('.kswr-shortcode-styling-section[data-id="' + a + '"], .kswr-shortcode-styling-closer').attr({
             "data-situation": "shown"
         })
     }, 500)
 }

 function kswr_hide_shortcode_styling() {
     jQuery(".kswr-shortcode-styling-section, .kswr-shortcode-styling-closer").attr({
         "data-situation": "hidden"
     }), setTimeout(function () {
         jQuery(".kswr-shortcode-styling-chooser").css({
             "margin-top": "0px"
         })
     }, 500)
 }

 function kswr_search_shortcode_name(t) {
     var a = (t = jQuery(t)).val();
     "" != jQuery.trim(a) ? (jQuery(".kswr-customset-item").hide(), jQuery('.kswr-customset-item[data-name*="' + a.toLowerCase() + '"]').show()) : jQuery(".kswr-customset-item").show()
 }

 function kswr_setting_chooser(t) {
     t = jQuery(t);
     var a = "",
         e = jQuery("#active_shortcodes"),
         r = t.attr("data-id"),
         n = t.attr("data-situation"),
         s = e.val().split(",");
     "on" == n && s.indexOf(r) > -1 && s.splice(s.indexOf(r), 1), "off" == n && -1 === s.indexOf(r) && s.push(r), s.forEach(function (t, e) {
         "" != jQuery.trim(t) && (a += t + ",")
     }), "on" == n && (t.removeClass("sy-sw-controler_on").addClass("sy-sw-controler_off"), t.attr("data-situation", "off")), "off" == n && (t.removeClass("sy-sw-controler_off").addClass("sy-sw-controler_on"), t.attr("data-situation", "on")), e.val(a)
 }

 function kswr_save_shortcodes() {
     var t = jQuery("#active_shortcodes").val();
     jQuery(".kswr-dash-loading").fadeIn(100), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             shortcodelist: t,
             action: "kaswaraShortCodeListSave"
         },
         success: function (t) {
             jQuery(".kswr-dash-loading").fadeOut(100), kaswara_action_success()
         }
     })
 }

 function kswr_enable_disable_shortcodes(t) {
     var a = jQuery(".sy-sw-controler");
     "enable" == jQuery.trim(t) && (a.removeClass("sy-sw-controler_off").addClass("sy-sw-controler_on"), a.attr("data-situation", "on"), jQuery("#active_shortcodes").val("skillbar,radialprogress,socialshare,findus,videomodal,modalwindow,button,alertbox,bfimage,teammate,lineseparator,iconseparator,iconboxaction,interactiveiconbox,postgrid,hoverimage,sidebyside,filterimages,twopichover,dropcaps,heading,singleicon,iconbundle,iconboxinfo,infolist,counter,pricingplan,cardflip,3dcardflip,verticalskillbar,modernflipbox,imagebanner,hoverinfobox,spacer,fancytext,testimonial,animationblock,modalanything,cardslider,pricebox,carousel,countdown,cf7,replicasection,kswr_rows_columns,pilingsection,googlemaps,layeredimages,animatedheading,modernimage,pricelisting,customgallery,hotspot")), "disable" == jQuery.trim(t) && (a.removeClass("sy-sw-controler_on").addClass("sy-sw-controler_off"), a.attr("data-situation", "off"), jQuery("#active_shortcodes").val(","))
 }

 function kaswara_demo_importer(t) {
     var a = jQuery(t).parent(".kswr-demo-item-actions").parent(".kswr-demo-item").attr("data-contenturl");
     jQuery(".kswr-admin-container-features").attr({
         "data-situation": "loading"
     }), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             contentUrl: a,
             action: "kaswaraImportDemo"
         },
         success: function (t) {
             jQuery(".kswr-admin-container-features").attr({
                 "data-situation": "done"
             }), kaswara_action_success()
         }
     })
 }

 function kaswara_demo_downloadxml(t) {
     var a = jQuery(t).parent(".kswr-demo-item-actions").parent(".kswr-demo-item"),
         e = a.attr("data-contenturl"),
         r = a.attr("data-demoname");
     jQuery.ajax({
         type: "GET",
         url: e,
         success: function (t) {
             var a = new File([t], r + ".xml", {
                 type: "text/plain;charset=utf-8"
             });
             saveAs(a)
         }
     })
 }

 function kswr_show_menu_popup(t) {
     if (!jQuery(t).hasClass("notClickable")) {
         var a = jQuery(".kswr-dash-top");
         "hidden" == a.attr("data-menu") ? a.attr({
             "data-menu": "shown"
         }) : "shown" == a.attr("data-menu") && a.attr({
             "data-menu": "hidden"
         })
     }
 }

 function kswr_close_menu_popup() {
     jQuery(".kswr-dash-top").attr({
         "data-menu": "hidden"
     })
 }

 function kswr_close_back_popup() {
     jQuery(".kswr-back-popup").attr({
         "data-situation": "hidden"
     })
 }

 function kswr_shortcode_style_action(t) {
     "export" == t && (kswr_back_shownhidden(".kswr-dash-loading-small", "shown"), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             action: "exportShortcodeData"
         },
         success: function (a) {
             jQuery("#kswr-impexp-container").attr({
                 "data-element": t,
                 "data-situation": "shown"
             }), kswr_sccess_small(), jQuery("#kswr-sc-export-area").val(a)
         }
     })), "import" == t && jQuery("#kswr-impexp-container").attr({
         "data-element": t,
         "data-situation": "shown"
     })
 }

 function kswr_shortcode_import_styling() {
     var t = jQuery("#kswr-sc-import-area");
     "" != jQuery.trim(t) && (kswr_back_shownhidden(".kswr-dash-loading-small", "shown"), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             shortcodeStylingJSON: t.val(),
             action: "importShortcodeData"
         },
         success: function (a) {
             kswr_sccess_small(), t.val(""), setTimeout(function () {
                 location.reload()
             }, 500)
         }
     }))
 }

 function kswr_sccess_small() {
     kswr_back_shownhidden(".kswr-dash-loading-small", "hidden"), kswr_back_shownhidden(".kswr-dash-success", "shown"), setTimeout(function () {
         kswr_back_shownhidden(".kswr-dash-success", "hidden")
     }, 5e3)
 }

 function kswr_back_shownhidden(t, a) {
     jQuery(t).attr({
         "data-situation": a
     })
 }

 function kswr_cf7_exportstyle(t) {
     var a = (t = jQuery(t)).find("option:selected").val();
     "" != jQuery.trim(a) && (kswr_back_shownhidden(".kswr-dash-loading-small", "shown"), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             formStyleID: a,
             action: "exportCf7Styles"
         },
         success: function (t) {
             kswr_sccess_small(), jQuery("#kswr-cf7-export-area").val(t)
         }
     }))
 }

 function kswr_cf7_import_styling() {
     var t = jQuery("#kswr-cf7-import-area").val();
     "" != jQuery.trim(t) && (kswr_back_shownhidden(".kswr-dash-loading-small", "shown"), jQuery.ajax({
         type: "POST",
         url: plugindir.ajax_handler,
         data: {
             formStylesJson: t,
             action: "importCf7Styles"
         },
         success: function (t) {
             kswr_sccess_small(), setTimeout(function () {
                 location.reload()
             }, 500)
         }
     }))
 }

 function kswr_cf7_impexp_style_action(t) {
     jQuery("#kswr-cf7-impexp-container").attr({
         "data-element": t,
         "data-situation": "shown"
     })
 }

 function kswr_close_dash_notification() {
     jQuery("#kswr-back-notif").attr({
         "data-situation": "hidden"
     })
 }

 function kaswara_dialog(t, a, e, r) {
     var n = jQuery("#kswr-back-notif");
     jQuery("#kswr-back-ntf-title").html(t), jQuery("#kswr-back-ntf-info").html(a), n.attr({
         "data-situation": "shown"
     }), jQuery("#kswr-notif-yes").click(function () {
         n.attr({
             "data-situation": "hidden"
         }), e()
     }), jQuery("#kswr-notif-no").click(function () {
         n.attr({
             "data-situation": "hidden"
         }), r()
     })
 }
 jQuery(function (t) {
     "use strict";
     jQuery(document).ready(function () {
         kmfc7_svg_adder_plugin();
         t(".kswr-dash-popupmenu").draggable({
             drag: function (a, e) {
                 t(this).offset({
                     top: 0 + e.offset.top,
                     left: 0 + e.offset.left
                 })
             }
         }), t(".kswr-flow-menuicon").draggable({
             drag: function (a, e) {
                 t(this).addClass("notClickable"), t(this).offset({
                     top: 0 + e.offset.top,
                     left: 0 + e.offset.left
                 })
             },
             stop: function (a, e) {
                 setTimeout(function () {
                     t(".kswr-flow-menuicon").removeClass("notClickable")
                 }, 100)
             }
         })
     }), jQuery(".kmb-elem-attr").each(function (t, a) {
         kaswaraRequiredManagment(a)
     }), jQuery("body").find(".color-picker").minicolors({
         animationSpeed: 50,
         animationEasing: "swing",
         change: null,
         changeDelay: 0,
         control: "hue",
         dataUris: !0,
         defaultValue: "",
         format: "rgb",
         hide: null,
         hideSpeed: 100,
         inline: !1,
         keywords: "",
         letterCase: "lowercase",
         opacity: !0,
         position: "bottom right",
         show: null,
         showSpeed: 100,
         theme: "default",
         swatches: [],
         change: function (t, a) {
             var e = jQuery(this),
                 r = e.attr("data-type");
             if ("border" == jQuery.trim(r)) {
                 e.parent(".vc-kswr-border-maker");
                 var n = e.parents(".minicolors").parents(".vc-kswr-border-maker").find(".kswr-bmaker-value"),
                     s = e.attr("data-name"),
                     o = "";
                 (o = "" != jQuery.trim(n.val()) ? JSON.parse(n.val()) : JSON.parse('{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}'))[s] = e.val(), n.val(JSON.stringify(o))
             }
             if ("gradient" == jQuery.trim(r)) {
                 var s = e.attr("data-name"),
                     n = e.parent(".minicolors").parents(".kswr-gradient-chooser").find(".kswr-ch-gradient-value"),
                     o = "";
                 e.attr("value", t), (o = "" != jQuery.trim(n.val()) ? JSON.parse(n.val()) : JSON.parse('{type:"color", color1:"", color2:"", direction:"to left"}'))[s] = e.val(), n.val(JSON.stringify(o))
             }
             if ("overlay" == jQuery.trim(r)) {
                 var s = e.attr("data-name"),
                     n = e.parent(".minicolors").parents(".vc-kswr-background-maker").find(".kswr-backmaker-value"),
                     o = "";
                 e.attr("value", t), (o = "" != jQuery.trim(n.val()) ? JSON.parse(n.val()) : JSON.parse('{"image":"", "repeat":"no-repeat", "position":"left top", "size":"cover", "overlay":"", "overlayopacity":"0"}'))[s] = e.val(), n.val(JSON.stringify(o))
             }
         }
     })
 });

 /*! @source http://purl.eligrey.com/github/FileSaver.js/blob/master/FileSaver.js */
 var saveAs = saveAs || function (e) {
     "use strict";
     if (typeof e === "undefined" || typeof navigator !== "undefined" && /MSIE [1-9]\./.test(navigator.userAgent)) {
         return
     }
     var t = e.document,
         n = function () {
             return e.URL || e.webkitURL || e
         },
         r = t.createElementNS("http://www.w3.org/1999/xhtml", "a"),
         o = "download" in r,
         a = function (e) {
             var t = new MouseEvent("click");
             e.dispatchEvent(t)
         },
         i = /constructor/i.test(e.HTMLElement) || e.safari,
         f = /CriOS\/[\d]+/.test(navigator.userAgent),
         u = function (t) {
             (e.setImmediate || e.setTimeout)(function () {
                 throw t
             }, 0)
         },
         s = "application/octet-stream",
         d = 1e3 * 40,
         c = function (e) {
             var t = function () {
                 if (typeof e === "string") {
                     n().revokeObjectURL(e)
                 } else {
                     e.remove()
                 }
             };
             setTimeout(t, d)
         },
         l = function (e, t, n) {
             t = [].concat(t);
             var r = t.length;
             while (r--) {
                 var o = e["on" + t[r]];
                 if (typeof o === "function") {
                     try {
                         o.call(e, n || e)
                     } catch (a) {
                         u(a)
                     }
                 }
             }
         },
         p = function (e) {
             if (/^\s*(?:text\/\S*|application\/xml|\S*\/\S*\+xml)\s*;.*charset\s*=\s*utf-8/i.test(e.type)) {
                 return new Blob([String.fromCharCode(65279), e], {
                     type: e.type
                 })
             }
             return e
         },
         v = function (t, u, d) {
             if (!d) {
                 t = p(t)
             }
             var v = this,
                 w = t.type,
                 m = w === s,
                 y, h = function () {
                     l(v, "writestart progress write writeend".split(" "))
                 },
                 S = function () {
                     if ((f || m && i) && e.FileReader) {
                         var r = new FileReader;
                         r.onloadend = function () {
                             var t = f ? r.result : r.result.replace(/^data:[^;]*;/, "data:attachment/file;");
                             var n = e.open(t, "_blank");
                             if (!n) e.location.href = t;
                             t = undefined;
                             v.readyState = v.DONE;
                             h()
                         };
                         r.readAsDataURL(t);
                         v.readyState = v.INIT;
                         return
                     }
                     if (!y) {
                         y = n().createObjectURL(t)
                     }
                     if (m) {
                         e.location.href = y
                     } else {
                         var o = e.open(y, "_blank");
                         if (!o) {
                             e.location.href = y
                         }
                     }
                     v.readyState = v.DONE;
                     h();
                     c(y)
                 };
             v.readyState = v.INIT;
             if (o) {
                 y = n().createObjectURL(t);
                 setTimeout(function () {
                     r.href = y;
                     r.download = u;
                     a(r);
                     h();
                     c(y);
                     v.readyState = v.DONE
                 });
                 return
             }
             S()
         },
         w = v.prototype,
         m = function (e, t, n) {
             return new v(e, t || e.name || "download", n)
         };
     if (typeof navigator !== "undefined" && navigator.msSaveOrOpenBlob) {
         return function (e, t, n) {
             t = t || e.name || "download";
             if (!n) {
                 e = p(e)
             }
             return navigator.msSaveOrOpenBlob(e, t)
         }
     }
     w.abort = function () {};
     w.readyState = w.INIT = 0;
     w.WRITING = 1;
     w.DONE = 2;
     w.error = w.onwritestart = w.onprogress = w.onwrite = w.onabort = w.onerror = w.onwriteend = null;
     return m
 }(typeof self !== "undefined" && self || typeof window !== "undefined" && window || this.content);
 if (typeof module !== "undefined" && module.exports) {
     module.exports.saveAs = saveAs
 } else if (typeof define !== "undefined" && define !== null && define.amd !== null) {
     define("FileSaver.js", function () {
         return saveAs
     })
 }

 //Color Picker
 ! function (i) {
     "function" == typeof define && define.amd ? define(["jquery"], i) : "object" == typeof exports ? module.exports = i(require("jquery")) : i(jQuery)
 }(function ($) {
     "use strict";

     function i(i, t) {
         var o = $('<div class="minicolors" />'),
             a = $.minicolors.defaults,
             s = i.attr("data-opacity"),
             n;
         i.data("minicolors-initialized") || (t = $.extend(!0, {}, a, t), o.addClass("minicolors-theme-" + t.theme).toggleClass("minicolors-with-opacity", t.opacity).toggleClass("minicolors-no-data-uris", t.dataUris !== !0), void 0 !== t.position && $.each(t.position.split(" "), function () {
             o.addClass("minicolors-position-" + this)
         }), n = "rgb" === t.format ? t.opacity ? "25" : "20" : t.keywords ? "11" : "7", i.addClass("minicolors-input").data("minicolors-initialized", !1).data("minicolors-settings", t).prop("size", n).wrap(o).after('<div class="minicolors-panel minicolors-slider-' + t.control + '"><div class="minicolors-slider minicolors-sprite"><div class="minicolors-picker"></div></div><div class="minicolors-opacity-slider minicolors-sprite"><div class="minicolors-picker"></div></div><div class="minicolors-grid minicolors-sprite"><div class="minicolors-grid-inner"></div><div class="minicolors-picker"><div></div></div></div></div>'), t.inline || (i.after('<span class="minicolors-swatch minicolors-sprite"><span class="minicolors-swatch-color"></span></span>'), i.next(".minicolors-swatch").on("click", function (t) {
             t.preventDefault(), i.focus()
         })), i.parent().find(".minicolors-panel").on("selectstart", function () {
             return !1
         }).end(), t.inline && i.parent().addClass("minicolors-inline"), r(i, !1), i.data("minicolors-initialized", !0))
     }

     function t(i) {
         var t = i.parent();
         i.removeData("minicolors-initialized").removeData("minicolors-settings").removeProp("size").removeClass("minicolors-input"), t.before(i).remove()
     }

     function o(i) {
         var t = i.parent(),
             o = t.find(".minicolors-panel"),
             s = i.data("minicolors-settings");
         !i.data("minicolors-initialized") || i.prop("disabled") || t.hasClass("minicolors-inline") || t.hasClass("minicolors-focus") || (a(), t.addClass("minicolors-focus"), o.stop(!0, !0).fadeIn(s.showSpeed, function () {
             s.show && s.show.call(i.get(0))
         }))
     }

     function a() {
         $(".minicolors-focus").each(function () {
             var i = $(this),
                 t = i.find(".minicolors-input"),
                 o = i.find(".minicolors-panel"),
                 a = t.data("minicolors-settings");
             o.fadeOut(a.hideSpeed, function () {
                 a.hide && a.hide.call(t.get(0)), i.removeClass("minicolors-focus")
             })
         })
     }

     function s(i, t, o) {
         var a = i.parents(".minicolors").find(".minicolors-input"),
             s = a.data("minicolors-settings"),
             r = i.find("[class$=-picker]"),
             e = i.offset().left,
             c = i.offset().top,
             l = Math.round(t.pageX - e),
             h = Math.round(t.pageY - c),
             d = o ? s.animationSpeed : 0,
             u, p, g, m;
         t.originalEvent.changedTouches && (l = t.originalEvent.changedTouches[0].pageX - e, h = t.originalEvent.changedTouches[0].pageY - c), 0 > l && (l = 0), 0 > h && (h = 0), l > i.width() && (l = i.width()), h > i.height() && (h = i.height()), i.parent().is(".minicolors-slider-wheel") && r.parent().is(".minicolors-grid") && (u = 75 - l, p = 75 - h, g = Math.sqrt(u * u + p * p), m = Math.atan2(p, u), 0 > m && (m += 2 * Math.PI), g > 75 && (g = 75, l = 75 - 75 * Math.cos(m), h = 75 - 75 * Math.sin(m)), l = Math.round(l), h = Math.round(h)), i.is(".minicolors-grid") ? r.stop(!0).animate({
             top: h + "px",
             left: l + "px"
         }, d, s.animationEasing, function () {
             n(a, i)
         }) : r.stop(!0).animate({
             top: h + "px"
         }, d, s.animationEasing, function () {
             n(a, i)
         })
     }

     function n(i, t) {
         function o(i, t) {
             var o, a;
             return i.length && t ? (o = i.offset().left, a = i.offset().top, {
                 x: o - t.offset().left + i.outerWidth() / 2,
                 y: a - t.offset().top + i.outerHeight() / 2
             }) : null
         }
         var a, s, n, r, c, l, d, u = i.val(),
             p = i.attr("data-opacity"),
             m, f = i.parent(),
             v = i.data("minicolors-settings"),
             b = f.find(".minicolors-swatch"),
             y = f.find(".minicolors-grid"),
             C = f.find(".minicolors-slider"),
             M = f.find(".minicolors-opacity-slider"),
             x = y.find("[class$=-picker]"),
             I = C.find("[class$=-picker]"),
             S = M.find("[class$=-picker]"),
             z = o(x, y),
             F = o(I, C),
             j = o(S, M);
         if (t.is(".minicolors-grid, .minicolors-slider, .minicolors-opacity-slider")) {
             switch (v.control) {
                 case "wheel":
                     r = y.width() / 2 - z.x, c = y.height() / 2 - z.y, l = Math.sqrt(r * r + c * c), d = Math.atan2(c, r), 0 > d && (d += 2 * Math.PI), l > 75 && (l = 75, z.x = 69 - 75 * Math.cos(d), z.y = 69 - 75 * Math.sin(d)), s = g(l / .75, 0, 100), a = g(180 * d / Math.PI, 0, 360), n = g(100 - Math.floor(F.y * (100 / C.height())), 0, 100), u = w({
                         h: a,
                         s: s,
                         b: n
                     }), C.css("backgroundColor", w({
                         h: a,
                         s: s,
                         b: 100
                     }));
                     break;
                 case "saturation":
                     a = g(parseInt(z.x * (360 / y.width()), 10), 0, 360), s = g(100 - Math.floor(F.y * (100 / C.height())), 0, 100), n = g(100 - Math.floor(z.y * (100 / y.height())), 0, 100), u = w({
                         h: a,
                         s: s,
                         b: n
                     }), C.css("backgroundColor", w({
                         h: a,
                         s: 100,
                         b: n
                     })), f.find(".minicolors-grid-inner").css("opacity", s / 100);
                     break;
                 case "brightness":
                     a = g(parseInt(z.x * (360 / y.width()), 10), 0, 360), s = g(100 - Math.floor(z.y * (100 / y.height())), 0, 100), n = g(100 - Math.floor(F.y * (100 / C.height())), 0, 100), u = w({
                         h: a,
                         s: s,
                         b: n
                     }), C.css("backgroundColor", w({
                         h: a,
                         s: s,
                         b: 100
                     })), f.find(".minicolors-grid-inner").css("opacity", 1 - n / 100);
                     break;
                 default:
                     a = g(360 - parseInt(F.y * (360 / C.height()), 10), 0, 360), s = g(Math.floor(z.x * (100 / y.width())), 0, 100), n = g(100 - Math.floor(z.y * (100 / y.height())), 0, 100), u = w({
                         h: a,
                         s: s,
                         b: n
                     }), y.css("backgroundColor", w({
                         h: a,
                         s: 100,
                         b: 100
                     }))
             }
             if (p = v.opacity ? parseFloat(1 - j.y / M.height()).toFixed(2) : 1, v.opacity && i.attr("data-opacity", p), "rgb" === v.format) {
                 var D = k(u),
                     p = "" === i.attr("data-opacity") ? 1 : g(parseFloat(i.attr("data-opacity")).toFixed(2), 0, 1);
                 (isNaN(p) || !v.opacity) && (p = 1), m = i.minicolors("rgbObject").a <= 1 && D && v.opacity ? "rgba(" + D.r + ", " + D.g + ", " + D.b + ", " + parseFloat(p) + ")" : "rgb(" + D.r + ", " + D.g + ", " + D.b + ")"
             } else m = h(u, v.letterCase);
             i.val(m)
         }
         b.find("span").css({
             backgroundColor: u,
             opacity: p
         }), e(i, m, p)
     }

     function r(i, t) {
         var o, a, s, n, r, c, l, v, y, M, k = i.parent(),
             x = i.data("minicolors-settings"),
             I = k.find(".minicolors-swatch"),
             S = k.find(".minicolors-grid"),
             z = k.find(".minicolors-slider"),
             F = k.find(".minicolors-opacity-slider"),
             j = S.find("[class$=-picker]"),
             D = z.find("[class$=-picker]"),
             T = F.find("[class$=-picker]");
         switch (m(i.val()) ? (o = b(i.val()), r = g(parseFloat(f(i.val())).toFixed(2), 0, 1), r && i.attr("data-opacity", r)) : o = h(d(i.val(), !0), x.letterCase), o || (o = h(p(x.defaultValue, !0), x.letterCase)), a = C(o), n = x.keywords ? $.map(x.keywords.split(","), function (i) {
             return $.trim(i.toLowerCase())
         }) : [], c = "" !== i.val() && $.inArray(i.val().toLowerCase(), n) > -1 ? h(i.val()) : m(i.val()) ? u(i.val()) : o, t || i.val(c), x.opacity && (s = "" === i.attr("data-opacity") ? 1 : g(parseFloat(i.attr("data-opacity")).toFixed(2), 0, 1), isNaN(s) && (s = 1), i.attr("data-opacity", s), I.find("span").css("opacity", s), v = g(F.height() - F.height() * s, 0, F.height()), T.css("top", v + "px")), "transparent" === i.val().toLowerCase() && I.find("span").css("opacity", 0), I.find("span").css("backgroundColor", o), x.control) {
             case "wheel":
                 y = g(Math.ceil(.75 * a.s), 0, S.height() / 2), M = a.h * Math.PI / 180, l = g(75 - Math.cos(M) * y, 0, S.width()), v = g(75 - Math.sin(M) * y, 0, S.height()), j.css({
                     top: v + "px",
                     left: l + "px"
                 }), v = 150 - a.b / (100 / S.height()), "" === o && (v = 0), D.css("top", v + "px"), z.css("backgroundColor", w({
                     h: a.h,
                     s: a.s,
                     b: 100
                 }));
                 break;
             case "saturation":
                 l = g(5 * a.h / 12, 0, 150), v = g(S.height() - Math.ceil(a.b / (100 / S.height())), 0, S.height()), j.css({
                     top: v + "px",
                     left: l + "px"
                 }), v = g(z.height() - a.s * (z.height() / 100), 0, z.height()), D.css("top", v + "px"), z.css("backgroundColor", w({
                     h: a.h,
                     s: 100,
                     b: a.b
                 })), k.find(".minicolors-grid-inner").css("opacity", a.s / 100);
                 break;
             case "brightness":
                 l = g(5 * a.h / 12, 0, 150), v = g(S.height() - Math.ceil(a.s / (100 / S.height())), 0, S.height()), j.css({
                     top: v + "px",
                     left: l + "px"
                 }), v = g(z.height() - a.b * (z.height() / 100), 0, z.height()), D.css("top", v + "px"), z.css("backgroundColor", w({
                     h: a.h,
                     s: a.s,
                     b: 100
                 })), k.find(".minicolors-grid-inner").css("opacity", 1 - a.b / 100);
                 break;
             default:
                 l = g(Math.ceil(a.s / (100 / S.width())), 0, S.width()), v = g(S.height() - Math.ceil(a.b / (100 / S.height())), 0, S.height()), j.css({
                     top: v + "px",
                     left: l + "px"
                 }), v = g(z.height() - a.h / (360 / z.height()), 0, z.height()), D.css("top", v + "px"), S.css("backgroundColor", w({
                     h: a.h,
                     s: 100,
                     b: 100
                 }))
         }
         i.data("minicolors-initialized") && e(i, c, s)
     }

     function e(i, t, o) {
         var a = i.data("minicolors-settings"),
             s = i.data("minicolors-lastChange");
         s && s.value === t && s.opacity === o || (i.data("minicolors-lastChange", {
             value: t,
             opacity: o
         }), a.change && (a.changeDelay ? (clearTimeout(i.data("minicolors-changeTimeout")), i.data("minicolors-changeTimeout", setTimeout(function () {
             a.change.call(i.get(0), t, o)
         }, a.changeDelay))) : a.change.call(i.get(0), t, o)), i.trigger("change").trigger("input"))
     }

     function c(i) {
         var t = d($(i).val(), !0),
             o = k(t),
             a = $(i).attr("data-opacity");
         return o ? (void 0 !== a && $.extend(o, {
             a: parseFloat(a)
         }), o) : null
     }

     function l(i, t) {
         var o = d($(i).val(), !0),
             a = k(o),
             s = $(i).attr("data-opacity");
         return a ? (void 0 === s && (s = 1), t ? "rgba(" + a.r + ", " + a.g + ", " + a.b + ", " + parseFloat(s) + ")" : "rgb(" + a.r + ", " + a.g + ", " + a.b + ")") : null
     }

     function h(i, t) {
         return "uppercase" === t ? i.toUpperCase() : i.toLowerCase()
     }

     function d(i, t) {
         return i = i.replace(/^#/g, ""), i.match(/^[A-F0-9]{3,6}/gi) ? 3 !== i.length && 6 !== i.length ? "" : (3 === i.length && t && (i = i[0] + i[0] + i[1] + i[1] + i[2] + i[2]), "#" + i) : ""
     }

     function u(i, t) {
         var o = i.replace(/[^\d,.]/g, ""),
             a = o.split(","),
             s;
         return a[0] = g(parseInt(a[0], 10), 0, 255), a[1] = g(parseInt(a[1], 10), 0, 255), a[2] = g(parseInt(a[2], 10), 0, 255), a[3] && (a[3] = g(parseFloat(a[3], 10), 0, 1)), t ? {
             r: a[0],
             g: a[1],
             b: a[2],
             a: a[3] ? a[3] : null
         } : "undefined" != typeof a[3] && a[3] <= 1 ? "rgba(" + a[0] + ", " + a[1] + ", " + a[2] + ", " + a[3] + ")" : "rgb(" + a[0] + ", " + a[1] + ", " + a[2] + ")"
     }

     function p(i, t) {
         return m(i) ? u(i) : d(i, t)
     }

     function g(i, t, o) {
         return t > i && (i = t), i > o && (i = o), i
     }

     function m(i) {
         var t = i.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
         return t && 4 === t.length ? !0 : !1
     }

     function f(i) {
         var i = i.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+(\.\d{1,2})?|\.\d{1,2})[\s+]?/i);
         return i && 6 === i.length ? i[4] : "1"
     }

     function v(i) {
         var t = {},
             o = Math.round(i.h),
             a = Math.round(255 * i.s / 100),
             s = Math.round(255 * i.b / 100);
         if (0 === a) t.r = t.g = t.b = s;
         else {
             var n = s,
                 r = (255 - a) * s / 255,
                 e = (n - r) * (o % 60) / 60;
             360 === o && (o = 0), 60 > o ? (t.r = n, t.b = r, t.g = r + e) : 120 > o ? (t.g = n, t.b = r, t.r = n - e) : 180 > o ? (t.g = n, t.r = r, t.b = r + e) : 240 > o ? (t.b = n, t.r = r, t.g = n - e) : 300 > o ? (t.b = n, t.g = r, t.r = r + e) : 360 > o ? (t.r = n, t.g = r, t.b = n - e) : (t.r = 0, t.g = 0, t.b = 0)
         }
         return {
             r: Math.round(t.r),
             g: Math.round(t.g),
             b: Math.round(t.b)
         }
     }

     function b(i) {
         return i = i.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i), i && 4 === i.length ? "#" + ("0" + parseInt(i[1], 10).toString(16)).slice(-2) + ("0" + parseInt(i[2], 10).toString(16)).slice(-2) + ("0" + parseInt(i[3], 10).toString(16)).slice(-2) : ""
     }

     function y(i) {
         var t = [i.r.toString(16), i.g.toString(16), i.b.toString(16)];
         return $.each(t, function (i, o) {
             1 === o.length && (t[i] = "0" + o)
         }), "#" + t.join("")
     }

     function w(i) {
         return y(v(i))
     }

     function C(i) {
         var t = M(k(i));
         return 0 === t.s && (t.h = 360), t
     }

     function M(i) {
         var t = {
                 h: 0,
                 s: 0,
                 b: 0
             },
             o = Math.min(i.r, i.g, i.b),
             a = Math.max(i.r, i.g, i.b),
             s = a - o;
         return t.b = a, t.s = 0 !== a ? 255 * s / a : 0, 0 !== t.s ? i.r === a ? t.h = (i.g - i.b) / s : i.g === a ? t.h = 2 + (i.b - i.r) / s : t.h = 4 + (i.r - i.g) / s : t.h = -1, t.h *= 60, t.h < 0 && (t.h += 360), t.s *= 100 / 255, t.b *= 100 / 255, t
     }

     function k(i) {
         return i = parseInt(i.indexOf("#") > -1 ? i.substring(1) : i, 16), {
             r: i >> 16,
             g: (65280 & i) >> 8,
             b: 255 & i
         }
     }
     $.minicolors = {
         defaults: {
             animationSpeed: 50,
             animationEasing: "swing",
             change: null,
             changeDelay: 0,
             control: "hue",
             dataUris: !0,
             defaultValue: "",
             format: "hex",
             hide: null,
             hideSpeed: 100,
             inline: !1,
             keywords: "",
             letterCase: "lowercase",
             opacity: !1,
             position: "bottom left",
             show: null,
             showSpeed: 100,
             theme: "default"
         }
     }, $.extend($.fn, {
         minicolors: function (s, n) {
             switch (s) {
                 case "destroy":
                     return $(this).each(function () {
                         t($(this))
                     }), $(this);
                 case "hide":
                     return a(), $(this);
                 case "opacity":
                     return void 0 === n ? $(this).attr("data-opacity") : ($(this).each(function () {
                         r($(this).attr("data-opacity", n))
                     }), $(this));
                 case "rgbObject":
                     return c($(this), "rgbaObject" === s);
                 case "rgbString":
                 case "rgbaString":
                     return l($(this), "rgbaString" === s);
                 case "settings":
                     return void 0 === n ? $(this).data("minicolors-settings") : ($(this).each(function () {
                         var i = $(this).data("minicolors-settings") || {};
                         t($(this)), $(this).minicolors($.extend(!0, i, n))
                     }), $(this));
                 case "show":
                     return o($(this).eq(0)), $(this);
                 case "value":
                     return void 0 === n ? $(this).val() : ($(this).each(function () {
                         "object" == typeof n ? (n.opacity && $(this).attr("data-opacity", g(n.opacity, 0, 1)), n.color && $(this).val(n.color)) : $(this).val(n), r($(this))
                     }), $(this));
                 default:
                     return "create" !== s && (n = s), $(this).each(function () {
                         i($(this), n)
                     }), $(this)
             }
         }
     }), $(document).on("mousedown.minicolors touchstart.minicolors", function (i) {
         $(i.target).parents().add(i.target).hasClass("minicolors") || a()
     }).on("mousedown.minicolors touchstart.minicolors", ".minicolors-grid, .minicolors-slider, .minicolors-opacity-slider", function (i) {
         var t = $(this);
         i.preventDefault(), $(document).data("minicolors-target", t), s(t, i, !0)
     }).on("mousemove.minicolors touchmove.minicolors", function (i) {
         var t = $(document).data("minicolors-target");
         t && s(t, i)
     }).on("mouseup.minicolors touchend.minicolors", function () {
         $(this).removeData("minicolors-target")
     }).on("mousedown.minicolors touchstart.minicolors", ".minicolors-swatch", function (i) {
         var t = $(this).parent().find(".minicolors-input");
         i.preventDefault(), o(t)
     }).on("focus.minicolors", ".minicolors-input", function () {
         var i = $(this);
         i.data("minicolors-initialized") && o(i)
     }).on("blur.minicolors", ".minicolors-input", function () {
         var i = $(this),
             t = i.data("minicolors-settings"),
             o, a, s, n, r;
         i.data("minicolors-initialized") && (o = t.keywords ? $.map(t.keywords.split(","), function (i) {
             return $.trim(i.toLowerCase())
         }) : [], "" !== i.val() && $.inArray(i.val().toLowerCase(), o) > -1 ? r = i.val() : (m(i.val()) ? s = u(i.val(), !0) : (a = d(i.val(), !0), s = a ? k(a) : null), r = null === s ? t.defaultValue : "rgb" === t.format ? u(t.opacity ? "rgba(" + s.r + "," + s.g + "," + s.b + "," + i.attr("data-opacity") + ")" : "rgb(" + s.r + "," + s.g + "," + s.b + ")") : y(s)), n = t.opacity ? i.attr("data-opacity") : 1, "transparent" === r.toLowerCase() && (n = 0), i.closest(".minicolors").find(".minicolors-swatch > span").css("opacity", n), i.val(r), "" === i.val() && i.val(p(t.defaultValue, !0)), i.val(h(i.val(), t.letterCase)))
     }).on("keydown.minicolors", ".minicolors-input", function (i) {
         var t = $(this);
         if (t.data("minicolors-initialized")) switch (i.keyCode) {
             case 9:
                 a();
                 break;
             case 13:
             case 27:
                 a(), t.blur()
         }
     }).on("keyup.minicolors", ".minicolors-input", function () {
         var i = $(this);
         i.data("minicolors-initialized") && r(i, !0)
     }).on("paste.minicolors", ".minicolors-input", function () {
         var i = $(this);
         i.data("minicolors-initialized") && setTimeout(function () {
             r(i, !0)
         }, 1)
     })
 });
 //Date Picker
 /*! flatpickr v2.2.3, @license MIT */
 function Flatpickr(e, t) {
     function n() {
         e._flatpickr && M(e._flatpickr), e._flatpickr = ne, ne.element = e, ne.instanceConfig = t || {}, W(), F(), N(), U(), R(), j(), ne.isOpen = ne.config.inline, ne.changeMonth = D, ne.clear = b, ne.close = y, ne.destroy = M, ne.formatDate = k, ne.jumpToDate = c, ne.open = L, ne.parseDate = S, ne.redraw = _, ne.set = P, ne.setDate = A, ne.toggle = z, ne.isMobile = !ne.config.disableMobile && !ne.config.inline && "single" === ne.config.mode && !ne.config.disable.length && !ne.config.enable.length && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent), ne.isMobile || d(), l(), ne.minDateHasTime = ne.config.minDate && (ne.config.minDate.getHours() || ne.config.minDate.getMinutes() || ne.config.minDate.getSeconds()), ne.maxDateHasTime = ne.config.maxDate && (ne.config.maxDate.getHours() || ne.config.maxDate.getMinutes() || ne.config.maxDate.getSeconds()), ne.isMobile || Object.defineProperty(ne, "dateIsPicked", {
             set: function (e) {
                 return e ? ne.calendarContainer.classList.add("dateIsPicked") : void ne.calendarContainer.classList.remove("dateIsPicked")
             }
         }), ne.dateIsPicked = ne.selectedDates.length > 0 || ne.config.noCalendar, ne.selectedDates.length && (ne.config.enableTime && r(), $()), ne.config.weekNumbers && (ne.calendarContainer.style.width = ne.days.offsetWidth + ne.weekWrapper.offsetWidth + 2 + "px"), J("Ready")
     }

     function a(e) {
         ne.config.noCalendar && !ne.selectedDates.length && (ne.selectedDates = [ne.now]), te(e), ne.selectedDates.length && (i(), $())
     }

     function i() {
         if (ne.config.enableTime) {
             var e = parseInt(ne.hourElement.value, 10) || 0,
                 t = parseInt(ne.minuteElement.value, 10) || 0,
                 n = ne.config.enableSeconds ? parseInt(ne.secondElement.value, 10) || 0 : 0;
             ne.amPM && (e = e % 12 + 12 * ("PM" === ne.amPM.innerHTML)), ne.minDateHasTime && 0 === ee(K(), ne.config.minDate) ? (e = Math.max(e, ne.config.minDate.getHours()), e === ne.config.minDate.getHours() && (t = Math.max(t, ne.config.minDate.getMinutes()))) : ne.maxDateHasTime && 0 === ee(K(), ne.config.maxDate) && (e = Math.min(e, ne.config.maxDate.getHours()), e === ne.config.maxDate.getHours() && (t = Math.min(t, ne.config.maxDate.getMinutes()))), o(e, t, n)
         }
     }

     function r(e) {
         var t = e || K();
         t && o(t.getHours(), t.getMinutes(), t.getSeconds())
     }

     function o(e, t, n) {
         ne.selectedDates.length && ne.selectedDates[ne.selectedDates.length - 1].setHours(e % 24, t, n || 0, 0), ne.config.enableTime && !ne.isMobile && (ne.hourElement.value = ne.pad(ne.config.time_24hr ? e : (12 + e) % 12 + 12 * (e % 12 === 0)), ne.minuteElement.value = ne.pad(t), !ne.config.time_24hr && ne.selectedDates.length && (ne.amPM.textContent = K().getHours() >= 12 ? "PM" : "AM"), ne.config.enableSeconds && (ne.secondElement.value = ne.pad(n)))
     }

     function l() {
         return ne.config.wrap && ["open", "close", "toggle", "clear"].forEach(function (e) {
             try {
                 ne.element.querySelector("[data-" + e + "]").addEventListener("click", ne[e])
             } catch (e) {}
         }), "createEvent" in document && (ne.changeEvent = document.createEvent("HTMLEvents"), ne.changeEvent.initEvent("change", !1, !0)), ne.isMobile ? B() : (ne.debouncedResize = Z(Y, 50), ne.triggerChange = function () {
             return J("Change")
         }, ne.debouncedChange = Z(ne.triggerChange, 1e3), "range" === ne.config.mode && ne.days.addEventListener("mouseover", I), document.addEventListener("keydown", T), window.addEventListener("resize", ne.debouncedResize), document.addEventListener("click", w), document.addEventListener("blur", w), ne.config.clickOpens && (ne.altInput || ne.input).addEventListener("focus", L), ne.config.noCalendar || (ne.prevMonthNav.addEventListener("click", function () {
             return D(-1)
         }), ne.nextMonthNav.addEventListener("click", function () {
             return D(1)
         }), ne.currentYearElement.addEventListener("wheel", function (e) {
             return Z(G(e), 50)
         }), ne.currentYearElement.addEventListener("focus", function () {
             ne.currentYearElement.select()
         }), ne.currentYearElement.addEventListener("input", function (e) {
             4 === e.target.value.length && (ne.currentYearElement.blur(), E(e.target.value), e.target.value = ne.currentYear)
         }), ne.days.addEventListener("click", O)), void(ne.config.enableTime && (ne.timeContainer.addEventListener("wheel", function (e) {
             return Z(a(e), 5)
         }), ne.timeContainer.addEventListener("input", a), ne.timeContainer.addEventListener("wheel", ne.debouncedChange), ne.timeContainer.addEventListener("input", ne.triggerChange), ne.hourElement.addEventListener("focus", function () {
             ne.hourElement.select()
         }), ne.minuteElement.addEventListener("focus", function () {
             ne.minuteElement.select()
         }), ne.secondElement && ne.secondElement.addEventListener("focus", function () {
             ne.secondElement.select()
         }), ne.amPM && ne.amPM.addEventListener("click", function (e) {
             a(e), ne.triggerChange(e)
         }))))
     }

     function c(e) {
         e = e ? S(e) : K() || (ne.config.minDate > ne.now ? ne.config.minDate : ne.now);
         try {
             ne.currentYear = e.getFullYear(), ne.currentMonth = e.getMonth()
         } catch (t) {
             console.error(t.stack), console.warn("Invalid date supplied: " + e)
         }
         ne.redraw()
     }

     function s(e, t) {
         var n = e.target.parentNode.childNodes[0];
         n.value = parseInt(n.value, 10) + t * (n.step || 1);
         try {
             n.dispatchEvent(new Event("input", {
                 bubbles: !0
             }))
         } catch (e) {
             var a = document.createEvent("CustomEvent");
             a.initCustomEvent("input", !0, !0, {}), n.dispatchEvent(a)
         }
     }

     function u(e) {
         var t = X("div", "numInputWrapper"),
             n = X("input", "numInput " + e),
             a = X("span", "arrowUp"),
             i = X("span", "arrowDown");
         return n.type = "text", t.appendChild(n), t.appendChild(a), t.appendChild(i), a.addEventListener("click", function (e) {
             return s(e, 1)
         }), i.addEventListener("click", function (e) {
             return s(e, -1)
         }), t
     }

     function d() {
         var e = document.createDocumentFragment();
         ne.calendarContainer = X("div", "flatpickr-calendar"), ne.numInputType = navigator.userAgent.indexOf("MSIE 9.0") > 0 ? "text" : "number", ne.config.noCalendar || (e.appendChild(p()), ne.innerContainer = X("div", "flatpickr-innerContainer"), ne.config.weekNumbers && ne.innerContainer.appendChild(v()), ne.rContainer = X("div", "flatpickr-rContainer"), ne.rContainer.appendChild(h()), ne.rContainer.appendChild(m()), ne.innerContainer.appendChild(ne.rContainer), e.appendChild(ne.innerContainer)), ne.config.enableTime && e.appendChild(g()), ne.calendarContainer.appendChild(e), ne.config.inline || ne.config.static ? (ne.calendarContainer.classList.add(ne.config.inline ? "inline" : "static"), H(), ne.config.appendTo && ne.config.appendTo.nodeType ? ne.config.appendTo.appendChild(ne.calendarContainer) : ne.element.parentNode.insertBefore(ne.calendarContainer, (ne.altInput || ne.input).nextSibling)) : document.body.appendChild(ne.calendarContainer)
     }

     function f(e, t, n) {
         var a = x(t),
             i = X("span", "flatpickr-day " + e, t.getDate());
         return i.dateObj = t, 0 === ee(t, ne.now) && i.classList.add("today"), a ? (i.tabIndex = 0, q(t) && (i.classList.add("selected"), "range" === ne.config.mode ? i.classList.add(0 === ee(t, ne.selectedDates[0]) ? "startRange" : "endRange") : ne.selectedDateElem = i)) : (i.classList.add("disabled"), ne.selectedDates[0] && t > ne.minRangeDate && t < ne.selectedDates[0] ? ne.minRangeDate = t : ne.selectedDates[0] && t < ne.maxRangeDate && t > ne.selectedDates[0] && (ne.maxRangeDate = t)), "range" === ne.config.mode && (V(t) && !q(t) && i.classList.add("inRange"), 1 === ne.selectedDates.length && (t < ne.minRangeDate || t > ne.maxRangeDate) && i.classList.add("notAllowed")), ne.config.weekNumbers && "prevMonthDay" !== e && n % 7 === 1 && ne.weekNumbers.insertAdjacentHTML("beforeend", "<span class='disabled flatpickr-day'>" + ne.config.getWeek(t) + "</span>"), J("DayCreate", i), i
     }

     function m() {
         ne.days || (ne.days = X("div", "flatpickr-days"), ne.days.tabIndex = -1), ne.firstOfMonth = (new Date(ne.currentYear, ne.currentMonth, 1).getDay() - ne.l10n.firstDayOfWeek + 7) % 7, ne.prevMonthDays = ne.utils.getDaysinMonth((ne.currentMonth - 1 + 12) % 12);
         var e = ne.utils.getDaysinMonth(),
             t = document.createDocumentFragment(),
             n = ne.prevMonthDays + 1 - ne.firstOfMonth;
         ne.config.weekNumbers && (ne.weekNumbers.innerHTML = ""), "range" === ne.config.mode && (ne.minRangeDate = new Date(ne.currentYear, ne.currentMonth - 1, n), ne.maxRangeDate = new Date(ne.currentYear, ne.currentMonth + 1, (42 - ne.firstOfMonth) % e)), ne.days.innerHTML = "";
         for (var a = 0; n <= ne.prevMonthDays; a++, n++) t.appendChild(f("prevMonthDay", new Date(ne.currentYear, ne.currentMonth - 1, n), n));
         for (n = 1; n <= e; n++) t.appendChild(f("", new Date(ne.currentYear, ne.currentMonth, n), n));
         for (var i = e + 1; i <= 42 - ne.firstOfMonth; i++) t.appendChild(f("nextMonthDay", new Date(ne.currentYear, ne.currentMonth + 1, i % e), i));
         return ne.days.appendChild(t), ne.days
     }

     function p() {
         var e = document.createDocumentFragment();
         ne.monthNav = X("div", "flatpickr-month"), ne.prevMonthNav = X("span", "flatpickr-prev-month"), ne.prevMonthNav.innerHTML = ne.config.prevArrow, ne.currentMonthElement = X("span", "cur-month");
         var t = u("cur-year");
         return ne.currentYearElement = t.childNodes[0], ne.currentYearElement.title = ne.l10n.scrollTitle, ne.config.minDate && (ne.currentYearElement.min = ne.config.minDate.getFullYear()), ne.config.maxDate && (ne.currentYearElement.max = ne.config.maxDate.getFullYear(), ne.currentYearElement.disabled = ne.config.minDate && ne.config.minDate.getFullYear() === ne.config.maxDate.getFullYear()), ne.nextMonthNav = X("span", "flatpickr-next-month"), ne.nextMonthNav.innerHTML = ne.config.nextArrow, ne.navigationCurrentMonth = X("span", "flatpickr-current-month"), ne.navigationCurrentMonth.appendChild(ne.currentMonthElement), ne.navigationCurrentMonth.appendChild(t), e.appendChild(ne.prevMonthNav), e.appendChild(ne.navigationCurrentMonth), e.appendChild(ne.nextMonthNav), ne.monthNav.appendChild(e), Q(), ne.monthNav
     }

     function g() {
         ne.calendarContainer.classList.add("hasTime"), ne.timeContainer = X("div", "flatpickr-time"), ne.timeContainer.tabIndex = -1;
         var e = X("span", "flatpickr-time-separator", ":"),
             t = u("flatpickr-hour");
         ne.hourElement = t.childNodes[0];
         var n = u("flatpickr-minute");
         if (ne.minuteElement = n.childNodes[0], ne.hourElement.tabIndex = ne.minuteElement.tabIndex = 0, ne.hourElement.pattern = ne.minuteElement.pattern = "d*", ne.hourElement.value = ne.pad(K() ? K().getHours() : ne.config.defaultHour), ne.minuteElement.value = ne.pad(K() ? K().getMinutes() : ne.config.defaultMinute), ne.hourElement.step = ne.config.hourIncrement, ne.minuteElement.step = ne.config.minuteIncrement, ne.hourElement.min = ne.config.time_24hr ? 0 : 1, ne.hourElement.max = ne.config.time_24hr ? 23 : 12, ne.minuteElement.min = 0, ne.minuteElement.max = 59, ne.hourElement.title = ne.minuteElement.title = ne.l10n.scrollTitle, ne.timeContainer.appendChild(t), ne.timeContainer.appendChild(e), ne.timeContainer.appendChild(n), ne.config.time_24hr && ne.timeContainer.classList.add("time24hr"), ne.config.enableSeconds) {
             ne.timeContainer.classList.add("hasSeconds");
             var a = u("flatpickr-second");
             ne.secondElement = a.childNodes[0], ne.secondElement.pattern = ne.hourElement.pattern, ne.secondElement.value = K() ? ne.pad(K().getSeconds()) : "00", ne.secondElement.step = ne.minuteElement.step, ne.secondElement.min = ne.minuteElement.min, ne.secondElement.max = ne.minuteElement.max, ne.timeContainer.appendChild(X("span", "flatpickr-time-separator", ":")), ne.timeContainer.appendChild(a)
         }
         return ne.config.time_24hr || (ne.amPM = X("span", "flatpickr-am-pm", ["AM", "PM"][ne.hourElement.value > 11 | 0]), ne.amPM.title = ne.l10n.toggleTitle, ne.amPM.tabIndex = 0, ne.timeContainer.appendChild(ne.amPM)), ne.timeContainer
     }

     function h() {
         ne.weekdayContainer || (ne.weekdayContainer = X("div", "flatpickr-weekdays"));
         var e = ne.l10n.firstDayOfWeek,
             t = ne.l10n.weekdays.shorthand.slice();
         return e > 0 && e < t.length && (t = [].concat(t.splice(e, t.length), t.splice(0, e))), ne.weekdayContainer.innerHTML = "\n\t\t<span class=flatpickr-weekday>\n\t\t\t" + t.join("</span><span class=flatpickr-weekday>") + "\n\t\t</span>\n\t\t", ne.weekdayContainer
     }

     function v() {
         return ne.calendarContainer.classList.add("hasWeeks"), ne.weekWrapper = X("div", "flatpickr-weekwrapper"), ne.weekWrapper.appendChild(X("span", "flatpickr-weekday", ne.l10n.weekAbbreviation)), ne.weekNumbers = X("div", "flatpickr-weeks"), ne.weekWrapper.appendChild(ne.weekNumbers), ne.weekWrapper
     }

     function D(e, t) {
         ne.currentMonth = "undefined" == typeof t || t ? ne.currentMonth + e : e, E(), Q(), m(), ne.config.noCalendar || ne.days.focus(), J("MonthChange")
     }

     function b() {
         ne.input.value = "", ne.altInput && (ne.altInput.value = ""), ne.mobileInput && (ne.mobileInput.value = ""), ne.selectedDates = [], ne.dateIsPicked = !1, ne.redraw(), J("Change")
     }

     function y() {
         ne.isOpen = !1, ne.isMobile || (ne.calendarContainer.classList.remove("open"), (ne.altInput || ne.input).classList.remove("active")), J("Close")
     }

     function M(e) {
         e = e || ne, e.clear(), document.removeEventListener("keydown", T), window.removeEventListener("resize", e.debouncedResize), document.removeEventListener("click", w), document.removeEventListener("blur", w), e.isMobile && e.mobileInput && e.mobileInput.parentNode ? e.mobileInput.parentNode.removeChild(e.mobileInput) : e.calendarContainer && e.calendarContainer.parentNode && e.calendarContainer.parentNode.removeChild(e.calendarContainer), e.altInput && (e.input.type = "text", e.altInput.parentNode && e.altInput.parentNode.removeChild(e.altInput)), e.input.classList.remove("flatpickr-input"), e.input.removeEventListener("focus", L), e.input.removeAttribute("readonly")
     }

     function C(e) {
         for (var t = e; t;) {
             if (/flatpickr-day|flatpickr-calendar/.test(t.className)) return !0;
             t = t.parentNode
         }
         return !1
     }

     function w(e) {
         var t = ne.element.contains(e.target) || e.target === ne.input || e.target === ne.altInput;
         !ne.isOpen || C(e.target) || t || (ne.close(), "range" === ne.config.mode && 1 === ne.selectedDates.length && (ne.clear(), ne.redraw()))
     }

     function k(e, t) {
         if (ne.config.formatDate) return ne.config.formatDate(e, t);
         var n = e.split("");
         return n.map(function (e, a) {
             return ne.formats[e] && "\\" !== n[a - 1] ? ne.formats[e](t) : "\\" !== e ? e : ""
         }).join("")
     }

     function E(e) {
         ne.currentMonth < 0 || ne.currentMonth > 11 ? (ne.currentYear += ne.currentMonth % 11, ne.currentMonth = (ne.currentMonth + 12) % 12, J("YearChange")) : e && (!ne.currentYearElement.min || e >= ne.currentYearElement.min) && (!ne.currentYearElement.max || e <= ne.currentYearElement.max) && (ne.currentYear = parseInt(e, 10) || ne.currentYear, ne.config.maxDate && ne.currentYear === ne.config.maxDate.getFullYear() ? ne.currentMonth = Math.min(ne.config.maxDate.getMonth(), ne.currentMonth) : ne.config.minDate && ne.currentYear === ne.config.minDate.getFullYear() && (ne.currentMonth = Math.max(ne.config.minDate.getMonth(), ne.currentMonth)), ne.redraw(), J("YearChange"))
     }

     function x(e) {
         if (ne.config.minDate && ee(e, ne.config.minDate) < 0 || ne.config.maxDate && ee(e, ne.config.maxDate) > 0) return !1;
         if (!ne.config.enable.length && !ne.config.disable.length) return !0;
         e = S(e, !0);
         for (var t, n = ne.config.enable.length > 0, a = n ? ne.config.enable : ne.config.disable, i = 0; i < a.length; i++) {
             if (t = a[i], t instanceof Function && t(e)) return n;
             if ((t instanceof Date || "string" == typeof t) && S(t, !0).getTime() === e.getTime()) return n;
             if ("object" === ("undefined" == typeof t ? "undefined" : _typeof(t)) && t.from && t.to && e >= S(t.from) && e <= S(t.to)) return n
         }
         return !n
     }

     function T(e) {
         if (ne.isOpen) switch (e.which) {
             case 13:
                 ne.timeContainer && ne.timeContainer.contains(e.target) ? $() : O(e);
                 break;
             case 27:
                 ne.clear(), ne.redraw(), ne.close();
                 break;
             case 37:
                 e.target !== ne.input & e.target !== ne.altInput && D(-1);
                 break;
             case 38:
                 e.preventDefault(), ne.timeContainer && ne.timeContainer.contains(e.target) ? a(e) : (ne.currentYear++, ne.redraw());
                 break;
             case 39:
                 e.target !== ne.input & e.target !== ne.altInput && D(1);
                 break;
             case 40:
                 e.preventDefault(), ne.timeContainer && ne.timeContainer.contains(e.target) ? a(e) : (ne.currentYear--, ne.redraw())
         }
     }

     function I(e) {
         if (1 === ne.selectedDates.length && e.target.classList.contains("flatpickr-day")) {
             for (var t = e.target.dateObj, n = S(ne.selectedDates[0], !0), a = Math.min(t.getTime(), ne.selectedDates[0].getTime()), i = Math.max(t.getTime(), ne.selectedDates[0].getTime()), r = !1, o = a; o < i; o += ne.utils.duration.DAY)
                 if (!x(new Date(o))) {
                     r = !0;
                     break
                 } for (var l = ne.days.childNodes[0].dateObj.getTime(), c = 0; c < 42; c++, l += ne.utils.duration.DAY) {
                 var s = l < ne.minRangeDate.getTime() || l > ne.maxRangeDate.getTime();
                 if (s) ne.days.childNodes[c].classList.add("notAllowed"), ne.days.childNodes[c].classList.remove("inRange", "startRange", "endRange");
                 else if (!r || s) {
                     ne.days.childNodes[c].classList.remove("startRange", "inRange", "endRange", "notAllowed");
                     var u = Math.max(ne.minRangeDate.getTime(), a),
                         d = Math.min(ne.maxRangeDate.getTime(), i);
                     e.target.classList.add(t < ne.selectedDates[0] ? "startRange" : "endRange"), n > t && l === n.getTime() ? ne.days.childNodes[c].classList.add("endRange") : n < t && l === n.getTime() ? ne.days.childNodes[c].classList.add("startRange") : l > u && l < d && ne.days.childNodes[c].classList.add("inRange")
                 }
             }
         }
     }

     function Y() {
         !ne.isOpen || ne.config.static || ne.config.inline || H()
     }

     function L(e) {
         return ne.isMobile ? (e && (e.preventDefault(), e.target.blur()), setTimeout(function () {
             ne.mobileInput.click()
         }, 0), void J("Open")) : void(ne.isOpen || (ne.altInput || ne.input).disabled || ne.config.inline || (ne.calendarContainer.classList.add("open"), ne.config.static || ne.config.inline || H(), ne.isOpen = !0, ne.config.allowInput || ((ne.altInput || ne.input).blur(), (ne.config.noCalendar ? ne.timeContainer : ne.selectedDateElem ? ne.selectedDateElem : ne.days).focus()), (ne.altInput || ne.input).classList.add("active"), J("Open")))
     }

     function F() {
         var e = ["utc", "wrap", "weekNumbers", "allowInput", "clickOpens", "time_24hr", "enableTime", "noCalendar", "altInput", "shorthandCurrentMonth", "inline", "static", "enableSeconds", "disableMobile"];
         ne.config = Object.create(Flatpickr.defaultConfig);
         var t = _extends({}, ne.instanceConfig, ne.element.dataset || {});
         Object.defineProperty(ne.config, "minDate", {
             get: function () {
                 return this._minDate
             },
             set: function (e) {
                 this._minDate = S(e), ne.days && _(), ne.currentYearElement && (e && this._minDate instanceof Date ? (ne.minDateHasTime = this._minDate.getHours() || this._minDate.getMinutes() || this._minDate.getSeconds(), ne.currentYearElement.min = this._minDate.getFullYear()) : ne.currentYearElement.removeAttribute("min"), ne.currentYearElement.disabled = this._maxDate && this._minDate && this._maxDate.getFullYear() === this._minDate.getFullYear())
             }
         }), Object.defineProperty(ne.config, "maxDate", {
             get: function () {
                 return this._maxDate
             },
             set: function (e) {
                 this._maxDate = S(e), ne.days && _(), ne.currentYearElement && (e && this._maxDate instanceof Date ? (ne.currentYearElement.max = this._maxDate.getFullYear(), ne.maxDateHasTime = this._maxDate.getHours() || this._maxDate.getMinutes() || this._maxDate.getSeconds()) : ne.currentYearElement.removeAttribute("max"), ne.currentYearElement.disabled = this._maxDate && this._minDate && this._maxDate.getFullYear() === this._minDate.getFullYear())
             }
         }), _extends(ne.config, t);
         for (var n = 0; n < e.length; n++) ne.config[e[n]] = ne.config[e[n]] === !0 || "true" === ne.config[e[n]];
         !t.dateFormat && t.enableTime && (ne.config.dateFormat = ne.config.noCalendar ? "H:i" + (ne.config.enableSeconds ? ":S" : "") : Flatpickr.defaultConfig.dateFormat + " H:i" + (ne.config.enableSeconds ? ":S" : "")), t.altInput && t.enableTime && !t.altFormat && (ne.config.altFormat = ne.config.noCalendar ? "h:i" + (ne.config.enableSeconds ? ":S K" : " K") : Flatpickr.defaultConfig.altFormat + (" h:i" + (ne.config.enableSeconds ? ":S" : "") + " K"))
     }

     function N() {
         "object" !== _typeof(ne.config.locale) && "undefined" == typeof Flatpickr.l10ns[ne.config.locale] && console.warn("flatpickr: invalid locale " + ne.config.locale), ne.l10n = _extends(Object.create(Flatpickr.l10ns.default), "object" === _typeof(ne.config.locale) ? ne.config.locale : "default" !== ne.config.locale ? Flatpickr.l10ns[ne.config.locale] || {} : {})
     }

     function S(e) {
         var t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
         if (!e) return null;
         var n = /(\d+)/g,
             a = /^(\d{1,2})[:\s](\d\d)?[:\s]?(\d\d)?\s?(a|p)?/i,
             i = e;
         if (e.toFixed) e = new Date(e);
         else if ("string" == typeof e)
             if (e = e.trim(), "today" === e) e = new Date, t = !0;
             else if (ne.config.parseDate) e = ne.config.parseDate(e);
         else if (a.test(e)) {
             var r = e.match(a),
                 o = r[4] ? r[1] % 12 + ("p" === r[4].toLowerCase() ? 12 : 0) : r[1];
             e = new Date, e.setHours(o, r[2] || 0, r[3] || 0)
         } else if (/Z$/.test(e) || /GMT$/.test(e)) e = new Date(e);
         else if (n.test(e) && /^[0-9]/.test(e)) {
             var l = e.match(n);
             e = new Date(l[0] + "/" + (l[1] || 1) + "/" + (l[2] || 1) + " " + (l[3] || 0) + ":" + (l[4] || 0) + ":" + (l[5] || 0))
         } else e = new Date(e);
         return e instanceof Date ? (ne.config.utc && !e.fp_isUTC && (e = e.fp_toUTC()), t && e.setHours(0, 0, 0, 0), e) : (console.warn("flatpickr: invalid date " + i), console.info(ne.element), null)
     }

     function H() {
         var e = ne.calendarContainer.offsetHeight,
             t = ne.altInput || ne.input,
             n = t.getBoundingClientRect(),
             a = window.innerHeight - n.bottom + t.offsetHeight,
             i = void 0,
             r = window.pageXOffset + n.left;
         a < e ? (i = window.pageYOffset - e + n.top - 2, ne.calendarContainer.classList.remove("arrowTop"), ne.calendarContainer.classList.add("arrowBottom")) : (i = window.pageYOffset + t.offsetHeight + n.top + 2, ne.calendarContainer.classList.remove("arrowBottom"), ne.calendarContainer.classList.add("arrowTop")), ne.config.static || ne.config.inline || (ne.calendarContainer.style.top = i + "px", ne.calendarContainer.style.left = r + "px")
     }

     function _() {
         ne.config.noCalendar || ne.isMobile || (h(), Q(), m())
     }

     function O(e) {
         if (ne.config.allowInput && 13 === e.which && e.target === (ne.altInput || ne.input)) return ne.setDate((ne.altInput || ne.input).value), e.target.blur();
         if (e.target.classList.contains("flatpickr-day") && !e.target.classList.contains("disabled") && !e.target.classList.contains("notAllowed")) {
             var t = e.target.dateObj;
             if (ne.selectedDateElem = e.target, "single" === ne.config.mode) ne.selectedDates = [t], ne.config.enableTime || ne.close();
             else if ("multiple" === ne.config.mode) {
                 var n = q(t);
                 n ? ne.selectedDates.splice(n, 1) : ne.selectedDates.push(t)
             } else "range" === ne.config.mode && (2 === ne.selectedDates.length && ne.clear(), ne.selectedDates.push(t), ne.selectedDates.sort(function (e, t) {
                 return e.getTime() - t.getTime()
             }));
             i(), t.getMonth() !== ne.currentMonth && "range" !== ne.config.mode && (ne.currentYear = t.getFullYear(), ne.currentMonth = t.getMonth(), Q()), m(), ne.minDateHasTime && ne.config.enableTime && 0 === ee(t, ne.config.minDate) && r(ne.config.minDate), $(), setTimeout(function () {
                 return ne.dateIsPicked = !0
             }, 50), "range" === ne.config.mode && 1 === ne.selectedDates.length && I(e), J("Change")
         }
     }

     function P(e, t) {
         ne.config[e] = t, ne.redraw(), c()
     }

     function A(e, t) {
         return e ? (ne.selectedDates = (Array.isArray(e) ? e.map(S) : [S(e)]).filter(function (e) {
             return e instanceof Date && x(e)
         }), ne.redraw(), c(), r(), $(), ne.dateIsPicked = ne.selectedDates.length > 0, void(t && J("Change"))) : ne.clear()
     }

     function R() {
         ne.selectedDates = [], ne.now = new Date;
         var e = ne.config.defaultDate || ne.input.value;
         if (Array.isArray(e)) ne.selectedDates = e.map(S);
         else if (e) switch (ne.config.mode) {
             case "single":
                 ne.selectedDates = [S(e)];
                 break;
             case "multiple":
                 ne.selectedDates = e.split("; ").map(S);
                 break;
             case "range":
                 ne.selectedDates = e.split(ne.l10n.rangeSeparator).map(S)
         }
         ne.selectedDates = ne.selectedDates.filter(function (e) {
             return e instanceof Date && e.getTime() && x(e)
         });
         var t = ne.selectedDates.length ? ne.selectedDates[0] : ne.config.minDate > ne.now ? ne.config.minDate : ne.now;
         ne.currentYear = t.getFullYear(), ne.currentMonth = t.getMonth()
     }

     function j() {
         ne.utils = {
             duration: {
                 DAY: 864e5
             },
             getDaysinMonth: function () {
                 var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : ne.currentMonth,
                     t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : ne.currentYear;
                 return 1 === e && (t % 4 === 0 && t % 100 !== 0 || t % 400 === 0) ? 29 : ne.l10n.daysInMonth[e]
             },
             monthToStr: function (e) {
                 var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : ne.config.shorthandCurrentMonth;
                 return ne.l10n.months[(t ? "short" : "long") + "hand"][e]
             }
         }
     }

     function W() {
         ne.formats = {
             D: function (e) {
                 return ne.l10n.weekdays.shorthand[ne.formats.w(e)]
             },
             F: function (e) {
                 return ne.utils.monthToStr(ne.formats.n(e) - 1, !1)
             },
             H: function (e) {
                 return Flatpickr.prototype.pad(e.getHours())
             },
             J: function (e) {
                 return e.getDate() + ne.l10n.ordinal(e.getDate())
             },
             K: function (e) {
                 return e.getHours() > 11 ? "PM" : "AM"
             },
             M: function (e) {
                 return ne.utils.monthToStr(e.getMonth(), !0)
             },
             S: function (e) {
                 return Flatpickr.prototype.pad(e.getSeconds())
             },
             U: function (e) {
                 return e.getTime() / 1e3
             },
             Y: function (e) {
                 return e.getFullYear()
             },
             d: function (e) {
                 return Flatpickr.prototype.pad(ne.formats.j(e))
             },
             h: function (e) {
                 return e.getHours() % 12 ? e.getHours() % 12 : 12
             },
             i: function (e) {
                 return Flatpickr.prototype.pad(e.getMinutes())
             },
             j: function (e) {
                 return e.getDate()
             },
             l: function (e) {
                 return ne.l10n.weekdays.longhand[ne.formats.w(e)]
             },
             m: function (e) {
                 return Flatpickr.prototype.pad(ne.formats.n(e))
             },
             n: function (e) {
                 return e.getMonth() + 1
             },
             s: function (e) {
                 return e.getSeconds()
             },
             w: function (e) {
                 return e.getDay()
             },
             y: function (e) {
                 return String(ne.formats.Y(e)).substring(2)
             }
         }
     }

     function U() {
         ne.input = ne.config.wrap ? ne.element.querySelector("[data-input]") : ne.element, ne.input.classList.add("flatpickr-input"), ne.config.altInput && (ne.altInput = X(ne.input.nodeName, ne.config.altInputClass), ne.altInput.placeholder = ne.input.placeholder, ne.altInput.type = "text", ne.input.type = "hidden", ne.input.parentNode && ne.input.parentNode.insertBefore(ne.altInput, ne.input.nextSibling)), ne.config.allowInput || (ne.altInput || ne.input).setAttribute("readonly", "readonly")
     }

     function B() {
         var e = ne.config.enableTime ? ne.config.noCalendar ? "time" : "datetime-local" : "date";
         ne.mobileInput = X("input", "flatpickr-input flatpickr-mobile"), ne.mobileInput.step = "any", ne.mobileInput.tabIndex = -1, ne.mobileInput.type = e, ne.mobileInput.disabled = ne.input.disabled, ne.mobileFormatStr = "datetime-local" === e ? "Y-m-d\\TH:i:S" : "date" === e ? "Y-m-d" : "H:i:S", ne.selectedDates.length && (ne.mobileInput.defaultValue = ne.mobileInput.value = k(ne.mobileFormatStr, ne.selectedDates[0])), ne.config.minDate && (ne.mobileInput.min = k("Y-m-d", ne.config.minDate)), ne.config.maxDate && (ne.mobileInput.max = k("Y-m-d", ne.config.maxDate)), ne.input.type = "hidden", ne.config.altInput && (ne.altInput.type = "hidden");
         try {
             ne.input.parentNode.insertBefore(ne.mobileInput, ne.input.nextSibling)
         } catch (e) {}
         ne.mobileInput.addEventListener("change", function (e) {
             ne.setDate(e.target.value), J("Change"), J("Close")
         })
     }

     function z() {
         ne.isOpen ? ne.close() : ne.open()
     }

     function J(e, t) {
         if (ne.config["on" + e])
             for (var n = Array.isArray(ne.config["on" + e]) ? ne.config["on" + e] : [ne.config["on" + e]], a = 0; a < n.length; a++) n[a](ne.selectedDates, ne.input.value, ne, t);
         if ("Change" === e) try {
             ne.input.dispatchEvent(new Event("change", {
                 bubbles: !0
             })), ne.input.dispatchEvent(new Event("input", {
                 bubbles: !0
             }))
         } catch (e) {
             if ("createEvent" in document) return ne.input.dispatchEvent(ne.changeEvent);
             ne.input.fireEvent("onchange")
         }
     }

     function K() {
         return ne.selectedDates.length ? ne.selectedDates[ne.selectedDates.length - 1] : null
     }

     function q(e) {
         for (var t = 0; t < ne.selectedDates.length; t++)
             if (0 === ee(ne.selectedDates[t], e)) return "" + t;
         return !1
     }

     function V(e) {
         return !("range" !== ne.config.mode || ne.selectedDates.length < 2) && (ee(e, ne.selectedDates[0]) >= 0 && ee(e, ne.selectedDates[1]) <= 0)
     }

     function Q() {
         if (!ne.config.noCalendar && !ne.isMobile && ne.monthNav) {
             if (ne.currentMonthElement.textContent = ne.utils.monthToStr(ne.currentMonth) + " ", ne.currentYearElement.value = ne.currentYear, ne.config.minDate) {
                 var e = ne.currentYear === ne.config.minDate.getFullYear() ? (ne.currentMonth + 11) % 12 < ne.config.minDate.getMonth() : ne.currentYear < ne.config.minDate.getFullYear();
                 ne.prevMonthNav.style.display = e ? "none" : "block"
             } else ne.prevMonthNav.style.display = "block";
             if (ne.config.maxDate) {
                 var t = ne.currentYear === ne.config.maxDate.getFullYear() ? ne.currentMonth + 1 > ne.config.maxDate.getMonth() : ne.currentYear > ne.config.maxDate.getFullYear();
                 ne.nextMonthNav.style.display = t ? "none" : "block"
             } else ne.nextMonthNav.style.display = "block"
         }
     }

     function $() {
         if (!ne.selectedDates.length) return ne.clear();
         ne.isMobile && (ne.mobileInput.value = ne.selectedDates.length ? k(ne.mobileFormatStr, K()) : "");
         var e = "range" !== ne.config.mode ? "; " : ne.l10n.rangeSeparator;
         ne.input.value = ne.selectedDates.map(function (e) {
             return k(ne.config.dateFormat, e)
         }).join(e), ne.config.altInput && (ne.altInput.value = ne.selectedDates.map(function (e) {
             return k(ne.config.altFormat, e)
         }).join(e)), J("ValueUpdate")
     }

     function G(e) {
         e.preventDefault();
         var t = Math.max(-1, Math.min(1, e.wheelDelta || -e.deltaY)),
             n = parseInt(e.target.value, 10) + t;
         E(n), e.target.value = ne.currentYear
     }

     function X(e) {
         var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
             n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : "",
             a = document.createElement(e);
         return a.className = t, n && (a.innerHTML = n), a
     }

     function Z(e, t, n) {
         var a = void 0;
         return function () {
             for (var i = arguments.length, r = Array(i), o = 0; o < i; o++) r[o] = arguments[o];
             var l = this,
                 c = function () {
                     a = null, n || e.apply(l, r)
                 };
             clearTimeout(a), a = setTimeout(c, t), n && !a && e.apply(l, r)
         }
     }

     function ee(e, t) {
         return e instanceof Date && t instanceof Date && new Date(e.getTime()).setHours(0, 0, 0, 0) - new Date(t.getTime()).setHours(0, 0, 0, 0)
     }

     function te(e) {
         if (e.preventDefault(), e && ((e.target.value || e.target.textContent).length >= 2 || "keydown" !== e.type && "input" !== e.type) && e.target.blur(), ne.amPM && e.target === ne.amPM) return e.target.textContent = ["AM", "PM"]["AM" === e.target.textContent | 0];
         var t = Number(e.target.min),
             n = Number(e.target.max),
             a = Number(e.target.step),
             i = parseInt(e.target.value, 10),
             r = Math.max(-1, Math.min(1, e.wheelDelta || -e.deltaY)),
             o = Number(i);
         "wheel" === e.type ? o = i + a * r : "keydown" === e.type && (o = i + a * (38 === e.which ? 1 : -1)), o < t ? o = n + o + (e.target !== ne.hourElement) + (e.target === ne.hourElement && !ne.amPM) : o > n && (o = e.target === ne.hourElement ? o - n - !ne.amPM : t), ne.amPM && e.target === ne.hourElement && (1 === a ? o + i === 23 : Math.abs(o - i) > a) && (ne.amPM.textContent = "PM" === ne.amPM.innerHTML ? "AM" : "PM"), e.target.value = ne.pad(o)
     }
     var ne = this;
     return n(), ne
 }

 function _flatpickr(e, t) {
     for (var n = [], a = 0; a < e.length; a++) try {
         e[a]._flatpickr = new Flatpickr(e[a], t || {}), n.push(e[a]._flatpickr)
     } catch (e) {
         console.warn(e, e.stack)
     }
     return 1 === n.length ? n[0] : n
 }

 function flatpickr(e, t) {
     return _flatpickr(document.querySelectorAll(e), t)
 }
 var _extends = Object.assign || function (e) {
         for (var t = 1; t < arguments.length; t++) {
             var n = arguments[t];
             for (var a in n) Object.prototype.hasOwnProperty.call(n, a) && (e[a] = n[a])
         }
         return e
     },
     _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
         return typeof e
     } : function (e) {
         return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
     };
 Flatpickr.defaultConfig = {
     mode: "single",
     utc: !1,
     wrap: !1,
     weekNumbers: !1,
     allowInput: !1,
     clickOpens: !0,
     time_24hr: !1,
     enableTime: !1,
     noCalendar: !1,
     dateFormat: "Y-m-d",
     altInput: !1,
     altInputClass: "form-control input",
     altFormat: "F j, Y",
     defaultDate: null,
     minDate: null,
     maxDate: null,
     parseDate: null,
     formatDate: null,
     getWeek: function (e) {
         var t = new Date(e.getTime());
         t.setHours(0, 0, 0, 0), t.setDate(t.getDate() + 3 - (t.getDay() + 6) % 7);
         var n = new Date(t.getFullYear(), 0, 4);
         return 1 + Math.round(((t.getTime() - n.getTime()) / 864e5 - 3 + (n.getDay() + 6) % 7) / 7)
     },
     enable: [],
     disable: [],
     shorthandCurrentMonth: !1,
     inline: !1,
     static: !1,
     appendTo: null,
     prevArrow: "<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z' /></svg>",
     nextArrow: "<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z' /></svg>",
     enableSeconds: !1,
     hourIncrement: 1,
     minuteIncrement: 5,
     defaultHour: 12,
     defaultMinute: 0,
     disableMobile: !1,
     locale: "default",
     onChange: null,
     onOpen: null,
     onClose: null,
     onReady: null,
     onValueUpdate: null,
     onDayCreate: null
 }, Flatpickr.l10ns = {
     en: {
         weekdays: {
             shorthand: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
             longhand: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
         },
         months: {
             shorthand: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
             longhand: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
         },
         daysInMonth: [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
         firstDayOfWeek: 0,
         ordinal: function (e) {
             var t = e % 100;
             if (t > 3 && t < 21) return "th";
             switch (t % 10) {
                 case 1:
                     return "st";
                 case 2:
                     return "nd";
                 case 3:
                     return "rd";
                 default:
                     return "th"
             }
         },
         rangeSeparator: " to ",
         weekAbbreviation: "Wk",
         scrollTitle: "Scroll to increment",
         toggleTitle: "Click to toggle"
     }
 }, Flatpickr.l10ns.default = Flatpickr.l10ns.en, Flatpickr.localize = function (e) {
     return _extends(Flatpickr.l10ns.default, e || {})
 }, Flatpickr.prototype = {
     pad: function (e) {
         return ("0" + e).slice(-2)
     }
 }, "undefined" != typeof HTMLElement && (HTMLCollection.prototype.flatpickr = NodeList.prototype.flatpickr = function (e) {
     return _flatpickr(this, e)
 }, HTMLElement.prototype.flatpickr = function (e) {
     return _flatpickr([this], e)
 }), "undefined" != typeof jQuery && (jQuery.fn.flatpickr = function (e) {
     return _flatpickr(this, e)
 }), Date.prototype.fp_incr = function (e) {
     return new Date(this.getFullYear(), this.getMonth(), this.getDate() + parseInt(e, 10))
 }, Date.prototype.fp_isUTC = !1, Date.prototype.fp_toUTC = function () {
     var e = new Date(this.getUTCFullYear(), this.getUTCMonth(), this.getUTCDate(), this.getUTCHours(), this.getUTCMinutes(), this.getUTCSeconds());
     return e.fp_isUTC = !0, e
 }, "classList" in document.documentElement || !Object.defineProperty || "undefined" == typeof HTMLElement || Object.defineProperty(HTMLElement.prototype, "classList", {
     get: function () {
         function e(e) {
             return function (n) {
                 var a = t.className.split(/\s+/),
                     i = a.indexOf(n);
                 e(a, i, n), t.className = a.join(" ")
             }
         }
         var t = this,
             n = {
                 add: e(function (e, t, n) {
                     ~t || e.push(n)
                 }),
                 remove: e(function (e, t) {
                     ~t && e.splice(t, 1)
                 }),
                 toggle: e(function (e, t, n) {
                     ~t ? e.splice(t, 1) : e.push(n)
                 }),
                 contains: function (e) {
                     return !!~t.className.split(/\s+/).indexOf(e)
                 },
                 item: function (e) {
                     return t.className.split(/\s+/)[e] || null
                 }
             };
         return Object.defineProperty(n, "length", {
             get: function () {
                 return t.className.split(/\s+/).length
             }
         }), n
     }
 }), "undefined" != typeof module && (module.exports = Flatpickr);
 ! function (t, n) {
     var o = function (t, o) {
         var i = this;
         i.el = t, i.$el = n(t), i.options = o
     };
     o.prototype = {
         defaults: {
             data: [],
             backend: !1
         },
         init: function () {
             var t = this;
             if (t.hotspot = n.extend({}, t.defaults, t.options), 0 == t.hotspot.backend && t.frontendStyleMaker(), 1 == t.hotspot.backend) {
                 t.$el.find(".syn-hotspot-imgwrapper").click(function (n) {
                     t.backendAddHotspot(n)
                 }), t.$el.append('<div class="syn-hotspot-editctn syn-elem-popup syn-centerhv syn-transition-4" data-situation="hidden" data-editing-id="">            \t\t<div class="syn-hotspot-edithead syn-hotspot-editsection">Edit Tooltip Content <div class="syn-popup-closer syn-popup-close syn-centerv">&#x2717;</div></div>\t\t\t\t\t\t<div class="syn-hotspot-editcontent syn-hotspot-editsection">\t\t\t\t\t\t\t<div class="syn-hotspot-editlabel">Title</div>\t\t\t\t\t\t\t<div><input type="text" class="syn-hotspot-edit-input syn-hotspot-titleinp syn-transition-4"></div>\t\t\t\t\t\t\t<div class="syn-hotspot-editlabel">Message</div>\t\t\t\t\t\t\t<div><textarea class="syn-hotspot-edit-input syn-hotspot-infoinp syn-transition-4"></textarea></div>\t\t\t\t\t\t\t<div class="syn-hotspot-editlabel">Tooltip Position</div>\t\t\t\t\t\t\t<div><select class="syn-hotspot-edit-input syn-hotspot-positioninp syn-transition-4"><option value="bottom">Bottom</option><option value="top">Top</option><option value="lefttop">Left Top</option><option value="leftcenter">Left Center</option><option value="leftbottom">Left Bottom</option><option value="righttop">Right Top</option><option value="rightcenter">Right Center</option><option value="rightbottom">Right Bottom</option></select>\t\t\t\t\t\t</div>\t\t\t\t\t\t<div class="syn-hotspot-editbuttons"> \t\t\t\t\t\t\t<div class="syn-hotspot-editbtn syn-save syn-transition-4 syn-back-btn" data-bxs-small-h>Save Changes</div> \t\t\t\t\t\t\t<div class="syn-hotspot-editbtn syn-transition-4 syn-back-btn syn-popup-close" data-bxs-small-h>Cancel</div> \t\t\t\t\t\t</div> \t\t\t\t\t</div>');
                 var o = t.$el.parents(".syn-elem-parent").find(".syn-fake-input").val();
                 if ("" != n.trim(o)) {
                     var i = JSON.parse(o);
                     if ("" != n.trim(i.data)) {
                         var s = JSON.parse(i.data);
                         t.hotspot.data = [], s.forEach(function (n, o) {
                             n = JSON.parse(n), t.hotspot.data.push(n), t.backendPrintHotspot(n, "hidden")
                         })
                     }
                 }
                 t.closePopup()
             }
             return t
         },
         frontendStyleMaker: function () {
             var t = this,
                 o = "",
                 i = t.$el.parents(".syn-hotspot-container"),
                 s = JSON.parse(i.attr("data-marker-data")),
                 e = JSON.parse(i.attr("data-tooltip-data")),
                 a = JSON.parse(i.attr("data-hotspot"));
             o += ".syn-hotspot-itemfront .syn-hotspot-marker{background:" + s.markerBackground + "; color:" + s.markerColor + "; }", o += ".syn-hotspot-contentbig .syn-hotspot-content{color:" + s.markerColor + "; background:" + e.tooltipBackground + "}.syn-hotspot-contentbig .syn-hotspot-title{color:" + e.tooltipTitleColor + ";" + e.tooltipTitleFontSize + " " + e.tooltipTitleFontStyle + "}.syn-hotspot-contentbig .syn-hotspot-info{color:" + e.tooltipInfoColor + ";" + e.tooltipInfoFontSize + "}";
             var d = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"],
                 p = "";
             "plussign" == s.markerType && (p = "+"), a.forEach(function (n, o) {
                 "alphabet" == s.markerType && (p = d[o]), "numbers" == s.markerType && (p = o + 1), t.printHotspot(n, p, e.tooltipShowEvent, e.tooltipAnimation)
             }), n("style[data-sayenstyle]").length || n("head").append('<style type="text/css" media="screen" data-sayenstyle="sayen"></style>'), n('style[data-sayenstyle="sayen"]').append(o)
         },
         printHotspot: function (t, n, o, i) {
             var s = this;
             s.$el.append('<div class="syn-hotspot-contentbig syn-elem-isalign " data-position="' + t.position + '"  style="left:' + t.left + "%; top:" + t.top + '%;">            \t<div class="syn-hotspot-item syn-hotspot-itemfront syn-elem-isbxsh" data-id="' + t.theID + '" style="left:' + t.left + "%; top:" + t.top + '%;">\t\t\t\t\t<div class="syn-hotspot-marker syn-elem-idrounded"><div class="syn-hotspot-markerinsider">' + n + '</div></div></div><div class="syn-hotspot-contentanim syn-animated-elem syn-transition-3" data-animation="' + i + '" data-situation="hidden"><div class="syn-hotspot-contentctn" ><div class="syn-hotspot-content"><div class="syn-hotspot-closer syn-closer"><i class="km-icon-close2"></i></div>\t\t\t\t\t\t<div class="syn-hotspot-title">' + t.title + '</div>\t\t\t\t\t\t<div class="syn-hotspot-info">' + t.info + "</div>\t\t\t\t\t</div></div></div></div>"), s.frontendShowItem(o)
         },
         frontendShowItemHoverResponsive: function (t) {
             this.$el
         },
         frontendShowItem: function (o) {
             var i = this,
                 s = i.$el;
             s.find(".syn-hotspot-closer").unbind("click").click(function () {
                 var t = n(this).parents(".syn-hotspot-contentbig").find(".syn-hotspot-contentctn");
                 i.frontendTooltipChangeSituation(t)
             }), "click" != o && "hover" != o || s.find(".syn-hotspot-contentbig").unbind("click").click(function () {
                 if (n(t).width() < 850 || "click" == o) {
                     console.log("s");
                     var e = n(this).find(".syn-hotspot-contentanim");
                     s.find(".syn-hotspot-contentanim").not(e).attr({
                         "data-situation": "hidden"
                     }), i.frontendTooltipChangeSituation(e)
                 }
             }), "hover" == o && s.find(".syn-hotspot-contentbig").unbind("hover").hover(function () {
                 if (n(t).width() > 850) {
                     var o = n(this).find(".syn-hotspot-contentanim");
                     i.frontendTooltipChangeSituation(o)
                 }
             })
         },
         frontendTooltipChangeSituation: function (t) {
             "hidden" == n.trim(t.attr("data-situation")) ? t.attr({
                 "data-situation": "shown"
             }) : "shown" == n.trim(t.attr("data-situation")) && t.attr({
                 "data-situation": "hidden"
             })
         },
         generateID: function (t) {
             for (var n = "", o = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", i = 0; i < t; i++) n += o.charAt(Math.floor(Math.random() * o.length));
             return n
         },
         backendPrintHotspot: function (t, n) {
             var o = this;
             o.$el.append('<div class="syn-hotspot-item syn-hotspot-edititem" data-id="' + t.theID + '" data-hoverstyle="" data-situation="' + n + '" style="left:' + t.left + "%; top:" + t.top + '%;">\t\t\t\t\t<div class="syn-hotspot-marker syn-closer"></div><div class="syn-hotspot-content syn-hotspot-contentbackend syn-transition-4"><div class="syn-hotspot-closer syn-closer"><i class="km-icon-close2"></i></div>\t\t\t\t\t\t<div class="syn-hotspot-title">' + t.title + '</div>\t\t\t\t\t\t<div class="syn-hotspot-info">' + t.info + '</div>\t\t\t\t\t\t<div class="syn-hotspot-btn syn-hotspot-btnicon  syn-hotspot-btndelete" title="Delete" style="color:#d14836;"><i class="km-icon-trash"></i></div> <div class="syn-hotspot-btn syn-hotspot-btnicon syn-hotspot-btnedit" title="Edit" style="color:#2196f3;"><i class="km-icon-pencil2"></i></div>\t\t\t\t\t</div></div>'), o.backendShowTooltip(), o.backendSavePopup(), o.bakendEditPopup(), o.backendDeleteItem()
         },
         backendAddHotspot: function (t) {
             var n = this,
                 o = n.$el,
                 i = o.offset(),
                 s = n.generateID(7),
                 e = {
                     theID: s,
                     left: 100 * (t.pageX - i.left) / o.width(),
                     top: 100 * (t.pageY - i.top) / o.height(),
                     title: "",
                     info: "",
                     position: "bottom"
                 };
             n.hotspot.data.push(e), n.backendPrintHotspot(e, "shown"), o.find(".syn-hotspot-editctn").attr({
                 "data-situation": "shown",
                 "data-editing-id": s
             }), o.find(".syn-hotspot-edit-input").val(""), n.backendFakeJson()
         },
         bakendEditPopup: function () {
             var t = this,
                 o = t.$el;
             o.find(".syn-hotspot-btnedit").unbind().click(function () {
                 var i = n(this).parents(".syn-hotspot-edititem").attr("data-id"),
                     s = t.backendGetSingleElement(i)[0];
                 o.find(".syn-hotspot-titleinp").val(s.title), o.find(".syn-hotspot-infoinp").val(s.info), o.find(".syn-hotspot-positioninp").val(s.position), o.find(".syn-hotspot-editctn").attr({
                     "data-situation": "shown",
                     "data-editing-id": i
                 })
             })
         },
         closePopup: function () {
             var t = this.$el;
             t.find(".syn-popup-close").unbind().click(function () {
                 t.find(".syn-hotspot-editctn").attr({
                     "data-situation": "hidden",
                     "data-editing-id": ""
                 }).find(".syn-hotspot-edit-input").val("")
             })
         },
         backendSavePopup: function () {
             var t = this,
                 n = t.$el;
             n.find(".syn-hotspot-editbtn.syn-save").unbind().click(function () {
                 var o = n.find(".syn-hotspot-editctn.syn-elem-popup").attr("data-editing-id"),
                     i = n.find(".syn-hotspot-titleinp").val(),
                     s = n.find(".syn-hotspot-infoinp").val(),
                     e = n.find(".syn-hotspot-positioninp").val(),
                     a = t.backendGetSingleElement(o)[0];
                 a.title = i, a.info = s, a.position = e, n.find('.syn-hotspot-edititem[data-id="' + o + '"]').find(".syn-hotspot-title").html(i), n.find('.syn-hotspot-edititem[data-id="' + o + '"]').find(".syn-hotspot-info").html(s), t.backendFakeJson()
             })
         },
         backendDeleteItem: function () {
             var t = this,
                 o = t.$el;
             o.find(".syn-hotspot-btndelete").unbind().click(function () {
                 var i = n(this).parents(".syn-hotspot-item").attr("data-id"),
                     s = t.hotspot.data.indexOf(t.backendGetSingleElement(i)[0]);
                 t.hotspot.data.splice(s, 1), o.find('.syn-hotspot-edititem[data-id="' + i + '"]').remove(), o.find(".syn-hotspot-editctn").attr({
                     "data-situation": "hidden",
                     "data-editing-id": ""
                 }).find(".syn-hotspot-edit-input").val(""), t.backendFakeJson()
             })
         },
         backendGetSingleElement: function (t) {
             var o = this;
             return n.grep(o.hotspot.data, function (n) {
                 return n.theID == t
             })
         },
         backendFakeJson: function () {
             var t = this,
                 n = t.$el.parents(".syn-elem-parent").find(".syn-fake-input"),
                 o = "";
             o = "" != jQuery.trim(n.val()) ? JSON.parse(n.val()) : JSON.parse('{"imageid":"", "data":""}');
             var i = [];
             t.hotspot.data.forEach(function (t, n) {
                 i.push(JSON.stringify(t))
             }), o.data = JSON.stringify(i), n.val(JSON.stringify(o))
         },
         backendShowTooltip: function () {
             this.$el.find(".syn-closer").unbind().click(function () {
                 var t = n(this).parents(".syn-hotspot-edititem");
                 "hidden" == n.trim(t.attr("data-situation")) ? t.attr({
                     "data-situation": "shown"
                 }) : "shown" == n.trim(t.attr("data-situation")) && t.attr({
                     "data-situation": "hidden"
                 })
             })
         }
     }, o.defaults = o.prototype.defaults, n.fn.sayenhotspot = function (t) {
         return this.each(function () {
             new o(this, t).init()
         })
     }, t.sayenhotspot = o
 }(window, jQuery);
