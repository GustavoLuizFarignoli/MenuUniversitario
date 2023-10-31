*** Settings ***
Resource    ../../Resources/Settings.resource
Resource    ../../Elements/Main_Elements.resource

*** Keywords ***
Dado que esteja no site de Pesquisa
    Open Browser     ${link_pesquisa}    ${Browser}
    Maximize Browser Window
Quando eu seleciono o bloco
    Select From List By Value    ${Pesquisa.filtro_bloco}    ${n_bloco}
Quando eu digito o nome do produto
    Input Text    ${Pesquisa.filtro_input_nome}    ${nome_produto}
E busco os resultados
    Click Element    ${Pesquisa.button_submit_pesquisa}
Quando eu seleciono uma categoria
    Click Element    ${Pesquisa.filtro_categoria}    
E tiro um Screenshot da tela
    Sleep    1s
    Capture Page Screenshot
    Sleep    1s
Então eu fecho site de Pesquisa
    Close Browser