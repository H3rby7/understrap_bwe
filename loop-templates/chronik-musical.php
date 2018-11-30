<?php
/**
 * Musical-Entry rendering in Chronik.
 *
 * @package understrap
 */

?>

<div class="musical-entry">
    <a href=" <?php echo get_post_permalink( get_the_ID()); ?>">
        <h1><?php the_title(); ?></h1>
        <div class="musical-image">
            <img class="" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>"/>
        </div>
    </a>
</div>
<?php // the_content(); ?>
