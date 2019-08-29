## Entrada da ETAPA 01 - Conversão inicial

Nesta etapa apenas foram sanitizados os arquios XML originais (pasta [recebidoOriginal](../recebidoOriginal)) e convertidos para XML correto, em UTF-8 e com conteúdos em texto (não `CDATA`).

## Operações realizadas

1. Sanitização: foi necessária apenas conversão de `&` em `&amp;` no arquio original `TCC.xml` (linha 81 em "CNPq 308162/2014-5 & CAPES"). <br/>Revisão manual (remoção do bug), [*commit* `b89a8d`](https://github.com/ppKrauss/SBPqO-2019/commit/b89a8d9050485e14b6f779ea4baeea83368e207b).

2. Conversão de enconding: foi necessária uma etapa de conversão padrão do *XML enconding* original "iso-8859-1" para "UTF-8". Tecnicamente Tecnicamente a conversão fica mais simples se no mesmo processo os blocos `CDATA` forem expandidos para texto (e tratando eventuais tags HTML como texto).  Todo o processo pode ser reproduzido rodando-se o script `proc.php etapa1a`, conforme dump abaixo  que resultou no  [*commit* `38bb45`](https://github.com/ppKrauss/SBPqO-2019/commit/38bb45096ebcba986c5363bd77c449c262ecb5de).

    2.1. Conversão "iso-8859-1" para "UTF-8"

    2.2. Expansão dos blocos `CDATA` conforme [padrão SimpleXML do PHP](https://www.php.net/manual/en/book.simplexml.php) e seu uso no script.

3. Conersão de texto-cru para XHTML: o texto CDATA para que se seja aceito como XML não pode ter confusão entre sinais `>`, `<`, ou `&` e tags XML. Nesta etapa foram reinterpretados os sinais e convertidos em tags quando consistentes. As entidades numéricas também foram convertidas em caracteres UTF-8. Todo o processo pode ser reproduzido rodando-se o script `proc.php etapa1b`.

     3.1. Conversão em tag. [*Commit* `8260d2`](https://github.com/ppKrauss/SBPqO-2019/commit/8260d2b65a091d3c63d0027a51e7ebb28c0c8610).

     3.2. Acerto manual das tags desbalanceadas. [*Commit* `8a02d4`](https://github.com/ppKrauss/SBPqO-2019/commit/8a02d4287da6cc057b5babffa0acd459767e44eb).

### Dump da Etapa 01a
Realizados os itens 2.1 e 2.2 descritos acima.

```
php src/proc.php etapa01a

-- etapa01a - Lendo XMLs originais, conferindo e gravando como UTF8 -- 
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/AO.xml -- AO0001 .. AO0240
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/COL.xml --COL001
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/FC.xml --FC001
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/HA.xml --HA001
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/JL.xml --JL001
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/PDI.xml --PDI001
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/PE.xml --PE001
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/PI.xml --PI0001
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/PN.xml --PN0001
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/PO.xml --PO001
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/RS.xml --RS001
-- /home/user/sandbox/xmlWks/SBPqO-2019/recebidoOriginal/TCC.xml --TCC001

Node names: Resumo; Sigla; Titulo; Autores; Universidade; Email; Conclusao; Apoio.
```

Node paths: 
* /Resumos/Resumo[]; 
* /Resumos/Resumo[]/Sigla; 
* /Resumos/Resumo[]/Titulo; 
* /Resumos/Resumo[]/Autores; 
* /Resumos/Resumo[]/Universidade; 
* /Resumos/Resumo[]/Email; 
* /Resumos/Resumo[]/Resumo; 
* /Resumos/Resumo[]/Conclusao; 
* /Resumos/Resumo[]/Apoio

### Dump da Etapa 01b

Realizado o item 3 descrito acima. Resultados do item 3.1:

```
php src/proc.php etapa01b

-- etapa01b - Convertendo residuos XHTML do CDATA -- 
	-- AO.xml: AO0001 .. AO0240
	-- COL.xml: COL001 .. COL017
	-- FC.xml: FC001 .. FC030
	-- HA.xml: HA001 .. HA018
	-- JL.xml: JL001 .. JL003
	-- PDI.xml: PDI001 .. PDI002
	-- PE.xml: PE001 .. PE038
	-- PI.xml: PI0001 .. PI0920
	-- PN.xml: PN0001 .. PN1945
	-- PO.xml: PO001 .. PO045
	-- RS.xml: RS001 .. RS142
	-- TCC.xml: TCC001 .. TCC061
```



