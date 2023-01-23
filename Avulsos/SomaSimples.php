<?php

// Leia dois valores inteiros identificados como variáveis A e B. 
// Calcule a soma entre elas e chame essa variável de SOMA.
// A seguir escreva o valor desta variável. -->

    $a = fgets(STDIN);
    $b = fgets(STDIN);
  
    $soma = $a + $b; 
    echo("SOMA = " . $soma);
