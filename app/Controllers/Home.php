<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function defaultBlank()
	{
		$data = [
			'title' => 'Blank Page'
		];
		return view('Home/blank', $data);
	}
	public function index()
	{
		$data = [
			'title' => 'Dashboard SIPOYAN'
		];
		return view('Home/dashboard', $data);
	}

	

	

	//--------------------------------------------------------------------

}
