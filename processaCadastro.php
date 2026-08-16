<?php
/*
    processaCadastro.php
    -----------------------------------------------------------
    Responsável por receber os dados enviados pelo formulário
    (cadastro.html), armazená-los em variáveis, exibi-los
    organizados em tela e apresentar uma mensagem personalizada
    ao final.
*/

// Verifica se o formulário foi realmente enviado via POST.
// Isso evita erros caso alguém tente acessar este arquivo diretamente.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Armazenando cada dado recebido em uma variável própria.
    // htmlspecialchars() é usado para evitar que o usuário insira
    // código HTML/JS malicioso nos campos (segurança básica).
    $nome1        = htmlspecialchars($_POST['nome1']);
    $idade2       = htmlspecialchars($_POST['idade2']);
    $profissao3   = htmlspecialchars($_POST['profissao3']);
    $salario4     = htmlspecialchars($_POST['salario4']);
    $experiencia5 = htmlspecialchars($_POST['experiencia5']);

    // Formata o salário para exibição no padrão R$ 0,00
    $salarioFormatado = "R$ " . number_format((float)$salario4, 2, ',', '.');

    // Monta a mensagem personalizada utilizando nome, profissão e experiência,
    // conforme exigido pela atividade.
    $mensagem = "Olá, $nome1! Seja bem-vindo(a) às Lojas Brincos e Companhia. "
              . "Recebemos seu cadastro para a vaga de $profissao3 e ficamos contentes "
              . "em saber sobre sua experiência: \"$experiencia5\". "
              . "Em breve nossa equipe de Recursos Humanos entrará em contato!";

} else {
    // Caso o arquivo seja acessado sem envio do formulário, redireciona o usuário.
    header("Location: cadastro.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Cadastro - Lojas Brincos e Companhia</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-light-grey">

    <div class="w3-container w3-teal w3-padding-32">
        <h2>Lojas Brincos e Companhia</h2>
        <h4>Confirmação de Cadastro</h4>
    </div>

    <div class="w3-container w3-padding-32">
        <div class="w3-card-4 w3-white w3-container w3-padding-16" style="max-width:600px; margin:auto;">

            <h3 class="w3-text-teal">Dados Recebidos</h3>

            <!-- Cada informação exibida em uma linha, usando elementos HTML -->
            <ul class="w3-ul">
                <li><b>Nome Completo:</b> <?php echo $nome1; ?></li>
                <li><b>Idade:</b> <?php echo $idade2; ?> anos</li>
                <li><b>Profissão:</b> <?php echo $profissao3; ?></li>
                <li><b>Salário Pretendido:</b> <?php echo $salarioFormatado; ?></li>
                <li><b>Experiência Anterior:</b> <?php echo $experiencia5; ?></li>
            </ul>

            <hr>

            <h3 class="w3-text-teal">Mensagem</h3>
            <p class="w3-panel w3-pale-green w3-leftbar w3-border-green">
                <?php echo $mensagem; ?>
            </p>

            <a href="cadastro.html" class="w3-btn w3-teal w3-round w3-margin-top">
                Voltar ao Formulário
            </a>

        </div>
    </div>

</body>
</html>
