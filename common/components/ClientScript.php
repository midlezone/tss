<?php

class ClientScript extends CClientScript {

    //
    protected $headString = ''; // add string to head section

    //
    
    /**
     * set head tring value, if replace is true $headString = value, false $headString.=value
     * @param type $string
     * @param type $replace
     */
    function setHeadString($string = '', $replace = false) {
        if (!$replace) {
            $this->headString.=$string;
        } else
            $this->headString = $string;
    }

    /**
     * Inserts the scripts in the head section. extends from ClientScipt
     * @param type $output
     */
    function renderHead(&$output) {
        $html = '';
        //foreach ($this->metaTags as $meta)
          //  $html.=CHtml::metaTag($meta['content'], null, null, $meta) . "\n";
        foreach ($this->linkTags as $link)
            $html.=CHtml::linkTag(null, null, null, null, $link) . "\n";
        foreach ($this->cssFiles as $url => $media)
            $html.=CHtml::cssFile($url, $media) . "\n";
        foreach ($this->css as $css)
            $html.=CHtml::css($css[0], $css[1]) . "\n";
        if ($this->enableJavaScript) {
            if (isset($this->scriptFiles[self::POS_HEAD])) {
                foreach ($this->scriptFiles[self::POS_HEAD] as $scriptFileValueUrl => $scriptFileValue) {
                    if (is_array($scriptFileValue))
                        $html.=CHtml::scriptFile($scriptFileValueUrl, $scriptFileValue) . "\n";
                    else
                        $html.=CHtml::scriptFile($scriptFileValueUrl) . "\n";
                }
            }

            if (isset($this->scripts[self::POS_HEAD]))
                $html.=$this->renderScriptBatch($this->scripts[self::POS_HEAD]);
        }
        //
        if ($this->headString) {
            $html.=$this->headString;
        }
        //
        if ($html !== '') {
            $count = 0;
            $output = preg_replace('/(<title\b[^>]*>|<\\/head\s*>)/is', '<###head###>$1', $output, 1, $count);
            if ($count)
                $output = str_replace('<###head###>', $html, $output);
            else
                $output = $html . $output;
        }
    }

}
