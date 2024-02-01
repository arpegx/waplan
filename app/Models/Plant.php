<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'watered_at',
    ];

    public function water(){
        $this->update([ 'watered_at' => now() ]);
    }
}
