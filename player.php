<?php
require ('steamauth/steamauth.php');
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/exilepng/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<title>Player Banner</title>
</html>
<?php
if(!isset($_SESSION['steamid'])) {
    echo "<div class='jumbotron'><h1>Please login to see your character data</h1></br></div>";
    loginbutton(); //login button
}  else {
    include('steamauth/userInfo.php');
    $id = $_SESSION['steamid'];
    $connect = mysqli_connect("127.0.0.1", "username", "password", "database");

    //EDIT THIS to your server name (dosent have to be exact)/////////////////////////////////////////////////////////
    $community = "Exile MAP MILITARY CUP 15k";
    //EDIT THIS to your server ip:port///////////////////////////////////////////////////////////////////////////////
    $server = "127.0.0.1:2302";

    $sql = 'SELECT account.score, account.kills, account.deaths, account.locker, account.total_connections, account.last_connect_at, account.last_disconnect_at, account.first_connect_at, player.money, player.name FROM player INNER JOIN account ON account.uid = player.account_uid WHERE player.account_uid = '.$id.'';
    $result = mysqli_query($connect, $sql);
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $score = number_format($row['score']);
        $kills = $row['kills'];
        $deaths = $row['deaths'];
        $kdraw = $kills / $deaths;
        $kd = number_format($kdraw, 1, '.', '');
        $connects = $row['total_connections'];
        $lastconnect = $row['last_connect_at'];
        $firstconnect = $row['first_connect_at'];
        $lastdisconnect = $row['last_disconnect_at'];
        $lockerraw = $row['locker'];
        $locker = number_format($row['locker']);
        $moneyraw = $row['money'];
        $money = number_format($row['money']);
        $totalpops = number_format($moneyraw + $lockerraw);
        //cache vars
        $_SESSION['community'] = $community;
        $_SESSION['server'] = $server;
        $_SESSION['name'] = $name;
        $_SESSION['score'] = $score;
        $_SESSION['kills'] = $kills;
        $_SESSION['deaths'] = $deaths;
        $_SESSION['kd'] = $kd;
        $_SESSION['connections'] = $connects;
        $_SESSION['bank'] = $locker;
        $_SESSION['money'] = $money;
        $_SESSION['totalpops'] = $totalpops;
        $_SESSION['firstcon'] = $firstconnect;
        $_SESSION['lastcon'] = $firstconnect;
        $_SESSION['lastdiscon'] = $lastdisconnect;
    }
    //count vehicles owned
    $sql = 'SELECT count(*) FROM vehicle WHERE account_uid = '.$id.'';
    $result = mysqli_query($connect, $sql);
    while ($row = $result->fetch_assoc()) {
        $vehicles = $row['count(*)'];
        //cache vars
        $_SESSION['vehicles'] = $vehicles;
    }
    //get clan
    $sql = 'SELECT account.clan_id, clan.name FROM account INNER JOIN clan ON account.clan_id = clan.id WHERE account.uid = '.$id.'';
    $result = mysqli_query($connect, $sql);
    while ($row = $result->fetch_assoc()) {
        $clanname = $row['name'];
         //cache vars
        $_SESSION['clanname'] = $clanname;
    }
    //get territory
    $sql = 'SELECT account.uid, territory.name, territory.level, territory.radius, territory.flag_texture FROM account INNER JOIN territory ON account.uid = territory.owner_uid WHERE account.uid = '.$id.'';
    $result = mysqli_query($connect, $sql);
    while ($row = $result->fetch_assoc()) {
        $tname = $row['name'];
        $tlevel = $row['level'];
        $tradius = $row['radius'];
        $tflag = $row['flag_texture'];
        //cache vars
        $_SESSION['tname'] = $tname;
        $_SESSION['tlevel'] = $tlevel;
        $_SESSION['tradius'] = $tradius;
        $_SESSION['tflag'] = $tflag;
    }
}
echo logoutbutton();
echo "<header>";
echo "</br>";
echo "<h1>$name</h1>";
echo "<h1>$server   -   $community</h1>";
echo "</header>";
?>
<div class="container" style="margin-top: 30px; margin-bottom: 30px; padding-bottom: 10px; background-color: #011f4b;">
    <form class="form-horizontal" method="post" action="image.php">
        <div class="form-group" style="margin-top: 10px;>
        <label for=" inputmap" class="col-sm-2 control-label"></label>
        <div>
        Map:
        <select name="map">
            <option value="Altis">Altis</option>
            <option value="Bornholm">Bornholm</option>
            <option value="Chernarus">Chernarus</option>
            <option value="ChernarusWinter">Chernarus Winter</option>
            <option value="Dingor">Dingor</option>
            <option value="Esseker">Esseker</option>
            <option value="Lingor">Lingor</option>
            <option value="MSKE">MSKE Islands</option>
            <option value="Nam">Nam</option>
            <option value="Namalsk">Namalsk</option>
            <option value="Napf">Napf</option>
            <option value="Stratis">Stratis</option>
            <option value="Tanoa">Tanoa</option>
            <option value="Taunus">Taunus</option>
            <option value="Utes">Utes</option>
        </select>
            </div>
        </br>
        </br>
        <div>
            Background Design:
            <select name="bg">
                <option value="exile">Exile</option>
                <option value="cherno">Chernarus</option>
                <option value="namalsk">Namalsk</option>
                <option value="esseker">Esseker</option>
                <option value="altis">Altis</option>
                <option value="lingor">Lingor</option>
                <option value="tanoa">Tanoa</option>
                <option value="black">Black</option>
                <option value="white">White</option>
                <option value="digicamo1">Digital camo jungle</option>
                <option value="digicamo2">Digital camo snow</option>
                <option value="marblefade">Marble fade</option>
                <option value="carbonfibre">Carbon Fibre</option>
            </select>
        </div>
        </br>
        </br>
        <div>
            Font style:
            <select name="font">
                <option value="arial">Arial</option>
                <option value="chiller">Chiller</option>
                <option value="harlow">Harlows</option>
                <option value="micra">Micra</option>
                <option value="ocrastd">Ocra</option>
                <option value="stencil">Stencil</option>
                <option value="wasted">Wasted</option>
            </select>
        </div>
        </br>
        </br>
        <div>
            Text color:  <input type='color' name='fontcolor' value='#44d7a8'>
        </div>
        </br>
        </br>
        </br>
        <div>
            Text 2 color:  <input type='color' name='fontcolor2' value='#f4f3f3'>
        </div>
        </br>
        </br>
        </br>
        <div>
           Player name Text color:  <input type='color' name='fontcolor3' value='#ffa62f'>
        </div>
        </br>
        </br>
        </br>
        <div>
            Server Name Text color:  <input type='color' name='fontcolor4' value='#33a0d2'>
        </div>
        </br>
        </br>

</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Generate</button>
    </div>
</div>
