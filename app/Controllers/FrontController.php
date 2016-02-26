<?php namespace App\Controllers;

use View;

class FrontController
{
	public function index()
	{
		$name = 'aboard';
		return View::make('front.index', compact('name'));
	}
}