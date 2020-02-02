<?php
/*
Template Name: Jekyll and Hyde
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
        target.classList.add('jekyll_and_hyde');
        target.classList.add('landing');
    })();
</script>

<div class="jekyll_and_hyde">
    <div id="foreground">
        <div id="start" class="">
            <div class="center-child">
                <div class="musical_image"></div>
                <div class="musical_title">
                    <div class="title">Jekyll & Hyde</div>
                    <div class="sub_title">Das Musical</div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php get_footer(); ?>