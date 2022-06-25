<?php

function curl($url, $data = ""){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("user-agent: Mozilla/5.0 (Linux; Android 10; SM-A310F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.40 Mobile Safari/537.36"));
if($data != null){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
}
$result = curl_exec($ch);
return $result;
}
function ex($a, $b, $i, $get){
        $x = explode($a, $get);
        $x = explode($b, $x[$i])[0];
        return $x;
}
function save($x){
        $a = fopen("save.html","a+");
              fwrite($a, $x);
              fclose($a);
}

$url = "https://yt5s.com/api/ajaxSearch";
$data = "q=$link&vt=home";
$res = json_decode(curl($url, $data), 1);
$vid = $res["vid"];
$title = $res["title"];
$token = $res["token"];
$time = $res["timeExpires"];
$mp4 = $res["links"]["mp4"];
$img = "<a href='https://i.ytimg.com/vi/$vid/0.jpg' > </a> ";
save($img);
foreach($mp4 as $x){
  $f = $x["f"];
  $q = $x["q"];
  $size= $x["size"];
$url = "https://redirector.googlevideo.com/videoplayback?expire=1656194746&ei=WjK3YpWzCd2P1gKM1J-wDw&ip=195.201.109.29&id=o-AKuNtvreyqo_uReYrUE7ZB0Y_1RAcW1F1U99Xe2esllf&itag=22&source=youtube&requiressl=yes&mh=A0&mm=31%2C29&mn=sn-4g5e6nsk%2Csn-4g5edns6&ms=au%2Crdu&mv=m&mvi=1&pl=25&pcm2=no&initcwndbps=336250&vprv=1&mime=video%2Fmp4&cnr=14&ratebypass=yes&dur=645.654&lmt=1637276401210913&mt=1656172880&fvip=4&fexp=24001373%2C24007246&c=ANDROID&txp=6211224&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cpcm2%2Cvprv%2Cmime%2Ccnr%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRgIhAMBNa6rpYtoDf3wD5HO54PZKVBVIk4o20Vpxl0EEpNyrAiEAq3w7EfHFdDKyj_blgxK6j9ScxaAATwJ8FQgpB8k_J_U%3D&lsparams=mh%2Cmm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl%2Cinitcwndbps&lsig=AG3C_xAwRQIgBiJIi805agSm8XrfOPiHZUNEaAxhHrhyxPJWIKjKE4kCIQCeS0KI78VhAeT1Fn2agMAOlIGFyWtdA9BBUfph9ryUww%3D%3D&host=rr1---sn-4g5e6nsk.googlevideo.com&title=yt5s.com-Mining%203%20Crypto,%20TRX,%20DOGE,%20dan%20ZEC%20AutoWD%20FaucetPay%20%7C%7C%20SCAutoClaim%20via%20Termux..";
$data = "v_id=$vid&ftype=$f&fquality=$q&fname=$title&token=$token&timeExpire=$time";
$get = curl($url,$data);
echo $get;
$msg = "
$size | $q | <a href='$linkdl' > Download </a> ";
save($msg);
}
?>
