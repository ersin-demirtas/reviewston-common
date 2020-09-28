<?php

namespace ErsinDemirtas\Reviewston\Provider;

use Psr\Http\Client\ClientInterface;

/**
 * Class AbstractProvider
 *
 * @package ErsinDemirtas\Reviewston\Provider
 */
abstract class AbstractProvider implements ProviderInterface
{
    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * AbstractProvider constructor.
     *
     * @param  ClientInterface|null  $httpClient
     */
    public function __construct(ClientInterface $httpClient = null)
    {
        $this->httpClient = $httpClient;
    }
}
