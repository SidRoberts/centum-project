<?php

namespace Tests\Support;

use Centum\Codeception\Actions\ContainerActions;
use Centum\Codeception\Actions\UnitTestActions;
use Codeception\Actor;

/**
 * @SuppressWarnings(PHPMD)
 */
class UnitTester extends Actor
{
    use _generated\UnitTesterActions;

    use ContainerActions;
    use UnitTestActions;
}
