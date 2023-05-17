<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap-4/css/bootstrap.min.css') ?>">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 " style="margin-top: 70px">
            <h4>Registrarse</h4>
            <hr>
           <form action="<?= site_url('create'); ?>" method="POST" autocomplete="off">
           <?php $validation = \Config\Services::validation(); ?>
           
               <?= csrf_field(); ?>
               <?php if( !empty( session()->getFlashdata('fail') ) ) : ?>
                   <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
               <?php endif ?>

               <?php if( !empty( session()->getFlashdata('success') ) ) : ?>
                   <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
               <?php endif ?>

               <div class="form-group">
                    <label for="">Nombre: </label>
                    <input type="text" name="name" class="form-control" placeholder="Introduzca su nombre" value="<?= set_value('name') ?>" >
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></small>
                </div>
                <div class="form-group">
                    <label for="">Email: </label>
                    <input type="email" name="email" class="form-control" placeholder="Introduzca su email" value="<?= set_value('email') ?>">
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></small>
                </div>
                <div class="form-group">
                    <label for="">Password: </label>
                    <input type="password" name="password" class="form-control" placeholder="Introduzca su password" value="<?= set_value('password') ?>">
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></small>
                </div>
                <div class="form-group">
                    <label for="">Confirmar Password</label>
                    <input type="password" name="cpassword" class="form-control" placeholder="Repita su password" value="<?= set_value('cpassword') ?>">
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></small>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                </div>
                <div>
                    <a href="<?= base_url('login') ?>">Ya tengo cuenta. Loguearse ahora</a>
                </div>
           </form>
        </div>
    </div>
</div>
    
</body>
</html>