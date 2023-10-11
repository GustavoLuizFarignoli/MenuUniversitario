*** Settings ***
Library    SeleniumLibrary

*** Variables ***
#Dados Gerais
${Browser}            gc
${link_login}         http://localhost/MenuUniversitario/login.php
${link_cadastro}      http://localhost/MenuUniversitario/register.php
${link_pesquisa}      http://localhost/MenuUniversitario/pesquisa.php
${link_visualizar}    http://localhost/MenuUniversitario/index.php

#Dados para o Login
${emailcorreto_login}    well@gmail.com
${senhacorreta_login}    A1s2d3f4
${emailerrado_login}     well5@gmail.com
${senhaerrada_login}     A1s2d3f4.

#Dados para o Cadastro
${email_existente_cadastro}       well@gmail.com
${nome_existente_cadastro}        Wellington Rato
${senha_existente_cadastro}       A1s2d3f4

${email_novo_cadastro}            caiopaul@gmail.com
${nome_novo_cadastro}             Caio Paulista
${senha_novo_cadastro}            A1s2d3f4.

#Dados para a Pesquisa
${nome_produto}    calzone
${n_bloco}         2

