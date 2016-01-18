<?php

class ErrPageController extends Controller
{
	public $layout = "mainlayout";
	/**
	 * Declares defualt home for index
	 */
	public function actionerrDB()
	{
		$this->render("errDB");
	}

	
}