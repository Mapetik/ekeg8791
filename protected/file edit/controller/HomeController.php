<?php

class HomeController extends Controller
{
	public $layout = "mainlayout";

	/**
	 * Declares defualt home for index
	 */


	public function filters(){ 
		return array(
		'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
					array('allow',
					'actions'=>array('index','view'),
					'users'=>array('@'),
					),
					array('allow', 
					'actions'=>array('admin','DaftarRealisasi','GetProgram','GetLayanan','GetKegiatan','WriteRealisasi','MaxRealisasi'),
					'expression'=>'$user->isAdmin()',
					),
					array('deny',
					'users'=>array('*'),
					),
		);
	}

	public function actionIndex()
	{
		$this->render("index");
	}

	public function actionIndex2(){
		$dataSD = SumberDana::model()->findAll();
		$this->render('index2',array("dataSD"=>$dataSD));
	}
}