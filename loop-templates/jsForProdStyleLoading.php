<?php
/**
 * Template to put Production into body element.
 *
 * @package understrap
 */

?>

<!-- js to put prod into body -->
<?php
$showId = get_post_meta( get_the_ID(), 'musical-link_musical', true );
if ( $showId != null ) {
	$showName = get_the_title( $showId );
	?>
    <script type="application/javascript">
        (function loadProdStyle() {
            var target = document.getElementsByTagName("body")[0];
            target.classList.add('<?php echo str_replace(' ', '_', strtolower($showName));?>');
        })();
    </script>

<?php } ?>