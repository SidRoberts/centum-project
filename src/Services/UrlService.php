<?php

namespace App\Services;

use Centum\Interfaces\Container\ServiceInterface;
use Centum\Interfaces\Url\UrlInterface;
use Centum\Url\Url;

/**
 * @implements ServiceInterface<UrlInterface>
 */
class UrlService implements ServiceInterface
{
    public function build(): UrlInterface
    {
        return new Url("/");
    }
}
