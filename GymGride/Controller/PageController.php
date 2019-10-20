<?php

	namespace GymGride\Controller;
	use GymGride\Controller\Controller;
	use GymGride\View\IndexView;

	Class PageController extends Controller{

		public function view($p)
		{
		
		if (empty($p))
		{
			$i = new IndexView();
			$i->mostrar();
		}else
		{
		$i = new IndexView();
		$i->mostrar($p);
		}	
	}
}