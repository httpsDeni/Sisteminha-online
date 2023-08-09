<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeColaborador = $_POST["nome"];
    $chefe = $_POST["chefe"];

    // Criando um array associativo com os dados do colaborador
    $colaborador = array("nome" => $nomeColaborador, "chefe" => $chefe);

    // Obtendo os dados já armazenados no localStorage (se houver)
    $colaboradores = json_decode($_COOKIE["colaboradores"], true);
    if (!$colaboradores) {
        $colaboradores = array();
    }

    // Adicionando o novo colaborador à lista
    $colaboradores[] = $colaborador;

    // Armazenando a lista atualizada no localStorage
    setcookie("colaboradores", json_encode($colaboradores), time() + (86400 * 30), "/"); // Armazena por 30 dias

    // Redirecionar de volta ao formulário
    header("Location: index.html");
    exit();
}
?>
