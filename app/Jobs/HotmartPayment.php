<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Plano;
use App\Models\Contrato;
use Spatie\WebhookClient\ProcessWebhookJob as SpatieProcessWebhookJob;

class HotmartPayment extends SpatieProcessWebhookJob
{
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $model = $this->webhookCall;
        $payload = $model->payload;

        try {

            if( $payload['event'] == "PURCHASE_APPROVED" )
                $this->ativar($payload['data']['buyer']['email']);
            
            if( $payload['event'] == "SUBSCRIPTION_CANCELLATION" )
                $this->cancelar($payload['data']['subscriber']['email']);

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Documentação
     * @link https://developers.hotmart.com/docs/pt-BR/2.0.0/webhook/purchase-webhook/
     */
    private function ativar($email)
    {
        try {

            $user = User::firstOrCreate(
                [ "email" => $email ],
                [ 
                    'name' => substr($email, 0, 4), 
                    'password' => bcrypt(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz-:,"),0,8)),
                    'telefone' => '11111111111'
                ]
            );
            
            if( $user->assinante == false )
                Contrato::create([
                    'user_id' => $user->id,
                    'plano_id' => Plano::first()->id,
                    'data_ativacao' => now(),
                    'data_cancelamento' => null,
                    'data_expiracao' => null,
                    'ativo' => 1
                ]);

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Documentação
     * @link https://developers.hotmart.com/docs/pt-BR/2.0.0/webhook/cancel-subscription-webhook/
     */
    private function cancelar($email)
    {
        try {

            $user = User::where("email", $email)->firstOrFail();

            $contrato =  $user->contratos()->firstWhere('ativo', 1); 

            if( $contrato ){
                $contrato->data_cancelamento = now();
                $contrato->ativo = 0;
                $contrato->save();
            }

        } catch (\Throwable $th) {
            // do nothing
        }

    }
}
