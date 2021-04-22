<?php
get_header(); ?>




<!--Content-->

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <h1>Podcasten</h1>
        <article>
            <img src="" alt="">
            <div>
                <h1></h1>
                <p class="beskrivelse"></p>
            </div>
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

        const dbUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/podcast/" + podcast;
        const episodeUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/episoder?per_page=100"

        const container = document.querySelector("#episoder");

        async function getJson() {
            const data = await fetch(dbUrl);
            podcast = await data.json();

            const data2 = await fetch(episodeUrl);
            episoder = await data2.json();
            console.log("episoder: ", episode);

            visPodcasts();
            visEpisoder();
        }


        function visPodcasts() {
            console.log("visPodcasts");
            console.log(podcast.title.rendered);
            document.querySelector("h1").innerHTML = podcast.title.rendered;
            document.querySelector(".beskrivelse").innerHTML = podcast.content.rendered;;
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

    </script>


</section>






    getJson();


<?php get_footer(); ?>
