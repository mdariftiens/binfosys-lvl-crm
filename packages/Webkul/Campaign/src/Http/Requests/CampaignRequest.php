<?php

namespace Webkul\Campaign\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['require',"max:255"],
            'type'=>['require'],
            'description'=>['nullable'],
            'message'=>['required'],
            'status'=>['required'],
            'start_date'=>['required','date'],
            'end_date'=>['required','date'],
            'package_id'=>['required','integer'],
        ];
    }
}
