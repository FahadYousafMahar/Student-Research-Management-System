var CRUMINA = {};
! function (e) {
    "use strict";
    var n = e(window),
        t = e(document),
        o = e("body"),
        a = e(".fixed-sidebar");
    jQuery(".back-to-top").on("click", function () {
        return e("html,body").animate({
            scrollTop: 0
        }, 1200), !1
    }), e(document).on("click", ".quantity-plus", function () {
        var n = parseInt(e(this).prev("input").val());
        return e(this).prev("input").val(n + 1).change(), !1
    }), e(document).on("click", ".quantity-minus", function () {
        var n = parseInt(e(this).next("input").val());
        return 1 !== n && e(this).next("input").val(n - 1).change(), !1
    }), e(function () {
        var n;
        e(document).on("touchstart mousedown", ".number-spinner button", function () {
            var t = e(this),
                o = t.closest(".number-spinner").find("input");
            t.closest(".number-spinner").find("button").prop("disabled", !1), n = "up" == t.attr("data-dir") ? setInterval(function () {
                void 0 == o.attr("max") || parseInt(o.val()) < parseInt(o.attr("max")) ? o.val(parseInt(o.val()) + 1) : (t.prop("disabled", !0), clearInterval(n))
            }, 50) : setInterval(function () {
                void 0 == o.attr("min") || parseInt(o.val()) > parseInt(o.attr("min")) ? o.val(parseInt(o.val()) - 1) : (t.prop("disabled", !0), clearInterval(n))
            }, 50)
        }), e(document).on("touchend mouseup", ".number-spinner button", function () {
            clearInterval(n)
        })
    }), e('a[data-toggle="tab"]').on("shown.bs.tab", function (n) {
        "#events" === e(n.target).attr("href") && e(".fc-state-active").click()
    }), e(".js-sidebar-open").on("click", function () {
        return e("body").outerWidth() <= 560 && e(this).closest("body").find(".popup-chat-responsive").removeClass("open-chat"), e(this).toggleClass("active"), e(this).closest(a).toggleClass("open"), !1
    }), n.keydown(function (e) {
        27 == e.which && a.is(":visible") && a.removeClass("open")
    }), t.on("click", function (n) {
        !e(n.target).closest(a).length && a.is(":visible") && a.removeClass("open")
    });
    var i = e(".window-popup");
    e(".js-open-popup").on("click", function (n) {
        var t = e(this).data("popup-target"),
            a = i.filter(t),
            r = e(this).offset();
        return a.addClass("open"), a.css("top", r.top - a.innerHeight() / 2), o.addClass("overlay-enable"), !1
    }), n.keydown(function (n) {
        27 == n.which && (i.removeClass("open"), o.removeClass("overlay-enable"), e(".profile-menu").removeClass("expanded-menu"), e(".popup-chat-responsive").removeClass("open-chat"), e(".profile-settings-responsive").removeClass("open"), e(".header-menu").removeClass("open"))
    }), t.on("click", function (n) {
        e(n.target).closest(i).length || (i.removeClass("open"), o.removeClass("overlay-enable"), e(".profile-menu").removeClass("expanded-menu"), e(".header-menu").removeClass("open"))
    }), e("[data-toggle=tab]").on("click", function () {
        if (e(this).hasClass("active") && e(this).closest("ul").hasClass("mobile-app-tabs")) return e(e(this).attr("href")).toggleClass("active"), e(this).removeClass("active"), !1
    }), e(".js-close-popup").on("click", function () {
        return e(this).closest(i).removeClass("open"), o.removeClass("overlay-enable"), !1
    }), e(".profile-settings-open").on("click", function () {
        return e(".profile-settings-responsive").toggleClass("open"), !1
    }), e(".js-expanded-menu").on("click", function () {
        return e(".header-menu").toggleClass("expanded-menu"), !1
    }), e(".js-chat-open").on("click", function () {
        return e(".popup-chat-responsive").toggleClass("open-chat"), !1
    }), e(".js-chat-close").on("click", function () {
        return e(".popup-chat-responsive").removeClass("open-chat"), !1
    }), e(".js-open-responsive-menu").on("click", function () {
        return e(".header-menu").toggleClass("open"), !1
    }), e(".js-close-responsive-menu").on("click", function () {
        return e(".header-menu").removeClass("open"), !1
    }), CRUMINA.CallToActionAnimation = function () {
        var e = new ScrollMagic.Controller;
        new ScrollMagic.Scene({
            triggerElement: ".call-to-action-animation"
        }).setVelocity(".first-img", {
            opacity: 1,
            bottom: "0",
            scale: "1"
        }, 1200).triggerHook(1).addTo(e), new ScrollMagic.Scene({
            triggerElement: ".call-to-action-animation"
        }).setVelocity(".second-img", {
            opacity: 1,
            bottom: "50%",
            right: "40%"
        }, 1500).triggerHook(1).addTo(e)
    }, CRUMINA.ImgScaleAnimation = function () {
        var e = new ScrollMagic.Controller;
        new ScrollMagic.Scene({
            triggerElement: ".img-scale-animation"
        }).setVelocity(".main-img", {
            opacity: 1,
            scale: "1"
        }, 200).triggerHook(.3).addTo(e), new ScrollMagic.Scene({
            triggerElement: ".img-scale-animation"
        }).setVelocity(".first-img1", {
            opacity: 1,
            scale: "1"
        }, 1200).triggerHook(.8).addTo(e), new ScrollMagic.Scene({
            triggerElement: ".img-scale-animation"
        }).setVelocity(".second-img1", {
            opacity: 1,
            scale: "1"
        }, 1200).triggerHook(1.1).addTo(e), new ScrollMagic.Scene({
            triggerElement: ".img-scale-animation"
        }).setVelocity(".third-img1", {
            opacity: 1,
            scale: "1"
        }, 1200).triggerHook(1.4).addTo(e)
    }, CRUMINA.SubscribeAnimation = function () {
        var e = new ScrollMagic.Controller;
        new ScrollMagic.Scene({
            triggerElement: ".subscribe-animation"
        }).setVelocity(".plane", {
            opacity: 1,
            bottom: "auto",
            top: "-20",
            left: "50%",
            scale: "1"
        }, 1200).triggerHook(1).addTo(e)
    }, CRUMINA.PlanerAnimation = function () {
        var e = new ScrollMagic.Controller;
        new ScrollMagic.Scene({
            triggerElement: ".planer-animation"
        }).setVelocity(".planer", {
            opacity: 1,
            left: "80%",
            scale: "1"
        }, 2e3).triggerHook(.1).addTo(e)
    }, CRUMINA.ContactAnimationAnimation = function () {
        var e = new ScrollMagic.Controller;
        new ScrollMagic.Scene({
            triggerElement: ".contact-form-animation"
        }).setVelocity(".crew", {
            opacity: 1,
            left: "77%",
            scale: "1"
        }, 1e3).triggerHook(.1).addTo(e)
    }, t.ready(function () {
        e(".call-to-action-animation").length && CRUMINA.CallToActionAnimation(), e(".img-scale-animation").length && CRUMINA.ImgScaleAnimation(), e(".subscribe-animation").length && CRUMINA.SubscribeAnimation(), e(".planer-animation").length && CRUMINA.PlanerAnimation(), e(".contact-form-animation").length && CRUMINA.ContactAnimationAnimation(), void 0 !== e.fn.gifplayer && e(".gif-play-image").gifplayer(), void 0 !== e.fn.mediaelementplayer && e("#mediaplayer").mediaelementplayer({
            features: ["prevtrack", "playpause", "nexttrack", "loop", "shuffle", "current", "progress", "duration", "volume"]
        }), e(".mCustomScrollbar").perfectScrollbar({
            wheelPropagation: !1
        })
    })
}(jQuery);