<?php
/*
 * Use this to create fresh schema files
 */

require_once ('./config/config.php');
require_once(LIBPATH.'SchemaBuilder.class.php');
echo "\nGenerating schemas...\n";
SchemaBuilder::init();
SchemaBuilder::generateSchemas('tutelage_db');
echo "Schema generation complete\n";
?>
