*** Settings ***
Resource    ../../Steps/Pesquisa/Pesquisa_Steps.robot
*** Test Cases ***
Cenário de Teste 1: Pesquisa com filtro de nome
    abrir site de Pesquisa
    digitar nome do produto
    buscar
    tirar Screenshot
    fechar site de Pesquisa