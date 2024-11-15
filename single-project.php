<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(), 'full') ?? null;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />
<main id="main" class="blog">
<section class="hero d-flex align-items-center" style="background-image:url(<?=$img?>)">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <h1><?=get_the_title()?></h1>
            </div>
        </div>
    </div>
</section>
<div class="container-xl py-5">
    <section class="breadcrumbs">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        }
        $the_date = get_the_date('jS F, Y');
    ?>
    </section>
    <div class="row g-4 pb-4">
        <div class="col-lg-9 blog__content">
            <?php
        echo get_the_content();
            ?>
        </div>
        <div class="col-lg-3 related">
            <?php
            foreach (get_field('images') as $i) {
                ?>
                <div class="pb-3">
                    <img src="<?=wp_get_attachment_image_url($i, 'large')?>" class="mb-1">
                    <?=wp_get_attachment_caption($i)?>
                </div>
                <?php
            }
            ?>
            <div class="text-center py-4">
                <a href="/start-a-quote/" class="btn btn-primary">Start a Quote</a>
            </div>
        </div>
    </div>
</div>
</main>
<?php
get_footer();
