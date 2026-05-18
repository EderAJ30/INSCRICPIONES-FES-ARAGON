INSERT INTO Carrera (id_carrera, nombre_carrera, sistema, creditos_obligatorios, creditos_optativos, limite_semestres) VALUES 
(1, 'Ingeniería en Computación', 'Escolarizado', 348, 48, 7),
(2, 'Ingeniería Civil', 'Escolarizado', 357, 63, 7),
(3, 'Ingeniería Eléctrica Electrónica', 'Escolarizado', 360, 60, 7),
(4, 'Ingeniería Industrial', 'Escolarizado', 400, 40, 7),
(5, 'Ingeniería Mecánica', 'Escolarizado', 370, 50, 7),
(6, 'Comunicación y Periodismo', 'Escolarizado', 360, 60, 7),
(7, 'Derecho', 'Escolarizado', 432, 18, 7),
(8, 'Economía', 'Escolarizado', 293, 36, 7),
(9, 'Planificación para el Desarrollo Agropecuario', 'Escolarizado', 320, 40, 7),
(10, 'Relaciones Internacionales', 'Escolarizado', 320, 40, 7),
(11, 'Sociología', 'Escolarizado', 258, 48, 7),
(12, 'Arquitectura', 'Escolarizado', 430, 40, 7),
(13, 'Diseño Industrial', 'Escolarizado', 370, 50, 7),
(14, 'Pedagogía', 'Escolarizado', 236, 80, 7),
(16, 'Derecho SUAyED', 'SUAyED', 415, 15, 6),                     -- Nombre diferenciado para índice UNIQUE
(17, 'Economía SUAyED', 'SUAyED', 293, 36, 6),                    -- Nombre diferenciado para índice UNIQUE
(18, 'Relaciones Internacionales SUAyED', 'SUAyED', 320, 40, 6);  -- Nombre diferenciado para índice UNIQUE

