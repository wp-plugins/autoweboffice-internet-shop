
<div class="wrap" id="center-panel">
<div id="icon-options-general" class="icon32"><br></div>

<?php 
// Выводим меню навигации (вкладки)
include_once('navigation.php');
?>

<form action="admin.php?page=awo-options&tab=catalog" method="POST">
<input type="hidden" name="action" value="save_catalog_settings" />

<h3 class="title">Настройки отображения Каталога товаров:</h3> 

<table class="form-table">
	<tbody>
	
		<tr valign="top">
			<th scope="row"><label>Шоткод:</label></th>
			<td>[awo_catalog_of_goods]
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_catalog_goods_in_line">Товаров в строке:</label></th>
			<td>
				<select name="awo_catalog_goods_in_line" style="min-width: 100px;" id="awo_catalog_goods_in_line">
					<option class="level-0" value="3" <?php if($awo_catalog_goods_in_line == 3 or $awo_catalog_goods_in_line == 0) echo 'selected="selected"';?>>3 товара</option>
					<option class="level-0" value="4" <?php if($awo_catalog_goods_in_line == 4) echo 'selected="selected"';?>>4 товара</option>
				</select>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_catalog_goods_per_page">Товаров на одной странице:</label></th>
			<td><input name="awo_catalog_goods_per_page" type="number" id="awo_catalog_goods_per_page" 
			value="<?php echo $awo_catalog_goods_per_page; ?>" class="small-text">
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_catalog_settings_submit_value">Надпись на кнопке:</label></th>
			<td><input name="awo_catalog_settings_submit_value" type="text" id="awo_catalog_settings_submit_value" 
			value="<?php echo $awo_catalog_settings_submit_value; ?>" class="regular-text"></td>
		</tr>
		
	</tbody>
</table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить"></p>

</form>

</div> <!-- /#center-panel -->
