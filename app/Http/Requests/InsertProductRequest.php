<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class InsertProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'img' => 'required|image|mimes:jpeg,png,jpg',
            'name' => 'required|regex:/^[a-zá-úÁ-ÚA-ZñÑ\s<]+$/u|min:2|max:100',
            'price' => 'required|Integer',
            'detail' => 'required',
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'img.required' => 'campo obligatorio.',
            'name.required' => 'campo obligatorio.',
            'price.required' => 'campo obligatorio.',
            'detail.required' => 'campo obligatorio.',
            'category.required' => 'campo obligatorio.',

            'img.image' => 'Debes seleccionar una imagen en jpg o png',
            'name.regex' => 'los nombres no deben contener caracteres extraños',
            'price.integer' => 'El precio no debe contener comas ni puntos',

        ];
    }

    public function insertProduct($request)
    {
        $path = Storage::disk('public')->put('img', $request->file('img'));

        Product::create([
            'img' => $path,
            'name' => $request->name,
            'price' => $request->price,
            'detail' => $request->detail,
            'categories_id' => $request->category,
        ]);
    }
}
