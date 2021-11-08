/* Cheating, huh :) Purchase template if you need full version */
var ef = jQuery;
//ef.noConflict();
ef(document).foundation();
var body_ = ef("body"),
        page_ = ef("#ef-page"),
        head_ = ef("#ef-header"),
        page_head_ = ef("#ef-page-header"),
        full_slider = jQuery(".fireform-slider"),
        video_ = jQuery(".ef-video-bg"),
        overlay_ = ef(".ef-overlay").length ? ef("#ef-slider-overlay") : ef(),
        footer_ = ef("#ef-footer"),
        widgets_tab = ef("#ef-widgets-tab"),
        widgets = ef("#ef-widgets"),
        widgets_pane = ef("#ef-widgets-pane"),
        scrolls_ = body_.add(widgets_pane),
        full_page_class = "ef-fullwidth-page",
        fullpage_class = 'fullpage',
        home_class = "page-template-templateshome-template",
        blog_class = "page-template-templatesblog-template",
        portfolio_class = "page-template-templatesportfolio-template",
        fullscreen_class = "ef-fullscreen-mode",
        isotope_container = ef(".ef-isotope"),
        portfolio_filter = ef("#ef-filter"),
        finishedMsg_ = body_.hasClass(portfolio_class) ? "No more photos to load" : "No more posts to load",
        msgText_ = body_.hasClass(portfolio_class) ? "Loading the next set of photos" : "Loading the next set of posts",
        exifSlider = ef("#ef-exif-slider"),
        cForm = ef("#ef-contact-form"),
        nameFieldClass = ".ef-name",
        emailFieldClass = ".ef-email",
        messageFieldClass = ".ef-message",
        support_transitions = Modernizr.csstransitions ? true : false;
ef.fn.global_transition = support_transitions && css_engine ? ef.fn.transition : ef.fn.animate;
if (typeof slider_options !== 'undefined')
    ef.fn.slideshow_transition = (support_transitions && slider_options.css_engine) ? ef.fn.transition : ef.fn.animate;
var isMobile = Modernizr.touch || ef.browser.mobile || navigator.userAgent.match(/Windows Phone/) || navigator.userAgent.match(/Zune/),
        fullwidth_height = (function() {
            if ((body_.hasClass(full_page_class) && !body_.hasClass(home_class) && !body_.hasClass("ef-sticky-page")) && ef(window).width() >= 801) {
                page_.css({
                    minHeight: ef(window).innerHeight()
                });
                if (body_.hasClass("ef-gallery")) {
                    ef(".ef-featured-img").css({
                        height: ef(window).innerHeight() - parseInt(page_.css("padding-top"), false)
                    })
                }
            } else {
                page_.css({
                    minHeight: ""
                });
                ef(".ef-featured-img").css({
                    height: "auto"
                })
            }
        }),
        niceScroll_pos = (function() {
            if (!body_.hasClass(full_page_class) && (!ef('.' + fullpage_class).length || ef('.' + fullpage_class).hasClass('detail'))) {
                ef("#ascrail2000").css({
                    left: page_.outerWidth() + head_.outerWidth()
                })
            }
        }),
        delay_fn = (function() {
            var a = 0;
            return function(c, b) {
                clearTimeout(a);
                a = setTimeout(c, b)
            }
        })(),
        vertCenterGallery = (function() {
            ef(".ef-gal-img").each(function() {
                ef(this).css({
                    marginTop: (ef(this).parent().parent().height() - ef(this).outerHeight()) / 2
                })
            });
            if (ef(window).width() >= 801) {
                ef("#ef-gallery-wrapper").css({
                    marginTop: (ef(window).innerHeight() - ef("#ef-gallery-info-pane").outerHeight() - page_head_.height() - footer_.outerHeight() - ef("#ef-gallery-wrapper").height()) / 2
                })
            } else {
                ef("#ef-gallery-wrapper").css({
                    marginTop: "auto"
                })
            }
        }),
        resetFlexInterval = (function(a) {
            if (a.vars.slideshow) {
                clearInterval(a.animatedSlides);
                a.animatedSlides = null;
                a.animatedSlides = setInterval(a.animateSlides, a.vars.slideshowSpeed);
                ef("#progress-bar").finish()
            }
        }),
        getSlideCounter = (function(a, b) {
            return (a + 1) + " of " + b
        }),
        colWidth = (function() {
            var a = ef(window).innerWidth(),
                    b = 0,
                    c = 0;
            if (body_.hasClass("ef-classic-blog")) {
                c = 1
            } else {
                if (body_.hasClass(full_page_class)) {
                    if (a <= 1600 && a > 1260) {
                        c = 4
                    } else {
                        if (a <= 1260 && a > 970) {
                            c = 3
                        } else {
                            if (a <= 970 && a > 801) {
                                c = 2
                            } else {
                                if (a <= 801) {
                                    c = 1
                                } else {
                                    c = 5
                                }
                            }
                        }
                    }
                } else {
                    if (a <= 801) {
                        c = 1
                    } else {
                        if (a <= 970 && a > 801) {
                            c = 2
                        } else
                            c = 3
                    }
                }
            }
            b = Math.floor(isotope_container.width() / c);
            ef(".ef-post").each(function() {
                var d = b;
                ef(this).css({
                    width: d
                })
            });
            return b
        }),
        applyIsotope = (function() {
            isotope_container.isotope({
                resizable: false,
                transformsEnabled: body_.hasClass(blog_class) ? false : true,
                masonry: {
                    columnWidth: colWidth()
                }
            })
        });
