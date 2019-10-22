<?php

	namespace GymGride\Controller;
	use GymGride\Controller\Controller;
	use GymGride\View\IndexView;
	use GymGride\View\DashboardView;

	Class PageController extends Controller{

		public function view($p)
		{
			
		if($p == 'Dashboard'){
			$Dashboard = new DashboardView;
        	$Dashboard->Dashboard();
		}else {
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
}