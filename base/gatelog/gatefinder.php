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
$world_replacements = array(
	
	"DIM-548" => "Sirius B",
	"DIM-550" => "Venus",
	"DIM-544" => "Polongnius",
	"DIM-553" => "Phobos",
	"DIM-545" => "Nibiru",
	"DIM-549" => "Mercury",
	"DIM-603" => NULL,
	"DIM-602" => NULL,
	"DIM-543" => "Koentus",
	"DIM-547" => "Kapteyn B",
	"DIM-601" => NULL,
	"DIM-600" => NULL,
	"DIM-500" => "Jupiter",
	"DIM-546" => "Fronos",
	"DIM-542" => "Diona",
	"DIM-552" => "Demios",
	"DIM-554" => "Planetary Remains, P7J-981",
	"DIM-29" => "PL9-143",
	"DIM-28" => "P2Y-321b",
	"DIM_SPACESTATION_40" => NULL,
	"DIM-30" => "Asteroid Belt",
	"DIM-59" => "PL9-135",
	"DIM88" => "Antigravity Belt"
	);

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
                                        if (isset($world_replacements[$world])) {
                                        	$world = $world_replacements[$world];
                                        } else {
                                        	if (is_numeric(strpos($world,"DIM"))) {
                                        		$world = "Unknown";
                                        	} else {
                                        		$world = $world;
                                        	}
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
