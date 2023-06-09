<?php

use PHPUnit\Framework\TestCase;
use App\Article;

class ArticleTest extends TestCase
{
    public function testTitleIsEmptyByDefault()
    {
        $article = new Article;

        $this->assertEmpty($article->title);
    }
}