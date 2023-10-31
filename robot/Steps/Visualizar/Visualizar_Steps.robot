*** Settings ***
Resource    ../../Resources/Settings.resource
Resource    ../../Elements/Main_Elements.resource

*** Keywords ***
*** Keywords ***
Dado que eu esteja na página Home do site
    Open Browser      ${link_visualizar}    ${Browser}
    Maximize Browser Window
Quando eu entro na página de um bloco
    Click Element    ${Visualizar.button_bloco}
E seleciono um cardápio
    Click Element    ${Visualizar.button_cardapio}
E tiro uma Screenshot do cardápio
    Sleep    1s
    Capture Page Screenshot
Então eu fecho o site de Visualização
    Sleep    1s
    Close Browser