*** Settings ***
Resource    ../../Steps/Cadastro/Cadastro_Steps.robot

*** Test Cases ***
Cenário de Teste 1: Cadastro com login já existente
    Dado que eu esteja no site de Cadastro
    Quando eu preencho o formulário com uma informação prévia
    E envio os dados de Cadastro
    E espero um alerta de cadastro realizado
    Então fecho site de Cadastro