INSERT INTO Profesor (id_profesor, nombre, apellido_paterno, apellido_materno, correo_institucional) VALUES 
(1, 'SERGIO', 'HERNANDEZ', 'LOPEZ', 'sergiohernandezhel@aragon.unam.mx'),
(2, 'GERARDO', 'GONZALEZ', 'HERNANDEZ', 'gerardogonzalezgoh@aragon.unam.mx'),
(3, 'JUAN', 'GASTALDI', 'PEREZ', 'juangastaldi9a@aragon.unam.mx'),
(4, 'JONATHAN', 'MARTINEZ', 'ROMERO', 'jonathanmartinezky7@aragon.unam.mx'),
(5, 'JUAN MANUEL', 'ARELLANO', 'OROZCO', 'manuelarellanoa6@aragon.unam.mx'),
(6, 'BERENICE ITZEL', 'FALCON', 'ARELLANO', 'berenicefalconlk6@aragon.unam.mx'),
(7, 'MIRIAM', 'CRUZ', 'ORTIZ', 'miriam30@aragon.unam.mx'),
(8, 'ARTURO', 'RODRIGUEZ', 'GARCIA', 'arturorodriguez35@aragon.unam.mx'),
(9, 'JUAN CARLOS', 'RAMOS', 'MARQUEZ', 'juanramosram@aragon.unam.mx'),
(10, 'EVERARDO', 'SOLIS', 'ALCANTAR', 'everardosolisr0@aragon.unam.mx'),
(11, 'CARLOS ALBERTO', 'PARRALES', 'CASTAÑEDA', 'carlosparralesgi2@aragon.unam.mx'),
(12, 'LUIS ARMANDO', 'VIEYRA', 'REBOYO', 'luisvieyra26@aragon.unam.mx'),
(13, 'ALFREDO', 'MONDRAGON', 'ESCOBAR', 'alfredomondragontg8@aragon.unam.mx'),
(14, 'MARIA ANGELICA', 'FERIA', 'VICTORIA', 'angelicaferiaf6@aragon.unam.mx'),
(15, 'VICTOR MANUEL', 'SANCHEZ', 'SANCHEZ', 'victorsanchez27@aragon.unam.mx'),
(16, 'JORGE ARTURO', 'LOPEZ', 'HERNANDEZ', 'jorgelopez91@aragon.unam.mx'),
(17, 'ROBERTO', 'BLANCO', 'BAUTISTA', 'robertoblancoir4@aragon.unam.mx'),
(18, 'MA. DEL PILAR', 'GARCIA', 'VILLANUEVA', 'magarciap9@aragon.unam.mx'),
(19, 'ERNESTO', 'PEÑALOZA', 'ROMERO', 'ernestopenalozaffa@aragon.unam.mx'),
(20, 'JESUS ANGEL', 'ROMERO', 'ANDALON', 'jesusandalonsa@aragon.unam.mx'),
(21, 'JOEL ALFREDO', 'PEREZ', 'VALDES', 'joelperezpev@aragon.unam.mx'),
(22, 'MIGUEL ANGEL', 'SANCHEZ', 'HERNANDEZ', 'miguelsanchezt32@aragon.unam.mx'),
(23, 'GABRIEL', 'ORTIZ', 'CORDERO', 'gabrielortizoic@aragon.unam.mx'),
(24, 'ALEJANDRO', 'PEREZ', 'GUZMAN', 'alejandropereze9@aragon.unam.mx'),
(25, 'JORGE LUIS', 'CANDELARIO', 'ALAVEZ', 'jorgecandelariocaa@aragon.unam.mx'),
(26, 'BLANCA PAMELA', 'ABURTO', 'CAMACHO', 'blancaaburto6c4@aragon.unam.mx'),
(27, 'ALEJANDRO', 'SUAREZ', 'HERRERA', 'alejandrosuarezsuh@aragon.unam.mx'),
(28, 'VICTOR MANUEL', 'SANCHEZ', 'MORALES', 'victorsanchezkd6@aragon.unam.mx'),
(29, 'CLARA YAHAIRA', 'ISLAS', 'HERNANDEZ', 'yahairaislasv6@aragon.unam.mx'),
(30, 'MATILDE', 'COLUNGA', 'VAZQUEZ', 'matildecolungacov@aragon.unam.mx'),
(31, 'AARON', 'VELASCO', 'AGUSTIN', 'aaronvelascovea@aragon.unam.mx'),
(32, 'BELEN ANAID', 'ALBA', 'VILLA', 'belenalba749@aragon.unam.mx'),
(33, 'MARIA GUADALUPE', 'ALMANZAR', 'VAZQUEZ', 'guadalupealmanzar1a@aragon.unam.mx'),
(34, 'RAFAEL', 'GONZALEZ', 'BETANCOURT', 'rafaelgonzalezma2@aragon.unam.mx'),
(35, 'SALOMON', 'HERNANDEZ', 'GALICIA', 'salomongaliciar5@aragon.unam.mx'),
(36, 'EFREN', 'GUERRERO', 'SANTAMARIA', 'efrenguerreroc91@aragon.unam.mx'),
(37, 'JESUS', 'HERNANDEZ', 'CABRERA', 'jesushernandezls7@aragon.unam.mx'),
(38, 'CUAUHTEMOC', 'CHIAPA', 'MONROY', 'cuauhtemocchiapacim@aragon.unam.mx'),
(39, 'JOSE DANIEL', 'CASTRO', 'DIAZ', 'josecastrocad@aragon.unam.mx'),
(40, 'JOSE GIL', 'JUAREZ', 'PALMA', 'giljuarezb9@aragon.unam.mx'),
(41, 'MINERVA', 'SEGURA', 'RAUDA', 'minervaseguraser@aragon.unam.mx'),
(42, 'ALMA ROSA', 'GUTIERREZ', 'CASTILLO', 'almagutierrez88@aragon.unam.mx'),
(43, 'BLANCA ESTELA', 'CRUZ', 'LUEVANO', 'blancaluevanoq9@aragon.unam.mx'),
(44, 'GABRIELLA', 'PICCINELLI', 'BOCCHI', 'gabriellapiccinelli30@aragon.unam.mx'),
(45, 'ABEL', 'VERDE', 'CRUZ', 'abelverde53@aragon.unam.mx'),
(46, 'CARLOS', 'OLIVER', 'MORALES', 'carlosolivers3@aragon.unam.mx'),
(47, 'FAUSTO', 'TORRES', 'TORRES', 'faustotorres1k8@aragon.unam.mx'),
(48, 'MARTIN', 'ORDOÑEZ', 'ROSALES', 'martinordonez7e1@aragon.unam.mx'),
(49, 'OMAR', 'MENDOZA', 'GONZALEZ', 'omarmendoza564@aragon.unam.mx'),
(50, 'CARLOS FERNANDO', 'ORTEGA', 'NAVA', 'fernandonava16@aragon.unam.mx'),
(51, 'RAFAEL', 'CANTO', 'GALLO', 'rafaelgallos4@aragon.unam.mx'),
(52, 'RAMON', 'PATIÑO', 'RODRIGUEZ', 'ramonrodriguezn9@aragon.unam.mx'),
(53, 'GLORIA SAMANTHA', 'PELCASTRE', 'RAMIREZ', 'samanthapelcastrei3@aragon.unam.mx'),
(54, 'CESAR FRANCISCO', 'GERMAN', 'ROSAS', 'cesargermanx9@aragon.unam.mx'),
(55, 'MANUEL ALEJANDRO', 'ALVAREZ', 'SORIANO', 'alejandroalvarez17@aragon.unam.mx'),
(56, 'MOISES', 'CERVANTES', 'PATIÑO', 'moisescervantes5d4@aragon.unam.mx'),
(57, 'ROBERTO MISAEL', 'SOBERANES', 'JAIME', 'misaelsoberanesr8@aragon.unam.mx'),
(58, 'NORMA', 'REYES', 'TECONTERO', 'normareyesi8@aragon.unam.mx'),
(59, 'JUAN MANUEL', 'LOPEZ', 'CARRETO', 'manuelcarreto50@aragon.unam.mx'),
(60, 'JORGE CARLOS', 'MORALES', 'GONZALEZ', 'jorgegonzalez71@aragon.unam.mx'),
(61, 'LUIS ENRIQUE', 'GONZALEZ', 'AYALA', 'enriqueayala51@aragon.unam.mx'),
(62, 'HECTOR', 'SALDAÑA', 'ALDANA', 'hectorsaldanaa5@aragon.unam.mx'),
(63, 'JUAN ANTONIO', 'VILLANUEVA', 'ORTEGA', 'juanvillanuevavio@aragon.unam.mx'),
(64, 'MARIANA', 'VERDUZCO', 'RODRIGUEZ', 'marianaverduzco89@aragon.unam.mx'),
(65, 'HIRAM EMMANUEL', 'PEREZ', 'SANCHEZ', 'hiramperezl0@aragon.unam.mx'),
(66, 'JOSE LUIS', 'RAMIREZ', 'CRUZ', 'luisramirezm0@aragon.unam.mx'),
(67, 'MARIA ELENA', 'ORTIZ', 'JIMENEZ', 'mariaortizq7@aragon.unam.mx'),
(68, 'ELIZABETH', 'JUAREZ', 'ROBLES', 'elizabethjuarezjur@aragon.unam.mx'),
(69, 'ANA CLAUDIA', 'REYES', 'CRUZ', 'claudiacruze8@aragon.unam.mx'),
(70, 'SERGIO', 'QUIROZ', 'ALMARAZ', 'sergioquirozhs3@aragon.unam.mx'),
(71, 'EDUARDO', 'PEREZ', 'PAZ', 'eduardoperez53@aragon.unam.mx'),
(72, 'DAVID JAIME', 'GONZALEZ', 'MAXINEZ', 'davidmaxinezs2@aragon.unam.mx'),
(73, 'RICARDO ARTURO', 'GUTIERREZ', 'OROZCO', 'ricardogutierrezs0@aragon.unam.mx'),
(74, 'ARCELIA', 'BERNAL', 'DIAZ', 'arceliabernal83@aragon.unam.mx'),
(75, 'MARIA GABRIELA', 'GONZALEZ', 'HERNANDEZ', 'gabrielagonzalezc7@aragon.unam.mx'),
(76, 'RODOLFO', 'VAZQUEZ', 'MORALES', 'rodolfovazquezh6@aragon.unam.mx'),
(77, 'MARCELO', 'PEREZ', 'MEDEL', 'marcelomedelq7@aragon.unam.mx'),
(78, 'MARTIN', 'HERNANDEZ', 'HERNANDEZ', 'martinhernandez5u8@aragon.unam.mx'),
(79, 'ESTEBAN', 'ARELLANO', 'RIVERA', 'estebanriverac1@aragon.unam.mx'),
(80, 'EFREN', 'LOZANO', 'MENDEZ', 'efrenlozanogg2@aragon.unam.mx'),
(81, 'JUAN CARLOS', 'CAMACHO', 'ALVAREZ', 'juancamachocaa@aragon.unam.mx'),
(82, 'MARTIN MANUEL', 'ROMERO', 'UGALDE', 'martinromerorou@aragon.unam.mx'),
(83, 'ESTEBAN', 'AYALA', 'PEÑA', 'estebanayalapxa@aragon.unam.mx'),
(84, 'JUAN MANUEL', 'HERNANDEZ', 'CONTRERAS', 'juanhernandez1z7@aragon.unam.mx'),
(85, 'JOSE ANTONIO', 'GARCIA', 'MONROY', 'josegarciay1@aragon.unam.mx'),
(86, 'JOSE MANUEL', 'QUINTERO', 'CERVANTES', 'josequinteroquc@aragon.unam.mx'),
(87, 'ENRIQUE', 'GARCIA', 'GUZMAN', 'enriquegarcia6u4@aragon.unam.mx'),
(88, 'ARTURO', 'OCAMPO', 'ALVAREZ', 'arturoocampo76@aragon.unam.mx'),
(89, 'GERARDO', 'TORRES', 'RODRIGUEZ', 'gerardotorreswa@aragon.unam.mx'),
(90, 'RICARDO ADOLFO', 'VIDAL', 'CASTRO', 'ricardovidal79@aragon.unam.mx'),
(91, 'JORGE IVAN', 'CAMPOS', 'BRAVO', 'jorgecampos47@aragon.unam.mx'),
(92, 'DZOARA IVETTE', 'ANAYA', 'MANILA', 'ivvete54@aragon.unam.mx'),
(93, 'JUDITH', 'UGALDE', 'LOPEZ', 'judithugalde86@aragon.unam.mx'),
(94, 'FELIPE DE JESUS', 'GUTIERREZ', 'LOPEZ', 'felipegutierrez25@aragon.unam.mx'),
(95, 'LEOBARDO', 'HERNANDEZ', 'AUDELO', 'leobardohernandeztn3@aragon.unam.mx'),
(96, 'AMILCAR AMADO', 'MONTERROSA', 'ESCOBAR', 'amilcarmonterrosa59@aragon.unam.mx'),
(97, 'MARCO INTI', 'GOYTIA', 'HERRERA', 'marcogoytia44@aragon.unam.mx'),
(98, 'DANIEL FERNANDO', 'PALMA', 'LOPEZ', 'fernandopalmaq6@aragon.unam.mx'),
(99, 'BENITO', 'ZUÑIGA', 'VILLEGAS', 'benitozunigalp4@aragon.unam.mx'),
(100, 'JOSE ANTONIO', 'AVILA', 'GARCIA', 'antonioavilana@aragon.unam.mx'),
(101, 'ELIO', 'VEGA', 'MUNGUIA', 'eliovegavem@aragon.unam.mx'),
(102, 'GILDA', 'GALICIA', 'RANGEL', 'gildarangelb5@aragon.unam.mx'),
(103, 'ERIK DE JESUS', 'NERIA', 'OROZCO', 'eriknerianeo@aragon.unam.mx'),
(104, 'IMELDA DE LA LUZ', 'FLORES', 'DIAZ', 'imeldaflores29@aragon.unam.mx'),
(105, 'JOSE FRANCISCO', 'SALGADO', 'RODRIGUEZ', 'franciscosalgadoi2@aragon.unam.mx'),
(106, 'CESAR ALBERTO', 'HERNANDEZ', 'AGUILAR', 'cesarhernandezaguilar@aragon.unam.mx'), -- Email corregido para evitar duplicado
(107, 'JUAN GERMAN', 'VALENZUELA', 'RAMOS', 'germanvalenzuelag3@aragon.unam.mx'),
(108, 'ESPARZA POSADAS', 'MARCOS', 'FRANCISCO', '@aragon.unam.mx'),
(109, 'ALEJANDRO RENE', 'GONZALEZ', 'PONCE', 'alejandrogonzalez1e8@aragon.unam.mx'),
(110, 'FERNANDO ROBERTO', 'COVARRUBIAS', 'RODRIGUEZ', 'fernandocovarrubiast2@aragon.unam.mx'),
(111, 'BERENICE', 'CANO', 'SANTOS', 'berenicecanoz0@aragon.unam.mx'),
(112, 'RODOLFO', 'VALENZUELA', 'LOPEZ', 'rodolfovalenzuela70@aragon.unam.mx'),
(113, 'LILIANA', 'HERNANDEZ', 'CERVANTES', 'lilianahernandezc4@aragon.unam.mx'),
(114, 'CARLOS', 'ESCONDRILLAS', 'MAYA', 'carlosescondrillasn68@aragon.unam.mx'),
(115, 'IVAN', 'GRADA', 'HUERTA', 'ivangrada1f1@aragon.unam.mx'),
(116, 'EDGAR', 'MORALES', 'PALAFOX', 'edgarpalafox19@aragon.unam.mx'),
(117, 'JOSE FRANCISCO', 'AGUILAR', 'HERNANDEZ', 'franciscoaguilar36@aragon.unam.mx'),
(118, 'RAMON', 'NAVARRO', 'DIAZ', 'ramonnavarro30@aragon.unam.mx'),
(119, 'ERNESTO', 'CRUZ', 'ROSALES', 'ernestocruzr3@aragon.unam.mx'),
(120, 'MARIELA VIANEY', 'RIVERO', 'PICAZO', 'marielariverorip@aragon.unam.mx'),
(121, 'RENE ADRIAN', 'DAVILA', 'PEREZ', 'renedavilar5@aragon.unam.mx');

