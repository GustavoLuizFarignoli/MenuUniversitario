*** Settings ***
Resource    ../../Resources/Settings.resource
Resource    ../../Elements/Main_Elements.resource

*** Keywords ***
*** Keywords ***
abrir site na página Home
    Open Browser      ${link_visualizar}    ${Browser}
    Maximize Browser Window
entrar na página de um bloco
    Click Element    ${Visualizar.button_bloco}
selecionar cardápio
    Click Element    ${Visualizar.button_cardapio}
fechar site de Visualização
    Sleep    1s
    Close Browser
tirar Screenshot2
    Sleep    1s
    Capture Page Screenshot