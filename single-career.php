<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
<main id="main">
<section class="hero d-flex align-items-center">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <h1><?=get_the_title()?></h1>
                <a class="btn btn-primary mt-4" href="mailto:<?=get_field('contact_email','options')?>?subject=<?=get_the_title()?>">Apply Now</a>
            </div>
        </div>
    </div>
</section>
<section class="breadcrumbs pt-4 container-xl">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
</section>
    <div class="container-xl pb-5">
        <div class="row g-4">
            <div class="col-lg-8 col-xxl-9">
                <?php
                the_content();
                ?>
                <a class="btn btn-primary mt-4" href="mailto:<?=get_field('contact_email','options')?>?subject=<?=get_the_title()?>">Apply Now</a>
            </div>
        </div>
    </div>
</main>
<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "JobPosting",
        "title": "<?=get_the_title(get_the_ID())?>",
        "description": <?=json_encode(get_field('description', get_the_ID()));?> ,
        "hiringOrganization": {
            "@type": "Organization",
            "name": "Unda",
            "legalName": "Unda Consulting Limited",
            "url": "https://www.unda.co.uk/",
            "logo": "https://www.unda.co.uk/wp-content/themes/cb-unda2024/img/unda-logo.png",
            "description": "---",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Southpoint, Old Brighton Road",
                "addressLocality": "Gatwick",
                "addressRegion": "West Sussex",
                "postalCode": "RH11 0PR",
                "addressCountry": "UK"
            },
            "contactPoint": [{
                "@type": "ContactPoint",
                "email": " enquiries@unda.co.uk",
                "contactType": "enquiries"
            }],
            "sameAs": [
                <?php
                $filteredUrls = array_filter(get_field('socials','options'));
                $socials = array_map(function($item) {
                    return '"' . $item . '"';
                }, $filteredUrls);
                $socials = implode(', ', $socials);
                echo $socials;
                ?>
            ]
        },
        "datePosted": "<?=get_the_date('Y-m-d')?>",
        "validThrough": "2030-01-01T00:00",
        "employmentType": "<?=get_field('employmenttype', get_the_ID())?>",
        "baseSalary": {
            "@type": "MonetaryAmount",
            "currency": "GBP",
            "value": {
                "@type": "QuantitativeValue",
                "minValue":
                <?=get_field('minimum_salary')?>
                <?php
                if (get_field('maximum_salary') ?? null) {
                    echo ', "maxValue": ' . get_field('maximum_salary');
                }?>
                ,
                "unitText": "YEAR"
            }
        },
        "jobLocationType": "ONSITE",
        "joblocation": {
            "@type": "Place",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Southpoint, Old Brighton Road",
                "addressLocality": "Gatwick",
                "addressRegion": "West Sussex",
                "postalCode": "RH11 0PR",
                "addressCountry": "UK"
            }
        },
        "applicantLocationRequirements": {
            "@type": "Country",
            "name": "UK"
        }
    }
</script>
<?php
get_footer();
?>