<!DOCTYPE html>
<html>
<head>
  <title>My first Vue app</title>
  <script src="https://unpkg.com/vue"></script>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
  body, input, select, #describtion {
  	font-family: 'Open Sans', sans-serif;
    font-weight: 400;
	font-style: normal;
	font-size: 16px;
	line-height: 1.5em;
  }
    #seo {
        display: inline-block;
        width: 49%;
    }
    #newscard {
        display:inline-block;
        width: 49%;
        vertical-align: top;
    }
    #article, #describtion{
        width: 97%;
        max-width: 97%;
        min-width: 97%
    }
    .longtxt {
        width: 99%;
        max-width: 99%;
    }
    .shorttxt {
        width: 98%;
        max-width: 98%;
    }
    .short {
        display:inline-block;
        width: 50%;
        max-width: 50%;
    }
    h4 {
    	font-weight: 700;
    	line-height: 1.1em;
    	text-align: left;
    	margin: 0 0 10px;
    }
    .newscard{
        position: relative;
        width: 325px;
        height: 244px;
        overflow: hidden;
        transition: 0.5s;
        display: inline-block;
        z-index: 0;
    }

    .newscard .img-box{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 244px;
        transition: 0.5s;
    }

    .newscard:hover .img-box{
        opacity: 0.5;
    }

    .newscard .img-box img{
        width: 100%;
    }

    .newscard .content{
        position: absolute;
        width: 100%;
        height: 244px;
        bottom: -181px;
        padding: 10px;
        padding-top: 20px;
        box-sizing: border-box;
        transition: 0.5s;
    	background: linear-gradient( rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8) );
    }

    .newscard .content h4{
        text-align: center;
        margin: 0 0 10px;
        padding: 0;
        color: #000;
        font-size: 16px;
        height: 45px;
    }

    .newscard .content p{
        margin: 0;
        padding: 0;
        color: #000;
        font-size: 16px;
    }

    .newscard:hover .content{
        bottom: 0;
    }
    #newscardimg, #page {
        width: 99%;
        max-width: 99%;
    }
  </style>

</head>
<body>
    <div id="app">
        <form action="insert.php" method="POST">
        <div id="seo">
            <p>page: <br>
                <select name="page" id="page">
                    <?php
                        include "../config/database.php";
                        $mysqli = new mysqli($host, $user, $pass, $db);
                        $result = $mysqli->query("SELECT id, header FROM pages");
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=".$row["id"].">".$row["header"]."</option>";
                            }
                        }
                        //$mysqli->close();
                    ?>
                </select>
            </p>
            <p>title: <br><input name="title" id="title" class="longtxt" v-model="title"></p>
            <p>keywords: <br><input name="keywords" id="keywords" class="longtxt"></p>
            <p>describtion: <br><textarea name="describtion" id="describtion" v-model="describtion" rows="5"></textarea></p>
            <p>header: <br><input name="header" id="header" class="longtxt"></p>
            <p class="short">filename: <br><input name="filename" id="filename" class="shorttxt"></p><p class="short">datestamp: <br><input name="datestamp" id="datestamp" class="shorttxt"></p>
        </div>
        <?php
            $dir    = '../cardimg';
            $imagelist = scandir($dir);
            $i=2;
        ?>
        <div id="newscard">
            <p>newscardimg: <br>
                <select name="newscardimg" id="newscardimg" v-model="newscardimg">
                    <?php
                        while ($imagelist[$i]) {
                            echo "<option value='".$imagelist[$i]."'>".$imagelist[$i]."</option>";
                            $i++;
                        }
                    ?>
                </select>
            </p>
            <p>altimg: <br><input name="altimg" id="altimg" class="longtxt"></p>
            <p>path: <br><input name="path" id="path" class="longtxt"></p>
            <p>socimg: https://арендаспецтехники.бел/<br><input name="socimg" id="socimg" class="longtxt" value="article/pics/"></p>
            <div class="newscard">
            <div class="img-box">
                <img :src="'https://арендаспецтехники.бел/cardimg/' + newscardimg" alt="">
            </div>
            <div class="content">
                <h4>{{ title }}</h4>
                <p>{{ describtion }}</p>
            </div>
            </div>
        </div>
        article: <?php echo $img = htmlentities("<img src=\"./article/pics/\" class=\"artimg1200\" alt=\"\">"); ?><br><textarea name="article" id="article" rows="25"></textarea>
        <button type="submit">Добавить новость</button>
        </form>
        
    </div>


  <script>
    var app = new Vue({
      el: '#app',
      data: {
        newscardimg: '',
        title: '',
        describtion: '',
    },
      methods: {
          
      }
  });
  </script>
</body>
</html>
