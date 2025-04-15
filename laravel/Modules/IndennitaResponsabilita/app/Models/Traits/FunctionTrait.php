<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Models\Traits;

use Illuminate\Support\Arr;
use Modules\IndennitaResponsabilita\Models\Rating;

// use Laravel\Scout\Searchable;
// ----- models------

// ------ ext models---

// ----- services -----

// ------ traits ---

trait FunctionTrait
{
    public function msg(string $type): string
    {
        $msg = $this->messages()->firstOrCreate(['type' => $type], ['anno' => $this->anno, 'txt' => $type.' '.$this->anno, 'title' => $type.' '.$this->anno]);
        if (! \is_object($msg)) {
            /*

            return (object) ['title' => $err, 'txt' => $err];
            */
            $err = 'aggiungere ['.$type.'] ad messages';

            return '<h3 style="color:darkred">'.$err.'</h3>';
        }

        return nl2br((string) $msg->txt);
    }

    public function criterioRoot()
    {
        $criterio = $this->messages()
            ->firstOrCreate([
                'type' => 'criterio',
                'parent_id' => null,
            ]);

        return $criterio;
    }

    public function getRatings()
    {
        $rows = Rating::withExtraAttributes(['anno' => $this->anno])->get();
        $ids = $rows->modelKeys();
        $this->ratings()->syncWithoutDetaching($ids);
        $ratings = $this->ratings->keyBy('id');

        return $ratings;
    }

    public function getRatingsRules(string $prefix, string $postfix): array
    {
        $rows = Rating::withExtraAttributes(['anno' => $this->anno])->get();
        $rules = $rows->pluck('rule.value', 'id')->toArray();
        $rules = Arr::prependKeysWith($rules, $prefix);
        $res = [];
        foreach ($rules as $k => $v) {
            // $k1=$k.'.pivot.value';
            $k1 = $k.$postfix;
            $res[$k1] = (string) $v;
        }

        // $rules= Arr::appendKeysWith($rules,'.value');
        return $res;
    }

    public function getRatingsValidationAttributes(string $prefix, string $postfix): array
    {
        $rows = Rating::withExtraAttributes(['anno' => $this->anno])->get();
        $res = [];
        foreach ($rows as $row) {
            $k1 = $prefix.$row->id.$postfix;
            $res[$k1] = $row->title;
        }

        return $res;
    }
}
