

<?php get_header(); ?>

<div class="container-fluid">
    <div class="container">
        
        <section class="row section_two">
            <div class="col-md-12 sigle_article_page">
                <div class="left_section">
                   
                 
		<div id="article">
		
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
<div class="title"><?php the_title(); ?></div>
<div class=""><?php 
/* 				if ( has_post_thumbnail() )
				{ 
					the_post_thumbnail();
				}  */
				
				?>
				<div class="main-content">
				<?php the_content(); ?>
					
				</div>
    <embed src="<?php echo get_field('upload_pdf');?>" width="500" height="375">
				 <a href="<?php echo the_permalink(); ?>">Click Here</a> 
				
	<!-- do stuff ... -->
	<?php endwhile; ?>
<?php endif; ?>
					
        </div>
                   
                </div>
            </div>
           
    </section>
<?php get_footer(); ?>                