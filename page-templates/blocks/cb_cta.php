<?php
$class = $block['className'] ?? null;
$template = get_page_template_slug();
if ( $template == 'page-templates/sidebar.php' ) {
    $class .= " cta-inline";
}
?>
<section class="cta py-5 <?=$class?>">
    <div class="container-xl d-flex flex-wrap justify-content-center align-items-center gap-4">
        <div>
            <div class="h2 mb-0">Get a no-obligation, free quote</div>
            <p class="text-white">One of our experienced Flood Risk Consultants will get back to you within 60 minutes</p>
        </div>
        <a href="/contact-us/" class="btn btn-secondary">Get in Touch</a>
    </div>
</section>