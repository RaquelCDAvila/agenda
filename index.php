<?php
session_start();
if (!isset($_SESSION["AGENDA"])) {
  header("Location: login.php");
}

require_once "configuracao.php";

$usuario = unserialize($_SESSION["AGENDA"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>

  <div class="container">
    <h1>Agenda de Contatos</h1>
    <h3>Seja bem-vindo,
      <?php echo $usuario->getNome(); ?>.</h3>
    <?php

    $dao = new ContatoDao;

    ?>

    <div class="my-3">
      <h3>Cadastro de contato</h3>
      <form action="" method="post">
        <div class="d-flex justify-content-between">

          <div class="flex-fill">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do do contato" required>
          </div>
          <div class="mx-2 align-self-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>

        </div>
      </form>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //atualizar
        //inserir
        if(isset($_POST["nome"])){
          $nome = $_POST["nome"];
          $contato = new Contato($usuario);
          $contato->setNome($nome);
          try {
            $dao->inserir($contato);
            //bootstrap Alerts
            echo "<span class='d-block'>Contato criado com sucesso!</span>";
          } catch (\Throwable $e) {
            echo "<span class='d-block text-danger'>Erro ao criar o contato: ". $e->getMessage() ."</span>";
          }
          
        }

      }

      $contatos = $dao->listar($usuario);
      
      ?>

    </div>

    <ul class="list-group">
      <?php
      foreach ($contatos as $contato) {
        $nome = $contato->getNome();
        echo "
          <li class='list-group-item d-flex justify-content-between'>
            <span class='flex-fill align-self-center'>$nome</span>

            <div class='d-flex justify-content-between'>
              <a class='btn btn-warning mx-2' href='#' role='button'>Editar</a>

              <a class='btn btn-danger' href='#' role='button'>Excluir</a>            
            </div>

          </li>
          ";
      }
      ?>
    </ul>


  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>