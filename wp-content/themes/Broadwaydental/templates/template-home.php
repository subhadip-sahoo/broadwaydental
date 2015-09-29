<?php /* Template Name: Home */ ?>
<?php global $wp_query, $post; ?>
<?php get_header(); ?>
<?php query_posts(array('post_type' => 'sliders', 'posts_per_page' => -1)); ?>
<?php if(have_posts()) :?>
<?php $total_slides = $wp_query->found_posts; ?>
<div id="carousel-example-generic" class="carousel slide main_slider" data-ride="carousel">
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
           <?php the_content(); ?>
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
</div>
<?php endif; ?>
<div class="container-fluid">
    <div class="container">
        <section class="section_one row">
            <div class="col-md-12">
                <h2 class="text-center"><span>Our Expertise</span></h2>
            </div>
            <?php $expertise_gallery = get_field('expertise_gallery'); ?>
            <?php if(!empty($expertise_gallery)) : ?>
            <div class="col-md-12">
                <ul class="our_exper_nav list-inline">
                    <?php foreach ($expertise_gallery as $eg) :?>
                    <?php $image = wp_get_attachment_image_src($eg['image'], 'home_gallery_image'); ?>
                    <li> 
                        <span><?php echo $eg['title']; ?></span> 
                        <?php if(!empty($image[0])) : ?>
                        <a href="<?php echo ($eg['link'] <> '') ? $eg['link'] : '#'; ?>">
                            <img src="<?php echo $image[0];?>" class="img-responsive">
                        </a> 
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </section>
        <section class="row section_two">
            <div class="col-md-8">
                <div class="left_section">
                    <?php echo get_the_content($post->ID); ?>
                    <br>
                    <a href="<?php echo get_field('more_button'); ?>" class="btn btn-default default_button">MORE</a>
                </div>
            </div>
            <div class="col-md-4">
                <?php $advertiser_gallery = get_field('advertiser_gallery'); ?>
                <?php if(!empty($advertiser_gallery)) : ?>
                <div class="right_section">
                    <h2 class="text-center">As seen on</h2>
                    <ul class="list-inline as_se_nav">
                        <?php foreach($advertiser_gallery as $ag) :?>
                        <?php $image = wp_get_attachment_image_src($ag['id'], 'home_advertise_image'); ?>
                        <?php if(!empty($image[0])) : ?>
                        <li><img src="<?php echo $image[0]; ?>" alt="" title="" class="img-responsive"/></li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <div class="book_apoint col-md-12">
                    <h2>Book Appointment</h2>
                    <div class="reach_our_form" id="content">
                        <?php echo do_shortcode('[contact-form-7 id="71" title="Book Appointment"]'); ?>
                    </div>
                </div>
            </div>
    </section>
<?php get_footer(); ?>                