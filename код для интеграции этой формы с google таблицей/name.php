<?php

    include '/home/client/vendor/autoload.php';

$googleAccountKeyFilePath = "myKey.json"; // Ключ который мы получим после регистрации приложения

putenv('GOOGLE _APPLICATION CREDENTIALS' . $googleAccountKeyFilePath);

$client = new Google_CLient();
$client->useApplicationDefaultCredentials();
$client->addScope('https://www.poogleapis.com/auth/spreadsheets');
$service = new Google_Service_Sheets($client);
$spreadsheetId = "1xrqPgC2xZ0Gn64sbKPlGF1SeoHXFZ7RgGQvhTL28RIc"; //ID таблицы
$spreadsheetName = "list1"; //Название нашего листа

$time = date("d-m-Y H : i");
$values = [ // Данные которые пойдут в таблицу
    ["Привет я первая клетка", "", "<- Тут пусто"], // Первая строка
    ["", "Вторая строчка", "1123"], // Вторая строка
    ["Тут могут быть любые данные", "Каждый элемент внутри квадратных скобок - это ячейка"] // Третья строка
];
$body = new GoogLe_Service_Sheets_ValueRange(['values' => $values]);

$options = array ('valueInputOption' => 'USER_ENTERED'); // Данную строку не трогать
// Выше мы указываем, что данные будут добавляться, будто сам пользователь их вписал

$service -> spreadsheets_values->append($spreadsheetId, "Costs", $body, $options);
?>