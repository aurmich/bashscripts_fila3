<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Lang\Database\Seeders;
=======
namespace Modules\User\Database\Seeders;
>>>>>>> e83070fd (.)

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

<<<<<<< HEAD
class LangDatabaseSeeder extends Seeder
=======
class UserDatabaseSeeder extends Seeder
>>>>>>> e83070fd (.)
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
