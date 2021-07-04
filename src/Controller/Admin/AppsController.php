<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

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
        ->contain('Users');
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
            'contain' => ['Users'],
        ]);

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
