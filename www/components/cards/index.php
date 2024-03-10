<?php

class Cards
{
    private $cards;

    public function __construct($bookmark_id)
    {
        try {
            $pdo = connect_db();
            $cardsQuery = $pdo->prepare("SELECT * FROM bookmark_content WHERE  bookmark_id = :bookmark_id");
            $cardsQuery->bindParam(':bookmark_id', $bookmark_id);

            // クエリを実行
            $cardsQuery->execute();
            $this->cards = $cardsQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function render()
    {
        if (isset($this->cards) && !empty($this->cards)) {
            $cards = $this->cards;
            include 'element.php';
        }
    }
}
