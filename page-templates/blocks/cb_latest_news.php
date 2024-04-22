<section class="latest_news py-5">
    <div class="container-xl">
        <h2 class="text-green-400 mb-4">Latest news</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <?php
$q = new WP_Query(array(
    'post_type' => 'post', // or 'any' if you want to include custom post types
    'post_status' => 'publish',
    'posts_per_page' => 4,
));
while ($q->have_posts()) {
    $q->the_post();
    ?>
    <a href="<?=get_the_permalink()?>">
        <div class="fs-300"><?=get_the_date('jS F, Y')?></div>
        <h3 class="fs-500 text-green-400"><?=get_the_title()?></h4>
        <div class="d-flex justify-content-between">
            <span class="fw-600">Read more</span>
            <span><img src="<?=get_stylesheet_directory_uri()?>/img/arrow-blue.png" width=49 height=9 alt=""></span>
        </div>
    </a>
    <?php
}
                ?>
            </div>
       </div>
    </div>
</section>