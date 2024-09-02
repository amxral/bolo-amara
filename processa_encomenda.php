<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tamanho = $_POST['tamanho'];
    $massa = $_POST['massa'];
    $recheios = implode(", ", $_POST['recheios']);
    $recheios_adicionais = isset($_POST['recheios_adicionais']) ? implode(", ", $_POST['recheios_adicionais']) : 'Nenhum';
    $observacoes = $_POST['observacoes'];

    $to = "amaralgrs1@gmail.com";
    $subject = "Nova Encomenda de Bolo";
    $message = "
    <html>
    <head>
        <title>Nova Encomenda de Bolo</title>
    </head>
    <body>
        <h2>Detalhes da Encomenda</h2>
        <p><strong>Tamanho:</strong> $tamanho</p>
        <p><strong>Massa:</strong> $massa</p>
        <p><strong>Recheios Tradicionais:</strong> $recheios</p>
        <p><strong>Recheios Adicionais:</strong> $recheios_adicionais</p>
        <p><strong>Observações:</strong> $observacoes</p>
    </body>
    </html>
    ";

    // Para enviar email em formato HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Headers adicionais
    $headers .= "From: <noreply@seudominio.com>" . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Encomenda enviada com sucesso!";
    } else {
        echo "Falha ao enviar a encomenda. Tente novamente.";
    }
} else {
    echo "Método de envio inválido.";
}
?>
