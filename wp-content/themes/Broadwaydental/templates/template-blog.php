<?php /* Template Name: blog */ ?>
<?php global $wp_query, $post; ?>
<?php get_header(); ?>
<div class="inn_pag_min_ban" style="
    background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>);">
    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>" alt="" title="" class="img-responsive center-block" />

<div class="container">
<div class="btn-button">
    <a href="<?php echo site_url('contact-us'); ?>" class="btn btn-default default_button btn-button-book">Book an Appointment</a>
    <a href="<?php echo site_url('gallery'); ?>" class="btn btn-default default_button btn-button-book">See Gallery</a>
</div>
 <div class="inn_pag_min_ban_text">
   <h4>THE CLEAR WAY  </h4>
   <h2>TO A PERFECTLY</h2>
   <h2>STRAIGHT SMILE</h2>
   <h4>INVISALIGN</h4>
</div>
 </div>

</div>
<?php /*?><div id="carousel-example-generic" class="carousel slide main_slider" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for($i = 0; $i < $total_slides; $i++) :?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" <?php echo ($i == 0) ? 'class="active"': '';?>></li>
        <?php endfor; ?>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php $first = 0; ?>
        <?php while(have_posts()) : the_post();?>
        <?php if(has_post_thumbnail()) : $first++;?>
        <div class="item <?php echo ($first == 1) ? 'active' : ''; ?>"> 
            <?php the_post_thumbnail('full', $attr); ?>
        </div>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 
        <span class="sr-only">Previous</span> 
    </a> 
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> 
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> 
        <span class="sr-only">Next</span> 
    </a> 
</div><?php */?>

<div class="container-fluid">
    <div class="container">
        <section class="row section_two">
		 
       
        <div class="col-md-3">
            <div id="invis_box">
                <div class="book_apoint col-md-12 invis_box ">
                                    
                    
                        
						<?php dynamic_sidebar('sidebar-2');?>
                       
                    
                   
                 </div>
               
            </div>
        </div>
       
        

        
        

        <div class="col-md-9">
		<div class="inn_page_right">
		<div class="row inn_page_tytle">
		
                    <div class="col-md-12">
                    <h2 class="inn_title">
<span>Blog</span>
</h2>
</div>
</div>     
		<div id="article">			
			<div class="row">
                        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
			<?php query_posts(array('posts_per_page' => 4,'post_type' => 'post', 'order' => 'ASC', 'paged' => $paged )); ?>
		   <?php while (have_posts()) : ?>
		   <?php  the_post(); ?>
				<div class="col-sm-6 col-md-6 block-thumbnail">
					<?php if(has_post_thumbnail()): ?>
					<div class="thumbnail_box">	
						<a class="thumb-info" href="<?php the_permalink();?>">
							<!--<img alt="" src="<?php //bloginfo( 'template_url' ); ?>/images/video_img.png">-->
							<?php the_post_thumbnail(); ?>
							<span class="thumb-info-action">
								<span class="thumb-info-action-icon" href="<?php the_permalink();?>" title="Universal"><i class="fa fa-eye"></i>MORE</span>
							</span>
						</a>    
					</div>
					<?php endif; ?>
				   <div class="caption">		   
						<div>
							<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							<div class="blog-text"><?php  the_excerpt(__('(READ MORE�)')); ?></div>
							<div class="news-meta">
								<span><i class="glyphicon glyphicon-calendar"></i><?php echo get_the_date(); ?></span>
								<span><i class="glyphicon glyphicon-user"></i><?php the_author(); ?></span>										
							</div>
					
						</div>
					</div>
				</div>   
				<?php 
					endwhile;
                                        
				?>
			</div>
                    <?php
                        if (function_exists(custom_pagination)) {
                            custom_pagination($custom_query->max_num_pages,"",$paged);
                        }
                        wp_reset_postdata();
                        
                    ?>
        </div>
      
                   
                
				
        </div>
     
          
    </section>     
       
<?php get_footer(); ?>                