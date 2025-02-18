<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

$page_for_posts = get_option('page_for_posts');
$bg = get_the_post_thumbnail_url($page_for_posts, 'full') ?? null;

// Prevent caching issues
wp_cache_flush();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

get_header();

// Sanitize input values
$category_slug = filter_input(INPUT_GET, 'category', FILTER_UNSAFE_RAW ) ?? null;
$date_from = filter_input(INPUT_GET, 'dateFrom', FILTER_UNSAFE_RAW ) ?? null;
$date_to = filter_input(INPUT_GET, 'dateTo', FILTER_UNSAFE_RAW ) ?? null;

// Default date_from to the earliest post date or a far-past date
if (!$date_from) {
    $date_from = '2015-01-01';
}

// Default date_to to today
if (!$date_to || strtotime($date_to) > time()) {
    $date_to = date('Y-m-d');
}


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />
<main id="main">
    <section class="hero d-flex align-items-center" style="background-image:url(<?=$bg?>)">
        <div class="container-xl my-auto">
            <h1>News</h1>
            <a class="btn btn-primary mt-4" href="/contact-us/">Get in Touch</a>
        </div>
    </section>

    <div class="container-xl py-5">
        <?php

        if (get_the_content(null, false, $page_for_posts)) {
            echo '<div class="mb-5">' . get_the_content(null, false, $page_for_posts) . '</div>';
        }

//  filters here
?>
<form action="<?=home_url('/news/')?>" method="get" class="mb-4">
    <?php wp_nonce_field('news_filter_form', 'news_filter_nonce'); ?>
    <div class="row g-2">
        <div class="col-md-3">
            <select name="category" class="form-select">
                <option value="">All Categories</option>
<?php

//  category
$cats = get_categories();
foreach ($cats as $c) {
    $selected = ($category_slug === $c->slug) ? 'selected' : '';
    echo "<option value=\"{$c->slug}\" {$selected}>{$c->name}</option>";
}
?>
            </select>
        </div>
        <div class="col-6 col-md-2">
<?php
// date from
$oldest_post_query = new WP_Query( array(
    'posts_per_page' => 1, // We only need the oldest post
    'order'          => 'ASC', // Order by post date ascending
    'orderby'        => 'date', // Order by the date
    'post_status'    => 'publish', // Only look for published posts
    'post_type'      => 'post', // Only fetch blog posts (not pages or custom post types)
) );
$min = 'dd-mm-yyyy';
while ( $oldest_post_query->have_posts() ) {
    $oldest_post_query->the_post(); // Set up post data
    $min = get_the_date('Y-m-d',get_the_ID());
}


            // Ensure the correct dateFrom value is retained
            $value_date_from = isset($date_from) ? esc_attr($date_from) : '2015-01-01';
            echo "<input type='date' name='dateFrom' value='{$value_date_from}' class='form-control'>";
?>
        </div>
        <div class="col-6 col-md-2">
<?php
// Ensure the correct dateTo value is retained
$value_date_to = isset($date_to) ? esc_attr($date_to) : date('Y-m-d');
echo "<input type='date' name='dateTo' value='{$value_date_to}' class='form-control'>";
?>
        </div>
        <div class="col-md-2 d-flex gap-2">
            <input type="submit" value="Search" class="btn btn-primary">
            <a class="btn btn-secondary" href="/news/">Reset</a>
        </div>
    </div>
</form>
<?php

echo '<div class=" mb-5">';

    
// Setup the query arguments
$args = array(
    'post_type' => 'post', // or 'any' if you want to include custom post types
    'post_status' => 'publish',
    'date_query' => array(
        array(
            'column'   => 'post_date',
            'after'    => array(
                'year'  => date('Y', strtotime($date_from)),
                'month' => date('m', strtotime($date_from)),
                'day'   => date('d', strtotime($date_from)),
            ),
            'before'   => array(
                'year'  => date('Y', strtotime($date_to)),
                'month' => date('m', strtotime($date_to)),
                'day'   => date('d', strtotime($date_to)),
            ),
            'inclusive' => true,
        ),
    ),
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1, // -1 means all matching posts
);

if (!empty($category_slug)) {
    $args['category_name'] = sanitize_text_field($category_slug);
}

// Create a new WP_Query instance
$query = new WP_Query($args);

// Check if the query returns any posts
if ($query->have_posts()) {
    echo '<div class="mb-4">' . $query->found_posts . ' posts found</div>';
    while ($query->have_posts()) {
        $query->the_post();
        $the_date = get_the_date('jS F, Y');
        $cats = get_the_category();
        ?>
        <div class="news_row mb-4">
            <a href="<?=get_the_permalink()?>" class="news__link">
                <div class="news__image_container">
                    <?php
                    if (get_the_post_thumbnail(get_the_ID()) ?? null) {
                        echo get_the_post_thumbnail(get_the_ID(),'medium',array('class'=>'news__image'));
                    }
                    else {
                        echo '<img src="' . get_stylesheet_directory_uri() . '/img/blog-placeholder.png" class="news__image">';
                    }
                    ?>
                </div>
                <div>
                    <h3 class="text-green-400 h5 mb-2">
                        <?=get_the_title()?>
                    </h3>
                    <div class="news__excerpt text-black mb-2"><?=wp_trim_words(get_the_content(),40)?></div>
                </div>
            </a>
            <div class="news__meta d-flex align-items-center flex-wrap fs-300">
                <div>Posted on <?=$the_date?><div>
                <div>by <?=get_the_author_meta('display_name')?></div>
                <div>in <?php
                $catlinks = array();
                foreach ($cats as $c) {
                    $link = get_term_link($c->term_id);
                    $catlinks[] = "<a href=\"{$link}\">{$c->cat_name}</a>";
                }
                echo implode(', ', $catlinks);
echo '.';
                ?>
                </div>
                </div>
            </div>
        </div>
        <hr>
        <?php
    }
} else {
    echo 'No posts found.';
}

// Reset post data
wp_reset_postdata();
?>
        </div>
        <?php
        // numeric_posts_nav();
?>
    </div>
    </div>
</main>
<?php

get_footer();
?>