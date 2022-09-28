SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO `cities` (`id`, `name`)
VALUES (1, 'Bogota'),
  (2, 'Cali'),
  (3, 'Medellin');

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO `courses` (`id`, `name`)
VALUES (2, 'Metallurgy'),
  (3, 'Software'),
  (4, 'Architecture');

CREATE TABLE `formation_programs` (
  `id` int(11) NOT NULL,
  `instructor` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `headquarter` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO `formation_programs` (
    `id`,
    `instructor`,
    `course`,
    `headquarter`,
    `name`
  )
VALUES (5, 3, 3, 1, 'Software_Norte'),
  (6, 1, 2, 3, 'Metallurgy_Sur'),
  (7, 5, 4, 2, 'Architecture_Oeste');

CREATE TABLE `headquarters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO `headquarters` (`id`, `name`)
VALUES (1, 'Norte'),
  (2, 'Oeste'),
  (3, 'Sur'),
  (4, 'Este');

CREATE TABLE `student_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO `student_levels` (`id`, `name`)
VALUES (1, 'Professional'),
  (2, 'Bachelor'),
  (3, 'College'),
  (4, 'Master');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `city` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_level` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO `users` (
    `id`,
    `name`,
    `surname`,
    `address`,
    `phone`,
    `city`,
    `email`,
    `password`,
    `student_level`
  )
VALUES (
    1,
    'Cesar',
    'Fonseca',
    'MZ Z CS # 25',
    '3045904747',
    1,
    'slogive@gmail.com',
    '123456789',
    1
  ),
  (
    2,
    'Sara',
    'Moncada',
    'MZ B CS # 12',
    '3045903443',
    2,
    'saray@gmail.com',
    '123456789',
    1
  ),
  (
    3,
    'Mauricio',
    'Rodriguez',
    'MZ Z CS # 35',
    '3121544884',
    1,
    'mauricio@email.com',
    '123456789',
    1
  ),
  (
    4,
    'Yamit',
    'Fonseca',
    'MZ Z CS # 45',
    '3049425847',
    3,
    'yamit@email.com',
    '123456789',
    3
  ),
  (
    5,
    'Maria',
    'Sanchez',
    'MZ B CS # 14',
    '3045960125',
    1,
    'maria@email.com',
    '123456789',
    1
  );

CREATE TABLE `user_formation_programs` (
  `id` int(11) NOT NULL,
  `formation_program` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO `user_formation_programs` (`id`, `formation_program`, `user`)
VALUES (6, 5, 1),
  (7, 5, 2),
  (8, 5, 3),
  (9, 5, 4),
  (10, 5, 5),
  (11, 6, 2),
  (13, 7, 1),
  (14, 7, 2);

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO `user_roles` (`id`, `user`, `role`)
VALUES (5, 1, 1),
  (9, 2, 3);

CREATE TABLE `user_roles_base` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO `user_roles_base` (`id`, `name`)
VALUES (1, 'Admin'),
  (3, 'User'),
  (4, 'Guest');

ALTER TABLE `cities`
ADD PRIMARY KEY (`id`);

ALTER TABLE `courses`
ADD PRIMARY KEY (`id`);

ALTER TABLE `formation_programs`
ADD PRIMARY KEY (`id`),
  ADD KEY `instructor` (`instructor`),
  ADD KEY `course` (`course`),
  ADD KEY `headquarter` (`headquarter`);

ALTER TABLE `headquarters`
ADD PRIMARY KEY (`id`);

ALTER TABLE `student_levels`
ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`),
  ADD KEY `student_level` (`student_level`);

ALTER TABLE `user_formation_programs`
ADD PRIMARY KEY (`id`),
  ADD KEY `formation_programs` (`formation_program`),
  ADD KEY `user` (`user`);

ALTER TABLE `user_roles`
ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `role` (`role`);

ALTER TABLE `user_roles_base`
ADD PRIMARY KEY (`id`);

ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;

ALTER TABLE `courses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

ALTER TABLE `formation_programs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;

ALTER TABLE `headquarters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

ALTER TABLE `student_levels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

ALTER TABLE `user_formation_programs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 15;

ALTER TABLE `user_roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;

ALTER TABLE `user_roles_base`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

ALTER TABLE `formation_programs`
ADD CONSTRAINT `formation_programs_ibfk_1` FOREIGN KEY (`instructor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `formation_programs_ibfk_2` FOREIGN KEY (`course`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `formation_programs_ibfk_3` FOREIGN KEY (`headquarter`) REFERENCES `headquarters` (`id`);

ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`student_level`) REFERENCES `student_levels` (`id`);

ALTER TABLE `user_formation_programs`
ADD CONSTRAINT `user_formation_programs_ibfk_1` FOREIGN KEY (`formation_program`) REFERENCES `formation_programs` (`id`),
  ADD CONSTRAINT `user_formation_programs_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

ALTER TABLE `user_roles`
ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role`) REFERENCES `user_roles_base` (`id`);

COMMIT;