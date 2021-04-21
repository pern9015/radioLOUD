<?php
get_header(); ?>


<!--Content-->

<main id="main" class="site-main">

    <section class="first_section">
        <img src="Asset_13.svg" alt="lyd">
    </section>
    <article class="radio" id="podcasts">
        <img src="" alt="" class="billede_single">
        <h3 class="title"></h3>
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
        document.querySelector(".title").textContent = podcast.title.rendered;
    }

    getJson();

</script>
<?php get_footer(); ?>
