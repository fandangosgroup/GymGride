<?php

	namespace GymGride\Controller;
	use GymGride\Controller\Controller;
	use GymGride\View\IndexView;
	use GymGride\View\DashboardView;

	Class PageController extends Controller{

		public function view($p)
		{
		
			switch ($p) {
				case 'Personal':
					$Dashboard = new DashboardView;
					$Dashboard->Personal();
					break;
				
				case 'Dashboard':
					$Dashboard = new DashboardView;
					$Dashboard->Dashboard();
					break;
				
				case 'Admin':
					$Dashboard = new DashboardView;
					$Dashboard->Admin();
					break;
				
				default:
					if (empty($p))
					{
						$i = new IndexView();
						$i->mostrar();
					}else
					{
						$i = new IndexView();
						$i->mostrar($p);
					}
					break;
		
			}
		/* 
		if($p == 'Personal'){
			$Dashboard = new DashboardView;
			$Dashboard->Personal();
		}

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
			} */
			
	}
}