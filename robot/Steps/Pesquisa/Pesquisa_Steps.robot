*** Settings ***
Resource    ../../Resources/Settings.resource
Resource    ../../Elements/Main_Elements.resource

*** Keywords ***
abrir site de Pesquisa
    Open Browser     ${link_pesquisa}    ${Browser}
    Maximize Browser Window
selecionar bloco
    Select From List By Value    ${Pesquisa.filtro_bloco}    ${n_bloco}
digitar nome do produto
    Input Text    ${Pesquisa.filtro_input_nome}    ${nome_produto}
buscar
    Click Element    ${Pesquisa.button_submit_pesquisa}
selecionar categoria
    Click Element    ${Pesquisa.filtro_categoria}    
tirar Screenshot
    Sleep    1s
    Capture Page Screenshot
    Sleep    1s
fechar site de Pesquisa
    Close Browser