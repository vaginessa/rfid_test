RFID Integrator
=========

Este projeto tem como intenção testar integração entre PHP, RFID,Apache.
Criado em Janeiro de 2011 para uma concorrência de agencias para um projeto de parque de diversões, mapeando todas as atrações que o usuário fez nas dependências do parque e integrando com facebook + ranking de melhor aproveitamento web.

Tecnologias empregadas
  - PHP
  - jQuery
  - Apache
  - RFID + Leitor - arduino


Veja o video explicando

> [video] - RFID + PHP/MySQL + Apache - Integração com rfid e sistema web 


Versão
----

1.0 - Beta

FONTES
-----------

* [BrunoSoares] - Utilizei bog do Bruno Soares para encontrar a forma de abrir conexão com porta serial via PHP (ele utiliza com arduino mas o KIT que eu tinha era based em arduino)
* [LabGaragem] - Kit de iniciante RFID
* [FBSDK] - Criado um APP para pegar ID e SecretToken (permissão para postar no facebook)

Como usar
--------------

```sh
git clone [git-repo-url] seu_diretorio_local
cd seu_diretorio_local
# Altere as configurações dentro do projeto, como API SEcret Key (uu já deletei o projeto do facebook)
# Faça testes tentando ler as portas seriais,  COM1 COM2 COM3 (varia de acorod com suas entradas USB)
# Acesse http://localhost/seu_diretorio_local/exec.php (este arquivo irá ficar em looping infinito Esperando o cartão na leitora)
```

**Free Software, Hell Yeah!**

[BrunoSoares]:http://blog.bsoares.com.br/php/controlling-arduino-with-php
[LabGaragem]:http://www.labdegaragem.org/loja/39-rfid-1/rfid-starter-kit.html
[FBSDK]:https://developers.facebook.com/
[video]:https://www.youtube.com/watch?v=6fnD3DPlibQ
