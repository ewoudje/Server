<?php

$con=mysqli_connect("127.0.0.1","root","S0ulM@t3","stargatemc");
$count = 1;
exec("rm /services/stargatemc/gatelog/gates/*");
$result = mysqli_query($con,"SELECT world,address from stargatemc.gates where world NOT LIKE '%-homeworld'");
while($row = $result->fetch_assoc())
{
file_put_contents("/services/stargatemc/gatelog/gates/" . $count,"{");
file_put_contents("/services/stargatemc/gatelog/gates/" . $count,"  name = \"".strtoupper($row['world'])."\",",FILE_APPEND);
file_put_contents("/services/stargatemc/gatelog/gates/" . $count,"  address = \"".strtoupper($row['address'])."\",",FILE_APPEND);
file_put_contents("/services/stargatemc/gatelog/gates/" . $count,"}",FILE_APPEND);
$count++;
}
exec("cp /services/stargatemc/P2Y-321/computer/14/history /services/stargatemc/gatelog/gates/");
exec("rm /services/stargatemc/P2Y-321/computer/14/*");
exec("cp /services/stargatemc/gatelog/gates/* /services/stargatemc/P2Y-321/computer/14/");
exec("cp /services/stargatemc/gatelog/computercraft/* /services/stargatemc/P2Y-321/computer/14/");
