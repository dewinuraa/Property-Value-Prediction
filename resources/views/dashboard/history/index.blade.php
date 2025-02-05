@extends('layout.main')
@section('container')
    <div class="">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-4">Property History</h1>
            <div class="h-40 w-60 rounded-md bg-blue-700 shadow-xl p-4 text-white">
                <h1>Total Historical Data</h1>

                <div class=" w-full h-20 rounded-md flex items-center justify-center">
                    <h1 class="text-4xl font-bold">{{ $history->count() }}</h1>
                </div>
            </div>

            {{-- <div class="box-border rounded-md w-30 h-40  mb-4 mt-4">
            </div> --}}

        </div>
        <div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Designation
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Shape
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Building area
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Land area
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Prediction result
                            </th>
                            <th scope="col" class="px-6 py-3"></th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $histori)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $histori->peruntukan->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $histori->bentuk->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $histori->letak->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $histori->luas_bangunan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $histori->luas_tanah }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ number_format($histori->hasil_prediksi, 0, ',', '.') }}
                                </td>
                                <td>
                                    <button id="openModal_{{ $histori->id }} " class="bg-blue-500 text-white px-4 py-2 rounded" onclick="openModal({{ $histori->id }},{{ $histori->longitude }},{{ $histori->latitude }})">Location</button>
                                    <div id="myModal_{{ $histori->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center">
                                        <div class="bg-white p-6 rounded shadow-md">
                                            <div id="map_{{ $histori->id }}" class="map"></div>
                                            <h3 class="text-lg font-semibold">Property location details : </h3>
                                            <p class="mt-4">Longitude : {{ $histori->longitude }}</p> 
                                            <p class="mt-4">Latitude : {{ $histori->latitude }}</p>
                                            <div>
                                               
                                            </div>
                                            <p class="mt-4">Road Row : {{ $histori->row_jalan }}</p>
                                            <p class="mt-4">Quantity of Bedrooms : {{ $histori->km_mandi }}</p>
                                            <p class="mt-4">Quantity of Bathrooms : {{ $histori->km_tidur }}</p>
                                            <p class="mt-4">Land Area : {{ $histori->luas_tanah }}</p>
                                            <p class="mt-4">Building Area : {{ $histori->luas_bangunan }}</p>
                                            <button id="closeModal_{{ $histori->id }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded " onclick="closeModal({{ $histori->id }})">Close</button>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        
        
  
    </div>
@endsection
