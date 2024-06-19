<?php

namespace App\Http\Requests\Teams;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'title_innovation' => 'nullable|string',
            'category_innovation' => 'nullable|string',
            'name_leader' => 'nullable|string',
            'nik_leader' => 'nullable|string',
            'work_unit' => 'nullable|string',
            'name_member_1' => 'nullable|string',
            'nik_member_1' => 'nullable|string',
            'name_member_2' => 'nullable|string',
            'nik_member_2' => 'nullable|string',
            'name_member_3' => 'nullable|string',
            'nik_member_3' => 'nullable|string',
            'name_member_4' => 'nullable|string',
            'nik_member_4' => 'nullable|string',
            'name_member_5' => 'nullable|string',
            'nik_member_5' => 'nullable|string',
        ];
    }
}
