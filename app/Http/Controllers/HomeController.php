<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Si el usuario no está autenticado, redirige al login
        // if (session()->get('user') === null) {
        //     return redirect()->route('login');
        // }
        $apiKey = env('NEWS_API_KEY');
        $keywords = 'SAT OR "Sistema de Atencion Tributaria SAT" OR "Descarga Masiva SAT"';
        $url = "https://newsapi.org/v2/everything?q=$keywords&language=es&apiKey=$apiKey";
        $response = Http::get($url);
        $news = [];


        if ($response->successful()) {

            $newsData = $response->json();
            foreach ($newsData['articles'] as $article) {
                $news[] = [
                    'title' => $article['title'],
                    'body' => $article['description'],
                    'date' => $article['publishedAt'],
                    'url' => $article['url']
                ];
            }
        } else {
            // Si la API falla, puedes mostrar un mensaje de error
            $news[] = [
                'title' => 'Error al obtener noticias',
                'body' => 'No se pudieron obtener las noticias en este momento.',
                'date' => now()->toDateString()
            ];
        }


        //     // Simula la obtención de noticias y anuncios desde la base de datos
        //    $news = [
        //     ['title' => 'Noticia 1', 'body' => 'Contenido de la noticia 1', 'date' => '2024-07-19'],
        //     ['title' => 'Noticia 2', 'body' => 'Contenido de la noticia 2', 'date' => '2024-07-18'],
        //     ['title' => 'Noticia 3', 'body' => 'Contenido de la noticia 2', 'date' => '2024-07-18'],
        //     ['title' => 'Noticia 4', 'body' => 'Contenido de la noticia 2', 'date' => '2024-07-18'],
        //     ['title' => 'Noticia 5', 'body' => 'Contenido de la noticia 2', 'date' => '2024-07-18'],
        //     // Agrega más noticias según sea necesario
        // ];

        $ads = [
            ['title' => 'Cumpleaños del Papá de los Puerquitos', 'body' => 'Es primero pero no recordamos el día.'],
            ['title' => 'Cumpleaños del Geraxxxxx', 'body' => 'Ubicación suponemos que en su canton.'],
            // Agrega más anuncios según sea necesario
        ];


        return view('Home/home', compact('news', 'ads'));
    }
}
