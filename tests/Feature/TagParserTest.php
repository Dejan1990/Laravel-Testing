<?php

namespace Tests\Feature;

use App\Models\TagParser;
use Tests\TestCase;

class TagParserTest extends TestCase
{
    /**
     * @dataProvider tagsProvider
     */
    public function test_it_parses_tags($input, $expected)
    {
        $parser = new TagParser();

        $result = $parser->parse($input);

        $this->assertSame($expected, $result);
    }

    public function tagsProvider()
    {
        return [
            ["personal", ["personal"]],
            ["personal, money, family", ["personal", "money", "family"]],
            ["personal,money,family", ["personal", "money", "family"]],
            ["personal | money | family", ["personal", "money", "family"]],
            ["personal|money|family", ["personal", "money", "family"]],
            ["personal!money!family", ["personal", "money", "family"]],
        ];
    }
}
