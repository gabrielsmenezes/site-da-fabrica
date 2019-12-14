<?php

use Illuminate\Database\Seeder;

class EditalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Edital::create([
            'titulo'=>'Fábrica de Software abre edital para propostas', 
            'descricao'=>'Você tem uma ideia de um software para apoiar sua faculdade, comunidade ou grupo? Então sua ideia merece um software! A Fábrica de Software da Facom/UFMS abre edital para envio de propostas para desenvolvimento de software para o primeiro semestre de 2019',
            'arquivo'=>'uploads/cY5wd5rE6MByz5SQXHZOYLN1DD9Av9BccBknDcQi.pdf',
            'data'=> '2018-11-23']
            );



        App\Edital::create([
            'titulo'=>'Seleção de Propostas de Software para a Fábrica de Software da Facom', 
            'descricao'=>'Está aberto o edital para seleção de propostas de software para o segundo semestre da Fábrica de Software da Facom. Toda a comunidade da UFMS poderá submeter propostas de software até o dia 30 de junho de 2018. Todas as etapas do processo seletivo estão disponíveis no edital.',
            'arquivo'=>'uploads/cY5wd5rE6MByz5SQXHZOYLN1DD9Av9BccBknDcQi.pdf',
            'data'=> '2018-06-05']
            );


        App\Edital::create([
            'titulo'=>'Enquadramento de Propostas de Software para a Fábrica de Software da Faculdade de Computação - 14 de fevereiro de 2018', 
            'descricao'=>'Foi realizado enquadramento de propostas de software para a Fábrica de Software da Facom, publicado no Edital nº 10, de 14 de Fevereiro de 2018. Deve ser lembrado que o período de recursos é do dia 15 ao dia 16 de fevereiro de 2018. Os recursos devem seguir o modelo especificado no Edital nº 1, de 4 de janeiro de 2018.',
            'arquivo'=>'uploads/cY5wd5rE6MByz5SQXHZOYLN1DD9Av9BccBknDcQi.pdf',
            'data'=> '2018-02-14']
            );


        App\Edital::create([
            'titulo'=>'Seleção de Propostas de Software para a Fábrica de Software da Faculdade de Computação - 08 de janeiro de 2018', 
            'descricao'=>'Está aberto o edital para seleção de propostas de software para a Fábrica de Software da Facom. Toda a comunidade da Facom poderá submeter propostas de software até o dia 31 de janeiro de 2018. Todas as etapas do processo seletivo estão disponíveis no edital.',
            'arquivo'=>'uploads/cY5wd5rE6MByz5SQXHZOYLN1DD9Av9BccBknDcQi.pdf',
            'data'=> '2018-01-08']
            );
            
        App\Edital::create([
            'titulo'=>'Fábrica de Software abre edital para propostas', 
            'descricao'=>'Você tem uma ideia de um software para apoiar sua faculdade, comunidade ou grupo? Então sua ideia merece um software! A Fábrica de Software da Facom/UFMS abre edital para envio de propostas para desenvolvimento de software para o primeiro semestre de 2019',
            'arquivo'=>'uploads/cY5wd5rE6MByz5SQXHZOYLN1DD9Av9BccBknDcQi.pdf',
            'data'=> '2019-11-23']
            );

        App\Edital::create([
            'titulo'=>'Seleção de Propostas de Software para a Fábrica de Software da Facom', 
            'descricao'=>'Está aberto o edital para seleção de propostas de software para o segundo semestre da Fábrica de Software da Facom. Toda a comunidade da UFMS poderá submeter propostas de software até o dia 30 de junho de 2018. Todas as etapas do processo seletivo estão disponíveis no edital.',
            'arquivo'=>'uploads/cY5wd5rE6MByz5SQXHZOYLN1DD9Av9BccBknDcQi.pdf',
            'data'=> '2019-06-05']
            );


        App\Edital::create([
            'titulo'=>'Enquadramento de Propostas de Software para a Fábrica de Software da Faculdade de Computação - 14 de fevereiro de 2018', 
            'descricao'=>'Foi realizado enquadramento de propostas de software para a Fábrica de Software da Facom, publicado no Edital nº 10, de 14 de Fevereiro de 2018. Deve ser lembrado que o período de recursos é do dia 15 ao dia 16 de fevereiro de 2018. Os recursos devem seguir o modelo especificado no Edital nº 1, de 4 de janeiro de 2018.',
            'arquivo'=>'uploads/cY5wd5rE6MByz5SQXHZOYLN1DD9Av9BccBknDcQi.pdf',
            'data'=> '2020-02-14']
            );


        App\Edital::create([
            'titulo'=>'Seleção de Propostas de Software para a Fábrica de Software da Faculdade de Computação - 08 de janeiro de 2018', 
            'descricao'=>'Está aberto o edital para seleção de propostas de software para a Fábrica de Software da Facom. Toda a comunidade da Facom poderá submeter propostas de software até o dia 31 de janeiro de 2018. Todas as etapas do processo seletivo estão disponíveis no edital.',
            'arquivo'=>'uploads/cY5wd5rE6MByz5SQXHZOYLN1DD9Av9BccBknDcQi.pdf',
            'data'=> '2020-01-08']
            );
    }
}
