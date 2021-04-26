<?php

get_header(); ?>

<main id="main" class="site-main">
    <section id="first_section_episode">
        <br>
        <!--        <img src=" assets/images/Asset_13.svg" alt="lyd">-->
    </section>
    <article class="radio" id="podcasts">
        <img src="" alt="" class="lydbolge">
    </article>

    <div class="baggrund">
        <section id="episoder">
            <template>
                <article class="article_episode">
                    <img src="" alt="" class="billede_episode">
                    <div>
                        <h3 class="episode_title"></h3>
                        <p class="beskrivelse"></p>
                        <a href="">Læs mere</a>
                    </div>
                </article>
            </template>
        </section>
    </div>
    <section id="third_section">
        <br>
    </section>
</main>


<script>
    let podcast;
    let episoder;
    let aktuelpodcast = <?php echo get_the_ID() ?>;


    const dbUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/episoder/" + aktuelpodcast;
    const episodeUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/episoder?per_page=100";

    const container = document.querySelector("#episoder");

    console.log("container: ", container);

    async function getJson() {
        const data = await fetch(dbUrl);
        podcast = await data.json();
        console.log(podcast);

        const data2 = await fetch(episodeUrl);
        episoder = await data2.json();
        console.log("episoder: ", episoder);

        visEpisoder();
    }


    function visEpisoder() {
        console.log("visEpisoder");
        let temp = document.querySelector("template");
        episoder.forEach(episode => {
            console.log("loop id :", aktuelpodcast);
            if (episode.horer_til_podcast == aktuelpodcast) {

                console.log("loop kører id :", aktuelpodcast);
                let klon = temp.cloneNode(true).content;
                klon.querySelector("h3").textContent = episode.title.rendered;
                klon.querySelector("img").src = episode.billede.guid;
                console.log("episode.title.rendered: ", episode.title.rendered);
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
