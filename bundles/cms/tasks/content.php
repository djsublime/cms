<?php

class Cms_Content_Task {

	public function run($arguments = array())
	{

		$env = (!empty($arguments)) ? ' --env='.$arguments[0] : '';

		//INSTALL MIGRATION
		$result = shell_exec('php artisan migrate:install'.$env);

		//MIGRATE TABLES
		$result = shell_exec('php artisan migrate cms'.$env);

		//INSERT DEFAULT DATA
		$default_data = path('bundle').'cms'.DS.'default_content';
		$row_data = File::get($default_data);

		$data = explode("');", $row_data);

		array_pop($data);

		foreach ($data as $q) {
			
			$query = $q . "')";

			//MySQL ADAPTOR
			if(Config::get('database.default') != 'sqlite') {

				//NULL to 0
				$query = str_replace(',NULL,', ',0,', $query);

				//"table_name" to 'table_name'
				$query = str_replace('INTO "', 'INTO ', $query);
				$query = str_replace('" VALUES', ' VALUES', $query);

			}

			DB::query($query);

		}
		echo PHP_EOL;
		echo 'Setup complete!'.PHP_EOL;
	}



}