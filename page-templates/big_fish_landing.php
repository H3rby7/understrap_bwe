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
                    <div id="musical_title">
                        <h2>Broadway Entertainment</h2>
                        <p>präsentiert</p>
                        <h1><?php echo get_the_title(); ?></h1>
                    </div>
                    <div id="musical_logo">
                        <img src="<?php echo $template_path; ?>/img/src/big-fish/couple.png"/>
                        <div id="goto-musical-page">
                            <a href="<?php echo $link . "#tickets"; ?>">
                            Tickets
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>