<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class TextShuffleController extends AbstractController
{
    #[Route('/', name: 'app_text_shuffle_index')]
    public function index(): Response
    {
        return $this->render('text_shuffle/index.html.twig');
    }

    #[Route('/process', name: 'app_text_shuffle_process', methods: ['POST'])]
    public function process(Request $request): Response
    {
        $file = $request->files->get('text_file');

        if (!$file || $file->getClientOriginalExtension() !== 'txt') {
            $this->addFlash('error', 'Nieprawidłowy plik. Wybierz plik .txt.');
            return $this->redirectToRoute('app_text_shuffle_index');
        }

        $content = file_get_contents($file->getPathname());

        $shuffledContent = $this->shuffleText($content);

        $outputFilename = 'shuffled_' . uniqid() . '.txt';
        $outputPath = $this->getParameter('kernel.project_dir') . '/public/uploads/' . $outputFilename;
        file_put_contents($outputPath, $shuffledContent);

        return $this->render('text_shuffle/result.html.twig', [
            'file' => $outputFilename,
        ]);
    }

    private function shuffleText(string $text): string
    {
        return preg_replace_callback('/\p{L}{4,}/u', function ($matches) {
            $word = $matches[0];
            $first = mb_substr($word, 0, 1);
            $last = mb_substr($word, -1);
            $middle = mb_substr($word, 1, -1);

            $chars = preg_split('//u', $middle, -1, PREG_SPLIT_NO_EMPTY);
            shuffle($chars);
            $shuffled = implode('', $chars);

            return $first . $shuffled . $last;
        }, $text);
    }
}
