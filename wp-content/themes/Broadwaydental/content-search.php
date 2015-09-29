<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php broadwaydental_post_thumbnail(); ?>

    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </header>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <?php if ( 'post' == get_post_type() ) : ?>
            <footer class="entry-footer">
                <?php broadwaydental_entry_meta(); ?>
                <?php edit_post_link( __( 'Edit', 'broadwaydental' ), '<span class="edit-link">', '</span>' ); ?>
            </footer>
    <?php else : ?>
            <?php edit_post_link( __( 'Edit', 'broadwaydental' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
    <?php endif; ?>
</article>
