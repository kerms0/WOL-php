<html>
  <head>
    <title>TASK</title>
  </head>
  <body>
    <?php
    $ip=$_GET['ip'];

    if("0"<$ip and $ip<="9"){
      echo "你正在使用ip地址进行唤醒";
    }
    else{
      echo "你正在使用域名进行唤醒<br>";
      echo "定位到ip地址".gethostbyname($ip);
      $ip=gethostbyname($ip);
    }

    wol($ip,$_GET['mac'],$_GET['port']);
    
    echo "<br>唤醒数据已经发送";

    // 本函数来自：https://stackoverflow.com/questions/6055293/wake-on-lan-script-that-works

    function wol($broadcast, $mac, $port){
    $mac_array = preg_split('#:#', $mac); //print_r($mac_array);
    $hwaddr = '';
        foreach($mac_array AS $octet){
        $hwaddr .= chr(hexdec($octet));
        }
        //Magic Packet
        $packet = '';
        for ($i = 1; $i <= 6; $i++){
        $packet .= chr(255);
        }
        for ($i = 1; $i <= 16; $i++){
        $packet .= $hwaddr;
        }
        //set up socket
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        if ($sock){
        $options = socket_set_option($sock, 1, 6, true);
            if ($options >=0){    
            $e = socket_sendto($sock, $packet, strlen($packet), 0, $broadcast, $port);
            socket_close($sock);
            }    
        }
    }  //end function 

    ?>
    
  </body>
</html>