<h3>Редактировать товар: <?php echo $awo_goods->goods;?></h3>

<form action="admin.php?page=awo-internet-shop&tab=goods&action=update&id=<?php echo $awo_goods->id_goods;?>" method="POST">
<table class="form-table">
	<tbody>
		
		<tr valign="top">
			<th scope="row"><label for="awo_description">Страница описания:</label></th>
			<td colspan="2">
				<?php
					wp_editor($awo_goods->awo_description, 'awo_description');
				?>
			</td>
		</tr>

	</tbody>
</table>
<input type="hidden" name="save" value="true" />
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Обновить"></p>

</form>

