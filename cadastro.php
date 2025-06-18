<?php

$arquivo = "cadastro.txt";
    $nome = readline("Digite seu nome: ");
    $idade = readline("Digite sua idade: ");
    $email = readline("Digite seu email: ");

if (!file_exists($arquivo)){
    $handle = fopen ($arquivo, "w");
}
else {
    $handle = fopen ($arquivo, "a");
}
if ($handle){
    fwrite ($handle, "$nome | $idade | $email\n");
    fclose($handle);
    echo "cadastro realizado com sucesso!\n";
}
else {
    echo "Erro ao abrir arquivo!\n";
}
?>