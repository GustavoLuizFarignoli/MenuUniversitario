*** Settings ***
Library    SeleniumLibrary

*** Keywords ***
abrir site
    Open Browser     http://localhost/MenuUniversitario/login.php    gc
    Maximize Browser Window
preencher formulário certo
    Input Text    ${email_login}    well@gmail.com
    Input Text    ${senha_login}    A1s2d3f4 
enviar dados
    Click Button    ${button_submit}
fechar site
    Alert Should Be Present
    Sleep    2s
    Capture Page Screenshot
    Sleep    1s
    Close Browser
preencher formulário errado
    Input Text    ${email_login}    well5@gmail.com
    Input Text    ${senha_login}    A1s2d3f4. 
*** Variables ***
${senha_login}        id:password
${email_login}        id:email
${button_submit}    //button[@type='submit']
*** Test Cases ***
Cenário de Teste 1: Login com informação correta
    abrir site
    preencher formulário certo
    enviar dados
    fechar site
Cenário de Teste 2: Login com informação errada
    abrir site
    preencher formulário errado
    enviar dados
    fechar site
    
    