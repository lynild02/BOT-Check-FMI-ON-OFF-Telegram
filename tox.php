<?php
//                                    LYNILDUNLOCK
//                      TELEGRAM BOT REGISTROS PLIST
//                            ***    @LynildUnlock    ***
// Made with ❤️ by @LynildUnlock
// This code is not for sale, free for the community
// Contact Us for collaboration: Telegram @LynildUnlock

include "var.php";
//NOMBRE QUE APARECERA EN EL AGRADECIMIENTO DEL BOT
$NAME_G = "@RavenSoft";
//MENSAJE DE GRACIAS
$thanks = "Gracias por usar nuestro BOT!!! @RavenSoft";
//DEJALO ASI
$WebSite = "https://api.telegram.org/bot".$tokn;
//URL DE LAS IMAGENES QUE QUIERAS USAR PARA LAS RESPUESTAS SEGUN EL ON U EL OFF
$IMAGEN_OFF = "";
$IMAGEN_ON = "";
$IMAGEN_SIMLOCK = "";
$IMAGEN_MAC = "";

$Input = file_get_contents('php://input');
$Update = json_decode($Input, true);
$ChatID = $Update['message']['chat']['id'];
$NickName = $Update['message']['chat']['username'];
$Message = $Update['message']['text'];

$CommanDetect = substr($Message, 0 ,1);
if($CommanDetect == '/'){
        if(strpos($Message, 'check') == true )
        {
                $pass = explode('/check ', $Message)[1];
                $PS = explode(",", $pass)[0];
                if($PS == null){
                    $response = "Ups! Estas haciendo algo mal!\nUsa en comando de esta manera:\n/check IMEI";
                    sendMessage($ChatID, $response);
                    die();
                }else{
                    if(strlen($PS)>14){
                        $URI2 = "https://api.ifreeicloud.co.uk/?format=html&key=$apiiFreeiCloud&imei=".$PS."&service=0";
                        $URL2 = $URI2;
                        $curl2 = curl_init();
                        curl_setopt_array($curl2, array(
                            CURLOPT_URL => "".$URL2."",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_SSL_VERIFYPEER => false,
                        ));
                        $curlRes = curl_exec($curl2);
                        curl_close($curl2);
                        file_put_contents('jsonso', $curlRes);
                        $Mo = explode("Model: ", file_get_contents("jsonso"))[1]; 
                        $Mod = explode("<br>Model Name", $Mo)[0];
                        //URL DEL ARCHIVO QUE GENERA EL CHECK
                        $URI = "https://lynildtest.000webhostapp.com/Fmi.php?imei=".$PS;
                        $URL = $URI;
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "".$URL."",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_SSL_VERIFYPEER => false,
                        ));
                        $curlResponse = curl_exec($curl);
                        curl_close($curl);
                        file_put_contents('fmistate', $curlResponse);
                        $fsta = explode("𝗙𝗶𝗻𝗱 𝗠𝘆 𝗶𝗣𝗵𝗼𝗻𝗲: ", file_get_contents("fmistate"))[1]; 
                        $fstate = explode("<br>", $fsta)[0];
                        file_put_contents('checkmi', $fstate);
                        if($curlResponse == null){
                            $response = "<b>IMEI NO VALIDO\t\t❌</b>";
                            sendMessage($ChatID, $response);
                            die();
                            //AQUI ABAJO PUEDES CAMBIAR LAS RESPUESTAS DEL BOT SEGUN EL CASO
                        }else{
                                if($fstate == "ON"){
                                    $fres = "ON ❌";
                                    //IMAGEN PARA LA RESPUESTA
                                    file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo='.$IMAGEN_ON'.');
                                    $response = "<b>🔰 $PS 🔰\n\nFind My iPhone: $fres\nModel: $Mod</b>\n\n".$thanks;
                                }else{
                                    $fres = "OFF ✅";
                                    file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo='.$IMAGEN_OFF'.');
                                    $response = "<b>🔰 $PS 🔰\n\nFind My iPhone: $fres\nModel: $Mod</b>\n\n".$thanks;
                                }
                                sendMessage($ChatID, $response);
                        }
                    }else{
                        $URI2 = "https://api.ifreeicloud.co.uk/?format=html&key=$apiiFreeiCloud&imei=".$PS."&service=0";
                        $URL2 = $URI2;
                        $curl2 = curl_init();
                        curl_setopt_array($curl2, array(
                            CURLOPT_URL => "".$URL2."",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_SSL_VERIFYPEER => false,
                        ));
                        $curlRes = curl_exec($curl2);
                        curl_close($curl2);
                        file_put_contents('jsonso', $curlRes);
                        $Mo = explode("Model: ", file_get_contents("jsonso"))[1]; 
                        $Mod = explode('","object":', $Mo)[0];
                        $response = "<b>🔰 $PS 🔰\n\nFind My iPhone: Por favor usa IMEI para check de FMI.\nModel: $Mod</b>\n\n".$thanks;
                        sendMessage($ChatID, $response);
                        die();
                    }
                }
        }

    if(strpos($Message, 'simlock') == true )
    {
            $pass = explode('/simlock ', $Message)[1];
            $PS = explode(" ", $pass)[0];
            $PS2 = explode(" ", $pass)[1];
            $PS3 = explode(" ", $pass)[2];
	        $PS4 = explode(" ", $pass)[0];
            
            if($PS == null){
                $response = "Oops! Are you Blind or Something?";
                sendMessage($ChatID, $response);
                die();
            }else{
                if(strlen($PS)<14){
                    $response = "Por favor inicia con el IMEI\nEl Orden debe ser: IMEI -> SN -> IMEI2";
                    sendMessage($ChatID, $response);
                }else{
                    $URIs = "https://thewiltedrose.vip/api/bt/SimLockcarrier.php?imei=".$PS."&imei2=".$PS3."&sn=".$PS2;
                    $URLs = $URIs;
                    $curls = curl_init();
                    curl_setopt_array($curls, array(
                        CURLOPT_URL => "".$URLs."",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_SSL_VERIFYPEER => false,
                    ));
                    $curlRess = curl_exec($curls);
                    curl_close($curls);

                    $URI2 = "https://api.ifreeicloud.co.uk/?format=html&key=$apiiFreeiCloud&imei=".$PS."&service=0";
                    $URL2 = $URI2;
                    $curl2 = curl_init();
                    curl_setopt_array($curl2, array(
                        CURLOPT_URL => "".$URL2."",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_SSL_VERIFYPEER => false,
                    ));
                    $curlRes = curl_exec($curl2);
                    curl_close($curl2);
                    file_put_contents('jsonso2', $curlRes);

                    $statts = explode("Model: ", file_get_contents("jsonso2"))[1];
                    $statts2 = explode('<br>Serial Number', $statts)[0];
                    $statts3 = explode("<br>Model Name:", $statts2)[0];
                    $statts4 = str_replace('\/', " ", $statts3); 
                    file_put_contents('modelz', $statts4);

                    file_put_contents('carsh', $curlRess);
                    $Mo = explode("SimLock:", file_get_contents("carsh"))[1]; 
                    $Mod = explode("</span><img", $Mo)[0];
                    $unlo = str_replace("<span style='color:green;'> ", " ", $Mod);
                    if ($unlo == "<span style='color:red;'><span style='color:red;'>") {

                    }
                    $Mod2 = str_replace("</span>"," ",$unlo);
                    file_put_contents('exp', $unlo);
                    file_put_contents('exp2',$Mod2);
                    if($Mod2 == " Unlocked "){
                        $Unc = "Unlocked ✅";
                    }else{
                        $Unc = "Locked ❌";
                    }

                    $response = "🔰<b>IMEI:</b> $PS\n🔰<b>IMEI2:</b> $PS3\n🔰<b>SN:</b> $PS2\n\n<b>SimLock: </b>$Unc\n<b>Model: </b>$statts4\n\n".$thanks;

                    file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo='.$IMAGEN_SIMLOCK'.');
                    sendMessage($ChatID, $response);
                    die();
                }
            }
    }

        if(strpos($Message, 'mac') == true){
            if(in_array($ChatID,$permission)){
            $mei = explode(' ', $Message)[1];

            $imei = explode(",", $mei)[0];

                $response = "<b>Consultando: ".$imei."...\n</b>";

                sendMessage($ChatID, $response);

            if($imei != null){

                $respons = file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo='.urlencode($IMAGEN_MAC));

                $ret = explode("{", $respons)[1];

                $respon = str_replace("{", "", $respons);

                $ojo = explode('"ok"', $respon)[1];

                $res = str_replace($ojo, "", $respon);

                $response = str_replace('"ok"', "", $res);

                sendMessage($ChatID, $response);

            }

            else{

                $response = "<b>SERIAL VACÍO</b>";

                sendMessage($ChatID, $response);

                die();

            }

            

            $ch = curl_init();

            $uri = base64_decode("aHR0cDovL2lzZXJ2aWNlcy1kZXYudXMvYm90L2NoZWNrTXlNb2RlbEJvdC9tb2RlbC5waHA");

            $url = $uri."?imei=".$imei;

            curl_setopt($ch, CURLOPT_URL, $url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);

            $result = strip_tags($result);

            curl_close($ch);   

            $ac = str_replace('Model:', '', $result);

            if (strpos($ac, 'MacBook') || strpos($ac, 'iMac') || strpos($ac, 'Mac') == true)

            {

                if (strpos($ac, '2018') || strpos($ac, '2019') || strpos($ac, '2020') == true)

                {

                    if (strpos($ac, 'M1') !== false || strpos($ac, 'M2') !== false) 

                    {

                        $Supported = "Bypass M1 ONLY for MDM";

                        $response = "<b>SERIAL: ".$imei."\nMODEL: ".$ac."\n".$Supported."</b>";

                        sendMessage($ChatID, $response);

                        die();

                    }

                    else{

                        $Supported = "Bypass Supported ✅";
                        $response = "<b>CHECKING... 👩🏽‍💻</b>\n\n<b>🔰 $imei 🔰\n\n👉🏽 MODELO:</b> $ac\n<b>👉🏽 Your Mac is</b> $Supported\n\n<i>..:: $NAME_G · PRO Check bot ::..</i>";

                        sendMessage($ChatID, $response);

                        die();

                    }

            }else{

                $Supported = "Bypass No Supported ❌ ";

                $response = "<b>SERIAL: ".$imei."\nMODEL: ".$ac."\n".$Supported."</b>";

                        sendMessage($ChatID, $response);

                        die();

            }

            }

            else

            {

                $response = "Wrong Serial Number!";

                        sendMessage($ChatID, $response);

                        die();

            }

        }else{
            file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo=https://thewiltedrose.vip/0666plMT626/CieloShyPussy/img/nones.jpg');
            sendMessage($ChatID, $negative);
        }
    }
        # Comando COM EVA
        if(strpos($Message, 'com') == true ){
            file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo=https://c4.wallpaperflare.com/wallpaper/246/878/433/anime-anime-girls-fio-germi-metal-slug-hd-wallpaper-preview.jpg');
            $response = "\n<b>LISTA DE COMANDOS:</b>\n👉🏽 /check -Coloca el IMEI para Check de FMI. \n👉🏽 /mac -Coloca el SN para Check COMPATIBILIDAD DE BYPASS T2.\n👉🏽 /simlock -Revisa si un Dispositivo Apple tiene la SIM Bloqueada o no";
            sendMessage($ChatID, $response);
        }
        # Comando BOT
        if(strpos($Message, 'dev') == true ){
            $response = "<b>🙋🏽‍♀️ Hi! Somos RavenSoft</b>\n🚀\tSolo queremos comunicarte que contamos con <b><i>BOT de Checks</i></b> en venta!!!\nMejora tu grupo con un BOT personalizado!!!\nTools Bypass, Extraccion PLIST y mas!\nEscribenos para info! @LynildUnlock 😘\n\n🚀 <b>Check BOT: $50 USDT</b> (Unico Pago = Todas las Funciones)\n👉🏽 $10 USDT al mes, checks <b><i>ILIMITADOS DE FMI ON/OFF!</i></b>";
            file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo=https://www.lynildunlockGSM.com/0frLzK%21lllF/RgPLIZT/img/check-sell.jpg');
            sendMessage($ChatID, $response);
        }
        # Comando DATA
        if(strpos($Message, 'data') == true ){
            file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo=https://www.thewiltedrose.vip/0666plMT626/CieloShyPussy/img/data2.jpg');
            $response = "\n<b>Envia la siguiente informacion a @LynildUnlock</b>\n<i>No es necesario si este es un BOT FREE.</i>\n=================\n🔰\t".$ChatID."\n🔰\t".$NickName."\n=================\n\n@RavenSoft";
            sendMessage($ChatID, $response);
        }
        # START
        if(strpos($Message, 'start') == true ){
            file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo=https://w.wallha.com/ws/12/DJaQls4m.jpg');
            $response = "\n=================\n<b>Gracias!!!</b>\nEste es un BOT GRATIS e ILIMITADO asi que lo puedes agregar a CUALQUIER GRUPO DE TELEGRAM!, solo hace CHECK DE FMI OFF/ON con el IMEI del equipo.\nSi quieres un CHECK que use tanto IMEI como SN para saber el status de FMI ON/OFF entonces necesitas un BOT personalizado en tal caso contacta a @LynildUnlock!!\nPuedes comprar un BOT Full Personalizado:\n/buy\n=================\n";
            sendMessage($ChatID, $response);
        }
        if(strpos($Message, 'help') == true ){
            file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo=https://w.wallha.com/ws/12/DJaQls4m.jpg');
            $response = "\n=================\n<b>HELP!!!</b>\nSi necesitas algun tipo de ayuda con el BOT contacta a @LynildUnlock!!\nPuedes comprar un BOT Full Personalizado:\n/buy\n=================\n";
            sendMessage($ChatID, $response);
        }
        if(strpos($Message, 'buy') == true ){
            file_get_contents($GLOBALS['WebSite'].'/sendPhoto?chat_id='.$ChatID.'&photo=https://w.wallha.com/ws/12/DJaQls4m.jpg');
            $response = "\n=================\n<b>Compra un BOT FULL</b>\nContacta a @LynildUnlock y solicita precios para un BOT FULL PERSONALIZADO para ti o tu grupo!!\nTambien contamos con mas cosas como:\n\n✅ Plataformas Pishin\n✅ DHRU Server Original\n✅ DHRU Economico\n✅ Tools Bypass Ramdisk\n✅ Tools Bypass MDM\n ✅ Y Mas!!!\n=================\n";
            sendMessage($ChatID, $response);
        }


    }
    
function sendMessage($ChatID, $response)
{
    $url = $GLOBALS['WebSite'].'/sendMessage?disable_web_page_preview=true&chat_id='.$ChatID.'&parse_mode=HTML&text='.urlencode($response);
    file_get_contents($url);
    unlink('error_log');
}

?> 
<html><h1>NO NECESITABAS VER ESTO...</h1><img src="https://steamuserimages-a.akamaihd.net/ugc/775109600954033442/91799F95667883AD1675E5886FC3A936A951629E/"></html>
