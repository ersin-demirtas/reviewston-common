<?php

namespace ErsinDemirtas\Reviewston\Tests\Provider;

use ErsinDemirtas\Reviewston\Provider\AbstractProvider;
use ErsinDemirtas\Reviewston\Tests\TestCase;

/**
 * Class AbstractProviderTest
 *
 * @package ErsinDemirtas\Reviewston\Tests\Provider
 */
class AbstractProviderTest extends TestCase
{

    /**
     * @var \ErsinDemirtas\Reviewston\Provider\AbstractProvider
     */
    protected $provider;

    protected function setUp(): void
    {
        $this->provider = new MockedAbstractProvider();
    }

    public function testConstruct()
    {
        $this->provider = new MockedAbstractProvider;
        $this->assertNull($this->provider->getProtectedHttpClient());
    }
}

class MockedAbstractProvider extends AbstractProvider
{
    public function getProtectedHttpClient()
    {
        return $this->httpClient;
    }

}
