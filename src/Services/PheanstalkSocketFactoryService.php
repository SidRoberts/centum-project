<?php

namespace App\Services;

use Centum\Interfaces\Container\ServiceInterface;
use Pheanstalk\Contract\SocketFactoryInterface;
use Pheanstalk\SocketFactory;

/**
 * @implements ServiceInterface<SocketFactoryInterface>
 */
final class PheanstalkSocketFactoryService implements ServiceInterface
{
    public function build(): SocketFactoryInterface
    {
        return new SocketFactory("beanstalkd");
    }
}
