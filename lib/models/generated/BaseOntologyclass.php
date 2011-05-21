<?php

/**
 * BaseOntologyclass
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property Doctrine_Collection $Objectproperties
 * @property Doctrine_Collection $Datatypeproperties
 * @property Doctrine_Collection $OntologyclassDatatypeproperties
 * @property Doctrine_Collection $OntologyclassObjectproperties
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOntologyclass extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('ontologyclass');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => '8',
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('label', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));

        $this->option('collation', 'utf8_general_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'MEMORY');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Objectproperty as Objectproperties', array(
             'refClass' => 'OntologyclassObjectproperty',
             'local' => 'ontologyclass_id',
             'foreign' => 'objectproperty_id'));

        $this->hasMany('Datatypeproperty as Datatypeproperties', array(
             'refClass' => 'OntologyclassDatatypeproperty',
             'local' => 'ontologyclass_id',
             'foreign' => 'datatypeproperty_id'));

        $this->hasMany('OntologyclassDatatypeproperty as OntologyclassDatatypeproperties', array(
             'local' => 'id',
             'foreign' => 'ontologyclass_id'));

        $this->hasMany('OntologyclassObjectproperty as OntologyclassObjectproperties', array(
             'local' => 'id',
             'foreign' => 'ontologyclass_id'));

        $nestedset0 = new Doctrine_Template_NestedSet(array(
             'hasManyRoots' => true,
             'rootColumnName' => 'root_id',
             ));
        $this->actAs($nestedset0);
    }
}