<?php


namespace OpenWeatherMapApi\Data\PropertyInitializer;

/**
 * Trait InitializerTrait
 * @package OpenWeatherMapApi\Data\PropertyInitializer
 */
trait InitializerTrait
{
    /**
     * @var array
     */
    protected static $initPropertiesMap = [];

    /**
     * @var bool
     */
    protected $isLoaded = false;

    /**
     * @var int
     */
    protected $isAutoConstruct = false;

    /**
     * Array of initialization data
     *
     * @var array
     */
    protected $data = [];

    /**
     * @param array $props
     */
    protected function __construct(array $props = null)
    {
        $this->beforeInit();
        if ($this->isAutoConstruct) {
            $this->initAuto();
        } elseif (empty($props)) {
            $this->initDefaults();
        } else {
            $this->init($props);
        }
        $this->afterInit();
    }
    /**
     * @return $this
     */
    protected function beforeInit()
    {
        return $this;
    }
    /**
     * @return $this
     */
    final protected function initAuto()
    {
        foreach ($this as $prop => $value) {
            if (isset(static::$initPropertiesMap[$prop]) and $methodOrProp = static::$initPropertiesMap[$prop] and \method_exists($this,
                    $methodOrProp)
            ) {
                //if there is method then use it firstly
                \call_user_func([$this, $methodOrProp], $value, $prop);
            }
        }

        $this->isLoaded = true;
        return $this;
    }
    /**
     * @return $this
     */
    protected function initDefaults()
    {
        return $this;
    }

    /**
     * @param array $props
     *
     * @return $this
     */
    final protected function init(array $props)
    {
        //?reflection?
        foreach ($props as $prop => $value) {
            if (\method_exists($this, 'initPropertiesCustom')) {
                \call_user_func([$this, 'initPropertiesCustom'], $value, $prop, $props);
            } elseif (isset(static::$initPropertiesMap[$prop])) {
                $methodOrProp = static::$initPropertiesMap[$prop];
                if (\method_exists($this, $methodOrProp)) {
                    //if there is method then use it firstly
                    \call_user_func([$this, $methodOrProp], $value, $prop, $props);
                } elseif (\property_exists($this, $methodOrProp)) {
                    //if there is property then it just assign value
                    $this->{$methodOrProp} = $value;
                } else {
                    //otherwise fill help data array
                    //for following initialization
                    $this->data[$methodOrProp] = $value;
                    $this->data[$prop] = $value;
                }
            } else {
                //otherwise fill help data array
                $this->data[$prop] = $value;
            }
        }

        $this->isLoaded = true;
        return $this;
    }
    /**
     * @return $this
     */
    protected function afterInit()
    {
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $params
     *
     * @return static
     */
    public static function create(array $params = null)
    {
        return new static($params);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $ret = [];
        $map = static::$initPropertiesMap;
        foreach ($map as $key => $init) {
            if (\property_exists($this, $key)) {
                //if there is property then it just assign value
                $ret[$key] = $this->{$key};
            } elseif (isset($this[$key])) {
                //probably array access
                $ret[$key] = $this[$key];
            } else {
                $ret[$key] = null;
            }
        }
        return $ret;
    }

    /**
     * @param string $date
     * @param string $key
     *
     * @return $this
     */
    protected function initDatetime($date, $key)
    {
        return $this->initProperty(\strtotime($date), $key);
    }
    /**
     * @param $value
     * @param $key
     *
     * @return $this
     */
    protected function initProperty($value, $key)
    {
        $keys = \func_get_args();
        unset($keys[0]); //remove value
        if (\count($keys) > 1) {
            foreach ($keys as $key) {
                if (\property_exists($this, $key)) { //first found set
                    $this->{$key} = $value;
                    return $this;
                }
            }
        } elseif (\property_exists($this, $key)) {
            $this->{$key} = $value;
        }
        return $this;
    }
    /**
     * @param mixed $value
     * @param string $key
     *
     * @return $this
     */
    protected function initBool($value, $key)
    {
        return $this->initProperty(!empty($value), "is{$key}", $key);
    }
    /**
     * @param mixed $value
     * @param string $key
     *
     * @return $this
     */
    protected function initInt($value, $key)
    {
        return $this->initProperty((int)$value, $key);
    }
    /**
     * @param mixed $value
     * @param string $key
     *
     * @return $this
     */
    protected function initFloat($value, $key)
    {
        return $this->initProperty((float)$value, $key);
    }
    /**
     * @param string $rawData
     * @param string $key
     *
     * @return $this
     */
    protected function initJsonArray($rawData, $key)
    {
        $value = \json_decode($rawData, true, 512, JSON_BIGINT_AS_STRING);
        if (empty($value)) {
            //could not resolve -
            if ('null' === $rawData or '' === $rawData) {
                $value = [];
            } else {
                $value = (array)$rawData;
            }
        } else {
            $value = (array)$value;
        }
        return $this->initProperty($value, $key);
    }

    /**
     * @param mixed $value
     * @param string $key
     *
     * @return $this
     */
    protected function initExplode($value, $key)
    {
        return $this->initProperty(\explode(',', $value), "is{$key}", $key);
    }
}