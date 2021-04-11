<?php

namespace App\Commands;

use Centum\Console\Application;
use Throwable;

////////////////////////////////////////////////////////////////////////////////
//                                  CONSOLE                                   //
////////////////////////////////////////////////////////////////////////////////

$console = new Application($container);



////////////////////////////////////////////////////////////////////////////////
//                                  COMMANDS                                  //
////////////////////////////////////////////////////////////////////////////////

$console->addCommand(
    new MainCommand()
);



////////////////////////////////////////////////////////////////////////////////
//                             EXCEPTION HANDLERS                             //
////////////////////////////////////////////////////////////////////////////////

$console->addExceptionHandler(
    Throwable::class,
    new ErrorCommand()
);



////////////////////////////////////////////////////////////////////////////////
//                                 AND RETURN                                 //
////////////////////////////////////////////////////////////////////////////////

return $console;
