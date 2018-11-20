<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use PHPMailer\PHPMailer\PHPMailer;
function sendMail($to,$title,$content){

    $mail = new PHPMailer(true);
    try{
        //邮件调试模式
        $mail->SMTPDebug = 0;
        //设置邮件使用SMTP
        $mail->isSMTP();
        // 设置邮件程序以使用SMTP
        $mail->Host = 'smtp.163.com';
        // 设置邮件内容的编码
        $mail->CharSet='UTF-8';
        // 启用SMTP验证
        $mail->SMTPAuth = true;
        // SMTP username
        $mail->Username = 'osyunwei@163.com';
        // SMTP password
        $mail->Password = 'yangshuang@123';
        $mail->setFrom('osyunwei@163.com', '程序猿测试');
        //  添加收件人1
        $mail->addAddress($to);     // Add a recipient

        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body    = $content;
        $mail->send();
    }catch (Exception $e){
        excption('Mailer Error: ' . $mail->ErrorInfo);
    }
}