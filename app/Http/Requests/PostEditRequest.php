<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest
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
            'Title'=>'unique:post,Title',
            'Slug'=>'unique:post,Slug',

            'Title'=>'unique:post,Title,'.$this->segment(5).',PostId',
            'Slug'=>'unique:post,Slug,'.$this->segment(5).',PostId',
        ];
    }

    public function messages()
    {
        return[
            'Title.unique'=>'Bất động sản đã tồn tại, vui lòng nhập một tên khác...',
            'Slug.unique'=>'Tên slug đã tồn tại, vui lòng nhập một tên khác...'
        ];        
    }
}
