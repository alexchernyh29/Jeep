@extends('welcome')

@section('content')
    <div class="container-e">
        <h3 class="create__title">Просмотр заявки!</h3>
        {!! Form::open(['route' => ['app.update']]) !!}
        {{Form::hidden('id', $app->id)}}
        <div class="edit-wrap">
            <div class="edit-up">
                <div class="form-group">
                    <p class="text-lk">Тип транспортного средства: {{$app->tip}}</p>
                </div>

                <div class="form-group">
                    <p class="text-lk">Марка авто: {{$app->marka}}</p>
                </div>

                <div class="form-group">
                    <p class="text-lk">Модель авто: {{$app->model}}</p>
                </div>

                <div class="form-group">
                    <p class="text-lk">Коробка: {{$app->korobka}}</p>
                </div>

                <div class="form-group">
                    <p class="text-lk">Модель авто: {{$app->fio}}</p>
                </div>
            </div>
            <div class="edit-up">
                <div class="form-group">
                    <p class="text-lk">Email: {{$app->email}}</p>
                </div>

                <div class="form-group">
                    <p class="text-lk">Телефон: {{$app->mobile}}</p>
                </div>

                <div class="form-group">
                    <p class="text-lk">Гос.Номер авто: {{$app->gos}}</p>
                </div>

                <div class="form-group">
                    <p class="text-lk">Степень застревания: {{$app->st}}</p>
                </div>

                <div class="form-group">
                    <p class="text-lk">Комментарий: {{$app->comment}}</p>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
