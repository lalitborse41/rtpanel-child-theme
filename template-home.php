<?php
/**
 * Template Name: Homepage Template
 * 
 * Custom Template Layout
 *
 * @package rtPanel
 *
 * @since rtPanelChild 2.0
 */
get_header(); ?>

    <section id="content" role="main" class="large-8 columns rtp-custom-page">
        <?php rtp_hook_begin_content(); ?>
        
        <?php
            /* the loop */
            if ( have_posts () ) {
                while( have_posts() ) {
                    the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'rtp-custom-box' ); ?>>
                        <?php rtp_hook_begin_post(); ?>

                        <header class="post-header clearfix">
                            <?php rtp_hook_begin_post_title(); ?>
    


                            <?php rtp_hook_post_meta( 'top' ); ?>
                                


                       </header><!-- .post-title -->
                        
                        <div class="post-content clearfix">
                            <?php rtp_hook_begin_post_content(); ?>
                            
<?php $args = array( 'post_type' => 'custom-post', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	the_title();
        the_post_thumbnail();
	echo '<div class="entry-content">';
	the_content();
	echo '</div>';
        
endwhile; ?>


                            <?php the_content( __( 'Read More &rarr;', 'rtPanel' ) ); ?>

                            <?php rtp_hook_end_post_content(); ?>
                            

                        </div><!-- .post-content -->

                        <?php rtp_hook_post_meta( 'bottom' ); ?>

                        <?php rtp_hook_end_post(); ?>

                    </article><!-- .rtp-post-box --><?php

                    // Comment Form
                    rtp_hook_comments();
                }

            } ?>

        <?php rtp_hook_end_content(); ?>
    </section><!-- End of #content -->

<?php rtp_hook_sidebar(); ?>

<?php get_footer();

