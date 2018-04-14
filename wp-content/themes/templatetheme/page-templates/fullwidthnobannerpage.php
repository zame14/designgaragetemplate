<?php
/**
 * Template Name: Full Width No Banner Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published and no banner.
 *
 * @package understrap
 */
get_header();
?>
<div class="wrapper" id="full-width-no-banner-page">
    <div class="container" id="content">

        <div class="row">

            <div class="col-xl-12 content-area" id="primary">

                <main class="site-main" id="main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :

                            comments_template();

                        endif;
                        ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->

            </div><!-- #primary -->

        </div><!-- .row end -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
