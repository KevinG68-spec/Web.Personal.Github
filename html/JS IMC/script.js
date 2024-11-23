document.getElementById('imcForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let peso = parseFloat(document.getElementById('peso').value);
    let altura = parseFloat(document.getElementById('altura').value) / 100; // Convertir a metros
    let imc = (peso / (altura * altura)).toFixed(2);
    let resultado = '';

    /* */
    if (imc < 18.5) {
        resultado = `Tu IMC es de: ${imc} <br> Clasificación según la OMS: Bajo <br> Descripción popular: Delgado`;
    } else if (imc >= 18.5 && imc <= 24.9) {
        resultado = `Tu IMC es de: ${imc} <br> Clasificación según la OMS: Adecuado <br> Descripción popular: Aceptable`;
    } else if (imc >= 25.0 && imc <= 29.9) {
        resultado = `Tu IMC es de: ${imc} <br> Clasificación según la OMS: Sobrepeso <br> Descripción popular: Sobrepeso`;
    } else if (imc >= 30.0 && imc <= 34.9) {
        resultado = `Tu IMC es de: ${imc} <br> Clasificación según la OMS: Obesidad Tipo 1 <br> Descripción popular: Obeso`;
    } else if (imc >= 35.0 && imc <= 39.9) {
        resultado = `Tu IMC es de: ${imc} <br> Clasificación según la OMS: Obesidad Tipo 2 <br> Descripción popular: Obeso`;
    } else {
        resultado = `Tu IMC es de: ${imc} <br> Clasificación según la OMS: Obesidad Tipo 3 <br> Descripción popular: Obeso`;
    }

    document.getElementById('resultado').innerHTML = resultado;
});

/* document.getElementById('imcForm')  busca los datos ingresados por el usuario en el html */
/* event.preventDefault();  evita que la pagina se refresque al momento de mandar los datos para usarlo*/
/*  parseFloat(document.getElementById('peso').value) esto es para que busque el valor ingresado en el html del peso*/
/* document.getElementById('resultado').innerHTML = resultado;  esto es para mandar el dato optenido despues del proceso del imc lo manda de nuevo al html en la cual asocia el valor del imc al id de html que se llame igual a lo que esta en el parentesis*/
/* En JavaScript, el evento submit es un evento del formulario que se activa cuando el usuario intenta enviar los datos (en este caso, al hacer clic en el botón "Calcular").
Esto es lo que permite que el código JavaScript "escuche" cuándo el formulario está listo para ser enviado.*/
/* function(event)

    La palabra event dentro de la función es un objeto que contiene información sobre lo que ocurrió cuando el formulario fue enviado. Lo que hace este objeto es capturar detalles del evento que ocurrió (en este caso, el envío del formulario).*/