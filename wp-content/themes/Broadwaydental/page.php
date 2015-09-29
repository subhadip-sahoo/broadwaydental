<?php get_header(); ?>

<?php if (has_post_thumbnail()){?>


<div class="inn_pag_min_ban" style="
    background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>);">
    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>" alt="" title="" class="img-responsive center-block" />

<div class="container">
<div class="btn-button">
<a href="http://111.93.163.213/Broadwaydental/php/contact-us/" class="btn btn-default default_button btn-button-book">Book an Appointment</a><a href="http://111.93.163.213/Broadwaydental/php/gallery/" class="btn btn-default default_button btn-button-book">See Gallery</a>
</div>
 <div class="inn_pag_min_ban_text">
   <h4>THE CLEAR WAY  </h4>
   <h2>TO A PERFECTLY</h2>
   <h2>STRAIGHT SMILE</h2>
   <h4>INVISALIGN</h4>
</div>
 </div>

</div>
<?php  }else{?>
 <div class="inn_pag_min_ban" style="
    background-image:url(<?php echo get_template_directory_uri(); ?>/images/inner_main_banner.png);
   ">
    <img src="<?php echo get_template_directory_uri(); ?>/images/inner_main_banner.png" alt="" title="" class="img-responsive center-block" />

<div class="container">
 <div class="inn_pag_min_ban_text">
   <h4>THE CLEAR WAY  </h4>
   <h2>TO A PERFECTLY</h2>
   <h2>STRAIGHT SMILE</h2>
   <h4>INVISALIGN</h4>
</div>
 </div>

</div>
                   <?php }?>

<div class="container-fluid">
  <div class="container inn_pag">
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
        <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post();?>
        <?php $col = 12-$col; ?>
        <div class="col-md-<?php echo $col; ?>">
            <div class="inn_page_right">
                <div class="row inn_page_tytle">
                    <div class="col-lg-12">
                        <h2 class="inn_title"><span><?php the_title(); ?></span></h2>
                    </div>
                </div>
                <?php the_content(); ?>
                
            </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>