<?php
/**
 * Template Name: Chronik Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

$musical_query = new WP_Query( array(
	'post_type' => 'musical',
	'meta_key'  => 'musical-date_start',
	'orderby'   => 'meta_value',
) );

$musicals = [];
$i        = 0;

while ( $musical_query->have_posts() ) : $musical_query->the_post();

	$musicals[ $i ++ ] = get_the_ID();

endwhile;

?>

<?php get_template_part( 'loop-templates/jsForLatestProdStyleLoading' ); ?>

<div class="chronik">
    <div class="wrapper" id="single-wrapper">

        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

            <div class="row">

                <!-- Do the left sidebar check -->
							<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

                <main class="site-main" id="main">

                    <!-- Loop content -->
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <ul class="musical-side-list">
                                <?php for ( $x = 0; $x < $i; $x ++ ) {
	                                $has_no_page = false;
	                                $has_no_page = get_post_meta( $musicals[ $x ], 'musical-no_link', true );
                                    ?>
                                  <li>
	                                  <?php if (!$has_no_page) {
		                                  echo "<a href='" . get_post_permalink( $musicals[ $x ] ) . "'>";
	                                  }?>
                                        <h3><?php echo get_the_title( $musicals[ $x ] ); ?></h3>
	                                  <?php if (!$has_no_page) {
		                                  echo "</a>";
	                                  }?>
                                  </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <div class="musical-big-list">
                                <?php for ( $x = 0; $x < $i; $x ++ ) { ?>
                                <div class="musical-entry">
	                                <?php
                                    $start_date_str = get_post_meta( $musicals[ $x ], 'musical-date_start', true );
		                                $start_date = DateTime::createFromFormat('Y-m-j', $start_date_str);
		                                $has_no_page = false;
		                                $has_no_page = get_post_meta( $musicals[ $x ], 'musical-no_link', true );
                                    ?>
                                    <h1><?php echo $start_date->format('Y') ?></h1>
                                    <?php if (!$has_no_page) {
	                                    echo "<a href='" . get_post_permalink( $musicals[ $x ] ) . "'>";
                                    }?>
                                        <div class="musical-image">
                                            <img class=""
                                                 src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $musicals[ $x ] ) ); ?>"/>
                                        </div>
	                                <?php if (!$has_no_page) {
		                                echo "</a>";
	                                }?>
                                </div>
                             <?php } ?>
                            </div>
                        </div>
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
