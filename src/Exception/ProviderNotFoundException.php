<?php

namespace ErsinDemirtas\Reviewston\Exception;

use Throwable;

/**
 * Class ProviderNotFoundException
 *
 * @package ErsinDemirtas\Reviewston\Exception
 */
class ProviderNotFoundException extends \Exception
{
    public function __construct(
        $class = "",
        $code = 0,
        Throwable $previous = null
    ) {
        $message = "The $class was not found!";
        parent::__construct($message, $code, $previous);
    }
}
