<?php /* Template Name: gallery */ ?>
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
                    <h2><?php the_title(); ?></h2>
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
                
           		<div class="crown-container">
			<div class="header-image">
			
			<div>
			<div class="row inn_page_tytle">
                    <div class="col-lg-12"><h2 class="inn_title"><span><?php echo get_field('page_heading');  ?></span></h2></div></div>
		<div class="image-gallery">
			
				<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

				<script src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.js"></script> 


			
					<div id="owl-demo">
					
				<?php  if (get_field('gallery_image')):  ?>
         
				<?php  
					
					 while( has_sub_field('gallery_image') ):   ?>
					 
					 <div class="item">
                     <p><?php echo get_sub_field('case_number'); ?></p>
								<div class="gallerybefore">
								
								<img src="<?php echo get_sub_field('before_image'); ?>" class="img-responsive img-thumbnail" alt="before" width="300" height="183"/>
								<div class="item-before">Before</div>
								</div>
								<div class="galleryafter">
								<img src="<?php echo get_sub_field('after_image'); ?>" class="img-responsive img-thumbnail" alt="before" width="300" height="183"/>
								<div class="item-after">After</div>
								</div>
								</div>
					  

				 
								   

					<?php endwhile; ?>
           
				<?php endif; ?>
				
				</div>
					
					<div class="customNavigation">
					<a class="btn prev">Previous</a>
					  <a class="btn next">Next</a>
					</div>
					</div>
<script>


    $(document).ready(function() {
     var owl = $("#owl-demo");
       owl.owlCarousel({
     
          autoPlay:4000, //Set AutoPlay to 3 seconds
     
          items : 1,
          itemsDesktop : [1199,1],
          itemsDesktopSmall : [979,1],
		  itemsTablet: [600,1],
        itemsMobile : [479, 1],
     
      });
	    $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  });
     
    });


</script>
							
						</div>
					</div>

			<?php 
			if(have_posts()){
				while(have_posts()){
					the_post();
					the_content();
				}
			}?>
		</div>
			</div>
			
				
            </div>
     
          
    </section>
<?php get_footer(); ?>                