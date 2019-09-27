## ENTREGA ETAPA 03 - Planilhas de revisão

O material XML foi consolidado, os ~1400 resumos convertidos e divididos em partes tratáveis pelos revisores:

* **Conteúdo** principal dos resumos: duas partes balanceadas, `REVISAR_CONTEUDO1.htm` e `REVISAR_CONTEUDO2.htm`, para revisão final e normalização de texto.
* **Metadados** dos resumos: `REVISAR_METADADOS.csv` contendo autores, e-mail, apoio e afiliação.

O conteúdo estará disponível para revisão *online* em Google-docs, os metadados disponíveis para revisão em planilha offline (ex. Excel).

Uma revisão parcial do problema dos superscritos/subscritos foi realizada sobre os resumos PN conforme [*commit* `36acfc`](https://github.com/ppKrauss/SBPqO-2019/commit/36acfc40ae97f3b530d070a59b5904e69ea81f94).

Uma primeira revisão automática (comando "etapa3b" no `proc.php`) foi realizada sobre estes arquivos de conteúdo, [*commit* `717825`](https://github.com/ppKrauss/SBPqO-2019/commit/7178257a6f69abeb1056ac58c9ba82c82d20ed8a), resultando em 855 (26%) resumos afetados, pelas seguintes modificações, já utilizadas em anos anteriores da SBPqO:

* termos "in vitro" e "in vivo" com itálicos;
* termo "Raios-X" padronizado como "Raios X" (com no break-space);
* sinal de "±" normalizado (sem espaços para não quebrar linha na expressão de valor), assim como imendando à direita em casos como "resultou em ± 2,5mm".
* adoção de "no break hyphen" para não quebrar linha na expressão de intervalos numéricos.
* sinal de percentual junto. Ex. "entre 32,7 % e 33,5%" junta "32,7%".

Uma segunda revisão automática pode vir a ser realizada após a entrega do pacote completo (com PDF), conforme instruções que vierem a ser fornecidas.
