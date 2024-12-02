<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #link-on-social-3;
        width: 14.2%;
        height: 50px;
        text-align: center;
    }

    th {
        background: #f0f0f0;
    }

    .active-cell {
        background-color: #2f5aff;
        font-weight: 600;
        color: #fff;
    }

    .not-active-cell {
        color: #e5e5e5;
        font-weight: normal;
        cursor: not-allowed !important;
    }

    .main-calendar-block {
        display: flex;
        justify-content: space-between;
    }

    .calendar-block_first,
    .calendar-block_second {
        width: 48%;
    }

    .calendar-block_second_element {
        display: flex;
        flex-direction: column;
    }

    .calendar-block_second_element button {
        border: none;
        height: 50px;
        background-color: #5C5C5C;
        color: #F0F0F0;
        text-transform: uppercase !important;
        cursor: pointer;
    }

    .calendar-block_second_element button:hover {
        background-color: #5C5C5C;
        color: #F0F0F0;
        font-weight: 600;
    }

    .calendar-block_second_element:not(:first-child) {
        margin-top: 16px;
    }

    .calendar-block_second input {
        height: 45px;
    }

    .fntz-fntw {
        font-size: 1.2em;
        font-weight: 600;
    }

    .spacer-h20 {
        height: 20px;
    }

    #customCalendar,
    #customCalendar2 {
        margin: 20px 0 0 0;
    }

    @media (max-width: 768px) {
        .main-calendar-block {
            flex-direction: column;
        }

        .calendar-block_first,
        .calendar-block_second {
            width: 100%;
        }

        .calendar-block_second {
            margin-top: 20px;
        }
    }

    .link-on-social-1 {
        display: flex;
        width: 100%;
    }

    .link-on-social-2 {
        width: 30%;
    }

    .link-on-social-3 {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        width: 50%;
    }

    .link-on-social-3 span {
        font-size: 50px;
        display: inline-block;
        animation: moveHand 1s ease-in-out 3;
    }

    @keyframes moveHand {
        0% {
            transform: translateX(0);
        }

        50% {
            transform: translateX(100px);
        }

        100% {
            transform: translateX(0);
        }
    }

    @media (max-width: 768px) {
        .link-on-social-2 {
            width: 60%;
        }

        .link-on-social-3 span {
            animation: moveHand 1s ease-in-out 6;
        }

        @keyframes moveHand {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(50px);
            }

            100% {
                transform: translateX(0);
            }
        }

    }

    span {
        font-size: 22px;
        margin-top: 10px;
    }

    .link-on-social a {
        font-weight: 300;
        color: #5C5C5C;
    }

    span .wh {
        color: #25D366;
    }

    span .tl {
        color: #5EB5F7;
    }

    span .vb {
        color: #7360F1;
    }

    .link-on-social:hover,
    span a:hover {
        transition: .5s;
        font-weight: 500;
        color: #2F5AFF;
    }
</style>

<div class="main-calendar-block">
    <div class="calendar-block_first">

        <span class="fntz-fntw" id="current-month-1"></span>
        <div id="customCalendar"></div>

        <div class="spacer-h20"></div>

        <span class="fntz-fntw" id="current-month-2"></span>
        <div id="customCalendar2"></div>

    </div>

    <div class="calendar-block_second">
        <div class="calendar-block_second_element">
            <span class="fntz-fntw">Дата экскурсии:</span>
            <div id="inpPeopleDate"></div>
        </div>

        <div class="calendar-block_second_element">
            <span>Количество человек:</span>
            <input type="number" id="inpNumberPeople" min="1" max="100" value="1">
        </div>

        <div class="calendar-block_second_element">
            <span>Ваше имя:</span>
            <input type="text" id="nameInBlockElem">
        </div>

        <div class="calendar-block_second_element">
            <span>Номер телефона:</span>
            <input type="tel" inputmode="numeric" pattern="[0-9]*" id="phoneInBlockElem">
        </div>

        <div class="calendar-block_second_element">
            <button type="submit" class="send-excursion">отправить</button>
        </div>

        <div class="calendar-block_second_element">
            <span style="display: none;" class="thank-you">
                Спасибо

                <br>
                <p>Продублируйте заявку в WhatsApp, или Telegram, или Viber, чтобы я могла вам ответить где и во
                    сколько
                    мы встречаемся.</p>

                <br><br>
                <hr>
                <br>
                <div class="link-on-social-1">
                    <div class="link-on-social-2">
                        <span class="wh link-on-social fab fa-whatsapp">
                            <a
                                href="https://api.whatsapp.com/send/?phone=393881765402&amp;text=Здравствуйте%20Татьяна,%20я%20забронировал%20экскурсию,%20дублирую%20в%20WhatsApp%20как%20вы%20и%20просили.&amp;type=phone_number&amp;app_absent=0">
                                WhatsApp</a> </span>
                        <br>
                        <span class="tl link-on-social fab fa-telegram-plane">
                            <a href="https://t.me/priroda01"> Telegram</a> </span>
                        <br>
                        <span class="vb link-on-social fab fa-viber">
                            <a href="viber://chat?number=%2B393881765402"> Viber</a> </span>
                    </div>
                    <div class="link-on-social-3">
                        <span class="fas fa-hand-point-left"> </span>
                    </div>
                </div>
            </span>

        </div>

        <div class="calendar-block_second_element">
            <span style="display: none; color:#e6ad00;" class="warning">Заполните все поля!</span>
        </div>

        <div class="calendar-block_second_element">
            <span style="display: none; color:orangered;" class="error">Ошибка отправки данных. Попробуйте позже.</span>
        </div>


    </div>
