<section class="latest_cs bg-grey-400 py-5 my-5">
    <div class="container-xl">
        <h2 class="mb-4">Latest Projects</h2>
        <div class="row g-4">
        <?php
        $q = new WP_Query(array(
            'post_type' => 'project',
            'posts_per_page' => 3
        ));
        while ($q->have_posts()) {
            $q->the_post();
            $images = get_field('images', get_the_ID()) ?? null;
            ?>
        <div class="col-md-4">
            <a href="<?=get_the_permalink()?>" class="latest_cs__card">
                <img src="<?=wp_get_attachment_image_url($images[0],'large')?>" alt="">
                <?=get_the_title()?>
            </a>
        </div>
            <?php
        }
        ?>
        <div class="text-center"><a href="/projects/" class="btn btn-primary">View All</a></div>
    </div>
</section>