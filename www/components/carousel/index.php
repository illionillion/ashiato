<?php

class Carousel
{
    private $bookmark_id;
    private $images;

    public function __construct($bookmark_id)
    {
        try {
            // 各日記に関連する画像を取得するループ
            $pdo = connect_db();
            $imageQuery = $pdo->prepare("SELECT * FROM bookmark_content WHERE  bookmark_id = :bookmark_id");
            $imageQuery->bindParam(':bookmark_id', $bookmark_id);

            // クエリを実行
            $imageQuery->execute();
            // 画像の結果セットを取得
            $this->bookmark_id = $bookmark_id;
            $this->images = $imageQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function render()
    {
        if (isset($this->images) && !empty($this->images)) {
            $bookmark_id = $this->bookmark_id;
            $images = $this->images;
            include 'element.php';
        }
    }
}
