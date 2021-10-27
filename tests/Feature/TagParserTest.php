<?php

namespace Tests\Feature;

use App\Models\TagParser;
use Tests\TestCase;

class TagParserTest extends TestCase
{
    public function test_it_parses_a_single_tag()
	{
        //Given or /Arrange
		$parser = new TagParser();

        //When or Act
		$result = $parser->parse("personal");
		$expected = ["personal"];

        //Then or Assert
		$this->assertSame($expected, $result);
	}

    public function test_it_parses_a_comma_separated_list_of_tags()
	{
		$parser = new TagParser();

		$result = $parser->parse("personal, money, family");
		$expected = ["personal", "money", "family"];
		$this->assertSame($expected, $result);
	}

	public function test_it_parses_a_pipe_separated_list_of_tags()
	{
		$parser = new TagParser();

		$result = $parser->parse("personal | money | family");
		$expected = ["personal", "money", "family"];

		$this->assertSame($expected, $result);
	}

	public function test_spaces_are_optional()
	{
		$parser = new TagParser();

		$result = $parser->parse("personal,money,family");
		$expected = ["personal", "money", "family"];
		$this->assertSame($expected, $result);

		$result = $parser->parse("personal|money|family");
		$expected = ["personal", "money", "family"];
		$this->assertSame($expected, $result);
	}
}
