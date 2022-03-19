<?php

    define('HOST','localhost'); define('USER','root'); define('PASS',''); define('DB','grh');

    $cont=mysqli_connect(HOST,USER,PASS,DB);

    if($cont==false){echo "<h1>connection echoe</h1>"; }


?>