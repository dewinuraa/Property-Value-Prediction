<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $table = 'histories';
    protected $fillable = [
        'km_tidur',
        'km_mandi',
        'row_jalan',
        'peruntukan_id',
        'bentuk_id',
        'letak_id',
        'luas_tanah',
        'luas_bangunan',
        'longitude',
        'latitude',
        'hasil_prediksi',
    ];
    public function bentuk()
    {
        return $this->belongsTo(bentuk::class, 'bentuk_id');
    }
    public function peruntukan()
    {
        return $this->belongsTo(peruntukan::class, 'peruntukan_id');
    }
    public function letak()
    {
        return $this->belongsTo(letak::class, 'letak_id');
    }
}
