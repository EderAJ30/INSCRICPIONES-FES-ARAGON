--1 index inscripcion

-- [AUTH] Buscar el usuario autenticado en el sistema
SELECT * FROM `Usuario` 
WHERE `id_usuario` = 5 
LIMIT 1;

-- [POLIMORFISMO] Resolver la relación $usuario->perfil (Mapeo dinámico Alumno)
SELECT * FROM `Alumno` 
WHERE `id_alumno` = 42;

-- [PERIODO ACTIVO] Obtener el periodo escolar vigente para el ciclo de inscripciones
SELECT * FROM `PeriodoEscolar` 
WHERE `estatus_activo` = 1 
LIMIT 1;
-- *Nota: Esta consulta retorna los datos del periodo con id_periodo = 3*


-- [CHECK COMPROBANTE] Determinar si el alumno ya cuenta con un folio bloqueado en este ciclo
SELECT EXISTS(
    SELECT 1 
    FROM `ComprobanteInscripcion` 
    WHERE `id_alumno` = 42 
        AND `id_periodo` = 3
) AS `ya_inscrito`;

-- [GRUPOS] Cargar la lista base de grupos asociados estrictamente al periodo escolar activo
SELECT * FROM `Grupo` 
WHERE `id_periodo` = 3;
-- *Nota: Supongamos que esta consulta recolecta los grupos con id_grupo: (10, 11)*

--2 store inscripciones

-- [VALIDACIÓN] Verificar individualmente si cada uno de los grupos seleccionados existe en la base de datos
SELECT COUNT(*) FROM `Grupo` WHERE `id_grupo` = 10;
SELECT COUNT(*) FROM `Grupo` WHERE `id_grupo` = 11;
SELECT COUNT(*) FROM `Grupo` WHERE `id_grupo` = 12;

-- [AUTH] Recuperar el perfil del Alumno asociado al Usuario logueado (Relación polimórfica)
SELECT * FROM `Alumno` WHERE `id_alumno` = 42;

-- [PERIODO ACTIVO] Buscar las fechas y el ID del ciclo escolar configurado como activo
SELECT * FROM `PeriodoEscolar` WHERE `estatus_activo` = 1 LIMIT 1;


-- [VALIDACIÓN ANTE DUPLICADOS] Comprobar si el alumno ya cuenta con un comprobante emitido para este periodo
SELECT EXISTS(
    SELECT 1 
    FROM `ComprobanteInscripcion` 
    WHERE `id_alumno` = 42 
        AND `id_periodo` = 3
) AS `ya_inscrito`;


-- [CARGA DE HORARIOS] Traer los grupos solicitados y ejecutar un Eager Loading para evaluar empalmes en PHP
SELECT * FROM `Grupo` WHERE `id_grupo` IN (10, 11, 12);

-- Consulta de hidratación disparada por ->with('horario_grupos')
SELECT * FROM `HorarioGrupo` WHERE `id_grupo` IN (10, 11, 12);

-- Iniciar la transacción para asegurar que no se inscriban materias parciales si el servidor se interrumpe
START TRANSACTION;

-- [INSCRIPCIÓN - GRUPO 10] Insertar la relación del alumno con su primer grupo seleccionado
INSERT INTO `Inscripcion` (`id_alumno`, `id_grupo`, `estatus_inscripcion`, `fecha_inscripcion`, `calificacion_final`)
VALUES (42, 10, 'Regular', NOW(), NULL);

-- [INSCRIPCIÓN - GRUPO 11] Insertar la relación del alumno con su segundo grupo seleccionado
INSERT INTO `Inscripcion` (`id_alumno`, `id_grupo`, `estatus_inscripcion`, `fecha_inscripcion`, `calificacion_final`)
VALUES (42, 11, 'Regular', NOW(), NULL);

