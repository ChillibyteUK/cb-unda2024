<?php
$class = $block['className'] ?? 'my-5';
?>
<div class="services_list bg-grey-400 py-5 <?=$class?>">
    <div class="container-xl">
        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <a class="services_list__item mb-3" href="/flood-risk-assessments/planning/">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/icons/reports-for-planning.svg" alt="" class="services_list__icon">
                    <h2 class="h3">Reports for Planning</h2>
                    <div>A Flood Risk Assessment (FRA) will help you understand the risk of flooding to your site.</div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a class="services_list__item mb-3" href="/flood-risk-assessments/">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/icons/reports-for-insurance.svg" alt="" class="services_list__icon">
                    <h2 class="h3">Reports for Insurance</h2>
                    <div>You may require a site specific FRA for insurance purposes.</div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a class="services_list__item mb-3" href="/drainage-assessments/">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/icons/drainage-strategy.svg" alt="" class="services_list__icon">
                    <h2 class="h3">Drainage Strategy</h2>
                    <div>A Drainage Strategy determines how surface water runoff will be managed.</div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a class="services_list__item mb-3" href="/contact-us/">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/icons/contact-us.svg" alt="" class="services_list__icon">
                    <h2 class="h3">Contact Us Today</h2>
                    <div>If you want to discuss any aspect of flood risk, get in touch with our friendly team today</div>
                </a>
            </div>
        </div>
    </div>
</div>