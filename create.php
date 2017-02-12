<?php
//setup a cron job to run this every hour?
//i recommend https://cron-job.org/en/ and just point it to this (create.php)
session_start();
create_image();
exit();
function create_image()
{
    $connect = mysqli_connect("127.0.0.1", "username", "password", "database");
    $sql = 'SELECT `name`, `score`, `kills`, `deaths`, `kd`, `tp`, `connects`, `cname`, `vehicles`, `rank`, `community`, `uid`, `link`, `map`, `ip`, `fc1`, `fc2`, `fc3`, `fc4`, `bg`, `font` FROM `banner`';
    $result = mysqli_query($connect, $sql);
    while ($row = $result->fetch_assoc()) {

        $f = $row['font'];
        $fcolor = $row['fc1'];
        list($r, $g, $b) = sscanf($fcolor, "#%02x%02x%02x");
//txt 2 color
        $fcolor2 = $row['fc2'];
        list($r2, $g2, $b2) = sscanf($fcolor2, "#%02x%02x%02x");
//player name color
        $fcolor3 = $row['fc3'];
        list($r3, $g3, $b3) = sscanf($fcolor3, "#%02x%02x%02x");
//server name color
        $fcolor4 = $row['fc4'];
        list($r4, $g4, $b4) = sscanf($fcolor4, "#%02x%02x%02x");

        $id = $row['uid'];
        //$map = $_POST["map"];
        $bg = $row['bg'];
        $community = $row['community'];
        //$server = $row['server'];
        $map = $row['map'];
        $name = $row['name'];
        $score = $row['score'];
        //$kills = $row['kills'];
        //$deaths = $row['deaths'];
        $kd = $row['kd'];
        $connects = $row['connects'];
        // $locker = $row['bank'];
        //$money = $row['money'];
        $totalpops = $row['tp'];
        //$firstconnect = $row['firstcon'];
        // $firstconnect = $row['lastcon'];
        //$lastdisconnect = $row['lastdiscon'];
        $cname = $row['cname'];
        //$vehicles = $row['vehicles'];
        //$rank = $row['rank'];

        $link = $row['link'];
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

        //header('Content-type: image/png');
        //Output the image in png format
        $save = "".$id."&".$map.".png";
        imagepng($image, $save);
        //Imagepng($image);
        echo "Players image got updated </br>";
        ImageDestroy($image);
    }
}