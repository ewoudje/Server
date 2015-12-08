<?php

function clean($string) {
return str_replace(array("\n", "\r"), ' ', $string);
}
$con=mysqli_connect("127.0.0.1","root","S0ulM@t3","stargatemc");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
function getNumEntries($addr,$server) {
$con=mysqli_connect("127.0.0.1","root","S0ulM@t3","stargatemc");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

     $resultnum = mysqli_query($con,"SELECT * FROM stargatemc.gates where address = '".$addr."' and server = '".$server."';");
        return mysqli_num_rows($resultnum);
}

$folders = array('stargatemc');
foreach ($folders as $folder) {
$files = '';
echo "Unzipping any compressed logs.." . PHP_EOL;
shell_exec("gzip -dfq /services/".$folder."/logs/*");
if (is_dir("/services/".$folder."/logs")) {
chdir("/services/".$folder."/logs");
$files = glob("*.log");
foreach ($files as $file) {
        $handle = fopen($file, "r");
        if ($handle) {
                while (($line = fgets($handle)) !== false) {
                        if (is_numeric(strpos($line,"STARGATE ADDED")) OR is_numeric(strpos($line,"STARGATE REMOVED"))) {
                                $gate = explode(" ", $line);
                                if ($gate[4] == "REMOVED" OR $gate[4] == "ADDED") {
                                        $address = clean($gate[7]);
                                        $action = $gate[4];
                                        $world = $gate[5];
					if (is_numeric(strpos("DIM_SPACESTATION40",$world))) {
						$world = "Space Station, Orbit of PL9-131b";
					} elseif (is_numeric(strpos("DIM-28",$world))) {
						$world = "PL9-131b";
					} elseif (is_numeric(strpos("DIM-29",$world))) {
						$world = "PL9-143";
					} elseif (is_numeric(strpos("DIM-30",$world))) {
						$world = "Asteroid Belt";
					} elseif (is_numeric(strpos("DIM-59",$world))) {
						$world = "PL9-315";
					} elseif (is_numeric(strpos("DIM88",$world))) {
						$world = "Antigravity Belt";
					}
                                        $coords = $gate[6];
                                        $time = $gate[0];
                                        $date = substr ( $file, NULL, 10 );
                                        if (is_numeric(strpos($date, "latest"))) {
                                                $date = date('Y-m-d');
                                        }
                                        if ($action == "ADDED" AND getNumEntries($address,$folder) == 0) {
                                                                                        mysqli_query($con,"INSERT INTO stargatemc.gates (server, address, world, coords, time, date) VALUES('".$folder."','".$address."','".strtolower($world)."','".$coords."','".$time."','".$date."')");                                }
                                    
                                        }
                                                                                if ($action == "REMOVED" AND getNumEntries($address,$folder) > 0) {
                                                                                        mysqli_query($con,"DELETE FROM stargatemc.gates where address = '".$address."' and server = '".$folder."';;");
                                        }
                        }
                }
        }
        fclose($handle);
}
}}
mysqli_close($con);
