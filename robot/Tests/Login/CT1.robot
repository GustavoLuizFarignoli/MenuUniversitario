*** Settings ***
Resource    ../../Steps/Main_Steps.robot

*** Test Cases ***
Cenário de Teste 1: Login com informação correta
    Dado que eu esteja no site de Login
    Quando eu preencho o formulário com informações corretas
    E envio os dados de Login
    E espero um alerta de login realizado
    Então fecho o site de Login