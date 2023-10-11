*** Settings ***
Resource    ../../Steps/Visualizar/Visualizar_Steps.robot
*** Test Cases ***
Cenário de Teste 1: Visualizar cardápio
    abrir site na página Home
    entrar na página de um bloco
    tirar Screenshot2
    selecionar cardápio
    tirar Screenshot2
    fechar site de Visualização