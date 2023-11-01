<?php
// TIENES QUE VISITAR ESTE ARCHIVO MEDIANTE URL PARA AUTO-CONFIGURAR EL CODIGO DE TU BOT CON EL BOT DE TELEGRAM
// Es Obvio que debes cambiar estos valores por los que corresponden a tus datos


//Direccion URL donde estara el ARCHIVO PRINCIPAL DEL BOT (NO ESTE ARCHIVO)
$dir = "https://www.midominio.com/tox.php";

//TOKEN DE TELEGRAM PARA TU BOT (GENERALO CON BOTFATHER)
$tokn = "6775919752:AAEnoLFqqzVES2ioADk4Goom9XXXXXXXXXX";

//Esta API solo sera usada para obtener el NOMBRE DEL PRODUCTO APPLE no genera gasto de CREDITOS en iFreeiCloud.
$apiiFreeiCloud = "AQUI TU API DE IFREEICLOUD.CO.UK";

//Esto lo dejas asi como esta...
$url = "https://api.telegram.org/bot$tokn/setWebhook?url=$dir";
$dat = file_get_contents($url);
echo $dat;

?>
