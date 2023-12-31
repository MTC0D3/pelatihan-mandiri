<?php

// namespace App\Actions\Fortify;

// use App\Models\User;
// use Illuminate\Support\Str;
// use Illuminate\Validation\Rule;
// use Spatie\Permission\Models\Role;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// use Laravel\Fortify\Contracts\CreatesNewUsers;

// class CreateNewUser implements CreatesNewUsers
// {
//     use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
//     public function create(array $input)
//     {
//         Validator::make($input, [
//             'nik' => [
//                 'required',
//                 'numeric',
//                 'digits:16',
//                 Rule::unique(User::class),
//             ],

//             'name' => ['required', 'string', 'max:255'],
            
//             'email' => [
//                 'required',
//                 'string',
//                 'email',
//                 'max:255',
//                 Rule::unique(User::class),
//             ],

//             'phone' => [
//                 'required',
//                 'regex:/^[0-9]{10,13}$/',
//                 Rule::unique(User::class),
//             ],
//             'password' => $this->passwordRules(),
//         ])->validate();

//         $role = Role::where('name', 'member')->first();

//         $user = User::create([
//             'name' => $input['name'],
//             'username' => $input['name'] .'-'. Str::random(6),
//             'nik'=> $input['nik'],
//             'phone' => $input['phone'],
//             'email' => $input['email'],
//             'password' => Hash::make($input['password']),
//         ]);

//         $user->assignRole($role);

//         return $user;
//     }
// }