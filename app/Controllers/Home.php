<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
		// echo 'test';
	}

	public function about()
	{
		echo "method about";
		return "data";
		return "tampilkan teks ini";
	}

	//--------------------------------------------------------------------

}
