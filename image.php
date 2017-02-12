<link rel="stylesheet" href="/exilepng/css/style.css">
<?php
session_start();
create_image();
exit();

function create_image()
{
/*HELLO a few things to do in here first:
You must adjust $link, $ranks and $rank to your preference.
If you know what youre doing feel free to adjust anything in here.

IMPORTANT!!!! define (your directory here) where your generated images are....my default setup for the files is: webserverroot/exilepng/index.php
which on a server with xampp/wamp would become http://199.345.53.2/exilepng/index.php
Note the images save in /exilepng/ so
*/
    $f = $_POST['font'];
    //txt color
    $fcolor = $_POST['fontcolor'];
    list($r, $g, $b) = sscanf($fcolor, "#%02x%02x%02x");
//txt 2 color
    $fcolor2 = $_POST['fontcolor2'];
    list($r2, $g2, $b2) = sscanf($fcolor2, "#%02x%02x%02x");
//player name color
    $fcolor3 = $_POST['fontcolor3'];
    list($r3, $g3, $b3) = sscanf($fcolor3, "#%02x%02x%02x");
//server name color
    $fcolor4 = $_POST['fontcolor4'];
    list($r4, $g4, $b4) = sscanf($fcolor4, "#%02x%02x%02x");

//vars
    $id = $_SESSION['steamid'];
    $map = $_POST["map"];
    $bg = $_POST["bg"];
    $community = $_SESSION['community'];
    $server = $_SESSION['server'];
    $name = $_SESSION['name'];
    $score = $_SESSION['score'];
    $kills = $_SESSION['kills'];
    $deaths = $_SESSION['deaths'];
    $kd = $_SESSION['kd'];
    $connects = $_SESSION['connections'];
    $locker = $_SESSION['bank'];
    $money = $_SESSION['money'];
    $totalpops = $_SESSION['totalpops'];
    $firstconnect = $_SESSION['firstcon'];
    $firstconnect = $_SESSION['lastcon'];
    $lastdisconnect = $_SESSION['lastdiscon'];
    $vehicles = $_SESSION['vehicles'];
    $cname = $_SESSION['clanname'];
    $tname = $_SESSION['tname'];
    $tlevel = $_SESSION['tlevel'];
    $tradius = $_SESSION['tradius'];
    $tflag = $_SESSION['tflag'];

    //EDIT LINK/////////////////////////////////////////////////////////////
    $link = "http://127.0.0.1/exilepng/".$id."&".$map.".png";
    //EDIT RANK/////////////////////////////////////////////////////////////
    $ranks = 0;//ranks 1 = yes 0 = no
    $rank = '';//dont change this
    if ($ranks == 1 & $score > 100000) {
        $rank = 'King Overlord';//can change
    } elseif ($ranks == 1 & $score <= 999999 && $score >= 70000) {
        $rank = 'Chief';//can change
    } elseif ($ranks == 1 & $score <= 69999 && $score >= 20000) {
        $rank = 'Hero';//can change
    } elseif ($ranks == 1 & $score <= 19999 && $score >= 1000) {
        $rank = 'Survior';//can change
    } elseif ($ranks == 1 & $score <= 999 && $score >= 0) {
        $rank = 'Pleb';//can change
    } elseif ($ranks == 1 & $score <= 0) {
        $rank = 'Uninstall';//can change
    }
//background type
    if ($bg == 'cherno') {
        $image = imagecreatefrompng('backgrounds/cherno.png');
    } elseif ($bg == 'altis') {
        $image = imagecreatefrompng('backgrounds/altis.png');
    } elseif ($bg == 'esseker'){
        $image = imagecreatefrompng('backgrounds/esseker.png');
    } elseif ($bg == 'lingor'){
        $image = imagecreatefrompng('backgrounds/lingor.png');
    } elseif ($bg == 'namalsk'){
        $image = imagecreatefrompng('backgrounds/namalsk.png');
    } elseif ($bg == 'tanoa'){
        $image = imagecreatefrompng('backgrounds/tanoa.png');
    } elseif ($bg == 'exile'){
        $image = imagecreatefrompng('backgrounds/exile.png');
    } elseif ($bg == 'black'){
        $image = imagecreatefrompng('backgrounds/black.png');
    } elseif ($bg == 'white'){
        $image = imagecreatefrompng('backgrounds/white.png');
    } elseif ($bg == 'digicamo1'){
        $image = imagecreatefrompng('backgrounds/digicamo1.png');
    } elseif ($bg == 'digicamo2'){
        $image = imagecreatefrompng('backgrounds/digicamo2.png');
    } elseif ($bg == 'marblefade'){
        $image = imagecreatefrompng('backgrounds/marblefade.png');
    } elseif ($bg == 'carbonfibre'){
        $image = imagecreatefrompng('backgrounds/carbon.png');
    } else {
        $width = 800;
        $height = 200;
        $image = ImageCreate($width, $height);
        $color = ImageColorAllocate($image, 0, 0, 0);
        ImageFill($image, 0, 0, $color);
    }
    //default font sizes
    $fsize = 19;
    $fsize2 = 17;
    $fsize3 = 20;
    $fsize4 = 24;
    //font type
if ($f == 'stencil') {
    $font = 'fonts/STENCIL.ttf';
} elseif ($f == 'harlow') {
    $font = 'fonts/HARLOWS.ttf';
} elseif ($f == 'wasted') {
    $font = 'fonts/Wasted.otf';
} elseif ($f == 'chiller') {
    $font = 'fonts/CHILLER.ttf';
} elseif ($f == 'ocrastd') {
    $font = 'fonts/OCRAstd.otf';
    $fsize = 14;
    $fsize2 = 13;
    $fsize3 = 15;
    $fsize4 = 19;
} elseif ($f == 'micra') {
    $font = 'fonts/micra.otf';
    $fsize = 14;
    $fsize2 = 13;
    $fsize3 = 15;
    $fsize4 = 19;
}else {
    $font = 'fonts/arial.ttf';
}
//if player isnt in a clan stop errors being displayed
if ($cname === NULL){
    $cname = '';
} else {
    $cname = $cname;
}

    $fontcolor = ImageColorAllocate($image, $r, $g, $b);
    $fontcolor2 = ImageColorAllocate($image, $r2, $g2, $b2);
    $fontcolor3 = ImageColorAllocate($image, $r3, $g3, $b3);
    $fontcolor4 = ImageColorAllocate($image, $r4, $g4, $b4);

        //Add vars for text
        imagettftext($image, $fsize4, 0, 1, 30, $fontcolor3, $font, $name);
        imagettftext($image, $fsize, 0, 1, 75, $fontcolor, $font, $score);
        imagettftext($image, $fsize2, 0, 90, 75, $fontcolor2, $font, 'score');
        //imagettftext($image, 17, 0, 1, 80, $fontcolor, $font, $kills);
        //imagettftext($image, 17, 0, 40, 80, $fontcolor2, $font, 'kills');
        //imagettftext($image, 17, 0, 1, 110, $fontcolor, $font, $deaths);
        //imagettftext($image, 17, 0, 40, 110, $fontcolor2, $font, 'deaths');
        imagettftext($image, $fsize, 0, 1, 115, $fontcolor, $font, $kd);
        imagettftext($image, $fsize2, 0, 40, 115, $fontcolor2, $font, 'k/d ratio');
        imagettftext($image, $fsize, 0, 1, 155, $fontcolor, $font, $totalpops);
        imagettftext($image, $fsize2, 0, 100, 155, $fontcolor2, $font, ' Total Pops');
        imagettftext($image, $fsize, 0, 1, 190, $fontcolor, $font, $connects);
        imagettftext($image, $fsize2, 0, 30, 190, $fontcolor2, $font, ' times connected');
        //imagettftext($image, 20, 0, 210, 23, $fontcolor, $font, $server);//dont need ip in image
        //imagettftext($image, 20, 0, 425, 23, $fontcolor, $font, $community); if ip is in image use else
        imagettftext($image, $fsize4, 0, 260, 29, $fontcolor4, $font, $community);
        imagettftext($image, $fsize3, 0, 285, 190, $fontcolor3, $font, $cname);

//Its mysql time!
    $connect = mysqli_connect("127.0.0.1", "username", "password", "database");
    $sql = "INSERT INTO banner (`name`, `score`, `kills`, `deaths`, `kd`, `tp`, `connects`, `cname`, `vehicles`, `rank`, `community`, `uid`, `link`, `map`, `ip`, `fc1`, `fc2`, `fc3`, `fc4`, `bg`, `font`) VALUES('$name','$score','$kills','$deaths','$kd','$totalpops','$connects', '$cname', '$vehicles', '$rank', '$community', '$id', '$link', '$map', '$server', '$fcolor', '$fcolor2', '$fcolor3', '$fcolor4', '$bg', '$f')";
    $res = mysqli_query($connect,$sql);
    mysqli_close($connect);

    //header('Content-Disposition: Attachment;filename=' . $id . '&' . $map . '.png');
    //header('Content-type: image/png');
    //Output created image in png format
    $save = "".$id."&".$map.".png";
    imagepng($image, $save);
    //Imagepng($image);

    echo "<h1>Success! your image link is:</h1>";
    echo "</br></br>";
    echo "<h1><code>$link</code></h1>";
    echo "</br></br>";
    echo "<img src='".$link."'>";
    //Free memory
    ImageDestroy($image);
}