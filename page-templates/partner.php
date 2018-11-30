<?php
/**
 * Template Name: Partner Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

$partner_query = new WP_Query( array(
	'post_type' => 'partner'
) );

?>

<?php get_template_part( 'loop-templates/jsForLatestProdStyleLoading' ); ?>

<div class="partner">
    <div class="wrapper" id="single-wrapper">

        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

            <div class="row">

                <!-- Do the left sidebar check -->
							<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

                <main class="site-main" id="main">

                    <!-- Loop content -->
                    <div class="row">
                        <?php while ( $partner_query->have_posts() ) : $partner_query->the_post(); ?>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="partner-box">
                                    <div class="partner-title">
                                        <h1><?php echo the_title() ?></h1>
                                    </div>
                                    <div class="partner-content">
                                        <div class="partner-logo" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>')"></div>
                                        <div class="partner-text">
                                            <div class="center_child">
	                                            <div><?php the_content() ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        ?>
                    </div>
                </main><!-- #main -->

            </div><!-- #primary -->

            <!-- Do the right sidebar check -->
					<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

						<?php get_sidebar( 'right' ); ?>

					<?php endif; ?>

        </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

</div><!-- Team end -->

<?php get_footer(); ?>
