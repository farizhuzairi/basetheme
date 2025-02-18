<?php

namespace Hascha\BaseTheme\Features\Traits;

trait FeatureableSubject
{
    // Subject attributes ...
    protected ?string $_subject = null;
    protected ?string $_introduction = null;
    protected ?string $_subText = null;

    /**
     * Set subject element
     * @return static
     */
    public function subject(?string $subject, ?string $introduction = null, ?string $subText = null)
    {
        $this->_subject = $subject;
        $this->_introduction = $introduction;
        $this->_subText = $subText;
        return $this;
    }

    /**
     * Get subject element
     * @return array
     */
    public function subjectable(array $results)
    {
        $subjectResult = function(?string $_subject) use ($results) {
            if(array_key_exists('subject', $results)) {
                if(empty($_subject)) {
                    return $results['subject'];
                }
            }
            return $_subject;
        };

        $introductionResult = function(?string $_introduction) use ($results) {
            if(array_key_exists('introduction', $results)) {
                if(empty($_introduction)) {
                    return $results['introduction'];
                }
            }
            return $_introduction;
        };

        $subTextResult = function(?string $_subText) use ($results) {
            if(array_key_exists('subText', $results)) {
                if(empty($_subText)) {
                    return $results['subText'];
                }
            }
            return $_subText;
        };

        return array_merge($results, [
            'subject' => $subjectResult($this->_subject),
            'introduction' => $introductionResult($this->_introduction),
            'subText' => $subTextResult($this->_subText),
        ]);
    }
}