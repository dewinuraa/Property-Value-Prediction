<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peruntukan extends Model
{
    use HasFactory;
    protected $table = 'peruntukans';
    protected $fillable = ['name', 'no'];
    public function history()
    {
        return $this->hasOne(history::class);
    }
}
