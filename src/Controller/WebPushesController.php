<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * WebPushes Controller
 *
 * @property \App\Model\Table\WebPushesTable $WebPushes
 * @method \App\Model\Entity\WebPush[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WebPushesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Apps'],
        ];
        $webPushes = $this->paginate($this->WebPushes);

        $this->set(compact('webPushes'));
    }

    /**
     * View method
     *
     * @param string|null $id Web Push id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $webPush = $this->WebPushes->get($id, [
            'contain' => ['Apps'],
        ]);

        $this->set(compact('webPush'));
    }

    /**
     * Add method
     *
     * @param null $app_id App id.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($app_id)
    {
        $webPush = $this->WebPushes->newEmptyEntity();
        if ($this->request->is('post')) {
            $webPush = $this->WebPushes->patchEntity($webPush, $this->request->getData());
            if ($app_id) {
                $webPush->app_id = $app_id;
            }
            if ($this->WebPushes->save($webPush)) {
                $this->Flash->success(__('The web push has been saved.'));

                return $this->redirect(['action' => 'view', 'controller' => 'Apps', $app_id]);
            }
            $this->Flash->error(__('The web push could not be saved. Please, try again.'));
        }
        $this->set(compact('webPush', 'app_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Web Push id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $webPush = $this->WebPushes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $webPush = $this->WebPushes->patchEntity($webPush, $this->request->getData());
            if ($this->WebPushes->save($webPush)) {
                $this->Flash->success(__('The web push has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The web push could not be saved. Please, try again.'));
        }
        $apps = $this->WebPushes->Apps->find('list', ['limit' => 200]);
        $this->set(compact('webPush', 'apps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Web Push id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $webPush = $this->WebPushes->get($id);
        if ($this->WebPushes->delete($webPush)) {
            $this->Flash->success(__('The web push has been deleted.'));
        } else {
            $this->Flash->error(__('The web push could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
