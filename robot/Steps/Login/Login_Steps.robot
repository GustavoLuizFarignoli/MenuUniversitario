*** Settings ***
Resource    ../../Resources/Settings.resource
Resource    ../../Elements/Main_Elements.resource

*** Keywords ***
abrir site de Login
    Open Browser     ${link_login}    ${Browser}
    Maximize Browser Window
preencher formulário certo
    Input Text    ${Login.email_login}    ${emailcorreto_login}
    Input Text    ${Login.senha_login}    ${senhacorreta_login}
preencher formulário errado
    Input Text    ${Login.email_login}    ${emailerrado_login}
    Input Text    ${Login.senha_login}    ${senhaerrada_login}
enviar dados de Login
    Click Button    ${Login.button_submit_login}
fechar site de Login
    Alert Should Be Present
    Sleep    2s
    Capture Page Screenshot
    Sleep    1s
    Close Browser