<?php

use Centum\Console\Application;
use Centum\Container\Container;
use Centum\Flash\Flash;
use Centum\Flash\Formatter\HtmlFormatter;
use Centum\Flash\FormatterInterface;
use Centum\Http\Request;
use Centum\Http\RequestFactory;
use Centum\Http\Session\HandlerInterface;
use Centum\Http\Session\SessionGlobalVariableHandler;
use Centum\Mvc\Router;
use Centum\Twig\FlashExtension;
use Centum\Twig\UrlExtension;
use Centum\Twig\WhitelistedFunctionsExtension;
use Centum\Url\Url;
use Doctrine\Common\Cache\RedisCache;
use Doctrine\ORM\EntityManager;
use Monolog\Handler\RedisHandler;
use Monolog\Logger;
use Pheanstalk\Pheanstalk;
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
    Router::class,
    function (Container $container) {
        return require __DIR__ . "/router.php";
    }
);

////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    Application::class,
    function (Container $container) {
        return require __DIR__ . "/console.php";
    }
);



////////////////////////////////////////////////////////////////////////////////
//                                  SERVICES                                  //
////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    HandlerInterface::class,
    function () {
        return new SessionGlobalVariableHandler();
    }
);

////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    FormatterInterface::class,
    function () {
        return new HtmlFormatter();
    }
);

////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    Request::class,
    function () {
        return RequestFactory::createFromGlobals();
    }
);

////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    Url::class,
    function () {
        return new Url("/");
    }
);

////////////////////////////////////////////////////////////////////////////////

$container->setDynamic(
    Environment::class,
    function (Url $url, Flash $flash) {
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

        $twig->addExtension(
            new WhitelistedFunctionsExtension(
                [
                    "number_format",
                    "round",
                    "substr",
                    "ucfirst",
                    "uclast",
                ]
            )
        );



        return $twig;
    }
);



////////////////////////////////////////////////////////////////////////////////
//                                 AND RETURN                                 //
////////////////////////////////////////////////////////////////////////////////

return $container;
