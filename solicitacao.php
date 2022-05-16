<?php
require 'assets/php/config.php';

$paciente = [];
$profissional = [];
$tipoSolicitacao = [];
$procedimentos = [];
$id = filter_input(INPUT_GET, 'id');

if ($id) {
   $sql = $pdo->prepare("SELECT * FROM pacientes WHERE id = :id");
   $sql->bindValue(':id', $id);
   $sql->execute();

   if ($sql->rowCount() > 0) {
      $paciente = $sql->fetch(PDO::FETCH_ASSOC);

      $sqlProfissional = $pdo->query("SELECT * FROM profissional");
      if($sqlProfissional->rowCount() > 0){
         $profissional = $sqlProfissional->fetchAll(PDO::FETCH_ASSOC);
      }
      $sqlTipo = $pdo->query("SELECT * FROM tiposolicitacao");
      if($sqlTipo->rowCount() > 0){
         $tipoSolicitacao = $sqlTipo->fetchAll(PDO::FETCH_ASSOC);
      }
      

   } else {
      header("Location: ../../index.php");
   }
} else {
   header("Location: ../../index.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/css/style.css">
   <title>Document</title>
</head>

<body>
   <header>
      <nav class="navbar navbar-dark bg-primary ">
         <div class="container d-grid gap-3 d-md-flex p-3 justify-content-end">
            <a name="" id="" class="btn btn-outline-light" href="#" role="button">Solicitações Clínicas</a>
            <a name="" id="" class="btn btn-outline-light" href="#" role="button">Listagens de Solicitações</a>
         </div>
      </nav>
   </header>
   <div class="container">
      <form action="" method="post">
         <a href="index.php" class="btn btn-outline-primary mb-3 mt-3">Voltar</a>

         <div class="row">
            <div class="mb-3 col">
               <label for="name" class="form-label">Paciente</label>
               <input type="text" class="form-control" id="name" placeholder="paciente" value="<?= $paciente['nome']; ?>">
            </div>
            <div class="mb-3 col">
               <label for="nascimento" class="form-label">Data de nascimento</label>
               <input type="date" class="form-control" id="nascimento" value="<?= $paciente['dataNasc']; ?>">
            </div>
            <div class="mb-3 col">
               <label for="cpf" class="form-label">CPF</label>
               <input type="text" class="form-control" id="cpf" placeholder="CPF" value="<?= $paciente['CPF']; ?>">
            </div>
         </div>

         <div class="row">
            <div class="mb-3 col">
               <label for="select" class="form-label">CPF</label>
               <select class="form-select" id="select" aria-label="Default select example">
                  <?php foreach ($profissional as $prof): ?>
                  <option value="<?=$prof['id']?>"><?=$prof['nome']?></option>
                  <?php endforeach; ?>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="mb-3 col">
               <label for="name" class="form-label">Paciente</label>
               <select class="form-select" id="select" aria-label="Default select example">
                  <?php foreach ($tipoSolicitacao as $tip): ?>
                  <option value="<?=$tip['id']?>"><?=$tip['descricao']?></option>
                  <?php endforeach; ?>
               </select>
            </div>
            <div class="mb-3 col">
               <label for="exampleFormControlInput1" class="form-label">Email address</label>
               <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
         </div>
         <div class="row">
            <div class="mb-3 col">
               <label for="name" class="form-label">Paciente</label>
               <input type="text" class="form-control" id="name" placeholder="name@example.com">
            </div>
            <div class="mb-3 col">
               <label for="exampleFormControlInput1" class="form-label">Email address</label>
               <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
         </div>
      </form>
   </div>




   

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
   </script>
</body>

</html>