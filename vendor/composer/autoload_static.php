<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitafb6b6b2a7ff8933af8bc810d638ca06
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sinergi\\BrowserDetector\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sinergi\\BrowserDetector\\' => 
        array (
            0 => __DIR__ . '/..' . '/sinergi/browser-detector/src',
        ),
    );

    public static $classMap = array (
        'ActiveRecord' => __DIR__ . '/../..' . '/../../../../../../../Services/ActiveRecord/class.ActiveRecord.php',
        'Sinergi\\BrowserDetector\\AcceptLanguage' => __DIR__ . '/..' . '/sinergi/browser-detector/src/AcceptLanguage.php',
        'Sinergi\\BrowserDetector\\Browser' => __DIR__ . '/..' . '/sinergi/browser-detector/src/Browser.php',
        'Sinergi\\BrowserDetector\\BrowserDetector' => __DIR__ . '/..' . '/sinergi/browser-detector/src/BrowserDetector.php',
        'Sinergi\\BrowserDetector\\DetectorInterface' => __DIR__ . '/..' . '/sinergi/browser-detector/src/DetectorInterface.php',
        'Sinergi\\BrowserDetector\\Device' => __DIR__ . '/..' . '/sinergi/browser-detector/src/Device.php',
        'Sinergi\\BrowserDetector\\DeviceDetector' => __DIR__ . '/..' . '/sinergi/browser-detector/src/DeviceDetector.php',
        'Sinergi\\BrowserDetector\\InvalidArgumentException' => __DIR__ . '/..' . '/sinergi/browser-detector/src/InvalidArgumentException.php',
        'Sinergi\\BrowserDetector\\Language' => __DIR__ . '/..' . '/sinergi/browser-detector/src/Language.php',
        'Sinergi\\BrowserDetector\\LanguageDetector' => __DIR__ . '/..' . '/sinergi/browser-detector/src/LanguageDetector.php',
        'Sinergi\\BrowserDetector\\Os' => __DIR__ . '/..' . '/sinergi/browser-detector/src/Os.php',
        'Sinergi\\BrowserDetector\\OsDetector' => __DIR__ . '/..' . '/sinergi/browser-detector/src/OsDetector.php',
        'Sinergi\\BrowserDetector\\UserAgent' => __DIR__ . '/..' . '/sinergi/browser-detector/src/UserAgent.php',
        'ilCurlConnection' => __DIR__ . '/../..' . '/../../../../../../../Services/WebServices/Curl/classes/class.ilCurlConnection.php',
        'ilDatePresentation' => __DIR__ . '/../..' . '/../../../../../../../Services/Calendar/classes/class.ilDatePresentation.php',
        'ilDateTime' => __DIR__ . '/../..' . '/../../../../../../../Services/Calendar/classes/class.ilDateTime.php',
        'ilEMailInputGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilEMailInputGUI.php',
        'ilFileInputGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilFileInputGUI.php',
        'ilHelpMeConfig' => __DIR__ . '/../..' . '/classes/Config/class.ilHelpMeConfig.php',
        'ilHelpMeConfigFormGUI' => __DIR__ . '/../..' . '/classes/Config/class.ilHelpMeConfigFormGUI.php',
        'ilHelpMeConfigGUI' => __DIR__ . '/../..' . '/classes/class.ilHelpMeConfigGUI.php',
        'ilHelpMeConfigPriority' => __DIR__ . '/../..' . '/classes/Config/class.ilHelpMeConfigPriority.php',
        'ilHelpMeConfigRole' => __DIR__ . '/../..' . '/classes/Config/class.ilHelpMeConfigRole.php',
        'ilHelpMeGUI' => __DIR__ . '/../..' . '/classes/class.ilHelpMeGUI.php',
        'ilHelpMePlugin' => __DIR__ . '/../..' . '/classes/class.ilHelpMePlugin.php',
        'ilHelpMeRecipient' => __DIR__ . '/../..' . '/classes/Recipient/class.ilHelpMeRecipient.php',
        'ilHelpMeRecipientCreateJiraTicket' => __DIR__ . '/../..' . '/classes/Recipient/class.ilHelpMeRecipientCreateJiraTicket.php',
        'ilHelpMeRecipientSendMail' => __DIR__ . '/../..' . '/classes/Recipient/class.ilHelpMeRecipientSendMail.php',
        'ilHelpMeRecipientSendMailSender' => __DIR__ . '/../..' . '/classes/Recipient/class.ilHelpMeRecipientSendMailSender.php',
        'ilHelpMeSuccessFormGUI' => __DIR__ . '/../..' . '/classes/Support/class.ilHelpMeSuccessFormGUI.php',
        'ilHelpMeSupport' => __DIR__ . '/../..' . '/classes/Support/class.ilHelpMeSupport.php',
        'ilHelpMeSupportFormGUI' => __DIR__ . '/../..' . '/classes/Support/class.ilHelpMeSupportFormGUI.php',
        'ilHelpMeUIHookGUI' => __DIR__ . '/../..' . '/classes/class.ilHelpMeUIHookGUI.php',
        'ilJiraCurl' => __DIR__ . '/../..' . '/classes/JiraCurl/class.ilJiraCurl.php',
        'ilMailMimeSenderUser' => __DIR__ . '/../..' . '/../../../../../../../Services/Mail/classes/Mime/Sender/class.ilMailMimeSenderUser.php',
        'ilMimeMail' => __DIR__ . '/../..' . '/../../../../../../../Services/Mail/classes/class.ilMimeMail.php',
        'ilModalGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/UIComponent/Modal/classes/class.ilModalGUI.php',
        'ilMultiSelectInputGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilMultiSelectInputGUI.php',
        'ilNonEditableValueGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilNonEditableValueGUI.php',
        'ilObjUser' => __DIR__ . '/../..' . '/../../../../../../../Services/User/classes/class.ilObjUser.php',
        'ilPasswordInputGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilPasswordInputGUI.php',
        'ilPluginConfigGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Component/classes/class.ilPluginConfigGUI.php',
        'ilPropertyFormGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilPropertyFormGUI.php',
        'ilRadioGroupInputGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilRadioGroupInputGUI.php',
        'ilRadioOption' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilRadioOption.php',
        'ilSelectInputGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilSelectInputGUI.php',
        'ilTextAreaInputGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilTextAreaInputGUI.php',
        'ilTextInputGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/Form/classes/class.ilTextInputGUI.php',
        'ilUIHookPluginGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/UIComponent/classes/class.ilUIHookPluginGUI.php',
        'ilUIPluginRouterGUI' => __DIR__ . '/../..' . '/../../../../../../../Services/UIComponent/classes/class.ilUIPluginRouterGUI.php',
        'ilUserInterfaceHookPlugin' => __DIR__ . '/../..' . '/../../../../../../../Services/UIComponent/classes/class.ilUserInterfaceHookPlugin.php',
        'ilUtil' => __DIR__ . '/../..' . '/../../../../../../../Services/Utilities/classes/class.ilUtil.php',
        'iljQueryUtil' => __DIR__ . '/../..' . '/../../../../../../../Services/jQuery/classes/class.iljQueryUtil.php',
        'srag\\DIC' => __DIR__ . '/../..' . '/../../../../Libraries/DICTrait/classes/DIC.php',
        'srag\\DICStatic' => __DIR__ . '/../..' . '/../../../../Libraries/DICTrait/classes/DICStatic.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitafb6b6b2a7ff8933af8bc810d638ca06::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitafb6b6b2a7ff8933af8bc810d638ca06::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitafb6b6b2a7ff8933af8bc810d638ca06::$classMap;

        }, null, ClassLoader::class);
    }
}
