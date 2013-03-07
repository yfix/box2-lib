<?php

namespace Herrera\Box\Tests\Compactor;

use Herrera\Box\Compactor\Composer;
use Herrera\PHPUnit\TestCase;

class ComposerTest extends TestCase
{
    /**
     * @var Composer
     */
    private $composer;

    public function testCompact()
    {
        $original = <<<ORIGINAL
<?php

/**
 * A comment.
 */
class AClass
{
    /**
     * A comment.
     */
    public function aMethod()
    {
        \$test = true;# a comment
    }
}
ORIGINAL;

        $expected = <<<EXPECTED
<?php




class AClass
{



public function aMethod()
{
\$test = true;
 }
}
EXPECTED;

        $this->assertEquals($expected, $this->composer->compact($original));
    }

    public function testSupports()
    {
        $this->assertTrue($this->composer->supports('test.php'));
    }

    protected function setUp()
    {
        $this->composer = new Composer();
    }
}