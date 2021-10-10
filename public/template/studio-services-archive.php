<?php
/**
 * The template for displaying studio services archive
 *
 */

get_header();

$description = get_the_archive_description();
?>
<div class="container">
    <?php if ( have_posts() ) : ?>
    
        <h1 class="page-title mb-5"><?php post_type_archive_title(); ?></h1>
      
        <?php $i=0; while ( have_posts() ) : ?>
            <?php the_post(); ?>
            <?php if($i%2 == 0): echo '<div class="row">'; endif; ?>

            <div class="col-sm">
                <div class="card studio-service-card mb-5" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'post-thumbnail', ['class' => 'card-img-top', 'title' => 'Feature image'] ); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 studio-service-price">
                                <span class="price">Rp <?php echo number_format( get_field("price"), 0, ",", "." ); ?></span>
                            </div>
                            <div class="col-8 studio-service-title">
                                <h3><?php the_title(); ?></h3>
                            </div>
                        </div>
                    </div>
                </a>
                </div><!-- #card-<?php the_ID(); ?> -->
            </div>

            <?php if($i%2 == 1): echo '</div>'; endif; ?>

        <?php $i++; endwhile; ?>

    <?php else : ?>

        <section class="no-results not-found">
            <header class="page-header alignwide">
                <h1 class="page-title"><?php esc_html_e( 'Nothing here', 'studio-rental' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content default-max-width">
                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'studio-rental' ); ?></p>
            </div><!-- .page-content -->
        </section><!-- .no-results -->

    <?php endif; ?>

</div>

<?php get_footer(); ?>
