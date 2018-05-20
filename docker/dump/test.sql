DROP TABLE IF EXISTS `families`;
CREATE TABLE `families` (
  `id` integer(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `quantity_members` integer(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `wars`;
CREATE TABLE `wars` (
  `id` integer(11) NOT NULL AUTO_INCREMENT,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `family_id_challenging` integer(11) NOT NULL,
  `family_id_challenged` integer(11) NOT NULL,
  `family_id_winner` integer(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
