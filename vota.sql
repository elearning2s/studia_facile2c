CREATE TABLE IF NOT EXISTS `voting_count` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `unique_content_id` VARCHAR(100) NOT NULL,
  `vote_up` INT(11) NOT NULL,
  `vote_down` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
);