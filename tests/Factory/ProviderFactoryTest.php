<?php

namespace ErsinDemirtas\Reviewston\Tests\Factory;

use ErsinDemirtas\Reviewston\Exception\ProviderNotFoundException;
use ErsinDemirtas\Reviewston\Factory\ProviderFactory;
use ErsinDemirtas\Reviewston\Tests\TestCase;

/**
 * Class ReviewsFactoryTest
 *
 * @package ErsinDemirtas\Reviewston\Tests\Factory
 */
class ProviderFactoryTest extends TestCase
{

    protected $factory;

    public static function setUpBeforeClass(): void
    {
        \Mockery::mock('alias:ErsinDemirtas\\Reviewston\\Vendor\\Provider');
    }

    protected function setUp(): void
    {
        $this->factory = new ProviderFactory();
    }

    public function testGetProviderClass()
    {
        $gateway = $this->factory->create('Vendor');
        $this->assertInstanceOf('ErsinDemirtas\\Reviewston\\Vendor\\Provider', $gateway);
    }

    public function testCreateInvalid()
    {
        $this->expectException(ProviderNotFoundException::class);
        $this->expectExceptionMessage("The \ErsinDemirtas\Reviewston\NoneExisting\Provider was not found!");
        $gateway = $this->factory->create('NoneExisting');
    }
}
