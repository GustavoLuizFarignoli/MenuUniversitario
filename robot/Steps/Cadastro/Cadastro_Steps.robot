*** Settings ***
Resource    ../../Resources/Settings.resource
Resource    ../../Elements/Main_Elements.resource

*** Keywords ***
abrir site de Cadastro
    Open Browser     ${link_cadastro}    ${Browser}
    Maximize Browser Window
preencher formulário com informação prévia
    Input Text    ${Cadastro.nome_cadastro}               ${nome_existente_cadastro}
    Input Text    ${Cadastro.email_cadastro}              ${email_existente_cadastro}
    Input Text    ${Cadastro.senha_cadastro}              ${senha_existente_cadastro}
    Input Text    ${Cadastro.confirmar_senha_cadastro}    ${senha_existente_cadastro} 
preencher formulário com informação nova
    Input Text    ${Cadastro.nome_cadastro}               ${nome_novo_cadastro}
    Input Text    ${Cadastro.email_cadastro}              ${email_novo_cadastro}
    Input Text    ${Cadastro.senha_cadastro}              ${senha_novo_cadastro}
    Input Text    ${Cadastro.confirmar_senha_cadastro}    ${senha_novo_cadastro} 
enviar dados de Cadastro
    Click Button    ${Cadastro.button_submit_cadastro}
fechar site de Cadastro
    Alert Should Be Present
    Sleep    2s
    Capture Page Screenshot
    Sleep    1s
    Close Browser