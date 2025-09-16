<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\Date;
/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 * @property \App\Model\Table\CierrecajasTable $Cierrecajas
 * @property \App\Model\Table\ClientesTable $Clientes
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidosController extends AppController
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

        $searchTerm = $this->request->getQuery('search');
        $date = $this->request->getQuery('date');
        
        if (empty($searchTerm) && empty($date)) {
            $fechaActual = date("Y-m-d");
            $pedidos = $this->paginate($this->Pedidos->find("all")->contain("Clientes")->where(['fecha_pedido' => $fechaActual]));
        } else {
            $pedidos = $this->paginate($this->Pedidos->find("all")->contain("Clientes")->where(['fecha_pedido' => $date]));
        }


        $this->set(compact('pedidos'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');
        $pedido = $this->Pedidos->get($id, [
            'contain' => ["Clientes"],
        ]);

        $this->set(compact('pedido'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel("Clientes");
        $clientes = $this->Clientes->find("all")->toArray();
        $this->set(compact('clientes'));
        $this->viewBuilder()->Setlayout('layoutOperation');
        $pedido = $this->Pedidos->newEmptyEntity();
        if ($this->request->is('post')) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
            if ($this->Pedidos->save($pedido)) {
                $this->send_alert("Correcto",'El producto ha sido agregado exitosamente');
            } else {
                $this->send_alert("Error",'Error al agregado el producto');
            }
        }
        $this->set(compact('pedido'));
    }


    /**
     * cerrarCaja method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function cerrarcaja()
    {
        if ($this->request->is('post')) {

            $this->loadModel("Cierrecajas");
            // $cierrecaja = $this->Cierrecajas->find("all")->toArray();
            $cierrecaja = $this->Cierrecajas->newEmptyEntity();

            $cierrecaja->total_efectivo = 0.0;
            $cierrecaja->total_tarjeta = 0.0;
            $cierrecaja->total_divisas = 0.0;
            $cierrecaja->total_punto = 0.0;

            $fechaActual = date("Y-m-d");
            $pedidos = $this->Pedidos->find('all')->where(['fecha_pedido' => $fechaActual])->toArray();

            foreach ($pedidos as $key => $pedido) {
                if($pedido->tipoPago == "Efectivo" ){
                    $cierrecaja->total_efectivo = $cierrecaja->total_efectivo + $pedido->precio_total;
                }else if($pedido->tipoPago == "Tarjeta"){
                    $cierrecaja->total_tarjeta = $cierrecaja->total_tarjeta + $pedido->precio_total;
                }else if($pedido->tipoPago == "Divisas"){
                    $cierrecaja->total_divisas = $cierrecaja->total_divisas + $pedido->precio_total;
                }else if($pedido->tipoPago == "Punto"){
                    $cierrecaja->total_punto = $cierrecaja->total_punto + $pedido->precio_total;
                }
            }

            $comprobarCierre = $this->Cierrecajas->find('all')->where(['fecha_cierre' => $fechaActual])->toArray();

            if(!empty($comprobarCierre)){
                $this->send_alert("Error",'Ya ha sido generado un cierre de caja por el dia de hoy, no se pueden generar mas de 1 por dia');
            }

            $cierrecaja->fecha_cierre = $fechaActual;

            if ($this->Cierrecajas->save($cierrecaja)) {
                $this->send_alert("Correcto",'El cierre ha sido agregado exitosamente');
            } else {
                $this->send_alert("Error",'El cierre ha sido agregado exitosamente');
            }
        }

    }


    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->Setlayout('layoutOperation');

        $this->loadModel("Clientes");
        $clientes = $this->Clientes->find("all")->toArray();
        $this->set(compact('clientes'));

        $pedido = $this->Pedidos->get($id, [
            'contain' => ["Clientes"],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
            if ($this->Pedidos->save($pedido)) {
                $this->send_alert("Correcto",'El pedido ha sido actualizado exitosamente');
            } else {
                $this->send_alert("Error",'Error al actualizar el pedido');
            }
        }
        $this->set(compact('pedido'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->send_alert("Correcto",'El pedido ha sido eliminado exitosamente');
        } else {
            $this->send_alert("Error",'Error al eliminar pedido');
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
            'link' => '../pedidos',
            'mensaje' => $mensaje
        ];

        $url = [
            'controller' => 'pedidos',
            'action' => 'alert',
            '?' => $data
        ];

        return $this->redirect($url);
    }
}
