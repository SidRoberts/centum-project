<?php

namespace Tests\Support;

use Centum\Codeception\Actions\HtmlActions;
use Centum\Codeception\Actions\RouterActions;
use Codeception\Actor;

/**
 * @SuppressWarnings(PHPMD)
 */
class WebTester extends Actor
{
    use _generated\WebTesterActions;

    use HtmlActions;
    use RouterActions;
}
