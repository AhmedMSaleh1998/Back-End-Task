<?php

namespace App\Http\Requests\Api\Product;

use Illuminate\Foundation\Http\FormRequest;

class AssignProductsToUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user_id = $this->request->get('user_id');

        return [
            'user_id'  => 'required|exists:users,id',
            "products"    => "required|array",
            "products.*"  => "required|exists:products,id|unique:product_user,product_id,' .$user_id,",
        ];
    }
}
