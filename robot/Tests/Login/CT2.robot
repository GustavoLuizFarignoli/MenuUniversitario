*** Settings ***
Resource    ../../Steps/Login/Login_Steps.robot


*** Test Cases ***
Cenário de Teste 2: Login com informação errada
    Dado que eu esteja no site de Login
    Quando eu preencho o formulário com informações erradas
    E envio os dados de Login
    E espero um alerta de login realizado
    Então fecho o site de Login