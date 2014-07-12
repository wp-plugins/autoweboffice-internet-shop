<br />
	 <table class="widefat">
	 
	  <thead>
	    <tr class="table-header">
		 
		 <th>Товар</th>
		 <th>Шоткод «Добавить в корзину»</th>
		 <th>Шоткод «Заказать прямо сейчас»</th>
		 <th>Цена</th>
		 <th>Снят с продажи</th>
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

			<!--
			 <td>  
			   <div><b><a style="text-decoration: none;" href="admin.php?page=awo-internet-shop&tab=goods&action=update&id=<?php echo $goods->id_goods; ?>" 
				title="Редактировать товар: <?php echo $goods->goods;?>"><?php echo $goods->goods;?></b></a></div>
			 </td>
			-->
			
			<td>  
			   <div><b><?php echo $goods->goods;?></b></div>
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
					echo 'Да';
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
			 <td colspan="7" style="text-align:center">Списо товаров пуст.</td>
			</tr>
			<?php
		}
		?>
	   
	  </tbody>

	 </table> 


