<?php 
require_once('connection.php');
session_start(); 
?>

<!DOCTYPE html>
<html data-page="652e5b765bb09ed398f038a5" data-site="60aca2b71ab9a5e4ececf1cf" lang="en">

<head>
    <meta charset="utf-8" />
    <title>QuizIT| Free Online Quizzes, Lessons, Activities and Homework</title>
    <meta content="./wf/assets/QuizITLogo.png" property="icon:image" />
    <meta property="og:type" content="website" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="./wf/style.css" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic", "Quicksand:300,regular,500,600,700", "Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]
            }
        });
    </script>
    <script type="text/javascript">
        !(function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            (n.className += t + "js"), ("ontouchstart" in o || (o.DocumentTouch && c instanceof DocumentTouch)) && (n.className += t + "touch");
        })(window, document);
    </script>
    <link href="./wf/assets/QuizITLogo.png" rel="shortcut icon" type="image/x-icon" />
    <link href="/wf/assets/QuizITLogo.png" rel="apple-touch-icon" />
    <style>
        .anti-flicker-hide {
            opacity: 0 !important;
        }
    </style>


    <style>
        .w-webflow-badge {
            display: None !important;
            visibility: hidden !important;
        }
    </style>
    
</head>

<body>
    <div class="page-wrapper">
        <div id="mobile-nav" class="mobile-navigation">
            <div class="wrapper-mobile-nav">
                <a href="" class="nav-mobile-logo-container w-inline-block">
                    <img src="/wf/assets/QuizITLogoname.png" loading="lazy" alt="Quizizz Logo" class="logo-image" />
                </a>
                <div class="navigation-buttons-container">
                    <a href="" class="button-13 w-button">Enter code</a>
                    <a href="" target="_blank" class="button-sign-up sign-in top w-button">Log in</a>
                    <a href="" target="_blank" class="button-sign-up top w-button">Sign up</a>
                </div>
                <div class="wrap-menu-nav-mobile">
                    <a href="#mobile-nav" data-w-id="d904b3ce-2d58-dbbb-ab91-a45f199ac6f7" class="menu-btn w-inline-block">
                        <div class="menu-line-1"></div>
                        <div class="menu-line-2"></div>
                        <div class="menu-line-3"></div>
                    </a>
                </div>
            </div>
            <div class="wrap-dropdown"></div>
            <div class="navbar-shadow"></div>
        </div>
        <div data-animation="default" data-collapse="none" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navigation-bar w-nav">
            <header class="navigation-wrapper desktop button-text">
                <a href="" class="navigation-logo w-nav-brand">
                    <img src="./wf/assets/QuizITLogoname.png" loading="lazy" alt="Quizizz Logo" class="logo-image" />
                </a>
                <nav role="navigation" class="nav-menu-outer w-nav-menu">
                    <div class="nav-links-contain-v2">
                        <div data-hover="true" data-delay="0" class="nav-dropdown w-dropdown">
                            <div class="dropdown w-dropdown-toggle">
                                <div>For Schools</div>
                            </div>
                            <nav class="dropdown-list w-dropdown-list">
                                <div class="dropdown-list-wrapper">
                                    <a href="" class="dropdown-link-contain w-inline-block">
                                        <img src="./wf/assets/632b579034dcb77743b131fb_School.svg" loading="eager" alt="" class="dropdown-icon" />
                                        <div>Overview</div>
                                    </a>
                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-link-contain w-inline-block">
                                <img src="./wf/assets/632b57a19843187e5697ea32_screen-users_2.svg" loading="eager" alt="" class="dropdown-icon" />
                                <div>Impact</div>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-link-contain w-inline-block">
                                <img src="./wf/assets/632b57e283d43912e086909f_chalkboard-user_10.svg" loading="eager" alt="" class="dropdown-icon" />
                                <div>Product</div>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-link-contain w-inline-block">
                                <img src="./wf/assets/632b57b39ab52921fc1d933b_hand-holding-dollar_2.svg" loading="eager" alt="" class="dropdown-icon" />
                                <div>Funding</div>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-link-contain w-inline-block">
                                <img src="./wf/assets/64abd09d032d0b717c014b1d_whats_new_icon.svg" loading="eager" alt="" class="dropdown-icon" />
                                <div>What&#x27;s New</div>
                            </a>
                        </div>
                    </nav>
                </div>
            <a href="" class="nav-link hide w-nav-link">For Teachers</a>
            <a href="" target="_blank" class="nav-link hide w-nav-link">Schools and Districts</a>
            <a href="" class="nav-link w-nav-link">Plans</a>
                                    
            <a href="" class="nav-link w-nav-link">Quizizz for Work</a>
            <div class="navigation-buttons-container in-menu">
                <a href="#" target="_blank" class="code-button w-button">Enter code  ••••</a>
                <a href="#" target="_blank" class="button-sign-up w-button">Sign up</a>
            </div>
        </div>
    </nav>
    <div class="navigation-buttons-container">
    <?php
    if(!isset($_SESSION['User']))
        {
            echo '
                <a id="login-top-nav" href="./account/login.php" class="button-login w-button">Log in</a>
                <a id="sign-up-top-nav" href="./account/signup.php" class="button-sign-up w-button">Sign up</a>
            ';
        }
    else{
        $query="select * from account where email='".$_SESSION['User']."'";
        $con = mysqli_connect('localhost','root','','webdb_project');

        $results=mysqli_query($con,$query);
        $row=$results->fetch_assoc();
        echo 'Welcome '. ucfirst($row['name']) . "!";
        echo '<a id="sign-up-top-nav" href="./account/welcome.php" class="button-sign-up w-button">Account</a>';
    }
    ?>
    </div>
    <div class="menu-button w-nav-button">
        <div class="w-icon-nav-menu"></div>
    </div>
    </header>
    <div class="navbar-shadow"></div>
