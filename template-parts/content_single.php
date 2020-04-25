<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">

        <div class="container single_ti">
            <div class="row">
                <div class="col-xl-7 single_ti_image">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="col-xl-5 single_ti_text">
                    <div class="single_ti_text_category">
                        <?php $cat = get_the_category();
                        echo $cat[0]->cat_name; ?>
                    </div>
                    <div class="single_ti_text_title">
                        <?php the_title(); ?>
                    </div>
                    <div class="single_ti_text_date">
                        <?php echo get_the_date('j, F, Y'); ?>
                    </div>
                    <?php if( has_excerpt() ){ ?>
                        <div class="single_ti_text_description">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php the_content(); ?>

        <?php if (get_the_tag_list()) {
            echo '<div class="block_tag"><i class="fa fa-tags"></i>';
            $tags = get_the_terms($post->ID, 'post_tag');
            foreach ($tags as $tag) {
                echo '<span>' . $tag->name . '</span>';
            }
            echo '</div>';
        } ?>
        <br>
        <?php get_template_part('template-parts/post_share'); ?>

    </div>
</article>