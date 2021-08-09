<?php
require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/../helpers.php');

const STATUS_COMPLETED = 142;


function getClients() {
    return [
        [
            'id' => 1,
            'name' => 'intrdev',
            'api' => '23bc075b710da43f0ffb50ff9e889aed'
        ],
        [
            'id' => 2,
            'name' => 'artedegrass0',
            'api' => '42069abcdef42069fedcda1122334455',
        ],
    ];
}


if($_SERVER['REQUEST_METHOD'] == "GET") {
    $dateFrom = intval($_GET['datefrom'] ?? 0);
    $dateTo = intval($_GET['dateto'] ?? 0);

    $apiClient = new Introvert\ApiClient();
    $response = [];
    foreach (getClients() as $client) {   
        Introvert\Configuration::getDefaultConfiguration()->setApiKey('key', $client['api']);

        try {
            $account = $apiClient->account->info()['result'];
            $totalPrice = 0;
            $offset = 0;
            $leads;
            do {
                $leads = $apiClient->lead->getAll(null, STATUS_COMPLETED, null, null, 250, $offset);

                foreach($leads['result'] as $lead) {
                    $dateClose = intval($lead['date_close']);
                    if(($dateFrom == 0 || $dateFrom <= $dateClose) && ($dateTo == 0 || $dateClose <= $dateTo)) {
                        //Если какая-то из дат равна нулю, не учитываем её
                        $totalPrice += $lead['price'];
                    }
                }

                if($leads['count'] < 250) {
                    break;
                }

                $offset += 250;
            } while (true);

            $response[] = [$account['id'], $account['name'], $totalPrice];
        } catch (\Throwable $th) {
            $response[] = ['-', 'Ошибка: '.$th->getMessage(), 0];
        }  
    }
    
    $table = '<table rules=all frame=border cellpadding=5>';
    $table .= '<tr><td>id клиента</td><td>Имя клиента</td><td>Бюджет всех закрытых сделок</td></tr>';
    foreach ($response as $value) {
        $table .= "<tr><td>$value[0]</td><td>$value[1]</td><td>$value[2]</td></tr>";
    }
    $table .= '</table>';
    respond($table);
} else {
    error(405, 'Не поддерживается');
}



