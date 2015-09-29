<?php get_header(); ?>
<div class="container-fluid">
    <div class="container inn_pag">
        <section class="row section_two">
            <h2 class="inn_title"><span><?php printf( __( 'Search Results for: %s', 'broadwaydental' ), get_search_query() ); ?></span></h2>
            <div class="col-md-12">
                <div class="inn_page_right">
                    <?php if ( have_posts() ) : ?>
                    <?php while(have_posts()) : the_post(); ?>
                    <div class="row inn_page_tytle">
                        <div class="col-lg-12">
                            <a href="<?php the_permalink(); ?>"><h2 class="inn_title"><span><?php the_title(); ?></span></h2></a>
                        </div>
                    </div>
                    <div class="row inn_contant">
                        <div class="col-lg-12">
                            <?php echo mb_strimwidth(wp_strip_all_tags(get_the_content(get_the_ID())), 0, 200, '&nbsp...') ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                    <?php else: ?>
                    <div class="row inn_page_tytle">
                        <div class="col-lg-12">
                            <h2 class="inn_title"><span>No results found!</span></h2>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
<?php get_footer(); ?>
