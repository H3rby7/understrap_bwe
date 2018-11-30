<?php
/*
Template Name: Redirect Tickets
*/
?>

<?php
$musical_query = new WP_Query( array(
	'post_type' => 'musical',
	'meta_key'  => 'musical-date_start',
	'orderby'   => 'meta_value',
) );

while ( $musical_query->have_posts() ) : $musical_query->the_post();

	$link = get_post_permalink(get_the_ID());

	break;

endwhile;

wp_redirect( $link . '#tickets' );
exit;
?>