*** Settings ***
Resource    ../../Steps/Pesquisa/Pesquisa_Steps.robot
*** Test Cases ***
Cenário de Teste 3: Pesquisa com filtro de bloco
    abrir site de Pesquisa
    selecionar bloco
    buscar
    tirar Screenshot
    fechar site de Pesquisa