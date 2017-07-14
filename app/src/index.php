<?php
declare(strict_types=1);

require '../vendor/autoload.php';
use GraphQL\GraphQL;
use \GraphQL\Error\FormattedError;
use MyApp\Schemas\packageSchema;
use MyApp\Contexts\packageContext;
use MyApp\Mockup\Data;

try {

    // Carga data mockup en memoria cache
    if (!apcu_exists('data')){
        Data::init();
    }

    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);

    $query = $input['execute'];
    $variableValues = isset($input['variables']) ? $input['variables'] : null;
    $rootResolverValue = null; // Pasado a un resolver field como pimer parametro
    $allResolversContext = new packageContext(); // Pasado a todos los resolver como tercer parametro
    $operationName = null;

    $result = GraphQL::execute(new packageSchema(), $query, $rootResolverValue, $allResolversContext, $variableValues, $operationName);
} catch (\Exception $error) {
    $result = [
        'exception' => FormattedError::createFromException($error)
    ];
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);