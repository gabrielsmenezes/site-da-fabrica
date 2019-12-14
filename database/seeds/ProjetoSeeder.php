<?php

use Illuminate\Database\Seeder;

class ProjetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projeto = new App\Projeto();
        $projeto->nome = 'Facom em Foco';
        $projeto->descricao = 'Facom em Foco é um aplicativo mobile desenvolvido a partir da necessidade da comunidade acadêmica da Faculdade de Computação - UFMS em proporcionar um maior engajamento do corpo discente com relação aos eventos e notícias que são publicados no site da FACOM, de maneira que na palma de sua mão o acadêmico poderá se informar sobre o que está acontecendo na sua unidade e não perder oportunidades que possam aparecer. Além da possibilidade de personalização dos conteúdos a serem visualizados, afim de evitar notícias que não sejam de seu interesse.';
        $projeto->finalizado= true;
        $projeto->save();


        $projeto = new App\Projeto();
        $projeto->nome = 'Custobov';
        $projeto->descricao = 'Custobov é um aplicativo mobile desenvolvido a partir da necessidade da comunidade acadêmica da Faculdade de Computação - UFMS em proporcionar um maior engajamento do corpo discente com relação aos eventos e notícias que são publicados no site da FACOM, de maneira que na palma de sua mão o acadêmico poderá se informar sobre o que está acontecendo na sua unidade e não perder oportunidades que possam aparecer. Além da possibilidade de personalização dos conteúdos a serem visualizados, afim de evitar notícias que não sejam de seu interesse.';
        $projeto->finalizado= false;
        $projeto->save();

    }
}
