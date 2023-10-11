*** Settings ***
Resource    ../../Steps/Cadastro/Cadastro_Steps.robot

*** Test Cases ***
Cenário de Teste 1: Cadastro com dados novos
    abrir site de Cadastro
    preencher formulário com informação nova
    enviar dados de Cadastro
    fechar site de Cadastro