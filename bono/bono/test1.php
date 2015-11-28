<?php
$mainList = array('Pattern', 'DIY', 'Vintage', 'Ceramic', 'Sharpie');
shuffle($mainList);
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/bono/bono.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
      $(function(){
        $("#category li").click(function(){
          $.ajax({
            type: 'POST',
            url: '/bono/ajaxCategory.php',
            data: {category:$(this).find("a").html()},
            success: function(data) {
              $("#subCategory").html(data);
              $("#category").hide();
            }
          });
        });
      });
    </script>
  </head>

  <body>
    <a href="index.php">초기화면</a>
    <h1>원하는 상품찾기1</h1>
    <header>
      <div class = "nav">
        <ul id="category">
          <?php foreach ($mainList as $name) { ?>
          <li><a href="javascript:;"><?=$name?></a></li>
          <?php } ?>
        </ul>s
        <ul id="subCategory">
        </ul>
      </div>
    </header>

    <div id="nav">
      <div id="wrapper">
        <div id="columns"></div>
      </div>
    </div>
  </body>
</html>
