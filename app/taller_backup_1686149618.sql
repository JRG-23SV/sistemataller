

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `marca_vehiculo` varchar(150) NOT NULL,
  `modelo_vehiculo` varchar(150) NOT NULL,
  `placa_vehiculo` varchar(150) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cliente VALUES("1","Pedro","Parker","Toyota","Tacoma","P7889A8","7578-4132","2023-04-11");
INSERT INTO cliente VALUES("2","Michael","Jordan","Toyota","Yaris","P78ASD5","6969-7777","2023-04-11");
INSERT INTO cliente VALUES("5","Luis","Ayala","Toyota","Yaris","P7845A0","7548-9875","2023-05-03");
INSERT INTO cliente VALUES("6","Ricardo","Arjona","Hyundai","Elantra","P745QE9","7548-8999","2023-05-29");
INSERT INTO cliente VALUES("7","Gerson","Muñoz","Toyota","Corolla","P999666","7676-8989","2023-05-29");
INSERT INTO cliente VALUES("8","Pedro","Parker","Kia","Soul","PZ9EE78","6121-3141","2023-05-29");
INSERT INTO cliente VALUES("9","Alejandra ","Gomez","Kia ","Picanto","P01235HFD","7548-8999","2023-05-29");



CREATE TABLE `estado_rep` (
  `id_est` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(155) NOT NULL,
  PRIMARY KEY (`id_est`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO estado_rep VALUES("4","Inactivo");
INSERT INTO estado_rep VALUES("5","En proceso");
INSERT INTO estado_rep VALUES("6","Finalizado");



CREATE TABLE `facturacion` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `id_reparacion` int(11) NOT NULL,
  `cliente` varchar(150) NOT NULL,
  `marcaveh` varchar(200) NOT NULL,
  `modelveh` varchar(200) NOT NULL,
  `placaveh` varchar(200) NOT NULL,
  `telefonoclient` varchar(10) NOT NULL,
  `descripcionrepa` varchar(255) NOT NULL,
  `fecha_reparacion` date NOT NULL,
  `gastorep` decimal(10,2) NOT NULL,
  `montorep` decimal(10,2) NOT NULL,
  `pagototal` decimal(10,2) NOT NULL,
  `codebarra` text NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `id_reparacion` (`id_reparacion`),
  CONSTRAINT `facturacion_ibfk_1` FOREIGN KEY (`id_reparacion`) REFERENCES `reparaciones` (`id_rep`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO facturacion VALUES("2","22","Alejandra  Gomez","Kia ","Picanto","P01235HFD","7548-8999","Se reparo XD","2023-05-31","225.00","100.00","325.00","COD6474B46085B26");
INSERT INTO facturacion VALUES("3","21","Pedro Parker","Kia","Soul","PZ9EE78","6121-3141","Se limpio el motorcito","2023-06-07","45.00","100.00","145.00","COD64808DE71F115");



CREATE TABLE `reparaciones` (
  `id_rep` int(11) NOT NULL AUTO_INCREMENT,
  `id_clientes` int(11) NOT NULL,
  `fallas` varchar(255) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text DEFAULT NULL,
  `estado_rep` int(11) NOT NULL,
  PRIMARY KEY (`id_rep`),
  KEY `id_clientes` (`id_clientes`),
  KEY `estado_rep` (`estado_rep`),
  CONSTRAINT `reparaciones_ibfk_1` FOREIGN KEY (`id_clientes`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reparaciones_ibfk_2` FOREIGN KEY (`estado_rep`) REFERENCES `estado_rep` (`id_est`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO reparaciones VALUES("19","1","Una lavadita y como nuevo gg","2023-05-25","2023-05-28-09-07-47__carrochocado.jpg","5");
INSERT INTO reparaciones VALUES("20","2","Escape roto, salio malo de fabrica","2023-05-23","2023-05-28-11-17-56__escaperoto.jpg","6");
INSERT INTO reparaciones VALUES("21","8","Falla de riadiador","2023-05-17","2023-05-29-08-12-27__motor_soul.jpg","6");
INSERT INTO reparaciones VALUES("22","9","Choque frontal","2023-05-30","2023-05-29-08-18-11__17854934_1746824768942679_3989891127454711388_o.jpg","6");



CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO roles VALUES("1","Administrador");
INSERT INTO roles VALUES("2","Empleado");



CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `correo` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO usuario VALUES("6","manuel","$2y$10$T5ZTyE9xsCAsUHXD2BV6xe0eE.tN/1L.smMf2mcVC8.SY.3cdaJZq","manuel@gmail.com","","1","2023-04-09 23:12:11","2023-05-27 09:13:04");
INSERT INTO usuario VALUES("7","carlos","$2y$10$YPyqPp6RBcwSffwnlgQxMuAl6pHYoC5yy0PXJWKOSDIXpHl4KPaPC","carlos@gmail.com","","2","2023-04-09 23:32:02","0000-00-00 00:00:00");
INSERT INTO usuario VALUES("16","fabian","$2y$10$BGrWCIlpRgu.NFF4rivOtutHTFD1i.Ipjjl3p/WHsdS5gekNkAPh2","fabian@gmail.com","","2","2023-04-11 16:17:05","2023-05-02 21:02:05");
INSERT INTO usuario VALUES("17","natividad","$2y$10$XrZoAx5RrcDNP2zSY2E5XuczJpzn1c7ZfQBuTSB0d/d3fehLIMqPu","natividad@gmail.com","","1","2023-04-11 21:07:52","0000-00-00 00:00:00");
INSERT INTO usuario VALUES("23","julio","$2y$10$U5FpxxxqSxmxR6oq1HT3q.YW/cVDZZ0WJQTquxTn9jl7CS7xZxdeG","julio@gmail.com","","2","2023-04-24 22:14:22","0000-00-00 00:00:00");
INSERT INTO usuario VALUES("24","brandon","$2y$10$rCCkYpaMtACngCYAoS81/OHzjRxL24AYEXDr1dGlM2xzotf.B.wa.","brandon@gmail.com","","2","2023-05-02 20:17:01","0000-00-00 00:00:00");
INSERT INTO usuario VALUES("26","luisayala","$2y$10$LoEsSKvHCBXRijY9d.wmD.h8gPfxCZoFFF.J.VL9o4.SIwvKZQX9q","luisayala@unab.edu.sv","","2","2023-05-29 08:13:45","0000-00-00 00:00:00");

