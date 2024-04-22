<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

$page_for_posts = get_option('page_for_posts');
$bg = get_the_post_thumbnail_url($page_for_posts, 'full');

get_header();

// Sanitize input values
$category_slug = filter_input(INPUT_POST, 'category', FILTER_UNSAFE_RAW ) ?? null;
$tag_slug = filter_input(INPUT_POST, 'tag', FILTER_UNSAFE_RAW ) ?? null;
$date_from = filter_input(INPUT_POST, 'dateFrom', FILTER_UNSAFE_RAW ) ?? null;
$date_to = filter_input(INPUT_POST, 'dateTo', FILTER_UNSAFE_RAW ) ?? null;

$obj = get_queried_object();

$theTerm = '';

if ($obj->taxonomy == 'category') {
    $category_slug = $obj->slug;
    // $theTerm = $obj->name;
}
elseif ($obj->taxonomy == 'post_tag') {
    $tag_slug = $obj->slug;
    // $theTerm = $obj->name;
}


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />
<main id="main">
    <section class="hero" style="background-image:url(<?=$bg?>)">
        <div class="overlay"></div>
        <div class="container-xl my-auto">
            <h1 class="text-white">News</h1>
        </div>
    </section>

    <div class="container-xl py-5">
        <?php
        if (get_the_content(null, false, $page_for_posts)) {
            echo '<div class="mb-5">' . get_the_content(null, false, $page_for_posts) . '</div>';
        }

//  filters here
?>
<form action="<?=home_url('/news/')?>" method="post" class="mb-4">
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
        <div class="col-md-3">
            <select name="tag" class="form-select">
                <option value="">All Countries</option>
<?php
// country
$tags = get_terms( array(
    'taxonomy' => 'post_tag',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => false, // Set to true if you only want tags assigned to posts
) );
foreach ($tags as $t) {
    $selected = ($tag_slug === $t->slug) ? 'selected' : '';
    echo "<option value=\"{$t->slug}\" {$selected}>{$t->name}</option>";
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
$value_date_from = $date_from ?? $min; // Use submitted dateFrom or the minimum date
echo "<input type='date' name='dateFrom' value='{$value_date_from}' class='form-control'>";
?>
        </div>
        <div class="col-6 col-md-2">
<?php
// date to
$max = date('Y-m-d');
$value_date_to = $date_to ?? $max; // Use submitted dateTo or today's date
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
    'category_name' => $category_slug, // Use category slug
    'tag' => $tag_slug, // Use tag slug
    'date_query' => array(
        array(
            'after' => $date_from,
            'before' => $date_to,
            'inclusive' => true,
        ),
    ),
    'posts_per_page' => -1, // -1 means all matching posts
);
    
// Create a new WP_Query instance
$query = new WP_Query($args);

// Check if the query returns any posts
if ($query->have_posts()) {
    echo '<div class="mb-4">' . $query->found_posts . ' posts found</div>';
    while ($query->have_posts()) {
        $query->the_post();
        $the_date = get_the_date('jS F, Y');
        $countries = get_the_tags();
        $cats = get_the_category();
        ?>
        <div class="news_row mb-4">
            <a href="<?=get_the_permalink()?>">
                <h3 class="h5 mb-2">
                    <?=get_the_title()?>
                </h3>
                <div class="news__excerpt mb-2 text-grey-900"><?=wp_trim_words(get_the_content(),40)?></div>
            </a>
            <div class="news__meta d-flex align-items-center fs-300">
                <div>Posted on <?=$the_date?></div>
                <?php
                if (is_array($countries) && !empty($countries)) {
                    foreach ($countries as $cc) {
                        $ccode = get_field('country_code', $cc);
                    ?>
                    <div>, in <a href="<?=get_term_link($cc->term_id)?>"><?=$cc->name?>&nbsp; <span class="fi fi-<?=$ccode?>"></span></a></div>
                    <?php
                    }
                }
                ?>
                &nbsp;|&nbsp;<div><?php
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

<script>
function resetForm() {
    // Reset the category and tag select boxes to their default state
    document.querySelector('[name="category"]').selectedIndex = 0;
    document.querySelector('[name="tag"]').selectedIndex = 0;

    // Set the 'dateFrom' and 'dateTo' inputs to specific default values
    document.querySelector('[name="dateFrom"]').value = '<?=$min?>';
    document.querySelector('[name="dateTo"]').value = '<?php echo date('Y-m-d'); ?>';
    
    // Add any other fields you wish to reset here
}
</script>
<?php

get_footer();
?>