// script.js

document.getElementById('convertidorForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenimos que el formulario recargue la página

    // Obtener los valores del formulario
    let tipoConversion = document.getElementById('tipoConversion').value;
    let valorTemperatura = parseFloat(document.getElementById('valorTemperatura').value);
    let resultado = '';

    // Verificar si el valor es válido
    if (isNaN(valorTemperatura)) {
        resultado = "Por favor ingrese un valor de temperatura válido.";
    } else {
        switch(tipoConversion) {
            case 'CelsiusFahrenheit':
                resultado = `${valorTemperatura}°C = ${(valorTemperatura * 9/5 + 32).toFixed(2)}°F`;
                break;
            case 'CelsiusKelvin':
                resultado = `${valorTemperatura}°C = ${(valorTemperatura + 273.15).toFixed(2)}K`;
                break;
            case 'CelsiusRankine':
                resultado = `${valorTemperatura}°C = ${((valorTemperatura + 273.15) * 9/5).toFixed(2)}°R`;
                break;
            case 'FahrenheitCelsius':
                resultado = `${valorTemperatura}°F = ${((valorTemperatura - 32) * 5/9).toFixed(2)}°C`;
                break;
            case 'FahrenheitKelvin':
                resultado = `${valorTemperatura}°F = ${((valorTemperatura + 459.67) * 5/9).toFixed(2)}K`;
                break;
            case 'FahrenheitRankine':
                resultado = `${valorTemperatura}°F = ${(valorTemperatura + 459.67).toFixed(2)}°R`;
                break;
            case 'KelvinCelsius':
                resultado = `${valorTemperatura}K = ${(valorTemperatura - 273.15).toFixed(2)}°C`;
                break;
            case 'KelvinFahrenheit':
                resultado = `${valorTemperatura}K = ${((valorTemperatura * 9/5) - 459.67).toFixed(2)}°F`;
                break;
            case 'RankineCelsius':
                resultado = `${valorTemperatura}°R = ${((valorTemperatura - 491.67) * 5/9).toFixed(2)}°C`;
                break;
            default:
                resultado = "Por favor selecciona una opción válida.";
        }
    }

    // Mostrar el resultado en el div con id 'resultado'
    document.getElementById('resultado').textContent = resultado;
});
