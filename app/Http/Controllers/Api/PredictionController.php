<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client; 
use App\Models\history;
use App\Models\peruntukan;
use App\Models\bentuk;
use App\Models\letak;

class PredictionController extends Controller
{
    //
    public function prediction(Request $request)
    {
        // validasi input untuk model
        $validatedData = $request->all();
    
        $data_input = [
            'km.tidur' => $validatedData['km_tidur'],
            'km.mandi' => $validatedData['km_mandi'],
            'row jalan (m)' => $validatedData['row_jalan'],
            'peruntukan' => $validatedData['peruntukan'],
            'bentuk' => $validatedData['bentuk'],
            'letak' => $validatedData['letak'],
            'luas tanah (m2)' => $validatedData['luas_tanah'],
            'luas bangunan (m2)' => $validatedData['luas_bangunan'],
            'longitude' => $validatedData['longitude'],
            'latitude' => $validatedData['latitude'],


        ];



        $client = new Client();
        $response = $client->request('POST', 'http://127.0.0.1:5000/prediction', [
            'json' => $data_input
        ]);

        // penyimpanan database


        $predictedPrice = json_decode($response->getBody(), true);
        $peruntukan_id = peruntukan::where('no', $data_input['peruntukan'])->first();
        $bentuk_id = bentuk::where('no', $data_input['bentuk'])->first();
        $letak_id = letak::where('no', $data_input['letak'])->first();
        // dd($peruntukan_id);
        history::create([
            'km_tidur' => $data_input['km.tidur'],
            'km_mandi' => $data_input['km.mandi'],
            'row_jalan' => $data_input['row jalan (m)'],
            'peruntukan_id' => $peruntukan_id->id,
            'bentuk_id' => $bentuk_id->id,
            'letak_id' => $letak_id->id,
            'luas_tanah' => $data_input['luas tanah (m2)'],
            'luas_bangunan' => $data_input['luas bangunan (m2)'],
            'longitude' => $data_input['longitude'],
            'latitude' => $data_input['latitude'],
            'hasil_prediksi' => $predictedPrice,
            'created_at' => now(),
        ]);
        // Kirim response dengan harga prediksi
        return response()->json([
            'message' => 'Harga properti prediksi',
            'predicted_price' => $predictedPrice
        ]);
    }
}
