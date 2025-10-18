✅ Controller (Validation Input)
php artisan make:request AlternatifKriteriaRequest --resource
│   ├── app/Http/Requests/ ➡️ Form Request Validation
│   │   ├── Auth/
│   │   │   ├── LoginRequest.php
│   │   │   └── RegisterRequest.php
│   │   ├── User/
│   │   │   ├── RoleStoreRequest.php
│   │   │   ├── RoleUpdateRequest.php
│   │   │   ├── UserStoreRequest.php
│   │   │   ├── UserUpdateRequest.php
│   │   │   ├── ProfileStoreRequest.php
│   │   │   ├── ProfileUpdateRequest.php
│   │   │   ├── HobbyStoreRequest.php
│   │   │   ├── HobbyUpdateRequest.php
│   │   │   ├── HobbyProfileStoreRequest.php
│   │   │   └── HobbyProfileUpdateRequest.php
│   │   ├── DSS/
│   │   │   ├── AttributeStoreRequest.php
│   │   │   ├── AttributeUpdateRequest.php
│   │   │   ├── AlternativeStoreRequest.php
│   │   │   ├── AlternativeUpdateRequest.php
│   │   │   ├── CriterionStoreRequest.php
│   │   │   ├── CriterionUpdateRequest.php
│   │   │   ├── SubCriterionStoreRequest.php
│   │   │   ├── SubCriterionUpdateRequest.php
│   │   │   ├── AlternativeStoreRequest.php
│   │   │   └── AlternativeUpdateRequest.php

class UserStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nama' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ];
    }

    public function prepareForValidation()
    {
        if ($this->has('password')) {
            $this->merge([
                'password' => Hash::make($this->password),
            ]);
        }
        //
        $this->merge([
            'password' => Hash::make($this->password), // hash sebelum validasi
            'email' => strtolower($this->email),       // email jadi lowercase
        ]);
    }
}