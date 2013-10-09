<?php
class router extends ezcMvcRouter
{
    public function createRoutes()
    {
        return array(
            new ezcMvcRailsRoute( '/', 'myController', 'home' ),
            new ezcMvcRailsRoute( '/about', 'myController', 'about' ),
            new ezcMvcRailsRoute( '/contact', 'myController', 'contact' ),
            new ezcMvcRailsRoute( '/contacted', 'myController', 'contacted' ),
            new ezcMvcRailsRoute( '/article/:id/:urlSlug', 'myController', 'article' ),
			new ezcMvcRailsRoute( '/list/:id', 'myController', 'list' ),
            new ezcMvcRailsRoute( '/edit/:id', 'myController', 'edit' ),
			new ezcMvcRailsRoute( '/editsubmit/:id', 'myController', 'editsubmit' ),
			new ezcMvcRailsRoute( '/add', 'myController', 'add' ),
			new ezcMvcRailsRoute( '/addsubmit', 'myController', 'addsubmit' ),
			new ezcMvcRailsRoute( '/delete/:id', 'myController', 'delete' ),
            new ezcMvcRailsRoute( '/error', 'myController', 'error' )
        );
    }
}
?>
