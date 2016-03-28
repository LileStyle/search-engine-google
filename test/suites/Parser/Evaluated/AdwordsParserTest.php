<?php
/**
 * @license see LICENSE
 */

namespace Serps\Test\TDD\SearchEngine\Google\Parser\Evaluated;

use Serps\SearchEngine\Google\Parser\Evaluated\AdwordsParser;
use Serps\SearchEngine\Google\Parser\Evaluated\NaturalParser;
use Serps\SearchEngine\Google\Page\GoogleDom;
use Serps\SearchEngine\Google\GoogleUrlArchive;
use Serps\Core\Serp\IndexedResultSet;
use Serps\SearchEngine\Google\NaturalResultType;
use Serps\Core\Serp\CompositeResultSet;

/**
 * Testing parser is hard, because it relies on google pages
 *
 * The tests here are parsing a saved html version of a google page.
 * They do not prevent google from changing its dom. If it
 * happens the saved html and the following tests must be updated.
 *
 * When the tests are updated, make sure that the new one include the same kind of results.
 * For instance if the previous test included a ``inDepthArticle`` the new test should do so.
 *
 *
 * @covers Serps\SearchEngine\Google\Parser\AbstractParser
 * @covers Serps\SearchEngine\Google\Parser\Evaluated\NaturalParser
 * @covers Serps\SearchEngine\Google\Parser\Evaluated\Rule\Natural\ClassicalResult
 * @covers Serps\SearchEngine\Google\Parser\Evaluated\Rule\Natural\SearchResultGroup
 * @covers Serps\SearchEngine\Google\Parser\Evaluated\Rule\Natural\TweetsCarousel
 * @covers Serps\SearchEngine\Google\Parser\Evaluated\Rule\Natural\InTheNews
 * @covers Serps\SearchEngine\Google\Parser\Evaluated\Rule\Natural\Divider
 * @covers Serps\SearchEngine\Google\Parser\Evaluated\Rule\Natural\ImageGroup
 * @covers Serps\SearchEngine\Google\Parser\Evaluated\Rule\Natural\ClassicalWithLargeVideo
 */
class AdwordsParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParserTopAndBottom()
    {

        $gUrl = GoogleUrlArchive::fromString('https://www.google.com.au/search?q=simpsons+poster&hl=en_US');
        $dom = new GoogleDom(file_get_contents('test/resources/pages-evaluated/adwords/simpsons+poster.html'), $gUrl, $gUrl);

        $parser = new  AdwordsParser();
        $results = $parser->parse($dom);

        $this->assertInstanceOf(CompositeResultSet::class, $results);



    }
}