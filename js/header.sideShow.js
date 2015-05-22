var cbpBGSlideshow = (function () {
    var l = $("#cbp-bislideshow"), g = l.children("li"), n = g.length, f = $("#cbp-bicontrols"), c = {$navPrev: f.find("span.cbp-biprev"), $navNext: f.find("span.cbp-binext"), $navPlayPause: f.find("span.cbp-bipause")}, h = 0, e, k = true, b = 3500;
    function m(o) {
        l.imagesLoaded(function () {
            if (Modernizr.backgroundsize) {
                g.each(function () {
                    var p = $(this);
                    p.css("background-image", "url(" + p.find("img").attr("src") + ")")
                })
            } else {
                l.find("img").show()
            }
            g.eq(h).css("opacity", 1);
            j();
            a()
        })
    }
    function j() {
        c.$navPlayPause.on("click", function () {
            var o = $(this);
            if (o.hasClass("cbp-biplay")) {
                o.removeClass("cbp-biplay").addClass("cbp-bipause");
                a()
            } else {
                o.removeClass("cbp-bipause").addClass("cbp-biplay");
                i()
            }
        });
        c.$navPrev.on("click", function () {
            d("prev");
            if (k) {
                a()
            }
        });
        c.$navNext.on("click", function () {
            d("next");
            if (k) {
                a()
            }
        })
    }
    function d(q) {
        var p = g.eq(h);
        if (q === "next") {
            h = h < n - 1 ? ++h : 0
        } else {
            if (q === "prev") {
                h = h > 0 ? --h : n - 1
            }
        }
        var o = g.eq(h);
        p.css("opacity", 0);
        o.css("opacity", 1)
    }
    function a() {
        k = true;
        clearTimeout(e);
        e = setTimeout(function () {
            d("next");
            a()
        }, b)
    }
    function i() {
        k = false;
        clearTimeout(e)
    }
    return{init: m}
})();