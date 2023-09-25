<?php
// Register the custom post type 'portfolio'
function create_portfolio_post_type()
{
    register_post_type(
        'portfolio',
        array(
            'labels' => array(
                'name' => __('Portfolio'),
                'singular_name' => __('Portfolio Item')
            ),
            'has_archive' => true, // Important for archive pages
            'rewrite' => array('slug' => 'portfolio', 'with_front' => false), // Ensure proper slug
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'), // Added 'custom-fields' support
            'taxonomies' => array('category', 'post_tag'), // Add support for categories and tags
        )
    );
}
add_action('init', 'create_portfolio_post_type');


// Add a meta box for the 'Live URL' field
function add_portfolio_live_url_meta_box()
{
    add_meta_box(
        'portfolio_live_url',
        'Live URL',
        'display_portfolio_live_url_meta_box',
        'portfolio',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_portfolio_live_url_meta_box');

// Display the meta box content
function display_portfolio_live_url_meta_box($post)
{
    // Retrieve the current value of the 'Live URL' field
    $live_url = get_post_meta($post->ID, '_portfolio_live_url', true);
?>
    <label for="portfolio_live_url">Live URL:</label>
    <input type="url" id="portfolio_live_url" name="portfolio_live_url" value="<?php echo esc_url($live_url); ?>" placeholder="https://example.com" style="width: 100%;" />
<?php
}

// Save the 'Live URL' field value
function save_portfolio_live_url_meta_data($post_id)
{
    if (isset($_POST['portfolio_live_url'])) {
        $live_url = sanitize_text_field($_POST['portfolio_live_url']);
        // Validate the URL to ensure it starts with 'http://' or 'https://'
        if (filter_var($live_url, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED | FILTER_FLAG_HOST_REQUIRED) !== false) {
            update_post_meta($post_id, '_portfolio_live_url', $live_url);
        } else {
            // Invalid URL format, you can handle this as needed (e.g., display an error message).
        }
    }
}
add_action('save_post_portfolio', 'save_portfolio_live_url_meta_data');
