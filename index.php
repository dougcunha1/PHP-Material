<?php
    // Array de strings
    $comidas = array("Melância", "Maçã", "Banana", "Laranja");

    // A função array_push(nome_array, valor) adiciona um valor no final do array
    array_push($comidas, "Caju");

    // A função array_pop(nome_array) remove o último elemento do array
    array_pop($comidas);

    // A função array_shift(nome_array) remove o primeiro elemento do array
    array_shift($comidas);

    // A função array_reverse(nome_array) reverte a ordem do array e retorna um novo array
    $comidas_contrario = array_reverse($comidas);

    foreach ($comidas_contrario as $comida) {
        echo $comida . "<br>";
    }

    // A função count(nome_array) retorna o número de elementos do array
    echo "Total de comidas: " . count($comidas) . "<br>"
?>