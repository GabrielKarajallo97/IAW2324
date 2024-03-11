//variables
const formulario = document.querySelector('#formulario');
const listaTweets = document.querySelector('#lista-tweets');

let tweets = [];

//event listeners
eventListeners();

function eventListeners(){
    //cuando el usuario agrega un nuevo tweet
    formulario.addEventListener('submit', agregarTweet);
    
    //cuando el documento esta listo
    document.addEventListener('DOMContentLoaded', () => {
        tweets = JSON.parse( localStorage.getItem('tweets') || [] );
        console.log(tweets);

        crearHTML();
    })
}

//funciones
function agregarTweet(e){
    e.preventDefault();

    //text area donde el usuario escribe
    const tweet = document.querySelector('#tweet').value;

    //validacion
    if(tweet === ''){
        mostrarError('El mensaje no puede ir vacio');
        return; //previene que se sigan ejecutando mas lineas de cogigo
    }

    const tweetObj = {
        id: Date.now(),
        tweet
    }    

    //añadir al arreglo de tweets
    tweets = [...tweets, tweetObj];
    console.log(tweets);
    //Una vez agregado crear html
    crearHTML();
}
 

//mostrar mensaje de error
function mostrarError(error){
    const mensajeError = document.createElement('p');
    mensajeError.textContent = error;
    mensajeError.classList.add('error');


    //insertarlo en el contenido
    const contenido = document.querySelector(('#contenido'));
    contenido.appendChild(mensajeError);

    //elimina la alerta despues de 2 segundos
    setTimeout(() => {
        mensajeError.remove();
    }, 1500);
}

// //muestra listado de tweets
function crearHTML(){
    
    limpiarHTML();

    if(tweets.length > 0){
        tweets.forEach(tweet =>{
            //boton eliminar
            const btnEliminar = document.createElement('a');
            btnEliminar.classList.add('borrar-tweet');
            btnEliminar.innerText = 'X';

            //añadir la funcion de eliminar
            btnEliminar.onclick = () => {
                borrarTweet(tweet.id);
            }
            

            const li = document.createElement('li');

            //añadir texto
            li.innerText = tweet.tweet;

            //asignar el boton
            li.appendChild(btnEliminar); 

            //insertar en el htmml
            listaTweets.appendChild(li);
        });
    }
    
    sincronizarStorage();
}

//agregar los tweets actuales a localStorage
function sincronizarStorage(){
    localStorage.setItem('tweets', JSON.stringify(tweets)); 
}


//limpiar html
function limpiarHTML(){
    while (listaTweets.firstChild){
        listaTweets.removeChild(listaTweets.firstChild);
    }
}

//borrar tweet
function borrarTweet(id){
    tweets = tweets.filter(tweet => tweet.id !== id)
    crearHTML();
}

