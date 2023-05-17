<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Home</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap-4/css/bootstrap.min.css') ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand">Productos</a>
		<button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="my-nav" class="collapse navbar-collapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('listar') ?>">Productos</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('vender') ?>">Vender</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('#') ?>">Ventas</a>
				</li>
			</ul>
		</div>
	</nav>



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
        <br>
        <br>
        
    </div>

    

</div>
    
</body>
</html>