*** Settings ***
Resource    ../../Steps/Pesquisa/Pesquisa_Steps.robot
*** Test Cases ***
Cenário de Teste 3: Pesquisa com filtro de bloco
    Dado que esteja no site de Pesquisa
    Quando eu seleciono o bloco
    E busco os resultados
    E tiro um Screenshot da tela
    Então eu fecho site de Pesquisa