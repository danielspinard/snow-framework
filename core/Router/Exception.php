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
     * @return array|null
     */
    public static function getHttpConst(int $code): ?array
    {
        $const = Exception::class . '::HTTP_' . $code;
        
        return (defined($const))? constant($const) : null;
    }

    /**
     * @param Router $router
     * @return void
     */
    public static function handleRouterHttpError(Router $router)
    {
        $router->group("error");
        $router->get("/{httpErrorCode}", function ($data) use ($router) {
            $code = (int) $data['httpErrorCode'];
            $httpError = (self::getHttpConst($code));

            if(is_null($httpError))
                return $router->redirect('error.http', ['httpErrorCode' => 404]);

            return self::errorView($httpError);
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
        include 'view/error.view.min.php';
    }
}
