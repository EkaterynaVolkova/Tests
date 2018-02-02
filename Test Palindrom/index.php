<?php

$number1 = 0;
$number2 = 0;
$palindrom = 0;

for ($i = 100; $i > 10; $i--) {
    if (simple($i)) {
        for ($j = 100; $j > 10; $j--) {
            if (simple($j)) {
                if (palindrom($i, $j)) {
                    $number1 = $i;
                    $number2 = $j;
                    $palindrom = $i * $j;
                    echo "Первое число: $number1. Второе число: $number2. Наибольший палиндром: $palindrom.";
                    goto ok;
                }
            }
        }
    }
}

ok:
echo "<br> THE END";

function simple($value)
{
    for ($k = 2; $k <= floor(sqrt($value)); $k++) {
        if ($value % $k == 0) {
            return false;
        }
    }
    return true;
}

function palindrom($val1, $val2)
{
    $p = $val1 * $val2;
    $b = $p;
    $c = 0;
    do {
        $c = $c * 10 + ($b % 10);
        $b = $b / 10;
    } while ($b > 1);
    if ($c == $p) {
        return true;
    }
    return false;
}

?>