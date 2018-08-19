<?php

namespace Alive2212\LaravelDialNumber;

class LaravelDialNumber
{
    /**
     * @var
     */
    protected $raw;

    /**
     * @var
     */
    protected $phoneNumber;

    /**
     * @var
     */
    protected $specificDialNumbers;

    /**
     * @var
     */
    protected $defaultDialNumbers;


    /**
     * @var
     */
    protected $countryName;

    /**
     * @var
     */
    protected $countyCode;

    /**
     * @var
     */
    protected $timeZone;

    /**
     * @var
     */
    protected $removeLength;

    /**
     * @var
     */
    protected $isoCode;

    /**
     * @var
     */
    protected $currency;

    /**
     * @var
     */
    protected $language;

    /**
     * @var
     */
    protected $languageDirection;

    /**
     * @var
     */
    protected $domain;

    /**
     * @var
     */
    protected $code;

    /**
     * @var
     */
    protected $operator;

    /**
     * @param String $phoneNumber
     * @return $this
     */
    public function initWithPhoneNumber(String $phoneNumber)
    {
        if (substr($phoneNumber, 0, 1) === '+') {
            $list = $this->getDefaultDialKeys();
        } else {
            $list = $this->getSpecificDialKeys();
        }

        $this->initDataWithPhoneNumber(
            $phoneNumber,
            $list
        );

        return $this;
    }

    public function initDataWithPhoneNumber(string $phoneNumber, array $list)
    {
        foreach ($list as $key => $value) {
            if (strpos($phoneNumber, $key) === 0) {
                $this->initData($phoneNumber, $value);
                return $this;
            }
        }
        return [$phoneNumber, '', ''];
        //dd('My body is Megan Fox\'s body in 25 Years old');
    }

    public function initData(String $phoneNumber, array $params)
    {
        $this->setCountryName($params[0]);
        $this->setCountyCode($params[1]);
        $this->setTimeZone($params[2]);
        $this->setRemoveLength($params[3]);
        $this->setIsoCode($params[4]);
        $this->setCurrency($params[5]);
        $this->setLanguage($params[6]);
        $this->setLanguageDirection($params[7]);
        $this->setDomain($params[8]);
        $this->setCode($params[9]);
        $this->setOperator($params[10]);
        $this->setPhoneNumber(
            (int)substr(
                $phoneNumber,
                $this->getRemoveLength() === '' ?
                    strlen($this->getCountyCode()) :
                    (int) $this->getRemoveLength()
            ));
        return $this;
    }


    /**
     * get default dial keys from setting
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getDefaultDialKeys()
    {
        return config('laravel-dial-number.default');
    }

    /**
     * get specific dial keys from setting
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getSpecificDialKeys()
    {
        return config('laravel-dial-number.specific');
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param mixed $countryName
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
    }

    /**
     * @return mixed
     */
    public function getCountyCode()
    {
        return $this->countyCode;
    }

    /**
     * @param mixed $countyCode
     */
    public function setCountyCode($countyCode)
    {
        $this->countyCode = $countyCode;
    }

    /**
     * @return mixed
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param mixed $timeZone
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    /**
     * @return mixed
     */
    public function getRemoveLength()
    {
        return $this->removeLength;
    }

    /**
     * @param mixed $removeLength
     */
    public function setRemoveLength($removeLength)
    {
        $this->removeLength = $removeLength;
    }

    /**
     * @return mixed
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * @param mixed $isoCode
     */
    public function setIsoCode($isoCode)
    {
        $this->isoCode = $isoCode;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getLanguageDirection()
    {
        return $this->languageDirection;
    }

    /**
     * @param mixed $languageDirection
     */
    public function setLanguageDirection($languageDirection)
    {
        $this->languageDirection = $languageDirection;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param mixed $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getRaw() : array
    {
        if (!isset($this->raw)) {
            $this->initRaw();
        }
        return $this->raw;
    }

    /**
     * @param mixed $raw
     */
    public function setRaw(array $raw)
    {
        $this->raw = $raw;
    }

    /**
     * @return $this
     */
    public function initRaw()
    {
        $this->setRaw([
            'country_name' => $this->getCountryName(),
            'country_code' => $this->getCountyCode(),
            'time_zone' => $this->getTimeZone(),
            'remove_length' => $this->getRemoveLength(),
            'iso_code' => $this->getIsoCode(),
            'currency' => $this->getCurrency(),
            'language' => $this->getLanguage(),
            'language_direction' => $this->getLanguageDirection(),
            'domain' => $this->getDomain(),
            'code' => $this->getCode(),
            'operator' => $this->getOperator(),
            'phone_number' => $this->getPhoneNumber(),
        ]);

        return $this;
    }
}