</div>
<div class="home-hero-wrapper">
    <div class="hero-center-wrapper">
        <div class="hero-heading-contain">
            <h1 class="hero-h1-heading">It matters</h1>
            <div class="hero-span-wrapper">
            <h1 class="home-hero-span">how you ask</h1>
            <img src="./wf/assets/62fa6419161d3a119d681c8e_420px.svg" loading="eager" alt="" class="hero-green-line" />
            <img src="./wf/assets/62fa641a161d3a7537681cf7_Yellow_448px.svg" loading="eager" data-w-id="147671d5-d38a-8e5e-4da6-03bc9c6b5e54" alt="" class="hero-yellow-line" />
            <img src="./wf/assets/62fa6419161d3a6fb2681c99_Purple_420px_Line.svg" loading="eager" data-w-id="147671d5-d38a-8e5e-4da6-03bc9c6b5e55" alt="" class="hero-purple-line" />
            <img src="./wf/assets/62fa6419161d3a9c2b681cbc_Blue_448px_Line.svg" loading="eager" data-w-id="147671d5-d38a-8e5e-4da6-03bc9c6b5e56" alt="" class="hero-blue-line" />
            <img src="./wf/assets/62fa6419161d3ab145681ca9_Red_420px_Line.svg" loading="eager" data-w-id="147671d5-d38a-8e5e-4da6-03bc9c6b5e57" alt="" class="hero-red-line" />
        </div>
    </div>
    <div class="div-block-219">
        <p class="home-hero-paragraph top-margin-16px">Assessment, instruction, and practice that motivate every student—now enhanced with AI<span class="text-span-102">     </span>
        </p>
    </div>
    <div class="buttons-container home-hero">
        <a id="sign-up-hero-home" href="" class="purple-button">
            <div class="button-subtext">teachers</div>
            <div class="button-bottom-contain">
                <div class="button-text">Sign up for free</div>
                <img src="./wf/assets/62fa641a161d3a38c7681d0e_Right_Arrow_Button.svg" loading="lazy" alt="Arrow pointing right" class="button-arrow" />
            </div>
        </a>
        <a id="admin-hero-home" href="" class="grey-button">
            <div class="button-subtext">Admins</div>
            <div class="button-bottom-contain">
                <div class="button-text">Learn more</div>
                <img src="./wf/assets/62fa6419161d3ac288681cdc_Purple_Arrow_Button.svg" loading="lazy" alt="Purple Right Arrow" class="button-arrow" />
            </div>
        </a>
    </div>
    <div class="qfw-text-contain">
        <img src="./wf/assets/64801da98627754a5805924b_icon.svg" loading="lazy" alt="" class="image-231" />
        <p class="check-text">
            <span class="bold-span-quicksand"><strong>QuizIT: Now empowering corporate trainers!</strong> </span><a href="" class="link-173"><span class="bold-span-quicksand">Explore now</span></a>
        </p>
    </div>
    <div class="check-text-contain">
        <img src="./wf/assets/62fa6419161d3a5819681c86_Check.svg" loading="lazy" alt="Checkamark Icon" class="check-icon" />
        <p class="check-text">
            <span class="bold-span-quicksand">Used by 50 million+ educators and students</span> around the world
        </p>
    </div>
    <br><br><br><br>
