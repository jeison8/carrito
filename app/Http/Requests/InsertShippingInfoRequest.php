<?php

namespace App\Http\Requests;

use App\User;
use App\Order;
use Illuminate\Foundation\Http\FormRequest;

class InsertShippingInfoRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zá-úÁ-ÚA-ZñÑ\s<]+$/u|min:2|max:100',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'document' => 'required|numeric|min:10000000|max:9999999999|unique:users,document,'.$this->user->id,
            'address' => 'required',
            'department' => 'required',
            'city' => 'required',
            'phone' => 'required|numeric|min:1000000|max:99999999999999',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'campo obligatorio.',
            'email.required' => 'campo obligatorio.',
            'document.required' => 'campo obligatorio.',
            'address.required' => 'campo obligatorio.',
            'department.required' => 'campo obligatorio.',
            'city.required' => 'campo obligatorio.',
            'phone.required' => 'campo obligatorio.',

            'name.regex' => 'los nombres no deben contener caracteres extraños',
            'email.email' => 'el formato de correo es incorrecto',
            'document.numeric' => 'solo admite numeros',
            'department.required' => 'campo obligatorio.',
            'city.required' => 'campo obligatorio.',
            'phone.numeric' => 'solo admite numeros',

            'email.unique' => 'ya existe esta direccion de correo',
            'document.unique' => 'este numero de identificacion ya existe',

            'phone.min' => 'contiene muy pocos digitos',
            'phone.max' => 'contiene muchos digitos',
        ];
    }

    public function insertShippingInfo(User $user, $requestId, $items, $total, $status)
    {
        $data = $this->validated();

        $idProducts = [];
        foreach ($items as $key => $value) {
            $idProducts[$key] = $value['sku'];
        }

        $response = $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'document' => '1130639818',
            'address' => $data['address'],
            'departments_id' => $data['department'],
            'cities_id' => $data['city'],
            'phone' => $data['phone'],
        ]);

        $order = Order::create([
            'users_id' => $user->id,
            'price' => $total,
            'products_id' => json_encode($idProducts),
            'requestId' => $requestId,
            'status' => $status,
        ]);
    }
}
