<?php
$type = $_REQUEST["type"];
$directoryList = array(
	'DIY' => '1-10',
	'Design' => '11-20',
	'Vintage' => '21-30',
	'Inspiration' => '31-40',
	'Beautiful' => '41-50',
	'Painted' => '51-60',
	'Decorative' => '61-70',
	'Handpaint' => '71-80',
	'Creative' => '81-90',
	'Vintage' => '91-100',
    'Mismatched' => '101-110',
	'Wall' => '111-120',
	'White' => '121-130',
	'Decorating' => '131-140',
	'For sale' => '141-150',
	'Handpaint' => '151-160',
	'Handmade' => '161-170',
	'Designs' => '171-180',
	'Idea' => '181-190',
	'Rustic' => '191-200',
	'Ideas' => '201-210',
	'Awesome' => '211-220',
	'Homemade' => '221-230',
	'Design' => '231-240',
	'Friends' => '241-250',
);



$files = scandir('./Image/'.$directoryList[$type], 0);
$files = array_slice($files,2);
shuffle($files);

foreach ($files as $index => $filename) {
?>
	<div class="pin"> <img class="image_item" src="/bono/Image/<?=$directoryList[$type]?>/<?=$filename?>" /></div>
<?php
}
?>
