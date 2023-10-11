*** Settings ***
Resource    ../../Steps/Main_Steps.robot

*** Test Cases ***
Cenário de Teste 1: Login com informação correta
    abrir site de Login
    preencher formulário certo
    enviar dados de Login
    fechar site de Login