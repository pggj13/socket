
<?php

$host = "192.168.0.65";
$port = 20205;

set_time_limit(0);


$sock = socket_create(AF_INET, SOCK_STREAM, 0);
socket_bind($sock, $host, $port);

socket_listen($sock);

echo 'Listenig for connections';

class Chat {

    function readline() {

        return rtrim(fgets(STDIN));
    }

}

do {
    $accept = socket_accept($sock); //Accept aguarda a coneção do cliente
    $msg = socket_read($accept, 1024);

    $msg = trim($msg);
    echo "Client says\t" . $msg . "\n\n";

    $line = new Chat();

    echo "Enter Reply:\t";
    $reply = $line->readline();

    socket_write($accept, $reply, strlen($reply));
} while (true);

socket_close($accept);
socket_close($sock);
?>

