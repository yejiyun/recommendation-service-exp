<?php
$type = $_REQUEST["type"];
$directoryList = array(
  'DIY' => '2page',
  // 'Design' => '11-20',
  // 'Vintage' => '21-30',
  // 'Inspiration' => '31-40',
  // 'Beautiful' => '41-50',
  // 'Painted' => '51-60',
  // 'Decorative' => '61-70',
  // 'Handpaint' => '71-80',
  // 'Creative' => '81-90',
  // 'Vintage' => '91-100',
 //    'Mismatched' => '101-110',
  // 'Wall' => '111-120',
  // 'White' => '121-130',
  // 'Decorating' => '131-140',
  // 'For sale' => '141-150',
  // 'Handpaint' => '151-160',
  // 'Handmade' => '161-170',
  // 'Designs' => '171-180',
  // 'Idea' => '181-190',
  // 'Rustic' => '191-200',
  // 'Ideas' => '201-210',
  // 'Awesome' => '211-220',
  // 'Homemade' => '221-230',
  // 'Design' => '231-240',
  // 'Friends' => '241-250',
);

// $userName = isset($_POST["form-username"]) ? $_POST["form-username"] : "";
// if ($userName == "") {
// 	echo "<script>alert('로그인 해주세요 '); location.href ='index.html';</script>";
// }
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="bono.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
		var count=1;
		function saveSelectImage(saveName) {
          $.ajax({
            type: 'POST',
            url: 'save.php',
            data: {selectName: saveName, count:count},
            success: function(data) {
				if (data == "ok") {
					alert("[" + count + "] 선택 완료!");
					count++;
				} else {
					alert("[" + count + "] 선택 오류!");
				}
            }
          });
		 }
    </script>
  </head>

  <body>
<!--     <a href="index.php">초기화면</a> -->
    <h1>Best Ranking</h1>
    <style type="text/css">
    h1 { 
      text-align: center;
      font-size: 15pt;
      margin : 0 25; 
    }
    </style>
    <header>
    </header>

    <div id="nav">
      <div id="wrapper">
        <div id="columns" align="center">
			<hr>
          <?php foreach ($directoryList as $directory) {
            $files = scandir('./Image/'.$directory, 0);
            
            $files = array_slice($files,2);
            shuffle($files);

			$handle = fopen("result.txt", 'a');
			fwrite($handle, $userName."\n");
			foreach ($files as $index => $imageName) {
				fwrite($handle, $imageName."\n");
			}
			fclose($handle);			

			for ($i=0; $i<5; $i++) {
			?>
				<div class="pin"><a href="javascript:saveSelectImage('<?=$files[$i]?>');"><span style="position: absolute;"><font color="red"><?=$i+1?></font></span><img class="image_item" src="./Image/<?=$directory?>/<?=$files[$i]?>" /></a></div>
			<?php
			}
			?>
			<hr><br />
			<?php
            for ($j=5; $j<count($files); $j++) {
				if ($j > 5 && (($j % 5) == 0))	echo '<br />';
            ?>
              <div class="pin"><a href="javascript:saveSelectImage('<?=$files[$j]?>');"><img class="image_item" src="./Image/<?=$directory?>/<?=$files[$j]?>" /></a></div>
            <?php
            }
          }
          ?>
		  <hr>
				<input type="button" class = "btn" onclick="location.href='test5.php';" value="다음" />
		  <hr>
        </div>
      </div>
    </div>
  </body>
</html>
