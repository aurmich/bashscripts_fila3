<?php

declare(strict_types=1);

namespace Modules\Blog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Blog\Models\ContactEntry;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\stdClass> // FIXME: ContactEntry non trovato
 */
class ContactEntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\stdClass>
     * @var class-string<ContactEntry>
     */
    // protected $model = ContactEntry::class; // FIXME: ContactEntry non trovato

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        ];
    }
}
