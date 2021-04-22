<?php
get_header(); ?>




<!--Content-->


<main id="main" class="site-main">
    <section id="first_section">
        <br>
        <!--        <img src="assets/images/Asset_13.svg" alt="lyd">-->
    </section>
    <article class="radio" id="podcasts">
        <img src="" alt="" class="lydbolge">
        <img src="" alt="" class="billede_single">
        <h3 class="title"></h3>
        <p class="lang_beskrivelse"></p>
    </article>

    <section id="episoder">
        <template>
            <article>
                <img src="" alt="">
                <div>
                    <h2></h2>
                    <p class="beskrivelse"></p>
                    <a href="">Læs mere</a>
                </div>
            </article>
        </template>
    </section>
</main>


<script>
    let podcast;
    let episoder;
    let aktuelpodcast = <?php echo get_the_ID() ?>;

    const dbUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/podcast/" + aktuelpodcast;
    const episodeUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/episoder?per_page=100";

    const container = document.querySelector("#episoder");

    async function getJson() {
        const data = await fetch(dbUrl);
        podcast = await data.json();
        console.log(podcast);

        const data2 = await fetch(episodeUrl);
        episoder = await data2.json();
        console.log("episoder: ", episoder);

        visPodcasts();
        visEpisoder();
    }


    function visPodcasts() {
        console.log("visPodcasts");
        console.log(podcast.title.rendered);
        document.querySelector(".lydbolge").src = podcast.lyd.guid;
        document.querySelector(".billede_single").src = podcast.billede.guid;
        document.querySelector(".lang_beskrivelse").textContent = podcast.lang_beskrivelse;
        document.querySelector(".title").textContent = podcast.title.rendered;
    }

    function visEpisoder() {
        console.log("visEpisoder");
        let temp = document.querySelector("template");
        episoder.forEach(episode => {
            console.log("loop id :", aktuelpodcast);
            if (episode.horer_til_podcast == aktuelpodcast) {

                console.log("loop kører id :", aktuelpodcast);
                let klon = temp.cloneNode(true).content;
                klon.querySelector("h2").textContent = episode.title.rendered;

                klon.querySelector(".beskrivelse").innerHTML = episode.content.rendered;
                klon.querySelector("article").addEventListener("click", () => {
                    location.href = episode.link;
                })

                klon.querySelector("a").href = episode.link;
                console.log("episode", episode.link);
                container.appendChild(klon);
            }


        })

    }
    getJson();

</script>







<?php get_footer(); ?>
