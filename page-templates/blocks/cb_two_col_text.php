<?php
$colour = get_field('colour') ?: 'white';
$class = $block['className'] ?? 'py-5';

$title = $colour == 'white' ? 'text-blue-900' : '';
?>
<div class="two_col_text bg-<?=$colour?> <?=$class?>">
    <div class="container-xl">
        <?php
        if (get_field('title') ?? null) {
            ?>
            <h2 class="mb-4 <?=$title?>"><?=get_field('title')?></h2>
            <?php
        }
        ?>
        <div class="row g-4">
            <div class="col-md-6">
                <?=apply_filters('the_content',get_field('left'))?>
            </div>
            <div class="col-md-6">
                <?=get_field('right')?>
            </div>
        </div>
    </div>
</div>