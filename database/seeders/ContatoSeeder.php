<?php

namespace Database\Seeders;

use App\Models\Contato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mensagens = [
            [
                'email' => 'joao.silva@example.com',
                'name' => 'João da Silva',
                'assunto' => 'Problema com login no sistema',
                'texto' => 'Olá, estou tentando acessar minha conta mas não recebo o e-mail de confirmação. Poderiam verificar?',
            ],
            [
                'email' => 'maria.oliveira@example.com',
                'name' => 'Maria Oliveira',
                'assunto' => 'Sugestão de melhoria',
                'texto' => 'Gostaria de sugerir que adicionassem um modo escuro na aplicação. Acho que muitos usuários iriam gostar.',
            ],
            [
                'email' => 'carlos.souza@example.com',
                'name' => 'Carlos Souza',
                'assunto' => 'Erro ao cadastrar novo usuário',
                'texto' => 'Estou tentando cadastrar um novo usuário, mas aparece uma mensagem de erro inesperado.',
            ],
            [
                'email' => 'ana.lima@example.com',
                'name' => 'Ana Lima',
                'assunto' => 'Dúvida sobre pagamento',
                'texto' => 'Gostaria de confirmar se o pagamento da mensalidade foi recebido, pois o boleto já venceu.',
            ],
            [
                'email' => 'rafael.santos@example.com',
                'name' => 'Rafael Santos',
                'assunto' => 'Relato de bug',
                'texto' => 'Ao clicar no botão de enviar mensagem, a página recarrega sem salvar nada.',
            ],
            [
                'email' => 'lucas.martins@example.com',
                'name' => 'Lucas Martins',
                'assunto' => 'Problema com senha',
                'texto' => 'Esqueci minha senha e o link de redefinição não está funcionando.',
            ],
            [
                'email' => 'juliana.costa@example.com',
                'name' => 'Juliana Costa',
                'assunto' => 'Elogio ao suporte',
                'texto' => 'Queria parabenizar a equipe pelo atendimento rápido que tive na semana passada!',
            ],
            [
                'email' => 'pedro.almeida@example.com',
                'name' => 'Pedro Almeida',
                'assunto' => 'Problema com carregamento de imagens',
                'texto' => 'As imagens do meu perfil não estão carregando, mesmo depois de atualizar várias vezes.',
            ],
            [
                'email' => 'fernanda.azevedo@example.com',
                'name' => 'Fernanda Azevedo',
                'assunto' => 'Alteração de dados cadastrais',
                'texto' => 'Gostaria de alterar meu número de telefone no cadastro, mas não encontrei a opção.',
            ],
            [
                'email' => 'marcos.ferreira@example.com',
                'name' => 'Marcos Ferreira',
                'assunto' => 'Sugestão de funcionalidade',
                'texto' => 'Seria ótimo se houvesse a possibilidade de exportar os relatórios em PDF.',
            ],
            [
                'email' => 'aline.souza@example.com',
                'name' => 'Aline Souza',
                'assunto' => 'Problema de acesso via celular',
                'texto' => 'Quando tento acessar pelo celular, a página não carrega corretamente.',
            ],
            [
                'email' => 'tiago.melo@example.com',
                'name' => 'Tiago Melo',
                'assunto' => 'Erro no formulário de contato',
                'texto' => 'Ao preencher o formulário, recebo uma mensagem de erro sem detalhes.',
            ],
            [
                'email' => 'camila.ramos@example.com',
                'name' => 'Camila Ramos',
                'assunto' => 'Pergunta sobre suporte técnico',
                'texto' => 'Gostaria de saber qual o horário de atendimento do suporte.',
            ],
            [
                'email' => 'ricardo.pereira@example.com',
                'name' => 'Ricardo Pereira',
                'assunto' => 'Problema com atualização de dados',
                'texto' => 'Tentei atualizar meu e-mail no sistema, mas ele continua mostrando o antigo.',
            ],
            [
                'email' => 'beatriz.silveira@example.com',
                'name' => 'Beatriz Silveira',
                'assunto' => 'Solicitação de cancelamento',
                'texto' => 'Desejo cancelar minha assinatura, como devo proceder?',
            ],
            [
                'email' => 'rodrigo.moura@example.com',
                'name' => 'Rodrigo Moura',
                'assunto' => 'Problema com notificação',
                'texto' => 'As notificações não aparecem no meu painel, mesmo com permissões ativadas.',
            ],
            [
                'email' => 'isabela.machado@example.com',
                'name' => 'Isabela Machado',
                'assunto' => 'Elogio ao sistema',
                'texto' => 'O sistema está ótimo, parabéns pela evolução das últimas atualizações!',
            ],
            [
                'email' => 'felipe.rocha@example.com',
                'name' => 'Felipe Rocha',
                'assunto' => 'Erro ao gerar relatório',
                'texto' => 'Quando tento gerar o relatório financeiro, aparece uma tela em branco.',
            ],
            [
                'email' => 'carolina.souza@example.com',
                'name' => 'Carolina Souza',
                'assunto' => 'Dúvida sobre cadastro',
                'texto' => 'Preciso cadastrar minha empresa também ou apenas o responsável?',
            ],
            [
                'email' => 'gustavo.vieira@example.com',
                'name' => 'Gustavo Vieira',
                'assunto' => 'Problema com atualização automática',
                'texto' => 'O sistema não está atualizando sozinho, preciso sempre recarregar a página manualmente.',
            ],
        ];

        foreach ($mensagens as $dados) {
            Contato::create($dados);
        }
    }
}
