@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3 style="float: left">Listagem de turmas</h3>
            <div style="float: right">
                {!! Button::primary('Nova turma')->asLinkTo(route('admin.class_informations.create')) !!}
            </div>

        </div>
        <div class="row">
            {!!
            Table::withContents($class_informations->items())
            ->striped()
            ->callback('Ações', function($field,$model){
                $linkEdit = route('admin.class_informations.edit',['class_information' => $model->id]);
                $linkShow = route('admin.class_informations.show',['class_information' => $model->id]);
                return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                    Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
            })
            !!}
        </div>

        {!! $class_informations->links() !!}
    </div>
@endsection