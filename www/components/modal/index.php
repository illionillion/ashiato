<?php

class Modal {
    private $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function render() {
        if (isset($this->id) && !empty($this->id)) {
            $id = $this->id;
            include 'element.php';
        }
    }
}