<div class="container-xl pb-5">
    <div class="row gy-5 pb-5">
        <div class="col-md-6">
            <h2>Contact Unda</h2>
            <ul class="fa-ul">
                <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-phone"></i></span> <?=contact_phone()?></li>
                <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-envelope"></i></span> <?=contact_email()?></li>
                <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span> <?=contact_address()?></li>
            </ul>
            <h3>Connect</h3>
            <?=social_icons('fa-2x')?>
        </div>
        <div class="col-md-6">
            <h2>Get in Touch</h2>
            <?=do_shortcode('[gravityform id="2" title="false"]')?>
        </div>
    </div>
</div>
<iframe src="<?=get_field('maps_url','options')?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>