<div class="wrap" id="center-panel">
	<div id="icon-options-general" class="icon32"><br></div>
	
<?php 
// Выводим меню навигации (вкладки)
include_once('internet-shop/navigation.php');


switch ($_GET['action']) 
{
	// Редактирование
	case 'update':
		
		// Если были переданы данные для сохранения
		if($_POST['save'] == true)
		{
			// Убираем лишние слеши
			$awo_description = stripslashes($_POST['awo_description']);
			
			// Составляем массив для обновления данных
			$updateData = array(
						'awo_description' => $awo_description,			
			);
			
			// Обновляем данные по настройкам подключения к API
			$wpdb->update($this->tbl_awo_goods, $updateData, array('id_goods' => (int)$_GET['id']));
		}
		
		// Получаем данные из БД
		$awo_goods = $wpdb->get_row("SELECT * FROM `".$this->tbl_awo_goods."` WHERE deleted=0 AND id_goods= ".(int)$_GET['id']);
		
		// Подключаем страницу с отображением настроек товара 
		include_once('internet-shop/goods/update.php');
		break;
	default:
		// Получаем данные из БД
		$awo_goods = $wpdb->get_results("SELECT * FROM `" . $this->tbl_awo_goods . "` WHERE deleted=0 ORDER BY goods");
		
		// Получаем список товаров 
		include_once('internet-shop/goods/list.php');
}
?>

<?php
// Выводим кнопку Обновить товары только в случае если указаны настройки подключения
if(trim($awo_api_key_get) != '' and $awo_id_stores > 0
	and trim($awo_storesId) != '')
{
?>

<h3 class="title">Журнал обновления данных:</h3> 
<p>Товары (последнее обновление): <?php echo $awo_goods_update_date;?></p>

<form action="admin.php?page=awo-internet-shop&tab=goods" method="POST">
<input type="hidden" name="action" value="goods_update" />
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Обновить товары"></p>
</form>
<?php
}
?>
</div>