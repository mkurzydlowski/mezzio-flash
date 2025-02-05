<?php

/**
 * @see       https://github.com/mezzio/mezzio-flash for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-flash/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-flash/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Mezzio\Flash\Exception;

use Psr\Http\Server\MiddlewareInterface;
use RuntimeException;

use function get_class;
use function sprintf;

class MissingSessionException extends RuntimeException implements ExceptionInterface
{
    public static function forMiddleware(MiddlewareInterface $middleware): MissingSessionException
    {
        return new self(sprintf(
            'Unable to create flash messages in %s; missing session attribute',
            get_class($middleware)
        ));
    }
}
