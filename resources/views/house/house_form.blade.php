<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('house_store') }}" method="post">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="nom" :value="__('nom')" />

                            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom"
                                {{-- required autocomplete="current-password" /> --}} required />

                            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="ville" :value="__('ville')" />

                            <x-text-input id="ville" class="block mt-1 w-full" type="text" name="ville"
                                {{-- required autocomplete="current-password" /> --}} required />

                            <x-input-error :messages="$errors->get('ville')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="commune" :value="__('commune')" />

                            <x-text-input id="commune" class="block mt-1 w-full" type="text" name="commune"
                                {{-- required autocomplete="current-password" /> --}} required />

                            <x-input-error :messages="$errors->get('commune')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="quartier" :value="__('quartier')" />

                            <x-text-input id="quartier" class="block mt-1 w-full" type="text" name="quartier"
                                {{-- required autocomplete="current-password" /> --}} required />

                            <x-input-error :messages="$errors->get('quartier')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="avenue" :value="__('avenue')" />

                            <x-text-input id="avenue" class="block mt-1 w-full" type="text" name="avenue"
                                {{-- required autocomplete="current-password" /> --}} required />

                            <x-input-error :messages="$errors->get('avenue')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="numero" :value="__('numero')" />

                            <x-text-input id="numero" class="block mt-1 w-full" type="number" name="numero"
                                {{-- required autocomplete="current-password" /> --}} required />

                            <x-input-error :messages="$errors->get('numero')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <div id="map">
                                {{-- ici sera ma carte --}}
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('submit') }}
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        console.log("initialisation de la carte");
        var corner = [0, 0]

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);


        } else {
            console.log("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {
            console.log("Latitude: " + position.coords.latitude +
                " Longitude: " + position.coords.longitude);

        }
        var map = L.map('map').setView([-1.6838180278409376, 29.23478314030846], 13);
        console.log(navigator.geolocation.getCurrentPosition(position => position.coords.longitude))

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker(-1.6838180278409376, 29.23478314030846).addTo(map)
            .bindPopup('A pretty CSS popup.<br> Easily customizable.')
            .openPopup();
        L.circle(-1.6838180278409376, 29.23478314030846, {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 50
        }).addTo(map);
        // const map = L.map('map').setView([51.505, -0.09], 13);

        // Ajoutez le contrôle de géolocalisation à la carte
        L.Control.Geolocation().addTo(map);

        // Écoutez les changements de position
        map.on('locationchange', e => {
            // Affichez la nouvelle position dans la console
            console.log(e.latlng);
        });
    </script> --}}

    {{-- <script>
        var corner = [0, 0]

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);


        } else {
            console.log("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {
            console.log("Latitude: " + position.coords.latitude +
                " Longitude: " + position.coords.longitude);
            corner[0] = position.coords.latitude
            corner[1] = position.coords.longitude
            console.log(corner);
            let lat = corner[0];
            let long = corner[1];


            var map = L.map('map').setView([lat, long], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([corner[0], corner[1]]).addTo(map)
                .bindPopup('A pretty CSS popup.<br> Easily customizable.')
                .openPopup();
            L.circle([corner[0], corner[1]], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 50
            }).addTo(map);
            var popup = L.popup();

            function onMapClick(e) {
                popup
                    .setLatLng(e.latlng)
                    .setContent("You clicked the map at " + e.latlng.toString())
                    .openOn(map);
            }

            map.on('click', onMapClick);
        }
    </script> --}}
    {{-- <script>
        let map, markers = [];
        /* ----------------------------- Initialize Map ----------------------------- */
        function initMap() {
            map = L.map('map', {
                center: {
                    lat: 28.626137,
                    lng: 79.821603,
                },
                zoom: 15
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            map.on('click', mapClicked);
            initMarkers();
        }
        initMap();

        /* --------------------------- Initialize Markers --------------------------- */
        function initMarkers() {
            const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

            for (let index = 0; index < initialMarkers.length; index++) {

                const data = initialMarkers[index];
                const marker = generateMarker(data, index);
                marker.addTo(map).bindPopup(`<b>${data.position.lat},  ${data.position.lng}</b>`);
                map.panTo(data.position);
                markers.push(marker)
            }
        }

        function generateMarker(data, index) {
            return L.marker(data.position, {
                    draggable: data.draggable
                })
                .on('click', (event) => markerClicked(event, index))
                .on('dragend', (event) => markerDragEnd(event, index));
        }

        /* ------------------------- Handle Map Click Event ------------------------- */
        function mapClicked($event) {
            console.log(map);
            console.log($event.latlng.lat, $event.latlng.lng);
        }

        /* ------------------------ Handle Marker Click Event ----------------------- */
        function markerClicked($event, index) {
            console.log(map);
            console.log($event.latlng.lat, $event.latlng.lng);
        }

        /* ----------------------- Handle Marker DragEnd Event ---------------------- */
        function markerDragEnd($event, index) {
            console.log(map);
            console.log($event.target.getLatLng());
        }
    </script> --}}
</x-app-layout>
