<?php
$id=$_GET["id"];
if ($id) {
include "config/database.php";
$mysqli = new mysqli($host, $user, $pass, $db);
$result = $mysqli->query("SELECT * FROM items WHERE id=".$id);
$row = $result->fetch_assoc();
$row["title"] = $row["type"]." ".$row["manu"]." ".$row["model"].", технические характеристики";
$row["keywords"] = $row["typegroup"].", ".$row["type"].", ".$row["manu"]." ".str_replace('-', '', $row["model"]).", технические характеристики, фото";
$row["canonical"] = "https://арендаспецтехники.бел/".$row["typegroup"]."/".str_replace(' ', '', $row["manu"])."/".str_replace(' ', '', $row["model"]);

include "scripts/header.php";
?>

        <h1 class="header"><?php echo $row["type"]." ".$row["manu"]." ".$row["model"]; ?></h1>
        <?php
        include "scripts/contact.php";
        ?>

        <div class="row">
            <p><?php echo $row["describtion"]; ?></p>
        </div>
        
        <?php
        $path = "specs/".$row["typegroup"]."/".str_replace(' ', '_', $row["manu"])."/".str_replace('/', '-', str_replace(' ', '_', $row["model"]))."/";
        include "scripts/slider.php";
        include $path."index.htm";
        ?>
        
        <h4 style="margin-top: 16px;">Технические характеристики <?php echo $row["manu"]." ".$row["model"]; ?></h4>
        <div class="itemspecs">
		            <table class="tablespecs"><thead class="tablehead"><tr><th>Specification</th><th>Value</th></tr></thead>
			        <tbody>
			            <?php
                        $resultspecs = $mysqli->query("SELECT * FROM fullspecs WHERE itemID=".$row["id"]." ORDER BY id asc");
                        if ($resultspecs) {
                            $i=0;
                            while ($specs = $resultspecs->fetch_assoc()) { ?>
				        <tr class="trspecs<?php if ($i % 2 === 0) { echo 0; } else { echo 1; } ?>"><td class="tdspecs"><?php echo $specs["specname"]; ?></td><td class="tdspecs"><?php if ($specs["upto"]) echo "до "; echo str_replace(".",",",$specs["specvalue"])." ".$specs["specunit"]; ?></td></tr>
				        <?php
				            $i++;
                            }
                        }
                        ?>
			        </tbody>
		            </table>
	            </div>
        <?php
        
    include "scripts/bottom.php";
$mysqli->close();
}
?>