<?php

$arquivo = "estoque.txt";
$estoque = [];

function adicionar(&$estoque){
    $produto = readline("Digite o nome do produto que deseja adicionar: ");
    $quantidade = readline("Digite a quantidade do produto: ");
    if (array_keys_exists($produto, $estoque)){
            $estoque[$produto] += $quantidade;
        }
    else{
        $preco = readline ("Digite o preço do produto: ");
        
        $estoque[$produto] = $quantidade;
        $estoque[$produto] = $preco;
        
    }
}

do{
    echo "\tMENU\n1 - Adicionar produto\n2 - Alterar quantidade do produto\n3 - Listar estoque\n4 - Sair";

    $terminal = readline("Digite a opção que deseja usar: ");

    switch($terminal){
        
        case 1:

        case 2:
        
        case 3:

        case 4:
    }
}
while($terminal !== 4);
?>
