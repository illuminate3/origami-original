<?php
namespace App\Modules\Origami\Http\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Theme extends Model {

	use PresentableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'themes';

	protected $presenter = 'App\Modules\Origami\Http\Presenters\Origami';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
//	protected $hidden = ['password', 'remember_token'];

// DEFINE Fillable -------------------------------------------------------
/*
"name": "Origami",
"slug": "Origami",
"version": "1.0",
"description": "This is the description for the Origami module.",
"enabled": true
*/
	protected $fillable = [
		'name',
		'slug',
		'version',
		'description',
		'enabled',
		'order'
		];


// DEFINE Relationships --------------------------------------------------


}
