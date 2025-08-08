<?php

namespace App\Services;

use Centum\Interfaces\Container\ServiceInterface;
use Centum\Interfaces\Translation\LocalesInterface;
use Centum\Translation\Locales;
use RuntimeException;

/**
 * @implements ServiceInterface<LocalesInterface>
 */
final class TranslatorLocalesService implements ServiceInterface
{
    public function build(): LocalesInterface
    {
        $locales = [];

        $translationDir = __DIR__ . "/../../resources/translations";

        $files = scandir($translationDir);

        if ($files === false) {
            throw new RuntimeException(
                sprintf(
                    "Failed to open translation directory: %s",
                    $translationDir
                )
            );
        }

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === "php" && $file !== ".php") {
                /** @var non-empty-string */
                $locale = pathinfo($file, PATHINFO_FILENAME);

                $locales[$locale] = $translationDir . "/" . $file;
            }
        }

        return new Locales($locales);
    }
}
