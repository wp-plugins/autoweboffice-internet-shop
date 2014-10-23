<?php 
$html_catalog .= '<div align="center">';

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
		$image_url = 'https://'.$awo_storesId.'.autokassir.ru/images/goods/pics/'.$image;
	}
	else
	{
		$image_url = '/wp-content/plugins/autoweboffice-internet-shop/img/cap/goods.png';
	}
	
	$html_catalog .= '<img style="vertical-align: top; height: 150px; max-width: 150px;" src="'.$image_url.'" alt="'.$goods_name.'" title="'.$goods_name.'">';
	
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