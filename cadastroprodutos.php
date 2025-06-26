<?php

echo "\t\t\033[4m\033[1mMENU\n\n1 - ADICIONAR PRODUTO\n2 - BUSCAR E ALTERAR PRODUTO\nsair - SAIR\n\033[0m\033[0m\n";

do {
    $terminal = readline("Selecione uma opção: ");

    switch ($terminal) {

        case 1:
            $produto = readline("Digite o nome do produto: ");
            $preco = readline("Digite o valor do produto: ");

            if (file_exists("buscaealteraçãodedados.txt")) {
                $produtos = unserialize(file_get_contents("buscaealteraçãodedados.txt"));
            } else {
                $produtos = [];
            }

            $produtos[] = [
                'produto' => $produto,
                'preco' => $preco
            ];

            if (file_put_contents("buscaealteraçãodedados.txt", serialize($produtos)) !== false) {
                echo "Produto adicionado com sucesso!\n";
            } else {
                echo "Falha ao tentar adicionar o produto!\n";
            }
            break;

        case 2:
            if (!file_exists("buscaealteraçãodedados.txt")) {
                echo "Nenhum produto cadastrado ainda!\n";
                break;
            }

            $produtos = unserialize(file_get_contents("buscaealteraçãodedados.txt"));
            $buscar = readline("Digite o nome do produto que deseja alterar o preço: ");

            $produtoencontrado = false;

            foreach ($produtos as &$item) {
                if (strcasecmp($item['produto'], $buscar) == 0){
                    $novoPreco = readline("Digite o novo preço: ");
                    $item['preco'] = $novoPreco;
                    $produtoencontrado = true;
                    break;
                }
            }
            if ($produtoencontrado) {
                if (file_put_contents("buscaealteraçãodedados.txt", serialize($produtos)) !== false) {
                    echo "Preço alterado com sucesso!\n";
                }   else {
                    echo "Falha ao tentar salvar as alterações!\n";
                    }
            } else {
                echo "Esse produto não existe!\n";
              }
            break;

        case "sair":
            echo "SAINDO...\n";
            break;

        default:
            echo "Esse comando não existe, tente novamente!\n";
            break;
    }
}
while ($terminal !== "sair");

?>
