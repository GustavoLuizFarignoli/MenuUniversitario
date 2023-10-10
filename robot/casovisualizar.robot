*** Settings ***
Library    SeleniumLibrary

*** Keywords ***
abrir site
    Open Browser     http://localhost/MenuUniversitario/index.php    gc
    Maximize Browser Window
entrar na página de um bloco
    Click Element    ${button_bloco}
selecionar cardápio
    Click Element    ${button_cardapio}
fechar site
    Sleep    1s
    Close Browser
tirar Screenshot2
    Sleep    1s
    Capture Page Screenshot
*** Variables ***
${button_bloco}        (//li[@class='nav-link'])[4]
${button_cardapio}     (//button[text()='Consultar cardápio'])[1]
*** Test Cases ***
Cenário de Teste 1: Visualizar cardápio
    abrir site
    entrar na página de um bloco
    tirar Screenshot2
    selecionar cardápio
    tirar Screenshot2
    fechar site
    
    