<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livro;
use App\Models\Categoria;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $livros = [
            [
                'titulo' => 'Dom Casmurro',
                'descricao' => 'Clássico da literatura brasileira que explora ciúme, dúvida e memórias de Bentinho.',
                'autor' => 'Machado de Assis',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1899,
                'preco' => 45.90,
                'quantidade' => 300,
                'categorias' => ['Clássicos da Literatura', 'Romance Contemporâneo', 'Psicologia'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-01.jpg'
            ],
            [
                'titulo' => 'Memórias Póstumas de Brás Cubas',
                'descricao' => 'Narrativa inovadora que mistura humor, crítica social e filosofia.',
                'autor' => 'Machado de Assis',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1881,
                'preco' => 49.90,
                'quantidade' => 250,
                'categorias' => ['Clássicos da Literatura', 'Filosofia', 'Psicologia'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-02.jpg'
            ],
            [
                'titulo' => 'O Guarani',
                'descricao' => 'Romance indianista que mistura aventura, amor e identidade nacional.',
                'autor' => 'José de Alencar',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1857,
                'preco' => 39.90,
                'quantidade' => 180,
                'categorias' => ['Romance Histórico', 'Clássicos da Literatura', 'Contos de Fadas e Folclore'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-03.jpg'
            ],
            [
                'titulo' => 'Iracema',
                'descricao' => 'História de amor entre um colonizador português e uma indígena, símbolo do Brasil.',
                'autor' => 'José de Alencar',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1865,
                'preco' => 34.90,
                'quantidade' => 220,
                'categorias' => ['Romance Histórico', 'Clássicos da Literatura', 'Contos de Fadas e Folclore'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-04.jpg'
            ],
            [
                'titulo' => 'A Hora da Estrela',
                'descricao' => 'Macabéa, nordestina no Rio de Janeiro, em uma narrativa comovente e crítica.',
                'autor' => 'Clarice Lispector',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1977,
                'preco' => 42.00,
                'quantidade' => 150,
                'categorias' => ['Romance Contemporâneo', 'Psicologia', 'Clássicos da Literatura'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-05.jpg'
            ],
            [
                'titulo' => 'Laços de Família',
                'descricao' => 'Coletânea de contos que revela o cotidiano e suas contradições.',
                'autor' => 'Clarice Lispector',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1960,
                'preco' => 38.00,
                'quantidade' => 200,
                'categorias' => ['Contos e Crônicas', 'Psicologia', 'Clássicos da Literatura'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-06.jpg'
            ],
            [
                'titulo' => 'Grande Sertão: Veredas',
                'descricao' => 'Romance épico sobre o sertão, jagunços e a luta entre o bem e o mal.',
                'autor' => 'Guimarães Rosa',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1956,
                'preco' => 59.90,
                'quantidade' => 100,
                'categorias' => ['Clássicos da Literatura', 'Romance Histórico', 'Filosofia'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-07.jpg'
            ],
            [
                'titulo' => 'Sagarana',
                'descricao' => 'Coletânea de contos ambientados no sertão mineiro.',
                'autor' => 'Guimarães Rosa',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1946,
                'preco' => 44.90,
                'quantidade' => 120,
                'categorias' => ['Contos e Crônicas', 'Clássicos da Literatura', 'Romance Histórico'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-08.jpg'
            ],
            [
                'titulo' => 'Capitães da Areia',
                'descricao' => 'História de meninos de rua em Salvador e suas lutas pela sobrevivência.',
                'autor' => 'Jorge Amado',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1937,
                'preco' => 39.90,
                'quantidade' => 400,
                'categorias' => ['Romance Contemporâneo', 'Política e Sociedade', 'Clássicos da Literatura'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-09.jpg'
            ],
            [
                'titulo' => 'Gabriela, Cravo e Canela',
                'descricao' => 'Romance que mistura sensualidade, política e transformações sociais na Bahia.',
                'autor' => 'Jorge Amado',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1958,
                'preco' => 52.00,
                'quantidade' => 220,
                'categorias' => ['Romance Contemporâneo', 'Política e Sociedade', 'Clássicos da Literatura'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-10.jpg'
            ],
            [
                'titulo' => 'Mar Morto',
                'descricao' => 'Narrativa sobre pescadores de Salvador, marcada por lirismo e fatalismo.',
                'autor' => 'Jorge Amado',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1936,
                'preco' => 37.00,
                'quantidade' => 140,
                'categorias' => ['Romance Contemporâneo', 'Clássicos da Literatura', 'Poesia'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-11.jpg'
            ],
            [
                'titulo' => 'Menino de Engenho',
                'descricao' => 'Infância de um menino no Nordeste, marcada por memórias e crítica social.',
                'autor' => 'José Lins do Rego',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1932,
                'preco' => 33.90,
                'quantidade' => 160,
                'categorias' => ['Clássicos da Literatura', 'Romance Histórico', 'Educação e Pedagogia'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-12.jpg'
            ],
            [
                'titulo' => 'Vidas Secas',
                'descricao' => 'Família de retirantes em meio à seca nordestina e suas lutas.',
                'autor' => 'Graciliano Ramos',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1938,
                'preco' => 41.90,
                'quantidade' => 210,
                'categorias' => ['Clássicos da Literatura', 'Política e Sociedade', 'Romance Histórico'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-13.jpg'
            ],
            [
                'titulo' => 'São Bernardo',
                'descricao' => 'Romance sobre ambição, poder e relações humanas no interior do Brasil.',
                'autor' => 'Graciliano Ramos',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1934,
                'preco' => 36.90,
                'quantidade' => 130,
                'categorias' => ['Clássicos da Literatura', 'Romance Contemporâneo', 'Psicologia'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-14.jpg'
            ],
            [
                'titulo' => 'O Quinze',
                'descricao' => 'Romance que retrata a grande seca de 1915 no Ceará.',
                'autor' => 'Rachel de Queiroz',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1930,
                'preco' => 29.90,
                'quantidade' => 150,
                'categorias' => ['Romance Histórico', 'Clássicos da Literatura', 'Política e Sociedade'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-15.jpg'
            ],
            [
                'titulo' => 'As Três Marias',
                'descricao' => 'História de três amigas que enfrentam as dificuldades da vida adulta.',
                'autor' => 'Rachel de Queiroz',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1939,
                'preco' => 35.90,
                'quantidade' => 90,
                'categorias' => ['Romance Contemporâneo', 'Psicologia', 'Clássicos da Literatura'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-16.jpg'
            ],
            [
                'titulo' => 'O Tempo e o Vento',
                'descricao' => 'Saga épica que retrata a formação do Rio Grande do Sul.',
                'autor' => 'Érico Veríssimo',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1949,
                'preco' => 65.00,
                'quantidade' => 200,
                'categorias' => ['Romance Histórico', 'Clássicos da Literatura', 'Política e Sociedade'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-17.jpeg'
            ],
            [
                'titulo' => 'Incidente em Antares',
                'descricao' => 'Romance que mistura realismo mágico e crítica política.',
                'autor' => 'Érico Veríssimo',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1971,
                'preco' => 46.00,
                'quantidade' => 160,
                'categorias' => ['Romance Contemporâneo', 'Política e Sociedade', 'Fantasia'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-18.jpeg'
            ],
            [
                'titulo' => 'Macunaíma',
                'descricao' => 'Herói sem caráter em uma narrativa que mistura folclore e crítica social.',
                'autor' => 'Mário de Andrade',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1928,
                'preco' => 39.90,
                'quantidade' => 300,
                'categorias' => ['Clássicos da Literatura', 'Contos de Fadas e Folclore', 'Política e Sociedade'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-19.jpg'
            ],
            [
                'titulo' => 'Pauliceia Desvairada',
                'descricao' => 'Livro de poesias que marca o início do Modernismo no Brasil.',
                'autor' => 'Mário de Andrade',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1922,
                'preco' => 28.90,
                'quantidade' => 80,
                'categorias' => ['Poesia', 'Clássicos da Literatura', 'Arte, Fotografia e Design'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-20.jpg'
            ],
            [
                'titulo' => 'Alguma Poesia',
                'descricao' => 'Primeiro livro de Carlos Drummond de Andrade, com versos inovadores.',
                'autor' => 'Carlos Drummond de Andrade',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1930,
                'preco' => 31.90,
                'quantidade' => 110,
                'categorias' => ['Poesia', 'Clássicos da Literatura'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-21.jpeg'
            ],
            [
                'titulo' => 'Claro Enigma',
                'descricao' => 'Obra poética que marca a fase mais existencialista de Drummond.',
                'autor' => 'Carlos Drummond de Andrade',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1951,
                'preco' => 36.00,
                'quantidade' => 90,
                'categorias' => ['Poesia', 'Filosofia', 'Clássicos da Literatura'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-22.jpeg'
            ],
            [
                'titulo' => 'Antologia Poética',
                'descricao' => 'Seleção das melhores poesias de Vinicius de Moraes.',
                'autor' => 'Vinicius de Moraes',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1954,
                'preco' => 40.00,
                'quantidade' => 100,
                'categorias' => ['Poesia', 'Romance Contemporâneo', 'Clássicos da Literatura'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-23.jpeg'
            ],
            [
                'titulo' => 'Poemas Escolhidos',
                'descricao' => 'Coletânea das obras mais marcantes de Cecília Meireles.',
                'autor' => 'Cecília Meireles',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1964,
                'preco' => 34.00,
                'quantidade' => 70,
                'categorias' => ['Poesia', 'Clássicos da Literatura'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-24.jpeg'
            ],
            [
                'titulo' => 'O Alienista',
                'descricao' => 'Sátira sobre loucura, poder e ciência em uma cidade fictícia.',
                'autor' => 'Machado de Assis',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1882,
                'preco' => 29.90,
                'quantidade' => 200,
                'categorias' => ['Clássicos da Literatura', 'Psicologia', 'Filosofia'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-25.jpeg'
            ],
            [
                'titulo' => 'A Moreninha',
                'descricao' => 'Romance romântico considerado o marco inicial do romantismo no Brasil.',
                'autor' => 'Joaquim Manuel de Macedo',
                'idioma' => 'Português',
                'paisorigem' => 'Brasil',
                'anolancamento' => 1844,
                'preco' => 32.90,
                'quantidade' => 150,
                'categorias' => ['Romance Histórico', 'Romance Contemporâneo', 'Clássicos da Literatura'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-26.jpeg'
            ],
            [
                'titulo' => 'O Primo Basílio',
                'descricao' => 'Romance realista português sobre adultério e hipocrisia burguesa.',
                'autor' => 'José Maria de Eça de Queirós',
                'idioma' => 'Português',
                'paisorigem' => 'Portugal',
                'anolancamento' => 1878,
                'preco' => 43.90,
                'quantidade' => 120,
                'categorias' => ['Clássicos da Literatura', 'Romance Contemporâneo'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-27.jpg'
            ],
            [
                'titulo' => 'Os Maias',
                'descricao' => 'Crítica à sociedade portuguesa do século XIX.',
                'autor' => 'José Maria de Eça de Queirós',
                'idioma' => 'Português',
                'paisorigem' => 'Portugal',
                'anolancamento' => 1888,
                'preco' => 48.90,
                'quantidade' => 140,
                'categorias' => ['Clássicos da Literatura', 'Romance Histórico', 'Política e Sociedade'],
                'tipo_image' => 'public',
                'image' => 'Images/livros/livro-28.jpg'
            ],
        ];

        foreach ($livros as $dados) {
            $categorias = $dados['categorias'];
            unset($dados['categorias']);

            $livro = Livro::create($dados);

            $idsCategorias = Categoria::whereIn('categoria', $categorias)->pluck('id');
            $livro->categorias()->attach($idsCategorias);
        }
    }
}
