<?php

/**
 * Send-email

 * @category File
 * @package  MyPackage
 * @author   NVK-mail Other <nvk-mail@mtu-net.ru>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @version  GIT: $Id$ In development.
 * @link     http://w-w-w-master.ru/
 * @since    1.0.0
 */

if (isset($_POST)) {

    $site = $_SERVER['HTTP_HOST'];
    $dt = date("d F Y, H:i:s"); // дата и время
	$to = 'nvk-mail@mtu.ru'; //здесь указываете адре почты
   
    $subject = "Заказ с сайта";

    $body = "<html><body style='font-family:Arial,sans-serif;'>";
    $body .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>
  Поздравляем, новый заказ с сайта :" . $site . "</h2>\n";
    $body .= " <p><strong> Дата и  Время заказа:</strong> " . $dt . "</p>\n ";
   
    foreach ($_POST as $key => $value) {
        if ($value != '') {
            if ($value == 'on') {
                $body .= "<b>" . $key . "</b><br>";
            } else {
                $body .= "<b>" . $key . "</b>: " . trim(htmlspecialchars($value)) . "<br>";
            }
        }
    
    }
    $body .= "</body></html>";
    
    $headers = "From : SiteRobot <noreply@" . $_SERVER['HTTP_HOST'] . ">\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-Type: text/html;charset=utf-8' . "\n";

    // отправка сообщения
    $sendmail = mail($to, $subject, $body, $headers);
    if ($sendmail) {
            echo true;
        return;
    } else {
            echo false;
        return;
    }
}
echo (" Поля не заполнены ");
