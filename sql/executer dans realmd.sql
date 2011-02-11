ALTER TABLE `account` ADD COLUMN `date_vote` datetime NOT NULL DEFAULT '2007-12-16 14:00:00'  AFTER `locale` ;
ALTER TABLE `account` ADD COLUMN `vote` int(10) NOT NULL DEFAULT 0  AFTER `locale` ;
ALTER TABLE `account` ADD COLUMN `points` int(11) NOT NULL DEFAULT 0  AFTER `locale` ;
