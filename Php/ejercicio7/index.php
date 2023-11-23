<?php
    //La función PHP strlen()devuelve la longitud de una cadena.
    echo strlen("Hello world!"); // 12 caracteres

    //str_word_count() cuenta el número de palabras en una cadena.
    echo str_word_count("Mi nombre es Gabriel"); //Devuelve 4

    //La función PHP strrev()invierte una cadena.
    echo strrev("Hola Mundo");

    /*La función PHP strpos()busca un texto específico dentro de una cadena. 
    Si se encuentra una coincidencia, la función devuelve la posición del carácter de 
    la primera coincidencia. Si no se encuentra ninguna coincidencia, devolverá FALSO.
    */
    echo strpos("Hello world!", "world"); //Devuelve 6, la posicion en la que empieza la palabra world

    //str_replace() reemplaza algunos caracteres con otros caracteres en una cadena.
    
    echo str_replace("world", "Dolly", "Hello world!"); // Remplaza Hello por Dolly
?>
