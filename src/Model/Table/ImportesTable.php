<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Importes Model
 *
 * @method \App\Model\Entity\Importe newEmptyEntity()
 * @method \App\Model\Entity\Importe newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Importe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Importe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Importe findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Importe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Importe[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Importe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Importe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Importe[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Importe[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Importe[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Importe[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ImportesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('importes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Distribuidores', [
            'foreignKey' => 'id_distribuidor',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id_distribuidor')
            ->allowEmptyString('id_distribuidor');
        $validator
            ->scalar('fecha')
            ->allowEmptyString('fecha');
        // $validator
        //     ->dateTime('fecha')
        //     ->notEmptyDateTime('fecha');

        $validator
            ->decimal('precio')
            ->allowEmptyString('precio');

        // $validator
        //     // ->scalar('productos')
        //     ->allowEmptyString('productos');

        return $validator;
    }
}