INSERT INTO Asignatura (id_asignatura, clave_asignatura, nombre_asignatura, creditos_asignatura, creditos_laboratorio, tipo_asignatura) VALUES 
(1, '1503', 'ADMINISTRACION DE PROYECTOS', 8, 0, 'Obligatorio'),
(2, '8', 'ADMINISTRACION SISTEMAS MULTIUSUAR', 8, 0, 'Optativa'),
(3, '1', 'ADQUISICION DE DATOS', 8, 0, 'Optativa'),
(4, '1110', 'ALGEBRA', 9, 0, 'Obligatorio'),
(5, '62', 'ALGEBRA LINEAL', 9, 0, 'Obligatorio'),
(6, '301', 'APRENDIZAJE AUTOMATICO', 8, 0, 'Optativa'),
(7, '1417', 'BASES DE DATOS 1', 9, 0, 'Obligatorio'),
(8, '1810', 'BASES DE DATOS 2', 9, 0, 'Obligatorio'),
(9, '1109', 'CALCULO DIFERENCIAL E INTEGRAL', 9, 0, 'Obligatorio'),
(10, '63', 'CALCULO VECTORIAL', 9, 0, 'Obligatorio'),
(11, '434', 'COMPILADORES', 8, 0, 'Obligatorio'),
(12, '1111', 'COMPUTADORAS Y PROGRAMACION', 9, 0, 'Obligatorio'),                  -- Clave revertida a '1111'
(13, '302', 'COMPUTO EN LA NUBE', 8, 0, 'Optativa'),
(14, '1209', 'COMUNICACION', 6, 0, 'Obligatorio'),
(15, '1604', 'DISEÑO DE SISTEMAS DIGITALES (L)', 10, 1, 'Obligatorio'),
(16, '1521', 'DISEÑO LOGICO (L)', 10, 1, 'Obligatorio'),
(17, '1500', 'DISEÑO Y ANALISIS DE ALGORITMOS', 9, 0, 'Obligatorio'),
(18, '1522', 'DISPOSITIVOS ELECTRONICOS (L)', 10, 1, 'Obligatorio'),
(19, '1303', 'ECUACIONES DIFERENCIALES', 9, 0, 'Obligatorio'),
(20, '71', 'ELECTRICIDAD Y MAGNETISMO (L)', 10, 1, 'Obligatorio'),
(21, '1210', 'EMPRENDIMIENTO 1', 6, 0, 'Obligatorio'),
(22, '1311', 'EMPRENDIMIENTO 2', 6, 0, 'Obligatorio'),
(23, '1418', 'EMPRENDIMIENTO 3', 6, 0, 'Obligatorio'),
(24, '190', 'ESTRUCTURA DE DATOS', 9, 0, 'Obligatorio'),
(25, '1108', 'GEOMETRIA ANALITICA', 9, 0, 'Obligatorio'),
(26, '1910', 'GRAFICACION POR COMPUTADORA', 8, 0, 'Optativa'),
(27, '1917', 'HABILIDADES DIRECTIVAS', 8, 0, 'Obligatorio'),
(28, '1605', 'INGENIERIA DE SOFTWARE', 9, 0, 'Obligatorio'),
(29, '1627', 'INSTRUMENTACION Y CONTROL', 9, 0, 'Optativa'),
(30, '406', 'INTELIGENCIA ARTIFICIAL', 9, 0, 'Obligatorio'),
(31, '303', 'INTERNET DE LAS COSAS', 8, 0, 'Optativa'),
(32, '1112', 'INTRODUCCION A LA INGENIERIA EN COMPUTACION', 6, 0, 'Obligatorio'),
(33, '442', 'LENGUAJES FORMALES-AUTOMATAS', 9, 0, 'Obligatorio'),
(34, '1419', 'MATEMATICAS DISCRETAS', 9, 0, 'Obligatorio'),
(35, '480', 'METODOS NUMERICOS', 9, 0, 'Obligatorio'),
(36, '1800', 'MICROPROCESADOR.Y MICROCONTROLAD.(L)', 10, 1, 'Obligatorio'),
(37, '1908', 'MINERIA DE DATOS', 8, 0, 'Obligatorio'),
(38, '712', 'PROBABILIDAD Y ESTADISTICA', 9, 0, 'Obligatorio'),
(39, '1916', 'PROCESAMIENTO DIGIT.IMAGENES', 8, 0, 'Optativa'),
(40, '170', 'PROGRAMACION DE VIDEOJUEGOS 1', 8, 0, 'Optativa'),
(41, '174', 'PROGRAMACION DE VIDEOJUEGOS 2', 8, 0, 'Optativa'),
(42, '1812', 'PROGRAMACION MOVIL 1', 9, 0, 'Obligatorio'),
(43, '1203', 'PROGRAMACION ORIENTADA A OBJETOS', 8, 0, 'Obligatorio'),
(44, '1504', 'PROGRAMACION WEB 1', 9, 0, 'Obligatorio'),
(45, '1718', 'PROGRAMACION WEB 2', 9, 0, 'Obligatorio'),
(46, '1003', 'PROYECTO ESCUELA-INDUSTRIA', 8, 0, 'Optativa'),
(47, '1719', 'REDES DE COMPUTADORAS 1 (L)', 10, 1, 'Obligatorio'),
(48, '1813', 'REDES DE COMPUTADORAS 2', 9, 0, 'Obligatorio'),
(49, '2128', 'ROBOTICA', 8, 0, 'Optativa'),
(50, '1705', 'SEGURIDAD INFORMATICA', 8, 0, 'Obligatorio'),
(51, '18', 'SEMINARIO INGENIERIA EN COMPUTACION', 4, 0, 'Optativa'),
(52, '789', 'SISTEMAS DE INFORMACION', 9, 0, 'Obligatorio'),
(53, '2138', 'SISTEMAS EXPERTOS', 8, 0, 'Optativa'),
(54, '840', 'SISTEMAS OPERATIVOS', 9, 0, 'Obligatorio'),
(55, '1211', 'TALLER DE CREATIVIDAD E INNOVACION', 3, 0, 'Obligatorio'),
(56, '13', 'TEMAS ESPECIALES DE BASES', 8, 0, 'Optativa'),
(57, '167', 'TEMAS ESPECIALES DE COMPUTACION 1', 8, 0, 'Optativa'),
(58, '171', 'TEMAS ESPECIALES DE COMPUTACION 2', 8, 0, 'Optativa'),
(59, '175', 'TEMAS ESPECIALES DE COMPUTACION 3', 8, 0, 'Optativa'),
(60, '312', 'TEMAS ESPECIALES DE REDES', 8, 0, 'Optativa'),
(61, '313', 'TEMAS ESPECIALES DE SEGURIDAD INFORM', 8, 0, 'Optativa');

