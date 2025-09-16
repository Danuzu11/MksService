<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Productos Controller
 *
 * @property \App\Model\Table\ProductosTable $Productos
 * @property \App\Model\Table\CategoriasTable $Categorias
 * @method \App\Model\Entity\Producto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->Setlayout('medicos');
        // $productos = $this->Productos->find('all')->contain("Categorias");
        $productos = $this->paginate($this->Productos->find('all')->contain("Categorias"));
        $this->loadModel('Categorias');
        $categoriasProductos = $this->Categorias->find('all')->toArray();
        // debug($productos);
        $this->set(compact('categoriasProductos'));
        $this->set(compact('productos'));

    }

    /**
     * View method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $producto = $this->Productos->get($id, [
            'contain' => ["Categorias"],
        ]);

        $this->set(compact('producto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $this->loadModel('Categorias');
        $categoriasProductos = $this->Categorias->find('all')->toArray();
        $this->set(compact('categoriasProductos'));
        $producto = $this->Productos->newEmptyEntity();
        if ($this->request->is('post')) {
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());
            if ($this->Productos->save($producto)) {
                $this->send_alert("Correcto",'El producto ha sido agregado exitosamente');
            } else {
                $this->send_alert("Error",'Error al agregado el producto');
            }
        }
        $this->set(compact('producto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $producto = $this->Productos->get($id, [
            'contain' => ["Categorias"],
        ]);
        $this->loadModel('Categorias');
        $categoriasProductos = $this->Categorias->find('all')->toArray();
        $this->set(compact('categoriasProductos'));

        if ($this->request->is(['patch', 'post', 'put'])) {
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());
            if ($this->Productos->save($producto)) {
                $this->send_alert("Correcto",'El producto ha sido actualizado exitosamente');
            } else {
                $this->send_alert("Error",'Error al actualizar el producto');
            }
        }
        $this->set(compact('producto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producto = $this->Productos->get($id);
        if ($this->Productos->delete($producto)) {
            $this->send_alert("Correcto",'El producto ha sido borrado exitosamente');
        } else {
            $this->send_alert("Error",'Error al eliminar el producto');
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
            'link' => '../productos',
            'mensaje' => $mensaje
        ];

        $url = [
            'controller' => 'productos',
            'action' => 'alert',
            '?' => $data
        ];

        return $this->redirect($url);
    }

}
