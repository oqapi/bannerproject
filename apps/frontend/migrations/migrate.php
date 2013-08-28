<?php

// migrate.php
require_once('bootstrap.php');

$migration = new Doctrine_Migration( 'migrations' );
$migration->migrate();


// migrations/2_add_column.php
class AddColumn extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn( 'banner', 'banner_kind', 'string' );
    }

    public function down()
    {
        $this->removeColumn( 'banner', 'banner_kind' );
    }
}