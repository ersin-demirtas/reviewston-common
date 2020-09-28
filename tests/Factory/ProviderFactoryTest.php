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
        \Mockery::mock('alias:ErsinDemirtas\\Reviewston\\Provider\\TestProvider');
    }

    protected function setUp(): void
    {
        $this->factory = new ProviderFactory();
    }

    public function testGetProviderClass()
    {
        $gateway = $this->factory->create('Test');
        $this->assertInstanceOf('ErsinDemirtas\\Reviewston\\Provider\\TestProvider', $gateway);
    }

    public function testCreateInvalid()
    {
        $this->expectException(ProviderNotFoundException::class);
        $this->expectExceptionMessage("The \ErsinDemirtas\Reviewston\Provider\NoneExistingProvider was not found!");
        $gateway = $this->factory->create('NoneExisting');
    }
}
