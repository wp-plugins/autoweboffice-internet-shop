<h3>Редактировать товар: <?php echo $awo_goods->goods;?></h3>

<form action="admin.php?page=awo-internet-shop&tab=goods&action=update&id=<?php echo $awo_goods->id_goods;?>" method="POST">
<table class="form-table">
	<tbody>
		
		<!--
		<tr valign="top">
			<th scope="row"><label for="awo_description">Страница описания:</label></th>
			<td colspan="2">
				<?php
					wp_editor($awo_goods->awo_description, 'awo_description');
				?>
			</td>
		</tr>
		-->
		
		<tr valign="top">
			<th scope="row"><label for="awo_not_show">Шоткод «Добавить в корзину»:</label></th>
			<td><b><?php echo '[awo_link_to_order id_goods="'.$awo_goods->id_goods.'"]';?></b></td>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_not_show">Шоткод «Заказать прямо сейчас»:</label></th>
			<td><b><?php echo '[awo_link_to_single_order id_goods="'.$awo_goods->id_goods.'"]';?></b></td>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="awo_not_show">Не показывать в каталоге:</label></th>
			<td><input id="awo_not_show" type="checkbox" name="awo_not_show" value="1"
						<?php
						if ($awo_goods->awo_not_show == '1')
								echo ' checked="checked"'
						?> />
			</td>
			</td>
		</tr>

	</tbody>
</table>
<input type="hidden" name="save" value="true" />
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Обновить"></p>

</form>
