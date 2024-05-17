<?php
/*
 * Template Name: CTA Sidebar Page
 * 
 */

 // Exit if accessed directly.
 defined('ABSPATH') || exit;
 get_header();
 ?>
 <main id="main">
    <?php
    the_post();
    $content = get_the_content();

    // Parse the blocks.
    $blocks = parse_blocks( $content );

    // Separate the hero block and the other blocks.
    $hero_block = null;
    $other_blocks = array();

    foreach ( $blocks as $block ) {

        if ( $block['blockName'] === 'acf/cb-hero' ) {
            $hero_block = $block;
        } else {
            $other_blocks[] = $block;
        }
    }

    if ( $hero_block ) {
        echo render_block( $hero_block );
    }

    ?>
    <div class="container-xl">
        <div class="row g-5">
            <div class="col-md-8">
                <?php
                foreach ( $other_blocks as $block ) {
                    echo render_block( $block );
                }
                ?>
            </div>
            <div class="col-md-4">
                <?php
                if (is_active_sidebar('cta-sidebar')) {
                    dynamic_sidebar( 'cta-sidebar' );
                }
                ?>
            </div>
        </div>
    </div>
 </main>
 
 <?php
 get_footer();