<section class="latest_news py-5">
    <div class="container-xl">
        <h2 class="text-green-400 mb-4">Latest news</h2>
        <div class="row g-4 mb-4">
                <?php
$q = new WP_Query(array(
    'post_type' => 'post', // or 'any' if you want to include custom post types
    'post_status' => 'publish',
    'posts_per_page' => 3,
));
$d=0;
while ($q->have_posts()) {
    $q->the_post();
    ?>
    <div class="col-md-4">
        <a href="<?=get_the_permalink()?>" class="latest_news__card" data-aos="fade" data-aos-delay="<?=$d?>">
            <img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'large')?>" alt="">
            <div>
                <div class="fs-300 text-orange-400"><?=get_the_date('jS F, Y')?></div>
                <h3 class="fs-500 text-green-400"><?=get_the_title()?></h3>
            </div>
            <div class="text-end">
                <span class="fw-700 text-orange-400">Read more</span>
            </div>
        </a>
    </div>
    <?php
    $d+=100;
}
        ?>
       </div>
       <div class="text-center"><a href="/news/" class="btn btn-primary">View All</a></div>
    </div>
</section>