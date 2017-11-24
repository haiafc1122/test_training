<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreateRequest extends FormRequest
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
        $client = request()->route('client');

        return [
            'title'        => 'required|max:255|string',
            'started_date' => 'required',
            'end_date'     => 'required',
            'url'          => 'required|unique:clients' . (!$client ? '' : ',url,' . $client->id),
            'banner'       => 'required',
            'point_num'    => 'required|integer',
            'rate'         => 'required|integer',
            'description'  => 'max:255|string',
        ];
    }
}
