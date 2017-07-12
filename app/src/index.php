<?php
require '../vendor/autoload.php';
use GraphQL\GraphQL;
use MyApp\Schemas\packageSchema;
use MyApp\Controllers\packageController;

try {
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);

    $query = $input['execute'];
    $variableValues = isset($input['variables']) ? $input['variables'] : null;
    $rootResolverValue = null; // Pasado a un resolver field como pimer parametro
    $allResolversContext = new packageController(); // Pasado a todos los resolver como tercer parametro
    $operationName = null;

    $result = GraphQL::execute(new packageSchema(), $query, $rootResolverValue, $allResolversContext, $variableValues, $operationName);
} catch (\Exception $e) {
    $result = [
        'error' => [
            'message' => $e->getMessage()
        ]
    ];
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);