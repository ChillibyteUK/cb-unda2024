<section class="all_projects bg-grey-400 py-5">
    <div class="container-xl">
        <div class="all_projects__grid">
<?php
$q = new WP_Query(array(
    'post_type' => 'project',
    'posts_per_page' => -1
));

while ($q->have_posts()) {
    $q->the_post();
    ?>
    <a href="<?=get_the_permalink()?>" class="project_card">
    <?php
    $images = get_field('images', get_the_ID()) ?? null;
    if ($images) {
        ?>
        <img src="<?=wp_get_attachment_image_url($images[0],'large')?>" alt="">
        <?php
    }
        ?>
        <div class="content">
            <h3><?=get_the_title()?></h3>
            <div><?=wp_trim_words(get_the_content(),25)?> <div class="readmore">Read More <i class="fa-solid fa-angle-right"></i></div></div>
        </div>
    </a>
    <?php
}
?>
        </div>
    </div>
</section>