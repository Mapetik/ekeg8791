<?php

class HomeController extends Controller
{
	public $layout = "mainlayout";

	/**
	 * Declares defualt home for index
	 */
	public function actionIndex()
	{
		$this->render("index");
	}

	public function actionIndex2(){
		$dataSD = SumberDana::model()->findAll();
		$this->render('index2',array("dataSD"=>$dataSD));
	}
}