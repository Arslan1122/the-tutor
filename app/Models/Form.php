<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use jazmy\FormBuilder\Models\Form as FormBuilderForm;

class Form extends FormBuilderForm
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'step_id',
        'name',
        'visibility',
        'allows_edit',
        'form_builder_json',
        'identifier',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function getEntriesHeader() : Collection
    {

        return collect($this->form_builder_array)
            ->filter(function ($entry) {
                return ! empty($entry['name']);
            })
            ->map(function ($entry) {
                return [
                    'name' => $entry['name'],
                    'label' => $entry['label'] ?? null,
                    'type' => $entry['type'] ?? null,
                    'score' => $entry['score'] ?? null,
                ];
            });
    }
}
