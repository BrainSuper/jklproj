<?php

get_header(); ?>

    <section id="single_post">
        <main id="main" class="site-main" role="main">
            <?php
            while (have_posts()) : the_post();
                get_template_part('template-parts/content_single', get_post_format());
            endwhile;
            ?>
        </main>
    </section>

<?php
get_footer();
