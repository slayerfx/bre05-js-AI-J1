<?php

/**
 * Fonction qui prend un nombre illimité d'arguments et les affiche
 */
function displayArgs(...$args) {
    if (empty($args)) {
        echo "Aucun argument fourni.\n";
        return;
    }

    foreach ($args as $index => $arg) {
        echo "Argument " . ($index + 1) . " : " . print_r($arg, true) . "\n";
    }
}

// Tests
echo "=== Test 1 : plusieurs arguments simples ===\n";
displayArgs("Bonjour", 42, 3.14, true);

echo "\n=== Test 2 : sans arguments ===\n";
displayArgs();

echo "\n=== Test 3 : avec un tableau ===\n";
displayArgs("texte", [1, 2, 3], "fin");
