<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'alias' => 'required|min:3|max:255|unique:products,alias',
            'title' => 'required|min:3|max:255',
            'price' => 'required|numeric|min:1',
            'desc' => 'required|min:5',
            'img' => 'image'
        ];

        if ($this->route()->named('admin.products.update')) {
            $rules['alias'] .= ',' . $this->route()->parameter('product')->id;
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'alias' => 'Ссылка',
            'title' => 'Название',
            'price' => 'Цена',
            'desc' => 'Описание',
            'img' => 'Картинка',
        ];
    }
}
