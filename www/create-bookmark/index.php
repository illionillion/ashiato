<?php
include "../lib/session_check.php";
session_check();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>あしあと</title>
  <!-- BootStrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/style.css" />
  <script src="/js/main.js"></script>
  <script src="/js/create-bookmark.js"></script>
</head>

<body>
  <main class="container d-flex justify-content-center">
    <form action="/api/create-bookmark/index.php" class="row w-50" method="POST">
      <h1 class="text-center">しおり作成</h1>
      <div class="w-100 form-label">
        <label for="bookmark-name" class="w-100 mb-1">しおり名</label>
        <input type="text" id="bookmark-name" name="bookmark-name" class="form-control w-100" placeholder="しおり名を入力" />
      </div>
      <div class="w-100 form-label">
        <label for="bookmark-description" class="w-100 mb-1">概要</label>
        <textarea type="text" id="bookmark-description" name="bookmark-description" class="form-control w-100"></textarea>
      </div>
      <div class="w-100 form-label">
        <label for="">あしあと</label>
        <div id="place" class="d-none"></div>
        <div class="accordion" id="accordionPanelsStayOpenExample" class="d-none">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                天王寺
              </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
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
                <div>住所</div>
                <div>楽しかった</div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                難波
              </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
              <div class="accordion-body">居酒屋</div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-100 text-center">
        <input type="button" class="btn btn-outline-primary" value="場所追加" data-bs-toggle="modal" data-bs-target="#addPlaceModal" />
        <input type="submit" class="btn btn-outline-primary" value="作成" />
      </div>
    </form>
    <!-- Modal -->
    <div class="modal fade modal-dialog-scrollable" id="addPlaceModal" tabindex="-1" aria-labelledby="addPlaceModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="addPlaceModalLabel">場所追加</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body row">
            <div class="w-100 form-label">
              <label for="place-name" class="w-100 mb-1">場所名</label>
              <input type="text" id="place-name" name="place-name" class="form-control w-100" placeholder="場所名を入力" />
            </div>
            <div class="w-100 form-label">
              <label for="place-address" class="w-100 mb-1">住所</label>
              <input type="text" id="place-address" name="place-address" class="form-control w-100" placeholder="住所を入力" />
            </div>
            <div class="w-100 form-label">
              <label for="place-comment" class="w-100 mb-1">ひとこと</label>
              <textarea type="text" id="place-comment" name="place-comment" class="form-control w-100"></textarea>
            </div>
            <div class="w-100 form-label">
              <label for="expenses" class="w-100 mb-1">交通費</label>
              <input type="number" id="expenses" name="expenses" class="form-control w-100" placeholder="**円" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">戻る</button>
            <button type="button" class="btn btn-primary" id="placeAddBtn">追加</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <template id="accordion-item-template">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne"></button>
      </h2>
      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
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
          <div>最高</div>
          <div>900円</div>
        </div>
      </div>
    </div>
  </template>
</body>

</html>