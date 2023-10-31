*** Settings ***
Resource    ../../Steps/Visualizar/Visualizar_Steps.robot
*** Test Cases ***
Cenário de Teste 1: Visualizar cardápio
    Dado que eu esteja na página Home do site
    Quando eu entro na página de um bloco
    E seleciono um cardápio
    E tiro uma Screenshot do cardápio
    Então eu fecho o site de Visualização