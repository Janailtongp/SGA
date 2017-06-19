// total propriedades
DELIMITER $
   CREATE PROCEDURE total_propriedades(idUsu int)
   BEGIN
   SELECT count(*) total from propriedade where id_proprietario=idUsu ;
   END
   $
   call total_propriedades(idUsu);
// total inquilinos
DELIMITER $
   CREATE PROCEDURE total_inquilinos(idUsu int)
   BEGIN
   SELECT count(*) total from iquilino where id_usuario=idUsu ;
   END
   $
   call total_inquilinos(idUsu);
   
   
//grafico 1 : Lucro total por propriedade
  DELIMITER $
   CREATE PROCEDURE lucro_total_por_propriedade(idUsu int)
   BEGIN
   SELECT  p.id, p.rua rua,p.numero numero,p.bairro bairro,p.cidade cidade, sum(m.valor)total from propriedade p, mensalidade m  where p.id_proprietario=idUsu
	and p.id=m.id_propriedade and m.situacao="Pago" group by p.id;
   END
   $
 // grafico 2: Lucro medio por propriedade  
  DELIMITER $
   CREATE PROCEDURE lucro_medio_por_propriedade(idUsu int)
   BEGIN
   SELECT  p.id, p.rua rua,p.numero numero,p.bairro bairro,p.cidade cidade, sum(m.valor)/count(m.id_propriedade) lucro_medio from propriedade p, mensalidade m where p.id_proprietario=idUsu
	and p.id=m.id_propriedade and m.situacao="Pago" group by p.id;
   END
   $     
 
 
 
 // grafico 4: Rendimento por mes
  DELIMITER $
   CREATE PROCEDURE rendimento_por_mes(idUsu int)
   BEGIN
   SELECT  m.mes mes,m.ano ano, sum(m.valor) total_mes from propriedade p, mensalidade m where p.id_proprietario=idUsu
	and p.id=m.id_propriedade and m.situacao="Pago" group by m.mes,m.ano;
   END
   $  
 
 // tabela 5: Lucro por inquilino
 DELIMITER $
   CREATE PROCEDURE lucro_por_inquilino(idUsu int)
   BEGIN
   SELECT i.id id, i.nome inquilino, sum(m.valor) total from iquilino i, mensalidade m where i.id_usuario=idUsu
	and i.id=m.id_iquilino and m.situacao="Pago" group by i.id;
   END
   $
   
   
 DELIMITER $
   CREATE PROCEDURE lucro_por_inquilino(idUsu int)
   BEGIN
   SELECT i.id id, i.nome inquilino, sum(m.valor) total from iquilino i, mensalidade m where i.id_usuario=idUsu
	and i.id=m.id_iquilino and m.situacao="Pago" group by i.id;
   END
   $
DELIMITER $
   CREATE PROCEDURE lucro_por_inquilino(idUsu int)
   BEGIN
   SELECT i.id id, i.nome inquilino, sum(m.valor) total from iquilino i, mensalidade m where i.id_usuario=idUsu
	and i.id=m.id_iquilino and m.situacao="Pago" group by i.id;
   END
   $