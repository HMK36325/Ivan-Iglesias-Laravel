
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distributor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `synopsis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Premium','Estandar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Estandar',
  `image_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `movies` (`id`, `name`, `director`, `year`, `category`, `distributor`, `synopsis`, `type`, `image_address`, `date`) VALUES
(1, 'Pulp Fiction', 'Quentin Tarantino', '1992', 'Crimen', 'Warner Bros', 'La vida de un boxeador, dos sicarios, la esposa de un gánster y dos bandidos se entrelaza en una historia de violencia y redención.', 'Estandar', 'pulpfiction.jpg', '2021-03-17 11:30:11'),
(2, 'La lista de Schindler', 'Steven Spielberg', '1993', 'Bélico', 'Universal Pictures', 'El empresario alemán Oskar Schindler, miembro del Partido Nazi, pone en marcha un elaborado, costoso y arriesgado plan para salvar a más de mil judíos del Holocausto.', 'Estandar', 'schindler.jpg', '2021-03-17 11:30:11'),
(3, 'Seven', 'David Fincher', '1996', 'Thriller', 'Warner Bros', 'Somerset es un solitario y veterano detective a punto de retirarse que se encuentra con Mills, un joven impulsivo.', 'Premium', 'seven.jpg', '2021-03-17 11:30:11'),
(4, 'El silencio de los coredero', 'Jonatahn Demme', '1991', 'Thriller', 'Orion Pictures', 'Una agente en entrenamiento del FBI busca la ayuda y consejo de un brillante asesino para poder capturar a otro asesino, el doctor Hannibal Lecter.', 'Premium', 'silenciocorderos.jpg', '2021-03-17 11:30:11'),
(5, 'Taxi Driver', 'Martin Scorsese', '1977', 'Thriller', 'Columbia Pictures', 'Taxi Driver es una película estadounidense dramática de 1976, dirigida por Martin Scorsese, escrita por Paul Schrader y protagonizada por Robert De Niro.​ ', 'Estandar', 'taxidriver.jpg', '2021-03-17 11:30:11'),
(6, 'Alguien voló sobre el nido del cuco', 'Miloš Forman', '1975', 'Drama', 'United Artists', 'Un grupo de pacientes mentales sigue a Randle P. McMurphy, el personaje inadaptado social de la novela de Ken Kesey.', 'Premium', 'alguienvolo.jpg', '2021-03-17 11:31:10'),
(7, 'American History X', 'Tony Kaye', '1998', 'Drama', 'New Line Cinema', 'Tras ser liberado de la cárcel, un antiguo neonazi trata de evitar que su hermano menor siga sus pasos en la senda del odio.', 'Estandar', 'americanhistory.jpg', '2021-03-17 11:31:10'),
(8, 'Blade Runner', 'Ridley Scott', '1982', 'Acción', 'Warner Bros', 'En un futuro sombrío y lluvioso, un expolicía vuelve al servicio para buscar y destruir a un grupo de androides que fingen ser humanos para, integrados en la sociedad, encontrar a su creador y matarlo.', 'Premium', 'bladerunner.jpg', '2021-03-17 11:31:10'),
(9, 'Cadena Perpetua', 'Frank Darabont', '1994', 'Drama', 'Columbia Pictures', 'Un hombre inocente es enviado a una corrupta penitenciaria de Maine en 1947 y sentenciado a dos cadenas perpetuas por un doble asesinato.', 'Estandar', 'cadenaperpetua.jpg', '2021-03-17 11:31:10'),
(10, 'La chaqueta Metálica', 'Stanley Kubrick', '1988', 'Acción', 'Columbia Pictures', 'Un infante de marina y sus compañeros se enfrentan al entrenamiento básico bajo la guía de un sargento sádico y pelean en la ofensiva Tet de 1968.', 'Estandar', 'chaquetametalica.jpg', '2021-03-17 11:31:10'),
(11, 'El Club de la lucha', 'David Fincher', '1999', 'Thriller', '20th Century Studios', 'Un empleado de oficina insomne, harto de su vida, se cruza con un vendedor peculiar. Ambos crean un club de lucha clandestino como forma de terapia y, poco a poco, la organización crece y sus objetivos toman otro rumbo.', 'Premium', 'clubdelalucha.jpg', '2021-03-17 11:31:10'),
(12, 'El Golpe', 'George Roy Hill', '1974', 'Crimen', '20th Century Studios', 'Durante la Depresión, dos hombres buscan una manera de estafar al mafioso culpable de la muerte de un compañero.', 'Estandar', 'elgolpe.jpg', '2021-03-17 11:31:10'),
(13, 'El Padrino', 'Francis Ford Coppola', '1972', 'Crimen', 'Paramount Pictures', 'El padrino es el nombre que reciben las películas dirigidas por Francis Ford Coppola​ y escritas por él mismo junto con el novelista Mario Puzo.​ La trilogía consta de las tres películas: El padrino, ​ El padrino II y El padrino III.', 'Premium', 'elpadrino.jpg', '2021-03-17 11:31:10'),
(14, 'El Padrino 2', 'Francis Ford Coppola', '1974', 'Crimen', 'Paramount Pictures', 'El padrino es el nombre que reciben las películas dirigidas por Francis Ford Coppola​ y escritas por él mismo junto con el novelista Mario Puzo.​ La trilogía consta de las tres películas: El padrino, ​ El padrino II y El padrino III.', 'Estandar', 'elpadrinoII.jpg', '2021-03-17 11:31:10'),
(15, 'El Pianista', 'Roman Poalnski', '2002', 'Bélico', 'Focus Features', 'Un judío polaco, pianista profesional, lucha por la supervivencia en Varsovia frente a la invasión nazi. Después de, gracias a unos amigos, haber evitado la deportación, el pianista debe vivir oculto y constantemente expuesto al peligro.', 'Estandar', 'elpianista.jpg', '2021-03-17 11:31:10'),
(16, 'El Precio del poder', 'Brian de Palma', '1984', 'Crimen', 'Universal Pictures', 'Scarface es una película estadounidense de 1983, dirigida por Brian De Palma y protagonizada por Al Pacino, Steven Bauer, Michelle Pfeiffer, Mary Elizabeth Mastrantonio, Robert Loggia, Harris Yulin, Paul Shenar y F. Murray Abraham.', 'Estandar', 'elpreciodelpoder.jpg', '2021-03-17 11:31:10'),
(17, 'La vida es bella', 'Roberto Benigni', '1997', 'Bélico', 'Miramax', 'Un hombre construye una elaborada fantasía para proteger a su hijo en un campo de concentración nazi.', 'Estandar', 'lavidaesbella.jpg', '2021-03-17 11:31:10'),
(18, 'La naranja mecánica', 'Stanley Kubrick', '1971', 'Drama', 'Warner Bros', 'Un criminal en la Inglaterra del futuro pasa una serie de procesos experimentales para corregir sus impulsos violentos.', 'Estandar', 'naranjamecanica.jpg', '2021-03-17 11:31:10');


CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'administrator'),
(2, 'standard_user'),
(3, 'premium_user');



CREATE TABLE `users_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users_roles` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2);


CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `favorites` (`id`, `movie_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 2);



CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suscripciones`
--

INSERT INTO `subscriptions` (`id`, `name`, `price`) VALUES
(1, 'Month', 3),
(2, 'Year', 30);

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `subscription_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`,`last_name`,`email`,  `password`, `subscription_id`) VALUES
(1, 'Oscar','Ramal','oscar@gmail.com','oscar',1),
(2, 'Pepe','Sanchez' ,'Pepe@gmail.com','pepe',1);


ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movies_name_unique` (`name`);


ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);
  
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_user_movie_id_foreign` (`movie_id`),
  ADD KEY `movie_user_user_id_foreign` (`user_id`);


ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_name_unique` (`name`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `users_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `suscripciones`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `users_roles`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
  
ALTER TABLE `favorites`
  ADD CONSTRAINT `movie_user_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `users`
  ADD CONSTRAINT `subscription_user_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE;

