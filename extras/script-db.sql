/*
 S=Sintaxis
 C=Constraints
 P=PhpMyAdmin

  #  |  TABLA                   | SCP
---------------------------------------
  1  |  Administrador           | √√√
  2  |  Administrador_Permiso   | √√√
  3  |  Permiso                 | √√√
  4  |  Vendedor_Permiso        | √√√
  5  |  Vendedor                | √√√
  6  |  Zona                    | √√√
  7  |  Cliente                 | √√√
  8  |  Empresa                 | √√√
  9  |  Dirección               | √√√
  10 |  Comentario              | √√√
  11 |  Medida                  | √√√
  12 |  Unidades                | √√√
  13 |  Contacto                | √√√
  14 |  Pedido                  | √√√
  15 |  Pedido_Producto         | √√√
  16 |  EvaluaciónServicio      | √√√
  17 |  Servicio_Pregunta       | √√√
  18 |  Pregunta                | √√√
  19 |  Web_Pregunta            | √√√
  20 |  EvaluaciónWeb           | √√√
-----|--------------------------|------
  21 |  Producto                | √√√
  22 |  Aguja                   | √√√
  23 |  Aplicador               | √√√
  24 |  AtaCable                | √√√
  25 |  Etiqueta                | √√√
  26 |  Etiquetadora            | √√√
  27 |  Impresora               | √√√
  28 |  Ribbon                  | √√√
  29 |  Rodillo                 | √√√
  30 |  Sujetador               | √√√
  31 |  Tinta                   | √√√
  32 |  Proveedor               | √√√
---------------------------------------
*/

DROP DATABASE IF EXISTS `dymo`;
CREATE DATABASE IF NOT EXISTS dymo;
USE `dymo`;


/*
--
-- Estructura de tabla para la tabla `Administrador`
--
*/

