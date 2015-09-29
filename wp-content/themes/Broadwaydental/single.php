<?php /* Template Name: blog */ ?>
<?php global $wp_query, $post; ?>
<?php get_header(); ?>

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
<span><?php the_title(); ?></span>
</h2>
</div>
</div>     
		<div id="article">			
			
			
		   <?php 
                      
                        if(have_posts()) :
                            while(have_posts()):
                                the_post();
                    ?>
		  
				<div class="">
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
				   <div class="">		   
						<div>
							<h3><?php the_title(); ?></h3>
							<?php  the_content(); ?>
							<div class="news-meta">
								<span><i class="glyphicon glyphicon-calendar"></i><?php echo get_the_date(); ?></span>
								<span><i class="glyphicon glyphicon-user"></i><?php the_author(); ?></span>										
							</div>
					
						</div>
					</div>
				</div>   
				 <?php   
                            endwhile;
                                  
                        endif; 
                    ?>
	
        </div>
      
                   
                
				
        </div>
     
          
    </section>     
       
<?php get_footer(); ?>                