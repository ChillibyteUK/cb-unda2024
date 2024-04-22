<section class="testimonials py-5 bg-grey-200">
    <div class="container-xl">
        <h2 class="text-blue-900 mb-4">Testimonials</h2>
        <div class="row">
            <div class="col-sm-2 testimonials__quote"></div>
            <div class="col-sm-10 testimonials__container">
                <div class="testimonials__inner">
                <?php
                    global $post;
                    $args = array(
                        'post_type' => 'testimonial',
                        'numberposts' => 4,
                    );
                    $posts = get_posts($args);
                    foreach ($posts as $post) {
                        setup_postdata($post);
                        ?>
                    <div class="tetimonial">
                        <div class="testimonial__content">
                            <?=get_the_content()?>
                        </div>
                        <div class="testimonial__attr">
                            <div class="testimonial__name"><?=get_the_title()?></div>
                            <div class="testimonial__source"><?=get_field('source',get_the_ID())?></div>
                        </div>
                    </div>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.testimonials__inner').slick({
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 4000,
        });
    });
</script>
<?php
}, 9999);