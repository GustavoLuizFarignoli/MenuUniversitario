*** Settings ***
Resource    ../../Steps/Cadastro/Cadastro_Steps.robot

*** Test Cases ***
Cenário de Teste 1: Cadastro com login já existente
    abrir site de Cadastro
    preencher formulário com informação prévia
    enviar dados de Cadastro
    fechar site de Cadastro