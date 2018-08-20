<?php

/**
 * Class ilHelpMeRecipientSendMail
 */
class ilHelpMeRecipientSendMail extends ilHelpMeRecipient {

	/**
	 * ilHelpMeRecipientSendMail constructor
	 *
	 * @param ilHelpMeSupport $support
	 * @param ilHelpMeConfig  $config
	 */
	public function __construct(ilHelpMeSupport $support, ilHelpMeConfig $config) {
		parent::__construct($support, $config);
	}


	/**
	 * Send support to recipient
	 *
	 * @return bool
	 */
	public function sendSupportToRecipient() {
		return ($this->sendEmail() && $this->sendConfirmationMail());
	}


	/**
	 * Send support email
	 *
	 * @return bool
	 */
	public function sendEmail() {
		try {
			$mailer = new ilMimeMail();

			if (ILIAS_VERSION_NUMERIC >= "5.3") {
				$mailer->From(new ilHelpMeRecipientSendMailSender($this->support));
			} else {
				$mailer->From([ $this->support->getEmail(), $this->support->getName() ]);
			}

			$mailer->To($this->config->getSendEmailAddress());

			$mailer->Subject($this->support->getSubject());

			$mailer->Body($this->support->getBody("email"));

			foreach ($this->support->getScreenshots() as $screenshot) {
				$mailer->Attach($screenshot["tmp_name"], $screenshot["type"], "attachment", $screenshot["name"]);
			}

			$mailer->Send();

			return true;
		} catch (Exception $ex) {
			return false;
		}
	}
}
