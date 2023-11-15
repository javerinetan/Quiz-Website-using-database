const date = new Date();
            date.setMinutes(0);
            date.setSeconds(0);
            date.setMilliseconds(0);
            const roundedDate = date.getHours() === 0 ? new Date(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0) : date;
            const timestamp = Math.floor(roundedDate.getTime() / 1000);
            window.proxyTranslator.init({
                baseUrl: "https://quizizz.com",
                distributionBaseUrl: "https://distributions.crowdin.net",
                filePath: "/quizizz.com.json?timestamp=" + timestamp,
                distribution: "e0ad63f50ecb39e11d2b1592cs8",
                languages: {
                    id: "Bahasa Indonesia",
                    th: "ไทย",
                    tl: "Filipino",
                    vi: "Tiếng Việt",
                    ms: "Melayu",
                    "pt-BR": "Português",
                    "es-ES": "Español",
                    pl: "Polski",
                    kk: "қазақша",
                    ru: "Русский",
                    tr: "Türk",
                    "zh-CN": "中国人（简化）",
                    "zh-TW": "中國人（傳統的）",
                    fr: "Français",
                    it: "Italiano",
                    de: "Deutsch",
                    ja: "日本語",
                    az: "Azərbaycan",
                },
                languagesData: {
                    fr: {
                        code: "fr",
                        name: "French",
                        twoLettersCode: "fr"
                    },
                    "es-ES": {
                        code: "es-ES",
                        name: "Spanish",
                        twoLettersCode: "es"
                    },
                    de: {
                        code: "de",
                        name: "German",
                        twoLettersCode: "de"
                    },
                    it: {
                        code: "it",
                        name: "Italian",
                        twoLettersCode: "it"
                    },
                    ja: {
                        code: "ja",
                        name: "Japanese",
                        twoLettersCode: "ja"
                    },
                    pl: {
                        code: "pl",
                        name: "Polish",
                        twoLettersCode: "pl"
                    },
                    ru: {
                        code: "ru",
                        name: "Russian",
                        twoLettersCode: "ru"
                    },
                    tr: {
                        code: "tr",
                        name: "Turkish",
                        twoLettersCode: "tr"
                    },
                    "zh-CN": {
                        code: "zh-CN",
                        name: "Chinese Simplified",
                        twoLettersCode: "zh",
                    },
                    "zh-TW": {
                        code: "zh-TW",
                        name: "Chinese Traditional",
                        twoLettersCode: "zh",
                    },
                    vi: {
                        code: "vi",
                        name: "Vietnamese",
                        twoLettersCode: "vi"
                    },
                    "pt-BR": {
                        code: "pt-BR",
                        name: "Portuguese, Brazilian",
                        twoLettersCode: "pt",
                    },
                    id: {
                        code: "id",
                        name: "Indonesian",
                        twoLettersCode: "id"
                    },
                    th: {
                        code: "th",
                        name: "Thai",
                        twoLettersCode: "th"
                    },
                    az: {
                        code: "az",
                        name: "Azerbaijani",
                        twoLettersCode: "az"
                    },
                    ms: {
                        code: "ms",
                        name: "Malay",
                        twoLettersCode: "ms"
                    },
                    tl: {
                        code: "tl",
                        name: "Tagalog",
                        twoLettersCode: "tl"
                    },
                    en: {
                        code: "en",
                        name: "English",
                        twoLettersCode: "en"
                    },
                    kk: {
                        code: "kk",
                        name: "Kazakh",
                        twoLettersCode: "kk"
                    },
                },
                defaultLanguage: "en",
                defaultLanguageTitle: "English",
                languageDetectType: "default",
                poweredBy: false,
                position: "bottom-left",
                submenuPosition: "top-left",
                callback: () => {},
            });


