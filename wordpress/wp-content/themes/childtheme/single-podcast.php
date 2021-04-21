<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>


<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php astra_content_page_loop(); ?>

    <?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<h1>
    <?php the_title(); ?>
</h1>


<!--Content-->

<main id="main" class="site-main">
    <article class="radio" id="podcasts">
        <img src="" alt="" class="billede_single">
        <!--        <h3 class="navn"></h3>-->
        <p class="title"></p>
        <p class="kort_beskrivelse"></p>
        <p class="lang_beskrivelse"></p>
    </article>
</main>

<script>
    let podcast;

    const dbUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/podcast/" + <?php echo get_the_ID() ?>;

    async function getJson() {
        const data = await fetch(dbUrl);
        podcast = await data.json();
        console.log(podcast);
        visPodcasts();
    }

    function visPodcasts() {
        console.log(podcast.billede.guid);
        //document.querySelector("h3").textContent = drink.title.rendered;
        document.querySelector(".billede_single").src = podcast.billede.guid;
        document.querySelector(".lang_beskrivelse").textContent = podcast.lang_beskrivelse;
    }

    getJson();

</script>
<?php get_footer(); ?>
