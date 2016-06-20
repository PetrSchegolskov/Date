# DateFormat
Класс для работы с датами на русском языке
deprecated

Для вывода даты на русском языке можно использовать стандартную функцию strftime, установив локаль: 

```
setlocale(LC_ALL, 'ru_RU.UTF-8');
strftime('%e %b. %A. Начало в %H:%M', strtotime( $date ))
```


Можно стандартным php модулем intl

```
$formatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
$formatter->setPattern('d MMMM');
echo $formatter->format(new DateTime()); // 22 января
echo $formatter->format(new DateTime('05-03-2013')); // 5 марта
```

Ссылки:
http://php.net/strftime
https://php.ru/forum/threads/data-na-russkom-jazyke.37809/
https://toster.ru/q/32933
