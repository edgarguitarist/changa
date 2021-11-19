<?php include('header_dashboard.php'); ?>
<script>
    $(function() {
        var liWidth = $("li").css("width");
        $("li").css("height", liWidth);
        $("li").css("lineHeight", liWidth);
        var totalHeight = $("#wordsearch").css("width");
        $("#wordsearch").css("height", totalHeight);
    });
    causeRepaintsOn = $("h1, h2, h3, p");
    $(window).resize(function() {
        causeRepaintsOn.css("z-index", 1);
    });
    $(window).on('resize', function() {
        var liWidth = $(".one").css("width");
        $("li").css("height", liWidth);
        $("li").css("lineHeight", liWidth);
        var totalHeight = $("#wordsearch").css("width");
        $("#wordsearch").css("height", totalHeight);
    });



    $(function() {
        /* 4 */
        $(this).delay(1000).queue(function() {
                $(".one").addClass("selected");
                $(this).dequeue();
            })
            /* 0 */
            .delay(400).queue(function() {
                $(".two").addClass("selected");
                $(this).dequeue();
            })
            /* 4 */
            .delay(400).queue(function() {
                $(".three").addClass("selected");
                $(this).dequeue();
            })
            /* P */
            .delay(400).queue(function() {
                $(".four").addClass("selected");
                $(this).dequeue();
            })
            /* A */
            .delay(400).queue(function() {
                $(".five").addClass("selected");
                $(this).dequeue();
            })
            /* G */
            .delay(400).queue(function() {
                $(".six").addClass("selected");
                $(this).dequeue();
            })
            /* E */
            .delay(400).queue(function() {
                $(".seven").addClass("selected");
                $(this).dequeue();
            })
            /* N */
            .delay(400).queue(function() {
                $(".eight").addClass("selected");
                $(this).dequeue();
            })
            /* O */
            .delay(400).queue(function() {
                $(".nine").addClass("selected");
                $(this).dequeue();
            })
            /* T */
            .delay(400).queue(function() {
                $(".ten").addClass("selected");
                $(this).dequeue();
            })
            /* F */
            .delay(400).queue(function() {
                $(".eleven").addClass("selected");
                $(this).dequeue();
            })
            /* O */
            .delay(400).queue(function() {
                $(".twelve").addClass("selected");
                $(this).dequeue();
            })
            /* U */
            .delay(400).queue(function() {
                $(".thirteen").addClass("selected");
                $(this).dequeue();
            })
            /* N */
            .delay(400).queue(function() {
                $(".fourteen").addClass("selected");
                $(this).dequeue();
            })
            /* D */
            .delay(400).queue(function() {
                $(".fifteen").addClass("selected");
                $(this).dequeue();
            })
            .delay(400).queue(function() {
                $(".sixteen").addClass("selected");
                $(this).dequeue();
            })
            .delay(400).queue(function() {
                $(".seventeen").addClass("selected");
                $(this).dequeue();
            })
            .delay(400).queue(function() {
                $(".eighteen").addClass("selected");
                $(this).dequeue();
            })
            .delay(400).queue(function() {
                $(".nineteen").addClass("selected");
                $(this).dequeue();
            })
            .delay(400).queue(function() {
                $(".twenty").addClass("selected");
                $(this).dequeue()
            });

    });
</script>

<style>
    body {
        /* background-color: #335B67;
        background: -ms-radial-gradient(ellipse at center, #335B67 0%, #2C3E50 100%) fixed no-repeat;
        background: -moz-radial-gradient(ellipse at center, #335B67 0%, #2C3E50 100%) fixed no-repeat;
        background: -o-radial-gradient(ellipse at center, #335B67 0%, #2C3E50 100%) fixed no-repeat;
        background: -webkit-gradient(radial, center center, 0, center center, 497, color-stop(0, #335B67), color-stop(1, #2C3E50));
        background: -webkit-radial-gradient(ellipse at center, #335B67 0%, #2C3E50 100%) fixed no-repeat;
        background: radial-gradient(ellipse at center, #335B67 0%, #2C3E50 100%) fixed no-repeat;
        font-family: 'Source Sans Pro', sans-serif; */
        -webkit-font-smoothing: antialiased;
        margin: 0px;
    }

    footer {
        padding-top: 50px;
    }

    img{
        padding-left: 6%;
    }

    a{
        font-size: 22px;    
    }

    ::selection {
        background-color: rgba(0, 0, 0, 0.2);
    }

    ::-moz-selection {
        background-color: rgba(0, 0, 0, 0.2);
    }

    #noscript-warning {
        width: 100%;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.2);
        font-weight: 300;
        color: white;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    /* === WRAP === */

    #wrap {
        width: 60%;
        max-width: 1400px;
        margin: 0 auto;
        height: auto;
        position: relative;
        margin-top: 5%;
    }

    /* === WORDSEARCH === */

    #wordsearch {
        width: 45%;
        float: left;
    }

    #wordsearch ul {
        margin: 0px;
        padding: 0px;
    }

    #wordsearch ul li {
        float: left;
        width: 12%;
        background-color: rgba(0, 0, 0, .2);
        list-style: none;
        margin-right: 0.5%;
        margin-bottom: 0.5%;
        padding: 0;
        display: block;
        text-align: center;
        color: rgba(255, 255, 255, 0.7);
        text-transform: uppercase;
        overflow: hidden;
        font-size: 24px;
        font-size: 1.6vw;
        font-weight: 300;
        transition: background-color 0.75s ease;
        -moz-transition: background-color 0.75s ease;
        -webkit-transition: background-color 0.75s ease;
        -o-transition: background-color 0.75s ease;
    }

    #wordsearch ul li.selected {
        background-color: rgba(26, 188, 156, 0.7);
        color: rgba(255, 255, 255, 1);
        font-weight: 400;
    }

    /* === RESPONSIVE CSS === */

    @media all and (max-width: 899px) {
        #wrap {
            width: 90%;
        }
    }

    @media all and (max-width: 799px) {
        #wrap {
            width: 90%;
            height: auto;
            margin-top: 40px;
            top: 0%;
        }

        #wordsearch {
            width: 90%;
            float: none;
            margin: 0 auto;
        }

        #wordsearch ul li {
            font-size: 4vw;
        }

        #main-content {
            float: none;
            width: 90%;
            max-width: 90%;
            margin: 0 auto;
            margin-top: 30px;
            text-align: justify;
        }

        #main-content h1 {
            text-align: left;
        }

        #search input[type='text'] {
            width: 84%;
        }

        #search .input-search {
            width: 15%;
        }
    }

    @media all and (max-width: 499px) {
        #main-content h1 {
            font-size: 28px;
        }
    }
