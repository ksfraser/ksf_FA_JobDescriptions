-- JobDescriptions module database schema for FrontAccounting

CREATE TABLE IF NOT EXISTS `fa_job_descriptions` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `department` VARCHAR(100) DEFAULT NULL,
    `level` VARCHAR(50) DEFAULT NULL,
    `summary` TEXT,
    `responsibilities` TEXT,
    `qualifications` TEXT,
    `skills` TEXT,
    `status` ENUM('Active','Inactive') NOT NULL DEFAULT 'Active',
    `created_by` INT(11) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `department` (`department`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `fa_modules` (`name`, `version`, `enabled`, `installed`) VALUES ('JobDescriptions', '1.0.0', 1, NOW()) ON DUPLICATE KEY UPDATE `version` = '1.0.0';