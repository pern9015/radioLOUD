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



get_header(); ?>

<div<?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php astra_content_page_loop(); ?>

    <?php astra_primary_content_bottom(); ?>

    </div><!-- #primary -->

    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/custom.css">
    </head>
    <main>
        <nav id="filtrering"></nav>
        <header>
            <h1 class="type" style="font-family: 'Montserrat', sans-serif; font-weight: 900;">Alle Podcasts</h1>
        </header>


        <section id="liste" class="podcastcontainer" style="display: grid;grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    grid-gap: 20px;margin: 0px 200px;"></section>



    </main>
    <template>
        <article class="radio">
            <img src="" alt="" class="billede" style="height: 350px;
    width: 350px;">
            <h3 class="titel"></h3>
            <p class="kort_beskrivelse"></p>

        </article>
    </template>

    <script>
        const header = document.querySelector("header h1");
        let podcasts;
        let categories;
        let filterPodcast = "alle";
        const dbUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/podcast?per_page=100";
        const catUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/categories";

        async function getJson() {
            const data = await fetch(dbUrl);
            const catdata = await fetch(catUrl);
            podcasts = await data.json();
            categories = await catdata.json();
            console.log(podcasts);
            console.log(categories);
            visPodcasts();
            opretKnapper();
        }

        function opretKnapper() {
            categories.forEach(cat => {
                document.querySelector("#filtrering").innerHTML += `<button class="filter" data-podcast="${cat.id}">${cat.name}</button>`
            })

            addEventListenersToButtons();
        }

        function addEventListenersToButtons() {
            document.querySelectorAll("#filtrering button").forEach(elm => {
                elm.addEventListener("click", filtrering);
            })
        };

        function filtrering() {
            filterPodcast = this.dataset.podcast;
            console.log(filterPodcast);

            document.querySelector(".valgt").classList.remove("valgt");
            this.classList.add("valgt")

            visPodcasts();

            header.textContent = this.textContent;


        }


        function visPodcasts() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".podcastcontainer")
            container.innerHTML = "";
            podcasts.forEach(podcast => {
                if (filterPodcast == "alle" || podcast.categories.includes(parseInt(filterPodcast))) {
                    let klon = temp.cloneNode(true).content;
                    klon.querySelector("h3").textContent = podcast.title.rendered;
                    klon.querySelector(".billede").src = podcast.billede.guid;
                    klon.querySelector(".kort_beskrivelse").textContent = podcast.kort_beskrivelse;
                    klon.querySelector("article").addEventListener("click", () => {
                        location.href = podcast.link;
                    })
                    container.appendChild(klon);
                }
            })

        }

        getJson();

    </script>




    <?php get_footer(); ?>
