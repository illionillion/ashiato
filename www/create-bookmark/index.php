<?php
include "../lib/session_check.php";
include "../components/modal/index.php";
session_check();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>あしあと</title>
  <!-- BootStrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/createokamoto.css" />
  <script src="/js/main.js"></script>
  <script src="/js/create-bookmark.js"></script>
</head>

<body>
  <main class="container d-flex justify-content-center">
    <form action="/api/create-bookmark/index.php" class="row" method="POST">
      <h1 class="create text-center">しおり作成</h1>
      <div class="w-100 form-label">
        <label for="bookmark-name" class="w-100 mb-1">しおり名</label>
        <input type="text" id="bookmark-name" name="bookmark-name" class="form-control w-100" placeholder="しおり名を入力" />
      </div>
      <div class="w-100 form-label">
        <label for="bookmark-description" class="w-100 mb-1">概要</label>
        <textarea type="text" id="bookmark-description" name="bookmark-description" class="form-control w-100"
          placeholder="概要を入力"></textarea>
      </div>
      <div class="w-100 form-label">
        <label for="">あしあと</label>
        <div id="place" class="d-none"></div>
        <div class="accordion" id="" class="">
        </div>
        <div class="accordion-message text-danger">あしあとが登録されていません</div>
        <div class="w-100 text-center py-3">
          <input type="button" class="btn btn-outline-primary" value="場所追加" data-bs-toggle="modal"
            data-bs-target="#addPlaceModal" />
          <input type="submit" class="btn btn-outline-primary" value="作成" />
        </div>
    </form>
    <!-- Modal -->
    <?php
    $modal = new Modal("addPlaceModal");
    $modal->render();
    ?>
  </main>
  <template id="accordion-item-template">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#"
          aria-expanded="false" aria-controls=""></button>
      </h2>
      <div id="" class="accordion-collapse collapse">
        <div class="accordion-body">
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/img/sample1.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="/img/sample1.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="/img/sample1.jpg" class="d-block w-100" alt="..." />
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div class="address">
            <p class="abouts">住所</p>
            <p class="address-text"></p>
          </div>
          <div class="comment">
            <p class="abouts">コメント</p>
            <pre class="comment-text"></pre>
          </div>
          <div class="price">
            <p class="abouts">交通費</p>
            <p class="price-text"></p>
          </div>
        </div>
      </div>
    </div>
  </template>
</body>

</html>