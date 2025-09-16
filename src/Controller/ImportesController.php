<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Importes Controller
 *
 * @property \App\Model\Table\ImportesTable $Importes
 * @property \App\Model\Table\DistribuidoresTable $Distribuidores
 * @method \App\Model\Entity\Importe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImportesController extends AppController
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
            'limit' => 7,
        ];
        $importes = $this->paginate($this->Importes->find("all")->contain("Distribuidores"));

        // debug($importes);
        // die;
        $this->loadModel("Distribuidores");
        $distribuidores = $this->Distribuidores->find("all")->toArray();
        $this->set(compact('importes'));
        $this->set(compact('distribuidores'));
    }

    /**
     * View method
     *
     * @param string|null $id Importe id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $importe = $this->Importes->get($id, [
            'contain' => ["Distribuidores"],
        ]);

        $this->set(compact('importe'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel("Distribuidores");
        $distribuidores = $this->Distribuidores->find("all")->toArray();
        $this->set(compact('distribuidores'));

        $this->viewBuilder()->Setlayout('layoutOperation');
        $importe = $this->Importes->newEmptyEntity();
        if ($this->request->is('post')) {

            if (array_key_exists('productos', $this->request->getData()) == false) {
                $this->send_alert("Error",'Error al editar el importe, se debe enviar al menos un producto');
                return;
            }else{
                $importe = $this->Importes->patchEntity($importe, $this->request->getData());
                $importe->productos = json_encode($this->request->getData()["productos"]);
                if ($this->Importes->save($importe)) {
                    $this->send_alert("Correcto",'El importe ha sido agregado exitosamente');
                } else {
                    $this->send_alert("Error",'Error al agregar el importe');
                }
            }
        }
        $this->set(compact('importe'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Importe id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel("Distribuidores");
        $distribuidores = $this->Distribuidores->find("all")->toArray();
        $this->set(compact('distribuidores'));

        $this->viewBuilder()->Setlayout('layoutOperation');
        $importe = $this->Importes->get($id, [
            'contain' => ["Distribuidores"],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if (array_key_exists('productos', $this->request->getData()) == false) {
                $this->send_alert("Error",'Error al editar el importe, se debe enviar al menos un producto');
                return;
            }else{

                $importe = $this->Importes->patchEntity($importe, $this->request->getData());
                $importe->productos = json_encode($this->request->getData()["productos"]);
                if ($this->Importes->save($importe)) {
                    $this->send_alert("Correcto",'El importe ha sido editado exitosamente');
                } else {
                    $this->send_alert("Error",'Error al editar el importe');
                }
            }
        }
        $this->set(compact('importe'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Importe id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $importe = $this->Importes->get($id);
        if ($this->Importes->delete($importe)) {
            $this->send_alert("Correcto",'El importe ha sido borrado exitosamente');
        } else {
            $this->send_alert("Error",'Error al eliminar el importe');
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
            'link' => '../importes',
            'mensaje' => $mensaje
        ];

        $url = [
            'controller' => 'importes',
            'action' => 'alert',
            '?' => $data
        ];

        return $this->redirect($url);
    }

}
