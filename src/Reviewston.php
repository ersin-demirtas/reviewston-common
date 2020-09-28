<?php

namespace ErsinDemirtas\Reviewston;

use ErsinDemirtas\Reviewston\Factory\ProviderFactory;
use Psr\Http\Client\ClientInterface;

/**
 * Class Reviewston
 *
 * @package ErsinDemirtas\Reviewston
 *
 * @method static \ErsinDemirtas\Reviewston\Provider\ProviderInterface create(string $provider, ClientInterface $httpClient = null)
 */
class Reviewston {

    /**
     * @var ProviderFactory
     */
    private static $factory;

    /**
     * @param $provider
     * @param  ClientInterface|null  $httpClient
     *
     * @return mixed
     * @throws \Exception
     */

    /**
     * @return ProviderFactory
     */
    public static function getFactory()
    {
        if (is_null(self::$factory)) {
            self::$factory = new ProviderFactory;
        }

        return self::$factory;
    }

    /**
     * @param ProviderFactory $factory
     */
    public static function setFactory(ProviderFactory $factory = null)
    {
        self::$factory = $factory;
    }

    /**
     * @param $method
     * @param $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        $factory = self::getFactory();

        return call_user_func_array(array($factory, $method), $parameters);
    }
}
