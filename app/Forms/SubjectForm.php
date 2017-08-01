<?php
/**
 * Created by PhpStorm.
 * User: leonardozaneladias
 * Date: 31/07/17
 * Time: 20:55
 */

namespace Laravue54\Forms;


use Kris\LaravelFormBuilder\Form;

class SubjectForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:255'
            ]);
    }

}