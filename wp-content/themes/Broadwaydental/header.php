<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|', 'right', TRUE); ?></title>
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/fabe_icon.png" type="image/php">
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/reponsive.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container-fluid">
            <div class="container">
                <div class="row header">
                    <div class="col-md-3 logo"><a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" alt="" title="" class="img-responsive"/></a></div>
                    <div class="col-md-2 allon"><img src="<?php echo get_template_directory_uri(); ?>/images/allon.png" alt="" title="" class="img-responsive"/></div>
                    <div class="col-md-4 header_serach">
                        <div id="custom-search-input">
                            <div class="input-group col-md-12">
                            <form role="form" action="<?php echo home_url(); ?>" id="searchform" method="get">
                                    <input type="text" class="search-query form-control" placeholder="Search" name="s" id="search">
                                    <span class="input-group-btn" style="float:right;">
                                        <button class="btn btn-danger" type="submit"> <span class=" glyphicon glyphicon-search"></span></button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 header_cont pull-right">
                        <h3 class="text-center pull-right">CALL US TODAY<span class="text-right pull-right"><?php echo get_field('site_phone_no', 'option'); ?></span></h3>
                        
                        <div class="social header_social_media pull-right">
    <ul>
        <li><a target="_blank" href="http://twitter.com/broadwaydental"><i class="fa fa-lg fa-twitter"></i></a></li>
        <li><a target="_blank" href="http://www.youtube.com/user/sydneydentalclinic"><i class="fa fa-lg fa-youtube"></i></a></li>
        <li><a target="_blank" href="http://www.facebook.com/sydneydentist"><i class="fa fa-lg fa-facebook"></i></a></li>
        <li><a target="_blank" href="https://plus.google.com/100749605345761477256?rel=author"><i class="fa fa-lg fa-google-plus"></i></a></li>
        <li><a target="_blank" href="https://instagram.com/broadwaydental/"><i class="fa fa-lg fa-instagram"></i></a></li>
       
    </ul>
</div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-inverse main_nav" role="navigation">
            <div class="container"> 
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
<!--                    <ul class="nav navbar-nav">
                        <li class="active"> <a href="#">HOME </a> </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">ABOUT US<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Page 1-1</a></li>
                                <li><a href="#">Page 1-2</a></li>
                                <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li> <a href="#">DENTAL TREATMENTS </a> </li>
                        <li> <a href="#"> ALL-ON-4 </a> </li>
                        <li> <a href="#">SMILE GALLERY </a> </li>
                        <li> <a href="#">IN THE MEDIA </a> </li>
                        <li> <a href="#"> BLOG </a> </li>
                        <li> <a href="#"> CONTACT US </a> </li>
                    </ul>-->
                    <?php
                        $args = array(
                            'theme_location'  => 'primary',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => '',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="nav navbar-nav">%3$s</ul>',
                            'depth'           => 0,
                            'walker' => new wp_bootstrap_navwalker()
                        );
                        wp_nav_menu( $args );
                    ?>
                </div>
              <!-- /.navbar-collapse --> 
            </div>
          <!-- /.container --> 
        </nav>
        <!--Menu_end--> 
