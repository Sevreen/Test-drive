<?
// ----------------------------конфигурация-------------------------- //

$adminemail="meys.rostov@bk.ru";  // e-mail админа


$date=date("d.m.y"); // число.месяц.год

$time=date("H:i"); // часы:минуты:секунды

$backurl="../test-drive.html";  // На какую страничку переходит после отправки письма

//---------------------------------------------------------------------- //



// Принимаем данные с формы

$name=$_POST['name'];

$tel=$_POST['tel'];


$msg="

<p>Позвоните мне!</p>

<p>Имя: $name</p>

<p>Телефон: $tel</p>


";



 // Отправляем письмо админу

mail("$adminemail", "$date $time Сообщение
от $name", "$msg");



// Сохраняем в базу данных

$f = fopen("message.txt", "a+");

fwrite($f," \n $date $time Сообщение от $name");

fwrite($f,"\n $msg ");

fwrite($f,"\n ---------------");

fclose($f);



// Выводим сообщение пользователю

print "<script language='Javascript'><!--
function reload() {location = \"$backurl\"}; setTimeout('reload()', 6000);
//--></script>

<p>Сообщение отправлено! Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";
exit;

?>
