<footer>
    <div class="row footer_bg">
        <div class="pull-left col-md-8">
            <div class="footer_left col-md-12 pull-left">
                <div class="col-md-6 pull-left">
                    <h2>quick links</h2>
                    <?php
                        $args = array(
                            'theme_location'  => 'quick_links_1',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="foot_nav col-md-6">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                        );
                        wp_nav_menu( $args );
                    
                        $args = array(
                            'theme_location'  => 'quick_links_2',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="foot_nav col-md-6">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                        );
                        wp_nav_menu( $args );
                    ?>
                </div>
                <div class="col-md-6 pull-left">
                    <h2>dental treatment</h2>
                    <?php
                        $args = array(
                            'theme_location'  => 'dental_treatment_1',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="foot_nav col-md-6">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                        );
                        wp_nav_menu( $args );
                   
                        $args = array(
                            'theme_location'  => 'dental_treatment_2',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="foot_nav col-md-6">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                        );
                        wp_nav_menu( $args );
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-1 footer_middle"></div>
        <div class="col-md-3 pull-right">
            <div class="footer_right pull-right">
                <h2>Newsletter</h2>
                <form method="POST" name="subscription" action="<?php echo site_url(); ?>/index.php?wp_nlm=subscription">
                    <div class="form-group">
                        <input type="email" class="form-control" name="xyz_em_email" id="xyz_em_email" placeholder="Enter Email id Here..">
                    </div>
                    <button type="submit" class="btn btn-default default_button_black text-center" name="htmlSubmit" id="submit_em" onclick="javascript: if(!xyz_em_verify_fields()) return false;">SUBSCRIBE</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row last_footer">
        <div class="col-md-6">
            <p class="text-left"><?php echo get_field('site_copyright_text', 'option'); ?></p>
        </div>
        <div class="col-md-6">
            <p class="text-right"><?php echo get_field('site_footer_text', 'option'); ?></p>
        </div>
    </div>
</footer>
</div>
</div>
<?php wp_footer(); ?>


</body>
</html>