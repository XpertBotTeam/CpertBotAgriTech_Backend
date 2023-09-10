<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiseaseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'causal_agent'=>'required|string|max:255',
            'transmission'=>'required|string|max:255',
            'prevention'=>'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'diagnosis'=>'required|string|max:255',
            'treatment'=> 'required|string|max:255'
        ];

    }
}
// $table->text('description');
// $table->text('causal_agent');
// $table->text('transmission');
// $table->text('prevention');
// $table->text('symptoms');
// $table->text('diagnosis');
// $table->text('treatment');
