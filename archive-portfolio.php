<?php
get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
// Get the current page number.

// Define the custom query with pagination.
$args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => 4, // Number of posts per page.
    'paged' => $paged, // Include this to enable pagination.
);

$portfolio_query = new WP_Query($args);

// Start the loop
if ($portfolio_query->have_posts()) :
    echo '<div class="container">';
    while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
        // Display portfolio post content here
?>
        <div class="row mb-4  px-sm-2">
            <div class="port-thumb col-md-6 ">
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
                    echo '<div class="portfolio-card-tags"><strong>Tecnologies: </strong>';
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
                echo '</div>'; // Close the portfolio-card container
                echo '</div>'; // Close the col-md-6 container
                echo '</div>'; // Close the row container
            endwhile;
            echo '</div>'; // Close the container
                ?>
                <div class="container text-center mt-4">
                    <?php
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $portfolio_query->max_num_pages,
                        'prev_text' => '&laquo; Previous',
                        'next_text' => 'Next &raquo;',
                    ));
                    ?>
                </div>
            <?php
        else :
            // If no posts are found, display a message here
            echo 'No portfolio posts found.';
        endif;

        wp_reset_postdata(); // Reset the custom query.

        get_footer();
            ?>