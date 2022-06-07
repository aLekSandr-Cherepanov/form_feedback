<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    //От кого письмо
    $mail->setFrom('info@fls.guru', 'kipaso form');
    //Кому отправить
    $mail->addAddress('super.sany96@yandex.ru');
    //Тема письма
    $mail->Subject = 'Анкета участника мастер-класса';
    
    //Вы чаще применяете
    
    $controllers = "Программируемые логические контроллеры";
    if($_POST['controllers'] == "apply"){
        $controllers ="Программируемые реле";
    
    }
    
    //Тело письма
    
    $body = "<h1>Ответы на анкету</h1>";
    
    if(trim(!empty($_POST['company']))){
        $body.="<p><strong>Наименование компании:</strong>".$_POST['company'].'</p>';
    }


    if(trim(!empty($_POST['city']))){
        $body.="<p><strong>Город:</strong>".$_POST['city'].'</p>';
    }


    if(trim(!empty($_POST['activity']))){
        $body.="<p><strong>Вид деятельности:</strong>".$_POST['activity'].'</p>';
    }


    if(trim(!empty($_POST['name']))){
        $body.="<p><strong>ФИО:</strong>".$_POST['name'].'</p>';
    }


    if(trim(!empty($_POST['post']))){
        $body.="<p><strong>Должность:</strong>".$_POST['post'].'</p>';
    }


    if(trim(!empty($_POST['phone']))){
        $body.="<p><strong>Телефон:</strong>".$_POST['phone'].'</p>';
    }


    if(trim(!empty($_POST['email']))){
        $body.="<p><strong>E-mail:</strong>".$_POST['email'].'</p>';
    }

    if(trim(!empty($_POST['objects']))){
        $body.="<p><strong>Объекты автоматизации Вашей компании:</strong>".$_POST['objects'].'</p>';
    }


    if(trim(!empty($_POST['controllers']))){
        $body.="<p><strong>Вы чаще применяете в своих проектах автоматизации:</strong>".$_POST['controllers'].'</p>';
    }


    if(trim(!empty($_POST['manufacturers']))){
        $body.="<p><strong>Контроллеры и программируемые реле каких производителей Вы применяли в своих проектах:</strong>".$_POST['manufacturers'].'</p>';
    }


    if(trim(!empty($_POST['program']))){
        $body.="<p><strong>Есть ли у Вас опыт программирования:</strong>".$_POST['program'].'</p>';
    }

    
    if(trim(!empty($_POST['programEnvironment']))){
        $body.="<p><strong>В какой среде программирования у Вас есть опыт работы:</strong>".$_POST['programEnvironment'].'</p>';
    }


    if(trim(!empty($_POST['visit']))){
        $body.="<p><strong>Какой мастер-класс Вы бы хотели посетить:</strong>".$_POST['visit'].'</p>';
    }


    if(trim(!empty($_POST['expectation']))){
        $body.="<p><strong>Какой результат Вы ожидаете от мастер-класса?:</strong>".$_POST['expectation'].'</p>';
    }


    $mail->Body = $body;

    //Отправляем

    if (!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены';
    }
    
    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
    ?>