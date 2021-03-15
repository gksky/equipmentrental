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
        <div class="datestamp"><?php echo date("d.m.Y", strtotime($row["newsdate"])); ?></div>
        

        <div class="row">
            
            <?php
            include $row["annotation"];
            ?>
            
        </div>
        
<?php        
    include "scripts/bottom.php";
$mysqli->close();
}
?>