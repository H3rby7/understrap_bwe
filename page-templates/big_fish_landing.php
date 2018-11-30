<?php
/*
Template Name: Big Fish Landing
 */
?>

<?php
$template_path = get_stylesheet_directory_uri();

get_header();

$musical_query = new WP_Query(array(
    'post_type' => 'musical',
    'meta_key' => 'musical-date_start',
    'orderby' => 'meta_value',
));

while ($musical_query->have_posts()) : $musical_query->the_post();

$link = get_post_permalink(get_the_ID());

break;

endwhile;
?>

    <script type="application/javascript">
        (function loadProdStyle() {
            var target = document.getElementsByTagName("body")[0];
            target.classList.add('big_fish');
        })();
    </script>

    <div class="big_fish">
        <div id="foreground">
            <div id="start" class="">
                <div class="center_child">
                    <div>
                    <div id="musical_logo">
                        <img src="<?php echo $template_path; ?>/img/src/big-fish/big-fish.png"
                            id="pic" class="pic">
                    </div>
                        <!-- <div class="goto-musical-page">
                            <a href="<?php echo $link . "#tickets"; ?>">
                                <div id="call-to-action-text">
                                    Jetzt Tickets sichern
                                </div>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>