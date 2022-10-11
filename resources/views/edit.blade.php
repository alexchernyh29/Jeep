@extends('welcome')

@section('content')
    <div class="container-e">
        <h3 class="create__title">Просмотр заявки!</h3>
        {!! Form::open(['route' => ['user.update']]) !!}
        {{Form::hidden('id', $user->id)}}
        <div class="edit-wrap">
            <div class="edit-up">
                <div class="form-group">
                    {{Form::label('name', 'ФИО')}}
                    {{Form::text('name', $user->name, ['placeholder'=> '', 'class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('car', 'Марка авто')}}
                    {{Form::text('car', $user->car,['placeholder'=> '', 'class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('number', 'Номер телефона')}}
                    {{Form::text('number', $user->number, ['placeholder'=> '', 'class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('link', 'Ссылка на VK')}}
                    {{Form::text('link', $user->link, ['placeholder'=> '', 'class' => 'form-control'])}}
                </div>
                {{Form::submit('Сохранить изменения', ['class' => 'btn-success'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
