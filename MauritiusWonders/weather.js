
$(document).ready(function() {
    function loadWeather(city) {
  $("#weather").html("Loading weather data...");

  $.ajax({
    url: "getWeather.php",
    type: "POST",
    data: { city: city },
    dataType: "json",
    success: function(data) {
      console.log("Weather data:", data);

      if (data.cod !== 200) {
        $("#weather").html(`Unable to find weather for "${city}"`);
        return;
      }

      const name = data.name || city;
      const temp = data.main?.temp || "N/A";
      const desc = data.weather?.[0]?.description || "Unavailable";
      const icon = data.weather?.[0]?.icon || "";

      $("#weather").html(`
        <strong>${name}</strong><br>
        ${desc}<br>
        <img src="https://openweathermap.org/img/wn/${icon}@2x.png" alt="${desc}" style="width:50px;height:50px;">
        <br>🌡 ${temp}°C
      `);
    },
    error: function() {
      $("#weather").html("Unable to load weather data.");
    }
  });
}
$("#searchWeather").click(function(){
  const city = $("#cityInput").val().trim();
    if(city != ""){
        loadWeather(city);
  }
  else{
    alert("Please enter a valid place")
  }
});
  
});




