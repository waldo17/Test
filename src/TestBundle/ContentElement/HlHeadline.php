<?php
namespace TestBundle\ContentElement;


class HlHeadline extends \ContentElement {
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_hlheadline';
	/**
	 * Generate the content element
	 */

	protected function compile() {
    if (TL_MODE == 'BE') {
      $this->genBeOutput();
    } else {
      $this->genFeOutput();
    }
  }

  private function genBeOutput(){
    $this->strTemplate          = 'be_wildcard';
    $this->Template             = new \BackendTemplate($this->strTemplate);
    $this->Template->title      = $this->headline;
    $this->Template->wildcard   = "### ContentProduct ###";
  }

	private function genFeOutput()
	{
		if ($this->productproperties != '') {
				$this->Template->arrProperties = deserialize($this->productproperties, true);
		}
	}
}

class_alias(HlHeadline::class, 'HlHeadline');
