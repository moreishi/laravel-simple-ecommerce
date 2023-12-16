<?php

namespace App\DTO;

class ProductDTO {

    public $name;
    public $description;
    public $price;
    public $author;
    public $image;

    public function __construct(
        $name, 
        $description, 
        $price, 
        $author, 
        $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->author = $author;
        $this->image = $image;
    }

}