<?php

namespace ErsinDemirtas\Reviewston\Tests;

use ErsinDemirtas\Reviewston\Reviewston;

/**
 * Class ReviewstonTest
 *
 * @package ErsinDemirtas\Reviewston\Tests
 */
class ReviewstonTest extends TestCase
{

    public function testGetFactory()
    {
        Reviewston::setFactory(null);

        $factory = Reviewston::getFactory();

        $this->assertInstanceOf('ErsinDemirtas\Reviewston\Factory\ProviderFactory', $factory);
    }

    public function testSetFactory()
    {
        $factory = \Mockery::mock('ErsinDemirtas\Reviewston\Factory\ProviderFactory');

        Reviewston::setFactory($factory);

        $this->assertSame($factory, Reviewston::getFactory());
    }

    public function testCallStatic()
    {
        $factory = \Mockery::mock('ErsinDemirtas\Reviewston\Factory\ProviderFactory');
        $factory->shouldReceive('fooMethod')->with('argumental')->once()->andReturn('foo-bar');

        Reviewston::setFactory($factory);

        $actual = Reviewston::fooMethod('argumental');
        $this->assertSame('foo-bar', $actual);
    }
}
