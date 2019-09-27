# ENTREGA ETAPA 02 - Comparando e convertendo a nova remessa recebida

O material XML foi novamente enviado, a principio descartando o anterior. Como, a princípio, a principal alteração foi a deleção de alguns resumos, e nenhuma revisão de texto foi realizada, pode-se reutilizar a maior parte, ao invés de descartar.

A titulo de controle das mudanças, e buscando-se também reduzir o "retrabalho", foi realizada uma comparação detalhada entre a nova e a enterior. 

## 02.1 - Estratégia de comparação

Independente do grau de reutilização dos arquivos XML, os processamentos iniciais (não-manuais) podem ser repetidos sem custo. Dois estados foram comparados, com as seguintes avaliações:

* Commit de 28 de agosto, [fb73d205ff2dbdbef1f6a528f83d7dcee0ae1447](https://github.com/ppKrauss/SBPqO-2019/tree/fb73d205ff2dbdbef1f6a528f83d7dcee0ae1447/recebidoOriginal) comentado como "carga e inicio dos trabalhos":   não se mostrou comparável pois houve acréscimo de  CDATA junto ao campo `<Apoio>` na nova versão. 

* Commits muito posteriores tiveram demanda de intervanção não-automática. 

* o Commit também de 28 de agosto, [38bb45096ebcba986c5363bd77c449c262ecb5de](https://github.com/ppKrauss/SBPqO-2019/tree/38bb45096ebcba986c5363bd77c449c262ecb5de/recebidoOriginal) comentado como "correção #1, conv. utf8, entrega etapa01a" é o que proporciona menor impacto para a comparação. A [correção #1](https://github.com/ppKrauss/SBPqO-2019/issues/1) e a "etapa01a" são reprodutiveis. 

Optou-se por utilizar este último commit para a comparação.

Nota: os *commits* são facilmente recuperados em seu estado original através de um `git clone` do presente repositório seguido de `reset --hard`, por exemplo   `git reset --hard  38bb45096ebcba986c5363bd77c449c262ecb5de`.

## 02.2 - Submissão da nova remessa à etapa01a

Dump do processameto:
```
php src/proc.php etapa01a

 -- etapa01a - Lendo XMLs originais, conferindo e gravando como UTF8 -- 
-- AO.xml: AO0001 .. AO0239
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

Node names: Resumo; Sigla; Titulo; Autores; Universidade; Email; Conclusao; Apoio
```

## 02.3 - Comparação com o commit 38bb45

A principal alteração foi a remoção de resumos:
* `AO.xml`:  **9** resumos removidos. AO0240, ..., AO0240.
* `HA.xml`:  **1** resumo removido. HA016
* `PI.xml`:  **34** resumos removidos. PI0030, PI0060, PI0067, ..., PI0867, PI0893, PI0919.
* `PN.xml`:  **78** resumos removidos. PN0098, PN0113, PN0200, ...,  PN1824, PN1910, PN1934.
* `PO.xml`:  **2** resumos removidos. PO012, PO041.
* `RS.xml`:  **7** resumos removidos. RS056, RS066, RS080, RS081, RS095, RS125, RS133.
* `TCC.xml`:  **1** resumo removido. TCC051.

Um único resumo foi acrescentado, o PN1256.

Exceto por mudanças no formato da tag XML vazia `<apoio></apoio>` que mudou para `<apoio/>`, não foram feitas correções de texto, e apenas 3 arquivos apresentaram edição menor nos autores:

* `PE.xml`:  acréscimo dos autores *"Melo BC, Beltrame LGN, Moraes DA"* em PE023.
* `PI.xml`:  correção do autor *"-Júnior R S"* para *"Silva-Júnior R"*, *"-Neto JFT"* para *"Tenório-Neto JF"* e acento de *"Araújo MR"*.
* `PN.xml`: correção no acento do autor *"César"*.
* `TCC.xml`: correção em tag `<apoio>`, com troca do `&` por `e`.

### Dump da comparação

```sh
cd SBPqO-2019; 
git reset --hard 38bb45096ebcba986c5363bd77c449c262ecb5de 

cd ..
diff -w recebido-novo/AO.xml SBPqO-2019/recebidoOriginal-38bb45/AO.xml > AO-diff.txt
diff -w recebido-novo/COL.xml SBPqO-2019/recebidoOriginal-38bb45/COL.xml > COL-diff.txt
#...
diff -w recebido-novo/TCC.xml SBPqO-2019/recebidoOriginal-38bb45/TCC.xml > TCC-diff.txt

grep "<Sigla>" AO-diff.txt | wc -l
9
grep "<Sigla>" COL-diff.txt | wc -l
0
grep "<Sigla>" FC-diff.txt | wc -l
0
grep "<Sigla>" HA-diff.txt | wc -l
1
grep "<Sigla>" JL-diff.txt | wc -l
0
grep "<Sigla>" PDI-diff.txt | wc -l
0
grep "<Sigla>" PE-diff.txt | wc -l
0
grep "<Sigla>" PI-diff.txt | wc -l
34
grep "<Sigla>" PN-diff.txt | wc -l
78
grep "<Sigla>" PO-diff.txt | wc -l
2
grep "<Sigla>" RS-diff.txt | wc -l
7
grep "<Sigla>" TCC-diff.txt | wc -l
1

grep "<Autores>" AO-diff.txt | wc -l
9
grep "<Autores>" COL-diff.txt | wc -l
0
grep "<Autores>" FC-diff.txt | wc -l
0
grep "<Autores>" HA-diff.txt | wc -l
1
grep "<Autores>" JL-diff.txt | wc -l
0
grep "<Autores>" PDI-diff.txt | wc -l
0
grep "<Autores>" PE-diff.txt | wc -l
2
grep "<Autores>" PI-diff.txt | wc -l
40
grep "<Autores>" PN-diff.txt | wc -l
80
grep "<Autores>" PO-diff.txt | wc -l
2
grep "<Autores>" RS-diff.txt | wc -l
7
grep "<Autores>" TCC-diff.txt | wc -l
1
```

Anexo nesta mesma pasta os arquivos  `*-diff.txt`. 

## 02.4 - Conversão
Nem todos os novos aquivos XML substituiram os iniciais, apenas 4 entre os 6 maiores: PI, PN, PO e RS. O [*commit* `1e5b1a`](https://github.com/ppKrauss/SBPqO-2019/commit/1e5b1afee36141d63868c05c515624bade674d9f) mostra que as remoções esperadas foram efetuadas e que o restante permanceu intacto.

Os demais, ou permaneceram sem alterações (COL, FC, JL e PDI) ou receberam edições mínimas:  arquivos HA (apenas uma remoção), PE (apenas uma correcao),  e TCC (apenas uma remoção e correção já realizada antes). Todas elas indicadas no [*commit* `a9ccbc`](https://github.com/ppKrauss/SBPqO-2019/commit/a9ccbc74d64cd0af894f62605d858bca01e0143c).

### Dump do processamento nos XMLs de substituição

Seguindo a sequência da `etapa01a`, mas, conforme destacado, apenas com arquivos PI, PN, PO e RS.  Dump do  processameto:
```
php src/proc.php etapa01b

-- etapa01b - Convertendo residuos XHTML do CDATA -- 
-- PI.xml: PI0001 .. PI0920
-- PN.xml: PN0001 .. PN1945
-- PO.xml: PO001 .. PO045
-- RS.xml: RS001 .. RS142
```
Depois os procedimentos "3.2. Acerto manual das tags desbalanceadas" e "3.3. Correção do bug03 UTF-8 canônico/NFC", coforme [descrição da Etapa01](../etapa01/README.md).  A etapa01c requer verificação e depois alteração final.

Realizado o procedimento 3.3, que consistiu em rodar script em modo teste e modo produção. Depois de rodar `php src/proc.php etapa01c` e realizar balanceamentos manuais, chegamos num XML viável para se  comparar. A seguir algumas modificações mais que foram realizadas antes do que resultou no [*commit* `7fd351`](https://github.com/ppKrauss/SBPqO-2019/commit/7fd351a2b36bd48c2b7ffb66d80a22e130f5c63b). 

## 02.5 - Revisão manual

Outros problemas de marcação ou conversão foram verificados por inspeção visual, alguns deles corrigidos:

* **Marcação errônea de itálicos em lugar de subscrito e superscrito**: aparentemente um problema do editor de texto original dos resumos. Exemplos:

    * **Subscritos**: por exemplo "H<i>2</i>O<i>2</i>" do resumo PN0704 foi corrigido para "H<sub>2</sub>O<sub>2</sub>" (com intensão original confirmada pelo termo "peróxido de hidrogênio" no mesmo texto).

    * **Superscritos**: diversas ocorrencias de numerais ao lado de dígito, tais como "28<i>9</i>". Para a correção do suposto problema é necessária avaliação do contexto. Exemplos de resumos contendo o problema:

       - PN0035 o "hidróxido de cálcio" destaca que "Ca(OH)<i>2</i>" é na verdade "Ca(OH)<sub>2</sub>"
       - PN0039 o termo "água aquecida" destaca que "H<i>2</i>O" é "H<sub>2</sub>O"
       - PN0057 "mm<i>2</i>" é "mm<sup>2</sup>" assim como no resumo PN0704 "J/cm<i>2</i>" é "J/cm<sup>2</sup>".
       - PN0018 aparente ter o problema, mas o contexto não oferece evidência suficiente (da intensão do autor) para se aplicar alguma correção.
   
* **Unidades métricas** fora de padrão: apesar de ser possível a adoção de uma única convenção para a expressão de unidades ao longo de todos os resumos, algumas correções realizadas artesanalmente demonstram a dificuldade de automação.
    * unidade "J.cm-2" (ex. resumo PN1061) normalizada para "J/cm<sup>2</sup>". Destaca-se neste caso a preferência por representações sem ponto, para evitar confusão com finalização das frases do resumo.
    * unidade e espaçamento depois do "±". Por exemplo convencionar como certo "37 ± 2° C" e  como errado "95 ± 5 %".
    * unidade e espaçamento. Por exemplo  convencionar "10 cm" como certo e "10cm" errado. Pode-se acrescentar sistematicamente o NO-BREAKING SPACE entre o valor e a unidade, "10&nbsp;cm" para proteger a expressão de quebras de linha.
    * Lista de percentuais, permitir apenas no final. Por exemplo no PN0941 a expressão "23 e 54 %", ou no  PN0048 "0, 1 e 3 % em peso". 

* Erros ortográficos: por exemplo no resumo PN1657 a palavra "midindo" corrigida para "medindo", ou "de60° curvatura" para "60° de curvatura".

* o campo email de  PN1292  foi editado.

