<?php

namespace ModuleBasedTraining\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array
     */
    if(env('DB_CONNECTION', 'mysql') == 'heroku') {
        // Heroku doesn't give us a list of IPs to trust? Seriously?
        protected $proxies = '**';

        /**
         * The current proxy header mappings.
         *
         * @var array
         */
        protected $headers = [
            Request::HEADER_FORWARDED => null, // not set on AWS or Heroku
            Request::HEADER_X_FORWARDED_FOR => 'X_FORWARDED_FOR',
            Request::HEADER_X_FORWARDED_HOST => null,  // not set on AWS or Heroku
            Request::HEADER_X_FORWARDED_PORT => 'X_FORWARDED_PORT',
            Request::HEADER_X_FORWARDED_PROTO => 'X_FORWARDED_PROTO',
        ];

    } else {
        protected $proxies;

        /**
         * The current proxy header mappings.
         *
         * @var array
         */
        protected $headers = [
            Request::HEADER_FORWARDED => 'FORWARDED',
            Request::HEADER_X_FORWARDED_FOR => 'X_FORWARDED_FOR',
            Request::HEADER_X_FORWARDED_HOST => 'X_FORWARDED_HOST',
            Request::HEADER_X_FORWARDED_PORT => 'X_FORWARDED_PORT',
            Request::HEADER_X_FORWARDED_PROTO => 'X_FORWARDED_PROTO',
        ];
    }

}
