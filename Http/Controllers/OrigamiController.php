<?php
namespace App\Modules\Origami\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Theme;

class OrigamiController extends Controller
{

	use DispatchesCommands, ValidatesRequests;

	/**
	 * Initializer.
	 *
	 * @return \KagiController
	 */
	public function __construct()
	{
/*
		parent::__construct();
		$this->middleware('csrf');
		$this->middleware('auth');
*/
//		$this->middleware('guest');
		$this->middleware('admin');

	}

	/**
	 * Display Welcome
	 *
	 * @return Response
	 */
	public function welcome()
	{
		return Theme::View('modules.origami.origami');
//		return View('origami::origami');
	}

}
