<?php
$arquivo = "listacompras.txt";
$listadecompras = [];

$produto = readline("Digite o nome do produto: ");
$quantidade = readline("Digite a quantidade que deseja adicionar: ");
$preco = readline("Digite o preço do produto: ");

$total = $quantidade * $preco;

$listadecompras = [
    'produto' => $produto,
    'quantidade' => $quantidade,
    'preco' => $preco,
    'total' => $total
];

$conteudo = implode(" - ", $listadecompras);

if (file_put_contents("listacompras.txt", $conteudo . "\n", FILE_APPEND) !== false){
    echo "array salva no arquivo com sucesso!\n";
}
else {
    echo "Erro ao salvar o array no arquivo!\n";
}

$linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$totallista = 0;

foreach($linhas as $linha){
    $partes = explode(" - ", $linha);
    if (isset($partes[3])){
        $totallista += $partes[3];
    }
}


if (file_put_contents("listacompras.txt", "Total das compras:" . $totallista . "\n", FILE_APPEND) !== false){
    echo "array salva no arquivo com sucesso!\n";
}
else {
    echo "Erro ao salvar o array no arquivo!\n";
}

?>