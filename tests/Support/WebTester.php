<?php

namespace Tests\Support;

use Centum\Codeception\Actions\ContainerActions;
use Centum\Codeception\Actions\HtmlActions;
use Centum\Codeception\Actions\RouterActions;
use Codeception\Actor;

/**
 * @SuppressWarnings(PHPMD)
 */
class WebTester extends Actor
{
    use _generated\WebTesterActions;

    use ContainerActions;
    use HtmlActions;
    use RouterActions;
}
