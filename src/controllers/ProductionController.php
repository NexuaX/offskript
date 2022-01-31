<?php

require_once __DIR__."/../../CookieSession.php";

class ProductionController extends AppController {

    public function production(array $params = []) {

        if (!isset($params[1])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/explorer");
        }

        $productionId = $params[1];

        $production = $this->productionRepository->getProduction($productionId);
        $isUserLogged = CookieSession::isUserLogged();
        $userReview = null;
        if ($isUserLogged) {
            $userReview = $this->watchlistRepository->getUserProductionReview(CookieSession::getUserCookie(), $productionId);
        }

        $this->render('production', [
            "production" => $production,
            "userReview" => $userReview,
            "isUserLogged" => $isUserLogged]);
    }

}