<?php
// Inclua as bibliotecas necessárias do ActiveCampaign
require_once("includes/ActiveCampaign.class.php");

// Substitua com suas credenciais reais do ActiveCampaign
$apiUrl = 'https://ihomeworkhelp.api-us1.com';
$apiKey = 'bc329f4228dcb0fbbae89d26f33a0cd992ff1562e89f6b4b29383f65a0223044782daf608';

$ac = new ActiveCampaign($apiUrl, $apiKey);

// Verifique a conexão com o ActiveCampaign
if (!$ac->credentials_test()) {
    die("Falha na conexão com o ActiveCampaign");
}

// Crie um novo contato no ActiveCampaign
$contact = [
    'email'             => $dados['email'],
    'first_name'        => $dados['firstName'],
    'last_name'         => $dados['lastName'],
    'phone'             => $phone,
    'tags'              => 'Trigger > Form, Trigger > Form > Prestamo',
    //'p[123]'            => 1, // Substitua pelo ID real da sua lista
    // Adicione campos personalizados se necessário
    'field[%UTM_SOURCE%,0]'   => $dados['utm_source'],
    'field[%UTM_CAMPAIGN%,0]' => $dados['utm_campaign'],
    'field[%UTM_MEDIUM%,0]'   => $dados['utm_medium'],
];

$contact_sync = $ac->api("contact/sync", $contact);

if (!(int)$contact_sync->success) {
    // Tratar erro ao criar o contato
    echo "Erro ao sincronizar contato: " . $contact_sync->error;
} else {
    // Contato criado com sucesso
    echo "Contato sincronizado com sucesso!";
}
?>
