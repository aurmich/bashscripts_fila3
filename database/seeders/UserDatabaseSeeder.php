<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Lang\Database\Seeders;
=======
namespace Modules\User\Database\Seeders;
>>>>>>> e83070fd (.)
=======
namespace Modules\User\Database\Seeders;
>>>>>>> bdeae81f (first)

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

<<<<<<< HEAD
<<<<<<< HEAD
class LangDatabaseSeeder extends Seeder
=======
class UserDatabaseSeeder extends Seeder
>>>>>>> e83070fd (.)
=======
class UserDatabaseSeeder extends Seeder
>>>>>>> bdeae81f (first)
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
