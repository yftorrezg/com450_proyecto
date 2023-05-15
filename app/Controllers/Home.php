<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('libros/listar'); // vista(Views): libros/listar.php
	}
}
