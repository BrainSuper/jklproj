<div class="col-xl-3 blog_posts_item">
    <div class="blog_posts_item_image">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
    </div>
    <div class="blog_posts_item_category">
        <?php $cat = get_the_category();
        echo $cat[0]->cat_name; ?>
    </div>
    <div class="blog_posts_item_title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </div>
    <div class="blog_posts_item_date">
        <?php echo get_the_date('j, F, Y'); ?>
    </div>
</div>