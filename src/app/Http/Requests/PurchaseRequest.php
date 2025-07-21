<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'pay' => 'required',
            'shopping_postal_code' => 'required',
            'shopping_address' => 'required',
            'shopping_building' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pay.required' => '支払い方法を選択してください',
            'shopping_postal_code.required' => '郵便番号を入力してください',
            'shopping_address.required' => '住所を入力してください',
            'shopping_building.required' => '建物名を入力してください',
        ];
    }
}
