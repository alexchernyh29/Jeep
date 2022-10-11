@extends('welcome')

@section('content')
    <div class="container-e">
        <h3 class="create__title">Редактирование пользователя!</h3>
        {!! Form::open(['route' => ['user.update']]) !!}
        {{Form::hidden('id', $user->id)}}
        <div class="edit-wrap">
            <div class="edit-up">
                <div class="form-group">
                    {{Form::label('tip', 'Тип транспортного средства')}}
                    {{Form::text('tip', $user->name, ['placeholder'=> '', 'class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('marka', 'Марка авто')}}
                    {{Form::text('marka', $user->car,['placeholder'=> '', 'class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('model', 'Модель')}}
                    {{Form::text('model', $user->number, ['placeholder'=> '', 'class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('korobka', 'Коробка')}}
                    {{Form::text('korobka', $user->link, ['placeholder'=> '', 'class' => 'form-control'])}}
                </div>
                {{Form::submit('Сохранить изменения', ['class' => 'btn-success'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
