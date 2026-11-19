<?php
if ($_SERVER ["REQUEST_METHOD"] == "POST"){
$nome = $_POST['nome'];
$textoSeguroNome = htmlspecialchars($nome);

$mensagem = $_POST['mensagem'];
$textoSeguroMensagem = htmlspecialchars($mensagem);
}
?>


<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="UTF-8"> 
  <title>Contato</title> 
</head> 
<body> 
  <h1>Contato</h1> 
  <form method="POST" action="">
        <label for="peso_input">Nome : </label>
        <input type="text" id="nome_input" name="nome" required>
        <button type="submit">Enviar</button>
    </form>
   <form method="POST" action="">
        <label for="altura_input">Mensagem : </label>
        <input type="text" id="mensagem_input" name="mensagem" required>
        <button type="submit">Enviar</button>
    </form>
 <p> Nome:<?= $nome ?? '' ?> </p>
  <p> Mensagem:<?= $mensagem ?? '' ?> </p>
</body> 
</html>