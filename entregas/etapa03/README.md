## ENTREGA ETAPA 03 - Subsídios para revisão final

O material XML foi consolidado, os ~1400 resumos convertidos e divididos em partes tratáveis pelos revisores:

* **Conteúdo** principal dos resumos: quatro partes balanceadas, `REVISAR_CONTEUDO1.htm` a `REVISAR_CONTEUDO4.htm`, para revisão final e normalização de texto.
* **Metadados** dos resumos: `REVISAR_METADADOS.csv` contendo autores, e-mail, apoio e afiliação.

O conteúdo estará disponível para revisão *online* em Google-docs, os metadados disponíveis para revisão em planilha offline (ex. Excel).

A *prova tipográfica* (na forma de "PDF do miolo") oferece amostra da diagramação final dos resumos. Está sendo entregue apenas por e-mail.

## Revisões automáticas 
Uma revisão parcial do problema dos superscritos/subscritos foi realizada sobre os resumos PN conforme [*commit* `36acfc`](https://github.com/ppKrauss/SBPqO-2019/commit/36acfc40ae97f3b530d070a59b5904e69ea81f94).

Uma primeira revisão automática (comando "etapa3b" no `proc.php`) foi realizada sobre estes arquivos de conteúdo, [*commit* `717825`](https://github.com/ppKrauss/SBPqO-2019/commit/7178257a6f69abeb1056ac58c9ba82c82d20ed8a), resultando em 855 (26%) resumos afetados, pelas seguintes modificações, já utilizadas em anos anteriores da SBPqO:

* termos "in vitro" e "in vivo" com itálicos;
* termo "Raios-X" padronizado como "Raios X" (com no break-space);
* sinal de "±" normalizado (sem espaços para não quebrar linha na expressão de valor), assim como imendando à direita em casos como "resultou em ± 2,5mm".
* adoção de "no break hyphen" para não quebrar linha na expressão de intervalos numéricos.
* sinal de percentual junto. Ex. "entre 32,7 % e 33,5%" junta "32,7%".

Uma segunda revisão automática pode vir a ser realizada após a entrega do pacote completo (com PDF), conforme instruções que vierem a ser negociadas após a "revisão por terceiros".

## Revisão por terceiros
Material disponíel (para a revisão por terceiros) no google-docs:
* [Planilha dos metadados](https://docs.google.com/spreadsheets/d/1YnJId4oKj4OeGDl3-ifB9dLkICOaNDxttAlHKUxFcsI/)
* [Conteúdo parte-1](https://docs.google.com/document/d/14u7UfL1mRZKKK0jwzBzInslNE_NLM0C_6D3Kv8mkc6M/edit?usp=sharing)
* [Conteúdo parte-2](https://docs.google.com/document/d/1M4fK5xc9gUQEO6Sh3xVXyr2iFFaBidbGgs-hIYsBKdo/edit?usp=sharing)
* [Conteúdo parte-3](https://docs.google.com/document/d/1G3d84YX8QM7DQwRSzy2vxjceWWu0SyzHjAhrxc3t5iA/edit?usp=sharing)
* [Conteúdo parte-4](https://docs.google.com/document/d/1xH-P_6ktc-AxnNiY_jCo8KyZzJECN1OqvAiAY9xLQkQ/edit?usp=sharing)

Atenção: **nenhum outro tipo de revisão ou instrução será aceita**, serão acatadas apenas as edições realizadas nos links acima.

Caso durante a revisão sejam notadas demandas por revisões sistemáticas, as mesmas poderão ser negociadas e autimatizadas. A negociação envolve elaboração de instruções precisas e aceitáveis para  o processo de automação e teste.

## Demais correções já realizadas

O histórico completo de alterações realizadas sobre os arquios XML recebidos originais pode ser rastreado a partir das entregas anteriores:
* [Entrega 01](https://github.com/ppKrauss/SBPqO-2019/tree/master/entregas/etapa01): conversão para UTF8, revisão das tags desbalanceadas, etc.
* [Entrega 02](https://github.com/ppKrauss/SBPqO-2019/tree/master/entregas/etapa02#024---convers%C3%A3o): resumos deletados ou modificados depois do evento. Alguns acertos manuais também realizados nesta entrega.

Todas as **modificações são auditáveis**, sendo mais simples rastrear navegando-se pelos [*commits*](https://github.com/ppKrauss/SBPqO-2019/commits/master) indicados em cada um dos relatórios de entrega. 
