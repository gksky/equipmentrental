<?php
if ($_GET["page"]) $page=$_GET["page"];
else $page=1;
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
        $result = $mysqli->query("SELECT * FROM groups WHERE pageID=".$page." ORDER BY id");
        if ($result) {
            while ($row = $result->fetch_assoc()) { ?>

        <div class="group">
            <a href="<?php echo $row["link"]; ?>">
                <img src="<?php echo $row["image"]; ?>" class="groupimg" alt="<?php echo $row["altimg"]; ?>">
            </a>
            <h4 class="groupname">
                <a href="<?php echo $row["link"]; ?>"><?php echo $row["name"]; ?></a>
            </h4>
            <p><?php echo $row["describtion"]; ?></p>
        </div>

        <?php
            }
        }
        include "scripts/contact.php";

        $result = $mysqli->query("SELECT * FROM newscards WHERE pageID=".$page." ORDER BY id desc LIMIT 11");
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