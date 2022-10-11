@extends('welcome')

@section('content')
    <div class="create__vh">
    <table class="table-index">
        <tr>
            <th scope="col">Тип транспортного средства</th>
            <th scope="col">Марка</th>
            <th scope="col">Модель</th>
            <th scope="col">Коробка</th>
            <th scope="col">Гос.Номер</th>
            <th scope="col">Степень застревания</th>
            <th scope="col">Комментарий</th>
            <th scope="col">Действия</th>
        </tr>
        @foreach ($app as $idx => $one_app)
            <tbody>
            <tr>
                <td>
                    {{$one_app->tip}}
                </td>
                <td>
                    {{$one_app->marka}}
                </td>
                <td>
                    {{$one_app->model}}
                </td>
                <td>
                    {{$one_app->korobka}}
                </td>
                <td>
                    {{$one_app->gos}}
                </td>
                <td>
                    {{$one_app->st}}
                </td>
                <td>
                    {{$one_app->comment}}
                </td>
                <td>
                    <a href="{{route('app.destroy', ['id' => $one_app->id])}}" class="btn btn-block btn-danger js-delete" data-idx="{{$idx}}">Закрыть заявку!</a>
                    <a class="btn btn-block btn-warning" href="{{ route('app.edit' ,$one_app->id) }}">Просмотреть заявку</a>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    </div>
    <script>
        const marks = JSON.parse(localStorage.getItem('marks') || '[]')

        document.querySelector('.table-index').addEventListener('click', (e) => {
            if (e.target.classList.contains('js-delete')) {
                marks.splice(e.target.dataset.idx, 1)

                localStorage.setItem('marks', JSON.stringify(marks))
            }
        })
    </script>
@endsection