INSERT INTO Alumno (id_alumno, numero_cuenta, nombre, apellido_paterno, apellido_materno, correo_institucional, semestre_inscrito, turno, anio_ingreso, promedio, estatus_academico, sexo, id_carrera) VALUES 
(1, '320139105', 'Eder', 'Alvarez', 'Macias', 'ederalvarez05@aragon.unam.mx', 8, 'Matutino', 2023, 6.6, 0, 'M', 1),
(2, '320334249', 'Eder', 'Avalos', 'Juarez', 'ederavalos32@aragon.unam.mx', 8, 'matutino', 2023, 6.7, 1, 'H', 1),
(3, '423082292', 'Arturo Ivan', 'Azuara', 'Ocotitla', 'arturoazuara92@aragon.unam.mx', 8, 'Vespertino', 2023, 5.1, 1, 'H', 1),
(4, '329282438', 'Josue Ricardo', 'Enriquez', 'Garcia', 'ricardoenriquez@aragon.unam.mx', 6, 'Vespertino', 2024, 8.5, 0, 'H', 1),
(5, '320987665', 'Diego Rodrigo', 'Soto', 'Franco', 'soto@aragon.unam.mx', 8, '0', 2023, 5.2, 1, 'H', 1),
(6, '320305350', 'Alexis', 'Trujillo', 'Torres', 'alexistrujillo@aragon.unam.mx', 8, 'Vespertimo', 2023, 8.2, 1, 'H', 1),
(7, '316098292', 'Xchel', 'Jaimes', 'Ruiz', 'xcheljaimes@aragon.unam.mx', 8, 'Vespertino', 2023, 8.0, 1, 'H', 1),
(8, '320249617', 'Paula Mabel', 'Hernandez', 'Ruiz', 'paula@aragon.unam.mx', 8, 'Matutino', 2023, 8.8, 1, 'M', 1),
(9, '319154412', 'José Ignacio', 'Iniestra', 'Hernández', 'ignacioiniestra12@aragon.unam.mx', 8, 'Vespertino', 2022, 8.06, 1, 'H', 1),
(10, '320084225', 'Christian Gael', 'Lara', 'Martinez', 'claram@aragon.unam.mx', 8, 'Matutino', 2023, 9.9, 1, 'H', 1),
(11, '320085590', 'Jorge Mauricio', 'Maldonado', 'Amaro', 'jorgemauricio590@aragon.unam.mx', 8, 'Vespertino', 2023, 9.0, 1, 'H', 1),
(12, '423071182', 'Manuel Alberto', 'Manzana', 'Calixto', 'manuelcalixto82@aragon.unam.mx', 8, 'Vespertino', 2023, 8.0, 1, 'H', 1),
(13, '314776555', 'Eliezer Isaí', 'Monroy', 'Quintero', 'isai@aragon.unam.mx', 8, 'Vespertino', 2023, 6.7, 0, 'H', 1),
(14, '320320402', 'Eden Arturo', 'Moreno', 'Diaz', 'edendiaz02@aragon.unam.mx', 8, 'Vespertino', 2023, 9.1, 1, 'H', 1),
(15, '320071609', 'Mónica Alessandra', 'Padrón', 'Cortes', 'monicapadron09@aragon.unam.mx', 8, 'Vespertino', 2023, 9.3, 0, 'H', 1),
(16, '320000000', 'Humberto', 'Trujillo', 'Maldonado', 'humbertotrujillo125@aragon.unam.mx', 8, 'Vespertino', 2022, 6.9, 0, 'H', 1),
(17, '320170516', 'Omar', 'Vilchis', 'Ibarra', 'omar@aragon.unam.mx', 6, 'Vespertino', 2024, 7.96, 1, 'H', 1),
(18, '320235469', 'Sebastian', 'Villarreal', 'Mora', 'sebastianvillarreal59@aragon.unam.mx', 8, 'matutino', 2023, 8.24, 1, 'H', 1),
(19, '316248766', 'Aksel', 'Villela', 'Andrade', 'aksel@aragon.unam.mx', 8, 'Vespertino', 2023, 6.66, 1, 'H', 1),
(20, '320116500', 'Emiliano', 'Zuno', 'Velazquez', 'emilianozuno00@aragon.unam.mx', 8, 'Vespertino', 2023, 9.9, 1, 'H', 1);

