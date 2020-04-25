<div style="height: 150px;" class=""></div>

<div class="container block_bi">
    <div class="row">
        <div class="col-xl-7">
            <?php
            query_posts('posts_per_page=1&order=DESC&order_by=ID');
            if (have_posts()) {
                while (have_posts()) {
                    the_post(); ?>

                    <div class="block_bi_image">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                    </div>
                    <div class="block_bi_category">
                        <?php $cat = get_the_category();
                        echo $cat[0]->cat_name; ?>
                    </div>
                    <div class="block_bi_title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </div>
                    <div class="block_bi_date">
                        <?php echo get_the_date('j, F, Y'); ?>
                    </div>
                <?php }
            }
            wp_reset_query();
            ?>
        </div>
        <div class="col-xl-5 post_list">
            <div class="post_list_title">
                <h1><?php the_title(); ?></h1>
            </div>
            <?php
            query_posts('posts_per_page=3&offset=1&order=DESC&orderby=ID');
            if (have_posts()) {
                while (have_posts()) {
                    the_post(); ?>
                    <div class="row post_list_item">
                        <div class="col-xl-6">
                            <div class="post_list_item_image">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="post_list_item_category">
                                <?php $cat = get_the_category();
                                echo $cat[0]->cat_name; ?>
                            </div>
                            <div class="post_list_item_title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </div>
                            <div class="post_list_item_date">
                                <?php echo get_the_date('j, F, Y'); ?>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            wp_reset_query();
            ?>
        </div>
    </div>
</div>

<div class="container blog_posts">
    <div class="row">
        <?php
        query_posts('posts_per_page=8&offset=4&order=DESC&orderby=ID');
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
                <div class="col-xl-3 blog_posts_item">
                    <div class="blog_posts_item_image">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
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
            <?php } ?>
        <?php } ?>
        <?php wp_reset_query(); ?>
    </div>
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'posts_per_page' => 12,
        'paged' => $paged,
        'order' => 'DESC',
        'orderby' => 'ID'
    );
    $custom_query = new WP_Query($args);
    if ($custom_query->max_num_pages > 1) : ?>
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php echo serialize($custom_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $custom_query->max_num_pages; ?>';
        </script>
    <?php endif; ?>
</div>