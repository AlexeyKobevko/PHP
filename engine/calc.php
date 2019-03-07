<?php

function addition($a, $b)
{
    return (int)$a + (int)$b;
}

function subtraction($a, $b) {
    return (int)$a - (int)$b;
}

function multiplication($a, $b) {
    return (int)$a * (int)$b;
}

function division($a, $b) {
    if ((int)$a === 0) {
        return 0;
    } elseif ((int)$b === 0) {
        return 'Такой большой, а в сказки веришь?!';
    } else {
        return (int)$a / (int)$b;
    }
}

function mathOperations ($a, $b, $operation) {
    switch ($operation) {
        case 'addition':
        case '+':
            return addition($a, $b);
        case 'subtraction':
        case '-':
            return subtraction($a, $b);
        case 'multiplication':
        case '*':
            return multiplication($a, $b);
        case 'division':
        case '/':
            return division($a, $b);
    }
}