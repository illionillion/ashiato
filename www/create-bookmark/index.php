<?php
include "../lib/session_check.php";
include "../components/modal/index.php";
include "../components/header/index.php";
session_check();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>あしあと</title>
  <!-- BootStrap -->
  <link rel="shortcut icon" href="/img/ashiato.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/header.css" />
  <link rel="stylesheet" href="/css/create-bookmark.css" />
  <script src="/js/main.js"></script>
  <script src="/js/create-bookmark.js"></script>
</head>

<body>
  <?php
  $header = new Header();
  $header->render();
  ?>

  <main class="container d-flex justify-content-center">
    <form action="/api/create-bookmark/index.php" enctype="multipart/form-data" class="row" method="POST">
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
            </div>
          </div>
          <div class="stay-time">
            <p class="abouts">過ごした時間</p>
            <p class="stay-time-text"></p>
          </div>
          <div class="used-price">
            <p class="abouts">使ったお金</p>
            <p class="used-price-text"></p>
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
          <div class="move-time">
            <p class="abouts">移動時間</p>
            <p class="move-time-text"></p>
          </div>
          <div class="how-move">
            <p class="abouts">移動手段</p>
            <pre class="how-move-text"></pre>
          </div>
        </div>
      </div>
    </div>
    </div>
  </template>
</body>

</html>