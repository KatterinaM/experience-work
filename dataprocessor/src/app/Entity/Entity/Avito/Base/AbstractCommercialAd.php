<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Base;

use App\Entity\Avito\Traits\CommercialObjectType;
use App\Entity\Avito\Traits\Floors;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\Square;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class AbstractCommercialAd
 * @package App\Entity\Avito\Base
 */
abstract class AbstractCommercialAd extends AbstractAd
{
    use Location;
    use CommercialObjectType;
    use StandardPropertyRights;
    use Square;
    use Floors;

    const BUILDING_CLASS_A = 'A';
    const BUILDING_CLASS_B = 'B';
    const BUILDING_CLASS_C = 'C';
    const BUILDING_CLASS_D = 'D';

    const BUILDING_CLASS = [
        self::BUILDING_CLASS_A,
        self::BUILDING_CLASS_B,
        self::BUILDING_CLASS_C,
        self::BUILDING_CLASS_D,
    ];

    /**
     * @var string
     * @SerializedName("Title")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\NotBlank
     */
    private $title;

    /**
     * @var string
     * @SerializedName("BuidingClass")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Avito\Base\AbstractCommercialAd::BUILDING_CLASS)
     * @Constraints\Callback({ "App\Entity\Avito\Base\AbstractCommercialAd", "validateBuildingClass" })
     */
    private $buildingClass;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return AbstractAd::CATEGORY_COMMERCIAL;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getBuildingClass(): string
    {
        return $this->buildingClass;
    }

    /**
     * @param string $buildingClass
     */
    public function setBuildingClass(string $buildingClass): void
    {
        $this->buildingClass = $buildingClass;
    }

    /**
     * @param $buildingClass
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBuildingClass(
        $buildingClass,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        //Класс здания (только для видов объекта "Офисное помещение" и "Складское помещение")
        if (!is_null($buildingClass) && !in_array($object->getObjectType(), [
                ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_OFFICE,
                ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_WAREHOUSE_SPACE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для видов объекта:'
                . '"Офисное помещение", "Складское помещение"'
            )->addViolation();
        }
    }
}
