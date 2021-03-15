<?php
    $site = "https://арендаспецтехники.бел/";
    include "../config/database.php";
    $mysqli = new mysqli($host, $user, $pass, $db);
    
    $page = $_POST["page"];
    $canonical = $site.$_POST["path"];
    $header = $_POST["header"];
    $title = $_POST["title"];
    $keywords = $_POST["keywords"];
    $describtion = $_POST["describtion"];
    $socimg = $site.$_POST["socimg"];
    $filename = "article/".$_POST["filename"];
    $datestamp = $_POST["datestamp"];
    $newscardimg = $site."cardimg/".$_POST["newscardimg"];
    $altimg = $_POST["altimg"];
    $article = $_POST["article"];
    
    $result = $mysqli->query("INSERT INTO `adb`.`pages` (`id`, `canonical`, `header`, `title`, `keywords`, `describtion`, `soctitle`, `socurl`, `socimg`, `annotation`, `newsdate`) VALUES (NULL, '".$canonical."', '".$header."', '".$title."', '".$keywords."', '".$describtion."', '".$title."', '".$canonical."', '".$socimg."', '".$filename."', '".$datestamp."')");
    
    $result = $mysqli->query("INSERT INTO `adb`.`newscards` (`id`, `pageID`, `header`, `link`, `image`, `altimg`, `anno`) VALUES (NULL, '".$page."', '".$title."', '".$canonical."', '".$newscardimg."', '".$altimg."', '".$describtion."')");
    
    $fp = fopen("../".$filename, "w");
    fwrite($fp, $article);
    fclose($fp);
    
    $result = $mysqli->query("SELECT max(id) FROM `pages`");
    $row = $result->fetch_row();
    
    echo "RewriteRule ".$_POST["path"]." /news.php?page=".$row[0];
    
    $mysqli->close();
?>