document.getElementById('myForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Obter dados do formulÃ¡rio
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;


    // Construir as tags UTM para serem enviadas com o formData
    var urlParams = new URLSearchParams(window.location.search);
    const formData = {
        firstName: name.split(' ')[0],  // Considerando o primeiro nome antes do espaÃ§o
        lastName: name.split(' ')[1] || '',  // Considerando o sobrenome apÃ³s o espaÃ§o, com fallback
        email: email,
        phone: phone,
        utm_source: urlParams.get("utm_source") || '',  // Adicionando UTM source ao formData
        utm_campaign: urlParams.get("utm_campaign") || '',  // Adicionando UTM campaign ao formData
        utm_medium: urlParams.get("utm_medium") || '',  // Adicionando UTM medium ao formData
    };

 



    // Enviar dados para ActiveCampaign
    const xhr1 = new XMLHttpRequest();
    xhr1.open('POST', 'https://quiz1-ivory.vercel.app/ac/ac-br.php', true);
    xhr1.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhr1.onload = function () {
        if (xhr1.status === 200) {
            // Sucesso
            console.log(xhr1.responseText);
        }
    };
    xhr1.send(JSON.stringify(formData));

    // Construir as tags UTM a serem adicionadas na URL de redirecionamento
    var utmForward = [];
    if (urlParams.get("utm_source") != null) utmForward.push('utm_source=' + urlParams.get("utm_source"));
    if (urlParams.get("utm_campaign") != null) utmForward.push('utm_campaign=' + urlParams.get("utm_campaign"));
    if (urlParams.get("utm_medium") != null) utmForward.push('utm_medium=' + urlParams.get("utm_medium"));
    if (urlParams.get("utm_term") != null) utmForward.push('utm_term=' + urlParams.get("utm_term"));
    if (urlParams.get("utm_content") != null) utmForward.push('utm_content=' + urlParams.get("utm_content"));
    utmForward = utmForward.join('&');

   // Array de URLs
var urls = [
    'https://extraduda.com/cartao-de-credito-caixa-tem/?',
    'https://extraduda.com/cartao-de-credito-mercado-pago/?',
    'https://extraduda.com/cartao-de-credito-atacadao/?',
    'https://extraduda.com/cartao-de-credito-xp/?',
    'https://extraduda.com/cartao-do-banco-next/?',
    'https://extraduda.com/cartao-de-credito-picpay/?',
    'https://extraduda.com/cartao-de-credito-bradesco-classico-internacional/?',
    'https://extraduda.com/cartao-de-credito-bmg/?'

];

// Escolher uma URL aleatÃ³ria do array
var randomIndex = Math.floor(Math.random() * urls.length);
var randomUrl = urls[randomIndex];

// Redirecionar para a URL escolhida com tags UTM
//window.location.href = randomUrl + utmForward;

});