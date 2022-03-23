<?php require 'assets/php/config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM pacientes");
if($sql->rowCount() > 0){
   $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/css/style.css">

   <title>Teste Sitcon</title>

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
   <main>
      <div class="container">
         <div class="search mt-3 mb-3 input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><img src="assets/images/loupe.png" alt=""></span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username"
               aria-describedby="addon-wrapping">
         </div>
         <div class="table-border">
            <table class="table table-hover ">
               <thead>
                  <tr>
                     <th scope="col">Paciente</th>
                     <th scope="col">Nascimento</th>
                     <th scope="col">CPF</th>
                     <th scope="col">Ações</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($lista as $paciente): ?>
                  <tr>
                     <th scope="row"><?=$paciente['nome']?></th>
                     <td><?=date('d/m/Y',strtotime($paciente['dataNasc'])); ?></td>
                     <td><?=$paciente['CPF']?></td>
                     <td><a href="solicitacao.php?id=<?=$paciente['id']?>" class="btn">Prosseguir</a></td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>

         </div>
      </div>
   </main>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
   </script>

</body>

</html>