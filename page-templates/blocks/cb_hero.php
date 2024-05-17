<section class="hero d-flex align-items-center">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <h1 data-aos="fade-right"><?=get_field('title')?></h1>
                <?php
                $d = 0;
                if (get_field('content') ?? null) {
                    $d+=100;
                    ?>
                <div class="fs-500 fw-600" data-aos="fade-right" data-aos-delay="<?=$d?>"><?=get_field('content')?></div>
                    <?php
                }
                if (get_field('cta') ?? null) {
                    $cta = get_field('cta');
                    $d+=100;
                    ?>
                <a class="btn btn-primary mt-4" href="<?=$cta['url']?>" target="<?=$cta['target']?>" data-aos="fade-right" data-aos-delay="<?=$d?>"><?=$cta['title']?></a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    $img = wp_get_attachment_image(get_field('background'),'full',false,array('class' => 'hero__bg', 'data-aos' => 'fade-left')) ?? null;
    if ($img) {
        echo $img;
    }
    ?>
</section>
<section class="breadcrumbs pt-4 container-xl">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
</section>