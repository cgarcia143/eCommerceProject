

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `categoria_producto` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `categoria_producto` (`id_categoria`, `nombre`, `descripcion`) VALUES
(2, 'plastico', 'plastico');



CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nom_ciudad` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `ciudad` (`id_ciudad`, `nom_ciudad`) VALUES
(7600, 'Cali');



CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int(11) NOT NULL,
  `venta` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `categoria` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `proveedor` int(11) NOT NULL,
  `estado` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `proveedores` (
  `id_pro` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `nit` int(20) NOT NULL,
  `estado` enum('on','off') NOT NULL,
  `correo` varchar(60) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `proveedores` (`id_pro`, `nombre`, `nit`, `estado`, `correo`, `direccion`, `telefono`) VALUES
(2, 'inge', 11445522, 'on', 'inge@hot.acom', 'cra49#12-00', 336655);



CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `roles` (`id_roles`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente'),
(3, 'empleado');


CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `cedula` int(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `tipo_doc` varchar(45) NOT NULL,
  `estado` enum('on','off') NOT NULL,
  `fecha_nmto` date NOT NULL,
  `telefono` int(12) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `genero` enum('male','female') NOT NULL,
  `password` varchar(200) NOT NULL,
  `rol` int(11) NOT NULL,
  `ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valor_total` decimal(20,0) NOT NULL,
  `tipo_pago` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id_categoria`);


ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);


ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `FK_detPro` (`producto`),
  ADD KEY `FK_detVen` (`venta`);


ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `FK_catPro` (`categoria`),
  ADD KEY `FK_provPro` (`proveedor`);


ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_pro`);


ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `FK_rolUser` (`rol`),
  ADD KEY `FK_cityUser` (`ciudad`);


ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `FK_ventUs` (`user`);

ALTER TABLE `categoria_producto`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `proveedores`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `FK_detPro` FOREIGN KEY (`producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detVen` FOREIGN KEY (`venta`) REFERENCES `ventas` (`id_ventas`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `producto`
  ADD CONSTRAINT `FK_catPro` FOREIGN KEY (`categoria`) REFERENCES `categoria_producto` (`id_categoria`),
  ADD CONSTRAINT `FK_provPro` FOREIGN KEY (`proveedor`) REFERENCES `proveedores` (`id_pro`);


ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_cityUser` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_rolUser` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_roles`);


ALTER TABLE `ventas`
  ADD CONSTRAINT `FK_ventUs` FOREIGN KEY (`user`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
