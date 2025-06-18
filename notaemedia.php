<?php

$arquivo = "notas.txt";
$notas = [];

$handle = fopen($arquivo, "w");
if (!$handle) {
    echo "Erro ao tentar abrir o arquivo!";
    exit;
}

do {
    $entrada = readline("Digite a nota do aluno (999 para sair): ");

    if ($entrada != 999) {
        $notas[] = $entrada;
        fwrite($handle, "$entrada\n");
    }

} while ($entrada != 999);

$totalNotas = array_sum($notas);
$quantidade = count($notas);

if ($quantidade > 0) {
    $media = $totalNotas / $quantidade;
    fwrite($handle, "Média: $media\n");
} else {
    fwrite($handle, "Nenhuma nota válida foi inserida.\n");
}

fclose($handle);