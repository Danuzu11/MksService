<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Distribuidores Controller
 *
 * @property \App\Model\Table\DistribuidoresTable $Distribuidores
 * @method \App\Model\Entity\Distribuidore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DistribuidoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->Setlayout('medicos');
        $distribuidores = $this->paginate($this->Distribuidores);
        $this->set(compact('distribuidores'));

        $cantidadDistribuidores = $this->Distribuidores->find('all')->count();
        $this->set(compact('cantidadDistribuidores'));
    }

    /**
     * View method
     *
     * @param string|null $id Distribuidore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $distribuidore = $this->Distribuidores->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('distribuidore'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $distribuidore = $this->Distribuidores->newEmptyEntity();
        if ($this->request->is('post')) {
            $distribuidore = $this->Distribuidores->patchEntity($distribuidore, $this->request->getData());
            if ($this->Distribuidores->save($distribuidore)) {
                $this->send_alert("Correcto",'El distribuidor ha sido creado exitosamente');
            } else {
                $this->send_alert("Error",'Error al crear el distribuidor');
            }
        }
        $this->set(compact('distribuidore'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Distribuidore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $distribuidore = $this->Distribuidores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $distribuidore = $this->Distribuidores->patchEntity($distribuidore, $this->request->getData());
            if ($this->Distribuidores->save($distribuidore)) {
                $this->send_alert("Correcto",'El distribuidor ha sido editado exitosamente');
            } else {
                $this->send_alert("Error",'Error al editar el distribuidor');
            }
        }
        $this->set(compact('distribuidore'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Distribuidore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $this->request->allowMethod(['post', 'delete']);
        $distribuidore = $this->Distribuidores->get($id);
        if ($this->Distribuidores->delete($distribuidore)) {
            $this->send_alert("Correcto",'El distribuidor ha sido borrado exitosamente');
        } else {
            $this->send_alert("Error",'Error al eliminar el distribuidor');
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
            'link' => '../distribuidores',
            'mensaje' => $mensaje
        ];

        $url = [
            'controller' => 'distribuidores',
            'action' => 'alert',
            '?' => $data
        ];

        return $this->redirect($url);
    }
}
