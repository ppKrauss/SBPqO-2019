## ENTREGA ETAPA 01 - Conversão inicial

Nesta etapa apenas foram sanitizados os arquios XML originais (pasta [recebidoOriginal](../recebidoOriginal)) e convertidos para XML correto, em UTF-8 e com conteúdos em texto (não `CDATA`).

## Operações realizadas

1. Sanitização: foi necessária apenas conversão de `&` em `&amp;` no arquio original `TCC.xml` (linha 81 em "CNPq 308162/2014-5 & CAPES"). <br/>Revisão manual (remoção do bug), [*commit* `b89a8d`](https://github.com/ppKrauss/SBPqO-2019/commit/b89a8d9050485e14b6f779ea4baeea83368e207b).

2. Conversão de enconding: foi necessária uma etapa de conversão padrão do *XML enconding* original "iso-8859-1" para "UTF-8". Tecnicamente Tecnicamente a conversão fica mais simples se no mesmo processo os blocos `CDATA` forem expandidos para texto (e tratando eventuais tags HTML como texto).  Todo o processo pode ser reproduzido rodando-se o script `proc.php etapa1a`, conforme [dump abaixo](#Etapa 01a) que resultou no  [*commit* `38bb45`](https://github.com/ppKrauss/SBPqO-2019/commit/38bb45096ebcba986c5363bd77c449c262ecb5de).

    2.1. Conversão "iso-8859-1" para "UTF-8"

    2.2. Expansão dos blocos `CDATA` conforme [padrão SimpleXML do PHP](https://www.php.net/manual/en/book.simplexml.php) e seu uso no script.

3. Conersão de texto-cru para XHTML: o texto CDATA para que se seja aceito como XML não pode ter confusão entre sinais `>`, `<`, ou `&` e tags XML. Nesta etapa foram reinterpretados os sinais e convertidos em tags quando consistentes. As entidades numéricas também foram convertidas em caracteres UTF-8. Todo o processo pode ser reproduzido rodando-se o script `proc.php etapa1b`.

     3.1. Conversão em tag. [*Commit* `8260d2b65a091d3c63d0027a51e7ebb28c0c8610`](https://github.com/ppKrauss/SBPqO-2019/commit/8260d2b65a091d3c63d0027a51e7ebb28c0c8610).

     3.2. Acerto manual das tags desbalanceadas. [*Commit* `??`](https://github.com/ppKrauss/SBPqO-2019/commit/xxx).

### Etapa 01a
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

### Etapa 01b

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

###  Etapa 01c 

Rodando `php src/proc.php -test etapa01c > relatorio01c.txt`. Resultados:

```
 -- etapa01c - Convertendo (e contando) entidades numéricas dos XMLs originais -- 
	AO.xml: 
		VERIFICAR: &#769; &#8203; &#257; &#119901;
		TOTAL 189 entities.
	COL.xml: 
		TOTAL 6 entities.
	FC.xml: 
		TOTAL 13 entities.
	HA.xml: 
		TOTAL 19 entities.
	JL.xml: 
		TOTAL 8 entities.
	PDI.xml: 
		TOTAL 0 entities.
	PE.xml: 
		VERIFICAR: &#807; &#771; &#769;
		TOTAL 11 entities.
	PI.xml: 
		VERIFICAR: &#771;  &#807; &#770; &#769; &#768; &#61617; &#8312; &#8315;
			   &#8202; &#8203; &#64257; &#776; &#720; &#713; &#8725;
		TOTAL 605 entities.
	PN.xml: 
		VERIFICAR: &#730; &#807;  &#771;  &#769; &#770; &#8722; &#646;  &#59154;
			   &#768; &#8206; &#8201; &#351; &#312; &#8208; &#8203; &#257;
			   &#8729; &#1178; &#411; &#8195; &#8202; &#8232; &#1455; &#713;
			   &#333; &#894;
		TOTAL 1430 entities.
	PO.xml: 
		TOTAL 2 entities.
	RS.xml: 
		VERIFICAR: &#8208; &#1008;
		TOTAL 12 entities.
	TCC.xml: 
		VERIFICAR: &#807; &#769;
		TOTAL 3 entities.
```

Depois das verificações manuais e inclusão dos diacrilicos na automação,
rodando de fato (sem option teste) `php src/proc.php etapa01c > relatorio01c.txt`. Resultados:

```
 -- etapa01c - Convertendo (e contando) entidades numéricas dos XMLs originais -- 
	AO.xml: 
		TOTAL 183 entities.
	COL.xml: 
		TOTAL 6 entities.
	FC.xml: 
		TOTAL 13 entities.
	HA.xml: 
		TOTAL 19 entities.
	JL.xml: 
		TOTAL 8 entities.
	PDI.xml: 
		TOTAL 0 entities.
	PE.xml: 
		TOTAL 1 entities.
	PI.xml: 
		TOTAL 498 entities.
	PN.xml: 
		VERIFICAR: &#257; &#411; &#894;
		TOTAL 1427 entities.
	PO.xml: 
		TOTAL 2 entities.
	RS.xml: 
		TOTAL 12 entities.
	TCC.xml: 
		TOTAL 3 entities.
```

Relatório de conversão e frequência dos caracteres especiais, para eventuais verificações e decisões sobre normalização:

 chr(257)=ā *2
 chr(312)=ĸ *1
 chr(333)=ō *4
 chr(351)=ş *1
 chr(411)=ƛ *1
 chr(414)=ƞ *2
 chr(593)=ɑ *1
 chr(646)=ʆ *1
 chr(706)=˂ *12
 chr(707)=˃ *5
 chr(713)=ˉ *2
 chr(720)=ː *1
 chr(730)=˚ *4
 chr(768)=̀ *13
 chr(769)=́ *146
 chr(770)=̂ *39
 chr(771)=̃ *113
 chr(776)=̈ *2
 chr(807)=̧ *85
 chr(894)=; *4
 chr(916)=Δ *255
 chr(917)=Ε *1
 chr(922)=Κ *1
 chr(937)=Ω *2
 chr(945)=α *582
 chr(946)=β *229
 chr(947)=γ *12
 chr(948)=δ *3
 chr(949)=ε *1
 chr(951)=η *2
 chr(952)=θ *3
 chr(954)=κ *8
 chr(955)=λ *5
 chr(956)=μ *203
 chr(960)=π *1
 chr(961)=ρ *14
 chr(963)=σ *33
 chr(964)=τ *6
 chr(965)=υ *1
 chr(967)=χ *2
 chr(981)=ϕ *1
 chr(1008)=ϰ *1
 chr(1178)=Қ *2
 chr(1455)=֯ *1
 chr(8195)=  *1
 chr(8201)=  *2
 chr(8202)=  *2
 chr(8203)=​ *20
 chr(8206)=‎ *3
 chr(8208)=‐ *11
 chr(8232)=  *2
 chr(8312)=⁸ *2
 chr(8315)=⁻ *1
 chr(8710)=∆ *78
 chr(8722)=− *2
 chr(8725)=∕ *1
 chr(8729)=∙ *1
 chr(8733)=∝ *3
 chr(8773)=≅ *5
 chr(8776)=≈ *4
 chr(8800)=≠ *1
 chr(8804)=≤ *173
 chr(8805)=≥ *162
 chr(9082)=⍺ *1
 chr(9651)=△ *2
 chr(59154)= *1
 chr(61617)= *4
 chr(64257)=ﬁ *1
 chr(119901)=𝑝 *1
 chr(120590)=𝜎 *6


