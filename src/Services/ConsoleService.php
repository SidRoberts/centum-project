<?php

namespace App\Services;

use App\Console\Commands\MainCommand;
use App\Console\ExceptionHandlers\ExceptionHandler;
use Centum\Console\Application;
use Centum\Interfaces\Console\ApplicationInterface;
use Centum\Interfaces\Container\ContainerInterface;
use Centum\Interfaces\Container\ServiceInterface;

/**
 * @implements ServiceInterface<ApplicationInterface>
 */
final class ConsoleService implements ServiceInterface
{
    public function __construct(
        protected readonly ContainerInterface $container
    ) {
    }

    public function build(): ApplicationInterface
    {
        ////////////////////////////////////////////////////////////////////////
        //                              CONSOLE                               //
        ////////////////////////////////////////////////////////////////////////

        $console = new Application($this->container);



        ////////////////////////////////////////////////////////////////////////
        //                              COMMANDS                              //
        ////////////////////////////////////////////////////////////////////////

        $console->addCommand(MainCommand::class);



        ////////////////////////////////////////////////////////////////////////
        //                         EXCEPTION HANDLERS                         //
        ////////////////////////////////////////////////////////////////////////

        $console->addExceptionHandler(ExceptionHandler::class);



        ////////////////////////////////////////////////////////////////////////
        //                             AND RETURN                             //
        ////////////////////////////////////////////////////////////////////////

        return $console;
    }
}
