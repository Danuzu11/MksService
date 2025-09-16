<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Empleados Controller
 *
 * @property \App\Model\Table\EmpleadosTable $Empleados
 * @method \App\Model\Entity\Empleado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmpleadosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->Setlayout('medicos');
        $this->paginate = [
            'limit' => 5,
        ];
        $this->viewBuilder()->Setlayout('medicos');

        $searchTerm = $this->request->getQuery('search');

            // Condición de búsqueda si se envia un término por search
        if (!empty($searchTerm)) {

            $this->paginate = [
                'conditions' => [
                        'Empleados.nombre' => $searchTerm,
                ],
            ];
        }

        $empleados = $this->paginate($this->Empleados);
        $this->set(compact('empleados'));

        $cantidadEmpleados = $this->Empleados->find('all')->count();
        $this->set(compact('cantidadEmpleados'));
    }

    /**
     * View method
     *
     * @param string|null $id Empleado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $empleado = $this->Empleados->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('empleado'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $empleado = $this->Empleados->newEmptyEntity();
        if ($this->request->is('post')) {
            $empleado = $this->Empleados->patchEntity($empleado, $this->request->getData());
            if ($this->Empleados->save($empleado)) {
                $this->send_alert("Correcto",'El empleado ha sido agregado exitosamente');
            } else {
                $this->send_alert("Error",'Ocurrio un error al guardar el empleado');
            }
        }
        $this->set(compact('empleado'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Empleado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $empleado = $this->Empleados->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empleado = $this->Empleados->patchEntity($empleado, $this->request->getData());
            if ($this->Empleados->save($empleado)) {
                $this->send_alert("Correcto",'El empleado ha sido editado exitosamente');
            }
            $this->send_alert("Error",'Error al editar el empleado');
        }
        $this->set(compact('empleado'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Empleado id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empleado = $this->Empleados->get($id);
        if ($this->Empleados->delete($empleado)) {
            $this->send_alert("Correcto",'El empleado ha sido borrado exitosamente');
        } else {
            $this->send_alert("Error",'Error al eliminar el empleado');
        }

        return $this->redirect(['action' => 'index']);
    }


    public function alert()
    {
        $this->viewBuilder()->Setlayout('alert');
        $request = $this->getRequest();
        $respuesta = $request->getQuery('respuesta');
        $link = $request->getQuery('link');
        $mensaje = $request->getQuery('mensaje');

        $this->set(compact('respuesta'));
        $this->set(compact('link'));
        $this->set(compact('mensaje'));
    }

    private function send_alert($respuesta,$mensaje)
    {
        $data = [
            'respuesta' => $respuesta,
            'link' => '../empleados',
            'mensaje' => $mensaje
        ];

        $url = [
            'controller' => 'empleados',
            'action' => 'alert',
            '?' => $data
        ];

        return $this->redirect($url);
    }

}
