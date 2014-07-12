<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class AWO_Widget_Text extends WP_Widget {

	/*
	 * Конструктор класса виджета
	 */
	function AWO_Widget_Text() 
	{
		$widget_ops = array(
			'classname' => 'AWO_Widget_Text', // Класс который будет присваиваться виджету
			'description' => 'Отображения шоткодов интернет магазина' // Описание виджета в админпанели на странице Виджеты
		);
		 
		// ID виджета и его название 
		$this->WP_Widget('AWO_Widget_Text', 'AWO - Текст', $widget_ops);
		$this->alt_option_name = 'AWO_Widget_Text';

		/* Также для виджета используем кэширование. 
		В моем примере это не так необходимо, но если у вас происходят 
		какие-то вычисления в нем или сложные запросы в БД, 
		то вам лучше использовать кэширование*/
		add_action('save_post', array(&$this, 'flush_widget_cache'));
		add_action('deleted_post', array(&$this, 'flush_widget_cache'));
		add_action('switch_theme', array(&$this, 'flush_widget_cache'));
	}

	/**
     * Вызывается когда происходит отрисовка виджета уже на клиенсткой части.
	 * Выводит HTML для этого виджета.
     *
     * @param array An array of standard parameters for widgets in this theme
     * @param array An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget($args, $instance)
    {
        global $wpdb;

        $cache = wp_cache_get('AWO_Widget_Text', 'widget');

        if (!is_array($cache))
		{
            $cache = array();
		}

        if (!isset($args['widget_id']))
		{
            $args['widget_id'] = null;
		}

        if (isset($cache[$args['widget_id']])) 
		{
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract( $args, EXTR_SKIP );

        $form_name = apply_filters( 'widget_title', $instance['form_name'], $instance, $this->id_base);

        echo $before_widget;
        echo $before_title;
        echo $form_name; // Выводим заголовок виджета
        echo $after_title;

		echo '<div class="textwidget">';
		
		echo $instance['introductory_text'];
		
		echo '</div>';
        echo $after_widget;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('AWO_Widget_Text', $cache, 'widget');
    }

	/*
	 * Вызывается когда мы сохраняем данные в админпанели.
	 * $new_instance - новые данные
	 * $old_instance - старые данные
	 */
    function update($new_instance, $old_instance) 
	{
        $instance = $old_instance;
		
		// Сохраняем введенные данные
        $instance['form_name']  = strip_tags($new_instance['form_name']); // Заголовок формы
		$instance['introductory_text']  = $new_instance['introductory_text']; // Вступительный текст

        $this->flush_widget_cache();

        $alloptions = wp_cache_get('alloptions', 'options');
		
        if (isset($alloptions['AWO_Widget_Text']))
		{
            delete_option('AWO_Widget_Text');
		}

        return $instance;
    }

    function flush_widget_cache() 
	{
        wp_cache_delete('AWO_Widget_Text', 'widget');
    }

    /**
	 * Вызывается когда мы в админпанели добавляем виджет. Он служит для редактирования данных которые мы будем показывать пользователям.
     * Отображает форму для этот виджет на панели Виджетов на странице WP-Admin area.
     **/
    function form($instance) 
	{
		// Первичное заполнение данных
		$form_name = $instance['form_name'];
		$introductory_text = $instance['introductory_text'];
		?>
	
	<p>
        <label for="<?php echo esc_attr($this->get_field_id('form_name')); ?>"><?php echo 'Заголовок:'; ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('form_name')); ?>" name="<?php echo esc_attr($this->get_field_name('form_name')); ?>" type="text" value="<?php echo esc_attr($form_name); ?>" />
    </p>
	
	<p> 
		<textarea class="widefat" rows="10" cols="20" id="<?php echo esc_attr($this->get_field_id('introductory_text')); ?>" name="<?php echo esc_attr($this->get_field_name('introductory_text')); ?>"><?php echo esc_attr($introductory_text); ?></textarea>
	</p>

    <?php
    }
}

register_widget('AWO_Widget_Text');