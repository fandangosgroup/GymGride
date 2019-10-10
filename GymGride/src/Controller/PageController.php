<?php

	namespace GymGride\Controller;
	use GymGride\Controller\Controller;
	use GymGride\View\IndexView;
	use GymGride\Model\Model;

	Class PageController extends Controller{

		public function view($p){

		if (empty($p)){
			$i = new IndexView();
			$i->goIndex();
		}else{
		$i = new IndexView();
		$i->mostrar($p);
		}	
	}
}