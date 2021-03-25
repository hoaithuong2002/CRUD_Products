<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'id'=>'required|unique:products',
            'name'=>'required|',
            'description'=>'required|',
            'content'=>'required|',
            'image'=>'required',
            'price'=>'required|numeric',
            'category_id'=>'required',
        ];
    }

    public function messages()
    {
        $messages = [
            'id.required' => 'Không được để trống',
            'id.unique' => 'Mã số bị trùng',
            'name.required' => 'Không được để trống',
            'description.required' => 'Không được để trống',
            'content.required' => 'Nội dung không được để tr',
            'image.required' => 'Không được để trống',
            'price.numeric' => 'Giá này là số ',
            'category_id.required' => 'Không được để trống',

        ];
        return $messages;
    }
}
