CREATE TABLE IF NOT EXISTS `movies`.`roles` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `roles_name_unique` (`name` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `movies`.`subscriptions` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `price` FLOAT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `subscriptions_name_unique` (`name` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `movies`.`movies` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `director` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `year` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `category` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `distributor` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `synopsis` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `type` ENUM('Premium', 'Estandar') CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL DEFAULT 'Estandar',
  `image_address` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `link` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `date` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `movies_name_unique` (`name` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `movies`.`users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `last_name` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `subscription_id` BIGINT UNSIGNED  NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC) VISIBLE,
  INDEX `subscription_user_subscription_id_foreign` (`subscription_id` ASC) VISIBLE,
  CONSTRAINT `subscription_user_subscription_id_foreign`
    FOREIGN KEY (`subscription_id`)
    REFERENCES `movies`.`subscriptions` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `movies`.`users_roles` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` BIGINT UNSIGNED NOT NULL,
  `user_id` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `role_user_role_id_foreign` (`role_id` ASC) VISIBLE,
  INDEX `role_user_user_id_foreign` (`user_id` ASC) VISIBLE,
  CONSTRAINT `role_user_role_id_foreign`
    FOREIGN KEY (`role_id`)
    REFERENCES `movies`.`roles` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign`
    FOREIGN KEY (`user_id`)
    REFERENCES `movies`.`users` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `movies`.`favorites` (
  `id` BIGINT UNSIGNED NOT NULL,
  `movie_id` BIGINT UNSIGNED NOT NULL,
  `user_id` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `movie_user_movie_id_foreign` (`movie_id` ASC) VISIBLE,
  INDEX `movie_user_user_id_foreign` (`user_id` ASC) VISIBLE,
  CONSTRAINT `movie_user_movie_id_foreign`
    FOREIGN KEY (`movie_id`)
    REFERENCES `movies`.`movies` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `movie_user_user_id_foreign`
    FOREIGN KEY (`user_id`)
    REFERENCES `movies`.`users` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

INSERT INTO `movies` (`id`, `name`, `director`, `year`, `category`, `distributor`, `synopsis`, `type`, `image_address`,`link`,`date`) VALUES
(1, 'Pulp Fiction', 'Quentin Tarantino', '1992', 'Crimen', 'Warner Bros', 'La vida de un boxeador, dos sicarios, la esposa de un gánster y dos bandidos se entrelaza en una historia de violencia y redención.', 'Estandar', 'pulpfiction.jpg','https://www.youtube.com/embed/auCgsj0MV-M', '2021-03-17 11:30:11'),
(2, 'La lista de Schindler', 'Steven Spielberg', '1993', 'Bélico', 'Universal Pictures', 'El empresario alemán Oskar Schindler, miembro del Partido Nazi, pone en marcha un elaborado, costoso y arriesgado plan para salvar a más de mil judíos del Holocausto.', 'Estandar', 'schindler.jpg','https://www.youtube.com/embed/7q-ETFeMxwI', '2021-03-17 11:30:11'),
(3, 'Seven', 'David Fincher', '1996', 'Thriller', 'Warner Bros', 'Somerset es un solitario y veterano detective a punto de retirarse que se encuentra con Mills, un joven impulsivo.', 'Premium', 'seven.jpg','https://www.youtube.com/embed/xhzBmjdehPA', '2021-03-17 11:30:11'),
(4, 'El silencio de los coredero', 'Jonatahn Demme', '1991', 'Thriller', 'Orion Pictures', 'Una agente en entrenamiento del FBI busca la ayuda y consejo de un brillante asesino para poder capturar a otro asesino, el doctor Hannibal Lecter.', 'Premium', 'silenciocorderos.jpg','https://www.youtube.com/embed/tU_PuI591Uk', '2021-03-17 11:30:11'),
(5, 'Taxi Driver', 'Martin Scorsese', '1977', 'Thriller', 'Columbia Pictures', 'Taxi Driver es una película estadounidense dramática de 1976, dirigida por Martin Scorsese, escrita por Paul Schrader y protagonizada por Robert De Niro.​ ', 'Estandar', 'taxidriver.jpg','https://www.youtube.com/embed/UUxD4-dEzn0', '2021-03-17 11:30:11'),
(6, 'Alguien voló sobre el nido del cuco', 'Miloš Forman', '1975', 'Drama', 'United Artists', 'Un grupo de pacientes mentales sigue a Randle P. McMurphy, el personaje inadaptado social de la novela de Ken Kesey.', 'Premium', 'alguienvolo.jpg','https://www.youtube.com/embed/OXrcDonY-B8', '2021-03-17 11:31:10'),
(7, 'American History X', 'Tony Kaye', '1998', 'Drama', 'New Line Cinema', 'Tras ser liberado de la cárcel, un antiguo neonazi trata de evitar que su hermano menor siga sus pasos en la senda del odio.', 'Estandar', 'americanhistory.jpg','https://www.youtube.com/embed/XfQYHqsiN5g', '2021-03-17 11:31:10'),
(8, 'Blade Runner', 'Ridley Scott', '1982', 'Acción', 'Warner Bros', 'En un futuro sombrío y lluvioso, un expolicía vuelve al servicio para buscar y destruir a un grupo de androides que fingen ser humanos para, integrados en la sociedad, encontrar a su creador y matarlo.', 'Premium', 'bladerunner.jpg','https://www.youtube.com/embed/eogpIG53Cis', '2021-03-17 11:31:10'),
(9, 'Cadena Perpetua', 'Frank Darabont', '1994', 'Drama', 'Columbia Pictures', 'Un hombre inocente es enviado a una corrupta penitenciaria de Maine en 1947 y sentenciado a dos cadenas perpetuas por un doble asesinato.', 'Estandar', 'cadenaperpetua.jpg','https://www.youtube.com/embed/4u87tmlj4oE', '2021-03-17 11:31:10'),
(10, 'La chaqueta Metálica', 'Stanley Kubrick', '1988', 'Acción', 'Columbia Pictures', 'Un infante de marina y sus compañeros se enfrentan al entrenamiento básico bajo la guía de un sargento sádico y pelean en la ofensiva Tet de 1968.', 'Estandar', 'chaquetametalica.jpg','https://www.youtube.com/embed/7115nOKRFD8', '2021-03-17 11:31:10'),
(11, 'El Club de la lucha', 'David Fincher', '1999', 'Thriller', '20th Century Studios', 'Un empleado de oficina insomne, harto de su vida, se cruza con un vendedor peculiar. Ambos crean un club de lucha clandestino como forma de terapia y, poco a poco, la organización crece y sus objetivos toman otro rumbo.', 'Premium', 'clubdelalucha.jpg','https://www.youtube.com/embed/c06JMZ6uQ-U', '2021-03-17 11:31:10'),
(12, 'El Golpe', 'George Roy Hill', '1974', 'Crimen', '20th Century Studios', 'Durante la Depresión, dos hombres buscan una manera de estafar al mafioso culpable de la muerte de un compañero.', 'Estandar', 'elgolpe.jpg','https://www.youtube.com/embed/_nAIb_J9T5M', '2021-03-17 11:31:10'),
(13, 'El Padrino', 'Francis Ford Coppola', '1972', 'Crimen', 'Paramount Pictures', 'El padrino es el nombre que reciben las películas dirigidas por Francis Ford Coppola​ y escritas por él mismo junto con el novelista Mario Puzo.​ La trilogía consta de las tres películas: El padrino, ​ El padrino II y El padrino III.', 'Premium', 'elpadrino.jpg','https://www.youtube.com/embed/gCVj1LeYnsc', '2021-03-17 11:31:10'),
(14, 'El Padrino 2', 'Francis Ford Coppola', '1974', 'Crimen', 'Paramount Pictures', 'El padrino es el nombre que reciben las películas dirigidas por Francis Ford Coppola​ y escritas por él mismo junto con el novelista Mario Puzo.​ La trilogía consta de las tres películas: El padrino, ​ El padrino II y El padrino III.', 'Estandar', 'elpadrinoII.jpg','https://www.youtube.com/embed/cpt4cXjdJz0', '2021-03-17 11:31:10'),
(15, 'El Pianista', 'Roman Poalnski', '2002', 'Bélico', 'Focus Features', 'Un judío polaco, pianista profesional, lucha por la supervivencia en Varsovia frente a la invasión nazi. Después de, gracias a unos amigos, haber evitado la deportación, el pianista debe vivir oculto y constantemente expuesto al peligro.', 'Estandar', 'elpianista.jpg','https://www.youtube.com/embed/BFwGqLa_oAo', '2021-03-17 11:31:10'),
(16, 'El Precio del poder', 'Brian de Palma', '1984', 'Crimen', 'Universal Pictures', 'Scarface es una película estadounidense de 1983, dirigida por Brian De Palma y protagonizada por Al Pacino, Steven Bauer, Michelle Pfeiffer, Mary Elizabeth Mastrantonio, Robert Loggia, Harris Yulin, Paul Shenar y F. Murray Abraham.', 'Estandar', 'elpreciodelpoder.jpg','https://www.youtube.com/embed/He7IbXJy-Uk', '2021-03-17 11:31:10'),
(17, 'La vida es bella', 'Roberto Benigni', '1997', 'Bélico', 'Miramax', 'Un hombre construye una elaborada fantasía para proteger a su hijo en un campo de concentración nazi.', 'Estandar', 'lavidaesbella.jpg','https://www.youtube.com/embed/8_TJRfXIoY4', '2021-03-17 11:31:10'),
(18, 'La naranja mecánica', 'Stanley Kubrick', '1971', 'Drama', 'Warner Bros', 'Un criminal en la Inglaterra del futuro pasa una serie de procesos experimentales para corregir sus impulsos violentos.', 'Estandar', 'naranjamecanica.jpg','https://www.youtube.com/embed/A1eC4pG8rC0', '2021-03-17 11:31:10');


INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'administrator'),
(2, 'standard_user'),
(3, 'premium_user');

INSERT INTO `subscriptions` (`id`, `name`, `price`) VALUES
(1, 'Month', 3),
(2, 'Year', 30);


INSERT INTO `users_roles` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2);


INSERT INTO `favorites` (`id`, `movie_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 2);

INSERT INTO `users` (`id`, `name`,`last_name`,`email`,  `password`, `subscription_id`) VALUES
(1, 'Oscar','Ramal','oscar@gmail.com','oscar',1),
(2, 'Pepe','Sanchez' ,'Pepe@gmail.com','pepe',1);



