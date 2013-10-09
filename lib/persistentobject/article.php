<?php
class Article {

	public $id = null;
	public $title = null;
	public $excerpt = null;
	public $body = null;
	public $metaDescription = null;
	public $metaKeywords = null;
	public $urlSlug = null;
	public $tags = null;
	public $dateCreated = null;
	public $dateUpdated = null;

	public function getState() {
		$result = array();
		$result['id'] = $this->id;
		$result['title'] = $this->title;
		$result['excerpt'] = $this->excerpt;
		$result['body'] = $this->body;
		$result['metaDescription'] = $this->metaDescription;
		$result['metaKeywords'] = $this->metaKeywords;
		$result['urlSlug'] = $this->urlSlug;
		$result['tags'] = $this->tags;
		$result['dateCreated'] = $this->dateCreated;
		$result['dateUpdated'] = $this->dateUpdated;
		return $result;
	}
	
	public function setState ( array $properties ) {
		foreach ( $properties as $key => $value ) {
			$this->$key = $value;
		}
	}
}
?>