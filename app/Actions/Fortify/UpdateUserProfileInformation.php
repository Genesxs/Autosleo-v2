<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use App\Models\Cliente;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user,  array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:350'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'nombres' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:150'],
            'direccion' => ['required', 'string', 'max:500'],
            'celular' => ['required', 'string', 'max:10'],
            'telefono' => ['nullable', 'string', 'max:7'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {

            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'nombres' => $input['nombres'],
                'apellidos' => $input['apellidos'],
                'direccion' => $input['direccion'],
                'celular' => $input['celular'],
                'telefono' => $input['telefono'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
