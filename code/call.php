<?php

    $subject = 'Заявка';
    $mess = '';
    $mess .= '<hr>';
    $json_res = '{';
    $json_res .= ' ';
    if(isset($_POST['info'])) {
        $subject = $_POST['info'];
    }

     if(isset($_POST['fio'])) {
           $mess .= '<b>Сертификат<br>фио дарителя :</b>' . $_POST['fio'] . '<br>';
             $json_res .= '"name":"'.$_POST['fio'].'",';
     }
       if(isset($_POST['tel'])) {
           $mess .= '<b>номер дарителя :</b>' . $_POST['tel'] . '<br>';
           $json_res .= '"tel":"'.$_POST['tel'].'",';
     }
     if(isset($_POST['email'])) {
           $mess .= '<b>e-mail дарителя :</b>' . $_POST['email'] . '<br>';
           $json_res .= '"mail":"'.$_POST['email'].'",';
     }
       if(isset($_POST['fio2'])) {
           $mess .= '<b>фио получателя :</b>' . $_POST['fio2'] . '<br>';
     }
       if(isset($_POST['tel2'])) {
           $mess .= '<b>номер получателя :</b>' . $_POST['tel2'] . '<br>';
     }
       if(isset($_POST['nominal'])) {
           $mess .= '<b>Номинал :</b>' . $_POST['nominal'] . '<br>';
     }
      if(isset($_POST['comments'])) {
           $mess .= '<b>Комментарии :</b>' . $_POST['comments'] . '<br>';
     }
     


    if(isset($_POST['contact_name'])) {
        $name = substr(htmlspecialchars(trim($_POST['contact_name'])), 0, 100);
        $mess .= '<b>Имя:</b>' . $name . '<br>';
        $json_res .= '"name":"'.$name.'",';

    }
    if(isset($_POST['contact_tel'])) {
        $tel = substr(htmlspecialchars(trim($_POST['contact_tel'])), 0, 100);
        $mess .= '<b>Телефон:</b>' . $tel . '<br>';
        $json_res .= '"tel":"'.$tel.'",';
    }
    if(isset($_POST['contact_email'])) {
        $mail = substr(htmlspecialchars(trim($_POST['contact_email'])), 0, 100);
        $mess .= '<b>Почта:</b>' . $mail . '<br>';
        $json_res .= '"mail":"'.$mail.'",';
    }
    if(isset($_POST['contact_country'])) {
        $country = substr(htmlspecialchars(trim($_POST['contact_country'])), 0, 100);
        $mess .= '<b>Страна:</b>' . $country . '<br>';
        $json_res .= '"country":"'.$country.'",';
    }
    if(isset($_POST['contact_city'])) {
        $city = substr(htmlspecialchars(trim($_POST['contact_city'])), 0, 100);
        $mess .= '<b>Город:</b>' . $city . '<br>';
        $json_res .= '"city":"'.$city.'",';
    }
    if(isset($_POST['contact_address'])) {
        $address = substr(htmlspecialchars(trim($_POST['contact_address'])), 0, 100);
        $mess .= '<b>Адрес:</b>' . $address . '<br>';

    }
    
        $subject = "Заказ с сайта";

    // подключаем файл класса для отправки почты
    require 'class.phpmailer.php';

    $mail = new PHPMailer();
    $mail->AddAddress('pitra121@gmail.com','Denis');
    $mail->AddAddress('upgradekid@yandex.ru','');


    $mail->IsHTML(true);                        // выставляем формат письма HTML
    $mail->Subject = $subject; // тема письма
    $mail->CharSet = "UTF-8";                   // кодировка
    $mail->Body = $mess;
//    if(isset($_FILES['file'])) { // file - имя файла
//            if($_FILES['file']['error'] == 0){
//            $mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
//        }
//    }
    // отправляем наше письмо
    if (!$mail->Send()){
        die ('Mailer Error: ' . $mail->ErrorInfo);
    }else{
        // echo 'true';

    }
    echo $json_res;
    ?>

