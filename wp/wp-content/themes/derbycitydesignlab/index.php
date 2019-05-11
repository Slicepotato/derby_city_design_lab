<?php get_header(); ?>

    <div id="primary" class="site-content-fullwidth">
        <main id="main" class="site-main content-wrap" role="main">
            <h1>
            <?php echo wp_title();
                /*
                if(!is_page('Home'))
                {
                    wp_title('');
                }
                */
            ?>
            </h1>
            <section>
            <?php while ( have_posts() ) : the_post(); ?>
                <article>
                    <h2><?php the_title(); ?></h2>
                    <div class="post-content"><?php the_content(); ?></div>
                </article>
            <?php endwhile; ?>
            </section>
        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer(); ?>