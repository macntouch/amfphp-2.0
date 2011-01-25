<?php
/**
 * Used to generate a Flex Acknowledge message.
 * part of the AmfphpFlexMessaging plugin
 *
 * @author Ariel Sommeria-Klein
 */
class AmfphpFlexMessaging_AcknowledgeMessage
{
	public $_explicitType;
	public $correlationId;
        public $messageId;
        public $clientId;
        public $destination;
        public $body;
        public $timeToLive;
        public $timeStamp;
        public $headers;

	public function  __construct($correlationId)
	{
            $explicitTypeField = Amfphp_Core_Amf_Constants::FIELD_EXPLICIT_TYPE;
            $this->$explicitTypeField = AmfphpFlexMessaging::TYPE_FLEX_ACKNOWLEDGE_MESSAGE;
	    $this->correlationId = $correlationId;
	    $this->messageId = $this->generateRandomId();
	    $this->clientId = $this->generateRandomId();
	    $this->destination = null;
	    $this->body = null;
	    $this->timeToLive = 0;
	    $this->timestamp = (int) (time() . '00');
	    $this->headers = new stdClass();
	}

	public function generateRandomId()
	{
	   // version 4 UUID
	   return sprintf(
	       '%08X-%04X-%04X-%02X%02X-%012X',
	       mt_rand(),
	       mt_rand(0, 65535),
	       bindec(substr_replace(
	           sprintf('%016b', mt_rand(0, 65535)), '0100', 11, 4)
	       ),
	       bindec(substr_replace(sprintf('%08b', mt_rand(0, 255)), '01', 5, 2)),
	       mt_rand(0, 255),
	       mt_rand()
	   );
	}
}

?>
