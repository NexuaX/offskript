<?php

require_once __DIR__."/../repository/ProductionRepository.php";

class ProductionController extends AppController {

    private Repository $productionRepository;

    public function production(array $params = []) {

        if (!isset($params[1])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/explorer");
        }

        $productionId = $params[1];
        $this->productionRepository = ProductionRepository::getInstance();

        $production = $this->productionRepository->getProduction($productionId);

        $this->render('production', ["production" => $production]);
    }

}