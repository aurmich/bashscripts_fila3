# Analysis of getListTableColumns Methods

## OrganizzativaTotStabi

### Model Fields (from PHPDoc)
```php
@property int $id
@property int|null $stabi
@property string|null $tot_budget_assegnato
@property string|null $tot_budget_assegnato_min_punteggio
@property string|null $tot_quota_effettiva
@property string|null $tot_quota_effettiva_min_punteggio
@property string|null $tot_resti
@property string|null $tot_resti_min_punteggio
@property string|null $delta
@property string|null $delta_min_punteggio
@property int|null $anno
@property Carbon|null $created_at
@property Carbon|null $updated_at
```

### Current getListTableColumns Fields
1. stabi
2. tot_budget_assegnato
3. tot_budget_assegnato_min_punteggio
4. tot_quota_effettiva
5. tot_quota_effettiva_min_punteggio
6. tot_resti
7. tot_resti_min_punteggio
8. delta
9. delta_min_punteggio
10. anno
11. created_at
12. updated_at

### Analysis
✅ All fields in getListTableColumns exist in the model
✅ No non-existent fields are shown
✅ Column types match model types:
- Numeric fields: stabi, anno
- Decimal fields: tot_budget_assegnato, tot_budget_assegnato_min_punteggio, tot_quota_effettiva, tot_quota_effettiva_min_punteggio, tot_resti, tot_resti_min_punteggio, delta, delta_min_punteggio
- DateTime fields: created_at, updated_at

### Conclusion
The OrganizzativaTotStabi getListTableColumns implementation is correct and does not need modification.

---

## IndividualeAssenze

### Model Fields (from PHPDoc)
```php
@property int $id
@property int|null $tipo
@property int|null $codice
@property string|null $descr
@property int|null $anno
@property Carbon|null $created_at
@property string|null $created_by
@property Carbon|null $updated_at
@property string|null $updated_by
@property string|null $deleted_at
@property string|null $deleted_by
```

### Current getListTableColumns Fields
1. tipo
2. codice
3. descr
4. anno
5. created_at
6. updated_at

### Analysis
✅ All fields in getListTableColumns exist in the model
✅ No non-existent fields are shown
✅ Column types match model types:
- Numeric fields: tipo, codice, anno
- Text fields: descr
- DateTime fields: created_at, updated_at

### Conclusion
The IndividualeAssenze getListTableColumns implementation is correct and does not need modification.

---

## IndividualeDecurtazioneAssenze

### Model Fields (from PHPDoc)
```php
@property int $id
@property int|null $anno
@property Carbon|null $created_at
@property string|null $created_by
@property Carbon|null $updated_at
@property string|null $updated_by
@property float|null $min_perc
@property float|null $max_perc
@property float|null $min_gg_365
@property float|null $max_gg_365
@property float|null $decurtazione_perc
```

### Current getListTableColumns Fields
1. id
2. anno
3. individuale.nome (relationship)
4. min_perc
5. max_perc
6. min_gg_365
7. max_gg_365
8. decurtazione_perc
9. created_at
10. updated_at

### Analysis
❌ The field 'individuale.nome' is shown but there's no clear relationship defined in the model
✅ All other fields exist in the model
✅ Column types match model types:
- Numeric fields: id, anno
- Float fields: min_perc, max_perc, min_gg_365, max_gg_365, decurtazione_perc
- DateTime fields: created_at, updated_at

### Conclusion
The IndividualeDecurtazioneAssenze getListTableColumns needs modification:
1. Remove or properly define the 'individuale.nome' relationship
2. Consider adding proper relationship to Individuale model if needed

---

## OrganizzativaCatCoeff

### Model Fields (from PHPDoc)
```php
@property int $id
@property string|null $lista_propro
@property string|null $coeff
@property string|null $descr
@property string|null $tot_giorni
@property string|null $tot_giorni_pt
@property string|null $tot_giorni_pt_coeff
@property string|null $quota_teorica
@property int|null $anno
@property string|null $created_by
@property string|null $updated_by
@property Carbon|null $created_at
@property Carbon|null $updated_at
@property float|null $tot
```

### Current getListTableColumns Fields
1. name
2. field_name
3. op
4. value
5. anno
6. created_at
7. updated_at

### Analysis
❌ Multiple fields shown do not exist in the model:
- name
- field_name
- op
- value
❌ Important model fields are missing from the list:
- lista_propro
- coeff
- descr
- tot_giorni
- tot_giorni_pt
- tot_giorni_pt_coeff
- quota_teorica
- tot

### Conclusion
The OrganizzativaCatCoeff getListTableColumns needs a complete rewrite to show actual model fields instead of non-existent ones. Here's a suggested implementation:

```php
public function getListTableColumns(): array
{
    return [
        'lista_propro' => Columns\TextColumn::make('lista_propro')
            ->label('Lista Propro')
            ->searchable()
            ->sortable(),
        'coeff' => Columns\TextColumn::make('coeff')
            ->label('Coefficiente')
            ->searchable()
            ->sortable(),
        'descr' => Columns\TextColumn::make('descr')
            ->label('Descrizione')
            ->searchable()
            ->sortable(),
        'tot_giorni' => Columns\TextColumn::make('tot_giorni')
            ->label('Totale Giorni')
            ->numeric()
            ->sortable(),
        'tot_giorni_pt' => Columns\TextColumn::make('tot_giorni_pt')
            ->label('Totale Giorni PT')
            ->numeric()
            ->sortable(),
        'tot_giorni_pt_coeff' => Columns\TextColumn::make('tot_giorni_pt_coeff')
            ->label('Totale Giorni PT Coeff')
            ->numeric()
            ->sortable(),
        'quota_teorica' => Columns\TextColumn::make('quota_teorica')
            ->label('Quota Teorica')
            ->numeric()
            ->sortable(),
        'tot' => Columns\TextColumn::make('tot')
            ->label('Totale')
            ->numeric()
            ->sortable(),
        'anno' => Columns\TextColumn::make('anno')
            ->label('Anno')
            ->numeric()
            ->sortable(),
        'created_at' => Columns\TextColumn::make('created_at')
            ->label('Data Creazione')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
        'updated_at' => Columns\TextColumn::make('updated_at')
            ->label('Ultima Modifica')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
    ];
}
```
