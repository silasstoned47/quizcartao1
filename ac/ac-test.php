<?php
// Inclua as bibliotecas necessárias do ActiveCampaign
require_once("includes/ActiveCampaign.class.php");

// Substitua com suas credenciais reais do ActiveCampaign
$apiUrl = 'https://extraduda01.api-us1.com';
$apiKey = '0a2c911ed3e51db9db692d901e80ae304a7419be41e42ccc4ce632f00d605d684dbdf6aa';

$ac = new ActiveCampaign($apiUrl, $apiKey);

// Verifique a conexão com o ActiveCampaign
if (!$ac->credentials_test()) {
    die("Falha na conexão com o ActiveCampaign");
}

  // Recebendo os dados enviados via POST
  $json = file_get_contents('php://input');
  $dados = json_decode($json, true);
  
// Supondo que você tenha definido a variável $phone em algum lugar, se não, você pode definir como ''
$meio = 'api';
$assunto = 'prestamo';
$tag =  'Trigger > Form, Trigger > Form > Prestamo';

// Crie um novo contato no ActiveCampaign
$contact = [
    'email'             => $dados['email'],
    'first_name'        => $dados['firstName'],
    'last_name'         => $dados['lastName'],
    'tags'              => $tag,
    'field[%UTM_SOURCE%,0]'   => $dados['utm_source'],
    'field[%UTM_CAMPAIGN%,0]' => $dados['utm_campaign'],
    'field[%UTM_MEDIUM%,0]'   => $dados['utm_medium'],
    'field[%MEIO%,0]'  =>  $meio,
    //'field[%ASSUNTO%,0]'  =>  $assunto,

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
