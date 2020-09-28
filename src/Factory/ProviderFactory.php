<?php

namespace ErsinDemirtas\Reviewston\Factory;

use ErsinDemirtas\Reviewston\Exception\ProviderNotFoundException;
use Psr\Http\Client\ClientInterface;

/**
 * Class ProviderFactory
 *
 * @package ErsinDemirtas\Reviewston\Factory
 */
class ProviderFactory
{

    /**
     * @param $provider
     * @param  ClientInterface|null  $httpClient
     *
     * @return mixed
     * @throws \Exception
     */
    public function create($provider, ClientInterface $httpClient = null)
    {
        $class = $this->getProviderClass($provider);

        if (!class_exists($class)) {
            throw new ProviderNotFoundException($class);
        }

        return new $class($httpClient);
    }

    /**
     * @param $provider
     *
     * @return string
     */
    protected function getProviderClass($provider)
    {
        return '\\ErsinDemirtas\Reviewston\\Provider\\' . ucfirst($provider) . 'Provider';
    }
}
