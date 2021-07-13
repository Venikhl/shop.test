<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_id' => [
                'nullable', Rule::exists((new Category)->getTable(), 'id')
            ],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0.01']
        ];
    }

    function validated()
    {
        $data = parent::validated();
        $data['price'] = (int)($this->price * 100);
        return $data;
    }
}