ef.fn.percentAge = function(a) {
    ef(this).animate({
        width: "100%"
    }, a, function() {
        ef(this).css({
            width: "0px"
        })
    })
};
ef.fn.adjustImagePositioning = function() {
    var b = ef(this).parent().width(),
            a = ef(this).parent().height();
    ef(this).find("img").each(function() {
        var c = ef(this);
        var i = a / b,
                j = c.width(),
                f = c.height(),
                e = f / j,
                k, g, h, d;
        if (i > e || !slider_options.cover) {
            g = a;
            k = a / e
        } else {
            g = b * e;
            k = b
        }
        c.css({
            width: k,
            height: g,
            left: (b - k) / 2,
            top: (a - g) / 2
        })
    })
};
ef.fn.fadeShow = (function() {
    return ef(this).each(function() {
        var h = ef(this),
                c = h.find("li"),
                b = c.length - 1,
                g, f, k, l = c.find("img").height() / c.find("img").width(),
                m = (function() {
                    h.add(c).css({
                        height: Math.round(c.width() * l)
                    })
                }),
                n = 1000,
                j = (h.data("interval") && h.data("interval") !== "") ? h.data("interval") : 4000,
                e = (function(o) {
                    if (h.is(":visible") && f === true) {
                        m();
                        applyIsotope()
                    }
                    f = false;
                    c.css({
                        zIndex: ""
                    }).eq(o).css({
                        display: "block",
                        zIndex: "1",
                        opacity: "0"
                    }).global_transition({
                        opacity: "1"
                    }, n, function() {
                        k = o === 0 ? c.eq(b) : ef(this).prev();
                        k.css({
                            display: "none"
                        })
                    });
                    c.removeClass("ef-active-slide").eq(o).addClass("ef-active-slide")
                }),
                a = (function() {
                    if (h.is(":visible")) {
                        g = h.find(".ef-active-slide").index();
                        g = g === b ? 0 : g + 1;
                        e(g)
                    }
                }),
                i = (function() {
                    setInterval(function() {
                        a()
                    }, j)
                }),
                d = (function() {
                    clearInterval(i);
                    i = setInterval(function() {
                        a()
                    }, j)
                });
        ef(window).on("smartresize orientationchange", function() {
            m();
            f = true
        });
        c.first().addClass("ef-active-slide");
        m();
        c.css({
            position: "absolute"
        });
        d()
    })
});
ef.fn.img_loaded = function() {
    var a = ef(this);
    ef(this).imagesLoaded(function() {
        a.find(".ef-preloader").global_transition({
            opacity: "0"
        }, 800, function() {
            ef(this).remove()
        })
    })
};
var buildStructure = (function() {
    var a = (function() {
        ef("#ef-copyrights").prepend('<div id="ef-slider-controls"><div class="ef-slider-ctrl-inner" style="display: none;"><a id="prevslide" class="icn-ef"></a><div id="slidecounter"></div><a id="nextslide" class="icn-ef"></a></div></div>')
    });
    if (body_.hasClass("fireform-slider")) {
        ef("#ef-header").after('<div class="fireform-slider-wrapper"></div>');
        if (!body_.hasClass(full_page_class) && typeof slider_options !== 'undefined') {
            ef("#ef-page-controls").append('<a href="#" id="ef-tray-button" class="icn-ef disabled"><span id="progress-back"><span id="progress-bar"></span></span></a>');
            if (typeof slider_options !== 'undefined' && slider_options.slides.length > 1) {
                a()
            }
        }
        if (body_.hasClass(home_class) && body_.hasClass(full_page_class)) {
            if (typeof slider_options !== 'undefined' && slider_options.slides.length > 1) {
                a()
            }
        }
    } else {
        if (video_.length) {
            ef("#ef-page-controls").append('<a href="#" id="ef-tray-button" class="icn-ef disabled"><span id="progress-back"><span id="progress-bar"></span></span></a>')
        }
    }
    if (body_.hasClass("fireform-slider") && !body_.hasClass("ef-video-bg")) {
        ef(".fireform-slider-wrapper").html('<div class="fireform-slider-inner"><ul class="slides"></ul></div>');
        ef('<div id="ef-thumb-list"><div id="ef-thumb-list-inner"><ul class="slides"></ul></div></div>').insertAfter(".fireform-slider-wrapper");
        if (typeof slider_options !== 'undefined') {
            var delay = false;
            ef.each(slider_options.slides, function(e) {
                //process1
                var b, c;
                if (typeof (slider_options.slides[e].image) !== "undefined") {
                    var f = isMobile && ef(window).width() <= 1025 && typeof (slider_options.slides[e].mobile_image) !== "undefined" ? slider_options.slides[e].mobile_image : slider_options.slides[e].image,
                            d = slider_options.slides[e].mobile_image,
                            g = typeof (slider_options.slides[e].thumb) !== "undefined" ? slider_options.slides[e].thumb : f;
                    if (e == 0) {
                        b = '<li class="ef-slide"><img src="' + f + '" alt="" /></li>';
                        c = '<li class="ef-thumb" image-src="' + g + '"></li>';
                    } else {
                        delay = true;
                        b = '<li class="ef-slide" image-src="' + f + '"></li>';
                        c = '<li class="ef-thumb" image-src="' + g + '"></li>';
                    }
                }
                ef(".fireform-slider-inner .slides").append(b);
                ef("#ef-thumb-list-inner .slides").append(c);
                e++
            });
            if (delay) {
                ef(document).ready(function() {
                    setTimeout(function() {
                        flexLazyLoad(0);
                    }, 2000);
                });
            }
        }
    }
});
fullwidth_height();
var play = false,
        cycle, slideSpeed = 4000,
        keycodes = new Array(37, 39),
        runSBslideshow = (function() {
            cycle = setTimeout(function() {
                Shadowbox.next()
            }, slideSpeed);
            ef("#sb-progress").find("span").finish().css({
                width: "0"
            }).animate({
                width: "100%"
            }, slideSpeed);
            play = true
        }),
        stopSlideshow = (function() {
            clearTimeout(cycle);
            ef("#sb-progress").find("span").finish().css({
                width: "0"
            });
            ef("#sb-info-inner").removeClass("sb-playing");
            play = false
        });
