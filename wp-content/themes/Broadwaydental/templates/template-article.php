<?php /* Template Name: article */ ?>
<?php global $wp_query, $post; ?>
<?php get_header(); ?>

<div class="container-fluid">
<div class="container">
<section class="row section_two">
  <?php $related_page_list = get_field('related_page_list'); ?>
  <?php $special_page_list = get_field('special_page_list'); ?>
  <?php $col = 0; ?>
  <?php if(!empty($related_page_list) || !empty($special_page_list)) : ?>
  <?php $col = 3; ?>
  <div class="col-md-<?php echo $col; ?>">
    <div id="invis_box">
      <div class="book_apoint col-md-12 invis_box ">
        <h2>
          <?php the_title(); ?>
        </h2>
        <?php if(!empty($related_page_list)) : ?>
        <ul class="nav navbar-nav inv_nav">
          <?php foreach($related_page_list as $rpl) :?>
          <?php $postid = url_to_postid( $rpl['page_name'] ); ?>
          <li><a href="<?php echo $rpl['page_name']; ?>"><?php echo get_the_title($postid); ?></a></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>
      <?php if(!empty($special_page_list)) : ?>
      <ul class="nav  book_you_nav col-md-12">
        <?php foreach($special_page_list as $spl) :?>
        <?php $postid = url_to_postid( $spl['special_page'] ); ?>
        <li><a href="<?php echo $spl['special_page']; ?>"><?php echo get_the_title($postid); ?></a></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
  <?php $col = 12-$col; ?>
  <div class="col-md-<?php echo $col; ?>">
  <div class="inn_page_right">
    <div class="row inn_page_tytle">
      <div class="col-md-12">
        <h2 class="inn_title"> <span>
          <?php the_title(); ?>
          </span> </h2>
      </div>
    </div>
    <div id="article">
      <?php 
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array('post_type' => 'article', 'posts_per_page' => 9,'paged' => $paged); 
					//$the_query = new WP_Query( $args );
					// The Loop
					query_posts($args);?>
      <div class="articl_tab">
        <?php while ( have_posts() ) :the_post();
					
					?>
        <div class="bs-callout bs-callout-info artical_div col-md-6"><a href="<?php echo the_permalink(); ?>">
          <?php 
				if ( has_post_thumbnail() )
				{ 
					the_post_thumbnail();
				} 
				
				?>
          <div class="title">
            <?php the_title(); ?>
          </div>
          <div class="post-date"><?php echo get_the_date(); ?></div>
          </a> </div>
        <?php endwhile; 
                                    if (function_exists(custom_pagination)) {
                                        custom_pagination($custom_query->max_num_pages,"",$paged);
                                    }
                                ?>
      <div class="article_read_more">
        <?php wp_reset_postdata(); ?>
        <a href="#">Book your consultation today</a> </div>
      </div>
      
    </div>
    <div> </div>
  </div>
</section>
<?php get_footer(); ?>
