
CREATE DATABASE dymo;

/*
--
-- Estructura de tabla para la tabla `Administrador`
--
*/

CREATE TABLE `Administrador` (
  `id` 				 int 		                               NOT NULL,
  `nombre` 		 varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoP`  varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoM`  varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `usuario` 	 varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `permisos` 	 int 		                               NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*
--
-- Volcado de datos para la tabla `Administrador`
--
*/

INSERT INTO `Administrador` (`id`, `nombre`, `apellidoP`, `apellidoM`, `usuario`, `contrasena`, `permisos`) VALUES
(01, 'Jesús Emmanuel', 'Zetina', 'Chevez', 'ZCJO151861A', 'contraseña', 00),
(02, 'Juan Carlos', 'Gerónimo', 'Padilla', 'GPJO151861A', 'admin', 00);


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
  `id` 				    int 		                              NOT NULL,
  `nombre` 			  varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoP` 		varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoM` 		varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `usuario` 		  varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` 		varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `permisos` 		  int 		                              NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*
--
-- Volcado de datos para la tabla `Alumno`
--
*/

INSERT INTO `Vendedor` (`id`, `nombre`, `apellidoP`, `apellidoM`, `usuario`, `contrasena`, `permisos`) VALUES
(01, 'Jesús Emmanuel', 'Zetina', 'Chevez', 'ZCJO151861V', 'contraseña', 01),
(02, 'Luis Fernando', 'Gerónimo', 'Carranza', 'GCLO151861V', 'contraseña', 02);



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------




--
-- Estructura de tabla para la tabla `Cliente`
--
*/

CREATE TABLE `Cliente` (
  `id` 				  int 		                              NOT NULL,
  `nombre` 			varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoP` 	varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoM` 	varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `correo`			varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` 	varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `empresaID` 	int 		                              NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*
--
-- Volcado de datos para la tabla `Cliente`
--
*/

INSERT INTO `Cliente` (`id`, `nombre`, `apellidoP`, `apellidoM`, `correo`, `contrasena`, `empresaID`) VALUES
(01, 'Jesús Emmanuel', 'Zetina', 'Chevez', 'zcjo151173@upemor.edu.mx', 'contraseña', 01),
(02, 'Luis Fernando', 'Gerónimo', 'Carranza', 'gclo151861@upemor.edu.mx', 'contraseña', 02);



/*
----------------------------------------------------------
----------------------------------------------------------
----------------------------------------------------------


--
-- Estructura de tabla para la tabla `Empresa`
--
*/

CREATE TABLE `Empresa` (
  `id` 				  int 		                              NOT NULL,
  `nombre` 			varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` 		varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*
--
-- Volcado de datos para la tabla `Empresa`
--
*/

INSERT INTO `Empresa` (`id`, `nombre`, `telefono`) VALUES
(01, 'Dymo_1', '7771234567'),
(02, 'Dymo_2', '7777654321');









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
-- Indices de la tabla `Vendedor`
--
*/

ALTER TABLE `Vendedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);



/*
--
-- Indices de la tabla `Cliente`
--
*/

ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `empresaID` (`empresaID`);



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
-- AUTO_INCREMENT de las tablas volcadas
--
*/

/*
--
-- AUTO_INCREMENT de la tabla `Administrador`
--
*/
ALTER TABLE `Administrador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


/*
--
-- AUTO_INCREMENT de la tabla `Vendedor`
--
*/
ALTER TABLE `Vendedor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


/*
--
-- AUTO_INCREMENT de la tabla `Cliente`
--
*/
ALTER TABLE `Cliente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


/*
--
-- AUTO_INCREMENT de la tabla `Empresa`
--
*/
ALTER TABLE `Empresa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;




/*
--
-- Restricciones para tablas volcadas
--
*/

/*
--
-- Filtros para la tabla `Cliente`
-- 
*/
ALTER TABLE `Cliente`
  ADD CONSTRAINT `Cliente_ibfk_1` FOREIGN KEY (`empresaID`) REFERENCES `Empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
