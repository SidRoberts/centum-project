<?php

use Centum\Container\Container;
use Centum\Flash\Formatter\HtmlFormatter;
use Centum\Http\RequestFactory;
use Centum\Http\Session\GlobalSession;
use Centum\Interfaces\Console\ApplicationInterface;
use Centum\Interfaces\Container\ContainerInterface;
use Centum\Interfaces\Flash\FlashInterface;
use Centum\Interfaces\Flash\FormatterInterface;
use Centum\Interfaces\Http\RequestInterface;
use Centum\Interfaces\Http\SessionInterface;
use Centum\Interfaces\Router\RouterInterface;
use Centum\Interfaces\Url\UrlInterface;
use Centum\Twig\FlashExtension;
use Centum\Twig\UrlExtension;
use Centum\Twig\WhitelistedFunctionsExtension;
use Centum\Url\Url;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

////////////////////////////////////////////////////////////////////////////////
//                                 CONTAINER                                  //
////////////////////////////////////////////////////////////////////////////////

$container = new Container();



////////////////////////////////////////////////////////////////////////////////
//                                APPLICATION                                 //
////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    RouterInterface::class,
    /** @psalm-suppress UnusedClosureParam */
    function (ContainerInterface $container): RouterInterface {
        /** @var RouterInterface */
        return require __DIR__ . "/router.php";
    }
);

////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    ApplicationInterface::class,
    /** @psalm-suppress UnusedClosureParam */
    function (ContainerInterface $container): ApplicationInterface {
        /** @var ApplicationInterface */
        return require __DIR__ . "/console.php";
    }
);



////////////////////////////////////////////////////////////////////////////////
//                                  SERVICES                                  //
////////////////////////////////////////////////////////////////////////////////

$container->addAlias(
    SessionInterface::class,
    GlobalSession::class
);

////////////////////////////////////////////////////////////////////////////////

$container->addAlias(
    FormatterInterface::class,
    HtmlFormatter::class
);

////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    RequestInterface::class,
    function (): RequestInterface {
        $requestFactory = new RequestFactory();

        return $requestFactory->createFromGlobals();
    }
);

////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    UrlInterface::class,
    function (): UrlInterface {
        return new Url("/");
    }
);

////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    Environment::class,
    function (UrlInterface $url, FlashInterface $flash): Environment {
        $loader = new FilesystemLoader(
            __DIR__ . "/../resources/twig/"
        );

        $twig = new Environment(
            $loader,
            [
                "debug"            => true,
                "cache"            => "/tmp/app/twig/",
                "strict_variables" => true,
            ]
        );



        $twig->addExtension(
            new DebugExtension()
        );

        $twig->addExtension(
            new FlashExtension($flash)
        );

        $twig->addExtension(
            new UrlExtension($url)
        );

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
);



////////////////////////////////////////////////////////////////////////////////
//                                 AND RETURN                                 //
////////////////////////////////////////////////////////////////////////////////

return $container;