CREATE TABLE `Administrador` (
  `id` 				  INT 		                             ,
  `nombre` 		  VARCHAR(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoP`   VARCHAR(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoM`   VARCHAR(30) COLLATE latin1_spanish_ci,
  `usuario` 	  VARCHAR(15) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena`  VARCHAR(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*
--
-- Volcado de datos para la tabla `Administrador`
--
*/
/*
INSERT INTO `Administrador` (`id`, `nombre`, `apellidoP`, `apellidoM`, `usuario`, `contrasena`, `permisos`) VALUES
(01, 'Jesús Emmanuel', 'Zetina', 'Chevez', 'ZCJO151861A', 'contraseña', 0),
(02, 'Juan Carlos', 'Gerónimo', 'Padilla', 'GPJO151861A', 'admin', 0);
*/



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Administrador_Permiso`
--
*/

CREATE TABLE `Administrador_Permiso` (
  `administradorID`   INT NOT NULL,
  `permisoID`         INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `AtaCable`
--
*/

CREATE TABLE `AtaCable` (
  `codigo`   VARCHAR(24) COLLATE latin1_spanish_ci,
  `medida`   INT,
  `color`    VARCHAR(24) COLLATE latin1_spanish_ci,
  `modelo`   VARCHAR(12) COLLATE latin1_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Aguja`
--
*/

CREATE TABLE `Aguja` (
  `codigo`    VARCHAR(24) COLLATE latin1_spanish_ci,
  `tipo`      VARCHAR(24) COLLATE latin1_spanish_ci,
  `material`  VARCHAR(24) COLLATE latin1_spanish_ci,
  `generico`  BIT(1)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Aplicador`
--
*/

CREATE TABLE `Aplicador` (
  `codigo`    VARCHAR(24) COLLATE latin1_spanish_ci,
  `modelo`    VARCHAR(12) COLLATE latin1_spanish_ci,
  `tipo`      VARCHAR(24) COLLATE latin1_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Cliente`
--
*/

CREATE TABLE `Cliente` (
  `id`          INT                                  ,
  `nombre`      VARCHAR(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoP`   VARCHAR(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoM`   VARCHAR(30) COLLATE latin1_spanish_ci,
  `telefono`    VARCHAR(24) COLLATE latin1_spanish_ci NOT NULL,
  `correo`      VARCHAR(64) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena`  VARCHAR(64) COLLATE latin1_spanish_ci NOT NULL,
  `empresaID`   INT                                   NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
--
-- Volcado de datos para la tabla `Cliente`
--
*/

INSERT INTO `Cliente` (`id`, `nombre`, `apellidoP`, `apellidoM`, `telefono`, `correo`, `contrasena`, `empresaID`) VALUES
(01, 'Luis Fernando', 'Gerónimo', 'Carranza', '7777654321', 'gclo@u', 'contra', 01),
(02, 'Jesús Emmanuel', 'Zetina', 'Chevez', '7771234567', 'zcjo151173@upemor.edu.mx', 'contraseña', 02);




/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/
/*
--
-- Estructura de tabla para la tabla `Comentario`
--
*/

CREATE TABLE `Comentario` (
  `id`          INT                                             ,
  `comentario`  VARCHAR(600)  COLLATE latin1_spanish_ci NOT NULL,
  `fecha`       DATE                                    NOT NULL,
  `autor`       VARCHAR(105)  COLLATE latin1_spanish_ci NOT NULL,
  `pedidoID`    INT                                     NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*
--
-- Volcado de datos para la tabla `Comentario`
--
*/



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Contacto`
--
*/

CREATE TABLE `Contacto` (
  `id`          INT                                    ,
  `nombre`      VARCHAR(45)   COLLATE latin1_spanish_ci NOT NULL,
  `empresa`     VARCHAR(100)  COLLATE latin1_spanish_ci NOT NULL,
  `correo`      VARCHAR(64)   COLLATE latin1_spanish_ci NOT NULL,
  `telefono`    VARCHAR(24)   COLLATE latin1_spanish_ci NOT NULL,
  `comentario`  VARCHAR(600)  COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------


--
-- Estructura de tabla para la tabla `Direccion`
--
*/

CREATE TABLE `Direccion` (
  `id`          INT                                    ,
  `numeroExt`   INT                                     NOT NULL,
  `numeroInt`   INT                                    ,
  `calle`       VARCHAR(32)   COLLATE latin1_spanish_ci NOT NULL,
  `colonia`     VARCHAR(32)   COLLATE latin1_spanish_ci NOT NULL,
  `cp`          INT                                     NOT NULL,
  `municipio`   VARCHAR(32)   COLLATE latin1_spanish_ci NOT NULL,
  `estado`      VARCHAR(32)   COLLATE latin1_spanish_ci NOT NULL,
  `empresaID`   INT                                     NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*
--
-- Volcado de datos para la tabla `Direccion`
--
*/

/*
INSERT INTO `Direccion` (`id`, `numeroExt`, `numeroInt`, `calle`, `colonia`, `cp`, `municipio`, `estado`, `empresaID`) VALUES
(),
();
*/



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------


--
-- Estructura de tabla para la tabla `Empresa`
--
*/

CREATE TABLE `Empresa` (
  `id`          INT                                             ,
  `nombre`      VARCHAR(100)  COLLATE latin1_spanish_ci NOT NULL,
  `telefono`    VARCHAR(24)   COLLATE latin1_spanish_ci NOT NULL,
  `correo`      VARCHAR(64)   COLLATE latin1_spanish_ci NOT NULL,
  `zonaID`      INT                                     
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*
--
-- Volcado de datos para la tabla `Empresa`
--
*/

INSERT INTO `Empresa` (`id`, `nombre`, `telefono`, `correo`, `zonaID`) VALUES
(1, 'DymoCliente_1', '7771234567', 'dymoCliente1@dymosa.com', 1),
(2, 'DymoCliente_2', '7777654321', 'dymoCliente2@dymosa.com', 1);




/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Etiquetadora`
--
*/

CREATE TABLE `Etiqueta`(
  `codigo`        VARCHAR(24) COLLATE latin1_spanish_ci,
  `color`         VARCHAR(32) COLLATE latin1_spanish_ci,
  `tipo`          VARCHAR(32) COLLATE latin1_spanish_ci,
  `marcaSensora`  BIT(1)                               ,
  `medida`        INT        
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Etiquetadora`
--
*/

CREATE TABLE `Etiquetadora`(
  `codigo`      VARCHAR(24) COLLATE latin1_spanish_ci,
  `digitos`     INT        ,
  `modelo`      VARCHAR(12) COLLATE latin1_spanish_ci,
  `variante`    VARCHAR(24) COLLATE latin1_spanish_ci,
  `medida`      INT        
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `EvaluacionServicio`
--
*/

CREATE TABLE `EvaluacionServicio`(
  `id`        INT          ,
  `fecha`     DATE NOT NULL,
  `pedidoID`  INT  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `EvaluacionWeb`
--
*/

CREATE TABLE `EvaluacionWeb`(
  `id`        INT          ,
  `fecha`     DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Impresora`
--
*/

CREATE TABLE `Impresora`(
  `codigo`      VARCHAR(24) COLLATE latin1_spanish_ci,
  `tipo`        VARCHAR(32) COLLATE latin1_spanish_ci,
  `modelo`      VARCHAR(24) COLLATE latin1_spanish_ci,
  `dpi`         INT
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Medida`
--
*/

CREATE TABLE `Medida`(
  `id`            INT           ,
  `ancho`         FLOAT NOT NULL,
  `largo`         FLOAT NOT NULL,
  `unidadesID`    INT   NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Pedido`
--
*/

CREATE TABLE `Pedido` (
  `id`            INT           ,
  `fechaPedido`   DATE  NOT NULL,
  `fechaEntrega`  DATE          ,
  `estado`        INT   NOT NULL,
  `costo`         FLOAT NOT NULL,  /* Float */
  `clienteID`     INT   NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Pedido_Producto`
--
*/

CREATE TABLE `Pedido_Producto` (
  `pedidoID`        INT,
  `productoCodigo`  VARCHAR(24)   COLLATE latin1_spanish_ci         ,
  `cantidad`        INT                                     NOT NULL,
  `detalles`        VARCHAR(600)  COLLATE latin1_spanish_ci         ,
  `costo`           FLOAT                                   NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Permiso`
--
*/

CREATE TABLE `Permiso` (
  `id`          INT                                           ,
  `permiso`     VARCHAR(32) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Pregunta`
--
*/

CREATE TABLE `Pregunta`(
  `id`        INT                                           ,
  `pregunta`  VARCHAR(64) COLLATE latin1_spanish_ci NOT NULL,
  `tipo`      VARCHAR(24) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Producto`
--
*/

CREATE TABLE `Producto` (
  `codigo`          VARCHAR(24)   COLLATE latin1_spanish_ci           ,
  `nombre`          VARCHAR(32)   COLLATE latin1_spanish_ci   NOT NULL,
  `marca`           VARCHAR(24)   COLLATE latin1_spanish_ci           ,
  `descripcion`     VARCHAR(256)  COLLATE latin1_spanish_ci           ,
  `costo`           FLOAT                 ,
  `unidadDePedido`  VARCHAR(12)   COLLATE latin1_spanish_ci           ,
  `proveedorID`       INT
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Proveedor`
--
*/

CREATE TABLE `Proveedor` (
  `id`      INT                   ,
  `nombre`  VARCHAR(100) COLLATE latin1_spanish_ci  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Ribbon`
--
*/

CREATE TABLE `Ribbon`(
  `codigo`      VARCHAR(24) COLLATE latin1_spanish_ci,
  `material`    VARCHAR(24) COLLATE latin1_spanish_ci NOT NULL,
  `medida`      INT NOT NULL,
  `in`          INT NOT NULL,
  `maquina`     VARCHAR(32) COLLATE latin1_spanish_ci NOT NULL,
  `letras`      VARCHAR(32) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Rodillo`
--
*/

CREATE TABLE `Rodillo`(
  `codigo`      VARCHAR(24) COLLATE latin1_spanish_ci,
  `color`       VARCHAR(24) COLLATE latin1_spanish_ci,
  `modelo`      VARCHAR(12) COLLATE latin1_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Servicio_Pregunta`
--
*/

CREATE TABLE `Servicio_Pregunta`(
  `servicioID`  INT NOT NULL,
  `preguntaID`  INT NOT NULL,
  `respuesta`   INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Sujetador`
--
*/

CREATE TABLE `Sujetador`(
  `codigo`  VARCHAR(24) COLLATE latin1_spanish_ci,
  `tipo`    VARCHAR(32) COLLATE latin1_spanish_ci,
  `genero`  BIT(1)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Tinta`
--
*/

CREATE TABLE `Tinta`(
  `codigo`  VARCHAR(24) COLLATE latin1_spanish_ci,
  `color`   VARCHAR(36) COLLATE latin1_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Unidades`
--
*/

CREATE TABLE `Unidades`(
  `id`              INT                 ,
  `unidadAncho`     VARCHAR(4) COLLATE latin1_spanish_ci  NOT NULL,
  `unidadLargo`     VARCHAR(4) COLLATE latin1_spanish_ci  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Vendedor_Permiso`
--
*/

CREATE TABLE `Vendedor_Permiso` (
  `vendedorID`    INT NOT NULL,
  `permisoID`     INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Vendedor`
--
*/

CREATE TABLE `Vendedor` (
  `id`          INT                                  ,
  `nombre`      VARCHAR(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoP`   VARCHAR(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoM`   VARCHAR(30) COLLATE latin1_spanish_ci,
  `usuario`     VARCHAR(15) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena`  VARCHAR(64) COLLATE latin1_spanish_ci NOT NULL,
  `zonaID`      INT
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*
--
-- Volcado de datos para la tabla `Alumno`
--
*/
/*
INSERT INTO `Vendedor` (`id`, `nombre`, `apellidoP`, `apellidoM`, `usuario`, `contrasena`, `permisos`) VALUES
(01, 'Jesús Emmanuel', 'Zetina', 'Chevez', 'ZCJO151861V', 'contraseña', 0),
(02, 'Luis Fernando', 'Gerónimo', 'Carranza', 'GCLO151861V', 'contraseña', 0);
*/



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Web_Pregunta`
--
*/

CREATE TABLE `Web_Pregunta`(
  `webID`       INT NOT NULL,
  `preguntaID`  INT NOT NULL,
  `respuesta`   INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/

/*
--
-- Estructura de tabla para la tabla `Zona`
--
*/

CREATE TABLE `Zona` (
  `id`    INT                                           ,
  `zona`  VARCHAR(32) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*
--
-- Volcado de datos para la tabla `Zona`
--
*/

INSERT INTO `Zona` (`id`, `zona`) VALUES
(1, 'Centro');



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------
*/




















/*
--
-- Índices para tablas volcadas
--
*/

/*
--
-- Indices de la tabla `Administrador`
--
*/

ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);



/*
--
-- Indices de la tabla `Aguja`
--
*/

ALTER TABLE `Aguja`
  ADD PRIMARY KEY (`codigo`);



/*
--
-- Indices de la tabla `Aplicador`
--
*/

ALTER TABLE `Aplicador`
  ADD PRIMARY KEY (`codigo`);



/*
--
-- Indices de la tabla `AtaCable`
--
*/

ALTER TABLE `AtaCable`
  ADD PRIMARY KEY (`codigo`);



/*
--
-- Indices de la tabla `Cliente`
--
*/

ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);



/*
--
-- Indices de la tabla `Contacto`
--
*/

ALTER TABLE `Contacto`
  ADD PRIMARY KEY (`id`);


/*
--
-- Indices de la tabla `Comentario`
--
*/

ALTER TABLE `Comentario`
  ADD PRIMARY KEY (`id`);



/*
--
-- Indices de la tabla `Direccion`
--
*/

ALTER TABLE `Direccion`
  ADD PRIMARY KEY (`id`);



/*
--
-- Indices de la tabla `Empresa`
--
*/

ALTER TABLE `Empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);



/*
--
-- Indices de la tabla `Etiqueta`
--
*/

ALTER TABLE `Etiqueta`
  ADD PRIMARY KEY (`codigo`);



/*
--
-- Indices de la tabla `Etiquetadora`
--
*/

ALTER TABLE `Etiquetadora`
  ADD PRIMARY KEY (`codigo`);



/*
--
-- Indices de la tabla `EvaluacionServicio`
--
*/

ALTER TABLE `EvaluacionServicio`
  ADD PRIMARY KEY (`id`);



/*
--
-- Indices de la tabla `EvaluacionWeb`
--
*/

ALTER TABLE `EvaluacionWeb`
  ADD PRIMARY KEY (`id`);



/*
--
-- Indices de la tabla `Impresora`
--
*/

ALTER TABLE `Impresora`
  ADD PRIMARY KEY (`codigo`);



/*
--
-- Indices de la tabla `Medida`
--
*/

ALTER TABLE `Medida`
  ADD PRIMARY KEY (`id`);



/*
--
-- Indices de la tabla `Pedido`
--
*/

ALTER TABLE `Pedido`
  ADD PRIMARY KEY (`id`);



/*
--
-- Indices de la tabla `Pedido_Producto`
--
*/

ALTER TABLE `Pedido_Producto`
  ADD PRIMARY KEY (`pedidoID`, `productoCodigo`);



/*
--
-- Indices de la tabla `Permiso`
--
*/

ALTER TABLE `Permiso`
  ADD PRIMARY KEY (`id`);



/*
--
-- Indices de la tabla `Pregunta`
--
*/

ALTER TABLE `Pregunta`
  ADD PRIMARY KEY (`id`);



/*
--
-- Indices de la tabla `Producto`
--
*/

ALTER TABLE `Producto`
  ADD PRIMARY KEY (`codigo`);



/*
--
-- Indices de la tabla `Proveedor`
--
*/

ALTER TABLE `Proveedor`
  ADD PRIMARY KEY (`id`);



/*
--
-- Indices de la tabla `Ribbon`
--
*/

ALTER TABLE `Ribbon`
  ADD PRIMARY KEY (`codigo`);



/*
--
-- Indices de la tabla `Rodillo`
--
*/

ALTER TABLE `Rodillo`
  ADD PRIMARY KEY (`codigo`);



/*
--
-- Indices de la tabla `Sujetador`
--
*/

ALTER TABLE `Sujetador`
  ADD PRIMARY KEY (`codigo`);



/*
--
-- Indices de la tabla `Tinta`
--
*/

ALTER TABLE `Tinta`
  ADD PRIMARY KEY (`codigo`);




/*
--
-- Indices de la tabla `Unidades`
--
*/

ALTER TABLE `Unidades`
  ADD PRIMARY KEY (`id`);



/*
--
-- Indices de la tabla `Vendedor`
--
*/

ALTER TABLE `Vendedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);



/*
--
-- Indices de la tabla `Zona`
--
*/

ALTER TABLE `Zona`
  ADD PRIMARY KEY (`id`);





















/*
--
-- AUTO_INCREMENT de las tablas volcadas
--
*/



/*
--
-- AUTO_INCREMENT de la tabla `Administrador`
--
*/

ALTER TABLE `Administrador`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Cliente`
--
*/

ALTER TABLE `Cliente`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Comentario`
--
*/

ALTER TABLE `Comentario`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Contacto`
--
*/

ALTER TABLE `Contacto`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Direccion`
--
*/

ALTER TABLE `Direccion`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Empresa`
--
*/

ALTER TABLE `Empresa`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `EvaluacionServicio`
--
*/

ALTER TABLE `EvaluacionServicio`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `EvaluacionWeb`
--
*/

ALTER TABLE `EvaluacionWeb`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Medida`
--
*/

ALTER TABLE `Medida`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Pedido`
--
*/

ALTER TABLE `Pedido`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Permiso`
--
*/

ALTER TABLE `Permiso`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Pregunta`
--
*/

ALTER TABLE `Pregunta`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Proveedor`
--
*/

ALTER TABLE `Proveedor`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;;



/*
--
-- AUTO_INCREMENT de la tabla `Unidades`
--
*/

ALTER TABLE `Unidades`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Vendedor`
--
*/

ALTER TABLE `Vendedor`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;



/*
--
-- AUTO_INCREMENT de la tabla `Zona`
--
*/

ALTER TABLE `Zona`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;


























/*
--
-- Restricciones para tablas volcadas
--
*/



/*
--
-- Filtros para la tabla `Administrador_Permiso`
-- 
*/
ALTER TABLE `Administrador_Permiso`
  ADD CONSTRAINT `Administrador_Permiso_administradorID_fk1` FOREIGN KEY (`administradorID`) REFERENCES `Administrador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Administrador_Permiso_permisoID_fk2` FOREIGN KEY (`permisoID`) REFERENCES `Permiso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Aguja`
-- 
*/
ALTER TABLE `Aguja`
  ADD CONSTRAINT `Aguja_codigo_fk1` FOREIGN KEY (`codigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `AtaCable`
-- 
*/
ALTER TABLE `AtaCable`
  ADD CONSTRAINT `AtaCable_codigo_fk1` FOREIGN KEY (`codigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AtaCable_medida_fk2` FOREIGN KEY (`medida`) REFERENCES `Medida` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Aplicador`
-- 
*/
ALTER TABLE `Aplicador`
  ADD CONSTRAINT `Aplicador_codigo_fk1` FOREIGN KEY (`codigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Cliente`
-- 
*/
ALTER TABLE `Cliente`
  ADD CONSTRAINT `Cliente_empresaID_fk1` FOREIGN KEY (`empresaID`) REFERENCES `Empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Comentario`
-- 
*/
ALTER TABLE `Comentario`
  ADD CONSTRAINT `Comentario_pedidoID_fk1` FOREIGN KEY (`pedidoID`) REFERENCES `Pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Direccion`
-- 
*/
ALTER TABLE `Direccion`
  ADD CONSTRAINT `Direccion_empresaID_fk1` FOREIGN KEY (`empresaID`) REFERENCES `Empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Empresa`
-- 
*/
ALTER TABLE `Empresa`
  ADD CONSTRAINT `Empresa_zonaID_fk1` FOREIGN KEY (`zonaID`) REFERENCES `Zona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Etiqueta`
-- 
*/
ALTER TABLE `Etiqueta`
  ADD CONSTRAINT `Etiqueta_codigo_fk1` FOREIGN KEY (`codigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Etiqueta_medida_fk2` FOREIGN KEY (`medida`) REFERENCES `Medida` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Etiquetadora`
-- 
*/
ALTER TABLE `Etiquetadora`
  ADD CONSTRAINT `Etiquetadora_codigo_fk1` FOREIGN KEY (`codigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Etiquetadora_medida_fk2` FOREIGN KEY (`medida`) REFERENCES `Medida` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `EvaluacionServicio`
-- 
*/
ALTER TABLE `EvaluacionServicio`
  ADD CONSTRAINT `EvaluacionServicio_pedidoID_fk1` FOREIGN KEY (`pedidoID`) REFERENCES `Pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Impresora`
-- 
*/
ALTER TABLE `Impresora`
  ADD CONSTRAINT `Impresora_codigo_fk1` FOREIGN KEY (`codigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Medida`
-- 
*/
ALTER TABLE `Medida`
  ADD CONSTRAINT `Medida_unidadesID_fk1` FOREIGN KEY (`unidadesID`) REFERENCES `Unidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Pedido`
-- 
*/
ALTER TABLE `Pedido`
  ADD CONSTRAINT `Pedido_clienteID_fk1` FOREIGN KEY (`clienteID`) REFERENCES `Cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Pedido_Producto`
-- 
*/
ALTER TABLE `Pedido_Producto`
  ADD CONSTRAINT `Pedido_Producto_pedidoID_fk1` FOREIGN KEY (`pedidoID`) REFERENCES `Pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Pedido_Producto_codigo_fk2` FOREIGN KEY (`productoCodigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Producto`
-- 
*/
ALTER TABLE `Producto`
  ADD CONSTRAINT `Producto_proveedorID_fk1` FOREIGN KEY (`proveedorID`) REFERENCES `Proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Ribbon`
-- 
*/
ALTER TABLE `Ribbon`
  ADD CONSTRAINT `Ribbon_codigo_fk1` FOREIGN KEY (`codigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Ribbon_medida_fk2` FOREIGN KEY (`medida`) REFERENCES `Medida` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Rodillo`
-- 
*/
ALTER TABLE `Rodillo`
  ADD CONSTRAINT `Rodillo_codigo_fk1` FOREIGN KEY (`codigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Servicio_Pregunta`
-- 
*/
ALTER TABLE `Servicio_Pregunta`
  ADD CONSTRAINT `Servicio_Pregunta_servicioID_fk1` FOREIGN KEY (`servicioID`) REFERENCES `EvaluacionServicio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Servicio_Pregunta_preguntaID_fk2` FOREIGN KEY (`preguntaID`) REFERENCES `Pregunta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Sujetador`
-- 
*/
ALTER TABLE `Sujetador`
  ADD CONSTRAINT `Sujetador_codigo_fk1` FOREIGN KEY (`codigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Tinta`
-- 
*/
ALTER TABLE `Tinta`
  ADD CONSTRAINT `Tinta_codigo_fk1` FOREIGN KEY (`codigo`) REFERENCES `Producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Vendedor`
-- 
*/
ALTER TABLE `Vendedor`
  ADD CONSTRAINT `Vendedor_zonaID_fk1` FOREIGN KEY (`zonaID`) REFERENCES `Zona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Vendedor_Permiso`
-- 
*/
ALTER TABLE `Vendedor_Permiso`
  ADD CONSTRAINT `Vendedor_Permiso_vendedorID_fk1` FOREIGN KEY (`vendedorID`) REFERENCES `Vendedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Vendedor_Permiso_permisoID_fk2` FOREIGN KEY (`permisoID`) REFERENCES `Permiso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*
--
-- Filtros para la tabla `Web_Pregunta`
-- 
*/
ALTER TABLE `Web_Pregunta`
  ADD CONSTRAINT `Web_Pregunta_webID_fk1` FOREIGN KEY (`webID`) REFERENCES `EvaluacionWeb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Web_Pregunta_preguntaID_fk2` FOREIGN KEY (`preguntaID`) REFERENCES `Pregunta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;







CREATE VIEW `ListarClientesView` AS (
    SELECT  `zona`.`id` AS `id`, 
            `empresa`.`id` AS `empresaID`, `empresa`.`nombre` AS `empresa`,
            `cliente`.`id` AS `clienteID`, CONCAT(`cliente`.`nombre`, ' ', `cliente`.`apellidoP`) AS `nombres`,
            `cliente`.`correo` 
    FROM `cliente` 
    JOIN `empresa` ON `empresa`.`id` = `cliente`.`empresaID`
    LEFT JOIN `zona` ON `zona`.`id` = `empresa`.`zonaID`
);