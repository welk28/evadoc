alter table periodo add cierre int;
update periodo set cierre=1 where predet=1;

CREATE TABLE cierre (
  `idh` int(11) NOT NULL,
  `nop` int(11) NOT NULL,
  uno int,
  dos int,
  tres int,
  cinco int,
  PRIMARY KEY  (idh,nop)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;