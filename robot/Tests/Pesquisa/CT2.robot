*** Settings ***
Resource    ../../Steps/Pesquisa/Pesquisa_Steps.robot
*** Test Cases ***
Cenário de Teste 2: Pesquisa com filtro de categoria
    abrir site de Pesquisa
    selecionar categoria
    buscar
    tirar Screenshot
    fechar site de Pesquisa