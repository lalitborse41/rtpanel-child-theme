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
get_header();
?>

<section id="content" role="main" class="large-8 columns rtp-custom-page">
    <?php rtp_hook_begin_content(); ?>

    <?php
    /* the loop */
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('rtp-custom-box'); ?>>
                <?php rtp_hook_begin_post(); ?>

                <header class="post-header clearfix">
                    <?php rtp_hook_begin_post_title(); ?>



                    <?php rtp_hook_post_meta('top'); ?>



                </header><!-- .post-title -->

                <div class="post-content clearfix">
                    <?php rtp_hook_begin_post_content(); ?>
                    <?php add_action("rtp_hook_begin_content_wrapper", "rtp_call_slider", 1, 0); ?>
                      
                    <?php 
                    
                    $args = array('post_type' => 'custom-post', 'posts_per_page' => 10);
                    $loop = new WP_Query($args);
                     ?><h3>Glimpses of Exhibition</h3>
                     <?php
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                   
                    <div class="custom">                  <a href="#"><?php
                            the_post_thumbnail();
                            the_title();
                            ?> </a> <?php
                        echo '<div class="entry-content">';
                        the_content();
                        echo '</div>';

                    endwhile;
                    ?>
                    </div>
                     
                     
	
                    <?php the_content(__('Read More &rarr;', 'rtPanel')); ?>
    
                    <?php rtp_hook_end_post_content(); ?>
            

                </div><!-- .post-content -->

                <?php rtp_hook_post_meta('bottom'); ?>

                <?php rtp_hook_end_post(); ?>

            </article><!-- .rtp-post-box --><?php
            }
    }
    ?>

    <?php rtp_hook_end_content(); ?>
            <div id="content_sidebar">
                     <div id="secondary" class="sidebar-container" role="complementary">
	    <div class="widget-area">
	        <?php dynamic_sidebar( 'sidebar-2' ); ?>
	    </div><!-- .widget-area -->
	</div><!-- #secondary -->
            </div>


</section><!-- End of #content -->

<?php rtp_hook_sidebar(); ?>


<?php
get_footer();