<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input): User
    {
        Validator::make($input, [

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],

            'Academicyear' => [
                'required',
                'string',
                'max:255',
            ],

            'Savingsgoal' => [
                'required',
                'numeric',
                'min:0',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature()
                ? ['accepted', 'required']
                : '',

        ])->validate();

        $user = new User();

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->Academicyear = $input['Academicyear'];
        $user->Savingsgoal = $input['Savingsgoal'];

        $user->userrole = 'student';
        $user->Status = true;

        $user->password = Hash::make($input['password']);

        $user->save();

        return $user;
    }
}