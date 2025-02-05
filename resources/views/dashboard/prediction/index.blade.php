@extends('layout.main')
@section('container')
    <div class=" grid grid-cols-1 sm:grid-cols-4 md:grid-cols-4">
        {{-- <a>haii</a> --}}
        <div class=" col-span-2 m-4 ">
            <div>
                <label class="font-bold">Required information</label>
                <br>
                <a class="text-red-500">Please input the data below!</a>
            </div>
            {{-- form prediction --}}
            <form id="formprediction">

                <div class=" p-2   grid grid-cols-2 gap-3 ">
                    <div>
                        <label for="Kamar Tidur"> Bedroom </label>
                        <input type="text" class="w-full border rounded-md border-black h-8"
                            placeholder="Quantity of bedrooms" id="kamar_tidur">
                        <p class="text-red-500 text-xs">Value of Bedrooms must be a number (1-10)</p>
                    </div>
                    <div>
                        <label for="Kamar mandi"> Bathroom </label>
                        <input type="text" class="w-full border rounded-md border-black h-8"
                            placeholder="Quantity of bathrooms" id="kamar_mandi">
                        <p class="text-red-500 text-xs">Value of Bathrooms must be a number (1-10)</p>
                    </div>
                    <div>
                        <label for="Luas Tanah"> Land Area (m2) </label>
                        <input type="text" class="w-full border rounded-md border-black h-8" placeholder="Land area"
                            id="luas_tanah" onchange="validasi()">
                        <p class="text-red-500 text-xs">Value of Land Area must be a number (1-1000)</p>
                    </div>
                    <div>
                        <Label for="Luas Bangunan"> Building Area (m2)</Label>
                        <label id="luasb"></label>
                        <input type="text" class="w-full border rounded-md border-black h-8" placeholder="Building Area"
                            id="luas_bangunan" onchange="validasi()">
                        <p class="text-red-500 text-xs">Value of Building Area must be a number (1-1000)</p>
                    </div>


                    {{-- form input peruntukan --}}
                    <div>
                        <label for="Peruntukan"> Designation </label>
                        <select class="w-full border rounded-md border-black h-8" id="peruntukan">
                            <option value="">Choose Designation</option>
                            @foreach ($peruntukans as $peruntukan)
                                <option value="{{ $peruntukan->no }}">{{ $peruntukan->name }}</option>
                            @endforeach
                            {{-- <option value="1">Komersil</option>
                            <option value="2">PeRumah Tinggalan</option>
                            <option value="3">Pemukiman</option>
                            <option value="4">Perumahan</option>
                            <option value="5">Zona Hutan Lindung</option>
                            <option value="6">Zona Industri</option>
                            <option value="7">Zona Lindung Lainnya</option>
                            <option value="8">Zona PeRumah Tinggalan</option>
                            <option value="9">Zona Perdagangan dan Jasa</option>
                            <option value="10">Zona Perlindungan Setempat</option>
                            <option value="11">Zona Perumahan</option>
                            <option value="12">Zona Peruntukan Lainnya</option>
                            <option value="13">Zona Ruang Terbuka Hijau</option>
                            <option value="14">Zona Sarana Pelayanan Umum</option> --}}
                        </select>
                    </div>
                    {{-- form input bentuk --}}
                    <div>
                        <label for="Bentuk"> Shape Poperty </label>
                        <select class="w-full border rounded-md border-black h-8" id="bentuk">
                            <option value="">Choose Shape</option>
                            @foreach ($bentuks as $bentuk)
                                <option value="{{ $bentuk->no }}">{{ $bentuk->name }}</option>
                            @endforeach
                            {{-- <option value="1">Lainnya</option>
                            <option value="2">Persegiempat</option>
                            <option value="3">Persegipanjang</option>
                            <option value="4">Tidak Beraturan</option> --}}
                        </select>
                    </div>
                    {{-- form input letak --}}
                    <div>
                        <label for="Letak"> Location </label>
                        <select class="w-full border rounded-md border-black h-8" id="letak">
                            <option value="">Choose Location</option>
                            @foreach ($letaks as $letak)
                                <option value="{{ $letak->no }}">{{ $letak->name }}</option>
                            @endforeach
                            {{-- <option value="1">Kuldesak</option>
                            <option value="2">Sudut (Corner)</option>
                            <option value="3">Tusuk Sate</option> --}}
                        </select>
                    </div>
                    {{-- form input row jalan --}}
                    <div>
                        <label for="row jalan"> Front road width</label>
                        <input type="text" class="w-full border rounded-md border-black h-8" placeholder="Front road width"
                            id="row_jalan">
                        <p class="text-red-500 text-xs">Value of Front road width must be a number (1-20)</p>
                    </div>
                    <div>
                        <label for="longitude"> Longitude </label>
                        <input type="text" class="w-full border rounded-md border-black h-8" placeholder=" Longtitude"
                            id="longitude">
                        <p class="text-red-500 text-xs">Longitude must be a number (ex : 112.7398) </p>
                    </div>
                    <div>
                        <label for="Latitude"> Latitude </label>
                        <input type="text" class="w-full border rounded-md border-black h-8" placeholder=" Latitude"
                            id="latitude">
                        <p class="text-red-500 text-xs">Latitude must be a number (ex : -7.3007)</p>
                    </div>
                    <div id="map" style="height: 400px; width: 600px;"></div>
                </div>

                {{-- <br> --}}
                <div class="flex justify-center items-center w-full lg:flex lg:w-auto mt-6">

                    <button type="submit" class="bg-blue-700 w-40 h-10  border rounded-md text-white">Predicted</button>
                </div>

            </form>
        </div>
        <div class="col-span-2 ">
            <div class="p-6 text-center">

                <h3 class="text-3xl font-bold">Prediction Result</h3>
                <div class="mt-6 grid grid-rows-1 gap-4">
                    <a>Predicted Value of your Property as follows:</a>
                    <h3 class="text-3xl font-bold" id="prediksi">Rp 0</h3>
                    <a>The above price is the total price of the property</a>
                    <div>
                        <button class="bg-blue-700 w-40 h-10  border rounded-md text-white" onclick="reset()">Back Prediction</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#formprediction').on('submit', function(e) {
                e.preventDefault(); //untuk memberhentikan default submit pada form
                var formData = { //untuk menyimpan variable yang dibutuhkan dln melakukan prediksi
                    km_tidur: $('#kamar_tidur').val(),
                    km_mandi: $('#kamar_mandi').val(),
                    row_jalan: $('#row_jalan').val(),
                    peruntukan: $('#peruntukan').val(),
                    bentuk: $('#bentuk').val(),
                    letak: $('#letak').val(),
                    luas_tanah: $('#luas_tanah').val(),
                    luas_bangunan: $('#luas_bangunan').val(),
                    longitude: $('#longitude').val(),
                    latitude: $('#latitude').val(),
                }
                console.log(formData);

                $.ajax({
                    type: "POST",
                    url: "http://127.0.0.1:8000/api/prediction",
                    data: JSON.stringify(formData),
                    contentType: "application/json",
                    headers: {
                        'Access-Control-Allow-Origin': '*',
                        'Access-Control-Allow-Methods': 'GET, POST, OPTIONS, PUT, PATCH, DELETE',
                        'Access-Control-Allow-Headers': 'X-Requested-With,content-type',
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),


                    },
                    success: function(data) {
                        const rupiah = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(data.predicted_price);
                        $('#prediksi').text(rupiah);
                        console.log(data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });

        function reset() {
            $('#kamar_tidur').val('');
            $('#kamar_mandi').val('');
            $('#row_jalan').val('');
            $('#peruntukan').val('');
            $('#bentuk').val('');
            $('#letak').val('');
            $('#luas_tanah').val('');
            $('#luas_bangunan').val('');
            $('#longitude').val('');
            $('#latitude').val('');
            $('#prediksi').text('Rp 0');
        }

        function validasi() {
            var luas_bangunan = $('#luas_bangunan').val();
            var luas_tanah = $('#luas_tanah').val();

            if (luas_bangunan > luas_tanah * 3) {
                $('#luas_bangunan').css({
                    'border': '2px solid red'
                });
                $('#luasb').text('warning : Luas bangunan tidak boleh lebih dari 3 kali luas tanah').css({
                    'color': 'red',
                    'font-size': '10px',
                    'display': 'block'

                });
            }else{
                $('#luasb').text('');

                $('#luas_bangunan').css({
                    'background-color': 'white',
                    'border': '2px solid grey'
                }); 
            }
            console.log(luas_bangunan);
        }
    </script>
@endsection
