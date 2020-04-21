<?php

namespace App\Tests\Unit\Entity\Cian\Base;

use App\Entity\Cian\Base\CityObject;
use App\Entity\Cian\Base\CommercialObject;
use App\Entity\Cian\Base\CountryObject;
use App\Entity\Cian\Base\AbstractObject;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class AbstractObjectTest
 * @package App\Tests\Unit\Entity\Cian\Base
 */
class AbstractObjectTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider cadastralNumberProvider
     * @param $category
     * @param $cadastralNumber
     * @param $violation
     */
    public function testValidateCadastralNumber($cadastralNumber, $violation)
    {
        /** @var AbstractObject $ad */
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateCadastralNumber($cadastralNumber, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider titleProvider
     * @param $category
     * @param $title
     * @param $violation
     */
    public function testValidateTitle($title, $violation)
    {
        /** @var AbstractObject $ad */
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateTitle($title, $this->getContext($ad, $violation),null);
    }


    protected function setUp(): void
    {
        // Ad class
        $this->class = new class extends AbstractObject
        {

        };
    }



    /**
     * @return array
     */
    public function cadastralNumberProvider(): array
    {
        return [
            ['47:14:1203001:814', false],
            ['47:14:120300:814', false],
            ['7:14:1203001:814', true],
            ['47:4:1203001:814', true],
            ['47:14:12030010:814', true],
            ['47:14:12030:814', true],
            ['47:14:12030:', true],
            ['471412030814', true],
            ['', true],
            [null, false],
        ];
    }

    /**
     * @return array
     */
    public function titleProvider(): array
    {
        return [
            ["a", true],
            ["заголовок", false],
            ["Каойто-то заголовок", false],
            ["Какойто-то заголовок Какойто-то заголовок Какойто-то заголовок Какойто-то заголовок Какойто-то заголовок", true],
            [null, false],
        ];
    }


}