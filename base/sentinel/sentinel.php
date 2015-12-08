<?php


function unloadWorld() {

}
$con=mysqli_connect("127.0.0.1","root","S0ulM@t3","stargatemc");
$count = 1;
$result = mysqli_query($con,"select name,world,online from stargatemc.Inquisitor_players");
while($row = $result->fetch_assoc())
{

}
