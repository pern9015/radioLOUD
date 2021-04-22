<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>


<script>
    let aktuelepisode = <?php echo get_the_ID() ?>;
    console.log(aktuelepisode);

</script>

<?php get_footer(); ?>
