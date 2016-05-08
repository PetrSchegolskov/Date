# DateFormat
Класс для работы с датами на русском языке
deprecated

Для вывода даты на русском языке можно использовать стандартную функцию strftime, установив локаль: 

setlocale(LC_ALL, 'ru_RU.UTF-8');
strftime('%e %b. %A. Начало в %H:%M', strtotime( $date ))

Ссылки:
http://php.net/strftime
https://php.ru/forum/threads/data-na-russkom-jazyke.37809/
