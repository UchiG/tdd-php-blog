<?php

use PHPUnit\Framework\TestCase;
use App\Article;

class ArticleTest extends TestCase
{

    public function setUp():void {
        $this->article = new Article;
    }
    public function testTitleIsEmptyByDefault()
    {

        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(), '');
    }

    public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = 'An    example   article';

        $this->assertSame($this->article->getSlug(), 'An_example_article');
    }

    public function testSlugDoesNotStartOrEndWithAnUnderscore()
    {
        $this->article->title = ' An example article ';

        $this->assertSame($this->article->getSlug(), 'An_example_article');
    }

    public function testSlugDoesNotHaveAnyNonWordCharacters()
    {
        $this->article->title = 'Read! This! Now!';

        $this->assertSame($this->article->getSlug(), 'Read_This_Now');
    }
}