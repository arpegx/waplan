<?php declare(strict_types=1);

use App\Models\Plant;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

//? plants.table
test('plants.table', function(){ $this->get('/')->assertStatus(200); });

//? plants.create 
test('plants.create', function(){ $this->get('/plants/create')->assertStatus(200); });

//? plants.store
test('plants.store', function(){
    Storage::fake('avatars');
    $file = UploadedFile::fake()->image('avatar.jpg');

    $response = $this->post('/plants', [
        'name' => 'PlantName',
        'watered_at' => now(),
        'avatar' => $file,
    ]);
    
    expect(Plant::latest()->first())
    ->toMatchArray([
        'name' => 'PlantName', 
        'watered_at' => now(),
        'image' => "./storage/images/plant/PlantName.jpg",
    ]);

    $response->assertRedirectToRoute('plant.table'); 
});

//? plants.show
test('plants.show', function(){
    $plant = Plant::factory()->create();
    $this->get("/plants/$plant->id")->assertStatus(200); 
});

//? plants.edit
test('plants.edit', function(){ 
    $plant = Plant::factory()->create();
    $this->get("/plants/$plant->id/edit")->assertStatus(200); 
});

//? plants.update
test('plants.update', function(){
    $plant = Plant::factory()->create([
        'name' => 'name',
        'botanical' => 'botanical',
    ]);

    $response = $this->put("/plants/$plant->id", [
        'name' => 'changed',
        'botanical' => 'changed',
    ]);

    expect(Plant::find($plant->id))
    ->toMatchArray([
        'name' => 'changed',
        'botanical' => 'changed'
    ]);

    $response->assertRedirectToRoute('plant.table');
});

//? plants.
test('plants.destroy', function(){
    $plant = Plant::factory()->create();

    $response = $this->delete("/plants/$plant->id");

    $response->assertStatus(302);
    $this->assertDatabaseMissing('plants', $plant->toArray());

    $response->assertRedirectToRoute('plant.table');
});