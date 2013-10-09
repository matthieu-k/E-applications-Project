<?php
$def = new ezcPersistentObjectDefinition();
$def->table = "articles";
$def->class = "Article";

$def->idProperty = new ezcPersistentObjectIdProperty;
$def->idProperty->columnName = 'id';
$def->idProperty->propertyName = 'id';
$def->idProperty->generator = new ezcPersistentGeneratorDefinition( 'ezcPersistentNativeGenerator' );

$def->properties['title'] = new ezcPersistentObjectProperty;
$def->properties['title']->columnName = 'title';
$def->properties['title']->propertyName = 'title';
$def->properties['title']->propertyType = ezcPersistentObjectProperty::PHP_TYPE_STRING;

$def->properties['excerpt'] = new ezcPersistentObjectProperty;
$def->properties['excerpt']->columnName = 'excerpt';
$def->properties['excerpt']->propertyName = 'excerpt';
$def->properties['excerpt']->propertyType = ezcPersistentObjectProperty::PHP_TYPE_STRING;

$def->properties['body'] = new ezcPersistentObjectProperty;
$def->properties['body']->columnName = 'body';
$def->properties['body']->propertyName = 'body';
$def->properties['body']->propertyType = ezcPersistentObjectProperty::PHP_TYPE_STRING;

$def->properties['metaDescription'] = new ezcPersistentObjectProperty;
$def->properties['metaDescription']->columnName = 'metaDescription';
$def->properties['metaDescription']->propertyName = 'metaDescription';
$def->properties['metaDescription']->propertyType = ezcPersistentObjectProperty::PHP_TYPE_STRING;

$def->properties['metaKeywords'] = new ezcPersistentObjectProperty;
$def->properties['metaKeywords']->columnName = 'metaKeywords';
$def->properties['metaKeywords']->propertyName = 'metaKeywords';
$def->properties['metaKeywords']->propertyType = ezcPersistentObjectProperty::PHP_TYPE_STRING;

$def->properties['urlSlug'] = new ezcPersistentObjectProperty;
$def->properties['urlSlug']->columnName = 'urlSlug';
$def->properties['urlSlug']->propertyName = 'urlSlug';
$def->properties['urlSlug']->propertyType = ezcPersistentObjectProperty::PHP_TYPE_STRING;

$def->properties['tags'] = new ezcPersistentObjectProperty;
$def->properties['tags']->columnName = 'tags';
$def->properties['tags']->propertyName = 'tags';
$def->properties['tags']->propertyType = ezcPersistentObjectProperty::PHP_TYPE_STRING;

$def->properties['dateCreated'] = new ezcPersistentObjectProperty;
$def->properties['dateCreated']->columnName = 'dateCreated';
$def->properties['dateCreated']->propertyName = 'dateCreated';
$def->properties['dateCreated']->propertyType = ezcPersistentObjectProperty::PHP_TYPE_STRING;

$def->properties['dateUpdated'] = new ezcPersistentObjectProperty;
$def->properties['dateUpdated']->columnName = 'dateUpdated';
$def->properties['dateUpdated']->propertyName = 'dateUpdated';
$def->properties['dateUpdated']->propertyType = ezcPersistentObjectProperty::PHP_TYPE_STRING;

return $def; 
?>