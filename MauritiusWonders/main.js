// -------------------- LOAD ACTIVITIES --------------------
function loadActivities() {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      displayActivities(this.responseXML);
    }
  };
  xhttp.open("GET", "generate_activities_xml.php", true);
  xhttp.send();
}

function displayActivities(xml) {
  const activities = xml.getElementsByTagName("activity");
  let output = "";

  for (let i = 0; i < activities.length; i++) {
    const name = activities[i].getElementsByTagName("name")[0].textContent;
    const image = activities[i].getElementsByTagName("image")[0].textContent;
    const source = activities[i].getElementsByTagName("photo_source")[0].textContent;
    const description = activities[i].getElementsByTagName("description")[0].textContent;
    const website = activities[i].getElementsByTagName("website")[0].textContent;

    output += `
      <div class="activity-card">
        <img src="${image}" alt="${name}">
        <h3>${name}</h3>
        <p>${description}</p>
        <p><em style="font-size: 0.9em;">${source}</em></p>
        <a href="${website}" target="_blank" class="activity-link">
          Book from booking.com
        </a>
      </div>
    `;
  }

  document.getElementById("activities-container").innerHTML = output;
}

// -------------------- LOAD CUISINE --------------------
function loadCuisine() {
  fetch("generate_cuisine_json.php")
    .then(response => response.json())
    .then(data => displayCuisine(data));
}

function displayCuisine(data) {
  let output = "";
  data.cuisine.forEach(item => {
    output += `
      <div class="cuisine-card">
        <img src="${item.image}" alt="${item.name}">
        <h3>${item.name}</h3>
        <p>${item.description}</p>
        <p><strong>Restaurant:</strong> ${item.restaurant}</p>
        <p><strong>Dish Tried:</strong> ${item.dish_tried}</p>
      </div>
    `;
  });

  document.getElementById("cuisine-container").innerHTML = output;
}

// -------------------- AUTO LOAD --------------------
document.addEventListener("DOMContentLoaded", () => {
  if (document.getElementById("activities-container")) loadActivities();
  if (document.getElementById("cuisine-container")) loadCuisine();
});



// --- DEBUG CAROUSEL ---
window.addEventListener("load", () => {
  const carousels = document.querySelectorAll(".carousel");
  console.log("Found carousels:", carousels.length);

  carousels.forEach((carousel, cIndex) => {
    const imgs = carousel.querySelectorAll(".carousel-image");
    console.log(`Carousel ${cIndex} has ${imgs.length} images`);

    if (imgs.length < 2) return; // skip if not enough images

    let i = 0;

    const rotate = () => {
      if (!imgs.length) return;

      // ensure indexes are valid
      if (!imgs[i]) {
        console.warn(` Carousel ${cIndex}: invalid current index ${i}`);
        i = 0;
        return;
      }

      const nextIndex = (i + 1) % imgs.length;

      // extra safety check
      if (!imgs[nextIndex]) {
        console.warn(` Carousel ${cIndex}: invalid next index ${nextIndex}`);
        i = 0;
        return;
      }

      // remove .active from all images first (avoids conflicts)
      imgs.forEach(img => img.classList.remove("active"));

      // add .active to the next image safely
      imgs[nextIndex].classList.add("active");
      i = nextIndex;
    };

    // run safely only if all images exist
    if (imgs.length > 0) {
      imgs[0].classList.add("active"); // make sure first is active
      setInterval(rotate, 3000);
    }
  });
});





