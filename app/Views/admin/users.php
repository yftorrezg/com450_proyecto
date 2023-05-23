<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <!-- estilos -->
  <link rel="stylesheet" href="<?= base_url('bootstrap-4/css/bootstrap.min.css') ?>">
</head>
<body>

  <!--
  route:
    $routes->get('admin/users', 'AdminController::users', ['as' => 'users']);
  
  controller:
    public function users() {
        $userModel = new UserModel();
        $users = $userModel->findAll();
        $data = [
          'pageTitle'=>'Dashboard | Users',
          'userInfo'=> session()->get('LoggedUser'),
          'users' => $users
        ];
        return view('admin/users', $data); // vista(Views): admin/users.php
      }
-->

<!--  
 mostrar la tabla de todos los usuarios registrados
 -->
  <?= $cabecera ?>

 <div class="container mt-5">

    <h1 class="text-lg-center m-3"> Lista de usuarios registrados</h1>
    
    <div class="row">
        <div class="col-md-8 offset-md-2">
             <table class="table">
                   <thead class="table-primary" >
                        <th>Name</th>
                        <th>Email</th>
                        <th>Accion</th>
                   </thead>
                   <tbody>
                    <!-- foreach -->
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td>
                            <a class="btn btn-danger" href="<?= base_url('admin/users/delete/'.$user['id']) ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- endforeach -->
                   </tbody>
             </table>
        </div>
        <br>
        <br>
        
    </div>

</div>

</body>
</html>