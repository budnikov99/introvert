<?php
require_once(__DIR__ . '/autoload.php');

// Configure API key authorization: api_key
Introvert\Configuration::getDefaultConfiguration()->setApiKey('key', '23bc075b710da43f0ffb50ff9e889aed');

$api = new Introvert\ApiClient();

try {
    $contactId = 0;

    // можно создать объект и передать в него массив параметров
    $newContact = new \Introvert\Model\Contact([
        'name' => 'Name',
        'phone' => '1234567890',
        'crm_user_id' => '1234567890',
        'custom_fields' => [
            '123456' => 'value'
        ]
    ]);
    $data = $api->contact->create($newContact);
    print_r($data);

    // можно задавать параметры для объекта по отдельности
    $newContact = new \Introvert\Model\Contact();
    $newContact->setName('Name2');
    $newContact->setPhone('12345678902');
    $newContact->setCrmUserId('12345678902');
    $newContact->setCustomFields([
        '123456' => 'value2'
    ]);
    $data = $api->contact->create($newContact);
    print_r($data);

    // можно просто передать массив
    $newContact = [
        'name' => 'VOSEM VOSEMSOT PYAT PYAT PYAT TRI PYAT TRI PYAT',
        'phone' => '78005553535',
        'crm_user_id' => '42069',
        'custom_fields' => [
            'bistro' => 'dengi'
        ]
    ];
    $data = $api->contact->create($newContact);
    print_r($data);

} catch (Exception $e) {
    echo 'Exception when calling api method ', $e->getMessage(), PHP_EOL;
}
