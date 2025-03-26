# Gestione Attività Tecniche

## Note Importanti

1. Tutte le classi Filament devono estendere le classi base del modulo Xot con prefisso `XotBase`
2. Le classi base di Xot forniscono funzionalità comuni e regole di business standardizzate
3. È necessario analizzare la classe base di Xot prima di estenderla per comprendere le sue regole
4. La classe `XotBaseResource` già gestisce:
   - Navigation icon
   - Navigation group
   - Navigation sort
   - Navigation badge
   - Navigation badge color
5. La classe `XotBaseResource` richiede:
   - `getFormSchema()` invece di `form()`
   - `getFormSchema()` deve restituire un array associativo con chiavi stringhe
   - Non usa il metodo `table()`
   - La logica della tabella è implementata nella pagina "index"
6. La classe `XotBasePage` richiede:
   - `getTableColumns()` deve restituire un array associativo con chiavi stringhe
   - `getTableFilters()` deve restituire un array associativo con chiavi stringhe
   - `getTableActions()` deve restituire un array associativo con chiavi stringhe

## 1. Struttura Directory

```
app/
├── Filament/
│   ├── Resources/
│   │   └── TechnicalActivityResource.php
│   ├── Pages/
│   │   ├── TechnicalActivityPage.php
│   │   └── TechnicalActivityIndexPage.php
│   └── Widgets/
│       └── TechnicalActivityWidget.php
```

## 2. Implementazione Resource

```php
// app/Filament/Resources/TechnicalActivityResource.php
class TechnicalActivityResource extends XotBaseResource
{
    protected static ?string $model = TechnicalActivity::class;

    public static function getFormSchema(): array
    {
        return [
            'name' => Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            'type' => Forms\Components\Select::make('type')
                ->options(ActivityType::class)
                ->required(),
            'percentage' => Forms\Components\TextInput::make('percentage')
                ->required()
                ->numeric()
                ->minValue(0)
                ->maxValue(1),
            'is_active' => Forms\Components\Toggle::make('is_active')
                ->required(),
        ];
    }
}
```

## 3. Implementazione Pages

### 3.1 Index Page
```php
// app/Filament/Pages/TechnicalActivityIndexPage.php
class TechnicalActivityIndexPage extends XotBasePage
{
    protected static string $view = 'filament.pages.technical-activity.index';

    public function getTableColumns(): array
    {
        return [
            'name' => Tables\Columns\TextColumn::make('name')
                ->searchable(),
            'type' => Tables\Columns\TextColumn::make('type')
                ->badge(),
            'percentage' => Tables\Columns\TextColumn::make('percentage')
                ->percentage(),
            'is_active' => Tables\Columns\IconColumn::make('is_active')
                ->boolean(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'type' => Tables\Filters\SelectFilter::make('type')
                ->options(ActivityType::class),
            'is_active' => Tables\Filters\TernaryFilter::make('is_active'),
        ];
    }

    public function getTableActions(): array
    {
        return [
            'edit' => Tables\Actions\EditAction::make(),
            'delete' => Tables\Actions\DeleteAction::make(),
        ];
    }
}
```

