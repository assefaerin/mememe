<?php 
$name = stripslashes(htmlspecialchars($_POST['name']));
$phone = stripslashes(htmlspecialchars($_POST['phone']));
$comment = stripslashes(htmlspecialchars($_POST['comment']));

if($_GET['product_id']){
    $product_id = $_GET['product_id'];
}else{
    $product_id = $_POST['product_id'];
}
if(empty($name) || empty($phone)){
echo '<h1 style="color:red;">Пожалуйста заполните все поля</h1>';
echo '<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'">';
}
else{
$subject = 'Заказ товара - Машинка внедорожник'; // заголовок письмя
$addressat = "doodge4621@gmail.com"; // Ваш Электронный адрес
$success_url = './form-ok.php?name='.$_POST['name'].'&phone='.$_POST['phone'].'&comment='.$_POST['comment'].'';
$message = "ФИО: {$name}\nКонтактный телефон: {$phone}\nТовар: {$comment}";
$verify = mail($addressat,$subject,$message,"Content-type:text/plain;charset=utf-8\r\n");
if ($verify == 'true'){
    header('Location: '.$success_url);
    echo '<h1 style="color:green;">Поздравляем! Ваш заказ принят!</h1>';
    exit;
}
else 
    {
    echo '<h1 style="color:red;">Произошла ошибка!</h1>';
    }
}
?>