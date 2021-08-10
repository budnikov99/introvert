<?php
require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/../helpers.php');

const MAX_BOOKING_DAYS = 30;

/** 
 * Возвращает массив в формате ['2021-12-31' => <число записей на этот день>, ...]
 * 
 * @param $api - клиент api
 * @param $field - id поля, содержащего дату записи
 * @param $statuses - массив статусов сделок для проверки
 * @param $today - дата, считающаяся сегодняшней
*/
function getBookingDatesCount(Introvert\ApiClient $api, int $bookField, array $statuses, DateTime $today) {
    $checkFrom = $today->getTimestamp() - (MAX_BOOKING_DAYS * 24 * 3600);
    $offset = 0;
    $bookings = [];
    do {
        $leads = $api->lead->getAll(null, $statuses, null, null, 250, $offset);

        foreach ($leads['result'] as $lead) {
            if($lead['last_modified'] >= $checkFrom) {
                foreach ($lead['custom_fields'] as $field) {
                    if($field['id'] == $bookField && !empty($field['values'])) {
                        $date = new DateTime($field['values'][0]['value']);
                        if($date >= $today){
                            $date = $date->format('Y-m-d');
                            $curr = $bookings[$date] ?? 0;
                            $bookings[$date] = $curr + 1;
                        }
                        break;
                    }
                }
            }
        }

        if($leads['count'] < 250) {
            break;
        }
    } while (true);

    return $bookings;
}


if($_SERVER['REQUEST_METHOD'] == "GET") {
    $key = $_GET['key'] ?? null;
    $statuses = $_GET['statuses'] ?? null;
    $bookField = $_GET['bookfield'] ?? null;


    if(!$key || !$statuses || !$bookField){
        error(400, 'Переданы неверные данные');
    }

    if(!is_array($statuses)){
        $statuses = [$statuses];
    }

    //Получение "сегодняшней" даты из запроса для целей тестирования
    $today = new DateTime($_GET['today'] ?? 'now');

    //Удаляем время из даты
    $today = new DateTime($today->format('Y-m-d'));

    Introvert\Configuration::getDefaultConfiguration()->setApiKey('key', $key);

    $api = new Introvert\ApiClient();

    $result = getBookingDatesCount($api, $bookField, $statuses, $today);
    respondJson($result);

    try {
        $account = $api->account->info();
    } catch (\Throwable $th) {
        error(403, $th->getMessage());
    }
    
} else {
    error(405, 'Не поддерживается');
}