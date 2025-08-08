<?php

namespace App\Services;

use Centum\Interfaces\Container\ServiceInterface;
use Centum\Interfaces\Http\RequestInterface;
use Centum\Interfaces\Translation\LocaleInterface;
use Centum\Interfaces\Translation\LocalesInterface;
use Centum\Translation\PreferredLanguageParser\AcceptLanguageParser;
use Centum\Translation\PreferredLanguageParser\ServerLanguageParser;

/**
 * @implements ServiceInterface<LocaleInterface>
 */
final class TranslatorLocaleService implements ServiceInterface
{
    public function __construct(
        protected readonly RequestInterface $request,
        protected readonly LocalesInterface $locales
    ) {
    }

    public function build(): LocaleInterface
    {
        $possibleLocaleCodes = $this->getPossibleLocaleCodes();

        if (empty($possibleLocaleCodes)) {
            $possibleLocaleCodes = ["en"];
        }

        return $this->locales->load($possibleLocaleCodes[0]);
    }



    /**
     * @return list<non-empty-string>
     */
    protected function getPossibleLocaleCodes(): array
    {
        $acceptableLocaleCodes = $this->getAcceptableLocaleCodes();

        $availableLocaleCodes = $this->locales->getAvailableCodes();

        $possibleLocaleCodes = array_intersect($acceptableLocaleCodes, $availableLocaleCodes);

        return array_values($possibleLocaleCodes);
    }

    /**
     * @return list<non-empty-string>
     */
    protected function getAcceptableLocaleCodes(): array
    {
        if (PHP_SAPI === "cli" && $_SERVER["LANG"] !== "") {
            $serverLanguageParser = new ServerLanguageParser();

            $acceptableLocaleCodes = $serverLanguageParser->parse($_SERVER["LANG"]);
        } elseif ($this->request->getHeaders()->has("Accept-Language")) {
            $acceptedLanguagesHeader = $this->request->getHeaders()->get("Accept-Language")->getValue();

            $acceptLanguageParser = new AcceptLanguageParser();

            $acceptableLocaleCodes = $acceptLanguageParser->parse($acceptedLanguagesHeader);
        } else {
            $acceptableLocaleCodes = [];
        }

        return $acceptableLocaleCodes;
    }
}
