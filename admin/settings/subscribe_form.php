
<div class="wrap" id="center-panel">
<div id="icon-options-general" class="icon32"><br></div>

<?php 
// Выводим меню навигации (вкладки)
include_once('navigation.php');
?>

<form action="admin.php?page=awo-options&tab=subscribe_form" method="POST">
<input type="hidden" name="action" value="save_subscribe_form_settings" />

<h3 class="title">Настройки формы подписки на рассылку проекта:</h3> 

<table class="form-table">
	<tbody>
	
		<tr valign="top">
			<th scope="row"><label>Шоткод:</label></th>
			<td>[awo_subscribe_form]
			</td>
		</tr>
	
		<tr valign="top">
			<th scope="row"><label for="awo_id_newsletter">ID рассылки:</label></th>
			<td><input name="awo_id_newsletter" type="text" id="awo_id_newsletter" 
			value="<?php echo $awo_id_newsletter; ?>" class="small-text">
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_id_advertising_channel_page">ID канала рекламы:</label></th>
			<td><input name="awo_id_advertising_channel_page" type="text" id="awo_id_advertising_channel_page" 
			value="<?php echo $awo_id_advertising_channel_page; ?>" class="small-text">
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_last_name">Запрашивать Фамилию:</label></th>
			<td><input id="awo_last_name" type="checkbox" name="awo_last_name" value="1"
						<?php
						if ($awo_last_name == '1')
								echo ' checked="checked"'
						?> />
			</td>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_name">Запрашивать Имя:</label></th>
			<td><input id="awo_name" type="checkbox" name="awo_name" value="1"
						<?php
						if ($awo_name == '1')
								echo ' checked="checked"'
						?> />
			</td>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_middle_name">Запрашивать Отчество:</label></th>
			<td><input id="awo_middle_name" type="checkbox" name="awo_middle_name" value="1"
						<?php
						if ($awo_middle_name == '1')
								echo ' checked="checked"'
						?> />
			</td>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_email">Запрашивать Email:</label></th>
			<td><input id="awo_email" type="checkbox" name="awo_email" value="1" checked="checked" disabled />
			</td>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_phone_number">Запрашивать Телефон:</label></th>
			<td><input id="awo_phone_number" type="checkbox" name="awo_phone_number" value="1"
						<?php
						if ($awo_phone_number == '1')
								echo ' checked="checked"'
						?> />
			</td>
			</td>
		</tr>
		
	   <!--	<tr valign="top">
			<th scope="row"><label for="awo_policy_of_confidentiality">Политика конфиденциальности:</label></th>
			<td>
			<textarea name="awo_policy_of_confidentiality" id="awo_policy_of_confidentiality" class="regular-text" rows="3"><?php echo $awo_policy_of_confidentiality; ?></textarea>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_subscribe_form_submit_value">Надпись на кнопке:</label></th>
			<td><input name="awo_subscribe_form_submit_value" type="text" id="awo_subscribe_form_submit_value" 
			value="<?php echo $awo_subscribe_form_submit_value; ?>" class="regular-text"></td>
		</tr>    -->
		
	</tbody>
</table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить"></p>

</form>

</div> <!-- /#center-panel -->
