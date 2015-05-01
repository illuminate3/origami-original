<?php
namespace App\Modules\Origami\Http\Domain\Repositories;

//use App\Modules\Origami\Http\Domain\Models\Theme;

//use DB;
//use Caffeinated\Modules\Facades\Module as ModuleFacade;
//use Hash, DB, Auth;
//use DateTime;
//use File, Auth;

class ThemeRepository extends BaseRepository {

	/**
	 * The Module instance.
	 *
	 * @var App\Modules\Origami\Http\Domain\Models\Module
	 */
	protected $theme;

	/**
	 * Create a new ModuleRepository instance.
	 *
   	 * @param  App\Modules\Origami\Http\Domain\Models\Module $module
	 * @return void
	 */
	public function __construct(
		Theme $theme
		)
	{
		$this->theme = $theme;
	}

	/**
	 * Get user collection.
	 *
	 * @param  string  $slug
	 * @return Illuminate\Support\Collection
	 */
	public function index()
	{
		$theme = $this->theme->find($id);
//dd($theme);

		return compact('theme');
	}

	/**
	 * Get user collection.
	 *
	 * @param  string  $slug
	 * @return Illuminate\Support\Collection
	 */
	public function show($id)
	{
		$theme = $this->theme->find($id);
//dd($theme);

		return compact('theme');
	}

	/**
	 * Get user collection.
	 *
	 * @param  int  $id
	 * @return Illuminate\Support\Collection
	 */
	public function edit($id)
	{
		$theme = $this->theme->find($id);
//dd($theme);

		return compact('theme');
	}

	/**
	 * Get all models.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function store($input)
	{
dd('store');
// 		$this->model = new User;
// 		$this->model->create($input);
	}

	/**
	 * Update a role.
	 *
	 * @param  array  $inputs
	 * @param  int    $id
	 * @return void
	 */
	public function update($input, $id)
	{
//dd($input['enabled']);
		$theme = Theme::find($id);
//dd($theme->name);

		if ($input['enabled'] == 0 ) {
			$theme->enabled = 0;
			ThemeFacade::disable($theme->name);
		} else {
			$theme->enabled = 1;
			ThemeFacade::enable($theme->name);
//ThemeFacade::setProperty($theme->name . '::enabled', true);
		}

		return $theme->update();
	}


}
