<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=>'required|min:3|alpha',
            'body'=>'required',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'title.required'=>'العنوان مطلوب',
    //         'title.min'=>'يجب ان يحتوي على الاقل 3',
    //         'title.alpha'=>'يجب الا يحتوي على ارقام',
    //         'body'=>'المحتوى مطلوب',
    //     ];
    // }
}
