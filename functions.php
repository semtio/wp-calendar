<?php
// возвращаем Произвольные поля отнятые АЦФом
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

// шорткод для вставки календаря бронирования
function custom_booking_shortcode($atts) {
    $file_path = get_stylesheet_directory() . '/booking-calendar.php';
	 
    // Проверяем существование файла
    if (file_exists($file_path)) {
        // Буферизация вывода
        ob_start();
        include $file_path;
        return ob_get_clean();
    } else {
        return '<p>Файл booking-calendar.php не найден.</p>';
    }
}
add_shortcode('calendar_from_7on', 'custom_booking_shortcode');
// конец

// PHP: обработка данных для отправки календаря записи на экскурсию
function handle_excursion_data() {
    // Проверяем, что запрос пришёл через AJAX
    if (!isset($_POST['action']) || $_POST['action'] !== 'send_excursion_data') {
        wp_send_json_error(['message' => 'Неверный запрос']);
    }

    // Получаем данные из запроса
    $number_of_people = sanitize_text_field($_POST['number_of_people']);
    $excursion_date = sanitize_text_field($_POST['excursion_date']);
    $names = sanitize_text_field($_POST['names']);
    $phone_number = sanitize_text_field($_POST['phone_number']);

    // Сохраняем данные в базу данных
    global $wpdb;
    $table_name = $wpdb->prefix . 'excursions';
    $wpdb->insert(
        $table_name,
        [
            'number_of_people' => $number_of_people,
            'excursion_date' => $excursion_date,
            'names' => $names,
            'phone_number' => $phone_number,
            'created_at' => current_time('mysql'),
        ]
    );

    // Отправляем письмо администратору
    $admin_email = get_option('admin_email'); // Email администратора из настроек WordPress
    $subject = 'Новая заявка на экскурсию';
    $body = "Поступила новая заявка на экскурсию:\n\n" .
            "Кол-во человек: $number_of_people\n" .
            "Дата экскурсии: $excursion_date\n" .
            "Имя(имена): $names\n" .
            "Телефон: $phone_number";
    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    // Используем функцию wp_mail для отправки
    $mail_sent = wp_mail($admin_email, $subject, $body, $headers);

    if ($mail_sent) {
        // Успешный ответ
        wp_send_json_success(['message' => 'Данные успешно отправлены, email отправлен.']);
    } else {
        // Ответ с ошибкой отправки email
        wp_send_json_error(['message' => 'Данные сохранены, но email не отправлен.']);
    }
}
add_action('wp_ajax_send_excursion_data', 'handle_excursion_data');
add_action('wp_ajax_nopriv_send_excursion_data', 'handle_excursion_data'); // Для неавторизованных пользователей
// конец


// Создание таблицы в базе данных для отправки календаря записи на экскурсию
function create_excursions_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'excursions';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        number_of_people tinyint NOT NULL,
        excursion_date varchar(100) NOT NULL,
        names text NOT NULL,
        phone_number varchar(15) NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'create_excursions_table');

add_action('init', 'create_excursions_table'); // Включить при первом тесте. Также перезагрузить тему короче работает как перезагрузка или reset
// конец

// Создание страницы в админке
function add_excursions_admin_page() {
    add_menu_page(
        'Заявки на экскурсии',         // Название страницы
        'Экскурсии',                   // Название меню
        'manage_options',              // Права доступа
        'excursions-admin-page',       // Уникальный slug
        'render_excursions_page',      // Функция для отображения контента
        'dashicons-admin-users',       // Иконка меню
        25                             // Позиция меню
    );
}
add_action('admin_menu', 'add_excursions_admin_page');

// Отображение данных на странице
function render_excursions_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'excursions';

    // Получаем данные из таблицы
    $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");

    ?>
    <div class="wrap">
        <h1>Заявки на экскурсии</h1>
        <table class="widefat fixed" cellspacing="0">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Кол-во человек</th>
                    <th>Дата экскурсии</th>
                    <th>Имя(имена)</th>
                    <th>Телефон</th>
                    <th>Дата отправки</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($results): ?>
                    <?php foreach ($results as $index => $row): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo esc_html($row->number_of_people); ?></td>
                            <td><?php echo esc_html($row->excursion_date); ?></td>
                            <td><?php echo esc_html($row->names); ?></td>
                            <td><?php echo esc_html($row->phone_number); ?></td>
                            <td><?php echo esc_html($row->created_at); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Нет данных для отображения.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}
// конец