<?php namespace Angel\Sitemap;

use App, View;

class SitemapController extends \Angel\Core\AngelController {
	
	function index()
	{
		// Query
		$this->data['array'] = $this->compile();
			
		// Return
		return View::make('sitemap::sitemap.index',$this->data);
	}

	function xml()
	{
		// Query
		$this->data['array'] = $this->compile();
			
		// Return
		return View::make('sitemap::sitemap.xml',$this->data);
	}
	
	function compile()
	{
		// Array
		$array = array();
		
		// Build array
		foreach(Config::a('core::config.linkable_models') as $model => $admin_link) {
			$Model = App::make($model);
			$objects = $Model->get();
			$objects_array = NULL;
			foreach($objects as $object) {
				if($link = $object->link() and $name = $object->name) {
					$objects_array[] = array(
						'link' => $link,
						'name' => $name
					);
				}
			}
			if($model == "Pages") $array = array_merge($array,$objects_array);
			else {
				$array[] = array(
					'name' => $model,
					'children' => $objects_array
				);
			}
		}
		
		// Return
		return $array;
	}
}