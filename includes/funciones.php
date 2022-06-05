<?php

function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}


function esUltimo(string $actual, string $proximo): bool
{
    if ($actual !== $proximo) {
        return true;
    }
    return false;
}

// Funcion que revisa que el usuario esta autenticado

function isAuth(): void
{
    if (!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

function isAdmin(): void
{
    if (!isset($_SESSION['admin'])) {
        header('Location: /');
    }
}

function diasReservas($fecha1, $fecha2): int
{
    while ($fecha1 < $fecha2) {
        $dias = 0;

        if ($fecha1 < $fecha2) {
            $dias++;
        }

        return $dias;
    }
}
