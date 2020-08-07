<?php
    $name = $_POST['name'];
    $password  = $_POST['password'];

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

    $account = "";
    if(strpos($name, '@')) {
        $account = "email";
    } else {
        $account = "name";
    }
    $sql = "select  * from  users  where"."    "."$account="."'$name'"."    "."and"."    "."password="."'$password'";
    $res = mysqli_query($link,$sql);
    if($res==true)
    {
        echo "登录成功";
        header("refresh:2,url='/index.php'");
    }else{
        echo "服务器繁忙";
        header("refresh:2,url='/login.html'");
    }


?>