</style>

<body id="class_div">
    <?php include('navbar_about.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12" id="content">
                <div class="row-fluid">
                    <div class="navbar navbar-inner block-header">
                        <div id="" class="muted pull-right"><a href="javascript:history.back();"><em class="icon-arrow-left"></em> Volver</a></div>
                    </div>
                    <!-- block -->
                    <!-- <div class="block mincon">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-right"><a href="javascript:history.back();"><em class="icon-arrow-left"></em> Volver</a></div>
                        </div>
                        <div class="block-content collapse in">
                            <center><h1>Pagina no Encontrada</h1></center>
                            <hr>                            
                            <div>
                                <center>
                                    <h1 class="error-critic">ERROR</h1>
                                    <img id="developer_f" src="admin/images/404.gif">
                                </center>
                            </div>
                            <br><br>
                            <hr>
                        </div> -->
                    <div id="wrap">
                        <div id="wordsearch" class="span5">
                            <ul>
                                <li class="one">e</li>

                                <li class="two">r</li>

                                <li class="three">r</li>

                                <li class="four">o</li>

                                <li class="five">r</li>

                                <li>x</li>

                                <li>m</li>

                                <li>e</li>

                                <li>t</li>

                                <li>a</li>

                                <li>x</li>

                                <li>l</li>

                                <li class="six">4</li>

                                <li class="seven">0</li>

                                <li class="eight">4</li>

                                <li>y</li>

                                <li>y</li>

                                <li>w</li>

                                <li>v</li>

                                <li>b</li>

                                <li>o</li>

                                <li>q</li>

                                <li>d</li>

                                <li>y</li>

                                <li>p</li>

                                <li>a</li>

                                <li class="nine">p</li>

                                <li class="ten">a</li>

                                <li class="eleven">g</li>

                                <li class="twelve">e</li>

                                <li>v</li>

                                <li>j</li>

                                <li>a</li>

                                <li class="thirteen">n</li>

                                <li class="fourteen">o</li>

                                <li class="fifteen">t</li>

                                <li>s</li>

                                <li>c</li>

                                <li>e</li>

                                <li>w</li>

                                <li>v</li>

                                <li>x</li>

                                <li>e</li>

                                <li>p</li>

                                <li>c</li>

                                <li>f</li>

                                <li>h</li>

                                <li>q</li>

                                <li>e</li>

                                <li class="sixteen">f</li>

                                <li class="seventeen">o</li>

                                <li class="eighteen">u</li>

                                <li class="nineteen">n</li>

                                <li class="twenty">d</li>

                                <li>s</li>

                                <li>w</li>

                                <li>q</li>

                                <li>v</li>

                                <li>o</li>

                                <li>s</li>

                                <li>m</li>

                                <li>v</li>

                                <li>f</li>

                                <li>u</li>
                            </ul>
                        </div>
                        <div class="center span1"></div>
                        <div class="center span6">
                            <div class="center mincon">
                                <center>
                                    <h1>ERROR</h1>
                                    <img width="100%" id="developer_f" src="admin/images/404.gif">
                                </center>
                            </div>

                            <hr>
                            <h1 style="padding-left: 6%;">Pagina no encontrada</h1>
                            <!-- <p>Unfortunately the page you were looking for could not be found. It may be
                                    temporarily unavailable, moved or no longer exist.</p>

                                <p>Check the URL you entered for any mistakes and try again. Alternatively, search
                                    for whatever is missing or take a look around the rest of our site.</p>

                                <div id="search">
                                    <form>
                                        <input type="text" placeholder="Search" />
                                    </form>
                                </div>

                                <div id="navigation">
                                    <a class="navigation" href="">Home</a><a class="navigation" href="">About
                                        Us</a>
                                    <a class="navigation" href="">Site Map</a>
                                    <a class="navigation" href="">Contact</a>
                                </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>