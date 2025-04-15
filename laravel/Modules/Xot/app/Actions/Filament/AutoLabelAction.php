<?php

/**
 * -WIP.
 */

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\Component;
use Illuminate\Support\Arr;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Xot\Actions\GetTransKeyAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Classe per automatizzare l'assegnazione di etichette ai componenti Filament.
 */
class AutoLabelAction
{
    use QueueableAction;

    /**
     * Get the component name based on its actual type.
     *
     * @param Field|Component $component Il componente di cui ottenere il nome
     * @return string Il nome del componente
     */
    private function getComponentName(Field|Component $component): string
    {
        // Per i componenti Field di Filament
        if (method_exists($component, 'getName')) {
            $name = $component->getName();
            return is_string($name) ? $name : (string) $name;
        }

        // Per i componenti generali di Filament
        // PHPStan rileva che questo controllo è sempre vero per Component
        // ma lo manteniamo per chiarezza e per gestire eventuali cambiamenti futuri in Filament
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($component, 'getStatePath')) {
            $statePath = $component->getStatePath();
<<<<<<< HEAD
            return is_string($statePath) ? $statePath : (string) $statePath;
=======
            return $statePath;
>>>>>>> origin/dev
        }

        // Fallback a reflection per altri casi
        $reflectionClass = new \ReflectionClass($component);
        if ($reflectionClass->hasProperty('name') && $reflectionClass->getProperty('name')->isPublic()) {
            $property = $reflectionClass->getProperty('name');
<<<<<<< HEAD
            $value = $property->getValue($component);
            return is_string($value) ? $value : (string) $value;
=======
            Assert::string($value = $property->getValue($component));
            return $value;
>>>>>>> origin/dev
        }

        // Ultima risorsa: ritorniamo il nome della classe
        return class_basename($component);
    }

    /**
     * Applica automaticamente le etichette ai componenti Filament.
     *
     * @param Field|Component $component Il componente a cui applicare l'etichetta
     * 
     * @return Field|Component Il componente con l'etichetta applicata
     */
    public function execute(Field|Component $component): Field|Component
    {
        Assert::isInstanceOf($component, Field::class, 'Il componente deve essere un\'istanza di Field o Component');
<<<<<<< HEAD
        
=======

>>>>>>> origin/dev
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 6);

        // Otteniamo il valore dalla backtrace
        $class = Arr::get($backtrace, '5.class');

        // Gestiamo il caso in cui $class sia vuoto
        if (empty($class)) {
            // Se non riusciamo a ottenere la classe dal backtrace, usiamo la classe del componente
            $class = get_class($component);
        }
<<<<<<< HEAD
        
        // Assicuriamo che $class sia una stringa
        if (!is_string($class)) {
            $class = is_object($class) ? get_class($class) : is_string($class) ? $class : (string) $class;
        }

        Assert::stringNotEmpty($class, 'La classe deve essere una stringa non vuota');
        
        // Otteniamo la chiave di traduzione
        $transKeyAction = app(GetTransKeyAction::class);
        Assert::isCallable([$transKeyAction, 'execute'], 'GetTransKeyAction::execute deve essere chiamabile');
        
=======

        if (is_object($class)) {
            $class = get_class($class);
        }

        // Assicuriamo che $class sia una stringa
        Assert::stringNotEmpty($class, 'La classe deve essere una stringa non vuota');

        // Otteniamo la chiave di traduzione
        $transKeyAction = app(GetTransKeyAction::class);
        Assert::isCallable([$transKeyAction, 'execute'], 'GetTransKeyAction::execute deve essere chiamabile');

>>>>>>> origin/dev
        $trans_key = $transKeyAction->execute($class);
        Assert::stringNotEmpty($trans_key, 'La chiave di traduzione non può essere vuota');

        // Otteniamo il nome del componente
        $componentName = $this->getComponentName($component);
        Assert::stringNotEmpty($componentName, 'Il nome del componente non può essere vuoto');

        // Costruiamo la chiave per l'etichetta
<<<<<<< HEAD
        $label_key = $trans_key.'.fields.'.$componentName.'.label';
        $label = trans($label_key);
        
=======
        $label_key = $trans_key . '.fields.' . $componentName . '.label';
        $label = trans($label_key);

>>>>>>> origin/dev
        if (is_string($label)) {
            if ($label_key === $label) {
                // Se la traduzione non esiste, creiamone una utilizzando il nome del componente
                $label_value = $componentName;
<<<<<<< HEAD
                
                // Proviamo a ottenere una traduzione più breve
                $label_key1 = $trans_key.'.fields.'.$componentName;
                $label1 = trans($label_key1);
                
=======

                // Proviamo a ottenere una traduzione più breve
                $label_key1 = $trans_key . '.fields.' . $componentName;
                $label1 = trans($label_key1);

>>>>>>> origin/dev
                if ($label_key1 !== $label1 && is_string($label1)) {
                    $label_value = $label1;
                }

                // Salviamo la traduzione
                $saveTransAction = app(SaveTransAction::class);
                Assert::isCallable([$saveTransAction, 'execute'], 'SaveTransAction::execute deve essere chiamabile');
<<<<<<< HEAD
                
                $saveTransAction->execute($label_key, $label_value);
            }
            
=======

                $saveTransAction->execute($label_key, $label_value);
            }

>>>>>>> origin/dev
            // Applichiamo l'etichetta al componente
            // Field ha sempre un metodo label(), quindi possiamo chiamarlo direttamente
            $component->label($label);
        }

        return $component;
    }
}
