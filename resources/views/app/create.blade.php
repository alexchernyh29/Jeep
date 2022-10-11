@extends('welcome')

@section('content')
<div class="create__vh">
    <div class="container__create">
        <h3 class="create__title">Создание заявки!</h3>
        <p class="create__step">1/3 шаг заявки</p>
        {!! Form::open(['route' => ['app.store']]) !!}
        <h4 class="create__step">Транспортное средство</h4>
        <div class="create__wrap">
            <div class="form-car">
                <div class="form-group">
                    <div class="form__title">{{Form::label('tip', 'Тип транспортного средства')}}</div>
                    <div>{{Form::text('tip', null, ['placeholder'=> 'Тип транспортного средства', 'class' => 'form-control_2'])}}</div>
                </div>
                <div class="form-group">
                    <div class="form__title">{{Form::label('marka', 'Марка')}}</div>
                    <div>{{Form::text('marka', null,['placeholder'=> 'Марка', 'class' => 'form-control_2'])}}</div>
                </div>
            </div>
            <div class="form-car">
                <div class="form-group">
                    <div class="form__title">{{Form::label('model', 'Модель')}}</div>
                    <div>{{Form::text('model', null, ['placeholder'=> 'Модель', 'class' => 'form-control_2'])}}</div>
                </div>
                <div class="form-group">
                    <div class="form__title">{{Form::label('korobka', 'Коробка')}}</div>
                    <div>{{Form::text('korobka', null, ['placeholder'=> 'Коробка', 'class' => 'form-control_2'])}}</div>
                </div>
            </div>
        </div>
        <div class="create__wrap">
            <div class="create__left">
                <p class="create__step">2/3 шаг заявки</p>
                <p class="business__form-title">Форма обратной связи</p>
                <p class="business__form-info">Для создания заявки нам требуется ваша контактная информация</p>
                <div class="form-group">
                    <div class="form__title">{{Form::label('fio', 'Введите ФИО')}}</div>
                    <div>{{Form::text('fio', null, ['placeholder'=> 'Введите ФИО', 'class' => 'form-control_2'])}}</div>
                </div>

                <div class="form-group">
                    <div class="form__title">{{Form::label('email', 'Введите Email')}}</div>
                    <div>{{Form::text('email', null, ['placeholder'=> 'Введите Email', 'class' => 'form-control_2'])}}</div>
                </div>

                <div class="form-group">
                    <div class="form__title">{{Form::label('mobile', 'Телефон')}}</div>
                    <div>{{Form::text('mobile', null, ['placeholder'=> 'Телефон', 'class' => 'form-control_2'])}}</div>
                </div>
            </div>
            <div class="create__right">
                <div class="create__img"> <img src="/images/2.png" /></div>
            </div>
        </div>
        <p class="create__step">3/3 шаг заявки</p>
        <div class="create__wrap-last">
            <div class="create__left">
                <div class="form-group">
                    <div class="form__title">{{Form::label('gos', 'Гос.Номер')}}</div>
                    <div>{{Form::text('gos', null, ['placeholder'=> 'Гос.Номер', 'class' => 'form-control_2'])}}</div>
                </div>
                <div class="form-group">
                    <div class="form__title">{{Form::label('st', 'Степень застревания')}}</div>
                    <div>{{Form::text('st', null, ['placeholder'=> 'Степень застревания', 'class' => 'form-control_2'])}}</div>
                </div>
                <div class="form-group_1">
                    <div class="form__title">{{Form::label('comment', 'Опишите проблему и желаемые работы по вашему авто')}}</div>
                    <div>{{Form::text('comment', null, ['placeholder'=> 'Оставьте комментарий', 'class' => 'form-control_1'])}}</div>
                </div>
            </div>
            <div class="create__right">
                <div class="map">
                    <div id="map" style="width: 500px; height: 300px"></div>
                </div>
            </div>
        </div>
        <div class="business__mailing">
            <input type="checkbox" checked="checked" class="business__mailing-check" />
            <p class="business__mailing-info">Получать информационную рассылку о новостях и мероприятияx АвтоHelp</p>
        </div>
        <div class="business__actions">
            <p class="business__agree">Нажимая кнопку &laquo;Отправить&raquo; вы&nbsp;соглашаетесь с&nbsp;<a href="/privacy">политикой конфиденциальности</a> и&nbsp;<a href="/privacy">соглашением об&nbsp;использовании сайта</a></p>
        </div>
    {{Form::submit('Создать', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}

    </div>
@endsection
