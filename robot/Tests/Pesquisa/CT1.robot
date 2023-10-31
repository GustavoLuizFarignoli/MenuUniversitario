*** Settings ***
Resource    ../../Steps/Pesquisa/Pesquisa_Steps.robot
*** Test Cases ***
Cenário de Teste 1: Pesquisa com filtro de nome
    Dado que esteja no site de Pesquisa
    Quando eu digito o nome do produto
    E busco os resultados
    E tiro um Screenshot da tela
    Então eu fecho site de Pesquisa