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
      $json_res .= '"address":"'.$address.'",';
//     if(isset($_POST['type'])) {
  $mess .= '<b>Доставка:</b>' . $_COOKIE["cart_delivery"] . '<br>';
        $subject = "Заказ с сайта";
        if (!isset($_POST['nominal']))
        {
        $mess .= '<b>Заказ:</b><br>';
    include '../connect.php';
                    $json = $_COOKIE["cart"].']';
                    $allsum=0;
                    $json = json_decode($json,true);

                    for($i=1;$i<=$_COOKIE["cart_number"];$i++)
                    {
                          $item =  $json[$i];
                            $id=  $item["id"];
                            $sql = "SELECT * FROM products WHERE idProduct='$id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $sum = $item["number"]*$row["price"];
                                $item["price"]= $row["price"];
                                $json[$i]['price'] = $row["price"];
                                $allsum += $sum;
                                $mess .= '
                        <tr>
                        <td style=text-align:left;padding-bottom:25px >
                          '.$row["idProduct"].':'.$row["title"].'<br>
                            <br>Кол-во: '.$item["number"].'  <br>Цвет: '.$item["color"].'
                             <br>
                        '.$sum.'p<br><br>
                            </td>

                        </tr>';
//                              <p class="button-white pointer"><script>getword("changedetails");</script></p>
                            }
                    }
                    
             $sql = "INSERT INTO orders (`idOrder`, `idUser`, `date`, `status`,`address`, `products`,`number`,`email`,`tel`,`name`) VALUES (NULL, '', '".date("Y-m-d")."','обрабатывается','".$address." ".$city." ".$country."','".json_encode($json,true)."','1','".$mail."','".$tel."','".$name."')";
            if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                            else{
$last_id = $conn->insert_id;

                            }

                    $conn->close();
        }
    $mess .= '<hr>';
    $json_res .= '"id":"'.$last_id.'"}';
//     }
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

