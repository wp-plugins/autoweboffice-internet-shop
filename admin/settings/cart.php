
<div class="wrap" id="center-panel">
<div id="icon-options-general" class="icon32"><br></div>

<?php 
// Выводим меню навигации (вкладки)
include_once('navigation.php');
?>

<form action="admin.php?page=awo-options&tab=cart" method="POST">
<input type="hidden" name="action" value="save_cart_settings" />

<h3 class="title">Настройки отображения Корзины заказа:</h3> 

<table class="form-table">
	<tbody>
	
		<tr valign="top">
			<th scope="row"><label>Шоткод:</label></th>
			<td>[awo_cart_info_shot]
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_cart_settings_submit_value">Надпись на кнопке:</label></th>
			<td><input name="awo_cart_settings_submit_value" type="text" id="awo_cart_settings_submit_value" 
			value="<?php echo $awo_cart_settings_submit_value; ?>" class="regular-text"></td>
		</tr>
		
	</tbody>
</table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить"></p>

</form>

</div> <!-- /#center-panel -->
