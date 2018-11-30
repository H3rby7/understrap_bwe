<?php
/**
 * Cast Member rendering in most basic format.
 *
 * @package understrap
 */

?>

<div class="row">
	<div class="col-xs-12 col-lg-12">
		<div class="cast_member_title">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</div>
<div class="cast_member_content row">
	<div class="col-lg-4 col-xs-12">
		<div class="cast_member_img">
			<img class="" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>"/>
		</div>
	</div>
	<div class="col-lg-8 col-md-12">
		<div class="cast_member_vita">
			<?php the_content(); ?>
		</div>
	</div>
</div>