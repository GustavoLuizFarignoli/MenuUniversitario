*** Settings ***
Resource    ../../Resources/Settings.resource
Resource    ../../Elements/Main_Elements.resource

*** Keywords ***
Dado que eu esteja no site de Cadastro
    Open Browser     ${link_cadastro}    ${Browser}
    Maximize Browser Window
Quando eu preencho o formulário com uma informação prévia
    Input Text    ${Cadastro.nome_cadastro}               ${nome_existente_cadastro}
    Input Text    ${Cadastro.email_cadastro}              ${email_existente_cadastro}
    Input Text    ${Cadastro.senha_cadastro}              ${senha_existente_cadastro}
    Input Text    ${Cadastro.confirmar_senha_cadastro}    ${senha_existente_cadastro} 
Quando eu preencho o formulário com uma informação nova
    Input Text    ${Cadastro.nome_cadastro}               ${nome_novo_cadastro}
    Input Text    ${Cadastro.email_cadastro}              ${email_novo_cadastro}
    Input Text    ${Cadastro.senha_cadastro}              ${senha_novo_cadastro}
    Input Text    ${Cadastro.confirmar_senha_cadastro}    ${senha_novo_cadastro} 
E envio os dados de Cadastro
    Click Button    ${Cadastro.button_submit_cadastro}
E espero um alerta de cadastro realizado
    Alert Should Be Present
    Sleep    2s
Então fecho site de Cadastro
    Capture Page Screenshot
    Sleep    1s
    Close Browser