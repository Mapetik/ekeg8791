<?php

class DownloadRekapController extends Controller
{
	public $layout = "mainlayout";
	/**
	 * Declares defualt home for index
	 */
	public function actionIndex()
	{
		$this->render("index");
	}
	
}