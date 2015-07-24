<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\GoogleAuthenticator;

use Piwik\Piwik;
use Piwik\QuickForm2;

/**
 *
 */
class FormAuthCode extends QuickForm2
{
    function __construct($id = 'login_form', $method = 'post', $attributes = null, $trackSubmit = false)
    {
        parent::__construct($id, $method, $attributes, $trackSubmit);
    }

    function init()
    {
        $this->addElement('text', 'form_login')
            ->addRule('required', Piwik::translate('General_Required', Piwik::translate('General_Username')));

        $this->addElement('text', 'form_authcode')
            ->addRule('required',
                Piwik::translate('General_Required', Piwik::translate('GoogleAuthenticator_AuthCode')));

        $this->addElement('hidden', 'form_nonce');

        $this->addElement('submit', 'submit');
    }
}
