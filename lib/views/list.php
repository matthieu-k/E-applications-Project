<?php
class listView extends ezcMvcView
{
    function createZones( $layout )
    {
        $zones = array();
        $zones[] = new ezcMvcTemplateViewHandler( 'content', 'list.ezt' );
		$zones[] = new ezcMvcTemplateViewHandler( 'header', 'header.ezt' );
		$zones[] = new ezcMvcTemplateViewHandler( 'footer', 'footer.ezt' );
		$zones[] = new ezcMvcTemplateViewHandler( 'aside', 'aside.ezt' );
        $zones[] = new ezcMvcTemplateViewHandler( 'page_layout', 'layout.ezt' );
        return $zones;
    }
}
?>
