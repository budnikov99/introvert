<?php
/**
 * Mail
 *
 * PHP version 5
 *
 * @category Class
 * @package  Introvert
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * INTROVERT API
 *
 * No descripton provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)
 *
 * OpenAPI spec version: 0.1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Introvert\Model;

use \ArrayAccess;

/**
 * Mail Class Doc Comment
 *
 * @category    Class */
/**
 * @package     Introvert
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Mail implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Mail';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'msg' => 'string',
        'subject' => 'string',
        'from' => '\Introvert\Model\MailFrom',
        'to' => '\Introvert\Model\MailTo[]',
        'additional_data' => '\Introvert\Model\MailAdditional'
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'msg' => 'msg',
        'subject' => 'subject',
        'from' => 'from',
        'to' => 'to',
        'additional_data' => 'additional_data'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'msg' => 'setMsg',
        'subject' => 'setSubject',
        'from' => 'setFrom',
        'to' => 'setTo',
        'additional_data' => 'setAdditionalData'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'msg' => 'getMsg',
        'subject' => 'getSubject',
        'from' => 'getFrom',
        'to' => 'getTo',
        'additional_data' => 'getAdditionalData'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['msg'] = isset($data['msg']) ? $data['msg'] : null;
        $this->container['subject'] = isset($data['subject']) ? $data['subject'] : null;
        $this->container['from'] = isset($data['from']) ? $data['from'] : null;
        $this->container['to'] = isset($data['to']) ? $data['to'] : null;
        $this->container['additional_data'] = isset($data['additional_data']) ? $data['additional_data'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];
        if ($this->container['msg'] === null) {
            $invalid_properties[] = "'msg' can't be null";
        }
        if ($this->container['subject'] === null) {
            $invalid_properties[] = "'subject' can't be null";
        }
        if ($this->container['from'] === null) {
            $invalid_properties[] = "'from' can't be null";
        }
        if ($this->container['to'] === null) {
            $invalid_properties[] = "'to' can't be null";
        }
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        if ($this->container['msg'] === null) {
            return false;
        }
        if ($this->container['subject'] === null) {
            return false;
        }
        if ($this->container['from'] === null) {
            return false;
        }
        if ($this->container['to'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets msg
     * @return string
     */
    public function getMsg()
    {
        return $this->container['msg'];
    }

    /**
     * Sets msg
     * @param string $msg 
     * @return $this
     */
    public function setMsg($msg)
    {
        $this->container['msg'] = $msg;

        return $this;
    }

    /**
     * Gets subject
     * @return string
     */
    public function getSubject()
    {
        return $this->container['subject'];
    }

    /**
     * Sets subject
     * @param string $subject 
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->container['subject'] = $subject;

        return $this;
    }

    /**
     * Gets from
     * @return \Introvert\Model\MailFrom | array
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     * @param \Introvert\Model\MailFrom | array $from 
     * @return $this
     */
    public function setFrom($from)
    {
        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets to
     * @return \Introvert\Model\MailTo[] | array
     */
    public function getTo()
    {
        return $this->container['to'];
    }

    /**
     * Sets to
     * @param \Introvert\Model\MailTo[] | array $to 
     * @return $this
     */
    public function setTo($to)
    {
        $this->container['to'] = $to;

        return $this;
    }

    /**
     * Gets additional_data
     * @return \Introvert\Model\MailAdditional | array
     */
    public function getAdditionalData()
    {
        return $this->container['additional_data'];
    }

    /**
     * Sets additional_data
     * @param \Introvert\Model\MailAdditional | array $additional_data Дополнительные параметры, необязательный параметр
     * @return $this
     */
    public function setAdditionalData($additional_data)
    {
        $this->container['additional_data'] = $additional_data;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Introvert\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Introvert\ObjectSerializer::sanitizeForSerialization($this));
    }
}

