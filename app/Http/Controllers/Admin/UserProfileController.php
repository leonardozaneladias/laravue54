<?php

namespace Laravue54\Http\Controllers\Admin;

use Laravue54\Forms\UserProfileForm;
use Laravue54\Http\Controllers\Controller;
use Laravue54\Models\User;

class UserProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Laravue54\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $form = \FormBuilder::create(UserProfileForm::class, [
            'url' => route('admin.users.profile.update', ['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user->profile,
            'data' => ['user' => $user]
        ]);
        return view('admin.users.profile.edit', compact('form'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravue54\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $form = \FormBuilder::create(UserProfileForm::class);
        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        //dd($user-);
        $user->profile->address?$user->profile->update($data):$user->profile()->create($data);
        session()->flash('message', 'Perfil alterado com sucesso.');
        return redirect()->route('admin.users.profile.update', ['user' => $user->id]);
    }
}
