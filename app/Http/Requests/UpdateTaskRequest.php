<?php

namespace App\Http\Requests;

use Brick\Math\BigInteger;
use Faker\Provider\Text;
use Illuminate\Foundation\Http\FormRequest;
/**
 * @property BigInteger id
 * @property BigInteger user_id
 * @property BigInteger category_id
 * @property BigInteger progress_id
 * @property BigInteger priority_id
 * @property string     subject
 * @property Text       description
 */
class UpdateTaskRequest extends FormRequest
{
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
            'id'            => 'required|exists:tasks,id',
            'user_id'       => 'required|exists:users,id',
            'category_id'   => 'required|exists:categories,id',
            'progress_id'   => 'required|exists:progresses,id',
            'priority_id'   => 'required|exists:priorities,id',
            'subject'       => 'nullable',
            'description'   => 'nullable'
        ];
    }
}
