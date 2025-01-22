<?php
$class = $block['className'] ?? null;
$template = get_page_template_slug();
if ( $template == 'page-templates/sidebar.php' ) {
    $class .= " cta-inline";
}
?>
<section class="cta py-5 <?=$class?>">
    <div class="container-xl d-flex flex-wrap justify-content-center align-items-center" style="column-gap:1.5rem;row-gap:0.5rem;">
        <div>
            <div class="h2 mb-0">Get a no-obligation, free quote</div>
            <p class="text-white mb-2">One of our experienced Flood Risk Consultants will get back to you within 60 minutes</p>
        </div>
        <a href="/start-a-quote/" class="btn btn-secondary">Get a Quote</a>
    </div>
</section>