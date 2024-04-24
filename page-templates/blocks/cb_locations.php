<section class="locations">
    <div class="container-xl">
        <?php
        $parent_id = get_the_ID();

        $args = array(
            'post_parent' => $parent_id,
            'post_type'   => 'page',
            'post_status' => 'publish',
            'orderby'     => 'menu_order',
            'order'       => 'ASC',
            'posts_per_page' => -1 // Retrieve all subpages
        );
    
        $subpages_query = new WP_Query($args);
    
        $rows = array();

        if ($subpages_query->have_posts()) {
            while ($subpages_query->have_posts()) {
                $subpages_query->the_post();
                $rows[get_the_title()] = '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
            }
            wp_reset_postdata();
        }

        if (get_field('additional_locations') ?? null) {
            $content = get_field('additional_locations');
            $content = explode('<br />', $content);
            foreach ($content as $c) {
                $c = trim($c);
                $rows[$c] = $c;
            }

            // $extras = split_lines_to_array( get_field('additional_locations') );
            // var_dump(get_field('additional_locations'));
        }
        
        ksort($rows);
        // var_dump($mergedArray);
        echo '<ul class="cols-lg-3">';
        foreach ($rows as $location) {
            echo '<li>' . $location . '</li>';
        }
        echo '</ul>';

        ?>
    </div>
</section>