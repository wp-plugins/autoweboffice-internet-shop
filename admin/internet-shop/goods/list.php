<br />
<form action="admin.php?page=awo-internet-shop" method="POST">
<input type="hidden" value="true" name="awo_search">
	<table class="widefat">
		<tr>
			<td style="width: 100%;"><input type="text" id="awo_search_goods" name="awo_search_goods" value="Поиск по всем товарам" onfocus="if(this.value == 'Поиск по всем товарам'){this.value=''; this.style.color = 'black'}" onblur="if(this.value == ''){this.value='Поиск по всем товарам'; this.style.color = '#999999'}" style="color: rgb(153, 153, 153); width: 100%;"></td>
			<td style="width: 100px;"><input type="submit" name="submit" id="submit" class="button button-primary" value="Поиск"></td>
		</tr>
	</table>
</form>
	
	<br />
	
	<table class="widefat">
	 
		<thead>
	    <tr class="table-header">
			<th>Товар</th>
			<th>Страница описания</th>
			<th>Шоткод «Добавить в корзину»</th>
			<th>Шоткод «Заказать прямо сейчас»</th>
			<th>Цена</th>
			<th>Снят с продажи</th>
			<th>Не показывать</th>
		</tr>
		</thead>
	  
	  <tbody>
		<?php 
		if($awo_goods)
		{
		
			foreach ($awo_goods as $key => $goods)
			{
			?>
			<tr>

			<td>  
				<div><b><a style="text-decoration: none;" href="admin.php?page=awo-internet-shop&tab=goods&action=update&id=<?php echo $goods->id_goods; ?>" 
				title="Редактировать товар: <?php echo $goods->goods;?>"><?php echo $goods->goods;?></b></a></div>
			</td>
			
			<td>  
				<div><a href="<?php echo $goods->url_page;?>" target="_blank"><?php echo $goods->url_page;?></a></div>
			</td>
			 
			<td>  
				<div><b><?php echo '[awo_link_to_order id_goods="'.$goods->id_goods.'"]';?></b></div>
			</td>

			<td>  
				<div><b><?php echo '[awo_link_to_single_order id_goods="'.$goods->id_goods.'"]';?></b></div>
			</td>

			<td>
				<div><?php echo number_format($goods->price, 2, ',', ' '); ?></div>
			</td>

			<td>
				<div>
				<?php
				if($goods->not_sold > 0)
				{
					echo '<span style="color: red">Да</span>';
				}
				else
				{
					echo 'Нет';
				}
				?>
				</div>
			</td>
			
			<td>
				<div>
				<?php
				if($goods->awo_not_show > 0)
				{
					echo '<span style="color: red">Да</span>';
				}
				else
				{
					echo 'Нет';
				}
				?>
				</div>
			</td>

			</tr>
			<?php 
			}
		}
		else
		{
			?>
			<tr>
				<td colspan="8" style="text-align:center">Списо товаров пуст.</td>
			</tr>
			<?php
		}
		?>
		
		<tr>
			<td colspan="8" style="text-align:right">
		<?php
			echo $this->get_paginate_links($total_pages);
		?>
			</td>
		</tr>
	   
	  </tbody>

	</table> 

	
<?php
// Выводим кнопку Обновить товары только в случае если указаны настройки подключения
if(trim($awo_api_key_get) != '' and $awo_id_stores > 0
	and trim($awo_storesId) != '')
{
?>

<h3 class="title">Журнал обновления данных:</h3> 
<p>Товары (последнее обновление): <?php echo $awo_goods_update_date;?></p>

<form style="float: left;" action="admin.php?page=awo-internet-shop&tab=goods" method="POST">
<input type="hidden" name="action" value="goods_update" />
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Обновить товары"></p>
</form>

<form style="float: right;" action="admin.php?page=awo-internet-shop&tab=goods" method="POST">
<input type="hidden" name="action" value="goods_truncate" />
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Очистить таблицу с товарами"></p>
</form>
<?php
}
?>

