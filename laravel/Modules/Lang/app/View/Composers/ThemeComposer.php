<?php

declare(strict_types=1);

namespace Modules\Lang\View\Composers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Lang\Datas\LangData;
use Spatie\LaravelData\DataCollection;

<<<<<<< HEAD
=======
/**
 * Classe per la composizione di dati relativi alle lingue nei template.
 */
>>>>>>> origin/dev
class ThemeComposer
{
    /**
     * Get all supported languages as a DataCollection.
     *
     * @throws \Exception if supportedLocales config is not an array
     *
     * @return DataCollection<LangData>
     */
    public function languages(): DataCollection
    {
        $langs = config('laravellocalization.supportedLocales');

        if (! is_array($langs)) {
            throw new \Exception(sprintf('Invalid config for supportedLocales on line %d in %s', __LINE__, class_basename($this)));
        }

        $languages = collect($langs)->map(function (mixed $item, string $locale): array {
<<<<<<< HEAD
            // Ensure $item is an array as expected, otherwise handle error.
            if (! is_array($item) || ! isset($item['regional'], $item['name'])) {
=======
            // Ensure $item is an array
            if (! is_array($item)) {
                throw new \InvalidArgumentException(sprintf('Expected array at locale %s, got %s', $locale, gettype($item)));
            }

            // Ensure $item has the required keys
            if (! isset($item['regional'], $item['name'])) {
>>>>>>> origin/dev
                throw new \InvalidArgumentException(sprintf('Expected array with "regional" and "name" keys at locale %s', $locale));
            }

            // Extract regional code and handle 'en' to 'gb' mapping.
<<<<<<< HEAD
            $regionalCode = explode('_', (string) $item['regional'])[0] ?? 'en';
=======
            // Verifichiamo che regional sia una stringa o lo convertiamo in modo sicuro
            $regional = $item['regional'];
            if (! is_string($regional)) {
                $regional = '';
            }
            $regionalParts = explode('_', $regional);
            $regionalCode = $regionalParts[0] ?? 'en';

>>>>>>> origin/dev
            if ('en' === $regionalCode) {
                $regionalCode = 'gb';
            }

            $url = '#'; // Placeholder URL for frontend.
            if (inAdmin()) {
                $url = $this->buildAdminLanguageUrl($locale);
            }

<<<<<<< HEAD
            return [
                'id' => $locale,
                'name' => $item['name'],
=======
            // Verifichiamo che name sia una stringa o lo convertiamo in modo sicuro
            $name = $item['name'];
            if (! is_string($name)) {
                $name = $locale; // Fallback al codice locale
            }

            return [
                'id' => $locale,
                'name' => $name,
>>>>>>> origin/dev
                'flag' => $this->buildFlagHtml($regionalCode),
                'url' => $url,
            ];
        });

<<<<<<< HEAD
        return LangData::collection($languages->all());
=======
        // Convertiamo esplicitamente a array<int, mixed> per soddisfare il tipo richiesto
        $languagesArray = $languages->values()->all();

        return LangData::collection($languagesArray);
>>>>>>> origin/dev
    }

    /**
     * Get all languages except the current one.
     *
     * @return DataCollection<LangData>
     */
    public function otherLanguages(): DataCollection
    {
        $currentLocale = app()->getLocale();

        return $this->languages()
            ->filter(function (mixed $item) use ($currentLocale): bool {
                // Ensure the item is an instance of LangData
                if (! $item instanceof LangData) {
<<<<<<< HEAD
                    throw new \Exception(sprintf('Expected instance of LangData, got %s on line %d in %s', is_object($item) ? get_class($item) : gettype($item), __LINE__, class_basename($this)));
                }

                // Filter out the current locale
=======
                    throw new \Exception(sprintf('Expected instance of LangData, got %s', is_object($item) ? get_class($item) : gettype($item)));
                }

>>>>>>> origin/dev
                return $item->id !== $currentLocale;
            });
    }

    /**
     * Get a specific field of the current language.
     *
     * @throws \Exception if the current language is not found
     */
    public function currentLang(string $field): string
    {
        $currentLocale = app()->getLocale();

        // Convert DataCollection to a Laravel Collection to use firstWhere()
        $lang = $this->languages()
            ->toCollection()
            ->firstWhere('id', $currentLocale);

        if (! $lang instanceof LangData) {
            throw new \Exception(sprintf('Current language not found on line %d in %s', __LINE__, class_basename($this)));
        }

<<<<<<< HEAD
        return (string) $lang->{$field};
=======
        // Verifichiamo che il valore del campo sia una stringa o lo convertiamo in modo sicuro
        $value = $lang->{$field};
        if (! is_string($value)) {
            return 'id' === $field ? $currentLocale : '';
        }

        return $value;
>>>>>>> origin/dev
    }

    /**
     * Build the URL for the admin panel based on the current route and parameters.
<<<<<<< HEAD
=======
     *
     * @param string $locale The locale code to build URL for
     *
     * @return string The generated URL
>>>>>>> origin/dev
     */
    private function buildAdminLanguageUrl(string $locale): string
    {
        $routeName = Route::currentRouteName();
        if (! is_string($routeName)) {
            return '#';
        }
        $routeParameters = array_merge(getRouteParameters(), ['lang' => $locale]);
        $queryParameters = request()->all();

        $url = route($routeName, $routeParameters);

        return Request::create($url)->fullUrlWithQuery($queryParameters);
    }

    /**
     * Build the HTML for the language flag.
<<<<<<< HEAD
=======
     *
     * @param string $regionalCode The regional code for the flag
     *
     * @return string The HTML for the flag
>>>>>>> origin/dev
     */
    private function buildFlagHtml(string $regionalCode): string
    {
        return sprintf(
            '<div class="iti__flag-box"><div class="iti__flag iti__%s"></div></div>',
            e($regionalCode)
        );
    }
}
