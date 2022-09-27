CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `city` int,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_level` int
);

CREATE TABLE `user_formation_programs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `formation_programs` int,
  `user` int
);

CREATE TABLE `user_roles` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user` int,
  `role` int
);

CREATE TABLE `user_roles_base` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `cities` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `courses` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `student_levels` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `headquarters` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `formation_programs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `instructor` int,
  `course` int,
  `headquarter` int
);

ALTER TABLE `users`
ADD FOREIGN KEY (`city`) REFERENCES `cities` (`id`);

ALTER TABLE `users`
ADD FOREIGN KEY (`student_level`) REFERENCES `student_levels` (`id`);

ALTER TABLE `user_formation_programs`
ADD FOREIGN KEY (`formation_programs`) REFERENCES `formation_programs` (`id`);

ALTER TABLE `user_formation_programs`
ADD FOREIGN KEY (`user`) REFERENCES `users` (`id`);

ALTER TABLE `user_roles`
ADD FOREIGN KEY (`user`) REFERENCES `users` (`id`);

ALTER TABLE `user_roles`
ADD FOREIGN KEY (`role`) REFERENCES `user_roles_base` (`id`);

ALTER TABLE `formation_programs`
ADD FOREIGN KEY (`instructor`) REFERENCES `users` (`id`);

ALTER TABLE `formation_programs`
ADD FOREIGN KEY (`course`) REFERENCES `courses` (`id`);

ALTER TABLE `formation_programs`
ADD FOREIGN KEY (`headquarter`) REFERENCES `headquarters` (`id`);