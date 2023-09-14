<?php

use App\Services\ConsoleService;
use App\Services\RequestService;
use App\Services\RouterService;
use App\Services\TwigService;
use App\Services\UrlService;
use Centum\Container\Container;
use Centum\Flash\Formatter\HtmlFormatter;
use Centum\Http\Session\GlobalSession;
use Centum\Interfaces\Console\ApplicationInterface;
use Centum\Interfaces\Flash\FormatterInterface;
use Centum\Interfaces\Http\RequestInterface;
use Centum\Interfaces\Http\SessionInterface;
use Centum\Interfaces\Router\RouterInterface;
use Centum\Interfaces\Url\UrlInterface;
use Twig\Environment;

////////////////////////////////////////////////////////////////////////////////
//                                 CONTAINER                                  //
////////////////////////////////////////////////////////////////////////////////

$container = new Container();

$aliasManager   = $container->getAliasManager();
$serviceStorage = $container->getServiceStorage();



////////////////////////////////////////////////////////////////////////////////
//                                APPLICATION                                 //
////////////////////////////////////////////////////////////////////////////////

$serviceStorage->set(RouterInterface::class, RouterService::class);

////////////////////////////////////////////////////////////////////////////////

$serviceStorage->set(ApplicationInterface::class, ConsoleService::class);



////////////////////////////////////////////////////////////////////////////////
//                                  SERVICES                                  //
////////////////////////////////////////////////////////////////////////////////

$serviceStorage->set(RequestInterface::class, RequestService::class);

$aliasManager->add(SessionInterface::class, GlobalSession::class);

////////////////////////////////////////////////////////////////////////////////

$aliasManager->add(FormatterInterface::class, HtmlFormatter::class);

////////////////////////////////////////////////////////////////////////////////

$serviceStorage->set(UrlInterface::class, UrlService::class);

////////////////////////////////////////////////////////////////////////////////

$serviceStorage->set(Environment::class, TwigService::class);



////////////////////////////////////////////////////////////////////////////////
//                                 AND RETURN                                 //
////////////////////////////////////////////////////////////////////////////////

return $container;
