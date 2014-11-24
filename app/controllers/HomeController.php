<?php

class HomeController extends BaseController {

	public $restful = true;

	public function index()
	{
		$title = "Subiendo Archivos";

		return View::make('home.index')
			->with('title', $title);

	}
}
