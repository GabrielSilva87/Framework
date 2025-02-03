<?php

namespace Core;

class View {
    public function render($view, $data = []) {
        // Extrai os dados para que possam ser acessados diretamente na view
        extract($data);

        // Caminho da view
        $viewPath = '../app/Views/' . $view . '.php';

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            // Se a view não for encontrada, você pode retornar um erro
            http_response_code(404);
            echo "View não encontrada.";
        }
    }
}
