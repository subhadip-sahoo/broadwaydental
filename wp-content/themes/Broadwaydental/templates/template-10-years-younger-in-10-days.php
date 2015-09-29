<?php /* Template Name: template-10-years-younger-in-10-days */ ?>
<?php global $wp_query, $post; ?>
<?php get_header(); ?>
<?php query_posts(array('post_type' => 'sliders', 'posts_per_page' => -1)); ?>
<?php if(have_posts()) :?>
<?php $total_slides = $wp_query->found_posts; ?>

<?php endif; ?>
<?php wpbeginner_numeric_posts_nav(); ?>
        
<?php get_footer(); ?>                