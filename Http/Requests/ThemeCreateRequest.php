<?php
namespace App\Modules\Origami\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Config;

class ModuleCreateRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'slug'						=> 'required|alpha_num',
		];
	}

}
