/*! PhotoSwipe Default UI - 4.0.0 - 2014-12-08
 * http://photoswipe.com
 * Copyright (c) 2014 Dmitry Semenov; */
(function(e, t) {
    if (typeof define === "function" && define.amd) {
        define(t)
    } else if (typeof exports === "object") {
        module.exports = t
    } else {
        e.PhotoSwipeUI_Default = t()
    }
})(this, function() {
    "use strict";
    var e = function(e, t) {
        var n = this;
        var r = false, i = true, s, o, u, a, f, l, c, h = true, p, d, v, m, g, y = {
            barsSize: {
                top: 44,
                bottom: "auto"
            },
            closeElClasses: [],
            timeToIdle: 4e3,
            timeToIdleOutside: 2e3,
            loadingIndicatorDelay: 2e3,
            addCaptionHTMLFn: function(e, t) {
                if (!e.title) {
                    t.children[0].innerHTML = "";
                    return false
                }
                t.children[0].innerHTML = e.title;
                return true
            },
            closeEl: false,
            captionEl: true,
            fullscreenEl: false,
            zoomEl: false,
            shareEl: false,
            counterEl: false,
            arrowEl: true,
            preloaderEl: true,
            tapToClose: false,
            tapToToggleControls: true,
            shareButtons: [{
                id: "facebook",
                label: "Share on Facebook",
                url: "https://www.facebook.com/sharer/sharer.php?u={{url}}"
            }, {
                id: "twitter",
                label: "Tweet",
                url: "https://twitter.com/intent/tweet?text={{text}}&url={{url}}"
            }, {
                id: "pinterest",
                label: "Pin it",
                url: "http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}"
            }, {
                id: "download",
                label: "Download image",
                url: "{{raw_image_url}}",
                download: true
            }
            ],
            indexIndicatorSep: " / "
        }, b, w;
        var E = function(e) {
            if (b) {
                return true
            }
            e = e || window.event;
            var t = e.target || e.srcElement, n, r = t.className, i;
            for (var s = 0; s < D.length; s++) {
                n = D[s];
                if (n.onTap && r.indexOf("pswp__" + n.name)>-1) {
                    n.onTap();
                    i = true
                }
            }
            if (i) {
                if (e.stopPropagation) {
                    e.stopPropagation()
                }
                b = true;
                w = setTimeout(function() {
                    b = false
                }, 30)
            }
        }, S = function() {
            return !e.likelyTouchDevice || e.options.mouseUsed || screen.width > 1200
        }, x = function() {
            h=!h;
            if (!h) {
                t[(h ? "add" : "remove") + "Class"](c, "pswp__share-modal--hidden");
                setTimeout(function() {
                    if (!h) {
                        t.addClass(c, "pswp__share-modal--fade-in")
                    }
                }, 30)
            } else {
                t.removeClass(c, "pswp__share-modal--fade-in");
                setTimeout(function() {
                    if (h) {
                        t[(h ? "add" : "remove") + "Class"](c, "pswp__share-modal--hidden")
                    }
                }, 300)
            }
            if (!h) {
                N()
            }
            return false
        }, T = function(e) {
            e = e || window.event;
            var t = e.target || e.srcElement;
            if (!t.href) {
                return false
            }
            if (t.hasAttribute("download")) {
                return true
            }
            window.open(t.href, "pswp_share", "scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,top=100,left=" + (window.screen ? Math.round(screen.width / 2 - 275) : 100));
            if (!h) {
                x()
            }
            return false
        }, N = function() {
            var t = "", n, r;
            for (var i = 0; i < e.options.shareButtons.length; i++) {
                n = e.options.shareButtons[i];
                r = n.url.replace("{{url}}", encodeURIComponent(window.location.href)).replace("{{image_url}}", encodeURIComponent(e.currItem.src || "")).replace("{{raw_image_url}}", e.currItem.src || "").replace("{{text}}", encodeURIComponent(e.currItem.title || ""));
                t += '<a href="' + r + '" target="_blank" class="pswp__share--' + n.id + '"' + (n.download ? "download" : "") + ">" + n.label + "</a>"
            }
            c.children[0].innerHTML = t;
            c.children[0].onclick = T
        }, C = function(n) {
            for (var r = 0; r < e.options.closeElClasses.length; r++) {
                if (t.hasClass(n, "pswp__" + e.options.closeElClasses[r])) {
                    return true
                }
            }
        }, k, L, A = 0, O = function() {
            clearTimeout(L);
            A = 0;
            if (d) {
                n.setIdle(false)
            }
        }, M = function(t) {
            t = t ? t : window.event;
            var r = t.relatedTarget || t.toElement;
            if (!r || r.nodeName === "HTML") {
                clearTimeout(L);
                L = setTimeout(function() {
                    n.setIdle(true)
                }, e.options.timeToIdleOutside)
            }
        }, _ = function(e) {
            if (m !== e) {
                t[(e ? "remove" : "add") + "Class"](v, "pswp__preloader--active");
                m = e
            }
        };
        var D = [{
            name: "caption",
            option: "captionEl",
            onInit: function(e) {
                u = e
            }
        }, {
            name: "share-modal",
            option: "shareEl",
            onInit: function(e) {
                c = e
            },
            onTap: function() {
                x()
            }
        }, {
            name: "button--share",
            option: "shareEl",
            onInit: function(e) {
                l = e
            },
            onTap: function() {
                x()
            }
        }, {
            name: "button--zoom",
            option: "zoomEl",
            onTap: e.toggleDesktopZoom
        }, {
            name: "counter",
            option: "counterEl",
            onInit: function(e) {
                f = e
            }
        }, {
            name: "button--close",
            option: "closeEl",
            onTap: e.close
        }, {
            name: "button--arrow--left",
            option: "arrowEl",
            onTap: e.prev
        }, {
            name: "button--arrow--right",
            option: "arrowEl",
            onTap: e.next
        }, {
            name: "button--fs",
            option: "fullscreenEl",
            onTap: function() {
                if (s.isFullscreen()) {
                    s.exit()
                } else {
                    s.enter()
                }
            }
        }, {
            name: "preloader",
            option: "preloaderEl",
            onInit: function(e) {
                v = e
            }
        }
        ];
        n.init = function() {
            t.extend(e.options, y, true);
            o = e.scrollWrap.children[1];
            var r = e.listen;
            r("onVerticalDrag", function(e) {
                if (i && e < .95) {
                    n.hideControls()
                } else if (!i && e >= .95) {
                    n.showControls()
                }
            });
            var f;
            r("onPinchClose", function(e) {
                if (i && e < .9) {
                    n.hideControls();
                    f = true
                } else if (f&&!i && e > .9) {
                    n.showControls()
                }
            });
            r("zoomGestureEnded", function() {
                f = false;
                if (f&&!i) {
                    n.showControls()
                }
            });
            r("beforeChange", n.update);
            r("doubleTap", function(t) {
                var n = e.currItem.initialZoomLevel;
                if (e.getZoomLevel() !== n) {
                    e.zoomTo(n, t, 333)
                } else {
                    e.zoomTo(e.currItem.doubleTapZoom, t, 333)
                }
            });
            if (e.options.timeToIdle) {
                r("mouseUsed", function() {
                    t.bind(document, "mousemove", O);
                    t.bind(document, "mouseout", M);
                    k = setInterval(function() {
                        A++;
                        if (A === 2) {
                            n.setIdle(true)
                        }
                    }, e.options.timeToIdle / 2)
                })
            }
            r("preventDragEvent", function(e, t, n) {
                var r = e.target || e.srcElement;
                if (r && r.className && e.type.indexOf("mouse")>-1 && (r.className.indexOf("__caption") > 0 || /(SMALL|STRONG|EM)/i.test(r.tagName))) {
                    n.prevent = false
                }
            });
            r("bindEvents", function() {
                t.bind(o, "pswpTap click", E);
                t.bind(e.scrollWrap, "pswpTap", n.onGlobalTap);
                if (!e.likelyTouchDevice) {
                    t.bind(e.scrollWrap, "mouseover", n.onMouseOver)
                }
            });
            r("unbindEvents", function() {
                if (!h) {
                    x()
                }
                if (k) {
                    clearInterval(k)
                }
                t.unbind(document, "mouseout", M);
                t.unbind(document, "mousemove", O);
                t.unbind(o, "pswpTap click", E);
                t.unbind(e.scrollWrap, "pswpTap", n.onGlobalTap);
                t.unbind(e.scrollWrap, "mouseover", n.onMouseOver);
                if (s) {
                    t.unbind(document, s.eventK, n.updateFullscreen);
                    if (s.isFullscreen()) {
                        y.hideAnimationDuration = 0;
                        s.exit()
                    }
                    s = null
                }
            });
            r("destroy", function() {
                if (e.options.captionEl) {
                    if (a) {
                        o.removeChild(a)
                    }
                    t.removeClass(u, "pswp__caption--empty")
                }
                if (c) {
                    c.children[0].onclick = null
                }
                t.removeClass(o, "pswp__ui--over-close");
                t.addClass(o, "pswp__ui--hidden");
                n.setIdle(false)
            });
            if (!e.options.showAnimationDuration) {
                t.removeClass(o, "pswp__ui--hidden")
            }
            r("initialZoomIn", function() {
                if (e.options.showAnimationDuration) {
                    t.removeClass(o, "pswp__ui--hidden")
                }
            });
            r("initialZoomOut", function() {
                t.addClass(o, "pswp__ui--hidden")
            });
            r("parseVerticalMargin", function(n) {
                var r = n.vGap;
                if (S()) {
                    var i = e.options.barsSize;
                    if (e.options.captionEl && i.bottom === "auto") {
                        if (!a) {
                            a = t.createEl("pswp__caption pswp__caption--fake");
                            a.appendChild(t.createEl("pswp__caption__center"));
                            o.insertBefore(a, u);
                            t.addClass(o, "pswp__ui--fit")
                        }
                        if (e.options.addCaptionHTMLFn(n, a, true)) {
                            var s = a.clientHeight;
                            r.bottom = parseInt(s, 10) || 44
                        } else {
                            r.bottom = i.top
                        }
                    } else {
                        r.bottom = i.bottom
                    }
                    r.top = i.top
                } else {
                    r.top = r.bottom = 0
                }
            });
            var p, d, v;
            var m = function(n) {
                var r = n.length;
                for (var i = 0; i < r; i++) {
                    p = n[i];
                    d = p.className;
                    for (var s = 0; s < D.length; s++) {
                        v = D[s];
                        if (d.indexOf("pswp__" + v.name)>-1) {
                            if (e.options[v.option]) {
                                t.removeClass(p, "pswp__element--disabled");
                                if (v.onInit) {
                                    v.onInit(p)
                                }
                            } else {
                                t.addClass(p, "pswp__element--disabled")
                            }
                        }
                    }
                }
            };
            m(o.children);
            m(o.children[0].children);
            if (e.options.shareEl && l && c) {
                h = true
            }
            if (e.options.fullscreenEl) {
                if (!s) {
                    s = n.getFullscreenAPI()
                }
                if (s) {
                    t.bind(document, s.eventK, n.updateFullscreen);
                    n.updateFullscreen();
                    t.addClass(e.template, "pswp--supports-fs")
                } else {
                    t.removeClass(e.template, "pswp--supports-fs")
                }
            }
            if (e.options.preloaderEl) {
                _(true);
                r("beforeChange", function() {
                    clearTimeout(g);
                    g = setTimeout(function() {
                        if (e.currItem && e.currItem.loading) {
                            if (!e.allowProgressiveImg() || e.currItem.img&&!e.currItem.img.naturalWidth) {
                                _(false)
                            }
                        } else {
                            _(true)
                        }
                    }, e.options.loadingIndicatorDelay)
                });
                r("imageLoadComplete", function(t, n) {
                    if (e.currItem === n) {
                        _(true)
                    }
                })
            }
        };
        n.setIdle = function(e) {
            d = e;
            t[(e ? "add" : "remove") + "Class"](o, "pswp__ui--idle")
        };
        n.update = function() {
            if (i && e.currItem) {
                n.updateIndexIndicator();
                if (e.options.captionEl) {
                    e.options.addCaptionHTMLFn(e.currItem, u);
                    if (!e.currItem.title) {
                        t.addClass(u, "pswp__caption--empty")
                    } else {
                        t.removeClass(u, "pswp__caption--empty")
                    }
                }
                r = true
            } else {
                r = false
            }
        };
        n.updateFullscreen = function() {
            t[(s.isFullscreen() ? "add" : "remove") + "Class"](e.template, "pswp--fs")
        };
        n.updateIndexIndicator = function() {
            if (e.options.counterEl) {
                f.innerHTML = e.getCurrentIndex() + 1 + e.options.indexIndicatorSep + e.options.getNumItemsFn()
            }
        };
        n.onGlobalTap = function(r) {
            r = r || window.event;
            var s = r.target || r.srcElement;
            if (b) {
                return
            }
            if (r.detail && r.detail.pointerType === "mouse") {
                if (C(s)) {
                    e.close()
                }
                if (t.hasClass(s, "pswp__img")) {
                    if (e.getZoomLevel() === 1 && e.getZoomLevel() <= e.currItem.fitRatio) {
                        e.close()
                    } else {
                        e.toggleDesktopZoom(r.detail.releasePoint)
                    }
                }
            } else {
                if (e.options.tapToToggleControls) {
                    if (i) {
                        n.hideControls()
                    } else {
                        n.showControls()
                    }
                }
                if (e.options.tapToClose && (t.hasClass(s, "pswp__img") || C(s))) {
                    e.close();
                    return
                }
            }
        };
        n.onMouseOver = function(e) {
            e = e || window.event;
            var n = e.target || e.srcElement;
            if (C(n)) {
                t.addClass(o, "pswp__ui--over-close")
            } else {
                t.removeClass(o, "pswp__ui--over-close")
            }
        };
        n.hideControls = function() {
            t.addClass(o, "pswp__ui--hidden");
            i = false
        };
        n.showControls = function() {
            i = true;
            if (!r) {
                n.update()
            }
            t.removeClass(o, "pswp__ui--hidden")
        };
        n.supportsFullscreen = function() {
            var e = document;
            return !!(e.exitFullscreen || e.mozCancelFullScreen || e.webkitExitFullscreen || e.msExitFullscreen)
        };
        n.getFullscreenAPI = function() {
            var t = document.documentElement, n, r = "fullscreenchange";
            if (t.requestFullscreen) {
                n = {
                    enterK: "requestFullscreen",
                    exitK: "exitFullscreen",
                    elementK: "fullscreenElement",
                    eventK: r
                }
            } else if (t.mozRequestFullScreen) {
                n = {
                    enterK: "mozRequestFullScreen",
                    exitK: "mozCancelFullScreen",
                    elementK: "mozFullScreenElement",
                    eventK: "moz" + r
                }
            } else if (t.webkitRequestFullscreen) {
                n = {
                    enterK: "webkitRequestFullscreen",
                    exitK: "webkitExitFullscreen",
                    elementK: "webkitFullscreenElement",
                    eventK: "webkit" + r
                }
            } else if (t.msRequestFullscreen) {
                n = {
                    enterK: "msRequestFullscreen",
                    exitK: "msExitFullscreen",
                    elementK: "msFullscreenElement",
                    eventK: "MSFullscreenChange"
                }
            }
            if (n) {
                n.enter = function() {
                    p = e.options.closeOnScroll;
                    e.options.closeOnScroll = false;
                    if (this.enterK === "webkitRequestFullscreen") {
                        e.template[this.enterK](Element.ALLOW_KEYBOARD_INPUT)
                    } else {
                        return e.template[this.enterK]()
                    }
                };
                n.exit = function() {
                    e.options.closeOnScroll = p;
                    return document[this.exitK]()
                };
                n.isFullscreen = function() {
                    return document[this.elementK]
                }
            }
            return n
        }
    };
    return e
})