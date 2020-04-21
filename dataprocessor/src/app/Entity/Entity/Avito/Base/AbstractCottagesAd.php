<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Base;

use App\Entity\Avito\Traits\Floors;
use App\Entity\Avito\Traits\LandArea;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\Square;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;

/**
 * Class AbstractCottagesAd
 * @package App\Entity\Avito\Base
 */
class AbstractCottagesAd
{
    use StandardPropertyRights;
    use Location;
    use Square;
    use LandArea;
    use Floors;

    const WALL_TYPES = [
        'Кирпич',
        'Брус',
        'Бревно',
        'Газоблоки',
        'Металл',
        'Пеноблоки',
        'Сэндвич-панели',
        'Ж/б панели',
        'Экспериментальные материалы',
    ];

    /**
     * @var string
     * @SerializedName("WallsType")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\NotBlank
     * @Constraints\Choice(choices = \App\Entity\Avito\Base\AbstractCottagesAd::WALL_TYPES)
     */
    private $wallsType;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return AbstractAd::CATEGORY_COTTAGES;
    }

    /**
     * @return string
     */
    public function getWallsType(): string
    {
        return $this->wallsType;
    }

    /**
     * @param string $wallsType
     */
    public function setWallsType(string $wallsType): void
    {
        $this->wallsType = $wallsType;
    }
}
