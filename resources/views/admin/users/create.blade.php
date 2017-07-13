@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Novo usuário</h3>
            {!!   form($form
                        ->add('insert', 'submit', ['attr' => ['class' => 'btn btn-primary btn-block'], 'label' => Icon::floppy_disk()." Salvar"]))
            !!}
        </div>
    </div>
@endsection