</div>
</div>
<div class="hero-section">
    <div class="home-hero-btf">
        <div class="testimonial-wrapper-new">
            <div data-delay="4000" data-animation="slide" class="testimonial-collection-new w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="8" data-duration="500" data-infinite="true">
                <div class="mask-2 w-slider-mask">
                    <div class="testimonial-card-1 w-slide">
                        <div class="div-block-231">
                            <img src="./wf/assets/64f98a5134cd09847c7b3d2e_63340b96b33bb55480b15023_Yvette.webp" loading="eager" alt="" class="image-271" />
                            <div class="div-block-232">
                                <div class="testimonial-title-home">Yvette Switzer</div>
                                <div class="testimonial-title-occupation">4th Grade Teacher</div>
                            </div>
                        </div>
                        <div class="testimonial-copy">“I use QuizIT to reinforce and check understanding after we&#x27;ve covered a concept pretty thoroughly. I use it in stations. I use it for tutoring. <span>I also use it to review and prepare my students for benchmark and state tests.</span>                                        <span class="text-span-95">They love it every time.</span>”</div>
                            </div>
                            <div class="testimonial-card-2 w-slide">
                                <div class="div-block-231">
                                    <img src="./wf/assets/64f98d33abf0f547876789ef_63340a6a73f5762f968c2c99_James_(1).webp" loading="eager" alt="" class="image-271" />
                                    <div class="div-block-232">
                                        <div class="testimonial-title-home">James Newman</div>
                                        <div class="testimonial-title-occupation">Sr. Manager of Academic Instructional Technology</div>
                                    </div>
                                </div>
                                <div class="testimonial-copy">“<span class="text-span-73">QuizIT motivates [students]</span>, increases confidence, and can help to establish a culture of learning and growing from mistakes.”</div>
                            </div>
                            <div class="testimonial-card-3 w-slide">
                                <div class="div-block-231">
                                    <img src="./wf/assets/64f98db8c8931dba57972cba_63340b548cb9c75ac2928425_Shallamar_(1).webp" loading="eager" alt="" class="image-271" />
                                    <div class="div-block-232">
                                        <div class="testimonial-title-home">Shallamar Goodwin-Richards</div>
                                        <div class="testimonial-title-occupation">High School <br />Math Teacher</div>
                                    </div>
                                </div>
                                <div class="testimonial-copy">“I have students with IEPs, <span class="text-span-74">I am able to find lessons catering to their abilities and accommodation</span> while being able to assign the other students with more rigorous assessments.”</div>
                            </div>
                            <div class="testimonial-card-4 w-slide">
                                <div class="div-block-231">
                                    <img src="./wf/assets/64f98e300068f4ab01dd9240_63340b85968fd3dc4eba293e_Shelby.webp" loading="eager" alt="" class="image-271" />
                                    <div class="div-block-232">
                                        <div class="testimonial-title-home">Shelby Cameron</div>
                                        <div class="testimonial-title-occupation">High School Teacher</div>
                                    </div>
                                </div>
                                <div class="testimonial-copy">“<span class="text-span-75">Students are motivated by the power-ups, points, and sense of competition</span> with their classmates. Students cheer when a classmate uses a power-up that helps everyone, and it encourages
                                    the community some students desperately need.”</div>
                            </div>
                            <div class="testimonial-card-8 w-slide">
                                <div class="div-block-231">
                                    <img src="./wf/assets/64f9924a0068f4ab01e245ec_63340b24c54f124dda378881_Melissa.webp" loading="eager" alt="" class="image-271" />
                                    <div class="div-block-232">
                                        <div class="testimonial-title-home">Melissa Oberembt</div>
                                        <div class="testimonial-title-occupation">High School Special Education Teacher</div>
                                    </div>
                                </div>
                                <div class="testimonial-copy">“One of my students who has an IEP in the area of behavior often refuses to practice or participate in class. However, anytime we play Quizizz ... he engages 100% and is reaching proficiency on those math standards.”</div>
                            </div>
                            <div class="testimonial-card-5 w-slide">
                                <div class="div-block-231">
                                    <img src="./wf/assets/64f98ee083d5fe55063d3a4a_63340b3d75515b4697efabae_Scott.webp" loading="eager" alt="" class="image-271" />
                                    <div class="div-block-232">
                                        <div class="testimonial-title-home">Scott Staub</div>
                                        <div class="testimonial-title-occupation">K-12 Instructional Technology Coach</div>
                                    </div>
                                </div>
                                <div class="testimonial-copy">“<span class="text-span-76">QuizIT was the obvious choice</span> ... because teachers asked for it. [It] was fully aligned with district initiatives around student engagement and formative assessment, was compliant
                                    with NYS EdLaw 2-d, and came packaged with</div>
                            </div>
                            
                        </div>
                        <div class="left-arrow-2 w-slider-arrow-left">
                            <div class="icon-3 w-icon-slider-left"></div>
                            <div class="arrow-button-left"><img src="./wf/assets/64f9cd40f8ce955ef7125b11_Chevron_left_(1).webp" loading="lazy" alt="" class="image-274" /></div>
                        </div>
                        <div class="right-arrow-2 w-slider-arrow-right">
                            <div class="icon-4 w-icon-slider-right"></div>
                            <div class="arrow-button-right"><img src="./wf/assets/64f9cd5353daa34b59cdaf39_Chevron_right.webp" loading="lazy" alt="" class="image-275" /></div>
                        </div>
                        <div class="slide-nav-5 w-slider-nav w-round"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-section">
            <div class="footer-wrapper">
                <div class="footer-top-wrapper">
                    <div class="footer-left-wrapper">
                        <a href="" aria-current="page" class="footer-logo w-nav-brand w--current"><img src="https://quizizz.com/wf/assets/62fa6419161d3a641f681ceb_Logo.svg" loading="lazy" alt="Quizizz Logo" class="logo-image" /></a>
                        
        </div>
        <div class="footer-right-wrapper">
        <div class="footer-column">
            <a href="" target="_blank" class="footer-links">The Quizizz Blog</a>
            <a href="" target="_blank" class="footer-links">Teacher Resources</a>
            <a href="https://quizizz.com/quizizzforwork?source=home_footer" target="_blank" class="footer-links">Quizizz for Work</a></div>
                        <div class="footer-column"><a href="" target="_blank" class="footer-links">Worksheets</a>
                            <a href="" target="_blank" class="footer-links">Reseller program</a>
                            <a href="" target="_blank" class="footer-links">Privacy Policy</a></div>
                        <div></div>
                    </div>
                </div>
                <div id="footnote" class="footer-bottom-wrapper">
                    <div></div>
                    <div class="footnote-right-contain">
                        <div class="copyright-text">2023 Quizizz Inc.</div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=60aca2b71ab9a5e4ececf1cf" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://quizizz.com/wf/script.js" type="text/javascript"></script>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3RKJ8L" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <script>
            window.Globals = {
                isProdEnvironment,
                sendAnalyticsEvent,
                setCookie,
                setCookieSecure,
                getCookie,
                getMediaType,
                sendPageViewEvent,
                setCanonicalUrl,
                setRequiredCanonical,
                sendLocalisationEvent,
                setMetaAb,
                sendPageViewEventOnClick,
                getFeatureFlags,
            };
            // minified
            async function getFeatureFlags() {
                try {
                    let x = await fetch("https://quizizz.com/features").then((x) => x.json()),
                        e = {};
                    return (
                        Object.keys(x.data.features).forEach((t) => {
                            e[t] = x.data.features[t] ? .defaultValue;
                        }),
                        e
                    );
                } catch (t) {
                    return null;
                }
            }

            function create_UUID() {
                var x = new Date().getTime();
                return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(e) {
                    var t = (x + 16 * Math.random()) % 16 | 0;
                    return (x = Math.floor(x / 16)), ("x" == e ? t : (3 & t) | 8).toString(16);
                });
            }

            function sendPageViewEventOnClick(selector, page) {
                document.querySelector(selector).addEventListener("click", () => {
                    Globals.sendPageViewEvent(page, window.location.pathname);
                });
            }
            async function setMetaAb() {
                let e = await fetch("https://quizizz.com/_meta/ab")
                    .then((e) => e.json())
                    .catch(() => ({
                        data: {}
                    })),
                    t = e.data.definiteCountry;
                window.Globals.setCookieSecure("definiteCountry", t, 1), window.Globals.getCookie("quizizz_uid");
                let i;
                try {
                    i = JSON.parse(window.localStorage.getItem("QuizizzAnalytics"));
                } catch (r) {}
                if (i) {
                    let a,
                        n = i.startingReferrer,
                        o = i.sessionId;
                    i.expiry < Date.now() ? ((a = Date.now() + 18e5), n !== document.referrer && (n = document.referrer), (o = create_UUID())) : (a = i.expiry), window.localStorage.setItem("QuizizzAnalytics", JSON.stringify({
                        sessionId: o,
                        startingReferrer: n,
                        eventCount: 0,
                        expiry: a
                    }));
                } else {
                    let s = Date.now();
                    window.localStorage.setItem("QuizizzAnalytics", JSON.stringify({
                        sessionId: create_UUID(),
                        startingReferrer: document.referrer,
                        eventCount: 0,
                        expiry: s + 18e5
                    }));
                }
            }

            function isProdEnvironment() {
                let curl = new URL($(location).attr("href"));
                return curl.hostname === "quizizz.com";
            }

            function getMediaType() {
                if (window.innerWidth >= 992) {
                    return "desktop";
                } else if (window.innerWidth >= 576) {
                    return "tablet";
                }
                return "mobile";
            }

            function setCanonicalUrl(e) {
                var n = document.querySelector("link[rel='canonical']") ? document.querySelector("link[rel='canonical']") : document.createElement("link");
                n.setAttribute("rel", "canonical"), n.setAttribute("href", e), document.head.appendChild(n);
            }

            function setRequiredCanonical() {
                const e = getCookie("crowdinLangCode") || "en",
                    n = window.location.href;
                let t = n.split("?")[0] + "?lng=" + e;
                ("en" !== e && e) || (t = n.split("?")[0]), setCanonicalUrl(t), (document.head.querySelector("link[rel='canonical']").href = t);
            }
            //# sourceMappingURL=lazyvideo-canonical-branding.min.js.map
            (function() {
                function removeWebflowBranding() {
                    let badgeElements = document.getElementsByClassName("w-webflow-badge");
                    for (element of badgeElements) {
                        element.remove();
                    }
                }

                function setRequiredCanonical() {
                    const t = getCookie("crowdinLangCode") || "en",
                        e = window.location.href;
                    let n = e.split("?")[0] + "?lng=" + t;
                    ("en" !== t && t) || (n = e.split("?")[0]);
                    var i = document.head.querySelector("link[rel='canonical']");
                    i.href = n;
                    const o = new MutationObserver(function(e, n) {
                        for (const o of e) {
                            const e = i.href,
                                s = window.location.href;
                            let r = s.split("?")[0] + "?lng=" + t;
                            ("en" !== t && t) || (r = s.split("?")[0]), "attributes" === o.type && (e.startsWith("https://quizizz.com?lng=") || e.startsWith("https://quizizz.com/?lng=")) && (i.href = r), n.disconnect();
                        }
                    });
                    o.observe(i, {
                        attributes: !0,
                        childList: !0,
                        subtree: !0
                    });
                }
                //# sourceMappingURL=canonical-branding.min.js.map
                function onDocumentReady() {
                    removeWebflowBranding();
                    setRequiredCanonical();
                    setMetaAb().then(() => sendPageview3Event().catch());
                    let url = $(location).attr("href");
                    if (!url.includes("webflow")) {
                        lazyLoadVideo();
                    }
                    setTimeout(function() {
                        removeWebflowBranding();
                    }, 2000);
                }
                $(document).ready(onDocumentReady);
            })();
            Globals.sendPageViewEventOnClick("#school-plan-quote", "/school-plan-typeform");
        </script>
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
        <script id="banner-script">
            async function getLocation() {
                const response = await fetch("https://quizizz.com/_geo/location");
                const data = await response.json();
                const {
                    region,
                    country
                } = data.data;
                return {
                    region,
                    country,
                };
            }

            function inUSA({
                country
            }) {
                return country ? .includes("US") || false;
            }

            function inNY({
                country,
                region
            }) {
                return inUSA({
                    country
                }) && region ? .includes("NY");
            }

            function notInUSA({
                country
            }) {
                return !country ? .includes("US");
            }
            async function renderBanner(id, checkL) {
                const l = await getLocation();
                const b = document.getElementById(id);
                if (b) {
                    if (checkL(l)) {
                        b.style.display = "flex";
                    } else {
                        b.style.display = "none";
                    }
                }
            }
            (async function handleBanners() {
                const BANNERS = [{
                        id: "super-trainer-row",
                        checkL: notInUSA
                    },
                    {
                        id: "BOCES-banner",
                        checkL: inNY
                    },
                    //      { id: 'certified-educators-us', checkL: inUSA }
                ];
                try {
                    await Promise.allSettled(BANNERS.map(async (b) => await renderBanner(b.id, b.checkL)));
                } catch (err) {
                    console.error("error", err);
                }
            })();
        </script>
        <script>
            const schoolPlanQuote = document.querySelector("#school-plan-quote");
            schoolPlanQuote.addEventListener("click", async (e) => {
                e.preventDefault();
                e.stopPropagation();
                const {
                    country
                } = await getLocation();
                if (country === "AU") {
                    window.location.href = "https://quizizz.typeform.com/to/iKFByhuz?typeform-source=quizizz.com&source=nav_button_v2&source_cat=marketing";
                } else if (country === "US") {
                    window.location.href = "https://quizizz.com/home/schools-districts-new-form-v1?source_detail=nav_button_paperformv2&source_cat=marketing";
                    if (window.location.pathname.includes("home-v1") || window.location.pathname.includes("homepage-experiment-v1")) {
                        window.location.href = "https://quizizz.com/home/schools-districts-new-form-v1?source_detail=nav_button_paperform_v3&source_cat=marketing&lng=en";
                    }
                } else {
                    window.location.href = "https://quizizz.typeform.com/to/vZxFA4SC?typeform-source=quizizz.com&source=nav_button&source_cat=marketing";
                    if (window.location.pathname.includes("home-v1") || window.location.pathname.includes("homepage-experiment-v1")) {
                        window.location.href = "https://quizizz.typeform.com/to/vZxFA4SC?typeform-source=quizizz.com&source=nav_button_v2&source_cat=marketing";
                    }
                }
            });
        </script>
        <script>
            (function() {
                function handlePageViewEvent() {
                    var currentURL = new URL($(location).attr("href"));
                    var ref = currentURL.searchParams.get("ref");
                    var source = Boolean(ref) ? "Route" : "BrowserLoad";

                    Globals.sendPageViewEvent("/homepage", source);

                    if (ref) {
                        currentURL.searchParams.delete("ref");
                        window.location.replace(currentURL.toString());
                    }
                }

                function onDocumentReady() {
                    handlePageViewEvent();
                }

                $(document).ready(onDocumentReady);
            })();
        </script>
        <style>
            .testimonial-row-wrapper._2.splide__track {
                direction: unset !important;
            }
        </style>

        

        <script>
            $(document).ready(function() {
                let progressBar1 = $(".progress-bar._1")[0];
                let progressBar2 = $(".progress-bar._2")[0];
                let progressBar3 = $(".progress-bar._3")[0];
                let progressBar4 = $(".progress-bar-blue._1")[0];
                let progressBar5 = $(".progress-bar-blue._2")[0];
                let progressBar6 = $(".progress-bar-blue._3")[0];
                let tabs = $(".tab");
                //let video= $("video.video1")[0];
                let tab1 = $(".tab._1");
                let tab2 = $(".tab._4");
                let tab3 = $(".tab._3");
                let tab4 = $(".tab2.t1");
                let tab5 = $(".tab2.t2");
                let tab6 = $(".tab2.t3");
                let videoDuration = 16;
                let intervalDuration = 300;
                console.log(videoDuration);
                let width1 = 0;
                let width2 = 0;
                let width3 = 0;
                let width4 = 0;
                let width5 = 0;
                let width6 = 0;

                function reset1() {
                    width1 = 0;
                    progressBar1.style.width = width1 + "%";
                }

                function reset2() {
                    width2 = 0;
                    progressBar2.style.width = width2 + "%";
                }

                function reset3() {
                    width3 = 0;
                    progressBar3.style.width = width3 + "%";
                }
                //////////
                function reset4() {
                    width4 = 0;
                    progressBar4.style.width = width4 + "%";
                }

                function reset5() {
                    width5 = 0;
                    progressBar5.style.width = width5 + "%";
                }

                function reset6() {
                    width6 = 0;
                    progressBar6.style.width = width6 + "%";
                }

                /// run func 1/////
                function runFunc() {
                    //switch()

                    if (tab1.hasClass("w--current") == true) {}
                    if (tab2.hasClass("w--current") == true) {}
                    if (tab3.hasClass("w--current") == true) {}
                }

                function runFunc2() {
                    if (tab4.hasClass("w--current") == true) {}
                    if (tab5.hasClass("w--current") == true) {}
                    if (tab6.hasClass("w--current") == true) {}
                }
            });
        </script>

        <!-- Logo Slider Splide -->
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.3.7/dist/js/splide-extension-auto-scroll.min.js"></script>
        <script>
            function leftSlider() {
                const splides = document.querySelectorAll(".carousel-1");
                for (let i = 0; i < splides.length; i++) {
                    new Splide(splides[i], {
                        perPage: 2,
                        pagination: false,
                        autoWidth: true,
                        arrows: false,
                        focus: "0", // 0 = left and 'center' = center
                        type: "loop", // 'loop' or 'slide'
                        gap: "20px", // space between slides
                        autoScroll: {
                            autoStart: true,
                            speed: 1,
                            pauseOnHover: true,
                            pauseOnFocus: true,
                        },
                        breakpoints: {
                            1500: {
                                // Laptops
                                perPage: 5,
                            },
                            1300: {
                                // Small laptops
                                perPage: 4,
                            },
                            991: {
                                // Tablet
                                perPage: 3,
                            },
                            479: {
                                // Mobile Portrait
                                //perPage: 2,
                                gap: "20px",
                            },
                            355: {
                                // Mobile Portrait
                                //perPage: 2,
                                gap: "15px",
                            },
                        },
                    }).mount(window.splide.Extensions);
                }
            }
            leftSlider();
        </script>
        <!-- Logo Slider Splide 2-->
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.3.7/dist/js/splide-extension-auto-scroll.min.js"></script>
        <script>
            function rightSlider() {
                const splides = document.querySelectorAll(".carousel-2");
                for (let i = 0; i < splides.length; i++) {
                    new Splide(splides[i], {
                        perPage: 3,
                        pagination: false,
                        autoWidth: true,
                        arrows: false,
                        focus: "0", // 0 = left and 'center' = center
                        type: "loop", // 'loop' or 'slide'
                        gap: "20px", // space between slides
                        autoScroll: {
                            autoStart: true,
                            speed: 1,
                            pauseOnHover: true,
                            pauseOnFocus: true,
                        },
                        breakpoints: {
                            1500: {
                                // Laptops
                                perPage: 5,
                            },
                            1300: {
                                // Small laptops
                                perPage: 4,
                            },
                            991: {
                                // Tablet
                                perPage: 3,
                            },
                            479: {
                                // Mobile Portrait
                                //perPage: 2,
                                gap: "20px",
                            },
                            355: {
                                // Mobile Portrait
                                //perPage: 2,
                                gap: "15px",
                            },
                        },
                    }).mount(window.splide.Extensions);
                }
            }
            rightSlider();
        </script>

        <!-- Testimonial Sliders2-->
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.3.7/dist/js/splide-extension-auto-scroll.min.js"></script>
        <script>
            function testimonialSlider() {
                const splides = document.querySelectorAll(".testimonial-container");
                for (let i = 0; i < splides.length; i++) {
                    new Splide(splides[i], {
                        perPage: 5,
                        pagination: false,
                        autoWidth: true,
                        arrows: false, // 0 = left and 'center' = center
                        type: "loop", // 'loop' or 'slide'
                        gap: "20px", // space between slides
                        autoScroll: {
                            autoStart: true,
                            speed: 1,
                            pauseOnHover: true,
                            pauseOnFocus: true,
                        },
                        breakpoints: {
                            1500: {
                                // Laptops
                                perPage: 5,
                            },
                            1300: {
                                // Small laptops
                                perPage: 4,
                            },
                            991: {
                                // Tablet
                                perPage: 3,
                            },
                            479: {
                                // Mobile Portrait
                                //perPage: 2,
                                gap: "20px",
                            },
                            355: {
                                // Mobile Portrait
                                //perPage: 2,
                                gap: "15px",
                            },
                        },
                    }).mount(window.splide.Extensions);
                }
            }
            testimonialSlider();
        </script>

        <script src="https://tools.refokus.com/rich-text-enhancer/bundle.v1.0.0.js"></script>
        <!-- [Attributes by Finsweet] CMS Slider -->
        <script async src="https://cdn.jsdelivr.net/npm/@finsweet/attributes-cmsslider@1/cmsslider.js"></script>
</body>

</html>