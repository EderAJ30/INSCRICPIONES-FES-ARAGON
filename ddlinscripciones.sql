SET NAMES 'utf8mb4';
DROP DATABASE IF EXISTS inscripciones;
CREATE DATABASE inscripciones CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE inscripciones;

CREATE TABLE `Carrera` (
    `id_carrera` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nombre_carrera` VARCHAR(100) NOT NULL UNIQUE,
    `sistema` VARCHAR(30) NOT NULL,
    `creditos_obligatorios` INT UNSIGNED NOT NULL,
    `creditos_optativos` INT UNSIGNED NOT NULL,
    `limite_semestres` INT UNSIGNED NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `Profesor` (
    `id_profesor` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `numero_empleado` VARCHAR(10) NULL UNIQUE,
    `nombre` VARCHAR(50) NOT NULL,
    `apellido_paterno` VARCHAR(50) NOT NULL,
    `apellido_materno` VARCHAR(50) NULL,
    `correo_institucional` VARCHAR(100) NOT NULL UNIQUE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `Asignatura` (
    `id_asignatura` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `clave_asignatura` VARCHAR(10) NOT NULL UNIQUE,
    `nombre_asignatura` VARCHAR(100) NOT NULL,
    `creditos_asignatura` INT UNSIGNED NOT NULL,
    `creditos_laboratorio` INT UNSIGNED NOT NULL,
    `tipo_asignatura` VARCHAR(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `PeriodoEscolar` (
    `id_periodo` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nombre_periodo` VARCHAR(20) NOT NULL UNIQUE,
    `fecha_inicio` DATE NOT NULL,
    `fecha_fin` DATE NOT NULL,
    `estatus_activo` TINYINT(1) NOT NULL DEFAULT 1
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `Aula` (
    `id_aula` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nombre_aula` VARCHAR(50) NOT NULL,
    `edificio` VARCHAR(50) NOT NULL,
    `capacidad_maxima` INT UNSIGNED NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `Rol` (
    `id_rol` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nombre_rol` VARCHAR(30) NOT NULL UNIQUE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `Alumno` (
    `id_alumno` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `numero_cuenta` VARCHAR(10) NOT NULL UNIQUE,
    `nombre` VARCHAR(50) NOT NULL,
    `apellido_paterno` VARCHAR(50) NOT NULL,
    `apellido_materno` VARCHAR(50) NULL,
    `correo_institucional` VARCHAR(100) NOT NULL UNIQUE,
    `semestre_inscrito` INT UNSIGNED NOT NULL,
    `turno` VARCHAR(20) NOT NULL,
    `anio_ingreso` INT UNSIGNED NOT NULL,
    `promedio` DECIMAL(3, 1) NULL COMMENT 'Campo desnormalizado por rendimiento',
    `estatus_academico` INT NOT NULL,
    `sexo` CHAR(1) NOT NULL,
    `id_carrera` INT UNSIGNED NOT NULL,
    CONSTRAINT `fk_alumno_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `Carrera` (`id_carrera`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `Grupo` (
    `id_grupo` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nombre_grupo` VARCHAR(10) NOT NULL,
    `id_asignatura` INT UNSIGNED NOT NULL,
    `id_profesor` INT UNSIGNED NOT NULL,
    `id_periodo` INT UNSIGNED NOT NULL,
    `semestre_nivel` INT UNSIGNED NOT NULL,
    CONSTRAINT `fk_grupo_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `Asignatura` (`id_asignatura`) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT `fk_grupo_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `Profesor` (`id_profesor`) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT `fk_grupo_periodo` FOREIGN KEY (`id_periodo`) REFERENCES `PeriodoEscolar` (`id_periodo`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `HorarioGrupo` (
    `id_horario` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `id_grupo` INT UNSIGNED NOT NULL,
    `id_aula` INT UNSIGNED NOT NULL,
    `dia_semana` TINYINT UNSIGNED NOT NULL COMMENT '1=Lunes, 2=Martes, 3=Miércoles, 4=Jueves, 5=Viernes, 6=Sábado',
    `hora_inicio` TIME NOT NULL,
    `hora_fin` TIME NOT NULL,
    CONSTRAINT `fk_horario_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `Grupo` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_horario_aula` FOREIGN KEY (`id_aula`) REFERENCES `Aula` (`id_aula`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `Inscripcion` (
    `id_inscripcion` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `id_alumno` INT UNSIGNED NOT NULL,
    `id_grupo` INT UNSIGNED NOT NULL,
    `fecha_inscripcion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `calificacion_final` DECIMAL(4, 2) NULL,
    `estatus_inscripcion` VARCHAR(20) NOT NULL DEFAULT 'Regular' COMMENT 'Regular, Baja, Pendiente',
    CONSTRAINT `fk_inscripcion_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `Alumno` (`id_alumno`) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT `fk_inscripcion_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `Grupo` (`id_grupo`) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT `uq_alumno_grupo` UNIQUE (`id_alumno`, `id_grupo`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `ComprobanteInscripcion` (
    `id_comprobante` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `folio_verificacion` VARCHAR(40) NOT NULL UNIQUE,
    `id_alumno` INT UNSIGNED NOT NULL,
    `id_periodo` INT UNSIGNED NOT NULL,
    `fecha_emision` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `sello_digital` VARCHAR(255) NOT NULL,
    CONSTRAINT `fk_comprobante_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `Alumno` (`id_alumno`) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT `fk_comprobante_periodo` FOREIGN KEY (`id_periodo`) REFERENCES `PeriodoEscolar` (`id_periodo`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `Usuario` (
    `id_usuario` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `correo_electronico` VARCHAR(100) NOT NULL UNIQUE,
    `contrasena_hash` VARCHAR(255) NOT NULL,
    `id_rol` INT UNSIGNED NOT NULL,
    `asociable_id` INT UNSIGNED NULL,
    `asociable_type` VARCHAR(50) NULL,
    CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `Rol` (`id_rol`) ON DELETE RESTRICT ON UPDATE CASCADE,
    INDEX `idx_usuario_asociable` (`asociable_type`, `asociable_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
SET FOREIGN_KEY_CHECKS = 1;