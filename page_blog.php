<?php
/*
 * Template name: Blog
 * Template post type: page
 */?>

<?php get_header('blog');  ?>


    <section id="blog">
        <main id="main" class="site-main" role="main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content_blog', get_post_format() );

            endwhile;
            ?>

        </main>
    </section>

<?php
get_footer();
