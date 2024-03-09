<?php

class Carousel
{
    private $images;

    public function __construct($bookmark_content_id)
    {
        try {
            // 各日記に関連する画像を取得するループ
            $pdo = connect_db();
            $imageQuery = $pdo->prepare("SELECT bookmark_content_image_id
            , bookmark_content_image_path FROM bookmark_content_image WHERE bookmark_content_id = :bookmark_content_id");
            $imageQuery->bindParam(':bookmark_content_id', $bookmark_content_id);

            // クエリを実行
            $imageQuery->execute();

            // 画像の結果セットを取得
            $this->images = $imageQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function render()
    {
        if (isset($this->images) && !empty($this->images)) {
            $images = $this->images;
            include 'element.php';
        }
    }
}
