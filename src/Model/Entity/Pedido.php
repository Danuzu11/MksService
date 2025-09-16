<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property int|null $id_cliente
 * @property \Cake\I18n\FrozenTime $fecha_pedido
 * @property string $tipoPago
 * @property string|null $precio_total
 */
class Pedido extends Entity
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
        'id_cliente' => true,
        'fecha_pedido' => true,
        'tipoPago' => true,
        'precio_total' => true,
    ];
}
