<?php

namespace Laravue54\Forms;

use Kris\LaravelFormBuilder\Form;
use Laravue54\Models\User;

class UserForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:20'
            ])
            ->add('email', 'email', [
                'label' => 'E-mail',
                'rules' => "required|max:80|unique:users,email,{$id}"
            ])
            ->add('type', 'select', [
                'label' => 'Tipo de usuário',
                'choices' => $this->roles(),
                'rules' => 'required|in:'.implode(',', array_keys($this->roles())),
            ])
            ->add('send_mail', 'checkbox', [
                'label' => 'Enviar email de boas vindas',
                'value' => true,
                'checked' => false
            ]);

    }

    protected function roles()
    {
        return [
            User::ROLE_ADMIN => 'Administrador',
            User::ROLE_TEACHER => 'Professor',
            User::ROLE_STUDENT => 'Estudante',
        ];

    }
}
