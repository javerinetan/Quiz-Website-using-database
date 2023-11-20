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
                                    
            <a href="" class="nav-link w-nav-link">Quizit for Work</a>
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
        $query="select * from account where id=".$_SESSION['User']."";
        $results=mysqli_query($con,$query);
        $row=$results->fetch_assoc();
        echo 'Welcome '. ucfirst($row['name']) . "!";
        echo '<a id="sign-up-top-nav" href="./user/user_account.php" class="button-sign-up w-button">Account</a>';
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
        <a id="sign-up-hero-home" href="./account/signup.php" class="purple-button">
            <div class="button-subtext">Users</div>
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

        <div class="sticky-tabs-section">
            <div data-w-id="7b2a0029-6bc8-d394-144e-7bf1119606f8" class="sticky-tabs-wrapper">
                <div class="sticky-bar-contain">
                    <div class="sticky-bar-wrapper desktop">
                        <a href="#create" class="sticky-link _1 w-inline-block">
                            <div>Create &amp; Customize</div>
                            <div class="sticky-icons-contain">
                                <img src="https://quizizz.com/wf/assets/62fa6419161d3a5253681cbb_file-plus_white.svg" loading="lazy" alt="File Icon" class="sticky-icon-white _1" />
                                <img src="https://quizizz.com/wf/assets/62fa6419161d3a67ef681c96_file-plus_black.svg" loading="lazy" alt="File Icon" class="sticky-icon _1" />
                            </div>
                        </a>
                        <a href="#include" class="sticky-link _2 w-inline-block">
                            <div>Include &amp; Engage</div>
                            <div class="sticky-icons-contain">
                                <img src="https://quizizz.com/wf/assets/62fa6419161d3a3807681c9e_Users_-_White.svg" loading="lazy" alt="Users Icon" class="sticky-icon-white _2" />
                                <img src="https://quizizz.com/wf/assets/62fa641a161d3a4123681d01_Users_Black.svg" loading="lazy" alt="Users Icon" class="sticky-icon _2" /></div>
                        </a>
                        <a href="#data" class="sticky-link _3 w-inline-block">
                            <div>Get Data</div>
                            <div class="sticky-icons-contain">
                                <img src="https://quizizz.com/wf/assets/62fa6419161d3a0bd0681ced_Chart_-_White.svg" loading="lazy" alt="Chart Icon" class="sticky-icon-white _3" />
                                <img src="https://quizizz.com/wf/assets/62fa6419161d3a9caa681cdd_Chart_-_Black.svg" loading="lazy" alt="Chart Icon" class="sticky-icon _3" /></div>
                        </a>
                    </div>
                    <div class="sticky-bar-wrapper large">
                        <a href="#create" class="sticky-link _1 w-inline-block">
                            <div>Create &amp; Customize</div>
                            <div class="sticky-icons-contain">
                                <img src="https://quizizz.com/wf/assets/62fa6419161d3a5253681cbb_file-plus_white.svg" loading="lazy" alt="File Icon" class="sticky-icon-white _1" />
                                <img src="https://quizizz.com/wf/assets/62fa6419161d3a67ef681c96_file-plus_black.svg" loading="lazy" alt="File Icon" class="sticky-icon _1" />
                            </div>
                        </a>
                        <a href="#include" class="sticky-link _2 w-inline-block">
                            <div>Include &amp; Engage</div>
                            <div class="sticky-icons-contain">
                                <img src="https://quizizz.com/wf/assets/62fa6419161d3a3807681c9e_Users_-_White.svg" loading="lazy" alt="Users Icon" class="sticky-icon-white _2" />
                                <img src="https://quizizz.com/wf/assets/62fa641a161d3a4123681d01_Users_Black.svg" loading="lazy" alt="Users Icon" class="sticky-icon _2" />
                            </div>
                        </a>
                        <a href="#data" class="sticky-link _3 w-inline-block">
                            <div>Get Data</div>
                            <div class="sticky-icons-contain">
                                <img src="https://quizizz.com/wf/assets/62fa6419161d3a0bd0681ced_Chart_-_White.svg" loading="lazy" alt="Chart Icon" class="sticky-icon-white _3" />
                                <img src="https://quizizz.com/wf/assets/62fa6419161d3a9caa681cdd_Chart_-_Black.svg" loading="lazy" alt="Chart Icon" class="sticky-icon _3" />
                            </div>
                        </a>
                    </div>
                </div>
                <div class="sticky-blocks-contain">
                    <div class="sticky-flex-contain">
                        <div class="sticky-left-wrapper">
                            <div id="create" class="tab-text-contain sticky-one">
                                <div class="sticky-link _1 mobile">
                                    <div>Create &amp; Customize</div>
                                    <div class="sticky-icons-contain"F><img src="https://quizizz.com/wf/assets/62fa6419161d3ae113681c90_file-plus_4.svg" loading="lazy" alt="File Icon" class="sticky-icon _1" /></div>
                                </div>
                                <div class="sticky-heading-wrap">
                                    <h4 class="sticky-headings _1"><span class="quickly-span">Quickly find or </span><span class="create-span">create</span> anything in your curriculum</h4>
                                    <div class="sticky-placeholder-1"></div>
                                </div>
                                <p class="sticky-paragraph">Prepare high-quality, interactive content in as little as two minutes.</p>
                                <div class="points-contain">
                                    <div class="points-wrapper">
                                        <img src="https://quizizz.com/wf/assets/62fa641a161d3a0e3d681d08_Books_Icon.svg" loading="eager" alt="Books Icon" class="sticky-icons" />
                                        <div class="points-heading">
                                            <div class="sticky-point-heading">Customizable content library</div>
                                            <p class="point-paragraph">30M+ teacher-created activities spanning all grade levels and subjects</p>
                                        </div>
                                    </div>
                                    <div class="points-wrapper">
                                        <img src="https://quizizz.com/wf/assets/62fa6419161d3a0c96681c94_Pen_to_square_Icon.svg" loading="eager" alt="Pen to square Icon" class="sticky-icons" />
                                        <div class="points-heading">
                                            <div class="sticky-point-heading">Create, copy, or edit</div>
                                            <p class="point-paragraph">Build from scratch, copy entire activities, or mix and match to meet students’ needs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sticky-image-wrapper">
                            <div class="lotties-contain _1">
                                <div data-poster-url="https://quizizz.com/wf/assets/632a2c2c8adda7ed0e12491c_Unique (1)-poster-00001.jpg" data-video-urls="https://quizizz.com/wf/assets/632a2c2c8adda7ed0e12491c_Unique (1)-transcode.mp4,https://quizizz.com/wf/assets/632a2c2c8adda7ed0e12491c_Unique (1)-transcode.webm"
                                    data-autoplay="true" data-loop="true" data-wf-ignore="true" class="sticky-tab-video first w-background-video w-background-video-atom">
                                    <video id="dc070cdd-f5cf-b208-73d1-5627af3bd3b4-video" autoplay="" loop="" style="background-image: url('https://quizizz.com/wf/assets/632a2c2c8adda7ed0e12491c_Unique (1)-poster-00001.jpg')" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                                        <source data-src="https://quizizz.com/wf/assets/632a2c2c8adda7ed0e12491c_Unique (1)-transcode.mp4" data-wf-ignore="true" />
                                        <source data-src="https://quizizz.com/wf/assets/632a2c2c8adda7ed0e12491c_Unique (1)-transcode.webm" data-wf-ignore="true" />
                                    </video>
                                </div>
                                <div data-poster-url="https://quizizz.com/wf/assets/632a2f30a7f9ea613f685bb3_mobile-c (1)-poster-00001.jpg" data-video-urls="https://quizizz.com/wf/assets/632a2f30a7f9ea613f685bb3_mobile-c (1)-transcode.mp4,https://quizizz.com/wf/assets/632a2f30a7f9ea613f685bb3_mobile-c (1)-transcode.webm"
                                    data-autoplay="true" data-loop="true" data-wf-ignore="true" class="sticky-tab-video _1 mobile w-background-video w-background-video-atom">
                                    <video id="e689f8c3-e71d-2288-7533-4aa0bb33315a-video" autoplay="" loop="" style="background-image: url('https://quizizz.com/wf/assets/632a2f30a7f9ea613f685bb3_mobile-c (1)-poster-00001.jpg')" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                    <source data-src="https://quizizz.com/wf/assets/632a2f30a7f9ea613f685bb3_mobile-c (1)-transcode.mp4" data-wf-ignore="true" />
                    <source data-src="https://quizizz.com/wf/assets/632a2f30a7f9ea613f685bb3_mobile-c (1)-transcode.webm" data-wf-ignore="true" />
                </video>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sticky-flex-wrapper">
                        <div class="sticky-flex-contain">
                            <div id="include" class="sticky-left-wrapper">
                                <div class="tab-text-contain sticky-two">
                                    <div class="sticky-link _2 mobile">
                                        <div>Include &amp; Engage</div>
                                        <div class="sticky-icons-contain"><img src="https://quizizz.com/wf/assets/62fa6419161d3a47e8681c9d_file-plus_4.svg" loading="lazy" alt="File Icon" class="sticky-icon _1" /></div>
                                    </div>
                                    <h4 class="sticky-headings _2">Include and engage <span class="every-student-span">every student</span></h4>
                                    <p class="sticky-paragraph">Flexibly engage students at their own pace, from any device.</p>
                                    <div class="points-contain">
                                        <div class="points-wrapper">
                                            <img src="https://quizizz.com/wf/assets/62fa6419161d3a923a681c85_Purple_Glasses.svg" loading="eager" alt="Purple Glasses Icon" class="sticky-icons" />
                                            <div class="points-heading">
                                                <div class="sticky-point-heading">Inclusive, accessible design</div>
                                                <p class="point-paragraph">Enable Read Aloud for elementary and ELL students</p>
                                            </div>
                                        </div>
                                        <div class="points-wrapper">
                                            <img src="https://quizizz.com/wf/assets/62fa6419161d3a49ed681cec_Gamepad.svg" loading="eager" alt="Gamepad Icon" class="sticky-icons" />
                                            <div class="points-heading">
                                                <div class="sticky-point-heading">Gamification for good</div>
                                                <p class="point-paragraph">A leaderboard, themes, music, and more to motivate students</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sticky-image-wrapper images">
                                <div class="lotties-contain _2">
                                    <img src="https://quizizz.com/wf/assets/64f5b0963efaa4030e778e9f_63339124c299bb0fb4f8c452_Group_482935-min.webp" loading="lazy" sizes="(max-width: 767px) 90vw, (max-width: 991px) 600px, (max-width: 1439px) 47vw, 665.59375px" srcset="https://quizizz.com/wf/assets/64f5b0963efaa4030e778e9f_63339124c299bb0fb4f8c452_Group_482935-min-p-500.webp 500w, https://quizizz.com/wf/assets/64f5b0963efaa4030e778e9f_63339124c299bb0fb4f8c452_Group_482935-min-p-800.webp 800w, https://quizizz.com/wf/assets/64f5b0963efaa4030e778e9f_63339124c299bb0fb4f8c452_Group_482935-min-p-1080.webp 1080w, https://quizizz.com/wf/assets/64f5b0963efaa4030e778e9f_63339124c299bb0fb4f8c452_Group_482935-min-p-1600.webp 1600w, https://quizizz.com/wf/assets/64f5b0963efaa4030e778e9f_63339124c299bb0fb4f8c452_Group_482935-min.webp 2656w"
                                        alt="" class="sticky-tab-image" /><img src="https://quizizz.com/wf/assets/64f5b07d8d24393191630ed3_62fe8881eec8ec4dc1fb783d_Group_40285_1.webp" loading="lazy" alt="" class="tab-absolute-img"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="sticky-flex-contain">
                            <div id="data" class="sticky-left-wrapper">
                                <div class="tab-text-contain sticky-three">
                                    <div class="sticky-link _3 mobile">
                                        <div>Get Data</div>
                                        <div class="sticky-icons-contain"><img src="https://quizizz.com/wf/assets/62fa6419161d3a59e5681cf0_file-plus_5.svg" loading="lazy" alt="File Icon" class="sticky-icon-white _1" /><img src="https://quizizz.com/wf/assets/62fa6419161d3a67ef681c96_file-plus_black.svg"
                                                loading="lazy" alt="File Icon" class="sticky-icon _1" /></div>
                                    </div>
                                    <h4 class="sticky-headings _3">Get data that’s <span class="easy-span">easy to act on</span></h4>
                                    <p class="sticky-paragraph">The exact insights you need to make data-driven instruction a reality.</p>
                                    <div class="points-contain">
                                        <div class="points-wrapper">
                                            <img src="https://quizizz.com/wf/assets/62fa6419161d3a1159681cb8_User_Clock.svg" loading="eager" alt="User Clock Icon" class="sticky-icons" />
                                            <div class="points-heading">
                                                <div class="sticky-point-heading">Real-time insights</div>
                                                <p class="point-paragraph">Identify student’s needs and immediately adapt</p>
                                            </div>
                                        </div>
                                        <div class="points-wrapper">
                                            <img src="https://quizizz.com/wf/assets/62fa641a161d3a3310681d0d_Green_Chart.svg" loading="eager" alt="Green Chart Icon" class="sticky-icons" />
                                            <div class="points-heading">
                                                <div class="sticky-point-heading">Snapshot reports</div>
                                                <p class="point-paragraph">See overall class performance, the toughest question or topic, and individual progress</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sticky-image-wrapper images">
                                <div class="lotties-contain _3">
                                    <img src="https://quizizz.com/wf/assets/64f5b15937f3c9809b8db626_6333921d3b3392cd0cfc3681_Group_482936-min.webp" loading="lazy" sizes="(max-width: 767px) 90vw, (max-width: 991px) 600px, (max-width: 1439px) 47vw, 665.59375px" srcset="https://quizizz.com/wf/assets/64f5b15937f3c9809b8db626_6333921d3b3392cd0cfc3681_Group_482936-min-p-500.webp 500w, https://quizizz.com/wf/assets/64f5b15937f3c9809b8db626_6333921d3b3392cd0cfc3681_Group_482936-min-p-800.webp 800w, https://quizizz.com/wf/assets/64f5b15937f3c9809b8db626_6333921d3b3392cd0cfc3681_Group_482936-min-p-1080.webp 1080w, https://quizizz.com/wf/assets/64f5b15937f3c9809b8db626_6333921d3b3392cd0cfc3681_Group_482936-min-p-1600.webp 1600w, https://quizizz.com/wf/assets/64f5b15937f3c9809b8db626_6333921d3b3392cd0cfc3681_Group_482936-min.webp 2656w"
                                        alt="" class="sticky-tab-image" /><img src="https://quizizz.com/wf/assets/64f5b1693e2504f6bbe52b00_62fe8a7b63e52b4f85f2f622_visual_1.webp" loading="lazy" alt="" class="tab-absolute-img top-right"
                                    /><img src="https://quizizz.com/wf/assets/64f5b17aae3b5131996b7807_62fe8b07062f505be009f768_visual_2_1.webp" loading="lazy" sizes="(max-width: 767px) 45vw, (max-width: 991px) 175px, 370px" srcset="https://quizizz.com/wf/assets/64f5b17aae3b5131996b7807_62fe8b07062f505be009f768_visual_2_1-p-500.webp 500w, https://quizizz.com/wf/assets/64f5b17aae3b5131996b7807_62fe8b07062f505be009f768_visual_2_1.webp 740w"
                                        alt="" class="tab-absolute-img left" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="black-tabs-section">
            <div class="wrap-video-tabs">
                <div class="tabs-left-column">
                    <div class="tab-subheading">ASSESSMENT AND PRACTICE</div>
                    <h2 class="tabs-title"><span class="beyond-span">Beyond </span>multiple choice</h2>
                </div>
            </div>
            <div class="tab-contain">
                <div data-current="Tab 2" data-easing="ease" data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                    <div class="tabs-menu _1 w-tab-menu">
                        <a data-w-tab="Tab 1" data-w-id="39b6ecaf-553a-7c09-6f1f-87bb69a5db15" class="tab _1 w-inline-block w-tab-link">
                            <div class="tab-headings-contain">
                                <img alt="" loading="lazy" src="https://quizizz.com/wf/assets/6306738a1a15fcdb658d3bac_message-question_yellow.svg" class="tab-icon-yellow _1" />
                                <div class="tab-headings">Every question type</div>
                            </div>
                            <div class="tab-paragraph-contain">
                                <p class="tab-paragraph">Engage students with question types at every level of Bloom’s taxonomy.</p>
                            </div>
                            <div class="tab-yellow-indicator">
                                <div style="width: 0%" class="progress-bar"></div>
                            </div>
                        </a>
                        <a data-w-tab="Tab 2" data-w-id="39b6ecaf-553a-7c09-6f1f-87bb69a5db1f" class="tab _4 w-inline-block w-tab-link w--current">
                            <div class="tab-headings-contain">
                                <img alt="" loading="lazy" src="https://quizizz.com/wf/assets/630673099142af0d3c011842_square-bolt_yellow.svg" class="tab-icon-yellow _2" />
                                <div class="tab-headings">Powerful micro-motivators</div>
                            </div>
                            <div class="tab-paragraph-contain">
                                <p class="tab-paragraph">Redemption Questions and Power-Ups drive multiple retakes and mastery–in class and at home.</p>
                            </div>
                            <div class="tab-yellow-indicator">
                                <div class="progress-bar _2"></div>
                            </div>
                        </a>
                        <a data-w-tab="Tab 3" data-w-id="39b6ecaf-553a-7c09-6f1f-87bb69a5db29" class="tab _3 w-inline-block w-tab-link">
                            <div class="tab-headings-contain">
                                <img alt="Award Icon" loading="lazy" src="https://quizizz.com/wf/assets/62fa6419161d3a68ed681ce8_Award_-_Yellow.svg" class="tab-icon-yellow _3" />
                                <div class="tab-headings">Low-stakes competition</div>
                            </div>
                            <div class="tab-paragraph-contain">
                                <p class="tab-paragraph">Promote friendly competition and get every student to participate, not just the loudest and the fastest.</p>
                            </div>
                            <div class="tab-yellow-indicator">
                                <div class="progress-bar _3"></div>
                            </div>
                        </a>
                    </div>
                    <div class="tabs-content _1 w-tab-content">
                        <div data-w-tab="Tab 1" class="tab-pane-tab-1 w-tab-pane">
                            <div class="tab-image-wrapper">
                                <div data-poster-url="https://quizizz.com/wf/assets/62ffd7d3b946fc53847c7e6d_Animation_3_6-poster-00001.jpg" data-video-urls="https://quizizz.com/wf/assets/62ffd7d3b946fc53847c7e6d_Animation_3_6-transcode.mp4,https://quizizz.com/wf/assets/62ffd7d3b946fc53847c7e6d_Animation_3_6-transcode.webm"
                                    data-autoplay="true" data-loop="true" data-wf-ignore="true" class="black-tab-1-video w-background-video w-background-video-atom">
                                    <video id="cfcf7194-2276-3e57-6469-874a397c0ae3-video" autoplay="" loop="" style="background-image: url('https://quizizz.com/wf/assets/62ffd7d3b946fc53847c7e6d_Animation_3_6-poster-00001.jpg')" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                    <source data-src="https://quizizz.com/wf/assets/62ffd7d3b946fc53847c7e6d_Animation_3_6-transcode.mp4" data-wf-ignore="true" />
                    <source data-src="https://quizizz.com/wf/assets/62ffd7d3b946fc53847c7e6d_Animation_3_6-transcode.webm" data-wf-ignore="true" />
                </video>
                                </div>
                            </div>
                        </div>
                        <div data-w-tab="Tab 2" class="tab-pane-tab-2 w-tab-pane w--tab-active">
                            <div class="tab-image-wrapper"><img sizes="(max-width: 767px) 90vw, (max-width: 991px) 576px, (max-width: 1279px) 45vw, 576px" srcset="https://quizizz.com/wf/assets/64f5b1df4d54783a33886c8f_6333935b3c71aa04c064908f_Group_40477-min_(1)-p-500.webp 500w, https://quizizz.com/wf/assets/64f5b1df4d54783a33886c8f_6333935b3c71aa04c064908f_Group_40477-min_(1)-p-800.webp 800w, https://quizizz.com/wf/assets/64f5b1df4d54783a33886c8f_6333935b3c71aa04c064908f_Group_40477-min_(1)-p-1080.webp 1080w, https://quizizz.com/wf/assets/64f5b1df4d54783a33886c8f_6333935b3c71aa04c064908f_Group_40477-min_(1).webp 1728w"
                                    src="https://quizizz.com/wf/assets/64f5b1df4d54783a33886c8f_6333935b3c71aa04c064908f_Group_40477-min_(1).webp" loading="lazy" alt="" class="image-poster _2" /></div>
                        </div>
                        <div data-w-tab="Tab 3" class="tab-pane-tab-3 w-tab-pane">
                            <div class="tab-image-wrapper">
                                <div data-poster-url="https://quizizz.com/wf/assets/62fbf839fb3e276f4c77b6ea_Black Tab Video 3-poster-00001.jpg" data-video-urls="https://quizizz.com/wf/assets/62fbf839fb3e276f4c77b6ea_Black Tab Video 3-transcode.mp4,https://quizizz.com/wf/assets/62fbf839fb3e276f4c77b6ea_Black Tab Video 3-transcode.webm"
                                    data-autoplay="true" data-loop="true" data-wf-ignore="true" class="black-tab-1-video w-background-video w-background-video-atom">
                                    <video id="9428c72e-2358-0432-cda5-e9afb44aa47a-video" autoplay="" loop="" style="background-image: url('https://quizizz.com/wf/assets/62fbf839fb3e276f4c77b6ea_Black Tab Video 3-poster-00001.jpg')" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                    <source data-src="https://quizizz.com/wf/assets/62fbf839fb3e276f4c77b6ea_Black Tab Video 3-transcode.mp4" data-wf-ignore="true" />
                    <source data-src="https://quizizz.com/wf/assets/62fbf839fb3e276f4c77b6ea_Black Tab Video 3-transcode.webm" data-wf-ignore="true" />
                </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-tabs-section">
            <div class="wrap-video-tabs">
                <div class="tabs-left-column">
                    <div class="tab-subheading black">INSTRUCTION</div>
                    <h2 class="tabs-title black"><span class="beyond-blue-span">Beyond</span> quizzes</h2>
                </div>
            </div>
            <div class="tab-contain">
                <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
                    <div class="tabs-menu _2 w-tab-menu">
                        <a data-w-tab="Tab 1" data-w-id="e2b04c24-69fc-ddc3-f1f7-a4034a92bbcb" class="tab2 t1 w-inline-block w-tab-link w--current">
                            <div class="tab-headings-contain">
                                <img loading="lazy" src="https://quizizz.com/wf/assets/62fa641a161d3a3d8f681d0b_square-bolt_yellow.svg" alt="" class="tab-icon-yellow _2" />
                                <div class="tab-headings _2">Interactive lessons</div>
                            </div>
                            <div class="tab-paragraph-contain">
                                <p class="tab-paragraph black">Easily embed images and video, import existing slides, and seamlessly blend in assessment.</p>
                            </div>
                            <div class="tab-blue-indicator">
                                <div class="progress-bar-blue _1"></div>
                            </div>
                        </a>
                        <a data-w-tab="Tab 2" data-w-id="e2b04c24-69fc-ddc3-f1f7-a4034a92bbd5" class="tab2 t2 w-inline-block w-tab-link">
                            <div class="tab-headings-contain">
                                <img loading="lazy" src="https://quizizz.com/wf/assets/62fa641a161d3a3d8f681d0b_square-bolt_yellow.svg" alt="" class="tab-icon-yellow _2" />
                                <div class="tab-headings _2">Spin the wheel</div>
                            </div>
                            <div class="tab-paragraph-contain">
                                <p class="tab-paragraph black">Take the stress out of cold calls and make it fun for students to share what they know.</p>
                            </div>
                            <div class="tab-blue-indicator">
                                <div class="progress-bar-blue _2"></div>
                            </div>
                        </a>
                        <a data-w-tab="Tab 3" data-w-id="e2b04c24-69fc-ddc3-f1f7-a4034a92bbdf" class="tab2 t3 w-inline-block w-tab-link">
                            <div class="tab-headings-contain">
                                <img loading="lazy" src="https://quizizz.com/wf/assets/62fa641a161d3a3d8f681d0b_square-bolt_yellow.svg" alt="" class="tab-icon-yellow _2" />
                                <div class="tab-headings _2">Whiteboard</div>
                            </div>
                            <div class="tab-paragraph-contain">
                                <p class="tab-paragraph black">Enable real-time insights and check for understanding during instruction.</p>
                            </div>
                            <div class="tab-blue-indicator">
                                <div class="progress-bar-blue _3"></div>
                            </div>
                        </a>
                    </div>
                    <div class="tabs-content _2 w-tab-content">
                        <div data-w-tab="Tab 1" class="tab-pane-tab-1 w-tab-pane w--tab-active">
                            <div class="tab-image-wrapper white-tab-1">
                                <img sizes="(max-width: 767px) 90vw, (max-width: 991px) 600px, (max-width: 1439px) 45vw, 600px" srcset="https://quizizz.com/wf/assets/64f6d64977ade53deb4d94cd_6333995b5cbe41c32606ffba_Surface_Pro_8_-_13-min-p-500.webp 500w, https://quizizz.com/wf/assets/64f6d64977ade53deb4d94cd_6333995b5cbe41c32606ffba_Surface_Pro_8_-_13-min-p-800.webp 800w, https://quizizz.com/wf/assets/64f6d64977ade53deb4d94cd_6333995b5cbe41c32606ffba_Surface_Pro_8_-_13-min-p-1080.webp 1080w, https://quizizz.com/wf/assets/64f6d64977ade53deb4d94cd_6333995b5cbe41c32606ffba_Surface_Pro_8_-_13-min-p-1600.webp 1600w, https://quizizz.com/wf/assets/64f6d64977ade53deb4d94cd_6333995b5cbe41c32606ffba_Surface_Pro_8_-_13-min.webp 1848w"
                                    alt="" src="https://quizizz.com/wf/assets/64f6d64977ade53deb4d94cd_6333995b5cbe41c32606ffba_Surface_Pro_8_-_13-min.webp" loading="lazy" class="image-poster white-1" /><img sizes="(max-width: 479px) 41vw, (max-width: 767px) 40vw, (max-width: 991px) 292.5px, (max-width: 1439px) 25vw, 352px"
                                    srcset="https://quizizz.com/wf/assets/64f6d6578dcca1b7d38bcfed_6333a4ea38b4fd5375eba022_Group_40512-min-p-500.webp 500w, https://quizizz.com/wf/assets/64f6d6578dcca1b7d38bcfed_6333a4ea38b4fd5375eba022_Group_40512-min-p-800.webp 800w, https://quizizz.com/wf/assets/64f6d6578dcca1b7d38bcfed_6333a4ea38b4fd5375eba022_Group_40512-min-p-1080.webp 1080w, https://quizizz.com/wf/assets/64f6d6578dcca1b7d38bcfed_6333a4ea38b4fd5375eba022_Group_40512-min.webp 1440w"
                                    alt="" src="https://quizizz.com/wf/assets/64f6d6578dcca1b7d38bcfed_6333a4ea38b4fd5375eba022_Group_40512-min.webp" loading="lazy" class="tab-absolute" />
                                <div data-poster-url="https://quizizz.com/wf/assets/62fcf05cf65b24a2bc6c6bd1_Animation_6_3-poster-00001.jpg" data-video-urls="https://quizizz.com/wf/assets/62fcf05cf65b24a2bc6c6bd1_Animation_6_3-transcode.mp4,https://quizizz.com/wf/assets/62fcf05cf65b24a2bc6c6bd1_Animation_6_3-transcode.webm"
                                    data-autoplay="true" data-loop="true" data-wf-ignore="true" class="white-tab-video white-video-1 w-background-video w-background-video-atom">
                                    <video id="3b54b7e9-2662-3294-5412-858c3b48923b-video" autoplay="" loop="" style="background-image: url('https://quizizz.com/wf/assets/62fcf05cf65b24a2bc6c6bd1_Animation_6_3-poster-00001.jpg')" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                    <source data-src="https://quizizz.com/wf/assets/62fcf05cf65b24a2bc6c6bd1_Animation_6_3-transcode.mp4" data-wf-ignore="true" />
                    <source data-src="https://quizizz.com/wf/assets/62fcf05cf65b24a2bc6c6bd1_Animation_6_3-transcode.webm" data-wf-ignore="true" />
                </video>
                                </div>
                            </div>
                        </div>
                        <div data-w-tab="Tab 2" class="tab-pane-tab-2 w-tab-pane">
                            <div class="tab-image-wrapper">
                                <img sizes="100vw" srcset="https://quizizz.com/wf/assets/62fa641a161d3a6053681d2e_White_20Tab_202-p-500.webp 500w, https://quizizz.com/wf/assets/62fa641a161d3a6053681d2e_White_Tab_2.webp 666w" alt="White Tab 2" src="https://quizizz.com/wf/assets/62fa641a161d3a6053681d2e_White_Tab_2.webp"
                                    loading="lazy" class="image-poster white-tab-2" />
                                <div data-poster-url="https://quizizz.com/wf/assets/62fc1ebe8610b1d22b2a153d_White Tab Video - Tab 2-poster-00001.jpg" data-video-urls="https://quizizz.com/wf/assets/62fc1ebe8610b1d22b2a153d_White Tab Video - Tab 2-transcode.mp4,https://quizizz.com/wf/assets/62fc1ebe8610b1d22b2a153d_White Tab Video - Tab 2-transcode.webm"
                                    data-autoplay="true" data-loop="true" data-wf-ignore="true" class="black-tab-1-video hide w-background-video w-background-video-atom">
                                    <video id="22668a47-0127-665e-66da-667ba86c88c6-video" autoplay="" loop="" style="background-image: url('https://quizizz.com/wf/assets/62fc1ebe8610b1d22b2a153d_White Tab Video - Tab 2-poster-00001.jpg')" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                    <source data-src="https://quizizz.com/wf/assets/62fc1ebe8610b1d22b2a153d_White Tab Video - Tab 2-transcode.mp4" data-wf-ignore="true" />
                    <source data-src="https://quizizz.com/wf/assets/62fc1ebe8610b1d22b2a153d_White Tab Video - Tab 2-transcode.webm" data-wf-ignore="true" />
                </video>
                                </div>
                                <div data-poster-url="https://quizizz.com/wf/assets/62fcf151143c4e2f85e00571_Animation_5_6-poster-00001.jpg" data-video-urls="https://quizizz.com/wf/assets/62fcf151143c4e2f85e00571_Animation_5_6-transcode.mp4,https://quizizz.com/wf/assets/62fcf151143c4e2f85e00571_Animation_5_6-transcode.webm"
                                    data-autoplay="true" data-loop="true" data-wf-ignore="true" class="white-tab-video w-background-video w-background-video-atom">
                                    <video id="c8b90ec1-1124-45bd-8289-a4e43860bc33-video" autoplay="" loop="" style="background-image: url('https://quizizz.com/wf/assets/62fcf151143c4e2f85e00571_Animation_5_6-poster-00001.jpg')" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                    <source data-src="https://quizizz.com/wf/assets/62fcf151143c4e2f85e00571_Animation_5_6-transcode.mp4" data-wf-ignore="true" />
                    <source data-src="https://quizizz.com/wf/assets/62fcf151143c4e2f85e00571_Animation_5_6-transcode.webm" data-wf-ignore="true" />
                </video>
                                </div>
                            </div>
                        </div>
                        <div data-w-tab="Tab 3" class="tab-pane-tab-3 w-tab-pane">
                            <div class="tab-image-wrapper">
                                <img sizes="(max-width: 767px) 90vw, (max-width: 991px) 650px, (max-width: 1439px) 45vw, 640px" srcset="https://quizizz.com/wf/assets/64f6d6747e97ba27943c2985_6333a5c56094e4553c184ce9_app_14-min-p-500.webp 500w, https://quizizz.com/wf/assets/64f6d6747e97ba27943c2985_6333a5c56094e4553c184ce9_app_14-min-p-800.webp 800w, https://quizizz.com/wf/assets/64f6d6747e97ba27943c2985_6333a5c56094e4553c184ce9_app_14-min-p-1080.webp 1080w, https://quizizz.com/wf/assets/64f6d6747e97ba27943c2985_6333a5c56094e4553c184ce9_app_14-min-p-1600.webp 1600w, https://quizizz.com/wf/assets/64f6d6747e97ba27943c2985_6333a5c56094e4553c184ce9_app_14-min.webp 2010w"
                                    alt="" src="https://quizizz.com/wf/assets/64f6d6747e97ba27943c2985_6333a5c56094e4553c184ce9_app_14-min.webp" loading="lazy" class="image-poster white-tab-3" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="cta-section">
    <div class="cta-wrapper">
        <div class="cta-left-container">
        <div class="cta-subtext">The best way to ask questions, explore ideas, and let students show what they know.</div>
        <h2 class="cta-heading">Start motivating students.<span class="cta-span">In minutes.</span></h2>
        <div class="buttons-container footer-buttons">
            <a href="./account/signup.php" target="_blank" class="uk_yellow-button w-inline-block">
                <div class="button-subtext">Users</div>
                <div class="button-bottom-contain">
                    <div class="button-text">Sign up for free</div>
                    <img src="https://quizizz.com/wf/assets/62fa641a161d3a38c7681d0e_Right_Arrow_Button.svg" loading="lazy" alt="Arrow pointing right" class="button-arrow" />
                </div>
            </a>
            <a href="" class="grey-button w-inline-block">
                <div class="button-subtext">Admins</div>
                <div class="button-bottom-contain">
                    <div class="button-text">Learn more</div>
                    <img src="https://quizizz.com/wf/assets/62fa6419161d3ac288681cdc_Purple_Arrow_Button.svg" loading="lazy" alt="Purple Right Arrow" class="button-arrow" />
                </div>
            </a>
                    </div>
                </div>
                <div class="cta-image-container">
                    <img src="https://quizizz.com/wf/assets/62fa6419161d3a174d681cb3_dot_grid.png" loading="lazy" sizes="(max-width: 479px) 86vw, (max-width: 767px) 84vw, (max-width: 991px) 570px, (max-width: 1439px) 39vw, 540px" srcset="https://quizizz.com/wf/assets/62fa6419161d3a174d681cb3_dot_20grid-p-500.png 500w, https://quizizz.com/wf/assets/62fa6419161d3a174d681cb3_dot_20grid-p-800.png 800w, https://quizizz.com/wf/assets/62fa6419161d3a174d681cb3_dot_grid.png 1240w"
                        alt="" class="cta-dot-images" /><img src="https://quizizz.com/wf/assets/64f6d6f262069b42407b43db_6333fb9ca08e3adffcfc663b_Funding_CTA_Image.webp" loading="lazy" data-w-id="22af9607-ef74-4f19-aa0c-777275c719fe"
                        alt="" sizes="(max-width: 767px) 81vw, (max-width: 991px) 585px, (max-width: 1439px) 40vw, 558px" srcset="https://quizizz.com/wf/assets/64f6d6f262069b42407b43db_6333fb9ca08e3adffcfc663b_Funding_CTA_Image-p-500.webp 500w, https://quizizz.com/wf/assets/64f6d6f262069b42407b43db_6333fb9ca08e3adffcfc663b_Funding_CTA_Image-p-800.webp 800w, https://quizizz.com/wf/assets/64f6d6f262069b42407b43db_6333fb9ca08e3adffcfc663b_Funding_CTA_Image.webp 1080w"
                        class="cta-image" />
                </div>
            </div>
        </div>
        </div>
        <div class="footer-section">
            <div class="footer-wrapper">
                <div class="footer-top-wrapper">
                    <div class="footer-left-wrapper">
                        <a href="" aria-current="page" class="footer-logo w-nav-brand w--current"><img src="./wf/assets/QuizITLogoname.png" loading="lazy" alt="Quizizz Logo" class="logo-image" /></a>
                        
        </div>
        <div class="footer-right-wrapper">
        <div class="footer-column">
            <a href="" class="footer-links">The Quizit Blog</a>
            <a href="" class="footer-links">Teacher Resources</a>
            <a href="https://quizizz.com/quizizzforwork?source=home_footer" target="_blank" class="footer-links">Quizit for Work</a></div>
                        <div class="footer-column"><a href="" target="_blank" class="footer-links">Worksheets</a>
                            <a href="" class="footer-links">Reseller program</a>
                            <a href="" class="footer-links">Privacy Policy</a></div>
                        <div></div>
                    </div>
                </div>
                <div id="footnote" class="footer-bottom-wrapper">
                    <div></div>
                    <div class="footnote-right-contain">
                        <div class="copyright-text">2023 Quizit Inc.</div>
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
            // async function getFeatureFlags() {
            //     try {
            //         let x = await fetch("https://quizizz.com/features").then((x) => x.json()),
            //             e = {};
            //         return (
            //             Object.keys(x.data.features).forEach((t) => {
            //                 e[t] = x.data.features[t] ? .defaultValue;
            //             }),
            //             e
            //         );
            //     } catch (t) {
            //         return null;
            //     }
            // }

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