### 3.2 Form Page
```php
// app/Filament/Pages/TechnicalActivityPage.php
class TechnicalActivityPage extends XotBasePage
{
    protected static string $view = 'filament.pages.technical-activity.form';

    public function getTitle(): string
    {
        return 'Attività Tecniche';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

## 4. Implementazione Widgets

```php
// app/Filament/Widgets/TechnicalActivityWidget.php
class TechnicalActivityWidget extends XotBaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Attività Tecniche';

    protected function getData(): array
    {
        return [
            'activities' => TechnicalActivity::count(),
            'active' => TechnicalActivity::where('is_active', true)->count(),
        ];
    }
}
```

## 5. Regole di Business

1. Tutte le attività tecniche devono avere un nome univoco
2. Le percentuali devono essere comprese tra 0 e 1
3. Solo le attività attive possono essere assegnate ai progetti
4. Le modifiche alle attività inattive richiedono una nuova versione

## 6. Validazione

```php
// app/Http/Requests/TechnicalActivityRequest.php
class TechnicalActivityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:technical_activities,name,' . $this->technical_activity?->id,
            'type' => 'required|string|in:' . implode(',', array_column(ActivityType::cases(), 'value')),
            'percentage' => 'required|numeric|min:0|max:1',
            'is_active' => 'required|boolean',
        ];
    }
}
```

## 7. Test

```php
// tests/Feature/TechnicalActivityTest.php
class TechnicalActivityTest extends TestCase
{
    public function test_can_create_technical_activity()
    {
        $response = $this->post('/admin/technical-activities', [
            'name' => 'Test Activity',
            'type' => ActivityType::PROGRAMMING->value,
            'percentage' => 0.02,
            'is_active' => true,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('technical_activities', [
            'name' => 'Test Activity',
            'type' => ActivityType::PROGRAMMING->value,
        ]);
    }
}
```

## 8. Deployment Checklist

1. Verificare le dipendenze del modulo Xot:
```bash
composer require xot/laravel-module
```

2. Pubblicare le configurazioni di Xot:
```bash
php artisan vendor:publish --tag=xot-config
```

3. Eseguire le migrazioni:
```bash
php artisan migrate
```

4. Eseguire i test:
```bash
php artisan test --filter=TechnicalActivityTest
```

5. Pulire la cache:
```bash
php artisan optimize:clear
```

## 1. Struttura Base

### 1.1 Migrazione per Attività Tecniche
```php
// Modules/Incentivi/Database/Migrations/2024_03_26_000001_create_technical_activities_table.php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->bigIncrements('id');
                $table->foreignId('project_id')->constrained('projects');
                $table->string('type');
                $table->string('status');
                $table->date('start_date');
                $table->date('end_date')->nullable();
                $table->text('description')->nullable();
                $table->json('metadata')->nullable();
                $table->index(['project_id', 'type']);
                $table->index(['status', 'start_date']);
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $this->updateTimestamps($table, true);
            }
        );
    }
};
```

### 1.2 Model per Attività Tecniche
```php
// Modules/Incentivi/Models/TechnicalActivity.php
<?php

namespace Modules\Incentivi\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TechnicalActivity extends BaseModel
{
    use SoftDeletes;

    protected $table = 'technical_activities';

    protected $fillable = [
        'project_id',
        'type',
        'status',
        'start_date',
        'end_date',
        'description',
        'metadata',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'metadata' => 'array'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'technical_activity_employee')
            ->withPivot('role', 'percentage')
            ->withTimestamps();
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
```

### 1.3 Migrazione per Relazione Attività-Impiegati
```php
// Modules/Incentivi/Database/Migrations/2024_03_26_000002_create_technical_activity_employee_table.php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->bigIncrements('id');
                $table->foreignId('technical_activity_id')->constrained('technical_activities');
                $table->foreignId('employee_id')->constrained('employees');
                $table->string('role');
                $table->decimal('percentage', 5, 4);
                $table->index('role');
                $table->unique(['technical_activity_id', 'employee_id']);
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $this->updateTimestamps($table, true);
            }
        );
    }
};
```

## 2. Implementazione Attività Specifiche

### 2.1 Programmazione Spesa Investimenti
```php
// app/Actions/TechnicalActivities/ProgrammazioneSpesaAction.php
class ProgrammazioneSpesaAction extends QueableAction
{
    public function handle(Project $project, array $data): TechnicalActivity
    {
        return TechnicalActivity::create([
            'project_id' => $project->id,
            'type' => 'programmazione_spesa',
            'status' => 'in_progress',
            'start_date' => now(),
            'description' => $data['description'],
            'metadata' => [
                'budget' => $data['budget'],
                'year' => $data['year'],
                'category' => $data['category']
            ]
        ]);
    }
}
```

### 2.2 Gestione RUP e Responsabili
```php
// app/Actions/TechnicalActivities/ManageRupAction.php
class ManageRupAction extends QueableAction
{
    public function handle(Project $project, Employee $employee, string $role): void
    {
        $activity = TechnicalActivity::create([
            'project_id' => $project->id,
            'type' => 'rup_management',
            'status' => 'active',
            'start_date' => now(),
            'metadata' => [
                'role' => $role,
                'phase' => $project->current_phase
            ]
        ]);

        $activity->employees()->attach($employee->id, [
            'role' => $role,
            'percentage' => $this->calculatePercentage($role)
        ]);
    }

