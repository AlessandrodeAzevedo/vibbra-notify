<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * AddNotifications seed.
 */
class AddNotificationsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        
        $table = $this->table('apps');
            $data['name'] = 'App teste';
            $data['user_id'] = 1;
            $data['enable_webpush'] = 1;
            $data['enable_email'] = 1;
            $data['enable_sms'] = 1;
        $table->insert($data)->save();

        $table = $this->table('emails');
            unset($data);
            $data['app_id'] = 1;
            $data['server_name'] = 'Nome do server';
            $data['port'] = 1234;
            $data['login'] = 'login@email.com';
            $data['password'] = 'emailpass';
            $data['sender_name'] = 'Sender name';
            $data['sender_email'] = 'sender@email.com';
        $table->insert($data)->save();

        $table = $this->table('web_pushes');
            unset($data);
            $data['app_id'] = 1;
            $data['site_name'] = 'Site name';
            $data['site_address'] = 'https://siteaddress.com';
            $data['site_icon'] = 'https://siteicon.com';
            $data['text_message'] = 'Texto da mensagem';
            $data['text_button_allow'] = 'Texto do botão permitir';
            $data['text_button_deny'] = 'Texto do botão negar';
            $data['notify_title'] = 'Titulo da notificação';
            $data['notify_message'] = 'Mensagem da notificação';
            $data['notify_link_enable'] = 1;
            $data['notify_link'] = 'https://linknotificacao.com';
        $table->insert($data)->save();

        $table = $this->table('smss');
            unset($data);
            $data['app_id'] = 1;
            $data['provider'] = 'Provedor';
            $data['login'] = 'Login provedor';
            $data['password'] = 'Senha provedor';
        $table->insert($data)->save();

        $table = $this->table('notifications');
            unset($data);
            $data['app_id'] = 1;
            $data['sent_at'] = date('Y-m-d H:i:s');
            $data['foreign_id'] = 1;
            $data['model'] = 'Emails';
            $data['origin'] = 2;
            $data['read_at'] = date('Y-m-d H:i:s');
            $data['content'] = 'Conteudo da mensagem';
        $table->insert($data)->save();
        $table = $this->table('notifications');
            unset($data);
            $data['app_id'] = 1;
            $data['sent_at'] = date('Y-m-d H:i:s');
            $data['foreign_id'] = 1;
            $data['model'] = 'WebPushes';
            $data['origin'] = 1;
            $data['read_at'] = date('Y-06-01 H:i:s');
            $data['content'] = 'Conteudo da mensagem';
        $table->insert($data)->save();
        $table = $this->table('notifications');
            unset($data);
            $data['app_id'] = 1;
            $data['sent_at'] = date('Y-05-01 H:i:s');
            $data['foreign_id'] = 1;
            $data['model'] = 'Smss';
            $data['origin'] = 1;
            $data['read_at'] = date('Y-m-d H:i:s');
            $data['content'] = 'Conteudo da mensagem';
        $table->insert($data)->save();
    }
}
