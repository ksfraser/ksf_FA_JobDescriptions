<?php
/**
 * FA_JobDescriptions Module Hooks for FrontAccounting
 */

define('SS_JOBDESC', 119 << 8);

class hooks_fa_jobdescriptions extends hooks {
    var $module_name = 'fa_jobdescriptions';

    function install_options($app) {
        global $path_to_root;

        switch($app->id) {
            case 'HR':
                $app->add_lapp_function(0, _("Job Descriptions"),
                    $path_to_root."/modules/".$this->module_name."/job_descriptions.php", 'SA_JOBDESCVIEW', MENU_ENTRY);
                $app->add_lapp_function(1, _("Create Description"),
                    $path_to_root."/modules/".$this->module_name."/create.php", 'SA_JOBDESCCREATE', MENU_ENTRY);
                break;
        }
    }

    function install_access() {
        $security_sections[SS_JOBDESC] = _("Job Descriptions");
        $security_areas['SA_JOBDESCVIEW'] = array(SS_JOBDESC | 1, _("View Descriptions"));
        $security_areas['SA_JOBDESCCREATE'] = array(SS_JOBDESC | 2, _("Create Descriptions"));
        return array($security_areas, $security_sections);
    }

    function activate_extension($company, $check_only=true) {
        $updates = array('sql/update.sql' => array($this->module_name));
        $ok = $this->update_databases($company, $updates, $check_only);
        if ($check_only || !$ok) {
            return $ok;
        }
        $this->ensure_jobdesc_schema();
        return $ok;
    }

    private function table_exists($table) {
        $sql = "SHOW TABLES LIKE " . db_escape($table);
        $res = db_query($sql, 'Failed checking table existence');
        return db_num_rows($res) > 0;
    }

    private function ensure_jobdesc_schema() {
        $tables = array(
            TB_PREF . "fa_job_descriptions" => "
                CREATE TABLE IF NOT EXISTS `" . TB_PREF . "fa_job_descriptions` (
                    `id` INT(11) NOT NULL AUTO_INCREMENT,
                    `title` VARCHAR(100) NOT NULL,
                    `department` VARCHAR(50) DEFAULT NULL,
                    `description` TEXT,
                    `requirements` TEXT,
                    `responsibilities` TEXT,
                    `salary_range` VARCHAR(50) DEFAULT NULL,
                    `status` VARCHAR(20) DEFAULT 'Active',
                    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    PRIMARY KEY (`id`),
                    KEY `idx_status` (`status`),
                    KEY `idx_department` (`department`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
        );

        foreach ($tables as $table_name => $sql) {
            db_query($sql, "Could not create Job Descriptions table: $table_name");
        }
    }

    function db_prevoid($trans_type, $trans_no) {
        // Handle voiding if needed
    }
}
?>
