var lienzo = document.getElementById('lienzo');
  var formas = ['cuadrado', 'circulo'];
  var tiempoInicio;
  var tiempoReaccion;

  function crearForma() {
    // Crear un elemento div (forma)
    var forma = document.createElement('div');
    forma.classList.add('forma');

    // Configurar estilos y atributos de la forma
    var tipoForma = formas[Math.floor(Math.random() * formas.length)];
    forma.classList.add(tipoForma);

    var lado = Math.floor(Math.random() * 50) + 30; // Tamaño entre 30 y 80
    forma.style.width = lado + 'px';
    forma.style.height = lado + 'px';
    forma.style.backgroundColor = getRandomColor();

    // Posicionar la forma aleatoriamente en el lienzo
    var posX = Math.random() * (lienzo.offsetWidth - lado);
    var posY = Math.random() * (lienzo.offsetHeight - lado);
    forma.style.left = posX + 'px';
    forma.style.top = posY + 'px';

    // Registrar el tiempo de inicio al mostrar la forma
    tiempoInicio = Date.now();

    // Agregar la forma al lienzo
    lienzo.appendChild(forma);

    // Agregar un evento de clic a la forma
    forma.addEventListener('click', function() {
      tiempoReaccion = Date.now() - tiempoInicio;
      alert('¡Tiempo de reacción: ' + tiempoReaccion + ' ms!');
      lienzo.removeChild(forma);
      setTimeout(crearForma, Math.random() * 2000 + 1000); // Nueva forma después de 1-3 segundos
    });
  }

  function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }
  var nombre = prompt('Ingrese su nombre:');
  // Iniciar el juego
  crearForma();