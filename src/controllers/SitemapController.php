<?php namespace Angel\Sitemap;

use App, View, Config;

class SitemapController extends \Angel\Core\AngelController {
	
	function index()
	{
		// Query
		$this->data['array'] = $this->compile();
			
		// Return
		return View::make('sitemap::index',$this->data);
	}

	function xml()
	{
		// Query
		$this->data['array'] = $this->compile();
			
		// Return
		return View::make('sitemap::xml',$this->data);
	}
	
	function compile()
	{
		// Array
		$array = array();
		
		// Build array
		foreach(Config::get('core::config.linkable_models') as $model => $admin_link) {
			if(in_array($model,array("Sitemap","Link"))) continue;
			
			$Model = App::make($model);
			$objects = $Model->get();
			if($objects) {
				$objects_array = NULL;
				foreach($objects as $object) {
					if($link = $object->link() and $name = $object->name) {
						$objects_array[] = array(
							'link' => $link,
							'name' => $name,
						);
					}
				}
				if($objects_array) {
					if($model == "Page") $array = array_merge($array,$objects_array);
					else {
						$array[] = array(
							'name' => $model,
							'children' => $objects_array
						);
					}
				}
			}
		}
		
		// Return
		return $array;
	}
}