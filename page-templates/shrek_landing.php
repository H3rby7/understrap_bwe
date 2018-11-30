<?php
/*
Template Name: Shrek Landing
*/
?>

<?php
$template_path =  get_stylesheet_directory_uri();
?>

<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo $template_path;?>/css/theme.css" media="all">
</head>
<body class="shrek">
<div id="nav_container">
    <ul class="nav_list">
        <li class="v1">
            <a data-scroll href="#story"><div class="nav_item_text"><div>Story</div></div></a>
            <div class="nav_item_background"></div>
        </li>
        <li class="v2">
            <a data-scroll href="#tickets"><div class="nav_item_text"><div>Tickets</div></div></a>
            <div class="nav_item_background"></div>
        </li>
        <li class="v4">
            <a href="<?php echo get_permalink(get_page_by_title('Vision'));?>"><div class="nav_item_text"><div>Vision</div></div></a>
            <div class="nav_item_background"></div>
        </li>
        <li class="v3">
            <a href="<?php echo get_permalink(get_page_by_title('Chronik'));?>"><div class="nav_item_text"><div>Chronik</div></div></a>
            <div class="nav_item_background"></div>
        </li>
    </ul>
</div>
<div id="foreground">
    <div id="scrolldowndiv">
        <div>
            <a data-scroll href="#story"><img class="scrolldownpic" src="<?php echo $template_path;?>/img/src/DoubleArrowDown.png"></a>
        </div>
    </div>
    <div id="start" class="f_item f_item1">
        <div id="particles-js"></div>
        <div id="logo">
            <img src="<?php echo $template_path;?>/img/src/shrek/BWELogos.png" width="100%">
        </div>
        <div class="center_child">
            <div id="musical_logo">
                <img src="<?php echo $template_path;?>/img/src/shrek/shrek_musical_logo.png">
                <div id="musical_details">
                    <div class="musical_title">SHREK DAS MUSICAL</div>
                    <div class="after">Nach dem DreamWorks-Animationsfilm und dem Buch von William Steig</div>
                    <div class="author">Buch und Gesangstexte von David Lindsay-Abaire<br>Musik von Jeanine Tesori</div>
                    <div class="original">Originalproduktion am Broadway von <br>DreamWorks Theatricals und Neal Street Productions</div>
                    <div class="translation">Deutsch von Kevin Schroeder und Heiko Wohlgemuth</div>
                </div>
            </div>
        </div>
        <div id="start_tickets">
            <div class="rotate5">
                <div class="start_tickets_container">
                    <a data-scroll href="#tickets"><div>Tickets</div></a>
                    <div class="start_tickets_background v1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="grassBorder">
        <div></div>
    </div>
    <div id="story" class="f_item">
        <div class="parallax_center_parent">
            <div class="parallax_center_child">
                <div class="parallax_overlay">
                    <div class="parallax_text">
                        <h1>Story</h1>
                        <p>
                        Shrek hat sich mit seinem einsamen Leben als Oger bestens abgefunden, als sein geliebter Sumpf plötzlich von Fabelwesen aller Art bevölkert wird. Diese wurden von Lord Farquaad aus dem Königreich Duloc verbannt, weil sie "nicht normal" sind. Um seinen Sumpf zurückzuerlangen, muss Shrek für Lord Farquaad die schöne Prinzessin Fiona aus ihrem Turm erretten. Dieser wird jedoch von einem feuerspeienden Drachen bewacht. Eine Reise voller Abenteur beginnt...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blackfade">
            <div></div>
        </div>
    <div id="tickets" class="f_item f_item_last">
            <div class="parallax_center_parent">
                <div class="parallax_center_child">
                    <div class="parallax_overlay">
                        <div class="parallax_text">
                        <h1>Tickets</h1>
                            <table class="ticket" style="table-layout: fixed;">
                                <tr>
                                    <th>Mi</th>
                                    <th>Do</th>
                                    <th>Fr</th>
                                    <th>Sa</th>
                                    <th>So</th>
                                </tr>
                                <tr>
                                    <td class="noHover"></td>
				                    <td class="noHover"></td>
                                    <td><a href="http://www.ztix.de/event.php/24322/ztix" target="_blank"><div><div class="ticketDate">01.09.17</div><div class="ticketTime">19:30 Uhr</div></div></a></td>
                                    <td><a href="http://www.ztix.de/event.php/25322/ztix" target="_blank"><div><div class="ticketDate">02.09.17</div><div class="ticketTime">19:30 Uhr</div></div></a></td>
                                    <td><a href="http://www.ztix.de/event.php/26322/ztix" target="_blank"><div><div class="ticketDate">03.09.17</div><div class="ticketTime">19:30 Uhr</div></div></a></td>
                                </tr>
                                <tr>
				                    <td><a href="http://www.ztix.de/event.php/30322/ztix" target="_blank"><div><div class="ticketTime" style="word-wrap: normal;">Zusatzvorstellung</div><div class="ticketDate">06.09.17</div><div class="ticketTime">19:30 Uhr</div></div></a></td>
                                    <td><a href="http://www.ztix.de/event.php/27322/ztix" target="_blank"><div><div class="ticketDate">07.09.17</div><div class="ticketTime">19:30 Uhr</div></div></a></td>
                                    <td><a href="http://www.ztix.de/event.php/28322/ztix" target="_blank"><div><div class="ticketDate">08.09.17</div><div class="ticketTime">19:30 Uhr</div></div></a></td>
                                    <td><a href="http://www.ztix.de/event.php/29322/ztix" target="_blank"><div><div class="ticketDate">09.09.17</div><div class="ticketTime">19:30 Uhr</div></div></a></td>
                                    <td class="noHover"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script src="<?php echo $template_path;?>/src/js/particles.js/particles.js"></script>
<script src="<?php echo $template_path;?>/src/js/smooth-scroll.js"></script>
<script type="application/javascript">
    particlesJS.load('particles-js', '<?php echo $template_path;?>/src/js/particlesjs-shrek.json', function() {
        console.log('callback - particles.js config loaded');
    });
    smoothScroll.init({speed: 1000});
    window.onscroll = (function () {
        var triggered = false;
        return function () {
            if (triggered) {
                return;
            }
            document.getElementById('scrolldowndiv').style.opacity = 0.0;
            setTimeout(function() {document.getElementById('scrolldowndiv').style.visibility='hidden';},1500);
        }
    })();
</script>

</body>
</html>