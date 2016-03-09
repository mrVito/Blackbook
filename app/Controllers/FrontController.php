<?php namespace App\Controllers;

use Request;
use View;

class FrontController
{
	public function index()
	{
		$domain = Request::getDomainUri();
		$version = explode('.', $domain)[0];

		return View::make('front.index', compact('version'));
	}
}