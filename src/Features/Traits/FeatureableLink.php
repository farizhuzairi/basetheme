<?php

namespace Hascha\BaseTheme\Features\Traits;

trait FeatureableLink
{
    // Attributes ...
    protected ?string $_link = null;
    protected ?string $_textLink = null;

    /**
     * Set subject element
     * @return static
     */
    public function link(string $link, ?string $text)
    {
        $this->_link = $link;
        $this->_textLink = $text;
        return $this;
    }

    /**
     * Get linkable element
     * @return array
     */
    public function linkable(array $results)
    {
        $linkResult = function(?string $_link) use ($results) {
            if(array_key_exists('link', $results)) {
                if(empty($_link)) {
                    return $results['link'];
                }
            }
            return $_link;
        };

        $textResult = function(?string $_textLink) use ($results) {
            if(array_key_exists('textLink', $results)) {
                if(empty($_link)) {
                    return $results['textLink'];
                }
            }
            return $_textLink;
        };

        return array_merge($results, [
            'link' => $linkResult($this->_link),
            'textLink' => $textResult($this->_textLink),
        ]);
    }
}