<?php

use App\Services\ConsoleService;
use App\Services\PheanstalkSocketFactoryService;
use App\Services\RequestService;
use App\Services\RouterService;
use App\Services\TranslatorLocaleService;
use App\Services\TranslatorLocalesService;
use App\Services\TwigService;
use App\Services\UrlService;
use Centum\Container\Container;
use Centum\Flash\Formatter\HtmlFormatter;
use Centum\Http\Session\GlobalSession;
use Centum\Interfaces\Console\ApplicationInterface;
use Centum\Interfaces\Flash\FormatterInterface;
use Centum\Interfaces\Http\RequestInterface;
use Centum\Interfaces\Http\SessionInterface;
use Centum\Interfaces\Queue\QueueInterface;
use Centum\Interfaces\Router\RouterInterface;
use Centum\Interfaces\Translation\LocaleInterface;
use Centum\Interfaces\Translation\LocalesInterface;
use Centum\Interfaces\Url\UrlInterface;
use Centum\Queue\BeanstalkdQueue;
use Pheanstalk\Contract\PheanstalkPublisherInterface;
use Pheanstalk\Contract\PheanstalkSubscriberInterface;
use Pheanstalk\Contract\SocketFactoryInterface;
use Pheanstalk\PheanstalkPublisher;
use Pheanstalk\PheanstalkSubscriber;
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

$aliasManager->add(PheanstalkPublisherInterface::class, PheanstalkPublisher::class);
$aliasManager->add(PheanstalkSubscriberInterface::class, PheanstalkSubscriber::class);

$serviceStorage->set(SocketFactoryInterface::class, PheanstalkSocketFactoryService::class);

$aliasManager->add(QueueInterface::class, BeanstalkdQueue::class);

////////////////////////////////////////////////////////////////////////////////

$serviceStorage->set(LocaleInterface::class, TranslatorLocaleService::class);
$serviceStorage->set(LocalesInterface::class, TranslatorLocalesService::class);



////////////////////////////////////////////////////////////////////////////////
//                                 AND RETURN                                 //
////////////////////////////////////////////////////////////////////////////////

return $container;
