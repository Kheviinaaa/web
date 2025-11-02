    // Load HOTELS from JSON Web Service (generate_hotels_json.php)
function loadHotels() {
    fetch("http://localhost/MauritiusWonders/get_hotel.php")
        .then(response => response.json())
        .then(data => displayHotels(data))
        .catch(error => console.error("Error loading hotels:", error));
}

function displayHotels(data) {
    let output = "";
    data.hotels.forEach(item => {
        output += `
            <div class="hotel-card">
                <img src="${item.image}" alt="${item.name}">
                <h3>${item.name}</h3>
                <p class="stars">${item.rating}</p>
                <p>${item.description}</p>
                <p><em>${item.photo_source}</em></p>
                <a href=${item.website} target="_blank" class="hotel-link">Visit Website</a>
                <br>
                <a href=${item.book} target="_blank" class="hotel-link" style="background-color: green;">Book on booking.com</a>
            </div>
        `;
    });
    document.getElementById("hotels-container").innerHTML = output;
}

// Auto-run only on hotel page
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("hotels-container")) {
        loadHotels();
    }
});



    