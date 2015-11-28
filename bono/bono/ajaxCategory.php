<?php
$category = $_REQUEST['category'];
$mainList = array(
					'Pattern'=>array('DIY','Design','Vintage','Inspiration','Beautiful'), 
					'DIY'=>array('Painted','Decorative','Handpaint','Creative','Vintage'), 
					'Vintage'=>array('Mismatched','Wall','White','Decorating','For sale'), 
					'Ceramic'=>array('Handpaint','Handmade','Designs','Idea','Rustic'), 
					'Sharpie'=>array('Ideas','Awesome','Homemade','Design','Friends'));

foreach ($mainList[$category] as $subCategory) {
?>
<li><a href="javascript:;"><?=$subCategory?></a></li>
<?php } ?>

<script>
	$(function(){
		$("#subCategory li").click(function(){
			$.ajax({
				type: 'POST',
				url: '/bono/ajaxContent.php',
				data: {type:$(this).find("a").html()},
				success: function(data) {
					$("#columns").html(data);
				}
			});
		});
	});
</script>