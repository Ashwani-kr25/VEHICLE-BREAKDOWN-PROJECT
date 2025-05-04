<?php
include("navbar.php");
?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<title>CONTACT</title>
   <style>
        .container2{
            background-color:orangered;
      
        }
        .container2 ul li a{
            color:black;
            font-size:20px;
        }
        .serimg{
            background-image: url("pic3.jpg");}
        
        #map {
            height: 500px;
            width: 95%;
            margin-left:40px;
            margin-top:870px;
        }
    
        </style>

        <div class="serimg">
      <h2>CONTACT US</h2>
    </div>
    <div class="contact">
     <div class="conbox">
     <i class="fa-solid fa-map-location-dot"></i>
     <h3>ADDRESS</h3>
     <P>Book Now Pvt. Ltd.</P>
     <p>3rd floor ,chirkunda,Dhanbad,Jharkhand,82800
     </p>
     </div>
     <div class="conbox">
     <i class="fa-solid fa-phone-volume"></i>
     <h3>24/7 Helpline</h3>
     <p>011-229339</p>
     <p>011-234565</p>
        </div>
        <div class="conbox">
        <i class="fa-solid fa-envelope"></i>
        <h3>Email Us</h3>
        <p>enquiry@gmail.com</p>
        </div>

        
    </div>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        function initMap(lat, lon) {
            const map = L.map('map').setView([lat, lon], 14);

            // Load OSM tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Your location marker
            L.marker([lat, lon]).addTo(map).bindPopup("<b>YOU ARE HERE!</b>").openPopup();

            // Overpass API query for petrol pumps
            const query = `
                [out:json];
                (
                  node["amenity"="fuel"](around:50000,${lat},${lon});
                  way["amenity"="fuel"](around:50000,${lat},${lon});
                  relation["amenity"="fuel"](around:500000,${lat},${lon});
                );
                out center;
            `;

            fetch("https://overpass-api.de/api/interpreter", {
                method: "POST",
                body: new URLSearchParams({ data: query })
            })
            .then(res => res.json())
            .then(data => {
                const pumps = data.elements;
                if (pumps.length === 0) {
                    alert("No petrol pumps found nearby.");
                }
                pumps.forEach(p => {
                    const pumpLat = p.lat || (p.center && p.center.lat);
                    const pumpLon = p.lon || (p.center && p.center.lon);
                    const name = p.tags && p.tags.name ? p.tags.name : "Unnamed Fuel Station";

                    if (pumpLat && pumpLon) {
                        L.marker([pumpLat, pumpLon])
                          .addTo(map)
                          .bindPopup(`<b>${name}</b>`);
                    }
                });
            })
            .catch(err => {
                console.error("Error fetching petrol pumps:", err);
                alert("Failed to fetch petrol pumps.");
            });
        }

        // Get user's current location
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    initMap(lat, lon);
                },
                (error) => {
                    alert("Location access denied or unavailable. Using default location.");
                    // Default to New Delhi if location blocked
                    initMap(28.6139, 77.2090);
                }
            );
        } else {
            alert("Geolocation not supported by your browser.");
            initMap(28.6139, 77.2090); // New Delhi fallback
        }
    </script>

 <footer style="width:100%;margin-top:10px">
   <p>ONROAD VEHICLE BREAKDOWN HELP ASSISTANT</p>
</footer> 