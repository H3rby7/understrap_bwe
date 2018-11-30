<?php
/**
 * Template to put latest Production into body element.
 *
 * @package understrap
 */

?>
<?php
    $showName = null;
    $musical_query = new WP_Query( array(
    'post_type' => 'musical',
    'meta_key'  => 'musical-date_start',
    'orderby'   => 'meta_value',
    ) );

    while ( $musical_query->have_posts() ) : $musical_query->the_post();

	    $showName = get_the_title(get_the_ID());

    break;

    endwhile;
    ?>

<!-- js to put prod into body -->
<?php
if ( $showName != null ) {
	?>
    <script type="application/javascript">
        (function loadProdStyle() {
            var target = document.getElementsByTagName("body")[0];
            target.classList.add('<?php echo str_replace(' ', '_', strtolower($showName));?>');
        })();
    </script>

<?php } ?>