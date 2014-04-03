# php-su

Библиотека представляет собой собрание довольно примитивных функций, упрощающих работу со строками, и единственной своей целью имеет сократить количество копипаста в коде.

Кроме того, библиотека рассчитана на работу с русским языком: транслит, читабельный размер файла и выбор подходящей словоформы для числа будут работать только с ним.

**php-su** не заведётся, если у вас нет:
* PHP >= 5.3
* mbstring

# Возможности

## su::startsWith($s, $p)
Проверить, начинается ли строка $s с подстроки $p.

**Пример:**
``` php
<?php
var_dump(su::startsWith('you spin me baby right round', 'you spin'));
```

**Результат:**
``` php
<?php
true
```

## su::endsWith($s, $p)
Проверить, заканчивается ли строка $s подстрокой $p.

**Пример:**
``` php
<?php
var_dump(su::endsWith('you spin me baby right round', 'right'));
```

**Результат:**
``` php
<?php
false
```

## su::glue($p, $s1, $s2 [, $start = false [, $end = false]])
Объединить две строки $s1 и $s2 в одну, используя соединительную строку $p. При этом результирующая строка на стыке $s1 и $s2 будет содержать ровно одну $p.
Если необязательные аргументы $start и $end равны true, строка $p будет добавлена в начале и конце результирующей строки соответственно.

Метод удобен при создании путей.

**Пример:**
``` php
<?php
var_dump(su::glue('/', '/home/' '/m4', true, true));
```

**Результат:**
``` php
<?php
'/home/m4/'
```

## su::shorten($s, $len)
Сократить строку до $len символов.
Сокращение производится за счёт вырезания середины строки таким образом, чтобы длина конечной строки была равна или меньше $len.
Левая и правая части строки объединяются строкой $separator, кроме того в местах объединения строк удаляются пробелы.

**Пример:**
``` php
<?php
var_dump(su::shorten('you spin me baby right round', 11));
```

**Результат:**
``` php
<?php
'you...ound'
```

## su::ucfirst($s)
Привести первый символ строки к верхнему регистру.

**Пример:**
``` php
<?php
var_dump(su::ucfirst('тест'));
```

**Результат:**
``` php
<?php
'Тест'
```

## su::lcfirst($s)
Привести первый символ строки к нижнему регистру.

**Пример:**
``` php
<?php
var_dump(su::lcfirst('Тест'));
```

**Результат:**
``` php
<?php
'тест'
```

## su::ucwords($s)
Привести к верхнему регистру первый символ каждого слова в строке.

**Пример:**
``` php
<?php
var_dump(su::ucwords('тест тест тест'));
```

**Результат:**
``` php
<?php
'Тест Тест Тест'
```

## su::lcwords($s)
Привести к нижнему регистру первый символ каждого слова в строке.

**Пример:**
``` php
<?php
var_dump(su::ucwords('Тест Тест Тест'));
```

**Результат:**
``` php
<?php
'тест тест тест'
```

## su::cutOnSpace($s, $len [, $append = '...'])
Обрезать строку по ближайшему справа от позиции $len пробелу и добавить к концу результирующей строки $append.
Если пробел не найден, будет выведена вся строка.

**Пример:**
``` php
<?php
var_dump(su::cutOnSpace('you spin me baby right round', 5));
```

**Результат:**
``` php
<?php
'you spin...'
```

## su::caseForNumber($number, $cases)
Выбрать подходящую для числа $number словоформу из $cases.
$cases имеет вид:
``` php
<?php
array(
  'штука',
  'штуки',
  'штук'
);
```

**Пример:**
``` php
<?php
var_dump(su::caseForNumber(15, array('штука', 'штуки', 'штук')));
```

**Результат:**
``` php
<?php
'штук'
```

## su::translit($s)
Транслитерировать строку.

**Пример:**
``` php
<?php
var_dump(su::translit('циско'));
```

**Результат:**
``` php
<?php
'tsisko'
```

## su::fileSize($size)
Получить размер файла с единицами измерения.
Если размер дробный, он округляется до первого разряда после запятой.

