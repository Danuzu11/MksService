<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cierrecajas Controller
 *
 * @property \App\Model\Table\CierrecajasTable $Cierrecajas
 * @method \App\Model\Entity\Cierrecaja[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CierrecajasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->Setlayout('medicos');
        $cierrecajas = $this->paginate($this->Cierrecajas);

        $this->set(compact('cierrecajas'));
    }

    /**
     * View method
     *
     * @param string|null $id Cierrecaja id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $cierrecaja = $this->Cierrecajas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cierrecaja'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $cierrecaja = $this->Cierrecajas->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $cierrecaja = $this->Cierrecajas->patchEntity($cierrecaja, $this->request->getData());
            if ($this->Cierrecajas->save($cierrecaja)) {
                $this->send_alert("Correcto",'El registro de cierre de caja se ha agregado exitosamente');
            } else {
                $this->send_alert("Error",'Error al agregar registro de cierre de caja');
            }
        }
        $this->set(compact('cierrecaja'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cierrecaja id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $cierrecaja = $this->Cierrecajas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cierrecaja = $this->Cierrecajas->patchEntity($cierrecaja, $this->request->getData());
            if ($this->Cierrecajas->save($cierrecaja)) {
                $this->send_alert("Correcto",'El registro de cierre de caja se ha editado exitosamente');
            } else {
                $this->send_alert("Error",'Error al editar registro de cierre de caja');
            }
        }
        $this->set(compact('cierrecaja'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cierrecaja id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cierrecaja = $this->Cierrecajas->get($id);
        if ($this->Cierrecajas->delete($cierrecaja)) {
            $this->send_alert("Correcto",'El registro de cierre de caje se ha eliminado exitosamente');
        } else {
            $this->send_alert("Error",'Error al eliminar registro de cierre de caje');
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
            'link' => '../cierrecajas',
            'mensaje' => $mensaje
        ];

        $url = [
            'controller' => 'cierrecajas',
            'action' => 'alert',
            '?' => $data
        ];

        return $this->redirect($url);
    }
}
