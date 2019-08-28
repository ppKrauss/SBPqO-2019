## ENTREGA ETAPA 01 - Conversão inicial

Nesta etapa apenas foram sanitizados os arquios XML originais (pasta [recebidoOriginal](../recebidoOriginal)) e convertidos para XML correto, em UTF-8 e com conteúdos em texto (não `CDATA`).

## Operações realizadas

1. Sanitização: foi necessária apenas conversão de `&` em `&amp;` no arquio original `TCC.xml` (linha 81 em "CNPq 308162/2014-5 & CAPES"). <br/>Revisão manual, [*commit* `b89a8d`](https://github.com/ppKrauss/SBPqO-2019/commit/b89a8d9050485e14b6f779ea4baeea83368e207b).

2. Conversão de enconding: foi necessária a conversão padrão do *XML enconding* original "iso-8859-1" para "UTF-8" em seguida a conversão dos blocos CDATA em texto. Foi registada como primeiro *commit*. Todo o processo pode ser reproduzido rodando-se o script `proc.php etapa1a`. <br/>Ver dump abaixo, [*commit* `??`](https://github.com/ppKrauss/SBPqO-2019/commit/??).

3. Conersão de texto-cru para XHTML: o texto CDATA para que se seja aceito como XML não pode ter confusão entre sinais `>`, `<`, ou `&` e tags XML. Nesta etapa foram reinterpretados os sinais e convertidos em tags quando consistentes. As entidades numéricas também foram convertidas em caracteres UTF-8. Todo o processo pode ser reproduzido rodando-se o script `proc.php etapa1b`.

### Dump operação-2


### Dump operação-3
