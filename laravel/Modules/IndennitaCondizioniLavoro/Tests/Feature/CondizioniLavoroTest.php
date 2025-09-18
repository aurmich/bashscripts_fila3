<?php

namespace Modules\IndennitaCondizioniLavoro\Tests\Feature;

use Tests\TestCase;
use Modules\User\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro;

class CondizioniLavoroTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        
        // Create necessary roles
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'user']);
    }

    /** @test */
    public function it_can_list_condizioni_lavoro_for_super_admin()
    {
        /** @var \Modules\User\Models\User $user */
        $user = User::factory()->create();
        $user->assignRole('super-admin');
        $this->actingAs($user);

        $response = $this->get(route('filament.admin.resources.condizioni-lavoro-adms.index'));
        
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_list_condizioni_lavoro_for_regular_user()
    {
        $user = User::factory()->create();
        $user->assignRole('user');
        $this->actingAs($user);

        $response = $this->get(route('filament.admin.resources.condizioni-lavoro-adms.index'));
        
        $response->assertStatus(200);
    }

    /** @test */
    public function it_properly_formats_table_columns()
    {
        /** @var \Modules\User\Models\User $user */
        $user = User::factory()->create();
        $user->assignRole('super-admin');
        $this->actingAs($user);

        $condizioniLavoro = CondizioniLavoro::factory()->create([
            'anno' => '2024',
            'quadrimestre' => '1',
            'matr' => '12345',
            'cognome' => 'Test',
            'nome' => 'User',
            'stabi' => 'Test Stabi',
            'repar' => 'Test Repar'
        ]);

        $response = $this->get(route('filament.admin.resources.condizioni-lavoro-adms.index'));
        
        $response->assertStatus(200)
            ->assertSee('12345')
            ->assertSee('Test')
            ->assertSee('User')
            ->assertSee('Test Stabi')
            ->assertSee('Test Repar')
            ->assertSee('2024')
            ->assertSee('1');
    }
}
