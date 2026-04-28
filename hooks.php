<?php
$module_id = 'JobDescriptions'; $module_version = '1.0.0'; $module_name = 'Job Descriptions'; $module_description = 'Job description management';
$module_tables = ['fa_job_descriptions']; $module_capabilities = ['SA_JOBDESCVIEW'=>'View Descriptions','SA_JOBDESCCREATE'=>'Create Descriptions'];
function jobdesc_install():bool{return install_module_sql('JobDescriptions');}function jobdesc_enable():bool{return enable_module('JobDescriptions');}function jobdesc_disable():bool{return disable_module('JobDescriptions');}function jobdesc_remove():bool{return remove_module_sql('JobDescriptions');}
add_module($module_name,$module_version,$module_description);