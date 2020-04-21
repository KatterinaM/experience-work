<?php

namespace App\Entity\Avito\Base;

/**
 * Interface ObjectTypeInterface
 * @package App\Entity\Avito\Base
 */
interface ObjectTypeInterface
{
    const OBJECT_TYPE_LAND_PLOT_INDIVIDUAL = 'Поселений (ИЖС)';
    const OBJECT_TYPE_LAND_PLOT_AGRICULTURAL = 'Сельхозназначения (СНТ, ДНП)';
    const OBJECT_TYPE_LAND_PLOT_INDUSTRIAL = 'Промназначения';

    const OBJECT_TYPE_FOREIGN_APPARTMENT = 'Квартира, апартаменты';
    const OBJECT_TYPE_FOREIGN_HOUSE = 'Дом, вилла';
    const OBJECT_TYPE_FOREIGN_LAND_PLOT = 'Земельный участок';
    const OBJECT_TYPE_FOREIGN_GARAGE = 'Гараж, машиноместо';
    const OBJECT_TYPE_FOREIGN_COMMERCIAL = 'Коммерческая недвижимость';

    const OBJECT_TYPE_GARAGE_BUILDING = 'Гараж';
    const OBJECT_TYPE_GARAGE_SPACE = 'Машиноместо';

    const OBJECT_TYPE_COMMERCIAL_HOTEL = 'Гостиница';
    const OBJECT_TYPE_COMMERCIAL_OFFICE = 'Офисное помещение';
    const OBJECT_TYPE_COMMERCIAL_CATERING_ROOM = 'Помещение общественного питания';
    const OBJECT_TYPE_COMMERCIAL_FREE_ROOM = 'Помещение свободного назначения';
    const OBJECT_TYPE_COMMERCIAL_PRODUCTION_ROOM = 'Производственное помещение';
    const OBJECT_TYPE_COMMERCIAL_WAREHOUSE_SPACE = 'Складское помещение';
    const OBJECT_TYPE_COMMERCIAL_TRADE_ROOM = 'Торговое помещение';

    const LEASE_MULTIMEDIA_OPTIONS = [
        'Wi-Fi',
        'Телевизор',
        'Кабельное / цифровое ТВ'
    ];

    const LEASE_APPLIANCES_OPTIONS = [
        'Плита',
        'Микроволновка',
        'Холодильник',
        'Стиральная машина',
        'Фен',
        'Утюг',
    ];

    const LEASE_COMFORT_OPTIONS = [
        'Кондиционер',
        'Камин',
        'Балкон / лоджия',
        'Парковочное место',
        'Бассейн',
        'Баня / сауна',
    ];

    const LEASE_ADDITIONALLY_OPTIONS = [
        'Можно с питомцами',
        'Можно с детьми',
        'Можно для мероприятий',
        'Можно курить',
    ];
}
