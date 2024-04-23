<section class="people py-5">
    <div class="container-xl">
        <?php
        if (get_field('title') ?? null) {
            ?>
        <h2 class="text-center mb-4"><?=get_field('title')?></h2>
            <?php
        }
        ?>
        <div class="row g-4 justify-content-center">
        <?php
        $taxonomy_id = get_field('team');
        $q = new WP_Query(array(
            'post_type' => 'person',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'team',
                    'field'    => 'term_id',
                    'terms'    => $taxonomy_id, // replace $taxonomy_id with the actual taxonomy ID
                ),
            ),
        ));
        while ($q->have_posts()) {
            $q->the_post();
            ?>
            <div class="col-md-3">
            <div class="people__card" data-bs-toggle="modal" data-bs-target="#p<?=get_the_ID()?>">
                <img src="<?=get_the_post_thumbnail_url(get_the_ID(),'large')?>" alt="<?=get_the_title()?>">
                <h2 class="h3 mb-1"><?=get_the_title()?></h3>
                <div class="people__role"><?=get_field('role',get_the_ID())?></div>
            </div>
        </div>
<div class="modal fade" id="p<?=get_the_ID()?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close text-dark" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <img class="person__image mb-2" src="<?=get_the_post_thumbnail_url( get_the_ID(), 'large' )?>">
                    </div>
                    <div class="col-md-9">
                        <div class="person__title h3"><?=get_the_title()?></div>
                        <div class="person__role font-weight-bold h4"><?=get_field('role',get_the_id())?></div>
                        <div class="person__content"><?=null, false, get_the_content(get_the_ID())?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
            <?php
        }
        ?>
        </div>
    </div>
</section>