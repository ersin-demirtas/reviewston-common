<?php

namespace ErsinDemirtas\Reviewston\Provider;

use Psr\Http\Client\ClientInterface;

/**
 * Interface ProviderInterface
 *
 * @package ErsinDemirtas\Reviewston\Provider
 */
interface ProviderInterface
{
    /**
     * ProviderInterface constructor.
     *
     * @param  ClientInterface|null  $httpClient
     */
    public function __construct(ClientInterface $httpClient = null);
}
