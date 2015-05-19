<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Chatusuarios;

use App\Http\Controllers\System\SystemController;

class System extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'system';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Realiza las tareas del sistema.';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$chat = Chatusuarios::create(['id_user1' => '9'],['id_user2' => '9'],['id_subasta' => '9']);
		$chat->save();
	}

}
