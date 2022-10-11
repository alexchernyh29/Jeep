@extends('layouts.app')

@section('content')
<div class="container-lk">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Приветствие') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h4 class="text-1">Мы очень рады что вы снами!</h4>
                        <h4 class="text-lk">Личная информация</h4>
                    @foreach ($user as $users)
                           <div class="wrap-lk">
                               <div class="wrap-lk_right">
                                   <img src="../images/lk.png" class="img-lk" alt="car=lk">
                               </div>
                               <div class="wrap-lk_left">
                                   <p class="text-lk">Имя: {{$users->name}}</p>
                                   <p class="text-lk">Марка авто: {{$users->car}}</p>
                                   <p class="text-lk">Номер телефона: {{$users->number}}</p>
                                   <p class="text-lk">Ссылка на Vk: {{$users->link}}</p>
                                </div>
                           </div>
                            <a class="btn btn-block btn-warning" href="{{ route('home.edit' ,$users->id) }}">Редактировать</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
