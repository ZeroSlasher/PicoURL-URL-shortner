<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background-image: url('images/redir.gif')">

  </body>
</html>
 <?php

    function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';

        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));

        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    $base_url = getCurrentUri();

    $routes = array();
    $routes = explode('/', $base_url);

    // print_r($routes);
    foreach($routes as $route)
    {
        if(trim($route) != '')
            array_push($routes, $route);
    }


	if($base_url == "/"){
		header('location:home.php');
	}
    else if($base_url == "login.php"){
        header('location:login.php');
    }
        else if($base_url == "home.php"){
        header('location:home.php');
    }
        else if($base_url == "signup.php"){
        header('location:signup.php');
    }
else{
        require 'redirect.php';
        $token = implode("", explode('/', $base_url));
        $redirect = new redirect();
        $res =  $redirect->url_redir_($token);

        if($res){
          // echo strncasecmp($res, 'driv', 4);
            if(strncasecmp($res, 'http',4) != 0)
            {
                $res = 'http://' .$res;
            }
            // echo $res;
            header('location:'.$res);
        }else{
        header('location:error.php');
        }
    }

?>
