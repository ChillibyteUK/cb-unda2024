<?php
function acf_blocks()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'				=> 'cb_home_hero',
            'title'				=> __('CB Home Hero'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_home_hero.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_hero',
            'title'				=> __('CB Hero'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_hero.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_two_col_text',
            'title'				=> __('CB Two Col Text'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_two_col_text.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_services_list',
            'title'				=> __('CB Services List'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_services_list.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_text_image',
            'title'				=> __('CB Text Image'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_text_image.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_four_cards',
            'title'				=> __('CB Four Cards'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_four_cards.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_latest_news',
            'title'				=> __('CB Latest News'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_latest_news.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_testimonials',
            'title'				=> __('CB Testimonials'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_testimonials.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_all_projects',
            'title'				=> __('CB All Projects'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_all_projects.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_contact',
            'title'				=> __('CB Contact'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_contact.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_people',
            'title'				=> __('CB People'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_people.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_latest_case_studies',
            'title'				=> __('CB Latest Case Studies'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_latest_case_studies.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_usps',
            'title'				=> __('CB USPs'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_usps.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_cta',
            'title'				=> __('CB CTA'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_cta.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_locations',
            'title'				=> __('CB Locations'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_locations.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_faq',
            'title'				=> __('CB FAQ'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_faq.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_stat_spinner',
            'title'				=> __('CB Stat Spinner'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_stat_spinner.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
    }
}
add_action('acf/init', 'acf_blocks');

// Gutenburg core modifications
add_filter('register_block_type_args', 'core_image_block_type_args', 10, 3);
function core_image_block_type_args($args, $name)
{
    if ($name == 'core/paragraph') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/heading') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/list') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/table') {
        $args['render_callback'] = 'modify_core_add_container';
    }

    return $args;
}

function modify_core_add_container($attributes, $content)
{
    ob_start();
    // $class = $block['className'];
    ?>
<div class="container-xl">
    <?=$content?>
</div>
<?php
    $content = ob_get_clean();
    return $content;
}
?>