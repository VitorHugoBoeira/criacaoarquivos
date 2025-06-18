<?php

echo "\t\t\033[4m\033[1mMENU\n\n1 - ADICIONAR PRODUTO\n2 - BUSCAR PRODUTO\nsair - SAIR\n\033[0m\033[0m\n";

do{
$terminal = readline("Selecione uma opção: ");

switch($terminal){
    
    case 1:
        $produto = readline("Digite o nome do produto: ");
        $preço = readline("Digite o valor do produto: ");
        $produtos = [
            'produto' => $produto,
            'preço' => $preço
        ];
       $conteudo = serialize($produtos);
        if (file_put_contents("buscaealteraçãodedados.txt", $conteudo . "\n")!== false){
            echo "produto adicionado com sucesso!\n";
        }
        else {
            echo "falha ao tentar adicionar o produto!";
        }
        break;
    case 2:
        $conteudo = file_get_contents("buscaealteraçãodedados.txt");
        $produtos = unserialize($conteudo);
        $buscar = readline("Digite o produto que deseja alterar o valor: ");
        if (array_key_exists($buscar, $produtos)){
            $novopreco = readline("Digite o novo preço: ");
            $buscar[$preço] = $novopreco;
        }
        else{
            echo "esse produto não existe!";
        }
        break;
    case "sair":
        echo "SAINDO";
        break;
    
    default:
        echo "esse comando nao existe tente novamente!\n";
        break;
}
    }
while($terminal !== "sair");

?>