    private function calculatePercentage(string $role): float
    {
        return match($role) {
            'rup' => 0.24,
            'responsabile_procedimento_affidamento' => 0.03,
            'responsabile_procedimento_esecuzione' => 0.08,
            default => 0
        };
    }
}
```

## 3. Gestione Collaboratori RUP

### 3.1 Model per Collaboratori
```php
// app/Models/RupCollaborator.php
class RupCollaborator extends Model
{
    protected $fillable = [
        'technical_activity_id',
        'employee_id',
        'role',
        'percentage',
        'department',
        'responsibilities'
    ];

    public function activity()
    {
        return $this->belongsTo(TechnicalActivity::class, 'technical_activity_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
```

### 3.2 Action per Gestione Collaboratori
```php
// app/Actions/TechnicalActivities/ManageRupCollaboratorsAction.php
class ManageRupCollaboratorsAction extends QueableAction
{
    public function handle(TechnicalActivity $activity, array $collaborators): void
    {
        foreach ($collaborators as $collaborator) {
            RupCollaborator::create([
                'technical_activity_id' => $activity->id,
                'employee_id' => $collaborator['employee_id'],
                'role' => $collaborator['role'],
                'percentage' => $collaborator['percentage'],
                'department' => $collaborator['department'],
                'responsibilities' => $collaborator['responsibilities']
            ]);
        }
    }
}
```

## 4. Gestione Progetti e Documenti

### 4.1 Model per Documenti
```php
// app/Models/ProjectDocument.php
class ProjectDocument extends Model
{
    protected $fillable = [
        'project_id',
        'technical_activity_id',
        'type',
        'title',
        'file_path',
        'version',
        'status',
        'approved_by',
        'approved_at'
    ];

    protected $casts = [
        'approved_at' => 'datetime'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function activity()
    {
        return $this->belongsTo(TechnicalActivity::class);
    }

    public function approver()
    {
        return $this->belongsTo(Employee::class, 'approved_by');
    }
}
```

### 4.2 Action per Gestione Documenti
```php
// app/Actions/TechnicalActivities/ManageProjectDocumentsAction.php
class ManageProjectDocumentsAction extends QueableAction
{
    public function handle(TechnicalActivity $activity, array $documentData): ProjectDocument
    {
        return ProjectDocument::create([
            'project_id' => $activity->project_id,
            'technical_activity_id' => $activity->id,
            'type' => $documentData['type'],
            'title' => $documentData['title'],
            'file_path' => $this->storeFile($documentData['file']),
            'version' => 1,
            'status' => 'draft'
        ]);
    }

    private function storeFile($file): string
    {
        return $file->store('project-documents', 'public');
    }
}
```

## 5. Coordinamento Sicurezza

### 5.1 Model per Coordinamento
```php
// app/Models/SafetyCoordination.php
class SafetyCoordination extends Model
{
    protected $fillable = [
        'technical_activity_id',
        'phase',
        'risk_assessment',
        'safety_measures',
        'coordinator_id',
        'status'
    ];

    protected $casts = [
        'risk_assessment' => 'array',
        'safety_measures' => 'array'
    ];

    public function activity()
    {
        return $this->belongsTo(TechnicalActivity::class);
    }

    public function coordinator()
    {
        return $this->belongsTo(Employee::class, 'coordinator_id');
    }
}
```

### 5.2 Action per Gestione Coordinamento
```