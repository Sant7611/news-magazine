<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jquery First</title>
    <script src="jquery-3.6.1.js"></script>
    <script>
         $(document).ready(function(){
            alert('santosh fuchay');
            $('p').css({color: 'red'})
            // $('#hide').click(function(){
            //     $('p').hide();
            // })


            // $('#show').click(function(){
            //     $('p').show();
            // })
            $('#hide').click(function(){
                $('form').hide();
            })
            
        })
    </script>
    
</head>
<body>
<form action="" method="post" name="loginForm" onsubmit="checkLogin()" id="for">
        <label>Username:</label>
        <input type="text" name="username" id="username"><br>
        <br>
        <label>Password:</label>
        <input type="password" name="password" id="password"><br>
        <br>
        <input type="submit" name="submit">
    </form>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit saepe dignissimos?</p>
    <input type="button" value="show" id="show">
    <input type="button" value="hide" id="hide">
</body>
</html>