<form method="post" action="">
<input type="hidden" value="true" name="awo_search">
	<div style="width: 100%; margin:10px 0px 10px 0px;">
		<input type="text" id="awo_search_goods" name="awo_search_goods" value="<?php if($awo_search_goods != '') {echo $awo_search_goods;} else {echo 'Поиск по всем товарам';} ?>" 
			onfocus="if(this.value == 'Поиск по всем товарам'){this.value=''; this.style.color = 'black'}" 
			onblur="if(this.value == ''){this.value='Поиск по всем товарам'; this.style.color = '#999999'}" 
			style="color: rgb(153, 153, 153); width: 60%;">
		<input type="submit" value="Поиск" style="width: 25%; margin:3px; float: right;">
	</div>
</form>