INSERT INTO PeriodoEscolar (id_periodo, nombre_periodo, fecha_inicio, fecha_fin, estatus_activo) VALUES 
(1, '2025-2', '2025-08-11', '2025-12-05', 0),
(2, '2026-1', '2026-02-02', '2026-06-12', 0),
(3, '2026-2', '2026-08-10', '2026-12-04', 1);

INSERT INTO Grupo (id_grupo, nombre_grupo, id_asignatura, id_profesor, id_periodo, semestre_nivel) VALUES 
-- =========================================================
-- SEMESTRE 2: FIDELIDAD ABSOLUTA A LAS IMÁGENES (24 Registros)
-- Asignaturas: 5(Alg), 10(Calc), 43(POO), 14(Com), 21(Emp), 55(Taller)
-- =========================================================
(1, '2207', 5, 12, 3, 2), (2, '2207', 10, 4, 3, 2), (3, '2207', 43, 15, 3, 2), (4, '2207', 14, 13, 3, 2), (5, '2207', 21, 14, 3, 2), (6, '2207', 55, 16, 3, 2),
(7, '2208', 5, 17, 3, 2), (8, '2208', 10, 4, 3, 2), (9, '2208', 43, 19, 3, 2), (10, '2208', 14, 13, 3, 2), (11, '2208', 21, 18, 3, 2), (12, '2208', 55, 20, 3, 2),
(13, '2209', 5, 2, 3, 2), (14, '2209', 10, 2, 3, 2), (15, '2209', 43, 22, 3, 2), (16, '2209', 21, 13, 3, 2), (17, '2209', 14, 13, 3, 2), (18, '2209', 55, 13, 3, 2),
(19, '2210', 5, 23, 3, 2), (20, '2210', 10, 24, 3, 2), (21, '2210', 43, 19, 3, 2), (22, '2210', 14, 13, 3, 2), (23, '2210', 21, 18, 3, 2), (24, '2210', 55, 25, 3, 2),

-- =========================================================
-- EXTRAPOLACIÓN DE LA LÓGICA: 4 Grupos por materia para el resto (176 Registros)
-- Total asignaturas mapeadas = 50. (50 materias * 4 grupos = 200 combinaciones)
-- =========================================================
-- Semestre 1 (Asignaturas: 1, 4, 9, 12, 25, 32)
(25, '1101', 1, 26, 3, 1), (26, '1101', 4, 27, 3, 1), (27, '1101', 9, 28, 3, 1), (28, '1101', 12, 29, 3, 1), (29, '1101', 25, 30, 3, 1), (30, '1101', 32, 31, 3, 1),
(31, '1102', 1, 32, 3, 1), (32, '1102', 4, 33, 3, 1), (33, '1102', 9, 34, 3, 1), (34, '1102', 12, 35, 3, 1), (35, '1102', 25, 36, 3, 1), (36, '1102', 32, 37, 3, 1),
(37, '1103', 1, 38, 3, 1), (38, '1103', 4, 39, 3, 1), (39, '1103', 9, 40, 3, 1), (40, '1103', 12, 41, 3, 1), (41, '1103', 25, 42, 3, 1), (42, '1103', 32, 43, 3, 1),
(43, '1104', 1, 44, 3, 1), (44, '1104', 4, 45, 3, 1), (45, '1104', 9, 46, 3, 1), (46, '1104', 12, 47, 3, 1), (47, '1104', 25, 48, 3, 1), (48, '1104', 32, 49, 3, 1),

-- Semestre 3 (Asignaturas: 19, 20, 22, 24, 34, 38)
(49, '3301', 19, 50, 3, 3), (50, '3301', 20, 51, 3, 3), (51, '3301', 22, 52, 3, 3), (52, '3301', 24, 53, 3, 3), (53, '3301', 34, 54, 3, 3), (54, '3301', 38, 55, 3, 3),
(55, '3302', 19, 56, 3, 3), (56, '3302', 20, 57, 3, 3), (57, '3302', 22, 58, 3, 3), (58, '3302', 24, 59, 3, 3), (59, '3302', 34, 60, 3, 3), (60, '3302', 38, 61, 3, 3),
(61, '3303', 19, 62, 3, 3), (62, '3303', 20, 63, 3, 3), (63, '3303', 22, 64, 3, 3), (64, '3303', 24, 65, 3, 3), (65, '3303', 34, 66, 3, 3), (66, '3303', 38, 67, 3, 3),
(67, '3304', 19, 68, 3, 3), (68, '3304', 20, 69, 3, 3), (69, '3304', 22, 70, 3, 3), (70, '3304', 24, 71, 3, 3), (71, '3304', 34, 72, 3, 3), (72, '3304', 38, 73, 3, 3),

