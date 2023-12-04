import './bootstrap';

import Alpine from 'alpinejs';


// import L from leaflet;

// const map = L.map('map').setView([-1.6838180278409376, 29.23478314030846], 13);

// Ajoutez le contrôle de géolocalisation à la carte
// L.Control.Geolocation().addTo(map);

// Écoutez les changements de position
// map.on('locationchange', e => {
//   // Affichez la nouvelle position dans la console
//   console.log(e.latlng);
// });

// L.marker(-1.6838180278409376, 29.23478314030846).addTo(map)
//             .bindPopup('A pretty CSS popup.<br> Easily customizable.')
//             .openPopup();
//         L.circle(0, 1, {
//             color: 'red',
//             fillColor: '#f03',
//             fillOpacity: 0.5,
//             radius: 50
//         }).addTo(map);


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
