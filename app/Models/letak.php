<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class letak extends Model
{
    use HasFactory;
    protected $table = 'letaks';
    protected $fillable = ['name', 'no'];
    public function history()
    {
        return $this->hasOne(history::class);
    }
}
