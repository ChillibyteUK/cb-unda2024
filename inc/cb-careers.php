<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}



function jobs_func($atts) {
    ob_start();
    $q = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'careers',
        'post_status' => 'publish'
    ));

    if ($q->have_posts()) {
        ?>
<section class="joblistings">
    <div class="container-xl py-4">
        <?php
        while ($q->have_posts()) {
            $q->the_post();
            ?>
	<a class="joblisting mb-4" href="<?php the_permalink(); ?>">
            <div class="job">
                <div class="d-flex justify-content-between flex-wrap g-4 align-items-baseline">
                    <div class="h3"><?php the_title(); ?></div>
                    <div class="fs-300 text-orange-400">
                        <strong>Posted:</strong> <?=get_the_date()?>
                    </div>
                </div>
                <div class="text-orange-400"><strong>Salary:</strong> <?php
                    echo '£' . number_format(get_field('minimum_salary'));
                    if (get_field('maximum_salary') ?? null) {
                        echo ' - £' . number_format(get_field('maximum_salary'));
                    }
                    ?>
                </div>
            </div>
            <div class="text-end text-orange-400 fw-700">Read more</div>
    </a>
<?php
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    }
    else {
        ?>
        <div class="pt-3 py-4 fw-700">We do not have any positions available at this time. Check back later to see new postings.</div>
        <?php
    }
    
    ?>
    </div>
</div>
<?php
    return ob_get_clean();
}
add_shortcode('jobs', 'jobs_func');
