<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Login Form in PHP With Session</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

</head>
<body>
    <!-- <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-dark mt-5">
                    <div class="card-title bg-primary text-white mt-5">
                        <h3 class="text-center py-3">Login Form in PHP </h3>
                    </div>
                    <div class="card-body">
                        <form action="process.php" method="post">
                            <input type="text" name="UName" placeholder=" User Name" class="form-control mb-3">
                            <input type="password" name="Password" placeholder=" Password" class="form-control mb-3">
                            <button class="btn btn-success mt-3" name="Login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <main class="container ">
        <div class="header">
            <h1 class="display-4">Sign Up</h1>
        </div>
        <div class="signup-form">
            <form action="process_signup.php" method="post" class="row g-2">
                <div class="col-md-23" >
                    <input type="text" name="Name" placeholder=" Name" class="form-control mb-3">
                </div>
                <div class="col-md-23" >
                    <input type="date" name="Birthdate" placeholder=" Birthdate" class="form-control mb-3">
                </div>
                <div class="col-md-23" >
                    <input type="email" name="Email" placeholder=" Email" class="form-control mb-3">
                </div>
                <div class="col-md-23" >
                    <input type="password" name="Password" placeholder=" Password" class="form-control mb-3">
                </div>
                <button class="btn btn-success mt-3" name="Signup">Sign up</button>
                <!-- class="btn btn-primary text-center mb-4" -->
            </form>
        </div>
    </main>

</body>
<footer>
<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
        <script>
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
        </script>
        <script type="text/javascript" id="crowdin-plugin">
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
        </script>
</footer>
</html>

<?php 
    if(@$_GET['Empty']==true)
    {
?>
    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
<?php
    }
?>


<?php 
    if(@$_GET['Invalid']==true)
    {
?>
    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
<?php
    }
?>