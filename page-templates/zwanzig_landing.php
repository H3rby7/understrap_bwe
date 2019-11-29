<?php
/*
Template Name: Zwanzig Landing
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
        target.classList.add('zwanzig');
        target.classList.add('landing');
    })();
</script>

<div class="zwanzig">
    <div id="foreground">
        <div id="start" class="">
            <div class="center_child">
                <div>
                    <div class="bwe_header">
                        <h1 class="broadway">Broadway</h1>
                        <hr/>
                        <h1 class="entertainment">Entertainment</h1>
                        <hr/>
                        <h2 class="jahr">2020</h2>
                        <hr/>
                        <h3 class="datum">04. - 12. September</h3>
                    </div>
                </div>
            </div>
            <div class="musical_teaser">
                <?php the_content(); ?>
            </div>
            <div class="ticket_cta">
                <div>
                    <p>Jetzt <strong>TICKETS</strong> sichern!</p>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php get_footer(); ?>