Shadowbox.init({
    overlayOpacity: 0.85,
    viewportPadding: 20,
    continuous: true,
    modal: false,
    enableKeys: true,
    onOpen: function() {
        ef('<div id="sb-custom-close">&times;</div>').bind("click", function() {
            Shadowbox.close()
        }).appendTo("#sb-container");
        var a = ef("#sb-title").clone();
        ef("#sb-title").remove();
        a.prependTo("#sb-info");
        ef('<div id="sb-custom-prev"></div><div id="sb-custom-next"></div><div id="sb-custom-play"></div>').appendTo("#sb-info-inner");
        ef('<div id="sb-progress"><span></span></div>').appendTo("#sb-info");
        ef("#sb-custom-prev").bind("click", function() {
            Shadowbox.previous()
        });
        ef("#sb-custom-next").bind("click", function() {
            Shadowbox.next()
        });
        ef("#sb-custom-play").bind("click", function() {
            _this = ef(this);
            if (play === false) {
                runSBslideshow();
                _this.parent().addClass("sb-playing");
                ef(document).bind("keydown", function(b) {
                    if (ef.inArray(b.which, keycodes) > -1) {
                        stopSlideshow()
                    }
                })
            } else {
                stopSlideshow()
            }
        });
        ef("#sb-title, #sb-custom-close, #sb-info-inner").css({
            display: "block"
        })
    },
    onFinish: function() {
        ef("#sb-container").addClass("sb-opened");
        if (play === true) {
            runSBslideshow()
        }
    },
    onClose: function() {
        stopSlideshow();
        ef("#sb-container").removeClass("sb-opened");
        ef("#sb-custom-prev, #sb-progress, #sb-custom-next, #sb-custom-play, #sb-custom-close").remove();
        ef("#sb-custom-close, #sb-info-inner, #sb-title").css({
            display: "none"
        })
    },
    displayNav: false
});
ef(document).ready(function() {
    if (!Modernizr.svg) {
        ef('img[src*="svg"]').attr("src", function() {
            return ef(this).attr("src").replace(".svg", ".png")
        })
    }
    ef("a[data-sbrel]").each(function() {
        ef(this).attr("rel", ef(this).data("sbrel"))
    });
    Shadowbox.setup(".ef-lightbox", {
        gallery: portfolio_group
    });
    buildStructure();
    var t = ef("#ef-tray-button");
    ef(".ef-slider-holder, .ef-proj-img").img_loaded();
    var g = (function() {
        t.removeClass("disabled");
        body_.append('<div id="ef-thumb-list" style="height: 0;"></div>');
        ef("#big-video-wrap").css({
            display: "block",
            opacity: "0"
        }).global_transition({
            opacity: "1"
        }, 1000);
        k()
    });
    if (video_.length && (!body_.hasClass(full_page_class) || body_.hasClass(home_class))) {
        var v = typeof (vids.description) !== "undefined" ? vids.description : "top-left",
                f = typeof (vids.position) !== "undefined" ? vids.position : "",
                k = (function() {
                    ef("#slide_desc").addClass("ef-" + f).html(v).css({
                        display: "block",
                        opacity: "0"
                    }).global_transition({
                        opacity: "1"
                    }, 1000)
                });
        if (Modernizr.video && !(isMobile || ef.browser.opera)) {
            var c = vids.mp4V,
                    m = Modernizr.video.webm && typeof (vids.webmV) !== "undefined" ? vids.webmV : "",
                    e = new ef.BigVideo({
                        useFlashForFirefox: false
                    });
            e.init();
            e.show(c, {
                altSource: m,
                ambient: true
            });
            var s = e.getPlayer();
            s.on("loadeddata", g)
        } else {
            if (typeof (vids.imageV) !== "undefined") {
                ef("#ef-header").after('<div class="fireform-slider-wrapper"></div>');
                body_.addClass("fireform-slider");
                var o = ef(".fireform-slider-wrapper");
                o.html('<div class="fireform-slider-inner"><img src="' + vids.imageV + '" alt="" /></div>');
                o.imagesLoaded(function() {
                    ef(".fireform-slider-inner").css({
                        visibility: "visible",
                        opacity: "0",
                        overflow: "hidden"
                    }).global_transition({
                        opacity: "1"
                    }, 1000).adjustImagePositioning();
                    g()
                })
            }
        }
    }
    if (!(isMobile)) {
        body_.niceScroll({
            cursorcolor: main_color_,
            cursorwidth: "10px",
            cursorborder: "none",
            cursorborderradius: "0",
            autohidemode: body_.hasClass(full_page_class) ? true : false,
            background: body_.hasClass(full_page_class) ? "rgba(0,0,0,0.2)" : "rgba(255,255,255,0.4)"
        });
        body_.getNiceScroll().hide()
    }
    var l = (function() {
        if (Modernizr.mq("only screen and (min-width: 801px)")) {
            widgets.css({
                maxHeight: ef(window).innerHeight() - page_head_.height() - footer_.height()
            })
        } else {
            widgets.css({
                maxHeight: "280px"
            })
        }
    });
    l();
    if (widgets_pane.length) {
        widgets_pane.global_transition({
            y: -widgets_pane.outerHeight()
        }, 1);
        if (!isMobile) {
            widgets.niceScroll({
                cursorcolor: main_color_,
                cursorwidth: "10px",
                cursorborder: "none",
                cursorborderradius: "0",
                autohidemode: true,
                background: "rgba(255,255,255,0.2)"
            }).hide()
        }
    }
    widgets_tab.click(function(d) {
        ef(this).toggleClass("ef-show-widgets");
        if (ef(this).hasClass("ef-show-widgets")) {
            widgets_pane.css({
                display: "block"
            }).global_transition({
                y: "0px"
            }, 400, "easeOutCubic", function() {
                ef(this).getNiceScroll().show();
                widgets.addClass("w-opened")
            })
        } else {
            widgets.removeClass("w-opened");
            widgets_pane.global_transition({
                y: -widgets_pane.outerHeight()
            }, 400, "easeOutCubic", function() {
                ef(this).css({
                    display: "none"
                })
            }).getNiceScroll().hide()
        }
        d.preventDefault()
    });
    ef("html").click(function(d) {
        if ((ef(d.target).closest("#ef-page-header *, #sb-container *").length === 0) && widgets_tab.hasClass("ef-show-widgets")) {
            widgets_tab.click()
        }
    });
    if (!body_.hasClass(full_page_class)) {
        var q = 500;
        t.click(function() {
            var d = ef(this);
            if (support_transitions && css_engine) {
                if (!body_.hasClass(fullscreen_class)) {
                    d.addClass("disabled");
                    body_.css({
                        height: "100%"
                    }).getNiceScroll().hide();
                    footer_.transition({
                        y: footer_.height(),
                        duration: q,
                        easing: "easeOutCubic",
                        complete: function() {
                            ef(this).css({
                                display: "none"
                            })
                        }
                    });
                    page_head_.transition({
                        opacity: "0",
                        left: body_.hasClass(home_class) ? "" : "-150px",
                        y: -page_head_.outerHeight()
                    });
                    page_.css({
                        maxHeight: "100%",
                        overflow: "hidden"
                    }).transition({
                        y: -ef(window).innerHeight(),
                        x: "-150px",
                        opacity: "0",
                        duration: q,
                        easing: "easeOutCubic",
                        complete: function() {
                            if (widgets_tab.hasClass("ef-show-widgets")) {
                                widgets_tab.click()
                            }
                            page_.css({
                                display: "none"
                            });
                            body_.addClass(fullscreen_class);
                            head_.transition({
                                y: -head_.height(),
                                x: "-150px",
                                opacity: "0",
                                duration: q,
                                easing: "easeOutCubic",
                                complete: function() {
                                    ef(this).css({
                                        display: "none"
                                    });
                                    ef("#ef-thumb-list").css({
                                        visibility: "visible"
                                    }).transition({
                                        y: -ef("#ef-thumb-list").outerHeight(),
                                        duration: q,
                                        easing: "easeOutCubic",
                                        complete: function() {
                                            overlay_.transition({
                                                opacity: "0",
                                                complete: function() {
                                                    ef(this).css({
                                                        display: "none"
                                                    })
                                                }
                                            });
                                            page_head_.css({
                                                left: "0px"
                                            }).transition({
                                                x: "0px",
                                                y: "0px",
                                                opacity: "1"
                                            });
                                            page_.transition({
                                                duration: q,
                                                complete: function() {
                                                    d.removeClass("disabled");
                                                    if (full_slider.length) {
                                                        h.parent().css({
                                                            zIndex: "auto"
                                                        })
                                                    }
                                                }
                                            })
                                        }
                                    })
                                }
                            })
                        }
                    })
                } else {
                    d.addClass("disabled");
                    if (full_slider.length) {
                        h.parent().css({
                            zIndex: ""
                        })
                    }
                    page_head_.transition({
                        y: -page_head_.outerHeight(),
                        opacity: "0",
                        complete: function() {
                            body_.removeClass(fullscreen_class);
                            ef(this).css({
                                left: ""
                            });
                            ef("#ef-thumb-list").transition({
                                y: "0px",
                                duration: q,
                                easing: "easeOutCubic",
                                complete: function() {
                                    ef(this).css({
                                        visibility: "hidden"
                                    });
                                    head_.css({
                                        display: "block"
                                    }).transition({
                                        y: "0px",
                                        x: "0px",
                                        opacity: "1",
                                        duration: q,
                                        easing: "easeOutCubic",
                                        complete: function() {
                                            footer_.css({
                                                display: "block"
                                            }).transition({
                                                y: "0px",
                                                duration: q,
                                                easing: "easeOutCubic"
                                            });
                                            page_.css({
                                                display: "block"
                                            }).transition({
                                                y: "0px",
                                                x: "0px",
                                                opacity: "1",
                                                duration: q,
                                                easing: "easeOutCubic",
                                                complete: function() {
                                                    page_head_.transition({
                                                        y: "0px",
                                                        opacity: "1"
                                                    });
                                                    page_.css({
                                                        overflow: "visible",
                                                        maxHeight: "none"
                                                    });
                                                    body_.css({
                                                        height: "auto"
                                                    }).getNiceScroll().show().resize();
                                                    overlay_.css({
                                                        display: "block"
                                                    }).transition({
                                                        opacity: "1"
                                                    });
                                                    d.removeClass("disabled")
                                                }
                                            })
                                        }
                                    })
                                }
                            })
                        }
                    })
                }
            } else {
                if (!body_.hasClass(fullscreen_class)) {
                    d.addClass("disabled");
                    body_.css({
                        height: "100%"
                    }).getNiceScroll().hide();
                    footer_.animate({
                        bottom: -footer_.height()
                    }, {
                        duration: q,
                        specialEasing: {
                            bottom: "easeOutCubic"
                        },
                        complete: function() {
                            ef(this).css({
                                display: "none"
                            })
                        }
                    });
                    page_head_.animate({
                        opacity: "0",
                        top: -page_head_.outerHeight()
                    }, q, "easeOutCubic");
                    page_.css({
                        maxHeight: "100%",
                        overflow: "hidden"
                    }).animate({
                        top: "-100%",
                        opacity: "0",
                        left: "-150px"
                    }, {
                        duration: q,
                        specialEasing: {
                            top: "easeInCubic",
                            opacity: "easeOutCubic",
                            left: "easeInCubic"
                        },
                        complete: function() {
                            if (widgets_tab.hasClass("ef-show-widgets")) {
                                widgets_tab.click()
                            }
                            body_.addClass(fullscreen_class);
                            head_.animate({
                                top: -head_.height(),
                                opacity: "0",
                                left: "-150px"
                            }, {
                                duration: q,
                                specialEasing: {
                                    top: "easeInCubic",
                                    opacity: "easeOutCubic",
                                    left: "easeInCubic"
                                },
                                complete: function() {
                                    ef(this).css({
                                        display: "none"
                                    });
                                    ef("#ef-thumb-list").css({
                                        visibility: "visible"
                                    }).animate({
                                        bottom: "0px"
                                    }, {
                                        duration: q,
                                        specialEasing: {
                                            bottom: "easeOutCubic"
                                        },
                                        complete: function() {
                                            overlay_.fadeOut();
                                            page_head_.css({
                                                left: "0px"
                                            }).animate({
                                                opacity: "1",
                                                top: "0px"
                                            });
                                            page_.animate({
                                                opacity: "1"
                                            }, q);
                                            d.removeClass("disabled");
                                            if (full_slider.length) {
                                                h.parent().css({
                                                    zIndex: "auto"
                                                })
                                            }
                                        }
                                    })
                                }
                            })
                        }
                    })
                } else {
                    d.addClass("disabled");
                    if (full_slider.length) {
                        h.parent().css({
                            zIndex: ""
                        })
                    }
                    page_.css({
                        opacity: "0"
                    });
                    page_head_.animate({
                        opacity: "0",
                        top: -page_head_.outerHeight()
                    }, q, "easeInCubic");
                    ef("#ef-thumb-list").animate({
                        bottom: -ef("#ef-thumb-list").outerHeight()
                    }, {
                        duration: q,
                        specialEasing: {
                            bottom: "easeInCubic"
                        },
                        complete: function() {
                            body_.removeClass(fullscreen_class);
                            ef(this).css({
                                visibility: "hidden"
                            });
                            head_.css({
                                display: "block"
                            }).animate({
                                top: "0px",
                                opacity: "1",
                                left: "0px"
                            }, {
                                duration: q,
                                specialEasing: {
                                    top: "easeOutCubic",
                                    opacity: "easeInCubic",
                                    left: "easeOutCubic"
                                },
                                complete: function() {
                                    footer_.css({
                                        display: "block"
                                    }).animate({
                                        bottom: "0px"
                                    }, {
                                        duration: q,
                                        specialEasing: {
                                            bottom: "easeOutCubic",
                                        }
                                    });
                                    page_.animate({
                                        top: "0px",
                                        opacity: "1",
                                        left: "0px"
                                    }, {
                                        duration: q,
                                        specialEasing: {
                                            top: "easeOutCubic",
                                            opacity: "easeInCubic",
                                            left: "easeOutCubic"
                                        },
                                        complete: function() {
                                            page_head_.css({
                                                left: ""
                                            }).animate({
                                                opacity: "1",
                                                top: "0px"
                                            });
                                            page_.css({
                                                overflow: "visible",
                                                maxHeight: "none"
                                            });
                                            body_.css({
                                                height: "auto"
                                            }).getNiceScroll().show().resize();
                                            overlay_.fadeIn();
                                            d.removeClass("disabled")
                                        }
                                    })
                                }
                            })
                        }
                    })
                }
            }
            return false
        })
    }
    var r = (function() {
        if (ef("#ef-filter").width() > page_head_.width() - (ef("#ef-page-title").find("span").width() + ef("#ef-page-controls").width() + 50)) {
            ef("#ef-filter").hide();
            ef(".ef-select-menu").show()
        } else {
            ef("#ef-filter").show();
            ef(".ef-select-menu").hide()
        }
    });
    if (isotope_container.length) {
        isotope_container.imagesLoaded(function() {
            if (isotope_container.hasClass("ef-portfolio")) {
                ef(".ef-fadeshow").fadeShow();
                if (ef("#ef-filter").length) {
                    ef("#ef-filter").mobileMenu({
                        defaultText: "Choose a category...",
                        className: "ef-select-menu",
                        subMenuClass: "dropdown",
                        appendMenu: "#ef-select-wrapper"
                    }).parent("#ef-select-wrapper").show();
                    r()
                }
                isotope_container.children(".ef-post").each(function(d) {
                    var x = ef(this);
                    setTimeout(function() {
                        x.addClass("ef-show-item")
                    }, 100 * d)
                });
                ef(".ef-select-menu").change(function() {
                    var d = ef(this).find("option:selected").attr("data-filter");
                    isotope_container.isotope({
                        filter: d
                    }, function() {
                        ef(".ef-post").each(function() {
                            if (!ef(this).hasClass("isotope-hidden")) {
                                ef(this).find(".ef-lightbox").addClass("ef-visible-item")
                            } else {
                                ef(this).find(".ef-lightbox").removeClass("ef-visible-item")
                            }
                        });
                        Shadowbox.clearCache();
                        Shadowbox.setup(".ef-visible-item", {
                            gallery: portfolio_group
                        })
                    });
                    ef(window).trigger("resize");
                    return false
                }).change();
                ef(".ef-select-menu").find("option").each(function() {
                    if (ef(this).attr("data-filter") !== "*") {
                        var d = ef(this).attr("data-filter").slice(1);
                        if (!ef(".ef-post").hasClass(d)) {
                            ef(this).hide().attr("disabled", true).addClass("ef-no-posts")
                        }
                    }
                })
            }
            applyIsotope()
        });
        portfolio_filter.find("a").click(function() {
            var d = ef(this).attr("data-filter");
            isotope_container.isotope({
                filter: d
            }, function() {
                ef(".ef-post").each(function() {
                    if (!ef(this).hasClass("isotope-hidden")) {
                        ef(this).find(".ef-lightbox").addClass("ef-visible-item")
                    } else {
                        ef(this).find(".ef-lightbox").removeClass("ef-visible-item")
                    }
                });
                Shadowbox.clearCache();
                Shadowbox.setup(".ef-visible-item", {
                    gallery: portfolio_group
                })
            });
            ef(window).trigger("resize");
            portfolio_filter.find("a").parent().removeClass("ef-currentClass");
            ef(this).parent().addClass("ef-currentClass");
            return false
        });
        portfolio_filter.find("a").each(function() {
            if (!ef(this).parent("li").hasClass("ef-all-works")) {
                var d = ef(this).attr("data-filter").slice(1);
                if (!ef(".ef-post").hasClass(d)) {
                    ef(this).parent("li").hide().addClass("ef-no-posts")
                }
            }
        });
        isotope_container.infinitescroll({
            localMode: "true",
            navSelector: "#ef-page_nav",
            nextSelector: "#ef-page_nav a",
            itemSelector: ".ef-post",
            loading: {
                selector: "body",
                finishedMsg: finishedMsg_,
                msgText: msgText_,
                img: "assets/progress.gif"
            }
        }, function(d) {
            var x = ef(d);
            x.imagesLoaded(function() {
                ef(window).trigger("resize");
                isotope_container.isotope("appended", x, function() {
                    var y = ef(x);
                    ef(".ef-proj-img").img_loaded();
                    ef("a[data-sbrel]").each(function() {
                        ef(this).attr("rel", ef(this).data("sbrel"))
                    });
                    Shadowbox.setup(".ef-lightbox", {
                        gallery: portfolio_group
                    });
                    if (portfolio_filter.length) {
                        portfolio_filter.find("li").each(function() {
                            var A = ef(this),
                                    z = A.children("a").attr("data-filter").slice(1);
                            if (ef(".ef-post").hasClass(z)) {
                                A.show().removeClass("ef-no-posts")
                            }
                        });
                        ef(".ef-select-menu").find("option").each(function() {
                            var A = ef(this),
                                    z = A.attr("data-filter").slice(1);
                            if (ef(".ef-post").hasClass(z)) {
                                A.show().attr("disabled", false).removeClass("ef-no-posts")
                            }
                        });
                        ef(".ef-post").addClass("ef-show-item");
                        y.find(".ef-fadeshow").fadeShow()
                    }
                })
            })
        })
    }
    if (body_.hasClass("fireform-slider") && !body_.hasClass("ef-video-bg")) {
        var h = ef(".fireform-slider-inner"),
                a = ef("#ef-thumb-list-inner"),
                w;
        if (typeof slider_options !== 'undefined' && slider_options.slides.length <= 1) {
            ef("#ef-thumb-list").css({
                display: "none"
            })
        }
        var i = 0;
        if (typeof slider_options !== 'undefined') {
            h.imagesLoaded(function() {
                i++;
                ef(window).on("smartresize", function() {
                    h.find("img").css({
                        width: "",
                        height: ""
                    });
                    h.adjustImagePositioning();
                    j()
                });
                h.flexslider({
                    animation: slider_options.transition,
                    slideshow: slider_options.auto,
                    slideshowSpeed: slider_options.slide_interval,
                    animationSpeed: slider_options.transition_speed,
                    useCSS: slider_options.css_engine,
                    controlNav: false,
                    directionNav: false,
                    keyboard: true,
                    multipleKeyboard: true,
                    animationLoop: true,
                    pauseOnAction: false,
                    reverse: slider_options.reverse,
                    start: function(d) {
                        w = d;
                        w.adjustImagePositioning();
                        w.css({
                            visibility: "visible",
                            opacity: "0"
                        }).slideshow_transition({
                            opacity: "1"
                        }, slider_options.slide_interval * 0.3);
                        t.removeClass("disabled");
                        niceScroll_pos();
                        u(w.currentSlide);
                        ef(".ef-slider-ctrl-inner").css({
                            display: ""
                        });
                        ef("#slidecounter").html(getSlideCounter(w.currentSlide, w.count));
                        a.find(".ef-thumb").first().addClass("flex-active-slide");
                        if (w.vars.slideshow) {
                            ef("#progress-bar").percentAge(w.vars.slideshowSpeed)
                        }
                    },
                    before: function(d) {
                        if (isMobile) {
                            ef("#slide_desc").css({
                                opacity: "0"
                            })
                        } else {
                            ef("#slide_desc").slideshow_transition({
                                opacity: "0"
                            })
                        }
                    },
                    after: function(d) {
                        if (d.vars.slideshow) {
                            ef("#progress-bar").percentAge(d.vars.slideshowSpeed)
                        }
                        u(d.currentSlide);
                        ef("#slidecounter").html(getSlideCounter(d.currentSlide, d.count));
                        a.find(".ef-thumb").removeClass("flex-active-slide").eq(d.data("flexslider").currentSlide).addClass("flex-active-slide");
                        if (a.data("flexslider").pagingCount > 1) {
                            a.data("flexslider").flexAnimate(d.currentSlide)
                        }
                        if (!d.playing && slider_options.auto) {
                            ef("#progress-bar").finish();
                            d.play()
                        }
                    }
                });
            });
        }
        ef("#prevslide").on("click", function(d) {
            d.preventDefault();
            _data = h.data("flexslider");
            _data.flexAnimate(_data.getTarget("prev"));
            resetFlexInterval(_data)
        });
        ef("#nextslide").on("click", function(d) {
            d.preventDefault();
            _data = h.data("flexslider");
            _data.flexAnimate(_data.getTarget("next"));
            resetFlexInterval(_data)
        });
        var j = (function() {
            w = a.data("flexslider");
            if (a.data("flexslider").pagingCount == 1) {
                w.find(".ef-thumb").first().css({
                    marginLeft: (w.width() - w.vars.itemWidth * w.count) / 2
                })
            } else {
                w.find(".ef-thumb").first().css({
                    marginLeft: w.vars.itemMargin
                })
            }
        });
        if (typeof slider_options !== 'undefined') {
            a.flexslider({
                animation: "slide",
                animationLoop: false,
                controlNav: false,
                directionNav: false,
                pauseOnAction: false,
                useCSS: slider_options.css_engine,
                itemWidth: 109,
                itemMargin: 2,
                keyboard: false,
                start: function(d) {
                    j()
                }
            });
            a.find(".ef-thumb").on("click", function() {
                _data = h.data("flexslider");
                _data.flexAnimate(ef(this).index());
                resetFlexInterval(_data)
            });
        }
    }
    var u = (function(B) {
        var d = slider_options.slides[B].position,
                x = ef("#slide_desc");
        if (x.length) {
            if (slider_options.slides[B].description) {
                if (typeof d !== "undefined") {
                    if (d == "top-right") {
                        x.removeClass().addClass("ef-top-right")
                    } else {
                        if (d == "bottom-right") {
                            x.removeClass().addClass("ef-bottom-right")
                        } else {
                            if (d == "bottom-left") {
                                x.removeClass().addClass("ef-bottom-left")
                            } else {
                                x.removeClass().addClass("ef-top-left")
                            }
                        }
                    }
                } else {
                    x.removeClass().addClass("ef-top-left")
                }
                x.html(slider_options.slides[B].description).css({
                    display: "block"
                });
                var y, C, A = h.parent().width() * 0.2,
                        z = slider_options.transition_speed * 0.5;
                if (!slider_options.reverse) {
                    y = -A + "px";
                    C = A + "px"
                } else {
                    y = A + "px";
                    C = -A + "px"
                }
                d = slider_options.transition == "fade" ? "" : d;
                if (support_transitions && slider_options.css_engine) {
                    x.css({
                        transform: "translate(" + C + ", 0)"
                    });
                    x.transition({
                        x: "0px",
                        opacity: "1"
                    }, z, slider_options.caption_easing)
                } else {
                    if (d == "top-right" || d == "bottom-right") {
                        x.css({
                            marginRight: y
                        });
                        x.animate({
                            marginRight: "0px",
                            opacity: "1"
                        }, z, slider_options.caption_easing)
                    } else {
                        if (d == "top-left" || d == "bottom-left") {
                            x.css({
                                marginLeft: C
                            });
                            x.animate({
                                marginLeft: "0px",
                                opacity: "1"
                            }, z, slider_options.caption_easing)
                        }
                    }
                }
            } else {
                x.slideshow_transition({
                    opacity: "0"
                }, slider_options.transition_speed, slider_options.caption_easing, function() {
                    ef(this).html("")
                })
            }
        }
    });
    if (exifSlider.length) {
        exifSlider.flexslider({
            slideshow: false,
            animationLoop: false,
            controlNav: false,
            directionNav: false,
            pauseOnAction: false,
            touch: false
        })
    }
    if (postslider.length) {
        postslider.imagesLoaded(function() {
            postslider.flexslider({
                animation: postslider_options.transition,
                slideshowSpeed: postslider_options.slide_interval,
                animationSpeed: postslider_options.transition_speed,
                slideshow: postslider_options.autoplay,
                animationLoop: true,
                controlNav: false,
                directionNav: false,
                pauseOnAction: false,
                start: function(d) {
                    d.find("img").css({
                        display: "block"
                    });
                    ef(".ef-post-slider-counter").html(getSlideCounter(d.currentSlide, d.count));
                    ef(".ef-post-slider-ctrls").css({
                        display: "block"
                    }).global_transition({
                        bottom: "20px"
                    })
                },
                after: function(d) {
                    ef(".ef-post-slider-counter").html(getSlideCounter(d.currentSlide, d.count));
                    if (exifSlider.length) {
                        exifSlider.data("flexslider").flexAnimate(d.currentSlide)
                    }
                }
            });
            ef(".post-slider-prev").on("click", function(d) {
                d.preventDefault();
                postslider.data("flexslider").flexAnimate(postslider.data("flexslider").getTarget("prev"))
            });
            ef(".post-slider-next").on("click", function(d) {
                d.preventDefault();
                postslider.data("flexslider").flexAnimate(postslider.data("flexslider").getTarget("next"))
            })
        })
    }
    var b = window.location.pathname,
            n = parseInt(b.substring(b.lastIndexOf("/") + 1).replace(/[A-Za-z$-]/g, ""), false) + 1;
    if (gallery.length) {
        gallery.imagesLoaded(function() {
            gallery.flexslider({
                animation: "slide",
                slideshow: false,
                slideshowSpeed: 4000,
                animationSpeed: gallery_options.transition_speed,
                animationLoop: false,
                controlNav: false,
                directionNav: gallery_options.navigation,
                prevText: gallery_options.prevText,
                nextText: gallery_options.nextText,
                pauseOnAction: false,
                startAt: gallery_options.startAt,
                keyboard: true,
                start: function(d) {
                    ef("#ef-gallery-info-pane").css({
                        display: "block"
                    });
                    vertCenterGallery();
                    d.resize().find("img").each(function() {
                        ef(this).attr("data-title", ef(this).attr("title")).removeAttr("title")
                    });
                    gtitle = d.slides.eq(d.currentSlide).find("img").attr("data-title");
                    ef("#ef-gallery-title").html(gtitle ? gtitle : "");
                    d.css({
                        visibility: "visible",
                        opacity: "0"
                    }).global_transition({
                        opacity: "1"
                    }, 1000);
                    ef("#ef-counter").html("[ " + getSlideCounter(d.currentSlide, d.count) + " ]")
                },
                before: function(d) {
                    d.find("a").attr("disabled", "disabled").find("img").addClass("speedup")
                },
                after: function(d) {
                    gtitle = d.slides.eq(d.currentSlide).find("a").removeAttr("disabled").find("img").attr("data-title");
                    ef("#ef-gallery-title").html(gtitle ? gtitle : "");
                    d.find("img").removeClass("speedup");
                    ef("#ef-counter").html("[ " + getSlideCounter(d.currentSlide, d.count) + " ]")
                },
                end: function(d) {
                    if (n <= gallery_options.ajaxPages.pages && gallery_options.ajaxPages) {
                        ef(".pace").css({
                            display: "block"
                        });
                        ef.ajax({
                            url: gallery_options.ajaxPages.pageName + n + ".html",
                            cache: false,
                            type: "GET",
                            success: function(y) {
                                var A = ef(y).find(".ef-slide"),
                                        x = A.length,
                                        z = d.count;
                                A.css({
                                    opacity: "0"
                                }).imagesLoaded(function() {
                                    d.addSlide(A);
                                    d.count = z + x;
                                    d.last = d.count - 1;
                                    d.find("img").each(function() {
                                        ef(this).attr("data-title", ef(this).attr("title")).removeAttr("title")
                                    });
                                    ef(window).trigger("resize");
                                    A.delay(500).animate({
                                        opacity: "1"
                                    }, 1000, function() {
                                        ef(".pace").css({
                                            display: "none"
                                        })
                                    });
                                    gallery.data("flexslider").slides.on("click", function() {
                                        gallery.data("flexslider").flexAnimate(ef(this).index())
                                    })
                                })
                            }
                        })
                    }
                    n++
                }
            });
            gallery.data("flexslider").slides.on("click", function() {
                gallery.data("flexslider").flexAnimate(ef(this).index())
            })
        })
    }
    if (googmap.length) {
        googmap.goMap({
            maptype: "ROADMAP",
            zoom: zoomLevel,
            scaleControl: false,
            navigationControl: false,
            scrollwheel: false,
            mapTypeControl: false,
            mapTypeControlOptions: {
                position: "RIGHT",
                style: "DROPDOWN_MENU"
            },
            markers: map_markers,
            hideByClick: true,
            addMarker: false,
            html: {
                popup: false
            }
        });
        ef(".ef-marker").click(function() {
            var x = parseInt(ef(this).attr("data-id"), false) - 1,
                    d = new google.maps.LatLng(map_markers[x]["latitude"], map_markers[x]["longitude"]);
            ef.goMap.map.setCenter(d);
            ef(".ef-marker").removeClass("ef-currrent-marker");
            ef(this).addClass("ef-currrent-marker");
            return false
        })
    }
    if (cForm.length && body_.hasClass("page-template-templatescontact-template")) {
        cForm.efValidate({
            name: nameFieldClass,
            email: emailFieldClass,
            message: messageFieldClass,
            sliderInput: ".ef-contact-slider",
            formAlert: ".ef-form-alert"
        })
    }
    if (flickr.length) {
        flickr.jflickrfeed({
            limit: amount,
            qstrings: {
                id: flickrId
            },
            itemTemplate: '<li><a class="flickr-gallery-item" href="{{image}}" title="{{title}}" rel="flickr-gallery"><img src="{{image_q}}" alt="{{title}}" /></a></li>'
        }, function() {
            Shadowbox.setup(".flickr-gallery-item", {
                gallery: "flickr-gallery"
            })
        })
    }

    function p(x) {
        var d = ef("<img>").addClass("instagram-image").attr("src", x.images.thumbnail.url);
        d = ef("<a>").attr("href", x.images.standard_resolution.url).attr("rel", "insta-gallery").attr("title", x.caption !== null ? "By " + x.caption.from.full_name : "").addClass("instagram-placeholder").append(d);
        return ef("<li>").attr("id", x.id).append(d)
    }

    function i(y, d) {
        var x = this;
        if (typeof d.data !== "undefined") {
            ef.each(d.data, function(A, z) {
                ef(x).append(p(z))
            })
        }
        Shadowbox.setup(".instagram-placeholder", {
            gallery: "insta-gallery"
        })
    }
    if (insta.length) {
        insta.on("didLoadInstagram", i);
        insta.instagram({
            hash: ihash,
            count: icount,
            clientId: iclientId,
            userId: iuserId,
            accessToken: iaccessToken,
        })
    }
    ef(window).on("smartresize", function() {
        vertCenterGallery();
        l();
        if (body_.hasClass(fullscreen_class) && Modernizr.mq("only screen and (max-width: 801px)")) {
            t.click()
        }
        applyIsotope()
    });
    ef(window).on("resize", function() {
        ef(".ef-video-bg").find(".fireform-slider-inner").adjustImagePositioning();
        fullwidth_height();
        gallery.trigger("updateSizes");
        r();
        if (!isMobile) {
            niceScroll_pos();
            scrolls_.getNiceScroll().hide();
            delay_fn(function() {
                scrolls_.getNiceScroll().show().resize()
            }, 300)
        }
    })
});


function flexLazyLoad(count) {
    if (count > 50)
        return true;
    count++;
    var check = true;
    ef(".fireform-slider-inner .slides").find('.ef-slide').each(function() {
        if (ef(this).attr('image-src') && !ef(this).attr('fload')) {
            ef(this).html('<img src="' + ef(this).attr('image-src') + '" alt="" />');
            ef(this).attr('fload', 'true');
            check = false;
            return false;
        }

    });
    if (check) {
        ef("#ef-thumb-list-inner .slides").find('.ef-thumb').each(function() {
            if (ef(this).attr('image-src')) {
                ef(this).html('<img src="' + ef(this).attr('image-src') + '" alt="" />');
                ef(this).attr('fload', 'true');
            }
        });
        return true;
    }
    setTimeout(function() {
        flexLazyLoad(count);
    }, 1000);
}

ef(window).load(function() {
    if (!isMobile) {
        niceScroll_pos();
        if (!body_.hasClass(full_page_class)) {
            scrolls_.getNiceScroll().show();
        } else {
            ef(document).one("scroll", function() {
                scrolls_.getNiceScroll().show()
            });
        }
        if (ef.browser.msie) {
            ef(window).trigger("resize")
        }
    }
});