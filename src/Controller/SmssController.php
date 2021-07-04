<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Smss Controller
 *
 * @property \App\Model\Table\SmssTable $Smss
 * @method \App\Model\Entity\Sms[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SmssController extends AppController
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
        $smss = $this->paginate($this->Smss);

        $this->set(compact('smss'));
    }

    /**
     * View method
     *
     * @param string|null $id Sms id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sms = $this->Smss->get($id, [
            'contain' => ['Apps'],
        ]);

        $this->set(compact('sms'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($app_id)
    {
        $sms = $this->Smss->newEmptyEntity();
        if ($this->request->is('post')) {
            $sms = $this->Smss->patchEntity($sms, $this->request->getData());
            $sms->app_id = $app_id;
            if ($this->Smss->save($sms)) {
                $this->Flash->success(__('The sms has been saved.'));

                return $this->redirect(['action' => 'view', 'controller' => 'Apps', $app_id]);
            }
            $this->Flash->error(__('The sms could not be saved. Please, try again.'));
        }
        
        $this->set(compact('sms', 'app_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sms id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sms = $this->Smss->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sms = $this->Smss->patchEntity($sms, $this->request->getData());
            if ($this->Smss->save($sms)) {
                $this->Flash->success(__('The sms has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sms could not be saved. Please, try again.'));
        }
        $apps = $this->Smss->Apps->find('list', ['limit' => 200]);
        $this->set(compact('sms', 'apps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sms id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sms = $this->Smss->get($id);
        if ($this->Smss->delete($sms)) {
            $this->Flash->success(__('The sms has been deleted.'));
        } else {
            $this->Flash->error(__('The sms could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
