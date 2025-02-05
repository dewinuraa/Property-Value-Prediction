<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href={{ asset('js/tailwind.config.js') }} rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- perintah css untuk modifikasi tampilan --}}
    <style>
        .map { height: 50vh; width: 100vh; }

        .nav-item.active a {
            background-color: #ffffff; /* Warna background saat aktif */
            color: rgb(47, 19, 235); /* Warna teks saat aktif */
        }
    </style>
    
    <title>Prediction</title>
</head>

<body>
    @include('layout.navbar')

    <section>
        @yield('container')
    </section>
    
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    function openModal(id,latitude,longitude) {
        console.log(id,latitude,longitude);
        const combine="myModal_"+id;
        const modal = document.getElementById(combine);

        if (modal) {
            console.log(modal);
            modal.classList.remove('hidden');
            var map_combine="map_"+id;
            console.log(map_combine);
            var map = L.map(map_combine).setView([longitude, latitude], 12);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        var marker = L.marker([longitude, latitude]).addTo(map)
            .bindPopup('Lokasi properti')
            .openPopup();
        }


    }
    function closeModal(id) {
        const combine="myModal_"+id;
        const modal = document.getElementById(combine);
        if (modal) {
            console.log(modal);
            modal.classList.add('hidden');
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var burger = document.querySelector('.navbar-burger');
        var menu = document.querySelector('#menu');

        burger.addEventListener('click', function () {
            menu.classList.toggle('hidden');
        });
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
<script>
    function initMap() {
        var map = L.map('map').setView([-7.2770, 112.812], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var marker = L.marker([-7.2770, 112.812], {
            draggable: true
        }).addTo(map);

        marker.on('dragend', function(e) {
            var latLng = marker.getLatLng();
            document.getElementById('latitude').value = latLng.lat;
            document.getElementById('longitude').value = latLng.lng;
        });
    }
    window.onload = initMap;
</script>
</body>
</body>


{{-- <body>
    @yield('container')
</body> --}}

</html>
