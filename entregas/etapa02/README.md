# ENTREGA ETAPA 03 - Comparando a nova remessa recebida

O material XML foi novamente enviado, a principio descartando o anterior. Como, a princípio, a principal alteração foi a deleção de alguns resumos, e nenhuma revisão de texto foi realizada, pode-se reutilizar a maior parte, ao invés de descartar.

A titulo de controle das mudanças, e buscando-se também reduzir o "retrabalho", foi realizada uma comparação detalhada entre a nova e a enterior. 

## 03.1 - Estratégia de comparação

Independente do grau de reutilização dos arquivos XML, os processamentos iniciais (não-manuais) podem ser repetidos sem custo. Dois estados foram comparados, com as seguintes avaliações:

* Commit de 28 de agosto, [fb73d205ff2dbdbef1f6a528f83d7dcee0ae1447](https://github.com/ppKrauss/SBPqO-2019/tree/fb73d205ff2dbdbef1f6a528f83d7dcee0ae1447/recebidoOriginal) comentado como "carga e inicio dos trabalhos":   não se mostrou comparável pois houve acréscimo de  CDATA junto ao campo `<Apoio>` na nova versão. 

* Commits muito posteriores tiveram demanda de intervanção não-automática. 

* o Commit também de 28 de agosto, [38bb45096ebcba986c5363bd77c449c262ecb5de](https://github.com/ppKrauss/SBPqO-2019/tree/38bb45096ebcba986c5363bd77c449c262ecb5de/recebidoOriginal) comentado como "correção #1, conv. utf8, entrega etapa01a" é o que proporciona menor impacto para a comparação. A [correção #1](https://github.com/ppKrauss/SBPqO-2019/issues/1) e a "etapa01a" são reprodutiveis. 

Optou-se por utilizar este último commit para a comparação.

Nota: os *commits* são facilmente recuperados em seu estado original através de um `git clone` do presente repositório seguido de `reset --hard`, por exemplo   `git reset --hard  38bb45096ebcba986c5363bd77c449c262ecb5de`.

## 03.1 - Submissão da nova remessa à etapa01a

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

Node paths: /Resumos/Resumo[]; /Resumos/Resumo[]/Sigla; /Resumos/Resumo[]/Titulo; /Resumos/Resumo[]/Autores; /Resumos/Resumo[]/Universidade; /Resumos/Resumo[]/Email; /Resumos/Resumo[]/Resumo; /Resumos/Resumo[]/Conclusao; /Resumos/Resumo[]/Apoio

Node names: Resumo; Sigla; Titulo; Autores; Universidade; Email; Conclusao; Apoio
```

## 03.2- Comparação com o commit 38bb45

A principal alteração foi a remoção de resumos:
* `AO.xml`:  **9** resumos removidos. AO0240, ..., AO0240.
* `HA.xml`:  **1** resumo removido. HA016
* `PI.xml`:  **34** resumos removidos. PI0030, PI0060, PI0067, ..., PI0867, PI0893, PI0919.
* `PN.xml`:  **78** resumos removidos. PN0098, PN0113, PN0200, ...,  PN1824, PN1910, PN1934.
* `PO.xml`:  **2** resumos removidos. PO012, PO041.
* `RS.xml`:  **7** resumos removidos. RS056, RS066, RS080, RS081, RS095, RS125, RS133.
* `TCC.xml`:  **1** resumo removido. TCC051.

Exceto por mudanças no formato da tag XML vazia `<apoio></apoio>` que mudou para `<apoio/>`, não foram feitas correções de texto, e apenas 3 arquivos apresentaram edição menor nos autores:

* `PE.xml`:  acréscimo dos autores *"Melo BC, Beltrame LGN, Moraes DA"*.
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


