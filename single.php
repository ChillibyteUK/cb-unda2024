<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(), 'full') ?? null;
// <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />
?>
<main id="main" class="blog">
    <?php
    $content = get_the_content();
$blocks = parse_blocks($content);
$sidebar = array();
$after;
?>
    <div class="container-xl py-5">
        <section class="breadcrumbs">
            <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    $the_date = get_the_date('jS F, Y');
    $countries = get_the_tags();
    $cats = get_the_category();

?>
        </section>
        <div class="row g-4 pb-4">
            <div class="col-lg-9 blog__content">
                <h1 class="blog__title text-green-400 mb-3">
                    <?=get_the_title()?></h1>
                    <div class="news__meta d-flex align-items-center fs-300 mb-2">
                <div>Posted on <?=$the_date?></div>
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
            <?php
                if ($img) {
                    ?>
                <img src="<?=$img?>" alt="" class="blog__image">
                    <?php
                }
    $count = estimate_reading_time_in_minutes(get_the_content(), 200, true, true);
echo $count;

foreach ($blocks as $block) {
    if ($block['blockName'] == 'core/heading') {
        if (!array_key_exists('level', $block['attrs'])) {
            $heading = strip_tags($block['innerHTML']);
            $id = acf_slugify($heading);
            echo '<a id="' . $id . '" class="anchor"></a>';
            $sidebar[$heading] = $id;
        }
    }
    echo render_block($block);
}
?>
            </div>
            <div class="col-lg-3 related">
                <h3>Related News</h3>
                <?php
$cats = get_the_category();
$ids = wp_list_pluck($cats, 'term_id');
$r = new WP_Query(array(
    'category__in' => $ids,
    'posts_per_page' => 3,
    'post__not_in' => array(get_the_ID())
));
while ($r->have_posts()) {
    $r->the_post();
    ?>
                <a class="related__card d-block mb-3"
                    href="<?=get_the_permalink()?>">
                    <div class="related__image_container mb-2">
                        <?=get_the_post_thumbnail(get_the_ID(),'medium',array('class' => 'related__image'))?>
                    </div>
                    <div class="related__date"><?=get_the_date('jS F, Y')?></div>
                    <h3 class="related__title">
                        <?=get_the_title()?></h3>
                </a>
                <hr>
                <?php
}
?>
                <div class="text-center">
                    <a href="/contact-us/" class="btn btn-primary aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">Get in Touch</a>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('page-templates/blocks/cb_cta'); ?>
</main>
<?php
get_footer();
