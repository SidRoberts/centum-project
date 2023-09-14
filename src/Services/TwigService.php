<?php

namespace App\Services;

use Centum\Interfaces\Container\ServiceInterface;
use Centum\Twig\FlashExtension;
use Centum\Twig\UrlExtension;
use Centum\Twig\WhitelistedFunctionsExtension;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/**
 * @implements ServiceInterface<Environment>
 */
class TwigService implements ServiceInterface
{
    public function __construct(
        protected readonly DebugExtension $debugExtension,
        protected readonly FlashExtension $flashExtension,
        protected readonly UrlExtension $urlExtension
    ) {
    }

    public function build(): Environment
    {
        $loader = new FilesystemLoader(
            __DIR__ . "/../../resources/twig/"
        );

        $twig = new Environment(
            $loader,
            [
                "debug"            => true,
                "cache"            => "/tmp/app/twig/",
                "strict_variables" => true,
            ]
        );



        $twig->addExtension($this->debugExtension);

        $twig->addExtension($this->flashExtension);

        $twig->addExtension($this->urlExtension);

        /** @var array<callable-string> */
        $whitelistedFunctions = [
            "number_format",
            "round",
            "substr",
            "ucfirst",
            "uclast",
        ];

        $twig->addExtension(
            new WhitelistedFunctionsExtension($whitelistedFunctions)
        );



        return $twig;
    }
}
