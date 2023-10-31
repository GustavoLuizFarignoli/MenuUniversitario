*** Settings ***
Resource    ../../Steps/Pesquisa/Pesquisa_Steps.robot
*** Test Cases ***
Cenário de Teste 2: Pesquisa com filtro de categoria
    Dado que esteja no site de Pesquisa
    Quando eu seleciono uma categoria
    E busco os resultados
    E tiro um Screenshot da tela
    Então eu fecho site de Pesquisa