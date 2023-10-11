*** Settings ***
Resource    ../../Steps/Login/Login_Steps.robot


*** Test Cases ***
Cenário de Teste 2: Login com informação errada
    abrir site de Login
    preencher formulário errado
    enviar dados de Login
    fechar site de Login