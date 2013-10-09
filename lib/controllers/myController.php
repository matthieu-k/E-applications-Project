<?php
class myController extends ezcMvcController
{
	// formater les dates
    protected function formatDate($dateCreated)
    {
		$dateCreated1 = date("j/m/Y \a\\t G:i", strtotime($dateCreated));
        return $dateCreated1;
    }
	
	// calculer le nombre de lignes
	protected function countRows($object)
	{
		$session = ezcPersistentSessionInstance::get();
		$q = $session->createFindQuery($object);
		$objects = $session->findIterator($q, $object);

		$i = 0;
		foreach ( $objects as $object ) $i++;
		return $i;
	}

	// Creation de la page d'accueil
    public function doHome()
    {
		$ret = new ezcMvcResult;
		
		$session = ezcPersistentSessionInstance::get();
		$q = $session->createFindQuery('Article');
		$q->orderBy( 'dateCreated DESC' )->limit( 3 ); 
		$articles = $session->find($q, 'Article');

		foreach ( $articles as $article )
		{
			$article->dateCreated = $this->formatDate($article->dateCreated);
		}

		$ret->variables['articles'] = $articles;
		
        return $ret;
    }
	
	// Lister les articles
    public function doList()
    {
		$ret = new ezcMvcResult;
		
		$pageid = $this->id;
		$object = 'Article';
		
		// creation de la pagination
		$articlesPerPage = 4;
		$offset = $articlesPerPage * ($pageid-1);
		$totalrows = $this->countRows($object);
		$nbpage = ceil($totalrows/$articlesPerPage);
		
		$session = ezcPersistentSessionInstance::get();
		$q = $session->createFindQuery($object);
		$q->orderBy( 'dateCreated DESC' )->limit( $articlesPerPage, $offset ); 
		$articles = $session->findIterator($q, $object);

		$ret->variables['nbpage'] = $nbpage;
		$ret->variables['currentid'] = $pageid;
		$ret->variables['articles'] = $articles;
		
        return $ret;
    }
	
	// Page d'article
    public function doArticle()
    {
        $ret = new ezcMvcResult;
		
		$session = ezcPersistentSessionInstance::get();
		$article = $session->load('Article', $this->id);
		
		$article->dateCreated = $this->formatDate($article->dateCreated);
		
        $ret->variables['article'] = $article->getState();
        return $ret;
    }
	
	// Page d'ajout d'article
	public function doAdd()
	{
		$ret = new ezcMvcResult;
		return $ret;
	}
	
	// Ajoute l'article dans la base de donnees
	public function doAddsubmit()
	{
		$ret = new ezcMvcResult;
		
		$session = ezcPersistentSessionInstance::get();
		$article = new Article();
		
		$article->title = $_POST['title'];
		$article->excerpt = $_POST['excerpt'];
		$article->body = $_POST['body'];
		$article->urlSlug = $_POST['urlSlug'];
		$article->metaDescription = $_POST['metaDescription'];
		$article->metaKeywords = $_POST['metaKeywords'];
		$article->tags = $_POST['tags'];
		$article->dateCreated = date("Y-m-d G:i:s");
		$article->dateUpdated = date("0000-00-00 00:00:00");
		
		$session->save($article);

		return $ret;
		
	}
	
	// Page d'edition de l'article
    public function doEdit()
    {
        $ret = new ezcMvcResult;
		
		$session = ezcPersistentSessionInstance::get();
		$article = $session->load('Article', $this->id);
        $ret->variables['article'] = $article->getState();
        return $ret;
    }
	
	// Mise a jour de l'article dans la base de donnees
	public function doEditsubmit()
	{
		$ret = new ezcMvcResult;
		
		$session = ezcPersistentSessionInstance::get();
		$article = $session->load('Article', $this->id);
        
		$article->title = $_POST['title'];
		$article->excerpt = $_POST['excerpt'];
		$article->body = $_POST['body'];
		$article->urlSlug = $_POST['urlSlug'];
		$article->metaDescription = $_POST['metaDescription'];
		$article->metaKeywords = $_POST['metaKeywords'];
		$article->tags = $_POST['tags'];
		$article->dateUpdated = date("Y-m-d G:i:s");
		
		$session->update( $article ); 
		
		$ret->variables['article'] = $article->getState();
		
		return $ret;
		
	}
	
	// Effacer un article
	public function doDelete()
	{
		$ret = new ezcMvcResult;
		
		$session = ezcPersistentSessionInstance::get();
		$article = $session->load('Article', $this->id);
		
		$session->delete( $article ); 
		
		return $ret;
		
	}
	
	// Page About
	public function doAbout()
	{
		$ret = new ezcMvcResult;
		return $ret;
	}
	
	// Page Contact
	public function doContact()
	{
		$ret = new ezcMvcResult;
		return $ret;
	}
	
	// Envoie de mail par SMTP
	public function doContacted()
	{
		$ret = new ezcMvcResult;
		
		try 
		{
			$mail = new ezcMailComposer();
			$mail->from = new ezcMailAddress( 'webmaster@whitefenix.com', $_POST['name'] );
			$mail->addTo( new ezcMailAddress( 'mat.kapetanos@gmail.com', 'Matthieu KAPETANOS' ) );
			$mail->addTo( new ezcMailAddress( 'steeve.tuvee@gmail.com', 'Steeve TUVEE' ) );
			$mail->subject = "[Message from e-application contact form] " . $_POST['sujet'];
			$mail->htmlText  = "From: ". $_POST['email'] ."<br />Subject: ". $_POST['sujet'] ."<br />Date: ". date("j/m/Y \a\\t G:i") ."<br /><br />Message: ".$_POST['message'];
			$mail->build();
			$options = new ezcMailSmtpTransportOptions();
			$options->connectionType = ezcMailSmtpTransport::CONNECTION_PLAIN;
			$transport = new ezcMailSmtpTransport( 'whitefenix.com', 'webmaster@whitefenix.com', 'wewh2$fex', '25', $options );
			$transport->options->connectionType = ezcMailSmtpTransport::CONNECTION_PLAIN;
			$transport->send( $mail ); 
			$ret->variables['message'] = "Your e-mail has been succesfully sent.";
		}
		catch ( Exception $e )
		{
			$ret->variables['message'] = "There is an error sending your message<br />". $e->getMessage();
		}
		
		return $ret;
	}
	
	// Page d'erreur
	public function doError()
	{
		$ret = new ezcMvcResult;
		$ret->variables['error'] = 'The page you requested does not exist.';
		
		return $ret;
	}
}
?>
