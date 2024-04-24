<div class="container-xl pb-5">
    <div class="row pb-5">
        <div class="col-md-4">
            <h2>Contact Unda</h2>
            <ul class="fa-ul">
                <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-phone"></i></span> <?=contact_phone()?></li>
                <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-envelope"></i></span> <?=contact_email()?></li>
                <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span> <?=contact_address()?></li>
            </ul>
            <h3>Connect</h3>
            <?=social_icons()?>
        </div>
        <div class="col-md-8">
            <iframe src="<?=get_field('maps_url','options')?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <h2>Start a Quote</h2>
    <?php
    $form = get_field('contact_form_id','options') ?? null;
    echo do_shortcode('[gravityform id="' . $form . '" title="false"]');
    ?>
</div>
