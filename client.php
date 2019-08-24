<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            #body{
                margin:0 auto;
                margin-top: 100px;
                background-color: bisque;
                width: 350px;
                padding: 30px;
                
            }
            #body input{
                height: 30px;

            }
            #body textarea{
                width: 100%;
                padding: 10px;
                font-family: Arial;
                font-size: 16px;
                
            }
            .container{
                padding: 30px;
                background-color: aliceblue;
                height: 100%;
                
            }
            
        </style>
    </head>
    <body>

        <div class="container">
            <div id="body">
                <form method="POST">
                    <table>
                        <tr>
                            <td>
                                <label>Entrar Mensagem</label>
                                <input type="text" name="textMessage"/>
                                <input type="submit"name="btnSend" value="Send"/>
                            </td>
                        </tr>

                        <?php
                        $host = "192.168.0.65";
                        $port = 20205;

                        if (isset($_POST['btnSend'])):
                            $msg = $_REQUEST['textMessage'];
                            $sock = socket_create(AF_INET, SOCK_STREAM, 0);
                            socket_connect($sock, $host, $port);

                            socket_write($sock, $msg, strlen($msg));

                            $reply = socket_read($sock, 1024);
                            $reply = trim($reply);
                            $reply = "Server says:\t" . $reply;

                        endif;
                        ?>
                        <tr>
                            <td>
                                <textarea rows="10" col="30"><?php echo @$reply; ?></textarea>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
