<!-- <div class="block_bg" id="blog_bg">
	<div class="container" id="blog"><a name="blog"></a>
		<div class="row " id="blog_title">
			Блог
		</div>

	
		
	</div>
</div> -->
<?php	
		if(!empty($feeds)){
			?>
<div class="block_bg" id="blog_bg">
	<div class="container" id="blog"><a name="blog"></a>
		<div class="row " id="blog_title">
			Блог
		</div>

		<?php		
			$rus_mon=array('Jan'=>'января',
							'Feb'=>'февраля',
							'Mar'=>'марта',
							'Apr'=>'апреля',
							'May'=>'мая',
							'Jun'=>'июня',
							'Jul'=>'июля',
							'Aug'=>'августа',
							'Sep'=>'сентября',
							'Oct'=>'октября',
							'Nov'=>'ноября',
							'Dec'=>'декабря'
				);
			for($i=0;$i<3;$i++) {
			// print_r($feeds[$i]);	
			list($dayw,$day,$mon,$year) = sscanf($feeds[$i]['date'], "%s %d %s %d");
			$feeds[$i]['date'] = $day." ".$rus_mon[$mon]." ".$year;	
			echo "<div class='row blog_item'><div class='row blog_item_border'></div><div class='span12'><div class='row blog_item_date'><i>".$feeds[$i]['date']."</i></div><div class='row blog_item_title'><a href='".$feeds[$i]['link']."' target='_blank'>".$feeds[$i]['title']."</a></div></div></div>";
			}
		
		?>
		
	</div>
</div>
<?php }?>