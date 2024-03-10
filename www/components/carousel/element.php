<?php if (isset($images) && !empty($images) && isset($bookmark_id) && !empty($bookmark_id)) : ?>
    <div id="carouselExample<?= $bookmark_id ?>" class="carousel slide w-100 h-100">
        <div class="carousel-inner h-100">
            <?php foreach ($images as $i => $image) : ?>
                <div class="carousel-item h-100 <?= $i == 0 ? "active" : "" ?>">
                    <img class="d-block img-thumbnail w-100 h-100 object-fit-cover" src="<?= $image['bookmark_content_image_path'] ?>" />
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?= $bookmark_id ?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-secondary rounded" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?= $bookmark_id ?>" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-secondary rounded" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<?php endif; ?>