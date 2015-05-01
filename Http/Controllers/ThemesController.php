<?php
namespace App\Modules\Origami\Http\Controllers;

//use App\Modules\Origami\Http\Domain\Models\Module;
//use App\Modules\Origami\Http\Domain\Repositories\ThemeRepository;

//use Illuminate\Http\Request;
use App\Modules\Origami\Http\Requests\DeleteRequest;
use App\Modules\Origami\Http\Requests\ThemeCreateRequest;
use App\Modules\Origami\Http\Requests\ThemeUpdateRequest;

//use Datatables;
use Flash;
use Theme;

class ThemesController extends OrigamiController {

	/**
	 * The UserRepository instance.
	 *
	 * @var App\Modules\Kagi\Http\Domain\Repositories\UserRepository
	 */
	protected $theme_repo;

	/**
	 * Create a new UserController instance.
	 *
	 * @param  App\Modules\Kagi\Http\Domain\Repositories\ModuleRepository $module
	 * @return void
	 */
	public function __construct()
	{
// middleware
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//dd("loaded");
$slug						= Theme::getProperty('bootstrap::slug', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.slug'));
$name						= Theme::getProperty('theme::name', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.name'));
$author						= Theme::getProperty('theme::author', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.author'));
$description				= Theme::getProperty('bootstrap::description', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.description'));
$version					= Theme::getProperty('theme::version', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.version'));

$activeTheme				= Theme::getActive();


//dd($description);

		$themes = Theme::all();
dd($themes);

		return View('origami::themes.index',
			compact(
				'themes'
			));


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
dd("create");
//		return view('kagi::users.create', $this->user->create());
		return view('origami::modules.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\requests\UserCreateRequest $request
	 *
	 * @return Response
	 */
	public function store(
		UserCreateRequest $request
		)
	{
dd("store");
		$this->user->store($request->all());

		return redirect('user')->with('ok', trans('back/users.created'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
//dd("show");
		return View('origami::modules.show',  $this->module->show($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
//dd("edit");
		return View('origami::modules.edit',  $this->module->edit($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\requests\UserUpdateRequest $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(
		ThemeUpdateRequest $request,
		$id
		)
	{
//dd($request->enabled);

		$this->module->update($request->all(), $id);
		Flash::success( trans('kotoba::module.success.update') );
		return redirect('origami');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(
		DeleteRequest $request,
		$id
		)
	{
dd("destroy");
		$this->user->destroy($id);

		return redirect('user')->with('ok', trans('back/users.destroyed'));
	}


}
