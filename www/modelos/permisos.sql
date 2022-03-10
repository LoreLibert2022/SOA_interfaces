
CREATE TABLE `permisos` (
  `id_Permiso` int(11) UNSIGNED NOT NULL,
  `id_Opcion` int(11) UNSIGNED DEFAULT NULL,
  `num_Permiso` int(2) UNSIGNED DEFAULT NULL,
  `permiso` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



  
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_Permiso`),
  ADD KEY `fk_permisos_menus_idx` (`id_Opcion`);
  
ALTER TABLE `permisos`
  MODIFY `id_Permiso` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;



CREATE TABLE `permisosusuario` (
  `id_Permiso` int(11) UNSIGNED NOT NULL,
  `id_Usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

ALTER TABLE `permisosusuario`
  ADD PRIMARY KEY (`id_Permiso`,`id_Usuario`);

CREATE TABLE `roles` (
  `id_Rol` int(11) NOT NULL,
  `rol` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


  
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_Rol`);
  
ALTER TABLE `roles`
  MODIFY `id_Rol` int(11) NOT NULL AUTO_INCREMENT;

  
CREATE TABLE `permisosrol` (
  `id_Permiso` int(11) UNSIGNED NOT NULL,
  `id_Rol` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

ALTER TABLE `permisosrol`
  ADD PRIMARY KEY (`id_Permiso`,`id_Rol`);

CREATE TABLE `rolesusuario` (
  `id_Rol` int(11) UNSIGNED NOT NULL,
  `id_Usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

ALTER TABLE `rolesusuario`
  ADD PRIMARY KEY (`id_Rol`,`id_Usuario`),
  ADD KEY `fk_rolesusuarios_roles1_idx` (`id_Rol`),
  ADD KEY `fk_rolesusuarios_usuarios1_idx` (`id_Usuario`);


INSERT INTO `roles` (`id_Rol`, `rol`) VALUES
(1, 'Visitante'),
(2, 'Administrador');


INSERT INTO permisos (id_Opcion, num_Permiso, permiso) SELECT id_Opcion, '1' as num_Permiso, 'Consultar' as permiso FROM menus;
INSERT INTO permisos (id_Opcion, num_Permiso, permiso) SELECT id_Opcion, '2' as num_Permiso, 'Crear' as permiso FROM menus;
INSERT INTO permisos (id_Opcion, num_Permiso, permiso) SELECT id_Opcion, '3' as num_Permiso, 'Editar' as permiso FROM menus;
INSERT INTO permisos (id_Opcion, num_Permiso, permiso) SELECT id_Opcion, '4' as num_Permiso, 'Borrar' as permiso FROM menus;

INSERT INTO rolesusuario (id_Rol, id_Usuario) SELECT '1' as id_Rol, id_Usuario FROM usuarios Where 1=1;
INSERT INTO `rolesusuario` (`id_Rol`, `id_Usuario`) VALUES (2, 2);

INSERT INTO permisosrol (id_Permiso, id_Rol) SELECT id_Permiso, '2' as id_Rol FROM permisos;

