<?php

namespace Snow;

class RouterException
{
    const HTTP_400 = [
        'code' => 400,
        'message' => 'bad request',
        'feedback' => 'the server was unable to process the request sent, please try again later'
    ];

    const HTTP_404 = [
        'code' => 404,
        'message' => 'page not be found',
        'feedback' => 'sorry but the page you are looking for does not exist or is temporarily unavailable'
    ];

    const HTTP_405 = [
        'code' => 405,
        'message' => 'method not allowed',
        'feedback' => 'sorry, the method is not allowed'
    ];

    const HTTP_501 = [
        'code' => 501,
        'message' => 'method not implemented',
        'feedback' => 'sorry, the method is not implemented'
    ];

    /**
     * @param int $code
     * @return array
     */
    private function getHttpConst(int $code): array
    {
        $prefix = RouterException::class . '::HTTP_';
        $const = (defined($prefix . $code) ? $code : '404');
        return constant($prefix . $const);
    }

    /**
     * @param Router $router
     * @return void
     */
    public function handle(Router $router): void
    {
        if ($code = $router->error()) {
            http_response_code($code);
            view('error.http-error', [
                'error' => $this->getHttpConst($code)
            ]);
        }
    }
}
