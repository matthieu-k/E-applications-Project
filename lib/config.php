<?php
class helloMvcConfiguration implements ezcMvcDispatcherConfiguration
{
    function createRequestParser()
    {
        $parser = new ezcMvcHttpRequestParser;
        
        // For index.php/REQUEST
        if ( strpos( $_SERVER['REQUEST_URI'], 'index.php/' ) !== false )
        {
            $parser->prefix = $_SERVER['SCRIPT_NAME'];
        }
        // FOR /, index.php and index.php/
        else
        {
            $parser->prefix = preg_replace( '@/index\.php$@', '', $_SERVER['SCRIPT_NAME'] );
        }

        return $parser;
    }

    function createRouter( ezcMvcRequest $request )
    {
        return new router( $request );
    }

    function createView( ezcMvcRoutingInformation $routeInfo, ezcMvcRequest $request, ezcMvcResult $result )
    {
        switch ( $routeInfo->matchedRoute )
        {
            case '/':
                return new rootView( $request, $result );
            case '/article/:id/:urlSlug':
                return new articleView( $request, $result );
            case '/list/:id':
                return new listView( $request, $result );
            case '/add':
                return new addView( $request, $result );
            case '/addsubmit':
                return new addSubmitView( $request, $result );
            case '/edit/:id':
                return new editView( $request, $result );
            case '/editsubmit/:id':
                return new articleView( $request, $result );
            case '/delete/:id':
                return new deleteView( $request, $result );
            case '/about':
                return new aboutView( $request, $result );
			case '/contact':
                return new contactView( $request, $result );
			case '/contacted':
                return new contactedView( $request, $result );
			case '/error':
                return new errorView( $request, $result );
        }
    }

    function createResponseWriter( ezcMvcRoutingInformation $routeInfo, ezcMvcRequest $request, ezcMvcResult $result, ezcMvcResponse $response )
    {
        return new ezcMvcHttpResponseWriter( $response );
    }

    function createFatalRedirectRequest( ezcMvcRequest $request, ezcMvcResult $result, Exception $response )
    {
        //var_Dump( $request, $result, $response );
        $req = clone $request;
        $req->uri = '/error';

        return $req;
    }

    function runPreRoutingFilters( ezcMvcRequest $request )
    {
    }

    function runRequestFilters( ezcMvcRoutingInformation $routeInfo, ezcMvcRequest $request )
    {
    }

    function runResultFilters( ezcMvcRoutingInformation $routeInfo, ezcMvcRequest $request, ezcMvcResult $result )
    {
        $result->variables['installRoot'] = preg_replace( '@/index\.php$@', '', $_SERVER['SCRIPT_NAME'] );
    }

    function runResponseFilters( ezcMvcRoutingInformation $routeInfo, ezcMvcRequest $request, ezcMvcResult $result, ezcMvcResponse $response )
    {
    }
}
?>
