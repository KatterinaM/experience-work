<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito;

use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Option
 * @package App\Entity\Avito
 */
class Option
{
    /**
     * @var string
     * @XmlValue(cdata=false)
     */
    private $value;

    /**
     * Option constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
