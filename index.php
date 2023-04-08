<?php
//https://raw.githubusercontent.com/OpenBanking-Brasil/draft-openapi/main/swagger-apis/credit-cards/2.0.1.yml
function makeHttpRequest($url, $method = 'GET', $body = null) {
    $options = array(
        'http' => array(
            'method' => $method,
            'header' => 'Content-Type: application/json;charset=UTF-8'
        )
    );
    
    if ($body !== null) {
        $options['http']['content'] = json_encode($body);
    }
    
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return json_decode($result, true);
}

// Função para obter as informações de todas as contas de cartão de crédito
function getCreditCardAccounts() {
    $url = 'http://localhost:8080/open-banking/credit-cards-accounts/v2/accounts';
    return makeHttpRequest($url);
}
// Função para obter as informações de uma conta de cartão de crédito específica
function getCreditCardAccount($creditCardAccountId) {
  $url = 'http://localhost:8080/open-banking/credit-cards-accounts/v2/accounts/' . $creditCardAccountId;
  return makeHttpRequest($url);
}

// Função para obter as faturas de uma conta de cartão de crédito específica
function getCreditCardBills($creditCardAccountId) {
  $url = 'http://localhost:8080/open-banking/credit-cards-accounts/v2/accounts/' . $creditCardAccountId . '/bills';
  return makeHttpRequest($url);
}

// Função para obter as transações de uma fatura de uma conta de cartão de crédito específica
function getCreditCardBillTransactions($creditCardAccountId, $billId) {
  $url = 'http://localhost:8080/open-banking/credit-cards-accounts/v2/accounts/' . $creditCardAccountId . '/bills/' . $billId . '/transactions';
  return makeHttpRequest($url);
}

// Função para obter os limites de uma conta de cartão de crédito específica
function getCreditCardLimits($creditCardAccountId) {
  $url = 'http://localhost:8080/open-banking/credit-cards-accounts/v2/accounts/' . $creditCardAccountId . '/limits';
  return makeHttpRequest($url);
}

// Função para obter as transações de uma conta de cartão de crédito específica
function getCreditCardTransactions($creditCardAccountId) {
  $url = 'http://localhost:8080/open-banking/credit-cards-accounts/v2/accounts/' . $creditCardAccountId . '/transactions';
  return makeHttpRequest($url);
}

// Função para obter as transações atuais de uma conta de cartão de crédito específica
function getCurrentCreditCardTransactions($creditCardAccountId) {
  $url = 'http://localhost:8080/open-banking/credit-cards-accounts/v2/accounts/' . $creditCardAccountId . '/transactions-current';
  return makeHttpRequest($url);
}

$accounts = getCreditCardLimits("XXZTR3459087");
echo "Contas de cartão de crédito:<br>";
foreach ($accounts['data'] as $account) {
    echo "Limite total: " . utf8_encode($account['limitAmount']['amount']) . "<br>";
    echo "Limite Disp.: " . utf8_encode($account['availableAmount']['amount']) . "<br>";
    echo "<br>";
    
}