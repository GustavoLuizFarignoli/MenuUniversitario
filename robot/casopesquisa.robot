*** Settings ***
Library    SeleniumLibrary

*** Keywords ***
abrir site
    Open Browser     http://localhost/MenuUniversitario/pesquisa.php    gc
    Maximize Browser Window
selecionar bloco
    Select From List By Value    ${filtro_bloco}    2
digitar nome do produto
    Input Text    ${filtro_input_nome}    calzone
buscar
    Click Element    ${button_submit}
selecionar categoria
    Click Element    ${filtro_categoria}    
tirar Screenshot
    Sleep    1s
    Capture Page Screenshot
    Sleep    1s
fechar site
    Close Browser
*** Variables ***
${filtro_input_nome}        id:produto
${filtro_categoria}         //span[text()='Vegetariano']
${filtro_bloco}             //select[@id='blocos']
${button_submit}            //button[@type='submit']
*** Test Cases ***
Cenário de Teste 1: Pesquisa com filtro de nome
    abrir site
    digitar nome do produto
    buscar
    tirar Screenshot
    fechar site
Cenário de Teste 2: Pesquisa com filtro de categoria
    abrir site
    selecionar categoria
    buscar
    tirar Screenshot
    fechar site
Cenário de Teste 3: Pesquisa com filtro de bloco
    abrir site
    selecionar bloco
    buscar
    tirar Screenshot
    fechar site