require('./bootstrap');
$(document).ready(function (){ymaps.ready(init);})
// ymaps.ready(init);

function init () {
    const Marks = localStorage.getItem('marks') ? JSON.parse(localStorage.getItem('marks')) : [];

    //Определение начальных параметров карты
    var myMap = new ymaps.Map("map", {
        center: [51.730846, 36.193015],
        zoom: 13
    }, {
        balloonMaxWidth: 600
    });

    renderMarks(myMap);

    //Добавляем элементы управления
    myMap.controls.add('zoomControl');


    //Отслеживаем событие клик левой кнопкой мыши на карте
    myMap.events.add('click', function (e) {
        if (!myMap.balloon.isOpen()) {
            console.log(e);
            var coords = e.get('coordPosition');
            myMap.balloon.open(coords, {
                contentBody: '<div id="menu">\
                             <div id="menu_list">\
                                <label>Название:</label> <input type="text" class="input-medium" name="icon_text" /><br />\
                                 <label>Подсказка:</label> <input type="text" class="input-medium" name="hint_text" /><br />\
                                 <label>Балун:</label> <input type="text" class="input-medium" name="balloon_text" /><br />\
								 <div class="control-group"><label>Значок метки:</label>\
								 <div class="input-prepend"><span class="add-on"><img src="http://api.yandex.ru/maps/doc/jsapi/2.x/ref/images/styles/blue.png" style="height: 20px" /></span>\
								 </div>\
                             </div></div>\
                         <button class="btn btn-success">Сохранить</button>\
                         </div>'});
            Marks.push(coords);
            console.log('marks', Marks);
            var myPlacemark = new ymaps.Placemark(coords);

            //Добавляем картинку при выборе опции select
            $('#image').change(function(){
                $('.add-on').find('img:first').attr('src', $('#image option:selected').attr('data-path'));
            });

            //Сохраняем данные из формы
            $('body').delegate('#menu button', 'click' , function () {
                var iconText = $('input[name="icon_text"]').val(),
                    hintText = $('input[name="hint_text"]').val(),
                    balloonText = $('input[name="balloon_text"]').val();
                console.log(myPlacemark);
                //Добавляем метку на карту
                myMap.geoObjects.add(myPlacemark);


                //Изменяем свойства метки и балуна
                myPlacemark.properties.set({
                    iconContent: iconText,
                    hintContent: hintText,
                    balloonContent: balloonText
                });


                //Устанавливаем стиль значка метки
                // myPlacemark.options.set({
                //     preset: stylePlacemark
                // });

                //Закрываем балун
                myMap.balloon.close();

                localStorage.setItem('marks', JSON.stringify(Marks));
            });


        } else {
            myMap.balloon.close();
        }
    });
}

function renderMarks(myMap) {
    const marks = JSON.parse(localStorage.getItem('marks') || '[]')

    if (marks.length) {
        marks.forEach(coords => {
            const placeMark = new ymaps.Placemark(coords)
            myMap.geoObjects.add(placeMark);
        })
    }
}
