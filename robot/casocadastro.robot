*** Settings ***
Library    SeleniumLibrary

*** Keywords ***
abrir site
    Open Browser     http://localhost/MenuUniversitario/register.php    gc
    Maximize Browser Window
preencher formulário com informação prévia
    Input Text    ${nome_cadastro}               Wellington Rato
    Input Text    ${email_cadastro}              well@gmail.com
    Input Text    ${senha_cadastro}              A1s2d3f4
    Input Text    ${confirmar_senha_cadastro}    A1s2d3f4 
preencher formulário com informação nova
    Input Text    ${nome_cadastro}               Breno Sedrez
    Input Text    ${email_cadastro}              bsr@gmail.com
    Input Text    ${senha_cadastro}              Z1x2c3v4
    Input Text    ${confirmar_senha_cadastro}    Z1x2c3v4 
enviar dados
    Click Button    ${button_submit}
fechar site
    Alert Should Be Present
    Sleep    2s
    Capture Page Screenshot
    Sleep    1s
    Close Browser
*** Variables ***
${nome_cadastro}                     id:nome
${email_cadastro}                    id:email
${senha_cadastro}                    id:psw
${confirmar_senha_cadastro}          id:psw-repeat
${button_submit}                     //button[@type='submit']
*** Test Cases ***
Cenário de Teste 1: Cadastro com login já existente
    abrir site
    preencher formulário com informação prévia
    enviar dados
    fechar site
Cenário de Teste 2: Cadastro com login não existente
    abrir site
    preencher formulário com informação nova
    enviar dados
    fechar site
    
    