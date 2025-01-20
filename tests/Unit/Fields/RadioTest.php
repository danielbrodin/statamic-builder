<?php

use Tdwesten\StatamicBuilder\Enums\VisibilityOption;

it('can render to a array', function (): void {
    $field = new \Tdwesten\StatamicBuilder\FieldTypes\Radio('title');
    $field->displayName('Display Name')
        ->instructions('Enter the title')
        ->visibility(VisibilityOption::Hidden)
        ->required()
        ->instructionsPosition('below')
        ->listable()
        ->replicatorPreview(true)
        ->width(50);

    expect($field->toArray()['field']['display'])->toBe('Display Name');

    expect($field->toArray()['field']['instructions'])->toBe('Enter the title');

    expect($field->toArray()['field']['visibility'])->toBe('hidden');

    expect($field->toArray()['field']['validate'])->toBe(['required']);

    expect($field->toArray()['field']['instructions_position'])->toBe('below');

    expect($field->toArray()['field']['listable'])->toBe(true);

    expect($field->toArray()['field']['replicator_preview'])->toBe(true);

    expect($field->toArray()['field']['width'])->toBe(50);
});

it('can have options', function (): void {
    $field = new \Tdwesten\StatamicBuilder\FieldTypes\Radio('title');
    $field->options([
        'one' => 'One',
        'two' => 'Two',
    ]);

    expect($field->toArray()['field']['options'])->toBe(['one' => 'One', 'two' => 'Two']);
});

it('can be inline', function (): void {
    $field = new \Tdwesten\StatamicBuilder\FieldTypes\Radio('title');
    $field->inline();

    expect($field->toArray()['field']['inline'])->toBe(true);
});

it('can cast booleans', function (): void {
    $field = new \Tdwesten\StatamicBuilder\FieldTypes\Radio('title');
    $field->castBooleans();

    expect($field->toArray()['field']['cast_booleans'])->toBe(true);
});
