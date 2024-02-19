<?php declare(strict_types=1);

use App\Livewire\Plant\PlantTable;
use App\Models\Plant;
use Livewire\Livewire;

//? PlantTable : add
test('add', function(){
    $plant = Plant::factory()->create();
    $plant = Plant::find($plant->id);

    Livewire::test(PlantTable::class)
        ->call('add', $plant->id)
        ->assertSet('selected', [$plant]);
});

//? PlantTable : remove
test('remove', function(){
    $plant = Plant::factory()->create();
    $plant = Plant::find($plant->id);

    Livewire::test(PlantTable::class)
        ->call('add', $plant->id)
        ->call('remove', $plant->id)
        ->assertSet('selected', []);
});

//? PlantTable : water
test('water', function(){
    $plant = Plant::factory()->create(['watered_at' => '1987-01-12 00:00:00']);
    $this->assertEquals('1987-01-12 00:00:00', $plant->watered_at);

    Livewire::test(PlantTable::class)->call("add", $plant->id);
    Livewire::test(PlantTable::class)->call("water");

    $plant = Plant::find($plant->id);
    $this->assertEquals("12.01.1987", date('d.m.Y', strtotime($plant->watered_at)));
});
