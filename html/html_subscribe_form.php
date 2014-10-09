<?php
$html_subscribe_form .= '<form action="https://'.$awo_storesId.'.autokassir.ru/?r=personal/newsletter/subscriptions/add&amp;id='.$awo_id_stores.'&amp;lg=ru" method="post" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8">';

$html_subscribe_form .= '<input type="hidden" value="'.$awo_id_newsletter.'" name="Contact[id_newsletter]">';
$html_subscribe_form .= '<input type="hidden" value="'.$awo_id_advertising_channel_page.'" name="Contact[id_advertising_channel_page]">';

if($last_name)
{
	$html_subscribe_form .= ' 
	<div>
		<label>Фамилия <span class="required">*</span></label>    
		<br />			
		<input class="widefat" maxlength="255" name="Contact[last_name]" id="last_name" type="text">     	   
	</div>';
}

if($name)
{
	$html_subscribe_form .= '
	<div>
		<label>Имя <span class="required">*</span></label> 
		<br />   	
		<input maxlength="255" name="Contact[name]" type="text">     	  
	</div>';
}

if($middle_name)
{
	$html_subscribe_form .= '
	<div>
		<label>Отчество <span class="required">*</span></label> 
		<br />   	
		<input maxlength="255" name="Contact[middle_name]" type="text">     	   
	</div>';
}

if($email)
{
	$html_subscribe_form .= '<div>
		<label>E-mail <span class="required">*</span></label> 
		<br />   	
		<input maxlength="255" name="Contact[email]" type="text">     	    
	</div>';
}

if($phone_number)
{
	$html_subscribe_form .= '<div>
		<label>Телефон <span class="required">*</span></label>
		<div style="font-size: 90%;"><i>Только цифры, без пробелов!</i></div>  	
		<input maxlength="255" name="Contact[phone_number]" type="text">     	 
	</div>';
}

$html_subscribe_form .= '<div>'.$policy_of_confidentiality.'</div>';

$html_subscribe_form .= '<div>
	<input type="submit" value="'.$subscribe_form_submit_value.'">
</div>';

$html_subscribe_form .= '</form>';
?>