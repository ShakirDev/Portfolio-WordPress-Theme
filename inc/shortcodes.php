<?php
// Portfolio Shortcode
function portfolio_shortcode($atts)
{
    ob_start();

    echo '<div class="container">'; // Open the container

    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => 4, // Display latest 4 portfolio posts
    );

    $portfolio_query = new WP_Query($args);

    if ($portfolio_query->have_posts()) :
        while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
            // Display portfolio post content here (same as archive-portfolio.php)
?>
            <div class="row mb-4 px-sm-2">
                <div class="port-thumb col-md-6">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('large'); ?>" class="img-fluid" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>

                <div class="col-md-6 portfolio-card">
                    <div>
                        <h5 class="portfolio-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                        <?php
                        // Display post excerpt
                        if (has_excerpt()) {
                            echo '<p class="portfolio-card-text">' . get_the_excerpt() . '</p>';
                        }

                        // Display post category
                        $categories = get_the_category();
                        if ($categories) {
                            echo '<p class="portfolio-card-category"><strong>Project Type:</strong> ' . esc_html($categories[0]->name) . '</p>';
                        }

                        // Get the tags for the portfolio post
                        $tags = get_the_terms(get_the_ID(), 'post_tag');
                        if ($tags) {
                            echo '<div class="portfolio-card-tags"><strong>Technologies: </strong>';
                            foreach ($tags as $tag) {
                                echo '<span class="badge badge-secondary">' . esc_html($tag->name) . '</span>';
                            }
                            echo '</div>';
                        }

                        // Get the live URL custom field value
                        $live_url = get_post_meta(get_the_ID(), '_portfolio_live_url', true);
                        if ($live_url) {
                            echo '<p class="portfolio-card-live-url">';
                            echo '<a href="' . esc_url($live_url) . '" target="_blank"><i class="fa-solid fa-link"></i></a>';
                            echo '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
<?php
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No portfolio posts found.';
    endif;

    echo '</div>'; // Close the container

    return ob_get_clean();
}
add_shortcode('portfolio', 'portfolio_shortcode');
