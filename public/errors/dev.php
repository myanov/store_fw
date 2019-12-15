<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Произошла ошибка</h1>
    <p><b>Вид ошибки: </b><?= $errnum ?></p>
    <p><b>Сообщение ошибки: </b><?= $errmes ?></p>
    <p><b>В файле: </b><?= $errfile ?></p>
    <p><b>На строке: </b><?= $errline ?></p>
</body>
</html>