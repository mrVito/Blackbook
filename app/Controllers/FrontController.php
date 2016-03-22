<?php namespace App\Controllers;

use Query;
use Request;
use View;

class FrontController
{
	public function index()
	{
		$domain = Request::getDomainUri();
		$version = explode('.', $domain)[0];

		$people = Query::selectFrom('people')->get();

		return View::make('front.index', compact('version', 'people'));
	}
}