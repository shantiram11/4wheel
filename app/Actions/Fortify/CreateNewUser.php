<?php

namespace App\Actions\Fortify;

use App\Helpers\AppHelper;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'current_image'         => ['required','image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'identity_front'         => ['required','image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'identity_back'         => ['required','image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'password' => $this->passwordRules(),
        ])->validate();
    //  dd($input['current_image']);
        $currentImageName = AppHelper::renameImageFileUpload($input['current_image']);
        ($input['current_image'])->storeAs(
            'public/uploads/users', $currentImageName
        );
        $frontImageName = AppHelper::renameImageFileUpload($input['identity_front']);
        $input['identity_front']->storeAs(
            'public/uploads/users', $frontImageName
        );
        $backImageName = AppHelper::renameImageFileUpload($input['identity_back']);
        $input['identity_back']->storeAs(
            'public/uploads/users', $backImageName
        );
        return User::create([
            'name'              => $input['name'],
            'email'             => $input['email'],
            'current_image'     => $currentImageName,
            'identity_back'     => $backImageName,
            'identity_front'     => $frontImageName,
            'password'          => Hash::make($input['password']),
            'role_id'           => 3,
        ]);
    }
}
