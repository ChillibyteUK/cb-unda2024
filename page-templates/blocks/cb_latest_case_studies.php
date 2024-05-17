<?php
$class = $block['className'] ?? 'my-5';
?>
<section class="latest_cs bg-grey-400 py-5 <?=$class?>">
    <div class="container-xl">
        <h2 class="mb-4">Latest Projects</h2>
        <div class="row g-4">
        <?php
        $q = new WP_Query(array(
            'post_type' => 'project',
            'posts_per_page' => 3
        ));
        $d = 0;
        while ($q->have_posts()) {
            $q->the_post();
            $images = get_field('images', get_the_ID()) ?? null;
            ?>
        <div class="col-md-4" data-aos="fade" data-aos-delay="<?=$d?>">
            <a href="<?=get_the_permalink()?>" class="latest_cs__card">
                <img src="<?=wp_get_attachment_image_url($images[0],'large')?>" alt="">
                <div class="h3"><?=get_the_title()?></div>
                <div class="text-end">
                    <span class="fw-700 text-orange-400">Read more</span>
                </div>
            </a>
        </div>
            <?php
            $d+=100;
        }
        ?>
        <div class="text-center"><a href="/projects/" class="btn btn-primary">View All</a></div>
    </div>
</section>