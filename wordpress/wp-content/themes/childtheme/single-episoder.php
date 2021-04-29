<?php

get_header(); ?>

<main id="main" class="site-main">

    <article class="radio" id="podcasts">
        <img src="" alt="" class="lydbolge">
    </article>

    <div class="baggrund_episode">
        <section id="episoder_grid">

            <article class="article_episode">
                <img src="" alt="billede mangler" class="billede_episode">
                <div>
                    <h3 class="episode_title"></h3>
                    <p class="beskrivelse"></p>
                    <a href="">Læs mere</a>
                </div>
            </article>

        </section>
    </div>

</main>


<script>
    let episode;
    //    let episoder;
    let aktuelepisode = <?php echo get_the_ID() ?>;


    const dbUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/episoder/" + aktuelepisode;
    //    const episodeUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/episoder?per_page=100";

    const container = document.querySelector("#episoder");

    console.log("container: ", container);

    async function getJson() {
        const data = await fetch(dbUrl);
        episode = await data.json();
        console.log("episode: ", episode);

        //        const data2 = await fetch(episodeUrl);
        //        episoder = await data2.json();
        //        console.log("episoder: ", episoder);

        visEpisode();
    }


    function visEpisode() {
        console.log("visEpisode");
        //        let temp = document.querySelector("template");
        //        episoder.forEach(episode => {
        //            console.log("loop id :", aktuelepisode);
        //            console.log("episode", episode.horer_til_podcast);
        //            if (episode.horer_til_podcast == aktuelepisode) {
        //
        //                console.log("loop kører id :", aktuelepisode);
        //                let klon = temp.cloneNode(true).content;
        //                klon.querySelector("h3").textContent = episode.title.rendered;
        //                klon.querySelector("img").src = episode.billede.guid;
        //                console.log("episode.title.rendered: ", episode.title.rendered);
        //                klon.querySelector(".beskrivelse").innerHTML = episode.content.rendered;
        //                klon.querySelector("article").addEventListener("click", () => {
        //                    location.href = episode.link;
        //                })
        //
        //                klon.querySelector("a").href = episode.link;
        //                console.log("episode", episode.link);
        //                container.appendChild(klon);
        //            }


        //        })


        document.querySelector(".episode_title").textContent = episode.title.rendered
        document.querySelector(".beskrivelse").innerHTML = episode.content.rendered;
        document.querySelector(".billede_episode").alt = episode.title.rendered
        document.querySelector(".billede_episode").src = episode.billede.guid;

    }
    getJson();

</script>

<?php get_footer(); ?>
