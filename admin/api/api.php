
<div class="wrap" id="center-panel">
<div id="icon-options-general" class="icon32"><br></div>

<?php 
// Выводим меню навигации (вкладки)
include_once('navigation.php');
?>


<form action="admin.php?page=awo-api" method="POST">
<input type="hidden" name="action" value="save_api_settings" />

<h3 class="title">Настройки подключения к магазину, зарегистрированному в сервисе АвтоОфис:</h3> 

<table class="form-table">
	<tbody>
		<tr valign="top">
			<th scope="row"><label for="awo_id_stores">ID магазина:</label></th>
			<td><input name="awo_id_stores" type="text" id="awo_id_stores" 
			value="<?php echo $awo_id_stores; ?>" class="small-text">
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_storesId">Идентификатор магазина:</label></th>
			<td><input name="awo_storesId" type="text" id="awo_storesId" 
			value="<?php echo $awo_storesId; ?>" class="regular-text">
			<p class="description">Уникальный идентификатор магазина</p></td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_api_key_get">API_KEY_GET</label></th>
			<td><input name="awo_api_key_get" type="text" id="awo_api_key_get" 
			value="<?php echo $awo_api_key_get; ?>" class="regular-text">
			<p class="description">API-ключ для получения данных</p></td>
		</tr>
		
	</tbody>
</table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить"></p>

</form>

</div> <!-- /#center-panel -->
