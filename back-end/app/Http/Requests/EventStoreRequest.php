<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:60',
            'date' => 'required|date|date_format:Y-m-d',
            'location' => 'required|string|max:180',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.string' => 'Il nome deve essere una stringa',
            'name.max' => 'Il nome non deve superare i 60 caratteri',
            'date.required' => 'La data è obbligatoria',
            'date.date' => 'La data deve essere una data',
            'date.date_format' => 'La data deve essere formattata come anno-mese-giorno',
            'location.required' => 'La location è obbligatoria',
            'location.string' => 'La location deve essere una stringa',
            'location.max' => 'La location non deve superare i 180 caratteri'
        ];
    }
}