function updateUrlParameter(t, e, n) {
    var a = "",
        r = t.split("?"),
        i = r[0],
        s = r[1],
        o = "";
    if (s) {
        r = s.split("&");
        for (var l = 0; l < r.length; l++) r[l].split("=")[0] != e && ((a += o + r[l]), (o = "&"));
    }
    return i + "?" + a + (o + "" + e + "=" + n);
}
const languageStringToCrowdinLanguageCodeMap = {
        English: "en",
        Français: "fr",
        Español: "es-ES",
        Deutsch: "de",
        Italiano: "it",
        日本語: "ja",
        Polski: "pl",
        Русский: "ru",
        Türk: "tr",
        "中国人（简化）": "zh-CN",
        "中國人（傳統的）": "zh-TW",
        "Tiếng Việt": "vi",
        Português: "pt-BR",
        "Bahasa Indonesia": "id",
        ไทย: "th",
        Azərbaycan: "az",
        Melayu: "ms",
        Filipino: "tl",
        қазақша: "kk"
    },
    languageSelect = document.querySelector(".cr-picker-button"),
    config = {
        attributes: !0,
        childList: !0,
        subtree: !0
    },
    callback = function(t, e) {
        for (const e of t)
            if ("childList" === e.type) {
                const t = languageSelect.innerText,
                    e = languageStringToCrowdinLanguageCodeMap[t],
                    a = window.Globals.getCookie("crowdinLangCode") || "en";
                window.Globals.setCookieSecure("crowdinLangCode", e, 1);
                let r = window.location.href;
                (r = r.split(".com")[1]), (r = r.split("?")[0]), (r && "/" !== r) || (r = "/homepage"), window.Globals.sendLocalisationEvent(r, "", a, e, !1, "language_change_triggered");
                const i = window.location.href;
                let s = i.split("?")[0] + "?lng=" + e;
                ("en" !== e && e) || (s = i.split("?")[0]), (languageSelect.href = s);
                var n = document.head.querySelector("link[rel='canonical']");
                n.href = s;
                const o = {
                        attributes: !0,
                        childList: !0,
                        subtree: !0
                    },
                    l = function(t, a) {
                        for (const r of t) {
                            const t = n.href,
                                i = window.Globals.getCookie("crowdinLangCode") || e || "en",
                                s = window.location.href;
                            let o = s.split("?")[0] + "?lng=" + i;
                            ("en" !== i && i) || (o = s.split("?")[0]), "attributes" === r.type && (t.startsWith("https://quizizz.com?lng=") || t.startsWith("https://quizizz.com/?lng=")) && (n.href = o), a.disconnect();
                        }
                    };
                new MutationObserver(l).observe(n, o);
            }
    },
    observer = new MutationObserver(callback);
observer.observe(languageSelect, config);
var cookie = document.cookie,
    userLang = navigator.language || navigator.userLanguage;
let crowdinLangCode = window.Globals.getCookie("crowdinLangCode");
if (!crowdinLangCode) {
    userLang = navigator.language || navigator.userLanguage;
    var queryParams = new URLSearchParams(window.location.search);
    let t = null;
    userLang.startsWith("en") ? (t = "en") : userLang.startsWith("id") ? (t = "id") : userLang.startsWith("pt") ? (t = "pt-BR") : userLang.startsWith("fr") ? (t = "fr") : userLang.startsWith("de") ? (t = "de") : userLang.startsWith("ja") ? (t = "ja") : userLang.startsWith("ru") ? (t = "ru") : userLang.startsWith("es") ? (t = "es-ES") : userLang.startsWith("vi") ? (t = "vi") : userLang.startsWith("pl") ? (t = "pl") : userLang.startsWith("tr") ? (t = "tr") : userLang.startsWith("az") ? (t = "az") : userLang.startsWith("zh-CN") ? (t = "zh-CN") : userLang.startsWith("zh-TW") ? (t = "zh-TW") : userLang.startsWith("zh") ? (t = "zh-CN") : userLang.startsWith("it") ? (t = "it") : userLang.startsWith("ms") ? (t = "ms") : userLang.startsWith("tl") ? (t = "tl") : userLang.startsWith("th") ? (t = "th") : userLang.startsWith("fil") ? (t = "tl") : userLang.startsWith("kk") && (t = "kk"),
        window.Globals.setCookieSecure("crowdinLangCode", t, 1),
        "en" !== t && (window.location.href = updateUrlParameter(window.location.href, "lng", t));
}
var link = document.querySelector("link[rel='alternate'][hreflang='en']") ? document.querySelector("link[rel='alternate'][hreflang='en']") : document.createElement("link");
link.setAttribute("rel", "alternate"),
    link.setAttribute("hreflang", "en"),
    link.setAttribute("href", "https://quizizz.com"),
    document.head.appendChild(link),
    document.addEventListener(
        "DOMContentLoaded",
        function() {
            const t = window.Globals.getCookie("crowdinLangCode") || "en",
                e = window.location.href;
            let n = e.split("?")[0] + "?lng=" + t;
            ("en" !== t && t) || (n = e.split("?")[0]), window.Globals.setCanonicalUrl(n);
        }, !1
    );
//# sourceMappingURL=crowdin-plugin.min.js.map