-- Semestre 4 (Asignaturas: 7, 16, 17, 23, 35, 44)
(73, '4401', 7, 74, 3, 4), (74, '4401', 16, 75, 3, 4), (75, '4401', 17, 76, 3, 4), (76, '4401', 23, 77, 3, 4), (77, '4401', 35, 78, 3, 4), (78, '4401', 44, 79, 3, 4),
(79, '4402', 7, 80, 3, 4), (80, '4402', 16, 81, 3, 4), (81, '4402', 17, 82, 3, 4), (82, '4402', 23, 83, 3, 4), (83, '4402', 35, 84, 3, 4), (84, '4402', 44, 85, 3, 4),
(85, '4403', 7, 86, 3, 4), (86, '4403', 16, 87, 3, 4), (87, '4403', 17, 88, 3, 4), (88, '4403', 23, 89, 3, 4), (89, '4403', 35, 90, 3, 4), (90, '4403', 44, 91, 3, 4),
(91, '4404', 7, 92, 3, 4), (92, '4404', 16, 93, 3, 4), (93, '4404', 17, 94, 3, 4), (94, '4404', 23, 95, 3, 4), (95, '4404', 35, 96, 3, 4), (96, '4404', 44, 97, 3, 4),

-- Semestre 5 (Asignaturas: 8, 15, 18, 28, 45, 54)
(97, '5501', 8, 98, 3, 5), (98, '5501', 15, 99, 3, 5), (99, '5501', 18, 100, 3, 5), (100, '5501', 28, 1, 3, 5), (101, '5501', 45, 2, 3, 5), (102, '5501', 54, 3, 3, 5),
(103, '5502', 8, 4, 3, 5), (104, '5502', 15, 5, 3, 5), (105, '5502', 18, 6, 3, 5), (106, '5502', 28, 7, 3, 5), (107, '5502', 45, 8, 3, 5), (108, '5502', 54, 9, 3, 5),
(109, '5503', 8, 10, 3, 5), (110, '5503', 15, 11, 3, 5), (111, '5503', 18, 12, 3, 5), (112, '5503', 28, 13, 3, 5), (113, '5503', 45, 14, 3, 5), (114, '5503', 54, 15, 3, 5),
(115, '5504', 8, 16, 3, 5), (116, '5504', 15, 17, 3, 5), (117, '5504', 18, 18, 3, 5), (118, '5504', 28, 19, 3, 5), (119, '5504', 45, 20, 3, 5), (120, '5504', 54, 21, 3, 5),

-- Semestre 6 (Asignaturas: 11, 33, 36, 47, 50, 52)
(121, '6601', 11, 22, 3, 6), (122, '6601', 33, 23, 3, 6), (123, '6601', 36, 24, 3, 6), (124, '6601', 47, 25, 3, 6), (125, '6601', 50, 26, 3, 6), (126, '6601', 52, 27, 3, 6),
(127, '6602', 11, 28, 3, 6), (128, '6602', 33, 29, 3, 6), (129, '6602', 36, 30, 3, 6), (130, '6602', 47, 31, 3, 6), (131, '6602', 50, 32, 3, 6), (132, '6602', 52, 33, 3, 6),
(133, '6603', 11, 34, 3, 6), (134, '6603', 33, 35, 3, 6), (135, '6603', 36, 36, 3, 6), (136, '6603', 47, 37, 3, 6), (137, '6603', 50, 38, 3, 6), (138, '6603', 52, 39, 3, 6),
(139, '6604', 11, 40, 3, 6), (140, '6604', 33, 41, 3, 6), (141, '6604', 36, 42, 3, 6), (142, '6604', 47, 43, 3, 6), (143, '6604', 50, 44, 3, 6), (144, '6604', 52, 45, 3, 6),

-- Semestre 7 (Asignaturas: 2, 27, 30, 37, 42, 48)
(145, '7701', 2, 46, 3, 7), (146, '7701', 27, 47, 3, 7), (147, '7701', 30, 48, 3, 7), (148, '7701', 37, 49, 3, 7), (149, '7701', 42, 50, 3, 7), (150, '7701', 48, 51, 3, 7),
(151, '7702', 2, 52, 3, 7), (152, '7702', 27, 53, 3, 7), (153, '7702', 30, 54, 3, 7), (154, '7702', 37, 55, 3, 7), (155, '7702', 42, 56, 3, 7), (156, '7702', 48, 57, 3, 7),
(157, '7703', 2, 58, 3, 7), (158, '7703', 27, 59, 3, 7), (159, '7703', 30, 60, 3, 7), (160, '7703', 37, 61, 3, 7), (161, '7703', 42, 62, 3, 7), (162, '7703', 48, 63, 3, 7),
(163, '7704', 2, 64, 3, 7), (164, '7704', 27, 65, 3, 7), (165, '7704', 30, 66, 3, 7), (166, '7704', 37, 67, 3, 7), (167, '7704', 42, 68, 3, 7), (168, '7704', 48, 69, 3, 7),

-- Semestre 8 (Asignaturas: 3, 6, 13, 26, 29, 31)
(169, '8801', 3, 70, 3, 8), (170, '8801', 6, 71, 3, 8), (171, '8801', 13, 72, 3, 8), (172, '8801', 26, 73, 3, 8), (173, '8801', 29, 74, 3, 8), (174, '8801', 31, 75, 3, 8),
(175, '8802', 3, 76, 3, 8), (176, '8802', 6, 77, 3, 8), (177, '8802', 13, 78, 3, 8), (178, '8802', 26, 79, 3, 8), (179, '8802', 29, 80, 3, 8), (180, '8802', 31, 81, 3, 8),
(181, '8803', 3, 82, 3, 8), (182, '8803', 6, 83, 3, 8), (183, '8803', 13, 84, 3, 8), (184, '8803', 26, 85, 3, 8), (185, '8803', 29, 86, 3, 8), (186, '8803', 31, 87, 3, 8),
(187, '8804', 3, 88, 3, 8), (188, '8804', 6, 89, 3, 8), (189, '8804', 13, 90, 3, 8), (190, '8804', 26, 91, 3, 8), (191, '8804', 29, 92, 3, 8), (192, '8804', 31, 93, 3, 8),

-- Semestre 9 (Asignaturas: 39, 49)
(193, '9901', 39, 94, 3, 9), (194, '9901', 49, 95, 3, 9),
(195, '9902', 39, 96, 3, 9), (196, '9902', 49, 97, 3, 9),
(197, '9903', 39, 98, 3, 9), (198, '9903', 49, 99, 3, 9),
(199, '9904', 39, 100, 3, 9), (200, '9904', 49, 101, 3, 9);