-- [INSCRIPCIÓN - GRUPO 12] Insertar la relación del alumno con su tercer grupo seleccionado
INSERT INTO `Inscripcion` (`id_alumno`, `id_grupo`, `estatus_inscripcion`, `fecha_inscripcion`, `calificacion_final`)
VALUES (42, 12, 'Regular', NOW(), NULL);


-- [COMPROBANTE] Crear la cabecera final de verificación con el folio y el sello criptográfico SHA-256
INSERT INTO `ComprobanteInscripcion` (`folio_verificacion`, `id_alumno`, `id_periodo`, `sello_digital`, `fecha_emision`)
VALUES ('FES_6648cf492b451', 42, 3, '8f435b806d203930e1676648cf492b4518f435b806d203930e1673892019ab3f', NOW());


-- Confirmar la transacción para aplicar de forma permanente todas las inserciones simultáneamente
COMMIT;

--3 resumen inscripciones

-- [FIND OR FAIL] Buscar el comprobante solicitado por su llave primaria
SELECT * FROM `ComprobanteInscripcion` 
WHERE `id_comprobante` = 7 
LIMIT 1;

-- [EAGER LOADING] Hidratar la relación 'alumno' declarada en el 'with'
SELECT * FROM `Alumno` 
WHERE `id_alumno` IN (42);

-- [AUTH] Si el perfil del usuario autenticado no está en memoria, Laravel resuelve la relación polimórfica
SELECT * FROM `Usuario` WHERE `id_usuario` = 5 LIMIT 1;
SELECT * FROM `Alumno` WHERE `id_alumno` = 42;

-- [MAIN QUERY] Obtener las inscripciones del alumno filtradas por el periodo del comprobante
SELECT * FROM `Inscripcion` 
WHERE `id_alumno` = 42 
    AND EXISTS (
        SELECT 1 
        FROM `Grupo` 
        WHERE `Grupo`.`id_grupo` = `Inscripcion`.`id_grupo` 
        AND `Grupo`.`id_periodo` = 3
    );

-- [EAGER LOADING] Traer los grupos involucrados en las inscripciones obtenidas
SELECT * FROM `Grupo` 
WHERE `id_grupo` IN (10, 11, 12);

-- [EAGER LOADING ANIDADO] Traer las asignaturas correspondientes a esos grupos
SELECT * FROM `Asignatura` 
WHERE `id_asignatura` IN (104, 105);

-- [EAGER LOADING ANIDADO] Traer los profesores asignados a esos grupos
SELECT * FROM `Profesor` 
WHERE `id_profesor` IN (8, 9);

--4 descarga comprobante

-- [FIND OR FAIL] Obtener los datos del comprobante para verificar su existencia
SELECT * FROM `ComprobanteInscripcion` 
WHERE `id_comprobante` = 7 
LIMIT 1;

-- [EAGER LOADING] Traer de forma anticipada los datos del Alumno dueño del comprobante
SELECT * FROM `Alumno` 
WHERE `id_alumno` IN (42);

-- [AUTH] Si la sesión no tiene cargado el perfil, se resuelve la relación polimórfica del usuario logueado
SELECT * FROM `Usuario` WHERE `id_usuario` = 5 LIMIT 1;
SELECT * FROM `Alumno` WHERE `id_alumno` = 42;

-- [MAIN QUERY] Filtrar las inscripciones del alumno cruzándolas con el periodo escolar del comprobante
SELECT * FROM `Inscripcion` 
WHERE `id_alumno` = 42 
    AND EXISTS (
        SELECT 1 
        FROM `Grupo` 
        WHERE `Grupo`.`id_grupo` = `Inscripcion`.`id_grupo` 
        AND `Grupo`.`id_periodo` = 3
    );

SELECT * FROM `Grupo` 
WHERE `id_grupo` IN (10, 11, 12);

SELECT * FROM `Asignatura` 
WHERE `id_asignatura` IN (104, 105);

SELECT * FROM `Profesor` 
WHERE `id_profesor` IN (8, 9);

--5 

--6

--7

--8