<?php
$page=$_GET["page"];
if ($page) {
include "config/database.php";
$mysqli = new mysqli($host, $user, $pass, $db);
$result = $mysqli->query("SELECT * FROM pages WHERE id=".$page);
$row = $result->fetch_assoc();
include "scripts/header.php";
?>

        <h1 class="header"><?php echo $row["header"]; ?></h1>
        <?php
        include "scripts/contact.php";
        ?>

        <div class="row">
            <p><?php echo $row["annotation"]; ?></p>
        </div>
        
        <?php
        $result = $mysqli->query("SELECT * FROM items WHERE pageID=".$page." ORDER BY mainspecvalue asc");
        if ($result) {
            while ($row = $result->fetch_assoc()) { ?>

        <div class="itemrow">
            <div class="itemimg">
			    <?php if ($row["typegroup"]) {?><a href='<?php echo $row["typegroup"]."/".str_replace(" ", "_", $row["manu"])."/".str_replace('/', '-', str_replace(' ', '_', $row["model"])); ?>'><?php }; ?><img class="mainimg" src="<?php echo $row["picture"]; ?>" alt="<?php echo $row["type"]." ".$row["manu"]." ".$row["model"]; ?>"><?php if ($row["typegroup"]) echo "</a>"; ?>
	        </div>
	        <div class="desc">
                <div class="itemheader">
		            <h4><?php if ($row["typegroup"]) {?><a href='<?php echo $row["typegroup"]."/".str_replace(" ", "_", $row["manu"])."/".str_replace('/', '-', str_replace(' ', '_', $row["model"])); ?>'><?php }; echo $row["type"]." ".$row["manu"]." ".$row["model"]; if ($row["typegroup"]) echo "</a>"; ?></h4>
	            </div>
	            <p class="itemdesc"><?php echo $row["describtion"]; ?></p>
	            <div class="itemspecs">
		            <table class="tablespecs"><thead class="tablehead"><tr><th>Specification</th><th>Value</th></tr></thead>
			        <tbody>
			            <?php
                        $resultspecs = $mysqli->query("SELECT * FROM specs WHERE itemID=".$row["id"]." ORDER BY id");
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
	        </div>
            <div style="clear: left;"></div>
        </div>

        <?php
            }
        }
        include "scripts/contact.php";
        
        $result = $mysqli->query("SELECT * FROM newscards WHERE pageID=".$page." ORDER BY id desc LIMIT 8");
        if ($result) {
            $row = $result->fetch_assoc();
            if ($row) {
            ?>
            
            <div class="separator"></div>
            
            <?php
            }
            while ($row) { ?>

        <div class="newscard">
            <div class="img-box">
                <img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["altimg"]; ?>">
            </div>
            <a href="<?php echo $row["link"]; ?>">
            <div class="content">
                <h4><?php echo $row["header"]; ?></h4>
                <p><?php echo $row["anno"]; ?></p>
            </div>
            </a>
        </div>
        
        <?php
            $row = $result->fetch_assoc();
            }
        }
        
        $result = $mysqli->query("SELECT * FROM seo WHERE pageID=".$page." ORDER BY date asc");
        if ($result) {
            $row = $result->fetch_assoc();
            if ($row) {
            ?>
            
            <div class="separator"></div>
            
            <?php
            }
            while ($row) { ?>
                
                <div class="row">
                    <?php

                    include $row["source"];
                    
                    ?>
                </div>
                
                <?php
                
                $row = $result->fetch_assoc();
            }
        }
    include "scripts/bottom.php";
$mysqli->close();
}
?>