<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png',
            'category_id' => 'required',
            'status' => 'required',
            'name' => 'required',
            'description' => 'required|max:255',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => '画像を選択してください',
            'image.image' => '画像ファイルをアップロードしてください',
            'image.mimes' => 'JPEGまたはPNG形式の画像をアップロードしてください',
            'category_id.required' => 'カテゴリーを選択してください',
            'status.required' => 'ステータスを選択してください',
            'name.required' => '商品名を入力してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '商品説明は255文字以内で入力してください',
            'price.required' => '価格を入力してください',
            'price.numeric' => '価格は数値で入力してください',
            'price.min' => '価格は0以上で入力してください',
        ];
    }
}
