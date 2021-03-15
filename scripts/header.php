<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns:fb="ogp.me/ns/fb#" lang="ru-BY" xml:lang="ru-BY">
<head>
<title>
    <?php echo $row["title"]; ?>

</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Global site tag (gtag.js) - Google Analytics -->
    <script defer src="https://www.googletagmanager.com/gtag/js?id=UA-90808610-1"></script>
    <script defer>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-90808610-1');
    </script>
<meta name="yandex-verification" content="8863117e1934465d" />
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(56271604, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56271604" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="<?php echo $row["keywords"]; ?>" />
<meta name="description" content="<?php echo $row["describtion"]; ?>" />
<meta name="og:title" content="<?php echo $row["title"]; ?>">
<meta name="og:type" content="website">
<meta name="og:image" content="<?php echo $row["socimg"]; ?>">
<meta name="og:url" content="<?php echo $row["socurl"]; ?>">
<meta name="og:locale" content="ru_BY">
<link rel="shortcut icon" href="" type="image/x-icon">
    <!-- For iPad 3 with high-resolution Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="">
    <!-- For iPhone 4 with high-resolution Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="">
    <!-- For first-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="">
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="">
    <!-- For nokia devices: -->
<link rel="shortcut icon" href="">
<link rel="canonical" href="<?php echo $row["canonical"]; ?>"/>
<link rel="stylesheet" href="https://арендаспецтехники.бел/style.css">
</head>

<body>
    <div class="container">
        <div class="sitename"><a href="https://арендаспецтехники.бел/">арендаспецтехники.бел</a></div>
        
        <?php
        include "scripts/menu.php";
        ?>