INSERT INTO HorarioGrupo (id_grupo, id_aula, dia_semana, hora_inicio, hora_fin) VALUES 
-- Grupo 2207
(1, 1, 1, '08:30:00', '10:00:00'), (1, 1, 3, '08:30:00', '10:00:00'), (1, 1, 5, '08:30:00', '10:00:00'), -- Algebra (A212)
(2, 2, 1, '10:00:00', '11:30:00'), (2, 2, 3, '10:00:00', '11:30:00'), (2, 2, 5, '10:00:00', '11:30:00'), -- Calculo (A505)
(3, 2, 2, '09:00:00', '11:00:00'), (3, 2, 4, '09:00:00', '11:00:00'), -- POO (A505)
(4, 3, 1, '07:00:00', '08:20:00'), (4, 3, 3, '07:00:00', '08:20:00'), (4, 3, 5, '07:00:00', '08:20:00'), -- Comunicacion (A214)
(5, 3, 2, '07:00:00', '09:00:00'), (5, 3, 4, '07:00:00', '09:00:00'), -- Emprendimiento (A214)
(6, 8, 5, '11:30:00', '14:30:00'), -- Taller (A506)

-- Grupo 2208
(7, 4, 1, '11:30:00', '13:00:00'), (7, 4, 3, '11:30:00', '13:00:00'), (7, 4, 5, '11:30:00', '13:00:00'), -- Algebra (A215)
(8, 4, 1, '08:30:00', '10:00:00'), (8, 4, 3, '08:30:00', '10:00:00'), (8, 4, 5, '08:30:00', '10:00:00'), -- Calculo (A215)
(9, 2, 1, '07:00:00', '08:20:00'), (9, 2, 3, '07:00:00', '08:20:00'), (9, 2, 5, '07:00:00', '08:20:00'), -- POO (A505)
(10, 4, 1, '10:00:00', '11:20:00'), (10, 4, 3, '10:00:00', '11:20:00'), (10, 4, 5, '10:00:00', '11:20:00'), -- Comunicacion (A215)
(11, 4, 2, '09:00:00', '11:00:00'), (11, 4, 4, '09:00:00', '11:00:00'), -- Emprendimiento (A215)
(12, 2, 2, '07:00:00', '08:30:00'), (12, 2, 4, '07:00:00', '08:30:00'), -- Taller (A505)

-- Grupo 2209
(13, 3, 1, '10:00:00', '11:30:00'), (13, 3, 3, '10:00:00', '11:30:00'), (13, 3, 5, '10:00:00', '11:30:00'), -- Algebra (A214)
(14, 5, 1, '07:00:00', '08:30:00'), (14, 5, 3, '07:00:00', '08:30:00'), (14, 5, 5, '07:00:00', '08:30:00'), -- Calculo (A213)
(15, 3, 1, '11:30:00', '13:00:00'), (15, 3, 3, '11:30:00', '13:00:00'), (15, 3, 5, '11:30:00', '13:00:00'), -- POO (A214)
(16, 2, 2, '11:00:00', '13:00:00'), (16, 2, 4, '11:00:00', '13:00:00'), -- Comunicacion (A505)
(17, 9, 1, '13:00:00', '14:20:00'), (17, 9, 3, '13:00:00', '14:20:00'), (17, 9, 5, '13:00:00', '14:20:00'), -- Emprendimiento (A216)
(18, 8, 1, '08:30:00', '10:00:00'), (18, 8, 3, '08:30:00', '10:00:00'), (18, 8, 5, '08:30:00', '10:00:00'), -- Taller (A506)

-- Grupo 2210
(19, 8, 2, '11:00:00', '13:00:00'), (19, 8, 4, '11:00:00', '13:00:00'), -- Algebra (A506)
(20, 10, 1, '13:00:00', '15:00:00'), (20, 10, 3, '13:00:00', '15:00:00'), -- Calculo (A205)
(21, 6, 2, '07:00:00', '09:00:00'), (21, 6, 4, '07:00:00', '09:00:00'), -- POO (A204)
(22, 7, 1, '11:30:00', '12:50:00'), (22, 7, 3, '11:30:00', '12:50:00'), (22, 7, 5, '11:30:00', '12:50:00'), -- Comunicacion (A211)
(23, 7, 1, '08:00:00', '10:00:00'), (23, 7, 3, '08:00:00', '10:00:00'), -- Emprendimiento (A211)
(24, 1, 2, '09:00:00', '10:30:00'), (24, 1, 4, '09:00:00', '10:30:00'); -- Taller (A212)

INSERT INTO HorarioGrupo (id_grupo, id_aula, dia_semana, hora_inicio, hora_fin) VALUES 
-- Grupo 2207
(1, 1, 1, '08:30:00', '10:00:00'), (1, 1, 3, '08:30:00', '10:00:00'), (1, 1, 5, '08:30:00', '10:00:00'), -- Algebra (A212)
(2, 2, 1, '10:00:00', '11:30:00'), (2, 2, 3, '10:00:00', '11:30:00'), (2, 2, 5, '10:00:00', '11:30:00'), -- Calculo (A505)
(3, 2, 2, '09:00:00', '11:00:00'), (3, 2, 4, '09:00:00', '11:00:00'), -- POO (A505)
(4, 3, 1, '07:00:00', '08:20:00'), (4, 3, 3, '07:00:00', '08:20:00'), (4, 3, 5, '07:00:00', '08:20:00'), -- Comunicacion (A214)
(5, 3, 2, '07:00:00', '09:00:00'), (5, 3, 4, '07:00:00', '09:00:00'), -- Emprendimiento (A214)
(6, 8, 5, '11:30:00', '14:30:00'), -- Taller (A506)

-- Grupo 2208
(7, 4, 1, '11:30:00', '13:00:00'), (7, 4, 3, '11:30:00', '13:00:00'), (7, 4, 5, '11:30:00', '13:00:00'), -- Algebra (A215)
(8, 4, 1, '08:30:00', '10:00:00'), (8, 4, 3, '08:30:00', '10:00:00'), (8, 4, 5, '08:30:00', '10:00:00'), -- Calculo (A215)
(9, 2, 1, '07:00:00', '08:20:00'), (9, 2, 3, '07:00:00', '08:20:00'), (9, 2, 5, '07:00:00', '08:20:00'), -- POO (A505)
(10, 4, 1, '10:00:00', '11:20:00'), (10, 4, 3, '10:00:00', '11:20:00'), (10, 4, 5, '10:00:00', '11:20:00'), -- Comunicacion (A215)
(11, 4, 2, '09:00:00', '11:00:00'), (11, 4, 4, '09:00:00', '11:00:00'), -- Emprendimiento (A215)
(12, 2, 2, '07:00:00', '08:30:00'), (12, 2, 4, '07:00:00', '08:30:00'), -- Taller (A505)

