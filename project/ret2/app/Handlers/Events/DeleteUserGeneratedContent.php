<?php namespace App\Handlers\Events;

use App\Events\UserWasDeleted;

use App\Chatusuarios;
use App\Evalusuarios;
use App\Factura;
use App\Puja;
use App\Subasta;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class DeleteUserGeneratedContent implements ShouldBeQueued {

	use InteractsWithQueue;

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserWasDeleted  $event
	 * @return void
	 */
	public function handle(UserWasDeleted $event)
	{
		// Acciones que pasará al borrar un user
		Chatusuarios::where('id_user1', $event->user_id)->delete();
		Chatusuarios::where('id_user2', $event->user_id)->delete();
		Evalusuarios::where('id_user_evaluador', $event->user_id)->delete();
		Evalusuarios::where('id_user_evaluado', $event->user_id)->delete();
		Factura::where('id_usuario', $event->user_id)->delete();
		Puja::where('id_usuario', $event->user_id)->delete();

		$subastas = Subasta::where('id_user_vendedor', $event->user_id)->get();
		foreach ($subastas as $subastas) {
			Puja::where('id_subasta', $subastas->id)->delete();
			$subastas->delete();
		}



	}

}
