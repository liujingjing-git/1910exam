<?php
    $name = $_POST['name'];
    $password  = $_POST['password'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
   
    if(empty($name))
    {
        echo "用户名称不能为空";die;
    }else if(strlen($name)<2)
    {
        echo "名称不能小于2位";die;
    }
    if(empty($password))
    {
        echo "密码不得为空";die;
    }
    if(empty($tel))
    {
        echo "电话不得为空";die;
    }else if(is_numeric($tel)==false)
    {
        echo "电话必须是数字";die;
    }
    if(empty($email))
    {
        echo "邮箱不得为空";die;
    }

    //连接数据库
    $config = [
        'host'    =>  '192.168.110.104',
        'port'    =>  '3306',
        'dbname'  =>  'exam1910',
        'user'    =>  'root',
        'pass'    =>  'root'
    ];

    $link = mysqli_connect($config['host'],$config['user'],$config['pass'],$config['dbname']);
    if(!$link)
    {
            die('Connect Error (' . mysqli_connect_errno() .')'
                    . mysqli_connect.error());
    }

    $sql = "insert into users (`name`,`password`,`tel`,`email`) values('{$name}','{$password}','{$tel}','{$email}')";
    $res = mysqli_query($link,$sql);
    if($res)
    {
        echo "恭喜 注册成功";
        header("refresh:2,url='/login.html'");
    }else{
        echo "服务器繁忙 请重试...";
        header("refresh:2,url='/reg.html'");
    }


?>