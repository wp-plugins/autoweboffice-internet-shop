<style>
.category_block {
	margin-bottom: 22px;
}
.goods_block {
	margin: 14px 0px 0px 0px;
}
.sub_category_block {
	background-color: #F2F1EF;
	padding: 8px;
	margin: 14px 0px 14px 0px;
	border-radius: 6px;
	
	-webkit-column-count:2;  
    -moz-column-count:2;  
    column-count:2; 
}
.category_title {
	font-size: 1.5em;
	text-decoration: none !important;
}
.category_d {
	height: 1px;
	border-bottom: 1px dashed #ccc;
	margin: 10px 0px 24px 0px;
}

</style>
<?php 
// Если категория не "Без категории" 
if($id_goods_category > 0)
{
	// Выводим название категории
	$html_catalog .= '<a class="category_title" title="Категория: '.$awo_goods_category[0]->goods_category.'">'.$awo_goods_category[0]->goods_category.'</a>';
	
	// А теперь выводим подкатегории этой категории
	
	$awo_goods_sub_category = $wpdb->get_results("SELECT * 
												FROM `".$this->tbl_awo_goods_category."` 
												WHERE deleted=0 
												AND id_goods_category_parent = ".$awo_goods_category[0]->id_goods_category."
												ORDER BY goods_category
												");	
												
	$array_id_goods_category = array();
												
	if(count($awo_goods_sub_category) > 0)
	{
		$html_catalog .= '<div class="sub_category_block">';
		foreach ($awo_goods_sub_category as $goods_sub_category)
		{
			$html_catalog .= "&mdash; <a href='".$this->get_url('id_goods_category', $goods_sub_category->id_goods_category)."'>".$goods_sub_category->goods_category."</a><br>";
			
			$array_id_goods_category[] = $goods_sub_category->id_goods_category;
		}
		$html_catalog .= "</div>";
	}
	
	// Если нет товаров, то пытаемся вытащить новинки из подкатегорий
	if(count($awo_goods) == 0)
	{
		// Если есть подкатегори товаров
		if(count($array_id_goods_category) > 0)
		{
			foreach ($awo_goods_sub_category as $goods_sub_category)
			{
				$array_id_goods_category[] = $goods_sub_category->id_goods_category;
			}
		
			$awo_goods = $wpdb->get_results("SELECT * 
											FROM `".$this->tbl_awo_goods."` 
											WHERE deleted=0 
											AND not_sold=0 
											AND awo_not_show=0
											AND (new_of_sales != 0 OR hit_of_sales !=0 OR special_offer!=0)
											AND id_goods_category IN(".implode(",", $array_id_goods_category).")
											".$where."
											ORDER BY RAND() ASC  
											LIMIT 3");
		}
	}
	
}
else 
{
	// Выводим название категории, если есть еще категории
	if(count($awo_goods_category) > 0 )
	{
		$html_catalog .= '<h2>Без категории</h2>';
	}
	
}

$html_catalog .= '<div align="center" class="goods_block">';

// Для подсчет номера товара
$i = 0;


// Цикл по товарам
foreach ($awo_goods as $key => $goods)
{
	// Если достигнут лимит товаров для одной страницы
	if($awo_catalog_goods_per_page == $i)
	{
		break;
	}
	
	$id_goods = $goods->id_goods;
	

	$goods_name = htmlspecialchars(trim($goods->goods));
			
	$url_page = $goods->url_page;
	$image = $goods->image;
	
	$goods_url = '/?page_id='.get_query_var('page_id').'&paged='.get_query_var('paged').'&id_goods='.$id_goods;
    
    // Блок товара
    $html_catalog .= '<div style="min-width: 150px; margin: 6px 16px 6px 16px; display: inline-block; width: '.$awo_catalog_goods_width.'px;">';
    
    
    // Изображение товара
    if(trim($url_page) != '')
	{
		$html_catalog .= '<div><a href="'.$url_page.'" title="Узнать подробней о '.$goods_name.'">';
	}
    // Если есть данные по изображению товара
	if(trim($image) != '')
	{
		$image_url = 'https://'.$awo_storesId.'.autoweboffice.ru/images/goods/pics/'.$image;
	}
	else
	{
		$image_url = '/wp-content/plugins/autoweboffice-internet-shop/img/cap/goods.png';
	}
	
	$html_catalog .= '<img style="vertical-align: top; max-height: 150px; max-width: 150px;" src="'.$image_url.'" alt="'.$goods_name.'" title="'.$goods_name.'">';
	
    if(trim($url_page) != '')
	{
		$html_catalog .= '</a></div>';
	}
    
    
    
    // Название товара  min-height:40px; padding: 12px 0px 8px 0px;
    $html_catalog .= '<div style="min-height:40px;">';
    if(trim($url_page) != '')
	{
		$html_catalog .= '<a href="'.$url_page.'" title="Узнать подробней о '.$goods_name.'">';
	}
    $html_catalog .= '<b>'.$goods_name.'</b>';
    if(trim($url_page) != '')
	{
		$html_catalog .= '</a>';
	}
    $html_catalog .= '</div>';
    
    
    //Цена товара
    $price = $goods->price;
    $html_catalog .= '<div style="width: 100%; height: 40px; line-height: 40px; overflow: hidden; display: block; border: 1px dashed #d2d0cb; text-align: center; font-size: 17px; border-radius: 5px; margin-bottom: 15px;}">'.$price.'</div>';
    $html_catalog .= '<div align="center" style="padding:0px 0px 20px 0px;"><input style="width: 172px; padding: 5px;" type="submit" class="awo_add_to_cart" id="'.$id_goods.'" value="'.$awo_catalog_settings_submit_value.'" title="'.$goods_name.' - '.$awo_catalog_settings_submit_value.'"></div>';
    
    
    
    $html_catalog .= '</div>';
}


$html_catalog .= '</div>';

$html_catalog .= '<div style="clear:both;"></div>';
?>