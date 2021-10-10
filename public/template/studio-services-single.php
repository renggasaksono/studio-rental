<?php
/**
 * The template for displaying studio services single
 * 
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	?>

    <div class="container">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php the_post_thumbnail( 'post-thumbnail', ['class' => 'img-responsive responsive--full mb-5']); ?>
            
            <div class="row">
                
                <div class="col-sm col-lg-7 studio-service-main-content"><!-- Main content -->

                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    
                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
                                'after'    => '</nav>',
                                /* translators: %: Page number. */
                                'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
                            )
                        );
                        ?>
                    </div><!-- .entry-content -->

                </div><!-- End Main content -->

                <div class="col-sm col-lg-5 studio-service-sidebar">
                    <?php
                    
                        $price = get_field( "price" );
                        if( $price ) {
                            echo '<span class="service-price-tag">Harga</span>';
                            echo '<h2 class="service-price">Rp ' . number_format( get_field("price"), 0, ",", "." ) . '</h>';
                        }

                    ?>
                </div>

            </div>

        </article><!-- #post-<?php the_ID(); ?> -->

    </div>

<?php
endwhile; // End of the loop.

get_footer();
