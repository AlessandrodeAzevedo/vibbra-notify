<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Emails Controller
 *
 * @property \App\Model\Table\EmailsTable $Emails
 * @method \App\Model\Entity\Email[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmailsController extends AppController
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
        $emails = $this->paginate($this->Emails);

        $this->set(compact('emails'));
    }

    /**
     * View method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => ['Apps'],
        ]);

        $this->set(compact('email'));
    }

    /**
     * Add method
     *
     * @param null $app_id App id.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($app_id)
    {
        $email = $this->Emails->newEmptyEntity();
        if ($this->request->is('post')) {
            $email = $this->Emails->patchEntity($email, $this->request->getData());
            $email->app_id = $app_id;
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));

                return $this->redirect(['action' => 'view', 'controller' => 'Apps', $app_id]);
            }
            $this->Flash->error(__('The email could not be saved. Please, try again.'));
        }

        $this->set(compact('email', 'app_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $email = $this->Emails->patchEntity($email, $this->request->getData());
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The email could not be saved. Please, try again.'));
        }
        $apps = $this->Emails->Apps->find('list', ['limit' => 200]);
        $this->set(compact('email', 'apps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $email = $this->Emails->get($id);
        if ($this->Emails->delete($email)) {
            $this->Flash->success(__('The email has been deleted.'));
        } else {
            $this->Flash->error(__('The email could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
