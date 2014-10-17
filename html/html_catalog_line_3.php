<?php
$html_catalog .= '<div align="center"><table style="width: 100%;" border=1 cellpadding="5px;">';

// Для подсчет номера товара
$i = 0;


$html_catalog_goods_1 = '';
$html_catalog_goods_2 = '';
$html_catalog_goods_3 = '';

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
	
	
	$html_catalog_goods_1 .= '<td style="padding:5px; width: 205px;">';
	$html_catalog_goods_1 .= '<div align="center">';
	if(trim($url_page) != '')
	{
		$html_catalog_goods_1 .= '<a href="'.$url_page.'" title="Узнать подробней о '.$goods_name.'">';
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
	
	$html_catalog_goods_1 .= '<img style="vertical-align: top; height: 170px; max-width: 170px;" src="'.$image_url.'" alt="'.$goods_name.'" title="'.$goods_name.'">';
	if(trim($url_page) != '')
	{
		$html_catalog_goods_1 .= '</a>';
	}
	$html_catalog_goods_1 .= '</div>';
	$html_catalog_goods_1 .= '</td>';


			
	$goods_name = htmlspecialchars(trim($goods->goods));
	
	$url_page = $goods->url_page;
	
	$goods_url = '/?page_id='.get_query_var('page_id').'&paged='.get_query_var('paged').'&id_goods='.$id_goods;

	$html_catalog_goods_2 .= '<td style="padding:5px; width: 205px;">';
	if(trim($url_page) != '')
	{
		$html_catalog_goods_2 .= '<a href="'.$url_page .'" title="Узнать подробней о '.$goods_name.'">';
	}	
	$html_catalog_goods_2 .= '<b>'.$goods_name.'</b>';
	if(trim($url_page) != '')
	{
		$html_catalog_goods_2 .= '</a>';
	}
	$html_catalog_goods_2 .= '</td>';
		

			
	$price = $goods->price;
	
	$html_catalog_goods_3 .= '<td style="padding:5px; width: 205px;">';
	$html_catalog_goods_3 .= '<div style="width: 100%; height: 40px; line-height: 40px; overflow: hidden; display: block; border: 1px dashed #d2d0cb; text-align: center; font-size: 17px; border-radius: 5px; margin-bottom: 15px;}">'.$price.'</div>';
	$html_catalog_goods_3 .= '<div align="center" style="padding:0px 0px 20px 0px;"><input style="width: 182px; padding: 5px;" type="submit" class="awo_add_to_cart" id="'.$id_goods.'" value="'.$awo_catalog_settings_submit_value.'" title="'.$goods_name.' - '.$awo_catalog_settings_submit_value.'"></div>';
	$html_catalog_goods_3 .= '</td>';
	
	$i++;
	
	// Если есть три товара в строке
	if($i % 3 == 0)
	{
		$html_catalog .= '<tr>';
		$html_catalog .= $html_catalog_goods_1;
		$html_catalog .= '</tr>';
		$html_catalog .= '<tr>';
		$html_catalog .= $html_catalog_goods_2;
		$html_catalog .= '</tr>';
		$html_catalog .= '<tr>';
		$html_catalog .= $html_catalog_goods_3;
		$html_catalog .= '</tr>';
		
		$html_catalog_goods_1 = '';
		$html_catalog_goods_2 = '';
		$html_catalog_goods_3 = '';
	}

}

if(trim($html_catalog_goods_1) != '')
{
	$html_catalog .= '<tr>';
	$html_catalog .= $html_catalog_goods_1;
	$html_catalog .= '</tr>';
	$html_catalog .= '<tr>';
	$html_catalog .= $html_catalog_goods_2;
	$html_catalog .= '</tr>';
	$html_catalog .= '<tr>';
	$html_catalog .= $html_catalog_goods_3;
	$html_catalog .= '</tr>';
}

$html_catalog .= '</table></div>';
?>