<section class="stat_spinner bg-grey-400">
    <div class="container-xl py-5">
        <div class="stat_spinner__grid">
        <?php
        while (have_rows('spinner_stats')) {
            the_row();
            ?>
            <div class="stat_spinner__stat">
                <div class="stat_spinner__title"><?=get_sub_field('title')?></div>
                <div class="stat_spinner__value">
                    <?=get_sub_field('prefix')?>
                    <?=do_shortcode('[countup start="0" end="' . get_sub_field('stat') . '" duration="4" scroll="true"]')?>
                    <?=get_sub_field('suffix')?>
                </div>
                <div class="stat_spinner__desc"><?=get_sub_field('description')?></div>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>