</div>


<script>
    // Получаем данные из PHP
    let currentYear1 = parseInt("<?php echo esc_html( get_field('current_Year_1') ); ?>", 10);
    let currentYear2 = parseInt("<?php echo esc_html( get_field('current_Year_2') ); ?>", 10);

    let specifyMonth1 = "<?php echo esc_html( get_field('specify_month_1') ); ?>";
    let specifyMonth2 = "<?php echo esc_html( get_field('specify_month_2') ); ?>";

    // Разделяем строки, чтобы получить номер и название месяца
    let [monthNumberStr1, monthName1] = specifyMonth1.split(' ');
    let [monthNumberStr2, monthName2] = specifyMonth2.split(' ');

    let monthNumber1 = parseInt(monthNumberStr1, 10);
    let monthNumber2 = parseInt(monthNumberStr2, 10);

    // Устанавливаем названия месяцев над календарями
    document.getElementById('current-month-1').innerHTML = `${currentYear1} ${monthName1}`;
    document.getElementById('current-month-2').innerHTML = `${currentYear2} ${monthName2}`;

    // Функция для создания календаря
    function createCalendar(elem, year, month) {
        const mon = month - 1; // Месяцы в JS от 0 до 11
        const d = new Date(year, mon);

        let table = '<table><tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th><th>Вс</th></tr><tr>';

        // Пробелы для первого ряда
        for (let i = 0; i < getDay(d); i++) {
            table += '<td></td>';
        }

        // Ячейки с датами
        while (d.getMonth() === mon) {
            table += `<td>${d.getDate()}</td>`;
            if (getDay(d) % 7 === 6) { // Воскресенье, конец строки
                table += '</tr><tr>';
            }
            d.setDate(d.getDate() + 1);
        }

        // Пробелы для последнего ряда
        if (getDay(d) !== 0) {
            for (let i = getDay(d); i < 7; i++) {
                table += '<td></td>';
            }
        }

        table += '</tr></table>';
        elem.innerHTML = table;
    }

    function getDay(date) { // Получаем день недели (с Пн = 0)
        let day = date.getDay();
        return day === 0 ? 6 : day - 1;
    }

    // Создаем календари
    createCalendar(document.getElementById('customCalendar'), currentYear1, monthNumber1);
    createCalendar(document.getElementById('customCalendar2'), currentYear2, monthNumber2);

    // Элементы календарей и формы
    let calendarCells1 = document.querySelectorAll('#customCalendar td');
    let calendarCells2 = document.querySelectorAll('#customCalendar2 td');

    let inpPeopleDate = document.getElementById('inpPeopleDate');
    let inpNumberPeople = document.getElementById('inpNumberPeople');
    let nameInBlockElem = document.getElementById('nameInBlockElem');
    let phoneInBlockElem = document.getElementById('phoneInBlockElem');

    let clickDates = [];

    // Функция для обработки кликов по ячейкам календаря
    function setupCalendarClicks(cells, monthName) {
        for (let cell of cells) {
            let day = cell.innerHTML.trim();

            if (day) {
                // Проверяем, не является ли ячейка неактивной
                if (!cell.classList.contains('not-active-cell')) {
                    cell.style.cursor = 'pointer';
                }

                cell.addEventListener('click', function () {
                    // Проверяем, не является ли ячейка неактивной
                    if (cell.classList.contains('not-active-cell')) {
                        return; // Выходим из функции, если ячейка неактивна
                    }

                    cell.classList.toggle('active-cell');

                    let date = `${day} ${monthName.slice(0, 3).toLowerCase()}`;

                    if (cell.classList.contains('active-cell')) {
                        if (!clickDates.includes(date)) {
                            clickDates.push(date);
                        }
                    } else {
                        let index = clickDates.indexOf(date);
                        if (index !== -1) {
                            clickDates.splice(index, 1);
                        }
                    }

                    inpPeopleDate.innerHTML = clickDates.join(', ');
                });
            }
        }
    }

    // Функция для пометки нерабочих дней
    function markNonWorkingDays(nonWorkingDaysArray, cells) {
        for (let cell of cells) {
            let day = cell.innerHTML.trim();
            if (nonWorkingDaysArray.includes(day)) {
                cell.classList.add('not-active-cell');
            }
        }
    }

    // Функция для пометки прошедших дней
    function markPastDays(cells, calendarYear, calendarMonth) {
        let today = new Date();
        today.setHours(0, 0, 0, 0); // Сбрасываем время

        for (let cell of cells) {
            let day = parseInt(cell.innerHTML.trim(), 10);
            if (!isNaN(day)) {
                let cellDate = new Date(calendarYear, calendarMonth - 1, day);
                if (cellDate <= today) {
                    cell.classList.add('not-active-cell');
                }
            }
        }
    }

    // Функция для отключения пустых ячеек
    function disableEmptyCells(cells) {
        for (let cell of cells) {
            if (!cell.innerHTML.trim()) {
                cell.classList.add('not-active-cell');
            }
        }
    }

    // Получаем нерабочие дни из PHP
    let nonWorkingDays1 = "<?php echo esc_html( get_field('non_working_days_1') ); ?>";
    let nonWorkingDays2 = "<?php echo esc_html( get_field('non_working_days_2') ); ?>";
    let nonWorkingDaysArr1 = nonWorkingDays1.split('-');
    let nonWorkingDaysArr2 = nonWorkingDays2.split('-');

    // Помечаем нерабочие дни и прошедшие даты для обоих календарей
    markNonWorkingDays(nonWorkingDaysArr1, calendarCells1);
    markNonWorkingDays(nonWorkingDaysArr2, calendarCells2);
    markPastDays(calendarCells1, currentYear1, monthNumber1);
    markPastDays(calendarCells2, currentYear2, monthNumber2);
    disableEmptyCells(calendarCells1);
    disableEmptyCells(calendarCells2);

    // Настраиваем обработчики кликов после того, как пометили неактивные ячейки
    setupCalendarClicks(calendarCells1, monthName1);
    setupCalendarClicks(calendarCells2, monthName2);

    // Валидация номера телефона (пример простой валидации)
    phoneInBlockElem.addEventListener('input', function (e) {
        let phone = e.target.value;
        // Разрешаем только цифры и символы '+', '-', '(', ')', ' '
        phone = phone.replace(/[^0-9+\-() ]/g, '');
        e.target.value = phone;
    });

    // Принудительный знак "+"
    phoneInBlockElem.value += "+";
    let countPlusSymbol = 0;
    phoneInBlockElem.addEventListener('input', function () {
        if (phoneInBlockElem.value[0] != "+") {
            phoneInBlockElem.value += "+";
        }
        if (phoneInBlockElem.value[0] != '+') {
            phoneInBlockElem.value = "";
            phoneInBlockElem.value += "+";
        }

    });

    // -***----***-*--*-** AJAX --*-*-*-*-***-----**-*---**

    // JavaScript: сбор данных и отправка через AJAX
    document.querySelector('.send-excursion').addEventListener('click', function (e) {
        e.preventDefault(); // Предотвращаем перезагрузку страницы

        // Собираем данные из формы
        const numberOfPeople = document.getElementById('inpNumberPeople').value.trim();
        const excursionDate = document.getElementById('inpPeopleDate').textContent.trim();
        const names = document.getElementById('nameInBlockElem').value.trim();
        const phoneNumber = document.getElementById('phoneInBlockElem').value.trim();

        // Проверяем, что все данные заполнены
        if (!numberOfPeople || !excursionDate || !names || !phoneNumber) {
            document.querySelector('.warning').style.display = 'block';
            setInterval(() => {
                document.querySelector('.warning').style.display = 'none';
            }, 3000);
            return;
        }

        // Проверка корректности номера телефона (пример)
        const phoneRegex = /^[0-9+\-() ]+$/;
        if (!phoneRegex.test(phoneNumber)) {
            alert('Введите корректный номер телефона.');
            return;
        }

        // Отправляем данные через AJAX
        fetch('/wp-admin/admin-ajax.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'send_excursion_data', // Имя действия для WordPress
                number_of_people: numberOfPeople,
                excursion_date: excursionDate,
                names: names,
                phone_number: phoneNumber,
            }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector('.thank-you').style.display = 'block';
                    // setInterval(() => {
                    //     document.querySelector('.thank-you').style.display = 'none';
                    // }, 3000);
                    // Очистка полей формы при необходимости
                    inpNumberPeople.value = '1';
                    inpPeopleDate.innerHTML = '';
                    nameInBlockElem.value = '';
                    phoneInBlockElem.value = '';
                    clickDates = [];

                    // Убираем выделение с ячеек календаря
                    document.querySelectorAll('.active-cell').forEach(cell => {
                        cell.classList.remove('active-cell');
                    });
                } else {
                    document.querySelector('.error').style.display = 'block';
                    setInterval(() => {
                        document.querySelector('.error').style.display = 'none';
                    }, 3000);
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert('Произошла ошибка.');
            });
    });

</script>