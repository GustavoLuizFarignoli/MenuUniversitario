*** Settings ***
Resource    ../../Resources/Settings.resource
Resource    ../../Elements/Main_Elements.resource

*** Keywords ***
Dado que eu esteja no site de Login
    Open Browser     ${link_login}    ${Browser}
    Maximize Browser Window
Quando eu preencho o formulário com informações corretas
    Input Text    ${Login.email_login}    ${emailcorreto_login}
    Input Text    ${Login.senha_login}    ${senhacorreta_login}
Quando eu preencho o formulário com informações erradas
    Input Text    ${Login.email_login}    ${emailerrado_login}
    Input Text    ${Login.senha_login}    ${senhaerrada_login}
E envio os dados de Login
    Click Button    ${Login.button_submit_login}
E espero um alerta de login realizado
    Alert Should Be Present
    Sleep    2s
Então fecho o site de Login
    Capture Page Screenshot
    Sleep    1s
    Close Browser