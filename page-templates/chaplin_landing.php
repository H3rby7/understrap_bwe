<?php
/*
Template Name: Chaplin Landing
*/
?>

<?php
$template_path = get_stylesheet_directory_uri();

get_header();

$musical_query = new WP_Query( array(
	'post_type' => 'musical',
	'meta_key'  => 'musical-date_start',
	'orderby'   => 'meta_value',
) );

while ( $musical_query->have_posts() ) : $musical_query->the_post();

	$link = get_post_permalink(get_the_ID());

	break;

endwhile;
?>

    <script type="application/javascript">
        (function loadProdStyle() {
            var target = document.getElementsByTagName("body")[0];
            target.classList.add('chaplin');
        })();
    </script>

    <div class="chaplin">
        <div id="foreground">
            <div id="start" class="">
                <div class="center_child">
                    <div>
                        <div class="bwe_header">
                            <h1>Broadway Entertainment</h1>
                            <p>präsentiert</p>
                            <h3>Chaplin Das Musical</h3>
                        </div>
                        <div id="musical_logo">
                            <img src="<?php echo $template_path; ?>/img/src/chaplin/chaplin_full_transparent.png"
                                 id="pic" class="pic">
                        </div>
<!--                        <div id="countdown">-->
<!--                            <table class="cd_table">-->
<!--                                <tbody>-->
<!--                                <tr class="cd_header">-->
<!--                                    <td colspan="4">Tickets in</td>-->
<!--                                </tr>-->
<!--                                <tr class="cd_timer">-->
<!--                                    <td id="cd_days"></td>-->
<!--                                    <td id="cd_hours"></td>-->
<!--                                    <td id="cd_minutes"></td>-->
<!--                                    <td id="cd_seconds"></td>-->
<!--                                </tr>-->
<!--                                <tr class="cd_legend">-->
<!--                                    <td>Tage</td>-->
<!--                                    <td>Stunden</td>-->
<!--                                    <td>Minuten</td>-->
<!--                                    <td>Sekunden</td>-->
<!--                                </tr>-->
<!--                                <tr class="cd_date">-->
<!--                                    <td colspan="4">1. Dezember 2017</td>-->
<!--                                </tr>-->
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
                        <div class="goto-musical-page">
                            <a href="<?php echo $link . "#tickets"; ?>">
                                <div id="call-to-action-text">
                                    Jetzt Tickets sichern
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sideMovie left"></div>
            <div class="sideMovie right"></div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
    <script src="<?php echo $template_path; ?>/src/js/smooth-scroll.js"></script>
    <script src="<?php echo $template_path; ?>/src/js/flickering.js"></script>
<!--    <script src="--><?php //echo $template_path; ?><!--/src/js/countdown.js"></script>-->

<?php get_footer(); ?>