<?php
$colour = get_field('colour') ?: 'white';
$class = $block['className'] ?? 'py-5';

$title = $colour != 'blue-900' ? 'text-blue-900' : '';
?>
<section class="four_cards bg-<?=$colour?> <?=$class?>">
    <div class="container-xl">
        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <h3 class="<?=$title?>"><?=get_field('title_1')?></h3>
                <?=get_field('content_1')?>
            </div>
            <div class="col-md-6 col-lg-3">
                <h3 class="<?=$title?>"><?=get_field('title_2')?></h3>
                <?=get_field('content_2')?>
            </div>
            <div class="col-md-6 col-lg-3">
                <h3 class="<?=$title?>"><?=get_field('title_3')?></h3>
                <?=get_field('content_3')?>
            </div>
            <div class="col-md-6 col-lg-3">
                <h3 class="<?=$title?>"><?=get_field('title_4')?></h3>
                <?=get_field('content_4')?>
            </div>
        </div>
    </div>
</section>