<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <!-- estilos -->
  <link rel="stylesheet" href="<?= base_url('bootstrap-4/css/bootstrap.min.css') ?>">
</head>
<body>
  <!-- 
$routes->get('admin', 'AdminController::index', ['as' => 'admin']);
-->

  <!-- cabecera -->
  <?= $cabecera ?>
  <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="<?= base_url('admin/users') ?>">Users</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/users/edit/1') ?>">Edit</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/users/delete/1') ?>">Delete</a>
  </li>
  
  </ul>
  
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2 bg-success" style="margin-top:30px">
        <div class="text-center p-4 font-bold text-white">
          <a class="text-center p-4 font-bold text-white" href="<?php echo base_url('listar') ?>">Dasboard</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <table class="table">
          <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Accion</th>
          </thead>
          <tbody>
            <tr>
              <td><?= $userInfo['user']['id']; ?></td>
              <td><?= $userInfo['user']['name']; ?></td>
              <td><?= $userInfo['user']['email']; ?></td>
              <td>
                <a href="<?= base_url('login') ?>">Logout</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

   
  
  
</body>
</html>