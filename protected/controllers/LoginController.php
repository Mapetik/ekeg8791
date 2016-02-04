<?php

class LoginController extends Controller
{
	public $layout = "null";

	/**
	 * Declares defualt home for index
	 */
	public function actionIndex()
	{
		$this->render("index");
	}
}