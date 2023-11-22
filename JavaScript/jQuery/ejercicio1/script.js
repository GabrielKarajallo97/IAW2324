function consultarClima() {
    var ciudad = $("#ciudad").val();
    var apiKey = "tu_api_key";
    var url = "https://api.openweathermap.org/data/2.5/weather";

    $.ajax({
        url: url,
        data: {
            q: ciudad,
            appid: apiKey,
            units: "metric"
        },
        success: function (result) {
            mostrarResultado(result);
        },
        error: function (error) {
            $("#resultado").html("Error al consultar el clima.");
        }
    });
}

function mostrarResultado(datosClima) {
    var resultadoHtml = "<h2>Datos del clima para " + datosClima.name + "</h2>";
    resultadoHtml += "<p>Temperatura: " + datosClima.main.temp + "°C</p>";
    resultadoHtml += "<p>Humedad: " + datosClima.main.humidity + "%</p>";
    resultadoHtml += "<p>Descripción del clima: " + datosClima.weather[0].description + "</p>";

    $("#resultado").html(resultadoHtml);
}