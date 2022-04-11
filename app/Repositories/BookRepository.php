<?php

namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Repository;

class BookRepository extends Repository
{
    protected $book;

    public function __construct(Book $book)
    {
        parent::__construct($book);

        $this->book = $book;
    }
}
