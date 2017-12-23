create database 'UserData.db';

use users;

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` TEXT NOT NULL,
  `password` TEXT NOT NULL,
  `name` TEXT NOT NULL,
  `email` TEXT NOT NULL,
  `phone` TEXT NOT NULL,
  `role` TEXT NOT NULL,
  `active` TEXT NOT NULL,
  `last` TEXT NOT NULL,
  PRIMARY KEY  (`id`)
);