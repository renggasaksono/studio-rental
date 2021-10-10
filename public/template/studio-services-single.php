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
                
                <div class="col-sm col-lg-6 studio-service-main-content"><!-- Main content -->
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </div><!-- End Main content -->

                <div class="col-sm col-lg-6 studio-service-sidebar">
                    <?php
                        
                        // Get price
                        $price = get_field( "price" );
                        if( $price ) {
                            echo '<span class="service-price-tag">Harga</span>';
                            echo '<h2 class="service-price">Rp ' . number_format( get_field("price"), 0, ",", "." ) . '</h>';
                        }

                        // Get service addons
                        $addons = get_posts(array(
                            'post_type' => 'mr_studio_addons',
                            'meta_query' => array(
                                array(
                                    'key' => 'studio_service',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                )
                            )
                        ));

                        if( $addons ): 
                    ?>
                            <h4 class="mb-2 mt-5">Additional services</h4>
                            <ul class="list-group list-group-flush">
                       
                            <?php foreach( $addons as $addon ): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo $addon->post_title; ?>
                                    <span class="badge bg-secondary rounded-pill">+Rp <?php echo number_format( get_field("price", $addon->ID), 0, ",", "." ); ?></span>
                                </li>
                            <?php
                            endforeach;
                        endif;
                    ?>
                </div>

            </div>

        </article><!-- #post-<?php the_ID(); ?> -->

    </div>

<?php
endwhile; // End of the loop.

get_footer();
