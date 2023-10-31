*** Settings ***
Resource    ../../Steps/Cadastro/Cadastro_Steps.robot

*** Test Cases ***
Cenário de Teste 2: Cadastro com dados novos
    Dado que eu esteja no site de Cadastro
    Quando eu preencho o formulário com uma informação nova
    E envio os dados de Cadastro
    E espero um alerta de cadastro realizado
    Então fecho site de Cadastro