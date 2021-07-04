<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Apps Controller
 *
 * @method \App\Model\Entity\App[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AppsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $apps = $this->Apps->find()
        ->where([
            'user_id' => $this->auth_user['id']
        ]);
        $apps = $this->paginate($apps);

        $this->set(compact('apps'));
    }

    /**
     * View method
     *
     * @param string|null $id App id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $app = $this->Apps->get($id, [
            'contain' => [
                'WebPushes',
                'Emails',
                'Smss'
            ],
        ]);

        $this->set(compact('app'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $app = $this->Apps->newEmptyEntity();
        if ($this->request->is('post')) {
            $app = $this->Apps->patchEntity($app, $this->request->getData());
            $app->user_id = $this->auth_user->id;
            if ($this->Apps->save($app)) {
                $this->Flash->success(__('The app has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app could not be saved. Please, try again.'));
        }
        $this->set(compact('app'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $app = $this->Apps->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $app = $this->Apps->patchEntity($app, $this->request->getData());
            if ($this->Apps->save($app)) {
                $this->Flash->success(__('The app has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app could not be saved. Please, try again.'));
        }
        $this->set(compact('app'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $app = $this->Apps->get($id);
        if ($this->Apps->delete($app)) {
            $this->Flash->success(__('The app has been deleted.'));
        } else {
            $this->Flash->error(__('The app could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
