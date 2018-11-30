<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="footer">
    <nav class="navbar-dark navbar">
        <div class="container">
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'footer',
							'container_class' => 'footer-nav',
							'container_id'    => 'footer-nav',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'footer-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
        </div>
    </nav>
</div>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

