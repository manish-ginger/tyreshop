(window.webpackJsonp = window.webpackJsonp || []).push([
    ["common"],
    [
        function(e, t, n) {
            "use strict";
            (function(e) {
                var i,
                    o,
                    r,
                    s,
                    a,
                    l,
                    c,
                    u,
                    d,
                    p,
                    h,
                    f = n(7),
                    m = {
                        ajax: { done: "app.ajax.done" },
                        form: { success: "app.form.success", error: "app.form.error" },
                    },
                    g =
                    ((c = document.documentElement.getAttribute("lang")),
                        (u = document.documentElement.getAttribute("dir")),
                        (d =
                            (i = document.getElementById("js-loader")) ||
                            (((i = document.createElement("div")).className = "app-loader"),
                                (i.id = "js-loader"),
                                i)),
                        (p = (function() {
                            var e = document.getElementById("js-overlay");
                            return (
                                e ||
                                (((e = document.createElement("div")).className =
                                        "app-overlay"),
                                    (e.id = "js-overlay"),
                                    e)
                            );
                        })()),
                        (r = navigator.userAgent.toLowerCase()),
                        (s = r.match("trident") || r.match("msie")),
                        (o = "/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera/i"),
                        (a = !!r.match(o) && r.match(o)[0]),
                        (h = { agent: r, isMobile: a, isIE: s }), {
                            debug: function(e) {
                                console.log(e);
                            },
                            triggers: m,
                            lang: c ? c.toLowerCase() : null,
                            direction: u ? u.toLowerCase() : null,
                            isRtl: "ar" === c || "rtl" === u,
                            userAgent: h,
                            breakpoints: f.a,
                            preloader: {
                                el: d,
                                add: function() {
                                    return document.body.appendChild(d), d;
                                },
                                remove: function() {
                                    return d.parentNode.removeChild(d), d;
                                },
                            },
                            overlay: {
                                el: p,
                                add: function() {
                                    return document.body.appendChild(p), p;
                                },
                                remove: function() {
                                    return p.parentNode && p.parentNode.removeChild(p), p;
                                },
                            },
                            stream:
                                ((l = []), {
                                    list: l,
                                    add: function(e) {
                                        return "function" != typeof e ?
                                            new Error("its not a function") :
                                            (l.push(e), l.length - 1);
                                    },
                                    remove: function(e) {
                                        return !!l[e] && ((l[e] = null), l);
                                    },
                                    run: function(e) {
                                        return l.map(function(t) {
                                            return "function" == typeof t ?
                                                { fn: t, result: t(e) } :
                                                null;
                                        });
                                    },
                                }),
                        });
                e(document).on(g.triggers.ajax.done, function(e, t) {
                        if (!t || !t.html) return !1;
                        var n = t.html;
                        return g.stream.run(n);
                    }),
                    (t.a = g);
            }.call(this, n(1)));
        },
        function(e, t, n) {
            var i;
            /*!
             * jQuery JavaScript Library v3.4.1
             * https://jquery.com/
             *
             * Includes Sizzle.js
             * https://sizzlejs.com/
             *
             * Copyright JS Foundation and other contributors
             * Released under the MIT license
             * https://jquery.org/license
             *
             * Date: 2019-05-01T21:04Z
             */
            !(function(t, n) {
                "use strict";
                "object" == typeof e.exports ?
                    (e.exports = t.document ?
                        n(t, !0) :
                        function(e) {
                            if (!e.document)
                                throw new Error("jQuery requires a window with a document");
                            return n(e);
                        }) :
                    n(t);
            })("undefined" != typeof window ? window : this, function(n, o) {
                "use strict";
                var r = [],
                    s = n.document,
                    a = Object.getPrototypeOf,
                    l = r.slice,
                    c = r.concat,
                    u = r.push,
                    d = r.indexOf,
                    p = {},
                    h = p.toString,
                    f = p.hasOwnProperty,
                    m = f.toString,
                    g = m.call(Object),
                    v = {},
                    y = function(e) {
                        return "function" == typeof e && "number" != typeof e.nodeType;
                    },
                    w = function(e) {
                        return null != e && e === e.window;
                    },
                    x = { type: !0, src: !0, nonce: !0, noModule: !0 };

                function b(e, t, n) {
                    var i,
                        o,
                        r = (n = n || s).createElement("script");
                    if (((r.text = e), t))
                        for (i in x)
                            (o = t[i] || (t.getAttribute && t.getAttribute(i))) &&
                            r.setAttribute(i, o);
                    n.head.appendChild(r).parentNode.removeChild(r);
                }

                function _(e) {
                    return null == e ?
                        e + "" :
                        "object" == typeof e || "function" == typeof e ?
                        p[h.call(e)] || "object" :
                        typeof e;
                }
                var C = function(e, t) {
                        return new C.fn.init(e, t);
                    },
                    T = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;

                function E(e) {
                    var t = !!e && "length" in e && e.length,
                        n = _(e);
                    return (!y(e) &&
                        !w(e) &&
                        ("array" === n ||
                            0 === t ||
                            ("number" == typeof t && t > 0 && t - 1 in e))
                    );
                }
                (C.fn = C.prototype = {
                    jquery: "3.4.1",
                    constructor: C,
                    length: 0,
                    toArray: function() {
                        return l.call(this);
                    },
                    get: function(e) {
                        return null == e ?
                            l.call(this) :
                            e < 0 ?
                            this[e + this.length] :
                            this[e];
                    },
                    pushStack: function(e) {
                        var t = C.merge(this.constructor(), e);
                        return (t.prevObject = this), t;
                    },
                    each: function(e) {
                        return C.each(this, e);
                    },
                    map: function(e) {
                        return this.pushStack(
                            C.map(this, function(t, n) {
                                return e.call(t, n, t);
                            })
                        );
                    },
                    slice: function() {
                        return this.pushStack(l.apply(this, arguments));
                    },
                    first: function() {
                        return this.eq(0);
                    },
                    last: function() {
                        return this.eq(-1);
                    },
                    eq: function(e) {
                        var t = this.length,
                            n = +e + (e < 0 ? t : 0);
                        return this.pushStack(n >= 0 && n < t ? [this[n]] : []);
                    },
                    end: function() {
                        return this.prevObject || this.constructor();
                    },
                    push: u,
                    sort: r.sort,
                    splice: r.splice,
                }),
                (C.extend = C.fn.extend =
                    function() {
                        var e,
                            t,
                            n,
                            i,
                            o,
                            r,
                            s = arguments[0] || {},
                            a = 1,
                            l = arguments.length,
                            c = !1;
                        for (
                            "boolean" == typeof s &&
                            ((c = s), (s = arguments[a] || {}), a++),
                            "object" == typeof s || y(s) || (s = {}),
                            a === l && ((s = this), a--); a < l; a++
                        )
                            if (null != (e = arguments[a]))
                                for (t in e)
                                    (i = e[t]),
                                    "__proto__" !== t &&
                                    s !== i &&
                                    (c &&
                                        i &&
                                        (C.isPlainObject(i) || (o = Array.isArray(i))) ?
                                        ((n = s[t]),
                                            (r =
                                                o && !Array.isArray(n) ?
                                                [] :
                                                o || C.isPlainObject(n) ?
                                                n :
                                                {}),
                                            (o = !1),
                                            (s[t] = C.extend(c, r, i))) :
                                        void 0 !== i && (s[t] = i));
                        return s;
                    }),
                C.extend({
                        expando: "jQuery" + ("3.4.1" + Math.random()).replace(/\D/g, ""),
                        isReady: !0,
                        error: function(e) {
                            throw new Error(e);
                        },
                        noop: function() {},
                        isPlainObject: function(e) {
                            var t, n;
                            return (!(!e || "[object Object]" !== h.call(e)) &&
                                (!(t = a(e)) ||
                                    ("function" ==
                                        typeof(n = f.call(t, "constructor") && t.constructor) &&
                                        m.call(n) === g))
                            );
                        },
                        isEmptyObject: function(e) {
                            var t;
                            for (t in e) return !1;
                            return !0;
                        },
                        globalEval: function(e, t) {
                            b(e, { nonce: t && t.nonce });
                        },
                        each: function(e, t) {
                            var n,
                                i = 0;
                            if (E(e))
                                for (n = e.length; i < n && !1 !== t.call(e[i], i, e[i]); i++);
                            else
                                for (i in e)
                                    if (!1 === t.call(e[i], i, e[i])) break;
                            return e;
                        },
                        trim: function(e) {
                            return null == e ? "" : (e + "").replace(T, "");
                        },
                        makeArray: function(e, t) {
                            var n = t || [];
                            return (
                                null != e &&
                                (E(Object(e)) ?
                                    C.merge(n, "string" == typeof e ? [e] : e) :
                                    u.call(n, e)),
                                n
                            );
                        },
                        inArray: function(e, t, n) {
                            return null == t ? -1 : d.call(t, e, n);
                        },
                        merge: function(e, t) {
                            for (var n = +t.length, i = 0, o = e.length; i < n; i++)
                                e[o++] = t[i];
                            return (e.length = o), e;
                        },
                        grep: function(e, t, n) {
                            for (var i = [], o = 0, r = e.length, s = !n; o < r; o++)
                                !t(e[o], o) !== s && i.push(e[o]);
                            return i;
                        },
                        map: function(e, t, n) {
                            var i,
                                o,
                                r = 0,
                                s = [];
                            if (E(e))
                                for (i = e.length; r < i; r++)
                                    null != (o = t(e[r], r, n)) && s.push(o);
                            else
                                for (r in e) null != (o = t(e[r], r, n)) && s.push(o);
                            return c.apply([], s);
                        },
                        guid: 1,
                        support: v,
                    }),
                    "function" == typeof Symbol &&
                    (C.fn[Symbol.iterator] = r[Symbol.iterator]),
                    C.each(
                        "Boolean Number String Function Array Date RegExp Object Error Symbol".split(
                            " "
                        ),
                        function(e, t) {
                            p["[object " + t + "]"] = t.toLowerCase();
                        }
                    );
                var k =
                    /*!
                     * Sizzle CSS Selector Engine v2.3.4
                     * https://sizzlejs.com/
                     *
                     * Copyright JS Foundation and other contributors
                     * Released under the MIT license
                     * https://js.foundation/
                     *
                     * Date: 2019-04-08
                     */
                    (function(e) {
                        var t,
                            n,
                            i,
                            o,
                            r,
                            s,
                            a,
                            l,
                            c,
                            u,
                            d,
                            p,
                            h,
                            f,
                            m,
                            g,
                            v,
                            y,
                            w,
                            x = "sizzle" + 1 * new Date(),
                            b = e.document,
                            _ = 0,
                            C = 0,
                            T = le(),
                            E = le(),
                            k = le(),
                            S = le(),
                            D = function(e, t) {
                                return e === t && (d = !0), 0;
                            },
                            A = {}.hasOwnProperty,
                            I = [],
                            j = I.pop,
                            O = I.push,
                            L = I.push,
                            N = I.slice,
                            M = function(e, t) {
                                for (var n = 0, i = e.length; n < i; n++)
                                    if (e[n] === t) return n;
                                return -1;
                            },
                            P =
                            "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                            R = "[\\x20\\t\\r\\n\\f]",
                            z = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
                            $ =
                            "\\[" +
                            R +
                            "*(" +
                            z +
                            ")(?:" +
                            R +
                            "*([*^$|!~]?=)" +
                            R +
                            "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" +
                            z +
                            "))|)" +
                            R +
                            "*\\]",
                            F =
                            ":(" +
                            z +
                            ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" +
                            $ +
                            ")*)|.*)\\)|)",
                            q = new RegExp(R + "+", "g"),
                            H = new RegExp(
                                "^" + R + "+|((?:^|[^\\\\])(?:\\\\.)*)" + R + "+$",
                                "g"
                            ),
                            W = new RegExp("^" + R + "*," + R + "*"),
                            B = new RegExp("^" + R + "*([>+~]|" + R + ")" + R + "*"),
                            Z = new RegExp(R + "|>"),
                            U = new RegExp(F),
                            V = new RegExp("^" + z + "$"),
                            X = {
                                ID: new RegExp("^#(" + z + ")"),
                                CLASS: new RegExp("^\\.(" + z + ")"),
                                TAG: new RegExp("^(" + z + "|[*])"),
                                ATTR: new RegExp("^" + $),
                                PSEUDO: new RegExp("^" + F),
                                CHILD: new RegExp(
                                    "^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" +
                                    R +
                                    "*(even|odd|(([+-]|)(\\d*)n|)" +
                                    R +
                                    "*(?:([+-]|)" +
                                    R +
                                    "*(\\d+)|))" +
                                    R +
                                    "*\\)|)",
                                    "i"
                                ),
                                bool: new RegExp("^(?:" + P + ")$", "i"),
                                needsContext: new RegExp(
                                    "^" +
                                    R +
                                    "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" +
                                    R +
                                    "*((?:-\\d)?\\d*)" +
                                    R +
                                    "*\\)|)(?=[^-]|$)",
                                    "i"
                                ),
                            },
                            K = /HTML$/i,
                            Y = /^(?:input|select|textarea|button)$/i,
                            G = /^h\d$/i,
                            J = /^[^{]+\{\s*\[native \w/,
                            Q = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                            ee = /[+~]/,
                            te = new RegExp(
                                "\\\\([\\da-f]{1,6}" + R + "?|(" + R + ")|.)",
                                "ig"
                            ),
                            ne = function(e, t, n) {
                                var i = "0x" + t - 65536;
                                return i != i || n ?
                                    t :
                                    i < 0 ?
                                    String.fromCharCode(i + 65536) :
                                    String.fromCharCode((i >> 10) | 55296, (1023 & i) | 56320);
                            },
                            ie = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
                            oe = function(e, t) {
                                return t ?
                                    "\0" === e ?
                                    "�" :
                                    e.slice(0, -1) +
                                    "\\" +
                                    e.charCodeAt(e.length - 1).toString(16) +
                                    " " :
                                    "\\" + e;
                            },
                            re = function() {
                                p();
                            },
                            se = xe(
                                function(e) {
                                    return (!0 === e.disabled && "fieldset" === e.nodeName.toLowerCase());
                                }, { dir: "parentNode", next: "legend" }
                            );
                        try {
                            L.apply((I = N.call(b.childNodes)), b.childNodes),
                                I[b.childNodes.length].nodeType;
                        } catch (e) {
                            L = {
                                apply: I.length ?

                                    function(e, t) {
                                        O.apply(e, N.call(t));
                                    } :
                                    function(e, t) {
                                        for (var n = e.length, i = 0;
                                            (e[n++] = t[i++]););
                                        e.length = n - 1;
                                    },
                            };
                        }

                        function ae(e, t, i, o) {
                            var r,
                                a,
                                c,
                                u,
                                d,
                                f,
                                v,
                                y = t && t.ownerDocument,
                                _ = t ? t.nodeType : 9;
                            if (
                                ((i = i || []),
                                    "string" != typeof e || !e || (1 !== _ && 9 !== _ && 11 !== _))
                            )
                                return i;
                            if (!o &&
                                ((t ? t.ownerDocument || t : b) !== h && p(t), (t = t || h), m)
                            ) {
                                if (11 !== _ && (d = Q.exec(e)))
                                    if ((r = d[1])) {
                                        if (9 === _) {
                                            if (!(c = t.getElementById(r))) return i;
                                            if (c.id === r) return i.push(c), i;
                                        } else if (
                                            y &&
                                            (c = y.getElementById(r)) &&
                                            w(t, c) &&
                                            c.id === r
                                        )
                                            return i.push(c), i;
                                    } else {
                                        if (d[2]) return L.apply(i, t.getElementsByTagName(e)), i;
                                        if (
                                            (r = d[3]) &&
                                            n.getElementsByClassName &&
                                            t.getElementsByClassName
                                        )
                                            return L.apply(i, t.getElementsByClassName(r)), i;
                                    }
                                if (
                                    n.qsa &&
                                    !S[e + " "] &&
                                    (!g || !g.test(e)) &&
                                    (1 !== _ || "object" !== t.nodeName.toLowerCase())
                                ) {
                                    if (((v = e), (y = t), 1 === _ && Z.test(e))) {
                                        for (
                                            (u = t.getAttribute("id")) ?
                                            (u = u.replace(ie, oe)) :
                                            t.setAttribute("id", (u = x)),
                                            a = (f = s(e)).length; a--;

                                        )
                                            f[a] = "#" + u + " " + we(f[a]);
                                        (v = f.join(",")),
                                        (y = (ee.test(e) && ve(t.parentNode)) || t);
                                    }
                                    try {
                                        return L.apply(i, y.querySelectorAll(v)), i;
                                    } catch (t) {
                                        S(e, !0);
                                    } finally {
                                        u === x && t.removeAttribute("id");
                                    }
                                }
                            }
                            return l(e.replace(H, "$1"), t, i, o);
                        }

                        function le() {
                            var e = [];
                            return function t(n, o) {
                                return (
                                    e.push(n + " ") > i.cacheLength && delete t[e.shift()],
                                    (t[n + " "] = o)
                                );
                            };
                        }

                        function ce(e) {
                            return (e[x] = !0), e;
                        }

                        function ue(e) {
                            var t = h.createElement("fieldset");
                            try {
                                return !!e(t);
                            } catch (e) {
                                return !1;
                            } finally {
                                t.parentNode && t.parentNode.removeChild(t), (t = null);
                            }
                        }

                        function de(e, t) {
                            for (var n = e.split("|"), o = n.length; o--;)
                                i.attrHandle[n[o]] = t;
                        }

                        function pe(e, t) {
                            var n = t && e,
                                i =
                                n &&
                                1 === e.nodeType &&
                                1 === t.nodeType &&
                                e.sourceIndex - t.sourceIndex;
                            if (i) return i;
                            if (n)
                                for (;
                                    (n = n.nextSibling);)
                                    if (n === t) return -1;
                            return e ? 1 : -1;
                        }

                        function he(e) {
                            return function(t) {
                                return "input" === t.nodeName.toLowerCase() && t.type === e;
                            };
                        }

                        function fe(e) {
                            return function(t) {
                                var n = t.nodeName.toLowerCase();
                                return ("input" === n || "button" === n) && t.type === e;
                            };
                        }

                        function me(e) {
                            return function(t) {
                                return "form" in t ?
                                    t.parentNode && !1 === t.disabled ?
                                    "label" in t ?
                                    "label" in t.parentNode ?
                                    t.parentNode.disabled === e :
                                    t.disabled === e :
                                    t.isDisabled === e ||
                                    (t.isDisabled !== !e && se(t) === e) :
                                    t.disabled === e :
                                    "label" in t && t.disabled === e;
                            };
                        }

                        function ge(e) {
                            return ce(function(t) {
                                return (
                                    (t = +t),
                                    ce(function(n, i) {
                                        for (var o, r = e([], n.length, t), s = r.length; s--;)
                                            n[(o = r[s])] && (n[o] = !(i[o] = n[o]));
                                    })
                                );
                            });
                        }

                        function ve(e) {
                            return e && void 0 !== e.getElementsByTagName && e;
                        }
                        for (t in ((n = ae.support = {}),
                                (r = ae.isXML =
                                    function(e) {
                                        var t = e.namespaceURI,
                                            n = (e.ownerDocument || e).documentElement;
                                        return !K.test(t || (n && n.nodeName) || "HTML");
                                    }),
                                (p = ae.setDocument =
                                    function(e) {
                                        var t,
                                            o,
                                            s = e ? e.ownerDocument || e : b;
                                        return s !== h && 9 === s.nodeType && s.documentElement ?
                                            ((f = (h = s).documentElement),
                                                (m = !r(h)),
                                                b !== h &&
                                                (o = h.defaultView) &&
                                                o.top !== o &&
                                                (o.addEventListener ?
                                                    o.addEventListener("unload", re, !1) :
                                                    o.attachEvent && o.attachEvent("onunload", re)),
                                                (n.attributes = ue(function(e) {
                                                    return (e.className = "i"), !e.getAttribute("className");
                                                })),
                                                (n.getElementsByTagName = ue(function(e) {
                                                    return (
                                                        e.appendChild(h.createComment("")), !e.getElementsByTagName("*").length
                                                    );
                                                })),
                                                (n.getElementsByClassName = J.test(
                                                    h.getElementsByClassName
                                                )),
                                                (n.getById = ue(function(e) {
                                                    return (
                                                        (f.appendChild(e).id = x), !h.getElementsByName || !h.getElementsByName(x).length
                                                    );
                                                })),
                                                n.getById ?
                                                ((i.filter.ID = function(e) {
                                                        var t = e.replace(te, ne);
                                                        return function(e) {
                                                            return e.getAttribute("id") === t;
                                                        };
                                                    }),
                                                    (i.find.ID = function(e, t) {
                                                        if (void 0 !== t.getElementById && m) {
                                                            var n = t.getElementById(e);
                                                            return n ? [n] : [];
                                                        }
                                                    })) :
                                                ((i.filter.ID = function(e) {
                                                        var t = e.replace(te, ne);
                                                        return function(e) {
                                                            var n =
                                                                void 0 !== e.getAttributeNode &&
                                                                e.getAttributeNode("id");
                                                            return n && n.value === t;
                                                        };
                                                    }),
                                                    (i.find.ID = function(e, t) {
                                                        if (void 0 !== t.getElementById && m) {
                                                            var n,
                                                                i,
                                                                o,
                                                                r = t.getElementById(e);
                                                            if (r) {
                                                                if (
                                                                    (n = r.getAttributeNode("id")) &&
                                                                    n.value === e
                                                                )
                                                                    return [r];
                                                                for (
                                                                    o = t.getElementsByName(e), i = 0;
                                                                    (r = o[i++]);

                                                                )
                                                                    if (
                                                                        (n = r.getAttributeNode("id")) &&
                                                                        n.value === e
                                                                    )
                                                                        return [r];
                                                            }
                                                            return [];
                                                        }
                                                    })),
                                                (i.find.TAG = n.getElementsByTagName ?

                                                    function(e, t) {
                                                        return void 0 !== t.getElementsByTagName ?
                                                            t.getElementsByTagName(e) :
                                                            n.qsa ?
                                                            t.querySelectorAll(e) :
                                                            void 0;
                                                    } :
                                                    function(e, t) {
                                                        var n,
                                                            i = [],
                                                            o = 0,
                                                            r = t.getElementsByTagName(e);
                                                        if ("*" === e) {
                                                            for (;
                                                                (n = r[o++]);)
                                                                1 === n.nodeType && i.push(n);
                                                            return i;
                                                        }
                                                        return r;
                                                    }),
                                                (i.find.CLASS =
                                                    n.getElementsByClassName &&
                                                    function(e, t) {
                                                        if (void 0 !== t.getElementsByClassName && m)
                                                            return t.getElementsByClassName(e);
                                                    }),
                                                (v = []),
                                                (g = []),
                                                (n.qsa = J.test(h.querySelectorAll)) &&
                                                (ue(function(e) {
                                                        (f.appendChild(e).innerHTML =
                                                            "<a id='" +
                                                            x +
                                                            "'></a><select id='" +
                                                            x +
                                                            "-\r\\' msallowcapture=''><option selected=''></option></select>"),
                                                        e.querySelectorAll("[msallowcapture^='']").length &&
                                                            g.push("[*^$]=" + R + "*(?:''|\"\")"),
                                                            e.querySelectorAll("[selected]").length ||
                                                            g.push("\\[" + R + "*(?:value|" + P + ")"),
                                                            e.querySelectorAll("[id~=" + x + "-]").length ||
                                                            g.push("~="),
                                                            e.querySelectorAll(":checked").length ||
                                                            g.push(":checked"),
                                                            e.querySelectorAll("a#" + x + "+*").length ||
                                                            g.push(".#.+[+~]");
                                                    }),
                                                    ue(function(e) {
                                                        e.innerHTML =
                                                            "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                                                        var t = h.createElement("input");
                                                        t.setAttribute("type", "hidden"),
                                                            e.appendChild(t).setAttribute("name", "D"),
                                                            e.querySelectorAll("[name=d]").length &&
                                                            g.push("name" + R + "*[*^$|!~]?="),
                                                            2 !== e.querySelectorAll(":enabled").length &&
                                                            g.push(":enabled", ":disabled"),
                                                            (f.appendChild(e).disabled = !0),
                                                            2 !== e.querySelectorAll(":disabled").length &&
                                                            g.push(":enabled", ":disabled"),
                                                            e.querySelectorAll("*,:x"),
                                                            g.push(",.*:");
                                                    })),
                                                (n.matchesSelector = J.test(
                                                    (y =
                                                        f.matches ||
                                                        f.webkitMatchesSelector ||
                                                        f.mozMatchesSelector ||
                                                        f.oMatchesSelector ||
                                                        f.msMatchesSelector)
                                                )) &&
                                                ue(function(e) {
                                                    (n.disconnectedMatch = y.call(e, "*")),
                                                    y.call(e, "[s!='']:x"),
                                                        v.push("!=", F);
                                                }),
                                                (g = g.length && new RegExp(g.join("|"))),
                                                (v = v.length && new RegExp(v.join("|"))),
                                                (t = J.test(f.compareDocumentPosition)),
                                                (w =
                                                    t || J.test(f.contains) ?

                                                    function(e, t) {
                                                        var n = 9 === e.nodeType ? e.documentElement : e,
                                                            i = t && t.parentNode;
                                                        return (
                                                            e === i ||
                                                            !(!i ||
                                                                1 !== i.nodeType ||
                                                                !(n.contains ?
                                                                    n.contains(i) :
                                                                    e.compareDocumentPosition &&
                                                                    16 & e.compareDocumentPosition(i))
                                                            )
                                                        );
                                                    } :
                                                    function(e, t) {
                                                        if (t)
                                                            for (;
                                                                (t = t.parentNode);)
                                                                if (t === e) return !0;
                                                        return !1;
                                                    }),
                                                (D = t ?

                                                    function(e, t) {
                                                        if (e === t) return (d = !0), 0;
                                                        var i = !e.compareDocumentPosition -
                                                            !t.compareDocumentPosition;
                                                        return (
                                                            i ||
                                                            (1 &
                                                                (i =
                                                                    (e.ownerDocument || e) ===
                                                                    (t.ownerDocument || t) ?
                                                                    e.compareDocumentPosition(t) :
                                                                    1) ||
                                                                (!n.sortDetached &&
                                                                    t.compareDocumentPosition(e) === i) ?
                                                                e === h || (e.ownerDocument === b && w(b, e)) ?
                                                                -1 :
                                                                t === h || (t.ownerDocument === b && w(b, t)) ?
                                                                1 :
                                                                u ?
                                                                M(u, e) - M(u, t) :
                                                                0 :
                                                                4 & i ?
                                                                -1 :
                                                                1)
                                                        );
                                                    } :
                                                    function(e, t) {
                                                        if (e === t) return (d = !0), 0;
                                                        var n,
                                                            i = 0,
                                                            o = e.parentNode,
                                                            r = t.parentNode,
                                                            s = [e],
                                                            a = [t];
                                                        if (!o || !r)
                                                            return e === h ?
                                                                -1 :
                                                                t === h ?
                                                                1 :
                                                                o ?
                                                                -1 :
                                                                r ?
                                                                1 :
                                                                u ?
                                                                M(u, e) - M(u, t) :
                                                                0;
                                                        if (o === r) return pe(e, t);
                                                        for (n = e;
                                                            (n = n.parentNode);) s.unshift(n);
                                                        for (n = t;
                                                            (n = n.parentNode);) a.unshift(n);
                                                        for (; s[i] === a[i];) i++;
                                                        return i ?
                                                            pe(s[i], a[i]) :
                                                            s[i] === b ?
                                                            -1 :
                                                            a[i] === b ?
                                                            1 :
                                                            0;
                                                    }),
                                                h) :
                                            h;
                                    }),
                                (ae.matches = function(e, t) {
                                    return ae(e, null, null, t);
                                }),
                                (ae.matchesSelector = function(e, t) {
                                    if (
                                        ((e.ownerDocument || e) !== h && p(e),
                                            n.matchesSelector &&
                                            m &&
                                            !S[t + " "] &&
                                            (!v || !v.test(t)) &&
                                            (!g || !g.test(t)))
                                    )
                                        try {
                                            var i = y.call(e, t);
                                            if (
                                                i ||
                                                n.disconnectedMatch ||
                                                (e.document && 11 !== e.document.nodeType)
                                            )
                                                return i;
                                        } catch (e) {
                                            S(t, !0);
                                        }
                                    return ae(t, h, null, [e]).length > 0;
                                }),
                                (ae.contains = function(e, t) {
                                    return (e.ownerDocument || e) !== h && p(e), w(e, t);
                                }),
                                (ae.attr = function(e, t) {
                                    (e.ownerDocument || e) !== h && p(e);
                                    var o = i.attrHandle[t.toLowerCase()],
                                        r =
                                        o && A.call(i.attrHandle, t.toLowerCase()) ?
                                        o(e, t, !m) :
                                        void 0;
                                    return void 0 !== r ?
                                        r :
                                        n.attributes || !m ?
                                        e.getAttribute(t) :
                                        (r = e.getAttributeNode(t)) && r.specified ?
                                        r.value :
                                        null;
                                }),
                                (ae.escape = function(e) {
                                    return (e + "").replace(ie, oe);
                                }),
                                (ae.error = function(e) {
                                    throw new Error("Syntax error, unrecognized expression: " + e);
                                }),
                                (ae.uniqueSort = function(e) {
                                    var t,
                                        i = [],
                                        o = 0,
                                        r = 0;
                                    if (
                                        ((d = !n.detectDuplicates),
                                            (u = !n.sortStable && e.slice(0)),
                                            e.sort(D),
                                            d)
                                    ) {
                                        for (;
                                            (t = e[r++]);) t === e[r] && (o = i.push(r));
                                        for (; o--;) e.splice(i[o], 1);
                                    }
                                    return (u = null), e;
                                }),
                                (o = ae.getText =
                                    function(e) {
                                        var t,
                                            n = "",
                                            i = 0,
                                            r = e.nodeType;
                                        if (r) {
                                            if (1 === r || 9 === r || 11 === r) {
                                                if ("string" == typeof e.textContent) return e.textContent;
                                                for (e = e.firstChild; e; e = e.nextSibling) n += o(e);
                                            } else if (3 === r || 4 === r) return e.nodeValue;
                                        } else
                                            for (;
                                                (t = e[i++]);) n += o(t);
                                        return n;
                                    }),
                                ((i = ae.selectors = {
                                    cacheLength: 50,
                                    createPseudo: ce,
                                    match: X,
                                    attrHandle: {},
                                    find: {},
                                    relative: {
                                        ">": { dir: "parentNode", first: !0 },
                                        " ": { dir: "parentNode" },
                                        "+": { dir: "previousSibling", first: !0 },
                                        "~": { dir: "previousSibling" },
                                    },
                                    preFilter: {
                                        ATTR: function(e) {
                                            return (
                                                (e[1] = e[1].replace(te, ne)),
                                                (e[3] = (e[3] || e[4] || e[5] || "").replace(te, ne)),
                                                "~=" === e[2] && (e[3] = " " + e[3] + " "),
                                                e.slice(0, 4)
                                            );
                                        },
                                        CHILD: function(e) {
                                            return (
                                                (e[1] = e[1].toLowerCase()),
                                                "nth" === e[1].slice(0, 3) ?
                                                (e[3] || ae.error(e[0]),
                                                    (e[4] = +(e[4] ?
                                                        e[5] + (e[6] || 1) :
                                                        2 * ("even" === e[3] || "odd" === e[3]))),
                                                    (e[5] = +(e[7] + e[8] || "odd" === e[3]))) :
                                                e[3] && ae.error(e[0]),
                                                e
                                            );
                                        },
                                        PSEUDO: function(e) {
                                            var t,
                                                n = !e[6] && e[2];
                                            return X.CHILD.test(e[0]) ?
                                                null :
                                                (e[3] ?
                                                    (e[2] = e[4] || e[5] || "") :
                                                    n &&
                                                    U.test(n) &&
                                                    (t = s(n, !0)) &&
                                                    (t = n.indexOf(")", n.length - t) - n.length) &&
                                                    ((e[0] = e[0].slice(0, t)), (e[2] = n.slice(0, t))),
                                                    e.slice(0, 3));
                                        },
                                    },
                                    filter: {
                                        TAG: function(e) {
                                            var t = e.replace(te, ne).toLowerCase();
                                            return "*" === e ?

                                                function() {
                                                    return !0;
                                                } :
                                                function(e) {
                                                    return e.nodeName && e.nodeName.toLowerCase() === t;
                                                };
                                        },
                                        CLASS: function(e) {
                                            var t = T[e + " "];
                                            return (
                                                t ||
                                                ((t = new RegExp(
                                                        "(^|" + R + ")" + e + "(" + R + "|$)"
                                                    )) &&
                                                    T(e, function(e) {
                                                        return t.test(
                                                            ("string" == typeof e.className && e.className) ||
                                                            (void 0 !== e.getAttribute &&
                                                                e.getAttribute("class")) ||
                                                            ""
                                                        );
                                                    }))
                                            );
                                        },
                                        ATTR: function(e, t, n) {
                                            return function(i) {
                                                var o = ae.attr(i, e);
                                                return null == o ?
                                                    "!=" === t :
                                                    !t ||
                                                    ((o += ""),
                                                        "=" === t ?
                                                        o === n :
                                                        "!=" === t ?
                                                        o !== n :
                                                        "^=" === t ?
                                                        n && 0 === o.indexOf(n) :
                                                        "*=" === t ?
                                                        n && o.indexOf(n) > -1 :
                                                        "$=" === t ?
                                                        n && o.slice(-n.length) === n :
                                                        "~=" === t ?
                                                        (" " + o.replace(q, " ") + " ").indexOf(n) > -1 :
                                                        "|=" === t &&
                                                        (o === n ||
                                                            o.slice(0, n.length + 1) === n + "-"));
                                            };
                                        },
                                        CHILD: function(e, t, n, i, o) {
                                            var r = "nth" !== e.slice(0, 3),
                                                s = "last" !== e.slice(-4),
                                                a = "of-type" === t;
                                            return 1 === i && 0 === o ?

                                                function(e) {
                                                    return !!e.parentNode;
                                                } :
                                                function(t, n, l) {
                                                    var c,
                                                        u,
                                                        d,
                                                        p,
                                                        h,
                                                        f,
                                                        m = r !== s ? "nextSibling" : "previousSibling",
                                                        g = t.parentNode,
                                                        v = a && t.nodeName.toLowerCase(),
                                                        y = !l && !a,
                                                        w = !1;
                                                    if (g) {
                                                        if (r) {
                                                            for (; m;) {
                                                                for (p = t;
                                                                    (p = p[m]);)
                                                                    if (
                                                                        a ?
                                                                        p.nodeName.toLowerCase() === v :
                                                                        1 === p.nodeType
                                                                    )
                                                                        return !1;
                                                                f = m = "only" === e && !f && "nextSibling";
                                                            }
                                                            return !0;
                                                        }
                                                        if (
                                                            ((f = [s ? g.firstChild : g.lastChild]), s && y)
                                                        ) {
                                                            for (
                                                                w =
                                                                (h =
                                                                    (c =
                                                                        (u =
                                                                            (d = (p = g)[x] || (p[x] = {}))[
                                                                                p.uniqueID
                                                                            ] || (d[p.uniqueID] = {}))[e] || [])[0] === _ && c[1]) && c[2],
                                                                p = h && g.childNodes[h];
                                                                (p =
                                                                    (++h && p && p[m]) || (w = h = 0) || f.pop());

                                                            )
                                                                if (1 === p.nodeType && ++w && p === t) {
                                                                    u[e] = [_, h, w];
                                                                    break;
                                                                }
                                                        } else if (
                                                            (y &&
                                                                (w = h =
                                                                    (c =
                                                                        (u =
                                                                            (d = (p = t)[x] || (p[x] = {}))[
                                                                                p.uniqueID
                                                                            ] || (d[p.uniqueID] = {}))[e] || [])[0] === _ && c[1]), !1 === w)
                                                        )
                                                            for (;
                                                                (p =
                                                                    (++h && p && p[m]) ||
                                                                    (w = h = 0) ||
                                                                    f.pop()) &&
                                                                ((a ?
                                                                        p.nodeName.toLowerCase() !== v :
                                                                        1 !== p.nodeType) ||
                                                                    !++w ||
                                                                    (y &&
                                                                        ((u =
                                                                            (d = p[x] || (p[x] = {}))[p.uniqueID] ||
                                                                            (d[p.uniqueID] = {}))[e] = [_, w]),
                                                                        p !== t));

                                                            );
                                                        return (w -= o) === i || (w % i == 0 && w / i >= 0);
                                                    }
                                                };
                                        },
                                        PSEUDO: function(e, t) {
                                            var n,
                                                o =
                                                i.pseudos[e] ||
                                                i.setFilters[e.toLowerCase()] ||
                                                ae.error("unsupported pseudo: " + e);
                                            return o[x] ?
                                                o(t) :
                                                o.length > 1 ?
                                                ((n = [e, e, "", t]),
                                                    i.setFilters.hasOwnProperty(e.toLowerCase()) ?
                                                    ce(function(e, n) {
                                                        for (var i, r = o(e, t), s = r.length; s--;)
                                                            e[(i = M(e, r[s]))] = !(n[i] = r[s]);
                                                    }) :
                                                    function(e) {
                                                        return o(e, 0, n);
                                                    }) :
                                                o;
                                        },
                                    },
                                    pseudos: {
                                        not: ce(function(e) {
                                            var t = [],
                                                n = [],
                                                i = a(e.replace(H, "$1"));
                                            return i[x] ?
                                                ce(function(e, t, n, o) {
                                                    for (
                                                        var r, s = i(e, null, o, []), a = e.length; a--;

                                                    )
                                                        (r = s[a]) && (e[a] = !(t[a] = r));
                                                }) :
                                                function(e, o, r) {
                                                    return (
                                                        (t[0] = e),
                                                        i(t, null, r, n),
                                                        (t[0] = null), !n.pop()
                                                    );
                                                };
                                        }),
                                        has: ce(function(e) {
                                            return function(t) {
                                                return ae(e, t).length > 0;
                                            };
                                        }),
                                        contains: ce(function(e) {
                                            return (
                                                (e = e.replace(te, ne)),
                                                function(t) {
                                                    return (t.textContent || o(t)).indexOf(e) > -1;
                                                }
                                            );
                                        }),
                                        lang: ce(function(e) {
                                            return (
                                                V.test(e || "") || ae.error("unsupported lang: " + e),
                                                (e = e.replace(te, ne).toLowerCase()),
                                                function(t) {
                                                    var n;
                                                    do {
                                                        if (
                                                            (n = m ?
                                                                t.lang :
                                                                t.getAttribute("xml:lang") ||
                                                                t.getAttribute("lang"))
                                                        )
                                                            return (
                                                                (n = n.toLowerCase()) === e ||
                                                                0 === n.indexOf(e + "-")
                                                            );
                                                    } while ((t = t.parentNode) && 1 === t.nodeType);
                                                    return !1;
                                                }
                                            );
                                        }),
                                        target: function(t) {
                                            var n = e.location && e.location.hash;
                                            return n && n.slice(1) === t.id;
                                        },
                                        root: function(e) {
                                            return e === f;
                                        },
                                        focus: function(e) {
                                            return (
                                                e === h.activeElement &&
                                                (!h.hasFocus || h.hasFocus()) &&
                                                !!(e.type || e.href || ~e.tabIndex)
                                            );
                                        },
                                        enabled: me(!1),
                                        disabled: me(!0),
                                        checked: function(e) {
                                            var t = e.nodeName.toLowerCase();
                                            return (
                                                ("input" === t && !!e.checked) ||
                                                ("option" === t && !!e.selected)
                                            );
                                        },
                                        selected: function(e) {
                                            return (
                                                e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
                                            );
                                        },
                                        empty: function(e) {
                                            for (e = e.firstChild; e; e = e.nextSibling)
                                                if (e.nodeType < 6) return !1;
                                            return !0;
                                        },
                                        parent: function(e) {
                                            return !i.pseudos.empty(e);
                                        },
                                        header: function(e) {
                                            return G.test(e.nodeName);
                                        },
                                        input: function(e) {
                                            return Y.test(e.nodeName);
                                        },
                                        button: function(e) {
                                            var t = e.nodeName.toLowerCase();
                                            return (
                                                ("input" === t && "button" === e.type) || "button" === t
                                            );
                                        },
                                        text: function(e) {
                                            var t;
                                            return (
                                                "input" === e.nodeName.toLowerCase() &&
                                                "text" === e.type &&
                                                (null == (t = e.getAttribute("type")) ||
                                                    "text" === t.toLowerCase())
                                            );
                                        },
                                        first: ge(function() {
                                            return [0];
                                        }),
                                        last: ge(function(e, t) {
                                            return [t - 1];
                                        }),
                                        eq: ge(function(e, t, n) {
                                            return [n < 0 ? n + t : n];
                                        }),
                                        even: ge(function(e, t) {
                                            for (var n = 0; n < t; n += 2) e.push(n);
                                            return e;
                                        }),
                                        odd: ge(function(e, t) {
                                            for (var n = 1; n < t; n += 2) e.push(n);
                                            return e;
                                        }),
                                        lt: ge(function(e, t, n) {
                                            for (var i = n < 0 ? n + t : n > t ? t : n; --i >= 0;)
                                                e.push(i);
                                            return e;
                                        }),
                                        gt: ge(function(e, t, n) {
                                            for (var i = n < 0 ? n + t : n; ++i < t;) e.push(i);
                                            return e;
                                        }),
                                    },
                                }).pseudos.nth = i.pseudos.eq), { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 }))
                            i.pseudos[t] = he(t);
                        for (t in { submit: !0, reset: !0 }) i.pseudos[t] = fe(t);

                        function ye() {}

                        function we(e) {
                            for (var t = 0, n = e.length, i = ""; t < n; t++) i += e[t].value;
                            return i;
                        }

                        function xe(e, t, n) {
                            var i = t.dir,
                                o = t.next,
                                r = o || i,
                                s = n && "parentNode" === r,
                                a = C++;
                            return t.first ?

                                function(t, n, o) {
                                    for (;
                                        (t = t[i]);)
                                        if (1 === t.nodeType || s) return e(t, n, o);
                                    return !1;
                                } :
                                function(t, n, l) {
                                    var c,
                                        u,
                                        d,
                                        p = [_, a];
                                    if (l) {
                                        for (;
                                            (t = t[i]);)
                                            if ((1 === t.nodeType || s) && e(t, n, l)) return !0;
                                    } else
                                        for (;
                                            (t = t[i]);)
                                            if (1 === t.nodeType || s)
                                                if (
                                                    ((u =
                                                            (d = t[x] || (t[x] = {}))[t.uniqueID] ||
                                                            (d[t.uniqueID] = {})),
                                                        o && o === t.nodeName.toLowerCase())
                                                )
                                                    t = t[i] || t;
                                                else {
                                                    if ((c = u[r]) && c[0] === _ && c[1] === a)
                                                        return (p[2] = c[2]);
                                                    if (((u[r] = p), (p[2] = e(t, n, l)))) return !0;
                                                }
                                    return !1;
                                };
                        }

                        function be(e) {
                            return e.length > 1 ?

                                function(t, n, i) {
                                    for (var o = e.length; o--;)
                                        if (!e[o](t, n, i)) return !1;
                                    return !0;
                                } :
                                e[0];
                        }

                        function _e(e, t, n, i, o) {
                            for (
                                var r, s = [], a = 0, l = e.length, c = null != t; a < l; a++
                            )
                                (r = e[a]) &&
                                ((n && !n(r, i, o)) || (s.push(r), c && t.push(a)));
                            return s;
                        }

                        function Ce(e, t, n, i, o, r) {
                            return (
                                i && !i[x] && (i = Ce(i)),
                                o && !o[x] && (o = Ce(o, r)),
                                ce(function(r, s, a, l) {
                                    var c,
                                        u,
                                        d,
                                        p = [],
                                        h = [],
                                        f = s.length,
                                        m =
                                        r ||
                                        (function(e, t, n) {
                                            for (var i = 0, o = t.length; i < o; i++)
                                                ae(e, t[i], n);
                                            return n;
                                        })(t || "*", a.nodeType ? [a] : a, []),
                                        g = !e || (!r && t) ? m : _e(m, p, e, a, l),
                                        v = n ? (o || (r ? e : f || i) ? [] : s) : g;
                                    if ((n && n(g, v, a, l), i))
                                        for (c = _e(v, h), i(c, [], a, l), u = c.length; u--;)
                                            (d = c[u]) && (v[h[u]] = !(g[h[u]] = d));
                                    if (r) {
                                        if (o || e) {
                                            if (o) {
                                                for (c = [], u = v.length; u--;)
                                                    (d = v[u]) && c.push((g[u] = d));
                                                o(null, (v = []), c, l);
                                            }
                                            for (u = v.length; u--;)
                                                (d = v[u]) &&
                                                (c = o ? M(r, d) : p[u]) > -1 &&
                                                (r[c] = !(s[c] = d));
                                        }
                                    } else(v = _e(v === s ? v.splice(f, v.length) : v)), o ? o(null, s, v, l) : L.apply(s, v);
                                })
                            );
                        }

                        function Te(e) {
                            for (
                                var t,
                                    n,
                                    o,
                                    r = e.length,
                                    s = i.relative[e[0].type],
                                    a = s || i.relative[" "],
                                    l = s ? 1 : 0,
                                    u = xe(
                                        function(e) {
                                            return e === t;
                                        },
                                        a, !0
                                    ),
                                    d = xe(
                                        function(e) {
                                            return M(t, e) > -1;
                                        },
                                        a, !0
                                    ),
                                    p = [
                                        function(e, n, i) {
                                            var o =
                                                (!s && (i || n !== c)) ||
                                                ((t = n).nodeType ? u(e, n, i) : d(e, n, i));
                                            return (t = null), o;
                                        },
                                    ]; l < r; l++
                            )
                                if ((n = i.relative[e[l].type])) p = [xe(be(p), n)];
                                else {
                                    if ((n = i.filter[e[l].type].apply(null, e[l].matches))[x]) {
                                        for (o = ++l; o < r && !i.relative[e[o].type]; o++);
                                        return Ce(
                                            l > 1 && be(p),
                                            l > 1 &&
                                            we(
                                                e
                                                .slice(0, l - 1)
                                                .concat({ value: " " === e[l - 2].type ? "*" : "" })
                                            ).replace(H, "$1"),
                                            n,
                                            l < o && Te(e.slice(l, o)),
                                            o < r && Te((e = e.slice(o))),
                                            o < r && we(e)
                                        );
                                    }
                                    p.push(n);
                                }
                            return be(p);
                        }
                        return (
                            (ye.prototype = i.filters = i.pseudos),
                            (i.setFilters = new ye()),
                            (s = ae.tokenize =
                                function(e, t) {
                                    var n,
                                        o,
                                        r,
                                        s,
                                        a,
                                        l,
                                        c,
                                        u = E[e + " "];
                                    if (u) return t ? 0 : u.slice(0);
                                    for (a = e, l = [], c = i.preFilter; a;) {
                                        for (s in ((n && !(o = W.exec(a))) ||
                                                (o && (a = a.slice(o[0].length) || a), l.push((r = []))),
                                                (n = !1),
                                                (o = B.exec(a)) &&
                                                ((n = o.shift()),
                                                    r.push({ value: n, type: o[0].replace(H, " ") }),
                                                    (a = a.slice(n.length))),
                                                i.filter))
                                            !(o = X[s].exec(a)) ||
                                            (c[s] && !(o = c[s](o))) ||
                                            ((n = o.shift()),
                                                r.push({ value: n, type: s, matches: o }),
                                                (a = a.slice(n.length)));
                                        if (!n) break;
                                    }
                                    return t ? a.length : a ? ae.error(e) : E(e, l).slice(0);
                                }),
                            (a = ae.compile =
                                function(e, t) {
                                    var n,
                                        o = [],
                                        r = [],
                                        a = k[e + " "];
                                    if (!a) {
                                        for (t || (t = s(e)), n = t.length; n--;)
                                            (a = Te(t[n]))[x] ? o.push(a) : r.push(a);
                                        (a = k(
                                            e,
                                            (function(e, t) {
                                                var n = t.length > 0,
                                                    o = e.length > 0,
                                                    r = function(r, s, a, l, u) {
                                                        var d,
                                                            f,
                                                            g,
                                                            v = 0,
                                                            y = "0",
                                                            w = r && [],
                                                            x = [],
                                                            b = c,
                                                            C = r || (o && i.find.TAG("*", u)),
                                                            T = (_ += null == b ? 1 : Math.random() || 0.1),
                                                            E = C.length;
                                                        for (
                                                            u && (c = s === h || s || u); y !== E && null != (d = C[y]); y++
                                                        ) {
                                                            if (o && d) {
                                                                for (
                                                                    f = 0,
                                                                    s ||
                                                                    d.ownerDocument === h ||
                                                                    (p(d), (a = !m));
                                                                    (g = e[f++]);

                                                                )
                                                                    if (g(d, s || h, a)) {
                                                                        l.push(d);
                                                                        break;
                                                                    }
                                                                u && (_ = T);
                                                            }
                                                            n && ((d = !g && d) && v--, r && w.push(d));
                                                        }
                                                        if (((v += y), n && y !== v)) {
                                                            for (f = 0;
                                                                (g = t[f++]);) g(w, x, s, a);
                                                            if (r) {
                                                                if (v > 0)
                                                                    for (; y--;)
                                                                        w[y] || x[y] || (x[y] = j.call(l));
                                                                x = _e(x);
                                                            }
                                                            L.apply(l, x),
                                                                u &&
                                                                !r &&
                                                                x.length > 0 &&
                                                                v + t.length > 1 &&
                                                                ae.uniqueSort(l);
                                                        }
                                                        return u && ((_ = T), (c = b)), w;
                                                    };
                                                return n ? ce(r) : r;
                                            })(r, o)
                                        )).selector = e;
                                    }
                                    return a;
                                }),
                            (l = ae.select =
                                function(e, t, n, o) {
                                    var r,
                                        l,
                                        c,
                                        u,
                                        d,
                                        p = "function" == typeof e && e,
                                        h = !o && s((e = p.selector || e));
                                    if (((n = n || []), 1 === h.length)) {
                                        if (
                                            (l = h[0] = h[0].slice(0)).length > 2 &&
                                            "ID" === (c = l[0]).type &&
                                            9 === t.nodeType &&
                                            m &&
                                            i.relative[l[1].type]
                                        ) {
                                            if (!(t = (i.find.ID(c.matches[0].replace(te, ne), t) || [])[0]))
                                                return n;
                                            p && (t = t.parentNode),
                                                (e = e.slice(l.shift().value.length));
                                        }
                                        for (
                                            r = X.needsContext.test(e) ? 0 : l.length; r-- && ((c = l[r]), !i.relative[(u = c.type)]);

                                        )
                                            if (
                                                (d = i.find[u]) &&
                                                (o = d(
                                                    c.matches[0].replace(te, ne),
                                                    (ee.test(l[0].type) && ve(t.parentNode)) || t
                                                ))
                                            ) {
                                                if ((l.splice(r, 1), !(e = o.length && we(l))))
                                                    return L.apply(n, o), n;
                                                break;
                                            }
                                    }
                                    return (
                                        (p || a(e, h))(
                                            o,
                                            t, !m,
                                            n, !t || (ee.test(e) && ve(t.parentNode)) || t
                                        ),
                                        n
                                    );
                                }),
                            (n.sortStable = x.split("").sort(D).join("") === x),
                            (n.detectDuplicates = !!d),
                            p(),
                            (n.sortDetached = ue(function(e) {
                                return (
                                    1 & e.compareDocumentPosition(h.createElement("fieldset"))
                                );
                            })),
                            ue(function(e) {
                                return (
                                    (e.innerHTML = "<a href='#'></a>"),
                                    "#" === e.firstChild.getAttribute("href")
                                );
                            }) ||
                            de("type|href|height|width", function(e, t, n) {
                                if (!n)
                                    return e.getAttribute(
                                        t,
                                        "type" === t.toLowerCase() ? 1 : 2
                                    );
                            }),
                            (n.attributes &&
                                ue(function(e) {
                                    return (
                                        (e.innerHTML = "<input/>"),
                                        e.firstChild.setAttribute("value", ""),
                                        "" === e.firstChild.getAttribute("value")
                                    );
                                })) ||
                            de("value", function(e, t, n) {
                                if (!n && "input" === e.nodeName.toLowerCase())
                                    return e.defaultValue;
                            }),
                            ue(function(e) {
                                return null == e.getAttribute("disabled");
                            }) ||
                            de(P, function(e, t, n) {
                                var i;
                                if (!n)
                                    return !0 === e[t] ?
                                        t.toLowerCase() :
                                        (i = e.getAttributeNode(t)) && i.specified ?
                                        i.value :
                                        null;
                            }),
                            ae
                        );
                    })(n);
                (C.find = k),
                (C.expr = k.selectors),
                (C.expr[":"] = C.expr.pseudos),
                (C.uniqueSort = C.unique = k.uniqueSort),
                (C.text = k.getText),
                (C.isXMLDoc = k.isXML),
                (C.contains = k.contains),
                (C.escapeSelector = k.escape);
                var S = function(e, t, n) {
                        for (var i = [], o = void 0 !== n;
                            (e = e[t]) && 9 !== e.nodeType;)
                            if (1 === e.nodeType) {
                                if (o && C(e).is(n)) break;
                                i.push(e);
                            }
                        return i;
                    },
                    D = function(e, t) {
                        for (var n = []; e; e = e.nextSibling)
                            1 === e.nodeType && e !== t && n.push(e);
                        return n;
                    },
                    A = C.expr.match.needsContext;

                function I(e, t) {
                    return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase();
                }
                var j =
                    /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;

                function O(e, t, n) {
                    return y(t) ?
                        C.grep(e, function(e, i) {
                            return !!t.call(e, i, e) !== n;
                        }) :
                        t.nodeType ?
                        C.grep(e, function(e) {
                            return (e === t) !== n;
                        }) :
                        "string" != typeof t ?
                        C.grep(e, function(e) {
                            return d.call(t, e) > -1 !== n;
                        }) :
                        C.filter(t, e, n);
                }
                (C.filter = function(e, t, n) {
                    var i = t[0];
                    return (
                        n && (e = ":not(" + e + ")"),
                        1 === t.length && 1 === i.nodeType ?
                        C.find.matchesSelector(i, e) ?
                        [i] :
                        [] :
                        C.find.matches(
                            e,
                            C.grep(t, function(e) {
                                return 1 === e.nodeType;
                            })
                        )
                    );
                }),
                C.fn.extend({
                    find: function(e) {
                        var t,
                            n,
                            i = this.length,
                            o = this;
                        if ("string" != typeof e)
                            return this.pushStack(
                                C(e).filter(function() {
                                    for (t = 0; t < i; t++)
                                        if (C.contains(o[t], this)) return !0;
                                })
                            );
                        for (n = this.pushStack([]), t = 0; t < i; t++)
                            C.find(e, o[t], n);
                        return i > 1 ? C.uniqueSort(n) : n;
                    },
                    filter: function(e) {
                        return this.pushStack(O(this, e || [], !1));
                    },
                    not: function(e) {
                        return this.pushStack(O(this, e || [], !0));
                    },
                    is: function(e) {
                        return !!O(
                            this,
                            "string" == typeof e && A.test(e) ? C(e) : e || [], !1
                        ).length;
                    },
                });
                var L,
                    N = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
                ((C.fn.init = function(e, t, n) {
                    var i, o;
                    if (!e) return this;
                    if (((n = n || L), "string" == typeof e)) {
                        if (!(i =
                                "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ?
                                [null, e, null] :
                                N.exec(e)) ||
                            (!i[1] && t)
                        )
                            return !t || t.jquery ?
                                (t || n).find(e) :
                                this.constructor(t).find(e);
                        if (i[1]) {
                            if (
                                ((t = t instanceof C ? t[0] : t),
                                    C.merge(
                                        this,
                                        C.parseHTML(
                                            i[1],
                                            t && t.nodeType ? t.ownerDocument || t : s, !0
                                        )
                                    ),
                                    j.test(i[1]) && C.isPlainObject(t))
                            )
                                for (i in t) y(this[i]) ? this[i](t[i]) : this.attr(i, t[i]);
                            return this;
                        }
                        return (
                            (o = s.getElementById(i[2])) &&
                            ((this[0] = o), (this.length = 1)),
                            this
                        );
                    }
                    return e.nodeType ?
                        ((this[0] = e), (this.length = 1), this) :
                        y(e) ?
                        void 0 !== n.ready ?
                        n.ready(e) :
                        e(C) :
                        C.makeArray(e, this);
                }).prototype = C.fn),
                (L = C(s));
                var M = /^(?:parents|prev(?:Until|All))/,
                    P = { children: !0, contents: !0, next: !0, prev: !0 };

                function R(e, t) {
                    for (;
                        (e = e[t]) && 1 !== e.nodeType;);
                    return e;
                }
                C.fn.extend({
                        has: function(e) {
                            var t = C(e, this),
                                n = t.length;
                            return this.filter(function() {
                                for (var e = 0; e < n; e++)
                                    if (C.contains(this, t[e])) return !0;
                            });
                        },
                        closest: function(e, t) {
                            var n,
                                i = 0,
                                o = this.length,
                                r = [],
                                s = "string" != typeof e && C(e);
                            if (!A.test(e))
                                for (; i < o; i++)
                                    for (n = this[i]; n && n !== t; n = n.parentNode)
                                        if (
                                            n.nodeType < 11 &&
                                            (s ?
                                                s.index(n) > -1 :
                                                1 === n.nodeType && C.find.matchesSelector(n, e))
                                        ) {
                                            r.push(n);
                                            break;
                                        }
                            return this.pushStack(r.length > 1 ? C.uniqueSort(r) : r);
                        },
                        index: function(e) {
                            return e ?
                                "string" == typeof e ?
                                d.call(C(e), this[0]) :
                                d.call(this, e.jquery ? e[0] : e) :
                                this[0] && this[0].parentNode ?
                                this.first().prevAll().length :
                                -1;
                        },
                        add: function(e, t) {
                            return this.pushStack(C.uniqueSort(C.merge(this.get(), C(e, t))));
                        },
                        addBack: function(e) {
                            return this.add(
                                null == e ? this.prevObject : this.prevObject.filter(e)
                            );
                        },
                    }),
                    C.each({
                            parent: function(e) {
                                var t = e.parentNode;
                                return t && 11 !== t.nodeType ? t : null;
                            },
                            parents: function(e) {
                                return S(e, "parentNode");
                            },
                            parentsUntil: function(e, t, n) {
                                return S(e, "parentNode", n);
                            },
                            next: function(e) {
                                return R(e, "nextSibling");
                            },
                            prev: function(e) {
                                return R(e, "previousSibling");
                            },
                            nextAll: function(e) {
                                return S(e, "nextSibling");
                            },
                            prevAll: function(e) {
                                return S(e, "previousSibling");
                            },
                            nextUntil: function(e, t, n) {
                                return S(e, "nextSibling", n);
                            },
                            prevUntil: function(e, t, n) {
                                return S(e, "previousSibling", n);
                            },
                            siblings: function(e) {
                                return D((e.parentNode || {}).firstChild, e);
                            },
                            children: function(e) {
                                return D(e.firstChild);
                            },
                            contents: function(e) {
                                return void 0 !== e.contentDocument ?
                                    e.contentDocument :
                                    (I(e, "template") && (e = e.content || e),
                                        C.merge([], e.childNodes));
                            },
                        },
                        function(e, t) {
                            C.fn[e] = function(n, i) {
                                var o = C.map(this, t, n);
                                return (
                                    "Until" !== e.slice(-5) && (i = n),
                                    i && "string" == typeof i && (o = C.filter(i, o)),
                                    this.length > 1 &&
                                    (P[e] || C.uniqueSort(o), M.test(e) && o.reverse()),
                                    this.pushStack(o)
                                );
                            };
                        }
                    );
                var z = /[^\x20\t\r\n\f]+/g;

                function $(e) {
                    return e;
                }

                function F(e) {
                    throw e;
                }

                function q(e, t, n, i) {
                    var o;
                    try {
                        e && y((o = e.promise)) ?
                            o.call(e).done(t).fail(n) :
                            e && y((o = e.then)) ?
                            o.call(e, t, n) :
                            t.apply(void 0, [e].slice(i));
                    } catch (e) {
                        n.apply(void 0, [e]);
                    }
                }
                (C.Callbacks = function(e) {
                    e =
                        "string" == typeof e ?
                        (function(e) {
                            var t = {};
                            return (
                                C.each(e.match(z) || [], function(e, n) {
                                    t[n] = !0;
                                }),
                                t
                            );
                        })(e) :
                        C.extend({}, e);
                    var t,
                        n,
                        i,
                        o,
                        r = [],
                        s = [],
                        a = -1,
                        l = function() {
                            for (o = o || e.once, i = t = !0; s.length; a = -1)
                                for (n = s.shift(); ++a < r.length;)
                                    !1 === r[a].apply(n[0], n[1]) &&
                                    e.stopOnFalse &&
                                    ((a = r.length), (n = !1));
                            e.memory || (n = !1), (t = !1), o && (r = n ? [] : "");
                        },
                        c = {
                            add: function() {
                                return (
                                    r &&
                                    (n && !t && ((a = r.length - 1), s.push(n)),
                                        (function t(n) {
                                            C.each(n, function(n, i) {
                                                y(i) ?
                                                    (e.unique && c.has(i)) || r.push(i) :
                                                    i && i.length && "string" !== _(i) && t(i);
                                            });
                                        })(arguments),
                                        n && !t && l()),
                                    this
                                );
                            },
                            remove: function() {
                                return (
                                    C.each(arguments, function(e, t) {
                                        for (var n;
                                            (n = C.inArray(t, r, n)) > -1;)
                                            r.splice(n, 1), n <= a && a--;
                                    }),
                                    this
                                );
                            },
                            has: function(e) {
                                return e ? C.inArray(e, r) > -1 : r.length > 0;
                            },
                            empty: function() {
                                return r && (r = []), this;
                            },
                            disable: function() {
                                return (o = s = []), (r = n = ""), this;
                            },
                            disabled: function() {
                                return !r;
                            },
                            lock: function() {
                                return (o = s = []), n || t || (r = n = ""), this;
                            },
                            locked: function() {
                                return !!o;
                            },
                            fireWith: function(e, n) {
                                return (
                                    o ||
                                    ((n = [e, (n = n || []).slice ? n.slice() : n]),
                                        s.push(n),
                                        t || l()),
                                    this
                                );
                            },
                            fire: function() {
                                return c.fireWith(this, arguments), this;
                            },
                            fired: function() {
                                return !!i;
                            },
                        };
                    return c;
                }),
                C.extend({
                    Deferred: function(e) {
                        var t = [
                                [
                                    "notify",
                                    "progress",
                                    C.Callbacks("memory"),
                                    C.Callbacks("memory"),
                                    2,
                                ],
                                [
                                    "resolve",
                                    "done",
                                    C.Callbacks("once memory"),
                                    C.Callbacks("once memory"),
                                    0,
                                    "resolved",
                                ],
                                [
                                    "reject",
                                    "fail",
                                    C.Callbacks("once memory"),
                                    C.Callbacks("once memory"),
                                    1,
                                    "rejected",
                                ],
                            ],
                            i = "pending",
                            o = {
                                state: function() {
                                    return i;
                                },
                                always: function() {
                                    return r.done(arguments).fail(arguments), this;
                                },
                                catch: function(e) {
                                    return o.then(null, e);
                                },
                                pipe: function() {
                                    var e = arguments;
                                    return C.Deferred(function(n) {
                                        C.each(t, function(t, i) {
                                                var o = y(e[i[4]]) && e[i[4]];
                                                r[i[1]](function() {
                                                    var e = o && o.apply(this, arguments);
                                                    e && y(e.promise) ?
                                                        e
                                                        .promise()
                                                        .progress(n.notify)
                                                        .done(n.resolve)
                                                        .fail(n.reject) :
                                                        n[i[0] + "With"](this, o ? [e] : arguments);
                                                });
                                            }),
                                            (e = null);
                                    }).promise();
                                },
                                then: function(e, i, o) {
                                    var r = 0;

                                    function s(e, t, i, o) {
                                        return function() {
                                            var a = this,
                                                l = arguments,
                                                c = function() {
                                                    var n, c;
                                                    if (!(e < r)) {
                                                        if ((n = i.apply(a, l)) === t.promise())
                                                            throw new TypeError("Thenable self-resolution");
                                                        (c =
                                                            n &&
                                                            ("object" == typeof n ||
                                                                "function" == typeof n) &&
                                                            n.then),
                                                        y(c) ?
                                                            o ?
                                                            c.call(n, s(r, t, $, o), s(r, t, F, o)) :
                                                            (r++,
                                                                c.call(
                                                                    n,
                                                                    s(r, t, $, o),
                                                                    s(r, t, F, o),
                                                                    s(r, t, $, t.notifyWith)
                                                                )) :
                                                            (i !== $ && ((a = void 0), (l = [n])),
                                                                (o || t.resolveWith)(a, l));
                                                    }
                                                },
                                                u = o ?
                                                c :
                                                function() {
                                                    try {
                                                        c();
                                                    } catch (n) {
                                                        C.Deferred.exceptionHook &&
                                                            C.Deferred.exceptionHook(n, u.stackTrace),
                                                            e + 1 >= r &&
                                                            (i !== F && ((a = void 0), (l = [n])),
                                                                t.rejectWith(a, l));
                                                    }
                                                };
                                            e
                                                ?
                                                u() :
                                                (C.Deferred.getStackHook &&
                                                    (u.stackTrace = C.Deferred.getStackHook()),
                                                    n.setTimeout(u));
                                        };
                                    }
                                    return C.Deferred(function(n) {
                                        t[0][3].add(s(0, n, y(o) ? o : $, n.notifyWith)),
                                            t[1][3].add(s(0, n, y(e) ? e : $)),
                                            t[2][3].add(s(0, n, y(i) ? i : F));
                                    }).promise();
                                },
                                promise: function(e) {
                                    return null != e ? C.extend(e, o) : o;
                                },
                            },
                            r = {};
                        return (
                            C.each(t, function(e, n) {
                                var s = n[2],
                                    a = n[5];
                                (o[n[1]] = s.add),
                                a &&
                                    s.add(
                                        function() {
                                            i = a;
                                        },
                                        t[3 - e][2].disable,
                                        t[3 - e][3].disable,
                                        t[0][2].lock,
                                        t[0][3].lock
                                    ),
                                    s.add(n[3].fire),
                                    (r[n[0]] = function() {
                                        return (
                                            r[n[0] + "With"](this === r ? void 0 : this, arguments),
                                            this
                                        );
                                    }),
                                    (r[n[0] + "With"] = s.fireWith);
                            }),
                            o.promise(r),
                            e && e.call(r, r),
                            r
                        );
                    },
                    when: function(e) {
                        var t = arguments.length,
                            n = t,
                            i = Array(n),
                            o = l.call(arguments),
                            r = C.Deferred(),
                            s = function(e) {
                                return function(n) {
                                    (i[e] = this),
                                    (o[e] = arguments.length > 1 ? l.call(arguments) : n),
                                    --t || r.resolveWith(i, o);
                                };
                            };
                        if (
                            t <= 1 &&
                            (q(e, r.done(s(n)).resolve, r.reject, !t),
                                "pending" === r.state() || y(o[n] && o[n].then))
                        )
                            return r.then();
                        for (; n--;) q(o[n], s(n), r.reject);
                        return r.promise();
                    },
                });
                var H = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
                (C.Deferred.exceptionHook = function(e, t) {
                    n.console &&
                        n.console.warn &&
                        e &&
                        H.test(e.name) &&
                        n.console.warn(
                            "jQuery.Deferred exception: " + e.message,
                            e.stack,
                            t
                        );
                }),
                (C.readyException = function(e) {
                    n.setTimeout(function() {
                        throw e;
                    });
                });
                var W = C.Deferred();

                function B() {
                    s.removeEventListener("DOMContentLoaded", B),
                        n.removeEventListener("load", B),
                        C.ready();
                }
                (C.fn.ready = function(e) {
                    return (
                        W.then(e).catch(function(e) {
                            C.readyException(e);
                        }),
                        this
                    );
                }),
                C.extend({
                        isReady: !1,
                        readyWait: 1,
                        ready: function(e) {
                            (!0 === e ? --C.readyWait : C.isReady) ||
                            ((C.isReady = !0),
                                (!0 !== e && --C.readyWait > 0) || W.resolveWith(s, [C]));
                        },
                    }),
                    (C.ready.then = W.then),
                    "complete" === s.readyState ||
                    ("loading" !== s.readyState && !s.documentElement.doScroll) ?
                    n.setTimeout(C.ready) :
                    (s.addEventListener("DOMContentLoaded", B),
                        n.addEventListener("load", B));
                var Z = function(e, t, n, i, o, r, s) {
                        var a = 0,
                            l = e.length,
                            c = null == n;
                        if ("object" === _(n))
                            for (a in ((o = !0), n)) Z(e, t, a, n[a], !0, r, s);
                        else if (
                            void 0 !== i &&
                            ((o = !0),
                                y(i) || (s = !0),
                                c &&
                                (s ?
                                    (t.call(e, i), (t = null)) :
                                    ((c = t),
                                        (t = function(e, t, n) {
                                            return c.call(C(e), n);
                                        }))),
                                t)
                        )
                            for (; a < l; a++)
                                t(e[a], n, s ? i : i.call(e[a], a, t(e[a], n)));
                        return o ? e : c ? t.call(e) : l ? t(e[0], n) : r;
                    },
                    U = /^-ms-/,
                    V = /-([a-z])/g;

                function X(e, t) {
                    return t.toUpperCase();
                }

                function K(e) {
                    return e.replace(U, "ms-").replace(V, X);
                }
                var Y = function(e) {
                    return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType;
                };

                function G() {
                    this.expando = C.expando + G.uid++;
                }
                (G.uid = 1),
                (G.prototype = {
                    cache: function(e) {
                        var t = e[this.expando];
                        return (
                            t ||
                            ((t = {}),
                                Y(e) &&
                                (e.nodeType ?
                                    (e[this.expando] = t) :
                                    Object.defineProperty(e, this.expando, {
                                        value: t,
                                        configurable: !0,
                                    }))),
                            t
                        );
                    },
                    set: function(e, t, n) {
                        var i,
                            o = this.cache(e);
                        if ("string" == typeof t) o[K(t)] = n;
                        else
                            for (i in t) o[K(i)] = t[i];
                        return o;
                    },
                    get: function(e, t) {
                        return void 0 === t ?
                            this.cache(e) :
                            e[this.expando] && e[this.expando][K(t)];
                    },
                    access: function(e, t, n) {
                        return void 0 === t || (t && "string" == typeof t && void 0 === n) ?
                            this.get(e, t) :
                            (this.set(e, t, n), void 0 !== n ? n : t);
                    },
                    remove: function(e, t) {
                        var n,
                            i = e[this.expando];
                        if (void 0 !== i) {
                            if (void 0 !== t) {
                                n = (t = Array.isArray(t) ?
                                    t.map(K) :
                                    (t = K(t)) in i ?
                                    [t] :
                                    t.match(z) || []).length;
                                for (; n--;) delete i[t[n]];
                            }
                            (void 0 === t || C.isEmptyObject(i)) &&
                            (e.nodeType ?
                                (e[this.expando] = void 0) :
                                delete e[this.expando]);
                        }
                    },
                    hasData: function(e) {
                        var t = e[this.expando];
                        return void 0 !== t && !C.isEmptyObject(t);
                    },
                });
                var J = new G(),
                    Q = new G(),
                    ee = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
                    te = /[A-Z]/g;

                function ne(e, t, n) {
                    var i;
                    if (void 0 === n && 1 === e.nodeType)
                        if (
                            ((i = "data-" + t.replace(te, "-$&").toLowerCase()),
                                "string" == typeof(n = e.getAttribute(i)))
                        ) {
                            try {
                                n = (function(e) {
                                    return (
                                        "true" === e ||
                                        ("false" !== e &&
                                            ("null" === e ?
                                                null :
                                                e === +e + "" ?
                                                +e :
                                                ee.test(e) ?
                                                JSON.parse(e) :
                                                e))
                                    );
                                })(n);
                            } catch (e) {}
                            Q.set(e, t, n);
                        } else n = void 0;
                    return n;
                }
                C.extend({
                        hasData: function(e) {
                            return Q.hasData(e) || J.hasData(e);
                        },
                        data: function(e, t, n) {
                            return Q.access(e, t, n);
                        },
                        removeData: function(e, t) {
                            Q.remove(e, t);
                        },
                        _data: function(e, t, n) {
                            return J.access(e, t, n);
                        },
                        _removeData: function(e, t) {
                            J.remove(e, t);
                        },
                    }),
                    C.fn.extend({
                        data: function(e, t) {
                            var n,
                                i,
                                o,
                                r = this[0],
                                s = r && r.attributes;
                            if (void 0 === e) {
                                if (
                                    this.length &&
                                    ((o = Q.get(r)),
                                        1 === r.nodeType && !J.get(r, "hasDataAttrs"))
                                ) {
                                    for (n = s.length; n--;)
                                        s[n] &&
                                        0 === (i = s[n].name).indexOf("data-") &&
                                        ((i = K(i.slice(5))), ne(r, i, o[i]));
                                    J.set(r, "hasDataAttrs", !0);
                                }
                                return o;
                            }
                            return "object" == typeof e ?
                                this.each(function() {
                                    Q.set(this, e);
                                }) :
                                Z(
                                    this,
                                    function(t) {
                                        var n;
                                        if (r && void 0 === t)
                                            return void 0 !== (n = Q.get(r, e)) ?
                                                n :
                                                void 0 !== (n = ne(r, e)) ?
                                                n :
                                                void 0;
                                        this.each(function() {
                                            Q.set(this, e, t);
                                        });
                                    },
                                    null,
                                    t,
                                    arguments.length > 1,
                                    null, !0
                                );
                        },
                        removeData: function(e) {
                            return this.each(function() {
                                Q.remove(this, e);
                            });
                        },
                    }),
                    C.extend({
                        queue: function(e, t, n) {
                            var i;
                            if (e)
                                return (
                                    (t = (t || "fx") + "queue"),
                                    (i = J.get(e, t)),
                                    n &&
                                    (!i || Array.isArray(n) ?
                                        (i = J.access(e, t, C.makeArray(n))) :
                                        i.push(n)),
                                    i || []
                                );
                        },
                        dequeue: function(e, t) {
                            t = t || "fx";
                            var n = C.queue(e, t),
                                i = n.length,
                                o = n.shift(),
                                r = C._queueHooks(e, t);
                            "inprogress" === o && ((o = n.shift()), i--),
                                o &&
                                ("fx" === t && n.unshift("inprogress"),
                                    delete r.stop,
                                    o.call(
                                        e,
                                        function() {
                                            C.dequeue(e, t);
                                        },
                                        r
                                    )), !i && r && r.empty.fire();
                        },
                        _queueHooks: function(e, t) {
                            var n = t + "queueHooks";
                            return (
                                J.get(e, n) ||
                                J.access(e, n, {
                                    empty: C.Callbacks("once memory").add(function() {
                                        J.remove(e, [t + "queue", n]);
                                    }),
                                })
                            );
                        },
                    }),
                    C.fn.extend({
                        queue: function(e, t) {
                            var n = 2;
                            return (
                                "string" != typeof e && ((t = e), (e = "fx"), n--),
                                arguments.length < n ?
                                C.queue(this[0], e) :
                                void 0 === t ?
                                this :
                                this.each(function() {
                                    var n = C.queue(this, e, t);
                                    C._queueHooks(this, e),
                                        "fx" === e &&
                                        "inprogress" !== n[0] &&
                                        C.dequeue(this, e);
                                })
                            );
                        },
                        dequeue: function(e) {
                            return this.each(function() {
                                C.dequeue(this, e);
                            });
                        },
                        clearQueue: function(e) {
                            return this.queue(e || "fx", []);
                        },
                        promise: function(e, t) {
                            var n,
                                i = 1,
                                o = C.Deferred(),
                                r = this,
                                s = this.length,
                                a = function() {
                                    --i || o.resolveWith(r, [r]);
                                };
                            for (
                                "string" != typeof e && ((t = e), (e = void 0)), e = e || "fx"; s--;

                            )
                                (n = J.get(r[s], e + "queueHooks")) &&
                                n.empty &&
                                (i++, n.empty.add(a));
                            return a(), o.promise(t);
                        },
                    });
                var ie = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
                    oe = new RegExp("^(?:([+-])=|)(" + ie + ")([a-z%]*)$", "i"),
                    re = ["Top", "Right", "Bottom", "Left"],
                    se = s.documentElement,
                    ae = function(e) {
                        return C.contains(e.ownerDocument, e);
                    },
                    le = { composed: !0 };
                se.getRootNode &&
                    (ae = function(e) {
                        return (
                            C.contains(e.ownerDocument, e) ||
                            e.getRootNode(le) === e.ownerDocument
                        );
                    });
                var ce = function(e, t) {
                        return (
                            "none" === (e = t || e).style.display ||
                            ("" === e.style.display &&
                                ae(e) &&
                                "none" === C.css(e, "display"))
                        );
                    },
                    ue = function(e, t, n, i) {
                        var o,
                            r,
                            s = {};
                        for (r in t)(s[r] = e.style[r]), (e.style[r] = t[r]);
                        for (r in ((o = n.apply(e, i || [])), t)) e.style[r] = s[r];
                        return o;
                    };

                function de(e, t, n, i) {
                    var o,
                        r,
                        s = 20,
                        a = i ?

                        function() {
                            return i.cur();
                        } :
                        function() {
                            return C.css(e, t, "");
                        },
                        l = a(),
                        c = (n && n[3]) || (C.cssNumber[t] ? "" : "px"),
                        u =
                        e.nodeType &&
                        (C.cssNumber[t] || ("px" !== c && +l)) &&
                        oe.exec(C.css(e, t));
                    if (u && u[3] !== c) {
                        for (l /= 2, c = c || u[3], u = +l || 1; s--;)
                            C.style(e, t, u + c),
                            (1 - r) * (1 - (r = a() / l || 0.5)) <= 0 && (s = 0),
                            (u /= r);
                        (u *= 2), C.style(e, t, u + c), (n = n || []);
                    }
                    return (
                        n &&
                        ((u = +u || +l || 0),
                            (o = n[1] ? u + (n[1] + 1) * n[2] : +n[2]),
                            i && ((i.unit = c), (i.start = u), (i.end = o))),
                        o
                    );
                }
                var pe = {};

                function he(e) {
                    var t,
                        n = e.ownerDocument,
                        i = e.nodeName,
                        o = pe[i];
                    return (
                        o ||
                        ((t = n.body.appendChild(n.createElement(i))),
                            (o = C.css(t, "display")),
                            t.parentNode.removeChild(t),
                            "none" === o && (o = "block"),
                            (pe[i] = o),
                            o)
                    );
                }

                function fe(e, t) {
                    for (var n, i, o = [], r = 0, s = e.length; r < s; r++)
                        (i = e[r]).style &&
                        ((n = i.style.display),
                            t ?
                            ("none" === n &&
                                ((o[r] = J.get(i, "display") || null),
                                    o[r] || (i.style.display = "")),
                                "" === i.style.display && ce(i) && (o[r] = he(i))) :
                            "none" !== n && ((o[r] = "none"), J.set(i, "display", n)));
                    for (r = 0; r < s; r++) null != o[r] && (e[r].style.display = o[r]);
                    return e;
                }
                C.fn.extend({
                    show: function() {
                        return fe(this, !0);
                    },
                    hide: function() {
                        return fe(this);
                    },
                    toggle: function(e) {
                        return "boolean" == typeof e ?
                            e ?
                            this.show() :
                            this.hide() :
                            this.each(function() {
                                ce(this) ? C(this).show() : C(this).hide();
                            });
                    },
                });
                var me = /^(?:checkbox|radio)$/i,
                    ge = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i,
                    ve = /^$|^module$|\/(?:java|ecma)script/i,
                    ye = {
                        option: [1, "<select multiple='multiple'>", "</select>"],
                        thead: [1, "<table>", "</table>"],
                        col: [2, "<table><colgroup>", "</colgroup></table>"],
                        tr: [2, "<table><tbody>", "</tbody></table>"],
                        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                        _default: [0, "", ""],
                    };

                function we(e, t) {
                    var n;
                    return (
                        (n =
                            void 0 !== e.getElementsByTagName ?
                            e.getElementsByTagName(t || "*") :
                            void 0 !== e.querySelectorAll ?
                            e.querySelectorAll(t || "*") :
                            []),
                        void 0 === t || (t && I(e, t)) ? C.merge([e], n) : n
                    );
                }

                function xe(e, t) {
                    for (var n = 0, i = e.length; n < i; n++)
                        J.set(e[n], "globalEval", !t || J.get(t[n], "globalEval"));
                }
                (ye.optgroup = ye.option),
                (ye.tbody = ye.tfoot = ye.colgroup = ye.caption = ye.thead),
                (ye.th = ye.td);
                var be,
                    _e,
                    Ce = /<|&#?\w+;/;

                function Te(e, t, n, i, o) {
                    for (
                        var r,
                            s,
                            a,
                            l,
                            c,
                            u,
                            d = t.createDocumentFragment(),
                            p = [],
                            h = 0,
                            f = e.length; h < f; h++
                    )
                        if ((r = e[h]) || 0 === r)
                            if ("object" === _(r)) C.merge(p, r.nodeType ? [r] : r);
                            else if (Ce.test(r)) {
                        for (
                            s = s || d.appendChild(t.createElement("div")),
                            a = (ge.exec(r) || ["", ""])[1].toLowerCase(),
                            l = ye[a] || ye._default,
                            s.innerHTML = l[1] + C.htmlPrefilter(r) + l[2],
                            u = l[0]; u--;

                        )
                            s = s.lastChild;
                        C.merge(p, s.childNodes), ((s = d.firstChild).textContent = "");
                    } else p.push(t.createTextNode(r));
                    for (d.textContent = "", h = 0;
                        (r = p[h++]);)
                        if (i && C.inArray(r, i) > -1) o && o.push(r);
                        else if (
                        ((c = ae(r)), (s = we(d.appendChild(r), "script")), c && xe(s), n)
                    )
                        for (u = 0;
                            (r = s[u++]);) ve.test(r.type || "") && n.push(r);
                    return d;
                }
                (be = s.createDocumentFragment().appendChild(s.createElement("div"))),
                (_e = s.createElement("input")).setAttribute("type", "radio"),
                    _e.setAttribute("checked", "checked"),
                    _e.setAttribute("name", "t"),
                    be.appendChild(_e),
                    (v.checkClone = be.cloneNode(!0).cloneNode(!0).lastChild.checked),
                    (be.innerHTML = "<textarea>x</textarea>"),
                    (v.noCloneChecked = !!be.cloneNode(!0).lastChild.defaultValue);
                var Ee = /^key/,
                    ke = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
                    Se = /^([^.]*)(?:\.(.+)|)/;

                function De() {
                    return !0;
                }

                function Ae() {
                    return !1;
                }

                function Ie(e, t) {
                    return (
                        (e ===
                            (function() {
                                try {
                                    return s.activeElement;
                                } catch (e) {}
                            })()) ==
                        ("focus" === t)
                    );
                }

                function je(e, t, n, i, o, r) {
                    var s, a;
                    if ("object" == typeof t) {
                        for (a in ("string" != typeof n && ((i = i || n), (n = void 0)), t))
                            je(e, a, n, i, t[a], r);
                        return e;
                    }
                    if (
                        (null == i && null == o ?
                            ((o = n), (i = n = void 0)) :
                            null == o &&
                            ("string" == typeof n ?
                                ((o = i), (i = void 0)) :
                                ((o = i), (i = n), (n = void 0))), !1 === o)
                    )
                        o = Ae;
                    else if (!o) return e;
                    return (
                        1 === r &&
                        ((s = o),
                            ((o = function(e) {
                                return C().off(e), s.apply(this, arguments);
                            }).guid = s.guid || (s.guid = C.guid++))),
                        e.each(function() {
                            C.event.add(this, t, o, i, n);
                        })
                    );
                }

                function Oe(e, t, n) {
                    n
                        ?
                        (J.set(e, t, !1),
                            C.event.add(e, t, {
                                namespace: !1,
                                handler: function(e) {
                                    var i,
                                        o,
                                        r = J.get(this, t);
                                    if (1 & e.isTrigger && this[t]) {
                                        if (r.length)
                                            (C.event.special[t] || {}).delegateType &&
                                            e.stopPropagation();
                                        else if (
                                            ((r = l.call(arguments)),
                                                J.set(this, t, r),
                                                (i = n(this, t)),
                                                this[t](),
                                                r !== (o = J.get(this, t)) || i ?
                                                J.set(this, t, !1) :
                                                (o = {}),
                                                r !== o)
                                        )
                                            return (
                                                e.stopImmediatePropagation(),
                                                e.preventDefault(),
                                                o.value
                                            );
                                    } else
                                        r.length &&
                                        (J.set(this, t, {
                                                value: C.event.trigger(
                                                    C.extend(r[0], C.Event.prototype),
                                                    r.slice(1),
                                                    this
                                                ),
                                            }),
                                            e.stopImmediatePropagation());
                                },
                            })) :
                        void 0 === J.get(e, t) && C.event.add(e, t, De);
                }
                (C.event = {
                    global: {},
                    add: function(e, t, n, i, o) {
                        var r,
                            s,
                            a,
                            l,
                            c,
                            u,
                            d,
                            p,
                            h,
                            f,
                            m,
                            g = J.get(e);
                        if (g)
                            for (
                                n.handler && ((n = (r = n).handler), (o = r.selector)),
                                o && C.find.matchesSelector(se, o),
                                n.guid || (n.guid = C.guid++),
                                (l = g.events) || (l = g.events = {}),
                                (s = g.handle) ||
                                (s = g.handle =
                                    function(t) {
                                        return void 0 !== C && C.event.triggered !== t.type ?
                                            C.event.dispatch.apply(e, arguments) :
                                            void 0;
                                    }),
                                c = (t = (t || "").match(z) || [""]).length; c--;

                            )
                                (h = m = (a = Se.exec(t[c]) || [])[1]),
                                (f = (a[2] || "").split(".").sort()),
                                h &&
                                ((d = C.event.special[h] || {}),
                                    (h = (o ? d.delegateType : d.bindType) || h),
                                    (d = C.event.special[h] || {}),
                                    (u = C.extend({
                                            type: h,
                                            origType: m,
                                            data: i,
                                            handler: n,
                                            guid: n.guid,
                                            selector: o,
                                            needsContext: o && C.expr.match.needsContext.test(o),
                                            namespace: f.join("."),
                                        },
                                        r
                                    )),
                                    (p = l[h]) ||
                                    (((p = l[h] = []).delegateCount = 0),
                                        (d.setup && !1 !== d.setup.call(e, i, f, s)) ||
                                        (e.addEventListener && e.addEventListener(h, s))),
                                    d.add &&
                                    (d.add.call(e, u),
                                        u.handler.guid || (u.handler.guid = n.guid)),
                                    o ? p.splice(p.delegateCount++, 0, u) : p.push(u),
                                    (C.event.global[h] = !0));
                    },
                    remove: function(e, t, n, i, o) {
                        var r,
                            s,
                            a,
                            l,
                            c,
                            u,
                            d,
                            p,
                            h,
                            f,
                            m,
                            g = J.hasData(e) && J.get(e);
                        if (g && (l = g.events)) {
                            for (c = (t = (t || "").match(z) || [""]).length; c--;)
                                if (
                                    ((h = m = (a = Se.exec(t[c]) || [])[1]),
                                        (f = (a[2] || "").split(".").sort()),
                                        h)
                                ) {
                                    for (
                                        d = C.event.special[h] || {},
                                        p = l[(h = (i ? d.delegateType : d.bindType) || h)] || [],
                                        a =
                                        a[2] &&
                                        new RegExp(
                                            "(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)"
                                        ),
                                        s = r = p.length; r--;

                                    )
                                        (u = p[r]),
                                        (!o && m !== u.origType) ||
                                        (n && n.guid !== u.guid) ||
                                        (a && !a.test(u.namespace)) ||
                                        (i &&
                                            i !== u.selector &&
                                            ("**" !== i || !u.selector)) ||
                                        (p.splice(r, 1),
                                            u.selector && p.delegateCount--,
                                            d.remove && d.remove.call(e, u));
                                    s &&
                                        !p.length &&
                                        ((d.teardown && !1 !== d.teardown.call(e, f, g.handle)) ||
                                            C.removeEvent(e, h, g.handle),
                                            delete l[h]);
                                } else
                                    for (h in l) C.event.remove(e, h + t[c], n, i, !0);
                            C.isEmptyObject(l) && J.remove(e, "handle events");
                        }
                    },
                    dispatch: function(e) {
                        var t,
                            n,
                            i,
                            o,
                            r,
                            s,
                            a = C.event.fix(e),
                            l = new Array(arguments.length),
                            c = (J.get(this, "events") || {})[a.type] || [],
                            u = C.event.special[a.type] || {};
                        for (l[0] = a, t = 1; t < arguments.length; t++)
                            l[t] = arguments[t];
                        if (
                            ((a.delegateTarget = this), !u.preDispatch || !1 !== u.preDispatch.call(this, a))
                        ) {
                            for (
                                s = C.event.handlers.call(this, a, c), t = 0;
                                (o = s[t++]) && !a.isPropagationStopped();

                            )
                                for (
                                    a.currentTarget = o.elem, n = 0;
                                    (r = o.handlers[n++]) && !a.isImmediatePropagationStopped();

                                )
                                    (a.rnamespace &&
                                        !1 !== r.namespace &&
                                        !a.rnamespace.test(r.namespace)) ||
                                    ((a.handleObj = r),
                                        (a.data = r.data),
                                        void 0 !==
                                        (i = (
                                            (C.event.special[r.origType] || {}).handle || r.handler
                                        ).apply(o.elem, l)) &&
                                        !1 === (a.result = i) &&
                                        (a.preventDefault(), a.stopPropagation()));
                            return u.postDispatch && u.postDispatch.call(this, a), a.result;
                        }
                    },
                    handlers: function(e, t) {
                        var n,
                            i,
                            o,
                            r,
                            s,
                            a = [],
                            l = t.delegateCount,
                            c = e.target;
                        if (l && c.nodeType && !("click" === e.type && e.button >= 1))
                            for (; c !== this; c = c.parentNode || this)
                                if (
                                    1 === c.nodeType &&
                                    ("click" !== e.type || !0 !== c.disabled)
                                ) {
                                    for (r = [], s = {}, n = 0; n < l; n++)
                                        void 0 === s[(o = (i = t[n]).selector + " ")] &&
                                        (s[o] = i.needsContext ?
                                            C(o, this).index(c) > -1 :
                                            C.find(o, this, null, [c]).length),
                                        s[o] && r.push(i);
                                    r.length && a.push({ elem: c, handlers: r });
                                }
                        return (
                            (c = this),
                            l < t.length && a.push({ elem: c, handlers: t.slice(l) }),
                            a
                        );
                    },
                    addProp: function(e, t) {
                        Object.defineProperty(C.Event.prototype, e, {
                            enumerable: !0,
                            configurable: !0,
                            get: y(t) ?

                                function() {
                                    if (this.originalEvent) return t(this.originalEvent);
                                } :
                                function() {
                                    if (this.originalEvent) return this.originalEvent[e];
                                },
                            set: function(t) {
                                Object.defineProperty(this, e, {
                                    enumerable: !0,
                                    configurable: !0,
                                    writable: !0,
                                    value: t,
                                });
                            },
                        });
                    },
                    fix: function(e) {
                        return e[C.expando] ? e : new C.Event(e);
                    },
                    special: {
                        load: { noBubble: !0 },
                        click: {
                            setup: function(e) {
                                var t = this || e;
                                return (
                                    me.test(t.type) &&
                                    t.click &&
                                    I(t, "input") &&
                                    Oe(t, "click", De), !1
                                );
                            },
                            trigger: function(e) {
                                var t = this || e;
                                return (
                                    me.test(t.type) && t.click && I(t, "input") && Oe(t, "click"), !0
                                );
                            },
                            _default: function(e) {
                                var t = e.target;
                                return (
                                    (me.test(t.type) &&
                                        t.click &&
                                        I(t, "input") &&
                                        J.get(t, "click")) ||
                                    I(t, "a")
                                );
                            },
                        },
                        beforeunload: {
                            postDispatch: function(e) {
                                void 0 !== e.result &&
                                    e.originalEvent &&
                                    (e.originalEvent.returnValue = e.result);
                            },
                        },
                    },
                }),
                (C.removeEvent = function(e, t, n) {
                    e.removeEventListener && e.removeEventListener(t, n);
                }),
                (C.Event = function(e, t) {
                    if (!(this instanceof C.Event)) return new C.Event(e, t);
                    e && e.type ?
                        ((this.originalEvent = e),
                            (this.type = e.type),
                            (this.isDefaultPrevented =
                                e.defaultPrevented ||
                                (void 0 === e.defaultPrevented && !1 === e.returnValue) ?
                                De :
                                Ae),
                            (this.target =
                                e.target && 3 === e.target.nodeType ?
                                e.target.parentNode :
                                e.target),
                            (this.currentTarget = e.currentTarget),
                            (this.relatedTarget = e.relatedTarget)) :
                        (this.type = e),
                        t && C.extend(this, t),
                        (this.timeStamp = (e && e.timeStamp) || Date.now()),
                        (this[C.expando] = !0);
                }),
                (C.Event.prototype = {
                    constructor: C.Event,
                    isDefaultPrevented: Ae,
                    isPropagationStopped: Ae,
                    isImmediatePropagationStopped: Ae,
                    isSimulated: !1,
                    preventDefault: function() {
                        var e = this.originalEvent;
                        (this.isDefaultPrevented = De),
                        e && !this.isSimulated && e.preventDefault();
                    },
                    stopPropagation: function() {
                        var e = this.originalEvent;
                        (this.isPropagationStopped = De),
                        e && !this.isSimulated && e.stopPropagation();
                    },
                    stopImmediatePropagation: function() {
                        var e = this.originalEvent;
                        (this.isImmediatePropagationStopped = De),
                        e && !this.isSimulated && e.stopImmediatePropagation(),
                            this.stopPropagation();
                    },
                }),
                C.each({
                            altKey: !0,
                            bubbles: !0,
                            cancelable: !0,
                            changedTouches: !0,
                            ctrlKey: !0,
                            detail: !0,
                            eventPhase: !0,
                            metaKey: !0,
                            pageX: !0,
                            pageY: !0,
                            shiftKey: !0,
                            view: !0,
                            char: !0,
                            code: !0,
                            charCode: !0,
                            key: !0,
                            keyCode: !0,
                            button: !0,
                            buttons: !0,
                            clientX: !0,
                            clientY: !0,
                            offsetX: !0,
                            offsetY: !0,
                            pointerId: !0,
                            pointerType: !0,
                            screenX: !0,
                            screenY: !0,
                            targetTouches: !0,
                            toElement: !0,
                            touches: !0,
                            which: function(e) {
                                var t = e.button;
                                return null == e.which && Ee.test(e.type) ?
                                    null != e.charCode ?
                                    e.charCode :
                                    e.keyCode :
                                    !e.which && void 0 !== t && ke.test(e.type) ?
                                    1 & t ?
                                    1 :
                                    2 & t ?
                                    3 :
                                    4 & t ?
                                    2 :
                                    0 :
                                    e.which;
                            },
                        },
                        C.event.addProp
                    ),
                    C.each({ focus: "focusin", blur: "focusout" }, function(e, t) {
                        C.event.special[e] = {
                            setup: function() {
                                return Oe(this, e, Ie), !1;
                            },
                            trigger: function() {
                                return Oe(this, e), !0;
                            },
                            delegateType: t,
                        };
                    }),
                    C.each({
                            mouseenter: "mouseover",
                            mouseleave: "mouseout",
                            pointerenter: "pointerover",
                            pointerleave: "pointerout",
                        },
                        function(e, t) {
                            C.event.special[e] = {
                                delegateType: t,
                                bindType: t,
                                handle: function(e) {
                                    var n,
                                        i = this,
                                        o = e.relatedTarget,
                                        r = e.handleObj;
                                    return (
                                        (o && (o === i || C.contains(i, o))) ||
                                        ((e.type = r.origType),
                                            (n = r.handler.apply(this, arguments)),
                                            (e.type = t)),
                                        n
                                    );
                                },
                            };
                        }
                    ),
                    C.fn.extend({
                        on: function(e, t, n, i) {
                            return je(this, e, t, n, i);
                        },
                        one: function(e, t, n, i) {
                            return je(this, e, t, n, i, 1);
                        },
                        off: function(e, t, n) {
                            var i, o;
                            if (e && e.preventDefault && e.handleObj)
                                return (
                                    (i = e.handleObj),
                                    C(e.delegateTarget).off(
                                        i.namespace ? i.origType + "." + i.namespace : i.origType,
                                        i.selector,
                                        i.handler
                                    ),
                                    this
                                );
                            if ("object" == typeof e) {
                                for (o in e) this.off(o, t, e[o]);
                                return this;
                            }
                            return (
                                (!1 !== t && "function" != typeof t) || ((n = t), (t = void 0)), !1 === n && (n = Ae),
                                this.each(function() {
                                    C.event.remove(this, e, n, t);
                                })
                            );
                        },
                    });
                var Le =
                    /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
                    Ne = /<script|<style|<link/i,
                    Me = /checked\s*(?:[^=]|=\s*.checked.)/i,
                    Pe = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

                function Re(e, t) {
                    return (
                        (I(e, "table") &&
                            I(11 !== t.nodeType ? t : t.firstChild, "tr") &&
                            C(e).children("tbody")[0]) ||
                        e
                    );
                }

                function ze(e) {
                    return (e.type = (null !== e.getAttribute("type")) + "/" + e.type), e;
                }

                function $e(e) {
                    return (
                        "true/" === (e.type || "").slice(0, 5) ?
                        (e.type = e.type.slice(5)) :
                        e.removeAttribute("type"),
                        e
                    );
                }

                function Fe(e, t) {
                    var n, i, o, r, s, a, l, c;
                    if (1 === t.nodeType) {
                        if (
                            J.hasData(e) &&
                            ((r = J.access(e)), (s = J.set(t, r)), (c = r.events))
                        )
                            for (o in (delete s.handle, (s.events = {}), c))
                                for (n = 0, i = c[o].length; n < i; n++)
                                    C.event.add(t, o, c[o][n]);
                        Q.hasData(e) &&
                            ((a = Q.access(e)), (l = C.extend({}, a)), Q.set(t, l));
                    }
                }

                function qe(e, t) {
                    var n = t.nodeName.toLowerCase();
                    "input" === n && me.test(e.type) ?
                        (t.checked = e.checked) :
                        ("input" !== n && "textarea" !== n) ||
                        (t.defaultValue = e.defaultValue);
                }

                function He(e, t, n, i) {
                    t = c.apply([], t);
                    var o,
                        r,
                        s,
                        a,
                        l,
                        u,
                        d = 0,
                        p = e.length,
                        h = p - 1,
                        f = t[0],
                        m = y(f);
                    if (
                        m ||
                        (p > 1 && "string" == typeof f && !v.checkClone && Me.test(f))
                    )
                        return e.each(function(o) {
                            var r = e.eq(o);
                            m && (t[0] = f.call(this, o, r.html())), He(r, t, n, i);
                        });
                    if (
                        p &&
                        ((r = (o = Te(t, e[0].ownerDocument, !1, e, i)).firstChild),
                            1 === o.childNodes.length && (o = r),
                            r || i)
                    ) {
                        for (a = (s = C.map(we(o, "script"), ze)).length; d < p; d++)
                            (l = o),
                            d !== h &&
                            ((l = C.clone(l, !0, !0)), a && C.merge(s, we(l, "script"))),
                            n.call(e[d], l, d);
                        if (a)
                            for (
                                u = s[s.length - 1].ownerDocument, C.map(s, $e), d = 0; d < a; d++
                            )
                                (l = s[d]),
                                ve.test(l.type || "") &&
                                !J.access(l, "globalEval") &&
                                C.contains(u, l) &&
                                (l.src && "module" !== (l.type || "").toLowerCase() ?
                                    C._evalUrl &&
                                    !l.noModule &&
                                    C._evalUrl(l.src, {
                                        nonce: l.nonce || l.getAttribute("nonce"),
                                    }) :
                                    b(l.textContent.replace(Pe, ""), l, u));
                    }
                    return e;
                }

                function We(e, t, n) {
                    for (
                        var i, o = t ? C.filter(t, e) : e, r = 0; null != (i = o[r]); r++
                    )
                        n || 1 !== i.nodeType || C.cleanData(we(i)),
                        i.parentNode &&
                        (n && ae(i) && xe(we(i, "script")),
                            i.parentNode.removeChild(i));
                    return e;
                }
                C.extend({
                        htmlPrefilter: function(e) {
                            return e.replace(Le, "<$1></$2>");
                        },
                        clone: function(e, t, n) {
                            var i,
                                o,
                                r,
                                s,
                                a = e.cloneNode(!0),
                                l = ae(e);
                            if (!(
                                    v.noCloneChecked ||
                                    (1 !== e.nodeType && 11 !== e.nodeType) ||
                                    C.isXMLDoc(e)
                                ))
                                for (s = we(a), i = 0, o = (r = we(e)).length; i < o; i++)
                                    qe(r[i], s[i]);
                            if (t)
                                if (n)
                                    for (
                                        r = r || we(e), s = s || we(a), i = 0, o = r.length; i < o; i++
                                    )
                                        Fe(r[i], s[i]);
                                else Fe(e, a);
                            return (
                                (s = we(a, "script")).length > 0 && xe(s, !l && we(e, "script")),
                                a
                            );
                        },
                        cleanData: function(e) {
                            for (
                                var t, n, i, o = C.event.special, r = 0; void 0 !== (n = e[r]); r++
                            )
                                if (Y(n)) {
                                    if ((t = n[J.expando])) {
                                        if (t.events)
                                            for (i in t.events)
                                                o[i] ?
                                                C.event.remove(n, i) :
                                                C.removeEvent(n, i, t.handle);
                                        n[J.expando] = void 0;
                                    }
                                    n[Q.expando] && (n[Q.expando] = void 0);
                                }
                        },
                    }),
                    C.fn.extend({
                        detach: function(e) {
                            return We(this, e, !0);
                        },
                        remove: function(e) {
                            return We(this, e);
                        },
                        text: function(e) {
                            return Z(
                                this,
                                function(e) {
                                    return void 0 === e ?
                                        C.text(this) :
                                        this.empty().each(function() {
                                            (1 !== this.nodeType &&
                                                11 !== this.nodeType &&
                                                9 !== this.nodeType) ||
                                            (this.textContent = e);
                                        });
                                },
                                null,
                                e,
                                arguments.length
                            );
                        },
                        append: function() {
                            return He(this, arguments, function(e) {
                                (1 !== this.nodeType &&
                                    11 !== this.nodeType &&
                                    9 !== this.nodeType) ||
                                Re(this, e).appendChild(e);
                            });
                        },
                        prepend: function() {
                            return He(this, arguments, function(e) {
                                if (
                                    1 === this.nodeType ||
                                    11 === this.nodeType ||
                                    9 === this.nodeType
                                ) {
                                    var t = Re(this, e);
                                    t.insertBefore(e, t.firstChild);
                                }
                            });
                        },
                        before: function() {
                            return He(this, arguments, function(e) {
                                this.parentNode && this.parentNode.insertBefore(e, this);
                            });
                        },
                        after: function() {
                            return He(this, arguments, function(e) {
                                this.parentNode &&
                                    this.parentNode.insertBefore(e, this.nextSibling);
                            });
                        },
                        empty: function() {
                            for (var e, t = 0; null != (e = this[t]); t++)
                                1 === e.nodeType &&
                                (C.cleanData(we(e, !1)), (e.textContent = ""));
                            return this;
                        },
                        clone: function(e, t) {
                            return (
                                (e = null != e && e),
                                (t = null == t ? e : t),
                                this.map(function() {
                                    return C.clone(this, e, t);
                                })
                            );
                        },
                        html: function(e) {
                            return Z(
                                this,
                                function(e) {
                                    var t = this[0] || {},
                                        n = 0,
                                        i = this.length;
                                    if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
                                    if (
                                        "string" == typeof e &&
                                        !Ne.test(e) &&
                                        !ye[(ge.exec(e) || ["", ""])[1].toLowerCase()]
                                    ) {
                                        e = C.htmlPrefilter(e);
                                        try {
                                            for (; n < i; n++)
                                                1 === (t = this[n] || {}).nodeType &&
                                                (C.cleanData(we(t, !1)), (t.innerHTML = e));
                                            t = 0;
                                        } catch (e) {}
                                    }
                                    t && this.empty().append(e);
                                },
                                null,
                                e,
                                arguments.length
                            );
                        },
                        replaceWith: function() {
                            var e = [];
                            return He(
                                this,
                                arguments,
                                function(t) {
                                    var n = this.parentNode;
                                    C.inArray(this, e) < 0 &&
                                        (C.cleanData(we(this)), n && n.replaceChild(t, this));
                                },
                                e
                            );
                        },
                    }),
                    C.each({
                            appendTo: "append",
                            prependTo: "prepend",
                            insertBefore: "before",
                            insertAfter: "after",
                            replaceAll: "replaceWith",
                        },
                        function(e, t) {
                            C.fn[e] = function(e) {
                                for (
                                    var n, i = [], o = C(e), r = o.length - 1, s = 0; s <= r; s++
                                )
                                    (n = s === r ? this : this.clone(!0)),
                                    C(o[s])[t](n),
                                    u.apply(i, n.get());
                                return this.pushStack(i);
                            };
                        }
                    );
                var Be = new RegExp("^(" + ie + ")(?!px)[a-z%]+$", "i"),
                    Ze = function(e) {
                        var t = e.ownerDocument.defaultView;
                        return (t && t.opener) || (t = n), t.getComputedStyle(e);
                    },
                    Ue = new RegExp(re.join("|"), "i");

                function Ve(e, t, n) {
                    var i,
                        o,
                        r,
                        s,
                        a = e.style;
                    return (
                        (n = n || Ze(e)) &&
                        ("" !== (s = n.getPropertyValue(t) || n[t]) ||
                            ae(e) ||
                            (s = C.style(e, t)), !v.pixelBoxStyles() &&
                            Be.test(s) &&
                            Ue.test(t) &&
                            ((i = a.width),
                                (o = a.minWidth),
                                (r = a.maxWidth),
                                (a.minWidth = a.maxWidth = a.width = s),
                                (s = n.width),
                                (a.width = i),
                                (a.minWidth = o),
                                (a.maxWidth = r))),
                        void 0 !== s ? s + "" : s
                    );
                }

                function Xe(e, t) {
                    return {
                        get: function() {
                            if (!e()) return (this.get = t).apply(this, arguments);
                            delete this.get;
                        },
                    };
                }!(function() {
                    function e() {
                        if (u) {
                            (c.style.cssText =
                                "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0"),
                            (u.style.cssText =
                                "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%"),
                            se.appendChild(c).appendChild(u);
                            var e = n.getComputedStyle(u);
                            (i = "1%" !== e.top),
                            (l = 12 === t(e.marginLeft)),
                            (u.style.right = "60%"),
                            (a = 36 === t(e.right)),
                            (o = 36 === t(e.width)),
                            (u.style.position = "absolute"),
                            (r = 12 === t(u.offsetWidth / 3)),
                            se.removeChild(c),
                                (u = null);
                        }
                    }

                    function t(e) {
                        return Math.round(parseFloat(e));
                    }
                    var i,
                        o,
                        r,
                        a,
                        l,
                        c = s.createElement("div"),
                        u = s.createElement("div");
                    u.style &&
                        ((u.style.backgroundClip = "content-box"),
                            (u.cloneNode(!0).style.backgroundClip = ""),
                            (v.clearCloneStyle = "content-box" === u.style.backgroundClip),
                            C.extend(v, {
                                boxSizingReliable: function() {
                                    return e(), o;
                                },
                                pixelBoxStyles: function() {
                                    return e(), a;
                                },
                                pixelPosition: function() {
                                    return e(), i;
                                },
                                reliableMarginLeft: function() {
                                    return e(), l;
                                },
                                scrollboxSize: function() {
                                    return e(), r;
                                },
                            }));
                })();
                var Ke = ["Webkit", "Moz", "ms"],
                    Ye = s.createElement("div").style,
                    Ge = {};

                function Je(e) {
                    var t = C.cssProps[e] || Ge[e];
                    return (
                        t ||
                        (e in Ye ?
                            e :
                            (Ge[e] =
                                (function(e) {
                                    for (
                                        var t = e[0].toUpperCase() + e.slice(1), n = Ke.length; n--;

                                    )
                                        if ((e = Ke[n] + t) in Ye) return e;
                                })(e) || e))
                    );
                }
                var Qe = /^(none|table(?!-c[ea]).+)/,
                    et = /^--/,
                    tt = { position: "absolute", visibility: "hidden", display: "block" },
                    nt = { letterSpacing: "0", fontWeight: "400" };

                function it(e, t, n) {
                    var i = oe.exec(t);
                    return i ? Math.max(0, i[2] - (n || 0)) + (i[3] || "px") : t;
                }

                function ot(e, t, n, i, o, r) {
                    var s = "width" === t ? 1 : 0,
                        a = 0,
                        l = 0;
                    if (n === (i ? "border" : "content")) return 0;
                    for (; s < 4; s += 2)
                        "margin" === n && (l += C.css(e, n + re[s], !0, o)),
                        i ?
                        ("content" === n && (l -= C.css(e, "padding" + re[s], !0, o)),
                            "margin" !== n &&
                            (l -= C.css(e, "border" + re[s] + "Width", !0, o))) :
                        ((l += C.css(e, "padding" + re[s], !0, o)),
                            "padding" !== n ?
                            (l += C.css(e, "border" + re[s] + "Width", !0, o)) :
                            (a += C.css(e, "border" + re[s] + "Width", !0, o)));
                    return (!i &&
                        r >= 0 &&
                        (l +=
                            Math.max(
                                0,
                                Math.ceil(
                                    e["offset" + t[0].toUpperCase() + t.slice(1)] -
                                    r -
                                    l -
                                    a -
                                    0.5
                                )
                            ) || 0),
                        l
                    );
                }

                function rt(e, t, n) {
                    var i = Ze(e),
                        o =
                        (!v.boxSizingReliable() || n) &&
                        "border-box" === C.css(e, "boxSizing", !1, i),
                        r = o,
                        s = Ve(e, t, i),
                        a = "offset" + t[0].toUpperCase() + t.slice(1);
                    if (Be.test(s)) {
                        if (!n) return s;
                        s = "auto";
                    }
                    return (
                        ((!v.boxSizingReliable() && o) ||
                            "auto" === s ||
                            (!parseFloat(s) && "inline" === C.css(e, "display", !1, i))) &&
                        e.getClientRects().length &&
                        ((o = "border-box" === C.css(e, "boxSizing", !1, i)),
                            (r = a in e) && (s = e[a])),
                        (s = parseFloat(s) || 0) +
                        ot(e, t, n || (o ? "border" : "content"), r, i, s) +
                        "px"
                    );
                }

                function st(e, t, n, i, o) {
                    return new st.prototype.init(e, t, n, i, o);
                }
                C.extend({
                        cssHooks: {
                            opacity: {
                                get: function(e, t) {
                                    if (t) {
                                        var n = Ve(e, "opacity");
                                        return "" === n ? "1" : n;
                                    }
                                },
                            },
                        },
                        cssNumber: {
                            animationIterationCount: !0,
                            columnCount: !0,
                            fillOpacity: !0,
                            flexGrow: !0,
                            flexShrink: !0,
                            fontWeight: !0,
                            gridArea: !0,
                            gridColumn: !0,
                            gridColumnEnd: !0,
                            gridColumnStart: !0,
                            gridRow: !0,
                            gridRowEnd: !0,
                            gridRowStart: !0,
                            lineHeight: !0,
                            opacity: !0,
                            order: !0,
                            orphans: !0,
                            widows: !0,
                            zIndex: !0,
                            zoom: !0,
                        },
                        cssProps: {},
                        style: function(e, t, n, i) {
                            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                                var o,
                                    r,
                                    s,
                                    a = K(t),
                                    l = et.test(t),
                                    c = e.style;
                                if (
                                    (l || (t = Je(a)),
                                        (s = C.cssHooks[t] || C.cssHooks[a]),
                                        void 0 === n)
                                )
                                    return s && "get" in s && void 0 !== (o = s.get(e, !1, i)) ?
                                        o :
                                        c[t];
                                "string" === (r = typeof n) &&
                                (o = oe.exec(n)) &&
                                o[1] &&
                                    ((n = de(e, t, o)), (r = "number")),
                                    null != n &&
                                    n == n &&
                                    ("number" !== r ||
                                        l ||
                                        (n += (o && o[3]) || (C.cssNumber[a] ? "" : "px")),
                                        v.clearCloneStyle ||
                                        "" !== n ||
                                        0 !== t.indexOf("background") ||
                                        (c[t] = "inherit"),
                                        (s && "set" in s && void 0 === (n = s.set(e, n, i))) ||
                                        (l ? c.setProperty(t, n) : (c[t] = n)));
                            }
                        },
                        css: function(e, t, n, i) {
                            var o,
                                r,
                                s,
                                a = K(t);
                            return (
                                et.test(t) || (t = Je(a)),
                                (s = C.cssHooks[t] || C.cssHooks[a]) &&
                                "get" in s &&
                                (o = s.get(e, !0, n)),
                                void 0 === o && (o = Ve(e, t, i)),
                                "normal" === o && t in nt && (o = nt[t]),
                                "" === n || n ?
                                ((r = parseFloat(o)), !0 === n || isFinite(r) ? r || 0 : o) :
                                o
                            );
                        },
                    }),
                    C.each(["height", "width"], function(e, t) {
                        C.cssHooks[t] = {
                            get: function(e, n, i) {
                                if (n)
                                    return !Qe.test(C.css(e, "display")) ||
                                        (e.getClientRects().length &&
                                            e.getBoundingClientRect().width) ?
                                        rt(e, t, i) :
                                        ue(e, tt, function() {
                                            return rt(e, t, i);
                                        });
                            },
                            set: function(e, n, i) {
                                var o,
                                    r = Ze(e),
                                    s = !v.scrollboxSize() && "absolute" === r.position,
                                    a = (s || i) && "border-box" === C.css(e, "boxSizing", !1, r),
                                    l = i ? ot(e, t, i, a, r) : 0;
                                return (
                                    a &&
                                    s &&
                                    (l -= Math.ceil(
                                        e["offset" + t[0].toUpperCase() + t.slice(1)] -
                                        parseFloat(r[t]) -
                                        ot(e, t, "border", !1, r) -
                                        0.5
                                    )),
                                    l &&
                                    (o = oe.exec(n)) &&
                                    "px" !== (o[3] || "px") &&
                                    ((e.style[t] = n), (n = C.css(e, t))),
                                    it(0, n, l)
                                );
                            },
                        };
                    }),
                    (C.cssHooks.marginLeft = Xe(v.reliableMarginLeft, function(e, t) {
                        if (t)
                            return (
                                (parseFloat(Ve(e, "marginLeft")) ||
                                    e.getBoundingClientRect().left -
                                    ue(e, { marginLeft: 0 }, function() {
                                        return e.getBoundingClientRect().left;
                                    })) + "px"
                            );
                    })),
                    C.each({ margin: "", padding: "", border: "Width" }, function(e, t) {
                        (C.cssHooks[e + t] = {
                            expand: function(n) {
                                for (
                                    var i = 0,
                                        o = {},
                                        r = "string" == typeof n ? n.split(" ") : [n]; i < 4; i++
                                )
                                    o[e + re[i] + t] = r[i] || r[i - 2] || r[0];
                                return o;
                            },
                        }),
                        "margin" !== e && (C.cssHooks[e + t].set = it);
                    }),
                    C.fn.extend({
                        css: function(e, t) {
                            return Z(
                                this,
                                function(e, t, n) {
                                    var i,
                                        o,
                                        r = {},
                                        s = 0;
                                    if (Array.isArray(t)) {
                                        for (i = Ze(e), o = t.length; s < o; s++)
                                            r[t[s]] = C.css(e, t[s], !1, i);
                                        return r;
                                    }
                                    return void 0 !== n ? C.style(e, t, n) : C.css(e, t);
                                },
                                e,
                                t,
                                arguments.length > 1
                            );
                        },
                    }),
                    (C.Tween = st),
                    (st.prototype = {
                        constructor: st,
                        init: function(e, t, n, i, o, r) {
                            (this.elem = e),
                            (this.prop = n),
                            (this.easing = o || C.easing._default),
                            (this.options = t),
                            (this.start = this.now = this.cur()),
                            (this.end = i),
                            (this.unit = r || (C.cssNumber[n] ? "" : "px"));
                        },
                        cur: function() {
                            var e = st.propHooks[this.prop];
                            return e && e.get ? e.get(this) : st.propHooks._default.get(this);
                        },
                        run: function(e) {
                            var t,
                                n = st.propHooks[this.prop];
                            return (
                                this.options.duration ?
                                (this.pos = t =
                                    C.easing[this.easing](
                                        e,
                                        this.options.duration * e,
                                        0,
                                        1,
                                        this.options.duration
                                    )) :
                                (this.pos = t = e),
                                (this.now = (this.end - this.start) * t + this.start),
                                this.options.step &&
                                this.options.step.call(this.elem, this.now, this),
                                n && n.set ? n.set(this) : st.propHooks._default.set(this),
                                this
                            );
                        },
                    }),
                    (st.prototype.init.prototype = st.prototype),
                    (st.propHooks = {
                        _default: {
                            get: function(e) {
                                var t;
                                return 1 !== e.elem.nodeType ||
                                    (null != e.elem[e.prop] && null == e.elem.style[e.prop]) ?
                                    e.elem[e.prop] :
                                    (t = C.css(e.elem, e.prop, "")) && "auto" !== t ?
                                    t :
                                    0;
                            },
                            set: function(e) {
                                C.fx.step[e.prop] ?
                                    C.fx.step[e.prop](e) :
                                    1 !== e.elem.nodeType ||
                                    (!C.cssHooks[e.prop] && null == e.elem.style[Je(e.prop)]) ?
                                    (e.elem[e.prop] = e.now) :
                                    C.style(e.elem, e.prop, e.now + e.unit);
                            },
                        },
                    }),
                    (st.propHooks.scrollTop = st.propHooks.scrollLeft = {
                        set: function(e) {
                            e.elem.nodeType &&
                                e.elem.parentNode &&
                                (e.elem[e.prop] = e.now);
                        },
                    }),
                    (C.easing = {
                        linear: function(e) {
                            return e;
                        },
                        swing: function(e) {
                            return 0.5 - Math.cos(e * Math.PI) / 2;
                        },
                        _default: "swing",
                    }),
                    (C.fx = st.prototype.init),
                    (C.fx.step = {});
                var at,
                    lt,
                    ct = /^(?:toggle|show|hide)$/,
                    ut = /queueHooks$/;

                function dt() {
                    lt &&
                        (!1 === s.hidden && n.requestAnimationFrame ?
                            n.requestAnimationFrame(dt) :
                            n.setTimeout(dt, C.fx.interval),
                            C.fx.tick());
                }

                function pt() {
                    return (
                        n.setTimeout(function() {
                            at = void 0;
                        }),
                        (at = Date.now())
                    );
                }

                function ht(e, t) {
                    var n,
                        i = 0,
                        o = { height: e };
                    for (t = t ? 1 : 0; i < 4; i += 2 - t)
                        o["margin" + (n = re[i])] = o["padding" + n] = e;
                    return t && (o.opacity = o.width = e), o;
                }

                function ft(e, t, n) {
                    for (
                        var i,
                            o = (mt.tweeners[t] || []).concat(mt.tweeners["*"]),
                            r = 0,
                            s = o.length; r < s; r++
                    )
                        if ((i = o[r].call(n, t, e))) return i;
                }

                function mt(e, t, n) {
                    var i,
                        o,
                        r = 0,
                        s = mt.prefilters.length,
                        a = C.Deferred().always(function() {
                            delete l.elem;
                        }),
                        l = function() {
                            if (o) return !1;
                            for (
                                var t = at || pt(),
                                    n = Math.max(0, c.startTime + c.duration - t),
                                    i = 1 - (n / c.duration || 0),
                                    r = 0,
                                    s = c.tweens.length; r < s; r++
                            )
                                c.tweens[r].run(i);
                            return (
                                a.notifyWith(e, [c, i, n]),
                                i < 1 && s ?
                                n :
                                (s || a.notifyWith(e, [c, 1, 0]), a.resolveWith(e, [c]), !1)
                            );
                        },
                        c = a.promise({
                            elem: e,
                            props: C.extend({}, t),
                            opts: C.extend(!0, { specialEasing: {}, easing: C.easing._default },
                                n
                            ),
                            originalProperties: t,
                            originalOptions: n,
                            startTime: at || pt(),
                            duration: n.duration,
                            tweens: [],
                            createTween: function(t, n) {
                                var i = C.Tween(
                                    e,
                                    c.opts,
                                    t,
                                    n,
                                    c.opts.specialEasing[t] || c.opts.easing
                                );
                                return c.tweens.push(i), i;
                            },
                            stop: function(t) {
                                var n = 0,
                                    i = t ? c.tweens.length : 0;
                                if (o) return this;
                                for (o = !0; n < i; n++) c.tweens[n].run(1);
                                return (
                                    t ?
                                    (a.notifyWith(e, [c, 1, 0]), a.resolveWith(e, [c, t])) :
                                    a.rejectWith(e, [c, t]),
                                    this
                                );
                            },
                        }),
                        u = c.props;
                    for (!(function(e, t) {
                            var n, i, o, r, s;
                            for (n in e)
                                if (
                                    ((o = t[(i = K(n))]),
                                        (r = e[n]),
                                        Array.isArray(r) && ((o = r[1]), (r = e[n] = r[0])),
                                        n !== i && ((e[i] = r), delete e[n]),
                                        (s = C.cssHooks[i]) && ("expand" in s))
                                )
                                    for (n in ((r = s.expand(r)), delete e[i], r))
                                        (n in e) || ((e[n] = r[n]), (t[n] = o));
                                else t[i] = o;
                        })(u, c.opts.specialEasing); r < s; r++)
                        if ((i = mt.prefilters[r].call(c, e, u, c.opts)))
                            return (
                                y(i.stop) &&
                                (C._queueHooks(c.elem, c.opts.queue).stop = i.stop.bind(i)),
                                i
                            );
                    return (
                        C.map(u, ft, c),
                        y(c.opts.start) && c.opts.start.call(e, c),
                        c
                        .progress(c.opts.progress)
                        .done(c.opts.done, c.opts.complete)
                        .fail(c.opts.fail)
                        .always(c.opts.always),
                        C.fx.timer(C.extend(l, { elem: e, anim: c, queue: c.opts.queue })),
                        c
                    );
                }
                (C.Animation = C.extend(mt, {
                    tweeners: {
                        "*": [
                            function(e, t) {
                                var n = this.createTween(e, t);
                                return de(n.elem, e, oe.exec(t), n), n;
                            },
                        ],
                    },
                    tweener: function(e, t) {
                        y(e) ? ((t = e), (e = ["*"])) : (e = e.match(z));
                        for (var n, i = 0, o = e.length; i < o; i++)
                            (n = e[i]),
                            (mt.tweeners[n] = mt.tweeners[n] || []),
                            mt.tweeners[n].unshift(t);
                    },
                    prefilters: [
                        function(e, t, n) {
                            var i,
                                o,
                                r,
                                s,
                                a,
                                l,
                                c,
                                u,
                                d = "width" in t || "height" in t,
                                p = this,
                                h = {},
                                f = e.style,
                                m = e.nodeType && ce(e),
                                g = J.get(e, "fxshow");
                            for (i in (n.queue ||
                                    (null == (s = C._queueHooks(e, "fx")).unqueued &&
                                        ((s.unqueued = 0),
                                            (a = s.empty.fire),
                                            (s.empty.fire = function() {
                                                s.unqueued || a();
                                            })),
                                        s.unqueued++,
                                        p.always(function() {
                                            p.always(function() {
                                                s.unqueued--, C.queue(e, "fx").length || s.empty.fire();
                                            });
                                        })),
                                    t))
                                if (((o = t[i]), ct.test(o))) {
                                    if (
                                        (delete t[i],
                                            (r = r || "toggle" === o),
                                            o === (m ? "hide" : "show"))
                                    ) {
                                        if ("show" !== o || !g || void 0 === g[i]) continue;
                                        m = !0;
                                    }
                                    h[i] = (g && g[i]) || C.style(e, i);
                                }
                            if ((l = !C.isEmptyObject(t)) || !C.isEmptyObject(h))
                                for (i in (d &&
                                        1 === e.nodeType &&
                                        ((n.overflow = [f.overflow, f.overflowX, f.overflowY]),
                                            null == (c = g && g.display) && (c = J.get(e, "display")),
                                            "none" === (u = C.css(e, "display")) &&
                                            (c ?
                                                (u = c) :
                                                (fe([e], !0),
                                                    (c = e.style.display || c),
                                                    (u = C.css(e, "display")),
                                                    fe([e]))),
                                            ("inline" === u || ("inline-block" === u && null != c)) &&
                                            "none" === C.css(e, "float") &&
                                            (l ||
                                                (p.done(function() {
                                                        f.display = c;
                                                    }),
                                                    null == c &&
                                                    ((u = f.display), (c = "none" === u ? "" : u))),
                                                (f.display = "inline-block"))),
                                        n.overflow &&
                                        ((f.overflow = "hidden"),
                                            p.always(function() {
                                                (f.overflow = n.overflow[0]),
                                                (f.overflowX = n.overflow[1]),
                                                (f.overflowY = n.overflow[2]);
                                            })),
                                        (l = !1),
                                        h))
                                    l ||
                                    (g ?
                                        "hidden" in g && (m = g.hidden) :
                                        (g = J.access(e, "fxshow", { display: c })),
                                        r && (g.hidden = !m),
                                        m && fe([e], !0),
                                        p.done(function() {
                                            for (i in (m || fe([e]), J.remove(e, "fxshow"), h))
                                                C.style(e, i, h[i]);
                                        })),
                                    (l = ft(m ? g[i] : 0, i, p)),
                                    i in g ||
                                    ((g[i] = l.start),
                                        m && ((l.end = l.start), (l.start = 0)));
                        },
                    ],
                    prefilter: function(e, t) {
                        t ? mt.prefilters.unshift(e) : mt.prefilters.push(e);
                    },
                })),
                (C.speed = function(e, t, n) {
                    var i =
                        e && "object" == typeof e ?
                        C.extend({}, e) :
                        {
                            complete: n || (!n && t) || (y(e) && e),
                            duration: e,
                            easing: (n && t) || (t && !y(t) && t),
                        };
                    return (
                        C.fx.off ?
                        (i.duration = 0) :
                        "number" != typeof i.duration &&
                        (i.duration in C.fx.speeds ?
                            (i.duration = C.fx.speeds[i.duration]) :
                            (i.duration = C.fx.speeds._default)),
                        (null != i.queue && !0 !== i.queue) || (i.queue = "fx"),
                        (i.old = i.complete),
                        (i.complete = function() {
                            y(i.old) && i.old.call(this),
                                i.queue && C.dequeue(this, i.queue);
                        }),
                        i
                    );
                }),
                C.fn.extend({
                        fadeTo: function(e, t, n, i) {
                            return this.filter(ce)
                                .css("opacity", 0)
                                .show()
                                .end()
                                .animate({ opacity: t }, e, n, i);
                        },
                        animate: function(e, t, n, i) {
                            var o = C.isEmptyObject(e),
                                r = C.speed(t, n, i),
                                s = function() {
                                    var t = mt(this, C.extend({}, e), r);
                                    (o || J.get(this, "finish")) && t.stop(!0);
                                };
                            return (
                                (s.finish = s),
                                o || !1 === r.queue ? this.each(s) : this.queue(r.queue, s)
                            );
                        },
                        stop: function(e, t, n) {
                            var i = function(e) {
                                var t = e.stop;
                                delete e.stop, t(n);
                            };
                            return (
                                "string" != typeof e && ((n = t), (t = e), (e = void 0)),
                                t && !1 !== e && this.queue(e || "fx", []),
                                this.each(function() {
                                    var t = !0,
                                        o = null != e && e + "queueHooks",
                                        r = C.timers,
                                        s = J.get(this);
                                    if (o) s[o] && s[o].stop && i(s[o]);
                                    else
                                        for (o in s) s[o] && s[o].stop && ut.test(o) && i(s[o]);
                                    for (o = r.length; o--;)
                                        r[o].elem !== this ||
                                        (null != e && r[o].queue !== e) ||
                                        (r[o].anim.stop(n), (t = !1), r.splice(o, 1));
                                    (!t && n) || C.dequeue(this, e);
                                })
                            );
                        },
                        finish: function(e) {
                            return (!1 !== e && (e = e || "fx"),
                                this.each(function() {
                                    var t,
                                        n = J.get(this),
                                        i = n[e + "queue"],
                                        o = n[e + "queueHooks"],
                                        r = C.timers,
                                        s = i ? i.length : 0;
                                    for (
                                        n.finish = !0,
                                        C.queue(this, e, []),
                                        o && o.stop && o.stop.call(this, !0),
                                        t = r.length; t--;

                                    )
                                        r[t].elem === this &&
                                        r[t].queue === e &&
                                        (r[t].anim.stop(!0), r.splice(t, 1));
                                    for (t = 0; t < s; t++)
                                        i[t] && i[t].finish && i[t].finish.call(this);
                                    delete n.finish;
                                })
                            );
                        },
                    }),
                    C.each(["toggle", "show", "hide"], function(e, t) {
                        var n = C.fn[t];
                        C.fn[t] = function(e, i, o) {
                            return null == e || "boolean" == typeof e ?
                                n.apply(this, arguments) :
                                this.animate(ht(t, !0), e, i, o);
                        };
                    }),
                    C.each({
                            slideDown: ht("show"),
                            slideUp: ht("hide"),
                            slideToggle: ht("toggle"),
                            fadeIn: { opacity: "show" },
                            fadeOut: { opacity: "hide" },
                            fadeToggle: { opacity: "toggle" },
                        },
                        function(e, t) {
                            C.fn[e] = function(e, n, i) {
                                return this.animate(t, e, n, i);
                            };
                        }
                    ),
                    (C.timers = []),
                    (C.fx.tick = function() {
                        var e,
                            t = 0,
                            n = C.timers;
                        for (at = Date.now(); t < n.length; t++)
                            (e = n[t])() || n[t] !== e || n.splice(t--, 1);
                        n.length || C.fx.stop(), (at = void 0);
                    }),
                    (C.fx.timer = function(e) {
                        C.timers.push(e), C.fx.start();
                    }),
                    (C.fx.interval = 13),
                    (C.fx.start = function() {
                        lt || ((lt = !0), dt());
                    }),
                    (C.fx.stop = function() {
                        lt = null;
                    }),
                    (C.fx.speeds = { slow: 600, fast: 200, _default: 400 }),
                    (C.fn.delay = function(e, t) {
                        return (
                            (e = (C.fx && C.fx.speeds[e]) || e),
                            (t = t || "fx"),
                            this.queue(t, function(t, i) {
                                var o = n.setTimeout(t, e);
                                i.stop = function() {
                                    n.clearTimeout(o);
                                };
                            })
                        );
                    }),
                    (function() {
                        var e = s.createElement("input"),
                            t = s
                            .createElement("select")
                            .appendChild(s.createElement("option"));
                        (e.type = "checkbox"),
                        (v.checkOn = "" !== e.value),
                        (v.optSelected = t.selected),
                        ((e = s.createElement("input")).value = "t"),
                        (e.type = "radio"),
                        (v.radioValue = "t" === e.value);
                    })();
                var gt,
                    vt = C.expr.attrHandle;
                C.fn.extend({
                        attr: function(e, t) {
                            return Z(this, C.attr, e, t, arguments.length > 1);
                        },
                        removeAttr: function(e) {
                            return this.each(function() {
                                C.removeAttr(this, e);
                            });
                        },
                    }),
                    C.extend({
                        attr: function(e, t, n) {
                            var i,
                                o,
                                r = e.nodeType;
                            if (3 !== r && 8 !== r && 2 !== r)
                                return void 0 === e.getAttribute ?
                                    C.prop(e, t, n) :
                                    ((1 === r && C.isXMLDoc(e)) ||
                                        (o =
                                            C.attrHooks[t.toLowerCase()] ||
                                            (C.expr.match.bool.test(t) ? gt : void 0)),
                                        void 0 !== n ?
                                        null === n ?
                                        void C.removeAttr(e, t) :
                                        o && "set" in o && void 0 !== (i = o.set(e, n, t)) ?
                                        i :
                                        (e.setAttribute(t, n + ""), n) :
                                        o && "get" in o && null !== (i = o.get(e, t)) ?
                                        i :
                                        null == (i = C.find.attr(e, t)) ?
                                        void 0 :
                                        i);
                        },
                        attrHooks: {
                            type: {
                                set: function(e, t) {
                                    if (!v.radioValue && "radio" === t && I(e, "input")) {
                                        var n = e.value;
                                        return e.setAttribute("type", t), n && (e.value = n), t;
                                    }
                                },
                            },
                        },
                        removeAttr: function(e, t) {
                            var n,
                                i = 0,
                                o = t && t.match(z);
                            if (o && 1 === e.nodeType)
                                for (;
                                    (n = o[i++]);) e.removeAttribute(n);
                        },
                    }),
                    (gt = {
                        set: function(e, t, n) {
                            return !1 === t ? C.removeAttr(e, n) : e.setAttribute(n, n), n;
                        },
                    }),
                    C.each(C.expr.match.bool.source.match(/\w+/g), function(e, t) {
                        var n = vt[t] || C.find.attr;
                        vt[t] = function(e, t, i) {
                            var o,
                                r,
                                s = t.toLowerCase();
                            return (
                                i ||
                                ((r = vt[s]),
                                    (vt[s] = o),
                                    (o = null != n(e, t, i) ? s : null),
                                    (vt[s] = r)),
                                o
                            );
                        };
                    });
                var yt = /^(?:input|select|textarea|button)$/i,
                    wt = /^(?:a|area)$/i;

                function xt(e) {
                    return (e.match(z) || []).join(" ");
                }

                function bt(e) {
                    return (e.getAttribute && e.getAttribute("class")) || "";
                }

                function _t(e) {
                    return Array.isArray(e) ?
                        e :
                        ("string" == typeof e && e.match(z)) || [];
                }
                C.fn.extend({
                        prop: function(e, t) {
                            return Z(this, C.prop, e, t, arguments.length > 1);
                        },
                        removeProp: function(e) {
                            return this.each(function() {
                                delete this[C.propFix[e] || e];
                            });
                        },
                    }),
                    C.extend({
                        prop: function(e, t, n) {
                            var i,
                                o,
                                r = e.nodeType;
                            if (3 !== r && 8 !== r && 2 !== r)
                                return (
                                    (1 === r && C.isXMLDoc(e)) ||
                                    ((t = C.propFix[t] || t), (o = C.propHooks[t])),
                                    void 0 !== n ?
                                    o && "set" in o && void 0 !== (i = o.set(e, n, t)) ?
                                    i :
                                    (e[t] = n) :
                                    o && "get" in o && null !== (i = o.get(e, t)) ?
                                    i :
                                    e[t]
                                );
                        },
                        propHooks: {
                            tabIndex: {
                                get: function(e) {
                                    var t = C.find.attr(e, "tabindex");
                                    return t ?
                                        parseInt(t, 10) :
                                        yt.test(e.nodeName) || (wt.test(e.nodeName) && e.href) ?
                                        0 :
                                        -1;
                                },
                            },
                        },
                        propFix: { for: "htmlFor", class: "className" },
                    }),
                    v.optSelected ||
                    (C.propHooks.selected = {
                        get: function(e) {
                            var t = e.parentNode;
                            return t && t.parentNode && t.parentNode.selectedIndex, null;
                        },
                        set: function(e) {
                            var t = e.parentNode;
                            t &&
                                (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex);
                        },
                    }),
                    C.each(
                        [
                            "tabIndex",
                            "readOnly",
                            "maxLength",
                            "cellSpacing",
                            "cellPadding",
                            "rowSpan",
                            "colSpan",
                            "useMap",
                            "frameBorder",
                            "contentEditable",
                        ],
                        function() {
                            C.propFix[this.toLowerCase()] = this;
                        }
                    ),
                    C.fn.extend({
                        addClass: function(e) {
                            var t,
                                n,
                                i,
                                o,
                                r,
                                s,
                                a,
                                l = 0;
                            if (y(e))
                                return this.each(function(t) {
                                    C(this).addClass(e.call(this, t, bt(this)));
                                });
                            if ((t = _t(e)).length)
                                for (;
                                    (n = this[l++]);)
                                    if (
                                        ((o = bt(n)), (i = 1 === n.nodeType && " " + xt(o) + " "))
                                    ) {
                                        for (s = 0;
                                            (r = t[s++]);)
                                            i.indexOf(" " + r + " ") < 0 && (i += r + " ");
                                        o !== (a = xt(i)) && n.setAttribute("class", a);
                                    }
                            return this;
                        },
                        removeClass: function(e) {
                            var t,
                                n,
                                i,
                                o,
                                r,
                                s,
                                a,
                                l = 0;
                            if (y(e))
                                return this.each(function(t) {
                                    C(this).removeClass(e.call(this, t, bt(this)));
                                });
                            if (!arguments.length) return this.attr("class", "");
                            if ((t = _t(e)).length)
                                for (;
                                    (n = this[l++]);)
                                    if (
                                        ((o = bt(n)), (i = 1 === n.nodeType && " " + xt(o) + " "))
                                    ) {
                                        for (s = 0;
                                            (r = t[s++]);)
                                            for (; i.indexOf(" " + r + " ") > -1;)
                                                i = i.replace(" " + r + " ", " ");
                                        o !== (a = xt(i)) && n.setAttribute("class", a);
                                    }
                            return this;
                        },
                        toggleClass: function(e, t) {
                            var n = typeof e,
                                i = "string" === n || Array.isArray(e);
                            return "boolean" == typeof t && i ?
                                t ?
                                this.addClass(e) :
                                this.removeClass(e) :
                                y(e) ?
                                this.each(function(n) {
                                    C(this).toggleClass(e.call(this, n, bt(this), t), t);
                                }) :
                                this.each(function() {
                                    var t, o, r, s;
                                    if (i)
                                        for (o = 0, r = C(this), s = _t(e);
                                            (t = s[o++]);)
                                            r.hasClass(t) ? r.removeClass(t) : r.addClass(t);
                                    else
                                        (void 0 !== e && "boolean" !== n) ||
                                        ((t = bt(this)) && J.set(this, "__className__", t),
                                            this.setAttribute &&
                                            this.setAttribute(
                                                "class",
                                                t || !1 === e ?
                                                "" :
                                                J.get(this, "__className__") || ""
                                            ));
                                });
                        },
                        hasClass: function(e) {
                            var t,
                                n,
                                i = 0;
                            for (t = " " + e + " ";
                                (n = this[i++]);)
                                if (1 === n.nodeType && (" " + xt(bt(n)) + " ").indexOf(t) > -1)
                                    return !0;
                            return !1;
                        },
                    });
                var Ct = /\r/g;
                C.fn.extend({
                        val: function(e) {
                            var t,
                                n,
                                i,
                                o = this[0];
                            return arguments.length ?
                                ((i = y(e)),
                                    this.each(function(n) {
                                        var o;
                                        1 === this.nodeType &&
                                            (null == (o = i ? e.call(this, n, C(this).val()) : e) ?
                                                (o = "") :
                                                "number" == typeof o ?
                                                (o += "") :
                                                Array.isArray(o) &&
                                                (o = C.map(o, function(e) {
                                                    return null == e ? "" : e + "";
                                                })),
                                                ((t =
                                                        C.valHooks[this.type] ||
                                                        C.valHooks[this.nodeName.toLowerCase()]) &&
                                                    "set" in t &&
                                                    void 0 !== t.set(this, o, "value")) ||
                                                (this.value = o));
                                    })) :
                                o ?
                                (t =
                                    C.valHooks[o.type] || C.valHooks[o.nodeName.toLowerCase()]) &&
                                "get" in t &&
                                void 0 !== (n = t.get(o, "value")) ?
                                n :
                                "string" == typeof(n = o.value) ?
                                n.replace(Ct, "") :
                                null == n ?
                                "" :
                                n :
                                void 0;
                        },
                    }),
                    C.extend({
                        valHooks: {
                            option: {
                                get: function(e) {
                                    var t = C.find.attr(e, "value");
                                    return null != t ? t : xt(C.text(e));
                                },
                            },
                            select: {
                                get: function(e) {
                                    var t,
                                        n,
                                        i,
                                        o = e.options,
                                        r = e.selectedIndex,
                                        s = "select-one" === e.type,
                                        a = s ? null : [],
                                        l = s ? r + 1 : o.length;
                                    for (i = r < 0 ? l : s ? r : 0; i < l; i++)
                                        if (
                                            ((n = o[i]).selected || i === r) &&
                                            !n.disabled &&
                                            (!n.parentNode.disabled || !I(n.parentNode, "optgroup"))
                                        ) {
                                            if (((t = C(n).val()), s)) return t;
                                            a.push(t);
                                        }
                                    return a;
                                },
                                set: function(e, t) {
                                    for (
                                        var n, i, o = e.options, r = C.makeArray(t), s = o.length; s--;

                                    )
                                        ((i = o[s]).selected =
                                            C.inArray(C.valHooks.option.get(i), r) > -1) && (n = !0);
                                    return n || (e.selectedIndex = -1), r;
                                },
                            },
                        },
                    }),
                    C.each(["radio", "checkbox"], function() {
                        (C.valHooks[this] = {
                            set: function(e, t) {
                                if (Array.isArray(t))
                                    return (e.checked = C.inArray(C(e).val(), t) > -1);
                            },
                        }),
                        v.checkOn ||
                            (C.valHooks[this].get = function(e) {
                                return null === e.getAttribute("value") ? "on" : e.value;
                            });
                    }),
                    (v.focusin = "onfocusin" in n);
                var Tt = /^(?:focusinfocus|focusoutblur)$/,
                    Et = function(e) {
                        e.stopPropagation();
                    };
                C.extend(C.event, {
                        trigger: function(e, t, i, o) {
                            var r,
                                a,
                                l,
                                c,
                                u,
                                d,
                                p,
                                h,
                                m = [i || s],
                                g = f.call(e, "type") ? e.type : e,
                                v = f.call(e, "namespace") ? e.namespace.split(".") : [];
                            if (
                                ((a = h = l = i = i || s),
                                    3 !== i.nodeType &&
                                    8 !== i.nodeType &&
                                    !Tt.test(g + C.event.triggered) &&
                                    (g.indexOf(".") > -1 &&
                                        ((v = g.split(".")), (g = v.shift()), v.sort()),
                                        (u = g.indexOf(":") < 0 && "on" + g),
                                        ((e = e[C.expando] ?
                                                e :
                                                new C.Event(g, "object" == typeof e && e)).isTrigger = o ?
                                            2 :
                                            3),
                                        (e.namespace = v.join(".")),
                                        (e.rnamespace = e.namespace ?
                                            new RegExp("(^|\\.)" + v.join("\\.(?:.*\\.|)") + "(\\.|$)") :
                                            null),
                                        (e.result = void 0),
                                        e.target || (e.target = i),
                                        (t = null == t ? [e] : C.makeArray(t, [e])),
                                        (p = C.event.special[g] || {}),
                                        o || !p.trigger || !1 !== p.trigger.apply(i, t)))
                            ) {
                                if (!o && !p.noBubble && !w(i)) {
                                    for (
                                        c = p.delegateType || g, Tt.test(c + g) || (a = a.parentNode); a; a = a.parentNode
                                    )
                                        m.push(a), (l = a);
                                    l === (i.ownerDocument || s) &&
                                        m.push(l.defaultView || l.parentWindow || n);
                                }
                                for (r = 0;
                                    (a = m[r++]) && !e.isPropagationStopped();)
                                    (h = a),
                                    (e.type = r > 1 ? c : p.bindType || g),
                                    (d =
                                        (J.get(a, "events") || {})[e.type] && J.get(a, "handle")) &&
                                    d.apply(a, t),
                                    (d = u && a[u]) &&
                                    d.apply &&
                                    Y(a) &&
                                    ((e.result = d.apply(a, t)), !1 === e.result && e.preventDefault());
                                return (
                                    (e.type = g),
                                    o ||
                                    e.isDefaultPrevented() ||
                                    (p._default && !1 !== p._default.apply(m.pop(), t)) ||
                                    !Y(i) ||
                                    (u &&
                                        y(i[g]) &&
                                        !w(i) &&
                                        ((l = i[u]) && (i[u] = null),
                                            (C.event.triggered = g),
                                            e.isPropagationStopped() && h.addEventListener(g, Et),
                                            i[g](),
                                            e.isPropagationStopped() && h.removeEventListener(g, Et),
                                            (C.event.triggered = void 0),
                                            l && (i[u] = l))),
                                    e.result
                                );
                            }
                        },
                        simulate: function(e, t, n) {
                            var i = C.extend(new C.Event(), n, { type: e, isSimulated: !0 });
                            C.event.trigger(i, null, t);
                        },
                    }),
                    C.fn.extend({
                        trigger: function(e, t) {
                            return this.each(function() {
                                C.event.trigger(e, t, this);
                            });
                        },
                        triggerHandler: function(e, t) {
                            var n = this[0];
                            if (n) return C.event.trigger(e, t, n, !0);
                        },
                    }),
                    v.focusin ||
                    C.each({ focus: "focusin", blur: "focusout" }, function(e, t) {
                        var n = function(e) {
                            C.event.simulate(t, e.target, C.event.fix(e));
                        };
                        C.event.special[t] = {
                            setup: function() {
                                var i = this.ownerDocument || this,
                                    o = J.access(i, t);
                                o || i.addEventListener(e, n, !0),
                                    J.access(i, t, (o || 0) + 1);
                            },
                            teardown: function() {
                                var i = this.ownerDocument || this,
                                    o = J.access(i, t) - 1;
                                o
                                    ?
                                    J.access(i, t, o) :
                                    (i.removeEventListener(e, n, !0), J.remove(i, t));
                            },
                        };
                    });
                var kt = n.location,
                    St = Date.now(),
                    Dt = /\?/;
                C.parseXML = function(e) {
                    var t;
                    if (!e || "string" != typeof e) return null;
                    try {
                        t = new n.DOMParser().parseFromString(e, "text/xml");
                    } catch (e) {
                        t = void 0;
                    }
                    return (
                        (t && !t.getElementsByTagName("parsererror").length) ||
                        C.error("Invalid XML: " + e),
                        t
                    );
                };
                var At = /\[\]$/,
                    It = /\r?\n/g,
                    jt = /^(?:submit|button|image|reset|file)$/i,
                    Ot = /^(?:input|select|textarea|keygen)/i;

                function Lt(e, t, n, i) {
                    var o;
                    if (Array.isArray(t))
                        C.each(t, function(t, o) {
                            n || At.test(e) ?
                                i(e, o) :
                                Lt(
                                    e +
                                    "[" +
                                    ("object" == typeof o && null != o ? t : "") +
                                    "]",
                                    o,
                                    n,
                                    i
                                );
                        });
                    else if (n || "object" !== _(t)) i(e, t);
                    else
                        for (o in t) Lt(e + "[" + o + "]", t[o], n, i);
                }
                (C.param = function(e, t) {
                    var n,
                        i = [],
                        o = function(e, t) {
                            var n = y(t) ? t() : t;
                            i[i.length] =
                                encodeURIComponent(e) +
                                "=" +
                                encodeURIComponent(null == n ? "" : n);
                        };
                    if (null == e) return "";
                    if (Array.isArray(e) || (e.jquery && !C.isPlainObject(e)))
                        C.each(e, function() {
                            o(this.name, this.value);
                        });
                    else
                        for (n in e) Lt(n, e[n], t, o);
                    return i.join("&");
                }),
                C.fn.extend({
                    serialize: function() {
                        return C.param(this.serializeArray());
                    },
                    serializeArray: function() {
                        return this.map(function() {
                                var e = C.prop(this, "elements");
                                return e ? C.makeArray(e) : this;
                            })
                            .filter(function() {
                                var e = this.type;
                                return (
                                    this.name &&
                                    !C(this).is(":disabled") &&
                                    Ot.test(this.nodeName) &&
                                    !jt.test(e) &&
                                    (this.checked || !me.test(e))
                                );
                            })
                            .map(function(e, t) {
                                var n = C(this).val();
                                return null == n ?
                                    null :
                                    Array.isArray(n) ?
                                    C.map(n, function(e) {
                                        return { name: t.name, value: e.replace(It, "\r\n") };
                                    }) :
                                    { name: t.name, value: n.replace(It, "\r\n") };
                            })
                            .get();
                    },
                });
                var Nt = /%20/g,
                    Mt = /#.*$/,
                    Pt = /([?&])_=[^&]*/,
                    Rt = /^(.*?):[ \t]*([^\r\n]*)$/gm,
                    zt = /^(?:GET|HEAD)$/,
                    $t = /^\/\//,
                    Ft = {},
                    qt = {},
                    Ht = "*/".concat("*"),
                    Wt = s.createElement("a");

                function Bt(e) {
                    return function(t, n) {
                        "string" != typeof t && ((n = t), (t = "*"));
                        var i,
                            o = 0,
                            r = t.toLowerCase().match(z) || [];
                        if (y(n))
                            for (;
                                (i = r[o++]);)
                                "+" === i[0] ?
                                ((i = i.slice(1) || "*"), (e[i] = e[i] || []).unshift(n)) :
                                (e[i] = e[i] || []).push(n);
                    };
                }

                function Zt(e, t, n, i) {
                    var o = {},
                        r = e === qt;

                    function s(a) {
                        var l;
                        return (
                            (o[a] = !0),
                            C.each(e[a] || [], function(e, a) {
                                var c = a(t, n, i);
                                return "string" != typeof c || r || o[c] ?
                                    r ?
                                    !(l = c) :
                                    void 0 :
                                    (t.dataTypes.unshift(c), s(c), !1);
                            }),
                            l
                        );
                    }
                    return s(t.dataTypes[0]) || (!o["*"] && s("*"));
                }

                function Ut(e, t) {
                    var n,
                        i,
                        o = C.ajaxSettings.flatOptions || {};
                    for (n in t)
                        void 0 !== t[n] && ((o[n] ? e : i || (i = {}))[n] = t[n]);
                    return i && C.extend(!0, e, i), e;
                }
                (Wt.href = kt.href),
                C.extend({
                        active: 0,
                        lastModified: {},
                        etag: {},
                        ajaxSettings: {
                            url: kt.href,
                            type: "GET",
                            isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(
                                kt.protocol
                            ),
                            global: !0,
                            processData: !0,
                            async: !0,
                            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                            accepts: {
                                "*": Ht,
                                text: "text/plain",
                                html: "text/html",
                                xml: "application/xml, text/xml",
                                json: "application/json, text/javascript",
                            },
                            contents: { xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/ },
                            responseFields: {
                                xml: "responseXML",
                                text: "responseText",
                                json: "responseJSON",
                            },
                            converters: {
                                "* text": String,
                                "text html": !0,
                                "text json": JSON.parse,
                                "text xml": C.parseXML,
                            },
                            flatOptions: { url: !0, context: !0 },
                        },
                        ajaxSetup: function(e, t) {
                            return t ? Ut(Ut(e, C.ajaxSettings), t) : Ut(C.ajaxSettings, e);
                        },
                        ajaxPrefilter: Bt(Ft),
                        ajaxTransport: Bt(qt),
                        ajax: function(e, t) {
                            "object" == typeof e && ((t = e), (e = void 0)), (t = t || {});
                            var i,
                                o,
                                r,
                                a,
                                l,
                                c,
                                u,
                                d,
                                p,
                                h,
                                f = C.ajaxSetup({}, t),
                                m = f.context || f,
                                g = f.context && (m.nodeType || m.jquery) ? C(m) : C.event,
                                v = C.Deferred(),
                                y = C.Callbacks("once memory"),
                                w = f.statusCode || {},
                                x = {},
                                b = {},
                                _ = "canceled",
                                T = {
                                    readyState: 0,
                                    getResponseHeader: function(e) {
                                        var t;
                                        if (u) {
                                            if (!a)
                                                for (a = {};
                                                    (t = Rt.exec(r));)
                                                    a[t[1].toLowerCase() + " "] = (
                                                        a[t[1].toLowerCase() + " "] || []
                                                    ).concat(t[2]);
                                            t = a[e.toLowerCase() + " "];
                                        }
                                        return null == t ? null : t.join(", ");
                                    },
                                    getAllResponseHeaders: function() {
                                        return u ? r : null;
                                    },
                                    setRequestHeader: function(e, t) {
                                        return (
                                            null == u &&
                                            ((e = b[e.toLowerCase()] = b[e.toLowerCase()] || e),
                                                (x[e] = t)),
                                            this
                                        );
                                    },
                                    overrideMimeType: function(e) {
                                        return null == u && (f.mimeType = e), this;
                                    },
                                    statusCode: function(e) {
                                        var t;
                                        if (e)
                                            if (u) T.always(e[T.status]);
                                            else
                                                for (t in e) w[t] = [w[t], e[t]];
                                        return this;
                                    },
                                    abort: function(e) {
                                        var t = e || _;
                                        return i && i.abort(t), E(0, t), this;
                                    },
                                };
                            if (
                                (v.promise(T),
                                    (f.url = ((e || f.url || kt.href) + "").replace(
                                        $t,
                                        kt.protocol + "//"
                                    )),
                                    (f.type = t.method || t.type || f.method || f.type),
                                    (f.dataTypes = (f.dataType || "*").toLowerCase().match(z) || [
                                        "",
                                    ]),
                                    null == f.crossDomain)
                            ) {
                                c = s.createElement("a");
                                try {
                                    (c.href = f.url),
                                    (c.href = c.href),
                                    (f.crossDomain =
                                        Wt.protocol + "//" + Wt.host !=
                                        c.protocol + "//" + c.host);
                                } catch (e) {
                                    f.crossDomain = !0;
                                }
                            }
                            if (
                                (f.data &&
                                    f.processData &&
                                    "string" != typeof f.data &&
                                    (f.data = C.param(f.data, f.traditional)),
                                    Zt(Ft, f, t, T),
                                    u)
                            )
                                return T;
                            for (p in ((d = C.event && f.global) &&
                                    0 == C.active++ &&
                                    C.event.trigger("ajaxStart"),
                                    (f.type = f.type.toUpperCase()),
                                    (f.hasContent = !zt.test(f.type)),
                                    (o = f.url.replace(Mt, "")),
                                    f.hasContent ?
                                    f.data &&
                                    f.processData &&
                                    0 ===
                                    (f.contentType || "").indexOf(
                                        "application/x-www-form-urlencoded"
                                    ) &&
                                    (f.data = f.data.replace(Nt, "+")) :
                                    ((h = f.url.slice(o.length)),
                                        f.data &&
                                        (f.processData || "string" == typeof f.data) &&
                                        ((o += (Dt.test(o) ? "&" : "?") + f.data), delete f.data), !1 === f.cache &&
                                        ((o = o.replace(Pt, "$1")),
                                            (h = (Dt.test(o) ? "&" : "?") + "_=" + St++ + h)),
                                        (f.url = o + h)),
                                    f.ifModified &&
                                    (C.lastModified[o] &&
                                        T.setRequestHeader("If-Modified-Since", C.lastModified[o]),
                                        C.etag[o] && T.setRequestHeader("If-None-Match", C.etag[o])),
                                    ((f.data && f.hasContent && !1 !== f.contentType) ||
                                        t.contentType) &&
                                    T.setRequestHeader("Content-Type", f.contentType),
                                    T.setRequestHeader(
                                        "Accept",
                                        f.dataTypes[0] && f.accepts[f.dataTypes[0]] ?
                                        f.accepts[f.dataTypes[0]] +
                                        ("*" !== f.dataTypes[0] ? ", " + Ht + "; q=0.01" : "") :
                                        f.accepts["*"]
                                    ),
                                    f.headers))
                                T.setRequestHeader(p, f.headers[p]);
                            if (f.beforeSend && (!1 === f.beforeSend.call(m, T, f) || u))
                                return T.abort();
                            if (
                                ((_ = "abort"),
                                    y.add(f.complete),
                                    T.done(f.success),
                                    T.fail(f.error),
                                    (i = Zt(qt, f, t, T)))
                            ) {
                                if (((T.readyState = 1), d && g.trigger("ajaxSend", [T, f]), u))
                                    return T;
                                f.async &&
                                    f.timeout > 0 &&
                                    (l = n.setTimeout(function() {
                                        T.abort("timeout");
                                    }, f.timeout));
                                try {
                                    (u = !1), i.send(x, E);
                                } catch (e) {
                                    if (u) throw e;
                                    E(-1, e);
                                }
                            } else E(-1, "No Transport");

                            function E(e, t, s, a) {
                                var c,
                                    p,
                                    h,
                                    x,
                                    b,
                                    _ = t;
                                u ||
                                    ((u = !0),
                                        l && n.clearTimeout(l),
                                        (i = void 0),
                                        (r = a || ""),
                                        (T.readyState = e > 0 ? 4 : 0),
                                        (c = (e >= 200 && e < 300) || 304 === e),
                                        s &&
                                        (x = (function(e, t, n) {
                                            for (
                                                var i, o, r, s, a = e.contents, l = e.dataTypes;
                                                "*" === l[0];

                                            )
                                                l.shift(),
                                                void 0 === i &&
                                                (i =
                                                    e.mimeType ||
                                                    t.getResponseHeader("Content-Type"));
                                            if (i)
                                                for (o in a)
                                                    if (a[o] && a[o].test(i)) {
                                                        l.unshift(o);
                                                        break;
                                                    }
                                            if (l[0] in n) r = l[0];
                                            else {
                                                for (o in n) {
                                                    if (!l[0] || e.converters[o + " " + l[0]]) {
                                                        r = o;
                                                        break;
                                                    }
                                                    s || (s = o);
                                                }
                                                r = r || s;
                                            }
                                            if (r) return r !== l[0] && l.unshift(r), n[r];
                                        })(f, T, s)),
                                        (x = (function(e, t, n, i) {
                                            var o,
                                                r,
                                                s,
                                                a,
                                                l,
                                                c = {},
                                                u = e.dataTypes.slice();
                                            if (u[1])
                                                for (s in e.converters)
                                                    c[s.toLowerCase()] = e.converters[s];
                                            for (r = u.shift(); r;)
                                                if (
                                                    (e.responseFields[r] && (n[e.responseFields[r]] = t), !l &&
                                                        i &&
                                                        e.dataFilter &&
                                                        (t = e.dataFilter(t, e.dataType)),
                                                        (l = r),
                                                        (r = u.shift()))
                                                )
                                                    if ("*" === r) r = l;
                                                    else if ("*" !== l && l !== r) {
                                                if (!(s = c[l + " " + r] || c["* " + r]))
                                                    for (o in c)
                                                        if (
                                                            (a = o.split(" "))[1] === r &&
                                                            (s = c[l + " " + a[0]] || c["* " + a[0]])
                                                        ) {
                                                            !0 === s ?
                                                                (s = c[o]) :
                                                                !0 !== c[o] &&
                                                                ((r = a[0]), u.unshift(a[1]));
                                                            break;
                                                        }
                                                if (!0 !== s)
                                                    if (s && e.throws) t = s(t);
                                                    else
                                                        try {
                                                            t = s(t);
                                                        } catch (e) {
                                                            return {
                                                                state: "parsererror",
                                                                error: s ?
                                                                    e :
                                                                    "No conversion from " + l + " to " + r,
                                                            };
                                                        }
                                            }
                                            return { state: "success", data: t };
                                        })(f, x, T, c)),
                                        c ?
                                        (f.ifModified &&
                                            ((b = T.getResponseHeader("Last-Modified")) &&
                                                (C.lastModified[o] = b),
                                                (b = T.getResponseHeader("etag")) && (C.etag[o] = b)),
                                            204 === e || "HEAD" === f.type ?
                                            (_ = "nocontent") :
                                            304 === e ?
                                            (_ = "notmodified") :
                                            ((_ = x.state), (p = x.data), (c = !(h = x.error)))) :
                                        ((h = _), (!e && _) || ((_ = "error"), e < 0 && (e = 0))),
                                        (T.status = e),
                                        (T.statusText = (t || _) + ""),
                                        c ? v.resolveWith(m, [p, _, T]) : v.rejectWith(m, [T, _, h]),
                                        T.statusCode(w),
                                        (w = void 0),
                                        d &&
                                        g.trigger(c ? "ajaxSuccess" : "ajaxError", [
                                            T,
                                            f,
                                            c ? p : h,
                                        ]),
                                        y.fireWith(m, [T, _]),
                                        d &&
                                        (g.trigger("ajaxComplete", [T, f]),
                                            --C.active || C.event.trigger("ajaxStop")));
                            }
                            return T;
                        },
                        getJSON: function(e, t, n) {
                            return C.get(e, t, n, "json");
                        },
                        getScript: function(e, t) {
                            return C.get(e, void 0, t, "script");
                        },
                    }),
                    C.each(["get", "post"], function(e, t) {
                        C[t] = function(e, n, i, o) {
                            return (
                                y(n) && ((o = o || i), (i = n), (n = void 0)),
                                C.ajax(
                                    C.extend({ url: e, type: t, dataType: o, data: n, success: i },
                                        C.isPlainObject(e) && e
                                    )
                                )
                            );
                        };
                    }),
                    (C._evalUrl = function(e, t) {
                        return C.ajax({
                            url: e,
                            type: "GET",
                            dataType: "script",
                            cache: !0,
                            async: !1,
                            global: !1,
                            converters: { "text script": function() {} },
                            dataFilter: function(e) {
                                C.globalEval(e, t);
                            },
                        });
                    }),
                    C.fn.extend({
                        wrapAll: function(e) {
                            var t;
                            return (
                                this[0] &&
                                (y(e) && (e = e.call(this[0])),
                                    (t = C(e, this[0].ownerDocument).eq(0).clone(!0)),
                                    this[0].parentNode && t.insertBefore(this[0]),
                                    t
                                    .map(function() {
                                        for (var e = this; e.firstElementChild;)
                                            e = e.firstElementChild;
                                        return e;
                                    })
                                    .append(this)),
                                this
                            );
                        },
                        wrapInner: function(e) {
                            return y(e) ?
                                this.each(function(t) {
                                    C(this).wrapInner(e.call(this, t));
                                }) :
                                this.each(function() {
                                    var t = C(this),
                                        n = t.contents();
                                    n.length ? n.wrapAll(e) : t.append(e);
                                });
                        },
                        wrap: function(e) {
                            var t = y(e);
                            return this.each(function(n) {
                                C(this).wrapAll(t ? e.call(this, n) : e);
                            });
                        },
                        unwrap: function(e) {
                            return (
                                this.parent(e)
                                .not("body")
                                .each(function() {
                                    C(this).replaceWith(this.childNodes);
                                }),
                                this
                            );
                        },
                    }),
                    (C.expr.pseudos.hidden = function(e) {
                        return !C.expr.pseudos.visible(e);
                    }),
                    (C.expr.pseudos.visible = function(e) {
                        return !!(
                            e.offsetWidth ||
                            e.offsetHeight ||
                            e.getClientRects().length
                        );
                    }),
                    (C.ajaxSettings.xhr = function() {
                        try {
                            return new n.XMLHttpRequest();
                        } catch (e) {}
                    });
                var Vt = { 0: 200, 1223: 204 },
                    Xt = C.ajaxSettings.xhr();
                (v.cors = !!Xt && "withCredentials" in Xt),
                (v.ajax = Xt = !!Xt),
                C.ajaxTransport(function(e) {
                        var t, i;
                        if (v.cors || (Xt && !e.crossDomain))
                            return {
                                send: function(o, r) {
                                    var s,
                                        a = e.xhr();
                                    if (
                                        (a.open(e.type, e.url, e.async, e.username, e.password),
                                            e.xhrFields)
                                    )
                                        for (s in e.xhrFields) a[s] = e.xhrFields[s];
                                    for (s in (e.mimeType &&
                                            a.overrideMimeType &&
                                            a.overrideMimeType(e.mimeType),
                                            e.crossDomain ||
                                            o["X-Requested-With"] ||
                                            (o["X-Requested-With"] = "XMLHttpRequest"),
                                            o))
                                        a.setRequestHeader(s, o[s]);
                                    (t = function(e) {
                                        return function() {
                                            t &&
                                                ((t =
                                                        i =
                                                        a.onload =
                                                        a.onerror =
                                                        a.onabort =
                                                        a.ontimeout =
                                                        a.onreadystatechange =
                                                        null),
                                                    "abort" === e ?
                                                    a.abort() :
                                                    "error" === e ?
                                                    "number" != typeof a.status ?
                                                    r(0, "error") :
                                                    r(a.status, a.statusText) :
                                                    r(
                                                        Vt[a.status] || a.status,
                                                        a.statusText,
                                                        "text" !== (a.responseType || "text") ||
                                                        "string" != typeof a.responseText ?
                                                        { binary: a.response } :
                                                        { text: a.responseText },
                                                        a.getAllResponseHeaders()
                                                    ));
                                        };
                                    }),
                                    (a.onload = t()),
                                    (i = a.onerror = a.ontimeout = t("error")),
                                    void 0 !== a.onabort ?
                                        (a.onabort = i) :
                                        (a.onreadystatechange = function() {
                                            4 === a.readyState &&
                                                n.setTimeout(function() {
                                                    t && i();
                                                });
                                        }),
                                        (t = t("abort"));
                                    try {
                                        a.send((e.hasContent && e.data) || null);
                                    } catch (e) {
                                        if (t) throw e;
                                    }
                                },
                                abort: function() {
                                    t && t();
                                },
                            };
                    }),
                    C.ajaxPrefilter(function(e) {
                        e.crossDomain && (e.contents.script = !1);
                    }),
                    C.ajaxSetup({
                        accepts: {
                            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript",
                        },
                        contents: { script: /\b(?:java|ecma)script\b/ },
                        converters: {
                            "text script": function(e) {
                                return C.globalEval(e), e;
                            },
                        },
                    }),
                    C.ajaxPrefilter("script", function(e) {
                        void 0 === e.cache && (e.cache = !1),
                            e.crossDomain && (e.type = "GET");
                    }),
                    C.ajaxTransport("script", function(e) {
                        var t, n;
                        if (e.crossDomain || e.scriptAttrs)
                            return {
                                send: function(i, o) {
                                    (t = C("<script>")
                                        .attr(e.scriptAttrs || {})
                                        .prop({ charset: e.scriptCharset, src: e.url })
                                        .on(
                                            "load error",
                                            (n = function(e) {
                                                t.remove(),
                                                    (n = null),
                                                    e && o("error" === e.type ? 404 : 200, e.type);
                                            })
                                        )),
                                    s.head.appendChild(t[0]);
                                },
                                abort: function() {
                                    n && n();
                                },
                            };
                    });
                var Kt,
                    Yt = [],
                    Gt = /(=)\?(?=&|$)|\?\?/;
                C.ajaxSetup({
                        jsonp: "callback",
                        jsonpCallback: function() {
                            var e = Yt.pop() || C.expando + "_" + St++;
                            return (this[e] = !0), e;
                        },
                    }),
                    C.ajaxPrefilter("json jsonp", function(e, t, i) {
                        var o,
                            r,
                            s,
                            a = !1 !== e.jsonp &&
                            (Gt.test(e.url) ?
                                "url" :
                                "string" == typeof e.data &&
                                0 ===
                                (e.contentType || "").indexOf(
                                    "application/x-www-form-urlencoded"
                                ) &&
                                Gt.test(e.data) &&
                                "data");
                        if (a || "jsonp" === e.dataTypes[0])
                            return (
                                (o = e.jsonpCallback =
                                    y(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback),
                                a ?
                                (e[a] = e[a].replace(Gt, "$1" + o)) :
                                !1 !== e.jsonp &&
                                (e.url += (Dt.test(e.url) ? "&" : "?") + e.jsonp + "=" + o),
                                (e.converters["script json"] = function() {
                                    return s || C.error(o + " was not called"), s[0];
                                }),
                                (e.dataTypes[0] = "json"),
                                (r = n[o]),
                                (n[o] = function() {
                                    s = arguments;
                                }),
                                i.always(function() {
                                    void 0 === r ? C(n).removeProp(o) : (n[o] = r),
                                        e[o] && ((e.jsonpCallback = t.jsonpCallback), Yt.push(o)),
                                        s && y(r) && r(s[0]),
                                        (s = r = void 0);
                                }),
                                "script"
                            );
                    }),
                    (v.createHTMLDocument =
                        (((Kt = s.implementation.createHTMLDocument("").body).innerHTML =
                                "<form></form><form></form>"),
                            2 === Kt.childNodes.length)),
                    (C.parseHTML = function(e, t, n) {
                        return "string" != typeof e ?
                            [] :
                            ("boolean" == typeof t && ((n = t), (t = !1)),
                                t ||
                                (v.createHTMLDocument ?
                                    (((i = (t =
                                            s.implementation.createHTMLDocument("")).createElement(
                                            "base"
                                        )).href = s.location.href),
                                        t.head.appendChild(i)) :
                                    (t = s)),
                                (r = !n && []),
                                (o = j.exec(e)) ?
                                [t.createElement(o[1])] :
                                ((o = Te([e], t, r)),
                                    r && r.length && C(r).remove(),
                                    C.merge([], o.childNodes)));
                        var i, o, r;
                    }),
                    (C.fn.load = function(e, t, n) {
                        var i,
                            o,
                            r,
                            s = this,
                            a = e.indexOf(" ");
                        return (
                            a > -1 && ((i = xt(e.slice(a))), (e = e.slice(0, a))),
                            y(t) ?
                            ((n = t), (t = void 0)) :
                            t && "object" == typeof t && (o = "POST"),
                            s.length > 0 &&
                            C.ajax({ url: e, type: o || "GET", dataType: "html", data: t })
                            .done(function(e) {
                                (r = arguments),
                                s.html(i ? C("<div>").append(C.parseHTML(e)).find(i) : e);
                            })
                            .always(
                                n &&
                                function(e, t) {
                                    s.each(function() {
                                        n.apply(this, r || [e.responseText, t, e]);
                                    });
                                }
                            ),
                            this
                        );
                    }),
                    C.each(
                        [
                            "ajaxStart",
                            "ajaxStop",
                            "ajaxComplete",
                            "ajaxError",
                            "ajaxSuccess",
                            "ajaxSend",
                        ],
                        function(e, t) {
                            C.fn[t] = function(e) {
                                return this.on(t, e);
                            };
                        }
                    ),
                    (C.expr.pseudos.animated = function(e) {
                        return C.grep(C.timers, function(t) {
                            return e === t.elem;
                        }).length;
                    }),
                    (C.offset = {
                        setOffset: function(e, t, n) {
                            var i,
                                o,
                                r,
                                s,
                                a,
                                l,
                                c = C.css(e, "position"),
                                u = C(e),
                                d = {};
                            "static" === c && (e.style.position = "relative"),
                                (a = u.offset()),
                                (r = C.css(e, "top")),
                                (l = C.css(e, "left")),
                                ("absolute" === c || "fixed" === c) &&
                                (r + l).indexOf("auto") > -1 ?
                                ((s = (i = u.position()).top), (o = i.left)) :
                                ((s = parseFloat(r) || 0), (o = parseFloat(l) || 0)),
                                y(t) && (t = t.call(e, n, C.extend({}, a))),
                                null != t.top && (d.top = t.top - a.top + s),
                                null != t.left && (d.left = t.left - a.left + o),
                                "using" in t ? t.using.call(e, d) : u.css(d);
                        },
                    }),
                    C.fn.extend({
                        offset: function(e) {
                            if (arguments.length)
                                return void 0 === e ?
                                    this :
                                    this.each(function(t) {
                                        C.offset.setOffset(this, e, t);
                                    });
                            var t,
                                n,
                                i = this[0];
                            return i ?
                                i.getClientRects().length ?
                                ((t = i.getBoundingClientRect()),
                                    (n = i.ownerDocument.defaultView), {
                                        top: t.top + n.pageYOffset,
                                        left: t.left + n.pageXOffset,
                                    }) :
                                { top: 0, left: 0 } :
                                void 0;
                        },
                        position: function() {
                            if (this[0]) {
                                var e,
                                    t,
                                    n,
                                    i = this[0],
                                    o = { top: 0, left: 0 };
                                if ("fixed" === C.css(i, "position"))
                                    t = i.getBoundingClientRect();
                                else {
                                    for (
                                        t = this.offset(),
                                        n = i.ownerDocument,
                                        e = i.offsetParent || n.documentElement; e &&
                                        (e === n.body || e === n.documentElement) &&
                                        "static" === C.css(e, "position");

                                    )
                                        e = e.parentNode;
                                    e &&
                                        e !== i &&
                                        1 === e.nodeType &&
                                        (((o = C(e).offset()).top += C.css(
                                                e,
                                                "borderTopWidth", !0
                                            )),
                                            (o.left += C.css(e, "borderLeftWidth", !0)));
                                }
                                return {
                                    top: t.top - o.top - C.css(i, "marginTop", !0),
                                    left: t.left - o.left - C.css(i, "marginLeft", !0),
                                };
                            }
                        },
                        offsetParent: function() {
                            return this.map(function() {
                                for (
                                    var e = this.offsetParent; e && "static" === C.css(e, "position");

                                )
                                    e = e.offsetParent;
                                return e || se;
                            });
                        },
                    }),
                    C.each({ scrollLeft: "pageXOffset", scrollTop: "pageYOffset" },
                        function(e, t) {
                            var n = "pageYOffset" === t;
                            C.fn[e] = function(i) {
                                return Z(
                                    this,
                                    function(e, i, o) {
                                        var r;
                                        if (
                                            (w(e) ? (r = e) : 9 === e.nodeType && (r = e.defaultView),
                                                void 0 === o)
                                        )
                                            return r ? r[t] : e[i];
                                        r
                                            ?
                                            r.scrollTo(n ? r.pageXOffset : o, n ? o : r.pageYOffset) :
                                            (e[i] = o);
                                    },
                                    e,
                                    i,
                                    arguments.length
                                );
                            };
                        }
                    ),
                    C.each(["top", "left"], function(e, t) {
                        C.cssHooks[t] = Xe(v.pixelPosition, function(e, n) {
                            if (n)
                                return (
                                    (n = Ve(e, t)), Be.test(n) ? C(e).position()[t] + "px" : n
                                );
                        });
                    }),
                    C.each({ Height: "height", Width: "width" }, function(e, t) {
                        C.each({ padding: "inner" + e, content: t, "": "outer" + e },
                            function(n, i) {
                                C.fn[i] = function(o, r) {
                                    var s = arguments.length && (n || "boolean" != typeof o),
                                        a = n || (!0 === o || !0 === r ? "margin" : "border");
                                    return Z(
                                        this,
                                        function(t, n, o) {
                                            var r;
                                            return w(t) ?
                                                0 === i.indexOf("outer") ?
                                                t["inner" + e] :
                                                t.document.documentElement["client" + e] :
                                                9 === t.nodeType ?
                                                ((r = t.documentElement),
                                                    Math.max(
                                                        t.body["scroll" + e],
                                                        r["scroll" + e],
                                                        t.body["offset" + e],
                                                        r["offset" + e],
                                                        r["client" + e]
                                                    )) :
                                                void 0 === o ?
                                                C.css(t, n, a) :
                                                C.style(t, n, o, a);
                                        },
                                        t,
                                        s ? o : void 0,
                                        s
                                    );
                                };
                            }
                        );
                    }),
                    C.each(
                        "blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(
                            " "
                        ),
                        function(e, t) {
                            C.fn[t] = function(e, n) {
                                return arguments.length > 0 ?
                                    this.on(t, null, e, n) :
                                    this.trigger(t);
                            };
                        }
                    ),
                    C.fn.extend({
                        hover: function(e, t) {
                            return this.mouseenter(e).mouseleave(t || e);
                        },
                    }),
                    C.fn.extend({
                        bind: function(e, t, n) {
                            return this.on(e, null, t, n);
                        },
                        unbind: function(e, t) {
                            return this.off(e, null, t);
                        },
                        delegate: function(e, t, n, i) {
                            return this.on(t, e, n, i);
                        },
                        undelegate: function(e, t, n) {
                            return 1 === arguments.length ?
                                this.off(e, "**") :
                                this.off(t, e || "**", n);
                        },
                    }),
                    (C.proxy = function(e, t) {
                        var n, i, o;
                        if (("string" == typeof t && ((n = e[t]), (t = e), (e = n)), y(e)))
                            return (
                                (i = l.call(arguments, 2)),
                                ((o = function() {
                                        return e.apply(t || this, i.concat(l.call(arguments)));
                                    }).guid = e.guid =
                                    e.guid || C.guid++),
                                o
                            );
                    }),
                    (C.holdReady = function(e) {
                        e ? C.readyWait++ : C.ready(!0);
                    }),
                    (C.isArray = Array.isArray),
                    (C.parseJSON = JSON.parse),
                    (C.nodeName = I),
                    (C.isFunction = y),
                    (C.isWindow = w),
                    (C.camelCase = K),
                    (C.type = _),
                    (C.now = Date.now),
                    (C.isNumeric = function(e) {
                        var t = C.type(e);
                        return (
                            ("number" === t || "string" === t) && !isNaN(e - parseFloat(e))
                        );
                    }),
                    void 0 ===
                    (i = function() {
                        return C;
                    }.apply(t, [])) || (e.exports = i);
                var Jt = n.jQuery,
                    Qt = n.$;
                return (
                    (C.noConflict = function(e) {
                        return (
                            n.$ === C && (n.$ = Qt), e && n.jQuery === C && (n.jQuery = Jt), C
                        );
                    }),
                    o || (n.jQuery = n.$ = C),
                    C
                );
            });
        },
        function(e, t, n) {
            "use strict";

            function i(e) {
                return (
                    (function(e) {
                        if (Array.isArray(e)) {
                            for (var t = 0, n = new Array(e.length); t < e.length; t++)
                                n[t] = e[t];
                            return n;
                        }
                    })(e) ||
                    (function(e) {
                        if (
                            Symbol.iterator in Object(e) ||
                            "[object Arguments]" === Object.prototype.toString.call(e)
                        )
                            return Array.from(e);
                    })(e) ||
                    (function() {
                        throw new TypeError(
                            "Invalid attempt to spread non-iterable instance"
                        );
                    })()
                );
            }
            var o = function(e, t) {
                    return (!(!e || "function" != typeof t) &&
                        (e.length ?
                            i(e).map(function(e, n) {
                                return t(e, n);
                            }) :
                            e instanceof HTMLElement && t(e, 0))
                    );
                },
                r = function(e) {
                    if (!e) return !1;
                    var t = e.getBoundingClientRect();
                    return {
                        top: t.top + window.pageYOffset - document.documentElement.clientTop,
                        left: t.left + window.pageXOffset - document.documentElement.clientLeft,
                    };
                },
                s = function(e, t) {
                    return '<svg class="icon icon-svg icon-svg-'
                        .concat(e, " ")
                        .concat(
                            t || "",
                            '">\n            <use xlink:href="/assets/images/icons.svg#'
                        )
                        .concat(e, '">\n              </use></svg>');
                };
            n.d(t, "b", function() {
                    return r;
                }),
                n.d(t, "c", function() {
                    return s;
                }),
                n.d(t, "a", function() {
                    return o;
                });
        },
        function(e, t, n) {
            "use strict";
            (function(e) {
                n(16);
                var i = n(0),
                    o = n(2);
                (e.fn.owlCarousel.Constructor.Plugins.Navigation.Defaults.navText = [
                    Object(o.c)("left"),
                    Object(o.c)("right"),
                ]),
                (e.fn.owlCarousel.Constructor.Defaults.rtl = i.a.isRtl),
                (t.a = function(t) {
                    return (!!t &&
                        (e(t)
                            .trigger("destroy.owl.carousel")
                            .removeClass("owl-carousel owl-loaded"),
                            e(t).find(".owl-stage-outer").children().unwrap(),
                            e(t).find(".owl-thumbs").remove(),
                            t)
                    );
                });
            }.call(this, n(1)));
        },
        function(e, t, n) {
            var i, o;
            /*! PhotoSwipe Default UI - 4.1.3 - 2019-01-08
             * http://photoswipe.com
             * Copyright (c) 2019 Dmitry Semenov; */
            void 0 ===
                (o =
                    "function" ==
                    typeof(i = function() {
                        "use strict";
                        return function(e, t) {
                            var n,
                                i,
                                o,
                                r,
                                s,
                                a,
                                l,
                                c,
                                u,
                                d,
                                p,
                                h,
                                f,
                                m,
                                g,
                                v,
                                y,
                                w,
                                x = this,
                                b = !1,
                                _ = !0,
                                C = !0,
                                T = {
                                    barsSize: { top: 44, bottom: "auto" },
                                    closeElClasses: [
                                        "item",
                                        "caption",
                                        "zoom-wrap",
                                        "ui",
                                        "top-bar",
                                    ],
                                    timeToIdle: 4e3,
                                    timeToIdleOutside: 1e3,
                                    loadingIndicatorDelay: 1e3,
                                    addCaptionHTMLFn: function(e, t) {
                                        return e.title ?
                                            ((t.children[0].innerHTML = e.title), !0) :
                                            ((t.children[0].innerHTML = ""), !1);
                                    },
                                    closeEl: !0,
                                    captionEl: !0,
                                    fullscreenEl: !0,
                                    zoomEl: !0,
                                    shareEl: !0,
                                    counterEl: !0,
                                    arrowEl: !0,
                                    preloaderEl: !0,
                                    tapToClose: !1,
                                    tapToToggleControls: !0,
                                    clickToCloseNonZoomable: !0,
                                  
                                    
                                    getImageURLForShare: function() {
                                        return e.currItem.src || "";
                                    },
                                    getPageURLForShare: function() {
                                        return window.location.href;
                                    },
                                    getTextForShare: function() {
                                        return e.currItem.title || "";
                                    },
                                    indexIndicatorSep: " / ",
                                    fitControlsWidth: 1200,
                                },
                                E = function(e) {
                                    if (v) return !0;
                                    (e = e || window.event),
                                    g.timeToIdle && g.mouseUsed && !u && N();
                                    for (
                                        var n,
                                            i,
                                            o =
                                            (e.target || e.srcElement).getAttribute("class") || "",
                                            r = 0; r < z.length; r++
                                    )
                                        (n = z[r]).onTap &&
                                        o.indexOf("pswp__" + n.name) > -1 &&
                                        (n.onTap(), (i = !0));
                                    if (i) {
                                        e.stopPropagation && e.stopPropagation(), (v = !0);
                                        var s = t.features.isOldAndroid ? 600 : 30;
                                        setTimeout(function() {
                                            v = !1;
                                        }, s);
                                    }
                                },
                                k = function(e, n, i) {
                                    t[(i ? "add" : "remove") + "Class"](e, "pswp__" + n);
                                },
                                S = function() {
                                    var e = 1 === g.getNumItemsFn();
                                    e !== m && (k(i, "ui--one-slide", e), (m = e));
                                },
                                D = function() {
                                    k(l, "share-modal--hidden", C);
                                },
                                A = function() {
                                    return (
                                        (C = !C) ?
                                        (t.removeClass(l, "pswp__share-modal--fade-in"),
                                            setTimeout(function() {
                                                C && D();
                                            }, 300)) :
                                        (D(),
                                            setTimeout(function() {
                                                C || t.addClass(l, "pswp__share-modal--fade-in");
                                            }, 30)),
                                        C || j(), !1
                                    );
                                },
                                I = function(t) {
                                    var n = (t = t || window.event).target || t.srcElement;
                                    return (
                                        e.shout("shareLinkClick", t, n), !(!n.href ||
                                            (!n.hasAttribute("download") &&
                                                (window.open(
                                                        n.href,
                                                        "pswp_share",
                                                        "scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,top=100,left=" +
                                                        (window.screen ?
                                                            Math.round(screen.width / 2 - 275) :
                                                            100)
                                                    ),
                                                    C || A(),
                                                    1))
                                        )
                                    );
                                },
                                j = function() {
                                    for (
                                        var e, t, n, i, o = "", r = 0; r < g.shareButtons.length; r++
                                    )
                                        (e = g.shareButtons[r]),
                                        (t = g.getImageURLForShare(e)),
                                        (n = g.getPageURLForShare(e)),
                                        (i = g.getTextForShare(e)),
                                        (o +=
                                            '<a href="' +
                                            e.url
                                            .replace("{{url}}", encodeURIComponent(n))
                                            .replace("{{image_url}}", encodeURIComponent(t))
                                            .replace("{{raw_image_url}}", t)
                                            .replace("{{text}}", encodeURIComponent(i)) +
                                            '" target="_blank" class="pswp__share--' +
                                            e.id +
                                            '"' +
                                            (e.download ? "download" : "") +
                                            ">" +
                                            e.label +
                                            "</a>"),
                                        g.parseShareButtonOut &&
                                        (o = g.parseShareButtonOut(e, o));
                                    (l.children[0].innerHTML = o), (l.children[0].onclick = I);
                                },
                                O = function(e) {
                                    for (var n = 0; n < g.closeElClasses.length; n++)
                                        if (t.hasClass(e, "pswp__" + g.closeElClasses[n]))
                                            return !0;
                                },
                                L = 0,
                                N = function() {
                                    clearTimeout(w), (L = 0), u && x.setIdle(!1);
                                },
                                M = function(e) {
                                    var t = (e = e || window.event).relatedTarget || e.toElement;
                                    (t && "HTML" !== t.nodeName) ||
                                    (clearTimeout(w),
                                        (w = setTimeout(function() {
                                            x.setIdle(!0);
                                        }, g.timeToIdleOutside)));
                                },
                                P = function(e) {
                                    h !== e && (k(p, "preloader--active", !e), (h = e));
                                },
                                R = function(n) {
                                    var s = n.vGap;
                                    if (!e.likelyTouchDevice ||
                                        g.mouseUsed ||
                                        screen.width > g.fitControlsWidth
                                    ) {
                                        var a = g.barsSize;
                                        if (g.captionEl && "auto" === a.bottom)
                                            if (
                                                (r ||
                                                    ((r = t.createEl(
                                                            "pswp__caption pswp__caption--fake"
                                                        )).appendChild(t.createEl("pswp__caption__center")),
                                                        i.insertBefore(r, o),
                                                        t.addClass(i, "pswp__ui--fit")),
                                                    g.addCaptionHTMLFn(n, r, !0))
                                            ) {
                                                var l = r.clientHeight;
                                                s.bottom = parseInt(l, 10) || 44;
                                            } else s.bottom = a.top;
                                        else s.bottom = "auto" === a.bottom ? 0 : a.bottom;
                                        s.top = a.top;
                                    } else s.top = s.bottom = 0;
                                },
                                z = [{
                                        name: "caption",
                                        option: "captionEl",
                                        onInit: function(e) {
                                            o = e;
                                        },
                                    },
                                    {
                                        name: "share-modal",
                                        option: "shareEl",
                                        onInit: function(e) {
                                            l = e;
                                        },
                                        onTap: function() {
                                            A();
                                        },
                                    },
                                    {
                                        name: "button--share",
                                        option: "shareEl",
                                        onInit: function(e) {
                                            a = e;
                                        },
                                        onTap: function() {
                                            A();
                                        },
                                    },
                                    {
                                        name: "button--zoom",
                                        option: "zoomEl",
                                        onTap: e.toggleDesktopZoom,
                                    },
                                    {
                                        name: "counter",
                                        option: "counterEl",
                                        onInit: function(e) {
                                            s = e;
                                        },
                                    },
                                    { name: "button--close", option: "closeEl", onTap: e.close },
                                    {
                                        name: "button--arrow--left",
                                        option: "arrowEl",
                                        onTap: e.prev,
                                    },
                                    {
                                        name: "button--arrow--right",
                                        option: "arrowEl",
                                        onTap: e.next,
                                    },
                                    {
                                        name: "button--fs",
                                        option: "fullscreenEl",
                                        onTap: function() {
                                            n.isFullscreen() ? n.exit() : n.enter();
                                        },
                                    },
                                    {
                                        name: "preloader",
                                        option: "preloaderEl",
                                        onInit: function(e) {
                                            p = e;
                                        },
                                    },
                                ];
                            (x.init = function() {
                                var s;
                                t.extend(e.options, T, !0),
                                    (g = e.options),
                                    (i = t.getChildByClass(e.scrollWrap, "pswp__ui")),
                                    (d = e.listen)("onVerticalDrag", function(e) {
                                        _ && e < 0.95 ?
                                            x.hideControls() :
                                            !_ && e >= 0.95 && x.showControls();
                                    }),
                                    d("onPinchClose", function(e) {
                                        _ && e < 0.9 ?
                                            (x.hideControls(), (s = !0)) :
                                            s && !_ && e > 0.9 && x.showControls();
                                    }),
                                    d("zoomGestureEnded", function() {
                                        (s = !1) && !_ && x.showControls();
                                    }),
                                    d("beforeChange", x.update),
                                    d("doubleTap", function(t) {
                                        var n = e.currItem.initialZoomLevel;
                                        e.getZoomLevel() !== n ?
                                            e.zoomTo(n, t, 333) :
                                            e.zoomTo(g.getDoubleTapZoom(!1, e.currItem), t, 333);
                                    }),
                                    d("preventDragEvent", function(e, t, n) {
                                        var i = e.target || e.srcElement;
                                        i &&
                                            i.getAttribute("class") &&
                                            e.type.indexOf("mouse") > -1 &&
                                            (i.getAttribute("class").indexOf("__caption") > 0 ||
                                                /(SMALL|STRONG|EM)/i.test(i.tagName)) &&
                                            (n.prevent = !1);
                                    }),
                                    d("bindEvents", function() {
                                        t.bind(i, "pswpTap click", E),
                                            t.bind(e.scrollWrap, "pswpTap", x.onGlobalTap),
                                            e.likelyTouchDevice ||
                                            t.bind(e.scrollWrap, "mouseover", x.onMouseOver);
                                    }),
                                    d("unbindEvents", function() {
                                        C || A(),
                                            y && clearInterval(y),
                                            t.unbind(document, "mouseout", M),
                                            t.unbind(document, "mousemove", N),
                                            t.unbind(i, "pswpTap click", E),
                                            t.unbind(e.scrollWrap, "pswpTap", x.onGlobalTap),
                                            t.unbind(e.scrollWrap, "mouseover", x.onMouseOver),
                                            n &&
                                            (t.unbind(document, n.eventK, x.updateFullscreen),
                                                n.isFullscreen() &&
                                                ((g.hideAnimationDuration = 0), n.exit()),
                                                (n = null));
                                    }),
                                    d("destroy", function() {
                                        g.captionEl &&
                                            (r && i.removeChild(r),
                                                t.removeClass(o, "pswp__caption--empty")),
                                            l && (l.children[0].onclick = null),
                                            t.removeClass(i, "pswp__ui--over-close"),
                                            t.addClass(i, "pswp__ui--hidden"),
                                            x.setIdle(!1);
                                    }),
                                    g.showAnimationDuration ||
                                    t.removeClass(i, "pswp__ui--hidden"),
                                    d("initialZoomIn", function() {
                                        g.showAnimationDuration &&
                                            t.removeClass(i, "pswp__ui--hidden");
                                    }),
                                    d("initialZoomOut", function() {
                                        t.addClass(i, "pswp__ui--hidden");
                                    }),
                                    d("parseVerticalMargin", R),
                                    (function() {
                                        var e,
                                            n,
                                            o,
                                            r = function(i) {
                                                if (i)
                                                    for (var r = i.length, s = 0; s < r; s++) {
                                                        (e = i[s]), (n = e.className);
                                                        for (var a = 0; a < z.length; a++)
                                                            (o = z[a]),
                                                            n.indexOf("pswp__" + o.name) > -1 &&
                                                            (g[o.option] ?
                                                                (t.removeClass(
                                                                        e,
                                                                        "pswp__element--disabled"
                                                                    ),
                                                                    o.onInit && o.onInit(e)) :
                                                                t.addClass(e, "pswp__element--disabled"));
                                                    }
                                            };
                                        r(i.children);
                                        var s = t.getChildByClass(i, "pswp__top-bar");
                                        s && r(s.children);
                                    })(),
                                    g.shareEl && a && l && (C = !0),
                                    S(),
                                    g.timeToIdle &&
                                    d("mouseUsed", function() {
                                        t.bind(document, "mousemove", N),
                                            t.bind(document, "mouseout", M),
                                            (y = setInterval(function() {
                                                2 == ++L && x.setIdle(!0);
                                            }, g.timeToIdle / 2));
                                    }),
                                    g.fullscreenEl &&
                                    !t.features.isOldAndroid &&
                                    (n || (n = x.getFullscreenAPI()),
                                        n ?
                                        (t.bind(document, n.eventK, x.updateFullscreen),
                                            x.updateFullscreen(),
                                            t.addClass(e.template, "pswp--supports-fs")) :
                                        t.removeClass(e.template, "pswp--supports-fs")),
                                    g.preloaderEl &&
                                    (P(!0),
                                        d("beforeChange", function() {
                                            clearTimeout(f),
                                                (f = setTimeout(function() {
                                                    e.currItem && e.currItem.loading ?
                                                        (!e.allowProgressiveImg() ||
                                                            (e.currItem.img &&
                                                                !e.currItem.img.naturalWidth)) &&
                                                        P(!1) :
                                                        P(!0);
                                                }, g.loadingIndicatorDelay));
                                        }),
                                        d("imageLoadComplete", function(t, n) {
                                            e.currItem === n && P(!0);
                                        }));
                            }),
                            (x.setIdle = function(e) {
                                (u = e), k(i, "ui--idle", e);
                            }),
                            (x.update = function() {
                                _ && e.currItem ?
                                    (x.updateIndexIndicator(),
                                        g.captionEl &&
                                        (g.addCaptionHTMLFn(e.currItem, o),
                                            k(o, "caption--empty", !e.currItem.title)),
                                        (b = !0)) :
                                    (b = !1),
                                    C || A(),
                                    S();
                            }),
                            (x.updateFullscreen = function(i) {
                                i &&
                                    setTimeout(function() {
                                        e.setScrollOffset(0, t.getScrollY());
                                    }, 50),
                                    t[(n.isFullscreen() ? "add" : "remove") + "Class"](
                                        e.template,
                                        "pswp--fs"
                                    );
                            }),
                            (x.updateIndexIndicator = function() {
                                g.counterEl &&
                                    (s.innerHTML =
                                        e.getCurrentIndex() +
                                        1 +
                                        g.indexIndicatorSep +
                                        g.getNumItemsFn());
                            }),
                            (x.onGlobalTap = function(n) {
                                var i = (n = n || window.event).target || n.srcElement;
                                if (!v)
                                    if (n.detail && "mouse" === n.detail.pointerType) {
                                        if (O(i)) return void e.close();
                                        t.hasClass(i, "pswp__img") &&
                                            (1 === e.getZoomLevel() &&
                                                e.getZoomLevel() <= e.currItem.fitRatio ?
                                                g.clickToCloseNonZoomable && e.close() :
                                                e.toggleDesktopZoom(n.detail.releasePoint));
                                    } else if (
                                    (g.tapToToggleControls &&
                                        (_ ? x.hideControls() : x.showControls()),
                                        g.tapToClose && (t.hasClass(i, "pswp__img") || O(i)))
                                )
                                    return void e.close();
                            }),
                            (x.onMouseOver = function(e) {
                                var t = (e = e || window.event).target || e.srcElement;
                                k(i, "ui--over-close", O(t));
                            }),
                            (x.hideControls = function() {
                                t.addClass(i, "pswp__ui--hidden"), (_ = !1);
                            }),
                            (x.showControls = function() {
                                (_ = !0),
                                b || x.update(),
                                    t.removeClass(i, "pswp__ui--hidden");
                            }),
                            (x.supportsFullscreen = function() {
                                var e = document;
                                return !!(
                                    e.exitFullscreen ||
                                    e.mozCancelFullScreen ||
                                    e.webkitExitFullscreen ||
                                    e.msExitFullscreen
                                );
                            }),
                            (x.getFullscreenAPI = function() {
                                var t,
                                    n = document.documentElement,
                                    i = "fullscreenchange";
                                return (
                                    n.requestFullscreen ?
                                    (t = {
                                        enterK: "requestFullscreen",
                                        exitK: "exitFullscreen",
                                        elementK: "fullscreenElement",
                                        eventK: i,
                                    }) :
                                    n.mozRequestFullScreen ?
                                    (t = {
                                        enterK: "mozRequestFullScreen",
                                        exitK: "mozCancelFullScreen",
                                        elementK: "mozFullScreenElement",
                                        eventK: "moz" + i,
                                    }) :
                                    n.webkitRequestFullscreen ?
                                    (t = {
                                        enterK: "webkitRequestFullscreen",
                                        exitK: "webkitExitFullscreen",
                                        elementK: "webkitFullscreenElement",
                                        eventK: "webkit" + i,
                                    }) :
                                    n.msRequestFullscreen &&
                                    (t = {
                                        enterK: "msRequestFullscreen",
                                        exitK: "msExitFullscreen",
                                        elementK: "msFullscreenElement",
                                        eventK: "MSFullscreenChange",
                                    }),
                                    t &&
                                    ((t.enter = function() {
                                            if (
                                                ((c = g.closeOnScroll),
                                                    (g.closeOnScroll = !1),
                                                    "webkitRequestFullscreen" !== this.enterK)
                                            )
                                                return e.template[this.enterK]();
                                            e.template[this.enterK](Element.ALLOW_KEYBOARD_INPUT);
                                        }),
                                        (t.exit = function() {
                                            return (g.closeOnScroll = c), document[this.exitK]();
                                        }),
                                        (t.isFullscreen = function() {
                                            return document[this.elementK];
                                        })),
                                    t
                                );
                            });
                        };
                    }) ?
                    i.call(t, n, t, e) :
                    i) || (e.exports = o);
        },
        function(e, t, n) {
            var i, o;
            /*! PhotoSwipe - v4.1.3 - 2019-01-08
             * http://photoswipe.com
             * Copyright (c) 2019 Dmitry Semenov; */
            void 0 ===
                (o =
                    "function" ==
                    typeof(i = function() {
                        "use strict";
                        return function(e, t, n, i) {
                            var o = {
                                features: null,
                                bind: function(e, t, n, i) {
                                    var o = (i ? "remove" : "add") + "EventListener";
                                    t = t.split(" ");
                                    for (var r = 0; r < t.length; r++) t[r] && e[o](t[r], n, !1);
                                },
                                isArray: function(e) {
                                    return e instanceof Array;
                                },
                                createEl: function(e, t) {
                                    var n = document.createElement(t || "div");
                                    return e && (n.className = e), n;
                                },
                                getScrollY: function() {
                                    var e = window.pageYOffset;
                                    return void 0 !== e ? e : document.documentElement.scrollTop;
                                },
                                unbind: function(e, t, n) {
                                    o.bind(e, t, n, !0);
                                },
                                removeClass: function(e, t) {
                                    var n = new RegExp("(\\s|^)" + t + "(\\s|$)");
                                    e.className = e.className
                                        .replace(n, " ")
                                        .replace(/^\s\s*/, "")
                                        .replace(/\s\s*$/, "");
                                },
                                addClass: function(e, t) {
                                    o.hasClass(e, t) ||
                                        (e.className += (e.className ? " " : "") + t);
                                },
                                hasClass: function(e, t) {
                                    return (
                                        e.className &&
                                        new RegExp("(^|\\s)" + t + "(\\s|$)").test(e.className)
                                    );
                                },
                                getChildByClass: function(e, t) {
                                    for (var n = e.firstChild; n;) {
                                        if (o.hasClass(n, t)) return n;
                                        n = n.nextSibling;
                                    }
                                },
                                arraySearch: function(e, t, n) {
                                    for (var i = e.length; i--;)
                                        if (e[i][n] === t) return i;
                                    return -1;
                                },
                                extend: function(e, t, n) {
                                    for (var i in t)
                                        if (t.hasOwnProperty(i)) {
                                            if (n && e.hasOwnProperty(i)) continue;
                                            e[i] = t[i];
                                        }
                                },
                                easing: {
                                    sine: {
                                        out: function(e) {
                                            return Math.sin(e * (Math.PI / 2));
                                        },
                                        inOut: function(e) {
                                            return -(Math.cos(Math.PI * e) - 1) / 2;
                                        },
                                    },
                                    cubic: {
                                        out: function(e) {
                                            return --e * e * e + 1;
                                        },
                                    },
                                },
                                detectFeatures: function() {
                                    if (o.features) return o.features;
                                    var e = o.createEl().style,
                                        t = "",
                                        n = {};
                                    if (
                                        ((n.oldIE = document.all && !document.addEventListener),
                                            (n.touch = "ontouchstart" in window),
                                            window.requestAnimationFrame &&
                                            ((n.raf = window.requestAnimationFrame),
                                                (n.caf = window.cancelAnimationFrame)),
                                            (n.pointerEvent = !!window.PointerEvent || navigator.msPointerEnabled), !n.pointerEvent)
                                    ) {
                                        var i = navigator.userAgent;
                                        if (/iP(hone|od)/.test(navigator.platform)) {
                                            var r = navigator.appVersion.match(
                                                /OS (\d+)_(\d+)_?(\d+)?/
                                            );
                                            r &&
                                                r.length > 0 &&
                                                (r = parseInt(r[1], 10)) >= 1 &&
                                                r < 8 &&
                                                (n.isOldIOSPhone = !0);
                                        }
                                        var s = i.match(/Android\s([0-9\.]*)/),
                                            a = s ? s[1] : 0;
                                        (a = parseFloat(a)) >= 1 &&
                                            (a < 4.4 && (n.isOldAndroid = !0),
                                                (n.androidVersion = a)),
                                            (n.isMobileOpera = /opera mini|opera mobi/i.test(i));
                                    }
                                    for (
                                        var l,
                                            c,
                                            u = ["transform", "perspective", "animationName"],
                                            d = ["", "webkit", "Moz", "ms", "O"],
                                            p = 0; p < 4; p++
                                    ) {
                                        t = d[p];
                                        for (var h = 0; h < 3; h++)
                                            (l = u[h]),
                                            (c =
                                                t + (t ? l.charAt(0).toUpperCase() + l.slice(1) : l)), !n[l] && c in e && (n[l] = c);
                                        t &&
                                            !n.raf &&
                                            ((t = t.toLowerCase()),
                                                (n.raf = window[t + "RequestAnimationFrame"]),
                                                n.raf &&
                                                (n.caf =
                                                    window[t + "CancelAnimationFrame"] ||
                                                    window[t + "CancelRequestAnimationFrame"]));
                                    }
                                    if (!n.raf) {
                                        var f = 0;
                                        (n.raf = function(e) {
                                            var t = new Date().getTime(),
                                                n = Math.max(0, 16 - (t - f)),
                                                i = window.setTimeout(function() {
                                                    e(t + n);
                                                }, n);
                                            return (f = t + n), i;
                                        }),
                                        (n.caf = function(e) {
                                            clearTimeout(e);
                                        });
                                    }
                                    return (
                                        (n.svg = !!document.createElementNS &&
                                            !!document.createElementNS(
                                              
                                            ).createSVGRect),
                                        (o.features = n),
                                        n
                                    );
                                },
                            };
                            o.detectFeatures(),
                                o.features.oldIE &&
                                (o.bind = function(e, t, n, i) {
                                    t = t.split(" ");
                                    for (
                                        var o,
                                            r = (i ? "detach" : "attach") + "Event",
                                            s = function() {
                                                n.handleEvent.call(n);
                                            },
                                            a = 0; a < t.length; a++
                                    )
                                        if ((o = t[a]))
                                            if ("object" == typeof n && n.handleEvent) {
                                                if (i) {
                                                    if (!n["oldIE" + o]) return !1;
                                                } else n["oldIE" + o] = s;
                                                e[r]("on" + o, n["oldIE" + o]);
                                            } else e[r]("on" + o, n);
                                });
                            var r = this,
                                s = {
                                    allowPanToNext: !0,
                                    spacing: 0.12,
                                    bgOpacity: 1,
                                    mouseUsed: !1,
                                    loop: !0,
                                    pinchToClose: !0,
                                    closeOnScroll: !0,
                                    closeOnVerticalDrag: !0,
                                    verticalDragRange: 0.75,
                                    hideAnimationDuration: 333,
                                    showAnimationDuration: 333,
                                    showHideOpacity: !1,
                                    focus: !0,
                                    escKey: !0,
                                    arrowKeys: !0,
                                    mainScrollEndFriction: 0.35,
                                    panEndFriction: 0.35,
                                    isClickableElement: function(e) {
                                        return "A" === e.tagName;
                                    },
                                    getDoubleTapZoom: function(e, t) {
                                        return e ? 1 : t.initialZoomLevel < 0.7 ? 1 : 1.33;
                                    },
                                    maxSpreadZoom: 1.33,
                                    modal: !0,
                                    scaleMode: "fit",
                                };
                            o.extend(s, i);
                            var a,
                                l,
                                c,
                                u,
                                d,
                                p,
                                h,
                                f,
                                m,
                                g,
                                v,
                                y,
                                w,
                                x,
                                b,
                                _,
                                C,
                                T,
                                E,
                                k,
                                S,
                                D,
                                A,
                                I,
                                j,
                                O,
                                L,
                                N,
                                M,
                                P,
                                R,
                                z,
                                $,
                                F,
                                q,
                                H,
                                W,
                                B,
                                Z,
                                U,
                                V,
                                X,
                                K,
                                Y,
                                G,
                                J,
                                Q,
                                ee,
                                te,
                                ne,
                                ie,
                                oe,
                                re,
                                se,
                                ae,
                                le,
                                ce = { x: 0, y: 0 },
                                ue = { x: 0, y: 0 },
                                de = { x: 0, y: 0 },
                                pe = {},
                                he = 0,
                                fe = {},
                                me = { x: 0, y: 0 },
                                ge = 0,
                                ve = !0,
                                ye = [],
                                we = {},
                                xe = !1,
                                be = function(e, t) {
                                    o.extend(r, t.publicMethods), ye.push(e);
                                },
                                _e = function(e) {
                                    var t = qt();
                                    return e > t - 1 ? e - t : e < 0 ? t + e : e;
                                },
                                Ce = {},
                                Te = function(e, t) {
                                    return Ce[e] || (Ce[e] = []), Ce[e].push(t);
                                },
                                Ee = function(e) {
                                    var t = Ce[e];
                                    if (t) {
                                        var n = Array.prototype.slice.call(arguments);
                                        n.shift();
                                        for (var i = 0; i < t.length; i++) t[i].apply(r, n);
                                    }
                                },
                                ke = function() {
                                    return new Date().getTime();
                                },
                                Se = function(e) {
                                    (se = e), (r.bg.style.opacity = e * s.bgOpacity);
                                },
                                De = function(e, t, n, i, o) {
                                    (!xe || (o && o !== r.currItem)) &&
                                    (i /= o ? o.fitRatio : r.currItem.fitRatio),
                                    (e[D] =
                                        y + t + "px, " + n + "px" + w + " scale(" + i + ")");
                                },
                                Ae = function(e) {
                                    te &&
                                        (e &&
                                            (g > r.currItem.fitRatio ?
                                                xe || (Yt(r.currItem, !1, !0), (xe = !0)) :
                                                xe && (Yt(r.currItem), (xe = !1))),
                                            De(te, de.x, de.y, g));
                                },
                                Ie = function(e) {
                                    e.container &&
                                        De(
                                            e.container.style,
                                            e.initialPosition.x,
                                            e.initialPosition.y,
                                            e.initialZoomLevel,
                                            e
                                        );
                                },
                                je = function(e, t) {
                                    t[D] = y + e + "px, 0px" + w;
                                },
                                Oe = function(e, t) {
                                    if (!s.loop && t) {
                                        var n = u + (me.x * he - e) / me.x,
                                            i = Math.round(e - ut.x);
                                        ((n < 0 && i > 0) || (n >= qt() - 1 && i < 0)) &&
                                        (e = ut.x + i * s.mainScrollEndFriction);
                                    }
                                    (ut.x = e), je(e, d);
                                },
                                Le = function(e, t) {
                                    var n = dt[e] - fe[e];
                                    return ue[e] + ce[e] + n - n * (t / v);
                                },
                                Ne = function(e, t) {
                                    (e.x = t.x), (e.y = t.y), t.id && (e.id = t.id);
                                },
                                Me = function(e) {
                                    (e.x = Math.round(e.x)), (e.y = Math.round(e.y));
                                },
                                Pe = null,
                                Re = function() {
                                    Pe &&
                                        (o.unbind(document, "mousemove", Re),
                                            o.addClass(e, "pswp--has_mouse"),
                                            (s.mouseUsed = !0),
                                            Ee("mouseUsed")),
                                        (Pe = setTimeout(function() {
                                            Pe = null;
                                        }, 100));
                                },
                                ze = function(e, t) {
                                    var n = Ut(r.currItem, pe, e);
                                    return t && (ee = n), n;
                                },
                                $e = function(e) {
                                    return e || (e = r.currItem), e.initialZoomLevel;
                                },
                                Fe = function(e) {
                                    return e || (e = r.currItem), e.w > 0 ? s.maxSpreadZoom : 1;
                                },
                                qe = function(e, t, n, i) {
                                    return i === r.currItem.initialZoomLevel ?
                                        ((n[e] = r.currItem.initialPosition[e]), !0) :
                                        ((n[e] = Le(e, i)),
                                            n[e] > t.min[e] ?
                                            ((n[e] = t.min[e]), !0) :
                                            n[e] < t.max[e] && ((n[e] = t.max[e]), !0));
                                },
                                He = function(e) {
                                    var t = "";
                                    s.escKey && 27 === e.keyCode ?
                                        (t = "close") :
                                        s.arrowKeys &&
                                        (37 === e.keyCode ?
                                            (t = "prev") :
                                            39 === e.keyCode && (t = "next")),
                                        t &&
                                        (e.ctrlKey ||
                                            e.altKey ||
                                            e.shiftKey ||
                                            e.metaKey ||
                                            (e.preventDefault ?
                                                e.preventDefault() :
                                                (e.returnValue = !1),
                                                r[t]()));
                                },
                                We = function(e) {
                                    e &&
                                        (X || V || ne || W) &&
                                        (e.preventDefault(), e.stopPropagation());
                                },
                                Be = function() {
                                    r.setScrollOffset(0, o.getScrollY());
                                },
                                Ze = {},
                                Ue = 0,
                                Ve = function(e) {
                                    Ze[e] && (Ze[e].raf && O(Ze[e].raf), Ue--, delete Ze[e]);
                                },
                                Xe = function(e) {
                                    Ze[e] && Ve(e), Ze[e] || (Ue++, (Ze[e] = {}));
                                },
                                Ke = function() {
                                    for (var e in Ze) Ze.hasOwnProperty(e) && Ve(e);
                                },
                                Ye = function(e, t, n, i, o, r, s) {
                                    var a,
                                        l = ke();
                                    Xe(e);
                                    var c = function() {
                                        if (Ze[e]) {
                                            if ((a = ke() - l) >= i)
                                                return Ve(e), r(n), void(s && s());
                                            r((n - t) * o(a / i) + t), (Ze[e].raf = j(c));
                                        }
                                    };
                                    c();
                                },
                                Ge = {
                                    shout: Ee,
                                    listen: Te,
                                    viewportSize: pe,
                                    options: s,
                                    isMainScrollAnimating: function() {
                                        return ne;
                                    },
                                    getZoomLevel: function() {
                                        return g;
                                    },
                                    getCurrentIndex: function() {
                                        return u;
                                    },
                                    isDragging: function() {
                                        return Z;
                                    },
                                    isZooming: function() {
                                        return J;
                                    },
                                    setScrollOffset: function(e, t) {
                                        (fe.x = e), (P = fe.y = t), Ee("updateScrollOffset", fe);
                                    },
                                    applyZoomPan: function(e, t, n, i) {
                                        (de.x = t), (de.y = n), (g = e), Ae(i);
                                    },
                                    init: function() {
                                        if (!a && !l) {
                                            var n;
                                            (r.framework = o),
                                            (r.template = e),
                                            (r.bg = o.getChildByClass(e, "pswp__bg")),
                                            (L = e.className),
                                            (a = !0),
                                            (R = o.detectFeatures()),
                                            (j = R.raf),
                                            (O = R.caf),
                                            (D = R.transform),
                                            (M = R.oldIE),
                                            (r.scrollWrap = o.getChildByClass(
                                                e,
                                                "pswp__scroll-wrap"
                                            )),
                                            (r.container = o.getChildByClass(
                                                r.scrollWrap,
                                                "pswp__container"
                                            )),
                                            (d = r.container.style),
                                            (r.itemHolders = _ = [
                                                { el: r.container.children[0], wrap: 0, index: -1 },
                                                { el: r.container.children[1], wrap: 0, index: -1 },
                                                { el: r.container.children[2], wrap: 0, index: -1 },
                                            ]),
                                            (_[0].el.style.display = _[2].el.style.display =
                                                "none"),
                                            (function() {
                                                if (D) {
                                                    var t = R.perspective && !I;
                                                    return (
                                                        (y = "translate" + (t ? "3d(" : "(")),
                                                        void(w = R.perspective ? ", 0px)" : ")")
                                                    );
                                                }
                                                (D = "left"),
                                                o.addClass(e, "pswp--ie"),
                                                    (je = function(e, t) {
                                                        t.left = e + "px";
                                                    }),
                                                    (Ie = function(e) {
                                                        var t = e.fitRatio > 1 ? 1 : e.fitRatio,
                                                            n = e.container.style,
                                                            i = t * e.w,
                                                            o = t * e.h;
                                                        (n.width = i + "px"),
                                                        (n.height = o + "px"),
                                                        (n.left = e.initialPosition.x + "px"),
                                                        (n.top = e.initialPosition.y + "px");
                                                    }),
                                                    (Ae = function() {
                                                        if (te) {
                                                            var e = te,
                                                                t = r.currItem,
                                                                n = t.fitRatio > 1 ? 1 : t.fitRatio,
                                                                i = n * t.w,
                                                                o = n * t.h;
                                                            (e.width = i + "px"),
                                                            (e.height = o + "px"),
                                                            (e.left = de.x + "px"),
                                                            (e.top = de.y + "px");
                                                        }
                                                    });
                                            })(),
                                            (m = {
                                                resize: r.updateSize,
                                                orientationchange: function() {
                                                    clearTimeout(z),
                                                        (z = setTimeout(function() {
                                                            pe.x !== r.scrollWrap.clientWidth &&
                                                                r.updateSize();
                                                        }, 500));
                                                },
                                                scroll: Be,
                                                keydown: He,
                                                click: We,
                                            });
                                            var i =
                                                R.isOldIOSPhone || R.isOldAndroid || R.isMobileOpera;
                                            for (
                                                (R.animationName && R.transform && !i) ||
                                                (s.showAnimationDuration = s.hideAnimationDuration =
                                                    0),
                                                n = 0; n < ye.length; n++
                                            )
                                                r["init" + ye[n]]();
                                            t && (r.ui = new t(r, o)).init(),
                                                Ee("firstUpdate"),
                                                (u = u || s.index || 0),
                                                (isNaN(u) || u < 0 || u >= qt()) && (u = 0),
                                                (r.currItem = Ft(u)),
                                                (R.isOldIOSPhone || R.isOldAndroid) && (ve = !1),
                                                e.setAttribute("aria-hidden", "false"),
                                                s.modal &&
                                                (ve ?
                                                    (e.style.position = "fixed") :
                                                    ((e.style.position = "absolute"),
                                                        (e.style.top = o.getScrollY() + "px"))),
                                                void 0 === P &&
                                                (Ee("initialLayout"), (P = N = o.getScrollY()));
                                            var c = "pswp--open ";
                                            for (
                                                s.mainClass && (c += s.mainClass + " "),
                                                s.showHideOpacity && (c += "pswp--animate_opacity "),
                                                c += I ? "pswp--touch" : "pswp--notouch",
                                                c += R.animationName ? " pswp--css_animation" : "",
                                                c += R.svg ? " pswp--svg" : "",
                                                o.addClass(e, c),
                                                r.updateSize(),
                                                p = -1,
                                                ge = null,
                                                n = 0; n < 3; n++
                                            )
                                                je((n + p) * me.x, _[n].el.style);
                                            M || o.bind(r.scrollWrap, f, r),
                                                Te("initialZoomInEnd", function() {
                                                    r.setContent(_[0], u - 1),
                                                        r.setContent(_[2], u + 1),
                                                        (_[0].el.style.display = _[2].el.style.display =
                                                            "block"),
                                                        s.focus && e.focus(),
                                                        o.bind(document, "keydown", r),
                                                        R.transform && o.bind(r.scrollWrap, "click", r),
                                                        s.mouseUsed || o.bind(document, "mousemove", Re),
                                                        o.bind(
                                                            window,
                                                            "resize scroll orientationchange",
                                                            r
                                                        ),
                                                        Ee("bindEvents");
                                                }),
                                                r.setContent(_[1], u),
                                                r.updateCurrItem(),
                                                Ee("afterInit"),
                                                ve ||
                                                (x = setInterval(function() {
                                                    Ue ||
                                                        Z ||
                                                        J ||
                                                        g !== r.currItem.initialZoomLevel ||
                                                        r.updateSize();
                                                }, 1e3)),
                                                o.addClass(e, "pswp--visible");
                                        }
                                    },
                                    close: function() {
                                        a &&
                                            ((a = !1),
                                                (l = !0),
                                                Ee("close"),
                                                o.unbind(window, "resize scroll orientationchange", r),
                                                o.unbind(window, "scroll", m.scroll),
                                                o.unbind(document, "keydown", r),
                                                o.unbind(document, "mousemove", Re),
                                                R.transform && o.unbind(r.scrollWrap, "click", r),
                                                Z && o.unbind(window, h, r),
                                                clearTimeout(z),
                                                Ee("unbindEvents"),
                                                Ht(r.currItem, null, !0, r.destroy));
                                    },
                                    destroy: function() {
                                        Ee("destroy"),
                                            Pt && clearTimeout(Pt),
                                            e.setAttribute("aria-hidden", "true"),
                                            (e.className = L),
                                            x && clearInterval(x),
                                            o.unbind(r.scrollWrap, f, r),
                                            o.unbind(window, "scroll", r),
                                            ft(),
                                            Ke(),
                                            (Ce = null);
                                    },
                                    panTo: function(e, t, n) {
                                        n ||
                                            (e > ee.min.x ?
                                                (e = ee.min.x) :
                                                e < ee.max.x && (e = ee.max.x),
                                                t > ee.min.y ?
                                                (t = ee.min.y) :
                                                t < ee.max.y && (t = ee.max.y)),
                                            (de.x = e),
                                            (de.y = t),
                                            Ae();
                                    },
                                    handleEvent: function(e) {
                                        (e = e || window.event), m[e.type] && m[e.type](e);
                                    },
                                    goTo: function(e) {
                                        var t = (e = _e(e)) - u;
                                        (ge = t),
                                        (u = e),
                                        (r.currItem = Ft(u)),
                                        (he -= t),
                                        Oe(me.x * he),
                                            Ke(),
                                            (ne = !1),
                                            r.updateCurrItem();
                                    },
                                    next: function() {
                                        r.goTo(u + 1);
                                    },
                                    prev: function() {
                                        r.goTo(u - 1);
                                    },
                                    updateCurrZoomItem: function(e) {
                                        if ((e && Ee("beforeChange", 0), _[1].el.children.length)) {
                                            var t = _[1].el.children[0];
                                            te = o.hasClass(t, "pswp__zoom-wrap") ? t.style : null;
                                        } else te = null;
                                        (ee = r.currItem.bounds),
                                        (v = g = r.currItem.initialZoomLevel),
                                        (de.x = ee.center.x),
                                        (de.y = ee.center.y),
                                        e && Ee("afterChange");
                                    },
                                    invalidateCurrItems: function() {
                                        b = !0;
                                        for (var e = 0; e < 3; e++)
                                            _[e].item && (_[e].item.needsUpdate = !0);
                                    },
                                    updateCurrItem: function(e) {
                                        if (0 !== ge) {
                                            var t,
                                                n = Math.abs(ge);
                                            if (!(e && n < 2)) {
                                                (r.currItem = Ft(u)),
                                                (xe = !1),
                                                Ee("beforeChange", ge),
                                                    n >= 3 && ((p += ge + (ge > 0 ? -3 : 3)), (n = 3));
                                                for (var i = 0; i < n; i++)
                                                    ge > 0 ?
                                                    ((t = _.shift()),
                                                        (_[2] = t),
                                                        je((++p + 2) * me.x, t.el.style),
                                                        r.setContent(t, u - n + i + 1 + 1)) :
                                                    ((t = _.pop()),
                                                        _.unshift(t),
                                                        je(--p * me.x, t.el.style),
                                                        r.setContent(t, u + n - i - 1 - 1));
                                                if (te && 1 === Math.abs(ge)) {
                                                    var o = Ft(C);
                                                    o.initialZoomLevel !== g && (Ut(o, pe), Yt(o), Ie(o));
                                                }
                                                (ge = 0),
                                                r.updateCurrZoomItem(),
                                                    (C = u),
                                                    Ee("afterChange");
                                            }
                                        }
                                    },
                                    updateSize: function(t) {
                                        if (!ve && s.modal) {
                                            var n = o.getScrollY();
                                            if (
                                                (P !== n && ((e.style.top = n + "px"), (P = n)), !t &&
                                                    we.x === window.innerWidth &&
                                                    we.y === window.innerHeight)
                                            )
                                                return;
                                            (we.x = window.innerWidth),
                                            (we.y = window.innerHeight),
                                            (e.style.height = we.y + "px");
                                        }
                                        if (
                                            ((pe.x = r.scrollWrap.clientWidth),
                                                (pe.y = r.scrollWrap.clientHeight),
                                                Be(),
                                                (me.x = pe.x + Math.round(pe.x * s.spacing)),
                                                (me.y = pe.y),
                                                Oe(me.x * he),
                                                Ee("beforeResize"),
                                                void 0 !== p)
                                        ) {
                                            for (var i, a, l, c = 0; c < 3; c++)
                                                (i = _[c]),
                                                je((c + p) * me.x, i.el.style),
                                                (l = u + c - 1),
                                                s.loop && qt() > 2 && (l = _e(l)),
                                                (a = Ft(l)) && (b || a.needsUpdate || !a.bounds) ?
                                                (r.cleanSlide(a),
                                                    r.setContent(i, l),
                                                    1 === c &&
                                                    ((r.currItem = a), r.updateCurrZoomItem(!0)),
                                                    (a.needsUpdate = !1)) :
                                                -1 === i.index && l >= 0 && r.setContent(i, l),
                                                a && a.container && (Ut(a, pe), Yt(a), Ie(a));
                                            b = !1;
                                        }
                                        (v = g = r.currItem.initialZoomLevel),
                                        (ee = r.currItem.bounds) &&
                                        ((de.x = ee.center.x), (de.y = ee.center.y), Ae(!0)),
                                        Ee("resize");
                                    },
                                    zoomTo: function(e, t, n, i, r) {
                                        t &&
                                            ((v = g),
                                                (dt.x = Math.abs(t.x) - de.x),
                                                (dt.y = Math.abs(t.y) - de.y),
                                                Ne(ue, de));
                                        var s = ze(e, !1),
                                            a = {};
                                        qe("x", s, a, e), qe("y", s, a, e);
                                        var l = g,
                                            c = de.x,
                                            u = de.y;
                                        Me(a);
                                        var d = function(t) {
                                            1 === t ?
                                                ((g = e), (de.x = a.x), (de.y = a.y)) :
                                                ((g = (e - l) * t + l),
                                                    (de.x = (a.x - c) * t + c),
                                                    (de.y = (a.y - u) * t + u)),
                                                r && r(t),
                                                Ae(1 === t);
                                        };
                                        n
                                            ?
                                            Ye("customZoomTo", 0, 1, n, i || o.easing.sine.inOut, d) :
                                            d(1);
                                    },
                                },
                                Je = {},
                                Qe = {},
                                et = {},
                                tt = {},
                                nt = {},
                                it = [],
                                ot = {},
                                rt = [],
                                st = {},
                                at = 0,
                                lt = { x: 0, y: 0 },
                                ct = 0,
                                ut = { x: 0, y: 0 },
                                dt = { x: 0, y: 0 },
                                pt = { x: 0, y: 0 },
                                ht = function(e, t) {
                                    return (
                                        (st.x = Math.abs(e.x - t.x)),
                                        (st.y = Math.abs(e.y - t.y)),
                                        Math.sqrt(st.x * st.x + st.y * st.y)
                                    );
                                },
                                ft = function() {
                                    K && (O(K), (K = null));
                                },
                                mt = function() {
                                    Z && ((K = j(mt)), At());
                                },
                                gt = function(e, t) {
                                    return (!(!e || e === document) &&
                                        !(
                                            e.getAttribute("class") &&
                                            e.getAttribute("class").indexOf("pswp__scroll-wrap") > -1
                                        ) &&
                                        (t(e) ? e : gt(e.parentNode, t))
                                    );
                                },
                                vt = {},
                                yt = function(e, t) {
                                    return (
                                        (vt.prevent = !gt(e.target, s.isClickableElement)),
                                        Ee("preventDragEvent", e, t, vt),
                                        vt.prevent
                                    );
                                },
                                wt = function(e, t) {
                                    return (
                                        (t.x = e.pageX), (t.y = e.pageY), (t.id = e.identifier), t
                                    );
                                },
                                xt = function(e, t, n) {
                                    (n.x = 0.5 * (e.x + t.x)), (n.y = 0.5 * (e.y + t.y));
                                },
                                bt = function() {
                                    var e = de.y - r.currItem.initialPosition.y;
                                    return 1 - Math.abs(e / (pe.y / 2));
                                },
                                _t = {},
                                Ct = {},
                                Tt = [],
                                Et = function(e) {
                                    for (; Tt.length > 0;) Tt.pop();
                                    return (
                                        A ?
                                        ((le = 0),
                                            it.forEach(function(e) {
                                                0 === le ? (Tt[0] = e) : 1 === le && (Tt[1] = e),
                                                    le++;
                                            })) :
                                        e.type.indexOf("touch") > -1 ?
                                        e.touches &&
                                        e.touches.length > 0 &&
                                        ((Tt[0] = wt(e.touches[0], _t)),
                                            e.touches.length > 1 && (Tt[1] = wt(e.touches[1], Ct))) :
                                        ((_t.x = e.pageX),
                                            (_t.y = e.pageY),
                                            (_t.id = ""),
                                            (Tt[0] = _t)),
                                        Tt
                                    );
                                },
                                kt = function(e, t) {
                                    var n,
                                        i,
                                        o,
                                        a,
                                        l = de[e] + t[e],
                                        c = t[e] > 0,
                                        u = ut.x + t.x,
                                        d = ut.x - ot.x;
                                    if (
                                        ((n =
                                                l > ee.min[e] || l < ee.max[e] ? s.panEndFriction : 1),
                                            (l = de[e] + t[e] * n),
                                            (s.allowPanToNext || g === r.currItem.initialZoomLevel) &&
                                            (te ?
                                                "h" !== ie ||
                                                "x" !== e ||
                                                V ||
                                                (c ?
                                                    (l > ee.min[e] &&
                                                        ((n = s.panEndFriction),
                                                            ee.min[e],
                                                            (i = ee.min[e] - ue[e])),
                                                        (i <= 0 || d < 0) && qt() > 1 ?
                                                        ((a = u), d < 0 && u > ot.x && (a = ot.x)) :
                                                        ee.min.x !== ee.max.x && (o = l)) :
                                                    (l < ee.max[e] &&
                                                        ((n = s.panEndFriction),
                                                            ee.max[e],
                                                            (i = ue[e] - ee.max[e])),
                                                        (i <= 0 || d > 0) && qt() > 1 ?
                                                        ((a = u), d > 0 && u < ot.x && (a = ot.x)) :
                                                        ee.min.x !== ee.max.x && (o = l))) :
                                                (a = u),
                                                "x" === e))
                                    )
                                        return (
                                            void 0 !== a && (Oe(a, !0), (Y = a !== ot.x)),
                                            ee.min.x !== ee.max.x &&
                                            (void 0 !== o ? (de.x = o) : Y || (de.x += t.x * n)),
                                            void 0 !== a
                                        );
                                    ne || Y || (g > r.currItem.fitRatio && (de[e] += t[e] * n));
                                },
                                St = function(e) {
                                    if (!("mousedown" === e.type && e.button > 0))
                                        if ($t) e.preventDefault();
                                        else if (!B || "mousedown" !== e.type) {
                                        if (
                                            (yt(e, !0) && e.preventDefault(), Ee("pointerDown"), A)
                                        ) {
                                            var t = o.arraySearch(it, e.pointerId, "id");
                                            t < 0 && (t = it.length),
                                                (it[t] = { x: e.pageX, y: e.pageY, id: e.pointerId });
                                        }
                                        var n = Et(e),
                                            i = n.length;
                                        (G = null),
                                        Ke(),
                                            (Z && 1 !== i) ||
                                            ((Z = oe = !0),
                                                o.bind(window, h, r),
                                                (H = ae = re = W = Y = X = U = V = !1),
                                                (ie = null),
                                                Ee("firstTouchStart", n),
                                                Ne(ue, de),
                                                (ce.x = ce.y = 0),
                                                Ne(tt, n[0]),
                                                Ne(nt, tt),
                                                (ot.x = me.x * he),
                                                (rt = [{ x: tt.x, y: tt.y }]),
                                                (F = $ = ke()),
                                                ze(g, !0),
                                                ft(),
                                                mt()), !J &&
                                            i > 1 &&
                                            !ne &&
                                            !Y &&
                                            ((v = g),
                                                (V = !1),
                                                (J = U = !0),
                                                (ce.y = ce.x = 0),
                                                Ne(ue, de),
                                                Ne(Je, n[0]),
                                                Ne(Qe, n[1]),
                                                xt(Je, Qe, pt),
                                                (dt.x = Math.abs(pt.x) - de.x),
                                                (dt.y = Math.abs(pt.y) - de.y),
                                                (Q = ht(Je, Qe)));
                                    }
                                },
                                Dt = function(e) {
                                    if ((e.preventDefault(), A)) {
                                        var t = o.arraySearch(it, e.pointerId, "id");
                                        if (t > -1) {
                                            var n = it[t];
                                            (n.x = e.pageX), (n.y = e.pageY);
                                        }
                                    }
                                    if (Z) {
                                        var i = Et(e);
                                        if (ie || X || J) G = i;
                                        else if (ut.x !== me.x * he) ie = "h";
                                        else {
                                            var r = Math.abs(i[0].x - tt.x) - Math.abs(i[0].y - tt.y);
                                            Math.abs(r) >= 10 && ((ie = r > 0 ? "h" : "v"), (G = i));
                                        }
                                    }
                                },
                                At = function() {
                                    if (G) {
                                        var e = G.length;
                                        if (0 !== e)
                                            if (
                                                (Ne(Je, G[0]),
                                                    (et.x = Je.x - tt.x),
                                                    (et.y = Je.y - tt.y),
                                                    J && e > 1)
                                            ) {
                                                if (
                                                    ((tt.x = Je.x),
                                                        (tt.y = Je.y), !et.x &&
                                                        !et.y &&
                                                        (function(e, t) {
                                                            return e.x === t.x && e.y === t.y;
                                                        })(G[1], Qe))
                                                )
                                                    return;
                                                Ne(Qe, G[1]), V || ((V = !0), Ee("zoomGestureStarted"));
                                                var t = ht(Je, Qe),
                                                    n = Nt(t);
                                                n >
                                                    r.currItem.initialZoomLevel +
                                                    r.currItem.initialZoomLevel / 15 && (ae = !0);
                                                var i = 1,
                                                    o = $e(),
                                                    a = Fe();
                                                if (n < o)
                                                    if (
                                                        s.pinchToClose &&
                                                        !ae &&
                                                        v <= r.currItem.initialZoomLevel
                                                    ) {
                                                        var l = 1 - (o - n) / (o / 1.2);
                                                        Se(l), Ee("onPinchClose", l), (re = !0);
                                                    } else
                                                        (i = (o - n) / o) > 1 && (i = 1),
                                                        (n = o - i * (o / 3));
                                                else
                                                    n > a &&
                                                    ((i = (n - a) / (6 * o)) > 1 && (i = 1),
                                                        (n = a + i * o));
                                                i < 0 && (i = 0),
                                                    xt(Je, Qe, lt),
                                                    (ce.x += lt.x - pt.x),
                                                    (ce.y += lt.y - pt.y),
                                                    Ne(pt, lt),
                                                    (de.x = Le("x", n)),
                                                    (de.y = Le("y", n)),
                                                    (H = n > g),
                                                    (g = n),
                                                    Ae();
                                            } else {
                                                if (!ie) return;
                                                if (
                                                    (oe &&
                                                        ((oe = !1),
                                                            Math.abs(et.x) >= 10 && (et.x -= G[0].x - nt.x),
                                                            Math.abs(et.y) >= 10 && (et.y -= G[0].y - nt.y)),
                                                        (tt.x = Je.x),
                                                        (tt.y = Je.y),
                                                        0 === et.x && 0 === et.y)
                                                )
                                                    return;
                                                if (
                                                    "v" === ie &&
                                                    s.closeOnVerticalDrag &&
                                                    "fit" === s.scaleMode &&
                                                    g === r.currItem.initialZoomLevel
                                                ) {
                                                    (ce.y += et.y), (de.y += et.y);
                                                    var c = bt();
                                                    return (
                                                        (W = !0), Ee("onVerticalDrag", c), Se(c), void Ae()
                                                    );
                                                }!(function(e, t, n) {
                                                    if (e - F > 50) {
                                                        var i = rt.length > 2 ? rt.shift() : {};
                                                        (i.x = t), (i.y = n), rt.push(i), (F = e);
                                                    }
                                                })(ke(), Je.x, Je.y),
                                                (X = !0),
                                                (ee = r.currItem.bounds),
                                                kt("x", et) || (kt("y", et), Me(de), Ae());
                                            }
                                    }
                                },
                                It = function(e) {
                                    if (R.isOldAndroid) {
                                        if (B && "mouseup" === e.type) return;
                                        e.type.indexOf("touch") > -1 &&
                                            (clearTimeout(B),
                                                (B = setTimeout(function() {
                                                    B = 0;
                                                }, 600)));
                                    }
                                    var t;
                                    if ((Ee("pointerUp"), yt(e, !1) && e.preventDefault(), A)) {
                                        var n = o.arraySearch(it, e.pointerId, "id");
                                        n > -1 &&
                                            ((t = it.splice(n, 1)[0]),
                                                navigator.msPointerEnabled ?
                                                ((t.type = { 4: "mouse", 2: "touch", 3: "pen" }[
                                                        e.pointerType
                                                    ]),
                                                    t.type || (t.type = e.pointerType || "mouse")) :
                                                (t.type = e.pointerType || "mouse"));
                                    }
                                    var i,
                                        a = Et(e),
                                        l = a.length;
                                    if (("mouseup" === e.type && (l = 0), 2 === l))
                                        return (G = null), !0;
                                    1 === l && Ne(nt, a[0]),
                                        0 !== l ||
                                        ie ||
                                        ne ||
                                        (t ||
                                            ("mouseup" === e.type ?
                                                (t = { x: e.pageX, y: e.pageY, type: "mouse" }) :
                                                e.changedTouches &&
                                                e.changedTouches[0] &&
                                                (t = {
                                                    x: e.changedTouches[0].pageX,
                                                    y: e.changedTouches[0].pageY,
                                                    type: "touch",
                                                })),
                                            Ee("touchRelease", e, t));
                                    var c = -1;
                                    if (
                                        (0 === l &&
                                            ((Z = !1),
                                                o.unbind(window, h, r),
                                                ft(),
                                                J ? (c = 0) : -1 !== ct && (c = ke() - ct)),
                                            (ct = 1 === l ? ke() : -1),
                                            (i = -1 !== c && c < 150 ? "zoom" : "swipe"),
                                            J &&
                                            l < 2 &&
                                            ((J = !1),
                                                1 === l && (i = "zoomPointerUp"),
                                                Ee("zoomGestureEnded")),
                                            (G = null),
                                            X || V || ne || W)
                                    )
                                        if ((Ke(), q || (q = jt()), q.calculateSwipeSpeed("x"), W))
                                            if (bt() < s.verticalDragRange) r.close();
                                            else {
                                                var u = de.y,
                                                    d = se;
                                                Ye(
                                                        "verticalDrag",
                                                        0,
                                                        1,
                                                        300,
                                                        o.easing.cubic.out,
                                                        function(e) {
                                                            (de.y = (r.currItem.initialPosition.y - u) * e + u),
                                                            Se((1 - d) * e + d),
                                                                Ae();
                                                        }
                                                    ),
                                                    Ee("onVerticalDrag", 1);
                                            }
                                    else {
                                        if ((Y || ne) && 0 === l) {
                                            if (Lt(i, q)) return;
                                            i = "zoomPointerUp";
                                        }
                                        ne ||
                                            ("swipe" === i ?
                                                !Y && g > r.currItem.fitRatio && Ot(q) :
                                                Mt());
                                    }
                                },
                                jt = function() {
                                    var e,
                                        t,
                                        n = {
                                            lastFlickOffset: {},
                                            lastFlickDist: {},
                                            lastFlickSpeed: {},
                                            slowDownRatio: {},
                                            slowDownRatioReverse: {},
                                            speedDecelerationRatio: {},
                                            speedDecelerationRatioAbs: {},
                                            distanceOffset: {},
                                            backAnimDestination: {},
                                            backAnimStarted: {},
                                            calculateSwipeSpeed: function(i) {
                                                rt.length > 1 ?
                                                    ((e = ke() - F + 50), (t = rt[rt.length - 2][i])) :
                                                    ((e = ke() - $), (t = nt[i])),
                                                    (n.lastFlickOffset[i] = tt[i] - t),
                                                    (n.lastFlickDist[i] = Math.abs(n.lastFlickOffset[i])),
                                                    n.lastFlickDist[i] > 20 ?
                                                    (n.lastFlickSpeed[i] = n.lastFlickOffset[i] / e) :
                                                    (n.lastFlickSpeed[i] = 0),
                                                    Math.abs(n.lastFlickSpeed[i]) < 0.1 &&
                                                    (n.lastFlickSpeed[i] = 0),
                                                    (n.slowDownRatio[i] = 0.95),
                                                    (n.slowDownRatioReverse[i] = 1 - n.slowDownRatio[i]),
                                                    (n.speedDecelerationRatio[i] = 1);
                                            },
                                            calculateOverBoundsAnimOffset: function(e, t) {
                                                n.backAnimStarted[e] ||
                                                    (de[e] > ee.min[e] ?
                                                        (n.backAnimDestination[e] = ee.min[e]) :
                                                        de[e] < ee.max[e] &&
                                                        (n.backAnimDestination[e] = ee.max[e]),
                                                        void 0 !== n.backAnimDestination[e] &&
                                                        ((n.slowDownRatio[e] = 0.7),
                                                            (n.slowDownRatioReverse[e] =
                                                                1 - n.slowDownRatio[e]),
                                                            n.speedDecelerationRatioAbs[e] < 0.05 &&
                                                            ((n.lastFlickSpeed[e] = 0),
                                                                (n.backAnimStarted[e] = !0),
                                                                Ye(
                                                                    "bounceZoomPan" + e,
                                                                    de[e],
                                                                    n.backAnimDestination[e],
                                                                    t || 300,
                                                                    o.easing.sine.out,
                                                                    function(t) {
                                                                        (de[e] = t), Ae();
                                                                    }
                                                                ))));
                                            },
                                            calculateAnimOffset: function(e) {
                                                n.backAnimStarted[e] ||
                                                    ((n.speedDecelerationRatio[e] =
                                                            n.speedDecelerationRatio[e] *
                                                            (n.slowDownRatio[e] +
                                                                n.slowDownRatioReverse[e] -
                                                                (n.slowDownRatioReverse[e] * n.timeDiff) / 10)),
                                                        (n.speedDecelerationRatioAbs[e] = Math.abs(
                                                            n.lastFlickSpeed[e] * n.speedDecelerationRatio[e]
                                                        )),
                                                        (n.distanceOffset[e] =
                                                            n.lastFlickSpeed[e] *
                                                            n.speedDecelerationRatio[e] *
                                                            n.timeDiff),
                                                        (de[e] += n.distanceOffset[e]));
                                            },
                                            panAnimLoop: function() {
                                                if (
                                                    Ze.zoomPan &&
                                                    ((Ze.zoomPan.raf = j(n.panAnimLoop)),
                                                        (n.now = ke()),
                                                        (n.timeDiff = n.now - n.lastNow),
                                                        (n.lastNow = n.now),
                                                        n.calculateAnimOffset("x"),
                                                        n.calculateAnimOffset("y"),
                                                        Ae(),
                                                        n.calculateOverBoundsAnimOffset("x"),
                                                        n.calculateOverBoundsAnimOffset("y"),
                                                        n.speedDecelerationRatioAbs.x < 0.05 &&
                                                        n.speedDecelerationRatioAbs.y < 0.05)
                                                )
                                                    return (
                                                        (de.x = Math.round(de.x)),
                                                        (de.y = Math.round(de.y)),
                                                        Ae(),
                                                        void Ve("zoomPan")
                                                    );
                                            },
                                        };
                                    return n;
                                },
                                Ot = function(e) {
                                    if (
                                        (e.calculateSwipeSpeed("y"),
                                            (ee = r.currItem.bounds),
                                            (e.backAnimDestination = {}),
                                            (e.backAnimStarted = {}),
                                            Math.abs(e.lastFlickSpeed.x) <= 0.05 &&
                                            Math.abs(e.lastFlickSpeed.y) <= 0.05)
                                    )
                                        return (
                                            (e.speedDecelerationRatioAbs.x =
                                                e.speedDecelerationRatioAbs.y =
                                                0),
                                            e.calculateOverBoundsAnimOffset("x"),
                                            e.calculateOverBoundsAnimOffset("y"), !0
                                        );
                                    Xe("zoomPan"), (e.lastNow = ke()), e.panAnimLoop();
                                },
                                Lt = function(e, t) {
                                    var n, i, a;
                                    if ((ne || (at = u), "swipe" === e)) {
                                        var l = tt.x - nt.x,
                                            c = t.lastFlickDist.x < 10;
                                        l > 30 && (c || t.lastFlickOffset.x > 20) ?
                                            (i = -1) :
                                            l < -30 && (c || t.lastFlickOffset.x < -20) && (i = 1);
                                    }
                                    i &&
                                        ((u += i) < 0 ?
                                            ((u = s.loop ? qt() - 1 : 0), (a = !0)) :
                                            u >= qt() && ((u = s.loop ? 0 : qt() - 1), (a = !0)),
                                            (a && !s.loop) || ((ge += i), (he -= i), (n = !0)));
                                    var d,
                                        p = me.x * he,
                                        h = Math.abs(p - ut.x);
                                    return (
                                        n || p > ut.x == t.lastFlickSpeed.x > 0 ?
                                        ((d =
                                                Math.abs(t.lastFlickSpeed.x) > 0 ?
                                                h / Math.abs(t.lastFlickSpeed.x) :
                                                333),
                                            (d = Math.min(d, 400)),
                                            (d = Math.max(d, 250))) :
                                        (d = 333),
                                        at === u && (n = !1),
                                        (ne = !0),
                                        Ee("mainScrollAnimStart"),
                                        Ye(
                                            "mainScroll",
                                            ut.x,
                                            p,
                                            d,
                                            o.easing.cubic.out,
                                            Oe,
                                            function() {
                                                Ke(),
                                                    (ne = !1),
                                                    (at = -1),
                                                    (n || at !== u) && r.updateCurrItem(),
                                                    Ee("mainScrollAnimComplete");
                                            }
                                        ),
                                        n && r.updateCurrItem(!0),
                                        n
                                    );
                                },
                                Nt = function(e) {
                                    return (1 / Q) * e * v;
                                },
                                Mt = function() {
                                    var e = g,
                                        t = $e(),
                                        n = Fe();
                                    g < t ? (e = t) : g > n && (e = n);
                                    var i,
                                        s = se;
                                    return re && !H && !ae && g < t ?
                                        (r.close(), !0) :
                                        (re &&
                                            (i = function(e) {
                                                Se((1 - s) * e + s);
                                            }),
                                            r.zoomTo(e, 0, 200, o.easing.cubic.out, i), !0);
                                };
                            be("Gestures", {
                                publicMethods: {
                                    initGestures: function() {
                                        var e = function(e, t, n, i, o) {
                                            (T = e + t),
                                            (E = e + n),
                                            (k = e + i),
                                            (S = o ? e + o : "");
                                        };
                                        (A = R.pointerEvent) && R.touch && (R.touch = !1),
                                            A ?
                                            navigator.msPointerEnabled ?
                                            e("MSPointer", "Down", "Move", "Up", "Cancel") :
                                            e("pointer", "down", "move", "up", "cancel") :
                                            R.touch ?
                                            (e("touch", "start", "move", "end", "cancel"),
                                                (I = !0)) :
                                            e("mouse", "down", "move", "up"),
                                            (h = E + " " + k + " " + S),
                                            (f = T),
                                            A &&
                                            !I &&
                                            (I =
                                                navigator.maxTouchPoints > 1 ||
                                                navigator.msMaxTouchPoints > 1),
                                            (r.likelyTouchDevice = I),
                                            (m[T] = St),
                                            (m[E] = Dt),
                                            (m[k] = It),
                                            S && (m[S] = m[k]),
                                            R.touch &&
                                            ((f += " mousedown"),
                                                (h += " mousemove mouseup"),
                                                (m.mousedown = m[T]),
                                                (m.mousemove = m[E]),
                                                (m.mouseup = m[k])),
                                            I || (s.allowPanToNext = !1);
                                    },
                                },
                            });
                            var Pt,
                                Rt,
                                zt,
                                $t,
                                Ft,
                                qt,
                                Ht = function(t, n, i, a) {
                                    var l;
                                    Pt && clearTimeout(Pt),
                                        ($t = !0),
                                        (zt = !0),
                                        t.initialLayout ?
                                        ((l = t.initialLayout), (t.initialLayout = null)) :
                                        (l = s.getThumbBoundsFn && s.getThumbBoundsFn(u));
                                    var d,
                                        p,
                                        h = i ? s.hideAnimationDuration : s.showAnimationDuration,
                                        f = function() {
                                            Ve("initialZoom"),
                                                i ?
                                                (r.template.removeAttribute("style"),
                                                    r.bg.removeAttribute("style")) :
                                                (Se(1),
                                                    n && (n.style.display = "block"),
                                                    o.addClass(e, "pswp--animated-in"),
                                                    Ee("initialZoom" + (i ? "OutEnd" : "InEnd"))),
                                                a && a(),
                                                ($t = !1);
                                        };
                                    if (!h || !l || void 0 === l.x)
                                        return (
                                            Ee("initialZoom" + (i ? "Out" : "In")),
                                            (g = t.initialZoomLevel),
                                            Ne(de, t.initialPosition),
                                            Ae(),
                                            (e.style.opacity = i ? 0 : 1),
                                            Se(1),
                                            void(h ?
                                                setTimeout(function() {
                                                    f();
                                                }, h) :
                                                f())
                                        );
                                    (d = c),
                                    (p = !r.currItem.src ||
                                        r.currItem.loadError ||
                                        s.showHideOpacity),
                                    t.miniImg &&
                                        (t.miniImg.style.webkitBackfaceVisibility = "hidden"),
                                        i ||
                                        ((g = l.w / t.w),
                                            (de.x = l.x),
                                            (de.y = l.y - N),
                                            (r[p ? "template" : "bg"].style.opacity = 0.001),
                                            Ae()),
                                        Xe("initialZoom"),
                                        i && !d && o.removeClass(e, "pswp--animated-in"),
                                        p &&
                                        (i ?
                                            o[(d ? "remove" : "add") + "Class"](
                                                e,
                                                "pswp--animate_opacity"
                                            ) :
                                            setTimeout(function() {
                                                o.addClass(e, "pswp--animate_opacity");
                                            }, 30)),
                                        (Pt = setTimeout(
                                            function() {
                                                if ((Ee("initialZoom" + (i ? "Out" : "In")), i)) {
                                                    var n = l.w / t.w,
                                                        r = { x: de.x, y: de.y },
                                                        s = g,
                                                        a = se,
                                                        c = function(t) {
                                                            1 === t ?
                                                                ((g = n), (de.x = l.x), (de.y = l.y - P)) :
                                                                ((g = (n - s) * t + s),
                                                                    (de.x = (l.x - r.x) * t + r.x),
                                                                    (de.y = (l.y - P - r.y) * t + r.y)),
                                                                Ae(),
                                                                p ? (e.style.opacity = 1 - t) : Se(a - t * a);
                                                        };
                                                    d
                                                        ?
                                                        Ye(
                                                            "initialZoom",
                                                            0,
                                                            1,
                                                            h,
                                                            o.easing.cubic.out,
                                                            c,
                                                            f
                                                        ) :
                                                        (c(1), (Pt = setTimeout(f, h + 20)));
                                                } else
                                                    (g = t.initialZoomLevel),
                                                    Ne(de, t.initialPosition),
                                                    Ae(),
                                                    Se(1),
                                                    p ? (e.style.opacity = 1) : Se(1),
                                                    (Pt = setTimeout(f, h + 20));
                                            },
                                            i ? 25 : 90
                                        ));
                                },
                                Wt = {},
                                Bt = [],
                                Zt = {
                                    index: 0,
                                    errorMsg: '<div class="pswp__error-msg"><a href="%url%" target="_blank">The image</a> could not be loaded.</div>',
                                    forceProgressiveLoading: !1,
                                    preload: [1, 1],
                                    getNumItemsFn: function() {
                                        return Rt.length;
                                    },
                                },
                                Ut = function(e, t, n) {
                                    if (e.src && !e.loadError) {
                                        var i = !n;
                                        if (
                                            (i &&
                                                (e.vGap || (e.vGap = { top: 0, bottom: 0 }),
                                                    Ee("parseVerticalMargin", e)),
                                                (Wt.x = t.x),
                                                (Wt.y = t.y - e.vGap.top - e.vGap.bottom),
                                                i)
                                        ) {
                                            var o = Wt.x / e.w,
                                                r = Wt.y / e.h;
                                            e.fitRatio = o < r ? o : r;
                                            var a = s.scaleMode;
                                            "orig" === a ? (n = 1) : "fit" === a && (n = e.fitRatio),
                                                n > 1 && (n = 1),
                                                (e.initialZoomLevel = n),
                                                e.bounds ||
                                                (e.bounds = {
                                                    center: { x: 0, y: 0 },
                                                    max: { x: 0, y: 0 },
                                                    min: { x: 0, y: 0 },
                                                });
                                        }
                                        if (!n) return;
                                        return (
                                            (function(e, t, n) {
                                                var i = e.bounds;
                                                (i.center.x = Math.round((Wt.x - t) / 2)),
                                                (i.center.y =
                                                    Math.round((Wt.y - n) / 2) + e.vGap.top),
                                                (i.max.x =
                                                    t > Wt.x ? Math.round(Wt.x - t) : i.center.x),
                                                (i.max.y =
                                                    n > Wt.y ?
                                                    Math.round(Wt.y - n) + e.vGap.top :
                                                    i.center.y),
                                                (i.min.x = t > Wt.x ? 0 : i.center.x),
                                                (i.min.y = n > Wt.y ? e.vGap.top : i.center.y);
                                            })(e, e.w * n, e.h * n),
                                            i &&
                                            n === e.initialZoomLevel &&
                                            (e.initialPosition = e.bounds.center),
                                            e.bounds
                                        );
                                    }
                                    return (
                                        (e.w = e.h = 0),
                                        (e.initialZoomLevel = e.fitRatio = 1),
                                        (e.bounds = {
                                            center: { x: 0, y: 0 },
                                            max: { x: 0, y: 0 },
                                            min: { x: 0, y: 0 },
                                        }),
                                        (e.initialPosition = e.bounds.center),
                                        e.bounds
                                    );
                                },
                                Vt = function(e, t, n, i, o, s) {
                                    t.loadError ||
                                        (i &&
                                            ((t.imageAppended = !0),
                                                Yt(t, i, t === r.currItem && xe),
                                                n.appendChild(i),
                                                s &&
                                                setTimeout(function() {
                                                    t &&
                                                        t.loaded &&
                                                        t.placeholder &&
                                                        ((t.placeholder.style.display = "none"),
                                                            (t.placeholder = null));
                                                }, 500)));
                                },
                                Xt = function(e) {
                                    (e.loading = !0), (e.loaded = !1);
                                    var t = (e.img = o.createEl("pswp__img", "img")),
                                        n = function() {
                                            (e.loading = !1),
                                            (e.loaded = !0),
                                            e.loadComplete ? e.loadComplete(e) : (e.img = null),
                                                (t.onload = t.onerror = null),
                                                (t = null);
                                        };
                                    return (
                                        (t.onload = n),
                                        (t.onerror = function() {
                                            (e.loadError = !0), n();
                                        }),
                                        (t.src = e.src),
                                        t
                                    );
                                },
                                Kt = function(e, t) {
                                    if (e.src && e.loadError && e.container)
                                        return (
                                            t && (e.container.innerHTML = ""),
                                            (e.container.innerHTML = s.errorMsg.replace(
                                                "%url%",
                                                e.src
                                            )), !0
                                        );
                                },
                                Yt = function(e, t, n) {
                                    if (e.src) {
                                        t || (t = e.container.lastChild);
                                        var i = n ? e.w : Math.round(e.w * e.fitRatio),
                                            o = n ? e.h : Math.round(e.h * e.fitRatio);
                                        e.placeholder &&
                                            !e.loaded &&
                                            ((e.placeholder.style.width = i + "px"),
                                                (e.placeholder.style.height = o + "px")),
                                            (t.style.width = i + "px"),
                                            (t.style.height = o + "px");
                                    }
                                },
                                Gt = function() {
                                    if (Bt.length) {
                                        for (var e, t = 0; t < Bt.length; t++)
                                            (e = Bt[t]).holder.index === e.index &&
                                            Vt(
                                                e.index,
                                                e.item,
                                                e.baseDiv,
                                                e.img,
                                                0,
                                                e.clearPlaceholder
                                            );
                                        Bt = [];
                                    }
                                };
                            be("Controller", {
                                publicMethods: {
                                    lazyLoadItem: function(e) {
                                        e = _e(e);
                                        var t = Ft(e);
                                        t &&
                                            ((!t.loaded && !t.loading) || b) &&
                                            (Ee("gettingData", e, t), t.src && Xt(t));
                                    },
                                    initController: function() {
                                        o.extend(s, Zt, !0),
                                            (r.items = Rt = n),
                                            (Ft = r.getItemAt),
                                            (qt = s.getNumItemsFn),
                                            s.loop,
                                            qt() < 3 && (s.loop = !1),
                                            Te("beforeChange", function(e) {
                                                var t,
                                                    n = s.preload,
                                                    i = null === e || e >= 0,
                                                    o = Math.min(n[0], qt()),
                                                    a = Math.min(n[1], qt());
                                                for (t = 1; t <= (i ? a : o); t++)
                                                    r.lazyLoadItem(u + t);
                                                for (t = 1; t <= (i ? o : a); t++)
                                                    r.lazyLoadItem(u - t);
                                            }),
                                            Te("initialLayout", function() {
                                                r.currItem.initialLayout =
                                                    s.getThumbBoundsFn && s.getThumbBoundsFn(u);
                                            }),
                                            Te("mainScrollAnimComplete", Gt),
                                            Te("initialZoomInEnd", Gt),
                                            Te("destroy", function() {
                                                for (var e, t = 0; t < Rt.length; t++)
                                                    (e = Rt[t]).container && (e.container = null),
                                                    e.placeholder && (e.placeholder = null),
                                                    e.img && (e.img = null),
                                                    e.preloader && (e.preloader = null),
                                                    e.loadError && (e.loaded = e.loadError = !1);
                                                Bt = null;
                                            });
                                    },
                                    getItemAt: function(e) {
                                        return e >= 0 && void 0 !== Rt[e] && Rt[e];
                                    },
                                    allowProgressiveImg: function() {
                                        return (
                                            s.forceProgressiveLoading ||
                                            !I ||
                                            s.mouseUsed ||
                                            screen.width > 1200
                                        );
                                    },
                                    setContent: function(e, t) {
                                        s.loop && (t = _e(t));
                                        var n = r.getItemAt(e.index);
                                        n && (n.container = null);
                                        var i,
                                            l = r.getItemAt(t);
                                        if (l) {
                                            Ee("gettingData", t, l), (e.index = t), (e.item = l);
                                            var c = (l.container = o.createEl("pswp__zoom-wrap"));
                                            if (
                                                (!l.src &&
                                                    l.html &&
                                                    (l.html.tagName ?
                                                        c.appendChild(l.html) :
                                                        (c.innerHTML = l.html)),
                                                    Kt(l),
                                                    Ut(l, pe), !l.src || l.loadError || l.loaded)
                                            )
                                                l.src &&
                                                !l.loadError &&
                                                (((i = o.createEl(
                                                        "pswp__img",
                                                        "img"
                                                    )).style.opacity = 1),
                                                    (i.src = l.src),
                                                    Yt(l, i),
                                                    Vt(0, l, c, i));
                                            else {
                                                if (
                                                    ((l.loadComplete = function(n) {
                                                            if (a) {
                                                                if (e && e.index === t) {
                                                                    if (Kt(n, !0))
                                                                        return (
                                                                            (n.loadComplete = n.img = null),
                                                                            Ut(n, pe),
                                                                            Ie(n),
                                                                            void(
                                                                                e.index === u && r.updateCurrZoomItem()
                                                                            )
                                                                        );
                                                                    n.imageAppended ?
                                                                        !$t &&
                                                                        n.placeholder &&
                                                                        ((n.placeholder.style.display = "none"),
                                                                            (n.placeholder = null)) :
                                                                        R.transform && (ne || $t) ?
                                                                        Bt.push({
                                                                            item: n,
                                                                            baseDiv: c,
                                                                            img: n.img,
                                                                            index: t,
                                                                            holder: e,
                                                                            clearPlaceholder: !0,
                                                                        }) :
                                                                        Vt(0, n, c, n.img, 0, !0);
                                                                }
                                                                (n.loadComplete = null),
                                                                (n.img = null),
                                                                Ee("imageLoadComplete", t, n);
                                                            }
                                                        }),
                                                        o.features.transform)
                                                ) {
                                                    var d = "pswp__img pswp__img--placeholder";
                                                    d += l.msrc ? "" : " pswp__img--placeholder--blank";
                                                    var p = o.createEl(d, l.msrc ? "img" : "");
                                                    l.msrc && (p.src = l.msrc),
                                                        Yt(l, p),
                                                        c.appendChild(p),
                                                        (l.placeholder = p);
                                                }
                                                l.loading || Xt(l),
                                                    r.allowProgressiveImg() &&
                                                    (!zt && R.transform ?
                                                        Bt.push({
                                                            item: l,
                                                            baseDiv: c,
                                                            img: l.img,
                                                            index: t,
                                                            holder: e,
                                                        }) :
                                                        Vt(0, l, c, l.img, 0, !0));
                                            }
                                            zt || t !== u ?
                                                Ie(l) :
                                                ((te = c.style), Ht(l, i || l.img)),
                                                (e.el.innerHTML = ""),
                                                e.el.appendChild(c);
                                        } else e.el.innerHTML = "";
                                    },
                                    cleanSlide: function(e) {
                                        e.img && (e.img.onload = e.img.onerror = null),
                                            (e.loaded = e.loading = e.img = e.imageAppended = !1);
                                    },
                                },
                            });
                            var Jt,
                                Qt,
                                en = {},
                                tn = function(e, t, n) {
                                    var i = document.createEvent("CustomEvent"),
                                        o = {
                                            origEvent: e,
                                            target: e.target,
                                            releasePoint: t,
                                            pointerType: n || "touch",
                                        };
                                    i.initCustomEvent("pswpTap", !0, !0, o),
                                        e.target.dispatchEvent(i);
                                };
                            be("Tap", {
                                    publicMethods: {
                                        initTap: function() {
                                            Te("firstTouchStart", r.onTapStart),
                                                Te("touchRelease", r.onTapRelease),
                                                Te("destroy", function() {
                                                    (en = {}), (Jt = null);
                                                });
                                        },
                                        onTapStart: function(e) {
                                            e.length > 1 && (clearTimeout(Jt), (Jt = null));
                                        },
                                        onTapRelease: function(e, t) {
                                            var n, i;
                                            if (t && !X && !U && !Ue) {
                                                var r = t;
                                                if (
                                                    Jt &&
                                                    (clearTimeout(Jt),
                                                        (Jt = null),
                                                        (n = r),
                                                        (i = en),
                                                        Math.abs(n.x - i.x) < 25 && Math.abs(n.y - i.y) < 25)
                                                )
                                                    return void Ee("doubleTap", r);
                                                if ("mouse" === t.type) return void tn(e, t, "mouse");
                                                if (
                                                    "BUTTON" === e.target.tagName.toUpperCase() ||
                                                    o.hasClass(e.target, "pswp__single-tap")
                                                )
                                                    return void tn(e, t);
                                                Ne(en, r),
                                                    (Jt = setTimeout(function() {
                                                        tn(e, t), (Jt = null);
                                                    }, 300));
                                            }
                                        },
                                    },
                                }),
                                be("DesktopZoom", {
                                    publicMethods: {
                                        initDesktopZoom: function() {
                                            M ||
                                                (I ?
                                                    Te("mouseUsed", function() {
                                                        r.setupDesktopZoom();
                                                    }) :
                                                    r.setupDesktopZoom(!0));
                                        },
                                        setupDesktopZoom: function(t) {
                                            Qt = {};
                                            var n = "wheel mousewheel DOMMouseScroll";
                                            Te("bindEvents", function() {
                                                    o.bind(e, n, r.handleMouseWheel);
                                                }),
                                                Te("unbindEvents", function() {
                                                    Qt && o.unbind(e, n, r.handleMouseWheel);
                                                }),
                                                (r.mouseZoomedIn = !1);
                                            var i,
                                                s = function() {
                                                    r.mouseZoomedIn &&
                                                        (o.removeClass(e, "pswp--zoomed-in"),
                                                            (r.mouseZoomedIn = !1)),
                                                        g < 1 ?
                                                        o.addClass(e, "pswp--zoom-allowed") :
                                                        o.removeClass(e, "pswp--zoom-allowed"),
                                                        a();
                                                },
                                                a = function() {
                                                    i && (o.removeClass(e, "pswp--dragging"), (i = !1));
                                                };
                                            Te("resize", s),
                                                Te("afterChange", s),
                                                Te("pointerDown", function() {
                                                    r.mouseZoomedIn &&
                                                        ((i = !0), o.addClass(e, "pswp--dragging"));
                                                }),
                                                Te("pointerUp", a),
                                                t || s();
                                        },
                                        handleMouseWheel: function(e) {
                                            if (g <= r.currItem.fitRatio)
                                                return (
                                                    s.modal &&
                                                    (!s.closeOnScroll || Ue || Z ?
                                                        e.preventDefault() :
                                                        D &&
                                                        Math.abs(e.deltaY) > 2 &&
                                                        ((c = !0), r.close())), !0
                                                );
                                            if ((e.stopPropagation(), (Qt.x = 0), "deltaX" in e))
                                                1 === e.deltaMode ?
                                                ((Qt.x = 18 * e.deltaX), (Qt.y = 18 * e.deltaY)) :
                                                ((Qt.x = e.deltaX), (Qt.y = e.deltaY));
                                            else if ("wheelDelta" in e)
                                                e.wheelDeltaX && (Qt.x = -0.16 * e.wheelDeltaX),
                                                e.wheelDeltaY ?
                                                (Qt.y = -0.16 * e.wheelDeltaY) :
                                                (Qt.y = -0.16 * e.wheelDelta);
                                            else {
                                                if (!("detail" in e)) return;
                                                Qt.y = e.detail;
                                            }
                                            ze(g, !0);
                                            var t = de.x - Qt.x,
                                                n = de.y - Qt.y;
                                            (s.modal ||
                                                (t <= ee.min.x &&
                                                    t >= ee.max.x &&
                                                    n <= ee.min.y &&
                                                    n >= ee.max.y)) &&
                                            e.preventDefault(),
                                                r.panTo(t, n);
                                        },
                                        toggleDesktopZoom: function(t) {
                                            t = t || { x: pe.x / 2 + fe.x, y: pe.y / 2 + fe.y };
                                            var n = s.getDoubleTapZoom(!0, r.currItem),
                                                i = g === n;
                                            (r.mouseZoomedIn = !i),
                                            r.zoomTo(i ? r.currItem.initialZoomLevel : n, t, 333),
                                                o[(i ? "remove" : "add") + "Class"](
                                                    e,
                                                    "pswp--zoomed-in"
                                                );
                                        },
                                    },
                                });
                            var nn,
                                on,
                                rn,
                                sn,
                                an,
                                ln,
                                cn,
                                un,
                                dn,
                                pn,
                                hn,
                                fn,
                                mn = { history: !0, galleryUID: 1 },
                                gn = function() {
                                    return hn.hash.substring(1);
                                },
                                vn = function() {
                                    nn && clearTimeout(nn), rn && clearTimeout(rn);
                                },
                                yn = function() {
                                    var e = gn(),
                                        t = {};
                                    if (e.length < 5) return t;
                                    var n,
                                        i = e.split("&");
                                    for (n = 0; n < i.length; n++)
                                        if (i[n]) {
                                            var o = i[n].split("=");
                                            o.length < 2 || (t[o[0]] = o[1]);
                                        }
                                    if (s.galleryPIDs) {
                                        var r = t.pid;
                                        for (t.pid = 0, n = 0; n < Rt.length; n++)
                                            if (Rt[n].pid === r) {
                                                t.pid = n;
                                                break;
                                            }
                                    } else t.pid = parseInt(t.pid, 10) - 1;
                                    return t.pid < 0 && (t.pid = 0), t;
                                },
                                wn = function() {
                                    if ((rn && clearTimeout(rn), Ue || Z))
                                        rn = setTimeout(wn, 500);
                                    else {
                                        sn ? clearTimeout(on) : (sn = !0);
                                        var e = u + 1,
                                            t = Ft(u);
                                        t.hasOwnProperty("pid") && (e = t.pid);
                                        var n = cn + "&gid=" + s.galleryUID + "&pid=" + e;
                                        un || (-1 === hn.hash.indexOf(n) && (pn = !0));
                                        var i = hn.href.split("#")[0] + "#" + n;
                                        fn
                                            ?
                                            "#" + n !== window.location.hash &&
                                            history[un ? "replaceState" : "pushState"](
                                                "",
                                                document.title,
                                                i
                                            ) :
                                            un ?
                                            hn.replace(i) :
                                            (hn.hash = n),
                                            (un = !0),
                                            (on = setTimeout(function() {
                                                sn = !1;
                                            }, 60));
                                    }
                                };
                            be("History", {
                                    publicMethods: {
                                        initHistory: function() {
                                            if ((o.extend(s, mn, !0), s.history)) {
                                                (hn = window.location),
                                                (pn = !1),
                                                (dn = !1),
                                                (un = !1),
                                                (cn = gn()),
                                                (fn = "pushState" in history),
                                                cn.indexOf("gid=") > -1 &&
                                                    (cn = (cn = cn.split("&gid=")[0]).split("?gid=")[0]),
                                                    Te("afterChange", r.updateURL),
                                                    Te("unbindEvents", function() {
                                                        o.unbind(window, "hashchange", r.onHashChange);
                                                    });
                                                var e = function() {
                                                    (ln = !0),
                                                    dn ||
                                                        (pn ?
                                                            history.back() :
                                                            cn ?
                                                            (hn.hash = cn) :
                                                            fn ?
                                                            history.pushState(
                                                                "",
                                                                document.title,
                                                                hn.pathname + hn.search
                                                            ) :
                                                            (hn.hash = "")),
                                                        vn();
                                                };
                                                Te("unbindEvents", function() {
                                                        c && e();
                                                    }),
                                                    Te("destroy", function() {
                                                        ln || e();
                                                    }),
                                                    Te("firstUpdate", function() {
                                                        u = yn().pid;
                                                    });
                                                var t = cn.indexOf("pid=");
                                                t > -1 &&
                                                    "&" === (cn = cn.substring(0, t)).slice(-1) &&
                                                    (cn = cn.slice(0, -1)),
                                                    setTimeout(function() {
                                                        a && o.bind(window, "hashchange", r.onHashChange);
                                                    }, 40);
                                            }
                                        },
                                        onHashChange: function() {
                                            if (gn() === cn) return (dn = !0), void r.close();
                                            sn || ((an = !0), r.goTo(yn().pid), (an = !1));
                                        },
                                        updateURL: function() {
                                            vn(), an || (un ? (nn = setTimeout(wn, 800)) : wn());
                                        },
                                    },
                                }),
                                o.extend(r, Ge);
                        };
                    }) ?
                    i.call(t, n, t, e) :
                    i) || (e.exports = o);
        },
        function(e, t, n) {
            "use strict";
            (function(e, t) {
                var i = n(0),
                    o = (n(12), n(13), n(14), n(15), n(3)),
                    r = (n(17), n(9));

                function s(e) {
                    return (s =
                        "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ?

                        function(e) {
                            return typeof e;
                        } :
                        function(e) {
                            return e &&
                                "function" == typeof Symbol &&
                                e.constructor === Symbol &&
                                e !== Symbol.prototype ?
                                "symbol" :
                                typeof e;
                        })(e);
                }

                function a(e) {
                    return (
                        (function(e) {
                            if (Array.isArray(e)) {
                                for (var t = 0, n = new Array(e.length); t < e.length; t++)
                                    n[t] = e[t];
                                return n;
                            }
                        })(e) ||
                        (function(e) {
                            if (
                                Symbol.iterator in Object(e) ||
                                "[object Arguments]" === Object.prototype.toString.call(e)
                            )
                                return Array.from(e);
                        })(e) ||
                        (function() {
                            throw new TypeError(
                                "Invalid attempt to spread non-iterable instance"
                            );
                        })()
                    );
                }
                var l = function(e) {
                    var t = e || document;
                    setTimeout(function() {
                        r.a.add([].slice.call(a(t.getElementsByClassName("js-lazy-img"))));
                    }, 10);
                };

                function c() {
                    var e = window.innerWidth;
                    e < 1e3 ?
                        (t("#js-menu-main").menuFat("destroy"),
                            t("#js-menu-main").menuApp({
                                dropdownClass: "menu__dropdown",
                                title: "Menu",
                            })) :
                        (t("#js-menu-main").menuApp("destroy"),
                            t("#js-menu-main").menuFat(),
                            t("#js-menu-footer").menuFat("")),
                        e < 530 ?
                        (t("#header .header__social").insertBefore(
                                t("#header .header__logo")
                            ),
                            t(".js-section-promo").each(function() {
                                var e = t(this);
                                e.find(".promo-item").length > 1 &&
                                    e
                                    .addClass("owl-carousel")
                                    .owlCarousel({
                                        nav: !1,
                                        dots: !0,
                                        loop: !0,
                                        thumbs: !1,
                                        items: 1,
                                    });
                            }),
                            t(".js-section-features").each(function() {
                                var e = t(this);
                                e.find(".section-features__item").length > 1 &&
                                    e
                                    .addClass("owl-carousel")
                                    .owlCarousel({
                                        nav: !1,
                                        dots: !0,
                                        loop: !0,
                                        thumbs: !1,
                                        items: 1,
                                        autoHeight: !0,
                                    });
                            }),
                            t(".js-section-book").each(function() {
                                var e = t(this);
                                e.find(".section-book__item").length > 1 &&
                                    e
                                    .addClass("owl-carousel")
                                    .owlCarousel({
                                        nav: !1,
                                        dots: !0,
                                        loop: !0,
                                        thumbs: !1,
                                        items: 1,
                                        autoHeight: !0,
                                    });
                            }),
                            t("#js-menu-footer").menuFat("destroy"),
                            u(),
                            t("#js-menu-footer").on(
                                "click",
                                ".has-dropdown > a",
                                function(e) {
                                    var n = t(this);
                                    if (n.next(".menu__dropdown").length > 0) {
                                        var i = n.next(".menu__dropdown");
                                        i.is(":hidden") ?
                                            (i.slideDown(),
                                                n
                                                .closest(".has-dropdown")
                                                .toggleClass("dropdown-opened")) :
                                            (i.slideUp(),
                                                n
                                                .closest(".has-dropdown")
                                                .removeClass("dropdown-opened")),
                                            e.preventDefault();
                                    }
                                }
                            )) :
                        (u(),
                            t("#header .header__social").prependTo(
                                t("#header .header__top-left")
                            ),
                            t("#js-menu-footer").menuFat(),
                            t(".js-read-more").each(function() {
                                var e = t(this),
                                    n = e.find(".read-more__btn");
                                "ar" === t("html").attr("lang") ?
                                    n.removeClass("is-active").text("اقرأ أكثر") :
                                    n.removeClass("is-active").text("Read more"),
                                    e
                                    .find(".read-more__content")
                                    .removeClass("is-active")
                                    .css("display", "");
                            }),
                            Object(o.a)(".js-section-promo"),
                            Object(o.a)(".js-section-features"),
                            Object(o.a)(".js-product-list"),
                            Object(o.a)(".js-section-book"));
                }

                function u() {
                    t("#js-menu-footer").off("click", ".has-dropdown > a"),
                        t("#js-menu-footer")
                        .find(".dropdown-opened")
                        .removeClass("dropdown-opened"),
                        t("#js-menu-footer").find(".menu__dropdown").css("display", "");
                }
                l(),
                    i.a.stream.add(l),
                    (function(e) {
                        var t = {
                            init: function(t) {
                                var n = e.extend({
                                        onLoad: function(e) {},
                                        onChange: function(e) {},
                                        onOpen: function(e) {},
                                        onClose: function(e) {},
                                    },
                                    t
                                );
                                return this.each(function() {
                                    var t = e(this);
                                    if (!t.hasClass("menu-fat-loaded")) {
                                        var i;
                                        t.wrap('<div class="menu-fat"></div>');
                                        var o = t.closest(".menu-fat"),
                                            r = e(
                                                '<div class="menu-hamburger"><span></span><span></span><span></span><span></span></div>'
                                            ),
                                            s = e("<ul></ul>"),
                                            a = e(
                                                '<div class="menu-fat__helper" style="display: none;" ><div class="menu-fat__helper-inner"><div class="menu-fat__toggle"></div><nav class="menu menu-fat__nav" ></nav></div></div>'
                                            );
                                        s.appendTo(a.find(".menu-fat__nav")),
                                            r.appendTo(a.find(".menu-fat__toggle")),
                                            a.appendTo(o);
                                        var l = { menu: o, menuCropped: s, menuCroppedLength: 0 };

                                        function c() {
                                            s.empty();
                                            var i =
                                                Math.ceil(a[0].getBoundingClientRect().width) ||
                                                parseInt(getComputedStyle(a[0]).width) ||
                                                55,
                                                r = Math.ceil(t[0].getBoundingClientRect().width),
                                                c = 0,
                                                u = null,
                                                d = r - i;
                                            o
                                                .find("ul")
                                                .first()
                                                .children("li")
                                                .each(function() {
                                                    var n = e(this);
                                                    if (
                                                        ((c += n.outerWidth()),
                                                            n.removeClass("is-last"),
                                                            c > d)
                                                    ) {
                                                        if (
                                                            (n.addClass("is-cloned").css("display", "none"),
                                                                o.addClass("is-loaded"),
                                                                null == u)
                                                        ) {
                                                            var i =
                                                                c -
                                                                Math.ceil(n[0].getBoundingClientRect().width);
                                                            t
                                                                .find("ul")
                                                                .first()
                                                                .children("li")
                                                                .eq(n.index() - 1)
                                                                .addClass("is-last"),
                                                                (i += Math.ceil(
                                                                    n[0].getBoundingClientRect().width
                                                                )) > d ?
                                                                null == u &&
                                                                (o.addClass("is-loaded"),
                                                                    a.css("display", ""),
                                                                    (u = n.index() - 1),
                                                                    n
                                                                    .addClass("is-cloned")
                                                                    .removeClass("is-last")) :
                                                                ((u = n.index()),
                                                                    n.removeClass("is-cloned"),
                                                                    (c = i));
                                                        }
                                                    } else
                                                        !(function(e) {
                                                            e.removeClass("is-cloned").css("display", "");
                                                        })(n),
                                                        a.css("display", "none"),
                                                        o.removeClass("is-loaded");
                                                    n.is(".is-cloned") &&
                                                        n.clone().appendTo(s).css("display", "");
                                                }),
                                                s.find(".is-cloned").length !=
                                                s.find(".is-cloned").length &&
                                                ((l.menuCroppedLength = s.find(".is-cloned").length),
                                                    n.onChange(l));
                                            var p = 0;
                                            o
                                                .find("ul")
                                                .first()
                                                .children("li")
                                                .each(function() {
                                                    var t = e(this);
                                                    p += t.outerWidth();
                                                }),
                                                p <= r + i &&
                                                (o.removeClass("is-loaded"),
                                                    a.hide(),
                                                    s.empty(),
                                                    o.find(".is-last").removeClass("is-last"),
                                                    o
                                                    .find(".is-cloned")
                                                    .removeClass("is-cloned")
                                                    .css("display", ""));
                                        }
                                        r.on("click", function(t) {
                                                var i = e(this),
                                                    r = o.find(".menu-fat__nav");
                                                r.is(".is-active") ?
                                                    (i.removeClass("is-active"),
                                                        r.removeClass("is-active"),
                                                        a.removeClass("is-active"),
                                                        n.onClose(l)) :
                                                    (i.addClass("is-active"),
                                                        r.addClass("is-active"),
                                                        a.addClass("is-active"),
                                                        n.onOpen(l));
                                            }),
                                            e(window).on("click", function(e) {
                                                var t = o.find(".menu-fat__nav");
                                                e.target == a ||
                                                    a.find(e.target).length > 0 ||
                                                    (r.removeClass("is-active"),
                                                        t.removeClass("is-active"),
                                                        a.removeClass("is-active"),
                                                        n.onClose(l));
                                            }),
                                            c(),
                                            n.onLoad(l),
                                            t.addClass("menu-fat-loaded"),
                                            e(window).on("resize", function() {
                                                clearTimeout(i),
                                                    (i = setTimeout(function() {
                                                        c();
                                                    }, 500));
                                            });
                                    }
                                });
                            },
                            destroy: function() {
                                var t = e(this);
                                t.removeClass("menu-fat-loaded");
                                var n = t.closest(".menu-fat");
                                n.find(".menu-fat__helper").remove(),
                                    n.find(".is-last").removeClass("is-last"),
                                    n
                                    .find(".is-cloned")
                                    .removeClass("is-cloned")
                                    .css("display", ""),
                                    n.children().unwrap();
                            },
                        };
                        e.fn.menuFat = function(n) {
                            return t[n] ?
                                t[n].apply(this, Array.prototype.slice.call(arguments, 1)) :
                                "object" !== s(n) && n ?
                                void e.error("Метод с именем " + n + " не существует ") :
                                t.init.apply(this, arguments);
                        };
                    })(e),
                    (function(e) {
                        var t = {
                            init: function(t) {
                                var n = e.extend({
                                        title: "Меню",
                                        dropdownClass: "menu__dropdown",
                                        onChange: function() {},
                                        onOpen: function(e) {},
                                        onClose: function(e) {},
                                    },
                                    t
                                );
                                return this.each(function() {
                                    var t,
                                        i = e(this);
                                    if (!i.hasClass("menu-app-loaded")) {
                                        i.wrap('<div class="menu-app"></div>');
                                        var o = i.closest(".menu-app"),
                                            r = e('<div class="menu-app-overlay"></div>');
                                        r.on("click", function(e) {
                                                o.trigger("close");
                                            }),
                                            i.addClass("menu-app-loaded");
                                        var s = e(
                                            '<div class="menu-app__head"><div class="menu-app__back"><div class="btn" style="display: none;"><span class="icon">&nbsp;</span></div></div><div class="menu-app__title"><span>' +
                                            n.title +
                                            '</span></div><div class="menu-app__close"><div class="btn"><div class="menu-hamburger is-active "><span></span><span></span><span></span><span></span></div></div></div></div>'
                                        );
                                        s.prependTo(o), r.insertBefore(o);
                                        var a = s.find(".menu-app__title span"),
                                            l = s.find(".menu-app__back .btn");

                                        function c() {
                                            i.find(".dropdown-active").length > 0 ?
                                                l.show() :
                                                l.hide();
                                        }

                                        function u() {
                                            var e = t.closest("ul"),
                                                i = t.closest("li");
                                            e.removeClass("dropdown-active"),
                                                i.removeClass("dropdown-opened");
                                            var r = t.next("ul").first();
                                            t.next("." + n.dropdownClass).length > 0 &&
                                                (r = t.next("." + n.dropdownClass)),
                                                r.length > 0 && r.removeClass("is-active"),
                                                e.closest("li").find("a").first().length > 0 ?
                                                ((t = e.closest("li").find("a").first()),
                                                    a.text(t.text())) :
                                                a.text(n.title),
                                                c(),
                                                o.trigger("change");
                                        }
                                        s.find(".menu-app__close .btn").on("click", function() {
                                                i.trigger("close"), r.fadeOut();
                                            }),
                                            l.on("click", function() {
                                                u();
                                            }),
                                            a.on("click", function() {
                                                u();
                                            }),
                                            o.on("click", ".has-dropdown__btn", function(i) {
                                                var r = e(this).closest("a"),
                                                    s = e(this).closest("ul"),
                                                    l = e(this).closest("li"),
                                                    u = l.find("ul").first();
                                                l.find("." + n.dropdownClass).length > 0 &&
                                                    (u = l.find("." + n.dropdownClass).first()),
                                                    u.length > 0 &&
                                                    (s.addClass("dropdown-active"),
                                                        l.addClass("dropdown-opened"),
                                                        u.addClass("is-active"),
                                                        a.text(r.text()),
                                                        c(),
                                                        (t = r),
                                                        o.trigger("change"),
                                                        i.preventDefault());
                                            }),
                                            o
                                            .on("change", function() {
                                                var e = { menu: i };
                                                n.onChange(e);
                                            })
                                            .on("open", function() {
                                                e("body").addClass("menu-app-opened"),
                                                    a.text(n.title),
                                                    o.addClass("is-active"),
                                                    r.fadeIn();
                                                var t = { menu: i };
                                                n.onOpen(t);
                                            })
                                            .on("close", function() {
                                                e("body").removeClass("menu-app-opened"),
                                                    c(),
                                                    r.fadeOut(),
                                                    o.removeClass("is-active"),
                                                    o
                                                    .find(".dropdown-active")
                                                    .removeClass("dropdown-active"),
                                                    o
                                                    .find(".dropdown-opened")
                                                    .removeClass("dropdown-opened"),
                                                    o
                                                    .find("." + n.dropdownClass)
                                                    .removeClass("is-active");
                                                var t = { menu: i };
                                                n.onClose(t);
                                            });
                                    }
                                });
                            },
                            open: function() {
                                e(this).trigger("open");
                            },
                            close: function() {
                                e(this).trigger("close");
                            },
                            destroy: function() {
                                var t = e(this),
                                    n = e('<div class="menu-app-overlay"></div>');
                                t.removeClass("menu-app-loaded");
                                var i = t.closest(".menu-app");
                                i.find(".menu-app__head").remove(),
                                    i.children().unwrap(),
                                    n.remove();
                            },
                        };
                        e.fn.menuApp = function(n) {
                            return t[n] ?
                                t[n].apply(this, Array.prototype.slice.call(arguments, 1)) :
                                "object" !== s(n) && n ?
                                void e.error("Метод с именем " + n + " не существует ") :
                                t.init.apply(this, arguments);
                        };
                    })(e),
                    (function() {
                        var e = document.getElementById("js-scroll-top");
                        if (!e) return !1;

                        function t() {
                            window.scrollY > 400 ?
                                e.classList.add("is-active") :
                                e.classList.remove("is-active");
                        }
                        e.addEventListener("click", function(e) {
                                e.preventDefault(),
                                    window.scrollTo({ top: 0, behavior: "smooth" });
                            }),
                            window.addEventListener("load", t),
                            window.addEventListener("scroll", t);
                    })(),
                    t(".js-read-more").each(function() {
                        var e = t(this),
                            n = e.find(".read-more__btn");
                        n.on("click", function(i) {
                            e.find(".read-more__content").is(":hidden") ?
                                e
                                .find(".read-more__content")
                                .stop()
                                .addClass("is-active")
                                .slideDown()
                                .promise()
                                .done(function() {
                                    "ar" === t("html").attr("lang") ?
                                        n.addClass("is-active").text("إخفاء") :
                                        n.addClass("is-active").text("Hide");
                                }) :
                                e
                                .find(".read-more__content")
                                .stop()
                                .removeClass("is-active")
                                .slideUp()
                                .promise()
                                .done(function() {
                                    "ar" === t("html").attr("lang") ?
                                        n.removeClass("is-active").text("اقرأ أكثر") :
                                        n.removeClass("is-active").text("Read more");
                                }),
                                i.preventDefault();
                        });
                    }),
                    t("#js-menu-main").each(function() {
                        t(this)
                            .find(".has-dropdown .has-dropdown ")
                            .on("click", function(e) {
                                window.innerWidth > 1e3 &&
                                    (t(this).toggleClass("is-opened"),
                                        t(this).find(".menu__dropdown").first().toggle(),
                                        e.preventDefault());
                            });
                    }),
                    t(".js-img-background").each(function() {
                        t(this)
                            .css("opacity", "0")
                            .css(
                                "background-image",
                                "url(" + t(this).find("img").attr("src") + ")"
                            )
                            .find("img")
                            .css("opacity", "0")
                            .css("visibility", "hidden"),
                            t(this).css("opacity", "");
                    }),
                    t(window)
                    .on("load", function() {
                        c();
                    })
                    .on("resize", function() {
                        c();
                    }),
                    t(document)
                    .on("click", "#js-header-toggle", function() {
                        t("#js-menu-main").menuApp("open");
                    })
                    .on("click", "#js-header-info", function(e) {
                        t(".window-contacts").length > 0 &&
                            (t(".window-contacts").addClass("is-active"),
                                t("#window-contacts-overlay").fadeIn(),
                                t("body").css("overflow", "hidden"),
                                e.stopPropagation()),
                            e.preventDefault();
                    })
                    .on("click", "#window-contacts-overlay", function() {
                        t(".window-contacts").removeClass("is-active"),
                            t("#window-contacts-overlay").fadeOut(),
                            t("body").css("overflow", "");
                    })
                    .on("click", ".window-contacts .window__close", function(e) {
                        t(".window-contacts").removeClass("is-active"),
                            t("#window-contacts-overlay").fadeOut(),
                            t("body").css("overflow", ""),
                            e.preventDefault();
                    })
                    .on("click", ".overlay_call", function(e) {
                        var n = t(".window");
                        t("#js-window-overlay").hide(),
                            n.hide(),
                            (document.body.style.overflow = ""),
                            (document.body.style.position = ""),
                            (document.body.style.transform = "none"),
                            t(".datepickers-container").css("transform", "");
                    })
                    .on("click", ".window__close", function(e) {
                        var n = t(".window");
                        t("#js-window-overlay").hide(),
                            n.hide(),
                            (document.body.style.overflow = ""),
                            (document.body.style.position = ""),
                            (document.body.style.transform = "none"),
                            t(".datepickers-container").css("transform", ""),
                            e.preventDefault();
                    })
                    .on("click", ".window .window__content", function(e) {
                        e.stopPropagation();
                    })
                    .on(
                        "click",
                        ".ui-datepicker, .datepickers-container",
                        function(e) {
                            e.stopPropagation();
                        }
                    );
            }.call(this, n(1), n(1)));
        },
        function(e, t, n) {
            "use strict";
            var i = n(8),
                o = {};
            Object.entries(i).forEach(function(e) {
                var t = parseInt(e[1], 10),
                    n = e[0];
                o[n] = t;
            });
            var r,
                s =
                ((r = function() {
                        var e = s.getValue();
                        if (e !== s.current) {
                            var t = new CustomEvent("breakpoints.change", {
                                detail: { breakpoints: { value: e } },
                            });
                            (s.current = e), document.dispatchEvent(t);
                        }
                    }),
                    window.addEventListener("resize", r),
                    document.addEventListener("DOMContentLoaded", r), {
                        current: "",
                        points: o,
                        getValue: function() {
                            return window
                                .getComputedStyle(document.body, ":before")
                                .getPropertyValue("content")
                                .replace(/\"/g, "");
                        },
                        currentOf: function(e) {
                            var t = this;
                            return (!!e.split(" ").filter(function(e) {
                                return e === t.current;
                            }).length && this.current);
                        },
                        onChange: function(e) {
                            return (
                                "function" == typeof e &&
                                document.addEventListener("breakpoints.change", function(t) {
                                    return e(t);
                                }),
                                this.current
                            );
                        },
                        onBreakpoint: function(e, t, n) {
                            var i = this,
                                o = !0,
                                r = !0,
                                s = function(s) {
                                    if (i.currentOf(e)) {
                                        if (t && o && "function" == typeof t)
                                            return (o = !1), (r = !0), t(s);
                                    } else if (n && r && "function" == typeof n)
                                        return (r = !1), (o = !0), n(s);
                                    return i.current;
                                };
                            this.current && s(),
                                document.addEventListener("breakpoints.change", s);
                        },
                        onEach: function(e, t, n) {
                            var i = this,
                                o = "",
                                r = function(r) {
                                    if (i.current !== o)
                                        if (((o = i.current), i.currentOf(e))) {
                                            if (t && "function" == typeof t) return t(r);
                                        } else if (n && "function" == typeof n) return n(r);
                                    return i.current;
                                };
                            this.current && r(),
                                document.addEventListener("breakpoints.change", r);
                        },
                    });
            t.a = s;
        },
        function(e, t, n) {
            e.exports = {
                xxs: "425px",
                xs: "530px",
                sm: "768px",
                md: "1024px",
                lg: "1200px",
                xl: "1320px",
                xxl: "1440px",
            };
        },
        function(e, t, n) {
            "use strict";
            var i = (function() {
                var e = { isActive: !1, observer: null };
                "IntersectionObserver" in window
                    ?
                    ((e.isActive = !0),
                        (e.observer = new IntersectionObserver(function(t) {
                            t.forEach(function(t) {
                                if (t.isIntersecting) {
                                    var n = t.target;
                                    (n.src = n.dataset.src),
                                    n.classList.add("is-show"),
                                        e.observer.unobserve(n);
                                }
                            });
                        }))) :
                    (e.isActive = !1);
                return Object.freeze({
                    add: function(t) {
                        e.isActive ?
                            t.forEach(function(t) {
                                e.observer.observe(t);
                            }) :
                            (console.warn("IntersectionObserver not found. Fallback used."),
                                t.forEach(function(e) {
                                    e.classList.add("is-show"), (e.src = e.dataset.src);
                                }));
                    },
                });
            })();
            t.a = i;
        }, , ,
        function(e, t, n) {
            "use strict";
            (function(e) {
                var t = n(0);
                e(document).ready(function() {
                    e("body").on("submit", "form.ajax[action][method]", function(n) {
                        n.preventDefault();
                        var i = e(this);
                        i.data("submitted") ||
                            (i
                                .data("submitted", !0)
                                .find('[type="submit"]')
                                .addClass("is-loading")
                                .attr("disabled", !0),
                                e
                                .ajax({
                                    url: i.attr("action"),
                                    type: i.attr("method"),
                                    data: new FormData(i[0]),
                                    processData: !1,
                                    contentType: !1,
                                })
                                .done(function(n) {
                                    n.success &&
                                        e(document).trigger(t.a.triggers.form.success, {
                                            form: i,
                                            data: n,
                                        });
                                    var o = n.html || n,
                                        r = e(o);
                                    if (r.is("form") || !r.is(".order_submitted")) {
                                        if (i.data("target")) {
                                            var s = i.closest(i.data("target"));
                                            if (s.length)
                                                return (
                                                    s.html(r),
                                                    void e(document).trigger(t.a.triggers.ajax.done, {
                                                        html: r[0],
                                                    })
                                                );
                                        }
                                        i.replaceWith(r.find("form")),
                                            "ar" === e("html").attr("lang") ?
                                            r
                                            .find('.js-input-file input[type="file"]')
                                            .inputFile({
                                                buttonText: "إضافة استئناف",
                                                emptyText: "إضافة استئناف",
                                                descText: "يسمح فقط دوك، دوك، ملفات بدف",
                                                clearText: "واضح",
                                                rtl: !0,
                                            }) :
                                            r
                                            .find('.js-input-file input[type="file"]')
                                            .inputFile({
                                                buttonText: "Add Resume...",
                                                emptyText: "Add Resume...",
                                                descText: "Only DOC, DOCX, PDF files are allowed",
                                                clearText: "Clear",
                                                rtl: !1,
                                            }),
                                            autosize(r.find(".js-textarea")),
                                            e(document).trigger(t.a.triggers.ajax.done, {
                                                html: r[0],
                                            });
                                    } else {
                                        var a = i.find(".form__content");
                                        a.length && a.html(r);
                                    }
                                })
                                .fail(t.a.debug));
                    });
                });
            }.call(this, n(1)));
        },
        function(e, t, n) {
            "use strict";
            (function(e) {
                var t = n(0);
                var i, o, r, s;
                (i = function(e, t) {
                    e.find(".datepicker.active").css(
                        "transform",
                        "translateY(" + t + "px)"
                    );
                }),
                (o = 50);
                e(document).ready(function() {
                    e("body")
                        .on("click", "a.ajax", function(n) {
                            n.preventDefault(), e(".window-overlay").remove();
                            var i = e(this),
                                o = i.data("url");
                            o || (o = i.attr("href")),
                                o &&
                                "#" !== o &&
                                i.data("target") &&
                                (e(".overlay_call").each(function() {
                                        var t = e(this);
                                        t.parents(".window").length || t.remove();
                                    }),
                                    e
                                    .ajax({ url: o })
                                    .done(function(n) {
                                        document.documentElement.scrollTop ||
                                            window.pageYOffset ||
                                            window.scrollY;
                                        e(i.data("target")).before(
                                                '<div class="window-overlay" id="js-window-overlay"></div>'
                                            ),
                                            e(i.data("target")).html(n),
                                            e(i.data("target")).css("display", ""),
                                            e(".window").css("height", "100vh");
                                        var o = e(".form-enquiry__product-title").text();
                                        e("#app_book_car_order_product").val(o);
                                        var r =
                                            e("#app_search_car_termsSearch").prop("checked") ||
                                            e("#catalog_filter_age").prop("checked");
                                        e("#app_book_car_order_age").attr("checked", r),
                                            e(document).trigger(t.a.triggers.ajax.done, {
                                                html: e(i.data("target"))[0],
                                            });
                                    })
                                    .fail(t.a.debug));
                        })
                        .on("click", ".window form .window__close", function(t) {
                            t.preventDefault(),
                                e(".window-overlay").remove(),
                                e("body")
                                .css("transform", "")
                                .css("overflow", "")
                                .css("position", ""),
                                e(".datepickers-container").css("transform", "");
                        });
                });
            }.call(this, n(1)));
        },
        function(e, t, n) {
            (function(e) {
                function t(e, t) {
                    "undefined" != typeof fbq && fbq("trackCustom", e, {}),
                        "undefined" != typeof gtag ?
                        gtag("event", e, { event_category: t }) :
                        "undefined" != typeof ga && ga("send", "event", "reachGoal", e),
                        console.log("reachGoal: " + e);
                }
                e('[href^="tel:"]').on("click", function(e) {
                        return (
                            e.preventDefault(),
                            console.log("CUSTOM_EVENT_1", this.getAttribute("href")),
                            (window.location.href = this.getAttribute("href")),
                            snaptr("track", "CUSTOM_EVENT_1"),
                            t("Click on Phone", "Clicks"), !0
                        );
                    }),
                    e("body").on(
                        "click",
                        '[href*="api.whatsapp.com/send?"]',
                        function() {
                            snaptr("track", "CUSTOM_EVENT_2"),
                                t("Click on WhatsApp", "Clicks");
                        }
                    ),
                    e("body").on(
                        "click",
                        '[href*="facebook.com/sharer.php?"]',
                        function() {
                            t("Click on Facebook", "Clicks");
                        }
                    );
            }.call(this, n(1)));
        },
        function(e, t, n) {
            "use strict";
            (function(e) {
                var t = n(0),
                    i = n(2);

                function o(e) {
                    if (!e.id) return e.text;
                    var t = document.createElement("div");
                    t.className = "select2-results__option-inner";
                    var n = e.element.dataset.img,
                        i = n ?
                        '<span class="select2-results__option-icon"><img src="'
                        .concat(n, '" alt="')
                        .concat(e.text, '"></span>') :
                        "";
                    return (
                        (t.innerHTML = ""
                            .concat(i, '<span class="select2-results__option-text">')
                            .concat(e.text, "</span>")),
                        t
                    );
                }
                var r = function(n, i) {
                    var r = document.createElement("div");
                    (r.className = "select-container"),
                    i.parentNode.insertBefore(r, i),
                        r.appendChild(i);
                    var s = n(i, { width: "", templateResult: o });
                    e(i).on("select2:open", function() {
                        var e = document.querySelector(".select2-dropdown input");
                        e && (e.placeholder = "Search...");
                    });
                    var a = s.dropdown;
                    t.a.breakpoints.onBreakpoint(
                        "xxs xs",
                        function() {
                            (a.$dropdownParent = e(i.parentNode)),
                            r.classList.add("is-inline"),
                                a.$dropdownContainer[0].classList.add("is-inline");
                        },
                        function() {
                            (a.$dropdownParent = e(document.body)),
                            r.classList.remove("is-inline"),
                                a.$dropdownContainer[0].classList.remove("is-inline");
                        }
                    );
                };

                function s(e) {
                    if (!e || !e.querySelector) return !1;
                    try {
                        var o = e.querySelectorAll("select.js-select"),
                            s = e.querySelectorAll(".js-multi-select"),
                            a = e.querySelectorAll(".js-ui-range"),
                            l = e.querySelectorAll(".js-datepicker"),
                            c = e.querySelectorAll(".js-dates-range"),
                            u = e.querySelectorAll(".js-period"),
                            d = [],
                            p = e.querySelector(".form-prices__end");
                        a &&
                            a.length &&
                            Promise.all([n.e("vendors~ui-range"), n.e("ui-range")])
                            .then(n.bind(null, 26))
                            .then(function(e) {
                                return Object(i.a)(a, e.default);
                            })
                            .catch(t.a.debug),
                            s &&
                            s.length &&
                            Promise.all([n.e("vendors~ui-range"), n.e("ui-range")])
                            .then(n.bind(null, 27))
                            .then(function(e) {
                                var n = e.default,
                                    o = Object(i.a)(s, function(e) {
                                        return new n(e, e.dataset);
                                    });
                                return (
                                    t.a.breakpoints.onBreakpoint(
                                        "xxs xs",
                                        function() {
                                            o.forEach(function(e) {
                                                e.options.inline = !0;
                                            });
                                        },
                                        function() {
                                            o.forEach(function(e) {
                                                e.options.inline = !1;
                                            });
                                        }
                                    ),
                                    o
                                );
                            })
                            .catch(t.a.debug),
                            l &&
                            l.length &&
                            Promise.all([n.e("vendors~datepicker"), n.e("datepicker")])
                            .then(n.bind(null, 10))
                            .then(function(e) {
                                return Object(i.a)(l, e.default);
                            })
                            .catch(t.a.debug),
                            c &&
                            c.length &&
                            Promise.all([n.e("vendors~datepicker"), n.e("datepicker")])
                            .then(n.bind(null, 10))
                            .then(function(e) {
                                return Object(i.a)(c, e.range);
                            })
                            .catch(t.a.debug),
                            o &&
                            o.length &&
                            Promise.all([n.e("vendors~select2"), n.e("select2")])
                            .then(n.bind(null, 28))
                            .then(function(e) {
                                var t = e.default;
                                return Object(i.a)(o, function(e) {
                                    return r(t, e);
                                });
                            })
                            .catch(t.a.debug),
                            u &&
                            u.length &&
                            (u.forEach(function(e) {
                                    d.push(e.dataset.max);
                                }),
                                console.log("per inp val", d),
                                u.forEach(function(e) {
                                    if (e.checked && e.dataset.max) {
                                        var t = e.dataset.max;
                                        a[0].dataset.rangeMax = t;
                                        var n = p.value;
                                        d.includes(n) && (p.value = t);
                                    }
                                }));
                    } catch (e) {
                        return t.a.debug(e);
                    }
                    return e;
                }
                s(document), t.a.stream.add(s);
            }.call(this, n(1)));
        },
        function(e, t, n) {
            (function(e, t) {
                var n, i;
                !(function(e, n, i, o) {
                    function r(t, n) {
                        (this.settings = null),
                        (this.options = e.extend({}, r.Defaults, n)),
                        (this.$element = e(t)),
                        (this._handlers = {}),
                        (this._plugins = {}),
                        (this._supress = {}),
                        (this._current = null),
                        (this._speed = null),
                        (this._coordinates = []),
                        (this._breakpoint = null),
                        (this._width = null),
                        (this._items = []),
                        (this._clones = []),
                        (this._mergers = []),
                        (this._widths = []),
                        (this._invalidated = {}),
                        (this._pipe = []),
                        (this._drag = {
                            time: null,
                            target: null,
                            pointer: null,
                            stage: { start: null, current: null },
                            direction: null,
                        }),
                        (this._states = {
                            current: {},
                            tags: {
                                initializing: ["busy"],
                                animating: ["busy"],
                                dragging: ["interacting"],
                            },
                        }),
                        e.each(
                                ["onResize", "onThrottledResize"],
                                e.proxy(function(t, n) {
                                    this._handlers[n] = e.proxy(this[n], this);
                                }, this)
                            ),
                            e.each(
                                r.Plugins,
                                e.proxy(function(e, t) {
                                    this._plugins[e.charAt(0).toLowerCase() + e.slice(1)] = new t(
                                        this
                                    );
                                }, this)
                            ),
                            e.each(
                                r.Workers,
                                e.proxy(function(t, n) {
                                    this._pipe.push({
                                        filter: n.filter,
                                        run: e.proxy(n.run, this),
                                    });
                                }, this)
                            ),
                            this.setup(),
                            this.initialize();
                    }
                    (r.Defaults = {
                        items: 3,
                        loop: !1,
                        center: !1,
                        rewind: !1,
                        checkVisibility: !0,
                        mouseDrag: !0,
                        touchDrag: !0,
                        pullDrag: !0,
                        freeDrag: !1,
                        margin: 0,
                        stagePadding: 0,
                        merge: !1,
                        mergeFit: !0,
                        autoWidth: !1,
                        startPosition: 0,
                        rtl: !1,
                        smartSpeed: 250,
                        fluidSpeed: !1,
                        dragEndSpeed: !1,
                        responsive: {},
                        responsiveRefreshRate: 200,
                        responsiveBaseElement: n,
                        fallbackEasing: "swing",
                        slideTransition: "",
                        info: !1,
                        nestedItemSelector: !1,
                        itemElement: "div",
                        stageElement: "div",
                        refreshClass: "owl-refresh",
                        loadedClass: "owl-loaded",
                        loadingClass: "owl-loading",
                        rtlClass: "owl-rtl",
                        responsiveClass: "owl-responsive",
                        dragClass: "owl-drag",
                        itemClass: "owl-item",
                        stageClass: "owl-stage",
                        stageOuterClass: "owl-stage-outer",
                        grabClass: "owl-grab",
                    }),
                    (r.Width = { Default: "default", Inner: "inner", Outer: "outer" }),
                    (r.Type = { Event: "event", State: "state" }),
                    (r.Plugins = {}),
                    (r.Workers = [{
                            filter: ["width", "settings"],
                            run: function() {
                                this._width = this.$element.width();
                            },
                        },
                        {
                            filter: ["width", "items", "settings"],
                            run: function(e) {
                                e.current =
                                    this._items && this._items[this.relative(this._current)];
                            },
                        },
                        {
                            filter: ["items", "settings"],
                            run: function() {
                                this.$stage.children(".cloned").remove();
                            },
                        },
                        {
                            filter: ["width", "items", "settings"],
                            run: function(e) {
                                var t = this.settings.margin || "",
                                    n = !this.settings.autoWidth,
                                    i = this.settings.rtl,
                                    o = {
                                        width: "auto",
                                        "margin-left": i ? t : "",
                                        "margin-right": i ? "" : t,
                                    };
                                !n && this.$stage.children().css(o), (e.css = o);
                            },
                        },
                        {
                            filter: ["width", "items", "settings"],
                            run: function(e) {
                                var t =
                                    (this.width() / this.settings.items).toFixed(3) -
                                    this.settings.margin,
                                    n = null,
                                    i = this._items.length,
                                    o = !this.settings.autoWidth,
                                    r = [];
                                for (e.items = { merge: !1, width: t }; i--;)
                                    (n = this._mergers[i]),
                                    (n =
                                        (this.settings.mergeFit &&
                                            Math.min(n, this.settings.items)) ||
                                        n),
                                    (e.items.merge = n > 1 || e.items.merge),
                                    (r[i] = o ? t * n : this._items[i].width());
                                this._widths = r;
                            },
                        },
                        {
                            filter: ["items", "settings"],
                            run: function() {
                                var t = [],
                                    n = this._items,
                                    i = this.settings,
                                    o = Math.max(2 * i.items, 4),
                                    r = 2 * Math.ceil(n.length / 2),
                                    s =
                                    i.loop && n.length ? (i.rewind ? o : Math.max(o, r)) : 0,
                                    a = "",
                                    l = "";
                                for (s /= 2; s > 0;)
                                    t.push(this.normalize(t.length / 2, !0)),
                                    (a += n[t[t.length - 1]][0].outerHTML),
                                    t.push(
                                        this.normalize(n.length - 1 - (t.length - 1) / 2, !0)
                                    ),
                                    (l = n[t[t.length - 1]][0].outerHTML + l),
                                    (s -= 1);
                                (this._clones = t),
                                e(a).addClass("cloned").appendTo(this.$stage),
                                    e(l).addClass("cloned").prependTo(this.$stage);
                            },
                        },
                        {
                            filter: ["width", "items", "settings"],
                            run: function() {
                                for (
                                    var e = this.settings.rtl ? 1 : -1,
                                        t = this._clones.length + this._items.length,
                                        n = -1,
                                        i = 0,
                                        o = 0,
                                        r = [];
                                    ++n < t;

                                )
                                    (i = r[n - 1] || 0),
                                    (o =
                                        this._widths[this.relative(n)] + this.settings.margin),
                                    r.push(i + o * e);
                                this._coordinates = r;
                            },
                        },
                        {
                            filter: ["width", "items", "settings"],
                            run: function() {
                                var e = this.settings.stagePadding,
                                    t = this._coordinates,
                                    n = {
                                        width: Math.ceil(Math.abs(t[t.length - 1])) + 2 * e,
                                        "padding-left": e || "",
                                        "padding-right": e || "",
                                    };
                                this.$stage.css(n);
                            },
                        },
                        {
                            filter: ["width", "items", "settings"],
                            run: function(e) {
                                var t = this._coordinates.length,
                                    n = !this.settings.autoWidth,
                                    i = this.$stage.children();
                                if (n && e.items.merge)
                                    for (; t--;)
                                        (e.css.width = this._widths[this.relative(t)]),
                                        i.eq(t).css(e.css);
                                else n && ((e.css.width = e.items.width), i.css(e.css));
                            },
                        },
                        {
                            filter: ["items"],
                            run: function() {
                                this._coordinates.length < 1 &&
                                    this.$stage.removeAttr("style");
                            },
                        },
                        {
                            filter: ["width", "items", "settings"],
                            run: function(e) {
                                (e.current = e.current ?
                                    this.$stage.children().index(e.current) :
                                    0),
                                (e.current = Math.max(
                                    this.minimum(),
                                    Math.min(this.maximum(), e.current)
                                )),
                                this.reset(e.current);
                            },
                        },
                        {
                            filter: ["position"],
                            run: function() {
                                this.animate(this.coordinates(this._current));
                            },
                        },
                        {
                            filter: ["width", "position", "items", "settings"],
                            run: function() {
                                var e,
                                    t,
                                    n,
                                    i,
                                    o = this.settings.rtl ? 1 : -1,
                                    r = 2 * this.settings.stagePadding,
                                    s = this.coordinates(this.current()) + r,
                                    a = s + this.width() * o,
                                    l = [];
                                for (n = 0, i = this._coordinates.length; n < i; n++)
                                    (e = this._coordinates[n - 1] || 0),
                                    (t = Math.abs(this._coordinates[n]) + r * o),
                                    ((this.op(e, "<=", s) && this.op(e, ">", a)) ||
                                        (this.op(t, "<", s) && this.op(t, ">", a))) &&
                                    l.push(n);
                                this.$stage.children(".active").removeClass("active"),
                                    this.$stage
                                    .children(":eq(" + l.join("), :eq(") + ")")
                                    .addClass("active"),
                                    this.$stage.children(".center").removeClass("center"),
                                    this.settings.center &&
                                    this.$stage
                                    .children()
                                    .eq(this.current())
                                    .addClass("center");
                            },
                        },
                    ]),
                    (r.prototype.initializeStage = function() {
                        (this.$stage = this.$element.find(
                            "." + this.settings.stageClass
                        )),
                        this.$stage.length ||
                            (this.$element.addClass(this.options.loadingClass),
                                (this.$stage = e("<" + this.settings.stageElement + ">", {
                                    class: this.settings.stageClass,
                                }).wrap(
                                    e("<div/>", { class: this.settings.stageOuterClass })
                                )),
                                this.$element.append(this.$stage.parent()));
                    }),
                    (r.prototype.initializeItems = function() {
                        var t = this.$element.find(".owl-item");
                        if (t.length)
                            return (
                                (this._items = t.get().map(function(t) {
                                    return e(t);
                                })),
                                (this._mergers = this._items.map(function() {
                                    return 1;
                                })),
                                void this.refresh()
                            );
                        this.replace(this.$element.children().not(this.$stage.parent())),
                            this.isVisible() ? this.refresh() : this.invalidate("width"),
                            this.$element
                            .removeClass(this.options.loadingClass)
                            .addClass(this.options.loadedClass);
                    }),
                    (r.prototype.initialize = function() {
                        var e, t, n;
                        (this.enter("initializing"),
                            this.trigger("initialize"),
                            this.$element.toggleClass(
                                this.settings.rtlClass,
                                this.settings.rtl
                            ),
                            this.settings.autoWidth && !this.is("pre-loading")) &&
                        ((e = this.$element.find("img")),
                            (t = this.settings.nestedItemSelector ?
                                "." + this.settings.nestedItemSelector :
                                void 0),
                            (n = this.$element.children(t).width()),
                            e.length && n <= 0 && this.preloadAutoWidthImages(e));
                        this.initializeStage(),
                            this.initializeItems(),
                            this.registerEventHandlers(),
                            this.leave("initializing"),
                            this.trigger("initialized");
                    }),
                    (r.prototype.isVisible = function() {
                        return (!this.settings.checkVisibility || this.$element.is(":visible"));
                    }),
                    (r.prototype.setup = function() {
                        var t = this.viewport(),
                            n = this.options.responsive,
                            i = -1,
                            o = null;
                        n
                            ?
                            (e.each(n, function(e) {
                                    e <= t && e > i && (i = Number(e));
                                }),
                                "function" ==
                                typeof(o = e.extend({}, this.options, n[i]))
                                .stagePadding && (o.stagePadding = o.stagePadding()),
                                delete o.responsive,
                                o.responsiveClass &&
                                this.$element.attr(
                                    "class",
                                    this.$element
                                    .attr("class")
                                    .replace(
                                        new RegExp(
                                            "(" + this.options.responsiveClass + "-)\\S+\\s",
                                            "g"
                                        ),
                                        "$1" + i
                                    )
                                )) :
                            (o = e.extend({}, this.options)),
                            this.trigger("change", {
                                property: { name: "settings", value: o },
                            }),
                            (this._breakpoint = i),
                            (this.settings = o),
                            this.invalidate("settings"),
                            this.trigger("changed", {
                                property: { name: "settings", value: this.settings },
                            });
                    }),
                    (r.prototype.optionsLogic = function() {
                        this.settings.autoWidth &&
                            ((this.settings.stagePadding = !1), (this.settings.merge = !1));
                    }),
                    (r.prototype.prepare = function(t) {
                        var n = this.trigger("prepare", { content: t });
                        return (
                            n.data ||
                            (n.data = e("<" + this.settings.itemElement + "/>")
                                .addClass(this.options.itemClass)
                                .append(t)),
                            this.trigger("prepared", { content: n.data }),
                            n.data
                        );
                    }),
                    (r.prototype.update = function() {
                        for (
                            var t = 0,
                                n = this._pipe.length,
                                i = e.proxy(function(e) {
                                    return this[e];
                                }, this._invalidated),
                                o = {}; t < n;

                        )
                            (this._invalidated.all ||
                                e.grep(this._pipe[t].filter, i).length > 0) &&
                            this._pipe[t].run(o),
                            t++;
                        (this._invalidated = {}), !this.is("valid") && this.enter("valid");
                    }),
                    (r.prototype.width = function(e) {
                        switch ((e = e || r.Width.Default)) {
                            case r.Width.Inner:
                            case r.Width.Outer:
                                return this._width;
                            default:
                                return (
                                    this._width -
                                    2 * this.settings.stagePadding +
                                    this.settings.margin
                                );
                        }
                    }),
                    (r.prototype.refresh = function() {
                        this.enter("refreshing"),
                            this.trigger("refresh"),
                            this.setup(),
                            this.optionsLogic(),
                            this.$element.addClass(this.options.refreshClass),
                            this.update(),
                            this.$element.removeClass(this.options.refreshClass),
                            this.leave("refreshing"),
                            this.trigger("refreshed");
                    }),
                    (r.prototype.onThrottledResize = function() {
                        n.clearTimeout(this.resizeTimer),
                            (this.resizeTimer = n.setTimeout(
                                this._handlers.onResize,
                                this.settings.responsiveRefreshRate
                            ));
                    }),
                    (r.prototype.onResize = function() {
                        return (!!this._items.length &&
                            this._width !== this.$element.width() &&
                            !!this.isVisible() &&
                            (this.enter("resizing"),
                                this.trigger("resize").isDefaultPrevented() ?
                                (this.leave("resizing"), !1) :
                                (this.invalidate("width"),
                                    this.refresh(),
                                    this.leave("resizing"),
                                    void this.trigger("resized")))
                        );
                    }),
                    (r.prototype.registerEventHandlers = function() {
                        e.support.transition &&
                            this.$stage.on(
                                e.support.transition.end + ".owl.core",
                                e.proxy(this.onTransitionEnd, this)
                            ), !1 !== this.settings.responsive &&
                            this.on(n, "resize", this._handlers.onThrottledResize),
                            this.settings.mouseDrag &&
                            (this.$element.addClass(this.options.dragClass),
                                this.$stage.on(
                                    "mousedown.owl.core",
                                    e.proxy(this.onDragStart, this)
                                ),
                                this.$stage.on(
                                    "dragstart.owl.core selectstart.owl.core",
                                    function() {
                                        return !1;
                                    }
                                )),
                            this.settings.touchDrag &&
                            (this.$stage.on(
                                    "touchstart.owl.core",
                                    e.proxy(this.onDragStart, this)
                                ),
                                this.$stage.on(
                                    "touchcancel.owl.core",
                                    e.proxy(this.onDragEnd, this)
                                ));
                    }),
                    (r.prototype.onDragStart = function(t) {
                        var n = null;
                        3 !== t.which &&
                            (e.support.transform ?
                                (n = {
                                    x: (n = this.$stage
                                        .css("transform")
                                        .replace(/.*\(|\)| /g, "")
                                        .split(","))[16 === n.length ? 12 : 4],
                                    y: n[16 === n.length ? 13 : 5],
                                }) :
                                ((n = this.$stage.position()),
                                    (n = {
                                        x: this.settings.rtl ?
                                            n.left +
                                            this.$stage.width() -
                                            this.width() +
                                            this.settings.margin :
                                            n.left,
                                        y: n.top,
                                    })),
                                this.is("animating") &&
                                (e.support.transform ? this.animate(n.x) : this.$stage.stop(),
                                    this.invalidate("position")),
                                this.$element.toggleClass(
                                    this.options.grabClass,
                                    "mousedown" === t.type
                                ),
                                this.speed(0),
                                (this._drag.time = new Date().getTime()),
                                (this._drag.target = e(t.target)),
                                (this._drag.stage.start = n),
                                (this._drag.stage.current = n),
                                (this._drag.pointer = this.pointer(t)),
                                e(i).on(
                                    "mouseup.owl.core touchend.owl.core",
                                    e.proxy(this.onDragEnd, this)
                                ),
                                e(i).one(
                                    "mousemove.owl.core touchmove.owl.core",
                                    e.proxy(function(t) {
                                        var n = this.difference(
                                            this._drag.pointer,
                                            this.pointer(t)
                                        );
                                        e(i).on(
                                                "mousemove.owl.core touchmove.owl.core",
                                                e.proxy(this.onDragMove, this)
                                            ),
                                            (Math.abs(n.x) < Math.abs(n.y) && this.is("valid")) ||
                                            (t.preventDefault(),
                                                this.enter("dragging"),
                                                this.trigger("drag"));
                                    }, this)
                                ));
                    }),
                    (r.prototype.onDragMove = function(e) {
                        var t = null,
                            n = null,
                            i = null,
                            o = this.difference(this._drag.pointer, this.pointer(e)),
                            r = this.difference(this._drag.stage.start, o);
                        this.is("dragging") &&
                            (e.preventDefault(),
                                this.settings.loop ?
                                ((t = this.coordinates(this.minimum())),
                                    (n = this.coordinates(this.maximum() + 1) - t),
                                    (r.x = ((((r.x - t) % n) + n) % n) + t)) :
                                ((t = this.settings.rtl ?
                                        this.coordinates(this.maximum()) :
                                        this.coordinates(this.minimum())),
                                    (n = this.settings.rtl ?
                                        this.coordinates(this.minimum()) :
                                        this.coordinates(this.maximum())),
                                    (i = this.settings.pullDrag ? (-1 * o.x) / 5 : 0),
                                    (r.x = Math.max(Math.min(r.x, t + i), n + i))),
                                (this._drag.stage.current = r),
                                this.animate(r.x));
                    }),
                    (r.prototype.onDragEnd = function(t) {
                        var n = this.difference(this._drag.pointer, this.pointer(t)),
                            o = this._drag.stage.current,
                            r = (n.x > 0) ^ this.settings.rtl ? "left" : "right";
                        e(i).off(".owl.core"),
                            this.$element.removeClass(this.options.grabClass),
                            ((0 !== n.x && this.is("dragging")) || !this.is("valid")) &&
                            (this.speed(
                                    this.settings.dragEndSpeed || this.settings.smartSpeed
                                ),
                                this.current(
                                    this.closest(o.x, 0 !== n.x ? r : this._drag.direction)
                                ),
                                this.invalidate("position"),
                                this.update(),
                                (this._drag.direction = r),
                                (Math.abs(n.x) > 3 ||
                                    new Date().getTime() - this._drag.time > 300) &&
                                this._drag.target.one("click.owl.core", function() {
                                    return !1;
                                })),
                            this.is("dragging") &&
                            (this.leave("dragging"), this.trigger("dragged"));
                    }),
                    (r.prototype.closest = function(t, n) {
                        var i = -1,
                            o = this.width(),
                            r = this.coordinates();
                        return (
                            this.settings.freeDrag ||
                            e.each(
                                r,
                                e.proxy(function(e, s) {
                                    return (
                                        "left" === n && t > s - 30 && t < s + 30 ?
                                        (i = e) :
                                        "right" === n && t > s - o - 30 && t < s - o + 30 ?
                                        (i = e + 1) :
                                        this.op(t, "<", s) &&
                                        this.op(
                                            t,
                                            ">",
                                            void 0 !== r[e + 1] ? r[e + 1] : s - o
                                        ) &&
                                        (i = "left" === n ? e + 1 : e), -1 === i
                                    );
                                }, this)
                            ),
                            this.settings.loop ||
                            (this.op(t, ">", r[this.minimum()]) ?
                                (i = t = this.minimum()) :
                                this.op(t, "<", r[this.maximum()]) &&
                                (i = t = this.maximum())),
                            i
                        );
                    }),
                    (r.prototype.animate = function(t) {
                        var n = this.speed() > 0;
                        this.is("animating") && this.onTransitionEnd(),
                            n && (this.enter("animating"), this.trigger("translate")),
                            e.support.transform3d && e.support.transition ?
                            this.$stage.css({
                                transform: "translate3d(" + t + "px,0px,0px)",
                                transition: this.speed() / 1e3 +
                                    "s" +
                                    (this.settings.slideTransition ?
                                        " " + this.settings.slideTransition :
                                        ""),
                            }) :
                            n ?
                            this.$stage.animate({ left: t + "px" },
                                this.speed(),
                                this.settings.fallbackEasing,
                                e.proxy(this.onTransitionEnd, this)
                            ) :
                            this.$stage.css({ left: t + "px" });
                    }),
                    (r.prototype.is = function(e) {
                        return this._states.current[e] && this._states.current[e] > 0;
                    }),
                    (r.prototype.current = function(e) {
                        if (void 0 === e) return this._current;
                        if (0 !== this._items.length) {
                            if (((e = this.normalize(e)), this._current !== e)) {
                                var t = this.trigger("change", {
                                    property: { name: "position", value: e },
                                });
                                void 0 !== t.data && (e = this.normalize(t.data)),
                                    (this._current = e),
                                    this.invalidate("position"),
                                    this.trigger("changed", {
                                        property: { name: "position", value: this._current },
                                    });
                            }
                            return this._current;
                        }
                    }),
                    (r.prototype.invalidate = function(t) {
                        return (
                            "string" === e.type(t) &&
                            ((this._invalidated[t] = !0),
                                this.is("valid") && this.leave("valid")),
                            e.map(this._invalidated, function(e, t) {
                                return t;
                            })
                        );
                    }),
                    (r.prototype.reset = function(e) {
                        void 0 !== (e = this.normalize(e)) &&
                            ((this._speed = 0),
                                (this._current = e),
                                this.suppress(["translate", "translated"]),
                                this.animate(this.coordinates(e)),
                                this.release(["translate", "translated"]));
                    }),
                    (r.prototype.normalize = function(e, t) {
                        var n = this._items.length,
                            i = t ? 0 : this._clones.length;
                        return (!this.isNumeric(e) || n < 1 ?
                            (e = void 0) :
                            (e < 0 || e >= n + i) &&
                            (e = ((((e - i / 2) % n) + n) % n) + i / 2),
                            e
                        );
                    }),
                    (r.prototype.relative = function(e) {
                        return (e -= this._clones.length / 2), this.normalize(e, !0);
                    }),
                    (r.prototype.maximum = function(e) {
                        var t,
                            n,
                            i,
                            o = this.settings,
                            r = this._coordinates.length;
                        if (o.loop) r = this._clones.length / 2 + this._items.length - 1;
                        else if (o.autoWidth || o.merge) {
                            if ((t = this._items.length))
                                for (
                                    n = this._items[--t].width(), i = this.$element.width(); t-- &&
                                    !((n += this._items[t].width() + this.settings.margin) > i);

                                );
                            r = t + 1;
                        } else
                            r = o.center ?
                            this._items.length - 1 :
                            this._items.length - o.items;
                        return e && (r -= this._clones.length / 2), Math.max(r, 0);
                    }),
                    (r.prototype.minimum = function(e) {
                        return e ? 0 : this._clones.length / 2;
                    }),
                    (r.prototype.items = function(e) {
                        return void 0 === e ?
                            this._items.slice() :
                            ((e = this.normalize(e, !0)), this._items[e]);
                    }),
                    (r.prototype.mergers = function(e) {
                        return void 0 === e ?
                            this._mergers.slice() :
                            ((e = this.normalize(e, !0)), this._mergers[e]);
                    }),
                    (r.prototype.clones = function(t) {
                        var n = this._clones.length / 2,
                            i = n + this._items.length,
                            o = function(e) {
                                return e % 2 == 0 ? i + e / 2 : n - (e + 1) / 2;
                            };
                        return void 0 === t ?
                            e.map(this._clones, function(e, t) {
                                return o(t);
                            }) :
                            e.map(this._clones, function(e, n) {
                                return e === t ? o(n) : null;
                            });
                    }),
                    (r.prototype.speed = function(e) {
                        return void 0 !== e && (this._speed = e), this._speed;
                    }),
                    (r.prototype.coordinates = function(t) {
                        var n,
                            i = 1,
                            o = t - 1;
                        return void 0 === t ?
                            e.map(
                                this._coordinates,
                                e.proxy(function(e, t) {
                                    return this.coordinates(t);
                                }, this)
                            ) :
                            (this.settings.center ?
                                (this.settings.rtl && ((i = -1), (o = t + 1)),
                                    (n = this._coordinates[t]),
                                    (n +=
                                        ((this.width() - n + (this._coordinates[o] || 0)) / 2) *
                                        i)) :
                                (n = this._coordinates[o] || 0),
                                (n = Math.ceil(n)));
                    }),
                    (r.prototype.duration = function(e, t, n) {
                        return 0 === n ?
                            0 :
                            Math.min(Math.max(Math.abs(t - e), 1), 6) *
                            Math.abs(n || this.settings.smartSpeed);
                    }),
                    (r.prototype.to = function(e, t) {
                        var n = this.current(),
                            i = null,
                            o = e - this.relative(n),
                            r = (o > 0) - (o < 0),
                            s = this._items.length,
                            a = this.minimum(),
                            l = this.maximum();
                        this.settings.loop ?
                            (!this.settings.rewind &&
                                Math.abs(o) > s / 2 &&
                                (o += -1 * r * s),
                                (i = (((((e = n + o) - a) % s) + s) % s) + a) !== e &&
                                i - o <= l &&
                                i - o > 0 &&
                                ((n = i - o), (e = i), this.reset(n))) :
                            (e = this.settings.rewind ?
                                ((e % (l += 1)) + l) % l :
                                Math.max(a, Math.min(l, e))),
                            this.speed(this.duration(n, e, t)),
                            this.current(e),
                            this.isVisible() && this.update();
                    }),
                    (r.prototype.next = function(e) {
                        (e = e || !1), this.to(this.relative(this.current()) + 1, e);
                    }),
                    (r.prototype.prev = function(e) {
                        (e = e || !1), this.to(this.relative(this.current()) - 1, e);
                    }),
                    (r.prototype.onTransitionEnd = function(e) {
                        if (
                            void 0 !== e &&
                            (e.stopPropagation(),
                                (e.target || e.srcElement || e.originalTarget) !==
                                this.$stage.get(0))
                        )
                            return !1;
                        this.leave("animating"), this.trigger("translated");
                    }),
                    (r.prototype.viewport = function() {
                        var t;
                        return (
                            this.options.responsiveBaseElement !== n ?
                            (t = e(this.options.responsiveBaseElement).width()) :
                            n.innerWidth ?
                            (t = n.innerWidth) :
                            i.documentElement && i.documentElement.clientWidth ?
                            (t = i.documentElement.clientWidth) :
                            console.warn("Can not detect viewport width."),
                            t
                        );
                    }),
                    (r.prototype.replace = function(n) {
                        this.$stage.empty(),
                            (this._items = []),
                            n && (n = n instanceof t ? n : e(n)),
                            this.settings.nestedItemSelector &&
                            (n = n.find("." + this.settings.nestedItemSelector)),
                            n
                            .filter(function() {
                                return 1 === this.nodeType;
                            })
                            .each(
                                e.proxy(function(e, t) {
                                    (t = this.prepare(t)),
                                    this.$stage.append(t),
                                        this._items.push(t),
                                        this._mergers.push(
                                            1 *
                                            t
                                            .find("[data-merge]")
                                            .addBack("[data-merge]")
                                            .attr("data-merge") || 1
                                        );
                                }, this)
                            ),
                            this.reset(
                                this.isNumeric(this.settings.startPosition) ?
                                this.settings.startPosition :
                                0
                            ),
                            this.invalidate("items");
                    }),
                    (r.prototype.add = function(n, i) {
                        var o = this.relative(this._current);
                        (i = void 0 === i ? this._items.length : this.normalize(i, !0)),
                        (n = n instanceof t ? n : e(n)),
                        this.trigger("add", { content: n, position: i }),
                            (n = this.prepare(n)),
                            0 === this._items.length || i === this._items.length ?
                            (0 === this._items.length && this.$stage.append(n),
                                0 !== this._items.length && this._items[i - 1].after(n),
                                this._items.push(n),
                                this._mergers.push(
                                    1 *
                                    n
                                    .find("[data-merge]")
                                    .addBack("[data-merge]")
                                    .attr("data-merge") || 1
                                )) :
                            (this._items[i].before(n),
                                this._items.splice(i, 0, n),
                                this._mergers.splice(
                                    i,
                                    0,
                                    1 *
                                    n
                                    .find("[data-merge]")
                                    .addBack("[data-merge]")
                                    .attr("data-merge") || 1
                                )),
                            this._items[o] && this.reset(this._items[o].index()),
                            this.invalidate("items"),
                            this.trigger("added", { content: n, position: i });
                    }),
                    (r.prototype.remove = function(e) {
                        void 0 !== (e = this.normalize(e, !0)) &&
                            (this.trigger("remove", {
                                    content: this._items[e],
                                    position: e,
                                }),
                                this._items[e].remove(),
                                this._items.splice(e, 1),
                                this._mergers.splice(e, 1),
                                this.invalidate("items"),
                                this.trigger("removed", { content: null, position: e }));
                    }),
                    (r.prototype.preloadAutoWidthImages = function(t) {
                        t.each(
                            e.proxy(function(t, n) {
                                this.enter("pre-loading"),
                                    (n = e(n)),
                                    e(new Image())
                                    .one(
                                        "load",
                                        e.proxy(function(e) {
                                            n.attr("src", e.target.src),
                                                n.css("opacity", 1),
                                                this.leave("pre-loading"), !this.is("pre-loading") &&
                                                !this.is("initializing") &&
                                                this.refresh();
                                        }, this)
                                    )
                                    .attr(
                                        "src",
                                        n.attr("src") ||
                                        n.attr("data-src") ||
                                        n.attr("data-src-retina")
                                    );
                            }, this)
                        );
                    }),
                    (r.prototype.destroy = function() {
                        for (var t in (this.$element.off(".owl.core"),
                                this.$stage.off(".owl.core"),
                                e(i).off(".owl.core"), !1 !== this.settings.responsive &&
                                (n.clearTimeout(this.resizeTimer),
                                    this.off(n, "resize", this._handlers.onThrottledResize)),
                                this._plugins))
                            this._plugins[t].destroy();
                        this.$stage.children(".cloned").remove(),
                            this.$stage.unwrap(),
                            this.$stage.children().contents().unwrap(),
                            this.$stage.children().unwrap(),
                            this.$stage.remove(),
                            this.$element
                            .removeClass(this.options.refreshClass)
                            .removeClass(this.options.loadingClass)
                            .removeClass(this.options.loadedClass)
                            .removeClass(this.options.rtlClass)
                            .removeClass(this.options.dragClass)
                            .removeClass(this.options.grabClass)
                            .attr(
                                "class",
                                this.$element
                                .attr("class")
                                .replace(
                                    new RegExp(
                                        this.options.responsiveClass + "-\\S+\\s",
                                        "g"
                                    ),
                                    ""
                                )
                            )
                            .removeData("owl.carousel");
                    }),
                    (r.prototype.op = function(e, t, n) {
                        var i = this.settings.rtl;
                        switch (t) {
                            case "<":
                                return i ? e > n : e < n;
                            case ">":
                                return i ? e < n : e > n;
                            case ">=":
                                return i ? e <= n : e >= n;
                            case "<=":
                                return i ? e >= n : e <= n;
                        }
                    }),
                    (r.prototype.on = function(e, t, n, i) {
                        e.addEventListener ?
                            e.addEventListener(t, n, i) :
                            e.attachEvent && e.attachEvent("on" + t, n);
                    }),
                    (r.prototype.off = function(e, t, n, i) {
                        e.removeEventListener ?
                            e.removeEventListener(t, n, i) :
                            e.detachEvent && e.detachEvent("on" + t, n);
                    }),
                    (r.prototype.trigger = function(t, n, i, o, s) {
                        var a = {
                                item: { count: this._items.length, index: this.current() },
                            },
                            l = e.camelCase(
                                e
                                .grep(["on", t, i], function(e) {
                                    return e;
                                })
                                .join("-")
                                .toLowerCase()
                            ),
                            c = e.Event(
                                [t, "owl", i || "carousel"].join(".").toLowerCase(),
                                e.extend({ relatedTarget: this }, a, n)
                            );
                        return (
                            this._supress[t] ||
                            (e.each(this._plugins, function(e, t) {
                                    t.onTrigger && t.onTrigger(c);
                                }),
                                this.register({ type: r.Type.Event, name: t }),
                                this.$element.trigger(c),
                                this.settings &&
                                "function" == typeof this.settings[l] &&
                                this.settings[l].call(this, c)),
                            c
                        );
                    }),
                    (r.prototype.enter = function(t) {
                        e.each(
                            [t].concat(this._states.tags[t] || []),
                            e.proxy(function(e, t) {
                                void 0 === this._states.current[t] &&
                                    (this._states.current[t] = 0),
                                    this._states.current[t]++;
                            }, this)
                        );
                    }),
                    (r.prototype.leave = function(t) {
                        e.each(
                            [t].concat(this._states.tags[t] || []),
                            e.proxy(function(e, t) {
                                this._states.current[t]--;
                            }, this)
                        );
                    }),
                    (r.prototype.register = function(t) {
                        if (t.type === r.Type.Event) {
                            if (
                                (e.event.special[t.name] || (e.event.special[t.name] = {}), !e.event.special[t.name].owl)
                            ) {
                                var n = e.event.special[t.name]._default;
                                (e.event.special[t.name]._default = function(e) {
                                    return !n ||
                                        !n.apply ||
                                        (e.namespace && -1 !== e.namespace.indexOf("owl")) ?
                                        e.namespace && e.namespace.indexOf("owl") > -1 :
                                        n.apply(this, arguments);
                                }),
                                (e.event.special[t.name].owl = !0);
                            }
                        } else
                            t.type === r.Type.State &&
                            (this._states.tags[t.name] ?
                                (this._states.tags[t.name] = this._states.tags[
                                    t.name
                                ].concat(t.tags)) :
                                (this._states.tags[t.name] = t.tags),
                                (this._states.tags[t.name] = e.grep(
                                    this._states.tags[t.name],
                                    e.proxy(function(n, i) {
                                        return e.inArray(n, this._states.tags[t.name]) === i;
                                    }, this)
                                )));
                    }),
                    (r.prototype.suppress = function(t) {
                        e.each(
                            t,
                            e.proxy(function(e, t) {
                                this._supress[t] = !0;
                            }, this)
                        );
                    }),
                    (r.prototype.release = function(t) {
                        e.each(
                            t,
                            e.proxy(function(e, t) {
                                delete this._supress[t];
                            }, this)
                        );
                    }),
                    (r.prototype.pointer = function(e) {
                        var t = { x: null, y: null };
                        return (
                            (e =
                                (e = e.originalEvent || e || n.event).touches &&
                                e.touches.length ?
                                e.touches[0] :
                                e.changedTouches && e.changedTouches.length ?
                                e.changedTouches[0] :
                                e).pageX ?
                            ((t.x = e.pageX), (t.y = e.pageY)) :
                            ((t.x = e.clientX), (t.y = e.clientY)),
                            t
                        );
                    }),
                    (r.prototype.isNumeric = function(e) {
                        return !isNaN(parseFloat(e));
                    }),
                    (r.prototype.difference = function(e, t) {
                        return { x: e.x - t.x, y: e.y - t.y };
                    }),
                    (e.fn.owlCarousel = function(t) {
                        var n = Array.prototype.slice.call(arguments, 1);
                        return this.each(function() {
                            var i = e(this),
                                o = i.data("owl.carousel");
                            o ||
                                ((o = new r(this, "object" == typeof t && t)),
                                    i.data("owl.carousel", o),
                                    e.each(
                                        [
                                            "next",
                                            "prev",
                                            "to",
                                            "destroy",
                                            "refresh",
                                            "replace",
                                            "add",
                                            "remove",
                                        ],
                                        function(t, n) {
                                            o.register({ type: r.Type.Event, name: n }),
                                                o.$element.on(
                                                    n + ".owl.carousel.core",
                                                    e.proxy(function(e) {
                                                        e.namespace &&
                                                            e.relatedTarget !== this &&
                                                            (this.suppress([n]),
                                                                o[n].apply(this, [].slice.call(arguments, 1)),
                                                                this.release([n]));
                                                    }, o)
                                                );
                                        }
                                    )),
                                "string" == typeof t &&
                                "_" !== t.charAt(0) &&
                                o[t].apply(o, n);
                        });
                    }),
                    (e.fn.owlCarousel.Constructor = r);
                })(window.Zepto || e, window, document),
                (function(e, t, n, i) {
                    var o = function(t) {
                        (this._core = t),
                        (this._interval = null),
                        (this._visible = null),
                        (this._handlers = {
                            "initialized.owl.carousel": e.proxy(function(e) {
                                e.namespace &&
                                    this._core.settings.autoRefresh &&
                                    this.watch();
                            }, this),
                        }),
                        (this._core.options = e.extend({},
                            o.Defaults,
                            this._core.options
                        )),
                        this._core.$element.on(this._handlers);
                    };
                    (o.Defaults = { autoRefresh: !0, autoRefreshInterval: 500 }),
                    (o.prototype.watch = function() {
                        this._interval ||
                            ((this._visible = this._core.isVisible()),
                                (this._interval = t.setInterval(
                                    e.proxy(this.refresh, this),
                                    this._core.settings.autoRefreshInterval
                                )));
                    }),
                    (o.prototype.refresh = function() {
                        this._core.isVisible() !== this._visible &&
                            ((this._visible = !this._visible),
                                this._core.$element.toggleClass("owl-hidden", !this._visible),
                                this._visible &&
                                this._core.invalidate("width") &&
                                this._core.refresh());
                    }),
                    (o.prototype.destroy = function() {
                        var e, n;
                        for (e in (t.clearInterval(this._interval), this._handlers))
                            this._core.$element.off(e, this._handlers[e]);
                        for (n in Object.getOwnPropertyNames(this))
                            "function" != typeof this[n] && (this[n] = null);
                    }),
                    (e.fn.owlCarousel.Constructor.Plugins.AutoRefresh = o);
                })(window.Zepto || e, window, document),
                (function(e, t, n, i) {
                    var o = function(t) {
                        (this._core = t),
                        (this._loaded = []),
                        (this._handlers = {
                            "initialized.owl.carousel change.owl.carousel resized.owl.carousel": e.proxy(function(t) {
                                if (
                                    t.namespace &&
                                    this._core.settings &&
                                    this._core.settings.lazyLoad &&
                                    ((t.property && "position" == t.property.name) ||
                                        "initialized" == t.type)
                                ) {
                                    var n = this._core.settings,
                                        i = (n.center && Math.ceil(n.items / 2)) || n.items,
                                        o = (n.center && -1 * i) || 0,
                                        r =
                                        (t.property && void 0 !== t.property.value ?
                                            t.property.value :
                                            this._core.current()) + o,
                                        s = this._core.clones().length,
                                        a = e.proxy(function(e, t) {
                                            this.load(t);
                                        }, this);
                                    for (
                                        n.lazyLoadEager > 0 &&
                                        ((i += n.lazyLoadEager),
                                            n.loop && ((r -= n.lazyLoadEager), i++)); o++ < i;

                                    )
                                        this.load(s / 2 + this._core.relative(r)),
                                        s &&
                                        e.each(
                                            this._core.clones(this._core.relative(r)),
                                            a
                                        ),
                                        r++;
                                }
                            }, this),
                        }),
                        (this._core.options = e.extend({},
                            o.Defaults,
                            this._core.options
                        )),
                        this._core.$element.on(this._handlers);
                    };
                    (o.Defaults = { lazyLoad: !1, lazyLoadEager: 0 }),
                    (o.prototype.load = function(n) {
                        var i = this._core.$stage.children().eq(n),
                            o = i && i.find(".owl-lazy");
                        !o ||
                            e.inArray(i.get(0), this._loaded) > -1 ||
                            (o.each(
                                    e.proxy(function(n, i) {
                                        var o,
                                            r = e(i),
                                            s =
                                            (t.devicePixelRatio > 1 &&
                                                r.attr("data-src-retina")) ||
                                            r.attr("data-src") ||
                                            r.attr("data-srcset");
                                        this._core.trigger(
                                                "load", { element: r, url: s },
                                                "lazy"
                                            ),
                                            r.is("img") ?
                                            r
                                            .one(
                                                "load.owl.lazy",
                                                e.proxy(function() {
                                                    r.css("opacity", 1),
                                                        this._core.trigger(
                                                            "loaded", { element: r, url: s },
                                                            "lazy"
                                                        );
                                                }, this)
                                            )
                                            .attr("src", s) :
                                            r.is("source") ?
                                            r
                                            .one(
                                                "load.owl.lazy",
                                                e.proxy(function() {
                                                    this._core.trigger(
                                                        "loaded", { element: r, url: s },
                                                        "lazy"
                                                    );
                                                }, this)
                                            )
                                            .attr("srcset", s) :
                                            (((o = new Image()).onload = e.proxy(function() {
                                                    r.css({
                                                            "background-image": 'url("' + s + '")',
                                                            opacity: "1",
                                                        }),
                                                        this._core.trigger(
                                                            "loaded", { element: r, url: s },
                                                            "lazy"
                                                        );
                                                }, this)),
                                                (o.src = s));
                                    }, this)
                                ),
                                this._loaded.push(i.get(0)));
                    }),
                    (o.prototype.destroy = function() {
                        var e, t;
                        for (e in this.handlers)
                            this._core.$element.off(e, this.handlers[e]);
                        for (t in Object.getOwnPropertyNames(this))
                            "function" != typeof this[t] && (this[t] = null);
                    }),
                    (e.fn.owlCarousel.Constructor.Plugins.Lazy = o);
                })(window.Zepto || e, window, document),
                (function(e, t, n, i) {
                    var o = function(n) {
                        (this._core = n),
                        (this._previousHeight = null),
                        (this._handlers = {
                            "initialized.owl.carousel refreshed.owl.carousel": e.proxy(
                                function(e) {
                                    e.namespace &&
                                        this._core.settings.autoHeight &&
                                        this.update();
                                },
                                this
                            ),
                            "changed.owl.carousel": e.proxy(function(e) {
                                e.namespace &&
                                    this._core.settings.autoHeight &&
                                    "position" === e.property.name &&
                                    this.update();
                            }, this),
                            "loaded.owl.lazy": e.proxy(function(e) {
                                e.namespace &&
                                    this._core.settings.autoHeight &&
                                    e.element
                                    .closest("." + this._core.settings.itemClass)
                                    .index() === this._core.current() &&
                                    this.update();
                            }, this),
                        }),
                        (this._core.options = e.extend({},
                            o.Defaults,
                            this._core.options
                        )),
                        this._core.$element.on(this._handlers),
                            (this._intervalId = null);
                        var i = this;
                        e(t).on("load", function() {
                                i._core.settings.autoHeight && i.update();
                            }),
                            e(t).resize(function() {
                                i._core.settings.autoHeight &&
                                    (null != i._intervalId && clearTimeout(i._intervalId),
                                        (i._intervalId = setTimeout(function() {
                                            i.update();
                                        }, 250)));
                            });
                    };
                    (o.Defaults = { autoHeight: !1, autoHeightClass: "owl-height" }),
                    (o.prototype.update = function() {
                        var t = this._core._current,
                            n = t + this._core.settings.items,
                            i = this._core.settings.lazyLoad,
                            o = this._core.$stage.children().toArray().slice(t, n),
                            r = [],
                            s = 0;
                        e.each(o, function(t, n) {
                                r.push(e(n).height());
                            }),
                            (s = Math.max.apply(null, r)) <= 1 &&
                            i &&
                            this._previousHeight &&
                            (s = this._previousHeight),
                            (this._previousHeight = s),
                            this._core.$stage
                            .parent()
                            .height(s)
                            .addClass(this._core.settings.autoHeightClass);
                    }),
                    (o.prototype.destroy = function() {
                        var e, t;
                        for (e in this._handlers)
                            this._core.$element.off(e, this._handlers[e]);
                        for (t in Object.getOwnPropertyNames(this))
                            "function" != typeof this[t] && (this[t] = null);
                    }),
                    (e.fn.owlCarousel.Constructor.Plugins.AutoHeight = o);
                })(window.Zepto || e, window, document),
                (function(e, t, n, i) {
                    var o = function(t) {
                        (this._core = t),
                        (this._videos = {}),
                        (this._playing = null),
                        (this._handlers = {
                            "initialized.owl.carousel": e.proxy(function(e) {
                                e.namespace &&
                                    this._core.register({
                                        type: "state",
                                        name: "playing",
                                        tags: ["interacting"],
                                    });
                            }, this),
                            "resize.owl.carousel": e.proxy(function(e) {
                                e.namespace &&
                                    this._core.settings.video &&
                                    this.isInFullScreen() &&
                                    e.preventDefault();
                            }, this),
                            "refreshed.owl.carousel": e.proxy(function(e) {
                                e.namespace &&
                                    this._core.is("resizing") &&
                                    this._core.$stage
                                    .find(".cloned .owl-video-frame")
                                    .remove();
                            }, this),
                            "changed.owl.carousel": e.proxy(function(e) {
                                e.namespace &&
                                    "position" === e.property.name &&
                                    this._playing &&
                                    this.stop();
                            }, this),
                            "prepared.owl.carousel": e.proxy(function(t) {
                                if (t.namespace) {
                                    var n = e(t.content).find(".owl-video");
                                    n.length &&
                                        (n.css("display", "none"), this.fetch(n, e(t.content)));
                                }
                            }, this),
                        }),
                        (this._core.options = e.extend({},
                            o.Defaults,
                            this._core.options
                        )),
                        this._core.$element.on(this._handlers),
                            this._core.$element.on(
                                "click.owl.video",
                                ".owl-video-play-icon",
                                e.proxy(function(e) {
                                    this.play(e);
                                }, this)
                            );
                    };
                    (o.Defaults = { video: !1, videoHeight: !1, videoWidth: !1 }),
                    (o.prototype.fetch = function(e, t) {
                        var n = e.attr("data-vimeo-id") ?
                            "vimeo" :
                            e.attr("data-vzaar-id") ?
                            "vzaar" :
                            "youtube",
                            i =
                            e.attr("data-vimeo-id") ||
                            e.attr("data-youtube-id") ||
                            e.attr("data-vzaar-id"),
                            o = e.attr("data-width") || this._core.settings.videoWidth,
                            r = e.attr("data-height") || this._core.settings.videoHeight,
                            s = e.attr("href");
                        if (!s) throw new Error("Missing video URL.");
                        if (
                            (i = s.match(
                                
                            ))[3].indexOf("youtu") > -1
                        )
                            n = "youtube";
                        else if (i[3].indexOf("vimeo") > -1) n = "vimeo";
                        else {
                            if (!(i[3].indexOf("vzaar") > -1))
                                throw new Error("Video URL not supported.");
                            n = "vzaar";
                        }
                        (i = i[6]),
                        (this._videos[s] = { type: n, id: i, width: o, height: r }),
                        t.attr("data-video", s),
                            this.thumbnail(e, this._videos[s]);
                    }),
                    (o.prototype.thumbnail = function(t, n) {
                        var i,
                            o,
                            r =
                            n.width && n.height ?
                            "width:" + n.width + "px;height:" + n.height + "px;" :
                            "",
                            s = t.find("img"),
                            a = "src",
                            l = "",
                            c = this._core.settings,
                            u = function(n) {
                                '<div class="owl-video-play-icon"></div>',
                                (i = c.lazyLoad ?
                                    e("<div/>", {
                                        class: "owl-video-tn " + l,
                                        srcType: n,
                                    }) :
                                    e("<div/>", {
                                        class: "owl-video-tn",
                                        style: "opacity:1;background-image:url(" + n + ")",
                                    })),
                                t.after(i),
                                t.after('<div class="owl-video-play-icon"></div>');
                            };
                        if (
                            (t.wrap(
                                    e("<div/>", { class: "owl-video-wrapper", style: r })
                                ),
                                this._core.settings.lazyLoad &&
                                ((a = "data-src"), (l = "owl-lazy")),
                                s.length)
                        )
                            return u(s.attr(a)), s.remove(), !1;
                        "youtube" === n.type ?
                            ((o = "//img.youtube.com/vi/" + n.id + "/hqdefault.jpg"),
                                u(o)) :
                            "vimeo" === n.type ?
                            e.ajax({
                                type: "GET",
                                url: "//vimeo.com/api/v2/video/" + n.id + ".json",
                                jsonp: "callback",
                                dataType: "jsonp",
                                success: function(e) {
                                    (o = e[0].thumbnail_large), u(o);
                                },
                            }) :
                            "vzaar" === n.type &&
                            e.ajax({
                                type: "GET",
                                url: "//vzaar.com/api/videos/" + n.id + ".json",
                                jsonp: "callback",
                                dataType: "jsonp",
                                success: function(e) {
                                    (o = e.framegrab_url), u(o);
                                },
                            });
                    }),
                    (o.prototype.stop = function() {
                        this._core.trigger("stop", null, "video"),
                            this._playing.find(".owl-video-frame").remove(),
                            this._playing.removeClass("owl-video-playing"),
                            (this._playing = null),
                            this._core.leave("playing"),
                            this._core.trigger("stopped", null, "video");
                    }),
                    (o.prototype.play = function(t) {
                        var n,
                            i = e(t.target).closest("." + this._core.settings.itemClass),
                            o = this._videos[i.attr("data-video")],
                            r = o.width || "100%",
                            s = o.height || this._core.$stage.height();
                        this._playing ||
                            (this._core.enter("playing"),
                                this._core.trigger("play", null, "video"),
                                (i = this._core.items(this._core.relative(i.index()))),
                                this._core.reset(i.index()),
                                (n = e(
                                    '<iframe frameborder="0" allowfullscreen mozallowfullscreen webkitAllowFullScreen ></iframe>'
                                )).attr("height", s),
                                n.attr("width", r),
                                "youtube" === o.type ?
                                n.attr(
                                    "src",
                                    "//www.youtube.com/embed/" +
                                    o.id +
                                    "?autoplay=1&rel=0&v=" +
                                    o.id
                                ) :
                                "vimeo" === o.type ?
                                n.attr(
                                    "src",
                                    "//player.vimeo.com/video/" + o.id + "?autoplay=1"
                                ) :
                                "vzaar" === o.type &&
                                n.attr(
                                    "src",
                                    "//view.vzaar.com/" + o.id + "/player?autoplay=true"
                                ),
                                e(n)
                                .wrap('<div class="owl-video-frame" />')
                                .insertAfter(i.find(".owl-video")),
                                (this._playing = i.addClass("owl-video-playing")));
                    }),
                    (o.prototype.isInFullScreen = function() {
                        var t =
                            n.fullscreenElement ||
                            n.mozFullScreenElement ||
                            n.webkitFullscreenElement;
                        return t && e(t).parent().hasClass("owl-video-frame");
                    }),
                    (o.prototype.destroy = function() {
                        var e, t;
                        for (e in (this._core.$element.off("click.owl.video"),
                                this._handlers))
                            this._core.$element.off(e, this._handlers[e]);
                        for (t in Object.getOwnPropertyNames(this))
                            "function" != typeof this[t] && (this[t] = null);
                    }),
                    (e.fn.owlCarousel.Constructor.Plugins.Video = o);
                })(window.Zepto || e, window, document),
                (n = window.Zepto || e),
                window,
                document,
                ((i = function(e) {
                    (this.core = e),
                    (this.core.options = n.extend({}, i.Defaults, this.core.options)),
                    (this.swapping = !0),
                    (this.previous = void 0),
                    (this.next = void 0),
                    (this.handlers = {
                        "change.owl.carousel": n.proxy(function(e) {
                            e.namespace &&
                                "position" == e.property.name &&
                                ((this.previous = this.core.current()),
                                    (this.next = e.property.value));
                        }, this),
                        "drag.owl.carousel dragged.owl.carousel translated.owl.carousel": n.proxy(function(e) {
                            e.namespace && (this.swapping = "translated" == e.type);
                        }, this),
                        "translate.owl.carousel": n.proxy(function(e) {
                            e.namespace &&
                                this.swapping &&
                                (this.core.options.animateOut ||
                                    this.core.options.animateIn) &&
                                this.swap();
                        }, this),
                    }),
                    this.core.$element.on(this.handlers);
                }).Defaults = { animateOut: !1, animateIn: !1 }),
                (i.prototype.swap = function() {
                    if (
                        1 === this.core.settings.items &&
                        n.support.animation &&
                        n.support.transition
                    ) {
                        this.core.speed(0);
                        var e,
                            t = n.proxy(this.clear, this),
                            i = this.core.$stage.children().eq(this.previous),
                            o = this.core.$stage.children().eq(this.next),
                            r = this.core.settings.animateIn,
                            s = this.core.settings.animateOut;
                        this.core.current() !== this.previous &&
                            (s &&
                                ((e =
                                        this.core.coordinates(this.previous) -
                                        this.core.coordinates(this.next)),
                                    i
                                    .one(n.support.animation.end, t)
                                    .css({ left: e + "px" })
                                    .addClass("animated owl-animated-out")
                                    .addClass(s)),
                                r &&
                                o
                                .one(n.support.animation.end, t)
                                .addClass("animated owl-animated-in")
                                .addClass(r));
                    }
                }),
                (i.prototype.clear = function(e) {
                    n(e.target)
                        .css({ left: "" })
                        .removeClass("animated owl-animated-out owl-animated-in")
                        .removeClass(this.core.settings.animateIn)
                        .removeClass(this.core.settings.animateOut),
                        this.core.onTransitionEnd();
                }),
                (i.prototype.destroy = function() {
                    var e, t;
                    for (e in this.handlers)
                        this.core.$element.off(e, this.handlers[e]);
                    for (t in Object.getOwnPropertyNames(this))
                        "function" != typeof this[t] && (this[t] = null);
                }),
                (n.fn.owlCarousel.Constructor.Plugins.Animate = i),
                (function(e, t, n, i) {
                    var o = function(t) {
                        (this._core = t),
                        (this._call = null),
                        (this._time = 0),
                        (this._timeout = 0),
                        (this._paused = !0),
                        (this._handlers = {
                            "changed.owl.carousel": e.proxy(function(e) {
                                e.namespace && "settings" === e.property.name ?
                                    this._core.settings.autoplay ?
                                    this.play() :
                                    this.stop() :
                                    e.namespace &&
                                    "position" === e.property.name &&
                                    this._paused &&
                                    (this._time = 0);
                            }, this),
                            "initialized.owl.carousel": e.proxy(function(e) {
                                e.namespace && this._core.settings.autoplay && this.play();
                            }, this),
                            "play.owl.autoplay": e.proxy(function(e, t, n) {
                                e.namespace && this.play(t, n);
                            }, this),
                            "stop.owl.autoplay": e.proxy(function(e) {
                                e.namespace && this.stop();
                            }, this),
                            "mouseover.owl.autoplay": e.proxy(function() {
                                this._core.settings.autoplayHoverPause &&
                                    this._core.is("rotating") &&
                                    this.pause();
                            }, this),
                            "mouseleave.owl.autoplay": e.proxy(function() {
                                this._core.settings.autoplayHoverPause &&
                                    this._core.is("rotating") &&
                                    this.play();
                            }, this),
                            "touchstart.owl.core": e.proxy(function() {
                                this._core.settings.autoplayHoverPause &&
                                    this._core.is("rotating") &&
                                    this.pause();
                            }, this),
                            "touchend.owl.core": e.proxy(function() {
                                this._core.settings.autoplayHoverPause && this.play();
                            }, this),
                        }),
                        this._core.$element.on(this._handlers),
                            (this._core.options = e.extend({},
                                o.Defaults,
                                this._core.options
                            ));
                    };
                    (o.Defaults = {
                        autoplay: !1,
                        autoplayTimeout: 5e3,
                        autoplayHoverPause: !1,
                        autoplaySpeed: !1,
                    }),
                    (o.prototype._next = function(i) {
                        (this._call = t.setTimeout(
                            e.proxy(this._next, this, i),
                            this._timeout *
                            (Math.round(this.read() / this._timeout) + 1) -
                            this.read()
                        )),
                        this._core.is("interacting") ||
                            n.hidden ||
                            this._core.next(i || this._core.settings.autoplaySpeed);
                    }),
                    (o.prototype.read = function() {
                        return new Date().getTime() - this._time;
                    }),
                    (o.prototype.play = function(n, i) {
                        var o;
                        this._core.is("rotating") || this._core.enter("rotating"),
                            (n = n || this._core.settings.autoplayTimeout),
                            (o = Math.min(this._time % (this._timeout || n), n)),
                            this._paused ?
                            ((this._time = this.read()), (this._paused = !1)) :
                            t.clearTimeout(this._call),
                            (this._time += (this.read() % n) - o),
                            (this._timeout = n),
                            (this._call = t.setTimeout(
                                e.proxy(this._next, this, i),
                                n - o
                            ));
                    }),
                    (o.prototype.stop = function() {
                        this._core.is("rotating") &&
                            ((this._time = 0),
                                (this._paused = !0),
                                t.clearTimeout(this._call),
                                this._core.leave("rotating"));
                    }),
                    (o.prototype.pause = function() {
                        this._core.is("rotating") &&
                            !this._paused &&
                            ((this._time = this.read()),
                                (this._paused = !0),
                                t.clearTimeout(this._call));
                    }),
                    (o.prototype.destroy = function() {
                        var e, t;
                        for (e in (this.stop(), this._handlers))
                            this._core.$element.off(e, this._handlers[e]);
                        for (t in Object.getOwnPropertyNames(this))
                            "function" != typeof this[t] && (this[t] = null);
                    }),
                    (e.fn.owlCarousel.Constructor.Plugins.autoplay = o);
                })(window.Zepto || e, window, document),
                (function(e, t, n, i) {
                    "use strict";
                    var o = function(t) {
                        (this._core = t),
                        (this._initialized = !1),
                        (this._pages = []),
                        (this._controls = {}),
                        (this._templates = []),
                        (this.$element = this._core.$element),
                        (this._overrides = {
                            next: this._core.next,
                            prev: this._core.prev,
                            to: this._core.to,
                        }),
                        (this._handlers = {
                            "prepared.owl.carousel": e.proxy(function(t) {
                                t.namespace &&
                                    this._core.settings.dotsData &&
                                    this._templates.push(
                                        '<div class="' +
                                        this._core.settings.dotClass +
                                        '">' +
                                        e(t.content)
                                        .find("[data-dot]")
                                        .addBack("[data-dot]")
                                        .attr("data-dot") +
                                        "</div>"
                                    );
                            }, this),
                            "added.owl.carousel": e.proxy(function(e) {
                                e.namespace &&
                                    this._core.settings.dotsData &&
                                    this._templates.splice(
                                        e.position,
                                        0,
                                        this._templates.pop()
                                    );
                            }, this),
                            "remove.owl.carousel": e.proxy(function(e) {
                                e.namespace &&
                                    this._core.settings.dotsData &&
                                    this._templates.splice(e.position, 1);
                            }, this),
                            "changed.owl.carousel": e.proxy(function(e) {
                                e.namespace && "position" == e.property.name && this.draw();
                            }, this),
                            "initialized.owl.carousel": e.proxy(function(e) {
                                e.namespace &&
                                    !this._initialized &&
                                    (this._core.trigger("initialize", null, "navigation"),
                                        this.initialize(),
                                        this.update(),
                                        this.draw(),
                                        (this._initialized = !0),
                                        this._core.trigger("initialized", null, "navigation"));
                            }, this),
                            "refreshed.owl.carousel": e.proxy(function(e) {
                                e.namespace &&
                                    this._initialized &&
                                    (this._core.trigger("refresh", null, "navigation"),
                                        this.update(),
                                        this.draw(),
                                        this._core.trigger("refreshed", null, "navigation"));
                            }, this),
                        }),
                        (this._core.options = e.extend({},
                            o.Defaults,
                            this._core.options
                        )),
                        this.$element.on(this._handlers);
                    };
                    (o.Defaults = {
                        nav: !1,
                        navText: [
                            '<span aria-label="Previous">&#x2039;</span>',
                            '<span aria-label="Next">&#x203a;</span>',
                        ],
                        navSpeed: !1,
                        navElement: 'button type="button" role="presentation"',
                        navContainer: !1,
                        navContainerClass: "owl-nav",
                        navClass: ["owl-prev", "owl-next"],
                        slideBy: 1,
                        dotClass: "owl-dot",
                        dotsClass: "owl-dots",
                        dots: !0,
                        dotsEach: !1,
                        dotsData: !1,
                        dotsSpeed: !1,
                        dotsContainer: !1,
                    }),
                    (o.prototype.initialize = function() {
                        var t,
                            n = this._core.settings;
                        for (t in ((this._controls.$relative = (
                                    n.navContainer ?
                                    e(n.navContainer) :
                                    e("<div>")
                                    .addClass(n.navContainerClass)
                                    .appendTo(this.$element)
                                ).addClass("disabled")),
                                (this._controls.$previous = e("<" + n.navElement + ">")
                                    .addClass(n.navClass[0])
                                    .html(n.navText[0])
                                    .prependTo(this._controls.$relative)
                                    .on(
                                        "click",
                                        e.proxy(function(e) {
                                            this.prev(n.navSpeed);
                                        }, this)
                                    )),
                                (this._controls.$next = e("<" + n.navElement + ">")
                                    .addClass(n.navClass[1])
                                    .html(n.navText[1])
                                    .appendTo(this._controls.$relative)
                                    .on(
                                        "click",
                                        e.proxy(function(e) {
                                            this.next(n.navSpeed);
                                        }, this)
                                    )),
                                n.dotsData ||
                                (this._templates = [
                                    e('<button role="button">')
                                    .addClass(n.dotClass)
                                    .append(e("<span>"))
                                    .prop("outerHTML"),
                                ]),
                                (this._controls.$absolute = (
                                    n.dotsContainer ?
                                    e(n.dotsContainer) :
                                    e("<div>").addClass(n.dotsClass).appendTo(this.$element)
                                ).addClass("disabled")),
                                this._controls.$absolute.on(
                                    "click",
                                    "button",
                                    e.proxy(function(t) {
                                        var i = e(t.target).parent().is(this._controls.$absolute) ?
                                            e(t.target).index() :
                                            e(t.target).parent().index();
                                        t.preventDefault(), this.to(i, n.dotsSpeed);
                                    }, this)
                                ),
                                this._overrides))
                            this._core[t] = e.proxy(this[t], this);
                    }),
                    (o.prototype.destroy = function() {
                        var e, t, n, i, o;
                        for (e in ((o = this._core.settings), this._handlers))
                            this.$element.off(e, this._handlers[e]);
                        for (t in this._controls)
                            "$relative" === t && o.navContainer ?
                            this._controls[t].html("") :
                            this._controls[t].remove();
                        for (i in this.overides) this._core[i] = this._overrides[i];
                        for (n in Object.getOwnPropertyNames(this))
                            "function" != typeof this[n] && (this[n] = null);
                    }),
                    (o.prototype.update = function() {
                        var e,
                            t,
                            n = this._core.clones().length / 2,
                            i = n + this._core.items().length,
                            o = this._core.maximum(!0),
                            r = this._core.settings,
                            s =
                            r.center || r.autoWidth || r.dotsData ?
                            1 :
                            r.dotsEach || r.items;
                        if (
                            ("page" !== r.slideBy &&
                                (r.slideBy = Math.min(r.slideBy, r.items)),
                                r.dots || "page" == r.slideBy)
                        )
                            for (this._pages = [], e = n, t = 0, 0; e < i; e++) {
                                if (t >= s || 0 === t) {
                                    if (
                                        (this._pages.push({
                                                start: Math.min(o, e - n),
                                                end: e - n + s - 1,
                                            }),
                                            Math.min(o, e - n) === o)
                                    )
                                        break;
                                    t = 0;
                                }
                                t += this._core.mergers(this._core.relative(e));
                            }
                    }),
                    (o.prototype.draw = function() {
                        var t,
                            n = this._core.settings,
                            i = this._core.items().length <= n.items,
                            o = this._core.relative(this._core.current()),
                            r = n.loop || n.rewind;
                        this._controls.$relative.toggleClass("disabled", !n.nav || i),
                            n.nav &&
                            (this._controls.$previous.toggleClass(
                                    "disabled", !r && o <= this._core.minimum(!0)
                                ),
                                this._controls.$next.toggleClass(
                                    "disabled", !r && o >= this._core.maximum(!0)
                                )),
                            this._controls.$absolute.toggleClass(
                                "disabled", !n.dots || i
                            ),
                            n.dots &&
                            ((t =
                                    this._pages.length -
                                    this._controls.$absolute.children().length),
                                n.dotsData && 0 !== t ?
                                this._controls.$absolute.html(this._templates.join("")) :
                                t > 0 ?
                                this._controls.$absolute.append(
                                    new Array(t + 1).join(this._templates[0])
                                ) :
                                t < 0 &&
                                this._controls.$absolute.children().slice(t).remove(),
                                this._controls.$absolute
                                .find(".active")
                                .removeClass("active"),
                                this._controls.$absolute
                                .children()
                                .eq(e.inArray(this.current(), this._pages))
                                .addClass("active"));
                    }),
                    (o.prototype.onTrigger = function(t) {
                        var n = this._core.settings;
                        t.page = {
                            index: e.inArray(this.current(), this._pages),
                            count: this._pages.length,
                            size: n &&
                                (n.center || n.autoWidth || n.dotsData ?
                                    1 :
                                    n.dotsEach || n.items),
                        };
                    }),
                    (o.prototype.current = function() {
                        var t = this._core.relative(this._core.current());
                        return e
                            .grep(
                                this._pages,
                                e.proxy(function(e, n) {
                                    return e.start <= t && e.end >= t;
                                }, this)
                            )
                            .pop();
                    }),
                    (o.prototype.getPosition = function(t) {
                        var n,
                            i,
                            o = this._core.settings;
                        return (
                            "page" == o.slideBy ?
                            ((n = e.inArray(this.current(), this._pages)),
                                (i = this._pages.length),
                                t ? ++n : --n,
                                (n = this._pages[((n % i) + i) % i].start)) :
                            ((n = this._core.relative(this._core.current())),
                                (i = this._core.items().length),
                                t ? (n += o.slideBy) : (n -= o.slideBy)),
                            n
                        );
                    }),
                    (o.prototype.next = function(t) {
                        e.proxy(this._overrides.to, this._core)(
                            this.getPosition(!0),
                            t
                        );
                    }),
                    (o.prototype.prev = function(t) {
                        e.proxy(this._overrides.to, this._core)(
                            this.getPosition(!1),
                            t
                        );
                    }),
                    (o.prototype.to = function(t, n, i) {
                        var o;
                        !i && this._pages.length ?
                            ((o = this._pages.length),
                                e.proxy(this._overrides.to, this._core)(
                                    this._pages[((t % o) + o) % o].start,
                                    n
                                )) :
                            e.proxy(this._overrides.to, this._core)(t, n);
                    }),
                    (e.fn.owlCarousel.Constructor.Plugins.Navigation = o);
                })(window.Zepto || e, window, document),
                (function(e, t, n, i) {
                    "use strict";
                    var o = function(n) {
                        (this._core = n),
                        (this._hashes = {}),
                        (this.$element = this._core.$element),
                        (this._handlers = {
                            "initialized.owl.carousel": e.proxy(function(n) {
                                n.namespace &&
                                    "URLHash" === this._core.settings.startPosition &&
                                    e(t).trigger("hashchange.owl.navigation");
                            }, this),
                            "prepared.owl.carousel": e.proxy(function(t) {
                                if (t.namespace) {
                                    var n = e(t.content)
                                        .find("[data-hash]")
                                        .addBack("[data-hash]")
                                        .attr("data-hash");
                                    if (!n) return;
                                    this._hashes[n] = t.content;
                                }
                            }, this),
                            "changed.owl.carousel": e.proxy(function(n) {
                                if (n.namespace && "position" === n.property.name) {
                                    var i = this._core.items(
                                            this._core.relative(this._core.current())
                                        ),
                                        o = e
                                        .map(this._hashes, function(e, t) {
                                            return e === i ? t : null;
                                        })
                                        .join();
                                    if (!o || t.location.hash.slice(1) === o) return;
                                    t.location.hash = o;
                                }
                            }, this),
                        }),
                        (this._core.options = e.extend({},
                            o.Defaults,
                            this._core.options
                        )),
                        this.$element.on(this._handlers),
                            e(t).on(
                                "hashchange.owl.navigation",
                                e.proxy(function(e) {
                                    var n = t.location.hash.substring(1),
                                        i = this._core.$stage.children(),
                                        o = this._hashes[n] && i.index(this._hashes[n]);
                                    void 0 !== o &&
                                        o !== this._core.current() &&
                                        this._core.to(this._core.relative(o), !1, !0);
                                }, this)
                            );
                    };
                    (o.Defaults = { URLhashListener: !1 }),
                    (o.prototype.destroy = function() {
                        var n, i;
                        for (n in (e(t).off("hashchange.owl.navigation"),
                                this._handlers))
                            this._core.$element.off(n, this._handlers[n]);
                        for (i in Object.getOwnPropertyNames(this))
                            "function" != typeof this[i] && (this[i] = null);
                    }),
                    (e.fn.owlCarousel.Constructor.Plugins.Hash = o);
                })(window.Zepto || e, window, document),
                (function(e, t, n, i) {
                    var o = e("<support>").get(0).style,
                        r = "Webkit Moz O ms".split(" "),
                        s = {
                            transition: {
                                end: {
                                    WebkitTransition: "webkitTransitionEnd",
                                    MozTransition: "transitionend",
                                    OTransition: "oTransitionEnd",
                                    transition: "transitionend",
                                },
                            },
                            animation: {
                                end: {
                                    WebkitAnimation: "webkitAnimationEnd",
                                    MozAnimation: "animationend",
                                    OAnimation: "oAnimationEnd",
                                    animation: "animationend",
                                },
                            },
                        },
                        a = function() {
                            return !!u("transform");
                        },
                        l = function() {
                            return !!u("perspective");
                        },
                        c = function() {
                            return !!u("animation");
                        };

                    function u(t, n) {
                        var s = !1,
                            a = t.charAt(0).toUpperCase() + t.slice(1);
                        return (
                            e.each(
                                (t + " " + r.join(a + " ") + a).split(" "),
                                function(e, t) {
                                    if (o[t] !== i) return (s = !n || t), !1;
                                }
                            ),
                            s
                        );
                    }

                    function d(e) {
                        return u(e, !0);
                    }
                    (function() {
                        return !!u("transition");
                    })() &&
                    ((e.support.transition = new String(d("transition"))),
                        (e.support.transition.end =
                            s.transition.end[e.support.transition])),
                    c() &&
                        ((e.support.animation = new String(d("animation"))),
                            (e.support.animation.end =
                                s.animation.end[e.support.animation])),
                        a() &&
                        ((e.support.transform = new String(d("transform"))),
                            (e.support.transform3d = l()));
                })(window.Zepto || e, window, document);
            }.call(this, n(1), n(1)));
        },
        function(e, t, n) {
            "use strict";
            var i,
                o = n(5),
                r = n.n(o),
                s = n(4);
            ((i = { isExist: !1, html: null, selector: { container: "", item: "" } }),
                "function" == typeof r.a ?
                (i.isExist = !0) :
                console.warn("photoswipeComponent: PhotoSwipe not found"),
                Object.freeze({
                    init: function(e, t) {
                        var n;
                        i.isExist &&
                            document.querySelector(e) &&
                            (function(e, t, n) {
                                document.querySelectorAll(e).forEach(function(i) {
                                    i.querySelectorAll(t).forEach(function(i) {
                                        i.addEventListener("click", function(i) {
                                            i.preventDefault();
                                            for (
                                                var o =
                                                    "a" === i.target.tagName ?
                                                    i.target :
                                                    i.target.closest("a"),
                                                    a = o.closest(e).querySelectorAll(t),
                                                    l = [],
                                                    c = 0; c < a.length; c++
                                            ) {
                                                var u = a[c].getAttribute("data-size").split("x");
                                                l[c] = {
                                                    src: a[c].getAttribute("href"),
                                                    w: u[0],
                                                    h: u[1],
                                                };
                                            }
                                            for (var d = 0, p = 0; p < a.length; p++)
                                                a[p] === o && (d = p);
                                            var h = { shareEl: !1, index: d };
                                            return new r.a(n, s, l, h).init(), !1;
                                        });
                                    });
                                });
                            })(
                                e,
                                t,
                                ((n = document.createElement("div")).classList.add("pswp"),
                                    (n.innerHTML =
                                        '<div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><button class="pswp__button pswp__button--share" title="Share"></button><button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div>'),
                                    document.querySelector("body").appendChild(n),
                                    n)
                            );
                    },
                })).init(".js-gallery", "a:not(.no-photoswipe)");
        },
    ],
]);