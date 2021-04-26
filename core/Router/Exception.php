<?php

namespace Snow\Router;

use Snow\Router;

class Exception
{
    private const HTTP_400 = [
        'code' => 400,
        'message' => 'bad request',
        'feedback' => 'the server was unable to process the request sent, please try again later'
    ];

    private const HTTP_404 = [
        'code' => 404,
        'message' => 'page not be found',
        'feedback' => 'sorry but the page you are looking for does not exist or is temporarily unavailable'
    ];

    private const HTTP_405 = [
        'code' => 405,
        'message' => 'method not allowed',
        'feedback' => 'sorry, the method is not allowed'
    ];

    private const HTTP_501 = [
        'code' => 501,
        'message' => 'method not implemented',
        'feedback' => 'sorry, the method is not implemented'
    ];

    /**
     * @param int $code
     * @return array|null
     */
    private static function getHttpConst(int $code): ?array
    {
        $const = Exception::class . '::HTTP_' . $code;

        return (defined($const))? constant($const) : null;
    }

    /**
     * @param Router $router
     * @param int $httpErrorCode
     * @return void
     */
    private static function catchingHttpError(Router $router, int $httpErrorCode)
    {
        if(!is_null($httpError = self::getHttpConst($httpErrorCode)))
            return self::errorView($httpError);

        return $router->redirect('error.http', ['httpErrorCode' => 404]);
    }

    /**
     * @param Router $router
     * @return void
     */
    public static function handleRouterHttpError(Router $router)
    {
        $router->group('error');
        $router->get('/{httpErrorCode}', function (array $data) use ($router) {
            self::catchingHttpError($router, (int) $data['httpErrorCode']);
        }, 'error.http');
    }

    /**
     * @param Router $router
     * @return void
     */
    public static function dispatchRouterHttpError(Router $router)
    {
        if ($router->error())
            return $router->redirect('error.http', ['httpErrorCode' => $router->error()]);
    }

    /**
     * @param array $httpError
     * @return void
     */
    private static function errorView(array $httpError)
    {
        http_response_code($httpError['code']);
        die(include 'view/error.view.min.php');
    }
}