**Пример:**
``` php
<?php
var_dump(su::fileSize(6667666));
```

**Результат:**
``` php
<?php
'6.4 МБ'
```

## su::fileName($s)
Получить web-safe имя файла.
Во-первых исходное имя файла будет транслитерировано, во-вторых все пробелы будут заменены на дефис, в-третьих все символы, не входящие в набор a-z0-9._- будут удалены.

**Пример:**
``` php
<?php
var_dump(su::fileName('Милые котики!.jpg'));
```

**Результат:**
``` php
<?php
'Milie-kotiki.jpg'
```

## su::drutaion($interval)
Получить человекопонятное представление интервала в секундах.
Представление может быть в двух видах - полном (1 час 3 минуты 5 секунд) или сокращённом (1ч 3м 5с).
По умолчанию используется первый вариант.

**Пример:**
``` php
<?php
var_dump(su::duration(3785));
```

**Результат:**
``` php
<?php
'1 час 3 минуты 5 секунд'
```

## su::isUrl($s)
Проверить, является ли строка URL.
Допустимы следующие шаблоны:
*   scheme://host/path
*   scheme://host/
*   scheme://host
*   host/path
*   host/
*   host
При этом scheme может состоять только из латиницы и цифр, host может состоять из произвольных букв, цифр и некоторых спецсимволов (.-), а path может содержать любые символы, кроме пробела.

**Пример:**
``` php
<?php
var_dump(su::isUrl('яндекс.рф/я-люблю-кириллические-домены'));
```

**Результат:**
``` php
<?php
true
```

## su::isEmail($s)
Проверить, является ли строка e-mail.
Фактически проверяется только отсутствие пробелов в строке и наличие символа @ внутри строки.

**Пример:**
``` php
<?php
var_dump(su::isEmail('дима@кремль.рф'));
```

**Результат:**
``` php
<?php
true
```

## su::isPhone($s [, $minLen = 7 [, $maxLen = 11]])
Проверить, является ли строка телефонным номером.
Для проверки из строки удаляются пробелы, дефисы, плюсы и скобки и сравнивается длина полученной строки с предельными длинами, указанными в аргументах.

**Пример:**
``` php
<?php
var_dump(su::isPhone('+7(916)666-66-66'));
```

**Результат:**
``` php
<?php
true
```

## su::normalizeUrl($s [, $scheme = 'http'])
Привести URL к стандартному виду.
Перед изменением URL строка проверяется через su::isUrl и если проверка не пройдена, возвращается null.
Если у исходного URL не указана схема, подставляется схема из аргумента $scheme.

**Пример:**
``` php
<?php
var_dump(su::normalizeUrl('яндекс.рф/я-люблю-кириллические-домены'));
```

**Результат:**
``` php
<?php
'http://яндекс.рф/я-люблю-кириллические-домены'
```

## su::beautifyUrl($s [, $len])
Привести URL к удобочитаемому виду.
Перед изменением URL строка проверяется через su::isUrl и если проверка не пройдена, возвращается null.
Во-первых, декодируются все последовательности %xx.
Во-вторых, убирается схема, если она имелась в наличии.
В-третьих, путь сокращается до $len символов (хост выводится в любом случае полностью).

**Пример:**
``` php
<?php
var_dump(su::beautify('http://habrahabr.ru/post/146262/'));
```

**Результат:**
``` php
<?php
'habrahabr.ru/pos...62/'
```

## su::parseUrls($s [, $callback])
Обработать все URL в строке.
По умолчанию все найденные ссылки превращаются в HTML-ссылки.
Поведение по умолчанию применимо только для plain text'а, с HTML будут проблемы, т.к. никаких проверок на конструкции вида `<a href="http://link/">` нет.

**Пример:**
``` php
<?php
var_dump(su::parseUrls('ya.ru/test@test. some.test@gmail.com test.ru'));
```

**Результат:**
``` php
<?php
'<a href="http://ya.ru/test@test">ya.ru/test@test</a>. some.test@gmail.com <a href="http://test.ru">test.ru</a>'
```