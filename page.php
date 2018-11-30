<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

get_template_part( 'loop-templates/jsForLatestProdStyleLoading' );
get_template_part( 'global-templates/page' );
?>