-- Grupo 2209
(13, 3, 1, '10:00:00', '11:30:00'), (13, 3, 3, '10:00:00', '11:30:00'), (13, 3, 5, '10:00:00', '11:30:00'), -- Algebra (A214)
(14, 5, 1, '07:00:00', '08:30:00'), (14, 5, 3, '07:00:00', '08:30:00'), (14, 5, 5, '07:00:00', '08:30:00'), -- Calculo (A213)
(15, 3, 1, '11:30:00', '13:00:00'), (15, 3, 3, '11:30:00', '13:00:00'), (15, 3, 5, '11:30:00', '13:00:00'), -- POO (A214)
(16, 2, 2, '11:00:00', '13:00:00'), (16, 2, 4, '11:00:00', '13:00:00'), -- Comunicacion (A505)
(17, 9, 1, '13:00:00', '14:20:00'), (17, 9, 3, '13:00:00', '14:20:00'), (17, 9, 5, '13:00:00', '14:20:00'), -- Emprendimiento (A216)
(18, 8, 1, '08:30:00', '10:00:00'), (18, 8, 3, '08:30:00', '10:00:00'), (18, 8, 5, '08:30:00', '10:00:00'), -- Taller (A506)

-- Grupo 2210
(19, 8, 2, '11:00:00', '13:00:00'), (19, 8, 4, '11:00:00', '13:00:00'), -- Algebra (A506)
(20, 10, 1, '13:00:00', '15:00:00'), (20, 10, 3, '13:00:00', '15:00:00'), -- Calculo (A205)
(21, 6, 2, '07:00:00', '09:00:00'), (21, 6, 4, '07:00:00', '09:00:00'), -- POO (A204)
(22, 7, 1, '11:30:00', '12:50:00'), (22, 7, 3, '11:30:00', '12:50:00'), (22, 7, 5, '11:30:00', '12:50:00'), -- Comunicacion (A211)
(23, 7, 1, '08:00:00', '10:00:00'), (23, 7, 3, '08:00:00', '10:00:00'), -- Emprendimiento (A211)
(24, 1, 2, '09:00:00', '10:30:00'), (24, 1, 4, '09:00:00', '10:30:00'); -- Taller (A212)

use inscripciones;

INSERT INTO Grupo (id_grupo, nombre_grupo, id_asignatura, id_profesor, id_periodo, semestre_nivel) VALUES 
-- BASES DE DATOS 1 (4 Grupos)
(201, '4261', 7, 68, 3, 4),
(202, '4262', 7, 68, 3, 4),
(203, '4263', 7, 68, 3, 4),
(204, '4264', 7, 68, 3, 4),

-- BASES DE DATOS 2 (4 Grupos)
(205, '5261', 8, 68, 3, 5),
(206, '5262', 8, 68, 3, 5),
(207, '5263', 8, 68, 3, 5),
(208, '5264', 8, 68, 3, 5),

-- LENGUAJES FORMALES-AUTOMATAS (4 Grupos)
(209, '6261', 33, 68, 3, 6),
(210, '6262', 33, 68, 3, 6),
(211, '6263', 33, 68, 3, 6),
(212, '6264', 33, 68, 3, 6),

-- INTELIGENCIA ARTIFICIAL (4 Grupos)
(213, '7261', 30, 68, 3, 7),
(214, '7262', 30, 68, 3, 7),
(215, '7263', 30, 68, 3, 7),
(216, '7264', 30, 68, 3, 7),

-- MINERIA DE DATOS (4 Grupos)
(217, '8261', 37, 68, 3, 8),
(218, '8262', 37, 68, 3, 8),
(219, '8263', 37, 68, 3, 8),
(220, '8264', 37, 68, 3, 8);

INSERT INTO HorarioGrupo (id_horario, id_grupo, id_aula, dia_semana, hora_inicio, hora_fin) VALUES 
-- Bloque Lunes (1) y Miércoles (3) - Aula 1 (A212) y Aula 2 (A505)
(209, 201, 1, 1, '07:00:00', '09:00:00'), (210, 201, 1, 3, '07:00:00', '09:00:00'),
(211, 202, 1, 1, '09:00:00', '11:00:00'), (212, 202, 1, 3, '09:00:00', '11:00:00'),
(213, 203, 1, 1, '11:00:00', '13:00:00'), (214, 203, 1, 3, '11:00:00', '13:00:00'),
(215, 204, 1, 1, '13:00:00', '15:00:00'), (216, 204, 1, 3, '13:00:00', '15:00:00'),
(217, 209, 2, 1, '15:00:00', '17:00:00'), (218, 209, 2, 3, '15:00:00', '17:00:00'),
(219, 210, 2, 1, '17:00:00', '19:00:00'), (220, 210, 2, 3, '17:00:00', '19:00:00'),
(221, 211, 2, 1, '19:00:00', '21:00:00'), (222, 211, 2, 3, '19:00:00', '21:00:00'),

-- Bloque Martes (2) y Jueves (4) - Aula 3 (A214) y Aula 4 (A215)
(223, 205, 3, 2, '07:00:00', '09:00:00'), (224, 205, 3, 4, '07:00:00', '09:00:00'),
(225, 206, 3, 2, '09:00:00', '11:00:00'), (226, 206, 3, 4, '09:00:00', '11:00:00'),
(227, 207, 3, 2, '11:00:00', '13:00:00'), (228, 207, 3, 4, '11:00:00', '13:00:00'),
(229, 208, 3, 2, '13:00:00', '15:00:00'), (230, 208, 3, 4, '13:00:00', '15:00:00'),
(231, 212, 4, 2, '15:00:00', '17:00:00'), (232, 212, 4, 4, '15:00:00', '17:00:00'),
(233, 213, 4, 2, '17:00:00', '19:00:00'), (234, 213, 4, 4, '17:00:00', '19:00:00'),
(235, 214, 4, 2, '19:00:00', '21:00:00'), (236, 214, 4, 4, '19:00:00', '21:00:00'),

-- Bloque Viernes (5) y Sábado (6) - Aula 5 (A213)
(237, 215, 5, 5, '07:00:00', '09:00:00'), (238, 215, 5, 6, '07:00:00', '09:00:00'),
(239, 216, 5, 5, '09:00:00', '11:00:00'), (240, 216, 5, 6, '09:00:00', '11:00:00'),
(241, 217, 5, 5, '11:00:00', '13:00:00'), (242, 217, 5, 6, '11:00:00', '13:00:00'),
(243, 218, 5, 5, '13:00:00', '15:00:00'), (244, 218, 5, 6, '13:00:00', '15:00:00'),
(245, 219, 5, 5, '15:00:00', '17:00:00'), (246, 219, 5, 6, '15:00:00', '17:00:00'),
(247, 220, 5, 5, '17:00:00', '19:00:00'), (248, 220, 5, 6, '17:00:00', '19:00:00');
