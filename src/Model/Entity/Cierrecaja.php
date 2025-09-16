<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cierrecaja Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $fecha_cierre
 * @property string|null $total_efectivo
 * @property string|null $total_tarjeta
 * @property string|null $total_divisas
 */
class Cierrecaja extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'fecha_cierre' => true,
        'total_efectivo' => true,
        'total_tarjeta' => true,
        'total_divisas' => true,
        'total_punto' => true,
    ];
}
