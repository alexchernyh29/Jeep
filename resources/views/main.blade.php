@extends('welcome')

@section('content')
    <div class="promo">
        <div class="content">
            <div class="promo_text">
                <p class="text">Застрял в снегу или грязи? - Оставляйте заявку</p>
                <p class="text-1">Помогаем БЕСПЛАТНО! КРУГЛОСУТОЧНО!<br>🛑"Прикурить, дотащить до заправки" - не выезжаем!</p>
                <p class="text-1">Контакты:<br>http//vk.com<br>+7-920-999-99-99</p>
                <a class="btn-1" href="{{route('app.create')}}">Создать заявку</a>
            </div>
                <img src="../images/1.png" class="img-1" alt="car">
        </div>
        <div class="map" style="position:relative;">
            <div style="position:absolute; top: 0;left: 0; width: 1400px; height: 600px; z-index: 1; "></div>
            <div id="map" style="margin: 0 auto; width: 1400px; height: 600px"></div>
        </div>
        <div class="footer">
            <div class="footer-wrap">
                <p class="footer-title">Курск, 2022</p>
                <p class="footer-title">Российская Федерация</p>
                <p class="footer-text">Остались вопросы? Обращайтесь!</p>
                <p class="footer-text">autohelp46@yandex.ru</p>
            </div>
        </div>
    </div>
@endsection
