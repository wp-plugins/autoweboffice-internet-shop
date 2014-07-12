<div class="wrap" id="center-panel">
	<div id="icon-options-general" class="icon32"><br></div>
	
<?php 
// Выводим меню навигации (вкладки)
include_once('navigation.php');


switch ($_GET['action']) 
{
	// Редактирование
	case 'update':
		
		// Если были переданы данные для сохранения
		if($_POST['save'] == true)
		{
			// Убираем лишние слеши
			$awo_description = stripslashes($_POST['awo_description']);
			$awo_not_show = (int)$_POST['awo_not_show'];
			
			// Составляем массив для обновления данных
			$updateData = array(
						// 'awo_description' => $awo_description,	
						'awo_not_show' => $awo_not_show,
			);
			
			// Обновляем данные по настройкам подключения к API
			$wpdb->update($this->tbl_awo_goods, $updateData, array('id_goods' => (int)$_GET['id']));
		}
		
		// Получаем данные из БД
		$awo_goods = $wpdb->get_row("SELECT * FROM `".$this->tbl_awo_goods."` WHERE deleted=0 AND id_goods= ".(int)$_GET['id']);
		
		// Подключаем страницу с отображением настроек товара 
		include_once('goods/update.php');
		break;
	default:
	
		// Вычисляем номер первого товара
		$paged = $_GET['paged'];
		
		$limit_start = 0;
		
		// Количество товаров на странице
		$awo_admin_goods_per_page = '20';
		
		// Если номер страницы больше 0 и нет критерий поиска
		if($paged > 0 AND $_POST['awo_search'] != true)
		{
			$limit_start = ($paged - 1) * $awo_admin_goods_per_page;
		}
	
		$where = '';
	
		if($_POST['awo_search'] == true)
		{
			// Для составления условий поиска
			
			$awo_search_goods = trim($_POST['awo_search_goods']);
			
			// Если переданы критерии поиска по товарам
			if($awo_search_goods != '')
			{
				$where .= " AND `goods` LIKE '%".$awo_search_goods."%'";
			}
		}
	
		// Получаем данные из БД
		$awo_goods = $wpdb->get_results("SELECT * 
										FROM `" . $this->tbl_awo_goods . "` 
										WHERE deleted=0 ".$where." 
										ORDER BY goods 
										LIMIT ".$limit_start." , ".$awo_admin_goods_per_page."");
										
		// Получаем данные по количеству товаров
		$awo_goods_count = $wpdb->get_results("SELECT COUNT(*) AS goods_count FROM `".$this->tbl_awo_goods."` WHERE deleted=0 ".$where."");
		$goods_count = $awo_goods_count['0']->goods_count;	
		
		// Вычисляем максимальное количество страниц
		$total_pages = ceil($goods_count/$awo_admin_goods_per_page);
		
		// Получаем список товаров 
		include_once('goods/list.php');
}
?>
</div>