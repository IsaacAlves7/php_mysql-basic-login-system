<?php
// I created the database "sistemalogin" and putted the tables: name, email and password.
// The registered user is Rodrigo Oliveira, the email is "admin" and the password is "123".
// Connection with the db_connect.php
require_once 'db_connect.php';
// Session
session_start();
// Send button
if(isset($_POST['btn-entrar'])):
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $password = mysqli_escape_string($connect, $_POST['pass']);

    if(empty($login) or empty($password)):
        $erros[] = "<li> The areas Email/User and Passoword needs to be filled </li>";
    else:
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0):
            $password = md5($password);
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND '$password'";
            $resultado = mysqli_query($connect, $sql);
        endif;

            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header('Location: home.php');
            else:
                $erros[] = "<li> User and password not confere </li>";
            endif;
        if(mysqli_num_rows($resultado) > 0):
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND pass = '$password'";
            echo "<li>Existent user</li>";
          else:
            $erros[] = "<li>Non-existent user</li>";
        endif;
    endif;
endif;
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/images/image.png">
    <title>Basic Login (PHP & MySQL)</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background-color: rgb(0, 162, 255);
            width: 100%;
            height: 100vh;
        }

        h4{
            color: rgb(0, 140, 255);
            margin: 7px;
            font-size: 20px;
        }

        b{
            color: rgb(0, 204, 255);
            font-size: 20px;
        }

        body{
            background-image: radial-gradient(circle, rgb(0, 140, 255) 0%, rgb(0, 204, 255) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #container{
            text-align: center;
            background-color: rgb(255, 255, 255);
            padding: 10px;
            height: 400px;
            width: 570px;
            box-shadow: 5px 10px 5px rgba(0, 0, 0, 0.315);
            border-radius: 7.7px;
        }

        input{
            margin-top: 17px;
            font-size: 20px;
            width: 337.7px;
        }

        button{
            width: 300px;
            font-size: 20px;
            margin-top: 37px;
            height: 37px;
            color: rgb(0, 140, 255);
        }

        img{
            width: 100px;
            padding: 5px;
        }

        .form{
            margin: 17px;
        }

        li{
            color: red;
            list-style: none;
            position: relative;
            margin: 2px;
        }
        @media screen and (max-width:651px){
            #container{
            text-align: center;
            background-color: rgb(255, 255, 255);
            padding: 7px;
            height: 400px;
            width: 500px;
            box-shadow: 5px 10px 5px rgba(0, 0, 0, 0.315);
        }

        button{
            width: 87%;
            font-size: 20px;
            margin-top: 37px;
            height: 37px;
            color: rgb(0, 140, 255);
        }
        }

        @media screen and (max-width:550px){
            #container{
            text-align: center;
            background-color: rgb(255, 255, 255);
            padding: 7px;
            height: 470px;
            width: 377px;
            box-shadow: 5px 10px 5px rgba(0, 0, 0, 0.315);
        }

        input{
            margin: 10px;
            font-size: 18px;
            width: 270px;
        }

        button{
            width: 270px;
            font-size: 20px;
            margin-top: 47px;
            height: 37px;
            color: rgb(0, 140, 255);
        }

        
        img{
            width: 77px;
            padding: 5px;
        }
        }


        @media screen and (max-width: 421px){

            #container{
            text-align: center;
            background-color: rgb(255, 255, 255);
            padding: 7px;
            height: 470px;
            width: 320px;
            box-shadow: 5px 10px 5px rgba(0, 0, 0, 0.315);
        }

        input{
            margin: 12px;
            font-size: 18px;
            width: 270px;
        }

        button{
            width: 270px;
            font-size: 20px;
            margin-top: 47px;
            height: 37px;
            color: rgb(0, 140, 255);
        }

        
        img{
            width: 77px;
            padding: 5px;
        }
        }

        @media screen and (max-width:357px){
            h4,b{
                font-size: 17px;
            }

            #container{
            text-align: center;
            background-color: rgb(255, 255, 255);
            padding: 7px;
            height: 400px;
            width: 270px;
            box-shadow: 5px 10px 5px rgba(0, 0, 0, 0.315);
        }

        input{
            margin: 7px;
            font-size: 18px;
            width: 200px;
        }

        button{
            width: 87%;
            font-size: 20px;
            margin-top: 27px;
            height: 37px;
            color: rgb(0, 140, 255);
        }

        img{
            width: 70px;
            padding: 5px;
        }
        }

        @media screen and (max-width:287px){
            h4,b,input,button{
                font-size: 15px;
                margin-top: 2px;
            }

            #container{
            text-align: center;
            background-color: rgb(255, 255, 255);
            padding: 2px;
            height: 327.7px;
            width: 200px;
            box-shadow: 5px 10px 5px rgba(0, 0, 0, 0.315);
        }

        input{
            margin: 7px;
            width: 150px;
        }

        button{
            width: 150px;
            font-size: 15px;
            margin-top: 12px;
            height: 27px;
        }

        img{
            width: 57px;
            padding: 5px;
        }

        li{
            font-size: 12px;
        }
        }
    </style>
</head>
    <div id="container">
        <img src="public/images/image.png">
        <h4>Basic Login with <b>Procedural PHP</b> & <b>MySQL database</b></h4>
        <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                 echo $erro;
            endforeach;
        endif;
        ?>

        <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <b>Email/User: </b><input name="login" type="text" placeholder="email"><br>
            <b>Password: </b><input name="pass" type="password" placeholder="password"><br>
            <button type="submit" name="btn-entrar">Log in</button>
        </form>
    </div>
</body>
</html>