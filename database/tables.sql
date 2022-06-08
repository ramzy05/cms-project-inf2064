CREATE TABLE `identite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mairie` varchar(255) NOT NULL,
  `msg_welcome` text NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'default_logo.png',
  `histoire` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4	


INSERT INTO `identite` (`id`, `nom_mairie`, `msg_welcome`, `logo`, `histoire`) VALUES (NULL, 'yaoundé', 'Bienvenue sur notre site web', 'default_logo.png', 'histoire de la mairie ici')


CREATE TABLE `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE `lieu_touristique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default_lieu.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE `conseil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default_member.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4


CREATE TABLE `personnel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default_personnel.png',
  `cv` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE `missions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descriptions` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE `parcours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnel` int(11) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_personnel` (`id_personnel`),
  CONSTRAINT `parcours_ibfk_1` FOREIGN KEY (`id_personnel`) REFERENCES `personnel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4