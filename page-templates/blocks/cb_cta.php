<?php
$class = $block['className'] ?? null;
$template = get_page_template_slug();
if ( $template == 'page-templates/sidebar.php' ) {
    $class .= " cta-inline";
}
?>
<section class="cta py-5 <?=$class?>">
    <div class="container-xl d-flex flex-wrap justify-content-center align-items-center gap-4">
        <div class="h2 mb-0">Get a no-obligation, free quote</div>
        <a href="/start-a-quote/" class="btn btn-secondary">Start a Quote</a>
    </div>
</section>